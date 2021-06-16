<style type="text/css">
.modal-dialog.modal-notify.modal-info .modal-header {
	background-color: #00c851;
}
.modal-dialog.modal-notify .heading {
	margin: 0;
	padding: .3rem;   
	color: #fff;
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
								<li class="active"><span>Company</span></li>								
							</ol>
						</div>
					</div>
					<div class="clearfix">
						<h1 class="pull-left">Company</h1>
						<div class="pull-right top-page-ui">
							<a href="javascript:void(0);" class="btn btn-primary pull-right openBtn"  data-toggle="modal" data-target="#myModal">
								<i class="fa fa-plus-circle fa-lg"></i> Add Company
							</a>
						</div>
					</div>
				</div>
			</div>
			<?php //echo $this->session->userdata('site_lang'); //print_r($this->session);?>
			<div class="row">
				<div class="col-lg-12">
					<div class="main-box no-header clearfix">
						<div class="main-box-body clearfix">
							<div class="table-responsive">
								<table id="table-example" class="table user-list table-hover">
									<thead>
										<tr>
											<th><span>Sl No.</span></th>
											<th><span>Company</span></th>
											<th><span>Email</span></th>
											<th><span>Contact No.</span></th>
											<th><span>Contact Person</span></th>
											<th><span>Address</span></th>
											<th><span>Created</span></th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; 
										if(!empty($company_record)){
										foreach ($company_record as $row ) {
											//print_r($branch);
										?>										
										<tr id="<?php echo $row['company_id']; ?>">
											<td><?php echo $i++;?></td>
											<td><?php echo $row['company_name'];?></td>
											<td><?php echo $row['company_email']?></td>
											<td><?php echo $row['company_contactno']?></td>
											<td><?php echo $row['company_contactperson']?></td>
											<td><?php echo $row['company_address']?></td>
											<td><?php echo date("m/d/Y", strtotime($row['created_at']));?></td>
											<td style="width: 15%;">
												<a href="javascript:void(0);" class="table-link" class="btn btn-primary pull-right openBtn"  data-toggle="modal" data-target="#modal_edit" onClick="edit_company(<?php echo $row['company_id']; ?>)">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
												<a href="javascript:void(0);" class="table-link danger delete_class" onClick="delete_company(<?php echo $row['company_id']; ?>)">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
													</span>
												</a>
											</td>
										</tr>
									<?php $i++; }
									}

									
									 ?>
									
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
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info">
	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title heading lead">Create Company</h4>
	  </div>
	   <form role="form" method="post" id="companyForm">
		<div class="modal-body">   
			<div class="error-msg"><?php echo validation_errors(); ?></div>    
			<div class="form-group">
				<label for="exampleInputEmail1">Company Name <span style="color:red">*</span></label>
				<input type="text" class="form-control" id="company_name" name="company_name" value="" placeholder="Enter Company Name">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Company Email <span style="color:red">*</span></label>
				<input type="text" class="form-control" id="company_email" placeholder="Enter Email" name="company_email">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Contact No. <span style="color:red">*</span></label>
				<input type="text" class="form-control" id="company_contactno" placeholder="Enter Contact No." name="company_contactno">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Contact Person</label>
				<input type="text" class="form-control" id="company_contactperson" placeholder="Enter Contact Person" name="company_contactperson">
			</div>
			<div class="form-group">
				<label for="exampleTextarea">Address <span style="color:red">*</span></label>
				<textarea class="form-control" id="address" rows="3" name="company_address"></textarea>
			</div>
			       
	  </div>
	  <div class="modal-footer justify-content-center">
		  <button type="submit" class="btn btn-primary waves-effect waves-light submitBtn">Submit</button>
		  <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button> 
		  <span class="sr-only">Loading...</span>         
		</div>
		</form>
	</div>
  </div>
</div>


<!-- Edit Branch -->
<div id="modal_edit"  class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info">
	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title heading lead">Edit Company</h4>
	  </div>
	   <form role="form" method="post" id="editcompanyForm">

	   	<input type="hidden" id="editid" name="editid" value="">
		<div class="modal-body">   
			<div class="error-msg"></div>    
			<div class="form-group">
				<label for="exampleInputEmail1">Company Name</label>
				<input type="text" class="form-control" id="editcompany_name" name="editcompany_name" value="" placeholder="Enter Company Name">
			</div>  
			<div class="form-group">
				<label for="exampleInputEmail1">Company Email</label>
				<input type="text" class="form-control" id="editcompany_email" name="editcompany_email" value="" placeholder="Enter Contact Email">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Contact No.</label>
				<input type="text" class="form-control" id="editcontact_no" name="editcontact_no" value="" placeholder="Enter Contact No.">
			</div>   
			<div class="form-group">
				<label for="exampleInputEmail1">Contact Person</label>
				<input type="text" class="form-control" id="editcontact_person" name="editcontact_person" value="" placeholder="Enter Contact Person">
			</div>  
			
			<div class="form-group">
				<label for="exampleInputEmail1">Address</label>
				<textarea class="form-control" id="editcompany_address" name="editcompany_address"></textarea>
			</div> 

	  </div>
	  <div class="modal-footer justify-content-center">
		  <button type="submit" class="btn btn-primary waves-effect waves-light editSubmitBtn">Update</button>
		  <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button> 
		  
		  <span class="sr-only">Loading...</span>         
		</div>
		</form>
	</div>
  </div>
</div>


	<script type="text/javascript">		
	$(function() {			
		$('.openBtn').on('click',function(){			 
			$('.modal-body').load(function(){				
				$('#myModal').modal({show:true});
			});
		});			
	});
	$('[data-dismiss=modal]').on('click', function (e) {
		var $t = $(this),		
		target = $t[0].href || $t.data("target") || $t.parents('#myModal') || [];		
		$(target)
		.find("input").val('').end().find("input[type=checkbox]").prop("checked", " ").end();
		$("label.has-error").html(' ');
		$("label.has-error").removeClass("has-error");
		//document.getElementById("errorDiv1").innerHTML=" ";
	});
	$("#companyForm").validate({
		errorClass: 'has-error',
		rules: {				
			 company_name: {
				required: true,		           	
				rangelength:[4,50],	            
			 },	
			 company_contactno: {
				required: true,	
				number:true,	           	
				rangelength:[10,12],	            
			 },	
			 company_address: 'required',
			 company_email:{
			 	required:true,
			 	email:true
			 }	           	
				

		},
		messages: {
			 company_name: {
				required: "Please enter company name"
			 },	
			company_contactno: {
				required: "Please enter contact no.",	
				number:"Please enter valid contact no."
			 },	
			 company_address: "Please enter company address",
			 company_email:{
			 	required:"Please enter company email",
			 	email:"Please enter valid email"
			 }				
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
			$.ajax({
				url: '<?php echo base_url("Company/add_company");?>',
				type: 'POST',
				data: $(form).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#companyForm').css("opacity","0.5");
					$(".sr-only").show();
				},
				success: function(response) {
					console.log(response);
					$("#companyForm")[0].reset();
					$('.error-msg').html('').removeClass('alert alert-danger fade in');
					$('#companyForm').css("opacity","1");  
					if(response==1){                		             		
						$('.error-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Company  added successfully').addClass('alert alert-success fade in').fadeOut(5000);  
							setTimeout(function(){                  		
								location.reload();
							 }, 1500); 
					$('.submitBtn').attr("disabled","");

					}else{
					$('.error-msg').html(response).addClass('alert alert-danger fade in');                	
					//location.replace(location + "pay-vip.php");
				   // alert("Send mail");
					}
				}            
			});

		  }
	});

	$(document).ready(function() {		
		var table = $('#table-example').dataTable({
			'order': [[ 3, 'desc' ]],
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
		//new $.fn.dataTable.FixedHeader( tableFixed );	
	});
	function edit_company(id){			
		$.ajax({ 
			type: "POST", 
			url: '<?php echo base_url("Company/editmodal_company");?>',
			data:{id:id},
			success: function(resp){
				console.log(resp);					
				var jdata=jQuery.parseJSON(resp);				
				$("#editcompany_name").val(jdata[0]['company_name']);
				$("#editcompany_email").val(jdata[0]['company_email']);
				$("#editcontact_no").val(jdata[0]['company_contactno']);
				$("#editcontact_person").val(jdata[0]['company_contactperson']);
				$("#editcompany_address").val(jdata[0]['company_address']);
				$("#editid").val(jdata[0]['company_id']);
			}
		 });
	}
	$("#editcompanyForm").validate({
		errorClass: 'has-error',
		rules: {				
			 editcompany_name: {
				required: true,		           	
				rangelength:[4,50],	            
			 },	
			 editcontact_no: {
				required: true,	
				number:true,	           	
				rangelength:[10,12],	            
			 },	
			 editcompany_address: 'required',
			 editcompany_email:{
			 	required:true,
			 	email:true
			 }	
		},
		messages: {
			editcompany_name: {
				required: "Please enter company name"
			 },	
			editcontact_no: {
				required: "Please enter contact no.",	
				number:"Please enter valid contact no."
			 },	
			editcompany_address: "Please enter company address",
			editcompany_email:{
			 	required:"Please enter company email",
			 	email:"Please enter valid email"
			 }	
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
			$.ajax({
					url: '<?php echo base_url("Company/update_company");?>',
					type: 'POST',
					data: $(form).serialize(),
					beforeSend: function(){
						$('.editSubmitBtn').attr("disabled","disabled");
						$('#editcompanyForm').css("opacity","0.5");
						$(".sr-only").show();
					},
					success: function(response) {
						//console.log(response);
							$("#editcompanyForm")[0].reset();
							$('.error-msg').html('').removeClass('alert alert-danger fade in');
							$('#editcompanyForm').css("opacity","1");  
							if(response==1){                		             		
								$('.error-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Company update successfully').addClass('alert alert-success fade in').fadeOut(5000);  
								setTimeout(function(){
									location.reload();
								 }, 1500); 
							$('.editSubmitBtn').attr("disabled","");
						}else{
							$('.error-msg').html(response).addClass('alert alert-danger fade in');
							$('.editSubmitBtn').attr("disabled","");
							$('#editcompanyForm').css("opacity","2");
							$(".sr-only").hide();
						}
					}
			});
		  }
	});


	function delete_company(id)
	{

	
		if(confirm("Are you sure you want to delete this Record?")){		
	  	var del_id= $('.delete_class').attr('id');
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Company/delete_company',
				data:	{	id:id},
				cache: false,
				success: function(resp) {
					if(resp==1){
					location.reload();
				}else{
					alert('Sorry we can`t delete it right now.');
				}
						//$(this).closest('tr').fadeOut(800,function(){
	   				// $(this).remove();
	   				 
						// });
						/*if(resp==1){
							alert('Deleted Successfully'); 
							location.reload();
						}*/
					}
			});
		}

		
	}
	</script>
</body>
</html>