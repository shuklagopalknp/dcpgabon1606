<?php
 
/** 
 * Short description for file    
 * Filename    PP_Caution_Scolare_Loans_Model.php
 * @author     <CK Informatics Pvt Ltd>  
 * @copyright  1997-2019 The PHP Group
 * @version    CodeIgniter V 3.1.4
 * Purpose	   This controller is the default controller which is used to display the loginpage.
 * Check the Userlogins
 **/
/*
This model is the default model which is used to display the loginpage.
Check the Userlogins 
*/ 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PP_Caution_Scolare_Loans extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		//$this->data['title'] = 'pploan';	
		$this->data['page'] = 'PP Caution Scolare Loans';	
		$this->load->library('session');		
    	$this->load->model('Common_model');
    	$this->load->model('PP_Caution_Scolare_Loans_Model');
    	$this->load->model('PP_Consumer_Loans_Model');
    	$this->load->library('Class_Amort');
    	$this->load->helper('lang_translate');
		$this->load->helper('timeAgo');
		$this->load->helper(array('dompdf', 'file'));		
		date_default_timezone_set('GMT');
	}
	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index(){
		error_reporting(0);
		$this->data['title'] = 'DCP - Caution Scolare Loans';			
		$this->data['record']=$this->Common_model->get_admin_details(2);
		$this->data['loantype']=$this->PP_Caution_Scolare_Loans_Model->get_loanType();
		$this->data['loantax']=$this->PP_Caution_Scolare_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();
		$this->data['loanrange']=$this->PP_Caution_Scolare_Loans_Model->get_pprange();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/Caution_Scolare_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
		
		
	}

	// New update : 31-03-2020

	public function customer_caution_scolaire($customer_id){
		$this->data['title'] = 'DCP - Caution Scolare Loans';			
		$this->data['record']=$this->Common_model->get_admin_details(2);
		$this->data['loantype']=$this->PP_Caution_Scolare_Loans_Model->get_loanType();
		$this->data['loantax']=$this->PP_Caution_Scolare_Loans_Model->get_taxType();

		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_customer_application_form($customer_id);
		$customer_personalinfo = $this->PP_Consumer_Loans_Model->get_customer_personalinformation($customer_id);
		// print_r($customer_personalinfo); die;
		$this->data['customer_name'] = $customer_personalinfo['first_name'].' '.$customer_personalinfo['middle_name'].' '.$customer_personalinfo['last_name'];
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();
		$this->data['loanrange']=$this->PP_Caution_Scolare_Loans_Model->get_pprange();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/single_customer_scolare_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}


	

	public function add_loan(){
		//echo "<pre>", print_r($_POST), "</pre>";    
		sleep(2);
		$ip = $_SERVER['REMOTE_ADDR'];
		$this->form_validation->set_error_delimiters('<span>', '</span>');		
		$this->form_validation->set_rules('deposit_amount', 'Montant Caution', 'required');
		$this->form_validation->set_rules('study_costs', 'Frais d`étude', 'required');
		$this->form_validation->set_rules('transfer_fee', 'Transfer fee', 'required');
		$this->form_validation->set_rules('loan_interest', 'DUREE', 'required');
		$this->form_validation->set_rules('percentage', 'percentage', 'required');
		if ($this->form_validation->run() == FALSE){
			$errors['error'] = validation_errors();
			echo json_encode($errors);
		}else{		
		$num =round(microtime(true)*1000);
		$data = array(
			'application_no'=>$num,
			'admin_id'=>$this->session->userdata('id'),
			'ip_address' => $ip,
            'loan_type' =>4,
            'deposit_amount' => $this->input->post('deposit_amount'),
            'study_costs' => $this->input->post('study_costs'),
            'transfer_fee' => $this->input->post('transfer_fee'),
            'tva_studycosts_calculator' => $this->input->post('tva_studycosts_calculator'),
            'tva_transferfee_calculator' => $this->input->post('tva_transferfee_calculator'),
            't1_equity_calculator' => $this->input->post('t1_equity_calculator'),
            'loan_interest' => $this->input->post('loan_interest'),
            't2_study_costs_calculator' => $this->input->post('t2_study_costs_calculator'),
            't2_transfer_fee_calculator' => $this->input->post('t2_transfer_fee_calculator'),
            'net_pay_amt' => $this->input->post('net_pay_amt'),
            'net_block_amt' => $this->input->post('net_block_amt'),
            'percentage' => $this->input->post('percentage'),         

        );
        $result['success']=$this->PP_Caution_Scolare_Loans_Model->insertRow('temp_applicationform_caution_scolaire',$data);
        echo json_encode($result);
    	}
    }
    
    /*Amortization Section*/
    public function amortization_loan(){
    	$this->data['title'] = 'DCP | Caution Scolare TABLEAU AMORTISSMENT';
    	$id=$this->uri->segment(3); //exit;
    	$this->data['record']=$this->Common_model->get_admin_details(1);    	
    	$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->test_amortization($id);    		
    	
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;		
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/amortization_caution_scolare', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
    }

    public function amortization_decovert_views()
    {
    	$this->data['title'] = 'DCP | Caution Scolare TABLEAU AMORTISSMENT';
    	$id=$this->uri->segment(3); //exit;
    	$this->data['record']=$this->Common_model->get_admin_details(1);    	
    	$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_record($id);    		
    	
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;		
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/amortization_caution_scolare_view', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}	

    }

     public function download_temp_amortizationpdf(){
		 $output='';
		  $Locations='';
		  $Rarray='';
		  $users_arr=array();	
		  $segmentid=$this->uri->segment(3); 	  
		  $getHtml=$this->temporary_generate_amortization_pdf($segmentid);
		  //echo $getHtml;
		  //exit;
		  $filename='Amortization-Credit-Conso-'.$segmentid.'-'.time();
		  $abc=pdf_create_proposal_caution_scolaire($getHtml,$filename,true);
		  if($abc==1){
		 	$data = array('filename'=>$filename.'.pdf');
		  	$validate=$this->PP_Caution_Scolare_Loans_Model->check_amortization_files($segmentid);
		  	
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
        		$path_to_file = './assets/caution_scolaire/amortization/'.$validate->amortization_pdf;
				if(unlink($path_to_file)) {
				    //echo 'Deleted successfully';
				}
				else {
				    // echo 'errors occured';
				}
        		$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('temp_applicationform_caution_scolaire', 'temp_id', $segmentid,$data);
        	}else{
        		$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('temp_applicationform_caution_scolaire', 'temp_id', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}
	}

	public function download_amortizationpdf(){
		 $output='';
		  $Locations='';
		  $Rarray='';
		  $users_arr=array();	
		  $segmentid=$this->uri->segment(3); 	  
		  $getHtml=$this->generate_amortization_pdf($segmentid);
		  //echo $getHtml;exit;
		  $filename='Amortization-Caution-Scolare-'.$segmentid.'-'.time();
		  $abc=pdf_create_proposal_caution_scolaire($getHtml,$filename,true);
		  if($abc==1){
		 	$data = array('filename'=>$filename.'.pdf');
		  	$validate=$this->PP_Caution_Scolare_Loans_Model->check_amortization_files($segmentid);
		  	
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){
        		$path_to_file = './assets/caution_scolaire/amortization/'.$validate->amortization_pdf;
				if(unlink($path_to_file)) {
				    //echo 'Deleted successfully';
				}
				else {
				    // echo 'errors occured';
				}
        		$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('temp_applicationform_caution_scolaire', 'temp_id', $segmentid,$data);
        	}else{
        		$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('temp_applicationform_caution_scolaire', 'temp_id', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}
	}

	

    public function amortizationview()
    {
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_record($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/amortization_view', $this->data);    	
		}
		
    // public function amortization_view_pdf()
    // {
    // 	$output='';
		//   $Locations='';
		//   $Rarray='';
		//   $users_arr=array();	
		//   $segmentid=$this->uri->segment(3); 	  
		//   $getHtml=$this->generate_amortization_pdf1($segmentid);
		//  // echo $getHtml;
		//   $filename='Amortization-Credit-Conso-'.$segmentid.'-'.time();
		//   //$filename='amortization_'.$segmentid.'_'.time();
		//   $abc=pdf_create_proposal_caution_scolaire($getHtml,$filename,true);
		//   if($abc==1){
		//  	$data = array('amortization_pdf'=>$filename.'.pdf');
		//   	$validate=$this->PP_Caution_Scolare_Loans_Model->check_amortization_files($segmentid);
		  	
		//   	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
    //     		$path_to_file = './assets/caution_scolaire/amortization/'.$validate->amortization_pdf;
		// 		if(unlink($path_to_file)) {
		// 		    //echo 'Deleted successfully';
		// 		}
		// 		else {
		// 		    // echo 'errors occured';
		// 		}
    //     		$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);
    //     	}else{
    //     		$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);       		
        		
    //     	}
		// 	//echo 1;			
		// }

    // }    

   
	function temporary_generate_amortization_pdf($segmentid){		
		$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_befor_record($segmentid);
		return  $this->load->view('superadmin/caution_scolaire_pdf_generate',$this->data,true);
	}
	function generate_amortization_pdf($segmentid){		
		$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_after_record($segmentid);
		return  $this->load->view('superadmin/caution_scolaire_pdf_generate',$this->data,true);
	}
	public function select_customer()
	{
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$this->data['secteurs']=$this->PP_Caution_Scolare_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Caution_Scolare_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Caution_Scolare_Loans_Model->get_type_of_contract();
		$this->data['branch_record']=$this->PP_Caution_Scolare_Loans_Model->get_All_branch();
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['bankdetails']=$this->PP_Caution_Scolare_Loans_Model->get_bankdetails();
		$this->data['title'] = 'DCP - Customer Verification';
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/caution_scolaire_select_customer', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}

		/*$this->data['title'] = 'DCP - Select Customer';
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id != 2) ? true :false;
		$this->data['bankdetails']=$this->PP_Caution_Scolare_Loans_Model->get_bankdetails();
		$this->data['title'] = 'DCP - Customer Verification';
		$this->render_template2('superadmin/consumerloansselect_customer', $this->data);*/
	}

	public function customer_details()
	{
		error_reporting(0);
        //ini_set('display_errors', 0);
		$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		
		
		$user_id = $this->session->userdata('id');
		$id=$this->uri->segment(3);	
		$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_record($id); 
		$this->data['appformD']=$this->PP_Caution_Scolare_Loans_Model->get_caution_scolaire_loans_applicationform_details($id);
		//print_r($this->data['appformD'][0]['customar_id']);
		$customerID=$this->data['appformD'][0]['customar_id'];
		
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Caution_Scolare_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();

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

		$this->data['decision_rec']=$this->PP_Caution_Scolare_Loans_Model->get_decision_record($id);
				
		$this->data['customersd']=$this->PP_Caution_Scolare_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Caution_Scolare_Loans_Model->get_pInformation($customerID);
		$this->data['stinfo']=$this->PP_Caution_Scolare_Loans_Model->get_stInformation($customerID);
		$this->data['acinfo']=$this->PP_Caution_Scolare_Loans_Model->get_acInformation($customerID);
		$this->data['bainfo']=$this->PP_Caution_Scolare_Loans_Model->get_baInformation($customerID);

		$is_admin = ($user_id != 1) ? true :false;
		$this->data['title'] = 'DCP | Caution Scolaire Customer Details';

		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/caution_scolaire_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
	} 
	 	

	public function SearchCustomers(){
		//print_r($_POST);
		$segment=$this->input->post('segment');
		$data= $this->data['accontdata']=$this->PP_Caution_Scolare_Loans_Model->get_customers_details($this->input->post('account'));		
		$html=null;
		echo $this->input->post('account');
		if(!empty($data)){
			foreach ($data as $key) {
				$html .="<tr>
				<td>dfd".$key['cid']."</td>
				<td>".$key['account_name']."</td>
				<td>".$key['account_number']."</td>
				<td>".$key['dob']."</td>
				<td>".$key['address']."</td>
				<td>".$key['emp_name']."</td>
				<td>".$key['phone']."</td>
				<td><a href='".base_url('PP_Caution_Scolare_Loans/customer_details/').$key['cid']."' class='btn btn-primary confirmation' onclick = \"if (! confirm('Continue?')) { return false; }\">
				SELECT</a></td>
			</tr>";
			 }
		}else {			
			$html .="<tr class=\"odd\"><td valign=\"top\" colspan=\"8\" class=\"dataTables_empty\">No matching records found</td></tr>";
		}
			echo $html;
	}

	public function editcustomer()
	{
		$secteurs=$this->PP_Caution_Scolare_Loans_Model->get_target_list_Secteurs();
		$cat_emp=$this->PP_Caution_Scolare_Loans_Model->get_category_of_employers();
		$contract_type=$this->PP_Caution_Scolare_Loans_Model->get_type_of_contract();
		$branch_record=$this->PP_Caution_Scolare_Loans_Model->get_All_branch();		
		$bankdetails=$this->PP_Caution_Scolare_Loans_Model->get_bankdetails();

		$customerID=trim($this->input->post('id'));
		$customerdata=$this->PP_Caution_Scolare_Loans_Model->get_customerdata_info($customerID);
		//echo "<pre>", print_r($customerdata), "</pre>";
		$html='<form role="form" method="post" id="addnewcustomer">
				<div class="modal-body">   
					<div class="error-msg"></div>
					<fieldset>
						<legend>Personal Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>First Name </label>
								<input type="text" class="form-control addvalidate" id="first_name" name="first_name" autocomplete="off" required placeholder="Input First" value="" />
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Middle Name </label>
								<input type="text" class="form-control addvalidate" id="middle_name" name="middle_name" value="" autocomplete="off" placeholder="Input Middle" />
							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Last Name </label>
								<input type="text" class="form-control addvalidate" id="last_name" name="last_name" autocomplete="off" required placeholder="Input Last" value="" />							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Gender</label>
		                      	<select  class="form-control addvalidate" id="gender" name="gender">
	                              <option value="Male" id="Male">Male</option>
	                              <option value="Female" id="Female">Female</option>
	                            </select>
		                    </div>
		                  </div>
		                </div> 

		                <div class="row">
			                <div class="col-md-3">
			                    <div class="form-group">
			                      <label>Date of Birth </label>	
			                      	<input type="text"  class="form-control addvalidate" id="dob" name="dob" placeholder="DD-MM-YYYY" required value="">		                      		
			                    </div>
			                </div>
		                 							  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Education</label>
								<input type="text"  class="form-control addvalidate" id="education" name="education" placeholder="Eg:  MCA"  value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Marital Status</label>';		                      
		                   $marital = array("Célibataire","Marié(e)","Divorcé(e)","Veuf","Veuve");                                  
		                      $html .='<select  class="form-control addvalidate" id="marital_status" name="marital_status">';
		                      	 foreach($marital as $mtype){
                                     $html .='<option value="'.$mtype.'" id="'.$mtype.'" >'.$mtype.'</option>';
                                    }	                              
	                         $html .='</select>							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Email</label>
		                      <input type="email"  class="form-control addvalidate" id="email" name="email" placeholder="eg:example@domain.com" required value=""/>
		                    </div>
		                  </div>
		                </div> 
		                <hr />
					</fieldset>

					<fieldset>
						<legend>Additional Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type ID</label>
								<select  class="form-control addvalidate" id="typeofid" name="typeofid">
	                              <option value="Passport" id="Passport">Passport</option>
	                              <option value="CNI" id="CNI">CNI</option> 
	                              <option value="Recepisse + Acte de Naissance" id="Recepisse + Acte de Naissance">Recepisse + Acte de Naissance</option>
	                              <option value="Carte de Sejour" id="Carte de Sejour">Carte de Sejour</option>
	                            </select>
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Monthly Income</label>		                      
								<input type="number" class="form-control addvalidate" id="monthly_income" name="monthly_income" min="0" required placeholder="Input number" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Monthly Expenses</label>
		                      	<input type="number"  class="form-control addvalidate" id="monthly_expenses" name="monthly_expenses" min="0" required placeholder="Input number" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>ID Number</label>
		                      <input type="text"  class="form-control addvalidate" id="id_number" name="id_number"  placeholder="Input number" required value=""/>
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>State of Issue</label>
								<input type="text"  class="form-control addvalidate" id="state_of_issue" name="state_of_issue" placeholder="Input text" value="" required />
							
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Fonction (Occupation)</label>
								<input type="text" class="form-control required" id="occupation" name="occupation" required placeholder="Input text" value="" />
							</div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Main Phone</label>
								<input type="phone" class="form-control required" id="main_phone" name="main_phone" required placeholder="eg: 222-222-2222" >							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Alternative Phone</label>
		                      <input type="text"  class="form-control addvalidate" id="alter_phone" name="alter_phone"  >
		                    </div>
		                  </div>
		              </div>
		              	<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Expiration Date of the ID</label>
		                      <input type="text" class="form-control addvalidate" id="expiration_date" name="expiration_date" placeholder="DD-MM-YYYY" value="">
		                    </div>
		                  </div>
		                </div> 
					</fieldset>
					<fieldset>
						<legend>Employment Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Name of Employer</label>
		                      <input type="text"  class="form-control addvalidate" id="emp_name" name="emp_name" value="" required placeholder="Input text" />			
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Secteurs</label>		                      					
								<select  class="form-control addvalidate" id="secteurs" name="secteurs">';			
								if(!empty($secteurs)){
									foreach($secteurs as $Key){								
										$html .='<option value="'.$Key['tlc_id'].'" name="'.$Key['secteurs'].'">'.$Key['secteurs'].'</option>';
									}
								}								                                      
								$html .='</select>
							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Catégorie Employeurs</label>
		                      <div class="input-group">								
								<select  class="form-control addvalidate"  id="cat_employeurs" name="cat_employeurs">';
								
									if(!empty($cat_emp)){
										foreach($cat_emp as $Key){										
											$html .='<option value="'.$Key['cat_id'].'" name="'.$Key['catrgory'].'">'.$Key['catrgory'].'</option>';
										}
									}
								$html .='</select>
							</div>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type of Contract</label>
								<select  class="form-control addvalidate" id="typeofcontract" name="typeofcontract" style="width:98%">';
								if(!empty($contract_type)){
									foreach($contract_type as $Key){								
									$html .='<option value="'.$Key['tc_id'].'" name="'.$Key['contract_type'].'">'.$Key['contract_type'].'</option>';
									}
								}
								$html .='</select>
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Employment Date</label>
		                      <input type="text"  class="form-control addvalidate" id="employment_date" name="employment_date" placeholder="DD-MM-YYYY" required value="" />	
		                    </div>
		                  </div>						  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type Contrat</label>
		                      <input type="text"  class="form-control addvalidate" id="edn_date_contract_cdd" name="edn_date_contract_cdd" placeholder="DD-MM-YYYY"  value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>No of Years of Professional Experience</label>
								<input type="number"  class="form-control addvalidate" id="years_professionel_experience" name="years_professionel_experience" placeholder="Input number" value="" min="0" required/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>How He is been with the Current Employer</label>
		                      <input type="text" class="form-control addvalidate" id="current_emp" name="current_emp" placeholder="DD-MM-YYYY" required  >
		                    </div>
		                  </div>
		              </div>
		              	<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Net Salary</label>
		                      <input type="number"  class="form-control addvalidate" id="net_salary" name="net_salary" min="0" required placeholder="Input number" value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Retirement Age expected</label>
		                      <input type="number" class="form-control addvalidate" id="retirement_age_expected" required name="retirement_age_expected" min="0" placeholder="Input number" value="">
		                    </div>
		                  </div>		                  
		                </div> 
					</fieldset>
					<fieldset>
						<legend>Address</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Resides at Address</label>
								<input type="text" class="form-control addvalidate" id="resides_address" name="resides_address" placeholder="Panteón de Marinos" required value="" />
							</div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Street</label>	                      							
								<input type="text"  class="form-control addvalidate" id="street" name="street" placeholder="Peejayem" required value="" />
							</div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>City</label>
								<input type="text"  class="form-control addvalidate" id="city" name="city"  placeholder="Cádiz" required value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>State</label>
		                      <input type="text"  class="form-control addvalidate" id="state" name="state" placeholder="San Fernando" required value="" />
		                    </div>
		                  </div>
		                  <hr />
		                </div>
					</fieldset>

					<fieldset>
						<legend>Bank Account</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type of Account</label>';
		                      
                                  $atype = array(
                                    "Saving Account",
                                    "Regular Savings",
                                    "Current Account",
                                    "Recurring Deposit Account",
                                    "Fixed Deposit Account",
                                    "Demat Account",
                                    "NRI Accounts",
                                  );
                                  $html .='<select  class="form-control addvalidate" name="account_type" id="account_type" style="width:98%" required >';
                                    foreach($atype as $type){
                                      $html .='<option value="'.$type.'">'.$type.'</option>';
                                    }
                                  $html .='</select>
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Account Number</label>
								<input type="text"  class="form-control addvalidate" id="accoumt_number" name="accoumt_number" placeholder="San Fernando" required value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Banking Agency</label>	
	                      		<select  class="form-control addvalidate" name="bank_name" id="bank_name" style="width:98%" required >';
	                                 foreach($branch_record as $type){	
	                                 $html .='<option value="'.$type['branch_name'].'">'.$type['branch_name'].'</option>';
	                                }
	                            $html .='</select>								
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Bank Phone</label>
		                      <input type="text"  class="form-control addvalidate" id="bank_phone" name="bank_phone" placeholder="(__)_-___-__" required />
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Opening Date</label>
		                      <input type="text"  class="form-control addvalidate" id="opening_date" name="opening_date" placeholder="DD-MM-YYYY" required value="">
		                    </div>
		                  </div>		                 
		              </div>		              	
					</fieldset>

					<fieldset>
						<legend>Other Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                    	<label>Bank Code</label>		                      
								<input type="text"  class="form-control addvalidate" id="another_test" name="another_test" placeholder="Input text" />
							</div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Agency Code</label>
		                      <input type="text"  class="form-control addvalidate" id="test_field" name="test_field" value="" placeholder="Input text" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>RIB key</label>
		                      <input type="text"  class="form-control addvalidate" id="test_david" name="test_david" placeholder="Input text" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Amount Insurrance</label>
		                      	<input type="number"  class="form-control addvalidate" id="cc_test" name="cc_test" placeholder="123456" min="0" />
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Objet of the Credit</label>';
								
                                  $objcredit = array(
                                    "Consomation",
                                    "Equipement",
                                    "Immobilier",
                                    "Scolaire",
                                    "Autres",
                                  ); 
                                  $html .='<select  class="form-control addvalidate" name="obj_credit" id="obj_credit" style="width:98%">';
                                     foreach($objcredit as $credit){
                                      $html .='<option value="'.$credit.'" name="'.$credit.'">'.$credit.'</option>';
                                    }
                                  $html .='</select>						
		                    </div>
		                  </div>

		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>FRAIS de DOSSIER</label>
								<input type="number" class="form-control addvalidate" id="frais_de_dossier" name="frais_de_dossier" autocomplete="off" min="0" required value="" />							
		                    </div>
		                  </div>
		              </div>		              
					</fieldset>

					<div class="row">
		              	<div class="col-md-12">
		              		<textarea class="outputdata"  class="form-control" rows="10" cols="100%" style="display: none"></textarea>
		              	</div>
		              </div>				         
			  	</div>

			  	<div class="row">
		            <div class="response-msg col-md-12"></div>
			  	</div>
			  	<div class="modal-footer justify-content-center">
				  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn">
				  	<img src="'.base_url('assets/img/select2-spinner.gif').'" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Submit</button>
				  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button>
				</div>
			</form>';
			echo $html;
	}
	

	public function is_ajax_request()
	{
		//print_r($_POST); //exit;		
		$customerid=$this->input->post('customerid');
		$segment=$this->input->post('segment');
		$record=$this->PP_Caution_Scolare_Loans_Model->get_temp_applicationformRecord($segment);			
		
		//echo "<pre>", print_r($record), "</pre>";
		$appliedformdata=json_encode($record);
		foreach($record as $loca) {
			$data = array(
				'admin_id'=>$this->session->userdata('id'),
				'customar_id'=>$customerid,				
				'application_no'=>trim($loca['application_no']),
				'ip_address' =>trim($loca['ip_address']),
	            'loan_type' =>trim($loca['loan_type']),
	            'loan_amt' =>trim($loca['net_block_amt']),
	            'loan_interest' =>trim($loca['loan_interest']),
	            'deposit_amount' =>trim($loca['deposit_amount']),
	            'study_costs' =>trim($loca['study_costs']),
	            'transfer_fee' =>trim($loca['transfer_fee']),
	            'tva_studycosts_calculator' =>trim($loca['tva_studycosts_calculator']),
	            'tva_transferfee_calculator' =>trim($loca['tva_transferfee_calculator']),
	            't1_equity_calculator' =>trim($loca['t1_equity_calculator']),
	            't2_study_costs_calculator' =>trim($loca['t2_study_costs_calculator']),
	            't2_transfer_fee_calculator' =>trim($loca['t2_transfer_fee_calculator']),
	            'net_pay_amt' =>trim($loca['net_pay_amt']),
	            'net_block_amt' =>trim($loca['net_block_amt']),
	            'percentage' =>trim($loca['percentage']),
	            'filename'=>trim($loca['filename']),
	            'appliedformdata'=>$appliedformdata,
	            'loan_status' =>'Process',
	            "created" =>date('Y-m-d H:i:s'),
	            "modified" =>date('Y-m-d H:i:s')
	        );
		}
		//echo "<pre>", print_r($record), "</pre>";
		//exit;			
		$res=$this->PP_Caution_Scolare_Loans_Model->insertRow('caution_scolaire_loans_applicationform',$data);
		if($res){
			$array=array('temp_id' =>$segment, );
			$details="Nouveau formulaire de demande de prêt créé avec le montant CFA ".number_format($record[0]['net_block_amt'],0,',',' ')." et application number is ".$record[0]['application_no']." en cours de traitement";
				$history_arr=array(
					"cl_aid" =>$res,
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>$customerid,
					"loan_type"=>trim($loca['loan_type']),
					"comment" =>$details,
					"content_type"=>'text',			
					"created" =>date('Y-m-d H:i:s')
				);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
			$this->PP_Caution_Scolare_Loans_Model->delete_data('temp_applicationform_caution_scolaire',$array);
			echo $res;
		}else{
			echo 0;
		}
	}

	public function edit_loan(){    	
    	sleep(2);
    	$ip = $_SERVER['REMOTE_ADDR'];
		//print_r($_POST); //exit;
		$crecord=$this->PP_Caution_Scolare_Loans_Model->get_checkfieldandvalue($this->input->post('editid'));
		$erecord=$this->PP_Caution_Scolare_Loans_Model->get_edit_customar_applicationform($this->input->post('editid'));

		//echo $erecord[0]['amortization_id']; exit;
		$da=json_decode($erecord[0]['appliedformdata']);
		$this->form_validation->set_rules('loan_type', 'Loan Type', 'required');
    	$this->form_validation->set_rules('loan_amt', 'Amount','trim|required');
    	$this->form_validation->set_rules('loan_interest', 'Interest', 'trim|required|min_length[2]|max_length[4]');
    	$this->form_validation->set_rules('loan_term', 'Term', 'required');
		$this->form_validation->set_rules('loan_schedule', 'Schedule', 'required');
		if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo validation_errors();
        }else{

        	$amount=trim($this->input->post('loan_amt'));		
			$rate=trim($this->input->post('loan_interest'));
			$rt=($rate*(1+19.25/100));
			$rate=$rt;
			if($this->input->post('loan_schedule')=='Monthly'){
				$year=(trim($this->input->post('loan_term'))/12);
			}else if($this->input->post('loan_schedule')=='Yearly'){
				$year=trim($this->input->post('loan_term'));
			}
			else if($this->input->post('loan_schedule')=='Half Yearly'){
				$year=trim($this->input->post('loan_term')*2/12);
			}
			$years=$year;
			$years=$years;
			$curd=date("Y-m-d", strtotime($erecord[0]['created']));
			$loan_interest =$rate;	
			$am=new Class_Amort();
			$am->amort($amount,$rate,$years,$curd, $loan_interest);	
			//echo "<pre>", print_r($am), "</pre>"; exit;

			$return_arr1=array();
			$postyer=$am->years*12;
			$ebal = $am->amount;
			$ccint =0.0;
			$cpmnt = 0.0;
			$cdate=$am->cdate;
			for ($i = 1; $i <= $am->npmts; $i++){
				$bbal = $ebal;    
			    $ipmnt = $bbal * $am->mrate;
			    $ppmnt = $am->pmnt - $ipmnt;
			    $ebal = $bbal - $ppmnt;
			    $ccint = $ccint + $ipmnt;
			    $cpmnt = $am->pmnt;
			    $pbint = $bbal*$this->input->post('loan_interest')/100/12;
			    $vbint = $pbint*19.25/100;
			    $months=$am->npmts;

				$rowarray['Pmt'] = $i;					
				$rowarray['bbegin_periode'] = $bbal; 
				$rowarray['b_end_periode'] = $ebal;
				$rowarray['principal_payment'] = $ppmnt; 
				$rowarray['interest_paid_tax_incl'] = $ipmnt; 
				$rowarray['interest_paid_befor_tax'] = $pbint; 
				$rowarray['vat_on_interest'] = $vbint; 
				$rowarray['monthly_payment'] = $cpmnt; 
				$rowarray['month'] = date("m", strtotime( $cdate." +$i months"));
				$rowarray['years'] = date("Y", strtotime( $cdate." +$i months"));		    	
		    	array_push($return_arr1,$rowarray);
		    }
		    $amortizationdatabinding=json_encode($return_arr1);
		    $row_array=array();
			$return_arr=array(
				"application_no" =>$da[0]->application_no,
	            "ip_address" =>$da[0]->ip_address,
	            "loan_type"=>$da[0]->loan_type,
	            "loan_amt"=>$this->input->post('loan_amt'),
	            "loan_interest"=>$this->input->post('loan_interest'),
	            "loan_term"=>$this->input->post('loan_term'),
	            "loan_schedule"=>$this->input->post('loan_schedule'),
	            "loan_fee"=>$this->input->post('loan_fee'),
	            "loan_tax"=>$this->input->post('loan_tax'),
	            "loan_commission"=>$this->input->post('loan_commission')
		    );	    		
			array_push($row_array, $return_arr);
			$databinding=json_encode($row_array);
			$update_amortization=array(
					"applicationform_id"=>trim($this->input->post('editid')),
					"admin_id"=>trim($this->session->userdata('id')),
					"loan_type"=>trim($this->input->post('loan_type')),
					"amount" =>trim($this->input->post('loan_amt')),
					"interest"=>trim($this->input->post('loan_interest')),
					"rate"=>trim($am->rate),
					"years"=>$postyer,
					"npmts"=>trim($am->npmts),
					"mrate"=>trim($am->mrate),
					"smrate"=>trim($am->smrate),
					"tpmnt"=>trim($am->tpmnt),
					"tint"=>trim($am->tint),
					"pmnt"=>trim($am->pmnt),
					"cdate"=>trim($am->cdate),
					"databinding"=>trim($amortizationdatabinding),
				);
			$data = array(			
	            'loan_type' =>trim($this->input->post('loan_type')),
	            'loan_amt' =>trim($this->input->post('loan_amt')),
	            'loan_interest' => $this->input->post('loan_interest'),
	            'loan_term' => $this->input->post('loan_term'),
	            'loan_schedule' => $this->input->post('loan_schedule'),            
	            'loan_fee' => $this->input->post('loan_fee'),
	            'loan_tax' => $this->input->post('loan_tax'),
	            'loan_commission' => $this->input->post('loan_commission'),
	            'appliedformdata'=>trim($databinding),
	        );
		$msg='Updated Loan Information ';		
		if($crecord[0]->loan_amt!=$this->input->post('loan_amt')){
		$msg .='amount is '.$crecord[0]->loan_amt.' to '.$this->input->post('loan_amt').'|';
		}
		if($crecord[0]->loan_interest!=$this->input->post('loan_interest')){
			$msg .='interest is '.$crecord[0]->loan_interest.' to '.$this->input->post('loan_interest').'';
		}
		if($crecord[0]->loan_term!=$this->input->post('loan_term')){
			$msg .='term is '.$crecord[0]->loan_term.' to '.$this->input->post('loan_term').'|';
		}
		if($crecord[0]->loan_schedule!=$this->input->post('loan_schedule')){
			$msg .='schedule is '.$crecord[0]->loan_schedule.' to '.$this->input->post('loan_schedule').'';
		}
		if($crecord[0]->loan_tax!=$this->input->post('loan_tax')){
			$msg .='taxes is '.$crecord[0]->loan_tax.' to '.$this->input->post('loan_tax').'|';			
		}
		if($crecord[0]->loan_commission!=$this->input->post('loan_commission')){
			$msg .='commission is '.$crecord[0]->loan_commission.' to '.$this->input->post('loan_commission').'|';
		}       
		$msg=str_replace('|', ', ', $msg); 		
        $edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('caution_scolaire_loans_applicationform', 'cl_aid', $this->input->post('editid'),$data);
        $Amortization=$this->PP_Caution_Scolare_Loans_Model->updateRow('consumer_amortization', 'id',$erecord[0]['amortization_id'], $update_amortization);
        $details=$msg;		
			$history_arr=array(
				"cl_aid" =>$this->input->post('editid'),
				"admin_id" =>$this->session->userdata('id'),				
				"comment" =>$details,
				"loan_type"=>trim($this->input->post('loan_type')),			
				"created" =>date('Y-m-d h:i:s')
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
        if($edit){
        	echo 1;
        }
		}        
    }
    public function interaction_email()
    {
    	//echo "<pre>", print_r($_POST),"</pre>"; exit;
    	$row_array=array();
    	$recordmail=$this->Common_model->get_admin_details(2);
    	$config['mailtype'] = 'html';
    	$this->load->library('email',$config);
    	
    	$this->form_validation->set_rules('field_name', 'Nom et Prénoms', 'required');
    	$this->form_validation->set_rules('fieldemail', 'Email Field One', 'required|trim|valid_email');
    	$this->form_validation->set_rules('fieldsubject', 'Subject Field One', 'required');
    	$this->form_validation->set_rules('fieldmsg', 'Message Field One', 'required');

    	if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo validation_errors();
        }
        else
        {    
            $maildata = array(			
                'field_name' =>trim($this->input->post('field_name')),
                'fieldemail' =>trim($this->input->post('fieldemail')),
                'fieldsubject' => $this->input->post('fieldsubject'),
                'fieldmsg' => $this->input->post('fieldmsg'),                    
            );
            array_push($row_array, $maildata);
		    $databinding=json_encode($row_array);
    		$data=array(
    			'cl_aid'=>trim($this->input->post('cl_aid')),
    			'admin_id' =>trim($this->session->userdata('id')),
    			'mailcontent' =>trim($databinding),
    			'mode'=>trim('mail'),
    			'loan_type' =>trim($this->input->post('loan_type')),
    			'section' =>1,
    			'status'=>4,
    		);
            $rsid=$this->PP_Caution_Scolare_Loans_Model->insertRow('interaction_history',$data);
            $body= '<table border="1" width="350px">
				  <tr>
				    <td width="20%"><strong>Nom et Prénoms</strong></td>
				    <td width="80%">'.$this->input->post("field_name").'</td>
				  </tr>
				    <tr>
				    <td width="20%"><strong>Message</strong></td>
				    <td width="80%">'.$this->input->post("fieldmsg").'</td>
				  </tr>					  
				</table>';
				$config['mailtype'] = 'html';
				$this->email->set_mailtype("html");		    	
    			$this->load->library('email',$config);
    		    $emailto = $this->input->post("fieldemail");   
    		    $this->email->from($this->session->userdata('email'),$recordmail[0]->type);
    		    $this->email->to($emailto, $this->input->post("field_name"));
    		    $this->email->subject('Caution Scolare Loans-Interaction'. $this->input->post("fieldsubject"));
    		    $this->email->message($body);		    
    		    $send = $this->email->send();
    		    if ($send) {    		       
    		       $details="Account Manager Sent a Mail Consumer Loans-Interaction.";
					$history_arr=array(
						"cl_aid" =>$this->input->post("cl_aid"),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>trim($this->input->post("customar_id")),
						"loan_type"=>4,
						"comment" =>$details,
						"content_type"=>"mail",			
						"created" =>date('Y-m-d H:i:s')
					);
				$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
				echo 'success';

    		    } else {
    		       echo 'error' .$this->email->print_debugger();
    		       //$data=array('status'=>0);
    		       $this->PP_Caution_Scolare_Loans_Model->updateRow('interaction_history', 'id',$rsid,array('status'=>0));
    		    }
		}
    }
	
//	System Docs upload files	
	public function uploadfile_split(){
		//echo "<pre>",print_r($_POST), "</pre>"; exit;
		//echo "<pre>",print_r($_FILES), "</pre>"; exit;		
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/caution_scolaire/system-docs/';
			$config["allowed_types"] ='*';
			$config['max_size'] = '0';			
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE;			   
		   $this->load->library('upload', $config);
		   $this->upload->initialize($config);
		   $filesCount = count($_FILES['files']['name']);
		   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
		   {
				$_FILES["file"]["name"] = time().$_FILES["files"]["name"][$count];
				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if(!$this->upload->do_upload('file'))
				{					
					$output= array('error' => $this->upload->display_errors());
				}
				else{
					sleep(1);
					$filename = $this->upload->data();					
					$fileextension=pathinfo($filename['file_ext'], PATHINFO_EXTENSION);
					
					$data= array(
			        	'filesname'=>$filename['file_name'],
						'raw_name'=>$_FILES["files"]['name'][$count],
						'file_path'=>$filename['file_path'],
						'full_path'=>$filename['full_path'],						
						'file_type'=>$filename['file_type'],
						'file_size'=>$filename['file_size'],
						'file_extension'=>$filename['file_ext'],
			        	'admin_id'=>$this->session->userdata('id'),
						'cl_aid'=>$this->input->post("id"),
						'section'=>1,
						'loan_type'=>$this->input->post("loan_type_id"),
			    	);
					$rsid=$this->PP_Caution_Scolare_Loans_Model->insertRow('system_docs',$data);
					$output=array('success' => $filesCount." files successfully upload.");
				}
		   }
		   if(!empty($output['success'])){
	  			$details="Account Manager ".$filesCount." files upload in system documents.";
				$history_arr=array(
					"cl_aid" =>$this->input->post("id"),
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>trim($this->input->post("customar_id")),
					"loan_type"=>$this->input->post("loan_type_id"),
					"comment" =>$details,
					"content_type"=>$fileextension,
					"created" =>date('Y-m-d H:i:s')
				);
				$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
			}
		   echo json_encode($output);
		}		
	}
		
	public function downloadall(){
        $createdzipsystemdocs = 'systemdocs';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Caution_Scolare_Loans_Model->get_filedata($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths = './assets/caution_scolaire/system-docs/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
    }
	
	
	public function downloadallCheckList(){
        $createdzipchecklist = 'checklist-customer-documents';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Caution_Scolare_Loans_Model->get_check_list_customer_documents($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');

        foreach ($files as $file) {			
            $paths = './assets/caution_scolaire/check-list-customer/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipchecklist.'.zip');
    }
	/*
	**
	================================================
	UPLOAD FILES FOR CHECK LISTDOCUMENTS A FOURNIR
	================================================
	**
	*/
	public function uploadfile_check_list(){
		if($_FILES["files"]["name"] != '')
		{
			$output = '';
			$config["upload_path"] = './assets/caution_scolaire/check-list-customer/';   
			$config["allowed_types"] = '*';
			$config['max_size'] = '0';
			$config['encrypt_name'] = TRUE;
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$filesCount = count($_FILES['files']['name']);			   
		for($count =0; $count<$filesCount; $count++)
		{
			$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
			$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
			$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
			$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
			$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
			if(!$this->upload->do_upload('file'))
			{
				$output= array('error' => $this->upload->display_errors());
			}else{
			sleep(1);
		 	$filename = $this->upload->data();		 	
		 	$fileextension=pathinfo($filename['file_ext'], PATHINFO_EXTENSION);
			 $data= array(
				'filesname'=>$filename['file_name'],
				'raw_name'=>$filename['orig_name'],
				'file_path'=>$filename['file_path'],
				'full_path'=>$filename['full_path'],						
				'file_type'=>$filename['file_type'],
				'file_size'=>$filename['file_size'],
				'file_extension'=>$filename['file_ext'],
				'admin_id'=>$this->session->userdata('id'),
				'cl_aid'=>$this->input->post("id"),
				'section'=>2,
				'loan_type'=>$this->input->post("loan_type_id"),
				);
				$rsid=$this->PP_Caution_Scolare_Loans_Model->insertRow('system_docs',$data);
				$output=array('success' => $filesCount." files successfully upload.");
			}
		}
		if(!empty($output['success'])){
					$details="Account Manager ".$filesCount." files upload in check list customer documents.";
				$history_arr=array(
					"cl_aid" =>$this->input->post("id"),
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>trim($this->input->post("customar_id")),
					"loan_type"=>4,
					"comment" =>$details,
					"content_type"=>$fileextension,	
					"created" =>date('Y-m-d H:i:s')
				);
				$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
			}
		echo json_encode($output); 

		}
	}
	
	public function addContractType(){
		
		$postId=$this->input->post('postId');
		if(!empty($postId))
		{
			$data=array(
				'contract_type'=>$this->input->post('postId')
			);
			$ress=$this->PP_Caution_Scolare_Loans_Model->insertRow('type_of_contract',$data);
			if($ress){
				$res=$this->PP_Caution_Scolare_Loans_Model->get_type_of_contract();
				if(!empty($res)){
				foreach ($res as $key ) {					
					$return[]=array(
						'id'=>$key['tc_id'],
						'name'=>$key['contract_type']
					);
				}
				}
				echo json_encode($return);
			}
		}
	}

	//==========================collateral Upload 26-06-2019======================================
	
	public function uploadfile_collateral_vehicule()
	{	
		//echo "<pre>", print_r($_POST); exit;

		 if($_FILES["files"]["name"] != '')
			  {
			   $output='';
				$return_arr = array();			   
			   $config["upload_path"] = './assets/collateral/vehicule/';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = TRUE;
			   $config['remove_spaces'] = TRUE;
			   //$config['file_ext_tolower'] = TRUE;			   
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
				
				$this->form_validation->set_error_delimiters('<span>', '</span>');
				$this->form_validation->set_rules('vehicule_type','Type', 'required');
				$this->form_validation->set_rules('vehicule_marque','Marque', 'required');
				$this->form_validation->set_rules('vehicule_modele','Modèle', 'required');
				$this->form_validation->set_rules('vehicule_carte_grise','Carte Grise', 'required');
				$this->form_validation->set_rules('vehicule_style','Style', 'required');
				$this->form_validation->set_rules('vehicule_annee','Année', 'required');
				$this->form_validation->set_rules('vehicule_kilometrage','Kilométrage', 'required');
				//$this->form_validation->set_rules('vehicule_commentaire','Commentaire', 'required');
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}else{
					sleep(1);
					$data= array(
						'cl_aid'=>$this->input->post('cl_aid'),
						'admin_id'=>trim($this->session->userdata('id')),						
						'customer_id'=>$this->input->post('vcustomar_id'),
						'selected_field'=>trim($this->input->post('collateraltype')),
						'v_type'=>$this->input->post('vehicule_type'),
						'v_marque'=>$this->input->post('vehicule_marque'),
						'v_modele'=>$this->input->post('vehicule_modele'),
						'v_carte_grise'=>$this->input->post('vehicule_carte_grise'),
						'v_style'=>$this->input->post('vehicule_style'),
						'v_annee'=>$this->input->post('vehicule_annee'),
						'v_kilometrage'=>$this->input->post('vehicule_kilometrage'),
						'v_commentaire'=>$this->input->post('vehicule_commentaire'),
						'loan_type'=>4,
						'section'=>1,
					);
					$getid=$this->PP_Caution_Scolare_Loans_Model->insertRow('collateral',$data);
					if($getid){			   
						for($count =0; $count<$filesCount; $count++)
						{
							$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
							$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
							$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
							$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
							$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
							if(!$this->upload->do_upload('file'))
							{
								$output=array('error' => $this->upload->display_errors());
					}else{
						$filename = $this->upload->data();
						$fileextension=pathinfo($filename['file_ext'], PATHINFO_EXTENSION);
							$filedata= array(
								'collateral_id'=>$getid,						
								'file_name'=>$filename['file_name'],
								'file_type'=>$filename['file_type'],
								'file_path'=>$filename['file_path'],
								'full_path'=>$filename['full_path'],
								'raw_name'=>$filename['raw_name'],
								'orig_name'=>$_FILES["files"]['name'][$count],
								'client_name'=>$filename['client_name'],
								'file_extension'=>$filename['file_ext'],
								'file_size'=>$filename['file_size'],
								"section"=>1,
								'loan_type'=>4,							
							);			
							$rsid=$this->PP_Caution_Scolare_Loans_Model->insertRow('collateral_files',$filedata);
							$details="Collateral Véhicule ".$filesCount." file upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cl_aid'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('vcustomar_id'),
									"loan_type"=>4,
									'content_type'=>$fileextension,	
									"comment" =>$details,			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
							$output=array('success' => $filesCount." files successfully upload.");
							}
						}
					}
			   }			   
			   echo json_encode($output);
			  }
		
	}
	public function uploadfile_collateral_deposit()
	{
		//print_r($_POST); exit;
		if($_FILES["files"]["name"] != '')
			{
			   $output = '';
			   $config["upload_path"] = './assets/collateral/deposit/';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = TRUE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
			   
				$this->form_validation->set_error_delimiters('<span>', '</span>');
				$this->form_validation->set_rules('d_numero_de_compte','Numéro de compte', 'required');
				$this->form_validation->set_rules('d_montant','Montant', 'required');
				
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}else{
				sleep(1);					
						$data= array(
							'cl_aid'=>$this->input->post('cl_aid'),
							'admin_id'=>trim($this->session->userdata('id')),					
							'customer_id'=>$this->input->post('customar_id'),
							'selected_field'=>trim($this->input->post('collateraltype')),		
							'd_numero_de_compte'=>$this->input->post('d_numero_de_compte'),
							'd_montant'=>$this->input->post('d_montant'),						
							'section'=>1,
							'loan_type'=>4,
						);
						$getid=$this->PP_Caution_Scolare_Loans_Model->insertRow('collateral',$data);
						if($getid){			   
						   for($count =0; $count<$filesCount; $count++)
						   {
							$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
							$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
							$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
							$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
							$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
							if(!$this->upload->do_upload('file'))
							{
								$output= array('error' => $this->upload->display_errors());
							}else{
								$filename = $this->upload->data();
								$fileextension=pathinfo($filename['file_ext'], PATHINFO_EXTENSION);
								$filedata= array(
									'collateral_id'=>$getid,						
									'file_name'=>$filename['file_name'],
									'file_type'=>$filename['file_type'],
									'file_path'=>$filename['file_path'],
									'full_path'=>$filename['full_path'],
									'raw_name'=>$filename['raw_name'],
									'orig_name'=>$_FILES["files"]['name'][$count],
									'client_name'=>$filename['client_name'],
									'file_extension'=>$filename['file_ext'],
									'file_size'=>$filename['file_size'],
									'section'=>1,
									'loan_type'=>4,							
								);											
								$rsid=$this->PP_Caution_Scolare_Loans_Model->insertRow('collateral_files',$filedata);
								$details="Collateral Déposit ".$filesCount." file upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cap_id'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>4,
									"comment" =>$details,
									'content_type'=>$fileextension,				
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
									$output=array('success' => $filesCount." files successfully upload.");
									}
								}
						   }
				}			   
			   echo json_encode($output); 
			   
			}
	}
	
	public function uploadfile_collateral_maison()
	{
		 if($_FILES["files"]["name"] != '')
			{
			   $output = '';
			   $config["upload_path"] = './assets/collateral/maison/';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = TRUE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
			   
			   $this->form_validation->set_error_delimiters('<span>', '</span>');
				$this->form_validation->set_rules('m_type_de_proprietaire','Type de propriétaire', 'required');
				$this->form_validation->set_rules('m_etatde_maison','Etat de la maison', 'required');
				$this->form_validation->set_rules('m_annee_construction','Année de construction', 'required');
				$this->form_validation->set_rules('m_nombre_de_piece','Nombre de pièce', 'required');
				$this->form_validation->set_rules('m_adresse','Adresse', 'required');
				$this->form_validation->set_rules('m_titre_foncier','Titre foncier', 'required');
				$this->form_validation->set_rules('m_superficie','Superficie', 'required');
				//$this->form_validation->set_rules('m_commentaire','Commentaire', 'required');
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}
				else
				{
					sleep(2);
					$data= array(
						'cl_aid'=>$this->input->post('cl_aid'),
						'admin_id'=>trim($this->session->userdata('id')),						
						'customer_id'=>$this->input->post('customar_id'),
						'selected_field'=>trim($this->input->post('collateraltype')),
						'm_type_de_proprietaire'=>trim($this->input->post('m_type_de_proprietaire')),
						'm_etatde_maison'=>trim($this->input->post('m_etatde_maison')),
						'm_annee_construction'=>trim($this->input->post('m_annee_construction')),
						'm_nombre_de_piece'=>trim($this->input->post('m_nombre_de_piece')),
						'm_adresse'=>trim($this->input->post('m_adresse')),
						'm_titre_foncier'=>trim($this->input->post('m_titre_foncier')),
						'm_superficie'=>trim($this->input->post('m_superficie')),
						'm_commentaire'=>trim($this->input->post('m_commentaire')),
						'loan_type'=>4,
						'section'=>1,
					);	   
					$getid=$this->PP_Caution_Scolare_Loans_Model->insertRow('collateral',$data);
					if($getid)
					{			   
						for($count =0; $count<$filesCount; $count++)
						{
							$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
							$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
							$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
							$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
							$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
							if(!$this->upload->do_upload('file'))
							{
								$output= array('error' => $this->upload->display_errors());
							}
							else{
								$filename = $this->upload->data();
								$fileextension=pathinfo($filename['file_ext'], PATHINFO_EXTENSION);							
								$filedata= array(
									'collateral_id'=>$getid,						
									'file_name'=>$filename['file_name'],
									'file_type'=>$filename['file_type'],
									'file_path'=>$filename['file_path'],
									'full_path'=>$filename['full_path'],
									'raw_name'=>$filename['raw_name'],
									'orig_name'=>$_FILES["files"]['name'][$count],
									'client_name'=>$filename['client_name'],
									'file_extension'=>$filename['file_ext'],
									'file_size'=>$filename['file_size'],									
									'section'=>1,
									'loan_type'=>4,
								);			
								$rsid=$this->PP_Caution_Scolare_Loans_Model->insertRow('collateral_files',$filedata);
								$details="Collateral Maison ".$filesCount." file upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cl_aid'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>4,
									"comment" =>$details,
									'content_type'=>$fileextension,
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
								$output=array('success' => $filesCount." files successfully upload.");
							}
						}
					}
				}
				echo json_encode($output); 
			}
	}
	
	public function uploadfile_collateral_excemption()
	{
		sleep(2);
		if($_FILES["files"]["name"] != '')
		{
			$output = '';
			$config["upload_path"] = './assets/collateral/excemption';
			$config["allowed_types"] = '*';
			$config['max_size'] = '0';
			$config['overwrite'] = '0';
			$config['encrypt_name'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['file_ext_tolower'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$filesCount = count($_FILES['files']['name']);
			$data= array(
				'cl_aid'=>$this->input->post('cl_aid'),
				'admin_id'=>trim($this->session->userdata('id')),
				'customer_id'=>trim($this->input->post("customar_id")),	
				'selected_field'=>trim($this->input->post('collateraltype')),
				'section'=>1,
				'loan_type'=>4,
			);
			$getid=$this->PP_Caution_Scolare_Loans_Model->insertRow('collateral',$data);
			if($getid)
			{
			   for($count =0; $count<$filesCount; $count++)
			   {
					$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
					$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
					$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
					$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
					$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if(!$this->upload->do_upload('file'))
				{
					$output= array('error' => $this->upload->display_errors());
				}else{
					$filename = $this->upload->data();
					$fileextension=pathinfo($filename['file_ext'], PATHINFO_EXTENSION);
					$filedata= array(
						'collateral_id'=>$getid,						
						'file_name'=>$filename['file_name'],
						'file_type'=>$filename['file_type'],
						'file_path'=>$filename['file_path'],
						'full_path'=>$filename['full_path'],
						'raw_name'=>$filename['raw_name'],
						'orig_name'=>$_FILES["files"]['name'][$count],
						'client_name'=>$filename['client_name'],
						'file_extension'=>$filename['file_ext'],
						'file_size'=>$filename['file_size'],
						'section'=>1,
						'loan_type'=>4,							
					);
					$rsid=$this->PP_Caution_Scolare_Loans_Model->insertRow('collateral_files',$filedata);
					$details="Collateral Excemption ".$filesCount." file upload.";
					$history_arr=array(
						"cl_aid" =>$this->input->post('cl_aid'),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>$this->input->post('customar_id'),
						"loan_type"=>4,
						"comment" =>$details,
						'content_type'=>$fileextension,
						"created" =>date('Y-m-d H:i:s')
					);
					$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
					$output=array('success' => $filesCount." files successfully upload.");
					}
				}
			}			  
			echo json_encode($output); 			   
		}
	}
	
		
	public function collateral_preview()
	{	
		$html ='';
		//sleep(2);
		$collateralfiles=$this->PP_Caution_Scolare_Loans_Model->get_collateralFiles($this->input->post('id'));
		//echo "<pre>", print_r($collateralfiles),"</pre>";
		//exit;
		if(!empty($collateralfiles[0]["selected_field"])){
			$displaydata=$collateralfiles[0]["selected_field"];
		}else{
			$displaydata='';
		}
			
			$html .='<div class="modal-header">';
			$html .='<button type="button" class="close" data-dismiss="modal">&times;</button>';
			$html .='<h4 class="modal-title heading lead">'.$displaydata.' Documents</h4>';
			$html .='</div>';
			$html .='<div class="modal-body">';
			$html .='<ul class="list-group">';
			$i=1;
			if(!empty($collateralfiles)){
				foreach($collateralfiles AS $files){				
					$html .='<li class="list-group-item alert alert-success">';
							if($files['file_extension']=='.pdf'){
								$html .='<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
							}else if($files['file_extension']=='.docx' || $files['file_extension']=='.doc'){
								$html .='<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
							}
							else if($files['file_extension']=='.jpeg' || $files['file_extension']=='.jpg' || $files['file_extension']=='.png'){
								$html .='<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
							}
						 $html .=$i."-". ucwords($files['orig_name']);
					$html .='</li>';			
				$i++;
			 }
			}
			$html .='</ul>';
			$html .='</div>';
			$html .='<div class="modal-footer">';
			$html .='<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button>';
			$html .='</div>';	
		
		echo $html;		
	}
	
	public function download_collateralvehicule(){
		$createdzipsystemdocs = 'collateral.vehicule';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Caution_Scolare_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/vehicule/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	public function download_collateraldeposit(){
		$createdzipsystemdocs = 'collateral.deposit';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Caution_Scolare_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/deposit/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	public function download_collateralmaison(){
		$createdzipsystemdocs = 'collateral.maison';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Caution_Scolare_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/maison/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	public function download_collateralexcemption(){
		$createdzipsystemdocs = 'collateral.excemption';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Caution_Scolare_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/excemption/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	
	public function uploadfile_risk_analysis(){
		//print_r($_FILES);
		//print_r($_POST); exit;  
		/*[id] => 1
		[admin_id] => 2
		[customar_id] => 6
		[loan_type_id] => 4*/ 		
		sleep(1);
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/riskanalysis/';
		   $config["allowed_types"] = '*';
		   	$config['max_size'] = '0';
		   	$config['encrypt_name'] = TRUE;
		   	$config['remove_spaces'] = TRUE;
		   $this->load->library('upload', $config);
		   $this->upload->initialize($config);
		   
		   $filesCount = count($_FILES['files']['name']);				   
		   for($count =0; $count<$filesCount; $count++)
		   {
				$_FILES["file"]["name"] = time().$_FILES["files"]["name"][$count];
				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if(!$this->upload->do_upload('file'))
				{
					$output= array('error' => $this->upload->display_errors());
				}else{
					$filename = $this->upload->data();
					$fileextension=pathinfo($filename['file_ext'], PATHINFO_EXTENSION);
					$filedata= array(							
						'admin_id'=>trim($this->session->userdata('id')),
						'cl_aid'=>trim($this->input->post("id")),
						'filesname'=>$filename['file_name'],
						'raw_name'=>$_FILES["files"]["name"][$count],
						'file_path'=>$filename['file_path'],
						'full_path'=>$filename['full_path'],						
						'file_type'=>$filename['file_type'],
						'file_size'=>$filename['file_size'],
						'file_extension'=>$filename['file_ext'],
						"loan_type"=>trim($this->input->post('loan_type_id')),
						'section'=>1,							
					);			
					$rsid=$this->PP_Caution_Scolare_Loans_Model->insertRow('riskanalysis',$filedata);
					$details="Risk Analysis ".$filesCount." file upload.";
					$history_arr=array(
						"cl_aid" =>$this->input->post('id'),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>$this->input->post('customar_id'),
						"loan_type"=>trim($this->input->post('loan_type_id')),
						"comment" =>$details,
						"content_type"=>$fileextension,			
						"created" =>date('Y-m-d H:i:s')
					);
					$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
					$output=array('success' => $filesCount." files successfully upload.");
				}
			}		  
		   //print_r($output);
		   echo json_encode($output); 		   
		}
	}
	
	
	public function download_analysisfiles(){
		//print "hello"; exit;
        $createdzipsystemdocs = 'riskanalysis';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download'); 
		//$paths='';		
        $files = $this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths= './assets/riskanalysis/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths)); 			   
        }		
        $this->zip->download($createdzipsystemdocs.'.zip');
    }
	
	
	
	//==========================today 24-06-2019======================================
	public function riskanalysis_current_monthly_credit()
	{
		//print_r($_POST); exit;
		$recordcheck=$this->PP_Caution_Scolare_Loans_Model->check_riskanalysis_current_monthly_credit($this->input->post('cl_aid'));
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
			'customer_id' => $this->input->post('customar_id'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>1,
			'cresco'=> $this->input->post('cresco_current'),
			'decouvert' => $this->input->post('decouvert_current'),
			'cmt' => $this->input->post('cmt_current'),
			'cct' => $this->input->post('cct_current'),
			'total_clc' => $this->input->post('total_clc'),
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('riskanalysis_current_monthly_credit', 'rcic_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Caution_Scolare_Loans_Model->insertRow('riskanalysis_current_monthly_credit',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}			
	}
	
	public function riskanalysis_monthly_payment_new_loan()
	{
		//echo "<pre>", print_r($_POST),"</pre>";exit;		
		$recordcheck=$this->PP_Caution_Scolare_Loans_Model->check_riskanalysis_monthly_payment_new_loan($this->input->post('rcapid'));
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('rcapid')),
			'customer_id' => $this->input->post('rcustomarid'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>2,
			'cresco'=> $this->input->post('cresco_monthly'),
			'decouvert' => $this->input->post('decouvert_monthly'),
			'cmt' => $this->input->post('cmt_monthly'),
			'cct' => $this->input->post('cct_monthly'),
			'total_mlc' => $this->input->post('total_mlc'),
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('riskanalysis_monthly_payment_new_loan', 'rmic_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Caution_Scolare_Loans_Model->insertRow('riskanalysis_monthly_payment_new_loan',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}			
	}
	
	public function riskanalysis_financial_situation()
	{
		$recordcheck=$this->PP_Caution_Scolare_Loans_Model->check_riskanalysis_financial_situation($this->input->post('cl_aid'));		
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
			'customer_id' => $this->input->post('customer_id'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>2,
			'net_salary'=> $this->input->post('net_salary'),
			'income_ratio' => $this->input->post('income_ratio'),
			'quotitecessible' => $this->input->post('quotitecessible'),
			'current_monthly_payments' => $this->input->post('current_monthly_payments'),
			'new_monthly_payment' => $this->input->post('new_monthly_payment'),
			'situation_total' => $this->input->post('situation_total'),
			'income_ratio_after' => $this->input->post('income_ratio_after'),
			'coeficientendettement' => $this->input->post('coeficientendettement'),
		);
		if(!empty($recordcheck)){
				$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('riskanalysis_financial_situation', 'rfs_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Caution_Scolare_Loans_Model->insertRow('riskanalysis_financial_situation',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}
	}


	/*===========Today 12-07-2019================*/

	public function add_newcustomer()
	{
		// print_r($_POST); exit;
		//print_r($this->input->post(),1);
		$isadmin=$this->session->userdata('id');
		$dob=date("Y-m-d", strtotime($this->input->post('dob')));
		
		sleep(2);
		$tbl_cus_field=array(
			"admin_id"=>$isadmin,
			"aid"=>1,
			"account_name"=>$this->input->post('bank_name') ?? "",
			"account_number"=>trim($this->input->post('accoumt_number')) ?? "",
			"dob"=>trim($dob),
			"address"=>$this->input->post('resides_address') ?? "",
			"emp_name"=>trim($this->input->post('emp_name')) ?? "",
			"phone"=>$this->input->post('main_phone') ?? "",
			"created"=>date('Y-m-d H:i:s'),
		);		
		$getid=$this->PP_Caution_Scolare_Loans_Model->insertRow('tbl_customers',$tbl_cus_field);

		if($getid){

			#
			## PERSONAL INFORMATIION
			#
			$tbl_customer_personalinformation=array(
				"customar_id"=>$getid,
				"first_name"=>$this->input->post('first_name') ?? "",
				"middle_name"=>$this->input->post('middle_name') ?? "",
				"last_name"=>$this->input->post('last_name') ?? "",
				"gender"=>$this->input->post('gender') ?? "",
				"dob"=>trim($dob),
				"education"=>$this->input->post('education') ?? "",
				"marital_status"=>$this->input->post('marital_status') ?? "",
				"email"=>trim($this->input->post('email')) ?? "",
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('customer_personalinformation',$tbl_customer_personalinformation);

			#
			## STUDENT INFORMATION
			#
			$tbl_customer_student_information=array(
				"customar_id"=>$getid,
				"type_id"=>trim($this->input->post('typeofid')) ?? "",
				"id_number"=>trim($this->input->post('id_number')) ?? "",
				"first_name"=>$this->input->post('student_first_name') ?? "",
				"last_name"=>$this->input->post('student_last_name') ?? "",
				"date_of_birth"=>$this->input->post('student_dob') ?? "",
				"occupation"=>trim($this->input->post('occupation')) ?? "",
				"main_phone"=>$this->input->post('main_phone') ?? "",
				"alternative_phone"=>$this->input->post('alter_phone') ?? "",
				"expiration_date_id"=>trim(date("Y-m-d", strtotime($this->input->post('expiration_date')))) ?? "",			
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('customer_student_information',$tbl_customer_student_information);
			
			#
			## ACCOUNT INFORMATION
			#
			$tbl_customer_account_information=array(
				"customar_id"=>$getid,
				"admin_id"=>$isadmin,			
				"information"=>"null",
				"field_1"=>trim($this->input->post('account_bank_code')),
				"field_2"=>trim($this->input->post('account_agency_code')),
				"field_3"=>$this->input->post('account_rib_key'),
				"field_4"=>trim($this->input->post('account_account_number')),
				"objet_credit"=>trim($this->input->post('account_obj_credit')),
				"frais_de_dossier"=>"",
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('customer_account_information',$tbl_customer_account_information);

			#
			## BLOCKED ACCOUNT INFORMATION
			#
			$tbl_customer_blocked_account_information=array(
				"customar_id"=>$getid,
				"admin_id"=>$isadmin,			
				"information"=>"null",
				"field_1"=>trim($this->input->post('blocked_bank_code')),
				"field_2"=>trim($this->input->post('blocked_agency_code')),
				"field_3"=>$this->input->post('blocked_rib_key'),
				"field_4"=>trim($this->input->post('blocked_account_number')),
				"objet_credit"=>trim($this->input->post('blocked_obj_credit')),
				"frais_de_dossier"=>"",
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('customer_blocked_account_information',$tbl_customer_blocked_account_information);

			echo "success";
		}else{
			echo "error";
		}
	}	
	
	public function test(){
		$this->data['title'] = 'DCP - pploan';			
		$this->data['record']=$this->Common_model->get_admin_details(2);		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/test', $this->data);
	}

	/*============================Today modify on 19-08-2019=============================*/
	/*Change Type Id*/
	public function changetypeid()
	{
		//print_r($_POST); exit;
		sleep(1);		
		$udata=array("type_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customer_additionalinformation','ai_id', $this->input->post('ai_id'), $udata);
		if($udata){			
	  		$details="Update `Type Id` in additional information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>4,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);		
			echo 1;
		}else{echo 0;}
	}

	/*Change Secteurs*/
	public function changesecteurs()
	{
		sleep(1);	
		//print_r($_POST); exit;	
		$udata=array("secteurs_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('ai_id'), $udata);
		if($udata){
			$details="Update `Secteurs` in employment information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>4,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*Change Catégorie Employeurs*/
	public function changecat_employeurs()	{
		sleep(1);	
		//print_r($_POST); exit;	
		$udata=array("cat_emp_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
		if($udata){
			$details="Update `Catégorie Employeurs` in employment information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>4,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*Change Type of Contract Employeurs*/
	public function change_type_of_contract()
	{
		sleep(1);	
		//print_r($_POST); exit;	
		$udata=array("contract_type_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
		if($udata){
			$details="Update `Type of Contract` in employment information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>4,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*Change Objet of the Credit Other Information*/
	public function change_objet_of_the_credit()
	{
		//print_r($_POST); exit;
		sleep(1);
		$output = '';		
		$obj_arr = array();
		$objcredit = array("Consomation","Equipement","Immobilier","Scolaire","Autres");
		foreach ($objcredit as $key ) {
			$obj_arr[] = array("name" => $key);
		}			
		$udata=array("objet_credit" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customar_other_information','oid', $this->input->post('oid'), $udata);
		if($udata){
			$details="Update `Objet of the Credit` in other information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>4,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
			$output=$obj_arr;
		}else{
			$output=array('error'=>"error");
		}		
		echo json_encode($output);
	}
	/*Change FRAIS dé DOSSIER Other Information*/
	public function postupdate_fees(){	  
		sleep(1);
		//print_r($_POST); exit;
		$eid=$this->input->post('id');
		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customar_other_information','oid', $this->input->post('id'), array('frais_de_dossier'=>trim($this->input->post('data'))));
		if($update){
			$details="Update `FRAIS dé DOSSIER` in other information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>4,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*System Docs Promissory Note*/
	public function promissory_note()
	{
	    error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_promissory_note_form($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		//$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}
	public function	generate_promissory_note_form($id)
	{
		
		//error_reporting(0);
		//echo $id; exit;
		$this->data['appformD']=$this->PP_Caution_Scolare_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Caution_Scolare_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Caution_Scolare_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Caution_Scolare_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Caution_Scolare_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Caution_Scolare_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Caution_Scolare_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Caution_Scolare_Loans_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Caution_Scolare_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Caution_Scolare_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Caution_Scolare_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Caution_Scolare_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Caution_Scolare_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Caution_Scolare_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Caution_Scolare_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Caution_Scolare_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Caution_Scolare_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Caution_Scolare_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Caution_Scolare_Loans_Model->get_applicableloan_ratio();
		
		return  $this->load->view('superadmin/atlantique_preet_scolaire_formulaire_en_anglais',$this->data,true);
	
	}

	/*System Docs Credit Agreement*/
	public function credit_agreement()	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);
		$getHtmlagreement=$this->generate_credit_agreement_form($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		//$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}
	public function generate_credit_agreement_form($id)
	{
		$this->data['appformD']=$this->PP_Caution_Scolare_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		return  $this->load->view('superadmin/atlantique_pret_scolaire_2017_cg_en_anglais',$this->data,true);
	}

	/*Today 19-07-2018 Update*/
	public function enableddisabled()
	{
		//print_r($_POST); exit;
		/*[capid] => 96
	    [post] => Véhicule
	    [val] => 0*/
	    if(!empty($this->input->post('post')))
	    {
	    	if($this->input->post('post')=="Véhicule")
	    	{
	    		$data=array('check_vehicule' =>trim($this->input->post('val')));
	    		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}
	    	if($this->input->post('post')=="Déposit")
	    	{
	    		$data=array('check_deposit' =>trim($this->input->post('val')));
	    		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	} 
	    	if($this->input->post('post')=="Maison")
	    	{
	    		$data=array('check_maison' =>trim($this->input->post('val')));
	    		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}

	    	if($this->input->post('post')=="Excemption")
	    	{
	    		$data=array('check_excemption' =>trim($this->input->post('val')));
	    		$update=$this->PP_Caution_Scolare_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}
	    }
	}
	/*Decision Status Section*/
	public function comment_manager()
	{
		//print_r($this->input->post());
		//exit;
		$comnt='Decision - ';
		$output = '';
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		$this->form_validation->set_rules('decision','Please Select From Below', 'required');
		$this->form_validation->set_rules('commentstatus','Comment', 'required');	
		$this->form_validation->set_message('required', 'You missed the input {field}!');
		if ($this->form_validation->run() == FALSE)
		{
			$output=array('error'=> validation_errors());	
		}
		else
		{
			sleep(2);
			$comnt .='Account Manager '.trim($this->input->post('decision')).' this loan. '.$this->input->post('commentstatus').'|';
			$fata2=array(		
				'manager_id'=>trim($this->input->post('account_manager_id')),
				'branch_id'=>trim($this->input->post('branch_id')),
				'account_manager_id'=>trim($this->input->post('account_manager_id')),
				'customar_id'=>trim($this->input->post('customar_id')),		
				'loan_id'=>trim($this->input->post('cl_aid')),
				'decision'=>trim($this->input->post('decision')),
				'commentstatus'=>trim($this->input->post('commentstatus')),
				'loantype'=>4,
				'modified'=>date('Y-m-d H:i:s'),		
			);
			$insert=$this->PP_Caution_Scolare_Loans_Model->insertRow('branmanager_approbation',$fata2);
			if($insert){

				if($this->input->post('decision')=="Avis défavorable") /*Reject*/
				{
					$status = array(
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
					);
				}
				else if($this->input->post('decision')=="Avis Favorable")
				{
					$status = array(
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>1,
						'branchmanager_status'=>'Process',
						'modified'=>date("Y-m-d H:i:s"),
					);
				}	
				else{
					$status = array(
						'loan_status'=>trim($this->input->post('decision')),
						'modified'=>date('Y-m-d H:i:s'),
						'a_review'=>0,
						'branchmanager_status'=>trim($this->input->post('decision')),
						'b_review'=>0,
						'dcpranalyst_status'=>trim($this->input->post('decision')),
						'an_review'=>0,
						'dcpr_status'=>trim($this->input->post('decision')),
						'h_review'=>0,
						'director_engagements'=>trim($this->input->post('decision')),
						'd_review'=>0,
						'cic_status'=>trim($this->input->post('decision')),
						'c_review'=>0,
						'cad_status'=>trim($this->input->post('decision')),
						'cad_review'=>0,
						'cad_data'=>0,
						'cadagent_status'=>trim($this->input->post('decision')),
						'ca_review'=>0
					);	
				}			
				$this->PP_Caution_Scolare_Loans_Model->updateRow('caution_scolaire_loans_applicationform','cl_aid', $this->input->post('cl_aid'), $status);
				$msg2=str_replace('|', ', ', $comnt);
				$details=$msg2;
				$history_arr=array(
					"cl_aid" =>trim($this->input->post('cl_aid')),
					"admin_id" =>trim($this->input->post('account_manager_id')),				
					"comment" =>$details,
					"loan_type"=>4,	
					'customar_id'=>trim($this->input->post('customar_id')),
					'content_type'=>'text',		
					"created" =>date('Y-m-d H:i:s')
				);
				$res=$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
				$output=array('success' =>"Decision successfully updated.");

				### 
				### Send Mail To Higher Official
				###
				$cl_aid = $this->input->post('cl_aid'); // loan id
				$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($cl_aid);
				if(!empty($sendMailToHigherOfficial)) {
					$output = $sendMailToHigherOfficial;
				}

			}else{
				$output=array('error' =>"Unable update to record");
			}
		}
		echo json_encode($output);
	}

	public function SearchAccount(){
		//print_r($_POST);
		$segment=$this->input->post('segment');
		$data= $this->data['accontdata']=$this->PP_Caution_Scolare_Loans_Model->get_account_details($this->input->post('account'));		
		$html=null;
		foreach ($data as $key) {
			$html .="<tr>
			<td>".$key['cid']."</td>
			<td>".$key['first_name']." ".$key['middle_name']." ".$key['last_name']."</td>
			<td>".$key['account_name']."</td>
			<td>".$key['account_number']."</td>
			<td>".$key['dob']."</td>
			<td>".$key['address']."</td>
			<td>".$key['emp_name']."</td>
			<td>".$key['phone']."</td>
			<td><a href=\"javascript:void(0)\" class=\"btn btn-primary\" onclick=\"return theFunction(".$key['cid'].");\">
			<img src=\"".base_url('assets/img/select2-spinner.gif')."\" class=\"pull-left\" id='ajax-loder".$key['cid']."' style='position:relative;top: 2px;left: -2px; display: none;'' /> SELECT</a></td>
		</tr>";
		 }
		 echo $html;
	}

	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST);
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->PP_Caution_Scolare_Loans_Model->filter_loan_statuslist(trim($this->input->post('filter')));

		
		$html=null;
		if(!empty($recordcheck)){
			foreach ($recordcheck as $key) {
				$time_ago=$key['created'];
				$row = array();
				$html .="<tr>
				<td> ".$key['application_no']."</td>
				<td> ".$key['account_number']."</td>
				<td> ".$key['branch_name']."</td>
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>
				<td> ".$key['ltype']."</td>
				<td>".date('d-m-Y', strtotime($key['created']))." :";
				if(timeAgo($time_ago) >= 48){
					if($key['loan_status']=="Process" || $key['loan_status']=="Demande de retraitement"){
						$html .="<span class='blink' style='color:red'>".timeAgo($time_ago)."</span>";
					}else{
						$html .= timeAgo($time_ago);
					}
				}else{
					$html .= timeAgo($time_ago);
				}				
				$html .="</td>			
						<td>CFA ".number_format($key['loan_amt'],0,',',' ')."</td>
						<td> ".$key['loan_interest']."%</td>
						<td> ".$key['loan_term']."</td>
						<td>";						
							if($key['loan_status']=='Avis défavorable')
							{
								$label='label label-danger ui-draggable';
							}else if($key['loan_status']=='Confirm Disbursement')
							{
								$label='label label-success';
							}
							else if($key['loan_status']=='Avis Favorable')
							{
								$label='label label-info';
							}	
							else{
								$label="label label-primary";
							}
							
					$html .="<span class='$label'> ".$key['loan_status']."</span>
					</td>
					<td class=\"sorting_1\">
						<a href=\"".base_url('PP_Caution_Scolare_Loans/customer_details/').$key['cl_aid']."\" class=\"table-link\">
							<span class=\"fa-stack\">
								<i class=\"fa fa-square fa-stack-2x\"></i>
								<i class=\"fa fa-search-plus fa-stack-1x fa-inverse\"></i>
							</span>
						</a>
					</td>			
				</tr>";
				$row[] = $html;
			}
		}else{
		 $html .="<tr>
		 <td valign=\"top\" colspan=\"10\" class=\"dataTables_empty\">No matching records found</td>
		 </tr>";
		 $row[] = $html;
		}
		echo json_encode($row);
	}

	public function billetaorder()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_Billet_aÇ_Ordre_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		 
	}
	public function memo_of_setting_up()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_memo_of_setting_up_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		 
	}
	public function generate_Billet_aÇ_Ordre_Credit_Scolaire($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->PP_Caution_Scolare_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Caution_Scolare_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Caution_Scolare_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Caution_Scolare_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Caution_Scolare_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Caution_Scolare_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Caution_Scolare_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Caution_Scolare_Loans_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Caution_Scolare_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Caution_Scolare_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Caution_Scolare_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Caution_Scolare_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Caution_Scolare_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Caution_Scolare_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Caution_Scolare_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Caution_Scolare_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Caution_Scolare_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Caution_Scolare_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Caution_Scolare_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/BilletOrdre',$this->data,true);
	}

	public function generate_memo_of_setting_up_Credit_Scolaire($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->PP_Caution_Scolare_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Caution_Scolare_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Caution_Scolare_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Caution_Scolare_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Caution_Scolare_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Caution_Scolare_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Caution_Scolare_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Caution_Scolare_Loans_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Caution_Scolare_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Caution_Scolare_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Caution_Scolare_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Caution_Scolare_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Caution_Scolare_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Caution_Scolare_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Caution_Scolare_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Caution_Scolare_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Caution_Scolare_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Caution_Scolare_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Caution_Scolare_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/memo-de-mise-em-place.php',$this->data,true);
	}



	#
	## caution_scolare_1
	#
	public function caution_scolare_1() {
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_billet_caution_scolare_1($segmentid);
		echo $getHtmlagreement;
		// return  $this->load->view('superadmin/Formulaire de demande d’approbation',$this->data,true);
	}

	#
	## caution_scolare_1 data sender
	#
	public function generate_billet_caution_scolare_1($id)
	{
		 error_reporting(0);
		error_reporting(0);
		//$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		
		$id=$this->uri->segment(3);	
		$this->data['appformD']=$this->PP_Caution_Scolare_Loans_Model->get_caution_scolaire_loans_applicationform_details($id);
		//print_r($this->data['appformD'][0]['customar_id']);
		$customerID=$this->data['appformD'][0]['customar_id'];
		
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Caution_Scolare_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();

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

		$this->data['decision_rec']=$this->PP_Caution_Scolare_Loans_Model->get_decision_record($id);
				
		$this->data['customersd']=$this->PP_Caution_Scolare_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Caution_Scolare_Loans_Model->get_pInformation($customerID);
		$this->data['stinfo']=$this->PP_Caution_Scolare_Loans_Model->get_stInformation($customerID);
		$this->data['acinfo']=$this->PP_Caution_Scolare_Loans_Model->get_acInformation($customerID);
		$this->data['bainfo']=$this->PP_Caution_Scolare_Loans_Model->get_baInformation($customerID);

		return  $this->load->view('superadmin/caution_scolare_1',$this->data,true);
	}

	#
	## caution_scolare_2
	#
	public function caution_scolare_2() {
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_billet_caution_scolare_2($segmentid);
		echo $getHtmlagreement;
		// return  $this->load->view('superadmin/Formulaire de demande d’approbation',$this->data,true);
	}

	#
	## caution_scolare_2 data sender
	#
	public function generate_billet_caution_scolare_2($id)
	{
		 error_reporting(0);
		error_reporting(0);
		//$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		
		$id=$this->uri->segment(3);	
		$this->data['appformD']=$this->PP_Caution_Scolare_Loans_Model->get_caution_scolaire_loans_applicationform_details($id);
		//print_r($this->data['appformD'][0]['customar_id']);
		$customerID=$this->data['appformD'][0]['customar_id'];
		
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Caution_Scolare_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();

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

		$this->data['decision_rec']=$this->PP_Caution_Scolare_Loans_Model->get_decision_record($id);
				
		$this->data['customersd']=$this->PP_Caution_Scolare_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Caution_Scolare_Loans_Model->get_pInformation($customerID);
		$this->data['stinfo']=$this->PP_Caution_Scolare_Loans_Model->get_stInformation($customerID);
		$this->data['acinfo']=$this->PP_Caution_Scolare_Loans_Model->get_acInformation($customerID);
		$this->data['bainfo']=$this->PP_Caution_Scolare_Loans_Model->get_baInformation($customerID);

		return  $this->load->view('superadmin/caution_scolare_2',$this->data,true);
	}

	#
	## caution_scolare_3
	#
	public function caution_scolare_3() {
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_billet_caution_scolare_3($segmentid);
		echo $getHtmlagreement;
		// return  $this->load->view('superadmin/Formulaire de demande d’approbation',$this->data,true);
	}

	#
	## caution_scolare_3 data sender
	#
	public function generate_billet_caution_scolare_3($id)
	{
		 error_reporting(0);
		error_reporting(0);
		//$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		
		$id=$this->uri->segment(3);	
		$this->data['appformD']=$this->PP_Caution_Scolare_Loans_Model->get_caution_scolaire_loans_applicationform_details($id);
		//print_r($this->data['appformD'][0]['customar_id']);
		$customerID=$this->data['appformD'][0]['customar_id'];
		
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Caution_Scolare_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();

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

		$this->data['decision_rec']=$this->PP_Caution_Scolare_Loans_Model->get_decision_record($id);
				
		$this->data['customersd']=$this->PP_Caution_Scolare_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Caution_Scolare_Loans_Model->get_pInformation($customerID);
		$this->data['stinfo']=$this->PP_Caution_Scolare_Loans_Model->get_stInformation($customerID);
		$this->data['acinfo']=$this->PP_Caution_Scolare_Loans_Model->get_acInformation($customerID);
		$this->data['bainfo']=$this->PP_Caution_Scolare_Loans_Model->get_baInformation($customerID);

		return  $this->load->view('superadmin/caution_scolare_3',$this->data,true);
	}

	
	public function customer_details_update() 
	{
		# Get form data
		$input = $this->input->post();
	 
		##
		## Update personal information
		##
		$pid = $input['pid'];
		# build body
		$body = [];
		$body['first_name'] = $input['first_name'] ?? "";
		$body['middle_name'] = $input['middle_name'] ?? "";
		$body['last_name'] = $input['last_name'] ?? "";
		$body['gender'] = $input['gender'] ?? "";
		$body['dob'] = date("Y-m-d",strtotime($input['dob']));
		$body['education'] = $input['education'] ?? "";
		$body['marital_status'] = $input['marital_status'] ?? "";
		$body['email'] = $input['email'] ?? "";
		# Update personal info
		$updatePI = $this->db->where('pid',$pid)->update("customer_personalinformation",$body);
		
    ##
    ## Insert/Update student information
	##				
		if(empty($input['st_id'])) {
			$tbl_customer_student_information=array(
				"customar_id"=>$input['cid'],
				"type_id"=>$input['type_id'] ?? "",
				"id_number"=>$input['id_number'] ?? "",
				"first_name"=>$input['sfirst_name'] ?? "",
				"last_name"=>$input['slast_name'] ?? "",
				"date_of_birth"=>$input['date_of_birth'] ?? "",
				"occupation"=>$input['occupation'] ?? "",
				"main_phone"=>$input['full_main_number'] ?? "",
				"alternative_phone"=>$input['full_alternate_number'] ?? "",
				"expiration_date_id"=>trim(date("Y-m-d", strtotime($input['expiration_date_id']))) ?? "",
				"created"=>date('Y-m-d H:i:s'),
			);
			 $this->PP_Caution_Scolare_Loans_Model->insertRow('customer_student_information',$tbl_customer_student_information);
		} else {
			$st_id = $input['st_id'];
			# build body
			$body = [];
			$body['id_number'] = $input['id_number'] ?? "";   
			$body['first_name'] = $input['sfirst_name'] ?? "";
			$body['last_name'] = $input['slast_name'] ?? "";
			$body['date_of_birth'] = date("Y-m-d",strtotime($input['date_of_birth']));			
			$body['occupation'] = $input['occupation'] ?? "";
			$body['main_phone'] = $input['full_main_number'] ?? "";
			$body['alternative_phone'] = $input['full_alternate_number'] ?? "";
			$body['expiration_date_id'] = trim(date("Y-m-d", strtotime($input['expiration_date_id']))) ?? "";
			# Update student info
			$updatePI = $this->db->where('st_id',$st_id)->update("customer_student_information",$body);
		}		
	  
	##
    ## Update  account information
	##
		if(empty($input['aci_id'])) {
			$tbl_customer_account_information=array(
				"customar_id"=>$input['cid'],
				"admin_id"=>$this->session->userdata('id'),			
				"information"=>"null",
				"field_1"=>$input['ac_field_1'] ?? "",
				"field_2"=>$input['ac_field_2'] ?? "",
				"field_3"=>$input['ac_field_3'] ?? "",
				"field_4"=>$input['ac_field_4'] ?? "",
				"objet_credit"=>"",
				"frais_de_dossier"=>"",
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('customer_account_information',$tbl_customer_account_information);
		} else {
			$aci_id = $input['aci_id'];
			# build body
			$body = [];
			$body['field_1'] = $input['ac_field_1'] ?? "";
			$body['field_2'] = $input['ac_field_2'] ?? "";
			$body['field_3'] = $input['ac_field_3'] ?? "";
			$body['field_4'] = $input['ac_field_4'] ?? "";	
			# Update account info
			$updatePI = $this->db->where('aci_id',$aci_id)->update("customer_account_information",$body);
		}
       
    ##
    ## Update blocked account information
	##
		if(empty($input['aci_id'])) {
			$tbl_customer_blocked_account_information=array(
				"customar_id"=>$input['cid'],
				"admin_id"=>$this->session->userdata('id'),			
				"information"=>"null",
				"field_1"=>$input['field_1'] ?? "",
				"field_2"=>$input['field_2'] ?? "",
				"field_3"=>$input['field_3'] ?? "",
				"field_4"=>$input['field_4'] ?? "",
				"objet_credit"=>$input['objet_credit'] ?? "",
				"frais_de_dossier"=>"",
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Caution_Scolare_Loans_Model->insertRow('customer_blocked_account_information',$tbl_customer_blocked_account_information);
		} else {
			$baci_id = $input['baci_id'];
			# build body
			$body = [];
			$body['field_1'] = $input['field_1'] ?? "";
			$body['field_2'] = $input['field_2'] ?? "";
			$body['field_3'] = $input['field_3'] ?? "";
			$body['field_4'] = $input['field_4'] ?? "";
			$body['objet_credit'] = $input['objet_credit'] ?? "";
			# Update blocked account info
			$updatePI = $this->db->where('baci_id',$baci_id)->update("customer_blocked_account_information",$body);
		}
    
	   # return	
	   $this->session->set_flashdata('success', 'Updated Successfully !');	
	   redirect(base_url('PP_Caution_Scolare_Loans/customer_details/'.$input['id']));
	}

/**
  * Send Mail To Higher Official
  * 	###
  * 	###	In CAUTION SCHOLAIRE LOAN
  *   ###
  * 	### Account Manager === (roleid - 2)
  * 	### Branch Manager === (roleid - 3)
  * 	### Director Engagements === (roleid - 10)
  * 	### Agent CAD === (roleid - 11)
  * 	### CAD === (roleid - 9)
  *   ### Director Operating Manager === (roleid - 12)
  *   ###
  */
	public function sendMailToHigherOfficial($cl_aid)
	{
		# Initialize an array
		$output = [];

		# Get loan amount				
		$getLoanDetails = $this->db->select('*')->from('tbl_caution_scolaire_loans_applicationform')->where('cl_aid', $cl_aid)->get()->row_array();
		if(empty($getLoanDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}
		
		# Get role id
		$subAdminRoleId = 3;
		
		# Role id & User id === Account Manager
		$roleId = $this->session->userdata('role') ?? 2;				
		$userId = $this->session->userdata('id');

		# Get admin details
		$userDetails = $this->db->select('*')->from('tbl_user')->where('id', $userId)->where('is_admin', $roleId)->get()->row_array();
		if(empty($userDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}

		# Get user to send email
		$getUser = $this->db->select('*')->from('tbl_user')->where('branch_id', $userDetails['branch_id'])->where('is_admin', $subAdminRoleId)->get()->row_array();
		if(empty($getUser)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}

		# Customer details
		$getCustomerDetails = $this->db->select('*')->from('tbl_customer_personalinformation')->where('customar_id', $getLoanDetails['customar_id'])->get()->row_array();
		if(empty($getCustomerDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}

		# bank account
		$getbankaccount = $this->db->select('*')->from('tbl_customer_account_information')->where('customar_id', $getLoanDetails['customar_id'])->get()->row_array();
		if(!empty($getbankaccount)) {
			$accountNo = $getbankaccount['field_4'];
		}	else {
			$accountNo = "{Account information n/a!}";
		}	

		# Initialize variables
		$config['mailtype'] = 'html';
		$this->email->set_mailtype("html");	

		# Load email library
		$this->load->library('email',$config);				
	
		# build required fields for mail
		$mailFrom = $userDetails['u_email'];
		$mailTo = $getUser['u_email'];
		$subject = "Account Manager Avis favorable for a loan CAUTION SCOLAIRE";
		$fromName = $userDetails['user_name'];
		$toName = $getUser['user_name'];
		$body= 'Bonjour,		
			Vous avez en traitement le dossier du prêt Consumer Loan Du client  '.
			$getCustomerDetails['first_name'].' '.
			$getCustomerDetails['middle_name'].' '.
			$getCustomerDetails['last_name'].'  En attente de validation Ayant pour numéro de compte  '.
			$accountNo.'  cordialement.';
		
		# Send mail 
		$this->email->from($mailFrom,$fromName);
		$this->email->to($mailTo,$toName);
		$this->email->subject($subject);
		$this->email->message($body);		    
		$send = $this->email->send();
		if(!$send) {
			echo 'error' .$this->email->print_debugger();	       
			$output=array('error' =>"Fail to send email!");
		}

		return $output;
	}

	
	## 5
	## geting the file 
	##

	public function number_5()
	{		
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_formulaire_atlantique_Prêt_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
	}

	public function generate_formulaire_atlantique_Prêt_Scolaire($id)
	{
		error_reporting(0);
		$this->data['appformD']=$this->PP_Caution_Scolare_Loans_Model->get_caution_scolaire_loans_applicationform_details($id);
		//print_r($this->data['appformD'][0]['customar_id']);
		$customerID=$this->data['appformD'][0]['customar_id'];
		
		$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Caution_Scolare_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Caution_Scolare_Loans_Model->get_All_fees();

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

		$this->data['decision_rec']=$this->PP_Caution_Scolare_Loans_Model->get_decision_record($id);
				
		$this->data['customersd']=$this->PP_Caution_Scolare_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Caution_Scolare_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Caution_Scolare_Loans_Model->get_pInformation($customerID);
		$this->data['stinfo']=$this->PP_Caution_Scolare_Loans_Model->get_stInformation($customerID);
		$this->data['acinfo']=$this->PP_Caution_Scolare_Loans_Model->get_acInformation($customerID);

		return  $this->load->view('superadmin/Atlantique Prêt Scolaire - Formulaire en français',$this->data,true);
	}
	
}