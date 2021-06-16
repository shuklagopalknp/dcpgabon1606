<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PP_Consumer_Approval_CIC extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Dashboard';	
		$this->data['page'] = 'PP Consumer Loans';
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('Cic_Loans_Model');	
		$this->load->model('PP_Consumer_Loans_Model');
		$this->load->library('Class_Amort');
		$this->load->helper('lang_translate');	
		$this->load->helper(array('dompdf', 'file'));
		$this->load->helper('timeAgo');
		//date_default_timezone_set('Asia/Kolkata');
		date_default_timezone_set('GMT');
	}


	//==========Consumer Loan Loan Section
	public function consumerloan(){
		$this->data['title'] = 'DCP | Consumer Loan';			
		$this->data['record']=$this->Common_model->get_admin_details(3);
		//$branchid=$this->data['record'][0]->bid; 
		$this->data['loantype']=$this->Cic_Loans_Model->get_loanType();
		$this->data['loantax']=$this->Cic_Loans_Model->get_taxType();		
		$this->data['fees']=$this->Cic_Loans_Model->get_All_fees();
		$this->data['loandetails']=$this->Cic_Loans_Model->get_Allapplication_form_consumer();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 8) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='8'){			
			$this->render_template2('cic/consumer_loan.php', $this->data);
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
		$is_admin = ($user_id != 1) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='8'){			
			$this->render_template2('cic/credit_conso_amortization_view', $this->data);  
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
		$this->data['appformD']=$this->Cic_Loans_Model->get_customar_details_consumerloan($id);
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
		$is_admin = ($user_id != $this->session->userdata('id')) ? true :false;
		$this->data['title'] = 'DCP - Credit Scholar Customer Details';
		if($this->session->userdata('role')==='8'){			
			$this->render_template2('cic/consumer_loan_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}
	
	public function comment_manager()
	{
		//print_r($this->input->post());exit;
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
			$comnt .='Director CIC '.trim($this->input->post('decision')).' this loan. '.$this->input->post('commentstatus').'|';
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
			if($insert){

				if($this->input->post('decision')=="Avis défavorable")
				{
					$status = array(
						'cic_status'=>trim($this->input->post('decision')),						
						'c_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
					);
				}
				else if($this->input->post('decision')=="Avis Favorable")
				{
					$status = array(
						'cic_status'=>trim($this->input->post('decision')),
						'director_engagements'=>trim($this->input->post('decision')),    					
    					'cadagent_status'=>'Process',
    					'd_review'=>1,
    					'c_review'=>1,    					
    					'modified'=>date('Y-m-d H:i:s'),
					);
				}	
				else{
					$status = array(
						'cic_status'=>trim($this->input->post('decision')),	
						'c_review'=>0,
						'b_review'=>0,	
						'modified'=>date('Y-m-d H:i:s'),
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>0,
						'branchmanager_status'=>trim($this->input->post('decision')),
						'dcpranalyst_status'=>trim($this->input->post('decision')),
						'an_review'=>0,
						'dcpr_status'=>trim($this->input->post('decision')),
						'h_review'=>0,
						'director_engagements'=>trim($this->input->post('decision')),
						'd_review'=>0,
						'cad_status'=>trim($this->input->post('decision')),
						'cad_review'=>0,
						'cad_data'=>0,
						'cadagent_status'=>trim($this->input->post('decision')),
						'ca_review'=>0		
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
			}else{
				$output=array('error' =>"Unable update to record");
			}
		}
		echo json_encode($output);
	}

	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST); exit;
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->Cic_Loans_Model->filterConsumerloan(trim($this->input->post('filter')), trim($this->input->post('bid')));
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
					if($key['cic_status']=="Process" || $key['cic_status']=="Demande de retraitement"){
						$html .="<span class='blink' style='color:red'>".timeAgo($time_ago)."</span>";
					}else{
						$html .= timeAgo($time_ago);
					}
				}else{
					$html .= timeAgo($time_ago);
				}				
				$html .="</td>			
						<td> ".number_format($key['loan_amt'],0,',',' ')."</td>
						<td> ".$key['loan_interest']."%</td>
						<td> ".$key['loan_term']."</td>
						<td>";						
							if($key['cic_status']=='Avis défavorable')
							{
								$label='label label-danger ui-draggable';
							}else if($key['cic_status']=='Confirm Disbursement')
							{
								$label='label label-success';
							}
							else if($key['cic_status']=='Avis Favorable')
							{
								$label='label label-info';
							}	
							else{
								$label="label label-primary";
							}
							
					$html .="<span class='$label'> ".$key['cic_status']."</span>
					</td>					
					<td class=\"sorting_1\">
						<a href=\"".base_url('PP_Credit_Scholar_Approval_Cic/customer_details/').$key['cl_aid']."\" class=\"table-link\">
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
	
	
	
	
}