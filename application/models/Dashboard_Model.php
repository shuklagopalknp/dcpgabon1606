<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');
	}


	public function get_recent_customers(){

		$this->db->order_by('customer_id','desc');
		$this->db->limit('7');
		return $result  = $this->db->get_where('tbl_customer_entries',array('deleted' => "0"))->result_array();
	}

	public function get_branchwise_customers(){

		return $result = $this->db->query("SELECT count(c.customer_id) as count,c.branch_id,b.branch_name FROM tbl_customer_entries as c LEFT JOIN tbl_branch as b ON b.bid = c.branch_id GROUP BY c.branch_id")->result_array();
	}

	public function get_all_appliedloans()
	{
		

		$role_id = $this->session->userdata('role');
		$user_id =  $this->session->userdata('id');
		$userdata  =  $this->db->get_where('tbl_user',array('id' => $user_id))->row_array();
				
		if($role_id == "2")
		{
			// Credit Conso
			
			$creditconso = $this->db->get_where('tbl_credit_conso_applicationloan',array('deleted' => "0",'user_id' => $user_id))->result_array(); 
			// Credit Scholir
		
			$this->db->where('user_id',$user_id);
			$creditscholair = $this->db->get_where('tbl_credit_scolair_applicationloan',array('deleted' => "0"))->result_array(); 

			// Credit Confort 

			$creditconfort = $this->db->get_where('tbl_credit_confort_applicationloan',array('deleted' => "0",'user_id' => $user_id))->result_array(); 

			return $sum = count($creditconso) + count($creditscholair) + count($creditconfort);
			
		}
		else if($role_id == "3")
		{
			$sum = 0;
			$count_creditconso = 0;
			$count_creditscholair = 0;

			// Credit Conso
			$this->db->where('branch_id',$userdata['branch_id']);
			$creditconso =  $this->db->get_where('tbl_credit_conso_applicationloan',array('deleted' => "0"))->result_array();

			// Credit Scholir
			$this->db->where('branch_id',$userdata['branch_id']);
			$creditscholair = $this->db->get_where('tbl_credit_scolair_applicationloan',array('deleted' => "0"))->result_array(); 

			// Credit Confort
			$this->db->where('branch_id',$userdata['branch_id']);
			$creditconfort =  $this->db->get_where('tbl_credit_confort_applicationloan',array('deleted' => "0"))->result_array();
 

			return $sum = count($creditconso) + count($creditscholair) + count($creditconfort);
		}
		else
		{
		    $result  =  $this->db->query("SELECT * FROM `tbl_all_applications` where status  = '1' and loan_type IN('credit_conso','credit_scolair','credit_confort') group by loan_id,loan_type order by created_at")->result_array();

		    return count($result);
		}

		
	}

	public function get_pending_count()
	{
		$role_id = $this->session->userdata('role');
	    $user_id =  $this->session->userdata('id');

		$user_where =  array('id' => $user_id);
		$userdata  =  $this->Common_model->getRecord('tbl_user','',$user_where);

		$pending_count = 0;
		$approved_count = 0;
		$reject_count = 0;

		if($role_id == "2")
		{
           // $result =  $this->db->query("SELECT count('loan_id') as pending_count FROM `tbl_all_applications` where workflow_order ='1' and (review ='0' || review='') and status= '1' ")->row_array();
           // return $result['pending_count'];

			$type = array('credit_conso','credit_scolair','credit_confort');

			$this->db->where_in('loan_type',$type);
			$this->db->group_by('loan_id,loan_type');
			$application_data =  $this->db->get_where('tbl_all_applications',array('user_id' => $user_id))->result_array();

			//echo $this->db->last_query();

		}
		else if($role_id == "3")
		{
			$type = array('credit_conso','credit_scolair','credit_confort');

			$this->db->where_in('loan_type',$type);
			$this->db->group_by('loan_id,loan_type');
			$application_data =  $this->db->get_where('tbl_all_applications',array('branch_id' => $userdata['branch_id']))->result_array();

		//	echo $this->db->last_query(); die;
		}
		else
		{
			$type = array('credit_conso','credit_scolair','credit_confort');

			$this->db->where_in('loan_type',$type);
			$this->db->group_by('loan_id,loan_type');
			$application_data =  $this->db->get_where('tbl_all_applications',array('status' => "1"))->result_array();
		}


		foreach($application_data as $row)
		{
			$result = $this->db->query("SELECT * FROM `tbl_all_applications` WHERE workflow_order NOT IN (SELECT Max(workflow_order) FROM `tbl_all_applications` where loan_id='".$row['loan_id']."' and loan_type='".$row['loan_type']."' and status ='1') and loan_id='".$row['loan_id']."' and loan_type='".$row['loan_type']."' and status ='1'  order by app_id desc limit 1")->row_array();

			if(empty($result['review']))
			{

				$pending_count++ ;
			}
			else if(!empty($result['review']) && $result['approval_status'] == "Avis Favorable")
			{
				$approved_count++;
			}
			else if(!empty($result['review']) && $result['approval_status'] =="Avis défavorable")
			{
				$reject_count++;
			}

		}

		 return array('pending_loans' => $pending_count, 'approved_loans' => $approved_count,'rejected_loans' => $reject_count  );
		
		


	}

	
	public function get_all_pending_applications(){

		$role_id  =  $this->session->userdata('role');
		$user_id  =  $this->session->userdata('id');

		$where_in  =  array('credit_conso','credit_scolair','credit_confort');

		$this->db->where_in('loan_type',$where_in);
		$this->db->order_by('app_id','desc');
		$this->db->where('assigned_roles',$role_id);
		$result =  $this->db->get_where('tbl_all_applications',array('review' => '0','status' => '1'))->result_array();

		// echo $this->db->last_query();
		// print_r($result);


		$details  =  array();
		foreach($result as $res)
		{
			if($res['loan_type'] == "credit_scolair")
			{
				$userdata  =  $this->db->get_where('tbl_user',array('id' => $user_id))->row_array();
				
				if($role_id == '2')
				{
				    $where = array('loan_id' => $res['loan_id'],'user_id' => $user_id);
				}
				else if($role_id == '3')
				{
				    $where = array('loan_id' => $res['loan_id'],'branch_id' => $userdata['branch_id']);
				}
				else {
				    $where =  array('loan_id' => $res['loan_id']);
				}

			    $this->db->select('tbl_credit_scolair_applicationloan.*,b.branch_name');
				$this->db->join('tbl_branch as b','b.bid = tbl_credit_scolair_applicationloan.branch_id','inner');
				$credit_scolair =  $this->db->get_where('tbl_credit_scolair_applicationloan',$where)->row_array();
				
				if(!empty($credit_scolair)){
				$credit_scolair['loan_type'] = "CONGES A LA CARTE";
				$credit_scolair['approval_status'] = $res['approval_status'];
				$credit_scolair['workflow_id'] = $res['workflow_id'];
				$details[] = $credit_scolair;
				}
				
			}
			if($res['loan_type'] == "credit_conso")
			{
				$userdata  =  $this->db->get_where('tbl_user',array('id' => $user_id))->row_array();
				
				if($role_id == '2')
				{
				    $where = array('loan_id' => $res['loan_id'],'user_id' => $user_id);
				}
				else if($role_id == '3')
				{
				    $where = array('loan_id' => $res['loan_id'],'branch_id' => $userdata['branch_id']);
				}
				else {
				    $where =  array('loan_id' => $res['loan_id']);
				}
				
				$this->db->select('tbl_credit_conso_applicationloan.*,b.branch_name');
					$this->db->join('tbl_branch as b','b.bid = tbl_credit_conso_applicationloan.branch_id','inner');
					$credit_conso =  $this->db->get_where('tbl_credit_conso_applicationloan',$where)->row_array();
					
					if(!empty($credit_conso)){
					$credit_conso['loan_type'] = "FETES A LA CARTE";
					$credit_conso['approval_status'] = $res['approval_status'];
					$credit_conso['workflow_id'] = $res['workflow_id'];
					$details[] = $credit_conso;
					}
				
			}
			if($res['loan_type'] == "credit_confort")
			{
				$userdata  =  $this->db->get_where('tbl_user',array('id' => $user_id))->row_array();
				
				if($role_id == '2')
				{
				    $where = array('loan_id' => $res['loan_id'],'user_id' => $user_id);
				}
				else if($role_id == '3')
				{
				    $where = array('loan_id' => $res['loan_id'],'branch_id' => $userdata['branch_id']);
				}
				else {
				    $where =  array('loan_id' => $res['loan_id']);
				}
				
				$this->db->select('tbl_credit_confort_applicationloan.*,b.branch_name');
					$this->db->join('tbl_branch as b','b.bid = tbl_credit_confort_applicationloan.branch_id','inner');
					$credit_confort =  $this->db->get_where('tbl_credit_confort_applicationloan',$where)->row_array();
					
					if(!empty($credit_confort)){
					$credit_confort['loan_type'] = "CREDIT CONFORT";
					$credit_confort['approval_status'] = $res['approval_status'];
					$credit_confort['workflow_id'] = $res['workflow_id'];
					$details[] = $credit_confort;
					}
				
			}


		}

		// echo '<pre>';
		// print_r($details);

		return $details;
	}


	public function get_all_processed_applications(){

		$role_id  =  $this->session->userdata('role');
		$user_id  =  $this->session->userdata('id');

		$where_in  =  array('credit_conso','credit_scolair','credit_confort');

		$this->db->where_in('loan_type',$where_in);
		$this->db->order_by('app_id','desc');
		$this->db->where('assigned_roles',$role_id);
		$result =  $this->db->get_where('tbl_all_applications',array('review' => '1','status' => '1'))->result_array();

		// echo '<pre>';
		// print_r($result); die;

		$details  =  array();
		foreach($result as $res)
		{
			if($res['loan_type'] == "credit_conso")
			{
				$userdata  =  $this->db->get_where('tbl_user',array('id' => $user_id))->row_array();

				if($role_id == '2')
				{
				    $where = array('loan_id' => $res['loan_id'],'user_id' => $user_id);
				}
				else if($role_id == '3')
				{
				    $where = array('loan_id' => $res['loan_id'],'branch_id' => $userdata['branch_id']);
				}
				else {
				    $where =  array('loan_id' => $res['loan_id']);
				}
				
				$this->db->select('tbl_credit_conso_applicationloan.*,b.branch_name');
				$this->db->join('tbl_branch as b','b.bid = tbl_credit_conso_applicationloan.branch_id','inner');
				$credit_conso =  $this->db->get_where('tbl_credit_conso_applicationloan',$where)->row_array();
				//echo $this->db->last_query(); die;
				if(!empty($credit_conso)){
				$credit_conso['loan_type'] = "FETES A LA CARTE";
				$credit_conso['approval_status'] = $res['approval_status'];
				$credit_conso['workflow_id'] = $res['workflow_id'];
				$details[] = $credit_conso;
				}
				
			}
			if($res['loan_type'] == "credit_scolair")
			{
				$userdata  =  $this->db->get_where('tbl_user',array('id' => $user_id))->row_array();
				if($role_id == '2')
				{
				    $where = array('loan_id' => $res['loan_id'],'user_id' => $user_id);
				}
				else if($role_id == '3')
				{
				    $where = array('loan_id' => $res['loan_id'],'branch_id' => $userdata['branch_id']);
				}
				else {
				    $where =  array('loan_id' => $res['loan_id']);
				}
				
				$this->db->select('tbl_credit_scolair_applicationloan.*,b.branch_name');
				$this->db->join('tbl_branch as b','b.bid = tbl_credit_scolair_applicationloan.branch_id','inner');
				$credit_scolair =  $this->db->get_where('tbl_credit_scolair_applicationloan',$where)->row_array();
				if(!empty($credit_scolair)){
				$credit_scolair['loan_type'] = "CONGES A LA CARTE";
				$credit_scolair['approval_status'] = $res['approval_status'];
				$credit_scolair['workflow_id'] = $res['workflow_id'];
				$details[] = $credit_scolair;
				}
				
			}
			if($res['loan_type'] == "credit_confort")
			{
				$userdata  =  $this->db->get_where('tbl_user',array('id' => $user_id))->row_array();
				if($role_id == '2')
				{
				    $where = array('loan_id' => $res['loan_id'],'user_id' => $user_id);
				}
				else if($role_id == '3')
				{
				    $where = array('loan_id' => $res['loan_id'],'branch_id' => $userdata['branch_id']);
				}
				else {
				    $where =  array('loan_id' => $res['loan_id']);
				}
				
				$this->db->select('tbl_credit_confort_applicationloan.*,b.branch_name');
				$this->db->join('tbl_branch as b','b.bid = tbl_credit_confort_applicationloan.branch_id','inner');
				$credit_confort =  $this->db->get_where('tbl_credit_confort_applicationloan',$where)->row_array();
				if(!empty($credit_confort)){
				$credit_confort['loan_type'] = "CREDIT CONFORT";
				$credit_confort['approval_status'] = $res['approval_status'];
				$credit_confort['workflow_id'] = $res['workflow_id'];
				$details[] = $credit_confort;
				}
				
			}


		}

		// echo '<pre>';
		// print_r($details); die;
		return $details;
	}
}