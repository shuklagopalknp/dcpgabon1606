<!-- Css -->
<style type="text/css">
	.hidden { display: none; }
</style>
<!-- End of css -->

<!-- Content wrapper -->
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			
			<?php
				# Place to check the data 
				//echo "<pre>", print_r($loandetails), "</pre>";
				//echo "<pre>", print_r($loanrange), "</pre>";
			?>
			
			<!-- Breadcrumb -->
			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<li class="active"><span>PP ESCOMPTE</span></li>
					</ol>
				</div>
			</div>
			<!-- End of breadcrumb -->

			<!-- Page starts from here -->
			<div class="main-box-body clearfix">

				<!-- Add a new loan button = This button will open a model -->
				<?php if($this->session->userdata('role')==='2') {?>
					<a href="<?php echo base_url('PP_Escompte_Loan/PP_Escompte_Select_Societe');?>" class="btn btn-primary  openBtn"  >
						<i class="fa fa-plus-circle fa-lg"></i> Nouvelle Demande De Prêt
					</a>
				<?php } ?>
				<!-- End of button -->
			
				<!-- Main Center Body -->
				<div class="row" style="margin-top:10px;">					
					<div class="col-lg-12">
						<div class="main-box clearfix">

							<!-- Header status search -->
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
											<option value="Confirm Disbursement">Confirm Disbursement</option>
										</select>
									</div>
								</div>	
								<textarea class="checkstatus form-control" rows="10" style="display: none"></textarea>
							</header>
							<!-- End of header status search -->
											
							<!-- Show record here -->
							<div class="main-box-body clearfix">
								<div class="table-responsive">
									<table id="table-example" class="table table-hover">
										<thead>										
											<tr>
												<th>Application Number</th>
												<th>Numero De Compte</th>
												<th>Agence</th>
												<th>Societe</th>
												<th>Date De Dernier Paiement</th>
												<th width="12%">Statut Juridique</th>
												<th>Montant Demande</th>
												<th>Status</th>
												<th width="5%">View</th>
											</tr>
										</thead>
										<tbody id="getrecord">
											<?php if(!empty($loans)){
												foreach ($loans as $loan) {?>											
													<tr id="rowid<?php echo $loan['el_id'];?>">
														<td><?php echo $loan['application_no'];?></td>
														<td><?php echo $loan['_society']['numero_compte'] ?? "";?></td>
														<td><?php echo $loan['_society']['agence_bancaire'] ?? "";?></td>
														<td><?php echo $loan['_society']['nom_entreprise'] ?? "";?></td>
														<td><?php echo "dfgdf";?></td>
														<td><?php echo $loan['_society']['statut'];?></td>
														<td><?php echo "fgd";?></td>
														<td><?php
															if($loan['loan_status']=='Avis défavorable') {
																$label='label label-danger ui-draggable';
															} else if($loan['loan_status']=='Confirm Disbursement') {
																$label='label label-success';
															} else if($loan['loan_status']=='Avis Favorable') {
																$label='label label-info';
															}	else {
																$label="label label-primary";
															}?>
															<span class="<?= $label;?>"><?php echo ucwords($loan['loan_status']);?></span>
														</td>
														<td class="sorting_1">
															<a href="#" class="table-link">
																<span class="fa-stack">
																	<i class="fa fa-square fa-stack-2x"></i>
																	<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
																</span>
															</a>
														</td>
													</tr>
												<?php } ?>
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- End of showing records here -->

						</div>
					</div>
				</div>
				<!-- End of main center body -->

			</div>
			<!-- End of page starts from here -->

		</div>
	</div>

	<!-- Footer -->
	<footer id="footer-bar" class="row">
		<p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>
	</footer>
	<!-- End of footer -->	
	
</div>
<!-- End of content wrapper -->
 
<!-- Scripts -->
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
<script src="<?php echo  base_url(); ?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
<!-- End of scripts -->

<!-- Search result of dropdown -->
<script type="text/javascript">
$(document).ready(function() {
	$('#search_status').change(function() {
		var filter = $(this).val();
		$.ajax({
		  type:'POST',
		  url:'<?php echo base_url("PP_Escompte_Loan/Search_Escompte_Loan_Status");?>',
			data:{'filter':filter},
		  success:function(resp) {                      
		    console.log(resp);
		    var respt = JSON.parse(resp)
		    $('.checkstatus').val($.trim(respt)); 
		    $('#getrecord').html($.trim(respt)); 
		  }                
		});
	})
})
</script>
<!-- End of search result of dropdown -->

<!-- Pagination script -->
<script>
$(document).ready(function() {		
	var table = $('#table-example').dataTable({
		'info': false,
		'order': [[8, 'desc' ]],
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
});
</script>
<!-- End of pagination script -->
	
</body>
</html>