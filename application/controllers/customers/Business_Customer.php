<?php   
// New Update : 28-04-2020

// Usage : This controller maintains add,edit and delete of business consumers.These type of consumers used in business products.

defined('BASEPATH') OR exit('No direct script access aloowed');

class Business_Customer extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Business Customer';	
		$this->data['page'] = 'Business_Customer';	
		$this->load->library('session');
		$this->load->helper('lang_translate');		
    	$this->load->model('Common_model');
    	$this->load->model('Secteur_Model');
    	$this->load->model('Business_Customer_Model');
    	$this->load->model('PP_Consumer_Loans_Model');

	}

	public function index(){

		$user_role = $this->session->userdata('role');
		$user_id = $this->session->userdata('id');

		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['secteurs'] = $this->Secteur_Model->get_all_secteurs();
		$this->data['business_customer'] =  $this->Business_Customer_Model->get_all_bussiness_customers();
                $branch_where  =  array('deleted' => '0');
		$this->data['branch_record']=$this->Common_model->getAllRecords('tbl_branch',$branch_where);
		$this->data['branchdata'] =  $this->Common_model->get_user_branch($user_id);
		
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;

		$this->data['addbussinessForm'] =  $this->load->view('customer/business_customerForm',$this->data,true);  
		
		if($this->data['is_admin'] == false)
		{ 
                    $this->render_template2('customer/business_customer',$this->data);
		}
		else
		{
                    $this->render_template('admin/business_customer',$this->data);
		}
	}
	
    public function save_bussiness_customer()
    {
		$isadmin=$this->session->userdata('id');
		$opening_date=date("Y-m-d", strtotime($this->input->post('account_open_date')));
		$customer_id  =  $this->input->post('edit_id');

		$tbl_cus_field =  array(
			"is_admin"=>$isadmin,
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

		$full_name =  $this->input->post('full_name');
		$position =  $this->input->post('position');
		$officer_address =  $this->input->post('officer_address');
		$age =  $this->input->post('age');
		$anciennete =  $this->input->post('anciennete');
		$edit_officer_id  =  $this->input->post('edit_officer_id');

		if(!$customer_id)
		{	
			if($insert_id  =  $this->Common_model->insertRow('tbl_business_customer',$tbl_cus_field))
			{
				

				foreach($full_name as $key=>$frow)
				{
					if($frow)
					{	
						$officer_arr =  array(
													'business_customer_id' => $insert_id,
													'full_name' => trim($frow),
													'position' => trim($position[$key]),
													'address'=> trim($officer_address[$key]),
													'age' => trim($age[$key]),
													'anciennete' => trim($anciennete[$key])
											);
					
					
						$this->Common_model->insertRow('tbl_business_customer_officer',$officer_arr);
					}
				}

				echo "success";
			}
			else
			{
				echo "error";
			}
				
		}
		else
		{
			if($this->Common_model->updateRow('tbl_business_customer','customer_id',$customer_id,$tbl_cus_field))
			{
				foreach($edit_officer_id as $key=>$rowid)
				{
					$officer_arr1 =  array(
											'business_customer_id' => $customer_id,
											'full_name' => trim($full_name[$key]),
											'position' => trim($position[$key]),
											'address'=> trim($officer_address[$key]),
											'age' => trim($age[$key]),
											'anciennete' => trim($anciennete[$key])	
					);

					$this->Common_model->updateRow('tbl_business_customer_officer','officer_id',$rowid,$officer_arr1);
				}

				echo "success";
			}
			else
			{
				echo "error";
			}
		}


    }

	

	public function edit_business_customer()
	{

		$customerID=trim($this->input->post('id'));
		$customer_data=$this->Business_Customer_Model->get_business_customer_details($customerID);
		$officer_data =  $this->Business_Customer_Model->get_business_officer_details($customerID);
		$branch = $this->db->get_where('tbl_branch',array('bid' => $customer_data[0]['branch']))->result_array();
		$res = json_encode($customer_data);
		$res1 =  json_encode($officer_data);
		$res2 =  json_encode($branch);

		echo $res."$".$res1."$".$res2;
		
	}

//	public function import_business_customer(){
//		
//
//		if($_FILES){
//			$path = 'uploads/';
//            require_once APPPATH . "/third_party/PHPExcel.php";
//            $config['upload_path'] = $path;
//            $config['allowed_types'] = 'xlsx|xls|csv';
//            $config['remove_spaces'] = TRUE;
//            $this->load->library('upload', $config);
//            $this->upload->initialize($config);            
//            if (!$this->upload->do_upload('import_customerfile')) {
//                $error = array('error' => $this->upload->display_errors());
//            } else {
//                $data = array('upload_data' => $this->upload->data());
//            }
//            if(empty($error)){
//	            if (!empty($data['upload_data']['file_name'])) {
//	                $import_xls_file = $data['upload_data']['file_name'];
//	            } else {
//	                $import_xls_file = 0;
//	            }
//           		
//           		$inputFileName = $path . $import_xls_file;
//
//	       		try 
//	       		{
//	                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
//	                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
//	                $objPHPExcel = $objReader->load($inputFileName);
//	                $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
//	              
//	                
//	               	$isadmin=$this->session->userdata('id');
//
//	               	$check_columnheader =  $this->Business_Customer_Model->check_columnheader($allDataInSheet);
//
//	               	if($check_columnheader['status'] ==  false){
//
//	               		$this->session->set_flashdata('error_message',"Please enter the correct header format of csv file and incorrect labels : ".$check_columnheader['fields']);
//	               		redirect('Business_Customer');
//	               	}
//
//	               //	die;
//	               	$i=0;
//	               	set_time_limit(0);
//	                foreach ($allDataInSheet as $key=>$value) {
//
//	                	if($i == 0){
//
//	                		$i++;
//	                		continue;
//	                	}
//	                  
//		                
//
//		                if(trim(strtolower($value['C'])) == "sarl")
//		                {
//		                	$type_of_legal =  '1';
//		                }
//		                else if(trim(strtolower($value['C'])) == "unipersonelle")
//		                {
//		                	$type_of_legal =  '2';
//		                }
//		                else if(trim(strtolower($value['C'])) == "sa")
//		                {
//		                	$type_of_legal =  '3';
//		                }
//		                else if(trim(strtolower($value['C'])) == "sas")
//		                {
//		                	$type_of_legal =  '4';
//		                }
//		                else if(trim(strtolower($value['C'])) == "sci")
//		                {
//		                	$type_of_legal =  '5';
//		                }
//		                else if(trim(strtolower($value['C'])) == "commune")
//		                {
//		                	$type_of_legal =  '6';
//		                }
//		                else 
//		                {
//		                	$type_of_legal = "";
//		                	$incorrect_type_of_legal[] = $i;
//		                }
//
//		                if(trim(strtolower($value['J'])) == "decouvert")
//		                {
//		                	$creditline =  '1';
//		                }
//		                else if(trim(strtolower($value['J'])) == "caution")
//		                {
//		                	$creditline =  '2';
//		                }
//		                else if(trim(strtolower($value['J'])) == "cct")
//		                {
//		                	$creditline =  '3';
//		                }
//		                else if(trim(strtolower($value['J'])) == "cmt")
//		                {
//		                	$creditline =  '4';
//		                }
//		                else if(trim(strtolower($value['J'])) == "escompte")
//		                {
//		                	$creditline =  '5';
//		                }
//		                else
//		                {
//		                	$creditline = "invalid";
//		                	$incorrect_creditline[] = $i;
//		                }
//
//
//		                if(trim(strtolower($value['L'])) == "dat")
//		                {
//		                	$amount_type =  '1';
//		                }
//		                else if(trim(strtolower($value['L'])) == "bdc")
//		                {
//		                	$amount_type =  '2';
//		                }
//		                else if(trim(strtolower($value['L'])) == "cash call")
//		                {
//		                	$amount_type =  '3';
//		                }
//		                else
//		                {
//		                	$amount_type = "invalid";
//		                	$incorrect_amounttype[] = $i;
//		                }
////                                
////                                echo $value['L'];
////                                echo $amount_type;
////                                die;
//
//		                // Numero du compte
//		                if($value['A'] != ""){
//
//		                	if(is_numeric($value['A']))
//		                	{
//		                		$valid_first =  true;
//		                	}
//		                	else{
//		                		$invalid_numero_compte[] =  $i;
//		                		$valid_first =  false;
//		                	}
//		                }
//		                else{
//		                	$valid_first = false;
//		                }
//
//
//		                // Principal gerant
//		                if($value['E'] != ""){
//
//		                	if(is_numeric($value['E']))
//		                	{
//		                		$valid_fifth =  true;
//		                	}
//		                	else{
//		                		$invalid_principal[] =  $i;
//		                		$valid_fifth =  false;
//		                	}
//		                }
//		                else{
//		                	$valid_fifth = false;
//		                }
//
//		                // Capital
//
//		                if($value['F'] != "")
//		                {
//                                    if(is_numeric($value['F']))
//                                    {
//                                        $valid_sixth =  true;
//                                    }
//                                    else
//                                    {
//                                        $invalid_capital[] =  $i;
//                                        $valid_sixth =  false;
//                                    }
//		               	}
//		               	
//
//		               	//Numero d immatriculation RCCM
//
//		                if($value['G'] != "")
//		                {
//		                	if(is_numeric($value['G']))
//			                {
//			                	$valid_seventh =  true;
//			                }
//			                else
//			                {
//			                	$invalid_taxid[] =  $i;
//			                	$valid_seventh =  false;
//			                }
//		                }
//		                else
//		                {
//		                	$valid_seventh =  false;
//		                }
//
//		                // Solde du Compte Courant
//		                 if($value['K'] != "")
//		                {
//		                	if(is_numeric($value['K']))
//			                {
//			                	$valid_eleven =  true;
//			                }
//			                else
//			                {
//			                	$invalid_balanceamt[] =  $i;
//			                	$valid_eleven =  false;
//			                }
//		                }
//		                else
//		                {
//		                	$valid_eleven =  false;
//		                }
//
//		                // Montant des impayes
//		                 if($value['M'] != "")
//		                {
//		                	if(is_numeric($value['M']))
//			                {
//			                	$valid_thirteen =  true;
//			                }
//			                else
//			                {
//			                	$invalid_unpaidamt[] =  $i;
//			                	$valid_thirteen =  false;
//			                }
//		                }
//		                else
//		                {
//		                	$valid_thirteen =  false;
//		                }
//
//		                // Nombre des impayes
//
//		                 if($value['N'] != "")
//		                {
//		                	if(is_numeric($value['N']))
//			                {
//			                	$valid_fourteen =  true;
//			                }
//			                else
//			                {
//			                	$invalid_unpaidno[] =  $i;
//			                	$valid_fourteen =  false;
//			                }
//		                }
//		                else
//		                {
//		                	$valid_fourteen =  false;
//		                }
//
//		                // Secteur d Activite
//
//		                if($value['H'] != "")
//		                {
//		                	$check_sector  =  $this->db->get_where('tbl_target_list_companies',array('secteurs' => $value['H']))->row_array();
//
//		                	if(!empty($check_sector)){
//		                		$sector_id = $check_sector['tlc_id']; 
//		                	}
//		                	else{
//		                		$sector_id =  "";
//		                	}
//		                }
//		                else{
//		                	$sector_id =  "";
//		                }
//		               
//
//		               	// Officer data
//
//		                $officers =  explode(',',$value['O']);
//		                $positions =  explode(',',$value['P']);
//		                $age =  explode(',',$value['Q']);
//		                $experience =  explode(',',$value['R']);
//
//
//
//		                // Check Required Fields and their validation
//
//		                if($valid_first == true && $value['B'] != "" && $type_of_legal != "" 
//		                	&& $value['D'] != "" && $valid_fifth == true && $valid_sixth == true && $valid_seventh == true && $value['I'] != "" && $valid_eleven == true && $value['L'] != "" && $valid_thirteen == true && $valid_fourteen == true && $creditline != "invalid" && $sector_id !=  "" && $amount_type != "invalid")
//		                {
//		                	$insertdata['is_admin'] = $isadmin;
//			                $insertdata['account_no'] = $value['A'];
//			                $insertdata['branch'] = '4';
//			                $insertdata['company_name'] = $value['B'];
//			                $insertdata['type_of_legal'] = $type_of_legal;
//			                $insertdata['address'] = $value['D'];
//			                $insertdata['principal'] = $value['E'];
//			                $insertdata['capital'] = $value['F'];
//			                $insertdata['employer_tax_id'] = $value['G'];
//			                $insertdata['sector_id'] = $sector_id;
//			                $insertdata['account_open_date'] = date("Y-m-d", strtotime($value['I']));
//			                $insertdata['creditline_amount'] = $creditline;
//			                $insertdata['balance_amount'] = $value['K'];
//			                $insertdata['amount_type'] = $amount_type;
//			                $insertdata['unpaid_amount'] = $value['M'];
//			                $insertdata['number_of_unpaid'] = $value['N'];
//			                $insertdata['created_at'] = date('Y-m-d H:i:s');
//
//			                $insert_id  = $this->Common_model->insertRow('tbl_business_customer',$insertdata);
//
//			                if($insert_id){
//			                	foreach($officers as $key=>$frow){
//
//			                		$full_name =  $frow ? $frow : 'none';
//
//
//			                		$pos =  (!empty($positions) && $positions[$key]) ?  $positions[$key] : 'none';
//
//
//			                		$age =  (!empty($age) && $age[$key] != '' && is_numeric($age[$key]) && $age[$key] >= 18) ? $age[$key] : '';
//
//			                		$exp = (!empty($experience) && $experience[$key] != '' && is_numeric($experience[$key]) && $experience[$key] <= 99 && $experience[$key] >= 0) ?$experience[$key] : '';
//			                		
//
//			                		$record =  array(
//			                						'business_customer_id' => $insert_id,
//			                						'full_name' => $frow,
//			                						'position' => $pos,
//			                						'age' => $age,
//			                						'anciennete' => $exp
//
//			                		);
//
//			                		$this->Common_model->insertRow('tbl_business_customer_officer',$record);
//			                	}
//
//
//			                	$insert_idarray[] =  $insert_id;
//
//			                }
//		                }
//		                else{
//		                	$missing_data[] =  $i;
//		                }
//		                
//
//		                $i++;
//	                }
//
//	               // print_r($insertdata);
//
//
//	                if(!empty($insert_idarray))
//	                {
//	                	$this->session->set_flashdata("flash_message","No of record(s) added :".count($insert_idarray));
//	                }
//
//	                $msg = '';
//	                if(!empty($missing_data)){
//
//	                	$msg .= "Mandatory fields are missing in these row(s) : ".implode(',',$missing_data)."<br/>";
//	                	
//
//	                }
//	                if(!empty($incorrect_type_of_legal)){
//
//	                	$msg .= "Incorrect Forme juridique are passed in these row(s) : ".implode(',',$incorrect_type_of_legal)."<br/>";
//	                	
//	                } 
//	                if(!empty($invalid_numero_compte)){
//	                	$msg .= "Numero du compte should be numeric in these row(s) : ".implode(',',$invalid_numero_compte)."<br/>";
//	                }           
//     
//     				if(!empty($invalid_principal)){
//     					$msg .= "Principal gerant should be numeric in these row(s) : ".implode(',',$invalid_principal)."<br/>";
//     				}
//     				if(!empty($invalid_capital)){
//     					$msg .= "Capital should be numeric in these row(s) : ".implode(',',$invalid_capital)."<br/>";
//     				}
//     				if(!empty($invalid_taxid)){
//     					$msg .= "Numero d immatriculation RCCM should be numeric in these row(s) : ".implode(',',$invalid_taxid)."<br/>";
//     				}
//     				if(!empty($invalid_amounttype)){
//     					$msg .= "Solde should be valid in these row(s) : ".implode(',',$invalid_amounttype)."<br/>";
//     				}
//     				if(!empty($invalid_balanceamt)){
//     					$msg .= "Solde du Compte Courant should be numeric in these row(s) : ".implode(',',$invalid_balanceamt)."<br/>";
//     				}
//     				if(!empty($invalid_unpaidamt)){
//     					$msg .= "Montant des impayes should be numeric in these row(s) : ".implode(',',$invalid_unpaidamt)."<br/>";
//     				}
//     				if(!empty($invalid_unpaidno)){
//     					$msg .= "Nombre des impayes should be numeric in these row(s) : ".implode(',',$invalid_unpaidno)."<br/>";
//     				}
//
//     				if($msg){
//     					$this->session->set_flashdata("error_message",$msg);
//     				}
//              	} 
//              	catch (Exception $e) {
//                   die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
//	                            . '": ' .$e->getMessage());
//                }
//
//            }
//            else
//            {
//                echo $error['error'];
//            }
//
//		}
//
//		redirect('Business_Customer');
//	}
        
        public function import_business_customer(){
		


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

	               	echo '<pre>';
	              	print_r($allDataInSheet); 
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
	                  
		                

		                if(trim(strtolower($value['D'])) == "sarl")
		                {
		                	$type_of_legal =  '1';
		                }
		                else if(trim(strtolower($value['D'])) == "unipersonelle")
		                {
		                	$type_of_legal =  '2';
		                }
		                else if(trim(strtolower($value['D'])) == "sa")
		                {
		                	$type_of_legal =  '3';
		                }
		                else if(trim(strtolower($value['D'])) == "sas")
		                {
		                	$type_of_legal =  '4';
		                }
		                else if(trim(strtolower($value['D'])) == "sci")
		                {
		                	$type_of_legal =  '5';
		                }
		                else if(trim(strtolower($value['D'])) == "commune")
		                {
		                	$type_of_legal =  '6';
		                }
		                else 
		                {
		                	$type_of_legal = "";
		                	$incorrect_type_of_legal[] = $i;
		                }

		                if(trim(strtolower($value['K'])) == "decouvert")
		                {
		                	$creditline =  '1';
		                }
		                else if(trim(strtolower($value['K'])) == "caution")
		                {
		                	$creditline =  '2';
		                }
		                else if(trim(strtolower($value['K'])) == "cct")
		                {
		                	$creditline =  '3';
		                }
		                else if(trim(strtolower($value['K'])) == "cmt")
		                {
		                	$creditline =  '4';
		                }
		                else if(trim(strtolower($value['K'])) == "escompte")
		                {
		                	$creditline =  '5';
		                }
		                else
		                {
		                	$creditline = "invalid";
		                	$incorrect_creditline[] = $i;
		                }


		                if(trim(strtolower($value['M'])) == "dat")
		                {
		                	$amount_type =  '1';
		                }
		                else if(trim(strtolower($value['M'])) == "bdc")
		                {
		                	$amount_type =  '2';
		                }
		                else if(trim(strtolower($value['M'])) == "cash call")
		                {
		                	$amount_type =  '3';
		                }
		                else
		                {
		                	$amount_type = "invalid";
		                	$incorrect_amounttype[] = $i;
		                }

		                // Numero du compte
		                if($value['A'] != ""){

		                	if(is_numeric($value['A']))
		                	{
		                		$valid_first =  true;
		                	}
		                	else{
		                		$invalid_numero_compte[] =  $i;
		                		$valid_first =  false;
		                	}
		                }
		                else{
		                	$valid_first = false;
		                }


		                // Principal gerant
		                if($value['F'] != ""){

		                	if(is_numeric($value['F']))
		                	{
		                		$valid_fifth =  true;
		                	}
		                	else{
		                		$invalid_principal[] =  $i;
		                		$valid_fifth =  false;
		                	}
		                }
		                else{
		                	$valid_fifth = false;
		                }

		                // Capital

		                if($value['G'] != "")
		                {
		                	if(is_numeric($value['G']))
    		                {
    		                	$valid_sixth =  true;
    		                }
    		                else
    		                {
    		                	$invalid_capital[] =  $i;
    		                	$valid_sixth =  false;
    		                }
		               	}
		              

		               	//Numero d immatriculation RCCM

		                if($value['H'] != "")
		                {
		                	if(is_numeric($value['H']))
			                {
			                	$valid_seventh =  true;
			                }
			                else
			                {
			                	$invalid_taxid[] =  $i;
			                	$valid_seventh =  false;
			                }
		                }
		                else
		                {
		                	$valid_seventh =  false;
		                }

		                // Solde du Compte Courant
		                 if($value['L'] != "")
		                {
		                	if(is_numeric($value['L']))
			                {
			                	$valid_eleven =  true;
			                }
			                else
			                {
			                	$invalid_balanceamt[] =  $i;
			                	$valid_eleven =  false;
			                }
		                }
		                else
		                {
		                	$valid_eleven =  false;
		                }

		                // Montant des impayes
		                 if($value['N'] != "")
		                {
		                	if(is_numeric($value['N']))
			                {
			                	$valid_thirteen =  true;
			                }
			                else
			                {
			                	$invalid_unpaidamt[] =  $i;
			                	$valid_thirteen =  false;
			                }
		                }
		                else
		                {
		                	$valid_thirteen =  false;
		                }

		                // Nombre des impayes

		                 if($value['O'] != "")
		                {
		                	if(is_numeric($value['O']))
			                {
			                	$valid_fourteen =  true;
			                }
			                else
			                {
			                	$invalid_unpaidno[] =  $i;
			                	$valid_fourteen =  false;
			                }
		                }
		                else
		                {
		                	$valid_fourteen =  false;
		                }

		                // Secteur d Activite

		                if($value['I'] != "")
		                {
		                	$check_sector  =  $this->db->get_where('tbl_target_list_companies',array('secteurs' => $value['I']))->row_array();

		                	if(!empty($check_sector)){
		                		$sector_id = $check_sector['tlc_id']; 
		                	}
		                	else{
		                		$sector_id =  "";
		                		$invalid_sector[] =  $i;
		                	}
		                }
		                else{
		                	$sector_id =  "";
		                }
		               
		               	// Agence data

		               	if($value['B'] != "")
		                {
		                	$check_agence  =  $this->db->get_where('tbl_branch',array('branch_name' => $value['B']))->row_array();

		                	if(!empty($check_agence)){
		                		$branch_id = $check_agence['bid']; 
		                	}
		                	else{
		                		$branch_id =  "";
		                		$invalid_agence[] =  $i;
		                	}
		                }
		                else{
		                	$branch_id =  "";
		                }

		               	// Officer data

		                $officers =  explode(',',$value['P']);
		                $positions =  explode(',',$value['Q']);
		                $age =  explode(',',$value['R']);
		                $experience =  explode(',',$value['S']);



		                // Check Required Fields and their validation

		                if($valid_first == true && $branch_id != "" && $type_of_legal != "" 
		                	&& $value['D'] != "" && $valid_fifth == true && $valid_sixth == true && $valid_seventh == true && $value['J'] != "" && $valid_eleven == true && $value['M'] != "" && $valid_thirteen == true && $valid_fourteen == true && $creditline != "invalid" && $sector_id !=  "" && $amount_type != "invalid")
		                {
		                	$insertdata['is_admin'] = $isadmin;
			                $insertdata['account_no'] = $value['A'];
			                $insertdata['branch'] = $branch_id;
			                $insertdata['company_name'] = $value['C'];
			                $insertdata['type_of_legal'] = $type_of_legal;
			                $insertdata['address'] = $value['E'];
			                $insertdata['principal'] = $value['F'];
			                $insertdata['capital'] = $value['G'];
			                $insertdata['employer_tax_id'] = $value['H'];
			                $insertdata['sector_id'] = $sector_id;
			                $insertdata['account_open_date'] = date("Y-m-d", strtotime($value['J']));
			                $insertdata['creditline_amount'] = $creditline;
			                $insertdata['balance_amount'] = $value['L'];
			                $insertdata['amount_type'] = $amount_type;
			                $insertdata['unpaid_amount'] = $value['N'];
			                $insertdata['number_of_unpaid'] = $value['O'];
			                $insertdata['created_at'] = date('Y-m-d H:i:s');

			                $insert_id  = $this->Common_model->insertRow('tbl_business_customer',$insertdata);

			                if($insert_id){
			                	foreach($officers as $key=>$frow){

			                		$full_name =  $frow ? $frow : 'none';


			                		$pos =  (!empty($positions) && $positions[$key]) ?  $positions[$key] : 'none';


			                		$age =  (!empty($age) && $age[$key] != '' && is_numeric($age[$key]) && $age[$key] >= 18) ? $age[$key] : '';

			                		$exp = (!empty($experience) && $experience[$key] != '' && is_numeric($experience[$key]) && $experience[$key] <= 99 && $experience[$key] >= 0) ?$experience[$key] : '';
			                		

			                		$record =  array(
			                						'business_customer_id' => $insert_id,
			                						'full_name' => $frow,
			                						'position' => $pos,
			                						'age' => $age,
			                						'anciennete' => $exp

			                		);

			                		$this->Common_model->insertRow('tbl_business_customer_officer',$record);
			                	}


			                	$insert_idarray[] =  $insert_id;

			                }
		                }
		                else{
		                	$missing_data[] =  $i;
		                }
		                

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

		redirect('Business_Customer');
	}
	
	public function delete_customer()
	{
		$customer_id =  $this->input->post('id');
		$where  =  array('deleted' => '1');

		echo $this->Common_model->updateRow('tbl_business_customer','customer_id',$customer_id,$where);	

	}
}