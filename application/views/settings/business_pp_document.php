<style type="text/css">
	
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
					   Tip : Drag and Drop Documents to adjust order of documents in each Products
					</div>
					<?php if($this->session->flashdata("flash_message")) {?>
					<div class="alert alert-success fade in" role="alert">
						<?php echo $this->session->flashdata("flash_message");?>
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					</div>
				<?php }?>
					<div class="main-box">	
										
						<div class="main-box-body clearfix">
							<br>
							<div class="row" style="margin-bottom: 2%;">
							<div class="col-md-12">
								
								<form id="docForm" action="<?php echo base_url('Settings/business_product_documents');?>"  method="post" class="form-horizontal" role="form" >

									
									<fieldset>
										<legend>Business Tabs</legend>	
									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label"> Product </label>
										<div class="col-md-3">
											<select name="product_type" class="form-control product_type_c">
												<option value="">Select</option>
												<option value="gage_espece" <?php  if($_POST) echo ($_POST['product_type'] == "gage_espece") ? "selected" : "";  ?> >PP Gage Espece</option>
												<option value="commune" <?php  if($_POST) echo ($_POST['product_type'] == "commune") ? "selected" : "" ?>>PP Commune</option>
												<option value="depassment" <?php   if($_POST) echo ($_POST['product_type'] == "depassment") ? "selected" : "" ?>>PP Depassment</option>
												<option value="escompte" <?php  if($_POST) echo ($_POST['product_type'] == "escompte") ? "selected" : "" ?>>PP Escompte</option>
											</select>
										</div>
									</div>

									<div class="form-group">
										<label for="inputEmail1" class="col-lg-2 control-label"> Select Sub Product </label>
										<div class="col-md-3">
											<select name="sub_product_type" class="form-control sub_product_type_c">
												<option value="">Select</option>
												<?php if(!empty($sub_prod_details)){ 
													foreach($sub_prod_details as $key=>$sub){
												?>
												<option value="<?php echo $key; ?>" <?php echo ($_POST['sub_product_type'] == $key) ? "selected" : "" ?>><?php echo $sub;?></option>
												<?php } }?>
												
											</select>
										</div>
									</div>
									</fieldset>
								</form>
							</div>
							</div>



							<form action ="<?php echo base_url('Settings/save_business_docs');?>" method="POST">
							<div class="row"  style="margin-bottom: 2%;">
							<div class="col-md-12">

									<fieldset>
										<legend>System Documents</legend>
										<table id="sys_table" class="table table-hover sorttable_c">
									<?php 

										if(!empty($system_docs)){
										foreach($system_docs as $key=>$sys_row) { ?>
											
											<tr>
												<td style="width:70%"><input type="hidden" class="docid_c" name="doc_id[]"  value="<?php echo $sys_row['document_id'];?>" required="true"  /><i class="fa fa-file"></i> <?php echo ucwords($sys_row['document_name']);?></td>
												<td><label class="switch">
												<input type="checkbox" class="status_c" <?php echo $sys_row['document_status'] ? "checked" :  "" ;?>>
											  	<span class="slider round"></span>
												</label>
												<input type="hidden" class="input_status" name="status[]" value="<?php echo $sys_row['document_status']; ?>"></td>
												<td>
													<input type="hidden" class="input_order" name="order[]" value="<?php echo $sys_row['document_order'] ;?>">
												</td>
											</tr>
											
									<?php  }
									}
								?>
										</table>
									</fieldset>
								
								
							</div>
							</div>

							<div class="row"  style="margin-bottom: 2%;">
							<div class="col-md-12">

									<fieldset>
										<legend>Check List Documents</legend>
										<table class="table table-hover sorttable_c">
											<tbody>
									<?php 
										if(!empty($checklist_docs)){
										foreach($checklist_docs as $key=>$chk_row) { ?>


											<tr>
												<td style="width:70%"><input type="hidden" class="docid_c" name="doc_id[]"  value="<?php echo $chk_row['document_id'];?>" required="true"  /><i class="fa fa-file"></i> <?php echo ucwords($chk_row['document_name']);?></td>
												<td><label class="switch">
												<input type="checkbox" class="status_c" <?php echo $chk_row['document_status'] ? "checked" :  "" ;?>>
											  	<span class="slider round"></span>
												</label>
												<input type="hidden" class="input_status" name="status[]" value="<?php echo $chk_row['document_status']; ?>"></td>
												<td>
													<input type="hidden" class="input_order" name="order[]" value="<?php echo $chk_row['document_order'] ;?>">
												</td>

											</tr>
											
									<?php  }
									}
								?>
										</tbody>
									</table>
									</fieldset>
								
								
							</div>
							</div>

							<div class="row"  style="margin-bottom: 2%;">
							<div class="col-md-12">

									<fieldset>
										<legend>Risk Analysis Documents</legend>
										<table id="risk_table" class="table table-hover sorttable_c">
									<?php 
										if(!empty($risk_analysis_docs)){
										foreach($risk_analysis_docs as $key=>$risk_row) { ?>
											<tr>
												<td style="width:70%"><input type="hidden" class="docid_c" name="doc_id[]"  value="<?php echo $risk_row['document_id'];?>" required="true"  /><i class="fa fa-file"></i> <?php echo ucwords($risk_row['document_name']);?></td>
												<td><label class="switch">
												<input type="checkbox" class="status_c" <?php echo $risk_row['document_status'] ? "checked" :  "" ;?>>
											  	<span class="slider round"></span>
												</label>
												<input type="hidden" class="input_status" name="status[]" value="<?php echo $risk_row['document_status']; ?>"></td>
												<td>
													<input type="hidden" class="input_order" name="order[]" value="<?php echo $risk_row['document_order'] ;?>">
												</td>

											</tr>

									<?php  }
									}
								?>
										</table>
									</fieldset>
								
								
							</div>
							</div>
								
														
								
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

	

	$(".product_type_c").change(function()
	{
		if($(this).val)
		{
			$.ajax({
						type:"POST",
						url:"<?php echo base_url('Settings/get_sub_product_type');?>",
						data:{ product_type :  $(this).val()},
						success:function(response){
		
							//alert(response);
							if(response){
								$(".sub_product_type_c").html(response);
							}

							setTimeout(function(){ 


							if($(".sub_product_type_c").val() == '' && ($(".product_type_c").val() == 'commune' || $(".product_type_c").val() == 'depassment'))
							{
								$("#docForm").submit();
							}
							else if( ($(".product_type_c").val() == 'gage_espece' || $(".product_type_c").val() == 'escompte') && $(".sub_product_type_c").val() != '')
							{
								$("#docForm").submit();
							}
							else{
								$(".sorttable_c").hide();
							}
							 }, 100);
							
							
						}
				});


			


			
		}
		else
		{
			$(".sorttable_c").hide();
		}
	});


	$(".sub_product_type_c").change(function()
	{
		

		if($(this).val() != "" && ($(".product_type_c").val() == 'gage_espece' || $(".product_type_c").val() == 'escompte') )
			{
				$("#docForm").submit();
			}
			else if($(".sub_product_type_c").val() == '' && ($(this).val() == 'commune' || $(this).val() == 'depassment'))
			{
				$("#docForm").submit();
			}
		
	});


	$(".status_c").click(function(){
		if($(this).is(":checked"))
		{
			$(this).closest("td").find(".input_status").val("1");
		}
		else
		{
			$(this).closest("td").find(".input_status").val("0");
		}
	});

	
</script>		