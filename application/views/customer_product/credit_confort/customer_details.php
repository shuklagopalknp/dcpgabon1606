  <style>
  .panel-body {
    padding: 5px !important;
  }
  .el-field {
    padding: 0px 0px 5px 0px;
    font-size: 13px;
  }
  .bg-header {
    background-color: transparent !important;
  }
  .main-box-body {
    padding: 0px; 
    margin: 0px;
  }
  .panel {
    margin-bottom: 0px;
    border: none !important;
    border-radius: 0px;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    background-color: #3276b1;
    color: #fff;
  }
  .main-box .main-box-body {
    padding: 8px !important;
  }
  .wrapper {
    position: relative;
    margin: 0 auto;
    overflow: hidden;
    padding: 5px;
    height: auto !important;
  }
  .list {
    position: absolute;
    left: 0px;
    top: 0px;
    min-width: 3000px;
    margin-left: 12px;
    margin-top: 0px;
  }
  .list li {
    display: table-cell;
    position: relative;
    text-align: center;
    cursor: grab;
    cursor: -webkit-grab;
    color: #efefef;
    vertical-align: middle;
  }


  .list1 {
    position: absolute;
    left: 0px;
    top: 0px;
    min-width: 3000px;
    margin-left: 12px;
    margin-top: 0px;
  }
  .list1 li {
    display: table-cell;
    position: relative;
    text-align: center;
    cursor: grab;
    cursor: -webkit-grab;
    color: #efefef;
    vertical-align: middle;
  }
  .scroller {
    text-align: center;
    cursor: pointer;
    display: none;
    padding: 7px;
    padding-top: 11px;
    white-space: no-wrap;
    vertical-align: middle;
    background-color: #fff;
  }
  .scroller-right {
    float: right;
  }
  .scroller-left {
    float: left;
  }

  .lodertypeof {    
    background-color: #dff0d8c7;
    background-image: url("<?php echo base_url('assets/img/select2-spinner.gif');?>");
    background-size: 18px 18px;
    background-position:right center;
    background-repeat: no-repeat;
    opacity: 0.5;
    }
   @media (min-width: 768px) {
  .dl-horizontal dd {
    margin-left: 265px;
  }
  .badge {
    display: inline-block;
    min-width: 17px;
    padding: 10px 6px;
    margin-top: -7px;
    font-size: 14px;
    font-weight: 700;
    line-height: 1;
    color: #009136;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    background: none;
    border-radius: 20px;
  }
   @media (min-width: 768px) .badge {
   display: inline-block;
   min-width: 17px;
   padding: 10px 6px;
   margin-top: -7px;
   font-size: 14px;
   font-weight: 700;
   line-height: 1;
   color: #009136;
   text-align: center;
   white-space: nowrap;
   vertical-align: middle;
   background: none;
   border-radius: 20px;
  }
.form-group div#tab-details {
    border: none;
}
  .error_c{
    color:red;
  }

  </style>

  <div id="content-wrapper">

    <div class="row">

      <div class="col-lg-12">
        <div id="content-header" class="clearfix">
          <div class="col-md-9">
            <ol class="breadcrumb">
              <li><a href="<?php echo base_url('Dashboard');?>">TABLEAU DE BORD</a></li>
              <li><a href="<?php echo base_url('PP_CREDIT_CONFORT');?>">PP CREDIT CONFORT</a></li>            
              <li class="active"><span>DÉTAILS DU CLIENT</span></li>
              <li><?php echo "Application Number: (".$loan_details['application_no'].")";?></li>
            </ol>
          </div>

          <div class="col-md-3" hidden>
            <div class="tab-content" style="text-align:right">
              <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                <div class="btn-group" role="group">
                  <button type="button" id="stars" class="btn btn-default" href="#tab1" data-toggle="tab">
                  <div>LIST</div>
                  </button>
                </div>
               <!--  <div class="btn-group" role="group">
                  <button type="button" id="favorites" class="btn btn-primary" href="#tab2" data-toggle="tab">
                  <div>SPLIT</div>
                  </button>
                </div> -->
                <div class="btn-group" role="group">
                  <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab">
                    <div>DETAILS</div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php               
         

        
        $last=array();
         foreach (json_decode($loan_details['databinding']) as $key ) {
           //echo "<pre>", print_r($key),"</pre>";
           $last[]=$key->month.'-'.$key->years;
         }
         $createddate=date('23', strtotime($appformD[0]['created']));
         $DateofLastPayment = $createddate.'-'.end($last);
         $sumofInterestPaidbeforTax =0;
          $sumofVATonInterest=0;  
          if(!empty($loan_details['databinding'])){
              $databinding=json_decode($loan_details['databinding']);
          foreach ($databinding as $keydata)
          {
              //echo "<pre>", print_r($keydata), "</pre>";
              $sumofInterestPaidbeforTax +=$keydata->interest_paid_befor_tax;
              $sumofVATonInterest +=$keydata->vat_on_interest;
             
          }
          }
        ?>

        <div class="main-box-body clearfix" >
          <div class="tab-content">
            <div class="tab-pane fade in" id="tab1">
            <div class="row" style="margin-bottom:0px">
              <div class="col-md-12">
                <div class="form-group" style="margin-bottom:10px;">
                  <div class="input-group" style="width:100%">
                    <input type="search" class="form-control" id="searchString" placeholder="Enter Account Number" autocomplete="off">
                  </div>
                </div>
              </div>
            </div>        

              <div class="col-lg-12">
                <div class="scrollable" style="">
                  <div class="table-responsive">

                    <table class="table table-striped table-hover">
                      <thead>
                        <tr class="success">
                         <th><span>Nom</span></th>
                        <th><span>Dure&aacute;e du credit</span></th>
                        <th><span>Motant requis</span></th>
                        <th><span>E&Aacute;tat du pre&aacute;t</span></th>
                        <th><span>Produit de cre&aacute;dit</span></th>
                        <th><span>Nume&aacute;ro de compete</span></th>
                        <th><span>Date de cre&aacute;ation</span></th>
                        </tr>

                      </thead>
                      <tbody>
                     <tbody>
                      <?php 
                          foreach ($customerdata as $ckey) { 
                         // echo "<pre>", print_r($ckey), "</pre>";
                            if($ckey['loan_schedule']=="Monthly"){
                              $mois="months";
                            }else{
                              $mois="mois";
                            }
                          ?>
                          <tr>
                            <td><?php echo $ckey['first_name'];?> <?php echo $ckey['last_name'];?> </td>
                            <td><?php echo $ckey['loan_term'].' '. $mois;?></td>
                            <td><?php echo number_format($ckey['loan_amt'],0,',',' ');?></td>
                            <td><?php echo $ckey['state_id'];?></td>
                            <td>Intitial</td>
                            <td>30</td>
                            <td><?php echo date('d-m-Y', strtotime($ckey['created']));?></td>
                          </tr>
                        <?php } ?>

                     
                    </tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>          

                   

            <div class="tab-pane fade in" id="tab3">
               <div class="col-md-12">
              <div class="main-box-body clearfix" style="padding:0px !important">
                <div class="panel panel-default panel-body loan-details-header">
                  <div class="bg-header">
                    <div class="well well-sm well-primary" style="background-color:transparent !important">
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">Nom Et Prenoms:</div>
                                    <div class="col-xs-2 no-padding"><?php echo ucfirst($customer->first_name)." " ?: '-';?><?php echo $customer->middle_name." " ?: ' ';?><?php echo $customer->last_name ?: '-';?></div>
                                    <div class="col-xs-2 bold no-padding">Durée Du Prêt:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $loan_details['loan_term'];?> 
                                    <?php if($appformD[0]['loan_schedule'] == "Monthly"){
                                      echo "MOIS";
                                    } ?></div>
                                    <div class="col-xs-2 bold no-padding">Agence:</div>
                                    <div class="col-xs-2"><?php echo $loan_details['branch_name'];?></div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">Statut Du Prêt:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $loan_overallstatus;?></div>
                                    <div class="col-xs-2 bold no-padding">Nature Du Prêt:</div>
                                    <div class="col-xs-2 no-padding">PP CREDIT CONFORT</div>
                                    <div class="col-xs-2 bold no-padding">Taux D'intérêt:</div>
                                    <div class="col-xs-2 no-padding"><?php echo sprintf("%01.2f", $loan_details['loan_interest']);?>%</div>
                                  </div>
                                  <div class="row well_row">
                                     <div class="col-xs-2 bold">Date première échéance </div>
                                    <div class="col-xs-2"><?php
                                    // echo $customer->cat_emp_id;
                                        if((($customer->cat_employeurs) == "Public Civil 25") || (($customer->cat_employeurs) == "Prive 25") || (($customer->cat_employeurs) == "Public Corps 25")){
                                            $loandate= '25';
                                        }else if((($customer->cat_employeurs) == "Prive 20") || (($customer->cat_employeurs) == "Autres 20")){
                                            $loandate='20';
                                        }else if((($customer->cat_employeurs) == "Prive 30") || (($customer->cat_employeurs) == "Organisation internationales")){
                                            $loandate='30';
                                        }else{
                                            $loandate='30';
                                        }
                                        echo $loandate."-".$databinding[0]->month."-".$databinding[0]->years?></div>
                                    <div class="col-xs-2 bold no-padding">Date Dernière Échéance:</div>
                                    <div class="col-xs-2 no-padding">
                                      <?php 
                                      echo $loandate."-".end($databinding)->month."-".end($databinding)->years;
                                      // echo $DateofLastPayment;
                                      //echo date('d-m-Y', strtotime('+1 month', strtotime($appformD[0]['created'])));;?>
                                        
                                      </div>
                                    <div class="col-xs-2 bold no-padding">Montant Total A Rembourser:</div>
                                    <div class="col-xs-2 no-padding">F CFA <?php echo number_format($loan_details['tpmnt'],0,',',' ');?></div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">TVA sur les intérêts:</div>
                                    <div class="col-xs-2 no-padding"><?php echo 'F CFA '.number_format($sumofVATonInterest,0,',',' '); ?></div>
                                    <div class="col-xs-2 bold no-padding">Mensualité:</div>
                                    <div class="col-xs-2 no-padding">F CFA <?php echo number_format($loan_details['pmnt'],0,',',' ') ;?></div>
                                    <div class="col-xs-2 bold no-padding">Numéro De Compte:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $customer->account_no;?></div>
                                  </div>
                                  <div class="row well_row">
                                     <div class="col-xs-2 bold no-padding">Montant Du Prêt:</div>
                                    <div class="col-xs-2 no-padding">F CFA <?php echo number_format($loan_details['loan_amt'],0,',',' ');?></div>
                                   
                                    <div class="col-xs-2 bold"></div>
                                    <div class="col-xs-2"></div>
                                  </div>
                                </div>



                  
                  </div>
                </div>
              </div>

              <div class="action-panel">
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;margin-bottom:50px; margin-top:20px;">
                  <div class="main-box" style="padding: 15px 0px;">
                    <div class="nextstep-buttons">
                    <div class="row">
                      <!-- Age of Customer section -->
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align:center">
                         <?php                                    
                        $dateOfBirth = date('Y-m-d', strtotime($customer->dob));
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                         ?>
                        <div class="infographic-box" data-toggle="tooltip" title="Âge du client"> <img src="<?php echo base_url('assets/img/age.png');?>" /> <span class="value">
                          <?php echo $diff->format('%y') ?: '21';?></span> 
                          <!--<span class="headline">Users</span>--> 
                        </div>
                      </div>
                      <!-- End Age of Customer section -->
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align:center">
                        <?php         
                        // print_r($customer->opening_date);                           
                        $Tenurewithbank = date("d-m-Y" ,strtotime($customer->opening_date));
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($Tenurewithbank), date_create($today));
                         ?>
                        <div class="infographic-box" data-toggle="tooltip" title="Relation avec la Banque"> <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value"><?php echo timeAgo($Tenurewithbank) ?: '21';?></span> 
                          <!--<span class="headline">Users</span>--> 
                        </div>
                      </div>
                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Prêt Précédent"> <img src="<?php echo base_url('assets/img/loans.png');?>" /> <span class="value"><?php echo $loan_count;?></span>
                        </div>
                      </div>

                      <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Durée de la Demande de Prêt"> <img src="<?php echo base_url('assets/img/timer.png');?>" /> <span class="value">
                          <?php
                          // print_r($loan_details);
                           $newDec=reset($decision_rec);
                        $cur_time=date("Y-m-d H:i:s");;
                        if($newDec['decision']=='Abandonner' || $newDec['decision']=='Annulé' || $newDec['decision']=='Disbursement'){
                           echo timeAgo3($loan_details['created'],$newDec['comment_date']) ?: '10 Days'; 
                        }else{
                           echo timeAgo4($loan_details['created'],$cur_time) ?: '10 Days'; 
                        }
                           ?></span> 
                          <!--<span class="headline">Users</span>--> 
                        </div>
                      </div>
					             <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggleft="tooltip" title="Coeff. d'endet.">
                          <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value rdval2">
						                
                            <?php 
                            $score=$risk_analysis['coefficient_score'];
                             if($score<='35'){
                              echo "<p style='color: green; margin-right:5px'>".$score."</p>";
                              }else if($score>'35' && $score<='49'){
                                 echo "<p style='color: orange; margin-right:5px'>".$score."</p>";
                              }else{
                                echo "<p style='color: red; margin-right:5px'>".$score."</p>";
                              }
                              ?>                              
                            </span>
                            <?php 
                            // if($riskcurrentmonthlyvrefit[0]['score']<= '35'){
                            //     echo "green";}else if($riskcurrentmonthlyvrefit[0]['score']>'35' && $riskcurrentmonthlyvrefit[0]['score']<='49'){
                            //         echo "orange";}else{
                            //             echo "red";}{

                            //   }
                              ?>
                        </div>
                        </div>

                        <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="text-align:center">
                       <a href="<?php echo base_url('PP_Consumer_Loans/amortization_loan/').$loan_details['loan_id_temp'].'/3/view/'.$loan_details['loan_id'];?>" class="btn btn-default loan-back"  style="margin-top:25px;">Amortissement</a>
                      </div>


                       
                      </div>
                    </div>
                    </div>
                  
                 
                </div>
                </div>
                </div>
              </div>  
                          <!-- End Split Blue section -->

              <!-- End Blue Section -->                        

             
              <!--<div class="clearfix" style="margin-top:0px;margin-bottom:5px;">
                <a class="btn btn-primary pull-left">CHANGE TERM</a></div>-->
          </div> 

            <div class="wrapper">
  			  <ul class="nav nav-tabs list1">
  			  	<?php 
  			  	$tab_count  =  1;
  			  	foreach($product_tabs as $key=>$tab_value) {?>
  			  		 <li <?php if($key == 0){?> class="active" <?php } ?>onclick="active_tab('tab-<?php echo $tab_value['tab_orginial_id'] ; ?>')">
  			  		 	<a href="#tab-<?php echo $tab_value['tab_orginial_id'] ; ?>"><?php echo $tab_value['tab_customize_name']?></a>
  			  		 </li>
  					<?php } ?>

  			  </ul>

          <div class="tab-content main-box" style="margin-top: 40px; padding: 20px;">

        <div class="tab-pane fade" id="tab-2">

            <h3 id="tab-title"><span><?php echo ucwords("Frais De Dossier"); ?></span></h3>

              <form id="fraisDeDossierForm" method="post">

                <div class="row">

                  <div class="col-md-12">
                     <div class="frais_msgdetails"></div>
                  </div>

                <div class="col-md-3">

                  <div class="form-group">

                  <label>Frais de dossier HT</label>
                    <div class="input-group">
                    <span class="input-group-addon">F CFA</span>
                    <?php 
                    $ht=$loan_details['frais_de_dossier'];
                    //   $ht = 42000;

                    ?>
                  <input type="text" class="form-control" id="frais_de_doss" name="frais_de_doss" autocomplete="off" readonly value="<?php echo number_format($ht,0,',',' ');?>" required min="0"  <?php if (!in_array('7_2', $this->session->userdata('portal_permission'))){
                      echo "readonly" ; }?> >
                    </div>
                  </div>

                </div>
                <div class="col-md-3">

                  <div class="form-group">

                  <label>Frais de Dossier TTC</label>
                    <div class="input-group">
                    <span class="input-group-addon">F CFA</span>
                    <?php 
                    $tcc=$loan_details['frais_de_dossier']*1.18;
                    // $tcc =  49560;

                    ?>
                  <input type="text" class="form-control" id="frais_de_doss" name="frais_de_doss" autocomplete="off" readonly value="<?php echo number_format($tcc,0,',',' ');?>" required min="0"  <?php if (!in_array('7_2', $this->session->userdata('portal_permission'))){
                      echo "readonly" ; }?> >
                    </div>
                  </div>

                </div>
                    <?php

                    $age= date_diff(date_create($customer->dob), date_create('today'))->y;
                        //   echo $age;
                    if($age<=30){
                      $insuranceRate="0.42";
                    }else if($age<=40){
                      $insuranceRate="0.75";
                    }else if($age<=50){
                      $insuranceRate="0.92";
                    }else if($age<=60){
                      $insuranceRate="2.06";
                    }else{
                      $insuranceRate="0.00";
                    }

                     $insuranceAmount=($loan_details['loan_amt']*$insuranceRate)/100;
                    
                    
                    ?>
                <div class="col-md-3"> 

                  <div class="form-group">

                  <label>Prime d'Assurance/Assurance Personnelle</label>
                    <div class="input-group">
                    <span class="input-group-addon">F CFA</span>
                    <?php   if($age >= 60){
                    $assurance=$loan_details['frais_de_assurance'] ? $loan_details['frais_de_assurance'] : "0"  ;
                    ?>
                       <input type="text" class="form-control" id="frais_de_assurance" name="frais_de_assurance"  value="<?php echo $loan_details['frais_de_assurance'] ? $loan_details['frais_de_assurance'] : "0"  ;?>" <?php if (!in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                      echo "readonly" ; }?>>
                    <?php } else {
                    $assurance=$insuranceAmount;
                    ?>
                       <input type="text" class="form-control" id="frais_de_assurance" name="frais_de_assurance"  value="<?php echo number_format($insuranceAmount,0,',',' ') ;?>" disabled>

                    <?php }?>
                 
                    </div>
                  </div>

                </div>
                <div class="col-md-3"> 

                  <div class="form-group">

                  <label>Frais D’Enregistrement TTC</label>
                    <div class="input-group">
                    <span class="input-group-addon">F CFA</span>
                    <?php  $tcc1 =  38800; ?>
                  <input type="text" class="form-control" value="<?php echo number_format($tcc1,0,',',' ') ;?>" id="frais_de_enregistrement" name="frais_de_enregistrement" autocomplete="off" disabled>
                    </div>
                  </div>

                </div>
               
               </div>

                
               <div class="row">


                 <div class="col-md-3"> 

                  <div class="form-group">

                  <label>Frais D’Enregistrement HT</label>
                    <div class="input-group">
                    <span class="input-group-addon">F CFA</span>
                    <?php  $ht1 =  6685; ?>
                  <input type="text" class="form-control" value="<?php echo number_format($ht1,0,',',' ') ;?>" id="frais_de_enregistrement_ht" name="frais_de_enregistrement_ht" autocomplete="off" disabled>
                    </div>
                  </div>

                </div>


                 <?php 
              $am=new Class_Amort();
              $loan_interest =$loan_details['loan_interest'];
                  $vat_on_interest=$loan_details['loan_tax'] ?: '19.25'; 
                  $rt=($loan_interest*(1+$vat_on_interest/100));

          $teg=$am->tegcal2($loan_details['npmts'],$loan_details['loan_amt'],$loan_details['pmnt'],$rt,$loan_details['frais_de_dossier'],$age,$ht1,$assurance);
        // print_r($teg);

              ?>
              <div class="col-md-3">

                <div class="form-group">

                <label>Taux Equivalent</label>

                <div class="input-group">

                  <input type="number" class="form-control" autocomplete="off" value="<?php echo round($teg['tauxequivalent'],2);?>" required min="2" readonly>

                  <span class="input-group-addon">%</span> </div>

                </div>

              </div>
              
              <div class="col-md-3">

                <div class="form-group">

                <label>TEG</label>

                <div class="input-group">

                  <input type="number" class="form-control" autocomplete="off" value="<?php echo round($teg['tegvalue'],2);?>" required min="2" readonly>

                  <span class="input-group-addon">%</span> </div>

                </div>

              </div>

               <div class="col-md-3"> 

                  <div class="form-group">

                  <label>Taux de perception</label>
                    <div class="input-group">

                  <input type="input" class="form-control" value="<?php echo $insuranceRate;?>" readonly>

                  <span class="input-group-addon">%</span>
                    </div>
                  </div>

                </div>

                  
              

               

               
                


                

                </div>

                <div class="row">


                  <div class="col-md-3">

                    <div class="form-group">

                    <label>Age</label>
                      <div class="input-group">
                       
                    <input type="input" class="form-control" value="<?php echo $age;?>"  readonly>
                     <span class="input-group-addon">ANS</span>
                      </div>
                    </div>

                  </div>


                   <div class="col-md-3"> 

                  <div class="form-group">

                  <label>Durée du prêt</label>
                    <div class="input-group">
                    
                  <input type="input" class="form-control" value="<?php echo $loan_details['loan_term']?>" readonly>
                   <span class="input-group-addon">MOIS</span>
                    </div>
                  </div>

                </div>
                <div class="col-md-3"> 

                  <div class="form-group">

                  <label>Montant du prêt</label>
                    <div class="input-group">
                    <span class="input-group-addon">F CFA</span>
                  <input type="input" class="form-control" value="<?php echo number_format($loan_details['loan_amt'],0,',',' ');?>" readonly>
                    </div>
                  </div>

                </div>

                <div class="col-md-3"> 

                  <div class="form-group">

                  <label>Capital Amorti HT</label>
                    <div class="input-group">
                    <span class="input-group-addon">F CFA</span>
                  <input type="input" class="form-control" value="<?php echo number_format(round($loan_databinding[0]->principal_payment),0,',',' ');?>" readonly>
                    </div>
                  </div>

                </div>

               


                 
            </div>

            <div class="row">

               <div class="col-md-3"> 

                  <div class="form-group">

                    <?php if($age < 30) 
                            $bareme = "38";
                          else if($age >=30 && $age <=40)
                            $bareme = "39";
                          else if($age >=41 && $age <=50)
                            $bareme = "40";
                          else if($age >=51 && $age <=60)
                            $bareme = "41";
                          else
                            $bareme = "0";

                      ?>


                  <label>Barème de l'Assurancet</label>
                    <div class="input-group">
                    <span class="input-group-addon"></span>
                  <input type="input" class="form-control" value="<?php echo  $bareme;?>" readonly>
                    </div>
                  </div>

                </div>
            </div>

            <div class="row">
             
              <div class="col-md-12">

                <?php if($age > 60) {?>
                  <div class="clearfix" style="margin-top:23px;margin-bottom:10px;">
                  <input type="hidden" name="application_id" id="application_id" value="<?php echo $loan_details['loan_id']?>">
                   <input type="hidden" name="product" id="product_type" value="credit_confort">

                   <?php if (in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){?>

                  <button type="button" id="frais_btn" class="btn btn-primary pull-right">Enregistrer les details </button>

                    <?php } ?>

                  <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right feeloder" style="position:relative;top: 9px;left:-13px; display: none;">

                  </div>

                <?php }?>

                </div>
            </div>



               
                

              </form>

               </div>

            <!-- end Tab-2  -->
      


              <div class="tab-pane fade in" id="tab-1">
<form id="addnewcustomer" action=''  method="post"> 

              <div class="row">
                <div class="col-md-12 response-msg"></div>
              </div>

                   <h3 id="tab-title"><span>Renseignements Personnels</span></h3>
            <div class="row">

              <?php // echo '<pre>'; print_r($customer);?>
                
                <input type="hidden" name="branch_id" id="branch_id" value="<?php echo $customer->branch_id;?>">
            <div class="col-md-3">
                <div class="form-group">
                  <label>Titre</label>
                  <div id="tab-details"> 

                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->title ;?>

                     <?php } else {?>
                      <input type="text" class="form-control " id="title" name="title" placeholder="Titre" value="<?php echo $customer->title;?>">
                   <!--  <select  id="title" name="title" class="form-control">
                                <option value="M." id="M." <?php if($customer->title == "M.") echo "selected"; ?>>M.</option>
                                <option value="Mrs." id="Mme." <?php if($customer->title == "Mme.") echo "selected"; ?>>Mme.</option>
                                <option value="Miss" id="Mlle" <?php if($customer->title == "Mlle") echo "selected"; ?>>Mlle</option>
                              </select> -->

                    <?php } ?>
                 
                  </div>
                </div>
              </div>
              
              <div class="col-md-3">
                <div class="form-group">
                  <label> Prénoms</label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->first_name ;?>

                     <?php } else {?>

                    <input type="text" name="first_name" class="form-control" value="<?php  echo $customer->first_name ?>" >

                    <?php } ?>

                  </div>
                </div>
              </div>                  
              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>2ième Prénoms </label>
                  <div id="tab-details"> 

                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->middle_name ;?>

                     <?php } else {?>
                   <input type="text" name="middle_name" class="form-control" value="<?php  echo $customer->middle_name ?>">

                    <?php }?>


                   </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label> Nom Patronymique</label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->last_name ;?>

                     <?php } else {?>
                   <input type="text" name="last_name" class="form-control" value="<?php  echo $customer->last_name ?>" >
                    <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Genre </label>
                  <div id="tab-details"> 

                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->gender ;
                       ?>

                     <?php } else {?>
                      <input type="text" class="form-control " id="gender" name="gender" placeholder="Genre" value="<?php echo $customer->gender;?>">
                   <!--  <select  id="gender" name="gender" class="form-control">
                                <option value="Male" id="Male" <?php if($customer->gender == "Male") echo "selected"; ?>>Homme</option>
                                <option value="Female" id="Female" <?php if($customer->gender == "Female") echo "selected"; ?>>Femme</option>
                              </select> -->

                    <?php } ?>
                   <!-- <input type="text" name="gender" value="<?php echo $customer->gender?>"> -->
                 </div>
                </div>
              </div>
              
            </div>

            <div class="row">
              
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date de naissance</label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo !empty($customer->dob) ? date('d-m-Y', strtotime($customer->dob)):"";?>

                     <?php } else {?>
                    <input type="text" class="dobdt form-control" placeholder="dd-mm-yyyy"   name="dob" value="<?php echo !empty($customer->dob) ? date('d-m-Y', strtotime($customer->dob)):""; ?>" readonly>
                  <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Lieu de naissance</label>
                  <div id="tab-details">
                  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->birthplace;?>

                     <?php } else {?> 
                    <input type="text" class="form-control " id="birthplace" name="birthplace" placeholder="Lieu de naissance" value="<?php echo $customer->birthplace;?>">
                  <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Dipôme ou Niveau étude </label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || $param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo ucwords($customer->education) ;?>

                     <?php } else {?>
                    <input type="text" name="education" class="form-control" value="<?php echo ucwords($customer->education) ?>">
                  <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Situation Matrimoniale </label>
                  <div id="tab-details"> 
                    <?php 
                          $marital = array(
                                    "Célibataire",
                                    "Marié(e)",
                                    "Divorcé(e)",
                                    "Veuf",
                                    "Veuve",
                                  ); 
                          
                     if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->marital_status ;
                        } else {?> 
                        <input type="text" class="form-control" id="marital_status" name="marital_status" placeholder="Situation Matrimoniale" value="<?php echo $customer->marital_status;?>">     
                         <!--  <select  id="marital_status" name="marital_status" class="form-control">
                            <?php foreach($marital as $mtype){
                                      if($mtype == $customer->marital_status)
                                      {
                                        $select =  "selected";
                                      }
                                      else{
                                        $select = '';
                                      }
                                      echo  '<option value="'.$mtype.'" id="'.$mtype.'"'.$select.' >'.$mtype.'</option>';
                                    }?>                               
                            </select>  -->
                          <?php } ?>
                   </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Email </label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->email ;
                        } else { ?>  
                    <input type="text" name="email" class="form-control"  value="<?php echo $customer->email ?>">
                  <?php }?>
                  </div>
                </div>
              </div>
             <div class="col-md-3">
                <div class="form-group">
                  <label>Lieu d'habitation</label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->resides_address ;
                        } else { ?>  
                    <input type="text" name="resides_address" class="form-control"  value="<?php echo $customer->resides_address ?>">
                  <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Adresse postale</label>
                  <div id="tab-details">  
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->street ;
                        } else { ?>  
                    <input type="type" name="street" class="form-control"  value="<?php echo $customer->street ?>">
                      <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Adresse Complémentaire</label>
                  <div id="tab-details">  
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->alternateAddress ;
                        } else { ?>  
                    <input type="text" class="form-control " id="alternateAddress" name="alternateAddress" placeholder="Adresse Complémentaire" value="<?php echo $customer->alternateAddress; ?>">
                      <?php } ?>
                  </div>
                </div>
              </div>


              <div class="col-md-3">
                <div class="form-group">
                  <label>Ville </label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->city_id ;
                        } else { ?>  
                   <input type="text" name="city" class="form-control"  value="<?php echo $customer->city_id ?>">
                    <?php } ?>
                 </div>
                </div>
              </div>

               <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Pays de résidence <span style="color:red">*</span></label>
                  <div id="tab-details"><span> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->state_id ;
                        } else { ?>  
                    <input type="text" name="state" class="form-control"  value="<?php echo $customer->state_id ?>">
                  <?php } ?>
                  </div>
                </div>
              </div>

                <div class="col-md-3">
                        <div class="form-group">
                          <label>Capacite Juridique</label> 
                           <div id="tab-details">
                          <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->legalCapacity ?? '';
                        } else { ?> 
                         
                        <input type="text" class="form-control " id="legalCapacity" name="legalCapacity" placeholder="Capacite Juridique" value="<?php echo $customer->legalCapacity;?>"> 
                      
                           <!--  <select  class="form-control addvalidate" id="legalCapacity" name="legalCapacity">
                                <option value="Majeur" id="Majeur" <?php if($customer->legalCapacity == 'Majeur'){echo "selected";}?> >Majeur</option>
                                <option value="Majeur Incapable" id="Majeur Incapable" <?php if($customer->legalCapacity == 'Majeur Incapable'){echo "selected";}?>>Majeur Incapable</option> 
                                <option value="Mineur" id="Mineur" <?php if($customer->legalCapacity == 'Mineur'){echo "selected";}?>>Mineur</option>
                                <option value="Mineur Emancipé" id="Mineur Emancipé" <?php if($customer->legalCapacity == 'Mineur Emancipé'){echo "selected";}?>>Mineur Emancipé</option> 
                                
                              </select> -->
                            

                      <?php }?>
                          </div>  
                
                </div>
              </div>
             
			</div>

          

            <h3 id="tab-title" style="margin-top: 2%;"><span>Informations Additionnelles</span></h3>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nature de la Pièce d’ Identité </label>                
                  <?php
                    $Typeid2 = array(
                      "Carte Nationale d’Identité (CNI)",
                      "Recepisse de CNI",
                      "Passport",
                      "Permis de Conduire",
                      "Carte Professionnelle (Militaires et Magistrats)",
                      "Carte de Sejour (Résidents étrangers)"
                    );?>

                    <div id="tab-details">
                   <?php  if($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status']!="Disbursement"){ ?>
                   
                    
                        <input type="text" class="form-control" id="typeofid" name="typeofid" placeholder="Nature de la Pièce d’Identité" value="<?php echo $customer->type_id;?>">
                     

                   <!--  <select class="form-control" name="typeofid" id="type_id2" required>
                      <?php foreach($Typeid2 as $adnfo2){
                      if(trim($customer->type_id) == $adnfo2){ $select2="selected";}else{$select2="";}
                        echo  '<option value="'.$adnfo2.'" '.$select2.'>'.$adnfo2.'</option>';
                      }?>
                    </select> -->
                    <?php } else{
                      echo $customer->type_id;
                    }?>

                     </div>                  
                </div>
              </div>
              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Revenu mensuel <span style="color:red">*</span></label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->monthly_income;
                        } else { ?>  
                   <input type="number" name="monthly_income" class="form-control" value="<?php echo  $customer->monthly_income; ?>" min="0" required >
                      <?php } ?>
                 </div>
                </div>
              </div>
              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Dépenses mensuelles <span style="color:red">*</span></label>
                  <div id="tab-details">  
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->monthly_income;
                        } else { ?> 
                    <input type="number" name="monthly_expenses" class="form-control" value="<?php echo $customer->monthly_expenses; ?>" min="0" required >
                      <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-3 ">
                <div class="form-group">
                  <label>Numéro de la Pièce d’Identité </label>
                  <div id="tab-details">  
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->id_number;
                        } else { ?> 
                    <input type="text" name="id_number" class="form-control" value="<?php echo $customer->id_number ?>"  >
                      <?php } ?>
                  </div>
                </div>
              </div>
              
               <div class="col-md-3 ">
                <div class="form-group">
                  <label>Date etablissement type de piece</label>
                  <div id="tab-details">  
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement") {

                      if($customer->dateId)
                       echo date('d-m-Y', strtotime($customer->dateId));
                        } else { ?> 
                    <input type="text" name="dateId" class="form-control" value="<?php if($customer->dateId) echo date('d-m-Y', strtotime($customer->dateId)); ?>" placeholder="DD-MM-YYYY" >
                      <?php } ?>
                  </div>
                </div>
              </div>

               <div class="col-md-3">
                <div class="form-group">
                  <label>Pays Res. Fiscale</span></label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->state_of_issue;
                        } else { ?> 
                   <input type="text" class="form-control" name="state_of_issue" value="<?php echo $customer->state_of_issue ?>" required> 
                    <?php }?>
                 </div>
                </div>
              </div>

             
            </div>
            <div class="row">
                
               <div class="col-md-3">
                <div class="form-group">
                  <label>Numéro de téléphone Portable 1</label>
                  <div id="tab-details">  
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->main_phone;
                        } else { ?> 
                    <input type="phone" name="main_phone" id="main_phone" class="phone_main_c  form-control" value="<?php echo $customer->main_phone ?>"  placeholder="" required onkeypress="return istelNumber(event)">

                  <?php } ?>
                  
                </div>
                </div>
              </div>



              <div class="col-md-3">
                  <div class="form-group">
                    <label>Numéro de téléphone Portable 2</label>
                    <div id="tab-details">
                      <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->main_phone2;
                        } else { ?> 
                      <input type="phone" class="form-control" id="main_phone2" name="main_phone2" placeholder="Numéro de téléphone Portable 2" value="<?php echo $customer->main_phone2; ?>">
                    <?php } ?>
                    </div>  
                
                </div>
              </div>
             
              <div class="col-md-3">
                <div class="form-group">
                  <label>Second Numéro de téléphone Domicile 1 </label>
                  <div id="tab-details"> 
                      <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->alternative_phone;
                        } else { ?> 
                    <input type="phone" class="phone_alternate_c form-control" name="alter_phone" id="alter_phone" value="<?php echo $customer->alternative_phone ?>" placeholder="Second Numéro de téléphone Domicile 1" onkeypress="return istelNumber(event)">
                  <?php }?>
                  
                   
                  </div>
                    
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Second Numéro de téléphone Domicile 2</label>
                  <div id="tab-details">
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->alter_phone2;
                        } else { ?> 
                    <input type="text" class="form-control " id="alter_phone2" name="alter_phone2" placeholder="Second Numéro de téléphone Domicile 2" value="<?php echo $customer->alter_phone2; ?>">
                  <?php } ?>
                  </div>
                  
                </div>
              </div>



             <!--  <div class="col-md-3" hi>
                <div class="form-group">
                  <label>Fonction <span style="color:red">*</span></label>
                  <h3 id="tab-details"><span>
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->occupation;
                        } else { ?> 
                   <input type="text" name="occupation" value="<?php echo $customer->occupation ?>">
                 <?php }?>
                 </span></h3>
                </div>
              </div> -->
              
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date d’Expiration de la Pièce d’Identité </label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || $param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo !empty($customer->expiration_date_id) ? date('d-m-Y', strtotime($customer->expiration_date_id)):"";
                        } else { ?> 
                    <input type="text" class="expiration_dt form-control" name="expiration_date" value="<?php echo !empty($customer->expiration_date_id) ? date('d-m-Y', strtotime($customer->expiration_date_id)):""; ?>" >

                      <?php } ?>
                  </div>
                </div>
              </div>

               <div class="col-md-3 hidden">
              <div class="form-group">
                <label>Date de Délivrance de de la Pièce d’Identité <span style="color:red">*</span></label>
                <div id="tab-details"> 

                  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->room_type;
                        } else { ?> 
                  <input type="text" id="room_type" class="form-control" name="room_type" placeholder="DD-MM-YYYY"  required value="<?php echo $customer->room_type ?>" autocomplete="off" />

                <?php } ?>
                </div>
              </div>
            </div>


              <div class="col-md-3">
              <div class="form-group">
                <label>Prénoms du Pere </label>
                <div id="tab-details"> 
                   <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->father_firstname;
                        } else { ?> 
                  <input type="text"  class="form-control" name="father_firstname"   value="<?php echo $customer->father_firstname ?>">
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Nom Pere </label>
                <div id="tab-details"> 
                   <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->father_fullname;
                        } else { ?> 
                  <input type="text"  class="form-control" name="father_fullname" =  value="<?php echo $customer->father_fullname ?>">
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Prénoms du Mere </label>
                <div id="tab-details"> 
                   <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->mother_firstname;
                        } else { ?> 
                  <input type="text"  class="form-control" name="mother_firstname"  value="<?php echo $customer->mother_firstname ?>">
                <?php } ?>
                </div>
              </div>
            </div>

           
              
            </div>
            <div class="row">
                
            <div class="col-md-3">
              <div class="form-group">
                <label>Nom Mere </label>
                <div id="tab-details"> 
                   <?php if ($param == "view" || $param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->mother_fullname;
                        } else { ?> 
                  <input type="text"  class="form-control" name="mother_fullname"  value="<?php echo $customer->mother_fullname ?>">
                  <?php } ?>
                </div>
              </div>
            </div>

               <div class="col-md-3">
                 <div class="form-group">
                <label>Nationalité</label>
                 <div id="tab-details">

                 <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                     echo $customer->nationality;
                    } else { ?> 
              <!--    <input type="text"  class="form-control addvalidate" id="nationality_datalist" name="nationality_datalist" required="true" placeholder="Input text" list="nationality" autocomplete="off"  value="Gabonaise" />

                 <input type="hidden" class="form-control" name="nationality" id="nationality_value" value="<?php echo $customer->nationality ?? '30';?>"> -->

              <!--   <datalist id="nationality">
                <?php foreach($nationality as $key=>$nation){ 
                ?>
                   <option  data-value="<?php echo $nation['id']?>" value="<?php echo $nation['nationality']?>" ></option>
                <?php } ?>
                 
                </datalist>  -->
                

                  <input type="text" class="form-control " name="nationality" value="<?php echo $customer->nationality; ?>" aria-invalid="false">
               

                <?php } ?>
                 </div>
              </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                <label>Lieu Etablissement Pièce</label>
                <div id="tab-details"> 
                <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                 echo $customer->insurance_place_id;
                  } else { ?> 
                <input type="text" class="form-control" name="insurance_place_id" id="insurance_place_id" value="<?php echo $customer->insurance_place_id ?? '';?>">

              <?php } ?>

                </div>
              </div>
              </div>
                                
             
          

            </div>


            <h3 id="tab-title" style="margin-top: 2%;"><span>Information Sur l'Emploi</span></h3>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Type Emploi </label>
                  <div  id="tab-details"> 

                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->employeeStatus ;?>

                     <?php } else {?>

                      <!--<input type="text" class="form-control" name="employeeStatus" id="employeeStatus" placeholder="Type Emploi" value="<?php echo $customer->employeeStatus; ?>">-->
                     <select  id="employeeStatus" name="employeeStatus" class="form-control">
                                <option value="Salarie" id="Salarie" <?php if($customer->employeeStatus == "Salarie") echo "selected"; ?>>Salarié</option>
                                <option value="Pre-Salarie" id="Pre-Salarie" <?php if($customer->employeeStatus == "Pre-Salarie") echo "selected"; ?>>Pre-Salarié</option>
                                
                                <option value="Autre" id="Autre" <?php if($customer->employeeStatus == "Autre") echo "selected"; ?>>Autre</option>
                              </select> 

                    <?php } ?>
                
                 </div>
                </div>
              </div>
               <div class="col-md-3">
                <div class="form-group">
                <label>Nom de l’employeur</label>
                <div id="tab-details"> 
                <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                 echo $customer->employer_name;
                  } else { ?> 
                <input type="text" name="employer_name" class="form-control" id="employer_name" value="<?php echo $customer->employer_name ?? '';?>">

              <?php } ?>

                </div>
              </div>
              </div>

              <div class="col-md-3">
                <div class="form-group" style="margin-bottom:5px;">
                  <label>Secteur d’activité</label> 
                  <div id="tab-details"> 
                <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                 echo $customer->secteurs_id;
                  } else { ?> 
                <input type="text" name="secteurs_id" class="form-control" id="secteurs_id" value="<?php echo $customer->secteurs_id ?? '';?>" >

              <?php } ?>

                </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                    <label>Categ. Socio-Prof</label>
                    <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->categ;
                        } else { ?>     
                      <input type="text" class="form-control" id="categ" name="categ" placeholder="CATEG. SOCIO-PROF" value="<?php echo $customer->categ; ?>"> 
                    <?php } ?>
                    </div>
                        
                </div>
              </div>


            
            </div>
            <div class="row">


              <div class="col-md-3">
                <div class="form-group" style="margin-bottom:5px;">
                  <label>Type Employeur </label>
                  <div id="tab-details">
                  <?php if($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))){ if($loan_details['final_status']!="Disbursement"){ ?>
                    
                      <!--<input type="text" class="form-control " id="cat_employeurs" name="cat_employeurs" placeholder="Type Employeur" value="<?php echo $customer->cat_employeurs;?>">-->
                      <!--  <span style="color:red; font-size: 11px;">*Public Civil  &nbsp;&nbsp; *Public de Corps &nbsp;&nbsp;  *Prive &nbsp;&nbsp;  *Autres</span>-->
                   <select class="form-control"  id="cat_employeurs" name="cat_employeurs">
                       <option value="Prive 30" id="Prive 30" <?php if($customer->cat_employeurs == "Prive 30") echo "selected"; ?>>Prive 30</option>
                                 <option value="Prive 20" id="Prive 20" <?php if($customer->cat_employeurs == "Prive 20") echo "selected"; ?>>Prive 20</option>
                                <option value="Prive 25" id="Prive 25" <?php if($customer->cat_employeurs == "Prive 25") echo "selected"; ?>>Prive 25</option>
                                
                                 
                                <option value="Public Corps 25" id="Public Corps 25" <?php if($customer->cat_employeurs == "Public Corps 25") echo "selected"; ?>>Public Corps 25</option>
                                <option value="Public Civil 25" id="Public Civil 25" <?php if($customer->cat_employeurs == "Public Civil 25") echo "selected"; ?>>Public Civil 25</option>
                                <option value="Autres 20" id="Autres 20" <?php if($customer->cat_employeurs == "Autres 20") echo "selected"; ?>>Autres 20</option> 
                                <option value="Organisation internationales" id="Organisation internationales" <?php if($customer->cat_employeurs == "Organisation internationales") echo "selected"; ?>>Organisation internationales</option> 
                  </select>
                    <!--<input type="hidden" id="cat_emp_value" name="cat_emp_id" value="<?php echo $customer->cat_emp_id?>">-->
                <?php } }
                else { 
                  echo $customer->cat_employeurs;
                 } ?>

                 </div>
                </div>
              </div>


              <div class="col-md-3">

                 <div class="form-group" style="margin-bottom:5px;">
                   
                    <label>Type de Contrat </label>
                     <div id="tab-details">
                    <?php if($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))  && $loan_details['final_status']!="Disbursement"){ ?>
                      
                      <!--<input type="text" class="form-control " id="typeofcontract" name="typeofcontract" placeholder="Type de Contrat" value="<?php echo $customer->contract_type_id; ?>">-->
                    <select  id="typeofcontract" name="typeofcontract" class="form-control">
                                <option value="CDD" id="CDD" <?php if($customer->contract_type_id == "CDD") echo "selected"; ?>>CDD</option>
                                <option value="CDI" id="CDI" <?php if($customer->contract_type_id == "CDI") echo "selected"; ?>>CDI</option>
                                
                                <option value="Autre" id="Autre" <?php if($customer->contract_type_id == "Autre") echo "selected"; ?>>Autre</option>
                              </select> 
                    <?php } 
                else { 

                   echo $customer->contract_type_id;
                 } ?>
                    </div>
                  </div>  
              </div>

              <div class="col-md-3">
                <div class="form-group" style="margin-bottom:5px;">
                  <label>Adresse de l'employeur</label> 
                  <div id="tab-details"> 
                <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                 echo $customer->address_employer;
                  } else { ?> 
                <input type="text" class="form-control" name="address_employer" id="address_employer" value="<?php echo $customer->address_employer ?? '';?>" >

              <?php } ?>

                </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Numéro Professionel 1</label>
                  <div id="tab-details">
                  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                     echo $customer->numero1;
                      } else { ?> 
                    <input type="text" class="form-control" name="numero1" id="numero1" placeholder="TEL TRAVAIL 1" value="<?php echo $customer->numero1;?>">
                  <?php } ?>
                  </div>
                </div>
              </div>


             
             
            </div>

            <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label>Numéro Professionel 2</label>
                  <div id="tab-details">
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                     echo $customer->numero2;
                      } else { ?> 
                    <input type="text" class="form-control " name="numero2" id="numero2" placeholder="TEL TRAVAIL 2" value="<?php echo $customer->numero2;?>">
                     <?php } ?>
                  </div>
                </div>
              </div>

               <div class="col-md-3">
                <div class="form-group">
                  <label>Date d’embauche </label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo !empty($customer->employment_date) ? date('d-m-Y', strtotime($customer->employment_date)):"";
                        } else { ?> 
                    <input type="text" placeholder="dd-mm-yyyy" class="employment_dt  form-control" name="employment_date"   value="<?php echo !empty($customer->employment_date) ? date('d-m-Y', strtotime($customer->employment_date)) :"" ?>" >

                  <?php } ?>

                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date De Fin de Contrat/Départ à la Retraite</label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       if($customer->sate_end_contract_cdd != "")
                        echo date('d-m-Y', strtotime($customer->sate_end_contract_cdd));
                        } else { ?> 
                   <input type="text" class="edn_date_contract_cd  form-control" placeholder="DD-MM-YYYY" name="sate_end_contract_cdd" value="<?php if($customer->sate_end_contract_cdd) echo date('d-m-Y', strtotime($customer->sate_end_contract_cdd)); ?>" >
                 <?php }?>
                 </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Date de présence chez l’employeur actuel </label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                     if($customer->how_he_is_been_with_current_employer)  echo date('d-m-Y', strtotime($customer->how_he_is_been_with_current_employer));
                        } else { ?> 

                      <input type="text" class=" form-control"  name="current_emp" value="<?php if($customer->how_he_is_been_with_current_employer) echo date('d-m-Y', strtotime($customer->how_he_is_been_with_current_employer)); ?>">
                      
                     <?php }?>
                      
                    </div>
                </div>
              </div>

              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Nombre d’année d’expérience professionnelle </label>
                  <div id="tab-details"> 
                   <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->years_professionel_experience;
                        } else { ?> 
                        <input type="number" name="years_professionel_experience" class="form-control" value="<?php echo $customer->years_professionel_experience ?>" min="0">
                      <?php } ?>                                
                    </div>
                </div>
              </div>
            

			     </div>
            <div class="row">

             
               <div class="col-md-3">
                <div class="form-group">
                  <label>Salaire net </label>
                  <div id="tab-details">  

                  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->emp_net_salary;
                        } else { ?> 
                         <input type="number" name="emp_net_salary" class="form-control"  value="<?php if($customer->emp_net_salary) echo $customer->emp_net_salary; ?>" min="0">
                       <?php }?>
                       </div>
                </div>
              </div>

              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Age de retraite prévu </label>
                  <div id="tab-details"> 

                  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->retirement_age_expected;
                        } else { ?> 

                         <input type="number" name="retirement_age_expected"   class="form-control"  value="<?php echo $customer->retirement_age_expected ?>" min="18">
                      <?php } ?>
                      </div>
                </div>
              </div>


           
              
              <div class="col-md-3">
                <div class="form-group">
                  <label>Emploi exercé </label>
                  <div id="tab-details"> 

                  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->employeeOccupation;
                        } else { ?> 

                         <input type="text" class="form-control" name="employeeOccupation"   value="<?php echo $customer->employeeOccupation ?>" >
                      <?php } ?>
                      </div>
                </div>
              </div>


               <div class="col-md-3">
                  <div class="form-group">
                    <label>Nom Ancien Employeur</label>
                    <div id="tab-details">
                       <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->ancianemployer;
                        } else { ?> 
                      <input type="text" class="form-control" name="ancianemployer" id="ancianemployer" placeholder="Nom Ancien Employeur" value="<?php echo $customer->ancianemployer; ?>">
                    <?php } ?>
                    </div>
                  </div>
                </div>
              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Fonction <span style="color:red">*</span></label>
                  <div id="tab-details"> 

                  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->employeePosition;
                        } else { ?> 

                         <input type="text" class="form-control" name="employeePosition"   value="<?php echo $customer->employeePosition ?>" >
                      <?php } ?>
                      </div>
                </div>
              </div>
              </div>

              <div class="row">

               
              </div>

           
            <h3 id="tab-title" style="margin-top: 2%;"><span>Information Sur le Compte Bancaire</span></h3>
            <div class="row">
              <div class="col-md-3">
                 <div class="form-group">
                  <label>Type de compte </label>
              <?php
              $Typeid = array(
                  "Compte d’épargne",
                  "Compte d’épargne régulier",
                  "Compte courant",
                  "Compte de dépôt récurrent",
                  
              ); ?>

               <div id="tab-details">
          <?php
          if($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status']!="Disbursement"){ ?>
            
            <input type="text" class="form-control" name="account_type" id="account_type" placeholder="Type de compte" value="<?php echo $customer->account_type ; ?>" readonly >
              <!-- <select class="form-control" name="account_type" id="account_type" required>
              <?php foreach($Typeid as $adnfo){
          if(trim($customer->account_type) == $adnfo){ 
              $select="selected";}else{$select="";}
              echo '<option value="'.$adnfo.'" '.$select.'>'.$adnfo.'</option>';
                  }?>
              </select> -->
          <?php } else{
                  echo $customer->account_type;
              }?>  

                </div>                                 
              </div>   
           </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label> Agence bancaire </label>
                  <div id="tab-details">  

                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->bank_name;
                        } else { ?> 

                     <input type="text" class="form-control " name="bank_name" id="bank_name" placeholder="Agence bancaire" value="<?php echo $customer->bank_name; ?>" readonly >
                    <!-- <select  class="form-control" name="bank_name" id="bank_name" style="width:98%" required >
                      <option value="">Select</option>
                        <?php foreach($branch_record as $type){ 
                          if($type['bid'] ==  $customer->bank_name)
                          {
                            $select = "selected";
                          }
                          else{
                            $select = "";
                          }
                          echo  '<option value="'.$type['bid'].'"'.$select.'>'.$type['branch_name'].'</option>';
                        }?>
                    </select>  -->

                  <?php } ?>

                   <!--  <input type="text" required name="bank_name" value="<?php echo $customer->bank_name ?>"></span></h3> -->
                </div>
              </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Téléphone agence bancaire</label>
                  <div id="tab-details">  

                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->bank_phone;
                        } else { ?> 

                          <input type="text" class="form-control" id="bank_phone" name="bank_phone" placeholder="Téléphone agence bancaire" value="<?php echo $customer->bank_phone; ?>" readonly >
                  <!--   <input type="text"  class="form-control addvalidate" id="bank_phone" name="bank_phone" placeholder="" value="<?php echo $customer->bank_phone ?>" maxlength="11" pattern="\d{11}"  onkeypress="return istelNumber(event)" />  
                            <input type="hidden" id="item_4" name="bankphone_countrycode" value=""> -->
                          <!-- <span id="bankphone_valid-msg" class="hide">✓ Valid</span>
                              <span id="bankphone_error-msg" class="hide"></span>  -->

                      <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date ouverture de compte </label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo !empty($customer->opening_date) ? date("d-m-Y", strtotime($customer->opening_date)):"";
                        } else { ?> 
                     <input type="text" class="opening_dt form-control"  name="opening_date" value="<?php echo !empty($customer->opening_date) ? date("d-m-Y", strtotime($customer->opening_date)):""; ?>" readonly >
                   <?php } ?>
                   </div>
                </div>
              </div>
               
            </div>
            <div class="row">

               <div class="col-md-3">
                <div class="form-group">
                  <label>Code Bqe</label>
                  <div id="tab-details"> 
                  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->code_bqe;
                        } else { ?>                         
                    <input type="text" class="form-control addvalidate" id="code_bqe" name="code_bqe" placeholder="Code Bqe" onkeyup="Ribfetch(1,this);" value="<?php echo $customer->code_bqe; ?>" readonly >
                  <?php } ?>
                  </div>
                </div>
              </div>

               <div class="col-md-2">
                <div class="form-group">
                  <label>Code Agc</label>    
                  <div id="tab-details">
                  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->code_agence;
                        } else { ?>                       
                   <input type="text" class="form-control addvalidate" id="code_agence" name="code_agence" placeholder="Code agence Atlas" onkeyup="Ribfetch(2,this);" value="<?php echo $customer->code_agence; ?>" readonly > 
                     <?php } ?>
                  </div>
                </div>
              </div>

              
              <div class="col-md-3">
                <div class="form-group">
                  <label>Numéro de compte</label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->account_no;
                        } else { ?> 
                    <input type="text" name="account_number" class="form-control" value="<?php echo $customer->account_no ?>"  onkeypress="return isNumber();" readonly readonly >
                      <?php } ?>
                  </div>
                </div>
              </div>

             
               <div class="col-md-2">
                <div class="form-group">
                  <label>RIB </label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->rib4;
                        } else { ?> 
                   <input type="text" name="rib4" class="form-control" value="<?php echo $customer->rib4 ?>" readonly >
                 <?php } ?>
                  </div>
                </div>
              </div>

             
              <div class="col-md-2">
                <div class="form-group">
                  <label>Devise</label>
                  <div id="tab-details">
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->devise;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="devise" name="devise" placeholder="Devise" value="XAF" onkeyup="Ribfetch(5,this);" readonly >
                  <?php } ?>
                  </div>
                </div>
              </div>
              
             

              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Code de la banque </label>
                  <div id="tab-details">  
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->information;
                        } else { ?> 
                   <input type="text" class="form-control" name="another_test" value="<?php echo $customer->information ?>" readonly >
                    <?php } ?>
                 </div>
                </div>
              </div>
              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Code de l’agence </label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->field_1;
                        } else { ?> 
                   <input type="text" name="field_1" class="form-control" value="<?php echo $customer->field_1 ?>" readonly >
                 <?php } ?>
                 </div>
                </div>
              </div>
             
            </div>

            <div class="row">

               <div class="col-md-3">
                        <div class="form-group">
                          <label>N° Carte Bancaire</label>  
                           <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->carte_bancaire;
                        } else { ?> 
                    <input type="text"  class="form-control addvalidate" id="carte_bancaire" name="carte_bancaire" placeholder="Input text"  value="<?php echo $customer->carte_bancaire ?>" />
                      <?php } ?>
                  </div>
                
              </div>

                  </div>


              <div class="col-md-3">
                <div class="form-group">
                  <label>Identifiant National </label>
                  <div id="tab-details">  
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->ibu;
                        } else { ?> 
                    <input type="text" name="ibu" class="form-control" value="<?php echo $customer->ibu ?>" placeholder="Identifiant National" readonly >
                      <?php } ?>
                  </div>
                </div>
              </div>
           
            
              <div class="col-md-3">
                <div class="form-group">
                  <label>Nature de la Relation </label>
                  <div id="tab-details">  
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->nature_relation;
                        } else { ?> 

                          <input type="text" class="form-control" id="nature_relation" name="nature_relation" value="<?php echo $customer->nature_relation;?>" placeholder="Nature de la Relation" readonly >
                      <!--   <select  class="form-control addvalidate" id="nature_relation" name="nature_relation">
	                              <option value="Client" id="Client" <?php if($customer->nature_relation == 'Client'){echo "selected";}?>>Client</option>
	                              <option value="Prospect" id="Prospect" <?php if($customer->nature_relation == 'Prospect'){echo "selected";}?>>Prospect</option>
	                              
	                            </select> -->
                 <!--  <input type="text" name="nature_relation" class="form-control" value="<?php echo $customer->nature_relation ?>">   -->
                 <?php } ?>
                 </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Categorie Clientèle </label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->cat_client;
                        } else { ?> 

                         <input type="text" class="form-control addvalidate" id="cat_client" name="cat_client" placeholder="Categorie Clientèle" value="<?php echo $customer->cat_client; ?>" readonly >
                       <!--  <select  class="form-control addvalidate" id="cat_client" name="cat_client">
	                              <option value="331-Fonctionnaire" id="331-Fonctionnaire" <?php if($customer->cat_client == '331-Fonctionnaire'){echo "selected";}?>>331-Fonctionnaire</option>
	                              <option value="333-Fonctionnaire-Retraité" id="333-Fonctionnaire-Retraité" <?php if($customer->cat_client == '333-Fonctionnaire-Retraité'){echo "selected";}?>>333-Fonctionnaire-Retraité</option> 
	                              <option value="320-Particulier" id="320-Particulier" <?php if($customer->cat_client == '320-Particulier'){echo "selected";}?>>320-Particulier</option>
	                              <option value="332-Retraité" id="332-Retraité" <?php if($customer->cat_client == '332-Retraité'){echo "selected";}?>>332-Retraité</option> 
	                              <option value="325-Ex-Agent BICIG" id="325-Ex-Agent BICIG" <?php if($customer->cat_client == '325-Ex-Agent BICIG'){echo "selected";}?>>325-Ex-Agent BICIG</option>
	                              
	                            </select> -->
                   <!--<input type="text" name="cat_client" class="form-control" value="<?php echo $customer->cat_client ?>">-->
                 <?php } ?>
                    </div>
                </div>
              </div>
              
             

		                
            </div>

            <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label> Type De Clientele</label>
                  <div id="tab-details">
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->typeDeClientele;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="typeDeClientele" name="typeDeClientele" placeholder="Type De Clientele" value="<?php echo $customer->typeDeClientele;?>" readonly >
                  <?php } ?>
                  </div>
                </div>
              </div>


              <div class="col-md-3">
                <div class="form-group">
                  <label>Etat Dossier KYC </label> 
                  <div id="tab-details">
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->dossierkyc;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="dossierkyc" name="dossierkyc" placeholder="Input Etat Dossier KYC" value="<?php echo $customer->dossierkyc;?>" readonly >
                      <?php } ?>
                  </div>
                </div>
              </div>
               <!-- <div class="col-md-3">
                <div class="form-group">
                  <label>Etat Dossier KYC </label>
                  <div id="tab-details"> 
                      <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                         echo $customer->dossierkyc;
                          } else { ?> 
                          <select  class="form-control addvalidate" id="dossierkyc" name="dossierkyc">
                            <option value="2-DOSSIER COMPLET" id="2-DOSSIER COMPLET" <?php if($customer->dossierkyc == '2-DOSSIER COMPLET'){echo "selected";}?> >2-DOSSIER COMPLET</option>
                            <option value="1-A PRECISER" id="1-A PRECISER" <?php if($customer->dossierkyc == '1-A PRECISER'){echo "selected";}?>>1-A PRECISER</option> 
                            <option value="2-DOSSIER COMPLET" id="2-DOSSIER COMPLET" <?php if($customer->dossierkyc == '2-DOSSIER COMPLET'){echo "selected";}?>>2-DOSSIER COMPLET</option>
                                  
                          </select>
                    
                   <?php } ?>
                      </div>
        
                </div>
              </div> -->

                <div class="col-md-3">
                  <div class="form-group">
                      
                    <label>Date Prochaine Revision </label>
                    <div id="tab-details"> 
                      <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                         echo !empty($customer->prochaineRevision) ? date('d-m-Y', strtotime($customer->prochaineRevision)):"";
                          } else { ?> 
                     <input type="text"  class="form-control addvalidate" id="prochaineRevision" name="prochaineRevision" placeholder="DD-MM-YYYY" value="<?php echo !empty($customer->prochaineRevision) ? date('d-m-Y', strtotime($customer->prochaineRevision)):""; ?>" readonly readonly />
                   <?php } ?>
                      </div>
          
                  </div>
                </div>
              
              <div class="col-md-3">
                <div class="form-group">
                  <label>Selection Clientelle</label>
                  <div id="tab-details">  
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->segmentation;
                        } else { ?> 
                       <!--  <select  class="form-control addvalidate" id="segmentation" name="segmentation">
	                              <option value="GRP-GRAND-PUBLIC" id="GRP-GRAND-PUBLIC" <?php if($customer->segmentation == 'GRP-GRAND-PUBLIC'){echo "selected";}?>>GRP-GRAND-PUBLIC</option>
	                              <option value="JEU-JEUNE" id="JEU-JEUNE" <?php if($customer->segmentation == 'JEU-JEUNE'){echo "selected";}?>>JEU-JEUNE</option> 
	                              <option value="DEV-EN DEVENIR" id="DEV-EN DEVENIR" <?php if($customer->segmentation == 'DEV-EN DEVENIR'){echo "selected";}?>>DEV-EN DEVENIR</option>
	                              <option value="TRAD-TRADITIONNEL" id="TRAD-TRADITIONNEL" <?php if($customer->segmentation == 'TRAD-TRADITIONNEL'){echo "selected";}?>>TRAD-TRADITIONNEL</option> 
	                              <option value="FPO-FORT POTENTIEL" id="FPO-FORT POTENTIEL" <?php if($customer->segmentation == 'FPO-FORT POTENTIEL'){echo "selected";}?>>FPO-FORT POTENTIEL</option> 
	                              <option value="PRE-PRESTIGE" id="PRE-PRESTIGE" <?php if($customer->segmentation == 'PRE-PRESTIGE'){echo "selected";}?>>PRE-PRESTIGE</option>
	                              <option value="NEANT" id="NEANT" <?php if($customer->segmentation == 'NEANT'){echo "selected";}?>>NEANT</option> 
	                              
	                            </select> -->
                   <input type="text" class="form-control addvalidate" id="segmentation" name="segmentation" placeholder="Selection Clientell" value="<?php echo $customer->segmentation; ?>" readonly >
                      <?php } ?>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Cotation Risque</label>
                  <div id="tab-details"> 
                  <?php // echo $customer->risk_level;?>
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->risk_level;
                        } else { ?> 
                       <!--  <select  class="form-control addvalidate" id="risk_level" name="risk_level">
	                              <option value="8-FAIBLE" id="8-FAIBLE" <?php if($customer->risk_level == '8-FAIBLE'){echo "selected";}?>>8-FAIBLE</option>
	                              <option value="9-PREOCCUPANT" id="9-PREOCCUPANT" <?php if($customer->risk_level == '9-PREOCCUPANT'){echo "selected";}?>>9-PREOCCUPANT</option> 
	                              <option value="10-TRES PREOCCUPANT" id="10-TRES PREOCCUPANT" <?php if($customer->risk_level == '10-TRES PREOCCUPANT'){echo "selected";}?>>10-TRES PREOCCUPANT</option>
	                              <option value="Néant" id="NEANT" <?php if($customer->risk_level == 'Néant'){echo "selected";}?>>NEANT</option>    
	                              
	                            </select> -->
                   <input type="text" name="risk_level" class="form-control" value="<?php echo $customer->risk_level ?>" readonly >
                    <?php } ?>
                 </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                    <?php 
                    // print_r($customer)
                    ;?>
                  <label>Date de Cotation</label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo !empty($customer->risk_level_date) ? date('d-m-Y', strtotime($customer->risk_level_date)):"";
                        } else { ?> 
                   <input type="text" class="form-control" name="risk_level_date" value="<?php echo !empty($customer->risk_level_date) ? date('d-m-Y', strtotime($customer->risk_level_date)):""; ?>" readonly >
                 <?php } ?>
                 </div>
                </div>
              </div>
              <div class="col-md-3 hidden">
                <div class="form-group">
                  <label>Particularités </label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->particularity;
                        } else { ?> 
                        
                        
                        <select  class="form-control addvalidate" id="particularity" name="particularity">
                                  <option value="Néant" id="Néant" <?php if($customer->particularity == 'Néant'){echo "selected";}?>>Néant</option>
	                              <option value="S.PAR" id="S.PAR" <?php if($customer->particularity == 'S.PAR'){echo "selected";}?>>S.PAR</option>
	                              <option value="PCP" id="PCP" <?php if($customer->particularity == 'PCP'){echo "selected";}?>>PCP</option> 
	                              <option value="SSF" id="SSF" <?php if($customer->particularity == 'SSF'){echo "selected";}?>>SSF</option>
	                              <option value="S.TOT" id="S.TOT" <?php if($customer->particularity == 'S.TOT'){echo "selected";}?>>S.TOT</option>    
	                              <option value="INT.B" id="INT." <?php if($customer->particularity == 'INT.'){echo "selected";}?>>INT.</option>
	                              <option value="DOUTX (Cotation 11 & 12)" id="DOUTX (Cotation 11 & 12)" <?php if($customer->particularity == 'DOUTX (Cotation 11 & 12)'){echo "selected";}?>>DOUTX (Cotation 11 & 12)</option> 
	                              <option value="EDX (Cotation 11 & 12)" id="EDX (Cotation 11 & 12)" <?php if($customer->particularity == 'EDX (Cotation 11 & 12)'){echo "selected";}?>>EDX (Cotation 11 & 12)</option>
	                              <option value="CER (Cotation 11 & 12)" id="CER (Cotation 11 & 12)" <?php if($customer->particularity == 'CER (Cotation 11 & 12)'){echo "selected";}?>>CER (Cotation 11 & 12)</option> 
	                               <option value="X (Cotation 10) Portefeuille NA" id="X (Cotation 10) Portefeuille NA" <?php if($customer->particularity == 'X (Cotation 10) Portefeuille NA'){echo "selected";}?>>X (Cotation 10) Portefeuille NA</option> 
	                              <option value="DCD" id="DCD" <?php if($customer->particularity == 'DCD'){echo "selected";}?>>DCD</option>
	                              <option value="S.ARR" id="S.ARR" <?php if($customer->particularity == 'S.ARR'){echo "selected";}?>>S.ARR</option> 
	                              <option value="ATD" id="ATD" <?php if($customer->particularity == 'ATD'){echo "selected";}?>>ATD</option> 
	                            </select>
	                            
                <!--   <input type="text" class="form-control" name="special_observation" value="<?php echo $customer->special_observation ?>"> -->
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                   
                 <?php } ?>
                    </div>
                </div>
              </div>
              
              <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Montant Autorisation en Code Atlas</label>
		                      <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->authCode;
                        } else { ?> 
                   <input type="text"  class="form-control addvalidate" id="authCode" name="authCode" placeholder="Input Montant Autorisation en Code Atlas" value="<?php echo $customer->authCode ?>" readonly />
                 <?php } ?>
                    </div>
							
		                    </div>
		                  </div>

		                  <div class="col-md-3">
		                    <div class="form-group">
		                      <label>Date Echeance Autorisation</label>
		                      <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo !empty($customer->authDate) ? date('d-m-Y', strtotime($customer->authDate)) :"";
                        } else { ?> 
                   <input type="text"  class="form-control addvalidate" id="authDate" name="authDate" placeholder="DD-MM-YYYY" value="<?php echo !empty($customer->authDate) ? date('d-m-Y', strtotime($customer->authDate)) :""; ?>" readonly />
                 <?php } ?>
                    </div>
								
		                    </div>
		                  </div>
            </div>


            <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label>Nom Gestionnaire</label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->nomGestionnaire;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="nomGestionnaire" name="nomGestionnaire" placeholder="Nom Gestionnaire" value="<?php echo $customer->nomGestionnaire;?>" readonly >
                      <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Code Gestionnaire</label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->codeGestionnaire;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="codeGestionnaire" name="codeGestionnaire" placeholder="Code Gestionnaire" value="<?php echo $customer->codeGestionnaire;?>" readonly >
                  <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>État Autorisation </label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || $param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->etatAutorisation;
                        } else { ?> 
                   <input type="text" class="form-control addvalidate" id="etatAutorisation" name="etatAutorisation" placeholder="État Autorisation" value="<?php echo $customer->etatAutorisation;?>" readonly >
                 <?php } ?>
                  </div>
        
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label> Surveillance </label>
                  <div id="tab-details">
                   <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->Surveillance;
                        } else { ?>  
                  <input type="text" class="form-control addvalidate" id="Surveillance" name="Surveillance" placeholder="Surveillance" value="<?php echo $customer->Surveillance;?>" readonly >
                     <?php } ?>
                  </div>
        
                </div>
              </div>


            </div>

            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Deces </label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->Deces;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="Deces" name="Deces" placeholder="Deces" value="<?php echo $customer->Surveillance;?>" readonly >
                     <?php } ?>
                  </div>
        
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Contentieux</label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->Contexntieux;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="Contexntieux" name="Contexntieux" placeholder="Contentieux" value="<?php echo $customer->Contexntieux;?>" readonly >
                      <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label> Interdit </label>
                  <div id="tab-details"> 
                     <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->Interdit;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="Interdit" name="Interdit" placeholder="Interdit" value="<?php echo $customer->Interdit;?>" readonly >
                  <?php } ?>
                  </div>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Indicateur Pep</label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->pep;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="pep" name="pep" placeholder="Indicateur Pep" value="<?php echo $customer->pep;?>" readonly >
                     <?php } ?>
                  </div>  
      
                </div>
              </div>

            </div>

            <div class="row">

              <div class="col-md-3">
                <div class="form-group">
                  <label>Niveau De Vigilance</label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo $customer->niveiu;
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="niveiu" name="niveiu" placeholder="Niveau De Vigilance" value="<?php echo $customer->niveiu;?>" readonly >
                     <?php } ?>
                  </div>
                 </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                <label> Date De Derniere Evaluation</label>
                  <div id="tab-details"> 
                    <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                       echo !empty($customer->datedernier) ? date('d-m-Y', strtotime($customer->datedernier)):"";
                        } else { ?> 
                    <input type="text" class="form-control addvalidate" id="datedernier" name="datedernier" placeholder="Date De Derniere Evaluation" value="<?php echo !empty($customer->datedernier) ? date('d-m-Y', strtotime($customer->datedernier)):"";?>" readonly >
                     <?php } ?>
                  </div>
                </div>
              </div>


            </div>

              
            <div class="row">

              <div class="col-md-12">


                <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                    echo " ";
                      }else{?> 
                 <div class="text-center">
                     <button type="submit" class="btn btn-default loan-back" sytle ="margin-top: 30px;margin-bottom: 20px;"><img src="<?php echo base_url('assets/img/select2-spinner.gif'); ?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Mise à Jour</button>
               </div>  

               <?php } ?>    
                </div>     
                   

                     
               
          
            </div>        
             <!--  </form>     -->                   
       <!--  </div> -->
    </form>
  </div>

    

          <!--Tab-3 Details-->

        <div class="tab-pane fade" id="tab-3">
          <h3 id="tab-title"><span>DOCUMENTS SYSTEMES</span></h3>
          <small class="outputmsg">
          </small>
          <div class="row">
            <div class="col-lg-12">
                <?php 
                if($param == "edit" && $loan_details['final_status'] != "Disbursement"){
                ?>
            <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Charger <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image" style="display:none">
              <input id="systemdocsfiles" type="file" multiple="" name="systemdocsfiles[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">
            </label>
             <?php }?>
            <input type="hidden" id="getcid"  name="getcid" value="">

              <button type="button" file_type="system_docs" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Aperçu </button>

              <a href="<?php echo base_url('Customer_Product/download_documents/credit_confort/system_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Télécharger</a>
         

                 <table class="table table-bordered table-hover" id="table_auto">
                                    <tr id="row_0">
                                      <td>  
                                      <?php if(!empty($documents['system_docs'])){
                                            $count = 1 ;
                                          foreach($documents['system_docs'] as $key=>$doc) {
                                        ?>                                    
                                        <div class="row">
                                          <?php 
                                          if($doc['document_id']=='203'){?>
                                             <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url($doc['document_url'].'/'.$loan_details['loan_id_temp']);?>','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return"> <?php echo $count++ ; ?> - <?php echo ucwords($doc['document_name'])?></a></span>
                                              </div>
                                         <?php }else{
                                          
                                          ?>
                                          <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url($doc['document_url'].'/'.$loan_details['loan_id']);?>','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return"> <?php echo $count++ ; ?> - <?php echo ucwords($doc['document_name'])?></a></span>
                                          </div>
                                        <?php }?>
                                        </div>

                                      <?php }
                                        }
                                      ?>
                                       </td>
                                    </tr>
                                  </table>
            </div>
          </div>
         
          <h3 id="tab-title" style="margin-top:2%;"><span>CHECK LIST DOCUMENTS A FOURNIR</span></h3>
          <small class="outputmsg2"></small>
          <div class="row">
            <div class="col-lg-12">
                <?php 
                if($param == "edit" && $loan_details['final_status'] != "Disbursement"){
                ?>
            <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Charger  <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_imagechecklist_details" style="display:none">
              <input type="file" multiple="" name="check_list_documents[]" id="check_list_documents" accept="application/msword,application/pdf, application/msword,  application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">
            </label>
              <?php } ?>
  
              <button type="button" file_type="checklist_docs" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Aperçu </button>

              <a href="<?php echo base_url('Customer_Product/download_documents/credit_confort/checklist_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Télécharger</a>
          
            </div>
          </div>

            <table class="table table-bordered table-hover" id="table_auto">
                                    <tr id="row_0">
                                      <td>
                                        <?php if(!empty($documents['checklist_docs'])) {
                                           
                                            $count1 = 1;
                                            foreach($documents['checklist_docs'] as $key=>$doc2){

                                          ?>
                                          <div class="row">
                                            <div class="col-lg-6">
                                              <span><a href="JavaScript:void(0);"><?php echo $count1 ;?>- <?php echo ucwords($doc2['document_name'])?> </a></span> 
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="form-group">

                                                <label class="switch">
                                                  <input type="checkbox" class="checklist_radio" id="check_radio_<?php echo $count1;?>" value="1" 
                                                  <?php if($documents['checklist_status'][$key] == "1") echo "checked";?>  
                                                   <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                                                      echo "disabled" ; }?>  >
                                                  <span class="slider round "></span>
                                                </label>
                                               

                                                <img src="<?php echo base_url("assets/img/loading.gif");?>" class="checklist_loading_status" style="display:none">

                                                

                                              </div>
                                            </div>
                                          </div>

                                          <?php $count1++;}
                                            }
                                          ?>
                                                                                                               
                                      </td>
                                    </tr>
                                  </table>
           
          
        </div>
         <!-- End Tab-3 section -->

        <!-- Start Tab-4 section -->
        <div class="tab-pane fade" id="tab-4">
            <div class="row">
                <div class="col-lg-12">
                    <section id="cd-timeline" class="cd-container">
                       <?php $i=1; foreach ($tracking_timeline as $timeline) { ?>
                        <div class="cd-timeline-block">
                            <div class="cd-timeline-img cd-picture">                              
                              <?php 
                                 if($timeline['content_type']=='text'){
                                  echo '<i class="fa fa-file"></i>';                             
                                 }
                                 else if($timeline['content_type']=='file'){
                                  echo '<i class="fa fa-file-archive-o"></i>';
                                  //echo $timeline['content_type'];
                                }
                                else if($timeline['content_type']=='image'){
                                  echo '<i class="fa fa-photo fa-2x"></i>';
                                  //echo $timeline['content_type'];
                                }
                                else if($timeline['content_type']=='video'){
                                  echo '<i class="fa fa-video-camera fa-2x"></i>';
                                  //echo $timeline['content_type'];
                                }
                                else if($timeline['content_type']=='address'){
                                  echo '<i class="fa fa-map-marker"></i>';
                                  //echo $timeline['content_type'];
                                }else if($timeline['content_type']=='edit'){
                                  echo '<i class="fa fa-pencil-square-o"></i>';
                                  //echo $timeline['content_type'];
                                }else if($timeline['content_type']=='mail'){
                                  echo '<i class="fa fa-inbox"></i>';
                                  //echo $timeline['content_type'];
                                }
                                else if($timeline['content_type']=='approve'){
                                  echo '<i class="fa fa-check"></i>';
                                  //echo $timeline['content_type'];
                                }else if($timeline['content_type']=='reject'){
                                  echo '<i class="fa fa-times"></i>';
                                  //echo $timeline['content_type'];
                                }else if($timeline['content_type']=='review'){
                                  echo '<i class="fa fa-comment-o"></i>';
                                  //echo $timeline['content_type'];
                                }                                              
                                else{
                                  echo '<i class="fa fa-file"></i>';
                                 // echo 'lll '. $timeline['content_type'];
                                }
                              ?> 
                            </div>
                            <div class="cd-timeline-content">
                                <h2>ÉTAPE <?php echo $i;?></h2>
                                <span style="font-weight:bold">User: </span>
                                <span><?php //echo $timeline['field_data'];?> (<?php echo $timeline['first_name'] ?: '';?> <?php echo $timeline['last_name'] ?: '';?>) </span>
                                <?php if($timeline['type'] == "assign_to_myself"){?>
                                <p style="color:#337ab7"><span style="font-weight:bold">Commentaire :</span><?php echo $timeline['comment'];?></p>
                                <?php }else if($timeline['type'] == "Demande de retraitement" || $timeline['type'] == "Annulé" || $timeline['type'] == "Abandonner"){?>
                                <p style="color:red"><span style="font-weight:bold">Commentaire :</span><?php echo $timeline['comment'];?></p>
                                <?php }else if($timeline['type'] == "assign_to_account_mgr"){?>
                                <p style="color:orange"><span style="font-weight:bold">Commentaire :</span><?php echo $timeline['comment'];?></p>
                                <?php }else if($timeline['type'] == "overide"){?>
                                 <p style="color:#9972b5"><span style="font-weight:bold">Commentaire :</span><?php echo $timeline['comment'];?></p>
                                <?php } else { ?>
                                <p><span style="font-weight:bold">Commentaire :</span><?php echo $timeline['comment'];?></p>
                                <?php }?>
                                <span class="cd-date"><?php echo date("d-m-Y H:i:s", strtotime($timeline['created_at'])); ;?></span>
                            </div>
                        </div>
                      <?php $i++;} ?>
                    </section>
                </div>
            </div>

        </div>

        <!-- End Tab-4 section -->

        <!-- End Tab-5 section -->

        <div class="tab-pane fade" id="tab-5">
          <!--<h3 id="tab-title"><span>List</span></h3>-->

          <small class="analysismsg2"></small>
          <div class="row">
            <div class="col-lg-12">
              <!--<label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="analysisfilesloder2" style="display:none">-->

              <!--  <input id="risk_analysisfiles" type="file" multiple="" name="risk_analysisfiles[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">-->

              <!--</label>           -->

              <!--  <button type="button" file_type = "risk_analysis_docs" class="btn btn-sm btn-default preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>-->

              <!--  <a href="<?php echo base_url('Customer_Product/download_documents/credit_conso/risk_analysis_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>-->


               <table class="table table-bordered table-hover" id="table_auto" hidden>
                                    <tr id="row_0">
                                      <td><form action="#">
                                        <?php if(!empty($documents['analysis_docs'])) {
                                          $count2 = 1;
                                           foreach($documents['analysis_docs'] as $key=> $doc3){
                                        ?>
                                          <div class="row">
                                            <div class="col-lg-6"> <span><a href="JavaScript:void(0);"><?php echo $count2?>- <?php echo ucwords($doc3['document_name'])?></a></span>
                                              
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="form-group">

                                                 <label class="switch">
                                                  <input type="checkbox" class="risk_status" id="risk_status_<?php echo $count2;?>" value="1" 
                                                  <?php if($documents['risk_status'][$key] == "1") echo "checked";?>  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){
                                                      echo "disabled" ; }?> >
                                                  <span class="slider round "></span>
                                                </label>

                                                
                                                 <img src="<?php echo base_url("assets/img/loading.gif");?>" class="risk_loading_status" style="display:none">
                                              </div>
                                            </div>
                                          </div>
                                        <?php $count2++;} 
                                            }
                                        ?>

                                         
                                        </form>
                                      </td>
                                    </tr>
                                   
                                  </table>


          

          
    
    <div class="row">
            <div class="col-md-12">
              <h3 id="tab-title" style="margin-top:2%;"><span>Engagements</span></h3>
              <?php 
             // print_r($loan_details);
              ?>
              <div class="col-md-6 hidden">
								<div class="table-responsive">
									<table class="table table-condensed table-hover">
										<thead>
											<tr class="info">
												<th><span>Salaire Résiduel Moyen</span></th>
												<th><span>Mois précédent (S1)</span></th>
												<th><span>Mois en cours (S2)</span></th>
												<th></th>
											</tr>
										</thead>
										<tbody>
											<form id="FormAnalyse1" method="post">
											
											<?php if($risk_analysis['amount_a_s1'] != "" || $risk_analysis['amount_a_s2'] != ""){
													$a_s1 = json_decode($risk_analysis['amount_a_s1']);
													$a_s2 = json_decode($risk_analysis['amount_a_s2']);

													$i=1;
													foreach($a_s1 as $key=>$s1){
														if($key == "0")
														{
															?>
															<tr class="analyserow_a">
																<td> A - Salaire Viré + Primes (Salaire et Bonus) </td>
																<td>
																	<input type="number" value="<?php echo $s1?>" name="amount_a1[]" class="form-control amount_a1 fmt_number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/>
																</td>
																<td>
																	<input type="number" value="<?php echo $a_s2[$key]?>" name="amount_a2[]" class="form-control amount_a2 fmt_number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/>
																</td>
																<td>
																    <?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))){ ?><button type="button" class="btn btn-primary addrow_a">+</button><?php } ?></td>
														</tr>

															<?php
														}else{


												?>
											<tr class="tr_a<?php echo $i;?>"> <td> </td><td><input type="number" value="<?php echo $s1?>" name="amount_a1[]" class="form-control amount_a1 fmt_number" min="0" required onkeydown="calculateSum()" onkeyup="calculateSum()" onblur="save_average_salary_riskform()" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/></td>
											<td><input type="number" value="<?php echo $a_s2[$key]?>" name="amount_a2[]" class="form-control amount_a2 fmt_number" min="0" required onkeydown="calculateSumS2()" onkeyup="calculateSumS2()" onblur="save_average_salary_riskform()" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/></td>
											<td>
											    <?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))){ ?>
											    <button type="button" class="btn btn-primary" onclick="removerow_a('<?php echo $i;?>');">-</button>
											    <?php } ?>
											</td></tr>
											<?php } 

											$i++;
										} }else {?>

												<tr class="analyserow_a">
												<td> A - Salaire Viré + Primes (Salaire et Bonus) </td>
												<td>
												
												 <input type="number" value="" name="amount_a1[]" class="form-control amount_a1 fmt_number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/>
												
												</td>
												<td>
												 <input type="number" value="" name="amount_a2[]" class="form-control amount_a2 fmt_number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/>
													
												</td>
												<td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))){ ?><button type="button" class="btn btn-primary addrow_a">+</button><?php } ?></td>
											</tr>
											<?php }


											if($risk_analysis['amount_b_s1'] != "" || $risk_analysis['amount_b_s2'] != ""){
													$b_s1 = json_decode($risk_analysis['amount_b_s1']);
													$b_s2 = json_decode($risk_analysis['amount_b_s2']);
													$j=1;
													foreach($b_s1 as $key=>$bs1){
														if($key == "0")
														{
											?>

											<tr class="analyserow_b">
												<td> B -  Échéances Mensuelles  BICIG </td>
												<td>
													<input type="number" value="<?php echo $bs1?>" name="amount_b1[]" class="form-control amount_b1 fmt_number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/>
												</td>
												<td>
													<input type="number" value="<?php echo $b_s2[$key]?>" name="amount_b2[]" class="form-control amount_b2 fmt_number" min="0" onblur="save_average_salary_riskform(this)" required <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?> />
													
												</td>
												 <td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))){ ?><button type="button" class="btn btn-primary addrow_b">+</button><?php } ?></td>
											</tr>

												<?php } else { ?>
													<tr class="tr_b<?php echo $j?>"> <td> </td>
													<td><input type="number" value="<?php echo $bs1?>" name="amount_b1[]" class="form-control amount_b1 fmt_number" min="0" required onkeydown="calculateSum()" onkeyup="calculateSum()" onblur="save_average_salary_riskform()" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?> /></td>
													<td><input type="number" value="<?php echo $b_s2[$key]?>" name="amount_b2[]" class="form-control amount_b2 fmt_number" min="0" required onkeydown="calculateSumS2()" onkeyup="calculateSumS2()" onblur="save_average_salary_riskform()" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?> /></td>
													<td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))){ ?><button type="button" class="btn btn-primary" onclick="removerow_b('<?php echo $j?>');">-</button><?php } ?></td></tr>
												<?php } 
												 $j++;
												} } else {?>
													<tr class="analyserow_b">
														<td> B -  Échéances Mensuelles  BICIG </td>
														<td>
															<input type="number" value="<?php echo $bs1?>" name="amount_b1[]" class="form-control amount_b1 number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/>
														</td>
														<td>
															<input type="number" value="<?php echo $b_s2[$key]?>" name="amount_b2[]" class="form-control amount_b2 number" min="0" onblur="save_average_salary_riskform(this)" required <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?> />
															
														</td>
														 <td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))){ ?><button type="button" class="btn btn-primary addrow_b">+</button><?php } ?></td>
													</tr>
													<?php }
												//  echo $risk_analysis['amount_c_s1'];

													if($risk_analysis['amount_c_s1'] != "" || $risk_analysis['amount_c_s2'] != ""){
													$c_s1 = json_decode($risk_analysis['amount_c_s1']);
													$c_s2 = json_decode($risk_analysis['amount_c_s2']);
													$k=1;
													foreach($c_s1 as $key=>$cs1){
														if($key == "0")
														{
													?>
														<tr class="analyserow_c">
															<td> C - Echéances Mensuelles Autres </td>
															<td>                          
																<input type="number" value="<?php echo $cs1;?>" name="amount_c1[]" class="form-control amount_c1 number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?> />
															</td>
															<td>
																<input type="number" value="<?php echo $c_s2[$key];?>" name="amount_c2[]" class="form-control amount_c2 number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?> />
															</td>
															 <td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))){?><button type="button" class="btn btn-primary addrow_c">+</button><?php } ?></td>
														</tr>

													<?php } else {?>
														<tr class="tr_c<?php echo $k;?>"> <td> </td>
														<td><input type="number" value="<?php echo $cs1?>" name="amount_c1[]" class="form-control amount_c1 number" min="0" required onkeydown="calculateSum()" onkeyup="calculateSum()" onblur="save_average_salary_riskform()" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/></td>
														<td><input type="number" value="<?php echo $c_s2[$key]?>" name="amount_c2[]" class="form-control amount_c2" min="0" onkeydown="calculateSumS2()" onkeyup="calculateSumS2()" onblur="save_average_salary_riskform()" required <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?> /></td>
														<td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission'))){?><button type="button" class="btn btn-primary" onclick="removerow_c('<?php echo $k; ?>');">-</button><?php } ?></td></tr>
													<?php } } }else { ?>

														<tr class="analyserow_c">
															<td> C - Echéances Mensuelles Autres </td>
															<td>                          
																<input type="number" value="" name="amount_c1[]" class="form-control amount_c1 number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?> />
															</td>
															<td>
																<input type="number" value="" name="amount_c2[]" class="form-control amount_c2 number" min="0" required onblur="save_average_salary_riskform(this)" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?> />
															</td>
															 <td><?php if (in_array('7_2', $this->session->userdata('portal_permission'))){ ?><button type="button" class="btn btn-primary addrow_c">+</button><?php } ?></td>
														</tr>

													<?php } ?>

											
											<tr class="total_analyse">
												<td>  Salaire Résiduel (A - (B+C)) </td>
												<td>
													
													<input type="number" id="total_form1" value="" name="total_form1" class="form-control" min="0" required readonly/>
													<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right riskavgloder1" style="position:relative;top: -25px;left:-3px; display: none;">
													
												</td>
												<td>
													
													<input type="number" id="total_forms2" value="" name="total_forms2" class="form-control" min="0" required readonly/>
													
													<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right riskavgloder2" style="position:relative;top: -25px;left:-3px; display: none;">
												</td>
											</tr>
											<tr class="total_analyse">
												<td> Salaire Résiduel Moyen </td>
												<td colspan="2">
													
													<input type="number" id="sal_moyen" value="" name="sal_moyen" class="form-control" min="0" required readonly/>
														<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right riskavgloder3" style="position:relative;top: -25px;left:-3px; display: none;">
													
												</td>
												
											</tr>
                      <tr>
                        <td colspan="3">
                          <div class="alert alert-danger salary_condition">
                          </div>
                        </td>
                      </tr>
										<!--   <tr>
												<td> Salaire Residuel </td>
												<td>
													<?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
														<input type="text" id="total_clc" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '0';?>" name="total_clc" class="form-control" min="0" required readonly/>
														<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right riskcurrentmonthloder2" style="position:relative;top: -25px;left:-3px; display: none;">
													<?php } else { ?>
														<input type="text" id="total_clc" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '0';?>" name="total_clc" class="form-control" min="0" disabled readonly />
													<?php } ?>
												</td>
											</tr> -->
											
											<tr>                                              
												<td colspan=2>
												<input type="hidden" id="Rcl_aid" value="<?php echo $loan_details['loan_id'] ;?>" name="cl_aid" class="form-control"/>
												
												<input type="hidden" id="Rloan_type" value="credit_conso" name="loan_type" class="form-control"/>
												<textarea class="showajaxrequest2 form-control" rows="10" style="display:none;" ></textarea>
												</td>
											</tr>                      
											
										</tbody>
									</table>
								 </form>
								</div>
							</div>
              
              <div class="col-md-6">
                <div class="table-responsive">
                  <table class="table table-condensed table-hover">
                    <thead>
                      <tr class="info">
                        	<th><span>Cumul d’Engagements</span></th>
							<th><span></span></th>
							<th><span></span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <form id="FormAnalyseNew2" method="post">

							<?php $risk_data =  json_decode($risk_analysis['solde_du_cav']);
								//print_r($risk_data); 

							if(empty($risk_data)){
							?>

							<tr>
								<td> Solde du CAV (+ ou -)</td>
								<td>
									<input type="number" id="" value="" name="solde_du_cav" class="form-control analysis_cal2 solde_du_cav_c" min="0" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?> />
									
									
								</td>
								<td>
                   <?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){?>
									<button type="button" class="btn btn-primary addrow_cav">+</button>
                <?php } ?>
								</td>
							</tr>
							<?php } else {
								$r_count = 1;
								foreach($risk_data as $key=>$rd){
							?>
							<tr class="tr_cav<?php echo $r_count;?>">
								<td><?php if($key == "0"){?> Solde du CAV (+ ou -)<?php } ?></td>
								<td>
									<input type="number" id="" value="<?php echo $rd->value;?>" name="solde_du_cav" class="form-control analysis_cal2 solde_du_cav_c" min="0"   <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>  />
									
									
								</td>
								<td>
                   <?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){?>
									<?php if($key == "0"){?>
									<button type="button" class="btn btn-primary addrow_cav">+</button>
									<?php } else {?>
									<button type="button" class="btn btn-primary" onclick="removerow_cav('<?php echo $r_count; ?>')">-</button>
									<?php } } ?>
								</td>
							</tr>
							<?php $r_count++; } }?>
							<tr class="analysenew2">
								<td> Solde du CSFBM (-) </td>
								<td>
									
										<input type="number" id="" value="<?php echo $risk_analysis['solde_du_csfbm'];?>" name="solde_du_csfbm" class="form-control analysis_cal2 solde_du_csfbm_c" min="0"  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>  />
									
									
								</td>
								<td></td>
							</tr>
							<tr>
								<td> Montant du prêt sollicité </td>
								<td>
									
										<input type="number" id="" value="<?php echo $loan_details['loan_amt'] * - 1 ?>" name="montant_de_pret_sollicite" class="form-control analysis_cal2" min="0"   readonly />
									
									
								</td>
								<td></td>
							</tr>
              <tr>
                <td> Solde en cours Credit Bail (-) </td>
                <td>
                  
                    <input type="number" id="solde_encour_credit_bail" value="<?php echo $risk_analysis['solde_encour_credit_bail'];?>" name="solde_encour_credit_bail" class="form-control analysis_cal2" min="0" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?> />
                  
                  
                </td>
                <td></td>
              </tr>
              

							<?php $risk_data1 =  json_decode($risk_analysis['solde_encours']);
								//print_r($risk_data); 

							if(empty($risk_data1)){ ?>
							<tr>
								<td> Solde Encours de crédits (-) </td>
								<td>
									<input type="number" id="" value="" name="solde_encours" class="form-control analysis_cal2 solde_encours_c" min="0"   <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>  />
									
									
								</td>
								<td>
                   <?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){?>
									<button type="button" class="btn btn-primary addrow_encour">+</button>
                <?php } ?>
								</td>
							</tr>
							<?php } else {
								$r_count1 = 1;
								foreach($risk_data1 as $key=>$rd1){
							?>
							<tr class="tr_en<?php echo $r_count1;?>">
								<td><?php if($key == "0"){?> Solde Encours de crédits (-) <?php }?> </td>
								<td>
									<input type="number" id="" value="<?php echo $rd1->value ; ?>" name="solde_encours" class="form-control analysis_cal2 solde_encours_c" min="0"  <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>   />
									
									
								</td>
								<td>
                   <?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){?>
									<?php if($key == "0"){?>
									<button type="button" class="btn btn-primary addrow_encour">+</button>
									<?php } else {?>
									<button type="button" class="btn btn-primary" onclick="removerow_encour('<?php echo $r_count1;?>')">-</button>
									<?php } } ?>
								</td>
							</tr>
							<?php $r_count1++; }  } ?>
							<tr class="total_analyse_new">
								<td> TOTAL </td>
								<td>
									
										<input type="text" id="total_analyse_cal" value="<?php echo $risk_analysis['total_engagement']?>" name="total_analyse_cal" class="form-control" min="0" required readonly />
										<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right risknewmonthloder2" style="position:relative;top: -25px;left:-3px; display: none;">
									
									
								</td>
							</tr>                     
							<tr>                                              
								<td colspan=2>
								<div class="analysecumul-msg"></div>
								<input type="hidden"  value="<?php echo $loan_details['loan_id'] ;?>" name="rcapid" class="form-control rcapid"/>
								
								<input type="hidden" value="credit_conso" name="loan_type" class="form-control"/>
								<textarea class="showajaxrequestnew2 form-control" rows="10" style="display:none;" ></textarea>
								</td>
								<td>
                  <?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){?>
                  <button type="button" class="btn btn-primary submitAnalyseBtn" onclick="save_total_engagement_riskform();">Initier le Circuit de Validation</button>
                <?php } ?>
                </td> 
							</tr>
						</form>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
        <div class="row">
			<div class="col-md-12">
        		<h3 id="tab-title"><span>Coefficient D'endettement</span></h3>
        		<div class="col-md-6">
        			<div class="table-responsive">
        				<table class="table table-condensed table-hover">
        					<thead>
        						<tr class="info">
        							<th><span>Revenus (Salaires)</span></th>
        							<th colspan="2"><span>Périodes</span></th>
        							<th></th>
        						</tr>
        					</thead>
        					<tbody>                                                         
        						<tbody>
        						<form id="coefficient_form1" method="post"> 
        							<tr>
        								<td>Montant</td>
        								<td>Mois</td>
        								<td>Ans</td>
        								<td></td>
        							</tr>
        							<?php if($risk_analysis['coefficient_salary'] == 'null' || $risk_analysis['coefficient_salary'] == ""){?>
        							<tr class="tr_coff10">
        								<td><input type="number" id="st1_10" class="form-control salary_t1 number" name="salary[]" min="0" onblur="calculateRow('0');" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>></td>
        								<td><input type="number" id="mt1_10" class="form-control mois_t1 number" name="mois[]" min="0" onblur="calculateRow('0');" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>></td>
        								<td><input type="number" id="at1_10" class="form-control ans_t1 number" name="ans[]" min="0" onblur="calculateRow('0');" readonly ></td>
        								<td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){?><button type="button" class="btn btn-primary addrow_coff1">+</button><?php } ?></td>
        							</tr>
        							<?php } else { 
        
        								$coeff_record = json_decode($risk_analysis['coefficient_salary']);
        							//	print_r($coeff_record);
        								$l = 1;
        								foreach ($coeff_record as $key => $value) {
        								
        							?>
        							<tr class="tr_coff1<?php echo $l;?>">
        								<td><input type="number" id="st1_1<?php echo $l;?>" class="form-control salary_t1 number" name="salary[]" min="0" onblur="calculateRow('<?php echo $l;?>');" value="<?php echo $value->salary;?>" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>></td>
        								<td><input type="number" id="mt1_1<?php echo $l;?>" class="form-control mois_t1 number" name="mois[]" min="0" onblur="calculateRow('<?php echo $l;?>');" value="<?php echo $value->mois;?>" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>></td>
        								<td><input type="number" id="at1_1<?php echo $l;?>" class="form-control ans_t1 number" name="ans[]" min="0" onblur="calculateRow('<?php echo $l;?>');" value="<?php echo $value->ans;?>" readonly ></td>
        								<?php if($key == "0"){?>
        								<td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){ ?><button type="button" class="btn btn-primary addrow_coff1">+</button><?php } ?></td>
        								<?php } else {?>
        								<td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){ ?><button type="button" class="btn btn-primary" onclick="removerow_coff1('<?php echo $l;?>')">-</button><?php } ?></td>
        								<?php } ?>
        							</tr>
        
        							<?php $l++ ;} } ?>
        
        							<tr class="coff1">
        								<td colspan="2">Total (T1)</td>
        								<td><input type="number" class="form-control" id="total_t1" name="total_t1" min="0" readonly="" value="<?php echo $risk_analysis['salary_total']; ?>">
        								    <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right risktotalt1loder2" style="position:relative;top: -25px;left:-3px; display: none;">
        								</td>
        								<td></td>
        							</tr>
        							
        							<tr>
        						
        								<input type="hidden"  value="<?php echo $loan_details['loan_id'] ;?>" name="cl_aid" class="form-control"/>
        								<input type="hidden" value="credit_conso" name="loan_type" class="form-control"/>
        								
        							</tr>
        						</form>
        					</tbody>
        				</table>
        			</div>
        		</div>


					<div class="col-md-6">
						<div class="table-responsive">
							<table class="table table-condensed table-hover">
								<thead>
									<tr class="info">
										<th><span>Remboursements (Echéances)</span></th>
										<th colspan="2"><span>Périodes</span></th>
										<th></th>
									</tr>
								</thead>
								<tbody>                                                         
									<tbody>
									<form id="coefficient_form2" method="post"> 
									<tr>
										<td>Montant</td>
										<td>Mois</td>
										<td>Ans</td>
										<td></td>
									</tr>
									<?php if($risk_analysis['coefficient_rembursement'] == 'null' || $risk_analysis['coefficient_rembursement'] == ""){?>
									<tr>
										<td><input type="number" id="rt2_20" value="<?php echo $loan_details['pmnt']; ?>" class="form-control remboursement_t2 number" name="remboursement[]" min="0" onblur="calculateRemRow('0');" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }else { echo "readonly";}?>></td>
										<td>
                      <?php if($loan_details['loan_term'] >= 12)  $duration = "12"; else $duration = $loan_details['loan_term']; ?>



                      <input type="number" id="mt2_20" value ="<?php echo $duration; ?>" class="form-control mois_t2 number" name="mois1[]" min="0" onblur="calculateRemRow('0');" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }else { echo "readonly";}?>></td>
										<td><input type="number" value="<?php echo $loan_details['pmnt']*$duration; ?>" id="at2_20" class="form-control ans_t2 number" name="ans1[]" min="0" onblur="calculateRemRow('0');" readonly ></td>
										<td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){ ?><button type="button" class="btn btn-primary addrow_coff2">+</button><?php } ?></td>
									</tr>
									 <?php } else {
									 	$coeff_record1 = json_decode($risk_analysis['coefficient_rembursement']);
										//	print_r($coeff_record);
											$m = 1;
											foreach ($coeff_record1 as $key => $value1) {
									 	?>
									 	<tr class="tr_coff2<?php echo $m;?>">
										<td><input type="number" id="rt2_2<?php echo $m;?>" class="form-control remboursement_t2 number" name="remboursement[]" min="0" onblur="calculateRemRow('<?php echo $m;?>');" value="<?php echo $value1->rem;?>" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $key=="0" || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>></td>
										<td><input type="number" id="mt2_2<?php echo $m;?>" class="form-control mois_t2 number" name="mois1[]" min="0" onblur="calculateRemRow('<?php echo $m;?>');" value="<?php echo $value1->mois;?>" <?php if ($param == "view" || !in_array('7_2', $this->session->userdata('portal_permission')) || $key=="0" || $loan_details['final_status'] == "Disbursement"){ echo "readonly" ; }?>></td>
										<td><input type="number" id="at2_2<?php echo $m;?>" class="form-control ans_t2 number" name="ans1[]" min="0" onblur="calculateRemRow('<?php echo $m;?>');" value="<?php echo $value1->ans;?>" readonly ></td>
										<?php if($key == "0"){?>
										<td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){ ?><button type="button" class="btn btn-primary addrow_coff2">+</button><?php } ?></td>
										<?php } else {?>
										<td><?php if ($param == "edit" && in_array('7_2', $this->session->userdata('portal_permission')) && $loan_details['final_status'] != "Disbursement"){ ?><button type="button" class="btn btn-primary" onclick="removerow_coff2('<?php echo $m;?>')">-</button><?php } ?></td>
										<?php } ?>
									</tr>
									 <?php $m++ ;} }?>
									<tr class="coff2">
											<td colspan="2">Total (T2)</td>
											<td><input type="number" class="form-control" id="total_t2" name="total_t2" min="0" readonly="" value="<?php echo $risk_analysis['rembursement_total']?>">
											    <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right risktotalt2loder2" style="position:relative;top: -25px;left:-3px; display: none;">
											</td>
											<td></td>
									</tr>
									
									<tr>
										
										<input type="hidden"  value="<?php echo $loan_details['loan_id'] ;?>" name="cl_aid" class="form-control"/>
										<input type="hidden" value="credit_conso" name="loan_type" class="form-control"/>
										
									</tr>

								 
								</form>
								</tbody>
							</table>
						</div>
					</div>

				</div>
				<div class="col-md-12">
					<div class="col-md-3">
						<label>Coefficient d'endettement</label>
						<input type="text" class="form-control" name="coeff" id="coeff" value="" readonly>
					</div>
				</div>
			</div>
               <div class="row">
              <div class="col-md-12">
                <h3 id="tab-title"><span>Risque lié à l'âge</span></h3>
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table table-condensed table-hover">
						<thead>
							<tr class="info">
								<th><span>Relation Bancaire</span></th>
								<th><span></span></th>
							</tr>
						</thead>
						<tbody>
							
							<tr>
								<td style="width:65%;">Date D'entrée en Relation</td>
								<td>
								<div>
								
										<input type="input" id="opening_date" value="<?php echo date("d-m-Y", strtotime($customer->opening_date));?>" name="" class="form-control" min="0" disabled readonly />
								
									
									
								</div>                      
								</td>
							</tr>
							<!-- <tr>
								<td> Date of loan Application </td>
								<td>
								
										<input type="input" id="application_date" value="<?php echo date("d-m-Y", strtotime($loan_details['created_at'])) ;?>" name="application_date" class="form-control" min="0" disabled readonly />
								 
									
								</td>
							</tr> -->
							<!-- <tr>
								<td> Relation With bank </td>
								<td>
									
										<input type="input" id="net_salary2" value="<?php echo timeAgo2($Tenurewithbank) ?: '0';?>" name="net_salary" class="form-control qty32" min="0" disabled readonly />
									
									
								</td>
							</tr> -->

								
							
						</tbody>
					</table>
                    <table class="table table-condensed table-hover">
						<thead>
							<tr class="info">
								<th><span>Relation Employeur</span></th>
								<th><span></span></th>
							</tr>
						</thead>
						<tbody>                                                         
							<tbody>
							<tr>
								<td style="width:65%;">Date d'embauche</td>
								<td>
								<div>
									 <input type="input" id="opening_date" value="<?php echo !empty($customer->employment_date) ? date("d-m-Y", strtotime($customer->employment_date)) :"";?>" name="" class="form-control" min="0" disabled readonly />
									
									
								</div>                      
								</td>
							</tr>
							 <tr>
								<td style="width:65%;">Date De Fin de Contrat/Départ à la Retraite</td>
								<td>
									<input type="input" id="application_date" value="<?php if($customer->sate_end_contract_cdd) echo date("d-m-Y", strtotime($customer->sate_end_contract_cdd)) ;?>" name="application_date" class="form-control" min="0" disabled readonly />
								 
									
								</td>
							</tr> 
							<!-- <tr>
								<td> Embauche </td>
								<td>
								 
										<input type="input" id="net_salary2" value="<?php echo timeAgo2($customer->employment_date) ?: '0';?>" name="net_salary" class="form-control qty32" min="0" disabled readonly />
								 
									
								</td>
							</tr> -->

						</tbody>
					</table>
                    <table class="table table-condensed table-hover">
						<thead>
							<tr class="info">
								<th><span>Âge Client</span></th>
								<th><span></span></th>
							</tr>
						</thead>
						<tbody>                                                         
							<tbody>
							<tr>
								<td style="width:65%;">Date de Naissance </td>
								<td>
								<div>
									
										<input type="input" id="opening_date" value="<?php echo date("d-m-Y", strtotime($customer->dob));?>" name="" class="form-control" min="0" disabled readonly />
									
									
								</div>                      
								</td>
							</tr>
							<!-- <tr>
								<td> Date of loan Application </td>
								<td>
								
										<input type="input" id="application_date" value="<?php echo date("d-m-Y", strtotime($loan_details['created_at'])) ;?>" name="application_date" class="form-control" min="0" disabled readonly />
								 
									
								</td>
							</tr> -->
							<!-- <tr>
								<td> Date de Départ à la Retraite </td>
								<td>
										 <?php // echo $riskcurrentmonthlyvrefit[0]['dateRetirement'];?>
								<?php if($appformD[0]['final_confirmation']!="Disbursement"){
									?>
									<input type="date" id="dateRetirement" value="<?php if(($riskcurrentmonthlyvrefit[0]['dateRetirement']== '0000-00-00 00:00:00') || (!$riskcurrentmonthlyvrefit[0]['dateRetirement'])){
									echo "";
								}else{
									echo date("Y-m-d", strtotime($riskcurrentmonthlyvrefit[0]['dateRetirement']));
								} ?>" name="dateRetirement" class="form-control qty2232"  required <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){ echo "readonly" ; }?>/>
								<?php } else { ?>
									<input type="date" id="dateRetirement" value="<?php echo date("Y-m-d", strtotime($riskcurrentmonthlyvrefit[0]['dateRetirement'])) ;?>" name="dateRetirement" class="form-control qty2232"  disabled readonly />
								<?php } ?>
							</td>
								
							</tr> -->
							
							<!-- <tr>
								<td> Age Risk </td>
								<td>
									<?php 
									$age= date_diff(date_create($customer->dob), date_create('today'))->y;
									?>
								
									<input type="input" id="agerisk" value="<?php if($age<='56'){
										echo "RAS";
									}else{
									 echo 'Risk Eleve - Retraite';
									}?>" name="agerisk" class="form-control qty2232" min="0"  disabled readonly />
								
							</td>
								
							</tr> -->

						</tbody>
					</table>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table table-condensed table-hover">
											
						<thead>
							<tr class="info">
								<th><span>Criteres</span></th>
								<th><span>Mois</span></th>
								<th><span>Ans</span></th>
							</tr>
						</thead>
						<tbody>                                                         
							<tbody>
							<tr>
								<td>Relation a la banque</td>
								<td>
								<div>
									<?php
									 $created_at = explode(" ",$loan_details['created_at']);
									 $application_date = date_create($created_at[0]); 
									 $dt_opening_date = date_create($customer->opening_date);

									 $diff=date_diff($application_date,$dt_opening_date);

									 if($diff->y == "0" && $diff->m != "0")
									 {
									 	$month_val = $diff->m;
									 }
									 else if($diff->y != "0" && $diff->m != "0")
									 {
									 	$month_val = $diff->y*12 + $diff->m;
									 }

									?>
									 
									
									<input type="number" id="" value="<?php echo $diff->m;?>" name="" class="form-control" min="0" <?php if($diff->m <= 6 && $diff->y==0){?> style="color:red" <?php } else {?> style="color:green"  <?php } ?>disabled readonly />

								</div>                      
								</td>
								<td>
								<div>
									
										<input type="number" id="" value="<?php echo $diff->y; ?>" name="" class="form-control" min="0" disabled readonly />

								</div>                      
								</td>
							</tr>
							
							
						</tbody>
					</table>
					<table class="table table-condensed table-hover">
						<thead>
							<tr class="info">
								<th><span style="visibility: hidden">Relation Employeur</span></th>
								<th><span></span></th>
								<th><span></span></th>
							</tr>
						</thead>
						<tbody>                                                         
							<tbody>
							<tr>
								<td>Relation a l'employeur</td>
								<td>
									<?php 
									$created_at = explode(" ",$loan_details['created_at']);
									 $application_date = date_create($created_at[0]); 
									 $dt_emp_date = date_create($customer->employment_date);

									 $diff1=date_diff($application_date,$dt_emp_date);

									 if($diff1->y == "0" && $diff1->m != "0")
									 {
									 	$month_val1 = $diff1->m;
									 }
									 else if($diff1->y != "0" && $diff1->m != "0")
									 {
									 	$month_val1 = $diff1->y*12 + $diff1->m;
									 }

									if($customer->cat_emp_id == "9" || $customer->cat_emp_id == "11")
									{
									 	if($month_val1 >= 24)
									 	{
											$color = "green";
										}
										else {
											$color = "red";
										}
									}
									else {
										if($month_val1 >= 12)
										{
											$color = "green";
										}
										else{
											$color = "red";
										}
									}
									?>
									
								<div>
									
										<input type="number" id="" value="<?php echo $month_val1;?>" name="" style="color: <?php echo $color;?> ;" class="form-control" min="0" disabled readonly />

								</div>                      
								</td>
								<td>
								<div>
									
										<input type="number" id="" value="<?php echo number_format($month_val1/12,2);?>" name="" class="form-control" min="0" disabled readonly />

								</div>                      
								</td>
							</tr>
							<tr>
								<td>Age de depart de la retraite</td>
								<td>
									<?php 
								// 	if($customer->cat_emp_id == "5" || $customer->cat_emp_id == "6" || $customer->cat_emp_id == "8" || $customer->cat_emp_id == "9")
								        // if($customer->cat_employeurs == "Organisations Internationales" || $customer->cat_employeurs == "Public" || $customer->cat_employeurs == "Para public" || $customer->cat_employeurs == "Prive" || $customer->cat_employeurs == "Public des Corps")
									   if(($customer->cat_employeurs) == "Public Corps 25")
									   {
									   	$age_year = "45";
									   }
									   else
									   {
									   	$age_year = "60";
									   }

									
									?>
									
								<div>
									
										<input type="number" id="" value="<?php echo $age_year;?>" name="" class="form-control" min="0" disabled readonly />

								</div>                      
								</td>
								<td>

									<?php

									    $age= date_diff(date_create($customer->dob), date_create('today'))->y;

									   // echo $customer->cat_emp_id;

									   if(strtoupper($customer->cat_employeurs) != "Public Corps 25")
									   {
									   	 if($age > 56)
									   	 {
									   	 	$r_value = "Risque Eleve";
									   	 	$clr = "red";
									   	 }
									   	 else
									   	 {
									   	 	$r_value = "RAS";
									   	 	$clr = "green";
									   	 }
									   }
									   else
									   {
									     if($age < 35)
									     {
									     	$r_value = "RAS";
									     	$clr = "green";
									     }
									     else if($age >= 35 && $age <= 45)
									     {
									     	$r_value = "Risque Moyen";
									     	$clr = "orange";
									     }
									     else
									     {
									     	$r_value = "Risque Eleve";
									     	$clr = "red";
									     }
									   }

									
									?>
								<div>
									
										<input type="text" id="" value="<?php echo $r_value;?>" style="color:<?php echo $clr; ?>" name="" class="form-control" min="0" disabled readonly />

								</div>                      
								</td>
							</tr>
							
						</tbody>
					</table>
					<table class="table table-condensed table-hover">
						<thead>
							<tr class="info">
								<th><span style="visibility: hidden">Age</span></th>
								<th><span></span></th>
								<th><span></span></th>
							</tr>
						</thead>
						                                                      
							<tbody>
							<tr>
								<td style="width:33%">Age</td>

								
									<?php  $dob_dt = date_create($customer->dob);
										   $current_date = date_create(date('Y-m-d'));

										   $diff3 = date_diff($current_date,$dob_dt);
										  // print_r($diff3);

										   if($diff3->y >= 59 && $diff3->m <= 6)
										   {
										   	 $color1 = "red";
										   	 $age_value ="moin de 6 mois";
										   }
										   else
										   {
										   	 $color1 = "green";
										   	 $age_value ="plus de 6 mois";
										   }

										   
									?>
								<td>
									<input type="text" id="" value="<?php echo $diff3->y;?>" name=""  class="form-control" min="0" disabled readonly />
								</td>
								<td>
								<div>
									
										<input type="text" id="" value="<?php echo $age_value;?>" name="" style="color:<?php echo $color1;?>" class="form-control" min="0" disabled readonly />

								</div>                      
								</td>
								<td>
								<!-- <div class="input-group">
									
										<input type="number" id="" value="33" name="" class="form-control" min="0" disabled readonly />

								</div>  -->                     
								</td>
							</tr>
							
						</tbody>
					</table>
                  </div>
                </div>
              </tbody>

                
              </div>
        </div> 
        <div class="row hidden">
              <div class="col-md-12">
                <h3 id="tab-title"><span>Coefficient D'endettement</span></h3>
                <div class="col-md-6">
                  <div class="table-responsive">
                    <table class="table table-condensed table-hover">
                      <thead>
                        <tr class="info">
                          <th><span>FINANCIAL SITUATION</span></th>
                          <th><span>Montant</span></th>
                        </tr>
                      </thead>
                      <tbody>                                                         
                        <tbody>
                        <form id="Formfinancial_situation22" method="post"> 
                        <tr>
                          <td> Montant Crédit Encours </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                            <input type="input" id="creditencour" value="<?php echo $riskcurrentmonthlyvrefit[0]['creditencour'] ?: '0';?>" name="creditencour" class="form-control qty2233" min="0" required />
                          <?php } else { ?>
                            <input type="input" id="creditencour" value="<?php echo $riskcurrentmonthlyvrefit[0]['creditencour'] ?: '0';?>" name="creditencour" class="form-control qty2233" min="0"  disabled readonly />
                          <?php } ?>
                            
                              <!-- <input type="input" id="creditencour" value="<?php echo $loan_details['creditencour'] ?: '0';?>" name="creditencour" class="form-control qty223" min="0" /> -->
                           
                            
                          </td>
                        </tr>
                        <tr>
                          <td> Mensualite </td>
                          <td>
                            
                              <input type="input" id="loanmonthly" value="<?php echo $loan_details['pmnt'] ?: '0';?>" name="loanmonthly" class="form-control" min="0" disabled readonly />
                            <input type="hidden" id="loanmonthlyHidden" value="<?php echo $loan_details['pmnt'] ?: '0';?>"  class="form-control" min="0" disabled readonly />
                            
                          </td>
                        </tr>
                        <tr>
                          <td> Salaire Mensuel </td>
                          <td>
                          <div class="input-group">
                            
                              <input type="input" id="avg3_2" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '0';?>" name="total_clc" class="form-control " min="0" disabled readonly />

                          </div>                      
                          </td>
                        </tr>
                        <tr>
                          <td> Remboursement Annual  </td>
                          <td>
                           
                              <input type="input" id="loanannual" value="<?php echo $riskcurrentmonthlyvrefit[0]['loanannual']!=NULL?$riskcurrentmonthlyvrefit[0]['loanannual']:$loan_details['pmnt']*4; ?>" name="loanannual" class="form-control qty2233" min="0" readonly  />
                              <input type="hidden" id="loanannualHidden" value="<?php echo $riskcurrentmonthlyvrefit[0]['loanannual']!=NULL?$riskcurrentmonthlyvrefit[0]['loanannual']:$loan_details['pmnt']*4; ?>" name="loanannualHidden" class="form-control qty2233" min="0"  readonly />

                              <input type="hidden"  value="<?php echo $riskcurrentmonthlyvrefit[0]['loanannual']!=NULL?$riskcurrentmonthlyvrefit[0]['loanannual']:$loan_details['pmnt']*4; ?>" name="temp_aid" class="form-control"/>
                           
                            
                          </td>
                        </tr>
                        <tr>
                          <td> Salaire Annual </td>
                          <td>
                           
                              <input type="input" id="salaryAnnual2" name="salaryAnnual2" value="<?php echo $riskcurrentmonthlyvrefit[0]['salaryAnnual'] ?: '0';?>" class="form-control qty32" min="0" disabled readonly />
                            
                            
                          </td>
                        </tr>
                        <tr>
                          <td> Coefficient d'endettement </td>
                          <td>
                            
                              <input type="input" id="score2" style="color:<?php if($riskcurrentmonthlyvrefit[0]['score']<= '35'){echo "green";}else if($riskcurrentmonthlyvrefit[0]['score']>'35' && $riskcurrentmonthlyvrefit[0]['score']<='49'){echo "yellow";}else{echo "red";}{

                              }?>;" name="score2" class="form-control" min="0" value="<?php echo $riskcurrentmonthlyvrefit[0]['score'] ?: '0';?>" disabled />
                            
                            
                          </td>
                          <input type="hidden"  value="<?php echo $loan_details['loan_id'] ;?>" name="cl_aid" class="form-control"/>
                          <input type="hidden" value="credit_conso" name="loan_type" class="form-control"/>
                          <input type="hidden" id="score3" name="score3" value="<?php echo $riskcurrentmonthlyvrefit[0]['score'];?>"  class="form-control" />
                        </tr>

                       
                      </form>
                      </tbody>
                    </table>
                  </div>
                </div>
     
              </div>
        </div>  



            </div>

          </div>
      </div>
      <!-- End Tab-5 section -->


     <!-- start Tab-10 section -->

      <!-- start Tab-10 section if role is Agent CAD -->

      <?php 
      if($this->session->userdata('role') == "11" ) {

       if($param == "edit" && in_array('7_6', $this->session->userdata('portal_permission'))) {

        ?>
      <div class="tab-pane fade" id="tab-10">
        <div class="row">
          <form id="observation" method="post" >
               <div class="col-md-12">
                  <h3 id="tab-title"><span>Confirmation</span></h3>
                   <table class="table table-condensed table-hover">
                      <thead>
                        <tr>
                           <?php if($current_user_decision['review']=="0"){ ?>
                            <th style="vertical-align: top;max-width:50px">Agent CAD</th>
                            <th style="vertical-align: top;max-width:50px">Autorisation
                              <div class="checkbox-nice checkbox-inline">
                                <input type="checkbox" id="checkbox-inl-1" name="cadcodesplit" value="1" style="border: 1px solid #000;">
                                <label for="checkbox-inl-1">&nbsp;</label>
                              </div>
                            </th> 
                            <th style="vertical-align: top;max-width:50px">
                              COMMENT
                              <textarea class="form-control" name="commentstatus" id="agent_comment"></textarea>
                            </th>                                            
                            <th>
                             
                              <input type="hidden" value="Confirm Disbursement" name="decision">
                              <button type="button" class="btn btn-sm btn-primary" id="confirmclick">
                                <strong>Valider</strong>
                              </button>
                              <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top: 9px; display: none;">
                            </th> 
                          <div class="row">
                            <div class="col-md-12">
                              <div class="editloanmsg123"></div>
                              
                            </div>
                          </div>
                        </tr>
                        <?php }
                            else{ 
                              echo "<th>Agent CAD</th>
                            <th>Autorisation<div class=\"checkbox-nice checkbox-inline\"><input type=\"checkbox\" id=\"checkbox-inl-1\" name =\"check\" value=\"1\" checked disabled >
                              <label for=\"checkbox-inl-1\">&nbsp;</label></div>
                              </th>
                            <th><button type=\"button\" class=\"btn btn-sm btn-primary\" disabled> <strong> Valider </strong> </button></th>"; 
                          }
                        ?>

                      </thead>
                   </table>                                     
              </div>
            </form>
        </div>

           <!-- MEMORANDUM start -->
        <div class="row">
            
          <form action="" id="cadMemoForm" method="POST" >
               <div class="col-md-12">
                  <h3 id="tab-title"><span>MEMORANDUM</span></h3>
                  <div class="col-md-12">
                     <div class="memo_message"></div>
                  </div>
                    <p>A: &nbsp; <span>DIRECTION DES OPERATIONS</span></p>
                    <p>C/C:&nbsp;<span>DIRECTION GENERALE</span> </p>
                    <p>Ref:&nbsp; <span>Mise en place Crédit Moyen Terme de </span>
                       <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['moyen_Terme_de']; } else { echo ""; } ?>"  name ="moyen_Terme_de" >
                      
                   </p>   
                   <p>DATE: &nbsp; <input type="date" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date']; } else { echo ""; } ?>"  name="date"></p>   


                   <hr/> 

                   <div><p>
                     Nous vous prions de bien vouloir mettre en place le credit Moyen
                     <br/>
                     Termede <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['termede']; } else { echo ""; } ?>"  name ="termede" > 
                     <span>
                       en passant les opérations suivantes:
                     </span></p>
                   </div> 

                   <div>
                     <p>1.1- BIENVOULOIR REMBOURSER PRET REF<input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_1']; } else { echo ""; } ?>" name ="1_1" > <span>(CMT OU CCT)</span></p>
                     <P>1.2- BIEN VOULOIR FORCER L'IMPAYE REF <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_2']; } else { echo ""; } ?>" name ="1_2" ><span> ET REF &nbsp;<input type="text" value =" <?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_2']; } else { echo ""; } ?>"name ="ET REF" ></span></P>
                     <P>1.3- BIEN VOULOIR REMBOURSER PRET REF <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_3']; } else { echo ""; } ?>"  name ="1_3" ></P>
                     <p>1.4- BIEN VOULOIR FORCER L'IMPAYE REF <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_4']; } else { echo ""; } ?>"  name ="1_4" ></p>
                     <p>1.5- Crédit court terme <input type="text" value =" <?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_5']; } else { echo ""; } ?>"  name="1_5"> </p>
                   </div> 

                   <!-- note 1.5 table start  -->
                     <div>
                      <table style="width:70%" border="1">
                        <tr bgcolor="#DFF0D8">
                          <th>LIBELLE</th>
                          <th>VALUER</th>
                          <th>REFERENCE</th>
                        </tr>
                        <tr>
                          <td >Groupe de RC</td>
                          <td>
                         <b> PRETAMOR  </b>
                          </td> 
                          <td rowspan="17"></td>
                               
                        </tr>
                        
                         <tr>
                          <td >RC</td>
                          <td>
                          <input type="text"  size="46" value ="<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['rc']; } else { echo ""; } ?>"  name="rc"  >
                          </td>      
                          </tr>
                          <tr>
                          <td >Racine Client</td>
                          <td>
                          <input type="text"  size = "46"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['racine_Client']; } else { echo ""; } ?>"  name="racine_Client">
                          </td>      
                          </tr>
                          <tr>
                          <td >Nom du client</td>
                          <td>
                          <input type="text"  size = "46"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['nom_du_client']; } else { echo ""; } ?>"  name="nom_du_client">
                          </td>      
                          </tr>
                          <tr>
                          <td >Montant du prêt</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['montant_du_prêt']; } else { echo ""; } ?>"   name="montant_du_prêt">
                          </td>      
                          </tr>
                          <tr>
                          <td >Date de Valeur/Date de Déblocage</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_de_valeur']; } else { echo ""; } ?>"  name="date_de_valeur">
                          </td>      
                          </tr>
                          <tr>
                          <td >Date lere échéance</td>
                          <td>
                          <input type="text"  size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_lere_échéance']; } else { echo ""; } ?>"   name="date_lere_échéance">
                          </td>      
                          </tr>
                          <tr>
                          <td >Date dernière échéance</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_dernière_échéance']; } else { echo ""; } ?>" name="date_dernière_échéance">
                          </td>      
                          </tr>
                          <tr>
                          <td >Durée du prêt</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['durée_du_prêt']; } else { echo ""; } ?>" name="durée_du_prêt">
                          </td>      
                          </tr>
                          <tr>
                          <td >Nombre déchéances</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['nombre_déchéances']; } else { echo ""; } ?>" name="nombre_déchéances">
                          </td>      
                          </tr>
                          <tr>
                          <td >Date accord CIC</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_accord_CIC']; } else { echo ""; } ?>"  name="date_accord_CIC">
                          </td>      
                          </tr>
                          <tr>
                          <td >Type de Différé (P/T/-)</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['type_de_différé']; } else { echo ""; } ?>" name="type_de_différé">
                          </td>      
                          </tr>
                          <tr>
                          <td >Périodocoté de remboursement</td>
                          <td>
                          <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['périodocoté_de_remboursement']; } else { echo ""; } ?>"   size = "46"   name="périodocoté_de_remboursement">
                          </td>      
                          </tr>
                          <tr>
                          <td >Frais de dossier</td>
                          <td>
                          <input type="text"  size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['frais_de_dossier']; } else { echo ""; } ?>"  name="frais_de_dossier">
                          </td>      
                          </tr>
                          <tr>
                          <td >Compte courant</td>
                          <td>
                          <input type="text"    size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['compte_courant']; } else { echo ""; } ?>"  name="compte_courant">
                          </td>      
                          </tr>
                          <tr>
                          <td >Taux</td>
                          <td>
                          <input type="text"   size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['taux']; } else { echo ""; } ?>"  name="taux">
                          </td>      
                          </tr>
                        
                        </table>
                     </div>
                     <!-- note 1.5 table end  -->
                     <hr/>    

                     <!-- note 2  -->
                     <div>     
                      <span><b>NOTE:</b> EMPLOYEUR <input type="text"    size = "46"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['employeur']; } else { echo ""; } ?>"  name="employeur">
                        <br> <span>2- Régler les frais d'assurance</span></span>
                    </div>  


                    <!-- table 2 start -->
                    <div>
                      <table style="width:70%" border="1">
                        <tr>
                          <th>Libelle</th>
                          <th>Compte</th>
                          <th>Montant<br> F CFA</th>
                          <th>Sens</th>
                          <th>Référence</th>
                        </tr>

                         <tr>
                            <td >LIB:PRIME<br>ASS/...   <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_1_LIB']; } else { echo ""; } ?>"    name="2_1_LIB"></td>
                            <td>
                            <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_1_compte']; } else { echo ""; } ?>"     name="2_1_compte">
                            </td> 
                            <td rowspan="3"><input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_FCFA']; } else { echo ""; } ?>"    name="2_FCFA"  ></td>  
                              <td> D</td>
                            <td rowspan="3"></td>         
                               
                          </tr>
                          <tr>
                            <td >LIB:PRIME<br>ASS/... <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_2_LIB']; } else { echo ""; } ?>"   name="2_2_LIB"></td>
                              <td>
                              <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_2_compte']; } else { echo ""; } ?>"  name="2_2_compte">
                              </td> 
                              <td> C</td>    
                          </tr>
                        </table>
                     </div>
                    <!-- table 2 end -->  
                      <!-- table 3 start -->
                      <div>
                     <span> 3-Régler les frais d'adhésion au fonds de garantie </span>
                        <table style="width:70%" border="1">
                          <tr>
                            <th>Libelle</th>
                            <th>Compte</th>
                            <th >Montant FCFA</th>
                            <th>Sens</th>
                            <th>Référence</th>
                          </tr>     
                          
                           <tr>
                            <td >LIB:PRIME<br>ASS/... <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_1_LIB']; } else { echo ""; } ?>"    name="3_1_LIB"> </td>
                            <td>
                            <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_1_compte']; } else { echo ""; } ?>"    name="3_1_compte" >
                            </td> 
                            <td rowspan="3"><input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_FCFA']; } else { echo ""; } ?>"    name="3_FCFA" ></td>  
                            <td> D</td>
                            
                            <td rowspan="3"></td>    
                            </tr>
                            <tr>
                            <td >LIB:PRIME<br>ASS/... <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_2_LIB']; } else { echo ""; } ?>"  name="3_2_LIB"> </td>
                            <td>
                            <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_2_compte']; } else { echo ""; } ?>"   name="3_2_compte">
                            </td> 
                            <td> C </td>     
                            </tr>
                          </table>
                       </div>
                      <!-- table 3 end -->   

                      <div>
                      <b>SECURITE & DOCUMENTATION</b> <br>
                    
                        <textarea type ="text" rows="4" cols="80" name="securite"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['securite']; } else { echo ""; } ?></textarea>
                      </div>    

                        <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-primary cadsubmit_btn"> Submit </button>
                        <div class="spinner-border text-success" role="status"> <span class="sr-only">Loading...</span> </div>
                        </div>      
              </div>
            </form>




        </div>

        <!-- MEMORANDUM end -->

      </div>



      <!-- end Tab-10 section if role is Head CAD -->
    <?php }} else if($this->session->userdata('role') ==  "9") {
      if($param == "edit" && in_array('7_6', $this->session->userdata('portal_permission'))) {
      ?>

      <!-- start Tab-10 section if role is Head CAD -->
      
      <div class="tab-pane fade" id="tab-10">
          <div class="row">
            <form id="cadform" method="post" >
              <div class="col-md-12">
                <div class="table-responsive">
                  <h3 id="tab-title"><span>AUTORISATION</span></h3>
                  <table class="table table-condensed">
                    <thead>
                    <tr class="info">
                     <?php if($loan_details['review']=="0"){ ?>
                      <th>
                        COMMENT
                      <textarea class="form-control" id="headcomment" name="commentstatus" style="max-width: 400px;margin: 10px"></textarea>

                      <input type="hidden" value="Confirm Disbursement" name="decision">
                      <button type="button" class="btn btn-sm btn-primary" id="button_3"> <i class="fa fa-thumbs-up"></i> <strong> Confirm Disbursement</strong> </button>
                      <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left commentlofer" style="position: relative;top: 8px;display:none; left: 193px;">
                      </th> 
                      <div class="row">
                      <div class="col-md-12">
                        <div class="editloanmsg123"></div>
                        
                      </div>
                    </div>                                          
                    </tr>
                    <?php }
                    else{ echo "<th><button type=\"button\" class=\"btn btn-sm btn-primary\" disabled> <i class=\"fa fa-thumbs-up\"></i> <strong> Confirm </strong> </button></th>"; }
                    ?>
                    </thead>
                  </table>
                </div>
              </div>
            </form>
          </div>
           <div class="row" style="margin-top: 2%">
            
          <form action="" method="POST" >
               <div class="col-md-12">
                  <h3 id="tab-title"><span>MEMORANDUM</span></h3>
                  <div class="col-md-12">
                     <div class="memo_message"></div>
                  </div>
                    <p>A: &nbsp; <span>DIRECTION DES OPERATIONS</span></p>
                    <p>C/C:&nbsp;<span>DIRECTION GENERALE</span> </p>
                    <p>Ref:&nbsp; <span>Mise en place Crédit Moyen Terme de </span>
                       <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['moyen_Terme_de']; } else { echo ""; } ?>"  name ="moyen_Terme_de" disabled>
                      
                   </p>   
                   <p>DATE: &nbsp; <input type="date" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date']; } else { echo ""; } ?>"  name="date" disabled></p>   


                   <hr/> 

                   <div><p>
                     Nous vous prions de bien vouloir mettre en place le credit Moyen
                     <br/>
                     Termede <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['termede']; } else { echo ""; } ?>"  name ="termede" disabled> 
                     <span>
                       en passant les opérations suivantes:
                     </span></p>
                   </div> 

                   <div>
                     <p>1.1- BIENVOULOIR REMBOURSER PRET REF<input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_1']; } else { echo ""; } ?>" name ="1_1" disabled> <span>(CMT OU CCT)</span></p>

                     <P>1.2- BIEN VOULOIR FORCER L'IMPAYE REF <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_2']; } else { echo ""; } ?>" name ="1_2" disabled ><span> ET REF &nbsp;<input type="text" value =" <?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_2']; } else { echo ""; } ?>"name ="ET REF" disabled></span></P>
                     <P>1.3- BIEN VOULOIR REMBOURSER PRET REF <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_3']; } else { echo ""; } ?>"  name ="1_3" disabled></P>
                     <p>1.4- BIEN VOULOIR FORCER L'IMPAYE REF <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_4']; } else { echo ""; } ?>"  name ="1_4" disabled></p>
                     <p>1.5- Crédit court terme <input type="text" value =" <?php if(!empty($agcdecisionform)) { echo $agcdecisionform['1_5']; } else { echo ""; } ?>"  name="1_5" disabled> </p>
                   </div> 

                   <!-- note 1.5 table start  -->
                     <div>
                      <table style="width:70%" border="1">
                        <tr bgcolor="#DFF0D8">
                          <th>LIBELLE</th>
                          <th>VALUER</th>
                          <th>REFERENCE</th>
                        </tr>
                        <tr>
                          <td >Groupe de RC</td>
                          <td>
                         <b> PRETAMOR  </b>
                          </td> 
                          <td rowspan="17"></td>
                               
                        </tr>
                        
                         <tr>
                          <td >RC</td>
                          <td>
                          <input type="text"  size="46" value ="<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['rc']; } else { echo ""; } ?>"  name="rc" disabled  >
                          </td>      
                          </tr>
                          <tr>
                          <td >Racine Client</td>
                          <td>
                          <input type="text"  size = "46"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['racine_Client']; } else { echo ""; } ?>"  name="racine_Client" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Nom du client</td>
                          <td>
                          <input type="text"  size = "46"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['nom_du_client']; } else { echo ""; } ?>"  name="nom_du_client" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Montant du prêt</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['montant_du_prêt']; } else { echo ""; } ?>"   name="montant_du_prêt">
                          </td>      
                          </tr>
                          <tr>
                          <td >Date de Valeur/Date de Déblocage</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_de_valeur']; } else { echo ""; } ?>"  name="date_de_valeur" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Date lere échéance</td>
                          <td>
                          <input type="text"  size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_lere_échéance']; } else { echo ""; } ?>"   name="date_lere_échéance" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Date dernière échéance</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_dernière_échéance']; } else { echo ""; } ?>" name="date_dernière_échéance" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Durée du prêt</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['durée_du_prêt']; } else { echo ""; } ?>" name="durée_du_prêt" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Nombre déchéances</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['nombre_déchéances']; } else { echo ""; } ?>" name="nombre_déchéances" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Date accord CIC</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_accord_CIC']; } else { echo ""; } ?>"  name="date_accord_CIC" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Type de Différé (P/T/-)</td>
                          <td>
                          <input type="text" size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['type_de_différé']; } else { echo ""; } ?>" name="type_de_différé" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Périodocoté de remboursement</td>
                          <td>
                          <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['périodocoté_de_remboursement']; } else { echo ""; } ?>"   size = "46"   name="périodocoté_de_remboursement" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Frais de dossier</td>
                          <td>
                          <input type="text"  size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['frais_de_dossier']; } else { echo ""; } ?>"  name="frais_de_dossier" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Compte courant</td>
                          <td>
                          <input type="text"    size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['compte_courant']; } else { echo ""; } ?>"  name="compte_courant" disabled>
                          </td>      
                          </tr>
                          <tr>
                          <td >Taux</td>
                          <td>
                          <input type="text"   size = "46" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['taux']; } else { echo ""; } ?>"  name="taux" disabled>
                          </td>      
                          </tr>
                        
                        </table>
                     </div>
                     <!-- note 1.5 table end  -->
                     <hr/>    

                     <!-- note 2  -->
                     <div>     
                      <span><b>NOTE:</b> EMPLOYEUR <input type="text"    size = "46"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['employeur']; } else { echo ""; } ?>"  name="employeur" disabled>
                        <br> <span>2- Régler les frais d'assurance</span></span>
                    </div>  


                    <!-- table 2 start -->
                    <div>
                      <table style="width:70%" border="1">
                        <tr>
                          <th>Libelle</th>
                          <th>Compte</th>
                          <th>Montant<br> FCFA</th>
                          <th>Sens</th>
                          <th>Référence</th>
                        </tr>

                         <tr>
                            <td >LIB:PRIME<br>ASS/...   <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_1_LIB']; } else { echo ""; } ?>"    name="2_1_LIB" disabled></td>
                            <td>
                            <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_1_compte']; } else { echo ""; } ?>"     name="2_1_compte" disabled>
                            </td> 
                            <td rowspan="3"><input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_FCFA']; } else { echo ""; } ?>"    name="2_FCFA" disabled ></td>  
                              <td> D</td>
                            <td rowspan="3"></td>         
                               
                          </tr>
                          <tr>
                            <td >LIB:PRIME<br>ASS/... <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_2_LIB']; } else { echo ""; } ?>"   name="2_2_LIB" disabled></td>
                              <td>
                              <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['2_2_compte']; } else { echo ""; } ?>"  name="2_2_compte" disabled>
                              </td> 
                              <td> C</td>    
                          </tr>
                        </table>
                     </div>
                    <!-- table 2 end -->  
                      <!-- table 3 start -->
                      <div>
                     <span> 3-Régler les frais d'adhésion au fonds de garantie </span>
                        <table style="width:70%" border="1">
                          <tr>
                            <th>Libelle</th>
                            <th>Compte</th>
                            <th >Montant FCFA</th>
                            <th>Sens</th>
                            <th>Référence</th>
                          </tr>     
                          
                           <tr>
                            <td >LIB:PRIME<br>ASS/... <input type="text" value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_1_LIB']; } else { echo ""; } ?>"    name="3_1_LIB" disabled> </td>
                            <td>
                            <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_1_compte']; } else { echo ""; } ?>"    name="3_1_compte" disabled>
                            </td> 
                            <td rowspan="3"><input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_FCFA']; } else { echo ""; } ?>"    name="3_FCFA" disabled></td>  
                            <td> D</td>
                            
                            <td rowspan="3"></td>    
                            </tr>
                            <tr>
                            <td >LIB:PRIME<br>ASS/... <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_2_LIB']; } else { echo ""; } ?>"  name="3_2_LIB" disabled> </td>
                            <td>
                            <input type="text"  value = "<?php if(!empty($agcdecisionform)) { echo $agcdecisionform['3_2_compte']; } else { echo ""; } ?>"   name="3_2_compte" disabled>
                            </td> 
                            <td> C </td>     
                            </tr>
                          </table>
                       </div>
                      <!-- table 3 end -->   

                      <div>
                      <b>SECURITE & DOCUMENTATION</b> <br>
                    
                        <textarea type ="text" rows="4" cols="80" name="securite" disabled><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['securite']; } else { echo ""; } ?></textarea>
                      </div>    

                             
              </div>
            </form>




        </div>
      </div>



      <!-- end Tab-10 section if role is Head CAD -->
    <?php } } else {?>

     <!-- start Tab-10 section if role is other than CAD -->
      <div class="tab-pane fade" id="tab-10">
         <!--  <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-condensed table-hover">
                  <thead>
                    <tr class="info">
                      <th></th>
                      <th><span>DOCUMENTATION & TYPES GARANTIES DE CREDIT EXIGEES POUR LE PRÊT</span></th>
                      <th><span>Oui</span></th>
                      <th><span>Non</span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>DEMANDE DU CLIENT AVEC « SIGNATURE VERIFIEE » + BULLETIN DE PAIE + CNI VALIDE </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="field1" id="CAD_radio01" value="1" checked disabled>
                            <label for="CAD_radio01">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="field2" id="CAD_radio02" value="2">
                            <label for="CAD_radio02">NO</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>BILLET A ORDRE  SIGNE PAR LE CLIENT</td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio02" id="CAD_radio03" value="CAD_radio03" checked>
                            <label for="CAD_radio03">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio02" id="CAD_radio04" value="CAD_radio04">
                            <label for="CAD_radio04">NO</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>CONVENTION DE PRET ENTRE M. DABOLE DANIELET LA BANQUE SUR LE MONTANT DE L’ENGAGEMENT.</td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio03" id="CAD_radio05" value="CAD_radio05" checked>
                            <label for="CAD_radio05">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio03" id="CAD_radio06" value="CAD_radio06">
                            <label for="CAD_radio06">NO</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>ASSURANCE INVALIDITE DECES SUR LE CLIENT</td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio04" id="CAD_radio07" value="CAD_radio07" checked>
                            <label for="CAD_radio07">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio04" id="CAD_radio08" value="CAD_radio08">
                            <label for="CAD_radio08">NO</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>AVI  AFRICA SECURITY CAMEROUN + CONFIRMATION PAR LE GESTIONNAIRE DE COMPTE</td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio05" id="CAD_radio09" value="CAD_radio09" checked>
                            <label for="CAD_radio09">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio05" id="CAD_radio010" value="CAD_radio010">
                            <label for="CAD_radio010">NO</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>6</td>
                      <td>FORMULAIRE ADHESION AU FOND DE GARANTIE  </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio06" id="CAD_radio011" value="CAD_radio011" checked>
                            <label for="CAD_radio011">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio06" id="CAD_radio012" value="CAD_radio012">
                            <label for="CAD_radio012">NO</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>7</td>
                      <td>CERITFICAT DOMICILE + PLAN DE LOCALISATION APPROUVE PAR L'AGENCE</td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio07" id="CAD_radio013" value="CAD_radio013" checked>
                            <label for="CAD_radio013">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio07" id="CAD_radio014" value="CAD_radio014">
                            <label for="CAD_radio014">NO</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>8</td>
                      <td>CIP/FIBAN</td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio08" id="CAD_radio015" value="CAD_radio015" checked>
                            <label for="CAD_radio015">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio08" id="CAD_radio016" value="CAD_radio016">
                            <label for="CAD_radio016">NO</label>
                          </div>
                        </div>
                      </td>                  
                    </tr>
                    <tr>
                      <td>9</td>
                      <td>CENTRALE ES RISQUES</td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio09" id="CAD_radio017" value="CAD_radio017" checked>
                            <label for="CAD_radio017">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio09" id="CAD_radio018" value="CAD_radio018">
                            <label for="CAD_radio018">NO</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>10</td>
                      <td>DECISION APPROBATION DES ANAYSTES (SAC)</td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio010" id="CAD_radio019" value="CAD_radio019" checked>
                            <label for="CAD_radio019">YES</label>
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <div class="radio" style="display:inline-block">
                            <input type="radio" name="CAD_radio010" id="CAD_radio020" value="CAD_radio020">
                            <label for="CAD_radio020">NO</label>
                          </div>
                        </div>
                      </td>
                    </tr>
                </tbody>
              </table>
          </div>
          <div class="row" style="margin-bottom:5px;">
            <div class="col-md-4">
              <div class="form-group">
                <label>DECISION</label>
                <select class="form-control" onchange="select_cad_decision_details()" id="cad_decision_details" disabled>
                  <option value="demande_de_retraitement" id="demande_de_retraitement">Demande de retraitement</option>
                  <option value="avis_favorable" id="avis_favorable">Avis favorable</option>
                </select>
              </div>
              </div>
              <div class="col-md-12" style="margin-top:5px;">
              <div class="form-group">
                <label class="col-md-4" style="padding-left:0px;">ZONE DE COMMENTAIRE </label>
                <input class="col-md-4" type="text" id="" name="" value="" placeholder="" disabled />
              </div>            
            </div>
          </div>
          <div class="avis_favorable_content" style="display:none">
            <h3 id="tab-title"><span>1- MEMO CREDIT SCOLAIRE and CONSUMER LOAN</span></h3>  
            <div class="table-responsive">
              <table class="table table-condensed table-hover">
                <thead>
                  <tr class="info">
                    <th>LIBELLE</th>
                    <th><span>VALEUR</span></th>
                    <th><span>REFERENCE</span></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>RC group</td>
                    <td>
                      <input type="text" id="" value="" name="">
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>RC</td>
                    <td><input type="text" id="" value="" name=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Racine Client</td>
                    <td>
                      <input type="text" id="" value="40" name="" readonly style="background: yellow;">
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Nom du client</td>
                    <td>
                      <input type="text" id="" value="50" name="" readonly style="background: yellow;">
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Montant de la ligne de découvert</td>
                    <td><input type="text" id="" value="60" name="" readonly style="background: yellow;"></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Date de Valeur/Date de Déblocage</td>
                    <td>
                      <input type="text" id="" value="70" name="" readonly style="background: yellow;">
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Date 1èreéchéance</td>
                    <td><input type="text" id="" value="" name=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Date dernière échéance</td>
                    <td>
                      <input type="text" id="" value="" name="">
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Durée du prêt</td>
                    <td>
                      <input type="text" id="" value="" name="">
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Nombre échéances</td>
                    <td><input type="text" id="" value="" name=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Date accord CIC</td>
                    <td>
                      <input type="text" id="" value="" name="">
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Type de Différé (P/T/-)</td>
                    <td>
                      <input type="text" id="" value="" name="">
                    </td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Périodicité de remboursement</td>
                    <td><input type="text" id="" value="" name=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Compte courant</td>
                    <td><input type="text" id="" value="" name=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>frais de dossier</td>
                    <td><input type="text" id="" value="" name=""></td>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Taux</td>
                    <td><input type="text" id="" value="" name=""></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
              </div>
              <h3 id="tab-title"><span>2-Prèlèvement  les frais d’assurance</span></h3>  
              <div class="table-responsive">
                <table class="table table-condensed table-hover">
                  <thead>
                    <tr class="info">
                      <th>Compte</th>
                      <th><span>Libellé</span></th>
                      <th><span>Mtt FCFA</span></th>
                      <th><span>Sens</span></th>
                      <th><span>Référence</span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" id="" value="100" name="" readonly style="background: yellow;"></td>
                      <td><input type="text" id="" value="" name=""></td>
                      <td><input type="text" id="" value="" name=""></td>
                      <td>D</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><input type="text" id="" value="100" name="" readonly style="background: yellow;"></td>
                      <td><input type="text" id="" value="" name=""></td>
                      <td><input type="text" id="" value="" name=""></td>
                      <td>C</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <h3 id="tab-title"><span>3-Prèlèvement les frais d’adhésion au fonds de garantie</span></h3>  
              <div class="table-responsive">
                <table class="table table-condensed table-hover">
                  <thead>
                    <tr class="info">
                      <th>Compte</th>
                      <th><span>Libellé</span></th>
                      <th><span>Mtt FCFA</span></th>
                      <th><span>Sens</span></th>
                      <th><span>Référence</span></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><input type="text" id="" value="100" name="" readonly style="background: yellow;"></td>
                      <td><input type="text" id="" value="" name=""></td>
                      <td><input type="text" id="" value="" name=""></td>
                      <td>D</td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><input type="text" id="" value="" name=""></td>
                      <td><input type="text" id="" value="" name=""></td>
                      <td><input type="text" id="" value="" name=""></td>
                      <td>C</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>  
          </div>
          </div> -->
        </div>

      <?php } ?>

        <!-- end Tab-10 section if role is other than CAD -->
        <!-- End Tab-10-->



        
        <!-- Start Tab-6 section -->
        <div class="tab-pane fade" id="tab-6">

          <div class="row">
            <div class="col-md-3">
                  <div class="history_msg"></div>

            
                      <div class="form-group">

                      <label>Please Select From Below</label>

                      <select class="form-control" onChange="select_interaction_details()" id="interaction_details">

                        <option value="Email" id="Email">Email</option>

                        <option value="SMS" id="SMS">SMS</option>

                        <option value="EntretienTéléphonique" id="EntretienTéléphonique">Entretien Téléphonique</option>

                      </select>

                      </div>
              </div>
          </div>

          


          <div class="Email" style="display:block">
            <form id="emailHistoryForm" method="post" enctype="multipart/form-data">

              <div class="row">
				        
              <div class="col-md-3">

                <div class="form-group">

                <div class="input-group" style="width:100%">

                  <label>Nom et Prénoms</label>

                  <input type="text" class="form-control" id="field_name2" name="field_name" placeholder="Enter Nom et Prénoms" value="" required >

                </div>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <div class="input-group" style="width:100%">

                  <label>Email</label>

                  <input class="form-control" id="fieldemail2" name="fieldemail" value="<?php echo $customer->email ?>" placeholder="Enter Email" required>

                </div>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <div class="input-group" style="width:100%">

                  <label>Subject</label>

                  <input type="text" class="form-control" id="fieldsubject2" name="fieldsubject" value="" placeholder="Enter Subject" required>

                </div>

                </div>

              </div>

              <div class="col-md-12">

                <div class="form-group">

                <label>Message</label>

                <div class="input-group" style="width:100%">

                  <textarea type="text" rows="8" class="form-control" id="fieldmsg2" name="fieldmsg" placeholder="Enter Message" required></textarea>

                </div>

                </div>

              </div>
 <div class="col-md-12 ">

              <div class="clearfix" style="margin-top:20px;margin-bottom:30px; padding-bottom:30px; border-bottom:solid 1px #ddd;">

               
                <button type="submit" id="button_3_2" class="btn btn-primary pull-right sendEmail">ENVOYER</button>

                <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right callloder_details" style="position:relative;top: 9px;left:-13px; display: none;"> </div>

              </div>
              </div>

             

            </form>

             

            <div class="getdataajax_details"></div>

            <div class="row">
            <div class="col-lg-12">

            <div class="scrollable" style="">

              <div class="table-responsive">

              <table id="table-example" class="table table-striped table-hover">

                <thead>

                <tr class="success">

                  <th><span>Mode</span></th>

                  <th><span>Nom et Prénoms</span></th>

                  <th><span>Email</span></th>

                  <th><span>Subject</span></th>

                  <th><span>Message</span></th>

                  <th><span>Created</span></th>

                </tr>

                </thead>

                <tbody>

             <?php

          if(!empty($history_interaction['email'])){

          foreach ($history_interaction['email'] as $keys ) {
            $key=json_decode($keys['content']);
           // print_r($key->field_name);

            echo "<tr>";

              echo "<td>Email</td>";

              echo "<td>".$key->field_name."</td>";

              echo "<td>".$key->fieldemail."</td>";

              echo "<td>".$key->fieldsubject."</td>";

              echo "<td>".$key->fieldmsg."</td>";

              

              echo "<td>".$keys['created_at']."</td>";

             echo "</tr>";

           

            }

          }

          ?> 

                </tbody>

              </table>

              </div>

            </div>

            </div>
            </div>

          </div>

          <div class="SMS" style="display:none">

            <div class="row">
              <form id="smsHistoryForm" method="POST">

            <div class="col-md-12">

              <div class="col-md-6">

              <div class="form-group">

                <div class="input-group" style="width:100%">

                <label>Téléphone</label>

                <input type="text" class="form-control" id="sms_phone_no" name="sms_phone_no" placeholder="Enter Téléphone" value="<?php echo $customer->main_phone ?>">

                </div>

              </div>

              </div>

              <div class="col-md-6">

              <div class="form-group">

                <div class="input-group" style="width:100%">

                <label>Commentaire</label>

                <input class="form-control" id="sms_content" name="sms_content" placeholder="Enter Commentaire">

                </div>

              </div>

              </div>

            </div>

            <div class="col-md-12 ">

              <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

               
                <button type="submit" id="sms_btn" class="btn btn-primary pull-right">ENVOYER</button>

                <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right smsloader" style="position:relative;top: 9px;left:-13px; display: none;"> </div>

              </div>

          </form>

            </div>


              <div class="table-responsive">

              <table id="table-example" class="table table-striped table-hover">

                <thead>

                <tr class="success">

                  <th><span>Mode</span></th>
                  <th><span>Téléphone</span></th>
                  <th><span>Commentaire</span></th>
                  <th><span>Created</span></th>

                </tr>

                </thead>

                <tbody>

             <?php

          if(!empty($history_interaction['sms'])){


          foreach ($history_interaction['sms'] as $keys ) {
            $key=json_decode($keys['content']);
           // print_r($key->field_name);

            echo "<tr>";

              echo "<td>SMS</td>";

              echo "<td>".$key->sms_phone_no."</td>";

              echo "<td>".$key->sms_content."</td>";

              echo "<td>".$keys['created_at']."</td>";

             echo "</tr>";

           

            }

          }

          ?> 

                </tbody>

              </table>

              </div>

          </div>

          <div class="EntretienTéléphonique" style="display:none">

            <div class="row">

              <form id="interviewHistoryForm" method="POST">

            <div class="col-md-12">

              <div class="col-md-6">

              <div class="form-group">

                <div class="input-group" style="width:100%">

                <label>Commentaire</label>

                <input type="text" class="form-control" id="interview_comment" name="interview_comment" placeholder="Enter Commentaire">

                </div>

              </div>

              </div>

            </div>

            <div class="col-md-12">
            <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

               
                <button type="submit" id="int_btn" class="btn btn-primary pull-right">ENVOYER</button>

                <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right interviewloader" style="position:relative;top: 9px;left:-13px; display: none;"> 
              </div>
            </div>

             
            </form>
          </div>

           <div class="table-responsive">

              <table id="table-example" class="table table-striped table-hover">

                <thead>

                <tr class="success">

                  <th><span>Mode</span></th>
                  <th><span>Entretien Téléphonique</span></th>
                  <th><span>Created</span></th>

                </tr>

                </thead>

                <tbody>

             <?php

          if(!empty($history_interaction['interview'])){


          foreach ($history_interaction['interview'] as $keys ) {
            $key=json_decode($keys['content']);
           // print_r($key->field_name);

            echo "<tr>";

              echo "<td>Interview</td>";

              echo "<td>".$key->interview_comment."</td>";

              echo "<td>".$keys['created_at']."</td>";

             echo "</tr>";

           

            }

          }

          ?> 

                </tbody>

              </table>

              </div>



          </div>

          </div>

        <div class="tab-pane fade" id="tab-8">
          <div class="row">
            <small class="Outputmsgtab19"></small>
            <?php
            //echo "<pre>",print_r($collateral),"</pre>";
            ?>
          </div>
          
          <div style="display:block" class="Véhicule">
            <div class="row">
              <div class="col-md-12" >                    
                <form id="collateralformvehicule1" name="uploadImages" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                  <div id="field">
                    <div id="field1">
                      <!-- Text input-->
                      <div class="row" style="margin:10px 0 0 0;">
					     <div class="col-md-3">
              <div class="form-group">
                <label>Please Select From Below</label>
                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                <select class="form-control" onChange="select_collateral_details()" id="collateral_details" name="selected_field">                    
                <option value="Véhicule" id="Véhicule">Véhicule</option>
                <option value="Déposit" id="Déposit">Déposit</option>
                <option value="Maison" id="Maison">Maison</option>
                <option value="Excemption" id="Excemption">Excemption</option>
                </select>
              <?php } else {?>
                <select class="form-control" id="" name="selected_field" readonly disabled>
                  <option value="Véhicule" id="Véhicule">Véhicule</option>
              </select>
              <?php } ?>
              </div>
            </div>
         
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Type </label>
                           <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                            <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Type', 'id' => 'vehicule_type', 'autocomplete'=>'off'));?>

                          <?php } else {?>                          
                            <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Type', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>

                          </div>
                        </div>                  
                        <!-- Text input-->
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Marque </label>
                           <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_marque', '', array('class' => 'form-control', 'placeholder' => 'Enter Marque', 'id' => 'vehicule_marque', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Marque', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>
                          </div>
                        </div>                  
                        <!-- File Button --> 
                        <div class="col-md-3">
                          <div class="form-group">
                           <label> Modèle </label>
                           <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_modele', '', array('class' => 'form-control', 'placeholder' => 'Enter Modèle', 'id' => 'vehicule_modele', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Modèle', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>


                           
                          </div>
                        </div>
                        <!-- File Button --> 
                       </div>                  
                      <div class="row" style="margin:10px 0 0 0;">
					     <div class="col-md-3">
                          <div class="form-group">
                          <label>Carte Grise</label>
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_carte_grise', '', array('class' => 'form-control', 'placeholder' => 'Enter Carte Grise', 'id' => 'vehicule_carte_grise', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Carte Grise', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>
                          
                          </div>
                        </div>
                    
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Style </label>
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_style', '', array('class' => 'form-control', 'placeholder' => 'Enter Style', 'id' => 'vehicule_style', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Style', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>
                          
                          </div>
                        </div>                  
                        <!-- Text input-->
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Année </label>
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_annee', '', array('class' => 'form-control', 'placeholder' => 'Enter Année', 'id' => 'vehicule_annee', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Année', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>
                          
                          </div>
                        </div>                  
                        <!-- File Button --> 
                        <div class="col-md-3">
                          <div class="form-group">
                          <label> Kilométrage </label>
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_kilometrage', '', array('class' => 'form-control', 'placeholder' => 'Enter Kilométrage', 'id' => 'vehicule_kilometrage', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Kilométrage', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>
                          
                          </div>
                        </div>
                        <!-- File Button --> 
                      </div>
                      <div class="row" style="margin:10px 0 0 0;">
					         <div class="col-md-3">
                          <div class="form-group">
                           <label>Commentaire</label>
                           <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_commentaire', '', array('class' => 'form-control', 'placeholder' => 'Enter Commentaire', 'id' => 'vehicule_commentaire', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Commentaire', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>
                           
                          </div>
                        </div>
                 
                        <div class="col-md-3 col-md-12">
						<label>Upload File</label>
                          <div class="form-group">
                           <span style="display:block">
                            <?php if($appformD[0]['check_vehicule']!=1){
                              // $disabledStatus1="disabled='disabled'";
                              $checkedY1="";
                              $checkedN1="checked='checked'";
                            }else{
                              $disabledStatus1="";
                              $checkedN1="";
                              $checkedY1="checked='checked'";
                            }
                            ?>
                            <label class=" " style="border-radius:25px;height:32px;">  
                               <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <input id="vehicule_uploadfile2" class="file-upload form-control" type="file" multiple="" name="vehicule_uploadfile[]" accept="application/msword,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*" <?= $disabledStatus1; ?>>
                            <?php }else{ ?>
                              <input  class="file-upload form-control" type="file"   readonly>
                            <?php } ?>                          
                            </label>
                          </span>
                          </div>
                        </div>

                        <div class="col-md-3 col-md-12">
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                              ?>
                          <div class="form-group" style="    margin-top: 18px;">
                            <div class="radio" style="display:inline-block">
                              <input type="radio" name="optionsname" id="optionsRadios000101" class="check_options01" value="1" <?php echo $checkedY1;?> />
                              <label for="optionsRadios000101"> YES </label>
                            </div>
                            <div class="radio" style="display:inline-block">
                              <input type="radio" name="optionsname" id="optionsRadios000202" class="check_options02" value="0" <?php echo $checkedN1;?> >
                              <label for="optionsRadios000202"> NO </label>
                            </div>
                          </div>
                          <?php }  ?>
                        </div>
                      </div>                        
                    </div>
                  </div>
                  <input type="hidden" name="cl_aid"  value="<?php echo $this->uri->segment(3);?>" readonly>
                  <input type="hidden" name="vcustomar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>
                </form>                   
                <div class="getdataajaxvehicule2"></div>
              </div>
              <textarea rows="20" cols="10" class="form-control postprevievehicule2" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
                <br />
            </div>
          </div>          
                    
          <div style="display:none" class="Déposit">
            <div class="col-xs-12">                                  
              <div class="col-md-12" >
                <form id="collateralformdeposit2" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                  <div id="fielddeposit" style="margin-left: -22px;">
                    <div id="fielddeposit2">
                      <!-- Text input-->
                      <div class="row" style="margin:10px 0 0 0;">
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Numéro de compte </label>
                          <?php echo form_input('d_numero_de_compte', '', array('class' => 'form-control', 'placeholder' => 'Enter Numéro de compte', 'id' => 'd_numero_de_compte', 'autocomplete'=>'off'));?>
                          </div>
                        </div>                  
                        <!-- Text input-->
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Montant </label>
                          <?php echo form_input('d_montant', '', array('class' => 'form-control', 'placeholder' => 'Enter Montant', 'id' => 'd_montant', 'autocomplete'=>'off'));?>
                          </div>
                        </div>                          
                      </div>

                      <?php if($appformD[0]['check_deposit']!=1){
                        // $disabledStatusd2="disabled='disabled'";
                        $checkedY2d="";
                        $checkedN2d="checked='checked'";
                      }else{
                        $disabledStatusd2="";
                        $checkedN2d="";
                        $checkedY2d="checked='checked'";
                      }
                      ?>
                      <div class="row" style="margin:10px 0 0 0;">
                        <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                            <span style="display:block">
                              <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="depositloder2" style="display:none">
                              <input id="deposit_files2" type="file" multiple="" name="deposit_files[]" accept="application/msword,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*" <?php echo $disabledStatusd2;?>>
                            </label>
                            </span>
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                            <div class="radio" style="display:inline-block">
                              <input type="radio" name="option_name2" id="optionsRadios000303" class="check_options03" value="1" <?php echo $checkedY2d;?> />
                              <label for="optionsRadios000303"> YES </label>
                            </div>
                            <div class="radio" style="display:inline-block">
                              <input type="radio" name="option_name2" id="optionsRadios000404" class="check_options04" value="0" <?php echo $checkedN2d;?> >
                              <label for="optionsRadios000404"> NO </label>
                            </div>
                          </div>
                        </div>


                      </div>
                    </div>
                  </div>                      
                                          
                  <div class="col-md-12">
                    <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">
                    <input type="hidden" name="cl_aid"  value="<?php echo $this->uri->segment(3);?>" readonly>
                      <input type="hidden"  id="customar_id_deposit" name="customar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>
                    </div>
                  </div>
                </form>
                <div class="getdataajaxdeposit2"></div>
              </div>   
              
              <textarea row="20" cols="10" class="form-control postpreviedeposit" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
              
                <br/>                                    
            </div>
          </div>                
                    
          <div style="display:none" class="Maison">
            <div class="col-xs-12">
              <div class="col-md-12">
                <form id="collateralformmaison2" name="uploadImages" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                  <div id="fieldmaison2" style="margin-left: -22px;">
                    <div id="fieldmaison2">
                      <!-- Text input-->
                      <div class="row" style="margin:10px 0 0 0;">
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Type de propriétaire </label>
                          <?php echo form_input('m_type_de_proprietaire', '', array('class' => 'form-control', 'placeholder' => 'Enter Type de propriétaire', 'id' => 'm_type_de_proprietaire', 'autocomplete'=>'off'));?>
                          </div>
                        </div>                  
                        <!-- Text input-->
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Etat de la maison </label>
                          <?php echo form_input('m_etatde_maison', '', array('class' => 'form-control', 'placeholder' => 'Enter Etat de la maison', 'id' => 'm_etatde_maison', 'autocomplete'=>'off'));?>
                          </div>
                        </div>                  
                        <!-- File Button --> 
                        <div class="col-md-3">
                          <div class="form-group">
                           <label> Année de construction </label>
                           <?php echo form_input('m_annee_construction', '', array('class' => 'form-control', 'placeholder' => 'Enter Année de construction', 'id' => 'm_annee_construction', 'autocomplete'=>'off'));?>
                          </div>
                        </div>
                        <!-- File Button --> 
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Nombre de pièce</label>
                          <?php echo form_input('m_nombre_de_piece', '', array('class' => 'form-control', 'placeholder' => 'Enter Nombre de pièce', 'id' => 'm_nombre_de_piece', 'autocomplete'=>'off'));?>
                          </div>
                        </div>
                      </div>                  
                      <div class="row" style="margin:10px 0 0 0;">
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Adresse </label>
                          <?php echo form_input('m_adresse', '', array('class' => 'form-control', 'placeholder' => 'Enter Adresse', 'id' => 'm_adresse', 'autocomplete'=>'off'));?>
                          </div>
                        </div>                  
                        <!-- Text input-->
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Titre foncier </label>
                          <?php echo form_input('m_titre_foncier', '', array('class' => 'form-control', 'placeholder' => 'Enter Titre foncier', 'id' => 'm_titre_foncier', 'autocomplete'=>'off'));?>
                          </div>
                        </div>                  
                        <!-- File Button --> 
                        <div class="col-md-3">
                          <div class="form-group">
                          <label> Superficie </label>
                          <?php echo form_input('m_superficie', '', array('class' => 'form-control', 'placeholder' => 'Enter Superficie', 'id' => 'm_superficie', 'autocomplete'=>'off'));?>
                          </div>
                        </div>
                        <!-- File Button --> 
                        <div class="col-md-3">
                          <div class="form-group">
                           <label>Commentaire</label>
                           <?php echo form_input('m_commentaire', '', array('class' => 'form-control', 'placeholder' => 'Enter Commentaire', 'id' => 'm_commentaire', 'autocomplete'=>'off'));?>
                          </div>
                        </div>
                      </div>
                       <?php if($appformD[0]['check_maison']!=1){
                          // $disabledStatusm2="disabled='disabled'";
                          $checkedYm2="";
                          $checkedNm2="checked='checked'";
                        }else{
                          $disabledStatusm="";
                          $checkedNm2="";
                          $checkedYm2="checked='checked'";
                        }
                        ?>
                      <div class="row" style="margin:10px 0 0 0;">
                        <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                           <span style="display:block">
                            <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload 
                            <img src="<?php echo base_url("assets/img/loading.gif");?>" class="maisonloder2" style="display:none">
                              <input id="upload_maison2" class="systemm_files upload_maison" type="file" multiple="" name="upload_maison[]" accept="application/msword,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">
                            </label>
                          </span>
                          </div>
                        </div>

                        <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                            <div class="radio" style="display:inline-block">
                              <input type="radio" name="options_name5" id="optionsRadios000505" class="check_options05" value="1" <?php echo $checkedYm2;?> />
                              <label for="optionsRadios000505"> YES </label>
                            </div>
                            <div class="radio" style="display:inline-block">
                              <input type="radio" name="options_name5" id="optionsRadios000606" class="check_options06" value="0" <?php echo $checkedNm2;?> >
                              <label for="optionsRadios000606"> NO </label>
                            </div>
                          </div>
                        </div>


                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">
                      <input type="hidden" name="cl_aid"  value="<?php echo $this->uri->segment(3);?>" readonly>
                      <input type="hidden" name="customar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>
                    </div>
                  </div>
                </form>
                <div class="getdataajaxmaison2"></div>
              </div>          
                
              <textarea row="20" cols="10" class="form-control postviewmmaison" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>                      
            </div>                  
          </div>

          <div style="display:none" class="Excemption">
            <div class="col-xs-12">                                  
              <div class="col-md-12" >
                <form id="collateralformexcemption2" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                  <div id="fieldexcemption0" style="margin-left: -22px;">
                    <div id="fieldexcemption2">

                      <?php if($appformD[0]['check_excemption']!=1){
                          // $disabledStatuse1="disabled='disabled'";
                          $checkedYe1="";
                          $checkedNe1="checked='checked'";
                        }else{
                          $disabledStatuse1="";
                          $checkedNe1="";
                          $checkedYe1="checked='checked'";
                        }
                        ?>
                      <div class="row" style="margin:10px 0 0 0;">
                        <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                            <span style="display:block">
                              <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="excemptionloder2" style="display:none">
                              <input id="excemption_files2" type="file" multiple="" name="excemption_files[]" accept="application/msword,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*" <?= $disabledStatuse1;?> >
                            </label>
                            </span>
                          </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                          <div class="form-group">
                            <div class="radio" style="display:inline-block">
                              <input type="radio" name="optionnamefield" id="optionsRadios000707" class="check_options07" value="1" <?php echo $checkedYe1;?> />
                              <label for="optionsRadios000707"> YES </label>
                            </div>
                            <div class="radio" style="display:inline-block">
                              <input type="radio" name="optionnamefield" id="optionsRadios000808" class="check_options08" value="0" <?php echo $checkedNe1;?> >
                              <label for="optionsRadios000808"> NO </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">
                    <input type="hidden" name="cl_aid"  value="<?php echo $this->uri->segment(3);?>" readonly>
                      <input type="hidden"  id="customar_id_excemption" name="customar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>
                    </div>
                  </div>
                </form>
                <div class="getdataajaxexcemption2"></div>
              </div>
              <textarea row="20" cols="10" class="form-control postviewexcemption" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
              <br/>                                    
            </div>
          </div>

          <div class="col-md-12" >
            <?php
            //echo "<pre>", print_r($collateral[0]), "</pre>";
            foreach ($collateral_vehicule as $key1 ) {

            if(!empty($key1['selected_field']=="Véhicule")){ ?>
            <!-- Table Véhicule -->
            <h3 id="tab-title"><span>Véhicule</span></h3>
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="success">
                  <th><span>Type</span></th>
                  <th><span>Marque</span></th>
                  <th><span>Modèle</span></th>
                  <th><span>Carte Grise</span></th>
                  <th><span>Style</span></th>
                  <th><span>Année</span></th>
                  <th><span>Kilométrage</span></th>
                  <th><span>Commentaire</span></th>                                        
                  <th class="text-right"><span>Action </span></th>
                  </tr>
                </thead>
                <tbody id="category-row">
                  <?php 
                    $v=1;
                    foreach($collateral as $coll){
                    //  print_r($coll);
                    if($coll['selected_field']=="Véhicule"){
                  ?>
                  <tr>
                  <td><?php echo trim($coll['v_type']);?></td>
                  <td><?php echo trim($coll['v_marque']);?></td>
                  <td><?php echo trim($coll['v_modele']);?></td>
                  <td><?php echo trim($coll['v_carte_grise']);?></td>
                  <td><?php echo trim($coll['v_style']);?></td>
                  <td><?php echo trim($coll['v_annee']);?></td>
                  <td><?php echo trim($coll['v_kilometrage']);?></td>
                  <td><?php echo trim($coll['v_commentaire']);?></td>
                  <td class="text-right"><div class="row">
                    <div class="form-group">
                    <span style="display:inline-block">
                      <!-- <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_preview_vehicule-<?php echo $coll['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $coll['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                                -->
                    </span>
                    <span style="display:inline-block">
                      <a href="<?php echo base_url('PP_Credit_Scholar/download_collateralvehicule/').$coll['col_id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light downloadv" data-toggle="tooltip" title="Download" id="collateral_downloadv-<?php echo $coll['col_id'];?>"> <i class="fa fa-cloud-download"></i></a>
                    </span>
                     </div>
                   </div>
                   </td>
                  </tr>
                  <?php } 
                  $v++;
                  }
                  ?>
                </tbody>
              </table>                                   
              <br>
            <?php }
            } 
            ?>

            <?php 
            foreach ($collateral_deposit as $key2 ) { 
            if(!empty($key2['selected_field']=="Déposit")){ ?>
              <h3 id="tab-title"><span>Déposit</span></h3>
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="success">                                        
                  <th><span>Numéro de compte</span></th>
                  <th><span>Montant</span></th>
                  <th><span>Date</span></th>
                  <th class="text-right"><span>Action </span></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                //echo $collateral[0]['selected_field'];
                if(!empty($collateral)){
                  $d=1;
                  foreach($collateral as $dept){
                  if($dept['selected_field']=="Déposit"){
                ?>
                  <tr>                                        
                  <td><?php echo $dept['d_numero_de_compte'];?></td>
                  <td><?php echo $dept['d_montant'];?></td>
                  <td><?php echo date("d/m/Y", strtotime($dept['created']));?></td>
                  <td class="text-right">
                    <div class="row">
                      <div class="form-group">
                      <span style="display:inline-block">
                        <!-- <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_preview_deposit-<?php echo $dept['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $dept['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                                -->
                      </span>
                      <span style="display:inline-block">
                        <a href="<?php echo base_url('PP_Credit_Scholar/download_collateraldeposit/').$dept['col_id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light downloadv" data-toggle="tooltip" title="Download" id="collateral_downloadv-<?php echo $dept['col_id'];?>"> <i class="fa fa-cloud-download"></i></a>
                      </span>
                       </div>
                    </div>
                   </td>
                  </tr>
                  <?php } $d++;} 
                  } else{ ?>
                    <tr>
                      <td colspan="4">No matching records found!</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <br/>
              <?php }
            } ?>

            <?php
            foreach ($collateral_maison as $key3 ) { 
            if(!empty($key3['selected_field']=="Maison")){ ?>
              <h3 id="tab-title"><span>Maison</span></h3>
              <table class="table table-striped table-hover" >
                <thead>
                  <tr class="success">
                  <th><span>Type de propriétaire</span></th>
                  <th><span>Etat de la maison</span></th>
                  <th><span>Année de construction</span></th>
                  <th><span>Nombre de pièce</span></th>
                  <th><span>Adresse</span></th>
                  <th><span>Titre foncier</span></th>
                  <th><span>Superficie</span></th>
                  <th><span>Commentaire</span></th>
                  <th class="text-right" width="10%"><span>Action </span></th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                //echo $collateral[0]['selected_field'];
                if(!empty($collateral)){
                  $m=1;
                  foreach($collateral as $maison){
                  if($maison['selected_field']=="Maison"){
                ?>
                  <tr>                        
                  <td><?php echo $maison['m_type_de_proprietaire'];?></td>
                  <td><?php echo $maison['m_etatde_maison'];?></td>
                  <td><?php echo $maison['m_annee_construction'];?></td>
                  <td><?php echo $maison['m_nombre_de_piece'];?></td>
                  <td><?php echo $maison['m_adresse'];?></td>
                  <td><?php echo $maison['m_titre_foncier'];?></td>
                  <td><?php echo $maison['m_superficie'];?></td>
                  <td><?php echo $maison['m_commentaire'];?></td>
                  <td class="text-right">
                  <div class="row">
                    <div class="form-group">
                      <span style="display:inline-block">
                        <!-- <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_previewv-<?php echo $maison['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $maison['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                                -->
                      </span>
                      <span style="display:inline-block">
                        <a href="<?php echo base_url('PP_Credit_Scholar/download_collateralmaison/').$maison['col_id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light downloadv" data-toggle="tooltip" title="Download" id="collateral_downloadv-<?php echo $maison['col_id'];?>"> <i class="fa fa-cloud-download"></i></a>
                      </span>
                    </div>
                  </div>
                  </td>
                  </tr>
                  <?php } $m++;} 
                  } else{ ?>
                    <tr>
                      <td colspan="4">No matching records found!</td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <br/> 
            <?php }
            } ?>

            <?php foreach ($collateral_excemption as $key4 ) {
            if(!empty($key4['selected_field']=="Excemption")){ ?>
              <h3 id="tab-title"><span>Excemption</span></h3>
            <table class="table table-striped table-hover">
              <thead>
                <tr class="success">
                <th><span>Excemption</span></th>                        
                <th><span>Date</span></th>
                <th class="text-right"><span>Action</span></th>
                </tr>
              </thead>
              <tbody>
              <?php 
              //echo $collateral[0]['selected_field'];
              if(!empty($collateral)){
                $d=1;
                foreach($collateral as $dept){
                if($dept['selected_field']=="Excemption"){
              ?>
                <tr>
                <td> #<?php echo sprintf("%'03d", $d);?> </td>
                <td><?php echo date("d/m/Y", strtotime($dept['created']));?></td>
                <td class="text-right">
                  <div class="row">
                    <div class="form-group">
                    <span style="display:inline-block">
                      <!-- <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_preview_excemption-<?php echo $coll['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $coll['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                                -->
                    </span>
                    <span style="display:inline-block">
                      <a href="<?php echo base_url('PP_Credit_Scholar/download_collateralexcemption/').$coll['col_id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light downloadv" data-toggle="tooltip" title="Download" id="collateral_downloadv-<?php echo $coll['col_id'];?>"> <i class="fa fa-cloud-download"></i></a>
                    </span>
                     </div>
                  </div>
                 </td>
                </tr>
                <?php } $d++;} 
                } else{ ?>
                  <tr>
                    <td colspan="3">No matching records found!</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <br />
            <?php } } ?>
          </div>
      </div>

          

          <div class="tab-pane fade" id="tab-7">

                      <h3 id="tab-title"><span>INFORMATIONS SUR LE PRET</span></h3>

            <form id="loanEditForm" action="#"  method="post">

              <div class="row">

              <div class="col-md-3">

                <div class="form-group">

                <label>NATURE DU PRET</label>

                <input type="text" class="form-control" value="Prêt Crédit Confort" readonly disabled>

                <input type="hidden" id="loan_type" name="loan_type" value="credit_confort" readonly >

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <label>MONTANT DU PRET</label>
                <div class="input-group">
								<span class="input-group-addon">F CFA</span>
								<?php if ($current_user_decision['review'] == 1){?>
                     <input type="text" class="form-control" value="<?php echo number_format($loan_details['loan_amt'],0,',',' ')?>" readonly >  <?php } else if($this->session->userdata('role') == "2") {?>
							<select class="form-control" id="loan_amt_drop" onchange='CheckColors(this.value);' required <?php if (!in_array('7_2', $this->session->userdata('portal_permission'))){
                      echo "disabled" ; }?> >
							<!--  <option value="<?php echo $loan_details['loan_amt'];?>" selected><?php echo number_format($loan_details['loan_amt'],0,',',' ');?></option> -->
							    <option value="other" >Saisir un Montant</option>
								<option value="2000000" <?php if($loan_details['loan_amt']=="2000000"){echo "selected";}?>>2 000 000</option>
								<option value="2500000" <?php if($loan_details['loan_amt']=="2500000"){echo "selected";}?>>2 500 000</option>
								<option value="3000000" <?php if($loan_details['loan_amt']=="3000000"){echo "selected";}?>>3 000 000</option>
								<option value="3500000" <?php if($loan_details['loan_amt']=="3500000"){echo "selected";}?>>3 500 000</option>
                                <option value="4000000" <?php if($loan_details['loan_amt']=="4000000"){echo "selected";}?>>4 000 000</option>
                                <option value="4500000" <?php if($loan_details['loan_amt']=="4500000"){echo "selected";}?>>4 500 000</option>
                                <option value="5000000"> <?php if($loan_details['loan_amt']=="5000000"){echo "selected";}?>5 000 000</option>
								
							</select>
							<input type="number" class="form-control numberformat" id="loan_amt"  name="loan_amt" min="2000000" max="5000000"
                <?php
                $amountArray=['2000000','2500000','3000000','3500000','4000000','4500000','5000000'];
                if(in_array( $loan_details['loan_amt'] ,$amountArray )){
                 
                echo " style='display:none;' "; echo "value='".$loan_details['loan_amt']."'";

               }else{
                
                  echo "value='".$loan_details['loan_amt']."'";
               } 
               echo ">";
               }else{?>
               <input type="text" class="form-control" value="<?php echo number_format($loan_details['loan_amt'],0,',',' ')?>" readonly >
               <?php }  ?>
							</div>

                </div>

              </div>

               <div class="col-md-3">

                <div class="form-group">

                <label>OBJET DU FINANCEMENT</label>
                <?php if ($current_user_decision['review'] == 1){?>
                    <input type="text" class="form-control" value="<?php echo $loan_details['loan_object']?>" readonly >
                <?php }else if($this->session->userdata('role') == "2"){ ?>
               <select class="form-control" id="loan_object_drop" onchange='add_object(this.value);' required>
                
                <option value="credit confort" <?php if($loan_details['loan_object'] == "credit confort") echo "selected";?>>Credit Confort</option>
                <option value="other" <?php if($loan_details['loan_object'] != "credit confort" &&  $loan_details['loan_object'] != "conges a la carte" && $loan_details['loan_object'] != "fetes a la carte") echo "selected";?> >Other</option>
              </select>

                <input type="text" class="form-control" id="loan_object"  name="loan_object"  value="<?php echo $loan_details['loan_object'];?>"  <?php if($loan_details['loan_object'] != "credit confort" &&  $loan_details['loan_object'] != "conges a la carte" && $loan_details['loan_object'] != "fetes a la carte"){?> style='display:block;' <?php } else {?> style='display:none;'  <?php } ?> >

                  <?php }else{?>
                        <input type="text" class="form-control" value="<?php echo $loan_details['loan_object']?>" readonly >
                        <?php }?>
                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <label>TAUX INTERET</label>

                <div class="input-group">

                  <input type="number" class="form-control" id="loan_interest" name="loan_interest" autocomplete="off" value="<?php echo $loan_details['loan_interest'];?>" required min="2" readonly>

                  <span class="input-group-addon">%</span> </div>

                </div>

              </div>

             

              </div>

              <div class="row">

                 <div class="col-md-3">

                <div class="form-group">

                <label>DUREE</label>
                <?php if ($current_user_decision['review'] == 1){?>
                       <input type="text" class="form-control" value="<?php echo $loan_details['loan_term']?>" readonly > <?php } else if($this->session->userdata('role') == "2"){?>
                <select class="form-control numberformat" name="loan_term" id="loan_term" required <?php if (!in_array('7_2', $this->session->userdata('portal_permission'))){
                      echo "disabled" ; }?>>

                  <?php for($duration=1;$duration<=24;$duration++){?>
                      <option value="<?php echo $duration;?>" <?php if($loan_details['loan_term']==$duration){echo "selected";}?>><?php echo $duration;?></option>
                  <?php } ?>
                
              
                
              </select>
              <?php }else{?>
               <input type="text" class="form-control" value="<?php echo $loan_details['loan_object']?>" readonly >
              <?php }?>
                <!--<input type="number" class="form-control" id="loan_term" name="loan_term" autocomplete="off" value="<?php echo $loan_details['loan_term'];?>" required min="0" >-->

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <label>PERIODICITE DE REMBOURSEMENT</label>

                <?php

              $products = array("Monthly", "Quarterly", "Half Yearly", "Yearly");

              ?>

             <select class="form-control" name="loan_schedule" id="loan_schedule" required readonly>
              <option value="Monthly" selected>MOIS</option>

                  <?php foreach($products as $item){

                if(trim($loan_details['loan_schedule']) == $item){ $select="selected";}else{$select="";}

                

              }?>

               </select>
                </div>
              </div>
             
               <div class="col-md-3" hidden>
                <div class="form-group">
                  <label>TAUX FOND DE GARANTIE</label>
                  <input type="number" class="form-control" id="loan_guarantee" name="loan_guarantee" autocomplete="off" value="<?php echo $loan_details['loan_guarantee'];?>" required min="0" >
                </div>
              </div>

              <div class="col-md-3" style="display: none;">

                <div class="form-group">

                <label>Fees</label>

                <input type="text" class="form-control" id="loan_fee2" name="loan_fee" autocomplete="off" value="<?php echo $appformD[0]['loan_fee'];?>" required readonly>

                </div>

              </div>

              <div class="col-md-3" style="display: none;">

                <div class="form-group">

                <label>Taxes</label>

                <select class="form-control" name="loan_tax" id="loan_tax2" required>

                  <?php   foreach($loantax as $tax){

                if($appformD[0]['loan_tax']==$tax['tid']){ $select="selected";}else{$select="";}

                echo '<option value="'.$tax['tid'].'" '.$select.'>'.$tax['tax_type'].'</option>';

              }?>

                </select>

                </div>

              </div>

              <div class="col-md-3" style="display: none;">

                <div class="form-group">

                <label>Commission</label>

                <input type="text" class="form-control" id="loan_commission2" name="loan_commission" autocomplete="off" value="<?php echo $appformD[0]['loan_commission'];?>" readonly>

                </div>

              </div>

              <div class="col-md-12">

                <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

                <input type="hidden"  id="editid" name="loan_id"  value="<?php echo $loan_details['loan_id'];?>" readonly>
                <input type="hidden"  id="editid" name="loan_id_temp"  value="<?php echo $loan_details['loan_id_temp'];?>" readonly>

                <input type="hidden"  id="ecustomar_id" name="ecustomar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>

                <?php if($this->session->userdata('role') == "2") {
                        if ($current_user_decision['review'] == 1){}else{?>
                <button type="button" id="button_2" class="btn btn-primary pull-right">Enregistrer les details </button>
              <?php }} ?>

                <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right calculatorloder" style="position:relative;top: 9px;left:-13px; display: none;">

                </div>

              </div>

              </div>

            </form>

            <div class="editloanmsgdetails"></div>

            </div>

            <!-- Start Tab-19  -->
          <div class="tab-pane fade" id="tab-10">
            <div class="row">
              <small class="Outputmsgtab19"></small>
              <?php
              //echo "<pre>",print_r($collateral),"</pre>";
              ?>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Please Select From Below</label>
                  <?php if($loan_details['status']!="Disbursement"){ ?>
                  <select class="form-control" onChange="select_collateral_details()" id="collateral_details" name="selected_field">                    
                  <option value="Véhicule" id="Véhicule">Véhicule</option>
                  <option value="Déposit" id="Déposit">Déposit</option>
                  <option value="Maison" id="Maison">Maison</option>
                  <option value="Excemption" id="Excemption">Excemption</option>
                  </select>
                <?php } else {?>
                  <select class="form-control" id="" name="selected_field" readonly disabled>
                    <option value="Véhicule" id="Véhicule">Véhicule</option>
                </select>
                <?php } ?>
                </div>
              </div>
            </div>
            
            <div style="display:block" class="Véhicule">
              <div class="col-xs-12">
                <div class="col-md-12" >                    
                                   
                  <div class="getdataajaxvehicule2"></div>
                </div>
              
              </div>
            </div>          
            
        </div>
        <!-- End Tab-19  -->
        <div class="tab-pane fade" id="tab-9">

          <?php if($this->session->userdata('role') != "11" && $this->session->userdata('role') != "9"  && in_array('7_6', $this->session->userdata('portal_permission')) ) {?>
            <form id="DecisionStatusdetails" method="post">
               
           
           
             <div style="display:block" class="Approbation">

                <div class="row">
				  <div class="col-md-6">
                  <div class="form-group">
                    <label>SELECTIONNER VOTRE AVIS</label>    
                    <?php
                     if($this->session->userdata('role') == "2")
                    {
                        $decision = array("Avis Favorable","Avis défavorable","Annuler");
                    }
                    else if($this->session->userdata('role') == "3")
                    {
                        $decision = array("Avis Favorable","Avis défavorable","Demande de retraitement","Abandonner");
                    }
                    else if($this->session->userdata('role') == "12")
                    {
                        $decision = array("Demande de retraitement");
                    }
                    else{
                        $decision = array("Avis Favorable","Avis défavorable","Demande de retraitement");
                    }
                    
                    
                    ?>
                     <select class="form-control" id="decision" name="decision" <?php if($param == "view" || $current_user_decision['review'] == 1) echo "disabled";?>
                     >
                        <?php foreach($decision as $dec){
                          if(trim($current_user_decision['approval_status']) == $dec){ 
                            $select="selected";
                          }
                          else{ 
                            $select=""; 
                          }
                          echo '<option value="'.$dec.'" '.$select.'>'.$dec.'</option>';
                        } ?>
                      </select>
                  </div>
                </div>
             
                   <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group" style="width:100%">
                        <label>Commentaire</label>
                        <?php 
                       //  print_r($current_user_decision);
                        if($param == "edit" && $current_user_decision['review']=='0'){ ?>
                          <input type="text" class="form-control comment_status_c" id="commentstatus" name="commentstatus" placeholder="Enter Commentaire" autocomplete="off" required />
                        <?php  } else if($param == "view" || $current_user_decision['review']=="1" || $current_user_decision['review']=="") { ?>
                          <input type="text" class="form-control comment_status_c" placeholder="Enter Commentaire" autocomplete="off" disabled />
                         <?php  } ?>
                      </div>
                    </div>
                  </div> 

                  <div class="col-md-12">
                  <div style="margin-top:20px;margin-bottom:30px; padding-bottom:60px; border-bottom:solid 1px #ddd;">
                    

                    <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right commentlofer" style="position:relative;top: 17px;left:-124px; display:none;">
                    <button type="button" class="btn btn-primary pull-right clearfix" id="commentsubmit" style="">SOUMETTRE</button>
                  </div> 
                  </div> 
                
				</div>
                  
             </div>
               </form>
              <?php } ?>
			  
			  <div class="row">
                  <div class="col-lg-12">
            
              <div class="scrollable" style="">
                <div class="table-responsive">
                  <table id="table-decision-details" class="table table-striped table-hover">
                    <thead>
                      <tr class="success">
                        <th style="display: none;"><span>Sno.</span></th>                        
                        <th><span>TYPE UTILISATEUR</span></th>
                        <th><span>UTILISATEURS</span></th>
                        <th><span>DECISION UTILISATEUR</span></th>
                        <th><span>COMMENTAIRE</span></th>
                        <th><span>DATE ACTON</span></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cur_time=date("Y-m-d H:i:s");;
                     if(!empty($decision_rec)){
						$dcount = 1;
					foreach ($decision_rec as $rec ) {
							
						 $timetoago=$rec['comment_date'];
							echo "<tr>";
									echo "<td style='display:none;'>".$dcount."</td>";
									echo "<td>".$rec['name']."</td>";
									echo "<td>".ucwords($rec['first_name']." ".$rec['last_name'])."</td>";
									echo "<td>".$rec['decision']."</td>";
									echo "<td>".$rec['comment']."</td>";
									echo "<td>". date('d-m-Y', strtotime($rec['comment_date'])).':'.timeAgo3($timetoago,$cur_time)."</td>";
							 echo "</tr>";

							 $dcount++;
							}

						}                                              
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>                       
          </div>


          <!-- End Tab-9 -->       


          <!-- Start Tab-21  -->

         

      </div>

    </div>

  </div>

  </div>

  </div>

  </div>



    <footer id="footer-bar" class="row">

      <p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>

    </footer>

      </div>

  <div id="filePreviewModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-full-height modal-left modal-notify modal-info"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title heading lead"></h4>
        </div>
        <div class="modal-body filePreview">
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Fermer</button>
          <div class="spinner-border text-success" role="status"> <span class="sr-only">Loading...</span> </div>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ====================================================================================== -->

  <div id="filePreviewModalcollateral" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">

    <div class="modal-dialog modal-full-height modal-left modal-notify modal-info"> 

      <!-- Modal content-->

      <div class="modal-content showcollateralcontent">     

      </div>

    </div>

  </div>

  <div id="blankmodal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-full-height modal-left modal-notify modal-info"> 
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title heading lead">Empty Document</h4>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger">
            <i class="fa fa-times-circle fa-fw fa-lg"></i>
            <strong>Sorry! </strong>
              The account manager could not create any file!
          </div>'
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Fermer</button>        
        </div>      
      </div>
    </div>
  </div>

 <script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script> 
 
<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script> 
 
  <script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/demo.js"></script> 
  <script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>



  <script src="<?php echo  base_url(); ?>assets/js/jquery.scrollTo.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/jquery.slimscroll.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/jquery-jvectormap-1.2.2.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/jquery-jvectormap-world-merc-en.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/gdp-data.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.resize.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.time.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.threshold.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/flot/jquery.flot.axislabels.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/jquery.sparkline.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/skycons.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/raphael-min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/morris.js"></script>  



  <script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/bootstrap-wizard.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/select2.min.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
  <script src="<?php echo  base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
  <script src="<?php echo  base_url(); ?>assets/js/moment.min.js"></script>
  <script src="<?php echo  base_url(); ?>assets/js/daterangepicker.js"></script>
  <script src="<?php echo  base_url(); ?>assets/js/jquery-ui.min.js"></script>
  <script src="<?php echo  base_url(); ?>assets/js/jquery.timepicker.js"></script>


   
  <!-- <script src="<?php //echo  base_url(); ?>assets/js/upload.js"></script> --> 

  <script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
  <script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
  <script src="<?php echo  base_url(); ?>assets/js/classie.js"></script> 
  <!-- <script src="<?php echo  base_url(); ?>assets/js/collateral.custom.js"></script>  -->
  <script src="<?php echo  base_url(); ?>assets/js/timeline.js"></script>



  <script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/build/js/intlTelInput.js?1585994360633"></script> 
  <script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/examples/js/isValidNumber.js.ejs?1585994360633"></script>
  <script src="<?php echo  base_url(); ?>assets/intl-tel-input-master/examples/js/displayNumber.js.ejs?1585994360633"></script>
  <script type="text/javascript">
  var base_url = "<?php echo base_url();?>";
  var fee_url  =  "<?php echo base_url('Customer_Product/manage_loan_fees');?>";
  var document_status__url = "<?php echo base_url('Customer_Product/change_document_status/credit_confort/').$loan_details['loan_id']?>";
  var system_upload_url  =  "<?php echo base_url('Customer_Product/upload_systemfiles/credit_confort/').$loan_details['loan_id'];?>";
  var checklist_upload_url = "<?php echo base_url('Customer_Product/upload_checklistfiles/credit_confort/').$loan_details['loan_id'];?>";
  var risk_upload_url =  "<?php echo base_url('Customer_Product/uploadfile_risk_analysis/credit_confort/').$loan_details['loan_id'];?>";
  var preview_url ="<?php echo base_url('Customer_Product/view_uploaded_documents/credit_confort/').$loan_details['loan_id']?>";
  var decision_url = '<?php echo base_url("Customer_Product/comment_manager/credit_confort/").$loan_details['loan_id'];?>';


  $('button[data-toggle="tab"]').on('shown.bs.tab', function (e) {
 
  var target = $(e.target).attr("href");
    //alert(target);
   
  });

</script>
</script>


  <script src="<?php echo  base_url(); ?>assets/js/project_view_js/general_js.js"></script>
  <script src="<?php echo  base_url(); ?>assets/js/project_view_js/common_business_js.js"></script>
  <script>


  $(function($)
  {
    $("#make-small-nav").click();
    $("#tab-"+<?php echo $product_tabs[0]['tab_orginial_id']?>).addClass("fade in active");

    $("#employers option").each(function(index,options){

        $("#emp_name_datalist").val($('#employers [data-value="' + $("#emp_name").val() + '"]').val());
      });

    $("#nationality option").each(function(index,options){

        $("#nationality_datalist").val($('#nationality [data-value="' + $("#nationality_value").val() + '"]').val());
      });


   
  });


 


function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    return true;
}

  function istelNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    console.log(charCode);
    if(charCode == 40 || charCode == 41 || charCode == 43 || charCode == 45)
    {
      return true;
    }
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    }
    
    return true;
}


</script>

  <script src="<?php echo  base_url(); ?>assets/js/project_view_js/countrycodephoneno_js.js"></script>


  <script type="text/javascript">
  
    // $('input.fmt_number').on("blur keyup", function(event){
    
    //     //skip for arrow keys
    //     if(event.which >= 37 && event.which <= 40) return;

    //     // format number
    //     $(this).val(function(index, value) {
    //         return value
    //         .replace(/\D/g, "")
    //         .replace(/\B(?=(\d{3})+(?!\d))/g, " ")
    //         ;
    //     });
    // });
  
 	//this calculates values automatically 
			calculateSum();

			$(".amount_a1").on("keydown keyup", function() {
				calculateSum();
			});

			$(".amount_b1").on("keydown keyup", function() {
					calculateSum();
			});

			$(".amount_c1").on("keydown keyup", function() {
					calculateSum();
			});

			calculateSumS2();

			$(".amount_a2").on("keydown keyup", function() {
					calculateSumS2();
			});

			$(".amount_b2").on("keydown keyup", function() {
					calculateSumS2();
			});

			$(".amount_c2").on("keydown keyup", function() {
					calculateSumS2();
			});

			calculateSumT1();
			calculateSumT2();

			$(".ans_t1").on("keydown keyup", function() {
					calculateSumT1();
			});

			 $(".ans_t2").on("keydown keyup", function() {
					calculateSumT2();
			});
			
			 calculateEngg();
			 $(".analysis_cal2").on("keydown keyup", function() {
			 		calculateEngg();
			 });
			 
			
	// analyse risk form 1
	<?php if($a_s1){?>
	var rowcount_a  = <?php echo count($a_s1);?>;
	<?php } else {?>
	var rowcount_a  = 0;
	<?php } ?>

	$(".addrow_a").click(function(){
		//alert();
			rowcount_a++; 
			$('<tr class="tr_a'+rowcount_a+'"> <td> </td><td><input type="number" value="" name="amount_a1[]" class="form-control amount_a1" min="0" required onkeydown="calculateSum()" onkeyup="calculateSum()" onblur="save_average_salary_riskform()"/></td><td><input type="number" value="" name="amount_a2[]" class="form-control amount_a2" min="0" required onkeydown="calculateSumS2()" onkeyup="calculateSumS2()" onblur="save_average_salary_riskform()"/></td><td><button type="button" class="btn btn-primary" onclick="removerow_a('+rowcount_a+');">-</button></td></tr>').insertBefore('.analyserow_b');

	});

	<?php if($b_s1){?>
	var rowcount_b  = <?php echo count($b_s1);?>;
	<?php } else {?>
	var rowcount_b  = 0;
  <?php } ?>

	$(".addrow_b").click(function(){
		//alert();
			rowcount_b++; 
			$('<tr class="tr_b'+rowcount_b+'"> <td> </td><td><input type="number" value="" name="amount_b1[]" class="form-control amount_b1" min="0" required onkeydown="calculateSum()" onkeyup="calculateSum()" onblur="save_average_salary_riskform()" /></td><td><input type="number" value="" name="amount_b2[]" class="form-control amount_b2" min="0" required onkeydown="calculateSumS2()" onkeyup="calculateSumS2()" onblur="save_average_salary_riskform()" /></td><td><button type="button" class="btn btn-primary" onclick="removerow_b('+rowcount_b+');">-</button></td></tr>').insertBefore('.analyserow_c');

	});

	<?php if($c_s1){?>
	var rowcount_c  = <?php echo count($c_s1);?>;
	<?php } else {?>
	var rowcount_c  = 0;
	<?php } ?>

	$(".addrow_c").click(function(){
		//alert();
			rowcount_c++; 
			$('<tr class="tr_c'+rowcount_c+'"> <td> </td><td><input type="number" value="" name="amount_c1[]" class="form-control amount_c1" min="0" required onkeydown="calculateSum()" onkeyup="calculateSum()" onblur="save_average_salary_riskform()" /></td><td><input type="number" value="" name="amount_c2[]" class="form-control amount_c2" min="0" onkeydown="calculateSumS2()" onkeyup="calculateSumS2()" onblur="save_average_salary_riskform()" required /></td><td><button type="button" class="btn btn-primary" onclick="removerow_c('+rowcount_c+');">-</button></td></tr>').insertBefore('.total_analyse');

	});

	<?php if($coeff_record){?>
	var rowcount_d = <?php echo count($coeff_record);?>;
	<?php } else {?>
	var rowcount_d = 0; 
<?php }?>

	$(".addrow_coff1").click(function(){
		//alert(rowcount_d);
			rowcount_d++; 
			$('<tr class="tr_coff1'+rowcount_d+'"><td><input type="number" id="st1_1'+rowcount_d+'" class="form-control salary_t1" name="salary[]" min="0" onblur="calculateRow('+rowcount_d+');"></td><td><input type="number" id="mt1_1'+rowcount_d+'" class="form-control mois_t1" name="mois[]" min="0" onblur="calculateRow('+rowcount_d+');"></td><td><input type="number" id="at1_1'+rowcount_d+'" class="form-control ans_t1" name="ans[]" min="0" onkeyup="calculateSumT1();" onkeydown="calculateSumT1();" onblur="save_salary_data()" readonly ></td><td><button type="button" class="btn btn-primary" onclick="removerow_coff1('+rowcount_d+');">-</button></td></tr>').insertBefore('.coff1');

	});

	<?php if($coeff_record1){?>
		var rowcount_e = <?php echo count($coeff_record1);?>;
	<?php } else { ?>
		var rowcount_e = 0;
	<?php } ?>

	$(".addrow_coff2").click(function(){
		 rowcount_e++; 
			$('<tr class="tr_coff2'+rowcount_e+'"><td><input type="number" id="rt2_2'+rowcount_e+'" class="form-control remboursement_t2" name="remboursement[]" min="0" onblur="calculateRemRow('+rowcount_e+');"></td><td><input type="number" id="mt2_2'+rowcount_e+'" class="form-control mois_t2" name="mois1[]" min="0" onblur="calculateRemRow('+rowcount_e+');"></td><td><input type="number" id="at2_2'+rowcount_e+'" class="form-control ans_t2" name="ans1[]" min="0" onkeyup="calculateSumT2();" onkeydown="calculateSumT2();" onblur="save_rembursement_data();" readonly ></td><td><button type="button" class="btn btn-primary" onclick="removerow_coff2('+rowcount_e+');">-</button></td></tr>').insertBefore('.coff2');
	});


    <?php if($risk_data){?>
	var rowcount_cav = <?php echo count($risk_data);?>;
	<?php } else {?>
	var rowcount_cav = 0;
	<?php }?>
	
	$(".addrow_cav").click(function(){
		 rowcount_cav++; 
			$('<tr class="tr_cav'+rowcount_cav+'"><td></td><td><input type="number" id="cav'+rowcount_cav+'" value="" name="solde_du_cav" class="form-control analysis_cal2 solde_du_cav_c" min="0" onkeydown="calculateEngg()" onkeyup="calculateEngg()"/></td><td><button type="button" class="btn btn-primary" onclick="removerow_cav('+rowcount_cav+');">-</button></td></tr>').insertBefore('.analysenew2');
	});

	<?php if($risk_data1){?>
	var rowcount_encour = <?php echo count($risk_data1);?>;
	<?php } else {?>
	var rowcount_encour = 0;
	<?php }?>

	$(".addrow_encour").click(function(){
		rowcount_encour++;
		$('<tr class="tr_en'+rowcount_encour+'"><td></td><td><input type="number" id="" value="" name="solde_encours" class="form-control analysis_cal2 solde_encours_c" min="0"  onkeydown="calculateEngg()" onkeyup="calculateEngg()" /></td><td><button type="button" class="btn btn-primary" onclick="removerow_encour('+rowcount_encour+');">-</button></td></tr>').insertBefore('.total_analyse_new');

	});

  // Remove a,b,c section in analyse risk form

  function removerow_a(element_row){
	 $(".tr_a"+element_row).remove();

		calculateSum();
		calculateSumS2();
	}

	function removerow_b(element_row){
	 $(".tr_b"+element_row).remove();

		calculateSum();
		calculateSumS2();
	}

	function removerow_c(element_row){
	 $(".tr_c"+element_row).remove();

		calculateSum();
		calculateSumS2();
	}

	function removerow_coff1(element_row){
	 $(".tr_coff1"+element_row).remove();
	 calculateSumT1();
	 save_salary_data();
	}

	function removerow_coff2(element_row){
	 $(".tr_coff2"+element_row).remove();
	 calculateSumT2();
	 save_rembursement_data();
	}
	
	
	function removerow_cav(element_row){
		$(".tr_cav"+element_row).remove();
	 	calculateEngg();
	}

	function removerow_encour(element_row){
		$(".tr_en"+element_row).remove();
	 	calculateEngg();
	}


    // Multiply salary montant and mois

	function calculateRow(row){
		var salary =  $("#st1_1"+row).val();
		var mois =  $("#mt1_1"+row).val();

		if(salary != "" && mois != "")
	  $("#at1_1"+row).val(salary*mois);

	  calculateSumT1();
	  save_salary_data();
	}

	// Multiply remboursement montant and mois

	function calculateRemRow(row){
		var rem =  $("#rt2_2"+row).val();
		var mois =  $("#mt2_2"+row).val();

		if(rem != "" && mois != "")
	  $("#at2_2"+row).val(rem*mois);

	  calculateSumT2();
	  save_rembursement_data();
	}
	
   // Analyse Form - s1 calculation Form 1
   function calculateSum(){

			var sum1 = 0,sum2 = 0,sum3 = 0;
			//iterate through each textboxes and add the values
			$(".amount_a1").each(function() {
					//add only if the value is number
					if (!isNaN(this.value) && this.value.length != 0) {
							sum1 += parseFloat(this.value);
					}
					else if (this.value.length != 0){
							$(this).css("background-color", "red");
					}
			});

			$(".amount_b1").each(function() {
					//add only if the value is number
					if (!isNaN(this.value) && this.value.length != 0) {
							sum2 += parseFloat(this.value);
					}
					else if (this.value.length != 0){
							$(this).css("background-color", "red");
					}
			});

			$(".amount_c1").each(function() {
					//add only if the value is number
					if (!isNaN(this.value) && this.value.length != 0) {
							sum3 += parseFloat(this.value);
					}
					else if (this.value.length != 0){
							$(this).css("background-color", "red");
					}
			});

			var total_sums1 = sum1 - (sum2 + sum3);
			$("#total_form1").val(total_sums1);

			var t1 = $("#total_form1").val();
			var t2 = $("#total_forms2").val();

			//console.log((+t1 + +t2)/2);
			$("#sal_moyen").val((+t1 + +t2)/2);

      var sal_moyen = $("#sal_moyen").val();

      if(sal_moyen < 150000)
      {
        $(".salary_condition").html("No Eligible");
      }
      else if(sal_moyen >= 150001 && sal_moyen <= 449999)
      {
           $(".salary_condition").html("Droit de credit maximun XAF 300 000");
      }
      else if(sal_moyen >= 450000 && sal_moyen <= 749999)
      {
           $(".salary_condition").html("Droit de credit maximum XAF 750 000");
      }
       else if(sal_moyen >= 750000)
      {
           $(".salary_condition").html("Droit de credit maximum XAF 1 500 000");
      }
     
      
			//console.log("sum1="+sum1+"sum2="+sum2+"sum3="+sum3);
	 }
	 
	 
	 // Analyse Form - s2 calculation Form 1
		function calculateSumS2(){

			var sum1 = 0,sum2 = 0,sum3 = 0;
			//iterate through each textboxes and add the values
			$(".amount_a2").each(function() {
					//add only if the value is number
					if (!isNaN(this.value) && this.value.length != 0) {
							sum1 += parseFloat(this.value);
					}
					else if (this.value.length != 0){
							$(this).css("background-color", "red");
					}
			});

			$(".amount_b2").each(function() {
					//add only if the value is number
					if (!isNaN(this.value) && this.value.length != 0) {
							sum2 += parseFloat(this.value);
					}
					else if (this.value.length != 0){
							$(this).css("background-color", "red");
					}
			});

			$(".amount_c2").each(function() {
					//add only if the value is number
					if (!isNaN(this.value) && this.value.length != 0) {
							sum3 += parseFloat(this.value);
					}
					else if (this.value.length != 0){
							$(this).css("background-color", "red");
					}
			});

			var total_sums2 = sum1 - (sum2 + sum3);
			$("#total_forms2").val(total_sums2);

			var t1 = $("#total_form1").val();
			var t2 = $("#total_forms2").val();

			//console.log((+t1 + +t2)/2);
			$("#sal_moyen").val((+t1 + +t2)/2);
       var sal_moyen = $("#sal_moyen").val();

      if(sal_moyen < 150000)
      {
        $(".salary_condition").html("No Eligible");
      }
      else if(sal_moyen >= 150001 && sal_moyen <= 449999)
      {
           $(".salary_condition").html("Droit de credit maximun XAF 300 000");
      }
      else if(sal_moyen >= 450000 && sal_moyen <= 749999)
      {
           $(".salary_condition").html("Droit de credit maximum XAF 750 000");
      }
       else if(sal_moyen >= 750000)
      {
           $(".salary_condition").html("Droit de credit maximum XAF 1 500 000");
      }
      
		 
	 }

    function calculateSumT1(){
		var sum =0;

		$(".ans_t1").each(function() {
					//add only if the value is number
					if (!isNaN(this.value) && this.value.length != 0) {
							sum += parseFloat(this.value);
					}
					else if (this.value.length != 0){
							$(this).css("background-color", "red");
					}
		});

		$("#total_t1").val(sum);

        if($("#total_t2").val() != "0" && $("#total_t1").val() != "0")
        {
		var c = ($("#total_t2").val() / $("#total_t1").val()) * 100;
		$("#coeff").val(c.toFixed(2));
        }
	 }
	 
	 function calculateSumT2(){
		var sum =0;

		$(".ans_t2").each(function() {
					//add only if the value is number
					if (!isNaN(this.value) && this.value.length != 0) {
							sum += parseFloat(this.value);
					}
					else if (this.value.length != 0){
							$(this).css("background-color", "red");
					}
		});

		$("#total_t2").val(sum);

		if($("#total_t2").val() != "0" && $("#total_t1").val() != "0")
        {
		var c = ($("#total_t2").val() / $("#total_t1").val()) * 100;
		$("#coeff").val(c.toFixed(2));
        }
	 }
	 
	 function calculateEngg(){
	 	var sum =0;

		$(".analysis_cal2").each(function() {
					//add only if the value is number
					if (!isNaN(this.value) && this.value.length != 0) {

							if($(this).hasClass("solde_du_cav_c"))
							{
								if(this.value < 0)
								{
									sum += parseFloat(this.value);
								}
							}
							else
							{
								sum += parseFloat(this.value);
							}
							
					}
					else if (this.value.length != 0){
							
					}
		});

		$("#total_analyse_cal").val(sum);

     var total_ana = $("#total_analyse_cal").val();
         
           
	 }
	 
	 
	 function save_average_salary_riskform(){
		var form = $("#FormAnalyse1");

	 // var serializedFormR =form.serializeArray();
	 // var amount_a1 = $('form.amount_a1').serialize();
		var amount_a1 = $('input.amount_a1').serializeArray();
		var amount_a2 = $('input.amount_a2').serializeArray();
		var amount_b1 = $('input.amount_b1').serializeArray();
		var amount_b2 = $('input.amount_b2').serializeArray();
		var amount_c1 = $('input.amount_c1').serializeArray();
		var amount_c2 = $('input.amount_c2').serializeArray();
		var total_form1 =  $("#total_form1").val();
		var total_forms2 = $("#total_forms2").val();
		var loan_id =  $("#Rcl_aid").val();


	$(".riskavgloder1").css("display","inline");
	$(".riskavgloder2").css("display","inline");
	$(".riskavgloder3").css("display","inline");
	
	setTimeout(function(){
		
			$.ajax({
			type: "POST", 
				url:'<?php echo base_url("PP_FETES_A_LA_CARTE/riskAnalysis_average_salary");?>',
				data:{'amount_a1' : amount_a1,'amount_a2' : amount_a2,'amount_b1':amount_b1,'amount_b2':amount_b2,'amount_c1' : amount_c1,'amount_c2':amount_c2,'total_form1':total_form1,'total_forms2':total_forms2,'loan_id':loan_id },
				//contentType: false,
				cache: false,
				//processData: false,
				beforeSend: function(){
					$(".showajaxrequest2").html('');
				},
				success: function(resp){
				    $(".riskavgloder1").css("display","none");
                	$(".riskavgloder2").css("display","none");
                	$(".riskavgloder3").css("display","none");
					console.log(resp);
				}
			});
			
	},500);

	}
	
		 function save_cumul_engagment(){
		var form = $("#FormAnalyse1");

	 // var serializedFormR =form.serializeArray();
	 // var amount_a1 = $('form.amount_a1').serialize();
		var solde_du_cav = $('input.solde_du_cav').serializeArray();
		var amount_a2 = $('input.amount_a2').serializeArray();
		var amount_b1 = $('input.amount_b1').serializeArray();
		var amount_b2 = $('input.amount_b2').serializeArray();
		var amount_c1 = $('input.amount_c1').serializeArray();
		var amount_c2 = $('input.amount_c2').serializeArray();
		var total_form1 =  $("#total_form1").val();
		var total_forms2 = $("#total_forms2").val();
		var loan_id =  $("#Rcl_aid").val();


	$(".riskavgloder1").css("display","inline");
	$(".riskavgloder2").css("display","inline");
	$(".riskavgloder3").css("display","inline");
	
	setTimeout(function(){
		
			$.ajax({
			type: "POST", 
				url:'<?php echo base_url("PP_FETES_A_LA_CARTE/riskAnalysis_average_salary");?>',
				data:{'amount_a1' : amount_a1,'amount_a2' : amount_a2,'amount_b1':amount_b1,'amount_b2':amount_b2,'amount_c1' : amount_c1,'amount_c2':amount_c2,'total_form1':total_form1,'total_forms2':total_forms2,'loan_id':loan_id },
				//contentType: false,
				cache: false,
				//processData: false,
				beforeSend: function(){
					$(".showajaxrequest2").html('');
				},
				success: function(resp){
				    $(".riskavgloder1").css("display","none");
                	$(".riskavgloder2").css("display","none");
                	$(".riskavgloder3").css("display","none");
					console.log(resp);
				}
			});
			
	},500);

	}
	
	function save_salary_data(){
		var salary = $('input.salary_t1').serializeArray();
		var mois = $('input.mois_t1').serializeArray();
		var ans = $('input.ans_t1').serializeArray();
		var total_t1 = $("#total_t1").val();
		var loan_id =  $("#Rcl_aid").val();
		var coeff_score =  $("#coeff").val();
		
        $(".risktotalt1loder2").css("display","inline");
		setTimeout(function(){

		$.ajax({
			  type: "POST", 
				url:'<?php echo base_url("PP_CREDIT_CONFORT/riskAnalysis_coefficient_salary");?>',
				data:{'salary' : salary,'mois' : mois,'ans':ans,'total_t1':total_t1,'loan_id' : loan_id,'coeff_score':coeff_score},
				cache: false,
				beforeSend: function(){
					$(".showajaxrequest2").html('');
				},
				success: function(resp){
				    $(".risktotalt1loder2").css("display","none");
					console.log(resp);
				}
		});
		
		},500);
	}

	function save_rembursement_data(){
    var remboursement = $('input.remboursement_t2').serializeArray();
    var mois = $('input.mois_t2').serializeArray();
    var ans = $('input.ans_t2').serializeArray();
    var total_t2 = $("#total_t2").val();
    var loan_id =  $("#Rcl_aid").val();
    var coeff_score =  $("#coeff").val();
    
    $(".risktotalt2loder2").css("display","inline");
	setTimeout(function(){

        $.ajax({
			  type: "POST", 
				url:'<?php echo base_url("PP_CREDIT_CONFORT/riskAnalysis_coefficient_remboursement");?>',
				data:{'remboursement' : remboursement,'mois' : mois,'ans':ans,'total_t2':total_t2,'loan_id' : loan_id,'coeff_score':coeff_score},
				cache: false,
				beforeSend: function(){
					$(".showajaxrequest2").html('');
				},
				success: function(resp){
				    $(".risktotalt2loder2").css("display","none");
					console.log(resp);
				}
		});
		
		},500);
	}
	
	function save_total_engagement_riskform(){
	    
	    if(confirm("Voulez-Vous Poursuivre ?")){
	        var solde_du_cav = $("input.solde_du_cav_c").serializeArray();
    		var solde_du_csfbm = $(".solde_du_csfbm_c").val();
    		var solde_encours =  $("input.solde_encours_c").serializeArray();
    		var loan_id = $(".rcapid").val();
    		var total_analyse_cal= $("#total_analyse_cal").val();
            var solde_encour_credit_bail = $("#solde_encour_credit_bail").val();
    
    		$(".risknewmonthloder2").css("display","inline");
    		setTimeout(function(){
    			$.ajax({
    			  type: "POST", 
    				url:'<?php echo base_url("PP_CREDIT_CONFORT/riskanalysis_total_engagements");?>',
    				data:{'solde_du_cav':solde_du_cav,'solde_du_csfbm':solde_du_csfbm,'solde_encours':solde_encours,'loan_id':loan_id,'total_analyse_cal' : total_analyse_cal,'solde_encour_credit_bail':solde_encour_credit_bail},
    				cache: false,
    				beforeSend: function(){
    					$(".showajaxrequest2").html('');
    				},
    				success: function(response){
    					$(".risknewmonthloder2").css("display","none");
    					console.log(response);
    					$('.analysecumul-msg').html('').removeClass('alert alert-success fade in');
    		            if(response=="success"){                                    
    		              $('.analysecumul-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Enregistré avec succès et Circuit de Validation Initié').addClass('alert alert-success fade in').fadeOut(5000);  
    
    		               
    		           }
    		            else if(response == "no_workflow_matched"){
    		              $('.analysecumul-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Record Saved Successfully But No Workflow Matched ').addClass('alert alert-warning fade in').fadeOut(5000);  
    		               }
    		            else if(response == "success_new"){
    		              $('.analysecumul-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Enregistré avec succès et Circuit de Validation Réinitié ').addClass('alert alert-success fade in').fadeOut(5000);  
    		                }
    		            else if(response == "no_workflow_change"){
    		              $('.analysecumul-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Mise à jour avec succès').addClass('alert alert-success fade in').fadeOut(5000);  
    		                }
    		            else{
    		            $('.analysecumul-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error in saving record').addClass('alert alert-danger fade in');
    		            }
    
    		             setTimeout(function(){                      
    		                  location.reload();
    		                 }, 1500); 
    		            $('.submitAnalyseBtn').attr("disabled","");
    					//$(".showajaxrequest2").html($.trim(resp));
    				}
    		});
    
    		},500);
	    }
	    else{
	        alert("Annulé");
	    }
		
		
	}

   function set_date_end_for_CDD(){
 
     var type_de_cont =  $(".typeofcontract_c").val();

     if(type_de_cont == "2" || type_de_cont == "")
     {
       $(".edn_date_contract_cdd").val("");
       $(".edn_date_contract_cdd").attr("disabled","disabled");
      
     }
     else
     {
       $(".edn_date_contract_cdd").removeAttr("disabled");
     }
     
   }
   
   

  // Show Employer List and data

 function show_emplist(element)
    {
      
      var emp_data =  $("#"+element.id).val();

     var data_val = $('#employers [value="' + emp_data + '"]').data('value');
        $('#emp_name').val(data_val) ;

      if($("#emp_name").val())
      {
        $.ajax({
           type:"POST",
           url: "<?php echo base_url('Employeurs/edit_employer')?>",
           data : {emp_id : $("#emp_name").val() },
           success:function(resp){

            if(resp)
            {
              var result = JSON.parse(resp);
              //console.log(result);
              $("#secteurs").val(result['secteur_id']);
              $("#secteurs").attr("disabled","disabled");

              $("#secteurs_value").val(result['secteur_id']);

              $("#cat_employeurs").val(result['category_id']);
              $("#cat_employeurs").attr("disabled","disabled");

              $("#cat_emp_value").val(result['category_id']);
            }
            else{
              $("#"+element.id).val('');
              $("#cat_employeurs").removeAttr("disabled");
              $("#secteurs").removeAttr("disabled");
            }
           }
        });
      }
      else
      {
        alert("Please select employers");
        $("#"+element.id).val('');
        $("#cat_employeurs").removeAttr("disabled");
        $("#secteurs").removeAttr("disabled");
      }
    }
     
// show popup notification 

   function notificationcall(data, status)
  {
      var notification = new NotificationFx({
          message : data,
          layout : 'bar',
          effect : 'slidetop',
          type : status          
        });
          notification.show();
          this.disabled = true;
  }



   // CAD Memo Form

   $("#cadMemoForm").validate({
      errorClass: 'has-error',
      rules: {
       

      },
      messages: {
        
              
      },
      highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element) {

        $(element).closest('.form-group').removeClass('has-error');

      },
      errorElement: 'span',
      errorClass: 'help-block',
      errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) { 

        
        $.ajax({
          url: '<?php echo base_url("Customer_Product/manage_cad_memorandum/credit_conso/").$loan_details['loan_id'];?>',
          type: 'POST',
          data: $(form).serialize(),
          beforeSend: function(){
            $('.cadsubmit_btn').attr("disabled","disabled");
            $('#cadMemoForm').css("opacity","0.5");
            $(".sr-only").show();
          },
          success: function(response) {
          
            // console.log(response);
            //  return false;
            
            $('.memo_message').html('').removeClass('alert alert-success fade in');
            $('#cadMemoForm').css("opacity","1");  
            if(response=="success"){                                    
              $('.memo_message').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Mise à jour avec succès').addClass('alert alert-success fade in').fadeOut(5000);  
                setTimeout(function(){                      
                  location.reload();
                 }, 1500); 
            $('.cadsubmit_btn').attr("disabled","");

            }else{
            $('.memo_message').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error in saving record').addClass('alert alert-danger fade in');
            }
          }            
        });

        }
    });

function select_interaction_details()
  {   
    var i = $('#interaction_details').val();  
    if(i=='Email')
    {
      $('.Email').show();
      $('.SMS').hide();
      $('.EntretienTéléphonique').hide(); 
    } 
    if(i=='SMS')
    {
      $('.Email').hide();
      $('.SMS').show();
      $('.EntretienTéléphonique').hide(); 
    } 
    if(i=='EntretienTéléphonique')
    {
      $('.Email').hide();
      $('.SMS').hide();
      $('.EntretienTéléphonique').show();
    }
  
  }

   // Email History Form
   
   $("#emailHistoryForm").validate({
      errorClass: 'has-error',
      rules: {        
         field_name: {
          required: true,
          rangelength:[4,20]
         }, 
          fieldemail: {
          required: true,
          email:true
         },
         fieldsubject:"required",
         fieldmsg:"required"    
          
      },      
      messages: {
         field_name: {
          required: "Please enter name"
         }, 
          fieldemail: {
          required: "Please enter email",
          email:"Please enter valid email"
         },
         fieldsubject:"Please enter subject",
         fieldmsg:"Please enter message"        
      },
      highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element) {

        $(element).closest('.form-group').removeClass('has-error');

      },
      errorElement: 'span',
      errorClass: 'help-block',
      errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {     
        // alert();
        // return false;
        
        var formdata = $("#emailHistoryForm");
        $.ajax({
          type:'POST',
          url:'<?php echo base_url("Customer_Product/manage_history_interaction_customer/credit_confort/email/").$loan_details['loan_id'];?>',
          data:$(formdata).serialize(),
          beforeSend: function(){
            $('.button_3_2').attr("disabled","disabled");
            $('#emailHistoryForm').css("opacity","0.5");
            $('.history_msg').val("");
            $('.callloder_details').css("display","inline");         
          },
          success: function(response) {
            
            $('#emailHistoryForm').css("opacity","");
            $('.button_3_2').attr("disabled",false);
            $('.callloder_details').css("display","none");         
            if($.trim(response)=="success"){
              $("#emailHistoryForm")[0].reset();
              $('.history_msg').html('<div class="alert alert-success">Mail Sent Successfully.</div>'); 
              setTimeout(function() {                
                        location.reload();
                      }, 2000);                               
            }
            else{                                             
                $('.history_msg').html('<div class="alert alert-danger">Error in Sending Mail</div>');
            } 
          },
          error: function(XMLHttpRequest, textStatus, response) { 
            $('#emailHistoryForm').css("opacity","");
            $('.button_3_2').attr("disabled",false);
            $('.callloder_details').css("display","none"); 
            $('.history_msg').html('<div class="alert alert-danger">Error in Sending Mail</div>').show();                
            } 
        });
        }
    });


   // Sms History Form
   $("#smsHistoryForm").validate({
      errorClass: 'has-error',
      rules: {        
         sms_phone_no: {
          required: true
          }, 
          sms_content: "required"
          
      },      
      messages: {
         sms_phone_no: {
          required: "Please enter phone no."

         }, 
          sms_content: "Please enter comment/message"   
      },
      highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element) {

        $(element).closest('.form-group').removeClass('has-error');

      },
      errorElement: 'span',
      errorClass: 'help-block',
      errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {     
        // alert();
        // return false;
        
        var formdata = $("#smsHistoryForm");
        $.ajax({
          type:'POST',
          url:'<?php echo base_url("Customer_Product/manage_history_interaction_customer/credit_confort/sms/").$loan_details['loan_id'];?>',
          data:$(formdata).serialize(),
          beforeSend: function(){
            $('.sms_btn').attr("disabled","disabled");
            $('#smsHistoryForm').css("opacity","0.5");
            $('.history_msg').val("");
            $('.smsloader').css("display","inline");         
          },
          success: function(response) {
            // console.log(response);
            // return false;
            
            $('#smsHistoryForm').css("opacity","");
            $('.sms_btn').attr("disabled",false);
            $('.smsloader').css("display","none");         
            if($.trim(response)=="success"){
              $("#smsHistoryForm")[0].reset();
              $('.history_msg').html('<div class="alert alert-success">SMS Sent Successfully.</div>'); 
              setTimeout(function() {                
                        location.reload();
              }, 2000);                               
            }
            else{                                             
                $('.history_msg').html('<div class="alert alert-danger">Error in Sending SMS</div>');
            } 
          },
          error: function(XMLHttpRequest, textStatus, response) { 
            $('#smsHistoryForm').css("opacity","");
            $('.sms_btn').attr("disabled",false);
            $('.smsloader').css("display","none"); 
            $('.history_msg').html('<div class="alert alert-danger">Error in Sending SMS</div>').show();                
            } 
        });
        }
    });


   //Interview History Form
   $("#interviewHistoryForm").validate({
      errorClass: 'has-error',
      rules: {        
         
          interview_comment: "required"
          
      },      
      messages: {
          
          interview_comment: "Please enter comment/message"   
      },
      highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element) {

        $(element).closest('.form-group').removeClass('has-error');

      },
      errorElement: 'span',
      errorClass: 'help-block',
      errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {     
        // alert();
        // return false;
        
        var formdata = $("#interviewHistoryForm");

        $.ajax({
          type:'POST',
          url:'<?php echo base_url("Customer_Product/manage_history_interaction_customer/credit_confort/interview_telephone/").$loan_details['loan_id'];?>',
          data:$(formdata).serialize(),
          beforeSend: function(){
            $('.int_btn').attr("disabled","disabled");
            $('#interviewHistoryForm').css("opacity","0.5");
            $('.history_msg').val("");
            $('.interviewloader').css("display","inline");         
          },
          success: function(response) {
            
            $('#interviewHistoryForm').css("opacity","");
            $('.int_btn').attr("disabled",false);
            $('.interviewloader').css("display","none");         
            if($.trim(response)=="success"){
              $("#interviewHistoryForm")[0].reset();
              $('.history_msg').html('<div class="alert alert-success">Mise à jour avec succès.</div>'); 
              setTimeout(function() {                
                        location.reload();
              }, 2000);                               
            }
            else{                                             
                $('.history_msg').html('<div class="alert alert-danger">Error in Saving Record</div>');
            } 
          },
          error: function(XMLHttpRequest, textStatus, response) { 
            $('#interviewHistoryForm').css("opacity","");
            $('.int_btn').attr("disabled",false);
            $('.interviewloader').css("display","none"); 
            $('.history_msg').html('<div class="alert alert-danger">Error in Sending SMS</div>').show();                
            } 
        });
        }
    });


    $.validator.addMethod(
        "nameregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid name containing alphabets only"
);

  $.validator.addMethod(
        "digitregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid number containing digits only"
  );

  $.validator.addMethod(
        "mobileregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter phone number with proper format"
  );

  $.validator.addMethod(
        "dateregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid date with format dd-mm-yyyy"
  );

   $("#addnewcustomer").validate({
     errorClass: 'has-error',
    rules: {        
      //  first_name: {
      //   required: true,
      //   rangelength:[1,20],
      //   // nameregex:/^[a-zA-Z]*$/
      //  }, 
      //  middle_name:{
      //   rangelength:[1,20],
      //   nameregex:/^[a-zA-Z]*$/
      // },
      // last_name:{
      //   rangelength:[1,20],
      //   // nameregex:/^[a-zA-Z]*$/
      //  },
      //   loan_interest: {
      //   required: true,
      //  },
      //  id_number2:{
      //   digitregex:/^[0-9]*$/
      //  },
      //  main_phone:{
      //   // mobileregex : /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/

      //  },
      //  alter_phone:{
      //   // mobileregex : /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/
      //  },
      //  father_fullname:{
      //   required: true,
      //   rangelength:[4,20],
      //   // nameregex:/^([a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]{1,}|[a-zA-Z]+\s{1}[a-zA-Z]{3,}\s{1}[a-zA-Z]{1,})$/
      // },
      // mother_fullname:{
      //   required: true,
      //   rangelength:[4,20],
      //   // nameregex:/^([a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]{1,}|[a-zA-Z]+\s{1}[a-zA-Z]{3,}\s{1}[a-zA-Z]{1,})$/
      // },
      // dob:{
      //   dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
      // },
      // expiration_date :{
      //   dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
      // },
      // employment_date :{
      //   dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
      // },
      // edn_date_contract_cdd :{
      //   dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
      // },
      // current_emp :{
      //   dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
      // },
      // opening_date :{
      //   dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
      // },
      // insurance_place_id : {
      //   required : true,
      //   nameregex : /^[a-zA-Z]*$/
      // },
      // nationality_datalist : "required",
      // accoumt_number:{
      //   number:true
      //  }    
        
      },      
      messages: {
        // first_name: {
        //   required: "Name field is required.",
        // },      
      },
      highlight: function(element) {
        $(element).closest('.form-group').addClass('has-error');
      },
      unhighlight: function(element) {

        $(element).closest('.form-group').removeClass('has-error');

      },
      errorElement: 'span',
      errorClass: 'help-block',
      errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      },
      submitHandler: function(form) {     
        //alert("chekfe india");
        //$(".sr-only").show();
        
        var formdata = $("#addnewcustomer");
        setTimeout(function() {  
        $.ajax({
          type:'POST',
          url:'<?php echo base_url("Customer_Product/manage_business_loan_data/credit_confort/").$loan_details['loan_id'];?>',
          data:$(formdata).serialize(),
          beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#addnewcustomer').css("opacity","0.5");
            $('.outputdata').val("");
            $('.lodergif').css("display","inline");         
          },
          success: function(response) {
            // console.log(response);
            // return false;

            
            $('.outputdata').val($.trim(response));         
            $('#addnewcustomer').css("opacity","");
            $('.submitBtn').attr("disabled",false);
            $('.lodergif').css("display","none");         
            if($.trim(response)=="success"){
              $("#addnewcustomer")[0].reset();
              $('.response-msg').html('<div class="alert alert-success"><strong>Succès!</strong> Enregistrés avec succès.</div>'); 
              setTimeout(function() {                
                        location.reload();
                      }, 2000);                               
                       }else{                                             
                        $('.response-msg').html('<div class="alert alert-danger"><strong>Erreurs!</strong> Unable to save record.</div>');
                       } 
          },
          error: function(XMLHttpRequest, textStatus, response) { 
            $('#addnewcustomer').css("opacity","");
            $('.submitBtn').attr("disabled",false);
            $('.lodergif').css("display","none");
            $('.response-msg').html('<div class="alert alert-danger"><strong>'+textStatus+'! </strong>'+response+'</div>').show();                
            } 
        });
      },2000);
        }
    });
  </script>

  <script type="text/javascript">

  	var number = document.querySelectorAll('input[type=number]')

      number.onkeydown = function(e) { 

      alert(e);       

          if(!((e.keyCode > 95 && e.keyCode < 106)

            || (e.keyCode > 47 && e.keyCode < 58) 

            || e.keyCode == 8)) { 

              return false;

          }

      }

    function active_tab(tabname)

    {

      $('.nav-tabs li').removeClass('active');

      $('.nav-tabs a[href="#'+tabname+'"]').tab('show');

    }
    

    $(document).ready(function() {    

    

      $(".btn-pref .btn").click(function () {

        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");

      $(this).removeClass("btn-default").addClass("btn-primary");

    });

    var bJUI='';

      var table = $('#table-example').dataTable({
        'info': false,
        'sDom': 'lTfr<"clearfix">tip',
        'oTableTools': {
                'aButtons': [
                    {
                        'sExtends':    'collection',
                        'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
                        'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
                    }
                ]
              }
            });
      var table = $('#table-decision').dataTable({
        'info': false,
        'sDom': 'lTfr<"clearfix">tip',
        'oTableTools': {
                'aButtons': [
                    {
                        'sExtends':    'collection',
                        'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
                        'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
                    }
                ]
              }
            });
      var table = $('#table-decision-details').dataTable({
        'info': false,
        'sDom': 'lTfr<"clearfix">tip',
        'oTableTools': {
                'aButtons': [
                    {
                        'sExtends':    'collection',
                        'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
                        'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
                    }
                ]
              }
            });
      

      var table = $('#customerlist').dataTable({
        'info': false,
        'sDom': 'lTfr<"clearfix">tip',
        'oTableTools': {
                'aButtons': [
                    {
                        'sExtends':    'collection',
                        'sButtonText': '<i class="fa fa-cloud-download"></i>&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>',
                        'aButtons':    [ 'csv', 'xls', 'pdf', 'copy', 'print' ]
                    }
                ]
            }
      });


    });

    

    

  

    

    // function select_collateral()

    // {   

    //   var c = $('#collateral_split').val(); 

    //   if(c=='Véhicule')

    //   {

    //     $('.Véhicule').show();

    //     $('.Déposit').hide();

    //     $('.Maison').hide();

    //     $('.Excemption').hide();  

    //   } 

    //   if(c=='Déposit')

    //   {

    //     $('.Véhicule').hide();

    //     $('.Déposit').show();

    //     $('.Maison').hide();

    //     $('.Excemption').hide();  

    //   } 

    //   if(c=='Maison')

    //   {

    //     $('.Véhicule').hide();

    //     $('.Déposit').hide();

    //     $('.Maison').show();

    //     $('.Excemption').hide();  

    //   } 

    //   if(c=='Excemption')

    //   {

    //     $('.Véhicule').hide();

    //     $('.Déposit').hide();

    //     $('.Maison').hide();

    //     $('.Excemption').show();  

    //   }

    

    // }

    

    function select_cad_decision()

    {   

      var c = $('#cad_decision_split').val(); 

      if(c=='avis_favorable')

      {

        $('.avis_favorable_content').show();

          

      } 

      if(c=='demande_de_retraitement')

      {

        $('.avis_favorable_content').hide();

        

      } 

      

    }

   


    </script> 

  <script>

    var hidWidth;

  var scrollBarWidths = 40;



  var widthOfList = function(){

    var itemsWidth = 0;

    $('.list li').each(function(){

      var itemWidth = $(this).outerWidth();

      itemsWidth+=itemWidth;

    });

    return itemsWidth;

  };



  var widthOfHidden = function(){

    return (($('.wrapper').outerWidth())-widthOfList()-getLeftPosi())-scrollBarWidths;

  };



  var getLeftPosi = function(){

    //return $('.list').position().left;

  };



  var reAdjust = function(){

    if (($('.wrapper').outerWidth()) < widthOfList()) {

      $('.scroller-right').show();

    }

    else {

      $('.scroller-right').hide();

    }

    

    if (getLeftPosi()<0) {

      $('.scroller-left').show();

    }

    else {

      $('.item').animate({left:"-="+getLeftPosi()+"px"},'slow');

      $('.scroller-left').hide();

    }

  }



  reAdjust();



  $(window).on('resize',function(e){  

      reAdjust();

  });



  $('.scroller-right').click(function() {

    

    $('.scroller-left').fadeIn('slow');

    $('.scroller-right').fadeOut('slow');

    

    $('.list').animate({left:"+="+widthOfHidden()+"px"},'slow',function(){



    });

  });



  $('.scroller-left').click(function() {

    

    $('.scroller-right').fadeIn('slow');

    $('.scroller-left').fadeOut('slow');

    

      $('.list').animate({left:"-="+getLeftPosi()+"px"},'slow',function(){

      

      });

  });    


  //calcul amortization

  $("#button_2").on("click", function(e) {
//$('#loanEditFormdetais').submit(function(){
    var form = $("#loanEditForm");

     var serializedFormStr =form.serialize();
    $.ajax({
        type:'POST',
        url:'<?php echo base_url("PP_CREDIT_CONFORT/edit_loan");?>',
        data: $.trim(serializedFormStr),
        beforeSend: function(){
            $('#loanEditForm').css("opacity","0.5");
            $('.calculatorloder').css("display","block");
        },
        success:function(resp){
           console.log(resp);
           $(".editjson").val($.trim(resp));
           $('.calculatorloder').css("display","none");
           $('#loanEditForm').css("opacity","1");
           if($.trim(resp)=='1'){
                $('.editloanmsgdetails').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Succès!</strong> Mise à jour avec succès!</div>');
              setTimeout(function() {
                location.reload();
              }, 1500);
            }
            else if($.trim(resp)=='0'){
                $('.editloanmsgdetails').html('<div class="alert alert-info"><i class="fa fa-check-circle fa-fw fa-lg"></i>No Amortissement Updated </div>').fadeOut(3000);
              
            }else{
                $('.editloanmsgdetails').html('<div class="alert alert-danger fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Error!</strong> '+resp+'</div>');
                setTimeout(function() { 
                    //location.reload();
                }, 3000);
            }
        }

      });

});

  // function select_collateral_details()
  // {   
  //   var c = $('#collateral_details').val(); 
  //   if(c=='Véhicule')
  //   {
  //     $('.Véhicule').show();
  //     $('.Déposit').hide();
  //     $('.Maison').hide();
  //     $('.Excemption').hide();  
  //   } 
  //   if(c=='Déposit')
  //   {
  //     $('.Véhicule').hide();
  //     $('.Déposit').show();
  //     $('.Maison').hide();
  //     $('.Excemption').hide();  
  //   } 
  //   if(c=='Maison')
  //   {
  //     $('.Véhicule').hide();
  //     $('.Déposit').hide();
  //     $('.Maison').show();
  //     $('.Excemption').hide();  
  //   } 
  //   if(c=='Excemption')
  //   {
  //     $('.Véhicule').hide();
  //     $('.Déposit').hide();
  //     $('.Maison').hide();
  //     $('.Excemption').show();  
  //   } 
  // }
    </script> 

  <script>

   
  
 

 
 


// function financial_situation()
// {

//   var persentage =$("#get_quotitesalaire").val(),
//   persentage1 =$("#get_quotitesalaireup").val(),
//   persentage2 =$("#get_quotitesalairemore").val();  
//   var net_salary=$("#net_salary").val(),
//   income_ratio=$("#income_ratio").val(),
//   quotitecessible=$("#quotitecessible").val();
//   var cresco_monthly="<?php echo number_format($appformD[0]['pmnt'],0,',','');?>";  
//   //alert(cresco_monthly);
//   if($("#net_salary").val() < 500000)
//   {
//     $("#income_ratio").val(persentage);
//   }else{
//     $("#income_ratio").val(persentage1);
//   } 
//   var Quotitécessible=((net_salary * income_ratio)/100);
//   $("#quotitecessible").val(Quotitécessible);
//   //$("#CRESCO").val(Quotitécessible);
//   $("#cmt_monthly").val(cresco_monthly);
  
//   if($("#Ttotal").val() !== ""){
//     $("#current_monthly_payments").val($("#Ttotal").val());
//   }  
//   //alert($("#total_mlc").val());
//   if($.trim($("#total_mlc").val())!== ""){
//     $("#new_monthly_payment").val($("#total_mlc").val());
//   }
//   if($("#current_monthly_payments").val()!== "" && $("#new_monthly_payment").val()!== ""){
//     $("#situation_total").val(parseFloat($("#current_monthly_payments").val())+parseFloat($("#new_monthly_payment").val()));
//   } 
//   $("#income_ratio_after").val(parseFloat($("#quotitecessible").val())-parseFloat($("#situation_total").val() )); 
//   var t =parseFloat($("#current_monthly_payments").val())+parseFloat($("#new_monthly_payment").val());
//   var t1=t/$("#net_salary").val();
//   $("#coeficientendettement").val(Math.round(t1*100));
//   $(".rdval").html($("#coeficientendettement").val());

// }

// function financial_situation2()
// {
  
//   var persentage =$("#get_quotitesalaire2").val(),
//   persentage1 =$("#get_quotitesalaireup2").val(),
//   persentage2 =$("#get_quotitesalairemore2").val(); 
//   var net_salary2=$("#net_salary2").val(),
//   income_ratio2=$("#income_ratio2").val(),
//   quotitecessible=$("#quotitecessible2").val();
//    var cresco_monthly=$("#cmt_monthly2").val();  
//    // alert(cresco_monthly);
//   if($("#net_salary2").val() < 500000)
//   {
//     $("#income_ratio2").val(persentage);
//   }else{
//     $("#income_ratio2").val(persentage1);
//   }

//   var Quotitécessible=((net_salary2 * income_ratio2)/100);
//   $("#quotitecessible2").val(Quotitécessible);
//   // alert(current_monthly_payments2);

//   $("#cmt_monthly2").val(cresco_monthly);

//   if($("#Ttotal2").val() !== ""){
//     $("#current_monthly_payments2").val($("#Ttotal2").val());
//   }
//   if($("#total_mlc2").val() !== ""){
//     $("#new_monthly_payment2").val($("#total_mlc2").val());
//   }
//   if($("#current_monthly_payments2").val()!== "" && $("#new_monthly_payment2").val()!== ""){

//     var1= parseFloat($("#current_monthly_payments2").val());
//     var2= parseFloat($("#new_monthly_payment2").val());
//       // alert(var1);
//       // alert(var2);

//     $("#situation_total2").val(var1+var2);

//   } else{
//     // alert('else part');
//   }
//   $("#income_ratio_after2").val(parseFloat($("#quotitecessible2").val())-parseFloat($("#situation_total2").val() ));  
//   var t =parseFloat($("#current_monthly_payments2").val())+parseFloat($("#new_monthly_payment2").val());
//   var t1=t/$("#net_salary2").val();
//   $("#coeficientendettement2").val(parseFloat(t1*100));
//   $(".rdval2").html($("#coeficientendettement2").val());
// }
    // function notificationcall(data, status)
    // {
    //     var notification = new NotificationFx({
    //         message : data,
    //         layout : 'bar',
    //         effect : 'slidetop',
    //         type : status          
    //       });
    //         notification.show();
    //         this.disabled = true;
    // }

   
  </script>

  
  
   <script type="text/javascript">
// $(document).on('change', '#vehicule_uploadfile', function(){
//   //alert("work properly"); 
//   var aid_vehicule ='<?php echo $appformD[0]['admin_id'];?>'; 
//   var file_vehicule = document.getElementById("vehicule_uploadfile").files[0].name; 
    
//   var collateral =$("#collateral_split").val(); 
//   var form = $("#collateralformvehicule");    
//     var formdata = new FormData(form[0]);
//   formdata.append('collateraltype', collateral);
//   formdata.append('adminid', aid_vehicule);
  
//   for(var i = 0; i < file_vehicule.length; i++) {       
//     formdata.append("files[]", document.getElementById('vehicule_uploadfile').files[i]);        
//   }
//   $.ajax({
//     url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_vehicule');?>",
//     method:"POST",
//     data: formdata,
//     contentType: false,
//     cache: false,
//     processData: false,
//     beforeSend:function(){
//       $('.vehiculeloder').css("display","inline");
//       $('.postprevievehicule').val('');
//       $('.getdataajaxvehicule').html('');
//       $('.Outputmsgtab9').html('');
//     },   
//     success:function(response)
//     {
//       console.log(response);
//       $(".postprevievehicule").val($.trim(response));
//       $('.vehiculeloder').css("display","none");
//        var obje = JSON.parse(response);
//        document.getElementById('collateralformvehicule').focus();
//       if(obje.success){
//         $('.Outputmsgtab9').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje.success)+'.</div>');       
//         setTimeout(function() {
//           location.reload();          
//         }, 1500);
//       }
//       else{
//         $('.getdataajaxvehicule').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');
        
//       }  
      
//     } 
//   });    
// }); 


// $(document).on('change', '#deposit_files', function(){
//   var aid_deposit ='<?php echo $appformD[0]['admin_id'];?>';  
//   var file_deposit = document.getElementById("deposit_files").files[0].name; 
    
//   var collateral_d =$("#collateral_split").val(); 
//   var form = $("#collateralformdeposit");    
//     var formdata = new FormData(form[0]);
//   formdata.append('collateraltype', collateral_d);
//   formdata.append('adminid', aid_deposit);
  
//   for(var i = 0; i < file_deposit.length; i++) {        
//     formdata.append("files[]", document.getElementById('deposit_files').files[i]);        
//   }
//   $.ajax({
//     url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_deposit');?>",
//     method:"POST",
//     data: formdata,
//     contentType: false,
//     cache: false,
//     processData: false,   
//     beforeSend:function(){
//       $('.depositloder').css("display","inline");
//       $('.postpreviedeposit').val('');
//       $('.getdataajaxdeposit').html('');
//       $('.Outputmsgtab9').html('');
//     },
//     success:function(response)    
//     {
//       console.log(response);
//       document.getElementById('collateral_split').focus();
//       $(".postpreviedeposit").val($.trim(response));
//       $('.depositloder').css("display","none");
//        var obje = JSON.parse(response);      
//       if(obje.success){
//         $('.Outputmsgtab9').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje.success)+'.</div>');       
//         setTimeout(function() {
//           location.reload();          
//         }, 1500);
//       }
//       else{
//         $('.getdataajaxdeposit').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');
        
//       } 
//     }
//   });    
// });

// $(document).on('change', '#upload_maison', function(){
  
//   var cid_m ='<?php echo $loan_details['loan_id'];?>';    
//   var file_maison = document.getElementById("upload_maison").files[0].name; 
    
//   var collateral_m =$("#collateral_split").val(); 
//   var form = $("#collateralformmaison");    
//     var formdata = new FormData(form[0]);
//   formdata.append('collateraltype', collateral_m);  
//   formdata.append('customerid', cid_m);
//   for(var i = 0; i < file_maison.length; i++) {       
//     formdata.append("files[]", document.getElementById('upload_maison').files[i]);        
//   }
//   $.ajax({
//     url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_maison');?>",
//     method:"POST",
//     data: formdata,
//     contentType: false,
//     cache: false,
//     processData: false,
//     beforeSend:function(){
//       $('.maisonloder').css("display","inline");
//       $('.postviewmmaison').val('');
//       $('.getdataajaxmaison').html('');
//       $('.Outputmsgtab9').html('');
//     },        
//     success:function(response)    
//     {
//       console.log(response);
//       $(".postviewmmaison").val($.trim(response));
//       $('.maisonloder').css("display","none");      
//       document.getElementById('collateral_split').focus();      
//       var obje2 = JSON.parse(response);     
//       if(obje2.success){
//         $('.Outputmsgtab9').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje2.success)+'.</div>');        
//         setTimeout(function() {
//           location.reload();          
//         }, 1500);
//       }
//       else{
//         $('.getdataajaxmaison').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje2.error)+'</div>');
        
//       }
      
      
//     }
//   });    
// });
// $(document).on('change', '#excemption_files', function(){ 
//   var cid_e ='<?php echo $loan_details['loan_id'];?>';    
//   var fileN = document.getElementById("excemption_files").files[0].name;    
//   var collateral_e =$("#collateral_split").val(); 
//   var form = $("#collateralformexcemption");    
//     var formdata = new FormData(form[0]); 
//   formdata.append('collateraltype', collateral_e);
//   for(var i = 0; i < fileN.length; i++) {       
//     formdata.append("files[]", document.getElementById('excemption_files').files[i]);       
//   }
//   $.ajax({
//     url:"<?php //echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_excemption');?>",
//     method:"POST",
//     data: formdata,
//     contentType: false,
//     cache: false,
//     processData: false,
//     beforeSend:function(){
//       $('.excemptionloder').css("display","inline");
//       $('.postviewexcemption').html('');    
//       $('.getdataajaxexcemption').html('');
//       $('.Outputmsgtab9').html('');
//     },    
//     success:function(response)    
//     {
//       console.log(response);
//       $(".postviewexcemption").val($.trim(response));
//       $('.excemptionloder').css("display","none");
//       var obje3= JSON.parse($.trim(response));
            
//       if(obje3.success){
//         $('.Outputmsgtab9').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje3.success+'.</div>');
//         setTimeout(function() {
//           location.reload();
//         }, 1500);
//       }
//       else{
//         $('.getdataajaxexcemption').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje3.error)+'</div>');
        
//       }
//     }
//   });    
// });

//================DETAILS Collateral=====================
// $(document).on('change', '#vehicule_uploadfile2', function(){ 
//   var aid_vehicule2 ='<?php echo $appformD[0]['admin_id'];?>';  
//   var file_vehicule2 = document.getElementById("vehicule_uploadfile2").files[0].name; 
//   var loan_id = '<?php echo $loan_details['loan_id'];?>'; 

//   var collateral2 =$("#collateral_details").val();  
//   var form = $("#collateralformvehicule1");    
//     var formdata = new FormData(form[0]);
//   formdata.append('collateraltype', collateral2);
//   formdata.append('adminid', aid_vehicule2);
//   formdata.append('loan_id', loan_id);
  
//   for(var i = 0; i < file_vehicule2.length; i++) {        
//     formdata.append("files[]", document.getElementById('vehicule_uploadfile2').files[i]);       
//   }
//   $.ajax({
//     url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_vehicule');?>",
//     method:"POST",
//     data: formdata,
//     contentType: false,
//     cache: false,
//     processData: false,
//     beforeSend:function(){
//       $('.vehiculeloder2').css("display","inline");
//       $('.postprevievehicule2').val('');
//       $('.getdataajaxvehicule2').html('');
//       $('.Outputmsgtab19').html('');
//     },   
//     success:function(response)
//     {
//       console.log(response);
//       $(".postprevievehicule2").val($.trim(response));
//       $('.vehiculeloder2').css("display","none");
//        var obje = JSON.parse(response);
//        document.getElementById('collateralformvehicule').focus();
//       if(obje.success){
//         $('.Outputmsgtab19').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje.success)+'.</div>');        
//         setTimeout(function() {
//           location.reload();          
//         }, 1500);
//       }
//       else{
//         $('.getdataajaxvehicule2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');
        
//       }  
      
//     } 
//   });    
// }); 


// $(document).on('change', '#deposit_files2', function(){
//   //  alert("deposit");
//   var aid_deposit2 ='<?php echo $appformD[0]['admin_id'];?>'; 
//   var file_deposit2 = document.getElementById("deposit_files2").files[0].name; 
//   var loan_id = '<?php echo $loan_details['loan_id'];?>'; 
    
//   var collateral_d2 =$("#collateral_details").val();  
//   var form = $("#collateralformdeposit2");    
//     var formdata = new FormData(form[0]);
//   formdata.append('collateraltype', collateral_d2);
//   formdata.append('adminid', aid_deposit2);
//   formdata.append('loan_id', loan_id);
  
//   for(var i = 0; i < file_deposit2.length; i++) {       
//     formdata.append("files[]", document.getElementById('deposit_files2').files[i]);       
//   }
//   $.ajax({
//     url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_deposit');?>",
//     method:"POST",
//     data: formdata,
//     contentType: false,
//     cache: false,
//     processData: false,   
//     beforeSend:function(){
//       $('.depositloder2').css("display","inline");
//       $('.postpreviedeposit2').val('');
//       $('.getdataajaxdeposit2').html('');
//       $('.Outputmsgtab19').html('');
//     },
//     success:function(response)    
//     {
//       console.log(response);
//       document.getElementById('collateral_details').focus();
//       $(".postpreviedeposit2").val($.trim(response));
//       $('.depositloder2').css("display","none");
//        var obje = JSON.parse(response);      
//       if(obje.success){
//         $('.Outputmsgtab19').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje.success)+'.</div>');        
//         setTimeout(function() {
//           location.reload();          
//         }, 1500);
//       }
//       else{
//         $('.getdataajaxdeposit2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');
        
//       } 
//     }
//   });    
// });

// $(document).on('change', '#upload_maison2', function(){ 
//   var cid_m2 ='<?php echo $loan_details['loan_id'];?>';   
//   var loan_id = '<?php echo $loan_details['loan_id'];?>'; 
//   var file_maison2 = document.getElementById("upload_maison2").files[0].name; 
    
//   var collateral_m2 =$("#collateral_details").val();  
//   var form = $("#collateralformmaison2");    
//     var formdata = new FormData(form[0]);
//   formdata.append('collateraltype', collateral_m2); 
//   formdata.append('customerid', cid_m2);
//   formdata.append('loan_id', loan_id);
//   for(var i = 0; i < file_maison2.length; i++) {        
//     formdata.append("files[]", document.getElementById('upload_maison2').files[i]);       
//   }
//   $.ajax({
//     url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_maison');?>",
//     method:"POST",
//     data: formdata,
//     contentType: false,
//     cache: false,
//     processData: false,
//     beforeSend:function(){
//       $('.maisonloder2').css("display","inline");
//       $('.postviewmmaison2').val('');
//       $('.getdataajaxmaison2').html('');
//       $('.Outputmsgtab19').html('');
//     },        
//     success:function(response)    
//     {
//       console.log(response);
//       $(".postviewmmaison2").val($.trim(response));
//       $('.maisonloder2').css("display","none");     
//       document.getElementById('collateral_details').focus();      
//       var obje2 = JSON.parse(response);     
//       if(obje2.success){
//         $('.Outputmsgtab19').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje2.success)+'.</div>');       
//         setTimeout(function() {
//           location.reload();          
//         }, 1500);
//       }
//       else{
//         $('.getdataajaxmaison2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje2.error)+'</div>');
        
//       }
      
      
//     }
//   });    
// });

// $(document).on('change', '#excemption_files2', function(){  
//   var cid_e2 ='<?php echo $loan_details['loan_id'];?>';   
//   var fileN2 = document.getElementById("excemption_files2").files[0].name;    
//   var collateral_e2 =$("#collateral_details").val();  
//   var loan_id = '<?php echo $loan_details['loan_id'];?>'; 
//   var form = $("#collateralformexcemption2");    
//     var formdata = new FormData(form[0]); 
//   formdata.append('collateraltype', collateral_e2);
//   formdata.append('loan_id', loan_id);
//   for(var i = 0; i < fileN2.length; i++) {        
//     formdata.append("files[]", document.getElementById('excemption_files2').files[i]);        
//   }
//   $.ajax({
//     method:"POST",
//     data: formdata,
//     contentType: false,
//     cache: false,
//     processData: false,
//     beforeSend:function(){
//       $('.excemptionloder2').css("display","inline");
//       $('.postviewexcemption2').html('');   
//       $('.getdataajaxexcemption2').html('');
//       $('.Outputmsgtab19').html('');
//     },    
//     success:function(response)    
//     {
//       console.log(response);
//       $(".postviewexcemption2").val($.trim(response));
//       $('.excemptionloder2').css("display","none");
//       var obje3= JSON.parse($.trim(response));
            
//       if(obje3.success){
//         $('.Outputmsgtab19').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje3.success+'.</div>');
//         setTimeout(function() {
//           location.reload();
//         }, 1500);
//       }
//       else{
//         $('.getdataajaxexcemption2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje3.error)+'</div>');
        
//       }
//     }
//   });    
// });

function CheckColors(val){
    // alert(val);
 var element=document.getElementById('loan_amt');
 // alert(val);
 if(val=='noselection'|| val=='other'){
  element.style.display='block';
 }else{
   element.style.display='none';
  $("#loan_amt").val(val);
}
}


function add_object(val){

  var element=document.getElementById('loan_object');

  $("#loan_object").val(val);

   if(val=='other'){
    element.style.display='block';
   }else{
     element.style.display='none';
    
  }
}
function delete_file(id){

  if(confirm("Are you sure you want to delete this Record?")){    
    
      $.ajax({ 
        type: "POST", 
        url: '<?php echo base_url();?>Customer_Product/delete_document',
        data: {id:id},
        cache: false,
        success: function(resp) {
            
          // alert(resp);
          
          location.reload();
          
            
          }
      });
    }
}
</script>