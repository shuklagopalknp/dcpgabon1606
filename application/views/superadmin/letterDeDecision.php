<?php 
$customer=(array) json_decode($appformD['customer_data']);
// echo "<pre>";
// print_r($appformD);
// print_r($riskcurrentmonthlyvrefit);
$convert=new ConvertNumberToText(); 


?>

<html>
    <head>
        <style>
    @page {
    margin: 0;
}
    </style> </head>
    <body translate="no" style="background-color: #fff; font-family: Open Sans, sans-serif; font-size: 100%; font-weight: 400; line-height: 1.4; color: #000; margin: 0;">
        <table style="width: 800px; background-color: #fff; margin: 0px auto;" >
            <tbody>
                <tr>
                    <td>
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="height: 00px; width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td style="width: 100%; text-align: center;">
                                        <span style="font-weight: bold; font-size: 17px; border: solid 1px #000; padding: 10px;">DECLARATION DE CESSION VOLONTAIRE DE SALAIRE</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 100%; vertical-align: top; padding-right: 10px;">
                                        <table style="width: 100%;">
                                            <tbody>
                                                
                                                <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Enregistrement au Greffe??Civil le : </span>
                                                            <span style="display: block; width: 100%; "><input type="text"></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Sous le num??ro??:  </span>
                                                            <span style="display: block; width: 100%; "><input type="text"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                            <br>
                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
												 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Nom??: </span>
                                                            <span style="display: block; width: 100%; ">  <?php echo ucfirst($customer['last_name']) ?: '-';?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Pr??nom??:  </span>
                                                            <span style="display: block; width: 100%; ">  <?php echo ucfirst($customer['first_name'])." " ?: '-';?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
												
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Adresse??:  </span>
                                                            <span style="display: block; width: 100%; "> <?php echo ucfirst($customer['street'])." " ?: '-';?> <?php echo ucfirst($customer['alternateAddress'])." " ?: '-';?> <?php echo ucfirst($customer['state_of_issue'])." " ?: '-';?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Matricule??:  </span>
                                                            <span style="display: block; width: 100%; "> <input type="text">  </span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
                                                 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; ;"><strong>Objet??: </strong> </span>
                                                            <span style="display: block; width: 100%; "> <strong>cession volontaire de salaires. </strong></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">Je soussign??(e) <?php echo ucfirst($customer['last_name'])." " ?: '-';?> <?php echo ucfirst($customer['first_name']) ?: '-';?>, </span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                           n??(e) <span style="display: block; width: 100%;"> <?php echo " le ". date("d-m-Y",strtotime($customer['dob']));?> ?? <?php echo ucfirst($customer['birthplace'])." " ?: '-';?> r??sidant <?php echo ucfirst($customer['resides_address'])." " ?: '-';?> ??* BP  <?php echo ucfirst($customer['state_of_issue'])." " ?: '-';?> et exer??ant la profession de </span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
												
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;"> <?php echo ucfirst($customer['employeeOccupation'])." " ?: '-';?> d??clare par la pr??sente, ??tre d??biteur envers mon employeur la Banque Internationale pour le Commerce et l???Industrie du Gabon (BICIG) de la somme provisoirement fix??e ?? FCFA??:  <?php echo number_format($appformD['tpmnt'],0,',',' ');?> ( <?php echo strtoupper($convert->Convert($appformD['tpmnt'])) ; ?> ), en principal, int??r??ts et accessoires.</span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
                                                 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">En effet, le  <?php echo date("d-m-Y",strtotime($appformD['cdate'])) ;?> , la BICIG m???a accord??e un pr??t de FCFA <?php echo $appformD['loan_amt'] ; ?> ( <?php echo strtoupper($convert->Convert($appformD['loan_amt'])) ; ?> ) au taux de   <?php echo $appformD['loan_interest'] ; ?>  % destin?? ?? financer  <?php echo strtoupper($appformD['loan_object']);?></span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
                                                 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">Je d??clare volontairement par le pr??sent acte, c??der ?? la BICIG, ce qui est accept?? par son repr??sentant ??s-qualit??, la portion cessible disponible de mes r??mun??rations conform??ment ?? la proc??dure de la cession des r??mun??rations pr??vue ?? l???article 161 et suivants du code du travail et aux articles 205 ?? 212 de l???AUO portant organisation des proc??dures simplifi??es de recouvrement et des voies d???ex??cution.</span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
                                                  <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">J???autorise par cons??quent mon employeur la (e)  <?php echo ucfirst($customer['employer_name'])." " ?: '-';?> ?? pr??lever sur mon salaire la somme de FCFA  <?php echo number_format($appformD['pmnt'],0,',',' ');?> ( <?php echo strtoupper($convert->Convert($appformD['pmnt'])) ; ?> ) Pendant <?php echo strtoupper($appformD['loan_term']);?>  mois, jusqu???au remboursement total de ma dette et de reverser ladite somme sur mon compte de remboursement n?? <?php echo ucfirst($customer['account_no'])." " ?: '-';?> </span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
                                                 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">En cas de r??siliation de mon contrat de travail, j???autorise mon employeur ?? pr??lever sur l???ensemble de mes droits les sommes dues ?? ce jour dans les limites autoris??es par la l??gislation en vigueur. Mandat est ??galement donn?? au liquidateur d??sign??, dans le cadre d???une proc??dure collective, pour d??sint??resser la BICIG en pr??levant sur l???ensemble de mes droits ?? hauteur de la quotit?? cessible les sommes dues au titre du pr??t ci-dessus mentionn??.</span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
                                                  <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">La pr??sente cession n???op??re pas novation au sens de l???article 1271 du code civil relativement ?? ma dette. </span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
                                                </tr>
                                                  <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">Le pr??sent acte est ??tabli pour servir et valoir ce que de droit.</span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height:3px; width: 100%;"></td>
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
                                                    <td colspan="3" style="height: 15px; width: 100%;"></td>
                                                </tr>
							<tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;"></td>
                                    <td colspan="1" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; text-align: left;">
                                        <span style="display: block; font-size: 15px; font-weight: 600;">
                                            Fait ?? <span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"></span> , le <span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"></span>/<span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"></span>/<span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"></span>
                                        </span>
                                        <span style="display: block; font-size: 15px; padding: 0; font-weight: 400;  height:10px;"></span>
                                        <span style="display: block; font-size: 15px; padding: 0; font-weight: 400;">
                                            En 5 exemplaires1
                                        </span>
                                    </td>
                                </tr>
								<tr>
                                                    <td colspan="3" style="height: 30px; width: 100%;"></td>
                                                </tr>
                                <tr>
                                    <td colspan="3" style="font-size: 15px; text-align: left; line-height: 21px;">
                                        
                                        <table style="width: 100%; border-collapse: collapse;">
                                            <tbody style="">
                                                <tr>
                                                    <td style="font-size: 14px; width: 40%; padding: 10px; text-align: center; line-height: 22px; border-collapse: separate;">
                                                        <span style="font-weight: normal;">
                                                            Le salari?? <br />
                                                            Signature
                                                        </span>
                                                    </td>
                                                    <td style="font-size: 14px; width: 20%; padding: 10px; text-align: center; line-height: 22px; border-spacing: 0;">
                                                        <span style="font-weight: normal;">
                                                            L???employeur <br />
                                                            Signature et cachet
                                                        </span>
                                                    </td>
                                                    <td style="font-size: 14px; width: 40%; padding: 10px; text-align: center; line-height: 22px;">
                                                        <span style="font-weight: normal;">
                                                            Le greffier <br />
                                                            Signature et cachet
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <ul style="font-size: 15px; line-height: 25px; list-style: decimal; margin: 0;    padding-left: 15px;">
                                            <li>Montant en chiffre et en lettres.</li>

                                            <li>Fait en 5 exemplaires, 1 client, 3 BICIG, 1 greffe.</li>
                                            <li>Signature pr??c??d??e de la mention ????Bon pour cession de salaire ?? hauteur de FCFA??: ????????(en chiffre et en lettre) ??.</li>
                                            <li>Le C??dant remettra l???acte d??ment enregistr?? ?? la BICIG qui le pr??sentera ?? son employeur pour que celui-ci puisse signer et proc??der aux retenues.</li>
                                            <li>Enregistrement au greffe du Tribunal comp??tent.</li>
                                                 </ul>
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
