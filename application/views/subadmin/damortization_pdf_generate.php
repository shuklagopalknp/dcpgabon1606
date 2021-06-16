<html>

<head>

	<title>Amortization Schedule</title>	 

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

    table tr td, th{border:1px #eee; border-style: solid;}	

	</style>
	</head>



	<body bgcolor="#FFFFFF">
		<?php
		//echo "<pre>", print_r($damortizationdata),"</pre>"; 
		//echo "<pre>", print_r($am),"</pre>";exit;

		?>
		<center><h1><strong>Decovert Amortization Schedule</strong></h1></center>
			<table cellspacing="0.1" cellpadding="2" width="100%">
				<thead>
					<tr style="background:#3276b1; color: #ffffff;">
						<th align="left">Designation</th>
						<th align="left">Month1</th>
						<th align="left">Month2</th>
						<th align="left">Month3</th>
					</tr>
					<?php 
					$m1=json_decode($damortizationdata[0]['month1']);
					$m2=json_decode($damortizationdata[0]['month2']);
					$m3=json_decode($damortizationdata[0]['month3']);
					?>
				</thead>
					<tbody>
						<tr>
							<td align="left"><b><font size=2 color="#929292">Net Montly Salary</font></b></td>
							<td align="left"><?php echo number_format($m1[0]->m1nms,0,',',' ')?></td>
							<td align="left"><?php echo number_format($m2[0]->m2nms,0,',',' ');?></td>
							<td align="left"><?php echo number_format($m3[0]->m3nms,0,',',' ');?></td>		
						</tr>
						<tr>
							<td align="left"><b><font size=2 color="#929292">Additional Income (+)</font></b></td>
							<td align="left"><?php echo number_format($m1[0]->m1ai,0,',',' ');?></td>
							<td align="left"><?php echo number_format($m2[0]->m2ai,0,',',' ');?></td>
							<td align="left"><?php echo number_format($m3[0]->m3ai,0,',',' ');?></td>
						</tr>
						<tr>
							<td align="left"><font size=2 color="#929292">Payment Company Loan</font></td>
							<td align="left"><?php echo number_format($m1[0]->m1pcl,0,',',' ');?></td>
							<td align="left"><?php echo number_format($m2[0]->m2pcl,0,',',' ');?></td>
							<td align="left"><?php echo number_format($m3[0]->m3pcl,0,',',' ');?></td>
						</tr>
						<tr>
							<td  height="21" align="left"><font size=2 color="#929292">Advance in Salary</font></td>
							<td align="left"><?php echo number_format($m1[0]->m1ais,0,',',' ');?></td>
							<td align="left"><?php echo number_format($m2[0]->m2ais,0,',',' ');?></td>
							<td align="left"><?php echo number_format($m3[0]->m3ais,0,',',' ');?></td>
						</tr>
						<tr>
							<td colspan="4"></td>
						</tr>
						<tr>
							<td  height="20" align="left"><font size=2 color="#929292">Deduction (&#8722;)</font></td>
							<td align="left"><?php echo number_format($m1[0]->m1deduction,0,',',' ');?></td>
							<td align="left"><?php echo number_format($m2[0]->m2deduction,0,',',' ');?></td>
							<td align="left"><?php echo number_format($m3[0]->m3deduction,0,',',' ');?></td>
						</tr>
						<tr>
							<td  height="20" align="left"><font size=2 color="#929292">BNUS</font></td>
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
							<td colspan="4"></td>
						</tr>

						<tr>
							<td align="left"><font size=2 color="#000000">Total Net Salary</font></td>
							<td align="left"><font color="#000000"><?php echo number_format($m1[0]->m1_total_net_salary,0,',',' ');?></font></td>
							<td align="left"><font color="#000000"><?php echo number_format($m2[0]->m2_total_net_salary,0,',',' ');?></font></td>
							<td  align="left"><font color="#000000"><?php echo number_format($m3[0]->m3_total_net_salary,0,',',' ');?></font></td>
						</tr>
						<tr>
							<td  align="left"><font color="#000000">Average</td>
							<td colspan="6"  align="left"><font color="#000000">CFA <?php echo number_format($damortizationdata[0]['average'],0,',',' ');?></td>
						</tr>
						<tr>
							<td align="left"><font color="#000000">Requested Overdraft</td>
							<td colspan="6"   align="left"><font color="#000000">
								CFA <?php echo number_format($damortizationdata[0]['requested_overdraft'],0,',',' ');?>
							</td>
						</tr>
						<tr>
							<td   align="left"><font color="#000000">MONTANT SOLLICITE PAR LE CLIENT</td>
							<td colspan="6"   align="left"><font color="#000000">CFA 	<?php echo number_format($damortizationdata[0]['requested_overdraft'],0,',',' ') ?: '-';?>
								<?php //echo sprintf("%01.0f",);?>
							</td>
						</tr>
						</tbody>

					

				

			</table>

			<br>	

		

	</body>

	</html>