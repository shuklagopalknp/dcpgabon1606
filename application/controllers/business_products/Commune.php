<?php 
// New Update : 13-09-2020

// Usage : This controller maintains gage espece products functionalities in the application

defined('BASEPATH') OR exit('No direct script access aloowed');

class Commune extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Commune';	
		$this->data['page'] = 'PP Commune';
		
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
    	$this->load->model('Commune_Model');
    	$this->load->helper('timeAgo');
	}

	
	/*------------------- Start manage commune--------------------*/
	public function index($param=''){
		

		$this->data['record'] = $this->Common_model->get_admin_details();

 		$this->data['loan_details'] =  $this->Commune_Model->get_loan_details_branchwise();


		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('business_products/commune/index', $this->data);
	}

	public function select(){

		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Commune';

		$this->data['product'] = "commune";
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

		$this->render_template2('business_products/commune/select_customer', $this->data);
	}


	/*--------------------------Save Both Customer and Business Loan ---------------------------*/

	public function save_customer_loan()
	{
		 $customer_id = $this->input->post('customer_id');
		 $sub_product = $this->input->post('sub_product');
		 $customer_type  =  $this->input->post('type');

		 $res =  $this->Commune_Model->save_loan_application($customer_id,$sub_product,$customer_type);
	}

	/*--------------------------Save Both Customer and Business Loan ---------------------------*/


	/*-------------start View Both Customer and Business Loan Details-----------*/

	public function customer_details($loan_id){

		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Escompte';

		// Loan Details
		$this->data['loan_details'] = $this->Commune_Model->get_single_loan_details($loan_id);
                $branch_where =  array('bid' => $this->data['loan_details']['branch_id']);
		$this->data['branch_rec'] =  $this->Common_model->getRecord('tbl_branch','',$branch_where);
		$this->data['decision_rec'] =  $this->Commune_Model->get_approval_decision_details($loan_id,"commune");

		
		  
		$this->data['customer'] = json_decode($this->data['loan_details']['customer_data']);
		$this->data['officer'] = json_decode($this->data['loan_details']['officer_data']);
		$this->data['risk_analysis'] =  $this->Commune_Model->get_risk_analysis_details($loan_id);
		
		$this->data['tracking_timeline'] =  $this->Commune_Model->get_tracking_details($loan_id);
		$this->data['history_interaction'] =  $this->Commune_Model->get_interaction_history($loan_id);


		// cad details
		$cad_where =  array('loan_id'=>$loan_id);
		$this->data['agcdecisionform'] =  $this->Common_model->getRecord('tbl_business_cad_decision_form_n','',$cad_where);

		// Withdraw details
		$this->data['withdraw_workflow'] =  $this->Commune_Model->withdraw_details($loan_id);
		$this->data['withdraw_decision'] =  $this->Commune_Model->get_workflow_details($loan_id);
		$this->data['withdraw_balance'] =  $this->Commune_Model->total_remaining_withdraw_amt($loan_id);

		//print_r($this->data['decision_rec']); die;
		

		// Master details
		$this->data['product_tabs'] =  $this->Setting_Model->get_saved_product_tab($this->data['loan_details']['product_tab_data']);

		if(isset($this->data['customer']->branch)){

			$this->data['customer_branch'] =  $this->Admin_Model->get_branch_details($this->data['customer']->branch);
		}
		else
		{
			$this->data['customer_branch'] =  $this->Admin_Model->get_branch_details($this->data['customer']->branch_id);
		}

		
		$this->data['documents'] =  $this->Commune_Model->get_saved_documents($loan_id);
		$this->data['secteurs']=$this->Secteur_Model->get_all_secteurs();
		$this->data['employers'] =  $this->Employer_Model->get_all_employers();
		$this->data['cat_emp']=$this->EmployeeCategory_Model->get_all_categories();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['nationality'] =  $this->Common_model->get_all_nationalities();
		$this->data['branch_record']=$this->PP_Consumer_Loans_Model->get_All_branch();
		if($this->data['loan_details']['customer_type'] == "1")
		{
			$this->render_template2('business_products/commune/customer_details', $this->data);
		}
		else
		{

			$this->render_template2('business_products/commune/business_details', $this->data);
		}
		

	}

	/*--------------------------End View Both Customer and Business Loan Details-----------------*/


	public function manage_risk_analysis($loan_id)
	{
		$post_data =  array(
							'credit_amount' =>  $this->input->post('credit_amount'),
							'duration' =>  $this->input->post('duration'),
							'tax' =>  $this->input->post('tax'),
							'start_date' => date("Y-m-d", strtotime($this->input->post('start_date'))),
							'end_date' => date("Y-m-d", strtotime($this->input->post('end_date')))

		);

		$post_data['loan_id'] =  $loan_id;
		$post_data['user_id'] =  $this->session->userdata('id');

	// /	print_r($_POST); die;

		$where =  array('loan_id' => $loan_id);
		$check_riskanalyse =  $this->Common_model->getRecord('tbl_commune_riskcalculation_n','',$where);

		if(empty($check_riskanalyse))
		{
			$post_data['created_at'] =  DATETIME;
		  	if($insert_id  =  $this->Common_model->insertRow('tbl_commune_riskcalculation_n',$post_data))
		  	{

		  		// get loan lies in which workflow 

				$work_where =  array('type' => "commune",'deleted' => "0");
				$select_workflow=  $this->Common_model->getAllRecords('tbl_workflow',$work_where);


				foreach($select_workflow as $row)
				{
					$credit_amount  = $post_data['credit_amount']; 
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
					 $this->db->where('loan_type',"commune");
					 $this->db->delete('tbl_all_applications');

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
									'loan_type' => 'commune',
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
												'loan_type' => 'commune',
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
											'product_type' => "commune",
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
											'product_type' => "commune",
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
			
			if($this->Common_model->updateRow('tbl_commune_riskcalculation_n','id',$check_riskanalyse['id'],$post_data))
			{

				// get loan lies in which workflow 

				$work_where =  array('type' => "commune",'deleted' => "0");
				$select_workflow=  $this->Common_model->getAllRecords('tbl_workflow',$work_where);


				foreach($select_workflow as $row)
				{
					$credit_amount  = $post_data['credit_amount']; 
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

					if($post_data['credit_amount'] != $check_riskanalyse['credit_amount'])
					{
						// change status of previous workflow
						$this->db->where('loan_id',$loan_id);
						$this->db->where('loan_type',"commune");
						$this->db->set('status','0');
						$this->db->update('tbl_all_applications');

						$this->db->where('loan_id',$loan_id);
						$this->db->set('final_status',NULL);
						$this->db->update('tbl_commune_applicationloan_n');
						

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
							$this->db->where('loan_type',"commune");
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
										'loan_type' => 'commune',
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
													'loan_type' => 'commune',
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
											'product_type' => "commune",
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
											'product_type' => "commune",
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
											'product_type' => "commune",
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
											'product_type' => "commune",
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
	

	public function manage_withdraw($loan_id){

		$main_line =  $this->input->post('montant');

		$post_data['withdraw_amount'] = $this->input->post('draw');
		$post_data['user_id'] =  $this->session->userdata('id');
		$post_data['loan_id'] =  $loan_id;
		$post_data['status'] =  'process';

		
		$check_status  =  $this->Commune_Model->current_worflow_status($loan_id);

		if($check_status[0]['status'] != "process")
		{
			if($insert_id = $this->Common_model->insertRow('tbl_commune_withdraw',$post_data))
			{
				$data_arr =  array('2','10','11','9','12');

				foreach($data_arr as $val){
					$insert_data  =  array(
								'withdraw_id' => $insert_id,
								'loan_id' => $loan_id,
								'assigned_roles' =>$val,

					);

					if($val == '2')
					{
						$insert_data['review'] = 0;
						$insert_data['approval_status'] = 'Process' ;
						$insert_data['user_id'] = $this->session->userdata('id');

					}
					else{
						$insert_data['review'] = NULL;
					}

					$this->Common_model->insertRow('tbl_commune_withdrawal_approval',$insert_data);
				}

				$track_data =  array(
									'loan_id' => $loan_id,
									'user_id' =>$post_data['user_id'],
									'product_type' => "commune",
									'comment' => $post_data['withdraw_amount']." is withdrawed and Workflow Initiated",
									'content_type' => "text"
							);

				$this->Common_model->insertRow('business_tracking_timeline',$track_data);

				echo "success"; // All done

			}
			else{
				echo "error"; // Error in saving data
			}
		}
		else{
			echo "not_complete"; // If the current withdrawal is running
		}

		
	}
	// public function acte_de_domiciliation_desc_recettes(){

	// 	$this->load->view('business_products/escompte/system_docs/acte_de_domiciliation_desc_recettes');
	// }

	// public function cession_de_creance_a_titre_de_garantie(){
	// 	$this->load->view('business_products/escompte/system_docs/cession_de_creance_a_titre_de_garantie');
	// }




	/*------------------- End manage commune--------------------*/

}