<?php 

class Sous_Secteurs extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Sous_Secteurs';	
		$this->data['page'] = 'Sous_Secteurs';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Secteur_Model');
    	$this->load->model('Sous_Secteurs_Model');

    	   	
	}

	
	public function index(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['secteurs'] =  $this->Secteur_Model->get_all_secteurs();
		$this->data['sous_secteurs'] =  $this->Sous_Secteurs_Model->get_all_sous_secteurs();
		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/sous_secteur', $this->data);
	}

	
	public function save_sous_secteur()
	{
		$data =  array(
					'secteurs'=>trim($this->input->post('sous_secteur')),
					'parent_secteurid' => trim($this->input->post('secteur')),
					'sous_secteur_description'=>trim($this->input->post('description'))
				);

		// print_r($data);
		// die;

		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->Sous_Secteurs_Model->check_sous_secteur($data,"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_sous_secteurs',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->Sous_Secteurs_Model->check_sous_secteur($data,$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_sous_secteurs','sid',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}


	public function edit_sous_secteur()
	{
		echo $response  =  $this->Sous_Secteurs_Model->get_sous_secteur_details($this->input->post('sous_id'));
	}

	public function delete_sous_secteur()
	{
		$sous_id  = $this->input->post('id');

		$this->Sous_Secteurs_Model->delete_sous_secteur($sous_id);
	}
}