<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PP_Consumer_Approval_Operating_Director extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Dashboard';	
		$this->data['page'] = 'PP Consumer Loans';
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Operating_Director_Loans_Model');			
		$this->load->model('PP_Consumer_Loans_Model');
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
	public function index(){
		error_reporting(0);
		$this->data['title'] = 'DCP - Caution Scolare Loans';			
		$this->data['record']=$this->Common_model->get_admin_details(3);	


		
		if(!empty($this->data['record'][0]->bid)){
			$branchid=$this->data['record'][0]->bid;
		}else{
			$branchid='';
		} 
		$this->data['loantype']=$this->PP_Consumer_Loans_Model->get_loanType();
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();		
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Operating_Director_Loans_Model->get_Allapplication_form_consumer();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id !=1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='12'){			
			$this->render_template2('operating_manager/consumer_loan', $this->data);
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
		$this->data['appformD']=$this->Operating_Director_Loans_Model->get_customar_details_consumer_loan($id);
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
		$is_admin = ($user_id !=1) ? true :false;
		$this->data['title'] = 'DCP | Caution Scolare Customer Details';
		if($this->session->userdata('role')==='12'){			
			$this->render_template2('operating_manager/consumer_loan_customer_details', $this->data);
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
    	$this->data['amortrecord']=$this->Operating_Director_Loans_Model->get_amortization_record($id);    		
    	
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;		
		if($this->session->userdata('role')==='12'){			
			$this->render_template2('operating_manager/amortization_caution_scolare', $this->data);
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
    	$this->data['amortrecord']=$this->Operating_Director_Loans_Model->get_amortization_record($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;		
		$this->data['is_admin'] = $is_admin;

		if($this->session->userdata('role')==='11'){			
			$this->render_template2('operating_manager/amortization_view', $this->data); 
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
		  	$validate=$this->get_amortization_record->check_amortization_files($segmentid);
		  	
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
        		$path_to_file = './assets/caution_scolaire/amortization/'.$validate->amortization_pdf;
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
		return  $this->load->view('subadmin/caution_scolaire_pdf_generate',$this->data,true);
	}
	function generate_amortization_pdf1($segmentid){		
		$this->data['amortizationdata']=$this->PP_Caution_Scolare_Loans_Model->get_amortization_after_record($segmentid);
		return  $this->load->view('subadmin/amortization_pdf_generate',$this->data,true);
	}

	//==========================today 24-06-2019======================================
	
	
	public function comment_manager()
  {
		//print_r($this->input->post());exit;
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
			'loan_id'=>trim($this->input->post('cl_aid')),
			'decision'=>"Confirm Disbursement",
			'commentstatus'=>trim($this->input->post('filedzome')),
			'loantype'=>4,
			'modified'=>date('Y-m-d H:i:s'),
		);
		$insert=$this->PP_Caution_Scolare_Loans_Model->insertRow('branmanager_approbation',$fata2);
		if($insert){			
			$data = array(
				"operating_director_status"=>"Confirm Disbursement",				
				"final_confirmation"=>'Confirm',
				"operating_director_status"=>'Process',				
				"cad_data"=>$postoption,
				"cad_review"=>1,
				"od_review"=>0,
				'modified'=>date('Y-m-d H:i:s'),
			);						
			$edit=$this->PP_Caution_Scolare_Loans_Model->updateRow('caution_scolaire_loans_applicationform', 'cl_aid', $this->input->post('cl_aid'),$data);
			if($edit){				
				$status=str_replace('|', ', ', $status);
				$details=$status;
					$history_arr=array(
						"cl_aid" =>trim($this->input->post('cl_aid')),
						"admin_id" =>trim($this->input->post('manager_id')),				
						"comment" =>$details,
						'customar_id'=>trim($this->input->post('customer_id')),
						'content_type'=>'text',
						"loan_type"=>4,			
						"created" =>date('Y-m-d H:i:s')
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
	}


	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){		
		$recordcheck=$this->Operating_Director_Loans_Model->filter_Caution_Scolare_loan(trim($this->input->post('filter')));		
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
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>
				<td> ".number_format($key['loan_interest'],0,',','')." Mois</td>
				<td> ".number_format($key['net_pay_amt'],0,',',' ')."</td>
				<td> ".number_format($key['net_block_amt'],0,',',' ')."</td>				
				<td>";						
					if($key['operating_director_status']=='Avis défavorable')
					{
						$label='label label-danger ui-draggable';
					}else if($key['operating_director_status']=='Confirm Disbursement')
					{
						$label='label label-success';
					}
					else if($key['operating_director_status']=='Avis Favorable')
					{
						$label='label label-info';
					}	
					else{
						$label="label label-primary";
					}
					$html .="<span class='$label'> ".$key['operating_director_status']."</span>
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
						<a href=\"".base_url('PP_Caution_Scolare_Loans_Operating_Director/customer_details/').$key['cl_aid']."\" class=\"table-link\">
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




	public function confirm_disbursement(){
		sleep(3);
		error_reporting(0);
		//print_r($_POST); exit;
		$getcp=$this->Operating_Director_Loans_Model->get_credit_conso_loanamount($this->input->post('cl_aid'));
		$customerinfo=$this->Operating_Director_Loans_Model->get_PersonalInformation_customer_consumer_loan($this->input->post('cl_aid'));
		//print_r($getcp); 
		//echo $customerinfo[0]['first_name'];
		//print_r($customerinfo); exit;
		$row_array=array();
		$editid=$this->input->post('cl_aid');					
			$status = array(
				'branchmanager_status'=>"Confirm Disbursement",
				'final_confirmation'=>'Disbursement',
				'loan_status'=>'Confirm Disbursement',
				'cic_status'=>'Confirm Disbursement',
				'dcpranalyst_status'=>'Confirm Disbursement',
				'dcpr_status'=>'Confirm Disbursement',
				'director_engagements'=>'Confirm Disbursement',				
				'operating_director_status'=>'Confirm Disbursement',
				'cadagent_status'=>'Confirm Disbursement',
				'operating_director_status'=>'Confirm Disbursement',				
				'a_review'=>1,
				'b_review'=>1,
				'an_review'=>1,
				'h_review'=>1,
				'd_review'=>1,
				'cad_review'=>1,
				'c_review'=>1,
				'ca_review'=>1,
				'od_review'=>1,
				'modified'=>date('Y-m-d H:i:s'),
			);			
				
	$this->Operating_Director_Loans_Model->updateRow('consumer_loans_applicationform', 'cl_aid',$editid, $status);
	$fata2=array(		
			'manager_id'=>32,
			'branch_id'=>4,
			'account_manager_id'=>trim($getcp->admin_id),
			'customar_id'=>trim($getcp->customar_id),		
			'loan_id'=>trim($this->input->post('cl_aid')),
			'decision'=>'Disbursement',
			'commentstatus'=>'Final Disbursement',
			'loantype'=>1,
			"created" =>date('Y-m-d H:i:s'),
			"modified" =>date('Y-m-d H:i:s')			
		);
		$insert=$this->Operating_Director_Loans_Model->insertRow('branmanager_approbation',$fata2);
		$history_arr=array(
			"cl_aid" =>trim($editid),
			"admin_id" =>32,					
			"comment" =>"Director Operating Manager Final Disbursement This Loan",
			'customar_id'=>trim($getcp->customar_id),
			'content_type'=>'text',
			"loan_type"=>1,			
			"created" =>date('Y-m-d H:i:s')
		);
		$res=$this->Operating_Director_Loans_Model->insertRow('tracking_timeline',$history_arr); 


	

		$customer_email=$customerinfo[0]['customer_email'];
		$customer_name=$customerinfo[0]['first_name'];
		$customer_email=$customerinfo[0]['customer_email'];		
			$maildata = array(			
                'field_name' =>trim($customer_name),
                'fieldemail' =>trim($customer_email),
                'fieldsubject' =>"CONFIRM CREDIT-CONSO LOANS-INTERACTION",
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
    			'section' =>1,
    			'status'=>1,
    			'created'=>date('Y-m-d H:i:s'),    			
    		);
           $rsid=$this->Operating_Director_Loans_Model->insertRow('interaction_history',$data); 

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
								</tr>
							</thead>
                          <tbody>
                            <tr>
	                            <td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
	                              	'.$customerinfo[0]['last_name'].' '.$customerinfo[0]['first_name'].'
	                            </td>
                              	<td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">CREDIT CONSO</td>
                              	<td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                              		 CFA '.number_format($customerinfo[0]['loan_amt'],0,',',' ').'
                              	</td>
                              	<td align="left" style="font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;">
                              	'.number_format($customerinfo[0]['loan_interest']).'%
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

//echo $body; exit;


    //echo $this->session->userdata('email'); exit;
	$config['mailtype'] = 'html';
	$this->email->set_mailtype("html");		    	
	$this->load->library('email',$config);
    $emailto =$customer_email;   
    $this->email->from($this->session->userdata('email'));
    $this->email->to($emailto, $customer_name);
    $this->email->cc('prashanth.saride@gmail.com','bagui.bonaventure@digitalmoneybridge.com','info@dcpilote.com'); 
    $this->email->subject('CONFIRM CREDIT-CONSO LOANS-INTERACTION');
    $this->email->message($body);		    
    $send = $this->email->send();
    if ($send) {
       echo 'success';
       $this->Operating_Director_Loans_Model->updateRow('interaction_history', 'id',$rsid,array('status'=>0));
    } else {
       echo 'error' .$this->email->print_debugger();
       //$data=array('status'=>0);
        $this->Operating_Director_Loans_Model->updateRow('interaction_history', 'id',$rsid,array('status'=>0));
    }   		    



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
		$subject = "Operating Director Avis favorable for a loan CREDIT CONSO";
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
