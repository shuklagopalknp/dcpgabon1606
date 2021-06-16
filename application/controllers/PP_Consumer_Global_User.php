<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PP_Consumer_Global_User extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();		
		$this->data['page'] = 'PP Consumer Loans';
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Branch_Loans_Model');	
		$this->load->model('PP_Consumer_Loans_Model');
		$this->load->model('PP_Credit_Scholar_Model');	
		$this->load->model('PP_Caution_Scolare_Loans_Model');	
		$this->load->library('Class_Amort');
		$this->load->helper('lang_translate');
		$this->load->helper('timeAgo');
		//$this->load->helper('ago');
		$this->load->helper(array('dompdf', 'file'));
		date_default_timezone_set('GMT');
	}
	
	//==========Credit Scholar Loan Section
	public function consumerloan(){
		$this->data['title'] = 'DCP | CREDIT CONSO';			
		$this->data['record']=$this->Common_model->get_admin_details(13);
		$branchid=$this->data['record'][0]->bid;		
		$this->data['loantype']=$this->Branch_Loans_Model->get_loanType();
		$this->data['loantax']=$this->Branch_Loans_Model->get_taxType();		
		$this->data['fees']=$this->Branch_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Branch_Loans_Model->get_Allapplication_form_consumer_global();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 13 ) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='13'){			
			$this->render_template2('global/consumer_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}
## geting Caution Scolare loan details
	public function index(){
		error_reporting(0);
		$this->data['title'] = 'DCP - Caution Scolare Loans';			
		$this->data['record']=$this->Common_model->get_admin_details(3);
		$branchid=$this->data['record'][0]->bid;
		$this->data['loantype']=$this->PP_Caution_Scolare_Loans_Model->get_loanType();		
		$this->data['loandetails']=$this->Branch_Loans_Model->get_caution_scolare_Loans_global();
		$this->data['loanrange']=$this->PP_Caution_Scolare_Loans_Model->get_pprange();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 13) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='13'){			
			$this->render_template2('global/Caution_Scolare_loan_1', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
		
	}

//==========Credit Scholar Loan Section
	public function credit_scholar_loan(){
		$this->data['title'] = 'DCP | Finance Credit Scholar';			
		$this->data['record']=$this->Common_model->get_admin_details(13);
		$branchid=$this->data['record'][0]->bid; 
		$this->data['loantype']=$this->Branch_Loans_Model->get_loanType();
		$this->data['loantax']=$this->Branch_Loans_Model->get_taxType();		
		$this->data['fees']=$this->Branch_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Branch_Loans_Model->get_Allapplication_form_credit_scholar_global();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 13) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='13'){			
			$this->render_template2('global/creditscholar_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}

  //==========Credit Scholar Loan Section
	public function decovert(){
		$this->data['title'] = 'DCP | Decovert Loan';			
		$this->data['record']=$this->Common_model->get_admin_details(13);
		$branchid=$this->data['record'][0]->bid; 
		$this->data['loantype']=$this->Branch_Loans_Model->get_loanType();			
		$this->data['fees']=$this->Branch_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Branch_Loans_Model->get_Allapplication_form_Decovert_global();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 13) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='13'){			
			$this->render_template2('global/decovert_bank', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}
	# getting all credit_scolar loan details 

	public function credit_scolar_customer_details()
	{
		error_reporting(0);
        //ini_set('display_errors', 0);
		$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$id=$this->uri->segment(3);	
		$this->data['appformD']=$this->Branch_Loans_Model->get_customar_details_credit_scholar($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Credit_Scholar_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Credit_Scholar_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Credit_Scholar_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Credit_Scholar_Model->get_All_fees();

		$this->data['int_email']=$this->PP_Credit_Scholar_Model->get_interaction_data($id);
		$this->data['sys_docs']=$this->PP_Credit_Scholar_Model->get_filedata($id);
		$this->data['clist_docs']=$this->PP_Credit_Scholar_Model->get_check_list_customer_documents($id);
		$this->data['secteurs']=$this->PP_Credit_Scholar_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Credit_Scholar_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Credit_Scholar_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Credit_Scholar_Model->get_collateral($id);

		$this->data['collateral_vehicule']=$this->PP_Credit_Scholar_Model->get_collateral_vehicule($id);
		$this->data['collateral_deposit']=$this->PP_Credit_Scholar_Model->get_collateral_deposit($id);
		$this->data['collateral_maison']=$this->PP_Credit_Scholar_Model->get_collateral_maison($id);
		$this->data['collateral_excemption']=$this->PP_Credit_Scholar_Model->get_collateral_excemption($id);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Credit_Scholar_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Credit_Scholar_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Credit_Scholar_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Credit_Scholar_Model->get_applicableloan_ratio();
		
		$this->data['customersd']=$this->PP_Credit_Scholar_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Credit_Scholar_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Credit_Scholar_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Credit_Scholar_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Credit_Scholar_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Credit_Scholar_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Credit_Scholar_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Credit_Scholar_Model->get_oInformation($customerID);

		$this->data['decision_rec']=$this->PP_Credit_Scholar_Model->get_decision_record($id);
		$this->data['customerdata']=$this->PP_Credit_Scholar_Model->get_customerdetails_list();	
		

		$is_admin = ($user_id != 13) ? true :false;
		$this->data['title'] = 'DCP - Credit Scholar Customer Details';
		if($this->session->userdata('role')==='13'){			
			$this->render_template2('global/credit_scholar_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}

	### cattion Scolare loan details

	public function caution_scolare_customer_details()
	{
		error_reporting(0);
        //ini_set('display_errors', 0);
		$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$id=$this->uri->segment(3);	
		$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_record($id); 
		$this->data['appformD']=$this->Branch_Loans_Model->get_customar_details_caution_scolare($id);
		$customerID=$this->data['appformD'][0]['customar_id'];		
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Caution_Scolare_Loans_Model->get_tracking_timeline($id);		

		$this->data['int_email']=$this->PP_Caution_Scolare_Loans_Model->get_interaction_data($id);
		$this->data['sys_docs']=$this->PP_Caution_Scolare_Loans_Model->get_filedata($id);
		$this->data['clist_docs']=$this->PP_Caution_Scolare_Loans_Model->get_check_list_customer_documents($id);
		$this->data['secteurs']=$this->PP_Caution_Scolare_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Caution_Scolare_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Caution_Scolare_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Caution_Scolare_Loans_Model->get_collateral($id);
		$this->data['collateral_vehicule']=$this->PP_Caution_Scolare_Loans_Model->get_collateral_vehicule($id);
		$this->data['collateral_deposit']=$this->PP_Caution_Scolare_Loans_Model->get_collateral_deposit($id);
		$this->data['collateral_maison']=$this->PP_Caution_Scolare_Loans_Model->get_collateral_maison($id);
		$this->data['collateral_excemption']=$this->PP_Caution_Scolare_Loans_Model->get_collateral_excemption($id);		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Caution_Scolare_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Caution_Scolare_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Caution_Scolare_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Caution_Scolare_Loans_Model->get_applicableloan_ratio();	
		$this->data['customersd']=$this->PP_Caution_Scolare_Loans_Model->get_customersdetailsinfo($customerID);
		$this->data['risk_analysis']=$this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id);
		
		$this->data['pinfo']=$this->PP_Caution_Scolare_Loans_Model->get_pInformation($customerID);
		$this->data['stinfo']=$this->PP_Caution_Scolare_Loans_Model->get_stInformation($customerID);
		$this->data['acinfo']=$this->PP_Caution_Scolare_Loans_Model->get_acInformation($customerID);
		$this->data['bainfo']=$this->PP_Caution_Scolare_Loans_Model->get_baInformation($customerID);

		$this->data['adinfo']=$this->PP_Caution_Scolare_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Caution_Scolare_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Caution_Scolare_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Caution_Scolare_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Caution_Scolare_Loans_Model->get_oInformation($customerID);
		$this->data['decision_rec']=$this->PP_Caution_Scolare_Loans_Model->get_decision_record($id);
		
		$this->data['customerdata']=$this->PP_Caution_Scolare_Loans_Model->get_customerdetails_list();
		
		$is_admin = ($user_id != 13) ? true :false;
		$this->data['title'] = 'DCP | Caution Scolare Customer Details';
		if($this->session->userdata('role')==='13'){			
			$this->render_template2('global/caution_scolaire_customer_details', $this->data);
		}else{
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}

}