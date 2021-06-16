<?php 

$customer=(array) json_decode($appformD['customer_data']); 
print_r($customer);
?><html>
    <head><link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/font-awesome.css');?>"/> </head>
    <body translate="no" style="background-color: #e2e1e0; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;text-align:center;">
        <table style="width: 800px; background-color: #fff; margin: 50px auto; padding: 20px;">
            <tbody>
                <tr>
                    <td style="width: 50%; vertical-align: top;">
                        <table>
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <img src="https://dcpilote.com/assets/img/logo.png" style="width: 130px;" />
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 40px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 100%; text-align: center;"><span style="font-weight: bold; font-size: 20px;">ATLANTIQUE PRET SCOLAIRE</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 100%; text-align: center;"><span style="font-weight: 400; font-size: 17px;">CONDITIONS PARTICULIERES</span></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 30px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 100%; font-size: 14px; font-weight: bold; border-bottom: solid;">IDENTIFICATION</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 20px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            NOM(S) et PRENOM(S): 
                                            <?php echo trim(ucfirst($customer['first_name'])." ".$customer['middle_name']." ".$customer['last_name']) ?><!-- I__________________________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            DATE DE NAISSANCE: <?php echo date('d-m-Y', strtotime($customer['dob'])) ?: '-';?>
                                            <!-- I__I__I I__I__I I__I__I__I__I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            ADRESSE: <?php echo $customer['resides_address'].", ".$customer['city_id'] ?>
                   
                                            <!-- I_________________________________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            N° PIECE IDENTITE: <?php echo $customer['id_number'];?>
                                            <!-- I_______________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            PROFESSION: <?php echo $customer['occupation'];?>
                                            <!--  I______________________________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            N°TELEPHONE: <?php echo $customer['main_phone'];?>
                                            <!-- I__I__I I__I__I I__I__I I__I__I I__I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            EMPLOYEUR: <?php echo $customer['employer_name'] ;?>
                                            <!-- I_____________________________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            ADRESSE: <?php echo $fiche_data['employer_address'];?>
                                            <!-- I______________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            SECTEUR ACTIVITE: <?php echo $customer['secteurs_id'] ?: 'AGRICOLE';?>
                                            <!-- I__I__I I__I__I I__I__I__I__I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            DATE D’EMBAUCHE: <?php echo date('d-m-Y', strtotime($customer['employment_date']));?>
                                            <!-- I__I__I I__I__I I__I__I__I__I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            NUMERO DE MATRICULE: <?php echo $fiche_data['service_no'];?>
                                            <!-- I_________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 10px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 100%; font-size: 14px; font-weight: bold; border-bottom: solid;">REVENUS / CHARGES</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            MONTANT SALAIRE NET MENSUEL (en FCFA) : <?php echo $riskfsituation[0]['net_salary'] ?: '100000';?>
                                            <!-- I___________________________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                 <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            QUOTITE : <?=$quotite_amount;?>
                                            <!-- I___________________________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                 <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            ECHEANCE PRET EN COURS : <?=$echeance_amount;?>
                                            <!-- I___________________________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            CHARGES AVANT PROJET
                                             <?php $p_charge =  explode(',',$fiche_data['prior_charges']);

                                            ?>
                                            <span style="display: flex; padding-left: 30px; align-items: center; opacity: 0.6;">

                                                <span style="display: block; width: 13px; height: 13px; border: solid 1px; margin-right: 5px;">
                                                        <?php if(in_array('1', $p_charge)){?>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                      <?php }?>
                                                </span>Engagements chez <?php echo strtoupper($bankinfo[0]['bank_name']) ?>
                                            </span>
                                            <span style="display: flex; padding-left: 30px; align-items: center; opacity: 0.6;">
                                                <span style="display: block; width: 13px; height: 12px; border: solid 1px; margin-right: 5px;"><?php if(in_array('2', $p_charge)){?>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                        <?php }?></span>Autres
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            TAUX D’ENDETTEMENT AVANT PROJET : <?php echo $fiche_data['prior_debt_rate'];?>
                                            <!-- I__I__I% -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 10px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 100%; font-size: 14px; font-weight: bold; border-bottom: solid;">CONDITIONS FINANCIERES DU PRÊT</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            CAPITAL EMPRUNTE (en FCFA): <?php echo $appformD[0]['loan_amt'];?> 
                                            <!-- I__________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            DUREE (en mois): <?php echo $appformD[0]['loan_term'];?>
                                            <!-- I__I__I -->
                                        </span>
                                    </td>
                                    <td style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            DIFFERE (O/N): <?php if($fiche_data['differed']) echo "Y"; else echo "N";?>
                                            <!-- I__I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            TAUX D’INTERET HT: <?php echo sprintf("%01.2f", $appformD[0]['loan_interest']);?>%
                                            <!-- I__I__I% -->
                                        </span>
                                    </td>
                                </tr>
                                 <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            FRAIS D’ DOSSIER PRÊT (en FCFA) : <?php echo $otherinfo[0]['frais_de_dossier'] ?: '0';?>
                                            <!--  I_________________________I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                           PRIME D’ ASSURANCE (en FCFA) : <?php echo $otherinfo[0]['field_4']; ?>
                                            <!--  I_________________________I -->
                                        </span>
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            TAUX D’ENDETTEMENT APRES PROJET : <?=$debt_ratio."%";?>
                                            <!--  I__I__I% -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 10px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 100%; font-size: 14px; font-weight: bold; border-bottom: solid;">GARANTIES</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            ATTESTION DE VIREMENT IRREVOCABLE (O/N):
                                            <?php echo ($fiche_data['transfer_of_salary']) ? "Y" : "N";?>
                                            <!--  I__I -->
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 13px; padding: 5px; font-weight: 600;">
                                            ASSURANCE DECES (O/N):
                                             <?php echo ($fiche_data['death_insurance']) ? "Y" : "N";?> 
                                            <!-- I__I -->
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" style="height: 10px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 100%; font-size: 14px; font-weight: bold; border-bottom: solid;">CLAUSE D’ACCEPTATION GENERALE</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 11px; padding: 5px; font-weight: 600;">
                                            Le soussigné certifie exactes et sincères les déclarations sur la présente. Il reconnaît avoir reçu un exemplaire des conditions particulières et des conditions générales, et déclare y adhérer
                                            pleinement sans aucune réserve.
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;">
                                        <span style="display: block; font-size: 12px; padding: 5px; font-weight: 600;-center text">
                                            Fait à ____________________________, le______________________<br />
                                            (Signature précédée de la mention « Lu et approuvé »)
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td style="vertical-align: top; border: solid 2px #000; width: 35%; padding: 0;">
                        <table style="width: 100%; padding: 0; border-collapse: collapse; margin: 0; border-spacing: 0px;">
                            <tbody style="padding: 0;">
                                <tr style="">
                                    <td colspan="2" style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;">CADRE RESERVE A LA BANQUE</td>
                                </tr>

                                <tr>
                                    <td colspan="2" style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;">DELIGILIE CONDITIONS</td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        L’emprunteur travaille dans une entreprise éligible pour ce programme <span style="display: block; text-align: right; font-weight: 600; margin-top: 5px;">O/N: <?php if($fiche_data['eligible_condition1'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['eligible_condition1'] == '0'){
                                                    echo 'N';
                                                    }?> 
                                       <!--  I__I -->
                                    </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px; vertical-align: top;">OBSERVATIONS <?php echo $fiche_data['ec_observation1']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        L’emprunteur a au moins 12 mois d’ancienneté chez son employeur actuel <span style="text-align: right; font-weight: 600; display: block; margin-top: 5px;">O/N: <?php if($fiche_data['eligible_condition2'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['eligible_condition2'] == '0'){
                                                    echo 'N';
                                                    }?>  </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['ec_observation2']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Salaire mensuel&nbsp;: minimum CFA 50 000&nbsp;(pas de minimum exigé pour les fonctionnaires) <span style="display: block; text-align: right; font-weight: 600; margin-top: 5px;">O/N: <?php if($fiche_data['eligible_condition3'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['eligible_condition3'] == '0'){
                                                    echo 'N';
                                                    }?> </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['ec_observation3']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        L’emprunteur a un CDI/CDD couvrant la période de remboursement <span style="text-align: right; font-weight: 600; display: block; margin-top: 5px;">O/N: <?php if($fiche_data['eligible_condition4'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['eligible_condition4'] == '0'){
                                                    echo 'N';
                                                    }?>  </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['ec_observation4']?></td>
                                </tr>

                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Relation avec la banque&nbsp;: Le compte est ouvert à la BACM depuis au moins 1 mois et virement d’au moins un salaire reçu.
                                        <span style="display: block; text-align: right; font-weight: 600; margin-top: 5px;">O/N: <?php if($fiche_data['eligible_condition5'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['eligible_condition5'] == '0'){
                                                    echo 'N';
                                                    }?> </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['ec_observation5']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Le client n’a ni engagement impayés ni douteux à la banque ou chez les confrères <span style="text-align: right; font-weight: 600; display: block; margin-top: 5px;">O/N: <?php if($fiche_data['eligible_condition6'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['eligible_condition6'] == '0'){
                                                    echo 'N';
                                                    }?> </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['ec_observation6']?></td>
                                </tr>
                            </tbody>
                            <tbody style="padding: 0;">
                                <tr style="">
                                    <td colspan="2" style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;">PIECES JOINTES AU DOSSIER</td>
                                </tr>

                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Conditions générales (convention) <span style="display: block; text-align: right; font-weight: 600; margin-top: 5px;">O/N: <?php if($fiche_data['piece_condition1'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['piece_condition1'] == '0'){
                                                    echo 'N';
                                                    }?></span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['pc_observation1']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Bulletin d’adhésion assurance décès <span style="text-align: right; font-weight: 600; display: block; margin-top: 5px;">O/N: <?php if($fiche_data['piece_condition2'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['piece_condition2'] == '0'){
                                                    echo 'N';
                                                    }?> </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['pc_observation2']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Billet à ordre <span style="display: block; text-align: right; font-weight: 600; margin-top: 5px;">O/N: <?php if($fiche_data['piece_condition3'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['piece_condition3'] == '0'){
                                                    echo 'N';
                                                    }?></span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['pc_observation3']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Pièce d’identité en cours de validité <span style="text-align: right; font-weight: 600; display: block; margin-top: 5px;">O/N: 
                                            <?php if($fiche_data['piece_condition4'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['piece_condition4'] == '0'){
                                                    echo 'N';
                                                    }?>
                                         </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['pc_observation4']?></td>
                                </tr>

                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        1 dernier bulletin de salaire <span style="display: block; text-align: right; font-weight: 600; margin-top: 5px;">O/N:<?php if($fiche_data['piece_condition5'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['piece_condition5'] == '0'){
                                                    echo 'N';
                                                    }?></span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['pc_observation5']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Un justificatif de domicile récent <span style="display: block; text-align: right; font-weight: 600; margin-top: 5px;">O/N: <?php if($fiche_data['piece_condition6'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['piece_condition6'] == '0'){
                                                    echo 'N';
                                                    }?></span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['pc_observation6']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Une attestation de virement irrévocable <span style="text-align: right; font-weight: 600; display: block; margin-top: 5px;">O/N: <?php if($fiche_data['piece_condition7'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['piece_condition7'] == '0'){
                                                    echo 'N';
                                                    }?> </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['pc_observation7']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Une attestation de non redevance <span style="text-align: right; font-weight: 600; display: block; margin-top: 5px;">O/N: <?php if($fiche_data['piece_condition8'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['piece_condition8'] == '0'){ echo 'N';}
                                                    ?> </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['pc_observation8']?></td>
                                </tr>
                                <tr>
                                    <td style="text-align: left; font-size: 12px; font-weight: 500; border: none; padding: 5px;">
                                        Autres <span style="text-align: right; font-weight: 600; display: block; margin-top: 5px;">O/N: 
                                            <?php 
                                                if($fiche_data['piece_condition9'] == '1'){
                                                    echo 'O';
                                                }
                                                else if($fiche_data['piece_condition9'] == '0'){
                                                     echo 'N';
                                                }
                                            ?> </span>
                                    </td>
                                    <td style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;"><?php echo $fiche_data['pc_observation9']?></td>
                                </tr>
                            </tbody>

                            <tbody style="padding: 0;">
                                <tr style="">
                                    <td colspan="2" style="text-align: center; font-size: 12px; font-weight: 600; border: solid 1px #000; padding: 5px;">APPROBATIONS</td>
                                </tr>
                                <tr style="">
                                    <td colspan="2" style="text-align: center; font-size: 11px; font-weight: 600; border: solid 1px #000; padding: 5px;">
                                        <p style="margin: 0px;">GESTIONNAIRE</p>
                                         <span style="display: flex; justify-content: space-around; align-items: center; margin-top: 7px;">
                                        <span style="width: 40%; text-align: left;">Avis favorable</span>
                                        <span><input type="checkbox"  <?php
                       if($fiche_data) if($fiche_data['g_review'] == '1') echo "checked";
                       ?> disabled style="width: 25px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px;" /></span>
                                    </span>
                                        <span style="display: flex; justify-content: space-around; align-items: center; margin-top: 7px;">
                                            <span style="width: 40%; text-align: left;">Avis défavorable</span>
                                            <span><input type="checkbox"  <?php
                       if($fiche_data) if($fiche_data['g_review'] == '0') echo "checked";
                       ?> disabled style="width: 25px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px;" /></span>
                                        </span>
                                        <span style="display: block; text-align: left; opacity: 0.6; margin-top: 5px;">Date :</span>
                                        <span style="display: block; text-align: left; opacity: 0.6; margin-top: 5px;">Signature&nbsp;:</span>
                                    </td>
                                </tr>
                                <tr style="">
                                <td colspan="2" style="text-align: center; font-size: 11px; font-weight: 600; border: solid 1px #000; padding: 5px;">
                                    <p style="margin: 0px;">CHEF D’AGENCE</p>
                                    <span style="display: flex; justify-content: space-around; align-items: center; margin-top: 7px;">
                                        <span style="width: 40%; text-align: left;">Avis favorable</span>
                                        <span><input type="checkbox" <?php
                       if($fiche_data) if($fiche_data['ca_review'] == '1') echo "checked";
                       ?> disabled style="width: 25px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px;" /></span>
                                    </span>
                                    <span style="display: flex; justify-content: space-around; align-items: center; margin-top: 7px;">
                                        <span style="width: 40%; text-align: left;">Avis défavorable</span>
                                        <span><input type="checkbox" <?php
                       if($fiche_data) if($fiche_data['ca_review'] == '0') echo "checked";
                       ?> disabled style="width: 25px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px;" /></span>
                                    </span>
                                    <span style="display: block; text-align: left; opacity: 0.6; margin-top: 5px;">Date :</span>
                                    <span style="display: block; text-align: left; opacity: 0.6; margin-top: 5px;">Signature&nbsp;:</span>
                                </td>
                            </tr>
                                 <tr style="">
                                <td colspan="2" style="text-align: center; font-size: 11px; font-weight: 600; border: solid 1px #000; padding: 5px;">
                                    <p style="margin: 0px;">DCPR / CIC</p>
                                    <span style="display: flex; justify-content: space-around; align-items: center; margin-top: 7px;">
                                        <span style="width: 40%; text-align: left;">Avis favorable</span>
                                    <span><input type="checkbox"  <?php
                       if($fiche_data) if($fiche_data['dc_review'] == '1') echo "checked";
                       ?> disabled  style="width: 25px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px;" /></span>
                                    </span>
                                    <span style="display: flex; justify-content: space-around; align-items: center; margin-top: 7px;">
                                        <span style="width: 40%; text-align: left;">Avis défavorable</span>
                                        <span><input type="checkbox"  <?php
                       if($fiche_data) if($fiche_data['dc_review'] == '0') echo "checked";
                       ?> disabled  style="width: 25px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px;" /></span>
                                    </span>
                                    <span style="display: block; text-align: left; opacity: 0.6; margin-top: 5px;">Date :</span>
                                    <span style="display: block; text-align: left; opacity: 0.6; margin-top: 5px;">Signature&nbsp;:</span>
                                </td>
                            </tr>


                             <tr style="">
                                <td colspan="2" style="text-align: center; font-size: 11px; font-weight: 600; border: solid 1px #000; padding: 5px;">
                                    <p style="margin: 0px;">DIRECTION DES RISQUES</p>
                                    <span style="display: flex; justify-content: space-around; align-items: center; margin-top: 7px;">
                                        <span style="width: 40%; text-align: left;">Avis favorable</span>
                                    <span><input type="checkbox"  <?php
                       if($fiche_data) if($fiche_data['d_review'] == '1') echo "checked";
                       ?> disabled  style="width: 25px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px;" /></span>
                                    </span>
                                    <span style="display: flex; justify-content: space-around; align-items: center; margin-top: 7px;">
                                        <span style="width: 40%; text-align: left;">Avis défavorable</span>
                                        <span><input type="checkbox"  <?php
                       if($fiche_data) if($fiche_data['d_review'] == '0') echo "checked";
                       ?> disabled  style="width: 25px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px;" /></span>
                                    </span>
                                    <span style="display: block; text-align: left; opacity: 0.6; margin-top: 5px;">Date :</span>
                                    <span style="display: block; text-align: left; opacity: 0.6; margin-top: 5px;">Signature&nbsp;:</span>
                                </td>
                            </tr>
                               
                               
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="button" style="margin:10px 10px ;" onclick="window.print()">PRINT</button>
    </body>
</html>
