<?php

// New Update : 01-05-2020

// Usage : This Model maintains all settings in the application
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Setting_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
		date_default_timezone_set('Asia/Kolkata');
	}

	public function get_all_roles()
	{
		return $result =  $this->db->get_where('tbl_role',array('deleted' => '0','id !=' => '1'))->result_array();
	}

	/*------------------- Start manage business tabs--------------------*/

	public function get_all_business_main_tabs()
	{
		return  $result  = $this->db->get('tbl_business_main_tabs')->result_array();

	}

	public function get_details_product_type($product_type)
	{
		return $result  = $this->db->get_where('tbl_details_tabs_business_products',array('product_type' => $product_type))->result_array();
	}

	public function get_saved_product_tab($tabs)
	{

		$tab_arr  =  explode(',',$tabs);
		$this->db->where_in('bussiness_tab_id',$tab_arr);
		$this->db->order_by('tab_order');
		$result  = $this->db->get('tbl_details_tabs_business_products')->result_array();

		return $result;
	}

		public function get_saved_product_tab_consumer($tabs)
	{

		$tab_arr  =  explode(',',$tabs);
		$this->db->where_in('bussiness_tab_id',$tab_arr);
		$this->db->order_by('tab_order');
		$result  = $this->db->get('tbl_details_tabs_consumer_products')->result_array();

		return $result;
	}
	
	/*------------------- End manage business tabs--------------------*/

	/*------------------- Start manage business tabs--------------------*/
	// document type : system_docs,checklist_docs,risk_analysis_docs 


	public function get_business_docs($product_type,$sub_product_type,$document_type){

		$this->db->order_by('document_order');
		$result  =  $this->db->get_where('tbl_document_system',array("product_type" => $product_type,"sub_product_type"=>$sub_product_type ,"document_type" => $document_type ))->result_array();

		//echo $this->db->last_query();

		return $result;

	}


	/*------------------- End manage business tabs--------------------*/

	//New Update : 25-05-2020

	/*------------------- Start manage workflow ------------------*/

	public function check_workflow($data,$id){

		if($id == ''){
			$result =  $this->db->get_where('tbl_workflow',array('workflow_name'=> $data['workflow_name'],'deleted'=> "0"))->row_array();

			return $result;
		}
		else
		{
			$result =  $this->db->get_where('tbl_workflow',array('workflow_name'=> $data['workflow_name'],'workflow_id != '=> $id,'deleted' => "0"))->row_array();

			return $result;
		}
	}

	public function get_all_workflow(){
		return $result  = $this->db->get_where('tbl_workflow',array('deleted'=> '0'))->result_array();
	}

	public function get_single_workflow_details($id){
		return $result  = $this->db->get_where('tbl_workflow',array('workflow_id'=> $id ))->row_array();	
	}

	/*------------------- End manage workflow--------------------*/

	/*------------------- Consumer Tabs ----------------------*/

	public function get_all_consumer_main_tabs()
	{
		return  $result  = $this->db->get('tbl_business_main_tabs')->result_array();

	}
	public function get_details_product_type_consumer($product_type)
	{
		return $result  = $this->db->get_where('tbl_details_tabs_consumer_products',array('product_type' => $product_type))->result_array();
	}
	/*-------------------- End Consumer Tab -------------------*/

	/*------------------- Start manage customer tabs--------------------*/
	// document type : system_docs,checklist_docs,risk_analysis_docs 


	public function get_customer_docs($product_type,$sub_product_type,$document_type){

		$this->db->order_by('document_order');
		$result  =  $this->db->get_where('tbl_document_system',array("product_type" => $product_type,"document_type" => $document_type ))->result_array();

		//echo $this->db->last_query();

		return $result;

	}


	/*------------------- End manage customer tabs--------------------*/
	
	
}