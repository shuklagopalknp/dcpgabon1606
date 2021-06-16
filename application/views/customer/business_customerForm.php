<div id="AddBusinessModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  	<div class="modal-dialog modal-full-height modal-left modal-notify modal-info">	
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title heading lead"> Ajouter Un Client</h4>
			</div>
		   <form role="form" method="post" id="addbusinesscustomer" class="form">
		  
				<div class="modal-body">   
					<div class="error-msg"></div>
					 	<fieldset class="fieldset">
					
							<legend>Renseignements Personnels</legend>
								<input type="hidden" name="edit_id" id="edit_id">

								<div class="row">
									
					                 <div class="col-md-4">
					                    <div class="form-group">
					                      <label>Numéro du compte <span style="color:red">*</span></label>
											<input type="text" class="form-control addvalidate" id="account_no" name="account_no" autocomplete="off"  placeholder="Enter Account No." value="" onkeypress="return isNumber();" />
					                    </div>
					                  </div>								  
					                  <div class="col-md-4">
					                    <div class="form-group">
					                      <label>Agence <span style="color:red">*</span></label>

					                      <?php if($this->session->userdata('id') == '1'){?>
					                        <select  class="form-control addvalidate" name="branch" id="branch" style="width:98%" required >
		                                    <?php foreach($branch_record as $type){	
		                                      echo  '<option value="'.$type['branch_name'].'">'.$type['branch_name'].'</option>';
		                                    }?>
		                                  </select>	
		                              <?php } else {?>

											<input type="text" class="form-control addvalidate" id="branch" name="branch_name" value="<?php echo $branchdata['branch_name']?>" autocomplete="off" placeholder="Enter Branch" readonly="" />
											<input type="hidden" name="branch" id="branch_val" value="<?php echo $branchdata['bid']; ?>">
										<?php }?>
										  </div>
					                  </div>
					                  <div class="col-md-4">
					                    <div class="form-group">
					                      <label>Raison Sociale <span style="color:red">*</span></label>
											<input type="text" class="form-control addvalidate" id="company_name" name="company_name" autocomplete="off"  placeholder="Enter Company Name" value="" />							
					                    </div>
					                  </div>
				              	

				              	</div>
				              	<div class="row">
				                  <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Forme juridique <span style="color:red">*</span></label>
				                      	<select  class="form-control addvalidate" id="type_of_legal" name="type_of_legal">
				                      	  <option value="" >Select</option>
			                              <option value="1" >Sarl</option>
			                              <option value="2" >Unipersonelle</option>
			                              <option value="3" >SA</option>
			                              <option value="4" >SAS</option>
			                              <option value="5" >SCI</option>
			                              <option value="6" >Commune</option>
			                            </select>
				                    </div>
				                  </div>
				               
									<div class="col-md-4">
					                    <div class="form-group">
					                      <label>Adresse <span style="color:red">*</span></label>	
					                      <textarea class="form-control addvalidate" id="address" name="address" placeholder="Enter Address"></textarea>
					                    </div>
					                </div>
				                 							  
				                  <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Principal gérant <span style="color:red">*</span></label>
										<input type="number"  class="form-control addvalidate" id="principal" name="principal" placeholder="Enter Principal" min="0" value=""/>
				                    </div>
				                  </div>

				                </div>
				                <div class="row">
				                  <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Capital <span style="color:red">*</span></label>
				                      <input type="number"  class="form-control addvalidate" id="capital" name="capital" placeholder="Enter Capital" min="0"  value=""/>						
				                    </div>
				                  </div>
				                  <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Numéro d’immatriculation RCCM <span style="color:red">*</span></label>
				                      <input type="text"  class="form-control addvalidate" id="employer_tax_id" name="employer_tax_id" placeholder="Enter Employer Tax Id"  value="" onkeypress="return isNumber();"/>
				                    </div>
				                  </div>
				                   <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Secteur d’Activité <span style="color:red">*</span></label>
				                      <select name="sector_of_activity" id="sector_of_activity" class="form-control addvalidate">
				                      	<option value="">Select</option>
				                      	<?php foreach($secteurs as $op){?>
				                      		<option value="<?php echo $op['tlc_id']?>"><?php echo $op['secteurs']?></option>
				                      	<?php }?>
				                      </select>
				                    </div>
				                  </div>
				              	</div>
		              	</fieldset>

		              	<fieldset class="fieldset">
		              		<legend>Informations Sur Les Agents</legend>

		              		<div class="row">
							<div class="col-md-12">
		                    <div class="form-group">
		                      <label style="margin-top: 1%">Nom des mandataires</label>
		                      <table class="table table-hover no-footer" role="grid" >
		                      	<th>Officer Full Name</th>
		                      	<th>Position</th>
		                      	<th>Address</th>
		                      	<th>Age</th>
		                      	<th>Ancienneté</th>
		                      	<tr>

		                      		<td><input type="hidden" name="edit_officer_id[]" value="" class="officer_c"><input type="text" name="full_name[0]" id="Officer1_full_name" class="form-control addvalidate fullname_c" placeholder="Enter Full Name" required="true" ></td>
		                      		<td><input type="text" name="position[0]" id="Officer1_position" class="form-control addvalidate position_c" placeholder="Enter Position" required="true" onkeypress=" return isAlpha(this);"></td>
		                      		<td><textarea name="officer_address[]" id="officer1_address" class="form-control addvalidate address_c" placeholder="Enter Address"></textarea></td>
		                      		<td><input type="number" name="age[]" id="Officer1_age" class="form-control addvalidate age_c" placeholder="Enter Age" min="18" max="99"></td>
		                      		<td><input type="number" name="anciennete[]" id="Officer1_anciennete" class="form-control addvalidate anciennete_c" placeholder="Enter Ancienneté" min="0" max="99"></td>

		                      	</tr>
		                      	<tr>
		                      		<td><input type="hidden" name="edit_officer_id[]" value="" class="officer_c"><input type="text" name="full_name[1]" id="Officer2_full_name" class="form-control addvalidate fullname_c" placeholder="Enter Full Name" required="true"></td>
		                      		<td><input type="text" name="position[1]" id="Officer2_position" class="form-control addvalidate position_c" placeholder="Enter Position" required="true"></td>
		                      		<td><textarea name="officer_address[]" id="officer2_address" class="form-control addvalidate address_c" placeholder="Enter Address"></textarea></td>
		                      		<td><input type="number" name="age[]" id="Officer2_age" class="form-control addvalidate age_c" placeholder="Enter Age" min="18" max="99"></td>
		                      		<td><input type="number" name="anciennete[]" id="Officer2_anciennete" class="form-control addvalidate anciennete_c" placeholder="Enter Ancienneté" min="0" max="99"></td>
		                      		
		                      	</tr>
		                      	<tr>
		                      		<td><input type="hidden" name="edit_officer_id[]" value="" class="officer_c"><input type="text" name="full_name[2]" id="Officer3_full_name" class="form-control addvalidate fullname_c" placeholder="Enter Full Name" required="true"></td>
		                      		<td><input type="text" name="position[2]" id="Officer3_position" class="form-control addvalidate position_c" placeholder="Enter Position" required="true"></td>
		                      		<td><textarea name="officer_address[]" id="officer3_address" class="form-control addvalidate" placeholder="Enter Address"></textarea></td>
		                      		<td><input type="number" name="age[]" id="Officer3_age" class="form-control addvalidate age_c" placeholder="Enter Age"  min="18" max="99"></td>
		                      		<td><input type="number" name="anciennete[]" id="Officer3_anciennete" class="form-control addvalidate anciennete_c" placeholder="Enter Ancienneté" min="0" max="99"></td>
		                      		
		                      	</tr>
		                      </table>
		                    </div>
		                  </div>

		             		</div>
		          		</fieldset>
		                 
		              	<fieldset class="fieldset">
							<legend>Informations Additionnelles</legend>
				            <div class="row">

				                  <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Date ouverture compte <span style="color:red">*</span></label>
				                      <input type="type"  class="form-control addvalidate" id="account_open_date" name="account_open_date" autocomplete="off" value="" placeholder="dd-mm-yyyy" />
				                    </div>
				                  </div>

				                  <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Montant des engagements </label>
				                      <select name="creditline_amount" id="creditline_amount" class="form-control addvalidate" >
				                      	<option value="">Select</option>
				                      	<option value="1">Découvert</option>
				                      	<option value="2">Caution</option>
				                      	<option value="3">CCT</option>
				                      	<option value="4">CMT</option>
				                      	<option value="5">Escompte</option>
		           					  </select>
				                     
				                    </div>
				                  </div>


				                  <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Solde du Compte Courant <span style="color:red">*</span></label>
				                      <input type="number"  class="form-control addvalidate" id="balance_amount" name="balance_amount" placeholder="Enter Balance" value="" min="0"/>
				                    </div>
				                  </div>

				            </div>  
			                <div class="row">

				                  <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Solde <span style="color:red">*</span></label>
				                       <select name="amount_type" id="amount_type" class="form-control addvalidate" >
				                      	<option value="">Select</option>
				                      	<option value="1">DAT</option>
				                      	<option value="2">BDC</option>
				                      	<option value="3">Cash Call</option>
				                      </select>
				                    </div>
				                  </div>


				                  <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Montant des impayés <span style="color:red">*</span></label>
				                      <input type="number"  class="form-control addvalidate" id="unpaid_amount" name="unpaid_amount" placeholder="Enter Unpaid Amount" required value="" min="0"/>
				                    </div>
				                  </div>

				                   <div class="col-md-4">
				                    <div class="form-group">
				                      <label>Nombre des impayés <span style="color:red">*</span></label>
				                      <input type="number"  class="form-control addvalidate" id="number_of_unpaid" name="number_of_unpaid" placeholder="Enter Number Of Unpaid" required value="" min="0"/>
				                    </div>
				                  </div>

			                </div>				         
			  
		                  </fieldset>
			  	
				  	<div class="modal-footer justify-content-center">
					  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn">
					  	<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Soumettre</button>
					  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Fermer</button>
					</div>
				</div>
			
			</form>
		</div>
	</div>
</div>