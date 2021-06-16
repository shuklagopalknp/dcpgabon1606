<style>

	#container {

  height: 400px; 

}

.main-box .main-box-body {
    padding: 10px 10px 10px 10px;
}

h4{
	color:#000;
}

.highcharts-figure, .highcharts-data-table table {

  min-width: 310px; 

  max-width: 800px;

  margin: 1em auto;

}



.highcharts-data-table table {

  font-family: Verdana, sans-serif;

  border-collapse: collapse;

  border: 1px solid #EBEBEB;

  margin: 10px auto;

  text-align: center;

  width: 100%;

  max-width: 500px;

}

.highcharts-data-table caption {

  padding: 1em 0;

  font-size: 1.2em;

  color: #555;

}

.highcharts-data-table th {

  font-weight: 600;

  padding: 0.5em;

}

.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {

  padding: 0.5em;

}

.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {

  background: #f8f8f8;

}

.highcharts-data-table tr:hover {

  background: #f1f7ff;

}



.accordion {

  background-color: #eee;

  color: #444;

  cursor: pointer;

  padding: 12px;

  width: 100%;

  border: none;

  text-align: left;

  outline: none;

  font-size: 14px;

  transition: 0.4s;

}



.active, .accordion:hover {

  background-color: #ccc; 

}



.panel {

  padding: 0 18px;

  display: none;

  background-color: white;

  overflow: hidden;

}
.Bicig_banner {
    height: 500px;
}

.Bicig_banner img {
    height: 100%;
    width: 100%;
    object-fit: contain;
}


.Bicig_banner_top {
    /*height: 210px;*/
    display: flex;
    align-items: center;
    /*justify-content: center;*/
}

.info_box_icon_top {
    display: flex;
    padding: 0px;
    border-radius: 0px;
}
.info_box_icon i {
    font-size: 30px;
    color: #fff;
}
.info_box_text{
padding: 10px;
color: #000;	
}
.info_box_icon {
    width: 73px;
    height: 89px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #b1b3b5;
}
.info_box_g{
	background-color: #015a94;
}.info_box_r{
	background-color: #f4786e;
}
.info_box_p{
	background-color: #009136;
}


.lodertypeof {    
    background-color: #dff0d8c7;
    background-image: url("<?php echo base_url('assets/img/select2-spinner.gif');?>");
    background-size: 18px 18px;
    background-position:right center;
    background-repeat: no-repeat;
    opacity: 0.5;
    }

</style>

<div id="content-wrapper">



	<?php //echo "<pre>", print_r($record), "</pre>";?>



	<div class="row">

		<div class="col-lg-12">

			<div id="content-header" class="clearfix">

				<div class="pull-left">

					<!-- <ol class="breadcrumb">

						<li class="active"><span>Dashboard</span></li>

					</ol> -->

					<h1>Tableau de bord</h1>

					<small>Exploitant/Placeur</small>

				</div>

				<!-- <div class="pull-right hidden-xs">

					<div class="xs-graph pull-left">

						<div class="graph-label">

							<b><?php echo $loans_applied_count;?></b> Loans

						</div>

						<div class="graph-content spark-orders"></div>

					</div>

					<div class="xs-graph pull-left mrg-l-lg mrg-r-sm">

						<div class="graph-label">

							<b>CFA <?php echo number_format($totalloanamt,0,',',' ');?></b> 

						</div>

						<div class="graph-content spark-revenues"></div>

					</div>

				</div> -->

			</div>

		</div>





	</div>



	<div class="row">



		<div class="col-md-3 col-sm-6 col-xs-12">

			<div class="main-box small-graph-box  info_box_icon_top">

				<div class="info_box_icon">
					<i class="fa fa-bell"></i>

				</div>

				
<div class="info_box_text">
				<span class="value"><?php echo $applied_count;?></span>

				<span class="headline">Actives Demandes Crédit</span>
			</div>

				

			</div>

		</div>

		<div class="col-md-3 col-sm-6 col-xs-12">

			<div class="main-box small-graph-box  info_box_icon_top">
				<div class="info_box_icon info_box_g">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
			</div>
<div class="info_box_text">
				<span class="value"><?php echo $pending_loans;?></span>

				<span class="headline">En Attente</span>
			</div>

				

			</div>

		</div>



		<div class="col-md-3 col-sm-6 col-xs-12">

			<div class="main-box small-graph-box info_box_icon_top">
				<div class="info_box_icon info_box_p">

				<i class="fa fa-check" aria-hidden="true"></i>

			</div>

				<div class="info_box_text">

				<span class="value"><?php echo $approved_loans;?></span>

				<span class="headline">Approuvées</span>
			</div>

				

			</div>

		</div>



		<div class="col-md-3 col-sm-6 col-xs-12">



			<div class="main-box small-graph-box  info_box_icon_top">
				<div class="info_box_icon info_box_r">
<i class="fa fa-times" aria-hidden="true"></i>
</div>
<div class="info_box_text">
				<span class="value"><?php echo $rejected_loans;?></span>

				<span class="headline">Rejetées</span>
			</div>



			</div>



		</div>



	</div>



	
	<div class="row">

		<div class="col-md-8 col-lg-8">
			<div class="main-box feed">

				<header class="main-box-header clearfix">

					<h4 class="pull-left">Recent Clientéle Particuliers</h4>
					

					<span id="recent_minus" class="pull-right" style="display: none;"><i class="fa fa-minus" aria-hidden="true"></i></span>
					<span id="recent_plus" class="pull-right"><i class="fa fa-plus" aria-hidden="true"></i></span>
					

					<a href="<?php echo base_url('Customer')?>" class="pull-right" style="margin-right: 1%"><span>Vue All Clients</span></a>
				</header>

				<div class="main-box-body clearfix  recent_class" style="display: none;">

					<div class="table-responsive" >
						<table id="example" class="table table-hover table-striped">
							<thead>
								<tr>
									<th>Nom Et Prenoms Client</th>
									<th>Type De Compte</th>
									<th>Numero De Compte</th>
									<th>Date De Naissance</th>
									<th>Adresse</th>
									<th>Numero De Telephone</th>
								</tr>
							</thead>
							<tbody id="callsearch">
								<?php 
									$count =  1;
								foreach ($recent_customers as $customer) {
								?>
									<tr id="<?php echo $customer['customer_id'];?>">
									<td><?php echo $customer['first_name'].' '.$customer['middle_name'].' '.$customer['last_name'];?></td>
									<td><?php echo $customer['account_type'];?></td>
									<td><?php echo $customer['account_no'];?></td>
									<td><?php echo $customer['dob'];?></td>
									<td><?php echo $customer['resides_address'];?></td>
									<td><?php echo $customer['main_phone'];?></td>
									
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

				</div>

			</div>
		</div>
		<div class="col-lg-4 col-md-4">

			<div class="main-box feed">

				<header class="main-box-header clearfix">

					<h4 class="pull-left">Nombre de clients par agence</h4>
					<span id="customer_minus" class="pull-right" style="display: none;"><i class="fa fa-minus" aria-hidden="true"></i></span>
					<span id="customer_plus" class="pull-right"><i class="fa fa-plus" aria-hidden="true"></i></span>

				</header>

				<div class="main-box-body clearfix customer_class" style="display: none;">

					<div class="table-responsive">
						<table id="example1" class="table table-hover table-striped">
							<thead>
								<tr>
									<th>Branch</th>
									<th>Total Clients</th>
								</tr>
							</thead>
							<tbody id="callsearch">
								<?php 
									$count =  1;
								foreach ($branchwise_customers as $row) {
								?>
									<tr>
									<td><?php echo $row['branch_name'] ? $row['branch_name'] : "Not Assigned" ;?></td>
									<td><?php echo $row['count'];?></td>
									
									
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>

				</div>

			</div>

		</div> 

	</div>

	

	 <div class="row">



	 	<div class=col-md-8>

	 		<div class="main-box feed">

				<header class="main-box-header clearfix">

					<h4 class="pull-left">Prêts</h4>

					<span id="loan_minus" class="pull-right" ><i class="fa fa-minus" aria-hidden="true"></i></span>
					<span id="loan_plus" class="pull-right" style="display: none;"><i class="fa fa-plus" aria-hidden="true"></i></span>

					<a href="<?php echo base_url('operational_dashboard')?>" class="pull-right" style="margin-right: 1%;"><span>Vue Complète</span></a>

				</header>

				<div class="main-box-body clearfix loan_class">

					<button class="accordion active">Demandes en Attente</button>

					<div class="panel" style="display: block;">

					 	<div class="table-responsive">

									<table id="table-example" class="table table-hover table-striped">

										<thead>

											<tr>

												<th class="hidden">S.No.</th>

												<th>Type de Prêt</th>

												<th>Numéro Demande</th>

												<th>Numero De Compte</th>

												<th>Client / Raison Sociale</th>

												<th>Date de la Demande</th>

												<th width="5%">Statut</th>

												<th width="15%">Vue</th>

											</tr>

										</thead>

										<tbody id="getrecord">

											<?php if(!empty($pending_applications)) {

												$count = 1;

												foreach($pending_applications as $key => $ld){

													if($key == "4")

													{

														break;

													}

												$cust_data =  json_decode($ld['customer_data']);

													

											?>	

											    <tr id="rowid<?php echo $count;?>">



											    	<td class="hidden"> <?php echo $count;?></td>

											    	<td><?php echo $ld['loan_type']?></td>

											    	<td><?php echo $ld['application_no']?></td>

											    	<td><?php echo $cust_data->account_no?></td>

											    	

											    	<td>

											    		<?php if($ld['customer_type'] == '1')

											    		{

											    			echo trim(ucwords($cust_data->first_name." ".$cust_data->middle_name." ".$cust_data->last_name));

											    		}

											    		else{

											    			echo $cust_data->company_name;

											    		}

											    		?>

											    	</td>

											    	<td><?php echo $ld['created_at']?></td>

											    	<td><?php 
                                                         if($ld['final_status'] == "Annulé" || $ld['final_status'] == "Abandonner")
											            {
										                	echo '<span class="label label-danger">'.$ld['final_status'].'</span><br/><br/>';
											            }
											            else if($ld['final_status'] == "Disbursement")

											    		{
                                                            echo '<span class="label label-success"> Mise a Disposition</span>';
	
                                                        }

											    		else{

											    			if($ld['approval_status'] == "Process")

											    		{

											    		    if($this->session->userdata('role') == "12")

											    		    {



											    		    	if($ld['loan_type'] == "FETES A LA CARTE")
																{

											    		    		$perm_value =  '4_6';
											    		    		$loan_type = 'credit_conso';

											    		    	}

											    		    	else if($ld['loan_type'] == "CONGES A LA CARTE")
																{

											    		    		$perm_value =  '6_6';
											    		    		$loan_type = 'credit_scolair';

											    		    	}
											    		    	else if($ld['loan_type'] == "CREDIT CONFORT")
																{

											    		    		$perm_value =  '7_6';
											    		    		$loan_type = 'credit_confort';

											    		    	}

											    		    	

											    		     if (in_array($perm_value, $this->session->userdata('portal_permission'))){
											    		         
											    		          $disabled = $this->Common_model->get_current_status($ld['loan_id'],$loan_type,$this->session->userdata('role'));

											    		     ?>

											    		    	 <button type="button" class="btn btn-info" onclick="loanDisbursement('<?php  echo $ld['loan_id'];?>','<?php echo $ld['loan_type'];?>','<?php echo $count;?>')" <?php if($disabled) echo "disabled";?> 
											    		    	 <?php 
															 if (strtotime(date("H:i:s")) > strtotime("09:30:00") && strtotime(date("H:i:s")) < strtotime("15:45:00"))
                                                            {
                                                            //  echo "disabled";
                                                            }else{
                                                                 echo "disabled";
                                                            }
															
															?>> 
											    		    	 	<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left loader_class<?php echo $count; ?>"  style="position:relative;top: 2px;left: -2px; display: none;" />
																	Confirm

																</button> 

															<?php } } else 

											    		    {

											    			echo '<span class="label label-primary">Traitement en Cours</span>';

											    			}

											    		}

											    		else if($ld['approval_status'] == "Avis Favorable"){

											    			echo '<span class="label label-info">Avis Favorable</span>';

											    		}

											    		else if($ld['approval_status'] == "Demande de retraitement"){

											    			echo '<span class="label label-danger">Demande de retraitement</span>';

											    		}

											    		else if($ld['approval_status'] == "Avis défavorable")

														{

															echo '<span class="label label-danger">Avis Défavorable</span>';

														}

														else if($ld['approval_status'] == "Confirm Disbursement")

														{

															echo '<span class="label label-success">Confirm Disbursement</span>';

														}
														
                                                        else {

															echo '<span class="label label-primary">Initiation en Cours</span>';

														}

											    		}



											    													    		

											    	?></td>

											    	<td class="sorting_1">



											    		<?php 

											    			if($ld['loan_type'] == "FETES A LA CARTE")

											    			{

											    				$url = 'PP_FETES_A_LA_CARTE/customer_details/';

											    			}

											    			else if($ld['loan_type'] == "CONGES A LA CARTE")

											    			{

											    				$url = 'PP_CONGES_A_LA_CARTE/customer_details/';

											    			}
											    			else if($ld['loan_type'] == "CREDIT CONFORT")

											    			{

											    				$url = 'PP_CREDIT_CONFORT/customer_details/';

											    			}



											    		?>



											    		<a href="<?php echo base_url().$url.$ld['loan_id']."/view";?>" class="table-link">

														<span class="fa-stack">

															<i class="fa fa-square fa-stack-2x"></i>

															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>

														</span>

											    			

													</a>

											    	</td>

											    	

											    </tr> 



											<?php 
												$count++;
												}

											} ?>

										</tbody>

									</table>

								</div>



					</div>



					<button class="accordion">Demandes Traitées</button>

					<div class="panel">

					<div class="table-responsive">

									<table id="table-example" class="table table-hover table-striped">

										<thead>

											<tr>

												<th class="hidden">S.No.</th>

												<th>Type de Prêt</th>

												<th>Numéro Demande</th>

												<th>Numero De Compte</th>

												<th>Client / Raison Sociale</th>

												<th>Date de la Demande</th>

												<th width="5%">Statut</th>

												<th width="15%">Vue</th>

											</tr>

										</thead>

										<tbody id="getrecord">

											<?php if(!empty($processed_applications)) {

												$count = 1;

												foreach($processed_applications as $key => $ld1){

													if($key == "4")

													{

														break;

													}

												$cust_data =  json_decode($ld1['customer_data']);

													

											?>	

											    <tr id="rowid<?php echo $ld1['loan_id'];?>">



											    	<td class="hidden"> <?php echo $count++;?></td>

											    	<td><?php echo $ld1['loan_type']?></td>

											    	<td><?php echo $ld1['application_no']?></td>

											    	<td><?php echo $cust_data->account_no?></td>

											    	

											    	<td>

											    		<?php if($ld1['customer_type'] == '1')

											    		{

											    			echo trim(ucwords($cust_data->first_name." ".$cust_data->middle_name." ".$cust_data->last_name));

											    		}

											    		else{

											    			echo $cust_data->company_name;

											    		}

											    		?>

											    	</td>

											    	<td><?php echo $ld1['created_at']?></td>

											    	<td><?php 

                                                        if($ld1['loan_type'] == "FETES A LA CARTE")
										    			{
										    				$loan_type = 'credit_conso';
										    				$perm_value =  '4_6';
										    			}
										    			else if($ld1['loan_type'] == "CONGES A LA CARTE")
										    			{
										    				$loan_type = 'credit_scolair';
										    				$perm_value =  '6_6';
										    			}
										    			else if($ld['loan_type'] == "CREDIT CONFORT")
														{
															$loan_type = 'credit_confort';
										    				$perm_value =  '7_6';

											    		}
										    			
										    			$d_where  =  array('loan_id' => $ld1['loan_id'],'loan_type' => $loan_type,'review !='=>NULL,'status' => "1");
        												$this->db->select('tbl_all_applications.approval_status,r.name');
        											    $this->db->order_by('workflow_order','desc');
        											    $this->db->limit('1');
        											    $this->db->join('tbl_role as r','r.id = tbl_all_applications.assigned_roles','inner');
        											    $app_status = $this->db->get_where('tbl_all_applications',$d_where)->row_array();
        											    //echo $this->db->last_query();
        											   // print_r($app_status);
        											   
        											    $d_where1  =  array('loan_id' => $ld1['loan_id'],'loan_type' => $loan_type,'status' => "1");
        											    $this->db->order_by('workflow_order','desc');
        											    $this->db->limit('1');
        											    $last_data =  $this->db->get_where('tbl_all_applications',$d_where1)->row_array();

                                                        if($ld1['final_status'] == "Annulé" || $ld1['final_status'] == "Abandonner")
											            {
										                	echo '<span class="label label-danger">'.$ld1['final_status'].'</span><br/><br/>';
										                	echo '<span>'.$app_status['name'].'</small></span>';
											            }
											    		else if($ld1['final_status'] == "Disbursement")
											    		{
											    			echo '<span class="label label-success"> Mise a Disposition</span><br/><br/>';
											    			echo '<span>'.$app_status['name'].'</small></span>';
											    		}
											    		else{
											    			if(!empty($app_status)){
											    			if($app_status['approval_status'] == "Process")
    											    		{
    											    		    if($this->session->userdata('role') == "12" && $last_data['workflow_order'] == $app_status['workflow_order'])
    											    		    {
    											    		     if (in_array($perm_value, $this->session->userdata('portal_permission'))){
    											    		     ?>
    											    		    	 <button type="button" class="btn btn-info" onclick="loanDisbursement(<?php  echo $ld['loan_id'];?>)">
    																	Confirm
    																</button> 
    															<?php }else{
    																echo "No permission";
    															} } else 
    											    		    {
    											    			echo '<span class="label label-primary">Traitement en Cours</span><br/><br/>';
    											    			echo '<span>'.$app_status['name'].'</small></span>';
    											    			}
    											    		}
    											    		else if($app_status['approval_status'] == "Avis Favorable"){
    											    			echo '<span class="label label-info">Avis Favorable</span><br/><br/>';
    											    			echo '<span>'.$app_status['name'].'</small></span>';
    											    		}
    											    		else if($app_status['approval_status'] == "Avis défavorable")
    														{
    															echo '<span class="label label-danger">Avis Défavorable</span><br/><br/>';
    															echo '<span>'.$app_status['name'].'</small></span>';
    														}
    														else if($app_status['approval_status'] == "Confirm Disbursement")
    														{
    															echo '<span class="label label-success">Confirm Disbursement</span><br/><br/>';
    															echo '<span><small>'.$app_status['name'].'</small></span>';
    														}
    														else if($app_status['approval_status'] == "Demande de retraitement")
    														{
    															echo '<span class="label label-danger">Demande de Retraitement</span><br/><br/>';
    															echo '<span><small>'.$app_status['name'].'</small></span>';
    														}
    														else {
    															echo '<span class="label label-primary">Initiation en Cours</span><br/><br/>';
    															echo '<span><small>'.$app_status['name'].'</small></span>';
    														}
										    		    }
										    		    else {
										    		        	echo '<span class="label label-primary">Initiation en Cours</span><br/><br/>';
										    		        	echo '<span>'.$app_status['name'].'</small></span>';
										    		    }
										    		}											    		

											    	?></td>

											    	<td class="sorting_1">



											    		<?php 

											    			if($ld1['loan_type'] == "FETES A LA CARTE")

											    			{

											    				$url = 'PP_FETES_A_LA_CARTE/customer_details/';

											    			}

											    			else if($ld1['loan_type'] == "CONGES A LA CARTE")

											    			{

											    				$url = 'PP_CONGES_A_LA_CARTE/customer_details/';

											    			}
											    			else if($ld1['loan_type'] == "CREDIT CONFORT")

											    			{

											    				$url = 'PP_CREDIT_CONFORT/customer_details/';

											    			}



											    		?>



											    		<a href="<?php echo base_url().$url.$ld1['loan_id']."/view";?>" class="table-link" >

														<span class="fa-stack">

															<i class="fa fa-square fa-stack-2x"></i>

															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>

														</span>

											    			

													</a>

											    	</td>

											    	

											    </tr> 



											<?php }

											} ?>

										</tbody>

									</table>

								</div>

					</div>



				</div>

			</div>

	 	</div>

	 	<div class="col-md-4">
<!-- 
	 		<div class="main-box feed">

				<header class="main-box-header clearfix">

					<h2 class="pull-left">Total Customers</h2>

				</header>

				<div class="main-box-body clearfix">

					

    <div id="container"></div>

    <p class="highcharts-description">

        All color options in Highcharts can be defined as gradients or patterns.

        In this chart, a gradient fill is used for decorative effect in a pie

        chart.

    </p>



				</div>

			</div> -->
			<div class="Bicig_banner_top">
<div class="Bicig_banner">
			<img src="https://dcpgabonpilot.com/assets/conges_ala_carte.jpg">

		</div>
	</div>

	 	</div>


	</div>






<footer id="footer-bar" class="row">



<p id="footer-copyright" class="col-xs-12">



Powered by DCP.



</p>



</footer>



</div>



</div>



</div>



</div>







 



<script src="<?php echo base_url('assets/js/demo-skin-changer.js');?>"></script>  



<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>



<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>



<script src="<?php echo base_url('assets/js/jquery.nanoscroller.min.js');?>"></script>



<script src="<?php echo base_url('assets/js/demo.js');?>"></script>  



<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js');?>"></script>



<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js');?>"></script> 



<script src="<?php echo base_url('assets/js/moment.min.js');?>"></script>



<script src="<?php echo base_url('assets/js/scripts.js');?>"></script>



<script src="<?php echo base_url('assets/js/pace.min.js');?>"></script>



<!-- <script src="https://code.highcharts.com/highcharts.js"></script> -->

<!-- <script src="https://code.highcharts.com/highcharts-3d.js"></script> -->

<!-- <script src="https://code.highcharts.com/modules/exporting.js"></script> -->

<!-- <script src="https://code.highcharts.com/modules/export-data.js"></script> -->

<!-- <script src="https://code.highcharts.com/modules/accessibility.js"></script> -->
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script>


 <script>

$(document).ready(function(){

 	$("#recent_minus").click(function(){
 		$(".recent_class").hide();
 		$("#recent_plus").show();
 		$(this).hide();
 	});

 	$("#recent_plus").click(function(){
 		

 		$(".recent_class").show();
 		$("#recent_minus").show();
 		$(this).hide();
 	});


 	$("#customer_minus").click(function(){
 		$(".customer_class").hide();
 		$("#customer_plus").show();
 		$(this).hide();
 	});

 	$("#customer_plus").click(function(){
 		

 		$(".customer_class").show();
 		$("#customer_minus").show();
 		$(this).hide();
 	});

 	$("#loan_minus").click(function(){
 		$(".loan_class").hide();
 		$("#loan_plus").show();
 		$(this).hide();
 	});

 	$("#loan_plus").click(function(){
 		

 		$(".loan_class").show();
 		$("#loan_minus").show();
 		$(this).hide();
 	});

 });

var acc = document.getElementsByClassName("accordion");

var i;



for (i = 0; i < acc.length; i++) {

  acc[i].addEventListener("click", function() {

    this.classList.toggle("active");

    var panel = this.nextElementSibling;

    if (panel.style.display === "block") {

      panel.style.display = "none";

    } else {

      panel.style.display = "block";

    }

  });

}







// Loan Disbursement

	function loanDisbursement(event,type,counter)

	{

		var mainurl;



		if(type == "FETES A LA CARTE")

		{

			mainurl = '<?php echo base_url("Customer_Product/confirm_disbursement/credit_conso");?>';

		}

		else if(type == "CONGES A LA CARTE")

		{

			mainurl = '<?php echo base_url("Customer_Product/confirm_disbursement/credit_scolair");?>';

		}
		else if(type == "CREDIT CONFORT")

		{

			mainurl = '<?php echo base_url("Customer_Product/confirm_disbursement/credit_confort");?>';

		}





		if (confirm('Are you sure you want to loan disbursement?')) {			

			$.ajax({

		            url: mainurl,

		            type: "POST",

		            data: {

		                'cl_aid':event

		            },

		            beforeSend: function(){

		            	$('#rowid'+counter).addClass("lodertypeof");

		            	$(".loader_class"+counter).css('display','inline');

		            },

		            success: function (response) {

		                console.log(response);

		                $('.dsprecord').html(response);		                

		                $('#rowid'+counter).removeClass("lodertypeof");

		                $(".loader_class"+counter).css('display','none');

		                if($.trim(response)=='success'){

		            		notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Loan `Disbursement` update and customer send a emails successfully.</p>','success');

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





	// show popup notification 



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



<script>


// $(document).ready(function() {
// 		var table = $('#example').dataTable({
// 			'info': false,
// 			'sDom': 'lTfr<"clearfix">tip',
// 			"oLanguage": {
// 			  "sSearch": "<span>RECHERCHER:</span> _INPUT_", //search
// 			  "sLengthMenu": "AFFICHAGE _MENU_ ENREGISTREMENTS",
// 			},
// 			'oTableTools': {
// 	            'aButtons': [
// 	                {
// 	                    'sExtends':    'collection',
// 	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
// 	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
// 	                }
// 	            ]
// 	        }
// 		});		
// 	    var tt = new $.fn.dataTable.TableTools( table );
// 		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');		
// 		var tableFixed = $('#table-example-fixed').dataTable({
// 			'info': false,
// 			'pageLength': 50
// 		});		
// 		//new $.fn.dataTable.FixedHeader( tableFixed );
// 	});
	

	

Highcharts.chart('container', {

    chart: {

        type: 'pie',

        options3d: {

            enabled: true,

            alpha: 45

        }

    },

    title: {

        text: 'Clientéle Particuliers'

    },

    subtitle: {

        text: ''

    },

    plotOptions: {

        pie: {

            innerSize: 100,

            depth: 45

        }

    },

    series: [{

        name: 'Clients',

        data: [

            ['Individual', <?php echo $individual['count'];?>],

            ['Business', <?php echo $business['count'];?>]

        ]

    }]

});



//$(".highcharts-title").hide();

$(".highcharts-button").hide();

$(".highcharts-credits").hide();

</script>

</body>



</html>