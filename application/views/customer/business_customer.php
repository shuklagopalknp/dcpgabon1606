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

.modal-small{
	width: 620px !important;
}

.row{
	margin-bottom: 5px;
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
								<li><a href="<?php echo base_url('Business_Customer');?>">Business Customer</a></li>
								
							</ol>
						</div>
					</div>

					<?php if($this->session->flashdata('flash_message')){?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('flash_message') ; ?></div>
					<?php } ?>

					<?php if($this->session->flashdata('error_message')){?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('error_message') ; ?></div>
					<?php } ?>

					
					<div class="main-box-body clearfix">
						<div class="row">
							<div class="col-lg-12">
								<div class="main-box clearfix">
									<div class="main-box-body clearfix" style="margin-top:0px;">
										<div class="row">
											<div class="col-md-12">
												<div class="response-msg"></div>
												<?php if (in_array('3_1', $this->session->userdata('portal_permission'))){?>
													<div class="form-group pull-right" style="margin-top:10px;">
														
														<div class="input-group" style="width:100%">

															<a href="javascript:void(0);" class="btn btn-primary  openBtn"  data-toggle="modal" data-target="#AddBusinessModal"> <i class="fa fa-plus-circle fa-lg"></i> Ajouter Un Client</a>
														</div>
													</div>
												<?php } ?>
												
											</div>
										</div>
										<div class="col-md-12">
											<div class="table-responsive">
												<table id="table-example" class="table table-hover table-striped">
													<thead>
														<tr>
															<th>Id</th>
															<th>Raison Sociale</th>
															<th>Numéro du compte</th>
															<!-- <th>Agence</th> -->
															<th>Secteurs</th>
															<th>Created At</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody id="callsearch">
														<?php 
 														$count =  1;
														foreach ($business_customer as $row) {
														?>
															<tr id="<?php echo $row['customer_id'];?>">
															<td><?php echo $count++;?></td>
															<td><?php echo $row['company_name'];?></td>
															<td><?php echo $row['account_no'];?></td>
															<!-- <td><?php echo $row['branch'];?></td> -->
															<td><?php echo $row['secteurs'];?></td>
															<td><?php echo $row['created_at'];?></td>
															<td>
																 <?php if (in_array('3_2', $this->session->userdata('portal_permission'))){?>
																<a href="javascript:void(0);" class="table-link" data-toggle="modal" data-target="#modal_edit" onclick="editbusinesscustomermodal('<?php echo $row['customer_id'];?>','')">
																<span class="fa-stack">
																	<i class="fa fa-square fa-stack-2x"></i>
																	<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
																</span>
																</a>
															<?php } else {?>
																<a href="javascript:void(0);" class="table-link" data-toggle="modal" data-target="#modal_edit" onclick="editbusinesscustomermodal('<?php echo $row['customer_id'];?>','view')">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-eye fa-stack-1x fa-inverse"></i>
																	</span>
																</a>
															<?php }?>
															<?php if (in_array('3_4', $this->session->userdata('portal_permission'))){?>
																<a href="javascript:void(0);" class="table-link danger delete_class" onclick="delete_customer(<?php echo $row['customer_id']; ?>)">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
																	</span>
																</a>
															<?php } ?>
														</td>
														</tr>
														<?php   } ?>
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
	<footer id="footer-bar" class="row">
		<p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>
	</footer>
</div>
</div>
</div>
</div>


<div id="myModal" class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
	  	<div class="modal-dialog modal-small modal-full-height modal-left modal-notify modal-info">	
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title heading lead">Import Business Customer</h4>
				</div>
			  <form action="<?=base_url('customers/Business_Customer/import_business_customer')?>" method="POST" enctype="multipart/form-data">
					<div class="modal-body">   
						<div class="error-msg"></div>    
						  	<div class="form-group">
		                      <label>Select File <span style="color:red">*</span></label>
								<input type="file" class="form-control addvalidate" id="import_customerfile" name="import_customerfile" autocomplete="off"  required="required" />

								
		                    </div>

		                   
		                   <a href="<?php echo base_url('assets/sample business customer.csv')?>" download> <button type="button" class="btn btn-primary waves-effect waves-light submitBtn" style="margin-top: 2%"><i class="fa fa-download fa-lg"></i>  Download Sample File</button></a>
		                    
						
							       
				  </div>

				  	<div class="modal-footer justify-content-center">
				  		
					  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn"><img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> SOUMETTRE</button>
					  	<button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">FERMER</button>
						</div>
				</form>
			</div>
		</div>
	</div>
	<!-- ================== -->



<?php echo $addbussinessForm; ?>




<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  

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
<script src="<?php echo  base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/daterangepicker.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.timepicker.js"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>

<script src="<?php echo  base_url(); ?>assets/js/project_view_js/general_js.js"></script>

<script type="text/javascript">

	// Format : d-m-yy
    function format1(inputDate) {
      var date = new Date(inputDate);
      if (!isNaN(date.getTime())) {
         // Months use 0 index.
         var d,m,y;
         if((date.getDate()) <= 9)
         {
         	d="0"+date.getDate();
         }
         else
         {
         	d=date.getDate();
         }
         if((date.getMonth()) <= 9)
         {
         	m="0"+date.getMonth();
         }
         else
         {
         	m=date.getMonth();
         }
      
        	return d + '-' + m + '-' + date.getFullYear();
         
      }
    }

	function isNumber(evt) {
	    evt = (evt) ? evt : window.event;
	    var charCode = (evt.which) ? evt.which : evt.keyCode;
	    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
	        return false;
	    }
	    return true;
	}


	function isAlpha(evt)
	{

		var regex = /^([a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]{1,}|[a-zA-Z]+\s{1}[a-zA-Z]{3,}\s{1}[a-zA-Z]{1,})$/;
 
		var matchArray = (regex).test(evt.value); // is the format ok?
		console.log(matchArray);
		return matchArray;
	}
	

	function editbusinesscustomermodal(id,param){
	 //alert(id);
	 $("#AddBusinessModal").modal('show');
	 $.ajax({
	 	type: "POST",
	 	url:'<?php echo base_url("Business_Customer/edit_business_customer");?>',
	 	data:{id:id},
	 	beforeSend: function(){
	 		$('#collateral_previewv-'+id).css("opacity","0.5");
	 	},
	 	success: function(resp)
	 	{
	 		console.log(resp);
	 		arr =  resp.split("$");
	 		result  = JSON.parse(arr[0]);
	 		officer = JSON.parse(arr[1]);
	 		branch = JSON.parse(arr[2]);
	 		console.log(officer);
	 		


	 		$( ".officer_c" ).each(function( index ) {
	 			if(index <= officer.length - 1){
	 			$(this).val(officer[index]['officer_id']);
	 			}
	 		
			});

			$( ".fullname_c" ).each(function( index ) {

				if(index <= officer.length - 1){
	 			$(this).val(officer[index]['full_name']);
	 			}
	 		
			});

			$( ".position_c" ).each(function( index ) {

				if(index <= officer.length - 1){
	 			$(this).val(officer[index]['position']);
	 			}
	 		
			});
			$( ".age_c" ).each(function( index ) {
				//console.log(index+"|"+officer[index]['officer_id']);


				if(index <= officer.length - 1){
					//console.log(officer[index]['age']);
	 			$(this).val(officer[index]['age']);
	 			}
	 		
			});
			$( ".address_c" ).each(function( index ) {

				if(index <= officer.length - 1){
	 			$(this).val(officer[index]['address']);
	 			}
	 		
			});

			$( ".anciennete_c" ).each(function( index ) {

				if(index <= officer.length - 1){
	 			$(this).val(officer[index]['anciennete']);
	 			}
	 		
			});

			$("#edit_id").val(result[0]['customer_id']);
	 		$("#account_no").val(result[0]['account_no']);
	 		$("#branch_val").val(result[0]['branch']);
	 		
	 		$("#branch").val(branch[0]['branch_name']);
	 		$("#company_name").val(result[0]['company_name']);
	 		$("#type_of_legal").val(result[0]['type_of_legal']);
	 		$("#address").val(result[0]['address']);
	 		$("#principal").val(result[0]['principal']);
	 		$("#capital").val(result[0]['capital']);
	 		$("#employer_tax_id").val(result[0]['employer_tax_id']);
	 		$("#sector_of_activity").val(result[0]['sector_id']);
	 		$("#account_open_date").val(format1(result[0]['account_open_date']));
	 		$("#creditline_amount").val(result[0]['creditline_amount']);
	 		$("#balance_amount").val(result[0]['balance_amount']);
	 		$("#amount_type").val(result[0]['amount_type']);
	 		$("#unpaid_amount").val(result[0]['unpaid_amount']);
	 		$("#number_of_unpaid").val(result[0]['number_of_unpaid']);
	 		

	 		if(param == "view")
	 		{
	 			$(".fieldset").attr("disabled","disabled");
	 			$(".submitBtn").hide();
	 		}
	 		else
	 		{
	 			$(".fieldset").removeAttr("disabled");
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
        "dateregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid date with format dd-mm-yyyy"
  );

		$("#addbusinesscustomer").validate({
		errorClass: 'has-error',
		rules: {				
			account_no: {
				required: true,
				number:true
			 },	
			branch: "required",
			company_name:"required",
			type_of_legal:"required",
			address:"required",
			principal:{
				required: true,
				number:true
			 },
			capital:{
				required: true,
				number:true
			 },  
			employer_tax_id :{
				required: true,
				number:true
			 },
			account_open_date : {
				required : true,
				dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
			},
			balance_amount :{
				required: true,
				number:true
			 },
			amount_type :"required",
			unpaid_amount:{
				required: true,
				number:true
			 },
			number_of_unpaid:{
				required: true,
				number:true
			 },
			 sector_of_activity:"required"
			 
				
		},			
		messages: {
			account_no: {
				required: "Please enter account no.",
				number:"Please enter valid number"
			 },	
			branch: "Please enter branch",
			company_name:"Please enter company name",
			type_of_legal:"Please enter type of legal",
			address:"Please enter address",
			principal:{
				required: "Please enter principal",
				number:"Please enter valid number"
			 },
			capital:{
				required: "Please enter capital",
				number:"Please enter valid number"
			 },  
			employer_tax_id :{
				required: "Please enter employer tax id",
				number:"Please enter valid number"
			 },
			// sector_of_activity : "Please enter sector of activity",
			account_open_date :"Please enter account open date",
			balance_amount :{
				required: "Please enter balance amount",
				number:"Please enter valid number"
			 },
			amount_type :"Please enter amount type",
			unpaid_amount:{
				required: "Please enter unpaid amount ",
				number:"Please enter valid number"
			 },
			number_of_unpaid:{
				required: "Please enter number of unpaid",
				number:"Please enter valid number"
			 }	,
			  sector_of_activity:"Please select sector of activity"	
		},
		highlight: function(element) {
			$(element).parent('.form-group').addClass('has-error');
			$(element).parent('td').addClass('has-error');
		},
		unhighlight: function(element) {

			$(element).parent('.form-group').removeClass('has-error');
			$(element).parent('td').removeClass('has-error');

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
			
			var formdata = $("#addbusinesscustomer");
			$.ajax({
				type:'POST',
				url:'<?php echo base_url("Business_Customer/save_bussiness_customer");?>',
				data:$(formdata).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#addbusinesscustomer').css("opacity","0.5");
					$('.outputdata').val("");
					$('.lodergif').css("display","inline");					
				},
				success: function(response) {

					$('.outputdata').val($.trim(response));					
					$('#addbusinesscustomer').css("opacity","");
					$('.submitBtn').attr("disabled",false);
					$('.lodergif').css("display","none");					
					if($.trim(response)=="success"){
						$("#addbusinesscustomer")[0].reset();
						$('.response-msg').html('<div class="alert alert-success"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Success!</strong> Customer saved Successfully.</div>'); 
						setTimeout(function() {                
		                	location.reload();
		                }, 2000);              			           	
                     }else{                     	                     	
                     	$('.response-msg').html('<div class="alert alert-danger"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Error!</strong> Unable to save record.</div>');
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


    $(".openBtn").click(function(){
     $("#addbusinesscustomer")[0].reset();
    });



    function delete_customer(id)
	{
		
		if(confirm("Are you sure you want to delete this Record?")){		
	  
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Business_Customer/delete_customer',
				data:	{id:id},
				cache: false,
				success: function(resp) {
					//alert(resp);
					
					location.reload();
					
						
					}
			});
		}

		
	}

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
	


	


	</script>

	

	

	

</body>
</html>