<?php defined('BASEPATH') OR exit('No direct script access aloowed');

class PP_Credit_Scholar extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		$this->not_logged_in();
		//$this->data['title'] = 'pploan';	
		$this->data['page'] = 'PP Credit Scholar';	
		$this->load->library('session');		
    	$this->load->model('Common_model');
    	$this->load->model('PP_Credit_Scholar_Model');
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
	public function Finance_Credit_Scholar(){
	    error_reporting(0);
		$this->data['title'] = 'DCP -  PP Credit Scholar';			
		$this->data['record']=$this->Common_model->get_admin_details($this->session->userdata('id'));
		$this->data['loantype']=$this->PP_Credit_Scholar_Model->get_loanType();
		$this->data['loantax']=$this->PP_Credit_Scholar_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Credit_Scholar_Model->get_new_application_form();
		$branchid=$this->data['loandetails'][0]['branch_id'];
		$this->data['headagency']=$this->PP_Credit_Scholar_Model->get_headagency($branchid);
		$this->data['fees']=$this->PP_Credit_Scholar_Model->get_All_fees();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;		
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/finance_credit_scholar', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}
	function rangeofTax()
	{	
		if(!empty($this->input->post('tval'))){	
		echo $this->PP_Credit_Scholar_Model->get_RangeTax($this->input->post('tval'));
		//echo json_decode($return);
		}else{
			echo 0;
		}
		
	}
	public function Overdraft(){	
		$this->data['record']=$this->Common_model->get_admin_details(1);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='3'){			
			$this->render_template2('superadmin/overdraft', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
	}

	public function add_loan(){
		//print_r($_POST);
		//exit;
		$output='';
		$ip = $_SERVER['REMOTE_ADDR'];
		$this->form_validation->set_error_delimiters('<span>', '</span>');		
		$this->form_validation->set_rules('loan_amt', 'Loan Amount', 'required');
		$this->form_validation->set_rules('loan_interest', 'Interest', 'required');
		$this->form_validation->set_rules('loan_term', 'Term', 'required');
		$this->form_validation->set_rules('loan_tax', 'Tax', 'required');
		$this->form_validation->set_rules('loan_commission', 'loan_commission', 'required');
		$this->form_validation->set_rules('loan_guarantee', 'loan_guarantee', 'required');		
		if ($this->form_validation->run() == FALSE){			
			$errors = validation_errors();
			echo json_encode(['error'=>$errors]);
		}else{
		sleep(2);
		
			$num =round(microtime(true)*1000);
			//$random_number = intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) );
			//$random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)); 
			//$num =$random_string;
			//echo json_encode(['success'=>$num]); exit;
			$data = array(
				'application_no'=>$num,
				'admin_id'=>$this->session->userdata('id'),
				'ip_address' => $ip,
	            'loan_type' =>2,
	            'loan_amt' => $this->input->post('loan_amt'),
	            'loan_interest' => $this->input->post('loan_interest'),
	            'loan_term' => $this->input->post('loan_term'),
	            'loan_schedule' => $this->input->post('loan_schedule'),
	            'loan_fee' => $this->input->post('loan_fee'),
	            'loan_tax' => $this->input->post('loan_tax'),
				'loan_commission' => $this->input->post('loan_commission'),
				'loan_guarantee' => $this->input->post('loan_guarantee'),
	        );
	        $result=$this->PP_Credit_Scholar_Model->insertRow('temp_applicationform',$data);
	        echo json_encode(['success'=>$result]);
    	}			
    }

    public function edit_loan(){    	
        sleep(1);
        $ip = $_SERVER['REMOTE_ADDR'];	
        //echo "<pre> post ", print_r($_POST),"</pre>";
		$crecord=$this->PP_Credit_Scholar_Model->get_checkfieldandvalue($this->input->post('editid'));
		$erecord=$this->PP_Credit_Scholar_Model->get_edit_customar_applicationform($this->input->post('editid'));
		//echo "<pre>", print_r($erecord[0]['amortization_id'],1), "</pre>";exit;
		$da=json_decode($erecord[0]['appliedformdata']);
		//echo "<pre>", print_r($da),"</pre>";
		//exit;
		$amount=trim($this->input->post('loan_amt'));		
		$rate=trim($this->input->post('loan_interest'));
		$rt=($rate*(1+19.25/100));
		$rate=$rt;
		if($this->input->post('loan_schedule')=='Monthly'){
			$year=(trim($this->input->post('loan_term'))/12);
		}else if($this->input->post('loan_schedule')=='Yearly'){
			$year=trim($this->input->post('loan_term'));
		}
		else if($this->input->post('loan_schedule')=='Half Yearly'){
			$year=trim($this->input->post('loan_term')*2/12);
		}
		$years=$year;
		$years=$years;
		$curd=date("Y-m-d", strtotime($erecord[0]['created']));
		$loan_interest =$rate;	
		$am=new Class_Amort();
		$am->amort($amount,$rate,$years,$curd, $loan_interest);		
		//echo "<pre>", print_r($am), "</pre>"; 
		//echo number_format($am->pmnt,0,',',' ');//exit;
			
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
			    $ccint = $ccint + $ipmnt;
			    $cpmnt = $am->pmnt;
			    $pbint = $bbal*$this->input->post('loan_interest')/100/12;
			    $vbint = $pbint*19.25/100;
			    $months=$am->npmts;

				$rowarray['Pmt'] = $i;					
				$rowarray['bbegin_periode'] = $bbal; 
				$rowarray['b_end_periode'] = $ebal;
				$rowarray['principal_payment'] = $ppmnt; 
				$rowarray['interest_paid_tax_incl'] = $ipmnt; 
				$rowarray['interest_paid_befor_tax'] = $pbint; 
				$rowarray['vat_on_interest'] = $vbint; 
				$rowarray['monthly_payment'] = $cpmnt; 
				$rowarray['month'] = date("m", strtotime( $cdate." +$i months"));
				$rowarray['years'] = date("Y", strtotime( $cdate." +$i months"));		    	
		    	array_push($return_arr1,$rowarray);
		    }


		    $amortizationdatabinding=json_encode($return_arr1);
			//$amortizationdatabinding=json_encode($return_arr1,JSON_PRETTY_PRINT);	
			//header('Content-Type: application/json');
			// echo "<pre>". $amortizationdatabinding."<pre>"."\n";
			//exit;


		$row_array=array();
		$return_arr=array(
			"application_no" =>$da[0]->application_no,
            "ip_address" =>$da[0]->ip_address,
            "loan_type"=>$da[0]->loan_type,
            "loan_amt"=>$this->input->post('loan_amt'),
            "loan_interest"=>$this->input->post('loan_interest'),
            "loan_term"=>$this->input->post('loan_term'),
            "loan_schedule"=>$this->input->post('loan_schedule'),
            "loan_fee"=>$this->input->post('loan_fee'),
            "loan_tax"=>$this->input->post('loan_tax'),
            "loan_commission"=>$this->input->post('loan_commission')
	    );	    		
		array_push($row_array, $return_arr);
		$databinding=json_encode($row_array);
		$update_amortization=array(
				"applicationform_id"=>trim($this->input->post('editid')),
				"admin_id"=>trim($this->session->userdata('id')),
				"loan_type"=>trim($this->input->post('loan_type')),
				"amount" =>trim($this->input->post('loan_amt')),
				"interest"=>trim($this->input->post('loan_interest')),
				"rate"=>trim($am->rate),
				"years"=>$postyer,
				"npmts"=>trim($am->npmts),
				"mrate"=>trim($am->mrate),
				"smrate"=>trim($am->smrate),
				"tpmnt"=>trim($am->tpmnt),
				"tint"=>trim($am->tint),
				"pmnt"=>trim($am->pmnt),
				"cdate"=>trim($am->cdate),
				"databinding"=>trim($amortizationdatabinding),
			);

			$this->form_validation->set_rules('loan_type', 'Loan Type', 'required');
	    	$this->form_validation->set_rules('loan_amt', 'Amount','trim|required');
	    	$this->form_validation->set_rules('loan_interest', 'Interest', 'trim|required');
	    	$this->form_validation->set_rules('loan_term', 'Term', 'required');
			$this->form_validation->set_rules('loan_schedule', 'Schedule', 'required');
			//$this->form_validation->set_rules('loan_fee', 'Fee Field One', 'required');
			$this->form_validation->set_rules('loan_tax', 'Tax Field One', 'required');
			//$this->form_validation->set_rules('loan_commission', 'commission Field One', 'required');
		if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo validation_errors();
        }else{
		$data = array(			
            'loan_type' =>2,
            'loan_amt' =>trim($this->input->post('loan_amt')),
            'loan_interest' => $this->input->post('loan_interest'),
            'loan_term' => $this->input->post('loan_term'),
            'loan_schedule' => $this->input->post('loan_schedule'),
            'loan_fee' => $this->input->post('loan_fee'),
            'loan_tax' => $this->input->post('loan_tax'),
            'loan_commission' => $this->input->post('loan_commission'),
            'appliedformdata'=>trim($databinding),
        );
		$msg='Updated Loan Information ';		
		if($crecord[0]->loan_amt!=$this->input->post('loan_amt')){
			$msg .='amount is '.number_format($crecord[0]->loan_amt,0,',',' ').' to '.number_format($this->input->post('loan_amt'),0,',',' ').'|';
		}
		if($crecord[0]->loan_interest!=$this->input->post('loan_interest')){
			$msg .='interest is '.$crecord[0]->loan_interest.' to '.$this->input->post('loan_interest').'';
		}
		if($crecord[0]->loan_term!=$this->input->post('loan_term')){
			$msg .='term is '.$crecord[0]->loan_term.' to '.$this->input->post('loan_term').'|';
		}
		if($crecord[0]->loan_schedule!=$this->input->post('loan_schedule')){
			$msg .='schedule is '.$crecord[0]->loan_schedule.' to '.$this->input->post('loan_schedule').'';
		}
		if($crecord[0]->loan_tax!=$this->input->post('loan_tax')){
			$msg .='taxes is '.$crecord[0]->loan_tax.' to '.$this->input->post('loan_tax').'|';			
		}
		if($crecord[0]->loan_commission!=$this->input->post('loan_commission')){
			$msg .='commission is '.$crecord[0]->loan_commission.' to '.$this->input->post('loan_commission').'|';
		}       
		$msg=str_replace('|', ', ', $msg); 

        $edit=$this->PP_Credit_Scholar_Model->updateRow('customar_applicationform', 'cap_id', $this->input->post('editid'),$data);

        $Amortization=$this->PP_Credit_Scholar_Model->updateRow('amortization', 'id',$erecord[0]['amortization_id'], $update_amortization);

        $details=$msg;		
			$history_arr=array(
				"cl_aid" =>$this->input->post('editid'),
				"admin_id" =>$this->session->userdata('id'),
				'customar_id'=>trim($this->input->post('ecustomar_id')),					
				"comment" =>$details,
				"loan_type"=>2,			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
        if($edit){
        	echo 1;
        }
		}      
        
    }
    /*Amortization Section*/
    public function Consumer_Amortization(){
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(2);
    	$this->data['amortrecord']=$this->PP_Credit_Scholar_Model->get_temp_applicationform_record($id);    	
    	$validate=$this->PP_Credit_Scholar_Model->check_amortization($id);
    	if($validate >0)
    	{
    	}
    	else{
	    	if($this->data['amortrecord'][0]['loan_schedule']=='Monthly'){
				$year=($this->data['amortrecord'][0]['loan_term']/12);
			}else if($this->data['amortrecord'][0]['loan_schedule']=='Yearly'){
				$year=$this->data['amortrecord'][0]['loan_term'];
			}
			else if($this->data['amortrecord'][0]['loan_schedule']=='Half Yearly'){
				$year=$this->data['amortrecord'][0]['loan_term']*2/12;
			}
		$loan_interest =$this->data['amortrecord'][0]['loan_interest'];
		$rt=($loan_interest*(1+19.25/100));
		$curd=date("Y-m-d", strtotime($this->data['amortrecord'][0]['created']));
		$amount=$this->data['amortrecord'][0]['loan_amt'];
		$rate=$rt;
		

		$years=$year;
		$years=$years;


    	$am=new Class_Amort();
    	$am->amort($amount,$rate,$years,$curd, $loan_interest);
    	//echo "<pre>", print_r($am), "</pre>";// exit;
    	$return_arr=array();


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
	            'years' =>$postyer,
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
		$this->PP_Credit_Scholar_Model->insertRow('amortization',$data);
		}
    	//echo $this->PP_Credit_Scholar_Model->post_amortization($am, );
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/consumer_amortization', $this->data);
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
    	$this->data['amortrecord']=$this->PP_Credit_Scholar_Model->get_amortization_record2($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/cscholar_amortization_view', $this->data);    	
    }
    public function amortization_pdf(){
		  $output='';
		  $Locations='';
		  $Rarray='';
		  $users_arr=array();	
		  $segmentid=$this->uri->segment(3); 	  
		  $getHtml=trim($this->generate_amortization_pdf($segmentid));
		  $filename=trim('amortization-'.$segmentid.'-'.time());
		  $abc=pdf_po_create_proposal($getHtml,$filename,true);
		  if($abc==1){
		 	$data = array('amortization_pdf'=>$filename.'.pdf');
		  	$validate=$this->PP_Credit_Scholar_Model->check_amortization_files($segmentid);
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
        		$path_to_file ='./assets/consumer_loan/amortization/'.$validate->amortization_pdf;
				if(unlink($path_to_file)) {
				     echo 'deleted successfully';
				}
				else {
				     echo 'errors occured';
				}
        		$edit=$this->PP_Credit_Scholar_Model->updateRow('amortization', 'applicationform_id', $segmentid,$data);
        	}else{
        		$edit=$this->PP_Credit_Scholar_Model->updateRow('amortization', 'applicationform_id', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}
	}

	public function amortization_vewpdf(){
		 $output='';
		  $Locations='';
		  $Rarray='';
		  $users_arr=array();	
		  $segmentid=$this->uri->segment(3); 	  
		  $getHtml=$this->generate_amortization_pdf_vew($segmentid);
		  //echo $getHtml;exit;
		  $filename='amortization-'.$segmentid.'-'.time();		  
		  $abc=pdf_po_create_proposal($getHtml,$filename,true);
		  if($abc==1){
		 	$data = array('amortization_pdf'=>$filename.'.pdf');
		  	$validate=$this->PP_Credit_Scholar_Model->check_amortization_files($segmentid);
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
        		$path_to_file = './assets/consumer_loan/amortization/'.$validate->amortization_pdf;
				if(unlink($path_to_file)) {
				     echo 'deleted successfully';
				}
				else {
				     echo 'errors occured';
				}
        		$edit=$this->PP_Credit_Scholar_Model->updateRow('amortization', 'applicationform_id', $segmentid,$data);
        	}else{
        		$edit=$this->PP_Credit_Scholar_Model->updateRow('amortization', 'applicationform_id', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}
	}


	
	function generate_amortization_pdf($segmentid){		
		$this->data['amortizationdata']=$this->PP_Credit_Scholar_Model->get_amortization_record_download($segmentid);
		return  $this->load->view('superadmin/amortization_pdf_generate',$this->data,TRUE);
	}

	function generate_amortization_pdf_vew($segmentid){		
		$this->data['amortizationdata']=$this->PP_Credit_Scholar_Model->get_amortization_record2($segmentid);
		return  $this->load->view('superadmin/amortization_pdf_generate',$this->data,TRUE);
	}


	public function select_customer()
	{
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$this->data['secteurs']=$this->PP_Credit_Scholar_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Credit_Scholar_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Credit_Scholar_Model->get_type_of_contract();
		$this->data['branch_record']=$this->PP_Credit_Scholar_Model->get_All_branch();
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['bankdetails']=$this->PP_Credit_Scholar_Model->get_bankdetails();
		$this->data['title'] = 'DCP - Customer Verification';
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/select_customer', $this->data);
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
		$this->data['appformD']=$this->PP_Credit_Scholar_Model->get_customar_applicationform_details($id);
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

		$this->data['collateral_vehicule']=$this->PP_Credit_Scholar_Model->get_collateral_vehicule($id);
		$this->data['collateral_deposit']=$this->PP_Credit_Scholar_Model->get_collateral_deposit($id);
		$this->data['collateral_maison']=$this->PP_Credit_Scholar_Model->get_collateral_maison($id);
		$this->data['collateral_excemption']=$this->PP_Credit_Scholar_Model->get_collateral_excemption($id);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Credit_Scholar_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Credit_Scholar_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Credit_Scholar_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Credit_Scholar_Model->get_applicableloan_ratio();

		$this->data['decision_rec']=$this->PP_Credit_Scholar_Model->get_decision_record($id);
				
		$this->data['customersd']=$this->PP_Credit_Scholar_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Credit_Scholar_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Credit_Scholar_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Credit_Scholar_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Credit_Scholar_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Credit_Scholar_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Credit_Scholar_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Credit_Scholar_Model->get_oInformation($customerID);

		// echo '<pre>';

 	//  	print_r($this->data['otherinfo']);	
 	//  	die;			

		$this->data['customerdata']=$this->PP_Credit_Scholar_Model->get_customerdetails_list();
		$this->data['urlid'] = $id;
	
		
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['title'] = 'DCP - Credit Scholar Customer Details';

		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/credit_scholar_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}

		
	}

	/*Select CUstomar*/
	public function is_ajax_request()
	{
		sleep(1);
		//print_r($this->input->post());
		//exit;
		$customerid=$this->input->post('customerid');
		$segment=$this->input->post('segment');
		$record=$this->PP_Credit_Scholar_Model->get_temp_applicationformdata();
		$amortizationid=$this->PP_Credit_Scholar_Model->get_amortization_id($segment);		
		$appliedformdata=json_encode($record);
		foreach($record as $loca) {
			$data=array(
				'admin_id'=>$this->session->userdata('id'),
				'customar_id'=>$customerid,
				'amortization_id'=>$amortizationid->id,
				'application_no'=>trim($loca['application_no']),
				'ip_address' =>trim($loca['ip_address']),
	            'loan_type' =>trim($loca['loan_type']),
	            'loan_amt' =>trim($loca['loan_amt']),
	            'loan_interest' =>trim($loca['loan_interest']),
	            'loan_term' =>trim($loca['loan_term']),
	            'loan_schedule' =>trim($loca['loan_schedule']),
	            'loan_fee' =>trim($loca['loan_fee']),
	            'loan_tax' =>trim($loca['loan_tax']),
	            'loan_commission'=>trim($loca['loan_commission']),
	            'appliedformdata'=>$appliedformdata,
							'loan_status' =>'Process',
							'loan_guarantee'=>trim($loca['loan_guarantee']),
			);
		}		
		//print_r($data); exit;		
		$res=$this->PP_Credit_Scholar_Model->insertRow('customar_applicationform',$data);
		if($res){
			$array=array('aid' =>$segment, );
			$details="New loan application form created with amount CFA ".number_format($record[0]['loan_amt'],0,',',' ')." and application number is ".$record[0]['application_no']." under process";
				$history_arr=array(
					"cl_aid" =>$res,
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>$customerid,
					"loan_type"=>trim($loca['loan_type']),
					"comment" =>$details,			
					"created" =>date('Y-m-d H:i:s')
				);
			$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
			$this->PP_Credit_Scholar_Model->delete_data('temp_applicationform',$array);
			echo $res;
		}else{
			echo 0;
		}
		//$this->data['record']=$this->Common_model->get_admin_details();

	}

	public function SearchAccount(){
		//print_r($_POST);
		$segment=$this->input->post('segment');
		$data= $this->data['accontdata']=$this->PP_Credit_Scholar_Model->get_account_details($this->input->post('account'));		
		$html=null;
		foreach ($data as $key) {
			$html .="<tr>
			<td>".$key['cid']."</td>
			<td>".$key['first_name']." ".$key['middle_name']." ".$key['last_name']."</td>
			<td>".$key['account_name']."</td>
			<td>".$key['account_number']."</td>
			<td>".$key['dob']."</td>
			<td>".$key['address']."</td>
			<td>".$key['emp_name']."</td>
			<td>".$key['phone']."</td>
			<td><a href=\"javascript:void(0)\" class=\"btn btn-primary\" onclick=\"return theFunction(".$key['cid'].");\">
			<img src=\"".base_url('assets/img/select2-spinner.gif')."\" class=\"pull-left\" id='ajax-loder".$key['cid']."' style='position:relative;top: 2px;left: -2px; display: none;'' /> SELECT</a></td>
		</tr>";
		 }
		 echo $html;

	}

	public function download_credit_agreement_form()
	{
	    error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_credit_agreement_form_pdf($segmentid);
		echo $getHtmlagreement;
// exit;
		 $filename=$segmentid.'-'.time();
		 //$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}

	public function download_credit_agreement_form2()
	{
	    error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		 $getHtmlagreement=$this->generate_credit_agreement_form_pdf2($segmentid);
		echo $getHtmlagreement;
// exit;
		 $filename=$segmentid.'-'.time();
		 //$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}


	public function generate_credit_agreement_form_pdf($id)
	{
		error_reporting(0);
		$this->data['appformD']=$this->PP_Credit_Scholar_Model->get_customar_applicationform_details($id);
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
		

		
		return  $this->load->view('superadmin/atlantique_preet_scolaire_formulaire_en_anglais',$this->data,true);
	}

	public function generate_credit_agreement_form_pdf2($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->PP_Credit_Scholar_Model->get_customar_applicationform_details($id);
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
		

		
		return  $this->load->view('superadmin/atlantique_pret_scolaire_2017_cg_en_anglais',$this->data,true);
	}

	public function uploadfile_split(){
		//print_r($_POST); exit;
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/consumer_loan/system-docs/';
		   $config["allowed_types"] ="*";
		   $config['max_size'] ="0";
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
                	'filesname'=>$filename['file_name'],
					'raw_name'=>$_FILES["files"]['name'][$count],
					'file_path'=>$filename['file_path'],
					'full_path'=>$filename['full_path'],						
					'file_type'=>$filename['file_type'],
					'file_size'=>$filename['file_size'],
					'file_extension'=>$filename['file_ext'],
                	'admin_id'=>$this->session->userdata('id'),
					'cl_aid'=>$this->input->post("id"),
					'section'=>1,
					'loan_type'=>2,
            	);
				$rsid=$this->PP_Credit_Scholar_Model->insertRow('system_docs',$data);
				
				$output=array('success' => $filesCount." files successfully upload.");
			}
		   }
		   if(!empty($output['success'])){
		  		$details="Account Manager ".$filesCount." files upload in system documents.";
				$history_arr=array(
					"cl_aid" =>$this->input->post("id"),
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>trim($this->input->post("customar_id")),
					"loan_type"=>2,
					"comment" =>$details,			
					"created" =>date('Y-m-d H:i:s')
				);
				$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
			}
		   echo json_encode($output); 
		   
		  }		
		}

		public function uploadfile_check_list(){
		sleep(2);
			  if($_FILES["files"]["name"] != '')
			  {
			   $output = '';
			   $config["upload_path"] = './assets/consumer_loan/check-list-customer/';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);			   
			   for($count =0; $count<$filesCount; $count++)
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
				 	$filename = $this->upload->data();				
					 $data= array(
							'filesname'=>$filename['file_name'],
							'raw_name'=>$_FILES["files"]['name'][$count],
							'file_path'=>$filename['file_path'],
							'full_path'=>$filename['full_path'],						
							'file_type'=>$filename['file_type'],
							'file_size'=>$filename['file_size'],
							'file_extension'=>$filename['file_ext'],
							'admin_id'=>$this->session->userdata('id'),
							'cl_aid'=>$this->input->post("id"),
							'section'=>2,
							'loan_type'=>2,
						);
						$rsid=$this->PP_Credit_Scholar_Model->insertRow('system_docs',$data);
						$output=array('success' => $filesCount." files successfully upload.");
					}
			   }
			  		if(!empty($output['success'])){
			   			$details="Account Manager ".$filesCount." files upload in check list customer documents.";
						$history_arr=array(
							"cl_aid" =>$this->input->post("id"),
							"admin_id" =>$this->session->userdata('id'),
							"customar_id" =>trim($this->input->post("customar_id")),
							"loan_type"=>2,
							"comment" =>$details,			
							"created" =>date('Y-m-d H:i:s')
						);
						$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
					}
			   echo json_encode($output); 
			   
			  }
	}

		public function downloadall(){
        $createdzipsystemdocs = 'systemdocs';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Credit_Scholar_Model->get_filedata($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths = './assets/consumer_loan/system-docs/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
    }

    public function downloadallCheckList(){
        $createdzipchecklist = 'checklist-customer-documents';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Credit_Scholar_Model->get_check_list_customer_documents($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');

        foreach ($files as $file) {			
            $paths = './assets/consumer_loan/check-list-customer/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipchecklist.'.zip');
    }

    public function uploadfile_risk_analysis(){
		//print_r($_POST); //exit;
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/riskanalysis/';
		   //$config["allowed_types"] = 'pdf|doc|docx|gif|jpg|png';
		  	$config["allowed_types"] = '*';
		   	$config['max_size'] = '0';
		   	$config['encrypt_name'] = FALSE;
		   	$config['remove_spaces'] = TRUE;
		   $this->load->library('upload', $config);
		   $this->upload->initialize($config);
		   
		   $filesCount = count($_FILES['files']['name']);				   
		   for($count =0; $count<$filesCount; $count++)
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
					$filedata= array(							
						'admin_id'=>trim($this->session->userdata('id')),
						'cl_aid'=>trim($this->input->post("id")),
						'filesname'=>$filename['file_name'],
						'raw_name'=>$_FILES["files"]["name"][$count],
						'file_path'=>$filename['file_path'],
						'full_path'=>$filename['full_path'],						
						'file_type'=>$filename['file_type'],
						'file_size'=>$filename['file_size'],
						'file_extension'=>$filename['file_ext'],
						"loan_type"=>2,	
						'section'=>2,						
					);

					//print_r($filedata); exit;			
					$rsid=$this->PP_Credit_Scholar_Model->insertRow('riskanalysis',$filedata);
					$output=array('success' => $filesCount." files successfully upload.");
					}
				}

				if(!empty($output['success'])){
					$details="Risk Analysis Documents ".$filesCount." files upload.";
					$history_arr=array(
						"cl_aid" =>$this->input->post("id"),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>trim($this->input->post("customar_id")),
						"loan_type"=>2,
						"comment" =>$details,			
						"created" =>date('Y-m-d H:i:s')
					);
					$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
				}		   
		   echo json_encode($output); 
		   
		}
	}

	public function download_analysisfiles(){
		//print "hello"; exit;
        $createdzipsystemdocs = 'riskanalysis';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download'); 
		//$paths='';		
        $files = $this->PP_Credit_Scholar_Model->get_risk_analysisfile($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths= './assets/riskanalysis/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths)); 			   
        }		
        $this->zip->download($createdzipsystemdocs.'.zip');
    }

    public function interaction_email()
    {
        error_reporting(0);
    	$row_array=array();
    	$recordmail=$this->Common_model->get_admin_details(2);
    	$config['mailtype'] = 'html';
    	$this->load->library('email',$config);
    	
    	$this->form_validation->set_rules('field_name', 'Nom et Pr??noms', 'required');
    	$this->form_validation->set_rules('fieldemail', 'Email Field One', 'required|trim|valid_email');
    	$this->form_validation->set_rules('fieldsubject', 'Subject Field One', 'required');
    	$this->form_validation->set_rules('fieldmsg', 'Message Field One', 'required');

    	if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo validation_errors();
        }
        else
        {    
            $maildata = array(			
                'field_name' =>trim($this->input->post('field_name')),
                'fieldemail' =>trim($this->input->post('fieldemail')),
                'fieldsubject' => $this->input->post('fieldsubject'),
                'fieldmsg' => $this->input->post('fieldmsg'),                    
            );
            array_push($row_array, $maildata);
		    $databinding=json_encode($row_array);
    		$data=array(
    			'cl_aid'=>trim($this->input->post('cap_id')),
    			'admin_id' =>trim($this->session->userdata('id')),
    			'mailcontent' =>trim($databinding),
    			'mode'=>trim('Email'),
    			'loan_type' =>2,
    			'section' =>2,
    			'status'=>1,
    		);
            $rsid=$this->PP_Credit_Scholar_Model->insertRow('interaction_history',$data);        
            $body= '<table border="1" width="350px">
				  <tr>
				    <td width="20%"><strong>Nom et Pr??noms</strong></td>
				    <td width="80%">'.$this->input->post("field_name").'</td>
				  </tr>
				    <tr>
				    <td width="20%"><strong>Message</strong></td>
				    <td width="80%">'.$this->input->post("fieldmsg").'</td>
				  </tr>					  
				</table>';
				$config['mailtype'] = 'html';
				$this->email->set_mailtype("html");		    	
    			$this->load->library('email',$config);
    		    $emailto = $this->input->post("fieldemail");   
    		    $this->email->from($this->session->userdata('email'),$recordmail[0]->type);
    		    $this->email->to($emailto, $this->input->post("field_name"));
    		    $this->email->cc('naveenrdy9@gmail.com'); 
    		    $this->email->subject('Consumer Loans-Interaction'. $this->input->post("fieldsubject"));
    		    $this->email->message($body);		    
    		    $send = $this->email->send();
    		    if ($send) {
    		       echo 'success';
    		    } else {
    		       echo 'error' .$this->email->print_debugger();
    		       //$data=array('status'=>0);
    		       $this->PP_Credit_Scholar_Model->updateRow('interaction_history', 'id',$rsid,array('status'=>0));
    		    }
		}
    }

    /*Collateral Section*/

    public function uploadfile_collateral_vehicule()
	{		
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
						'cl_aid'=>$this->input->post('cap_id'),
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
					$getid=$this->PP_Credit_Scholar_Model->insertRow('collateral',$data);
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
							$rsid=$this->PP_Credit_Scholar_Model->insertRow('collateral_files',$filedata);
							$details="Collateral V??hicule ".$filesCount." file upload.";
							$history_arr=array(
								"cl_aid" =>$this->input->post('cap_id'),
								"admin_id" =>$this->session->userdata('id'),
								"customar_id" =>$this->input->post('vcustomar_id'),
								"loan_type"=>2,
								"comment" =>$details,			
								"created" =>date('Y-m-d H:i:s')
							);
							$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
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
							'cl_aid'=>$this->input->post('cap_id'),
							'admin_id'=>trim($this->session->userdata('id')),						
							'customer_id'=>$this->input->post('customar_id'),
							'selected_field'=>trim($this->input->post('collateraltype')),					
							'd_numero_de_compte'=>$this->input->post('d_numero_de_compte'),
							'd_montant'=>$this->input->post('d_montant'),
							'loan_type'=>2,
							'section'=>2,
						);
						$getid=$this->PP_Credit_Scholar_Model->insertRow('collateral',$data);
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
								$rsid=$this->PP_Credit_Scholar_Model->insertRow('collateral_files',$filedata);
								$details="Collateral D??posit ".$filesCount." files upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cap_id'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>2,
									"comment" =>$details,			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
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
						'cl_aid'=>$this->input->post('cap_id'),
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
					$getid=$this->PP_Credit_Scholar_Model->insertRow('collateral',$data);
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
								$rsid=$this->PP_Credit_Scholar_Model->insertRow('collateral_files',$filedata);
								$details="Collateral Maison ".$filesCount." files upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cap_id'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>2,
									"comment" =>$details,			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
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
				'cl_aid'=>$this->input->post('cap_id'),
				'admin_id'=>trim($this->session->userdata('id')),
				'customer_id'=>trim($this->input->post("customar_id")),	
				'selected_field'=>trim($this->input->post('collateraltype')),
				'section'=>2,
				'loan_type'=>2,
			);
			$getid=$this->PP_Credit_Scholar_Model->insertRow('collateral',$data);
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
					$rsid=$this->PP_Credit_Scholar_Model->insertRow('collateral_files',$filedata);
					$details="Collateral Excemption ".$filesCount." files upload.";
					$history_arr=array(
						"cl_aid" =>$this->input->post('cap_id'),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>$this->input->post('customar_id'),
						"loan_type"=>2,
						"comment" =>$details,			
						"created" =>date('Y-m-d H:i:s')
					);
					$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
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
		$collateralfiles=$this->PP_Credit_Scholar_Model->get_collateralFiles($this->input->post('id'));
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
        $files = $this->PP_Credit_Scholar_Model->get_collateralFiles($id);         
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
        $files = $this->PP_Credit_Scholar_Model->get_collateralFiles($id);         
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
        $files = $this->PP_Credit_Scholar_Model->get_collateralFiles($id);         
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
        $files = $this->PP_Credit_Scholar_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/excemption/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	//==========================today 24-06-2019======================================
	public function riskanalysis_current_monthly_credit()
	{
		$recordcheck=$this->PP_Credit_Scholar_Model->check_riskanalysis_current_monthly_credit($this->input->post('cap_id'));
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cap_id')),
			'customer_id' => $this->input->post('customar_id'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>2,
			'cresco'=> $this->input->post('cresco_current'),
			'decouvert' => $this->input->post('decouvert_current'),
			'cmt' => $this->input->post('cmt_current'),
			'cct' => $this->input->post('cct_current'),
			'total_clc' => $this->input->post('total_clc'),
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Credit_Scholar_Model->updateRow('riskanalysis_current_monthly_credit', 'rcic_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Credit_Scholar_Model->insertRow('riskanalysis_current_monthly_credit',$data);
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
		
		$recordcheck=$this->PP_Credit_Scholar_Model->check_riskanalysis_monthly_payment_new_loan($this->input->post('rcapid'));
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('rcapid')),
			'customer_id' => $this->input->post('rcustomarid'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>2,
			'cresco'=> $this->input->post('cresco_monthly'),
			'decouvert' => $this->input->post('decouvert_monthly'),
			'cmt' => $this->input->post('cmt_monthly'),
			'cct' => $this->input->post('cct_monthly'),
			'total_mlc' => $this->input->post('total_mlc'),
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Credit_Scholar_Model->updateRow('riskanalysis_monthly_payment_new_loan', 'rmic_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Credit_Scholar_Model->insertRow('riskanalysis_monthly_payment_new_loan',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}			
	}
	
	public function riskanalysis_financial_situation()
	{
		$recordcheck=$this->PP_Credit_Scholar_Model->check_riskanalysis_financial_situation($this->input->post('cap_id'));		
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cap_id')),
			'customer_id' => $this->input->post('customer_id'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>2,
			'net_salary'=> $this->input->post('net_salary'),
			'income_ratio' => $this->input->post('income_ratio'),
			'quotitecessible' => $this->input->post('quotitecessible'),
			'current_monthly_payments' => $this->input->post('current_monthly_payments'),
			'new_monthly_payment' => $this->input->post('new_monthly_payment'),
			'situation_total' => $this->input->post('situation_total'),
			'income_ratio_after' => $this->input->post('income_ratio_after'),
			'coeficientendettement' => $this->input->post('coeficientendettement'),
		);
		if(!empty($recordcheck)){
				$edit=$this->PP_Credit_Scholar_Model->updateRow('riskanalysis_financial_situation', 'rfs_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Credit_Scholar_Model->insertRow('riskanalysis_financial_situation',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
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
			$comnt .='Account Manager '.trim($this->input->post('decision')).' this loan. '.$this->input->post('commentstatus').'|';
			$fata2=array(		
				'manager_id'=>trim($this->input->post('account_manager_id')),
				'branch_id'=>trim($this->input->post('branch_id')),
				'account_manager_id'=>trim($this->input->post('account_manager_id')),
				'customar_id'=>trim($this->input->post('customar_id')),		
				'loan_id'=>trim($this->input->post('cap_id')),
				'decision'=>trim($this->input->post('decision')),
				'commentstatus'=>trim($this->input->post('commentstatus')),
				'loantype'=>2,
				'modified'=>date('Y-m-d H:i:s'),
			);
			$insert=$this->PP_Credit_Scholar_Model->insertRow('branmanager_approbation',$fata2);
			if($insert){

				if($this->input->post('decision')=="Avis d??favorable") /*Reject*/
				{
					$status = array(
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
					);
				}
				else if($this->input->post('decision')=="Avis Favorable")
				{
					$status = array(
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>1,
						'branchmanager_status'=>'Process',
						'modified'=>date("Y-m-d H:i:s"),
					);
				}	
				else{
					$status = array(
						'loan_status'=>trim($this->input->post('decision')),
						'modified'=>date('Y-m-d H:i:s'),
						'a_review'=>0,
						'branchmanager_status'=>trim($this->input->post('decision')),
						'b_review'=>0,
						'dcpranalyst_status'=>trim($this->input->post('decision')),
						'an_review'=>0,
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
				$this->PP_Credit_Scholar_Model->updateRow('customar_applicationform','cap_id', $this->input->post('cap_id'), $status);
				$msg2=str_replace('|', ', ', $comnt);
				$details=$msg2;

				$history_arr=array(
					"cl_aid" =>trim($this->input->post('cap_id')),
					"admin_id" =>trim($this->input->post('account_manager_id')),				
					"comment" =>$details,
					"loan_type"=>2,	
					'content_type'=>'text',	
					"customar_id" =>trim($this->input->post("customar_id")),		
					"created" =>date('Y-m-d H:i:s')
				);
				$res=$this->PP_Credit_Scholar_Model->insertRow('tracking_timeline',$history_arr);
				$output=array('success' =>"Decision successfully updated.");
				
				### 
				### Send Mail To Higher Official
				###
				$cap_id = $this->input->post('cap_id'); // loan id
				$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($cap_id);
				if(!empty($sendMailToHigherOfficial)) {
					$output = $sendMailToHigherOfficial;
				}

			}else{
				$output=array('error' =>"Unable update to record");
			}
		}
		echo json_encode($output);
	}

	public function postupdate_fees(){	  
		sleep(1);		
			$eid=$this->input->post('id');
			$update=$this->PP_Credit_Scholar_Model->updateRow('customar_other_information','oid', $this->input->post('id'), array('frais_de_dossier'=>trim($this->input->post('data'))));
			if($update){
				echo 1;
			}else{
				echo 0;
			}	
	}

	/*============================Today modify on 11-07-2019=============================*/
	/*Change Type Id*/
	public function changetypeid()
	{
		sleep(2);		
		$udata=array("type_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Credit_Scholar_Model->updateRow('customer_additionalinformation','ai_id', $this->input->post('ai_id'), $udata);
		if($udata){echo 1;}else{echo 0;}
	}
	public function changesecteurs()
	{
		sleep(2);	
		//print_r($_POST); exit;	
		$udata=array("secteurs_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Credit_Scholar_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('ai_id'), $udata);
		if($udata){echo 1;}else{echo 0;}
	}
	public function changecat_employeurs()
	{
		sleep(2);	
		//print_r($_POST); exit;	
		$udata=array("cat_emp_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Credit_Scholar_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
		if($udata){echo 1;}else{echo 0;}
	}

	public function change_type_of_contract()
	{
		sleep(2);	
		//print_r($_POST); exit;	
		$udata=array("contract_type_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Credit_Scholar_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
		if($udata){echo 1;}else{echo 0;}
	}

	public function change_objet_of_the_credit()
	{
		sleep(2);
		$output = '';
		//print_r($_POST); exit;
		$obj_arr = array();
		$objcredit = array(
		    "Consomation",
		    "Equipement",
		    "Immobilier",
		    "Scolaire",
		    "Autres",
		  );
		foreach ($objcredit as $key ) {
			$obj_arr[] = array("name" => $key);
		}			
		$udata=array("objet_credit" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Credit_Scholar_Model->updateRow('customar_other_information','oid', $this->input->post('oid'), $udata);
		if($udata){
			$output=$obj_arr;
		}else{			
			$output=array('error'=>"error");
		}
		echo json_encode($output);
	}


	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST);
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->PP_Credit_Scholar_Model->checkloanstatuslist(trim($this->input->post('filter')));

		
		$html=null;
		if(!empty($recordcheck)){
			foreach ($recordcheck as $key) {
				$time_ago=$key['created'];
				$row = array();
				$html .="<tr>
				<td> ".$key['application_no']."</td>
				<td> ".$key['account_number']."</td>
				<td> ".$key['branch_name']."</td>
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>
				<td> ".$key['ltype']."</td>
				<td>".date('d-m-Y', strtotime($key['created']))." :";
				if(timeAgo($time_ago) >= 48){
					if($key['loan_status']=="Process" || $key['loan_status']=="Demande de retraitement"){
						$html .="<span class='blink' style='color:red'>".timeAgo($time_ago)."</span>";
					}else{
						$html .= timeAgo($time_ago);
					}
				}else{
					$html .= timeAgo($time_ago);
				}				
				$html .="</td>			
						<td>CFA ".number_format($key['loan_amt'],0,',',' ')."</td>
						<td> ".$key['loan_interest']."%</td>
						<td> ".$key['loan_term']."</td>
						<td>";						
							if($key['loan_status']=='Avis d??favorable')
							{
								$label='label label-danger ui-draggable';
							}else if($key['loan_status']=='Confirm Disbursement')
							{
								$label='label label-success';
							}
							else if($key['loan_status']=='Avis Favorable')
							{
								$label='label label-info';
							}	
							else{
								$label="label label-primary";
							}
							
					$html .="<span class='$label'> ".$key['loan_status']."</span>
					</td>
					<td class=\"sorting_1\">
						<a href=\"".base_url('PP_Credit_Scholar/customer_details/').$key['cap_id']."\" class=\"table-link\">
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

	/*===========Today 12-07-2019================*/

	public function add_newcustomer()
	{
		//print_r($_POST); exit;
		//print_r($this->input->post(),1);
		$dob=date("Y-m-d", strtotime($this->input->post('dob')));
		
		$employment_date=date("Y-m-d", strtotime($this->input->post('employment_date')));
		$edn_date_contract_cdd=date("Y-m-d", strtotime($this->input->post('edn_date_contract_cdd')));
		$opening_date=date("Y-m-d", strtotime($this->input->post('opening_date')));
		$expiration_date=date("Y-m-d", strtotime($this->input->post('expiration_date')));

		
		sleep(2);
		$tbl_cus_field=array(
			"admin_id"=>$this->session->userdata('id'),
			"aid"=>1,
			"account_name"=>$this->input->post('bank_name') ?? "",
			"account_number"=>trim($this->input->post('accoumt_number')) ?? "",
			"dob"=>trim($dob),
			"address"=>$this->input->post('resides_address') ?? "",
			"emp_name"=>trim($this->input->post('emp_name')) ?? "",
			"phone"=>$this->input->post('main_phone') ?? "",
			"created"=>date('Y-m-d H:i:s'),
		);		
		$getid=$this->PP_Credit_Scholar_Model->insertRow('tbl_customers',$tbl_cus_field);

		if($getid){

			//echo $getid;
			$tbl_customer_personalinformation=array(
				"customar_id"=>$getid,
				"first_name"=>$this->input->post('first_name') ?? "",
				"middle_name"=>$this->input->post('middle_name') ?? "",
				"last_name"=>$this->input->post('last_name') ?? "",
				"gender"=>$this->input->post('gender') ?? "",
				"dob"=>trim($dob),
				"education"=>$this->input->post('education') ?? "",
				"marital_status"=>$this->input->post('marital_status') ?? "",
				"email"=>trim($this->input->post('email')) ?? "",
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Credit_Scholar_Model->insertRow('customer_personalinformation',$tbl_customer_personalinformation);

			$tbl_customer_additionalinformation=array(
				"customar_id"=>$getid,
				"type_id"=>trim($this->input->post('typeofid')),
				"monthly_income"=>$this->input->post('monthly_income') ?? "",
				"monthly_expenses"=>$this->input->post('monthly_expenses') ?? "",
				"id_number"=>$this->input->post('id_number'),
				"state_of_issue"=>trim($this->input->post('state_of_issue')) ?? "",
				"occupation"=>$this->input->post('occupation') ?? "",
				"main_phone"=>$this->input->post('main_phone') ?? "",
				"alternative_phone"=>trim($this->input->post('alter_phone')) ?? "",
				"expiration_date_id"=>trim($expiration_date),			
				"created"=>trim($this->input->post('alter_phone')) ?? "",
				"room_type"=>trim($this->input->post('room_type')) ?? "",
				"father_fullname"=>trim($this->input->post('father_fullname')) ?? "",
				"mother_fullname"=>trim($this->input->post('mother_fullname')) ?? "",
			);
			$this->PP_Credit_Scholar_Model->insertRow('customer_additionalinformation',$tbl_customer_additionalinformation);
			
			$tbl_customar_employment_information=array(
				"customar_id"=>$getid,
				"emp_id"=>1,
				"employer_name"=>trim($this->input->post('emp_name')) ?? "",
				"secteurs_id"=>$this->input->post('secteurs') ?? "",
				"cat_emp_id"=>$this->input->post('cat_employeurs') ?? "",
				"contract_type_id"=>$this->input->post('typeofcontract') ?? "",
				"employment_date"=>trim($employment_date),
				"sate_end_contract_cdd"=>trim($edn_date_contract_cdd),
				"years_professionel_experience"=>trim($this->input->post('years_professionel_experience')) ?? "",
				"how_he_is_been_with_current_employer"=>trim($this->input->post('current_emp')) ?? "",
				"emp_net_salary"=>trim($this->input->post('net_salary')) ?? "",
				"retirement_age_expected"=>trim($this->input->post('retirement_age_expected')) ?? "",
				"fees"=>0,
				"commisiion"=>0,
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Credit_Scholar_Model->insertRow('customar_employment_information',$tbl_customar_employment_information);

			$tbl_customer_address=array(
				"customar_id"=>$getid,
				"admin_id"=>2,
				"city_id"=>trim($this->input->post('city')) ?? "",
				"state_id"=>$this->input->post('state') ?? "",
				"street"=>$this->input->post('street') ?? "",
				"resides_address"=>trim($this->input->post('resides_address')) ?? "",
				"created"=>date('Y-m-d H:i:s'),
			);

			$this->PP_Credit_Scholar_Model->insertRow('customer_address',$tbl_customer_address);

			$tbl_customar_bank_account=array(
				"customar_id"=>$getid,			
				"account_type"=>trim($this->input->post('account_type')) ?? "",
				"account_no"=>trim($this->input->post('accoumt_number')) ?? "",
				"bank_name"=>trim($this->input->post('bank_name')) ?? "",
				"bank_phone"=>$this->input->post('bank_phone') ?? "",
				"opening_date"=>$opening_date,
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Credit_Scholar_Model->insertRow('customar_bank_account',$tbl_customar_bank_account);

			$tbl_customar_other_information=array(
				"customar_id"=>$getid,
				"admin_id"=>2,			
				"information"=>"null",
				"field_1"=>trim($this->input->post('bank_code')) ?? "",
				"field_2"=>trim($this->input->post('agency_code')) ?? "",
				"field_3"=>$this->input->post('rib_key') ?? "",
				"field_4"=>trim($this->input->post('cc_test')) ?? "",
				"objet_credit"=>trim($this->input->post('obj_credit')) ?? "",
				"frais_de_dossier"=>trim($this->input->post('frais_de_dossier')) ?? "",
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Credit_Scholar_Model->insertRow('customar_other_information',$tbl_customar_other_information);

			echo "success";
		}else{
			echo "error";
		}
	}

	/*Today 19-07-2018 Update*/
	public function enableddisabled()
	{
		//print_r($_POST); exit;
		/*[capid] => 96
	    [post] => V??hicule
	    [val] => 0*/

	    if(!empty($this->input->post('post')))
	    {
	    	if($this->input->post('post')=="V??hicule")
	    	{
	    		$data=array('check_vehicule' =>trim($this->input->post('val')));
	    		$update=$this->PP_Credit_Scholar_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}
	    	if($this->input->post('post')=="D??posit")
	    	{
	    		$data=array('check_deposit' =>trim($this->input->post('val')));
	    		$update=$this->PP_Credit_Scholar_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	} 
	    	if($this->input->post('post')=="Maison")
	    	{
	    		$data=array('check_maison' =>trim($this->input->post('val')));
	    		$update=$this->PP_Credit_Scholar_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}

	    	if($this->input->post('post')=="Excemption")
	    	{
	    		$data=array('check_excemption' =>trim($this->input->post('val')));
	    		$update=$this->PP_Credit_Scholar_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}




	    }
	}
	

	public function memo_of_setting_up()
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
		$this->data['appformD']=$this->PP_Credit_Scholar_Model->get_customar_applicationform_details($id);
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
		return  $this->load->view('superadmin/BilletOrdre',$this->data,true);
	}

	public function profile(){
		$this->data['title'] = 'DCP | Profile';
		$this->data['record']=$this->Common_model->get_admin_details(1);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/profile', $this->data);
	
	}

	public function settings(){	
		$this->data['title'] = 'DCP |  Settings';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/settings', $this->data);
	}

	public function updateprofile()
	{
		date_default_timezone_set('GMT');
		$editid=trim($this->input->post('userid'));	
		$avatarid=trim($this->input->post('avatar_id'));
		sleep(2);
		if(!empty(trim($this->input->post('first_name'))) && !empty(trim($this->input->post('last_name'))))
		{
			$username=trim($this->input->post('first_name')).' '.trim($this->input->post('last_name'));
		}else{
			$username=trim($this->input->post('first_name'));
		}
		if($this->input->post('newpassword')!='' && $this->input->post('confirmpassword')!='')
		{	
			$this->form_validation->set_error_delimiters('<span>', '</span>');		
			$this->form_validation->set_rules('newpassword', 'new password', 'required');
			$this->form_validation->set_rules('confirmpassword', 'confirm password', 'required|matches[newpassword]');
			if($this->form_validation->run() == false) {
			 	$this->data['message'] =array('error' =>validation_errors());				
			}else{
				$tempdata=array(
					'uid'=>$editid,
					'pass'=>trim($this->input->post('newpassword')),
					'created'=>date('Y-m-d H:i:s'),
				);
				$result=$this->PP_Credit_Scholar_Model->insertRow('temp_pass',$tempdata);      	
				if(!empty($_FILES["file"]["name"]))
				{
					$config['upload_path'] = './assets/user-profile-img/';
			        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
			        $config['max_size'] = 1024 * 8;
			        $config['encrypt_name'] = TRUE;
			        $config['file_name'] = $_FILES['file']['name'];
			        $this->load->library('upload',$config);
			        $this->upload->initialize($config); 
			       	if($this->upload->do_upload('file'))
			       	{
			       			unlink('./assets/user-profile-img/'.$this->input->post('avatar'));
			       			$uploadData = $this->upload->data();
			       			$picture = $uploadData['file_name'];

			       			$img_arr=array(
								"file_name" => $uploadData['file_name'],
								"file_type" => $uploadData['file_type'],
								"file_path" => $uploadData['file_path'],
								"full_path" => $uploadData['full_path'],
								"raw_name" => $uploadData['raw_name'],
								"orig_name" => $uploadData['orig_name'],
								"client_name" => $uploadData['client_name'],
								"file_ext" => $uploadData['file_ext'],
								"file_size" => $uploadData['file_size'],
								"is_image" => $uploadData['is_image'],
								"image_width" => $uploadData['image_width'],
								"image_height" => $uploadData['image_height'],
								"image_type" => $uploadData['image_type'],
								"image_size_str" => $uploadData['image_size_str'],
							);
							$update=$this->PP_Credit_Scholar_Model->updateRow('avatar', 'fid', $avatarid, $img_arr);	

							$data=array(
								"first_name"=>trim($this->input->post('first_name')),
								"last_name"=>trim($this->input->post('last_name')),
								"gender"=>trim($this->input->post('gender')),				
								"avatar"=>trim($picture),
								"user_name"=>$username,
								"avatar_id"=>trim($avatarid),
								);
							$edit=$this->PP_Credit_Scholar_Model->updateRow('user', 'id',$editid, $data);
							if($edit){
								$this->data['message']=array('success' =>'success');
							}else{
								$this->data['message']= array('error' => 'error');
								
							}
				    }else{
				    	$this->data['message']= $this->upload->display_errors();
				    }
		       }else{
					$data=array(
						"first_name"=>trim($this->input->post('first_name')),
						"last_name"=>trim($this->input->post('last_name')),
						"gender"=>trim($this->input->post('gender')),
						"user_name"=>$username,
						"password" =>password_hash($this->input->post('newpassword'), PASSWORD_DEFAULT),
						"avatar"=>trim($this->input->post('avatar')),	
					);
				$edit=$this->PP_Credit_Scholar_Model->updateRow('user', 'id',$editid, $data);
				if($edit){
					$this->data['message']=array('success' =>'success');
				}else{
					$this->data['message']=array('error' =>'error');
				}
			}
		}				
		}else{			
			if(!empty($_FILES["file"]["name"]))
			{
				$config['upload_path'] = './assets/user-profile-img/';
		        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
		        $config['max_size'] = 1024 * 8;
		        $config['encrypt_name'] = TRUE;
		        $config['file_name'] = $_FILES['file']['name'];
		        $this->load->library('upload',$config);
		        $this->upload->initialize($config); 
		       		if($this->upload->do_upload('file'))
		       		{
		       			unlink('./assets/user-profile-img/'.$this->input->post('avatar'));
		       			$uploadData = $this->upload->data();
		       			$picture = $uploadData['file_name'];

		       			$img_arr=array(
							"file_name" => $uploadData['file_name'],
							"file_type" => $uploadData['file_type'],
							"file_path" => $uploadData['file_path'],
							"full_path" => $uploadData['full_path'],
							"raw_name" => $uploadData['raw_name'],
							"orig_name" => $uploadData['orig_name'],
							"client_name" => $uploadData['client_name'],
							"file_ext" => $uploadData['file_ext'],
							"file_size" => $uploadData['file_size'],
							"is_image" => $uploadData['is_image'],
							"image_width" => $uploadData['image_width'],
							"image_height" => $uploadData['image_height'],
							"image_type" => $uploadData['image_type'],
							"image_size_str" => $uploadData['image_size_str'],
						);
						$update=$this->PP_Credit_Scholar_Model->updateRow('avatar', 'fid', $avatarid, $img_arr);	

						$data=array(
							"first_name"=>trim($this->input->post('first_name')),
							"last_name"=>trim($this->input->post('last_name')),
							"gender"=>trim($this->input->post('gender')),				
							"avatar"=>trim($picture),
							"user_name"=>$username,
							"avatar_id"=>trim($avatarid),
							);
						$edit=$this->PP_Credit_Scholar_Model->updateRow('user', 'id',$editid, $data);
						if($edit){
							$this->data['message']=array('success' =>'success');
						}else{
							$this->data['message']= array('error' => 'error');
						}
					}
			}else{
				
				$data=array(
					"first_name"=>trim($this->input->post('first_name')),
					"last_name"=>trim($this->input->post('last_name')),
					"gender"=>trim($this->input->post('gender')),				
					"avatar"=>trim($this->input->post('avatar')),
					"user_name"=>$username,	
				);
				$edit=$this->PP_Credit_Scholar_Model->updateRow('user', 'id',$editid, $data);
				if($edit){
					$this->data['message']=array('success' =>'success');					
				}else{
					$this->data['message']= array('error' => 'error');
				}
			}
		}
		echo json_encode($this->data['message']);
		
	}	

	/**
	 * Update customer details
	 */
  public function customer_details_update() 
  {
	 	# Get form data
	 	$input = $this->input->post();
  
		##
		## Update personal information
		##
		$pid = $input['pid'];
		# build body
		$body = [];
		$body['first_name'] = $input['first_name'] ?? "";
		$body['middle_name'] = $input['middle_name'] ?? "";
		$body['last_name'] = $input['last_name'] ?? "";
		$body['gender'] = $input['gender'] ?? "";
		$body['dob'] = date("Y-m-d",strtotime($input['dob']));	
		$body['education'] = $input['education'] ?? "";
		$body['marital_status'] = $input['marital_status'] ?? "";
		$body['email'] = $input['email'] ?? "";
		# Update personal info
		$updatePI = $this->db->where('pid',$pid)->update("customer_personalinformation",$body);
	              
    ##
    ##  additional information
	##
	
	if(empty($input['ai_id'])){		

		$tbl_customer_additionalinformation = array(
		"customar_id"=>$input['id'],
		'monthly_income' => $input['monthly_income'] ?? "",
		'monthly_expenses' => $input['monthly_expenses'] ?? "",
		'type_id' => "",	
		'id_number' => $input['id_number'] ?? "",
		'state_of_issue' => $input['state_of_issue'] ?? "",
		'occupation' => $input['occupation'] ?? "",
		'main_phone' => $input['full_main_number'] ?? "",
		'alternative_phone' => $input['full_alternate_number'] ?? "",
		'expiration_date_id' => date("Y-m-d",strtotime($input['expiration_date_id'])),	
		'room_type' => $input['room_type'] ?? "",
		'father_fullname' => $input['father_fullname'] ?? "",
	    'mother_fullname' => $input['mother_fullname'] ?? "", 
		);	
	$this->PP_Consumer_Loans_Model->insertRow('customer_additionalinformation',$tbl_customer_additionalinformation);
  } else {
		$cid = $input['cid'];
    # build body
    $body = [];
    $body['monthly_income'] = $input['monthly_income'] ?? "";
    $body['monthly_expenses'] = $input['monthly_expenses'] ?? "";
    $body['id_number'] = $input['id_number'] ?? "";
    $body['state_of_issue'] = $input['state_of_issue'] ?? "";
    $body['occupation'] = $input['occupation'] ?? "";
    $body['main_phone'] = $input['full_main_number'] ?? "";
    $body['alternative_phone'] = $input['full_alternate_number'] ?? "";
	$body['expiration_date_id'] = date("Y-m-d",strtotime($input['expiration_date_id']));	
	$body['room_type'] = $input['room_type'] ?? "";
	$body['father_fullname'] = $input['father_fullname'] ?? "";
	$body['mother_fullname'] = $input['mother_fullname'] ?? "";  
    # Update additional info
    $updatePI = $this->db->where('customar_id',$cid)->update("customer_additionalinformation",$body);
  }
 
   ##
	##  employment information
	##
	
	if(empty($input['emp_infoid'])){
	
		# build body and insert 
		$tbl_customar_employment_information = array(
		"customar_id"=>$input['id'],
		'emp_id' => "",
		'employer_name' => $input['employer_name'] ?? "",
		'cat_emp_id' => "",
		'secteurs_id' => $input['secteurs'] ?? "",		
		'employment_date' => date("Y-m-d",strtotime($input['employment_date'])),
		'sate_end_contract_cdd' => date("Y-m-d",strtotime($input['sate_end_contract_cdd'])),
		'years_professionel_experience' => $input['years_professionel_experience'] ?? "",		
		'how_he_is_been_with_current_employer' => $input['how_he_is_been_with_current_employer'] ?? "",		
		'emp_net_salary' => (int)(str_replace(' ', '', $input['emp_net_salary'])) ?? 0,
		'retirement_age_expected' => $input['retirement_age_expected'] ?? "",
		'fees' => "",
		'commisiion' => "",	
		);
		$this->PP_Consumer_Loans_Model->insertRow('customar_employment_information',$tbl_customar_employment_information);
	  } else {
		$emp_infoid = $input['emp_infoid'];
		# build body  
		$body = [];
		$body['employer_name'] = $input['employer_name'] ?? "";
		$body['secteurs_id'] = $input['secteurs'] ?? ""; 		
		$body['employment_date'] = date("Y-m-d",strtotime($input['employment_date']));
		$body['sate_end_contract_cdd'] = date("Y-m-d",strtotime($input['sate_end_contract_cdd']));
		$body['years_professionel_experience'] = $input['years_professionel_experience'] ?? "";		
		$body['how_he_is_been_with_current_employer'] = $input['how_he_is_been_with_current_employer'] ?? "";		
		$body['emp_net_salary'] = (int)(str_replace(' ', '', $input['emp_net_salary'])) ?? 0;
		$body['retirement_age_expected'] = $input['retirement_age_expected'] ?? "";
	
		## Update employment information 
		$updatePI = $this->db->where('emp_infoid',$emp_infoid)->update("customar_employment_information",$body);
	  }
	##
	## Update address
	##
	if(empty($input['add_id'])){
		# build body
		$tbl_customer_address =array(
		"customar_id"=>$input['id'],
		"admin_id"=>"",		
		'resides_address' => $input['resides_address'] ?? "",
		'city_id' => $input['city_id'] ?? "",
		'state_id' => $input['state_id'] ?? "",
		'street' => $input['street'] ?? "",	
		);
		$this->PP_Consumer_Loans_Model->insertRow('customer_address',$tbl_customer_address);
  } else {

	$add_id = $input['add_id'];
    # build body
    $body = [];
    $body['resides_address'] = $input['resides_address'] ?? "";
    $body['city_id'] = $input['city_id'] ?? "";
    $body['state_id'] = $input['state_id'] ?? "";
	$body['street'] = $input['street'] ?? "";	
    ## Update address
    $updatePI = $this->db->where('add_id',$add_id)->update("customer_address",$body);
}

   ##
    ## Update bank information
	##

	if(empty($input['cbk_id'])){
		
		# build body
		$tbl_customar_bank_account = array(
		"customar_id"=>$input['id'],
		'account_type' => $input['account_type'] ?? "",
		'account_no' => $input['account_number'] ?? "",
		'bank_name' => $input['account_name'] ?? "",
		'bank_phone' => $input['bank_phone'] ?? "",
		'opening_date' => date("Y-m-d",strtotime($input['opening_date'])),
		);
		$this->PP_Consumer_Loans_Model->insertRow('customar_bank_account',$tbl_customar_bank_account);
  } else {
	  $cbk_id = $input['cbk_id'];
    # build body
    $body = [];
    $body['account_type'] = $input['account_type'] ?? "";
    $body['account_no'] = $input['account_number'] ?? "";
    $body['bank_name'] = $input['account_name'] ?? "";
	$body['bank_phone'] = $input['bank_phone'] ?? "";
	$body['opening_date'] = date("Y-m-d",strtotime($input['opening_date']));	
	  ## Update bank information
	  $updatePI = $this->db->where('cbk_id',$cbk_id)->update("customar_bank_account",$body);	
}

 ##
## Update other information
##
	if(empty($input['oid'])){	
		# build body
		$tbl_customar_other_information = array(
		"customar_id"=>$input['id'],
		'field_1' => $input['field_1'] ?? "",
		'field_2' => $input['field_2'] ?? "",
		'field_3'=> $input['field_3'] ?? "",
		'field_4'=> $input['field_4'] ?? "",
		'information' => "",
		'objet_credit' => "",
		'frais_de_dossier' => "",	
		);
		$this->PP_Consumer_Loans_Model->insertRow('customar_other_information',$tbl_customar_other_information);
	} else {
		  $oid = $input['oid'];
		# build body
		$body = [];
		$body['field_1'] = $input['field_1'] ?? "";
		$body['field_2'] = $input['field_2'] ?? "";
		$body['field_3'] = $input['field_3'] ?? "";
		$body['field_4'] = $input['field_4'] ?? "";
	  ## Update other information
		  $updatePI = $this->db->where('oid',$oid)->update("customar_other_information",$body);	
	}
	
	# return
		$this->session->set_flashdata('success', 'Updated Successfully !');
	 	redirect(base_url('PP_Credit_Scholar/customer_details/'.$input['id']));
	}
	 
	/**
  * Send Mail To Higher Official
  * 	###
  * 	###	In CREDIT SCHOLAIRE LOAN
  *   ###
  * 	### Account Manager === (roleid - 2)
  * 	### Branch Manager === (roleid - 3)
  * 	### Risk Analyst === (roleid - 6)
  *   ### Head DCPR === (roleid - 5)
  * 	### Director Engagements === (roleid - 10)
  *   ### CIC === (roleid - 8)
  * 	### Agent CAD === (roleid - 11)
  * 	### CAD === (roleid - 9)
  *   ###
  */
	public function sendMailToHigherOfficial($loanId)
	{
		# Initialize an array
		$output = [];

		# Get loan amount				
		$getLoanDetails = $this->db->select('*')->from('tbl_customar_applicationform')->where('cap_id', $loanId)->get()->row_array();
		if(empty($getLoanDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}
		
		# Get role id
		$subAdminRoleId = 3;
		
		# Role id & User id === Account Manager
		$roleId = $this->session->userdata('role') ?? 2;				
		$userId = $this->session->userdata('id');

		# Get admin details
		$userDetails = $this->db->select('*')->from('tbl_user')->where('id', $userId)->where('is_admin', $roleId)->get()->row_array();
		if(empty($userDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}

		# Get user to send email
		$getUser = $this->db->select('*')->from('tbl_user')->where('branch_id', $userDetails['branch_id'])->where('is_admin', $subAdminRoleId)->get()->row_array();
		if(empty($getUser)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}

		# Customer details
		$getCustomerDetails = $this->db->select('*')->from('tbl_customer_personalinformation')->where('customar_id', $getLoanDetails['customar_id'])->get()->row_array();
		if(empty($getCustomerDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}

		# bank account
		$getbankaccount = $this->db->select('*')->from('tbl_customar_bank_account')->where('customar_id', $getLoanDetails['customar_id'])->get()->row_array();
		if(!empty($getbankaccount)) {
			$accountNo = $getbankaccount['account_no'];
		}	else {
			$accountNo = "{Account information n/a!}";
		}		

		# Initialize variables
		$config['mailtype'] = 'html';
		$this->email->set_mailtype("html");	

		# Load email library
		$this->load->library('email',$config);				
	
		# build required fields for mail
		$mailFrom = $userDetails['u_email'];
		$mailTo = $getUser['u_email'];
		$subject = "Account Manager Avis favorable for a loan CREDIT SCOLAIRE";
		$fromName = $userDetails['user_name'];
		$toName = $getUser['user_name'];
		$body= 'Bonjour,		
			Vous avez en traitement le dossier du pr??t Consumer Loan Du client  '.
			$getCustomerDetails['first_name'].' '.
			$getCustomerDetails['middle_name'].' '.
			$getCustomerDetails['last_name'].'  En attente de validation Ayant pour num??ro de compte  '.
			$accountNo.'  cordialement.';
		
		# Send mail 
		$this->email->from($mailFrom,$fromName);
		$this->email->to($mailTo,$toName);
		$this->email->subject($subject);
		$this->email->message($body);		    
		$send = $this->email->send();
		if(!$send) {
			echo 'error' .$this->email->print_debugger();	       
			$output=array('error' =>"Fail to send email!");
		}

		return $output;
	}

	
}