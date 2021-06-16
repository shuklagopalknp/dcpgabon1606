
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<?php //echo "<pre>", print_r($record), "</pre>";?>
			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">Dashboard</a></li>
						<li class="active"><span>Consumer Loan</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
				<button id="open-wizard" class="btn btn-primary">Nouvelle Demande De Prêt</button>
				<div class="row" style="margin-top:10px;">
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<div class="main-box-body clearfix">
								<div class="table-responsive">
									<table id="table-example" class="table table-hover">
										<thead>
											<tr>
												<th>Application Number </th>
												<th>Name</th>
												<th>Credit Product</th>
												<th>Due date</th>
												<th>Total Amount</th>
												<th>Interest</th>
												<th>Term</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											foreach ($loandetails as $key) {
												//print_r($key);
											?>
											<tr>
												<td><?php echo $key['application_no'];?></td>
												<td><?php echo $key['first_name'];?></td>
												<td><?php echo $key['ltype'];?></td>
												<td><?php echo $key['created'];?></td>
												<td>CFA <?php echo $key['loan_amt'];?></td>
												<td><?php echo $key['loan_interest'];?>%</td>
												<td><?php echo $key['loan_term'];?></td>
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
		</div>
	</div>
	<footer id="footer-bar" class="row">
		<p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>
	</footer>

	<div class="wizard" id="wizard-demo">
		<h1>New Loan Application</h1>
		<form id="loanForm" action="#" method="post">
			<div class="wizard-card setup-content" data-onValidated="setServerName" data-cardname="name">
				<h3><span>STEP 1</span></h3>			
				<div class="wizard-input-section">
					<input type="hidden" class="form-control" id="loan_type" name="loan_type" value="1">
					
					<div class="form-group">
						<label>Loan Amount to be Entered</label>
						<div class="input-group">
							<span class="input-group-addon">CFA</span>
							<input type="number" class="form-control required" id="loan_amt" name="loan_amt" min="0" required>
						</div>
						<span class="amterror"></span>
					</div>
					<div class="form-group">
						<label>Interest</label>
						<div class="input-group">							
							<input type="number" class="form-control" id="loan_interest" name="loan_interest" step="any" min="0" max="100">
							<span class="input-group-addon">%</span>
						</div>
					</div>
				</div>			
			</div>
			<div class="wizard-card setup-content" data-cardname="group">
				<h3><span>STEP 2</span></h3>				
				<div class="wizard-input-section">
					<div class="form-group">
						<label>Term</label>
						<div class="input-group">
							<input type="number" class="form-control" id="loan_term" name="loan_term" value="">
							<span class="input-group-addon addsch">Monthly</span>
						</div>
					</div>
					<div class="form-group">
						<label>Payment schedule</label>
						<select class="form-control" name="loan_schedule" id="loan_schedule">
							<option value="Monthly">MOIS</option>
							<option value="Quarterly">TRIMESTRE</option>
							<option value="Half yearly">SEMESTRE</option>
							<option value="Yearly">ANNEE</option>
						</select>
					</div>
					<div class="form-group">
						<label>Fees</label>
						<div class="input-group">
							<span class="input-group-addon">CFA</span>	
							<input type="number" class="form-control" id="loan_fee" name="loan_fee" value="<?php echo $fees;?>" readonly>
						</div>
					</div>
				</div>			
			</div>
			<div class="wizard-card setup-content" data-cardname="services">
				<h3><span>STEP 3</span></h3>
				<div class="wizard-input-section">					
					<div class="form-group">
						<label>Taxes</label>
						<select class="form-control" name="loan_tax" id="loan_tax">					
							<option value="">Select Loan</option>
							<?php 	foreach($loantax as $tax){
								echo '<option value="'.$tax['tid'].'">'.$tax['tax_type'].'</option>';
							}?>							
						</select>
						<div class="dummy"></div>
					</div>
					<div class="form-group">
						<label>Commission</label>
						<div class="input-group">
							<span class="input-group-addon">CFA</span>
							<input type="number" class="form-control" id="loan_commission" value="" name="loan_commission" readonly>
						</div>						
					</div>				
				</div>
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
		<!-- <div class="wizard-success">
			<div class="alert alert-success">
				<span class="create-server-name"></span>
				New Loan was applied <strong>successfully.</strong>
			</div>
			<a class="btn btn-default create-another-server">Create Another New Loan</a>
			<span style="padding:0 10px">or</span>
			<a class="btn btn-primary im-done" href="customer_verification.php">Done</a>
		</div> -->
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
<script src="<?php echo  base_url(); ?>assets/js/form-wizard"></script>
<script src="<?php echo  base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
 
<script type="text/javascript">
	function fqdn_amount(el) {
		var val = el.val();
		ret = {
			status: true
		};
		ret.status = false;
		ret.msg = "Invalid IP address or FQDN";			
		return ret;
	}

	var number = document.getElementById('loan_amt');
	var loan_interest = document.getElementById('loan_interest');
	// Listen for input event on numInput.
	number.onkeydown = function(e) {
		
	    if(!((e.keyCode > 95 && e.keyCode < 106)
	      || (e.keyCode > 47 && e.keyCode < 58) 
	      || e.keyCode == 8)) {	
	        return false;
	    }	    

	}
	/*loan_interest.onkeydown = function(e) {
	    if(!((e.keyCode > 95 && e.keyCode < 106)
	      || (e.keyCode > 47 && e.keyCode < 58) 
	      || e.keyCode == 8)) {
	        return false;
	    }
	}*/
	
	$(function() {	
		var wizard = $("#wizard-demo").wizard({
			showCancel: true
		});
		wizard.on("submit", function(wizard) {			
			var form = $("form");			
			var serializedFormStr = form.serialize();
			console.log(serializedFormStr);
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_Consumer_Loans/add_loan");?>',
				data:serializedFormStr,
				success:function(resp){                      
                     console.log(resp);
                     //alert(resp);
                     setTimeout(function() {
						wizard.trigger("success");
						//wizard.hideButtons();
						//wizard._submitting = false;
						wizard.showSubmitCard("success");
						wizard.updateProgressBar(0);
						window.location.href ="<?php echo base_url('PP_Consumer_Loans/amortization_loan/');?>"+$.trim(resp)+"";
					}, 500);	
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
	$('#loan_tax').change(function() {	
		var tval = $(this).find(":checked").val() ;
		var fee = $("#loan_fee").val();
		var loanamt = $("#loan_amt").val();		
		var url = "<?php echo base_url('PP_Consumer_Loans/rangeofTax');?>";		
		$.post( url, { tval } ).done(function(response){
			var ttax=(parseFloat(loanamt*(response/100)));			
			var Commission =(parseFloat(fee)+(ttax));
			$("#loan_commission").val(Commission)
		
		});
	});


	

</script>
    
<script>
	$(document).ready(function() {		
		var table = $('#table-example').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
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