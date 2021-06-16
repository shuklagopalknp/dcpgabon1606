<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Business_Customer_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
			
		date_default_timezone_set('Asia/Kolkata');
	}


	

	public function get_all_bussiness_customers()
	{
		$this->db->select('cust.customer_id,cust.company_name,tbl_branch.branch_name,sec.secteurs,cust.account_no,cust.created_at');
		$this->db->from('tbl_business_customer as cust');
                $this->db->join('tbl_branch','tbl_branch.bid = cust.branch');
		$this->db->join('tbl_target_list_companies as sec','sec.tlc_id = cust.sector_id ','inner');
		$this->db->where('cust.deleted',"0");

		$record  =  $this->db->get()->result_array();

		return $record;
	}

	public function get_business_customer_details($customer_id)
	{

		$this->db->select('tbl_business_customer.*,tbl_branch.bid,tbl_branch.branch_name');
		$this->db->join('tbl_branch','tbl_branch.bid = tbl_business_customer.branch ');
        $record =  $this->db->get_where('tbl_business_customer',array('customer_id'=>$customer_id))->result_array();

       // echo $this->db->last_query();
        return $record;
	
	}

	public function get_business_officer_details($customer_id)
	{
		return $record =  $this->db->get_where('tbl_business_customer_officer',array('business_customer_id'=>$customer_id))->result_array();
	}

	public function check_columnheader($header_data){

		$status =  true;
		$incorrect_names = array();

		if(trim(strtolower($header_data[1]['A'])) != "numero du compte"){
			$incorrect_names[] = $header_data[1]['A'];
		}
		if(trim(strtolower($header_data[1]['B'])) != "agence"){
			$incorrect_names[] = $header_data[1]['B'];
		}

		if(trim(strtolower($header_data[1]['C'])) != "raison sociale"){
		
			$incorrect_names[] = $header_data[1]['C'];
		}
		if(trim(strtolower($header_data[1]['D'])) != "forme juridique"){

			$incorrect_names[] = $header_data[1]['D'];
		}
		if(trim(strtolower($header_data[1]['E'])) != "adresse"){

			$incorrect_names[] = $header_data[1]['E'];
		}
		if(trim(strtolower($header_data[1]['F'])) != "principal gerant"){

			$incorrect_names[] = $header_data[1]['F'];
		}
		if(trim(strtolower($header_data[1]['G'])) != "capital"){

			$incorrect_names[] = $header_data[1]['G'];
		}
		if(trim(strtolower($header_data[1]['H'])) != "numero d immatriculation rccm"){

			$incorrect_names[] = $header_data[1]['H'];
		}
		if(trim(strtolower($header_data[1]['I'])) != "secteur d activite"){

			$incorrect_names[] = $header_data[1]['I'];
		}
		if(trim(strtolower($header_data[1]['J'])) != "date ouverture compte"){

			$incorrect_names[] = $header_data[1]['J'];
		}
		if(trim(strtolower($header_data[1]['K'])) != "montant des engagements"){

			$incorrect_names[] = $header_data[1]['K'];
		}
		if(trim(strtolower($header_data[1]['L'])) != "solde du compte courant"){

			$incorrect_names[] = $header_data[1]['L'];
		}
		if(trim(strtolower($header_data[1]['M'])) != "solde"){

			$incorrect_names[] = $header_data[1]['M'];
		}
		if(trim(strtolower($header_data[1]['N'])) != "montant des impayes"){

			$incorrect_names[] = $header_data[1]['N'];
		}
		if(trim(strtolower($header_data[1]['O'])) != "nombre des impayes"){

			$incorrect_names[] = $header_data[1]['O'];
		}
		if(trim(strtolower($header_data[1]['P'])) != "officer"){

			$incorrect_names[] = $header_data[1]['P'];
		}
		if(trim(strtolower($header_data[1]['Q'])) != "position"){

			$incorrect_names[] = $header_data[1]['Q'];
		}
		if(trim(strtolower($header_data[1]['R'])) != "age"){

			$incorrect_names[] = $header_data[1]['R'];
		}
		if(trim(strtolower($header_data[1]['S'])) != "experience"){

			$incorrect_names[] = $header_data[1]['S'];
		}

		if(!empty($incorrect_names)){

		 	$message['status'] = false;
		 	$message['fields'] =  implode(',',$incorrect_names);  
			return $message;
		}
		else{
			$message['status'] = true;
			return $message;
		}
	}
	
}