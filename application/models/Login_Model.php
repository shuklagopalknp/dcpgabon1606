<?php 

class Login_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->db->dbprefix;
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function admin_check_email($email) {		
		if($email) {
			$query=$this->db->select('*')
			->from('user')
			->where('u_email', $email)
			->where('is_admin!=',1)		
			->get();
			//echo $this->db->last_query();exit;
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}
		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/
	public function superAdminLogin() {
		$email = $this->input->post('u_email');
		$password = $this->input->post('password');
		if($email && $password) {
			$query=$this->db->select('*')
			->from('user')
			->where('is_admin !=',1)			
			->where('u_email',$email)
			->where('deleted',0)
			->where('is_active',1)
			//->or_where('is_active',1)
			-> limit(1)
			->get();

			//$sql = "SELECT * FROM ".$this->db->dbprefix."user WHERE is_admin= ? AND u_email = ?";			
			//$query = $this->db->query($sql, array(1, $email));
			//print_r($this->db->last_query());  exit;				
			if($query->num_rows() == 1) {
				$result = $query->row_array();
				$hash_password = password_verify($this->input->post('password'), $result['password']);			
				if($hash_password === true) {
					//echo "true data";
					return $result;	
				}
				else {
					//echo "false data";
					return false;	
					//return false;
				}			
			}
			else {
				return false;
			}
		}
	}
	/**
      * This function is used to select data form table  
      */
	function get_data_by($tableName='', $value='', $colum='',$condition='') {	
		if((!empty($value)) && (!empty($colum))) { 
			$this->db->where($colum, $value);
		}
		$this->db->select('*');
		$this->db->from($tableName);
		$query = $this->db->get();
		return $query->result();
  	}
  	/**
      * This function is used to Update record in table  
      */
  	public function updateRow($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		//echo $this->db->last_query();
		return true;
  	}


	function ResetPpassword(){
	//print_r($_POST); exit;
		$email = $this->input->post('u_email');
		$npass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$data['password'] = $npass;			
			return $this->db->update('user',$data, "u_email = '$email'");
		
	}

	public function get_userdatainfo($tableName='', $where_array='')
	{
		
		$query = $this->db->get_where($tableName,$where_array);
		//echo $this->db->last_query(); //exit;
		return $query->result();
	}
	
	public function getBranch($id){
        $this->db->select('g.branch_name');
		$this->db->from('tbl_branch as g');
		
		$this->db->where('g.bid',$id);
    	$result =  $this->db->get()->result_array();
	
		return $result[0]['branch_name'] ;

	}
	
	public function active_check($email) {		
		if($email) {
			$query=$this->db->select('*')
			->from('user')
			->where('u_email', $email)
			->where('is_active',0)		
			->get();
			//echo $this->db->last_query();exit;
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}
		return false;
	}







}