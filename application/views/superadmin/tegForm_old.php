<?php 

$customer=(array) json_decode($appformD['customer_data']);
$databinding=(array) json_decode($appformD['databinding']);
$am=new Class_Amort();
$age= date_diff(date_create($customer['dob']), date_create('today'))->y;
// echo $age;
$loan_interest =$appformD['loan_interest'];
									$vat_on_interest=$appformD['loan_tax'] ?: '19.25'; 
									$rt=($loan_interest*(1+$vat_on_interest/100));
								

			    $teg=$am->tegcal2($appformD['npmts'],$appformD['loan_amt'],$appformD['pmnt'],$rt,$appformD['frais_de_dossier'],$age,$ht1= 6685);
			    
// 			    print_r($teg);
// print_r($databinding[0]->principal_payment);

?>





<!DOCTYPE html>

	<html>

	<head>

	<meta charset="UTF-8"/>

	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

	





<style>

	

	.form_top h2{

		padding: 0px;

		color: #000;

	}

	.form_top .p-0{

		padding: 0px;

	}

		.form_top .container{

			width: auto;

			padding: 15px;

		}

		.form_top{

			background-color: #fff;

		}

		.form_top p{

			color: #000;

			

		}

	/*	.form-text p{

			font-weight: bold;

		}*/

		.form_tabel th {

    background-color: #ccc;

    color: #000;

    

}

.form_tabel tr{

	color: #000;

}

.form_btm{

	display: flex;

	justify-content: space-between;

	margin-top: 10px;

}
.form_top{
  width: 800px;
   background-color: #fff;
    margin: 50px auto; 
    padding: 20px;
}

</style>



</head>





<body style="background-color: #e2e1e0; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;">







<div class="form_top">

	<div class="container">

		<div class="row">



			<div class="col-lg-12">
			
                <h2><img src="<?php echo  base_url(); ?>/assets/logo2.png" style="width: 40px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Taux Annuel Effectif Global - TAEG</h2>
				
				<h3> ENTRE LES SOUSSIGNES </h3>

				<p><span style="font-weight:bold; border-bottom:solid 1px #000">La BANQUE INTERNATIONALE POUR LE COMMERCE ET L???INDUSTRIE du GABON</span>, Soci??t?? Anonyme, inscrite au Registre du Commerce de Libreville, sous le N?? 2002 B 01732, NIF 790027 A, dont le Si??ge Social est situ?? ?? Libreville, 714 Avenue du Colonel Parant </p>

				<div class="form-text">

				<p><b>Ci-apr??s d??nomm??e ?? <span style="font-weight:bold; border-bottom:solid 1px #000">LA BANQUE</span> ??                                                <span style="font-weight:bold; border-bottom:solid 1px #000">D???une part,</span>  </b></p>

				<p><b>MONSIEUR, MADAME </b> <?php echo ucfirst($customer['first_name'])." " ?: '-';?><?php echo ucfirst($customer['last_name']) ?: '-';?> <b> De nationalit?? </b> <?php echo ucfirst($customer['nationality'])." " ?: '-';?></p>

				<p><b>N??(e) ?? <?php echo $customer['birthplace'];?> </b> <b> le </b><?php echo date("d-m-Y",strtotime($customer['dob']));?><b> Titulaire de la/du </b><?php echo ucfirst($customer['type_id'])." " ?: '-';?></p>

				<p><b>Num??ro </b><?php echo ucfirst($customer['id_number'])." " ?: '-';?> <b> du  </b><?php echo date("d-m-Y",strtotime($customer['dateId']))." " ?: '-';?></p>

				<p><b> Profession </b><?php echo ucfirst($customer['employeeOccupation'])." " ?: '-';?><b> Demeurant ?? </b><?php echo ucfirst($customer['resides_address'])." " ?: '-';?> , <?php echo ucfirst($customer['city_id'])." " ?: '-';?></p>

				<p><b> BP </b><?php echo ucfirst($customer['street'])." " ?: '-';?> </p>

				<p><b>Ci-apr??s d??nomm?? ?? <span style="font-weight:bold; border-bottom:solid 1px #000">L???EMPRUNTEUR</span> ??                                        D???autre part</b> </p>

				<p><b><span style="font-weight:bold; border-bottom:solid 1px #000">L???emprunteur sollicite aupr??s de la BICIG un pr??t dont les caract??ristiques sont les suivantes :</span></b>  </p>

			</div>

<div class="col-lg-12 p-0">



				<table class="table table-bordered form_tabel">

    <thead>

      <tr>

        <th>LIBELLE</th>

        <th>Valeur</th>

        <th>TEG</th>

      </tr>

    </thead>

    <tbody>

      <tr>

        <td>Taux nominal fixe</td>

        <td><?php echo ucfirst($appformD['loan_interest'])." " ?: '-';?> </td>

        

        

      </tr>

      <tr>

     <td>Montant du Cr??dit</td>

        <td><?php echo ucfirst($appformD['loan_amt'])." " ?: '-';?></td>

       

      </tr>

      <tr>

        <td>P??riodicit??</td>

        <td> MOIS<?php //echo ucfirst($appformD['loan_schedule'])." " ?: '-';?></td>

        

      </tr>

      <tr>

      	<td>Nombre de remboursements </td>

      	<td><?php echo ucfirst($appformD['loan_term'])." " ?: '-';?></td>
      	<td><strong><?php echo round($teg['tegvalue'],2)?></strong></td>

      </tr>

      <tr>

      	<td>Frais de Dossier HT </td>

      	<td><?php echo ucfirst($appformD['frais_de_dossier'])." " ?: '-';?> </td>



</tr>    

<tr>

	<td>Assurances-D??c??s-Invalidit??

(Sous r??serve de surprime)

 </td>

 <td><?php
  $age= date_diff(date_create($customer['dob']), date_create('today'))->y;
  // echo $age;
if($age<=30){
                      $insuranceRate="0.42";
                    }else if($age<=40){
                      $insuranceRate="0.75";
                    }else if($age<=50){
                      $insuranceRate="0.92";
                    }else if($age<=60){
                      $insuranceRate="2.06";
                    }else{
                      $insuranceRate="Age is above 60";
                    }

                     $insuranceAmount=($appformD['loan_amt']*$insuranceRate)/100;
                     echo round($insuranceAmount)
 ?></td>

</tr>

<tr>

<td>

Amortissement HT 

</td>

<td><?php echo round($databinding[0]->principal_payment);?></td>

 </tr>

 <tr> 

 	<td>Frais d???enregistrement HT </td>

 	<td> 6 685</td>

 </tr>



</tbody>

  </table>



			</div>

			<div class="col-lg-12 p-0">

				<div class="form-text">
</br></br>
			<p class="form_btm"><b><span style="font-weight:bold; border-bottom:solid 1px #000">L???EMPRUNTEUR</span></b>                                                                                                                           <span><b><span style="font-weight:bold; border-bottom:solid 1px #000">LA BANQUE</span></b></span></p>

		</div>

		</div>



		<p><small>Signature pr??c??d??e de la mention ?? Je confirme avoir ??t?? inform?? du TEG correspondant au pr??t sollicit?? ce jour ??</small> </p>
<br>
<br>
 


		<div class="form-text_btm">

			<p><b>Taux nominal fixe</b> d??signe le taux d???int??r??t fixe exprim?? sur une base annuelle

<b><span style="font-weight:bold; border-bottom:solid 1px #000">Le Taux Effectif Global</span></b> est calcul?? sur une base annuelle, ce taux inclut, outre les int??r??ts, les frais,

Commissions ou r??mun??rations de toute nature, directs ou indirects y compris ceux destin??s ?? des 

Interm??diaires intervenus dans l???octroi du pr??t.

 </p>



		</div>

		</div>







		</div>





	</div>









</div>







<!-- 





































 <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.js"></script> 









  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/demo-skin-changer.js"></script> 

 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/bootstrap.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.nanoscroller.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/scripts.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/demo.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.validate.min.js"></script>







  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.scrollTo.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.slimscroll.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/moment.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery-jvectormap-1.2.2.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery-jvectormap-world-merc-en.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/gdp-data.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/flot/jquery.flot.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/flot/jquery.flot.resize.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/flot/jquery.flot.time.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/flot/jquery.flot.threshold.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/flot/jquery.flot.axislabels.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.sparkline.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/skycons.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/raphael-min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/morris.js"></script>  







  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/pace.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/bootstrap-wizard.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/select2.min.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.dataTables.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/dataTables.fixedHeader.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/dataTables.tableTools.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.dataTables.bootstrap.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.maskedinput.min.js"></script>

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/bootstrap-datepicker.js"></script>

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/moment.min.js"></script>

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/daterangepicker.js"></script>

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery-ui.min.js"></script>

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/jquery.timepicker.js"></script>





   

   <script src="assets/js/upload.js"></script> --> 



  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/modernizr.custom.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/notificationFx.js"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/classie.js"></script> 

  <!-- <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/collateral.custom.js"></script>  -->

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/js/timeline.js"></script>







  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/intl-tel-input-master/build/js/intlTelInput.js?1585994360633"></script> 

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/intl-tel-input-master/examples/js/isValidNumber.js.ejs?1585994360633"></script>

  <script src="http://www.myprojectdemonstration.com/development1/dcp_gabon/assets/intl-tel-input-master/examples/js/displayNumber.js.ejs?1585994360633"></script> 

	</body>

</html>







