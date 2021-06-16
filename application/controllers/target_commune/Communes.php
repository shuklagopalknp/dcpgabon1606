<?php 

class Communes extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Communes';	
		$this->data['page'] = 'Communes';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Region_Model');   
    	$this->load->model('Chef_Lieu_Department_Model');
    	$this->load->model('Commune_Model');    	
	}

	
	public function index(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['regions'] = $this->Region_Model->get_all_regions();
		$this->data['communes'] =  $this->Commune_Model->get_all_communes();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/commune', $this->data);
	}

	public function get_department_by_region()
	{
		$region_id = $this->input->post('region_id');

		echo $response =  $this->Chef_Lieu_Department_Model->get_department_by_region($region_id);
	}

	public function save_commune()
	{
		$data =  array(
					'region_id'=>trim($this->input->post('region')),
					'department_id'=>trim($this->input->post('department')),
					'commune_name'=>trim($this->input->post('commune')),
					'commune_description'=>trim($this->input->post('description'))
				);

		// print_r($data);
		// die;

		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->Commune_Model->check_commune($data,"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_target_commune',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->Commune_Model->check_commune($data,$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_target_commune','commune_id',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}


	public function edit_commune()
	{
		echo $response  =  $this->Commune_Model->get_commune_details($this->input->post('commune_id'));
	}

	public function delete_commune()
	{
		$where = array('commune_id' => $this->input->post('id') );

		echo $this->Common_model->delete_data('tbl_target_commune',$where);
	}
}