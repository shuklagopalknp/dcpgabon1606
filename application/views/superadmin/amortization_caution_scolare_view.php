<?php
//echo APPPATH.'views/superadmin/class.amort.php';
//include('./class.amort.php');
//require_once dirname(__FILE__) . './class.amort.php';
//Class_Amort
?>
<style type="text/css">
	.lodertypeof {    
  background-color: #dff0d8c7;
  background-image: url("<?php echo base_url('assets/img/select2-spinner.gif');?>");
  background-size: 13px 13px;
  background-position:left center;
  background-repeat: no-repeat;
  opacity: 0.5;
  }
  .main-box .main-box-body {
    padding: 10px ;
}
</style>

<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<?php //echo "<pre>", print_r($amortrecord), "</pre>";?>
			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">Dashboard</a></li>
						<li><a href="<?php echo base_url('PP_Caution_Scolare_Loans/customer_details/'.$this->uri->segment(3));?>"><span>DÉTAILS DU CLIENT</span></a></li>						
						<li class="active"><span>TABLEAU AMORTISSMENT</span></li>
					</ol>					
				</div>
			</div>
			<div class="main-box-body clearfix">
				<div class="row">
					<div class="col-lg-3 pull-right">						
						<a href="<?php echo base_url('PP_Caution_Scolare_Loans/download_amortizationpdf/').$this->uri->segment(3);?>" class="btn btn-primary" align='middle'> <i class="fa fa-cloud-download"></i> TELECHARGER EN PDF</a>
					</div>
				</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<div class="main-box-body clearfix">
								<div class="table-responsive" style="border-radius: 3px">
								<table id="" class="table table-hover table-bordered">
									<tbody>
									<tr>
										<td colspan="4"><center>Calcul des fais caultions pour étudiant</center></td>
									</tr>																				
									<tr>
										<td align="left" width='25%'>&nbsp;</td>
										<td align="left" width='15%'>Montant Caution</td>
										<td align="left" width='15%'>Frais d'étude</td>
										<td align="left" width='18%'><small> Frais de transfer COMEX comme indlque sur la fiche de prel evement des frais</small> </td>
									</tr>									
								
									<tr>
										<td align="left">&nbsp;</td>
										<td align="left" colspan="2">&nbsp;</td>
										
										<td align="left">&nbsp;</td>		
									</tr>

									<tr>
										<td align="left"><b><font size=2 color="#929292">&nbsp;</font></b></td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
												<?php echo number_format($amortrecord[0]['deposit_amount'],0,',',' ');?>
												</div>
											</div>
										</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<?php echo number_format($amortrecord[0]['study_costs'],0,',',' ');?>
												</div>
											</div>
										</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<?php echo number_format($amortrecord[0]['transfer_fee'],0,',',' ');?>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td align="left"><font size=2 color="#929292">TVA</font></td>
										<td align="right">&nbsp;</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<?php echo number_format($amortrecord[0]['tva_studycosts_calculator'],0,',',' ');?>
												</div>
											</div>
										</td>
										<td align="right">
											<div class="form-group">
												<div class="input-group">							
													<?php echo number_format($amortrecord[0]['tva_transferfee_calculator'],0,',',' ');?>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td  height="21" align="left"><font size=2 color="#929292">T1</font></td>
										<td align="right">&nbsp;</td>
										<td align="right">&nbsp;</td>
										<td align="right">
											<?php echo number_format($amortrecord[0]['t1_equity_calculator'],0,',',' ');?>
										</td>
									</tr>										
									<tr>
										<td  height="20" align="left"><font size=2 color="#929292">DUREE(Mois)</font></td>
										<td align="right">&nbsp;</td>
										<td align="right">&nbsp;</td>
										<td align="right">
											<?php echo number_format($amortrecord[0]['loan_interest'],0,',',' ');?>
										</td>
									</tr>										
									<tr>
										<td  height="20" align="left"><font size=2 color="#929292">T2</font></td>
										<td align="right">&nbsp;</td>
										<td align="right">
											<?php echo number_format($amortrecord[0]['t2_study_costs_calculator'],0,',',' ');?>
										</td>
										<td align="right">
											<?php echo number_format($amortrecord[0]['t2_transfer_fee_calculator'],0,',',' ');?>
										</td>
									</tr>
									<tr>
										<td height="20" align="right" colspan="4"><font size=2 color="#929292">&nbsp;</font></td>
										
									</tr>										
									<tr>
										<td align="left"><font size=2 color="#000000">Net à payer</font></td>
										<td align="right" ><font color="#000000">&nbsp;</font></td>
										<td align="right" >
											<font color="#000000">
												<?php echo number_format($amortrecord[0]['net_pay_amt'],0,',',' ');?>
											</font>
										</td>
										<td  align="right"><font color="#000000">&nbsp;</font></td>
									</tr>
									<tr>
										<td  align="left"><font color="#000000">Net à bloquer</font></td>
										<td align="right" >
											<font color="#000000">
												<?php echo number_format($amortrecord[0]['net_block_amt'],0,',',' ');?>											
											</font>
										</td>
										<td align="right" ><font color="#000000">&nbsp;</font></td>
										<td  align="right"><font color="#000000">&nbsp;</font></td>
									</tr>										
									
								</tbody>
							</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	 <footer id="footer-bar" class="row">
		<p id="footer-copyleft" class="col-xs-12">Powered by DCP.</p>
	</footer>
</div>
</div>
</div>
</div>

<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  
<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script>  
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/demo.js"></script>   

<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script>

<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script> 



<script type="text/javascript">


$(document).ready(function(){
	//$('.showme') .hide();	
	//$('.showme').addClass("lodertypeof"); 
	$( "#btnShowHide" ).click(function() {
    	$( ".showme" ).toggle();
	});	

	/*$('#amount_sought_customer').on('keypress click', function(){

		var fedit=$("#amount_sought_customer").val();
		var requested_overdraft=$("#qrover").val();
		//alert(requested_overdraft);
		if(requested_overdraft < fedit)
		{
			alert(fedit);
			alert("not good");
		}
		$(".outputval").html(fedit);

		//alert(requested_overdraft);
		//alert(fedit);
	});*/	
	var requested_overdraft=$("#qrover").val();
		$('#amount_sought_customer').on('keyup click', function(){
		  if ($(this).val() > Math.round(requested_overdraft)){
		  	$(".outputval").html("Not greater than MONTANT DU PRET above "+Math.round(requested_overdraft)).addClass("alert alert-danger");
		   // alert("Not more thab numbers above CFA "+Math.round(requested_overdraft));
		    $(this).val(Math.round(requested_overdraft));
		  }else{
		  	$(".outputval").html("").removeClass("alert alert-info");
		  }
	});	


});
function removeCommas(str) {
    while (str.search(",") >= 0) {
        str = (str + "").replace(',', ' ');
    }
    return str;
};

var editid ="<?php echo $amortrecord[0]['tdid'];?>";
$('#buttonsoughtcustomer').click(function(){
	$(".outputval").html("").removeClass("alert alert-info");
		var editval=$("#amount_sought_customer").val();	 
		if(editval!="" || editval!=0){
			$.ajax({
            type: "POST",
            url: "<?php echo base_url('Decovert_Loans/change_objet_amountsoughtcustomer') ?>",
            data:{'editid':editid,'select_val':editval },
             beforeSend: function(){
              $('.showme').addClass("lodertypeof");              
              $(".form-group").removeClass('has-error');	                   
            },
            success: function(result){              
              $('.showme').removeClass("lodertypeof");              
              var objc = JSON.parse(result);              
              console.log(objc);
              if(objc.success =='success'){  
              	$("#showme").hide();
              	$(".putdata").html('CFA '+ removeCommas(editval));
                 notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>MONTANT SOLLICITE PAR LE CLIENT update successfully.</p>','success');                
              }else if(objc.error=='error'){   
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred  Other Information `Objet du crédit`.</p>','error');
              }                       
            }        
        });
			
		}else{
			$(".form-group").addClass('has-error');			
		}
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

</script>
</body>
</html>