<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decovert_Approval_Cda_Agent extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Dashboard';	
		$this->data['page'] = 'Decovert Loans';
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Cadagent_Loans_Model');	
		$this->load->model('Decovert_Loans_Model');
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
	//==========Consumer Loan Loan Section
	public function decovertloan(){
		$this->data['title'] = 'DCP | Decovert Loan';			
		$this->data['record']=$this->Common_model->get_admin_details(3);
		//$branchid=$this->data['record'][0]->bid; 
		$this->data['loantype']=$this->Cadagent_Loans_Model->get_loanType();	
		$this->data['loandetails']=$this->Cadagent_Loans_Model->get_Allapplication_form_Decovert();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/decovert_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}
	public function decovert_amortization_view(){
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->Decovert_Loans_Model->get_decovertamortizationview($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 9) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/decovert_amortization_view', $this->data);
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
		$this->data['appformD']=$this->Cadagent_Loans_Model->get_customar_details_Decovert($id);
		$customerID=$this->data['appformD'][0]['customer_id'];
		$this->data['loandetails']=$this->Cadagent_Loans_Model->get_decovert_application_form();
		$this->data['tracking_timeline']=$this->Decovert_Loans_Model->get_tracking_timeline($id);
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
		$this->data['risk_analysis']=$this->Decovert_Loans_Model->get_risk_analysisfileanalycis($id);

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
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/decovert_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}
	
	public function comment_manager()
    {
    	sleep(2);
		//print_r($_POST);exit;	
		/*[did] => 2
		[customar_id] => 5
		[manager_id] => 11
		[branch_id] => 4
		[account_manager_id] => 2
		[amt_check] => 13667*/
		$comnt='Decision - ';
		$output = '';	
    	$id=$this->uri->segment(3); 		
		$comnt ='Agent CAD Decision Confirm Disbursement this loan. |';
		$fata2=array(		
		'manager_id'=>trim($this->input->post('manager_id')),
		'branch_id'=>trim($this->input->post('branch_id')),
		'account_manager_id'=>trim($this->input->post('account_manager_id')),
		'customar_id'=>trim($this->input->post('customar_id')),		
		'loan_id'=>trim($this->input->post('did')),
		'decision'=>"Confirm Disbursement",
		'commentstatus'=>'Disbursement',
		'loantype'=>3,	
		"modified" =>date('Y-m-d H:i:s'),	
		);
		$insert=$this->Decovert_Loans_Model->insertRow('branmanager_approbation',$fata2);
		if($insert){			
			$data = array(
			"cadagent_status"=>"Confirm Disbursement",				
			"cad_status"=>'Process',				
			"cad_review"=>0,
			"ca_review"=>1,
			"cadagent_data"=>'Confirm Disbursement',
			"modified" =>date('Y-m-d H:i:s'),
			);						
			$edit=$this->Decovert_Loans_Model->updateRow('decovert_applicationform', 'did', $this->input->post('did'),$data);
			if($edit){				
				$status=str_replace('|', ', ', $comnt);
				$details=$status;
					$history_arr=array(
					"cl_aid" =>trim($this->input->post('did')),
					"admin_id" =>trim($this->input->post('manager_id')),				
					"comment" =>$details,
					'customar_id'=>trim($this->input->post('customar_id')),
					'content_type'=>'text',
					"loan_type"=>3,			
					"created" =>date('Y-m-d H:i:s'),
					);
				$res=$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
				$output .='1';
			}

			###
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

	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST); exit;
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->Cadagent_Loans_Model->filterDecovertloan(trim($this->input->post('filter')));
		//echo "<pre>", print_r($recordcheck),"</pre>";	
		$html=null;
		if(!empty($recordcheck)){
			foreach ($recordcheck as $key) {
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
						<a href=\"".base_url('Decovert_Approval_Cda_Agent/customer_details/').$key['did']."\" class=\"table-link\">
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

	public  function uploadfile_analysis_files()
	{
		//echo "<pre>", print_r($_POST),"</pre>";
		//echo "<pre>", print_r($_FILES),"</pre>";

sleep(2);
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/riskanalysis/';
			$config["allowed_types"] = '*';
			$config['max_size'] = '0';
			//$config['max_width'] = '1000';
			//$config['max_height'] = '1000';
			$config['encrypt_name'] = FALSE;
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
			}else{
				sleep(1);
				$filename = $this->upload->data();				  
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
					'section'=>4,
					'loan_type'=>3,
		    	);
				$rsid=$this->Decovert_Loans_Model->insertRow('tbl_riskanalysis',$data);
				$output=array('success' => $filesCount." files successfully upload.");
			}
		   }
		   if(!empty($output['success'])){
	  			$details="Account Manager ".$filesCount." files upload in system documents.";
				$history_arr=array(
					"cl_aid" =>$this->input->post("id"),
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>trim($this->input->post("customer_id")),
					"loan_type"=>3,
					"comment" =>$details,
					"content_type"=>"file",
					"created" =>date('Y-m-d H:i:s')
				);
				$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
			}
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
        $files = $this->Decovert_Loans_Model->get_risk_analysisfileanalycis($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths= './assets/riskanalysis/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths)); 			   
        }		
        $this->zip->download($createdzipsystemdocs.'.zip');
    }

    public function downloadall(){
        $createdzipsystemdocs = 'systemdocs';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->Decovert_Loans_Model->get_filedata($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths = './assets/Decovert_Loans/system-docs/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
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
		$subject = "Agent Cad Avis favorable for a loan DECOVERT";
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
