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
						<li class="active"><span>CREDIT CONSO</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
				<a href="javascript:void(0);" class="btn btn-primary  openBtn"  data-toggle="modal" data-target="#myModal">
					<i class="fa fa-plus-circle fa-lg"></i> Nouvelle Demande De Prêt
				</a>
				<!-- <button id="open-wizard" class="btn btn-primary">NEW APPLICATION</button> -->
				<div class="row" style="margin-top:10px;">					
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<header class="main-box-header clearfix">								
									<div class="form-group pull-left">
										<label class="col-lg-3 control-label">STATUT:</label>
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
												<th>Application Number</th>
												<th>Numero De Compte</th>
												<th>Agence</th>
												<th>Client</th>
												<th>Date De Dernier Paiement</th>
												<th width="12%">Date De Demande Pret</th>
												<th>Montant Du Pret</th>
												<th>Taux Interet</th>
												<th width="5%">Duree</th>
												<th width="5%">Status</th>
												<th width="15%">View</th>
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
												if(!empty($key['databinding'])){
													$databinding=json_decode($key['databinding']);
													foreach ($databinding as $kdata ) {
										         		$last[]=$kdata->month.'-'.$kdata->years;
										       		}
									       		}									       		
								       			$createddate=date('23', strtotime($key['created']));
								       			$DateofLastPayment = $createddate.'-'.end($last);
											?>
											<tr id="rowid<?php echo $key['cl_aid'];?>">
												<td><?php echo $key['application_no'];?></td>
												<td><?php echo $key['account_number'];?></td>
												<td><?php echo $key['branch_name'];?></td>
												<td><?php echo $key['clientfirstname'] ?: '';?><?php echo $key['clientmiddlename'] ?: ' ';?><?php echo $key['clientlastname'] ?: '';?>
												<td><?php echo $DateofLastPayment; ?></td>
												<td><?php echo date("d-m-Y", strtotime($key['created'])).":";
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
												<td><?php echo number_format($key['loan_amt'],0,',',' ');?></td>
												
												<td><?php echo $key['loan_interest'];?>%</td>
												
												<td><?php echo $key['loan_term'];?>M</td>
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
													<span class="<?= $label;?>"><?php echo ucwords($key['loan_status']);?></span>
												</td>
												
											 	<td class="sorting_1">
													<a href="<?php echo base_url('PP_Consumer_Loans/customer_details/').$key['cl_aid'];?>" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													<a href="<?php echo base_url('PP_Consumer_Loans/customer_creditloan/').$key['customar_id'];?>" class="table-link">
														View Loan History
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
	<!-- ================== -->
	<div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	  	<div class="modal-dialog modal-full-height modal-left modal-notify modal-info">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title heading lead">Nouvelle Demande De Prêt</h4>
				</div>
			   <form role="form" method="post" id="NewloanForm">
					<div class="modal-body">   
						<div class="error-msg"></div>    
						<div class="form-group">
							<label>MONTANT DEMANDE</label>
							<div class="input-group">
								<span class="input-group-addon">CFA</span>
								<input type="text" class="form-control numberformat" id="loan_amt" name="loan_amt" >
							</div>
							<span class="amterror"></span>
						</div>
						<div class="form-group">
							<label>TAUX D'INTERET</label>
							<div class="input-group">							
								<input type="number" class="form-control" id="loan_interest" name="loan_interest" step="any" min="0" max="100">
								<span class="input-group-addon">%</span>
							</div>
						</div>
						<div class="form-group">
							<label>DUREE</label>
							<div class="input-group">
								<input type="number" class="form-control required" id="loan_term" name="loan_term" value="">
								<span class="input-group-addon addsch">MONTANT</span>
							</div>
						</div>
						<div class="form-group">
							<label>PERIODICITE DE REMBOURSEMENT</label>
							<select class="form-control required" name="loan_schedule" id="loan_schedule">
								<option value="Monthly">MOIS</option>
								<option value="Quarterly">TRIMESTRE</option>
								<option value="Half Yearly">SEMESTRE</option>
								<option value="Yearly">ANNEE</option>
							</select>
						</div>		
						<div class="form-group">
							<label>TAUX FOND DE GENERATIE</label>
							<input type="number" class="form-control numberformat" id="loan_guarantee" name="loan_guarantee" step="any" min="0" max="100" >
						</div>	       
				  </div>

				  	<div class="modal-footer justify-content-center">
				  		<input type="hidden" class="form-control" name="loan_fee" value="0">
				  		<input type="hidden" class="form-control" name="loan_type" value="1">
				  		<input type="hidden" class="form-control" name="vat_on_interest" value="<?php echo $loanrange[0]['vat_on_interest'] ?: '19.25';?>">
				  		<input type="hidden" class="form-control" name="loan_commission" value="0">	
						 
					  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn"><img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> SOUMETTRE</button>
					  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">FERMER</button>
						</div>
				</form>
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
 
 <script type="text/javascript">
	$(document).ready(function() {
	  	$('#search_status').change(function() {
		    var filter = $(this).val();
		    //alert(filter);
		    $.ajax({
		        type:'POST',
		        url:'<?php echo base_url("PP_Consumer_Loans/searchloanstatus");?>',
		        data:{'filter':filter},
		        /*beforeSend: function(){         
		            $('#DecisionStatusdetails').css("opacity","0.5"); 
		            
		        },*/
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

<script type="text/javascript">
	$("#NewloanForm").validate({
		errorClass: 'has-error',
		rules: {				
			 loan_amt: {
				required: true,
				min: 0,
				max:25000001,
				number: true,
			 },	
			  loan_interest: {
				required: true,
			 },		
				
		},			
		messages: {
			loan_amt: {
				required: "Loan Amount field is required.",
			},			
		},
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight: function(element) {

			$(element).closest('.form-group').removeClass('has-error');

		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		submitHandler: function(form) {			
			//alert("chekfe india");
			//$(".sr-only").show();
			var form = $("form");
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_Consumer_Loans/add_loan");?>',
				data:$(form).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#NewloanForm').css("opacity","0.5");
					$('.outputdata').val("");
					$('.lodergif').css("display","inline");					
				},
				success: function(response) {
					console.log(response);
					$('.outputdata').val(response);					
					$('#NewloanForm').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");
					var resp = JSON.parse(response);
					if(resp.error){
						$('.error-msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+$.trim(resp.error)+'.</div>');               			           	
                     }else{
                     	$("#NewloanForm")[0].reset();                     	
                     	$('.error-msg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> New Loan application process strat.'+resp.success+'</div>').show();
	                     setTimeout(function() {						
							window.location.href ="<?php echo base_url('PP_Consumer_Loans/amortization_loan/');?>"+$.trim(resp.success)+"";
						}, 500);						
                 	} 
				}
			});
		  }
	}); 
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

	$('#loan_schedule').change(function() {	    
	    var $option = $(this).find('option:selected');	    
	    var value = $option.val();//to get content of "value" attrib
	    var text = $option.text();//to get <option>Text</option> content
	    $('.addsch').html(text);

	});
	</script>

	<script type="text/javascript">
	
	/*document.getElementById("loan_amt").onkeyup=function(){
    	var input=parseInt(this.value);
    	if(input<5000 || input>2500000){
    	//alert("Value should be between 0 - 100");
		$(".amterror").html('The amount ranges between Rs 5,000 and Rs 1,00,000').addClass('alert alert-danger fade in');
	    return;
		}else{
			$(".amterror").html('').removeClass('alert alert-danger fade in');
			return;
		}
	}*/
	</script>

</body>
</html>