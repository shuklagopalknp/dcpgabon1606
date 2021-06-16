<style>
.modal-dialog.modal-notify.modal-info .modal-header {
	background-color: #00c851;
}
.modal-dialog.modal-notify .heading {
	margin: 0;
	padding: .3rem;   
	color: #fff;
}
/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  width: 20%;
  height: 450px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 0.875em;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 80%;
  border-left: none;
  height: 450px;
}

/* switch */
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
								<li class="active"><span>Settings</span></li>								
							</ol>
						</div>
					</div>
					<div class="clearfix">
						<h1 class="pull-left">Settings</h1>
						<div class="pull-right top-page-ui">
							<!-- <a href="javascript:void(0);" class="btn btn-primary pull-right openBtn"  data-toggle="modal" data-target="#myModal">
								<i class="fa fa-plus-circle fa-lg"></i> Add Branch
							</a> -->
						</div>
					</div>
				</div>
			</div>
			<?php //echo $this->session->userdata('site_lang'); //print_r($this->session);?>
			<div class="row">
				<div class="col-lg-12">

					<div class="success_msg"></div>
					<div class="main-box no-header clearfix">
						<div class="main-box-body clearfix">


							<div class="tab">
							  <button class="tablinks" onclick="openCity(event, 'change_password')" id="defaultOpen">Change Password </button>
							  <button class="tablinks" onclick="openCity(event, 'email_templates')" >Email Templates</button>
							  <button class="tablinks" onclick="openCity(event, 'sms_templates')">SMS Templates</button>
							  <button class="tablinks" onclick="openCity(event, 'smtp_config')">Configure SMTP</button>
							</div>


							<div id="change_password" class="tabcontent">
							  <h3>Change Password</h3>
							 <form role="form" method="post" id="changePasswordForm">
								
									<div class="password-msg"></div> 
									<div class="row">
										<div class="col-md-6">   
											<div class="form-group">
												<label for="exampleInputEmail1">Old Password<span style="color:red">*</span></label>
												<input  type="password" class="form-control" id="old_password" name="old_password" >
											</div> 
											<div class="form-group">
												<label for="exampleInputEmail1">New Password<span style="color:red">*</span></label>
												<input  type="password" class="form-control" id="new_password" name="new_password" >
											</div> 

											<div class="form-group">
												<label for="exampleInputEmail1">Confirm Password<span style="color:red">*</span></label>
												<input  type="password" class="form-control" id="confirm_password" name="confirm_password" >
											</div> 


							 			</div>
							 		</div>

							 		<div class="row" style="margin-top: 5%">
							 			<div class="col-md-6">
							 				<button type="submit" class="btn btn-primary waves-effect waves-light changepassBtn">Submit</button>
							 			</div>
							 		</div>
							 
								  
								        
									
								</form>
							</div>

							<div id="email_templates" class="tabcontent">
							  <h3>Email Templates</h3>
							  <div class="table-responsive">
								<table class="table user-list table-hover" id="table-example">
									<thead>
										<tr>
											<th><span>Template</span></th>
											<th><span>Status</span></th>
											<th><span>Action</span></th>
											
										</tr>
									</thead>
									<tbody>

										<?php foreach($email_templates as $temp){?>
										<tr>
											<td><span><?php echo $temp['template_name']?></span></td>
											<td>
												<?php if($temp['template_status'] == "active") {?>
												<label class="switch">
												  <input type="checkbox" class="status_c" checked onchange="change_status('<?php echo $temp['template_id']?>','inactive','email')">
												  <span class="slider round"></span>
												</label>
												<!-- <input type="hidden" class="input_status" name="status[<?php echo $key;?>]" value="0"> -->
												<?php } else {?>
												<label class="switch">
												  <input type="checkbox" class="status_c" onchange="change_status('<?php echo $temp['template_id']?>','active','email')">
												  <span class="slider round"></span>
												</label>
												<!-- <input type="hidden" class="input_status" name="status[<?php echo $key;?>]" value="0"> -->
												<?php }?>
											</td>
											<td>	<a href="javascript:void(0);" class="table-link" class="btn btn-primary pull-right openBtn"  data-toggle="modal" data-target="#myModal" onclick="edit_template('<?php echo $temp['template_id']?>','<?php echo $temp['template_name']?>')">
															<span class="fa-stack">
																<i class="fa fa-square fa-stack-2x"></i>
																<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
															</span>
														</a>
											</td>
											
										</tr>
										<?php } ?>
										
									</tbody>
								</table>
							</div>
						</div>


						<div id="sms_templates" class="tabcontent">
							  <h3>SMS Templates</h3>
							 <div class="table-responsive">
								<table class="table user-list table-hover" id="table-example1">
									<thead>
										<tr>
											<th><span>Template</span></th>
											<th><span>Status</span></th>
											<th><span>Action</span></th>
											
										</tr>
									</thead>
									<tbody>
										<?php foreach($sms_templates as $stemp){?>
										<tr>
											<td><span><?php echo $stemp['template_name']?></span></td>
											<td>
												<?php if($stemp['template_status'] == "active") {?>
												<label class="switch">
												  <input type="checkbox" class="status_c" checked onchange="change_status('<?php echo $stemp['template_id']?>','inactive','sms')">
												  <span class="slider round"></span>
												</label>
												<!-- <input type="hidden" class="input_status" name="status[<?php echo $key;?>]" value="0"> -->
												<?php } else {?>
												<label class="switch">
												  <input type="checkbox" class="status_c" onchange="change_status('<?php echo $stemp['template_id']?>','active','sms')">
												  <span class="slider round"></span>
												</label>
												<!-- <input type="hidden" class="input_status" name="status[<?php echo $key;?>]" value="0"> -->
												<?php }?>
											</td>
											<td>	<a href="javascript:void(0);" class="table-link" class="btn btn-primary pull-right"  data-toggle="modal" data-target="#modal_edit" onclick="edit_smstemplate('<?php echo $stemp['template_id']?>','<?php echo $stemp['template_name']?>')">
															<span class="fa-stack">
																<i class="fa fa-square fa-stack-2x"></i>
																<i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
															</span>
														</a>
											</td>
											
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
							</div>

							<div id="smtp_config" class="tabcontent">
							  <h3>SMTP Configuration</h3>
							  <form role="form" method="post" id="smtpForm">
								
									<div class="password-msg"></div> 
									<div class="row">
										<div class="col-md-6"> 
											<input type="hidden" value="<?php echo $smtp_data['id'];?>" name="smtp_id">  
											<div class="form-group">
												<label for="exampleInputEmail1">Host<span style="color:red">*</span></label>
												<input  type="text" class="form-control" id="host" name="host" value="<?php echo $smtp_data['host'];?>" >
											</div> 
											<div class="form-group">
												<label for="exampleInputEmail1">Username<span style="color:red">*</span></label>
												<input  type="text" class="form-control" id="username" name="username" value="<?php echo$smtp_data['username'];?>" >
											</div> 

											<div class="form-group">
												<label for="exampleInputEmail1">Password<span style="color:red">*</span></label>
												<input  type="password" class="form-control" id="password" name="password" value="<?php echo $smtp_data['password'];?>" >
											</div> 

											<div class="form-group">
												<label for="exampleInputEmail1">Port<span style="color:red">*</span></label>
												<input  type="text" class="form-control" id="port" name="port" value="<?php echo 
												$smtp_data['port'];?>" >
											</div> 
							 			</div>
							 		</div>

							 		<div class="row" style="margin-top: 5%">
							 			<div class="col-md-6">
							 				<button type="submit" class="btn btn-primary waves-effect waves-light smtpBtn">Submit</button>

							 			</div>
							 		</div>
							 
								  
								        
									
								</form>
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
		<h4 class="modal-title heading lead email_tempheading">Edit Template</h4>
	  </div>
	   <form role="form" method="post" id="emailForm">
	  
		<div class="modal-body">   
			 <div class="email-msg"></div> 
			<input id="email_tempid" name="email_tempid" value="" type="hidden">

	   		<div class="form-group">
				<label for="exampleInputEmail1">Subject</label>
				<input type="text" class="form-control" id="subject" name="subject" value="" placeholder="Enter Subject">
			</div>   
			<div class="form-group">
				<label for="exampleInputEmail1">Body</label>
				<textarea class="form-control" id="description" name="description" ></textarea>
			</div>
			
			       
	  </div>
	  <div class="modal-footer justify-content-center">
		  <button type="button" class="btn btn-primary waves-effect waves-light emailBtn">Submit</button>
		  <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button> 
		  <span class="sr-only">Loading...</span>         
		</div>
		</form>
	</div>
  </div>
</div>


<!-- Sms Template -->
<div id="modal_edit"  class="modal fade" role="dialog" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info">
	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title heading lead sms_tempheading">Edit Template</h4>
	  </div>
	   <form role="form" method="post" id="smsForm">
		<div class="modal-body">   
			<div class="sms-msg"></div> 
			<input id="sms_tempid" name="sms_tempid" value="" type="hidden">   
			   
			<div class="form-group">
				<label for="exampleInputEmail1">Body</label>
				<textarea class="form-control" id="sms_message" name="sms_message" ></textarea>
			</div> 

	  </div>
	  <div class="modal-footer justify-content-center">
		  <button type="button" class="btn btn-primary waves-effect waves-light smsBtn">Submit</button>
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

	function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();


 CKEDITOR.replace( 'description', {
    toolbar: [
        { name: 'document', items: ['-', 'NewPage', 'Preview', '-', 'Templates' ] },    // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],          // Defines toolbar group without name.
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline' ] },
                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList',  'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
    ]
} );

  CKEDITOR.replace( 'sms_message', {
    toolbar: [
        { name: 'document', items: ['-', 'NewPage', 'Preview', '-', 'Templates' ] },    // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
        [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],          // Defines toolbar group without name.
        { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline' ] },
                { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
                { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList',  'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] },
    ]
} );


// Start Email template

 	function edit_template(rowid,template_name){

 		$(".email_tempheading").text(template_name);
 		$("#email_tempid").val(rowid);

 		//alert($('#description').val());
 		 $.ajax({
            'type':"POST",
            'url':'<?php echo base_url('Admin_Dashboard/edit_templates')?>',
            'data':{'id':rowid},
            success:function(response){
              
                result  =  JSON.parse(response);
              //  console.log(result.template_id);
                $("#subject").val(result.template_subject);
                CKEDITOR.instances['description'].setData(result.template_body);
               
            }


       });
 	}



 	$(".emailBtn").click(function(){

 		var template_id = $("#email_tempid").val(); 
 		var subject  =  $("#subject").val();
 	    var desc = CKEDITOR.instances.description.getData();

 			$.ajax({
				url: '<?php echo base_url("Admin_Dashboard/save_email_template");?>',
				type: 'POST',
				data:{'template_id':template_id,'subject' :subject,'description':desc },
				beforeSend: function(){
					$('.emailBtn').attr("disabled","disabled");
					$('#emailForm').css("opacity","0.5");
					$(".sr-only").show();
				},
				success: function(response) {
					//console.log(response);
					$("#emailForm")[0].reset();
					$('.email-msg').html('').removeClass('alert alert-danger fade in');
					$('#emailForm').css("opacity","1");  
					if(response=='success'){ 
						$('.email-msg').css('display','block');               		             		
						$('.email-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Template saved successfully').addClass('alert alert-success fade in').fadeOut(5000);  

							CKEDITOR.instances['description'].setData("");
							$('.emailBtn').removeAttr("disabled");
							setTimeout(function(){                  		
								$("#myModal").modal('hide');
							 }, 2000); 
					

					}else{
					$('.email-msg').html(response).addClass('alert alert-danger fade in');                	
					//location.replace(location + "pay-vip.php");
				   // alert("Send mail");
					}
				}            
			});


 	});

// End Email Template


// Start SMS Template

	function edit_smstemplate(rowid,template_name){

 		$(".sms_tempheading").text(template_name);
 		$("#sms_tempid").val(rowid);

 		//alert($('#description').val());
 		 $.ajax({
            'type':"POST",
            'url':'<?php echo base_url('Admin_Dashboard/edit_smstemplates')?>',
            'data':{'id':rowid},
            success:function(response){
              
                result  =  JSON.parse(response);
                //console.log(result);
              
                CKEDITOR.instances['sms_message'].setData(result.template_body);
               
            }


       });
 	}


 	$(".smsBtn").click(function(){

 		var template_id = $("#sms_tempid").val(); 
 	    var desc = CKEDITOR.instances.sms_message.getData();

 			$.ajax({
				url: '<?php echo base_url("Admin_Dashboard/save_sms_template");?>',
				type: 'POST',
				data:{'template_id':template_id,'sms_message':desc },
				beforeSend: function(){
					$('.smsBtn').attr("disabled","disabled");
					$('#smsForm').css("opacity","0.5");
					$(".sr-only").show();
				},
				success: function(response) {
					//console.log(response);
					$("#smsForm")[0].reset();
					$('.sms-msg').html('').removeClass('alert alert-danger fade in');
					$('#smsForm').css("opacity","1");  
					if(response=='success'){ 
						$('.sms-msg').css('display','block');               		             		
						$('.sms-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Template saved successfully').addClass('alert alert-success fade in').fadeOut(5000);  

							CKEDITOR.instances['sms_message'].setData("");
							$('.smsBtn').removeAttr("disabled");
							setTimeout(function(){                  		
								$("#modal_edit").modal('hide');
							 }, 2000); 
					

					}else{
					$('.sms-msg').html(response).addClass('alert alert-danger fade in');                	
					
					}
				}            
			});


 	});

// End SMS Template

 	function change_status(id,status,template_type)
	{

		$(".success_msg").html('');
		if(status  == "inactive")
		{
			var confirm_msg =  "Are you sure you want to deactivate this template ?";
		}
		else{
			var confirm_msg =  "Are you sure you want to activate this template ?";
		}

	
		if(confirm(confirm_msg)){		
	  
			$.ajax({ 
				type: "POST", 
				url: '<?php echo base_url();?>Admin_Dashboard/change_template_status',
				data: {'id':id,'status':status,'template_type' :template_type  },
				cache: false,
				success: function(resp) {
					$(".success_msg").css('display','block');
					if($.trim(resp) == "success"){
						if(status == "inactive"){
							$('.success_msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Template deactivated successfully').addClass('alert alert-success fade in').fadeOut(5000);  
						}
						else{
							$('.success_msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Template activated successfully').addClass('alert alert-success fade in').fadeOut(5000);  
						}
					}
					else{
						$('.success_msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-times-circle fa-fw fa-lg"></i> Error in updating status').addClass('alert alert-danger fade in').fadeOut(5000); 
					}

				}	
			});
		}

		
	}

	// Validate SMTP Form

	$("#smtpForm").validate({
		errorClass: 'has-error',
		rules: {				
			host: "required",
			username: "required",
			password: "required",
			port:'required'
		},
		messages: {
			host: "Please enter host",
			username: "Please enter username",
			password: "Please enter password",
			port:"Please enter port"
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
					url: '<?php echo base_url("Admin_Dashboard/save_smtp_connection");?>',
					type: 'POST',
					data: $(form).serialize(),
					beforeSend: function(){
						$('.smtpBtn').attr("disabled","disabled");
						$('#smtpForm').css("opacity","0.5");
						$(".sr-only").show();
					},
					success: function(response) {
					
							$("#smtpForm")[0].reset();
							$('.success_msg').html('').removeClass('alert alert-danger fade in');
							$('#smtpForm').css("opacity","1");  
							if(response=="success"){                		             		
								$('.success_msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> SMTP configured successfully').addClass('alert alert-success fade in').fadeOut(5000);  
								setTimeout(function(){
									location.reload();
								 }, 1500); 
							$('.smtpBtn').removeAttr("disabled");
						}else{
							$('.success_msg').html(response).addClass('alert alert-danger fade in');
							$('.smtpBtn').removeAttr("disabled");
							$('#smtpForm').css("opacity","2");
							$(".sr-only").hide();
						}
					}
			});
		  }
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
	
	

	// Validate Change Password Form

	$("#changePasswordForm").validate({
		errorClass: 'has-error',
		rules: {				
			old_password: "required",
			new_password: {
				required:true,
				rangelength:[6,8]
			},
			confirm_password:{
				required:true,
				equalTo: "#new_password"
			}
		},
		messages: {
			old_password: "Please enter old password",
			new_password: {
				required:"Please enter new password",
				rangelength:"Password length should be minimum 6 and maximum 8 "
			},
			confirm_password:{
				required:"Please enter confirm password ",
				equalTo : "Confirm Password and New Password should be equal"
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
					url: '<?php echo base_url("Admin_Dashboard/update_password");?>',
					type: 'POST',
					data: $(form).serialize(),
					beforeSend: function(){
						$('.changepassBtn').attr("disabled","disabled");
						$('#changePasswordForm').css("opacity","0.5");
						$(".sr-only").show();
					},
					success: function(response) {
					
							$("#changePasswordForm")[0].reset();
							$('.success_msg').html('').removeClass('alert alert-danger fade in');
							$('#changePasswordForm').css("opacity","1");  
							if(response=="success"){                		             		
								$('.success_msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Password updated successfully').addClass('alert alert-success fade in').fadeOut(5000);  
								setTimeout(function(){
									window.location.href = "<?php echo base_url()?>/login/logout";
								 }, 2000); 
								$('.changepassBtn').removeAttr("disabled");
							}
							else if(response == "oldpassword_notmatched"){
								$('.success_msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-times fa-fw fa-lg"></i> Incorrect Old Password ').addClass('alert alert-danger fade in'); 
								$('.changepassBtn').removeAttr("disabled");
								$('#changePasswordForm').css("opacity","2");
								$(".sr-only").hide();
							}
					}
			});
		  }
	});

	
	</script>
