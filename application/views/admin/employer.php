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
								<li class="active"><span>Employeurs</span></li>
							</ol>
						</div>
					</div>
					<div class="clearfix">
						<h1 class="pull-left">Employeurs</h1>
						<div class="pull-right top-page-ui">
							<a class="btn btn-primary pull-right openBtn" data-toggle="modal" data-target="#myModal" >
								<i class="fa fa-plus-circle fa-lg"></i> Add Employeur
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
											<th><span>Sl No.</span></th>
											<th><span>Employeur</span></th>
											<th><span>Secteur</span></th>
											<th><span>Sous-Secteur</span></th>
											<th><span>Catégory</span></th>
											<th><span>Limites</span></th>
											
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php 
 										$count = 1;
										foreach ($employer as $row) {?>		
										 <tr>
											<td><?php echo $count++; ?></td>
											<td><?php echo $row['employer_name']; ?></td>
											<td><?php echo $row['secteurs']; ?></td>
											<td><?php echo $row['sous_secteur']; ?></td>
											<td><?php echo $row['catrgory']; ?></td>
											<td><?php echo $row['limit_name']; ?></td>
											<td style="width: 15%;">
												<a href="javascript:void(0);" class="table-link" class="btn btn-primary pull-right openBtn"  data-toggle="modal" data-target="#modal_edit" onClick="edit_employer(<?php echo $row['emp_id']; ?>)">
													<span class="fa-stack">
														<i class="fa fa-square fa-stack-2x"></i>
														<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
													</span>
												</a>
											   <a href="javascript:void(0);" class="table-link danger delete_class" onClick="delete_employer(<?php echo $row['emp_id']; ?>)">
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
			<h4 class="modal-title heading lead">Create Employeur</h4>
		</div>

		<form role="form" method="post" id="employerForm">

			<div class="flash-msg"></div>
			<input type="hidden" name="edit_id" id="edit_id">
	      	
	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label">Employeur</label>
	        		<input type="text" name="employer" id="employer" placeholder="" class="form-control">
	        	</div>
	    
	      	</div>

	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label">Secteur</label>
	        		<select name="secteur" id="secteur" class="form-control">
	        			<option value="">Select</option>
	        			<?php foreach($secteur as $sec){?>
	        			<option value="<?php echo $sec['tlc_id'];?>"><?php echo $sec['secteurs'];?></option>
	        			<?php } ?>	
	        		</select>
	        	</div>
	    
	      	</div>

	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label">Sous-Secteur</label>
	        		<select name="sous_secteur" id="sous_secteur" class="form-control">
	        			<option value="">Select</option>
	        			<?php //foreach($sous_secteur as $sous_sec){?>
	        			<!-- <option value="<?php echo $sous_sec['sid'];?>"><?php echo $sous_sec['secteurs'];?></option> -->
	        			<?php // } ?>
	        		</select>
	        	</div>
	    
	      	</div>

	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label">Catégory</label>
	        		<select name="category" id="category" class="form-control">
	        			<option value="">Select</option>
	        			<?php foreach($category as $cat){?>
	        			<option value="<?php echo $cat['cat_id'];?>"><?php echo $cat['catrgory'];?></option>
	        			<?php } ?>
	        		</select>
	        	</div>
	    
	      	</div>

	      	<div class="modal-body">
	      		
				<div class="form-group">        		
	        		<label for="inputError" class="control-label">Limit</label>
	        		<select name="limit" id="limit" class="form-control">
	        			<option value="">Select</option>
	        			<?php foreach($limit as $limit){?>
	        			<option value="<?php echo $limit['limit_id'];?>"><?php echo $limit['limit_name'];?></option>
	        			<?php } ?>
	        		</select>
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
		 $("#employerForm")[0].reset();	
		 $("h4").text("Create Employeur");			 
			$('.modal-body').load(function(){
			   			
            	$('#myModal').modal({show:true});
        	});
		});			
	});


	$("#secteur").change(function(){
		get_sous_secteur();
	});

	function get_sous_secteur(){

		var sec_id  = $("#secteur").val(); 
		$.ajax({
			type:"POST",
			url:"<?php echo base_url()?>Employeurs/get_sous_secteur_by_secteur",
			data:{ sec_id : sec_id},
			success:function(response)
			{
				if(response)
				{
					$("#sous_secteur").html(response);
				}
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



	function edit_employer(row_id)
	{
		$("#employerForm")[0].reset();
		$("#myModal").modal('show');

		$("h4").text("Edit Employeur");

		$.ajax({

			type:"POST",
			url:'<?php echo base_url("Employeurs/edit_employer");?>',
			data:{emp_id : row_id},
			success:function(response) {
				
			    var jdata  =  JSON.parse(response);
			    // console.log(jdata);
			    
				$("#edit_id").val(jdata['emp_id']);
				$("#employer").val(jdata['employer_name']);
				$("#secteur").val(jdata['secteur_id']);
				get_sous_secteur();
				
				$("#limit").val(jdata['limit_id']);
			    $("#category").val(jdata['category_id']);

			    setTimeout(function(){                  		
                			$("#sous_secteur").val(jdata['sous_secteur_id']);
                }, 100); 
			   
			

			}
		});
	}


	function delete_employer(id)
	{

	
		if(confirm("Are you sure you want to delete this Record?")){		
	  
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Employeurs/delete_employer',
				data: {id:id},
				cache: false,
				success: function(resp) {
				
					if(resp){
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

	$("#employerForm").validate({
		errorClass: 'has-error',
		rules: {				
			 
	         employer: {
	            required: true,	
	            minlength: 3,
	            maxlength: 30,
	         },
	         secteur:"required"

		},
		messages: {
			
			employer: {
				required: "Please enter employer",
			},
			secteur:"Please enter secteur"
		},
		submitHandler: function(form) {			
            $.ajax({
                url: '<?php echo base_url("Employeurs/save_employer");?>',
                type: 'POST',
                data: $(form).serialize(),
                beforeSend: function(){
                	$('.submitBtn').attr("disabled","disabled");
                	$('#employerForm').css("opacity","0.5");
            	},
                success: function(response) {

                    // alert(response);
                    // return false;
                	
                	$('.flash-msg').html('').removeClass('alert alert-danger fade in');  
                	if(response=='success'){                		             		
                		$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Employeur Saved Successfully').addClass('alert alert-success fade in').fadeOut(3000);  
                		setTimeout(function(){                  		
                			location.reload();
                		 }, 1500); 

                	}
                	else if(response =='already_exists')
                	{
                		$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> This Employeur Already Exists..').addClass('alert alert-danger fade in').fadeOut(5000); 
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
