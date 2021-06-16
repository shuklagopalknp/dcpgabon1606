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
.help-block{
	color: #dd191d;
}
.searchFor {
    display: flex;
    position: relative;
    margin: 10px 0px;
}

.searchFor input#searchUser {
    width: 100%;
    border-radius: 50px;
    height: 40px;
}

.searchFor button.btn.btn-primary.pull-right {
    margin: 0 !important;
    position: absolute;
    top: 3px;
    right: 0;
}
</style>
<link rel="stylesheet" href="<?php echo base_url()."assets/intl-tel-input-master/css/prism.css" ?>">
<link rel="stylesheet" href="<?php echo base_url()."assets/intl-tel-input-master/build/css/intlTelInput.css"?>" >
<link rel="stylesheet" href="<?php echo base_url()."assets/intl-tel-input-master/examples/css/isValidNumber.css"?>">
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div id="content-header" class="clearfix">
						<div class="pull-left">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
								<li><a href="<?php echo base_url('Customer');?>">CUSTOMER</a></li>
								<?php //print_r($this->session)?>
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
					    
						<div class="row">
							<div class="col-lg-12">
							   
								<div class="main-box clearfix">
									<div class="main-box-body clearfix" style="margin-top:0px;">
										<div class="row">
											<div class="col-md-12">
												<div class="col-md-4">
												<form action ="<?php echo base_url("Customer")?>" method="POST">
													    <div class="searchFor">
													    <input type="text" id="searchUser" name="searchUser" value="<?php echo ($_POST['searchUser']) ? ($_POST['searchUser']) : "";?>" class="form-control" autocomplete="off" minlength="3" title="3 characters minimum">
													    <button type="submit" class="btn btn-primary pull-right" style="margin-top:20px;">Rechercher Un Client</button>
													    </div>
													    </form>	
												</div>
												<div class="col-md-4">
													
												</div>

												<div class="col-md-4">
													<div class="form-group pull-right" style="margin-top:10px;">
														<div class="input-group" style="width:100%">
															<a href="javascript:void(0);" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" style="margin:5px"> <i class="fa fa-plus-circle fa-lg"></i> Import Customer</a>
															<a  class="btn btn-primary  openBtn"  data-toggle="modal" data-target="#AddCustomerModal"> <i class="fa fa-plus-circle fa-lg"></i> Ajouter Un Client</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<div class="table-responsive">
												<table id="table-example" class="table table-hover table-striped">
													<thead>
														<tr>
															<th>Id</th>
															<th>Nom Et Prenoms Client</th>
															<th>Type De Compte</th>
															<th>Numero De Compte</th>
															<th>Date De Naissance</th>
															<th>Adresse</th>
															<th>Numero De Telephone</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody id="callsearch">
														<?php 
 														$count =  1;
														foreach ($bankdetails as $key) {
														?>
															<tr id="<?php echo $key['customer_id'];?>">
															<td><?php echo $count++;?></td>
															<td><?php echo $key['first_name'].' '.$key['middle_name'].' '.$key['last_name'];?></td>
															<td><?php echo $key['account_type'];?></td>
															<td><?php echo $key['account_no'];?></td>
															<td><?php echo $key['dob'];?></td>
															<td><?php echo $key['resides_address'];?></td>
															<td><?php echo $key['main_phone'];?></td>
															<td>
																<a href="javascript:void(0);" class="table-link" data-toggle="modal" data-target="#modal_edit" onclick="editcustomermodal('<?php echo $key['customer_id'];?>')">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
																<a href="javascript:void(0);" class="table-link danger delete_class" onclick="delete_customer(<?php echo $key['customer_id']; ?>)">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
													</span>
												</a>
														</td>
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
			</div>
		</div>
	</div>
	
<!--<div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">-->
<!--	  	<div class="modal-dialog modal-small modal-full-height modal-left modal-notify modal-info">	-->
<!--			<div class="modal-content">-->
<!--				<div class="modal-header">-->
<!--					<button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--					<h4 class="modal-title heading lead">Import Individual Customer</h4>-->
<!--				</div>-->
<!--			  <form action="<?=base_url('Customer/import_individual_customer')?>" method="POST" enctype="multipart/form-data">-->
<!--					<div class="modal-body">   -->
<!--						<div class="error-msg"></div>    -->
<!--						  	<div class="form-group">-->
<!--		                      <label>Select File <span style="color:red">*</span></label>-->
<!--								<input type="file" class="form-control addvalidate" id="import_customerfile" name="import_customerfile" autocomplete="off"  required="required" />-->

								
<!--		                    </div>-->

<!--		                   <a href="http://myprojectdemonstration.com/development1/dcp_loan/assets/sample_customer_csv.csv" download>-->
<!--		                    <button  type="button" class="btn btn-primary waves-effect waves-light submitBtn" style="margin-top: 2%"><i class="fa fa-download fa-lg"></i>  Download Sample File</button>-->
<!--		                	</a>-->
		                    
						
							       
<!--				  </div>-->

<!--				  	<div class="modal-footer justify-content-center">-->
				  		
<!--					  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn"><img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> SOUMETTRE</button>-->
<!--					  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">FERMER</button>-->
<!--						</div>-->
<!--				</form>-->
<!--			</div>-->
<!--		</div>-->
<!--	</div>-->

<?php echo $addForm; ?>

<div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	  	<div class="modal-dialog modal-small modal-full-height modal-left modal-notify modal-info">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title heading lead">Import Customer</h4>
				</div>
			  <form action="<?=base_url('Customer/import_individual_customer')?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">   
						<div class="error-msg"></div>    
						  	<div class="form-group">
		                      <label>Select File <span style="color:red">*</span></label>
								<input type="file" class="form-control addvalidate" id="import_customerfile" name="import_customerfile" autocomplete="off"  required="required" />

								
		                    </div>

		                   
		                   <a href="<?php echo base_url('assets/Sample_File.txt')?>" download> <button type="button" class="btn btn-primary waves-effect waves-light submitBtn" style="margin-top: 2%"><i class="fa fa-download fa-lg"></i>  Download Sample File</button></a>
		                    
						
							       
				  </div>

				  	<div class="modal-footer justify-content-center">
				  		
					  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn"><img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> SOUMETTRE</button>
					  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">FERMER</button>
						</div>
				</form>
			</div>
		</div>
	</div>

<!-- <div id="EditCustomerModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  	<div class="modal-dialog modal-full-height modal-left modal-notify modal-info">	
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title heading lead">Add Customer</h4>
			</div>
			<div class="modal-content showcustomercontent">
				
			</div>
		 
		</div>
	</div>
</div> -->

 
<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  

 <!--<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script> -->
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
<script src="<?php echo  base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/daterangepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.timepicker.js"></script>


<script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/build/js/intlTelInput.js?1585994360633"></script> 
<script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/build/js/utils.js?1585994360633"></script> 
<script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/examples/js/isValidNumber.js.ejs?1585994360633"></script>
<script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/examples/js/displayNumber.js.ejs?1585994360633"></script>
<script type="text/javascript">
  var base_url = "<?php echo base_url();?>";
</script>

<script src="<?php echo  base_url(); ?>assets/js/project_view_js/general_js.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/project_view_js/countrycodephoneno_js.js"></script>



<script type="text/javascript">
function Ribfetch(id,value){
    
         
        var value = value.value;  
        if (id == '1'){
             $("#rib1").val(value);
        }else if(id == '2'){
            $("#rib2").val(value);
        }else if(id == '3'){
            $("#rib3").val(value);
        }else if(id == '4'){
            $("#rib4").val(value);
        }else if(id == '5'){
            
            $("#rib5").val(value);
        }
       
        
    }
 function disableEmployer(id){
        var value = id.value;  
        
        if (value == 'Retraité'){
            $("#emp_name").prop('disabled', true);
            $("#secteurs_id").prop('disabled', true);
            $("#cat_employeurs").prop('disabled', true);
            $("#typeofcontract").prop('disabled', true);
            $("#address_employer").prop('disabled', true);
            $("#employment_date").prop('disabled', true);
            $("#edn_date_contract_cdd").prop('disabled', true);
            $("#years_professionel_experience").prop('disabled', true);
            $("#current_emp").prop('disabled', true);
            $("#net_salary").prop('disabled', true);
            $("#retirement_age_expected").prop('disabled', true);
            $("#employeeOccupation").prop('disabled', true);
            $("#employeePosition").prop('disabled', true);
            
        }else{
            $("#emp_name").prop('disabled', false);
            $("#secteurs_id").prop('disabled', false);
            $("#cat_employeurs").prop('disabled', false);
            $("#typeofcontract").prop('disabled', false);
            $("#address_employer").prop('disabled', false);
            $("#employment_date").prop('disabled', false);
            $("#edn_date_contract_cdd").prop('disabled', false);
            $("#years_professionel_experience").prop('disabled', false);
            $("#current_emp").prop('disabled', false);
            $("#net_salary").prop('disabled', false);
            $("#retirement_age_expected").prop('disabled', false);
            $("#employeeOccupation").prop('disabled', false);
            $("#employeePosition").prop('disabled', false);
        }
        // console.log (id);
        
    }
        function disableexpirationdate(id){
            var value = id.value;  
        
        if (value == 'Recepisse de CNI'){
            
            $("#expiration_date").prop('disabled', true);

            
        }else{
            $("#expiration_date").prop('disabled', false);
           
        }
        }
    
        function changeGender(id){
        var value = id.value;  
        // alert (value);
        if (value == 'M.'){
            // $("#emp_name").prop('disabled', true);
            $('#gender option[value=Male]').attr('selected','selected');
            // $("#gender select").val("Male");
            
        }else{
            $('#gender option[value=Female]').attr('selected','selected');
            // $("#gender select").val("Female");
        }
        // console.log (id);
        
    }
    

    function fetchbranchDetail(id,id2){
        if(!id){
            var value = id2;
        }else{
        var value = id.value;  
        }	
	   //alert(value);
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Customer/fetchBranchdetail',
				data:	{id:value},
				cache: false,
				success: function(resp) {
				     var result = JSON.parse(resp);
				     console.log(result);
            //   alert(result['contact_no']);
                var branch=result['branch_name'];
              $("#bank_phone").val(result['contact_no']);
              $("#code_agence").val(result['code_agence']);
            //   $('#bank_name option[value='+branch+']').attr('selected','selected');
             

            //   $("#secteurs_value").val(result['secteur_id']);

            //   // $("#cat_employeurs").val(result['category_id']);
            //   // $("#cat_employeurs").attr("disabled","disabled");

            //   $("#cat_emp_value").val(result['category_id']);
					
					
				// 	location.reload();
					
						
					}
			});
		
        // alert (value);
    }
	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

	function istelNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    console.log(charCode);
    if(charCode == 40 || charCode == 41 || charCode == 43 || charCode == 45)
    {
    	return true;
    }
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    
    return true;
}
	

	function format1(inputDate) {
	    if(inputDate){
	    dte = inputDate;
	        dteSplit = dte.split("-");
	        console.log(dteSplit);
            yr = dteSplit[0]; //special yr format, take last 2 digits
            month = dteSplit[1];
            day = dteSplit[2];
            
           return day+"-"+month+"-"+yr ;
	    }else{
	        return "";
	    }
	   // alert(inputDate);
    //   var date = new Date(inputDate);
    //   if (!isNaN(date.getTime())) {
    //      // Months use 0 index.
    //      var d,m,y;
    //      if((date.getDate()) <= 9)
    //      {
    //      	d="0"+date.getDate();
    //      }
    //      else
    //      {
    //      	d=date.getDate();
    //      }
    //      if((date.getMonth()) <= 8)
    //      {
    //      	m="0"+(date.getMonth()+1);
    //      }
    //      else
    //      {
    //      	m=date.getMonth()+1;
    //      }
      
    //     	return d + '-' + m + '-' + date.getFullYear();
         
    //   }
    }

function set_date_end_for_CDD(){
 
     var type_de_cont =  $(".typeofcontract_c").val();

     if(type_de_cont == "2" || type_de_cont == "")
     {
       $(".edn_date_contract_cdd").val("");
    //   $(".edn_date_contract_cdd").attr("disabled","disabled");
      
     }
     else
     {
    //   $(".edn_date_contract_cdd").removeAttr("disabled");
     }
     
   }
   

    // Show Employer List and data

 function show_emplist(element)
    {
      
      var emp_data =  $("#"+element.id).val();

     var data_val = $('#employers [value="' + emp_data + '"]').data('value');
        $('#emp_name').val(data_val) ;

      if($("#emp_name").val())
      {
        $.ajax({
           type:"POST",
           url: "<?php echo base_url('Employeurs/edit_employer')?>",
           data : {emp_id : $("#emp_name").val() },
           success:function(resp){

            if(resp)
            {
              var result = JSON.parse(resp);
              //console.log(result);
              $("#secteurs").val(result['secteur_id']);
              $("#secteurs").attr("disabled","disabled");

              $("#secteurs_value").val(result['secteur_id']);

              // $("#cat_employeurs").val(result['category_id']);
              // $("#cat_employeurs").attr("disabled","disabled");

              $("#cat_emp_value").val(result['category_id']);
            }
            else{
              $("#"+element.id).val('');
              // $("#cat_employeurs").removeAttr("disabled");
              $("#secteurs").removeAttr("disabled");
            }
           }
        });
      }
      else
      {
        alert("Please select employers");
        $("#"+element.id).val('');
        // $("#cat_employeurs").removeAttr("disabled");
        $("#secteurs").removeAttr("disabled");
      }
    }


	function editcustomermodal(id,param)	{

	$(".help-block").css("display","none");

	$(".form-group").removeClass("has-error");

	$("#addnewcustomer")[0].reset();
	 $("#AddCustomerModal").modal('show');

	$('#phone2').prev().first().children().children().first().removeClass();
	$('#phone_alt2').prev().first().children().children().first().removeClass();
	$('#bank_phone').prev().first().children().children().first().removeClass();
	$('#phone2').prev().first().children().children().first().addClass('iti__flag iti__cm');
	$('#phone_alt2').prev().first().children().children().first().addClass('iti__flag iti__cm');
	$('#bank_phone').prev().first().children().children().first().addClass('iti__flag iti__cm');
	
	 $.ajax({
	 	type: "POST",
	 	url:'<?php echo base_url("Customer/edit_customer");?>',
	 	data:{id:id},
	 	beforeSend: function(){
	 		$('#collateral_previewv-'+id).css("opacity","0.5");
	 	},
	 	success: function(resp)
	 	{
	 		console.log(resp);
	 		result  =  JSON.parse(resp);		
	 		//alert();
	 		$("#edit_id").val(result[0]['customer_id']);
	 		$("#first_name").val(result[0]['first_name']);
	 		$("#middle_name").val(result[0]['middle_name']);
	 		$("#last_name").val(result[0]['last_name']);
	 		$("#gender").val(result[0]['gender']);
	 		$("#dob").val(format1(result[0]['dob']));
	 		$("#education").val(result[0]['education']);
	 		$("#marital_status").val(result[0]['marital_status']);
	 		$("#email").val(result[0]['email']);
	 		$("#typeofid").val(result[0]['type_id']);
	 		$("#monthly_income").val(result[0]['monthly_income']);
	 		$("#monthly_expenses").val(result[0]['monthly_expenses']);
	 		$("#id_number").val(result[0]['id_number']);
	 		$("#state_of_issue").val(result[0]['state_of_issue']);
	 		$("#occupation").val(result[0]['occupation']);
	 		$("#main_phone").val(result[0]['main_phone']);

	 		
	 		$("#alter_phone").val(result[0]['alternative_phone']);

	 		if(result[0]['alternativeph_countrycode'])
	 		{
		 		
		 		$("#item_3").val(result[0]['alternativeph_countrycode']);
		 		$("#phone_alt2").prev().find(".iti__selected-flag").attr('aria-activedescendant','iti-3__item-'+result[0]['alternativeph_countrycode']);
		 		$('#phone_alt2').prev().first().children().eq(0).children().removeClass('iti__cm');
		 		$('#phone_alt2').prev().first().children().eq(0).children().addClass('iti__'+result[0]['alternativeph_countrycode']);
	 		}

	 		
	 		$("#expiration_date").val(format1(result[0]['expiration_date_id']));
	 		$("#room_type").val(format1(result[0]['room_type']));
	 		$("#father_fullname").val(result[0]['father_fullname']);
	 		$("#mother_fullname").val(result[0]['mother_fullname']);

	 		$("#emp_name").val(result[0]['employer_name']);

	 		$("#employers option").each(function(index,options){

	 			$("#emp_name_datalist").val($('#employers [data-value="' + $("#emp_name").val() + '"]').val());
	 		});


	 		$("#nationality").val(result[0]['nationality']);

	 		$("#insurance_place_id").val(result[0]['insurance_place_id']);

	 		$("#secteurs_id").val(result[0]['secteurs_id']);
	 		$("#secteurs_value").val(result[0]['secteurs_id']);
	 		$("#cat_employeurs").val(result[0]['cat_employeurs']);
	 		$("#cat_emp_value").val(result[0]['cat_emp_id']);

	 		$("#typeofcontract").val(result[0]['contract_type_id']);

	 		$("#employment_date").val(format1(result[0]['employment_date']));
	 		$("#edn_date_contract_cdd").val(format1(result[0]['sate_end_contract_cdd']));
	 		

	 		$("#years_professionel_experience").val(result[0]['years_professionel_experience']);
	 		$("#current_emp").val(format1(result[0]['how_he_is_been_with_current_employer']));
			$("#net_salary").val(result[0]['emp_net_salary']);
	 		$("#retirement_age_expected").val(result[0]['retirement_age_expected']);
			$("#resides_address").val(result[0]['resides_address']);
	 		$("#street").val(result[0]['street']);
			$("#city").val(result[0]['city_id']);
	 		$("#state").val(result[0]['state_id']);
	 		$("#account_type").val(result[0]['account_type']);
			$("#accoumt_number").val(result[0]['account_no']);
			$("#bank_name").val(result[0]['bank_name']);
	 		$("#bank_phone").val(result[0]['bank_phone']);
	 		

	 		if(result[0]['bankphone_countrycode'])
	 		{
		 		
		 		$("#item_4").val(result[0]['bankphone_countrycode']);
		 		$("#bank_phone").prev().find(".iti__selected-flag").attr('aria-activedescendant','iti-4__item-'+result[0]['bankphone_countrycode']);
		 		$('#bank_phone').prev().first().children().eq(0).children().removeClass('iti__cm');
		 		$('#bank_phone').prev().first().children().eq(0).children().addClass('iti__'+result[0]['bankphone_countrycode']);
	 		}


	 		$("#opening_date").val(format1(result[0]['opening_date']));
	 		$("#another_test").val(result[0]['information']);
	 		$("#test_field").val(result[0]['field_1']);
	 		$("#test_david").val(result[0]['field_2']);
	 		$("#cc_test").val(result[0]['field_3']);
	 		$("#obj_credit").val(result[0]['object_credit']);
	 		$("#frais_de_dossier").val(result[0]['frais_de_dossier']);


	 		$("#title").val(result[0]['title']);
	 		$("#legalCapacity").val(result[0]['legalCapacity']);
	 		$("#father_firstname").val(result[0]['father_firstname']);
	 		$("#mother_firstname").val(result[0]['mother_firstname']);
	 		$("#employeeStatus").val(result[0]['employeeStatus']);
	 		$("#address_employer").val(result[0]['address_employer']);

	 		$("#employeeOccupation").val(result[0]['employeeOccupation']);
	 		$("#employeePosition").val(result[0]['employeePosition']);
	 		$("#ibu").val(result[0]['ibu']);
	 		$("#carte_bancaire").val(result[0]['carte_bancaire']);
	 		$("#code_agence").val(result[0]['code_agence']);
	 		$("#nature_relation").val(result[0]['nature_relation']);
	 		$("#cat_client").val(result[0]['cat_client']);
	 		$("#segmentation").val(result[0]['segmentation']);
	 		$("#risk_level").val(result[0]['risk_level']);
	 		$("#risk_level_date").val(format1(result[0]['risk_level_date']));
	 		$("#special_observation").val(result[0]['special_observation']);
	 		
	 		
	 		$("#dossierkyc").val(result[0]['dossierkyc']);
	 		$("#prochaineRevision").val(format1(result[0]['prochaineRevision']));
	 		$("#authCode").val(result[0]['authCode']);
	 		$("#authDate").val(format1(result[0]['authDate']));
	 		
	 		$("#alternateAddress").val(result[0]['alternateAddress']);
	 		$("#nomGestionnaire").val(result[0]['nomGestionnaire']);
	 		$("#codeGestionnaire").val(result[0]['codeGestionnaire']);
	 		$("#etatAutorisation").val(result[0]['etatAutorisation']);
	 		
	 		$("#main_phone2").val(result[0]['main_phone2']);
	 		$("#alter_phone2").val(result[0]['alter_phone2']);
	 		$("#Surveillance").val(result[0]['Surveillance']);
	 		$("#Deces").val(result[0]['Deces']);
	 		$("#Contexntieux").val(result[0]['Contexntieux']);
	 		$("#Interdit").val(result[0]['Interdit']);
	 		$("#pep").val(result[0]['pep']);
	 		$("#niveiu").val(result[0]['niveiu']);
	 		$("#datedernier").val(format1(result[0]['datedernier']));
	 		$("#typeDeClientele").val(result[0]['typeDeClientele']);
	 		$("#ancianemployer").val(result[0]['ancianemployer']);
	 		$("#numero1").val(result[0]['numero1']);
	 		$("#numero2").val(result[0]['numero2']);
	 		$("#categ").val(result[0]['categ']);
	 		
	 		$("#code_bqe").val(result[0]['code_bqe']);
	 		$("#devise").val(result[0]['devise']);
	 		$("#rib1").val(result[0]['rib1']);
	 		$("#rib2").val(result[0]['rib2']);
	 		$("#rib3").val(result[0]['rib3']);
	 		$("#rib4").val(result[0]['rib4']);
	 		$("#dateId").val(format1(result[0]['dateId']));
	 		$("#birthplace").val(result[0]['birthplace']);
	 		
	 		if(param == "view")
	 		{
	 			$(".form-control").attr("disabled","disabled");
	 			$(".submitBtn").hide();
	 		}
	 		else
	 		{
	 			$(".form-control").removeAttr("disabled");
	 			$(".submitBtn").show();
	 		}
	 		
	 		$('#collateral_previewv-'+id).css("opacity","1");
	 		
	 	}
   	});
}

</script>
<script type="text/javascript">

	$.validator.addMethod(
        "nameregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid name containing alphabets only"
);

	$.validator.addMethod(
        "digitregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid number containing digits only"
	);

	$.validator.addMethod(
        "mobileregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter phone number with proper format"
	);

	$.validator.addMethod(
        "dateregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid date with format dd-mm-yyyy"
	);

		$("#addnewcustomer").validate({
		errorClass: 'has-error',
		rules: {				
// 			 first_name: {
// 				// required: true,
// 				rangelength:[1,40],
				
// 			 },	
// 			 middle_name:{
// 			 	rangelength:[1,20],
// 			 //	nameregex:/^[a-zA-Z]*$/
// 			},
// 			last_name:{
// 				rangelength:[1,20],
// 			 //	nameregex:/^[a-zA-Z]*$/
// 			 },
// 			  loan_interest: {
// 				// required: true,
// 			 },
// 			 id_number:{
// 			 //	required: true,
// 			 },
// 			 main_phone:{
// 			 	mobileregex : /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/

// 			 },
// 			 alter_phone:{
// 			 	mobileregex : /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/
// 			 },
// 			 father_fullname:{
// 			 //	required: true,
// 				rangelength:[4,20],
// 				// nameregex:/^([a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]{1,}|[a-zA-Z]+\s{1}[a-zA-Z]{3,}\s{1}[a-zA-Z]{1,})$/
// 			},
// 			mother_fullname:{
// 				required: true,
// 				rangelength:[4,20],
// 				// nameregex:/^([a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]{1,}|[a-zA-Z]+\s{1}[a-zA-Z]{3,}\s{1}[a-zA-Z]{1,})$/
// 			},
// 			dob:{
// 				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
// 			},
// 			expiration_date :{
// 				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
// 			},
// 			employment_date :{
// 				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
// 			},
// 			edn_date_contract_cdd :{
// 				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
// 			},
// 			current_emp :{
// 				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
// 			},
// 			opening_date :{
// 				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
// 			},
// 			insurance_place_id :{
// 				required : true,
// 				// nameregex : /^[a-zA-Z]*$/
// 			},
// 			nationality_datalist : "required",
// 			accoumt_number:{
// 			 	number:true
// 			 }		
				
		},			
		messages: {
					
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

			setTimeout(function() {  
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("Customer/save_customer");?>',
				data:$(formdata).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#addnewcustomer').css("opacity","0.5");
					$('.outputdata').val("");
					$('.lodergif').css("display","inline");					
				},
				success: function(response) {

					// console.log(response);
					// return false;

					$('.outputdata').val($.trim(response));					
					$('#addnewcustomer').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");					
					if($.trim(response)=="success"){
						$("#addnewcustomer")[0].reset();
						$('.response-msg').html('<div class="alert alert-success"><strong>Success!</strong> Customer saved Successfully.</div>'); 
						setTimeout(function() {                
		                	location.reload();
		                }, 2000);              			           	
                     }else{                     	                     	
                     	$('.response-msg').html('<div class="alert alert-danger"><strong>Error!</strong> Unable to save record.</div>');
                     } 
				},
				error: function(XMLHttpRequest, textStatus, response) { 
					$('#addnewcustomer').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");
					$('.response-msg').html('<div class="alert alert-danger"><strong>'+textStatus+'! </strong>'+response+'</div>').show();				        
			    } 
			}); },2000);
		  }
	});
	</script>


<script>


	

    $(".openBtn").click(function(){
    	$(".help-block").css("display","none");
		$(".form-group").removeClass("has-error");
		$('#phone2').prev().first().children().children().first().removeClass();
	    $('#phone_alt2').prev().first().children().children().first().removeClass();
	    $('#bank_phone').prev().first().children().children().first().removeClass();
    	$('#phone2').prev().first().children().children().first().addClass('iti__flag iti__cm');
    	$('#phone_alt2').prev().first().children().children().first().addClass('iti__flag iti__cm');
    	$('#bank_phone').prev().first().children().children().first().addClass('iti__flag iti__cm');
     	$("#addnewcustomer")[0].reset();
    });



    function delete_customer(id)
	{

	//	alert(id);
		if(confirm("Are you sure you want to delete this Record?")){		
	  
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Customer/delete_customer',
				data:	{id:id},
				cache: false,
				success: function(resp) {
				    
					//alert(resp);
					
					location.reload();
					
						
					}
			});
		}

		
	}


	$(window).load(function(){
		var table = $('#table-example').dataTable({
			'info': false,
			'sDom': 'lTfr<"clearfix">tip',
			'bFilter': false,
			"oLanguage": {
			  "sSearch": "<span>Chercher:</span> _INPUT_", //search
			  "sLengthMenu": "Montrer _MENU_ Entrées <?php echo ($_POST['searchUser']) ? "" : "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <strong> Les 20 dernières recherches </strong>";?> ",
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
	


	


	</script>

	<script type="text/javascript">		

$(document).ready(function () {
    $('#employeeStatus').change(function () {
       alert("test");
          var value =  $("#employeeStatus").val();  
        
        if (value == 'Retraité'){
            $("#emp_name").prop('disabled', true);
            $("#secteurs_id").prop('disabled', true);
            $("#cat_employeurs").prop('disabled', true);
            $("#typeofcontract").prop('disabled', true);
            $("#address_employer").prop('disabled', true);
            $("#employment_date").prop('disabled', true);
            $("#edn_date_contract_cdd").prop('disabled', true);
            $("#years_professionel_experience").prop('disabled', true);
            $("#current_emp").prop('disabled', true);
            $("#net_salary").prop('disabled', true);
            $("#retirement_age_expected").prop('disabled', true);
            $("#employeeOccupation").prop('disabled', true);
            $("#employeePosition").prop('disabled', true);
            
        }else{
             $("#emp_name").prop('disabled', false);
            $("#secteurs_id").prop('disabled', false);
            $("#cat_employeurs").prop('disabled', false);
            $("#typeofcontract").prop('disabled', false);
            $("#address_employer").prop('disabled', false);
            $("#employment_date").prop('disabled', false);
            $("#edn_date_contract_cdd").prop('disabled', false);
            $("#years_professionel_experience").prop('disabled', false);
            $("#current_emp").prop('disabled', false);
            $("#net_salary").prop('disabled', false);
            $("#retirement_age_expected").prop('disabled', false);
            $("#employeeOccupation").prop('disabled', false);
            $("#employeePosition").prop('disabled', false);
        }
        
		
    });
    
// 	$('#edn_date_contract_cdd').change(function () {
// 		var sdt = new Date($("#employment_date").val());
// 		var getval=new Date($(this).val()); 
// 		var difdt = new Date(getval - sdt); 
// 		$("#retirement_age_expected").val(difdt.toISOString().slice(0, 4) - 1970) 
// 		//alert((difdt.toISOString().slice(0, 4) - 1970) + "Y " + (difdt.getMonth()+1) + "M " + difdt.getDate() + "D");
//     });


//     $('#employment_date').change(function () {    	
//     	$('#edn_date_contract_cdd').val('');
//     	$("#retirement_age_expected").val('');
// 	});
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