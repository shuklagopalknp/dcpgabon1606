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
								<li><span>Settings</span></li>
								
							</ol>
						</div>
					</div>
					<h1>Settings</h1>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-12">

					<div class="alert alert-info" role="alert">
					   Tip : Drag and Drop Documents to adjust order of tabs in each Products
					</div>
					<div class="flash-msg"></div>
					<div class="main-box">	
										
						<div class="main-box-body clearfix">
							<br>
								
							<form id="tabForm" action="#"  method="post" class="form-horizontal" role="form" >

								
								<fieldset>
									<legend>Consumer Tabs</legend>	
								<div class="form-group">
									<label for="inputEmail1" class="col-md-2 control-label"> Product </label>
									<div class="col-md-3">
										<select name="product_type" class="form-control product_type_c">
											<option value="">Select</option>
											<option value="credit_conso">PP FETES A LA CARTE</option>
											<option value="credit_scolair">PP CONGES A LA CARTE</option>
											<option value="credit_confort">PP CREDIT CONFORT</option>
											
										</select>
									</div>
								</div>

								<table id="sys_table" class="table table-hover sorttable_c1">
								<thead>
									<tr>
										<th>Main Tab</th>
										<th>Custom Name</th>
										<th>Status</th>
										<th>Order</th>
									</tr>

								</thead>
								<tbody>
								<?php foreach($customer_tabs as $key=>$row) { ?>

								<tr>
									<td style="width:30%"><?php echo $row['tab_original_name']?></td>
									<td style="width:30%">
										<input type="text" class="form-control tab_c"  placeholder="Enter Custom Name" name="custom_name[<?php echo $key;?>]"  value="" required="true"  />
									</td>
									<td>
										<label class="switch">
										  <input type="checkbox" class="status_c" >
										  <span class="slider round"></span>
										</label>
										<input type="hidden" class="input_status" name="status[<?php echo $key;?>]" value="0">

										
									</td>

									<td>
										<span class="show_c badge badge-info"></span>
										<input type="hidden" class="input_order" name="order[<?php echo $key;?>]" value="">
									</td>
								</tr>	


								<!-- <div class="form-group">
									<label for="inputEmail1" class="col-lg-4 control-label"> <?php echo $row['tab_original_name']?></label>
									<div class="col-md-3">
										<input type="text" class="form-control tab_c"  placeholder="Enter Custom Name" name="custom_name[<?php echo $key;?>]"  value="" required="true"  />
									</div>
									<div class="col-md-3">
										<label class="switch">
										  <input type="checkbox" class="status_c" >
										  <span class="slider round"></span>
										</label>
										<input type="hidden" class="input_status" name="status[<?php echo $key;?>]" value="0">
									</div>
								</div> -->
								
								<?php }?>
								</tbody>
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


	$(".status_c").click(function(){
		
		if($(this).is(":checked"))
		{
			$(this).closest("td").find(".input_status").val('1');

		}else{
		
			$(this).closest("td").find(".input_status").val('0');
		}

	});
	

	$(".product_type_c").change(function()
	{
		$(".tab_c").val("");
		$(".input_status").val("");
		$(".status_c").each(function(index){
		
			$(this).prop("checked",false);
			$(".round").removeClass("checked");
									
		});


		if($(this).val)
		{
			$.ajax({
						type:"POST",
						url:"<?php echo base_url('Settings/get_details_product_type_consumer');?>",
						data:{ product_type :  $(this).val()},
						success:function(response){
		
							var result =  JSON.parse(response);
							if(result.length){

								$(".tab_c").val("");
								$(".input_order").val("");

								
							
								$(".tab_c").each(function(index){
									$(this).val(result[index]['tab_customize_name']);
								});

								$(".input_status").each(function(index){
									$(this).val(result[index]['status']);
								});

								$(".show_c").each(function(index){
									$(this).html(result[index]['tab_order']);
								});

								$(".input_order").each(function(index){
									$(this).val(result[index]['tab_order']);
								});

								$(".status_c").each(function(index){
									if(result[index]['status'] == "1")
									{
										$(this).prop("checked",true);
										$(".round").addClass("checked");
									}
									else
									{
										$(this).prop("checked",false);
										$(".round").removeClass("checked");
									}
								});

							}
							else
							{
								$(".tab_c").val("");
								$(".input_status").val("");
								$(".status_c").attr("checked",false);
								
							}
						}
				});
		}
	});

	$("#tabForm").validate({
		errorClass: 'has-error',
		rules: {
			product_type:"required"

		},
		messages: {
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

			//alert("chekfe india");
			//$(".sr-only").show();
			$.ajax({
				url: '<?php echo base_url("Settings/save_customer_tabs");?>',
				type: 'POST',
				data: $(form).serialize(),
				beforeSend: function(){
					$('.submitBtn').attr("disabled","disabled");
					$('#tabForm').css("opacity","0.5");
					$(".sr-only").show();
				},
				success: function(response) {
					
					$('.flash-msg').html('').removeClass('alert alert-success fade in');
					$('#tabForm').css("opacity","1");  
					if(response=="success"){                		             		
						$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Done. </strong> Record Saved successfully').addClass('alert alert-success fade in').fadeOut(5000);  
							setTimeout(function(){                  		
								location.reload();
							 }, 1500); 
					$('.submitBtn').attr("disabled","");

					}else{
					$('.flash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i>Error in saving record').addClass('alert alert-danger fade in');
					}
				}            
			});

		  }
	});
</script>		