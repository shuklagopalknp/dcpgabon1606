<?php

// New Update : 01-05-2020

// Usage : This Model maintains all settings in the application
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Gage_Espece_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
		$this->load->model('Customer_Model');
		$this->load->model('Business_Customer_Model');
		$this->load->model('Setting_Model');
	}

	public function save_loan_application($customer_id,$sub_product,$customer_type){

		$user_id  =  $this->session->userdata('id');
		$user_data =  $this->Common_model->get_user_details($user_id);

		if($customer_type == "1"){

			$customer_data = $this->Customer_Model->get_customerdata_info($customer_id);
		}
		else if($customer_type == "2")
		{
			$customer_data = $this->Business_Customer_Model->get_business_customer_details($customer_id);
			$officer_data  = $this->Business_Customer_Model->get_business_officer_details($customer_id);
		}

		$customer_jdata =  json_encode($customer_data[0]);
		if(!empty($officer_data))
		{
			$officer_jdata =  json_encode($officer_data);
		}
		else
		{
			$officer_jdata =  NULL;
		}

		// get current active product details tabs

		$product_tab =  $this->db->get_where('tbl_details_tabs_business_products',array('status' => '1','product_type' => 'gage_espece'))->result_array();

		foreach($product_tab as $p_row)
		{
			$tab_arr[] =  $p_row['bussiness_tab_id'];

		}

		if(empty($tab_arr))
		{
			echo "tab_error";

			die;
		}


		// get current active product documents
		$system_docs  =  $this->db->get_where('tbl_document_system',array('document_status' => '1','product_type' => 'gage_espece','document_type' => "system_docs",'sub_product_type' => $sub_product))->result_array();

		foreach($system_docs as $row1)
		{
			$sys_arr[] =  $row1['document_id'];
		}


		$checklist_docs  =  $this->db->get_where('tbl_document_system',array('document_status' => '1','product_type' => 'gage_espece','document_type' => "checklist_docs",'sub_product_type' => $sub_product))->result_array();
		foreach($checklist_docs as $row2)
		{
			$checklist_arr[] =  $row2['document_id'];
			$chk_status[] =  '0';
		}


		$risk_analysis_docs  =  $this->db->get_where('tbl_document_system',array('document_status' => '1','product_type' => 'gage_espece','document_type' => "risk_analysis_docs",'sub_product_type' => $sub_product))->result_array();

		foreach($risk_analysis_docs as $row3)
		{
			$analysis_arr[] =  $row3['document_id'];
			$analyse_status[] =  '0';
		}


		$insertdata =  array(
							'user_id' => $user_id,
							'customer_id' => $customer_id,
							'sub_product' => $sub_product,
							'customer_type' => $customer_type,
							'branch_id' => $user_data['branch_id'],
							'application_no' => round(microtime(true)*1000),
							'customer_data' => $customer_jdata,
							'officer_data' => $officer_jdata,
							'product_tab_data' => implode(',',$tab_arr),
							'created_at' => DATETIME

		);

		if($insert_id =  $this->Common_model->insertRow('tbl_gage_espece_applicationloan',$insertdata))
		{
			// Insert in Business Document table
			$doc_data  =  array(
								'loan_id'=> $insert_id,
								'system_docs' => implode(',',$sys_arr) ?? NULL,
								'checklist_doc_status' => implode(',',$chk_status) ?? NULL,
								'checklist_docs' => implode(',',$checklist_arr) ?? NULL,
								'risk_analysis_docs' => implode(',',$analysis_arr) ?? NULL,
								'risk_analysis_doc_status' => implode(',',$analyse_status) ?? NULL
			);

			$this->Common_model->insertRow('tbl_gage_espece_documents',$doc_data);

			// Insert in all application table

			$app_data = array(

								'loan_id' =>  $insert_id,
								'loan_type'=>'gage_espece',
								'user_id' => $user_id,
								'assigned_roles' => $this->session->userdata('role'),
								'status' => 1,
								'workflow_id' => 0,
								'review' => ""
			);

			$this->Common_model->insertRow('tbl_all_applications',$app_data);


			// Insert in Tracking Details of Loan

			$track_data =  array(
								'loan_id' => $insert_id,
								'user_id' => $user_id,
								'product_type' => "gage_espece",
								'comment' => "New loan application form created and application number is ".$insertdata['application_no']." under process",
								'content_type' => "text"
			);

			$this->Common_model->insertRow('business_tracking_timeline',$track_data);
			
			echo $insert_id;
		}
		else
		{
			echo "error";
		}

	}

	public function get_saved_documents($loan_id){
		$result =  $this->db->get_where('tbl_gage_espece_documents',array('loan_id' => $loan_id))->row_array();
		
		$result1 =  array();
		$system_docs =  array();
		if($result['system_docs'])
		{
			$sys_arr =  explode(',',$result['system_docs']);
			$this->db->where_in('document_id',$sys_arr);
			$this->db->order_by('document_order');
			$result1['system_docs'] =  $this->db->get_where('tbl_document_system')->result_array();

		}


		$checklist_docs =  array();
		if($result['checklist_docs'])
		{
			$chk_arr =  explode(',',$result['checklist_docs']);
			$this->db->where_in('document_id',$chk_arr);
			$this->db->order_by('document_order');
			$result1['checklist_docs'] =  $this->db->get_where('tbl_document_system')->result_array();
			$result1['checklist_status'] =  explode(',',$result['checklist_doc_status']);
		}


		$analysis_docs =  array();
		if($result['risk_analysis_docs'])
		{
			$risk_arr =  explode(',',$result['risk_analysis_docs']);
			$this->db->where_in('document_id',$risk_arr);
			$this->db->order_by('document_order');
			$result1['analysis_docs'] =  $this->db->get_where('tbl_document_system')->result_array();
			$result1['risk_status'] =  explode(',',$result['risk_analysis_doc_status']);
		}

		return $result1;


	}

	public function get_loan_details_branchwise()
	{
		$user_data =  $this->Common_model->get_user_details($this->session->userdata('id'));
        $role_id  =  $user_data['is_admin'];
                
               
        $this->db->select('g.loan_id,g.application_no,g.sub_product,g.customer_data,g.created_at,g.final_status,g.modified_at,b.branch_name,g.customer_type,app.workflow_order,app.assigned_roles,app.review,app.approval_status');
        $this->db->from('tbl_gage_espece_applicationloan as g');
        $this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
        $this->db->join('tbl_all_applications as app','app.loan_id =  g.loan_id','inner');
        if($role_id == '2' || $role_id == '3')
        {
                $this->db->where('g.branch_id',$user_data['branch_id']);
        }

        $this->db->where('g.deleted','0');
        $this->db->where('app.assigned_roles',$role_id);
        $this->db->where('app.status','1');
        $this->db->where('app.loan_type',"gage_espece");
        $this->db->where('app.review !=',NULL);
        $this->db->order_by('g.loan_id','desc');
                
		
		
		$result =  $this->db->get()->result_array();
			
               // echo $this->db->last_query();
               // print_r($this->session->userdata('portal_permission')); die;
		return $result ;
	}

	
	public function get_single_loan_details($loan_id)
	{
        $role_id  =  $this->session->userdata('role');
        
            $this->db->select('tbl_gage_espece_applicationloan.*,app.workflow_order,app.assigned_roles,app.review,app.approval_status');
            $this->db->join('tbl_all_applications as app','app.loan_id =  tbl_gage_espece_applicationloan.loan_id','inner');
            $this->db->where('app.loan_type','gage_espece');
            $result = $this->db->get_where('tbl_gage_espece_applicationloan',array('tbl_gage_espece_applicationloan.loan_id' => $loan_id,'app.assigned_roles' => $role_id,'app.status'=> "1"))->row_array();
        
		return $result;
	}

	public function get_approval_decision_details($loan_id,$type){

		$this->db->select('tbl_all_applications.*,u.first_name,u.last_name,r.name');
		$this->db->join('tbl_user as u','u.id = tbl_all_applications.user_id','inner');
		$this->db->join('tbl_role as r','u.is_admin =  r.id','inner');
		$this->db->order_by('workflow_order','desc');
		return $result  =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'review' => 1))->result_array();
	}


	public function get_risk_analysis_details($loan_id){

		$result =  $this->db->get_where('tbl_gage_espece_risk_analysis',array('loan_id' =>$loan_id))->row_array();
		return $result;

	}

	public function get_risk_analysis_facility($loan_id)
	{
		$result =  $this->db->get_where('tbl_gage_espece_risk_analysis_facility',array('loan_id' =>$loan_id))->row_array();
		return $result;
	}

	public function get_tracking_details($loan_id)
	{
		$this->db->select('track.timeline_id,track.loan_id,track.comment,track.content_type,track.created_at,user.first_name,user.last_name');
		$this->db->from('tbl_business_tracking_timeline as track');
		$this->db->join('tbl_gage_espece_applicationloan as loan','loan.loan_id = track.loan_id','inner');
		$this->db->join('tbl_user as user','user.id =  track.user_id','inner');
		$this->db->where('track.loan_id',$loan_id);
                $this->db->where('track.product_type','gage_espece');
		return $result  =  $this->db->get()->result_array();
	}



	public function get_submitted_documents($loan_id,$type){

		// $type : system_docs,checklist_docs,risk_analysis_docs

		return $document_data  =  $this->db->get_where('tbl_business_documents',array('loan_id' => $loan_id,'document_type' => $type ))->result_array();
	}

	public function get_interaction_history($loan_id){
		$result['email']  =  $this->db->get_where('tbl_business_interaction_history',array('loan_id' => $loan_id,'type' => "gage_espece",'mode' =>  "email"))->result_array();

		$result['sms']  =  $this->db->get_where('tbl_business_interaction_history',array('loan_id' => $loan_id,'type' => "gage_espece",'mode' =>  "sms"))->result_array();

		$result['interview']  =  $this->db->get_where('tbl_business_interaction_history',array('loan_id' => $loan_id,'type' => "gage_espece",'mode' =>  "interview_telephone"))->result_array();

		return $result;
	}


}