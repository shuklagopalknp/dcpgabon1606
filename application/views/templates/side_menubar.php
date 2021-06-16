<?php

$class="active"

?>	

	<div id="nav-col">

		<section id="col-left" class="col-left-nano">

			<div id="col-left-inner" class="col-left-nano-content">

				<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">

					<?php // echo $this->dynamic_menu->build_menu('1'); ?>

					<ul class="nav nav-pills nav-stacked">

						<li class="nav-header nav-header-first hidden-sm hidden-xs">

						Navigation

						</li>

						<li <?php echo ($page=='Dashboard')?('class="active"'):'';?>>

							<a href="<?php echo base_url('Admin_Dashboard');?>"><i class="fa fa-dashboard"></i>

								<span>Tableau de bord</span>

							</a>

						</li>

						<li <?php echo ($page=='Branchs')?('class="active"'):'';?>>

							<a href="<?php echo base_url('Branch'); ?>"><img src="<?php echo base_url('assets/img/icons/decovert.png');?>" id="menu_icon">

								<span>Branche</span>

							</a>

						</li>
						
						<li <?php echo ($page=='Customer')?('class="active"'):'';?>>

							<a href="<?php echo base_url('Customer');?>"><i class="fa fa-list"></i>

								<span>Clientéle Particuliers</span>

							</a>

						</li>

						



						<li <?php echo ($page=='Sous_Secteurs' || $page=='Secteurs' || $page=='Limites' || $page=='Category_employeurs' || $page=='Employeurs')?('class="active"'):'';?> class="hidden">

							<a href="#" class="dropdown-toggle"><i class="fa fa-list"></i>

								<span>Target Companies</span>

								<i class="fa fa-angle-right drop-icon"></i>

							</a>

							<ul class="submenu">

								<li>

									<a href="<?php echo base_url("Secteurs");?>"  <?php echo ($page=='Secteurs' )?('class="active"'):'';?>>Secteurs</a>

								</li>

								<li>

									<a href="<?php echo base_url("Sous_Secteurs");?>" <?php echo ($page=='Sous_Secteurs')?('class="active"'):'';?>>Sous-secteurs</a>

								</li>

								<li>

									<a href="<?php echo base_url("Limites");?>" <?php echo ($page=='Limites')?('class="active"'):'';?> >Limites</a>

								</li>

								<li>

									<a href="<?php echo base_url("Categorie_employeurs")?>" <?php echo ($page=='Category_employeurs')?('class="active"'):'';?> >Catégorie employeurs</a>

								</li>

								<li>

									<a href="<?php echo base_url("Employeurs")?>" <?php echo ($page=='Employeurs')?('class="active"'):'';?> >Employeurs</a>

								</li>

								



								

							</ul>

						</li>



						<!-- <li <?php echo ($page=='Companies')?('class="active"'):'';?>>

							<a href="<?php echo base_url('Company'); ?>"><i class="fa fa-building"></i>

								<span>Target Companies</span>

							</a>

						</li>	 -->



						<li <?php if($page == 'Regions' || $page == 'Department' || $page == 'Communes') {?> class="active" <?php }?> class="hidden">

							<a href="#" class="dropdown-toggle"><i class="fa fa-list"></i>

								<span>Target Communes</span>

								<i class="fa fa-angle-right drop-icon"></i>

							</a>

							<ul class="submenu">

								<li>

									<a href="<?php echo base_url('Regions');?>" <?php echo ($page=='Regions')?('class="active"'):'';?>>Région-Chef-lieu</a>

								</li>

								<li>

									<a href="<?php echo base_url('Chef_Lieu_Department');?>" <?php echo ($page=='Department')?('class="active"'):'';?>>

										Chef-lieu Département

									</a>

								</li>

								<li>

									<a href="<?php echo base_url('Communes');?>" <?php echo ($page=='Communes')?('class="active"'):'';?>>

										Communes

									</a>

								</li>

								

							</ul>

						</li>

											

						<li <?php echo ($page=='Loan' || $page=='pp_consumerloan' || $page=='pp_cashespesece' || $page=='pp_schooltuition' || $page=='pp_communeloan' || $page=='financecreditscholar' || $page=='pp_escompte' || $page=='pp_hr' || $page=='pp_depasma' || $page=='pp_decovert')?('class="active"'):'';?>>

							<a href="#" class="dropdown-toggle"><i class="fa fa-list"></i>

								<span>Gamme de prêts</span>

								<i class="fa fa-angle-right drop-icon"></i>

							</a>

							<ul class="submenu">

								<li>

									<a href="<?php echo base_url('Loan/pp_consumer_loan/1');?>" <?php echo ($page=='pp_consumerloan')?('class="active"'):'';?>>Fêtes à la Carte</a>

								</li>

								<li>

									<a href="<?php echo base_url('Loan/pp_consumer_loan/2');?>" <?php echo ($page=='pp_consumerloan')?('class="active"'):'';?>>

										Congés à la Carte

									</a>

								</li>

								<!-- <li>

									<a href="<?php echo base_url('Loan/pp_schooltuition');?>" <?php echo ($page=='pp_schooltuition')?('class="active"'):'';?>>

										PP School Tuition

									</a>

								</li>

								<li>

									<a href="<?php echo base_url('Loan/pp_commune_loan');?>" <?php echo ($page=='pp_communeloan')?('class="active"'):'';?>>

										PP Commune Loan

									</a>

								</li>

								<li>

									<a href="<?php echo base_url('Loan/finance_credit_scholar');?>" <?php echo ($page=='financecreditscholar')?('class="active"'):'';?>>

										Finance Credit Scholar

									</a>

								</li>

								<li>

									<a href="<?php echo base_url('Loan/pp_escompte');?>" <?php echo ($page=='pp_escompte')?('class="active"'):'';?>>

										PP ESCOMPTE

									</a>

								</li>

								<li>

									<a href="<?php echo base_url('Loan/pp_hr');?>" <?php echo ($page=='pp_hr')?('class="active"'):'';?>>

										PP HR 

									</a>

								</li>

								<li>

									<a href="<?php echo base_url('Loan/pp_depasma');?>" <?php echo ($page=='pp_depasma')?('class="active"'):'';?>>

										PP Depasma

									</a>

								</li>

								<li>

									<a href="<?php echo base_url('Loan/pp_decovert');?>" <?php echo ($page=='pp_decovert')?('class="active"'):'';?>>

										Décovert

									</a>

								</li> -->

													

							</ul>

						</li>

						<li>

							<a href="<?php echo base_url('Roles'); ?>"><i class="fa fa-list"></i>

								<span>Profils</span>

							</a>

						</li>

						<li>

							<a href="<?php echo base_url('Groups'); ?>"><i class="fa fa-list"></i>

								<span>Groups</span>

							</a>

						</li>

						<li>

							<a href="<?php echo base_url('Users'); ?>"><i class="fa fa-users"></i>

								<span>Utilisateurs</span>

							</a>

						</li>

						



						<li <?php echo ($page=='Business_Tabs')?('class="active"'):'';?>>

							<a href="#" class="dropdown-toggle"><i class="fa fa-list"></i>

								<span>Systeme D’Onglet Des Prêts</span>

								<i class="fa fa-angle-right drop-icon"></i>

							</a>

							<ul class="submenu">

								<li>

									<a href="<?php echo base_url("Settings/consumer_tabs");?>" <?php echo ($page=='Consumer_Tabs')?('class="active"'):'';?>>Onglet Personne Physique</a>

								</li>

								<!-- <li>

									<a href="<?php echo base_url("Settings/business_tabs");?>" <?php echo ($page=='Business_Tabs')?('class="active"'):'';?>>Business Tabs</a>

								</li> -->

								

							</ul>

						</li>



						<!-- <li <?php echo ($page=='Business_Documents')?('class="active"'):'';?>>

							<a href="#" class="dropdown-toggle"><i class="fa fa-file"></i>

								<span>Documents Systèmes</span>

								<i class="fa fa-angle-right drop-icon"></i>

							</a>

							<ul class="submenu">

								<li>

									<a href="<?php echo base_url("Settings/customer_product_documents");?>" <?php echo ($page=='Customer_Documents')?('class="active"'):'';?>>Consumer Documents</a>

								</li>

								<li>

									<a href="<?php echo base_url("Settings/business_product_documents");?>" <?php echo ($page=='Business_Documents')?('class="active"'):'';?>>Business Documents</a>

								</li>

								

							</ul>

						</li> -->

						<li>

							<a href="<?php echo base_url('Settings/customer_product_documents'); ?>"><i class="fa fa-file"></i>

								<span>Documents Systèmes</span>

							</a>

						</li>



						<li>

							<a href="<?php echo base_url('Settings/workflow/'); ?>"><i class="fa fa-list"></i>

								<span>Circuit De Validation</span>

							</a>

						</li>

						<li>
							<a href="<?php echo base_url('Settings/commission/'); ?>"><i class="fa fa-list"></i><span>Commission</span></a>
						</li>

						<li>

							<a href="<?php echo base_url('admin/settings/'); ?>"><i class="fa fa-list"></i>

								<span>Settings</span>

							</a>

						</li>



					</ul>

				</div>

			</div>

		</section>

		<div id="nav-col-submenu"></div>

	</div>