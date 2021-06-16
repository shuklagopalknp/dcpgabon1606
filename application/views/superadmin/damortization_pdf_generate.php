<?php 
//echo "<pre>", print_r($damortizationdata, 1), "</pre>"; ?>
<html>
<head>
	<title>SIMULATION DECOUVERT</title>
	<style>
		@page {
                margin: 0cm 0cm;
            }
        body {
            margin-top: 0.5cm;
            margin-left: 0.5cm;
            margin-right: 0.5cm;
            margin-bottom: 1cm;
            }
          	header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 3cm;
        }
      
        footer {
            position: fixed;
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 2cm;
        }
        table tr td, th{
        	border:1px #eee; border-style: solid;
        }
	</style>
	</head>
	<body bgcolor="#FFFFFF">		
		<center><h1><strong>DECOUVERT AMORTISSMENT SCHEDULE</strong></h1></center>
			<?php 
			//echo "<pre>", print_r($damortizationdata), "</pre>"; //exit;
				$m1=json_decode($damortizationdata[0]['month1']);
				$m2=json_decode($damortizationdata[0]['month2']);
				$m3=json_decode($damortizationdata[0]['month3']);
			?>
			<table cellspacing="0.1" cellpadding="2" width="100%">
				<thead>
					<tr style="background:#3276b1; color: #ffffff;">
						<th align="left">DESIGNATION</th>
						<th align="left">MOIS 1</th>
						<th align="left">MOIS 2</th>
						<th align="left">MOIS 3</th>
					</tr>					
				</thead>
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
						<td  height="21" align="left">
							<font size=2 color="#929292">AVANCE SUR SALAIRE</font>
						</td>
						<td align="left"><?php echo number_format($m1[0]->m1ais,0,',',' ');?></td>
						<td align="left"><?php echo number_format($m2[0]->m2ais,0,',',' ');?></td>
						<td align="left"><?php echo number_format($m3[0]->m3ais,0,',',' ');?></td>
					</tr>
					<tr><td height="2" colspan="4"></td></tr>
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
					<tr><td height="2" colspan="4"></td></tr>
					<tr>
						<td align="left"><font size=2 color="#000000">TOTAL SALAIRE NET</font></td>
						<td align="left"><font color="#000000"><?php echo number_format($m1[0]->m1_total_net_salary,0,',',' ');?></font></td>
						<td align="left"><font color="#000000"><?php echo number_format($m2[0]->m2_total_net_salary,0,',',' ');?></font></td>
						<td  align="left"><font color="#000000"><?php echo number_format($m3[0]->m3_total_net_salary,0,',',' ');?></font></td>
					</tr>
					<tr>
						<td  align="left"><font color="#000000">SALAIRE MOYEN</td>
						<td colspan="4"  align="left"><font color="#000000">F CFA <?php echo number_format($damortizationdata[0]['average'],0,',',' ');?></td>
					</tr>						
					<tr>
						<td   align="left"><font color="#000000">MONTANT DECOUVERT A ACCORDER</td>
						<td colspan="4" align="left"><font color="#000000">F CFA <?php echo number_format($damortizationdata[0]['requested_overdraft'],0,',',' ') ?: '-';?>
							<?php //echo sprintf("%01.0f",);?>
						</td>
					</tr>
					<tr>
						<td   align="left"><font color="#000000">MONTANT SOLLICITE PAR LE CLIENT</td>
						<td colspan="4" align="left"><font color="#000000">F CFA <?php echo number_format($damortizationdata[0]['amount_sought_customer'],0,',',' ') ?: '-';?>
							<?php //echo sprintf("%01.0f",);?>
						</td>
					</tr>
				</tbody>
			</table>
		<br>
	</body>
</html>