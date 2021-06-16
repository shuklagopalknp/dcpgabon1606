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
								<li class="active"><span>Sous-Secteurs</span></li>
							</ol>
						</div>
					</div>
					<div class="clearfix">
						<h1 class="pull-left">Sous-Secteurs</h1>
						<div class="pull-right top-page-ui">
							<a class="btn btn-primary pull-right openBtn" data-toggle="modal" data-target="#myModal" >
								<i class="fa fa-plus-circle fa-lg"></i> Add Sous-Secteur
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
											<th><span>Secteur</span></th>
											<th><span>Sous-Secteur</span></th>
											<th><span>Created</span></th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
 										$count = 1;
										foreach ($sous_secteurs as $row) {?>		
										 <tr>
											<td><?php echo $count++; ?></td>
											<td><?php echo $row['parent_secteurid']; ?></td>
											<td><?php echo $row['secteurs']; ?></td>
											<td><?php echo $row['created']; ?></td>
											<td style="width: 15%;">
												<a href="javascript:void(0);" class="table-link" class="btn btn-primary pull-right openBtn"  data-toggle="modal" data-target="#modal_edit" onClick="edit_secteur(<?php echo $row['sid']; ?>)">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
											   <a href="javascript:void(0);" class="table-link danger delete_class" onClick="delete_sous_secteur(<?php echo $row['sid']; ?>)">
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
			<h4 class="modal-title heading lead">Create Sous-Secteur</h4>
		</div>

		<form role="form" method="post" id="secteurForm">

			<div class="flash-msg"></div>
			<input type="hidden" name="edit_id" id="edit_id">
	      	
	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label">Secteur</label>
	        		<select name="secteur" id="secteur" class="form-control">
	        			<option value="">Select </option>
	        			<?php foreach($secteurs as $sec_row){?>
	        				<option value="<?php echo $sec_row['tlc_id']?>"><?php echo $sec_row['secteurs']?></option>
	        			<?php } ?>
	        	    </select>
	        		
	        	</div>
	    
	      	</div>

	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label">Sous-Secteur</label>
	        		<input type="text" name="sous_secteur" id="sous_secteur" placeholder="" class="form-control">
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
	$(function() {			
		$('.openBtn').on('click',function(){
		 $("#secteurForm")[0].reset();	
		 $("h4").text("Create Sous-Secteur");			 
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



	function edit_secteur(row_id)
	{
		$("#secteurForm")[0].reset();
		$("#myModal").modal('show');

		$("h4").text("Edit Sous-Secteur");

		$.ajax({

			type:"POST",
			url:'<?php echo base_url("Sous_Secteurs/edit_sous_secteur");?>',
			data:{sous_id : row_id},
			success:function(response) {
				
			    
			     var jdata  =  JSON.parse(response);
			    // console.log(jdata);
			    
				$("#edit_id").val(jdata['sid']);
				$("#secteur").val(jdata['parent_secteurid']);
			    $("#sous_secteur").val(jdata['secteurs']);
			    $("#description").val(jdata['sous_secteur_description']);

			}
		});
	}


	function delete_sous_secteur(id)
	{

	
		if(confirm("Are you sure you want to delete this Record?")){		
	  
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Sous_Secteurs/delete_sous_secteur',
				data:	{id:id},
				cache: false,
				success: function(resp) {
				
					if(resp != '2'){
					location.reload();
				}else{
					$('.success-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i>Sous-Secteur can`t be deleted  as it is assigned').addClass('alert alert-danger fade in');

						setTimeout(function(){                  		
                			location.reload();
                		 }, 1500); 
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

	$("#secteurForm").validate({
		errorClass: 'has-error',
		rules: {				
			 
	         sous_secteur: {
	            required: true,	
	            minlength: 3,
	            maxlength: 30,
	         },
	         secteur: {
	            required: true
	         }
		},
		messages: {
			sous_secteur: {
				required: "Please enter sous-secteur",
			},
			secteur: {
				required: "Please enter secteur",
			}
		},
		submitHandler: function(form) {			
            $.ajax({
                url: '<?php echo base_url("Sous_Secteurs/save_sous_secteur");?>',
                type: 'POST',
                data: $(form).serialize(),
                beforeSend: function(){
                	$('.submitBtn').attr("disabled","disabled");
                	$('#secteurForm').css("opacity","0.5");
            	},
                success: function(response) {

                 //    console.log(response);
                	// return false;
                	
                	$('.flash-msg').html('').removeClass('alert alert-danger fade in');  
                	if(response=='success'){                		             		
                		$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Sous-Secteur Saved Successfully').addClass('alert alert-success fade in').fadeOut(3000);  
                		setTimeout(function(){                  		
                			location.reload();
                		 }, 1500); 

                	}
                	else if(response =='already_exists')
                	{
                		$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> This Sous-Secteur Already Exists..').addClass('alert alert-danger fade in').fadeOut(5000); 
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

