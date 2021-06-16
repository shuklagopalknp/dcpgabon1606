<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div id="content-header" class="clearfix">
						<div class="pull-left">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('Dashboard');?>">Home</a></li>
								<li class="active"><span>Select Customer</span></li>
							</ol>
						</div>
					</div>
					<div class="main-box-body clearfix">
						<div class="row">
							<div class="col-lg-12">
								<div class="main-box clearfix">
									<div class="main-box-body clearfix" style="margin-top:0px;">
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4">
													<div class="form-group" style="margin-top:10px;">
														<div class="input-group" style="width:100%">
															<input type="search" class="form-control" id="searchString" placeholder="Enter Account Number">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="table-responsive">
												<table id="table-example" class="table table-hover">
													<thead>
														<tr>
															<th>ID</th>
															<th>Acount Name</th>
															<th>Account No</th>
															<th>Date de naissance</th>
															<th>Address</th>
															<th>Employer Name</th>
															<th>Phone Number</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody id="callsearch">
														<?php foreach ($bankdetails as $key) {
														//print_r($key);
														 ?>
															<tr>
															<td><?php echo $key['cid'];?></td>
															<td><?php echo $key['account_name'];?></td>
															<td><?php echo $key['account_number'];?></td>
															<td><?php echo $key['dob'];?></td>
															<td><?php echo $key['address'];?></td>
															<td><?php echo $key['emp_name'];?></td>
															<td><?php echo $key['phone'];?></td>
															<td><a href="javascript:void(0)" class="btn btn-primary" onclick="return theFunction(<?php echo $key['cid'];?>);"/>
															SELECT</a></td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
								<textarea id="nestable2-output" class="form-control" rows="15" style="display: none"></textarea>
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

<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>


    
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
	$('#searchString').keyup(function(e) {
    	clearTimeout($.data(this, 'timer'));    	
    	$(this).val($(this).val().replace(/[^\d].+/, ""));
    	search(true);
    	
});
function search(force) {
    var existingString = $("#searchString").val();
    var segment ="<?php echo $this->uri->segment(3);?>";   
    if (existingString.length < 3) return;
    $.ajax({
		type:'POST',
		url:'<?php echo base_url("PP_Consumer_Loans/SearchCustomers");?>',
		data: {account:existingString, segment: segment},
		 beforeSend: function(){        	
        	$('#callsearch').css("opacity","0.5");
    	},
		success:function(resp){ 
		 	//var json = $.parseJSON(resp);                     
             //console.log(resp);          
             setTimeout(function() {
              $("#callsearch").html(resp).css("opacity","");           		
			}, 500);	
          }                
      });
    //$.get('PP_Consumer_Loans/SearchAccount/' + existingString, function(data) {
        //alert(data);
        //$('div#results').html(data);
        //$('#results').show();
    //});
}


function theFunction (cid) {
        if(confirm('Continue?') ) {
        	var segment ="<?php echo $this->uri->segment(3);?>";        	
        	 $.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_Consumer_Loans/is_ajax_request");?>',
				data: {customerid:cid, segment: segment},
				beforeSend: function(){        	
		        	$('#callsearch').css("opacity","0.5");
		        	$("#nestable2-output").val('');
		    	},
				success:function(resp){ 
					//alert(resp);
					setTimeout(function() {
						$('#callsearch').css("opacity","1");
						//$("#nestable2-output").val($.trim(resp));
					if(resp !=0){
						window.location.href="<?php echo base_url('PP_Consumer_Loans/customer_details/');?>"+$.trim(resp);
					}
				}, 1500);
				}      
		      });
        	
        	//
   		}
    }

	/*function theFunction (e) {
        if(confirm('Continue?') ) {        	
    window.location.href = "<?php //echo base_url('PP_Consumer_Loans/customer_details/');?><?php //echo $key['cid'];?>/<?php //echo $this->uri->segment(3);?>";
   		}
    }*/


	</script>

</body>
</html>