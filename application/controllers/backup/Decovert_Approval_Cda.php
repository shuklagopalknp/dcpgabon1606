<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decovert_Approval_Cda extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Dashboard';	
		$this->data['page'] = 'PP Decovert Loans';
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Cda_Loans_Model');	
		$this->load->model('Decovert_Loans_Model');
		$this->load->model('Branch_Loans_Model');		
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
	//==========Credit Scholar Loan Section
	public function decovertloan(){
		$this->data['title'] = 'DCP | Decovert Loan';			
		$this->data['record']=$this->Common_model->get_admin_details(3);		
		$this->data['loantype']=$this->Cda_Loans_Model->get_loanType();
		$this->data['loandetails']=$this->Cda_Loans_Model->get_Allapplication_form_Decovert();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id !=1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='9'){			
			$this->render_template2('cad/decovert_cad', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}

	public function amortization_decovert_views()
    {
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->Decovert_Loans_Model->get_decovertamortizationview($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 9) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='9'){			
			$this->render_template2('cad/decovert_amortization_view', $this->data);
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
		$this->data['appformD']=$this->Cda_Loans_Model->get_customar_details_Decovert($id);
		$customerID=$this->data['appformD'][0]['customer_id'];		
		$this->data['loandetails']=$this->Cda_Loans_Model->get_decovert_application_form();
		$this->data['tracking_timeline']=$this->Decovert_Loans_Model->get_tracking_timeline($id);
		//$this->data['fees']=$this->Decovert_Loans_Model->get_All_fees();

		$this->data['int_email']=$this->Decovert_Loans_Model->get_interaction_data($id);
		$this->data['sys_docs']=$this->Decovert_Loans_Model->get_filedata($id);
		$this->data['clist_docs']=$this->Decovert_Loans_Model->get_check_list_customer_documents($id);
		$this->data['secteurs']=$this->Decovert_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->Decovert_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->Decovert_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->Decovert_Loans_Model->get_collateral($id);

		$this->data['collateral_vehicule']=$this->Decovert_Loans_Model->get_collateral_vehicule($id);
		$this->data['collateral_deposit']=$this->Decovert_Loans_Model->get_collateral_deposit($id);
		$this->data['collateral_maison']=$this->Decovert_Loans_Model->get_collateral_maison($id);
		$this->data['collateral_excemption']=$this->Decovert_Loans_Model->get_collateral_excemption($id);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->Decovert_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->Decovert_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->Decovert_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->Decovert_Loans_Model->get_applicableloan_ratio();
		
		$this->data['customersd']=$this->Decovert_Loans_Model->get_customersdetailsinfo($customerID);
		$this->data['risk_analysis']=$this->Decovert_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->Decovert_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->Decovert_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->Decovert_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->Decovert_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->Decovert_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->Decovert_Loans_Model->get_oInformation($customerID);
		$this->data['decision_rec']=$this->Decovert_Loans_Model->get_decision_record($id);
		$this->data['customerdata']=$this->Decovert_Loans_Model->get_customerdetails_list();
		//print_r($this->data['appformD'][0]);
		$is_admin = ($user_id != $this->session->userdata('id')) ? true :false;
		$this->data['title'] = 'DCP | Consumer Loan Customer Details';
		if($this->session->userdata('role')==='9'){			
			$this->render_template2('cad/decovert_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}

	
	
	public function comment_manager()
    {
	//print_r($this->input->post());exit;
	/*modify on 09-11-2019 */

		$output='';
		$postoption=json_encode($this->input->post());
		$this->data['title'] = 'DCP - Consumer Loan Customer Details';	    	
    	$id=$this->uri->segment(3); 		
		$status ='Now - &nbsp; ';
		if(!empty($this->input->post('filedzome'))){
			$status .='Head CAD Confirm Disbursement this loan |';
		}
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		$this->form_validation->set_rules('filedzome','ZONE DE COMMENTAIRE', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$output .=validation_errors();	
		}else{		
		sleep(2);
		$fata2=array(		
			'manager_id'=>trim($this->input->post('manager_id')),
			'branch_id'=>trim($this->input->post('branch_id')),
			'account_manager_id'=>trim($this->input->post('account_manager_id')),
			'customar_id'=>trim($this->input->post('customer_id')),		
			'loan_id'=>trim($this->input->post('did')),
			'decision'=>"Confirm Disbursement",
			'commentstatus'=>trim($this->input->post('filedzome')),
			'loantype'=>3,
			'modified'=>date("Y-m-d H:i:s"),
		);
		$insert=$this->Decovert_Loans_Model->insertRow('branmanager_approbation',$fata2);
		if($insert){			
			$data = array(
				"cad_status"=>"Confirm Disbursement",				
				"final_confirmation"=>'Confirm',				
				"cad_data"=>$postoption,
				"cad_review"=>1,
				'modified'=>date("Y-m-d H:i:s"),
			);						
			$edit=$this->Decovert_Loans_Model->updateRow('decovert_applicationform', 'did', $this->input->post('did'),$data);
			if($edit){				
				$status=str_replace('|', ', ', $status);
				$details=$status;
					$history_arr=array(
						"cl_aid" =>trim($this->input->post('did')),
						"admin_id" =>trim($this->input->post('manager_id')),				
						"comment" =>$details,
						'customar_id'=>trim($this->input->post('customer_id')),
						'content_type'=>'text',
						"loan_type"=>3,			
						"created" =>date('Y-m-d H:i:s')
					);
				$res=$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
				$output .='1';
			}

			### Send Mail To Higher Official
			###
			$did = $this->input->post('did'); // loan id
			$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($did);
			if(!empty($sendMailToHigherOfficial)) {
				$output = $sendMailToHigherOfficial;
			}
		}
		echo $output;
		}
	}


	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST); exit;
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->Cda_Loans_Model->filterDecovertloan(trim($this->input->post('filter')), trim($this->input->post('bid')));
		//echo "<pre>", print_r($recordcheck),"</pre>";	
		$html=null;
		if(!empty($recordcheck)){
			foreach ($recordcheck as $key) {
				$time_ago=$key['created'];				
				$time_ago=$key['created'];				
       			$createddate=date('23', strtotime($key['created']));       			
				$row = array();


				$html .="<tr id=\"rowid".$key['did'].";?>\">
				<td> ".$key['application_no']."</td>
				<td> ".$key['account_number']."</td>
				<td> ".$key['branch_name']."</td>
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>				
				<td> ".date("d-m-Y", strtotime($key['created']))."</td>
				<td> ".number_format($key['average'],0,',',' ')."</td>
				<td> ".number_format($key['requested_overdraft'],0,',',' ')."</td>				
				<td>";						
					if($key['cad_status']=='Avis défavorable')
					{
						$label='label label-danger ui-draggable';
					}else if($key['cad_status']=='Confirm Disbursement')
					{
						$label='label label-success';
					}
					else if($key['cad_status']=='Avis Favorable')
					{
						$label='label label-info';
					}	
					else{
						$label="label label-primary";
					}
					$html .="<span class='$label'> ".$key['cad_status']."</span>
					</td>					
					<td class=\"sorting_1\">
						<a href=\"".base_url('Decovert_Approval_Cda/customer_details/').$key['did']."\" class=\"table-link\">
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
	 * 	###	In DECOUVERT Loan
   *  ###
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	###
	 */
	public function sendMailToHigherOfficial($loanId)
	{
		# Initialize an array
		$output = [];

		# Get loan amount				
		$getLoanDetails = $this->db->select('*')->from('tbl_decovert_applicationform')->where('did', $loanId)->get()->row_array();
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
		$getCustomerDetails = $this->db->select('*')->from('tbl_customer_personalinformation')->where('customar_id', $getLoanDetails['customer_id'])->get()->row_array();
		if(empty($getCustomerDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}

		# bank account
		$getbankaccount = $this->db->select('*')->from('tbl_customar_bank_account')->where('customar_id', $getLoanDetails['customer_id'])->get()->row_array();
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
		$subject = "Head Cad Avis favorable for a loan DECOVERT";
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
