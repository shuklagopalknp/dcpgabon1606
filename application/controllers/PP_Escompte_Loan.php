<?php
class PP_Escompte_Loan extends Admin_Controller 
{
	public function __construct()
	{
    # Parent constructor
    parent::__construct();
    
    # load login status
    $this->not_logged_in();
    
    # load page name
    $this->data['page'] = 'PP Escompte Loans';
    
    # load libraries
    $this->load->library('session');
    $this->load->library('Class_Amort');

    # load models
    $this->load->model('Common_model');
    $this->load->model('PP_Consumer_Loans_Model');
    $this->load->model('PP_Escompte_Loan_Model');
        
    # load helpers
    $this->load->helper('lang_translate');
		$this->load->helper('timeAgo');
    $this->load->helper(array('dompdf', 'file'));
        
    # Load default time to GMT
		date_default_timezone_set('GMT');
  }
    
/* ================== Index page method for escompte ================== */
/* ================== method name: PP_Escompte ======================== */    
    
  /* 
	* 
	*/
  public function PP_Escompte()
  {
    # Get title        
		$this->data['title'] = 'DCP - PP ESCOMPTE';
		
		# get loans & there society
		$loans = $this->PP_Escompte_Loan_Model->get_loans([]);
		$loansTemp = [];
		foreach($loans as $loan) {
			$getSociety = $this->PP_Escompte_Loan_Model->get_socities(['society_id'=>$loan['society_id']]);
			if(!empty($getSociety)) {
				$loan['_society'] = $getSociety[0];
			}
			$loansTemp[] = $loan;
		}
        
    # Get required data to send to view
		$this->data['record'] = $this->Common_model->get_admin_details();
		$this->data['loans'] = $loansTemp;
        
    # Render template to pp escompte
    $this->render_template2('escompte/pp_escompte', $this->data);
  }

  /* 
	* Get all list of socities based on params
	*/
  public function PP_Escompte_Select_Societe()
  {
    # Get title        
    $this->data['title'] = 'DCP - PP ESCOMPTE';

    # User id
    $userId = $this->session->userdata('id');
    
    # Get required data to send to view
    $this->data['record']=$this->Common_model->get_admin_details($userId);
    $this->data['socities']=$this->PP_Escompte_Loan_Model->get_socities([]);
      
    # Render template to pp escompte
    $this->render_template2('escompte/pp_escompte_select_societe', $this->data);
  }
	
	/* 
	* 
	*/
	public function add_societe()
	{
    # Check this society was already have a loan or not
    // TODO
    
    # Prepare body
    $body = [];
    $body['admin_id'] = $this->session->userdata('id');
    $body['nom_entreprise'] = $this->input->post('nom_entreprise') ?? "";
    $body['date_de_creation'] = $this->input->post('date_de_creation') ?? "";
    $body['statut'] = $this->input->post('statut') ?? "";
    $body['numero_immatriculation'] = $this->input->post('numero_immatriculation') ?? "";
    $body['adresse'] = $this->input->post('adresse') ?? "";
    $body['capital'] = $this->input->post('capital') ?? "";
    $body['numero_du_compte_contrinuable'] = $this->input->post('numero_du_compte_contrinuable') ?? "";
    $body['secteur_activite'] = $this->input->post('secteur_activite') ?? "";
    $body['telephone'] = $this->input->post('telephone') ?? "";
    $body['fax'] = $this->input->post('fax') ?? "";
    $body['email'] = $this->input->post('email') ?? "";
    $body['nombre_de_salarie'] = $this->input->post('nombre_de_salarie') ?? "";
    $body['site_internet'] = $this->input->post('site_internet') ?? "";
    $body['principal_dirigeant'] = $this->input->post('principal_dirigeant') ?? "";
    $body['type_de_compte'] = $this->input->post('type_de_compte') ?? "";
    $body['agence_bancaire'] = $this->input->post('agence_bancaire') ?? "";
    $body['date_ouverture'] = $this->input->post('date_ouverture') ?? "";
    $body['code_banque'] = $this->input->post('code_banque') ?? "";
    $body['code_agence'] = $this->input->post('code_agence') ?? "";
    $body['numero_compte'] = $this->input->post('numero_compte') ?? "";
    $body['cle_rib'] = $this->input->post('cle_rib') ?? "";
    $body['ip_address'] = $_SERVER['REMOTE_ADDR'] ?? "";

    # Insert record
		$insertSociete = $this->PP_Escompte_Loan_Model->insert('tbl_escompte_all_societes',$body);
		if(!empty($insertSociete)) {
      $result['success'] = "Successfully created societe!";
    } else {
      $result['success'] = "unknown error!";
    }
    
    # Print result
    echo json_encode($result);
  }
  
  #
	## After clicking on select of the society
	#
  public function select_societe($societyId)
  {
    # Create escompte loan
    $societyId = $societyId;
    $getLoanType = $this->Common_model->get_loanTypeDetails(['loan_type'=>'Escompte Loan']);

    # Create body for creating a loan for escompte
    $body = [];
    $body['admin_id'] = $this->session->userdata('id');
    $body['society_id'] = $societyId;
    $body['application_no'] = round(microtime(true)*1000);
    $body['ip_address'] = $_SERVER['REMOTE_ADDR'] ?? "";
    $body['loan_type'] = isset($getLoanType[0]) ? $getLoanType[0]['lid'] : 5;
    $body['filename'] = "";
    $body['appliedformdata'] = "";
    $body['loan_status'] = "Initiated";
    $body['a_review'] = 0;
    $body['branchmanager_status'] = "Initiated";
    $body['b_review'] = 0;
    $body['dcpranalyst_status'] = "Initiated";
    $body['an_review'] = 0;
    $body['dcpr_status'] = "Initiated";
    $body['h_review'] = 0;
    $body['director_engagements'] = "Initiated";
    $body['d_review'] = 0;
    $body['cic_status'] = "Initiated";
    $body['c_review'] = 0;
    $body['cad_status'] = "Initiated";
    $body['cad_review'] = 0;
    $body['cad_data'] = "";
    $body['cadagent_status'] = "Initiated";
    $body['ca_review'] = "";
    $body['cadagent_data'] = "";
    $body['operating_director_status'] = "Initiated";
    $body['od_review'] = 0;
    $body['final_confirmation'] = "Pending";
    $body['check_vehicule'] = 1;
    $body['check_deposit'] = 1;
    $body['check_excemption'] = 1;
    $body['check_maison'] = 1;
    $body['deleted'] = 0;
    
    # Insert record
		$insertappForm = $this->PP_Escompte_Loan_Model->insert('tbl_escompte_loans_applicationforms',$body);
		if(empty($insertappForm)) {
      echo "Failed to create appplication form!";exit;
    }

    # Get html agreement
    $getHtmlagreement=$this->generate_nouveau_pret_escompte($societyId);
    
    # print agreement
		echo $getHtmlagreement;
	}

	/**
	 * generate_nouveau_pret_escompte data sender
	 *
	 * @param		id		$societyId
	 * 
	 * @return  view
	 */
	##  generate_nouveau_pret_escompte data sender
	#
	public function generate_nouveau_pret_escompte($societyId)
	{
    # error reporting
		error_reporting(0);
    
    # Get required details to send to view doc.
		$this->data['admindetails']=$this->Common_model->get_admin_details();
    
    # return to view
		return  $this->load->view('escompte/NOUVEAU-PRET-ESCOMPTE',$this->data,true);
	}

	/**
	 * Undocumented function
	 *
	 * @return void
	 */
	public function Search_Escompte_Loan_Status()
	{
		# Get searched field name
		$search = trim($this->input->post('filter'));

		# Get loans
		# Get title        
		$this->data['title'] = 'DCP - PP ESCOMPTE';
		
		# get loans & there society
		if($search == "All") {
			$getLoans = $this->PP_Escompte_Loan_Model->get_loans([]);
		} else {
			$getLoans = $this->PP_Escompte_Loan_Model->get_loans(['loan_status'=>$search]);
		}		
		$loansTemp = [];
		foreach($getLoans as $loan) {
			$getSociety = $this->PP_Escompte_Loan_Model->get_socities(['society_id'=>$loan['society_id']]);
			if(!empty($getSociety)) {
				$loan['_society'] = $getSociety[0];
			}
			$loansTemp[] = $loan;
		}
        
    # Get required data to send to view
		$loans = $loansTemp;

		# Initialize variable		
		$rows = [];

		# make sure loans are not empty
		if(empty($loans)) {
			$html="";
			$html .="<tr>
			<td valign=\"top\" colspan=\"10\" class=\"dataTables_empty\">No matching records found!</td>
			</tr>";
			$rows[] = $html;
		}

		# return all found records		
		foreach ($loans as $loan) {
			$html="";
			$html .="<tr>";
			$html .="<td>".$loan['application_no']."</td>";
			$html .="<td>".$loan['_society']['numero_compte']."</td>";
			$html .="<td>".$loan['_society']['agence_bancaire']."</td>";
			$html .="<td>".$loan['_society']['nom_entreprise']."</td>";
			$html .="<td></td>";
			$html .="<td>".$loan['_society']['statut']."</td>";
			$html .="<td></td>";
			if($loan['loan_status']=='Avis défavorable') {
				$label='label label-danger ui-draggable';
			} else if($loan['loan_status']=='Confirm Disbursement') {
				$label='label label-success';
			} else if($loan['loan_status']=='Avis Favorable') {
				$label='label label-info';
			}	else {
				$label="label label-primary";
			}
			$html .="<td>";
			$html .= '<span class="'.$label.'">'.ucwords($loan['loan_status']).'</span>';
			$html .="</td>";
			$html .='<td class="sorting_1">';
			$html .='<a href="#" class="table-link">';
			$html .='<span class="fa-stack">';
			$html .='<i class="fa fa-square fa-stack-2x"></i>';
			$html .='<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>';
			$html .='</span>';
			$html .='</a>';
			$html .='</td>';
			$html .='</tr>';
		
			# push to rows
			$rows[] = $html;
		}

		# print the result
		echo json_encode($rows);
	}

    




































/* ================================================================ */
/* ================= Credit scholar old code ====================== */
/* ================================================================ */



	/* 
	* It only redirects to the manage category page
	* It passes the total product, total paid orders, total users, and total stores information
	into the frontend.
	*/
	public function Creditloan(){
		$this->data['title'] = 'DCP - CREDIT CONSO';			
		$this->data['record']=$this->Common_model->get_admin_details(2);
		$this->data['loantype']=$this->PP_Consumer_Loans_Model->get_loanType();
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['loanrange']=$this->PP_Consumer_Loans_Model->get_pprange();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/consumer_loan', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}
		
		
	}
	function rangeofTax()
	{	
		if(!empty($this->input->post('tval'))){	
		echo $this->PP_Consumer_Loans_Model->get_RangeTax($this->input->post('tval'));
		//echo json_decode($return);
		}else{
			echo 0;
		}		
	}
	public function Overdraft(){	
		$this->data['record']=$this->Common_model->get_admin_details(1);
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/overdraft', $this->data);
	}

	public function add_loan(){
	//	echo "<pre>", print_r($_POST), "</pre>"; exit;

		$ip = $_SERVER['REMOTE_ADDR'];
		$this->form_validation->set_error_delimiters('<span>', '</span>');		
		$this->form_validation->set_rules('loan_amt', 'Loan Amount', 'required');
		$this->form_validation->set_rules('loan_interest', 'Interest', 'required');
		$this->form_validation->set_rules('loan_term', 'Term', 'required');
		$this->form_validation->set_rules('vat_on_interest', 'Tax', 'required');
		$this->form_validation->set_rules('loan_commission', 'loan_commission', 'required');
		if ($this->form_validation->run() == FALSE){
			$errors['error'] = validation_errors();
			echo json_encode($errors);
		}else{		
		$num =round(microtime(true)*1000);
		$data = array(
			'application_no'=>$num,
			'admin_id'=>$this->session->userdata('id'),
			'ip_address' => $ip,
            'loan_type' => $this->input->post('loan_type'),
            'loan_amt' => $this->input->post('loan_amt'),
            'loan_interest' => $this->input->post('loan_interest'),
            'loan_term' => $this->input->post('loan_term'),
            'loan_schedule' => $this->input->post('loan_schedule'),
            'loan_fee' => $this->input->post('loan_fee'),
            'loan_tax' => $this->input->post('vat_on_interest'),
            'loan_commission' => $this->input->post('loan_commission'),
        );
        $result['success']=$this->PP_Consumer_Loans_Model->insertRow('temp_consumer_applicationform',$data);
        echo json_encode($result);
    	}
    }
    
    /*Amortization Section*/
    public function amortization_loan(){
    	$this->data['title'] = 'DCP - CREDIT CONSO TABLEAU AMORTISSMENT';
    	$id=$this->uri->segment(3); //exit;
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_Post_temp_applicationform($id);
    	$this->data['testamortrecord']=$this->PP_Consumer_Loans_Model->test_amortization($id);
    	//echo "<pre>", print_r($this->data['amortrecord']), "</pre>"; exit;
    	$vat_on_interest=$this->data['amortrecord'][0]['loan_tax'] ?: '19.25';    	
    	$validate=$this->PP_Consumer_Loans_Model->check_amortization($id);
    	//echo $validate;
    	if($validate>0){
    		
    		//redirect('PP_Consumer_Loans/Creditloan');
    	} else{
    		
	    	if($this->data['amortrecord'][0]['loan_schedule']=='Monthly'){
				$year=($this->data['amortrecord'][0]['loan_term']/12);
			}else if($this->data['amortrecord'][0]['loan_schedule']=='Yearly'){
				$year=$this->data['amortrecord'][0]['loan_term'];
			}
			else if($this->data['amortrecord'][0]['loan_schedule']=='Half Yearly'){
				$year=$this->data['amortrecord'][0]['loan_term']/6;
			}
			else if($this->data['amortrecord'][0]['loan_schedule']=='Quarterly'){
				$year=$this->data['amortrecord'][0]['loan_term']/3;
			}
			$loan_interest =$this->data['amortrecord'][0]['loan_interest'];
			$rt=($loan_interest*(1+$vat_on_interest/100));
			$curd=date("Y-m-d", strtotime($this->data['amortrecord'][0]['created']));
			$amount=$this->data['amortrecord'][0]['loan_amt'];
			$rate=$rt;
			$years=$year;
	    	$am=new Class_Amort();
	    	$am->amort($amount,$rate,$years,$curd, $loan_interest);
	    	$return_arr=array();

	    	//echo "<pre>", print_r($am), "</pre>"; //exit;

	    	
	    	$return_arr1=array();
			$postyer=$am->years*12;
			$ebal = $am->amount;
			$ccint =0.0;
			$cpmnt = 0.0;
			$cdate=$am->cdate;
			$am->npmts;

			for ($i = 1; $i <= $am->npmts; $i++){
				$bbal = $ebal;    
			    $ipmnt = $bbal * $am->mrate;
			    $ppmnt = $am->pmnt - $ipmnt;
			    $ebal = $bbal - $ppmnt;
			    $ccint = $ccint + $ipmnt;
			    $cpmnt = $am->pmnt;
			    $pbint = $bbal*$am->postinterest/100/12;
			    $vbint = $pbint*19.25/100;
			    $months=$am->npmts;

				$row_array['Pmt'] = $i;					
				$row_array['bbegin_periode'] = $bbal; 
				$row_array['b_end_periode'] = $ebal;
				$row_array['principal_payment'] = $ppmnt; 
				$row_array['interest_paid_tax_incl'] = $ipmnt; 
				$row_array['interest_paid_befor_tax'] = $pbint; 
				$row_array['vat_on_interest'] = $vbint; 
				$row_array['monthly_payment'] = $cpmnt; 
				$row_array['month'] = date("m", strtotime( $cdate." +$i months"));
				$row_array['years'] = date("Y", strtotime( $cdate." +$i months"));		    	
		    	array_push($return_arr,$row_array);
		    }

				//echo "<pre>", print_r($return_arr),"</pre>"; exit;
				$databinding=json_encode($return_arr);
				//$amortizationdatabinding=json_encode($return_arr,JSON_PRETTY_PRINT);	
				//header('Content-Type: application/json');
				// echo "<pre>". $amortizationdatabinding."<pre>"."\n";
				//exit;
				$data = array(
					'applicationform_id'=>trim($this->data['amortrecord'][0]['aid']),
					'admin_id'=>$this->session->userdata('id'),						
		            'loan_type' =>trim($this->data['amortrecord'][0]['loan_type']),
		            'amount' =>$am->amount,
		            'interest' =>$am->postinterest,
		            'rate' =>$am->rate,
		            'years' =>$am->years,
		            'npmts' =>$am->npmts,
		            'mrate' =>$am->mrate,
		            'smrate' =>$am->smrate,
		            'tpmnt' =>$am->tpmnt,
		            'tint' =>$am->tint,
		            'pmnt' =>$am->pmnt,
		            'cdate' =>$am->cdate,
		            'databinding' => $databinding,
		            'activate'=>'active'
		        );
		       // echo "<pre>", print_r($data),"</pre>"; exit;
		    
			$this->PP_Consumer_Loans_Model->insertRow('consumer_amortization',$data);
		}    	
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;		
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/amortization', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
    }

     public function download_temp_amortizationpdf(){
		 $output='';
		  $Locations='';
		  $Rarray='';
		  $users_arr=array();	
		  $segmentid=$this->uri->segment(3); 	  
		  $getHtml=$this->generate_amortization_pdf($segmentid);
		  //echo $getHtml;
		  //exit;
		  $filename='Amortization-Credit-Conso-'.$segmentid.'-'.time();
		  $abc=pdf_po_create_proposal($getHtml,$filename,true);
		  if($abc==1){
		 	$data = array('amortization_pdf'=>$filename.'.pdf');
		  	$validate=$this->PP_Consumer_Loans_Model->check_amortization_files($segmentid);
		  	
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
        		$path_to_file = './assets/consumer_loan/amortization/'.$validate->amortization_pdf;
				if(unlink($path_to_file)) {
				    //echo 'Deleted successfully';
				}
				else {
				    // echo 'errors occured';
				}
        		$edit=$this->PP_Consumer_Loans_Model->updateRow('amortization', 'applicationform_id', $segmentid,$data);
        	}else{
        		$edit=$this->PP_Consumer_Loans_Model->updateRow('amortization', 'applicationform_id', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}
	}

    public function amortizationview()
    {
    	$this->data['title'] = 'DCP - Amortization';	    	
    	$id=$this->uri->segment(3); 
    	$this->data['record']=$this->Common_model->get_admin_details(1);
    	$this->data['amortrecord']=$this->PP_Consumer_Loans_Model->get_amortization_record($id);
    	$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;		
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/amortization_view', $this->data);    	
    }
    public function amortization_view_pdf()
    {
    	$output='';
		  $Locations='';
		  $Rarray='';
		  $users_arr=array();	
		  $segmentid=$this->uri->segment(3); 	  
		  $getHtml=$this->generate_amortization_pdf1($segmentid);
		 // echo $getHtml;
		  $filename='Amortization-Credit-Conso-'.$segmentid.'-'.time();
		  //$filename='amortization_'.$segmentid.'_'.time();
		  $abc=pdf_po_create_proposal($getHtml,$filename,true);
		  if($abc==1){
		 	$data = array('amortization_pdf'=>$filename.'.pdf');
		  	$validate=$this->PP_Consumer_Loans_Model->check_amortization_files($segmentid);
		  	
		  	if(!empty($validate->amortization_pdf) || $validate->amortization_pdf !=null){		  	
        		$path_to_file = './assets/consumer_loan/amortization/'.$validate->amortization_pdf;
				if(unlink($path_to_file)) {
				    //echo 'Deleted successfully';
				}
				else {
				    // echo 'errors occured';
				}
        		$edit=$this->PP_Consumer_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);
        	}else{
        		$edit=$this->PP_Consumer_Loans_Model->updateRow('tbl_consumer_amortization', 'applicationform_id', $segmentid,$data);       		
        		
        	}
			//echo 1;			
		}

    }    

   
	function generate_amortization_pdf($segmentid){		
		$this->data['amortizationdata']=$this->PP_Consumer_Loans_Model->get_amortization_befor_record($segmentid);
		return  $this->load->view('superadmin/amortization_pdf_generate',$this->data,true);
	}
	function generate_amortization_pdf1($segmentid){		
		$this->data['amortizationdata']=$this->PP_Consumer_Loans_Model->get_amortization_after_record($segmentid);
		return  $this->load->view('superadmin/amortization_pdf_generate',$this->data,true);
	}
	public function select_customer()
	{
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['branch_record']=$this->PP_Consumer_Loans_Model->get_All_branch();
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['bankdetails']=$this->PP_Consumer_Loans_Model->get_bankdetails();
		$this->data['title'] = 'DCP - Customer Verification';
		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/consumerloans_select_customer', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}

		/*$this->data['title'] = 'DCP - Select Customer';
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id != 2) ? true :false;
		$this->data['bankdetails']=$this->PP_Consumer_Loans_Model->get_bankdetails();
		$this->data['title'] = 'DCP - Customer Verification';
		$this->render_template2('superadmin/consumerloansselect_customer', $this->data);*/
	}

	public function customer_details()
	{
		error_reporting(0);
        //ini_set('display_errors', 0);
		$this->data['page'] = 'cc Loan';	
		$this->data['record']=$this->Common_model->get_admin_details();
		$user_id = $this->session->userdata('id');
		$id=$this->uri->segment(3);	
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_consumer_loans_applicationform_details($id);
		//print_r($this->data['appformD'][0]['customar_id']);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();

		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		$this->data['sys_docs']=$this->PP_Consumer_Loans_Model->get_filedata($id);
		$this->data['clist_docs']=$this->PP_Consumer_Loans_Model->get_check_list_customer_documents($id);
		$this->data['clist_docs_check']=$this->PP_Consumer_Loans_Model->get_check_list_documents_enabeldisabel($id);
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);

		$this->data['collateral_vehicule']=$this->PP_Consumer_Loans_Model->get_collateral_vehicule($id);
		$this->data['collateral_deposit']=$this->PP_Consumer_Loans_Model->get_collateral_deposit($id);
		$this->data['collateral_maison']=$this->PP_Consumer_Loans_Model->get_collateral_maison($id);
		$this->data['collateral_excemption']=$this->PP_Consumer_Loans_Model->get_collateral_excemption($id);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();

		$this->data['decision_rec']=$this->PP_Consumer_Loans_Model->get_decision_record($id);
				
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		$this->data['customerdata']=$this->PP_Consumer_Loans_Model->get_customerdetails_list();
		$is_admin = ($user_id != 1) ? true :false;
		$this->data['title'] = 'DCP - Customer Loan Customer Details';

		if($this->session->userdata('role')==='2'){			
			$this->render_template2('superadmin/customer_details', $this->data);
		}else{			
			$this->data['title'] = 'DCP | Access Denied';
			$this->simple_template('access_denied', $this->data);          
		}		
	}
	
	

	public function SearchCustomers(){
		//print_r($_POST);
		$segment=$this->input->post('segment');
		$data= $this->data['accontdata']=$this->PP_Consumer_Loans_Model->get_customers_details($this->input->post('account'));		
		$html=null;
		echo $this->input->post('account');
		if(!empty($data)){
			foreach ($data as $key) {
				$html .="<tr>
				<td>dfd".$key['cid']."</td>
				<td>".$key['account_name']."</td>
				<td>".$key['account_number']."</td>
				<td>".$key['dob']."</td>
				<td>".$key['address']."</td>
				<td>".$key['emp_name']."</td>
				<td>".$key['phone']."</td>
				<td><a href='".base_url('PP_Consumer_Loans/customer_details/').$key['cid']."' class='btn btn-primary confirmation' onclick = \"if (! confirm('Continue?')) { return false; }\">
				SELECT</a></td>
			</tr>";
			 }
		}else {			
			$html .="<tr class=\"odd\"><td valign=\"top\" colspan=\"8\" class=\"dataTables_empty\">No matching records found</td></tr>";
		}
			echo $html;
	}

	public function editcustomer()
	{
		$secteurs=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$cat_emp=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$contract_type=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$branch_record=$this->PP_Consumer_Loans_Model->get_All_branch();		
		$bankdetails=$this->PP_Consumer_Loans_Model->get_bankdetails();

		$customerID=trim($this->input->post('id'));
		$customerdata=$this->PP_Consumer_Loans_Model->get_customerdata_info($customerID);
		//echo "<pre>", print_r($customerdata), "</pre>";
		$html='<form role="form" method="post" id="addnewcustomer">
				<div class="modal-body">   
					<div class="error-msg"></div>
					<fieldset>
						<legend>Personal Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>First Name </label>
								<input type="text" class="form-control addvalidate" id="first_name" name="first_name" autocomplete="off" required placeholder="Input First" value="" />
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Middle Name </label>
								<input type="text" class="form-control addvalidate" id="middle_name" name="middle_name" value="" autocomplete="off" placeholder="Input Middle" />
							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Last Name </label>
								<input type="text" class="form-control addvalidate" id="last_name" name="last_name" autocomplete="off" required placeholder="Input Last" value="" />							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Gender</label>
		                      	<select  class="form-control addvalidate" id="gender" name="gender">
	                              <option value="Male" id="Male">Male</option>
	                              <option value="Female" id="Female">Female</option>
	                            </select>
		                    </div>
		                  </div>
		                </div> 

		                <div class="row">
			                <div class="col-md-3">
			                    <div class="form-group">
			                      <label>Date of Birth </label>	
			                      	<input type="text"  class="form-control addvalidate" id="dob" name="dob" placeholder="DD-MM-YYYY" required value="">		                      		
			                    </div>
			                </div>
		                 							  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Education</label>
								<input type="text"  class="form-control addvalidate" id="education" name="education" placeholder="Eg:  MCA"  value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Marital Status</label>';		                      
		                   $marital = array("Célibataire","Marié(e)","Divorcé(e)","Veuf","Veuve");                                  
		                      $html .='<select  class="form-control addvalidate" id="marital_status" name="marital_status">';
		                      	 foreach($marital as $mtype){
                                     $html .='<option value="'.$mtype.'" id="'.$mtype.'" >'.$mtype.'</option>';
                                    }	                              
	                         $html .='</select>							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Email</label>
		                      <input type="email"  class="form-control addvalidate" id="email" name="email" placeholder="eg:example@domain.com" required value=""/>
		                    </div>
		                  </div>
		                </div> 
		                <hr />
					</fieldset>

					<fieldset>
						<legend>Additional Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type ID</label>
								<select  class="form-control addvalidate" id="typeofid" name="typeofid">
	                              <option value="Passport" id="Passport">Passport</option>
	                              <option value="CNI" id="CNI">CNI</option> 
	                              <option value="Recepisse + Acte de Naissance" id="Recepisse + Acte de Naissance">Recepisse + Acte de Naissance</option>
	                              <option value="Carte de Sejour" id="Carte de Sejour">Carte de Sejour</option>
	                            </select>
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Monthly Income</label>		                      
								<input type="number" class="form-control addvalidate" id="monthly_income" name="monthly_income" min="0" required placeholder="Input number" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Monthly Expenses</label>
		                      	<input type="number"  class="form-control addvalidate" id="monthly_expenses" name="monthly_expenses" min="0" required placeholder="Input number" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>ID Number</label>
		                      <input type="text"  class="form-control addvalidate" id="id_number" name="id_number"  placeholder="Input number" required value=""/>
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>State of Issue</label>
								<input type="text"  class="form-control addvalidate" id="state_of_issue" name="state_of_issue" placeholder="Input text" value="" required />
							
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Fonction (Occupation)</label>
								<input type="text" class="form-control required" id="occupation" name="occupation" required placeholder="Input text" value="" />
							</div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Main Phone</label>
								<input type="phone" class="form-control required" id="main_phone" name="main_phone" required placeholder="eg: 222-222-2222" >							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Alternative Phone</label>
		                      <input type="text"  class="form-control addvalidate" id="alter_phone" name="alter_phone"  >
		                    </div>
		                  </div>
		              </div>
		              	<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Expiration Date of the ID</label>
		                      <input type="text" class="form-control addvalidate" id="expiration_date" name="expiration_date" placeholder="DD-MM-YYYY" value="">
		                    </div>
		                  </div>
		                </div> 
					</fieldset>
					<fieldset>
						<legend>Employment Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Name of Employer</label>
		                      <input type="text"  class="form-control addvalidate" id="emp_name" name="emp_name" value="" required placeholder="Input text" />			
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Secteurs</label>		                      					
								<select  class="form-control addvalidate" id="secteurs" name="secteurs">';			
								if(!empty($secteurs)){
									foreach($secteurs as $Key){								
										$html .='<option value="'.$Key['tlc_id'].'" name="'.$Key['secteurs'].'">'.$Key['secteurs'].'</option>';
									}
								}								                                      
								$html .='</select>
							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Catégorie Employeurs</label>
		                      <div class="input-group">								
								<select  class="form-control addvalidate"  id="cat_employeurs" name="cat_employeurs">';
								
									if(!empty($cat_emp)){
										foreach($cat_emp as $Key){										
											$html .='<option value="'.$Key['cat_id'].'" name="'.$Key['catrgory'].'">'.$Key['catrgory'].'</option>';
										}
									}
								$html .='</select>
							</div>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type of Contract</label>
								<select  class="form-control addvalidate" id="typeofcontract" name="typeofcontract" style="width:98%">';
								if(!empty($contract_type)){
									foreach($contract_type as $Key){								
									$html .='<option value="'.$Key['tc_id'].'" name="'.$Key['contract_type'].'">'.$Key['contract_type'].'</option>';
									}
								}
								$html .='</select>
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Employment Date</label>
		                      <input type="text"  class="form-control addvalidate" id="employment_date" name="employment_date" placeholder="DD-MM-YYYY" required value="" />	
		                    </div>
		                  </div>						  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type Contrat</label>
		                      <input type="text"  class="form-control addvalidate" id="edn_date_contract_cdd" name="edn_date_contract_cdd" placeholder="DD-MM-YYYY"  value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>No of Years of Professional Experience</label>
								<input type="number"  class="form-control addvalidate" id="years_professionel_experience" name="years_professionel_experience" placeholder="Input number" value="" min="0" required/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>How He is been with the Current Employer</label>
		                      <input type="text" class="form-control addvalidate" id="current_emp" name="current_emp" placeholder="DD-MM-YYYY" required  >
		                    </div>
		                  </div>
		              </div>
		              	<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Net Salary</label>
		                      <input type="number"  class="form-control addvalidate" id="net_salary" name="net_salary" min="0" required placeholder="Input number" value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Retirement Age expected</label>
		                      <input type="number" class="form-control addvalidate" id="retirement_age_expected" required name="retirement_age_expected" min="0" placeholder="Input number" value="">
		                    </div>
		                  </div>		                  
		                </div> 
					</fieldset>
					<fieldset>
						<legend>Address</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Resides at Address</label>
								<input type="text" class="form-control addvalidate" id="resides_address" name="resides_address" placeholder="Panteón de Marinos" required value="" />
							</div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Street</label>	                      							
								<input type="text"  class="form-control addvalidate" id="street" name="street" placeholder="Peejayem" required value="" />
							</div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>City</label>
								<input type="text"  class="form-control addvalidate" id="city" name="city"  placeholder="Cádiz" required value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>State</label>
		                      <input type="text"  class="form-control addvalidate" id="state" name="state" placeholder="San Fernando" required value="" />
		                    </div>
		                  </div>
		                  <hr />
		                </div>
					</fieldset>

					<fieldset>
						<legend>Bank Account</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type of Account</label>';
		                      
                                  $atype = array(
                                    "Saving Account",
                                    "Regular Savings",
                                    "Current Account",
                                    "Recurring Deposit Account",
                                    "Fixed Deposit Account",
                                    "Demat Account",
                                    "NRI Accounts",
                                  );
                                  $html .='<select  class="form-control addvalidate" name="account_type" id="account_type" style="width:98%" required >';
                                    foreach($atype as $type){
                                      $html .='<option value="'.$type.'">'.$type.'</option>';
                                    }
                                  $html .='</select>
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Account Number</label>
								<input type="text"  class="form-control addvalidate" id="accoumt_number" name="accoumt_number" placeholder="San Fernando" required value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Banking Agency</label>	
	                      		<select  class="form-control addvalidate" name="bank_name" id="bank_name" style="width:98%" required >';
	                                 foreach($branch_record as $type){	
	                                 $html .='<option value="'.$type['branch_name'].'">'.$type['branch_name'].'</option>';
	                                }
	                            $html .='</select>								
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Bank Phone</label>
		                      <input type="text"  class="form-control addvalidate" id="bank_phone" name="bank_phone" placeholder="(__)_-___-__" required />
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Opening Date</label>
		                      <input type="text"  class="form-control addvalidate" id="opening_date" name="opening_date" placeholder="DD-MM-YYYY" required value="">
		                    </div>
		                  </div>		                 
		              </div>		              	
					</fieldset>

					<fieldset>
						<legend>Other Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                    	<label>Bank Code</label>		                      
								<input type="text"  class="form-control addvalidate" id="another_test" name="another_test" placeholder="Input text" />
							</div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Agency Code</label>
		                      <input type="text"  class="form-control addvalidate" id="test_field" name="test_field" value="" placeholder="Input text" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>RIB key</label>
		                      <input type="text"  class="form-control addvalidate" id="test_david" name="test_david" placeholder="Input text" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Amount Insurrance</label>
		                      	<input type="number"  class="form-control addvalidate" id="cc_test" name="cc_test" placeholder="123456" min="0" />
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Objet of the Credit</label>';
								
                                  $objcredit = array(
                                    "Consomation",
                                    "Equipement",
                                    "Immobilier",
                                    "Scolaire",
                                    "Autres",
                                  ); 
                                  $html .='<select  class="form-control addvalidate" name="obj_credit" id="obj_credit" style="width:98%">';
                                     foreach($objcredit as $credit){
                                      $html .='<option value="'.$credit.'" name="'.$credit.'">'.$credit.'</option>';
                                    }
                                  $html .='</select>						
		                    </div>
		                  </div>

		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>FRAIS de DOSSIER</label>
								<input type="number" class="form-control addvalidate" id="frais_de_dossier" name="frais_de_dossier" autocomplete="off" min="0" required value="" />							
		                    </div>
		                  </div>
		              </div>		              
					</fieldset>

					<div class="row">
		              	<div class="col-md-12">
		              		<textarea class="outputdata"  class="form-control" rows="10" cols="100%" style="display: none"></textarea>
		              	</div>
		              </div>				         
			  	</div>

			  	<div class="row">
		            <div class="response-msg col-md-12"></div>
			  	</div>
			  	<div class="modal-footer justify-content-center">
				  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn">
				  	<img src="'.base_url('assets/img/select2-spinner.gif').'" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Submit</button>
				  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button>
				</div>
			</form>';
			echo $html;
	}
	

	public function is_ajax_request()
	{
		//print_r($_POST); exit;
		$customerid=$this->input->post('customerid');
		$segment=$this->input->post('segment');
		$record=$this->PP_Consumer_Loans_Model->get_temp_applicationformRecord($segment);
		$amortizationid=$this->PP_Consumer_Loans_Model->get_autoamortization_id($segment);
		//$recordtaxname=$this->PP_Consumer_Loans_Model->get_taxname($segment);
		//echo "<pre>", print_r($amortizationid), "</pre>";	exit;	
		//ENUM('Process','Approved','Delivered','Cancelled','Pre-Process')	
		$appliedformdata=json_encode($record);
		//echo "<pre>", print_r($appliedformdata), "</pre>";
		foreach($record as $loca) {
			$data = array(
				'admin_id'=>$this->session->userdata('id'),
				'customar_id'=>$customerid,
				'amortization_id'=>$amortizationid->id,
				'application_no'=>trim($loca['application_no']),
				'ip_address' =>trim($loca['ip_address']),
	            'loan_type' =>trim($loca['loan_type']),
	            'loan_amt' =>trim($loca['loan_amt']),
	            'loan_interest' =>trim($loca['loan_interest']),
	            'loan_term' =>trim($loca['loan_term']),
	            'loan_schedule' =>trim($loca['loan_schedule']),
	            'loan_fee' =>trim($loca['loan_fee']),
	            'loan_tax' =>trim($loca['loan_tax']),
	            'loan_commission'=>trim($loca['loan_commission']),
	            'appliedformdata'=>$appliedformdata,
	            'loan_status' =>'Process',
	        );
		}
		//echo "<pre>", print_r($record), "</pre>";
		//exit;			
		$res=$this->PP_Consumer_Loans_Model->insertRow('consumer_loans_applicationform',$data);
		if($res){
			$array=array('aid' =>$segment, );
			$docdata = array(
				'admin_id'=>$this->session->userdata('id'),				
	            'loan_type' =>trim($loca['loan_type']),
	            'loan_id' =>trim($res),
	            'doc_1' =>'YES',
	            'doc_2' =>'YES',
	            'doc_3' =>'YES',
	            'doc_4' =>'YES',
	            'doc_5' =>'YES',
	            'doc_6'=>'YES',
	            'doc_7'=>'YES',
	            'doc_9' =>'YES',
	            'doc_10' =>'YES',
	            'doc_11' =>'YES',
	            'created' =>date('Y-m-d H:i:s')
	        );
	        $insrtdocdata=$this->PP_Consumer_Loans_Model->insertRow('tbl_credit_conso_checklistbutton_enable_disable',$docdata);
			$details="New loan application form created with amount CFA ".number_format($record[0]['loan_amt'],0,',',' ')." and application number is ".$record[0]['application_no']." under process";
				$history_arr=array(
					"cl_aid" =>$res,
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>$customerid,
					"loan_type"=>trim($loca['loan_type']),
					"comment" =>$details,
					"content_type"=>'text',			
					"created" =>date('Y-m-d H:i:s')
				);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			$this->PP_Consumer_Loans_Model->delete_data('temp_consumer_applicationform',$array);
			echo $res;
		}else{
			echo 0;
		}
	}

	public function edit_loan(){    	
    	sleep(2);
    	$ip = $_SERVER['REMOTE_ADDR'];
		//print_r($_POST); exit;
		$crecord=$this->PP_Consumer_Loans_Model->get_checkfieldandvalue($this->input->post('editid'));
		$erecord=$this->PP_Consumer_Loans_Model->get_edit_customar_applicationform($this->input->post('editid'));

		//echo $erecord[0]['amortization_id']; exit;
		$da=json_decode($erecord[0]['appliedformdata']);
		$this->form_validation->set_rules('loan_type', 'Loan Type', 'required');
    	$this->form_validation->set_rules('loan_amt', 'Amount','trim|required');
    	$this->form_validation->set_rules('loan_interest', 'Interest','trim|required');
    	$this->form_validation->set_rules('loan_term', 'Term', 'required');
		$this->form_validation->set_rules('loan_schedule', 'Schedule', 'required');
		if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo validation_errors();
        }else{

        	$amount=trim($this->input->post('loan_amt'));		
			$rate=trim($this->input->post('loan_interest'));
			$rt=($rate*(1+19.25/100));
			$rate=$rt;
			if($this->input->post('loan_schedule')=='Monthly'){
				$year=(trim($this->input->post('loan_term'))/12);
			}else if($this->input->post('loan_schedule')=='Yearly'){
				$year=trim($this->input->post('loan_term'));
			}
			else if($this->input->post('loan_schedule')=='Half Yearly'){
				$year=trim($this->input->post('loan_term')*2/12);
			}
			$years=$year;
			$years=$years;
			$curd=date("Y-m-d", strtotime($erecord[0]['created']));
			$loan_interest =$rate;	
			$am=new Class_Amort();
			$am->amort($amount,$rate,$years,$curd, $loan_interest);	
			//echo "<pre>", print_r($am), "</pre>"; exit;

			$return_arr1=array();
			$postyer=$am->years*12;
			$ebal = $am->amount;
			$ccint =0.0;
			$cpmnt = 0.0;
			$cdate=$am->cdate;
			for ($i = 1; $i <= $am->npmts; $i++){
				$bbal = $ebal;    
			    $ipmnt = $bbal * $am->mrate;
			    $ppmnt = $am->pmnt - $ipmnt;
			    $ebal = $bbal - $ppmnt;
			    $ccint = $ccint + $ipmnt;
			    $cpmnt = $am->pmnt;
			    $pbint = $bbal*$this->input->post('loan_interest')/100/12;
			    $vbint = $pbint*19.25/100;
			    $months=$am->npmts;

				$rowarray['Pmt'] = $i;					
				$rowarray['bbegin_periode'] = $bbal; 
				$rowarray['b_end_periode'] = $ebal;
				$rowarray['principal_payment'] = $ppmnt; 
				$rowarray['interest_paid_tax_incl'] = $ipmnt; 
				$rowarray['interest_paid_befor_tax'] = $pbint; 
				$rowarray['vat_on_interest'] = $vbint; 
				$rowarray['monthly_payment'] = $cpmnt; 
				$rowarray['month'] = date("m", strtotime( $cdate." +$i months"));
				$rowarray['years'] = date("Y", strtotime( $cdate." +$i months"));		    	
		    	array_push($return_arr1,$rowarray);
		    }
		    $amortizationdatabinding=json_encode($return_arr1);
		    $row_array=array();
			$return_arr=array(
				"application_no" =>$da[0]->application_no,
	            "ip_address" =>$da[0]->ip_address,
	            "loan_type"=>$da[0]->loan_type,
	            "loan_amt"=>$this->input->post('loan_amt'),
	            "loan_interest"=>$this->input->post('loan_interest'),
	            "loan_term"=>$this->input->post('loan_term'),
	            "loan_schedule"=>$this->input->post('loan_schedule'),
	            "loan_fee"=>$this->input->post('loan_fee'),
	            "loan_tax"=>$this->input->post('loan_tax'),
	            "loan_commission"=>$this->input->post('loan_commission')
		    );	    		
			array_push($row_array, $return_arr);
			$databinding=json_encode($row_array);
			$update_amortization=array(
					"applicationform_id"=>trim($this->input->post('editid')),
					"admin_id"=>trim($this->session->userdata('id')),
					"loan_type"=>trim($this->input->post('loan_type')),
					"amount" =>trim($this->input->post('loan_amt')),
					"interest"=>trim($this->input->post('loan_interest')),
					"rate"=>trim($am->rate),
					"years"=>$postyer,
					"npmts"=>trim($am->npmts),
					"mrate"=>trim($am->mrate),
					"smrate"=>trim($am->smrate),
					"tpmnt"=>trim($am->tpmnt),
					"tint"=>trim($am->tint),
					"pmnt"=>trim($am->pmnt),
					"cdate"=>trim($am->cdate),
					"databinding"=>trim($amortizationdatabinding),
				);
			$data = array(			
	            'loan_type' =>trim($this->input->post('loan_type')),
	            'loan_amt' =>trim($this->input->post('loan_amt')),
	            'loan_interest' => $this->input->post('loan_interest'),
	            'loan_term' => $this->input->post('loan_term'),
	            'loan_schedule' => $this->input->post('loan_schedule'),            
	            'loan_fee' => $this->input->post('loan_fee'),
	            'loan_tax' => $this->input->post('loan_tax'),
	            'loan_commission' => $this->input->post('loan_commission'),
	            'appliedformdata'=>trim($databinding),
	        );
		$msg='Updated Loan Information ';		
		if($crecord[0]->loan_amt!=$this->input->post('loan_amt')){
		$msg .='amount is '.$crecord[0]->loan_amt.' to '.$this->input->post('loan_amt').'|';
		}
		if($crecord[0]->loan_interest!=$this->input->post('loan_interest')){
			$msg .='interest is '.$crecord[0]->loan_interest.' to '.$this->input->post('loan_interest').'';
		}
		if($crecord[0]->loan_term!=$this->input->post('loan_term')){
			$msg .='term is '.$crecord[0]->loan_term.' to '.$this->input->post('loan_term').'|';
		}
		if($crecord[0]->loan_schedule!=$this->input->post('loan_schedule')){
			$msg .='schedule is '.$crecord[0]->loan_schedule.' to '.$this->input->post('loan_schedule').'';
		}
		if($crecord[0]->loan_tax!=$this->input->post('loan_tax')){
			$msg .='taxes is '.$crecord[0]->loan_tax.' to '.$this->input->post('loan_tax').'|';			
		}
		if($crecord[0]->loan_commission!=$this->input->post('loan_commission')){
			$msg .='commission is '.$crecord[0]->loan_commission.' to '.$this->input->post('loan_commission').'|';
		}       
		$msg=str_replace('|', ', ', $msg); 		
        $edit=$this->PP_Consumer_Loans_Model->updateRow('consumer_loans_applicationform', 'cl_aid', $this->input->post('editid'),$data);
        $Amortization=$this->PP_Consumer_Loans_Model->updateRow('consumer_amortization', 'id',$erecord[0]['amortization_id'], $update_amortization);
        $cross_check_portal=$this->PP_Consumer_Loans_Model->get_enableddisabled_documentbutton_ckeck($this->input->post('editid'));

        $docdata = array(
				'admin_id'=>trim($this->session->userdata('id')),			
	            'loan_type' =>trim($this->input->post('loan_type')),
	            'loan_id' =>trim($this->input->post('editid')),
	            'doc_1' =>'YES',
	            'doc_2' =>'YES',
	            'doc_3' =>'YES',
	            'doc_4' =>'YES',
	            'doc_5' =>'YES',
	            'doc_6'=>'YES',
	            'doc_7'=>'YES',
	            'doc_9' =>'YES',
	            'doc_10' =>'YES',
	            'doc_11' =>'YES',
	            'created' =>date('Y-m-d H:i:s')
	        );

        if(empty($cross_check_portal))
        {
        	$insrtdocdata=$this->PP_Consumer_Loans_Model->insertRow('credit_conso_checklistbutton_enable_disable',$docdata);
        	
        }else{        	
        }
        //print_r($cross_check_portal); exit;

        
	        


        $details=$msg;		
			$history_arr=array(
				"cl_aid" =>$this->input->post('editid'),
				"admin_id" =>$this->session->userdata('id'),				
				"comment" =>$details,
				"loan_type"=>trim($this->input->post('loan_type')),			
				"created" =>date('Y-m-d h:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
        if($edit){
        	echo 1;
        }
		}        
    }
    public function interaction_email()
    {
    	//echo "<pre>", print_r($_POST),"</pre>"; exit;
    	$row_array=array();
    	$recordmail=$this->Common_model->get_admin_details(2);
    	$config['mailtype'] = 'html';
    	$this->load->library('email',$config);
    	
    	$this->form_validation->set_rules('field_name', 'Nom et Prénoms', 'required');
    	$this->form_validation->set_rules('fieldemail', 'Email Field One', 'required|trim|valid_email');
    	$this->form_validation->set_rules('fieldsubject', 'Subject Field One', 'required');
    	$this->form_validation->set_rules('fieldmsg', 'Message Field One', 'required');

    	if ($this->form_validation->run() == FALSE){
            $errors = validation_errors();
            echo validation_errors();
        }
        else
        {    
            $maildata = array(			
                'field_name' =>trim($this->input->post('field_name')),
                'fieldemail' =>trim($this->input->post('fieldemail')),
                'fieldsubject' => $this->input->post('fieldsubject'),
                'fieldmsg' => $this->input->post('fieldmsg'),                    
            );
            array_push($row_array, $maildata);
		    $databinding=json_encode($row_array);
    		$data=array(
    			'cl_aid'=>trim($this->input->post('cl_aid')),
    			'admin_id' =>trim($this->session->userdata('id')),
    			'mailcontent' =>trim($databinding),
    			'mode'=>trim('Email'),
    			'loan_type' =>1,
    			'section' =>1,
    			'status'=>1,
    		);
            $rsid=$this->PP_Consumer_Loans_Model->insertRow('interaction_history',$data);
        
            $body= '<table border="1" width="350px">
				  <tr>
				    <td width="20%"><strong>Nom et Prénoms</strong></td>
				    <td width="80%">'.$this->input->post("field_name").'</td>
				  </tr>
				    <tr>
				    <td width="20%"><strong>Message</strong></td>
				    <td width="80%">'.$this->input->post("fieldmsg").'</td>
				  </tr>					  
				</table>';
				$config['mailtype'] = 'html';
				$this->email->set_mailtype("html");		    	
    			$this->load->library('email',$config);
    		    $emailto = $this->input->post("fieldemail");   
    		    $this->email->from($this->session->userdata('email'),$recordmail[0]->type);
    		    $this->email->to($emailto, $this->input->post("field_name"));
    		    $this->email->subject('Consumer Loans-Interaction'. $this->input->post("fieldsubject"));
    		    $this->email->message($body);		    
    		    $send = $this->email->send();
    		    if ($send) {    		       
    		       $details="Account Manager Sent a Mail Consumer Loans-Interaction.";
					$history_arr=array(
						"cl_aid" =>$this->input->post("cl_aid"),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>trim($this->input->post("customar_id")),
						"loan_type"=>1,
						"comment" =>$details,
						"content_type"=>"mail",			
						"created" =>date('Y-m-d H:i:s')
					);
				$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
				echo 'success';

    		    } else {
    		       echo 'error' .$this->email->print_debugger();
    		       //$data=array('status'=>0);
    		       $this->PP_Consumer_Loans_Model->updateRow('interaction_history', 'id',$rsid,array('status'=>0));
    		    }
		}
    }
	
//	System Docs upload files	
	public function uploadfile_split(){
	//print_r($_POST); exit;		
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/consumer_loan/system-docs/';
			$config["allowed_types"] = '*';
			$config['max_size'] = '0';
			//$config['max_width'] = '1000';
			//$config['max_height'] = '1000';
			$config['encrypt_name'] = FALSE;
			$config['remove_spaces'] = TRUE;			   
		   $this->load->library('upload', $config);
		   $this->upload->initialize($config);
		   $filesCount = count($_FILES['files']['name']);
		   for($count = 0; $count<count($_FILES["files"]["name"]); $count++)
		   {
			$_FILES["file"]["name"] = time().$_FILES["files"]["name"][$count];
			$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
			$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
			$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
			$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
			if(!$this->upload->do_upload('file'))
			{
				$output= array('error' => $this->upload->display_errors());
			}else{
				sleep(1);
				$filename = $this->upload->data();				  
				$data= array(
		        	'filesname'=>$filename['file_name'],
					'raw_name'=>$_FILES["files"]['name'][$count],
					'file_path'=>$filename['file_path'],
					'full_path'=>$filename['full_path'],						
					'file_type'=>$filename['file_type'],
					'file_size'=>$filename['file_size'],
					'file_extension'=>$filename['file_ext'],
		        	'admin_id'=>$this->session->userdata('id'),
					'cl_aid'=>$this->input->post("id"),
					'section'=>1,
					'loan_type'=>1,
		    	);
				$rsid=$this->PP_Consumer_Loans_Model->insertRow('system_docs',$data);
				$output=array('success' => $filesCount." files successfully upload.");
			}
		   }
		   if(!empty($output['success'])){
	  			$details="Account Manager ".$filesCount." files upload in system documents.";
				$history_arr=array(
					"cl_aid" =>$this->input->post("id"),
					"admin_id" =>$this->session->userdata('id'),
					"customar_id" =>trim($this->input->post("customar_id")),
					"loan_type"=>1,
					"comment" =>$details,
					"content_type"=>"file",
					"created" =>date('Y-m-d H:i:s')
				);
				$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			}
		   echo json_encode($output);
		}		
	}
		
	public function downloadall(){
        $createdzipsystemdocs = 'systemdocs';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Consumer_Loans_Model->get_filedata($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths = './assets/consumer_loan/system-docs/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
    }
	
	
	public function downloadallCheckList(){
        $createdzipchecklist = 'checklist-customer-documents';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Consumer_Loans_Model->get_check_list_customer_documents($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');

        foreach ($files as $file) {			
            $paths = './assets/consumer_loan/check-list-customer/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipchecklist.'.zip');
    }
	
	public function uploadfile_check_list(){
		//sleep(3);
		//print_r($_POST); exit;
			  if($_FILES["files"]["name"] != '')
			  {
			   $output = '';
			   $config["upload_path"] = './assets/consumer_loan/check-list-customer/';
			   //$config["allowed_types"] = 'pdf|doc|docx|gif|jpg|png';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);			   
			   for($count =0; $count<$filesCount; $count++)
			   {
				$_FILES["file"]["name"] = $_FILES["files"]["name"][$count];
				$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
				$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
				$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
				$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if(!$this->upload->do_upload('file'))
				{
					$output= array('error' => $this->upload->display_errors());
				}else{
					sleep(1);
				 	$filename = $this->upload->data();				
					 $data= array(
							'filesname'=>$filename['file_name'],
							'raw_name'=>$filename['raw_name'],
							'file_path'=>$filename['file_path'],
							'full_path'=>$filename['full_path'],						
							'file_type'=>$filename['file_type'],
							'file_size'=>$filename['file_size'],
							'file_extension'=>$filename['file_ext'],
							'admin_id'=>$this->session->userdata('id'),
							'cl_aid'=>$this->input->post("id"),
							'section'=>2,
							'loan_type'=>1,
						);
						$rsid=$this->PP_Consumer_Loans_Model->insertRow('system_docs',$data);
						$output=array('success' => $filesCount." files successfully upload.");
					}
			   }
			   if(!empty($output['success'])){
			   			$details="Account Manager ".$filesCount." files upload in check list customer documents.";
						$history_arr=array(
							"cl_aid" =>$this->input->post("id"),
							"admin_id" =>$this->session->userdata('id'),
							"customar_id" =>trim($this->input->post("customar_id")),
							"loan_type"=>1,
							"comment" =>$details,
							"content_type"=>"file",			
							"created" =>date('Y-m-d H:i:s')
						);
						$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
					}
			   echo json_encode($output); 
			   
			  }
	}
	
	public function addContractType(){
		
		$postId=$this->input->post('postId');
		if(!empty($postId))
		{
			$data=array(
				'contract_type'=>$this->input->post('postId')
			);
			$ress=$this->PP_Consumer_Loans_Model->insertRow('type_of_contract',$data);
			if($ress){
				$res=$this->PP_Consumer_Loans_Model->get_type_of_contract();
				if(!empty($res)){
				foreach ($res as $key ) {					
					$return[]=array(
						'id'=>$key['tc_id'],
						'name'=>$key['contract_type']
					);
				}
				}
				echo json_encode($return);
			}
		}
	}

	//==========================collateral Upload 26-06-2019======================================
	
	public function uploadfile_collateral_vehicule()
	{	
		//echo "<pre>", print_r($_POST); exit;	
		 if($_FILES["files"]["name"] != '')
			  {
			   $output='';
				$return_arr = array();			   
			   $config["upload_path"] = './assets/collateral/vehicule/';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
				
				$this->form_validation->set_error_delimiters('<p>', '</p>');
				$this->form_validation->set_rules('vehicule_type','Type', 'required');
				$this->form_validation->set_rules('vehicule_marque','Marque', 'required');
				$this->form_validation->set_rules('vehicule_modele','Modèle', 'required');
				$this->form_validation->set_rules('vehicule_carte_grise','Carte Grise', 'required');
				$this->form_validation->set_rules('vehicule_style','Style', 'required');
				$this->form_validation->set_rules('vehicule_annee','Année', 'required');
				$this->form_validation->set_rules('vehicule_kilometrage','Kilométrage', 'required');
				//$this->form_validation->set_rules('vehicule_commentaire','Commentaire', 'required');
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}else{
					sleep(1);
					$data= array(
						'cl_aid'=>$this->input->post('cl_aid'),
						'admin_id'=>trim($this->session->userdata('id')),						
						'customer_id'=>$this->input->post('vcustomar_id'),
						'selected_field'=>trim($this->input->post('collateraltype')),
						'v_type'=>$this->input->post('vehicule_type'),
						'v_marque'=>$this->input->post('vehicule_marque'),
						'v_modele'=>$this->input->post('vehicule_modele'),
						'v_carte_grise'=>$this->input->post('vehicule_carte_grise'),
						'v_style'=>$this->input->post('vehicule_style'),
						'v_annee'=>$this->input->post('vehicule_annee'),
						'v_kilometrage'=>$this->input->post('vehicule_kilometrage'),
						'v_commentaire'=>$this->input->post('vehicule_commentaire'),
						'loan_type'=>1,
						'section'=>1,
					);
					$getid=$this->PP_Consumer_Loans_Model->insertRow('collateral',$data);
					if($getid){			   
						for($count =0; $count<$filesCount; $count++)
						{
							$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
							$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
							$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
							$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
							$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
							if(!$this->upload->do_upload('file'))
							{
								$output=array('error' => $this->upload->display_errors());
					}else{
						$filename = $this->upload->data();
							$filedata= array(
								'collateral_id'=>$getid,						
								'file_name'=>$filename['file_name'],
								'file_type'=>$filename['file_type'],
								'file_path'=>$filename['file_path'],
								'full_path'=>$filename['full_path'],
								'raw_name'=>$filename['raw_name'],
								'orig_name'=>$_FILES["files"]['name'][$count],
								'client_name'=>$filename['client_name'],
								'file_extension'=>$filename['file_ext'],
								'file_size'=>$filename['file_size'],
								"section"=>1,
								'loan_type'=>1,							
							);			
							$rsid=$this->PP_Consumer_Loans_Model->insertRow('collateral_files',$filedata);
							$details="Collateral Véhicule ".$filesCount." file upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cl_aid'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('vcustomar_id'),
									"loan_type"=>1,
									"comment" =>$details,
									"content_type"=>'file',				
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
							$output=array('success' => $filesCount." files successfully upload.");
							}
						}
					}
			   }			   
			   echo json_encode($output);
			  }
		
	}
	public function uploadfile_collateral_deposit()
	{
		//print_r($_POST); exit;
		if($_FILES["files"]["name"] != '')
			{
			   $output = '';
			   $config["upload_path"] = './assets/collateral/deposit/';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
			   
				$this->form_validation->set_error_delimiters('<span>', '</span>');
				$this->form_validation->set_rules('d_numero_de_compte','Numéro de compte', 'required');
				$this->form_validation->set_rules('d_montant','Montant', 'required');
				
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}else{
				sleep(1);					
						$data= array(
							'cl_aid'=>$this->input->post('cl_aid'),
							'admin_id'=>trim($this->session->userdata('id')),					
							'customer_id'=>$this->input->post('customar_id'),
							'selected_field'=>trim($this->input->post('collateraltype')),		
							'd_numero_de_compte'=>$this->input->post('d_numero_de_compte'),
							'd_montant'=>$this->input->post('d_montant'),						
							'section'=>1,
							'loan_type'=>1,
						);
						$getid=$this->PP_Consumer_Loans_Model->insertRow('collateral',$data);
						if($getid){			   
						   for($count =0; $count<$filesCount; $count++)
						   {
							$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
							$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
							$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
							$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
							$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
							if(!$this->upload->do_upload('file'))
							{
								$output= array('error' => $this->upload->display_errors());
							}else{
								$filename = $this->upload->data();
								$filedata= array(
									'collateral_id'=>$getid,						
									'file_name'=>$filename['file_name'],
									'file_type'=>$filename['file_type'],
									'file_path'=>$filename['file_path'],
									'full_path'=>$filename['full_path'],
									'raw_name'=>$filename['raw_name'],
									'orig_name'=>$_FILES["files"]['name'][$count],
									'client_name'=>$filename['client_name'],
									'file_extension'=>$filename['file_ext'],
									'file_size'=>$filename['file_size'],
									'section'=>1,
									'loan_type'=>1,							
								);											
								$rsid=$this->PP_Consumer_Loans_Model->insertRow('collateral_files',$filedata);
								$details="Collateral Déposit ".$filesCount." file upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cl_aid'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>1,
									"comment" =>$details,
									"content_type"=>'file',			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
									$output=array('success' => $filesCount." files successfully upload.");
									}
								}
						   }
				}			   
			   echo json_encode($output); 
			   
			}
	}
	
	public function uploadfile_collateral_maison()
	{
		 if($_FILES["files"]["name"] != '')
			{
			   $output = '';
			   $config["upload_path"] = './assets/collateral/maison/';
			   $config["allowed_types"] = '*';
			   $config['max_size'] = '0';
			   $config['overwrite'] = '0';
			   $config['encrypt_name'] = FALSE;
			   $config['remove_spaces'] = TRUE;
			   $config['file_ext_tolower'] = TRUE;
			   
			   $this->load->library('upload', $config);
			   $this->upload->initialize($config);
			   $filesCount = count($_FILES['files']['name']);
			   
			   $this->form_validation->set_error_delimiters('<p>', '</p>');
				$this->form_validation->set_rules('m_type_de_proprietaire','Type de propriétaire', 'required');
				$this->form_validation->set_rules('m_etatde_maison','Etat de la maison', 'required');
				$this->form_validation->set_rules('m_annee_construction','Année de construction', 'required');
				$this->form_validation->set_rules('m_nombre_de_piece','Nombre de pièce', 'required');
				$this->form_validation->set_rules('m_adresse','Adresse', 'required');
				$this->form_validation->set_rules('m_titre_foncier','Titre foncier', 'required');
				$this->form_validation->set_rules('m_superficie','Superficie', 'required');
				//$this->form_validation->set_rules('m_commentaire','Commentaire', 'required');
				$this->form_validation->set_message('required', 'You missed the input {field}!');
				if ($this->form_validation->run() == FALSE)
				{
					$output=array('error'=> validation_errors());	
				}
				else
				{
					sleep(2);
					$data= array(
						'cl_aid'=>$this->input->post('cl_aid'),
						'admin_id'=>trim($this->session->userdata('id')),						
						'customer_id'=>$this->input->post('customar_id'),
						'selected_field'=>trim($this->input->post('collateraltype')),
						'm_type_de_proprietaire'=>trim($this->input->post('m_type_de_proprietaire')),
						'm_etatde_maison'=>trim($this->input->post('m_etatde_maison')),
						'm_annee_construction'=>trim($this->input->post('m_annee_construction')),
						'm_nombre_de_piece'=>trim($this->input->post('m_nombre_de_piece')),
						'm_adresse'=>trim($this->input->post('m_adresse')),
						'm_titre_foncier'=>trim($this->input->post('m_titre_foncier')),
						'm_superficie'=>trim($this->input->post('m_superficie')),
						'm_commentaire'=>trim($this->input->post('m_commentaire')),
						'loan_type'=>1,
						'section'=>1,
					);	   
					$getid=$this->PP_Consumer_Loans_Model->insertRow('collateral',$data);
					if($getid)
					{			   
						for($count =0; $count<$filesCount; $count++)
						{
							$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
							$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
							$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
							$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
							$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
							if(!$this->upload->do_upload('file'))
							{
								$output= array('error' => $this->upload->display_errors());
							}
							else{
								$filename = $this->upload->data();							
								$filedata= array(
									'collateral_id'=>$getid,						
									'file_name'=>$filename['file_name'],
									'file_type'=>$filename['file_type'],
									'file_path'=>$filename['file_path'],
									'full_path'=>$filename['full_path'],
									'raw_name'=>$filename['raw_name'],
									'orig_name'=>$_FILES["files"]['name'][$count],
									'client_name'=>$filename['client_name'],
									'file_extension'=>$filename['file_ext'],
									'file_size'=>$filename['file_size'],									
									'section'=>1,
									'loan_type'=>1,
								);			
								$rsid=$this->PP_Consumer_Loans_Model->insertRow('collateral_files',$filedata);
								$details="Collateral Maison ".$filesCount." file upload.";
								$history_arr=array(
									"cl_aid" =>$this->input->post('cl_aid'),
									"admin_id" =>$this->session->userdata('id'),
									"customar_id" =>$this->input->post('customar_id'),
									"loan_type"=>1,
									"comment" =>$details,
									"content_type"=>'file',			
									"created" =>date('Y-m-d H:i:s')
								);
								$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
								$output=array('success' => $filesCount." files successfully upload.");
							}
						}
					}
				}
				echo json_encode($output); 
			}
	}
	
	public function uploadfile_collateral_excemption()
	{
		sleep(2);
		if($_FILES["files"]["name"] != '')
		{
			$output = '';
			$config["upload_path"] = './assets/collateral/excemption';
			$config["allowed_types"] = '*';
			$config['max_size'] = '0';
			$config['overwrite'] = '0';
			$config['encrypt_name'] = FALSE;
			$config['remove_spaces'] = TRUE;
			$config['file_ext_tolower'] = TRUE;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$filesCount = count($_FILES['files']['name']);
			$data= array(
				'cl_aid'=>$this->input->post('cl_aid'),
				'admin_id'=>trim($this->session->userdata('id')),
				'customer_id'=>trim($this->input->post("customar_id")),	
				'selected_field'=>trim($this->input->post('collateraltype')),
				'section'=>1,
				'loan_type'=>1,
			);
			$getid=$this->PP_Consumer_Loans_Model->insertRow('collateral',$data);
			if($getid)
			{
			   for($count =0; $count<$filesCount; $count++)
			   {
					$_FILES["file"]["name"] = time().$_FILES["files"]['name'][$count];
					$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
					$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
					$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
					$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
				if(!$this->upload->do_upload('file'))
				{
					$output= array('error' => $this->upload->display_errors());
				}else{
					$filename = $this->upload->data();
					$filedata= array(
						'collateral_id'=>$getid,						
						'file_name'=>$filename['file_name'],
						'file_type'=>$filename['file_type'],
						'file_path'=>$filename['file_path'],
						'full_path'=>$filename['full_path'],
						'raw_name'=>$filename['raw_name'],
						'orig_name'=>$_FILES["files"]['name'][$count],
						'client_name'=>$filename['client_name'],
						'file_extension'=>$filename['file_ext'],
						'file_size'=>$filename['file_size'],
						'section'=>1,
						'loan_type'=>1,							
					);
					$rsid=$this->PP_Consumer_Loans_Model->insertRow('collateral_files',$filedata);
					$details="Collateral Excemption ".$filesCount." file upload.";
					$history_arr=array(
						"cl_aid" =>$this->input->post('cl_aid'),
						"admin_id" =>$this->session->userdata('id'),
						"customar_id" =>$this->input->post('customar_id'),
						"loan_type"=>1,
						"comment" =>$details,
						"content_type"=>'file',			
						"created" =>date('Y-m-d H:i:s')
					);
					$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
					$output=array('success' => $filesCount." files successfully upload.");
					}
				}
			}			  
			echo json_encode($output); 			   
		}
	}
	
		
	public function collateral_preview()
	{	
		$html ='';
		//sleep(2);
		$collateralfiles=$this->PP_Consumer_Loans_Model->get_collateralFiles($this->input->post('id'));
		//echo "<pre>", print_r($collateralfiles),"</pre>";
		//exit;
		if(!empty($collateralfiles[0]["selected_field"])){
			$displaydata=$collateralfiles[0]["selected_field"];
		}else{
			$displaydata='';
		}
			
			$html .='<div class="modal-header">';
			$html .='<button type="button" class="close" data-dismiss="modal">&times;</button>';
			$html .='<h4 class="modal-title heading lead">'.$displaydata.' Documents</h4>';
			$html .='</div>';
			$html .='<div class="modal-body">';
			$html .='<ul class="list-group">';
			$i=1;
			if(!empty($collateralfiles)){
				foreach($collateralfiles AS $files){				
					$html .='<li class="list-group-item alert alert-success">';
							if($files['file_extension']=='.pdf'){
								$html .='<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
							}else if($files['file_extension']=='.docx' || $files['file_extension']=='.doc'){
								$html .='<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
							}
							else if($files['file_extension']=='.jpeg' || $files['file_extension']=='.jpg' || $files['file_extension']=='.png'){
								$html .='<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
							}
						 $html .=$i."-". ucwords($files['orig_name']);
					$html .='</li>';			
				$i++;
			 }
			}
			$html .='</ul>';
			$html .='</div>';
			$html .='<div class="modal-footer">';
			$html .='<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button>';
			$html .='</div>';	
		
		echo $html;		
	}
	
	public function download_collateralvehicule(){
		$createdzipsystemdocs = 'collateral.vehicule';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Consumer_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/vehicule/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	public function download_collateraldeposit(){
		$createdzipsystemdocs = 'collateral.deposit';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Consumer_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/deposit/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	public function download_collateralmaison(){
		$createdzipsystemdocs = 'collateral.maison';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Consumer_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/maison/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	public function download_collateralexcemption(){
		$createdzipsystemdocs = 'collateral.excemption';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download');        
        $files = $this->PP_Consumer_Loans_Model->get_collateralFiles($id);         
        foreach ($files as $file) {			
            $paths = './assets/collateral/excemption/'.$file['file_name'];            
            $this->zip->add_data($paths,file_get_contents($paths));    
        }
        $this->zip->download($createdzipsystemdocs.'.zip');
	}
	
	
	public function uploadfile_risk_analysis(){
		//print_r($_FILES);
		//print_r($_POST); exit;   
		
		sleep(1);
		if($_FILES["files"]["name"] != '')
		{
		   $output = '';
		   $config["upload_path"] = './assets/riskanalysis/';
		   $config["allowed_types"] = '*';
		   	$config['max_size'] = '0';
		   	$config['encrypt_name'] = FALSE;
		   	$config['remove_spaces'] = TRUE;
		   $this->load->library('upload', $config);
		   $this->upload->initialize($config);
		   
		   $filesCount = count($_FILES['files']['name']);				   
		   for($count =0; $count<$filesCount; $count++)
		   {
			$_FILES["file"]["name"] = time().$_FILES["files"]["name"][$count];
			$_FILES["file"]["type"] = $_FILES["files"]["type"][$count];
			$_FILES["file"]["tmp_name"] = $_FILES["files"]["tmp_name"][$count];
			$_FILES["file"]["error"] = $_FILES["files"]["error"][$count];
			$_FILES["file"]["size"] = $_FILES["files"]["size"][$count];
			if(!$this->upload->do_upload('file'))
			{
				$output= array('error' => $this->upload->display_errors());
			}else{
				$filename = $this->upload->data();		
				
					$filedata= array(							
						'admin_id'=>trim($this->session->userdata('id')),
						'cl_aid'=>trim($this->input->post("customerid")),
						'filesname'=>$filename['file_name'],
						'raw_name'=>$_FILES["files"]["name"][$count],
						'file_path'=>$filename['file_path'],
						'full_path'=>$filename['full_path'],						
						'file_type'=>$filename['file_type'],
						'file_size'=>$filename['file_size'],
						'file_extension'=>$filename['file_ext'],
						"loan_type"=>1,
						'section'=>1,							
					);			
					$rsid=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis',$filedata);
					$output=array('success' => $filesCount." files successfully upload.");
					}
				}
		  
		   //print_r($output);
		   echo json_encode($output); 
		   
		}
	}
	
	
	
	public function download_analysisfiles(){
		//print "hello"; exit;
        $createdzipsystemdocs = 'riskanalysis';
		$id=$this->uri->segment(3);
        $this->load->library('zip');
        $this->load->helper('download'); 
		//$paths='';		
        $files = $this->PP_Consumer_Loans_Model->get_risk_analysisfile($id); 
        // create new folder 
        //$this->zip->add_dir('zipfolder');
        foreach ($files as $file) {			
            $paths= './assets/riskanalysis/'.$file['filesname'];
            // add data own data into the folder created
            $this->zip->add_data($paths,file_get_contents($paths)); 			   
        }		
        $this->zip->download($createdzipsystemdocs.'.zip');
    }
	
	
	
	//==========================today 24-06-2019======================================
	public function riskanalysis_current_monthly_credit()
	{
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_current_monthly_credit($this->input->post('cl_aid'));
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
			'customer_id' => $this->input->post('customar_id'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>1,
			'cresco'=> $this->input->post('cresco_current'),
			'decouvert' => $this->input->post('decouvert_current'),
			'cmt' => $this->input->post('cmt_current'),
			'cct' => $this->input->post('cct_current'),
			'total_clc' => $this->input->post('total_clc'),
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Consumer_Loans_Model->updateRow('riskanalysis_current_monthly_credit', 'rcic_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis_current_monthly_credit',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}			
	}
	
	public function riskanalysis_monthly_payment_new_loan()
	{
		//echo "<pre>", print_r($_POST),"</pre>";exit;		
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_monthly_payment_new_loan($this->input->post('rcapid'));
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('rcapid')),
			'customer_id' => $this->input->post('rcustomarid'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>2,
			'cresco'=> $this->input->post('cresco_monthly'),
			'decouvert' => $this->input->post('decouvert_monthly'),
			'cmt' => $this->input->post('cmt_monthly'),
			'cct' => $this->input->post('cct_monthly'),
			'total_mlc' => $this->input->post('total_mlc'),
		);
		if(!empty($recordcheck)){
			$edit=$this->PP_Consumer_Loans_Model->updateRow('riskanalysis_monthly_payment_new_loan', 'rmic_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis_monthly_payment_new_loan',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}			
	}
	
	public function riskanalysis_financial_situation()
	{
		$recordcheck=$this->PP_Consumer_Loans_Model->check_riskanalysis_financial_situation($this->input->post('cl_aid'));		
		$data = array(	
			'admin_id'=>$this->session->userdata('id'),	
			'cap_id' =>trim($this->input->post('cl_aid')),
			'customer_id' => $this->input->post('customer_id'),
			'loan_type' => $this->input->post('loan_type'),
			'section'=>2,
			'net_salary'=> $this->input->post('net_salary'),
			'income_ratio' => $this->input->post('income_ratio'),
			'quotitecessible' => $this->input->post('quotitecessible'),
			'current_monthly_payments' => $this->input->post('current_monthly_payments'),
			'new_monthly_payment' => $this->input->post('new_monthly_payment'),
			'situation_total' => $this->input->post('situation_total'),
			'income_ratio_after' => $this->input->post('income_ratio_after'),
			'coeficientendettement' => $this->input->post('coeficientendettement'),
		);
		if(!empty($recordcheck)){
				$edit=$this->PP_Consumer_Loans_Model->updateRow('riskanalysis_financial_situation', 'rfs_id', $recordcheck,$data);
			if($edit){
				echo 1;
			}else{
				echo 0;
			}
		}else{
			$add=$this->PP_Consumer_Loans_Model->insertRow('riskanalysis_financial_situation',$data);
			if($add){
				echo 1;
			}else{
				echo 0;
			}
		}
	}


	/*===========Today 12-07-2019================*/

	public function add_newcustomer()
	{
		//print_r($_POST); exit;
		//print_r($this->input->post(),1);
		$isadmin=$this->session->userdata('id');
		$dob=date("Y-m-d", strtotime($this->input->post('dob')));		
		$employment_date=date("Y-m-d", strtotime($this->input->post('employment_date')));
		$edn_date_contract_cdd=date("Y-m-d", strtotime($this->input->post('edn_date_contract_cdd')));
		$opening_date=date("Y-m-d", strtotime($this->input->post('opening_date')));
		$expiration_date=date("Y-m-d", strtotime($this->input->post('expiration_date')));

		
		sleep(2);
		$tbl_cus_field=array(
			"admin_id"=>$isadmin,
			"aid"=>1,
			"account_name"=>$this->input->post('bank_name'),
			"account_number"=>trim($this->input->post('accoumt_number')),
			"dob"=>trim($dob),
			"address"=>$this->input->post('resides_address'),
			"emp_name"=>trim($this->input->post('emp_name')),
			"phone"=>$this->input->post('main_phone'),
			"created"=>date('Y-m-d H:i:s'),
		);		
		$getid=$this->PP_Consumer_Loans_Model->insertRow('tbl_customers',$tbl_cus_field);

		if($getid){

			//echo $getid;
			$tbl_customer_personalinformation=array(
				"customar_id"=>$getid,
				"first_name"=>$this->input->post('first_name'),
				"middle_name"=>$this->input->post('middle_name'),
				"last_name"=>$this->input->post('last_name'),
				"gender"=>$this->input->post('gender'),
				"dob"=>trim($dob),
				"education"=>$this->input->post('education'),
				"marital_status"=>$this->input->post('marital_status'),
				"email"=>trim($this->input->post('email')),
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customer_personalinformation',$tbl_customer_personalinformation);

			$tbl_customer_additionalinformation=array(
				"customar_id"=>$getid,
				"type_id"=>trim($this->input->post('typeofid')),
				"monthly_income"=>$this->input->post('monthly_income'),
				"monthly_expenses"=>$this->input->post('monthly_expenses'),
				"id_number"=>$this->input->post('id_number'),
				"state_of_issue"=>trim($this->input->post('state_of_issue')),
				"occupation"=>$this->input->post('occupation'),
				"main_phone"=>$this->input->post('main_phone'),
				"alternative_phone"=>trim($this->input->post('alter_phone')),
				"expiration_date_id"=>trim($expiration_date),			
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customer_additionalinformation',$tbl_customer_additionalinformation);
			
			$tbl_customar_employment_information=array(
				"customar_id"=>$getid,
				"emp_id"=>1,
				"employer_name"=>trim($this->input->post('emp_name')),
				"secteurs_id"=>$this->input->post('secteurs'),
				"cat_emp_id"=>$this->input->post('cat_employeurs'),
				"contract_type_id"=>$this->input->post('typeofcontract'),
				"employment_date"=>trim($employment_date),
				"sate_end_contract_cdd"=>trim($edn_date_contract_cdd),
				"years_professionel_experience"=>trim($this->input->post('years_professionel_experience')),
				"how_he_is_been_with_current_employer"=>trim($this->input->post('current_emp')),
				"emp_net_salary"=>trim($this->input->post('net_salary')),
				"retirement_age_expected"=>trim($this->input->post('retirement_age_expected')),
				"fees"=>0,
				"commisiion"=>0,
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customar_employment_information',$tbl_customar_employment_information);

			$tbl_customer_address=array(
				"customar_id"=>$getid,
				"admin_id"=>2,
				"city_id"=>trim($this->input->post('city')),
				"state_id"=>$this->input->post('state'),
				"street"=>$this->input->post('street'),
				"resides_address"=>trim($this->input->post('resides_address')),
				"created"=>date('Y-m-d H:i:s'),
			);

			$this->PP_Consumer_Loans_Model->insertRow('customer_address',$tbl_customer_address);

			$tbl_customar_bank_account=array(
				"customar_id"=>$getid,			
				"account_type"=>trim($this->input->post('account_type')),
				"account_no"=>trim($this->input->post('accoumt_number')),
				"bank_name"=>trim($this->input->post('bank_name')),
				"bank_phone"=>$this->input->post('bank_phone'),
				"opening_date"=>$opening_date,
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customar_bank_account',$tbl_customar_bank_account);

			$tbl_customar_other_information=array(
				"customar_id"=>$getid,
				"admin_id"=>2,			
				"information"=>trim($this->input->post('another_test')),
				"field_1"=>trim($this->input->post('test_field')),
				"field_2"=>trim($this->input->post('test_david')),
				"field_3"=>$this->input->post('cc_test'),
				"field_4"=>trim($this->input->post('cc_test')),
				"objet_credit"=>trim($this->input->post('obj_credit')),
				"frais_de_dossier"=>trim($this->input->post('frais_de_dossier')),
				"created"=>date('Y-m-d H:i:s'),
			);
			$this->PP_Consumer_Loans_Model->insertRow('customar_other_information',$tbl_customar_other_information);

			echo "success";
		}else{
			echo "error";
		}
	}	
	
	public function test(){
		$this->data['title'] = 'DCP - pploan';			
		$this->data['record']=$this->Common_model->get_admin_details(2);		
		$user_id = $this->session->userdata('id');
		$is_admin = ($user_id == 2) ? true :false;
		$this->data['is_admin'] = $is_admin;
		$this->render_template2('superadmin/test', $this->data);
	}

	/*============================Today modify on 19-08-2019=============================*/
	/*Change Type Id*/
	public function changetypeid()
	{
		sleep(1);		
		$udata=array("type_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customer_additionalinformation','ai_id', $this->input->post('ai_id'), $udata);
		if($udata){			
	  		$details="Update `Type Id` in additional information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);		
			echo 1;
		}else{echo 0;}
	}
	/*Change Secteurs*/
	public function changesecteurs()
	{
		sleep(1);	
		//print_r($_POST); exit;	
		$udata=array("secteurs_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('ai_id'), $udata);
		if($udata){
			$details="Update `Secteurs` in employment information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*Change Catégorie Employeurs*/
	public function changecat_employeurs()	{
		sleep(1);	
		//print_r($_POST); exit;	
		$udata=array("cat_emp_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
		if($udata){
			$details="Update `Catégorie Employeurs` in employment information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*Change Type of Contract Employeurs*/
	public function change_type_of_contract()
	{
		sleep(1);	
		//print_r($_POST); exit;	
		$udata=array("contract_type_id" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_employment_information','emp_infoid', $this->input->post('emp_infoid'), $udata);
		if($udata){
			$details="Update `Type of Contract` in employment information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*Change Objet of the Credit Other Information*/
	public function change_objet_of_the_credit()
	{
		//print_r($_POST); exit;
		sleep(1);
		$output = '';		
		$obj_arr = array();
		$objcredit = array("Consomation","Equipement","Immobilier","Scolaire","Autres");
		foreach ($objcredit as $key ) {
			$obj_arr[] = array("name" => $key);
		}			
		$udata=array("objet_credit" =>trim($this->input->post('select_val')),);
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_other_information','oid', $this->input->post('oid'), $udata);
		if($udata){
			$details="Update `Objet of the Credit` in other information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			$output=$obj_arr;
		}else{
			$output=array('error'=>"error");
		}		
		echo json_encode($output);
	}
	/*Change FRAIS dé DOSSIER Other Information*/
	public function postupdate_fees(){	  
		sleep(1);
		//print_r($_POST); exit;
		$eid=$this->input->post('id');
		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_other_information','oid', $this->input->post('id'), array('frais_de_dossier'=>trim($this->input->post('data'))));
		if($update){
			$details="Update `FRAIS dé DOSSIER` in other information.";
			$history_arr=array(
				"cl_aid" =>$this->input->post("cl_aid"),
				"admin_id" =>$this->session->userdata('id'),
				"customar_id" =>trim($this->input->post("customar_id")),
				"loan_type"=>1,
				"comment" =>$details,
				"content_type"=>'edit',			
				"created" =>date('Y-m-d H:i:s')
			);
			$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
			echo 1;
		}else{echo 0;}
	}
	/*System Docs Promissory Note*/
	public function promissory_note()
	{
	    error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_promissory_note_form($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		//$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}
	public function	generate_promissory_note_form($id)
	{
		
		//error_reporting(0);
		//echo $id; exit;
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		
		return  $this->load->view('superadmin/atlantique_preet_scolaire_formulaire_en_anglais',$this->data,true);
	
	}

	/*System Docs Credit Agreement*/
	public function credit_agreement()	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);
		$getHtmlagreement=$this->generate_credit_agreement_form($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		//$abc=pdf_po_create_agreement_form($getHtmlagreement,$filename,true);
	}
	public function generate_credit_agreement_form($id)
	{
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/atlantique_pret_scolaire_2017_cg_en_anglais',$this->data,true);
	}

	/*Today 19-07-2018 Update*/
	public function enableddisabled()
	{
		//print_r($_POST); exit;
		/*[capid] => 96
	    [post] => Véhicule
	    [val] => 0*/
	    if(!empty($this->input->post('post')))
	    {
	    	if($this->input->post('post')=="Véhicule")
	    	{
	    		$data=array('check_vehicule' =>trim($this->input->post('val')));
	    		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}
	    	if($this->input->post('post')=="Déposit")
	    	{
	    		$data=array('check_deposit' =>trim($this->input->post('val')));
	    		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	} 
	    	if($this->input->post('post')=="Maison")
	    	{
	    		$data=array('check_maison' =>trim($this->input->post('val')));
	    		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}

	    	if($this->input->post('post')=="Excemption")
	    	{
	    		$data=array('check_excemption' =>trim($this->input->post('val')));
	    		$update=$this->PP_Consumer_Loans_Model->updateRow('customar_applicationform','cap_id', $this->input->post('capid'), $data);
	    		if($update)
	    		{
	    			echo 1;
	    		}else{
	    			echo 0;
	    		}
	    	}
	    }
	}
	/*Decision Status Section*/
	public function comment_manager()
	{
		//print_r($this->input->post());exit;
		$comnt='Decision - ';
		$output = '';
		$this->form_validation->set_error_delimiters('<span>', '</span>');
		$this->form_validation->set_rules('decision','Please Select From Below', 'required');
		$this->form_validation->set_rules('commentstatus','Comment', 'required');	
		$this->form_validation->set_message('required', 'You missed the input {field}!');
		if ($this->form_validation->run() == FALSE)
		{
			$output=array('error'=> validation_errors());	
		}
		else
		{
			sleep(2);
			$comnt .='Account Manager '.trim($this->input->post('decision')).' this loan. '.$this->input->post('commentstatus').'|';
			$fata2=array(		
				'manager_id'=>trim($this->input->post('account_manager_id')),
				'branch_id'=>trim($this->input->post('branch_id')),
				'account_manager_id'=>trim($this->input->post('account_manager_id')),
				'customar_id'=>trim($this->input->post('customar_id')),		
				'loan_id'=>trim($this->input->post('cl_aid')),
				'decision'=>trim($this->input->post('decision')),
				'commentstatus'=>trim($this->input->post('commentstatus')),
				'loantype'=>1,
				'modified'=>date('Y-m-d H:i:s'),

			);
			$insert=$this->PP_Consumer_Loans_Model->insertRow('branmanager_approbation',$fata2);
			if($insert){

				if($this->input->post('decision')=="Avis défavorable") /*Reject*/
				{
					$status = array(
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>1,
						'modified'=>date('Y-m-d H:i:s'),
					);
				}
				else if($this->input->post('decision')=="Avis Favorable")
				{
					$status = array(
						'loan_status'=>trim($this->input->post('decision')),
						'a_review'=>1,
						'branchmanager_status'=>'Process',
						'modified'=>date("Y-m-d H:i:s"),
					);
				}	
				else{
					$status = array(
						'loan_status'=>trim($this->input->post('decision')),
						'modified'=>date('Y-m-d H:i:s'),
						'a_review'=>0,					
					);	
				}			
				$this->PP_Consumer_Loans_Model->updateRow('consumer_loans_applicationform','cl_aid', $this->input->post('cl_aid'), $status);
				$msg2=str_replace('|', ', ', $comnt);
				$details=$msg2;

				$history_arr=array(
					"cl_aid" =>trim($this->input->post('cl_aid')),
					"admin_id" =>trim($this->input->post('account_manager_id')),				
					"comment" =>$details,
					"loan_type"=>1,	
					'content_type'=>'text',	
					"customar_id" =>trim($this->input->post("customar_id")),						
					"created" =>date('Y-m-d H:i:s')
				);
				$res=$this->PP_Consumer_Loans_Model->insertRow('tracking_timeline',$history_arr);
				$output=array('success' =>"Decision successfully updated.");
			}else{
				$output=array('error' =>"Unable update to record");
			}
		}
		echo json_encode($output);
	}

	public function SearchAccount(){
		//print_r($_POST);
		$segment=$this->input->post('segment');
		$data= $this->data['accontdata']=$this->PP_Consumer_Loans_Model->get_account_details($this->input->post('account'));		
		$html=null;
		foreach ($data as $key) {
			$html .="<tr>
			<td>".$key['cid']."</td>
			<td>".$key['first_name']." ".$key['middle_name']." ".$key['last_name']."</td>
			<td>".$key['account_name']."</td>
			<td>".$key['account_number']."</td>
			<td>".$key['dob']."</td>
			<td>".$key['address']."</td>
			<td>".$key['emp_name']."</td>
			<td>".$key['phone']."</td>
			<td><a href=\"javascript:void(0)\" class=\"btn btn-primary\" onclick=\"return theFunction(".$key['cid'].");\">
			<img src=\"".base_url('assets/img/select2-spinner.gif')."\" class=\"pull-left\" id='ajax-loder".$key['cid']."' style='position:relative;top: 2px;left: -2px; display: none;'' /> SELECT</a></td>
		</tr>";
		 }
		 echo $html;
	}

	/*=========================Today 12-07-2019======================*/
	public function searchloanstatus(){
		//print_r($_POST);
		//echo trim($this->input->post('filter'));
		$recordcheck=$this->PP_Consumer_Loans_Model->checkloanstatuslist(trim($this->input->post('filter')));

		
		$html=null;
		if(!empty($recordcheck)){
			foreach ($recordcheck as $key) {
				$time_ago=$key['created'];
				$row = array();
				$html .="<tr>
				<td> ".$key['application_no']."</td>
				<td> ".$key['account_number']."</td>
				<td> ".$key['branch_name']."</td>
				<td> ".$key['clientfirstname']." ".$key['clientmiddlename']." ".$key['clientlastname']."</td>
				<td> ".$key['ltype']."</td>
				<td>".date('d-m-Y', strtotime($key['created']))." :";
				if(timeAgo($time_ago) >= 48){
					if($key['loan_status']=="Process" || $key['loan_status']=="Demande de retraitement"){
						$html .="<span class='blink' style='color:red'>".timeAgo($time_ago)."</span>";
					}else{
						$html .= timeAgo($time_ago);
					}
				}else{
					$html .= timeAgo($time_ago);
				}				
				$html .="</td>			
						<td>CFA ".number_format($key['loan_amt'],0,',',' ')."</td>
						<td> ".$key['loan_interest']."%</td>
						<td> ".$key['loan_term']."</td>
						<td>";						
							if($key['loan_status']=='Avis défavorable')
							{
								$label='label label-danger ui-draggable';
							}else if($key['loan_status']=='Confirm Disbursement')
							{
								$label='label label-success';
							}
							else if($key['loan_status']=='Avis Favorable')
							{
								$label='label label-info';
							}	
							else{
								$label="label label-primary";
							}
							
					$html .="<span class='$label'> ".$key['loan_status']."</span>
					</td>
					<td class=\"sorting_1\">
						<a href=\"".base_url('PP_Consumer_Loans/customer_details/').$key['cl_aid']."\" class=\"table-link\">
							<span class=\"fa-stack\">
								<i class=\"fa fa-square fa-stack-2x\"></i>
								<i class=\"fa fa-search-plus fa-stack-1x fa-inverse\"></i>
							</span>
						</a>
					</td>			
				</tr>";
				$row[] = $html;
			}
		}else{
		 $html .="<tr>
		 <td valign=\"top\" colspan=\"10\" class=\"dataTables_empty\">No matching records found</td>
		 </tr>";
		 $row[] = $html;
		}
		echo json_encode($row);
	}

	public function billetaorder()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_Billet_aÇ_Ordre_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		 
	}
	public function memo_of_setting_up()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_memo_of_setting_up_Credit_Scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
		 
	}

	public function formulaire_de_demande_credit()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_formulaire_de_demande_credit_scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
	}

	public function formulaire_adhesion_aufoud_de_grantie()
	{
		error_reporting(0);
		$segmentid=$this->uri->segment(3);			
		$getHtmlagreement=$this->generate_formulaire_adhesion_aufoud_de_grantie_credit_scolaire($segmentid);
		echo $getHtmlagreement;
		$filename=$segmentid.'-'.time();
	}

	public function generate_formulaire_adhesion_aufoud_de_grantie_credit_scolaire($id)
	{
		error_reporting(0);
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/formulaire_adhesion_aufoud_de_grantie_credit_scolaire',$this->data,true);
	}
	

	public function generate_formulaire_de_demande_credit_scolaire($id)
	{
		error_reporting(0);
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/formulaire-de-demande-credit',$this->data,true);
	}
	public function generate_Billet_aÇ_Ordre_Credit_Scolaire($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/BilletOrdre',$this->data,true);
	}

	public function generate_memo_of_setting_up_Credit_Scolaire($id)
	{
		 error_reporting(0);
		$this->data['appformD']=$this->PP_Consumer_Loans_Model->get_customar_applicationform_details($id);
		$customerID=$this->data['appformD'][0]['customar_id'];
		$this->data['loantax']=$this->PP_Consumer_Loans_Model->get_taxType();
		$this->data['loandetails']=$this->PP_Consumer_Loans_Model->get_new_application_form();
		$this->data['tracking_timeline']=$this->PP_Consumer_Loans_Model->get_tracking_timeline($id);
		$this->data['fees']=$this->PP_Consumer_Loans_Model->get_All_fees();
		$this->data['int_email']=$this->PP_Consumer_Loans_Model->get_interaction_data($id);
		
		$this->data['secteurs']=$this->PP_Consumer_Loans_Model->get_target_list_Secteurs();
		$this->data['cat_emp']=$this->PP_Consumer_Loans_Model->get_category_of_employers();
		$this->data['contract_type']=$this->PP_Consumer_Loans_Model->get_type_of_contract();
		$this->data['collateral']=$this->PP_Consumer_Loans_Model->get_collateral($id);
		$this->data['customersd']=$this->PP_Consumer_Loans_Model->get_customersdetailsinfo($this->data['appformD'][0]['customar_id']);
		$this->data['risk_analysis']=$this->PP_Consumer_Loans_Model->get_risk_analysisfile($id);

		$this->data['pinfo']=$this->PP_Consumer_Loans_Model->get_pInformation($customerID);
		$this->data['adinfo']=$this->PP_Consumer_Loans_Model->get_adInformation($customerID);
		$this->data['empinfo']=$this->PP_Consumer_Loans_Model->get_empInformation($customerID);
		$this->data['adrs']=$this->PP_Consumer_Loans_Model->get_adrsInformation($customerID);
		$this->data['bankinfo']=$this->PP_Consumer_Loans_Model->get_bnkInformation($customerID);
		$this->data['otherinfo']=$this->PP_Consumer_Loans_Model->get_oInformation($customerID);
		
		$this->data['riskcurrentmonthlyvrefit']=$this->PP_Consumer_Loans_Model->get_current_monthly_credit($id);
		$this->data['riskpaymentnewloan']=$this->PP_Consumer_Loans_Model->get_monthly_payment_new_loan($id);
		$this->data['riskfsituation']=$this->PP_Consumer_Loans_Model->get_financial_situation($id);
		$this->data['applicableloanratio']=$this->PP_Consumer_Loans_Model->get_applicableloan_ratio();
		return  $this->load->view('superadmin/memo-de-mise-em-place',$this->data,true);
	}

	public  function enableddisabled_documentbutton()
	{
		sleep(2);
		//print_r($_POST);
		$option=$this->input->post('option');		
		$data = array(	
			'admin_id'=>trim($this->session->userdata('id')),	
			'loan_type'=>trim($this->input->post('loantype')),
			'loan_id'=>trim($this->input->post('loanid')),			
		);
		if($option=="doc_1")
		{			
			$data1=array('doc_1' => $this->input->post('pass_data'),);
		}
		if($option=="doc_2")
		{			
			$data1=array('doc_2' => $this->input->post('pass_data'),);
		}
		if($option=="doc_3")
		{			
			$data1=array('doc_3' => $this->input->post('pass_data'),);
		}
		if($option=="doc_4")
		{			
			$data1=array('doc_4' => $this->input->post('pass_data'),);
		}
		if($option=="doc_5")
		{			
			$data1=array('doc_5' => $this->input->post('pass_data'),);
		}
		if($option=="doc_6")
		{			
			$data1=array('doc_6' => $this->input->post('pass_data'),);
		}
		if($option=="doc_7")
		{			
			$data1=array('doc_7' => $this->input->post('pass_data'),);
		}
		if($option=="doc_8")
		{			
			$data1=array('doc_8' => $this->input->post('pass_data'),);
		}
		if($option=="doc_9")
		{			
			$data1=array('doc_9' => $this->input->post('pass_data'),);
		}
		if($option=="doc_10")
		{			
			$data1=array('doc_10' => $this->input->post('pass_data'),);
		}
		if($option=="doc_11")
		{			
			$data1=array('doc_11' => $this->input->post('pass_data'),);
		}
		
		$checkdata = array_merge($data,$data1);
		//print_r($checkdata);
		$edit=$this->PP_Consumer_Loans_Model->updateRow('credit_conso_checklistbutton_enable_disable', 'id',$this->input->post('editid'),$checkdata);


	}

	
	 
}