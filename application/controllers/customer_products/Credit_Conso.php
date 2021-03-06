<?php 
// New Update : 01-05-2020

// Usage : This controller maintains gage espece products functionalities in the application

defined('BASEPATH') OR exit('No direct script access aloowed');

class Credit_Conso extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'GABON | PP FETES A LA CARTE';	
		$this->data['page'] = 'PP_FETES_A_LA_CARTE';
		
		$this->load->helper('lang_translate'); 
		$this->load->helper('timeAgo');
		$this->load->helper(array('dompdf', 'file')); 	
		$this->load->helper('url');
		
    	$this->load->model('Common_model');
    	$this->load->model('Customer_Model');
    	$this->load->model('Setting_Model');
    	$this->load->model('PP_Credit_Scholar_Model');
    	$this->load->model('PP_Consumer_Loans_Model');
    	$this->load->model('Credit_Scolair_Model');
    	$this->load->model('Credit_Conso_Model');
    	$this->load->model('Employer_Model');
    	$this->load->model('Secteur_Model');
    	$this->load->model('EmployeeCategory_Model');
    	$this->load->model('Admin_Model');

    	$this->load->library('session');		
    	$this->load->library('Class_Amort');
    	$this->load->library('ConvertNumberToText');

		//date_default_timezone_set('GMT');
		
	}

	
	/*------------------- Start manage gage espece--------------------*/
	public function index($param=''){

		$this->data['record'] = $this->Common_model->get_admin_details(2);
		$this->data['loantype']=$this->PP_Consumer_Loans_Model->get_loanType();
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loan_details'] =  $this->Credit_Conso_Model->get_loan_details_branchwise();


		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['loanrange']=$this->PP_Consumer_Loans_Model->get_pprange();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->data['controller'] = $this; 
      
		$this->render_template2('customer_product/credit_conso/index', $this->data);

	}
    	public function getUserDetail($id){
        $this->db->select('g.user_name,g.exploitent');
		$this->db->from('tbl_user as g');
		
		$this->db->where('g.id',$id);
    	$result =  $this->db->get()->result_array();
	
		return $result[0] ;

	}
		public function getBranch($id){
        $this->db->select('g.branch_name');
		$this->db->from('tbl_branch as g');
		
		$this->db->where('g.bid',$id);
    	$result =  $this->db->get()->result_array();
	
		return $result[0]['branch_name'] ;

	}
	

		public function add_loan(){
		// echo "<pre>", print_r($_POST), "</pre>"; exit;

		// $ip = $_SERVER['REMOTE_ADDR'];
		$ip = '122.0.0.1';
		// $this->form_validation->set_error_delimiters('<span>', '</span>');		
		// $this->form_validation->set_rules('loan_amt', 'Loan Amount', 'required');
		// $this->form_validation->set_rules('loan_interest', 'Interest', 'required');
		// $this->form_validation->set_rules('loan_term', 'Term', 'required');
		// $this->form_validation->set_rules('vat_on_interest', 'Tax', 'required');
		// $this->form_validation->set_rules('loan_commission', 'loan_commission', 'required');
		// $this->form_validation->set_rules('loan_guarantee', 'loan_guarantee', 'required');
		// if ($this->form_validation->run() == FALSE){
		// 	$errors['error'] = validation_errors();
		// 	echo json_encode($errors);
		// }else{		
		$num =round(microtime(true)*1000);
		$data = array(
			'application_no'=>$num,
			'admin_id'=>$this->session->userdata('id'),
			'ip_address' => $ip,
            'loan_type' => $this->input->post('loan_type'),
            'loan_amt' => $this->input->post('loan_amt'),
            'loan_interest' => $this->input->post('loan_interest'),
            'loan_term' => $this->input->post('loan_term'),
            'loan_schedule' => $this->input->post('loan_schedule'),
            'loan_fee' => $this->input->post('loan_fee'),
            'loan_tax' => $this->input->post('vat_on_interest'),
			'loan_commission' => $this->input->post('loan_commission'),
			'loan_guarantee' => $this->input->post('loan_guarantee'),
			'annual_teg' => $this->input->post('annual_teg'),
			'periodic_teg' => $this->input->post('periodic_teg'),
			'wear_rate' => $this->input->post('wear_rate'),
			'tva' =>  $this->input->post('tva'),
			'css' =>  $this->input->post('css'),
		);

		print_r($data);

        // $result['success']=$this->PP_Consumer_Loans_Model->insertRow('temp_consumer_applicationform',$data);
       // echo json_encode($result);
    	//}
    }
    
    // start change assignment on user roles
    public function assignloan_to_user($param){
        
        $loan_id = $param;
        $user_id = $this->session->userdata('id');
        
	    $result= array(
	                'loan_id' => $loan_id,
	                'loan_type' => "credit_conso",
	                'assign_user_id'=>$user_id,
	                'assign_status'=>"assign_to_myself",
	                'assign_remark'=>"",
	                'assign_date' => DATETIME,
	                'created_by'=> $user_id
	        
	        );
	        
	    if($this->Common_model->insertRow('tbl_loan_assignee',$result))
        {
            $comnt = "S'approprier";

			$track_data =  array(
									'loan_id' => $result['loan_id'],
									'product_type' => $result['loan_type'],
									'type'=> "assign_to_myself",
									'user_id' => $user_id,
									'comment' => $comnt,
									'content_type' => 'text'
			);

			$this->Common_model->insertRow('tbl_business_tracking_timeline',$track_data);
			
	       $this->session->set_flashdata("flash_message","Assign?? avec succ??s"); //Assigned Successfully
	       redirect('PP_FETES_A_LA_CARTE');
        }

	  
	}
	
	public function assign_status()
	{
	   
	    $loan_id = $this->input->post('loan_id');
	    $user_id  = $this->session->userdata('id');
	    $assign_status = $this->input->post('status'); 
	    $role_id = $this->session->userdata('role');
	    
	    if($assign_status == "overide"){
	        $check_assigned = $this->db->query("SELECT tbl_loan_assignee.*,tbl_user.id as user_id,tbl_user.user_name,tbl_user.is_admin,tbl_user.type FROM `tbl_loan_assignee` inner join tbl_user on tbl_loan_assignee.assign_user_id = tbl_user.id WHERE loan_id = '$loan_id' AND loan_type='credit_conso' AND tbl_user.is_admin='$role_id' AND assign_status ='assign_to_myself' AND currently_active = '1'ORDER BY id DESC LIMIT 1")->row_array();
    	    //print_r($check_assigned);
    	    
    	    if(!empty($check_assigned))
    	    {
    	        if($check_assigned['user_id'] != $user_id)
    	        {
    	          $output =  array(
    	                    'status' => '1',
    	                    'condition' => "assign_to_myself",
    	                    'user'=> $check_assigned['user_name']
    	            );  
    	        }
    	        else if($check_assigned['user_id'] == $user_id){
    	            $output =  array(
    	                    'status' => '4',
    	                    'condition' => "assign_to_me"
    	            );
    	        }
    	        
    	    }
    	    else {
    	         $check_overide = $this->db->query("SELECT tbl_loan_assignee.*,tbl_user.id as user_id,tbl_user.user_name,tbl_user.is_admin,tbl_user.type FROM `tbl_loan_assignee` inner join tbl_user on tbl_loan_assignee.assign_user_id = tbl_user.id WHERE loan_id = '$loan_id' AND loan_type='credit_conso' AND tbl_user.is_admin='$role_id' AND assign_status ='overide' AND currently_active = '1' ORDER BY id DESC LIMIT 1")->row_array();
    	        
    	         if(!empty($check_overide)){
    	             if($check_overide['assign_user_id'] == $user_id)
        	         {
        	             $output =  array(
        	                    'status' => '2',
        	                    'condition' => "override_by_you"
        	                    
        	                 );
        	         }
        	         else{
        	              $output =  array(
        	                    'status' => '3',
        	                    'condition' => "overide_to_other",
        	                    'user'=>$check_overide['user_name']
        	            );
        	         }
    	         }
    	         else{
    	             $output =  array(
        	                    'status' => '5',
        	                    'condition' => "no_one_assigned"
        	            );
    	         }
    	         
    	    }
    	    
    	    echo json_encode($output);
	    }
	    else if($assign_status == "assign"){
	         $c_where  = "loan_id = '$loan_id' AND loan_type='credit_conso' AND assign_user_id = '$user_id' AND tbl_user.is_admin='$role_id' AND currently_active = '1' AND assign_status = 'assign_to_myself'";
        	 $check_selfuser = $this->db->query("SELECT tbl_loan_assignee.*,tbl_user.id as user_id,tbl_user.user_name,tbl_user.is_admin,tbl_user.type FROM `tbl_loan_assignee` inner join tbl_user on tbl_loan_assignee.assign_user_id = tbl_user.id WHERE $c_where ORDER BY id DESC LIMIT 1")->result_array();
        	   
        	   if(!empty($check_selfuser)){
        	       $output = array(
        	                    'status' => '1',
        	                    'condition' => "assigned_to_you"
        	           );
        	       
        	   }
        	   else
        	   {
        	       $o_where  = "loan_id = '$loan_id' AND loan_type='credit_conso' AND tbl_user.is_admin='$role_id' AND currently_active = '1'";
        	       $check_other = $this->db->query("SELECT tbl_loan_assignee.*,tbl_user.id as user_id,tbl_user.user_name,tbl_user.is_admin,tbl_user.type FROM `tbl_loan_assignee` inner join tbl_user on tbl_loan_assignee.assign_user_id = tbl_user.id WHERE $o_where ORDER BY id DESC LIMIT 1")->row_array();
        	   
        	       if(!empty($check_other['user_id'] == $user_id) && $check_other['assign_status'] == "overide")
        	       {
        	           $output = array(
        	                    'status' => '2',
        	                    'condition' => "overide_by_you"
        	           );
        	       }
        	       else if(!empty($check_other['user_id'] != $user_id) && $check_other['assign_status'] == "overide"){
        	           $output = array(
        	                    'status' => '3',
        	                    'condition' => "overide_by_other",
        	                    'user' => $check_other['user_name']
        	           );
        	           
        	       }
        	       else if(!empty($check_other['user_id'] != $user_id) && $check_other['assign_status'] == "assign_to_myself")
        	       {
        	           $output = array(
        	                    'status' => '5',
        	                    'condition' => "assign_by_other",
        	                    'user' => $check_other['user_name']
        	           );
        	       }
        	       else if(empty($check_other)){
        	           $output = array(
        	                    'status' => '4',
        	                    'condition' => "set_to_me"
        	           );
        	           
        	       }
        	       
        	   }
        	   
        	   echo json_encode($output);
	    }
	    
	    
	  }
	  
	  public function overideloan_to_user(){
	    $user_id = $this->session->userdata('id');
	    $result= array(
	                'loan_id' => $this->input->post('loan_id'),
	                'loan_type' => "credit_conso",
	                'assign_user_id'=>$user_id,
	                'assign_status'=>"overide",
	                'assign_remark'=>$this->input->post('override_reason'),
	                'assign_date' => DATETIME,
	                'created_by'=> $user_id
	        
	        );
	        
	        
	    $u_where = "loan_id = '".$result['loan_id']."' AND loan_type = 'credit_conso'";
	    $data =  array('currently_active' => "0");
	    $this->db->where($u_where);
	    $this->db->update('tbl_loan_assignee',$data);
	  
	   if($this->Common_model->insertRow('tbl_loan_assignee',$result))
	   {
	        $comnt = "R??assignee,Raison : ".$result['assign_remark'];

			$track_data =  array(
									'loan_id' => $result['loan_id'],
									'type'=> "overide",
									'product_type' => $result['loan_type'],
									'user_id' => $user_id,
									'comment' => $comnt,
									'content_type' => 'text'
			);

			$this->Common_model->insertRow('tbl_business_tracking_timeline',$track_data);
			
	       $this->session->set_flashdata("flash_message","R??assigner avec succ??s"); //Overided Successfully
    	   redirect('PP_FETES_A_LA_CARTE');
	   }
	        
	        
	}
	
	public function assign_attribuer(){
	    $loan_id = $this->input->post('loan_id');
	    $result  = $this->db->query("SELECT * FROM tbl_all_applications WHERE loan_id = '$loan_id' AND status = '1' AND loan_type='credit_conso' AND assigned_roles='2' ORDER BY app_id DESC LIMIT 1")->row_array();
	    
	    $user_id  = $this->session->userdata('id');
	    $user_data = $this->db->get_where('tbl_user',array('is_admin' =>$user_id))->row_array();
	    
	    $current_assign = $this->db->get_where('tbl_credit_conso_applicationloan',array('loan_id'=>$loan_id))->row_array();
	    
	    $account_data = $this->db->get_where('tbl_user',array('branch_id' => $user_data['branch_id'],'is_admin' => '2','deleted' => "0",'id !=' => $current_assign['user_id']))->result_array();
	    
	    if(!empty($account_data))
	    {
	        $option = "<option value=''>Select</option>"; 
	        foreach($account_data as $a){
	            $option .= "<option value='".$a['id']."'>".$a['first_name'].''.$a['last_name']."</option>"; 
	        }
	    }
	    else
	    {
	        $option = "<option value=''>Select</option>"; 
	    }
	    
	    if($result['review'] != '1')
	    {
	        $output = array(
	                    'status' => "1",
	                    'condition' => $option
	            );
	    }
	    else
	    {
	         $output = array(
	                    'status' => "2",
	                    'condition' => "processed"
	            );
	    }
	    
	    
	    echo json_encode($output);
	}
	
	public function update_assignee(){
	    $user_id = $this->session->userdata('id');
	    $result= array(
	                'loan_id' => $this->input->post('loan_id'),
	                'loan_type' => "credit_conso",
	                'assign_user_id'=>$this->input->post('userinfo'), // new account manager id
	                'assign_status'=>"assign_to_account_mgr",
	                'assign_remark'=>$this->input->post('addremark'),
	                'assign_date' => DATETIME,
	                'created_by' => $user_id,
	                'currently_active' => '0'
	        
	        );   
	        
	  // print_r($result);
	   
	   if($this->Common_model->insertRow('tbl_loan_assignee',$result))
	   {
	       $this->db->where('loan_id',$result['loan_id']);
	       $this->db->set('user_id',$result['assign_user_id']);
	       $this->db->update('tbl_credit_conso_applicationloan');
	       
	        $comnt = "Assignee Updated,Reason : ".$result['assign_remark'];

			$track_data =  array(
									'loan_id' => $result['loan_id'],
									'type'=>"assign_to_account_mgr",
									'product_type' => $result['loan_type'],
									'user_id' => $user_id,
									'second_userid' => $result['assign_user_id'],
									'comment' => $comnt,
									'content_type' => 'text'
			);

			$this->Common_model->insertRow('tbl_business_tracking_timeline',$track_data);
	       
	       //echo $this->db->last_query();
	       $this->session->set_flashdata("flash_message","Assign?? avec succ??s"); //Assigned Successfully
    	   redirect('PP_FETES_A_LA_CARTE');
	   }
	     
	}
	
	
	

        public function amortization_loan(){
    	$this->data['title'] = 'DCP - CREDIT CONSO TABLEAU AMORTISSEMENT';
    	$id=$this->uri->segment(3); //exit;
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_Post_temp_applicationform($id);
    	$this->data['testamortrecord']=$this->PP_Consumer_Loans_Model->test_amortization($id);
    	//echo "<pre>", print_r($this->data['amortrecord']), "</pre>"; exit;
    	$vat_on_interest=$this->data['amortrecord'][0]['tva'] + $this->data['amortrecord'][0]['css'];     	
    	$validate=$this->PP_Consumer_Loans_Model->check_amortization($id);
    	//echo $validate;
    	if($validate>0){
    		
    		//redirect('PP_Consumer_Loans/Creditloan');
    	} else{
    		
	    	if($this->data['amortrecord'][0]['loan_schedule']=='Monthly'){
				$year=($this->data['amortrecord'][0]['loan_term']/12);
			}else if($this->data['amortrecord'][0]['loan_schedule']=='Yearly'){
				$year=$this->data['amortrecord'][0]['loan_term'];
			}
			else if($this->data['amortrecord'][0]['loan_schedule']=='Half Yearly'){
				$year=$this->data['amortrecord'][0]['loan_term']/6;
			}
			else if($this->data['amortrecord'][0]['loan_schedule']=='Quarterly'){
				$year=$this->data['amortrecord'][0]['loan_term']/3;
			}
			$loan_interest =$this->data['amortrecord'][0]['loan_interest'];
			$rt=($loan_interest*(1+$vat_on_interest/100));
			$curd=date("Y-m-d", strtotime($this->data['amortrecord'][0]['created']));
			$amount=$this->data['amortrecord'][0]['loan_amt'];
			$rate=$rt;
			$years=$year;
	    	$am=new Class_Amort();
	    	$am->amort($amount,$rate,$years,$curd, $loan_interest);
	    	$return_arr=array();

	    	//echo "<pre>", print_r($am), "</pre>"; //exit;

	    	
	    	$return_arr1=array();
			$postyer=$am->years*12;
			$ebal = $am->amount;
			$ccint =0.0;
			$cpmnt = 0.0;
			$cdate=$am->cdate;
			$am->npmts;

			for ($i = 1; $i <= $am->npmts; $i++){
				$bbal = $ebal;    
			    $ipmnt = $bbal * $am->mrate;
			    $ppmnt = $am->pmnt - $ipmnt;
			    $ebal = $bbal - $ppmnt;
			    $ccint = $ccint + $ipmnt;
			    $cpmnt = $am->pmnt;
			    $pbint = $bbal*$am->postinterest/100/12;
			    $vbint = $pbint*19.25/100;
			    $months=$am->npmts;

				$row_array['Pmt'] = $i;					
				$row_array['bbegin_periode'] = $bbal; 
				$row_array['b_end_periode'] = $ebal;
				$row_array['principal_payment'] = $ppmnt; 
				$row_array['interest_paid_tax_incl'] = $ipmnt; 
				$row_array['interest_paid_befor_tax'] = $pbint; 
				$row_array['vat_on_interest'] = $vbint; 
				$row_array['monthly_payment'] = $cpmnt; 
				$row_array['month'] = date("m", strtotime( $cdate." +$i months"));
				$row_array['years'] = date("Y", strtotime( $cdate." +$i months"));		    	
		    	array_push($return_arr,$row_array);
		    }

				//echo "<pre>", print_r($return_arr),"</pre>"; exit;
				$databinding=json_encode($return_arr);
				//$amortizationdatabinding=json_encode($return_arr,JSON_PRETTY_PRINT);	
				//header('Content-Type: application/json');
				// echo "<pre>". $amortizationdatabinding."<pre>"."\n";
				//exit;
				$data = array(
					'applicationform_id'=>trim($this->data['amortrecord'][0]['aid']),
					'admin_id'=>$this->session->userdata('id'),						
		            'loan_type' =>trim($this->data['amortrecord'][0]['loan_type']),
		            'amount' =>$am->amount,
		            'interest' =>$am->postinterest,
		            'rate' =>$am->rate,
		            'years' =>$am->years,
		            'npmts' =>$am->npmts,
		            'mrate' =>$am->mrate,
		            'smrate' =>$am->smrate,
		            'tpmnt' =>$am->tpmnt,
		            'tint' =>$am->tint,
		            'pmnt' =>$am->pmnt,
		            'cdate' =>$am->cdate,
		            'databinding' => $databinding,
		            'activate'=>'active'
		        );
		       // echo "<pre>", print_r($data),"</pre>"; exit;
		    
			$this->PP_Consumer_Loans_Model->insertRow('consumer_amortization',$data);
		}    	
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;		
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/amortization', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
    }

	public function select($loan){

		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'Credit Conso';
		$this->data['loan'] =  $loan;

		// $this->data['product'] = "credit_conso";
		// $this->data['sub_product'] = $this->input->post('sub_product');
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
		$searchUser  =  ($this->input->post('searchUser')) ? ($this->input->post('searchUser')): ('');
		$searchUser  =  ($this->input->post('searchUser')) ? ($this->input->post('searchUser')): ('');
		$this->data['individual_details']=$this->Customer_Model->get_all_customers($searchUser);

		// Show Business Form 
		
		$this->data['addbussinessForm'] =  $this->load->view('customer/business_customerForm',$this->data,true);
		//$this->data['business_details'] = $this->Customer_Model->get_customer_branchwise('business');

		$this->render_template2('customer_product/credit_conso/select_customer2', $this->data);
	}

		public function check_single_loan(){
	    $customer_id = $this->input->post('customer_id');
		 $sub_product = $this->input->post('sub_product');
		 $customer_type  =  $this->input->post('type');
		 $loan_Id  =  $this->input->post('loan_id');
		 
		$this->db->select('g.loan_id');
		$this->db->from('tbl_credit_conso_applicationloan as g');
		
		$this->db->where('g.customer_id',$customer_id);
    	$result =  $this->db->get()->result_array();
    	if(empty($result)) {
    	    $response['success']=1;
    	    $response['arrayLoan']= $result;
            }else{
		     $response['success']=0;
    	    $response['arrayLoan']= $result;
		     
		 }
		 echo json_encode($response);
	}

		public function select_customer()
	{
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['branch_record']=$this->PP_Consumer_Loans_Model->get_All_branch();
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['bankdetails']=$this->PP_Consumer_Loans_Model->get_bankdetails();
		$this->data['title'] = 'DCP - Customer Verification';
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/consumerloans_select_customer', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}

	}


	/*--------------------------Save Both Customer and Business Loan ---------------------------*/

	public function save_customer_loan()
	{
		 $customer_id = $this->input->post('customer_id');
		 $sub_product = $this->input->post('sub_product');
		 $customer_type  =  $this->input->post('type');
		 $loan_Id  =  $this->input->post('loan_id');

		$res =  $this->Credit_Conso_Model->save_loan_application($customer_id,$sub_product,$customer_type,$loan_Id);
	}

	/*--------------------------Save Both Customer and Business Loan ---------------------------*/
	
	
	


	/*--------------------------start View Both Customer and Business Loan Details---------------*/

	public function customer_details($loan_id,$action){


		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'PP FETES A LA CARTE';
		$this->data['param'] = $action;
		
		// Loan Details
		$this->data['loan_details'] = $this->Credit_Conso_Model->get_single_loan_details($loan_id);
	//	print_r($this->data['loan_details']); die;
		
		if($action == "edit"){
		    
		   if($this->data['loan_details']['loanstatus'] == "0"){
		       $this->session->set_flashdata('error_message',"Annul?? Pr??t (<strong>Num??ro Demande:".$this->data['loan_details']['application_no']."</strong>)");
		       redirect("PP_FETES_A_LA_CARTE");
		   }
		   
		   $check_assigned_role = $this->Common_model->check_assignedrole_workflow('credit_conso',$this->data['record'][0]->is_admin,$loan_id);
		   if(empty($check_assigned_role)){
		       $this->session->set_flashdata('error_message',"Vous n'etes pas du Circuit de Validation (<strong>Num??ro Demande:".$this->data['loan_details']['application_no']."</strong>)");
		       redirect("PP_FETES_A_LA_CARTE");
		   }
		    
		   if($this->data['record'][0]->is_admin != '2')
		   {
		       $check_user = $this->db->query("SELECT tbl_loan_assignee.*,tbl_user.id as user_id,tbl_user.user_name,tbl_user.is_admin,tbl_user.type FROM `tbl_loan_assignee` inner join tbl_user on tbl_loan_assignee.assign_user_id = tbl_user.id WHERE loan_id = '$loan_id' AND loan_type='credit_conso' AND tbl_user.is_admin = '".$this->data['record'][0]->is_admin."'  AND currently_active = '1'")->row_array();
	            // print_r($check_other_user); die;  
    	       if(!empty($check_user) && $check_user['user_id'] != $this->data['record'][0]->id)
    	       {
    	           // Username is already assigned to this loan
    	           $this->session->set_flashdata('error_message',"La demande (<strong>Num??ro Demande:".$this->data['loan_details']['application_no']."</strong>) est d??j?? assign??e ?? ".$check_user['user_name']);
    	           redirect("PP_FETES_A_LA_CARTE");
    	       }
    	       else if(empty($check_user)){
    	           $this->session->set_flashdata('error_message',"Personne n'est affect?? ?? ce pr??t (<strong>Num??ro Demande:".$this->data['loan_details']['application_no']."</strong>)"); //No one is assigned to this loan 
    	           redirect("PP_FETES_A_LA_CARTE");
    	       }
		   }
		  
		}

		
		
		$this->data['loan_count'] = $this->Credit_Conso_Model->get_number_of_loans($this->data['loan_details']['customer_id']);
	    $d_where  =  array('loan_id' => $loan_id,'loan_type' => "credit_conso",'assigned_roles' => $this->data['record'][0]->is_admin,'status' => "1");
		$this->data['current_user_decision'] = $this->Common_model->getRecord('tbl_all_applications','',$d_where);
		$this->data['loan_overallstatus'] = $this->Credit_Conso_Model->get_overall_loan_status($loan_id);
		$this->data['decision_rec'] =  $this->Credit_Conso_Model->get_approval_decision_details($loan_id,"credit_conso");
		
		$amort_where  = array('applicationform_id' => $this->data['loan_details']['loan_id_temp']);
		$amortization =  $this->Common_model->getRecord('tbl_consumer_amortization','',$amort_where);
		$this->data['loan_databinding'] = json_decode($amortization['databinding']);


		$this->data['customer'] = json_decode($this->data['loan_details']['customer_data']);
		$this->data['officer'] = json_decode($this->data['loan_details']['officer_data']);
		$this->data['risk_analysis'] =  $this->Credit_Conso_Model->get_risk_analysis_details($loan_id);
	//	$this->data['risk_analysis_facility'] =  $this->Credit_Conso_Model->get_risk_analysis_facility($loan_id);
		$this->data['tracking_timeline'] =  $this->Credit_Conso_Model->get_tracking_details($loan_id);
		$this->data['history_interaction'] =  $this->Credit_Conso_Model->get_interaction_history($loan_id);

		$this->data['collateral']=$this->Credit_Conso_Model->get_collateral($loan_id);
		$this->data['collateral_vehicule']=$this->Credit_Conso_Model->get_collateral_vehicule($loan_id);
		$this->data['collateral_deposit']=$this->Credit_Conso_Model->get_collateral_deposit($loan_id);
		$this->data['collateral_maison']=$this->Credit_Conso_Model->get_collateral_maison($loan_id);
		$this->data['collateral_excemption']=$this->Credit_Conso_Model->get_collateral_excemption($loan_id);


		$this->data['riskcurrentmonthlyvrefit']=$this->Credit_Conso_Model->get_current_monthly_credit($loan_id);
		$this->data['riskpaymentnewloan']=$this->Credit_Conso_Model->get_monthly_payment_new_loan($loan_id);
		$this->data['riskfsituation']=$this->Credit_Conso_Model->get_financial_situation($loan_id);
		// print_r($this->data['riskfsituation']);
		// die;


		$cad_where =  array('loan_id'=>$loan_id);
		$this->data['agcdecisionform'] =  $this->Common_model->getRecord('tbl_customer_cad_decision_form_n','',$cad_where);

		
		// Master details
		$this->data['product_tabs'] =  $this->Setting_Model->get_saved_product_tab_consumer($this->data['loan_details']['product_tab_data']);

		if(isset($this->data['customer']->branch)){

			$this->data['customer_branch'] =  $this->Admin_Model->get_branch_details($this->data['customer']->branch);
		}
		else
		{
			$this->data['customer_branch'] =  $this->Admin_Model->get_branch_details($this->data['customer']->branch_id);
		}

		
		$this->data['documents'] =  $this->Credit_Conso_Model->get_saved_documents($loan_id);
		$this->data['secteurs']=$this->Secteur_Model->get_all_secteurs();
		$this->data['employers'] =  $this->Employer_Model->get_all_employers();
		$this->data['cat_emp']=$this->EmployeeCategory_Model->get_all_categories();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['nationality'] =  $this->Common_model->get_all_nationalities();
		$this->data['branch_record']=$this->PP_Consumer_Loans_Model->get_All_branch();

		
		
		if($this->data['loan_details']['customer_type'] == "1")
		{
			$this->render_template2('customer_product/credit_conso/customer_details', $this->data);
		}
		else
		{

			$this->render_template2('customer_product/credit_conso/business_details', $this->data);
		}
		

	}

	/*--------------------------End View Both Customer and Business Loan Details-----------------*/


	public function edit_loan(){    	
    	
    	$loan_id = $this->input->post('loan_id');

		$id=$this->input->post('loan_id_temp'); //exit;
		$loan_amount  = $this->input->post('loan_amt');
		$loan_term  = $this->input->post('loan_term');
		$loan_object =  $this->input->post('loan_object');

		$check_amort =$this->PP_Consumer_Loans_Model->get_Post_temp_applicationform($id);
		$risk_analysis = $this->Credit_Conso_Model->get_risk_analysis_details($loan_id);
            
        if($risk_analysis['average_residual_salary']){
            $avg_amount = $this->Common_model->get_maximum_salary_residuel($risk_analysis['average_residual_salary']);
            if($loan_amount > $avg_amount){
               echo "Droit de credit maximun XAF ".$avg_amount;
               exit; 
            }
            if(floatval($loan_amount) < 300000){
                echo "Le montant doit ??tre sup??rieur ?? 300 000";
                die;
            }
            if(floatval($loan_amount) > 1500000){
                echo "Le montant doit ??tre inf??rieur ?? 1 500 000";
                die;
            } 
        }
        else{
            if(floatval($loan_amount) < 300000){
                echo "Le montant doit ??tre sup??rieur ?? 300 000";
                die;
            }
            if(floatval($loan_amount) > 1500000){
                echo "Le montant doit ??tre inf??rieur ?? 1 500 000";
                die;
            } 
        }
            
            
		if($check_amort[0]['loan_amt'] == $loan_amount && $check_amort[0]['loan_term'] == $loan_term)
		{
			$updatedata = array(
					'loan_object' => $loan_object
			);

			$this->Common_model->updateRow('tbl_temp_consumer_applicationform','aid',$id,$updatedata);
			echo 'OBJECTIF DU FINANCEMENT mis ?? jour';
		}
		else
		{ 
			$updatedata = array(
					'loan_amt' => $loan_amount,
					'loan_term' => $loan_term,
					'loan_object' => $loan_object
			);

			$this->Common_model->updateRow('tbl_temp_consumer_applicationform','aid',$id,$updatedata);


	    	$this->data['record']=$this->Common_model->get_admin_details(1);
	   		$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_Post_temp_applicationform($id);
	    	$this->data['testamortrecord']=$this->PP_Consumer_Loans_Model->test_amortization($id);
	    	//echo "<pre>", print_r($this->data['amortrecord']), "</pre>"; exit;
	    	$vat_on_interest=$this->data['amortrecord'][0]['loan_tax'] ?: '19.25';    	
	    	$this->data['tax_interest']= $this->data['amortrecord'][0]['tva'];
	    	$this->data['css_value']= $this->data['amortrecord'][0]['css'];


    		
	    	if($this->data['amortrecord'][0]['loan_schedule']=='Monthly'){
				$year=($this->data['amortrecord'][0]['loan_term']/12);
			}else if($this->data['amortrecord'][0]['loan_schedule']=='Yearly'){
				$year=$this->data['amortrecord'][0]['loan_term'];
			}
			else if($this->data['amortrecord'][0]['loan_schedule']=='Half Yearly'){
				$year=$this->data['amortrecord'][0]['loan_term']/6;
			}
			else if($this->data['amortrecord'][0]['loan_schedule']=='Quarterly'){
				$year=$this->data['amortrecord'][0]['loan_term']/3;
			}
			$loan_interest =$this->data['amortrecord'][0]['loan_interest'];
			$rt=($loan_interest*(1+$vat_on_interest/100));
			$curd=date("Y-m-d", strtotime($this->data['amortrecord'][0]['created']));
			$amount=$this->data['amortrecord'][0]['loan_amt'];
			$rate=$rt;
			$years=$year;
	    	$am=new Class_Amort();
	    	$am->amort($amount,$rate,$years,$curd, $loan_interest,$this->data['tax_interest'],$this->data['css_value'],'','','');
	    	$return_arr=array();

	    	//echo "<pre>", print_r($am), "</pre>"; //exit;

	    	
	    	$return_arr1=array();
			$postyer=$am->years*12;
		    $ebal = $am->amount;
			$ccint =0.0;
			$cpmnt = 0.0;
			$cdate=$am->cdate;
			$am->npmts;

			for ($i = 1; $i <= $am->npmts; $i++){
				$bbal = $ebal;    
			    $ipmnt = $bbal * $am->mrate;
			    $ppmnt = $am->pmnt - $ipmnt;
			    $ebal = $bbal - $ppmnt;
			 //   echo $ebal;
			    $ccint = $ccint + $ipmnt;
			    $cpmnt = $am->pmnt;
			    $pbint = $bbal*$am->postinterest/100/12;
			    $vbint = $pbint*19.25/100;
			    //$vbint = $pbint*$vat_on_interest/100;
			    $months=$am->npmts;

				$row_array['Pmt'] = $i;					
				$row_array['bbegin_periode'] = $bbal; 
				$row_array['b_end_periode'] = $ebal;
				$row_array['principal_payment'] = $ppmnt; 
				$row_array['interest_paid_tax_incl'] = $ipmnt; 
				$row_array['interest_paid_befor_tax'] = $pbint; 
				$row_array['vat_on_interest'] = $vbint; 
				$row_array['monthly_payment'] = $cpmnt; 
				$row_array['month'] = date("m", strtotime( $cdate." +$i months"));
				$row_array['years'] = date("Y", strtotime( $cdate." +$i months"));		    	
		    	array_push($return_arr,$row_array);
		    }

				//echo "<pre>", print_r($return_arr),"</pre>"; exit;
				$databinding=json_encode($return_arr);
				//$amortizationdatabinding=json_encode($return_arr,JSON_PRETTY_PRINT);	
				//header('Content-Type: application/json');
				// echo "<pre>". $amortizationdatabinding."<pre>"."\n";
				//exit;
				$data = array(
					'applicationform_id'=>trim($this->data['amortrecord'][0]['aid']),
					'admin_id'=>$this->session->userdata('id'),						
		            'loan_type' =>trim($this->data['amortrecord'][0]['loan_type']),
		            'amount' =>$am->amount,
		            'interest' =>$am->postinterest,
		            'rate' =>$am->rate,
		            'years' =>$am->years,
		            'npmts' =>$am->npmts,
		            'mrate' =>$am->mrate,
		            'smrate' =>$am->smrate,
		            'tpmnt' =>$am->tpmnt,
		            'tint' =>$am->tint,
		            'pmnt' =>$am->pmnt,
		            'cdate' =>$am->cdate,
		            'databinding' => $databinding,
		            'activate'=>'active'
		        );
		       // echo "<pre>", print_r($data),"</pre>"; exit;
		    
		   $edit =  $this->Common_model->updateRow('consumer_amortization','applicationform_id',trim($this->data['amortrecord'][0]['aid']),$data);
		   
		     $monthly_payment = round($am->pmnt);
		   $risk_analysis = $this->db->get_where('tbl_credit_conso_risk_analysis',array('loan_id'=>$loan_id))->row_array();
		   
		   if(empty($risk_analysis['coefficient_rembursement']))
		   {
		       
		       $record[] =  array(
							'rem' => $monthly_payment,
							'mois' => $loan_term,
							'ans' => $monthly_payment * $loan_term
			);
			
			    $total_rem = $monthly_payment * $loan_term;

		   }
		   else{
		       $rem_arr = json_decode($risk_analysis['coefficient_rembursement']);
		       
		       if(count($rem_arr) == 0)
		       {
		            $record[] =  array(
							'rem' => $monthly_payment,
							'mois' => $loan_term,
							'ans' => $monthly_payment * $loan_term
			        );
			        
			        $total_rem = $monthly_payment * $loan_term;
		       }
		       else{
		           
		           unset($rem_arr[0]);
		           
		           $record[] =  array(
							'rem' => $monthly_payment,
							'mois' => $loan_term,
							'ans' => $monthly_payment * $loan_term
			        ); 
		           $total_rem = $monthly_payment * $loan_term;
    		       foreach($rem_arr as $r){
    		           $total_rem += intval($r->ans);
    		           
    		           $record[] =  array(
							'rem' => $r->rem,
							'mois' =>$r->mois,
							'ans' => $r->ans
			            ); 
    		       } 
		       }
		   }
		   
		   if(empty($risk_analysis['coefficient_salary']))
		   {
		       $total_salary = 0;
		   }
		   else{
		       $sal_arr = json_decode($risk_analysis['coefficient_salary']);
		       $total_salary = 0;
		       foreach($sal_arr as $s){
		           $total_salary += intval($s->ans);
		       }
		       
		   }
		   
		   if($total_rem != 0 && $total_salary != 0)
            {
    		    $c = ($total_rem / $total_salary) * 100;
    	       $updata['coefficient_score'] = number_format((float)$c, 2, '.', '');  
            }
		   
		   $updata['coefficient_rembursement'] = json_encode($record);
		   
		    $this->Common_model->updateRow('tbl_credit_conso_risk_analysis','loan_id',$loan_id,$updata);
		   
			$history_arr=array(
				"loan_id" =>$this->input->post('loan_id'),
				"user_id" =>$this->session->userdata('id'),				
				"comment" =>"Amortissement mis ?? jour ",
				"product_type"=>"credit_conso",			
				"created_at" =>date('Y-m-d H:i:s')
			);
			$this->Common_model->insertRow('business_tracking_timeline',$history_arr);
	        if($edit){
	        	echo '1';
	        }

	 	}
		

        
	        
    }

    public function riskanalysis_current_monthly_credit()
	{
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_current_monthly_credit($this->input->post('cl_aid'));
		// print_r($this->input->post());
		// die;
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>1,
			
			'montant_encours_externe' => $this->input->post('extreme'),
			'montant_encours_interne' => $this->input->post('interne'),
			'total_clc' => $this->input->post('total_clc'),

			'Salaire1' => $this->input->post('Salaire1'),
			'Salaire2' => $this->input->post('Salaire2'),
			'Salaire3' => $this->input->post('Salaire3'),
			'Ttotal2' => $this->input->post('Ttotal2'),
			'salaryAnnual' => $this->input->post('salaryAnnual'),
			'score' => $this->input->post('score'),

			
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Consumer_Loans_Model->updateRow('riskanalysis_current_monthly_credit', 'rcic_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis_current_monthly_credit',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}			
	}

	    public function riskanalysis_current_monthly_credit2()
	{
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_current_monthly_credit($this->input->post('cl_aid'));
		// print_r($this->input->post());
		// die;
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>1,
			'dateRetirement' => date("Y-m-d", strtotime($this->input->post('dateRetirement'))),
		
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Consumer_Loans_Model->updateRow('riskanalysis_current_monthly_credit', 'rcic_id', $recordcheck,$data);
			if($edit){
				echo $this->db->last_query();
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis_current_monthly_credit',$data);
			if($add){
				
				echo 1;
			}else{
				echo 0;
			}
		}			
	}

	    public function riskanalysis_current_monthly_credit3()
	{
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_current_monthly_credit($this->input->post('cl_aid'));
		// print_r($this->input->post());
		// die;
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>1,
			'creditencour' => $this->input->post('creditencour'),
			'loanannual' => $this->input->post('loanannual'),
			'score' => $this->input->post('score3'),
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Consumer_Loans_Model->updateRow('riskanalysis_current_monthly_credit', 'rcic_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis_current_monthly_credit',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}			
	}
	
	public function riskanalysis_monthly_payment_new_loan()
	{
		//echo "<pre>", print_r($_POST),"</pre>";exit;		
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_monthly_payment_new_loan($this->input->post('rcapid'));
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('rcapid')),
			
			'loan_type' => $this->input->post('loan_type'),
			'section'=>2,
			'cresco'=> $this->input->post('cresco_monthly'),
			'decouvert' => $this->input->post('decouvert_monthly'),
			'cmt' => $this->input->post('cmt_monthly'),
			'cct' => $this->input->post('cct_monthly'),
			'total_mlc' => $this->input->post('total_mlc'),
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Consumer_Loans_Model->updateRow('riskanalysis_monthly_payment_new_loan', 'rmic_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis_monthly_payment_new_loan',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}	
		// echo $this->db->last_query();	
	}
	
	public function riskanalysis_financial_situation()
	{
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_financial_situation($this->input->post('cl_aid'));	


		$situation_total=isset($situation_total)?$situation_total:NULL;
		$income_ratio_after=isset($income_ratio_after)?$income_ratio_after:NULL;
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
			
			'loan_type' => $this->input->post('loan_type'),
			'section'=>2,
			'net_salary'=> $this->input->post('net_salary'),
			'income_ratio' => $this->input->post('income_ratio'),
			'quotitecessible' => $this->input->post('quotitecessible'),
			'current_monthly_payments' => $this->input->post('current_monthly_payments'),
			'new_monthly_payment' => $this->input->post('new_monthly_payment'),
			'situation_total' => $this->input->post('situation_total'),
			'income_ratio_after' =>$this->input->post('income_ratio_after'),
			'coeficientendettement' => $this->input->post('coeficientendettement'),
		);
		if(!empty($recordcheck)){
				$edit=$this->PP_Consumer_Loans_Model->updateRow('riskanalysis_financial_situation', 'rfs_id', $recordcheck,$data);
			if($edit){
				echo $this->db->last_query();;
			}else{
				echo $this->db->last_query();;
			}
		}else{
			$add=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis_financial_situation',$data);
			if($add){
				echo $this->db->last_query();;
			}else{
				echo $this->db->last_query();;
			}
		}
	}

		 /*Collateral Section*/

    public function uploadfile_collateral_vehicule()
	{		

		// print_r($_POST['loan_id']);
		// die;
		 if($_FILES["files"]["name"] != '')
			  {
			   $output='';
				$return_arr = array();			   
			   $config["upload_path"] = './assets/collateral/vehicule/';
			   //$config["allowed_types"] = 'pdf|doc|docx|jpg|png|jpeg|jpe|xml';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   /*$ext=preg_replace("/.*\.([^.]+)$/","\\1", $_FILES['files']['name']);
			   $fileType=$_FILES['userfile']['type'];
			   $config['allowed_types']= $ext.'|'.$fileType;*/

			   
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
				
				$this->form_validation->set_error_delimiters('<p>', '</p>');
				$this->form_validation->set_rules('vehicule_type','Type', 'required');
				$this->form_validation->set_rules('vehicule_marque','Marque', 'required');
				$this->form_validation->set_rules('vehicule_modele','Mod??le', 'required');
				$this->form_validation->set_rules('vehicule_carte_grise','Carte Grise', 'required');
				$this->form_validation->set_rules('vehicule_style','Style', 'required');
				$this->form_validation->set_rules('vehicule_annee','Ann??e', 'required');
				$this->form_validation->set_rules('vehicule_kilometrage','Kilom??trage', 'required');
				//$this->form_validation->set_rules('vehicule_commentaire','Commentaire', 'required');
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}else{
					sleep(1);
					$data= array(
						'cl_aid'=>$_POST['loan_id'],
						'admin_id'=>trim($this->session->userdata('id')),						
						'customer_id'=>$this->input->post('vcustomar_id'),
						'selected_field'=>trim($this->input->post('collateraltype')),
						'v_type'=>$this->input->post('vehicule_type'),
						'v_marque'=>$this->input->post('vehicule_marque'),
						'v_modele'=>$this->input->post('vehicule_modele'),
						'v_carte_grise'=>$this->input->post('vehicule_carte_grise'),
						'v_style'=>$this->input->post('vehicule_style'),
						'v_annee'=>$this->input->post('vehicule_annee'),
						'v_kilometrage'=>$this->input->post('vehicule_kilometrage'),
						'v_commentaire'=>$this->input->post('vehicule_commentaire'),
						'loan_type'=>2,
						'section'=>2,
					);
					$getid=$this->Common_model->insertRow('collateral',$data);
					if($getid){			   
						for($count =0; $count<$filesCount; $count++)
						{
							$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
							$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
							$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
							$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
							$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
							if(!$this->upload->do_upload('file'))
							{

								$output=array('error' => $this->upload->display_errors('', ''));
					}else{
						$filename = $this->upload->data();
							$filedata= array(
								'collateral_id'=>$getid,						
								'file_name'=>$filename['file_name'],
								'file_type'=>$filename['file_type'],
								'file_path'=>$filename['file_path'],
								'full_path'=>$filename['full_path'],
								'raw_name'=>$filename['raw_name'],
								'orig_name'=>$_FILES["files"]['name'][$count],
								'client_name'=>$filename['client_name'],
								'file_extension'=>$filename['file_ext'],
								'file_size'=>$filename['file_size'],
								'loan_type'=>2,
								'section'=>2,
							);			
							$rsid=$this->Common_model->insertRow('collateral_files',$filedata);
							$details="Collateral V??hicule ".$filesCount." file upload.";
							$history_arr=array(
								"cl_aid" =>$_POST['loan_id'],
								"admin_id" =>$this->session->userdata('id'),
								"customar_id" =>$this->input->post('vcustomar_id'),
								"loan_type"=>2,
								"comment" =>$details,			
								"created" =>date('Y-m-d H:i:s')
							);
							$this->Common_model->insertRow('tracking_timeline',$history_arr);
							$output=array('success' => $filesCount." files successfully upload.");
							}
						}
					}
			   }			   
			   echo json_encode($output);
			  }
		
	}
	public function uploadfile_collateral_deposit()
	{
		if($_FILES["files"]["name"] != '')
			{
			   $output = '';
			   $config["upload_path"] = './assets/collateral/deposit/';
			   //$config["allowed_types"] = 'pdf|doc|docx|jpg|png|jpeg|jpe|xml|JPG|PNG';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = TRUE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;

			   //$this->_file_mime_type($_FILES[$field]); var_dump($this->file_type); die();

			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
			   
				$this->form_validation->set_error_delimiters('<p>', '</p>');
				$this->form_validation->set_rules('d_numero_de_compte','Num??ro de compte', 'required');
				$this->form_validation->set_rules('d_montant','Montant', 'required');
				
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}else{
				sleep(1);					
						$data= array(
							'cl_aid'=>$_POST['loan_id'],
							'admin_id'=>trim($this->session->userdata('id')),						
							'customer_id'=>$this->input->post('customar_id'),
							'selected_field'=>trim($this->input->post('collateraltype')),					
							'd_numero_de_compte'=>$this->input->post('d_numero_de_compte'),
							'd_montant'=>$this->input->post('d_montant'),
							'loan_type'=>2,
							'section'=>2,
						);
						$getid=$this->Common_model->insertRow('collateral',$data);
						if($getid){			   
						   for($count =0; $count<$filesCount; $count++)
						   {
							$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
							$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
							$_FILES["file"]["tmp_name"] =$_FILES["files"]["tmp_name"][$count];
							$_FILES["file"]["error"] =$_FILES["files"]["error"][$count];
							$_FILES["file"]["size"] =$_FILES["files"]["size"][$count];
							if(!$this->upload->do_upload('file'))
							{
								//var_dump($_FILES["files"]);exit;
								$output= array('error' => $this->upload->display_errors());
							}else{
								$filename = $this->upload->data();
								$filedata= array(
									'collateral_id'=>$getid,						
									'file_name'=>$filename['file_name'],
									'file_type'=>$filename['file_type'],
									'file_path'=>$filename['file_path'],
									'full_path'=>$filename['full_path'],
									'raw_name'=>$filename['raw_name'],
									'orig_name'=>$_FILES["files"]['name'][$count],
									'client_name'=>$filename['client_name'],
									'file_extension'=>$filename['file_ext'],
									'file_size'=>$filename['file_size'],
									"section"=>1,
									'loan_type'=>2,							
								);											
								$rsid=$this->Common_model->insertRow('collateral_files',$filedata);
								$details="Collateral D??posit ".$filesCount." files upload.";
								$history_arr=array(
									"cl_aid" =>$_POST['loan_id'],
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>2,
									"comment" =>$details,			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->Common_model->insertRow('tracking_timeline',$history_arr);
									$output=array('success' => $filesCount." files successfully upload.");
									}
								}
						   }
				}			   
			   echo json_encode($output); 			   
			}
		}

		public function uploadfile_collateral_maison()
		{
		 if($_FILES["files"]["name"] != '')
			{
			   $output = '';
			   $config["upload_path"] = './assets/collateral/maison/';
			   //$config["allowed_types"] = 'pdf|doc|docx|jpg|png|jpeg|xml';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
			   
			   $this->form_validation->set_error_delimiters('<p>', '</p>');
				$this->form_validation->set_rules('m_type_de_proprietaire','Type de propri??taire', 'required');
				$this->form_validation->set_rules('m_etatde_maison','Etat de la maison', 'required');
				$this->form_validation->set_rules('m_annee_construction','Ann??e de construction', 'required');
				$this->form_validation->set_rules('m_nombre_de_piece','Nombre de pi??ce', 'required');
				$this->form_validation->set_rules('m_adresse','Adresse', 'required');
				$this->form_validation->set_rules('m_titre_foncier','Titre foncier', 'required');
				$this->form_validation->set_rules('m_superficie','Superficie', 'required');
				//$this->form_validation->set_rules('m_commentaire','Commentaire', 'required');
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}
				else
				{
				sleep(2);
					$data= array(
						'cl_aid'=>$_POST['loan_id'],
						'admin_id'=>trim($this->session->userdata('id')),						
						'customer_id'=>$this->input->post('customar_id'),
						'selected_field'=>trim($this->input->post('collateraltype')),
						'm_type_de_proprietaire'=>trim($this->input->post('m_type_de_proprietaire')),
						'm_etatde_maison'=>trim($this->input->post('m_etatde_maison')),
						'm_annee_construction'=>trim($this->input->post('m_annee_construction')),
						'm_nombre_de_piece'=>trim($this->input->post('m_nombre_de_piece')),
						'm_adresse'=>trim($this->input->post('m_adresse')),
						'm_titre_foncier'=>trim($this->input->post('m_titre_foncier')),
						'm_superficie'=>trim($this->input->post('m_superficie')),
						'm_commentaire'=>trim($this->input->post('m_commentaire')),
						'section'=>2,
						'loan_type'=>2,
					);	   
					$getid=$this->Common_model->insertRow('collateral',$data);
					if($getid)
					{			   
						for($count =0; $count<$filesCount; $count++)
						{
							$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
							$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
							$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
							$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
							$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
							if(!$this->upload->do_upload('file'))
							{
								$output= array('error' => $this->upload->display_errors());
							}
							else{
								$filename = $this->upload->data();
									$filedata= array(
										'collateral_id'=>$getid,						
										'file_name'=>$filename['file_name'],
										'file_type'=>$filename['file_type'],
										'file_path'=>$filename['file_path'],
										'full_path'=>$filename['full_path'],
										'raw_name'=>$filename['raw_name'],
										'orig_name'=>$_FILES["files"]['name'][$count],
										'client_name'=>$filename['client_name'],
										'file_extension'=>$filename['file_ext'],
										'file_size'=>$filename['file_size'],
										'section'=>2,
										'loan_type'=>2,							
									);			
								$rsid=$this->Common_model->insertRow('collateral_files',$filedata);
								$details="Collateral Maison ".$filesCount." files upload.";
								$history_arr=array(
									"cl_aid" =>$_POST['loan_id'],
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>2,
									"comment" =>$details,			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->Common_model->insertRow('tracking_timeline',$history_arr);
								$output=array('success' => $filesCount." files successfully upload.");
							}
						}
					}
				}
				echo json_encode($output); 
			}
	}
	
	public function uploadfile_collateral_excemption()
	{
		sleep(1);
		if($_FILES["files"]["name"] != '')
		{
			$output = '';
			$config["upload_path"] = './assets/collateral/excemption';
			//$config["allowed_types"] = 'pdf|doc|docx|jpg|png|jpeg|xml';
			$config["allowed_types"] = '*';
			$config['max_size'] = '0';
			$config['encrypt_name'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['file_ext_tolower'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$filesCount = count($_FILES['files']['name']);
			$data= array(
				'cl_aid'=>$_POST['loan_id'],
				'admin_id'=>trim($this->session->userdata('id')),
				'customer_id'=>trim($this->input->post("customar_id")),	
				'selected_field'=>trim($this->input->post('collateraltype')),
				'section'=>2,
				'loan_type'=>2,
			);
			$getid=$this->Common_model->insertRow('collateral',$data);
			if($getid)
			{
			   for($count =0; $count<$filesCount; $count++)
			   {
					$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
					$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
					$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
					$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
					$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if(!$this->upload->do_upload('file'))
				{
					$output= array('error' => $this->upload->display_errors());
				}else{
					$filename = $this->upload->data();
					$filedata= array(
						'collateral_id'=>$getid,						
						'file_name'=>$filename['file_name'],
						'file_type'=>$filename['file_type'],
						'file_path'=>$filename['file_path'],
						'full_path'=>$filename['full_path'],
						'raw_name'=>$filename['raw_name'],
						'orig_name'=>$_FILES["files"]['name'][$count],
						'client_name'=>$filename['client_name'],
						'file_extension'=>$filename['file_ext'],
						'file_size'=>$filename['file_size'],
						'section'=>2,
						'loan_type'=>2,							
					);
					$rsid=$this->Common_model->insertRow('collateral_files',$filedata);
					$details="Collateral Excemption ".$filesCount." files upload.";
					$history_arr=array(
						"cl_aid" =>$_POST['loan_id'],
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>$this->input->post('customar_id'),
						"loan_type"=>2,
						"comment" =>$details,			
						"created" =>date('Y-m-d H:i:s')
					);
					$this->Common_model->insertRow('tracking_timeline',$history_arr);
					$output=array('success' => $filesCount." files successfully upload.");
					}
				}
			}			  
			echo json_encode($output); 			   
		}
	}
	public function collateral_preview()
	{	
		$html ='';
		//sleep(2);
		$collateralfiles=$this->Credit_Conso_Model->get_collateralFiles($this->input->post('id'));
		//echo "<pre>", print_r($collateralfiles),"</pre>";
		//exit;
		if(!empty($collateralfiles[0]["selected_field"])){
			$displaydata=$collateralfiles[0]["selected_field"];
		}else{
			$displaydata='';
		}
			
			$html .='<div class="modal-header">';
			$html .='<button type="button" class="close" data-dismiss="modal">&times;</button>';
			$html .='<h4 class="modal-title heading lead">'.$displaydata.' Documents</h4>';
			$html .='</div>';
			$html .='<div class="modal-body">';
			$html .='<ul class="list-group">';
			$i=1;
			if(!empty($collateralfiles)){
				foreach($collateralfiles AS $files){				
					$html .='<li class="list-group-item alert alert-success">';
							if($files['file_extension']=='.pdf'){
								$html .='<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
							}else if($files['file_extension']=='.docx' || $files['file_extension']=='.doc'){
								$html .='<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
							}
							else if($files['file_extension']=='.jpeg' || $files['file_extension']=='.jpg' || $files['file_extension']=='.png'){
								$html .='<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
							}
						 $html .=$i."-". ucwords($files['orig_name']);
					$html .='</li>';			
				$i++;
			 }
			}
			$html .='</ul>';
			$html .='</div>';
			$html .='<div class="modal-footer">';
			$html .='<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button>';
			$html .='</div>';	
		
		echo $html;		
	}


	public function download_collateralvehicule(){
		$createdzipsystemdocs = 'collateral.vehicule';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->Credit_Conso_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/vehicule/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	public function download_collateraldeposit(){
		$createdzipsystemdocs = 'collateral.deposit';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->Credit_Conso_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/deposit/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	public function download_collateralmaison(){
		$createdzipsystemdocs = 'collateral.maison';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->Credit_Conso_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/maison/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	public function download_collateralexcemption(){
		$createdzipsystemdocs = 'collateral.excemption';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->Credit_Conso_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/excemption/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}

//Document System forms---- COONVENTION DE CREDIT
		public function promissory_note()
	{
	    error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_promissory_note_form($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		//$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}
	public function	generate_promissory_note_form($id)
	{
		
		//error_reporting(0);
		//echo $id; exit;
		$this->data['appformD']=$this->Credit_Conso_Model->get_single_loan_details($id);

		// print_r($this->data['appformD']);
		// die;
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		// $this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		// $this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		// $this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		// $this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		// $this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		// $this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		// $this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->Credit_Conso_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->Credit_Conso_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->Credit_Conso_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		
		return  $this->load->view('superadmin/atlantique_preet_scolaire_formulaire_en_anglais',$this->data,true);
	
	}

	// Documet BILLET DE ORDER

		public function billetaorder()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_Billet_a??_Ordre_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		 
	}

		public function generate_Billet_a??_Ordre_Credit_Scolaire($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->Credit_Conso_Model->get_single_loan_details($id);
		//print_r($this->data['appformD']);
// 		$customerID=$this->data['appformD'][0]['customar_id'];
// 		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
// 		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
// 		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
// 		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
// 		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
// 		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
// 		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
// 		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
// 		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
// 		// $this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
// 		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

	
// 		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
// 		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
// 		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
// 		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/BilletOrdre',$this->data,true);
	}

	// MEMO DE MISE EN PLACE

		public function tegForm()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_memo_of_setting_up_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		 
	}

		public function generate_memo_of_setting_up_Credit_Scolaire($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->Credit_Conso_Model->get_single_loan_details($id);
		$this->data['loan_type']='credit_conso';
		
// 		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
// 		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
// 		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
// 		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
// 		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
// 		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
// 		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
// 		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
// 		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
// 		// $this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
// 		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);


		
// 		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
// 		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
// 		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
// 		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/tegForm',$this->data,true);
	}

	/*System Docs CAUTION SCOLAIR ET PERSONEL*/
	public function assurance()	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);
		$getHtmlagreement=$this->generate_credit_agreement_form($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		//$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}
	public function generate_credit_agreement_form($id)
	{
		$this->data['appformD']=$this->Credit_Conso_Model->get_single_loan_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		// $this->data['riskcurrentmonthlyvrefit']=$this->Credit_Conso_Model->get_current_monthly_credit($id);
		// $this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		// $this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		// $this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		// $this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		// $this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		// $this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		// $this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		// $this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		// $this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		// // $this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		// $this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		

		// $this->data['c_loan']=$this->PP_Consumer_Loans_Model->get_amortization_record($id);
		
		// $this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		// $this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		// $this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		// $this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/assurance',$this->data,true);
	}
	

	// Document System FORMULAIRE ADHESION AU FOND DE GARANTIE

	public function empruteurs()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_formulaire_adhesion_aufoud_de_grantie_credit_scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
	}

	public function generate_formulaire_adhesion_aufoud_de_grantie_credit_scolaire($id)
	{
		error_reporting(0);
		$this->data['appformD']=$this->Credit_Conso_Model->get_single_loan_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		// $this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		// $this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		// $this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		// $this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		// $this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		// $this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		// $this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);

		$this->data['c_loan']=$this->PP_Consumer_Loans_Model->get_amortization_record($id);
				
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/empruteurs',$this->data,true);
	}

	// Document System FORMULAIRE DE DEMANDE CREDIT

		public function decision()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);
		$getHtmlagreement=$this->generate_formulaire_de_demande_credit_scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
	}


		public function generate_formulaire_de_demande_credit_scolaire($id)
	{
		error_reporting(0);
		$this->data['appformD']=$this->Credit_Conso_Model->get_single_loan_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['risk_analysis'] =  $this->Credit_Conso_Model->get_risk_analysis_details($id);
		// $this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		// $this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		// $this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		// $this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		// $this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		// $this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		// $this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		// $this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		// $this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		// // $this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		// $this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		// $this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		// $this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		// $this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		// $this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		// $this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		// $this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->Credit_Conso_Model->get_current_monthly_credit($id);
		// $this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		// $this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		// $this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/decision',$this->data,true);
	}


	

	public function download_credit_agreement_form()
	{
	    error_reporting(0);
		$segmentid=$this->uri->segment(3);	

		$this->data['appformD']=$this->Credit_Scolair_Model->get_single_loan_details($segmentid);
		$customerID=$this->data['appformD'][0]['customar_id'];	
		$this->data['pinfo']=$this->PP_Credit_Scholar_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Credit_Scholar_Model->get_adInformation($customerID);
		$this->data['otherinfo']=$this->PP_Credit_Scholar_Model->get_oInformation($customerID);
		$this->data['bankinfo']=$this->PP_Credit_Scholar_Model->get_bnkInformation($customerID);
		$this->data['riskfsituation']=$this->PP_Credit_Scholar_Model->get_financial_situation($segmentid);
		$this->data['riskpaymentnewloan']=$this->PP_Credit_Scholar_Model->get_monthly_payment_new_loan($segmentid);
		$this->data['adrs']=$this->PP_Credit_Scholar_Model->get_adrsInformation($customerID);
		$this->data['empinfo']=$this->PP_Credit_Scholar_Model->get_empInformation($customerID);
		// fiche atlantique
		$this->data['fiche_data'] =  $this->Credit_Conso_Model->get_fiche_atlantique($segmentid);

		$this->data['echeance_amount'] = $this->data['appformD']['pmnt'] + $this->data['riskpaymentnewloan']['decouvert'] + $this->data['riskpaymentnewloan']['cmt'] + $this->data['riskpaymentnewloan']['cct'];

		$net_salary =  $this->data['riskfsituation']['net_salary'] ?: '100000';
		$income_ratio =  $this->data['$riskfsituation']['income_ratio'] ?: '50';
		$this->data['quotite_amount'] =  round((($net_salary * $income_ratio)/100));

		$current_monthly_payment = $this->data['riskfsituation']['current_monthly_payments'];
		//$new_monthly_payment = $this->data['riskfsituation'][0]['new_monthly_payment'] ?: '50';
                if($this->data['riskfsituation'][0]['new_monthly_payment']){
			$new_monthly_payment = $this->data['riskfsituation']['new_monthly_payment'] ?: '50';
		}
		else{
			$new_monthly_payment = $this->data['echeance_amount'];
		}
		$sum =  $current_monthly_payment + $new_monthly_payment;

		 $new_amt = $sum/$net_salary;
		$this->data['debt_ratio']  =  round($new_amt*100);
		

		$this->load->view('superadmin/updated_fiche_atlantique2020',$this->data);	
	}

	public function download_credit_agreement_form2()
	{
	    error_reporting(0);
		$segmentid=$this->uri->segment(3);	
		$this->load->view('superadmin/updated_atlantique_cg_french2020');		
	}

	public function memo_of_setting_up_scolair()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_Billet_ac_Ordre_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		 
	}

	public function generate_Billet_ac_Ordre_Credit_Scolaire($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->Credit_Scolair_Model->get_single_loan_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];	
		$this->data['loantax']=$this->PP_Credit_Scholar_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Credit_Scholar_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Credit_Scholar_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Credit_Scholar_Model->get_All_fees();

		$this->data['int_email']=$this->PP_Credit_Scholar_Model->get_interaction_data($id);
		$this->data['sys_docs']=$this->PP_Credit_Scholar_Model->get_filedata($id);
		$this->data['clist_docs']=$this->PP_Credit_Scholar_Model->get_check_list_customer_documents($id);
		$this->data['secteurs']=$this->PP_Credit_Scholar_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Credit_Scholar_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Credit_Scholar_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Credit_Scholar_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Credit_Scholar_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Credit_Scholar_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Credit_Scholar_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Credit_Scholar_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Credit_Scholar_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Credit_Scholar_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Credit_Scholar_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Credit_Scholar_Model->get_oInformation($customerID);

		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Credit_Scholar_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Credit_Scholar_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Credit_Scholar_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Credit_Scholar_Model->get_applicableloan_ratio();
                
                //print_r($this->data); die;
		return  $this->load->view('superadmin/BilletOrdre',$this->data,true);
	}

    public function save_other_riskdata(){
            $loan_id = $this->input->post('Rcl_aid');
            $loan_type = $this->input->post('Rloan_type');
           
            
            $this->db->set('montant_encours_externe',$this->input->post('m_value'));
            $this->db->where('cap_id',$loan_id);
            $this->db->where('loan_type',$loan_type);
            if($this->db->update('tbl_riskanalysis_current_monthly_credit'))
            {
                echo "1";
            }
            else{
                echo "2";
            }
    }


    public function acteDePret()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);
		$getHtmlagreement=$this->generate_acteDePret($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
	}


		public function generate_acteDePret($id)
	{
		error_reporting(0);
		$this->data['appformD']=$this->Credit_Conso_Model->get_single_loan_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		// $this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		// $this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		// $this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		// $this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		// $this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		// $this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		// $this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		// $this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		// $this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		// // $this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		// $this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		// $this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		// $this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		// $this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		// $this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		// $this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		// $this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->Credit_Conso_Model->get_current_monthly_credit($id);
		// $this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		// $this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		// $this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/acteDePret',$this->data,true);
	}


    public function riskAnalysis_average_salary(){
		$amount_a1 =  $this->input->post('amount_a1');
		$amount_a2 =  $this->input->post('amount_a2');
		$amount_b1 =  $this->input->post('amount_b1');
		$amount_b2 =  $this->input->post('amount_b2');
		$amount_c1 =  $this->input->post('amount_c1');
		$amount_c2 =  $this->input->post('amount_c2');

        $loan_id =  $this->input->post('loan_id');
		$total_form1 =  $this->input->post('total_form1');
		$total_forms2 =  $this->input->post('total_forms2');
		
		$new_loanamount = $this->input->post('new_loanamount');
		$loan_term = $this->input->post('loan_term');

		$a1_arr = array();
		foreach ($amount_a1 as $key => $a1) {
			$a1_arr[$key] =$a1['value'];
			
		}

		$a2_arr = array();
		foreach ($amount_a2 as $key => $a2) {
			$a2_arr[$key] =$a2['value'];
			
		}

		$b1_arr = array();
		foreach ($amount_b1 as $key => $b1) {
			$b1_arr[$key] =$b1['value'];
			
		}
		$b2_arr = array();
		foreach ($amount_b2 as $key => $b2) {
			$b2_arr[$key] =$b2['value'];
			
		}
		$c1_arr = array();
		foreach ($amount_c1 as $key => $c1) {
			$c1_arr[$key] =$c1['value'];
			
		}
		$c2_arr = array();
		foreach ($amount_c2 as $key => $c2) {
			$c2_arr[$key] =$c2['value'];
			
		}

		$record =  array(
	   							'amount_a_s1' => json_encode($a1_arr),
	   							'amount_a_s2' => json_encode($a2_arr),
	   							'amount_b_s1' => json_encode($b1_arr),
	   							'amount_b_s2' => json_encode($b2_arr),
	   							'amount_c_s1' => json_encode($c1_arr),
	   							'amount_c_s2' => json_encode($c2_arr),
	   							'total_s1' => $total_form1,
	   							'total_s2' => $total_forms2,
	   							'loan_id' => $loan_id,
	   							'average_residual_salary' => ($total_form1 + $total_forms2)/2
	   		);

	   $check_loan =  $this->db->get_where('tbl_credit_conso_risk_analysis',array('loan_id' => $loan_id ))->row_array();
	   

	   if(empty($check_loan)){

	   		$this->Common_model->insertRow('tbl_credit_conso_risk_analysis',$record);
	   }
	   else
	   {
	   	  	$this->Common_model->updateRow('tbl_credit_conso_risk_analysis','loan_id',$loan_id,$record);
	   }
	   
	   $loan_details = $this->db->get_where('tbl_credit_conso_applicationloan',array('loan_id' => $loan_id))->row_array();
	   $loan_temp_id = $loan_details['loan_id_temp'];
	   
	    if($new_loanamount){
	       $updatedata = array(
					'loan_amt' => $new_loanamount,
					'loan_term' => $loan_term
			);

		$this->Common_model->updateRow('tbl_temp_consumer_applicationform','aid',$loan_temp_id,$updatedata);
		
   		$amortrecord=$this->PP_Consumer_Loans_Model->get_Post_temp_applicationform($loan_temp_id);
   		
    	$testamortrecord=$this->PP_Consumer_Loans_Model->test_amortization($loan_temp_id);
    	$vat_on_interest=$amortrecord[0]['loan_tax'] ? $amortrecord[0]['loan_tax'] : '19.25';    	
    	$tax_interest= $amortrecord[0]['tva'];
    	$css_value= $amortrecord[0]['css'];

        if($amortrecord[0]['loan_schedule']=='Monthly'){
			$year=($amortrecord[0]['loan_term']/12);
		}else if($amortrecord[0]['loan_schedule']=='Yearly'){
			$year=$amortrecord[0]['loan_term'];
		}
		else if($amortrecord[0]['loan_schedule']=='Half Yearly'){
			$year=$amortrecord[0]['loan_term']/6;
		}
		else if($amortrecord[0]['loan_schedule']=='Quarterly'){
			$year=$amortrecord[0]['loan_term']/3;
		}
		
		$loan_interest =$amortrecord[0]['loan_interest'];
		$rt=($loan_interest*(1+$vat_on_interest/100));
		$curd=date("Y-m-d", strtotime($amortrecord[0]['created']));
		$amount=$amortrecord[0]['loan_amt'];
		$rate=$rt;
		$years=$year;
    	$am=new Class_Amort();
    	$am->amort($amount,$rate,$years,$curd, $loan_interest,$tax_interest,$css_value,'','','');
    	//print_r($am);
    	
    	$return_arr=array();

	        $return_arr1=array();
			$postyer=$am->years*12;
		    $ebal = $am->amount;
			$ccint =0.0;
			$cpmnt = 0.0;
			$cdate=$am->cdate;

			for ($i = 1; $i <= $am->npmts; $i++){
				$bbal = $ebal;    
			    $ipmnt = $bbal * $am->mrate;
			    $ppmnt = $am->pmnt - $ipmnt;
			    $ebal = $bbal - $ppmnt;
			 //   echo $ebal;
			    $ccint = $ccint + $ipmnt;
			    $cpmnt = $am->pmnt;
			    $pbint = $bbal*$am->postinterest/100/12;
			    $vbint = $pbint*19.25/100;
			    //$vbint = $pbint*$vat_on_interest/100;
			    $months=$am->npmts;

				$row_array['Pmt'] = $i;					
				$row_array['bbegin_periode'] = $bbal; 
				$row_array['b_end_periode'] = $ebal;
				$row_array['principal_payment'] = $ppmnt; 
				$row_array['interest_paid_tax_incl'] = $ipmnt; 
				$row_array['interest_paid_befor_tax'] = $pbint; 
				$row_array['vat_on_interest'] = $vbint; 
				$row_array['monthly_payment'] = $cpmnt; 
				$row_array['month'] = date("m", strtotime( $cdate." +$i months"));
				$row_array['years'] = date("Y", strtotime( $cdate." +$i months"));		    	
		    	array_push($return_arr,$row_array);
		    }

            
			 	$databinding=json_encode($return_arr);
				$data = array(
					'applicationform_id'=>trim($amortrecord[0]['aid']),
					'admin_id'=>$this->session->userdata('id'),						
		            'loan_type' =>trim($amortrecord[0]['loan_type']),
		            'amount' =>$am->amount,
		            'interest' =>$am->postinterest,
		            'rate' =>$am->rate,
		            'years' =>$am->years,
		            'npmts' =>$am->npmts,
		            'mrate' =>$am->mrate,
		            'smrate' =>$am->smrate,
		            'tpmnt' =>$am->tpmnt,
		            'tint' =>$am->tint,
		            'pmnt' =>$am->pmnt,
		            'cdate' =>$am->cdate,
		            'databinding' => $databinding,
		            'activate'=>'active'
		        );
		       //echo "<pre>", print_r($data),"</pre>"; exit;
		    
		    $edit =  $this->Common_model->updateRow('consumer_amortization','applicationform_id',trim($amortrecord[0]['aid']),$data);
		    
		    $monthly_payment = round($am->pmnt);
		   $risk_analysis = $this->db->get_where('tbl_credit_conso_risk_analysis',array('loan_id'=>$loan_id))->row_array();
		   
		   if(empty($risk_analysis['coefficient_rembursement']))
		   {
		       
		       $coeffrecord[] =  array(
							'rem' => $monthly_payment,
							'mois' => $loan_term,
							'ans' => $monthly_payment * $loan_term
			);
			
			    $total_rem = $monthly_payment * $loan_term;

		   }
		   else{
		       $rem_arr = json_decode($risk_analysis['coefficient_rembursement']);
		       
		       if(count($rem_arr) == 0)
		       {
		            $coeffrecord[] =  array(
							'rem' => $monthly_payment,
							'mois' => $loan_term,
							'ans' => $monthly_payment * $loan_term
			        );
			        
			        $total_rem = $monthly_payment * $loan_term;
		       }
		       else{
		           
		           unset($rem_arr[0]);
		           
		           $coeffrecord[] =  array(
							'rem' => $monthly_payment,
							'mois' => $loan_term,
							'ans' => $monthly_payment * $loan_term
			        ); 
		           $total_rem = $monthly_payment * $loan_term;
    		       foreach($rem_arr as $r){
    		           $total_rem += intval($r->ans);
    		           
    		           $coeffrecord[] =  array(
							'rem' => $r->rem,
							'mois' =>$r->mois,
							'ans' => $r->ans
			            ); 
    		       } 
		       }
		   }
		   
		   if(empty($risk_analysis['coefficient_salary']))
		   {
		       $total_salary = 0;
		   }
		   else{
		       $sal_arr = json_decode($risk_analysis['coefficient_salary']);
		       $total_salary = 0;
		       foreach($sal_arr as $s){
		           $total_salary += intval($s->ans);
		       }
		       
		   }
		   
		   if($total_rem != 0 && $total_salary != 0)
            {
    		    $c = ($total_rem / $total_salary) * 100;
    	       $updata['coefficient_score'] = number_format((float)$c, 2, '.', '');  
            }
		   
		   $updata['coefficient_rembursement'] = json_encode($coeffrecord);
		   
		    $this->Common_model->updateRow('tbl_credit_conso_risk_analysis','loan_id',$loan_id,$updata);
		   
			$history_arr=array(
				"loan_id" =>$this->input->post('loan_id'),
				"user_id" =>$this->session->userdata('id'),				
				"comment" =>"Amortissement mis ?? jour - Droit de credit maximum XAF ".$new_loanamount,
				"product_type"=>"credit_conso",			
				"created_at" =>date('Y-m-d H:i:s')
			);
			$this->Common_model->insertRow('business_tracking_timeline',$history_arr);
	       // if($edit){
	       // 	echo '1';
	       // }
	        
	        
	        $solde_du_cav  = json_decode($check_loan['solde_du_cav']);
	        $solde_du_csfbm = $check_loan['solde_du_csfbm'];
	        $solde_encours = json_decode($check_loan['solde_encours']);
	        
	        $sum_cav = 0;
	        foreach($solde_du_cav as $cav){
	            if($cav->value < 0)
	            {
	                $sum_cav += $cav->value;
	            }
	        }
	       // echo "sum_cav=".$sum_cav;
	        
	        $sum_encour = 0;
	        foreach($solde_encours as $enc){
	            
	           $sum_encour += $enc->value;
	        }
	        
	       // echo "sum_encour=".$sum_encour;
	       // echo "loan_amount =". '-'.$new_loanamount;
	        
	        if($risk_analysis['total_engagement']){
	            $work_where =  array('type' => "credit_conso",'deleted' => "0");
				$select_workflow=  $this->Common_model->getAllRecords('tbl_workflow',$work_where);

                $total_amount = floatval($sum_cav) + floatval($solde_du_csfbm) + floatval('-'.$new_loanamount) + floatval($sum_encour);
                
                if($total_amount > 0)
                {
                    $credit_amount = $total_amount;
                }
                else
                {
                    $credit_amount = str_replace("-","",$total_amount);
                }

				foreach($select_workflow as $row)
				{
					//$credit_amount  = $data['total_engagement']; 
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

				//print_r($workflow_id); die;

				if($workflow_id)
				{
					 $this->db->where('loan_id',$loan_id);
	                 $this->db->where('workflow_id','0');
					 $this->db->where('loan_type',"credit_conso");
					 $this->db->delete('tbl_all_applications');

					$save_total_amt =  str_replace("-","",$risk_analysis['total_engagement']);

					$cond_where =  array('loan_id' => $loan_id,'status' => '1','workflow_id !=' => '0');
					$check_w =   $this->Common_model->getRecord('tbl_all_applications','',$cond_where);

					if(!empty($check_w))
					{
						if($credit_amount != $save_total_amt)
						{
							// update previous data which is saved 
							$this->db->where('loan_id',$loan_id);
							$this->db->where('loan_type',"credit_conso");
							$this->db->set('status','0');
							$this->db->update('tbl_all_applications');

							$this->db->where('loan_id',$loan_id);
							$this->db->set('final_status',NULL);
							$this->db->update('tbl_credit_conso_applicationloan');
					

							$previous_workflow = '1';
						}
						else
						{
							$previous_workflow =  '0';
						}
					}
					else{

						$this->db->where('loan_id',$loan_id);
						$this->db->where('loan_type',"credit_conso");
						$this->db->set('status','0');
						$this->db->update('tbl_all_applications');

						$this->db->where('loan_id',$loan_id);
						$this->db->set('final_status',NULL);
						$this->db->update('tbl_credit_conso_applicationloan');
						$previous_workflow =  '2';
					}
					

					//echo $previous_workflow ; die;

					if($previous_workflow != '0'){
						$finalwork_where =  array('workflow_id' => $workflow_id);
						$workflow =  $this->Common_model->getRecord('tbl_workflow','',$finalwork_where);

						//print_r($workflow); 

						// Insert in All Application Approval table
						$order_arr =  explode(',',$workflow['workflow_order']);
						$role_ids = explode(',',$workflow['role_ids']);
						$statusArr = explode(',',$workflow['status']);

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
									

									$apprecord = array(
										'loan_id' => $loan_id,
										'branch_id' => $userdata['branch_id'], 
										'status' => 1,
										'loan_type' => 'credit_conso',
										'workflow_id' => $workflow['workflow_id'],
										'workflow_order' => $w_ord,
										'assigned_roles' => $role_ids[$ord_key],
										'review' =>$review,
										'approval_status' => $status,
										'comment' => '',
										'comment_date' => date('Y-m-d H:i:s')
									);
									//print_r($record);
									$this->Common_model->insertRow('tbl_all_applications',$apprecord);

									
									
								}
								else{

									$cic_where  =  array('group_id' => $workflow['assigned_cic_grp_id'] );
									$cic_data =  $this->Common_model->getAllRecords('tbl_assignroles',$cic_where);

									//print_r($cic_data); die;

									$count =  $w_order;
									foreach($cic_data as $row_cic)
									{
										$apprecord = array(
													'loan_id' => $loan_id,
													'branch_id' => $userdata['branch_id'], 
													'status' => 1,
													'loan_type' => 'credit_conso',
													'workflow_id' => $workflow['workflow_id'],
													'workflow_order' => $count,
													'assigned_roles' => $row_cic['role_id'],
													'review' =>NULL,
                                                    'user_type' => 'cic',
													'approval_status' => '',
													'comment' => '',
													'comment_date' => date('Y-m-d H:i:s')
											);

										
										$this->Common_model->insertRow('tbl_all_applications',$apprecord);
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
											'user_id' => $this->session->userdata('id'),
											'product_type' => "credit_conso",
											'comment' => "Salary Residuel - Enregistr?? avec succ??s et Circuit de Validation r??initi??",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);


						echo "success_new";	 // new workflow restart
					}
					else if($previous_workflow == '2'){

						// Insert in Tracking Details of Loan

						$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' => $this->session->userdata('id'),
											'product_type' => "credit_conso",
											'comment' => "Salary Residuel - Risk Analysis data is updated and Workflow Initated",
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
											'user_id' => $this->session->userdata('id'),
											'product_type' => "credit_conso",
											'comment' => "Salary Residuel - Risk Analysis data is updated",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);
						echo "no_workflow_change";
					}
				}
				else 
				{
						$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' =>$this->session->userdata('id'),
											'product_type' => "credit_conso",
											'comment' => "Salary Residuel - Risk Analysis data is updated But No Workflow Initated",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);
						echo "no_workflow_matched";
				}
			}
	        
	        $update_loanstatus = array(
					'updated_loanamount' => 1
			    );

	        $this->Common_model->updateRow('tbl_credit_conso_risk_analysis','loan_id',$loan_id,$update_loanstatus);
	        
	        	
	   }
	   else{
	        $update_loanstatus = array(
					'updated_loanamount' => NULL
			    );

	        $this->Common_model->updateRow('tbl_credit_conso_risk_analysis','loan_id',$loan_id,$update_loanstatus);
	   }
	}
	
	
	public function riskAnalysis_coefficient_salary(){
// 		print_r($_POST);
		
// 		die;

		$salary =  $this->input->post('salary');
		$mois =  $this->input->post('mois');
		$ans =  $this->input->post('ans');
		$total_t1 =  $this->input->post('total_t1');
		$loan_id =  $this->input->post('loan_id');
		$coeff_score = $this->input->post('coeff_score');


		foreach($salary as $key=>$s){
		    
		    if($s['value'] != "" && $mois[$key]['value'] != ""){
		       	$record[] =  array(
							'salary' => $s['value'],
							'mois' => $mois[$key]['value'],
							'ans' => $ans[$key]['value']
			    ); 
		    }
		
		}

		//print_r($record);
		$data['coefficient_salary'] =  json_encode($record);
		$data['salary_total'] =  $total_t1;
		$data['loan_id'] =  $loan_id;
		$data['coefficient_score'] = $coeff_score;

		$check_loan =  $this->db->get_where('tbl_credit_conso_risk_analysis',array('loan_id' => $loan_id ))->row_array();

	   	if(empty($check_loan)){

	   		$this->Common_model->insertRow('tbl_credit_conso_risk_analysis',$data);
	   	}
	    else
	    {
	   	  	$this->Common_model->updateRow('tbl_credit_conso_risk_analysis','loan_id',$loan_id,$data);
	    }
	}
	
	public function riskAnalysis_coefficient_remboursement(){
		
		$remboursement =  $this->input->post('remboursement');
		$mois =  $this->input->post('mois');
		$ans =  $this->input->post('ans');
		$total_t2 =  $this->input->post('total_t2');
		$loan_id =  $this->input->post('loan_id');
		$coeff_score = $this->input->post('coeff_score');


		foreach($remboursement as $key=>$r){
		    
		    if($r['value'] != "" && $mois[$key]['value'] != ""){
		       $record[] =  array(
							'rem' => $r['value'],
							'mois' => $mois[$key]['value'] ,
							'ans' => $ans[$key]['value']
			    ); 
		    }
			
		}

		//print_r($record);
		$data['coefficient_rembursement'] =  json_encode($record);
		$data['rembursement_total'] =  $total_t2;
		$data['loan_id'] =  $loan_id;
		$data['coefficient_score'] = $coeff_score;

		$check_loan =  $this->db->get_where('tbl_credit_conso_risk_analysis',array('loan_id' => $loan_id ))->row_array();

	   	if(empty($check_loan)){

	   		$this->Common_model->insertRow('tbl_credit_conso_risk_analysis',$data);
	   	}
	    else
	    {
	   	  	$this->Common_model->updateRow('tbl_credit_conso_risk_analysis','loan_id',$loan_id,$data);
	    }
	}
	
		public function riskanalysis_total_engagements(){
		
		$data['solde_du_cav']  =  json_encode($this->input->post('solde_du_cav'));
		$data['solde_du_csfbm']  =  $this->input->post('solde_du_csfbm');
		$data['solde_encours']  =  json_encode($this->input->post('solde_encours'));

		$loan_id = $this->input->post('loan_id');
		$data['loan_id'] = $loan_id;
		$data['total_engagement']  =  $this->input->post('total_analyse_cal');

		$user_id =  $this->session->userdata('id');

		$user_where =  array('id' => $user_id);
		$userdata  =  $this->Common_model->getRecord('tbl_user','',$user_where);
		
		
        if($data['total_engagement'] > 0)
        {
            $credit_amount = $data['total_engagement'];
        }
        else
        {
            $credit_amount = str_replace("-","",$data['total_engagement']);
        }
		
		

		$check_loan =  $this->db->get_where('tbl_credit_conso_risk_analysis',array('loan_id' => $loan_id ))->row_array();
		if(empty($check_loan)){

	   		$this->Common_model->insertRow('tbl_credit_conso_risk_analysis',$data);

	   		// Insert in all application table

			// Work flow setup
			
			$work_where =  array('type' => "credit_conso",'deleted' => "0");
			$select_workflow=  $this->Common_model->getAllRecords('tbl_workflow',$work_where);

			foreach($select_workflow as $row)
			{
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

			//print_r($workflow_id); 

			if($workflow_id)
			{
				// delete previous data which is inserted when loan is created
				 $this->db->where('loan_id',$loan_id);
                 $this->db->where('workflow_id','0');
				 $this->db->where('loan_type',"credit_conso");
				 $this->db->delete('tbl_all_applications');
	

				$finalwork_where =  array('workflow_id' => $workflow_id);
				$workflow =  $this->Common_model->getRecord('tbl_workflow','',$finalwork_where);

				// print_r($workflow); 

				// Insert in All Application Approval table
				$order_arr =  explode(',',$workflow['workflow_order']);
				$role_ids = explode(',',$workflow['role_ids']);
				$statusArr = explode(',',$workflow['status']);

				$sorted_order_arr =  array_diff($order_arr, array('0'));

				sort($sorted_order_arr);

				// print_r($sorted_order_arr);
			
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
										'branch_id' => $userdata['branch_id'], 
										'status' => 1,
										'loan_type' => 'credit_conso',
										'workflow_id' => $workflow['workflow_id'],
										'workflow_order' => $w_ord,
										'assigned_roles' => $role_ids[$ord_key],
										'review' =>$review,
										'approval_status' => $status,
										'comment' => '',
										'comment_date' => date('Y-m-d H:i:s')
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
													'branch_id' => $userdata['branch_id'], 
													'status' => 1,
													'loan_type' => 'credit_conso',
													'workflow_id' => $workflow['workflow_id'],
													'workflow_order' => $count,
													'assigned_roles' => $row_cic['role_id'],
													'review' =>NULL,
                                                    'user_type' => 'cic',
													'approval_status' => '',
													'comment' => '',
													'comment_date' => date('Y-m-d H:i:s')
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
												'product_type' => "credit_conso",
												'comment' => "Enregistr?? avec succ??s et Circuit de Validation Initi??",
												'content_type' => "text"
							);

				$this->Common_model->insertRow('business_tracking_timeline',$track_data);

				echo "success";
			}
			else
			{
				$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' =>$this->session->userdata('id'),
											'product_type' => "credit_conso",
											'comment' => "Les donn??es d'analyse des risques sont mises ?? jour mais aucun workflow n'est lanc??",
											'content_type' => "text"
						);

				$this->Common_model->insertRow('business_tracking_timeline',$track_data);
					
				echo "no_workflow_matched";
			}
			
 
	   	}
	    else
	    {
	   	  	$this->Common_model->updateRow('tbl_credit_conso_risk_analysis','loan_id',$loan_id,$data);

	   	  	// get loan lies in which workflow 

				$work_where =  array('type' => "credit_conso",'deleted' => "0");
				$select_workflow=  $this->Common_model->getAllRecords('tbl_workflow',$work_where);


				foreach($select_workflow as $row)
				{
					//$credit_amount  = $data['total_engagement']; 
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

				//print_r($workflow_id); die;

				if($workflow_id)
				{
					 $this->db->where('loan_id',$loan_id);
	                 $this->db->where('workflow_id','0');
					 $this->db->where('loan_type',"credit_conso");
					 $this->db->delete('tbl_all_applications');

					$save_total_amt =  str_replace("-","",$check_loan['total_engagement']);

					$cond_where =  array('loan_id' => $loan_id,'status' => '1','workflow_id !=' => '0');
					$check_w =   $this->Common_model->getRecord('tbl_all_applications','',$cond_where);

					if(!empty($check_w))
					{
						if($credit_amount != $save_total_amt)
						{
							// update previous data which is saved 
							$this->db->where('loan_id',$loan_id);
							$this->db->where('loan_type',"credit_conso");
							$this->db->set('status','0');
							$this->db->update('tbl_all_applications');

							$this->db->where('loan_id',$loan_id);
							$this->db->set('final_status',NULL);
							$this->db->update('tbl_credit_conso_applicationloan');
					

							$previous_workflow = '1';
						}
						else
						{
							$previous_workflow =  '0';
						}
					}
					else{

						$this->db->where('loan_id',$loan_id);
						$this->db->where('loan_type',"credit_conso");
						$this->db->set('status','0');
						$this->db->update('tbl_all_applications');

						$this->db->where('loan_id',$loan_id);
						$this->db->set('final_status',NULL);
						$this->db->update('tbl_credit_conso_applicationloan');
						$previous_workflow =  '2';
					}
					

					//echo $previous_workflow ; die;

					if($previous_workflow != '0'){
						$finalwork_where =  array('workflow_id' => $workflow_id);
						$workflow =  $this->Common_model->getRecord('tbl_workflow','',$finalwork_where);

						//print_r($workflow); 

						// Insert in All Application Approval table
						$order_arr =  explode(',',$workflow['workflow_order']);
						$role_ids = explode(',',$workflow['role_ids']);
						$statusArr = explode(',',$workflow['status']);

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
										'branch_id' => $userdata['branch_id'], 
										'status' => 1,
										'loan_type' => 'credit_conso',
										'workflow_id' => $workflow['workflow_id'],
										'workflow_order' => $w_ord,
										'assigned_roles' => $role_ids[$ord_key],
										'review' =>$review,
										'approval_status' => $status,
										'comment' => '',
										'comment_date' => date('Y-m-d H:i:s')
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
													'branch_id' => $userdata['branch_id'], 
													'status' => 1,
													'loan_type' => 'credit_conso',
													'workflow_id' => $workflow['workflow_id'],
													'workflow_order' => $count,
													'assigned_roles' => $row_cic['role_id'],
													'review' =>NULL,
                                                    'user_type' => 'cic',
													'approval_status' => '',
													'comment' => '',
													'comment_date' => date('Y-m-d H:i:s')
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
											'user_id' => $this->session->userdata('id'),
											'product_type' => "credit_conso",
											'comment' => "Enregistr?? avec succ??s et Circuit de Validation r??initi??",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);


						echo "success_new";	 // new workflow restart
					}
					else if($previous_workflow == '2'){

						// Insert in Tracking Details of Loan

						$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' => $this->session->userdata('id'),
											'product_type' => "credit_conso",
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
											'user_id' => $this->session->userdata('id'),
											'product_type' => "credit_conso",
											'comment' => "Risk Analysis data is updated",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);
						echo "no_workflow_change";
					}
				}
				else 
				{
						$track_data =  array(
											'loan_id' => $loan_id,
											'user_id' =>$this->session->userdata('id'),
											'product_type' => "credit_conso",
											'comment' => "Risk Analysis data is updated But No Workflow Initated",
											'content_type' => "text"
						);

						$this->Common_model->insertRow('business_tracking_timeline',$track_data);
						echo "no_workflow_matched";
				}

	    }
	}
	public function archive_loan(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['dashboard_url'] =  'Dashboard';
		$this->data['page_title'] =  'F??te ?? la Carte';

		$this->data['loan_details'] =  $this->Credit_Conso_Model->get_archive_loans(); 
		$this->data['controller'] = $this; 

		$this->render_template2('customer_product/credit_conso/archive_loan', $this->data);
	}

}