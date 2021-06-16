<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_Model');
		$this->load->helper('form');
		$this->load->library('form_validation');
	        $this->load->library('session');
	        $this->load->database();
	        $this->load->library('email');
	       	date_default_timezone_set('Asia/Kolkata');
	}
	/* Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	 function index(){
	 	$data['page']= "Login";
	 	$data['title']= "DCP - Admin Login Page";
	 	$this->logged_in();
    	$this->load->view('admin/login', $data);
 	 }


	public function logged__in(){   
		$data['title']= "DCP - Admin Login Page";
		$this->logged_in();
		  $email  = $this->form_validation->set_rules('u_email', 'Email', 'required|trim');
      $password 	= $this->form_validation->set_rules('password', 'Password', 'required'); 
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');	
    //echo "<pre>", print_r($this->form_validation), "</pre>";	
		if ($this->form_validation->run() == TRUE) {
			$validate = $this->Auth_Model->check_email($this->input->post('u_email'));	
			
			if($validate > 0){
				$validatelogin = $this->Auth_Model->login();
				if(!empty($validatelogin) ){
					$logged_in_sess = array(
          'id' =>  $validatelogin['id'],
          'role'     => $validatelogin['is_admin'],
          'username'  => $validatelogin['user_name'],
          'email'     => $validatelogin['u_email'],
          'posturl'   => "Admin_Dashboard",
          'site_lang' =>'english',
          'logged_in' => TRUE
				);
				$this->session->set_userdata($logged_in_sess);
	           	redirect('Admin_Dashboard', 'refresh');
				}else{
					$this->session->set_flashdata('msg', array('message' => '<strong>Sorry! </strong> Useremail or Password is Wrong <a href="javascript:void(0);" class="alert-link">try submitting again</a>.','class' => 'alert alert-danger fade in'));	        	
	        	redirect('auth', $data);            
				}				
			}
			else{				
				 $this->session->set_flashdata('msg', array('message' => '<strong>Sorry! </strong> Useremail or Password is Wrong <a href="javascript:void(0);" class="alert-link">try submitting again</a>.','class' => 'alert alert-danger fade in'));	        	
	        	redirect('auth', $data);
	    	}		
		} else {
            $this->load->view('admin/login', $data);
        }	
		
    }
   
	/*
		clears the session and redirects to login page
	*/
	public function logout(){
		$this->load->driver('cache');		
		$this->session->sess_destroy();
		$this->cache->clean();
		//ob_clean();
		redirect('/', 'refresh');
	}
	/**
     * This function is used send mail in forget password
     * @return Void
     */	
    public function forgetpassword(){
        $data['page'] = 'ForgotPassword';
        $data['title'] = 'DCP - Forgot Password';
        if($this->input->post()){
            //$setting = settings();
            $res = $this->login_model->get_data_by('user', $this->input->post('femail'), 'u_email',1);
           // print_r($res)  ; exit; 
            if(isset($res[0]->id) && $res[0]->id != '') { 

                $var_key = $this->getVarificationCode(); 
                $this->login_model->updateRow('user', 'id', $res[0]->id, array('var_key' => $var_key));
                $sub = "Reset password";
                $email = $this->input->post('femail');
                
               
                $body = 'thia ia test';
               
               
                //if($setting['mail_setting'] == 'php_mailer') {
                   // $this->load->library("send_mail");         
                    //$emm = $this->send_mail->email($sub, $body, $email, $setting);
                //}else {
                    // content-type is required when sending HTML email
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From:info@gmail.com"."\r\n";
                    $emm = mail($email,$sub,$body[0],$headers);
               // }
                if($emm) {
                    $this->session->set_flashdata('msg', 'To reset your password, link has been sent to your email');
                    redirect( base_url().'login','refresh');
                }
            } else {    
                $this->session->set_flashdata('forgotpassword', 'This account does not exist');//die;
                redirect( base_url()."login/forgetpassword");
            }
        } else {
            
            $this->load->view('admin/forget_password', $data);
        }
    }
    /**
     * This function is generate hash code for random string
     * @return string
     */
    public function getVarificationCode(){        
        $pw = $this->randomString();   
        return $varificat_key = password_hash($pw, PASSWORD_DEFAULT); 
    }
    /**
     * This function is used to Generate a random string
     * @return String
     */
    public function randomString(){
        $alpha = "abcdefghijklmnopqrstuvwxyz";
        $alpha_upper = strtoupper($alpha);
        $numeric = "0123456789";
        $special = ".-+=_,!@$#*%<>[]{}";
        $chars = $alpha . $alpha_upper . $numeric;            
        $pw = '';    
        $chars = str_shuffle($chars);
        $pw = substr($chars, 8,8);
        return $pw;
    }

     /**
      * This function is used to load view of reset password and varify user too 
      * @return : void
      */
    public function mail_varify(){
      	$return = $this->login_model->mail_varify();      	
      	if($return){          
        	$data['email'] = $return;
        	$this->load->view('admin/set_password', $data);        
      	} else { 
	  		$data['email'] = 'allredyUsed';
        	$this->load->view('admin/set_password', $data);
    	} 
    }
	


}
