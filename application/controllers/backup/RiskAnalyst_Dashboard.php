<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RiskAnalyst_Dashboard extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Dashboard';	
		$this->data['page'] = 'Dashboard';	
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('RiskAnalyst_Loans_Model');	
		$this->load->model('PP_Consumer_Loans_Model');
		$this->load->library('Class_Amort');
		$this->load->helper('lang_translate');
		$this->load->helper(array('dompdf', 'file'));
		$this->load->helper('timeAgo');
		//date_default_timezone_set('Asia/Kolkata');
		date_default_timezone_set('GMT');				
	}
	
	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index(){	
		$this->data['record']=$this->Common_model->get_admin_details(3);
		//print_r($this->data['record']);
		if(!empty($this->data['record'][0]->bid)){
		$branchid=$this->data['record'][0]->bid;
		}
		$this->data['record']=$this->Common_model->get_admin_details(3);		
		$this->data['loans_applied_count']=$this->RiskAnalyst_Loans_Model->countRow_LoansApplied();
		$this->data['approved']=$this->RiskAnalyst_Loans_Model->countRow_LoansApproved();
		$this->data['rejected']=$this->RiskAnalyst_Loans_Model->countRow_LoansRejected();
		$this->data['pending']=$this->RiskAnalyst_Loans_Model->countRow_LoansPending();
		$this->data['totalloanamt']=$this->RiskAnalyst_Loans_Model->countRow_Totalamount();
		$this->data['latest_applications']=$this->RiskAnalyst_Loans_Model->LatestApplications();
		$this->data['feed']=$this->RiskAnalyst_Loans_Model->Processfeed();


		$user_id = $this->session->userdata('role');
		$is_admin = ($user_id === '3') ? true :false;
		$this->data['is_admin'] = $is_admin;		
		$this->data['loanrecord']=$this->RiskAnalyst_Loans_Model->get_Allcustomarloan();
		
		if($this->session->userdata('role')==='6'){			
			$this->render_template2('analyst/dashboard', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);
          
		}		
	}
	
	public function	consumer_loan()
	{
		$this->data['title'] = 'DCP - pploan';			
		$this->data['record']=$this->Common_model->get_admin_details(3);
		$branchid=$this->data['record'][0]->bid; 
		$this->data['loantype']=$this->RiskAnalyst_Loans_Model->get_loanType();
		$this->data['loantax']=$this->RiskAnalyst_Loans_Model->get_taxType();		
		$this->data['fees']=$this->RiskAnalyst_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->RiskAnalyst_Loans_Model->get_Allapplication_form($branchid);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 3) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='6'){			
			$this->render_template2('analyst/consumer_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}

	
}
