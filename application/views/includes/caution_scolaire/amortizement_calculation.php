<div class="main-box-body clearfix">				
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