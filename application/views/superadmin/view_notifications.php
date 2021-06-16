<link rel="stylesheet" href="<?php echo base_url('assets/css/libs/select2.css');?>" type="text/css"/>
<style type="text/css">

.user-list tbody td>img {
    position: relative;
    max-width: 50px;
    float: left;
    margin-right: 15px;
    border-radius: 18%;
    background-clip: padding-box;
}
</style>
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">

			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<li class="active"><span>NOTIFICATIONS</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
				<div class="row" style="margin-top:10px;">		
				<div class="col-lg-2">
				</div>			
					<div class="col-lg-8">
						

						<div class="main-box clearfix">

							
							<header class="main-box-header clearfix">								
									<div class="form-group pull-left">
										
									</div>	
								<textarea class="checkstatus form-control" rows="10" style="display: none"></textarea>
							</header>
							<div class="main-box-body clearfix">
								
								<div class="col-md-12">
								<div class="table-responsive">
									<table id="table-example" class="table table-hover user-list table-striped">
										<thead>
											<tr>
												<th class="hidden">S.No.</th>
												<th>Notifications</th>
												
												
											</tr>
										</thead>
										<tbody>
											<?php //echo "<pre>", print_r($users);
											$i=0;
								// 			print_r($notification);
											if(!empty($notification)){
											foreach ($notification as $not) {	

											 if($not['type'] == "decision") {

												if($not['loan_type'] ="credit_confort")
												{
													$url = base_url()."PP_CREDIT_CONFORT/customer_details/".$not['loan_id']."/view";
												}
												else if($not['loan_type'] ="credit_conso")
												{
													$url = base_url()."PP_FETES_A_LA_CARTE/customer_details/".$not['loan_id']."/view";
												}
												else if($not['loan_type'] ="credit_scolair")
												{
													$url = base_url()."PP_CONGES_A_LA_CARTE/customer_details/".$not['loan_id']."/view";
												}


												}
												else{
													$url ="#";
												}
																			
											?> 
											<tr id="info_row">
												<td class="hidden"></td>
												<td>
													<?php
													if(!empty($not['avatar'])){
													?>
													<img src="<?php echo base_url('assets/user-profile-img/').$not['avatar'];?>" alt=""/>
													<a href="<?php echo $url;?>" class="user-link"><?php echo $not['first_name'];?></a>
													<span class="user-subhead"><?php echo $not['message'] ?></span>
												<?php }else{ ?>
													<img src="<?php echo base_url('assets/img/user.png');?>" alt=""/>
													<a href="<?php echo $url;?>" class="user-link"><?php echo $not['first_name'];?></a>
													<span class="user-subhead"><?php echo $not['message'] ?></span>
												<?php } ?>
												</td>
												
												
											
											</tr>
											<?php 
											$i++;
											 }
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
							
							</div>
						</div>
					</div>

					<div class="col-md-2">
					</div>
				</div>
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
 
<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script>



<script type="text/javascript">
	

	
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
	        },	        
		});
		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');


		
		
	    var tt1 = new $.fn.dataTable.TableTools( table1 );
		$( tt1.fnContainer() ).insertBefore('div.dataTables_wrapper');
		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});
		
		//new $.fn.dataTable.FixedHeader( tableFixed );
	});


	</script>

</body>
</html>