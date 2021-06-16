<style>

.col-lg-10{
	padding:5px;
}

.main-box .main-box-header {
     min-height: 0px; 
    padding: 10px 20px;
}

.main-box-body
{
	margin-bottom:20px;

}

.form-inline .form-group {

    display: block;

}

#form_row

{

	margin-bottom:5px;

}

.breadcrumb

{

	padding-top: 5px;

    padding-bottom: 5px;

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
								<li class="active"><span>PP Commune Loan Range</span></li>
							</ol>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="main-box">
						<header class="main-box-header clearfix"></header>
						<div class="main-box-body clearfix">
							<div class="col-lg-12">
									<?php if(!empty($this->session->flashdata('msg'))) {  $message = $this->session->flashdata('msg'); ?>
										<div class="<?php echo $message['class']; ?>">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
											<i class="fa fa-times-circle fa-fw fa-lg"></i>
											<?php echo $message['message']; ?>
										</div>
									<?php } ?>

									<?php //echo "<pre>", print_r($range), "</pre>";?>
								<div class="row">
									<div class="col-md-12 col-sm-6">
									<img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image" style="display:none; position: absolute;     text-align: center;    left: 400px;    z-index: 9;">	
								</div>
									<?php echo  form_open('Loan/credit_scholar_loan_range', array('id'=>'loanrange_creditscholar','class'=>'form-inline','role'=>'form','method'=>'post')); ?>
										<div class="form-group col-md-12">
                                        	<div class="form-group row" id="form_row">
                                        		<label for="exampleInputEmail2" class="control-label col-md-3">Loan Amount: </label>
                                        		<div class="input-group">
                                        			<span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    				<input type="text" class="form-control col-md-3" id="maskedTax" name="loan_amount" placeholder="Min" autocomplete="off" value="<?php echo $range[0]['loanto'] ?: '0';?>" />
                                    			</div>
                                    			<label for="to" style="padding-left:10px; padding-right:10px; font-size: 14px;">to</label>
                                    			<div class="input-group">
                                        			<span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    				<input type="text" class="form-control col-md-3" id="maxamount" name="maxamount" placeholder="Max" value="<?php echo $range[0]['loanfrom'] ?: '0';?>" />
                                    			</div>
                                    		</div>
	                                    	<div class="form-group row" id="form_row">
	                                    		<label for="exampleInputEmail2" class="control-label col-md-3">Length of Loan: </label>
	                                    		<div class="input-group">
		                                			<span class="input-group-addon"><i class="fa fa-money"></i></span>
		                            				<input type="text" class="form-control col-md-3" id="length_of_loan_min"  name="length_of_loan_min" placeholder="Min" autocomplete="off" value="<?php echo $range[0]['loan_lengthto'] ?: '0';?>">
		                            			</div>
		                            			<label for="to" style="padding-left:10px; padding-right:10px; font-size: 14px;"> to </label>
		                            			<div class="input-group">
		                                			<span class="input-group-addon"><i class="fa fa-money"></i></span>
		                            				<input type="text" class="form-control col-md-3" id="length_of_loan_max" name="length_of_loan_max" placeholder="Max" value="<?php echo $range[0]['loan_lengthfrom'] ?: '0';?>" />
		                            			</div>
		                            		</div>
		                                    <div class="form-group row" id="form_row">
		                                    	<label for="exampleInputEmail2" class="control-label col-md-3">Interest Range: </label>
		                                    	<div class="input-group">
			                            				<input type="text" class="form-control col-md-3" id="interest_range_min" name="interest_range_min" placeholder="Min" autocomplete="off" min="0" value="<?php echo $range[0]['loan_interestrange_to'] ?: '0';?>"/>
			                            				<span class="input-group-addon">%</span>
			                            			</div>
			                            			<label for="to" style="padding-left:10px; padding-right:10px; font-size: 14px;"> to </label>
			                            			<div class="input-group">
			                            				<input type="text" class="form-control col-md-3" id="interest_range_max" name="interest_range_max" placeholder="Max" min="0" value="<?php echo $range[0]['loan_interestrange_from'] ?: '0';?>" />
			                            				<span class="input-group-addon">%</span>
			                            			</div>
		                                    	
		                                    </div>
		                                    <div class="form-group row" id="form_row">
		                                    	<label for="exampleInputEmail2" class="control-label col-md-3">Tax Rate: </label>
		                                    	<div class="col-md-9" style="padding-left:0px;">
		                                    		<label for="exampleInputEmail2" class="control-label col-md-2" style="padding-left:0px;">Disc Rate: </label>
		                                    		<input type="text" class="form-control" id="disc_rate" name="disc_rate" placeholder="Enter Value" value="<?php echo $range[0]['discrate'] ?: '0';?>" />
		                                    		<div class="checkbox checkbox-nice">
		                                    			<div class="checkbox-nice checkbox-inline">
		                                    				<?php
		                                    				if(trim($range[0]['discrate_checked'])=='1')
		                                    				{
		                                    					$checked='checked="checked"';
		                                    				}
		                                    				else{
		                                    					$checked='';
		                                    				}
		                                    				?>
		           	 										<input type="checkbox" id="checkbox-inl-1" name="discrate_checked" value="1" <?php echo $checked;?> />
		                                    				<label for="checkbox-inl-1"></label>
		                                    			</div>
		                                    		</div>
		                                    	</div>
		                                    </div>
		                                    <div class="form-group row" id="form_row">
		                                    	<label for="exampleInputEmail2" class="control-label col-md-3"> </label>
		                                    	<div class="col-md-9" style="padding-left:0px;">
		                                    		<label for="exampleInputEmail2" class="control-label col-md-2" style="padding-left:0px;">Normal Rate: </label>
		                                    		<input type="text" class="form-control" id="normal_rate" placeholder="Enter Value" name="normal_rate" value="<?php echo $range[0]['normal_rate'] ?: '0';?>"/>
		                                    		<div class="checkbox checkbox-nice">
		                                    			<div class="checkbox-nice checkbox-inline">
		                                    				<?php
		                                    				if(trim($range[0]['normal_rate_checked'])=='1')
		                                    				{
		                                    					$checked1='checked="checked"';
		                                    				}
		                                    				else{
		                                    					$checked1='';
		                                    				}
		                                    				?>
		                                    				<input type="checkbox" id="checkbox-inl-2" <?php echo $checked1;?> name="normal_rate_checked" value="1" />
		                                    				<label for="checkbox-inl-2"></label>
		                                    			</div>
		                                    		</div>
		                                    	</div>
		                                    </div>
		                                    <div class="form-group row" id="form_row">
		                                    	<label for="exampleInputEmail2" class="control-label col-md-3"> </label>
		                                    	<div class="col-md-9" style="padding-left:0px;">
		                                    		<label for="exampleInputEmail2" class="control-label col-md-2" style="padding-left:0px;">Specific Rate: </label>
		                                    		<input type="text" class="form-control" id="specific_rate" placeholder="Enter Value" name="specific_rate" value="<?php echo $range[0]['specific_rate'] ?: '0';?>">
		                                    		<div class="checkbox checkbox-nice">
		                                    			<div class="checkbox-nice checkbox-inline">
		                                    				<?php
		                                    				if(trim($range[0]['specific_rate_checked'])=='1')
		                                    				{
		                                    					$checked2='checked="checked"';
		                                    				}
		                                    				else{
		                                    					$checked2='';
		                                    				}
		                                    				?>
		                                    				<input type="checkbox" id="checkbox-inl-3" <?php echo $checked2;?> name="specific_rate_checked" value="1">
		                                    				<label for="checkbox-inl-3"></label>
		                                    			</div>
		                                    		</div>
		                                    	</div>
		                                    </div>
		                                    <div class="form-group row" id="form_row">
		                                    	<label for="exampleInputEmail2" class="control-label col-md-3">Fees: </label>                                    	
		                                		<div class="input-group">
		                                			<span class="input-group-addon"><i class="fa fa-money"></i></span>
		                            				<input type="text" class="form-control col-md-3" id="loan_fees_min" name="loan_fees_min" placeholder="Min" value="<?php echo $range[0]['feesto'] ?: '0';?>" autocomplete="off">
		                            			</div>
		                            			<label for="to" style="padding-left:10px; padding-right:10px; font-size: 14px;">to</label>
		                            			<div class="input-group">
		                                			<span class="input-group-addon"><i class="fa fa-money"></i></span>
		                            				<input type="text" class="form-control col-md-3" id="loan_fees_max" name="loan_fees_max" value="<?php echo $range[0]['feesfrom'] ?: '0';?>" autocomplete="off" placeholder="Max">
		                            			</div>
		                                    		
		                                    </div>

		                                    <div class="form-group row" id="form_row">
		                                    	<label for="exampleInputEmail2" class="control-label col-md-3">TVA(VAT On Interest): <br><small>(Tax wouldbe fixed at 19.25%)</small> </label>
		                                    	<div class="input-group">
		                                    		<input type="text" class="form-control col-md-3" id="loan_vat" name="loan_vat" placeholder="input value" value="<?php echo $range[0]['vat_on_interest'] ?: '0';?>" autocomplete="off" />
		                                    		<span class="input-group-addon">%</span>
		                            			</div>                                    	
		                                    </div>
		                                    <br />

		                                    <div class="col-sm-12 col-md-12">
												<div class="form-group row ">
												<label for="exampleInputEmail2" class="control-label col-md-3">&nbsp;</label>
												<div class="input-group">
													<input type="hidden" class="form-control" name="loan_type" value="<?php echo trim($range[0]['lid']) ?: '2';?>">
													<input type="text" class="form-control" name="editid" value="<?php echo trim($range[0]['id']) ?: '0';?>">
		                                    		<button type="submit" class="btn btn-success" id="updaterange">Update</button>
		                                    	</div>
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

			

		</div>
	</div>
	