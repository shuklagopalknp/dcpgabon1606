<?php

// New Update : 01-05-2020

// Usage : This Model maintains all settings in the application
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Inactive_loan_model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
		$this->load->model('Customer_Model');
		$this->load->model('Business_Customer_Model');
		$this->load->model('Setting_Model');
		$this->load->model('Email_Sms_Template_Model');
	}
			public function get_inactive_loans_fetes()
	{
		$user_data =  $this->Common_model->get_user_details($this->session->userdata('id'));
		$role_id  =  $this->session->userdata('role');
		
		$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,g.customer_type,g.final_status,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg');
		$this->db->from('tbl_credit_conso_applicationloan as g');
		
		$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
		$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','left');
		
		if($role_id=='2'){
			$this->db->where('g.user_id',$this->session->userdata('id'));
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		if($role_id == '3')
		{
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		

    	$this->db->where('g.status','0');
    	$this->db->order_by('g.loan_id','desc');
    	
		$result =  $this->db->get()->result_array();
	
		return $result ;
	}
	
				public function get_inactive_loans_conges()
	{
		$user_data =  $this->Common_model->get_user_details($this->session->userdata('id'));
		$role_id  =  $this->session->userdata('role');
		
		$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,g.customer_type,g.final_status,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg');
		$this->db->from('tbl_credit_scolair_applicationloan as g');
		
		$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
		$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','left');
		
		if($role_id=='2'){
			$this->db->where('g.user_id',$this->session->userdata('id'));
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		if($role_id == '3')
		{
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		

    	$this->db->where('g.status','0');
    	$this->db->order_by('g.loan_id','desc');
    	
		$result =  $this->db->get()->result_array();
	
		return $result ;
	}
	
				public function get_inactive_loans_credit()
	{
		$user_data =  $this->Common_model->get_user_details($this->session->userdata('id'));
		$role_id  =  $this->session->userdata('role');
		
		$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,g.customer_type,g.final_status,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg');
		$this->db->from('tbl_credit_confort_applicationloan as g');
		
		$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
		$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','left');
		
		if($role_id=='2'){
			$this->db->where('g.user_id',$this->session->userdata('id'));
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		if($role_id == '3')
		{
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		

    	$this->db->where('g.status','0');
    	$this->db->order_by('g.loan_id','desc');
    	
		$result =  $this->db->get()->result_array();
	
		return $result ;
	}
}