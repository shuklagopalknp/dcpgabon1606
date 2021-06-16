</head>
<body>
	<div id="theme-wrapper">
		<header class="navbar" id="header-navbar">
			<div class="container">
				<a href="<?php echo base_url('Admin_Dashboard');?>" id="logo" class="navbar-brand">
					<img src="<?php echo base_url('assets/img/greatlogo.jpg');?>" alt=""/>
				</a>
				<div class="clearfix">
					<button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
						<span class="sr-only">Toggle navigation</span>
						<span class="fa fa-bars"></span>
					</button>
					<div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
						<ul class="nav navbar-nav pull-left">
							<li><a class="btn" id="make-small-nav"><i class="fa fa-bars"></i></a></li>
						</ul>
					</div>
					<div class="nav-no-collapse pull-right" id="header-nav">
						<ul class="nav navbar-nav pull-right">							
							<li class="dropdown hidden-xs">
								<a class="btn dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bell"></i>
									<span class="count hide">0</span>
								</a>
								<ul class="dropdown-menu notifications-list">
									<li class="pointer">
										<div class="pointer-inner">
											<div class="arrow"></div>
										</div>
									</li>
									<li class="item-header">No notifications</li>
									<!-- <li class="item">
										<a href="#"><i class="fa fa-comment"></i>
											<span class="content">New comment on ‘Awesome P...</span>
											<span class="time"><i class="fa fa-clock-o"></i>13 min.</span>
										</a>
									</li> -->
									<li class="item-footer"><a href="JavaScript:Void(0);">View all notifications</a></li>
								</ul>
							</li>
							<li class="dropdown hidden-xs">
								<a class="btn dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-envelope-o"></i>
									<span class="count hide">0</span>
								</a>
								<ul class="dropdown-menu notifications-list messages-list">
									<li class="pointer">
										<div class="pointer-inner">
											<div class="arrow"></div>
										</div>
									</li>
									<li class="item first-item">
										<a href="JavaScript:Void(0);">
											<span class="content" style="padding:0;">
												<span class="content-headline">George Clooney</span>
												<span class="content-text">
												no massage don't make it right now.</span>
											</span>
											<span class="time"><i class="fa fa-clock-o"></i>21 days</span>
										</a>
									</li>									
									<li class="item-footer">
										<a href="JavaScript:Void(0);">View all messages</a>
									</li>
								</ul>
							</li>
							<li class="dropdown profile-dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<img src="<?php echo base_url('assets/img/samples/scarlet-159.png')?>" alt="profile"/>
									<span class="hidden-xs"><?php echo ucfirst($record[0]->user_name);?></span> <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<!--<li><a href="<?php echo base_url('admin/profile'); ?>"><i class="fa fa-user"></i>Profile</a></li>-->
									<li><a href="<?php echo base_url('admin/settings'); ?>"><i class="fa fa-cog"></i>Settings</a></li>
									<li><a href="<?php echo base_url('login/logout')?>"><i class="fa fa-power-off"></i>Logout</a></li>
								</ul>
							</li>
							<li class="dropdown language hidden-xs">
								<?php //echo "<pre>", print_r($this->session), "</pre>";?>					
								<select class="form-control" onchange="javascript:window.location.href='<?php echo base_url(); ?>multilanguageswitcher/switch/'+this.value;" style="position: relative;top:28px;right:10px;color:#fff;background-color:#009136;">
						            <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>French</option>
						            <!--<option value="spanish" <?php if($this->session->userdata('site_lang') == 'spanish') echo 'selected="selected"'; ?>>Spanish</option>-->
						            <!--<option value="german" <?php if($this->session->userdata('site_lang') == 'german') echo 'selected="selected"'; ?>>German</option>-->
						            <!--<option value="italian" <?php if($this->session->userdata('site_lang') == 'italian') echo 'selected="selected"'; ?>>Italian</option>-->
						        </select>
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
		<div id="page-wrapper" class="container" st>
			<div class="row">