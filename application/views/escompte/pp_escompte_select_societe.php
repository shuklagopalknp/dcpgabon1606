<style type="text/css">
	.hidden {
		display: none;
	}
</style>
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
						<li><a href="<?php echo base_url('Dashboard'); ?>">TABLEAU DE BORD</a></li>
						<li class="active"><span>PP ESCOMPTE - SELECTION SOCIETE</span></li>
					</ol>
				</div>
			</div>
			<!-- End of breadcrumb -->

			<!-- Page starts from here -->
			<div class="main-box-body clearfix">

				<!-- Main Center Body -->
				<div class="row" style="margin-top:10px;">
					<div class="col-lg-12">
						<div class="main-box clearfix">

							<!-- Header status search -->
							<header class="main-box-header clearfix">
								<div class="form-group pull-left col-md-3">
									<input type="text" name="search_status" id="search_status" class="form-control" width="20%" placeholder="Saisir le lumero de compte">
								</div>
								<textarea class="checkstatus form-control" rows="10" style="display: none"></textarea>
								<div class="text-right">
									<a href="javascript:void(0);" class="btn btn-primary  openBtn" data-toggle="modal" data-target="#myModal">
										<i class="fa fa-plus-circle fa-lg"></i> Ajouter Un Client
									</a>
								</div>
							</header>
							<!-- End of header status search -->

							<!-- Show record here -->
							<div class="main-box-body clearfix">
								<div class="table-responsive">
									<table id="table-example" class="table table-hover">
										<thead>
											<tr>
												<th>SOCIETE</th>
												<th>STATUT JURIDIQUE</th>
												<th>ADRESSE</th>
												<th>PRINCIPAL DIRIGEANT</th>
												<th>TELEPHONE</th>
												<th>ACTIONS</th>
											</tr>
										</thead>
										<tbody id="getrecord">
											<?php if (!empty($socities)) {
												foreach ($socities as $item) { ?>													
													<tr>
														<td><?php echo $item['nom_entreprise']; ?></td>
														<td><?php echo $item['statut']; ?></td>
														<td><?php echo $item['adresse']; ?></td>
														<td><?php echo $item['principal_dirigeant']; ?></td>
														<td><?php echo $item['telephone']; ?></td>
														<td><div class="col-lg-12"> <span><a href="JavaScript:void(0);" class="btn btn-primary  openBtn" onClick="javascript:window.open('<?php echo base_url('PP_Escompte_Loan/select_societe/').$item['society_id'];?>','Windows','width=1050,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">SELECT</a></span> </div></td>
													</tr>	
												<?php } ?>
											<?php	} else { ?>
												<tr><td colspan="6" style="text-align:center;">No Data Found!</td></tr>
											<?php } ?>
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
	<!-- ================== -->






<!-- Add new customer Modal -->
<!-- This modal is used to add a new societe -->
<div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	<div class="modal-dialog modal-lg modal-full-height modal-left modal-notify modal-info">
		<div class="modal-content">
			
			<!-- Modal Heading -->
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title heading lead">AJOUTER UNE SOCIETE</h4>
			</div>
			<!-- End of modal heading -->

			<!-- Form starts from here -->
			<form role="form" method="post" id="NewloanForm">
				<div class="modal-body">
					<div class="error-msg"></div>

					<!-- Informations generals -->
					<label><b>INFORMATIONS GENERALS</b></label>
					<hr>

					<div class="row">
						<div class="form-group col-md-6">
							<label>NOM ENTREPRISE</label>							
							<input type="text" class="form-control numberformat" id="nom_entreprise" name="nom_entreprise" required>
						</div>
						<div class="form-group col-md-6">
							<label>DATE DE CREATION</label>							
							<input type="text" class="form-control numberformat" id="date_de_creation" name="date_de_creation" required>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label>STATUT</label>							
							<input type="text" class="form-control numberformat" id="statut" name="statut" required>
						</div>
						<div class="form-group col-md-6">
							<label>NUMERO IMMATRICULATION</label>							
							<input type="text" class="form-control numberformat" id="numero_immatriculation" name="numero_immatriculation" required>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-12">
							<label>ADRESSE</label>							
							<input type="text" class="form-control numberformat" id="adresse" name="adresse" required>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label>CAPITAL</label>							
							<input type="text" class="form-control numberformat" id="capital" name="capital" required>
						</div>
						<div class="form-group col-md-6">
							<label>NUMERO DU COMPTE CONTRINUABLE</label>							
							<input type="text" class="form-control numberformat" id="numero_du_compte_contrinuable" name="numero_du_compte_contrinuable" required>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-12">
							<label>SECTEUR ACTIVITE</label>							
							<input type="text" class="form-control numberformat" id="secteur_activite" name="secteur_activite" required>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-6">
							<label>TELEPHONE</label>							
							<input type="text" class="form-control numberformat" id="telephone" name="telephone" required>
						</div>
						<div class="form-group col-md-6">
							<label>FAX</label>
							<input type="text" class="form-control numberformat" id="fax" name="fax" required>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-4">
							<label>EMAIL</label>							
							<input type="text" class="form-control numberformat" id="email" name="email" required>
						</div>
						<div class="form-group col-md-4">
							<label>NOMBRE DE SALARIE</label>							
							<input type="text" class="form-control numberformat" id="nombre_de_salarie" name="nombre_de_salarie" required>
						</div>
						<div class="form-group col-md-4">
							<label>SITE INTERNET</label>
							<input type="text" class="form-control numberformat" id="site_internet" name="site_internet" required>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-12">
							<label>PRINCIPAL DIRIGEANT</label>							
							<input type="text" class="form-control numberformat" id="principal_dirigeant" name="principal_dirigeant" required>
						</div>
					</div>
					<!-- End of informations generals -->

					<!-- INFORMATIONS SUR LE COMPTE BANCAIRE -->
					<br>
					<label><b>INFORMATIONS SUR LE COMPTE BANCAIRE</b></label>
					<hr>

					<div class="row">
						<div class="form-group col-md-6">
							<label>TYPE DE COMPTE</label>							
							<input type="text" class="form-control numberformat" id="type_de_compte" name="type_de_compte" required>
						</div>
						<div class="form-group col-md-6">
							<label>AGENCE BANCAIRE</label>
							<input type="text" class="form-control numberformat" id="agence_bancaire" name="agence_bancaire" required>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-12">
							<label>DATE OUVERTURE</label>							
							<input type="text" class="form-control numberformat" id="date_ouverture" name="date_ouverture" required>
						</div>
					</div>

					<div class="row">
						<div class="form-group col-md-4">
							<label>CODE BANQUE</label>							
							<input type="text" class="form-control numberformat" id="code_banque" name="code_banque" required>
						</div>
						<div class="form-group col-md-4">
							<label>CODE AGENCE</label>							
							<input type="text" class="form-control numberformat" id="code_agence" name="code_agence" required>
						</div>
						<div class="form-group col-md-4">
							<label>NUMERO COMPTE</label>
							<input type="text" class="form-control numberformat" id="numero_compte" name="numero_compte" required>
						</div>
					</div>

					<div class="form-group row">
						<div class="col-md-12">
							<label>CLE RIB</label>							
							<input type="text" class="form-control numberformat" id="cle_rib" name="cle_rib" required>
						</div>
					</div>
					<!-- END OF INFORMATIONS SUR LE COMPTE BANCAIRE -->

					<!-- Submit & close button -->
					<div class="modal-footer justify-content-center">
						<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn"><img src="<?php echo  base_url('assets/img/select2-spinner.gif'); ?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> SOUMETTRE</button>
						<button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal">FERMER</button>
					</div>
					<!-- End of submit & close button -->

				</div>
			</form>

		</div>
	</div>
</div>
<!-- End of adding new customers model -->


</div>
</div>
</div>
</div>

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
<!-- End of including scripts -->

<!-- Apply new application societe -->
<script type="text/javascript">
	$("#NewloanForm").validate({
		errorClass: 'has-error',
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight: function(element) {
			$(element).closest('.form-group').removeClass('has-error');
		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if (element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		submitHandler: function(form) {
			var form = $("form");
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("PP_Escompte_Loan/add_societe"); ?>',
				data: $(form).serialize(),
				beforeSend: function() {
					$('.submitBtn').attr("disabled", "disabled");
					$('#NewloanForm').css("opacity", "0.5");
					$('.outputdata').val("");
					$('.lodergif').css("display", "inline");
				},
				success: function(response) {
					console.log(response);
					$('.outputdata').val(response);
					$('#NewloanForm').css("opacity", "");
					$('.submitBtn').attr("disabled", false);
					$('.lodergif').css("display", "none");
					var resp = JSON.parse(response);
					if (resp.error) {
						$('.error-msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>' + $.trim(resp.error) + '.</div>');
					} else {
						$("#NewloanForm")[0].reset();
						$('.error-msg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> New Loan application process strat.' + resp.success + '</div>').show();
						setTimeout(function() {
							window.location.href = "<?php echo base_url('PP_Escompte_Loan/PP_Escompte_Select_Societe'); ?>";
						}, 500);
					}
				}
			});
		}
	});
</script>
<!-- End of Apply new application societe -->

<!-- Pagination script -->
<script>
$(document).ready(function() {		
	var table = $('#table-example').dataTable({
		'info': false,
		'order': [[5, 'desc' ]],
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

</body>
</html>