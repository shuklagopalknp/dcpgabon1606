<?php 
class PP_Credit_Scholar_Model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();		
		date_default_timezone_set('Asia/Kolkata');
	}
	public function countRow_LoansApplied($branchid=null)
	{
		//$query = $this->db->query("SELECT *,count(cap_id) AS num_of_time FROM tbl_customar_applicationform");
    	// print_r($query->result());
    	//return $query->result();
    	if(!empty($branchid))
    	{
    		$this->db->from('customar_applicationform');
    		$this->db->where('admin_id', $this->session->userdata('id'));
    		return $num_rows = $this->db->count_all_results();
	    }else{
	    	$this->db->from('customar_applicationform');
	    	return $num_rows = $this->db->count_all_results();
	    }
	}

	public function countRow_LoansApproved()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('final_confirmation', 'Disbursement');
    	return $num_rows = $this->db->count_all_results();
	}

	public function countRow_LoansRejected()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('loan_status', 'Avis défavorable');
    	return $num_rows = $this->db->count_all_results();
	}
	public function countRow_LoansPending()
	{
    	$this->db->from('customar_applicationform');
    	$this->db->where('loan_status', 'Avis Favorable');
    	return $num_rows = $this->db->count_all_results();
	}
	public function countRow_Totalamount()
	{
    	$this->db->select_sum('loan_amt');
		$this->db->from('tbl_customar_applicationform');
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
			->where('a.admin_id', $this->session->userdata('id'))
			->order_by("a.modified desc")
			->limit(6)
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
			->where('lid', 2)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
		//return false;
	}
	public function check_amortization($id){		
		if($id) {
			$query=$this->db->select('applicationform_id,activate')
			->from('amortization')
			->where('applicationform_id', $id)
			->where('loan_type',2)
			->where('activate','active')		
			->get();
			//echo $this->db->last_query();exit;
			$result = $query->num_rows();
			return ($result == 1) ? true : false;
		}
		return false;
	}
	public function check_amortization_files($id){		
		if($id) {
			$query=$this->db->select('applicationform_id,amortization_pdf')
			->from('amortization')
			->where('applicationform_id', $id)					
			->get();
			//echo $this->db->last_query();exit;			
			return $query->row();
		}
		return false;
	}

	
	
	public function get_RangeTax($tid=null)
	{		
		$qry=$this->db->select('tid, tax_rate')
			->from('loan_of_taxes')
			->where('tid', $tid)			
			->get();
			echo $qry->row('tax_rate');
			//echo $this->db->last_query();			
			//return json_encode($qry->result_array());
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


	/**
      * This function is used to Insert Record in table
      * @param : $table - table name in which you want to insert record 
      * @param : $data - record array 
      */
	public function insertRow($table, $data){
	  	$this->db->insert($table, $data);
		//echo $this->db->last_query();	
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

	public function get_taxType()
	{
		$query=$this->db->select('*')
			->from('tbl_loan_of_taxes')
			->where('status', 1)			
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_new_application_form()
	{
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype,u.branch_id, b.branch_name,c.account_number, at.databinding, pi.first_name as clientfirstname, pi.middle_name as clientmiddlename,pi.last_name as clientlastname')
			->from('customar_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('branch b','u.branch_id = b.bid','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')						
			->where('a.deleted', 0)
			->where('a.loan_type', 2)
			->where('a.admin_id', $this->session->userdata('id'))
			->order_by("a.modified desc")							
			->get();			
			return $query->result_array();
	}
	public function get_headagency($bid)
	{
		$query=$this->db->select('branch_id, user_name')
			->from('user')
			->where('branch_id', $bid)
			->where('is_admin', 3)
			->limit(1)
			->get();
			//echo  $this->db->last_query();
			$ret = $query->row();
			return $ret->user_name;		
	}
	
	public function get_amortization_id($id){		
		$qry = $this->db->select('*')
          ->get_where('amortization', array('applicationform_id' => $id,'loan_type'=>'2','deleted'=>'0'))
          ->row();
         // echo  $this->db->last_query();
        return $qry; 
	}

	public function get_edit_customar_applicationform($id)
	{
		$query=$this->db->select('*')
			->from('customar_applicationform')						
			->where('deleted', 0)
			->where('cap_id',$id)								
			->get();			
			return $query->result_array();
	}

	
	public function add_roles(){		
		if($this->input->post('save')){
			$arr=array(			   	
				'name'=>$this->input->post('role_name'),
				'field_data'=>$this->input->post('role_description'),
				"created_at" =>date('Y-m-d H:i:s'),
				"modified_at" =>date('Y-m-d H:i:s'),
			   );			  
			   $this->db->insert('role',$arr);
			   //echo  $this->db->last_query();
			   return 1;
		}
	}

	public function get_customerdetails_list(){
		$query=$this->db->select('c.*, cp.*, ,cl.customar_id, cl.loan_amt, cl.loan_term, cl.loan_schedule,cl.loan_status,c.created,st.state_id')
			->from('customers as c')
			->join('tbl_customer_address st','c.cid = st.customar_id','inner')
			->join('customer_personalinformation cp','c.cid = cp.customar_id','inner')
			->join('customar_applicationform cl','c.cid = cl.customar_id','inner')
			->where('c.status', 1)
			->group_by(array("c.cid", "cl.customar_id")) 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_bankdetails(){
		$query=$this->db->select('c.*, cp.*')
			->from('customers as c')
			->join('customer_personalinformation cp','c.cid = cp.customar_id','inner')
			->where('c.status', 1)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_account_details($accountno){
		$query=$this->db->select('c.*, cp.*')
			->from('customers as c')
			->join('customer_personalinformation cp','c.cid = cp.customar_id','inner')
			->where('c.status', 1)
			->where('c.account_number', $accountno)			
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_customar_applicationform_details($id){		
		$query=$this->db->select('a.loan_type as loantype, a.*,  u.first_name,l.loan_type as ltype,t.tax_type,t.tax_rate, at.*')
			->from('customar_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
			->where('a.deleted', 0)
			->where('a.loan_type', 2)
			//->where('a.admin_id', $this->session->userdata('id'))
			->where('a.cap_id', $id)
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
	public function get_temp_applicationform_record($id)
	{
		$query=$this->db->select('*')
			->from('temp_applicationform ')		
			->where('aid', $id)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_amortization_record($id)
	{
		$query=$this->db->select('*')
			->from('customar_applicationform ')			
			->where('deleted', 0)
			->where('cap_id', $id)	
			->limit(1)		
			->get();
			echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_amortization_record_download($id)
	{
		$query=$this->db->select('*')
			->from('tbl_temp_applicationform ')
			->where('aid', $id)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}


	public function get_amortization_record2($id)
	{
		$query=$this->db->select('*')
			->from('customar_applicationform')
			->where('deleted', 0)
			->where('cap_id', $id)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_temp_applicationformdata(){		
		$this->input->post('segment');
		$query=$this->db->select('application_no,ip_address,loan_type,loan_amt,loan_interest,loan_term,loan_schedule,loan_fee,loan_tax,loan_commission')
			->from('temp_applicationform')
			->where('status', 1)
			->where('aid', $this->input->post('segment'))	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_checkfieldandvalue($id){
		$query=$this->db->select('*')
			->from('customar_applicationform')					
			->where('cap_id', $id);						
			$result = $this->db->get()->result();
			return $result;
	}


	public function get_interaction_data($id){
		$query=$this->db->select('*')
			->from('interaction_history')			
			->where('cl_aid', $id)
			->get();			
			return $query->result_array();
	}

	public function get_filedata($id){
		$query=$this->db->select('*')
			->from('system_docs')			
			->where('cl_aid', $id)
			->where('loan_type', 2)
			->where('section', 1)			
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	public function get_check_list_customer_documents($id){
		$query=$this->db->select('*')
			->from('system_docs')			
			->where('cl_aid', $id)
			->where('loan_type', 2)
			->where('section', 2)			
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
	public function get_collateral($id)
	{
		$adminid=$this->session->userdata('id');
			$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',2)		
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
			->where('c.loan_type',2)
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
			->where('c.loan_type',2)
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
			->where('c.loan_type',2)
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
			->where('c.loan_type',2)
			->where('c.selected_field','Excemption')					
			->group_by('c.col_id') 
			->order_by("c.col_id desc")	
			->limit(1)		 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();		
	}


	
	
	
	

	public function get_collateralFiles($id){
		$query=$this->db->select('cf.*, c.selected_field')
			->from('collateral_files as cf')
			->join('collateral c','cf.collateral_id=c.col_id','inner')
			->where('cf.collateral_id', $id)
			->where('cf.loan_type', 2)
			->where('cf.deleted', 0)				
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_risk_analysisfile($id){
		$query=$this->db->select('*')
			->from('riskanalysis')			
			->where('cl_aid', $id)
			->where('loan_type', 2)	
			->where('section', 2)
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	public function get_tracking_timeline($loanid){
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('t.id as tid, t.comment, t.created,t.cl_aid, t.loan_type, u.type, t.admin_id, u.is_admin, u.first_name, u.last_name, r.field_data,')
			->from('tracking_timeline  t')	
			->join('user u','t.admin_id = u.id','inner')
			->join('role r','r.id =u.is_admin','left')		
			->where('t.cl_aid', $loanid)
			->where('t.loan_type',2)
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
	
	public function check_riskanalysis_current_monthly_credit($id){
		if($id) {
			$query=$this->db->select('*')
			->from('riskanalysis_current_monthly_credit')
			->where('cap_id', $id)
			->limit(1)	
			->get();
			$ret = $query->row();
			return $ret->rcic_id;
			//echo $this->db->last_query();exit;
			//return ($ret->rcic_id) ? $ret->rcic_id : false;
		}
		return false;
	}
	public function check_riskanalysis_monthly_payment_new_loan($id){
		if($id) {
			$query=$this->db->select('*')
			->from('riskanalysis_monthly_payment_new_loan')
			->where('cap_id', $id)
			->limit(1)	
			->get();
			$ret = $query->row();
			//echo $this->db->last_query();exit;
			return $ret->rmic_id;
			
			//return ($ret->rcic_id) ? $ret->rcic_id : false;
		}
		return false;
	}
	
	public function check_riskanalysis_financial_situation($id){
		if($id) {
			$query=$this->db->select('*')
			->from('riskanalysis_financial_situation')
			->where('cap_id', $id)
			->limit(1)	
			->get();
			$ret = $query->row();
			//echo $this->db->last_query();exit;
			return $ret->rfs_id;
		}
		return false;
	}
	
	public function get_current_monthly_credit($id){
		$query=$this->db->select('*')
			->from('riskanalysis_current_monthly_credit')			
			->where('cap_id', $id)
			->where('loan_type', 2)	
			->where('section', 2)
			->get();
						
			return $query->result_array();
	}
	public function get_monthly_payment_new_loan($id){
	$query=$this->db->select('*')
		->from('riskanalysis_monthly_payment_new_loan')			
		->where('cap_id', $id)
		->where('loan_type', 2)	
		->where('section', 2)
		->get();				
		return $query->result_array();
	}
	public function get_financial_situation($id){
		$query=$this->db->select('*')
		->from('riskanalysis_financial_situation')			
		->where('cap_id', $id)
		->where('loan_type', 2)	
		->where('section', 2)
		->get();				
		return $query->result_array();
	}
	public function get_applicableloan_ratio(){
		$query=$this->db->select('*')
		->from('tbl_applicableloan_ratio')
		->get();		
		return $query->result_array();
	}

	public function get_decision_record($id){		
		$query=$this->db->select('b.*,u.*, r.field_data')
			->from('branmanager_approbation as b')	
			->join('user u','b.manager_id = u.id','inner')	
			->join('role r','u.is_admin = r.id','inner')		
			//->where('manager_id', $this->session->userdata('id'))
			->where('b.loan_id',$id)
			->where('b.loantype',2)
			->order_by("b.bmid", "desc")
			->get();
			//echo  $this->db->last_query();			
		return $query->result_array();
	}

/*=========================Today 12-07-2019======================*/
	
public function checkloanstatuslist($params){
	//print_r($params); exit;
	if($params!="All"){
			$this->db->select('a.*, u.first_name,l.loan_type as ltype, c.account_number')
			->from('customar_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('customers c','a.customar_id = c.cid','left')
			->where('a.deleted', 0)
			->where('a.loan_type', 2)
			->where('a.admin_id', $this->session->userdata('id'));			
			if($params != '') {
				$this->db->like('a.loan_status', $params);				
  			}
  			$this->db->order_by('a.cap_id', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_new_application_form();
		}

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

	
	
	/**
	 * Send Mail To Higher Official
	 * 	###
	 * 	###	In CREDIT CONSO Loan
	 * 	### ============================================================
	 * 	### Between 0 and 5000000 Loan Amount
	 * 	### ============================================================
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	### Director Operating Manager === (roleid - 12)
	 * 	###
	 * 	### ============================================================
	 * 	### Between 50,00,001 and 15,000,000 Loan amount
	 * 	### ============================================================
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Analyst DCPR === (roleid - 6)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	### Director Operating Manager === (roleid - 12)
	 * 	###
	 * 	### =============================================================
	 * 	### Between 15,000,001 and 25 ,000,001
	 * 	### ============================================================
	 * 	### Account Manager === (roleid - 2)
	 * 	### Branch Manager === (roleid - 3)
	 * 	### Analyst DCPR === (roleid - 6)
	 * 	### Head DCPR === (roleid - 5)
	 * 	### Director Engagements === (roleid - 10)
	 * 	### Agent CAD === (roleid - 11)
	 * 	### CAD === (roleid - 9)
	 * 	### Director Operating Manager === (roleid - 12)
	 * 	###
	 */
	public function sendMailToHigherOfficial($cl_aid)
	{
		# Initialize an array
		$output = [];

		# Get loan amount				
		$getLoanDetails = $this->db->select('*')->from('tbl_consumer_loans_applicationform')->where('cl_aid', $cl_aid)->get()->row_array();
		if(empty($getLoanDetails)) {
			$output=array('error' =>"Unable to found loan details!");
		}
		
		# Get role based on loan amount
		if($getLoanDetails['loan_amt'] > 0 && $getLoanDetails['loan_amt'] <= 5000000) {
			$subAdminRoleId = 3; // Account Manager
		} else if($getLoanDetails['loan_amt'] > 5000001 && $getLoanDetails['loan_amt'] <= 15000000) {
			$subAdminRoleId = 3; // Account Manager
		} else if($getLoanDetails['loan_amt'] > 15000001 && $getLoanDetails['loan_amt'] <= 25000001) {
			$subAdminRoleId = 3; // Account Manager
		}
		
		# Role id & User id === Account Manager
		$roleId = $this->session->userdata('role') ?? 2;				
		$userId = $this->session->userdata('id');

		# Get admin details
		$userDetails = $this->db->select('*')->from('tbl_user')->where('id', $userId)->where('is_admin', $roleId)->get()->row_array();
		if(empty($userDetails)) {
			$output=array('error' =>"Unable to found user!");
		}

		# Get user to send email
		$getUser = $this->db->select('*')->from('tbl_user')->where('branch_id', $userDetails['branch_id'])->where('is_admin', $subAdminRoleId)->get()->row_array();
		if(empty($getUser)) {
			$output=array('error' =>"Unable to found superior user!");
		}

		# Customer details
		$getCustomerDetails = $this->db->select('*')->from('tbl_customer_personalinformation')->where('customar_id', $getLoanDetails['customar_id'])->get()->row_array();
		if(empty($getCustomerDetails)) {
			$output=array('error' =>"Unable to found customer details!");
		}

		# bank account
		$getbankaccount = $this->db->select('*')->from('tbl_customar_bank_account')->where('customar_id', $getLoanDetails['customar_id'])->get()->row_array();
		if(empty($getbankaccount)) {
			$output=array('error' =>"Unable to found customer bank details!");
		}		

		# Initialize variables
		$config['mailtype'] = 'html';
		$this->email->set_mailtype("html");	

		# Load email library
		$this->load->library('email',$config);				
	
		# build required fields for mail
		$mailFrom = $userDetails['u_email'];
		$mailTo = $getUser['u_email'];
		$subject = "Account Manager Avis favorable for a loan CREDIT CONSO";
		$fromName = $userDetails['user_name'];
		$toName = $getUser['user_name'];
		$body= 'Bonjour,		
			Vous avez en traitement le dossier du prêt Consumer Loan Du client  '.
			$getCustomerDetails['first_name'].' '.
			$getCustomerDetails['middle_name'].' '.
			$getCustomerDetails['last_name'].'  En attente de validation Ayant pour numéro de compte  '.
			$getbankaccount['account_no'].'  cordialement.';
		
		# Send mail 
		$this->email->from($mailFrom,$fromName);
		$this->email->to($mailTo,$toName);
		$this->email->subject($subject);
		$this->email->message($body);		    
		$send = $this->email->send();
		if(!$send) {
			echo 'error' .$this->email->print_debugger();	       
			$output=array('error' =>"Fail to send email!");
		}

		return $output;
	}
	

}