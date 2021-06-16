<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div id="content-header" class="clearfix">
						<div class="pull-left">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('Admin_Dashboard');?>">Dashboard</a></li>
								<li><a href="<?php echo base_url('Groups');?>">Groups</a></li>
								<li class="active"><span>Assign Roles</span></li>
							</ol>
						</div>
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="flash-msg">
					</div>
					<div class="main-box no-header clearfix">
						<div class="main-box-body clearfix">
							<div class="table-responsive">
								<table class="table user-list table-hover" id="table-example">
									<thead>
										<tr>
											
											<th>Select</th>
											<th><span>Roles</span></th>
											
										</tr>
									</thead>
									<tbody>
										<?php 
 										$count = 1;
										foreach ($roles as $row) {?>										
											<tr>
										
											<td>


												<input type="checkbox" name="roles_id[]" id="<?php echo $row['id']; ?>" class="role_class" <?php if(!empty($assigned_roles)){ if(in_array($row['id'],$assigned_roles)){ echo "checked"; } }?> >

											</td>
											<td><?php echo $row['name']; ?></td>
											</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>

							  <input type="hidden" id="assigned_ids" value='<?php if($assigned_roles != null && !empty($assigned_roles))echo  json_encode($assigned_roles); ?>'>

							<center>
							<button type="button" class="btn btn-success submit_btn"> <img src="<?php echo base_url('assets/img/select2-spinner.gif'); ?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Submit </button>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	

<script type="text/javascript">

var arr =  Array();
	$(function() {

		if($("#assigned_ids").val())
		{
		  arr =  JSON.parse($("#assigned_ids").val());


		}

		
		//console.log(arr);
		
	});
	
	
	$(".role_class").click(function(){

	    if($(this).is(":checked")){

			if(arr.indexOf(this.id) == -1)
			{
				arr.push(this.id);
			}
			
		}
		else if($(this).is(":not(:checked)"))
		{
			if(arr.indexOf(this.id) >= 0)
			{
				arr.splice(arr.indexOf(this.id),1);
			}
		}

	//	console.log(arr);

	});
	
	
	$(".submit_btn").click(function(){

		// console.log(arr);

		// return false

		var group_id  = "<?php echo $group_id ;?>";
		$.ajax({

			type :"POST",
			url:"<?php echo base_url()?>Groups/save_assignee",
			data:{role_ids : arr,group_id:group_id},
			beforeSend: function(){
				$('.lodergif').css("display","inline");   
			 },
			success:function(response){
				$('.lodergif').css("display","none");   

				if(response)
				{
					$("html, body").animate({ scrollTop: 0 }, "slow");
					$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i>Roles Assigned Successfully').addClass('alert alert-success fade in'); 
					setTimeout(function(){
						window.location.href = "<?php echo base_url()?>Groups";
					}, 1500);
				}
			}
		});
	})
	
	
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