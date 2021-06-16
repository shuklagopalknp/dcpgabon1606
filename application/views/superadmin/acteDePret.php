<?php

$customer=(array) json_decode($appformD['customer_data']);

$databinding=(array) json_decode($appformD['databinding']);



// echo "<pre>";

// print_r($appformD);

// print_r($riskcurrentmonthlyvrefit);



?>
<html>
	<head>
		<style> 
			@page { 
				margin: 0;

			}
			table td span{
				display: block;
				margin-bottom: 3px;
			}
			ul{
				margin: 10px 0;
			}
			ul li{
				color: #222222;
				font-size: 12px;
				margin-top: 3px;
			}
			@media print {
				.pagebreak { page-break-before: always; } /* page-break-after works, as well */
			}
		</style>
	</head>

    <body translate="no" style="background-color: #fff; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.3; color: #444444; margin: 0;">

        <table style="width: 800px; background-color: #fff; margin: 0px auto;border: 1px solid #dddddd;padding-top: 10px; "> 
            <tbody> 
                <tr> 
                    <td>

                        <table style="width: 90%; margin: auto;">

                            <tbody>

                                <tr>

                                    <td style="position: relative; text-align: center;"><img src="<?php echo  base_url(); ?>/assets/logo2.png" style="width: 40px;"></td>

                                    <td style="width: 100%; text-align: center;">

                                        <span style="font-weight: bold; font-size: 17px;color: #000000; border: solid 2px #000; padding: 8px;">Acte De Prêt Joint</span>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </td>

                </tr>



                <tr>

                    <td>

                        <table style="width: 90%; margin: auto;">

                            <tbody>

                                <tr>

                                    <td style="width: 100%; vertical-align: top; padding-right: 10px;">

                                        <table style="width: 100%;">

                                            <tbody>

                                                <tr>

                                                    <td colspan="2" style="font-size: 12px; font-weight: normal;">Nous soussignés &nbsp;: <span style="font-weight: normal;"></span></td>

                                                </tr>


                                                <tr>

                                                    <td colspan="2" style="font-size: 12px; font-weight: normal;">

                                                        <div style="display: flex;">

                                                            <span style="display: block;">Mr/Mme </span>

                                                            <span style="display: block; width: 100%; border-bottom: dashed 1px;"> &nbsp;&nbsp;<?php echo ucfirst($customer['first_name'])." " ?: '-';?><?php echo ucfirst($customer['middle_name'])." " ?: '';?><?php echo ucfirst($customer['last_name']) ?: '-';?></span>

                                                        </div>

                                                    </td>

                                                </tr>



                                                <tr>

                                                    <td colspan="2" style="font-size: 12px; font-weight: normal;">

                                                        <div style="display: flex;">

                                                            <span style="display: block; width: 47px;">Né le</span>

                                                            <span style="display: block; width: 100%; border-bottom: dashed 1px;"> &nbsp;&nbsp;<?php  echo ($customer['dob']) ? (date("d-m-Y", strtotime($customer['dob']))) : ""; ?> </span>

                                                        </div>

                                                    </td>

                                                </tr>



                                                <tr>

                                                    <td colspan="2" style="font-size: 12px; font-weight: normal;">

                                                        <div style="display: flex;">

                                                            <span style="display: block; width: 115px;">Demeurant à </span>

                                                            <span style="display: block; width: 100%; border-bottom: dashed 1px;"><?php echo $customer['resides_address'];?> , <?php echo ucfirst($customer['city_id'])." " ?: '-';?> </span>

                                                        </div>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td colspan="2" style="font-size: 12px; font-weight: normal;">

                                                        <div style="display: flex;">

                                                            <span style="display: block; width: 42px;">Mme/Mr</span>

                                                            <span style="display: block; width: 100%; border-bottom: dashed 1px;"> </span>

                                                        </div>

                                                    </td>

                                                </tr>
                                                <tr>

                                                    <td colspan="2" style="font-size: 12px; font-weight: normal;">

                                                        <div style="display: flex;">

                                                            <span style="display: block; width: 55px;">Née le </span>

                                                            <span style="display: block; width: 100%; border-bottom: dashed 1px;"> </span>

                                                        </div>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td colspan="2" style="font-size: 12px; font-weight: normal;">

                                                        <div style="display: flex;">

                                                            <span style="display: block; width: 115px;">Demeurant à</span>

                                                            <span style="display: block; width: 100%; border-bottom: dashed 1px;"> </span>

                                                        </div>

                                                    </td>

                                                </tr>

                                                <tr>

                                                    <td colspan="2" style="font-size: 12px; font-weight: normal;">

                                                        <div style="display: flex;"> 
                                                            <span style=" width: 100%;">
																Reconnaissent devoir à la BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON la somme de FCFA <span style="border-bottom: dashed 1px; display: inline-block;"> &nbsp;&nbsp;<?php echo number_format($appformD['tpmnt'],0,',',' ');?>&nbsp;&nbsp;</span>
																reçue à titre de prêt et portée au crédit de notre compte n°
																<span style="border-bottom: dashed 1px; display: inline-block;">
																	&nbsp;&nbsp;&nbsp;<?php echo $customer['account_no'];?> &nbsp;&nbsp;&nbsp;
																</span>
																chez son siège de 
																<span style="border-bottom: dashed 1px;display: inline-block;"><?php echo $appformD['branch_name'];?> </span>
																 <span style="text-align: center;display: inline-block;">le</span>
																<span style="border-bottom: dashed 1px;display: inline-block;"><?php echo ($appformD['cdate']) ? (date("d-m-Y", strtotime($appformD['cdate']))) : "";?> </span>

															</span> 
                                                        </div>

                                                    </td>

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

                        <table style="width: 90%; margin: auto; border-collapse: collapse;">

                            <tbody style="">

                                <tr>

                                <td colspan="3" style="font-size: 13px;text-align: left;line-height: 20px;padding: 0px;">

                                        <span style="font-weight: normal;display: block;">

                                            LA BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON ne sera pas tenue à l’égard de quiconque de surveiller l’emploi des fonds. Nous nous engageons à rembourser ce prêt en <b><?php echo $appformD['loan_term']?></b> termes mensuels d’un montant constant de FCFA  <b><?php echo number_format($appformD['pmnt'],0,',',' ')?></b> décompté sur le montant en capital restant dû après chaque échéance, ce programme d’amortissement ne pourra en aucun cas être modifié.

Le premier remboursement aura lieu le  <b><?php

                                       

if((($customer['cat_employeurs']) == "Public Civil 25") || (($customer['cat_employeurs']) == "Prive 25") || (($customer['cat_employeurs']) == "Public Corps 25")){
                                            $loandate= '25';
                                        }else if((($customer['cat_employeurs']) == "Prive 20") || (($customer['cat_employeurs']) == "Autres 20")){
                                            $loandate='20';
                                        }else if((($customer['cat_employeurs']) == "Prive 30") || (($customer['cat_employeurs']) == "Organisation internationales")){
                                            $loandate='30';
                                        }else{
                                            $loandate='30';
                                        }

                                        echo $loandate."-".$databinding[0]->month."-".$databinding[0]->years?> </b> Le dernier le  <b><?php echo $loandate."-".end($databinding)->month."-".end($databinding)->years?></b>

                                        </span>

                                        <span style="font-weight: normal; display: block; height:3px;"></span>

                                        <span style="font-weight: normal; text-align: justify; display: block;">Le règlement de ces termes sera automatiquement effectué par le débit de notre compte sus-indiqué que nous nous engageons à approvisionner à cette fin. Nous donnons à cet effet mandat irrévocable permanent à la BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON.</span>

                                        <span style="font-weight: normal; display: block; height:3px;"></span>

                                        <span style="font-weight: normal; text-align: justify; display: block;">

                                           Par ailleurs, nous nous engageons à supporter les frais, taxes et prélèvements de toute nature, présents ou à venir dont pourrait être frappé le présent contrat, ainsi que les frais et  honoraires des présentes et ceux qui en seront la conséquence.

                                        </span>

                                        <span style="font-weight: normal; display: block; height:3px;"></span>

                                        <span style="font-weight: normal; text-align: justify; display: block;">En cas de non respect de l’une quelconque des clauses du présent acte et notamment en cas de défaut d’un seul des règlements indiqués ci-dessus, la totalité de la créance en principal, intérêt et accessoires deviendra immédiatement et de plein droit exigible, s’il convient à la BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON et celle-ci aurait une entière liberté d’action pour recouvrer ladite créance par toutes voies et en cas d’exigibilité ou d’atermoiement pour quelque cause que ce soit, les sommes devenues exigibles seront productives au taux du présent prêt, lesdits intérêts échus et non payés, se capitaliseront de plein droit à compter du jour où ils seront dus pour une année entière et porteront eux-mêmes intérêts au taux du présent prêt.</span>

                                        <span style="font-weight: normal; display: block; height:3px;"></span>

                                        <span style="font-weight: normal; text-align: justify; display: block;">A peine d’exigibilité anticipée, nous nous engageons à première demande de la BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON, à lui consentir toutes garanties qu’elle jugera souhaitables.    </span>

                                         <span style="font-weight: normal; display: block; height:3px;"></span>

                                        <span style="font-weight: normal; text-align: justify; display: block;">Toutes les obligations résultant des présentes sont stipulées solidaires et indivisibles entre mes héritiers et ayant droit de telle sorte que leur exécution pourra être réclamée pour le tout à n’importe quel moment. </span>

                                     <span style="font-weight: normal; display: block; height:3px;"></span>
                                        <span style="font-weight: normal; text-align: justify; display: block;">En outre, nous certifions, après avoir pris connaissance de l’article 

L113-8 du code des assurances&nbsp;:</span>

                                    <ul style="font-size: 12px; line-height: 15px;">
										 <li> ne pas être actuellement en état d’incapacité temporaire de travail et exercer mon activité professionnelle de façon normale et effective,</li>

										   <li> exercer mon activité professionnelle de façon normale et effective</li> 
											<li> n’être atteint d’aucune infirmité, invalidité, maladie aiguë ou chronique,</li> 
											<li> ne suivre aucun traitement ou régime et ne pas être sous surveillance médicale.</li> 
									</ul> 
                                    </td>

                                    </tr>

                                <tr>

                                    <td colspan="2" style="width: 55%; font-size: 13px; font-weight: normal; line-height: 19px;"></td> 
                                    <td colspan="1" style="width: 45%; font-size: 13px; font-weight: normal; line-height: 19px; text-align: left;">

                                        <span style="display: block; font-size: 13px; font-weight: 400;"> 
                                           Fait à <b>………………………</b> le <b>……………….</b> 
                                        </span>  
                                        <span style="display: block;color: #333333; font-size: 12px; padding: 0; font-weight: 600;"> 
                                            Signature (1) 
                                        </span> 
                                    </td> 
                                </tr> 
                                 <tr> 
                               <td colspan="3" style="font-size: 13px;text-align: center;line-height: 22px;"> 
                                        <span style="font-size: 13px;color: #333333; font-weight: 600;display: block;"> 
                                           (1) La signature doit être précédée de la mention suivante&nbsp;: " LU ET APPROUVE BON POUR <br> FCFA  <b>…………………………………………………………………………………………………………..</b>

                                        </span> 
                                        <span style="font-size: 13px; color: #333333; font-weight: 600;text-align: center;display: block;">(Montant en toutes lettres) en PRINCIPAL PLUS INTERETS, FRAIS ET ACCESSOIRES"</span>
                                    </td>
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