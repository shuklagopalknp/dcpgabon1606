<div id="content-wrapper">
	<div class="row">
		<div class="col-lg-12">
			<?php //echo "<pre>", print_r($amortrecord), "</pre>";?>
			<?php 
				$m1=json_decode($amortrecord[0]['month1']);
				$m2=json_decode($amortrecord[0]['month2']);
				$m3=json_decode($amortrecord[0]['month3']);
			?>
			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<li><a href="<?php echo base_url('Decovert_Loans/customer_details/'.$this->uri->segment(3));?>">DÉTAILS DU CLIENT</a></li>
						<li class="active"><span>SIMULATION DECOUVERT</span></li>
					</ol>
				</div>
			</div>
			<div class="main-box-body clearfix">
				<div class="row">
				<div class="col-lg-3 pull-right">
					<a href="<?php echo base_url('Decovert_Loans/Decovert_amortization_download_pdf/').$this->uri->segment(3);?>" class="btn btn-primary" align='middle'> <i class="fa fa-cloud-download"></i> TELECHARGER EN PDF</a>
				</div>
			</div>
				<div class="row" style="margin-top:10px;">
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<div class="main-box-body clearfix">
								<div class="table-responsive">
									<table id="" class="table table-hover">
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
											<td height="21" align="left"><font size=2 color="#929292">AVANCE SUR SALAIRE</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1ais,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2ais,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3ais,0,',',' ');?></td>
										</tr>
										<tr><td height="2" colspan="4"></td></tr>
										<tr>
											<td height="20" align="left"><font size=2 color="#929292">DEDUCTION (&#8722;)</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1deduction,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2deduction,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3deduction,0,',',' ');?></td>
										</tr>
										<tr>
											<td height="20" align="left"><font size=2 color="#929292">BONUS</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1bonus,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2bonus,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3bonus,0,',',' ');?></td>
										</tr>
										<tr>
											<td height="20" align="left"><font size=2 color="#929292">PRIMES</font></td>
											<td align="left"><?php echo number_format($m1[0]->m1primes,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m2[0]->m2primes,0,',',' ');?></td>
											<td align="left"><?php echo number_format($m3[0]->m3primes,0,',',' ');?></td>
										</tr>
										<tr>
											<td height="20" align="left"><font size=2 color="#929292">GRATIFICATION 13ième mois</font></td>
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
											<td align="left"><font color="#000000"><?php echo number_format($m3[0]->m3_total_net_salary,0,',',' ');?></font></td>
										</tr>
										<tr>

											<td align="left"><font color="#000000">SALAIRE MOYEN</td>
											<td colspan="4"  align="left"><font color="#000000">CFA <?php echo number_format($amortrecord[0]['average'],0,',',' ');?></td>
										</tr>
										<tr>
											<td align="left"><font color="#000000">MONTANT DECOUVERT A ACCORDER</td>
											<td colspan="4"   align="left"><font color="#000000">CFA <?php echo number_format($amortrecord[0]['requested_overdraft'],0,',',' ');?></td>
										</tr>
										<tr>
											<td align="left"><font color="#000000">MONTANT SOLLICITE PAR LE CLIENT</td>
											<td colspan="6"   align="left"><font color="#000000">CFA 	<?php echo number_format($amortrecord[0]['amount_sought_customer'],0,',',' ') ?: '-';?>
												<?php //echo sprintf("%01.0f",);?>
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

<script type="text/javascript">

	

</script>

</body>

</html>