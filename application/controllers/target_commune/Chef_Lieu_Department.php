<?php 

class Chef_Lieu_Department extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Department';	
		$this->data['page'] = 'Department';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Region_Model');   
    	$this->load->model('Chef_Lieu_Department_Model');    	
	}

	
	public function index(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['regions'] = $this->Region_Model->get_all_regions();
		$this->data['departments'] =  $this->Chef_Lieu_Department_Model->get_all_departments();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/chef_lieu_department', $this->data);
	}

	public function save_department()
	{
		$data =  array(
					'region_id'=>trim($this->input->post('region')),
					'department_name'=>trim($this->input->post('department')),
					'department_description'=>trim($this->input->post('description'))
				);

		// print_r($data);
		// die;

		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->Chef_Lieu_Department_Model->check_department($data,"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_target_commune_department',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->Chef_Lieu_Department_Model->check_department($data,$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_target_commune_department','department_id',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}


	public function edit_department()
	{
		echo $response  =  $this->Chef_Lieu_Department_Model->get_department_details($this->input->post('dep_id'));
	}

	public function delete_department()
	{
		$id = $this->input->post('id');

		$check_del =  $this->db->get_where('tbl_target_commune',array('department_id' => $id ))->result_array();

		if(!empty($check_del))
		{
			echo '2';
		}
		else
		{
			$where = array('department_id' => $id);

			echo $this->Common_model->delete_data('tbl_target_commune_department',$where);
		}

	}
}