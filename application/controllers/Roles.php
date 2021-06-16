<?php 

class ROLES extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Roles';	
		$this->data['page'] = 'Roles';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Role_Model'); 

    	if($this->session->userdata('role') != "1")
    	{
    		redirect('Auth/logout');
    	}   	
	}

	
	public function index(){
		$this->data['record']=$this->Common_model->get_admin_details();
		$this->data['role']=$this->Role_Model->get_record();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/role', $this->data);
	}

	public function add_role(){
		if($this->input->post('save')){
			$rname=$this->input->post('role_name');
 			$validate = $this->Role_Model->check_role($rname);	
 				if($validate > 0){
 					echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="fa fa-times-circle fa-fw fa-lg"></i>
							<strong>Sorry! </strong> Role name <b>'.$rname.'</b> is already exists. Try submitting again';
 				}else{
 					echo $this->Role_Model->add_roles(); 					
 				}
 		}
		
		
	}



	// New update: 23-04-2020
	public function edit_role(){

		echo $response  =  $this->Role_Model->get_role_details($this->input->post('role_id'));

	}

	public function save_role()
	{

		$data =  array(
					'name'=>$this->input->post('role_name'),
					'field_data'=>$this->input->post('role_description'),
					"created_at" =>date('Y-m-d H:i:s'),
					"modified_at" =>date('Y-m-d H:i:s')
				);

		// print_r($data);
		// die;

		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->Role_Model->check_role($data['name'],"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_role',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->Role_Model->check_role($data['name'],$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_role','id',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}

	public function delete_role()
	{
		$id  =  $this->input->post('id');
		$this->Role_Model->delete_role($id);
	} 	
	
}