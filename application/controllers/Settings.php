<?php 
// New Update : 01-05-2020

// Usage : This controller maintains all settings in the application

defined('BASEPATH') OR exit('No direct script access aloowed');

class Settings extends Admin_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->not_logged_in();
		$this->data['title'] = 'DCP | Settings';	
		
		$this->load->helper('lang_translate');    	
    	$this->load->model('Common_model');
    	$this->load->model('Setting_Model');
    	$this->load->model('Role_Model'); 
    	$this->load->model('Group_Model');

    	if($this->session->userdata('role') != "1")
    	{
    		redirect('Auth/logout');
    	}
	}



	
	/*------------------- Start manage business tabs--------------------*/
	public function business_tabs(){
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['business_tabs'] = $this->Setting_Model->get_all_business_main_tabs();
		$this->data['page'] = 'Business_Tabs';

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('settings/business_tabs', $this->data);
	}

	public function save_business_tabs()
	{
		$edit_id =  $this->input->post('edit_id');
		$custom_tabs_name =  $this->input->post('custom_name');
		$status  =  $this->input->post('status');
		$order =  $this->input->post('order');
		$product_type =  $this->input->post('product_type');
		$main_tabs = $this->Setting_Model->get_all_business_main_tabs(); 

		$check_record =  $this->Setting_Model->get_details_product_type($product_type); 

		$res =  array();

		if(empty($check_record))
		{
			foreach($main_tabs as $key=>$row){
				$data_arr =  array(
								'tab_orginial_id' => $row['tab_id'],
								'tab_customize_name'=>$custom_tabs_name[$key],
								'status' => $status[$key],
								'tab_order' => $order[$key],
								'product_type'=>$product_type
				);

				if($this->Common_model->insertRow("tbl_details_tabs_business_products",$data_arr))
				{
					$res[] =  $key;
				}


				
			}

			if(!empty($res))
			{
				echo "success";
			}
			else
			{
				echo "error";
			}


		}
		else
		{
			foreach($check_record as $key=>$row){
				$data_arr =  array(
								'tab_orginial_id' => $main_tabs[$key]['tab_id'],
								'tab_customize_name'=>$custom_tabs_name[$key],
								'status' => $status[$key],
								'tab_order' => $order[$key],
								'product_type'=>$product_type
				);

				if($this->Common_model->updateRow("tbl_details_tabs_business_products",'bussiness_tab_id',$row['bussiness_tab_id'],$data_arr))
				{
					$res[] =  $key;
				}


				
			}

			if(!empty($res))
			{
				echo "success";
			}
			else
			{
				echo "error";
			}
		}

	}

	public function get_details_product_type()
	{
		$product_type =  $this->input->post('product_type');

		$response  =  $this->Setting_Model->get_details_product_type($product_type);

		echo json_encode($response);
	}

	/*------------------- End manage business tabs--------------------*/

	
	/*------------------- Start manage business document system --------------------*/

	public function get_sub_product_type()
	{
		$product_type =  $this->input->post('product_type');

		$option  = "<option value=''>Select</option>";
		if($product_type ==  "gage_espece")
		{
           $option .= "<option value='1'>PP Gage Espece Personne Physique</option>";
           $option .= "<option value='2'>PP Gage Espece Ets & Assimiles</option>";
           $option .= "<option value='3'>PP Gage Espece Societe Commerciale</option>";

		}

		if($product_type ==  "escompte")
		{
           $option .= "<option value='1'>Escompte Ste Commerciales</option>";
           $option .= "<option value='2'>Escompte Ets & Assimiles</option>";
          
		}

		echo $option;
	}




	public function business_product_documents()
	{

		$this->data['page'] = 'Business_Documents';
		if($_POST)
		{
			$product_type =  $this->input->post('product_type');
			if($this->input->post('sub_product_type'))
			{
				$sub_product_type = $this->input->post('sub_product_type');
			}
			else{

				$sub_product_type = NULL;
			} 

			if($product_type ==  "gage_espece")
			{
				$this->data['sub_prod_details'] =  array(
										'1' => "PP Gage Espece Personne Physique",
										'2' => "PP Gage Espece Ets & Assimiles",
										'3' => "PP Gage Espece Societe Commerciale"
				);
			}
			else if($product_type ==  "escompte")
			{
				$this->data['sub_prod_details'] =  array(
										'1' => "Escompte Ste Commerciales",
										'2' => "Escompte Ets & Assimiles"
				);
			}

			
		  	$this->data['system_docs'] = $this->Setting_Model->get_business_docs($product_type,$sub_product_type,'system_docs');
		  	$this->data['checklist_docs'] = $this->Setting_Model->get_business_docs($product_type,$sub_product_type,'checklist_docs');
		  	$this->data['risk_analysis_docs'] = $this->Setting_Model->get_business_docs($product_type,$sub_product_type,'risk_analysis_docs');

		  	// print_r($this->data);
		  	// die;

		}
		
		$this->data['record'] = $this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('settings/business_pp_document', $this->data);
	}


	public function save_business_docs()
	{
		$doc_id =  $this->input->post('doc_id');
		$status =  $this->input->post('status');
		$order =  $this->input->post('order');

		foreach($doc_id as $key=>$did)
		{
			$result  =  array(
							'document_status' => $status[$key],
							'document_order' => $order[$key],
			);

			$this->Common_model->updateRow("tbl_document_system",'document_id',$did,$result);
		}

		$this->session->set_flashdata("flash_message","Settings Saved Successfully");

		redirect("Settings/business_product_documents");

	}


	/*------------------- End manage business document system --------------------*/


	/*---------------------------- Start manage workflow -------------------------*/



	public function workflow()
	{
		$this->data['page'] = 'Workflow';
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['workflow'] = $this->Setting_Model->get_all_workflow();

		// print_r($this->data['workflow']);
		// die;

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('settings/workflow', $this->data);
	}

	public function manage_workflow($param='',$param1='')
	{
		$this->data['page'] = 'Workflow';
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['roles'] = $this->Setting_Model->get_all_roles();
		$this->data['groups'] = $this->Group_Model->get_all_groups();

		if($param =="edit")	
		{
			$this->data['param'] =  strtoupper($param);
			$this->data['param1'] =  $param1;
			$this->data['details'] =  $this->Setting_Model->get_single_workflow_details($param1);
		}
		else
		{
			$this->data['param'] =  'ADD';
		}

		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('settings/manage_workflow', $this->data);
	}

	public function save_workflow(){

		$post_data  =  array(
						'workflow_name' => $this->input->post('workflow_name'),
						'type' =>  $this->input->post('product_type'),
						'min_amount' => $this->input->post('min_amount'),
						'max_amount' => $this->input->post('max_amount'),
						'role_ids' => implode(',',$this->input->post('role_id')),
						'status' => implode(',',$this->input->post('status')),
						'workflow_order' => implode(',',$this->input->post('order')),
						'assigned_cic_grp_id' => $this->input->post('cic_group'),
						'min_cic_approvals' => $this->input->post('min_cic_approvals')

		);

		//print_r($post_data);

		$edit_id = $this->input->post('edit_id');
		
		if(!$edit_id)
		{
			$check_record = $this->Setting_Model->check_workflow($post_data,'');
			if(empty($check_record))
			{
			echo ($this->Common_model->insertRow('tbl_workflow',$post_data))? "success" : "error";
			}
			else
			{
				echo "already_exists";
			}
		}
		else
		{
			$check_record = $this->Setting_Model->check_workflow($post_data,$edit_id);
			if(empty($check_record))
			{
			echo ($this->Common_model->updateRow('tbl_workflow','workflow_id',$edit_id,$post_data))? "success" : "error";
			}
			else
			{
				echo "already_exists";
			}
		}

	}

	public function delete_workflow(){
		$id = $this->input->post('id');

		$where = array('deleted'=>'1');

		echo ($this->Common_model->updateRow('tbl_workflow','workflow_id',$id,$where)) ? "success" : "error";

	}
	/*--------------------------- End manage workflow -------------------------*/

	/*------------------- Start manage Customer tabs--------------------*/

	public function consumer_tabs(){

		$this->data['record'] = $this->Common_model->get_admin_details();

		$this->data['customer_tabs'] = $this->Setting_Model->get_all_consumer_main_tabs();

		$this->data['page'] = 'Consumer_tabs';



		$user_id = $this->session->userdata('id');

		$is_admin = ($user_id == 1) ? true :false;

		$this->data['is_admin'] = $is_admin;

		$this->render_template('settings/consumer_tabs', $this->data);

	}

		public function get_details_product_type_consumer()

	{

		$product_type =  $this->input->post('product_type');



		$response  =  $this->Setting_Model->get_details_product_type_consumer($product_type);



		echo json_encode($response);

	}

		public function save_customer_tabs()
	{

		$edit_id =  $this->input->post('edit_id');
		$custom_tabs_name =  $this->input->post('custom_name');
		$status  =  $this->input->post('status');
		$order =  $this->input->post('order');
		$product_type =  $this->input->post('product_type');
		$main_tabs = $this->Setting_Model->get_all_business_main_tabs(); 
		$check_record =  $this->Setting_Model->get_details_product_type_consumer($product_type); 
		$res =  array();
		
		if(empty($check_record))
		{
			foreach($main_tabs as $key=>$row){
				$data_arr =  array(
								'tab_orginial_id' => $row['tab_id'],
								'tab_customize_name'=>$custom_tabs_name[$key],
								'status' => $status[$key],
								'tab_order' => $order[$key],
								'product_type'=>$product_type

				);
				if($this->Common_model->insertRow("tbl_details_tabs_consumer_products",$data_arr))
				{
					$res[] =  $key;
				}

			}
			if(!empty($res))
			{
				echo "success";
			}
			else
			{echo "error";}
		}
		else
		{
			
			foreach($check_record as $key=>$row){
				$data_arr =  array(
								'tab_orginial_id' => $main_tabs[$key]['tab_id'],
								'tab_customize_name'=>$custom_tabs_name[$key],
								'status' => $status[$key],
								'tab_order' => $order[$key],
								'product_type'=>$product_type
				);
				if($this->Common_model->updateRow("tbl_details_tabs_consumer_products",'bussiness_tab_id',$row['bussiness_tab_id'],$data_arr))
				{
					$res[] =  $key;
				}

			}

			if(!empty($res))

			{echo "success";	}
			else
			{echo "error";}
		}
	}


		/*------------------- Start manage customer document system --------------------*/


	public function customer_product_documents()
	{

		$this->data['page'] = 'Customer_Documents';
		if($_POST)
		{
			$product_type =  $this->input->post('product_type');
			
			$sub_product_type='';
			
		  	$this->data['system_docs'] = $this->Setting_Model->get_customer_docs($product_type,$sub_product_type,'system_docs');
		  	$this->data['checklist_docs'] = $this->Setting_Model->get_customer_docs($product_type,$sub_product_type,'checklist_docs');
		  	$this->data['risk_analysis_docs'] = $this->Setting_Model->get_customer_docs($product_type,$sub_product_type,'risk_analysis_docs');

		}
		
		$this->data['record'] = $this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template('settings/customer_pp_document', $this->data);
	}


	public function save_customer_docs()
	{
		$doc_id =  $this->input->post('doc_id');
		$status =  $this->input->post('status');
		$order =  $this->input->post('order');

		foreach($doc_id as $key=>$did)
		{
			$result  =  array(
							'document_status' => $status[$key],
							'document_order' => $order[$key],
			);

			$this->Common_model->updateRow("tbl_document_system",'document_id',$did,$result);
		}

		$this->session->set_flashdata("flash_message","Settings Saved Successfully");

		redirect("Settings/customer_product_documents");

	}


	/*------------------- End manage customer document system --------------------*/

	/*---------------------------Start manage commission -------------------------*/

	public function commission(){
		$this->data['page'] = 'Commission';

		$this->data['record'] = $this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 1) ? true :false;
		$this->data['is_admin'] = $is_admin;

		$this->data['comm_data'] =  $this->Common_model->getRecord('tbl_commission');

		$this->render_template('settings/manage_commission', $this->data);

	}

	public function save_commission(){

		$post_data  =  array(
							'pce_commission' => $this->input->post('pce_commission'),
							'exploitation_commission' => $this->input->post('ex_commission')
						);

		$edit_id =  $this->input->post('edit_id');

		if($this->Common_model->updateRow('tbl_commission','id',$edit_id,$post_data))
		{
			$this->session->set_flashdata('flash_message',"Commission Saved Successfully");
		}

		redirect('Settings/commission');

	}

	/*---------------------------End manage commission ---------------------------*/
	
}