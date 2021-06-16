
</head>

<body>   
	<div id="theme-wrapper">
		<header class="navbar" id="header-navbar">
			<div class="container">
				<a href="<?php echo base_url('Dashboard');?>" id="logo" class="navbar-brand">
					<img src="<?php echo base_url('assets/img/greatlogo.jpg');?>" alt=""/>
				</a>
				<div class="clearfix">
					<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="fa fa-bars"></span>
					</button>
					
					<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
						<ul class="nav navbar-nav pull-left">
							<li><a class="btn" id="make-small-nav"><?php echo $this->session->branch_name;?><i class="fa fa-bars"></i></a></li>
						</ul>
					</div>
					<!--<div class="nav-no-collapse " style="text-align: center">-->
					<!--    <?php echo $this->session->branchName; ?>-->
					<!--    </div>-->
					
					<div class="nav-no-collapse pull-right" id="header-nav">
						<ul class="nav navbar-nav pull-right">	
						
							<li class="dropdown hidden-xs">
								<a class="btn dropdown-toggle noti_bell" data-toggle="dropdown">
									<i class="fa fa-bell"></i>
									
									<span  <?php if(count($unseen_notification)){?>class="count noti_count" <?php } else { ?>  class="count hide" <?php }?>><?php if(count($unseen_notification)) echo count($unseen_notification);?></span>
								</a>
								<ul class="dropdown-menu notifications-list">
									<li class="pointer">
										<div class="pointer-inner">
											<div class="arrow"></div>
										</div>
									</li>
									<?php 

									// echo '<pre>';
									// print_r($notifications);  die;
									if(empty($notifications)){?>
									<li class="item-header">No notifications</li>
									<?php } else {?>
									<li class="item-header" style="text-align: left;padding:5px;"><a href="<?php echo base_url('mark_as_read')?>"><strong>Mark as Read</strong></a></li>
										<?php 
											foreach ($notifications as $key => $value) {

												if($key == 5)
												{
													break;
												}
												# code...
											 $timetoago=$value['created_at'];
										?>
										<li class="item" <?php if($value['seen_status'] == "unseen") {?> style="background: #ddd9;" <?php } ?>>
											<?php if($value['type'] == "decision") {

												if($value['loan_type'] =="credit_conso")
												{
													$url = base_url()."PP_FETES_A_LA_CARTE/customer_details/".$value['loan_id'].'/view';
													$ltype = "FETES A LA CARTE";
												}
												else if($value['loan_type'] =="credit_scholair")
												{
													$url = base_url()."PP_CONGES_A_LA_CARTE/customer_details/".$value['loan_id'].'/view';
													$ltype = "CONGES A LA CARTE";
												}
												else if($value['loan_type'] =="credit_confort")
												{
													$url = base_url()."PP_CREDIT_CONFORT/customer_details/".$value['loan_id'].'/view';
													$ltype = "CREDIT CONFORT";
												}
												


												
											?>
														<a href="<?php echo $url?>" >
															
															<span><strong><?php echo $value['first_name'].' '.$value['last_name']?></strong></span><br/>
															<span class="time"><?php echo $ltype;?></span><br/>
															<span class="content"><?php echo $value['message']?></span>
															<br/>
															<span class="time"><i class="fa fa-clock-o"></i><?php echo date('d-m-Y', strtotime($value['created_at'])).':'.timeAgo($timetoago) ?></span>
														</a>
											<?php } else { ?>
														<a href="#">
															
															<span><strong><?php echo $value['first_name'].' '.$value['last_name']?></strong></span><br/>
															<span class="time"><?php echo $ltype;?></span><br/>
															<span class="content"><?php echo $value['message']?></span>
															<br/>
															<span class="time"><i class="fa fa-clock-o"></i><?php echo date('d-m-Y', strtotime($value['created_at'])).':'.timeAgo($timetoago) ?></span>
														</a>
											<?php } ?>
										</li>
									<?php } } ?>
									
									<?php if(count($notifications) > 5) {?>
									<li class="item-footer"><a href="<?php echo base_url('view_notifications')?>">View all notifications</a></li>
								<?php } ?>
								</ul>
							</li>
						
							<li class="dropdown profile-dropdown">
								<a href="javascript:Void(0);" class="dropdown-toggle" data-toggle="dropdown">
									<?php 
									if(!empty($record[0]->avatar)){
										echo "<img src=\"".base_url('assets/user-profile-img/'.$record[0]->avatar)."\" alt=\"profile\"  title=\"".ucfirst($record[0]->user_name)."\"   />";
									 } else {
									 	echo "<img src=\"".base_url('assets/img/user.png')."\" alt=\"profile\" title=\"".ucfirst($record[0]->user_name)."\" />";
									};
									?>
									
									<span class="hidden-xs"><?php echo ucwords($record[0]->user_name);?></span> <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<!--<li><a href="<?php echo base_url('PP_Credit_Scholar/profile'); ?>"><i class="fa fa-user"></i>Profil</a></li>-->
									<li><a href="<?php echo base_url('PP_Credit_Scholar/settings'); ?>"><i class="fa fa-cog"></i>Réglages</a></li>
									<li><a href="<?php echo base_url('Auth/logout')?>"><i class="fa fa-power-off"></i>Se déconnecter</a></li>
								</ul>
							</li>
							<li class="dropdown profile-dropdown">
								<a >
																
									<span class="hidden-xs">
								 	<?php //echo $record[0]->department;
									if($record[0]->department){
									
									echo "<i class='fa fa-map-marker' aria-hidden='true'></i> &nbsp;".$record[0]->department; }else{
									echo  $this->session->rolename;
									}?>
									</span>
								</a>
							
							</li>
					<!-- 		<li class="dropdown language hidden-xs">
								<?php //echo "<pre>", print_r($this->session), "</pre>";?>					
								<select class="form-control" onChange="javascript:window.location.href='<?php echo base_url(); ?>MultiLanguageSwitcher/switch/'+this.value;" style="position: relative;top:28px;color:#fff;background-color:#009136;">
						            <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
						            <option value="spanish" <?php if($this->session->userdata('site_lang') == 'spanish') echo 'selected="selected"'; ?>>Spanish</option>
						            <option value="german" <?php if($this->session->userdata('site_lang') == 'german') echo 'selected="selected"'; ?>>German</option>
						            <option value="italian" <?php if($this->session->userdata('site_lang') == 'italian') echo 'selected="selected"'; ?>>Italian</option>
						             <option value="french" <?php if($this->session->userdata('site_lang') == 'french') echo 'selected="selected"'; ?>>French</option>
						        </select> -->
								<!-- <a href="<?php //echo base_url(); ?>multilanguageswitcher/switch/english" class="btn dropdown-toggle" data-toggle="dropdown">
									English
									<i class="fa fa-caret-down"></i>
								</a>

								<ul class="dropdown-menu">
									<li class="item <?php //echo $active;?>">
										<a href="<?php //echo base_url(); ?>multilanguageswitcher/switch/spanish">
										Spanish
									</a>
								</li>
								<li class="item <?php //echo $active;?>">
									<a href="<?php //echo base_url(); ?>multilanguageswitcher/switch/german">
									German
								</a> -->					
							</li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<script>
	
	$(".noti_bell").click(function(){
		// $(".noti_count").addClass('hide');
		// $(".noti_count").text('');
	})
</script>
        <?php if($page =="cc Loan"){ $class="nav-small";}else{ $class='';};?>
		<div id="page-wrapper" class="container <?php echo $class;?>" st>
			<div class="row">