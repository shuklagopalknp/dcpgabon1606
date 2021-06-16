<?php 

class Add_ROLES extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Add New Role';	
		$this->data['page'] = 'Roles';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Role_Model');    	
	}

	
	public function index(){
		$this->data['record']=$this->Common_model->get_admin_details();
		$this->data['role_permissions']=$this->Role_Model->get_permissions();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/add_role', $this->data);
	}

	public function add_role_user(){
		// print_r($_POST);
		$permission=$this->input->post('permission');
		$permissionRoles=$this->input->post('permissionRoles');

		$List = implode(', ', $permission); 
		$List_Roles = implode(', ', $permissionRoles); 

		

		if($_POST['permission']){
			$rname=$this->input->post('role_name');
 			$validate = $this->Role_Model->check_role($rname,"");	
 				if($validate == "exists"){
 					$response["success"]=0;
 					$response["message"]="Sorry! Role name '".$rname."' is already exists. Try submitting again";
 					$this->session->set_flashdata('message',$response["message"]);
					redirect("Roles");

 				}else{
 					$data =  array(
					'name'=>$this->input->post('role_name'),
					'field_data'=>$this->input->post('role_description'),
					"created_at" =>date('Y-m-d H:i:s'),
					"modified_at" =>date('Y-m-d H:i:s'),
					"user_permission" =>$List,
					"portal_permission" =>$List_Roles
				);
				$this->Common_model->insertRow('tbl_role',$data);		
				$response["success"]=1;
 				$response["message"]="Inserted Successfully";
 				$this->session->set_flashdata('message','Data Inserted Successfully');
					redirect("Roles");			
 				}
 				return $response;
 		}
		
		
	}

		public function edit_role($id){
		$this->data['record']=$this->Common_model->get_admin_details();
		$this->data['role_permissions']=$this->Role_Model->get_permissions();
		$this->data['role_permissions_of_id']=$this->Role_Model->get_role_permissions_of_id($id);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->data['is_edit'] = $id;
		
		$this->render_template('admin/add_role', $this->data);
				
		
	}

		public function edit_role_user(){
			

		$permission=$this->input->post('permission');
		$permissionRoles=$this->input->post('permissionRoles');

		$List = implode(', ', $permission); 
		$List_Roles = implode(',', $permissionRoles); 
		

		if($_POST['permission']){
			$rname=$this->input->post('role_name');
			$id=$this->input->post('edit_id');

 					$data =  array(
					'name'=>$this->input->post('role_name'),
					'field_data'=>$this->input->post('role_description'),
					"created_at" =>date('Y-m-d H:i:s'),
					"modified_at" =>date('Y-m-d H:i:s'),
					"user_permission" =>$List,
					"portal_permission" =>$List_Roles
				);
 				$this->Common_model->updateRow('tbl_role', 'id', $id, $data);


				$response["success"]=1;
 				$response["message"]="Inserted Successfully";
 				$this->session->set_flashdata('message','Data Inserted Successfully');
					redirect("Roles");			
 				
 				return $response;
 		}
		
		
	}
	
}