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
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD </a></li>
						<li class="active"><span>CAUTION SCOLAIRE</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
				<a href="javascript:void(0);" class="btn btn-primary  openBtn"  data-toggle="modal" data-target="#myModal">
					<i class="fa fa-plus-circle fa-lg"></i>  Nouvelle Demande De Prêt
				</a>				
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
												<th>Numero Compte Bloque</th>
												<th>Agence</th>
												<th>Nom Et Prenoms Client</th>
												<th>Nom Et Prenoms Etudiant</th>
												<th width="12%">Duree</th>
												<th>Nat a Payer</th>
												<th>Net a Debourser</th>
												<th width="5%">Status</th>
												<th>View</th>
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
												</td>
												<td><?php echo $key['clientfirstname'] ?: '';?><?php echo $key['clientmiddlename'] ?: ' ';?><?php echo $key['clientlastname'] ?: '';?>
												</td>
												<td><?php echo number_format($key['loan_interest'],0,',','');?> Mois</td>											
												<td><?php echo number_format($key['net_pay_amt'],0,',',' ');?></td>
												
												<td><?php echo number_format($key['net_block_amt'],0,',',' ');?></td>
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
													<a href="<?php echo base_url('PP_Caution_Scolare_Loans/customer_details/').$key['cl_aid'];?>" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													
													<a href="<?php echo base_url('PP_Caution_Scolare_Loans/customer_caution_scolaire/').$key['customar_id'];?>" class="table-link">
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
	<style type="text/css">
		.modal-dialog {
    width: 924px;
    margin: 30px auto;
}
.main-box {
    background: #ffffff;
    box-shadow: 0px 1px 1px rgba(0,0,0,0.1);
    margin-bottom: 10px;
    border-radius: 0;
    background-clip: padding-box;
}
	</style>
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
						<div class="row" style="margin-top:10px;">					
							<div class="table-responsive">
								<table id="" class="table table-hover table-bordered">
									<tbody>
									<tr>
										<td colspan="4"><center>Calcul des fais caultions pour étudiant</center></td>
									</tr>
									<tr>
										<td align="left" width='25%'>&nbsp;</td>
										<td align="left" width='15%'>Montant Caution</td>
										<td align="left" width='15%'>Frais d'étude</td>
										<td align="left" width='18%'><small> Frais de transfer COMEX comme indlque sur la fiche de prel evement des frais</small> </td>
									</tr>								
									<tr>
										<td align="left">&nbsp;</td>
										<td align="left" colspan="2">&nbsp;</td>
										
										<td align="left">&nbsp;</td>		
									</tr>
									<tr>
										<td align="left"><b><font size=2 color="#929292">&nbsp;</font></b></td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<input type="number" class="form-control" id="deposit_amount" name="deposit_amount" step="any" min="0"  value="">
													<span class="input-group-addon">F CFA</span>
												</div>
											</div>
										</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<input type="number" class="form-control" id="study_costs" name="study_costs" step="any" min="0" value="">
													<span class="input-group-addon">F CFA</span>
												</div>
											</div>
										</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<input type="number" class="form-control" id="transfer_fee" name="transfer_fee" step="any" min="0" value="">
													<span class="input-group-addon">F CFA</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td align="left"><font size=2 color="#929292">TVA</font></td>
										<td align="right">&nbsp;</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<input type="number" class="form-control" id="tva_studycosts_calculator" name="tva_studycosts_calculator" step="any" min="0" value="" readonly>
													<span class="input-group-addon">F CFA</span>
												</div>
											</div>
										</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<input type="number" class="form-control" id="tva_transferfee_calculator" name="tva_transferfee_calculator" step="any" min="0" value="0" readonly>
													<span class="input-group-addon">F CFA</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td  height="21" align="left"><font size=2 color="#929292">T1</font></td>
										<td align="right">&nbsp;</td>
										<td align="right">&nbsp;</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<input type="number" class="form-control" id="t1_equity_calculator" name="t1_equity_calculator" step="any" min="0" value="0" readonly>
													<span class="input-group-addon">F CFA</span>
												</div>
											</div>
										</td>
									</tr>										
									<tr>
										<td  height="20" align="left"><font size=2 color="#929292">
										</font></td>
										<td align="right">&nbsp;</td>
										<td align="right">&nbsp;</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<input type="number" class="form-control" id="loan_interest" name="loan_interest" step="any" min="0" max="100" value="">
													<span class="input-group-addon">MOIS</span>
												</div>
											</div>
										</td>
									</tr>										
									<tr>
										<td  height="20" align="left"><font size=2 color="#929292">T2</font></td>
										<td align="right">&nbsp;</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<input type="number" class="form-control" id="t2_study_costs_calculator" name="t2_study_costs_calculator" step="any" min="0" value="0" readonly>
													<span class="input-group-addon">F CFA</span>
												</div>
											</div>
										</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<input type="number" class="form-control" id="t2_transfer_fee_calculator" name="t2_transfer_fee_calculator" step="any" min="0" value="0" readonly>
													<span class="input-group-addon">F CFA</span>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td height="20" align="right" colspan="4"><font size=2 color="#929292">&nbsp;</font></td>										
									</tr>										
									<tr>
										<td align="left"><font size=2 color="#000000">Net à payer</font></td>
										<td align="right" ><font color="#000000">&nbsp;</font></td>
										<td align="right" >
											<font color="#000000">
												<div class="form-group">
													<div class="input-group">
														<input type="number" class="form-control" id="net_pay_amt" name="net_pay_amt" step="any" min="0" value="0" readonly>
														<span class="input-group-addon">F CFA</span>
													</div>
												</div>
											</font>
										</td>
										<td  align="right"><font color="#000000">&nbsp;</font></td>
									</tr>
									<tr>
										<td  align="left"><font color="#000000">Net à bloquer</font></td>
										<td align="right" >
											<font color="#000000">
												<div class="form-group">
													<div class="input-group">
														<input type="number" class="form-control" id="net_block_amt" name="net_block_amt" step="any" min="0" value="0" readonly>
														<span class="input-group-addon">F CFA</span>
													</div>
												</div>											
											</font>
										</td>
										<td align="right" ><font color="#000000">&nbsp;</font></td>
										<td  align="right"><font color="#000000">&nbsp;</font></td>
									</tr>									
								</tbody>
							</table>
						</div>
				  	<div class="modal-footer justify-content-center">
				  		<input type="hidden" class="form-control" name="loan_type" value="<?php echo $loanrange[0]['lid'] ?: '0'; ?>">				  		
				  		<input type="hidden" class="form-control" name="percentage" value="<?php echo $loanrange[0]['vat_on_interest'] ?: '19.25';?>">				  		
					  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn"><img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> SOUMETTRE</button>
					  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">FERMER</button>
					</div>					
				</form>
				<textarea class="frompostval" style="width:100%; display: none;"></textarea>
			</div>
		</div>
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
 
 <script type="text/javascript">
	$(document).ready(function() {
	  	$('#search_status').change(function() {
		    var filter = $(this).val();
		    //alert(filter);
		    $.ajax({
		        type:'POST',
		        url:'<?php echo base_url("PP_Caution_Scolare_Loans/searchloanstatus");?>',
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

<!-- calculation part  -->
<script type="text/javascript">
	$(document).ready(function() {
		var vatoninterest=$('input[name=\'percentage\']').val();
		/*Frais d'étude calculator*/
		$('#study_costs').on('keyup click', function(){	    
			var filter = $(this).val();	
			var calcPrice =(Math.floor((filter * vatoninterest) / 100)); 
			console.log(calcPrice);
			$('#tva_studycosts_calculator').val(calcPrice);
			$('#t2_study_costs_calculator').val(parseFloat(calcPrice)+parseFloat(filter));
			finalcalculation();			
		});
		 /*Frais de transfer COMEX comme indlque sur la fiche de prel evement des frais */
		$('#transfer_fee').on('keyup click', function(){	    
			var trfee = $(this).val();	
			var feePrice =(Math.floor((trfee * vatoninterest) / 100)); 
			console.log(feePrice);
			$('#tva_transferfee_calculator').val(feePrice);
			$('#t1_equity_calculator').val(parseFloat(feePrice)+parseFloat(trfee));
			finalcalculation();
			transfer_feechange();
		});
		$('#loan_interest').on('keyup click', function(){	    
			var linterest = $(this).val();	
			var t1val= $('#t1_equity_calculator').val();
			var int_amt =(Math.floor((parseFloat(t1val) * linterest))); 
			console.log(int_amt);			
			$('#t2_transfer_fee_calculator').val(parseFloat(int_amt));
			finalcalculation();
		});
		$('#deposit_amount').on('keyup click', function(){	    
			var depositamount = $(this).val();
			finalcalculation();
		});
	});

	function transfer_feechange(argument) {			    
			var linterest = $('#loan_interest').val();	
			var t1val= $('#t1_equity_calculator').val();
			var int_amt =(Math.floor((parseFloat(t1val) * linterest))); 
			console.log(int_amt);			
			$('#t2_transfer_fee_calculator').val(parseFloat(int_amt));
			finalcalculation();		
	}

	function finalcalculation()
	{
		var t2_transfer_fee_calculator = $('#t2_transfer_fee_calculator').val(),
		t2_study_costs_calculator= $('#t2_study_costs_calculator').val(),
		deposit_amount = $('#deposit_amount').val();
		var netpayamt=(parseFloat(t2_transfer_fee_calculator)+parseFloat(t2_study_costs_calculator)+parseFloat(deposit_amount));
		$("#net_pay_amt").val(parseFloat(netpayamt));
		$("#net_block_amt").val(parseFloat(netpayamt)-parseFloat(t2_study_costs_calculator));

	}
</script>

<script type="text/javascript">
	$("#NewloanForm").validate({
		errorClass: 'has-error',
		rules: {				
			 deposit_amount: {
				required: true,
				min: 1,				
				number: true,
			 },	
			 study_costs: {
				required: true,
				min: 1,				
				number: true,
			 },
			 transfer_fee: {
				required: true,
				min: 1,				
				number: true,
			 },
			 loan_interest: {
				required: true,				
			 },	
				
		},			
		messages: {
			deposit_amount: {
				required: "Montant Caution field is required.",
			},
			study_costs: {
				required: "Frais d'étude field is required.",
			},
			transfer_fee: {
				required: "Transfer fee field is required.",
			},
			loan_interest: {
				required: "DUREE field is required.",
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
			var $content = $(".error-msg");
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_Caution_Scolare_Loans/add_loan");?>',
				data:$(form).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#NewloanForm').css("opacity","0.5");
					$('.frompostval').val("");
					$('.lodergif').css("display","inline");					
				},
				success: function(response) {
					console.log(response);					
					$('.frompostval').val($.trim(response));
					$('#NewloanForm').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");
					var resp = JSON.parse(response);
					if(resp.error){
						$content.scrollTop($content[0].scrollHeight).offset().top;
						$('.error-msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+$.trim(resp.error)+'.</div>');               			           	
                     }else{
                    	//$content.scrollTop($content[0].scrollHeight);
                    	$(".error-msg").scrollTop();
                     	$("#NewloanForm")[0].reset();                     	
                     	$('.error-msg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Succès!</strong> Nouveau processus de demande de prêt .'+resp.success+'</div>').show();
	                     setTimeout(function() {						
							window.location.href ="<?php echo base_url('PP_Caution_Scolare_Loans/amortization_loan/');?>"+$.trim(resp.success)+"";
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