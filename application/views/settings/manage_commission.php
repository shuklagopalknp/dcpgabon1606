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
								<li><span>Commission</span></li>
								
							</ol>
						</div>
					</div>
					<h1>Manage Commission</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">

					<div class="flash-msg">
						<?php if($this->session->flashdata('flash_message')) {?>
							<div class="alert alert-success">
							<?php echo $this->session->flashdata('flash_message'); ?></div>
						<?php }?>
					</div>
					<div class="main-box">	
										
						<div class="main-box-body clearfix">
							<br>
								
							<form role="form" method="post" id="roleForm" action="<?php echo base_url('Settings/save_commission');?>">
									
							
							
					      	<div class="modal-body">
					      		
					      		<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $comm_data['id'];?>">
					      		<div class="row">
					      			<div class="col-md-6">
										<div class="form-group">     

											<label for="inputError" class="control-label">PCE Commission
												<span style="color:red">*</span>
											</label>
								        	<input type="text" class="form-control" id="pce_commission" name="pce_commission" value="<?php echo $comm_data['pce_commission'];?>" >
							        		
							        	</div>
					        		</div>
					        	</div>

					        	<div class="row">
					        		<div class="col-md-6">
						        		<div class="form-group">
						        		
							        		<label for="inputError" class="control-label">Exploitation Commission <span style="color:red">*</span></label>
							        		<input type="text" class="form-control" id="ex_commission" name="ex_commission" value="<?php echo $comm_data['exploitation_commission'];?>" >
							        	</div>
						        	</div>
					       		</div>
					      	</div>
	      
								
														
								
							<div class="form-group">
								<div class="col-md-1 text-center " style="margin-bottom:10px;">
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

<script>


	

	$("#roleForm").validate({
		errorClass: 'has-error',
		rules: {
			pce_commission: "required",
			ex_commission : "required"

		},
		messages: {
			pce_commission: "Please enter PCE Commission",
			ex_commission : "Please enter Exploitation Commission"
						
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
		//submitHandler: function(form) {	

			//alert("chekfe india");
			//$(".sr-only").show();
			// $.ajax({
			// 	url: '<?php echo base_url("Settings/save_business_tabs");?>',
			// 	type: 'POST',
			// 	data: $(form).serialize(),
			// 	beforeSend: function(){
			// 		$('.submitBtn').attr("disabled","disabled");
			// 		$('#roleForm').css("opacity","0.5");
			// 		$(".sr-only").show();
			// 	},
			// 	success: function(response) {
					
			// 		$('.flash-msg').html('').removeClass('alert alert-success fade in');
			// 		$('#roleForm').css("opacity","1");  
			// 		if(response=="success"){                		             		
			// 			$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Record Saved successfully').addClass('alert alert-success fade in').fadeOut(5000);  
			// 				setTimeout(function(){                  		
			// 					location.reload();
			// 				 }, 1500); 
			// 		$('.submitBtn').attr("disabled","");

			// 		}else{
			// 		$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i>Error in saving record').addClass('alert alert-danger fade in');
			// 		}
			// 	}            
			// });

		//  }
	});
</script>		