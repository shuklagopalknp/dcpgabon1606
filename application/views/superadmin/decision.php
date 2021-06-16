<?php 
$customer=(array) json_decode($appformD['customer_data']);
$risk_analysis1=(array) json_decode($risk_analysis['engagement']);
// echo "<pre>";
// print_r($appformD);
// echo "</pre>";
$risk_data =  json_decode($risk_analysis['solde_du_cav']);
// print_r($risk_data[0]->value);

?>

<html>
    <head>
        <style>
    @page {
    margin: 0;
}
    </style> </head>
    <body translate="no" style="background-color: #fff; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;">
        <table style="width: 100%; background-color: #fff; margin: 0px auto; padding: 0;">
            <tbody>
                
                <tr>
                    <td>
                        <table style="width: 90%; margin: auto; padding-top: 30px;">
                            <tbody>
                                </br>
                                <tr>
                                    <td style="position: relative; text-align: left; width: 40px;"><img src="<?php echo  base_url(); ?>/assets/logo2.png" style="width: 40px;" /></td>
                                    <td style="position: relative; text-align: center;">
                                        <span style="display: block; font-weight: bold; font-size: 16px;">Direction de Réseau</span> <span style="margin-top: 5px; display: block; font-size: 13px;">Clientèle de Particuliers</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="position: relative; text-align: left; width: 50px;"></td>
                                    <td style="position: relative; text-align: center;">
                                        <?php if($page=='PP CONGES A LA CARTE'){?>
                                        <span style="display: block; font-weight: bold; font-size: 19px; color: #ea81a8;">« Conges à la Carte » 2021</span>
                                        <?php }else{?>
                                        <span style="display: block; font-weight: bold; font-size: 19px; color: #ea81a8;">« Fête à la Carte » 2021</span>
                                        <?php }?>
                                        
                                        <span style="margin-top: 3px; display: block; font-size: 13px;">Fiche d’aide à la décision</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="position: relative; text-align: left; width: 50px;"></td>
                                    <td style="position: relative; text-align: right;">
                                        <span style="font-weight: bold; font-size: 15px; color: #000;">Date</span>
                                        <span style="font-size: 13px; background: #000; color: #fff; padding: 3px;"><?php echo date("d-m-Y")?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <table style="width: 90%; margin: auto; border-collapse: collapse; border: solid 1px;">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 173px;">Nom et prénom du client : </span>
                                            <span style="display: block; width: 78%; border-bottom: solid 1px;"><?php echo ucfirst($customer['first_name'])." " ?: '-';?><?php //echo ucfirst($customer['middle_name'])." " ?: '';?><?php echo ucfirst($customer['last_name']) ?: '-';?></span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 173px;"> Compte Chèque N°: </span>
                                            <span style="display: block; width: 78%; border-bottom: solid 1px;"> <?php echo str_pad($customer['account_no'], 16, '0', STR_PAD_LEFT);?> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 173px;"> Adresse: </span>
                                            <span style="display: block; width: 55%; border-bottom: solid 1px;"><?php echo ucfirst($customer['resides_address']) ;?>, <?php echo ucfirst($customer['city_id'])." " ?: '-';?></span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 55px;"> Email*: </span>
                                            <span style="display: block; width: 86%; border-bottom: solid 1px;"><?php echo ucfirst($customer['email']) ;?> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 173px;"> Segment: </span>
                                            <span style="display: block; width: 55%; border-bottom: solid 1px;"><?php echo ucfirst($appformD['department']) ;?></span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 55px;"> Carte N° </span>
                                            <span style="display: block; width: 86%; border-bottom: solid 1px;"> <?php echo ucfirst($customer['carte_bancaire']) ;?> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 173px;"> Montant:</span>
                                            <span style="display: block; width: 78%; border-bottom: solid 1px; font-size: 13px;"><?php echo number_format($appformD['loan_amt'],0,',',' ');?> Amortissement en <?php echo $appformD['loan_term'];?> fois, un mois après la date de signature. Frais de dossier XAF 37.000 HT </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="width: 90%; margin: auto; border-collapse: collapse; border: solid 1px; border-top: 0;">
                            <tbody>
                                <tr>
                                    <td style="font-size: 14px; width: 75%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate; vertical-align: top;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 220px;"> Nom de l'employeur: </span>
                                            <span style="display: block; width: 68%; border-bottom: solid 1px;"><?php echo ucfirst($customer['employer_name']) ;?></span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; vertical-align: top;">
                                        <span style="font-weight: normal; display: flex; align-items: center; margin-bottom: 3px;">
                                            <span style="width: 170px;">Administration Publique</span>
                                            <span style="display: block; width: 15px; height: 15px;">
                                                <input type="checkbox" style="width: 15px; height: 15px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </span>
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="width: 170px;">Entreprise Privée Cliente</span>
                                            <span style="display: block; width: 15px; height: 15px;">
                                                <input type="checkbox" style="width: 15px; height: 15px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; width: 75%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate; vertical-align: top;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 220px;"> Date d'entrée chez l'employeur: </span>
                                            <span style="display: block; width: 68%; border-bottom: solid 1px;"><?php echo date("d-m-Y",strtotime($customer['how_he_is_been_with_current_employer']));?></span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; vertical-align: top;">
                                        <span style="font-weight: normal; display: flex; align-items: center; margin-bottom: 3px;">
                                            <span style="width: 170px;">+ de 2 ans (Fonctionnaire)</span>
                                            <span style="display: block; width: 15px; height: 15px;">
                                                <input type="checkbox" style="width: 15px; height: 15px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </span>
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="width: 170px;">+ de 1 an (Secteur privé)</span>
                                            <span style="display: block; width: 15px; height: 15px;">
                                                <input type="checkbox" style="width: 15px; height: 15px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; width: 75%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate; vertical-align: top;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 220px;"> Date ouverture de compte: </span>
                                            <span style="display: block; width: 68%; border-bottom: solid 1px;"><?php echo date("d-m-Y",strtotime($customer['opening_date']));?></span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px; width: 50%; padding: 5px; text-align: left; line-height: 22px; vertical-align: top;">
                                        <span style="font-weight: normal; display: flex; align-items: center; margin-bottom: 3px;">
                                            <span style="width: 170px;">+ de 6 mois</span>
                                            <span style="display: block; width: 15px; height: 15px;">
                                                <input type="checkbox" style="width: 15px; height: 15px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <table style="width: 100%; border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: 14px; width: 60%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 220px;"> Solde du CAV* : </span>
                                                            <span style="display: block; width: 58%; border-bottom: solid 1px;"> <?php echo $risk_data[0]->value;?></span>
                                                        </div>
                                                    </td>
                                                    <td style="font-size: 14px; width: 40%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 185px;"> Particularités CTX :</span>
                                                            <span style="display: block; width: 86%; border-bottom: solid 1px;"><?php  echo $customer['special_observation'];?></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-bottom: 10px;">
                                        <table style="width: 100%; border-collapse: collapse;">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: 14px; width: 60%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 220px;"> Avoirs contrôlés : </span>
                                                            <span style="display: block; width: 58%; border-bottom: solid 1px;"> (PEC + PEAV + PERAZ + DAT)</span>
                                                        </div>
                                                    </td>
                                                    <td style="font-size: 14px; width: 40%; padding: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 186px;"> Montant cumulé* :</span>
                                                            <span style="display: block; width: 86%; border-bottom: solid 1px;"><?php //echo number_format($appformD['loan_amt'],0,',',' ');?></span>
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
                    <td style="height: 20px;"></td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 90%; margin: auto; border-collapse: collapse;">
                            <tbody style="">
                                <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate;">
                                        <span style="font-weight: normal;"></span>
                                    </td>
                                    <td style="font-size: 14px; width: 30%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0;"><span style="font-weight: normal;">Mois précédent</span></td>
                                    <td style="font-size: 14px; width: 30%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px;">
                                        <span style="font-weight: normal;">Mois en cours</span>
                                    </td>
                                </tr>
                                <?php if($risk_analysis['amount_a_s1'] != "" || $risk_analysis['amount_a_s2'] != ""){
                                                    $a_s1 = json_decode($risk_analysis['amount_a_s1']);
                                                    $a_s2 = json_decode($risk_analysis['amount_a_s2']);

                                                    $i=1;
                                                    foreach($a_s1 as $key=>$s1){
                                                        if($key == "0")
                                                        {
                                                            ?>
                                                            <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate; padding-left: 5px;border-bottom: none;">
                                        <span style="font-weight: normal;"> A -** Salaire Viré + Primes </span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0; border-top: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $s1?></span>
                                    </td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-right: solid 2px; border-top: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $a_s2[$key]?></span>
                                    </td>
                                </tr>

                                                            <?php
                                                        }else{


                                                ?>
                                            <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate; padding-left: 5px;border-top: none;">
                                        <span style="font-weight: normal;">  </span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0; border-top: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $s1?></span>
                                    </td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-right: solid 2px; border-top: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $a_s2[$key]?></span>
                                    </td>
                                </tr>
                                            <?php } 

                                            $i++;
                                        }}else{?>
                                        <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate; padding-left: 5px;">
                                        <span style="font-weight: normal;"> A -** Salaire Viré + Primes </span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0; border-top: solid 2px;">
                                        <span style="font-weight: 600;"></span>
                                    </td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-right: solid 2px; border-top: solid 2px;">
                                        <span style="font-weight: 600;"></span>
                                    </td>
                                </tr>
                                    <?php   } ?>
                                    
                                    <?php   if($risk_analysis['amount_b_s1'] != "" || $risk_analysis['amount_b_s2'] != ""){
                                                    $b_s1 = json_decode($risk_analysis['amount_b_s1']);
                                                    $b_s2 = json_decode($risk_analysis['amount_b_s2']);
                                                    $j=1;
                                                    foreach($b_s1 as $key=>$bs1){
                                                        if($key == "0")
                                                        {
                                                            ?>
                                                            <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate; padding-left: 5px; border-bottom: none; border-top: none;">
                                        <span style="font-weight: normal;"> B - Échéances Mensuelles BICIG</span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0;"><span style="font-weight: 600;"><?php echo $bs1?></span></td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-right: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $b_s2[$key]?></span>
                                    </td>
                                </tr>

                                                            <?php
                                                        }else{


                                                ?>
                                            <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate; padding-left: 5px;  border-top: none;">
                                        <span style="font-weight: normal;"> </span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0;"><span style="font-weight: 600;"><?php echo $bs1?></span></td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-right: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $b_s2[$key]?></span>
                                    </td>
                                </tr>
                                            <?php } 

                                            $i++;
                                        }}else{?>
                                        <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate; padding-left: 5px; border-bottom: none; border-top: none;">
                                        <span style="font-weight: normal;"> B - Échéances Mensuelles BICIG</span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0;"><span style="font-weight: 600;"></span></td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-right: solid 2px;">
                                        <span style="font-weight: 600;"></span>
                                    </td>
                                </tr>
                                    <?php   } ?>
                                    
                                    <?php       if($risk_analysis['amount_c_s1'] != "" || $risk_analysis['amount_c_s2'] != ""){
                                                    $c_s1 = json_decode($risk_analysis['amount_c_s1']);
                                                    $c_s2 = json_decode($risk_analysis['amount_c_s2']);
                                                    $k=1;
                                                    foreach($c_s1 as $key=>$cs1){
                                                        if($key == "0")
                                                        {
                                                            ?>
                                                            <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate; padding-left: 5px; border-bottom: none; border-top: none;">
                                        <span style="font-weight: normal;"> C - Echéances Mensuelles Autres</span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0;"><span style="font-weight: 600;"><?php echo $cs1;?></span></td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-right: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $c_s2[$key];?></span>
                                    </td>
                                </tr>

                                                            <?php
                                                        }else{


                                                ?>
                                            <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate; padding-left: 5px; border-bottom: none; border-top: none;">
                                        <span style="font-weight: normal;"> </span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0;"><span style="font-weight: 600;"><?php echo $cs1;?></span></td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-right: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $c_s2[$key];?></span>
                                    </td>
                                </tr>
                                            <?php } 

                                            $i++;
                                        }}else{?>
                                        <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: left; line-height: 22px; border-collapse: separate; padding-left: 5px; border-bottom: none; ;">
                                        <span style="font-weight: normal;"> C - Echéances Mensuelles Autres</span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0;"><span style="font-weight: 600;"></span></td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-right: solid 2px;">
                                        <span style="font-weight: 600;"></span>
                                    </td>
                                </tr>
                                    <?php   } ?>
                                
                                
                                
                                <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding-left: 5px; text-align: left; line-height: 22px; border-collapse: separate;">
                                        <span style="font-weight: normal;"> Salaire Résiduel (A - (B+C))</span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0; border-bottom: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $risk_analysis['total_s1'] ;?></span>
                                    </td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; font-weight: bold; border-bottom: solid 2px; border-right: solid 2px;">
                                        <span style="font-weight: 600;"><?php echo $risk_analysis['total_s2'] ;?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding-left: 5px; text-align: center; line-height: 22px; border-collapse: separate; border: none; vertical-align: top;">
                                        <span style="font-weight: 600;"> Salaire Résiduel Moyen =</span>
                                    </td>
                                    <td style="font-size: 14px; width: 20%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; border-spacing: 0; border: none; vertical-align: top;">
                                        <div style="display: flex; align-items: center; justify-content: space-between;">
                                            <span style="font-weight: normal; display: flex; flex-direction: column;"><span style="border-bottom: solid 1px;">S1+ S2</span><span>2</span></span>
                                            <span style="font-weight: normal;">Soit: XAF</span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 0; text-align: center; line-height: 22px; font-weight: bold; border-bottom: solid 2px; border: none; vertical-align: top;">
                                        <span style="font-weight: 600;"><?php echo $risk_analysis['average_residual_salary'] ;?></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
				<tr><td><br></td></tr>
                <tr>
                    <td colspan="2">
                        <table style="width: 90%; margin: auto;">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="width: 100%; font-size: 14px; font-weight: normal; line-height: 19px; border: solid 1px #000; padding: 5px; vertical-align: top;">
                                        <span style="display: block; font-size: 14px; padding: 0; font-weight: 400; text-align: justify;">
                                            Date et signature du client précédée de la mention ci-après: «Lu et Approuvé, certifie que les renseignements ci-dessus déclarés sont exacts; Bon pour mise en place du concours aux conditions
                                            ci-dessus».
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 40px;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; text-align: left;">
                                        <span style="display: block; font-size: 14px; font-weight: 400;">
                                            Date et Visa du gestionnaire - Conseil
                                        </span>
                                        <span style="display: block; font-size: 12px; padding: 0; font-weight: 600; width: 235px; text-align: center;">
                                            
                                        </span>
                                    </td>
                                    <td style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; text-align: right;">
                                        <span style="display: block; font-size: 14px; font-weight: 400;"> Date et Signature du Décisionnaire</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="height: 20px;"></td>
                                </tr>
                                 
                                <tr>
                                    <td colspan="2" style="width: 100%; font-size: 14px; font-weight: normal; line-height: 19px; padding: 5px; height: 100px; vertical-align: top;">
                                        <span style="display: block; font-size: 14px; padding: 0; font-weight: 400; text-align: justify;">
                                            * A la date de la demande.&nbsp;
                                        </span>
                                        <span style="display: block; font-size: 14px; padding: 0; font-weight: 400; text-align: justify; height: 5px;"></span>
                                        <span style="display: block; font-size: 14px; padding: 0; font-weight: 400; text-align: justify;">
                                            ** Pour les salaires virés, voir les 3 derniers salaires sur l’historique du compte (à joindre).
                                        </span>
                                        <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify; height: 5px;"></span>
                                        <span style="display: block; font-size: 12px; padding: 0; font-weight: 400; text-align: justify;">
                                            <b>*** Des statistiques seront tenues en ce qui concerne l'adresse Email, pour cela vous devrez faire la photocopie de ce </b>
                                        </span>
                                        <span style="display: block; font-size: 14px; padding: 0; font-weight: 400; text-align: justify; height: 5px;"></span>
                                        <span style="display: block; font-size: 14px; padding: 0; font-weight: 400; text-align: justify;">
                                            document à transmettre au réseau pour centralisation.
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
    </body>

    <script type="text/javascript">
function myfunction(){
window.print();
}
</script>
</html>

