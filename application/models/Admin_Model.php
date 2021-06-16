<?php 
class Admin_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->db->dbprefix;
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

		return true;
  	}
  	/**
      * This function is used to delete record from table
      * @param : $id record id which you want to delete
      */
	public function delete_data($table=null, $field=null) {		
		$this->db->where($field, $this->input->post('id'));
    	$this->db->delete($table);
    	return true;
	}

	/**
      * This function is used to Branch search name
    */
    public function check_branchName($name)
	{
		if($name) {
			$query=$this->db->select('*')
			->from('branch')
			->where('branch_name',$name)
			->where('deleted',0)		
			->get();
			//echo $this->db->last_query();exit;
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}
		return false;
	}

	public function get_userbranch() {
			$query=$this->db->select('*')
			->from('branch')
			->where('deleted', 0)		
			->get();
			return $query->result_array();
		
		//return false;
	}

	public function get_branch_details($branch_id){
		
		return $result  = $this->db->get_where('tbl_branch',array('bid' => $branch_id))->row_array();
	}

	/**
      * This function is used to Branch Section page
    */
	public function get_All_branch()
	{
			$query=$this->db->select('*')
			->from('branch')
			->where('deleted', 0)
			->where('admin_id', 1)
			->order_by("bid", "desc")
			->get();
			//echo  $this->db->last_query();	
			return $query->result_array();
	}
	public function get_select_branch()	
	{
		$qry=$this->db->select('*')
			->from('branch')
			->where('bid',$this->input->post('id'))			
			->get();
		return json_encode($qry->result_array());
	}
	
	public function get_reng_credit_scholar($id)
	{
		$query=$this->db->select('*')
			->from('loan_range')
			->where('lid',$id)				
			->get();
			//echo $this->db->last_query();exit;
			return $result = $query->num_rows();
			
	}

	public function get_range(){
		$query=$this->db->select('*')
			->from('loan_range')			
			->where('lid', 2)	
			-> limit(1)		
			->get();
			//echo  $this->db->last_query();	
			return $query->result_array();
	}
	public function get_range_consumer_loan()
	{
		$query=$this->db->select('*')
			->from('loan_range')			
			->where('lid', 1)	
			-> limit(1)		
			->get();
			//echo  $this->db->last_query();	
			return $query->result_array();
	}

	// New update : 2-04-2020

	public function get_all_companies()
	{
		$result  =  $this->db->get_where('tbl_target_companies')->result_array();
		return $result;
	}

	public function get_select_company()	
	{
		$qry=$this->db->select('*')
			->from('tbl_target_companies')
			->where('company_id',$this->input->post('id'))			
			->get();
		return json_encode($qry->result_array());
	}

}