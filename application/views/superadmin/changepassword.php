<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title><?=$title;?></title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap/bootstrap.min.css"/>
		<script src="<?php echo base_url();?>assets/js/demo-rtl.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/libs/font-awesome.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/libs/nanoscroller.css"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/compiled/theme_styles.css"/>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
		<link type="image/x-icon" href="<?php echo base_url();?>assets/favicon.png" rel="shortcut icon"/>
	</head>
	<body id="login-page-full" class="lock-screen">
		<div id="login-full-wrapper">
			<div class="container">
				<div class="row">
					<?php
					//echo "<pre>",print_r($result, 1), print_r($cleanToken, 1), "</pre>";
					?>

					<div class="col-xs-12">
						<div id="login-box">
							<div class="row">
								<div class="col-xs-12">
									<header id="login-header">
										<div id="login-logo">
											<img src="<?php echo base_url();?>assets/img/greatlogo.jpg" alt=""/>
										</div>
									</header>
									<div id="login-box-inner">	
									<h4>Reset your password</h4>
									<p>Hello <span style="color: #41a564"><?php echo ucfirst($result[0]->first_name); ?></span>, Please enter your password 2x below to reset</p>								
										<?php   $fattr = array('class' => 'form-horizontal form-reset', 'id'=>'resetform');
										echo form_open(base_url().'Login/reset_password?token='.$cleanToken,$fattr); ?>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-lock"></i></span>
												<?php echo form_password(array('name'=>'password', 'id'=> 'password', 'placeholder'=>'New Password', 'class'=>'form-control', 'value' => set_value('password'))); ?>
												<?php echo form_error('password') ?>
											</div>
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-lock"></i></span>
												<?php echo form_password(array('name'=>'passconf', 'id'=> 'passconf', 'placeholder'=>'Confirm Password', 'class'=>'form-control', 'value'=> set_value('passconf'))); ?>
												<?php echo form_error('passconf') ?>
											</div>
											<div class="row">
												<div class="col-xs-12">
													<input type="hidden" name="editid" value="<?= $result[0]->id; ?>"  />
													<input type="hidden" name="checkmail" value="<?= $result[0]->u_email; ?>"  />
													<?php echo form_submit(array('value'=>'Reset Password', 'class'=>'btn btn-lg btn-primary btn-block')); ?>
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
		</div>
		<script src="<?php echo base_url();?>assets/js/demo-skin-changer.js"></script>  
		<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.nanoscroller.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/demo.js"></script>  
		<script src="<?php echo base_url();?>assets/js/scripts.js"></script>
		<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
		<script src="<?php echo base_url('assets/javascripts/login/resetpass.validation.js');?>"></script>
	</body>
</html>