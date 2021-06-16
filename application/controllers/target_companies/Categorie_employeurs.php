<?php 

class Categorie_employeurs extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Category_employeurs';	
		$this->data['page'] = 'Category_employeurs';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('EmployeeCategory_Model');
    
	}

	
	public function index(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['category'] =  $this->EmployeeCategory_Model->get_all_categories();
		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/employee_category', $this->data);
	}

	
	public function save_category()
	{
		$data =  array(
					'catrgory'=>trim($this->input->post('category')),
					'category_description'=>trim($this->input->post('description'))
				);

		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->EmployeeCategory_Model->check_category($data['catrgory'],"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_category_of_employers',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->EmployeeCategory_Model->check_category($data['catrgory'],$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_category_of_employers','cat_id',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}


	public function edit_category()
	{
		echo $response  =  $this->EmployeeCategory_Model->get_category_details($this->input->post('cat_id'));
	}

	public function delete_category()
	{
		$id  = $this->input->post('id');

		$this->EmployeeCategory_Model->delete_category($id);

	}
}