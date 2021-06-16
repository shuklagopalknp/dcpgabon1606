<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<?php //echo "<pre>", print_r($amortrecord), "</pre>";  ?>
			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<li><a href="<?php echo base_url('SubAdmin_dashboard/customer_details/'.$this->uri->segment(3));?>"><span>DÉTAILS DU CLIENT</span></a></li>
						<li class="active"><span>AMORTISSEMENT SCHEDULE</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
				
				
			<div class="row">
				<div class="col-lg-2 pull-right">					
					<a href="<?php echo base_url('PP_Consumer_Loans/amortization_view_pdf/').$this->uri->segment(3);?>" class="btn btn-primary" align='middle'> <i class="fa fa-cloud-download"></i>TELECHARGER EN PDF</a>									
				</div>
				<!-- <div class="col-lg-2 pull-left">					
					<a href="<?php echo base_url('PP_Consumer_Loans/customer_details/'.$this->uri->segment(4));?>" class="btn btn-primary" align='middle'> <i class="fa fa-cloud-download"></i> Back</a>
				</div> -->
			</div>


				<div class="row" style="margin-top:10px;">					
					<div class="col-lg-12">
						<div class="main-box clearfix">

							<div class="main-box-body clearfix">
								<div class="table-responsive">
									<?php 	
									//echo "<pre>", print_r($amortrecord),"</pre>";
									if($amortrecord[0]['loan_schedule']=='Monthly'){
										$year=($amortrecord[0]['loan_term']/12);
									}else if($amortrecord[0]['loan_schedule']=='Yearly'){
										$year=$amortrecord[0]['loan_term'];
									}
									else if($amortrecord[0]['loan_schedule']=='Yearly'){
										$year=$amortrecord[0]['loan_term'];
									}

									$loan_interest =$amortrecord[0]['loan_interest'];
									$rt=($loan_interest*(1+19.25/100));
									$curd=date("Y-m-d", strtotime($amortrecord[0]['created']));
									$amount=$amortrecord[0]['loan_amt'];
									$rate=$rt;
									$years=$year;								
									
									$am=new Class_Amort();
									$am->amort($amount,$rate,$years,$curd, $loan_interest);
									$am->showForm();

									//echo "<pre>", print_r($am), "</pre>";


									if($amount*$rate*$years <>0){
										$am->showTable(true); 
									}
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <footer id="footer-bar" class="row">
		<p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>
	</footer> -->

</div>
</div>
</div>
</div>

<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  
<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/demo.js"></script>  
 
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
 
<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#table-example').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			'oTableTools': {
	            'Buttons': [
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
</body>
</html>