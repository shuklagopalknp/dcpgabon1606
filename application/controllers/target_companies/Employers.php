<?php 

class Employers extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Employeurs';	
		$this->data['page'] = 'Employeurs';
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Secteur_Model');
    	$this->load->model('Sous_Secteurs_Model');
    	$this->load->model('EmployeeCategory_Model');
    	$this->load->model('Limit_Model');
    	$this->load->model('Employer_Model');
    	
    
	}

	
	public function index(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['secteur'] =  $this->Secteur_Model->get_all_secteurs();
		$this->data['sous_secteur'] =  $this->Sous_Secteurs_Model->get_all_sous_secteurs();
		$this->data['category'] =  $this->EmployeeCategory_Model->get_all_categories();
		$this->data['limit'] =  $this->Limit_Model->get_all_limites();
		$this->data['employer'] =  $this->Employer_Model->get_all_employers();
		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/employer', $this->data);
	}

	public function get_sous_secteur_by_secteur()
	{
		echo $response =  $this->Sous_Secteurs_Model->get_sous_secteur_by_secteur($this->input->post('sec_id'));
	}
	
	public function save_employer()
	{
		$data =  array(
					'employer_name'=>trim($this->input->post('employer')),
					'secteur_id'=>trim($this->input->post('secteur')),
					'sous_secteur_id'=>trim($this->input->post('sous_secteur')),
					'category_id'=>trim($this->input->post('category')),
					'limit_id'=>trim($this->input->post('limit'))
				);

		// print_r($data);
		// die;
		$edit_id  =  $this->input->post('edit_id');
		if($edit_id == "")
		{
			$validate =  $this->Employer_Model->check_employer($data['employer_name'],"");

			echo ($validate == "not_exists") ? ( ($this->Common_model->insertRow('tbl_employers',$data))? 'success' : 'error') :  'already_exists'; 
		}
		else
		{
			$validate =  $this->Employer_Model->check_employer($data['employer_name'],$edit_id);

			echo ($validate == "not_exists") ? ( ($this->Common_model->updateRow('tbl_employers','emp_id',$edit_id,$data))? 'success' : 'error') :  'already_exists'; 
		}
	}


	public function edit_employer()
	{
		echo $response  =  $this->Employer_Model->get_employer_details($this->input->post('emp_id'));
	}

	public function delete_employer()
	{

		$emp_id  =  $this->input->post('id');
		$where = array('deleted' => "1");

		echo $this->Common_model->updateRow('tbl_employers','emp_id',$emp_id,$where);
		

	}
}