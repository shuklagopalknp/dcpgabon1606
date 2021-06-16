<?php 

class Secteurs extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Secteurs';	
		$this->data['page'] = 'Secteurs';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Secteur_Model');
    	   	
	}

	
	public function index(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['secteurs'] =  $this->Secteur_Model->get_all_secteurs();
		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/secteur', $this->data);
	}

	
	public function save_secteur()
	{
		$data =  array(
					'secteurs'=>trim($this->input->post('secteur')),
					'secteur_description'=>trim($this->input->post('description'))
				);

		// print_r($data);
		// die;

		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->Secteur_Model->check_secteur($data['secteurs'],"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_target_list_companies',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->Secteur_Model->check_secteur($data['secteurs'],$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_target_list_companies','tlc_id',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}


	public function edit_secteur()
	{
		echo $response  =  $this->Secteur_Model->get_secteur_details($this->input->post('secteur_id'));
	}

	public function delete_secteur()
	{
		$sec_id  = $this->input->post('id');

		 $this->Secteur_Model->delete_secteur($sec_id);
	}
}