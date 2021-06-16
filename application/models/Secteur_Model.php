<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Secteur_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
			
		date_default_timezone_set('Asia/Kolkata');
	}


	

	public function get_all_secteurs()
	{

		$this->db->order_by('tlc_id','desc');
		return $record =$this->db->get_where('tbl_target_list_companies',array('deleted'=>"0"))->result_array();

	
	}

	public function get_secteur_details($secteur_id)
	{
		$record =  $this->db->get_where('tbl_target_list_companies',array('tlc_id'=>$secteur_id))->row_array();

		return json_encode($record);
	}

	public function check_secteur($data,$id){

		if($id  == "")
		{
			$qry  =  $this->db->get_where('tbl_target_list_companies',array('secteurs'=>$data,'deleted'=>"0"))->result_array();

			return ($qry) ? "exists" : "not_exists";
			
		}
		else
		{
			$qry  =  $this->db->get_where('tbl_target_list_companies',array('secteurs'=>$data,'deleted'=>"0",'tlc_id !=' => $id))->result_array();

			//echo $this->db->last_query();

			return ($qry) ? "exists" : "not_exists";
		}
	}

	public function delete_secteur($sec_id)
	{
		$check_sousdel  =  $this->db->get_where('tbl_sous_secteurs',array('parent_secteurid' => $sec_id))->result_array();

		$check_empdel =  $this->db->get_where('tbl_employers',array('secteur_id' => $sec_id))->result_array();

		if(!empty($check_empdel) || !empty($check_sousdel))
		{
			echo '2';
		}
		else
		{
			$data =  array('deleted'=> "1");
			echo $this->Common_model->updateRow('tbl_target_list_companies','tlc_id',$sec_id,$data);
		}
	}
	
}