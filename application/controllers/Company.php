<?php defined('BASEPATH') OR exit('No direct script access aloowed');  

class Company extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Companies';	
		$this->data['page'] = 'Companies';	
		$this->load->library('session');
		$this->load->helper('lang_translate');		
    	$this->load->model('Common_model');
    	$this->load->model('Admin_Model');
	}

	public function index(){
		$this->data['record']=$this->Common_model->get_admin_details();
		$this->data['company_record']=$this->Admin_Model->get_all_companies();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/company',$this->data);
	}
	public function add_company()
	{

			$this->form_validation->set_rules('company_name', 'Company Name', 'trim|required');
			$this->form_validation->set_rules('company_email','Email','trim|required|valid_email');
			$this->form_validation->set_rules('company_contactno', 'Contact No.', 'trim|required|min_length[10]|max_length[12]|numeric');
			$this->form_validation->set_rules('company_address', 'Address', 'required');
			if ($this->form_validation->run() == TRUE)
                {
                     $arr = array(						
						'admin_id'=>$this->session->userdata('id'),
						'company_name' => $this->input->post('company_name'),
						'company_email'=>$this->input->post('company_email'),
						'company_contactno'=>$this->input->post('company_contactno'),
						'company_contactperson' => $this->input->post('company_contactperson'),
			            'company_address' => $this->input->post('company_address'),			            
			        );        
                    $this->Admin_Model->insertRow('tbl_target_companies', $arr); 
                    echo 1;  
                }               
	}

	public function editmodal_company(){
		echo $this->Admin_Model->get_select_company();
	}
	public function update_company()
	{
		$key=$this->input->post('editid');
		
		$this->form_validation->set_rules('editcompany_name', 'Company Name', 'trim|required');
		$this->form_validation->set_rules('editcompany_email','Email','trim|required|valid_email');
		$this->form_validation->set_rules('editcontact_no', 'Contact No.', 'trim|required|min_length[10]|max_length[12]|numeric');
		$this->form_validation->set_rules('editcompany_address', 'Address', 'required');
		if ($this->form_validation->run() == TRUE)
            {
                $arr = array(					
					'admin_id'=>$this->session->userdata('id'),
					'company_name' => $this->input->post('editcompany_name'),
					'company_email'=>$this->input->post('editcompany_email'),
					'company_contactno'=>$this->input->post('editcontact_no'),
					'company_contactperson' => $this->input->post('editcontact_person'),
		            'company_address' => $this->input->post('editcompany_address'),		
				); 
		        $this->Admin_Model->updateRow('tbl_target_companies', 'company_id', $key, $arr);           
                echo 1;  
            }
		
	}
	public function delete_company()
	{
		echo $this->Admin_Model->delete_data('tbl_target_companies', 'company_id');			
	}
}