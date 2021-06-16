<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Chef_Lieu_Department_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');		
		date_default_timezone_set('Asia/Kolkata');
	}
	

	public function get_all_departments()
	{
		$this->db->select('d.department_id,d.region_id,r.region_name,d.department_name,d.department_description,d.created_at');
		$this->db->from('tbl_target_commune_department as d');
		$this->db->join('tbl_target_commune_region as r','r.region_id=d.region_id','inner');
		$this->db->order_by('d.department_id','desc');
		return $record =$this->db->get()->result_array();

	
	}

	public function get_department_details($department_id)
	{
		$record =  $this->db->get_where('tbl_target_commune_department',array('department_id'=>$department_id))->row_array();

		return json_encode($record);
	}

	public function check_department($data,$id){

		if($id  == "")
		{
			$qry  =  $this->db->get_where('tbl_target_commune_department',array('department_name'=>$data['department_name'],'region_id'=>$data['region_id']))->result_array();

			return ($qry) ? "exists" : "not_exists";
			
		}
		else
		{
			$qry  =  $this->db->get_where('tbl_target_commune_department',array('department_name'=>$data['department_name'],'region_id'=>$data['region_id'],'department_id !=' => $id))->result_array();

			return ($qry) ? "exists" : "not_exists";
		}
	}

	public function get_department_by_region($region_id)
	{
       $result  =  $this->db->get_where('tbl_target_commune_department',array('region_id' => $region_id))->result_array();
       $option  ='';

       if(!empty($result))
       {
       		$option .= "<option value=''>Select</option>";
       		foreach($result as $row)
	       {
	       	 $option .= "<option value='".$row['department_id']."'>".$row['department_name']."</option>";
	       }
       }
       else
       {
       	   $option .= "<option value=''>Select</option>";
       }

       return $option;
       
	}
	
}