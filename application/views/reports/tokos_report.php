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

 dt-button-collection {
    max-height: 100px;
    overflow-y: scroll;
}
body .dataTables_wrapper .dataTables_paginate .paginate_button.current, body .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    /* background: red !important; */
    background: #009136 !important;
    border-color: #009136 !important;
    color: #fff !important;
    border-width:2px;
}
body .dataTables_wrapper .dataTables_paginate .paginate_button {
 position: relative;
    float: left;
    padding: 6px 12px !important;
    /* margin-left: -1px; */
    border-width: 2px !important;
    margin-left: -2px !important;
    line-height: 1.42857143;
    color: #009136 !important;
    text-decoration: none;
    background-color: #fff;
    border: 2px solid #ddd !important;
    
}
#table-example_paginate {
    margin: 5px 0;
}
div.dt-buttons {
    position: relative;
    float: left;
   min-height: 75px;
}
body .dataTables_wrapper .dataTables_paginate .paginate_button:hover{
    background: #eee !important;
    border-color: #ddd !important;
     color: #009136 !important;
}
a#table-example_previous{
    color: transparent !important;
}
.previous{
    
       width: 38px;
    height: 36px
}
.previous:before {
   font-family: "FontAwesome";
   content: "\f053";
   display: inline-block;
   padding-right: 3px;
   vertical-align: middle;
   font-weight: 900;
   color: #009136;
    visibility: initial;
}
a#table-example_next{
    color: transparent !important;
}
.next{
    
        width: 38px;
    height: 36px
}
.next:before {
   font-family: "FontAwesome";
   content: "\f054";
   display: inline-block;
   padding-right: 3px;
   vertical-align: middle;
   font-weight: 900;
   color: #009136;
    visibility: initial;
}
button.dt-button.buttons-excel.buttons-html5 {
    color: #000;
    background: #f9f9f9 !important;
    border-color: #f9f9f9 !important;
    box-shadow: 0px 0px 2px 1px #ccc;
    border: none !important;
    padding: 6px 12px;
    border-bottom: 2px solid;
    transition: border-color 0.1s ease-in-out 0s,background-color 0.1s ease-in-out 0s;
    outline: none;
    border-radius: 15px;
    background-clip: padding-box;
    margin: 20px 0px 0px 25px;
}
button.dt-button.buttons-collection.buttons-colvis{
      color: #000;
    background: #f9f9f9 !important;
    border-color: #f9f9f9 !important;
    box-shadow: 0px 0px 2px 1px #ccc;
    border: none !important;
    padding: 6px 12px;
    border-bottom: 2px solid;
    transition: border-color 0.1s ease-in-out 0s,background-color 0.1s ease-in-out 0s;
    outline: none;
    border-radius: 15px;
    background-clip: padding-box;
        margin: 20px 0px 0px 25px;
}
button.dt-button.buttons-collection.buttons-colvis:after{
content:"Vue par Colonne";
color:#000;
}

button.dt-button.buttons-collection.buttons-colvis>span{display:none}
button.dt-button.buttons-collection.buttons-colvis:hover:after{
color:#fff;
}
button.dt-button:hover:not(.disabled), div.dt-button:hover:not(.disabled), a.dt-button:hover:not(.disabled), input.dt-button:hover:not(.disabled){
    border:transparent !important;
}
button.dt-button.buttons-excel.buttons-html5:hover{
    background-color: #009136 !important;
    border-color: #009136 !important;
    color:#fff!important;
}
button.dt-button.buttons-collection.buttons-colvis:hover{
    background-color: #009136 !important;
    border-color: #009136 !important;
    color:#fff!important;
}
input[type="search"] {

        border-radius: 3px !important;
    background-clip: padding-box !important;
    border-color: #e7ebee !important;
    border-width: 2px !important;
    box-shadow: none !important;
    font-size: 12px !important;
}

</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.1.7/css/fixedHeader.dataTables.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">

<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">

			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">Tableau de bord</a></li>
						<li class="active"><span>All Applications</span></li>
						<?php //print_r($this->session->username);?>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
			
				<div class="row" style="margin-top:10px;">					
					<div class="col-lg-12">
						

						<div class="main-box clearfix">

							
							<header class="main-box-header clearfix">	
							     <div class="col-md-12">
							     	<form action ="<?php echo base_url("Reports/tokos_report")?>" method="POST">
										<div class="form-group">
											<div class="col-md-3">
											    <?php // 
												$date= date('d-m-Y');
												$date2= date('d-m-Y', strtotime('-1 day', strtotime($date)));?>
												<label>Début de Période</label>
												<input type="text" id="start_date" value="<?php  echo ($_POST['start_date']) ? ($_POST['start_date']) : ($date2) ;?>" name="start_date" class="form-control" autocomplete="off">
											</div>

											<div class="col-md-3">	
											
												<label>Fin de Période</label>
												<input type="text" id="end_date" name="end_date" value="<?php echo ($_POST['end_date']) ? ($_POST['end_date']) : ($date);?>" class="form-control" autocomplete="off">
											</div>

											<?php //if($this->session->userdata('role') != "2"){?>

											<!-- <div class="col-md-3">	
											
												<label>Exploitant/Placeur</label>
												<input list="account_manager_list" name="acc_manager" id="acc_manager" class="form-control" value="<?php echo $_POST['acc_manager'];?>" autocomplete="off">
													<datalist id="account_manager_list">
													<?php 
													foreach($all_account_managers as $user){?>
												    <option  data-value="<?php echo $user['id']?>"><?php echo ucwords($user['user_name']);?></option>
													<?php }?>
												   
												  </datalist>

											  	<input type="hidden" name="account_manager_id" id="account_manager_id" value="<?php echo $_POST['account_manager_id'];?>">

											</div> -->

											<?php // } ?>


											<?php //if($this->session->userdata('role') != "2" && $this->session->userdata('role') != "3") {?>
											<!-- <div class="col-md-3">	
											
												<label>Agence</label>
												<input list="agence_list" name="branch" id="branch" class="form-control" value="<?php echo $_POST['branch'];?>" autocomplete="off">
												<datalist id="agence_list">
												<?php foreach($all_branch as $data){?>
											    <option  data-value="<?php echo $data['bid']?>"><?php echo $data['branch_name'];?></option>
												<?php } ?>
											   
											  </datalist>

											  <input type="hidden" name="agence_id" id="agence_id" value="<?php echo $_POST['agence_id'];?>">
											</div> -->

											 <?php // } ?>
											
										</div>

										<button type="submit" class="btn btn-primary pull-right" style="margin-top:20px;">Sélectionner</button>
									</form>
								</div>	
								
							</header>
							<div class="main-box-body clearfix">

								<div class="table-responsive">
								   
									<table id="table-example" class="table table-hover table-striped">
										<thead>
											<tr>
											    <th style="display:none;">S.no</th>
											    <th>Type De Prét</th>
												<th>Numéro Prêt Digital Crédit</th>
												<th>Référence de l'Emprunteur</th>
												<th>Catégorie de Prêts</th>
												<th>Nominal du Prêt</th>
												<th>Durée</th>
												<th>Date d'Accord</th>
												<th>Date de Réalisation</th>
												<th>Date Première Échéance</th>
												<th>Date Naissance Emprunteur</th>
												<th>Numéro Compte Emprunteur</th>
												<th>Numéro Compte Destinataire</th>
												<th>Taux Intérêt Fixe</th>
												<th>Périodicité des Amortissements</th>
												<th>Barême de l'Assurance</th>
												<th>Code Décisionnaire</th>
												
												<th>Montant Garanti</th>
												<th>Référence de la Garantie</th>
												<th>Type de Garantie</th>
												
											</tr>
										</thead>
										<tbody id="getrecord">
											<?php
								// 			print_r($loan_details);
								// 			die;
											foreach($loan_details as $ld){
												$customer_data =  json_decode($ld['customer_data']);

												$reference_numero = substr($customer_data->account_no, 0, 11);

												$age= date_diff(date_create($customer_data->dob), date_create('today'))->y;

												if($age < 30) 
									                $bareme = "38";
									            else if($age >=30 && $age <=40)
									                $bareme = "39";
									            else if($age >=41 && $age <=50)
									                $bareme = "40";
									            else if($age >=51 && $age <=60)
									                $bareme = "41";
									            else
									                $bareme = "0";


									            if($ld['loan_type'] == "credit_conso")
												{
													$loan_type = "FETES A LA CARTE";
													$type1 = "CARTEFETE";
												}
												else if($ld['loan_type'] == "credit_confort")
												{
													$loan_type = "CREDIT CONFORT";
													$type1 = "CRCONFSG";
												}else{
												    $loan_type = "CONGES A LA CARTE";
													$type1 = "CONGCARTE";
												}

												 // $this->db->order_by('workflow_order','desc');
	           	// 								 $d_accord_data =  $this->db->get_where('tbl_all_applications',array('loan_id'=>$loan_id,'review'=>'1','loan_type'=>$ld['loan_type'],'assigned_roles !='=>'12'))->row_array();

												?>
												<tr id="rowid<?php echo $ld['loan_id'];?>">
												    <td style="display:none;"></td>
												    <td><?php echo $loan_type; ?></td>
													<td><?php echo $ld['application_no'];?></td>
													<td><?php echo $reference_numero;?></td>
													<td><?php echo $type1;?></td>
													<td><?php echo $ld['loan_amt'];?></td>
													<td><?php echo $ld['loan_term'] <= 9?'0'.$ld['loan_term']:$ld['loan_term'];?></td>
													<td><?php if($ld['final_disburse_date']) echo date("Ymd", strtotime($ld['final_disburse_date']));?></td>
													<td><?php echo date("Ymd", strtotime($ld['created_at']));?></td>
													<td><?php
                                    // echo $customer->cat_emp_id;
                                    if(!empty($ld['databinding'])){
              $databinding=json_decode($ld['databinding']);}
                                        if(($customer_data->cat_emp_id=='9') || ($customer_data->cat_emp_id=='10')){
                                            $loandate='25';
                                        }else if($customer_data->cat_emp_id=='8'){
                                            $loandate='29';
                                        }else{
                                            $loandate='20';
                                        }
                                        echo $databinding[0]->years.$databinding[0]->month.$loandate ?></td>
													<td><?php if($customer_data->dob) echo date("Ymd", strtotime($customer_data->dob));?></td>
													<td><?php echo $customer_data->account_no;?></td>
													<td><?php echo $customer_data->account_no;?></td>
													<td><?php echo $ld['loan_interest'];?></td>
													<td><?php echo "M";?></td>
													<td><?php echo $bareme;?></td>
													<td><?php echo "0011";?></td>
													
													<td></td>
													<td></td>
													<td></td>
													
												</tr>
											<?php } ?>
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

	<!-- ================== -->
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

<script src="<?php echo  base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/daterangepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.timepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/project_view_js/general_js.js"></script>

<!-- <script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script> -->

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script>



 <script>
// $( ".paging_simple_numbers" ).click(function() {
// $( "#table-example_paginate" ).find( "#table-example_previous" ).remove();
// $( ".next " ).remove();
// alert("hello")

// });
</script>
  

<script>
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

$(document).ready(function() {

   if(document.getElementById('acc_manager'))
   {
   	 document.querySelector('#acc_manager').addEventListener('input', function(e) {
	    var input = e.target,
	        list = input.getAttribute('list'),
	        options = document.querySelectorAll('#' + list + ' option'),
	        hiddenInput = document.getElementById('account_manager_id'),
	        inputValue = input.value;

	    hiddenInput.value = inputValue;

	    for(var i = 0; i < options.length; i++) {
	        var option = options[i];

	        if(option.innerText === inputValue) {
	            hiddenInput.value = option.getAttribute('data-value');
	            break;
	        }
	        else{
	        	 hiddenInput.value = "";
	        }
	    }

	    //alert(hiddenInput.value);
	});
   }


   if(document.getElementById('branch'))
   {
   	  document.querySelector('#branch').addEventListener('input', function(e) {
	    var input = e.target,
	        list = input.getAttribute('list'),
	        options = document.querySelectorAll('#' + list + ' option'),
	        hiddenInput = document.getElementById('agence_id'),
	        inputValue = input.value;

	    hiddenInput.value = inputValue;

	    for(var i = 0; i < options.length; i++) {
	        var option = options[i];

	        if(option.innerText === inputValue) {
	            hiddenInput.value = option.getAttribute('data-value');
	            break;
	        }
	        else{
	        	 hiddenInput.value = "";
	        }
	    }

	    //alert(hiddenInput.value);
	});
   }
	

});

</script>

<script type="text/javascript">
	
</script>

<script>

	$(document).ready(function() {
     var table =  $('#table-example').DataTable( {
        dom: 'Bfrtip',
        fixedHeader: true,
        oLanguage: {
			  "sSearch": "<span>Recherche:</span> _INPUT_", //search
			  
			},
        buttons: [
            // {
            //     extend: 'copyHtml5',
            //     exportOptions: {
            //         columns: [ 0, ':visible' ]
            //     }
            // },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },

            // {
            //     extend: 'pdfHtml5',
            //     exportOptions: {
            //         columns: ':visible'
            //     }
            // },
            'colvis'
        ]
    } );


		// table.column( 4 ).visible( false );
		// table.column( 5 ).visible( false );
		// table.column( 6 ).visible( false );
		// table.column( 7 ).visible( false );


} );
	// $(document).ready(function() {		
	// 	var table = $('#table-example').dataTable({
	// 		'info': false,
	// 		'sDom': 'lTfr<"clearfix">tip',
	// 		"oLanguage": {
	// 		  "sSearch": "<span>RECHERCHER:</span> _INPUT_", //search
	// 		  "sLengthMenu": "AFFICHAGE _MENU_ ENREGISTREMENTS",
	// 		},
	// 		"oTableTools": {
 //            "aButtons": [
 //               "csv", "xls", "pdf"
 //            ]
 //        }

			// 'oTableTools': {
	  //           'aButtons': [
	  //               {
	  //                   'sExtends':    'collection',
	  //                   'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
	  //                   'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
	  //               }
	  //           ]
	  //       },
	               
	//	});
		
	 //    var tt = new $.fn.dataTable.TableTools( table );
		// $( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');


	
		
	
	//});



	$('#loan_schedule').change(function() {	    
	    var $option = $(this).find('option:selected');	    
	    var value = $option.val();//to get content of "value" attrib
	    var text = $option.text();//to get <option>Text</option> content
	    $('.addsch').html(text);

	});

	
	</script>

</body>
</html>