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
								<li class="active"><span>Branch</span></li>								
							</ol>
						</div>
					</div>
					<div class="clearfix">
						<h1 class="pull-left">Branch</h1>
						<div class="pull-right top-page-ui">
							<a href="javascript:void(0);" class="btn btn-primary pull-right openBtn"  data-toggle="modal" data-target="#myModal">
								<i class="fa fa-plus-circle fa-lg"></i> Add Branch
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
											<th><span>Branch Name</span></th>
											<th><span>Contact No.</span></th>
											<th><span>Contact Person</span></th>
											<th><span>Address</span></th>
											<th><span>Created</span></th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; 
										if(!empty($branch_record)){
										foreach ($branch_record as $branch ) {
											//print_r($branch);
										?>										
										<tr id="<?php echo $branch['bid']; ?>">
											<td><?php echo $i;?></td>
											<td><?php echo $branch['branch_name'];?></td>
											<td><?php echo $branch['contact_no']?></td>
											<td><?php echo $branch['contact_person']?></td>
											<td><?php echo $branch['address']?></td>
											<td><?php echo date("m/d/Y", strtotime($branch['created']));?></td>
											<td style="width: 15%;">
												<a href="javascript:void(0);" class="table-link" class="btn btn-primary pull-right openBtn"  data-toggle="modal" data-target="#modal_edit" onClick="edit_branch(<?php echo $branch['bid']; ?>)">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
												<a href="javascript:void(0);" class="table-link danger delete_class" onClick="delete_branch(<?php echo $branch['bid']; ?>)">
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
		<h4 class="modal-title heading lead">Create Branch</h4>
	  </div>
	   <form role="form" method="post" id="branchForm">
		<div class="modal-body">   
			<div class="error-msg"><?php echo validation_errors(); ?></div>    
			<div class="form-group">
				<label for="exampleInputEmail1">Branch Name</label>
				<input type="text" class="form-control" id="branch_name" name="branch_name" value="" placeholder="Enter Branch Name">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Contact Person</label>
				<input type="text" class="form-control" id="contact_person" placeholder="Enter Contact Person" name="contact_person">
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Contact No.</label>
				<input type="text" class="form-control" id="contact_no" placeholder="Enter Contact No." name="contact_no">
			</div>
			<div class="form-group">
				<label for="exampleTextarea">Address</label>
				<textarea class="form-control" id="address" rows="3" name="address"></textarea>
			</div>
			<div class="form-group">
		        <label>Zone</label>
						<select  class="form-control addvalidate" id="zone" name="zone">
	                            <option value="SIEGE" id="SIEGE">SIEGE</option>
	                            <option value="ZONE LIBREVILLE CENTRE-VILLE" id="CNI">ZONE LIBREVILLE CENTRE-VILLE</option> 
	                            <option value="ZONE LIBREVILLE NORD">ZONE LIBREVILLE NORD</option>
	                            <option value="ZONE LIBREVILLE SUD 1" id="ZONE LIBREVILLE SUD 1">ZONE LIBREVILLE SUD 1</option>
	                            <option value="ZONE LIBREVILLE SUD 2" id="ZONE LIBREVILLE SUD 2">ZONE LIBREVILLE SUD 2</option>
	                            <option value="CNI" id="CNI">SGOM</option> 
	                            <option value="GHO" id="GHO">SGHO</option>
	                            <option value="ZONE SUD" id="ZONE SUD">ZONE SUD</option>
	                    </select>
		        </div>
		    <div class="form-group">
				<label for="exampleTextarea">Bureau</label>
				<input type="text" class="form-control" id="department" placeholder="Enter Department" name="department">
			</div>
			 <div class="form-group">
				<label for="exampleTextarea">Code agence Atlas</label>
				<input type="number" class="form-control" id="code_agence" placeholder="Enter Code agence Atlas" name="code_agence">
			</div>
			 <div class="form-group">
				<label for="exampleTextarea">Mobile Contact</label>
				<input type="number" class="form-control" id="mobile_contact" placeholder="Enter Mobile Contact" name="mobile_contact">
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
		<h4 class="modal-title heading lead">Edit Branch</h4>
	  </div>
	   <form role="form" method="post" id="editbranchForm">
		<div class="modal-body">   
			<div class="error-msg"></div>    
			<div class="form-group">
				<label for="exampleInputEmail1">Branch Name</label>
				<input type="text" class="form-control" id="editbranch_name" name="editbranch_name" value="" placeholder="Enter Branch Name">
			</div>  
			<div class="form-group">
				<label for="exampleInputEmail1">Contact Person</label>
				<input type="text" class="form-control" id="editcontact_person" name="editcontact_person" value="" placeholder="Enter Contact Person">
			</div>  
			<div class="form-group">
				<label for="exampleInputEmail1">Contact No.</label>
				<input type="text" class="form-control" id="editcontact_no" name="editcontact_no" value="" placeholder="Enter Contact No.">
			</div> 
			<div class="form-group">
				<label for="exampleInputEmail1">Address</label>
				<textarea class="form-control" id="editaddress" name="editaddress"></textarea>
			</div> 

			<div class="form-group">
		        <label>Zone</label>
						<select  class="form-control addvalidate" id="editzone" name="editzone">
	                            <option value="SIEGE" id="SIEGE">SIEGE</option>
	                            <option value="ZONE LIBREVILLE CENTRE-VILLE" id="CNI">ZONE LIBREVILLE CENTRE-VILLE</option> 
	                            <option value="ZONE LIBREVILLE NORD">ZONE LIBREVILLE NORD</option>
	                            <option value="ZONE LIBREVILLE SUD 1" id="ZONE LIBREVILLE SUD 1">ZONE LIBREVILLE SUD 1</option>
	                            <option value="ZONE LIBREVILLE SUD 2" id="ZONE LIBREVILLE SUD 2">ZONE LIBREVILLE SUD 2</option>
	                            <option value="CNI" id="CNI">SGOM</option> 
	                            <option value="GHO" id="GHO">SGHO</option>
	                            <option value="ZONE SUD" id="ZONE SUD">ZONE SUD</option>
	                    </select>
		        </div>
		    <div class="form-group">
				<label for="exampleTextarea">Bureau</label>
				<input type="text" class="form-control" id="editdepartment" placeholder="Enter Department" name="editdepartment">
			</div>
			 <div class="form-group">
				<label for="exampleTextarea">Code agence Atlas</label>
				<input type="number" class="form-control" id="editcode_agence" placeholder="Enter Code agence Atlas" name="editcode_agence">
			</div>
			 <div class="form-group">
				<label for="exampleTextarea">Mobile Contact</label>
				<input type="number" class="form-control" id="editmobile_contact" placeholder="Enter Mobile Contact" name="editmobile_contact">
			</div>

	  </div>
	  <div class="modal-footer justify-content-center">
		  <button type="submit" class="btn btn-primary waves-effect waves-light editSubmitBtn">Update</button>
		  <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button> 
		  <input type="hidden" id="editid" name="editid" value="" />
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
	$("#branchForm").validate({
		errorClass: 'has-error',
		rules: {				
			 branch_name: {
				required: true,		           	
				rangelength:[2,30],	            
			 },	
			  contact_person: {
				required: true,		           	
				rangelength:[2,30],	            
			 },	
			  contact_no: {
				required: true,	
				number:true,	           	
				rangelength:[8,14],	            
			 },	
			  address: 'required'	           	
				

		},
		messages: {
			 branch_name: {
				required: "Please enter branch name",		           	
				         
			 },	
			  contact_person: {
				required: "Please enter contact person",		           	
				
			 },	
			  contact_no: {
				required: "Please enter contact number",	
				number:"Please enter valid contact number",	           	
					            
			 },	
			  address: "Please enter address"			
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
				url: '<?php echo base_url("Branch/add_Branch");?>',
				type: 'POST',
				data: $(form).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#branchForm').css("opacity","0.5");
					$(".sr-only").show();
				},
				success: function(response) {
					console.log(response);
					$("#branchForm")[0].reset();
					$('.error-msg').html('').removeClass('alert alert-danger fade in');
					$('#branchForm').css("opacity","1");  
					if(response==1){                		             		
						$('.error-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Branch added successfully').addClass('alert alert-success fade in').fadeOut(5000);  
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
	function edit_branch(id){			
		$.ajax({ 
			type: "POST", 
			url: '<?php echo base_url("Branch/editmodal_branch");?>',
			data:{id:id},
			success: function(resp){
				console.log(resp);					
				var jdata=jQuery.parseJSON(resp);				
				$("#editbranch_name").val(jdata[0]['branch_name']);
				$("#editcontact_person").val(jdata[0]['contact_person']);
				$("#editcontact_no").val(jdata[0]['contact_no']);
				$("#editaddress").val(jdata[0]['address']);
				$("#editid").val(jdata[0]['bid']);

				$("#editdepartment").val(jdata[0]['department']);
				$("#editmobile_contact").val(jdata[0]['mobile_contact']);
				$("#editzone").val(jdata[0]['zone']);
				$("#editcode_agence").val(jdata[0]['code_agence']);
			}
			
		 });
	}
	$("#editbranchForm").validate({
		errorClass: 'has-error',
		rules: {				
			editbranch_name: {
				required: true,		           	
				rangelength:[2,30],	            
			},
			editcontact_person: {
				required: true,		           	
				rangelength:[2,30],	            
			},
			editcontact_no: {
				required: true,		           	
				rangelength:[8,14],
				number:true	            
			},
			editaddress:'required'
		},
		messages: {
			editbranch_name: {
				required: "Please enter branch name"	           	
			},
			editcontact_person: {
				required: "Please enter contact person"
			},
			editcontact_no: {
				required: "Please enter contact no.",		           	
				number:"Please enter valid contact no."	            
			},
			editaddress:"Please enter address"
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
					url: '<?php echo base_url("Branch/update_Branch");?>',
					type: 'POST',
					data: $(form).serialize(),
					beforeSend: function(){
						$('.editSubmitBtn').attr("disabled","disabled");
						$('#editbranchForm').css("opacity","0.5");
						$(".sr-only").show();
					},
					success: function(response) {
						//console.log(response);
							$("#editbranchForm")[0].reset();
							$('.error-msg').html('').removeClass('alert alert-danger fade in');
							$('#editbranchForm').css("opacity","1");  
							if(response==1){                		             		
								$('.error-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Branch update successfully').addClass('alert alert-success fade in').fadeOut(5000);  
								setTimeout(function(){
									location.reload();
								 }, 1500); 
							$('.editSubmitBtn').attr("disabled","");
						}else{
							$('.error-msg').html(response).addClass('alert alert-danger fade in');
							$('.editSubmitBtn').attr("disabled","");
							$('#editbranchForm').css("opacity","2");
							$(".sr-only").hide();
						}
					}
			});
		  }
	});


	function delete_branch(id)
	{

	
		if(confirm("Are you sure you want to delete this Record?")){		
	  
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Branch/delete_branch',
				data: {id:id},
				cache: false,
				success: function(resp) {
					if(resp==1){
					location.reload();
				}else{
					alert('Sorry we can`t deleted right now.');
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
