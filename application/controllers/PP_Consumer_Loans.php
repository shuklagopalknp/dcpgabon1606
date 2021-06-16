<?php
class PP_Consumer_Loans extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		//$this->data['title'] = 'pploan';	
		$this->data['page'] = 'PP Consumer Loans';	
		$this->load->library('session');		
    	$this->load->model('Common_model');
    	$this->load->model('PP_Consumer_Loans_Model');
    	$this->load->model('Credit_Conso_Model');
    	$this->load->model('Credit_Confort_Model');
    	$this->load->model('Credit_Scolair_Model');
    	$this->load->library('Class_Amort');
    	$this->load->helper('lang_translate');
		$this->load->helper('timeAgo');
		$this->load->helper(array('dompdf', 'file'));
		//date_default_timezone_set('Asia/Kolkata');
		//date_default_timezone_set('GMT');
		$this->load->helper('url');
	}
	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function Creditloan(){
		$this->data['title'] = 'DCP - CREDIT CONSO';			
		$this->data['record']=$this->Common_model->get_admin_details(2);
		$this->data['loantype']=$this->PP_Consumer_Loans_Model->get_loanType();
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		// echo '<pre>';
		// print_r($this->data['loandetails']);
		// die;
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['loanrange']=$this->PP_Consumer_Loans_Model->get_pprange();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/consumer_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
		
	}

	// New update : 31-03-2020

	public function customer_creditloan($customer_id){
		$this->data['title'] = 'DCP - CREDIT CONSO';			
		$this->data['record']=$this->Common_model->get_admin_details(2);
		$this->data['loantype']=$this->PP_Consumer_Loans_Model->get_loanType();
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_customer_application_form($customer_id);
		
		$customer_personalinfo = $this->PP_Consumer_Loans_Model->get_customer_personalinformation($customer_id);
		$this->data['customer_name'] = $customer_personalinfo['first_name'].' '.$customer_personalinfo['middle_name'].' '.$customer_personalinfo['last_name'];
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['loanrange']=$this->PP_Consumer_Loans_Model->get_pprange();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/single_consumer_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
		
	}


	function rangeofTax()
	{	
		if(!empty($this->input->post('tval'))){	
		echo $this->PP_Consumer_Loans_Model->get_RangeTax($this->input->post('tval'));
		//echo json_decode($return);
		}else{
			echo 0;
		}		
	}
	public function Overdraft(){	
		$this->data['record']=$this->Common_model->get_admin_details(1);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/overdraft', $this->data);
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
            'department' => $this->input->post('department'),
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
			'loan_object' => $this->input->post('loan_object')
		);

        $result['success']=$this->PP_Consumer_Loans_Model->insertRow('temp_consumer_applicationform',$data);
        echo json_encode($result);
    	//}
    }
    
    /*Amortization Section*/
    public function amortization_loan($id,$type,$view=0,$loan_id=''){
    	
    	if($type=='2'){
    		$this->data['title'] = 'GABON - CONGES A LA CARTE TABLEAU AMORTISSEMENT';
    	    $this->data['loan_details'] = $this->Credit_Scolair_Model->get_single_loan_details($loan_id);
    	    
    		$this->data['customer'] = json_decode($this->data['loan_details']['customer_data']);
    	}else if($type == '1'){
    		$this->data['title'] = 'GABON - FETES A LA CARTE TABLEAU AMORTISSEMENT';
    		$this->data['loan_details'] = $this->Credit_Conso_Model->get_single_loan_details($loan_id);
    		
    		$this->data['customer'] = json_decode($this->data['loan_details']['customer_data']);
    	}
    	else if($type == "3")
    	{
    		$this->data['title'] = 'GABON - CREDIT CONFORT TABLEAU AMORTISSEMENT';
    		$this->data['loan_details'] = $this->Credit_Confort_Model->get_single_loan_details($loan_id);
    		$this->data['customer'] = json_decode($this->data['loan_details']['customer_data']);
    	}

    	
    	
        $id=$id; //exit;
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_Post_temp_applicationform($id);
    	$this->data['testamortrecord']=$this->PP_Consumer_Loans_Model->test_amortization($id);
    	//echo "<pre>", print_r($this->data['amortrecord']), "</pre>"; exit;
    	$vat_on_interest=$this->data['amortrecord'][0]['loan_tax'] ?: '19.25';    	
    	$this->data['tax_interest']= $this->data['amortrecord'][0]['tva'];
    	$this->data['css_value']= $this->data['amortrecord'][0]['css'];
    	$this->data['department']= $this->data['amortrecord'][0]['department'];



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
	    	$am->amort($amount,$rate,$years,$curd, $loan_interest,$this->data['tax_interest'],$this->data['css_value'],'','','');
	    	$return_arr=array();

	   // 	echo "<pre>", print_r($am), "</pre>"; exit;
    //         die;
	    	
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
		    
			$this->PP_Consumer_Loans_Model->insertRow('consumer_amortization',$data);
		}    	
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->data['type'] = $type;
		$this->data['view'] = $view;



			
		if($this->session->userdata('role')){
        
		 $this->render_template2('superadmin/amortization', $this->data);
		}
		else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
    }

    public function amortization_loan_scolair(){
    	$this->data['title'] = 'DCP - CREDIT SCOLAIR TABLEAU AMORTISSEMENT';
    	$id=$this->uri->segment(3); //exit;
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_Post_temp_applicationform($id);
    	$this->data['testamortrecord']=$this->PP_Consumer_Loans_Model->test_amortization($id);
    	//echo "<pre>", print_r($this->data['amortrecord']), "</pre>"; exit;
    	$vat_on_interest=$this->data['amortrecord'][0]['loan_tax'] ?: '19.25';    	
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

     public function download_temp_amortizationpdf(){
		 $output='';
		  $Locations='';
		  $Rarray='';
		  $users_arr=array();	
		  $segmentid=$this->uri->segment(3); 	  
		  $getHtml=$this->generate_amortization_pdf($segmentid);
		  //echo $getHtml;
		  //exit;
		  $filename='Amortization-Credit-Conso-'.$segmentid.'-'.time();
		  $abc=pdf_po_create_proposal($getHtml,$filename,true);
		  if($abc==1){
		 	$data = array('amortization_pdf'=>$filename.'.pdf');
		  	$validate=$this->PP_Consumer_Loans_Model->check_amortization_files($segmentid);
		  	
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
        		$path_to_file = './assets/consumer_loan/amortization/'.$validate->amortization_pdf;
				if(unlink($path_to_file)) {
				    //echo 'Deleted successfully';
				}
				else {
				    // echo 'errors occured';
				}
        		$edit=$this->PP_Consumer_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);
        	}else{
        		$edit=$this->PP_Consumer_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}
	}

    public function amortizationview()
    {
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_amortization_record($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/amortization_view', $this->data);    	
    }
    public function amortization_view_pd()
    {
    	$output='';
		  $Locations='';
		  $Rarray='';
		  $users_arr=array();	
		  $segmentid=$this->uri->segment(3); 	  
		  $getHtml=$this->generate_amortization_pdf($segmentid);
		  echo $getHtml;
		  exit;
		  $filename='Amortization-Credit-Conso-'.$segmentid.'-'.time();
		  //$filename='amortization_'.$segmentid.'_'.time();
		  $abc=pdf_po_create_proposal($getHtml,$filename,true);
		  if($abc==1){
		 	$data = array('amortization_pdf'=>$filename.'.pdf');
		  	$validate=$this->PP_Consumer_Loans_Model->check_amortization_files($segmentid);
		  	
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
        		$path_to_file = './assets/consumer_loan/amortization/'.$validate->amortization_pdf;
				if(unlink($path_to_file)) {
				    //echo 'Deleted successfully';
				}
				else {
				    // echo 'errors occured';
				}
        		$edit=$this->PP_Consumer_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);
        	}else{
        		$edit=$this->PP_Consumer_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}

    }    

   
	function generate_amortization_pdf($segmentid){	

	
		$this->data['amortizationdata']=$this->PP_Consumer_Loans_Model->get_amortization_befor_record($segmentid);
		$where  =  array('loan_id_temp' => $segmentid);
        // return $this->data['amortizationdata'][0]['loan_type'];
		if($this->data['amortizationdata'][0]['loan_type'] == "1")
		{
			$this->data['loan_details'] = $this->Common_model->getRecord('tbl_credit_conso_applicationloan','',$where);
		}else if($this->data['amortizationdata'][0]['loan_type'] == "2"){
		    $this->data['loan_details'] = $this->Common_model->getRecord('tbl_credit_scolair_applicationloan','',$where);
		}else
		{
			$this->data['loan_details'] = $this->Common_model->getRecord('tbl_credit_confort_applicationloan','',$where);
		}
		
		return  $this->load->view('superadmin/amortization_pdf_generate',$this->data,true);
	}
	function generate_amortization_pdf1($segmentid){		
		$this->data['amortizationdata']=$this->PP_Consumer_Loans_Model->get_amortization_after_record($segmentid);
		return  $this->load->view('superadmin/amortization_pdf_generate',$this->data,true);
	}
	

	
	
	public function SearchCustomers(){
		//print_r($_POST);
		$segment=$this->input->post('segment');
		$data= $this->data['accontdata']=$this->PP_Consumer_Loans_Model->get_customers_details($this->input->post('account'));		
		$html=null;
		echo $this->input->post('account');
		if(!empty($data)){
			foreach ($data as $key) {
				$html .="<tr>
				<td>dfd".$key['cid']."</td>
				<td>".$key['account_name']."</td>
				<td>".$key['account_number']."</td>
				<td>".$key['dob']."</td>
				<td>".$key['address']."</td>
				<td>".$key['emp_name']."</td>
				<td>".$key['phone']."</td>
				<td><a href='".base_url('PP_Consumer_Loans/customer_details/').$key['cid']."' class='btn btn-primary confirmation' onclick = \"if (! confirm('Continue?')) { return false; }\">
				SELECT</a></td>
			</tr>";
			 }
		}else {			
			$html .="<tr class=\"odd\"><td valign=\"top\" colspan=\"8\" class=\"dataTables_empty\">No matching records found</td></tr>";
		}
			echo $html;
	}

	
	

	public function is_ajax_request()
	{
		//print_r($_POST); exit;
		$customerid=$this->input->post('customerid');
		$segment=$this->input->post('segment');
		$record=$this->PP_Consumer_Loans_Model->get_temp_applicationformRecord($segment);

		$amortizationid=$this->PP_Consumer_Loans_Model->get_autoamortization_id($segment);
		//$recordtaxname=$this->PP_Consumer_Loans_Model->get_taxname($segment);
		//echo "<pre>", print_r($amortizationid), "</pre>";	exit;	
		//ENUM('Process','Approved','Delivered','Cancelled','Pre-Process')	
		$appliedformdata=json_encode($record);
		//echo "<pre>", print_r($appliedformdata), "</pre>";
		$data =  array();
		foreach($record as $loca) {
			$data = array(
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
				'loan_status'=>'Process',
				'loan_guarantee'=>trim($loca['loan_guarantee']),
			);
		}
		// echo "<pre>", print_r($data);
		// exit;			
		$res=$this->PP_Consumer_Loans_Model->insertRow('consumer_loans_applicationform',$data);
		if($res){
			$array=array('aid' =>$segment, );
			$docdata = array(
				'admin_id'=>$this->session->userdata('id'),				
	            'loan_type' =>trim($loca['loan_type']),
	            'loan_id' =>trim($res),
	            'doc_1' =>'YES',
	            'doc_2' =>'YES',
	            'doc_3' =>'YES',
	            'doc_4' =>'YES',
	            'doc_5' =>'YES',
	            'doc_6'=>'YES',
	            'doc_7'=>'YES',
	            'doc_9' =>'YES',
	            'doc_10' =>'YES',
	            'doc_11' =>'YES',
	            'created' =>date('Y-m-d H:i:s')
	        );
	        $insrtdocdata=$this->PP_Consumer_Loans_Model->insertRow('tbl_credit_conso_checklistbutton_enable_disable',$docdata);
			$details="New loan application form created with amount CFA ".number_format($record[0]['loan_amt'],0,',',' ')." and application number is ".$record[0]['application_no']." under process";
				$history_arr=array(
					"cl_aid" =>$res,
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>$customerid,
					"loan_type"=>trim($loca['loan_type']),
					"comment" =>$details,
					"content_type"=>'text',			
					"created" =>date('Y-m-d H:i:s')
				);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			$this->PP_Consumer_Loans_Model->delete_data('temp_consumer_applicationform',$array);
			echo $res;
		}else{
			echo 0;
		}
	}

	
    
	

	
	public function addContractType(){
		
		$postId=$this->input->post('postId');
		if(!empty($postId))
		{
			$data=array(
				'contract_type'=>$this->input->post('postId')
			);
			$ress=$this->PP_Consumer_Loans_Model->insertRow('type_of_contract',$data);
			if($ress){
				$res=$this->PP_Consumer_Loans_Model->get_type_of_contract();
				if(!empty($res)){
				foreach ($res as $key ) {					
					$return[]=array(
						'id'=>$key['tc_id'],
						'name'=>$key['contract_type']
					);
				}
				}
				echo json_encode($return);
			}
		}
	}

	//==========================collateral Upload 26-06-2019======================================
	
	public function uploadfile_collateral_vehicule()
	{	
		//echo "<pre>", print_r($_POST); exit;	
		 if($_FILES["files"]["name"] != '')
			  {
			   $output='';
				$return_arr = array();			   
			   $config["upload_path"] = './assets/collateral/vehicule/';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
				
				$this->form_validation->set_error_delimiters('<p>', '</p>');
				$this->form_validation->set_rules('vehicule_type','Type', 'required');
				$this->form_validation->set_rules('vehicule_marque','Marque', 'required');
				$this->form_validation->set_rules('vehicule_modele','Modèle', 'required');
				$this->form_validation->set_rules('vehicule_carte_grise','Carte Grise', 'required');
				$this->form_validation->set_rules('vehicule_style','Style', 'required');
				$this->form_validation->set_rules('vehicule_annee','Année', 'required');
				$this->form_validation->set_rules('vehicule_kilometrage','Kilométrage', 'required');
				//$this->form_validation->set_rules('vehicule_commentaire','Commentaire', 'required');
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}else{
					sleep(1);
					$data= array(
						'cl_aid'=>$this->input->post('cl_aid'),
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
						'loan_type'=>1,
						'section'=>1,
					);
					$getid=$this->PP_Consumer_Loans_Model->insertRow('collateral',$data);
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
								$output=array('error' => $this->upload->display_errors());
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
								'loan_type'=>1,							
							);			
							$rsid=$this->PP_Consumer_Loans_Model->insertRow('collateral_files',$filedata);
							$details="Collateral Véhicule ".$filesCount." file upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cl_aid'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('vcustomar_id'),
									"loan_type"=>1,
									"comment" =>$details,
									"content_type"=>'file',				
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
		//print_r($_POST); exit;
		if($_FILES["files"]["name"] != '')
			{
			   $output = '';
			   $config["upload_path"] = './assets/collateral/deposit/';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
			   
				$this->form_validation->set_error_delimiters('<span>', '</span>');
				$this->form_validation->set_rules('d_numero_de_compte','Numéro de compte', 'required');
				$this->form_validation->set_rules('d_montant','Montant', 'required');
				
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}else{
				sleep(1);					
						$data= array(
							'cl_aid'=>$this->input->post('cl_aid'),
							'admin_id'=>trim($this->session->userdata('id')),					
							'customer_id'=>$this->input->post('customar_id'),
							'selected_field'=>trim($this->input->post('collateraltype')),		
							'd_numero_de_compte'=>$this->input->post('d_numero_de_compte'),
							'd_montant'=>$this->input->post('d_montant'),						
							'section'=>1,
							'loan_type'=>1,
						);
						$getid=$this->PP_Consumer_Loans_Model->insertRow('collateral',$data);
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
									'section'=>1,
									'loan_type'=>1,							
								);											
								$rsid=$this->PP_Consumer_Loans_Model->insertRow('collateral_files',$filedata);
								$details="Collateral Déposit ".$filesCount." file upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cl_aid'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>1,
									"comment" =>$details,
									"content_type"=>'file',			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
			   
			   $this->form_validation->set_error_delimiters('<p>', '</p>');
				$this->form_validation->set_rules('m_type_de_proprietaire','Type de propriétaire', 'required');
				$this->form_validation->set_rules('m_etatde_maison','Etat de la maison', 'required');
				$this->form_validation->set_rules('m_annee_construction','Année de construction', 'required');
				$this->form_validation->set_rules('m_nombre_de_piece','Nombre de pièce', 'required');
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
						'cl_aid'=>$this->input->post('cl_aid'),
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
						'loan_type'=>1,
						'section'=>1,
					);	   
					$getid=$this->PP_Consumer_Loans_Model->insertRow('collateral',$data);
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
									'section'=>1,
									'loan_type'=>1,
								);			
								$rsid=$this->PP_Consumer_Loans_Model->insertRow('collateral_files',$filedata);
								$details="Collateral Maison ".$filesCount." file upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cl_aid'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>1,
									"comment" =>$details,
									"content_type"=>'file',			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
		sleep(2);
		if($_FILES["files"]["name"] != '')
		{
			$output = '';
			$config["upload_path"] = './assets/collateral/excemption';
			$config["allowed_types"] = '*';
			$config['max_size'] = '0';
			$config['overwrite'] = '0';
			$config['encrypt_name'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['file_ext_tolower'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$filesCount = count($_FILES['files']['name']);
			$data= array(
				'cl_aid'=>$this->input->post('cl_aid'),
				'admin_id'=>trim($this->session->userdata('id')),
				'customer_id'=>trim($this->input->post("customar_id")),	
				'selected_field'=>trim($this->input->post('collateraltype')),
				'section'=>1,
				'loan_type'=>1,
			);
			$getid=$this->PP_Consumer_Loans_Model->insertRow('collateral',$data);
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
						'section'=>1,
						'loan_type'=>1,							
					);
					$rsid=$this->PP_Consumer_Loans_Model->insertRow('collateral_files',$filedata);
					$details="Collateral Excemption ".$filesCount." file upload.";
					$history_arr=array(
						"cl_aid" =>$this->input->post('cl_aid'),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>$this->input->post('customar_id'),
						"loan_type"=>1,
						"comment" =>$details,
						"content_type"=>'file',			
						"created" =>date('Y-m-d H:i:s')
					);
					$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
		$collateralfiles=$this->PP_Consumer_Loans_Model->get_collateralFiles($this->input->post('id'));
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
        $files = $this->PP_Consumer_Loans_Model->get_collateralFiles($id);         
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
        $files = $this->PP_Consumer_Loans_Model->get_collateralFiles($id);         
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
        $files = $this->PP_Consumer_Loans_Model->get_collateralFiles($id);         
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
        $files = $this->PP_Consumer_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/excemption/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	
	public function uploadfile_risk_analysis(){
		//print_r($_FILES);
		//print_r($_POST); exit;   
		
		sleep(1);
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/riskanalysis/';
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
				
					$filedata= array(							
						'admin_id'=>trim($this->session->userdata('id')),
						'cl_aid'=>trim($this->input->post("customerid")),
						'filesname'=>$filename['file_name'],
						'raw_name'=>$_FILES["files"]["name"][$count],
						'file_path'=>$filename['file_path'],
						'full_path'=>$filename['full_path'],						
						'file_type'=>$filename['file_type'],
						'file_size'=>$filename['file_size'],
						'file_extension'=>$filename['file_ext'],
						"loan_type"=>1,
						'section'=>1,							
					);			
					$rsid=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis',$filedata);
					$output=array('success' => $filesCount." files successfully upload.");
					}
				}
		  
		   //print_r($output);
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
        $files = $this->PP_Consumer_Loans_Model->get_risk_analysisfile($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths= './assets/riskanalysis/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths)); 			   
        }		
        $this->zip->download($createdzipsystemdocs.'.zip');
    }
	
	
	
	//==========================today 24-06-2019======================================
	public function riskanalysis_current_monthly_credit()
	{
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_current_monthly_credit($this->input->post('cl_aid'));
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
			'customer_id' => $this->input->post('customar_id'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>1,
			'cresco'=> $this->input->post('cresco_current'),
			'decouvert' => $this->input->post('decouvert_current'),
			'cmt' => $this->input->post('cmt_current'),
			'cct' => $this->input->post('cct_current'),
			'total_clc' => $this->input->post('total_clc'),
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
	}
	
	public function riskanalysis_financial_situation()
	{
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_financial_situation($this->input->post('cl_aid'));		
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
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
				$edit=$this->PP_Consumer_Loans_Model->updateRow('riskanalysis_financial_situation', 'rfs_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis_financial_situation',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}
	}


	/*===========Today 12-07-2019================*/

	public function add_newcustomer()
	{
		//print_r($_POST); exit;
		//print_r($this->input->post(),1);
		$isadmin=$this->session->userdata('id');
		$dob=date("Y-m-d", strtotime($this->input->post('dob')));		
		$employment_date=date("Y-m-d", strtotime($this->input->post('employment_date')));
		$edn_date_contract_cdd=date("Y-m-d", strtotime($this->input->post('edn_date_contract_cdd')));
		$opening_date=date("Y-m-d", strtotime($this->input->post('opening_date')));
		$expiration_date=date("Y-m-d", strtotime($this->input->post('expiration_date')));

		
		sleep(2);
		$tbl_cus_field=array(
			"admin_id"=>$isadmin,
			"aid"=>1,
			"account_name"=>$this->input->post('bank_name')??'',
			"account_number"=>trim($this->input->post('accoumt_number'))??'',
			"dob"=>trim($dob),
			"address"=>$this->input->post('resides_address')??'',
			"emp_name"=>trim($this->input->post('emp_name'))??'',
			"phone"=>$this->input->post('main_phone')??'',
			"created"=>date('Y-m-d H:i:s'),
		);		
		$getid=$this->PP_Consumer_Loans_Model->insertRow('tbl_customers',$tbl_cus_field);

		if($getid){

			//echo $getid;
			$tbl_customer_personalinformation=array(
				"customar_id"=>$getid,
				"first_name"=>$this->input->post('first_name')??'',
				"middle_name"=>$this->input->post('middle_name')??'',
				"last_name"=>$this->input->post('last_name')??'',
				"gender"=>$this->input->post('gender')??'',
				"dob"=>trim($dob),
				"education"=>$this->input->post('education')??'',
				"marital_status"=>$this->input->post('marital_status')??'',
				"email"=>trim($this->input->post('email'))??'',
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customer_personalinformation',$tbl_customer_personalinformation);

			$tbl_customer_additionalinformation=array(
				"customar_id"=>$getid,
				"type_id"=>trim($this->input->post('typeofid'))??'',
				"monthly_income"=>$this->input->post('monthly_income')??'',
				"monthly_expenses"=>$this->input->post('monthly_expenses')??'',
				"id_number"=>$this->input->post('id_number')??'',
				"state_of_issue"=>trim($this->input->post('state_of_issue'))??'',
				"occupation"=>$this->input->post('occupation')??'',
				"main_phone"=>$this->input->post('main_phone')??'',
				"alternative_phone"=>trim($this->input->post('alter_phone'))??'',
				"expiration_date_id"=>trim($expiration_date)??'',			
				"created"=>date('Y-m-d H:i:s'),
				"room_type"=>trim($this->input->post('room_type')) ?? "",
				"father_fullname"=>trim($this->input->post('father_fullname')) ?? "",
				"mother_fullname"=>trim($this->input->post('mother_fullname')) ?? "",
			);
			$this->PP_Consumer_Loans_Model->insertRow('customer_additionalinformation',$tbl_customer_additionalinformation);
			
			$tbl_customar_employment_information=array(
				"customar_id"=>$getid,
				"emp_id"=>1,
				"employer_name"=>trim($this->input->post('emp_name'))??'',
				"secteurs_id"=>$this->input->post('secteurs')??'',
				"cat_emp_id"=>$this->input->post('cat_employeurs')??'',
				"contract_type_id"=>$this->input->post('typeofcontract')??'',
				"employment_date"=>trim($employment_date)??'',
				"sate_end_contract_cdd"=>trim($edn_date_contract_cdd)??'',
				"years_professionel_experience"=>trim($this->input->post('years_professionel_experience'))??'',
				"how_he_is_been_with_current_employer"=>trim($this->input->post('current_emp'))??'',
				"emp_net_salary"=>trim($this->input->post('net_salary'))??'',
				"retirement_age_expected"=>trim($this->input->post('retirement_age_expected'))??'',
				"fees"=>0,
				"commisiion"=>0,
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customar_employment_information',$tbl_customar_employment_information);

			$tbl_customer_address=array(
				"customar_id"=>$getid,
				"admin_id"=>2,
				"city_id"=>trim($this->input->post('city'))??'',
				"state_id"=>$this->input->post('state')??'',
				"street"=>$this->input->post('street')??'',
				"resides_address"=>trim($this->input->post('resides_address'))??'',
				"created"=>date('Y-m-d H:i:s')??'',
			);

			$this->PP_Consumer_Loans_Model->insertRow('customer_address',$tbl_customer_address);

			$tbl_customar_bank_account=array(
				"customar_id"=>$getid,			
				"account_type"=>trim($this->input->post('account_type'))??'',
				"account_no"=>trim($this->input->post('accoumt_number'))??'',
				"bank_name"=>trim($this->input->post('bank_name'))??'',
				"bank_phone"=>$this->input->post('bank_phone')??'',
				"opening_date"=>$opening_date,
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customar_bank_account',$tbl_customar_bank_account);

			$tbl_customar_other_information=array(
				"customar_id"=>$getid,
				"admin_id"=>2,			
				"information"=>trim($this->input->post('another_test'))??'',
				"field_1"=>trim($this->input->post('test_field'))??'',
				"field_2"=>trim($this->input->post('test_david'))??'',
				"field_3"=>$this->input->post('cc_test')??'',
				"field_4"=>trim($this->input->post('cc_test'))??'',
				"objet_credit"=>trim($this->input->post('obj_credit'))??'',
				"frais_de_dossier"=>trim($this->input->post('frais_de_dossier'))??'',
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customar_other_information',$tbl_customar_other_information);

			echo "success";
		}else{
			echo "error";
		}
	}	
	
	public function test(){
		$this->data['title'] = 'DCP - pploan';			
		$this->data['record']=$this->Common_model->get_admin_details(2);		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/test', $this->data);
	}

	/*============================Today modify on 19-08-2019=============================*/
	/*Change Type Id*/
	public function changetypeid()
	{
		sleep(1);		
		$udata=array("type_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customer_additionalinformation','ai_id', $this->input->post('ai_id'), $udata);
		if($udata){			
	  		$details="Update `Type Id` in additional information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);		
			echo 1;
		}else{echo 0;}
	}
	/*Change Secteurs*/
	public function changesecteurs()
	{
		sleep(1);	
		//print_r($_POST); exit;	
		$udata=array("secteurs_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('ai_id'), $udata);
		if($udata){
			$details="Update `Secteurs` in employment information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*Change Catégorie Employeurs*/
	public function changecat_employeurs()	{
		sleep(1);	
		//print_r($_POST); exit;	
		$udata=array("cat_emp_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
		if($udata){
			$details="Update `Catégorie Employeurs` in employment information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*Change Type of Contract Employeurs*/
	public function change_type_of_contract()
	{
		sleep(1);	
		//print_r($_POST); exit;	
		$udata=array("contract_type_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
		if($udata){
			$details="Update `Type of Contract` in employment information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*Change Objet of the Credit Other Information*/
	public function change_objet_of_the_credit()
	{
		//print_r($_POST); exit;
		sleep(1);
		$output = '';		
		$obj_arr = array();
		$objcredit = array("Consomation","Equipement","Immobilier","Scolaire","Autres");
		foreach ($objcredit as $key ) {
			$obj_arr[] = array("name" => $key);
		}			
		$udata=array("objet_credit" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_other_information','oid', $this->input->post('oid'), $udata);
		if($udata){
			$details="Update `Objet of the Credit` in other information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			$output=$obj_arr;
		}else{
			$output=array('error'=>"error");
		}		
		echo json_encode($output);
	}
	/*Change FRAIS dé DOSSIER Other Information*/
	public function postupdate_fees(){	  
		sleep(1);
		//print_r($_POST); exit;
		$eid=$this->input->post('id');
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_other_information','oid', $this->input->post('id'), array('frais_de_dossier'=>trim($this->input->post('data'))));
		if($update){
			$details="Update `FRAIS dé DOSSIER` in other information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*System Docs Promissory Note*/
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
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
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
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		
		return  $this->load->view('superadmin/atlantique_preet_scolaire_formulaire_en_anglais',$this->data,true);
	
	}

	/*System Docs Credit Agreement*/
	public function credit_agreement()	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);
		$getHtmlagreement=$this->generate_credit_agreement_form($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		//$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}
	public function generate_credit_agreement_form($id)
	{
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
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
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);

		$this->data['c_loan']=$this->PP_Consumer_Loans_Model->get_amortization_record($id);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/atlantique_pret_scolaire_2017_cg_en_anglais',$this->data,true);
	}

	/*Today 19-07-2018 Update*/
	public function enableddisabled()
	{
		//print_r($_POST); exit;
		/*[capid] => 96
	    [post] => Véhicule
	    [val] => 0*/
	    if(!empty($this->input->post('post')))
	    {
	    	if($this->input->post('post')=="Véhicule")
	    	{
	    		$data=array('check_vehicule' =>trim($this->input->post('val')));
	    		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}
	    	if($this->input->post('post')=="Déposit")
	    	{
	    		$data=array('check_deposit' =>trim($this->input->post('val')));
	    		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
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
	    		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
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
	    		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}
	    }
	}
	/*Decision Status Section*/
	public function comment_manager()
	{
		$comnt='Decision - ';
		$output = '';
		// $this->form_validation->set_error_delimiters('<span>', '</span>');
		// $this->form_validation->set_rules('decision','Please Select From Below', 'required');
		// $this->form_validation->set_rules('commentstatus','Comment', 'required');	
		// $this->form_validation->set_message('required', 'You missed the input {field}!');
		// if ($this->form_validation->run() == FALSE)
		// {
		// 	$output=array('error'=> validation_errors());	
		// }
		// else
		// {
		

			sleep(2);
			$comnt .='Account Manager '.trim($this->input->post('decision')).' this loan. '.$this->input->post('commentstatus').'|';
			$fata2=array(		
				'manager_id'=>trim($this->input->post('account_manager_id')),
				'branch_id'=>trim($this->input->post('branch_id')),
				'account_manager_id'=>trim($this->input->post('account_manager_id')),
				'customar_id'=>trim($this->input->post('customar_id')),		
				'loan_id'=>trim($this->input->post('cl_aid')),
				'decision'=>trim($this->input->post('decision')),
				'commentstatus'=>trim($this->input->post('commentstatus')),
				'loantype'=>1,
				'modified'=>date('Y-m-d H:i:s'),

			);
			$insert=$this->PP_Consumer_Loans_Model->insertRow('branmanager_approbation',$fata2);
			if($insert){

				if($this->input->post('decision')=="Avis défavorable") /*Reject*/
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
				$this->PP_Consumer_Loans_Model->updateRow('consumer_loans_applicationform','cl_aid', $this->input->post('cl_aid'), $status);
				$msg2=str_replace('|', ', ', $comnt);
				$details=$msg2;

				$history_arr=array(
					"cl_aid" =>trim($this->input->post('cl_aid')),
					"admin_id" =>trim($this->input->post('account_manager_id')),				
					"comment" =>$details,
					"loan_type"=>1,	
					'content_type'=>'text',	
					"customar_id" =>trim($this->input->post("customar_id")),						
					"created" =>date('Y-m-d H:i:s')
				);
				$res=$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
				$output=array('success' =>"Decision successfully updated.");

				### 
				### Send Mail To Higher Official
				###
				$cl_aid = $this->input->post('cl_aid'); // loan id
				$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($cl_aid);
				if(!empty($sendMailToHigherOfficial)) {
					$output = $sendMailToHigherOfficial;
				}

			}else{
				$output=array('error' =>"Unable update to record");
			}
		//}
		echo json_encode($output);
	}

	public function SearchAccount(){
		//print_r($_POST);
		$segment=$this->input->post('segment');
		$data= $this->data['accontdata']=$this->PP_Consumer_Loans_Model->get_account_details($this->input->post('account'));		
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

	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST);
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->PP_Consumer_Loans_Model->checkloanstatuslist(trim($this->input->post('filter')));

		
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
							if($key['loan_status']=='Avis défavorable')
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
						<a href=\"".base_url('PP_Consumer_Loans/customer_details/').$key['cl_aid']."\" class=\"table-link\">
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

	public function billetaorder()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_Billet_aÇ_Ordre_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		 
	}
	public function memo_of_setting_up()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_memo_of_setting_up_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		 
	}

	public function formulaire_de_demande_credit()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_formulaire_de_demande_credit_scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
	}

	public function formulaire_adhesion_aufoud_de_grantie()
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
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
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
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);

		$this->data['c_loan']=$this->PP_Consumer_Loans_Model->get_amortization_record($id);
				
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/formulaire_adhesion_aufoud_de_grantie_credit_scolaire',$this->data,true);
	}
	

	public function generate_formulaire_de_demande_credit_scolaire($id)
	{
		error_reporting(0);
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
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
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/formulaire-de-demande-credit',$this->data,true);
	}
	public function generate_Billet_aÇ_Ordre_Credit_Scolaire($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
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
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/BilletOrdre',$this->data,true);
	}

	public function generate_memo_of_setting_up_Credit_Scolaire($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
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
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/memo-de-mise-em-place',$this->data,true);
	}

	public  function enableddisabled_documentbutton()
	{
		sleep(2);
		//print_r($_POST);
		$option=$this->input->post('option');		
		$data = array(	
			'admin_id'=>trim($this->session->userdata('id')),	
			'loan_type'=>trim($this->input->post('loantype')),
			'loan_id'=>trim($this->input->post('loanid')),			
		);
		if($option=="doc_1")
		{			
			$data1=array('doc_1' => $this->input->post('pass_data'),);
		}
		if($option=="doc_2")
		{			
			$data1=array('doc_2' => $this->input->post('pass_data'),);
		}
		if($option=="doc_3")
		{			
			$data1=array('doc_3' => $this->input->post('pass_data'),);
		}
		if($option=="doc_4")
		{			
			$data1=array('doc_4' => $this->input->post('pass_data'),);
		}
		if($option=="doc_5")
		{			
			$data1=array('doc_5' => $this->input->post('pass_data'),);
		}
		if($option=="doc_6")
		{			
			$data1=array('doc_6' => $this->input->post('pass_data'),);
		}
		if($option=="doc_7")
		{			
			$data1=array('doc_7' => $this->input->post('pass_data'),);
		}
		if($option=="doc_8")
		{			
			$data1=array('doc_8' => $this->input->post('pass_data'),);
		}
		if($option=="doc_9")
		{			
			$data1=array('doc_9' => $this->input->post('pass_data'),);
		}
		if($option=="doc_10")
		{			
			$data1=array('doc_10' => $this->input->post('pass_data'),);
		}
		if($option=="doc_11")
		{			
			$data1=array('doc_11' => $this->input->post('pass_data'),);
		}
		
		$checkdata = array_merge($data,$data1);
		//print_r($checkdata);
		$edit=$this->PP_Consumer_Loans_Model->updateRow('credit_conso_checklistbutton_enable_disable', 'id',$this->input->post('editid'),$checkdata);


	}

	/** document standards -
	 * name - update 
	 * desc-update personal info
	 * 
	 * @param  string  
	 * 
	 * @return void  $data
	 */
	public function customer_details_update() 
	{
		# Get all form data
		$input = $this->input->post();

		// echo '<pre>';
		// print_r($input);

		// die;
    
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
	
		if(empty($input['ai_id']))
		{
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
    $updatePI = $this->db->where('ai_id',$input['ai_id'])->update("customer_additionalinformation",$body);
  }
		
	##
	##  employment information
	##
	
	if(empty($input['emp_infoid']))
	{
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
    # return with flass msg
	
	
		$this->session->set_flashdata('success', 'Updated Successfully !');
		redirect(base_url('PP_Consumer_Loans/customer_details/'.$input['id']));
	}

 
	/**
	 * Send Mail To Higher Official
	 * 	###
	 * 	###	In CREDIT CONSO Loan
	 * 	### ============================================================
	 * 	### Between 0 and 5000000 Loan Amount
	 * 	### ============================================================
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	### Director Operating Manager === (roleid - 12)
	 * 	###
	 * 	### ============================================================
	 * 	### Between 50,00,001 and 15,000,000 Loan amount
	 * 	### ============================================================
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Analyst DCPR === (roleid - 6)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	### Director Operating Manager === (roleid - 12)
	 * 	###
	 * 	### =============================================================
	 * 	### Between 15,000,001 and 25 ,000,001
	 * 	### ============================================================
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Analyst DCPR === (roleid - 6)
	 * 	### Head DCPR === (roleid - 5)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	### Director Operating Manager === (roleid - 12)
	 * 	###
	 */
	public function sendMailToHigherOfficial($cl_aid)
	{
		# Initialize an array
		$output = [];

		# Get loan amount				
		$getLoanDetails = $this->db->select('*')->from('tbl_consumer_loans_applicationform')->where('cl_aid', $cl_aid)->get()->row_array();
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
		$subject = "Account Manager Avis favorable for a loan CREDIT CONSO";
		$fromName = $userDetails['user_name'];
		$toName = $getUser['user_name'];
		$body= 'Bonjour,		
			Vous avez en traitement le dossier du prêt Consumer Loan Du client  '.
			$getCustomerDetails['first_name'].' '.
			$getCustomerDetails['middle_name'].' '.
			$getCustomerDetails['last_name'].'  En attente de validation Ayant pour numéro de compte  '.
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
	
	
	# insert the form data 

	public function insert_form(){
		//echo "<pre>";	print_r($_POST);exit;
		//$this->load->view('superadmin/req_form');

		$tbl_agent_cad_decision_form = array(
			//'application_no'=>$num,
			'user_id'=>$this->session->userdata('id'),
			//'ip_address' => $ip,

			'moyen_Terme_de' => $this->input->post('moyen_Terme_de')??'',
			'date' => $this->input->post('date')??'',
			'termede' => $this->input->post('termede')??'',
			'1_1' => $this->input->post('moyen_Terme_de')??'',
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
			'date_accord_CIC' => $this->input->post('date_accord_CIC')??'',
			
			'type_de_différé' => $this->input->post('type_de_différé')??'',
			'périodocoté_de_remboursement' => $this->input->post('périodocoté_de_remboursement')??'',
			'frais_de_dossier' => $this->input->post('frais_de_dossier')??'',
			'taux' => $this->input->post('taux')??'',

			
			'moyen_Terme_de' => $this->input->post('moyen_Terme_de')??'',		
			
		);
		$this->PP_Consumer_Loans_Model->insertRow('agent_cad_decision_form',$tbl_agent_cad_decision_form);
	//	print_r($data);exit;
		echo "data inserted";exit;
		
	}
	 
}