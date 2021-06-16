<?php error_reporting("~E_NOTCE");?>
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
								<li><a href="<?php echo base_url('Settings/workflow');?>"><span>WORK FLOW</span></a></li>
								<li><span> <?php echo $param;?> WORK FLOW</span></li>

								
							</ol>
						</div>
					</div>
					<h1>WorkFlow</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">

					<div class="alert alert-info" role="alert">
					   Tip : Drag and Drop Roles to adjust order of approval process in each Workflow
					</div>
					<div class="flash-msg"></div>
					<div class="main-box">	
										
						<div class="main-box-body clearfix">
							<br>
								
							<form id="tabForm" action="#"  method="post" class="form-horizontal" role="form" >

								<input type="hidden" name="edit_id" value="<?php echo $details['workflow_id']?? '';?>">
								
								<fieldset>
									<legend>Work Flow</legend>
								<div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label"> Name </label>
									<div class="col-md-3">
										<input name="workflow_name" class="form-control" value="<?php echo $details['workflow_name']?? '';?>" />
									</div>
								</div>	
								<div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label"> Product </label>
									<div class="col-md-3">
										<select name="product_type" class="form-control">
											<option value="">Select</option>
											<option value="credit_conso" <?php if($details['type'] == "credit_conso") echo 'selected';?> >Fêtes à la Carte</option>
											<option value="credit_scolaire" <?php if($details['type'] == "credit_scolaire") echo 'selected';?>>Congés à la Carte</option>
											<option value="credit_confort" <?php if($details['type'] == "credit_confort") echo 'selected';?>>Crédit Confort</option>
											<!-- <option value="credit_scolaire" <?php if($details['type'] == "credit_scolaire") echo 'selected';?>>PP Credit Scolaire</option>
											<option value="decouvert" <?php if($details['type'] == "decouvert") echo 'selected';?>>PP Decouvert</option>
											<option value="gage_espece" <?php if($details['type'] == "gage_espece") echo 'selected';?>>PP Gage Espece</option>
											<option value="commune" <?php if($details['type'] == "commune") echo 'selected';?>>PP Commune</option>
											<option value="depassment" <?php if($details['type'] == "depassment") echo 'selected';?>>PP Depassment</option>
											<option value="escompte" <?php if($details['type'] == "escompte") echo 'selected';?>>PP Escompte</option> -->
										</select>
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label"> Amount </label>
									<div class="col-md-3">
										Min Amount :<input type="text" class="form-control" name="min_amount" id="min_amount" value="<?php echo $details['min_amount'] ?? '';?>" onkeypress="return isNumber(event)">
									</div>
									<div class="col-md-3">
										Max Amount :<input type="text" class="form-control" name="max_amount" id="max_amount" value="<?php echo $details['max_amount'] ?? '';?>" onkeypress="return isNumber(event)">
									</div>
								</div>

								<table id="sys_table" class="table table-hover workflowtbl">
                                    <thead>
									<tr>
										<th>Roles</th>
										<th>Status</th>
										<th>Order</th>
									</tr>
									</thead>
									<tbody>
								<?php 
									//print_r($roles);
									$role_status =  array();
									$role_order =  array();
									
									if(!empty($details)) {
									$role_id =   explode(',',$details['role_ids']);;
									$role_status =  explode(',',$details['status']);
									$role_order =  explode(',',$details['workflow_order']);
									}
									
									$count =1 ;
							
								 
								foreach($roles as $key=>$row) { 
									if(!empty($role_id)){
									      $role_key = array_search($row['id'],$role_id) ;
									      
									      if(is_numeric($role_key))
									      {
									          $r_val = 1;
									      }
									      else
									      {
									          $r_val = 0;
									      }
									}
									
								?>

								<tr <?php if(!empty($role_status) && $r_val == 1 &&  $role_status[$role_key] == "1"){?> class="checked_role"  <?php } ?>>
									
									<td>
										<?php echo $row['name'] ; ?>
										<input type="hidden" class="form-control role_c"  name="role_id[]"  value="<?php echo $row['id']?>" required="true"  />
									</td>
									<td>
										<label class="switch">
										  <input type="checkbox" id="s_<?php echo $count;?>" class="status_c" <?php if(!empty($role_status) && $r_val == 1 && $role_status[$role_key] == "1") echo 'checked';?>>
										  <span class="slider round" ></span>
										</label>
										<input type="hidden" class="input_status" name="status[]" value="<?php echo ($r_val == 1) ? $role_status[$role_key] : '0'; ?>">

										
									</td>

									<td>
										<span class="show_c badge badge-info" id="t_<?php echo $count;?>"><?php if(!empty($role_order)  && $r_val == 1 && $role_order[$role_key]) echo $role_order[$role_key];?></span>
										<input type="hidden" class="input_order" id="io_<?php echo $count ;?>" name="order[]" value="<?php echo ($r_val == 1) ? $role_order[$role_key] : '0';?>">
									</td>
								</tr>	


								
								
								<?php $count++;
								 }?>
								 <?php if(!empty($role_id)){
										$cic_key = array_search('cic',$role_id) ;
									}?>
								 <tr  <?php if(!empty($role_status) && $role_status[$cic_key] == "1"){?> class="checked_role"  <?php } ?>>
								 	
								 	<td> CIC Group 
								 		<input type="hidden" id="cic" value="cic" name="role_id[]">
								 		<select class="form-control"  name="cic_group" style="width:50%">
								 			<option value="">Select</option>
								 			<?php foreach($groups as $key=>$grow){?>
								 				<option value="<?php echo $grow['group_id']?>"
								 					<?php if($details['assigned_cic_grp_id'] == $grow['group_id']) echo "selected";?>
								 					>
								 					<?php echo $grow['group_name']?>
								 				</option>
								 			<?php }?>	
								 		</select>
								 		<input type="text" class="form-control" name="min_cic_approvals" style="width:300px" placeholder="Enter Minimum CIC Approvals" value="<?php echo $details['min_cic_approvals'] ?? '1';?>">
								 	</td>
								 	<td>
										<label class="switch">
										  <input type="checkbox" id="s_<?php echo $count;?>" class="status_c" <?php if(!empty($role_status) && $role_status[$cic_key] == "1") echo 'checked';?>>
										  <span class="slider round" ></span>
										</label>
										<input type="hidden" class="input_status" name="status[]" value="<?php echo $role_status[$cic_key] ?? '0'; ?>">

										
									</td>
									<td>
										<span class="show_c badge badge-info" id="t_<?php echo $count;?>"><?php if(!empty($role_order) && $role_order[$cic_key]) echo $role_order[$cic_key];?></span>
										<input type="hidden" class="input_order" id="io_<?php echo $count ;?>" name="order[]" value="<?php echo $role_order[$cic_key] ?? '0';?>">
									</td>
								 </tr>
								<tbody>
								</table>
								
							</fieldset>
								
														
								
							<div class="form-group">
								<div class="col-lg-offset-4 col-lg-10">
									<button type="submit" id="button_1" class="btn btn-primary">SAVE DETAILS</button>
									<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="saveloder" style="position: absolute;top: 8px;    left: 123px;    display: none;">
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

	function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}


	$(".status_c").click(function(){

		var elemid;
		
		if($(this).is(":checked"))
		{
			$(this).closest("tr").addClass("checked_role");
			$(this).closest("td").find(".input_status").val('1');

			elemid =  (this.id).split('_');
			
			$("#t_"+elemid['1']).text($('.checked_role').length);
			$("#io_"+elemid['1']).val(($('.checked_role').length));

		}else{
			

			elemid =  (this.id).split('_');
		

			//alert($("#t_"+elemid['1']).text());


			if($("#t_"+elemid['1']).text() <= $('.checked_role').length)
			{
				//  alert($("#t_"+elemid['1']).text() +"|"+$('.checked_role').length);

				// //return false;
				// var counter = parseInt(elemid['1']) + 1; 
				for(var i = 1 ; i <= $('.show_c').length ; i++)
				{
					//alert(i);
					if($("#io_"+i).val() != "0" && $("#io_"+i).val() > parseInt($("#t_"+elemid['1']).text()))
					{
						//console.log(i);
						
						//alert(i);
						$("#t_"+i).text($("#io_"+i).val() - 1);
						$("#io_"+i).val($("#io_"+i).val() - 1);
					}
					
				}
			}

			$(this).closest("tr").removeClass("checked_role");
			$(this).closest("td").find(".input_status").val('0');

			$("#t_"+elemid['1']).text("");

			$("#io_"+elemid['1']).val('0');
			

		}

	});

	$( ".workflowtbl tbody" ).sortable( {
		update: function( event, ui ) {
			

			    $(this).children().filter(".checked_role").each(function(index) {
			    		//$(this).attr('style','background:green');
						$(this).find('.show_c').html(index + 1);
					    $(this).find('.input_order').val(index + 1);

			    });
			
	  	}
	});

	$.validator.addMethod("greaterThan",
    function(value, max, min){
    	
    	if(value !='' && parseInt(value) > 0)
    	{
    		return parseInt(value) > parseInt($("#min_amount").val());
    	}
    	else
    	{
    		return true;
    	}
    	
       
    }, "Max Amount must be greater than Min Amount"
);
	

	$("#tabForm").validate({
		errorClass: 'has-error',
		rules: {
			workflow_name:"required",
			product_type: "required",
			min_amount: {
				number:true,
			},
			max_amount:{
				number:true,
				greaterThan:true
			}



		},
		messages: {
			workflow_name:"Please enter workflow name",
			product_type:"Please select product type"
						
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
				url: '<?php echo base_url("Settings/save_workflow");?>',
				type: 'POST',
				data: $(form).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#tabForm').css("opacity","0.5");
					$(".sr-only").show();
				},
				success: function(response) {
					// console.log(response);
					// return false;
					
					
					$('.flash-msg').html('').removeClass('alert alert-success fade in');
					$('#tabForm').css("opacity","1");
					 $(window).scrollTop(0);  
					if(response=="success"){   

						$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i>Work Flow Saved Successfully').addClass('alert alert-success fade in').fadeOut(5000);  
							setTimeout(function(){                  		
								location.href  =  '<?php echo base_url("Settings/workflow")?>';
							 }, 1500); 
					$('.submitBtn').attr("disabled","");

					}
					else if(response=="already_exists")
					{
						$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-times-circle fa-fw fa-lg"></i> This WorkFlow Already Exists..').addClass('alert alert-danger fade in').fadeOut(5000); 
                		// setTimeout(function(){                  		
                		// 	location.reaload();
                		//  }, 1500); 
					}
					else{
					$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-times-circle fa-fw fa-lg"></i>Error in saving record').addClass('alert alert-danger fade in');
					}
				}            
			});

		  }
	});
</script>		