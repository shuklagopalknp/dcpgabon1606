<style type="text/css">
	 .form-group{   padding: 4px;}
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
    top: -18px;
    left: 272px;
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
</style>
<div id="content-wrapper">
	<div class="row">
		<?php 
		//echo "<pre>", print_r($record), "</pre>";
		//echo "<pre>", var_dump($this->input->post()), "</pre>";
		//echo "<pre>", print_r($_FILES), "</pre>";
		//echo "<pre>", print_r($this->session), "</pre>";
		
		?>	

		<div class="col-lg-12">
			<div class="row">
				<div class="col-lg-12">
					<div id="content-header" class="clearfix">
						<div class="pull-left">
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url('/');?>">Dashboard</a></li>
								<li><span>Settings</span></li>
								<li><?php if($record[0]->type=="Supper Admin")
										{
											echo "Account Manager";
										}else if($record[0]->type=="Sub Admin")
										{
											echo "Branch Manager";
										}else{
											echo $record[0]->type;
										}?>
									</li>
							</ol>
						</div>
					</div>
					<h1>Settings</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">
					<div class="main-box">	
					<textarea class="textlog col-lg-12" rows="10" style="display: none;"></textarea>					
						<div class="main-box-body clearfix">
							<br>
							<!-- <form class="form-horizontal" role="form" enctype="multipart/form-data" action="<?php //base_url('PP_Credit_Scholar/updateprofile');?>" method="post"> -->
							<form id="userprofileupdate" action="#"  method="post" class="form-horizontal" role="form" enctype="multipart/form-data" >
								<fieldset>
									<legend>GENERAL INFORMATION</legend>							
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 control-label"> Prénoms</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="first_name" placeholder="Input Name" name="first_name" value="<?php echo $record[0]->first_name;?>" required />
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 control-label">Nom</label>
									<div class="col-md-3">
										<input type="text" class="form-control" id="last_name" placeholder="Input Text" name="last_name" value="<?php echo $record[0]->last_name;?>" />
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 control-label">Primary Email</label>
									<div class="col-md-3">
										<input type="email" class="form-control" id="pemail" placeholder="Email" name="pemail" value="<?php echo $record[0]->u_email;?>" autocomplete="off" readonly />
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 control-label">Gender</label>
									<div class="col-md-3">
										<?php 
											$gender = array("Male", "Female");
										?>
										<select style="width:100%" id="sel3" class="form-control" name="gender" aria-invalid="false">
											<?php foreach($gender as $item){
                                        if(trim($record[0]->gender) == $item){ $select="selected";}else{$select="";}
                                        echo  '<option value="'.$item.'" '.$select.'>'.$item.'</option>';
                                        }?>
										</select>
									</div>
								</div>
							</fieldset>
								<fieldset>
									<legend>Change Password</legend>
									<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 control-label">Password:</label>
									<div class="col-md-3">
										<input type="password" class="form-control" id="newpassword" placeholder="******" value="" name="newpassword" autocomplete="off" >
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 control-label">Confirm Password:</label>
									<div class="col-md-3">
										<input type="password" class="form-control" id="txtConfirmPassword" name="confirmpassword" placeholder="******" value="" autocomplete="off" >
									</div>
								</div>
								</fieldset>
								<fieldset>
									<legend>Upload Profile Picture</legend>
								<div class="form-group">
									<label for="inputEmail1" class="col-lg-2 control-label">&nbsp;</label>					        		
					        		<div class="small-12 medium-2 large-2 columns ">
					        			<div class="circle">
					        			<?php 
										if(!empty($record[0]->avatar)){
											echo "<img src=\"".base_url('assets/user-profile-img/'.$record[0]->avatar)."\" alt=\"profile\" class=\"profile-pic\" title=\"".ucfirst($record[0]->user_name)."\"   />";
										 } else {
										 	echo "<img src=\"".base_url('assets/img/user.png')."\" alt=\"profile\" class=\"profile-pic\" title=\"".ucfirst($record[0]->user_name)."\" />";
										};
										?>
										<input type="hidden" name="avatar" value="<?php echo $record[0]->avatar;?>" />	      				
					        			</div>
					        			<div class="p-image">
					        				<i class="fa fa-camera upload-button"></i>
					        				<input class="file-upload" id="imageFile" type="file" name="file" accept="image/*"/>
					        			</div></div>
								</div>
							</fieldset>							
								<div class="form-group">
									<div class="col-lg-offset-2 col-lg-10">
										<div class="checkbox-nice"></div>
									</div>
								</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<button type="button" id="button_1" class="btn btn-primary">SAVE DETAILS</button>
									<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="saveloder" style="position: absolute;top: 8px;    left: 123px;    display: none;">
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-offset-2 col-lg-10">
									<div class="checkbox-nice"></div>
									<input type="hidden" name="userid" value="<?php echo $record[0]->id;?>" />
									<input type="hidden" name="avatar_id" value="<?php echo $record[0]->avatar_id;?>" />									
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
		<footer id="footer-bar" class="row">
			<p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>
		</footer>
</div>
</div>
</div>
</div>
<script src="<?php echo base_url('assets/js/demo-skin-changer.js');?>"></script>  
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nanoscroller.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/demo.js');?>"></script> 
<script src="<?php echo base_url('assets/js/modalEffects.js');?>"></script>
<script src="<?php echo base_url('assets/js/classie.js');?>"></script>
<script src="<?php echo base_url('assets/js/modernizr.custom.js');?>"></script>
<script src="<?php echo base_url('assets/js/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/daterangepicker.js');?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js');?>"></script>
<script src="<?php echo base_url('assets/js/pace.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.bootstrap.js');?>"></script>
<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script> 
<script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js');?>"></script>
 <script type="text/javascript">
	$("#button_1").on("click", function(e) {	
        	var form = $("#userprofileupdate");    
   	 		var formdata = new FormData(form[0]);
   	 		formdata.append('file', $('#imageFile')[0].files[0]);
            $.ajax({
                url: '<?php echo base_url("PP_Credit_Scholar/updateprofile");?>',
                type: 'POST',               
               	data:formdata,
             	processData:false,
             	contentType:false,                
                cache: false,
                //async: false,
                beforeSend: function(){
               		$('#userprofileupdate').css("opacity","0.5");
               		$('.saveloder').css("display","block");
               		
            	},
                success: function(response) {                	
                	console.log(response);                 	    	
                	$('#userprofileupdate').css("opacity","1");
                	$('.saveloder').css("display","none");
                	var objc = JSON.parse($.trim(response));
                	$('.textlog').val($.trim(objc));               	
                	if($.trim(objc.success)=='success'){                		
                		notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Profile update successfully.</p>','success');
                		setTimeout(function() {
                			 location.reload();
                		}, 1200);
                	}else{
                		notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>'+$.trim(objc.error)+' .</p>','error');
                	}
                }, 
                error: function (textStatus, errorThrown) {
                	//console.log(textStatus);
                	$('#userprofileupdate').css("opacity"," ");
                	$('.textlog').val($.trim(textStatus)); 
                	var objc = JSON.parse($.trim(errorThrown)); 
                	notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>some error occurred .'+objc+'</p>','error');
            	}           
            }); 
    	});
 	function notificationcall(data, status)
  	{
      	var notification = new NotificationFx({
          message : data,
          layout : 'bar',
          effect : 'slidetop',
          type : status          
        });
          notification.show();
          this.disabled = true;
  	}

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
</body>
</html>