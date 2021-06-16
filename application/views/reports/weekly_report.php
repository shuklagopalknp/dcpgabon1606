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
</style>
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">

			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<li class="active"><span>Rapport Hebdomadaire</span></li>
					</ol>
				</div>

			</div>
			<div class="main-box-body clearfix">
            		<div class="row" style="margin-top:10px;">					
					<div class="col-lg-12">
						
						
						<div class="main-box clearfix">

							<header class="main-box-header clearfix">								
								<div class="form-group pull-left">
									<form id="" action="<?php echo base_url('Reports/weekly_report')?>" method="POST">

										<div class="row">
											<label class="col-lg-2 control-label">DATE:</label>

											<div class="col-lg-6">
												<input type="text" class="form-control" name="daterange" value="<?php echo $formatted_date;?>" />
			
											</div>

										</div>

										<?php if($this->session->userdata('role') != "2" && $this->session->userdata('role') != '3') {?>

										<div class="row" style="margin-top:2%">

											<label class="col-lg-2 control-label">Branch:</label>
											
											<div class="col-lg-6">
												<select class="form-control" name="branch_name">
													<option value="">Select</option>
													<?php foreach($all_branch as $b) {?>
														<option value="<?php echo $b['bid']?>"><?php echo $b['branch_name']?></option>
													<?php }?>
												</select>
			
											</div>
										</div>

										<?php } ?>
                                        </br>
										<button  type ="submit" class="btn btn-primary">Sélectionner</button> &nbsp;
										<button id="btnExport" class="btn btn-primary" onclick="fnExcelReport();"> Exporter </button>
									</form>
									<h4 class="pull-left"><?php echo $date_title;?></h4>
								</div>	
							</header>

							<div class="main-box-body clearfix">
								

								<div class="table-responsive">
									<table  id="table-example" class="table table-hover table-striped">
										<thead>
											<tr style="background: #cccccc54;">
												<th class="hidden">S.No.</th>
												<th></th>
												<th></th>
												<th></th>
												<?php foreach($date_arr as $d){?>
													<th colspan="2">
														<?php  $timestamp = strtotime($d);
														    setlocale(LC_TIME, "fr_FR");
														    echo ucfirst(strftime('%A',$timestamp));
												// 			echo $day = date('l', $timestamp);

														?>
															<br/>
															<span style="font-size:10px;">(<?php echo date('d-m-Y',strtotime($d));?>)</span>
														</th>
												<?php } ?>
												
												<th colspan="2">Total Sem. I (Total de la Semaine)</th>
												<th colspan="2">Objectifs</th>
												<th colspan="2">% Réalisation</th>
											</tr>
											
										</thead>
										<tbody id="getrecord">
											<tr style="background-color:#f5f5f5">
												<td><span style="font-weight: 700">Utilisateurs</span></td>
												<td><span style="font-weight: 700">Agence</span></td>
												<td><span style="font-weight: 700">Groupe Agence</span></td>
												<?php foreach($date_arr as $d){?>
													<td><span style="font-weight: 700">Nbre</span></td>
													<td><span style="font-weight: 700">Cptx</span></td>
												<?php } ?>
												<td><span style="font-weight: 700">Nbre</span></td>
												<td><span style="font-weight: 700">Cptx</span></td>
												<td><span style="font-weight: 700">Nbre</span></td>
												<td><span style="font-weight: 700">Cptx</span></td>
												<td><span style="font-weight: 700">Nbre</span></td>
												<td><span style="font-weight: 700">Cptx</span></td>
											</tr>
											<?php 
											
											foreach($details as $key=>$row){
												$count1 = 0; $count2 = 0;
												?>

												<tr>
													<td><?php echo ucwords($row['name']);?></td>
													<td><?php echo $row['department']; ?></td>
													<td><?php echo $row['branch']?></td>
													<?php foreach($row['data'] as $row1){?>
													<td><?php echo $row1['number']?></td>
													<td><?php echo $row1['sum']?></td>
													<?php

													$count1 += $row1['number'];
													$count2 += $row1['sum'];
													 }?>
													<td><span style="font-weight: 700"><?php echo $count1;?></span></td>
													<td><span style="font-weight: 700"><?php echo $count2;?></span></td>
													 <td><span style="font-weight: 700"><?php echo $row['target_loan_count']?></span></td>
													<td><span style="font-weight: 700"><?php echo $row['target_loan_amount']?></span></td>
													<td><span style="font-weight: 700"><?php 
													if($row['target_loan_count']){
														echo round($count1/$row['target_loan_count']*100)."%";
													}
													?></span></td>
													<td><span style="font-weight: 700"><?php
													if($row['target_loan_amount']){
													 	echo round($count2/$row['target_loan_amount']*100)."%";
													}
													 ?></span></td>
													<!--<td><span style="font-weight: 700"></span></td>
													<td><span style="font-weight: 700"></span></td> -->
												</tr>

											<?php } ?>
											
										</tbody>
										<tfoot>
											<tr>
												<td><span style="font-weight: 700">Total Segment</span></td>
												<td></td>
												<td></td>
												<?php foreach($total as $r){?>
												<td><span style="font-weight: 700"><?php echo $r['number']?></span></td>
												<td><span style="font-weight: 700"><?php echo $r['sum']?></span></td>
												<?php } ?>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td><span style="font-weight: 700">Commissions / PCE</span></td>
												<td></td>
												<td></td>
												<?php foreach($total as $r){?>
												<td><span style="font-weight: 700"><?php echo $r['number']?></span></td>
												<td><span style="font-weight: 700"><?php echo $r['number'] * $comm_data['pce_commission']?></span></td>
												<?php } ?>
												<td></td>
												<td></td>
											</tr>
											<tr>
												<td><span style="font-weight: 700">Commissions /Exploitation</span></td>
												<td></td><td></td>
												<?php foreach($total as $r){?>
												<td><span style="font-weight: 700"><?php echo $r['number']?></span></td>
												<td><span style="font-weight: 700"><?php echo $r['number'] * $comm_data['exploitation_commission'] ;?></span></td>
												<?php } ?>
												<td></td>
												<td></td>
											</tr>
										</tfoot>
									</table>
									<iframe id="txtArea1" style="display:none"></iframe>
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
<!-- 
<script src="<?php echo  base_url(); ?>assets/js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-jvectormap-world-merc-en.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/gdp-data.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.resize.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.time.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.threshold.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.axislabels.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.sparkline.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/skycons.js"></script> -->

<script src="<?php echo  base_url(); ?>assets/js/raphael-min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/morris.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap-wizard.js"></script>

<!-- <script src="<?php echo  base_url(); ?>assets/js/select2.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script> 
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->


<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
 
<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script>


<script type="text/javascript">
	
	$('input[name="daterange"]').daterangepicker({
		locale: {
	      format: 'YYYY/M/DD'
	    }
	});

	// Loan Disbursement
	function loanDisbursement(event)
	{
		if (confirm('Are you sure you want to loan disbursement?')) {			
			$.ajax({
		            url: '<?php echo base_url("Business_Product/confirm_disbursement/gage_espece");?>',
		            type: "POST",
		            data: {
		                'cl_aid':event
		            },
		            beforeSend: function(){
		            	$('#rowid'+event).addClass("lodertypeof");
		            },
		            success: function (response) {
		                console.log(response);
		                $('.dsprecord').html(response);		                
		                $('#rowid'+event).removeClass("lodertypeof");
		                if($.trim(response)=='success'){
		            		notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Loan `Disbursement` update and customer send a emails successfully.</p>','success');
		            		 setTimeout(function() {                
				          		location.reload();
			        		}, 2000);
		            	}else{
		            		notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>some error occurred! Unabel to send a mail.</p>','error');
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
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('table-example'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    // tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    // tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    // tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"weeklyreport.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
$(window).load(function(){
    // alert('table');
		var table = $('#table-example').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			"oLanguage": {
			  "sSearch": "<span>RECHERCHER:</span> _INPUT_", //search
			 // "sLengthMenu": "AFFICHAGE _MENU_ ENREGISTREMENTS",
			}
		});		
		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});	
});

	$('#loan_schedule').change(function() {	    
	    var $option = $(this).find('option:selected');	    
	    var value = $option.val();//to get content of "value" attrib
	    var text = $option.text();//to get <option>Text</option> content
	    $('.addsch').html(text);

	});
	</script>

</body>
</html>