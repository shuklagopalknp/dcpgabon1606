<style type="text/css">
	 .form-group{   padding: 4px;}
	 	.form-control .has-error{
		border: 1px solid #ff0000;
	}



fieldset {
    font-family: sans-serif;
    border: 1px solid #eee;
   	border-radius: 5px;
    padding: 2px;
}

fieldset legend {
    background: #dff0d8;
    color: #000;
    padding: 5px 10px ;
    font-size: 14px;
    border-radius: 5px;
}

.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  left: 4px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.d-flex{display:flex; align-items:center;}
.d-flex .check_new {
    margin-right: 24px;
}
</style>
<div id="content-wrapper">
	<div class="row">
		<?php 
		
		
		?>	

		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div id="content-header" class="clearfix">
						<div class="pull-left">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('/');?>">Dashboard</a></li>
								<li><a href="<?php echo base_url('Roles');?>">Roles</a></li>
								<li><span>Add Role</span></li>
								
							</ol>
						</div>
					</div>
					<h1>Add New Role</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">

					<div class="flash-msg"></div>
					<div class="main-box">	
										
						<div class="main-box-body clearfix">
							<br>
								<?php if(isset($is_edit)){?>
										<form role="form" method="post" id="roleForm" action="<?php echo base_url('Add_Roles/edit_role_user');?>">
											<input type="hidden" name="edit_id" id="edit_id" value="<?= $is_edit?>">
									<?php }else{?>
									<form role="form" method="post" id="roleForm" action="<?php echo base_url('Add_Roles/add_role_user');?>">
								<?php }?>
									
			<div class="flash-msg"></div>
			
	      	<div class="modal-body">
	      		
				<div class="form-group">     

	        		<label for="inputError" class="control-label" >Role name</label>
	        		<input type="text" class="form-control" id="role_name" name="role_name" value="<?php if(isset($is_edit)){print_r($role_permissions_of_id[0]['name']) ;}?>" >
	        	</div>
	        	<div class="form-group">
	        		<label for="inputError" class="control-label">Role description</label>
	        		<input type="text" class="form-control" id="role_description" name="role_description" value="<?php if(isset($is_edit)){print_r($role_permissions_of_id[0]['field_data']) ;}?>">
	        	</div>
	      	</div>
	      
         

								<table id="sys_table" class="table table-hover sorttable_c1 table-striped">

									<tr>
										<th>Menu Check</th>
										<th>Menu Tabs</th>
										<th>Permission Check</th>

									</tr>

								<?php 
								$permission=[];
								$portal_permission=[];
								if(isset($is_edit)){
								$permission= explode(',', $role_permissions_of_id[0]['user_permission']);
								$portal_permission= explode(',', $role_permissions_of_id[0]['portal_permission']);
								// echo "<pre>";
								// print_r($portal_permission);
								// echo "</pre>";
								
								}
								
								
								foreach($role_permissions as $key=>$row) { ?>

								<tr>
									<td style="width:10%"><input type="checkbox" class=" tab_c" name="permission[]"  value=<?php echo '"'.$row["permission_id"].'" ';
									if(in_array($row["permission_id"], $permission)){echo "checked";}
									if($row["permission_id"]==1){echo " checked onclick='return false' ";}
									?> /></td>
									<td style="width:30%">
										<label> <?= $row["permission_name"]?></label>
									</td>
									<td style="width:30%">
									<div class="d-flex">
										<?php if($row["permission_type"]!=3){?>
										<div class="check_new">
										<input type="checkbox" class=" tab_c" name="permissionRoles[]" id="<?php echo $row["permission_id"].'_1'; ?>" value=<?php echo $test1='"'.$row["permission_id"].'_1"';

										if(in_array($row["permission_id"]."_1", $portal_permission)){echo " checked";}
										?> /> <label for="<?php echo $row["permission_id"].'_1'; ?>">Create</label>
										</div>
										<div class="check_new">
										<input type="checkbox" class=" tab_c" name="permissionRoles[]" id="<?php echo $row["permission_id"].'_2'; ?>" value=<?php echo $test2='"'.$row["permission_id"].'_2"';

										if(in_array($row["permission_id"]."_2", $portal_permission)){echo " checked";}
										?>  /> <label for="<?php echo $row["permission_id"].'_2'; ?>">Edit</label>
										</div>
										<!--- <div class="check_new">
										<input type="checkbox" class=" tab_c" name="permissionRoles[]" id="<?php echo $row["permission_id"].'_3'; ?>" value=<?php echo $test3=$row["permission_id"].'_3';
										if(in_array($row["permission_id"]."_3", $portal_permission)){echo " checked";}
										?> /> <label for="<?php echo $row["permission_id"].'_3'; ?>">View</label>
										</div> --->
										<?php 
									}
										if($row["permission_type"]==1){?>
										<div class="check_new">
										<input type="checkbox" class=" tab_c" name="permissionRoles[]" id="<?php echo $row["permission_id"].'_4'; ?>" value=<?php echo $row["permission_id"].'_4';
										if(in_array($row["permission_id"]."_4", $portal_permission)){echo " checked";}
										?> /> <label for="<?php echo $row["permission_id"].'_4'; ?>"> Delete</label>
										</div>
									<?php }else if($row["permission_type"]==2){?>
<!--									<div class="check_new">
										<input type="checkbox" class=" tab_c" name="permissionRoles[]" id="<?php echo $row["permission_id"].'_5'; ?>" value=<?php echo $row["permission_id"].'_5';
										if(in_array($row["permission_id"]."_5", $portal_permission)){echo " checked";}
										?> /> <label for="<?php echo $row["permission_id"].'_5'; ?>"> Approval</label>
										</div>-->
										<div class="check_new">
										<input type="checkbox" class=" tab_c" name="permissionRoles[]" id="<?php echo $row["permission_id"].'_6'; ?>" value=<?php echo $row["permission_id"].'_6';
										if(in_array($row["permission_id"].'_6', $portal_permission)){echo " checked";}
										?> /> <label for="<?php echo $row["permission_id"].'_6'; ?>">Decision</label>
										</div>
									<?php }else{ ?>

									<?php }?>
									</div>
									</td>
									
								</tr>	


								
								
								<?php }?>

								</table>
								
							</fieldset>
								
														
								
							<div class="form-group">
								<div class="col-lg-offset-4 col-lg-4 text-center " style="margin-bottom:10px;">
									<br>
									
									<button type="submit" id="button_1" class="btn btn-primary">Submit</button>
									<br>
									<!-- <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="saveloder" style="position: absolute;top: 8px;    left: 123px;    display: none;"> -->
								</div>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	