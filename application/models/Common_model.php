<?php 

class Common_model extends CI_Model
{
	public function __construct()
	{
		//$this->not_logged_in();
		parent::__construct();
		$this->load->database();		
		
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
    	echo $this->db->last_query();	
	}

	/**
      * This function is used to get all Records in table
      * @param : $table - table name in which you want to get record 
      * @param : $where  - field name for where clause 
      * @param : $order_by - field for order by asc / desc
      */

	public function getAllRecords($table_name,$where='',$order_by=''){

      if($where){
        $this->db->where($where);
      }
      if($order_by){
        $this->db->order_by($order_by);
      }
      return $result =  $this->db->get_where($table_name)->result_array();
    }

    /**
      * This function is used to get single Record in table
      * @param : $table - table name in which you want to get record 
      * @param : $column - field name of column
      * @param : $where  - field name for where clause 
      
      */
    public function getRecord($table_name,$column='',$where=''){

      $column =  ($column != '')?$column:'*';

      $this->db->select($column);

      if($where){
        $this->db->where($where);
      }
      
       $result =  $this->db->get_where($table_name)->row_array();
       //echo $this->db->last_query();
       
       return $result;
       
    }

	public function get_user_details($user_id){

		return $result = $this->db->get_where('tbl_user',array('id' => $user_id))->row_array();
	}

	public function get_user_branch($user_id){

		$udata = $this->get_user_details($user_id);

		return $branch_data  =  $this->db->get_where('tbl_branch',array('bid' => $udata['branch_id'] ))->row_array();

	}

	public function get_all_nationalities()
	{
		return $result =  $this->db->get('tbl_country_nationality')->result_array();
	}

	/* 
		This function checks if the email exists in the database
	*/
	public function get_admin_details($num=null) {
		//echo "<pre>", print_r($this->session->userdata('role'),1),"</pre>";exit;		
		if($this->session->userdata('role')==2 || $this->session->userdata('role')==3 || $this->session->userdata('role')==13){
			$query=$this->db->select('u.*, b.bid, b.branch_name,u.department')
			->from('user as u')
			->join('branch b','u.branch_id = b.bid','inner')
			->where('u.id', $this->session->userdata('id'))
			->where('u.deleted', 0)
			->where('u.is_admin', $this->session->userdata('role'));
			$result = $this->db->get()->result();
		}else{
			$query=$this->db->select('u.*')
			->from('user as u')
			//->join('branch b','u.branch_id = b.bid','inner')
			->where('u.id', $this->session->userdata('id'))
			->where('u.deleted', 0)
			->where('u.is_admin', $this->session->userdata('role'));
			$result = $this->db->get()->result();
		}
			//echo  $this->db->last_query();
			return $result;	
	}
	
	
	/**
	 * Get Loan Type Details
	 *
	 * @param	array	$params
	 * 
	 * @return 	array
	 */
	public function get_loanTypeDetails($params) 
	{
		# Initialize an array
		$result = [];

		# Query builder
    $this->db->select('*')->from('tbl_loan_of_type');

    # id
    if( isset($params['id']) && strlen($params['id']) > 0) $this->db->where('lid', $params['id']);

    # loan_type
    if( isset($params['loan_type']) && strlen($params['loan_type']) > 0) $this->db->where('loan_type', $params['loan_type']);

    # status
    if( isset($params['status']) && strlen($params['status']) > 0) $this->db->where('status', $params['status']);

    # result query
    $result = $this->db->get()->result_array();
		
		# Return result
		return $result;
	}


	public function send_sms_to_users($sms_phone,$sms_content)
  {
      set_time_limit(0);

      $string = htmlentities($sms_content, null, 'utf-8');
      $sms_content = str_replace("&nbsp;", "", $string);
      $sms_content = html_entity_decode($sms_content);


      $url = 'https://api.cm.com/messages/v1/accounts/549150c7-31e7-4853-9c3f-3badfdfda516/messages';
      $data = array(
                "body"=> $sms_content,
                "recipients"=> array(array('msisdn' => $sms_phone )),
                "senders"=> array("DCP")
              );

      //print_r($data);

 
      // Initializes a new cURL session
      $curl = curl_init($url);
      // Set the CURLOPT_RETURNTRANSFER option to true
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      // Set the CURLOPT_POST option to true for POST request
      curl_setopt($curl, CURLOPT_POST, true);
      // Set the request data as JSON using json_encode function
      curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));
      // Set custom headers for RapidAPI Auth and Content-Type header
      curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Accept: application/json, text/json',
        'Content-Type: application/json',
        'X-CM-PRODUCTTOKEN: F4CAEDBC-C2AE-47E4-BA47-B6DB6BAE427E'
      ]);
      // Execute cURL request with all previous settings
      $response = curl_exec($curl);

     // print_r($response);

      curl_close($curl);

  }

   public function send_mail_to_users($to,$subject,$message_body){
         
       $smtp_data =  $this->getRecord('tbl_smtp_connection');

       $config = Array(
            'protocol' => 'mail',
            'smtp_host' => $smtp_data['host'],
            'smtp_port' => $smtp_data['port'],
            'smtp_user' => $smtp_data['username'], // change it to yours
            'smtp_pass' => $smtp_data['password'], // change it to yours
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE
        );
         
	      # Load email library
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');				

        # build required fields for mail
        $mailFrom = $smtp_data['username'];
        $mailTo = $to;
        $subject = $subject;
        $fromName = 'GABON';
        $body= $message_body; 


        # Send mail 
        $this->email->from($mailFrom);
        $this->email->to($mailTo);
        $this->email->subject($subject);
        $this->email->message($body);		    
        $send = $this->email->send();
        if(!$send) {
                echo 'error' .$this->email->print_debugger();	       
                $output=array('error' =>"Fail to send email!");
        }
        else{
        	$output=array('success' =>"Mail Sent Successfully");
        }

        //print_r($output);

       // return $output;
		
    }
    
    public function send_mail_to_users2($to,$subject,$message_body){
         
       $smtp_data =  $this->getRecord('tbl_smtp_connection');

       $config = Array(
            'protocol' => 'mail',
            'smtp_host' => $smtp_data['host'],
            'smtp_port' => $smtp_data['port'],
            'smtp_user' => $smtp_data['username'], // change it to yours
            'smtp_pass' => $smtp_data['password'], // change it to yours
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );
         
	      # Load email library
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->set_header('MIME-Version', '1.0; charset=utf-8');
        $this->email->set_header('Content-type', 'text/html');				

        # build required fields for mail
        $mailFrom = $smtp_data['username'];
        $mailTo = $to;
        $subject = $subject;
        $fromName = 'GABON';
        $body= $message_body; 


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
        else{
        	$output2=array('success' =>"Mail Sent Successfully");
        }


        return $output2;
		
    }
    
    public function get_current_status($loan_id,$loan_type,$role_id){
        $check_user = $this->db->query("SELECT tbl_loan_assignee.*,tbl_user.id as user_id,tbl_user.user_name,tbl_user.is_admin,tbl_user.type FROM `tbl_loan_assignee` inner join tbl_user on tbl_loan_assignee.assign_user_id = tbl_user.id WHERE loan_id = '$loan_id' AND loan_type='$loan_type' AND tbl_user.is_admin = '$role_id'  AND currently_active = '1'")->row_array();
        //print_r($check_other_user);  
        if(!empty($check_user) && $check_user['user_id'] != $this->session->userdata('id'))
        {
          return true;
        }
        else if(!empty($check_user) && $check_user['user_id'] == $this->session->userdata('id'))
        {
           return false;
        }
        else{
           return true;
        }
      
    }
    
    public function get_maximum_salary_residuel($avg_sal_residuel){
        
        if($avg_sal_residuel >= 150000 && $avg_sal_residuel <= 200000){
            $avg_amount  = 300000;
        }
        else if($avg_sal_residuel >= 200001 && $avg_sal_residuel <= 400000){
            $avg_amount  = 500000;
        }
        else if($avg_sal_residuel >= 400001 && $avg_sal_residuel <= 600000){
            $avg_amount  = 750000;
        }
        else if($avg_sal_residuel >= 600001 && $avg_sal_residuel <= 800000){
            $avg_amount  = 1000000;
        }
        else if($avg_sal_residuel >= 800001 && $avg_sal_residuel <= 1000000){
            $avg_amount  = 1500000;
        }
        
        return $avg_amount;
    }
    
    public function check_assignedrole_workflow($type,$role_id,$loan_id){
        
        $result = $this->db->get_where('tbl_all_applications',array('loan_id' => $loan_id,'loan_type' => $type,'assigned_roles' => $role_id,'status' => '1'))->result_array();
        return $result;
    }
    
    public function get_bureau_value($bureau){
        if($bureau == "DIRECTION GENERALE"){
            return "DIRECTION_GENERALE";
        }
        else if($bureau == "Groupe AGENCE CENTRALE"){
            return "Groupe_AGENCE_CENTRALE";
        }
        else if($bureau == "Prima"){
            return "Prima";
        }
        else if($bureau == "RR"){
            return "RR";
        }
        else if($bureau == "Devenir"){
            return "Devenir";
        }
        else if($bureau =="Prestige"){
            return "Prestige";
        }
        else if($bureau == "Front de Mer ADL" || $bureau == "Front de Mer (ADL)"){
            return "Front_de_Mer_ADL";
        }
        else if($bureau == "Louis"){
            return "Louis";
        }
        else if($bureau =="Okala"){
            return "Okala";
        }
        else if($bureau =="Oloumi"){
            return "Oloumi";
        }
        else if($bureau =="Owendo"){
            return "Owendo";
        }
        else if($bureau =="Université"){
            return "Université";
        }
        else if($bureau =="Mont_Bouet"){
            return "Mont_Bouet";
        }
        else if($bureau =="Nzeng-Ayong"){
            return "Nzeng-Ayong";
        }
        else if($bureau =="First"){
            return "First";
        }
        else if($bureau =="Gamba"){
            return "Gamba";
        }
        else if($bureau =="DAHU"){
            return "DAHU";
        }
        else if($bureau =="Moanda"){
            return "Moanda";
        }
        else if($bureau =="Franceville"){
            return "Franceville";
        }
        else if($bureau =="Mouila"){
            return "Mouila";
        }
       
        
    }
}