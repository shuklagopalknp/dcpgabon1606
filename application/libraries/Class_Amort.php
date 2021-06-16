<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Class_Amort{ 
    
 var $amount;       //amount of the loan
 var $rate;         //percentage rate of the loan
 var $years;        //number of years of the loan
 var $npmts;        //number of payments of the loan
 var $mrate;        //monthly interest rate 
 var $smrate;
 var $tpmnt;        //total amount paid on the loan
 var $tint;         //total interest paid on the loan
 var $pmnt; 
 var $cdate;
 var $postinterest; //monthly payment of the loan

//amort is the constructor and sets up the variable values
//using the three values passed to it.
function tegcal($npmts,$loan_amt,$pmnt,$rate,$fraisDosier,$age,$frais_de_assurance=0){
    $ebal = $loan_amt;
    $mrate=$rate/1200;
$ccint =0.0;
$cpmnt = 0.0;
$totalCss=0;
$totalVat=0;
for ($pnum = 1; $pnum <= $npmts; $pnum++)
{
    $bbal = $ebal;    
    $ipmnt = $bbal * $mrate;
    $ppmnt = $pmnt - $ipmnt;
    $ebal = $bbal - $ppmnt;
    $ccint = $ccint + $ipmnt;
    $cpmnt = $pmnt;
   
    // $pbint = $bbal*$this->postinterest/100/12;
    // $vbint = $pbint*19.25/100;
    $pbint = $ipmnt / 1.19;
    $vbint = $pbint*18/100; 
    $cssint = $pbint*1/100;
    $months=$npmts;
    $totalCss=$totalCss+$cssint;
    $totalVat=$totalVat+$vbint;
    // echo $totalVat."</br>";
}
$totalTax=$totalCss+$totalVat;
// echo $months;
$withoutTax=$cpmnt-($totalTax/$months);
// echo $this->amount;
 if($age<=30){
	$insuranceRate="0.42";
    }else if($age<=40){
		$insuranceRate="0.75";
	    }else if($age<=50){
		$insuranceRate="0.92";
		}else if($age<=60){
		$insuranceRate="2.06";
		}

// 	if($age>=60){
// 		$insuranceAmount=$frais_de_assurance ? $frais_de_assurance : "0.00";
// // 		$insuranceAmount=($this->loan_amt*$insuranceRate)/100;
// 		}else{
// 		    $insuranceAmount=($this->loan_amt*$insuranceRate)/100;
// 		}
$insuranceAmount=$frais_de_assurance;
$lastparameter=$loan_amt-$fraisDosier-$insuranceAmount;
// $lastparameter=$loan_amt-$fraisDosier;
$result['tauxequivalent']= self::tegcalculate($months,-$withoutTax,$lastparameter)*100;
$result['tegvalue']=$result['tauxequivalent']*12;

$result['npmts']=$npmts;
$result['loan_amt']=$loan_amt;
$result['pmnt']=$pmnt;
$result['insuranceAmount']=$insuranceAmount;
$result['fraisDosier']=$fraisDosier;
$result['age']=$age;

return $result;
}
function tegcal2($npmts,$loan_amt,$pmnt,$rate,$fraisDosier,$age,$enregistrementHT,$assurance){
    $ebal = $loan_amt;
    $mrate=$rate/1200;
$ccint =0.0;
$cpmnt = 0.0;
$totalCss=0;
$totalVat=0;
for ($pnum = 1; $pnum <= $npmts; $pnum++)
{
    $bbal = $ebal;    
    $ipmnt = $bbal * $mrate;
    $ppmnt = $pmnt - $ipmnt;
    $ebal = $bbal - $ppmnt;
    $ccint = $ccint + $ipmnt;
    $cpmnt = $pmnt;
   
    // $pbint = $bbal*$this->postinterest/100/12;
    // $vbint = $pbint*19.25/100;
    $pbint = $ipmnt / 1.19;
    $vbint = $pbint*18/100; 
    $cssint = $pbint*1/100;
    $months=$npmts;
    $totalCss=$totalCss+$cssint;
    $totalVat=$totalVat+$vbint;
    // echo $totalVat."</br>";
}
$totalTax=$totalCss+$totalVat;
// echo $months;
$withoutTax=$cpmnt-($totalTax/$months);
// echo $this->amount;
 if($age<=30){
	$insuranceRate="0.42";
    }else if($age<=40){
		$insuranceRate="0.75";
	    }else if($age<=50){
		$insuranceRate="0.92";
		}else if($age<=60){
		$insuranceRate="2.06";
		}

// 	$insuranceAmount=($loan_amt*$insuranceRate)/100;
$insuranceAmount=$assurance;
$lastparameter=$loan_amt-$fraisDosier-$insuranceAmount-$enregistrementHT;
// $lastparameter=$loan_amt-$fraisDosier;
$result['tauxequivalent']= self::tegcalculate($months,-$withoutTax,$lastparameter)*100;
$result['tegvalue']=$result['tauxequivalent']*12;

$result['npmts']=$npmts;
$result['loan_amt']=$loan_amt;
$result['pmnt']=$pmnt;
$result['insuranceAmount']=$insuranceAmount;
$result['fraisDosier']=$fraisDosier;
$result['age']=$age;

return $result;
}
function amort($amount=0,$rate=0,$years=0, $curdate=0, $postinterest=0,$tax_interest,$css_value,$fraisDosier,$age,$loan_amt){ 

  $this->tax_interest=$tax_interest;
  $this->css_value=$css_value;
  $this->fraisDosier=$fraisDosier;
  $this->age=$age;
  $this->loan_amt=$loan_amt;
  //print_r($year=($years*12));
 $this->amount=$amount;   //amount of the loan
 $this->rate=$rate;
 $this->postinterest=$postinterest;       //yearly interest rate in percent
 $this->years=$years;     //length of loan in years

if(($years*12) <12){
 $this->month=($years*12);
 $this->text="MOIS";
}else{
  $this->month=($years);
  $this->text="ANNEES";
  
}


if($amount*$rate*$years > 0){
 $this->npmts=$years*12;  //number of payments (12 per year)
 $this->mrate=$rate/1200; //monthly interest rate 
 $this->smrate=$this->mrate*100; //monthly interest rate 
 $this->pmnt=$amount*($this->mrate/(1-pow(1+$this->mrate,-$this->npmts))); //monthly payment
 $this->tpmnt=$this->pmnt * $this->npmts;  //total amount paid at end of loan
 $this->tint=$this->tpmnt-$amount;         //total amount of interest paid at end of loan
 $this->cdate=$curdate;
}else{
 $this->pmnt=0;
 $this->npmts=0;
 $this->mrate=0;
 $this->tpmnt=0;
 $this->tint=0;
 $this->cdate=0;
}
}
//returns the monthly payment in dolars (two decimal places)
function payment(){
return sprintf("%01.2f",$this->pmnt);
}

//returns the total amount paid at the end of the loan in dolars
function totpayment(){
return sprintf("%01.2f",$this->tpmnt);
}

//returns the total interest paid at the end of the loan in dolars
function totinterest(){
return sprintf("%01.2f",$this->tint);
}

//displays the form to enter amount, rate and length of loan in years
function showForm($frais_de_assurance){
  //echo base_url(uri_string());  
// print "<header class=\"main-box-header clearfix\"><meta charset="euc-kr">
// <h2 class=\"pull-left\">TABLEAU AMORTISSMENT</h2>
// <div class=\"pull-right\">

// </div>
// </header> "; 
$ebal = $this->amount;
$ccint =0.0;
$cpmnt = 0.0;
$totalCss=0;
$totalVat=0;
for ($pnum = 1; $pnum <= $this->npmts; $pnum++)
{
    $bbal = $ebal;    
    $ipmnt = $bbal * $this->mrate;
    $ppmnt = $this->pmnt - $ipmnt;
    $ebal = $bbal - $ppmnt;
    $ccint = $ccint + $ipmnt;
    $cpmnt = $this->pmnt;
   
    // $pbint = $bbal*$this->postinterest/100/12;
    // $vbint = $pbint*19.25/100;
    $pbint = $ipmnt / 1.19;
    $vbint = $pbint*$this->tax_interest/100; 
    $cssint = $pbint*$this->css_value/100;
    $months=$this->npmts;
    $totalCss=$totalCss+$cssint;
    $totalVat=$totalVat+$vbint;
}
$totalTax=$totalCss+$totalVat;
// echo $months;
$withoutTax=$cpmnt-($totalTax/$months);
// echo $this->amount;
 if($this->age<=30){
	$insuranceRate="0.42";
    }else if($this->age<=40){
		$insuranceRate="0.75";
	    }else if($this->age<=50){
		$insuranceRate="0.92";
		}else if($this->age<=60){
		$insuranceRate="2.06";
		}
		
	if($this->age>=60){
		$insuranceAmount=$frais_de_assurance ? $frais_de_assurance : "0.00";
// 		$insuranceAmount=($this->loan_amt*$insuranceRate)/100;
		}else{
		    $insuranceAmount=($this->loan_amt*$insuranceRate)/100;
		}
    
$lastparameter=$this->amount-$this->fraisDosier-$insuranceAmount;
$tauxEquivalent= self::tegcalculate($months,-$withoutTax,$lastparameter)*100;
$tegvalue=$tauxEquivalent*12;


print "<p align='center'> </p>";
print "";
print "<table class='table table-hover' id='table-example-fixed'>";
print "<tr><td width='33%' align='center' height='35'>";
print "<dl><dt>MONTANT DU PRET</dt><dt>(in FCFA, pas de virgule)</dt>";
print "<dt><div class=\"form-group\" style='width: 205px;'><div class=\"input-group\"><span class=\"input-group-addon\">FCFA</span><input type='text' class=\"form-control\" name='amount' value='".number_format($this->amount,0,',',' ')."' align='top' maxlength='100' size='200' readonly ></div></div>";
print "</dt></dl></td>";
print "<td width='33%' height='35' align='center'>";
print "<dl><dt>TAUX INTERET ANNUEL</dt><dt>(in percent)</dt>";
print "<dt><div class=\"form-group\" style='width: 205px;'><div class=\"input-group\"><input type='text' class=\"form-control\" name='rate' value='$this->postinterest' align='top' maxlength='10' size='20' readonly /><span class=\"input-group-addon\">%</span></div></div>";
print "</dt></dl></td>";
print "<td width='33%' height='35' align='center'>";
print "<dl><dt>Total Tax</dt><dt>(F CFA)</dt>";
print "<dt><div class=\"form-group\" style='width: 205px;'><div class=\"input-group\"><input type='text' class=\"form-control\" name='totaltax' value='".number_format($totalTax,0,',',' ')."' align='top' maxlength='10' size='20' readonly /></div></div>";
print "</dt></dl></td>";
print "<td width='33%' height='35' align='center'>";
print "<dl><dt>Taux Equivalent</dt><dt>&nbsp;</dt>";
print "<dt><div class=\"form-group\" style='width: 205px;'><div class=\"input-group\"><input type='text' class=\"form-control\" name='rate' value='".round($tauxEquivalent,2)."' align='top' maxlength='10' size='20' readonly /></div></div>";
print "</dt></dl></td>";
print "<td width='33%' height='35' align='center'>";
print "<dl><dt>TEG</dt><dt>&nbsp;</dt>";
print "<dt><div class=\"form-group\" style='width: 205px;'><div class=\"input-group\"><input type='text' class=\"form-control\" name='rate' value='".round($tegvalue,2)."' align='top' maxlength='10' size='20' readonly /></div></div>";
print "</dt></dl></td>";
print "<td width='34%' height='35' align='center'>";
print "<dl><dt>DUREE DU PRET</dt><dt>(in ".$this->text.")</dt>";
print "<dt><div class=\"form-group\" style='width: 205px;'><div class=\"input-group\"><input type='text' class=\"form-control\" name='years' value='".number_format($this->month)."' align='top' maxlength='5' size='20' readonly /><span class=\"input-group-addon\">".ucfirst($this->text)."</span></div></div>";
print "</dt></dl></td></tr></table>";
print "<p><p>";
}

//if $show is false:
//     displays:
//               monthly payment
//               number of payments in the loan
//               total paid at end of loan
//               total interest paid at end of loan
//if $show is true:
//    displays: everything for false case plus the amortization table

function showTable($show){
print "<table class='table table-hover'>";
  
  /*print "<td align='center'><dt>Total Payments</dt>";
  print "<dt>";
  print sprintf("$%01.2f",$this->tpmnt);
  print "</dt></td>";
  print "<td width='25%' align='center'><dt>Total Interest</dt>";
  print "<dt>";
  print sprintf("",$this->tint);
  print "</dt></td>";*/


print "</tr></table>";
print "<table class='table table-hover'>";
print "<tr>";
print "<td width='33%' align='center'><dt>TAUX INTERET MENSUEL</dt>";
print "<dt>";
print sprintf("%01.2f",$this->mrate*100);
print "</dt></td>";

print "<td width='25%' align='center'><dt>NOMBRE DE MENSUALITE DE REMBOURSEMENT</dt>";
      print "<dt>";
       print $this->npmts;
         print "</dt></td>";

    print "<td align='center'><dt>MONTANT MENSUEL A REMBOURSER</dt>";
      print "<dt>";      
      print number_format($this->pmnt, 0, ',', ' ');
         print "</dt>";
  print "</td></tr>";
if($show){
  print "</table>";
 
  print "<table id=\"table-example\" class=\"table table-hover\">";
  print "<thead>";
    print "<tr>";
    // print " <th>Pmt</th>";
    // print "<th>BALANCE DEBUT PERIODE</th>";
    // print "<th>BALANCE FIN PERIODE</th>";
    // print "<th>MONTANT PRINCIPAL A PAYER</th>";
    // print "<th>INTERET A PAYER TAXE INCLUSE</th>";
    // print "<th>INTERET A PAYER HORS TAXE</th>";
    // print "<th>TAV SUR INTERET</th>";
    // print "<th>PAIEMENT MENUEL</th>";
    // print "<th>MOIS</th>";
    // print "<th>ANNEES</th>"; 
    print "<th>N° D'ECHEANCE</th>"; 
    print "<th>CAPITAL DEBUT PERIODE</th>";
    print "<th>CAPITAL FIN PERIODE</th>";
    print "<th>CAPITAL AMORTI</th>";
    print "<th>INTERETS TTC DE LA PERIODE</th>";
    print "<th>INTERETS HT</th>";
    print "<th>TAV SUR INTERET</th>";
    print "<th>CSS</th>";
    print "<th>MONTANT DE L'ECHEANCE</th>";
    print "<th>MOIS</th>";
    print "<th>ANNEES</th>";
    print "</tr>";
  print "</thead>";


$ebal = $this->amount;
$ccint =0.0;
$cpmnt = 0.0;

// $totalCss=0;
// $totalVat=0;
$cdate=$this->cdate;
for ($pnum = 1; $pnum <= $this->npmts; $pnum++)
{
  
  print "<tr>";   
    print "<td align='left'>$pnum</td>";
    $bbal = $ebal;    
    $ipmnt = $bbal * $this->mrate;
    $ppmnt = $this->pmnt - $ipmnt;
    $ebal = $bbal - $ppmnt;
    $ccint = $ccint + $ipmnt;
    $cpmnt = $this->pmnt;
   
    // $pbint = $bbal*$this->postinterest/100/12;
    // $vbint = $pbint*19.25/100;
    $pbint = $ipmnt / 1.19;
    $vbint = $pbint*$this->tax_interest/100; 
    $cssint = $pbint*$this->css_value/100;
    $months=$this->npmts;
    // $totalCss=$totalCss+$cssint;
    // $totalVat=$totalVat+$vbint;
    //echo $monthlypay=($this->amount*($this->rate*12/100)*(1+($this->rate*12/100)) ^$this->npmts)/(($this->rate*12/100) ^ $this->npmts-1)."<br>";
    /*print "<td align='left'>CFA ". sprintf("%01.0f",$bbal) . "</td>";
    print "<td align='left'>" . sprintf("%01.0f",$ebal) . "</td>"; 
    print "<td align='left'>" . sprintf("%01.0f",$ppmnt) . "</td>"; 
    print "<td align='left'>" . sprintf("%01.0f",$ipmnt). "</td>"; 
    print "<td align='left'>" .  sprintf("%01.0f",$pbint) . "</td>";   
    print "<td align='left'>" . sprintf("%01.0f",$vbint) . "</td>"; 
    print "<td align='left'>" . sprintf("%01.0f", $cpmnt). "</td>"; 
    print "<td align='left'>" .date("m", strtotime( $cdate." +$pnum months")) . "</td>"; 
    print "<td align='left'>" . date("Y", strtotime( $cdate." +$pnum months")) . "</td>";*/

    print "<td align='left'>". number_format($bbal,0,',',' ') . "</td>";
    print "<td align='left'>" . number_format($ebal,0,',',' ') . "</td>"; 
    print "<td align='left'>" . number_format($ppmnt,0,',',' '). "</td>"; 
    print "<td align='left'>" . number_format($ipmnt,0,',',' ')."</td>"; 
    print "<td align='left'>" .  number_format($pbint,0,',',' ')."</td>";   
    print "<td align='left'>" . number_format($vbint,0,',',' ')."</td>";
    print "<td align='left'>" . number_format($cssint,0,',',' ')."</td>";  
    print "<td align='left'>" . number_format($cpmnt,0,',',' ')."</td>"; 
    print "<td align='left'>" .date("m", strtotime( $cdate." +$pnum months")) . "</td>"; 
    print "<td align='left'>" . date("Y", strtotime( $cdate." +$pnum months")) . "</td>"; 


  print "</tr>";
 }


 print "</table>";
 }
}
function tegcalculate($nper, $pmt, $pv, $fv = 0.0, $type = 0, $guess = 0.1) {
    $financial_max_iterations = 20;
    $financial_precision = 0.00000008;

    $rate = $guess;
    if (abs($rate) < $financial_precision) {
        $y = $pv * (1 + $nper * $rate) + $pmt * (1 + $rate * $type) * $nper + $fv;
    } else {
        $f = exp($nper * log(1 + $rate));
        $y = $pv * $f + $pmt * (1 / $rate + $type) * ($f - 1) + $fv;
    }
    $y0 = $pv + $pmt * $nper + $fv;
    $y1 = $pv * $f + $pmt * (1 / $rate + $type) * ($f - 1) + $fv;

    // find root by secant method
    $i  = $x0 = 0.0;
    $x1 = $rate;
    while ((abs($y0 - $y1) > $financial_precision) && ($i < $financial_max_iterations)) {
        $rate = ($y1 * $x0 - $y0 * $x1) / ($y1 - $y0);
        $x0 = $x1;
        $x1 = $rate;

        if (abs($rate) < $financial_precision) {
            $y = $pv * (1 + $nper * $rate) + $pmt * (1 + $rate * $type) * $nper + $fv;
        } else {
            $f = exp($nper * log(1 + $rate));
            $y = $pv * $f + $pmt * (1 / $rate + $type) * ($f - 1) + $fv;
        }

        $y0 = $y1;
        $y1 = $y;
        ++$i;
    }
    return $rate;
}

}
//End of amort class
?>