<?php 
$customer=(array) json_decode($appformD['customer_data']);
// echo "<pre>";
// print_r($appformD);
// print_r($riskcurrentmonthlyvrefit);

?><html><head> </head>
    <body translate="no" style="background-color: #fff; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;">
        <table style="width: 800px; background-color: #fff; margin: 0px auto;  ">
            <tbody>
                <tr>
                    <td>
                        <table style="width: 100%;">
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
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 100%; text-align: center;">
                                        <span style="font-weight: bold; font-size: 20px;">BULLETIN INDIVIDUEL D'ADHESION N°</span>
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
                                        <table>
                                            <tbody>
                                                
                                                <tr>
                                                    <td style="font-size: 14px; font-weight: bold; width: 26%;">L'ORGANISME PRETEUR :</td>
                                                    <td style="font-size: 14px; font-weight: bold; border-bottom: dotted 1px #000;"><span style="font-weight: normal;"> </span></td>
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
                        <table style="width: 100%; border-collapse: collapse;">
                            <tbody>
                                
                                <tr>
                                    <td style="font-size: 13px;width: 100%;padding: 5;text-align: center; line-height: 18px;border-collapse: separate;border: solid 2px #000;border-bottom: none;">
                                        <span style="font-weight: bold;">Renseignements relatifs à la personne à assurer</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                             <table style="width: 100%;border-collapse: collapse;border: solid 2px #000;">
                            <tbody style="
">
                                <tr>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 30%;">NOM(S) : : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> <?php echo ucfirst($customer['middle_name'])." " ?: '';?><?php echo ucfirst($customer['last_name']) ?: '-';?> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-spacing: 0;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 40%;">Profession : </span>
                                            <span style="display: block; width: 60%; border-bottom: solid 1px;"> <?php echo $customer['occupation'];?> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 30%;">Prénoms : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"><?php echo ucfirst($customer['first_name'])." " ?: '-';?> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-spacing: 0;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 40%;">exercée Adresse : </span>
                                            <span style="display: block; width: 60%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;padding-bottom: 10px;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 30%;">naissance : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"><?php echo $customer['dob'];?> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        
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
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: center; line-height: 18px;border-collapse: separate;padding-bottom: 0;">
                                        <span style="font-weight: bold;">Caractéristiques du prêt :</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%;border-collapse: collapse;border: solid 2px;">
                            <tbody>
                                <tr>
                                    <td style="font-size: 14px;width: 100%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">Dated'octroi:Ca : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 100%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">pitalgaranti:Coef : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">Ficient : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">Periodicite : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 50%;padding: 5px 5px 10px 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">Prime :</span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                            <table style="width: 100%; border-collapse: collapse;">
                            <tbody style="">
                                <tr>
                                    <td style="font-size: 14px;width: 25%;border: solid 2px #000;padding: 5px;text-align: center; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Nombre de termes de remboursement</span>
                                    </td>
                                    <td style="font-size: 14px;width: 25%;border: solid 2px #000;padding: 5px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal;">Montant de chaque terme</span>
                                    </td>
                                    <td style="font-size: 14px;width: 25%;border: solid 2px #000;padding: 5px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">Date de la première échéance</span>
                                    </td>
                                    <td style="font-size: 14px;width: 25%;border: solid 2px #000;padding: 5px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">Date de la dernière échéance</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 25%;border: solid 2px #000;padding: 10px;text-align: center; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;"> </span>
                                    </td>
                                    <td style="font-size: 14px;width: 25%;border: solid 2px #000;padding: 10px;text-align: center; line-height: 18px;border-spacing: 0;"><span style="font-weight: normal;"></span></td>
                                    <td style="font-size: 14px;width: 25%;border: solid 2px #000;padding: 10px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;"> </span>
                                    </td>
                                    <td style="font-size: 14px;width: 25%;border: solid 2px #000;padding: 10px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;"> </span>
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
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: bold;">Questionnaire simplifié :</span>
                                    </td>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-spacing: 0;"><span style="font-weight: bold;">Répondre par oui ou non aux questions</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table style="width: 100%;border-collapse: collapse;border: solid 2px;">
                            <tbody>
                                <tr>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">1. Taile : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-spacing: 0;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">Taile : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">2. Etes : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-spacing: 0;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">Taile : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;padding-bottom: 10px;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">3. Taile : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                        </div>
                                    </td>
                                    <td style="font-size: 14px;width: 50%;padding: 5px;text-align: left; line-height: 18px;border-spacing: 0;padding-bottom: 10px;">
                                        <div style="display: flex;">
                                            <span style="display: block; width: 17%;">Taile : </span>
                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
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
                                    <td style="font-size: 14px;padding: 0;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">
                                            Je déclare accepter d'être assuré pour ce prêt en CAS DE DÉCÈS ou INVALIDITÉ TOTALE ET DÉFINITIVE, suivant les modalités de la Convention d'Assurances Collectives à laquelle a adhéré l'organisme
                                            prêteur qui sera bénéficiaire des sommes assurées en cas de décès.
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 5px;"></span>
                                        <span style="font-weight: normal;">
                                            Le Proposant certifie que les déclarations ci-dessus devant servir de base à l'assurance sont exactes, complètes et sin­ cères. Toute réticence ou fausse déclaration entraînerait la nullité du
                                            contrat conformément aux articles 18 et 19 du Code CIMA.
                                        </span>
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
                                    <td style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; border-top: solid 2px; padding-top: 20px; border-right: solid 2px; padding-bottom: 20px;">
                                        <span style="display: block; font-size: 14px; font-weight: bold;">RESERVE A LA SOCIETE</span><span style="display: block; font-size: 14px;">acceptation des risques</span>
                                    </td>
                                    <td style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; text-align: center;">
                                        <table style="width: 100%;">
                                            <tbody>
                                                <tr>
                                                    <td style="font-size: 14px; width: 50%; padding: 10px; text-align: left;  line-height: 18px; border-collapse: separate;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 17%;">A : </span>
                                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                                        </div>
                                                    </td>
                                                    <td style="font-size: 14px; width: 50%; padding: 10px; text-align: left;  line-height: 18px; border-collapse: separate;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 17%;">le : </span>
                                                            <span style="display: block; width: 70%; border-bottom: solid 1px;"> </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <span style="display: block; font-size: 12px; padding: 0; font-weight: 400;">
                                            Faire précéder la signature de la mention "Lu et Approuvé"
                                        </span>
                                        <span style="display: block; font-size: 13px; font-weight: 600;">
                                            Signature de l’Emprunteur
                                        </span>
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
                                    <td style="font-size: 14px; padding: 10px; text-align: center;  line-height: 18px; border-collapse: separate;">
                                        <span style="display: block; font-size: 13px; font-weight: 1000;">SUNU Assurances Vie Gabon </span>
                                        <span style="font-weight: normal; display: block; height: 5px;"></span>
                                        <span style="font-weight: normal;">
                                            Entreprise régie par le Code des assurances - Société Anonyme au capital de 2.000.000 .000 F.CFA entièrement libéré RCCM : Libreville N° 2003 B 2977 - N° Statistique : 079575 Z - N° NIF 795 575/P
                                            Av. du Colonel Parant - BP 2137 Libreville - Gabon Tél. : (+241) 01 74 34 34 - Fax : (+241) 01 72 48 57 - E-mail : gabon.sunuvie@sunu-group.com - Site Web : www.sunu-group.com
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                
                
                </tbody>
        </table>
                <table style="width: 800px; background-color: #fff; margin: 100px auto; height:1000px; ">
            <tbody>
                <tr>
                    <td>
                        <table style="width: 100%; border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="font-size: 14px; padding: 10px; text-align: left;  line-height: 18px; border-collapse: separate;">
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
                        <table style="width: 100%;">
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
                                    <td style="font-size: 14px; padding: 10px; text-align: left;  line-height: 18px; border-collapse: separate;">
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
   <table style="width: 800px;background-color: #fff;margin: 0px auto;">
            <tbody>
                <tr>
                    <td>
                        <table style="width: 100%;">
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
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 100%; text-align: center;">
                                        <span style="font-weight: bold; font-size: 20px;">QUESTIONNAIRE MEDICAL N° 3 a</span>
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
                                        <table>
                                            <tbody>
                                                
                                                <tr>
                                                    <td style="font-size: 15px; font-weight: bold;">Contrat N" : <span style="font-weight: normal;"></span></td>
                                                    <td style="font-size: 15px; font-weight: bold;">Adhésion : <span style="font-weight: normal;"></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 15px; font-weight: bold;">Agence : <span style="font-weight: normal;"><?php echo $appformD['branch_name'];?></span></td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="2" style="width: 100%; font-size: 14px; font-weight: normal; line-height: 19px; border: solid 1px #000; padding: 10px;">
                                                        <span style="display: block; font-size: 14px; padding: 0; font-weight: 400; text-align: justify;">
                                                            La personne à assurer doit répondre personnellement, clairement, sans rature ni surcharge à chaque question. Un simple trait de plume n'est pas suffisant. Mettre une croix dans la
                                                            case vierge précédant la réponse qui convient En cas de réponse positive donnez les pré­ cisions demandées en utilisant si nécessaire une feuille annexe.
                                                        </span>
                                                    </td>
                                                </tr>

                                                
                                                <tr>
                                                    <td style="font-size: 15px; font-weight: bold;">Nom : <span style="font-weight: normal;"> <?php echo ucfirst($customer['middle_name'])." " ?: '';?><?php echo ucfirst($customer['last_name']) ?: '-';?></span></td>
                                                    <td style="font-size: 15px; font-weight: bold;">Prénoms : <span style="font-weight: normal;"> <?php echo ucfirst($customer['first_name'])." " ?: '-';?></span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                <tr>
                                                    <td style="font-size: 15px; font-weight: bold;">Date de naissance : <span style="font-weight: normal;"><?php echo $customer['dob'];?></span></td>
                                                    <td style="font-size: 15px; font-weight: bold;">Profession exercée : <span style="font-weight: normal;"><?php echo $customer['occupation'];?></span></td>
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
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Avez-vous déjà été refusé, ajourné ou supprimé par un précédent contrat d'assurance de personnes ?</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">(si oui,date, motif et nom de la Compagnie)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Etes-vous actuellement titulaire d'assurance de personnes ? </span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">(si oui, date d'effet, nom de la Compagnie, montants et garanties)</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Avez-vous été victime d'accident (automobile ou autre) ?</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 5px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 5px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">(localisation des blessures, y a-t-ileu perte de connaissance, durée, dates, séquelles)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">
                                            <span style="display: block; min-height: 24px;">Pratiquez-vous des sports ?</span>
                                            <span style="display: block;">AU COURS DES 10 DERNIÈRES ANNÉES Avez-vous fait des séjours en milieu hospitalier ou assimilé ?</span>
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 5px;text-align: center; line-height: 18px;border-spacing: 0;vertical-align: top;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; min-height: 24px;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center; /* min-height: 66px; */">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 5px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">
                                            D en amateur 0 en compétition <br>
                                            Dates, Motifs, Résultats Préciser les interventions chirurgicales
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 5px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">
                                            <span style="display: block; height: 24px;">• Avez-vous subi : </span>

                                            <span style="display: block; min-height: 24px;">• des examens médicaux </span>
                                            <span style="display: block; min-height: 24px;">• sang, urines </span>

                                            <span style="display: block; min-height: 24px;">• électrocardiogramme </span>

                                            <span style="display: block; min-height: 24px;">• radiographies </span>
                                            <span style="display: block; min-height: 70px;">• test de dépistage (toxoplasmose, hépatite B, SIDA, etc.) Un traitement spécialisé tel que : </span>
                                            <span style="display: block; min-height: 44px;">• rayons, chimiothérapie, immunothérapie ou cobaltothérapie </span>
                                            <span style="display: block; min-height: 44px;">• des transfusions de sang ou des dérivés sanguins.</span>
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 5px;text-align: center; line-height: 18px;border-spacing: 0;vertical-align: top;">
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
                                    <td style="font-size: 14px; width: 40%; border: solid 1px #000; padding: 10px; text-align: center;  line-height: 18px;"><span style="font-weight: normal;"></span></td>
                                </tr>
                                

                                <tr>
                                    <td colspan="3" style="font-size: 13px;padding: 5;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">
                                            SUNU Assurances Vie - Gabon Enttepnse régie par le Code des assurances - Société Anonyme au capital de 1.000.000 000 F.CFA entièrement hberé
                                            <br>
                                            RCCM :Libreville N° 2003 B 2977 - N° Statistique :079575 Z - N° NIF 795 5751P Av du Colonel Parant - BP 2137 Libreville - Gabon Tél ·(+241) 01 74 34 34 - Fax (+241) 01 72 48 57 - E-mall
                                            gabon.sunuvie@sunu.group.com - Site Web :www sunu-group corn
                                        </span>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Etes-vous actuellement en arrêt de travail ?</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">Depuis quand ? Motif,date de repnse envisagée.</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Durant les 5 dernières années,avez-vous dûinterrompre 0 Non 1Oui Quand ? Durée de chaque arrèt, motif. votre travailpendant plus de 3 semaines ?</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;"><span style="font-weight: normal;">Quand ? Durée de chaque arrèt,</span></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Quel sont vos taille et poids 1 l m L] kg</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;"><span style="font-weight: normal;"> </span></td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">Avez-vous grossi ou maigri de plus de 5 kgs depuis • Quel sont vos taille et poids 1 l m L] kg 6 mois ? Si oui,de combien</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">
                                            SOUFFREZ-VOUS OU AVEZ-VOUS ÉTÉ ATTEINT DE <br>
                                            ◦ Maladies de l'appareil respiratoire '[] Non C Oui (Toux de longue durée, crachement de sang.<br>
                                            essoufflements, affection des poumons•..)
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;">
                                        <span style="font-weight: normal;">Préciser la nature exacte, la date de découverte, les traitements, l'évolution :</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Maladles de l'appareil cardiovasculaire 0 Non O Oui (Infarctus, hypertension artérielle,artérite,..)</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;"><span style="font-weight: normal;"> </span></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;"> ◦ Maladies de !'appareil digestif 0 Non ùOui (Jaunisse, hépatite, diarrhée chronique,..•)</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;"><span style="font-weight: normal;"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Maladles de l'apparell urinaire et génital (Albuminurie et sang dans les urines,maladies sexuellement transmissibles,...)</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;"><span style="font-weight: normal;"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Maladies du système nerveux 0 Non O Oui (Paralysies, méningite, épilepsie,...)</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;"><span style="font-weight: normal;"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Maladies du sang,des ganglions et de la rate (Anémie,présence de ganglions anormaux, hémoglobinopathies et crises hémolytiques,...)</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;"><span style="font-weight: normal;"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Maladles endocriniennes ou métaboliques 0 Non O Oui (Diabète, goutte, anomalies de la thyroïde,...)</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;"><span style="font-weight: normal;"></span></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Maladles des os et des artlculatlons ,:JNon 0 Oui (Arthrose, rhumatismes divers,...)</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;"><span style="font-weight: normal;"> </span></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: left; line-height: 18px;border-collapse: separate;">
                                        <span style="font-weight: normal;">Maladies de la peau D Non O Oui (Ablation de grains de beauté, verrues fréquentes, autres lésions,...)</span>
                                    </td>
                                    <td style="font-size: 14px;width: 20%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;border-spacing: 0;">
                                        <span style="font-weight: normal; display: flex; align-items: center; justify-content: center;">
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;"> Non <span style="width: 20px;"></span>
                                            <input type="checkbox" style="width: 15px; height: 15px; border: solid 1px #000; margin: 0; border-radius: 0px; margin: 0; margin-right: 3px;">Oui
                                        </span>
                                    </td>
                                    <td style="font-size: 14px;width: 40%;border: solid 1px #000;padding: 3px;text-align: center; line-height: 18px;"><span style="font-weight: normal;"></span></td>
                                </tr>

                                

                                <tr>
                                    <td colspan="3" style="font-size: 12px;padding: 3px;text-align: left; line-height: 18px;">
                                        <span style="font-weight: normal; text-align: justify; display: block;">
                                            Je certifie avoir répondu sincèrement sans aucune réticence et n avoir rien dissimulé sur mon état de sanlé passé ou el et prends acte que 1oute réllcence ou fausse déclara­ tion de ma part
                                            en1ralnera la nullilé du conlrat. J autorise expressémen1 la Compagnie à prendre taules informations qu'elle jugerait ullles el nécessaires auprès des médecins qui m'ont soigné J'autorise ces
                                            médecins à communiquer à la Compagnie tous les renseignemen1s demandés
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 5px;"></span>
                                        <span style="font-weight: normal; text-align: justify; display: block;">Extrait de l'artlcle 18 du Code CIMA :Fausse déclarationlntentlonnelle :.anctlon•</span>
                                        <span style="font-weight: normal; text-align: justify; display: block;">
                                            ndépendamment des causes ordinaires de nullité. et sous réserve des dispositions de l'art. 80, le contrai d'assurance est nul en cas de rélicence ou de fausse déclaration ln1en­ lionnelle dela
                                            part do l'assuré, quand celte réticence ou cette rausse déclaration change l'objet du risque ou en diminue l'opln1on pour l'assureur alors même quele risque omis ou dénaturé par l'assuré a été
                                            sans influence sur le sinistre Les primes payées demeurent alors acquises à l'assureur, qui a droit au paiement de toutes les primes échues àli re de dommages et in1érèls. Les dispositions du
                                            second alinéa du présenl article ne sonl pas applicables aux assurances sur la vie
                                        </span>
                                        <span style="font-weight: normal; display: block; height: 5px;"></span>
                                        <span style="font-weight: normal; text-align: justify; display: block;">Extrait IMllartlcla 19 du Code CIMA :Fau11ae déclaratlon nonlnlanUonnella</span>
                                        <span style="font-weight: normal; text-align: justify; display: block;">
                                            L'omission ou la déclaration inexacte de ra part de l'assuré dont la mauvaise 101 n ast pas établie n'entraine pas la nullité de 1assurance SI elle est constatée avant taut sinistre. l'assureur
                                            a·le droit soit de mainlenir le contrat, moyennent une augmentation de prime acceplée par l'assuré soit de résilierle conlret dix jours après notification adressée à l'as· suré parlettre
                                            recommandée ou contresignée, en reslituanlla portion dela prime payée pour le temps ou l'assurance ne court plus. Dans te ces ou la cons1a1ation n·a lieu qu'après un siiiistre. l'ndemnité est
                                            réduhe en proportion du taux des primes payées par rapport aux taux des primes qui auraient élé dues,si les risques avalent é1é complètement e1 exac- 1enient déclarés.
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="height: 20px;"></td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;"></td>
                                    <td colspan="1" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; text-align: center;">
                                        <span style="display: block; font-size: 13px; font-weight: 600;">
                                            Signature de l’Emprunteur
                                        </span>
                                        <span style="display: block; font-size: 12px; padding: 0; font-weight: 400;">
                                            Précédée de la mention "Lu et Approuvé ...)
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>

</body></html>