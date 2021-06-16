<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Employer_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
			
		date_default_timezone_set('Asia/Kolkata');
	}




	

	public function get_all_employers()
	{
		$this->db->select('e.emp_id,e.employer_name,sec.secteurs,sous_sec.secteurs as sous_secteur,cat.catrgory,l.limit_name');
		$this->db->from('tbl_employers as e');
		$this->db->join('tbl_target_list_companies as sec','sec.tlc_id = e.secteur_id','inner');
		$this->db->join('tbl_category_of_employers as cat','cat.cat_id = e.category_id','inner');
		$this->db->join('tbl_sous_secteurs as sous_sec','sous_sec.sid = e.sous_secteur_id','left');
		$this->db->join('tbl_limits as l','l.limit_id = e.limit_id','inner');
		$this->db->where('e.deleted',"0");
		$result =  $this->db->get()->result_array();

		//echo $this->db->last_query();

		// die;

		 return $result;

	}

	public function get_employer_details($emp_id)
	{
		$record =  $this->db->get_where('tbl_employers',array('emp_id'=>$emp_id))->row_array();

		return json_encode($record);
	}

	public function check_employer($data,$id){

		if($id  == "")
		{
			$qry  =  $this->db->get_where('tbl_employers',array('employer_name'=>$data,'deleted' => "0"))->result_array();

			return ($qry) ? "exists" : "not_exists";
			
		}
		else
		{
			$qry  =  $this->db->get_where('tbl_employers',array('employer_name'=>$data,'emp_id !=' => $id,'deleted' => "0"))->result_array();

			//echo $this->db->last_query();

			return ($qry) ? "exists" : "not_exists";
		}
	}

	
	
}