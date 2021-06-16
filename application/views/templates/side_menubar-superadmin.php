	<div id="nav-col">
		<section id="col-left" class="col-left-nano">
			<div id="col-left-inner" class="col-left-nano-content">
				<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
					<ul class="nav nav-pills nav-stacked">
						<li class="nav-header nav-header-first hidden-sm hidden-xs">
							Navigation
						</li>
						<?php
					//	echo "<pre>", print_r($this->session), "</pre>";exit;
						
						
						/*=========== Global User ===============*/
						 if($this->session->userdata('role')) {
						?>
						<li <?php echo ($page=='Dashboard')?('class="active"'):'';?>>
							<a href="<?php echo base_url('Dashboard');?>"><img src="<?php echo base_url('assets/img/icons1/menu.png');?>" id="menu_icon" class="black_img">
								<img src="<?php echo base_url('assets/img/icons1/menu_w.png');?>" id="menu_icon" class="white_img">
								<span>Tableau De Bord</span>
							</a>
						</li>
						<li <?php echo ($page=='Customer')?('class="active"'):'';?>>
							<a href="<?php echo base_url('Customer');?>"><img src="<?php echo base_url('assets/img/icons1/target.png');?>" id="menu_icon" class="black_img">
								<img src="<?php echo base_url('assets/img/icons1/target_w.png');?>" id="menu_icon" class="white_img">
								<span>Clientéle Particuliers</span>
							</a>
						</li>
					    <li <?php echo ($page=='PP_FETES_A_LA_CARTE')?('class="active"'):'';?>>
							<a href="<?php echo '#';//base_url('PP_FETES_A_LA_CARTE');?>"><img src="<?php echo base_url('assets/img/icons1/money_fetes.png');?>" id="menu_icon" class="black_img">
								<img src="<?php echo base_url('assets/img/icons1/money_fetes_w.png');?>" id="menu_icon" class="white_img">
								<span>Fêtes à la Carte</span>
							</a>
						</li>
						<li <?php echo ($page=='PP CONGES A LA CARTE')?('class="active"'):'';?>>
							<a href="<?php echo base_url('PP_CONGES_A_LA_CARTE');?>"><img src="<?php echo base_url('assets/img/icons1/save-money.png');?>" id="menu_icon" class="black_img">
								<img src="<?php echo base_url('assets/img/icons1/save-money_w.png');?>" id="menu_icon" class="white_img">
								<span>Congés à la Carte</span>
							</a>
						</li>
						<li <?php echo ($page=='PP_Credit_Confort')?('class="active"'):'';?>>
							<a href="<?php echo '#'; //base_url('PP_CREDIT_CONFORT');?>"><img src="<?php echo base_url('assets/img/icons1/money2.png');?>" id="menu_icon" class="black_img">
								<img src="<?php echo base_url('assets/img/icons1/money2_w.png');?>" id="menu_icon" class="white_img">
								<span>Crédit Confort</span>
							</a>
						</li>

						<li <?php echo ($page=='Weekly Report' || $page == "All Report" || $page=="Tokos Report")?('class="active"'):'';?> >
							<a href="#" class="dropdown-toggle"><img src="<?php echo base_url('assets/img/icons1/analytics.png');?>" id="menu_icon" class="black_img">
									<img src="<?php echo base_url('assets/img/icons1/analytics_w.png');?>" id="menu_icon" class="white_img">
								<span>Rapports</span>
								<i class="fa fa-angle-right drop-icon"></i>
							</a>
							<ul class="submenu">
								<li>
									<a href="<?php echo base_url('Reports/weekly_report');?>" <?php echo ($page=='Weekly Report')?('class="active"'):'';?> >Rapport Hebdomadaire</a>
								</li>
								<li>
									<a href="<?php echo base_url('Reports/all_report');?>" <?php echo ($page=='All Report')?('class="active"'):'';?> >Rapport Agrégat</a>
								</li>
								<li>
									<a href="<?php echo base_url('Reports/tokos_report');?>" <?php echo ($page=='Tokos Report')?('class="active"'):'';?> >Rapport Tokos</a>
								</li>
								
							</ul>
						</li>
						
						<li <?php echo ($page_title=='Fetes à la Carte Inactive Loans' || $page_title == "Conges à la Carte Inactive Loans" || $page_title=="Credit Confort Inactive Loans")?('class="active"'):'';?> >
							<a href="#" class="dropdown-toggle"><img src="<?php echo base_url('assets/img/icons1/menu.png');?>" id="menu_icon" class="black_img">
									<img src="<?php echo base_url('assets/img/icons1/menu_w.png');?>" id="menu_icon" class="white_img">
								<span>Inactive Loans</span>
								<i class="fa fa-angle-right drop-icon"></i>
							</a>
							<ul class="submenu">
								<li>
									<a href="<?php echo base_url('Inactive/fetes_a_la_carte');?>" <?php echo ($page_title=='Fetes à la Carte Inactive Loans')?('class="active"'):'';?> >Fetes à la Carte</a>
								</li>
								<li>
									<a href="<?php echo base_url('Inactive/conges_a_la_carte');?>" <?php echo ($page_title=='Conges à la Carte Inactive Loans')?('class="active"'):'';?> >Conges à la Carte</a>
								</li>
								<li>
									<a href="<?php echo base_url('Inactive/credit_confort');?>" <?php echo ($page_title=='Credit Confort Inactive Loans')?('class="active"'):'';?> >Credit Confort</a>
								</li>
								
							</ul>
						</li>
<!-- 
						<li <?php echo ($page=='Customer' || $page=='Business_Customer')?('class="active"'):'';?>>
							<a href="#" class="dropdown-toggle"><img src="<?php echo base_url('assets/img/icons/decovert.png');?>" id="menu_icon">
								<span>Customer</span>
								<i class="fa fa-angle-right drop-icon"></i>
							</a>
							<ul class="submenu">
								<li><a href="<?php echo base_url('Customer');?>" <?php echo ($page=='Customer')?('class="active"'):'';?>>Individual Customer</a>
								</li>
								<li  <?php echo ($page=='Business_Customer')?('class="active"'):'';?>><a href="<?php echo base_url('Business_Customer');?>" >
										Business Customer
									</a>
								</li>
								
							</ul>
						</li>

						<li <?php echo ($page=='PP Consumer Loans' || $page=='PP Caution Scolare Loans' || $page=='PP Credit Scholar' || $page=='PP Decovert Loans')?('class="active"'):'';?>>
							<a href="#" class="dropdown-toggle"><img src="<?php echo base_url('assets/img/icons/consumer_loan.png');?>" id="menu_icon">
								<span>Customer Products</span>
								<i class="fa fa-angle-right drop-icon"></i>
							</a>
							<ul class="submenu">
								<li  <?php echo ($page=='PP Consumer Loans' || $page=='cc Loan')?('class="active"'):'';?> >
									<a href="<?php echo base_url('PP_Consumer_Global_User/consumerloan/');?>">
									<span>Credit Conso</span></a>
							
								</li>
								<li <?php echo ($page=='PP Caution Scolare Loans' || $page=='cc Loan')?('class="active"'):'';?>>
									<a href="<?php echo base_url('PP_Consumer_Global_User/');?>">
									<span>Caution Scolaire</span>
									</a>
								</li>
								<li <?php echo ($page=='PP Credit Scholar' || $page=='cc Loan')?('class="active"'):'';?>>
									<a href="<?php echo base_url('PP_Consumer_Global_User/credit_scholar_loan');?>">
									<span>Credit Scolaire</span>
									</a>
								</li>
								<li <?php echo ($page=='PP Decovert Loans' || $page=='cc Loan')?('class="active"'):'';?>>
									<a href="<?php echo base_url('PP_Consumer_Global_User/decovert');?>">
									<span>Decouvert</span>
									</a>
								</li>
								
								
							</ul>
						</li>


						<li <?php echo ($page=='PP Escompte' || $page=='ec Loan')?('class="active"'):'';?>>
							<a href="#" class="dropdown-toggle"><img src="<?php echo base_url('assets/img/icons/commune_loan.png');?>" id="menu_icon">
								<span>Business Products</span>
								<i class="fa fa-angle-right drop-icon"></i>
							</a>
							<ul class="submenu">
								<li>
									<a href="#">
									<span>Gage Espece</span></a>
							
								</li>
								<li>
									<a href="#">
									<span>Depassement Temporaire</span>
									</a>
								</li>
								<li>
									<a href="#">
									<span>PP Commune</span>
									</a>
								</li>
								<li <?php echo ($page=='PP Escompte' || $page=='ec Loan')?('class="active"'):'';?>>
									<a href="<?php echo base_url('PP_Escompte_Loan/PP_Escompte');?>">
									<span>PP Escompte</span>
									</a>
								</li>
								
								
								
							</ul>
						</li>

						<li>
							<a href="#"><img src="<?php echo base_url('assets/img/icons/hr.png');?>" id="menu_icon">
								<span>Pret RH</span>
							</a>
						</li> -->

						
						<?php } ?>	
									
					</ul>
				</div>
			</div>
		</section>
		<div id="nav-col-submenu"></div>
		<div id="nav-col-submenu"></div>
	</div>