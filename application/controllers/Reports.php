<?php 
// New Update : 16-11-2020

// Usage : This controller maintains all reporting in the application

defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'Gabon | Reports';	
		
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->helper('timeAgo');   	
	}

	
	function getDatesFromRange($start, $end, $format = 'Y-m-d') { 
      
	    // Declare an empty array 
	    $array = array(); 
	      
	    // Variable that store the date interval 
	    // of period 1 day 
	    $interval = new DateInterval('P1D'); 
	  
	    $realEnd = new DateTime($end); 
	    $realEnd->add($interval); 
	  
	    $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
	  
	    // Use loop to store date into array 
	    foreach($period as $date) {                  
	        $array[] = $date->format($format);  
	    } 
	  
	    // Return the array elements 
	    return $array; 
	} 

	public function weekly_report(){

		$this->data['page'] = 'Rapport Hebdomadaire';

		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;

		if($this->session->userdata('role') == "2" || $this->session->userdata('role') == "3")
		{
			$u_where  =  array('branch_id'=> $this->data['record'][0]->branch_id,'is_admin' => '2');
		}
		else
		{

			if($this->input->post('branch_name'))
			{
				$u_where  =  array('is_admin' => '2','branch_id' => $this->input->post('branch_name'));
			}
			else
			{
				$u_where  =  array('is_admin' => '2');
			}
			
		}
		
		$users =  $this->Common_model->getAllRecords('tbl_user',$u_where);


		// date range

		if($this->input->post('daterange'))
		{
			$date_range  = explode('-',$this->input->post('daterange'));

			$this_week_sd = date("Y-m-d",strtotime($date_range[0]));
			$this_week_ed = date("Y-m-d",strtotime($date_range[1]));
		}
		else{

			$monday = strtotime("last monday");
			$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;

			$sunday = strtotime(date("Y-m-d",$monday)." +4 days");

			$this_week_sd = date("Y-m-d",$monday);
			$this_week_ed = date("Y-m-d",$sunday);
		}

		$this->data['formatted_date'] =  date("Y/m/d",strtotime($this_week_sd))." - ".date("Y/m/d",strtotime($this_week_ed));
		$date_array = $this->getDatesFromRange($this_week_sd,$this_week_ed);

		$this->data['date_title'] = "Rapport Hebdomadaire du ".date('d-M-Y', strtotime($this_week_sd))." au ".date('d-M-Y', strtotime($this_week_ed));

		$this->data['date_arr'] = $date_array ;

		$b_where  =  array('deleted' => '0');
		$this->data['all_branch'] =  $this->Common_model->getAllRecords('tbl_branch',$b_where);

		//$date_array = $this->getDatesFromRange('2020-10-08','2020-11-08');
		// echo '<pre>';
		// print_r($date_array);


		//$current_dayname = date("l"); // return sunday monday tuesday etc.
		             
		//echo $date = date("Y-m-d",strtotime('monday this week')).'to'.date("Y-m-d",strtotime("$current_dayname this week")); 

		$details = array();
		$total =  array();
		foreach($users as $key=>$rec)
		{
			$details[$key]['name'] = $rec['first_name'].' '.$rec['last_name'];

			$branch_where  =  array('bid' => $rec['branch_id']);
		    $branch_data  =  $this->Common_model->getRecord('tbl_branch','',$branch_where);
            $details[$key]['department'] = $rec['department'];
			$details[$key]['branch'] = $branch_data['branch_name'];
			$details[$key]['target_loan_count'] = $rec['target_loan_count'];
			$details[$key]['target_loan_amount'] = $rec['target_loan_amount'];

			$record  =  array();


			foreach($date_array as $key1=>$d_arr){

				// Credit Conso
				$conso_loans = $this->db->query("SELECT loan_id,loan_id_temp FROM tbl_credit_conso_applicationloan WHERE (created_at BETWEEN '".$d_arr." 00:00:00' AND '".$d_arr." 23:59:59') AND user_id = '".$rec['id']."' AND branch_id = '".$rec['branch_id']."' AND final_status='Disbursement'")->result_array();

				// echo '<pre>';
				// print_r($conso_loans);

				$sum4 = 0;$count4 = 0;
				foreach($conso_loans as $cl)
				{
					$consoloan_amount = $this->db->get_where('tbl_temp_consumer_applicationform',array('aid' => $cl['loan_id_temp']))->row_array();

					$sum4 += $consoloan_amount['loan_amt'];
					$count4++;
				}

				$count_consoloan = $count4; 
				$sum_consoloan = $sum4;

				// Credit Scolaire
				$creditsc_loans = $this->db->query("SELECT loan_id,loan_id_temp FROM tbl_credit_scolair_applicationloan WHERE (created_at BETWEEN '".$d_arr." 00:00:00' AND '".$d_arr." 23:59:59') AND user_id = '".$rec['id']."' AND branch_id = '".$rec['branch_id']."' AND final_status='Disbursement'")->result_array();

				$sum5 = 0; $count5 = 0;
				foreach($creditsc_loans as $cl1)
				{
					$creditloan_amount = $this->db->get_where('tbl_temp_consumer_applicationform',array('aid' => $cl1['loan_id_temp']))->row_array();

					$sum5 += $creditloan_amount['loan_amt'];
					$count5++;
				}

				$count_creditloan = $count5; 
				$sum_creditloan = $sum5;

				// Credit Confort
				$creditconfort_loans = $this->db->query("SELECT loan_id,loan_id_temp FROM tbl_credit_confort_applicationloan WHERE (created_at BETWEEN '".$d_arr." 00:00:00' AND '".$d_arr." 23:59:59') AND user_id = '".$rec['id']."' AND branch_id = '".$rec['branch_id']."' AND final_status='Disbursement'")->result_array();

				//echo $this->db->last_query();

				$sum6 = 0; $count6= 0;
				foreach($creditconfort_loans as $cl2)
				{
					$creditloanc_amount = $this->db->get_where('tbl_temp_consumer_applicationform',array('aid' => $cl2['loan_id_temp']))->row_array();
					//echo $this->db->last_query();

					$sum6 += $creditloanc_amount['loan_amt'];
					$count6++;
				}

				 $count_confortloan = $count6; 
				 $sum_confortloan = $sum6;


				$record[$d_arr]['number'] = $count_consoloan + $count_creditloan + $count_confortloan;

				$record[$d_arr]['sum'] = $sum_consoloan + $sum_creditloan + $sum_confortloan;

				if($key == 0)
				{
					$total= $record;
				}
				else{

					if (array_key_exists($d_arr,$total))
					{
					    $total[$d_arr]['number'] =  $total[$d_arr]['number'] + $record[$d_arr]['number'];
					    $total[$d_arr]['sum'] =  $total[$d_arr]['sum'] + $record[$d_arr]['sum'];

					}
				}

			}

			

			$details[$key]['data'] = $record;
			
		}

		$this->data['details'] =  $details;
		$this->data['total'] =  $total;

		$this->data['comm_data'] =  $this->Common_model->getRecord('tbl_commission');

		$this->render_template2('reports/weekly_report', $this->data);
	}
	
	
	public function make_datatables(){
	    
	    
     	$user_id = $this->session->userdata('id');
	 	$user_data =  $this->Common_model->get_user_details($user_id);
	 	$role_id =  $user_data['is_admin'];
		
		
	    $user_app =  array();
	    
	    //print_r($_POST);

		// Filter post
		$date= date('d-m-Y');
		$date2= date('d-m-Y', strtotime('-1 day', strtotime($date)));
		$start_date  =  ($this->input->post('start_date')) ? ($this->input->post('start_date')): ($date2);
		$end_date = ($this->input->post('end_date')) ? ($this->input->post('end_date')): ($date);
		$branch = $this->input->post('agence_id');
		$account_manager = $this->input->post('account_manager_id');
		
	
	    
	    $this->db->group_by('loan_id,loan_type');
		$this->db->order_by('app_id','desc');
		
		if($account_manager){
		    $this->db->where('user_id',$account_manager);
		}
		else{
		    if($role_id == "2"){
		        $this->db->where('user_id',$user_id);
		    }
		}
		
	   if($_POST["length"] > 0)  
       {  
            $this->db->limit($_POST['length'], $_POST['start']);  
       } 
    //   else {
    //       $this->db->limit(10);  
    //   }
	    
	     $applications  =  $this->db->get_where('tbl_all_applications',array('status' => "1"))->result_array();
	    // echo $this->db->last_query(); 
	     
	     foreach($applications  as $app)
		{
				if($app['loan_type'] == "credit_conso")
				{
					$table_name=  'tbl_credit_conso_applicationloan  as g';
				}
				else if($app['loan_type'] == "credit_confort")
				{
					$table_name= 'tbl_credit_confort_applicationloan  as g';
				}else{
				    $table_name= 'tbl_credit_scolair_applicationloan  as g';
				    $this->db->select('g.department');
				}
			
				$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,g.customer_type,g.cancelled_by,g.final_status,g.final_disburse_date,g.disbursed_by,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg,u.user_name,u.exploitent');
				$this->db->from($table_name);
				$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
				$this->db->join('tbl_user as u','u.id = g.user_id','inner');
				$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','inner');

				if($role_id=='2'){
					$this->db->where('g.user_id',$user_id);
					$this->db->where('g.branch_id',$user_data['branch_id']);
					$this->db->where('g.loan_id',$app['loan_id']);
				}
				else if($role_id == '3')
				{
				    $this->db->where('g.branch_id',$user_data['branch_id']);
				    $this->db->where('g.loan_id',$app['loan_id']);
				}
				else
				{
					 $this->db->where('g.loan_id',$app['loan_id']);
				}

				if($start_date != "" && $end_date != "")
				{
					$s_date  = date('Y-m-d',strtotime($start_date))." 00:00:00"; 
					$e_date  = date('Y-m-d',strtotime($end_date))." 23:59:59"; 
					$between_where  =  "(g.created_at BETWEEN '".$s_date."' AND '".$e_date."')";
					$this->db->where($between_where);
				}

				if($branch != "")
				{
					$this->db->where('g.branch_id',$branch);
				}

				if($account_manager !="")
				{
					$this->db->where('g.user_id',$account_manager);
				}
				
				
				//$this->db->where('g.deleted','0');
    	
				$result =  $this->db->get()->row_array();
				
			//	echo $this->db->last_query();

				if(!empty($result))
				{

					if($app['loan_type'] == "credit_conso")
					{
						$result['loan_type'] = "F??te ?? la Carte";
					}
					else if($app['loan_type'] == "credit_confort")
					{
						$result['loan_type'] = "Credit Confort";
					}else{
					    $result['loan_type'] = "Conges ?? la Carte";
					}

					
                    $last_entry='';$last_status = '';

					// Account Manager Details
					$acc_where = array('status' =>"1",'assigned_roles' => "2",'loan_id' => $app['loan_id'],'loan_type' =>$app['loan_type']);
				
					$acc_data =  $this->Common_model->getRecord('tbl_all_applications','',$acc_where );
						
					$user_where= array('id' =>$acc_data['user_id']);
					$acc_data2 =  $this->Common_model->getRecord('tbl_user','',$user_where );
					
					$cancel_where= array('id' =>$result['cancelled_by']);
					$cancelled_by =  $this->Common_model->getRecord('tbl_user','',$cancel_where );
				
			
                    $result['acc_mgr_id'] = $acc_data2['user_name'];
                    $result['acc_mgr_status_raw'] = $result['final_status'];
                    if($result['final_status'] == "Annul??" && $cancelled_by['is_admin'] == "2"){
                        $result['acc_mgr_status'] = '<span class="label label-danger">Annul??</span>';
                    }
                    else{
                        $result['acc_mgr_status'] = $this->get_label_status($acc_data['approval_status']);
                    }
                    
                    
					$result['acc_mgr_commentdate'] = $this->get_comment_date($acc_data['user_id'],$app['loan_id'], $app['loan_type'])  ;
					
			        if($result['acc_mgr_commentdate']){
					$last_status=$result['acc_mgr_status_raw'];
					$last_entry=$result['acc_mgr_commentdate'];
					}

					// Branch Manager Details
					$b_where = array('status' =>"1",'assigned_roles' => "3",'loan_id' => $app['loan_id'],'loan_type' =>$app['loan_type']);

					$b_data =  $this->Common_model->getRecord('tbl_all_applications','',$b_where );
				// 	echo $this->db->last_query();
				// 	    die;
					$user_where= array('id' =>$b_data['user_id']);
					$acc_data =  $this->Common_model->getRecord('tbl_user','',$user_where );
					
                    $result['branch_mgr_id'] = $acc_data['user_name'];
                    $result['branch_mgr_status_raw'] = $result['final_status'];
                    if($result['final_status'] == "Annul??" && $cancelled_by['is_admin'] == "2"){
                       $result['branch_mgr_status'] = '<span class="label label-danger">Annul??</span>'; 
                    }
                    else if($result['final_status'] == "Abandonner"){
                       $result['branch_mgr_status'] = '<span class="label label-danger">Abandonner</span>'; 
                    }
                    else{
                         $result['branch_mgr_status'] = $this->get_label_status($b_data['approval_status']);
                    }
                   
					$result['branch_mgr_commentdate'] = $this->get_comment_date($b_data['user_id'],$app['loan_id'], $app['loan_type'])  ;
					
				    if($result['branch_mgr_commentdate']){
					$last_status=$result['branch_mgr_status_raw'];
					$last_entry=$result['branch_mgr_commentdate'];
					}
					// AR delegue Credit 1 
					$ar_where = array('status' =>"1",'assigned_roles' => "6",'loan_id' => $app['loan_id'],'loan_type' =>$app['loan_type']);

					$ar_data =  $this->Common_model->getRecord('tbl_all_applications','',$ar_where );
					
					$user_where= array('id' =>$ar_data['user_id']);
					$acc_data =  $this->Common_model->getRecord('tbl_user','',$user_where );
                    $result['ar_id'] = $acc_data['user_name'];
                    $result['ar_status_raw'] = $result['final_status'];
					if(!empty($ar_data)){
					    if($result['final_status'] == "Annul??" && $cancelled_by['is_admin'] == "2"){
                           $result['ar_status'] = '<span class="label label-danger">Annul??</span>'; 
                        }
                        else if($result['final_status'] == "Abandonner"){
                           $result['ar_status'] = '<span class="label label-danger">Abandonner</span>'; 
                        }
                        else{
                          $result['ar_status'] =  $this->get_label_status($ar_data['approval_status']); 
                        }
					
					
					}
					else{
						$result['ar_status'] = "";
					}

					$result['ar_commentdate'] = $this->get_comment_date($ar_data['user_id'],$app['loan_id'], $app['loan_type']) ;
					if($result['ar_commentdate']){
					$last_status=$result['ar_status_raw'];
					$last_entry=$result['ar_commentdate'];
					}
					
					// SCO/DR - D??l??gu?? Cr??dit 2
					$dr2_where = array('status' =>"1",'assigned_roles' => "14",'loan_id' => $app['loan_id'],'loan_type' =>$app['loan_type']);

					$dr2_data =  $this->Common_model->getRecord('tbl_all_applications','',$dr2_where );
					
					$user_where= array('id' =>$dr2_data['user_id']);
					$acc_data =  $this->Common_model->getRecord('tbl_user','',$user_where );
                    $result['dr2_id'] = $acc_data['user_name'];
                    $result['dr2_status_raw'] = $result['final_status'];
					if(!empty($dr2_data)){
					    if($result['final_status'] == "Annul??" && $cancelled_by['is_admin'] == "2"){
                           $result['dr2_status'] = '<span class="label label-danger">Annul??</span>'; 
                        }
                        else if($result['final_status'] == "Abandonner"){
                           $result['dr2_status'] = '<span class="label label-danger">Abandonner</span>'; 
                        }
                        else {
                            $result['dr2_status'] = $this->get_label_status($dr2_data['approval_status']);
                        }
					
					}
					else{
						$result['dr2_status'] = "";
					}

					$result['dr2_commentdate'] = $this->get_comment_date($dr2_data['user_id'],$app['loan_id'], $app['loan_type'])  ;
					
					if($result['dr2_commentdate'])
					{
					$last_status=$result['dr2_status_raw'];
					$last_entry=$result['dr2_commentdate'];
					}
												
					// Director engagement details
					$de_where = array('status' =>"1",'assigned_roles' => "5",'loan_id' => $app['loan_id'],'loan_type' =>$app['loan_type']);

					$de_data =  $this->Common_model->getRecord('tbl_all_applications','',$de_where );
                    
                    $user_where= array('id' =>$de_data['user_id']);
					$acc_data =  $this->Common_model->getRecord('tbl_user','',$user_where );
                    $result['dir_engagement_id'] = $acc_data['user_name'];
                    $result['dr22_status_raw'] = $result['final_status'];
					if(!empty($de_data)){
					    if($result['final_status'] == "Annul??" && $cancelled_by['is_admin'] == "2"){
                           $result['dir_engagement_status'] = '<span class="label label-danger">Annul??</span>'; 
                        }
                        else if($result['final_status'] == "Abandonner"){
                            $result['dir_engagement_status'] = '<span class="label label-danger">Abandonner</span>'; 
                        }
                        else {
                            $result['dir_engagement_status'] = $this->get_label_status($de_data['approval_status']);
                        }
					
					}
					else{
						$result['dir_engagement_status'] = "";
					}

					
					$result['dir_engage_commentdate'] = $this->get_comment_date($de_data['user_id'],$app['loan_id'], $app['loan_type'])  ;
					if($result['dir_engage_commentdate']){
					$last_status=$result['dir_engagement_status_raw'];
					$last_entry=$result['dir_engage_commentdate'];
					}

					// Managing Director
					$md_where = array('status' =>"1",'assigned_roles' => "21",'loan_id' => $app['loan_id'],'loan_type' =>$app['loan_type']);

					$md_data =  $this->Common_model->getRecord('tbl_all_applications','',$md_where );
					
					$user_where= array('id' =>$md_data['user_id']);
					$acc_data =  $this->Common_model->getRecord('tbl_user','',$user_where );
                    $result['managing_dir_id'] = $acc_data['user_name'];
                    $result['managing_dir_status_raw'] = $result['final_status'];
					if(!empty($md_data)){
					    if($result['final_status'] == "Annul??" && $cancelled_by['is_admin'] == "2"){
                           $result['managing_dir_status'] = '<span class="label label-danger">Annul??</span>'; 
                        }
                        else if($result['final_status'] == "Abandonner"){
                           $result['managing_dir_status'] = '<span class="label label-danger">Abandonner</span>'; 
                        }
                        else{
                            $result['managing_dir_status'] = $this->get_label_status($md_data['approval_status']);
                        }
					
					}
					else{
						$result['managing_dir_status'] = "";
					}

					$result['managing_dir_commentdate'] = $this->get_comment_date($md_data['user_id'],$app['loan_id'], $app['loan_type']) ;
					if($result['managing_dir_commentdate']){
					$last_status=$result['managing_dir_status_raw'];
					$last_entry=$result['managing_dir_commentdate'];
					}
												
					// Deputy Managing Director
					$dmd_where = array('status' =>"1",'assigned_roles' => "20",'loan_id' => $app['loan_id'],'loan_type' =>$app['loan_type']);

					$dmd_data =  $this->Common_model->getRecord('tbl_all_applications','',$dmd_where );
					
					$user_where= array('id' =>$dmd_data['user_id']);
					$acc_data =  $this->Common_model->getRecord('tbl_user','',$user_where );
                    $result['deputy_manager_id'] = $acc_data['user_name'];
                    $result['deputy_manager_status_raw'] = $result['final_status'];
					if(!empty($dmd_data)){
					    if($result['final_status'] == "Annul??" && $cancelled_by['is_admin'] == "2"){
                           $result['deputy_manager_status'] = '<span class="label label-danger">Annul??</span>'; 
                        }
                        else if($result['final_status'] == "Abandonner"){
                           $result['deputy_manager_status'] = '<span class="label label-danger">Abandonner</span>'; 
                        }
                        else{
                           $result['deputy_manager_status'] = $this->get_label_status($dmd_data['approval_status']); 
                        }
					
					}
					else{
						$result['deputy_manager_status'] = "";
					}

					$result['deputy_manager_commentdate'] = $this->get_comment_date($dmd_data['user_id'],$app['loan_id'], $app['loan_type']) ;
					if($result['deputy_manager_commentdate']){
					$last_status=$result['deputy_manager_status_raw'];
					$last_entry=$result['deputy_manager_commentdate'];
					}
					
					// Ctrl Engag
					$ctrl_where = array('status' =>"1",'assigned_roles' => "27",'loan_id' => $app['loan_id'],'loan_type' =>$app['loan_type']);

					$ctrl_data =  $this->Common_model->getRecord('tbl_all_applications','',$ctrl_where );
					
					$user_where= array('id' =>$ctrl_data['user_id']);
					$acc_data =  $this->Common_model->getRecord('tbl_user','',$user_where );
                    $result['ctrl_id'] = $acc_data['user_name'];
                    $result['ctrl_status_raw'] = $result['final_status'];
					if(!empty($ctrl_data)){
					    if($result['final_status'] == "Annul??" && $cancelled_by['is_admin'] == "2"){
                           $result['ctrl_status'] = '<span class="label label-danger">Annul??</span>'; 
                        }
                        else if($result['final_status'] == "Abandonner"){
                           $result['ctrl_status'] = '<span class="label label-danger">Abandonner</span>'; 
                        }
                        else{
                             $result['ctrl_status'] = $this->get_label_status($ctrl_data['approval_status']);
                        }
					
					}
					else{
						$result['ctrl_status'] = "";
					}

				    $result['ctrl_commentdate'] = $this->get_comment_date($ctrl_data['user_id'],$app['loan_id'], $app['loan_type']) ;
					
				    if($result['ctrl_commentdate']){
					$last_status=$result['ctrl_status_raw'];
					$last_entry=$result['ctrl_commentdate'];
					}
					// Operation Dir Details
					$op_where = array('status' =>"1",'assigned_roles' => "12",'loan_id' => $app['loan_id'],'loan_type' =>$app['loan_type']);

					$op_data =  $this->Common_model->getRecord('tbl_all_applications','',$op_where );
					
					$user_where= array('id' =>$op_data['user_id']);
					$acc_data =  $this->Common_model->getRecord('tbl_user','',$user_where );
                    $result['operation_dir_id'] = $acc_data['user_name'];
                    $result['operation_dir_status_raw'] = $result['final_status'];
                    if($result['final_status'] == "Annul??"){
                       $result['operation_dir_status'] = '<span class="label label-danger">Annul??</span>'; 
                    }
                    else if($result['final_status'] == "Abandonner"){
                       $result['operation_dir_status'] = '<span class="label label-danger">Abandonner</span>'; 
                    }
                    else{
                        $result['operation_dir_status'] = $this->get_label_status($op_data['approval_status']);
                    }
                   
                    $result['op_mgr_commentdate'] =  $this->get_comment_date($op_data['user_id'],$app['loan_id'], $app['loan_type']) ;

                    if($result['op_mgr_commentdate']){
					$last_status=$result['operation_dir_status_raw'];
					$last_entry=$result['op_mgr_commentdate'];
					}
					
					if($last_status=='Abandonner' || $last_status=='Annul??' || $last_status=='Disbursement'){
					    
					    $dteStart = new DateTime($result['created_at']);
                		$dteEnd   = new DateTime($last_entry);
                		$dteDiff  = $dteStart->diff($dteEnd);
                		if($dteDiff->y == 0)
                		{
                		    if($dteDiff->m == 0)
                		    {
            		        	if($dteDiff->d == 0)
                			    {
                    				$date_val =  $dteDiff->format("%H:%I:%S");
                    			}
                    			else{
                    				if($dteDiff->d > 0 )
                    				{
                    				    $date_val =  $dteDiff->d." day(s)";
                    				}
                    			}
                		    }
                		    else
                		    {
                		       $date_val =  $dteDiff->m." month(s)"; 
                		    }
                		
                		}
                		else{
                			$date_val =  $dteDiff->y." year(s)";
                		}
                       $result['status_duration'] = $date_val ;// timeAgo3($result['created_at'],$last_entry) ?: '10 Days'; 
                    }
                    else{
                         $result['status_duration'] = "";
                    }
                            
					$user_app[] =  $result;
				}

				//Cong??s ?? la Carte
			
		}
		
		
		$user_app['record'] = $user_app;
		$user_app['total'] = $this->report_appdata($user_id,$user_data,$start_date,$end_date,$branch,$account_manager);

		return $user_app;
	     
	}
	
		public function report_appdata($user_id,$user_data,$start_date,$end_date,$branch,$account_manager){
		    
		 //   echo $start_date."|".$end_date."|".$branch."|".$account_manager;
	    
    	 $role_id =  $user_data['is_admin'];
	    $this->db->group_by('loan_id,loan_type');
		$this->db->order_by('app_id','desc');
		
		if($account_manager){
		    $this->db->where('user_id',$account_manager);
		}
		else{
		    if($role_id == "2"){
	            $this->db->where('user_id',$user_id);
	        }
		}
	   
	    $applications  =  $this->db->get_where('tbl_all_applications',array('status' => "1"))->result_array();
	     //echo $this->db->last_query(); 
	     
	    $user_app= array();
	     
	     foreach($applications  as $app)
		{
				if($app['loan_type'] == "credit_conso")
				{
					$table_name=  'tbl_credit_conso_applicationloan  as g';
				}
				else if($app['loan_type'] == "credit_confort")
				{
					$table_name= 'tbl_credit_confort_applicationloan  as g';
				}else{
				    $table_name= 'tbl_credit_scolair_applicationloan  as g';
				    $this->db->select('g.department');
				}
			
				$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,g.customer_type,g.cancelled_by,g.final_status,g.final_disburse_date,g.disbursed_by,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg,u.user_name,u.exploitent');
				$this->db->from($table_name);
				$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
				$this->db->join('tbl_user as u','u.id = g.user_id','inner');
				$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','inner');

				if($role_id=='2'){
					$this->db->where('g.user_id',$user_id);
					$this->db->where('g.branch_id',$user_data['branch_id']);
					$this->db->where('g.loan_id',$app['loan_id']);
				}
				if($role_id == '3')
				{
				    $this->db->where('g.branch_id',$user_data['branch_id']);
				    $this->db->where('g.loan_id',$app['loan_id']);
				}
				else
				{
					 $this->db->where('g.loan_id',$app['loan_id']);
				}

				if($start_date != "" && $end_date != "")
				{
					$s_date  = date('Y-m-d',strtotime($start_date))." 00:00:00"; 
					$e_date  = date('Y-m-d',strtotime($end_date))." 23:59:59"; 
					$between_where  =  "(g.created_at BETWEEN '".$s_date."' AND '".$e_date."')";
					$this->db->where($between_where);
				}

				if($branch != "")
				{
					$this->db->where('g.branch_id',$branch);
				}

				if($account_manager !="")
				{
					$this->db->where('g.user_id',$account_manager);
				}
				
				//$this->db->where('g.deleted','0');
    	
				$result =  $this->db->get()->row_array();

				if(!empty($result))
				{
				    //print_r($result);
				    $user_app[] =  $result;
				}
		}
		
		return count($user_app);
	}
	
	
	function fetch_allreport(){
	    
	    $fetch_data = $this->make_datatables();
	    
	     $data = array();
	        
	        $count =1;
           foreach($fetch_data['record'] as $row)  
           {  
                $sub_array = array();  
            	$cust_data =  json_decode($row['customer_data']);
            	$time_ago=$row['created'];
            	
            	$last_entry = "";
            		
                $sub_array = array();  
                $sub_array[] = $count;  
                $sub_array[] = strtoupper($row['loan_type']);  
                $sub_array[] = $row['application_no']; 
                $sub_array[] = $cust_data->account_no; 
                $sub_array[] = $row['branch_name'];  
                $sub_array[] = $row['department'];  
                $sub_array[] = $cust_data->nomGestionnaire;
                $sub_array[] = $row['exploitent'];  
                $sub_array[] = ucwords($row['user_name']); 
                $sub_array[] = $cust_data->bank_name;  
                $sub_array[] = trim(ucwords(strtolower($cust_data->first_name." ".$cust_data->middle_name." ".$cust_data->last_name))); 
                $sub_array[] = $cust_data->email;
                $sub_array[] = $cust_data->main_phone;
                $sub_array[] = $cust_data->dob;  
                $sub_array[] = $cust_data->resides_address;  
                $sub_array[] = $cust_data->account_type;  
                $sub_array[] = date("d-m-Y", strtotime($row['created_at'])).":".timeAgo($time_ago);
                $sub_array[] = $row['loan_amt'];  
                $sub_array[] = $row['loan_interest']."%";  
                $sub_array[] = $row['loan_term']."M";  
                $sub_array[] = $cust_data->dossierkyc;  
                $sub_array[] = $row['acc_mgr_status']."<br>".$row['acc_mgr_id'];
                $sub_array[] = $row['acc_mgr_commentdate']; 
                $sub_array[] = $row['branch_mgr_status']."<br>".$row['branch_mgr_id'];  
                $sub_array[] = $row['branch_mgr_commentdate'];  
                $sub_array[] = $row['ctrl_status']."<br>".$row['ctrl_id'];  
                $sub_array[] = $row['ctrl_commentdate'];
                $sub_array[] = $row['dir_engagement_status']."<br>".$row['dir_engagement_id'];  
                $sub_array[] = $row['dir_engage_commentdate'];  
                $sub_array[] = $row['ar_status']."<br>".$row['ar_id'];  
                $sub_array[] = $row['ar_commentdate'];  
                $sub_array[] = $row['dr2_status']."<br>".$row['dr2_id'];
                $sub_array[] = $row['dr2_commentdate']; 
                $sub_array[] = $row['deputy_manager_status']."<br>".$row['deputy_manager_id'];
                $sub_array[] = $row['deputy_manager_commentdate'];
                $sub_array[] = $row['managing_dir_status']."<br>".$row['managing_dir_id'];  
                $sub_array[] = $row['managing_dir_commentdate'];  
                $sub_array[] = $row['operation_dir_status']."<br>".$row['operation_dir_id'];  
                $sub_array[] = $row['op_mgr_commentdate'];
                $sub_array[] = $row['status_duration'];
                $data[] = $sub_array;  
                
                $count++;
           } 
           
           
           
           $output = array(  
                "draw"            => intval($_POST["draw"]),  
                "recordsTotal"    => $fetch_data['total'],
                "recordsFiltered" => $fetch_data['total'],
                "data"            => $data  
           );  
           echo json_encode($output);  
	}
	
	
	public function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
    } 
	
	public function aggregate_excel(){
	    $result = $this->make_datatables();
	    // Excel file name for download 
	    $fileName = "Aggregate_Report-" . date('Ymd') . ".xls"; 
	    // Column names 
       // print_r($fields);
        
        // Display column names as first row 
        $excelData = implode("\t", array_values($fields)) . "\n"; 
        
        if(!empty($result)){
            
            foreach($result as $row){
                
                $sub_array = array();  
            	$cust_data =  json_decode($row['customer_data']);
            	$time_ago=$row['created'];
                $sub_array[] = strtoupper($row['loan_type']);  
                $sub_array[] = $row['application_no']; 
                $sub_array[] = $cust_data->account_no; 
                $sub_array[] = $row['branch_name'];  
                $sub_array[] = $row['department'];  
                $sub_array[] = $cust_data->nomGestionnaire;
                $sub_array[] = $row['exploitent'];  
                $sub_array[] = ucwords($row['user_name']); 
                $sub_array[] = $cust_data->bank_name;  
                $sub_array[] = trim(ucwords(strtolower($cust_data->first_name." ".$cust_data->middle_name." ".$cust_data->last_name))); 
                $sub_array[] = $cust_data->email;
                $sub_array[] = $cust_data->main_phone;
                $sub_array[] = $cust_data->dob;  
                $sub_array[] = $cust_data->resides_address;  
                $sub_array[] = $cust_data->account_type;  
                $sub_array[] = date("d-m-Y", strtotime($row['created_at'])).":".timeAgo($time_ago);
                $sub_array[] = $row['loan_amt'];  
                $sub_array[] = $row['loan_interest']."%";  
                $sub_array[] = $row['loan_term']."M";  
                $sub_array[] = $cust_data->dossierkyc;  
                $sub_array[] = ""; //$row['acc_mgr_status']."<br>".$row['acc_mgr_id'];
                $sub_array[] = ""; //$row['acc_mgr_commentdate']; 
                $sub_array[] = ""; //$row['branch_mgr_status']."<br>".$row['branch_mgr_id'];  
                $sub_array[] = ""; //$row['branch_mgr_commentdate'];  
                $sub_array[] = ""; //$row['ctrl_status']."<br>".$row['ctrl_id'];  
                $sub_array[] = ""; //$row['ctrl_commentdate'];
                $sub_array[] = ""; //$row['dir_engagement_status']."<br>".$row['dir_engagement_id'];  
                $sub_array[] = ""; //$row['dir_engage_commentdate'];  
                $sub_array[] = ""; //$row['ar_status']."<br>".$row['ar_id'];  
                $sub_array[] = ""; //$row['ar_commentdate'];  
                $sub_array[] = ""; //$row['dr2_status']."<br>".$row['dr2_id'];
                $sub_array[] = ""; //$row['dr2_commentdate']; 
                $sub_array[] = ""; //$row['deputy_manager_status']."<br>".$row['deputy_manager_id'];
                $sub_array[] = ""; //$row['deputy_manager_commentdate'];
                $sub_array[] = ""; //$row['managing_dir_status']."<br>".$row['managing_dir_id'];  
                $sub_array[] = ""; //$row['managing_dir_commentdate'];  
                $sub_array[] =""; // $row['operation_dir_status']."<br>".$row['operation_dir_id'];  
                $sub_array[] = $row['op_mgr_commentdate'];
                $sub_array[] = $row['status_duration'];
                
                array_walk($sub_array, 'filterData'); 
                $excelData .= implode("\t", array_values($sub_array)) . "\n"; 
            }
            
            // header("Content-Disposition: attachment; filename=\"$fileName\""); 
            // header("Content-Type: application/vnd.ms-excel"); 
            
            header("Content-type: application/octet-stream");  
            header("Content-Disposition: attachment; filename=Report.xls");  
            header("Pragma: no-cache");  
            header("Expires: 0");  
  
             
            // Render excel data 
            echo chr(255).chr(254).iconv("UTF-8", "UTF-16LE//IGNORE", $excelData); 

            //echo $excelData; 
             
            exit;
           
           
        }
	}
	
	
	public function export_report()
	{
		$fileName = 'Report-'.time().'.xlsx';  

		 // load excel library
        require_once APPPATH . "/third_party/PHPExcel.php";
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
       
      
        // set Header
        $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'Type De Pr??t');
        $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Num??ro Demande');
        $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Num??ro De Compte');
        $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Groupe Agence');
        $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Agence'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Nom Gestionnaire');
        $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Code Exploitant');
        $objPHPExcel->getActiveSheet()->SetCellValue('H1', 'Exploitant Placeur');
        $objPHPExcel->getActiveSheet()->SetCellValue('I1', 'Client Agence Bancaire');
        $objPHPExcel->getActiveSheet()->SetCellValue('J1', 'Client'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('K1', 'Email Id');
        $objPHPExcel->getActiveSheet()->SetCellValue('L1', 'Numero De Telephone');
        $objPHPExcel->getActiveSheet()->SetCellValue('M1', 'Date De Naissance');
        $objPHPExcel->getActiveSheet()->SetCellValue('N1', 'Adresse');
        $objPHPExcel->getActiveSheet()->SetCellValue('O1', 'Type De Compte'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('P1', 'Date De Demande Pr??t');
        $objPHPExcel->getActiveSheet()->SetCellValue('Q1', 'Montant Du Pr??t');
        $objPHPExcel->getActiveSheet()->SetCellValue('R1', 'Taux Interet');
        $objPHPExcel->getActiveSheet()->SetCellValue('S1', 'Dur??e'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('T1', 'Etat Dossier KYC');
        $objPHPExcel->getActiveSheet()->SetCellValue('U1', 'Expl.Placeur');
        $objPHPExcel->getActiveSheet()->SetCellValue('V1', 'Date Validation Expl.Placeur');
        $objPHPExcel->getActiveSheet()->SetCellValue('W1', 'Dir./Resp. Agence'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('X1', 'Date Validation Dir./Resp. Agence');
        
        $objPHPExcel->getActiveSheet()->SetCellValue('Y1', 'Ctrl Engag');
        $objPHPExcel->getActiveSheet()->SetCellValue('Z1', 'Date Validation Ctrl Engag');
        $objPHPExcel->getActiveSheet()->SetCellValue('AA1', 'ADRCP/DRCP'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AB1', 'Date Validation ADRCP/DRCP');
        $objPHPExcel->getActiveSheet()->SetCellValue('AC1', 'AR delegue Credit 1'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AD1', 'Date Validation AR delegue Credit 1');
        
        $objPHPExcel->getActiveSheet()->SetCellValue('AE1', 'SCO/DR - D??l??gu?? Cr??dit 2');
        $objPHPExcel->getActiveSheet()->SetCellValue('AF1', 'Date Validation SCO/DR - D??l??gu?? Cr??dit 2');
        $objPHPExcel->getActiveSheet()->SetCellValue('AG1', 'Deputy Managing Director'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AH1', 'Date Validation Deputy Managing Director');
        $objPHPExcel->getActiveSheet()->SetCellValue('AI1', 'Managing Director');
        
        $objPHPExcel->getActiveSheet()->SetCellValue('AJ1', 'Date Validation Managing Director');
        $objPHPExcel->getActiveSheet()->SetCellValue('AK1', 'CSR');
        $objPHPExcel->getActiveSheet()->SetCellValue('AL1', 'Date Validation CSR'); 
        $objPHPExcel->getActiveSheet()->SetCellValue('AM1', 'Duree Demande');

        $result = $this->make_datatables();
        $count = 2;
        
        // echo '<pre>';
        // print_r($result);  die;
        
        foreach($result as $row){
            
            
            	$cust_data =  json_decode($row['customer_data']);
            	$time_ago=$row['created'];
                 
            if($row['loan_type']){
                $objPHPExcel->getActiveSheet()->SetCellValue('A'.$count, strtoupper($row['loan_type']));
            $objPHPExcel->getActiveSheet()->SetCellValue('B'.$count, strval($row['application_no']));
            $objPHPExcel->getActiveSheet()->SetCellValue('C'.$count, strval($cust_data->account_no));
            $objPHPExcel->getActiveSheet()->SetCellValue('D'.$count, $row['branch_name']);
            $objPHPExcel->getActiveSheet()->SetCellValue('E'.$count, $row['department']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('F'.$count, $cust_data->nomGestionnaire);
            $objPHPExcel->getActiveSheet()->SetCellValue('G'.$count, $row['exploitent']);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$count, ucwords($row['user_name']));
            $objPHPExcel->getActiveSheet()->SetCellValue('I'.$count, $cust_data->bank_name);
            $objPHPExcel->getActiveSheet()->SetCellValue('J'.$count, trim(ucwords(strtolower($cust_data->first_name." ".$cust_data->middle_name." ".$cust_data->last_name)))); 
            $objPHPExcel->getActiveSheet()->SetCellValue('K'.$count, $cust_data->email);
            $objPHPExcel->getActiveSheet()->SetCellValue('L'.$count, $cust_data->main_phone);
            $objPHPExcel->getActiveSheet()->SetCellValue('M'.$count, $cust_data->dob);
            $objPHPExcel->getActiveSheet()->SetCellValue('N'.$count, $cust_data->resides_address);
            $objPHPExcel->getActiveSheet()->SetCellValue('O'.$count, $cust_data->account_type); 
            $objPHPExcel->getActiveSheet()->SetCellValue('P'.$count, date("d-m-Y", strtotime($row['created_at'])).":".timeAgo($time_ago));
            $objPHPExcel->getActiveSheet()->SetCellValue('Q'.$count, $row['loan_amt']);
            $objPHPExcel->getActiveSheet()->SetCellValue('R'.$count, $row['loan_interest']."%");
            $objPHPExcel->getActiveSheet()->SetCellValue('S'.$count, $row['loan_term']."M"); 
            $objPHPExcel->getActiveSheet()->SetCellValue('T'.$count, $cust_data->dossierkyc);
            $objPHPExcel->getActiveSheet()->SetCellValue('U'.$count, strip_tags($row['acc_mgr_status']).' '.$row['acc_mgr_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('V'.$count, $row['acc_mgr_commentdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('W'.$count, strip_tags($row['branch_mgr_status']).' '.$row['branch_mgr_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('X'.$count, $row['branch_mgr_commentdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$count, strip_tags($row['ctrl_status']).' '.$row['ctrl_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$count, $row['ctrl_commentdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$count, strip_tags($row['dir_engagement_status']).' '.$row['dir_engagement_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('AB'.$count, $row['dir_engage_commentdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AC'.$count, strip_tags($row['ar_status']).' '.$row['ar_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('AD'.$count, $row['ar_commentdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AE'.$count, strip_tags($row['dr2_status']).' '.$row['dr2_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AF'.$count, $row['dr2_commentdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AG'.$count, strip_tags($row['deputy_manager_status']).' '.$row['deputy_manager_id']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('AH'.$count, $row['deputy_manager_commentdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AI'.$count, strip_tags($row['managing_dir_status']).' '.$row['managing_dir_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AJ'.$count, $row['managing_dir_commentdate']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AK'.$count, strip_tags($row['operation_dir_status']).' '.$row['operation_dir_id']);
            $objPHPExcel->getActiveSheet()->SetCellValue('AL'.$count, $row['op_mgr_commentdate']); 
            $objPHPExcel->getActiveSheet()->SetCellValue('AM'.$count, $row['status_duration']); 
            }
           
            
            $count++;
        }
          

        $objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel);
        $objWriter->save($fileName);
        // download file
        header("Content-Type: application/vnd.ms-excel");
        redirect(site_url().$fileName);  
	}
	
	

	


	public function all_report()
	{
		$role_id =  $this->session->userdata('role');

		$this->data['page'] = 'All Report';
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;

	
		$this->data['all_branch'] =  $this->Common_model->getAllRecords('tbl_branch');

		$u_where  =  array('is_admin' => '2');
		$this->data['all_account_managers'] =  $this->Common_model->getAllRecords('tbl_user',$u_where);

// 		echo '<pre>';
// 		print_r($this->data); die;
		
		$this->render_template2('reports/all_report', $this->data);
	}
	
	
	
	public function get_label_status($status){
	    
	    $label = ''; 
	    switch ($status) {
          case "Avis Favorable":
            $label = '<span class="label label-info">Avis Favorable</span>';
            break;
          case "Process":
            $label = '<span class="label label-primary">Traitement en Cours</span>';
            break;
          case "Avis d??favorable":
           $label = '<span class="label label-danger">Avis D??favorable</span>';
            break;
          case "Demande de retraitement":
            $label = '<span class="label label-danger">Demande de Retraitement</span>';  
            break;
          case "Disbursement":
              $label = '<span class="label label-success">Mise a Disposition</span>';  
            break; 
          default:
            $label = '<span class="label label-primary">Initiation en Cours</span>';  
            
        }
        
        return $label;
	    
	}
	

	
	public function get_comment_date($user_id,$loan_id,$loan_type){
	    $this->db->order_by('comment_id','desc');
		$commentdata = $this->db->get_where('tbl_decision_comment',array('loan_id' => $loan_id ,'user_id' => $user_id,'loan_type' =>$loan_type ))->row_array();

		if($commentdata['comment_date'])
	       $date = date("d-m-Y H:i:s",strtotime($commentdata['comment_date'])) ;
		else
		   $date = "" ;
		   
		 return $date;
	}


	// New update : 10 feb 2021
	public function tokos_report(){

		$this->data['page'] = 'Tokos Report';
		$role_id =  $this->session->userdata('role');
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$user_data =  $this->Common_model->get_user_details($user_id);
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;

		// Filter post
		$date= date('d-m-Y');
		$date2= date('d-m-Y', strtotime('-1 day', strtotime($date)));
		$start_date  =  ($this->input->post('start_date')) ? ($this->input->post('start_date')): ($date2);
		$end_date = ($this->input->post('end_date')) ? ($this->input->post('end_date')): ($date);

		// All applications

		$this->db->order_by('app_id','desc');
		$this->db->group_by('loan_id,loan_type');
		$applications  =  $this->db->get_where('tbl_all_applications',array('status' => "1"))->result_array();

		$user_app= array();

		foreach($applications  as $app)
		{
			if($app['loan_type'] == "credit_conso")
			{
				$table_name=  'tbl_credit_conso_applicationloan  as g';
			}
			else if($app['loan_type'] == "credit_confort")
			{
				$table_name= 'tbl_credit_confort_applicationloan  as g';
			}else{
			    $table_name= 'tbl_credit_scolair_applicationloan  as g';
			}
		
			$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,u.department,g.customer_type,g.final_status,g.final_disburse_date,g.disbursed_by,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,u.user_name,u.exploitent,at.*');
			$this->db->from($table_name);
			
		    
		    $this->db->join('consumer_amortization as at','at.applicationform_id = g.loan_id_temp','left');
			$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
			$this->db->join('tbl_user as u','u.id = g.user_id','left');
			$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','left');

			if($role_id=='2'){
				$this->db->where('g.user_id',$user_id);
				$this->db->where('g.branch_id',$user_data['branch_id']);
				$this->db->where('g.loan_id',$app['loan_id']);
			}
			if($role_id == '3')
			{
			    $this->db->where('g.branch_id',$user_data['branch_id']);
			    $this->db->where('g.loan_id',$app['loan_id']);
			}
			else
			{
				 $this->db->where('g.loan_id',$app['loan_id']);
			}

			$this->db->where('g.final_status',"Disbursement");

			

			if($start_date != "" && $end_date != "")
			{
				$s_date  = date('Y-m-d',strtotime($start_date))." 00:00:00"; 
				$e_date  = date('Y-m-d',strtotime($end_date))." 23:59:59"; 
				$between_where  =  "(g.final_disburse_date BETWEEN '".$s_date."' AND '".$e_date."')";
				$this->db->where($between_where);
			}

			// if($branch != "")
			// {
			// 	$this->db->where('g.branch_id',$branch);
			// }

			// if($account_manager !="")
			// {
			// 	$this->db->where('g.user_id',$account_manager);
			// }
			
			//$this->db->where('g.deleted','0');
	
			$result =  $this->db->get()->row_array();

			
			

			if(!empty($result))
			{
				$result['loan_type']= $app['loan_type'];
				$user_app[]= $result;
			}
				
		}

		$this->data['loan_details'] = $user_app;


		$this->render_template2('reports/tokos_report', $this->data);
	}






}