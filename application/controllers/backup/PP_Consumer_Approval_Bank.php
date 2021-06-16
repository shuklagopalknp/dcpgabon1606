<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PP_Consumer_Approval_Bank extends Admin_Controller 
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
		$this->data['record']=$this->Common_model->get_admin_details(3);
		$branchid=$this->data['record'][0]->bid; 
		$this->data['loantype']=$this->Branch_Loans_Model->get_loanType();
		$this->data['loantax']=$this->Branch_Loans_Model->get_taxType();		
		$this->data['fees']=$this->Branch_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Branch_Loans_Model->get_Allapplication_form_consumer($branchid);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 3 ) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/consumer_loan.php', $this->data);
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
		$this->data['appformD']=$this->Branch_Loans_Model->get_customar_details_consumer($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		//$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();

		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		$this->data['sys_docs']=$this->PP_Consumer_Loans_Model->get_filedata($id);
		$this->data['clist_docs']=$this->PP_Consumer_Loans_Model->get_check_list_customer_documents($id);
		$this->data['clist_docs_check']=$this->PP_Consumer_Loans_Model->get_check_list_documents_enabeldisabel($id);
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		$this->data['collateral_vehicule']=$this->PP_Consumer_Loans_Model->get_collateral_vehicule($id);
		$this->data['collateral_deposit']=$this->PP_Consumer_Loans_Model->get_collateral_deposit($id);
		$this->data['collateral_maison']=$this->PP_Consumer_Loans_Model->get_collateral_maison($id);
		$this->data['collateral_excemption']=$this->PP_Consumer_Loans_Model->get_collateral_excemption($id);		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();	
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);
		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		$this->data['decision_rec']=$this->PP_Consumer_Loans_Model->get_decision_record($id);
		
		$this->data['customerdata']=$this->PP_Consumer_Loans_Model->get_customerdetails_list();
		//print_r($this->data['appformD'][0]);
		$is_admin = ($user_id != 3) ? true :false;
		$this->data['title'] = 'DCP | Consumer Loan Customer Details';
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/consumer_loan_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}

	// New update - 30-03-2020
	public function select_customer()
	{
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['branch_record']=$this->PP_Consumer_Loans_Model->get_All_branch();
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['bankdetails']=$this->PP_Consumer_Loans_Model->get_bankdetails();
		$this->data['title'] = 'DCP - Customer Verification';
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/consumerloans_select_customer', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}

	}

	public function is_ajax_request()
	{
		//print_r($_POST); exit;
		$customerid=$this->input->post('customerid');
		$segment=$this->input->post('segment');

		$data =  array(
			'customar_id' => $customerid
		);

		$res = $this->PP_Consumer_Loans_Model->updateRow('consumer_loans_applicationform','cl_aid',$segment,$data);

		if($res)
		{
			echo $res;
		}
		else
		{
			echo 0;
		}
		
	}


	public function add_newcustomer()
	{
		//print_r($_POST); exit;
		//print_r($this->input->post(),1);
		$isadmin=$this->session->userdata('id');
		$dob=date("Y-m-d", strtotime($this->input->post('dob')));		
		$employment_date=date("Y-m-d", strtotime($this->input->post('employment_date')));
		$edn_date_contract_cdd=date("Y-m-d", strtotime($this->input->post('edn_date_contract_cdd')));
		$opening_date=date("Y-m-d", strtotime($this->input->post('opening_date')));
		$expiration_date=date("Y-m-d", strtotime($this->input->post('expiration_date')));

		
		sleep(2);
		$tbl_cus_field=array(
			"admin_id"=>$isadmin,
			"aid"=>1,
			"account_name"=>$this->input->post('bank_name')??'',
			"account_number"=>trim($this->input->post('accoumt_number'))??'',
			"dob"=>trim($dob),
			"address"=>$this->input->post('resides_address')??'',
			"emp_name"=>trim($this->input->post('emp_name'))??'',
			"phone"=>$this->input->post('main_phone')??'',
			"created"=>date('Y-m-d H:i:s'),
		);		
		$getid=$this->PP_Consumer_Loans_Model->insertRow('tbl_customers',$tbl_cus_field);

		if($getid){

			//echo $getid;
			$tbl_customer_personalinformation=array(
				"customar_id"=>$getid,
				"first_name"=>$this->input->post('first_name')??'',
				"middle_name"=>$this->input->post('middle_name')??'',
				"last_name"=>$this->input->post('last_name')??'',
				"gender"=>$this->input->post('gender')??'',
				"dob"=>trim($dob),
				"education"=>$this->input->post('education')??'',
				"marital_status"=>$this->input->post('marital_status')??'',
				"email"=>trim($this->input->post('email'))??'',
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customer_personalinformation',$tbl_customer_personalinformation);

			$tbl_customer_additionalinformation=array(
				"customar_id"=>$getid,
				"type_id"=>trim($this->input->post('typeofid'))??'',
				"monthly_income"=>$this->input->post('monthly_income')??'',
				"monthly_expenses"=>$this->input->post('monthly_expenses')??'',
				"id_number"=>$this->input->post('id_number')??'',
				"state_of_issue"=>trim($this->input->post('state_of_issue'))??'',
				"occupation"=>$this->input->post('occupation')??'',
				"main_phone"=>$this->input->post('main_phone')??'',
				"alternative_phone"=>trim($this->input->post('alter_phone'))??'',
				"expiration_date_id"=>trim($expiration_date)??'',			
				"created"=>date('Y-m-d H:i:s'),
				"room_type"=>trim($this->input->post('room_type')) ?? "",
				"father_fullname"=>trim($this->input->post('father_fullname')) ?? "",
				"mother_fullname"=>trim($this->input->post('mother_fullname')) ?? "",
			);
			$this->PP_Consumer_Loans_Model->insertRow('customer_additionalinformation',$tbl_customer_additionalinformation);
			
			$tbl_customar_employment_information=array(
				"customar_id"=>$getid,
				"emp_id"=>1,
				"employer_name"=>trim($this->input->post('emp_name'))??'',
				"secteurs_id"=>$this->input->post('secteurs')??'',
				"cat_emp_id"=>$this->input->post('cat_employeurs')??'',
				"contract_type_id"=>$this->input->post('typeofcontract')??'',
				"employment_date"=>trim($employment_date)??'',
				"sate_end_contract_cdd"=>trim($edn_date_contract_cdd)??'',
				"years_professionel_experience"=>trim($this->input->post('years_professionel_experience'))??'',
				"how_he_is_been_with_current_employer"=>trim($this->input->post('current_emp'))??'',
				"emp_net_salary"=>trim($this->input->post('net_salary'))??'',
				"retirement_age_expected"=>trim($this->input->post('retirement_age_expected'))??'',
				"fees"=>0,
				"commisiion"=>0,
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customar_employment_information',$tbl_customar_employment_information);

			$tbl_customer_address=array(
				"customar_id"=>$getid,
				"admin_id"=>2,
				"city_id"=>trim($this->input->post('city'))??'',
				"state_id"=>$this->input->post('state')??'',
				"street"=>$this->input->post('street')??'',
				"resides_address"=>trim($this->input->post('resides_address'))??'',
				"created"=>date('Y-m-d H:i:s')??'',
			);

			$this->PP_Consumer_Loans_Model->insertRow('customer_address',$tbl_customer_address);

			$tbl_customar_bank_account=array(
				"customar_id"=>$getid,			
				"account_type"=>trim($this->input->post('account_type'))??'',
				"account_no"=>trim($this->input->post('accoumt_number'))??'',
				"bank_name"=>trim($this->input->post('bank_name'))??'',
				"bank_phone"=>$this->input->post('bank_phone')??'',
				"opening_date"=>$opening_date,
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customar_bank_account',$tbl_customar_bank_account);

			$tbl_customar_other_information=array(
				"customar_id"=>$getid,
				"admin_id"=>2,			
				"information"=>trim($this->input->post('another_test'))??'',
				"field_1"=>trim($this->input->post('test_field'))??'',
				"field_2"=>trim($this->input->post('test_david'))??'',
				"field_3"=>$this->input->post('cc_test')??'',
				"field_4"=>trim($this->input->post('cc_test'))??'',
				"objet_credit"=>trim($this->input->post('obj_credit'))??'',
				"frais_de_dossier"=>trim($this->input->post('frais_de_dossier'))??'',
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customar_other_information',$tbl_customar_other_information);

			echo "success";
		}else{
			echo "error";
		}
	}
	public function amortizationview()
    {
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_amortization_record2($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 3) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/consumer_amortization_view.php', $this->data);  
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		  	
    }



	public function comment_manager()
	{
		//print_r($this->input->post());
		$amt=5000000;
		//exit;
		$comnt='Decision - ';
		$output = '';
		// $this->form_validation->set_error_delimiters('<p>', '</p>');
		// $this->form_validation->set_rules('decision','Please Select From Below', 'required');
		// $this->form_validation->set_rules('commentstatus','Comment', 'required');	
		// $this->form_validation->set_message('required', 'You missed the input {field}!');
		// if ($this->form_validation->run() == FALSE)
		// {
		// 	$output=array('error'=> validation_errors());	
		// }
		// else
		// {

			sleep(1);
			$comnt .='Branch Manager '.trim($this->input->post('decision')).' this loan. '.$this->input->post('commentstatus').'|';
			$fata2=array(		
				'manager_id'=>trim($this->input->post('manager_id')),
				'branch_id'=>trim($this->input->post('branch_id')),
				'account_manager_id'=>trim($this->input->post('account_manager_id')),
				'customar_id'=>trim($this->input->post('customar_id')),		
				'loan_id'=>trim($this->input->post('cl_aid')),
				'decision'=>trim($this->input->post('decision')),
				'commentstatus'=>trim($this->input->post('commentstatus')),
				'loantype'=>1,
				'modified'=>date('Y-m-d H:i:s'),
			);
			$insert=$this->PP_Consumer_Loans_Model->insertRow('branmanager_approbation',$fata2);
			if($insert){

				if($this->input->post('decision')=="Avis défavorable")
				{
					$status = array(
						'branchmanager_status'=>trim($this->input->post('decision')),
						//'loan_status'=>trim($this->input->post('decision')),
						'b_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
						
					);
				}
				else if($this->input->post('decision')=="Avis Favorable")
				{
					if($this->input->post('loanamount') <=5000000){
						$status = array(
						'branchmanager_status'=>trim($this->input->post('decision')),
						'cic_status'=>'Process',
						'director_engagements'=>'Process',
						'b_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
						);
					}else{
						$status = array(
						'branchmanager_status'=>trim($this->input->post('decision')),
						'dcpranalyst_status'=>'Process',
						'b_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>0,
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
				}	
				else{
					$status = array(
						'branchmanager_status'=>trim($this->input->post('decision')),
						'a_review'=>0,
						'b_review'=>0,
						'modified'=>date('Y-m-d H:i:s'),
					);	
				}				
				$this->PP_Consumer_Loans_Model->updateRow('consumer_loans_applicationform','cl_aid', $this->input->post('cl_aid'), $status);
				$msg2=str_replace('|', ', ', $comnt);
				$details=$msg2;

				$history_arr=array(
					"cl_aid" =>trim($this->input->post('cl_aid')),
					"admin_id" =>trim($this->input->post('manager_id')),					
					"comment" =>$details,
					'customar_id'=>trim($this->input->post('customar_id')),
					'content_type'=>'text',
					"loan_type"=>1,			
					"created" =>date('Y-m-d H:i:s')
				);
				$res=$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
				### 
				### Send Mail To Higher Official
				###
				$cl_aid = $this->input->post('cl_aid'); // loan id
				$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($cl_aid);
				if(!empty($sendMailToHigherOfficial)) {
					$output = $sendMailToHigherOfficial;
				}
		//}
		echo json_encode($output);
	}

	public function confirm_disbursement(){
		sleep(1);

		//print_r($_POST); exit;
		$getcp=$this->Branch_Loans_Model->get_confirm_disbursement_consumer($this->input->post('cl_aid'));
		//print_r($getcp->loan_amt);
		//exit;
		$row_array=array();
		$editid=$this->input->post('cl_aid');
		if($getcp->loan_amt <=5000000){				
			$status = array(
				'branchmanager_status'=>"Confirm Disbursement",
				'final_confirmation'=>'Disbursement',
				'loan_status'=>'Confirm Disbursement',
				'cic_status'=>'Confirm Disbursement',
				'director_engagements'=>'Confirm Disbursement',
				'a_review'=>1,
				'b_review'=>1,
				'an_review'=>1,
				'h_review'=>1,
				'd_review'=>1,
				'cad_review'=>1,
				'c_review'=>1,
				'modified'=>date('Y-m-d H:i:s'),
			);
			
		}else{			
			$status = array(
				'branchmanager_status'=>"Confirm Disbursement",
				'final_confirmation'=>'Disbursement',
				'loan_status'=>'Confirm Disbursement',
				'cic_status'=>'Confirm Disbursement',
				'dcpranalyst_status'=>'Confirm Disbursement',
				'dcpr_status'=>'Confirm Disbursement',
				'director_engagements'=>'Confirm Disbursement',				
				'cad_status'=>'Confirm Disbursement',
				'cadagent_status'=>'Confirm Disbursement',				
				'a_review'=>1,
				'b_review'=>1,
				'an_review'=>1,
				'h_review'=>1,
				'd_review'=>1,
				'cad_review'=>1,
				'c_review'=>1,
				'ca_review'=>1,
				'modified'=>date('Y-m-d H:i:s'),
			);			
		}		
	$this->PP_Consumer_Loans_Model->updateRow('consumer_loans_applicationform', 'cl_aid',$editid, $status);
	$customerinfo=$this->Branch_Loans_Model->get_finaldisDisbursementmail_cus($this->input->post('cl_aid'));

		$customer_email=$customerinfo[0]['customer_email'];
		$customer_name=$customerinfo[0]['first_name'];
		$customer_email=$customerinfo[0]['customer_email'];		
			$maildata = array(			
                'field_name' =>trim($customer_name),
                'fieldemail' =>trim($customer_email),
                'fieldsubject' =>"Confirm Loans-Interaction",
                'fieldmsg' =>"Loan disbursement customer send a emails",                    
            );
            array_push($row_array, $maildata);
		    $databinding=json_encode($row_array);
    		$data=array(
    			'cl_aid'=>trim($this->input->post('cl_aid')),
    			'admin_id' =>2,
    			'mailcontent' =>trim($databinding),
    			'mode'=>trim('Email'),
    			'loan_type' =>1,
    			'section' =>2,
    			'status'=>1,
    			
    		);
            $rsid=$this->PP_Consumer_Loans_Model->insertRow('interaction_history',$data); 

            $config['mailtype'] = 'html';
            $this->load->library('email',$config);
            $body= '<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:separate;  width: 100%; background-color: #f6f6f6;">
            <tr><td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        <td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          <div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">          
            <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden;  visibility: hidden; width: 0;">
            		This is preheader text. Some clients will show this text as a preview.
        	</span>
            <table class="main" style="border-collapse: separate; width: 100%; background: #ffffff; border-radius: 3px;">             
              <tr>
                <td class="wrapper" style="font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;">
                  <table border="0" cellpadding="0" cellspacing="0" style="border-collapse: separate; width: 100%;">
                    <tr>
                      <td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                        Dear Customer,
                    </p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;">
                        	This is regarding your loan from Banque Atlantique Bank, please confrim you have signed the sanction letter & agreement and aware about the loan terms & condition, eg: processing, fees ROI, balance transfer, Insurance ect.
                    </p>
                        <table border="1" cellpadding="0" cellspacing="0"  style="border-collapse: separate;  width: 100%; box-sizing: border-box;">
                        	<thead>
								<tr>									
									<th>Name</th>
									<th>Credit Product</th>									
									<th>Total Amount</th>
									<th>Interest</th>
									<th width="5%">Term</th>									
								</tr>
							</thead>
                          <tbody>
                            <tr>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                              	'.$customerinfo[0]['first_name'].' '.$customerinfo[0]['last_name'].'                              </td>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                              	     '.$customerinfo[0]['ltype'].'
                              </td>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                              		 CFA '.number_format($customerinfo[0]['loan_amt'],0,',',' ').'                       
                              </td>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                              	'.number_format($customerinfo[0]['loan_interest']).'%
                              </td>
                              <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                              		'.$customerinfo[0]['loan_term'].' '.$customerinfo[0]['loan_schedule'].'
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;"></p>
                        <p style="font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; Margin-bottom: 15px;">This is an automatically generated email. Please do not reply.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>           
            </table>
          </div>
        </td>       
      </tr>
    </table>';    
	$config['mailtype'] = 'html';
	$this->email->set_mailtype("html");		    	
	$this->load->library('email',$config);
    $emailto =$customer_email;   
    $this->email->from($this->session->userdata('email'));
    $this->email->to($emailto, $customer_name);
    $this->email->cc('prashanth.saride@gmail.com','bagui.bonaventure@digitalmoneybridge.com','info@dcpilote.com');     
    $this->email->subject('Confirm CREDIT CONSO Loans Interaction');
    $this->email->message($body);		    
    $send = $this->email->send();
    if ($send) {
       echo 'success';
    } else {
       echo 'error' .$this->email->print_debugger();
       //$data=array('status'=>0);
       $this->PP_Consumer_Loans_Model->updateRow('interaction_history', 'id',$rsid,array('status'=>0));
    }   		    



	}


	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST); exit;
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->Branch_Loans_Model->filterConsumerloan(trim($this->input->post('filter')), trim($this->input->post('bid')));
		//echo "<pre>", print_r($recordcheck),"</pre>";	
		$html=null;
		if(!empty($recordcheck)){
			foreach ($recordcheck as $key) {
				$time_ago=$key['created'];
				$appdata=json_decode($key['appliedformdata']);
				$time_ago=$key['created'];
				$databinding=json_decode($key['databinding']);
				foreach ($databinding as $kdata ) {         		
	         		$last[]=$kdata->month.'-'.$kdata->years;
	       		}
       			$createddate=date('23', strtotime($key['created']));
       			$DateofLastPayment = $createddate.'-'.end($last);
				$row = array();


				$html .="<tr id=\"rowid".$key['cl_aid'].";?>\">
				<td> ".$key['application_no']."</td>
				<td> ".$key['account_number']."</td>
				<td> ".$key['branch_name']."</td>
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>
				<td> ".$DateofLastPayment."</td>
				<td>".date('d-m-Y', strtotime($key['created']))." :";
				if(timeAgo($time_ago) >= 48){
					if($key['branchmanager_status']=="Process" || $key['branchmanager_status']=="Demande de retraitement"){
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
							if($key['branchmanager_status']=='Avis défavorable')
							{
								$label='label label-danger ui-draggable';
							}else if($key['branchmanager_status']=='Confirm Disbursement')
							{
								$label='label label-success';
							}
							else if($key['branchmanager_status']=='Avis Favorable')
							{
								$label='label label-info';
							}	
							else{
								$label="label label-primary";
							}
							
					$html .="<span class='$label'> ".$key['branchmanager_status']."</span>
					</td>";
					$html .="<td>";
					if($key['final_confirmation']=="Confirm"){
						$html .='<button type="button" class="btn btn-info" onclick="loanDisbursement('.$key['cl_aid'].')">
						'.$key['final_confirmation'].'
					</button>';
					}else if($key['final_confirmation']=="Disbursement"){
						$html .="<span class=\"label label-success\">".$key['final_confirmation']."</span>";
					}else{
						if($key['branchmanager_status']=='Avis défavorable')
						{
							$html .="<span class=\"label label-danger\">Avis défavorable</span>";
						}else{
							$html .="<span class=\"label label-primary\">".$key['final_confirmation']."</span>";
						}
					}
					$html .="</td>
					<td class=\"sorting_1\">
						<a href=\"".base_url('PP_Consumer_Approval_Bank/customer_details/').$key['cl_aid']."\" class=\"table-link\">
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

	/**
	 * Send Mail To Higher Official
	 * 	###
	 * 	###	In CREDIT CONSO Loan
	 * 	### ============================================================
	 * 	### Between 0 and 5000000 Loan Amount
	 * 	### ============================================================
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	### Director Operating Manager === (roleid - 12)
	 * 	###
	 * 	### ============================================================
	 * 	### Between 50,00,001 and 15,000,000 Loan amount
	 * 	### ============================================================
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Analyst DCPR === (roleid - 6)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	### Director Operating Manager === (roleid - 12)
	 * 	###
	 * 	### =============================================================
	 * 	### Between 15,000,001 and 25 ,000,001
	 * 	### ============================================================
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Analyst DCPR === (roleid - 6)
	 * 	### Head DCPR === (roleid - 5)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	### Director Operating Manager === (roleid - 12)
	 * 	###
	 */
	public function sendMailToHigherOfficial($cl_aid)
	{
		# Initialize an array
		$output = [];

		# Get loan amount				
		$getLoanDetails = $this->db->select('*')->from('tbl_consumer_loans_applicationform')->where('cl_aid', $cl_aid)->get()->row_array();
		if(empty($getLoanDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}
		
		# Get role based on loan amount
		if($getLoanDetails['loan_amt'] > 0 && $getLoanDetails['loan_amt'] <= 5000000) {
			$subAdminRoleId = 10; // DE
		} else if($getLoanDetails['loan_amt'] > 5000001 && $getLoanDetails['loan_amt'] <= 15000000) {
			$subAdminRoleId = 6; // Analyst dcpr
		} else if($getLoanDetails['loan_amt'] > 15000001 && $getLoanDetails['loan_amt'] <= 25000001) {
			$subAdminRoleId = 6; // Account Manager
		}
		
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
		$getbankaccount = $this->db->select('*')->from('tbl_customar_bank_account')->where('customar_id', $getLoanDetails['customar_id'])->get()->row_array();
		if(!empty($getbankaccount)) {
			$accountNo = $getbankaccount['account_no'];
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
		$subject = "Bank Manager Avis favorable for a loan CREDIT CONSO";
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
	
	
}