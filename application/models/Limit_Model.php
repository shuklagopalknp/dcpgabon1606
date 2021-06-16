<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Limit_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
			
		date_default_timezone_set('Asia/Kolkata');
	}


	

	public function get_all_limites()
	{
		$this->db->order_by('limit_id','desc');
		return $result  =  $this->db->get_where('tbl_limits',array('deleted' => "0"))->result_array();

	}

	public function get_limit_details($limit_id)
	{
		$record =  $this->db->get_where('tbl_limits',array('limit_id'=>$limit_id))->row_array();

		return json_encode($record);
	}

	public function check_limit($limit,$id){

		if($id  == "")
		{
			$qry  =  $this->db->get_where('tbl_limits',array('limit_name'=>$limit,'deleted' => "0"))->result_array();
			//echo $this->db->last_query();

			return ($qry) ? "exists" : "not_exists";
			
		}
		else
		{
			$qry  =  $this->db->get_where('tbl_limits',array('limit_name'=>$limit,'deleted' => "0",'limit_id !=' => $id))->result_array();

			//echo $this->db->last_query();

			return ($qry) ? "exists" : "not_exists";
		}
	}

	public function delete_limit($limit_id)
	{
		$check_empdel =  $this->db->get_where('tbl_employers',array('limit_id' => $limit_id))->result_array();

		if(!empty($check_empdel) || !empty($check_sousdel))
		{
			echo '2';
		}
		else
		{
			$data =  array('deleted'=> "1");
			echo $this->Common_model->updateRow('tbl_limits','limit_id',$limit_id,$data);
		}
	}
	
}