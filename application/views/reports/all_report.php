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
.dataTables_wrapper .dataTables_paginate .ellipsis {
    padding: 0 1em;
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


#table-example td:first-child{display:none;}
/*span.ellipsis {*/
/*    display: none;*/
/*}*/
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
							     	<form action ="<?php echo base_url()?>Reports/export_report" method="POST" id="sform">
										<div class="form-group">
											<div class="col-md-3">
												<label> Début de Période</label>
												<?php // 
												$date= date('d-m-Y');
												$date2= date('d-m-Y', strtotime('-1 day', strtotime($date)));?>
												<input type="text" id="start_date" value="<?php  echo $date2 ; //echo ($_POST['start_date']) ? ($_POST['start_date']) : ($date2) ;?>" name="start_date" class="form-control" autocomplete="off">
											</div>

											<div class="col-md-3">	
											
												<label>Fin de Période</label>
												<input type="text" id="end_date" name="end_date" value="<?php  echo $date; //echo ($_POST['end_date']) ? ($_POST['end_date']) : ($date);?>" class="form-control" autocomplete="off">
											</div>

											<?php if($this->session->userdata('role') != "2"){?>

											<div class="col-md-3">	
											
												<label>Exploitant/Placeur</label>
												<input list="account_manager_list" name="acc_manager" id="acc_manager" class="form-control" value="<?php echo $_POST['acc_manager'];?>" autocomplete="off">
													<datalist id="account_manager_list">
													<?php 
													foreach($all_account_managers as $user){?>
												    <option  data-value="<?php echo $user['id']?>"><?php echo trim(ucwords($user['user_name']));?></option>
													<?php }?>
												   
												  </datalist>

											  	<input type="hidden" name="account_manager_id" id="account_manager_id" value="<?php echo $_POST['account_manager_id'];?>">

											</div>

											<?php } ?>


											<?php if($this->session->userdata('role') != "2" && $this->session->userdata('role') != "3") {?>
											<!--<div class="col-md-3">	-->
											
											<!--	<label>Agence</label>-->
											<!--	<input list="agence_list" name="branch" id="branch" class="form-control" value="<?php echo $_POST['branch'];?>" autocomplete="off">-->
											<!--	<datalist id="agence_list">-->
											<!--	<?php foreach($all_branch as $data){?>-->
											<!--    <option  data-value="<?php echo $data['bid']?>"><?php echo $data['branch_name'];?></option>-->
											<!--	<?php } ?>-->
											   
											<!--  </datalist>-->

											<!--  <input type="hidden" name="agence_id" id="agence_id" value="<?php echo $_POST['agence_id'];?>">-->
											<!--</div>-->

											 <?php } ?>
											
										</div>

                                        <button type="submit" class="btn btn-primary pull-right excelbtn" style="margin-top:20px;margin-left:20px;">Excel</button>
										<button type="button" class="btn btn-primary pull-right searchbtn" style="margin-top:20px;">Sélectionner</button>
										
										
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
												<th>Numéro Demande</th>
												<th>Numero De Compte</th>
												<th>Groupe Agence</th>
												<th>Agence</th>
												<th>Nom Gestionnaire</th>
												<th>Code Exploitant</th>
												<th>Exploitant Placeur</th>
												<th>Client Agence Bancaire</th>
												<th>Client</th>
												<th>Email Id</th>
												<th>Numero De Telephone</th>
												<th>Date De Naissance</th>
												<th>Adresse</th>
												<th>Type De Compte</th>
												<!-- <th>Date De Dernier Paiement</th> -->
												<th>Date De Demande Prêt</th>
												<th>Montant Du Prêt</th>
												<th>Taux Interet</th>
												<th width="5%">Durée</th>
												<th>Etat Dossier KYC</th>
												
												<th>Expl.Placeur</th>
												<th>Date Validation Expl.Placeur</th>
												
												<th>Dir./Resp. Agence</th>
												<th>Date Validation Dir./Resp. Agence</th>
												
												<th>Ctrl Engag</th>
												<th>Date Validation Ctrl Engag</th>
												
												<th>ADRCP/DRCP</th>
												<th>Date Validation ADRCP/DRCP</th> 
												
												
												<th>AR delegue Credit 1</th>
												<th>Date Validation AR delegue Credit 1</th>
												
												<th>SCO/DR - Délégué Crédit 2</th>
												<th>Date Validation SCO/DR - Délégué Crédit 2</th>
												
												
												
												<th>Deputy Managing Director </th>
												<th>Date Validation Deputy Managing Director </th>
												
												<th> Managing Director</th>
												<th>Date Validation Managing Director</th>
												
												
												
												<th>CSR</th>
												<th>Date Validation CSR</th>
												<th>Duree Demande</th>
												
											</tr>
										</thead>
										<tbody id="getrecord">
										
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!--<script src="<?php echo  base_url(); ?>assets/js/jquery.timepicker.js"></script>-->
<script src="<?php echo  base_url(); ?>assets/js/project_view_js/general_js.js"></script>

<!-- <script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script> -->

<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/fixedheader/3.1.7/js/dataTables.fixedHeader.min.js"></script> -->
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>-->
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>-->
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>

<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script>




  

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

$(".searchbtn").click(function(){
    load_data();
    
});

$(".excelbtn").click(function(){
   
});

function load_data(){
    
      $('#table-example').DataTable().destroy();
       var table =  $('#table-example').DataTable( {
        dom: 'Bfrtip',
        processing: true,
        serverSide: true,
         ajax:{  
                url:"<?php echo base_url().'Reports/fetch_allreport'; ?>",  
                type:"POST",
               data:{'start_date':$("#start_date").val(),'end_date':$("#end_date").val(),'agence_id':$("#agence_id").val(),'account_manager_id':$("#account_manager_id").val()},
                cache:false  
           }, 
        fixedHeader: true,
    	'columnDefs': [ {
        'targets': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39], // column index (start from 0)
        'orderable': false, // set orderable false for selected columns
     }],
        oLanguage: {
			  "sSearch": "<span>Recherche:</span> _INPUT_", //search
			  
			},
        buttons: [
           
            {
                //extend: 'excelHtml5',
                
                // exportOptions: {
                //     columns: ':visible'
                // }
            },
            
            'colvis'
        ]
    } );
    
    $("#table-example_filter").css('display','none');
    $(".dt-buttons>:first-child").hide();
}
	
</script>

<script>

	$(document).ready(function() {
	    
        var table =  $('#table-example').DataTable( {
        dom: 'Bfrtip',
        processing: true,
        serverSide: true,
         ajax:{  
                url:"<?php echo base_url().'Reports/fetch_allreport'; ?>",  
                type:"POST",
               data:{'start_date':$("#start_date").val(),'end_date':$("#end_date").val(),'agence_id':$("#agence_id").val(),'account_manager_id':$("#account_manager_id").val()},
                cache:false  
           }, 
        fixedHeader: true,
        oLanguage: {
			  "sSearch": "<span>Recherche:</span> _INPUT_", //search
			  
			},
		'columnDefs': [ {
        'targets': [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39], // column index (start from 0)
        'orderable': false, // set orderable false for selected columns
     }],
        buttons: [
            // {
            //     extend: 'copyHtml5',
            //     exportOptions: {
            //         columns: [ 0, ':visible' ]
            //     }
            // },
            {
               // extend: 'excelHtml5',
                
                // exportOptions: {
                //     columns: ':visible'
                // }
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
    
    
        $("#table-example_filter").css('display','none');
        $(".dt-buttons>:first-child").hide();


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