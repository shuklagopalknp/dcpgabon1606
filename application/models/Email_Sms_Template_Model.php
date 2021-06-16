<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Email_Sms_Template_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');
	}


	//Email when  New Customer Added

	public function send_mail_to_customer_template1($tbl_cus_field)
	{
		$status_where =  array('template_id' => '1','template_status' => "active");
				$check_template =  $this->Common_model->getRecord('tbl_email_template','',$status_where);

		if(!empty($check_template))
		{
			$tcustomer_name =  "{customer_name}";
			$temail =  "{email}";
			$tagence =  "{agence}";
			$taccount_no =  "{numero_de_compte}";

			
			if (stripos($check_template['template_body'], $tcustomer_name) !== false) {
			   $str  = str_replace($tcustomer_name,$tbl_cus_field['first_name'].' '.$tbl_cus_field['last_name'],$check_template['template_body']);
			} else {
			   $str  = str_replace($tcustomer_name,'',$check_template['template_body']);
			}

			if (stripos($check_template['template_body'], $temail) !== false) {
			   $str  = str_replace($temail,$tbl_cus_field['email'],$str);
			} 

			if (stripos($check_template['template_body'], $tagence) !== false) {
				$bwhere =  array('bid' => $tbl_cus_field['branch_id']);
				$branch_details =  $this->Common_model->getRecord('tbl_branch','',$bwhere);

			   $str  = str_replace($tagence,$branch_details['branch_name'],$str);
			}

			if (stripos($check_template['template_body'], $taccount_no) !== false) {
			   $str = str_replace($taccount_no,$tbl_cus_field['account_no'],$str);
			}

			// Send mail function
			$this->Common_model->send_mail_to_users($tbl_cus_field['email'],$check_template['template_subject'], $str);
		}
	}

	//SMS when  New Customer Added

	public function send_sms_to_customer_template1($tbl_cus_field)
	{
		$status_where =  array('template_id' => '1','template_status' => "active");
				$check_template =  $this->Common_model->getRecord('tbl_sms_template','',$status_where);

		if(!empty($check_template))
		{
			$tcustomer_name =  "{customer_name}";
			$temail =  "{email}";
			$tagence =  "{agence}";
			$taccount_no =  "{numero_de_compte}";

			
			if (stripos($check_template['template_body'], $tcustomer_name) !== false) {
			   $str  = str_replace($tcustomer_name,$tbl_cus_field['first_name'].' '.$tbl_cus_field['last_name'],$check_template['template_body']);
			} else {
			   $str  = str_replace($tcustomer_name,'',$check_template['template_body']);
			}

			if (stripos($check_template['template_body'], $temail) !== false) {
			   $str  = str_replace($temail,$tbl_cus_field['email'],$str);
			} 

			if (stripos($check_template['template_body'], $tagence) !== false) {
				$bwhere =  array('bid' => $tbl_cus_field['branch_id']);
				$branch_details =  $this->Common_model->getRecord('tbl_branch','',$bwhere);

			   $str  = str_replace($tagence,$branch_details['branch_name'],$str);
			}

			if (stripos($check_template['template_body'], $taccount_no) !== false) {
			   $str = str_replace($taccount_no,$tbl_cus_field['account_no'],$str);
			}

			// Send sms
			$str = strip_tags($str);
			$this->Common_model->send_sms_to_users($tbl_cus_field['main_phone'], $str);
		}
	}

	
	//Email when New Loan Application is created

	public function send_mail_template2($customer_data,$customer_type,$application_no,$loan_type){
		$status_where =  array('template_id' => '2','template_status' => "active");
		$check_template =  $this->Common_model->getRecord('tbl_email_template','',$status_where);
		
	//	print_r($check_template);


		if(!empty($check_template))
		{
			$tcustomer_name =  "{customer_name}";
			$temail =  "{email}";
			$tagence =  "{agence}";
			$taccount_no =  "{numero_de_compte}";
			$ttype = "{loan_type}";
			$tapplication_no =  "{application_no}";
			$tdate = "{date}";

			//print_r($customer_data);
			
			if (stripos($check_template['template_body'], $tcustomer_name) !== false) {

				
				if($customer_type == "1")
				{
					$str  = str_replace($tcustomer_name,$customer_data[0]['first_name'].' '.$customer_data[0]['last_name'],$check_template['template_body']);
				}
				else {
					
					$str  = str_replace($tcustomer_name,$customer_data[0]['company_name'],$check_template['template_body']);
				}	
			  
			} else {
			   $str  = str_replace($tcustomer_name,'',$check_template['template_body']);
			}

			if (stripos($check_template['template_body'], $ttype) !== false) {

			    $str  = str_replace($ttype,$loan_type,$str);	
			  
			} else {
			   $str  = str_replace($ttype,'',$check_template['template_body']);
			}

			if (stripos($check_template['template_body'], $tdate) !== false) {

			   $str  = str_replace($tdate,DATETIME,$str);	
			  
			}

			if (stripos($check_template['template_body'], $tagence) !== false) {

				if($customer_type == "1")
				{
					$bwhere =  array('bid' => $customer_data[0]['branch_id']);
				}
				else
				{
					$bwhere =  array('bid' => $customer_data[0]['branch']);
				}
				
				$branch_details =  $this->Common_model->getRecord('tbl_branch','',$bwhere);

			   $str  = str_replace($tagence,$branch_details['branch_name'],$str);
			}

			if (stripos($check_template['template_body'], $tapplication_no) !== false) {

			   $str  = str_replace($tapplication_no,$application_no,$str);	
			  
			}

			

			if (stripos($check_template['template_body'], $taccount_no) !== false) {
			   $str = str_replace($taccount_no,$customer_data[0]['account_no'],$str);
			}

			if (stripos($check_template['template_body'], $temail) !== false) {
				if($customer_type == "1")
				{
					$str  = str_replace($temail,$customer_data[0]['email'],$str);

				
				}
				// else
				// {
				// 	$str  = str_replace($temail,$customer_data[0]['business_emailid'],$str);
				// 	$email =  $customer_data[0]['business_emailid'];
				// }


			   
			} 
			
			$email =  $customer_data[0]['email'];


		//	echo $str;

			// Send mail function
			if($email)
			{
			  $this->Common_model->send_mail_to_users($email,$check_template['template_subject'], $str);
			}
			
		}
	}


	public function send_sms_template2($customer_data,$customer_type,$application_no,$loan_type){
		$status_where =  array('template_id' => '2','template_status' => "active");
					$check_template =  $this->Common_model->getRecord('tbl_sms_template','',$status_where);

			//print_r($check_template);

			if(!empty($check_template))
			{
				$tcustomer_name =  "{customer_name}";
				$temail =  "{email}";
				$tagence =  "{agence}";
				$taccount_no =  "{numero_de_compte}";
				$ttype = "{loan_type}";
				$tapplication_no =  "{application_no}";
				$tdate = "{date}";

				//print_r($customer_data);
				
				if (stripos($check_template['template_body'], $tcustomer_name) !== false) {

					
					if($customer_type == "1")
					{
						$str  = str_replace($tcustomer_name,$customer_data[0]['first_name'].' '.$customer_data[0]['last_name'],$check_template['template_body']);
					}
					else {
						
						$str  = str_replace($tcustomer_name,$customer_data[0]['company_name'],$check_template['template_body']);
					}	
				  
				} else {
				   $str  = str_replace($tcustomer_name,'',$check_template['template_body']);
				}

				if (stripos($check_template['template_body'], $ttype) !== false) {

				    $str  = str_replace($ttype,$loan_type,$str);	
				  
				} else {
				   $str  = str_replace($ttype,'',$check_template['template_body']);
				}

				if (stripos($check_template['template_body'], $tdate) !== false) {

				   $str  = str_replace($tdate,DATETIME,$str);	
				  
				}

				if (stripos($check_template['template_body'], $tagence) !== false) {

					if($customer_type == "1")
					{
						$bwhere =  array('bid' => $customer_data[0]['branch_id']);
					}
					else
					{
						$bwhere =  array('bid' => $customer_data[0]['branch']);
					}
					
					$branch_details =  $this->Common_model->getRecord('tbl_branch','',$bwhere);

				   $str  = str_replace($tagence,$branch_details['branch_name'],$str);
				}

				if (stripos($check_template['template_body'], $tapplication_no) !== false) {

				   $str  = str_replace($tapplication_no,$application_no,$str);	
				  
				}

				

				if (stripos($check_template['template_body'], $taccount_no) !== false) {
				   $str = str_replace($taccount_no,$customer_data[0]['account_no'],$str);
				}

				if (stripos($check_template['template_body'], $temail) !== false) {
					if($customer_type == "1")
					{
						$str  = str_replace($temail,$customer_data[0]['email'],$str);

						$email =  $customer_data[0]['email'];
					}
					else
					{
						$str  = str_replace($temail,$customer_data[0]['business_emailid'],$str);
						$email =  $customer_data[0]['business_emailid'];
					}


				   
				} 

				// Send sms function

				$str = strip_tags($str);
				
				$this->Common_model->send_sms_to_users($customer_data[0]['main_phone'],$str);
				
		}

	}


	public function send_mail_template3($customer_data,$customer_type,$application_no,$type)
	{
		$status_where =  array('template_id' => '3','template_status' => "active");
		$check_template =  $this->Common_model->getRecord('tbl_email_template','',$status_where);


		if(!empty($check_template))
		{
			$tcustomer_name =  "{customer_name}";
			$temail =  "{email}";
			$tagence =  "{agence}";
			$taccount_no =  "{numero_de_compte}";
			$ttype = "{loan_type}";
			$tapplication_no =  "{application_no}";
			$tdate = "{date}";

			// echo '<pre>';
			// print_r($customer_data);
			
			if (stripos($check_template['template_body'], $tcustomer_name) !== false) {

				
				if($customer_type == "1")
				{
					$str  = str_replace($tcustomer_name,$customer_data->first_name.' '.$customer_data->last_name,$check_template['template_body']);
				}
				else {
					
					$str  = str_replace($tcustomer_name,$customer_data->company_name,$check_template['template_body']);
				}	
			  
			} else {
			   $str  = str_replace($tcustomer_name,'',$check_template['template_body']);
			}

			if (stripos($check_template['template_body'], $ttype) !== false) {

				if($type ==  "credit_conso")
				{
					$loantype =  "FETES A LA CARTE";

				}
				else if($type == "credit_scolair")
				{
					$loantype =  "CONGES A LA CARTE";
				}
				else if($type == "credit_confort")
				{
					$loantype = "CREDIT CONFORT";
				}	

			    $str  = str_replace($ttype,$loantype,$str);	
			  
			} else {
			   $str  = str_replace($ttype,'',$check_template['template_body']);
			}

			if (stripos($check_template['template_body'], $tdate) !== false) {

			   $str  = str_replace($tdate,DATETIME,$str);	
			  
			}

			if (stripos($check_template['template_body'], $tagence) !== false) {

				if($customer_type == "1")
				{
					$bwhere =  array('bid' => $customer_data->branch_id);
				}
				else
				{
					$bwhere =  array('bid' => $customer_data->branch);
				}
				
				$branch_details =  $this->Common_model->getRecord('tbl_branch','',$bwhere);

			   $str  = str_replace($tagence,$branch_details['branch_name'],$str);
			}

			if (stripos($check_template['template_body'], $tapplication_no) !== false) {

			   $str  = str_replace($tapplication_no,$application_no,$str);	
			  
			}

			

			if (stripos($check_template['template_body'], $taccount_no) !== false) {
			   $str = str_replace($taccount_no,$customer_data->account_no,$str);
			}

			if($customer_type == "1")
			{
				$email =  $customer_data->email;
			}
			else
			{
				$email =  $customer_data->business_emailid;
			}

			// Send mail function
			if($email)
			{
			  $this->Common_model->send_mail_to_users($email,$check_template['template_subject'], $str);
			}
			
		}
	}


	public function send_sms_template3($customer_data,$customer_type,$application_no,$type){
		$status_where =  array('template_id' => '3','template_status' => "active");
		$check_template =  $this->Common_model->getRecord('tbl_sms_template','',$status_where);

		if(!empty($check_template))
		{
			$tcustomer_name =  "{customer_name}";
			$temail =  "{email}";
			$tagence =  "{agence}";
			$taccount_no =  "{numero_de_compte}";
			$ttype = "{loan_type}";
			$tapplication_no =  "{application_no}";
			$tdate = "{date}";

			//print_r($customer_data);
			
			if (stripos($check_template['template_body'], $tcustomer_name) !== false) {

				
				if($customer_type == "1")
				{
					$str  = str_replace($tcustomer_name,$customer_data->first_name.' '.$customer_data->last_name,$check_template['template_body']);
				}
				else {
					
					$str  = str_replace($tcustomer_name,$customer_data->company_name,$check_template['template_body']);
				}	
			  
			} else {
			   $str  = str_replace($tcustomer_name,'',$check_template['template_body']);
			}

			if (stripos($check_template['template_body'], $ttype) !== false) {

				if($type ==  "credit_conso")
				{
					$loantype =  "FETES A LA CARTE";
				}
				else if($type == "credit_scolair")
				{
					$loantype =  "CONGES A LA CARTE";
				}
				else if($type == "credit_confort")
				{
					$loantype = "CREDIT CONFORT";
				}		

			    $str  = str_replace($ttype,$loantype,$str);	
			  
			} else {
			   $str  = str_replace($ttype,'',$check_template['template_body']);
			}

			if (stripos($check_template['template_body'], $tdate) !== false) {

			   $str  = str_replace($tdate,DATETIME,$str);	
			  
			}

			if (stripos($check_template['template_body'], $tagence) !== false) {

				if($customer_type == "1")
				{
					$bwhere =  array('bid' => $customer_data->branch_id);
				}
				else
				{
					$bwhere =  array('bid' => $customer_data->branch);
				}
				
				$branch_details =  $this->Common_model->getRecord('tbl_branch','',$bwhere);

			   $str  = str_replace($tagence,$branch_details['branch_name'],$str);
			}

			if (stripos($check_template['template_body'], $tapplication_no) !== false) {

			   $str  = str_replace($tapplication_no,$application_no,$str);	
			  
			}

			

			if (stripos($check_template['template_body'], $taccount_no) !== false) {
			   $str = str_replace($taccount_no,$customer_data->account_no,$str);
			}


			// Send sms function
			$str = strip_tags($str);
			$this->Common_model->send_sms_to_users($customer_data->main_phone,$str);
			
		}
	}

    public function send_mail_template4($notification_data,$customer_data,$loan_data,$type)
	{
		$status_where =  array('template_id' => '4','template_status' => "active");
		$check_template =  $this->Common_model->getRecord('tbl_email_template','',$status_where);

        $sender_data = $this->db->get_where('tbl_user',array('id' => $notification_data['sender_id']))->row_array();
        $receiver_data = $this->db->get_where('tbl_user',array('id'=> $notification_data['receiver_id']))->row_array();
        $role_data = $this->db->get_where('tbl_role',array('id' => $notification_data['receiver_roleid']))->row_array();

		if(!empty($check_template))
		{
		    $to_user_name = "{to_user_name}";
		    $from_user_name = "{from_username}";
		    $role_name = "{role_name}";
		    $decision = "{decision}";
			$tcustomer_name =  "{customer_name}";
			$temail =  "{email}";
			$tagence =  "{agence}";
			$taccount_no =  "{numero_de_compte}";
			$ttype = "{loan_type}";
			$tapplication_no =  "{application_no}";
			$tdate = "{date}";

			
			if (stripos($check_template['template_body'],$to_user_name) !== false) {
			    $str  = str_replace($to_user_name,$receiver_data['first_name']." ".$receiver_data['last_name'],$check_template['template_body']);
		    } else {
		       $str  = str_replace($to_user_name,'',$check_template['template_body']);
			}
			
			
			if (stripos($check_template['template_body'],$from_user_name) !== false) {
               $str  = str_replace($from_user_name,$sender_data['first_name']." ".$sender_data['last_name'],$str);
		    } else {
			   $str  = str_replace($from_user_name,'',$str);
			}
			
			if (stripos($check_template['template_body'],$role_name) !== false) {
               $str  = str_replace($role_name,$role_data['name'],$str);
		    } else {
			   $str  = str_replace($role_name,'',$str);
			}
			
			if (stripos($check_template['template_body'],$decision) !== false) {
               $str  = str_replace($decision,$notification_data['message'],$str);
		    } else {
			   $str  = str_replace($decision,'',$str);
			}
			
			if (stripos($check_template['template_body'], $tcustomer_name) !== false) {

				if($loan_data['customer_type'] == "1")
				{
					$str  = str_replace($tcustomer_name,$customer_data->first_name.' '.$customer_data->last_name,$str);
				}
				else {
					$str  = str_replace($tcustomer_name,$customer_data->company_name,$str);
				}	
			  
			} else {
			   $str  = str_replace($tcustomer_name,'',$check_template['template_body']);
			}

			if (stripos($check_template['template_body'], $ttype) !== false) {

				if($type ==  "credit_conso")
				{
					$loantype =  "FETES A LA CARTE";

				}
				else if($type == "credit_scolair")
				{
					$loantype =  "CONGES A LA CARTE";
				}
				else if($type == "credit_confort")
				{
					$loantype = "CREDIT CONFORT";
				}	

			    $str  = str_replace($ttype,$loantype,$str);	
			  
			} else {
			   $str  = str_replace($ttype,'',$str);
			}

			if (stripos($check_template['template_body'], $tdate) !== false) {

			   $str  = str_replace($tdate,DATETIME,$str);	
			  
			}
			else{
			    $str  = str_replace($tdate,'',$str);	
			}

			if (stripos($check_template['template_body'], $tagence) !== false) {

				// if($loan_data['customer_type'] == "1")
				// {
				// 	$bwhere =  array('bid' => $customer_data->branch_id);
				// }
				// else
				// {
				// 	$bwhere =  array('bid' => $customer_data->branch);
				// }
				
				$bwhere = array('bid' => $loan_data['branch_id']);
				
				$branch_details =  $this->Common_model->getRecord('tbl_branch','',$bwhere);

			   $str  = str_replace($tagence,$branch_details['branch_name'],$str);
			}

			if (stripos($check_template['template_body'], $tapplication_no) !== false) {

			   $str  = str_replace($tapplication_no,$loan_data['application_no'],$str);	
			  
			}

			

			if (stripos($check_template['template_body'], $taccount_no) !== false) {
			   $str = str_replace($taccount_no,$customer_data->account_no,$str);
			}

// 			if($customer_type == "1")
// 			{
// 				$email =  $customer_data->email;
// 			}
// 			else
// 			{
// 				$email =  $customer_data->business_emailid;
// 			}
			
		//	echo $str;

			// Send mail function
			if($receiver_data['u_email'])
			{
			  $this->Common_model->send_mail_to_users($receiver_data['u_email'],$check_template['template_subject'], $str);
			}
			
		}
	}
	
}