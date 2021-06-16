<?php 
// New Update : 08-05-2021

// Usage : This controller maintains inactive loans for 3 loans

defined('BASEPATH') OR exit('No direct script access allowed');
class Inactive extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'Gabon | Reports';	
		
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Inactive_loan_model');
    	$this->load->helper('timeAgo');   	
	}
	
		public function fetes_a_la_carte(){
		    
	    error_reporting(-1);
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Fetes à la Carte Inactive Loans';
		$this->data['pagelink'] =  'PP_FETES_A_LA_CARTE';

		$this->data['loan_details'] =  $this->Inactive_loan_model->get_inactive_loans_fetes(); 
		$this->data['controller'] = $this; 
        // echo $this->db->last_query();die;
		$this->render_template2('inactive_loan', $this->data);
	}
	public function conges_a_la_carte(){
		    
	    error_reporting(-1);
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Conges à la Carte Inactive Loans';
        $this->data['pagelink'] = 'PP_CONGES_A_LA_CARTE';
		$this->data['loan_details'] =  $this->Inactive_loan_model->get_inactive_loans_conges(); 
		$this->data['controller'] = $this; 
        // echo $this->db->last_query();die;
		$this->render_template2('inactive_loan', $this->data);
	}
	public function credit_confort(){
		    
	    error_reporting(-1);
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Credit Confort Inactive Loans';
        $this->data['pagelink'] = 'PP_CREDIT_CONFORT';
		$this->data['loan_details'] =  $this->Inactive_loan_model->get_inactive_loans_credit(); 
		$this->data['controller'] = $this; 
        // echo $this->db->last_query();die;
		$this->render_template2('inactive_loan', $this->data);
	}
	
	 public function getUserDetail($id){
        $this->db->select('g.user_name,g.exploitent');
		$this->db->from('tbl_user as g');
		
		$this->db->where('g.id',$id);
    	$result =  $this->db->get()->result_array();
	
		return $result[0] ;

	}
			public function getBranch($id){
        $this->db->select('g.branch_name');
		$this->db->from('tbl_branch as g');
		
		$this->db->where('g.bid',$id);
    	$result =  $this->db->get()->result_array();
	
		return $result[0]['branch_name'] ;

	}
}

