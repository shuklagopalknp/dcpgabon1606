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
						<li class="active"><span>COMMUNE</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
                                <?php if (in_array('10_1', $this->session->userdata('portal_permission'))){?>
				<a href="<?=base_url('Commune/select')?>" class="btn btn-primary" >
					<i class="fa fa-plus-circle fa-lg"></i> Add Loan
				</a>
                                <?php } ?>
				
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
												<th class="hidden">S.No.</th>
												
												<th>Application Number</th>
												<th>Numero De Compte</th>
												<th>Agence</th>
												<th>Client / Raison Sociale</th>
												<th>Created On</th>
												<th width="5%">Status</th>
												<th width="5%">Withdrawal Status</th>
												<th width="15%">View</th>
											</tr>
										</thead>
										<tbody id="getrecord">
											<?php if(!empty($loan_details)) {
												$count = 1;
												foreach($loan_details as $key => $ld){
												$cust_data =  json_decode($ld['customer_data']);
													
											?>	
											    <tr id="rowid<?php echo $ld['loan_id'];?>">

											    	<td class="hidden"> <?php echo $count++;?></td>
											    	
											    	<td><?php echo $ld['application_no']?></td>
											    	<td><?php echo $cust_data->account_no?></td>
											    	<td><?php echo $ld['branch_name']?></td>
											    	<td>
											    		<?php if($ld['customer_type'] == '1')
											    		{
											    			echo trim(ucwords($cust_data->first_name." ".$cust_data->middle_name." ".$cust_data->last_name));
											    		}
											    		else{
											    			echo $cust_data->company_name;
											    		}
											    		?>
											    	</td>
											    	<td><?php echo $ld['created_at']?></td>
											    	<td><?php 

											    		if($ld['final_status'] == "Disbursement")
											    		{
											    			if($this->session->userdata('role') == "12")
											    			echo '<span class="label label-success"> Disbursement</span>';
											    			else
											    			echo '<span class="label label-success"> Confirm Disbursement</span>';	
											    		}
											    		else{
											    			if($ld['approval_status'] == "Process")
											    		{  
											    		    if($this->session->userdata('role') == "12")
											    		    {
											    		     if (in_array('10_6', $this->session->userdata('portal_permission'))){
											    		     	
											    		     ?>
											    		    	 <button type="button" class="btn btn-info" onclick="loanDisbursement(<?php  echo $ld['loan_id'];?>)">
																	Confirm <img src="<?php echo base_url("assets/img/loading.gif");?>" class="loader_class<?php echo $ld['loan_id'];?>" style="display:none">
																</button> 
															<?php } } else 
											    		    {
											    			echo '<span class="label label-primary">Process</span>';
											    			}
											    		}
											    		else if($ld['approval_status'] == "Avis Favorable"){
											    			echo '<span class="label label-info">Avis Favorable</span>';
											    		}
											    		else if($ld['approval_status'] == "Avis D??favorable")
														{
															echo '<span class="label label-danger">Avis D??favorable</span>';
														}
														else if($ld['approval_status'] == "Confirm Disbursement")
														{
															echo '<span class="label label-success">Confirm Disbursement</span>';
														}
														else {
															echo '<span class="label label-primary">Pending</span>';
														}
											    		}

											    													    		
											    	?></td>
											    	<td>
											    		<?php 

											    		if($app_details =$this->Commune_Model->current_worflow_status($ld['loan_id']))
											    		{
											    			if($app_details[0]['status'] == "Disbursement")
											    			{
											    				echo '<span class="label label-success">Disbursement</span>';
											    			}
											    			else{
											    				$details  =  $this->Commune_Model->get_workflow_details($ld['loan_id']);
													    		//print_r($details);
													    		if($details['approval_status'] == "Avis Favorable"){
													    			echo '<span class="label label-info">Avis Favorable</span>';
													    		}
													    		else if($details['approval_status'] == "Process")
													    		{  
													    		    if($this->session->userdata('role') == "12")
													    		    {
													    		     if (in_array('10_6', $this->session->userdata('portal_permission'))){
													    		     	
													    		     ?>
													    		    	 <button type="button" class="btn btn-info" onclick="withdrawDisbursement('<?php  echo $ld['loan_id'];?>','<?php echo $details['withdraw_id']?>')">
																			Confirm <img src="<?php echo base_url("assets/img/loading.gif");?>" class="loader_class1<?php echo $ld['loan_id'];?>" style="display:none">
																		</button> 
																	<?php } 
																	} else 
													    		    {
													    			echo '<span class="label label-primary">Process</span>';
													    			}
													    		}
													    		else if($details['approval_status'] == "Avis D??favorable"){
													    			echo '<span class="label label-danger">Avis D??favorable</span>';
													    		}
													    		else if($details['approval_status'] == "Confirm Disbursement")
																{
																	echo '<span class="label label-success">Confirm Disbursement</span>';
																}
																else
																{
																	echo '<span class="label label-primary">Pending</span>';
																}
											    			}
											    		}


											    		
											    		?>

											    	</td>
											    	<td class="sorting_1">
											    		<a href="<?php echo base_url('Commune/customer_details/').$ld['loan_id'];?>" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
														</span>
													</a>
											    	</td>
											    	
											    </tr> 

											<?php }
											} ?>
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
	

	// Loan Disbursement
	function loanDisbursement(event)
	{
		if (confirm('Are you sure you want to loan disbursement?')) {			
			$.ajax({
		            url: '<?php echo base_url("Business_Product/confirm_disbursement/commune");?>',
		            type: "POST",
		            data: {
		                'cl_aid':event
		            },
		            beforeSend: function(){
		            	$('#rowid'+event).addClass("lodertypeof");
		            	$(".loader_class"+event).css('display','inline');
		            },
		            success: function (response) {
		                console.log(response);
		                $('.dsprecord').html(response);		                
		                $('#rowid'+event).removeClass("lodertypeof");
		                $(".loader_class"+event).css('display','none');
		                if($.trim(response)=='success'){
		            		notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Loan `Disbursement` update and customer send a emails successfully.</p>','success');
		            		 setTimeout(function() {                
				          		location.reload();
			        		}, 2000);
		            	}else{
		            		notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>some error occurred! Unabel to send a mail.</p>','error');
		            	}
		            }
		        });
		}

	}


	// Withdraw  Disbursement
	function withdrawDisbursement(event,record_id)
	{
		if (confirm('Are you sure you want to loan withdraw disbursement?')) {			
			$.ajax({
		            url: '<?php echo base_url("Business_Product/confirm_withdraw_disbursement");?>',
		            type: "POST",
		            data: {
		                'cl_aid':event,
		                'record_id':record_id
		            },
		            beforeSend: function(){
		            	$('#rowid'+event).addClass("lodertypeof");
		            	$(".loader_class1"+event).css('display','inline');
		            },
		            success: function (response) {
		                console.log(response);
		                $('.dsprecord').html(response);		                
		                $('#rowid'+event).removeClass("lodertypeof");
		                $(".loader_class1"+event).css('display','none');
		                if($.trim(response)=='success'){
		            		notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Loan withdraw `Disbursement` update and customer send a emails successfully.</p>','success');
		            		 setTimeout(function() {                
				          		location.reload();
			        		}, 2000);
		            	}else{
		            		notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>some error occurred! Unabel to send a mail.</p>','error');
		            	}
		            }
		        });
		}

	}


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