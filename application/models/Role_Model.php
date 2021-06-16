<?php 

class Role_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();		
		date_default_timezone_set('Africa/Johannesburg');
	}

	public function get_record() {
			$query=$this->db->select('*')
			->from('role')
			// ->where('deleted', 0)		
			->get();
			// return $this->db->last_query();
			return $query->result_array();
		
		//return false;
	}

	public function get_activated_record(){
			$query=$this->db->select('*')
			->from('role')
			->where('deleted', 0)		
			->get();
			// return $this->db->last_query();
			return $query->result_array();
	}

	// New Update : 23-04-2020
	public function get_all_roles()
	{
		$this->db->order_by('id','desc');
		$this->db->where('id !=',1);
		return $result = $this->db->get("tbl_role")->result_array();

	}

	public function get_role_details($id)
	{
		$result = $this->db->get_where('tbl_role',array('id' => $id))->row_array();
		return json_encode($result); 
	}

	public function check_role($data,$id) {		
		if($id  == "")
		{
			$qry  =  $this->db->get_where('tbl_role',array('name'=>$data))->result_array();

			return ($qry) ? "exists" : "not_exists";
			
		}
		else
		{
			$qry  =  $this->db->get_where('tbl_role',array('name'=>$data,'id !=' => $id))->result_array();

			//echo $this->db->last_query();

			return ($qry) ? "exists" : "not_exists";
		}
	}

	public function delete_role($id)
	{
		$check_user  =  $this->db->get_where('tbl_user',array('is_admin' => $id))->result_array();
		$check_assigned  =  $this->db->get_where('tbl_assignroles',array('role_id' => $id))->result_array();

		if(!empty($check_user) || !empty($check_assigned) )
		{
			echo '2';
		}
		else
		{
			$data = array('deleted' => 1);
			$this->db->where('id',$id);
			$this->db->update('tbl_role', $data);
			// echo $this->db->delete('tbl_role');
		}
	}
	

	public function get_permissions() {
			$query=$this->db->select('*')
			->from('tbl_role_permissions')
			// ->where('deleted', 0)		
			->get();
			// return $this->db->last_query();
			return $query->result_array();
		
		//return false;
	}
	public function get_role_permissions_of_id($id){

		$query=$this->db->select('*')
			->from('tbl_role')
			->where('id', $id)		
			->get();
			// return $this->db->last_query();
			return $query->result_array();

	}

	
}