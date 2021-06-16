
<div id="AddCustomerModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  	<div class="modal-dialog modal-full-height modal-left modal-notify modal-info">	
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title heading lead"> Ajouter Un Client</h4>
			</div>
		   <form role="form" method="post" id="addnewcustomer">
				<div class="modal-body">   
					<div class="error-msg"></div>
					<fieldset>
						<legend>Renseignements Personnels</legend>
					<div class="row">
						<input type="hidden" name="edit_id" id="edit_id">
						<div class="col-md-3">
		                    <div class="form-group">
		                      <label>Titre</label>
		                      <input type="text" class="form-control " id="title" name="title"  placeholder="Titre" value="" />
		                      	
		                    </div>
		                  </div>
		                 <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Prénoms </label>
								<input type="text" class="form-control " id="first_name" name="first_name" autocomplete="off" placeholder="Prénoms" value="" />
		                    </div>
		                  </div>								  
		                  <div class="col-md-3 hidden">
		                    <div class="form-group">
		                      <label>2ième Prénoms</label>
								<input type="text" class="form-control " id="middle_name" name="middle_name" value="" autocomplete="off" placeholder="Input Middle" />
							  </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Nom Patronymique</label>
								<input type="text" class="form-control " id="last_name" name="last_name" autocomplete="off"  placeholder="Nom" value="" />							
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Genre</label>
		                        <input type="text" class="form-control " id="gender" name="gender" placeholder="Genre" value="" />
		                      	<!--<select  class="form-control addvalidate" id="gender" name="gender">-->
	                        <!--      <option value="Male" id="Male">Homme</option>-->
	                        <!--      <option value="Female" id="Female">Femme</option>-->
	                        <!--    </select>-->
		                    </div>
		                  </div>
		                </div> 

		                <div class="row">
			                <div class="col-md-3">
			                    <div class="form-group">
			                      <label>Date de naissance </label>	
			                      	<input type="text"  class="form-control" name="dob" id="dob" placeholder="DD-MM-YYYY" value="" autocomplete="off"  <?php echo ($user_id != 1) ? 'readonly' : '' ?>/> 	
			                   </div>
			                </div>
			                
			                <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Lieu de naissance</label>
								<input type="text" class="form-control " id="birthplace" name="birthplace" placeholder="Lieu de naissance"  value="" />
							</div>
		                  </div>
		                 							  
		                  <div class="col-md-3 hidden" >
		                    <div class="form-group">
		                      <label> Diplôme ou Niveau étude</label>
								<input type="text"  class="form-control " id="education" name="education" placeholder="Eg:  MCA"  value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Situation Matrimoniale</label>
		                     
                                 <input type="text" class="form-control " id="marital_status" name="marital_status" placeholder="Situation Matrimoniale" value="" />
		                      						
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Email </label>
		                      <input type="text"  class="form-control " id="email" name="email" placeholder="eg:example@domain.com" value=""/>
		                    </div>
		                  </div>
		                  
		                </div> 
		                

		                <div class="row">
		                    <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Lieu d'habitation</label>
								<input type="text" class="form-control " id="resides_address" name="resides_address" placeholder="lieu d'habitation"  value="" />
							</div>
		                  </div>						  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Adresse postale </label>	                      							
								<input type="text"  class="form-control " id="street" name="street" placeholder="Adresse postale"  value="" />
							</div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Adresse Complémentaire</label>
								<input type="text"  class="form-control " id="alternateAddress" name="alternateAddress"  placeholder="Adresse Complémentaire" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Ville </label>
								<input type="text"  class="form-control " id="city" name="city"  placeholder="Ville de résidence"  value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3 hidden">
		                    <div class="form-group">
		                      <label>Pays Res. Fiscale</label>
		                      <input type="text"  class="form-control " id="state" name="state" placeholder="San Fernando" 
		                      value="Gabon" />
		                    </div>
		                  </div>
		                  
		                <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Capacite Juridique</label>
		                       <input type="text"  class="form-control " id="legalCapacity" name="legalCapacity"  placeholder="Capacite Juridique"  value="" />
		                      	
		                    </div>
		                  </div>
		                  <hr />
		                </div>
		                
		                <hr/>
					</fieldset>

					<fieldset>
						<legend>Informations Additionnelles</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nature de la Pièce d’Identité</label>
		                        <input type="text"  class="form-control " id="typeofid" name="typeofid"  placeholder="Nature de la Pièce d’Identité"  value="" />
								
		                    </div>
		                  </div>								  
		                  <div class="col-md-3 hidden" >
		                    <div class="form-group">
		                      <label>Revenu mensuel <span style="color:red">*</span></label>		                      
								<input type="number" class="form-control " id="monthly_income" name="monthly_income" min="0"  placeholder="revenu mensuel" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3 hidden" >
		                    <div class="form-group">
		                      <label> Dépenses mensuelles </label>
		                      	<input type="number"  class="form-control " id="monthly_expenses" name="monthly_expenses" min="0"  placeholder="dépenses mensuelles" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Numéro de la Pièce d’Identité </label>
		                      <input type="text"  class="form-control " id="id_number" name="id_number"  placeholder="Numéro de la Pièce d’Identité" value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date etablissement type de piece</label>
								<input type="text"  class="form-control addvalidate" id="dateId" name="dateId" placeholder="DD-MM-YYYY" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Pays Res. Fiscale </label>
								<input type="text"  class="form-control " id="state_of_issue" name="state_of_issue" placeholder="pays de résidence" value="Gabon"  />
							
		                    </div>
		                  </div>
		                 
		                  <hr />
		                </div> 
		                <div class="row">
		                  								  
		                 <!--  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Fonction <span style="color:red">*</span></label>
								<input type="text" class="form-control required" id="occupation" name="occupation" required placeholder="Input text" value="" />
							</div>
		                  </div> -->
		                  
		                   <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Numéro de téléphone Portable 1</label>
								<input type="phone" class="form-control" id="main_phone" name="main_phone" placeholder="Numéro de téléphone Portable 1" >	
								<!--<input type="hidden" id="item_2" name="mainphone_countrycode" value="">-->
								<!--<span id="phone2valid-msg" class="hide">✓ Valid</span>-->
        <!--                        <span id="phone2error-msg" class="hide"></span>						-->
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Numéro de téléphone Portable 2</label>
								<input type="phone" class="form-control" id="main_phone2" name="main_phone2" placeholder="Numéro de téléphone Portable 2">	
								<!--<input type="hidden" id="item_2" name="mainphone_countrycode" value="">-->
													
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Second Numéro de téléphone Domicile 1</label>
		                      <input type="text"  class="form-control " id="alter_phone" name="alter_phone" placeholder="Second Numéro de téléphone Domicile 1" >
		                      <!--<input type="hidden" id="item_3" name="alternativeph_countrycode" value="">-->
		                      <!-- 	<span id="phone_alt2valid-msg" class="hide">✓ Valid</span>-->
                 			    <!--<span id="phone_alt2error-msg" class="hide"></span>-->
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Second Numéro de téléphone Domicile 2</label>
		                      <input type="text"  class="form-control " id="alter_phone2" name="alter_phone2" placeholder="Second Numéro de téléphone Domicile 2" >
		                      
		                    </div>
		                  </div>

		                
		              </div>
		              	<div class="row">
		                  
						  
						  <div class="col-md-3 hidden">
							<div class="form-group">
									<label>Date de Délivrance de la Pièce d’Identité </label>
									<input type="text"  class="form-control "  id="room_type" name="room_type" placeholder="DD-MM-YYYY"  />
								</div>
							</div>
							
						  <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Date d’Expiration de la Pièce d’Identité</label>
		                      <input type="text" class="form-control "  name="expiration_date" id="expiration_date" autocomplete="off" placeholder="DD-MM-YYYY" value="">
		                    </div>
						  </div>
							
							<div class="col-md-3">
							   <div class="form-group">
									<label>Prénoms du Pere </label>
									<input type="text"  class="form-control " id="father_firstname" name="father_firstname" placeholder="Prénoms du Pere" value=""/>
								</div>
							</div>
							<div class="col-md-3">
							   <div class="form-group">
									<label>Nom Pere </label>
									<input type="text"  class="form-control " id="father_fullname" name="father_fullname" placeholder="Nom Pere"  value=""/>
								</div>
							</div>
							<div class="col-md-3">
							   <div class="form-group">
									<label>Prénoms du Mere </label>
									<input type="text"  class="form-control " id="mother_firstname" name="mother_firstname" placeholder="Prénoms du Mere" value=""/>
								</div>
							</div>
						
						</div>
						<div class="row">
							
							<div class="col-md-3">
								<div class="form-group">
									<label>Nom Mere</label>
									<input type="text"  class="form-control " id="mother_fullname" name="mother_fullname" placeholder="Nom Mere" value=""/>
								</div>
							</div>
						
							<div class="col-md-3">
								<div class="form-group">
								<label>Nationalité</label>
								 <!--<input type="text"  class="form-control addvalidate" id="nationality_datalist" name="nationality_datalist"  placeholder="Nationalité" list="nationality" autocomplete="off"  value="Gabonaise" />-->

								 <input type="text" class="form-control " name="nationality" id="nationality">

									
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
								<label>Lieu Etablissement Pièce</label>
								<input type="text" class="form-control" name="insurance_place_id" id="insurance_place_id" placeholder="Lieu Etablissement Pièce" value="" >
								</div>
							</div>
						</div> 
					<hr />
					</fieldset>
					<fieldset>
						<legend>Information Sur l'Emploi</legend>
						<div class="row">
						   <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type Emploi</label>
		                      <!--<input type="text" class="form-control" name="employeeStatus" id="employeeStatus" placeholder="Type Emploi" value="" >-->
								<select  class="form-control addvalidate" id="employeeStatus" name="employeeStatus" >
	                              <!--<option value="" >select</option>-->
	                              <option value="Salarie" selected>Salarié</option>
	                              <option value="Pre-Salarie">Pre-Salarié </option>
	                              
	                              
	                              
	                              <option value="Autre">Autre </option>
	                            </select>
		                    </div>
		                  </div>	
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nom de l’employeur </label>
		                      <!-- <input type="text"  class="form-control addvalidate" id="emp_name_datalist" name="emp_name_datalist" value="" required placeholder="Input text" list="employers" autocomplete="off" onchange="show_emplist(this);" />	 -->
		                      <input type="text" name="emp_name" class="form-control " id="emp_name" value="" placeholder="Nom de l’employeur">
								<!-- <datalist id="employers">
								<?php foreach($employers as $key=>$emp){ ?>
									 <option  data-value="<?php echo $emp['emp_id']?>" value="<?php echo $emp['employer_name']?>" >
								<?php } ?>
							   
							  </datalist>	 -->	
		                    </div>
		                  </div>								  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Secteur d’activité</label>		 
		                      <input type="text" class="form-control " id="secteurs_id" name="secteurs_id" placeholder="Secteur d’activité" >	
															
		                    </div>
		                    
		                    
		                  </div>
		                  <div class="col-md-3">
		                  <div class="form-group">
		                      <label>Categ. Socio-Prof</label>		 
		                      <input type="text" class="form-control " id="categ" name="categ" placeholder="CATEG. SOCIO-PROF" >	
															
		                    </div>
		                    </div>
		                 
		              </div>
		              <div class="row">
		                   <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type Employeur</label>
		                      <div class="input-group">				
		      <!--                  <input type="text" class="form-control " id="cat_employeurs" name="cat_employeurs" placeholder="Type Employeur" >-->
								<!--<span style="color:red; font-size: 11px;">*Public Civil  &nbsp;&nbsp; *Public de Corps &nbsp;&nbsp;  *Prive &nbsp;&nbsp;  *Autres</span>-->
								
								<select  class="form-control addvalidate" id="cat_employeurs" name="cat_employeurs"  >
	                              <!--<option value="" >select</option>-->
	                              <option value="Prive 20" >Prive 20</option>
	                              <option value="Prive 25">Prive 25</option>
	                              <option value="Prive 30">Prive 30</option>
	                              <option value="Public Corps 25">Public Corps 25</option>
	                              <option value="Public Civil 25">Public Civil 25</option>
	                              <option value="Autres 20">Autres 20</option>
	                              <option value="Organisation internationales">Organisation internationales</option>
	                            </select>

								<!--<input type="hidden" id="cat_emp_value" name="cat_employeurs">-->
							</div>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type de Contrat</label>
		                      <!--<input type="text" class="form-control " id="typeofcontract" name="typeofcontract" placeholder="Type de Contrat" >-->
		                      	<select  class="form-control addvalidate" id="typeofcontract" name="typeofcontract"  >
	                              <!--<option value="" >select</option>-->
	                              <option value="CDD" >CDD</option>
	                              <option value="CDI">CDI</option>
	                              <option value="Autre">Autre </option>
	                            </select>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Adresse de l'employeur</label>
								 <input type="text" class="form-control " name="address_employer" id="address_employer" placeholder="Adresse de l'employeur" >
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Numéro Professionel 1</label>
								 <input type="text" class="form-control " name="numero1" id="numero1" placeholder="TEL TRAVAIL 1" >
		                    </div>
		                  </div>
		                  
		                  <hr />
		                </div> 
		                <div class="row">
		                    <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Numéro Professionel 2</label>
								 <input type="text" class="form-control " name="numero2" id="numero2" placeholder="TEL TRAVAIL 2" >
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date d’embauche </label>
		                      <input type="text"  class="form-control"  name="employment_date" id="employment_date"  placeholder="DD-MM-YYYY" value="" />	
		                    </div>
		                  </div>						  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date De Fin de Contrat/Départ à la Retraite </label>
		                      <input type="text"  class="form-control "  id="edn_date_contract_cdd" name="edn_date_contract_cdd" autocomplete="off" placeholder="DD-MM-YYYY" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3 hidden" >
		                    <div class="form-group">
		                      <label>Nombre d’année d’expérience professionnelle</label>
								<input type="text"  class="form-control " id="years_professionel_experience" name="years_professionel_experience" placeholder="Nombre d’année d’expérience professionnelle" value="" />
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date de présence chez l’employeur actuel</label>
		                      <input type="text" class="form-control"  name="current_emp" id="current_emp" placeholder="DD-MM-YYYY"  autocomplete="off" >
		                    </div>
		                  </div>
		              </div>
		              	<div class="row">
		              	    
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Salaire net </label>
		                      <input type="number"  class="form-control " id="net_salary" name="net_salary" min="0"  placeholder="salaire net" value=""/>
		                    </div>
		                  </div>
		                  <div class="col-md-3 hidden" >
		                    <div class="form-group">
		                      <label>Age de retraite prévu </label>
		                      <input type="number" class="form-control " id="retirement_age_expected"  name="retirement_age_expected" placeholder="age de retraite prévu" value="" >
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Emploi exercé</label>
		                      <input type="input" class="form-control " id="employeeOccupation"  name="employeeOccupation"  placeholder="emploi exercé" value="" >
		                    </div>
		                  </div>
		                  <div class="row">
		                    <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nom Ancien Employeur</label>
								 <input type="text" class="form-control " name="ancianemployer" id="ancianemployer" placeholder="Nom Ancien Employeur" >
		                    </div>
		                  </div>
		                  </div>
		                  		                  
		                </div> 
					</fieldset>
					

					<fieldset>
						<legend>Information Sur le Compte Bancaire</legend>
						<div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Type de compte</label>
		                      <input type="text" class="form-control " name="account_type" id="account_type" placeholder="Type de compte" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>

		                    </div>
		                  </div>								  
		                 
		                  <div class="col-md-3">
		                    <div class="form-group">
		                        <?php // print_r($this->session->branch)?>
		                      <label>Agence bancaire </label>	
		                       <input type="text" class="form-control " name="bank_name" id="bank_name" placeholder="Agence bancaire" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
	                      		                     
								
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Téléphone agence bancaire</label>
		                      <input type="text"  class="form-control " id="bank_phone" name="bank_phone" placeholder="Téléphone agence bancaire" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                      <!--  <input type="hidden" id="item_4" name="bankphone_countrycode" value="">-->
		                      <!--<span id="bankphone_valid-msg" class="hide">✓ Valid</span>-->
                        <!--      <span id="bankphone_error-msg" class="hide"></span>	-->
		                    </div>
		                  </div>

		                   <div class="col-md-3">
		                    <div class="form-group">
		                      <label> Date ouverture de compte </label>
		                      <input type="text"  class="form-control" id="opening_date" name="opening_date" placeholder="DD-MM-YYYY" autocomplete="off"  value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                    </div>
		                  </div>

		                  <hr />
		                </div> 
		                <div class="row">
		                  <div class="col-md-3">
		                    <div class="form-group">
		                    	<label>Code Bqe</label>		                      
								<input type="text"  class="form-control addvalidate" id="code_bqe" name="code_bqe" placeholder="Code Bqe" onkeyup="Ribfetch(1,this);"  <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
							</div>
		                  </div>
		                  
		                  <div class="col-md-2">
		                    <div class="form-group">
		                    	<label>Code Agc</label>		                      
								<input type="text"  class="form-control addvalidate" id="code_agence" name="code_agence" placeholder="Code agence Atlas" onkeyup="Ribfetch(2,this);"  <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
							</div>
		                  </div>

		                   <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Numéro compte </label>
								<input type="text"  class="form-control addvalidate" id="accoumt_number" name="accoumt_number" placeholder="numéro d'entrée"  value="" onkeyup="Ribfetch(3,this);" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div>	

		                  <div class="col-md-3 hidden" >
		                    <div class="form-group">
		                    	<label>Code de la banque</label>		                      
								<input type="text"  class="form-control addvalidate" id="another_test" name="another_test" placeholder="code de la banque" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
							</div>
		                  </div>	
		                    <div class="col-md-3 hidden" >
		                    <div class="form-group">
		                      <label>Code de l’agence</label>
		                      <input type="text"  class="form-control addvalidate" id="test_field" name="test_field" value="" placeholder="code de l’agence" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div> 

		                  	 
		                  	
                            
                            <div class="col-md-2">
		                    <div class="form-group">
		                      <label > RIB</span></label>
		                      <input  type="text" autocomplete="off" class="form-control addvalidate" id="rib4" name="rib4" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                      
		                    </div>
		                    </div>	

		                  
		                  
		                  <div class="col-md-2">
		                    <div class="form-group">
		                      <label>Devise</label>
		                      <input type="text"  class="form-control addvalidate" id="devise" name="devise" placeholder="Devise" value="XAF" onkeyup="Ribfetch(5,this);"  <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  	</div>
		              </div>
		              
		              <div class="row">
		                    <!--<div class="col-md-6">-->
		                    <!--<div class="form-group">-->
		                    <!--  <label > RIB</span></label>-->
		                    <!--  <div class="row">-->
		                    <!--  <div class="col-md-2"><input  type="text" autocomplete="off" class="form-control addvalidate" id="rib1" name="rib1" ></div>-->
		                    <!--  <div class="col-md-2"><input  type="text" autocomplete="off" class="form-control addvalidate" id="rib2" name="rib2" ></div>-->
		                    <!--  <div class="col-md-4"><input  type="text" autocomplete="off" class="form-control addvalidate" id="rib3" name="rib3" ></div>-->
		                    <!--  <div class="col-md-2"><input  type="text" autocomplete="off" class="form-control addvalidate" id="rib4" name="rib4" ></div>-->
		                    <!--  <div class="col-md-2"><input  type="text" autocomplete="off" class="form-control addvalidate" id="rib5" name="rib5" value="XAF" ></div>-->
		                    <!--  </div>-->
		                    <!--</div>-->
		                    <!--</div>-->
		                    <div class="col-md-3">
		                    <div class="form-group">
		                    	<label>N° Carte Bancaire</label>		                      
								<input type="text"  class="form-control addvalidate" id="carte_bancaire" name="carte_bancaire" placeholder="N° Carte Bancaire" <?php //echo ($user_id != 1) ? 'readonly' : '' ?>/>
							</div>
                            </div>
		                    <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Identifiant National </label>
								<input type="text"  class="form-control addvalidate" id="ibu" name="ibu" placeholder="IDENTIFIANT NATIONAL" value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div>
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nature de la Relation</label>
		                      
		                      
		                      <input type="text"  class="form-control addvalidate" id="nature_relation" name="nature_relation" value="" placeholder="Nature de la Relation" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div> 

		                  	<div class="col-md-3">
		                    <div class="form-group">
		                      <label>Categorie Clientèle</label>
		                      
		                      <input type="text"  class="form-control addvalidate" id="cat_client" name="cat_client" placeholder="Input Categorie Clientèle" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  	</div> 
		              </div>

		              <div class="row">
		                  

		                   	
		                  
		                   
		                  	<div class="col-md-3">
		                    <div class="form-group">
		                      <label> Type De Clientele</label>
								<input type="text"  class="form-control addvalidate" id="typeDeClientele" name="typeDeClientele" placeholder="Type De Clientele" value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div>
		                  	
		                  	
		                  	<div class="col-md-3">
		                    <div class="form-group">
		                      <label>Etat Dossier KYC </label> 
		                      
								<input type="text"  class="form-control addvalidate" id="dossierkyc" name="dossierkyc" placeholder="Input Etat Dossier KYC" value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div>

		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date Prochaine Revision </label>
								<input type="text"  class="form-control addvalidate" id="prochaineRevision" name="prochaineRevision" placeholder="DD-MM-YYYY" value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div> 
		                  
		                   <div class="col-md-3 hidden" >
		                    <div class="form-group">
		                      <label>Selection Clientelle </span></label>
		                      
								<input type="text"  class="form-control addvalidate" id="segmentation" name="segmentation" placeholder="Input Selection Clientell"  value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                    	<label>Cotation Risque</label>
		                    	
								<input type="text"  class="form-control addvalidate" id="risk_level" name="risk_level" placeholder="Input Cotation Risque" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
							</div>
		                  </div>

		              </div>

		              <div class="row">
		                  
                            	

		                  	
		                    <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date de Cotation</label>
		                      <input type="text"  class="form-control " id="risk_level_date" name="risk_level_date" value="" placeholder="Date de Cotation" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div> 

		                  	<div class="col-md-3 hidden" >
		                    <div class="form-group">
		                      <label>Particularités</label>
		                      <select  class="form-control addvalidate" id="risk_level" name="risk_level" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                        <option value="Néant" id="Néant">Néant</option>
		                        <option value="S.PAR" id="S.PAR">S.PAR</option>
		                        <option value="PCP" id="PCP">PCP</option>
		                        <option value="SSF" id="SSF">SSF</option>
		                        <option value="S.TOT" id="S.TOT">S.TOT</option>
		                        <option value="INT.B" id="INT.B">INT.B</option>
		                        <option value="DOUTX (Cotation 11 & 12)" id="DOUTX (Cotation 11 & 12)">DOUTX (Cotation 11 & 12)</option>
		                        <option value="EDX (Cotation 11 & 12)" id="EDX (Cotation 11 & 12)">EDX (Cotation 11 & 12)</option>
		                        <option value="CER (Cotation 11 & 12)" id="CER (Cotation 11 & 12)">CER (Cotation 11 & 12)</option>
		                        <option value="X (Cotation 10) Portefeuille NA" id="X (Cotation 10) Portefeuille NA">X (Cotation 10) Portefeuille NA</option>
		                        <option value="DCD" id="DCD">DCD</option>
		                        <option value="S.ARR" id="S.ARR">S.ARR</option>
		                         <option value="ATD" id="ATD">ATD</option>
		                         
		                       </select>  
		                     <!-- <input type="text"  class="form-control addvalidate" id="special_observation" name="special_observation" placeholder="Input text" />  -->
		                    </div>
		                  	</div> 
		                  	
		                  	<div class="col-md-3">
		                    <div class="form-group">
		                      <label>Montant Autorisation en Code Atlas</label>
								<input type="text"  class="form-control addvalidate" id="authCode" name="authCode" placeholder="Montant Autorisation en Code Atlas" value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div>

		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date Echeance Autorisation</label>
								<input type="text"  class="form-control addvalidate" id="authDate" name="authDate" placeholder="DD-MM-YYYY" value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Nom Gestionnaire</label>
								<input type="text"  class="form-control addvalidate" id="nomGestionnaire" name="nomGestionnaire" placeholder="Nom Gestionnaire" value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Code Gestionnaire</label>
								<input type="text"  class="form-control addvalidate" id="codeGestionnaire" name="codeGestionnaire" placeholder="Code Gestionnaire" value="" <?php echo ($user_id != 1) ? 'readonly' : '' ?>/>
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>État Autorisation </span></label>
		                      <input  type="text"  class="form-control addvalidate" id="etatAutorisation" name="etatAutorisation" placeholder="État Autorisation" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                          
								
		                    </div>
		                  </div>
		                  
                        <div class="col-md-3">
		                    <div class="form-group">
		                      <label > Surveillance </span></label>
		                      <input  type="text"  class="form-control addvalidate" id="Surveillance" name="Surveillance" placeholder="Surveillance" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                          
								
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label >Deces </span></label>
		                      <input  type="text"  class="form-control addvalidate" id="Deces" name="Deces" placeholder="Deces" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                          
								
		                    </div>
		                  </div>

		              </div>
		              <div class="row">
		                
		                  
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label >Contentieux</span></label>
		                      <input  type="text"  class="form-control addvalidate" id="Contexntieux" name="Contexntieux" placeholder="Contentieux" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                          
								<!--<input type="text"  class="form-control addvalidate" id="segmentation" name="segmentation" placeholder="Input segmentation"  value="" />-->
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label > Interdit </span></label>
		                      <input  type="text"  class="form-control addvalidate" id="Interdit" name="Interdit" placeholder="Interdit" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label >Indicateur Pep</span></label>
		                      <input  type="text"  class="form-control addvalidate" id="pep" name="pep" placeholder="Indicateur Pep" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                          
							
		                    </div>
		                  </div>
		                  
		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label >Niveau De Vigilance</span></label>
		                      <input  type="text"  class="form-control addvalidate" id="niveiu" name="niveiu" placeholder="Niveau De Vigilance" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                     </div>
		                  </div>
		                   
		              </div>
		              
		              <div class="row">
		                 
                        
		                  
                            <div class="col-md-3">
		                         <div class="form-group">
		                      <label > Date De Derniere Evaluation</span></label>
		                      <input  type="text"  class="form-control addvalidate" id="datedernier" name="datedernier" placeholder="Date De Derniere Evaluation" <?php echo ($user_id != 1) ? 'readonly' : '' ?>>
		                        </div>
		                    </div>
		                  
		              </div>
		              
		              
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
