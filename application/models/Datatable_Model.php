<?php 

class Datatable_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->db->dbprefix;
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function get_all_table()
	{
		$tab=array();
		$tables=$this->db->query("SELECT t.TABLE_NAME AS myTables FROM INFORMATION_SCHEMA.TABLES AS t WHERE t.TABLE_SCHEMA = 'dcp_db'");
		//->result_array();
		//echo  $this->db->last_query();    
		 return $tables->result_array();
		 /*foreach($tables as $key => $val) {
		      $tab[]=$val['myTables'];
		 }
		return $tab;*/
	}







}