<?php 
$customer=(array) json_decode($appformD['customer_data']);
// echo "<pre>";
// print_r($appformD);
// print_r($riskcurrentmonthlyvrefit);

?>

<html>
    <head> </head>
    <body translate="no" style="background-color: #e2e1e0; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;">
         <table style="width: 800px; background-color: #fff; margin: 0px auto; padding: 20px;">
            <tbody>
                <tr>
                    <td>
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="position: relative; text-align: left;"><img src="<?php echo  base_url(); ?>assets/logo2.png" style="width: 38px;" /></td>
                                   <td style="position: relative;text-align: right;font-size: 18px;font-weight: bold;text-transform: uppercase;">Fiche d'Aide à la Décision</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="height: 3px;"></td>
                </tr>

                <tr>
                    <td>
                        <table style="width: 100%; border-collapse: collapse; border: solid 1px;">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="font-size: 12px; width: 100%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;">NOM ET PRENOM DU CLIENT : </span>
                                            <span style="display: block; width: 35%; border-bottom: solid 1px;"><?php echo ucfirst($customer['first_name'])." " ?: '-';?><?php echo ucfirst($customer['middle_name'])." " ?: '';?><?php echo ucfirst($customer['last_name']) ?: '-';?> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 30%;">SEGMENT : </span>
                                            <span style="display: block; width: 65%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 30%;">DUREE : </span>
                                            <span style="display: block; width: 65%; border-bottom: solid 1px;"> <?php echo $appformD['loan_term'];?> MOIS</span>
                                        </div>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 30%;">MONTANT : </span>
                                            <span style="display: block; width: 65%; border-bottom: solid 1px;"><?php echo $appformD['loan_amt'];?> F.CFA</span>
                                        </div>
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td colspan="2" style="font-size: 12px; width: 100%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;"></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="height: 3px;"></td>
                </tr>

                <tr>
                    <td>
                        <table style="width: 100%; border-collapse: collapse; border: solid 1px;">
                            <tbody>
                                <tr>
                                    <td colspan="2" style="font-size: 12px; width: 100%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;"></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;"> NOM DE L’EMPLOYEUR:&nbsp; : </span>
                                            <span style="display: block; width: 35%; border-bottom: solid 1px;"><?php echo ucfirst($customer['employer_name']);?>  </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 12px; width: 40%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;">
                                                Administration Publique <br />
                                                Entreprise Cliente :
                                            </span>
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 20px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;"> DATE D’ENTREE CHEZ L’EMPLOYEUR : </span>
                                            <span style="display: block; width: 35%; border-bottom: solid 1px;"><?php echo ($customer['employment_date']) ? (date("d-m-Y", strtotime($customer['employment_date']))) : "";?> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;">
                                                2 ans (Fonctionnaire) <br />
                                                1 an (Secteur privé) :
                                            </span>
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 20px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;"> DATE D’OUVERTURE DE COMPTE : </span>
                                            <span style="display: block; width: 35%; border-bottom: solid 1px;"><?php echo ($customer['opening_date']) ? (date("d-m-Y", strtotime($customer['opening_date']))) : ""; ?></span>
                                        </div>
                                    </td>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;">Supérieure à six mois : </span>
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 20px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;"> TAUX D’ ENDETTEMENT : </span>
                                            <span style="display: block; width: 35%; border-bottom: solid 1px;"><?php echo $risk_analysis['coefficient_score'];?> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;">Limité à 35% : </span>
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 20px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;"> PARTICULARITE : </span>
                                            <span style="display: block; width: 35%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;">Contentieux : </span>
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 20px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;"> COMPTE&nbsp; : </span>
                                            <span style="display: block; width: 35%; border-bottom: solid 1px;"><?php echo ucfirst($customer['account_no']);?></span>
                                        </div>
                                    </td>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; vertical-align: bottom;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 60%;">Incident chèque :</span>
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 20px; height: 25px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2" style="font-size: 12px; width: 100%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;"></td>
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
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; border-right: none;">
                                        <span style="font-weight: normal;">PRODUITS</span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; border-right: none; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            OUI
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            NON
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; border-right: none;">
                                        <span style="font-weight: normal;">−CARTE</span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; border-left: none; border-right: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            OUI
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            NON
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; border-right: none;">
                                        <span style="font-weight: normal;"> Si NON Souscription</span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; border-left: none; border-right: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            OUI
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            NON
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; border-right: none;">
                                        <span style="font-weight: normal;"> −SMS BANKING</span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; border-left: none; border-right: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            OUI
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                           NON
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; border-right: none;">
                                        <span style="font-weight: normal;"> Si NON Souscription</span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; border: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            OUI
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            NON
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; border-right: none;">
                                        <span style="font-weight: normal;"> −BICIGNET</span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; border-left: none; border-right: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            OUI
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            NON
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; border-right: none;">
                                        <span style="font-weight: normal;"> Si NON Souscription</span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; border: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            OUI
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            NON
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; border-right: none;">
                                        <span style="font-weight: normal;"> −BICIG MOBILE</span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; border-left: none; border-right: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            OUI
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            NON
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate; border-right: none;">
                                        <span style="font-weight: normal;"> Si NON Souscription</span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-spacing: 0; border-left: none; border-right: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            OUI
                                        </span>
                                    </td>
                                    <td style="font-size: 12px; width: 25%; border: solid 1px #000; padding: 5px; text-align: left; line-height: 18px; border-left: none;">
                                        <span style="font-weight: normal; display: flex; align-items: center;">
                                            <span style="display: block; width: 15px; height: 3px; margin-right: 5px;">
                                                <input type="checkbox"   style="width: 15px; height: 3px; display: block; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0;" />
                                            </span>
                                            NON
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%; border-collapse: collapse; border: solid 1px;">
                            <tbody>
                                <tr>
                                    <td style="font-size: 12px; width: 100%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 13%;"> GARANTIES : </span>
                                            <span style="display: block; width: 48%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 100%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 20%;"> AUTRES GARANTIES : </span>
                                            <span style="display: block; width: 41%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 24%; text-transform: uppercase;"> NANtissement espèces.&nbsp;: </span>
                                            <span style="display: block; width: 37%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 47%; text-transform: uppercase;"> Convention BICIG et l’Employeur (TRESOR PUBLIC) </span>
                                            <span style="display: block; width: 14%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 25%; text-transform: uppercase;"> Contre garantie Banque :</span>
                                            <span style="display: block; width: 36%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 12px; width: 50%; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 22%; text-transform: uppercase;"> NANtissement titres :</span>
                                            <span style="display: block; width: 39%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td>
                        <table style="width: 100%; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="font-size: 12px; padding: 5px; text-align: left; line-height: 18px; border-collapse: separate;">
                                        <span style="font-size: 18px; font-weight: bold; display: block; text-align: center;">
                                            VISA DE L'AGENT
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
   
   </body>
</html>
