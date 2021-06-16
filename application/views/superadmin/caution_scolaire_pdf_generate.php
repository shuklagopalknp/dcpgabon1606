<html>
<head>
	<title>Amortization Schedule</title>
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
        	border:1px #a2a2a2; border-style: solid;
        	padding: 5px;
        	margin: 0 auto;
        }
          #watermark {
		margin: 0 auto;
		position: absolute;
		top: 20%;
		bottom: 0; 
		color: #000;
		width: 100%;
		left: 380px;
		font-size: 20pt;
		text-align: center;
		opacity: 0.5;
		transform: rotate(147deg);
		transform-origin: 50% 50%;
		z-index: -1000;
		-webkit-transform: rotate(-30deg); 
		-moz-transform: rotate(-30deg);
		 }
	.contener {
	background:url("./assets/img/back.png");
	background-size: cover;
	background-repeat: no-repeat;
	position: absolute;	
	top: 0;
	right: 0;
	bottom: 0;
	left: 0;
	content: "";
	z-index: -2;
	opacity: 0.1;
	}

	</style>
	
	</head>
	<body bgcolor="#ffffff">
		<div class="contener">
		<div id="watermark">
   			 <p>CAUTION SCOLAIRE</p>   
  		</div>
  	</div>
		<center><h1><strong>CAUTION SCOLAIRE TABLEAU AMORTISSMENT</strong></h1></center>			
			<table cellpadding="0" cellspacing="0" class="table table-hover table-bordered">
				<tbody>
				<tr style="background: #3276b1; color: #ffffff;" >
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
					<td align="left"><b><font size=2 color="#333333">&nbsp;</font></b></td>
					<td align="right">
						<font size=2 color="#333333">							
							<?php echo number_format($amortrecord[0]['deposit_amount'],0,',',' ');?>
						</font>
					</td>
					<td align="right">
						<font size=2 color="#333333">							
								<?php echo number_format($amortrecord[0]['study_costs'],0,',',' ');?>
						</font>
					</td>
					<td align="right">
						<font size=2 color="#333333">							
								<?php echo number_format($amortrecord[0]['transfer_fee'],0,',',' ');?>
						</font>
					</td>
				</tr>
				<tr>
					<td align="left"><font size=2 color="#333333">TVA</font></td>
					<td align="right">&nbsp;</td>
					<td align="right">						
						<font size=2 color="#333333">						
							<?php echo number_format($amortrecord[0]['tva_studycosts_calculator'],0,',',' ');?>
						</font>						
					</td>
					<td align="right">
						<font size=2 color="#333333">							
								<?php echo number_format($amortrecord[0]['tva_transferfee_calculator'],0,',',' ');?>
							</font>
					</td>
				</tr>
				<tr>
					<td  height="21" align="left"><font size=2 color="#333333">T1</font></td>
					<td align="right">&nbsp;</td>
					<td align="right">&nbsp;</td>
					<td align="right">
						<font size=2 color="#333333">
						<?php echo number_format($amortrecord[0]['t1_equity_calculator'],0,',',' ');?>
					</font>
					</td>
				</tr>										
				<tr>
					<td  height="20" align="left"><font size=2 color="#333333">DUREE(Mois)</font></td>
					<td align="right">&nbsp;</td>
					<td align="right">&nbsp;</td>
					<td align="right">
						<font size=2 color="#333333">
						<?php echo number_format($amortrecord[0]['loan_interest'],0,',',' ');?>
					</font>
					</td>
				</tr>										
				<tr>
					<td  height="20" align="left"><font size=2 color="#333333">T2</font></td>
					<td align="right">&nbsp;</td>
					<td align="right">
						<font size=2 color="#333333">
						<?php echo number_format($amortrecord[0]['t2_study_costs_calculator'],0,',',' ');?>
					</font>
					</td>
					<td align="right">
						<font size=2 color="#333333">
						<?php echo number_format($amortrecord[0]['t2_transfer_fee_calculator'],0,',',' ');?>
					</font>
					</td>
				</tr>
				<tr>
					<td height="10" align="right" colspan="4"><font size=2 color="#333333"></font></td>
					
				</tr>										
				<tr>
					<td align="left"><font size=3 color="#000000">Net à payer</font></td>
					<td align="right" ><font color="#000000">&nbsp;</font></td>
					<td align="right" >
						<font size=3 color="#000000">
							<i><?php echo number_format($amortrecord[0]['net_pay_amt'],0,',',' ');?></i>
						</font>
					</td>
					<td  align="right"><font color="#000000">&nbsp;</font></td>
				</tr>
				<tr>
					<td  align="left"><font size=3 color="#000000">Net à bloquer</font></td>
					<td align="right" >
						<font size=3 color="#000000">
							<u><i><?php echo number_format($amortrecord[0]['net_block_amt'],0,',',' ');?></i></u>											
						</font>
					</td>
					<td align="right" ><font color="#000000">&nbsp;</font></td>
					<td  align="right"><font color="#000000">&nbsp;</font></td>
				</tr>										
				
			</tbody>
		</table>
	
		<br>
	</body>
</html>