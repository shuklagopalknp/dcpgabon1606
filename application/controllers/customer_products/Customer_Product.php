<?php

// New Update : 13-05-2020
// Usage : It manages all functionalities which are common in all Business Products 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Customer_Product extends Admin_Controller
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();

		$this->load->database();

		$this->load->model('Common_model');	

		
		$this->load->model('Credit_Conso_Model');
		$this->load->model('Credit_Confort_Model');
		$this->load->model('Credit_Scolair_Model');

		$this->load->model('Email_Sms_Template_Model');
	}


	public function manage_loan_fees(){

		$product =  $this->input->post('product');
		$loan_id  =  $this->input->post('application_id');

		$data_arr = array(
							//'frais_de_dossier' => $this->input->post('frais_de_doss'),
							'frais_de_assurance' => $this->input->post('frais_de_assurance'),
							//'frais_denregistrement' => $this->input->post('frais_de_enregistrement')
				); 

		if($product == "credit_conso")
		{
			echo $this->Common_model->updateRow('tbl_credit_conso_applicationloan','loan_id',$loan_id,$data_arr);
		} 
		else if($product == "credit_scolair")
		{
			echo $this->Common_model->updateRow('tbl_credit_scolair_applicationloan','loan_id',$loan_id,$data_arr);
		} 
		else if($product == "credit_confort")
		{
			echo $this->Common_model->updateRow('tbl_credit_confort_applicationloan','loan_id',$loan_id,$data_arr);
		} 

	}

	/*---------------------------Start Save Business Details --------------------------------------*/

	public function manage_business_loan_data($loan_type,$loan_id){

		// Loan Details
		if($loan_type == "credit_conso"){
			$loan_details = $this->Credit_Conso_Model->get_single_loan_details($loan_id);
		}
		else if($loan_type == "credit_scolair"){
			$loan_details = $this->Credit_Scolair_Model->get_single_loan_details($loan_id);
		}
		else if($loan_type == "credit_confort"){
			$loan_details = $this->Credit_Confort_Model->get_single_loan_details($loan_id);
		}
		
		$isadmin=$this->session->userdata('id');
		$customer_id  = $loan_details['customer_id'];


		if($loan_details['customer_type'] == "1"){
			$dob=date("Y-m-d", strtotime($this->input->post('dob')));		
			$employment_date=date("Y-m-d", strtotime($this->input->post('employment_date')));

			if($this->input->post('sate_end_contract_cdd'))
			$edn_date_contract_cdd=date("Y-m-d", strtotime($this->input->post('sate_end_contract_cdd')));
			else 
			$edn_date_contract_cdd =NULL;

			$opening_date=date("Y-m-d", strtotime($this->input->post('opening_date')));
			$expiration_date=date("Y-m-d", strtotime($this->input->post('expiration_date')));
			$current_emp =  date("Y-m-d", strtotime($this->input->post('current_emp')));
			
			if($this->input->post('dateId'))
			{
				$dateId =  date("Y-m-d", strtotime($this->input->post('dateId')));
			}
			else{
				$dateId =  NULL;
			}

			
			// if($this->input->post('full_main_number'))
			// {
			// 	$main_phone  =  $this->input->post('full_main_number');
			// }
			// else
			// {
			// 	$main_phone  =  $this->input->post('main_phone');
			// }

			// if($this->input->post('full_alternate_number'))
			// {
			// 	$alternative_phone  =  $this->input->post('full_alternate_number');
			// }
			// else
			// {
			// 	$alternative_phone  =  $this->input->post('alter_phone');
			// }
			
			if($this->input->post('cat_employeurs') != ""){

		                	if(strtoupper($this->input->post('cat_employeurs')) == strtoupper("Public"))
		                	{
		                		$cat_emp_id =  9;
		                	}else if(strtoupper($this->input->post('cat_employeurs')) == strtoupper("Prive")){
		                		$cat_emp_id =  8;
		                	}else{
		                	    $cat_emp_id =  'Autres';
		                	}
		                    
		                }

			$tbl_cus_field =  array(
				"is_admin"=>$isadmin,
				"customer_id" => $customer_id,
				"branch_id" => trim($this->input->post('branch_id')),
				"first_name"=>$this->input->post('first_name')??'',
				"middle_name"=>$this->input->post('middle_name')??'',
				"last_name"=>$this->input->post('last_name')??'',
				"gender"=>$this->input->post('gender')??'',
				"dob"=>trim($dob),
				"education"=>$this->input->post('education')??'',
				"marital_status"=>$this->input->post('marital_status')??'',
				"email"=>trim($this->input->post('email'))??'',
				"type_id"=>trim($this->input->post('typeofid'))??'',
				"monthly_income"=>floatval($this->input->post('monthly_income'))??'',
				"monthly_expenses"=>floatval($this->input->post('monthly_expenses'))??'',
				"id_number"=>$this->input->post('id_number')??'',
				"state_of_issue"=>trim($this->input->post('state_of_issue'))??'',
				"occupation"=>$this->input->post('occupation')??'',
				"main_phone"=>$this->input->post('main_phone')??'',
				"alternative_phone"=> $this->input->post('alter_phone')??'',
				"expiration_date_id"=>trim($expiration_date)??'',			
				"room_type"=>trim($this->input->post('room_type')) ?? "",
				"father_fullname"=>trim($this->input->post('father_fullname')) ?? "",
				"mother_fullname"=>trim($this->input->post('mother_fullname')) ?? "",
				"nationality" => trim($this->input->post('nationality')) ?? "",
				"insurance_place_id" => trim($this->input->post('insurance_place_id')) ?? "",
				"employer_name"=>trim($this->input->post('employer_name'))??'',
				"secteurs_id"=>$this->input->post('secteurs_id')??'',
				"cat_emp_id"=>$cat_emp_id,
				"cat_employeurs"=>$this->input->post('cat_employeurs')??'',
				"contract_type_id"=>$this->input->post('typeofcontract')??'',
				"employment_date"=>trim($employment_date)??'',
				"sate_end_contract_cdd"=>trim($edn_date_contract_cdd)??'',
				"years_professionel_experience"=>trim($this->input->post('years_professionel_experience'))??'',
				"how_he_is_been_with_current_employer"=>trim($current_emp)??'',
				"emp_net_salary"=>trim(floatval($this->input->post('emp_net_salary')))??'',
				"retirement_age_expected"=>trim($this->input->post('retirement_age_expected'))??'',
				"city_id"=>trim($this->input->post('city'))??'',
				"state_id"=>$this->input->post('state')??'',
				"street"=>$this->input->post('street')??'',
				"resides_address"=>trim($this->input->post('resides_address'))??'',
				"account_type"=>trim($this->input->post('account_type'))??'',
				"account_no"=>trim($this->input->post('account_number'))??'',
				"bank_name"=>trim($this->input->post('bank_name'))??'',
				"bank_phone"=>$this->input->post('bank_phone')??'',
				"opening_date"=>$opening_date,
				"information"=>trim($this->input->post('another_test'))??'',
				"field_1"=>trim($this->input->post('field_1'))??'',
				"field_2"=>trim($this->input->post('field_2'))??'',
				"field_3"=>$this->input->post('field_3')??'',
				"object_credit"=>trim($this->input->post('obj_credit'))??'',
				"created"=>date('Y-m-d H:i:s'),


				"title"=>trim($this->input->post('title'))??'',
				"segmentation"=>trim($this->input->post('segmentation'))??'',
				"legalCapacity"=>trim($this->input->post('legalCapacity'))??'',
				"father_firstname"=>trim($this->input->post('father_firstname'))??'',
				"mother_firstname"=>trim($this->input->post('mother_firstname'))??'',

				"employeeStatus"=>trim($this->input->post('employeeStatus'))??'',

				"emp_name"=>trim($this->input->post('emp_name'))??'',
				"secteurs1"=>trim($this->input->post('secteurs1'))??'',
				"address_employer"=>trim($this->input->post('address_employer'))??'',
				"employeeOccupation"=>trim($this->input->post('employeeOccupation'))??'',
				"employeePosition"=>trim($this->input->post('employeePosition'))??'',

				"title"=>trim($this->input->post('title'))??'',
			"legalCapacity"=>trim($this->input->post('legalCapacity'))??'',

			"employeeStatus"=>trim($this->input->post('employeeStatus'))??'',
			"address_employer"=>trim($this->input->post('address_employer'))??'',
			"employeeOccupation"=>trim($this->input->post('employeeOccupation'))??'',
			"employeePosition"=>trim($this->input->post('employeePosition'))??'',

			"carte_bancaire"=>trim($this->input->post('carte_bancaire'))??'',
			"ibu"=>trim($this->input->post('ibu'))??'',
			"code_agence"=>trim($this->input->post('code_agence'))??'',
			"nature_relation"=>trim($this->input->post('nature_relation'))??'',
			"cat_client"=>trim($this->input->post('cat_client'))??'',
			"segmentation"=>trim($this->input->post('segmentation'))??'',
			"risk_level"=>$this->input->post('risk_level')??'',
			"risk_level_date"=>trim($this->input->post('risk_level_date')) ?? '',
			"special_observation"=>trim($this->input->post('special_observation'))??'',
			
			"dossierkyc"=>trim($this->input->post('dossierkyc'))??'',
			"prochaineRevision"=>trim($this->input->post('prochaineRevision'))??'',
			"authCode"=>trim($this->input->post('authCode'))??'',
			"authDate"=>trim($this->input->post('authDate'))??'',
			
			"alternateAddress"=>trim($this->input->post('alternateAddress'))??'',
			"nomGestionnaire"=>trim($this->input->post('nomGestionnaire'))??'',
			"codeGestionnaire"=>trim($this->input->post('codeGestionnaire'))??'',
			"etatAutorisation"=>trim($this->input->post('etatAutorisation'))??'',
			
			"main_phone2"=>trim($this->input->post('main_phone2'))??'',
			"alter_phone2"=>trim($this->input->post('alter_phone2'))??'',
			"Surveillance"=>trim($this->input->post('Surveillance'))??'',
			"Deces"=>trim($this->input->post('Deces'))??'',
			"Contexntieux"=>trim($this->input->post('Contexntieux'))??'',
			"Interdit"=>trim($this->input->post('Interdit'))??'',
			"pep"=>trim($this->input->post('pep'))??'',
			"niveiu"=>trim($this->input->post('niveiu'))??'',
			"datedernier"=>trim($this->input->post('datedernier'))??'',
			"typeDeClientele"=>trim($this->input->post('typeDeClientele'))??'',
			"ancianemployer"=>trim($this->input->post('ancianemployer'))??'',
			"numero1"=>trim($this->input->post('numero1'))??'',
			"numero2"=>trim($this->input->post('numero2'))??'',
			"categ"=>trim($this->input->post('categ'))??'',
			
			"birthplace"=>trim($this->input->post('birthplace'))??'',
			"code_bqe"=>trim($this->input->post('code_bqe'))??'',
			"devise"=>trim($this->input->post('devise'))??'',
			"rib1"=>trim($this->input->post('rib1'))??'',
			"rib2"=>trim($this->input->post('rib2'))??'',
			"rib3"=>trim($this->input->post('rib3'))??'',
			"rib4"=>trim($this->input->post('rib4'))??'',
			"rib5"=>trim($this->input->post('rib5'))??'',
			"dateId"=>$dateId,	
				
				
			);

			$cust_arr =  array(
							'customer_data' => json_encode($tbl_cus_field)
			);
			
			// Save Loan
			if($loan_type == "credit_conso")
			{
				if($this->Common_model->updateRow('tbl_credit_conso_applicationloan','loan_id',$loan_id,$cust_arr))
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
			else if($loan_type == "credit_scolair")
			{
				if($this->Common_model->updateRow('tbl_credit_scolair_applicationloan','loan_id',$loan_id,$cust_arr))
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
			else if($loan_type == "credit_confort")
			{
				if($this->Common_model->updateRow('tbl_credit_confort_applicationloan','loan_id',$loan_id,$cust_arr))
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
		
		}
		else
		{
			$opening_date=date("Y-m-d", strtotime($this->input->post('account_open_date')));
			$tbl_cus_field1 =  array(
				"is_admin"=>$isadmin,
				"customer_id" =>  $customer_id,
				"account_no"=>$this->input->post('account_no')??'',
				"branch"=>$this->input->post('branch')??'1',
				"company_name"=>$this->input->post('company_name')??'',
				"type_of_legal"=>$this->input->post('type_of_legal')??'',
				"address"=>trim($this->input->post('address')),
				"principal"=>$this->input->post('principal')??'',
				"capital"=>$this->input->post('capital')??'',
				"employer_tax_id"=>trim($this->input->post('employer_tax_id'))??'',
				"sector_id"=>trim($this->input->post('sector_of_activity'))??'',
				"account_open_date"=>$opening_date??'',
				"creditline_amount"=>$this->input->post('creditline_amount')??'',
				"balance_amount"=>$this->input->post('balance_amount')??'',
				"amount_type"=>trim($this->input->post('amount_type'))??'',
				"unpaid_amount"=>$this->input->post('unpaid_amount')??'',
				"number_of_unpaid"=>$this->input->post('number_of_unpaid')??'',
				"created_at"=>date('Y-m-d H:i:s'),
			);

			// echo '<pre>';
			// print_r($tbl_cus_field1);die;

			$full_name =  $this->input->post('full_name');
			$position =  $this->input->post('position');
			$officer_address =  $this->input->post('officer_address');
			$age =  $this->input->post('age');
			$anciennete =  $this->input->post('anciennete');
			$officer_id  =  $this->input->post('edit_officer_id');


			$officer_arr1 =  array();
			foreach($full_name as $key=>$frow)
			{
				if($frow)
				{	
					$officer_arr =  array(
											'officer_id' =>  trim($officer_id[$key]),
											'business_customer_id' => $customer_id,
											'full_name' => trim($frow),
											'position' => trim($position[$key]),
											'address'=> trim($officer_address[$key]),
											'age' => trim($age[$key]),
											'anciennete' => trim($anciennete[$key])
										);
				
					$officer_arr1[$key] =  $officer_arr;
					
				}
			}

			$cust_arr = array(
				'customer_data' => json_encode($tbl_cus_field1),
				'officer_data' =>  json_encode($officer_arr1)

		);

			if($loan_type == "credit_conso")
			{
				if($this->Common_model->updateRow('tbl_credit_conso_applicationloan','loan_id',$loan_id,$cust_arr))
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
			else if($loan_type == "credit_scolair")
			{
				if($this->Common_model->updateRow('tbl_credit_scolair_applicationloan','loan_id',$loan_id,$cust_arr))
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
			else if($loan_type == "credit_confort")
			{
				if($this->Common_model->updateRow('tbl_credit_confort_applicationloan','loan_id',$loan_id,$cust_arr))
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
		}

	}


	public function upload_systemfiles($param,$param1)
	{

		if($param  ==  "credit_conso")
		{
			$loan_details = $this->Credit_Conso_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
		   	  	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/customer_product/credit_conso_loans/individual_system_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/customer_product/credit_conso_loans/business_system_docs/';
		   		}

			
			}		
		}
		else if($param  ==  "credit_scolair")
		{
			$loan_details = $this->Credit_Scolair_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
		   	  	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/customer_product/credit_scolair_loans/individual_system_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/customer_product/credit_scolair_loans/business_system_docs/';
		   		}

			
			}		
		}
		else if($param  ==  "credit_confort")
		{
			$loan_details = $this->Credit_Confort_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
		   	  	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/customer_product/credit_confort_loans/individual_system_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/customer_product/credit_confort_loans/business_system_docs/';
		   		}

			
			}		
		}


		if($_FILES["files"]["name"] != '')
		{
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
		        	'file_name'=>$filename['file_name'],
		        	'loan_id' =>  $param1,
					'raw_name'=>$_FILES["files"]['name'][$count],
					// 'file_path'=>$filename['file_path'],
					// 'full_path'=>$filename['full_path'],						
					'file_type'=>$filename['file_type'],
					'file_size'=>$filename['file_size'],
					'file_extension'=>$filename['file_ext'],
					'document_type' => "system_docs",
		        	'product_type'=>$param,
		    	);
				$rsid=$this->Common_model->insertRow('tbl_business_documents',$data);
				$output=array('success' => $filesCount." Fichier t??l??charg?? avec succ??s.");
			}
		   }
		   if(!empty($output['success'])){
	  			$details="Account Manager ".$filesCount." Fichier t??l??charg?? avec succ??s";
				$history_arr=array(
					"loan_id" =>$param1,
					"user_id" =>$this->session->userdata('id'),
					"product_type"=> $param,
					"comment" =>$details,
					"content_type"=>"file"
				);
				$this->Common_model->insertRow('tbl_business_tracking_timeline',$history_arr);
			}
		   echo json_encode($output);
		}
	}


	public function upload_checklistfiles($param,$param1)
	{
			if($param  ==  "credit_conso")
		{
			$loan_details = $this->Credit_Conso_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
		   	  	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/customer_product/credit_conso_loans/individual_check_list_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/customer_product/credit_conso_loans/business_check_list_docs/';
		   		}

			
			}		
		}
		else if($param  ==  "credit_scolair")
		{
			$loan_details = $this->Credit_Scolair_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
		   	  	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/customer_product/credit_scolair_loans/individual_check_list_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/customer_product/credit_scolair_loans/business_check_list_docs/';
		   		}

			
			}		
		}
		else if($param  ==  "credit_confort")
		{
			$loan_details = $this->Credit_Confort_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
		   	  	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/customer_product/credit_confort_loans/individual_check_list_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/customer_product/credit_confort_loans/business_check_list_docs/';
		   		}

			
			}		
		}

		if($_FILES["files"]["name"] != '')
		{
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
		        	'file_name'=>$filename['file_name'],
					'raw_name'=>$_FILES["files"]['name'][$count],
					// 'file_path'=>$filename['file_path'],
					// 'full_path'=>$filename['full_path'],	
					'loan_id' => $param1,					
					'file_type'=>$filename['file_type'],
					'document_type' => "checklist_docs",
					'file_size'=>$filename['file_size'],
					'file_extension'=>$filename['file_ext'],
		        	'product_type'=>$param,
		    	);
				$rsid=$this->Common_model->insertRow('tbl_business_documents',$data);
				$output=array('success' => $filesCount."Les fichiers ont ??t?? t??l??charg??s avec succ??s.");
			}
		   }
		   if(!empty($output['success'])){
	  			$details="Account Manager ".$filesCount."Les fichiers ont ??t?? t??l??charg??s avec succ??s.";
				$history_arr=array(
					"loan_id" =>$param1,
					"user_id" =>$this->session->userdata('id'),
					"product_type"=>$param, // loan type : credit_conso,etc
					"comment" =>$details,
					"content_type"=>"file"
				);
				$this->Common_model->insertRow('tbl_business_tracking_timeline',$history_arr);
			}
		   echo json_encode($output);
		}
	}

public function uploadfile_risk_analysis($param,$param1)
	{
	if($param  ==  "credit_conso")
		{
			$loan_details = $this->Credit_Conso_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		  	 	$output = '';
		    	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/customer_product/credit_conso_loans/individual_risk_analysis_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/customer_product/credit_conso_loans/business_risk_analysis_docs/';
		   		}
		  
			
			}		
		}
		else if($param  ==  "credit_scolair"){
			$loan_details = $this->Credit_Scolair_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		  	 	$output = '';
		    	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/customer_product/credit_scolair_loans/individual_risk_analysis_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/credit_scolair_loans/business_risk_analysis_docs/';
		   		}
		  
			
			}
		}
		else if($param  ==  "credit_confort"){
			$loan_details = $this->Credit_Confort_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		  	 	$output = '';
		    	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/customer_product/credit_confort_loans/individual_risk_analysis_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/credit_confort_loans/business_risk_analysis_docs/';
		   		}
		  
			
			}
		}

		if($_FILES["files"]["name"] != '')
		{
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
		        	'file_name'=>$filename['file_name'],
		        	'loan_id' => $param1,
					'raw_name'=>$_FILES["files"]['name'][$count],
					// 'file_path'=>$filename['file_path'],
					// 'full_path'=>$filename['full_path'],						
					'file_type'=>$filename['file_type'],
					'document_type' => "risk_analysis_docs",
					'file_size'=>$filename['file_size'],
					'file_extension'=>$filename['file_ext'],
		        	'product_type'=>$param,
		    	);
				$rsid=$this->Common_model->insertRow('tbl_business_documents',$data);
				$output=array('success' => $filesCount." Les fichiers ont ??t?? t??l??charg??s avec succ??s .");
			}
		   }
		   if(!empty($output['success'])){
	  			$details="Account Manager ".$filesCount." Les fichiers ont ??t?? t??l??charg??s avec succ??s";
				$history_arr=array(
					"loan_id" =>$param1,
					"user_id" =>$this->session->userdata('id'),
					"product_type"=>$param,
					"comment" =>$details,
					"content_type"=>"file"
				);
				$this->Common_model->insertRow('tbl_business_tracking_timeline',$history_arr);
			}
		   echo json_encode($output);
		}
	}

	public function view_uploaded_documents($param,$param1){
	
		$post_file_type = $this->input->post('file_type'); 

		

		if($param == "credit_conso")
		{
			$loan_details = $this->Credit_Conso_Model->get_single_loan_details($param1);
			$document_data  =  $this->Credit_Conso_Model->get_submitted_documents($param1,$post_file_type);

			$main_folder = "credit_conso_loans";
			
		}
		else if($param == "credit_scolair")
		{
			$loan_details = $this->Credit_Scolair_Model->get_single_loan_details($param1);
			$document_data  =  $this->Credit_Scolair_Model->get_submitted_documents($param1,$post_file_type);

			$main_folder = "credit_scolair_loans";
		}
		else if($param == "credit_confort")
		{
			$loan_details = $this->Credit_Confort_Model->get_single_loan_details($param1);
			$document_data  =  $this->Credit_Confort_Model->get_submitted_documents($param1,$post_file_type);

			$main_folder = "credit_confort_loans";
		}

		if($loan_details['customer_type'] == "1")
			{
				if($post_file_type == "system_docs")
				{
					$folder_name =  "individual_system_docs";
				}
				else if($post_file_type == "checklist_docs")
				{
					$folder_name =  "individual_check_list_docs";
				}
				else if($post_file_type == "risk_analysis_docs")
				{
					$folder_name =  "individual_risk_analysis_docs";
				}
			}
			else
			{
				if($post_file_type == "system_docs")
				{
					$folder_name =  "business_system_docs";
				}
				else if($post_file_type == "checklist_docs")
				{
					$folder_name =  "business_check_list_docs";
				}
				else if($post_file_type == "risk_analysis_docs")
				{
					$folder_name =  "business_risk_analysis_docs";
				}
			}
		$uploaded_url  =  "assets/customer_product/".$main_folder."/".$folder_name."/";

		if(!empty($document_data)){
	 ?>	
          <ul class="list-group">

     <?php $i=1; foreach($document_data as $file1){    ?>
            <li class="list-group-item alert alert-success">
              <?php 
               //'pdf','doc','docx','png','jpg','jpeg'
              if($file1['file_extension']=='.pdf'){
                echo '<span class="badge"><a href="javascript:void(0);"  onclick="delete_file('.$file1['id'].')"><i class="fa fa-trash fa-fw fa-lg"></i></a></span>';
                echo '<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
                echo "<a href='javascript:void(0)' onClick=\"javascript:window.open('".base_url($uploaded_url).$file1['file_name']."','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return\" class='openpdf' >".$i.") ". ucwords($file1['raw_name']) ."</a>";

              }else if($file1['file_extension']=='.docx' || $file1['file_extension']=='.doc'){
                echo '<span class="badge"><a href="javascript:void(0);"  onclick="delete_file('.$file1['id'].')"><i class="fa fa-trash fa-fw fa-lg"></i></a></span>';
                echo '<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
                echo "<a href='".base_url().$uploaded_url.$file1['file_name']."' class='openpdf' target=\"pdf-frame\">".$i.") ". ucwords($file1['raw_name']) ."</a>";
              }
              else if($file1['file_extension']=='.jpeg' || $file1['file_extension']=='.jpg' || $file1['file_extension']=='.png'){
                echo '<span class="badge"><a href="javascript:void(0);"  onclick="delete_file('.$file1['id'].')"><i class="fa fa-trash fa-fw fa-lg"></i></a></span>';
                echo '<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
                echo "<a href='javascript:void(0)' onClick=\"javascript:window.open('".base_url($uploaded_url).$file1['file_name']."','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return\" class='openpdf' >".$i.") ". ucwords($file1['raw_name']) ."</a>";
              }else{
               echo $i.")". ucwords($file1['raw_name']) ;
              }
              ?>
         
            </li>
            <?php $i++; } ?>
          </ul>
          <?php }
          else{
            echo "No Record found";
          }
         
	}

	public function download_documents($param,$param1,$param2){
		if($param == "credit_conso")
		{
			$loan_details = $this->Credit_Conso_Model->get_single_loan_details($param2);

				if($loan_details['customer_type'] == "1")
				{
					if($param1 == "system_docs")
					{
						$createdzipsystemdocs = 'systemdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Conso_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_conso_loans/individual_system_docs/'.$file['file_name'];
				           
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }

				        $this->zip->download($createdzipsystemdocs.'.zip');
					}

					elseif($param1 == "checklist_docs")
					{
						$createdzipsystemdocs = 'checklistdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Conso_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_conso_loans/individual_check_list_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}

					elseif($param1 == "risk_analysis_docs")
					{
						$createdzipsystemdocs = 'riskanalysisdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Conso_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_conso_loans/individual_risk_analysis_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}
				}
				else
				{
					if($param1 == "system_docs")
					{
						$createdzipsystemdocs = 'systemdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->get_submitted_documents->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_conso_loans/business_system_docs/'.$file['file_name'];
				           
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }

				        $this->zip->download($createdzipsystemdocs.'.zip');
					}
					if($param1 == "checklist_docs")
					{
						$createdzipsystemdocs = 'checklistdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Conso_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_conso_loans/business_check_list_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}

					if($param1 == "risk_analysis_docs")
					{
						$createdzipsystemdocs = 'riskanalysisdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Conso_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_conso_loans/business_risk_analysis_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}



				}
				
		}
		else if($param == "credit_scolair")
		{
			$loan_details = $this->Credit_Scolair_Model->get_single_loan_details($param2);

				if($loan_details['customer_type'] == "1")
				{
					if($param1 == "system_docs")
					{
						$createdzipsystemdocs = 'systemdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Scolair_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_scolair_loans/individual_system_docs/'.$file['file_name'];
				           
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }

				        $this->zip->download($createdzipsystemdocs.'.zip');
					}

					elseif($param1 == "checklist_docs")
					{
						$createdzipsystemdocs = 'checklistdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Scolair_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_scolair_loans/individual_check_list_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}

					elseif($param1 == "risk_analysis_docs")
					{
						$createdzipsystemdocs = 'riskanalysisdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Scolair_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_scolair_loans/individual_risk_analysis_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}
				}
				else
				{
					if($param1 == "system_docs")
					{
						$createdzipsystemdocs = 'systemdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Scolair_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_scolair_loans/business_system_docs/'.$file['file_name'];
				           
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }

				        $this->zip->download($createdzipsystemdocs.'.zip');
					}
					if($param1 == "checklist_docs")
					{
						$createdzipsystemdocs = 'checklistdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Scolair_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_scolair_loans/business_check_list_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}

					if($param1 == "risk_analysis_docs")
					{
						$createdzipsystemdocs = 'riskanalysisdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Scolair_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_scolair_loans/business_risk_analysis_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}



				}
				
		}
		else if($param == "credit_confort")
		{
			$loan_details = $this->Credit_Confort_Model->get_single_loan_details($param2);

				if($loan_details['customer_type'] == "1")
				{
					if($param1 == "system_docs")
					{
						$createdzipsystemdocs = 'systemdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Confort_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_confort_loans/individual_system_docs/'.$file['file_name'];
				           
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }

				        $this->zip->download($createdzipsystemdocs.'.zip');
					}

					elseif($param1 == "checklist_docs")
					{
						$createdzipsystemdocs = 'checklistdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Confort_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_confort_loans/individual_check_list_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}

					elseif($param1 == "risk_analysis_docs")
					{
						$createdzipsystemdocs = 'riskanalysisdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Confort_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_confort_loans/individual_risk_analysis_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}
				}
				else
				{
					if($param1 == "system_docs")
					{
						$createdzipsystemdocs = 'systemdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Confort_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_confort_loans/business_system_docs/'.$file['file_name'];
				           
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }

				        $this->zip->download($createdzipsystemdocs.'.zip');
					}
					if($param1 == "checklist_docs")
					{
						$createdzipsystemdocs = 'checklistdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Confort_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_confort_loans/business_check_list_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}

					if($param1 == "risk_analysis_docs")
					{
						$createdzipsystemdocs = 'riskanalysisdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Credit_Confort_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/customer_product/credit_confort_loans/business_risk_analysis_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}



				}
				
		}
	}

	public function change_document_status($param,$param1)
	{
		//print_r($_POST);
		$document_id =  $this->input->post('document');
		$document_status  =  $this->input->post('status');
		$document_type  =  $this->input->post('type');

		if($param  ==  "credit_conso") 
		{
			$res =  $this->db->get_where('tbl_credit_conso_documents',array('loan_id' =>  $param1))->row_array();

			if($document_type ==  "checklist")
			{
				$check_status = explode(',',$res['checklist_doc_status']);

				$check_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'checklist_doc_status' => implode(',',$check_status)
				);

				echo ($this->Common_model->updateRow('tbl_credit_conso_documents','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
			else if($document_type ==  "risk_analysis")
			{
				$risk_status = explode(',',$res['risk_analysis_doc_status']);

				$risk_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'risk_analysis_doc_status' => implode(',',$risk_status)
				);

				echo ($this->Common_model->updateRow('tbl_credit_conso_documents','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
		}
		else if($param  ==  "credit_scolair")
		{
			$res =  $this->db->get_where('tbl_credit_scolair_documents',array('loan_id' =>  $param1))->row_array();

			if($document_type ==  "checklist")
			{
				$check_status = explode(',',$res['checklist_doc_status']);

				$check_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'checklist_doc_status' => implode(',',$check_status)
				);

				echo ($this->Common_model->updateRow('tbl_credit_scolair_documents','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
			else if($document_type ==  "risk_analysis")
			{
				$risk_status = explode(',',$res['risk_analysis_doc_status']);

				$risk_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'risk_analysis_doc_status' => implode(',',$risk_status)
				);

				echo ($this->Common_model->updateRow('tbl_credit_scolair_documents','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
		
		}
		else if($param  ==  "credit_confort") 
		{
			$res =  $this->db->get_where('tbl_credit_confort_documents',array('loan_id' =>  $param1))->row_array();

			if($document_type ==  "checklist")
			{
				$check_status = explode(',',$res['checklist_doc_status']);

				$check_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'checklist_doc_status' => implode(',',$check_status)
				);

				echo ($this->Common_model->updateRow('tbl_credit_confort_documents','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
			else if($document_type ==  "risk_analysis")
			{
				$risk_status = explode(',',$res['risk_analysis_doc_status']);

				$risk_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'risk_analysis_doc_status' => implode(',',$risk_status)
				);

				echo ($this->Common_model->updateRow('tbl_credit_confort_documents','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
		}
	}

	// public function manage_history_interaction($param,$param1,$param2)
	// {
	// 	//print_r($_POST);
	// 	$post_data =  array(
	// 						'loan_id' => $param2,
	// 						'mode' => $param1,
	// 						'admin_id' => $this->session->userdata('id'),
	// 						'content' =>  json_encode($this->input->post()),
	// 						'type'=>$param

	// 	);

	// 	echo ($this->Common_model->insertRow('tbl_business_interaction_history',$post_data)) ? "success" : "error";
	// }

	public function manage_history_interaction_customer($param,$param1,$param2)
	{
		//print_r($_POST);
		$post_data =  array(
							'loan_id' => $param2,
							'mode' => $param1,
							'admin_id' => $this->session->userdata('id'),
							'content' =>  json_encode($this->input->post()),
							'type'=>$param

		);

		//echo ($this->Common_model->insertRow('tbl_customer_interaction_history',$post_data)) ? "success" : "error";

		if($this->Common_model->insertRow('tbl_customer_interaction_history',$post_data))
		{
			if($param1 == "sms")
			{
				$sms_phone = $this->input->post('sms_phone_no');
				$sms_content = $this->input->post('sms_content');

				$this->Common_model->send_sms_to_users($sms_phone,$sms_content);
			}
			if($param1 == "email")
			{
				$field_name =  $this->input->post('field_name');
				$fieldemail =  $this->input->post('fieldemail');
				$fieldsubject =  $this->input->post('fieldsubject');
				$fieldmsg =  "Hello ".$field_name.', '.$this->input->post('fieldmsg');

				$this->Common_model->send_mail_to_users($fieldemail,$fieldsubject,$fieldmsg);
			}

			echo "success";
		}
		else{
			echo "error";
		}
	}

	public function comment_manager($type,$loan_id){

		//print_r($_POST);

		$decision =  $this->input->post('decision');
		$commentstatus =  $this->input->post('commentstatus');
		$role_id =  $this->session->userdata('role');
		$user_id =  $this->session->userdata('id');
		
		$output = '';
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		$this->form_validation->set_rules('decision','Please Select From Below', 'required');
		$this->form_validation->set_rules('commentstatus','Comment', 'required');	
		
		if ($this->form_validation->run() == FALSE)
		{
			$output=array('error'=> validation_errors());	
		}
		else
		{
			if($decision =="Avis Favorable" || $decision =="Avis d??favorable" || $decision == "Demande de retraitement" || $decision == "Annuler" || $decision == "Abandonner")
			{
				$decision_data =  array(
									'loan_id' => $loan_id,
									'user_id' => $user_id,
									'review' => 1,
									'approval_status' => $decision,
									'comment' => $commentstatus,
									'comment_date' => DATETIME 
				);
			}
			else if($decision == "Confirm Disbursement")
			{
				$decision_data =  array(
									'loan_id' => $loan_id,
									'user_id' => $user_id,
									'review' => 1,
									'approval_status' => $decision,
									'comment' => "Disbursement |".$commentstatus,
									'comment_date' => DATETIME 
				);
			}
            
			// Current Person of Workflow 
			$current_userworkflow =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'assigned_roles' => $role_id,'status' => 1))->row_array();

			if($this->Common_model->updateRow('tbl_all_applications','app_id', $current_userworkflow['app_id'], $decision_data)){
                            
                            $comment_data =  array(
                                                        'loan_id' => $loan_id,
                                                        'loan_type' =>$type,
                                                        'user_id' => $user_id,
                                                        'user_type' => $current_userworkflow['user_type'],
                                                        'decision' => $decision,
                                                        'comment' => $decision_data['comment'],
                                                        'comment_date' => DATETIME 
                                                    );
                            $this->Common_model->insertRow('tbl_decision_comment',$comment_data);
                            $flag = 1;
			}


			$role_where  =  array('id' => $role_id);
			$role_details =  $this->Common_model->getRecord('tbl_role','',$role_where);
			
			if($type == "credit_conso")
    		{
    			$table = 'tbl_credit_conso_applicationloan';
    		}
    		else if($type == "credit_scolair"){
    			$table = 'tbl_credit_scolair_applicationloan';
    		}
    		else if($type == "credit_confort")
    		{
    			$table = 'tbl_credit_confort_applicationloan';
    		}
    		
    		$loan_data = $this->db->get_where($table,array('loan_id' => $loan_id ))->row_array();
    		$loancustomer_details = json_decode($loan_data['customer_data']);
    		
    		$prev_csr_role_status = "";
			
			if(  $decision != "Demande de retraitement" && $decision != "Annuler" && $decision !="Abandonner")
			{
			    
				// Next Person of Workflow 
				$this->db->order_by('workflow_order');
				$this->db->limit(1);
				$next_userworkflow =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'review' => NULL,'status' => 1))->row_array();

				
				// Avis defavourable set annuler before CSR
                if($next_userworkflow['assigned_roles'] == "12" && $decision =="Avis d??favorable")
				{
				    
			        $cancel_status = "Annul??";
			        
			    
			 	$cancel_data =  array('status' => '0','cancel_date' => DATETIME,'cancelled_by' => $user_id,'final_status' =>$cancel_status );		
    
        		if($type == "credit_conso")
        		{
        			$table = 'tbl_credit_conso_applicationloan';
        		}
        		else if($type == "credit_scolair"){
        			$table = 'tbl_credit_scolair_applicationloan';
        		}
        		else if($type == "credit_confort")
        		{
        			$table = 'tbl_credit_confort_applicationloan';
        		}

		
		        $this->Common_model->updateRow($table,'loan_id', $loan_id, $cancel_data);
		        
		  //      echo $this->db->last_query();
				// // print_r($next_userworkflow);
				// die;
				
				$prev_csr_role_status = '1';
				    
				}
				
				// Avis defavourable set annuler before CSR close
				if($next_userworkflow['user_type'] == "cic" && $current_userworkflow['user_type'] != "cic")
				{
					$cic_users =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'review' => NULL,'status' => 1,'user_type' =>'cic','app_id !=' => $current_userworkflow['app_id']))->result_array();

					//echo $this->db->last_query();
					//print_r($cic_users);

					foreach($cic_users as $cu){

						$cicstatus  =  array(
									'review' => '0',
									'approval_status' => 'Process'
						);

						$this->Common_model->updateRow('tbl_all_applications','app_id', $cu['app_id'], $cicstatus);
					}
				}
				else if($current_userworkflow['user_type'] == "cic")
				{
					$cic_users =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'review' => '1','status' => 1,'user_type' =>'cic'))->result_array();

					$w_where =  array('workflow_id' => $current_userworkflow['workflow_id'] );
					$workflow_data = $this->Common_model->getRecord('tbl_workflow','',$w_where);

					// print_r($cic_users);

					// print_r($workflow_data);


					if(count($cic_users) == $workflow_data['min_cic_approvals'])
					{
                        // Next Person of Workflow who is not in CIC  bcz  min approvals are done in cic
                        $this->db->order_by('workflow_order');
                        $this->db->limit(1);
                        $next_noncic =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'review' => NULL,'status' => 1,'user_type' => NULL))->row_array();
                        // echo $this->db->last_query();

                        // print_r($next_noncic);

                        // die;

                        $noncic_status  =  array(
                                                'review' => '0',
                                                'approval_status' => 'Process'
                        );

                        if($this->Common_model->updateRow('tbl_all_applications','app_id', $next_noncic['app_id'], $noncic_status))
                        {
                                $flag1 = 1;
                        }
	
					}
					else
					{
						// $newstatus  =  array(
						// 			'review' => '0',
						// 			'approval_status' => 'Process'
						// );
						
						// if($this->Common_model->updateRow('tbl_all_applications','app_id', $next_userworkflow['app_id'], $newstatus))
						// {
						// 	$flag1 = 1;
						// }
					}
				}
				else{
					$newstatus  =  array(
									'review' => '0',
									'approval_status' => 'Process'
					);
					
					if($this->Common_model->updateRow('tbl_all_applications','app_id', $next_userworkflow['app_id'], $newstatus))
					{
						$flag1 = 1;
					}
				}

				// Send notification to user roles

				$userdatas =  $this->Common_model->get_user_details($user_id);


				if($role_id == "2")
				{
					$n_where = array('branch_id' => $userdatas['branch_id'],'deleted' => "0",'is_admin' => $next_userworkflow['assigned_roles']);
				}
				else{
					$n_where = array('deleted' => "0",'is_admin' => $next_userworkflow['assigned_roles']);
				}
				
				$next_userdata  =  $this->Common_model->getAllRecords('tbl_user',$n_where);


				//print_r($next_userdata);

				foreach($next_userdata as $urow)
				{
					$notification_data =  array(

                                                    'sender_id' => $user_id,
                                                    'loan_id' => $loan_id,
                                                    'loan_type' => $type,
                                                    'receiver_id'  => $urow['id'],
                                                    'receiver_roleid' => $urow['is_admin'],
                                                    'message' =>"Decision -".trim($this->input->post('decision'))." ",
                                                    'seen_status' => "unseen",
                                                    'type' => "decision"
                                                );


					//print_r($notification_data);

					$this->Common_model->insertRow('tbl_notifications',$notification_data);

					
					// Send Mail To customer
                   // $this->Email_Sms_Template_Model->send_mail_template4($notification_data,$loancustomer_details,$loan_data,$type);
					
				}
            }
			else if($decision == "Demande de retraitement"){

				$where_cond =  array('loan_id' =>$loan_id,'loan_type' => $type,'status' => '1','review !=' => NULL);

				$details =  $this->Common_model->getAllRecords('tbl_all_applications',$where_cond);



				foreach($details as $d) 
				{
                    if($d['workflow_order'] == '1')
                    {

                        $record =  array(
                                    'review' => 0,
                                    'approval_status' => 'Demande de retraitement' 
                                );

                    }
                    else{
                        $record =  array(
                                    'review' => NULL,
                                    'approval_status' => NULL 
                                );
                    }

                    $this->Common_model->updateRow('tbl_all_applications','app_id',$d['app_id'],$record);

                     $notification_data =  array(

                                                 'sender_id' => $user_id,
                                                 'loan_id' => $loan_id,
                                                 'loan_type' => $type,
                                                 'receiver_id'  => $d['user_id'],
                                                 'message' => trim($this->input->post('decision'))." on Application No. ".$loan_data['application_no'],
                                                 'seen_status' => "unseen",
                                                 'type' => "decision"
                                             );


					// //print_r($notification_data);

					$this->Common_model->insertRow('tbl_notifications',$notification_data);

                    // Send mail to users
					// $this->Email_Sms_Template_Model->send_mail_template4($notification_data,$loancustomer_details,$loan_data,$type);
					
					
				}

			}
			else if($decision == "Annuler" || $decision == "Abandonner"){
			    
			    if($decision == "Annuler"){
			        $cancel_status = "Annul??";
			    }
			    else if($decision == "Abandonner"){
			        $cancel_status = "Abandonner";
			    }
			    
			 	$cancel_data =  array('status' => '0','cancel_date' => DATETIME,'cancelled_by' => $user_id,'final_status' =>$cancel_status );		
    
        		if($type == "credit_conso")
        		{
        			$table = 'tbl_credit_conso_applicationloan';
        		}
        		else if($type == "credit_scolair"){
        			$table = 'tbl_credit_scolair_applicationloan';
        		}
        		else if($type == "credit_confort")
        		{
        			$table = 'tbl_credit_confort_applicationloan';
        		}

		
		        $this->Common_model->updateRow($table,'loan_id', $loan_id, $cancel_data);
		        
		        
			}

			// Insert in Tracking Details

			


			$comnt = 'Decision - '.$role_details['name']." ".trim($this->input->post('decision')).' pour ce pr??t, '.$this->input->post('commentstatus');

			$track_data =  array(
									'loan_id' => $loan_id,
									'product_type' => $type,
									'user_id' => $user_id,
									'user_type' => $current_userworkflow['user_type'],
									'comment' => $comnt,
									'content_type' => 'text'
			);
			
			if($decision =="Avis Favorable" || $decision =="Avis d??favorable"){
	    	    $track_data['type'] = "decision";
	    	}
	    	else if($decision =="Annuler"){
	    	    $track_data['type'] = "Annul??";
	    	}
	    	else{
	    	    $track_data['type'] = $decision;
	    	}

			$this->Common_model->insertRow('tbl_business_tracking_timeline',$track_data);

			// Send notification to admin

			$notify_data1 =  array(
									'loan_id' =>  $loan_id,
									'loan_type' => $type,
									'sender_id' => $user_id,
									'receiver_id' => '1',
									'message' => 'Decision - '.$role_details['name']." ".trim($this->input->post('decision')).' ',
									'type' => "decision",

			);

			$this->Common_model->insertRow('tbl_notifications',$notify_data1);

		if(($type=='credit_scolair') && ($role_id=='9')){
			// echo "credit conso";
			// die;
			$status =  array('final_status' => "pending_branch");	
			$this->Common_model->updateRow('tbl_credit_scolair_applicationloan', 'loan_id',$loan_id, $status);
			
		}

			if($prev_csr_role_status == ""){
			    $output=array('success' =>"Decision successfully updated.");
			}
			else{
			    $output=array('success' =>"cancel");
			}
			

		}

		echo json_encode($output);

	}
	




	public function manage_cad_memorandum($type,$loan_id){

		$record_id =  $this->Common_model->get_admin_details();

		$post_data = array(
			'user_id'=>$this->session->userdata('id'),
			'loan_id' =>$loan_id,
			'loan_type' => $type,
			'branch_id' => $record_id[0]->branch_id,
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
			'montant_du_pr??t' => $this->input->post('montant_du_pr??t')??'',
			'date_de_valeur' => $this->input->post('date_de_valeur')??'',
			'date_lere_??ch??ance' => $this->input->post('date_lere_??ch??ance')??'',
			'date_derni??re_??ch??ance' => $this->input->post('date_derni??re_??ch??ance')??'',
			'dur??e_du_pr??t' => $this->input->post('dur??e_du_pr??t')??'',
			'Nombre_d??ch??ances' => $this->input->post('nombre_d??ch??ances')??'',	
			'date_accord_CIC' => $this->input->post('date_accord_CIC')??'',			
			'type_de_diff??r??' => $this->input->post('type_de_diff??r??')??'',
			'p??riodocot??_de_remboursement' => $this->input->post('p??riodocot??_de_remboursement')??'',
			'frais_de_dossier' => $this->input->post('frais_de_dossier')??'',
			'Compte_courant' => $this->input->post('compte_courant')??'',
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

		//print_r($post_data);

		$cad_where =  array('loan_id' => $loan_id,'loan_type' => $type);
		$check_cadmemo = $this->Common_model->getRecord('tbl_business_cad_decision_form_n','',$cad_where); 

		if(empty($check_cadmemo))
		{
			if($this->Common_model->insertRow('tbl_business_cad_decision_form_n',$post_data)){
					echo "success";
			}
			else {
				echo "error";
			}
		}
		else {
			if($this->Common_model->updateRow('tbl_business_cad_decision_form_n','id',$check_cadmemo['id'],$post_data)){
				echo "success";
			}
			else {
				echo "error";
			}
			
		}
	} 

	// public function confirm_disbursement($type)
	// {
	// 	echo $type;
	// }
	public function confirm_disbursement($type){
		sleep(3);


		$user_id =  $this->session->userdata('id');	
		$role_id =  $this->session->userdata('role');

		$loan_id=$this->input->post('cl_aid');	

	
		$status =  array('final_status' => "Disbursement",'final_disburse_date' => DATE,'disbursed_by' => $user_id);		

		if($type == "credit_conso")
		{
			$table = 'tbl_credit_conso_applicationloan';
		}
		else if($type == "credit_scolair"){
			$table = 'tbl_credit_scolair_applicationloan';
		}
		else if($type == "credit_confort")
		{
			$table = 'tbl_credit_confort_applicationloan';
		}

		if($this->Common_model->updateRow($table,'loan_id',$loan_id, $status))
		{
			//echo $this->db->last_query();
			$decision_data =  array(
									'loan_id' => $loan_id,
									'user_id' => $user_id,
									'review' => 1,
									'approval_status' => "Disbursement",
									'comment' => "Disbursement",
									'comment_date' => DATETIME 
				);

			// Current Person of Workflow 
			$current_userworkflow =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'assigned_roles' => $role_id,'status' => '1'))->row_array();

			if($this->Common_model->updateRow('tbl_all_applications','app_id', $current_userworkflow['app_id'], $decision_data)){
				$flag = 1;
				
				$comment_data =  array(
                                        'loan_id' => $loan_id,
                                        'loan_type' =>$type,
                                        'user_id' => $user_id,
                                        'decision' => "Disbursement",
                                        'comment' => $decision_data['comment'],
                                        'comment_date' => DATETIME 
                                    );
                $this->Common_model->insertRow('tbl_decision_comment',$comment_data);

				$decision_userids =  $this->db->get_where('tbl_all_applications',array('loan_id'=>$loan_id,'loan_type' => $type,'app_id !=' => $current_userworkflow['app_id'],'status' => '1'))->result_array();

				//print_r($decision_userids);

			 //	Loan Details
				$l_where =  array('loan_id'=>$loan_id,'deleted' => '0');
				
				$loan_data =  $this->Common_model->getRecord($table,'',$l_where);
				$l_whereData =  array('applicationform_id'=>$loan_data['loan_id_temp'],'deleted' => '0');
				$databinding =  $this->Common_model->getRecord('consumer_amortization','',$l_whereData);
				$customer_data =  json_decode($loan_data['customer_data']);

				foreach($decision_userids as $row){

					$notify_arr =  array(
						'loan_id' =>  $loan_id,
						'loan_type' => $type,
						'sender_id' => $user_id,
						'receiver_id' => $row['user_id'],
						'receiver_roleid' => $row['assigned_roles'],
						'message' => 'Final Disbursement on Application No. '.$loan_data['application_no'],
						'type' => "decision",
					);

					$this->Common_model->insertRow('tbl_notifications',$notify_arr);
				}


				// Send notification to admin

				$notify_data1 =  array(
										'loan_id' =>  $loan_id,
										'loan_type' => $type,
										'sender_id' => $user_id,
										'receiver_id' => '1',
										'message' => 'Decision - '.$role_details['name'].' D??caissement du Pr??t avec Succ??s',
										'type' => "decision",

				);

				$this->Common_model->insertRow('tbl_notifications',$notify_data1);

				// Tracking details

				$comnt = 'Decision - '.$role_details['name']." ".'D??caissement du Pr??t avec Succ??s';

				$track_data =  array(
										'loan_id' => $loan_id,
										'product_type' => $type,
										'user_id' => $user_id,
										'comment' => $comnt,
										'content_type' => 'text'
				);

				$this->Common_model->insertRow('tbl_business_tracking_timeline',$track_data);


				$loan_other_data = $this->db->get_where('tbl_temp_consumer_applicationform',array('aid' => $loan_data['loan_id_temp']))->row_array();
				// Create file 

				$content = "Num??ro Pr??t Digital Cr??dit;R??f??rence de l'Emprunteur;Cat??gorie de Pr??ts;Nominal du Pr??t;Dur??e;Date d'Accord;Date de R??alisation;Date Premi??re ??ch??ance;Date Naissance Emprunteur;Num??ro Compte Emprunteur;Num??ro Compte Destinataire;Taux Int??r??t Fixe;P??riodicit?? des Amortissements;Bar??me de l'Assurance;Code D??cisionnaire;Montant Garanti;R??f??rence de la Garantie;Type de Garantie"."\r\n";

				if($type == "credit_conso")
				{
					$file_type = "FETES A LA CARTE";
					$type1 = "CARTEFETE";
				}
				else if($type == "credit_confort")
				{
					$file_type = "CREDIT CONFORT";
					$type1 = "CRCONFSG";
				}else{
				    $file_type = "CONGES A LA CARTE";
					$type1 = "CONGCARTE";
				}

				$reference_numero = substr($customer_data->account_no, 0, 11);

				$age= date_diff(date_create($customer_data->dob), date_create('today'))->y;

				if($age < 30) 
	                $bareme = "38";
	            else if($age >=30 && $age <=40)
	                $bareme = "39";
	            else if($age >=41 && $age <=50)
	                $bareme = "40";
	            else if($age >=51 && $age <=60)
	                $bareme = "41";
	            else
	                $bareme = "00";
                // echo "<pre>";
                
                $databindingJson=json_decode($databinding['databinding']);
                // print_r($databindingJson);
                if(($customer_data->cat_emp_id=='9') || ($customer_data->cat_emp_id=='10')){
                                            $loandate='25';
                                        }else if($customer_data->cat_emp_id=='8'){
                                            $loandate='29';
                                        }else{
                                            $loandate='20';
                                        }
                                        $loanDate=$databindingJson[0]->years.$databindingJson[0]->month.$loandate;
                // echo "</pre>";
	            // $this->db->order_by('workflow_order','desc');
	            // $d_accord_data =  $this->db->get_where('tbl_all_applications',array('loan_id'=>$loan_id,'review'=>'1','loan_type'=>$type,'assigned_roles !='=>'12'))->row_array();

	            $loan_term = ($loan_other_data['loan_term'] <=9)?'0'.$loan_other_data['loan_term']:$loan_other_data['loan_term'];

				$array = array($loan_data['application_no'],$reference_numero,$type1,$loan_other_data['loan_amt'],$loan_term,date("Ymd", strtotime($loan_data['final_disburse_date'])),date("Ymd", strtotime($loan_data['created_at'])),$loanDate,date("Ymd", strtotime($customer_data->dob)),$customer_data->account_no,$customer_data->account_no,$loan_other_data['loan_interest'],'M',$bareme,'0011','','','','');
				
							$content .= implode(';',$array);
				$contentexist= implode(';',$array);
				// print_r($contentexist);
				// die;

				
				$tdate=date('d-m-Y');
				$file_name =  "Application Date. ".$tdate." (".$file_type.").txt";
				
				// echo FCPATH. "/upload_data/".$tdate;
				// die;
				if (!file_exists(FCPATH . "/upload_data/".$tdate)) {
                     mkdir(FCPATH . "/upload_data/".$tdate, 0777, true);
                    }
                  if (!file_exists(FCPATH  . "/upload_data/".$tdate."/".$file_name)) {
                     $fp = fopen(FCPATH  . "/upload_data/".$tdate."/".$file_name ,"w") or die('Cannot open file');
			    		fwrite($fp,$content."\n");
						fclose($fp);
                    }else{
                        $contents = file_get_contents(FCPATH  . "/upload_data/".$tdate."/".$file_name);
                        $pattern = preg_quote($loan_data['application_no'], '/');
                        $pattern = "/^.*$pattern.*\$/m";
                        
                        if(preg_match_all($pattern, $contents, $matches)){
                            
                            }
                        else{
                                $fp = fopen(FCPATH  . "/upload_data/".$tdate."/".$file_name ,"a") or die('Cannot open file');
			    		        fwrite($fp,$contentexist."\n");
						        fclose($fp);
                            }
                    	
                    }

				// Send mail to customer
				//  $this->Email_Sms_Template_Model->send_mail_template3($customer_data,$loan_data['customer_type'],$loan_data['application_no'],$type);
				 // Send sms to customer
			//	  $this->Email_Sms_Template_Model->send_sms_template3($customer_data,$loan_data['customer_type'],$loan_data['application_no'],$type);


			}



			echo 'success';
		}
		else{
			echo 'error';
		}
	


	}


	public function archive_loan($type,$loan_id){

		if($type ==  "credit_confort")
		{
			$table = "tbl_credit_confort_applicationloan";
			$redirect_dir  =  "PP_CREDIT_CONFORT";
		}
		else if($type ==  "credit_conso")
		{
			$table = "tbl_credit_conso_applicationloan";
			$redirect_dir  =  "PP_FETES_A_LA_CARTE";
		}else{
		    $table = "tbl_credit_scolair_applicationloan";
			$redirect_dir  =  "PP_CONGES_A_LA_CARTE";
		}
		// else if($type ==  "escompte")
		// {
		// 	$table =  "tbl_escompte_applicationloan_n";
		// 	$redirect_dir  =  "Escompte";
		// }

		$where = array('deleted' => '1');
		if($this->Common_model->updateRow($table,'loan_id',$loan_id,$where))
		{
			redirect($redirect_dir);
		}

	} 
	
	public function delete_document(){
		$customer_id  =  $this->input->post('id');
		$arr = array('id' => $customer_id);
		echo $this->Common_model->delete_data('tbl_business_documents',$arr);
	}

}

