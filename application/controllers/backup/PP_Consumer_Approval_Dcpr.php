<?php 
/** 
 * Short description for file    
 * Filename    Cadagent_Loans_Model.php
 * @author     <CK Informatics Pvt Ltd>  
 * @copyright  1997-2019 The PHP Group
 * @version    CodeIgniter V 3.1.4
 * Purpose	   This controller is the default controller which is used to display the loginpage.
Check the Userlogins
 **/
/*
This model is the default model which is used to display the loginpage.
Check the Userlogins 
*/ 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PP_Consumer_Approval_Dcpr extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Dashboard';	
		$this->data['page'] = 'PP Consumer Loans';
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Head_Dcpr_Loans_Model');	
		$this->load->model('PP_Consumer_Loans_Model');
		$this->load->library('Class_Amort');
		$this->load->helper('lang_translate');
		$this->load->helper('timeAgo');
		$this->load->helper(array('dompdf', 'file'));
		//date_default_timezone_set('Asia/Kolkata');
		date_default_timezone_set('GMT');		
	}
	
	
	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	//==========Credit Scholar Loan Section
	public function consumerloan(){
		$this->data['title'] = 'DCP | Finance Credit Scholar';			
		$this->data['record']=$this->Common_model->get_admin_details(5);
		if(!empty($this->data['record'][0]->bid)){
			$branchid=$this->data['record'][0]->bid;
		}else{
			$branchid='';
		}
		$this->data['loantype']=$this->Head_Dcpr_Loans_Model->get_loanType();
		$this->data['loantax']=$this->Head_Dcpr_Loans_Model->get_taxType();		
		$this->data['fees']=$this->Head_Dcpr_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Head_Dcpr_Loans_Model->get_Allapplication_form_consumer($branchid);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id ==$this->session->userdata('id')) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='5'){			
			$this->render_template2('headdcpr/consumer_loan', $this->data);
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
		$this->data['appformD']=$this->Head_Dcpr_Loans_Model->get_customar_details_consumerloan($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
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
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['title'] = 'DCP - Credit Scholar Customer Details';
		if($this->session->userdata('role')==='5'){			
			$this->render_template2('headdcpr/consumer_loan_customer_details', $this->data);
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
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_amortization_record2($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 5) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='5'){			
			$this->render_template2('headdcpr/cscholar_amortization_view', $this->data);  
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
		  	
    }
	
	public function comment_manager()
  {
		$comnt='Decision - ';
		$output='';
		$this->data['title'] = 'DCP - Credit Scholar Customer Details';	    	
    $id=$this->uri->segment(3);		
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		$this->form_validation->set_rules('decision','Please Select From Below', 'required');
		$this->form_validation->set_rules('commentstatus','Comment', 'required');	
		$this->form_validation->set_message('required', 'You missed the input {field}!');
		if ($this->form_validation->run() == FALSE) {
			$output=array('error'=> validation_errors());	
		} else {		
			sleep(1);			
			$comnt .='Head DCPR '.trim($this->input->post('decision')).' this loan. '.$this->input->post('commentstatus').'|';
			$fata2=array(		
				'manager_id'=>trim($this->input->post('manager_id')),
				'branch_id'=>trim($this->input->post('branch_id')),
				'account_manager_id'=>trim($this->input->post('account_manager_id')),
				'customar_id'=>trim($this->input->post('customar_id')),		
				'loan_id'=>trim($this->input->post('cl_aid')),
				'decision'=>trim($this->input->post('decision')),
				'commentstatus'=>trim($this->input->post('commentstatus')),
				'loantype'=>1,		
			);
			$insert=$this->PP_Consumer_Loans_Model->insertRow('branmanager_approbation',$fata2);
			if($insert) {
				if($this->input->post('decision')=="Avis défavorable")	{
					$data = array(
						'dcpr_status'=>trim($this->input->post('decision')),
						'h_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
						//'loan_status'=>trim($this->input->post('decision')),
						//'branchmanager_status'=>trim($this->input->post('decision')),
						//'dcpranalyst_status'=>trim($this->input->post('decision')),					
					);
				} else if($this->input->post('decision')=="Avis Favorable") {
					$data = array(
						'dcpr_status'=>trim($this->input->post('decision')),
						'cic_status'=>'Process',
						'director_engagements'=>'Process',
						'h_review'=>1,
						'an_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
					);
				}	else	{
					$data = array(
						'dcpr_status'=>trim($this->input->post('decision')),
						'dcpranalyst_status'=>'Process',
						'h_review'=>0,
						'an_review'=>0,	
						'modified'=>date('Y-m-d H:i:s'),					
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>0,
						'branchmanager_status'=>trim($this->input->post('decision')),
						'b_review'=>0,
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
				
				$edit=$this->PP_Consumer_Loans_Model->updateRow('consumer_loans_applicationform', 'cl_aid', $this->input->post('cl_aid'),$data);			
				if($edit){				
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
				}

				### 
				### Send Mail To Higher Official
				###
				$cl_aid = $this->input->post('cl_aid'); // loan id
				$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($cl_aid);
				// if(!empty($sendMailToHigherOfficial)) {
				// 	$output = $sendMailToHigherOfficial;
				// }
			}else{
				$output=array('error' =>"Unable update to record");
			}
		}

		if(empty($output)) {
			$output = ['success'=>"Successfully updated record!"];
		}

		# return response
		echo json_encode($output);		
	}

	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST); exit;
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->Head_Dcpr_Loans_Model->filterConsumerloan(trim($this->input->post('filter')));
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
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>
				<td> ".$DateofLastPayment."</td>
				<td>".date('d-m-Y', strtotime($key['created']))." :";
				if(timeAgo($time_ago) >= 48){
					if($key['dcpr_status']=="Process" || $key['dcpr_status']=="Demande de retraitement"){
						$html .="<span class='blink' style='color:red'>".timeAgo($time_ago)."</span>";
					}else{
						$html .= timeAgo($time_ago);
					}
				}else{
					$html .= timeAgo($time_ago);
				}				
				$html .="</td>			
						<td>".number_format($key['loan_amt'],0,',',' ')."</td>
						<td> ".$key['loan_interest']."%</td>
						<td> ".$key['loan_term']."</td>
						<td>";						
							if($key['dcpr_status']=='Avis défavorable')
							{
								$label='label label-danger ui-draggable';
							}else if($key['dcpr_status']=='Confirm Disbursement')
							{
								$label='label label-success';
							}
							else if($key['dcpr_status']=='Avis Favorable')
							{
								$label='label label-info';
							}	
							else{
								$label="label label-primary";
							}
							
					$html .="<span class='$label'> ".$key['dcpr_status']."</span>
					</td>					
					<td class=\"sorting_1\">
						<a href=\"".base_url('PP_Consumer_Approval_Dcpr/customer_details/').$key['cl_aid']."\" class=\"table-link\">
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
		$subAdminRoleId = 10;
		
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
		$subject = "Head Dcpr Avis favorable for a loan CREDIT CONSO";
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
		// if(!$send) {
		// 	echo 'error' .$this->email->print_debugger();	       
		// 	$output=array('error' =>"Fail to send email!");
		// }

		return $output;
	}
	
	
	
	
}