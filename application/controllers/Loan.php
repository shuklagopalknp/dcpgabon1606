<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class Loan extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | Loan';	
		$this->data['page'] = 'Loan';	
		$this->load->library('session');
		$this->load->helper('lang_translate');		
    	//$this->lang->load('auth_lang', $this->session->userdata('site_lang'));
    	$this->load->model('Common_model');
    	$this->load->model('Admin_Model');
	}
	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index(){
		$this->data['record']=$this->Common_model->get_admin_details();		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/loan',$this->data);
	}
	public function pp_consumer_loan(){
		$this->data['page'] = 'pp_consumerloan';
		$this->data['record']=$this->Common_model->get_admin_details();			
		$this->data['range']=$this->Admin_Model->get_range_consumer_loan();	
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/pp_consumerloan_range',$this->data);
	}
	public function pp_cash_espesece(){
		$this->data['page'] = 'pp_cashespesece';
		$this->data['record']=$this->Common_model->get_admin_details();		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/pp_cashespesece_range',$this->data);
	}
	public function pp_schooltuition(){
		$this->data['page'] = 'pp_schooltuition';
		$this->data['record']=$this->Common_model->get_admin_details();		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/pp_schooltuition_range',$this->data);
	}
	public function pp_commune_loan(){
		$this->data['page'] = 'pp_communeloan';
		$this->data['record']=$this->Common_model->get_admin_details();		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/pp_commune_loan_range',$this->data);
	}
	public function credit_scholar_loan_range()
	{

		sleep(1);
		//echo "<pre>", print_r($_POST,1), "</pre>"; exit;		
		$data=array(
				'lid' =>$this->input->post('loan_type'),
				'loanto' =>$this->input->post('loan_amount'), 
				'loanfrom' =>$this->input->post('maxamount'),
				'loan_lengthto' =>$this->input->post('length_of_loan_min'),
				'loan_lengthfrom' =>$this->input->post('length_of_loan_max'),
				'loan_interestrange_to' =>$this->input->post('interest_range_min'), 
				'loan_interestrange_from' =>$this->input->post('interest_range_max'),
				'discrate' =>$this->input->post('disc_rate'),
				'discrate_checked' =>$this->input->post('discrate_checked'),
				'normal_rate' =>$this->input->post('normal_rate'), 
				'normal_rate_checked' =>$this->input->post('normal_rate_checked'), 
				'specific_rate' =>$this->input->post('specific_rate'), 
				'specific_rate_checked' =>$this->input->post('specific_rate_checked'), 
				'feesto' =>$this->input->post('loan_fees_min'), 
				'feesfrom' =>$this->input->post('loan_fees_max'), 
				'vat_on_interest' =>$this->input->post('loan_vat'), 				
				"datemodify" =>date('Y-m-d h:i:s'),				
			);
		$getdata=$this->Admin_Model->get_reng_credit_scholar($this->input->post('loan_type'));
		
		//echo $getdata; exit;
		if( trim($getdata) > 0){
			//echo "update"; exit;
			$update=$this->Admin_Model->updateRow('loan_range','id', $this->input->post('editid'), $data);
			if($update){
				//echo 'success';
				$this->session->set_flashdata('msg', array('message' => '<strong>Success! </strong> Record is Update Successfully.','class' => 'alert alert-success fade in'));
			if($this->input->post('loan_type')=='1'){
	        	redirect('Loan/pp_consumer_loan');
			}else if($this->input->post('loan_type')=='1'){
				redirect('Loan/finance_credit_scholar');
			}
			}else{
				echo 'error';
				$this->session->set_flashdata('msg', array('message' => '<strong>Error! </strong> Failed To Updated Record.','class' => 'alert alert-danger fade in'));
	        	redirect('Loan/finance_credit_scholar');
			}
		}else{
			//echo "insert"; exit;
			$insert=$this->Admin_Model->insertRow('loan_range',$data);
			if($insert){
				$this->session->set_flashdata('msg', array('message' => '<strong>Successfully! </strong> New Record is Successfully Inserted.','class' => 'alert alert-success fade in'));
				if($this->input->post('loan_type')=='1'){
	        	redirect('Loan/pp_consumer_loan');
			}else if($this->input->post('loan_type')=='1'){
				redirect('Loan/finance_credit_scholar');
			}
	        	//redirect('Loan/finance_credit_scholar');
			}else{
				$this->session->set_flashdata('msg', array('message' => '<strong>Error! </strong> Failed To inserted Record.','class' => 'alert alert-danger fade in'));
	        	//redirect('Loan/finance_credit_scholar');
	        	if($this->input->post('loan_type')=='1'){
	        	redirect('Loan/pp_consumer_loan');
				}else if($this->input->post('loan_type')=='1'){
					redirect('Loan/finance_credit_scholar');
				}
			}
		}
	}
	public function finance_credit_scholar(){
		error_reporting(0);
		$this->data['page'] = 'financecreditscholar';
		$this->data['record']=$this->Common_model->get_admin_details();	
		$this->data['range']=$this->Admin_Model->get_range();		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		if($this->session->userdata('role')==='1'){	
			$this->data['is_admin'] = $is_admin;		
			$this->render_template('admin/finance_credit_scholar_range',$this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
	}
	
	public function pp_escompte(){
		$this->data['page'] = 'pp_escompte';
		$this->data['record']=$this->Common_model->get_admin_details();		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;

		if($this->session->userdata('role')==='1'){	
			$this->data['is_admin'] = $is_admin;		
			$this->render_template('admin/pp_escompte_range',$this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);     
		}		
	}
	
	public function pp_hr(){
		$this->data['page'] = 'pp_hr';
		$this->data['record']=$this->Common_model->get_admin_details();		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='1'){	
			$this->data['is_admin'] = $is_admin;		
			$this->render_template('admin/pp_hr_range',$this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);     
		}
		
	}
	public function pp_depasma(){
		$this->data['page'] = 'pp_depasma';
		$this->data['record']=$this->Common_model->get_admin_details();		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;

		if($this->session->userdata('role')==='1'){	
			$this->data['is_admin'] = $is_admin;		
			$this->render_template('admin/pp_depasma_range',$this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);     
		}
		
	}
	public function pp_decovert(){
		$this->data['page'] = 'pp_decovert';
		$this->data['record']=$this->Common_model->get_admin_details();		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;

		if($this->session->userdata('role')==='1'){	
			$this->data['is_admin'] = $is_admin;		
			$this->render_template('admin/pp_decovert_range',$this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);     
		}
		
	}

	
	
	
	
	
	
}