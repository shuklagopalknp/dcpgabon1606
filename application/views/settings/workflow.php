<style>
	.has-error{
		color:red;
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
								<li class="active"><span>Work Flow</span></li>
							</ol>
						</div>
					</div>
					<div class="clearfix">
						<h1 class="pull-left">Work Flow</h1>
						<div class="pull-right top-page-ui">
							<a class="btn btn-primary pull-right openBtn" href="<?php echo base_url('Settings/manage_workflow'); ?>">
								<i class="fa fa-plus-circle fa-lg"></i> Add Work Flow
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="success-msg"></div>

					<div class="main-box no-header clearfix">
						<div class="main-box-body clearfix">
							<div class="table-responsive">
								<table class="table user-list table-hover" id="table-example">
									<thead>
										<tr>
											<th><span>Sl No.</span></th>
											<th><span>Work Flow</span></th>
											<th><span>Product</span></th>
											<th><span>Min Amount</span></th>
											<th><span>Max Amount</span></th>
											<th><span>Created</span></th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
 										$count = 1;
										foreach ($workflow as $row) {?>		
										 <tr>
											<td><?php echo $count++; ?></td>
											<td><?php echo $row['workflow_name']; ?></td>
											<td>
												<?php if($row['type']=='credit_conso'){
												echo "Fêtes à la Carte";
												}else if($row['type']=='credit_scolaire'){
												echo "Congés à la Carte";} 
												else if($row['type']=='credit_confort'){
												echo "Crédit Confort";} 
												?></td>
											<td><?php echo $row['min_amount'] ?? ''; ?></td>
											<td><?php echo $row['max_amount'] ?? ''; ?></td>
											<td><?php echo $row['created_at']; ?></td>
											<td style="width: 15%;">
												<a href="<?php echo base_url('Settings/manage_workflow/edit/').$row['workflow_id']; ?>" class="table-link" class="btn btn-primary pull-right openBtn">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
												 <a href="javascript:void(0);" class="table-link danger delete_class" onClick="delete_workflow(<?php echo $row['workflow_id']; ?>)">
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
	

<div id="myModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info">
    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title heading lead">Create Region</h4>
		</div>

		<form role="form" method="post" id="regionForm">

			<div class="flash-msg"></div>
			<input type="hidden" name="edit_id" id="edit_id">
	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label">Region</label>
	        		<input type="text"  class="form-control" id="region" name="region" value="" placeholder="Enter Region">
	        	</div>
	    
	      	</div>
	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label">Description</label>
	        		<textarea class="form-control" id="description" name="description" rows="3" cols="50"></textarea>
	        	</div>
	    
	      	</div>
	      	<div class="modal-footer">
	          <button type="submit" class="btn btn-primary waves-effect waves-light submitBtn" name="save" value="Save">Submit</button>
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


	

	function delete_workflow(id)
	{

	
		if(confirm("Are you sure you want to delete this Record?")){		
	  
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Settings/delete_workflow',
				data:	{id:id},
				cache: false,
				success: function(resp) {

					// console.log(resp);
					// return false;

					if($.trim(resp) == "success"){

						$('.success-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i>Work Flow Deleted Successfully').addClass('alert alert-success fade in');
						setTimeout(function(){                  		
                			location.reload();
                		 }, 1500); 
					
					}
					else{
						$('.success-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i>Error in deleting Record').addClass('alert alert-danger fade in');
						setTimeout(function(){                  		
                			location.reload();
                		 }, 1500); 
					}
						
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