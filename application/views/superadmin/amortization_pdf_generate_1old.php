<html>
<head>
	<title>TABLEAU AMORTISSMENT</title>	 
	 <style>
			@page {
	                margin: 0cm 0cm;
	            }

            /** Define now the real margins of every page in the PDF **/
            body {
                margin-top: 0.5cm;
                margin-left: 0.5cm;
                margin-right: 0.5cm;
                margin-bottom: 1cm;
            }
            /** Define the header rules **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                height: 3cm;
            }

            /** Define the footer rules **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;
            }           
			div.c {
			  text-decoration-line: underline !important;
			  text-decoration-style: double !important;
			}

			
    
    table tr td, th{border:1px #eee; border-style: solid;}	
	</style>
	</head>

	<body bgcolor="#FFFFFF">
		<?php		
		//echo "<pre>", print_r($amortizationdata),"</pre>";
		if($amortizationdata[0]['loan_schedule']=='Monthly'){
			$year=($amortizationdata[0]['loan_term']/12);
		}else if($amortizationdata[0]['loan_schedule']=='Yearly'){
			$year=$amortizationdata[0]['loan_term'];
		}
		else if($amortizationdata[0]['loan_schedule']=='Yearly'){
			$year=$amortizationdata[0]['loan_term'];
		}

		$loan_interest =$amortizationdata[0]['loan_interest'];
		$rt=($loan_interest*(1+19.25/100));
		$curd=date("Y-m-d", strtotime($amortizationdata[0]['created']));
		$amount=$amortizationdata[0]['loan_amt'];
		$rate=$rt;
		$years=$year;
		
		$fraisDosier=$loan_details['frais_de_dossier'];
									$age= date_diff(date_create($customer->dob), date_create('today'))->y;
									$loan_amt=$loan_details['loan_amt'];
		$am=new Class_Amort();
		$am->amort($amount,$rate,$years,$curd,$loan_interest,$tax_interest,$css_value,$fraisDosier,$age,$loan_amt);
		//echo "<pre>", print_r($am),"</pre>";
		$years=$years;
		if(($years*12) <12){
		 $month=($years*12);
		 $text="Months";
		}else{
		  $month=($years);
		  $text="years";
		  
		}


		?>		
           <center><h1><strong>TABLEAU AMORTISSMENT</strong></h1></center>      
			<table cellspacing="0.1" cellpadding="2" width="100%">
				<tbody>
					<tr>
						<td colspan="10">
						<b>MONTANT DU PRET:</b> CFA <?php echo number_format($am->amount,0,',',' ');?><br>
						<b>TAUX INTERET ANNUEL:</b> <?php echo number_format($loan_interest,2);?>%<br>
						Payment Interval: <?php echo $amortizationdata[0]['loan_schedule'];?><br>
						DUREE DU PRET: <?php echo $month.' '.ucfirst($text);?><br>
						<b>MONTANT MENSUEL A REMBOURSER:</b> CFA <?php echo number_format($am->pmnt,0,',',' ');?></td>
				</tr>	
					
				<tr style="background:#3276b1; color: #ffffff;">					
						<th align="center">Pmt #</th>
						<th>BALANCE DEBUT PERIODE</th>
						<th>BALANCE FIN PERIODE</th>
						<th>MONTANT PRINCIPAL A PAYER</th>
						<th>INTERET A PAYER TAXE INCLUSE</th>
						<th>INTERET A PAYER HORS TAXE</th>
						<th>TAV SUR INTERET</th>
						<th>PAIEMENT MENUEL</th>
						<th>MOIS</th>
						<th>ANNEES</th>
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
					    $ccint = $ccint + $ipmnt;
					    $cpmnt = $am->pmnt;
					    $pbint = $bbal * $am->postinterest/100/12;
					    $vbint = $pbint*19.25/100;
					    $months=$am->npmts;
					echo "<tr>";
						echo "<td align='left'>".$i."</td>";
						echo "<td align='left'>".number_format($bbal,0,',',' ')."</td>";
						echo "<td align='left'>".number_format($ebal,0,',',' ')."</td>";
						echo "<td align='left'>".number_format($ppmnt,0,',',' ')."</td>";
						echo "<td align='left'>".number_format($ipmnt,0,',',' ')."</td>";
						echo "<td align='left'>".number_format($pbint,0,',',' ')."</td>";
						echo "<td align='left'>".number_format($vbint,0,',',' ')."</td>";
						echo "<td align='left'>".number_format($cpmnt,0,',',' ')."</td>";
						echo "<td align='left'>".date("m", strtotime( $cdate." +$i months"))."</td>";
						echo "<td align='left'>".date("Y", strtotime( $cdate." +$i months"))."</td>";
						echo "</tr>";
						$sumofMonthly += $cpmnt;
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
						<td colspan="10"></td>
					</tr>
				<tr>
				<th style="border-style: none;" height="35" align="left" colspan="3">TOTAL</th>					
				<th style="border-style: none;" align="left"><div class="c"><?php echo number_format($sumofPrincipal,0,',',' ');?></div></th>
				<th style="border-style: none;" align="left"><?php echo number_format($sumofInterestPaidTaxIncl,0,',',' ');?></th>
				<th style="border-style: none;" align="left"><?php echo number_format($sumofInterestPaidbeforTax,0,',',' ');?></th>
				<th style="border-style: none;" align="left"><?php echo number_format($sumofVATonInterest,0,',',' ');?></th>
				<th style="border-style: none;" align="left" colspan="3"><?php echo number_format($MonthlyPayments,0,',',' ');?></th>
				
				</tr>
				</tfoot>
			</table>
			<br>	
		
	</body>
	</html>