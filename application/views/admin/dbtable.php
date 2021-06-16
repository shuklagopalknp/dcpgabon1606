<link rel="stylesheet" href="<?php echo base_url('assets/css/libs/select2.css');?>" type="text/css"/>

<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div id="content-header" class="clearfix">
						<div class="pull-left">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('Admin_Dashboard');?>">Dashboard</a></li>
								<li class="active"><span>Table Name</span></li>
							</ol>
						</div>
					</div>
					<div class="clearfix">
						<h1 class="pull-left">Table Name</h1>
						<div class="pull-right top-page-ui">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="main-box">
						<header class="main-box-header clearfix"></header>
						<div class="main-box-body clearfix">
							<div class="col-lg-12">
								<?php if(!empty($this->session->flashdata('msg'))) {  $message = $this->session->flashdata('msg'); ?>
									<div class="<?php echo $message['class']; ?>">
										<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
										<i class="fa fa-times-circle fa-fw fa-lg"></i>
										<?php echo $message['message']; ?>
									</div>
								<?php } ?>

								<?php //echo "<pre>", print_r($datatable), "</pre>";?>
								<div class="row">
									<div class="col-md-12 col-sm-6">
									<img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image" style="display:none;position:absolute;text-align:center;left: 400px; z-index: 9;">	
									</div>
									<?php echo  form_open('Table_Truncate/truncate_table ', array('id'=>'truncatetable','class'=>'','role'=>'form','method'=>'post', 'accept-charset'=>'utf-8')); ?>
										<div class="form-group col-md-12">
                                        	<div class="form-group " id="form_row">
                                        		<label>Table Name</label>
												<select id="sel2" class="form-control" name="keyword[]" style="width:100%" multiple>
								        			<?php foreach ($datatable as $tname ) {
								        				echo '<option value="'.$tname['myTables'].'">'.$tname['myTables'].'</option>'."\r\n";
								        			}  ?>	        			
								        		</select>
                                    		</div>
                                    		<br>		                                    
		                                    <div class="col-sm-12 col-md-12">
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn" name="truncate" value="Truncate table">Truncate</button>
													<button type="submit" class="btn btn-danger waves-effect waves-light" name="delete" value="delete table">Delete</button>
													<div class="spinner-border text-success" role="status">
														<span class="sr-only">Loading...</span>
													</div>
												</div>
											</div>
										</div>
		                            <?php echo form_close(); ?>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	<footer id="footer-bar" class="row">
		<p id="footer-copyright" class="col-xs-12">	Powered by DCP Theme.</p>
	</footer>
</div>
</div>
</div>
</div>

<script src="<?php echo base_url('assets/js/demo-skin-changer.js');?>"></script> 
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nanoscroller.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/demo.js');?>"></script> 
<script src="<?php echo base_url('assets/js/modalEffects.js');?>"></script>
<script src="<?php echo base_url('assets/js/classie.js');?>"></script>
<script src="<?php echo base_url('assets/js/modernizr.custom.js');?>"></script>
<script src="<?php echo base_url('assets/js/moment.min.js');?>"></script>


<script src="<?php echo base_url('assets/js/daterangepicker.js');?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js');?>"></script>
<script src="<?php echo base_url('assets/js/pace.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.bootstrap.js');?>"></script>


<script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>


<script type="text/javascript">
	$(function() {	
		//nice select boxes
		//$('#sel2').select2();
		$('#sel2').select2({
			placeholder: 'Select Tables',
			allowClear: true,
		});				
	});
</script>	


</body>

</html>