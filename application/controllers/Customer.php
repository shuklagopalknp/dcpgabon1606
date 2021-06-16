<?php defined('BASEPATH') OR exit('No direct script access aloowed');  

class Customer extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'Gabon | CUSTOMER';	
		$this->data['page'] = 'Customer';	
		$this->load->library('session');
		$this->load->helper('lang_translate');	
		$this->load->helper('timeAgo');
    	$this->load->model('Common_model');
    	$this->load->model('Admin_Model');
    	$this->load->model('PP_Consumer_Loans_Model');
    	$this->load->model('Customer_Model');
    	$this->load->model('Employer_Model');
    	$this->load->model('Secteur_Model');
    	$this->load->model('EmployeeCategory_Model');
    	$this->load->model('Email_Sms_Template_Model');

	}

	public function index(){
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$this->data['user_id']=$user_id;
		$this->data['employers'] =  $this->Employer_Model->get_all_employers();

		$this->data['secteurs']=$this->Secteur_Model->get_all_secteurs();
		$this->data['cat_emp']=$this->EmployeeCategory_Model->get_all_categories();

		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['branch_record']=$this->PP_Consumer_Loans_Model->get_All_branch();
		$this->data['nationality'] =  $this->Common_model->get_all_nationalities();
		// $is_admin = ($user_id != 1) ? true :false;

		// Show Individual Form 
		$this->data['addForm'] =  $this->load->view('customer/individual_customerForm',$this->data,true);
		$searchUser  =  ($this->input->post('searchUser')) ? ($this->input->post('searchUser')): ($date2);
		$this->data['bankdetails']=$this->Customer_Model->get_all_customers($searchUser);
	
		if($user_id != 1)
		{ 
			$this->render_template2('customer/view_customer',$this->data);
		}
		else
		{
			$this->render_template('customer/view_admin_customer',$this->data);
		}
	}
	
	public function save_customer()
	{
	
		$isadmin=$this->session->userdata('id');
		
		$dob=($this->input->post('dob')) ? (date("Y-m-d", strtotime($this->input->post('dob')))) : "";
		$expiration_date=($this->input->post('expiration_date')) ? (date("Y-m-d", strtotime($this->input->post('expiration_date')))) : "";
		$employment_date=($this->input->post('employment_date')) ? (date("Y-m-d", strtotime($this->input->post('employment_date')))) : "";
		$edn_date_contract_cdd=($this->input->post('edn_date_contract_cdd')) ? (date("Y-m-d", strtotime($this->input->post('edn_date_contract_cdd')))) : "";
		$current_emp =  ($this->input->post('opening_date')) ? (date("Y-m-d", strtotime($this->input->post('opening_date')))) : "";
		$opening_date=($this->input->post('opening_date')) ? (date("Y-m-d", strtotime($this->input->post('opening_date')))) : "";
		$prochaineRevision=($this->input->post('prochaineRevision')) ? (date("Y-m-d", strtotime($this->input->post('prochaineRevision')))) : "";
		$risk_level=($this->input->post('risk_level_date')) ? (date("Y-m-d", strtotime($this->input->post('risk_level_date')))) : "";
		$authDate=($this->input->post('authDate')) ? (date("Y-m-d", strtotime($this->input->post('authDate')))) : "";
		$datedernier=($this->input->post('datedernier')) ? (date("Y-m-d", strtotime($this->input->post('datedernier')))) : "";
		$dateId=($this->input->post('dateId')) ? (date("Y-m-d", strtotime($this->input->post('dateId')))) : "";
		
		
		if($this->input->post('cat_employeurs') != ""){

		                	if(strtoupper($this->input->post('cat_employeurs')) == strtoupper("Public"))
		                	{
		                		$cat_emp_id =  9;
		                	}else if(strtoupper($this->input->post('cat_employeurs')) == strtoupper("public civil")){
		                		$cat_emp_id =  10;
		                	}else if(strtoupper($this->input->post('cat_employeurs')) == strtoupper("Public de Corps")){
		                		$cat_emp_id =  9;
		                	}else if(strtoupper($this->input->post('cat_employeurs')) == strtoupper("Prive")){
		                		$cat_emp_id =  8;
		                	}else{
		                	    $cat_emp_id =  4;
		                	}
		                    
		                }
		 $check_branchId  =  $this->db->get_where('tbl_branch',array('code_agence' => $this->input->post('code_agence')))->row_array();

		                	if(!empty($check_branchId)){
		                		$branch_id = $check_branchId['bid']; 
		                	}
		                	else{
		                		$branch_id =  "";
		                		
		                	}
		
		
		
		

		$customer_id  =  $this->input->post('edit_id');
		
		sleep(2);

		$tbl_cus_field =  array(
			"is_admin"=>$isadmin,
			"first_name"=>$this->input->post('first_name')??'',
			"middle_name"=>$this->input->post('middle_name')??'',
			"last_name"=>$this->input->post('last_name')??'',
			"gender"=>$this->input->post('gender')??'',
			"dob"=>$dob,
			"education"=>$this->input->post('education')??'',
			"marital_status"=>$this->input->post('marital_status')??'',
			"email"=>trim($this->input->post('email'))??'',
			"type_id"=>trim($this->input->post('typeofid'))??'',
			"monthly_income"=>$this->input->post('monthly_income')??'',
			"monthly_expenses"=>$this->input->post('monthly_expenses')??'',
			"id_number"=>$this->input->post('id_number')??'',
			"state_of_issue"=>trim($this->input->post('state_of_issue'))??'',
			"occupation"=>$this->input->post('occupation')??'',
			"main_phone"=>$this->input->post('main_phone')??'',
			"mainphone_countrycode" => $this->input->post('mainphone_countrycode')??'', 
			"alternative_phone"=>trim($this->input->post('alter_phone'))??'',
			"alternativeph_countrycode"=> $this->input->post('alternativeph_countrycode')??'',
			"expiration_date_id"=>trim($expiration_date)??'',			
			"room_type"=>trim($this->input->post('room_type')) ?? "",
			"father_firstname"=>trim($this->input->post('father_firstname')) ?? "",
			"father_fullname"=>trim($this->input->post('father_fullname')) ?? "",
			"mother_firstname"=>trim($this->input->post('mother_firstname')) ?? "",
			"mother_fullname"=>trim($this->input->post('mother_fullname')) ?? "",
			"employer_name"=>trim($this->input->post('emp_name'))??'',
			"secteurs_id"=>$this->input->post('secteurs_id')??'',
			"cat_employeurs"=>$this->input->post('cat_employeurs')??'',
			"cat_emp_id"=>$cat_emp_id??'',
			"contract_type_id"=>$this->input->post('typeofcontract')??'',
			"employment_date"=>trim($employment_date)??'',
			"nationality" =>  trim($this->input->post('nationality')),
			"insurance_place_id" => trim($this->input->post('insurance_place_id')),
			"sate_end_contract_cdd"=>trim($edn_date_contract_cdd)??'',
			"years_professionel_experience"=>trim($this->input->post('years_professionel_experience'))??'',
			"how_he_is_been_with_current_employer"=>trim($current_emp)??'',
			"emp_net_salary"=>trim($this->input->post('net_salary'))??'',
			"retirement_age_expected"=>trim($this->input->post('retirement_age_expected'))??'',
			"city_id"=>trim($this->input->post('city'))??'',
			"state_id"=>$this->input->post('state')??'',
			"street"=>$this->input->post('street')??'',
			"resides_address"=>trim($this->input->post('resides_address'))??'',
			"account_type"=>trim($this->input->post('account_type'))??'',
			"account_no"=>trim($this->input->post('accoumt_number'))??'',
			"bank_name"=>trim($this->input->post('bank_name'))??'',
			"branch_id" =>$branch_id,
			"bank_phone"=>$this->input->post('bank_phone')??'',
			"bankphone_countrycode" => $this->input->post('bankphone_countrycode')??'',
			"opening_date"=>$opening_date,
			"information"=>trim($this->input->post('another_test'))??'',
			"field_1"=>trim($this->input->post('test_field'))??'',
			"field_2"=>trim($this->input->post('test_david'))??'',
			"field_3"=>$this->input->post('cc_test')??'',
			"object_credit"=>trim($this->input->post('obj_credit'))??'',
			"frais_de_dossier"=>trim($this->input->post('frais_de_dossier'))??'',
			"created"=>date('Y-m-d H:i:s'),

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
			"risk_level_date"=>$risk_level,
			"special_observation"=>trim($this->input->post('special_observation'))??'',
			
			"dossierkyc"=>trim($this->input->post('dossierkyc'))??'',
			"prochaineRevision"=>$prochaineRevision,
			"authCode"=>trim($this->input->post('authCode'))??'',
			"authDate"=>$authDate,
			
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
			"datedernier"=>$datedernier,
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
	//		"dateId"=>$dateId,
            "dateId"=>trim($dateId)??'',

		);

		// echo '<pre>';
		// print_r($tbl_cus_field);die;



		if(!$customer_id)
		{	
			if($this->PP_Consumer_Loans_Model->insertRow('tbl_customer_entries',$tbl_cus_field))
			{

				// Send Mail To customer

				$this->Email_Sms_Template_Model->send_mail_to_customer_template1($tbl_cus_field);

				// Send SMS To customer

				$this->Email_Sms_Template_Model->send_sms_to_customer_template1($tbl_cus_field);


				echo "success";
			}
			else
			{
				echo "error";
			}
				
		}
		else
		{
			if($this->PP_Consumer_Loans_Model->updateRow('tbl_customer_entries','customer_id',$customer_id,$tbl_cus_field))
			{
				echo "success";
			}
			else
			{
				echo "error";
			}
		}

	}	

	public function edit_customer()
	{

		$customerID=trim($this->input->post('id'));
		$customerdata=$this->Customer_Model->get_customerdata_info($customerID);

		$res = json_encode($customerdata);

		echo $res;
		
		
		
	}
	
	public function delete_customer()
	{
		$customer_id  =  $this->input->post('id');
		$arr = array('deleted' => "1");
		echo $this->Common_model->updateRow('tbl_customer_entries','customer_id',$customer_id,$arr);	


	}
	
	public function import_individual_customer(){
	   // echo '<pre>';
	   // print_r($_FILES);
	    $filename=$_FILES["import_customerfile"]["tmp_name"];  
	    
	    $open = fopen($filename,'r');
	    echo '<pre>';
	    
	    $record = array();
	    $count = 0;
	    while (!feof($open)) 
        {
         $getTextLine = fgets($open);
         
         
            //print_r($getTextLine);
         
            if($count != 0){
        
            $record = explode("|",$getTextLine);
            // echo "Record data".'<br/>';
            // print_r($record);
         
         
            $insertdata['title'] = trim($record[0]);
        	$insertdata['first_name'] = trim($record[1]);
            $insertdata['last_name'] = trim($record[2]);
            $insertdata['gender'] = trim($record[3]);
            if(trim($record[4]))
            {
                $record4 = trim($record[4]);
                $record4 = date('Y/m/d', strtotime($record4));
                $record4 = str_replace('/', '-', $record4);
                
            }
            else
            {
                $record4 = "";
            }
            
            $insertdata['dob'] = $record4;
            $insertdata['birthplace'] = trim($record[5]);
            $insertdata['marital_status'] = trim($record[6]);
            $insertdata['email'] = trim($record[7]);
            $insertdata['resides_address'] = trim($record[8]);
            $insertdata['street'] = trim($record[9]);
            $insertdata['alternateAddress'] = trim($record[10]);
            $insertdata['city_id'] = trim($record[11]);
            $insertdata['legalCapacity'] = trim($record[12]);
            $insertdata['type_id'] = trim($record[13]);
            $insertdata['id_number'] = trim($record[14]);
            $insertdata['state_of_issue'] = trim($record[15]);
            $insertdata['main_phone'] = trim($record[16]);
            $insertdata['main_phone2'] = trim($record[17]);
            $insertdata['alternative_phone'] = trim($record[18]);
            $insertdata['alter_phone2'] = trim($record[19]);
            if(trim($record[20]))
            {
                $record20 = trim($record[20]);
                $record20 = date('Y/m/d', strtotime($record20));
                $record20 = str_replace('/', '-', $record20);
            }
            else
            {
                $record20 = "";
            }
            $insertdata['dateId'] = $record20;
             if(trim($record[21]))
            {
                $record21 = trim($record[21]);
                $record21 = date('Y/m/d', strtotime($record21));
                $record21 = str_replace('/', '-', $record21);
            }
            else
            {
                $record21 = "";
            }
            $insertdata['expiration_date_id'] = $record21;
             
            $insertdata['father_firstname'] = trim($record[22]);
            $insertdata['father_fullname'] = trim($record[23]);
            $insertdata['mother_firstname'] = trim($record[24]);
            $insertdata['mother_fullname'] = trim($record[25]);
            $insertdata['nationality'] = trim($record[26]);
            $insertdata['insurance_place_id'] = trim($record[27]);
            $insertdata['employeeStatus'] = trim($record[28]);
            $insertdata['employer_name'] = trim($record[29]);
            $insertdata['secteurs_id'] = trim($record[30]);
            $insertdata['categ'] = trim($record[31]);
            $insertdata['cat_employeurs'] = trim($record[32]);
            //$insertdata['cat_emp_id'] = "";
            $insertdata['contract_type_id'] = trim($record[33]);
            $insertdata['address_employer'] = trim($record[34]);
            $insertdata['numero1'] = trim($record[35]);
            $insertdata['numero2'] = trim($record[36]);
             if(trim($record[37]))
            {
                $record37 = trim($record[37]);
                $record37 = date('Y/m/d', strtotime($record37));
                $record37 = str_replace('/', '-', $record37);
            }
            else
            {
                $record37 = "";
            }
            $insertdata['employment_date'] = $record37;
             if(trim($record[38]))
            {
                $record38 = trim($record[38]);
                $record38 = date('Y/m/d', strtotime($record38));
                $record38 = str_replace('/', '-', $record38);
            }
            else
            {
                $record38 = "";
            }
            $insertdata['sate_end_contract_cdd'] = $record38;
             if(trim($record[39]))
            {
                $record39 = trim($record[39]);
                $record39 = date('Y/m/d', strtotime($record39));
                $record39 = str_replace('/', '-', $record39);
            }
            else
            {
                $record39 = "";
            }
            $insertdata['how_he_is_been_with_current_employer'] = $record39;
            $insertdata['emp_net_salary'] = trim($record[40]); 
         //   $insertdata['retirement_age_expected'] = $value['AP'];
            $insertdata['employeeOccupation'] = trim($record[41]);
            $insertdata['ancianemployer'] = trim($record[42]);
            $insertdata['account_type'] = trim($record[43]);
            $insertdata['bank_name'] = trim($record[44]);
            $insertdata['bank_phone'] = trim($record[45]);
             if(trim($record[46]))
            {
                $record46 = trim($record[46]);
                $record46 = date('Y/m/d', strtotime($record46));
                $record46 = str_replace('/', '-', $record46);
            }
            else
            {
                $record46 = "";
            }
            $insertdata['opening_date'] = $record46;
            $insertdata['code_bqe'] = trim($record[47]);
            $insertdata['code_agence'] = trim($record[48]);
            $insertdata['account_no'] = trim($record[49]);
            $insertdata['rib4'] = trim($record[50]);
            $insertdata['devise'] = trim($record[51]);
            $insertdata['carte_bancaire'] = trim($record[52]);
            $insertdata['ibu'] = trim($record[53]); 
          
            $check_agence  =  $this->db->get_where('tbl_branch',array('code_agence' => $insertdata['code_agence']))->row_array();

        	if(!empty($check_agence)){
        		$branch_id = $check_agence['bid']; 
        	}
        	else{
        		$branch_id =  "0";
        	}
            $insertdata['nature_relation'] = trim($record[54]);
            $insertdata['cat_client'] = trim($record[55]);
            $insertdata['typeDeClientele'] = trim($record[56]);
            $insertdata['dossierkyc'] = trim($record[57]);
             if(trim($record[58]))
            {
                $record58 = trim($record[58]);
                $record58 = date('Y/m/d', strtotime($record58));
                $record58 = str_replace('/', '-', $record58);
            }
            else
            {
                $record58 = "";
            }
            $insertdata['prochaineRevision'] =$record58;
            $insertdata['risk_level'] = trim($record[59]);
             if(trim($record[60]))
            {
                $record60 = trim($record[60]);
                $record60 = date('Y/m/d', strtotime($record60));
                $record60 = str_replace('/', '-', $record60);
            }
            else
            {
                $record60 = "";
            }
            $insertdata['risk_level_date'] = $record60;
            $insertdata['authCode'] = trim($record[61]);
             if(trim($record[62]))
            {
                $record62 = trim($record[62]);
                $record62 = date('Y/m/d', strtotime($record62));
                $record62 = str_replace('/', '-', $record62);
            }
            else
            {
                $record62 = "";
            }
           
            $insertdata['authDate'] = $record62;
            $insertdata['nomGestionnaire'] = trim($record[63]);
            $insertdata['codeGestionnaire'] = trim($record[64]);
            $insertdata['etatAutorisation'] = trim($record[65]);
           
           
            $insertdata['Surveillance'] = trim($record[66]);
            $insertdata['Deces'] = trim($record[67]);
            $insertdata['Contexntieux'] = trim($record[68]);
            $insertdata['Interdit'] = trim($record[69]);
            $insertdata['pep'] = trim($record[70]);
            $insertdata['niveiu'] = trim($record[71]);
             if(trim($record[72]))
            {
                $record72 = trim($record[72]);
                $record72 = date('Y/m/d', strtotime($record72));
                $record72 = str_replace('/', '-', $record72);
            }
            else
            {
                $record72 = "";
            }
            $insertdata['datedernier'] = $record72;
            
            $insertdata['branch_id'] = $branch_id;
            $insertdata['created'] = date('Y-m-d H:i:s');
            
        //     echo "insert data";
         //  print_r($insertdata);
         
            if(!empty($insertdata['account_no']) && !empty($insertdata['dob'])){
                $check_customer = $this->db->get_where('tbl_customer_entries',array('account_no' => $insertdata['account_no'] ,'dob'=>$insertdata['dob']))->row_array();
            // echo $this->db->last_query();
            // print_r($check_customer); 
            
            
                if(empty($check_customer))
                {
                    if($this->Common_model->insertRow('tbl_customer_entries',$insertdata))
                    {
                        $insert_count[] = 1;
                    }
                }
                else
                {
                    if($this->Common_model->updateRow('tbl_customer_entries','customer_id',$check_customer['customer_id'],$insertdata)){
                        $update_count[] = 1;
                    }
                }
            }
            
            //echo $count;
            }
            $count++;
        
        }
        
       // print_r($update_count); die;
        
        $msg = "Total inserted record(s): ".count($insert_count).'<br/>';
        $msg .= "Total updated record(s): ".count($update_count);
        
        $this->session->set_flashdata('flash_message',$msg);
        
        redirect('Customer','refresh');

	}
	
	

	public function import_individual_customer_excel(){
		    
		error_reporting(E_ALL); 
		ini_set('display_errors', 1); 
	    ini_set('memory_limit', -1);
        ini_set('max_execution_time', -1);
        ini_set('max_input_time', -1);
        // ini_set('upload_max_filesize', '128M');
        // ini_set('post_max_size', '128M');
    
        if($_FILES){
			$path = 'uploads/';
            require_once APPPATH . "/third_party/PHPExcel.php";
            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls|csv';
            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);            
            if (!$this->upload->do_upload('import_customerfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
            }

            // print_r($data);die;
            
            if(empty($error)){
	            if (!empty($data['upload_data']['file_name'])) {
	                $import_xls_file = $data['upload_data']['file_name'];
	            } else {
	                $import_xls_file = 0;
	            }
           		
           		$inputFileName = $path . $import_xls_file; 

	       		try 
	       		{
	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
	                $objPHPExcel = $objReader->load($inputFileName);
	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);

	               // 	echo '<pre>';
	              	// print_r($allDataInSheet); 
	              	// echo '</pre>';
	              	// die;
	                
	               	$isadmin=$this->session->userdata('id');

	               	// $check_columnheader =  $this->Business_Customer_Model->check_columnheader($allDataInSheet);

	               	// if($check_columnheader['status'] ==  false){

	               	// 	$this->session->set_flashdata('error_message',"Please enter the correct header format of csv file and incorrect labels : ".$check_columnheader['fields']);
	               	// 	redirect('Business_Customer');
	               	// }

	               //	die;
	               	$i=0;
	               	set_time_limit(0);

	                foreach ($allDataInSheet as $key=>$value) {

	                	if($i == 0){

	                		$i++;
	                		continue;
	                	}
	                  
		                

		                
		                //Check cat employee
		                if($value['AG'] != ""){

		                	if(strtoupper($value['AG']) == strtoupper("Public"))
		                	{
		                		$cat_emp_id =  9;
		                	}else if(strtoupper($value['AG']) == strtoupper("Prive")){
		                		$cat_emp_id =  8;
		                	}else{
		                	    $cat_emp_id =  'Autres';
		                	}
		                    
		                }
		                


		           

		               if($value['W'] != "")
		                {
		                	$check_agence  =  $this->db->get_where('tbl_country_nationality',array('nationality' => $value['W']))->row_array();

		                	if(!empty($check_agence)){
		                		$nationality = $check_agence['id']; 
		                	}
		                	else{
		                		$nationality =  "";
		                		$invalid_agence[] =  $i;
		                	}
		                }
		                else{
		                	$nationality =  "";
		                }


		            
		               
		               	// Agence data

		               	if($value['AW'] != "")
		                {
		                	$check_agence  =  $this->db->get_where('tbl_branch',array('code_agence' => $value['AW']))->row_array();

		                	if(!empty($check_agence)){
		                		$branch_id = $check_agence['bid']; 
		                	}
		                	else{
		                		$branch_id =  "";
		                		$invalid_agence[] =  $i;
		                	}
		                }
		                else{
		                	$branch_id =  "0";
		                }

		               	// Officer data

		              



		                // Check Required Fields and their validation

		              //  if($value['D'] != "" && $value['J'] != "" && $value['M'] != "")
		              //  {
		                				
		                	$insertdata['title'] = $value['A'];
		                	$insertdata['first_name'] = $value['B'];
			                $insertdata['last_name'] = $value['C'];
			                $insertdata['gender'] = $value['D'];
			                $insertdata['dob'] = (trim($value['E']," ")) ? (date("Y-m-d", strtotime($value['E']))) : "";
			                $insertdata['birthplace'] = $value['F'];
			                $insertdata['marital_status'] = $value['G'];
			                $insertdata['email'] = $value['H'];
			                $insertdata['resides_address'] = $value['I'];
			                $insertdata['street'] = $value['J'];
			                $insertdata['alternateAddress'] = $value['K'];
			                $insertdata['city_id'] = $value['L'];
			                $insertdata['legalCapacity'] = $value['M'];
			                
			                
			                $insertdata['type_id'] = $value['N'];
			                $insertdata['id_number'] = $value['O'];
			                $insertdata['state_of_issue'] = $value['P'];
			                $insertdata['main_phone'] = $value['Q'];
			                $insertdata['main_phone2'] = $value['R'];
			                $insertdata['alternative_phone'] = $value['S'];
			                $insertdata['alter_phone2'] = $value['T'];
			                $insertdata['expiration_date_id'] = (trim($value['U']," ")) ? (date("Y-m-d", strtotime($value['U']))) : "";
			                $insertdata['dateId'] = (trim($value['V']," ")) ? (date("Y-m-d", strtotime($value['V']))) : "";
			                $insertdata['father_firstname'] = $value['W'];
			                $insertdata['father_fullname'] = $value['X'];
			                $insertdata['mother_firstname'] = $value['Y'];
			                $insertdata['mother_fullname'] = $value['Z'];
			                $insertdata['nationality'] = $value['AA'];
			                $insertdata['insurance_place_id'] = $value['AB'];
			                
			                
			                $insertdata['employeeStatus'] = $value['AC'];
			                $insertdata['employer_name'] = $value['AD'];
			                $insertdata['secteurs_id'] = $value['AE'];
			                $insertdata['categ'] = $value['AF'];
			                $insertdata['cat_employeurs'] = $value['AG'];
			                $insertdata['cat_emp_id'] = $cat_emp_id;
                            $insertdata['contract_type_id'] = $value['AH'];
			                $insertdata['address_employer'] = $value['AI'];
			                $insertdata['numero1'] = $value['AJ'];
			                $insertdata['numero2'] = $value['AK'];
			                $insertdata['employment_date'] = (trim($value['AL']," ")) ? (date("Y-m-d", strtotime($value['AL']))) : "";
			                $insertdata['sate_end_contract_cdd'] = (trim($value['AM']," ")) ? (date("Y-m-d", strtotime($value['AM']))) : "";
			             //   $insertdata['years_professionel_experience'] = ($value['AM']) ? (date("Y-m-d", strtotime($value['AM']))) : "";
			                $insertdata['how_he_is_been_with_current_employer'] = (trim($value['AN']," ")) ? (date("Y-m-d", strtotime($value['AN']))) : "";
                            $insertdata['emp_net_salary'] = $value['AO'];
			             //   $insertdata['retirement_age_expected'] = $value['AP'];
			                $insertdata['employeeOccupation'] = $value['AP'];
			                $insertdata['ancianemployer'] = $value['AQ'];

			                
			                $insertdata['account_type'] = $value['AR'];
			                $insertdata['bank_name'] = $value['AS'];
			                $insertdata['bank_phone'] = $value['AT'];
			                $insertdata['opening_date'] = (trim($value['AU']," ")) ? (date("Y-m-d", strtotime($value['AU']))) : "";
			                $insertdata['code_bqe'] = $value['AV'];
			                $insertdata['code_agence'] = $value['AW'];
			                $insertdata['account_no'] = $value['AX'];
			                $insertdata['rib4'] = $value['AY'];
			                $insertdata['devise'] = $value['AZ'];
			                $insertdata['carte_bancaire'] = $value['BA'];
			                $insertdata['ibu'] = $value['BB']; 
			                $insertdata['nature_relation'] = $value['BC'];
			                $insertdata['cat_client'] = $value['BD'];
			                $insertdata['typeDeClientele'] = $value['BE'];
			                $insertdata['dossierkyc'] = $value['BF'];
			                $insertdata['prochaineRevision'] =(trim($value['BG']," ")) ? (date("Y-m-d", strtotime($value['BG']))) : "";
			             //   $insertdata['segmentation'] = $value['BH'];
			                $insertdata['risk_level'] = $value['BH'];
			                $insertdata['risk_level_date'] = (trim($value['BI']," ")) ? (date("Y-m-d", strtotime($value['BI']))) : "";
			                $insertdata['authCode'] = $value['BJ'];
			                $insertdata['authDate'] = (trim($value['BK']," ")) ? (date("Y-m-d", strtotime($value['BK']))) : "";
			                $insertdata['nomGestionnaire'] = $value['BL'];
			                $insertdata['codeGestionnaire'] = $value['BM'];
			                $insertdata['etatAutorisation'] = $value['BN'];
			                $insertdata['Surveillance'] = $value['BO'];
			                $insertdata['Deces'] = $value['BP'];
			                $insertdata['Contexntieux'] = $value['BQ'];
			                $insertdata['Interdit'] = $value['BR'];
			                $insertdata['pep'] = $value['BS'];
			                $insertdata['niveiu'] = $value['BT'];
			                $insertdata['datedernier'] = (trim($value['BU']," ")) ? (date("Y-m-d", strtotime($value['BU']))) : "";
			                $insertdata['branch_id'] = $branch_id;
			                
			                
			                $insertdata['created'] = date('Y-m-d H:i:s');

			                $insert_id  = $this->Common_model->insertRow('tbl_customer_entries',$insertdata);

		              //  }
		              //  else{
		              //  	$missing_data[] =  $i;
		              //  }
		                

		                $i++;
	                }

	               // print_r($insertdata);


	                if(!empty($insert_idarray))
	                {
	                	$this->session->set_flashdata("flash_message","No of record(s) added :".count($insert_idarray));
	                }

	                $msg = '';
	                if(!empty($missing_data)){

	                	$msg .= "Mandatory fields are missing in these row(s) : ".implode(',',$missing_data)."<br/>";
	                	

	                }
	                if(!empty($incorrect_type_of_legal)){

	                	$msg .= "Incorrect Forme juridique are passed in these row(s) : ".implode(',',$incorrect_type_of_legal)."<br/>";
	                	
	                } 
	                if(!empty($invalid_numero_compte)){
	                	$msg .= "Numero du compte should be numeric in these row(s) : ".implode(',',$invalid_numero_compte)."<br/>";
	                }
	                if(!empty($invalid_agence)){
	                	$msg .= "Invalid Agence are found in these row(s) : ".implode(',',$invalid_agence)."<br/>";
	                }
	                if(!empty($invalid_sector)){
	                	$msg .= "Invalid Secteur are found in these row(s) : ".implode(',',$invalid_sector)."<br/>";
	                }          
     
     				if(!empty($invalid_principal)){
     					$msg .= "Principal gerant should be numeric in these row(s) : ".implode(',',$invalid_principal)."<br/>";
     				}
     				if(!empty($invalid_capital)){
     					$msg .= "Capital should be numeric in these row(s) : ".implode(',',$invalid_capital)."<br/>";
     				}
     				if(!empty($invalid_taxid)){
     					$msg .= "Numero d immatriculation RCCM should be numeric in these row(s) : ".implode(',',$invalid_taxid)."<br/>";
     				}
     				if(!empty($invalid_amounttype)){
     					$msg .= "Solde should be valid in these row(s) : ".implode(',',$invalid_amounttype)."<br/>";
     				}
     				if(!empty($invalid_balanceamt)){
     					$msg .= "Solde du Compte Courant should be numeric in these row(s) : ".implode(',',$invalid_balanceamt)."<br/>";
     				}
     				if(!empty($invalid_unpaidamt)){
     					$msg .= "Montant des impayes should be numeric in these row(s) : ".implode(',',$invalid_unpaidamt)."<br/>";
     				}
     				if(!empty($invalid_unpaidno)){
     					$msg .= "Nombre des impayes should be numeric in these row(s) : ".implode(',',$invalid_unpaidno)."<br/>";
     				}

     				if($msg){
     					$this->session->set_flashdata("error_message",$msg);
     				}
              	} 
              	catch (Exception $e) {
                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
	                            . '": ' .$e->getMessage());
                }

            }
            else
            {
                echo $error['error'];
            }

		}
		// echo "test";
		// redirect('Customer');
		header("Location: ../Customer");
		exit();

	}
	
	public function fetchBranchdetail()
	{
		$branchId  =  $this->input->post('id');
		$arr = array('bid' => $branchId);
// 		echo $branchId;
		$data= $this->Common_model->getAllRecords('tbl_branch',$arr);	
		
		$new= json_encode($data[0]);
		print_r($new);
// 		echo $this->db->last_query();


	}
	

}