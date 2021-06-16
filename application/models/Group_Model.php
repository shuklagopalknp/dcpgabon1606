<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Group_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');		
		date_default_timezone_set('Asia/Kolkata');
	}
	

	public function get_all_groups()
	{
		$this->db->order_by('group_id','desc');
		return $record  =  $this->db->get_where('tbl_groups',array('deleted' =>  "0"))->result_array();
	}

	public function get_group_details($group_id)
	{
		$record =  $this->db->get_where('tbl_groups',array('group_id'=>$group_id))->row_array();

		return json_encode($record);
	}

	public function check_group($param,$param1){

		if($param1  == "")
		{
			$qry  =  $this->db->get_where('tbl_groups',array('group_name'=>$param))->result_array();

			return ($qry) ? "exists" : "not_exists";
			
		}
		else
		{
			$qry  =  $this->db->get_where('tbl_groups',array('group_name'=>$param,'group_id !=' => $param1))->result_array();

			return ($qry) ? "exists" : "not_exists";
		}
	}

	public function save_assignees($role_ids,$group_id)
	{

		$saved_role_id =  $this->db->get_where('tbl_assignroles',array('group_id' => $group_id ))->result_array();


		if(!empty($saved_role_id))
		{
			foreach($saved_role_id as $srow)
			{
				$saved_id_arr[] =  $srow['role_id'];
			}
	
		
			$remaning_arr = array_diff($saved_id_arr, $role_ids);

			//print_r($remaning_arr);


			foreach($remaning_arr as $row1)
			{
				$this->db->where('group_id',$group_id);
				$this->db->where('role_id',$row1);
				$this->db->delete('tbl_assignroles');
			} 
		}


		

		foreach($role_ids as $row)
		{
			$value_arr =  array(
							'role_id' => $row,
							'group_id' => $group_id 
			);

			$check_role  =  $this->db->get_where('tbl_assignroles',array('group_id' => $group_id , 'role_id' => $row ))->result_array();

			if(!empty($check_role))
			{
				$this->Common_model->updateRow('tbl_assignroles','assign_id',$check_role[0]['assign_id'],$value_arr);
			}
			else
			{
				$this->Common_model->insertRow('tbl_assignroles',$value_arr);
			}

		}

		return true;
	}


	public function get_assigned_roles_bygroups($group_id)
	{
		
		$this->db->where('group_id',$group_id);
		$result  =  $this->db->get('tbl_assignroles')->result_array();

 		foreach($result as $row)
 		{
 			$ids_arr[] =  $row['role_id'];
 		}

 		return $ids_arr;
	
	}
	
}