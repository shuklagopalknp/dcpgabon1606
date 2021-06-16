<?php 
$customer=(array) json_decode($appformD['customer_data']);
$databinding=(array) json_decode($appformD['databinding']);
// echo "<pre>";
// print_r($appformD);
// echo "</pre>";
// print_r($riskcurrentmonthlyvrefit);

?>

<html>
    <head> </head>
    <body translate="no" style="background-color: #fff; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;">
        <table style="width: 800px; background-color: #fff; margin: 0px auto;">
            <tbody>
                <tr>
                    <td>
                        <table style="width: 100%;">
                            <tbody>
                                 
                                <tr>
								<td style="position: relative; text-align: left; width: 40px;"><img src="<?php echo  base_url(); ?>assets/logo2.png" style="width: 50px;" /></td>
                                     
									<td style="width: 300px; text-align: right; font-size: 11px; line-height: 15px;">
    <span style="display: block; font-weight: bold;">BANQUE INTERNATIONALE POUR LE COMMERCE</span>

    <span style="display: block; font-weight: bold;">ET L’INDUSTRIE DU GABON SA avec Conseil d’Administration </span>
    <span style="display: block;"></span>
    <span style="display: block;">Au capital de 18&nbsp;000&nbsp;000&nbsp;000 FCFA</span>
    <span style="display: block;">Siège Social&nbsp;: Avenue du Colonel Parant</span>
    <span style="display: block;">BP&nbsp;: 2241 Libreville - Gabon</span>
    <span style="display: block;">N° RCCM&nbsp;: 2002 B 01732 Libreville - NIF&nbsp;: 790027 A</span>
    <span style="display: block;">SWIFT&nbsp;: BICIGALXXXX</span>
</td>

                                </tr>
								<tr>
                                    <td style="width: 100%; text-align: center;" colspan="2">
                                        <span style="font-weight: bold; font-size: 17px; padding: 10px;">ACTE DE PRET</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 100%; vertical-align: top; padding-right: 10px;">
                                        <table style="width: 100%;">
                                           <tbody>
                                                <tr>
                                                    <td colspan="2" style="height: 3px; width: 100%;"></td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="font-size: 13px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block;width: 140px;">Je soussigné (1) </span>
                                                            <span style="display: block; width: 100%; border-bottom: dashed 1px;"> <?php echo ucfirst($customer['last_name'])." " ?: '-';?><?php echo ucfirst($customer['middle_name'])." " ?: '';?><?php echo ucfirst($customer['first_name']) ?: '-';?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 3px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="font-size: 13px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 152px;">Né le <span style="     display: inline-block; margin: 0px 5px;  min-width:50px ; border-bottom: dashed 1px;"><?php echo date("d-m-Y",strtotime($customer['dob']));?> </span> 
                                                            <span style="display: block; width: 152px;">  à  <span style="     display: inline-block; margin: 0px 5px;  min-width:50px ; border-bottom: dashed 1px;"><?php echo $customer['birthplace'];?></span>
                                                            <span style="display: block; width: 100%; border-bottom: dashed 1px;">  </span>
                                                        </div>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="height: 3px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 13px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block;width: 110px;">Demeurant à </span>
                                                            <span style="display: block; width: 100%; border-bottom: dashed 1px;"> <?php echo ucfirst($customer['resides_address'])." " ?: '-';?>, <?php echo ucfirst($customer['city_id'])." " ?: '-';?> </span>
                                                        </div>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="height: 3px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 13px; font-weight: normal;">
                                                        <div style="display: black;">
                                                            <span style="display: block; line-height: 18px;">reconnais devoir à la BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON

La somme de <span style="     display: inline-block; margin: 0px 5px;  min-width:50px ; border-bottom: dashed 1px;"> <?php echo number_format($appformD['loan_amt'],0,',',' ');?></span>  F. CFA reçue à titre et portée au crédit de mon </span> 
                                                        </div>
                                                    </td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="height: 3px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 13px; font-weight: normal;">
                                                        <div style="display: black;">
                                                            <span style="display: block;line-height: 18px;">compte N° <span style="display: inline-block; margin: 0px 5px;  min-width:50px ; border-bottom: dashed 1px;"> <?php echo number_format($customer['account_no'],0,'',' ')." " ?: '';?> </span>  Chez son siège de <span style="     display: inline-block; margin: 0px 5px;  min-width:50px ; border-bottom: dashed 1px;"> <?php echo $appformD['branch_name'];?> </span> le <?php echo date("d-m-Y",strtotime($appformD['cdate'])) ;?></span> 
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
                        <table style="width: 100%; border-collapse: collapse;">
                            <tbody style="">
                                <tr>
                                    <td colspan="3" style="font-size: 13px; text-align: left; line-height: 18px;">
                                        <span style="font-weight: normal; display: block;">
                                            La BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON ne sera pas tenue à l’égard de quiconque de surveiller l’emploi des fonds .Je m’engage à rembourser ce prêt en <span style="display: inline-block; margin: 0px 5px;  min-width:50px ; border-bottom: dashed 1px;"> <?php echo number_format($appformD['loan_term'],0,',',' ');?> </span> termes mensuels d’un montant constant de <span style="display: inline-block; margin: 0px 5px;  min-width:50px ; border-bottom: dashed 1px;"><?php echo number_format($appformD['pmnt'],0,',',' ');?> </span> francs décompté sur le montant en capital restant dû après chaque échéance, 
ce programme d’amortissement ne pourra en aucun cas être modifié.<br>
<?php
                                        if(($customer['cat_emp_id']=='9') || ($customer['cat_emp_id']=='10')){
                                            $loandate='25';
                                        }else if($customer['cat_emp_id']=='8'){
                                            $loandate='29';
                                        }else{
                                            $loandate='20';
                                        }
                                        ?>
Le premier remboursement aura lieu  le <span style="display: inline-block; margin: 0px 5px;  border-bottom: dashed 1px;"><?php echo $loandate."-".$databinding[0]->month."-".$databinding[0]->years?> </span> ,le dernier le <span style="display: inline-block; margin: 0px 5px;    border-bottom: dashed 1px;"><?php echo $loandate."-".end($databinding)->month."-".end($databinding)->years?> </span>
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 10;"></span>
                                        <span style="font-weight: normal; display: block;">
                                           Le règlement de ces termes sera automatiquement effectué par le débit de mon compte sus-indiqué que je m’engage à approvisionner à cette fin. Je donne à cet effet mandat irrévocable permanent à la BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON.
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 3px;"></span>
                                        <span style="font-weight: normal; display: block;">
                                           Par ailleurs, je m’engage à supporter les frais, taxes et prélèvements de  toute nature, présents ou à venir dont pourrait être frappé le présent contrat, ainsi que les frais et honoraires des présentes et ceux qui en seront la conséquence.
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 3px;"></span>
                                        <span style="font-weight: normal; display: block;">
                                           En cas de non respect de l’une des quelconque des clauses du présent acte et notamment en cas de défaut d’un seul des règlements indiqués ci-dessus, la totalité de la créance en principal, intérêts et accessoires deviendrait immédiatement et de plein droit exigible, s’il convient à la BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON, et celle-ci aurait alors une entière liberté d’action pour recouvrer ladite créance par toutes voies et moyens de droit. En cas d’exigibilité anticipée ou atermoiement pour quelque cause que soit, les sommes devenues exigibles seront productives d’intérêts au taux du présent prêt. Les dits intérêts, échus et non payés, se  capitaliseront de plein droit à compter du jour où ils seront dus pour une année entière et porteront eux-mêmes intérêts aux taux du présent prêt.  
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 3px;"></span>
                                        <span style="font-weight: normal; display: block;">
                                            A peine d’exigibilité anticipée, je m’engage à première demande de la BANQUE INTERNATIONALE POUR LE COMMERCE ET L’INDUSTRIE DU GABON, à lui consentir toutes garanties qu’elle jugera souhaitables.
Toutes les obligations résultant des présentes sont stipulées solidaires et indivisibles entre mes héritiers et ayants droit de telle sorte que leur exécution pourra être réclamée pour le tout à n’importe quel moment.
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 3px;"></span>
                                        <span style="font-weight: normal; display: block;">
                                           En outre je certifie, après avoir pris connaissance de l’article L113-8 du code des assurances :
                                        </span>
                                        
                                        <ul style="font-size: 13px; line-height: 18px; list-style: circle; margin: 0;">
                                            <li>Ne pas être en état d’incapacité temporaire de travail et exercer mon activité professionnelle de façon normale et effective ;</li>

                                            <li>N’être atteint d’aucune infirmité, invalidité, maladie aigüe ou chronique ;</li>

                                            <li>Ne suivre aucun traitement ou régime et ne pas être sous surveillance médicale</li>

                                         </ul>
                                    <span style="font-weight: normal; display: block; height: 3px;"></span>
                                        <span style="font-weight: normal; display: block;">
                                           En cas de remboursement anticipé, après avoir fait la demande avec préavis d’un mois, je m’engage à reverser à la Banque une indemnité égale à <span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;">05</span>% (taxe en sus) du capital effectivement rembourse par anticipation.
                                        </span>
										 <span style="font-weight: normal; display: block; height: 50px;"></span>
									</td>
									
                                </tr>
								<tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 18px;"></td>
                                    <td colspan="1" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 18px; text-align: center;">
                                        <span style="display: block; font-size: 13px; font-weight: 600;">
                                            Fait à <span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"></span> , le <span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"> </span>
                                        </span>
                                        <span style="display: block; font-size: 13px; padding: 0; font-weight: 400;">
                                            Signature (2)
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="width: 100%; font-size: 13px; font-weight: normal; line-height: 18px; padding: 5px; height: 100px; vertical-align: top;">
                                        <span style="display: block; font-size: 13px; padding: 0; font-weight: 400; text-align: justify;">
                                            () Nom et prénoms dans l’ordre de l’Etat Civil.
                                        </span>
                                        <span style="display: block; font-size: 13px; padding: 0; font-weight: 400; text-align: justify; height: 3px;"></span>
                                        <span style="display: block; font-size: 13px; padding: 0; font-weight: 400; text-align: justify;">
                                            (2) La signature doit être précédée de la mention suivante :
                                        </span>
                                        
                                        <span style="display: block; font-size: 13px; padding: 0; font-weight: 400; text-align: justify; height: 3px;"></span>
                                        <span style="display: block; font-size: 13px; padding: 0; font-weight: 400; text-align: justify;">
                                            LU ET APPROUVE BON POUR F.CFA………………………………………………..(montant en toute lettres)
‘‘ EN PRINCIPAL PLUS INTERÊTS, FRAIS ET ACCESSOIRES’’
                                        </span>
                                    </td>
                                </tr>
								<tr>
                                    <td colspan="3" style="height: 20px;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
