<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PP_Caution_Scolare_Loans_Cda_Agent extends Admin_Controller 
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
    	$this->load->model('Cadagent_Loans_Model');
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
		$this->data['record']=$this->Common_model->get_admin_details(3);		
		$this->data['loantype']=$this->PP_Caution_Scolare_Loans_Model->get_loanType();		
		$this->data['loandetails']=$this->Cadagent_Loans_Model->get_caution_scolare_Loans();
		$this->data['loanrange']=$this->PP_Caution_Scolare_Loans_Model->get_pprange();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id !=1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/Caution_Scolare_loan', $this->data);
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
		$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_record($id); 
		$this->data['appformD']=$this->Cadagent_Loans_Model->get_customar_details_caution_scolare($id);
		$customerID=$this->data['appformD'][0]['customar_id'];		
		//$this->data['loandetails']=$this->PP_Caution_Scolare_Loans_Model->get_new_application_form();
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
		
		// $this->data['adinfo']=$this->PP_Caution_Scolare_Loans_Model->get_adInformation($customerID);
		// $this->data['empinfo']=$this->PP_Caution_Scolare_Loans_Model->get_empInformation($customerID);
		// $this->data['adrs']=$this->PP_Caution_Scolare_Loans_Model->get_adrsInformation($customerID);
		// $this->data['bankinfo']=$this->PP_Caution_Scolare_Loans_Model->get_bnkInformation($customerID);
		// $this->data['otherinfo']=$this->PP_Caution_Scolare_Loans_Model->get_oInformation($customerID);
		$this->data['decision_rec']=$this->PP_Caution_Scolare_Loans_Model->get_decision_record($id);
		
		$this->data['customerdata']=$this->PP_Caution_Scolare_Loans_Model->get_customerdetails_list();
		//print_r($this->data['appformD'][0]);
		$is_admin = ($user_id !=1) ? true :false;
		$this->data['title'] = 'DCP | Caution Scolare Customer Details';
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/caution_scolaire_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}

	

   
    /*Amortization Section*/
    public function amortization_loan(){
    	$this->data['title'] = 'DCP | Caution Scolare TABLEAU AMORTISSMENT';
    	$id=$this->uri->segment(3); //exit;
    	$this->data['record']=$this->Common_model->get_admin_details(1);    	
    	$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_record($id);    		
    	
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;		
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/amortization_caution_scolare', $this->data);
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
    	$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_record($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;		
		$this->data['is_admin'] = $is_admin;

		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/amortization_view', $this->data); 
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		   	
    }
    public function amortization_view_pdf()
    {
    	$output='';
		  $Locations='';
		  $Rarray='';
		  $users_arr=array();	
		  $segmentid=$this->uri->segment(3); 	  
		  $getHtml=$this->generate_amortization_pdf1($segmentid);
		 // echo $getHtml;
		  $filename='Amortization-Credit-Conso-'.$segmentid.'-'.time();
		  //$filename='amortization_'.$segmentid.'_'.time();
		  $abc=pdf_po_create_proposal($getHtml,$filename,true);
		  if($abc==1){
		 	$data = array('amortization_pdf'=>$filename.'.pdf');
		  	$validate=$this->PP_Caution_Scolare_Loans_Model->check_amortization_files($segmentid);
		  	
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
        		$path_to_file = './assets/consumer_loan/amortization/'.$validate->amortization_pdf;
				if(unlink($path_to_file)) {
				    //echo 'Deleted successfully';
				}
				else {
				    // echo 'errors occured';
				}
        		$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);
        	}else{
        		$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}

    }    

   
	function temporary_generate_amortization_pdf($segmentid){		
		$this->data['amortrecord']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_befor_record($segmentid);
		return  $this->load->view('cad_agent/caution_scolaire_pdf_generate',$this->data,true);
	}
	function generate_amortization_pdf1($segmentid){		
		$this->data['amortizationdata']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_after_record($segmentid);
		return  $this->load->view('cad_agent/amortization_pdf_generate',$this->data,true);
	}

	//==========================today 24-06-2019======================================
	

	/*Decision Status Section*/
	public function comment_manager()
  {
    sleep(2);
		//print_r($_POST);exit;
		
		$comnt='Decision - ';
		$output = '';	
    	$id=$this->uri->segment(3); 		
		$comnt ='Agent CAD Decision Disbursement this loan. |';
		$fata2=array(		
			'manager_id'=>trim($this->input->post('manager_id')),
			'branch_id'=>trim($this->input->post('branch_id')),
			'account_manager_id'=>trim($this->input->post('account_manager_id')),
			'customar_id'=>trim($this->input->post('customar_id')),		
			'loan_id'=>trim($this->input->post('cl_aid')),
			'decision'=>"Confirm Disbursement",
			'commentstatus'=>'Disbursement',
			'loantype'=>4,
			'modified'=>date("Y-m-d H:i:s"),		
		);
		$insert=$this->PP_Caution_Scolare_Loans_Model->insertRow('branmanager_approbation',$fata2);
		if($insert){		
			
			$data = array(
				"cadagent_status"=>"Confirm Disbursement",				
				"cad_status"=>'Process',	
				"ca_review"=>1,
				"cad_review"=>0,
				'modified'=>date("Y-m-d H:i:s"),				
			);						
			$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('caution_scolaire_loans_applicationform', 'cl_aid', $this->input->post('cl_aid'),$data);
			if($edit){				
				$status=str_replace('|', ', ', $comnt);
				$details=$status;
					$history_arr=array(
						"cl_aid" =>trim($this->input->post('cl_aid')),
						"admin_id" =>trim($this->input->post('manager_id')),				
						"comment" =>$details,
						'customar_id'=>trim($this->input->post('customar_id')),
						'content_type'=>'text',
						"loan_type"=>4,			
						"created" =>date('Y-m-d H:i:s'),
					);
				$res=$this->PP_Caution_Scolare_Loans_Model->insertRow('tracking_timeline',$history_arr);
				$output .='1';
			}
				
			### 
			### Send Mail To Higher Official
			###
			$cl_aid = $this->input->post('cl_aid'); // loan id
			$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($cl_aid);
			if(!empty($sendMailToHigherOfficial)) {
				$output = $sendMailToHigherOfficial;
			}

		}

		echo $output;		
	}

	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){		
		$recordcheck=$this->Cadagent_Loans_Model->filter_Caution_Scolare_loan(trim($this->input->post('filter')));		
		$html=null;
		if(!empty($recordcheck)){
			foreach ($recordcheck as $key) {
				$time_ago=$key['created'];				
				$time_ago=$key['created'];				
       			$createddate=date('23', strtotime($key['created']));       			
				$row = array();


				$html .="<tr id=\"rowid".$key['cl_aid'].";?>\">
				<td> ".$key['application_no']."</td>
				<td> ".$key['account_number']."</td>
				<td> ".$key['branch_name']."</td>
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>				
				<td>-</td>
				<td> ".number_format($key['loan_interest'],0,',','')." Mois</td>
				<td> ".number_format($key['net_pay_amt'],0,',',' ')."</td>
				<td> ".number_format($key['net_block_amt'],0,',',' ')."</td>				
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
						<a href=\"".base_url('PP_Caution_Scolare_Loans_Cda_Agent/customer_details/').$key['cl_aid']."\" class=\"table-link\">
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
		$subject = "Cad Agent Decision for a loan CAUTION SCOLAIRE";
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

