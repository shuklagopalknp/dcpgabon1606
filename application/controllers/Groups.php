<?php 

class Groups extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Groups';	
		$this->data['page'] = 'Groups';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Role_Model'); 
    	$this->load->model('Group_Model');      	
	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index(){
		 $this->data['record']=$this->Common_model->get_admin_details();
		 $this->data['groups']=$this->Group_Model->get_all_groups();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/groups', $this->data);
	}

	public function save_group()
	{
		$data =  array(
				'group_name'=>trim($this->input->post('group')),
				'group_description'=>trim($this->input->post('description'))
			);

		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->Group_Model->check_group($data['group_name'],"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_groups',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->Group_Model->check_group($data['group_name'],$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_groups','group_id',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}
	
	public function edit_group()
	{
		echo $response  =  $this->Group_Model->get_group_details($this->input->post('group_id'));
	}

	public function delete_group()
	{
		$where = array('group_id' => $this->input->post('id') );

		echo $this->Common_model->delete_data('tbl_groups',$where);
	}

	public function assign_roles($param)
	{
		$this->data['record']=$this->Common_model->get_admin_details();
		$this->data['roles'] =  $this->Role_Model->get_all_roles();
		$this->data['assigned_roles'] =  $this->Group_Model->get_assigned_roles_bygroups($param);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->data['group_id'] =  $param;


		$this->render_template('admin/assign_roles', $this->data);

	}

	public function save_assignee()
	{
		$role_ids =  $this->input->post('role_ids');
		$group_id  =  $this->input->post('group_id');

	 	echo $this->Group_Model->save_assignees($role_ids,$group_id);
	}
}