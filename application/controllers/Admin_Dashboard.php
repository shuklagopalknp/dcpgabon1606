<?php defined('BASEPATH') OR exit('No direct script access aloowed'); 

class Admin_Dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'Dashboard';	
		$this->data['page'] = 'Dashboard';	
		$this->load->library('session');
		$this->load->helper('lang_translate');		
    //	$this->lang->load('date_lang', 'spanish');
    	$this->load->model('Common_model');

    	if($this->session->userdata('role') != "1")
    	{
    		redirect('Auth/logout');
    	}
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index(){	
	$this->data['record']=$this->Common_model->get_admin_details(1);

		// Count branches 
		$b_where  =  array('deleted' => '0');
		$this->data['branches'] =  $this->Common_model->getRecord('tbl_branch',' count(bid) as count',$b_where);

		// Count Customers
		$c_where  = array('deleted' => '0'); 
		$individual_customer =  $this->Common_model->getRecord('tbl_customer_entries',' count(customer_id) as count',$c_where);

		// $bc_where = array('deleted' => '0'); 
		// $business_customer =  $this->Common_model->getRecord('tbl_business_customer',' count(customer_id) as count',$bc_where);

		$this->data['customers'] = $individual_customer['count'];

		// Count Users
		$u_where  = array('deleted' => '0');
		$this->data['users'] = $this->Common_model->getRecord('tbl_user',' count(id) as count',$u_where);


		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/dashboard', $this->data);
	}
	
	public function settings(){
		$this->data['title'] = 'Settings';

		$this->data['email_templates'] =  $this->Common_model->getAllRecords('tbl_email_template');
		$this->data['sms_templates'] =  $this->Common_model->getAllRecords('tbl_sms_template');
		$this->data['smtp_data'] =  $this->Common_model->getRecord('tbl_smtp_connection','');
		// print_r($this->data);
		// die;
		$this->render_template('admin/settings', $this->data);
	}

	public function edit_templates(){

		$template_id =  $this->input->post('id');

		$where  =  array('template_id' => $template_id);
		$result  =  $this->Common_model->getRecord('tbl_email_template','',$where);

		echo json_encode($result);
		
	}

	public function edit_smstemplates(){

		$template_id =  $this->input->post('id');

		$where  =  array('template_id' => $template_id);
		$result  =  $this->Common_model->getRecord('tbl_sms_template','',$where);

		echo json_encode($result);
		
	}

	public function save_email_template(){
		$post_data =  array(
							'template_subject' => $this->input->post('subject'),
							'template_body' => $this->input->post('description')
		);

		//print_r($post_data);

	    $template_id =  $this->input->post('template_id');

		echo ($this->Common_model->updateRow('tbl_email_template','template_id',$template_id,$post_data)) ? "success" :  "error";
		
	}

	public function save_sms_template(){
		$post_data =  array(
							
							'template_body' => $this->input->post('sms_message')
		);

	    $template_id =  $this->input->post('template_id');

		echo ($this->Common_model->updateRow('tbl_sms_template','template_id',$template_id,$post_data)) ? 'success' : 'error';
		
	}

	public function change_template_status(){

		$post_data  =  array(
				'template_id' => $this->input->post('id'),
				'template_status' => $this->input->post('status'),
		);	

		$template_type =  $this->input->post('template_type');

		if($template_type == "email")
		{
			$table_name =  'tbl_email_template';

		}
		else
		{
			$table_name =  'tbl_sms_template';
		}
		
		echo ($this->Common_model->updateRow($table_name,'template_id',$post_data['template_id'],$post_data)) ? "success" : "error";
		
	}

	public function save_smtp_connection(){

		$post_data =  array(
							'host' => $this->input->post('host'),
							'username' => $this->input->post('username'),
							'password' => $this->input->post('password'),
							'port' => $this->input->post('port')
		);

		$id=  $this->input->post('smtp_id');

		$check_data  = $this->Common_model->getRecord('tbl_smtp_connection'); 
		print_r($check_data);

		if(!empty($check_data))
		{
			echo ($this->Common_model->updateRow('tbl_smtp_connection','id',$id,$post_data)) ? "success" : "error";
		}
		else
		{
			echo ($this->Common_model->insertRow('tbl_smtp_connection',$post_data)) ? "success" : "error";
		}
		//print_r($check_data);
	}

	public function update_password(){
		$old_password  =  $this->input->post('old_password');

		$where  =  array('is_admin' => '1');
		$check_oldpassword =  $this->Common_model->getRecord('tbl_user','',$where);

		$hash_password = password_verify($old_password, $check_oldpassword['password']);

		if($hash_password)
		{
			$record['password'] = password_hash($this->input->post('new_password'), PASSWORD_DEFAULT);

			echo ($this->Common_model->updateRow('tbl_user','id',$check_oldpassword['id'],$record)) ? "success" : "error";
		}
		else{
			echo "oldpassword_notmatched";
		}
	}
}