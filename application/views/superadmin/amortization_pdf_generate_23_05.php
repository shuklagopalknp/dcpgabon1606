<?php      
       $customer_data =  json_decode($loan_details['customer_data']);
       $databinding=(array) json_decode($amortizationdata[0]['databinding']);
        // echo "<pre>", print_r($amortizationdata[0]['loan_tax'] ),"</pre>";
        // echo $fraisDosier=$loan_details['frais_de_dossier'];
// 		echo $age= date_diff(date_create($customer_data->dob), date_create('today'))->y;
// 		echo $loan_amt=$loan_details['loan_amt'];
									
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
    <head> <style>
    @page {
    margin: 0;
}
    </style> </head>
    <body translate="no" style="background-color: #ffffff; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;">
        		 
		
		<table style="width: 703px; background-color: #fff; margin: 0px auto; padding: 0;">
            <tbody>
                <tr>
                    <td style="height: 15px;"></td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 600px; text-align: center; ">
                                        <span style="font-weight: bold; font-size: 20px;">TABLEAU AMORTISSEMENT</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 100%; font-size: 14px; font-weight: normal; line-height: 19px; border-bottom: solid 1px #ddd; padding: 10px;">
                                        <span style="display: block; font-size: 14px; padding: 0; font-weight: 400; text-align: justify;"> </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 800px;">
                            <tbody>
							
                                <tr>
                                    <td style="width: 100%; vertical-align: top; padding-right: 10px;">
                                        <table style="width:100%;">
                                            <tbody>
                                                
											     <tr>
                                                    <td style="height: 20px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px;; display: inline-block;">Nom Du Client</span> <span style="font-weight: normal;"> <?php echo ucwords($customer_data->first_name.' '.$customer_data->middle_name.' '.$customer_data->last_name);?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Numero De Compte</span>  <span style="font-weight: normal;"><?php echo $customer_data->account_no; ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Type De Pret</span> <span style="font-weight: normal;">
                                                    <?php if($amortizationdata[0]['loan_type'] == "1"){
                                                    echo "Fête à la Carte";
                                                    } else if($amortizationdata[0]['loan_type'] == "2"){ 
                                                        echo "Congé à la Carte";
                                                    }else{
                                                        echo "Crédit Confort";
                                                    }                                                    ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Montant Du Pret</span> <span style="font-weight: normal;">CFA <?php echo number_format($am->amount,0,',',' ');?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Nombre D'echeance</span> <span style="font-weight: normal;"><?php echo $am->npmts; ?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Modalite D'echeance</span>  <span style="font-weight: normal;">Constante</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Date Premiere Echeance</span>  <span style="font-weight: normal;"><?php echo $loandate."-".$databinding[0]->month."-".$databinding[0]->years?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Taux D’Emprunt</span> <span style="font-weight: normal;"><?php echo number_format($amortizationdata[0]['loan_interest'],2)."%";?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Taux TVA(TVA)</span> <span style="font-weight: normal;"><?php echo $amortizationdata[0]['tva'] ;?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Periodicite</span> <span style="font-weight: normal;">Mensuel</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Frais de Dossier TTC</span> <span style="font-weight: normal;"><?php echo number_format($loan_details['frais_de_dossier']*1.18,0,',',' ');?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Prime d'Assurance/Assurance Personnelle</span> <span style="font-weight: normal;"><?php echo $insuranceAmort;?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold;"><span style="width: 183px; display: inline-block;">Frais D’Enregistrement TTC</span> <span style="font-weight: normal;"> 0.00 </span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 10px; width: 100%;"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%; border-collapse: collapse;margin-top: 8%">
                            <tbody style="">
                                <tr>
                                    <td style="font-size: 13px;background: #f5f5f5;border: solid 1px #ddd;padding: 5px;text-align: left;line-height: 22px;border-spacing: 0;width: 10%;"><span style="font-weight: normal;">N° D'echeanc</span></td>
                                    <td style="font-size: 13px;background: #f5f5f5;border: solid 1px #ddd;padding: 5px;text-align: left;line-height: 18px;border-spacing: 0;width: 10%;">
                                        <span style="font-weight: normal;">Capital Debut Periode</span>
                                    </td>
                                    <td style="font-size: 13px;background: #f5f5f5;border: solid 1px #ddd;padding: 5px;text-align: left;line-height: 18px;border-spacing: 0;width: 10%;">
                                        <span style="font-weight: normal;">Capital Fin Periode</span>
                                    </td>
                                    <td style="font-size: 13px;background: #f5f5f5;border: solid 1px #ddd;padding: 5px;text-align: left;line-height: 18px;border-spacing: 0;width: 10%;">
                                        <span style="font-weight: normal;">Capital Amorti</span>
                                    </td>
                                    <td style="font-size: 13px;background: #f5f5f5;border: solid 1px #ddd;padding: 5px;text-align: left;line-height: 18px;border-spacing: 0;width: 10%;">
                                        <span style="font-weight: normal;">Interets TTC De La Periode</span>
                                    </td>
                                    <td style="font-size: 13px;background: #f5f5f5;border: solid 1px #ddd;padding: 5px;text-align: left;line-height: 18px;border-spacing: 0;width: 10%;"><span style="font-weight: normal;">Interets HT</span></td>
                                    <td style="font-size: 13px;background: #f5f5f5;border: solid 1px #ddd;padding: 5px;text-align: left;line-height: 18px;border-spacing: 0;width: 10%;">
                                        <span style="font-weight: normal;">TAV Sur Interet</span>
                                    </td>
                                    <td style="font-size: 13px;background: #f5f5f5;border: solid 1px #ddd;padding: 5px;text-align: left;line-height: 18px;border-spacing: 0;width: 10%;">
                                        <span style="font-weight: normal;">Montant De L'echeance</span>
                                    </td>
                                    <td style="font-size: 13px;background: #f5f5f5;border: solid 1px #ddd;padding: 5px;text-align: left;line-height: 18px;width: 10%;"><span style="font-weight: normal;">Date De L'echeance</span></td>
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
                                ?>
								 <tr>
                                     
                                    <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <span style="font-weight: normal;"><?php echo $i;?></span>
                                    </td>
                                     <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <span style="font-weight: normal;"><?php echo number_format($bbal,0,',',' ') ;?></span>
                                    </td>
                                     <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <span style="font-weight: normal;"><?php echo number_format($ebal,0,',',' ');?></span>
                                    </td>
                                     <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <span style="font-weight: normal;"><?php echo number_format($ppmnt,0,',',' ') ;?></span>
                                    </td>
                                     <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <span style="font-weight: normal;"><?php echo number_format($ipmnt,0,',',' ');?></span>
                                    </td>
                                     <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <span style="font-weight: normal;"><?php echo number_format($pbint,0,',',' ');?></span>
                                    </td>
                                     <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <span style="font-weight: normal;"><?php echo number_format($vbint,0,',',' ');?></span>
                                    </td>
                                     <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <span style="font-weight: normal;"><?php echo number_format($cpmnt,0,',',' ') ;?></span>
                                    </td>
                                     <td style="font-size: 13px; border: solid 1px #ddd; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <span style="font-weight: normal;"><?php echo $loandate."-".date("m", strtotime( $cdate." +$i months"));?><?php echo "-".date("Y", strtotime( $cdate." +$i months"));?></span>
                                    </td>
                                    
                                </tr>
							<?php    $sumofMonthly += $cpmnt;
                        $sumofPrincipal +=$ppmnt;
                        $sumofInterestPaidTaxIncl +=$ipmnt;                     
                        $sumofInterestPaidbeforTax +=$pbint;
                        $sumofVATonInterest +=$vbint;
                        $MonthlyPayments +=$cpmnt;
                    
                 } 
                 ?>
								 
								
                            </tbody>
							<tfoot>
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
							</tfoot>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
