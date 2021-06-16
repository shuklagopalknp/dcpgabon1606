<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PP_Consumer_Approval_Cda_Agent extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Dashboard';	
		$this->data['page'] = 'PP Consumer Loans';
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Cadagent_Loans_Model');	
		$this->load->model('PP_Consumer_Loans_Model');
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
	public function consumerloan(){
		$this->data['title'] = 'DCP | Consumer Loan';			
		$this->data['record']=$this->Common_model->get_admin_details(3);
		//$branchid=$this->data['record'][0]->bid; 
		$this->data['loantype']=$this->Cadagent_Loans_Model->get_loanType();
		$this->data['loantax']=$this->Cadagent_Loans_Model->get_taxType();		
		$this->data['fees']=$this->Cadagent_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Cadagent_Loans_Model->get_Allapplication_form_consumer();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/consumer_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}
	public function amortizationview(){
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_amortization_record2($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/consumer_loan_amortization_view', $this->data);  
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
		$this->data['appformD']=$this->Cadagent_Loans_Model->get_customar_details_consumerloan($id);
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
		
		# Get agent cad decision form details - tbl_agent_cad_decision_form
		$this->data['agcdecisionform']=$this->PP_Consumer_Loans_Model->get_agentcad_decision_form($id);
		
		$is_admin = ($user_id != $this->session->userdata('id')) ? true :false;
		$this->data['title'] = 'DCP | Consumer Loan Customer Details';
		if($this->session->userdata('role')==='11'){			
			$this->render_template2('cad_agent/consumer_loan_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}
	
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
			'loantype'=>1,
			"modified" =>date('Y-m-d H:i:s'),
		);
		$insert=$this->PP_Consumer_Loans_Model->insertRow('branmanager_approbation',$fata2);
		if($insert){			
			$data = array(
				"cadagent_status"=>"Confirm Disbursement",				
				"cad_status"=>'Process',	
				"ca_review"=>1,
				"cad_review"=>0,
				"modified" =>date('Y-m-d H:i:s'),
			);						
			$edit=$this->PP_Consumer_Loans_Model->updateRow('consumer_loans_applicationform', 'cl_aid', $this->input->post('cl_aid'),$data);
			if($edit){				
				$status=str_replace('|', ', ', $comnt);
				$details=$status;
					$history_arr=array(
						"cl_aid" =>trim($this->input->post('cl_aid')),
						"admin_id" =>trim($this->input->post('manager_id')),				
						"comment" =>$details,
						'customar_id'=>trim($this->input->post('customar_id')),
						'content_type'=>'text',
						"loan_type"=>1,			
						"created" =>date('Y-m-d H:i:s'),
					);
				$res=$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
		//print_r($_POST); exit;
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->Cadagent_Loans_Model->filterConsumerloan(trim($this->input->post('filter')));
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
					if($key['cadagent_status']=="Process" || $key['branchmanager_status']=="Demande de retraitement"){
							$html .= "<span class='blink' style='color:red'>".timeAgo($time_ago)."</span>";
					}else{
						$html .= timeAgo($time_ago);
					}
				}else{
					$html .= timeAgo($time_ago);
				}				
				$html .="</td>			
						<td>".number_format($key['loan_amt'],0,',',' ')."</td>
						<td> ".number_format($key['loan_interest'],2,',',' ')."%</td>
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
						<a href=\"".base_url('PP_Consumer_Approval_Cda_Agent/customer_details/').$key['cl_aid']."\" class=\"table-link\">
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
		$subject = "Cad Agent Avis favorable for a loan CREDIT CONSO";
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


  	# insert the form data 

	public function insert_form(){
        
		$tbl_agent_cad_decision_form = array(
			'user_id'=>$this->session->userdata('id'),
			'loan_id' =>$this->input->post('loan_id')??'',
			'moyen_Terme_de' => $this->input->post('moyen_Terme_de')??'',
			'date' => $this->input->post('date')??'',
			'termede' => $this->input->post('termede')??'',
			'1_1' => $this->input->post('1_1')??'',
			'1_2' => $this->input->post('1_2')??'',
			'1_3' => $this->input->post('1_3')??'',
			'1_4' => $this->input->post('1_4')??'',
			'1_5' => $this->input->post('1_5')??'',
			'rc' => $this->input->post('rc')??'',
			'racine_Client' => $this->input->post('racine_Client')??'',
			'nom_du_client' => $this->input->post('nom_du_client')??'',
			'montant_du_prêt' => $this->input->post('montant_du_prêt')??'',
			'date_de_valeur' => $this->input->post('date_de_valeur')??'',
			'date_lere_échéance' => $this->input->post('date_lere_échéance')??'',
			'date_dernière_échéance' => $this->input->post('date_dernière_échéance')??'',
			'durée_du_prêt' => $this->input->post('durée_du_prêt')??'',
			'Nombre_déchéances' => $this->input->post('Nombre_déchéances')??'',	
			'date_accord_CIC' => $this->input->post('date_accord_CIC')??'',			
			'type_de_différé' => $this->input->post('type_de_différé')??'',
			'périodocoté_de_remboursement' => $this->input->post('périodocoté_de_remboursement')??'',
			'frais_de_dossier' => $this->input->post('frais_de_dossier')??'',
			'Compte_courant' => $this->input->post('Compte_courant')??'',
     	    'taux' => $this->input->post('taux')??'',
     		'employeur' => $this->input->post('employeur')??'',
			'2_1_LIB' => $this->input->post('2_1_LIB')??'',
			'2_1_compte' => $this->input->post('2_1_compte')??'',
			'2_FCFA' => $this->input->post('2_FCFA')??'',
			'2_2_LIB' => $this->input->post('2_2_LIB')??'',
			'2_2_compte' => $this->input->post('2_2_compte')??'',
			'3_1_LIB' => $this->input->post('3_1_LIB')??'',
			'3_1_compte' => $this->input->post('3_1_compte')??'',
			'3_FCFA' => $this->input->post('3_FCFA')??'',
			'3_2_LIB' => $this->input->post('3_2_LIB')??'',
			'3_2_compte' => $this->input->post('3_2_compte')??'',	
			'securite' => $this->input->post('securite')??''			
    );
	$userdata = $this->db->select('*')->from('tbl_agent_cad_decision_form')->where('loan_id', $this->input->post('loan_id'))->get()->row_array();

	    
    # Insert/Update the data
    if(empty($userdata)) { // Insert
	  $this->PP_Consumer_Loans_Model->insertRow('agent_cad_decision_form',$tbl_agent_cad_decision_form);
	  
	  $this->session->set_flashdata('success','insert Successfully !');
	redirect(base_url('PP_Consumer_Approval_Cda_Agent/customer_details/'.$this->input->post('loan_id')));
	
    } else { // Update
      $this->db->where('loan_id',$this->input->post('loan_id'))->update("agent_cad_decision_form",$tbl_agent_cad_decision_form);
    }
    
    # Return response
    $this->session->set_flashdata('success','Updated Successfully !');
    redirect(base_url('PP_Consumer_Approval_Cda_Agent/customer_details/'.$this->input->post('loan_id')));
	}
	
}
