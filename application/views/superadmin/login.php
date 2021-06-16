<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title><?php echo $title; ?></title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/font-awesome.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/nanoscroller.css');?>"/> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/compiled/theme_styles.css');?>"/>		
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/favicon.png');?>" />
	<script type="text/javascript" src="<?php echo base_url('assets/js/demo-rtl.js');?>"></script> 
	<!--[if lt IE 9]>
    	<script src="<?php echo base_url('assets/js/html5shiv.js');?>"></script>
    	<script src="<?php echo base_url('assets/js/respond.min.js');?>"></script>
  	<![endif]-->
</head>
	<body id="login-page-full">
		<div id="login-full-wrapper" style="background:url('<?php echo base_url('assets/img/032_Sharpeye_Eagle.png')?>') !important">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div id="login-box">
							<div id="login-box-holder">
								<div class="row">	
								<?php
								//echo "<pre>", print_r($_SESSION) ,"</pre>";
								?>								
									<div class="col-xs-12">
										<?php if($this->session->flashdata('msg')) {  $message = $this->session->flashdata('msg'); ?>
										<div class="<?php echo $message['class']; ?>">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<i class="fa fa-times-circle fa-fw fa-lg"></i>
											<?php echo $message['message']; ?>
										</div>
										<?php } ?>

										<header id="login-header">
											<div id="login-logo">
												<img src="<?php echo base_url('assets/img/greatlogo.jpg');?>" alt="<?php echo $title;?>"/>
											</div>
										</header>
										<div id="login-box-inner">
											<?php echo  form_open('login/sadminLogin',array('id'=>'signinForm','class'=>'form-horizontal','method'=>'post')); ?>
											<!-- <form id="signinForm" role="form" action="<?php //echo base_url('Login/auth');?>" method="post" class="form-horizontal"> -->
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-user"></i></span>
														<input type="text" class="form-control" name="u_email" id="u_email" value="" placeholder="Identifiant">
													</div>
												</div>
												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-key"></i></span>
														<input type="password" class="form-control" placeholder="Mot de passe" name="password" id="password" value="">
													</div>													
												</div>
												<div id="remember-me-wrapper">
													<div class="row">
														<div class="col-xs-6">
															<div class="checkbox-nice">
																<input type="checkbox" id="remember-me" name="rememberme" checked />
																<label for="remember-me">Se Souvenir</label>
															</div>
														</div>
													<a href="<?php echo base_url('forget-password');?>" id="login-forget-link" class="col-xs-6">Mot de Passe Oubliè
 ?</a>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-12">
														<button type="submit" class="btn btn-success col-xs-12">Accéder</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="<?php echo base_url('assets/js/demo-skin-changer.js');?>"></script>  
		<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.nanoscroller.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/demo.js');?>"></script>
		<script src="<?php echo base_url('assets/js/scripts.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
		<!-- Examples -->
		<script src="<?php echo base_url('assets/javascripts/login/login.validation.js');?>"></script>
	</body>
</html>