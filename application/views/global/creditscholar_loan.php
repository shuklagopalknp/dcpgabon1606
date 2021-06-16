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
						<li><a href="<?php echo base_url('DashboardGlobal');?>">TABLEAU DE BORD</a></li>
						<li class="active"><span>CREDIT SCHOLAIRE</span></li>
					</ol>
				</div>
			</div>
			<?php //echo "<pre>", print_r($record),"</pre>";?>			
			<div class="main-box-body clearfix">
				<?php //echo "<pre>", print_r($loandetails), "</pre>";?>
				<div class="row" style="margin-top:10px;">					
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<header class="main-box-header clearfix">
									<div class="form-group pull-left">
										<label class="col-lg-3 control-label">Status:</label>
										<div class="col-lg-9">
											<select class="form-control" name="search_status" id="search_status">	
												<option value="All">All</option>
												<option value="Process">Process</option>
												<option value="Avis Favorable">Avis Favorable</option>
												<option value="Avis défavorable">Avis défavorable</option>
												<option value="Demande de retraitement">Demande de retraitement</option>
												<option value="Confirm Disbursement">Déboursement Confirmé</option>
											</select>
										</div>
									</div>	
									<textarea class="checkstatus form-control" rows="10" style="display: none"></textarea>							
								</header>
							<div class="main-box-body clearfix">
								<div class="table-responsive">
									<table id="table-example" class="table table-hover">
										<thead>
											<tr>
												<th>Application Number </th>
												<th>numéro de compte </th>
												<th>Agency</th>
												<th>Name</th>
												<th>Last Payment Date</th>
												<th width="12%">Due Date</th>
												<th>Total Amount</th>
												<th>TAUX INTERET</th>
												<th width="5%">DUREE</th>
												<th width="5%">Status</th>
												<th>CAD approved</th>
												<th>view</th>
											</tr>
										</thead>
										<tbody id="getrecord">
											<?php 
											$last=array();
											foreach ($loandetails as $key) {
												$appdata=json_decode($key['appliedformdata']);
												$time_ago=$key['created'];
												$databinding=json_decode($key['databinding']);
												foreach ($databinding as $kdata ) {         		
									         		$last[]=$kdata->month.'-'.$kdata->years;
									       		}
								       			$createddate=date('d', strtotime($key['created']));
								       			$DateofLastPayment = $createddate.'-'.end($last);
											?>
											<tr id="rowid<?php echo $key['cap_id'];?>">
												<td><?php echo $appdata[0]->application_no;?></td>
												<td><?php echo $key['account_number'];?></td>
												<td><?php echo $record[0]->user_name;?></td>
												<td><?php echo $key['clientfirstname'] ?: '';?><?php echo $key['clientmiddlename'] ?: ' ';?><?php echo $key['clientlastname'] ?: '';?></td>
												<td><?php echo $DateofLastPayment;?></td>
												<td><?php echo date("d-m-Y", strtotime($key['created'])).":";
												if(timeAgo($time_ago) >= 48){
													if($key['branchmanager_status']=="Process" || $key['branchmanager_status']=="Demande de retraitement"){
															echo "<span class='blink' style='color:red'>".timeAgo($time_ago)."</span>";
													}else{

														echo timeAgo($time_ago);
													}
												}else{
													echo timeAgo($time_ago);
												}
													?>
												</td>
												
												<td>CFA <?php echo number_format($appdata[0]->loan_amt,0,',',' ');?></td>
												<td><?php echo $appdata[0]->loan_interest;?>%</td>
												<td><?php echo $appdata[0]->loan_term;?></td>
												<td>
													<?php
													if($key['branchmanager_status']=='Avis défavorable')
													{
														$label='label label-danger ui-draggable';
													}else if($key['branchmanager_status']=='Confirm Disbursement')
													{
														$label='label label-success';
													}
													else if($key['branchmanager_status']=='Avis Favorable')
													{
														$label='label label-info';
													}	
													else{
														$label="label label-primary";
													}
													?>
													<span class="<?= $label;?>"><?php echo $key['branchmanager_status'];?></span>
												</td>
												<td>
												<?php if($key['final_confirmation']=="Confirm"){ ?>
													<button type="button" class="btn btn-info" onclick="loanDisbursement(<?php echo $key['cap_id'];?>)">
														<?php echo $key['final_confirmation'] ;?>
													</button>
												<?php } else if($key['final_confirmation']=="Disbursement"){
													echo "<span class=\"label label-success\">".$key['final_confirmation']."</span>";
												}
												else{
													if($key['branchmanager_status']=='Avis défavorable')
													{
														echo "<span class=\"label label-danger\">Avis défavorable</span>";
													}else{
														echo "<span class=\"label label-primary\">".$key['final_confirmation']."</span>";
													}
													
												} ?>
												</td>												
												<td class="sorting_1">
													<a href="<?php echo base_url('PP_Consumer_Global_User/credit_scolar_customer_details/').$key['cap_id'];?>" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													<input type="hidden" name="mdate" value="<?php echo date('d-m-Y',strtotime($key['modified']));?>">

												</td>
												<?php } ?>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<textarea rows="10" class="dsprecord" style="display: none"></textarea>
			<div class="datadisplay"></div>			
		</div>
	</div>
	<footer id="footer-bar" class="row">
		<p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>
	</footer>
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
	$(document).ready(function() {
	  	$('#search_status').change(function() {
		    var filter = $(this).val();
		    //alert(filter);
		    $.ajax({
		        type:'POST',
		        url:'<?php echo base_url("PP_Credit_Scholar_Approval_Bank/searchloanstatus");?>',
		        data:{'filter':filter},
		        /*beforeSend: function(){         
		            $('#DecisionStatusdetails').css("opacity","0.5"); 
		            
		        },*/
		        success:function(resp){                      
		            console.log(resp);		                     
		            var respt = JSON.parse(resp);
		            $('.checkstatus').val($.trim(respt)); 
		            $('#getrecord').html($.trim(respt));		                     
		        }                
		    });
		    
		  })
	})

</script>
 
<script type="text/javascript">
	function blink_text() {
		$('.blink').fadeOut(500);
		$('.blink').fadeIn(500);
	}
	setInterval(blink_text, 1000);
</script>
    
<script>
	$(document).ready(function() {		
		var table = $('#table-example').dataTable({
			'info': false,
			'order': [[ 11, 'desc' ]],
			'sDom': 'lTfr<"clearfix">tip',
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
	});	

	function loanDisbursement(event)
	{
		if (confirm('Are you sure you want to loan disbursement?')) {			
			$.ajax({
		            url: '<?php echo base_url("PP_Credit_Scholar_Approval_Bank/confirm_disbursement");?>',
		            type: "POST",
		            data: {
		                'cap_id':event
		            },
		            beforeSend: function(){
		            	$('#rowid'+event).addClass("lodertypeof");
		            },
		            success: function (response) {
		                console.log(response);
		                $('.dsprecord').val(response);		                
		                $('#rowid'+event).removeClass("lodertypeof");
		                if($.trim(response)=='success'){
		            		notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Loan `Disbursement` update and customer send a emails successfully.</p>','success');
		            		 setTimeout(function() {                
				          		location.reload();
			        		}, 2500);
		            	}else{
		            		notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>some error occurred! Unabel to send a mail.</p>','error');
		            	}
		            }
		        });
		}

	}

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
</body>
</html>