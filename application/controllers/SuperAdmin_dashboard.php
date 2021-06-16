<?php defined('BASEPATH') OR exit('No direct script access aloowed'); 

class SuperAdmin_dashboard extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'BCG | Dashboard';	
		$this->data['page'] = 'Dashboard';	
		$this->load->library('session');
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Dashboard_Model');
    	$this->load->model('PP_Credit_Scholar_Model');
    	$this->load->helper('timeAgo');
    //	date_default_timezone_set('GMT');
    	
	}

	/* 
	* It only redirects to the dashboard page
	* It passes the total applied loans, total pending loans, total approved loans, and total rejected loans
	into the dashboard.
	*/
	public function index(){
		$this->data['record']=$this->Common_model->get_admin_details(2);
		$role_id = $this->session->userdata('role');

		$this->data['applied_count']=$this->Dashboard_Model->get_all_appliedloans();
		
		
		$all_counts = $this->Dashboard_Model->get_pending_count();

		$this->data['pending_loans'] = $all_counts['pending_loans'];
		$this->data['approved_loans']= $all_counts['approved_loans'];
		$this->data['rejected_loans']=$all_counts['rejected_loans'];
		
		
		$this->data['recent_customers']=$this->Dashboard_Model->get_recent_customers();
		$this->data['branchwise_customers'] = $this->Dashboard_Model->get_branchwise_customers();
                

// 		$cust_where = array('deleted' => '0');
// 		$b_where = array('deleted' => '0');
		
//         $this->data['individual']=$this->Common_model->getRecord('tbl_customer_entries',' count(customer_id) as count',$cust_where);
        // $this->data['business']=$this->Common_model->getRecord('tbl_business_customer',' count(customer_id) as count',$b_where);
		
        $this->data['pending_applications'] =  $this->Dashboard_Model->get_all_pending_applications();


		$this->data['processed_applications'] = $this->Dashboard_Model->get_all_processed_applications();

        $is_admin = ($role_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')){			
			$this->render_template2('superadmin/dashboard', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
		
	}
        
    public function operational_dashboard(){
	    $this->data['pending_applications'] =  $this->Dashboard_Model->get_all_pending_applications();
        $this->data['processed_applications'] = $this->Dashboard_Model->get_all_processed_applications();
                
		$this->render_template2('operational_dashboard', $this->data);
	}

	public function view_notifications(){
		$this->data['record']=$this->Common_model->get_admin_details($this->session->userdata('id'));

		$this->db->select('tbl_notifications.*,u.first_name,u.last_name,u.avatar');
		$this->db->from('tbl_notifications');
		$this->db->where('tbl_notifications.receiver_id',$this->session->userdata('role'));
		$this->db->join('tbl_user as u','u.id = tbl_notifications.sender_id','inner');
		$this->db->join('tbl_role as r','r.id = u.is_admin','inner');
		$this->db->order_by('notification_id','desc');
		$this->data['notification'] = $this->db->get()->result_array();
		
		$this->render_template2('superadmin/view_notifications', $this->data);
	}
        
        public function mark_as_read(){
		$user_id  =  $this->session->userdata('id');

		$where =  array('seen_status'=>'seen');
		$this->Common_model->updateRow('tbl_notifications','receiver_id',$user_id,$where);

		redirect($_SERVER['HTTP_REFERER']);
	}
}