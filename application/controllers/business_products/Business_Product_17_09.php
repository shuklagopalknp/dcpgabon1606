<?php

// New Update : 13-05-2020
// Usage : It manages all functionalities which are common in all Business Products 

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Business_Product extends Admin_Controller
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
		$this->load->model('Gage_Espece_Model');
		$this->load->model('Escompte_Model');
		$this->load->model('Commune_Model');
			
		date_default_timezone_set('Asia/Kolkata');
	}


	public function manage_loan_fees(){

		$product =  $this->input->post('product');
		$loan_id  =  $this->input->post('application_id');

		$data_arr = array(
							'frais_de_dossier' => $this->input->post('frais_de_doss'),
							'frais_de_assurance' => $this->input->post('frais_de_assurance')
				); 

		if($product  == "gage_espece")
		{
			echo $this->Common_model->updateRow('tbl_gage_espece_applicationloan','loan_id',$loan_id,$data_arr);
		} 
		else if($product == "escompte")
		{
			echo $this->Common_model->updateRow('tbl_escompte_applicationloan_n','loan_id',$loan_id,$data_arr);
		} 
		else if($product == "commune"){
			echo $this->Common_model->updateRow('tbl_commune_applicationloan_n','loan_id',$loan_id,$data_arr);
		}

	}

	/*---------------------------Start Save Business Details --------------------------------------*/

	public function manage_business_loan_data($loan_type,$loan_id){

		// Loan Details
		if($loan_type == "gage_espece"){
			$loan_details = $this->Gage_Espece_Model->get_single_loan_details($loan_id);
		}
		else if($loan_type == "escompte"){
			$loan_details = $this->Escompte_Model->get_single_loan_details($loan_id);
		}
		else if($loan_type == "commune"){
			$loan_details = $this->Commune_Model->get_single_loan_details($loan_id);
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

			
			if($this->input->post('full_main_number'))
			{
				$main_phone  =  $this->input->post('full_main_number');
			}
			else
			{
				$main_phone  =  $this->input->post('main_phone');
			}

			if($this->input->post('full_alternate_number'))
			{
				$alternative_phone  =  $this->input->post('full_alternate_number');
			}
			else
			{
				$alternative_phone  =  $this->input->post('alternative_phone');
			}
			
			sleep(2);

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
				"main_phone"=>$main_phone??'',
				"alternative_phone"=>$alternative_phone??'',
				"expiration_date_id"=>trim($expiration_date)??'',			
				"room_type"=>trim($this->input->post('room_type')) ?? "",
				"father_fullname"=>trim($this->input->post('father_fullname')) ?? "",
				"mother_fullname"=>trim($this->input->post('mother_fullname')) ?? "",
				"nationality" => trim($this->input->post('nationality')) ?? "",
				"insurance_place_id" => trim($this->input->post('insurance_place_id')) ?? "",
				"employer_name"=>trim($this->input->post('employer_name'))??'',
				"secteurs_id"=>$this->input->post('secteurs_id')??'',
				"cat_emp_id"=>$this->input->post('cat_emp_id')??'',
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
				"bank_phone"=>$this->input->post('full_bank_number')??'',
				"opening_date"=>$opening_date,
				"information"=>trim($this->input->post('another_test'))??'',
				"field_1"=>trim($this->input->post('field_1'))??'',
				"field_2"=>trim($this->input->post('field_2'))??'',
				"field_3"=>$this->input->post('field_3')??'',
				"object_credit"=>trim($this->input->post('obj_credit'))??'',
				"created"=>date('Y-m-d H:i:s'),
			);

			$cust_arr =  array(
							'customer_data' => json_encode($tbl_cus_field)
			);
			
			// Save Gage Espece Loan
			if($loan_type == "gage_espece"){
				if($this->Common_model->updateRow('tbl_gage_espece_applicationloan','loan_id',$loan_id,$cust_arr))
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
			else if($loan_type == "escompte")
			{
				if($this->Common_model->updateRow('tbl_escompte_applicationloan_n','loan_id',$loan_id,$cust_arr))
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
			else if($loan_type == "commune")
			{
				if($this->Common_model->updateRow('tbl_commune_applicationloan_n','loan_id',$loan_id,$cust_arr))
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

			if($loan_type == "gage_espece"){
			echo $this->Common_model->updateRow('tbl_gage_espece_applicationloan','loan_id',$loan_id,$cust_arr) ? "success" : "error";
			}
			else if($loan_type == "escompte")
			{
				if($this->Common_model->updateRow('tbl_escompte_applicationloan_n','loan_id',$loan_id,$cust_arr))
				{
					echo "success";
				}
				else
				{
					echo "error";
				}
			}
			if($loan_type == "commune"){
			echo $this->Common_model->updateRow('tbl_commune_applicationloan_n','loan_id',$loan_id,$cust_arr) ? "success" : "error";
			}
		}

	}


	public function upload_systemfiles($param,$param1)
	{

		if($param  ==  "gage_espece")
		{
			$loan_details = $this->Gage_Espece_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
		   	  	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/business_products/gage_espece_loans/individual_system_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/gage_espece_loans/business_system_docs/';
		   		}

			
			}		
		}
		else if($param  ==  "escompte")
		{
			$loan_details = $this->Escompte_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
		   	  	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/business_products/escompte_loans/individual_system_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/escompte_loans/business_system_docs/';
		   		}

			
			}		
		}
		else if($param  ==  "commune")
		{
			$loan_details = $this->Commune_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
		   	  	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/business_products/commune_loans/individual_system_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/commune_loans/business_system_docs/';
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
				$output=array('success' => $filesCount." files successfully upload.");
			}
		   }
		   if(!empty($output['success'])){
	  			$details="Account Manager ".$filesCount." files upload in system documents.";
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
		if($param  ==  "gage_espece")
		{
			$loan_details = $this->Gage_Espece_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
			   if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/business_products/gage_espece_loans/individual_check_list_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/gage_espece_loans/business_check_list_docs/';
		   		}

		  
			
			}		
		}
		else if($param  ==  "escompte"){
			$loan_details = $this->Escompte_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
			   if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/business_products/escompte_loans/individual_check_list_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/escompte_loans/business_check_list_docs/';
		   		}
			}
		}
		else if($param  ==  "commune"){
			$loan_details = $this->Commune_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		   		$output = '';
			   if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/business_products/commune_loans/individual_check_list_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/commune_loans/business_check_list_docs/';
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
				$output=array('success' => $filesCount." files successfully upload.");
			}
		   }
		   if(!empty($output['success'])){
	  			$details="Account Manager ".$filesCount." files upload in check list documents.";
				$history_arr=array(
					"loan_id" =>$param1,
					"user_id" =>$this->session->userdata('id'),
					"product_type"=>$param, // loan type : gage_espece,escompte,commune
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
		if($param  ==  "gage_espece")
		{
			$loan_details = $this->Gage_Espece_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		  	 	$output = '';
		    	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/business_products/gage_espece_loans/individual_risk_analysis_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/gage_espece_loans/business_risk_analysis_docs/';
		   		}
		  
			
			}		
		}
		else if($param  ==  "escompte"){
			$loan_details = $this->Escompte_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		  	 	$output = '';
		    	if($loan_details['customer_type'] == "1" )
		   		{	
		   			$config["upload_path"] = './assets/business_products/escompte_loans/individual_risk_analysis_docs/';
		   		}
		   		else
		   		{
		   			$config["upload_path"] = './assets/business_products/escompte_loans/business_risk_analysis_docs/';
		   		}
		  
			
			}
		}
		else if($param  ==  "commune"){
			$loan_details = $this->Commune_Model->get_single_loan_details($param1);

			$isadmin=$this->session->userdata('id');
			$customer_id  = $loan_details['customer_id'];


			if($_FILES["files"]["name"] != '')
			{
		  	 	$output = '';
		    	if($loan_details['customer_type'] == "1" )
		   		{	
		   		 $config["upload_path"] = './assets/business_products/commune_loans/individual_risk_analysis_docs/';
		   		}
		   		else
		   		{
		   		 $config["upload_path"] = './assets/business_products/commune_loans/business_risk_analysis_docs/';
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
				$output=array('success' => $filesCount." files successfully upload.");
			}
		   }
		   if(!empty($output['success'])){
	  			$details="Account Manager ".$filesCount." files upload in risk analysis documents.";
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

		

		if($param == "gage_espece")
		{
			$loan_details = $this->Gage_Espece_Model->get_single_loan_details($param1);
			$document_data  =  $this->Gage_Espece_Model->get_submitted_documents($param1,$post_file_type);

			$main_folder = "gage_espece_loans";
			
		}
		else if($param == "escompte")
		{
			$loan_details = $this->Escompte_Model->get_single_loan_details($param1);
			$document_data  =  $this->Escompte_Model->get_submitted_documents($param1,$post_file_type);

			$main_folder = "escompte_loans";
		}
		else if($param == "commune")
		{
			$loan_details = $this->Commune_Model->get_single_loan_details($param1);
			$document_data  =  $this->Commune_Model->get_submitted_documents($param1,$post_file_type);

			$main_folder = "commune_loans";
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
		$uploaded_url  =  "assets/business_products/".$main_folder."/".$folder_name."/";

		if(!empty($document_data)){
	 ?>	
          <ul class="list-group">

     <?php $i=1; foreach($document_data as $file1){    ?>
            <li class="list-group-item alert alert-success">
              <?php 
               //'pdf','doc','docx','png','jpg','jpeg'
              if($file1['file_extension']=='.pdf'){
                echo '<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
                echo "<a href='javascript:void(0)' onClick=\"javascript:window.open('".base_url($uploaded_url).$file1['file_name']."','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return\" class='openpdf' >".$i.") ". ucwords($file1['raw_name']) ."</a>";

              }else if($file1['file_extension']=='.docx' || $file1['file_extension']=='.doc'){
                echo '<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
                echo "<a href='".base_url().$uploaded_url.$file1['file_name']."' class='openpdf' target=\"pdf-frame\">".$i.") ". ucwords($file1['raw_name']) ."</a>";
              }
              else if($file1['file_extension']=='.jpeg' || $file1['file_extension']=='.jpg' || $file1['file_extension']=='.png'){
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
		if($param == "gage_espece")
		{
			$loan_details = $this->Gage_Espece_Model->get_single_loan_details($param2);

				if($loan_details['customer_type'] == "1")
				{
					if($param1 == "system_docs")
					{
						$createdzipsystemdocs = 'systemdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Gage_Espece_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/gage_espece_loans/individual_system_docs/'.$file['file_name'];
				           
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
				        $files = $this->Gage_Espece_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/gage_espece_loans/individual_check_list_docs/'.$file['file_name'];
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
				        $files = $this->Gage_Espece_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/gage_espece_loans/individual_risk_analysis_docs/'.$file['file_name'];
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
				        $files = $this->Gage_Espece_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/gage_espece_loans/business_system_docs/'.$file['file_name'];
				           
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
				        $files = $this->Gage_Espece_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/gage_espece_loans/business_check_list_docs/'.$file['file_name'];
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
				        $files = $this->Gage_Espece_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/gage_espece_loans/business_risk_analysis_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}



				}
				
		}

		if($param == "escompte")
		{
			$loan_details = $this->Escompte_Model->get_single_loan_details($param2);

				if($loan_details['customer_type'] == "1")
				{
					if($param1 == "system_docs")
					{
						$createdzipsystemdocs = 'systemdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Escompte_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/escompte_loans/individual_system_docs/'.$file['file_name'];
				           
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
				        $files = $this->Escompte_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/escompte_loans/individual_check_list_docs/'.$file['file_name'];
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
				        $files = $this->Escompte_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/escompte_loans/individual_risk_analysis_docs/'.$file['file_name'];
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
				        $files = $this->Escompte_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/escompte_loans/business_system_docs/'.$file['file_name'];
				           
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
				        $files = $this->Escompte_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/escompte_loans/business_check_list_docs/'.$file['file_name'];
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
				        $files = $this->Escompte_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/escompte_loans/business_risk_analysis_docs/'.$file['file_name'];
				            // add data own data into the folder created
				            $this->zip->add_data($paths,file_get_contents($paths));    
				        }
				        $this->zip->download($createdzipsystemdocs.'.zip');
					}



				}
				
		}
		if($param == "commune")
		{
			$loan_details = $this->Commune_Model->get_single_loan_details($param2);

				if($loan_details['customer_type'] == "1")
				{
					if($param1 == "system_docs")
					{
						$createdzipsystemdocs = 'systemdocs';
				        $this->load->library('zip');
				        $this->load->helper('download');        
				        $files = $this->Commune_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/commune_loans/individual_system_docs/'.$file['file_name'];
				           
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
				        $files = $this->Commune_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/commune_loans/individual_check_list_docs/'.$file['file_name'];
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
				        $files = $this->Commune_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/commune_loans/individual_risk_analysis_docs/'.$file['file_name'];
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
				        $files = $this->Commune_Model->get_submitted_documents($param2,'system_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/commune_loans/business_system_docs/'.$file['file_name'];
				           
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
				        $files = $this->Commune_Model->get_submitted_documents($param2,'checklist_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/commune_loans/business_check_list_docs/'.$file['file_name'];
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
				        $files = $this->Commune_Model->get_submitted_documents($param2,'risk_analysis_docs'); 
				        
				        foreach ($files as $file) {			
				            $paths = base_url().'assets/business_products/commune_loans/business_risk_analysis_docs/'.$file['file_name'];
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

		if($param  ==  "gage_espece") 
		{
			$res =  $this->db->get_where('tbl_gage_espece_documents',array('loan_id' =>  $param1))->row_array();

			if($document_type ==  "checklist")
			{
				$check_status = explode(',',$res['checklist_doc_status']);

				$check_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'checklist_doc_status' => implode(',',$check_status)
				);

				echo ($this->Common_model->updateRow('tbl_gage_espece_documents','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
			else if($document_type ==  "risk_analysis")
			{
				$risk_status = explode(',',$res['risk_analysis_doc_status']);

				$risk_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'risk_analysis_doc_status' => implode(',',$risk_status)
				);

				echo ($this->Common_model->updateRow('tbl_gage_espece_documents','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
		}
		else if($param  ==  "escompte")
		{
			$res =  $this->db->get_where('tbl_escompte_documents_n',array('loan_id' =>  $param1))->row_array();

			if($document_type ==  "checklist")
			{
				$check_status = explode(',',$res['checklist_doc_status']);

				$check_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'checklist_doc_status' => implode(',',$check_status)
				);

				echo ($this->Common_model->updateRow('tbl_escompte_documents_n','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
			else if($document_type ==  "risk_analysis")
			{
				$risk_status = explode(',',$res['risk_analysis_doc_status']);

				$risk_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'risk_analysis_doc_status' => implode(',',$risk_status)
				);

				echo ($this->Common_model->updateRow('tbl_escompte_documents_n','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
		
		}
		else if($param  ==  "commune")
		{
			$res =  $this->db->get_where('tbl_commune_documents_n',array('loan_id' =>  $param1))->row_array();

			if($document_type ==  "checklist")
			{
				$check_status = explode(',',$res['checklist_doc_status']);

				$check_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'checklist_doc_status' => implode(',',$check_status)
				);

				echo ($this->Common_model->updateRow('tbl_commune_documents_n','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
			else if($document_type ==  "risk_analysis")
			{
				$risk_status = explode(',',$res['risk_analysis_doc_status']);

				$risk_status[$document_id - 1] =  $document_status;

				$update_arr =  array(
						'risk_analysis_doc_status' => implode(',',$risk_status)
				);

				echo ($this->Common_model->updateRow('tbl_commune_documents_n','loan_id',$param1,$update_arr)) ? "success" : "error";
			}
		
		}
	}

	public function manage_history_interaction($param,$param1,$param2)
	{
		//print_r($_POST);
		$post_data =  array(
							'loan_id' => $param2,
							'mode' => $param1,
							'admin_id' => $this->session->userdata('id'),
							'content' =>  json_encode($this->input->post()),
							'type'=>$param

		);

		echo ($this->Common_model->insertRow('tbl_business_interaction_history',$post_data)) ? "success" : "error";
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
			if($decision =="Avis Favorable" || $decision =="Avis défavorable" || $decision == "Demande de retraitement")
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
				$flag = 1;
			}


			$role_where  =  array('id' => $role_id);
			$role_details =  $this->Common_model->getRecord('tbl_role','',$role_where);
			
			if( $decision != "Avis défavorable" && $decision != "Demande de retraitement")
			{
				// Next Person of Workflow 
				$this->db->order_by('workflow_order');
				$this->db->limit(1);
				$next_userworkflow =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'review' => NULL,'status' => 1))->row_array();

				// echo $this->db->last_query();
				// print_r($next_userworkflow); die;

				$newstatus  =  array(
									'review' => 0,
									'approval_status' => 'Process'
				);
				
				if($this->Common_model->updateRow('tbl_all_applications','app_id', $next_userworkflow['app_id'], $newstatus))
				{
					$flag1 = 1;
				}


				// Send notification to admin

				$notify_data =  array(
						'loan_id' =>  $loan_id,
						'loan_type' => $type,
						'sender_id' => $user_id,
						'receiver_roleid' => $next_userworkflow['assigned_roles'],
						'message' => 'Decision - '.$role_details['name']." ".trim($this->input->post('decision')).' this loan',
						'type' => "decision",

				);

				$this->Common_model->insertRow('tbl_notifications',$notify_data);
			}
			else if($decision == "Demande de retraitement"){

				$where_cond =  array('loan_id' =>$loan_id,'loan_type' => $type,'status' => '1','workflow_order !=' => '1','review !=' => NULL);

				$details =  $this->Common_model->getAllRecords('tbl_all_applications',$where_cond);
				foreach($details as $d)
				{
					if($d['workflow_order'] != '2')
					{
						$record =  array(
							'review' => NULL,
							'approval_status' => NULL 
						);
					}
					else{
						$record =  array(
							'review' => 0,
							'approval_status' => 'Process' 
						);
					}

					$this->Common_model->updateRow('tbl_all_applications','app_id',$d['app_id'],$record);
					
				}

			}	

			// Insert in Tracking Details

			


			$comnt = 'Decision - '.$role_details['name']." ".trim($this->input->post('decision')).' this loan, '.$this->input->post('commentstatus');

			$track_data =  array(
									'loan_id' => $loan_id,
									'product_type' => $type,
									'user_id' => $user_id,
									'comment' => $comnt,
									'content_type' => 'text'
			);

			$this->Common_model->insertRow('tbl_business_tracking_timeline',$track_data);

			// Send notification to admin

			$notify_data1 =  array(
									'loan_id' =>  $loan_id,
									'loan_type' => $type,
									'sender_id' => $user_id,
									'receiver_id' => '1',
									'message' => 'Decision - '.$role_details['name']." ".trim($this->input->post('decision')).' this loan',
									'type' => "decision",

			);

			$this->Common_model->insertRow('tbl_notifications',$notify_data1);

			
			$output=array('success' =>"Decision successfully updated.");
			

		}

		echo json_encode($output);

	}
	

	public function confirm_disbursement($type){
		sleep(3);
		
		$user_id =  $this->session->userdata('id');	
		$role_id =  $this->session->userdata('role');

		$loan_id=$this->input->post('cl_aid');	
		$status =  array('final_status' => "Disbursement");		

		if($type == "gage_espece")
		{
			$table = 'tbl_gage_espece_applicationloan';
		}
		else if($type == "escompte"){
			$table = 'tbl_escompte_applicationloan_n';
		}
		else if($type == "commune"){
			$table = 'tbl_commune_applicationloan_n';
		}

				
		if($this->Common_model->updateRow($table, 'loan_id',$loan_id, $status))
		{
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

				$decision_userids =  $this->db->get_where('tbl_all_applications',array('loan_id','loan_type' => $type,'app_id !=' => $current_userworkflow['app_id'],'status' => '1'))->result_array();

				$role_where  =  array('id' => $role_id);
				$role_details =  $this->Common_model->getRecord('tbl_role','',$role_where);

				foreach($decision_userids as $row){

					$notify_arr =  array(
						'loan_id' =>  $loan_id,
						'loan_type' => $type,
						'sender_id' => $user_id,
						'receiver_roleid' => $row['assigned_roles'],
						'message' => 'Decision - '.$role_details['name'].' Final Disbursement this loan',
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
										'message' => 'Decision - '.$role_details['name'].' Final Disbursement this loan',
										'type' => "decision",

				);

				$this->Common_model->insertRow('tbl_notifications',$notify_data1);

			}


			echo 'success';
		}
		else{
			echo 'error';
		}
	// $fata2=array(		
	// 		'manager_id'=>32,
	// 		'branch_id'=>4,
	// 		'account_manager_id'=>trim($getcp->admin_id),
	// 		'customar_id'=>trim($getcp->customar_id),		
	// 		'loan_id'=>trim($this->input->post('cl_aid')),
	// 		'decision'=>'Disbursement',
	// 		'commentstatus'=>'Final Disbursement',
	// 		'loantype'=>1,
	// 		"created" =>date('Y-m-d H:i:s'),
	// 		"modified" =>date('Y-m-d H:i:s')			
	// 	);
	// 	$insert=$this->Operating_Director_Loans_Model->insertRow('branmanager_approbation',$fata2);
	// 	$history_arr=array(
	// 		"cl_aid" =>trim($editid),
	// 		"admin_id" =>32,					
	// 		"comment" =>"Director Operating Manager Final Disbursement This Loan",
	// 		'customar_id'=>trim($getcp->customar_id),
	// 		'content_type'=>'text',
	// 		"loan_type"=>1,			
	// 		"created" =>date('Y-m-d H:i:s')
	// 	);
	// 	$res=$this->Operating_Director_Loans_Model->insertRow('tracking_timeline',$history_arr); 


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
			'montant_du_prêt' => $this->input->post('montant_du_prêt')??'',
			'date_de_valeur' => $this->input->post('date_de_valeur')??'',
			'date_lere_échéance' => $this->input->post('date_lere_échéance')??'',
			'date_dernière_échéance' => $this->input->post('date_dernière_échéance')??'',
			'durée_du_prêt' => $this->input->post('durée_du_prêt')??'',
			'Nombre_déchéances' => $this->input->post('nombre_déchéances')??'',	
			'date_accord_CIC' => $this->input->post('date_accord_CIC')??'',			
			'type_de_différé' => $this->input->post('type_de_différé')??'',
			'périodocoté_de_remboursement' => $this->input->post('périodocoté_de_remboursement')??'',
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
}

