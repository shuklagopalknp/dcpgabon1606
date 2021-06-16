<?php 

class Common_model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();		
		date_default_timezone_set('Africa/Johannesburg');
	}




	/**
      * This function is used to Insert Record in table
      * @param : $table - table name in which you want to insert record 
      * @param : $data - record array 
      */
	public function insertRow($table, $data){
	  	$this->db->insert($table, $data);
		//echo $this->db->last_query();	
	  	return  $this->db->insert_id();
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
		//echo $this->db->last_query();			
		return true;
  	}

  	/**
      * This function is used to delete record from table
      * @param : $id record id which you want to delete
      */
	public function delete_data($table, $array='') {
		$this->db->where($array);
    	$this->db->delete($table);
    	echo $this->db->last_query();	
	}

	public function get_user_details($user_id){

		return $result = $this->db->get_where('tbl_user',array('id' => $user_id))->row_array();
	}

	public function get_user_branch($user_id){

		$udata = $this->get_user_details($user_id);

		return $branch_data  =  $this->db->get_where('tbl_branch',array('bid' => $udata['branch_id'] ))->row_array();

	}

	public function get_all_nationalities()
	{
		return $result =  $this->db->get('tbl_country_nationality')->result_array();
	}



	/* 
		This function checks if the email exists in the database
	*/
	public function get_admin_details($num=null) {
		//echo "<pre>", print_r($this->session->userdata('role'),1),"</pre>";exit;		
		if($this->session->userdata('role')==2 || $this->session->userdata('role')==3 || $this->session->userdata('role')==13){
			$query=$this->db->select('u.*, b.bid, b.branch_name')
			->from('user as u')
			->join('branch b','u.branch_id = b.bid','inner')
			->where('u.id', $this->session->userdata('id'))
			->where('u.deleted', 0)
			->where('u.is_admin', $this->session->userdata('role'));
			$result = $this->db->get()->result();
		}else{
			$query=$this->db->select('u.*')
			->from('user as u')
			//->join('branch b','u.branch_id = b.bid','inner')
			->where('u.id', $this->session->userdata('id'))
			->where('u.deleted', 0)
			->where('u.is_admin', $this->session->userdata('role'));
			$result = $this->db->get()->result();
		}
			//echo  $this->db->last_query();
			return $result;	
	}
	
	
	/**
	 * Get Loan Type Details
	 *
	 * @param	array	$params
	 * 
	 * @return 	array
	 */
	public function get_loanTypeDetails($params) 
	{
		# Initialize an array
		$result = [];

		# Query builder
    $this->db->select('*')->from('tbl_loan_of_type');

    # id
    if( isset($params['id']) && strlen($params['id']) > 0) $this->db->where('lid', $params['id']);

    # loan_type
    if( isset($params['loan_type']) && strlen($params['loan_type']) > 0) $this->db->where('loan_type', $params['loan_type']);

    # status
    if( isset($params['status']) && strlen($params['status']) > 0) $this->db->where('status', $params['status']);

    # result query
    $result = $this->db->get()->result_array();
		
		# Return result
		return $result;
	}
}