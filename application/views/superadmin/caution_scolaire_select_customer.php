<style type="text/css">
.modal-dialog.modal-notify.modal-info .modal-header {
	background-color: #00c851;
}
.modal-dialog.modal-notify .heading {
	margin: 0;
	padding: .3rem;   
	color: #fff;
}
.modal-dialog {
    width: 950px;
    margin: 30px auto;
}
</style>
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div id="content-header" class="clearfix">
						<div class="pull-left">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
								<li><a href="<?php echo base_url('PP_Caution_Scolare_Loans');?>">CAUTION SCOLAIRE</a></li>
								<li><a href="<?php echo base_url('PP_Caution_Scolare_Loans/amortization_loan/').$this->uri->segment(3);?>">TABLEAU AMORTISSMENT</a></li>
								<li class="active"><span>Sélectionner Un Client</span></li>
							</ol>
						</div>
					</div>
					<div class="main-box-body clearfix">
						<div class="row">
							<div class="col-lg-12">
								<div class="main-box clearfix">
									<div class="main-box-body clearfix" style="margin-top:0px;">
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4">
													<div class="form-group" style="margin-top:10px;">
														<div class="input-group" style="width:100%">
															<input type="search" class="form-control" id="searchString" placeholder="Saisir le numéro de compte">
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group" style="margin-top:10px;">
														<div class="input-group" style="width:100%">
															
														</div>
													</div>
												</div>

												<div class="col-md-4">
													<div class="form-group pull-right" style="margin-top:10px;">
														<div class="input-group" style="width:100%">
															<a href="javascript:void(0);" class="btn btn-primary  openBtn"  data-toggle="modal" data-target="#AddCustomerModal"> <i class="fa fa-plus-circle fa-lg"></i> Ajouter Un Client</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="table-responsive">
												<table id="table-example" class="table table-hover">
													<thead>
														<tr>
															<th>ID</th>
															<th>NAME AND SURNAME CUSTOMER</th>
															<th>BLOCKED ACCOUNT NUMBER</th>
															<th>NUMERO DE COMPTE</th>
															<th>STUDENT NAME AND SURNAME</th>
															<th>ADRESSE</th>
															<th>EMPLOYEUR</th>
															<th>NUMERO DE TELEPHONE </th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody id="callsearch">
														<?php foreach ($bankdetails as $key) {
														//echo "<pre>", print_r($key), "</pre>";
														 ?>
															<tr id="<?php echo $key['cid'];?>">
																<td><?php echo $key['cid'];?></td>
																<td><a href="javascript:void(0);" onClick="editcustomermodal(<?php echo $key['cid'];?>)"><?php echo $key['first_name'].' '.$key['middle_name'].' '.$key['last_name'];?></a></td>
																<td><?php echo $key['account_name'];?></td>
																<td><?php echo $key['account_number'];?></td>
																<td><?php echo $key['dob'];?></td>
																<td><?php echo $key['address'];?></td>
																<td><?php echo $key['emp_name'];?></td>
																<td><?php echo $key['phone'];?></td>
																<td>
																	<a href="javascript:void(0)" class="btn btn-primary" onclick="return theFunction(<?php echo $key['cid'];?>);"/><img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left" id="ajax-loder<?php echo $key['cid'];?>" style="position:relative;top: 2px;left: -2px; display: none;" /> SELECT
																	</a>
															</td>
														</tr>
														<?php } ?>
													</tbody>
												</table>
											</div>
											<textarea class="output" style="display: none; width: 100%" rows="10"></textarea>
										</div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<footer id="footer-bar" class="row">
		<p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>
	</footer>
</div>
</div>
</div>
</div>


<div id="AddCustomerModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  	<div class="modal-dialog modal-full-height modal-left modal-notify modal-info">	
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title heading lead">Ajouter Un Client</h4>
			</div>
		   <form role="form" method="post" id="addnewcustomer">
				<div class="modal-body">   
					<div class="error-msg"></div>
					<fieldset>
						<legend>Renseignements Personnels</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Prénoms</label>
								<input type="text" class="form-control addvalidate" id="first_name" name="first_name" autocomplete="off" required placeholder="Input First" value="" />
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>2ième Prénoms</label>
								<input type="text" class="form-control addvalidate" id="middle_name" name="middle_name" value="" autocomplete="off" placeholder="Input Middle" />
							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nom</label>
								<input type="text" class="form-control addvalidate" id="last_name" name="last_name" autocomplete="off" required placeholder="Input Last" value="" />							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Genre</label>
		                      	<select  class="form-control addvalidate" id="gender" name="gender">
	                              <option value="Male" id="Male">Male</option>
	                              <option value="Female" id="Female">Female</option>
	                            </select>
		                    </div>
		                  </div>
		                </div> 

		                <div class="row">
			                <div class="col-md-3">
			                    <div class="form-group">
			                      <label>Date de naissance </label>	
			                      	<input type="text"  class="form-control addvalidate" id="dob" name="dob" placeholder="DD-MM-YYYY" required value="">		                      		
			                    </div>
			                </div>
		                 							  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Dipôme ou Niveau étude</label>
								<input type="text"  class="form-control addvalidate" id="education" name="education" placeholder="Eg:  MCA"  value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Situation Matrimoniale</label>
		                      <?php 
		                      $marital = array(
                                    "Célibataire",
                                    "Marié(e)",
                                    "Divorcé(e)",
                                    "Veuf",
                                    "Veuve",
                                  ); ?>
                                 
		                      <select  class="form-control addvalidate" id="marital_status" name="marital_status">
		                      	<?php foreach($marital as $mtype){
                                      echo  '<option value="'.$mtype.'" id="'.$mtype.'" >'.$mtype.'</option>';
                                    }?>	                              
	                          </select>							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Email</label>
		                      <input type="email"  class="form-control addvalidate" id="email" name="email" placeholder="eg:example@domain.com" required value=""/>
		                    </div>
		                  </div>
		                </div> 
		                <hr />
					</fieldset>

					<fieldset>
						<legend>Student Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type d’identification</label>
								<select  class="form-control addvalidate" id="typeofid" name="typeofid">
	                              <option value="Passport" id="Passport">Passport</option>
	                              <option value="CNI" id="CNI">CNI</option> 
	                              <option value="Recepisse + Acte de Naissance" id="Recepisse + Acte de Naissance">Recepisse + Acte de Naissance</option>
	                              <option value="Carte de Sejour" id="Carte de Sejour">Carte de Sejour</option>
	                            </select>
		                    </div>
		                  </div>								  
		                   <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Numéro du type d’identification</label>
		                      <input type="number"  class="form-control addvalidate" id="id_number" name="id_number"  placeholder="Input number" required value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Prénoms</label>
		                      	<input type="text"  class="form-control addvalidate" id="student_first_name" name="student_first_name"  required placeholder="Input First" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nom</label>
								<input type="text"  class="form-control addvalidate" id="student_last_name" name="student_last_name" placeholder="Input Last" value="" required />
		                    </div>
		                  </div>		                 
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date de naissance</label>
								<input type="text"  class="form-control addvalidate" id="student_dob" name="student_dob" placeholder="DD-MM-YYYY" required value="" />							
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Fonction</label>
								<input type="text" class="form-control required" id="occupation" name="occupation" required placeholder="Input text" value="" />
							</div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Numéro de téléphone principal</label>
								<input type="phone" class="form-control required" id="main_phone" name="main_phone" required placeholder="eg: 222-222-2222" >							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Second Numéro de téléphone</label>
		                      <input type="text"  class="form-control addvalidate" id="alter_phone" name="alter_phone"  >
		                    </div>
						  </div>
						  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date Expiration du type d’identification</label>
								<input type="text"  class="form-control addvalidate" id="expiration_date" name="expiration_date" placeholder="DD-MM-YYYY" required value="" />							
		                    </div>
		                  </div>
		              </div>		               
					</fieldset>
					<hr />

					<fieldset>
						<legend>Account Information</legend>
						<div class="row">
							<div class="col-md-3">
			                    <div class="form-group">
			                    	<label>Code de la banque</label>		                      
									<input type="text"  class="form-control addvalidate" id="account_bank_code" name="account_bank_code" placeholder="Input text" required />
								</div>
		                  	</div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Code de l’agence</label>
		                      <input type="text"  class="form-control addvalidate" id="account_agency_code" name="account_agency_code" value="" placeholder="Input text" required />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Clé RIB</label>
		                      <input type="text"  class="form-control addvalidate" id="account_rib_key" name="account_rib_key" placeholder="Input text" required />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>NUMERO DE COMPTE</label>
		                      	<input type="number"  class="form-control addvalidate" id="account_account_number" name="account_account_number" placeholder="123456" min="0" required />
		                    </div>
						  </div>
						  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Objet du crédit</label>		                      					
								<?php
                                  $objcredit = array(
                                    "Consomation",
                                    "Equipement",
                                    "Immobilier",
                                    "Scolaire",
                                    "Autres",
                                  ); ?>
                                  <select  class="form-control addvalidate" name="account_obj_credit" id="account_obj_credit" style="width:98%">
                                    <?php foreach($objcredit as $credit){
                                      echo  '<option value="'.$credit.'" '.$select.' name="'.$credit.'">'.$credit.'</option>';
                                    }?>
                                  </select>						
		                    </div>
						  </div>
						</div>		              	
					</fieldset>
					<hr />

					<fieldset>
						<legend>Blocked Account Information</legend>
						<div class="row">
							<div class="col-md-3">
			                    <div class="form-group">
			                    	<label>Code de la banque</label>		                      
									<input type="text"  class="form-control addvalidate" id="blocked_bank_code" name="blocked_bank_code" placeholder="Input text" required />
								</div>
		                  	</div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Code de l’agence</label>
		                      <input type="text"  class="form-control addvalidate" id="blocked_agency_code" name="blocked_agency_code" value="" placeholder="Input text" required />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Clé RIB</label>
		                      <input type="text"  class="form-control addvalidate" id="blocked_rib_key" name="blocked_rib_key" placeholder="Input text" required />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>numéro de compte</label>
		                      	<input type="number"  class="form-control addvalidate" id="blocked_account_number" name="blocked_account_number" placeholder="123456" min="0" required />
		                    </div>
						  </div>
						  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Objet du crédit</label>		                      					
								<?php
                                  $objcredit = array(
                                    "Consomation",
                                    "Equipement",
                                    "Immobilier",
                                    "Scolaire",
                                    "Autres",
                                  ); ?>
                                  <select  class="form-control addvalidate" name="blocked_obj_credit" id="blocked_obj_credit" style="width:98%">
                                    <?php foreach($objcredit as $credit){
                                      echo  '<option value="'.$credit.'" '.$select.' name="'.$credit.'">'.$credit.'</option>';
                                    }?>
                                  </select>						
		                    </div>
						  </div>
						</div>		              	
					</fieldset>					

					<div class="row">
		              	<div class="col-md-12">
		              		<textarea class="outputdata"  class="form-control" rows="10" cols="100%" style="display: none"></textarea>
		              	</div>
		              </div>				         
			  	</div>

			  	<div class="row">
		            <div class="response-msg col-md-12"></div>
			  	</div>
			  	<div class="modal-footer justify-content-center">
				  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn">
				  	<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Soumettre</button>
				  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Fermer</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="EditCustomerModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  	<div class="modal-dialog modal-full-height modal-left modal-notify modal-info">	
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title heading lead">Add Customer</h4>
			</div>
			<div class="modal-content showcustomercontent">
				
			</div>
		   <!--<form role="form" method="post" id="addnewcustomer">
				<div class="modal-body">   
					<div class="error-msg"></div>
					<fieldset>
						<legend>Renseignements Personnels</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Prénoms </label>
								<input type="text" class="form-control addvalidate" id="first_name" name="first_name" autocomplete="off" required placeholder="Input First" value="" />
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>2ième Prénoms </label>
								<input type="text" class="form-control addvalidate" id="middle_name" name="middle_name" value="" autocomplete="off" placeholder="Input Middle" />
							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Nom </label>
								<input type="text" class="form-control addvalidate" id="last_name" name="last_name" autocomplete="off" required placeholder="Input Last" value="" />							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Genre</label>
		                      	<select  class="form-control addvalidate" id="gender" name="gender">
	                              <option value="Male" id="Male">Male</option>
	                              <option value="Female" id="Female">Female</option>
	                            </select>
		                    </div>
		                  </div>
		                </div> 

		                <div class="row">
			                <div class="col-md-3">
			                    <div class="form-group">
			                      <label>Date de naissance </label>	
			                      	<input type="text"  class="form-control addvalidate" id="dob" name="dob" placeholder="DD-MM-YYYY" required value="">		                      		
			                    </div>
			                </div>
		                 							  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Dipôme ou Niveau étude</label>
								<input type="text"  class="form-control addvalidate" id="education" name="education" placeholder="Eg:  MCA"  value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Situation Matrimoniale</label>
		                      <?php 
		                      $marital = array(
                                    "Célibataire",
                                    "Marié(e)",
                                    "Divorcé(e)",
                                    "Veuf",
                                    "Veuve",
                                  ); ?>
                                 
		                      <select  class="form-control addvalidate" id="marital_status" name="marital_status">
		                      	<?php foreach($marital as $mtype){
                                      echo  '<option value="'.$mtype.'" id="'.$mtype.'" >'.$mtype.'</option>';
                                    }?>	                              
	                          </select>							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Email</label>
		                      <input type="email"  class="form-control addvalidate" id="email" name="email" placeholder="eg:example@domain.com" required value=""/>
		                    </div>
		                  </div>
		                </div> 
		                <hr />
					</fieldset>

					<fieldset>
						<legend>Additional Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type d’identification</label>
								<select  class="form-control addvalidate" id="typeofid" name="typeofid">
	                              <option value="Passport" id="Passport">Passport</option>
	                              <option value="CNI" id="CNI">CNI</option> 
	                              <option value="Recepisse + Acte de Naissance" id="Recepisse + Acte de Naissance">Recepisse + Acte de Naissance</option>
	                              <option value="Carte de Sejour" id="Carte de Sejour">Carte de Sejour</option>
	                            </select>
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Revenu mensuel</label>		                      
								<input type="number" class="form-control addvalidate" id="monthly_income" name="monthly_income" min="0" required placeholder="Input number" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Dépenses mensuelles</label>
		                      	<input type="number"  class="form-control addvalidate" id="monthly_expenses" name="monthly_expenses" min="0" required placeholder="Input number" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Numéro du type d’identification</label>
		                      <input type="text"  class="form-control addvalidate" id="id_number" name="id_number"  placeholder="Input number" required value=""/>
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Pays de résidence</label>
								<input type="text"  class="form-control addvalidate" id="state_of_issue" name="state_of_issue" placeholder="Input text" value="" required />
							
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Fonction</label>
								<input type="text" class="form-control required" id="occupation" name="occupation" required placeholder="Input text" value="" />
							</div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Numéro de téléphone principal</label>
								<input type="phone" class="form-control required" id="main_phone" name="main_phone" required placeholder="eg: 222-222-2222" >							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Second Numéro de téléphone</label>
		                      <input type="text"  class="form-control addvalidate" id="alter_phone" name="alter_phone"  >
		                    </div>
		                  </div>
		              </div>
		              	<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date Expiration du type d’identification</label>
		                      <input type="text" class="form-control addvalidate" id="expiration_date" name="expiration_date" placeholder="DD-MM-YYYY" value="">
		                    </div>
		                  </div>
		                </div> 
					</fieldset>
					<fieldset>
						<legend>Employment Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nom de l’employeur</label>
		                      <input type="text"  class="form-control addvalidate" id="emp_name" name="emp_name" value="" required placeholder="Input text" />			
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Secteur d’activité</label>		                      					
								<select  class="form-control addvalidate" id="secteurs" name="secteurs">
								<?php 
								if(!empty($secteurs)){
									foreach($secteurs as $Key){								
										echo "<option value=\"".$Key['tlc_id']."\" name=\"".$Key['secteurs']."\" ".$select." >".$Key['secteurs']."</option>"."\r\n";
									}
								}
								?>                                       
								</select>
							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Catégorie Employeurs</label>
		                      <div class="input-group">								
								<select  class="form-control addvalidate"  id="cat_employeurs" name="cat_employeurs">
								<?php 
									if(!empty($cat_emp)){
										foreach($cat_emp as $Key){										
											echo "<option value=\"".$Key['cat_id']."\" name=\"".$Key['catrgory']."\" ".$select.">".$Key['catrgory']."</option>"."\r\n";
										}
									}
								?>                                        
								</select>
							</div>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type de Contrat</label>
								<select  class="form-control addvalidate" id="typeofcontract" name="typeofcontract" style="width:98%">
								<?php 
								if(!empty($contract_type)){
									foreach($contract_type as $Key){								
									echo "<option value=\"".$Key['tc_id']."\" name=\"".$Key['contract_type']."\">".$Key['contract_type']."</option>";
									}
								}
								?>
								</select>
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date d’embauche</label>
		                      <input type="text"  class="form-control addvalidate" id="employment_date" name="employment_date" placeholder="DD-MM-YYYY" required value="" />	
		                    </div>
		                  </div>						  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date de Fin du Contrat</label>
		                      <input type="text"  class="form-control addvalidate" id="edn_date_contract_cdd" name="edn_date_contract_cdd" placeholder="DD-MM-YYYY"  value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nombre d’année d’expérience professionnelle</label>
								<input type="number"  class="form-control addvalidate" id="years_professionel_experience" name="years_professionel_experience" placeholder="Input number" value="" min="0" required/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date de présence chez l’employeur actuel</label>
		                      <input type="text" class="form-control addvalidate" id="current_emp" name="current_emp" placeholder="DD-MM-YYYY" required  >
		                    </div>
		                  </div>
		              </div>
		              	<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Salaire net</label>
		                      <input type="number"  class="form-control addvalidate" id="net_salary" name="net_salary" min="0" required placeholder="Input number" value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Age de retraite prévu</label>
		                      <input type="number" class="form-control addvalidate" id="retirement_age_expected" required name="retirement_age_expected" min="0" placeholder="Input number" value="">
		                    </div>
		                  </div>		                  
		                </div> 
					</fieldset>
					<fieldset>
						<legend>Address</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Lieu de residence</label>
								<input type="text" class="form-control addvalidate" id="resides_address" name="resides_address" placeholder="Panteón de Marinos" required value="" />
							</div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nom de la rue</label>	                      							
								<input type="text"  class="form-control addvalidate" id="Nom de la rue" name="Nom de la rue" placeholder="Peejayem" required value="" />
							</div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Ville de résidence</label>
								<input type="text"  class="form-control addvalidate" id="city" name="city"  placeholder="Cádiz" required value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Pays de résidence</label>
		                      <input type="text"  class="form-control addvalidate" id="state" name="state" placeholder="San Fernando" required value="" />
		                    </div>
		                  </div>
		                  <hr />
		                </div>
					</fieldset>

					<fieldset>
						<legend>Bank Account</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type de compte</label>
		                      <?php
                                  $atype = array(
                                    "Compte d’épargne",
                                    "Compte d’épargne régulier",
                                    "Compte courant",
                                    "Compte de dépôt récurrent",
                                    "Fixed Deposit Account",
                                    "Demat Account",
                                    "NRI Accounts",
                                  ); ?>
                                  <select  class="form-control addvalidate" name="account_type" id="account_type" style="width:98%" required >
                                    <?php foreach($atype as $type){
                                      echo  '<option value="'.$type.'">'.$type.'</option>';
                                    }?>
                                  </select>
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>numéro de compte</label>
								<input type="text"  class="form-control addvalidate" id="accoumt_number" name="accoumt_number" placeholder="San Fernando" required value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Agence bancaire</label>	
	                      		<select  class="form-control addvalidate" name="bank_name" id="bank_name" style="width:98%" required >
                                    <?php foreach($branch_record as $type){	
                                      echo  '<option value="'.$type['branch_name'].'">'.$type['branch_name'].'</option>';
                                    }?>
                                  </select>	                      
								
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Téléphone agence bancaire</label>
		                      <input type="text"  class="form-control addvalidate" id="bank_phone" name="bank_phone" placeholder="(__)_-___-__" required />
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date ouverture de compte</label>
		                      <input type="text"  class="form-control addvalidate" id="opening_date" name="opening_date" placeholder="DD-MM-YYYY" required value="">
		                    </div>
		                  </div>		                 
		              </div>		              	
					</fieldset>

					<fieldset>
						<legend>Other Information</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                    	<label>Code de la banque</label>		                      
								<input type="text"  class="form-control addvalidate" id="another_test" name="another_test" placeholder="Input text" />
							</div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Code de l’agence</label>
		                      <input type="text"  class="form-control addvalidate" id="test_field" name="test_field" value="" placeholder="Input text" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Clé RIB</label>
		                      <input type="text"  class="form-control addvalidate" id="test_david" name="test_david" placeholder="Input text" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Montant de l’assurance</label>
		                      	<input type="number"  class="form-control addvalidate" id="cc_test" name="cc_test" placeholder="123456" min="0" />
		                    </div>
		                  </div>
		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Objet du crédit</label>		                      					
								<?php
                                  $objcredit = array(
                                    "Consomation",
                                    "Equipement",
                                    "Immobilier",
                                    "Scolaire",
                                    "Autres",
                                  ); ?>
                                  <select  class="form-control addvalidate" name="obj_credit" id="obj_credit" style="width:98%">
                                    <?php foreach($objcredit as $credit){
                                      echo  '<option value="'.$credit.'" '.$select.' name="'.$credit.'">'.$credit.'</option>';
                                    }?>
                                  </select>						
		                    </div>
		                  </div>

		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>frais de dossier</label>
								<input type="number" class="form-control addvalidate" id="frais_de_dossier" name="frais_de_dossier" autocomplete="off" min="0" required value="" />							
		                    </div>
		                  </div>
		              </div>		              
					</fieldset>

					<div class="row">
		              	<div class="col-md-12">
		              		<textarea class="outputdata"  class="form-control" rows="10" cols="100%" style="display: none"></textarea>
		              	</div>
		              </div>				         
			  	</div>

			  	<div class="row">
		            <div class="response-msg col-md-12"></div>
			  	</div>
			  	<div class="modal-footer justify-content-center">
				  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn">
				  	<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Soumettre</button>
				  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Fermer</button>
				</div>
			</form>-->
		</div>
	</div>
</div>

 
<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/demo.js"></script>  

<script src="<?php echo  base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/daterangepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/hogan.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/typeahead.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.pwstrength.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.timepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

<script type="text/javascript">
	function editcustomermodal(id)	{
	 //alert(id);
	 $("#EditCustomerModal").modal('show');
	 $.ajax({
	 	type: "POST",
	 	url:'<?php echo base_url("PP_Caution_Scolare_Loans/editcustomer");?>',
	 	data:{id:id},
	 	beforeSend: function(){
	 		$('#collateral_previewv-'+id).css("opacity","0.5");
	 	},
	 	success: function(resp)
	 	{
	 		$('#collateral_previewv-'+id).css("opacity","1");
	 		$(".showcustomercontent").html(resp);
	 	}
   	});
}

</script>
<script type="text/javascript">
		$("#addnewcustomer").validate({
		errorClass: 'has-error',
		rules: {				
			 first_name: {
				required: true,
				//rangelength:[4,20],
			 },	
			  loan_interest: {
				required: true,
			 },		
				
		},			
		messages: {
			first_name: {
				required: "Name field is required.",
			},			
		},
		highlight: function(element) {
			$(element).closest('.form-group').addClass('has-error');
		},
		unhighlight: function(element) {

			$(element).closest('.form-group').removeClass('has-error');

		},
		errorElement: 'span',
		errorClass: 'help-block',
		errorPlacement: function(error, element) {
			if(element.parent('.input-group').length) {
				error.insertAfter(element.parent());
			} else {
				error.insertAfter(element);
			}
		},
		submitHandler: function(form) {			
			//alert("chekfe india");
			//$(".sr-only").show();
			var formdata = $("#addnewcustomer");
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_Caution_Scolare_Loans/add_newcustomer");?>',
				data:$(formdata).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#addnewcustomer').css("opacity","0.5");
					$('.outputdata').val("");
					$('.lodergif').css("display","inline");					
				},
				success: function(response) {
					console.log(response);
					$('.outputdata').val($.trim(response));					
					$('#addnewcustomer').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");					
					if($.trim(response)=="success"){
						$("#addnewcustomer")[0].reset();
						$('.response-msg').html('<div class="alert alert-success"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Success!</strong> Customer added Successfully.</div>'); 
						setTimeout(function() {                
		                	location.reload();
		                }, 2000);              			           	
                     }else{                     	                     	
                     	$('.response-msg').html('<div class="alert alert-danger"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Error!</strong> unabel to inserted record.</div>');
                     } 
				},
				error: function(XMLHttpRequest, textStatus, response) { 
					$('#addnewcustomer').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");
					$('.response-msg').html('<div class="alert alert-danger"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>'+textStatus+'! </strong>'+response+'</div>').show();				        
			    } 
			});
		  }
	});
	</script>

<script>

	$(function($) {
		/*$('#dob').datepicker({
		  changeMonth: true,
				changeYear: true,
				dateFormat: 'dd-mm-yy',		 
				yearRange: "1980:2050",
				changeMonth: true,
				numberOfMonths: 1
		});*/

		/*$('#expiration_date').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'dd-mm-yy',		 
				yearRange: "1980:2050	",
				changeMonth: true,
				numberOfMonths: 1

		});*/

		/*$('#edn_date_contract_cdd').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'dd-mm-yy',		 
				yearRange: "1980:2050",
				changeMonth: true,
				numberOfMonths: 1

		});*/
		$("#edn_date_contract_cdd").mask("99-99-9999");

		/*$('#employment_date').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'dd-mm-yy',		 
				yearRange: "1980:2019	",
				changeMonth: true,
				numberOfMonths: 1

		});*/
		$("#employment_date").mask("99-99-9999");

		/*$('#current_emp').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'dd-mm-yy',		 
				//yearRange: "1980:2019	",
				changeMonth: true,
				numberOfMonths: 1

		});*/
		$("#current_emp").mask("99-99-9999");
		/*$('#opening_date').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'dd-mm-yy',		 
				//yearRange: "1980:2019	",
				changeMonth: true,
				numberOfMonths: 1
		});*/
		$("#opening_date").mask("99-99-9999");


		$("#maskedDate").mask("99/99/9999");

		$("#maskedPhone").mask("(999) 999-9999");

		$("#main_phone").mask("999-99-99-99");
		$("#alter_phone").mask("999-99-99-99");		
		$("#bank_phone").mask("999-99-99-99");
		
		$("#dob").mask("99-99-9999");
		$("#student_dob").mask("99-99-9999");
		
		$("#expiration_date").mask("99-99-9999");
		


		//$("#monthly_income").mask("999-999-999-999");

		//$("#accoumt_number").mask("a*-90021300001");

		

		//$("#monthly_income").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});

		

	});

	</script>



    
<script>
	$(document).ready(function() {
		var table = $('#table-example').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			"oLanguage": {
			  "sSearch": "<span>RECHERCHER:</span> _INPUT_", //search
			  "sLengthMenu": "AFFICHAGE _MENU_ ENREGISTREMENTS",
			},
			'oTableTools': {
	            'aButtons': [
	                {
	                    'sExtends':    'collection',
	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
	                }
	            ]
	        }
		});		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});		
		//new $.fn.dataTable.FixedHeader( tableFixed );
	});
	$('#searchString').keyup(function(e) {
    	clearTimeout($.data(this, 'timer'));    	
    	$(this).val($(this).val().replace(/[^\d].+/, ""));
    	search(true);
    });
function search(force) {
    var existingString = $("#searchString").val();
    var segment ="<?php echo $this->uri->segment(3);?>";   
    if (existingString.length < 3) return;
    $.ajax({
		type:'POST',
		url:'<?php echo base_url("PP_Caution_Scolare_Loans/SearchAccount");?>',
		data: {account:existingString, segment: segment},
		 beforeSend: function(){        	
        	$('#callsearch').css("opacity","0.5");
    	},
		success:function(resp){
             //console.log(resp);          
             setTimeout(function() {
              $("#callsearch").html(resp).css("opacity","");           		
			}, 500);	
          }                
      });
    //$.get('PP_Caution_Scolare_Loans/SearchAccount/' + existingString, function(data) {
        //alert(data);
        //$('div#results').html(data);
        //$('#results').show();
    //});
}


	function theFunction (customerid) {
        if(confirm('Continue?') ) {
        	var segment ="<?php echo $this->uri->segment(3);?>";        	
        	$.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_Caution_Scolare_Loans/is_ajax_request");?>',
				data: {customerid:customerid, segment: segment},
				beforeSend: function(){        	
		        	$('#callsearch').css("opacity","0.5");
		        	$('#ajax-loder'+customerid).css("display","inline");
		        	
		    	},
				success:function(resp){ 
					console.log(resp);
					$(".output").val($.trim(resp));
					$('#ajax-loder'+customerid).css("display","none");					
					setTimeout(function() {	
					$('#callsearch').css("opacity","");											
						if(resp !=0){
							window.location.href = "<?php echo base_url('PP_Caution_Scolare_Loans/customer_details/');?>"+$.trim(resp);
						}
					}, 1500);
				}      
		     });
        }
    }


	</script>

	<script type="text/javascript">		

$(document).ready(function () {
	$('#edn_date_contract_cdd').change(function () {
		var sdt = new Date($("#employment_date").val());
		var getval=new Date($(this).val()); 
		var difdt = new Date(getval - sdt); 
		$("#retirement_age_expected").val(difdt.toISOString().slice(0, 4) - 1970) 
		//alert((difdt.toISOString().slice(0, 4) - 1970) + "Y " + (difdt.getMonth()+1) + "M " + difdt.getDate() + "D");
    });


    $('#employment_date').change(function () {    	
    	$('#edn_date_contract_cdd').val('');
    	$("#retirement_age_expected").val('');
	});
	//$('#date-daily').val('0000-00-00');
	//$('#date-daily').change(function () {
	    //console.log($('#date-daily').val());
	//});

	$('#current_emp').change(function () {
	var get_val=$('#current_emp').val(); 
	var current_date=new Date().getFullYear()+"-"+(new Date().getMonth()+1)+"-"+new Date().getDate();
	//var millisecondsPerDay = 1000 * 60 * 60 * 24;
	//var millisBetween = current_date.getTime() - get_val.getTime();
	var difdtf = new Date(Date.parse(current_date) - Date.parse(get_val)); 	
	$("#years_professionel_experience").val(difdtf.toISOString().slice(0, 4) - 1970) ;

});
 
});
	</script>

	

	

</body>
</html>