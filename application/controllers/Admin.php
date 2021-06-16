<?php 

class Admin extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'admin';	
		$this->data['page'] = 'admin';	
		$this->load->library('session');
		$this->load->helper('lang_translate');		
    	//$this->lang->load('date_lang', 'spanish');
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
	

	public function profile(){	
		$this->data['record']=$this->Common_model->get_admin_details(1);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/profile', $this->data);
	}
	public function settings(){	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/settings', $this->data);
	}


}