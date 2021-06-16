<?php 

class Auth_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->db->dbprefix;
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function check_email($email) {		
		if($email) {
			$query=$this->db->select('*')
			->from('user')
			->where('u_email', $email)
			->where('is_admin',1)		
			->get();
			$result = $query->num_rows();
			//echo $this->db->last_query();
			return ($result == 1) ? true : false;
		}
		return false;
	}

	/* 
		This function checks if the email and password matches with the database
	*/
	public function login() {

		//print_r($_POST); exit;
		//echo $this->db->dbprefix; exit;
		$email = $this->input->post('u_email');
		$password = $this->input->post('password');
		if($email && $password) {
			$sql = "SELECT * FROM ".$this->db->dbprefix."user WHERE is_admin= ? AND u_email = ?";			
			$query = $this->db->query($sql, array(1, $email));
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
					//echo $result;	
					return false;
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
		//echo $this->db->last_query(); exit;
		return $query->result();
  	}
  	/**
      * This function is used to Update record in table  
      */
  	public function updateRow($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}


	function ResetPpassword(){
	//print_r($_POST); exit;
		$email = $this->input->post('u_email');
		$npass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			$data['password'] = $npass;			
			return $this->db->update('user',$data, "u_email = '$email'");
		
	}







}