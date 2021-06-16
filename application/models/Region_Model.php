<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Region_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');		
		date_default_timezone_set('Asia/Kolkata');
	}
	

	public function get_all_regions()
	{
		$this->db->order_by('region_id','desc');
		return $record  =  $this->db->get('tbl_target_commune_region')->result_array();
	}

	public function get_region_details($region_id)
	{
		$record =  $this->db->get_where('tbl_target_commune_region',array('region_id'=>$region_id))->row_array();

		return json_encode($record);
	}

	public function check_region($param,$param1){

		if($param1  == "")
		{
			$qry  =  $this->db->get_where('tbl_target_commune_region',array('region_name'=>$param))->result_array();

			return ($qry) ? "exists" : "not_exists";
			
		}
		else
		{
			$qry  =  $this->db->get_where('tbl_target_commune_region',array('region_name'=>$param,'region_id !=' => $param1))->result_array();

			return ($qry) ? "exists" : "not_exists";
		}
	}

	
	
}