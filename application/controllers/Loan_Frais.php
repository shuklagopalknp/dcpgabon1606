<?php
class Loan_Frais extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		//$this->data['title'] = 'pploan';	
		$this->data['page'] = 'Loan_Frais';	
		$this->load->library('session');		
    	$this->load->model('Common_model');
    	$this->load->model('PP_Consumer_Loans_Model');
    	$this->load->library('Class_Amort');
    	$this->load->helper('lang_translate');
		$this->load->helper('timeAgo');
		$this->load->helper(array('dompdf', 'file'));
		//date_default_timezone_set('Asia/Kolkata');
		date_default_timezone_set('GMT');
		$this->load->helper('url');
	}
	
	public function manage_loan_fees(){
			//print_r($_POST);

			$customer_id =  $this->input->post('ecustomar_id');
			$data =  array(
					'frais_de_dossier'=>$this->input->post('frais_de_doss'),
					'field_4'=>$this->input->post('frais_de_assurance')		
			);

			// $this->PP_Consumer_Loans_Model->updateRow("tbl_customar_other_information","customar_id",$customer_id,$data);
			// exit;

			
			if($this->PP_Consumer_Loans_Model->updateRow("tbl_customar_other_information","customar_id",$customer_id,$data))
			{
				echo '1';
			}
			else
			{
				echo '2';
			}
		
	}

	
	 
}