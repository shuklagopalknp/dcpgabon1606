<?php defined('BASEPATH') OR exit('No direct script access aloowed');  

class Decovert_Loans extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
			$this->not_logged_in();		
			$this->data['page'] = 'PP Decovert Loans';	
			$this->load->library('session');		
	    	$this->load->model('Common_model');
	    	$this->load->model('Decovert_Loans_Model');
	    	$this->load->model('Decovert_Loans_Model');	    	
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
	public function index(){
		$this->data['title'] = 'DCP - Decovert';			
		$this->data['record']=$this->Common_model->get_admin_details(2);		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->data['indexdetails']=$this->Decovert_Loans_Model->get_decovertrecord();
		$this->render_template2('superadmin/decovert', $this->data);
	}
	public function Amortization()
	{
		$id=$this->uri->segment(3); 
		$this->data['title'] = 'DCP - Decovert Amortization';			
		$this->data['record']=$this->Common_model->get_admin_details(2);
		$this->data['amortrecord']=$this->Decovert_Loans_Model->get_decovertamortization($id);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/amortization_decouvert', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}

		
	}

	public function controler_convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 
    	'Un',
    	'Deux', 
    	'Trois', 
    	'Quatre', 
    	'Cinq', 
    	'Six', 
    	'Sept', 
    	'Huit', 
    	'Neuf', 
    	'Dix', 
    	'onze',
        'douze', 
        'treize', 
        'quatorze', 
        'quinze', 
        'seize', 
        'Dix-sept', 
        'Dix-huit', 
        'Dix-neuf'
    );
    $list2 = array('', 
    	'ten', 
    	'vingt', 
    	'trente', 
    	'quarante', 
    	'cinquante', 
    	'soixante', 
    	'soixante-dix', 
    	'quatre-vingt',     	 
    	'quatre-vingt dix',
    	'cent');
    $list3 = array('', 'mille', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' cent' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}

	public function add_loan()
	{
		$ip = $_SERVER['REMOTE_ADDR'];
		$num = round(microtime(true)*1000);	
		//print_r($this->input->post());
		$return_arr1=array();
		$return_arr2=array();		
		$return_arr3=array();		
		$month1=array(
			"m1nms" =>trim($this->input->post('month1_nsalary')),
			"m1ai" =>trim($this->input->post('month1_additionalincome')),
			"m1pcl" =>trim($this->input->post('month1_pcompanyloan')),
			"m1ais" =>trim($this->input->post('month1_advsalary')),
			"m1deduction" =>trim($this->input->post('month1_deduction')),
			"m1bonus" =>trim($this->input->post('month1_bonus')),
			"m1primes" =>trim($this->input->post('month1_primes')),
			"m1gratification" =>trim($this->input->post('month1_gratification')),
			"m1_total_net_salary" =>trim($this->input->post('m1total_net_salary')),			
		);
		array_push($return_arr1, $month1);
		$data1=json_encode($return_arr1);

		$month2=array(
			"m2nms" =>trim($this->input->post('month2_nsalary')),
			"m2ai" =>trim($this->input->post('month2_additionalincome')),
			"m2pcl" =>trim($this->input->post('month2_pcompanyloan')),
			"m2ais" =>trim($this->input->post('month2_advsalary')),
			"m2deduction" =>trim($this->input->post('month2_deduction')),
			"m2bonus" =>trim($this->input->post('month2_bonus')),
			"m2primes" =>trim($this->input->post('month2_primes')),
			"m2gratification" =>trim($this->input->post('month2_gratification')),
			"m2_total_net_salary" =>trim($this->input->post('m2total_net_salary')),			
		);
		array_push($return_arr2, $month2);
		$data2=json_encode($return_arr2);
		$m3total_net_salary=(($this->input->post('month3_nsalary')+$this->input->post('month3_additionalincome'))-$this->input->post('month3_deduction'));
		$month3=array(
			"m3nms" =>trim($this->input->post('month3_nsalary')),
			"m3ai" =>trim($this->input->post('month3_additionalincome')),
			"m3pcl" =>trim($this->input->post('month3_pcompanyloan')),
			"m3ais" =>trim($this->input->post('month3_advsalary')),
			"m3deduction" =>trim($this->input->post('month3_deduction')),
			"m3bonus" =>trim($this->input->post('month3_bonus')),
			"m3primes" =>trim($this->input->post('month3_primes')),
			"m3gratification" =>trim($this->input->post('month3_gratification')),
			/*"m3_total_net_salary" =>trim($this->input->post('m3total_net_salary')),*/
			"m3_total_net_salary" =>trim($m3total_net_salary),			
		);
		array_push($return_arr3,$month3);
		$data3=json_encode($return_arr3);
		
		$tm=($this->input->post('m1total_net_salary')+$this->input->post('m2total_net_salary')+$m3total_net_salary);


		$average=($tm/3);
		$requested_overdraft=($average*50/100);
		//echo $tm ."\n\r". $average ."\n\r". $requested_overdraft."\n\r";
		$post=array(
			'ip_address'=>$ip,
			'application_no'=>$num,			
			'admin_id' =>trim($this->session->userdata('id')),
			'loan_type'=>trim($this->input->post('loan_type')),
			'average'=>$average,
			'requested_overdraft'=>$requested_overdraft,
			'amount_sought_customer'=>$requested_overdraft,
			'letter_format'=>'',
			'month1'=>$data1,
			'month2'=>$data2,
			'month3'=>$data3,
			'letter_format'=>$this->controler_convertNumberToWord($requested_overdraft),
			'loan_status'=>'Process'
		);		
		$result=$this->Decovert_Loans_Model->insertRow('temp_applicationform_decovert',$post);		
		if($result)
		{
			echo $result;
		}
		
	}

	/*Edit Loan*/

	public function edit_loan()
	{
		sleep(1);
		$ip = $_SERVER['REMOTE_ADDR'];
		$num = round(microtime(true)*1000);	
		//print_r($this->input->post());exit; 
		$return_arr1=array();
		$return_arr2=array();		
		$return_arr3=array();
		$amount_sought_customer=trim($this->input->post('amount_sought_customer'));		
		$month1=array(
			"m1nms" =>trim($this->input->post('month1_nsalary')),
			"m1ai" =>trim($this->input->post('month1_additionalincome')),
			"m1pcl" =>trim($this->input->post('month1_pcompanyloan')),
			"m1ais" =>trim($this->input->post('month1_advsalary')),
			"m1deduction" =>trim($this->input->post('month1_deduction')),
			"m1bonus" =>trim($this->input->post('month1_bonus')),
			"m1primes" =>trim($this->input->post('month1_primes')),
			"m1gratification" =>trim($this->input->post('month1_gratification')),
			"m1_total_net_salary" =>trim($this->input->post('m1total_net_salary')),			
		);
		array_push($return_arr1, $month1);
		$data1=json_encode($return_arr1);

		$month2=array(
			"m2nms" =>trim($this->input->post('month2_nsalary')),
			"m2ai" =>trim($this->input->post('month2_additionalincome')),
			"m2pcl" =>trim($this->input->post('month2_pcompanyloan')),
			"m2ais" =>trim($this->input->post('month2_advsalary')),
			"m2deduction" =>trim($this->input->post('month2_deduction')),
			"m2bonus" =>trim($this->input->post('month2_bonus')),
			"m2primes" =>trim($this->input->post('month2_primes')),
			"m2gratification" =>trim($this->input->post('month2_gratification')),
			"m2_total_net_salary" =>trim($this->input->post('m2total_net_salary')),			
		);
		array_push($return_arr2, $month2);
		$data2=json_encode($return_arr2);		
		$month3=array(
			"m3nms" =>trim($this->input->post('month3_nsalary')),
			"m3ai" =>trim($this->input->post('month3_additionalincome')),
			"m3pcl" =>trim($this->input->post('month3_pcompanyloan')),
			"m3ais" =>trim($this->input->post('month3_advsalary')),
			"m3deduction" =>trim($this->input->post('month3_deduction')),
			"m3bonus" =>trim($this->input->post('month3_bonus')),
			"m3primes" =>trim($this->input->post('month3_primes')),
			"m3gratification" =>trim($this->input->post('month3_gratification')),
			"m3_total_net_salary" =>trim($this->input->post('m3total_net_salary')),			
		);
		array_push($return_arr3,$month3);
		$data3=json_encode($return_arr3);		
		$tm=($this->input->post('m1total_net_salary')+$this->input->post('m2total_net_salary')+trim($this->input->post('m3total_net_salary')));
		$average=($tm/3);
		$requested_overdraft=($average*50/100);
		//echo $tm ."\n\r". $average ."\n\r". $requested_overdraft."\n\r";
		$post=array(
			'ip_address'=>$ip,			
			'average'=>$average,
			'requested_overdraft'=>$requested_overdraft,
			'amount_sought_customer'=>$amount_sought_customer,
			'month1'=>$data1,
			'month2'=>$data2,
			'month3'=>$data3,
			"modified"=>date('Y-m-d H:i:s'),			
		);
		$result=$this->Decovert_Loans_Model->updateRow('decovert_applicationform', 'did',$this->input->post('editid'),$post);		
		if($result)
		{
			echo 1;
		}else{
			echo 0;
		}		
	}

	public function Decovert_amortization_pdf(){
		error_reporting(0);
		$segmentid=$this->uri->segment(3); 
		$getHtml=$this->Decovert_generate_amortization_pdf($segmentid);
		// echo $getHtml; //exit;
		$filename='Decovert-Amortization-'.$segmentid.'-'.time();
		$abc=pdf_create_decovert($getHtml,$filename,true);
		if($abc==1){
			$data = array('filename'=>$filename.'.pdf');
			$validate=$this->Decovert_Loans_Model->check_damortization_files($segmentid);
			if(!empty($validate->filename) || $validate->filename !=null){		  	
				$path_to_file = './assets/Decovert_Loans/amortization/'.$validate->filename;
				if(unlink($path_to_file)) {
					echo 'deleted successfully';
				}
				else {
					echo 'errors occured';
				}
				$edit=$this->Decovert_Loans_Model->updateRow('temp_applicationform_decovert', 'tdid', $segmentid,$data);
			}else{
				$edit=$this->Decovert_Loans_Model->updateRow('temp_applicationform_decovert', 'tdid', $segmentid,$data);       		

			}
		//echo 1;			
		}
	}
	
	public function Decovert_amortization_download_pdf(){
		error_reporting(0);
		//echo "hello";exit;
		$segmentid=$this->uri->segment(3); 
		$getHtml=$this->Decovert_generate_amortizationpdffile($segmentid);
		// echo $getHtml; 
		//exit;		 
		$filename='Decovert-Aamortization-'.$segmentid.'-'.time();
		$abc=pdf_create_Decovert($getHtml,$filename,true);
		if($abc==1){
		 	$data = array('filename'=>$filename.'.pdf');
		  	$validate=$this->Decovert_Loans_Model->check_damortization_files($segmentid);
		  	if(!empty($validate->filename) || $validate->filename !=null){		  	
        		$path_to_file = './assets/Decovert_Loans/amortization/'.$validate->filename;
				if(unlink($path_to_file)) {
				     echo 'deleted successfully';
				}
				else {
				     echo 'errors occured';
				}
        		//$edit=$this->Decovert_Loans_Model->updateRow('temp_applicationform_decovert', 'tdid', $segmentid,$data);
        	}else{
        		//$edit=$this->Decovert_Loans_Model->updateRow('temp_applicationform_decovert', 'tdid', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}
	}
	

	public function Decovert_generate_amortization_pdf($segmentid)
	{
		$this->data['damortizationdata']=$this->Decovert_Loans_Model->get_decovertamortization($segmentid);
		return  $this->load->view('superadmin/damortization_pdf_generate',$this->data,true);
	}
	public function Decovert_generate_amortizationpdffile($segmentid)
	{
		error_reporting(0);
		$this->data['damortizationdata']=$this->Decovert_Loans_Model->get_decovertamortizationview($segmentid);
		return  $this->load->view('superadmin/damortization_pdf_generate',$this->data,true);
	}
	
	public function select_customer()
	{
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$this->data['secteurs']=$this->Decovert_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->Decovert_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->Decovert_Loans_Model->get_type_of_contract();
		$this->data['branch_record']=$this->Decovert_Loans_Model->get_All_branch();
		$this->data['bankdetails']=$this->Decovert_Loans_Model->get_bankdetails();
		
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['customerdetails']=$this->Decovert_Loans_Model->get_decovert_customer();
		$this->data['title'] = 'DCP - Decovert Select Customer';		
		/*$segmentid=$this->uri->segment(3);
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['bankdetails']=$this->Decovert_Loans_Model->get_decovertamortization($segmentid);
		$this->data['title'] = 'DCP - Customer Verification';*/
		//$this->render_template2('superadmin/decovert_select_customer', $this->data);
		$this->render_template2('superadmin/decovert_select_customer', $this->data);

	}
	public function SearchDecovertAccount(){
		$segment=$this->input->post('segment');
		$data= $this->data['accontdata']=$this->Decovert_Loans_Model->get_customers_details($this->input->post('account'));		
		$html=null;		
		if(!empty($data)){
		foreach ($data as $key) {
			$html .="<tr>
			<td>".$key['cid']."</td>
			<td>".$key['account_name']."</td>
			<td>".$key['account_number']."</td>
			<td>".$key['dob']."</td>
			<td>".$key['address']."</td>
			<td>".$key['emp_name']."</td>
			<td>".$key['phone']."</td>
			<td><a href='javascript:void(0)' class='btn btn-primary confirmation' onclick=\"return theFunction(".$key['cid'].");\">
			SELECT</a></td>
		</tr>";
		 }
		}else {			
			$html .="<tr class=\"odd\"><td valign=\"top\" colspan=\"8\" class=\"dataTables_empty\">No matching records found</td></tr>";
		}
			echo $html;
	}
	public function is_ajax_request(){			
		$multiple=array();
		$this->data['record']=$this->Common_model->get_admin_details();
		$branchid=$this->data['record'][0]->branch_id;
		$customerid=$this->input->post('customerid');
		$segment=$this->input->post('segment');
		$multiple1 =array('customer_id' =>$customerid);
		$record=$this->Decovert_Loans_Model->getapplicationformrecord($segment);		
		foreach ($record->result_array() as $key) {
			$multiple[]=$key;
		}
		//$data=array_merge($multiple1,$multiple[0]);
		$data1=array(
			"customer_id"=>$customerid,
			"branch_id"=>$branchid,
			"loan_status"=>"Process",
			"created" =>date('Y-m-d H:i:s'),
			"modified"=>date('Y-m-d H:i:s'),
		);
		$data=array_merge($multiple1,$multiple[0],$data1);
		//echo $data['loan_type'];
		//print_r($data); exit;
		$res=$this->Decovert_Loans_Model->insertRow('decovert_applicationform',$data);
		if($res){			
			$array=array('tdid' =>$segment,);
			$details="NOUVEAU DECOUVERT form created with amount CFA ".number_format($data['requested_overdraft'],0,',',' ')." and application number is ".$data['application_no']." under process";
			$history_arr=array(
					"cl_aid" =>$res,
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>$customerid,
					"loan_type"=>trim($data['loan_type']),
					"comment" =>$details,			
					"created" =>date('Y-m-d H:i:s')
				);
			$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
			$this->Decovert_Loans_Model->delete_data('temp_applicationform_decovert',$array);
			echo $res;
		}else{
			echo 0;
		}
	}
	public function customer_details(){
		error_reporting(0);
		$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$id=$this->uri->segment(3);
		$this->data['appformD']=$this->Decovert_Loans_Model->get_customar_applicationform_details($id);
		$this->data['customer_details']=$this->Decovert_Loans_Model->get_customar_details_record($this->uri->segment(3));
		/*Application Tracking Timeline*/
		$this->data['tracking_timeline']=$this->Decovert_Loans_Model->get_tracking_timeline($id);
		/*Interaction History tab-6*/
		$this->data['int_email']=$this->Decovert_Loans_Model->get_interaction_data($id);

		$this->data['sys_docs']=$this->Decovert_Loans_Model->get_filedata($id);
		$this->data['clist_docs']=$this->Decovert_Loans_Model->get_check_list_customer_documents($id);

		
		$this->data['secteurs']=$this->Decovert_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->Decovert_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->Decovert_Loans_Model->get_type_of_contract();


		/*Risk Analysis tab-4*/
		$this->data['risk_analysis']=$this->Decovert_Loans_Model->get_risk_analysisfile($id);

		$this->data['riskcurrentmonthlyvrefit']=$this->Decovert_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->Decovert_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->Decovert_Loans_Model->get_financial_situation($id);


		/*Collateral tab-9*/
		$this->data['collateral']=$this->Decovert_Loans_Model->get_collateral($id);
		$this->data['collateral_vehicule']=$this->Decovert_Loans_Model->get_collateral_vehicule($id);
		$this->data['collateral_deposit']=$this->Decovert_Loans_Model->get_collateral_deposit($id);
		$this->data['collateral_maison']=$this->Decovert_Loans_Model->get_collateral_maison($id);
		$this->data['collateral_excemption']=$this->Decovert_Loans_Model->get_collateral_excemption($id);
		/*Decision tab-10*/
		$this->data['decision_rec']=$this->Decovert_Loans_Model->get_decision_record($id);

		$customerID=$this->data['appformD'][0]['customer_id'];
		$this->data['pinfo']=$this->Decovert_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->Decovert_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->Decovert_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->Decovert_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->Decovert_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->Decovert_Loans_Model->get_oInformation($customerID);
		$this->data['customersd']=$this->Decovert_Loans_Model->get_customersdetailsinfo($customerID);
		$this->data['customerdata']=$this->Decovert_Loans_Model->get_customerdetails_list();
		$this->data['urlid'] = $id;

		$is_admin = ($user_id != 2) ? true :false;
		$this->data['title'] = 'DCP - Decovert Customer Details';
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/decovert_customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}

	}

	/*============================Today modify on 11-07-2019=============================*/
	/*Change Type Id*/
	public function interaction_email()
    {
    	$row_array=array();
    	$recordmail=$this->Common_model->get_admin_details(2);
    	$config['mailtype'] = 'html';
    	$this->load->library('email',$config);
    	
    	$this->form_validation->set_rules('field_name', 'Nom et Prénoms', 'required');
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
    			'cl_aid'=>trim($this->input->post('did')),
    			'admin_id' =>trim($this->session->userdata('id')),
    			'mailcontent' =>trim($databinding),
    			'mode'=>trim('Email'),
    			'loan_type' =>3,
    			'section' =>3,
    			'status'=>1,
    		);
            $rsid=$this->Decovert_Loans_Model->insertRow('interaction_history',$data);
            $details="Sent a mail to  ".$this->input->post('fieldemail')." (".$this->input->post('field_name').") Subject ".$this->input->post('fieldsubject')." ";
				$history_arr=array(
					"cl_aid" =>trim($this->input->post('did')),
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>$this->input->post('customar_id'),
					"loan_type"=>trim($this->input->post('loan_type')),
					"comment" =>$details,
					"content_type"=>"mail",				
					"created" =>date('Y-m-d H:i:s')
				);
			$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);        
            $body= '<table border="1" width="350px">
				  <tr>
				    <td width="20%"><strong>Nom et Prénoms</strong></td>
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
    		    $this->email->subject('Consumer Loans-Interaction'. $this->input->post("fieldsubject"));
    		    $this->email->message($body);		    
    		    $send = $this->email->send();
    		    if ($send) {
    		       echo 'success';
    		    } else {
    		       echo 'error' .$this->email->print_debugger();
    		       //$data=array('status'=>0);
    		       $this->Decovert_Loans_Model->updateRow('interaction_history', 'id',$rsid,array('status'=>0));
    		    }
		}
    }


	public function amortization_decovert_views(){
		$id=$this->uri->segment(3); 
		$this->data['title'] = 'DCP - Decovert Amortization';			
		$this->data['record']=$this->Common_model->get_admin_details(2);
		$this->data['amortrecord']=$this->Decovert_Loans_Model->get_decovertamortizationview($id);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/decovert_amortization_view', $this->data);
	}

	/*modify on 09-10-2019*/

	public function add_newcustomer()
	{
		//print_r($_POST); exit;
		//print_r($this->input->post(),1);
		$dob=date("Y-m-d", strtotime($this->input->post('dob')));		
		$employment_date=date("Y-m-d", strtotime($this->input->post('employment_date')));
		$edn_date_contract_cdd=date("Y-m-d", strtotime($this->input->post('edn_date_contract_cdd')));
		$opening_date=date("Y-m-d", strtotime($this->input->post('opening_date')));
		$expiration_date=date("Y-m-d", strtotime($this->input->post('expiration_date')));		
		sleep(1);
		$tbl_cus_field=array(
			"admin_id"=>$this->session->userdata('id'),
			"aid"=>1,
			"account_name"=>$this->input->post('bank_name'),
			"account_number"=>trim($this->input->post('accoumt_number')),
			"dob"=>trim($dob),
			"address"=>$this->input->post('resides_address'),
			"emp_name"=>trim($this->input->post('emp_name')),
			"phone"=>$this->input->post('main_phone'),
			"created"=>date('Y-m-d H:i:s'),
		);		
		$getid=$this->Decovert_Loans_Model->insertRow('tbl_customers',$tbl_cus_field);

		if($getid){

			//echo $getid;
			$tbl_customer_personalinformation=array(
				"customar_id"=>$getid,
				"first_name"=>$this->input->post('first_name') ?? "",
				"middle_name"=>$this->input->post('middle_name') ?? "",
				"last_name"=>$this->input->post('last_name') ?? "",
				"gender"=>$this->input->post('gender') ?? "",
				"dob"=>trim($dob) ?? "",
				"education"=>$this->input->post('education') ?? "",
				"marital_status"=>$this->input->post('marital_status') ?? "",
				"email"=>trim($this->input->post('email')) ?? "",
				"created"=>date('Y-m-d H:i:s') ?? "",
			);
			$this->Decovert_Loans_Model->insertRow('customer_personalinformation',$tbl_customer_personalinformation);

			$tbl_customer_additionalinformation=array(
				"customar_id"=>$getid,
				"type_id"=>trim($this->input->post('typeofid')) ?? "",
				"monthly_income"=>$this->input->post('monthly_income') ?? "",
				"monthly_expenses"=>$this->input->post('monthly_expenses') ?? "",
				"id_number"=>$this->input->post('id_number') ?? "",
				"state_of_issue"=>trim($this->input->post('state_of_issue')) ?? "",
				"occupation"=>$this->input->post('occupation') ?? "",
				"main_phone"=>$this->input->post('main_phone') ?? "",
				"alternative_phone"=>trim($this->input->post('alter_phone')) ?? "",
				"expiration_date_id"=>trim($expiration_date) ?? "",			
				"created"=>date('Y-m-d H:i:s') ?? "",
				"room_type"=>trim($this->input->post('room_type')) ?? "",
				"father_fullname"=>trim($this->input->post('father_fullname')) ?? "",
				"mother_fullname"=>trim($this->input->post('mother_fullname')) ?? "",
			);
			$this->Decovert_Loans_Model->insertRow('customer_additionalinformation',$tbl_customer_additionalinformation);
			
			$tbl_customar_employment_information=array(
				"customar_id"=>$getid,
				"emp_id"=>1,
				"employer_name"=>trim($this->input->post('emp_name')) ?? "",
				"secteurs_id"=>$this->input->post('secteurs') ?? "",
				"cat_emp_id"=>$this->input->post('cat_employeurs') ?? "",
				"contract_type_id"=>$this->input->post('typeofcontract') ?? "",
				"employment_date"=>trim($employment_date) ?? "",
				"sate_end_contract_cdd"=>trim($edn_date_contract_cdd) ?? "",
				"years_professionel_experience"=>trim($this->input->post('years_professionel_experience')) ?? "",
				"how_he_is_been_with_current_employer"=>trim($this->input->post('current_emp')) ?? "",
				"emp_net_salary"=>trim($this->input->post('net_salary')) ?? "",
				"retirement_age_expected"=>trim($this->input->post('retirement_age_expected')) ?? "",
				"fees"=>0,
				"commisiion"=>0,
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->Decovert_Loans_Model->insertRow('customar_employment_information',$tbl_customar_employment_information);

			$tbl_customer_address=array(
				"customar_id"=>$getid,
				"admin_id"=>2,
				"city_id"=>trim($this->input->post('city')) ?? "",
				"state_id"=>$this->input->post('state') ?? "",
				"street"=>$this->input->post('street') ?? "",
				"resides_address"=>trim($this->input->post('resides_address')) ?? "",
				"created"=>date('Y-m-d H:i:s') ?? "",
			);

			$this->Decovert_Loans_Model->insertRow('customer_address',$tbl_customer_address);

			$tbl_customar_bank_account=array(
				"customar_id"=>$getid,			
				"account_type"=>trim($this->input->post('account_type')) ?? "",
				"account_no"=>trim($this->input->post('accoumt_number')) ?? "",
				"bank_name"=>trim($this->input->post('bank_name')) ?? "",
				"bank_phone"=>$this->input->post('bank_phone') ?? "",
				"opening_date"=>$opening_date ?? "",
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->Decovert_Loans_Model->insertRow('customar_bank_account',$tbl_customar_bank_account);

			$tbl_customar_other_information=array(
				"customar_id"=>$getid,
				"admin_id"=>2,			
				"information"=>trim($this->input->post('another_test')) ?? "",
				"field_1"=>trim($this->input->post('test_field')) ?? "",
				"field_2"=>trim($this->input->post('test_david')) ?? "",
				"field_3"=>$this->input->post('cc_test') ?? "",
				"field_4"=>trim($this->input->post('cc_test')) ?? "",
				"objet_credit"=>trim($this->input->post('obj_credit')) ?? "",
				"frais_de_dossier"=>trim($this->input->post('frais_de_dossier')) ?? "",
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->Decovert_Loans_Model->insertRow('customar_other_information',$tbl_customar_other_information);

			echo "success";
		}else{
			echo "error";
		}
	}


	public function download_contrat_demande_decouvert_form()
	{
	    error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_credit_agreement_form_pdf($segmentid);
		echo $getHtmlagreement;
		// exit;
		 $filename=$segmentid.'-'.time();
		 //$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}

	public function generate_credit_agreement_form_pdf($id)
	{
		error_reporting(0);
		//$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$id=$this->uri->segment(3);
		$this->data['appformD']=$this->Decovert_Loans_Model->get_customar_applicationform_details($id);
		$this->data['customer_details']=$this->Decovert_Loans_Model->get_customar_details_record($id);
		/*Application Tracking Timeline*/
		$this->data['tracking_timeline']=$this->Decovert_Loans_Model->get_tracking_timeline($id);
		/*Interaction History tab-6*/
		$this->data['int_email']=$this->Decovert_Loans_Model->get_interaction_data($id);
		
			/*Risk Analysis tab-4*/
		$this->data['riskcurrentmonthlyvrefit']=$this->Decovert_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->Decovert_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->Decovert_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->Decovert_Loans_Model->get_applicableloan_ratio();	
		$this->data['customersd']=$this->Decovert_Loans_Model->get_customersdetailsinfo($id);
		$this->data['risk_analysis']=$this->Decovert_Loans_Model->get_risk_analysisfile($id);
		

		$customerID=$this->data['appformD'][0]['customer_id'];
		$this->data['pinfo']=$this->Decovert_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->Decovert_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->Decovert_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->Decovert_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->Decovert_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->Decovert_Loans_Model->get_oInformation($customerID);
	   $this->data['customersd']=$this->Decovert_Loans_Model->get_customersdetailsinfo($customerID);
		$this->data['customerdata']=$this->Decovert_Loans_Model->get_customerdetails_list();		
		return $this->load->view('superadmin/decouvert_contrat_demande_de_decouvert',$this->data,true);
	}

	public function download_billet_a_ordre_form()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_Billet_aÇ_Ordre_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();		 
	}
	public function generate_Billet_aÇ_Ordre_Credit_Scolaire($id)
	{
		 error_reporting(0);
		error_reporting(0);
		//$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$id=$this->uri->segment(3);
		$this->data['appformD']=$this->Decovert_Loans_Model->get_customar_applicationform_details($id);
		$this->data['customer_details']=$this->Decovert_Loans_Model->get_customar_details_record($this->uri->segment(3));
		/*Application Tracking Timeline*/
		$this->data['tracking_timeline']=$this->Decovert_Loans_Model->get_tracking_timeline($id);
		/*Interaction History tab-6*/
		$this->data['int_email']=$this->Decovert_Loans_Model->get_interaction_data($id);

		$customerID=$this->data['appformD'][0]['customer_id'];
		$this->data['pinfo']=$this->Decovert_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->Decovert_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->Decovert_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->Decovert_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->Decovert_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->Decovert_Loans_Model->get_oInformation($customerID);
	        $this->data['customersd']=$this->Decovert_Loans_Model->get_customersdetailsinfo($customerID);
		$this->data['customerdata']=$this->Decovert_Loans_Model->get_customerdetails_list();
		return  $this->load->view('superadmin/decovert_billetordre',$this->data,true);
	}

	public function uploadfile_split(){
		//print_r($_POST); exit;
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/Decovert_Loans/system-docs/';
		   $config["allowed_types"] ="*";
		   $config['max_size'] = '0';
		   $config['max_width'] = '1000';
		   $config['max_height'] = '1000';
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
					'loan_type'=>3,
            	);
				$rsid=$this->Decovert_Loans_Model->insertRow('system_docs',$data);
				
				$output=array('success' => $filesCount." files successfully upload.");
			}
		   }
		   if(!empty($output['success'])){
		  		$details="Account Manager ".$filesCount." files upload in system documents.";
				$history_arr=array(
					"cl_aid" =>$this->input->post("id"),
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>trim($this->input->post("customar_id")),
					"loan_type"=>3,
					"content_type"=>"file",
					"comment" =>$details,			
					"created" =>date('Y-m-d H:i:s')
				);
				$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
			}
		   echo json_encode($output); 
		   
		  }		
		}

	public function uploadfile_check_list(){
	sleep(2);
	  if($_FILES["files"]["name"] != '')
	  {
	   $output = '';
	   $config["upload_path"] = './assets/Decovert_Loans/check-list-customer/';
	   $config["allowed_types"] ="*";
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
					'loan_type'=>3,
				);
				$rsid=$this->Decovert_Loans_Model->insertRow('system_docs',$data);
				$output=array('success' => $filesCount." files successfully upload.");
			}
	   }
	  		if(!empty($output['success'])){
	   			$details="Account Manager ".$filesCount." files upload in check list customer documents.";
				$history_arr=array(
					"cl_aid" =>$this->input->post("id"),
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>trim($this->input->post("customar_id")),
					"loan_type"=>3,
					"content_type"=>"file",
					"comment" =>$details,			
					"created" =>date('Y-m-d H:i:s')
				);
				$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
			}
	   echo json_encode($output); 
	   
	  }
	}
/*Risk Analysis file upoad*/
	public function uploadfile_risk_analysis(){
		//print_r($_POST); //exit;
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/riskanalysis/';
		   //$config["allowed_types"] = 'pdf|doc|docx|gif|jpg|png';
		  	$config["allowed_types"] ="*";
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
						"loan_type"=>3,	
						'section'=>1,						
					);

					//print_r($filedata); exit;			
					$rsid=$this->Decovert_Loans_Model->insertRow('riskanalysis',$filedata);
					$output=array('success' => $filesCount." files successfully upload.");
					}
				}

				if(!empty($output['success'])){
					$details="Risk Analysis Documents ".$filesCount." files upload.";
					$history_arr=array(
						"cl_aid" =>$this->input->post("id"),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>trim($this->input->post("customar_id")),
						"loan_type"=>3,
						"content_type"=>"file",
						"comment" =>$details,			
						"created" =>date('Y-m-d H:i:s')
					);
					$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
				}		   
		   echo json_encode($output); 
		   
		}
	} 
	/*End Risk Analysis*/

	/*====================Collateral Section==========================*/
    public function uploadfile_collateral_vehicule()
	{
	//print_r($_POST); exit;		
	 if($_FILES["files"]["name"] != '')
		  {
		   $output='';
			$return_arr = array();			   
		   $config["upload_path"] = './assets/collateral/vehicule/';
		   //$config["allowed_types"] = 'pdf|doc|docx|jpg|png|jpeg|jpe|xml';
		   $config["allowed_types"] ="*";
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
					'cl_aid'=>$this->input->post('did'),
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
					'loan_type'=>3,
					'section'=>3,
				);
				$getid=$this->Decovert_Loans_Model->insertRow('collateral',$data);
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
							'loan_type'=>3,
							'section'=>3,
						);			
						$rsid=$this->Decovert_Loans_Model->insertRow('collateral_files',$filedata);
						$details="Collateral Véhicule ".$filesCount." file upload.";
						$history_arr=array(
							"cl_aid" =>$this->input->post('did'),
							"admin_id" =>$this->session->userdata('id'),
							"customar_id" =>$this->input->post('vcustomar_id'),
							"loan_type"=>3,
							"comment" =>$details,			
							"created" =>date('Y-m-d H:i:s')
						);
						$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
					'cl_aid'=>$this->input->post('did'),
					'admin_id'=>trim($this->session->userdata('id')),						
					'customer_id'=>$this->input->post('customar_id'),
					'selected_field'=>trim($this->input->post('collateraltype')),					
					'd_numero_de_compte'=>$this->input->post('d_numero_de_compte'),
					'd_montant'=>$this->input->post('d_montant'),
					'loan_type'=>3,
					'section'=>3,
				);
				$getid=$this->Decovert_Loans_Model->insertRow('collateral',$data);
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
							"section"=>3,
							'loan_type'=>3,							
						);											
						$rsid=$this->Decovert_Loans_Model->insertRow('collateral_files',$filedata);
						$details="Collateral Déposit ".$filesCount." files upload.";
						$history_arr=array(
							"cl_aid" =>$this->input->post('did'),
							"admin_id" =>$this->session->userdata('id'),
							"customar_id" =>$this->input->post('customar_id'),
							"loan_type"=>3,
							"comment" =>$details,			
							"created" =>date('Y-m-d H:i:s')
						);
						$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
						'cl_aid'=>$this->input->post('did'),
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
						'section'=>3,
						'loan_type'=>3,
					);	   
					$getid=$this->Decovert_Loans_Model->insertRow('collateral',$data);
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
										'section'=>3,
										'loan_type'=>3,							
									);			
								$rsid=$this->Decovert_Loans_Model->insertRow('collateral_files',$filedata);
								$details="Collateral Maison ".$filesCount." files upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('did'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>3,
									"comment" =>$details,			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
				'cl_aid'=>$this->input->post('did'),
				'admin_id'=>trim($this->session->userdata('id')),
				'customer_id'=>trim($this->input->post("customar_id")),	
				'selected_field'=>trim($this->input->post('collateraltype')),
				'section'=>3,
				'loan_type'=>3,
			);
			$getid=$this->Decovert_Loans_Model->insertRow('collateral',$data);
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
						'section'=>3,
						'loan_type'=>3,							
					);
					$rsid=$this->Decovert_Loans_Model->insertRow('collateral_files',$filedata);
					$details="Collateral Excemption ".$filesCount." files upload.";
					$history_arr=array(
						"cl_aid" =>$this->input->post('did'),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>$this->input->post('customar_id'),
						"loan_type"=>3,
						"comment" =>$details,			
						"created" =>date('Y-m-d H:i:s')
					);
					$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
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
		$collateralfiles=$this->Decovert_Loans_Model->get_collateralFiles($this->input->post('id'));
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
        $files = $this->Decovert_Loans_Model->get_collateralFiles($id);         
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
        $files = $this->Decovert_Loans_Model->get_collateralFiles($id);         
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
        $files = $this->Decovert_Loans_Model->get_collateralFiles($id);         
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
        $files = $this->Decovert_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/excemption/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	/*===============================================================*/
	/*============================Today modify on 11-07-2019=============================*/
	/*Change Type Id*/
	public function changetypeid()
	{
		sleep(2);		
		$udata=array("type_id" =>trim($this->input->post('select_val')),);
		$update=$this->Decovert_Loans_Model->updateRow('customer_additionalinformation','ai_id', $this->input->post('ai_id'), $udata);
		if($udata){echo 1;}else{echo 0;}
	}
	public function changesecteurs()
	{
		sleep(2);	
		//print_r($_POST); exit;	
		$udata=array("secteurs_id" =>trim($this->input->post('select_val')),);
		$update=$this->Decovert_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('ai_id'), $udata);
		if($udata){echo 1;}else{echo 0;}
	}
	public function changecat_employeurs()
	{
		sleep(2);	
		//print_r($_POST); exit;	
		$udata=array("cat_emp_id" =>trim($this->input->post('select_val')),);
		$update=$this->Decovert_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
		if($udata){echo 1;}else{echo 0;}
	}

	public function change_type_of_contract()
	{
		sleep(2);	
		//print_r($_POST); exit;	
		$udata=array("contract_type_id" =>trim($this->input->post('select_val')),);
		$update=$this->Decovert_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
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
		$update=$this->Decovert_Loans_Model->updateRow('customar_other_information','oid', $this->input->post('oid'), $udata);
		if($udata){
			$output=$obj_arr;
		}else{			
			$output=array('error'=>"error");
		}
		echo json_encode($output);
	}



/*=================Decision Tab 10==================*/

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
				'loan_id'=>trim($this->input->post('did')),
				'decision'=>trim($this->input->post('decision')),
				'commentstatus'=>trim($this->input->post('commentstatus')),
				'loantype'=>3,	
				'modified'=>date('Y-m-d H:i:s'),	
			);
			$insert=$this->Decovert_Loans_Model->insertRow('branmanager_approbation',$fata2);
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
				$this->Decovert_Loans_Model->updateRow('decovert_applicationform','did', $this->input->post('did'), $status);
				$msg2=str_replace('|', ', ', $comnt);
				$details=$msg2;

				$history_arr=array(
					"cl_aid" =>trim($this->input->post('did')),
					"admin_id" =>trim($this->input->post('account_manager_id')),
					"customar_id" =>trim($this->input->post("customar_id")),				
					"comment" =>$details,
					"loan_type"=>3,	
					'content_type'=>'text',		
					"created" =>date('Y-m-d H:i:s')
				);
				$res=$this->Decovert_Loans_Model->insertRow('tracking_timeline',$history_arr);
				$output=array('success' =>"Decision successfully updated.");
				
				### 
				### Send Mail To Higher Official
				###
				$did = $this->input->post('did'); // loan id
				$sendMailToHigherOfficial = $this->sendMailToHigherOfficial($did);
				if(!empty($sendMailToHigherOfficial)) {
					$output = $sendMailToHigherOfficial;
				}

			}else{
				$output=array('error' =>"Unable update to record");
		}
	  }
		echo json_encode($output);
	}


	public function downloadall(){
        $createdzipsystemdocs = 'systemdocs';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->Decovert_Loans_Model->get_filedata($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths = './assets/Decovert_Loans/system-docs/'.$file['filesname'];
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
        $files = $this->Decovert_Loans_Model->get_check_list_customer_documents($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');

        foreach ($files as $file) {			
            $paths = './assets/Decovert_Loans/check-list-customer/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipchecklist.'.zip');
    }

    /*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST); exit;
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->Decovert_Loans_Model->filterDecovertloan(trim($this->input->post('filter')), trim($this->input->post('bid')));
		//echo "<pre>", print_r($recordcheck),"</pre>";	
		$html=null;
		if(!empty($recordcheck)){
			foreach ($recordcheck as $key) {
				$time_ago=$key['created'];				
				$time_ago=$key['created'];				
       			$createddate=date('23', strtotime($key['created']));       			
				$row = array();


				$html .="<tr id=\"rowid".$key['did'].";?>\">
				<td> ".$key['application_no']."</td>
				<td> ".$key['account_number']."</td>
				<td> ".$key['branch_name']."</td>
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>				
				<td> ".date("d-m-Y", strtotime($key['created']))."</td>
				<td> ".number_format($key['average'],0,',',' ')."</td>
				<td> ".number_format($key['requested_overdraft'],0,',',' ')."</td>				
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
						<a href=\"".base_url('Decovert_Loans/customer_details/').$key['did']."\" class=\"table-link\">
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
	    		$update=$this->PP_Credit_Scholar_Model->updateRow('decovert_applicationform','did', $this->input->post('capid'), $data);
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
	    		$update=$this->PP_Credit_Scholar_Model->updateRow('decovert_applicationform','did', $this->input->post('capid'), $data);
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
	    		$update=$this->PP_Credit_Scholar_Model->updateRow('decovert_applicationform','did', $this->input->post('capid'), $data);
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
	    		$update=$this->PP_Credit_Scholar_Model->updateRow('decovert_applicationform','did', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}
	    }
	}
/*Amortization Edit MONTANT SOLLICITE PAR LE CLIENT field*/
	public function change_objet_amountsoughtcustomer()
	{		
		sleep(2);
		$output = '';				
		$udata=array("amount_sought_customer" =>trim($this->input->post('select_val')),);
		$update=$this->Decovert_Loans_Model->updateRow('tbl_temp_applicationform_decovert','tdid', $this->input->post('editid'), $udata);
		if($udata){
			$output=array('success'=>"success");
		}else{			
			$output=array('error'=>"error");
		}
		echo json_encode($output);
	}

	public function riskanalysis_financial_situation()
	{		
		//print_r($_POST); exit;
		$recordcheck=$this->Decovert_Loans_Model->check_riskanalysis_financial_situation($this->input->post('did'));		
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('did')),
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
				$edit=$this->Decovert_Loans_Model->updateRow('riskanalysis_financial_situation', 'rfs_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->Decovert_Loans_Model->insertRow('riskanalysis_financial_situation',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}
	}


	public function change_amountlatter()
	{
		/*print_r($_POST);
		$id=$this->uri->segment(3); 
		echo $id; */ 

		sleep(2);
		$output = '';				
		$udata=array("letter_format" =>trim($this->input->post('text')),);
		$update=$this->Decovert_Loans_Model->updateRow('tbl_temp_applicationform_decovert','tdid', $this->input->post('id'), $udata);
		if($udata){
			$output=array('success'=>"success");
		}else{			
			$output=array('error'=>"error");
		}
		echo json_encode($output);	
	}

	public function change_amountlatter_details()
	{
		/*print_r($_POST);
		$id=$this->uri->segment(3); 
		echo $id; */ 

		sleep(2);
		$output = '';				
		$udata=array("letter_format" =>trim($this->input->post('text')),);
		$update=$this->Decovert_Loans_Model->updateRow('tbl_decovert_applicationform','did', $this->input->post('id'), $udata);
		if($udata){
			$output=array('success'=>"success");
		}else{			
			$output=array('error'=>"error");
		}
		echo json_encode($output);	
	}
/**
*  update 
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
		$body['dob'] = date("Y-m-d",strtotime($input['dob']));	
		$body['gender'] = $input['gender'] ?? "";
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
		'monthly_income' => (int)(str_replace('F CFA ','', $input['monthly_income'])) ?? 0,
		'monthly_expenses' => (int)(str_replace('F CFA ','', $input['monthly_expenses'])) ?? 0,
		'type_id' => $input['type_id'] ?? "",	
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
    $body['monthly_income'] = (int)(str_replace('F CFA ','', $input['monthly_income'])) ?? 0;
    $body['monthly_expenses'] = (int)(str_replace('F CFA ','', $input['monthly_expenses'])) ?? 0;
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
	
	if(empty($input['emp_infoid'])){
		
	# build body and insert 
	$tbl_customar_employment_information = array(
	"customar_id"=>$input['id'],
	'emp_id' => "",
	'employer_name' => $input['employer_name'] ?? "",
	'cat_emp_id' => $input['cat_emp_id'] ?? "",
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
		"customar_id"=>$input['cid'],
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
	 	redirect(base_url('Decovert_Loans/customer_details/'.$input['id']));
  }
	
	/**
	 * Send Mail To Higher Official
	 * 	###
	 * 	###	In DECOUVERT Loan
   *  ###
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	###
	 */
	public function sendMailToHigherOfficial($loanId)
	{
		# Initialize an array
		$output = [];

		# Get loan amount				
		$getLoanDetails = $this->db->select('*')->from('tbl_decovert_applicationform')->where('did', $loanId)->get()->row_array();
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
		$getCustomerDetails = $this->db->select('*')->from('tbl_customer_personalinformation')->where('customar_id', $getLoanDetails['customer_id'])->get()->row_array();
		if(empty($getCustomerDetails)) {
			$output=array('success' =>"Updated Successfully! - Failed to send mail to higher official!");
			return $output;
		}

		# bank account
		$getbankaccount = $this->db->select('*')->from('tbl_customar_bank_account')->where('customar_id', $getLoanDetails['customer_id'])->get()->row_array();
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
		$subject = "Account Manager Avis favorable for a loan DECOVERT";
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
	
}