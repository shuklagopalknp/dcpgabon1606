<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operating_Director_Loans_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();	
		//date_default_timezone_set('Asia/Kolkata');
		date_default_timezone_set('GMT');
	}
	public function get_Allcustomarloan()
	{
	}

	public function countRow_LoansApplied()
	{
		$this->db->from('customar_applicationform');
    	$this->db->where('operating_director_status !=', 'Initiated');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
    	
	}
	public function countRow_LoansApproved()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('operating_director_status', 'Confirm Disbursement');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
	}

	public function countRow_LoansRejected()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('operating_director_status', 'Avis défavorable');
    	//$query=$this->db->get();
    	//echo  $this->db->last_query(); exit;
    	return $num_rows = $this->db->count_all_results();
    	
	}
	public function countRow_LoansPending()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('operating_director_status', 'Process');
    	//$this->db->or_where('operating_director_status', 'Avis Favorable');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
	}
	public function countRow_Totalamount()
	{
    	$this->db->select_sum('loan_amt');
		$this->db->from('tbl_customar_applicationform');
		$this->db->where('operating_director_status !=', 'Initiated');
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
			->where('a.operating_director_status !=','Initiated')
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
	public function get_Allapplication_form_consumer()
	{
		$minvalue='10000';		 
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
			->where('a.operating_director_status !=','Initiated')			
			//->or_where('a.director_engagements','Avis Favorable')						
			->order_by("a.modified desc")
			->get();
			//echo $this->db->last_query();exit;
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


	
	public function get_Allapplication_form_credit_scholar($bid=null)
	{
		$minvalue='100000';		 
		$maxvalue='10000000';
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
			AND `a`.`loan_type` ='2'
			AND `a`.`operating_director_status` !='Initiated'
			/*AND `a`.`cic_status`='Avis Favorable' OR `a`.`director_engagements`='Avis Favorable'*/ 
			AND `a`.`loan_amt` BETWEEN ".$minvalue." AND ".$maxvalue." 
			ORDER BY a.modified desc";			
			
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

	public function checkloanstatuslist($params){
	//print_r($params); exit;
		$minvalue='100000';		 
		$maxvalue='10000000';
	if($params!="All"){
			$this->db->select('a.*, u.first_name,l.loan_type as ltype, c.account_number, at.databinding, pi.first_name as clientfirstname, pi.middle_name as clientmiddlename,pi.last_name as clientlastname')
			->from('customar_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')
			->where('a.deleted', 0)
			->where('loan_amt BETWEEN "'. $minvalue. '" and "'. $maxvalue.'"')
			->where('a.loan_type', 2);
			if($params != '') {
				$this->db->like('a.operating_director_status', $params);
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
			WHERE `a`.`deleted` = 0 AND `a`.`loan_type` ='2' AND `a`.`operating_director_status` !='Initiated'
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
				l.loan_type as ltype,
				c.account_number,
				at.databinding,
				pi.first_name as clientfirstname,
				pi.middle_name as clientmiddlename,
				pi.last_name as clientlastname')
			->from('consumer_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('consumer_amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')
			->where('a.deleted', 0)
			->where('a.loan_type', 1);
			if($params != '') {
				$this->db->like('a.operating_director_status', $params);				
  			}
  			$this->db->order_by('a.cl_aid', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_Allapplication_form_consumer($bid);
		}
	}
	
	public function get_customar_details_consumer_loan($id){		
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype,t.tax_type,t.tax_rate, at.*')
			->from('consumer_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('consumer_amortization at','a.amortization_id = at.id','left')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
			->where('a.deleted', 0)			
			->where('a.cl_aid', $id)
			->where('a.loan_type',1)			
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}









/*======================================================
=======================Decovert Loan==================
######################################################*/


	public function get_Allapplication_form_Decovert()
	{
		//$minvalue='100';		 
		//$maxvalue='10000000';
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
			->where('a.operating_director_status !=','Initiated')				
			->order_by("a.modified desc")
			->get();
			//echo $this->db->last_query();exit;
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
				$this->db->like('a.operating_director_status', $params);				
  			}
  			$this->db->order_by('a.did', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_Allapplication_form_Decovert();
		}
	}


	
	/*consumer Load*/
	
	public function get_customar_details_Decovert($id){		
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype')
			->from('decovert_applicationform a')
			->join('user u','a.admin_id = u.id','inner')			
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->where('a.deleted', 0)			
			->where('a.did', $id)
			->where('a.loan_type',3)			
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}


	public function get_decovert_application_form()
	{
		$minvalue='100000';		 
		$maxvalue='10000000';
			$query="SELECT `a`.*, `u`.`first_name`, `u`.`branch_id`, `l`.`loan_type` as `ltype`, `c`.`account_number` , `pi`.`first_name` as `clientfirstname`, `pi`.`middle_name` as `clientmiddlename`, `pi`.`last_name` as `clientlastname`
			FROM `tbl_decovert_applicationform` `a` 
			INNER JOIN `tbl_user` `u` ON `a`.`admin_id` = `u`.`id` 
			LEFT JOIN `tbl_loan_of_type` `l` ON `a`.`loan_type` = `l`.`lid`
			LEFT JOIN `tbl_customers` `c` ON `a`.`customer_id` = `c`.`cid`			 
			LEFT JOIN `tbl_customer_personalinformation` `pi` ON `a`.`customer_id` = `pi`.`customar_id` 
			WHERE `a`.`deleted` = 0 AND `a`.`loan_type` ='3' AND `a`.`operating_director_status` !='Initiated'
			AND `a`.`requested_overdraft` BETWEEN ".$minvalue." AND ".$maxvalue." ORDER BY `a`.`modified` DESC";			
			$query= $this->db->query($query);
			//echo $this->db->last_query();			
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
		->where('a.operating_director_status !=', 'Initiated')			
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
			->where('a.operating_director_status !=','Initiated')			
			->where('a.loan_type', 4);
			if($params != '') {
				$this->db->like('a.operating_director_status', $params);				
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

	public function get_credit_conso_loanamount($cpid){
		$query=$this->db->select('*')
			->from('consumer_loans_applicationform')
			->where('cl_aid', $cpid)
			-> limit(1)		
			->get();
			return $query->row();
	}

	public function get_loanamount($cpid){
		$query=$this->db->select('cl_aid,loan_amt')
			->from('caution_scolaire_loans_applicationform')
			->where('cl_aid', $cpid)
			-> limit(1)		
			->get();
			return $query->row();
	}

	public function get_PersonalInformation_cus($id){		
		$query=$this->db->select('a.*,
		 u.first_name,
		 u.branch_id,
		 b.branch_name,
		 l.loan_type as ltype,		
		 cp.pid as cpid,
		 cp.first_name,
		 cp.middle_name,
		 cp.last_name,
		 cp.email as customer_email,		
		 ')
		->from('caution_scolaire_loans_applicationform a')
		->join('user u','a.admin_id = u.id','inner')
		->join('branch b','b.bid = u.branch_id','inner')		
		->join('customer_personalinformation cp','a.customar_id = cp.customar_id','left')	
		->join('loan_of_type l','a.loan_type = l.lid','left')				
		->where('a.deleted', 0)			
		->where('a.cl_aid', $id)						
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}


	public function get_PersonalInformation_customer_consumer_loan($id){		
		$query=$this->db->select('a.*,
		 u.first_name,
		 u.branch_id,
		 b.branch_name,
		 l.loan_type as ltype,		
		 cp.pid as cpid,
		 cp.first_name,
		 cp.middle_name,
		 cp.last_name,
		 cp.email as customer_email,		
		 ')
		->from('consumer_loans_applicationform a')
		->join('user u','a.admin_id = u.id','inner')
		->join('branch b','b.bid = u.branch_id','inner')		
		->join('customer_personalinformation cp','a.customar_id = cp.customar_id','left')	
		->join('loan_of_type l','a.loan_type = l.lid','left')				
		->where('a.deleted', 0)			
		->where('a.cl_aid', $id)						
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}

		/**
      * This function is used to Insert Record in table
      * @param : $table - table name in which you want to insert record 
      * @param : $data - record array 
      */
	public function insertRow($table, $data){
	  	$this->db->insert($table, $data);
	  	//echo  $this->db->last_query();
	  	return  $this->db->insert_id();
	}

	/**
      * This function is used to Update Record in table
      * @param : $table - table name in which you want to update record 
      * @param : $col - field name for where clause 
      * @param : $colVal - field value for where clause 
      * @param : $data - updated array 
      */
  	public function updateRow($table, $col, $colVal, $data) {
  		$this->db->where($col,$colVal);
		$this->db->update($table,$data);
		//echo $this->db->last_query();			
		return true;
  	}

  	/**
      * This function is used to delete record from table
      * @param : $id record id which you want to delete
      */
	public function delete_data($table, $array='') {
		$this->db->where($array);
    	$this->db->delete($table);
    	//echo $this->db->last_query();	
	}

	public function get_amortization_record($id)
	{
		$query=$this->db->select('*')
			->from('tbl_consumer_loans_applicationform ')			
			->where('deleted', 0)
			->where('cl_aid', $id)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function check_amortization_files($id){		
		if($id) {
			$query=$this->db->select('*')
			->from('tbl_consumer_loans_applicationform')
			->where('temp_id', $id)
			->where('loan_type',1)
			->get();
			//echo $this->db->last_query();			
			return $query->row();
		}
		return false;
	}
	

	
}