<style>
	.has-error{
		color:red;
	}
</style>
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
								<li><a href="<?php echo base_url('Admin_Dashboard');?>">Dashboard</a></li>
								<li><a href="<?php echo base_url('Business_Customer');?>">Business Customer</a></li>
							</ol>
						</div>
					</div>
					<div class="clearfix">
						
						<div class="row">
							<div class="col-md-12">
								<div class="response-msg"></div>
								

								
									<div class="form-group pull-right" style="margin-top:10px;">
										
										<div class="input-group" style="width:100%">

											<a href="javascript:void(0);" class="btn btn-primary"  data-toggle="modal" data-target="#myModal" style="margin:5px"> <i class="fa fa-plus-circle fa-lg"></i> Import Client</a>

										
										</div>
									</div>
							
								
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">


					<?php if($this->session->flashdata('flash_message')){?>
					<div class="alert alert-success"><?php echo $this->session->flashdata('flash_message') ; ?></div>
					<?php } ?>

					<?php if($this->session->flashdata('error_message')){?>
					<div class="alert alert-danger"><?php echo $this->session->flashdata('error_message') ; ?></div>
					<?php } ?>

					<div class="main-box no-header clearfix">
						<div class="main-box-body clearfix">
							<div class="table-responsive">
								<table id="table-example" class="table table-hover table-striped">
													<thead>
														<tr>
															<th>Id</th>
															<th>Raison Sociale</th>
															<th>Numéro du compte</th>
															<th>Agence</th>
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
                                                            <td><?php echo $row['branch_name'];?></td>
															<td><?php echo $row['secteurs'];?></td>
															<td><?php echo $row['created_at'];?></td>
															<td>
																
																<a href="javascript:void(0);" class="table-link" data-toggle="modal" data-target="#modal_edit" onclick="editbusinesscustomermodal('<?php echo $row['customer_id'];?>','')">
																	<span class="fa-stack">
																		<i class="fa fa-square fa-stack-2x"></i>
																		<i class="fa fa-eye fa-stack-1x fa-inverse"></i>
																	</span>
																</a>
																<a href="javascript:void(0);" class="table-link danger delete_class" onclick="delete_customer(<?php echo $row['customer_id']; ?>)">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
													</span>
												</a>
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



	<script type="text/javascript">
	$(function() {			
		$('.openBtn').on('click',function(){
		 
		});			
	});
        
        
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
	
	$('[data-dismiss=modal]').on('click', function (e) {
		var $t = $(this),		
		target = $t[0].href || $t.data("target") || $t.parents('#myModal') || [];		
		$(target)
	    .find("input").val('').end().find("input[type=checkbox]").prop("checked", " ").end();
	    $("label.has-error").html(' ');
	    $("label.has-error").removeClass("has-error");
	    //document.getElementById("errorDiv1").innerHTML=" ";
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
		
		new $.fn.dataTable.FixedHeader( tableFixed );
	});
	</script>

</body>
</html>
