<?php 
class PP_Credit_Scholar_Approval_Cda_Agent extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Dashboard';	
		$this->data['page'] = 'Dashboard';	
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Cadagent_Loans_Model');	
		$this->load->model('PP_Credit_Scholar_Model');
		$this->load->library('Class_Amort');
		$this->load->helper('timeAgo');
		$this->load->helper('lang_translate');
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
	public function credit_scholar_loan(){
		$this->data['title'] = 'DCP - pploan';			
		$this->data['record']=$this->Common_model->get_admin_details(3);
		if(!empty($this->data['record'][0]->bid)){
			$branchid=$this->data['record'][0]->bid;
		}else{
			$branchid='';
		} 
		$this->data['loantype']=$this->Cadagent_Loans_Model->get_loanType();
		$this->data['loantax']=$this->Cadagent_Loans_Model->get_taxType();		
		$this->data['fees']=$this->Cadagent_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Cadagent_Loans_Model->get_Allapplication_form_credit_scholar($branchid);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 11) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/creditscholar_loan.php', $this->data);
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
    	$this->data['amortrecord']=$this->PP_Credit_Scholar_Model->get_amortization_record2($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/cscholar_amortization_view', $this->data);  
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
		$this->data['appformD']=$this->Cadagent_Loans_Model->get_customar_details_credit_scholar($id);
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
		
		//print_r($this->data['appformD'][0]);
		$is_admin = ($user_id != $this->session->userdata('id')) ? true :false;
		$this->data['title'] = 'DCP | Credit Scholar Customer Details';
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/credit_scholar_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}
	
	public function comment_manager()
    {
    	sleep(2);
		//print_r($_POST);exit;		
    	$id=$this->uri->segment(3); 		
		$comnt .='HEAD CAD Agent Disbursement this loan. |';
		$fata2=array(		
			'manager_id'=>trim($this->input->post('manager_id')),
			'branch_id'=>trim($this->input->post('branch_id')),
			'account_manager_id'=>trim($this->input->post('account_manager_id')),
			'customar_id'=>trim($this->input->post('customar_id')),		
			'loan_id'=>trim($this->input->post('cap_id')),
			'decision'=>"Confirm Disbursement",
			'commentstatus'=>'Disbursement',
			'loantype'=>2,		
		);
		$insert=$this->PP_Credit_Scholar_Model->insertRow('branmanager_approbation',$fata2);
		if($insert){			
			/*$data = array(
				"cadagent_status"=>"Confirm Disbursement",				
				"final_confirmation"=>'Confirm',				
				"cad_review"=>1,
				"ca_review"=>1,
				"cadagent_data"=>'Disbursement',
			);*/
			$data = array(
				"cadagent_status"=>"Confirm Disbursement",				
				"cad_status"=>'Process',	
				"ca_review"=>1,
				"cad_review"=>0,
				"cadagent_data"=>'Confirm Disbursement',
			);						
			$edit=$this->PP_Credit_Scholar_Model->updateRow('customar_applicationform', 'cap_id', $this->input->post('cap_id'),$data);
			if($edit){				
				$status=str_replace('|', ', ', $comnt);
				$details=$status;
					$history_arr=array(
						"cl_aid" =>trim($this->input->post('cap_id')),
						"admin_id" =>trim($this->input->post('manager_id')),				
						"comment" =>$details,
						'customar_id'=>trim($this->input->post('customar_id')),
						"loan_type"=>2,
						'content_type'=>'text',
						"created" =>date('Y-m-d H:i:s')
					);
				$res=$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
				$output .='1';
			}
				
			### 
			### Send Mail To Higher Official
			###
			$cap_id = $this->input->post('cap_id'); // loan id
			$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($cap_id);
			if(!empty($sendMailToHigherOfficial)) {
				$output = $sendMailToHigherOfficial;
			}
				
		}
		echo $output;		
	}

	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST); exit;
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->Cadagent_Loans_Model->checkloanstatuslist(trim($this->input->post('filter')));
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


				$html .="<tr id=\"rowid".$key['cap_id'].";?>\">
				<td> ".$key['application_no']."</td>
				<td> ".$key['account_number']."</td>
				<td> ".$key['branch_name']."</td>
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>
				<td> ".$DateofLastPayment."</td>
				<td>".date('d-m-Y', strtotime($key['created']))." :";
				if(timeAgo($time_ago) >= 48){
					if($key['cadagent_status']=="Process" || $key['cadagent_status']=="Demande de retraitement"){
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
							if($key['cadagent_status']=='Avis défavorable')
							{
								$label='label label-danger ui-draggable';
							}else if($key['cadagent_status']=='Confirm Disbursement')
							{
								$label='label label-success';
							}
							else if($key['cadagent_status']=='Avis Favorable')
							{
								$label='label label-info';
							}	
							else{
								$label="label label-primary";
							}
							
					$html .="<span class='$label'> ".$key['cadagent_status']."</span>
					</td>					
					<td class=\"sorting_1\">
						<a href=\"".base_url('PP_Credit_Scholar_Approval_Cda_Agent/customer_details/').$key['cap_id']."\" class=\"table-link\">
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
  * 	###	In CREDIT SCHOLAIRE LOAN
  *   ###
  * 	### Account Manager === (roleid - 2)
  * 	### Branch Manager === (roleid - 3)
  * 	### Risk Analyst === (roleid - 6)
  *   ### Head DCPR === (roleid - 5)
  * 	### Director Engagements === (roleid - 10)
  *   ### CIC === (roleid - 8)
  * 	### Agent CAD === (roleid - 11)
  * 	### CAD === (roleid - 9)
  *   ###
  */
	public function sendMailToHigherOfficial($loanId)
	{
		# Initialize an array
		$output = [];

		# Get loan amount				
		$getLoanDetails = $this->db->select('*')->from('tbl_customar_applicationform')->where('cap_id', $loanId)->get()->row_array();
		if(empty($getLoanDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}
		
		# Get role id
		$subAdminRoleId = 9;
		
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
		$subject = "Cad Agent Avis favorable for a loan CREDIT SCOLAIRE";
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
