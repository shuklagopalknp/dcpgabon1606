<?php

class PP_Escompte_Loan_Model extends CI_Model
{
	public function __construct()
	{
		# constructor
		parent::__construct();

		# Load database
		$this->load->database();

		# Set deafult timezone
		date_default_timezone_set('Asia/Kolkata');
	}

/* ======================================================= */ 
/* ================== PP ESCOMPTE MODEL ================== */
/* ======================================================= */
    
	/**
	 * This method is used to insert records based on provided table name & fields
	 *
	 * @param 	string	$table	- table name
	 * 
	 * @param 	array		$data		-	array of fields
	 * 
	 * @return 	string
	 */
	public function insert($table, $data)
	{
		# Insert row
		$this->db->insert($table, $data);	
		
		# Get insert Id
		$insertedId = $this->db->insert_id();

		# return response id - string
		return $insertedId ?? "";
  }
  
  /**
	 * get loans
	 *
	 * @param		array		$params
	 * 
	 * @return	array
	 */
	public function get_loans($params)
	{
		# Initialize an array
		$result = [];

		# Query builder
    $this->db->select('*')->from('tbl_escompte_loans_applicationforms');

    # id
    if( isset($params['id']) && strlen($params['id']) > 0) $this->db->where('el_id', $params['id']);

    # admin_id
    if( isset($params['admin_id']) && strlen($params['admin_id']) > 0) $this->db->where('admin_id', $params['admin_id']);

    # society_id
    if( isset($params['society_id']) && strlen($params['society_id']) > 0) $this->db->where('society_id', $params['society_id']);

    # application_no
    if( isset($params['application_no']) && strlen($params['application_no']) > 0) $this->db->where('application_no', $params['application_no']);

    # loan_type
    if( isset($params['loan_type']) && strlen($params['loan_type']) > 0) $this->db->where('loan_type', $params['loan_type']);

    # loan_status
    if( isset($params['loan_status']) && strlen($params['loan_status']) > 0) $this->db->where('loan_status', $params['loan_status']);

    # result query
    $result = $this->db->get()->result_array();
		
		# Return result
		return $result;
  }

	/**
	 * get socities
	 *
	 * @param		array		$params
	 * 
	 * @return	array
	 */
	public function get_socities($params)
	{
		# Initialize an array
		$result = [];

		# Query builder
    $this->db->select('*')->from('tbl_escompte_all_societes');

    # id
    if( isset($params['society_id']) && strlen($params['society_id']) > 0) $this->db->where('society_id', $params['society_id']);

    # admin_id
    if( isset($params['admin_id']) && strlen($params['admin_id']) > 0) $this->db->where('admin_id', $params['admin_id']);

    # account_number
    if( isset($params['account_number']) && strlen($params['account_number']) > 0) $this->db->where('account_number', $params['account_number']);

    # result query
    $result = $this->db->get()->result_array();
		
		# Return result
		return $result;
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
	public function check_amortization($id){		
		if($id) {
			$query=$this->db->select('applicationform_id,activate')
			->from('consumer_amortization')
			->where('id', $id)
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
			->where('loan_type',1)
			->get();
			//echo $this->db->last_query();			
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

	public function get_pprange()
	{		
		$query=$this->db->select('*')
		->from('loan_range')			
		->where('lid', 1)	
		->limit(1)		
		->get();
		//echo  $this->db->last_query();	
		//return $query->row();
		return $query->result_array();			
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

  	/**
      * This function is used to delete record from table
      * @param : $id record id which you want to delete
      */
	public function delete_data($table, $array='') {
		$this->db->where($array);
    	$this->db->delete($table);
    	//echo $this->db->last_query();	
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

	public function get_new_application_form()
	{
		
		$query=$this->db->select('a.*,
			u.first_name,
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
			->where('a.admin_id', $this->session->userdata('id'))
			->order_by("a.modified desc")							
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

	public function get_bankdetails(){
		$query=$this->db->select('c.*, cp.*')
			->from('customers as c')
			->join('customer_personalinformation cp','c.cid = cp.customar_id','inner')
			->where('c.status', 1)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	

	public function get_customers_details($accountno){
		$query=$this->db->select('*')
			->from('customers')
			->where('status', 1)
			->where("account_number LIKE '%$accountno%'")
			//->where('account_number', $accountno)
			//->like('account_number', $accountno)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
		}

	public function get_customar_details($id){
		$query=$this->db->select('a.*, u.first_name,l.loan_type as ltype,t.tax_type,t.tax_rate, at.*')
			->from('consumer_loans_applicationform  a')
			->join('user u','a.admin_id = u.id','inner')
			->join('amortization at','a.amortization_id = at.id','left')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
			->where('a.deleted', 0)
			->where('a.admin_id', $this->session->userdata('id'))
			->where('a.cl_aid', $id)						
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

	public function get_Post_temp_applicationform($id)
	{
		$query=$this->db->select('*')
			->from('temp_consumer_applicationform')
			->where('status', 1)
			->where('aid', $id)	
			->limit(1)			
			->get();			
			return  $query->result_array();
			
	}

	public function test_amortization($id)
	{
		$query=$this->db->select('*')
			->from('consumer_amortization')			
			->where('id', $id)	
			->limit(1)			
			->get();			
			return $query->result_array();
			//return $query[0];
			
	}

	public function get_amortization_record($id)
	{
		$query=$this->db->select('*')
			->from('consumer_loans_applicationform ')			
			->where('deleted', 0)
			->where('cl_aid', $id)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_amortization_befor_record($id)
	{
		$query=$this->db->select('a.*,t.*')
			->from('consumer_amortization AS a')
			->join('tbl_temp_consumer_applicationform as t','a.applicationform_id=t.aid','inner')
			->where('a.status', 1)
			->where('t.aid', $id)
			->where('t.loan_type',1)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	public function get_amortization_after_record($id)
	{
		$query=$this->db->select('*')
			->from('consumer_loans_applicationform')			
			->where('deleted', 0)
			->where('cl_aid', $id)
			->where('loan_type',1)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}
	

	
	public function get_amortization_id($id){		
		$qry = $this->db->select('id')
                  ->get_where('consumer_amortization', array('id' => $id,'deleted'=>'0'))
                  ->row();
               // echo  $this->db->last_query();
        return $qry; 
	}
	public function get_autoamortization_id($id){		
		$qry = $this->db->select('id')
                  ->get_where('consumer_amortization', array('applicationform_id' => $id,'deleted'=>'0'))
                  ->row();
                //echo  $this->db->last_query();
        return $qry; 
	}
	
	public function get_temp_applicationformRecord($segment){
		//$this->input->post('segment');
		$query=$this->db->select('application_no,ip_address,loan_type,loan_amt,loan_interest,loan_term,loan_schedule,loan_fee,loan_tax,loan_commission,created')
			->from('temp_consumer_applicationform')
			->where('status',1)
			->where('aid',$segment)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();

	}
	public function get_tracking_timeline($loanid){
		$adminid=$this->session->userdata('id');
		$query=$this->db->select(
			't.id,
			t.comment, 
			t.created,
			t.cl_aid, 
			t.loan_type,
			t.content_type, 
			u.type,
			u.is_admin,
			u.first_name,
			u.last_name,
			r.field_data,')
			->from('tracking_timeline  t')	
			->join('user u','t.admin_id = u.id','inner')
			->join('role r','u.is_admin = r.id','left')		
			->where('t.cl_aid', $loanid)
			->where('t.loan_type',1)
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();

	}

	public function get_checkfieldandvalue($id){
		$query=$this->db->select('*')
			->from('consumer_loans_applicationform')					
			->where('cl_aid', $id);						
			$result = $this->db->get()->result();
			return $result;
	}
	public function get_taxname($id)
	{		
		$query="SELECT tid, tax_type FROM tbl_loan_of_taxes WHERE tid IN($id)";			
		$result = $this->db->query($query); 
		$this->db->get()->result();
		return $query->result_array();
			
		
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
			->where('loan_type', 1)
			->where('section', 1)			
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}
	
	public function get_risk_analysisfile($id){
		$query=$this->db->select('*')
			->from('riskanalysis')			
			->where('cl_aid', $id)
			->where('loan_type', 1)
			->where('section', 1)			
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}
	public function get_check_list_customer_documents($id){
		$query=$this->db->select('*')
			->from('system_docs')			
			->where('cl_aid', $id)
			->where('loan_type', 1)
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
	public function get_collateral($id)
	{
		$adminid=$this->session->userdata('id');
		$query=$this->db->select('c.*, cf.collateral_id')
			->from('collateral as c')
			->join('collateral_files as cf','c.col_id=cf.collateral_id','inner')
			->where('c.cl_aid', $id)
			->where('c.loan_type',1)		
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
			->where('c.loan_type',1)
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
			->where('c.loan_type',1)
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
			->where('c.loan_type',1)
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
			->where('c.loan_type',1)
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
			->where('cf.loan_type', 1)			
			->where('cf.deleted', 0)				
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
	
	//===============
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
			->where('loan_type', 1)	
			->where('section', 1)
			->get();
						
			return $query->result_array();
	}
	public function get_monthly_payment_new_loan($id){
	$query=$this->db->select('*')
		->from('riskanalysis_monthly_payment_new_loan')			
		->where('cap_id', $id)
		->where('loan_type', 1)	
		->where('section', 1)
		->get();				
		return $query->result_array();
	}
	public function get_financial_situation($id){
		$query=$this->db->select('*')
		->from('riskanalysis_financial_situation')			
		->where('cap_id', $id)
		->where('loan_type', 1)	
		//->where('section', 1)
		->get();
		//echo  $this->db->last_query(); exit;				
		return $query->result_array();
	}
	public function get_applicableloan_ratio(){
		$query=$this->db->select('*')
		->from('tbl_applicableloan_ratio')
		->get();		
		return $query->result_array();
	}

	public function get_consumer_loans_applicationform_details($id){		
		$query=$this->db->select('a.loan_type as loantype, a.*,  u.first_name,l.loan_type as ltype,t.tax_type,t.tax_rate, at.*')
			->from('consumer_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('consumer_amortization at','a.amortization_id = at.id','left')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
			->where('a.deleted', 0)
			->where('a.loan_type', 1)
			//->where('a.admin_id', $this->session->userdata('id'))
			->where('a.cl_aid', $id)
			->get();
			//echo  $this->db->last_query();exit;
			return $query->result_array();
	}

	public function get_decision_record($id){		
		$query=$this->db->select('b.*,u.*, r.field_data')
			->from('branmanager_approbation as b')	
			->join('user u','b.manager_id = u.id','inner')	
			->join('role r','u.is_admin = r.id','inner')		
			//->where('manager_id', $this->session->userdata('id'))
			->where('b.loan_id',$id)
			->where('b.loantype',1)
			->order_by("b.bmid", "desc")
			->get();
			//echo  $this->db->last_query();			
		return $query->result_array();
	}

	public function get_customerdetails_list(){
		$query=$this->db->select('c.*, cp.*, ,cl.customar_id, cl.loan_amt, cl.loan_term, cl.loan_schedule,cl.loan_status,c.created,st.state_id')
			->from('customers as c')
			->join('customer_address st','c.cid = st.customar_id','inner')
			->join('customer_personalinformation cp','c.cid = cp.customar_id','inner')
			->join('consumer_loans_applicationform cl','c.cid = cl.customar_id','inner')
			->where('c.status', 1)
			->group_by(array("c.cid", "cl.customar_id")) 
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_customar_applicationform_details($id){		
		$query=$this->db->select('a.loan_type as loantype, a.*,  u.first_name,l.loan_type as ltype,t.tax_type,t.tax_rate, at.*')
			->from('consumer_loans_applicationform a')
			->join('user u','a.admin_id = u.id','inner')
			->join('consumer_amortization at','a.amortization_id = at.id','left')
			->join('loan_of_type l','a.loan_type = l.lid','left')
			->join('loan_of_taxes t','a.loan_tax = t.tid','left')			
			->where('a.deleted', 0)
			->where('a.loan_type', 1)
			->where('a.cl_aid', $id)
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	public function get_account_details($keyword){
		$query=$this->db->select('c.*, cp.*')
			->from('customers as c')
			->join('customer_personalinformation cp','c.cid = cp.customar_id','inner')
			->where('c.status',1)
			->where("c.account_number LIKE '%$keyword%'")
			//->where('c.account_number', $keyword)
			->order_by('c.cid', 'DESC')
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_amortization_record2($id)
	{
		$query=$this->db->select('*')
			->from('consumer_loans_applicationform')
			->where('deleted', 0)
			->where('cl_aid', $id)	
			->limit(1)		
			->get();
			//echo  $this->db->last_query();
			return $query->result_array();
	}

	public function get_edit_customar_applicationform($id)
	{
		$query=$this->db->select('*')
			->from('tbl_consumer_loans_applicationform')						
			->where('deleted', 0)
			->where('cl_aid',$id)								
			->get();			
			return $query->result_array();
	}
	public function get_customerdata_info($customerid)
	{
		$query=$this->db->select('c.*,cp.*, ca.*,ce.*,cad.*,cba.*,coi.*')
			->from('tbl_customers c')
			->join('customer_personalinformation cp','c.cid = cp.customar_id','inner')
			->join('customer_additionalinformation ca','c.cid = ca.customar_id','left')
			->join('customar_employment_information ce','c.cid = ce.customar_id','left')
			->join('customer_address cad','c.cid = cad.customar_id','left')
			->join('customar_bank_account cba','c.cid = cba.customar_id','left')
			->join('customar_other_information coi','c.cid = coi.customar_id','left')			
			->where('c.cid', $customerid)
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	public function checkloanstatuslist($params)
	{
		if($params!="All")
		{
			$this->db->select(
				'a.*,
				u.first_name,
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
			->join('amortization at','a.amortization_id = at.id','left')
			->join('customer_personalinformation pi','pi.customar_id = a.customar_id','left')
			->where('a.deleted', 0)
			->where('a.loan_type', 1)
			->where('a.admin_id', $this->session->userdata('id'));			
			if($params != '') {
				$this->db->like('a.loan_status', $params);				
  			}
  			$this->db->order_by('a.cl_aid', 'DESC');								
			$query=$this->db->get();	
			//echo  $this->db->last_query();			
			return $query->result_array();
		}else{
			return $this->get_new_application_form();
		}
	}

	public function get_check_list_documents_enabeldisabel($id='')
	{
		$query=$this->db->select('*')
			->from('credit_conso_checklistbutton_enable_disable')			
			->where('loan_id', $id)
			->where('loan_type', 1)					
			->get();
			//echo  $this->db->last_query();			
			return $query->result_array();
	}

	public function get_enableddisabled_documentbutton_ckeck($id='')
	{
		$query=$this->db->select('*')
			->from('credit_conso_checklistbutton_enable_disable')					
			->where('loan_id', $id);						
			$result = $this->db->get()->result();
			return $result;
	}

	


}