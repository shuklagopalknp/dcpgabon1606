<style>
	#container {
  height: 400px; 
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
					<small>Account Manager</small>
				</div>
			</div>
		</div>


	</div>

	

	
	 <div class="row">

	 	<div class=col-md-12>
	 		<div class="main-box feed" style="padding:10px;">
				<header class="main-box-header clearfix">
					<h2 class="pull-left">Loans</h2>

					<a href="<?php echo base_url('Dashboard')?>" class="pull-right"><span>Back</span></a>
				</header>
				<div class="main-box-body clearfix">
					<button class="accordion active">All Pending Loans</button>
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
												// 	if($key == "4")
												// 	{
												// 		break;
												// 	}
												$cust_data =  json_decode($ld['customer_data']);
													
											?>	
											    <tr id="rowid<?php echo $ld['loan_id'];?>">

											    	<td class="hidden"> <?php echo $count++;?></td>
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
											    		    	}
											    		    	else if($ld['loan_type'] == "CONGES A LA CARTE")
											    		    	{
											    		    		$perm_value =  '6_6';
											    		    	}
											    		    	else if($ld['loan_type'] == "CREDIT CONFORT")
												    			{
												    				$perm_value =  '7_6';
												    			}
											    		    	
																if (in_array($perm_value, $this->session->userdata('portal_permission'))){
											    		     ?>
											    		    	 <button type="button" class="btn btn-info" onclick="loanDisbursement('<?php  echo $ld['loan_id'];?>','<?php echo $ld['loan_type'];?>')"
											    		    	 <?php 
															 if (strtotime(date("H:i:s")) > strtotime("09:30:00") && strtotime(date("H:i:s")) < strtotime("15:45:00"))
                                                            {
                                                            //  echo "disabled";
                                                            }else{
                                                                 echo "disabled";
                                                            }
															
															?>> 
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
											    		else if($ld['approval_status'] == "Avis Défavorable")
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

											    		<a href="<?php echo base_url().$url.$ld['loan_id']."/view";?>" class="table-link" >
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

					<button class="accordion">All Processed Loans</button>
					<div class="panel">
					<div class="table-responsive">
									<table id="table-example1" class="table table-hover table-striped">
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
										    			else if($ld1['loan_type'] == "CREDIT CONFORT")
										    			{
										    				$loan_type = 'credit_confort';
										    				$perm_value =  '7_6';
										    			}
										    			
										    			$d_where  =  array('loan_id' => $ld1['loan_id'],'loan_type' => $loan_type,'review !='=>NULL,'status' => "1");
        												$this->db->select('tbl_all_applications.approval_status,tbl_all_applications.user_type,r.name');
        											    $this->db->order_by('workflow_order','desc');
        											    $this->db->limit('1');
        											    $this->db->join('tbl_role as r','r.id = tbl_all_applications.assigned_roles','inner');
        											    $app_status = $this->db->get_where('tbl_all_applications',$d_where)->row_array();
        											   // echo $this->db->last_query();
        											   // print_r($app_status);
                                                        if($ld1['final_status'] == "Annulé" || $ld1['final_status'] == "Abandonner")
											            {
										                	echo '<span class="label label-danger">'.$ld1['final_status'].'</span><br/><br/>';
										                	echo '<span>'.$app_status['name'].'</small></span>';
											            }
											    		else if($ld1['final_status'] == "Disbursement")
											    		{
											    			echo '<span class="label label-success"> Mise a Disposition</span><br/><br/>';
											    			if($app_status['user_type'] == "cic")
											    				echo '<span><small>'."CIC".'</small></span>';
											    			else
											    				echo '<span><small>'.$app_status['name'].'</small></span>';
											    		}
											    		else{
											    			if(!empty($app_status)){
											    			if($app_status['approval_status'] == "Process")
    											    		{
    											    		    if($this->session->userdata('role') == "12")
    											    		    {
    											    		     if (in_array($perm_value, $this->session->userdata('portal_permission'))){
    											    		     ?>
    											    		    	 <button type="button" class="btn btn-info" onclick="loanDisbursement(<?php  echo $ld1['loan_id'];?>)">
    																	Confirm
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

											    		<a href="<?php echo base_url().$url.$ld1['loan_id']."/view";?>" class="table-link">
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
	 	

	

	</div>

	<div class="row">
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


<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

 <script>
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
	function loanDisbursement(event,type)
	{
		var mainurl;
		if(type == "GAGE ESPECE")
		{
			mainurl = '<?php echo base_url("Business_Product/confirm_disbursement/gage_espece");?>';
		}
		else if(type == "ESCOMPTE")
		{
			mainurl = '<?php echo base_url("Business_Product/confirm_disbursement/escompte");?>';
		}
		else if(type == "COMMUNE")
		{
			mainurl = '<?php echo base_url("Business_Product/confirm_disbursement/commune");?>';
		}

		if (confirm('Are you sure you want to loan disbursement?')) {			
			$.ajax({
		            url: mainurl,
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
		            		// notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Loan `Disbursement` update and customer send a emails successfully.</p>','success');
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

</script>


</body>

</html>