<?php 

class Branch_Loans_Model extends CI_Model
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
    	$this->db->where('branchmanager_status !=', 'Initiated');
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
    	$this->db->where('branchmanager_status', 'Avis défavorable');
    	//$query=$this->db->get();
    	//echo  $this->db->last_query(); exit;
    	return $num_rows = $this->db->count_all_results();
    	
	}
	public function countRow_LoansPending()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('branchmanager_status', 'Process');
    	$this->db->or_where('branchmanager_status', 'Avis Favorable');
    	//$query=$this->db->get();
    	return $num_rows = $this->db->count_all_results();
	}
	public function countRow_Totalamount()
	{
    	$this->db->select_sum('loan_amt');
		$this->db->from('tbl_customar_applicationform');
		$this->db->where('branchmanager_status !=', 'Initiated');
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
			->where('a.branchmanager_status !=','Initiated')
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
	public function get_Allapplication_form_consumer($bid)
	{
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
			->where('a.deleted', 0)
			->where('a.loan_type', 1)
			->where('a.loan_status', 'Avis Favorable')
			->or_where('a.loan_status', 'Confirm Disbursement')
			->where('a.branchmanager_status !=', 'Initiated')			
			->where('u.branch_id',$bid)
			->order_by("a.modified desc")
			->get();
		// echo "<pre>";	echo $this->db->last_query();exit;			
			
			return $query->result_array();
	}

	# Get all loans
	public function get_Allapplication_form_consumer_global()
	{
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
			->where('a.deleted', 0)
			// ->where('a.loan_type', 1)
			// ->where('a.loan_status', 'Avis Favorable')
			// ->or_where('a.loan_status', 'Confirm Disbursement')
			// ->where('a.branchmanager_status !=', 'Initiated')			
			// ->where('u.branch_id',$bid)
			->order_by("a.modified desc")
			->get();
		// echo "<pre>";	echo $this->db->last_query();exit;			
			
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
		$query=$this->db->select('a.*,
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
			->where('a.loan_type', 2)
			->where('a.loan_status', 'Avis Favorable')
			->or_where('a.loan_status', 'Confirm Disbursement')
			->where('a.branchmanager_status !=', 'Initiated')			
			->where('u.branch_id',$bid)
			->order_by("a.modified desc")
			->get();
			//echo $this->db->last_query();			
			return $query->result_array();
	}

	### loan details 
	public function get_Allapplication_form_credit_scholar_global()
	{
		$query=$this->db->select('a.*,
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
			// ->where('a.loan_type', 2)
			// ->where('a.loan_status', 'Avis Favorable')
			// ->or_where('a.loan_status', 'Confirm Disbursement')
			// ->where('a.branchmanager_status !=', 'Initiated')			
			// ->where('u.branch_id',$bid)
			->order_by("a.modified desc")
			->get();
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
	/*consumer Load*/
	public function get_customar_details_consumer($id){		
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype,t.tax_type,t.tax_rate, at.*')
			->from('consumer_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('consumer_amortization at','a.amortization_id = at.id','left')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('loan_of_taxes t','a.loan_tax = t.tid','left')
			->where('a.loan_type', 1)						
			->where('a.deleted', 0)			
			->where('a.cl_aid', $id)						
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}


	public function get_PersonalInformation_confrim_decovert($id){		
		$query=$this->db->select('a.*,
		 u.first_name,
		 l.loan_type as ltype,		
		 cp.pid as cpid,
		 cp.first_name,
		 cp.middle_name,
		 cp.last_name,
		 cp.email as customer_email,		 
		 ')
		->from('decovert_applicationform a')
		->join('user u','a.admin_id = u.id','inner')		
		->join('customer_personalinformation cp','a.customer_id = cp.customar_id','left')	
		->join('loan_of_type l','a.loan_type = l.lid','left')		
		->where('a.deleted', 0)			
		->where('a.did', $id)						
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}

	public function get_PersonalInformation_cus($id){		
		$query=$this->db->select('a.*,
		 u.first_name,
		 l.loan_type as ltype,
		 t.tax_type,
		 t.tax_rate,
		 cp.pid as cpid,
		 cp.first_name,
		 cp.middle_name,
		 cp.last_name,
		 cp.email as customer_email,
		 at.*
		 ')
		->from('customar_applicationform a')
		->join('user u','a.admin_id = u.id','inner')
		->join('amortization at','a.amortization_id = at.id','left')
		->join('customer_personalinformation cp','a.customar_id = cp.customar_id','left')	
		->join('loan_of_type l','a.loan_type = l.lid','left')
		->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
		->where('a.deleted', 0)			
		->where('a.cap_id', $id)						
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}

	public function get_finaldisDisbursementmail_cus($id){		
		$query=$this->db->select('a.*,
		 u.first_name,
		 l.loan_type as ltype,
		 t.tax_type,
		 t.tax_rate,
		 cp.pid as cpid,
		 cp.first_name,
		 cp.middle_name,
		 cp.last_name,
		 cp.email as customer_email,
		 at.*
		 ')
		->from('consumer_loans_applicationform a')
		->join('user u','a.admin_id = u.id','inner')
		->join('amortization at','a.amortization_id = at.id','left')
		->join('customer_personalinformation cp','a.customar_id = cp.customar_id','left')	
		->join('loan_of_type l','a.loan_type = l.lid','left')
		->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
		->where('a.deleted', 0)			
		->where('a.cl_aid', $id)						
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}





	public function get_PersonalInformation_decovert($id){		
		$query=$this->db->select('a.*,
		 u.first_name,
		 l.loan_type as ltype,		
		 cp.pid as cpid,
		 cp.first_name,
		 cp.middle_name,
		 cp.last_name,
		 cp.email as customer_email,		 
		 ')
		->from('decovert_applicationform a')
		->join('user u','a.admin_id = u.id','inner')		
		->join('customer_personalinformation cp','a.customer_id = cp.customar_id','left')	
		->join('loan_of_type l','a.loan_type = l.lid','left')		
		->where('a.deleted', 0)			
		->where('a.did', $id)						
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}

	public function get_loanamount($cpid){
		$query=$this->db->select('cap_id,loan_amt')
			->from('customar_applicationform')
			->where('cap_id', $cpid)
			-> limit(1)		
			->get();
			return $query->row();
	}

	public function get_loanamount_consumer($cpid){
		$query=$this->db->select('cap_id,loan_amt')
			->from('customar_applicationform')
			->where('cap_id', $cpid)
			-> limit(1)		
			->get();
			return $query->row();
	}

	public function get_confirm_disbursement_consumer($cpid){
		$query=$this->db->select('cl_aid,loan_amt')
			->from('consumer_loans_applicationform')
			->where('cl_aid', $cpid)
			-> limit(1)		
			->get();
			return $query->row();
	}
	public function get_loanamount_Decovert($cpid){
		$query=$this->db->select('did,requested_overdraft')
			->from('tbl_decovert_applicationform')
			->where('did', $cpid)
			-> limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->row();
	}

	public function checkloanstatuslist($params){
		//print_r($params); exit;
		if($params!="All"){
			$this->db->select('a.*, u.first_name,l.loan_type as ltype, c.account_number, at.databinding, pi.first_name as clientfirstname, pi.middle_name as clientmiddlename,pi.last_name as clientlastname')
			->from('customar_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')
			->where('a.deleted', 0)
			->where('a.loan_type', 2);
			if($params != '') {
				$this->db->like('a.branchmanager_status', $params);				
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
		$query=$this->db->select('a.*, u.first_name,u.branch_id,l.loan_type as ltype, c.account_number, at.databinding, pi.first_name as clientfirstname, pi.middle_name as clientmiddlename,pi.last_name as clientlastname')
			->from('customar_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')		
			->where('a.deleted', 0)
			->where('a.loan_type', 2)
			->where('a.loan_status', 'Avis Favorable')
			->or_where('a.loan_status', 'Confirm Disbursement')
			->where('a.branchmanager_status !=', 'Initiated')
			->order_by("a.modified desc")
			->get();
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
			->join('branch b','b.bid = u.branch_id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('consumer_amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')
			->where('a.deleted', 0)
			->where('a.loan_type', 1);
			if($params != '') {
				$this->db->like('a.branchmanager_status', $params);				
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

	public function get_Allapplication_form_Decovert($bid)
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
			->from('decovert_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('tbl_branch b','b.bid = u.branch_id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customer_id = c.cid','left')			
			->join('customer_personalinformation pi','pi.customar_id = a.customer_id','left')	
			->where('a.deleted', 0)
			->where('a.loan_type', 3)
			->where('a.loan_status', 'Avis Favorable')
			->or_where('a.loan_status', 'Confirm Disbursement')
			->where('a.branchmanager_status !=', 'Initiated')			
			->where('u.branch_id',$bid)
			->order_by("a.modified desc")
			->get();
			//echo $this->db->last_query();			
			return $query->result_array();
	}
/*======================================================
=======================Decovert Loan setails==================
######################################################*/

public function get_Allapplication_form_Decovert_global()
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
		->from('decovert_applicationform a')
		->join('user u','a.admin_id = u.id','inner')
		->join('tbl_branch b','b.bid = u.branch_id','inner')
		->join('loan_of_type l','a.loan_type = l.lid','left')
		->join('customers c','a.customer_id = c.cid','left')			
		->join('customer_personalinformation pi','pi.customar_id = a.customer_id','left')	
		->where('a.deleted', 0)
		// ->where('a.loan_type', 3)
		// ->where('a.loan_status', 'Avis Favorable')
		// ->or_where('a.loan_status', 'Confirm Disbursement')
		// ->where('a.branchmanager_status !=', 'Initiated')			
		// ->where('u.branch_id',$bid)
		->order_by("a.modified desc")
		->get();
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

	/*Consumer Loan Filtering*/
	public function filterDecovertloan($params,$bid){
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
			->where('a.branchmanager_status !=', 'Initiated')
			->where('u.branch_id',$bid)
			->where('a.loan_type', 3);
			if($params != '') {
				$this->db->like('a.branchmanager_status', $params);				
  			}
  			$this->db->order_by('a.did', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_Allapplication_form_Decovert($bid);
		}
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

	public function get_caution_scolare_Loans($bid)
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
			->where('a.loan_status', 'Avis Favorable')
			->or_where('a.loan_status', 'Confirm Disbursement')
			->where('a.branchmanager_status !=', 'Initiated')			
			->where('u.branch_id',$bid)
			->order_by("a.modified desc")
			->get();
			//echo $this->db->last_query();			
			return $query->result_array();
	
	}
	
/*======================================================
=======================CAUTIONS SCOLARE Loan===========+
#######################################################*/

public function get_caution_scolare_Loans_global()
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
		// ->where('a.loan_type',4)
		// ->where('a.loan_status', 'Avis Favorable')
		// ->or_where('a.loan_status', 'Confirm Disbursement')
		// ->where('a.branchmanager_status !=', 'Initiated')			
		// ->where('u.branch_id',$bid)
		->order_by("a.modified desc")
		->get();
		//echo $this->db->last_query();			
		return $query->result_array();

}


	/*Consumer Loan Filtering*/
	public function filter_Caution_Scolare_loan($params,$bid){
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
			->from('caution_scolaire_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('branch b','b.bid = u.branch_id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')			
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')
			->where('a.deleted', 0)
			->where('a.branchmanager_status !=', 'Initiated')
			->where('u.branch_id',$bid)
			->where('a.loan_type', 4);
			if($params != '') {
				$this->db->like('a.branchmanager_status', $params);				
  			}
  			$this->db->order_by('a.cl_aid', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_caution_scolare_Loans($bid);
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