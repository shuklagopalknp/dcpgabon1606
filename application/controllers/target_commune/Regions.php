<?php 

class Regions extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Regions';	
		$this->data['page'] = 'Regions';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Region_Model');    	
	}

	
	public function index(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['regions'] = $this->Region_Model->get_all_regions();

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/regions', $this->data);
	}

	public function save_region()
	{
		$data =  array(
					'region_name'=>trim($this->input->post('region')),
					'region_description'=>trim($this->input->post('description'))
				);

		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->Region_Model->check_region($data['region_name'],"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_target_commune_region',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->Region_Model->check_region($data['region_name'],$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_target_commune_region','region_id',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}


	public function edit_region()
	{
		echo $response  =  $this->Region_Model->get_region_details($this->input->post('region_id'));
	}

	public function delete_region()
	{
		$id  =  $this->input->post('id');
		

		$check_del =  $this->db->get_where('tbl_target_commune_department',array('region_id' => $id ))->result_array();

		if(!empty($check_del))
		{
			echo '2';
		}
		else
		{
			$where = array('region_id' => $this->input->post('id') );

			echo $this->Common_model->delete_data('tbl_target_commune_region',$where);
		}
		

	}
}