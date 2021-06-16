<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends Admin_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_Model');
		$this->load->model('Common_model');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->library('session');
    
	}
	/* Check if the login form is submitted, and validates the user credential
		If not submitted it redirects to the login page
	*/
	 function index(){	
	 	$this->logged_in();	
	 	$data['page']= "Login";
		$data['title'] = "BCG - Login Page";	
	 	$this->logged_in();
		$this->load->view('superadmin/login', $data);
 	 }
	public function sadminLogin(){ 
		
	    $data['title'] = "BCG - Login Page";
		$this->logged_in();
		$email = $this->form_validation->set_rules('u_email', 'Email', 'required|trim');
        $password 	= $this->form_validation->set_rules('password', 'Password', 'required'); 
		$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
		
		if ($this->form_validation->run() == TRUE) {
			$validate = $this->Login_Model->admin_check_email($this->input->post('u_email'));	
			if($validate > 0){
        //echo "call here";
				 $validatelogin = $this->Login_Model->superAdminLogin();
				 $RolesDetail = $this->Login_Model->get_data_by('tbl_role',$validatelogin['is_admin'],'id');
				 $branchNamee = $this->Login_Model->getBranch($validatelogin['branch_id']);
				//  print_r($RolesDetail[0]->name);
				//  die;
				 $array = array();
				if(!empty($validatelogin) ){
				$this->Login_Model->updateRow('user', 'id', $validatelogin['id'],array('var_key' =>'',));
					
					$logged_in_sess = array(
						  'id' =>  $validatelogin['id'],
						  'role'     => $validatelogin['is_admin'],
						  'rolename'     => $RolesDetail[0]->name,
						  'username'  => $validatelogin['user_name'],
						  'exploitent'     => $validatelogin['exploitent'],
						  'branch'     => $validatelogin['branch_id'],
						  'branchName'     => $branchNamee,
						  'email'     => $validatelogin['u_email'],
						  'posturl'   => "Dashboard",
						  'site_lang' =>'english',
						  'logged_in' => TRUE
						);	
					
					$myArray = explode(',', $RolesDetail[0]->user_permission);
					$myArrayportal_permission = explode(',', $RolesDetail[0]->portal_permission);
					$logged_in_sess['role_permission'] = $myArray;
					$logged_in_sess['portal_permission'] = $myArrayportal_permission;
					
					$this->session->set_userdata($logged_in_sess);
				    $this->session->unset_userdata('attampt');
				    redirect('Dashboard');
					
				}else{
				$validate_active = $this->Login_Model->active_check($this->input->post('u_email'));
					// echo $validate_active;
					// die;
					if($validate_active > 0){
						$this->session->set_flashdata('msg', array('message' => '<strong>Compte désactivé! </strong> <a href="javascript:void(0);" class="alert-link">Contacter votre Administrateur</a>.','class' => 'alert alert-danger fade in'));	  
					}else{
					if(!$this->session->userdata('attampt')) { 

					$this->session->set_userdata('attampt', 1);
					}else{
						$this->session->set_userdata('attampt', $this->session->userdata('attampt')+1);
					}
					if($this->session->userdata('attampt')>=3){
						$this->Login_Model->updateRow('user', 'u_email', $this->input->post('u_email'), array('is_active' => 0));
					}
					
					
					$this->session->set_flashdata('msg', array('message' => '<strong>Désolée! </strong> Identifinant ou le mot de passe est incorrect <a href="javascript:void(0);" class="alert-link">essayez de soumettre à nouveau</a>.','class' => 'alert alert-danger fade in'));	     
					}   	
	        	redirect('login', $data);
				}
				//echo "<pre>", print_r($validatelogin,1),"</pre>";	exit;						
				
			}
			else{	
       //echo "call there";			
				 $this->session->set_flashdata('msg', array('message' => '<strong>Sorry! </strong> Identifinant ou le mot de passe est incorrect <a href="javascript:void(0);" class="alert-link">essayez de soumettre à nouveau</a>.','class' => 'alert alert-danger fade in'));	        	
	        	redirect('login', $data);
	    	}		
		} else {
            $this->load->view('superadmin/login', $data);
        }	
		
    }
   
	/*
		clears the session and redirects to login page
	*/
	public function logout(){
		$this->load->driver('cache');		
		$this->session->sess_destroy();
		$this->cache->clean();
		ob_clean();
		redirect('/', 'refresh');
	}



	/**
     * This function is used send mail in forget password
     * @return Void
     */	
	public function forgetpassword()
	{
		$this->logged_in(); 
        $this->data['page'] = 'ForgotPassword';
        $this->data['title'] = 'BCG - Forgot Password';
        $this->load->library('email');
        $config  =  array  (
		'mailtype' => 'html',
		'charset'  => 'utf-8',
		'priority' => '1'
		);
		if($this->input->post('femail') && (!empty($this->input->post('femail'))))
		{
			# Get Record
			$res = $this->Login_Model->get_data_by('user', $this->input->post('femail'), 'u_email',1);
			if(isset($res[0]->id) && $res[0]->id != '') {	
            	$this->data['details']=$res;
                $var_key = $this->getVarificationCode(); 
                $this->Login_Model->updateRow('user', 'id', $res[0]->id, array('var_key' => $var_key));
                $sub = "Password Request";
                $email = $this->input->post('femail');               
                $body = $this->generate_password_request_template($this->input->post('femail'));
                
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From:info@gmail.com"."\r\n";
                
                // $emm = mail($email,$sub,$body,$headers);              
                if($this->Common_model->send_mail_to_users2($email,$sub, $body)) {
                	$this->session->set_flashdata('msg', array('message' => '<strong>Merci! </strong>Nous avons envoyé un e-mail à "'.$email.'" avec des instructions sur la réinitialisation de votre mot de passe..','class' => 'alert alert-success fade in'));                   
                    redirect( base_url().'login/forgetpassword','refresh');
                }else{
                	$this->session->set_flashdata('msg', array('message' => '<strong>Désolé! </strong> Échec, Veuillez réessayer!','class' => 'alert alert-danger fade in')); 
                	redirect( base_url().'login/forgetpassword','refresh');                	
                }
            }
            else
            { 
            	$this->session->set_flashdata('msg', array('message' => '<strong>Désolé! </strong> Aucun compte trouvé pour cet e-mail.','class' => 'alert alert-danger fade in'));   
                //$this->session->set_flashdata('forgotpassword', 'This account does not exist');//die;
                redirect( base_url()."login/forgetpassword",'refresh');
            }
        }
        else {
            $this->load->view('superadmin/forget_password', $this->data);             
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




    
/*=======================created on 26-07-2019=====================*/
    public function change_password(){
    	$this->logged_in(); 
    	$this->data['page'] = 'ForgotPassword';
        $this->data['title'] = 'DCP - Change Password';
    	$dataid = base64_decode($this->input->get('src'));  
    	$request = $this->input->get('token');    	
        $result= $this->Login_Model->get_userdatainfo('user', array('u_email' => $dataid, 'var_key'=>$request),1);
        if(!empty($result) > 0){        	
        	$this->data['result'] = $result;
        	$token = $request   ;      
            $this->data['cleanToken'] = $this->security->xss_clean($token);
        	$this->load->view('superadmin/changepassword', $this->data); 

        }else{        	
        	$this->data['title'] = 'DCP | Access Denied';        	
            $this->session->set_flashdata('msg', array('message' => '<strong>Sorry! </strong> Token is invalid or expired.','class' => 'alert alert-danger fade in'));
	        	redirect('login', $this->data);

        }    	
    }

    /**
	 * Reset password page
	 */
	public function reset_password()
    {
    	$this->logged_in();    	
    	$checkmail=trim($this->input->post('checkmail'));
    	$editid=trim($this->input->post('editid'));

		$base_64 = base64_encode($checkmail);
		$url_param = rtrim($base_64, '=');
		// and later:
		$base_64 = $url_param . str_repeat('=', strlen($url_param) % 4);

    	$this->load->library('email');
        $config  =  array  (
		'mailtype' => 'html',
		'charset'  => 'utf-8',
		'priority' => '1'
		);    	
			$result=$this->Login_Model->get_userdatainfo('user', array('id'=> $editid,'u_email' => $checkmail),1);
			$this->data['result'] = $result;
			$udata=array(
	            "password" =>password_hash($this->input->post('password'), PASSWORD_DEFAULT),
	            'var_key'=>"",
	    	);
        	$update=$this->Login_Model->updateRow('user', 'id', $editid,$udata);
        	if($update){
        		$sub = "Reset Password";
                $email =trim($checkmail);               
                $body ='<html>
                		<body>
							<h2>Dear Mr. '.ucfirst($result[0]->first_name).',</h2>
							<p>This email confirms that your password for account: '.$checkmail.' has been changed to '.$this->input->post('password').'</p>
							<p>Please update your password once successfully logged on by completing the following steps:</p>
							<ol>
							<li> On your left pane, click on Change Password.</li>
							<li> Type your new password in the field New Password.</li>
							<li> Verify / Confirm your new password by typing it in the field Verify Password.</li>
							<li> Click on the button Change to finalise the update.</li>
							<ol>
							If you require any assistance, please contact us on 860 33 407.
							Operating hours: 09h30-17h30 Mon-Sat.</p>
							<p>Kind Regards<br>
							-------------<br>
							DCP Team </p>
							</body>
						</html>';

						//echo $body; exit;
                
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "CC: prolay.picku@gmail.com\r\n";
                $headers .= "From:info@gmail.com, <DCP Team>"."\r\n";
                $emm = mail($email,$sub,$body,$headers);
                if($emm) {
                	$this->session->set_flashdata('msg', array('message' => '<strong>Success! </strong> Your password has been updated. You may now login.','class' => 'alert alert-success fade in'));
        			redirect('login', $this->data,'refresh'); 
                }else{
                	$this->session->set_flashdata('msg', array('message' => '<strong>Sorry! </strong> Updating your password but failed to send mail, please try again!','class' => 'alert alert-danger fade in')); 
                	redirect('login', $this->data,'refresh');                	
                }
               // $data['message']=$this->email->send()?'Message was sent successfully!':'Error sending email!';
        		
        	}else{
        		$this->session->set_flashdata('msg', array('message' => '<strong>Sorry! </strong> There was a problem updating your password.','class' => 'alert alert-danger fade in'));
       
        		redirect('Login/change_password?src='.$base_64.'&token='.$result[0]->var_key.'', $this->data,'refresh');
        	}

    	
    }


    public function generate_password_request_template($email)
    {
    	$this->data['details']=$this->Login_Model->get_data_by('user', $email, 'u_email',1);
		return  $this->load->view('templates/password_request',$this->data,true);
    }

   

  
	


}
