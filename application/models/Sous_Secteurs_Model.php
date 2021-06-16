<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Sous_Secteurs_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
			
		date_default_timezone_set('Asia/Kolkata');
	}


	

	public function get_all_sous_secteurs()
	{

		$this->db->order_by('sid','desc');
		$record =$this->db->get_where('tbl_sous_secteurs',array("deleted"=>"0"))->result_array();

		$result = array();
        foreach($record as $key=>$row)
        {
        	$secteurs =  $this->db->get_where('tbl_target_list_companies',array('tlc_id' => $row['parent_secteurid']))->row_array();

        	$result[$key]['sid'] =  $row['sid'];
        	$result[$key]['secteurs'] =  $row['secteurs'];

			if(!empty($secteurs))
        	{
        		$result[$key]['parent_secteurid'] = $secteurs['secteurs'];
        	}
        	else 
        	{
        		$result[$key]['parent_secteurid'] = "";
        	}

        	$result[$key]['created'] =  $row['created'];

        }

        return $result;

	}

	public function get_sous_secteur_details($sous_id)
	{
		$record =  $this->db->get_where('tbl_sous_secteurs',array('sid'=>$sous_id))->row_array();

		return json_encode($record);
	}


	public function get_sous_secteur_by_secteur($secteur_id)
	{
		$result =  $this->db->get_where('tbl_sous_secteurs',array('parent_secteurid' => $secteur_id,'deleted' => "0"))->result_array();

		$option = '';
		if(!empty($result))
		{
			$option .= "<option value=''>Select</option>";
			foreach($result as $row)
			{
				$option .= "<option value='".$row['sid']."'>".$row['secteurs']."</oprion>";
			}
		}
		else
		{
			$option .= "<option value=''>Select</option>";
		}

		return $option;
	}

	public function check_sous_secteur($data,$id){

		if($id  == "")
		{
			$qry  =  $this->db->get_where('tbl_sous_secteurs',array('secteurs'=>$data['secteurs'],'parent_secteurid'=>$data['parent_secteurid'],'deleted' => "0"))->result_array();

			return ($qry) ? "exists" : "not_exists";
			
		}
		else
		{
			$qry  =  $this->db->get_where('tbl_sous_secteurs',array('secteurs'=>$data['secteurs'],'parent_secteurid'=>$data['parent_secteurid'],'deleted' => "0",'sid !=' => $id))->result_array();

			//echo $this->db->last_query();

			return ($qry) ? "exists" : "not_exists";
		}
	}

	public function delete_sous_secteur($sous_id)
	{
		
		$check_empdel =  $this->db->get_where('tbl_employers',array('sous_secteur_id' => $sous_id))->result_array();

		if(!empty($check_empdel))
		{
			echo '2';
		}
		else
		{
			$data =  array('deleted'=> "1");
			echo $this->Common_model->updateRow('tbl_sous_secteurs','sid',$sous_id,$data);
		}
	}
	
}