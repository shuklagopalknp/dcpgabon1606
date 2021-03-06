<link rel="stylesheet" href="<?php echo base_url('assets/css/libs/select2.css');?>" type="text/css"/>
<style type="text/css">
	.form-control .has-error{
		border: 1px solid #ff0000;
	}
.profile-pic {
    max-width: 100%;
    
    display: block;
}

.file-upload {
    display: none !important;
}
.circle {
    border-radius: 1000px !important;
    overflow: hidden;
    width: 128px;
    height: 128px;
    border: 8px solid rgba(239, 236, 236, 0.85);
    
}
img {
    max-width: 100%;
    height: auto;
}
.p-image {
  position: relative;
    top: -21px;
    left: 81px;
  color: #666666;
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.p-image:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
}
.upload-button {
  font-size: 1.2em;
}

.upload-button:hover {
  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
  color: #06612c;
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
									<li class="active"><span>Users</span></li>
								</ol>
							</div>
						</div>
						<div class="clearfix">
							<h1 class="pull-left">Users</h1>
							<div class="pull-right top-page-ui">
								<a class="btn btn-primary pull-right openBtn" data-toggle="modal" data-target="#myModal">
									<i class="fa fa-plus-circle fa-lg"></i> Add user
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
								<textarea row="20" cols="10" class="form-control preview" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
									<table id="table-example" class="table user-list table-hover">
										<thead>
											<tr>
												<th><span>User Name & Type</span></th>
												<th><span>Email</span></th>
												<th><span>Roles</span></th>
												<th class="text-center"><span>Status</span></th>
												<th><span>Created</span></th>
												<th><span>Action</span></th>
											</tr>
										</thead>
										<tbody>
											<?php //echo "<pre>", print_r($users);
											$i=0;
											if(!empty($users)){
											foreach ($users as $usr) {										
											?> 
											<tr id="info_row<?php echo $usr['uid'];?>">
												<td>
													<?php
													if(!empty($usr['avatar'])){
													?>
													<img src="<?php echo base_url('assets/user-profile-img/').$usr['avatar'];?>" alt=""/>
													<a href="#" class="user-link"><?php echo $usr['first_name'];?></a>
													<span class="user-subhead"><?php echo $usr['type'];?></span>
												<?php }else{ ?>
													<img src="<?php echo base_url('assets/img/user.png');?>" alt=""/>
													<a href="#" class="user-link"><?php echo $usr['first_name'];?></a>
													<span class="user-subhead"><?php echo $usr['type'];?></span>
												<?php } ?>
												</td>
												<td><?php echo $usr['u_email'];?></td>
												<td><?php echo $usr['field_data'];?></td>
											<td class="text-center">
											<?php 
												if($usr['is_active']=='1'){
												?>
											<span class="label label-success">
												Active
											</span>
										<?php }else{?>
											<span class="label label-danger">
												InActive
											</span>
										<?php }?>
											</td>											
											<td><?php echo date("d-m-Y", strtotime($usr['created_at']));?></td>
												<td style="width: 20%;">
													<a href="#" class="table-link">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													<a href="JavaScript:Void(0);" class="table-link" data-toggle="modal" data-target="#edituserModal" onClick="edit_users(<?php echo $usr['uid']; ?>)">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
														</span>
													</a>
													<a href="JavaScript:Void(0);" onclick="remove_user('<?php echo $usr['uid'];?>')" id="<?php echo $usr['uid'];?>" class="table-link danger delbtn">
													<img src="<?php echo base_url("assets/img/loading.gif");?>" id="loder<?php echo $usr['uid'];?>" style="display:none;">
														<span class="fa-stack">
															<i class="fa fa-square fa-stack-2x"></i>
															<i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
														</span>
													</a>
												</td>
											</tr>
											<?php 
											$i++;
											 }
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
		
<div id="myModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info">
    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title heading lead">User Form</h4>
		</div>

		<form role="form" method="post" id="userForm" enctype="multipart/form-data" accept-charset="utf-8">
	      	<div class="modal-body">
	      		<div class="error-msg" id="textareaID1"></div>
	      		<div class="form-group form-group-select2">
	        		<label>Select Role</label>	        		
	        		<select style="width:100%" id="sel2" class="" name="userrole">
	        			<?php foreach ($userrole as $role ) {
	        				if($role['id']!='1'){
	        				echo '<option value="'.$role['id'].'">'.$role['name'].'</option>'."\r\n";
	        			} } ?>	        			
	        		</select>
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Name</label>
	        		<input type="text" class="form-control" id="user_name" name="user_name" value="" placeholder="Enter name" autocomplete="off" />
	        	</div>
	        	
	        	<div class="form-group form-group-select2">
	        		<label>Select Branch</label>

	        		<select style="width:100%" id="sel3" class="form-control" name="userbranch">
	        			<option>Select Branch</option>
	        			<?php foreach ($branch as $key ) {
	        				if($users[0]['is_admin']!='1'){
	        				echo '<option value="'.$key['bid'].'">'.$key['branch_name'].'</option>'."\r\n";
	        			} } ?>	        			
	        		</select>
	        	</div>

	        	<div class="form-group">
	        		<label>Status</label>	        		
	        		<select class="form-control"  name="status" id="status">	        			
	        			<option value="1">Active</option>
	        			<option value="0">InActive</option>	        			        			
	        		</select>
	        	</div>        	

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Email</label>
	        		<input type="email" class="form-control" id="user_email" name="user_email" value="" placeholder="Email" autocomplete="off" />
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Password</label>
	        		<div class="input-group">
	        			<input type="password" class="form-control" id="user_pass" name="user_pass" value="" placeholder="Password" autocomplete="off" />
	        			<span class="add-on input-group-addon reveal"><i class="fa fa-eye-slash" id="eye"></i></span>
	        		</div>
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Codes Exploitant</label>
	        		<input type="text" class="form-control" id="exploitent" name="exploitent" value="" placeholder="Enter Codes Exploitant" autocomplete="off" />
	        	</div>

	        	<!-- <div class="form-group">        		
	        		<label for="inputError" class="control-label" >Entit??s</label>
	        		<input type="text" class="form-control" id="entities" name="entities" value="" placeholder="Enter Entit??s" autocomplete="off" />
	        	</div> -->

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Bureau</label>
	        		<select class="form-control"  name="department" id="department">
	        			<option value="">Select Bureau</option>	        			
	        			<option value="DIRECTION GENERALE">DIRECTION GENERALE</option>
	        			<option value="Groupe AGENCE CENTRALE">Groupe AGENCE CENTRALE</option> 
	        			<option value="Prima">Prima</option>
	        			<option value="RR">RR</option>
	        			<option value="Devenir">Devenir</option>
	        			<option value="Prestige">Prestige</option>
	        			<option value="Front de Mer ADL">Front de Mer ADL</option>
	        			<option value="Louis">Louis</option>
	        			<option value="Okala">Okala</option>
	        			<option value="Oloumi">Oloumi</option>
	        			<option value="Owendo">Owendo</option>
	        			<option value="Universit??">Universit??</option>
	        			<option value="Mont Bouet">Mont Bouet</option>
	        			<option value="Nzeng- Ayong">Nzeng- Ayong</option>
	        			<option value="First">First</option>
	        			<option value="Gamba">Gamba</option>
	        			<option value="DAHU">DAHU</option>
	        			<option value="Moanda">Moanda</option>
	        			<option value="Franceville">Franceville</option>
	        			<option value="Mouila">Mouila</option>
	        		</select>
	        		<!--<input type="text" class="form-control" id="department" name="department" value="" placeholder="Enter Department" autocomplete="off" />-->
	        	</div>
	        	
	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Code Agence Atlas</label>
	        		<select class="form-control"  name="codeAgenceAtlas" id="codeAgenceAtlas">
	        			<option value="">Select Code</option>	 	        			
	        			<option value="09069">09069</option>
	        			<option value="09070">09070</option>
	        			<option value="09075">09075</option>
	        			<option value="09087">09087</option>
	        			<option value="04761">04761</option>
	        			<option value="04762">04762</option>
	        			<option value="09073">09073</option>
	        			<option value="04760">04760</option>
	        			<option value="04764">04764</option>
	        			<option value="09071">09071</option>
	        			<option value="04763">04763</option>
	        			<option value="09080">09080</option>
	        			<option value="09086">09086</option>
	        			<option value="04759">04759</option>
	        			<option value="09081">09081</option>
	        			<option value="09083">09083</option>
	        			<option value="09082">09082</option>
	        			
	        		</select>
	        		
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Target Loan Count</label>
	        		<input type="number" class="form-control" id="target_loan_count" name="target_loan_count" value="" placeholder="Enter Target Loan Count" autocomplete="off" min="1" />
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Target Loan Amount</label>
	        		<input type="number" class="form-control" id="target_loan_amount" name="target_loan_amount" value="" placeholder="Enter Target Loan Amount" autocomplete="off" min="1" />
	        	</div>

	        	<div class="form-group">
	        		<label for="inputError" class="control-label" >Image Upload</label>
	        		<div class="small-12 medium-2 large-2 columns">
	        			<div class="circle">	        				
	        				<img class="profile-pic" src="<?php echo base_url('assets/img/user.png');?>">
	        			</div>
	        			<div class="p-image">
	        				<i class="fa fa-camera upload-button"></i>
	        				<input class="file-upload" id="imageFile" type="file" name="file" accept="image/*"/>
	        			</div></div>
				</div>
	        	
	      	</div>
	      	<div class="modal-footer">
				<img src="<?php echo base_url("assets/img/loading.gif");?>" style="display:none; position:relative; " class="sronly">
	          <button type="submit" class="btn btn-primary waves-effect waves-light submitBtn" name="save" value="Save">Submit</button>
	          <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button> 	               
	        </div> 
         </form>
    </div>
  </div>
</div>
<!-- ====================Edit Seccion ============================== -->
<div id="edituserModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info">
    <!-- Modal content-->
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title heading lead">Edit User Form</h4>
		</div>

		<form role="form" method="post" id="userEditForm" enctype="multipart/form-data" accept-charset="utf-8">
	      	<div class="modal-body">
	      		<div class="error-msg" id="textareaID12"></div>
	      		<textarea class="logd" style=" display:none;margin: 0px; height: 198px; width: 575px;"></textarea>
				  
				
				<div class="form-group form-group-select2" style="">
	        		<label>Select Role</label>	        		
	        		<select style="width:100%" id="sel12" class="" name="edit_userrole">
	        			<?php foreach ($userrole as $role ) {
	        				if($role['id']!='1'){
	        				echo '<option value="'.$role['id'].'">'.$role['name'].'</option>'."\r\n";
	        			} } ?>	        			
	        		</select>
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Name</label>
	        		<input type="text" class="form-control" id="edit_user_name" name="edit_user_name" value="" placeholder="Enter name" autocomplete="off" />
	        	</div>
	        	
	        	<div class="form-group form-group-select2" style="">
	        		<label>Select Branch</label>

	        		<select style="width:100%" id="sel13" name="edit_userbranch">
	        			<option>Select Branch</option>
	        			<?php foreach ($branch as $key ) {
	        				if($users[0]['is_admin']!='1'){
	        				echo '<option value="'.$key['bid'].'">'.$key['branch_name'].'</option>'."\r\n";
	        			} } ?>	        			
	        		</select>
	        	</div>

	        	<div class="form-group" style="">
	        		<label>Status</label>	        		
	        		<select class="form-control" name="edit_status" id="edit_status" disable>
	        			<option value="1">Active</option>
	        			<option value="0">InActive</option>
	        		</select>
	        	</div>        	

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Email</label>
	        		<input type="email" class="form-control" id="edit_user_email" name="edit_user_email" value="" placeholder="Email" autocomplete="off" />
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Password</label>
	        		<div class="input-group">
	        			<input type="password" class="form-control" id="user_pass" name="user_pass" value="" placeholder="Password" autocomplete="off" />
	        			<span class="add-on input-group-addon reveal"><i class="fa fa-eye-slash" id="eye2"></i></span>
	        		</div>
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Codes Exploitant</label>
	        		<input type="text" class="form-control" id="edit_exploitent" name="edit_exploitent" value="" placeholder="Enter Codes Exploitant" autocomplete="off" />
	        	</div>

	        	<!-- <div class="form-group">        		
	        		<label for="inputError" class="control-label" >Entit??s</label>
	        		<input type="text" class="form-control" id="edit_entities" name="edit_entities" value="" placeholder="Enter Entit??s" autocomplete="off" />
	        	</div> -->

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Bureau</label>
	        		<select class="form-control"  name="edit_department" id="edit_department">
	        			<option value="">Select Bureau</option>	    	        			
	        			<option value="DIRECTION GENERALE">DIRECTION GENERALE</option>
	        			<option value="Groupe AGENCE CENTRALE">Groupe AGENCE CENTRALE</option> 
	        			<option value="Prima">Prima</option>
	        			<option value="RR">RR</option>
	        			<option value="Devenir">Devenir</option>
	        			<option value="Prestige">Prestige</option>
	        			<option value="Front de Mer ADL">Front de Mer ADL</option>
	        			<option value="Louis">Louis</option>
	        			<option value="Okala">Okala</option>
	        			<option value="Oloumi">Oloumi</option>
	        			<option value="Owendo">Owendo</option>
	        			<option value="Universit??">Universit??</option>
	        			<option value="Mont Bouet">Mont Bouet</option>
	        			<option value="Nzeng- Ayong">Nzeng- Ayong</option>
	        			<option value="First">First</option>
	        			<option value="Gamba">Gamba</option>
	        			<option value="DAHU">DAHU</option>
	        			<option value="Moanda">Moanda</option>
	        			<option value="Franceville">Franceville</option>
	        			<option value="Mouila">Mouila</option>
	        		</select>
	        		<!--<input type="text" class="form-control" id="department" name="department" value="" placeholder="Enter Department" autocomplete="off" />-->
	        	</div>
	        	
	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Code Agence Atlas</label>
	        		<select class="form-control"  name="edit_codeAgenceAtlas" id="edit_codeAgenceAtlas">	
	        			<option value="">Select Code</option>	            			
	        			<option value="09069">09069</option>
	        			<option value="09070">09070</option>
	        			<option value="09075">09075</option>
	        			<option value="09087">09087</option>
	        			<option value="04761">04761</option>
	        			<option value="04762">04762</option>
	        			<option value="09073">09073</option>
	        			<option value="04760">04760</option>
	        			<option value="04764">04764</option>
	        			<option value="09071">09071</option>
	        			<option value="04763">04763</option>
	        			<option value="09080">09080</option>
	        			<option value="09086">09086</option>
	        			<option value="04759">04759</option>
	        			<option value="09081">09081</option>
	        			<option value="09083">09083</option>
	        			<option value="09082">09082</option>
	        			
	        		</select>
	        		
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Target Loan Count</label>
	        		<input type="number" class="form-control" id="edit_target_loan_count" name="target_loan_count" value="" placeholder="Enter Target Loan Count" autocomplete="off" min="1" />
	        	</div>

	        	<div class="form-group">        		
	        		<label for="inputError" class="control-label" >Target Loan Amount</label>
	        		<input type="number" class="form-control" id="edit_target_loan_amount" name="target_loan_amount" value="" placeholder="Enter Target Loan Amount" autocomplete="off" min="1" />
	        	</div>


	        	<div class="form-group" style="">
	        		<label for="inputError" class="control-label" >Image Upload</label>
	        		<div class="small-12 medium-2 large-2 columns">
	        			<div class="circle">	        				
	        				<img class="profile-pic" id="editpic" src="<?php echo base_url('assets/img/user.png');?>">
	        			</div>
	        			<div class="p-image">
	        				<i class="fa fa-camera upload-button"></i>
	        				<input class="file-upload" id="imageFile1" type="file" name="editfile" accept="image/*" value="" />	        				
	        			</div>
					  </div>
				</div>
	        	
	      	</div>
	      	<div class="modal-footer">
				<img src="<?php echo base_url("assets/img/loading.gif");?>" style="display:none; position:relative;" class="editsronly">
				<input type="hidden" id="editid" name="editid" value="" />
				<input type="hidden" id="avatar_id" name="avatar_id" value="" />
				<input type="hidden" id="avatar" name="avatar" value="" />
	          <button type="submit" class="btn btn-primary waves-effect waves-light submitBtn" name="save" value="Save">Submit</button>
	          <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button> 	               
	        </div> 
         </form>
    </div>
  </div>
</div>



<script type="text/javascript">	
	function edit_users(id){

		$("#target_loan_count").val('');
		$("#target_loan_amount").val('');

		$.ajax({ 
			type: "POST", 
			url: '<?php echo base_url("Users/editmodal_users");?>',
			data:{id:id},
			success: function(resp){
				var jdata=jQuery.parseJSON(resp);
				console.log(jdata);
				var imgUrl = jdata.avatar
				$(".logd").val(JSON.stringify(jdata)); 
				$('#sel12').select2('data', {id: jdata.is_admin, text: jdata.type});
				$("#edit_user_name").val(jdata.first_name);
				if(jdata.branch_name != null)
				{
					$('#sel13').select2('data', {id: jdata.branch_id, text: jdata.branch_name});
				}
				else
				{
					$('#sel13').select2('data', {id:'', text:''});
				}
				
				$("#edit_user_email").val(jdata.u_email);
				$("#edit_status").val(jdata.is_active);
				$("#editpic").attr('src', './assets/user-profile-img/'+jdata.avatar);
				$("#avatar").val(jdata.avatar);
				$("#editid").val(jdata.id);
				$("#avatar_id").val(jdata.avatar_id);	

				$("#edit_exploitent").val(jdata.exploitent);
				$("#edit_entities").val(jdata.entities);
				// $("#edit_department").val(jdata.department);
				$("#edit_target_loan_count").val(jdata.target_loan_count);
				$("#edit_target_loan_amount").val(jdata.target_loan_amount);
				
				$("#edit_department").val(jdata.department);
				$("#edit_codeAgenceAtlas").val(jdata.codeAgenceAtlas);
			}
		 });

	}
</script>

<script type="text/javascript">
	$(document).ready(function() {
		var table = $('#table-example').dataTable({
			'info': false,
			'order': [[ 4, 'desc' ]],
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
		
		
		//new $.fn.dataTable.FixedHeader( tableFixed );
	});
	</script>
<script type="text/javascript">
	$(function() {	
		//nice select boxes
		$('#sel2').select2();
		$('#sel12').select2();
		$('#sel13').select2();	
		$("#target_loan_count").val('');
		$("#target_loan_amount").val('');	
		$('.openBtn').on('click',function(){			 
			$('.modal-body').load(function(){				
            	$('#myModal').modal({show:true});
        	});
		});			
	});

	jQuery.validator.addMethod("user_email", function(value, element, param) {
	    return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
	},'The Email address field is not a valid e-mail address!');	
	// validate signup form on keyup and submit

	$('[data-dismiss=modal]').on('click', function (e) {
		var $t = $(this),		
		target = $t[0].href || $t.data("target") || $t.parents('#myModal') || [];		
		$(target)
	    .find("input").val('').end().find("input[type=checkbox]").prop("checked", " ").end();
	    $("label.has-error").html(' ');
	    $("label.has-error").removeClass("has-error");
	    //document.getElementById("errorDiv1").innerHTML=" ";
	   });


	$.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter atleast one alphabet uppercase,one alphabet lowercase and special characters with minimum length 8"
);

	$("#userForm").validate({
		errorClass: 'has-error',
		rules: {				
			 user_name: {
	            required: true,	
	            minlength: 3,
	            maxlength: 255,
	         },
			status: {
				required: true,
			},
			userrole: {
				required: true,
			},
			user_email: {
				required: true,
				user_email: true,	
			},
			user_pass: {
				required: true,
				regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/,

			},
			file: { 
				required: true,
				extension: "png|jpeg|gif",
				filesize: 1048576
			},
		},
		messages: {
			user_name: {
				required: "The name field is required.",
			},
			user_email: {
				required: "Please enter your email address.",
			},
			user_pass: {
				required: "Please enter your password.",
			},
			file: "File must be JPG, GIF or PNG, less than 1MB"
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
		//alert("fffff");		

		//var form = $(form).serialize();
		var form = $("#userForm");    
   	 	var formdata = new FormData(form[0]);
   	 	formdata.append('file', $('#imageFile')[0].files[0]);        	
            $.ajax({
                url: '<?php echo base_url("users/add_user");?>',
                type: 'POST',               
               	data:formdata,
             	processData:false,
             	contentType:false,                
                cache: false,                
                beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                	$('#userForm').css("opacity",".5");
					$('.sronly').css("display","inline");
            	},
                success: function(response) {                	
                	//console.log(response);                	
                	setTimeout(function(){ 
					$("form").trigger("reset");
					$('html, body').animate({
						scrollTop: $("#textareaID1").offset().top
					}, 1);
					$('.sronly').css("display","none");
					
                	$('.error-msg').html('').removeClass('alert alert-danger fade in');  
                	if(response==1){                		             		
                		$('.error-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> User updated successfully').addClass('alert alert-success fade in').fadeOut(3000).focus();							
							//$('#textareaID1').focus();
                			setTimeout(function(){                  		
                				location.reload();
                		 	}, 1500); 
                	}else{
                		$('.error-msg').html(response).addClass('alert alert-danger fade in');                   
               		}
               			$('#userForm').css("opacity","");
                		$(".submitBtn").removeAttr("disabled");
            		}, 3000);  
                }, 
                error: function (textStatus, errorThrown) {
                	$('#userForm').css("opacity","");
                		$(".submitBtn").removeAttr("disabled");
            	}           
            }); 

           
          }
	});



	$("#userEditForm").validate({
		errorClass: 'has-error',
		rules: {				
			 edit_user_name: {
	            required: true,	
	            minlength: 3,
	            maxlength: 255,
	         },
			edit_status: {
				required: true,
			},
			edit_userrole: {
				required: true,
			},
			edit_user_email: {
				required: true,
				user_email: true,	
			},			
			editfile: { 
				required: true,
				extension: "png|jpe?g|gif",
				filesize: 1048576
			},
		},
		messages: {
			edit_user_name: {
				required: "The name field is required.",
			},
			edit_user_email: {
				required: "Please enter your email address.",
			},			
			editfile: "File must be JPG, GIF or PNG, less than 1MB"
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
		//alert("fffff");		

		//var form = $(form).serialize();
		var form = $("#userEditForm");    
   	 	var formdata = new FormData(form[0]);
   	 	formdata.append('file', $('#imageFile1')[0].files[0]);        	
            $.ajax({
                url: '<?php echo base_url("users/edit_user");?>',
                type: 'POST',               
               	data:formdata,
             	processData:false,
             	contentType:false,                
                cache: false,                
                beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                	$('#userEditForm').css("opacity",".5");
					$('.editsronly').css("display","inline");
            	},
                success: function(response) {                	
                	//console.log(response);                	
                	setTimeout(function(){ 
					//$("form").trigger("reset");
					$('html, body').animate({
						scrollTop: $("#textareaID12").offset().top
					}, 1);
					$('.editsronly').css("display","none");
					
                	$('.error-msg').html('').removeClass('alert alert-danger fade in');  
                	if(response==1){                		             		
                		$('.error-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> User Updated successfully').addClass('alert alert-success fade in').fadeOut(3000).focus();							
							//$('#textareaID12').focus();
                			setTimeout(function(){                  		
                				location.reload();
                		 	}, 1500); 
                	}else{
                		$('.error-msg').html(response).addClass('alert alert-danger fade in');                   
               		}
               			$('#userEditForm').css("opacity","");
                		$(".submitBtn").removeAttr("disabled");
            		}, 3000);  
                }, 
                error: function (textStatus, errorThrown) {
                	$('#userEditForm').css("opacity","");
                	$(".submitBtn").removeAttr("disabled");
            	}           
            }); 

           
          }
	});


	$('#eye').click(function(){       
        if($(this).hasClass('fa-eye-slash')){           
          $(this).removeClass('fa-eye-slash');          
          $(this).addClass('fa-eye');          
          $('#user_pass').attr('type','text');            
        }else{         
          $(this).removeClass('fa-eye');          
          $(this).addClass('fa-eye-slash');            
          $('#user_pass').attr('type','password');
        }
    });

    $('#eye2').click(function(){       
        if($(this).hasClass('fa-eye-slash')){           
          $(this).removeClass('fa-eye-slash');          
          $(this).addClass('fa-eye');          
          $('#user_pass').attr('type','text');            
        }else{         
          $(this).removeClass('fa-eye');          
          $(this).addClass('fa-eye-slash');            
          $('#user_pass').attr('type','password');
        }
    });

	$(document).ready(function() {
		$("input[name=file]").change(function() {
			var file = this.files[0];
			var imagefile = file.type;
			var match= ["image/jpeg","image/png","image/jpg"];
			if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
				alert('Please select a valid image file (JPEG/JPG/PNG).');
				$("input[name=file]").val('');
				return false;
			}
		});
		var readURL = function(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('.profile-pic').attr('src', e.target.result);
	            }
	    
	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    $(".file-upload").on('change', function(){
        readURL(this);
    	});    
	    $(".upload-button").on('click', function() {
	       $(".file-upload").click();
	    });
	});
	
	
</script>	
<link rel="stylesheet" href="<?php echo  base_url('assets/css/jquery-ui.css'); ?>">`
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>	
	function remove_user(delid){
		event.preventDefault(delid);
		var currentForm = $(this).closest('tr');
		var dynamicDialog = $('<div id="conformBox">'+
        '<span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;">'+
        '</span>Are you sure to delete the item?</div>');
		dynamicDialog.dialog({
                title : "Are you sure?",
                closeOnEscape: true,
                modal : true,
        
               buttons : 
                        [{
						text : "Yes",
						click : function() {
							$(this).dialog("close");
							$.ajax({
								url: '<?php echo base_url("users/deleteuser");?>',
								type: 'POST',               
								data:{"del": delid},             	                
								cache: false,                
								beforeSend: function(){					
									$('#loder'+ delid).css("display","inline");
									$('#info_row' + delid).css("opacity",".5");
									$('.preview').val('');
								},
								success: function(response) {                	
									console.log(response);
									$('#loder'+ delid).css("display","none");
									$('.preview').val($.trim(response));
									$('#info_row' + delid).fadeOut(300, function() { $(this).remove(); });
								},                          
							});
								
						}
                        },
                        {
                                text : "No",
                                click : function() {
                                        $(this).dialog("close");
                                }
                        }]
        });
        return false;    
	
			
	}
	
</script>
<!-- ---edit users------------>

</body>
</html>