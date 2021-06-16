<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Error extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'admin';	
		$this->data['page'] = 'E';	
		
	}	
	public function index()
	{	
		$this->output->set_status_header('404'); 
       		$this->load->view('error-404');    
	}
}
	
