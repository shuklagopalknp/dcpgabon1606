 <style>
    @page {
    margin: 0;
}
    </style>
<div id="content-wrapper">

	<div class="row">

		<div class="col-lg-12">
			<?php 

			//echo "<pre>", 

			//print_r($testamortrecord[0]), 

			////print_r(json_decode($testamortrecord[0]['databinding'])),

			//"</pre>";		

			?>

			<div id="content-header" class="clearfix">

				<div class="pull-left">
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
						<?php 
						if($type==2){?>
							<li><a href="<?php echo base_url('PP_CONGES_A_LA_CARTE');?>"> PP CONGES A LA CARTE</a></li>
						<?php }else if($type ==1){?>
						<li><a href="<?php echo base_url('PP_FETES_A_LA_CARTE');?>">PP FETES A LA CARTE</a></li>
						<?php } else if($type == 3){?>
							<li><a href="<?php echo base_url('PP_CREDIT_CONFORT');?>">PP CREDIT CONFORT</a></li> 
						<?php }?>
						<li class="active"><span>TABLEAU AMORTISSMENT</span></li>
					</ol>

				</div>

			</div>

			<div class="main-box-body clearfix">
				<div class="row">
				<div class="col-lg-6 pull-right">
					<?php
					
					 if($type==2 && $view=='0'){?>
					<a href="<?php echo base_url('PP_CONGES_A_LA_CARTE/select/').$this->uri->segment(3)."/".$department;?>" class="btn btn-default"  align='middle'> Sélectionner Un Client</a>
					<?php }else if($type==1 && $view=='0'){?>
					<a href="<?php echo base_url('PP_FETES_A_LA_CARTE/select/').$this->uri->segment(3);?>" class="btn btn-default"  align='middle'> Sélectionner Un Client</a>
					<?php 
					}else if($type==3 && $view=='0'){?>
					<a href="<?php echo base_url('PP_CREDIT_CONFORT/select/').$this->uri->segment(3);?>" class="btn btn-default"  align='middle'> Sélectionner Un Client</a>
					<?php } ?>
					<a href="<?php echo base_url('PP_Consumer_Loans/download_temp_amortizationpdf/').$this->uri->segment(3);?>" class="btn btn-primary" align='middle'> <i class="fa fa-cloud-download"></i> Telecharger En PDF</a>									

				</div>

			</div>




 
				<div class="row" style="margin-top:10px;">
					<div class="col-lg-12">
						<div class="main-box clearfix">
							<div class="main-box-body clearfix">
								<div class="table-responsive">
									<?php 	
									//echo "<pre>", print_r($amortrecord),"</pre>";
									if($amortrecord[0]['loan_schedule']=='Monthly'){
										$year=($amortrecord[0]['loan_term']/12);
									}else if($amortrecord[0]['loan_schedule']=='Yearly'){
										$year=$amortrecord[0]['loan_term'];
									}
									else if($amortrecord[0]['loan_schedule']=='Yearly'){
										$year=$amortrecord[0]['loan_term'];
									} else {
										$year = $amortrecord[0]['loan_term'];
									}
									$loan_interest =$amortrecord[0]['loan_interest'];
									$vat_on_interest=$amortrecord[0]['loan_tax'] ?: '19.25'; 
									$rt=($loan_interest*(1+$vat_on_interest/100));
								// 	echo $rt;

									$curd=date("Y-m-d", strtotime($amortrecord[0]['created']));

									$amount=$amortrecord[0]['loan_amt'];

									$rate=$rt;

									$years=$year;								

									

								    $fraisDosier=$loan_details['frais_de_dossier'];
								    $frais_de_assurance=$loan_details['frais_de_assurance'];
									$age= date_diff(date_create($customer->dob), date_create('today'))->y;
									$loan_amt=$loan_details['loan_amt'];

									$am=new Class_Amort();

									$am->amort($amount,$rate,$years,$curd,$loan_interest,$tax_interest,$css_value,$fraisDosier,$age,$loan_amt);
                                    // echo "<pre>", print_r($frais_de_assurance),"</pre>";
									$am->showForm($frais_de_assurance);
									//echo "<pre>", print_r($am), "</pre>";
									if($amount*$rate*$years <>0){

										$am->showTable(true); 

									}

									?>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

	<!-- <footer id="footer-bar" class="row">

		<p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>

	</footer> -->



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

 

<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

 

<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script>

<script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script>

<script type="text/javascript">

	$(document).ready(function() {

		var table = $('#table-example').dataTable({

			'info': false,

			'sDom': 'lTfr<"clearfix">tip',
			
			"oLanguage": {
			  "sSearch": "<span>Chercher:</span> _INPUT_", //search
			  "sLengthMenu": "Montrer _MENU_ Entrées",
			},

			'oTableTools': {

	            'Buttons': [

	                {

	                    'sExtends':    'collection',

	                    'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',

	                    'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]

	                }

	            ]

	        }

		});	

	

	});





</script>

</body>

</html>