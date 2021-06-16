<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Decovert_Approval_Analyst extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Decovert Loans';	
		$this->data['page'] = 'PP Decovert Loans';
		$this->load->library('session');		
    	$this->load->model('Common_model');
		$this->load->model('RiskAnalyst_Loans_Model');	
		$this->load->model('Decovert_Loans_Model');
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
	public function decovertloan(){
		$this->data['title'] = 'DCP | Decovert Loan';			
		$this->data['record']=$this->Common_model->get_admin_details(3);			 
		$this->data['loantype']=$this->RiskAnalyst_Loans_Model->get_loanType();	
		$this->data['loandetails']=$this->RiskAnalyst_Loans_Model->get_Allapplication_form_Decovert();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 6) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='6'){			
			$this->render_template2('analyst/decovert_loan', $this->data);
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
		$this->data['appformD']=$this->RiskAnalyst_Loans_Model->get_customar_details_Decovert($id);
		$customerID=$this->data['appformD'][0]['customer_id'];		
		$this->data['loandetails']=$this->RiskAnalyst_Loans_Model->get_Decovert_application_form();
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
		
		$this->data['customersd']=$this->Decovert_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
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
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['title'] = 'DCP - Decovert Customer Details';
		if($this->session->userdata('role')==='6'){			
			$this->render_template2('analyst/decovert_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}				
	}

	public function decovert_amortization_view()
    {
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(2);
		$this->data['amortrecord']=$this->Decovert_Loans_Model->get_decovertamortizationview($id);
    	$user_id = $this->session->userdata('id'); 
		$is_admin = ($user_id != 1) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='6'){			
			$this->render_template2('analyst/decovert_amortization_view', $this->data);  
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
		  	
    }
	
	public function comment_manager()
    {
		//echo "<pre|>",print_r($_POST), "</pre>"; exit;
		/*[decision] => Avis Favorable
		[commentstatus] => sdfsdf
		[did] => 5
		[customar_id] => 1
		[branch_id] => 4
		[manager_id] => 6
		[loanamount] => 5666670*/
		$comnt='Decision - ';
		$output='';
		$this->data['title'] = 'DCP - Decovert Customer Details';	    	
    	$id=$this->uri->segment(3); 		
		$msg='Decision - &nbsp;';		
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
			$comnt .='DCPR Analyst '.trim($this->input->post('decision')).' this loan. '.$this->input->post('commentstatus').'|';		
			$fata2=array(		
				'manager_id'=>trim($this->input->post('manager_id')),
				'branch_id'=>trim($this->input->post('branch_id')),
				'account_manager_id'=>trim($this->input->post('account_manager_id')),
				'customar_id'=>trim($this->input->post('customar_id')),			
				'decision'=>trim($this->input->post('decision')),
				'commentstatus'=>trim($this->input->post('commentstatus')),
				'loan_id'=>trim($this->input->post('did')),
				'loantype'=>'3',		
			);
			$insert=$this->Decovert_Loans_Model->insertRow('branmanager_approbation',$fata2);
			if($insert){
				if($this->input->post('decision')=="Avis défavorable")
				{
					$data = array(
						'dcpranalyst_status'=>trim($this->input->post('decision')),
						//'branchmanager_status'=>trim($this->input->post('decision')),
						//'loan_status'=>trim($this->input->post('decision')),
						'an_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
					);
				}
				else if($this->input->post('decision')=="Avis Favorable")
				{
					$data = array(
						'dcpranalyst_status'=>trim($this->input->post('decision')),
						'dcpr_status'=>'Process',
						'an_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
					);
				}	
				else{
					$data = array(
						'dcpranalyst_status'=>trim($this->input->post('decision')),
						'branchmanager_status'=>trim($this->input->post('decision')),	
						'an_review'=>0,	
						'b_review'=>0,
						'modified'=>date('Y-m-d H:i:s'),
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>0,
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
				$edit=$this->Decovert_Loans_Model->updateRow('decovert_applicationform', 'did', $this->input->post('did'),$data);
				if($edit){				
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
				}
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
		$recordcheck=$this->RiskAnalyst_Loans_Model->filterDecovertloan(trim($this->input->post('filter')) );
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
					if($key['dcpranalyst_status']=='Avis défavorable')
					{
						$label='label label-danger ui-draggable';
					}else if($key['dcpranalyst_status']=='Confirm Disbursement')
					{
						$label='label label-success';
					}
					else if($key['dcpranalyst_status']=='Avis Favorable')
					{
						$label='label label-info';
					}	
					else{
						$label="label label-primary";
					}
					$html .="<span class='$label'> ".$key['dcpranalyst_status']."</span>
					</td>					
					<td class=\"sorting_1\">
						<a href=\"".base_url('Decovert_Approval_Analyst/customer_details/').$key['did']."\" class=\"table-link\">
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