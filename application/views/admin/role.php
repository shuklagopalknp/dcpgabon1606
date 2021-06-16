<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div id="content-header" class="clearfix">
						<div class="pull-left">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('Admin_Dashboard');?>">Dashboard</a></li>
								<li class="active"><span>Roles</span></li>
							</ol>
						</div>
					</div>
					<div class="clearfix">
						<h1 class="pull-left">Roles</h1>
						<div class="pull-right top-page-ui">
							<!-- <a class="btn btn-primary pull-right openBtn" data-toggle="modal" data-target="#myModal" > -->
								<a href="<?php echo base_url('Add_Roles');?>" class="btn btn-primary pull-right openBtn">
								<i class="fa fa-plus-circle fa-lg"></i> Add Role
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="main-box no-header clearfix">
						<div class="main-box-body clearfix">
							<div class="table-responsive">
								<table class="table user-list table-hover" id="table-example">
									<thead>
										<tr>
											<th><span>ID</span></th>
											<th><span>Role Name</span></th>
											<th><span>Role description	</span></th>
											<th><span>Created</span></th>
											<th>Operations</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($role as $key) {?>
											<tr style="<?php 
											if($key['deleted']==1 ) 
												{echo "color:#efb2ad";}
											?>">
											<td><?php echo $key['id']; ?></td>
											<td><?php echo $key['name']; ?></td>
											<td><?php echo $key['field_data']; ?></td>
											<td><?php echo $key['created_at']; ?></td>
											<td style="width: 15%;">

												<?php if($key['deleted']==1 ) {?>	
												<a href="javascript:;" class="table-link">
													<span class="fa-stack" style="color:#b9d8c5;">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
												<a href="javascript:;" class="table-link danger">
													<span class="fa-stack" style="color:#efb2ad;">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
													</span>
												</a>
												<?php }else { ?>

												<a href="<?php echo base_url('Add_Roles/edit_role/'.$key['id']);?>"class="table-link" class="btn btn-primary pull-right openBtn" >
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
												 <a href="javascript:void(0);" class="table-link danger delete_class" onClick="delete_role(<?php echo $key['id']; ?>)">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
													</span>
												</a> 

												<?php } ?>
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
	

<div id="myModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info">
    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title heading lead">Create Role</h4>
		</div>

		<form role="form" method="post" id="roleForm">
			<div class="flash-msg"></div>
			<input type="hidden" name="edit_id" id="edit_id">
	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Role name</label>
	        		<input type="text" class="form-control" id="role_name" name="role_name" value="" >
	        	</div>
	        	<div class="form-group">
	        		<label for="inputError" class="control-label">Role description</label>
	        		<input type="text" class="form-control" id="role_description" name="role_description" value="">
	        	</div>
	      	</div>
	      	<div class="modal-footer">
	          <button type="submit" class="btn btn-primary waves-effect waves-light submitBtn" name="save" value="Save Data">Submit</button>
	          <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button> 
	          <div class="spinner-border text-success" role="status">
	          	<span class="sr-only">Loading...</span>
	          </div>      
	        </div> 
         </form>
    </div>

  </div>
</div>
 

<script type="text/javascript">
	$(function() {			
		$('.openBtn').on('click',function(){
			$("#roleForm")[0].reset();			 
			$('.modal-body').load(function(){				
            	$('#myModal').modal({show:true});
        	});
		});			
	});


	function edit_role(row_id)
	{

		$("#roleForm")[0].reset();
		$("#myModal").modal('show');
		$.ajax({
			type:"POST",
			url:"<?php echo base_url()?>Roles/edit_role",
			data:{role_id :  row_id},
			success:function(response)
			{
				//alert(response);
				var jdata =  JSON.parse(response);

				$("#edit_id").val(jdata['id']);
				$("#role_name").val(jdata['name']);
				$("#role_description").val(jdata['field_data']);

			}

		});
	}


	function delete_role(id)
	{
		if(confirm("Are you sure you want to delete this Record?")){		
	  
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Roles/delete_role',
				data:	{id:id},
				cache: false,
				success: function(resp) {

					if(resp != '2'){
						location.reload();
					}else{
						$('.success-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i>Role can`t be deleted as it is assigned').addClass('alert alert-danger fade in');

						setTimeout(function(){                  		
                			location.reload();
                		 }, 1500); 
					}
						
				}
			});
		}
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


	$("#roleForm").validate({
		errorClass: 'has-error',
		rules: {				
			 role_name: {
	            required: true,	
	            minlength: 3,
	            maxlength: 255,
	         },
			role_description: {
				required: true
			},
		},
		messages: {
			role_name: {
				required: "The Role name field is required.",
			},
			role_description: {
				required: "The Role description field is required.",
			},
		},
		submitHandler: function(form) {			
            $.ajax({
                url: '<?php echo base_url("roles/save_role");?>',
                type: 'POST',
                data: $(form).serialize(),
                beforeSend: function(){
                	$('.submitBtn').attr("disabled","disabled");
                	$('#roleForm').css("opacity","0.5");
            	},
                success: function(response) {
                	//console.log(response);
                	$('.flash-msg').html('').removeClass('alert alert-danger fade in');  
                	if(response=='success'){                		             		
                		$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Role Saved Successfully').addClass('alert alert-success fade in').fadeOut(3000);  
                		setTimeout(function(){                  		
                			location.reload();
                		 }, 1500); 

                	}
                	else if(response =='already_exists')
                	{
                		$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> This Role Already Exists..').addClass('alert alert-danger fade in').fadeOut(5000); 
                		setTimeout(function(){                  		
                			location.reload();
                		 }, 1500);  
                		
                	}
                	else{
                		$('.flash-msg').html(response).addClass('alert alert-danger fade in');                	
                    
               		}
                }            
            });
          }
	});

	
	
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