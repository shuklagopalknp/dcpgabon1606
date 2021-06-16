<?php 

class Users extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();

		$this->not_logged_in();
		$this->data['title'] = 'DCP | User';
		$this->data['page'] = 'Users';		
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->helper('lang_translate');		
    //	$this->lang->load('date_lang', 'spanish');
    	$this->load->model('Common_model');
    	$this->load->model('Role_Model');
    	$this->load->model('Users_Model'); 
    	$this->load->model('Admin_Model'); 
    	if($this->session->userdata('role') != "1")
    	{
    		redirect('Auth/logout');
    	}

	}

	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function index(){	
		$this->data['record']=$this->Common_model->get_admin_details();
		$this->data['userrole']=$this->Role_Model->get_record();
		$this->data['users']=$this->Users_Model->get_users();
		$this->data['branch']=$this->Admin_Model->get_userbranch();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/users', $this->data);
	}

	

	public function add_user(){	
	//echo "<pre>", print_r($_POST), "</pre>"; exit;
	//branch_id=userbranch
		if($this->input->post('save')){
			$data= $this->input->post('user_email');
			$status = "";
			$msg = "";	
			$validate = $this->Users_Model->check_field();
			if($validate > 0){
				echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							<i class="fa fa-times-circle fa-fw fa-lg"></i>
							<strong>Sorry! </strong> User Email <b>'.$this->input->post('user_email').'</b> is already exists. Try submitting again';
			}else{
				if(!empty($_FILES['file']['name'])){
				$config['upload_path'] = './assets/user-profile-img/';
		        $config['allowed_types'] = 'gif|jpg|png|doc|txt';
		        $config['max_size'] = 1024 * 8;
		        $config['encrypt_name'] = TRUE;
		        $config['file_name'] = $_FILES['file']['name'];
		        //$config['file_name'] = $_FILES['file']['type'];
		        $this->load->library('upload',$config);
		         $this->upload->initialize($config); 
		       	if($this->upload->do_upload('file')){
		            $uploadData = $this->upload->data();
		            //print_r($uploadData);                   
		             $picture = $uploadData['file_name'];
		             //print_r($picture);
						$img_arr=array(
							"file_name" => $uploadData['file_name'],
							"file_type" => $uploadData['file_type'],
							"file_path" => $uploadData['file_path'],
							"full_path" => $uploadData['full_path'],
							"raw_name" => $uploadData['raw_name'],
							"orig_name" => $uploadData['orig_name'],
							"client_name" => $uploadData['client_name'],
							"file_ext" => $uploadData['file_ext'],
							"file_size" => $uploadData['file_size'],
							"is_image" => $uploadData['is_image'],
							"image_width" => $uploadData['image_width'],
							"image_height" => $uploadData['image_height'],
							"image_type" => $uploadData['image_type'],
							"image_size_str" => $uploadData['image_size_str'],
						);
						$record=$this->Users_Model->insertRow('avatar', $img_arr);						
						$ainsert_id = $record;
						$result = $this->Users_Model->get_role($this->input->post('userrole'));				
						$post=array(			   
						   "is_admin" =>$this->input->post('userrole'),
						   "user_name" =>strtolower($this->input->post('user_name')),
						   "branch_id" =>trim($this->input->post('userbranch')),
						   "type" =>$result->name,						 
						   "branch_id"=>$this->input->post('userbranch'),
						   "u_email" =>$this->input->post('user_email'),
						   "password" =>password_hash($this->input->post('user_pass'), PASSWORD_DEFAULT),
						   "first_name" =>$this->input->post('user_name'),
						   "is_active" =>$this->input->post('status'),
						   "created_at"=>date('Y-m-d H:i:s'),
						   "modified_at"=>date('Y-m-d H:i:s'),
						   "avatar" =>$picture,
						   "avatar_id" =>$ainsert_id,
						   "deleted" =>0,
						   "exploitent"=>$this->input->post('exploitent'),
						   "entities" =>$this->input->post('entities'),
						   "department" =>$this->input->post('department'),
						   "codeAgenceAtlas" =>$this->input->post('codeAgenceAtlas'),
						   "target_loan_count" => $this->input->post('target_loan_count'),
						   "target_loan_amount" => $this->input->post('target_loan_amount')
						   		   
				     	);
						$urecord=$this->Users_Model->insertRow('user', $post);							
						if($urecord){
							$urecord=$this->Users_Model->insertRow('user_data',array('user_id'=>$urecord));
							echo  1;
						}else{
							echo 0;
						}
		        }else{
		            $picture = '';		     	
		        }
		        }else{
					$picture = '';
					$result = $this->Users_Model->get_role($this->input->post('userrole'));
					$post=array(			   
						"is_admin" =>$this->input->post('userrole'),
						"user_name" =>strtolower($this->input->post('user_name')),
						"type" =>$result->name,
						"branch_id" =>trim($this->input->post('userbranch')),
						"u_email" =>$this->input->post('user_email'),
						"password" =>password_hash($this->input->post('user_pass'), PASSWORD_DEFAULT),
						"first_name" =>$this->input->post('user_name'),
						"is_active" =>$this->input->post('status'),
						"created_at"=>date('Y-m-d H:i:s'),
						"modified_at"=>date('Y-m-d H:i:s'),
						"avatar" =>"",
						"avatar_id" =>"",
						"deleted" =>0,
						"exploitent"=>$this->input->post('exploitent'),
						"entities" =>$this->input->post('entities'),
						"department" =>$this->input->post('department'),
						"codeAgenceAtlas" =>$this->input->post('codeAgenceAtlas'),
						"target_loan_count" => $this->input->post('target_loan_count'),
						"target_loan_amount" => $this->input->post('target_loan_amount')
					);	            
					$urecord=$this->Users_Model->insertRow('user', $post); 
					if($urecord){
						echo 1;
					}else{
						echo 0;
					}
		        }				
			}
		}
		exit;
	}	
	public function user_profile(){	
		$this->data['record']=$this->Common_model->get_admin_details();
		$this->data['userrole']=$this->Role_Model->get_record();
		$this->data['users']=$this->Users_Model->get_users();
		$this->data['branch']=$this->Admin_Model->get_userbranch();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('admin/user_profile', $this->data);
	}
	public function deleteuser(){
	sleep(1);		
		if(!empty($this->input->post('del'))){
			$userpic=$this->Users_Model->get_userpicdetails(trim($this->input->post('del')));
			//print_r($userpic);
				if(!empty($userpic->avatar))
				{
					unlink('./assets/user-profile-img/'.$userpic->avatar);
					$del=$this->Users_Model->delete_data('avatar',array('fid'=>$userpic->avatar_id));
				}
			$del=$this->Users_Model->delete_data('user',array('id' =>trim($this->input->post('del'))));
			if($del){				
				$del=$this->Users_Model->delete_data('user_data',array('id'=>trim($this->input->post('del'))));				
			}
		}
	}
	public function editmodal_users()
	{		
		echo $this->Users_Model->get_single_user($this->input->post('id'));
		//print_r($this->data['usedata']->user_name);
	}

	// public function edit_user(){
	// 	echo "<pre>", print_r($_POST), "</pre>"; exit;
	// 	echo "<pre>", print_r($_FILES), "</pre>"; exit;
	// 	if($this->input->post('save')){
	// 		$data= $this->input->post('edit_user_email');
	// 		$status = "";
	// 		$msg = "";			
	// 	if(!empty($_FILES['file']['name'])){
	// 		$config['upload_path'] = './assets/user-profile-img/';
	//         $config['allowed_types'] = 'gif|jpg|png|doc|txt';
	//         $config['max_size'] = 1024 * 8;
	//         $config['encrypt_name'] = TRUE;
	//         $config['file_name'] = $_FILES['file']['name'];

	//         $this->load->library('upload',$config);
	//         $this->upload->initialize($config); 
	//        	if($this->upload->do_upload('file')){
	//             $uploadData = $this->upload->data();
	//             //print_r($uploadData);                   
	//              $picture = $uploadData['file_name'];
	//              //print_r($picture);
	// 				$img_arr=array(
	// 					"file_name" => $uploadData['file_name'],
	// 					"file_type" => $uploadData['file_type'],
	// 					"file_path" => $uploadData['file_path'],
	// 					"full_path" => $uploadData['full_path'],
	// 					"raw_name" => $uploadData['raw_name'],
	// 					"orig_name" => $uploadData['orig_name'],
	// 					"client_name" => $uploadData['client_name'],
	// 					"file_ext" => $uploadData['file_ext'],
	// 					"file_size" => $uploadData['file_size'],
	// 					"is_image" => $uploadData['is_image'],
	// 					"image_width" => $uploadData['image_width'],
	// 					"image_height" => $uploadData['image_height'],
	// 					"image_type" => $uploadData['image_type'],
	// 					"image_size_str" => $uploadData['image_size_str'],
	// 				);
	// 				$record=$this->Users_Model->insertRow('avatar', $img_arr);						
	// 				$ainsert_id = $record;
	// 				$result = $this->Users_Model->get_role($this->input->post('userrole'));				
	// 				$post=array(			   
	// 				   "is_admin" =>$this->input->post('userrole'),
	// 				   "user_name" =>strtolower($this->input->post('user_name')),
	// 				   "branch_id" =>trim($this->input->post('userbranch')),
	// 				   "type" =>$result->name,						 
	// 				   "branch_id"=>$this->input->post('userbranch'),
	// 				   "u_email" =>$this->input->post('user_email'),
	// 				   "password" =>password_hash($this->input->post('user_pass'), PASSWORD_DEFAULT),
	// 				   "first_name" =>$this->input->post('user_name'),
	// 				   "is_active" =>$this->input->post('status'),
	// 				   "created_at"=>date('Y-m-d H:i:s'),
	// 				   "modified_at"=>date('Y-m-d H:i:s'),
	// 				   "avatar" =>$picture,
	// 				   "avatar_id" =>$ainsert_id,
	// 				   "deleted" =>0,			   
	// 		     	);
	// 				$urecord=$this->Users_Model->insertRow('user', $post);							
	// 				if($urecord){
	// 					$urecord=$this->Users_Model->insertRow('user_data',array('user_id'=>$urecord));
	// 					echo  1;
	// 				}else{
	// 					echo 0;
	// 				}
	//         }else{
	//             $picture = '';		     	
	//         }
	//         }else{
	// 			$picture = '';
	// 			$result = $this->Users_Model->get_role($this->input->post('userrole'));
	// 			$post=array(			   
	// 				"is_admin" =>$this->input->post('userrole'),
	// 				"user_name" =>strtolower($this->input->post('user_name')),
	// 				"type" =>$result->name,
	// 				"branch_id" =>trim($this->input->post('userbranch')),
	// 				"u_email" =>$this->input->post('user_email'),
	// 				"password" =>password_hash($this->input->post('user_pass'), PASSWORD_DEFAULT),
	// 				"first_name" =>$this->input->post('user_name'),
	// 				"is_active" =>$this->input->post('status'),
	// 				"created_at"=>date('Y-m-d H:i:s'),
	// 				"modified_at"=>date('Y-m-d H:i:s'),
	// 				"avatar" =>"",
	// 				"avatar_id" =>"",
	// 				"deleted" =>0,
	// 			);	            
	// 			$urecord=$this->Users_Model->insertRow('user', $post); 
	// 			if($urecord){
	// 				echo 1;
	// 			}else{
	// 				echo 0;
	// 			}
	//         }				
			
	// 	}
	// 	exit;
	// }

	# Edit user
	public function edit_user()
	{
		if($this->input->post('save'))
		{
			$data = $this->input->post('edit_user_email');

			if(empty($this->input->post('user_pass'))) {
				$post = [
					"user_name" =>strtolower($this->input->post('edit_user_name')),
					"u_email" =>$this->input->post('edit_user_email'),
					"first_name" =>$this->input->post('edit_user_name'),
					"branch_id" =>$this->input->post('edit_userbranch'),
					"exploitent" =>$this->input->post('edit_exploitent'),
					"entities" =>$this->input->post('edit_entities'),
					"department" =>$this->input->post('edit_department'),
					"codeAgenceAtlas" =>$this->input->post('edit_codeAgenceAtlas'),
					"target_loan_count" => $this->input->post('target_loan_count'),
					"target_loan_amount" => $this->input->post('target_loan_amount'),
					"is_active"  => $this->input->post('edit_status'),
				];
			} else {
				$post = [
					"user_name" =>strtolower($this->input->post('edit_user_name')),
					"first_name" =>$this->input->post('edit_user_name'),
					"u_email" =>$this->input->post('edit_user_email'),
					"branch_id" =>$this->input->post('edit_userbranch'),
					"password" =>password_hash($this->input->post('user_pass'), PASSWORD_DEFAULT),
					"exploitent" =>$this->input->post('edit_exploitent'),
					"entities" =>$this->input->post('edit_entities'),
					"department" =>$this->input->post('edit_department'),
					"codeAgenceAtlas" =>$this->input->post('edit_codeAgenceAtlas'),
					"target_loan_count" => $this->input->post('target_loan_count'),
					"target_loan_amount" => $this->input->post('target_loan_amount'),
					"is_active"  => $this->input->post('edit_status'),
				];
			}
			$updateRecord = $this->Users_Model->updateRow('user', 'id', $this->input->post('editid'), $post);
			if($updateRecord){
				echo 1;exit;
				echo "<pre>", print_r("successfully Updated!"), "</pre>";exit;
			}else{
				echo 0;exit;
				echo "<pre>", print_r("Failed To Update"), "</pre>";exit;
			}
		}
		exit;
	}

}