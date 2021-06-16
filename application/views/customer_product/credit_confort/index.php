<style type="text/css">
	.hidden { display: none; }

	.lodertypeof {    
  background-color: #dff0d8c7;
  background-image: url("<?php echo base_url('assets/img/select2-spinner.gif');?>");
  background-size: 18px 18px;
  background-position:right center;
  background-repeat: no-repeat;
  opacity: 0.5;
  }

  .archive_loanbtn{
  	margin-bottom: 1%;
  }
</style>
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">

			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">Tableau de bord</a></li>
						<li class="active"><span>Crédit Confort</span></li>
						<?php //print_r($this->session->username);?>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
			    
			    <?php if($this->session->flashdata('flash_message')){?>
			     <div class="row">
			        <div class="col-md-12">
				         <div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">×</button>
						    <?php echo $this->session->flashdata('flash_message');?>
						</div>
			        </div>
		        
			    <?php } ?>
			    
			    
			    <?php if($this->session->flashdata('error_message')){?>
			     <div class="row">
			        <div class="col-md-12">
				         <div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert">×</button>
						    <?php echo $this->session->flashdata('error_message');?>
						</div>
			        </div>
		        
			    <?php } ?>
			    
			    
				 <?php 

                if (in_array('7_1', $this->session->userdata('portal_permission'))){?>
				<a href="javascript:void(0);" class="btn btn-primary  openBtn"  data-toggle="modal" data-target="#myModal">
					<i class="fa fa-plus-circle fa-lg"></i> Nouvelle demande de Prêt Crédit Confort
				</a>
				<?php } ?>
				<a href="<?php echo base_url('PP_CREDIT_CONFORT/archive_loan')?>" class="btn btn-primary archive_loanbtn pull-right">
					<i class="fa fa-archive fa-sm"></i> Archive Loans
				</a>
				<div class="row" style="margin-top:10px;">					
					<div class="col-lg-12">
						

						<div class="main-box clearfix">

							
							<header class="main-box-header clearfix">								
									<div class="form-group pull-left">
										
									</div>	
								<textarea class="checkstatus form-control" rows="10" style="display: none"></textarea>
							</header>
							<div class="main-box-body clearfix">

								<div class="table-responsive">
									<table id="table-example" class="table table-hover table-striped">
										<thead>
											<tr>
											    <th style="display:none;">S.no</th>
												<th>Numéro Demande</th>
												<th>Numero De Compte</th>
												<!--<th>Code Exploitant</th>-->
												<th>Agence</th>
												<th>Exploitant Placeur</th>
												<th>Client Agence Bancaire</th>
												<th>Client</th>
												<!-- <th>Date De Dernier Paiement</th> -->
												<th width="12%">Date De Demande Prêt</th>
												<th>Montant Du Prêt</th>
												<th>Taux Interet</th>
												<th width="5%">Durée</th>
												<th width="5%">Statut</th>
												<th width="15%">Vue</th>
											</tr>
										</thead>
										<tbody id="getrecord">
											<?php 
											
											$last=array();
								       		 if(!empty($loan_details)) {
												$count = 1;
												foreach($loan_details as $key => $ld){
												$cust_data =  json_decode($ld['customer_data']);
												
												$time_ago=$ld['created'];
												if(!empty($ld['databinding'])){
													$databinding=json_decode($ld['databinding']);
													foreach ($databinding as $kdata ) {
										         		$last[]=$kdata->month.'-'.$kdata->years;
										       		}
									       		}									       		
								       			$createddate=date('23', strtotime($ld['created']));
								       			// echo $ld['created'];
								       			$DateofLastPayment = $createddate.'-'.end($last);
											
											?>
											<tr id="rowid<?php echo $ld['loan_id'];?>">
											    <td style="display:none;"><?php echo $count;?></td>
												<td><?php echo $ld['application_no'];?></td>
												<td><?php echo $cust_data->account_no;?></td>
												<?php
												
												$createdBydetail=$controller->getUserDetail($ld['created_by']);?>
												<td><?php echo $ld['department'];?></td>
												<td><?php echo $createdBydetail['user_name'];?></td>
												<td><?php echo $cust_data->bank_name;//print_r($controller->getBranch($cust_data->branch_id));?></td>
												<td>
											    		<?php if($ld['customer_type'] == '1')
											    		{
											    			echo trim(strtolower($cust_data->first_name." ".$cust_data->middle_name." ".$cust_data->last_name));
											    		}
											    		else{
											    			echo $cust_data->company_name;
											    		}
											    		?>
											    	</td>
												<!-- <td><?php echo $DateofLastPayment; ?></td> -->
												<td><?php echo date("d-m-Y", strtotime($ld['created_at'])).":";
												if(timeAgo($time_ago) >= 48){
													if($key['loan_status']=="Process" || $key['loan_status']=="Demande de retraitement	"){
															echo "<span class='blink' style='color:red'>".timeAgo($time_ago)."</span>";
													}else{

														echo timeAgo($time_ago);
													}
												}else{
													echo timeAgo($time_ago);
												}
													?>
												</td>
												<td><?php echo $ld['loan_amt'];?></td>
												
												<td><?php echo $ld['loan_interest'];?>%</td>
												
												<td><?php echo $ld['loan_term'];?>M</td>
												<td><?php 

												$d_where  =  array('loan_id' => $ld['loan_id'],'loan_type' => "credit_confort",'review !='=>NULL,'status' => "1");
												$this->db->select('tbl_all_applications.approval_status,tbl_all_applications.user_type,tbl_all_applications.workflow_order,r.name,');
											    $this->db->order_by('workflow_order','desc');
											    $this->db->limit('1');
											    $this->db->join('tbl_role as r','r.id = tbl_all_applications.assigned_roles','inner');
											    $app_status = $this->db->get_where('tbl_all_applications',$d_where)->row_array();
											    
											    
											    $d_where1  =  array('loan_id' => $ld['loan_id'],'loan_type' => "credit_confort",'status' => "1");
											    $this->db->order_by('workflow_order','desc');
											    $this->db->limit('1');
											    $last_data =  $this->db->get_where('tbl_all_applications',$d_where1)->row_array();
											    
											           if($ld['final_status'] == "Annulé" || $ld['final_status'] == "Abandonner")
											            {
										                	echo '<span class="label label-danger">'.$ld['final_status'].'</span><br/><br/>';
											            }
														else if($ld['final_status'] == "Disbursement")
											    		{
											    			echo '<span class="label label-success">Mise a Disposition</span><br/><br/>';
											    			if($app_status['user_type'] == "cic")
											    				echo '<span><small>'."CIC".'</small></span>';
											    			else
											    				echo '<span><small>'.$app_status['name'].'</small></span>';
											    		}
											    		else{
											    		    if(!empty($app_status)){
    											    			if($app_status['approval_status'] == "Process")
        											    		{
        											    		    if($this->session->userdata('role') == "12" && $last_data['workflow_order'] == $app_status['workflow_order'] )
        											    		    {
        											    		     if (in_array('7_6', $this->session->userdata('portal_permission'))){
        											    		          $disabled = $this->Common_model->get_current_status($ld['loan_id'],'credit_confort',$this->session->userdata('role'));
        											    		     ?>
        											    		    	 <button type="button" class="btn btn-info" onclick="loanDisbursement(<?php  echo $ld['loan_id'];?>)" <?php if($disabled) echo "disabled";?> 
        											    		    	 <?php 
															 if (strtotime(date("H:i:s")) > strtotime("09:30:00") && strtotime(date("H:i:s")) < strtotime("15:45:00"))
                                                            {
                                                            //  echo "disabled";
                                                            }else{
                                                                 echo "disabled";
                                                            }
															
															?>> 
        																	Confirm <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right loader_class<?php echo $ld['loan_id']; ?>" style="display: none;">
        																</button> 
        															<?php }else{
        																echo "No permission";
        															} } else 
        											    		    {
        											    			echo '<span class="label label-primary">Traitement en Cours</span><br/><br/>';
        											    			if($app_status['user_type'] == "cic")
        											    				echo '<span><small>'."CIC".'</small></span>';
        											    			else
        											    				echo '<span><small>'.$app_status['name'].'</small></span>';
        											    			}
        											    		}
        											    		else if($app_status['approval_status'] == "Avis Favorable"){
        											    			echo '<span class="label label-info">Avis Favorable</span><br/><br/>';
        											    			if($app_status['user_type'] == "cic")
        											    				echo '<span><small>'."CIC".'</small></span>';
        											    			else
        											    				echo '<span><small>'.$app_status['name'].'</small></span>';
        											    		}
        											    		else if($app_status['approval_status'] == "Avis défavorable")
        														{
        															echo '<span class="label label-danger">Avis Défavorable</span><br/><br/>';
        															if($app_status['user_type'] == "cic")
        											    				echo '<span><small>'."CIC".'</small></span>';
        											    			else
        											    				echo '<span><small>'.$app_status['name'].'</small></span>';
        														}
        														else if($app_status['approval_status'] == "Confirm Disbursement")
        														{
        															echo '<span class="label label-success">Confirm Disbursement</span><br/><br/>';
        															if($app_status['user_type'] == "cic")
        											    				echo '<span><small>'."CIC".'</small></span>';
        											    			else
        											    				echo '<span><small>'.$app_status['name'].'</small></span>';
        														}
        														else if($app_status['approval_status'] == "Demande de retraitement")
        														{
        															echo '<span class="label label-danger">Demande de Retraitement</span><br/><br/>';
        															if($app_status['user_type'] == "cic")
        											    				echo '<span><small>'."CIC".'</small></span>';
        											    			else
        											    				echo '<span><small>'.$app_status['name'].'</small></span>';
        														}
        														else {
        															echo '<span class="label label-primary">Initiation en Cours</span><br/><br/>';
        															if($app_status['user_type'] == "cic")
        											    				echo '<span><small>'."CIC".'</small></span>';
        											    			else
        											    				echo '<span><small>'.$app_status['name'].'</small></span>';
        														}
											    		    }
											    		    else {
											    		        	echo '<span class="label label-primary">Initiation en Cours</span><br/><br/>';
											    		        	if($app_status['user_type'] == "cic")
        											    				echo '<span><small>'."CIC".'</small></span>';
        											    			else
        											    				echo '<span><small>'.$app_status['name'].'</small></span>';
											    		    }
											    		}
                                                        
											    													    		
											    	?>
											    	
											    	</td>
												
											 	<td class="sorting_1">
										 	    	<a href="<?php echo base_url('PP_CREDIT_CONFORT/customer_details/').$ld['loan_id'];?>/view" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-eye fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													
													<?php if($ld['final_status'] != "Annulé" && $ld['final_status'] != "Abandonner" && $ld['final_status'] != "Disbursement"){ ?>
													<a href="<?php echo base_url('PP_CREDIT_CONFORT/customer_details/').$ld['loan_id'];?>/edit" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-edit fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													<?php } ?>
													
													<?php if($ld['final_status'] != "Disbursement" && $ld['final_status'] != "Annulé" && $ld['final_status'] != "Abandonner" ){
													if($this->session->userdata('role') != "2"){
													if($this->Common_model->check_assignedrole_workflow('credit_confort',$this->session->userdata('role'),$ld['loan_id'])){
													?>
													<div class="dropdown">
                                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                                                      <span class="caret"></span></button>
                                                      <ul class="dropdown-menu" style="margin: 0px -85px;">
                                                          
                                                        <li><a href="#" onclick="set_assign(<?=$ld['loan_id']?>,'assign')">S'approprier</a></li>
	                                                   
                                                        <?php if($this->session->userdata('role') == "3"){?>
                                                        <li><a href="#" onclick="set_attribuer(<?=$ld['loan_id']?>)">Assigner</a></li>
                                                        <?php }?>
                                                        
                                                        <li><a href="javascript:0;" onclick="set_status(<?php echo $ld['loan_id']?>,'overide')">Réassigner</a></li>
                                                      </ul>
                                                    </div>
                                                    <?php } } }?>
													
													<!--<a href="<?php echo base_url('PP_CREDIT_CONFORT/customer_details/').$ld['loan_id'];?>" class="table-link">-->
													<!--	<span class="fa-stack">-->
													<!--		<i class="fa fa-square fa-stack-2x"></i>-->
													<!--		<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>-->
													<!--	</span>-->
													<!--</a>-->
													<?php if($ld['final_status'] == "Disbursement" && $this->session->userdata('role') == "2"){?>
														<a href="<?php echo base_url('Customer_Product/archive_loan/credit_confort/').$ld['loan_id'];?>" class="table-link">
															<button type="button" class="btn btn-info">Archive Loan</button>
														</a>
													<?php } ?>
													
												
												</td>
												
												<?php } }  ?>
											</tr>
										</tbody>
									</table>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
	<div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	  	<div class="modal-dialog modal-full-height modal-left modal-notify modal-info">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title heading lead">Nouvelle demande de Prêt Crédit Confort</h4>
				</div>
			   <form role="form" method="post" id="NewloanForm">
					<div class="modal-body">   
						<div class="error-msg"></div>    
						<div class="form-group">
							<label>MONTANT DEMANDE</label>
							<div class="input-group">
								<span class="input-group-addon">F CFA</span>
							<select class="form-control" id="loan_amt_drop" onchange='CheckColors(this.value);' required>
								<option value="">Veuillez sélectionner le montant demandé</option>
								<option value="2000000">2 000 000</option>
								<option value="2500000">2 500 000</option>
								<option value="3000000">3 000 000</option>
								<option value="3500000">3 500 000</option>
								<option value="4000000">4 000 000</option>
								<option value="4500000">4 500 000</option>
								<option value="5000000">5 000 000</option>
								<option value="other">Saisir un Montant</option>
							</select>
								<input type="text" class="form-control numberformat" id="loan_amt"  name="loan_amt" style='display:none;' >
							</div>
							<span class="amterror"></span>
						</div>

						<div class="form-group">
							<label>OBJET DU FINANCEMENT</label>
							
							<select class="form-control" id="loan_object_drop" onchange='add_object(this.value);' required>
								
								<option value="credit confort" selected >Credit Confort</option>
								<option value="other">Other</option>
							</select>
								<input type="text" class="form-control" id="loan_object"  name="loan_object"  value="credit confort" style='display:none;' >
							
							
						</div>

						<div class="form-group">
							<label>TAUX D'INTERET</label>
							<div class="input-group">							
								<input type="number" class="form-control" id="loan_interest" name="loan_interest" step="any" min="0" max="12.5" value="12.5" readonly>
								<span class="input-group-addon">%</span>
							</div>
						</div>
						<div class="form-group">
							<label>Durée</label>
							<div class="input-group">
							    <select class="form-control numberformat" name="loan_term" id="loan_term" required>
								<option>Veuillez sélectionner duree</option>
								<?php for($i=1;$i<=24;$i++){?>
									<option value="<?php echo $i;?>"><?php echo $i;?></option>
								<?php }?>
								
								</select>
								<!--<input type="number" class="form-control required" id="loan_term" name="loan_term" value="4">-->
								<span class="input-group-addon addsch">MOIS</span>
							</div>
						</div>
						<div class="form-group">
							<label>PERIODICITE DE REMBOURSEMENT</label>
							<select class="form-control required" name="loan_schedule" id="loan_schedule" readonly>
								<option value="Monthly" selected>MOIS</option>
								<!--<option value="Quarterly" >TRIMESTRE</option>-->
								<!--<option value="Half Yearly">SEMESTRE</option>-->
								<!--<option value="Yearly">ANNEE</option>-->
							</select>
						</div>
						<div class="form-group">
							<label>TVA</label>
							<div class="input-group">							
								<input type="number" class="form-control" id="tva" name="tva" step="any" min="0" max="100" value="18" readonly="readonly">
								<span class="input-group-addon">%</span>
						</div>
						<div class="form-group">
							<label>CSS</label>
							<div class="input-group">							
								<input type="number" class="form-control" id="css" name="css" step="any" min="0" max="100" readonly="readonly" value="1">
								<span class="input-group-addon">%</span>
						</div>
						<!--<div class="form-group">-->
						<!--	<label>TEG PERIODIQUE</label>-->
						<!--	<div class="input-group">							-->
						<!--		<input type="number" class="form-control" id="periodic_teg" name="periodic_teg" step="any" min="0" max="100">-->
						<!--		<span class="input-group-addon">%</span>-->
						<!--	</div>-->
						<!--</div>-->
						<!--<div class="form-group">-->
						<!--	<label>TAUX USURE</label>-->
						<!--	<div class="input-group">							-->
						<!--		<input type="number" class="form-control" id="wear_rate" name="wear_rate" step="any" min="0" max="100">-->
						<!--		<span class="input-group-addon">%</span>-->
						<!--	</div>-->
						<!--</div>		-->
						<!--<div class="form-group">-->
						<!--	<label>TAUX FOND DE GENERATIE</label>-->
						<!--	<input type="number" class="form-control numberformat" id="loan_guarantee" name="loan_guarantee" step="any" min="0" max="100" >-->
						<!--</div>	       -->
				  </div>

				  	<div class="modal-footer justify-content-center">
				  		<input type="hidden" class="form-control" name="loan_fee" value="0">
				  		<input type="hidden" class="form-control" name="loan_type" value="3">
				  		<input type="hidden" class="form-control" name="vat_on_interest" value="<?php echo $loanrange[0]['vat_on_interest'] ?: '19.25';?>">
				  		<input type="hidden" class="form-control" name="loan_commission" value="0">	
						 
					  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn"><img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> SOUMETTRE</button>
					  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">FERMER</button>
						</div>
				</form>
			</div>
		</div>
	</div>
	<!-- ================== -->
</div>
</div>

	<!-- Confirm popup -->

<div class="modal fade" id="cnfrm_delete" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Confirmation</h4>
            </div>
            <div class="modal-body">Voulez-Vous Poursuivre ?</div>
            <!--Do you want to proceed ?-->
            <div class="modal-footer">
                <a type="button" href="" class="btn btn-primary waves-effect yes-btn">Oui</a>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Non</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="show_popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Assignation</h4>
            </div>
            <form action="<?php echo base_url()?>PP_CREDIT_CONFORT/update_assignee" method="POST">
            <div class="modal-body">Voulez-vous vraiment l'assigner à un nouveau Expl/Placeur ?
             <div class="row">
                    <div class="col-md-12">
                    	<div class="form-group">
    						<label>Expl/Placeur</label>
    						<input type="hidden" name="loan_id" id="assign_loanid" value="">
    						<select class="form-control" name="userinfo" id="userinfo" required>
    						</select>
    						
    			        </div>
    			    </div>
		        </div>
		        
		        <div class="row">
                    <div class="col-md-12">
                    	<div class="form-group">
    						<label>Raison</label>
    					    <textarea class="form-control" name="addremark" required></textarea>
    						
    			        </div>
    			    </div>
		        </div>
	        </div>
            <div class="modal-footer">
                 <button type="submit" class="btn btn-primary waves-effect">Soumettre</button>
                 <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">Annuler</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="other_popup" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModalLabel">Assignation</h4>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                 <button type="button" class="btn btn-primary waves-effect" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="overide_popup" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="smallModal">Confirmation</h4>
            </div>
            <form action="<?php echo base_url()?>PP_CREDIT_CONFORT/overideloan_to_user" method="POST">
            <div class="modal-body">
                <span id="confirm_ques"></span>
                
                <div class="row">
                    <div class="col-md-12">
                    	<div class="form-group">
    						<label>Raison</label>
    						<input type="hidden" name="loan_id" id="overide_loanid" value="">
    						<textarea class="form-control" name="override_reason" required></textarea>
    						
    			        </div>
    			    </div>
		        </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary waves-effect">Soumettre</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Annuler</button>
            </div>
            </form>
        </div>
    </div>
</div>
	<!-- confirm popup -->
</div>
</div>

 
<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/demo.js"></script>  

<script src="<?php echo  base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.slimscroll.min.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-jvectormap-world-merc-en.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/gdp-data.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.threshold.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.axislabels.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/skycons.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/raphael-min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/morris.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/bootstrap-wizard.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script>
 

<script>

function set_status(val1,val2){
    
    $("#other_popup").find('.modal-body').text("");
    $.ajax({
        url:"<?php echo base_url()?>PP_CREDIT_CONFORT/assign_status",
        type:"POST",
        data:{'loan_id':val1,'status':val2},
        success:function(response){
            
            var result  =  JSON.parse(response);
            console.log(result);
            
            if(result['status'] == '1' && result['condition'] == "assign_to_myself")
            {   $("#overide_loanid").val(val1);
                $("#overide_popup").find('#confirm_ques').text("Cette demande est déjà assignée à "+result['user']+".  Voulez-vous la Réassigner?"); //Do you want to overide as it is assigned to username ?
                $("#overide_popup").modal('show');
            }
            else if(result['status'] == '2' && result['condition'] == "override_by_you"){
                $("#other_popup").find('.modal-body').text("Vous avez déjà réassignée ce prêt");// You already overide this loan
                $("#other_popup").modal('show');
            }
            else if(result['status'] == '3' && result['condition'] == "overide_to_other"){
                $("#overide_loanid").val(val1);
                $("#overide_popup").find('#confirm_ques').text("Cette demande est déjà réassignée par "+result['user']+". Voulez vous la réassigner encore?"); //Do you want to overide as it is overided by Username?
                $("#overide_popup").modal('show');
            }
            else if(result['status'] == '4' && result['condition'] == "assign_to_me"){
                $("#other_popup").find('.modal-body').text("Cette demande vous est déjà assignée ");//You are already assigned on this loan
                $("#other_popup").modal('show');
            }
            else if(result['status'] == '5' && result['condition'] == "no_one_assigned"){
                $("#other_popup").find('.modal-body').text("Personne n'est affecté à ce prêt"); //No one is assigned to this loan
                $("#other_popup").modal('show');
            }
           
           
             
            
        }
    });
}

function set_assign(val1,val2){
   $.ajax({
        url:"<?php echo base_url()?>PP_CREDIT_CONFORT/assign_status",
        type:"POST",
        data:{'loan_id':val1,'status':val2},
        success:function(response){
            
            var result  =  JSON.parse(response);
            console.log(result);
            
            if(result['status'] == '1' && result['condition'] == "assigned_to_you")
            {  $("#other_popup").find('.modal-body').text("Cette demande vous est déjà assignée");//You are already assigned in this loan
               $("#other_popup").modal('show');
            }
            else if(result['status'] == '2' && result['condition'] == "overide_by_you"){
                $("#other_popup").find('.modal-body').text("Vous avez déjà réassignée ce prêt"); //You already overide this loan
                $("#other_popup").modal('show');
            }
            else if(result['status'] == '3' && result['condition'] == "overide_to_other"){
                $("#other_popup").find('.modal-body').text("This loan is overided by "+result['user']);
                $("#other_popup").modal('show');
            }
            else if(result['status'] == '4'){
                $("#cnfrm_delete").find("a.yes-btn").attr("href","<?php echo base_url()?>PP_CREDIT_CONFORT/assignloan_to_user/"+val1);
                $("#cnfrm_delete").modal('show');
               
            }
            else if(result['status'] == '5' && result['condition'] == "assign_by_other"){
                $("#other_popup").find('.modal-body').text("This loan is assigned by "+result['user']);
                $("#other_popup").modal('show');
            }
           
             
            
        }
    }); 
}

function set_attribuer(val){
    $.ajax({
       url:"<?php echo base_url()?>PP_CREDIT_CONFORT/assign_attribuer",
       type:"POST",
       data:{'loan_id':val},
       success:function(response){
            var result  =  JSON.parse(response);
            console.log(result);
            
            if(result['status'] == "1"){
                $("#userinfo").html(result['condition']);
                $("#assign_loanid").val(val);
                $("#show_popup").modal('show');
            }
            else if(result['status'] == '2' && result['condition'] == "processed")
            {  $("#other_popup").find('.modal-body').text("Processed By Account Manager");
               $("#other_popup").modal('show');
            }
       }
    });
}

function CheckColors(val){
 var element=document.getElementById('loan_amt');
 // alert(val);
 if(val=='noselection'||val=='other'){
 	element.style.display='block';
 }else{
   element.style.display='none';
	$("#loan_amt").val(val);
}
}

function add_object(val){

	var element=document.getElementById('loan_object');

	$("#loan_object").val(val);
	
	 if(val=='other'){
	 	element.style.display='block';
	 }else{
	   element.style.display='none';
		
	}
}

</script>

<script type="text/javascript">
	$("#NewloanForm").validate({
		errorClass: 'has-error',
		rules: {
		     loan_amt_drop: {
				required: true
				
			 },
			 loan_amt: {
				required: true,
				number: true,
				min: 2000000,
				max:5000000,
			 },	
			  loan_interest: {
				required: true,
			 },
			 loan_term: {
				 required: true,
				min: 1,
				max:24,
				number: true,
			 },
			
			 tva:{
			 	required : true,
			 	number: true
			 }
				
		},			
		messages: {
			loan_amt: {
				required: "Loan Amount field is required.",
			},	
			loan_amt_drop: {
				required: "Loan Amount field is required.",
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
			var form = $("form");
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("PP_Consumer_Loans/add_loan");?>',
				data:$(form).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#NewloanForm').css("opacity","0.5");
					$('.outputdata').val("");
					$('.lodergif').css("display","inline");					
				},
				success: function(response) {
					// console.log(response);
					// return false;
					$('.outputdata').val(response);					
					$('#NewloanForm').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");
					var resp = JSON.parse(response);
					if(resp.error){
						$('.error-msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+$.trim(resp.error)+'.</div>');               			           	
                     }else{
                     	$("#NewloanForm")[0].reset();                     	
                     	$('.error-msg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Succès!</strong> en place d un prêt.</div>').show();
	                     setTimeout(function() {						
							window.location.href ="<?php echo base_url('PP_Consumer_Loans/amortization_loan/');?>"+$.trim(resp.success)+'/3'+"";
						}, 500);						
                 	} 
				}
			});
		  }
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
	        },	        
		});
		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');


		var table1 = $('#table-example1').dataTable({
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
	        },	        
		});
		
	    var tt1 = new $.fn.dataTable.TableTools( table1 );
		$( tt1.fnContainer() ).insertBefore('div.dataTables_wrapper');
		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});
		
		//new $.fn.dataTable.FixedHeader( tableFixed );
	});

	$('#loan_schedule').change(function() {	    
	    var $option = $(this).find('option:selected');	    
	    var value = $option.val();//to get content of "value" attrib
	    var text = $option.text();//to get <option>Text</option> content
	    $('.addsch').html(text);

	});

	function loanDisbursement(event)
	{

		//alert(event);
		if (confirm('Voulez-vous vraiment le décaissement du prêt?')) {			
			$.ajax({
		            url: '<?php echo base_url("Customer_Product/confirm_disbursement/credit_confort");?>',
		            type: "POST",
		            data: {
		                'cl_aid':event
		            },
		            beforeSend: function(){
		            	$('#rowid'+event).addClass("lodertypeof");
		            	$(".loader_class"+event).css('display','inline');
		            },
		            success: function (response) {
		                console.log(response);
		                $('.dsprecord').html(response);		                
		                $('#rowid'+event).removeClass("lodertypeof");
		                $(".loader_class"+event).css('display','none');
		                if($.trim(response)=='success'){
		            		//  notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Loan Disbursement Successful.</p>','success');
		            		 setTimeout(function() {                
				          		location.reload();
			        		}, 2000);
		            	}else{
		            		// notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>some error occurred! Unabel to send a mail.</p>','error');
		            	}
		            }
		        });
		}

	}
	function notificationcall(data, status)
  {
      var notification = new NotificationFx({
          message : data,
          layout : 'bar',
          effect : 'slidetop',
          type : status          
        });
          notification.show();
          this.disabled = true;
  }
	</script>

</body>
</html>