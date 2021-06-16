<?php 
// New Update : 02-09-2020

// Usage : This controller maintains escompte products functionalities in the application

defined('BASEPATH') OR exit('No direct script access aloowed');

class Escompte extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Escompte';	
		$this->data['page'] = 'PP Escompte';
		
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Customer_Model');
    	$this->load->model('Setting_Model');
    	$this->load->model('PP_Consumer_Loans_Model');
    	$this->load->model('Gage_Espece_Model');
    	$this->load->model('Employer_Model');
    	$this->load->model('Secteur_Model');
    	$this->load->model('EmployeeCategory_Model');
    	$this->load->model('Admin_Model');
    	$this->load->model('Escompte_Model');
    	$this->load->helper('timeAgo');
	}

	
	/*------------------- Start manage escompte--------------------*/
	public function index($param=''){
		

		$this->data['record'] = $this->Common_model->get_admin_details();

		$this->data['loan_details'] =  $this->Escompte_Model->get_loan_details_branchwise();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('business_products/escompte/index', $this->data);
	}

	public function select(){

		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Escompte';

		$this->data['product'] = "escompte";
		$this->data['sub_product'] = $this->input->post('sub_product');
		$this->data['secteurs']=$this->Secteur_Model->get_all_secteurs();
		$this->data['cat_emp']=$this->EmployeeCategory_Model->get_all_categories();
		$this->data['employers'] =  $this->Employer_Model->get_all_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['branch_record']=$this->PP_Consumer_Loans_Model->get_All_branch();
		$this->data['nationality'] =  $this->Common_model->get_all_nationalities();

		$user_id = $this->session->userdata('id');
		$this->data['branchdata'] =  $this->Common_model->get_user_branch($user_id);
		// Show Individual Form 
		$this->data['addForm'] =  $this->load->view('customer/individual_customerForm',$this->data,true);
		$this->data['individual_details'] = $this->Customer_Model->get_customer_branchwise('individual');

		// Show Business Form 
		
		$this->data['addbussinessForm'] =  $this->load->view('customer/business_customerForm',$this->data,true);
		$this->data['business_details'] = $this->Customer_Model->get_customer_branchwise('business');

		$this->render_template2('business_products/escompte/select_customer', $this->data);
	}


	/*--------------------------Save Both Customer and Business Loan ---------------------------*/

	public function save_customer_loan()
	{
		 $customer_id = $this->input->post('customer_id');
		 $sub_product = $this->input->post('sub_product');
		 $customer_type  =  $this->input->post('type');

		$res =  $this->Escompte_Model->save_loan_application($customer_id,$sub_product,$customer_type);
	}

	/*--------------------------Save Both Customer and Business Loan ---------------------------*/


	/*-------------start View Both Customer and Business Loan Details-----------*/

	public function customer_details($loan_id){

		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Escompte';

		// Loan Details
		$this->data['loan_details'] = $this->Escompte_Model->get_single_loan_details($loan_id);

		$this->data['decision_rec'] =  $this->Escompte_Model->get_approval_decision_details($loan_id,"escompte");

		
		  
		$this->data['customer'] = json_decode($this->data['loan_details']['customer_data']);
		$this->data['officer'] = json_decode($this->data['loan_details']['officer_data']);
		$this->data['risk_analysis'] =  $this->Escompte_Model->get_risk_analysis_details($loan_id);
		
		// echo '<pre>';
		// print_r($this->data['risk_analysis']); die;

		$this->data['tracking_timeline'] =  $this->Escompte_Model->get_tracking_details($loan_id);
		$this->data['history_interaction'] =  $this->Escompte_Model->get_interaction_history($loan_id);

		$cad_where =  array('loan_id'=>$loan_id);
		$this->data['agcdecisionform'] =  $this->Common_model->getRecord('tbl_business_cad_decision_form_n','',$cad_where);
		

		// Master details
		$this->data['product_tabs'] =  $this->Setting_Model->get_saved_product_tab($this->data['loan_details']['product_tab_data']);

		if(isset($this->data['customer']->branch)){

			$this->data['customer_branch'] =  $this->Admin_Model->get_branch_details($this->data['customer']->branch);
		}
		else
		{
			$this->data['customer_branch'] =  $this->Admin_Model->get_branch_details($this->data['customer']->branch_id);
		}

		
		$this->data['documents'] =  $this->Escompte_Model->get_saved_documents($loan_id);
		$this->data['secteurs']=$this->Secteur_Model->get_all_secteurs();
		$this->data['employers'] =  $this->Employer_Model->get_all_employers();
		$this->data['cat_emp']=$this->EmployeeCategory_Model->get_all_categories();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['nationality'] =  $this->Common_model->get_all_nationalities();
		$this->data['branch_record']=$this->PP_Consumer_Loans_Model->get_All_branch();
		if($this->data['loan_details']['customer_type'] == "1")
		{
			$this->render_template2('business_products/escompte/customer_details', $this->data);
		}
		else
		{

			$this->render_template2('business_products/escompte/business_details', $this->data);
		}
		

	}

	/*--------------------------End View Both Customer and Business Loan Details-----------------*/


	public function manage_risk_analysis($loan_id)
	{
		$post_data =  array(
							'limit_maximum_amount' =>  $this->input->post('limit_maximum_amount'),
							'duration' =>  $this->input->post('duration'),
							'tax_rate' =>  $this->input->post('rate'),
							'fee_amount' =>  $this->input->post('fee_amount'),
							'tax_on_fees' =>  $this->input->post('tax_on_fees'),
							'fee_vat' =>  $this->input->post('fee_vat'),

		);

		$calculated_amount =  $this->input->post('calculated_amount');

		if(empty($this->input->post('total_amount'))){
			$post_data['total_amount'] = $calculated_amount ;
		}
		else{
			$post_data['total_amount'] =  $this->input->post('total_amount');
		}

		$post_data['loan_id'] =  $loan_id;
		$post_data['user_id'] =  $this->session->userdata('id');

		$invoices =  $this->input->post('invoices');
		$invoice_id =  $this->input->post('invoice_id');
		$amount_before_tax = $this->input->post('amount_before_tax');
		$purchase_order =  $this->input->post('purchase_order');

	// /	print_r($_POST); die;

		$where =  array('loan_id' => $loan_id);
		$check_riskanalyse =  $this->Common_model->getRecord('tbl_escompte_riskcalculation_n','',$where);

		if(empty($check_riskanalyse))
		{
			$post_data['created_at'] =  DATETIME;
		  	if($insert_id  =  $this->Common_model->insertRow('tbl_escompte_riskcalculation_n',$post_data))
		  	{
		  		if($calculated_amount)
		  		{
		  			foreach($invoices as $key=>$row){
		  				if($row){
		  					$insert_data =  array(
		  								'risk_calculation_id' => $insert_id,
		  								'invoices' => $row,
		  								'amount_before_tax' => $amount_before_tax[$key],
		  								'purchase_order' => $purchase_order[$key],
		  								'created_at' => DATETIME
		  					);

		  					$this->Common_model->insertRow('tbl_escompte_invoices_n',$insert_data);
		  				}
		  			}
		  		}

		  		// get loan lies in which workflow 

				$work_where =  array('type' => "escompte",'deleted' => "0");
				$select_workflow=  $this->Common_model->getAllRecords('tbl_workflow',$work_where);


				foreach($select_workflow as $row)
				{
					$credit_amount  = $post_data['limit_maximum_amount']; 
					if( ($row['min_amount'] && (int)$row['min_amount'] != 0) && ($row['max_amount'] == "" || $row['max_amount'] == "0"))
					{
						if($credit_amount >= $row['min_amount'])
						{
							$workflow_id  =  $row['workflow_id'];
							break;
						}
					}
					else if((int)$row['min_amount'] == 0 && $row['max_amount'] > 0)
					{
						if($credit_amount <= $row['max_amount'])
						{
							$workflow_id  =  $row['workflow_id'];
							break;
						}
					}
					else if($row['min_amount'] > 0  && $row['max_amount'] > 0)
					{
						if($credit_amount <= $row['max_amount'] && $credit_amount >= $row['min_amount'])
						{
							$workflow_id  =  $row['workflow_id'];
							break;
						}
					}
					

				}

				// select final workflow

				if($workflow_id)
				{
					// delete previous data which is inserted when loan is created
					 $this->db->where('loan_id',$loan_id);
	                 $this->db->where('workflow_id','0');
					 $this->db->where('loan_type',"escompte");
					 $this->db->delete('tbl_all_applications');

					$finalwork_where =  array('workflow_id' => $workflow_id);
					$workflow =  $this->Common_model->getRecord('tbl_workflow','',$finalwork_where);

					//print_r($workflow); 

					$finalwork_where =  array('workflow_id' => $workflow_id);
					$workflow =  $this->Common_model->getRecord('tbl_workflow','',$finalwork_where);

					//print_r($workflow); 

					// Insert in All Application Approval table
					$order_arr =  explode(',',$workflow['workflow_order']);
					$role_ids = explode(',',$workflow['role_ids']);

					$sorted_order_arr =  array_diff($order_arr, array('0'));

					sort($sorted_order_arr);
				
					$count =0;
					foreach($sorted_order_arr as $key=>$worder){
						if($worder)
						{
							$w_order =  $worder; 
							

							if($worder == '1'){
								$review = '0';
								$status = 'Process';
							}
							else{
								$review = NULL;
								$status = '';
							}

							//print_r($order_arr);
							$ord_key =  array_search($w_order,$order_arr);

							
							if($role_ids[$ord_key] != "cic")
							{
								
								if($count == 0)
								{
									$w_ord =  $w_order;
								}
								else{
									$w_ord =  $count;

									 $count++;
								}
								

								$record = array(
									'loan_id' => $loan_id,
									'loan_type' => 'escompte',
									'workflow_id' => $workflow['workflow_id'],
									'workflow_order' => $w_ord,
									'assigned_roles' => $role_ids[$ord_key],
									'review' =>$review,
									'approval_status' => $status,
									'comment' => '',
									'comment_date' => ''
								);
								//print_r($record);
								$this->Common_model->insertRow('tbl_all_applications',$record);

							}
							else{

								$cic_where  =  array('group_id' => $workflow['assigned_cic_grp_id'] );
								$cic_data =  $this->Common_model->getAllRecords('tbl_assignroles',$cic_where);

								//print_r($cic_data); die;

								$count =  $w_order;
								foreach($cic_data as $row_cic)
								{
									$record = array(
												'loan_id' => $loan_id,
												'loan_type' => 'escompte',
												'workflow_id' => $workflow['workflow_id'],
												'workflow_order' => $count,
												'assigned_roles' => $row_cic['role_id'],
												'review' =>NULL,
												'approval_status' => '',
												'comment' => '',
												'comment_date' => ''
										);

									
									$this->Common_model->insertRow('tbl_all_applications',$record);
									$count++;
								}
							}	

						}
					}

						$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' => $this->session->userdata('id'),
											'product_type' => "escompte",
											'comment' => "Risk Analysis data is updated and Workflow Initated",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);

					echo "success";
				}
				else {
					$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' =>$this->session->userdata('id'),
											'product_type' => "escompte",
											'comment' => "Risk Analysis data is updated But No Workflow Initated",
											'content_type' => "text"
						);

					$this->Common_model->insertRow('business_tracking_timeline',$track_data);

					echo "no_workflow_matched";
				}

		  		
		  	}
		  	else{
		  		echo "error";
		  	}
		}
		else {
			
			if($this->Common_model->updateRow('tbl_escompte_riskcalculation_n','id',$check_riskanalyse['id'],$post_data))
			{


				
				if($calculated_amount != 0.00)
		  		{
		  			foreach($invoices as $key=>$row){
		  				if($row){
		  					$insert_data =  array(
		  								'risk_calculation_id' => $check_riskanalyse['id'],
		  								'invoices' => $row,
		  								'amount_before_tax' => $amount_before_tax[$key],
		  								'purchase_order' => $purchase_order[$key]
		  					);
							
							if($invoice_id[$key])
		  					{
		  						$this->Common_model->updateRow('tbl_escompte_invoices_n','id',$invoice_id[$key],$insert_data);
		  					}
		  					else{

		  					  	$this->Common_model->insertRow('tbl_escompte_invoices_n',$insert_data);
		  					}
		  					
		  				}
		  			}
		  		}
		  		else{
		  			$this->db->where('risk_calculation_id',$check_riskanalyse['id']);
		  			$this->db->delete('tbl_escompte_invoices_n');

		  			//echo $this->db->last_query();

		  		}


		  		// get loan lies in which workflow 

				$work_where =  array('type' => "escompte",'deleted' => "0");
				$select_workflow=  $this->Common_model->getAllRecords('tbl_workflow',$work_where);


				foreach($select_workflow as $row)
				{
					$credit_amount  = $post_data['limit_maximum_amount']; 
					if( ($row['min_amount'] && (int)$row['min_amount'] != 0) && ($row['max_amount'] == "" || $row['max_amount'] == "0"))
					{
						if($credit_amount >= $row['min_amount'])
						{
							$workflow_id  =  $row['workflow_id'];
							break;
						}
					}
					else if((int)$row['min_amount'] == 0 && $row['max_amount'] > 0)
					{
						if($credit_amount <= $row['max_amount'])
						{
							$workflow_id  =  $row['workflow_id'];
							break;
						}
					}
					else if($row['min_amount'] > 0  && $row['max_amount'] > 0)
					{
						if($credit_amount <= $row['max_amount'] && $credit_amount >= $row['min_amount'])
						{
							$workflow_id  =  $row['workflow_id'];
							break;
						}
					}
					

				}

				// select final workflow

				if($workflow_id)
				{

					if($post_data['limit_maximum_amount'] != $check_riskanalyse['limit_maximum_amount'])
					{
						// change status of previous workflow
						$this->db->where('loan_id',$loan_id);
						$this->db->where('loan_type',"escompte");
						$this->db->set('status','0');
						$this->db->update('tbl_all_applications');

						$this->db->where('loan_id',$loan_id);
						$this->db->set('final_status',NULL);
						$this->db->update('tbl_escompte_applicationloan_n');
						

						$previous_workflow = '1';
					}
					else{

						$cond_where =  array('loan_id' => $loan_id,'status' => '1','workflow_id !=' => '0');
						$check_w =   $this->Common_model->getRecord('tbl_all_applications','',$cond_where);

						if(empty($check_w))
						{
							// delete previous data which is inserted when loan is created
							$this->db->where('loan_id',$loan_id);
			                $this->db->where('workflow_id','0');
							$this->db->where('loan_type',"escompte");
							$this->db->delete('tbl_all_applications');

							$previous_workflow =  '2';
						}
						else{
							$previous_workflow =  '0';
						}
					}

					//echo $previous_workflow ; die;

					if($previous_workflow != '0'){
						$finalwork_where =  array('workflow_id' => $workflow_id);
						$workflow =  $this->Common_model->getRecord('tbl_workflow','',$finalwork_where);

						//print_r($workflow); 

						// Insert in All Application Approval table
						$order_arr =  explode(',',$workflow['workflow_order']);
						$role_ids = explode(',',$workflow['role_ids']);

						$sorted_order_arr =  array_diff($order_arr, array('0'));

						sort($sorted_order_arr);
					
						$count =0;
						foreach($sorted_order_arr as $key=>$worder){
							if($worder)
							{
								$w_order =  $worder; 
								

								if($worder == '1'){
									$review = '0';
									$status = 'Process';
								}
								else{
									$review = NULL;
									$status = '';
								}

								//print_r($order_arr);
								$ord_key =  array_search($w_order,$order_arr);

								
								if($role_ids[$ord_key] != "cic")
								{
									
									if($count == 0)
									{
										$w_ord =  $w_order;
									}
									else{
										$w_ord =  $count;

										 $count++;
									}
									

									$record = array(
										'loan_id' => $loan_id,
										'loan_type' => 'escompte',
										'workflow_id' => $workflow['workflow_id'],
										'workflow_order' => $w_ord,
										'assigned_roles' => $role_ids[$ord_key],
										'review' =>$review,
										'approval_status' => $status,
										'comment' => '',
										'comment_date' => ''
									);
									//print_r($record);
									$this->Common_model->insertRow('tbl_all_applications',$record);

									
									
								}
								else{

									$cic_where  =  array('group_id' => $workflow['assigned_cic_grp_id'] );
									$cic_data =  $this->Common_model->getAllRecords('tbl_assignroles',$cic_where);

									//print_r($cic_data); die;

									$count =  $w_order;
									foreach($cic_data as $row_cic)
									{
										$record = array(
													'loan_id' => $loan_id,
													'loan_type' => 'escompte',
													'workflow_id' => $workflow['workflow_id'],
													'workflow_order' => $count,
													'assigned_roles' => $row_cic['role_id'],
													'review' =>NULL,
													'approval_status' => '',
													'comment' => '',
													'comment_date' => ''
											);

										
										$this->Common_model->insertRow('tbl_all_applications',$record);
										$count++;
									}
								}	

							}
						}
					}	

					if($previous_workflow == '1'){

						// Insert in Tracking Details of Loan

						$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' => $post_data['user_id'],
											'product_type' => "escompte",
											'comment' => "Risk Analysis data is updated and Workflow Reinitated",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);


						echo "success_new";	 // new workflow restart
					}
					else if($previous_workflow == '2'){

						// Insert in Tracking Details of Loan

						$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' => $post_data['user_id'],
											'product_type' => "escompte",
											'comment' => "Risk Analysis data is updated and Workflow Initated",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);
						echo "success";	
					}
					else if($previous_workflow == '0')
					{
						// Insert in Tracking Details of Loan

						$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' => $post_data['user_id'],
											'product_type' => "escompte",
											'comment' => "Risk Analysis data is updated",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);
						echo "no_workflow_change";
					}
				 	
				}
				else {
						$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' =>$post_data['user_id'],
											'product_type' => "escompte",
											'comment' => "Risk Analysis data is updated But No Workflow Initated",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);
						echo "no_workflow_matched";
					}
			}
			else{
				echo "error";
			}
		}
	}


	public function delete_invoice_data(){

		$id  =  $this->input->post('id');

		$this->db->where('id',$id);
		if($this->db->delete('tbl_escompte_invoices_n'))
		{
			echo "success";
		}
		else{
			echo "error";
		}

	}
	


	// public function acte_de_domiciliation_desc_recettes(){

	// 	$this->load->view('business_products/escompte/system_docs/acte_de_domiciliation_desc_recettes');
	// }

	// public function cession_de_creance_a_titre_de_garantie(){
	// 	$this->load->view('business_products/escompte/system_docs/cession_de_creance_a_titre_de_garantie');
	// }

	/*------------------- End manage escompte--------------------*/

}