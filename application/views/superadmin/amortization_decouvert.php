<style type="text/css">
	.lodertypeof {    
  background-color: #dff0d8c7;
  background-image: url("<?php echo base_url('assets/img/select2-spinner.gif');?>");
  background-size: 13px 13px;
  background-position:left center;
  background-repeat: no-repeat;
  opacity: 0.5;
  }
</style>
<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<?php //echo "<pre>", print_r($amortrecord), "</pre>";?>
			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<li><a href="<?php echo base_url('Decovert_Loans');?>">DECOUVERT</a></li>
						<li class="active"><span>TABLEAU AMORTISSMENT</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
				<div class="row">
				<div class="col-lg-5 pull-right">
					<a href="<?php echo base_url('Decovert_Loans/select_customer/').$this->uri->segment(3);?>" class="btn btn-default"  align='middle'>Sélectionner Un Client</a>
					<a href="<?php echo base_url('Decovert_Loans/Decovert_amortization_pdf/').$this->uri->segment(3);?>" class="btn btn-primary" align='middle'> <i class="fa fa-cloud-download"></i> Telecharger En PDF</a>
				</div>
			</div>
				<div class="row" style="margin-top:10px;">					

					<div class="col-lg-12">

						<div class="main-box clearfix">

							<div class="main-box-body clearfix">

								<div class="table-responsive">
									<table id="" class="table table-hover">
										<thead>
											<tr>
												<th align="left">DESIGNATION</th>
												<th align="left">MOIS 1</th>
												<th align="left">MOIS 2</th>
												<th align="left">MOIS 3</th>
											</tr>
										</thead>
										<?php 
										$m1=json_decode($amortrecord[0]['month1']);
										$m2=json_decode($amortrecord[0]['month2']);
										$m3=json_decode($amortrecord[0]['month3']);
										?>
									<tbody>
										<tr>
											<td align="left"><b><font size=2 color="#929292">SALAIRE NET MENSUEL</font></b></td>
											<td align="left"><?php echo number_format($m1[0]->m1nms,0,',',' ')?></td>
											<td align="left"><?php echo number_format($m2[0]->m2nms,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3nms,0,',',' ');?></td>		
										</tr>

										<tr>
											<td align="left"><b><font size=2 color="#929292">REVENU SUPPLEMENTAIRE (+)</font></b></td>
											<td align="left"><?php echo number_format($m1[0]->m1ai,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2ai,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3ai,0,',',' ');?></td>
										</tr>
										<tr>
											<td align="left"><font size=2 color="#929292">PAIEMENT PRET ENTREPRISE</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1pcl,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2pcl,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3pcl,0,',',' ');?></td>
										</tr>
										<tr>
											<td  height="21" align="left"><font size=2 color="#929292">AVANCE SUR SALAIRE</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1ais,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2ais,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3ais,0,',',' ');?></td>
										</tr>
										<tr>
											<td colspan="4"></td>
										</tr>
										<tr>
											<td  height="20" align="left"><font size=2 color="#929292">DEDUCTION (&#8722;)</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1deduction,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2deduction,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3deduction,0,',',' ');?></td>
										</tr>
										<tr>
											<td  height="20" align="left"><font size=2 color="#929292">BONUS</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1bonus,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2bonus,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3bonus,0,',',' ');?></td>
										</tr>
										<tr>
											<td  height="20" align="left"><font size=2 color="#929292">PRIMES</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1primes,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2primes,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3primes,0,',',' ');?></td>
										</tr>
										<tr>
											<td  height="20" align="left"><font size=2 color="#929292">GRATIFICATION 13ième mois</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1gratification,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2gratification,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3gratification,0,',',' ');?></td>
										</tr>
										<tr>
											<td height="2" colspan="4"></td>
										</tr>
										<tr>
											<td align="left"><font size=2 color="#000000">TOTAL SALAIRE NET</font></td>

											<td align="left"><font color="#000000"><?php echo number_format($m1[0]->m1_total_net_salary,0,',',' ');?></font></td>

											<td align="left"><font color="#000000"><?php echo number_format($m2[0]->m2_total_net_salary,0,',',' ');?></font></td>

											<td  align="left"><font color="#000000"><?php echo number_format($m3[0]->m3_total_net_salary,0,',',' ');?></font></td>
										</tr>
										<tr>

											<td  align="left"><font color="#000000">SALAIRE MOYEN</td>
											<td colspan="4"  align="left"><font color="#000000">CFA <?php echo number_format($amortrecord[0]['average'],0,',',' ');?></td>
										</tr>										
										<tr>
											<td   align="left"><font color="#000000">MONTANT DECOUVERT A ACCORDER</td>
											<td colspan="6"   align="left"><font color="#000000">CFA 	<?php echo number_format($amortrecord[0]['requested_overdraft'],0,',',' ') ?: '-';?>
												<input type="hidden" id="qrover" name="qrover" value="<?php echo $amortrecord[0]['requested_overdraft'];?>"/>
											</td>
										</tr>
										<tr>
											<td   align="left"><font color="#000000">MONTANT SOLLICITE PAR LE CLIENT</td>
											<td colspan="6"   align="left"><font class="putdata" color="#000000">CFA 	<?php echo number_format($amortrecord[0]['amount_sought_customer'],0,',',' ') ?: '-';?></font>
												<a href="javascript:void(0);" class="table-link" id="btnShowHide" >
													<i class="fa fa-pencil"></i>
												</a>
												<div class="showme" id="showme" style="display: none;">
													<form class="form-inline" role="form">
															<div class="form-group row">
														        <div class="col-md-12 col-sm-12">
															        <div class="input-group">
																		<span class="input-group-addon">CFA</span>
																		<input type="number" class="form-control required" id="amount_sought_customer" name="amount_sought_customer" min="0" value="<?php echo $amortrecord[0]['amount_sought_customer'] ?: '0';?>" required />
																	</div>
														        </div>
																<span class="amterror"></span>
															</div>
															<div class="btn-group-single pull-right">
																<button class="btn btn-primary" type="button" id="buttonsoughtcustomer">Update</button>
															</div>
													</form>
												</div>
												<div class="outputval"></div>
											</div>
											</td>
										</tr>
										<tr>
                                              <td align="left"><font color="#000000">MONTANT SOLLICITE PAR LE CLIENT EN LETTER</td>
                                              <td colspan="7" align="left">
                                                <div class="col-md-10">
                                                  <div class="showmeloder form-group">
                                                    <input type="text" class="form-control required" id="letter_format" name="letter_format" value="<?php echo $amortrecord[0]['letter_format'];?>">
                                                  </div>                                                  
                                                </div>
                                                 <div class="col-md-2">
                                                <div class="btn-group-single pull-right">
                                                    <button class="btn btn-primary" type="button" id="letterformat">Update</button>
                                                  </div>
                                                </div>
                                              </td>
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

	var requested_overdraft=$("#qrover").val();
		$('#amount_sought_customer').on('keyup click', function(){
		  if ($(this).val() > Math.round(requested_overdraft)){
		  	//$(".outputval").html("Not greater than MONTANT DU PRET above CFA "+Math.round(requested_overdraft)).addClass("alert alert-danger");
		   // alert("Not more thab numbers above CFA "+Math.round(requested_overdraft));
		    $(this).val(Math.round(requested_overdraft));
		  }else{
		  	//$(".outputval").html("").removeClass("alert alert-info");
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
	//$(".outputval").html("").removeClass("alert alert-info");
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


$('#letterformat').click(function(){
	//$(".outputval").html("").removeClass("alert alert-info");
		var letterval=$("#letter_format").val();
		var id='<?php echo $this->uri->segment(3);?>';
		 
		if(letterval!=""){
			$.ajax({
            type: "POST",
            url: "<?php echo base_url('Decovert_Loans/change_amountlatter') ?>",
            data:{'text':letterval,'id':id},
             beforeSend: function(){
              $('.showmeloder').addClass("lodertypeof");              
              $(".form-group").removeClass('has-error');	                   
            },
            success: function(result){ 
            console.log(result);             
              $('.showmeloder').removeClass("lodertypeof");              
              var objc = JSON.parse(result);              
              console.log(objc);
              if(objc.success =='success'){  
              	$("#showmeloder").hide();
              	$("#letter_format").val(letterval);
                 notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>MONTANT SOLLICITE PAR LE CLIENT EN LETTER update successfully.</p>','success');              	                      
            	}
            	else if(objc.error=='error'){   
            		$("#letter_format").val(letterval);
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