<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class EmployeeCategory_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
			
		date_default_timezone_set('Asia/Kolkata');
	}

	public function get_all_categories()
	{
		$this->db->order_by('cat_id','desc');
		return $result  =  $this->db->get_where('tbl_category_of_employers',array('deleted' => "0"))->result_array();
	}

	public function get_category_details($category_id)
	{
		$record =  $this->db->get_where('tbl_category_of_employers',array('cat_id'=>$category_id))->row_array();

		return json_encode($record);
	}

	public function check_category($category,$id){

		if($id  == "")
		{
			$qry  =  $this->db->get_where('tbl_category_of_employers',array('catrgory'=>$category,'deleted' => "0"))->result_array();
			//echo $this->db->last_query();

			return ($qry) ? "exists" : "not_exists";
			
		}
		else
		{
			$qry  =  $this->db->get_where('tbl_category_of_employers',array('catrgory'=>$category,'deleted' => "0",'cat_id !=' => $id))->result_array();

			//echo $this->db->last_query();

			return ($qry) ? "exists" : "not_exists";
		}
	}

	public function delete_category($cat_id)
	{
		$check_empdel =  $this->db->get_where('tbl_employers',array('category_id' => $cat_id))->result_array();

		if(!empty($check_empdel))
		{
			echo '2';
		}
		else
		{
			$data =  array('deleted'=> "1");
			echo $this->Common_model->updateRow('tbl_category_of_employers','cat_id',$cat_id,$data);
		}
	}
	
}