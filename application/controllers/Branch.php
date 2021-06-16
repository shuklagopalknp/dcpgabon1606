<?php defined('BASEPATH') OR exit('No direct script access aloowed');  

class Branch extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Branches';	
		$this->data['page'] = 'Branches';	
		$this->load->library('session');
		$this->load->helper('lang_translate');		
    	//$this->lang->load('auth_lang', $this->session->userdata('site_lang'));
    	$this->load->model('Common_model');
    	$this->load->model('Admin_Model');

    	if($this->session->userdata('role') != "1")
    	{
    		redirect('Auth/logout');
    	}
	}

	
	
	public function index(){
		
		$this->data['record']=$this->Common_model->get_admin_details();
		$this->data['branch_record']=$this->Admin_Model->get_All_branch();
		//$this->data['mdf']= $this->lang->line('The actual message to be shown');		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/branch',$this->data);
	}
	public function add_Branch()
	{
		//if(!empty($this->input->post('branch_name'))){
			$this->form_validation->set_rules('branch_name', 'Branch Name', 'trim|required');
			$this->form_validation->set_rules('contact_person','Contact Person','trim|required');
			$this->form_validation->set_rules('contact_no', 'Contact No.', 'trim|required|min_length[08]|max_length[12]|numeric');
			$this->form_validation->set_rules('address', 'Address', 'required');
			if ($this->form_validation->run() == TRUE)
                {
                     $arr = array(						
						'admin_id'=>$this->session->userdata('id'),
						'branch_name' => $this->input->post('branch_name'),
						'contact_person'=>$this->input->post('contact_person'),
						'contact_no'=>$this->input->post('contact_no'),
						'address' => $this->input->post('address'),
			            'branch_code' => '002',		
			            'zone'=>$this->input->post('zone'),
						'department'=>$this->input->post('department'),
						'code_agence' => $this->input->post('code_agence'),
			            'mobile_contact' => $this->input->post('mobile_contact'),			            
			        );        
                    $this->Admin_Model->insertRow('branch', $arr); 
                    echo 1;  
                }               
		//}
	}

	public function editmodal_branch(){
		echo $this->Admin_Model->get_select_branch();
	}
	public function update_Branch()
	{
		$key=$this->input->post('editid');
		if(!empty($this->input->post('editbranch_name'))){
			$this->form_validation->set_rules('editbranch_name', 'Branch Name', 'required');
			$this->form_validation->set_rules('editcontact_person','Contact Person','trim|required');
			$this->form_validation->set_rules('editcontact_no', 'Contact No.', 'trim|required|min_length[8]|max_length[12]|numeric');
			$this->form_validation->set_rules('editaddress', 'Address', 'required');
			if ($this->form_validation->run() == TRUE)
                {
                    $arr = array(					
						'branch_name' => $this->input->post('editbranch_name'),
						'contact_person'=>$this->input->post('editcontact_person'),
						'contact_no'=>$this->input->post('editcontact_no'),
						'address' => $this->input->post('editaddress'),

						'department' => $this->input->post('editdepartment'),
						'mobile_contact'=>$this->input->post('editmobile_contact'),
						'zone'=>$this->input->post('editzone'),
						'code_agence' => $this->input->post('editcode_agence'),
					); 
			        $this->Admin_Model->updateRow('branch', 'bid', $key, $arr);           
                    echo 1;  
                }
		}
	}
	public function delete_branch()
	{
		echo $this->Admin_Model->delete_data('tbl_branch', 'bid');			
	}
}