<?php 
$customer=(array) json_decode($appformD['customer_data']);
// echo "<pre>";
// print_r($appformD);
// print_r($riskcurrentmonthlyvrefit);
function numberTowords($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 
    	'Un',
    	'Deux', 
    	'Trois', 
    	'Quatre', 
    	'Cinq', 
    	'Six', 
    	'Sept', 
    	'Huit', 
    	'Neuf', 
    	'Dix', 
    	'onze',
        'douze', 
        'treize', 
        'quatorze', 
        'quinze', 
        'seize', 
        'Dix-sept', 
        'Dix-huit', 
        'Dix-neuf'
    );
    $list2 = array('', 
    	'ten', 
    	'vingt', 
    	'trente', 
    	'quarante', 
    	'cinquante', 
    	'soixante', 
    	'soixante-dix', 
    	'quatre-vingt',     	 
    	'quatre-vingt dix',
    	'cent');
    $list3 = array('', 'cent', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}
function convertNumberToWord($num = false)
{
    $num = str_replace(array(',', ' '), '' , trim($num));
    if(! $num) {
        return false;
    }
    $num = (int) $num;
    $words = array();
    $list1 = array('', 
        '',
        'Deux', 
        'Trois', 
        'Quatre', 
        'Cinq', 
        'Six', 
        'Sept', 
        'Huit', 
        'Neuf', 
        'Dix', 
        'onze',
        'douze', 
        'treize', 
        'quatorze', 
        'quinze', 
        'seize', 
        'Dix-sept', 
        'Dix-huit', 
        'Dix-neuf'
    );
    $list2 = array('', 
        'ten', 
        'vingt', 
        'trente', 
        'quarante', 
        'cinquante', 
        'soixante', 
        'soixante-dix', 
        'quatre-vingt',          
        'quatre-vingt dix',
        'cent');
    $list3 = array('', 'mille', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
        'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
        'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
    );
    $num_length = strlen($num);
    $levels = (int) (($num_length + 2) / 3);
    $max_length = $levels * 3;
    $num = substr('00' . $num, -$max_length);
    $num_levels = str_split($num, 3);
    for ($i = 0; $i < count($num_levels); $i++) {
        $levels--;
        $hundreds = (int) ($num_levels[$i] / 100);
        $hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' cent' . ' ' : '');
        $tens = (int) ($num_levels[$i] % 100);
        $singles = '';
        if ( $tens < 20 ) {
            $tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
        } else {
            $tens = (int)($tens / 10);
            $tens = ' ' . $list2[$tens] . ' ';
            $singles = (int) ($num_levels[$i] % 10);
            $singles = ' ' . $list1[$singles] . ' ';
        }
        $words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
    } //end for loop
    $commas = count($words);
    if ($commas > 1) {
        $commas = $commas - 1;
    }
    return implode(' ', $words);
}

?>

<html>
    <head> </head>
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
                                                            <span style="display: block; width: 347px;">Enregistrement au Greffe Civil le : </span>
                                                            <span style="display: block; width: 100%; "><input type="text"></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Sous le numéro :  </span>
                                                            <span style="display: block; width: 100%; "><input type="text"></span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                            <br>
                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
												 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Nom : </span>
                                                            <span style="display: block; width: 100%; ">  <?php echo ucfirst($customer['last_name']) ?: '-';?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Prénom :  </span>
                                                            <span style="display: block; width: 100%; ">  <?php echo ucfirst($customer['first_name'])." " ?: '-';?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
												
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Adresse :  </span>
                                                            <span style="display: block; width: 100%; "> <?php echo ucfirst($customer['street'])." " ?: '-';?> <?php echo ucfirst($customer['alternateAddress'])." " ?: '-';?> <?php echo ucfirst($customer['state_of_issue'])." " ?: '-';?></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 347px;">Matricule :  </span>
                                                            <span style="display: block; width: 100%; "> <input type="text">  </span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; ;"><strong>Objet : </strong> </span>
                                                            <span style="display: block; width: 100%; "> <strong>cession volontaire de salaires. </strong></span>
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">Je soussigné(e) <?php echo ucfirst($customer['last_name'])." " ?: '-';?> <?php echo ucfirst($customer['first_name']) ?: '-';?>, </span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                           né(e) <span style="display: block; width: 100%;"> <?php echo " le ". date("d-m-Y",strtotime($customer['dob']));?> à <?php echo ucfirst($customer['birthplace'])." " ?: '-';?> résidant <?php echo ucfirst($customer['resides_address'])." " ?: '-';?>  * BP  <?php echo ucfirst($customer['state_of_issue'])." " ?: '-';?> et exerçant la profession de </span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
												
												<tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;"> <?php echo ucfirst($customer['employeeOccupation'])." " ?: '-';?> déclare par la présente, être débiteur envers mon employeur la Banque Internationale pour le Commerce et l’Industrie du Gabon (BICIG) de la somme provisoirement fixée à FCFA :  <?php echo number_format($appformD['tpmnt'],0,',',' ');?> ( <?php echo strtoupper(convertNumberToWord($appformD['tpmnt'])) ; ?> ), en principal, intérêts et accessoires.</span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">En effet, le  <?php echo date("d-m-Y",strtotime($appformD['cdate'])) ;?> , la BICIG m’a accordée un prêt de FCFA <?php echo $appformD['loan_amt'] ; ?> ( <?php echo strtoupper(convertNumberToWord($appformD['loan_amt'])) ; ?> ) au taux de   <?php echo $appformD['loan_interest'] ; ?>  % destiné à financer  <?php echo strtoupper($appformD['loan_object']);?></span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">Je déclare volontairement par le présent acte, céder à la BICIG, ce qui est accepté par son représentant ès-qualité, la portion cessible disponible de mes rémunérations conformément à la procédure de la cession des rémunérations prévue à l’article 161 et suivants du code du travail et aux articles 205 à 212 de l’AUO portant organisation des procédures simplifiées de recouvrement et des voies d’exécution.</span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                  <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">J’autorise par conséquent mon employeur la (e)  <?php echo ucfirst($customer['employer_name'])." " ?: '-';?> à prélever sur mon salaire la somme de FCFA  <?php echo number_format($appformD['pmnt'],0,',',' ');?> ( <?php echo strtoupper(convertNumberToWord($appformD['pmnt'])) ; ?> ) Pendant <?php echo strtoupper($appformD['loan_term']);?>  mois, jusqu’au remboursement total de ma dette et de reverser ladite somme sur mon compte de remboursement n° <?php echo ucfirst($customer['account_no'])." " ?: '-';?> </span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                 <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">En cas de résiliation de mon contrat de travail, j’autorise mon employeur à prélever sur l’ensemble de mes droits les sommes dues à ce jour dans les limites autorisées par la législation en vigueur. Mandat est également donné au liquidateur désigné, dans le cadre d’une procédure collective, pour désintéresser la BICIG en prélevant sur l’ensemble de mes droits à hauteur de la quotité cessible les sommes dues au titre du prêt ci-dessus mentionné.</span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                  <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">La présente cession n’opère pas novation au sens de l’article 1271 du code civil relativement à ma dette. </span> 
                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="2" style="height: 5px; width: 100%;"></td>
                                                </tr>
                                                  <tr>
                                                    <td colspan="2" style="font-size: 15px; font-weight: normal;">
                                                        <div style="display: flex;">
                                                            <span style="display: block; width: 100%;">Le présent acte est établi pour servir et valoir ce que de droit.</span> 
                                                        </div>
                                                    </td>
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
                            <tbody style="">
							<tr>
                                                    <td colspan="3" style="height: 15px; width: 100%;"></td>
                                                </tr>
							<tr>
                                    <td colspan="2" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px;"></td>
                                    <td colspan="1" style="width: 50%; font-size: 16px; font-weight: normal; line-height: 19px; text-align: left;">
                                        <span style="display: block; font-size: 15px; font-weight: 600;">
                                            Fait à <span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"></span> , le <span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"></span>/<span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"></span>/<span style="display: inline-block; margin: 0px 5px;  min-width:50px;  border-bottom: dashed 1px;"></span>
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
                                                            Le salarié <br />
                                                            Signature
                                                        </span>
                                                    </td>
                                                    <td style="font-size: 14px; width: 20%; padding: 10px; text-align: center; line-height: 22px; border-spacing: 0;">
                                                        <span style="font-weight: normal;">
                                                            L’employeur <br />
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
                                            <li>Signature précédée de la mention « Bon pour cession de salaire à hauteur de FCFA : …… (en chiffre et en lettre) ».</li>
                                            <li>Le Cédant remettra l’acte dûment enregistré à la BICIG qui le présentera à son employeur pour que celui-ci puisse signer et procéder aux retenues.</li>
                                            <li>Enregistrement au greffe du Tribunal compétent.</li>
                                                 </ul>
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
