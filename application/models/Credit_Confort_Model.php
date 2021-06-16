<?php

// New Update : 25-01-2021

// Usage : This Model maintains all settings in the application
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Credit_Confort_Model extends CI_Model
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
		$this->load->model('Email_Sms_Template_Model');
	}

	public function save_loan_application($customer_id,$sub_product,$customer_type,$loan_id){

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
        // setting default value for type of empoyer and cotract type
        
        if($customer_data[0]['contract_type_id']=="A_MAJ" || $customer_data[0]['contract_type_id']=="" || $customer_data[0]['contract_type_id']== null || ($customer_data[0]['contract_type_id']!="CDD" || $customer_data[0]['contract_type_id']!="Autre") ){
		    $customer_data[0]['contract_type_id']="CDI";
		}
		
		if(($customer_data[0]['cat_employeurs']=="A_MAJ") || ($customer_data[0]['cat_employeurs']=="") || ($customer_data[0]['cat_employeurs']== null) || ($customer_data[0]['cat_employeurs']!="Prive 20" || $customer_data[0]['cat_employeurs']!="Prive 30" || $customer_data[0]['cat_employeurs']!="Prive 25" || $customer_data[0]['cat_employeurs']!="Public Corps 25" || $customer_data[0]['cat_employeurs']!="Autres 20" || $customer_data[0]['cat_employeurs']!="Organisation internationales") ){
		    $customer_data[0]['cat_employeurs']="Public Civil 25";
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

		$product_tab =  $this->db->get_where('tbl_details_tabs_consumer_products',array('status' => '1','product_type' => 'credit_confort'))->result_array();

		foreach($product_tab as $p_row)
		{
			$tab_arr[] =  $p_row['bussiness_tab_id'];

		}


		// print_r($tab_arr);
		// die;

		// get current active product documents
		$system_docs  =  $this->db->get_where('tbl_document_system',array('document_status' => '1','product_type' => 'credit_confort','document_type' => "system_docs",'sub_product_type' => $sub_product))->result_array();

		$sys_arr[]='';
		foreach($system_docs as $row1)
		{
			$sys_arr[] =  $row1['document_id'];
		}


		$checklist_docs  =  $this->db->get_where('tbl_document_system',array('document_status' => '1','product_type' => 'credit_confort','document_type' => "checklist_docs",'sub_product_type' => $sub_product))->result_array();
		$checklist_arr[] = '';
		$chk_status[] =  '0';
		foreach($checklist_docs as $row2)
		{
			$checklist_arr[] =  $row2['document_id'];
			$chk_status[] =  '0';
		}


		$risk_analysis_docs  =  $this->db->get_where('tbl_document_system',array('document_status' => '1','product_type' => 'credit_confort','document_type' => "risk_analysis_docs",'sub_product_type' => $sub_product))->result_array();
		
		$analysis_arr[] =  '';
		$analyse_status[] =  '0';
		foreach($risk_analysis_docs as $row3)
		{
			$analysis_arr[] =  $row3['document_id'];
			$analyse_status[] =  '0';
		}


		$insertdata =  array(
							'user_id' => $user_id,
							'customer_id' => $customer_id,
							'loan_id_temp' => $loan_id,
							'sub_product' => $sub_product,
							'customer_type' => $customer_type,
							'branch_id' => $user_data['branch_id'],
							'application_no' => round(microtime(true)*1000),
							'customer_data' => $customer_jdata,
							'officer_data' => $officer_jdata,
							'product_tab_data' => implode(',',$tab_arr),
							'created_at' => DATETIME

		);

		//print_r($insertdata);


		if($insert_id =  $this->Common_model->insertRow('tbl_credit_confort_applicationloan',$insertdata))
		{
			
			$doc_data  =  array(
								'loan_id'=> $insert_id,
								'system_docs' => implode(',',$sys_arr) ?? NULL,
								'checklist_doc_status' => implode(',',$chk_status) ?? NULL,
								'checklist_docs' => implode(',',$checklist_arr) ?? NULL,
								'risk_analysis_docs' => implode(',',$analysis_arr) ?? NULL,
								'risk_analysis_doc_status' => implode(',',$analyse_status) ?? NULL
			);

			$this->Common_model->insertRow('tbl_credit_confort_documents',$doc_data);

			// Insert in all application table

			$app_data = array(

								'loan_id' =>  $insert_id,
								'loan_type'=>'credit_confort',
                                'branch_id'=> $user_data['branch_id'],
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
								'product_type' => "credit_confort",
								'comment' => "Mise en place de la demande de Prêt ".$insertdata['application_no']." en cours de traitement",
								'content_type' => "text"
			);

			$this->Common_model->insertRow('business_tracking_timeline',$track_data);


			// Send Mail To customer
			$this->Email_Sms_Template_Model->send_mail_template2($customer_data,$customer_type,$insertdata['application_no'],"CREDIT CONFORT");

			// Send sms To customer
			$this->Email_Sms_Template_Model->send_sms_template2($customer_data,$customer_type,$insertdata['application_no'],"CREDIT CONFORT");
			
			echo $insert_id;
		}
		else
		{
			echo "error";
		}

	}

	public function get_saved_documents($loan_id){
		$result =  $this->db->get_where('tbl_credit_confort_documents',array('loan_id' => $loan_id))->row_array();
		
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
		$role_id  =  $this->session->userdata('role');
		
		$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,b.department,g.customer_type,g.final_status,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg');
		$this->db->from('tbl_credit_confort_applicationloan as g');
		
		$this->db->join('tbl_branch as b','b.bid = g.branch_id','left');
		$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','left');
		
		if($role_id=='2'){
			$this->db->where('g.user_id',$this->session->userdata('id'));
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		if($role_id == '3')
		{
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		
        $swhere = "g.status is NULL";
		$this->db->where($swhere);
    	$this->db->where('g.deleted','0');
    	$this->db->order_by('g.loan_id','desc');
    	
		$result =  $this->db->get()->result_array();
	
		return $result ;
	}

	
	public function get_single_loan_details($loan_id)
	{
		$role_id  =  $this->session->userdata('role');
		// $this->db->select('g.*,b.branch_name,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg,app.workflow_order,app.assigned_roles,app.review,app.approval_status,at.*');
		$this->db->select('g.*,g.status as loanstatus,b.branch_name,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg,loan.loan_object,at.*');
		$this->db->from('tbl_credit_confort_applicationloan as g');
		$this->db->join('consumer_amortization as at','at.applicationform_id = g.loan_id_temp','left');
		$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
		//$this->db->join('tbl_all_applications as app','app.loan_id =  g.loan_id','left');
		$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','inner');
		$this->db->where(array('g.loan_id'=> $loan_id));
		
		$result =  $this->db->get()->row_array();

		return $result ;
	}

	public function get_approval_decision_details($loan_id,$type){

// 		$this->db->select('tbl_all_applications.*,u.first_name,u.last_name,r.name');
// 		$this->db->join('tbl_user as u','u.id = tbl_all_applications.user_id','inner');
// 		$this->db->join('tbl_role as r','u.is_admin =  r.id','inner');
// 		$this->db->order_by('workflow_order','desc');
// 		return $result  =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'review' => 1))->result_array();

        $this->db->select('tbl_decision_comment.*,u.first_name,u.last_name,r.name');
		$this->db->join('tbl_user as u','u.id = tbl_decision_comment.user_id','inner');
		$this->db->join('tbl_role as r','u.is_admin =  r.id','inner');
		$this->db->order_by('comment_id','desc');
        $result  =  $this->db->get_where('tbl_decision_comment',array('loan_id' => $loan_id,'loan_type' => $type))->result_array();

       // echo $this->db->last_query();die;
        return $result;
	}
	
	public function get_overall_loan_status($loan_id){

		$d_where  =  array('loan_id' => $loan_id,'loan_type' => "credit_confort",'review !='=>NULL,'status' => "1");
		$this->db->select('tbl_all_applications.approval_status,tbl_all_applications.user_type,tbl_all_applications.workflow_order,r.name,');
	    $this->db->order_by('workflow_order','desc');
	    $this->db->limit('1');
	    $this->db->join('tbl_role as r','r.id = tbl_all_applications.assigned_roles','inner');
	    $app_status = $this->db->get_where('tbl_all_applications',$d_where)->row_array();

	    $d_where1  =  array('loan_id' => $ld['loan_id'],'loan_type' => "credit_confort",'status' => "1");
	    $this->db->order_by('workflow_order','desc');
	    $this->db->limit('1');
	    $last_data =  $this->db->get_where('tbl_all_applications',$d_where1)->row_array();


	    $l_where = array('loan_id' => $loan_id);
	    $loan = $this->db->get_where('tbl_credit_confort_applicationloan',$l_where)->row_array();

        if($loan['final_status'] == "Annulé" || $loan['final_status'] == "Abandonner")
        {
            return $loan['final_status'];
        }
        else if($loan['final_status'] == "Disbursement")
		{
			if($app_status['user_type'] == "cic")
			   return  "Mise a Disposition - CIC";
			else
			   return  "Mise a Disposition -".$app_status['name'];
			
		}
		else{
		    if(!empty($app_status)){
    			if($app_status['approval_status'] == "Process")
	    		{
	    			if($app_status['user_type'] == "cic")
	    				return "Traitement en Cours - CIC ";
	    			else 
	    				return "Traitement en Cours -".$app_status['name'];
	    		}
	    		else if($app_status['approval_status'] == "Avis Favorable"){
	    			if($app_status['user_type'] == "cic")
	    				return "Avis Favorable - CIC ";
	    			else 
	    				return "Avis Favorable -".$app_status['name'];
	    		}
	    		else if($app_status['approval_status'] == "Avis défavorable")
				{
					if($app_status['user_type'] == "cic")
	    				return "Avis Défavorable - CIC ";
	    			else 
						return "Avis Défavorable -".$app_status['name'];
				}
				else if($app_status['approval_status'] == "Confirm Disbursement")
				{
					if($app_status['user_type'] == "cic")
	    				return "Confirm Disbursement - CIC ";
	    			else 
						return "Confirm Disbursement -".$app_status['name'];
				}
				else if($app_status['approval_status'] == "Demande de retraitement")
				{
					if($app_status['user_type'] == "cic")
	    				return "Demande de Retraitement - CIC ";
	    			else 
						return "Demande de Retraitement -".$app_status['name'];
				}
				else {
					if($app_status['user_type'] == "cic")
	    				return "Initiation en Cours - CIC ";
	    			else 
						return "Initiation en Cours -".$app_status['name'];
				}
		    }
		    else {
		    		if($app_status['user_type'] == "cic")
	    				return "Initiation en Cours - CIC ";
	    			else 
		        		return "Initiation en Cours -".$app_status['name'];
		    }
		}

	}

	public function get_risk_analysis_details($loan_id){

		$result =  $this->db->get_where('tbl_credit_confort_risk_analysis',array('loan_id' =>$loan_id))->row_array();
		return $result;

	}


	public function get_tracking_details($loan_id)
	{
		$this->db->select('track.timeline_id,track.loan_id,track.type,track.comment,track.content_type,track.created_at,user.first_name,user.last_name');
		$this->db->from('tbl_business_tracking_timeline as track');
		$this->db->join('tbl_credit_confort_applicationloan as loan','loan.loan_id = track.loan_id','inner');
		$this->db->join('tbl_user as user','user.id =  track.user_id','inner');
		$this->db->where('track.loan_id',$loan_id);
		$this->db->where('track.product_type','credit_confort');
		return $result  =  $this->db->get()->result_array();
	}



	public function get_submitted_documents($loan_id,$type){

		// $type : system_docs,checklist_docs,risk_analysis_docs

		return $document_data  =  $this->db->get_where('tbl_business_documents',array('loan_id' => $loan_id,'document_type' => $type ))->result_array();
	}

	public function get_interaction_history($loan_id){
		$result['email']  =  $this->db->get_where('tbl_customer_interaction_history',array('loan_id' => $loan_id,'type' => "credit_confort",'mode' =>  "email"))->result_array();

		$result['sms']  =  $this->db->get_where('tbl_customer_interaction_history',array('loan_id' => $loan_id,'type' => "credit_confort",'mode' =>  "sms"))->result_array();

		$result['interview']  =  $this->db->get_where('tbl_customer_interaction_history',array('loan_id' => $loan_id,'type' => "credit_confort",'mode' =>  "interview_telephone"))->result_array();

		return $result;
	}
	public function get_checkfieldandvalue($id){
		$query=$this->db->select('*')
			->from('tbl_temp_consumer_applicationform')					
			->where('aid', $id);						
			$result = $this->db->get()->result();
			return $result;
	}

		public function get_current_monthly_credit($id){
		$query=$this->db->select('*')
			->from('riskanalysis_current_monthly_credit')			
			->where('cap_id', $id)
			
			
			->get();
						
			return $query->result_array();
	}
	public function get_monthly_payment_new_loan($id){
	$query=$this->db->select('*')
		->from('riskanalysis_monthly_payment_new_loan')			
		->where('cap_id', $id)

		->get();				
		return $query->result_array();
	}
	public function get_financial_situation($id){
		$query=$this->db->select('*')
		->from('riskanalysis_financial_situation')			
		->where('cap_id', $id)

		//->where('section', 1)
		->get();
		//echo  $this->db->last_query(); exit;				
		return $query->result_array();
	}

		public function get_collateral($id)
	{
		$adminid=$this->session->userdata('id');
			$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',2)		
			->group_by('c.col_id') 
			->order_by("c.col_id desc")			 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}
	public function get_collateral_vehicule($id)
	{
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',2)
			->where('c.selected_field','Véhicule')					
			->group_by('c.col_id') 
			->order_by("c.col_id desc")	
			->limit(1)		 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}

	public function get_collateral_deposit($id)
	{
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',2)
			->where('c.selected_field','Déposit')					
			->group_by('c.col_id') 
			->order_by("c.col_id desc")	
			->limit(1)		 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}

	public function get_collateral_maison($id)
	{
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',2)
			->where('c.selected_field','Maison')					
			->group_by('c.col_id') 
			->order_by("c.col_id desc")	
			->limit(1)		 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}

	public function get_collateral_excemption($id)
	{
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',2)
			->where('c.selected_field','Excemption')					
			->group_by('c.col_id') 
			->order_by("c.col_id desc")	
			->limit(1)		 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}


	
	
	
	

	public function get_collateralFiles($id){
		$query=$this->db->select('cf.*, c.selected_field')
			->from('collateral_files as cf')
			->join('collateral c','cf.collateral_id=c.col_id','inner')
			->where('cf.collateral_id', $id)
			->where('cf.loan_type', 2)
			->where('cf.deleted', 0)				
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

		public function get_number_of_loans($id){
	
			$this->db->where('customer_id', $id);
			$num_rows = $this->db->count_all_results('tbl_credit_confort_applicationloan');
			return $num_rows;
			//echo  $this->db->last_query();
			
	}

	public function get_fiche_atlantique($id){
		return $result  =  $this->db->get_where('tbl_credit_scholar_fiche_atantique',array('loan_id' => $id))->row_array();
	}
	public function get_archive_loans()
	{
		$user_data =  $this->Common_model->get_user_details($this->session->userdata('id'));
		$role_id  =  $this->session->userdata('role');
		
		$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,g.customer_type,g.final_status,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg');
		$this->db->from('tbl_credit_confort_applicationloan as g');
		
		$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
		$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','left');
		
		if($role_id=='2'){
			$this->db->where('g.user_id',$this->session->userdata('id'));
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		if($role_id == '3')
		{
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		

    	$this->db->where('g.deleted','1');
    	$this->db->order_by('g.loan_id','desc');
    	
		$result =  $this->db->get()->result_array();
	
		return $result ;
	}
}