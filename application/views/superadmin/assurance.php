<?php 

$customer=(array) json_decode($appformD['customer_data']);

$databinding=(array) json_decode($appformD['databinding']);

// echo "<pre>";

// print_r($appformD);

// echo "</pre>";

// print_r($riskcurrentmonthlyvrefit);



 $age= date_diff(date_create($customer["dob"]), date_create('today'))->y;

                    //   echo $age;

                 if($age<=30){

                      $insuranceRate="0.42";

                    }else if($age<=40){

                      $insuranceRate="0.75";

                    }else if($age<=50){

                      $insuranceRate="0.92";

                    }else if($age<=60){

                      $insuranceRate="2.06";

                    }



                    $insuranceAmount=($appformD['loan_amt']*$insuranceRate)/100;



?>
<html>
	<head> 
		<style> 
			@page {

				margin: 0;

			} 
			@media print {
				.pagebreak { page-break-before: always; } /* page-break-after works, as well */
			}
		</style> 
	</head> 
    <body translate="no" style="background-color: #fff; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0; padding-top:20px;">
        <table style="width: 800px; background-color: #fff; margin: 0px auto;  ">
            <tbody>
                <tr>
                    <td>
                        <table style="width: 90%; margin: auto;">
                            <tbody>
                                <tr>
                                    <td style="position: relative; text-align: center;"><img src="<?php echo  base_url(); ?>/assets/logo.jpg" style="width: 80px;"></td>
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
                                    <td style="width: 100%; text-align: center;">
                                        <span style="font-weight: bold; font-size: 15px;">BULLETIN INDIVIDUEL D'ADHESION N??</span>
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
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: 13px; font-weight: bold; width: 26%;">L'ORGANISME PRETEUR :</td>
                                                    <td style="font-size: 13px; font-weight: bold; border-bottom: dotted 1px #000;"><span style="font-weight: normal;">BICIG <?php echo $customer['account_no'];//number_format($customer['account_no'],0,'',' ')." " ?: '';?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
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

                            <tbody>

                                

                                <tr>

                                    <td style="font-size: 13px;width: 100%;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;border-collapse: separate;border: solid 2px #000;border-bottom: none;">

                                        <span style="font-weight: bold;">Renseignements relatifs ?? la personne ?? assurer</span>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                        <table style="width: 90%; margin: auto; border-collapse: collapse;border: solid 2px #000;">

                            <tbody style="

">

                                <tr>

                                    <td style="font-size: 13px;width: 50%; padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 30%;">NOM(S) : : </span>

                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> <?php echo ucfirst($customer['middle_name'])." " ?: '';?><?php echo ucfirst($customer['last_name']) ?: '-';?> </span>

                                        </div>

                                    </td>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-spacing: 0;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 40%;">Profession exerc??e: </span>

                                            <span style="display: block; width: 60%; border-bottom: solid 1px;"> <?php echo $customer['employeeOccupation'];?> </span>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 30%;">Pr??noms : </span>

                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"><?php echo ucfirst($customer['first_name'])." " ?: '-';?> </span>

                                        </div>

                                    </td>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-spacing: 0;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 40%;">Adresse : </span>

                                            <span style="display: block; width: 60%; border-bottom: solid 1px;"><?php echo ucfirst($customer['resides_address'])." " ?: '-';?>, <?php echo ucfirst($customer['city_id'])." " ?: '-';?> </span>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;padding-bottom: 10px;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 30%;">naissance : </span>

                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"><?php echo date("d-m-Y",strtotime($customer['dob']));?> </span>

                                        </div>

                                    </td>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                   

                    </td>

                </tr>

              



                <tr>

                    <td>

                        <table style="width: 90%; margin: auto; border-collapse: collapse;">

                            <tbody>

                                

                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;border-collapse: separate;padding-bottom: 0;">

                                        <span style="font-weight: bold;">Caract??ristiques du pr??t :</span>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </td>

                </tr>

                <tr>

                    <td>

                        <table style="width: 90%; margin: auto; border-collapse: collapse;border: solid 2px;">

                            <tbody>

                                <tr>

                                    <td style="font-size: 13px;width: 100%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 17%;">Date D'octroi : </span>

                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"><?php echo date("d-m-Y",strtotime($appformD['cdate'])) ;?> </span>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 100%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 17%;">Capital Garanti : </span>

                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"><?php echo number_format($appformD['loan_amt'],0,',',' ');?> </span>

                                        </div>

                                    </td>

                                </tr>



                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 17%;">Coefficient : </span>

                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> <?php echo number_format($insuranceRate,2);?> </span>

                                          

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 17%;">Periodicite : </span>

                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> Mois </span>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 5px 5px 10px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 17%;">Prime :</span>

                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"><?php echo number_format($insuranceAmount,0,',',' ');?> </span>

                                        </div>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                            <table style="width: 90%; margin: auto; border-collapse: collapse;">

                            <tbody style="">

                                <tr>

                                    <td style="font-size: 13px;width: 25%;border: solid 2px #000;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Nombre de termes de remboursement</span>

                                    </td>

                                    <td style="font-size: 13px;width: 25%;border: solid 2px #000;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal;">Montant de chaque terme</span>

                                    </td>

                                    <td style="font-size: 13px;width: 25%;border: solid 2px #000;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;">Date de la premi??re ??ch??ance</span>

                                    </td>

                                    <td style="font-size: 13px;width: 25%;border: solid 2px #000;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;">Date de la derni??re ??ch??ance</span>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 25%;border: solid 2px #000;padding: 10px;text-align: center; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;"><?php echo number_format($appformD['loan_term'],0,',',' ');?></span>

                                    </td>

                                    <td style="font-size: 13px;width: 25%;border: solid 2px #000;padding: 10px;text-align: center; line-height: 16px;border-spacing: 0;"><span style="font-weight: normal;">
                                        <?php echo number_format($appformD['pmnt'],0,',',' ');?>

                                    </span></td>

                                    <td style="font-size: 13px;width: 25%;border: solid 2px #000;padding: 10px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;"><?php

                                       

                                         if((($customer['cat_employeurs']) == "Public Civil 25") || (($customer['cat_employeurs']) == "Prive 25") || (($customer['cat_employeurs']) == "Public Corps 25")){
                                            $loandate= '25';
                                        }else if((($customer['cat_employeurs']) == "Prive 20") || (($customer['cat_employeurs']) == "Autres 20")){
                                            $loandate='20';
                                        }else if((($customer['cat_employeurs']) == "Prive 30") || (($customer['cat_employeurs']) == "Organisation internationales")){
                                            $loandate='30';
                                        }else{
                                            $loandate='30';
                                        }

                                        echo $loandate."-".$databinding[0]->month."-".$databinding[0]->years?></span>

                                    </td>

                                    <td style="font-size: 13px;width: 25%;border: solid 2px #000;padding: 10px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;"><?php echo $loandate."-".end($databinding)->month."-".end($databinding)->years?> </span>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                   

                    </td>

                </tr>



               

                <tr>

                    <td>

                        <table style="width: 90%; margin: auto; border-collapse: collapse;">

                            <tbody>

                                

                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: bold;">Questionnaire simplifi?? :</span>

                                    </td>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-spacing: 0;"><span style="font-weight: bold;">R??pondre par oui ou non aux questions</span></td>

                                </tr>

                            </tbody>

                        </table>

                    </td>

                </tr>

                <tr>

                    <td>

                        <table style="width: 90%; margin: auto; border-collapse: collapse;border: solid 2px;">

                            <tbody>

                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 5px 5px 5px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;align-items: center;">

                                            <span style="display: block; width: 17%;">1. Taille : </span>

                                             <span><input type="text" style="display: block;width: 70px;border: solid 1px;margin-left: 10px;height: 26px;"> </span>

                                        </div>

                                    </td>

                                    <td style="font-size: 13px;width: 50%;padding: 5px 5px 5px 5px;text-align: left; line-height: 16px;border-spacing: 0;">
 
                                        <div style="display: flex;align-items: center;">

                                            <span style="display: block; width: 17%;">Poids : </span>

                                            <span><input type="text" style="display: block;width: 70px;border: solid 1px;margin-left: 10px;height: 26px;"> </span>

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;">

                                            <span style="display: block;width: 80%;">2. Etes-vous actuellement en ??tat d'incapacit?? de travail ou d'incapacit?? totale ou partielle ? </span>

                                           <span><input type="text" style="display: block;width: 70px;border: solid 1px;margin-left: 10px;height: 26px;"> </span>

                                        </div>

                                    </td>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-spacing: 0;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 100%;">Si vous avez r??pondu oui, indiquez la date_____________

la dur??e ______________et les causes de l'arr??t de travail ou de l'invalidit??_______________________________</span>

                                             

                                        </div>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <div style="display: flex;">

                                            <span style="display: block;width: 80%;">3. Souffrez-vous ou avez-vous souffert au cours des deux derni??res ann??es de maladies ou d'accident ayant en- tra??n?? des arr??ts de travail de plus de 15 jours et/ou un traitement m??dical ? </span>

                                            <span><input type="text" style="display: block;width: 70px;border: solid 1px;margin-left: 10px;height: 26px;"> </span>

                                        </div>

                                    </td>

                                    <td style="font-size: 13px;width: 50%;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-spacing: 0;">

                                        <div style="display: flex;">

                                            <span style="display: block; width: 100%;">Si vous avez r??pondu oui, indiquez la date _______________ la nature ____________ et la dur??e de l'arr??t de travail __________________ ainsi que la dur??e du traitement m??dical _________________________________</span>

                                             

                                        </div>

                                    </td>

                                </tr>

                                 

                            </tbody>

                        </table>

                    </td>

                </tr>

                <tr>

                    <td>

                        <table style="width: 90%; margin: auto; border-collapse: collapse;">

                            <tbody>

                                

                                <tr>

                                    <td style="font-size: 13px;padding: 0;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">

                                            Je d??clare accepter d'??tre assur?? pour ce pr??t en CAS DE D??C??S ou INVALIDIT?? TOTALE ET D??FINITIVE, suivant les modalit??s de la Convention d'Assurances Collectives ?? laquelle a adh??r?? l'organisme

                                            pr??teur qui sera b??n??ficiaire des sommes assur??es en cas de d??c??s.

                                        </span>

                                        <span style="font-weight: normal; display: block; height: 5px;"></span>

                                        <span style="font-weight: normal;">

                                            Le Proposant certifie que les d??clarations ci-dessus devant servir de base ?? l'assurance sont exactes, compl??tes et sin?? c??res. Toute r??ticence ou fausse d??claration entra??nerait la nullit?? du

                                            contrat conform??ment aux articles 18 et 19 du Code CIMA.

                                        </span>

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

                                    <td style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; border-top: solid 2px; padding-top: 20px; border-right: solid 2px; padding-bottom: 20px;">

                                        <span style="display: block; font-size: 13px; font-weight: bold;">RESERVE A LA SOCIETE</span><span style="display: block; font-size: 13px;">acceptation des risques</span>

                                    </td>

                                    <td style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; text-align: center;">

                                        <table style="width: 100%;">

                                            <tbody>

                                                <tr>

                                                    <td style="font-size: 13px; width: 50%; padding: 10px; text-align: left;  line-height: 16px; border-collapse: separate;">

                                                        <div style="display: flex;">

                                                            <span style="display: block; width: 17%;">A : </span>

                                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> <?php echo $appformD['branch_name']?></span>

                                                        </div>

                                                    </td>

                                                    <td style="font-size: 13px; width: 50%; padding: 10px; text-align: left;  line-height: 16px; border-collapse: separate;">

                                                        <div style="display: flex;">

                                                            <span style="display: block; width: 17%;">le : </span>

                                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"><?php echo date('d-m-Y')?> </span>

                                                        </div>

                                                    </td>

                                                </tr>

                                            </tbody>

                                        </table>

                                        <span style="display: block; font-size: 13px; padding: 0; font-weight: 400;">

                                            Faire pr??c??der la signature de la mention "Lu et Approuv??"

                                        </span>

                                        <span style="display: block; font-size: 13px; font-weight: 600;">

                                            Signature de l???Emprunteur

                                        </span>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </td>

                </tr>

                <tr> 
                    <td> 
                        <table style="width: 90%; margin: auto; border-collapse: collapse;"> 
                            <tbody> 
                                <tr> 
                                    <td style="font-size: 13px; padding: 10px; text-align: center;  line-height: 16px; border-collapse: separate;"> 
                                        <span style="display: block; font-size: 13px; font-weight: 1000;">SUNU Assurances Vie Gabon </span> 
                                        <span style="font-weight: normal;">

                                            Entreprise r??gie par le Code des assurances - Soci??t?? Anonyme au capital de 2.000.000 .000 F.CFA enti??rement lib??r?? RCCM : Libreville N?? 2003 B 2977 - N?? Statistique : 079575 Z - N?? NIF 795 575/P

                                            Av. du Colonel Parant - BP 2137 Libreville - Gabon T??l. : (+241) 01 74 34 34 - Fax : (+241) 01 72 48 57 - E-mail : gabon.sunuvie@sunu-group.com - Site Web : www.sunu-group.com
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                </tbody>
        </table>
		<div class="pagebreak"> </div> 
        <table style="width: 800px; background-color: #fff; margin: 100px auto; height:1000px; ">
            <tbody>
                <tr>
                    <td>
                        <table style="width: 90%; margin: auto; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="font-size: 13px; padding: 10px; text-align: left;  line-height: 16px; border-collapse: separate;">
                                        <span style="font-size: 18px; font-weight: bold; display: block; text-align: center;">
                                            FORMALITES A REMPLIR EN CAS DE DECES <br>
                                            OU INVALIDITE TOTALE ET DEFINITIVE
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 40px;"></span>
                                        <span style="font-weight: normal; text-align: left;">
                                            Transmettre a la societe d Assurances par I'intermediaire de I'Organisme Preteur dans les quinze jours de la survenance du deces les pieces justificatives suivants:
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 20px;"></span>

                                        <span style="font-weight: normal;">- Un extrait d'acte de deces,</span>

                                        <span style="font-weight: normal; display: block;"></span>

                                        <span style="font-weight: normal;">- un certificat medical precisant les causes du deces</span>
                                    </td>
                                </tr>
								<tr>
									<td style="height:30px"></td>
								</tr>
								<tr>
									<td>
										<table style="width: 90%; margin: auto;">
											<tbody>
												<tr>
													<td style="position: relative; text-align: center;"><img src="<?php echo  base_url(); ?>/assets/star.jpg" style="width: 250px;"></td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td style="height:30px"></td>
								</tr>
								<tr>
									<td style="font-size: 13px; padding: 10px; text-align: left;  line-height: 16px; border-collapse: separate;">

										<span style="font-size: 18px; font-weight: bold; display: block; text-align: center;"> 
											NOTE IMPORTANTE 
										</span> 
										<span style="font-size: 18px; font-weight: bold; display: block; text-align: center; height:20px;"></span>
										<img src="<?php echo  base_url(); ?>assets/last.jpg" style="width: 100%;">
									</td>
								</tr>
						</tbody>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
	<div class="pagebreak"> </div>
   <table style="width: 800px;background-color: #fff;margin: 0px auto; padding-top: 80px;">
            <tbody>
                <tr>
                    <td>
                        <table style="width: 90%; margin: auto;">
                            <tbody>
                                <tr>
                                    <td style="position: relative; text-align: center;"><img src="<?php echo  base_url(); ?>/assets/logo.jpg" style="width: 150px;"></td>
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
                                    <td style="width: 100%; text-align: center;">
                                        <span style="font-weight: bold; font-size: 20px;">QUESTIONNAIRE MEDICAL N?? 3 a</span>
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

                                        <table>

                                            <tbody>

                                                

                                                <tr>

                                                    <td style="font-size: 15px; font-weight: bold;">Contrat N" : <span style="font-weight: normal;"></span></td>

                                                    <td style="font-size: 15px; font-weight: bold;">Adh??sion : <span style="font-weight: normal;"></span></td>

                                                </tr>

                                                <tr>

                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>

                                                </tr>

                                                <tr>

                                                    <td style="font-size: 15px; font-weight: bold;">Agence : <span style="font-weight: normal;"><?php echo $appformD['branch_name'];?></span></td>

                                                </tr>

                                                

                                                <tr>

                                                    <td colspan="2" style="width: 100%; font-size: 13px; font-weight: normal; line-height: 19px; border: solid 1px #000; padding: 10px;">

                                                        <span style="display: block; font-size: 13px; padding: 0; font-weight: 400; text-align: justify;">

                                                            La personne ?? assurer doit r??pondre personnellement, clairement, sans rature ni surcharge ?? chaque question. Un simple trait de plume n'est pas suffisant. Mettre une croix dans la

                                                            case vierge pr??c??dant la r??ponse qui convient En cas de r??ponse positive donnez les pr???? cisions demand??es en utilisant si n??cessaire une feuille annexe.

                                                        </span>

                                                    </td>

                                                </tr>
												<tr>
                                                    <td><br></td>
                                                </tr> 


                                                

                                                <tr>

                                                    <td style="font-size: 15px; font-weight: bold;">Nom : <span style="font-weight: normal;"> <?php echo ucfirst($customer['middle_name'])." " ?: '';?><?php echo ucfirst($customer['last_name']) ?: '-';?></span></td>

                                                    <td style="font-size: 15px; font-weight: bold;">Pr??noms : <span style="font-weight: normal;"> <?php echo ucfirst($customer['first_name'])." " ?: '-';?></span></td>

                                                </tr>

                                                <tr>

                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>

                                                </tr>

                                                <tr>

                                                    <td style="font-size: 15px; font-weight: bold;">Date de naissance : <span style="font-weight: normal;"><?php echo date("d-m-Y",strtotime($customer['dob'])) ;?></span></td>

                                                    <td style="font-size: 15px; font-weight: bold;">Profession exerc??e : <span style="font-weight: normal;"><?php echo $customer['employeeOccupation'];?></span></td>

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

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Avez-vous d??j?? ??t?? refus??, ajourn?? ou supprim?? par un pr??c??dent contrat d'assurance de personnes ?</span>

                                    </td>

                                    <td style="font-size: 13px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;">(si oui,date, motif et nom de la Compagnie)</span>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Etes-vous actuellement titulaire d'assurance de personnes ? </span>

                                    </td>

                                    <td style="font-size: 13px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;">(si oui, date d'effet, nom de la Compagnie, montants et garanties)</span>

                                    </td>

                                </tr>



                                <tr>

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Avez-vous ??t?? victime d'accident (automobile ou autre) ?</span>

                                    </td>

                                    <td style="font-size: 13px;width: 20%;border: solid 1px #000;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;">(localisation des blessures, y a-t-ileu perte de connaissance, dur??e, dates, s??quelles)</span>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">

                                            <span style="display: block; min-height: 24px;">Pratiquez-vous des sports ?</span>

                                            <!-- <span style="display: block;">AU COURS DES 10 DERNI??RES ANN??ES Avez-vous fait des s??jours en milieu hospitalier ou assimil?? ?</span> -->

                                        </span>

                                    </td>

                                    <td style="font-size: 13px;width: 20%;border: solid 1px #000;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;border-spacing: 0;vertical-align: top;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 24px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                        <!-- <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; /* min-height: 66px; */">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span> -->

                                    </td>

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 24px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> en amateur <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> en competition

                                        </span>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 2px 5px 2px 5px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">

                                            <span style="display: block; height: 24px;">??? Avez-vous subi : </span>



                                            <span style="display: block; min-height: 24px;">??? des examens m??dicaux </span>

                                            <span style="display: block; min-height: 24px;">??? sang, urines </span>



                                            <span style="display: block; min-height: 24px;">??? ??lectrocardiogramme </span>



                                            <span style="display: block; min-height: 24px;">??? radiographies </span>

                                            <span style="display: block; min-height: 70px;">??? test de d??pistage (toxoplasmose, h??patite B, SIDA, etc.) Un traitement sp??cialis?? tel que : </span>

                                            <span style="display: block; min-height: 44px;">??? rayons, chimioth??rapie, immunoth??rapie ou cobaltoth??rapie </span>

                                            <span style="display: block; min-height: 44px;">??? des transfusions de sang ou des d??riv??s sanguins.</span>

                                        </span>

                                    </td>

                                    <td style="font-size: 13px;width: 20%;border: solid 1px #000;padding: 2px 5px 2px 5px;text-align: center; line-height: 16px;border-spacing: 0;vertical-align: top;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 24px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 24px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 24px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 24px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 24px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 70px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 44px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 44px;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 13px; width: 40%; border: solid 1px #000; padding: 10px; text-align: center;  line-height: 16px;"><span style="font-weight: normal;"></span></td>

                                </tr>
								<tr>
									<td colspan="3"><br><br>
										<table style="width: 90%; margin: auto; border-collapse: collapse;">
											<tbody>
												<tr>
													<td style="font-size: 13px; padding: 10px; text-align: center;  line-height: 16px; border-collapse: separate; vertical-align: baseline;">
														<span style="display: block; font-size: 13px; font-weight: 1000;">SUNU Assurances Vie Gabon </span>
														<span style="font-weight: normal;">
															Entreprise r??gie par le Code des assurances - Soci??t?? Anonyme au capital de 2.000.000 .000 F.CFA enti??rement lib??r?? RCCM : Libreville N?? 2003 B 2977 - N?? Statistique : 079575 Z - N?? NIF 795 575/P
															Av. du Colonel Parant - BP 2137 Libreville - Gabon T??l. : (+241) 01 74 34 34 - Fax : (+241) 01 72 48 57 - E-mail : gabon.sunuvie@sunu-group.com - Site Web : www.sunu-group.com

														</span>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr> 
								<tr>
									<td colspan="3" style="width: 90%; margin: auto; border-collapse: collapse;  height:220px;"> </td>
								</tr>
                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Etes-vous actuellement en arr??t de travail ?</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;">Depuis quand ? Motif,date de repnse envisag??e.</span>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Durant les 5 derni??res ann??es,avez-vous d??interrompre 0 Non 1Oui Quand ? Dur??e de chaque arr??t, motif. votre travailpendant plus de 3 semaines ?</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;"><span style="font-weight: normal;">Quand ? Dur??e de chaque arr??t,</span></td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Quel sont vos taille et poids </span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                     <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> m <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">kg

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;">Avez-vous grossi ou maigri de plus de 5 kgs depuis ??? Quel sont vos taille et poids 1 l m L] kg 6 mois ? Si oui,de combien</span>

                                    </td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">

                                            SOUFFREZ-VOUS OU AVEZ-VOUS ??T?? ATTEINT DE <br>

                                            ??? Maladies de l'appareil respiratoire ' (Toux de longue dur??e, crachement de sang.<br>

                                            essoufflements, affection des poumons???..)

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 13px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;">

                                        <span style="font-weight: normal;">Pr??ciser la nature exacte, la date de d??couverte, les traitements, l'??volution :</span>

                                    </td>

                                </tr>



                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Maladles de l'appareil cardiovasculaire  (Infarctus, hypertension art??rielle,art??rite,..)</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;"><span style="font-weight: normal;"> </span></td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;"> ??? Maladies de !'appareil digestif  (Jaunisse, h??patite, diarrh??e chronique,..???)</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;"><span style="font-weight: normal;"></span></td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Maladles de l'apparell urinaire et g??nital (Albuminurie et sang dans les urines,maladies sexuellement transmissibles,...)</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;"><span style="font-weight: normal;"></span></td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Maladies du syst??me nerveux  (Paralysies, m??ningite, ??pilepsie,...)</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;"><span style="font-weight: normal;"></span></td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Maladies du sang,des ganglions et de la rate (An??mie,pr??sence de ganglions anormaux, h??moglobinopathies et crises h??molytiques,...)</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;"><span style="font-weight: normal;"></span></td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Maladles endocriniennes ou m??taboliques  (Diab??te, goutte, anomalies de la thyro??de,...)</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;"><span style="font-weight: normal;"></span></td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Maladles des os et des artlculatlons , (Arthrose, rhumatismes divers,...)</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;"><span style="font-weight: normal;"> </span></td>

                                </tr>

                                <tr>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 16px;border-collapse: separate;">

                                        <span style="font-weight: normal;">Maladies de la peau  (Ablation de grains de beaut??, verrues fr??quentes, autres l??sions,...)</span>

                                    </td>

                                    <td style="font-size: 12px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;border-spacing: 0;">

                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>

                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui

                                        </span>

                                    </td>

                                    <td style="font-size: 12px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 16px;"><span style="font-weight: normal;"></span></td>

                                </tr> 
                                <tr>

                                    <td colspan="3" style="font-size: 12px;padding: 3px;text-align: left; line-height: 16px;">

                                        <span style="font-weight: normal; text-align: justify; display: block;">

                                            Je certifie avoir r??pondu sinc??rement sans aucune r??ticence et n avoir rien dissimul?? sur mon ??tat de sanl?? pass?? ou el et prends acte que 1oute r??llcence ou fausse d??clara?? tion de ma part

                                            en1ralnera la nullil?? du conlrat. J autorise express??men1 la Compagnie ?? prendre taules informations qu'elle jugerait ullles el n??cessaires aupr??s des m??decins qui m'ont soign?? J'autorise ces

                                            m??decins ?? communiquer ?? la Compagnie tous les renseignemen1s demand??s

                                        </span>

                                        <span style="font-weight: normal; display: block; height: 3px;"></span>

                                        <span style="font-weight: normal; text-align: justify; display: block;">Extrait de l'artlcle 18 du Code CIMA :Fausse d??clarationlntentlonnelle :.anctlon???</span>

                                        <span style="font-weight: normal; text-align: justify; display: block;">

                                            nd??pendamment des causes ordinaires de nullit??. et sous r??serve des dispositions de l'art. 80, le contrai d'assurance est nul en cas de r??licence ou de fausse d??claration ln1en?? lionnelle dela

                                            part do l'assur??, quand celte r??ticence ou cette rausse d??claration change l'objet du risque ou en diminue l'opln1on pour l'assureur alors m??me quele risque omis ou d??natur?? par l'assur?? a ??t??

                                            sans influence sur le sinistre Les primes pay??es demeurent alors acquises ?? l'assureur, qui a droit au paiement de toutes les primes ??chues ??li re de dommages et in1??r??ls. Les dispositions du

                                            second alin??a du pr??senl article ne sonl pas applicables aux assurances sur la vie

                                        </span>

                                        <span style="font-weight: normal; display: block; height: 3px;"></span>

                                        <span style="font-weight: normal; text-align: justify; display: block;">Extrait IMllartlcla 19 du Code CIMA :Fau11ae d??claratlon nonlnlanUonnella</span>

                                        <span style="font-weight: normal; text-align: justify; display: block;">

                                            L'omission ou la d??claration inexacte de ra part de l'assur?? dont la mauvaise 101 n ast pas ??tablie n'entraine pas la nullit?? de 1assurance SI elle est constat??e avant taut sinistre. l'assureur

                                            a??le droit soit de mainlenir le contrat, moyennent une augmentation de prime accepl??e par l'assur?? soit de r??silierle conlret dix jours apr??s notification adress??e ?? l'as?? sur?? parlettre

                                            recommand??e ou contresign??e, en reslituanlla portion dela prime pay??e pour le temps ou l'assurance ne court plus. Dans te ces ou la cons1a1ation n??a lieu qu'apr??s un siiiistre. l'ndemnit?? est

                                            r??duhe en proportion du taux des primes pay??es par rapport aux taux des primes qui auraient ??l?? dues,si les risques avalent ??1?? compl??tement e1 exac- 1enient d??clar??s.

                                        </span>

                                    </td>

                                </tr>
                                <tr>
                                    <td colspan="3" style="height: 30px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;"></td>
                                    <td colspan="1" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; text-align: center;">
                                        <span style="display: block; font-size: 12px; font-weight: 600;">
                                            Signature de l???Emprunteur 
                                        </span> 
                                        <span style="display: block; font-size: 12px; padding: 0; font-weight: 400;"> 
                                            Pr??c??d??e de la mention "Lu et Approuv?? ...) 
                                        </span> 
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
<script type="text/javascript">
function myfunction(){
window.print();
}
</script>


</body></html>