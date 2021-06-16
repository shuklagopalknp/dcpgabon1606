<?php 
class Users_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->db->dbprefix;
		$this->load->database();	
		$this->load->library('upload');
		date_default_timezone_set('Africa/Johannesburg');
	}

	public function get_users()
	{
		$query=$this->db->select('u.id as uid,u.*,r.*')
		->from('user as u')
		->join('role as r','u.is_admin = r.id','inner')
		->where('u.is_admin !=',1)
		->where('u.deleted',0)
		->group_by('u.id') 
		//->order_by("u.id desc")
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}

	public function check_field()
	{		
		$data= $this->input->post('user_email');
		if($data) {
			$query=$this->db->select('*')
			->from('user')
			->where('u_email',$data)
			->where('deleted',0)
			->where('is_active',1)
			//->or_where('is_active',1)
			-> limit(1)
			->get();
			//echo  $this->db->last_query();
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}
		return false;
	}

	public function get_role($id)
	{
		if($id) {
			$query=$this->db->select('*')
			->from('role')
			->where('id', $id)
			-> limit(1)
			->get();
			//echo  $this->db->last_query();
			return $result = $query->row();				
		}
		return false;
	}


	/**
      * This function is used to delete record from table
      * @param : $id record id which you want to delete
      */
	public function delete_data($table, $array='') {
		$this->db->where($array);
    	$this->db->delete($table);
		$this->db->query('ALTER TABLE tbl_'.$table.' AUTO_INCREMENT 1');
    	//echo $this->db->last_query();	
	}

		public function disable_data($table, $array='') {
		$data = array('deleted' => 1);
			$this->db->where($array);
			$this->db->update($table, $data);
		
	}

	/**
      * This function is used to Insert Record in table
      * @param : $table - table name in which you want to insert record 
      * @param : $data - record array 
      */
	public function insertRow($table, $data){

	  	$this->db->insert($table, $data);
	  	return $this->db->last_query();
	  	  // $this->db->insert_id();
	}

	/**
      * This function is used to Update Record in table
      * @param : $table - table name in which you want to update record 
      * @param : $col - field name for where clause 
      * @param : $colVal - field value for where clause 
      * @param : $data - updated array 
      */
  	public function updateRow($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		return true;
  	}
	public function get_userpicdetails($uid) {
  		$query=$this->db->select('id,avatar_id,avatar')
			->from('user')
			->where('id',$uid)			
			-> limit(1)
			->get();
			//echo  $this->db->last_query();
			return $result = $query->row();	
  	}

  	public function get_single_user($id){
  		$query=$this->db->select('u.*, b.branch_name')
			->from('user as u')
			->join('branch b','u.branch_id=b.bid','left')
			->where('u.id',$id)			
			-> limit(1)
			->get();
			//echo  $this->db->last_query();exit;
			return json_encode($query->row());	
  	}
	

}