<!DOCTYPE html>

	<html>

		<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
		<title><?php echo $title;?></title> 
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css');?>"/> 
		<script src="<?php echo base_url('assets/js/demo-rtl.js');?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/font-awesome.css');?>"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/nanoscroller.css');?>"/> 
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/compiled/theme_styles.css');?>"/>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300|Titillium+Web:200,300,400' rel='stylesheet' type='text/css'> 
		<link type="image/x-icon" href="<?php echo base_url('assets/favicon.png');?>" rel="shortcut icon"/>
			<!--[if lt IE 9]>
				<script src="<?php //echo base_url('assets/js/html5shiv.js');?>"></script>
				<script src="<?php //echo base_url('assets/js/respond.min.js');?>"></script>
			<![endif]-->
		</head>
		<body id="login-page">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div id="login-box">
							<div id="login-box-holder">
								<div class="row">
									<div class="col-xs-12">
										<?php
										if(!empty($this->session->flashdata('msg'))) {  $message = $this->session->flashdata('msg'); ?>

										<div class="<?php echo $message['class']; ?>">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<i class="fa fa-times-circle fa-fw fa-lg"></i>
											<?php echo $message['message']; ?>
										</div>
										<?php } ?>

										<header id="login-header">
											<div id="login-logo">
												<img src="<?php echo base_url('assets/img/greatlogo.jpg');?>" alt=""/>
											</div>
										</header>
										<div id="login-box-inner" class="with-heading">
											<h4>Mot de Passe Oubliè</h4>
   							 <p>Veuillez saisir votre adresse e-mail et nous vous enverrons des instructions pour réinitialiser votre mot de passe</p>
											<form role="form" action="<?php echo base_url('Login/forgetpassword');?>" method="post" id="forgetPass">


												<div class="form-group">
													<div class="input-group">
														<span class="input-group-addon"><i class="fa fa-user"></i></span>
														<input type="email" class="form-control" name="femail" id="femail" value="" placeholder="saisir votre email addresse">
													</div>
												</div>											

												<div class="row">

													<div class="col-xs-12">

														<button type="submit" class="btn btn-success col-xs-12">Réinitialiser le mot de passe</button>

													</div>

													<div class="col-xs-12">
														<br/>
														<a href="<?php echo base_url('Login');?>" id="login-forget-link" class="forgot-link col-xs-12">Retour connexion</a>
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

			<script src="<?php echo base_url('assets/js/demo-skin-changer.js');?>"></script>
			<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
			<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
			<script src="<?php echo base_url('assets/js/jquery.nanoscroller.min.js');?>"></script>
			<script src="<?php echo base_url('assets/js/demo.js');?>"></script>
			<script src="<?php echo base_url('assets/js/scripts.js');?>"></script>
			<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

			<!-- Examples -->

			<script src="<?php echo base_url('assets/javascripts/login/forgetpass.validation.js');?>"></script>

		</body>

		</html>