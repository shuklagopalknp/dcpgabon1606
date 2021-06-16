<style type="text/css">
	.hidden { display: none; }

	.lodertypeof {    
    background-color: #dff0d8c7;
    background-image: url("<?php echo base_url('assets/img/select2-spinner.gif');?>");
    background-size: 18px 18px;
    background-position:right center;
    background-repeat: no-repeat;
    opacity: 0.5;
    }
</style>
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">

			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<li><a href="<?php echo base_url('PP_FETES_A_LA_CARTE');?>"><span>PP FETES A LA CARTE </span></a></li>
						<li class="active"><span>ARCHIVE LOAN</span></li>
					</ol>
				</div>

			</div>
			<div class="main-box-body clearfix">

				
				<div class="row" style="margin-top:10px;">					
					<div class="col-lg-12">
						

						<div class="main-box clearfix">

							
							<header class="main-box-header clearfix">								
									<div class="form-group pull-left">
										
									</div>	
								<textarea class="checkstatus form-control" rows="10" style="display: none"></textarea>
							</header>
							<div class="main-box-body clearfix">

								<div class="table-responsive">
									<table id="table-example" class="table table-hover table-striped">
										<thead>
											<tr>
												  <th style="display:none;">S.no</th>
												<th>Numéro Demande</th>
												<th>Numero De Compte</th>
												<th>Code Exploitant</th>
												<th>Exploitant Placeur</th>
												<th>Client Agence Bancaire</th>
												<th>Client</th>
												<!-- <th>Date De Dernier Paiement</th> -->
												<th width="12%">Date De Demande Prêt</th>
												<th>Montant Du Prêt</th>
												<th>Taux Interet</th>
												<th width="5%">Durée</th>
												<th width="5%">Statut</th>
												<th width="15%">Vue</th>
											</tr>
										</thead>
										<tbody id="getrecord">
											<?php 
											
											$last=array();
								       		 if(!empty($loan_details)) {
												$count = 1;
												foreach($loan_details as $key => $ld){
												$cust_data =  json_decode($ld['customer_data']);
												
												$time_ago=$ld['created'];
												if(!empty($ld['databinding'])){
													$databinding=json_decode($ld['databinding']);
													foreach ($databinding as $kdata ) {
										         		$last[]=$kdata->month.'-'.$kdata->years;
										       		}
									       		}									       		
								       			$createddate=date('23', strtotime($ld['created']));
								       			// echo $ld['created'];
								       			$DateofLastPayment = $createddate.'-'.end($last);
											
											?>
											<tr id="rowid<?php echo $ld['loan_id'];?>">
											    <td style="display:none;"><?php echo $count;?></td>
												<td><?php echo $ld['application_no'];?></td>
												<td><?php echo $cust_data->account_no;?></td>
												<?php
												
												$createdBydetail=$controller->getUserDetail($ld['created_by']);?>
												<td><?php echo $createdBydetail['exploitent'];?></td>
												<td><?php echo $createdBydetail['user_name'];?></td>
												<td><?php print_r($controller->getBranch($cust_data->branch_id));?></td>
												<td>
											    		<?php if($ld['customer_type'] == '1')
											    		{
											    			echo trim(strtolower($cust_data->first_name." ".$cust_data->middle_name." ".$cust_data->last_name));
											    		}
											    		else{
											    			echo $cust_data->company_name;
											    		}
											    		?>
											    	</td>
												<!-- <td><?php echo $DateofLastPayment; ?></td> -->
												<td><?php echo date("d-m-Y", strtotime($ld['created_at'])).":";
												if(timeAgo($time_ago) >= 48){
													if($key['loan_status']=="Process" || $key['loan_status']=="Demande de retraitement	"){
															echo "<span class='blink' style='color:red'>".timeAgo($time_ago)."</span>";
													}else{

														echo timeAgo($time_ago);
													}
												}else{
													echo timeAgo($time_ago);
												}
													?>
												</td>
												<td><?php echo $ld['loan_amt'];?></td>
												
												<td><?php echo $ld['loan_interest'];?>%</td>
												
												<td><?php echo $ld['loan_term'];?>M</td>
												<td><?php 

												$d_where  =  array('loan_id' => $ld['loan_id'],'loan_type' => "credit_conso",'review !='=>NULL,'status' => "1");
												$this->db->select('tbl_all_applications.approval_status,tbl_all_applications.workflow_order,r.name,');
											    $this->db->order_by('workflow_order','desc');
											    $this->db->limit('1');
											    $this->db->join('tbl_role as r','r.id = tbl_all_applications.assigned_roles','inner');
											    $app_status = $this->db->get_where('tbl_all_applications',$d_where)->row_array();
											    
											    
											    $d_where1  =  array('loan_id' => $ld['loan_id'],'loan_type' => "credit_conso",'status' => "1");
											    $this->db->order_by('workflow_order','desc');
											    $this->db->limit('1');
											    $last_data =  $this->db->get_where('tbl_all_applications',$d_where1)->row_array();
											    
											  //  print_r($app_status);
											    
											    
														
											    		if($ld['final_status'] == "Disbursement")
											    		{
											    			echo '<span class="label label-success">Mise a Disposition</span><br/><br/>';
											    			echo '<span><small>'.$app_status['name'].'</small></span>';
											    		}
											    		else{
											    		    if(!empty($app_status)){
    											    			if($app_status['approval_status'] == "Process")
        											    		{
        											    		    if($this->session->userdata('role') == "12" && $last_data['workflow_order'] == $app_status['workflow_order'] )
        											    		    {
        											    		     if (in_array('4_6', $this->session->userdata('portal_permission'))){
        											    		     ?>
        											    		    	 <button type="button" class="btn btn-info" onclick="loanDisbursement(<?php  echo $ld['loan_id'];?>)">
        																	Confirm <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right loader_class<?php echo $ld['loan_id']; ?>" style="display: none;">
        																</button> 
        															<?php }else{
        																echo "No permission";
        															} } else 
        											    		    {
        											    			echo '<span class="label label-primary">Traitement en Cours</span><br/><br/>';
        											    			echo '<span><small>'.$app_status['name'].'</small></span>';
        											    			}
        											    		}
        											    		else if($app_status['approval_status'] == "Avis Favorable"){
        											    			echo '<span class="label label-info">Avis Favorable</span><br/><br/>';
        											    			echo '<span><small>'.$app_status['name'].'</small></span>';
        											    		}
        											    		else if($app_status['approval_status'] == "Avis défavorable")
        														{
        															echo '<span class="label label-danger">Avis Défavorable</span><br/><br/>';
        															echo '<span><small>'.$app_status['name'].'</small></span>';
        														}
        														else if($app_status['approval_status'] == "Confirm Disbursement")
        														{
        															echo '<span class="label label-success">Confirm Disbursement</span><br/><br/>';
        															echo '<span><small>'.$app_status['name'].'</small></span>';
        														}
        														else if($app_status['approval_status'] == "Demande de retraitement")
        														{
        															echo '<span class="label label-danger">Demande de Retraitement</span><br/><br/>';
        															echo '<span><small>'.$app_status['name'].'</small></span>';
        														}
        														else {
        															echo '<span class="label label-primary">Initiation en Cours</span><br/><br/>';
        															echo '<span><small>'.$app_status['name'].'</small></span>';
        														}
											    		    }
											    		    else {
											    		        	echo '<span class="label label-primary">Initiation en Cours</span><br/><br/>';
											    		        	echo '<span><small>'.$app_status['name'].'</small></span>';
											    		    }
											    		}

											    													    		
											    	?></td>
												
											 	<td class="sorting_1">
													<a href="<?php echo base_url('PP_FETES_A_LA_CARTE/customer_details/').$ld['loan_id']."/view";?>" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													
													
													
												</td>
												
												
											</tr>
											<?php } }  ?>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
	
	<!-- ================== -->
</div>
</div>
</div>
</div>

 
<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/demo.js"></script>  

<script src="<?php echo  base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.slimscroll.min.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-jvectormap-world-merc-en.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/gdp-data.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.threshold.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.axislabels.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/skycons.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/raphael-min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/morris.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/bootstrap-wizard.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
 
<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script>



<script type="text/javascript">
	

	

	// show popup notification 

   function notificationcall(data, status)
  {
      var notification = new NotificationFx({
          message : data,
          layout : 'bar',
          effect : 'slidetop',
          type : status          
        });
          notification.show();
          this.disabled = true;
  }
</script>

<script>
	$(document).ready(function() {		
		var table = $('#table-example').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			"oLanguage": {
			  "sSearch": "<span>RECHERCHER:</span> _INPUT_", //search
			  "sLengthMenu": "AFFICHAGE _MENU_ ENREGISTREMENTS",
			},
			'oTableTools': {
	            'aButtons': [
	                {
	                    'sExtends':    'collection',
	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
	                }
	            ]
	        },	        
		});
		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');


		var table1 = $('#table-example1').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			"oLanguage": {
			  "sSearch": "<span>RECHERCHER:</span> _INPUT_", //search
			  "sLengthMenu": "AFFICHAGE _MENU_ ENREGISTREMENTS",
			},
			'oTableTools': {
	            'aButtons': [
	                {
	                    'sExtends':    'collection',
	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
	                }
	            ]
	        },	        
		});
		
	    var tt1 = new $.fn.dataTable.TableTools( table1 );
		$( tt1.fnContainer() ).insertBefore('div.dataTables_wrapper');
		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});
		
		//new $.fn.dataTable.FixedHeader( tableFixed );
	});

	$('#loan_schedule').change(function() {	    
	    var $option = $(this).find('option:selected');	    
	    var value = $option.val();//to get content of "value" attrib
	    var text = $option.text();//to get <option>Text</option> content
	    $('.addsch').html(text);

	});
	</script>

</body>
</html>