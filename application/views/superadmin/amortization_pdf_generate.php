<?php      
       $customer_data =  json_decode($loan_details['customer_data']);
       $databinding=(array) json_decode($amortizationdata[0]['databinding']);
        // echo "<pre>", print_r($amortizationdata[0]['loan_tax'] ),"</pre>";
        // echo $fraisDosier=$loan_details['frais_de_dossier'];
//      echo $age= date_diff(date_create($customer_data->dob), date_create('today'))->y;
//      echo $loan_amt=$loan_details['loan_amt'];
                                    
        if($amortizationdata[0]['loan_schedule']=='Monthly'){
            $year=($amortizationdata[0]['loan_term']/12);
        }else if($amortizationdata[0]['loan_schedule']=='Yearly'){
            $year=$amortizationdata[0]['loan_term'];
        }
        else if($amortizationdata[0]['loan_schedule']=='Yearly'){
            $year=$amortizationdata[0]['loan_term'];
        }

        $loan_interest =$amortizationdata[0]['loan_interest'];
        // $rt=($loan_interest*(1+19.25/100));
        $vat_on_interest=$amortizationdata[0]['loan_tax'] ?: '19.25'; 
        $rt=($loan_interest*(1+$vat_on_interest/100));
        $curd=date("Y-m-d", strtotime($amortizationdata[0]['created']));
        $amount=$amortizationdata[0]['loan_amt'];
        $rate=$rt;
        $years=$year;
        $am=new Class_Amort();
        $am->amort($amount,$rate,$years,$curd, $loan_interest,$amortizationdata[0]['tva'],$amortizationdata[0]['css'],$fraisDosier,$age,$amount);
        // $am->amort($amount,$rate,$years,$curd, $loan_interest,$this->data['tax_interest'],$this->data['css_value'],'','','');
        // echo "<pre>", print_r($am),"</pre>";
    //   echo $ebal = $am->amount;
        $years=$years;
        if(($years*12) <12){
         $month=($years*12);
         $text="Months";
        }else{
          $month=($years);
          $text="years";
          
        }
    if((($customer_data->cat_employeurs) == "Public Civil 25") || (($customer_data->cat_employeurs) == "Prive 25") || (($customer_data->cat_employeurs) == "Public Corps 25")){
                                            $loandate= '25';
                                        }else if((($customer_data->cat_employeurs) == "Prive 20") || (($customer_data->cat_employeurs) == "Autres 20")){
                                            $loandate='20';
                                        }else if((($customer_data->cat_employeurs) == "Prive 30") || (($customer_data->cat_employeurs) == "Organisation internationales")){
                                            $loandate='30';
                                        }else{
                                            $loandate='30';
                                        }
                                        


                    $age= date_diff(date_create($customer_data->dob), date_create('today'))->y;
                        //   print_r($loan_details);
                    if($age<=30){
                      $insuranceRate="0.42";
                    }else if($age<=40){
                      $insuranceRate="0.75";
                    }else if($age<=50){
                      $insuranceRate="0.92";
                    }else if($age<=60){
                      $insuranceRate="2.06";
                    }else{
                      $insuranceRate="0.00";
                    }

                     $insuranceAmount=($amount*$insuranceRate)/100;
                     
                    
                    
                if($age > 60){
                    
                    $insuranceAmort= $loan_details['frais_de_assurance'] ? $loan_details['frais_de_assurance'] : "0.00" ;
                }else{
                    $insuranceAmort= number_format($insuranceAmount,0,',',' ') ;
                }
                
                // echo $insuranceAmort;
?>  
<html>
    <head>
	<style>
		@page {
			margin: 0;

		} 
		.label_class{
			width: 183px; display: inline-block;background-color: #ddd; border-radius: 3px; padding:2px 5px 2px 5px;
		} 
		@media print { 
			pagebreak {
				page-break-before:always !important;
			}
		}
    </style>
	</head>
    <body translate="no" style="background-color: #ffffff; font-family: Arial, Helvetica, sans-serif, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;">
        <table CELLSPACING=0 CELLPADDING=5 style="width: 703px; background-color: #fff; margin: 0px auto; padding: 0;border: 1px solid #eeeeee;">
            <tbody>
                <tr>
                    <td style="border-bottom: 1px solid #333333;">
                        <table style="width: 800px; padding: 5px 30px 5px 30px;" >
                            <tbody>
                                <tr>
                                    <td colspan="2" style="width: 100%; height: 15px;">                                         
                                    </td>
                                </tr>
                                <tr>
								<tr>
                                    <td style="position: relative; text-align: left; width: 40px;"><img src="<?php echo  base_url(); ?>/assets/logo2.png" style="width: 40px;" /></td>
                                    <td style="color: #000000;width: 600px; text-align: center;">
                                        <span style="color: #000000; font-weight: bold; font-size: 20px;">TABLEAU D'AMORTISSEMENT</span>
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 800px; padding: 5px 30px 5px 30px;">
                            <tbody>
                            
                                <tr>
                                    <td width="15px"></td>
                                    <td style="width: 100%; vertical-align: top; padding-right: 5px;">
                                        <table style="width:100%;">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;">
														<span class="label_class">Nom Du Client</span>
														<span style="font-weight: normal;"> 
															<?php echo ucwords($customer_data->first_name.' '.$customer_data->middle_name.' '.$customer_data->last_name);?>
														</span>
													</td>
                                                    <td style="font-size: 13px; font-weight: bold;"><span class="label_class">Numéro de compte</span>  <span style="font-weight: normal;"><?php echo $customer_data->account_no; ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;">
														<span  class="label_class">Type de prêt</span> <span style="font-weight: normal;">
															<?php if($amortizationdata[0]['loan_type'] == "1"){
															echo "Fête à la Carte";
															} else if($amortizationdata[0]['loan_type'] == "2"){ 
																echo "Congé à la Carte";
															}else{
																echo "Crédit Confort";
															}?>
														</span>
													</td>
                                                    <td style="font-size: 13px; font-weight: bold;">
														<span  class="label_class">Montant du prêt</span>
														<span style="font-weight: normal;">CFA <?php echo number_format($am->amount,0,',',' ');?></span>
													</td>
                                                </tr>   
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span  class="label_class">Nombre d'échéances</span> <span style="font-weight: normal;"><?php echo $am->npmts; ?></span></td>
                                                    <td style="font-size: 13px; font-weight: bold;"><span  class="label_class">Modalité d'échéance</span>  <span style="font-weight: normal;">Constante</span></td>

												</tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span  class="label_class">Date de première échéance</span>  <span style="font-weight: normal;"><?php echo $loandate."-".$databinding[0]->month."-".$databinding[0]->years?></span></td>
                                                    <td style="font-size: 13px; font-weight: bold;"><span  class="label_class">Taux D’Emprunt</span> <span style="font-weight: normal;"><?php echo number_format($amortizationdata[0]['loan_interest'],2)."%";?></span></td>
												</tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span  class="label_class">Taux TVA(TVA)</span> <span style="font-weight: normal;"><?php echo $amortizationdata[0]['tva'] ;?></span></td>
                                                    <td style="font-size: 13px; font-weight: bold;"><span  class="label_class">Périodicité</span> <span style="font-weight: normal;">Mensuelle</span></td>
												</tr>
												<tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span  class="label_class">Frais de Dossier TTC</span> <span style="font-weight: normal;"><?php echo number_format($loan_details['frais_de_dossier']*1.18,0,',',' ');?></span></td>
                                                    <td style="font-size: 13px; font-weight: bold;"><span  class="label_class">Frais D’Enregistrement TTC</span> <span style="font-weight: normal;">0.00</span></td>
												</tr>
												<tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span  class="label_class">Prime d'Assurance/Assurance Personnelle</span> <span style="font-weight: normal;"><?php echo $insuranceAmort;?></span></td>
                                                    
												</tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="15px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table id="customers" style="width: 90%; border-collapse: collapse;margin-top: 4%; padding: 5px 30px 5px 30px; margin: auto; ">
                            <tbody style="">
                                <tr>
                                    <td style="font-size: 11px; font-weight: bold; border: 1px solid #ddd; padding: 5px 8px 5px 8px;width: 10%;">N° D'échéances</td>
                                    <td style="font-size: 11px; font-weight: bold; border: 1px solid #ddd;padding: 5px 8px 5px 8px;width: 10%;">
                                        Capital début période
                                    </td>
                                    <td style="font-size: 11px; font-weight: bold; border: 1px solid #ddd; padding: 5px 8px 5px 8px;width: 10%;">
                                        Capital fin  période
                                    </td>
                                    <td style="font-size: 11px; font-weight: bold; border: 1px solid #ddd;padding: 5px 8px 5px 8px;width: 10%;">
                                        Capital Amorti
                                    </td>
                                    <td style="font-size: 11px; font-weight: bold; border: 1px solid #ddd;padding: 5px 8px 5px 8px;width: 10%;">
                                        Intérêt TTC de la période
                                    </td>
                                    <td style="font-size: 11px; font-weight: bold; border: 1px solid #ddd;padding: 5px 8px 5px 8px;width: 10%;">Intérêt HT</td>
                                    <td style="font-size: 10px; font-weight: bold; border: 1px solid #ddd;padding: 5px 8px 5px 8px;width: 10%;">
                                        TVA Sur Intérêt
                                    </td>
                                    <td style="font-size: 11px; font-weight: bold; border: 1px solid #ddd;padding: 5px 8px 5px 8px;width: 10%;">Montant De L'échéance
                                    </td>
                                    <td style="font-size: 11px; font-weight: bold; border: 1px solid #ddd;padding: 5px 8px 5px 8px;width: 10%;">Date De L'échéance</td>
                                </tr>

								<?php 
								//$am->postinterest;
								$ebal = $am->amount;
								$ccint =0.0;
								$cpmnt = 0.0;
								//$sum=array();
								$sumofMonthly =0;
								$sumofPrincipal =0;
								$sumofInterestPaidTaxIncl =0;
								$sumofInterestPaidbeforTax =0;
								$sumofVATonInterest=0;
								$MonthlyPayments=0;
								$cdate=$am->cdate;  
								for ($i = 1; $i <= $am->npmts; $i++){
									$bbal = $ebal;    
									$ipmnt = $bbal * $am->mrate;
									$ppmnt = $am->pmnt - $ipmnt;
									$ebal = $bbal - $ppmnt;
									$am->mrate;
									$ccint = $ccint + $ipmnt;
									$cpmnt = $am->pmnt;
									//$pbint = $bbal * $am->postinterest/100/12;
									// $pbint = $bbal*$am->postinterest/100/12;
									// $vbint = $pbint*$amortizationdata[0]['tva']/100; 
									// $cssint = $pbint*$amortizationdata[0]['css']/100;
									// $vbint = $pbint*19.25/100;
									// $months=$am->npmts;
									
									$pbint = $ipmnt / 1.19;
									$vbint = $pbint*$amortizationdata[0]['tva']/100;
									//$vbint = $pbint*$vat_on_interest/100;
									$months=$am->npmts;
									if($i==27){?>
										<tr>
											<td colspan="9">
												<br><br><br><br>
											</td>
										</tr>
										<tr <?php if($i % 2 == 0){ ?> style="background-color: #f2f2f2;" <?php  } ?> >
											<td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo $i;?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($bbal,0,',',' ') ;?>
											</td>
											 <td style="font-size: 12px; ">
												<?php echo number_format($ebal,0,',',' ');?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($ppmnt,0,',',' ') ;?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($ipmnt,0,',',' ');?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($pbint,0,',',' ');?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($vbint,0,',',' ');?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd; padding: 5px 8px 5px 8px;">
												<?php echo number_format($cpmnt,0,',',' ') ;?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd; ">
												<?php echo $loandate."-".date("m", strtotime( $cdate." +$i months"));?><?php echo "-".date("Y", strtotime( $cdate." +$i months"));?>
											</td>
										</tr>
									<?php }
									else{?> 
										<tr <?php if($i % 2 == 0){ ?> style="background-color: #f2f2f2;" <?php  } ?> >
											<td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo $i;?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($bbal,0,',',' ') ;?>
											</td>
											 <td style="font-size: 12px; ">
												<?php echo number_format($ebal,0,',',' ');?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($ppmnt,0,',',' ') ;?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($ipmnt,0,',',' ');?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($pbint,0,',',' ');?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd;padding: 5px 8px 5px 8px;">
												<?php echo number_format($vbint,0,',',' ');?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd; padding: 5px 8px 5px 8px;">
												<?php echo number_format($cpmnt,0,',',' ') ;?>
											</td>
											 <td style="font-size: 12px; border: 1px solid #ddd; ">
												<?php echo $loandate."-".date("m", strtotime( $cdate." +$i months"));?><?php echo "-".date("Y", strtotime( $cdate." +$i months"));?>
											</td>
										</tr>
									<?php }
									$sumofMonthly += $cpmnt;
									$sumofPrincipal +=$ppmnt;
									$sumofInterestPaidTaxIncl +=$ipmnt;                     
									$sumofInterestPaidbeforTax +=$pbint;
									$sumofVATonInterest +=$vbint;
									$MonthlyPayments +=$cpmnt;
								}?>
								<tr>
									 <td colspan="2" style="font-size: 13px;  border: solid 1px #ddd; padding: 5px; text-align: right; line-height: 18px; border-spacing: 0;">
										<span style="font-weight: bold;">TOTAL</span>
									</td>
									<td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
										 
									</td>
								   <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
										<span style="font-weight: bold;"><?php echo number_format($sumofPrincipal,0,',',' ');?></span>
									</td>
									<td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
										<span style="font-weight: bold;"><?php echo number_format($sumofInterestPaidTaxIncl,0,',',' ');?></span>
									</td>
									<td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
										<span style="font-weight: bold;"><?php echo number_format($sumofInterestPaidbeforTax,0,',',' ');?></span>
									</td>
									<td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
										<span style="font-weight: bold;"><?php echo number_format($sumofVATonInterest,0,',',' ');?></span>
									</td>
									<td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
										<span style="font-weight: bold;"><?php echo number_format($MonthlyPayments,0,',',' ');?></span>
									</td>
									<td style="font-size: 13px;border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px;"></td>
								</tr>
							</tbody> 
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <center>
             <style type="text/css">
				@media print {
				  .hidden-print {
					visibility: hidden !important;
				  }
				}
			</style>
            <button class="btn btn-primary hidden-print" id="printPageButton" onclick="myfunction()" style="position: relative;">Print Page</button>
        </center>
    </body>
	<script type="text/javascript">
		function myfunction(){
			window.print();
		}
	</script>
</html>
