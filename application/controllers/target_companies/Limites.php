<?php 

class Limites extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Limites';	
		$this->data['page'] = 'Limites';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Limit_Model');
    
	}

	
	public function index(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['limites'] =  $this->Limit_Model->get_all_limites();
		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/limites', $this->data);
	}

	
	public function save_limit()
	{
		$data =  array(
					'limit_name'=>trim($this->input->post('limit')),
					'limit_description'=>trim($this->input->post('description'))
				);


		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->Limit_Model->check_limit($data['limit_name'],"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_limits',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->Limit_Model->check_limit($data['limit_name'],$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_limits','limit_id',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}


	public function edit_limit()
	{
		echo $response  =  $this->Limit_Model->get_limit_details($this->input->post('limit_id'));
	}

	public function delete_limit()
	{
		$id  = $this->input->post('id');

		$this->Limit_Model->delete_limit($id);
	}
}