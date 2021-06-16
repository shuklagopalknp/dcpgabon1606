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
								<li class="active"><span>Décovert Loan Range</span></li>								
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
								<div class="row">
									<div class="form-group col-md-12">
										<form class="form-inline" role="form">
<div class="form-group row" id="form_row">
<label for="exampleInputEmail2" class="control-label col-md-3">Loan Amount: </label>

<input type="text" class="form-control col-md-3" id="loan_amount_from" placeholder="Min" autocomplete="off">
<div class="col-md-1" style="text-align:center"> <span>to</span></div>
<input type="text" class="form-control col-md-3" id="loan_amount_to" placeholder="Max">

<div class="col-md-1">
<!--<div class="checkbox checkbox-nice">
<input type="checkbox" id="remember-me" checked="checked">
<label for="remember-me">

</label>
</div>-->
</div>
</div>


<div class="form-group row" id="form_row">
<label for="exampleInputEmail2" class="control-label col-md-3">Length of Loan: </label>

<input type="text" class="form-control col-md-3" id="loan_amount_from" placeholder="Min" autocomplete="off">
<div class="col-md-1" style="text-align:center"> <span>to</span></div>
<input type="text" class="form-control col-md-3" id="loan_amount_to" placeholder="Max">

<div class="col-md-1">
<!--<div class="checkbox checkbox-nice">
<input type="checkbox" id="remember-me" checked="checked">
<label for="remember-me">

</label>
</div>-->
</div>
</div>


<div class="form-group row" id="form_row">
<label for="exampleInputEmail2" class="control-label col-md-3">Interest % Range: </label>

<input type="text" class="form-control col-md-3" id="loan_amount_from" placeholder="Min" autocomplete="off">
<div class="col-md-1" style="text-align:center"> <span>to</span></div>
<input type="text" class="form-control col-md-3" id="loan_amount_to" placeholder="Max">
<div class="col-md-1">
<!--<div class="checkbox checkbox-nice">
<input type="checkbox" id="remember-me" checked="checked">
<label for="remember-me">

</label>
</div>-->
</div>
</div>


<div class="form-group row" id="form_row">
<label for="exampleInputEmail2" class="control-label col-md-3">Tax Rate: </label>
<div class="col-md-9" style="padding-left:0px;">
<label for="exampleInputEmail2" class="control-label col-md-2" style="padding-left:0px;">Disc Rate: </label>
<input type="text" class="form-control" id="loan_amount_to" placeholder="Enter Value">

<div class="checkbox checkbox-nice">
<div class="checkbox-nice checkbox-inline">
<input type="checkbox" id="checkbox-inl-1">
<label for="checkbox-inl-1">

</label>
</div>

</div>
</div>
</div>
<div class="form-group row" id="form_row">
<label for="exampleInputEmail2" class="control-label col-md-3"> </label>
<div class="col-md-9" style="padding-left:0px;">
<label for="exampleInputEmail2" class="control-label col-md-2" style="padding-left:0px;">Normal Rate: </label>
<input type="text" class="form-control" id="loan_amount_to" placeholder="Enter Value">

<div class="checkbox checkbox-nice">
<div class="checkbox-nice checkbox-inline">
<input type="checkbox" id="checkbox-inl-2" checked="checked">
<label for="checkbox-inl-2">

</label>
</div>

</div>
</div>
</div>

<div class="form-group row" id="form_row">
<label for="exampleInputEmail2" class="control-label col-md-3"> </label>
<div class="col-md-9" style="padding-left:0px;">
<label for="exampleInputEmail2" class="control-label col-md-2" style="padding-left:0px;">Specific Rate: </label>
<input type="text" class="form-control" id="loan_amount_to" placeholder="Enter Value">

<div class="checkbox checkbox-nice">
<div class="checkbox-nice checkbox-inline">
<input type="checkbox" id="checkbox-inl-3" checked="checked">
<label for="checkbox-inl-2">

</label>
</div>

</div>
</div>
</div>


<div class="form-group row" id="form_row">
<label for="exampleInputEmail2" class="control-label col-md-3">Fees: </label>

<input type="text" class="form-control col-md-3" id="loan_amount_from" placeholder="Min" autocomplete="off">
<div class="col-md-1" style="text-align:center"> <span>to</span></div>
<input type="text" class="form-control col-md-3" id="loan_amount_to" placeholder="Max">

<div class="col-md-1">

</div>
</div>

</form>


									</div>
								</div>
                                
                                <div class="row">
									<div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success">SAVE</button>
                                </div>
                                </div>
							
                            </div>
						</div>							
					</div>
				</div>
			</div>
		</div>	
	</div>
