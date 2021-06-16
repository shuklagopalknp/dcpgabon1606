<?php 

class Decovert_Loans_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();		
		date_default_timezone_set('Africa/Johannesburg');
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

  	public function get_decovertrecord()
  	{
  		$query=$this->db->select('a.*,
  			u.first_name,
  			l.loan_type as ltype,
  			b.branch_name,
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
			->where('a.admin_id', $this->session->userdata('id'))
			->order_by("a.modified desc")							
			->get();			
			return $query->result_array();

  		/*$query=$this->db->select('*')
			->from('decovert_applicationform')			
			->where('deleted', 0)
			->where('loan_type', 3)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();*/
  	}

  	public function get_decovertamortization($id){
  		$query=$this->db->select('*')
			->from('temp_applicationform_decovert')			
			->where('tdid', $id)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
  	}
	public function get_decovertamortizationview($id){
  		$query=$this->db->select('*')
			->from('decovert_applicationform')			
			->where('did', $id)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
  	}
	

  	
  	public function check_damortization_files($id){		
		if($id) {
			$query=$this->db->select('tdid,filename')
			->from('temp_applicationform_decovert')
			->where('tdid', $id)					
			->get();
			//echo $this->db->last_query();exit;			
			return $query->row();
		}
		return false;
	}
	public function get_bankdetails(){
		$query=$this->db->select('*')
			->from('customers')
			->where('status', 1)			
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_customers_details($accountno){
		$query=$this->db->select('*')
			->from('customers')
			->where('status', 1)
			->where('account_number', $accountno)			
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_decovert_customer(){
		$query=$this->db->select('c.*, cp.*')
			->from('customers as c')
			->join('customer_personalinformation cp','c.cid = cp.customar_id','inner')
			->where('c.status', 1)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function getapplicationformrecord($segment=null)
	{
		$query=$this->db->select('admin_id,ip_address,application_no,loan_type,average,requested_overdraft,amount_sought_customer,month1,month2,month3,letter_format,loan_status')
			->from('temp_applicationform_decovert')
			->where('tdid', $segment)
			->where('deleted', 0)			
			->get();
			//echo  $this->db->last_query();
			//$record=$query->result_array();
			return $query;
	}
	public function get_customar_details_record($id){
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype')
			->from('decovert_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customer_id = c.cid','left')			
			->where('a.deleted', 0)
			->where('a.did', $id)
			->where('a.loan_type', 3)
			->where('a.admin_id', $this->session->userdata('id'))						
			->get();	
			//echo  $this->db->last_query();		
			return $query->result_array();
	}

	/*customer details */
	public function get_customar_applicationform_details($id){		
		$query=$this->db->select('a.loan_type as loantype, a.*,  u.first_name,l.loan_type as ltype')
			->from('decovert_applicationform a')
			->join('user u','a.admin_id = u.id','inner')			
			->join('loan_of_type l','a.loan_type = l.lid','left')			
			->where('a.deleted', 0)
			->where('a.loan_type', 3)
			//->where('a.admin_id', $this->session->userdata('id'))
			->where('a.did', $id)
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	public function get_customerdetails_list(){
		$query=$this->db->select('c.*,
			cp.*,
			dl.customer_id,
			dl.requested_overdraft,
			dl.average,
			dl.loan_type,
			dl.loan_status,
			c.created,
			st.state_id')
			->from('customers as c')
			->join('customer_address st','c.cid = st.customar_id','inner')
			->join('customer_personalinformation cp','c.cid = cp.customar_id','inner')
			->join('decovert_applicationform dl','c.cid = dl.customer_id','inner')
			->where('c.status', 1)
			->group_by(array("c.cid", "dl.customer_id")) 
			->get();
			//echo  $this->db->last_query(); exit;
			return $query->result_array();
	}
	/*Application Tracking Timeline*/
	public function get_tracking_timeline($loanid){
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('t.id as tid,
			t.comment,
			t.created,
			t.cl_aid,
			t.loan_type,			
			t.admin_id,
			t.content_type,
			u.type,
			u.is_admin,
			u.first_name,
			u.last_name,
			r.field_data,')
			->from('tracking_timeline  t')	
			->join('user u','t.admin_id = u.id','inner')
			->join('role r','r.id =u.is_admin','left')		
			->where('t.cl_aid', $loanid)
			->where('t.loan_type',3)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();

	}

	public function get_interaction_data($id){
		$query=$this->db->select('*')
			->from('interaction_history')			
			->where('cl_aid', $id)
			->where('loan_type',3)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}


	public function get_filedata($id){
		$query=$this->db->select('*')
			->from('system_docs')			
			->where('cl_aid', $id)
			->where('loan_type', 3)
			->where('section', 1)			
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	public function get_check_list_customer_documents($id){
		$query=$this->db->select('*')
			->from('system_docs')			
			->where('cl_aid', $id)
			->where('loan_type', 3)
			->where('section', 2)			
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}
	public function get_collateralFiles($id){
		$query=$this->db->select('cf.*, c.selected_field')
			->from('collateral_files as cf')
			->join('collateral c','cf.collateral_id=c.col_id','inner')
			->where('cf.collateral_id', $id)
			->where('cf.loan_type', 3)
			->where('cf.section', 3)
			->where('cf.deleted', 0)				
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}


	public function get_risk_analysisfile($id){
		$query=$this->db->select('*')
			->from('riskanalysis')			
			->where('cl_aid', $id)
			->where('loan_type', 3)	
			->where('section', 1)
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	public function get_risk_analysisfileanalycis($id){
		$query=$this->db->select('*')
			->from('tbl_riskanalysis')			
			->where('cl_aid', $id)
			->where('loan_type', 3)	
			->where('section', 4)
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	public function get_collateral($id)
	{
		$adminid=$this->session->userdata('id');
			$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',3)		
			->group_by('c.col_id') 
			->order_by("c.col_id desc")			 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}
	public function get_collateral_vehicule($id)
	{
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',3)
			->where('c.selected_field','Véhicule')					
			->group_by('c.col_id') 
			->order_by("c.col_id desc")	
			->limit(1)		 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}

	public function get_collateral_deposit($id)
	{
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',3)
			->where('c.selected_field','Déposit')					
			->group_by('c.col_id') 
			->order_by("c.col_id desc")	
			->limit(1)		 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}

	public function get_collateral_maison($id)
	{
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',3)
			->where('c.selected_field','Maison')					
			->group_by('c.col_id') 
			->order_by("c.col_id desc")	
			->limit(1)		 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}

	public function get_collateral_excemption($id)
	{
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',3)
			->where('c.selected_field','Excemption')					
			->group_by('c.col_id') 
			->order_by("c.col_id desc")	
			->limit(1)		 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}

	public function get_target_list_Secteurs()
	{
		$query=$this->db->select('*')
			->from('target_list_companies')			
			->where('deleted', 0)				
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_All_branch()
	{
			$query=$this->db->select('*')
			->from('branch')
			->where('deleted', 0)			
			->order_by("bid", "desc")
			->get();
			//echo  $this->db->last_query();	
			return $query->result_array();
	}

	public function get_category_of_employers(){
		$query=$this->db->select('*')
			->from('category_of_employers')			
			->where('deleted', 0)				
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_type_of_contract(){

		$query=$this->db->select('*')
			->from('type_of_contract')			
			->where('deleted', 0)				
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_decision_record($id){		
		$query=$this->db->select('b.*,			
			u.user_name,
			u.is_admin,
			u.type,
			u.branch_id,
			u.first_name,
			u.last_name,
			r.field_data')
			->from('branmanager_approbation as b')	
			->join('user u','b.manager_id = u.id','inner')	
			->join('role r','u.is_admin = r.id','inner')		
			//->where('manager_id', $this->session->userdata('id'))
			->where('b.loan_id',$id)
			->where('b.loantype',3)
			->order_by("b.modified", "DESC")
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

	public function get_customersdetailsinfo($id){
		$query=$this->db->select('*')
		->from('customers')
		->where('cid', $id)			
		->where('status', 1)	
		->get();
		//echo  $this->db->last_query();
		return $query->result_array();
	}

	public function get_current_monthly_credit($id){
		$query=$this->db->select('*')
			->from('riskanalysis_current_monthly_credit')			
			->where('cap_id', $id)
			->where('loan_type', 3)	
			->where('section', 2)
			->get();
						
			return $query->result_array();
	}

	public function get_monthly_payment_new_loan($id){
	$query=$this->db->select('*')
		->from('riskanalysis_monthly_payment_new_loan')			
		->where('cap_id', $id)
		->where('loan_type', 3)	
		->where('section', 2)
		->get();				
		return $query->result_array();
	}
	public function get_financial_situation($id){
		$query=$this->db->select('*')
		->from('riskanalysis_financial_situation')			
		->where('cap_id', $id)
		->where('loan_type',3)	
		->where('section',2)
		->get();				
		return $query->result_array();
	}
	public function get_applicableloan_ratio(){
		$query=$this->db->select('*')
		->from('tbl_applicableloan_ratio')
		->get();		
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
			->where('a.loan_status !=', 'Initiated')
			->where('u.branch_id',$bid)
			->where('a.loan_type', 3);
			if($params != '') {
				$this->db->like('a.loan_status', $params);				
  			}
  			$this->db->order_by('a.did', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_decovertrecord();
		}
	}

	public function check_riskanalysis_financial_situation($id){
		if($id) {
			$query=$this->db->select('*')
			->from('riskanalysis_financial_situation')
			->where('cap_id', $id)
			->where('loan_type',3)
			->limit(1)	
			->get();
			$ret = $query->row();
			//echo $this->db->last_query();exit;
			return $ret->rfs_id;
		}
		return false;
	}

	


}