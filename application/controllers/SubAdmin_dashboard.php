<?php defined('BASEPATH') OR exit('No direct script access aloowed');

class SubAdmin_dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Dashboard';	
		$this->data['page'] = 'Dashboard';	
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Branch_Loans_Model');	
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
		$branchid=$this->data['record'][0]->bid;
		$this->data['loans_applied_count']=$this->Branch_Loans_Model->countRow_LoansApplied();
		$this->data['approved']=$this->Branch_Loans_Model->countRow_LoansApproved();
		$this->data['rejected']=$this->Branch_Loans_Model->countRow_LoansRejected();
		$this->data['pending']=$this->Branch_Loans_Model->countRow_LoansPending();
		$this->data['totalloanamt']=$this->Branch_Loans_Model->countRow_Totalamount();
		$this->data['latest_applications']=$this->Branch_Loans_Model->LatestApplications();
		$this->data['feed']=$this->Branch_Loans_Model->Processfeed();


		$user_id = $this->session->userdata('role');
		$is_admin = ($user_id === '3') ? true :false;
		$this->data['is_admin'] = $is_admin;		
		$this->data['loanrecord']=$this->Branch_Loans_Model->get_Allcustomarloan($branchid);
		
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/dashboard', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);
          
		}		
	}
	public function consumerloan(){
		$this->data['title'] = 'DCP - pploan';			
		$this->data['record']=$this->Common_model->get_admin_details(3);
		$branchid=$this->data['record'][0]->bid; 
		$this->data['loantype']=$this->Branch_Loans_Model->get_loanType();
		$this->data['loantax']=$this->Branch_Loans_Model->get_taxType();		
		$this->data['fees']=$this->Branch_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Branch_Loans_Model->get_Allapplication_form($branchid);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 3) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/consumer_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}
	public function customer_details()
	{
		error_reporting(0);
        //ini_set('display_errors', 0);
		$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$id=$this->uri->segment(3);
		$bid=$this->data['record'][0]->bid; 
		$this->data['appformD']=$this->Branch_Loans_Model->get_customar_details($this->uri->segment(3),$bid);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->Branch_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->Branch_Loans_Model->get_Allapplication_form($bid);
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();

		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		$this->data['sys_docs']=$this->PP_Consumer_Loans_Model->get_filedata($id);
		$this->data['clist_docs']=$this->PP_Consumer_Loans_Model->get_check_list_customer_documents($id);
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);

		$this->data['collateral_vehicule']=$this->PP_Consumer_Loans_Model->get_collateral_vehicule($id);
		$this->data['collateral_deposit']=$this->PP_Consumer_Loans_Model->get_collateral_deposit($id);
		$this->data['collateral_maison']=$this->PP_Consumer_Loans_Model->get_collateral_maison($id);
		$this->data['collateral_excemption']=$this->PP_Consumer_Loans_Model->get_collateral_excemption($id);


		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		
		
		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		
		//print_r($this->data['appformD'][0]);
		$is_admin = ($user_id != 3) ? true :false;
		$this->data['title'] = 'DCP - Customer Details';
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}	
	public function amortizationview()
    {
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_amortization_record($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 3) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/amortization_view', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}	    	
    }
	public function comment_manager()
    {
		
		$output='';
		$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 		
		$msg='Status  - ';
		if(!empty($this->input->post('decision'))){
			$msg .='Manager '.$this->input->post('decision').' this loan. '.$this->input->post('commentstatus').'|';
		}
		$this->form_validation->set_error_delimiters('<p>', '</p>');
		$this->form_validation->set_rules('commentstatus','Commentstatus', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$output .=validation_errors();	
		}else{		
		sleep(1);
			$fata2=array(		
				'manager_id'=>trim($this->input->post('manager_id')),
				'branch_id'=>trim($this->input->post('branch_id')),
				'account_manager_id'=>trim($this->input->post('account_manager_id')),
				'customar_id'=>trim($this->input->post('customar_id')),		
				'loan_id'=>trim($this->input->post('cl_aid')),
				'loantype'=>1,		
			);
		$insert=$this->PP_Consumer_Loans_Model->insertRow('branmanager_approbation',$fata2);
		if($insert){
			$data = array(
				'loan_status'=>trim($this->input->post('decision')),				
			);			
			$edit=$this->PP_Consumer_Loans_Model->updateRow('consumer_loans_applicationform', 'cl_aid', $this->input->post('cl_aid'),$data);
			if($edit){
				$details=$msg;
				$msg=str_replace('|', ', ', $msg);
					$history_arr=array(
						"cl_aid" =>trim($this->input->post('cl_aid')),
						"admin_id" =>trim($this->input->post('manager_id')),				
						"comment" =>$details,
						"loan_type"=>1,			
						"created" =>date('Y-m-d h:i:s')
					);
				$res=$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
				$output .='1';
			}
		}
		echo $output;
		}
	}
	
	
}