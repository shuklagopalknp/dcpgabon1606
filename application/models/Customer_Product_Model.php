<?php 
class Customer_Product_Model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Common_model');	
	}
	public function get_loan_details_branchwise($table)
	{
	    $user_data =  $this->Common_model->get_user_details($this->session->userdata('id'));
		$role_id  =  $user_data['is_admin'];
		
		$this->db->select('g.loan_id,g.user_id created_by,g.application_no,g.sub_product,g.customer_data,g.created_at,g.modified_at,b.branch_name,g.department,g.customer_type,g.final_status,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg');
		$this->db->from('$table as g');
		$this->db->join('tbl_user as u','u.id = g.user_id','left');
		$this->db->join('tbl_branch as b','b.bid = g.branch_id','left');
		$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','left');
		
		if($role_id=='2'){
			$this->db->where('g.user_id',$this->session->userdata('id'));
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}
		if($role_id == '3')
		{
			$this->db->where('g.branch_id',$user_data['branch_id']);
		}

		$this->db->where('g.deleted','0');
		$this->db->order_by('g.loan_id','desc');
		$result =  $this->db->get()->result_array();

		return $result ;
	}
	
	public function get_single_loan_details($table,$loan_id)
	{
		$role_id  =  $this->session->userdata('role');
		// $this->db->select('g.*,b.branch_name,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg,app.workflow_order,app.assigned_roles,app.review,app.approval_status,at.*');
		$this->db->select('g.*,g.status as loanstatus,b.branch_name,loan.loan_amt,loan.loan_interest,loan.loan_term,loan.loan_schedule,loan.loan_fee,loan.loan_tax,loan.teg_rate,loan.wear_rate,loan.created,loan.loan_guarantee,loan.annual_teg,loan.periodic_teg,loan.loan_object,at.*');
		$this->db->from('$table as g');
		$this->db->join('consumer_amortization as at','at.applicationform_id = g.loan_id_temp','left');
		$this->db->join('tbl_branch as b','b.bid = g.branch_id','inner');
		//$this->db->join('tbl_all_applications as app','app.loan_id =  g.loan_id','left');
		$this->db->join('tbl_temp_consumer_applicationform as loan','loan.aid = g.loan_id_temp','inner');
		$this->db->where(array('g.loan_id'=> $loan_id));
		
		$result =  $this->db->get()->row_array();

		return $result ;
	}
	
	public function get_approval_decision_details($loan_id,$type){

// 		$this->db->select('tbl_all_applications.*,u.first_name,u.last_name,r.name');
// 		$this->db->join('tbl_user as u','u.id = tbl_all_applications.user_id','inner');
// 		$this->db->join('tbl_role as r','u.is_admin =  r.id','inner');
// 		$this->db->order_by('workflow_order','desc');
// 		return $result  =  $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'review' => 1))->result_array();

        $this->db->select('tbl_decision_comment.*,u.first_name,u.last_name,r.name');
		$this->db->join('tbl_user as u','u.id = tbl_decision_comment.user_id','inner');
		$this->db->join('tbl_role as r','u.is_admin =  r.id','inner');
		$this->db->order_by('comment_id','desc');
        $result  =  $this->db->get_where('tbl_decision_comment',array('loan_id' => $loan_id,'loan_type' => $type))->result_array();

       // echo $this->db->last_query();die;
        return $result;
	}
	
	public function get_tracking_details($table,$loan_id)
	{
		$this->db->select('track.timeline_id,track.loan_id,track.type,track.comment,track.content_type,track.created_at,user.first_name,user.last_name');
		$this->db->from('tbl_business_tracking_timeline as track');
		$this->db->join('$table as loan','loan.loan_id = track.loan_id','inner');
		$this->db->join('tbl_user as user','user.id =  track.user_id','inner');
		$this->db->where('track.loan_id',$loan_id);
		$this->db->where('track.product_type','credit_scolair');	
		return $result  =  $this->db->get()->result_array();
	}
	
	public function get_interaction_history($loan_id,$type){
		$result['email']  =  $this->db->get_where('tbl_customer_interaction_history',array('loan_id' => $loan_id,'type' => "credit_scolair",'mode' =>  "email"))->result_array();

		$result['sms']  =  $this->db->get_where('tbl_customer_interaction_history',array('loan_id' => $loan_id,'type' => "credit_scolair",'mode' =>  "sms"))->result_array();

		$result['interview']  =  $this->db->get_where('tbl_customer_interaction_history',array('loan_id' => $loan_id,'type' => "credit_scolair",'mode' =>  "interview_telephone"))->result_array();

		return $result;

	}
	
	public function get_overall_loan_status($table,$loan_id){

		$d_where  =  array('loan_id' => $loan_id,'loan_type' => "credit_scolair",'review !='=>NULL,'status' => "1");
		$this->db->select('tbl_all_applications.approval_status,tbl_all_applications.user_type,tbl_all_applications.workflow_order,r.name,');
	    $this->db->order_by('workflow_order','desc');
	    $this->db->limit('1');
	    $this->db->join('tbl_role as r','r.id = tbl_all_applications.assigned_roles','inner');
	    $app_status = $this->db->get_where('tbl_all_applications',$d_where)->row_array();

	    $d_where1  =  array('loan_id' => $ld['loan_id'],'loan_type' => "credit_scolair",'status' => "1");
	    $this->db->order_by('workflow_order','desc');
	    $this->db->limit('1');
	    $last_data =  $this->db->get_where('tbl_all_applications',$d_where1)->row_array();


	    $l_where = array('loan_id' => $loan_id);
	    $loan = $this->db->get_where($table,$l_where)->row_array();

        if($loan['final_status'] == "Annulé" || $loan['final_status'] == "Abandonner")
        {
            return $loan['final_status'];
        }
        else if($loan['final_status'] == "Disbursement")
		{
			if($app_status['user_type'] == "cic")
				return "Mise a Disposition - CIC ";
	    	else 
				return  "Mise a Disposition -".$app_status['name'];
		}
		else{
		    if(!empty($app_status)){
    			if($app_status['approval_status'] == "Process")
	    		{
	    			if($app_status['user_type'] == "cic")
						return "Traitement en Cours - CIC ";
			    	else 
	    				return "Traitement en Cours -".$app_status['name'];
	    		}
	    		else if($app_status['approval_status'] == "Avis Favorable"){
	    			if($app_status['user_type'] == "cic")
						return "Avis Favorable - CIC ";
	    			else 
	    				return "Avis Favorable -".$app_status['name'];
	    		}
	    		else if($app_status['approval_status'] == "Avis défavorable")
				{
					if($app_status['user_type'] == "cic")
						return "Avis Défavorable - CIC ";
	    			else 
						return "Avis Défavorable -".$app_status['name'];
				}
				else if($app_status['approval_status'] == "Confirm Disbursement")
				{
					if($app_status['user_type'] == "cic")
						return "Confirm Disbursement - CIC ";
	    			else 
						return "Confirm Disbursement -".$app_status['name'];
				}
				else if($app_status['approval_status'] == "Demande de retraitement")
				{
					if($app_status['user_type'] == "cic")
						return "Demande de Retraitement - CIC ";
	    			else 
						return "Demande de Retraitement -".$app_status['name'];
				}
				else {

					if($app_status['user_type'] == "cic")
						return "Initiation en Cours - CIC ";
	    			else 
						return "Initiation en Cours -".$app_status['name'];
				}
		    }
		    else {
		    	if($app_status['user_type'] == "cic")
					return "Initiation en Cours - CIC ";
	    		else 
		        	return "Initiation en Cours -".$app_status['name'];
		    }
		}

	}

	
}