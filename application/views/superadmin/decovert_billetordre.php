<?php
$dob=explode('-', $pinfo[0]["dob"]);
$dobreples=date('d-m-Y', strtotime($pinfo[0]["dob"]));
$d=array($dobreples);
$main_phone=$adinfo[0]["main_phone"];
$mp=array($main_phone);
$empinfo[0]['employer_name'];
$empdate=date('d-m-Y', strtotime($empinfo[0]['employment_date']));
$ed=array($empdate);
if(!empty($riskfsituation)){
$Ratio=$riskfsituation[0]['coeficientendettement'];
}else{$Ratio='00';}
//echo "<pre>", print_r($appformD),"</pre>";

$last=array();
$databinding=json_decode($appformD[0]['databinding']);
foreach ($databinding as $kdata ) {         		
	$last[]=$kdata->month.'-'.$kdata->years;
}
$createddate=date('23', strtotime($appformD[0]['created']));
 $DateofLastPayment = $createddate.'-'.end($last);



function convertNumberToWord($num = false)
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




//echo convertNumberToWord(number_format($appformD[0]['requested_overdraft']),0,',','');

//echo number_format($appformD[0]['requested_overdraft'],0,',','');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8"/>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/BilletOrdre/base.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/BilletOrdre/fancy.min.css"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/BilletOrdre/main.css"/>



<title></title>
</head>
<style type="text/css" media="print">
  @page { size: landscape; }
  @media print {
		  #printPageButton {
		    display: none;
		  }
		}
</style>
<div id="page-container">
<div id="pf1" class="pf w0 h0" data-page-no="1"><div class="pc pc1 w0 h0"><img class="bi x0 y0 w1 h1" alt="" src="<?php echo base_url(); ?>assets/BilletOrdre/bg1.png"/><div class="c x1 y1 w2 h2"><div class="t m0 x2 h3 y2 ff1 fs0 fc0 sc0 ls0 ws0">BILLET A ORDRE, <span class="ff2 fs1 fc1">retour sans protêt</span></div><div class="t m0 x2 h4 y3 ff1 fs1 fc2 sc0 ls0 ws0">Nous paierons contre ce billet à ordre, la somme indiquée ci-dessous à:</div><div class="t m0 x2 h5 y4 ff3 fs2 fc2 sc0 ls0 ws0"> <span class="_ _0"> </span>         </div><div class="t m0 x3 h5 y5 ff3 fs2 fc2 sc0 ls0 ws0">         </div><div class="t m0 x2 h6 y6 ff1 fs2 fc2 sc0 ls0 ws0">  <span class="ff3">     <span class="fs3">_</span></span></div><div class="t m0 x4 h5 y7 ff3 fs2 fc2 sc0 ls0 ws0">          </div></div><div class="c x5 y1 w3 h2"><div class="t m0 x2 h4 y8 ff1 fs1 fc2 sc0 ls0 ws0">AVAL</div><div class="t m0 x2 h7 y9 ff1 fs3 fc2 sc0 ls0 ws0">(Nom, Adresse et signature de l’avaliste, </div><div class="t m0 x2 h7 ya ff1 fs3 fc2 sc0 ls0 ws0">précédé de la mention <span class="ff2">&quot;Bon pour aval à </span></div><div class="t m0 x2 h7 yb ff2 fs3 fc2 sc0 ls0 ws0">hauteur du montant ci-contre<span class="ff1">&quot;)</span></div></div><div class="c x6 yc w4 h8"><div class="t m0 x7 h4 yd ff1 fs1 fc2 sc0 ls0 ws0"><?php echo number_format($appformD[0]['amount_sought_customer'],0,',',' ');?></div></div><div class="c x8 yc w5 h8"><div class="t m0 x9 h4 yd ff1 fs1 fc2 sc0 ls0 ws0">FCFA</div></div><div class="c xa ye w6 h9"><div class="t m0 xb h6 yf ff1 fs2 fc2 sc0 ls0 ws0">Montant</div></div><div class="c xc ye w7 h9"><div class="t m0 xb h6 yf ff1 fs2 fc2 sc0 ls0 ws0">Devise</div></div><div class="c x6 y10 w8 ha"><div class="t m0 xd h5 y11 ff3 fs2 fc2 sc0 ls0 ws0">BANQUE ATLANTIQUE CAMEROUN</div></div><div class="c xe y12 w9 hb"><div class="t m0 xf h6 y13 ff1 fs2 fc2 sc0 ls0 ws0">DOMICILIATION</div></div><div class="c x6 y14 wa hc"><div class="t m0 x10 hd y15 ff3 fs1 fc2 sc0 ls0 ws0"><?php echo $otherinfo[0]['field_1'] ?: '';?> <?php echo $otherinfo[0]['field_2'] ?: '';?> <?php echo $customersd[0]['account_number'] ?: '';?> <?php echo $otherinfo[0]['field_3'] ?: '';?></div></div><div class="c x11 y16 wb he"><div class="t m0 xf h6 y17 ff1 fs2 fc2 sc0 ls0 ws0">RIB Souscripteur</div></div><div class="c x6 y18 wc hf"><div class="t m0 x12 h6 y19 ff1 fs2 fc2 sc0 ls0 ws0"><?php echo "";?></div></div><div class="c x13 y1a wd hb"><div class="t m0 xd h6 y1b ff1 fs2 fc0 sc0 ls0 ws0">Fait à</div></div><div class="c x14 y18 we hf"><div class="t m0 xd h6 y19 ff1 fs2 fc2 sc0 ls0 ws0"><?php //echo $DateofLastPayment;?></div></div><div class="c x15 y1c wf h10"><div class="t m0 xb h6 y1d ff1 fs2 fc0 sc0 ls0 ws0">Echéance</div></div><div class="c x16 y18 w10 hf"><div class="t m0 xd h6 y19 ff1 fs2 fc2 sc0 ls0 ws0"><?php echo date('d/m/Y', strtotime($appformD[0]['modified'])); ?></div></div><div class="c x17 y1e w11 h11"><div class="t m0 xb h6 y1f ff1 fs2 fc0 sc0 ls0 ws0">Le</div></div><div class="c x18 y20 w12 h12"><div class="t m0 x9 h13 y21 ff4 fs2 fc2 sc0 ls0 ws0">BANQUE ATLANTIQUE CAMEROUN</div><div class="t m0 x9 h13 y22 ff4 fs2 fc2 sc0 ls0 ws0">Boulevard de la Liberte, BP 2933</div><div class="t m0 x9 h13 y23 ff4 fs2 fc2 sc0 ls0 ws0">Douala</div></div><div class="c x19 y24 w13 h14"><div class="t m0 xf h13 y25 ff4 fs2 fc2 sc0 ls0 ws0"><?php echo ucwords($appformD[0]['letter_format']) ?: ucwords(convertNumberToWord($appformD[0]['amount_sought_customer'])); ?> F CFA</div></div><div class="c x6 y26 w14 h15"><div class="t m0 x10 h16 y27 ff3 fs3 fc2 sc0 ls0 ws0"><?php echo ucfirst($pinfo[0]['first_name']) ?: '-';?> <?php echo $pinfo[0]['middle_name'] ?: ' ';?> <?php echo $pinfo[0]['last_name'] ?: '-';?></div><div class="t m0 x10 h16 y28 ff3 fs3 fc2 sc0 ls0 ws0">BP : <?php echo $adrs[0]['resides_address'] ?: '-';?> <?php echo $adrs[0]['Nom de la rue'] ?: '-';?> <?php echo $adrs[0]['city_id'] ?: '-';?> <?php echo $adrs[0]['state_id'] ?: '-';?></div><div class="t m0 x10 h16 y29 ff3 fs3 fc2 sc0 ls0 ws0">Tel : <?php echo $adinfo[0]['main_phone'] ?: '-';?></div></div><div class="c x1a y2a w15 h17"><div class="t m0 xf h18 y2b ff2 fs2 fc0 sc0 ls0 ws0">Nom &amp; adresse du souscripteur</div></div><div class="c x6 y2c w16 h19"><div class="t m0 xf h1a y2d ff2 fs3 fc2 sc0 ls0 ws0">Nom &amp; adresse du bénéficiaire:</div></div><div class="c x1b y2e w17 h1b"><div class="t m0 x1c h6 y2f ff1 fs2 fc2 sc0 ls0 ws0">Signature du souscripteur</div></div><div class="c x1d y30 w18 h1c"><div class="t m0 x1c h1d y31 ff1 fs4 fc2 sc0 ls0 ws0">TIMBRE</div></div></div><div class="pi" data-data='{"ctm":[1.000000,0.000000,0.000000,1.000000,0.000000,0.000000]}'></div>
</div>
<center>
			<button class="btn btn-primary hidden-print" id="printPageButton" onclick="myfunction()" style="position: relative;top: -64px">Print Page</button>
		</center>
</div>
<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/demo.js"></script> 

<script type="text/javascript">
	function myfunction(){
		window.print();
	}
</script>
</body>
</html>
