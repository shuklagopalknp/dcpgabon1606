<style type="text/css">
	.hidden { display: none; }
</style>
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			
			<?php 
			//echo "<pre>", print_r($loandetails), "</pre>";
			//echo "<pre>", print_r($loanrange), "</pre>";
			?>
			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<li class="active"><span>CAUTION SCOLAIRE</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
				
				<!-- <button id="open-wizard" class="btn btn-primary">NEW APPLICATION</button> -->
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
												<th>NUMERO COMPTE BLOQUE</th>
												<th>AGENCE</th>
												<th>NOM ET PRENOMS CLIENT</th>
												<th>NOM ET PRENOMS ETUDIANT</th>
												<th width="12%">DUREE</th>
												<th>NET A PAYER</th>
												<th>NET A DEBOURSER</th>				
												<th width="5%">STATUS</th>
												<th>Director Operating Approved</th>
												<th>VIEW</th>
											</tr>
										</thead>
										<tbody id="getrecord">
											<?php 
											$last=array();
											if(!empty($loandetails)){
											foreach ($loandetails as $key) {
												//echo "<pre>",print_r($key), "</pre>";			
												$appdata=json_decode($key['appliedformdata']);
												$time_ago=$key['created'];								       			
											?>
											<tr id="rowid<?php echo $key['cl_aid'];?>">
												<td><?php echo $key['application_no'];?></td>
												<td><?php echo $key['account_number'];?></td>
												<td><?php echo $key['branch_name'];?></td>
												<td><?php echo $key['clientfirstname'] ?: '';?><?php echo $key['clientmiddlename'] ?: ' ';?><?php echo $key['clientlastname'] ?: '';?>
												</td>
												<td><?php echo $key['clientfirstname'] ?: '';?><?php echo $key['clientmiddlename'] ?: ' ';?><?php echo $key['clientlastname'] ?: '';?>
												</td>
												<td><?php echo number_format($key['loan_interest'],0,',','');?> Mois</td>				
												<td><?php echo number_format($key['net_pay_amt'],0,',',' ');?></td>
												
												<td><?php echo number_format($key['net_block_amt'],0,',',' ');?></td>
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
													<span class="<?= $label;?>"><?php echo ucwords($key['branchmanager_status']);?></span>
												</td>
												<td>
												<?php if($key['final_confirmation']=="Confirm"){ 
													echo "<span class=\"label label-success\">".$key['operating_director_status']."</span>";
													?>
													<!-- <button type="button" class="btn btn-info" onclick="loanDisbursement(<?php // echo $key['did'];?>)">
														<?php //echo $key['final_confirmation'] ;?>
													</button> -->
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
													<a href="<?php echo base_url('PP_Caution_Scolare_Loans_Bank/customer_details/').$key['cl_aid'];?>" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													<input type="hidden" name="mdate" value="<?php echo date('d-m-Y',strtotime($key['modified']));?>">
												</td>
												
												<?php } } ?>
											</tr>
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
 
 <script type="text/javascript">
	$(document).ready(function() {
	  	$('#search_status').change(function() {
		    var filter = $(this).val(),
		    branch_id= "<?php echo $loandetails[0]['branch_id'];?>";

		    $.ajax({
		        type:'POST',
		        url:'<?php echo base_url("PP_Caution_Scolare_Loans_Bank/searchloanstatus");?>',
		        data:{'filter':filter, 'bid':branch_id},
		        success:function(resp){                      
		            console.log(resp);
		            var respt = JSON.parse(resp)
		            $('.checkstatus').val($.trim(respt)); 
		            $('#getrecord').html($.trim(respt)); 
		            
		                     
		        }                
		    });
		    
		  })
	})

</script>

<script>
	$(document).ready(function() {		
		var table = $('#table-example').dataTable({
			'info': false,
			'order': [[9, 'desc' ]],
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
		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});
		
		//new $.fn.dataTable.FixedHeader( tableFixed );

		
		
	});
	</script>

	

</body>
</html>