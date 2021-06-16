<?php 
// New Update : 01-05-2020

// Usage : This controller maintains gage espece products functionalities in the application

defined('BASEPATH') OR exit('No direct script access aloowed');

class Gage_Espece extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Gage Espece';	
		$this->data['page'] = 'Gage_Espece';
		
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
                $this->load->helper('timeAgo');
	}

	
	/*------------------- Start manage gage espece--------------------*/
	public function index($param=''){
		//print_r($this->session->all_userdata()); die;
		$this->data['record'] = $this->Common_model->get_admin_details();

		$this->data['loan_details'] =  $this->Gage_Espece_Model->get_loan_details_branchwise();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('business_products/gage_espece/index', $this->data);
	}

	public function select(){

		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Gage Espece';

		$this->data['product'] = "gage_espece";
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

		$this->render_template2('business_products/gage_espece/select_customer2', $this->data);
	}


	/*--------------------------Save Both Customer and Business Loan ---------------------------*/

	public function save_customer_loan()
	{
		 $customer_id = $this->input->post('customer_id');
		 $sub_product = $this->input->post('sub_product');
		 $customer_type  =  $this->input->post('type');

		$res =  $this->Gage_Espece_Model->save_loan_application($customer_id,$sub_product,$customer_type);
	}

	/*--------------------------Save Both Customer and Business Loan ---------------------------*/


	/*-------------start View Both Customer and Business Loan Details-----------*/

	public function customer_details($loan_id){

		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Gage Espece';

		// Loan Details
		$this->data['loan_details'] = $this->Gage_Espece_Model->get_single_loan_details($loan_id);

		$this->data['decision_rec'] =  $this->Gage_Espece_Model->get_approval_decision_details($loan_id,"gage_espece");

		// echo '<pre>';
		// print_r($this->data['decision_rec']); die;
		  
		$this->data['customer'] = json_decode($this->data['loan_details']['customer_data']);
		$this->data['officer'] = json_decode($this->data['loan_details']['officer_data']);
		$this->data['risk_analysis'] =  $this->Gage_Espece_Model->get_risk_analysis_details($loan_id);
		$this->data['risk_analysis_facility'] =  $this->Gage_Espece_Model->get_risk_analysis_facility($loan_id);
		$this->data['tracking_timeline'] =  $this->Gage_Espece_Model->get_tracking_details($loan_id);
		$this->data['history_interaction'] =  $this->Gage_Espece_Model->get_interaction_history($loan_id);
		

		// Master details
		$this->data['product_tabs'] =  $this->Setting_Model->get_saved_product_tab($this->data['loan_details']['product_tab_data']);

		if(isset($this->data['customer']->branch)){

			$this->data['customer_branch'] =  $this->Admin_Model->get_branch_details($this->data['customer']->branch);
		}
		else
		{
			$this->data['customer_branch'] =  $this->Admin_Model->get_branch_details($this->data['customer']->branch_id);
		}

		
		$this->data['documents'] =  $this->Gage_Espece_Model->get_saved_documents($loan_id);
		$this->data['secteurs']=$this->Secteur_Model->get_all_secteurs();
		$this->data['employers'] =  $this->Employer_Model->get_all_employers();
		$this->data['cat_emp']=$this->EmployeeCategory_Model->get_all_categories();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['nationality'] =  $this->Common_model->get_all_nationalities();
		$this->data['branch_record']=$this->PP_Consumer_Loans_Model->get_All_branch();
		if($this->data['loan_details']['customer_type'] == "1")
		{
			$this->render_template2('business_products/gage_espece/customer_details', $this->data);
		}
		else
		{

			$this->render_template2('business_products/gage_espece/business_details', $this->data);
		}
		

	}

	/*--------------------------End View Both Customer and Business Loan Details-----------------*/


	public function manage_risk_analysis($loan_id)
	{
		
		$post_data =  array(
							'cash_voucher' => $this->input->post('cash_voucher'),
							'subscription_date' => date("Y-m-d", strtotime($this->input->post('subscription_date'))),
							'due_date' => date("Y-m-d", strtotime($this->input->post('due_date'))),
							'amount' => $this->input->post('amount'),
							'subscriber' => $this->input->post('subscriber'),
							'depositor' => $this->input->post('depositor'),
							'assignment_account' => $this->input->post('assignment_account'),
							'beneficiary' => $this->input->post('beneficiary'),
							'subscription_location' => $this->input->post('subscription_location'),
							'place_of_payment' => $this->input->post('place_of_payment')

		);
		$check_riskanalyse  =  $this->Gage_Espece_Model->get_risk_analysis_details($loan_id);


		if(empty($check_riskanalyse))
		{
			$post_data['loan_id'] = $loan_id;
			echo ($this->Common_model->insertRow('tbl_gage_espece_risk_analysis',$post_data)) ? "success" : "error";
			
		}
		else
		{
			echo ($this->Common_model->updateRow('tbl_gage_espece_risk_analysis','loan_id',$loan_id,$post_data)) ? "success" : "error"; 
		}

	}


	public function manage_risk_analysis_facility($loan_id)
	{
		$post_data =  array(
							'nature_of_facility' => $this->input->post('nature_of_facility'),
							'object' => $this->input->post('object'),
							'deadline_date' => date("Y-m-d", strtotime($this->input->post('deadline_date'))),
							'granted_amount' => $this->input->post('granted_amount'),
							'tax_interest' => $this->input->post('tax_interest'),
							'transaction_unfolded' => $this->input->post('transaction_unfolded'),
							'how_to_use' => $this->input->post('how_to_use'),
							'implementation_cost' => $this->input->post('implementation_cost'),
							'death_insurance' => $this->input->post('death_insurance'),
							'gaurantee_fund' => $this->input->post('gaurantee_fund')

		);
		$check_riskanalyse  =  $this->Gage_Espece_Model->get_risk_analysis_facility($loan_id);


		if(empty($check_riskanalyse))
		{

			// get loan lies in which workflow 

			$work_where =  array('type' => "gage_espece",'deleted' => "0");
			$select_workflow=  $this->Common_model->getAllRecords('tbl_workflow',$work_where);

			foreach($select_workflow as $row)
			{
				if( ($row['min_amount'] && (int)$row['min_amount'] != 0) && ($row['max_amount'] == "" || $row['max_amount'] == "0"))
				{
					if($post_data['granted_amount'] >= $row['min_amount'])
					{
						$workflow_id  =  $row['workflow_id'];
						break;
					}
				}
				else if((int)$row['min_amount'] == 0 && $row['max_amount'] > 0)
				{
					if($post_data['granted_amount'] <= $row['max_amount'])
					{
						$workflow_id  =  $row['workflow_id'];
						break;
					}
				}
				else if($row['min_amount'] > 0  && $row['max_amount'] > 0)
				{
					if($post_data['granted_amount'] <= $row['max_amount'] && $post_data['granted_amount'] >= $row['min_amount'])
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
				 $this->db->where('loan_type',"gage_espece");
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
								'loan_type' => 'gage_espece',
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
											'loan_type' => 'gage_espece',
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
			
                        // Save Risk analysis form 2
			$post_data['loan_id'] = $loan_id;
			echo ($this->Common_model->insertRow('tbl_gage_espece_risk_analysis_facility',$post_data)) ? "success" : "error";
			
		}
		else
		{
			echo ($this->Common_model->updateRow('tbl_gage_espece_risk_analysis_facility','loan_id',$loan_id,$post_data)) ? "success" : "error"; 
		}
	}

        
        
	public function convention_de_credit(){

		$this->load->view('business_products/gage_espece/system_docs/convention_de_credit_en_compte_courant');
	} 

	public function convention_de_nantissement_de_compte_bancaire(){
		$this->load->view('business_products/gage_espece/system_docs/convention_de_nantissement_de_compte_bancaire');
	}

	public function convention_de_transfert_fiduciaire(){
		$this->load->view('business_products/gage_espece/system_docs/conventin_de_transfert_fiduciaire');
	}

	public function convention_de_cession_des_remunerations(){
		$this->load->view('business_products/gage_espece/system_docs/conventionde_cession_des_remunerations');
	}

	public function convention_de_nantissement_de_bon_de_caisse(){
		$this->load->view('business_products/gage_espece/system_docs/convention_de_nantissement_de_bon_de_caisse');	
	}


	/*------------------- End manage gage espece--------------------*/

}