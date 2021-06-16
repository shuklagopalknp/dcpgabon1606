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
		$this->data['title'] = 'DCP | Business Custmer';	
		$this->data['page'] = 'Business_Customer';	
		$this->load->library('session');
		$this->load->helper('lang_translate');		
    	$this->load->model('Common_model');
    	$this->load->model('Secteur_Model');
    	$this->load->model('Business_Customer_Model');

	}

	public function index(){

		$user_role = $this->session->userdata('role');
		$user_id = $this->session->userdata('id');

		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['secteurs'] = $this->Secteur_Model->get_all_secteurs();
		$this->data['business_customer'] =  $this->Business_Customer_Model->get_all_bussiness_customers();
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
			$this->render_template('customer/business_customer',$this->data);
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

		$res = json_encode($customer_data);
		$res1 =  json_encode($officer_data);

		echo $res."$".$res1;
		
	}
	
	public function delete_customer()
	{
		$customer_id =  $this->input->post('id');
		$where  =  array('deleted' => '1');

		echo $this->Common_model->updateRow('tbl_business_customer','customer_id',$customer_id,$where);	

	}
}