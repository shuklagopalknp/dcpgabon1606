<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Decovert_Bank extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();		
		$this->data['page'] = 'PP Decovert Loans';
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Branch_Loans_Model');	
		$this->load->model('Decovert_Loans_Model');
		$this->load->model('PP_Credit_Scholar_Model');	
		$this->load->library('Class_Amort');
		$this->load->helper('lang_translate');
		$this->load->helper('timeAgo');
		$this->load->helper(array('dompdf', 'file'));
		date_default_timezone_set('GMT');
	}
	
	//==========Credit Scholar Loan Section
	public function decovert(){
		$this->data['title'] = 'DCP | Decovert Loan';			
		$this->data['record']=$this->Common_model->get_admin_details(3);
		$branchid=$this->data['record'][0]->bid; 
		$this->data['loantype']=$this->Branch_Loans_Model->get_loanType();			
		$this->data['fees']=$this->Branch_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Branch_Loans_Model->get_Allapplication_form_Decovert($branchid);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 3) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/decovert_bank', $this->data);
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
		$this->data['appformD']=$this->Branch_Loans_Model->get_customar_details_Decovert($id);
		$customerID=$this->data['appformD'][0]['customer_id'];		
		//$this->data['loandetails']=$this->Decovert_Loans_Model->get_new_application_form();
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
			/*Risk Analysis tab-4*/
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
		$is_admin = ($user_id != 3) ? true :false;
		$this->data['title'] = 'DCP | Consumer Loan Customer Details';
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/decovert_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}


	public function decovert_amortization_view()
    {
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->Decovert_Loans_Model->get_decovertamortizationview($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 3) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('subadmin/decovert_amortization_view', $this->data);  
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		  	
    }



	public function comment_manager()
	{

		//$amt=5000000;
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
			sleep(1);
			$comnt .='Branch Manager '.trim($this->input->post('decision')).' this loan. '.$this->input->post('commentstatus').'|';
			$fata2=array(		
				'manager_id'=>trim($this->input->post('manager_id')),
				'branch_id'=>trim($this->input->post('branch_id')),
				'account_manager_id'=>trim($this->input->post('account_manager_id')),
				'customar_id'=>trim($this->input->post('customar_id')),		
				'loan_id'=>trim($this->input->post('did')),
				'decision'=>trim($this->input->post('decision')),
				'commentstatus'=>trim($this->input->post('commentstatus')),
				'loantype'=>3,		
			);
			$insert=$this->Decovert_Loans_Model->insertRow('branmanager_approbation',$fata2);
			if($insert){

				if($this->input->post('decision')=="Avis défavorable")
				{
					$status = array(
						'branchmanager_status'=>trim($this->input->post('decision')),
						'loan_status'=>trim($this->input->post('decision')),
						'b_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
						
					);
				}
				else if($this->input->post('decision')=="Avis Favorable")
				{
					
						$status = array(
						'branchmanager_status'=>trim($this->input->post('decision')),
						'cic_status'=>'Process',
						'director_engagements'=>'Process',
						'b_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
						);										
				}	
				else{
					$status = array(
						'branchmanager_status'=>trim($this->input->post('decision')),
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>0,
						'b_review'=>0,
						'modified'=>date('Y-m-d H:i:s'),
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
				$this->Decovert_Loans_Model->updateRow('decovert_applicationform','did', $this->input->post('did'), $status);
				$msg2=str_replace('|', ', ', $comnt);
				$details=$msg2;

				$history_arr=array(
					"cl_aid" =>trim($this->input->post('did')),
					"admin_id" =>trim($this->input->post('manager_id')),					
					"comment" =>$details,
					'customar_id'=>trim($this->input->post('customar_id')),
					'content_type'=>'text',
					"loan_type"=>3,			
					"created" =>date('Y-m-d H:i:s')
				);
				$res=$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
				$output=array('success' =>"Decision successfully updated.");
				
				### 
				### Send Mail To Higher Official
				###
				$did = $this->input->post('did'); // loan id
				$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($did);
				if(!empty($sendMailToHigherOfficial)) {
					$output = $sendMailToHigherOfficial;
				}

			}else{
				$output=array('error' =>"Unable update to record");
			}
		}
		echo json_encode($output);
	}

	public function confirm_disbursement(){
		sleep(1);
		//print_r($_POST); exit;
		$getcp=$this->Branch_Loans_Model->get_loanamount_Decovert($this->input->post('did'));
		//print_r($getcp->requested_overdraft); exit;
		//exit;
		$row_array=array();
		$editid=$this->input->post('did');					
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
				
	$this->Decovert_Loans_Model->updateRow('decovert_applicationform', 'did',$editid, $status);
	$customerinfo=$this->Branch_Loans_Model->get_PersonalInformation_confrim_decovert($this->input->post('did'));
	//print_r($customerinfo); exit;

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
    			'cl_aid'=>trim($this->input->post('did')),
    			'admin_id' =>2,
    			'mailcontent' =>trim($databinding),
    			'mode'=>trim('Email'),
    			'loan_type' =>3,
    			'section' =>2,
    			'status'=>1,
    		);
            $rsid=$this->Decovert_Loans_Model->insertRow('interaction_history',$data);

            $history_arr=array(
					"cl_aid" =>trim($this->input->post('did')),
					"admin_id" =>trim($this->input->post('manager_id')),					
					"comment" =>"Final disbursement loan",
					'customar_id'=>trim($this->input->post('customar_id')),
					'content_type'=>'text',
					"loan_type"=>3,			
					"created" =>date('Y-m-d H:i:s')
				);
				$res=$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr); 

            $config['mailtype'] = 'html';
            $this->load->library('email',$config);
            $body= '<table border="0" cellpadding="0" cellspacing="0" class="body" style="border-collapse:separate;  width: 100%; background-color: #f6f6f6;">
            			<tr><td style="font-family: sans-serif; font-size: 14px; vertical-align: top;">&nbsp;</td>
        				<td class="container" style="font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; margin: 0 auto; max-width: 580px; padding: 10px; width: 580px;">
          			<div class="content" style="box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;">          
            		<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden;  visibility: hidden; width: 0;">
            		This is preheader text. Some clients will show this text as a preview.</span>
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
			                              		 CFA '.number_format($customerinfo[0]['requested_overdraft'],0,',',' ').'                       
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
    $this->email->subject('CONFIRM DECOUVERT LOANS-INTERACTION');
    $this->email->message($body);		    
    $send = $this->email->send();
    if ($send) {
       echo 'success';
    } else {
       echo 'error' .$this->email->print_debugger();
       //$data=array('status'=>0);
       $this->Decovert_Loans_Model->updateRow('interaction_history', 'id',$rsid,array('status'=>0));
    }   		    



	}


	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST); exit;
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->Branch_Loans_Model->filterDecovertloan(trim($this->input->post('filter')), trim($this->input->post('bid')));
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
					</td>					
					<td class=\"sorting_1\">
						<a href=\"".base_url('Decovert_Bank/customer_details/').$key['did']."\" class=\"table-link\">
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
		$subject = "Bank Manager Avis favorable for a loan DECOVERT";
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