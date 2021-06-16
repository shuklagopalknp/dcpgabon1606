<?php 

class Director_Engagements_Loans_Model extends CI_Model
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
    	$this->db->where('director_engagements !=', 'Initiated');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
	}
	public function countRow_LoansApproved()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('director_engagements', 'Confirm Disbursement');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
	}

	public function countRow_LoansRejected()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('director_engagements', 'Avis défavorable');
    	//$query=$this->db->get();
    	//echo  $this->db->last_query(); exit;
    	return $num_rows = $this->db->count_all_results();
    	
	}
	public function countRow_LoansPending()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('director_engagements', 'Process');
    	$this->db->or_where('director_engagements', 'Avis Favorable');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
	}
	public function countRow_Totalamount()
	{
    	$this->db->select_sum('loan_amt');
		$this->db->from('tbl_customar_applicationform');
		$this->db->where('director_engagements !=', 'Initiated');
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
			->where('a.director_engagements !=','Initiated')
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
	public function get_Allapplication_form($bid)
	{
		$minvalue='100000';		 
		$maxvalue='10000000';
			$query="SELECT `a`.*, `u`.`first_name`, `u`.`branch_id`, `l`.`loan_type` as `ltype` FROM `tbl_consumer_loans_applicationform` `a` INNER JOIN `tbl_user` `u` ON `a`.`admin_id` = `u`.`id` LEFT JOIN `tbl_loan_of_type` `l` ON `a`.`loan_type` = `l`.`lid` WHERE `a`.`deleted` = 0 AND `a`.`loan_type` = 2 AND `u`.`branch_id` ='".$bid."' AND a.loan_status='Approbation' AND a.director_engagements !='Initiated' AND a.loan_amt BETWEEN ".$minvalue." AND ".$maxvalue."";			
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
		$minvalue='100000';		 
		$maxvalue='10000000';
			$query="SELECT `a`.*,
			`u`.`first_name`,
			`u`.`branch_id`,
			 `b`.`branch_name`,
			`l`.`loan_type` as `ltype`
			 FROM `tbl_customar_applicationform` `a` 
			 INNER JOIN `tbl_user` `u` ON `a`.`admin_id` = `u`.`id` 
			 INNER JOIN `tbl_branch` `b` ON `b`.`bid` = `u`.`branch_id` 
			 LEFT JOIN `tbl_loan_of_type` `l` ON `a`.`loan_type` = `l`.`lid` 
			 WHERE `a`.`deleted` ='0' 
			 AND `a`.`loan_type` ='2' 			
			 AND `a`.`branchmanager_status`='Avis Favorable'
			 AND `a`.`director_engagements` !='Initiated'  
			 AND `u`.`branch_id` ='".$bid."' 
			 AND a.loan_amt BETWEEN ".$minvalue." AND ".$maxvalue."";		
			$query= $this->db->query($query);
			echo $this->db->last_query();			
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
	
	

	
}