<?php /** 
 * Short description for file    
 * Filename    Cic_Loans_Model.php
 * @author     <CK Informatics Pvt Ltd>  
 * @copyright  1997-2019 The PHP Group
 * @version    CodeIgniter V 3.1.4
 * Purpose	   This controller is the default controller which is used to display the loginpage.
Check the Userlogins
 **/
/*
This model is the default model which is used to display the loginpage.
Check the Userlogins 
*/ 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Cic_Loans_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();		
		date_default_timezone_set('Asia/Kolkata');
	}
	public function get_Allcustomarloan()
	{
	}

	public function countRow_LoansApplied()
	{
		$this->db->from('customar_applicationform');
    	$this->db->where('cic_status !=', 'Initiated');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
	}
	public function countRow_LoansApproved()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('final_confirmation', 'Disbursement');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
	}

	public function countRow_LoansRejected()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('cic_status', 'Avis défavorable');
    	//$query=$this->db->get();
    	//echo  $this->db->last_query(); exit;
    	return $num_rows = $this->db->count_all_results();
    	
	}
	public function countRow_LoansPending()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('cic_status', 'Process');
    	$this->db->or_where('cic_status', 'Avis Favorable');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
	}
	public function countRow_Totalamount()
	{
    	$this->db->select_sum('loan_amt');
		$this->db->from('tbl_customar_applicationform');
		$this->db->where('cic_status !=', 'Initiated');
		$query=$this->db->get();
		//echo  $this->db->last_query(); exit;
		return $query->row()->loan_amt;
	}

	public function LatestApplications()
	{
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype, c.account_number, at.databinding, pi.first_name as clientfirstname, pi.middle_name as clientmiddlename,pi.last_name as clientlastname')
			->from('customar_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')
			->where('a.deleted', 0)
			->where('a.loan_type', 2)
			->where('a.cic_status !=','Initiated')
			->order_by("a.modified desc")
			->limit(5)
			->get();			
			return $query->result_array();
	}

	public function Processfeed()
	{
		$query=$this->db->select('t.id as tid, t.comment, t.created,t.cl_aid, t.loan_type, u.type, t.admin_id, u.is_admin,u.avatar, r.field_data,')
			->from('tracking_timeline  t')	
			->join('user u','t.admin_id = u.id','inner')
			->join('role r','r.id =u.is_admin','left')		
			->where('t.loan_type',2)			
			->order_by("t.created desc")
			->limit(4)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	
	public function get_loanType() {
			$query=$this->db->select('lid, loan_type')
			->from('loan_of_type')
			->where('status', 1)
			->where('section', 1)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
		//return false;
	}
	public function get_taxType()
	{
		$query=$this->db->select('*')
			->from('loan_of_taxes')
			->where('status', 1)			
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_All_fees()
	{
		$query=$this->db->select('fees')
			->from('loan_of_fees')
			->where('status', 1)			
			->get();
			$ret = $query->row();
			return $ret->fees;
			
	}

	public function get_Allapplication_form_consumer($bid=null)
	{
		$minvalue='100';		 
		$maxvalue='25000001';
		$query=$this->db->select(
			'a.*,
			 u.first_name,
			 u.branch_id,
			 b.branch_name,
			 l.loan_type as ltype,
			 c.account_number,
			 at.databinding,
			 pi.first_name as clientfirstname,
			 pi.middle_name as clientmiddlename,
			 pi.last_name as clientlastname')
			->from('consumer_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('branch b','b.bid = u.branch_id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('consumer_amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')		
			->where('a.deleted',0)
			->where('a.loan_type',1)			
			->where('a.cic_status !=','Initiated')			
			//->where('u.branch_id',$bid)
			->where('a.loan_amt BETWEEN "'.$minvalue. '" and "'.$maxvalue.'"')
			->order_by("a.modified desc")
			->get();
			//echo $this->db->last_query();						
			return $query->result_array();
	}

	public function get_Allapplication_form($bid)
	{
		$minvalue='100';		 
		$maxvalue='10000000';
			$query="SELECT `a`.*, `u`.`first_name`, `u`.`branch_id`, `l`.`loan_type` as `ltype` FROM `tbl_consumer_loans_applicationform` `a` INNER JOIN `tbl_user` `u` ON `a`.`admin_id` = `u`.`id` LEFT JOIN `tbl_loan_of_type` `l` ON `a`.`loan_type` = `l`.`lid` WHERE `a`.`deleted` = 0 AND `a`.`loan_type` = 2 AND `u`.`branch_id` ='".$bid."' AND a.branchmanager_status='Approbation' AND a.loan_amt BETWEEN ".$minvalue." AND ".$maxvalue."";			
		/* $query=$this->db->select('a.*, u.first_name,u.branch_id,l.loan_type as ltype')
			->from('consumer_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')			
			->where('a.deleted', 0)
			->where('a.loan_type', 1)
			->where('u.branch_id',$bid)
			->get(); */
			$query= $this->db->query($query);	
			//echo $this->db->last_query();			
			return $query->result_array();
	}
	//---------Customar Details Section
	public function get_customar_details($id,$bid){
		$query=$this->db->select('a.*, u.first_name,u.branch_id, l.loan_type as ltype,t.tax_type,t.tax_rate, at.*')
			->from('consumer_loans_applicationform  a')
			->join('user u','a.admin_id = u.id','inner')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
			->where('a.deleted', 0)
			->where('u.branch_id',$bid)
			->where('a.cl_aid', $id)
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}
	
	public function get_Allapplication_form_credit_scholar($bid)
	{
		$minvalue='100';		 
		$maxvalue='25000000';
			$query="SELECT `a`.*,
			`u`.`first_name`,
			`u`.`branch_id`,
			`b`.`branch_name`,
			`l`.`loan_type` as `ltype`,
			`c`.`account_number`,
			`at`.`databinding`,
			`pi`.`first_name` as `clientfirstname`,
			`pi`.`middle_name` as `clientmiddlename`,
			`pi`.`last_name` as `clientlastname`
			FROM `tbl_customar_applicationform` `a` 
			INNER JOIN `tbl_user` `u` ON `a`.`admin_id` = `u`.`id` 
			INNER JOIN `tbl_branch` `b` ON `b`.`bid` = `u`.`branch_id` 
			LEFT JOIN `tbl_loan_of_type` `l` ON `a`.`loan_type` = `l`.`lid`
			LEFT JOIN `tbl_customers` `c` ON `a`.`customar_id` = `c`.`cid` 
			LEFT JOIN `tbl_amortization` `at` ON `a`.`amortization_id` = `at`.`id`
			LEFT JOIN `tbl_customer_personalinformation` `pi` ON `a`.`customar_id` = `pi`.`customar_id`
			WHERE `a`.`deleted` ='0'
			AND	`a`.`loan_type` ='2' 
			AND (`a`.`branchmanager_status`='Avis Favorable' OR `a`.`branchmanager_status`='Confirm Disbursement')
			AND `a`.`cic_status` !='Initiated' 
			AND	`a`.`loan_amt` BETWEEN ".$minvalue." AND ".$maxvalue."
			ORDER BY a.modified desc ";			
			
			$query= $this->db->query($query);
			//echo $this->db->last_query();			
			return $query->result_array();
	}
	
	public function get_customar_details_credit_scholar($id){		
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype,t.tax_type,t.tax_rate, at.*')
			->from('customar_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
			->where('a.deleted', 0)			
			->where('a.cap_id', $id)						
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}
	public function get_customar_details_consumerloan($id){		
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype,t.tax_type,t.tax_rate, at.*')
			->from('consumer_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('consumer_amortization at','a.amortization_id = at.id','left')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
			->where('a.deleted', 0)			
			->where('a.cl_aid', $id)
			->where('a.loan_type', 1)						
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	

	public function checkloanstatuslist($params){
	//print_r($params); exit;
		$minvalue='100000';		 
		$maxvalue='10000000';
	if($params!="All"){
			$this->db->select('a.*,
				u.first_name,
				u.branch_id,
				b.branch_name,
				l.loan_type as ltype,
				c.account_number,
				at.databinding,
				pi.first_name as clientfirstname,
				pi.middle_name as clientmiddlename,
				pi.last_name as clientlastname')
			->from('customar_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('tbl_branch b','b.bid = u.branch_id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')
			->where('a.deleted', 0)
			->where('loan_amt BETWEEN "'. $minvalue. '" and "'. $maxvalue.'"')
			->where('a.loan_type', 2);
			if($params != '') {
				$this->db->like('a.cic_status', $params);
			}
  			$this->db->order_by('a.cap_id', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_new_application_form();
		}
	}

	public function get_new_application_form()
	{
		$minvalue='100000';		 
		$maxvalue='10000000';
			$query="SELECT `a`.*, `u`.`first_name`, `u`.`branch_id`, `l`.`loan_type` as `ltype`, `c`.`account_number` , `at`.`databinding`, `pi`.`first_name` as `clientfirstname`, `pi`.`middle_name` as `clientmiddlename`, `pi`.`last_name` as `clientlastname`
			FROM `tbl_customar_applicationform` `a` 
			INNER JOIN `tbl_user` `u` ON `a`.`admin_id` = `u`.`id` 
			LEFT JOIN `tbl_loan_of_type` `l` ON `a`.`loan_type` = `l`.`lid`
			LEFT JOIN `tbl_customers` `c` ON `a`.`customar_id` = `c`.`cid`
			LEFT JOIN `tbl_amortization` `at` ON `a`.`amortization_id` = `at`.`id` 
			LEFT JOIN `tbl_customer_personalinformation` `pi` ON `a`.`customar_id` = `pi`.`customar_id` 
			WHERE `a`.`deleted` = 0 AND `a`.`loan_type` ='2' AND `a`.`cic_status` !='Initiated'
			AND `a`.`loan_amt` BETWEEN ".$minvalue." AND ".$maxvalue." ORDER BY `a`.`modified` DESC";			
			$query= $this->db->query($query);
			//echo $this->db->last_query();			
			return $query->result_array();
	}


	/*Consumer Loan Filtering*/
	public function filterConsumerloan($params, $bid){
		//print_r($params); exit;
		if($params!="All"){
			$this->db->select(
				'a.*,
				u.first_name,
				 u.branch_id,
				b.branch_name,
				l.loan_type as ltype,
				c.account_number,
				at.databinding,
				pi.first_name as clientfirstname,
				pi.middle_name as clientmiddlename,
				pi.last_name as clientlastname')
			->from('consumer_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('tbl_branch b','b.bid = u.branch_id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('consumer_amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')
			->where('a.deleted', 0)
			->where('a.loan_type', 1);
			if($params != '') {
				$this->db->like('a.cic_status', $params);				
  			}
  			$this->db->order_by('a.cl_aid', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_Allapplication_form_consumer($bid);
		}
	}


/*======================================================
=======================Decovert Loan==================
######################################################*/

	public function get_Allapplication_form_Decovert($bid=null)
	{
		
		$query=$this->db->select(
			'a.*,
			 u.first_name,
			 u.branch_id,
			 l.loan_type as ltype,
			 c.account_number,
			 b.branch_name,
			 pi.first_name as clientfirstname,
			 pi.middle_name as clientmiddlename,
			 pi.last_name as clientlastname')
			->from('decovert_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('branch b','b.bid = u.branch_id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customer_id = c.cid','left')			
			->join('customer_personalinformation pi','pi.customar_id = a.customer_id','left')		
			->where('a.deleted',0)
			->where('a.loan_type',3)
			->where('a.branchmanager_status','Avis Favorable')
			->or_where('a.loan_status','Confirm Disbursement')
			->where('a.cic_status !=','Initiated')				
			->order_by("a.modified desc")
			->get();
			//echo $this->db->last_query();						
			return $query->result_array();
		}

	public function filterDecovertloan($params, $bid){
		//print_r($params); exit;
		if($params!="All"){
			$this->db->select(
				'a.*,
				u.first_name,
				b.branch_name,
				l.loan_type as ltype,
				c.account_number,				
				pi.first_name as clientfirstname,
				pi.middle_name as clientmiddlename,
				pi.last_name as clientlastname')
			->from('decovert_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('branch b','b.bid = u.branch_id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customer_id = c.cid','left')			
			->join('customer_personalinformation pi','pi.customar_id = a.customer_id','left')
			->where('a.deleted', 0)
			->where('a.loan_type', 3);
			if($params != '') {
				$this->db->like('a.cic_status', $params);				
  			}
  			$this->db->order_by('a.did', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_Allapplication_form_Decovert();
		}
	}


	public function get_decovert_application_form()
	{
		$minvalue='100000';		 
		$maxvalue='10000000';
			$query="SELECT `a`.*, `u`.`first_name`, `u`.`branch_id`, `l`.`loan_type` as `ltype`, `c`.`account_number` ,`pi`.`first_name` as `clientfirstname`, `pi`.`middle_name` as `clientmiddlename`, `pi`.`last_name` as `clientlastname`
			FROM `tbl_decovert_applicationform` `a` 
			INNER JOIN `tbl_user` `u` ON `a`.`admin_id` = `u`.`id` 
			LEFT JOIN `tbl_loan_of_type` `l` ON `a`.`loan_type` = `l`.`lid`
			LEFT JOIN `tbl_customers` `c` ON `a`.`customer_id` = `c`.`cid`			
			LEFT JOIN `tbl_customer_personalinformation` `pi` ON `a`.`customer_id` = `pi`.`customar_id` 
			WHERE `a`.`deleted` = 0 AND `a`.`loan_type` ='3' AND `a`.`cic_status` !='Initiated'
			AND `a`.`requested_overdraft` BETWEEN ".$minvalue." AND ".$maxvalue." ORDER BY `a`.`modified` DESC";			
			$query= $this->db->query($query);
			//echo $this->db->last_query();			
			return $query->result_array();
	}

	/*consumer Load*/
	public function get_customar_details_Decovert($id){		
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype')
			->from('decovert_applicationform a')
			->join('user u','a.admin_id = u.id','inner')			
			->join('loan_of_type l','a.loan_type = l.lid','left')			
			->where('a.loan_type', 3)						
			->where('a.deleted', 0)			
			->where('a.did', $id)						
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}




	public function get_pInformation($cid){
		$query=$this->db->select('*')
		->from('customer_personalinformation')
		->where('customar_id', $cid)
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}
	public function get_adInformation($cid){
		$query=$this->db->select('*')
		->from('customer_additionalinformation')
		->where('customar_id', $cid)
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}
	public function get_empInformation($cid){
		$query=$this->db->select('emp.*, tl.secteurs as SecteursN, ct.catrgory as catname, cn.contract_type as ctype ')
		->from('customar_employment_information as emp')
		->join('target_list_companies tl','tl.tlc_id =emp.secteurs_id','left')	
		->join('category_of_employers ct','ct.cat_id =emp.cat_emp_id','left')	
		->join('type_of_contract cn','cn.tc_id =emp.contract_type_id','left')		
		->where('emp.customar_id', $cid)
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}
	public function get_adrsInformation($cid){
		$query=$this->db->select('*')
		->from('customer_address')
		->where('customar_id', $cid)
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}
	public function get_bnkInformation($cid){
		$query=$this->db->select('*')
		->from('customar_bank_account')
		->where('customar_id', $cid)
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}
	public function get_oInformation($cid){
		$query=$this->db->select('*')
		->from('customar_other_information')
		->where('customar_id', $cid)
		->get();
	//	echo  $this->db->last_query();
		return $query->result_array();
	}

	/*======================================================
=======================CAUTIONS SCOLARE Loan===========+
#######################################################*/

	public function get_caution_scolare_Loans()
	{		
		$query=$this->db->select(
		'a.*,
		 u.first_name,
		 u.branch_id,
		 b.branch_name,
		 l.loan_type as ltype,
		 c.account_number,			
		 pi.first_name as clientfirstname,
		 pi.middle_name as clientmiddlename,
		 pi.last_name as clientlastname')
		->from('caution_scolaire_loans_applicationform a')
		->join('user u','a.admin_id = u.id','inner')
		->join('tbl_branch b','b.bid = u.branch_id','inner')
		->join('loan_of_type l','a.loan_type = l.lid','left')
		->join('customers c','a.customar_id = c.cid','left')			
		->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')	
		->where('a.deleted', 0)
		->where('a.loan_type',4)
		->where('a.cic_status !=', 'Initiated')			
		->order_by("a.modified desc")
		->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/*Consumer Loan Filtering*/
	public function filter_Caution_Scolare_loan($params){
		//print_r($params); exit;
		if($params!="All"){
			$this->db->select(
				'a.*,
				u.first_name,
				u.branch_id,
				b.branch_name,
				l.loan_type as ltype,
				c.account_number,				
				pi.first_name as clientfirstname,
				pi.middle_name as clientmiddlename,
				pi.last_name as clientlastname')
			->from('caution_scolaire_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('branch b','b.bid = u.branch_id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')			
			->join('customer_personalinformation pi','pi.customar_id=a.customar_id','left')
			->where('a.deleted', 0)
			->where('a.cic_status !=','Initiated')			
			->where('a.loan_type', 4);
			if($params != '') {
				$this->db->like('a.cic_status', $params);				
  			}
  			$this->db->order_by('a.cl_aid', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_caution_scolare_Loans();
		}
	}

	/*consumer Load*/
	public function get_customar_details_caution_scolare($id){		
		$query=$this->db->select('
			a.*,
			u.first_name,
			u.branch_id,
			b.branch_name,
			l.loan_type as ltype
			')
			->from('caution_scolaire_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')	
			->join('branch b','b.bid = u.branch_id','inner')		
			->join('loan_of_type l','a.loan_type = l.lid','left')			
			->where('a.loan_type', 4)						
			->where('a.deleted', 0)			
			->where('a.cl_aid', $id)						
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	
	
	

	
}