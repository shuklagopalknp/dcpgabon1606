<style>
label{	margin-top:10px;}
h3{	margin-bottom:10px;}
.form-group {
    margin-bottom: 5px;
}
.wizard-error, .wizard-failure, .wizard-success, .wizard-loading, .wizard-card
{	/*height:390px !important;*/
	/*height:auto  !important;*/
	/*overflow-y:hidden;*/
}

</style>

<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<?php //echo "<pre>", print_r($record[0]), "</pre>";?>
			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD </a></li>
						<li class="active"><span>DECOUVERT</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
			    
			     <button id="open-wizard" class="btn btn-primary openBtn"><i class="fa fa-plus-circle fa-lg"></i> Nouvelle Demande De Prêt</button>
			    
			    
					
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
												<th>Number De Compte</th>
												<th>Agence</th>
												<th>Client</th>
												<th>Date De Demande De Pret</th>			
												<th>Salaire Moyen</th>
												<th width="15%">Montant Demande</th>
												<th width="5%">Status</th>
												<th>View</th>
											</tr>
										</thead>
										<tbody id="getrecord">
											<?php foreach ($indexdetails as $key ) {
												//echo "<pre>", print_r($key),"</pre>";
											?>
											<tr id="rowid<?php echo $key['did'];?>">
												<td><?php echo $key['application_no'];?></td>
												<td><?php echo $key['account_number'];?></td>
												<td><?php echo $key['branch_name'];?></td>
												<td><?php echo $key['clientfirstname'] ?: '';?><?php echo $key['clientmiddlename'] ?: ' ';?><?php echo $key['clientlastname'] ?: '';?>
												</td>
												<td><?php echo date("d-m-Y", strtotime($key['created']));?></td>
												<td><?php echo number_format($key['average'],0,',',' ');?></td>
												<td><?php echo number_format($key['amount_sought_customer'],0,',',' ');?></td>
												<td>
													<?php
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
													?>
													<span class="<?= $label;?>"><?php echo $key['loan_status'];?></span>
												</td>
												<td class="sorting_1">
													<a href="<?php echo base_url('Decovert_Loans/customer_details/').$key['did'];?>" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													<input type="hidden" name="mdate" value="<?php echo date('d-m-Y',strtotime($key['modified']));?>">
												</td>
												
											</tr>
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

	<div class="wizard" id="wizard-demo">
		<h1>Nouvelle Demande De Prêt</h1>
		<form id="decovertloanForm" action="#" method="post" class="form-wizard">
            <div class="wizard-card setup-content" data-onValidated="setServerName" data-cardname="name">
            	<input type="hidden" class="form-control" id="loan_type" name="loan_type" value="3">
				<h3><span>MOIS 1</span></h3>
				<div class="wizard-input-section">
					<input type="hidden" id="m1total_net_salary" name="m1total_net_salary" value="0">
					<div class="form-group row">
	                    <div class="col-md-5">
						<label>SALAIRE NET MENSUEL</label>
						</div>
                        <div class="col-md-7">
                        <div class="input-group">
							<span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required" id="month1_nsalary" name="month1_nsalary" min="0" value="0" data-validate="month1_nsalary">
						</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<div class="form-group row">
						<div class="col-md-5">
	                        <label>REVENU SUPPLEMENTAIRE (+)</label>
	                    </div>
                        <div class="col-md-7">
	                        <div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="text" class="form-control required" id="month1_additionalincome" name="month1_additionalincome" min="0" required readonly value="0">
							</div>
						</div>
						<span class="amterror"></span>
					</div>
                	<div class="form-group row">
						<div class="col-md-5">
                        	<label>PAIEMENT PRET ENTREPRISE</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month1additionalincome" id="month1_pcompanyloan" name="month1_pcompanyloan" min="0" value="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
                    <div class="form-group row">
						<div class="col-md-5">
							<label>AVANCE SUR SALAIRE</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month1additionalincome" id="month1_advsalary" name="month1_advsalary" min="0" value="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
                	<div class="form-group row">
                    	<div class="col-md-5">
							<label>DEDUCTION (−)</label>
						</div>
                        <div class="col-md-7">
							<div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required" id="month1_deduction" name="month1_deduction" min="0" value="0" required readonly>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
                    <div class="form-group row">
                    	<div class="col-md-5">
							<label>BONUS</label>
						</div>
                        <div class="col-md-7">
                        <div class="input-group">
                            <span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required month1deduction" id="month1_bonus" name="month1_bonus" value="0" min="0" required>
						</div>
                        </div>
						<span class="amterror"></span>
					</div>
                    <div class="form-group row">
                    	<div class="col-md-5">
							<label>PRIMES</label>
						</div>
                        <div class="col-md-7">
                        <div class="input-group">
                            <span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required month1deduction" id="month1_primes" name="month1_primes" value="0" min="0" required>
						</div>
                        </div>
						<span class="amterror"></span>
					</div>
                    <div class="form-group row">
                    	<div class="col-md-5">
							<label>GRATIFICATION 13ième mois</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
	                            <span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month1deduction" id="month1_gratification" name="month1_gratification" value="0" min="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div> 
                </div>
			</div>

            <div class="wizard-card setup-content" data-cardname="group">
				<h3><span>MOIS 2</span></h3>
				<div class="wizard-input-section">
					<input type="hidden" id="m2total_net_salary" name="m2total_net_salary" value="0">
					<!-- section one -->
					<div class="form-group row">
	                    <div class="col-md-5">
						<label>SALAIRE NET MENSUEL</label>
						</div>
                        <div class="col-md-7">
                        <div class="input-group">
							<span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required" id="month2_nsalary" name="month2_nsalary" min="0" value="0" required>
						</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section two -->
					<div class="form-group row">
						<div class="col-md-5">
                        <label>REVENU SUPPLEMENTAIRE (+)</label>
						</div>
                        <div class="col-md-7">
                        <div class="input-group">
							<span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required" id="month2_additionalincome" name="month2_additionalincome" value="0" min="0" required readonly>
						</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section three -->
                	<div class="form-group row">
						<div class="col-md-5">
                        <label>PAIEMENT PRET ENTREPRISE</label>
						</div>
                        <div class="col-md-7">
                        <div class="input-group">
							<span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required month2additionalincome" id="month2_pcompanyloan" name="month2_pcompanyloan" value="0" min="0" required>
						</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section four -->
                    <div class="form-group row">
						<div class="col-md-5">
                        <label>AVANCE SUR SALAIRE</label>
						</div>
                        <div class="col-md-7">
                        <div class="input-group">
							<span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required month2additionalincome" id="month2_advsalary" name="month2_advsalary" value="0" min="0" required>
						</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section five -->
                	<div class="form-group row">
                    	<div class="col-md-5">
						<label>DEDUCTION (-)</label>
						</div>
                        <div class="col-md-7">
						<div class="input-group">
						<span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required" id="month2_deduction" name="month2_deduction" min="0" value="0"  readonly required>
						</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section six -->
                    <div class="form-group row">
                    	<div class="col-md-5">
							<label>BONUS</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
	                            <span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month2deduction" id="month2_bonus" name="month2_bonus" value="0" min="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section seven -->
                    <div class="form-group row">
                    	<div class="col-md-5">
							<label>PRIMES</label>
						</div>
                        <div class="col-md-7">
                        <div class="input-group">
                            <span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required month2deduction" id="month2_primes" name="month2_primes" value="0" min="0" required>
						</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section eight -->
                    <div class="form-group row">
                    	<div class="col-md-5">
							<label>GRATIFICATION 13ième mois</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
	                            <span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month2deduction" id="month2_gratification" name="month2_gratification" value="0" min="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
                </div>
            </div>
			<div class="wizard-card setup-content" data-cardname="services">
				<h3><span>MOIS 3</span></h3>
				<div class="wizard-input-section">
				<input type="hidden" id="m3total_net_salary" name="m3total_net_salary" value="0">
					<!-- section one -->
					<div class="form-group row">
	                    <div class="col-md-5">
							<label>SALAIRE NET MENSUEL</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required" id="month3_nsalary" name="month3_nsalary" value="0" min="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section two -->
					<div class="form-group row">
						<div class="col-md-5">
                        	<label>REVENU SUPPLEMENTAIRE (+)</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required" id="month3_additionalincome" name="month3_additionalincome" min="0" value="0" readonly required />
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section three -->
                	<div class="form-group row">
						<div class="col-md-5">
                        	<label>PAIEMENT PRET ENTREPRISE</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month3additionalincome" id="month3_pcompanyloan" value="0" name="month3_pcompanyloan" min="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section four -->

                    <div class="form-group row">
						<div class="col-md-5">
                        	<label>AVANCE SUR SALAIRE</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month3additionalincome" id="month3_advsalary" value="0" name="month3_advsalary" min="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div><!-- section therr -->				

                	<div class="form-group row">
                    	<div class="col-md-5">
							<label>DEDUCTION (−)</label>
						</div>
                        <div class="col-md-7">
							<div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required" id="month3_deduction" name="month3_deduction"  min="0" value="0" readonly required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section six -->
                    <div class="form-group row">
                    	<div class="col-md-5">
							<label>BONUS</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
	                            <span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month3deduction" id="month3_bonus" name="month3_bonus" min="0" value="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section seven -->
                    <div class="form-group row">
                    	<div class="col-md-5">
							<label>PRIMES</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
	                            <span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month3deduction" id="month3_primes" name="month3_primes" value="0" min="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>
					<!-- section eight -->
                    <div class="form-group row">
                    	<div class="col-md-5">
							<label>GRATIFICATION 13ième mois</label>
						</div>
                        <div class="col-md-7">
	                        <div class="input-group">
	                            <span class="input-group-addon">CFA</span>
								<input type="number" class="form-control required month3deduction" id="month3_gratification" name="month3_gratification" value="0" min="0" required>
							</div>
                        </div>
						<span class="amterror"></span>
					</div>   
                </div>
                <textarea class="demodata" rows="4" style="margin: 0px; width: 502px; height: 96px; display: none;"></textarea>
			</div>
			<div class="wizard-error">
				<div class="alert alert-error">
					<strong>There was a problem</strong> with your submission.
					Please correct the errors and re-submit.
				</div>
			</div>
			<div class="wizard-failure">
				<div class="alert alert-error">
					<strong>There was a problem</strong> submitting the form.Please try again in a minute.
				</div>
			</div>
		</form>
	</div>
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

 	function month1_nsalary(el) {
			var val = el.val();
			//alert(val);		
			ret = {
				status: true
			};
			if(val ==0 || val =="")
			{
				ret.status = false;
				ret.msg = "Invalid IP address or FQDN";
				return false;
				
			}else{
				return ret;
			}
		}
	$(document).ready(function() {
	  	$('#search_status').change(function() {
		    var filter = $(this).val();
		    var branch_id= "<?php echo $record[0]->branch_id;?>";
		   
		    $.ajax({
		        type:'POST',
		      url:'<?php echo base_url("Decovert_Loans/searchloanstatus");?>',
		        data:{'filter':filter, 'bid':branch_id},
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
		});
	});

</script>

<script type="text/javascript">


	$(function() {
		var wizard = $("#wizard-demo").wizard({
			showCancel: true
		});
		wizard.on("submit", function(wizard) {
		//decovertloanForm
			console.log(wizard);
			var form = $("form");
			var serializedFormStr = form.serialize();
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("Decovert_Loans/add_loan");?>',
				data:serializedFormStr,
				success:function(resp){
					console.log(resp);
					$(".demodata").val($.trim(resp));
					setTimeout(function() {
						//wizard.trigger("success");
						//wizard.hideButtons();
						wizard._submitting = true;
						//wizard.showSubmitCard("success");
						wizard.updateProgressBar(0);
							window.location.href ="<?php echo base_url('Decovert_Loans/Amortization/');?>"+$.trim(resp);

					}, 2000);
				}
            });
		});	

		wizard.on("reset", function(wizard) {
			wizard.setSubtitle("");
		});	
		wizard.el.find(".wizard-success .im-done").click(function() {
			wizard.reset().close();
		});
		wizard.el.find(".wizard-success .create-another-server").click(function() {
			wizard.reset();
		});

		$("#open-wizard").click(function() {
			wizard.show();
		});

	});
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
			"order": [[ 3, "desc" ]],
			'oTableTools': {
	            'aButtons': [
	                {

	                    'sExtends':    'collection',
	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
	                }
	            ]
	        }
		});
	});

	

	</script>



	<script type="text/javascript">
		$(".form-control input[type=number]").onkeydown = function(e) {
	    if(!((e.keyCode > 95 && e.keyCode < 106)
	      || (e.keyCode > 47 && e.keyCode < 58)
	      || e.keyCode == 8)) {	
	        return false;
	    }
	}


	 $(document).ready(function(){
		var $total1=0;
	 	$(".month1additionalincome").keyup(multInputsAdditionalincome);
	 	function multInputsAdditionalincome() {
		 	var mult2 = 0;
				$('.month1additionalincome').each(function(){
				//alert($(this).val());
			    mult2 += Number($(this).val());
			});
			$("#month1_additionalincome").val(mult2);
			 $("#m1total_net_salary").val(0);
		}	 	

        $(".month1deduction").keyup(multInputs);
			 function multInputs() {
			 	var mult1 = 0;
				$('.month1deduction').each(function(){
					//alert($(this).val());
				    mult1 += Number($(this).val());
				});
				$("#month1_deduction").val(mult1);
				$("#m1total_net_salary").val(0);
			}
			$(".wizard-next").on("click", function() {
                // Reset wizard
                //$('#smartwizard').smartWizard("reset");
                $total1 =(parseFloat($("#month1_nsalary").val())+parseFloat($("#month1_additionalincome").val())-parseFloat($("#month1_deduction").val()));
                $("#m1total_net_salary").val($total1);
                return true;
            });
		var $total2=0;

	 	$(".month2additionalincome").keyup(multInputsAdditionalincome2);
	 	function multInputsAdditionalincome2() {
		 	var mult2 = 0;
			$('.month2additionalincome').each(function(){
		    	mult2 += Number($(this).val());
			});
			$("#month2_additionalincome").val(mult2);
			$("#m2total_net_salary").val(0);
		}
    	$(".month2deduction").keyup(multInputs2);
		 	function multInputs2() {
		 	var mult12 = 0;
			$('.month2deduction').each(function(){
			    mult12 += Number($(this).val());
			});
			$("#month2_deduction").val(mult12);
			$("#m2total_net_salary").val(0);
		}

		$(".wizard-next").on("click", function() {
            $total2 =(parseFloat($("#month2_nsalary").val())+parseFloat($("#month2_additionalincome").val())-parseFloat($("#month2_deduction").val()));
            $("#m2total_net_salary").val($total2);
            return true;
        });       

   	 

		var $total3=0;
	 	$(".month3additionalincome").keyup(multInputsAdditionalincome3);	
	 	function multInputsAdditionalincome3() {
		 	var mult3 = 0;
			$('.month3additionalincome').each(function(){
		    	mult3 += Number($(this).val());
			});
			$("#month3_additionalincome").val(mult3);
			$("#m3total_net_salary").val(0);
		}

    	$(".month3deduction").keyup(multInputs3);
		 	function multInputs3() {
		 	var mult13 = 0;
			$('.month3deduction').each(function(){
			    mult13 += Number($(this).val());
			});
			$("#month3_deduction").val(mult13);
			$("#m3total_net_salary").val(0);
		}

		$(".wizard-next").on("click", function() {
            $total3 =(parseFloat($("#month3_nsalary").val())+parseFloat($("#month3_additionalincome").val())-parseFloat($("#month3_deduction").val()))
            $("#m3total_net_salary").val($total3);
            return true;
        });       
           

    });










	
	</script>
</body>
</html>