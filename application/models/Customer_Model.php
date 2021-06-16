<?php

class Customer_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();	
		$this->load->model('Common_model');	
		date_default_timezone_set('Asia/Kolkata');
	}

	public function get_all_customers($searchUser)
	{
	    if($searchUser){
	        $searchArray=explode(' ',$searchUser);
	        $count=count($searchArray);
	        if($count>1){
	        for($i=1;$i<=$count;$i++){
	            $this->db->like('first_name', $searchUser);
        $this->db->or_like('last_name', $searchUser);
        $this->db->or_like('main_phone', $searchUser);
        $this->db->or_like('account_no', $searchUser);
        $this->db->where_in('first_name', $searchArray); 
        $this->db->or_where_in('last_name', $searchArray);
            }}else{
	    $this->db->like('first_name', $searchUser);
        $this->db->or_like('last_name', $searchUser);
        $this->db->or_like('main_phone', $searchUser);
        $this->db->or_like('account_no', $searchUser);
            }
            
            
		$result  =  $this->db->order_by('customer_id', 'DESC')->get_where('tbl_customer_entries',array('deleted' => "0"))->result_array();
	    }else{
	        $result  =  $this->db->order_by('customer_id', 'DESC')->get_where('tbl_customer_entries',array('deleted' => "0"),200)->result_array();
	    }
		return $result;

	}

	public function get_customerdata_info($customer_id)
	{
		
		$result  =  $this->db->get_where('tbl_customer_entries',array('customer_id'=>$customer_id))->result_array();

		return $result;
	}

	public function get_customer_branchwise($customer_type){
        
        $user_id =  $this->session->userdata('id');

		$user_details =  $this->Common_model->get_user_details($user_id); 

		if($customer_type  ==  "individual")
		{
			$this->db->join('tbl_employers','tbl_customer_entries.employer_name = tbl_employers.emp_id','left');
			$result =  $this->db->get_where('tbl_customer_entries',array('tbl_customer_entries.deleted' => '0'))->result_array();
			
		}
		else
		{
			$this->db->select('tbl_business_customer.customer_id,tbl_business_customer.company_name,tbl_business_customer.account_no,b.branch_name,sec.secteurs,tbl_business_customer.created_at');
			$this->db->join('tbl_branch as b','b.bid = tbl_business_customer.branch','inner');
			$this->db->join('tbl_target_list_companies as sec','sec.tlc_id  = tbl_business_customer.sector_id');
			$result =  $this->db->get_where('tbl_business_customer',array('tbl_business_customer.branch' => $user_details['branch_id'],'tbl_business_customer.deleted' => "0"))->result_array();
		}

		return $result;
       
	}


}