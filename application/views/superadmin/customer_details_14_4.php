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
            <li><a href="<?php echo base_url('PP_Consumer_Loans/Creditloan');?>">CREDIT CONSO</a></li>            
            <li class="active"><span>D??TAILS DU CLIENT</span></li>
            <li><?php echo "Application Number: (".$appformD[0]['application_no'].")";?></li>
          </ol>
        </div>

        <div class="col-md-3">
          <div class="tab-content" style="text-align:right">
            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
              <div class="btn-group" role="group">
                <button type="button" id="stars" class="btn btn-default" href="#tab1" data-toggle="tab">
                <div>LIST</div>
                </button>
              </div>
              <div class="btn-group" role="group">
                <button type="button" id="favorites" class="btn btn-primary" href="#tab2" data-toggle="tab">
                <div>SPLIT</div>
                </button>
              </div>
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
        //echo "<pre>", print_r($record),"</pre>";
        //echo "<pre>", print_r($appformD),"</pre>";
        //echo "<pre>", print_r($otherinfo,1),"</pre>";
        //echo "<pre>", print_r($pinfo,1),"</pre>"; 
        //echo "<pre>", print_r($empinfo,1),"</pre>";       
        //echo "<pre>", print_r($collateral_vehicule,1),"</pre>"; 
        //echo "<pre>", print_r($customerdata,1),"</pre>"; 
        //echo "<pre>", print_r($clist_docs_check,1),"</pre>"; 

      
      $last=array();
       foreach (json_decode($appformD[0]['databinding']) as $key ) {
         //echo "<pre>", print_r($key),"</pre>";
         $last[]=$key->month.'-'.$key->years;
       }
       $createddate=date('23', strtotime($appformD[0]['created']));
       $DateofLastPayment = $createddate.'-'.end($last);
       $sumofInterestPaidbeforTax =0;
        $sumofVATonInterest=0;  
        if(!empty($appformD[0]['databinding'])){
            $databinding=json_decode($appformD[0]['databinding']);
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

                      <!-- <tr>
                        <td>Mr TEST CA TEST</td>
                        <td>7 mois</td>
                        <td>1000.00</td>
                        <td>Approve&aacute;</td>
                        <td>Intitial</td>
                        <td>30</td>
                        <td>16-06-2019</td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>          

          <div class="tab-pane fade in active" id="tab2">
            <div class="row" style="margin-top:0px;">
              <div class="col-lg-12">
                <div class="main-box clearfix">
                  <div class="main-box-body clearfix" style="margin-top:0px;">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group" style="margin-bottom:10px;">
                              <div class="input-group" style="width:100%">
                                <input type="search" class="form-control" id="searchString" placeholder="Enter Account Number" autocomplete="off">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="scrollable" style="">
                          <div class="table-responsive">                            
                            <table class="table table-striped table-hover" id="customerlist">
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
                            </table>
                          </div>
                        </div>
                      </div>
                      <?php
                      //print_r($customersd);
                      ?>                     

                      <div class="col-lg-8">
                        <div class="main-box clearfix" style="margin-bottom:0px;">
                          <div class="main-box-body clearfix" style="padding:0px !important">
                            <div class="panel panel-default panel-body loan-details-header">
                              <div class="bg-header">
                                <div class="well well-sm well-primary" style="background-color:transparent !important">
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">Nom Et Prenoms:</div>
                                    <div class="col-xs-2 no-padding"><?php echo ucfirst($pinfo[0]['first_name']) ?: '-';?><?php echo $pinfo[0]['middle_name'] ?: ' ';?><?php echo $pinfo[0]['last_name'] ?: '-';?></div>
                                    <div class="col-xs-2 bold no-padding">Duree Du Pret:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $appformD[0]['loan_term'];?> 
                                    <?php if($appformD[0]['loan_schedule'] == "Monthly"){
                                      echo "MOIS";
                                    } ?></div>
                                    <div class="col-xs-2 bold no-padding">Agence:</div>
                                    <div class="col-xs-2"><?php echo $customersd[0]['account_name'];?></div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">Statut Du Pret:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $appformD[0]['loan_status'];?></div>
                                    <div class="col-xs-2 bold no-padding">Nature Du Pret:</div>
                                    <div class="col-xs-2 no-padding">CREDIT CONSO </div>
                                    <div class="col-xs-2 bold no-padding">Taux D'Interet:</div>
                                    <div class="col-xs-2 no-padding"><?php echo sprintf("%01.2f", $appformD[0]['loan_interest']);?>%</div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">Montant Du Pret:</div>
                                    <div class="col-xs-2 no-padding">CFA <?php echo number_format($appformD[0]['loan_amt'],0,',',' ');?></div>
                                    <div class="col-xs-2 bold no-padding">Date Dernier Echeance:</div>
                                    <div class="col-xs-2 no-padding">
                                      <?php  echo $DateofLastPayment;
                                      //echo date('d-m-Y', strtotime('+1 month', strtotime($appformD[0]['created'])));;?>
                                        
                                      </div>
                                    <div class="col-xs-2 bold no-padding">Montant Total A Rembourser:</div>
                                    <div class="col-xs-2 no-padding">CFA <?php echo number_format($appformD[0]['tpmnt'],0,',',' ');?></div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">TVA(VAT On Interest):</div>
                                    <div class="col-xs-2 no-padding"><?php echo 'CFA '.number_format($sumofVATonInterest,0,',',' '); ?></div>
                                    <div class="col-xs-2 bold no-padding">Mensualite:</div>
                                    <div class="col-xs-2 no-padding">CFA <?php echo number_format($appformD[0]['pmnt'],0,',',' ') ;?></div>
                                    <div class="col-xs-2 bold no-padding">Numero De Compte:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $customersd[0]['account_number'];?></div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold"></div>
                                    <div class="col-xs-2"></div>
                                    <div class="col-xs-2 bold"></div>
                                    <div class="col-xs-2"></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Split Blue section -->
                          <div class="action-panel">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;margin-bottom:10px;">
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nextstep-buttons">
                                  <!-- Age of Customer section -->
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                     <?php                                    
                                    $dateOfBirth = date('Y-m-d', strtotime($pinfo[0]['dob']));
                                    $today = date("Y-m-d");
                                    $diff = date_diff(date_create($dateOfBirth), date_create($today));
                                     ?>
                                    <div class="infographic-box" data-toggle="tooltip" title="Age of Customer"> <img src="<?php echo base_url('assets/img/age.png');?>" /> <span class="value">
                                      <?php echo $diff->format('%y') ?: '21';?></span> 
                                      <!--<span class="headline">Users</span>--> 
                                    </div>
                                  </div>
                                  <!-- End Age of Customer section -->
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <?php                                    
                                    $Tenurewithbank = date("d-m-Y" ,strtotime($bankinfo[0]['opening_date']));
                                    $today = date("Y-m-d");
                                    $diff = date_diff(date_create($Tenurewithbank), date_create($today));
                                     ?>
                                    <div class="infographic-box" data-toggle="tooltip" title="Tenure with Bank"> <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value"><?php echo timeAgo($Tenurewithbank) ?: '21';?></span> 
                                      <!--<span class="headline">Users</span>--> 
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title="Previous Loans"> <img src="<?php echo base_url('assets/img/loans.png');?>" /> <span class="value">01</span>
                                    </div>
                                  </div>

                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title="Application Date"> <img src="<?php echo base_url('assets/img/timer.png');?>" /> <span class="value">
                                      <?php echo timeAgo($appformD[0]['created']) ?: '10 Days';?></span> 
                                      <!--<span class="headline">Users</span>--> 
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nextstep-buttons">
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title="Ratio Debt"> <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value rdval"><?php echo $riskfsituation[0]['coeficientendettement'] ?: '0';?></span>
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title=""> <img src="<?php echo base_url('assets/img/revenue.png');?>" />  <span class="headline">Target List</span> </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align:center">
                                    <loan-back> <a href="<?php echo base_url('PP_Consumer_Loans/amortizationview/').$appformD[0]['cl_aid'];?>" class="btn btn-default loan-back"  style="width:100%;margin-top:25px;">AMORTISSEMENT</a> </loan-back>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>  
                          <!-- End Blue Section -->                        

                          <div class="scroller scroller-left">
                            <i class="fa fa-chevron-left"></i>
                          </div>
                          <div class="scroller scroller-right">
                            <i class="fa fa-chevron-right"></i>
                          </div>       
                          <div class="wrapper">
                            <ul class="nav nav-tabs list">
                              <li class="active" onclick="active_tab('tab-1')"><a href="#tab-1">D??tails Sur Le Client</a></li>
                              <li onclick="active_tab('tab-21')"><a href="#tab-21">Co??t du cr??dit</a></li>
                              <li onclick="active_tab('tab-2')"><a href="#tab-2">Documents</a></li>
                              <li onclick="active_tab('tab-3')"><a href="#tab-3">Tra??abilit?? Sur le Dossier</a></li>
                              <li onclick="active_tab('tab-4')"><a href="#tab-4">Analyse Risque</a></li>
                              <li onclick="active_tab('tab-6')"><a href="#tab-6">Historique Interaction</a></li>
                              <!--<li onclick="active_tab('tab-7')"><a href="#tab-7">CREDIT BEAREU</a></li>-->
                              <li onclick="active_tab('tab-8')"><a href="#tab-8">Calcul Amortissement</a></li>
                              <li onclick="active_tab('tab-9')"><a href="#tab-9">Garanties</a></li>
                              <li onclick="active_tab('tab-10')"><a href="#tab-10">Decisions</a></li>
                              <li onclick="active_tab('tab-5')"><a href="#tab-5">CAD</a></li>
                            </ul>
                            <div class="tab-content" style="margin-top: 40px;">
                              <div class="tab-pane fade in active" id="tab-1">
                          
                           <?php if ($this->session->flashdata('success')) { ?>
                                   <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>Success!</strong> Updated Successfully.</div>                           
                                <?php } ?> 

                            <h3 id="tab-title"><span>Renseignements Personnels</span></h3>                               
                                <div class="row">
                <form action="<?php echo base_url('PP_Consumer_Loans/customer_details_update')?>"  method="post">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label> Pr??noms </label>
                                      <h3 id="tab-details"><span> <input type="text" name="first_name" value="<?php echo ucfirst($pinfo[0]['first_name']) ?>"></span></h3>
                                    </div>
                                  </div>                  
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>2i??me Pr??noms </label>
                                      <h3 id="tab-details"><span> <input type="text" name="middle_name" value="<?php echo $pinfo[0]['middle_name'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label> Nom </label>
                                      <h3 id="tab-details"><span> <input type="text" name="last_name" value="<?php echo $pinfo[0]['last_name'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Genre</label>
                                      <h3 id="tab-details"><span>  <input type="text" name="gender" value="<?php echo $pinfo[0]['gender'] ?>"></span></h3>
                                    </div>
                                  </div>
                                </div>                
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date de naissance </label> 
                                      <h3 id="tab-details"><span> <input type="text" placeholder="dd-mm-yyyy" id="dob" name="dob" value="<?php echo date('d-m-Y', strtotime($pinfo[0]['dob'])) ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Dip??me ou Niveau ??tude </label>
                                      <h3 id="tab-details"><span>
				                             <input type="text" name="education" value="<?php echo ucwords($pinfo[0]['education']) ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Situation Matrimoniale </label>
                                      <h3 id="tab-details"><span><input type="text" name="marital_status" value="<?php echo ucwords($pinfo[0]['marital_status']) ?>" placeholder="single/marit/devorce"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Email </label>
                                      <h3 id="tab-details"><span> <input type="text" name="email" value="<?php echo $pinfo[0]['email'] ?>"></span></h3>
                                    </div>
                                  </div>
                                </div>                
                                <h3 id="tab-title"><span>Informations Additionnelles</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Type d???identification </label> 
                                        <?php
                                          $Typeid = array(
                                            "Passport",
                                            "CNI",
                                            "Recepisse + Acte de Naissance",
                                            "Carte de Sejour"
                                          ); ?>
                                          <?php
                                          if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                          <select class="form-control" name="type_id" id="type_id" required>
                                            <?php foreach($Typeid as $adnfo){
                                            if(trim($adinfo[0]['type_id']) == $adnfo){
                                               $select="selected";}else{$select="";}
                                              echo  '<option value="'.$adnfo.'" '.$select.'>'.$adnfo.'</option>';
                                            }?>
                                          </select>
                                          <?php
                                        }else{
                                          echo '<h3 id="tab-details"><span>'.$adinfo[0]['type_id'].'</span></h3>';
                                        }?>                                          
                                    </div>                                    
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Revenu mensuel </label>
                                      <h3 id="tab-details"><span><input type="text" name="monthly_income" value="<?php echo 'CAF ' . number_format($adinfo[0]['monthly_income'], 0, ',', ' ') ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>D??penses mensuelles </label>
                                      <h3 id="tab-details"><span> <input type="text" name="monthly_expenses" value="<?php echo 'CAF ' . number_format($adinfo[0]['monthly_expenses'], 0, ',', ' ') ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Num??ro du type d???identification </label>
                                      <h3 id="tab-details"><span> <input type="text" name="id_number" value="<?php echo $adinfo[0]['id_number']?>"></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Pays de r??sidence </label>
                                      <h3 id="tab-details"><span> <input type="text" name="state_of_issue" value="<?php echo $adinfo[0]['state_of_issue'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Fonction </label>
                                      <h3 id="tab-details"><span><input type="text" name="occupation" value="<?php echo $adinfo[0]['occupation'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Num??ro de t??l??phone principal </label>
                                      <h3 id="tab-details"><span> <input type="text" name="main_phone" class="phone_main_c" value="<?php echo $adinfo[0]['main_phone'] ?>"></span>
                                      <span class="phone_main_error error_c" style="display:none">Please enter valid phone no. </span>
                                      <span class="phone_main_valerror error_c" style="display:none">Please enter 10 digits phone no.</span>
                                      </h3>
                                     
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Second Num??ro de t??l??phone </label>
                                      <h3 id="tab-details"><span> <input type="text" name="alternative_phone" class="phone_alternate_c" id="alternative_phone" value="<?php echo $adinfo[0]['alternative_phone'] ?>"></span>
                                      <span class="phone_alt_error error_c" style="display:none">Please enter valid phone no. </span>
                                      <span class="phone_alt_valerror error_c" style="display:none">Please enter 10 digits phone no.</span>
                                    </h3>
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date Expiration du type d???identification </label>
                                      <h3 id="tab-details"><span><input type="text" placeholder="dd-mm-yyyy" name="expiration_date_id" value="<?php echo date('d-m-Y', strtotime($adinfo[0]['expiration_date_id'])) ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date Etablissement Type de Pi??ce </label>
                                      <h3 id="tab-details"><span><input type="text"  name="room_type" value="<?php echo $adinfo[0]['room_type'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Nom et Pr??noms du PERE</label>
                                      <h3 id="tab-details"><span><input type="text"  name="father_fullname" value="<?php echo $adinfo[0]['father_fullname'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Noms et Pr??noms  de la MERE</label>
                                      <h3 id="tab-details"><span><input type="text"  name="mother_fullname" value="<?php echo $adinfo[0]['mother_fullname'] ?>"></span></h3>
                                    </div>
                                  </div>
                                </div>

                                <!-- Start Employment Information -->
                                <h3 id="tab-title"><span>Information Sur l'EmploiI</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Nom de l???employeur</label>
                                      <h3 id="tab-details"><span> <input type="text" name="employer_name" value="<?php echo $empinfo[0]['employer_name'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group" style="margin-bottom:5px;">
                                    <label>Secteur d???activit??</label>
                                      <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                        <select class="form-control" id="secteurs" name="secteurs">
                                          <?php 
                                            if(!empty($secteurs)){
                                              foreach($secteurs as $Key){
                                              if(trim($empinfo[0]['secteurs_id']) == $Key['tlc_id']){ $select="selected";}else{$select="";}
                                                echo "<option value=\"".$Key['tlc_id']."\" name=\"".$Key['secteurs']."\" ".$select." >".$Key['secteurs']."</option>"."\r\n";
                                              }
                                            }
                                            ?>                                       
                                        </select>
                                    <?php }
                                    else{ ?>
                                      <h3 id="tab-details"><span><?php echo $empinfo[0]['SecteursN'] ?: 'AGRICOLE';?></span></h3>
                                      <?php
                                    }
                                    ?>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group" style="margin-bottom:5px;">
                                      <label>Cat??gorie Employeurs </label>
                                      <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                      <select class="form-control"  id="cat_employeurs" name="cat_employeurs">
                                         <?php 
                                          if(!empty($cat_emp)){
                                            foreach($cat_emp as $Key){
                                              if(trim($empinfo[0]['cat_emp_id']) == $Key['cat_id']){ $select="selected";}else{$select="";}
                                              echo "<option value=\"".$Key['cat_id']."\" name=\"".$Key['catrgory']."\" ".$select.">".$Key['catrgory']."</option>"."\r\n";
                                            }
                                          }
                                          ?>                                        
                                      </select>
                                      <?php
                                    }else{
                                        ?>
                                        <h3 id="tab-details"><span><?php echo $empinfo[0]['catname'] ?: '??tat et ses d??membrements';?></span></h3>
                                      <?php }
                                      ?>
                                    </div>
                                  </div>
                                  <div class="col-md-3">                                 
                                    <div class="row" style="margin-bottom:5px;">
                                      <div class="form-group" style="margin-bottom:5px;">
                                       <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image" style="display:none; position: absolute; z-index: 1000; top: 34px;">
                                        <label>Type de Contrat </label>
                                        <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                        <select class="form-control" id="typeofcontract" name="typeofcontract" style="width:98%">
                                          <?php
                                            if(!empty($contract_type)){
                                              foreach($contract_type as $Key){                                              
                                                if(trim($empinfo[0]['contract_type_id']) == $Key['tc_id']){ $select="selected";}else{$select="";}                                                
                                              echo "<option value=\"".$Key['tc_id']."\" name=\"".$Key['contract_type']."\" $select>".$Key['contract_type']."</option>";                       }
                                            }
                                            ?>                                          
                                        </select>
                                      <?php } 
                                      else{
                                        echo '<h3 id="tab-details"><span>'.$empinfo[0]['ctype'].'</span></h3>';
                                      }
                                      ?>
                                      </div>                                      
                                      <div class="form-group" style="display:none;">
                                        <div class="col-sm-8" style="padding-left:0px;">
                                          <input class="form-control" type="text" placeholder="Contract Name" name="addctype" id="addctype" value=""  autocomplete="off">
                                        </div>
                                        <div class="col-sm-4" style="padding-right:0px;">
                                          <button type="button" class="btn btn-sm btn-default addbutton">ADD</button>
                                        </div>
                                      </div>                                   
                                     </div>
                                    </div>                                   
                                  </div> 
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date d???embauche </label>
                                      <h3 id="tab-details"><span> <input type="text" placeholder="dd-mm-yyyy" name="employment_date" value="<?php echo date('d-m-Y', strtotime($empinfo[0]['employment_date']))?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date End of Contract for CDD </label>
                                      <h3 id="tab-details"><span> <input type="text" placeholder="dd-mm-yyyy" name="sate_end_contract_cdd" value="<?php echo date('d-m-Y', strtotime($empinfo[0]['sate_end_contract_cdd']))?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Nombre of Years of Professionel Experience</label>
                                      <h3 id="tab-details"><span>
                                        <?php 
                                        $sdate2 = $empinfo[0]['how_he_is_been_with_current_employer'];                                     
                                        $edate2 = date('Y-m-d');                                      
                                        $date_diff = abs(strtotime($edate2) - strtotime($sdate2));
                                       
                                        $years2 = floor($date_diff / (365*60*60*24));
                                        $months = floor(($date_diff - $years2 * 365*60*60*24) / (30*60*60*24));
                                        $days = floor(($date_diff - $years2 * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                       
                                        //$years.'Years '. $months.'Months';
                                        //echo $years*12;
                                        if($empinfo[0]['years_professionel_experience']){ ?>   
                     <input type="text" name="years_professionel_experience" value="<?php echo $empinfo[0]['years_professionel_experience'] ?>">
                               <?php }elseif($years2!=0) { ?>
                    <input type="text" name="years_professionel_experience" value="<?php echo $years2 ?>">  
                               <?php }else { ?>
                    <input type="text" name="years_professionel_experience" value="<?php echo $empinfo[0]['years_professionel_experience'] ?>">  
                                   <?php }?>                                          
                                      </span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date de pr??sence chez l???employeur actuel </label>
                                      <h3 id="tab-details"><span>
                                <?php 
                                  $sdate = $empinfo[0]['how_he_is_been_with_current_employer'];
                                  $edate = date('Y-m-d');
                                  $date_diff = abs(strtotime($edate) - strtotime($sdate));
                                  $years = floor($date_diff / (365*60*60*24));
                                  $months = floor(($date_diff - $years * 365*60*60*24) / (30*60*60*24));
                                  $days = floor(($date_diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                                  //$years.'Years '. $months.'Months';
                                  //echo $years*12;                                       
                                  
                      if($empinfo[0]['how_he_is_been_with_current_employer']){ ?>   
                        <input type="text" name="how_he_is_been_with_current_employer" value="<?php echo $empinfo[0]['how_he_is_been_with_current_employer']?>"  Mois>
                                    <?php }elseif($years!=0) { ?>
                        <input type="text" name="how_he_is_been_with_current_employer" value="<?php echo $years?>" year>  
                                    <?php }else { ?>
                      <input type="text" name="how_he_is_been_with_current_employer" value="<?php echo $months ?>" Mois >  
                                        <?php }?>
                                        </span></h3>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Salaire net </label>
                                      <h3 id="tab-details"><span> <input type="text" name="emp_net_salary" value="<?php echo number_format($empinfo[0]['emp_net_salary'], 0, ',', ' ') ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Age de retraite pr??vu </label>
                                      <h3 id="tab-details"><span><input type="text" name="retirement_age_expected" value="<?php echo $empinfo[0]['retirement_age_expected'] ?>"></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <!-- End Employment Information -->

                                <!-- Start Address Information -->
                                  <h3 id="tab-title"><span>Adresse</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Lieu de residence </label>
                                      <h3 id="tab-details"><span> <input type="text" name="resides_address" value="<?php echo $adrs[0]['resides_address'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Nom de la rue </label>
                                      <h3 id="tab-details"><span> <input type="text" name="street" value="<?php echo $adrs[0]['street'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Ville de r??sidence</label>
                                      <h3 id="tab-details"><span> <input type="text" name="city_id" value="<?php echo $adrs[0]['city_id'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Pays de r??sidence </label>
                                      <h3 id="tab-details"><span><input type="text" name="state_id" value="<?php echo $adrs[0]['state_id'] ?>"></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <!-- End Address Information -->
                                
                                <!-- Start Banking Information -->
                                  <h3 id="tab-title"><span>Information Sur le Compte Bancaire</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Type de compte </label>
                                   <?php
                                    $Typeid = array(
                                      "Compte d?????pargne",
                                      "Compte d?????pargne r??gulier",
                                      "Compte courant",
                                      "Compte de d??p??t r??current",
                                      "Fixed Deposit Account",
                                      "Demat Account",
                                      "NRI Accounts",
                                       ); ?>
                               <?php
                                if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                  <select class="form-control" name="account_type" id="account_type" required>
                                  <?php foreach($Typeid as $adnfo){
                                if(trim($adinfo[0]['account_type']) == $adnfo){ 
                                  $select="selected";}else{$select="";}
                                  echo '<option value="'.$adnfo.'" '.$select.'>'.$adnfo.'</option>';
                                        }?>
                                 </select>
                               <?php } else{
                                      echo '<h3 id="tab-details"><span>'.$adinfo[0]['account_type'].'</span></h3>';
                                    }?>                                   
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>num??ro de compte </label>
                                      <h3 id="tab-details"><span> <input type="text" name="account_number" value="<?php echo $bankinfo[0]['account_no'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Bank Name </label>
                                      <h3 id="tab-details"><span> <input type="text" name="account_name" value="<?php echo $bankinfo[0]['bank_name'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>T??l??phone agence bancaire</label>
                                      <h3 id="tab-details"><span> <input type="text" name="bank_phone" value="<?php echo $bankinfo[0]['bank_phone'] ?>"></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date ouverture de compte </label>
                                      <h3 id="tab-details"><span> <input type="text" placeholder="dd-mm-yyyy" name="opening_date" value="<?php echo date("d-m-Y", strtotime($bankinfo[0]['opening_date'])) ?>"></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <!-- End Banking Information -->
                                
                                <!-- Start Others Information -->
                                  <h3 id="tab-title"><span>Autres Informations</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Code de la banque </label>
                                      <h3 id="tab-details"><span> <input type="text" name="field_1" value="<?php echo $otherinfo[0]['field_1'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Code de l???agence </label>
                                      <h3 id="tab-details"><span>  <input type="text" name="field_2" value="<?php echo $otherinfo[0]['field_2'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Cl?? RIB </label>
                                      <h3 id="tab-details"><span> <input type="text" name="field_3" value="<?php echo $otherinfo[0]['field_3'] ?>"></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Montant de l???assurance</label>
                                      <h3 id="tab-details"><span> <input type="text" name="field_4" value="<?php echo $otherinfo[0]['field_4'] ?>"></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Objet du cr??dit </label>
                                        <?php
                                          $objcredit = array(
                                            "Consomation",
                                            "Equipement",
                                            "Immobilier",
                                            "Scolaire",
                                            "Autres",
                                          ); ?>

                                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                          <select class="form-control" name="obj_credit" id="obj_credit" style="width:98%">
                                            <?php foreach($objcredit as $credit){
                                            if(trim($otherinfo[0]['objet_credit']) == $credit){ $select="selected";}else{$select="";}
                                              echo  '<option value="'.$credit.'" '.$select.' name="'.$credit.'">'.$credit.'</option>';
                                            }?>
                                          </select>
                                        <?php } 
                                        else{ ?>
                                          <h3 id="tab-details"><span><?php echo $otherinfo[0]['objet_credit'] ?: 'Consomation';?></span></h3>
                                        <?php }
                                        ?>
                                    </div>
                                  </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>FRAIS d?? DOSSIER</label>
                                        <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                        <div class="input-group">
                                          <span class="input-group-addon">CFA</span>
                                          <input type="number" class="form-control" id="frais_de_dossier" name="frais_de_dossier" autocomplete="off" value="<?php echo $otherinfo[0]['frais_de_dossier'] ?: '0';?>" min="0" required="">
                                          <span class="input-group-addon showhide" style="display:none; position: absolute;">
                                            <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right updateloder" style="display: inline;">
                                          </span>
                                        </div>
                                      <?php }
                                      else { ?>
                                        <h3 id="tab-details"><span><?php echo $otherinfo[0]['frais_de_dossier'] ?: '0';?></span></h3>
                                      <?php }
                                        ?>
                                      </div>
                                    </div>                                    
                                </div> 
                                <div class="row">
                                  <div class="col-md-12">
                                    <textarea class="objerror form-control" rows="10" style="display:none;"></textarea>
                                  </div>
                                </div>
                                <div class="text-center">
                                <button type="submit" class="btn btn-primary waves-effect waves-light submitBtn"><img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Update</button>
                                </div>
                                <!-- End Others Information -->
                                
                          </div>    

              <input type="hidden" name="id" value="<?php echo $urlid ?>">
              <input type="hidden" name="oid" value="<?php echo $otherinfo[0]['oid'] ?>">
              <input type="hidden" name="cid" value="<?php echo $customersd[0]['cid'] ?>">
              <input type="hidden" name="cbk_id" value="<?php echo $bankinfo[0]['cbk_id'] ?>">

                <input type="hidden" name="add_id" value="<?php echo $adrs[0]['add_id'] ?>">
                <input type="hidden" name="emp_infoid" value="<?php echo $empinfo[0]['emp_infoid'] ?>">
                <input type="hidden" name="ai_id" value="<?php echo $adinfo[0]['ai_id'] ?>">
                <input type="hidden" name="pid" value="<?php echo $pinfo[0]['pid'] ?>">
                <input type="hidden" name="bmid" value="<?php echo $decision_rec[0]['bmid'] ?>">
                <input type="hidden" name="applicableid" value="<?php echo $applicableloanratio[0]['applicableid'] ?>">
                <input type="hidden" name="tc_id" value="<?php echo $contract_type[0]['tc_id'] ?>">
                <input type="hidden" name="cat_id" value="<?php echo $cat_emp[0]['cat_id'] ?>">
                <input type="hidden" name="tlc_id" value="<?php echo $secteurs[0]['tlc_id'] ?>">

                <input type="hidden" name="cl_aid" value="<?php echo $loandetails[0]['cl_aid'] ?>">
                <input type="hidden" name="tid" value="<?php echo $loantax[0]['tid'] ?>">
                <input type="hidden" name="loantype" value="<?php echo $appformD[0]['loantype'] ?>">
                          
              </form>                         
              
                              

                              <div class="tab-pane fade" id="tab-2">
                                <h3 id="tab-title"><span>DOCUMENTS SYSTEMES </span></h3>
                                <small class="outputmsg"></small>
                                <textarea role="18" col="22" class="form-control outputmsgtext" style="margin: 0px; width: 788px; height: 185px; display:none;"></textarea>
                                <div class="row">
                                  <div class="col-lg-12">
                                     <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                    <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="Systemfileuploaded_image" style="display:none">
                                      <input id="systemdocsfiles" type="file" multiple="" name="systemdocsfiles[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">
                                    </label>
                                    <?php } ?>  
                                    <input type="hidden" id="getcid"  name="getcid" value="<?php echo $appformD[0]['cl_aid'];?>">
                                    <?php if(!empty($sys_docs)){ ?>
                                    <button type="button" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>
                                    <?php } else { ?>
                                    <button type="button" class="btn btn-sm btn-default preview" id="notification_preview"> <i class="fa fa-eye"></i> Preview</button>
                                    <?php } if(!empty($sys_docs)){ ?>
                                    <a href="<?php echo base_url('PP_Consumer_Loans/downloadall/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
                                    <?php } else{ ?>
                                    <a haterref="javascript:void(0);" class="btn btn-sm btn-primary download" id="notification_download"> <i class="fa fa-cloud-download"></i> Download </a>
                                    <?php } ?>
                                  </div>
                                </div>
                                <table class="table table-bordered table-hover" id="table_auto">
                                  <tr id="row_0">
                                    <td>                                      
                                      <div class="row">
                                        <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/promissory_note/').$appformD[0]['cl_aid'];?>','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return"> 1- CONVENTION DE CREDIT</a></span>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/credit_agreement/').$appformD[0]['cl_aid'];?>','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">2- CAUTION SOLIDAIRE ET PERSONNEL</a></span>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-12"> <a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/formulaire_adhesion_aufoud_de_grantie/').$appformD[0]['cl_aid'];?>','Windows','width=680,height=940,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">3- FORMULAIRE ADHESION AU FOND DE GARANTIE</a>
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/formulaire_de_demande_credit/').$appformD[0]['cl_aid'];?>','Windows','width=680,height=940,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">4- FORMULAIRE DE DEMANDE CREDIT</a></span>
                                          <!-- <input id="avatar" class="file-loading" type="file" name="image" > --> 
                                        </div>
                                      </div>
                                      <div class="row">
                                        <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/billetaorder/').$appformD[0]['cl_aid'];?>','Windows','width=802,height=430,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">5- BILLET A ORDRE</a></span> 
                                          <!-- <input id="avatar" class="file-loading" type="file" name="image" > --> 
                                        </div>
                                      </div>
                                      <div class="row">                                       
                                        <div class="col-lg-12"> 
                                          <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/memo_of_setting_up/').$appformD[0]['cl_aid'];?>','Windows','width=680,height=940,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">6- MEMO DE MISE EN PLACE</a></span> 
                                          <!-- <input id="avatar" class="file-loading" type="file" name="image" > --> 
                                        </div>
                                      </div> 
                                    </td>
                                  </tr>
                                </table>
                                <h3 id="tab-title"><span>CHECK LIST DOCUMENTS A FOURNIR</span></h3>
                                <small class="outputmsg2"></small>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_checklist_loder" style="display:none">
                                      <input type="file" multiple="" name="check_list_customer_documents[]" id="check_list_customer_documents" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">
                                    </label>
                                    <?php if(!empty($clist_docs)){ ?>
                                    <button type="button" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal2"><i class="fa fa-eye"></i> Preview</button>
                                    <?php } else { ?>
                                    <button type="button" class="btn btn-sm btn-default preview" id="notification_CheckList_preview"> <i class="fa fa-eye"></i> Preview</button>
                                    <?php } if(!empty($clist_docs)){ ?>

                                    <a href="<?php echo base_url('PP_Consumer_Loans/downloadallCheckList/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
                                    <?php } else{ ?>
                                    <a href="javascript:void(0);" class="btn btn-sm btn-primary download" id="notification_CheckList_download"> <i class="fa fa-cloud-download"></i> Download </a>
                                    <?php } ?>
                                  </div>
                                </div>
                                <table class="table table-bordered table-hover" id="table_auto">
                                  <tr id="row_0">
                                    <td>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <span><a href="JavaScript:void(0);">1- DEMANDE DU CLIENT </a></span> 
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc1" id="optionsRadios1" value="YES"  <?php if($clist_docs_check[0]['doc_1']=="YES"){ echo "checked";} else { echo "";} ?>  onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_1');" />
                                                <label for="optionsRadios1"> YES </label>
                                              </div>
                                              <div class="radio doc_1" style="display:inline-block">
                                                <input type="radio" name="optiondoc1" id="optionsRadios2" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_1');" <?php if($clist_docs_check[0]['doc_1']=="NO"){ echo "checked";} else { echo "";} ?>  />
                                                <label for="optionsRadios2"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <span><a href="JavaScript:void(0);">2- COPIE CNI EN COURS DE VALIDITE</a><span>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc2" id="optionsRadios3" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_2');"  <?php if($clist_docs_check[0]['doc_2']=="YES"){ echo "checked";} else { echo "";} ?> />
                                                <label for="optionsRadios3"> YES </label>
                                              </div>
                                              <div class="radio doc_2" style="display:inline-block">
                                                <input type="radio" name="optiondoc2" id="optionsRadios4" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_2');" <?php if($clist_docs_check[0]['doc_2']=="NO"){ echo "checked";} else { echo "";} ?> />
                                                <label for="optionsRadios4"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <span><a href="JavaScript:void(0);">3- 3 DERNIERS BULLETINS DE PAIE</a></span>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc3" id="optionsRadios5" value="YES"  onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_3');" <?php if($clist_docs_check[0]['doc_3']=="YES"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios5"> YES </label>
                                              </div>
                                              <div class="radio doc_3" style="display:inline-block">
                                                <input type="radio" name="optiondoc3" id="optionsRadios6" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_3');" <?php if($clist_docs_check[0]['doc_3']=="NO"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios6"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <span><a href="JavaScript:void(0);">4- ATTESTATION DE NON ENDETTEMENT</a></span>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc4" id="optionsRadios7" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_4');" <?php if($clist_docs_check[0]['doc_4']=="YES"){ echo "checked";} else { echo "";} ?> >
                                                <label for="optionsRadios7"> YES </label>
                                              </div>
                                              <div class="radio doc_4" style="display:inline-block">
                                                <input type="radio" name="optiondoc4" id="optionsRadios8" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_4');" <?php if($clist_docs_check[0]['doc_4']=="NO"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios8"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <span><a href="JavaScript:void(0);">5- ATTESTATION DE VIREMENT IRREVOCABLE</a></span>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc5" id="optionsRadios9" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_5');" <?php if($clist_docs_check[0]['doc_5']=="YES"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios9"> YES </label>
                                              </div>
                                              <div class="radio doc_5" style="display:inline-block">
                                                <input type="radio" name="optiondoc5" id="optionsRadios10" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_5');" <?php if($clist_docs_check[0]['doc_5']=="NO"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios10"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <a href="JavaScript:void(0);">6- ATTESTATION DE TRAVAIL</a>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc6" id="optionsRadios11" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_6');"  <?php if($clist_docs_check[0]['doc_6']=="YES"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios11">YES</label>
                                              </div>
                                              <div class="radio doc_6" style="display:inline-block">
                                                <input type="radio" name="optiondoc6" id="optionsRadios12" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_6');" <?php if($clist_docs_check[0]['doc_6']=="NO"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios12">NO</label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"><a href="JavaScript:void(0);">7- CERTIFICAT DE DOMICILE OU COPIE FACTURE ENO OU CAMWATER</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc7" id="optionsRadios13" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_7');" <?php if($clist_docs_check[0]['doc_7']=="YES"){ echo "checked";} else { echo "";} ?> />
                                                <label for="optionsRadios13"> YES </label>
                                              </div>
                                              <div class="radio doc_7" style="display:inline-block">
                                                <input type="radio" name="optiondoc7" id="optionsRadios14" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_7');" <?php if($clist_docs_check[0]['doc_7']=="NO"){ echo "checked";} else { echo "";} ?> />
                                                <label for="optionsRadios14"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="JavaScript:void(0);">8- PLAN DE LOCALISATION</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc8" id="optionsRadios15" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_8');" <?php if($clist_docs_check[0]['doc_8']=="YES"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios15"> YES </label>
                                              </div>
                                              <div class="radio doc_8" style="display:inline-block">
                                                <input type="radio" name="optiondoc8" id="optionsRadios16" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_8');" <?php if($clist_docs_check[0]['doc_8']=="NO"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios16"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="JavaScript:void(0);">9- VERIFICATION CIP</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc9" id="optionsRadios17" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_9');" <?php if($clist_docs_check[0]['doc_9']=="YES"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios17"> YES </label>
                                              </div>
                                              <div class="radio doc_9" style="display:inline-block">
                                                <input type="radio" name="optiondoc9" id="optionsRadios18" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_9');" <?php if($clist_docs_check[0]['doc_9']=="NO"){ echo "checked";} else { echo "";} ?> />
                                                <label for="optionsRadios18"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <span><a href="JavaScript:void(0);">10- VERIFICATION CENTRALE DES RISQUES</a></span>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc10" id="optionsRadios19" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_10');" <?php if($clist_docs_check[0]['doc_10']=="YES"){ echo "checked";} else { echo "";} ?> />
                                                <label for="optionsRadios19"> YES </label> 
                                              </div>
                                              <div class="radio doc_10" style="display:inline-block">
                                                <input type="radio" name="optiondoc10" id="optionsRadios20" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_10');" <?php if($clist_docs_check[0]['doc_10']=="NO"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios20"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6">
                                            <span><a href="JavaScript:void(0);">11- ASSURANCE INVALIDITE ET DECES</a></span>
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optiondoc11" id="optionsRadios21" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_11');" <?php if($clist_docs_check[0]['doc_11']=="YES"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios21"> YES </label>
                                              </div>
                                              <div class="radio doc_11" style="display:inline-block">
                                                <input type="radio" name="optiondoc11" id="optionsRadios22" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_11');" <?php if($clist_docs_check[0]['doc_11']=="NO"){ echo "checked";} else { echo "";} ?>>
                                                <label for="optionsRadios22"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>                                                                        
                                    </td>
                                  </tr>
                                </table>
                              </div>
                              <!-- TRACABILITE SUR LE DOSSIER Section -->
                              <div class="tab-pane fade" id="tab-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <section id="cd-timeline" class="cd-container">
                                      <?php $i=1; 
                                      if(!empty($tracking_timeline)){
                                      foreach ($tracking_timeline as $timeline) {
                                        $time_ago=$timeline['created'];
                                       // echo "<pre>", print_r($timeline), "</pre>";

                                        ?>
                                        <div class="cd-timeline-block">
                                          <div class="cd-timeline-img cd-picture">
                                            <?php 
                                               if($timeline['content_type']=='text')
                                               {
                                                echo '<i class="fa fa-file"></i>';
                                                //echo $timeline['content_type'];
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
                                            <h2>STEP <?php echo $i;?></h2>
                                            <span style="font-weight:bold">User: </span>
                                            <span><?php echo $timeline['field_data'];?> (<?php echo $timeline['first_name'] ?: '';?> <?php echo $timeline['last_name'] ?: '';?>) </span>
                                            <p><span style="font-weight:bold">Comment : </span><?php echo $timeline['comment'];?></p>
                                            <span class="cd-date"> <?php echo date('d-m-Y', strtotime($timeline['created'])).':'.timeAgo($time_ago);?>
                                            </span>
                                          </div>
                                        </div>
                                        <?php $i++;} }
                                        else { ?>
                                          <div class="cd-timeline-block">
                                          <div class="cd-timeline-img cd-picture"> <i class="fa fa-file"></i> </div>
                                          <div class="cd-timeline-content">
                                            <h2>STEP 1</h2>
                                            <span style="font-weight:bold">Error: </span><span>No matching records found</span>
                                          </div>
                                        </div>
                                        <?php }
                                        ?>                                      
                                    </section>
                                  </div>
                                </div>
                              </div>
                              <!-- end section -->

                              <div class="tab-pane fade" id="tab-4">
                                <h3 id="tab-title"><span>Risk Analysis</span></h3>
                                <small class="analysismsg"></small>
                                <div class="row">
                                  <div class="col-lg-12">
                                    <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                    <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="analysisfilesloder" style="display:none">
                                      <input id="risk_analysisfiles" type="file" multiple="" name="risk_analysisfiles[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">
                                    </label> 
                                    <?php } ?> 
                                    <?php if(!empty($risk_analysis)){ ?>
                                      <button type="button" class="btn btn-sm btn-default preview" data-toggle="modal" data-target="#AnalysisfilePreviewModal"><i class="fa fa-eye"></i> Preview</button>
                                      <a href="<?php echo base_url('PP_Consumer_Loans/download_analysisfiles/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
                                    <?php } else { ?>
                                      <button type="button" class="btn btn-sm btn-default preview" id="notification_Analysispreview" data-toggle="modal" data-target="#blankmodal"> <i class="fa fa-eye"></i> Preview</button>
                                      
                                      <button type="button" class="btn btn-sm btn-primary download" id="notification_analysis_download" data-toggle="modal" data-target="#blankmodal"><i class="fa fa-cloud-download"></i> Download</button>
                                    <?php }?>
                                  </div>
                                </div>
                                <table class="table table-bordered table-hover" id="table_auto">
                                  <tr id="row_0">
                                    <td><form action="#">
                                        <div class="row">
                                          <div class="col-lg-6"> <span><a href="JavaScript:void(0);">1- CIP verification</a></span>
                                            <!-- <input id="avatar" class="file-loading" type="file" name="image" > --> 
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios001" id="optionsRadios001" value="option001" checked>
                                                <label for="optionsRadios001"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios001" id="optionsRadios002" value="option002">
                                                <label for="optionsRadios002"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">2- Central Risk Verification</a>
                                            <!--<input id="avatar" class="file-loading" type="file" name="image" >  --> 
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios002" id="optionsRadios003" value="option003" checked>
                                                <label for="optionsRadios003"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios002" id="optionsRadios004" value="option004">
                                                <label for="optionsRadios004"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">3- Analysis sheet </a>
                                            <!--<input id="avatar" class="file-loading" type="file" name="image" >  --> 
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios003" id="optionsRadios005" value="option003" checked>
                                                <label for="optionsRadios005"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios003" id="optionsRadios006" value="option004">
                                                <label for="optionsRadios006"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">4- Employer in the TARGET COMPANIES list</a>
                                            <!--<input id="avatar" class="file-loading" type="file" name="image" >  --> 
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios004" id="optionsRadios007" value="option004" checked>
                                                <label for="optionsRadios007"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios004" id="optionsRadios008" value="option004">
                                                <label for="optionsRadios008"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </form>
                                    </td>
                                  </tr>
                                  <tr>
                                      <td><textarea role="18" col="22" class="form-control outputmsgR" style="margin: 0px; width: 788px; height: 185px; display:none;"></textarea>
                                      </td>
                                  </tr>
                                </table>
                                <div class="row">
                                  <div class="col-md-12">
                                    <h3 id="tab-title"><span>For Consumer Loan-Credit & CRESCO-Scholar Loan </span></h3>
                                    <div class="col-md-6">
                                      <div class="table-responsive">
                                        <table class="table table-condensed table-hover">
                                          <thead>
                                            <tr class="info">
                                              <th><span>(Current monthly Credit and Loan Payment)</span></th>
                                              <th><span>Amount</span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <form id="FormCurrentmonthly" method="post">
                                            <tr>
                                              <td> CRESCO</td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="CRESCO" value="<?php echo $riskcurrentmonthlyvrefit[0]['cresco'] ?: '0';?>" name="cresco_current" class="form-control" min="0" required />
                                                <?php } else{ ?> 
                                                  <input type="number" id="CRESCO" value="<?php echo $riskcurrentmonthlyvrefit[0]['cresco'] ?: '0';?>" name="cresco_current" class="form-control" min="0" disabled />
                                                <?php } ?>
                                             </td>
                                            </tr>
                                            <tr>
                                              <td> DECOUVERT </td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="DECOUVERT" value="<?php echo $riskcurrentmonthlyvrefit[0]['decouvert'] ?: '0';?>" name="decouvert_current" class="form-control"min="0" required />
                                                <?php } else{ ?> 
                                                  <input type="number" disabled id="DECOUVERT" value="<?php echo $riskcurrentmonthlyvrefit[0]['decouvert'] ?: '0';?>" name="decouvert_current" class="form-control"min="0" required />
                                                <?php } ?>

                                                
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> CMT</td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="CMT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cmt'] ?: '0';?>" name="cmt_current" class="form-control qty1" min="0" required />
                                                <?php } else{ ?> 
                                                  <input type="number"  id="CMT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cmt'] ?: '0';?>" name="cmt_current" class="qty1 form-control" min="0" disabled />
                                                <?php } ?>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> CCT </td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="CCT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cct'] ?: '0';?>" name="cct_current" class="form-control qty1" min="0" required />
                                                <?php } else{ ?> 
                                                  <input type="number" value="<?php echo $riskcurrentmonthlyvrefit[0]['cct'] ?: '0';?>" name="cct_current" class="form-control qty1" min="0" disabled /> 
                                                <?php } ?>

                                                
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> TOTAL </td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="text" id="Ttotal" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '0';?>" name="total_clc" class="form-control" min="0" required readonly/>
                                                   <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right riskcurrentmonthloder" style="position:relative;top: -25px;left:-3px; display: none;">
                                                <?php } else{ ?> 
                                                  <input type="text" id="Ttotal" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '0';?>" name="total_clc" class="form-control" min="0" disabled readonly/>
                                                 
                                                <?php } ?>                                            
                                             </td>
                                            </tr>                     
                                             <tr>                                              
                                              <td colspan=2>
                                                <input type="hidden" id="Rcl_aid" value="<?php echo $appformD[0]['cl_aid'] ;?>" name="cl_aid" class="form-control"/>
                                                <input type="hidden" id="Rcustomar_id" value="<?php echo $appformD[0]['customar_id'] ;?>" name="customar_id" class="form-control"/>
                                                <input type="hidden" id="Rloan_type" value="<?php echo $appformD[0]['loan_type'] ;?>" name="loan_type" class="form-control"/>
                                                <textarea class="showajaxrequest form-control" rows="10" style="display:none;" ></textarea>
                                                </td>
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
                                              <th><span>Monthly Payment on New Credit</span></th>
                                              <th><span>Amount</span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <form id="FormMonthlyNew" method="post">
                                              <tr>
                                                <td> CRESCO </td>
                                                <td>
                                                  <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="cresco_monthly" value="<?php echo $riskpaymentnewloan[0]['cresco'] ?: '0';?>" name="cresco_monthly" class="form-control " min="0" required />
                                                  <?php } else{ ?> 
                                                  <input type="number" id="cresco_monthly" value="<?php echo $riskpaymentnewloan[0]['cresco'] ?: '0';?>" name="cresco_monthly" class="form-control " min="0"  disabled readonly/>
                                                <?php } ?>
                                                </td>
                                              </tr>
                                              <tr>
                                                <td> DECOUVERT</td>
                                                <td>
                                                  <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="decouvert_monthly" value="<?php echo $riskpaymentnewloan[0]['decouvert'] ?: '0';?>" name="decouvert_monthly" class="form-control" min="0" required />
                                                  <?php } else{ ?> 
                                                  <input type="number" id="decouvert_monthly" value="<?php echo $riskpaymentnewloan[0]['decouvert'] ?: '0';?>" name="decouvert_monthly" class="form-control" min="0" disabled readonly/>
                                                <?php } ?>
                                                  
                                                </td>
                                              </tr>
                                              <tr>
                                                <td> CMT </td>
                                                <td>
                                                  <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="cmt_monthly" value="<?php echo $riskpaymentnewloan[0]['cmt'] ?: $appformD[0]['pmnt'];?>" name="cmt_monthly" class="form-control qty2" min="0" required />
                                                  <?php } else{ ?> 
                                                  <input type="number" id="cmt_monthly" value="<?php echo $riskpaymentnewloan[0]['cmt'] ?: $appformD[0]['pmnt'];?>" name="cmt_monthly" class="form-control qty2" min="0"  disabled readonly/>
                                                <?php } ?>
                                                  
                                                </td>
                                              </tr>
                                              <tr>
                                                <td> CCT </td>
                                                <td>
                                                  <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="cct_monthly" value="<?php echo $riskpaymentnewloan[0]['cct'] ?: '0';?>" name="cct_monthly" class="form-control qty2" min="0" required />
                                                  <?php } else{ ?> 
                                                  <input type="number" id="cct_monthly" value="<?php echo $riskpaymentnewloan[0]['cct'] ?: '0';?>" name="cct_monthly" class="form-control qty2" min="0" disabled readonly />
                                                <?php } ?>
                                                  
                                                </td>
                                              </tr>
                                              <tr>
                                                <td> TOTAL </td>
                                                <td>
                                                  <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                    <input type="text" id="total_mlc" value="<?php echo $riskpaymentnewloan[0]['total_mlc'] ?: $appformD[0]['pmnt'];?>" name="total_mlc" class="form-control" min="0" required readonly/>
                                                    <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right risknewmonthloder" style="position:relative;top: -25px;left:-3px; display: none;">
                                                  <?php } else{ ?> 
                                                    <input type="text" id="total_mlc" value="<?php echo $riskpaymentnewloan[0]['total_mlc'] ?: $appformD[0]['pmnt'];?>" name="total_mlc" class="form-control" min="0" disabled readonly />
                                                  <?php } ?>
                                                  
                                                </td>
                                              </tr>                     
                                              <tr>                                              
                                                <td colspan=2>
                                                <input type="hidden"  value="<?php echo $appformD[0]['cl_aid'] ;?>" name="rcapid" class="form-control"/>
                                                <input type="hidden"  value="<?php echo $appformD[0]['customar_id'] ;?>" name="rcustomarid" class="form-control"/>
                                                <input type="hidden" value="<?php echo $appformD[0]['loan_type'] ;?>" name="loan_type" class="form-control"/>
                                                <textarea class="showajaxrequestnew form-control" rows="10" style="display:none;" ></textarea>
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
                                    <h3 id="tab-title"><span>FINANCIAL SITUATION </span></h3>
                                    <div class="col-md-6">
                                      <div class="table-responsive">
                                       <form id="Formfinancial_situation" method="post">
                                        <table class="table table-condensed table-hover">
                                          <thead>
                                            <tr class="info">
                                              <th><span>FINANCIAL SITUATION</span></th>
                                              <th><span>Montant</span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td> NET Salary </td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                    <input type="number" id="net_salary" value="<?php echo $riskfsituation[0]['net_salary'] ?: '0';?>" name="net_salary" class="form-control qty3" min="0" required>
                                                  <?php } else{ ?> 
                                                    <input type="number" id="net_salary" value="<?php echo $riskfsituation[0]['net_salary'] ?: '0';?>" name="net_salary" class="form-control qty3" min="0" disabled readonly />
                                                  <?php } ?>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> Applicable Loan/Income Ratio </td>
                                              <td>
                                                <div class="input-group">
                                                  <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                    <input type="number" id="income_ratio" value="<?php echo $riskfsituation[0]['income_ratio'] ?: '0';?>" name="income_ratio" class="form-control qty3" min="0">
                                                  <?php } else{ ?> 
                                                    <input type="number" id="income_ratio" value="<?php echo $riskfsituation[0]['income_ratio'] ?: '0';?>" name="income_ratio" class="form-control qty3" min="0" disabled readonly />
                                                  <?php } ?>
                                                  
                                                  <span class="input-group-addon">%</span>
                                                </div>                      
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> Quotit??cessible </td>
                                              <td>
                                                 <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                    <input type="number" id="quotitecessible" value="<?php echo $riskfsituation[0]['quotitecessible'] ?: '0';?>" name="quotitecessible" class="form-control qty3" min="0" required />
                                                  <?php } else{ ?> 
                                                    <input type="number" id="quotitecessible" value="<?php echo $riskfsituation[0]['quotitecessible'] ?: '0';?>" name="quotitecessible" class="form-control qty3" min="0"  disabled readonly />
                                                  <?php } ?>
                                                
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> Current Monthly Payments </td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                    <input type="text" id="current_monthly_payments" value="<?php echo $riskfsituation[0]['current_monthly_payments'] ?: '0';?>" name="current_monthly_payments" class="form-control qty3" min="0" readonly />
                                                  <?php } else{ ?> 
                                                    <input type="text" id="current_monthly_payments" value="<?php echo $riskfsituation[0]['current_monthly_payments'] ?: '0';?>" name="current_monthly_payments" class="form-control qty3" min="0" disabled readonly />
                                                  <?php } ?>
                                                
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> New Monthly Payment </td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="new_monthly_payment" value="<?php echo $riskfsituation[0]['new_monthly_payment'] ?: '0';?>" name="new_monthly_payment" class="form-control qty3" min="0" required />
                                                <?php } else{ ?> 
                                                  <input type="number" id="new_monthly_payment" value="<?php echo $riskfsituation[0]['new_monthly_payment'] ?: '0';?>" name="new_monthly_payment" class="form-control qty3" min="0" disabled readonly />
                                                <?php } ?>
                                              </td>
                                            </tr>
                                            <tr style="background:yellow">
                                              <td> Total </td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="situation_total" value="<?php echo $riskfsituation[0]['situation_total'] ?: '0';?>" name="situation_total" class="form-control qty3" min="0" required>
                                                <?php } else{ ?> 
                                                  <input type="number" id="situation_total" value="<?php echo $riskfsituation[0]['situation_total'] ?: '0';?>" name="situation_total" class="form-control qty3" min="0" disabled readonly />
                                                <?php } ?>
                                                
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> New Loan/Income Ratio After Project </td>
                                              <td>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="number" id="income_ratio_after" value="<?php echo $riskfsituation[0]['income_ratio_after'] ?: '0';?>" name="income_ratio_after" class="form-control qty3" min="0" required />
                                                <?php } else{ ?> 
                                                  <input type="number" id="income_ratio_after" value="<?php echo $riskfsituation[0]['income_ratio_after'] ?: '0';?>" name="income_ratio_after" class="form-control qty3" min="0"  disabled readonly />
                                                <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                              <td style="color:green"> 
                                              <!-- Coeficientendettement (Debt Ratio) -->
                                              Ratio Debt
                                               </td>
                                              <td>
                                                <div class="input-group">
                                                  <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                  <input type="text" id="coeficientendettement" value="<?php echo $riskfsituation[0]['coeficientendettement'] ?: '0';?>" name="coeficientendettement" class="form-control qty3" min="0" required readonly />
                                                <?php } else{ ?> 
                                                  <input type="text" id="coeficientendettement" value="<?php echo $riskfsituation[0]['coeficientendettement'] ?: '0';?>" name="coeficientendettement" class="form-control qty3" min="0" disabled readonly />
                                                <?php } ?>
                                                  
                                                  <span class="input-group-addon">%</span>
                                                </div>  
                                                <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right risksituationloder" style="position:relative;top: -25px;left:-3px; display: none;">
                                              </td>
                                            </tr>
                                            <tr>
                                              <td>
                                                 <input type="hidden"  value="<?php echo $appformD[0]['cl_aid'] ;?>" name="cl_aid" class="form-control"/>
                                                 <input type="hidden"  value="<?php echo $appformD[0]['customar_id'] ;?>" name="customer_id" class="form-control"/>
                                                 <input type="hidden" value="<?php echo $appformD[0]['loan_type'] ;?>" name="loan_type" class="form-control"/>
                                                 <textarea class="showajaxrequestnewfs form-control" rows="10" style="display:none;" ></textarea>
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
                                              <th><span>Applicable Loan/Income</span></th>
                                              <th><span>Ratio</span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><?php echo $applicableloanratio[0]['terms'] ?: 'QUOTITE SALAIRE < 500000 F CFA';?></td>
                                              <td>
                                                <div class="input-group">
                                                  <input type="text" id="get_quotitesalaire" value="<?php echo $applicableloanratio[0]['ratio'] ?: '33';?>" name="get_quotitesalaire" class="form-control" min="0" required readonly >
                                                  <span class="input-group-addon">%</span>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> <?php echo $applicableloanratio[1]['terms'] ?: 'QUOTITE SALAIRE >500 000 F CFA';?> </td>
                                              <td>
                                                <div class="input-group">
                                                  <input type="text" id="get_quotitesalaireup" value="<?php echo $applicableloanratio[1]['ratio'] ?: '40';?>" name="get_quotitesalaireup" class="form-control" min="0" required readonly >
                                                  <span class="input-group-addon">%</span>
                                                </div>
                                              </td>
                                            </tr>
                                            <tr>
                                              <td> <?php echo $applicableloanratio[2]['terms'] ?: 'QUOTITE CLIENT AVEC CRESCO EN COURS';?></td>
                                              <td>
                                                <div class="input-group">
                                                  <input type="text" id="get_quotitesalairemore" value="<?php echo $applicableloanratio[2]['ratio'] ?: '50';?>" name="get_quotitesalairemore" class="form-control" min="0" required readonly >
                                                  <span class="input-group-addon">%</span>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                </div>                                
                              </div>
                              <div class="tab-pane fade" id="tab-5">
                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="table-responsive">
                                      <table class="table table-condensed table-hover">
                                          <thead>
                                            <tr class="info">
                                              <th></th>
                                              <th><span>DOCUMENTATION & TYPES GARANTIES DE CREDIT EXIGEES POUR LE PR??T</span></th>
                                              <th><span>Oui</span></th>
                                              <th><span>Non</span></th>
                                            </tr>
                                          </thead>
                                        <tbody>
                                          <tr>
                                            <td>1</td>
                                            <td>DEMANDE DU CLIENT AVEC ?? SIGNATURE VERIFIEE ?? + BULLETIN DE PAIE + CNI VALIDE </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio1" id="CAD_radio1" value="CAD_radio1" checked />
                                                  <label for="CAD_radio1">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio1" id="CAD_radio2" value="CAD_radio2">
                                                  <label for="CAD_radio2">NO</label>
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
                                                  <input type="radio" name="CAD_radio2" id="CAD_radio3" value="CAD_radio3" checked>
                                                  <label for="CAD_radio3">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio2" id="CAD_radio4" value="CAD_radio4">
                                                  <label for="CAD_radio4">NO</label>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>3</td>
                                            <td>CONVENTION DE PRET ENTRE M. DABOLE DANIELET LA BANQUE SUR LE MONTANT DE L???ENGAGEMENT.</td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio3" id="CAD_radio5" value="CAD_radio5" checked>
                                                  <label for="CAD_radio5">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio3" id="CAD_radio6" value="CAD_radio6">
                                                  <label for="CAD_radio6">NO</label>
                                                </div>
                                              </div>
                                            </td>
                                          </tr>
                                          <tr>
                                            <td>4</td>
                                            <td>ASSURANCE INVALIDITE DECES SUR LE CLIENT</td><td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio4" id="CAD_radio7" value="CAD_radio7" checked>
                                                  <label for="CAD_radio7">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio4" id="CAD_radio8" value="CAD_radio8">
                                                  <label for="CAD_radio8">NO</label>
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
                                                  <input type="radio" name="CAD_radio5" id="CAD_radio9" value="CAD_radio9" checked>
                                                  <label for="CAD_radio9">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio5" id="CAD_radio10" value="CAD_radio10">
                                                  <label for="CAD_radio10">NO</label>
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
                                                  <input type="radio" name="CAD_radio6" id="CAD_radio11" value="CAD_radio11" checked>
                                                  <label for="CAD_radio11">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio6" id="CAD_radio12" value="CAD_radio12">
                                                  <label for="CAD_radio12">NO</label>
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
                                                  <input type="radio" name="CAD_radio7" id="CAD_radio13" value="CAD_radio13" checked>
                                                  <label for="CAD_radio13">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio7" id="CAD_radio14" value="CAD_radio14">
                                                  <label for="CAD_radio14">NO</label>
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
                                                  <input type="radio" name="CAD_radio8" id="CAD_radio15" value="CAD_radio15" checked>
                                                  <label for="CAD_radio15">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio8" id="CAD_radio16" value="CAD_radio16">
                                                  <label for="CAD_radio16">NO</label>
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
                                                  <input type="radio" name="CAD_radio9" id="CAD_radio17" value="CAD_radio17" checked>
                                                  <label for="CAD_radio17">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio9" id="CAD_radio18" value="CAD_radio18">
                                                  <label for="CAD_radio18">NO</label>
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
                                                  <input type="radio" name="CAD_radio10" id="CAD_radio19" value="CAD_radio19" checked>
                                                  <label for="CAD_radio19">YES</label>
                                                </div>
                                              </div>
                                            </td>
                                            <td>
                                              <div class="form-group">
                                                <div class="radio" style="display:inline-block">
                                                  <input type="radio" name="CAD_radio10" id="CAD_radio20" value="CAD_radio20">
                                                  <label for="CAD_radio20">NO</label>
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
                                      <select class="form-control" onchange="select_cad_decision()" id="cad_decision_split" disabled >
                                        <option value="demande_de_retraitement" id="demande_de_retraitement">Demande de retraitement</option>
                                        <option value="avis_favorable" id="avis_favorable">Avis favorable</option> 
                                      </select>
                                    </div>
                                    </div>
                                    <div class="col-md-12" style="margin-top:5px;">
                                    <div class="form-group">
                                      <label class="col-md-4" style="padding-left:0px;">ZONE DE COMMENTAIRE </label>
                                      <input class="col-md-4" type="text" id="" name="" value="" placeholder="" disabled/>
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
                                          <td>Montant de la ligne de d??couvert</td>
                                          <td><input type="text" id="" value="60" name="" readonly style="background: yellow;"></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Date de Valeur/Date de D??blocage</td>
                                          <td>
                                            <input type="text" id="" value="70" name="" readonly style="background: yellow;">
                                          </td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Date 1??re??ch??ance</td>
                                          <td><input type="text" id="" value="" name=""></td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Date derni??re ??ch??ance</td>
                                          <td>
                                            <input type="text" id="" value="" name="">
                                          </td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Dur??e du pr??t</td>
                                          <td>
                                            <input type="text" id="" value="" name="">
                                          </td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>Nombre ??ch??ances</td>
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
                                          <td>Type de Diff??r?? (P/T/-)</td>
                                          <td>
                                            <input type="text" id="" value="" name="">
                                          </td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>P??riodicit?? de remboursement</td>
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
                                  <h3 id="tab-title"><span>2-Pr??l??vement  les frais d???assurance</span></h3>  
                                  <div class="table-responsive">
                                    <table class="table table-condensed table-hover">
                                      <thead>
                                        <tr class="info">
                                          <th>Compte</th>
                                          <th><span>Libell??</span></th>
                                          <th><span>Mtt FCFA</span></th>
                                          <th><span>Sens</span></th>
                                          <th><span>R??f??rence</span></th>
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
                                  <h3 id="tab-title"><span>3-Pr??l??vement les frais d???adh??sion au fonds de garantie</span></h3>
                                  <div class="table-responsive">
                                    <table class="table table-condensed table-hover">
                                      <thead>
                                        <tr class="info">
                                          <th>Compte</th>
                                          <th><span>Libell??</span></th>
                                          <th><span>Mtt FCFA</span></th>
                                          <th><span>Sens</span></th>
                                          <th><span>R??f??rence</span></th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <input type="text" id="" value="100" name="" readonly style="background: yellow;">
                                          </td>
                                          <td>
                                            <input type="text" id="" value="" name="">
                                          </td>
                                          <td>
                                            <input type="text" id="" value="" name="">
                                          </td>
                                          <td>D</td>
                                          <td></td>
                                        </tr>
                                        <tr>
                                          <td>
                                            <input type="text" id="" value="" name="">
                                          </td>
                                          <td>
                                            <input type="text" id="" value="" name="">
                                          </td>
                                          <td>
                                            <input type="text" id="" value="" name="">
                                          </td>
                                          <td>C</td>
                                          <td></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                              

                              <div class="tab-pane fade" id="tab-6">

                                <div class="row">

                                  <div class="col-md-12">

                                    <div class="col-md-4">

                                      <div class="form-group">

                                        <label>Please Select From Below</label>

                                        <select class="form-control" onChange="select_interaction_split()" id="interaction_split">

                                          <option value="Email" id="Email">Email</option>

                                          <option value="SMS" id="SMS">SMS</option>

                                          <option value="EntretienT??l??phonique" id="EntretienT??l??phonique">Entretien T??l??phonique</option>

                                        </select>

                                      </div>

                                    </div>

                                  </div>

                                </div>



                                <div class="Email" style="display:block">

                                  <div class="row">
                                    <form id="customSendmail1" method="post" enctype="multipart/form-data">
                                      <div class="col-md-12">
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <div class="input-group" style="width:100%">
                                              <label>Nom et Pr??noms</label>
                                              <input type="text" class="form-control" id="field_name" name="field_name" placeholder="Enter Nom et Pr??noms" value="" required >
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <div class="input-group" style="width:100%">
                                              <label>Email</label>
                                              <input class="form-control" id="fieldemail" name="fieldemail" value="" placeholder="Enter Email" required>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <div class="input-group" style="width:100%">
                                              <label>Subject</label>
                                              <input type="text" class="form-control" id="fieldsubject" name="fieldsubject" value="" placeholder="Enter Subject" required>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-group">
                                            <label>Message</label>
                                            <div class="input-group" style="width:100%">
                                              <textarea type="text" class="form-control" id="fieldmsg" name="fieldmsg" placeholder="Enter Message" required></textarea>
                                            </div>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="col-md-12 ">

                                        <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">
                                          <input type="hidden" name="cl_aid" value="<?php echo $appformD[0]['cl_aid'];?>" >
                                          <input type="hidden" name="customar_id" value="<?php echo $appformD[0]['customar_id'];?>" >
                                          <button type="button" id="button_3" class="btn btn-primary pull-right sendEmail">ENVOYER</button>

                                          <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right callloder" style="position:relative;top: 9px;left:-13px; display: none;"> </div>

                                      </div>
                                    </form>
                                  </div>
                                  <div class="getdataajax"></div>
                                  <div class="col-lg-12">
                                    <div class="scrollable" style="">
                                      <div class="table-responsive">
                                        <table id="table-example" class="table table-striped table-hover">
                                          <thead>
                                            <tr class="success">
                                              <th><span>Mode</span></th>
                                              <th><span>Nom et Pr??noms</span></th>
                                              <th><span>Email</span></th>
                                              <th><span>Subject</span></th>
                                              <th><span>Message</span></th>
                                              <th><span>Status</span></th>
                                              <th><span>Created</span></th>
                                            </tr>

                                          </thead>

                                          <tbody>

                                            <?php

                                              if(!empty($int_email)){

                                              foreach ($int_email as $keys ) {

                                              if($keys['mode']=='Email'){

                                                  $key=json_decode($keys['mailcontent']);

                                                  echo "<tr>";

                                                      echo "<td>Email</td>";

                                                      echo "<td>".$key[0]->field_name."</td>";

                                                      echo "<td>".$key[0]->fieldemail."</td>";

                                                      echo "<td>".$key[0]->fieldsubject."</td>";

                                                      echo "<td>".$key[0]->fieldmsg."</td>";

                                                      echo "<td>";

                                                      if($keys['status']==1){

                                                         echo "<span class=\"label label-success\">Success</span>"; 

                                                     }else{

                                                       echo "<span class=\"label label-danger\">failed</span>";

                                                     }                           

                                                      echo "</td>";

                                                      echo "<td>".date("Y-m-d h:i", strtotime($keys['created']))."</td>";

                                                   echo "</tr>";

                                                  }

                                                  }

                                              }

                                              ?>

                                          </tbody>

                                        </table>

                                      </div>

                                    </div>

                                  </div>

                                </div>

                                <div class="SMS" style="display:none">

                                  <div class="row">

                                    <div class="col-md-12">

                                      <div class="col-md-6">

                                        <div class="form-group">

                                          <div class="input-group" style="width:100%">

                                            <label>T??l??phone</label>

                                            <input type="text" class="form-control" id="account_no" placeholder="Enter T??l??phone">

                                          </div>

                                        </div>

                                      </div>

                                      <div class="col-md-6">

                                        <div class="form-group">

                                          <div class="input-group" style="width:100%">

                                            <label>Commentaire</label>

                                            <input class="form-control" id="account_no" placeholder="Enter Commentaire">

                                          </div>

                                        </div>

                                      </div>

                                    </div>

                                    <div class="col-md-12">

                                      <div class="clearfix" style="margin-top:10px;margin-bottom:10px;"> <a class="btn btn-primary pull-right">ENVOYER</a> </div>

                                    </div>

                                  </div>

                                </div>

                                <div class="EntretienT??l??phonique" style="display:none">

                                  <div class="row">

                                    <div class="col-md-12">

                                      <div class="col-md-12">

                                        <div class="form-group">

                                          <div class="input-group" style="width:100%">

                                            <label>Commentaire</label>

                                            <input type="text" class="form-control" id="account_no" placeholder="Enter Commentaire">

                                          </div>

                                        </div>

                                      </div>

                                    </div>

                                    <div class="col-md-12">

                                      <div class="clearfix" style="margin-top:10px;margin-bottom:10px;"> <a class="btn btn-primary pull-right">ENVOYER</a> </div>

                                    </div>

                                  </div>

                                </div>

                              </div>

                              <div class="tab-pane fade" id="tab-7">

                                <div style="text-align:center">----</div>

                              </div>

                              <!-- Start Loan Information edit section -->

                              <div class="tab-pane fade" id="tab-8">
                                <h3 id="tab-title"><span>INFORMATIONS SUR LE PRET </span></h3>
                                <form id="loanEditForm" action="#"  method="post">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>NATURE DU PRET</label>
                                        <input type="text" class="form-control" value="<?php echo $appformD[0]['ltype'];?>" readonly disabled>
                                        <input type="hidden" id="loan_type" name="loan_type" value="<?php echo $appformD[0]['loan_type'];?>" readonly >
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>MONTANT DU PRET</label>
                                        <div class="input-group"> <span class="input-group-addon">CFA</span>
                                          <input type="number" class="form-control" id="loan_amt" name="loan_amt" autocomplete="off" value="<?php echo $appformD[0]['loan_amt'];?>" min="0" required>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>TAUX INTERET</label>
                                        <div class="input-group">
                                          <input type="number" class="form-control" id="loan_interest" name="loan_interest" autocomplete="off" value="<?php echo $appformD[0]['loan_interest'];?>" required min="2">
                                          <span class="input-group-addon">%</span> </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>DUREE</label>
                                        <input type="number" class="form-control" id="loan_term" name="loan_term" autocomplete="off" value="<?php echo $appformD[0]['loan_term'];?>" required min="0" >
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>PERIODICITE DE REMBOURSEMENT</label>
                                        <?php
                                          $products = array("Monthly", "Quarterly", "Half Yearly", "Yearly");
                                          ?>
                                              <select class="form-control" name="loan_schedule" id="loan_schedule" required>
                                                <?php foreach($products as $item){
                                              if(trim($appformD[0]['loan_schedule']) == $item){ $select="selected";}else{$select="";}
                                              echo  '<option value="'.$item.'" '.$select.'>'.$item.'</option>';
                                          }?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>TAUX FOND DE GARANTIE</label>
                                        <input type="number" class="form-control" id="loan_guarantee" name="loan_guarantee" autocomplete="off" value="<?php echo $appformD[0]['loan_guarantee'];?>" required min="0" >
                                      </div>
                                    </div>
                                    <div class="col-md-3" style="display: none;">
                                      <div class="form-group">
                                        <label>Fees</label>
                                        <input type="text" class="form-control" id="loan_fee" name="loan_fee" autocomplete="off" value="<?php echo $appformD[0]['loan_fee'];?>" required readonly>
                                      </div>
                                    </div>

                                    <div class="col-md-3" style="display: none;">
                                      <div class="form-group">
                                        <label>Taxes</label>
                                        <select class="form-control" name="loan_tax" id="loan_tax" required>
                                          <?php  foreach($loantax as $tax){
                                              if($appformD[0]['loan_tax']==$tax['tid']){ $select="selected";}else{$select="";}
                                              echo '<option value="'.$tax['tid'].'" '.$select.'>'.$tax['tax_type'].'</option>';
                                          }?>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="col-md-3" style="display: none;">
                                      <div class="form-group">
                                        <label>Commission</label>
                                        <input type="text" class="form-control" id="loan_commission" name="loan_commission" autocomplete="off" value="<?php echo $appformD[0]['loan_commission'];?>" readonly>
                                      </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">
                                        <input type="hidden"  id="editid" name="editid"  value="<?php echo $appformD[0]['cl_aid'];?>" readonly>
                                        <input type="hidden"  id="ecustomar_id" name="ecustomar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>
                                        <button type="button" id="button_1" class="btn btn-primary pull-right">SAVE DETAILS</button>
                                        <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right calculatorloder" style="position:relative;top: 9px;left:-13px; display: none;">
                                      </div>
                                    </div>
                                  </div>
                                </form>
                                <div class="editloanmsg"></div>
                              </div>
                              <textarea class="editjson form-control" rows="10" style="display:none;" ></textarea>

                              <!-- End Loan Information edit section -->

                             <div class="tab-pane fade" id="tab-9">
                              <div class="col-md-12" >
                               <small class="Outputmsgtab9"></small>                               
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label>Please Select From Below</label>
                                    <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                    <select class="form-control" onChange="select_collateral()" id="collateral_split" name="selected_field">                    
                                    <option value="V??hicule" id="V??hicule">V??hicule</option>
                                    <option value="D??posit" id="D??posit">D??posit</option>
                                    <option value="Maison" id="Maison">Maison</option>
                                    <option value="Excemption" id="Excemption">Excemption</option>
                                    </select>
                                    <?php } else {?>
                                      <select class="form-control" id="" name="selected_field" readonly disabled>
                                        <option value="V??hicule" id="V??hicule">V??hicule</option>
                                    </select>
                                    <?php } ?>
                                  </div>
                                </div>
                                <div class="col-md-12" >
                                  <div style="display:block" class="V??hicule">
                                    <div class="col-xs-12">
                                      <div class="col-md-12" >                    
                                      <form id="collateralformvehicule" name="uploadImages" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                                        <div id="field" style="margin-left: -22px;">
                                          <div id="field1">
                                            <!-- Text input-->
                                            <div class="row" style="margin:10px 0 0 0;">
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                <label>Type </label>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                                                <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Type', 'id' => 'vehicule_type', 'autocomplete'=>'off'));?>
                                                <?php } else {?>
                                                  <?php echo form_input('vehicule_marque', '', array('class' => 'form-control', 'placeholder' => 'Enter Marque', 'id' => 'vehicule_marque', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
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
                                                  <?php echo form_input('vehicule_marque', '', array('class' => 'form-control', 'placeholder' => 'Enter Marque', 'id' => 'vehicule_marque', 'autocomplete'=>'off','disabled'=>'disabled'));?>
                                                <?php } ?>
                                                </div>
                                              </div>                  
                                              <!-- File Button --> 
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                 <label> Mod??le </label>
                                                  <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                                                    ?>
                                                 <?php echo form_input('vehicule_modele', '', array('class' => 'form-control', 'placeholder' => 'Enter Mod??le', 'id' => 'vehicule_modele', 'autocomplete'=>'off'));?>
                                                 <?php } else {?>
                                                  <?php echo form_input('vehicule_modele', '', array('class' => 'form-control', 'placeholder' => 'Enter Mod??le', 'id' => 'vehicule_modele', 'autocomplete'=>'off' ,'disabled'=>'disabled'));?>
                                                <?php } ?>
                                                </div>
                                              </div>
                                              <!-- File Button --> 
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                <label>Carte Grise</label>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                                                    ?>
                                                     <?php echo form_input('vehicule_carte_grise', '', array('class' => 'form-control', 'placeholder' => 'Enter Carte Grise', 'id' => 'vehicule_carte_grise', 'autocomplete'=>'off'));?>

                                                    <?php } else {?>
                                                      <?php echo form_input('vehicule_carte_grise', '', array('class' => 'form-control', 'placeholder' => 'Enter Carte Grise', 'id' => 'vehicule_carte_grise', 'autocomplete'=>'off' ,'disabled'=>'disabled'));?>
                                                  
                                                    <?php } ?>
                                                </div>
                                              </div>
                                            </div>                  
                                            <div class="row" style="margin:10px 0 0 0;">
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                <label>Style </label>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                                                    ?>
                                                <?php echo form_input('vehicule_style', '', array('class' => 'form-control', 'placeholder' => 'Enter Style', 'id' => 'vehicule_style', 'autocomplete'=>'off'));?>

                                                <?php } else {?>
                                                      <?php echo form_input('vehicule_carte_grise', '', array('class' => 'form-control', 'placeholder' => 'Enter Style', 'id' => 'vehicule_carte_grise', 'autocomplete'=>'off' ,'disabled'=>'disabled'));?>
                                                  
                                                    <?php } ?>
                                                </div>
                                              </div>                  
                                              <!-- Text input-->
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                <label>Ann??e </label>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                                                    ?>
                                                <?php echo form_input('vehicule_annee', '', array('class' => 'form-control', 'placeholder' => 'Enter Ann??e', 'id' => 'vehicule_annee', 'autocomplete'=>'off'));?>

                                                <?php } else {?>
                                                      <?php echo form_input('vehicule_carte_grise', '', array('class' => 'form-control', 'placeholder' => 'Enter Ann??e', 'id' => 'vehicule_carte_grise', 'autocomplete'=>'off' ,'disabled'=>'disabled'));?>
                                                  
                                                    <?php } ?>

                                                </div>
                                              </div>                  
                                              <!-- File Button --> 
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                <label> Kilom??trage </label>
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                                                    ?>
                                                <?php echo form_input('vehicule_kilometrage', '', array('class' => 'form-control', 'placeholder' => 'Enter Kilom??trage', 'id' => 'vehicule_kilometrage', 'autocomplete'=>'off'));?>
                                                <?php } else {?>
                                                      <?php echo form_input('vehicule_carte_grise', '', array('class' => 'form-control', 'placeholder' => 'Enter Kilom??trage', 'id' => 'vehicule_carte_grise', 'autocomplete'=>'off' ,'disabled'=>'disabled'));?>
                                                  
                                                    <?php } ?>
                                                </div>
                                              </div>
                                              <!-- File Button --> 
                                              <div class="col-md-3">
                                                <div class="form-group">
                                                 <label>Commentaire</label>
                                                 <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                                                    ?>

                                                 <?php echo form_input('vehicule_commentaire', '', array('class' => 'form-control', 'placeholder' => 'Enter Commentaire', 'id' => 'vehicule_commentaire', 'autocomplete'=>'off'));?>

                                                 <?php } else {?>
                                                      <?php echo form_input('vehicule_carte_grise', '', array('class' => 'form-control', 'placeholder' => 'Enter Commentaire', 'id' => 'vehicule_carte_grise', 'autocomplete'=>'off' ,'disabled'=>'disabled'));?>
                                                  
                                                    <?php } ?>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="row" style="margin:10px 0 0 0;">
                                              <div class="col-md-3">
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                                                    ?>
                                                <div class="form-group">
                                                 <span style="display:block">
                                                  <?php if($appformD[0]['check_vehicule']!=1){
                                                    $disabledStatus="disabled='disabled'";
                                                    $checkedY="";
                                                    $checkedN="checked='checked'";
                                                  }else{
                                                    $disabledStatus="";
                                                    $checkedN="";
                                                    $checkedY="checked='checked'";
                                                  }
                                                  ?>
                                                  <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="vehiculeloder" style="display:none">
                                                    <input id="vehicule_uploadfile" class="file-upload" type="file" multiple="" name="vehicule_uploadfile[]" accept="application/msword,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*" <?php echo $disabledStatus;?> />
                                                  </label>
                                                </span>
                                                </div>
                                                <?php } else {?>
                                                  <div class="form-group">
                                                    <span style="display:block">
                                                  <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload 
                                                      <input class="file-upload" type="file" disabled />
                                                  </label>
                                                </span>
                                                </div>
                                                    <?php } ?>
                                              </div>

                                              <div class="col-md-3">
                                                <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                                                    ?>
                                                <div class="form-group">
                                                  <div class="radio" style="display:inline-block">
                                                    <input type="radio" name="optionsRadios0001" id="optionsRadios0001" class="check_options" value="1" <?php echo $checkedY;?> />
                                                    <label for="optionsRadios0001"> YES </label>
                                                  </div>
                                                  <div class="radio" style="display:inline-block">
                                                    <input type="radio" name="optionsRadios0001" id="optionsRadios0002" class="check_options2" value="0" <?php echo $checkedN;?> >
                                                    <label for="optionsRadios0002"> NO </label>
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
                                        <div class="getdataajaxvehicule"></div>
                                      </div>                                  
                                      <textarea row="20" cols="10" class="form-control postprevievehicule" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
                                      <br />
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-12" >
                                  <div style="display:none" class="D??posit">
                                    <div class="col-xs-12">                                  
                                      <div class="col-md-12" >
                                        <form id="collateralformdeposit" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                                          <div id="fielddeposit" style="margin-left: -22px;">
                                            <div id="fielddeposit1">
                                              <!-- Text input-->
                                              <div class="row" style="margin:10px 0 0 0;">
                                                <div class="col-md-3">
                                                  <div class="form-group">
                                                  <label>Num??ro de compte </label>
                                                  <?php echo form_input('d_numero_de_compte', '', array('class' => 'form-control', 'placeholder' => 'Enter Num??ro de compte', 'id' => 'd_numero_de_compte', 'autocomplete'=>'off'));?>
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
                                                    $disabledStatusd="disabled='disabled'";
                                                    $checkedYd="";
                                                    $checkedNd="checked='checked'";
                                                  }else{
                                                    $disabledStatusd="";
                                                    $checkedNd="";
                                                    $checkedYd="checked='checked'";
                                                  }
                                                  ?>                      
                                              <div class="row" style="margin:10px 0 0 0;">
                                                <div class="col-md-3 col-sm-12">
                                                  <div class="form-group">
                                                    <span style="display:block">
                                                      <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="depositloder" style="display:none">
                                                      <input id="deposit_files" type="file" multiple="" name="deposit_files[]" accept="application/msword,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*" <?php echo $disabledStatusd;?> >
                                                    </label>
                                                    </span>
                                                  </div>
                                                </div>

                                                <div class="col-md-3 col-sm-12">
                                                  <div class="form-group">
                                                    <div class="radio" style="display:inline-block">
                                                      <input type="radio" name="optionsRadios0003" id="optionsRadios0003" class="check_options3" value="1" <?php echo $checkedYd;?> />
                                                      <label for="optionsRadios0003"> YES </label>
                                                    </div>
                                                    <div class="radio" style="display:inline-block">
                                                      <input type="radio" name="optionsRadios0003" id="optionsRadios0004" class="check_options4" value="0" <?php echo $checkedNd;?> >
                                                      <label for="optionsRadios0004"> NO </label>
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
                                        <div class="getdataajaxdeposit"></div>
                                      </div>                                  
                                      <textarea row="20" cols="10" class="form-control postpreviedeposit" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:inline;"></textarea>
                                      <br>                                   
                                    </div>
                                  </div>
                                </div>  
                                <div class="col-md-12" >
                                  <div style="display:none" class="Maison">
                                    <div class="col-xs-12">
                                      <div class="col-md-12">
                                        <form id="collateralformmaison" name="uploadImages" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                                          <div id="fieldmaison" style="margin-left: -22px;">
                                            <div id="fieldmaison1">
                                              <!-- Text input-->
                                              <div class="row" style="margin:10px 0 0 0;">
                                                <div class="col-md-3">
                                                  <div class="form-group">
                                                  <label>Type de propri??taire </label>
                                                  <?php echo form_input('m_type_de_proprietaire', '', array('class' => 'form-control', 'placeholder' => 'Enter Type de propri??taire', 'id' => 'm_type_de_proprietaire', 'autocomplete'=>'off'));?>
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
                                                   <label> Ann??e de construction </label>
                                                   <?php echo form_input('m_annee_construction', '', array('class' => 'form-control', 'placeholder' => 'Enter Ann??e de construction', 'id' => 'm_annee_construction', 'autocomplete'=>'off'));?>
                                                  </div>
                                                </div>
                                                <!-- File Button --> 
                                                <div class="col-md-3">
                                                  <div class="form-group">
                                                  <label>Nombre de pi??ce</label>
                                                  <?php echo form_input('m_nombre_de_piece', '', array('class' => 'form-control', 'placeholder' => 'Enter Nombre de pi??ce', 'id' => 'm_nombre_de_piece', 'autocomplete'=>'off'));?>
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
                                                    $disabledStatusm="disabled='disabled'";
                                                    $checkedYm="";
                                                    $checkedNm="checked='checked'";
                                                  }else{
                                                    $disabledStatusm="";
                                                    $checkedNm="";
                                                    $checkedYm="checked='checked'";
                                                  }
                                                  ?>
                                              <div class="row" style="margin:10px 0 0 0;">
                                                <div class="col-md-3 col-sm-12">
                                                  <div class="form-group">
                                                   <span style="display:block">
                                                    <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload 
                                                    <img src="<?php echo base_url("assets/img/loading.gif");?>" class="maisonloder" style="display:none">
                                                      <input id="upload_maison" class="systemm_files upload_maison" type="file" multiple="" name="upload_maison[]" accept="application/msword,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*" <?php echo $disabledStatusm;?>>
                                                    </label>
                                                  </span>
                                                  </div>
                                                </div>

                                                <div class="col-md-3 col-sm-12">
                                                  <div class="form-group">
                                                    <div class="radio" style="display:inline-block">
                                                      <input type="radio" name="optionsRadios0005" id="optionsRadios0005" class="check_options5" value="1" <?php echo $checkedYm;?> />
                                                      <label for="optionsRadios0005"> YES </label>
                                                    </div>
                                                    <div class="radio" style="display:inline-block">
                                                      <input type="radio" name="optionsRadios0005" id="optionsRadios0006" class="check_options6" value="0" <?php echo $checkedNm;?> >
                                                      <label for="optionsRadios0006"> NO </label>
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
                                        <div class="getdataajaxmaison"></div>
                                      </div>
                                      <textarea row="20" cols="10" class="form-control postviewmmaison" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
                                      <br />
                                    </div>                  
                                  </div>
                                </div>
                                <div class="col-md-12" >
                                  <div style="display:none" class="Excemption">
                                    <div class="col-xs-12">                                  
                                      <div class="col-md-12" >
                                        <form id="collateralformexcemption" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                                          <div id="fielddeposit10" style="margin-left: -22px;">
                                            <div id="fielddeposit10">

                                               <?php if($appformD[0]['check_excemption']!=1){
                                                    $disabledStatuse="disabled='disabled'";
                                                    $checkedYe="";
                                                    $checkedNe="checked='checked'";
                                                  }else{
                                                    $disabledStatuse="";
                                                    $checkedNe="";
                                                    $checkedYe="checked='checked'";
                                                  }
                                                  ?>

                                              <div class="row" style="margin:10px 0 0 0;">
                                                <div class="col-md-3 col-sm-12">
                                                  <div class="form-group">
                                                    <span style="display:block">
                                                      <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="excemptionloder" style="display:none">
                                                      <input id="excemption_files" type="file" multiple="" name="excemption_files[]" accept="application/msword,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*" <?= $disabledStatuse;?>>
                                                    </label>
                                                    </span>
                                                  </div>
                                                </div>

                                                <div class="col-md-3 col-sm-12">
                                                  <div class="form-group">
                                                    <div class="radio" style="display:inline-block">
                                                      <input type="radio" name="optionsRadios0007" id="optionsRadios0007" class="check_options7" value="1" <?php echo $checkedYe;?> />
                                                      <label for="optionsRadios0007"> YES </label>
                                                    </div>
                                                    <div class="radio" style="display:inline-block">
                                                      <input type="radio" name="optionsRadios0007" id="optionsRadios0008" class="check_options8" value="0" <?php echo $checkedNe;?> >
                                                      <label for="optionsRadios0008"> NO </label>
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
                                        <div class="getdataajaxexcemption"></div>
                                      </div>   
                                      
                                      <textarea row="20" cols="10" class="form-control postviewexcemption" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
                                      
                                        <br/>                                    
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-12" >
                                  <?php
                                  //echo "<pre>", print_r($collateral[0]), "</pre>";
                                  foreach ($collateral_vehicule as $key1 ) {

                                  if(!empty($key1['selected_field']=="V??hicule")){ ?>
                                  <!-- Table V??hicule -->
                                  <h3 id="tab-title"><span>V??hicule</span></h3>
                                    <table class="table table-striped table-hover">
                                      <thead>
                                        <tr class="success">
                                        <th><span>Type</span></th>
                                        <th><span>Marque</span></th>
                                        <th><span>Mod??le</span></th>
                                        <th><span>Carte Grise</span></th>
                                        <th><span>Style</span></th>
                                        <th><span>Ann??e</span></th>
                                        <th><span>Kilom??trage</span></th>
                                        <th><span>Commentaire</span></th>                                        
                                        <th class="text-right"><span>Action </span></th>
                                        </tr>
                                      </thead>
                                      <tbody id="category-row">
                                        <?php 
                                          $v=1;
                                          foreach($collateral as $coll){
                                          //  print_r($coll);
                                          if($coll['selected_field']=="V??hicule"){
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
                                            <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_preview_vehicule-<?php echo $coll['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $coll['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                               
                                          </span>
                                          <span style="display:inline-block">
                                            <a href="<?php echo base_url('PP_Consumer_Loans/download_collateralvehicule/').$coll['col_id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light downloadv" data-toggle="tooltip" title="Download" id="collateral_downloadv-<?php echo $coll['col_id'];?>"> <i class="fa fa-cloud-download"></i></a>
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
                                  if(!empty($key2['selected_field']=="D??posit")){ ?>
                                    <h3 id="tab-title"><span>D??posit</span></h3>
                                    <table class="table table-striped table-hover">
                                      <thead>
                                        <tr class="success">                                        
                                        <th><span>Num??ro de compte</span></th>
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
                                        if($dept['selected_field']=="D??posit"){
                                      ?>
                                        <tr>                                        
                                        <td><?php echo $dept['d_numero_de_compte'];?></td>
                                        <td><?php echo $dept['d_montant'];?></td>
                                        <td><?php echo date("d/m/Y", strtotime($dept['created']));?></td>
                                        <td class="text-right">
                                          <div class="row">
                                            <div class="form-group">
                                            <span style="display:inline-block">
                                              <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_preview_deposit-<?php echo $dept['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $dept['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                               
                                            </span>
                                            <span style="display:inline-block">
                                              <a href="<?php echo base_url('PP_Consumer_Loans/download_collateraldeposit/').$dept['col_id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light downloadv" data-toggle="tooltip" title="Download" id="collateral_downloadv-<?php echo $dept['col_id'];?>"> <i class="fa fa-cloud-download"></i></a>
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
                                        <th><span>Type de propri??taire</span></th>
                                        <th><span>Etat de la maison</span></th>
                                        <th><span>Ann??e de construction</span></th>
                                        <th><span>Nombre de pi??ce</span></th>
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
                                              <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_previewv-<?php echo $maison['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $maison['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                               
                                            </span>
                                            <span style="display:inline-block">
                                              <a href="<?php echo base_url('PP_Consumer_Loans/download_collateralmaison/').$maison['col_id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light downloadv" data-toggle="tooltip" title="Download" id="collateral_downloadv-<?php echo $maison['col_id'];?>"> <i class="fa fa-cloud-download"></i></a>
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
                                      <td><?php echo date("d-m-Y", strtotime($dept['created']));?></td>
                                      <td class="text-right">
                                        <div class="row">
                                          <div class="form-group">
                                          <span style="display:inline-block">
                                            <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_preview_excemption-<?php echo $coll['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $coll['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                               
                                          </span>
                                          <span style="display:inline-block">
                                            <a href="<?php echo base_url('PP_Consumer_Loans/download_collateralexcemption/').$coll['col_id']; ?>" class="btn btn-sm btn-primary waves-effect waves-light downloadv" data-toggle="tooltip" title="Download" id="collateral_downloadv-<?php echo $coll['col_id'];?>"> <i class="fa fa-cloud-download"></i></a>
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
                            </div>
                            
                            <!-- End Tab-9  -->    
                             <div class="tab-pane fade" id="tab-10">                              
                                <form id="DecisionStatus" method="post">
                                  <div class="row">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label>SELECTIONNER VOTRE AVIS</label>
                                        <?php $decision = array("Avis Favorable","Avis d??favorable","Demande de retraitement"); ?>
                                          <?php if($appformD[0]['a_review']=="0"){ ?>
                                            <select class="form-control" id="decision" name="decision">
                                              <?php foreach($decision as $dec){
                                                if(trim($appformD[0]['loan_status']) == $dec){ $select="selected";}
                                                else{ $select=""; }
                                                echo '<option value="'.$dec.'" '.$select.'>'.$dec.'</option>';
                                              } ?>
                                            </select>
                                          <?php } 
                                           else{ echo "<select class=\"form-control\" readonly disabled ><option>".$appformD[0]['loan_status']."</option></select></select>"; }
                                          ?>                                         
                                      </div>
                                    </div>
                                  </div>
                                  <div style="display:block" class="Approbation">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                          <div class="input-group" style="width:100%">
                                            <label>Commentaire</label>
                                            <?php if($appformD[0]['a_review']=="0"){ ?>
                                              <input type="text" class="form-control" id="commentstatus" name="commentstatus" placeholder="Enter Commentaire" autocomplete="off" requerd />
                                            <?php  } else { ?>
                                              <input type="text" class="form-control" placeholder="Enter Commentaire" autocomplete="off" disabled />
                                             <?php  } ?>
                                          </div>
                                        </div>
                                      </div>  
                                      <?php if($appformD[0]['a_review']=="0"){ ?>                                     
                                        <div class="col-md-12">
                                            <input type="hidden" name="cl_aid"  value="<?php echo $appformD[0]['cl_aid'];?>" readonly>

                                            <input type="hidden" id="customar_id_excemption" name="customar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>

                                            <input type="hidden" id="branch_id" name="branch_id"  value="<?php echo $record[0]->branch_id;?>" readonly>

                                            <input type="hidden" id="account_manager_id" name="account_manager_id"  value="<?php echo $appformD[0]['admin_id'];?>" readonly>

                                            <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right commentlofer" style="position:relative;top: 17px;left:-124px; display:none;">
                                            <button type="button" class="btn btn-primary pull-right clearfix" id="commentsubmit" style="margin-top:10px;margin-bottom:10px;">SOUMETTRE</button>
                                        </div>
                                        <div class="col-md-12">
                                          <div class="decisionmsg"></div>
                                          <textarea row="20" cols="10" class="form-control commentres" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
                                        </div>
                                      <?php } ?>                                    

                                    </div>
                                  </div>
                                </form>                                
                                <div class="col-lg-12">
                                  <div class="row">
                                    <div class="scrollable" style="">
                                      <div class="table-responsive">
                                        <table id="table-decision" class="table table-striped table-hover">
                                          <thead>
                                            <tr class="success">
                                              <th><span>TYPE UTILISATEUR</span></th>
                                              <th><span>UTILISATEURS</span></th>
                                              <th><span>DECISION UTILISATEUR</span></th>
                                              <th><span>COMMENTAIRE</span></th>
                                              <th><span>DATE ACTON</span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                          <?php
                                            if(!empty($decision_rec)){
                                            foreach ($decision_rec as $keys ) {
                                              $timeagodecision=$keys['modified'];
                                                echo "<tr>";
                                                echo "<td>".$keys['field_data']."</td>";
                                                echo "<td>".$keys['first_name']."</td>";
                                                    echo "<td>".$keys['decision']."</td>";
                                                    echo "<td>".$keys['commentstatus']."</td>";
                                                    echo "<td>".date('d-m-Y', strtotime($keys['modified'])).':'.timeAgo($timeagodecision)."</td>";
                                                   
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
                                <div class="col-lg-12">&nbsp;</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
                        <div class="col-xs-2 no-padding"><?php echo ucfirst($pinfo[0]['first_name']) ?: '-';?><?php echo $pinfo[0]['middle_name'] ?: ' ';?><?php echo $pinfo[0]['last_name'] ?: '-';?></div>
                        <div class="col-xs-2 bold no-padding">Dure Du Pret:</div>
                        <div class="col-xs-2 no-padding"><?php echo $appformD[0]['loan_term'];?>  <?php if($appformD[0]['loan_schedule'] == "Monthly"){
                                      echo "MOIS";
                                    } ?></div>
                        <!-- <div class="col-xs-2 bold no-padding">Amount:</div> -->
                        <!-- <div class="col-xs-2 no-padding">CFA <?php// echo number_format($appformD[0]['loan_amt'],0,',',' ');?></div> -->
                        <div class="col-xs-2 bold no-padding">Agence:</div>
                        <div class="col-xs-2"><?php echo $customersd[0]['account_name'];?></div>
                      </div>
                      <div class="row well_row">
                        <div class="col-xs-2 bold no-padding">Statut Du Pret:</div>
                        <div class="col-xs-2 no-padding"><?php echo $appformD[0]['loan_status'];?></div>
                        <div class="col-xs-2 bold no-padding">Nature Du Pret:</div>
                        <div class="col-xs-2 no-padding">Credit Conso</div>
                        <div class="col-xs-2 bold no-padding">Taux D'Interet:</div>
                        <div class="col-xs-2 no-padding"><?php echo sprintf("%01.2f", $appformD[0]['loan_interest']);?>%</div>
                      </div>
                      <div class="row well_row">
                        <div class="col-xs-2 bold no-padding">Montant Du Pret:</div>
                        <div class="col-xs-2 no-padding">CFA <?php echo number_format($appformD[0]['loan_amt'],0,',',' ');?></div>
                        <div class="col-xs-2 bold no-padding">Date Derniere Enheance:</div>
                        <div class="col-xs-2 no-padding">
                          <?php  echo $DateofLastPayment;
                          //echo date('d-m-Y', strtotime('+1 month', strtotime($appformD[0]['created'])));;?>
                            
                          </div>
                        <div class="col-xs-2 bold no-padding">Montant Total A Rembourser:</div>
                        <div class="col-xs-2 no-padding">CFA <?php echo number_format($appformD[0]['tpmnt'],0,',',' ');?></div>
                      </div>
                      <div class="row well_row">
                        <div class="col-xs-2 bold no-padding">TVA(VAT On Interest):</div>
                        <div class="col-xs-2 no-padding"><?php echo 'CFA '.number_format($sumofVATonInterest,0,',',' '); ?></div>
                        <div class="col-xs-2 bold no-padding">Mensualite:</div>
                        <div class="col-xs-2 no-padding">CFA <?php echo number_format($appformD[0]['pmnt'],0,',',' ') ;?></div>
                        <div class="col-xs-2 bold no-padding">Numero De Compte:</div>
                        <div class="col-xs-2 no-padding"><?php echo $customersd[0]['account_number'];?></div>
                      </div>
                      <div class="row well_row">
                        <div class="col-xs-2 bold"></div>
                        <div class="col-xs-2"></div>
                        <div class="col-xs-2 bold"></div>
                        <div class="col-xs-2"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                          <!-- End Split Blue section -->
              <div class="action-panel">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;margin-bottom:10px;">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="nextstep-buttons">
                      <!-- Age of Customer section -->
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                         <?php                                    
                        $dateOfBirth = date('Y-m-d', strtotime($pinfo[0]['dob']));
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($dateOfBirth), date_create($today));
                         ?>
                        <div class="infographic-box" data-toggle="tooltip" title="Age of Customer"> <img src="<?php echo base_url('assets/img/age.png');?>" /> <span class="value">
                          <?php echo $diff->format('%y') ?: '21';?></span> 
                          <!--<span class="headline">Users</span>--> 
                        </div>
                      </div>
                      <!-- End Age of Customer section -->
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <?php                                    
                        $Tenurewithbank = date("d-m-Y" ,strtotime($bankinfo[0]['opening_date']));
                        $today = date("Y-m-d");
                        $diff = date_diff(date_create($Tenurewithbank), date_create($today));
                         ?>
                        <div class="infographic-box" data-toggle="tooltip" title="Tenure with Bank"> <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value"><?php echo timeAgo($Tenurewithbank) ?: '21';?></span> 
                          <!--<span class="headline">Users</span>--> 
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Previous Loans"> <img src="<?php echo base_url('assets/img/loans.png');?>" /> <span class="value">01</span>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Application Date"> <img src="<?php echo base_url('assets/img/timer.png');?>" /> <span class="value">
                          <?php echo timeAgo($appformD[0]['created']) ?: '10 Days';?></span> 
                          <!--<span class="headline">Users</span>--> 
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="nextstep-buttons">
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Ratio Debt">
                          <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value rdval2">
                            <?php echo $riskfsituation[0]['coeficientendettement'] ?: '0';?>                              
                            </span>
                        </div>
                      </div>
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title=""> <img src="<?php echo base_url('assets/img/revenue.png');?>" />  <span class="headline">Target List</span> </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align:center">
                        <loan-back> <a href="<?php echo base_url('PP_Consumer_Loans/amortizationview/').$appformD[0]['cl_aid'];?>" class="btn btn-default loan-back"  style="width:100%;margin-top:25px;">AMORTISSEMENT</a> </loan-back>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
              <!-- End Blue Section -->                        

             
              <!--<div class="clearfix" style="margin-top:0px;margin-bottom:5px;">
                <a class="btn btn-primary pull-left">CHANGE TERM</a></div>-->
          </div> 


         



<div class="wrapper">
  <ul class="nav nav-tabs list1">
    <li class="active" onclick="active_tab('tab-11')"><a href="#tab-11">D??tails Sur Le Client</a></li>
    <li onclick="active_tab('tab-21')"><a href="#tab-21">Co??t du cr??dit</a></li>
    <li onclick="active_tab('tab-12')"> <a href="#tab-12">Documents</a></li>
    <li onclick="active_tab('tab-13')"><a href="#tab-13">Tra??abilit?? Sur le Dossier</a></li>
    <li onclick="active_tab('tab-14')"><a href="#tab-14">Analyse Risque</a></li>
    <li onclick="active_tab('tab-16')"><a href="#tab-16">Historique Interaction</a></li>
    <!--<li onclick="active_tab('tab-17')"><a href="#tab-17">CREDIT BEAREU</a></li>-->
    <li onclick="active_tab('tab-18')"><a href="#tab-18">Calcul Amortissement</a></li>
    <li onclick="active_tab('tab-19')"><a href="#tab-19">Garanties</a></li>
    <li onclick="active_tab('tab-20')"><a href="#tab-20">Decisions</a></li>
    <li onclick="active_tab('tab-15')"><a href="#tab-15">CAD</a></li>
  </ul>
   <form action="<?php echo base_url('PP_Consumer_Loans/customer_details_update')?>"  method="post">
        <div class="tab-content" style="margin-top: 40px;">
            <div class="tab-pane fade in active" id="tab-11">
                 <h3 id="tab-title"><span>Renseignements Personnels</span></h3>
          <div class="row">
             <!--<form action="<?php echo base_url('PP_Consumer_Loans/customer_details_update')?>"  method="post"> -->
            <div class="col-md-3">
              <div class="form-group">
                <label> Pr??noms </label>
                <h3 id="tab-details"><span> <input type="text" name="first_name" value="<?php echo ucfirst($pinfo[0]['first_name']) ?>"></span></h3>
              </div>
            </div>                  
            <div class="col-md-3">
              <div class="form-group">
                <label>2i??me Pr??noms </label>
                <h3 id="tab-details"><span> <input type="text" name="middle_name" value="<?php echo $pinfo[0]['middle_name'] ?>">
</span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label> Nom </label>
                <h3 id="tab-details"><span> <input type="text" name="last_name" value="<?php echo $pinfo[0]['last_name'] ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Genre</label>
                <h3 id="tab-details"><span> <input type="text" name="gender" value="<?php echo $pinfo[0]['gender'] ?>"></span></h3>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Date de naissance </label>
                <h3 id="tab-details"><span> <input type="text" placeholder="dd-mm-yyyy" name="dob" value="<?php echo date('d-m-Y', strtotime($pinfo[0]['dob'])) ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Dip??me ou Niveau ??tude </label>
                <h3 id="tab-details"><span><input type="text" name="education" value="<?php echo ucwords($pinfo[0]['education']) ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Situation Matrimoniale </label>
                <h3 id="tab-details"><span> <input type="text" name="marital_status" value="<?php echo ucwords($pinfo[0]['marital_status']) ?>" placeholder="single/marit/devorce"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Email </label>
                <h3 id="tab-details"><span> <input type="text" name="email" value="<?php echo $pinfo[0]['email'] ?>"></span></h3>
              </div>
            </div>
          </div>

          <h3 id="tab-title"><span>Informations Additionnelles</span></h3>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Type d???identification </label>                
                <?php
                  $Typeid2 = array(
                    "Passport",
                    "CNI",
                    "Recepisse + Acte de Naissance",
                    "Carte de Sejour"
                  );
                  if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                  <select class="form-control" name="type_id" id="type_id2" required>
                    <?php foreach($Typeid2 as $adnfo2){
                    if(trim($adinfo[0]['type_id']) == $adnfo2){ $select2="selected";}else{$select2="";}
                      echo  '<option value="'.$adnfo2.'" '.$select2.'>'.$adnfo2.'</option>';
                    }?>
                  </select>
                  <?php } else{
                    echo '<h3 id="tab-details"><span>'.$adinfo[0]['type_id'].'</span></h3>';
                  }?>                  
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Revenu mensuel </label>
                <h3 id="tab-details"><span> <input type="text" name="monthly_income" value="<?php echo 'CAF ' . number_format($adinfo[0]['monthly_income'], 0, ',', ' ') ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>D??penses mensuelles </label>
                <h3 id="tab-details"><span> <input type="text" name="monthly_expenses" value="<?php echo 'CAF ' . number_format($adinfo[0]['monthly_expenses'], 0, ',', ' ') ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Num??ro du type d???identification </label>
                <h3 id="tab-details"><span> <input type="text" name="id_number" value="<?php echo $adinfo[0]['id_number'] ?>"></span></h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Pays de r??sidence </label>
                <h3 id="tab-details"><span> <input type="text" name="state_of_issue" value="<?php echo $adinfo[0]['state_of_issue'] ?>"> </span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Fonction </label>
                <h3 id="tab-details"><span> <input type="text" name="occupation" value="<?php echo $adinfo[0]['occupation'] ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Num??ro de t??l??phone principal </label>
                <h3 id="tab-details"><span> <input type="text" name="main_phone" class="phone_main_c" value="<?php echo $adinfo[0]['main_phone'] ?>"></span>
                <span class="phone_main_error error_c" style="display:none">Please enter valid phone no. </span>
                <span class="phone_main_valerror error_c" style="display:none">Please enter 10 digits phone no.</span>
                </h3>
                  
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Second Num??ro de t??l??phone </label>
                <h3 id="tab-details"><span><input type="text" class="phone_alternate_c" name="alternative_phone" id="alternative_phone" value="<?php echo $adinfo[0]['alternative_phone'] ?>"></span>
                <span class="phone_alt_error error_c" style="display:none">Please enter valid phone no. </span>
                <span class="phone_alt_valerror error_c" style="display:none">Please enter 10 digits phone no.</span>
                </h3>
                  
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Date Expiration du type d???identification </label>
                <h3 id="tab-details"><span> <input type="text" name="expiration_date_id" value="<?php echo date('d-m-Y', strtotime($adinfo[0]['expiration_date_id'])) ?>"></span></h3>
              </div>
            </div>                  
            <div class="col-md-3">
            <div class="form-group">
              <label>Date Etablissement Type de Pi??ce </label>
              <h3 id="tab-details"><span><input type="text"  name="room_type" value="<?php echo $adinfo[0]['room_type'] ?>"></span></h3>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Nom et Pr??noms du PERE</label>
              <h3 id="tab-details"><span><input type="text"  name="father_fullname" value="<?php echo $adinfo[0]['father_fullname'] ?>"></span></h3>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label>Noms et Pr??noms  de la MERE</label>
              <h3 id="tab-details"><span><input type="text"  name="mother_fullname" value="<?php echo $adinfo[0]['mother_fullname'] ?>"></span></h3>
            </div>
          </div>

          </div>
          <h3 id="tab-title"><span>Information Sur l'EmploiI</span></h3>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Nom de l???employeur</label>
                <h3 id="tab-details"><span> <input type="text" name="employer_name" value="<?php echo $empinfo[0]['employer_name'] ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" style="margin-bottom:5px;">
                <label>Secteur d???activit??</label> 
                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>                                      
                <select class="form-control"  id="secteurs2" name="secteurs">
                <?php 
                  if(!empty($secteurs)){
                    foreach($secteurs as $Key){
                    if(trim($empinfo[0]['secteurs_id']) == $Key['tlc_id']){ $select="selected";}else{$select="";}
                      echo "<option value=\"".$Key['tlc_id']."\" name=\"".$Key['secteurs']."\" ".$select." >".$Key['secteurs']."</option>"."\r\n";
                    }
                  }
                  ?>                                     
                </select>
                <?php }
                else{ ?>
                  <h3 id="tab-details"><span><?php echo $empinfo[0]['SecteursN'] ?: '-';?></span></h3>
                  
                <?php }
                ?>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group" style="margin-bottom:5px;">
                <label>Cat??gorie Employeurs </label>
                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                <select class="form-control"  id="cat_employeurs2" name="cat_employeurs">
                  <?php 
                    if(!empty($cat_emp)){
                      foreach($cat_emp as $Key){
                        if(trim($empinfo[0]['cat_emp_id']) == $Key['cat_id']){ $select="selected";}else{$select="";}
                        echo "<option value=\"".$Key['cat_id']."\" name=\"".$Key['catrgory']."\" ".$select.">".$Key['catrgory']."</option>"."\r\n";
                      }
                    }
                    ?>                                       
                </select>
              <?php } 
              else { ?>
                <h3 id="tab-details"><span><?php echo $empinfo[0]['catname'] ?: '-';?></span></h3>

              <?php } ?>
              </div>
            </div>
            <div class="col-md-3">                                 
              <div class="row" style="margin-bottom:5px;">                                   
                <div class="form-group" style="margin-bottom:5px;">
                 <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image" style="display:none; position: absolute; z-index: 1000; top: 34px;">
                  <label>Type de Contrat </label>
                  <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                  <select class="form-control" id="typeofcontract2" name="typeofcontract" style="width:98%">
                    <?php 
                      if(!empty($contract_type)){
                        foreach($contract_type as $Key){
                         // print_r($Key);
                          if(trim($empinfo[0]['contract_type_id']) == $Key['tc_id']){ $select="selected";}else{$select="";}
                        echo "<option value=\"".$Key['tc_id']."\" name=\"".$Key['contract_type']."\">".$Key['contract_type']."</option>";                       }
                      }
                      ?>                                          
                  </select>
                  <?php } 
              else { ?>
                <h3 id="tab-details"><span><?php echo $empinfo[0]['ctype'] ?: 'cd-date';?></span></h3>

              <?php } ?>
                </div>                                      
                <form class="formCtype" method="POST" >
                <div class="form-group" style="display:none;">
                  <div class="col-sm-8" style="padding-left:0px;">
                    <input class="form-control" type="text" placeholder="Contract Name" name="addctype" id="addctype" value=""  autocomplete="off">
                  </div>
                  <div class="col-sm-4" style="padding-right:0px;">
                    <button type="button" class="btn btn-sm btn-default addbutton">ADD</button>
                  </div>
                </div>
               </form>
               </div>
              </div>                                   
            </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Date d???embauche </label>
                <h3 id="tab-details"><span><input type="text" placeholder="dd-mm-yyyy" name="employment_date" value="<?php echo date('d-m-Y', strtotime($empinfo[0]['employment_date'])) ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Date End of Contract for CDD </label>
                <h3 id="tab-details"><span> <input type="text" placeholder="dd-mm-yyyy" name="sate_end_contract_cdd" value="<?php echo date('d-m-Y', strtotime($empinfo[0]['sate_end_contract_cdd'])) ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Nombre of Years of Professionel Experience</label>
                <h3 id="tab-details"><span>
                  <?php //echo $empinfo[0]['years_professionel_experience'] ?: '-';?>
                  <?php 
                    $sdate1 = $empinfo[0]['how_he_is_been_with_current_employer'];
                    $edate1 = date('Y-m-d');
                    $date_diff = abs(strtotime($edate1) - strtotime($sdate1));
                    $years1 = floor($date_diff / (365*60*60*24));
                    $months1 = floor(($date_diff - $years1 * 365*60*60*24) / (30*60*60*24));
                    $days1 = floor(($date_diff - $years1 * 365*60*60*24 - $months1*30*60*60*24)/ (60*60*24));
                    //$years.'Years '. $months.'Months';
                    //echo $years*12;
                    if($empinfo[0]['years_professionel_experience']){ ?>   
                      <input type="text" name="years_professionel_experience" value="<?php echo $empinfo[0]['years_professionel_experience'] ?>">
                                  <?php }elseif($years2!=0) { ?>
                      <input type="text" name="years_professionel_experience" value="<?php echo $years2 ?>">  
                                  <?php }else { ?>
                    <input type="text" name="years_professionel_experience" value="<?php echo $empinfo[0]['years_professionel_experience'] ?>">  
                                      <?php }?>                    
                  </span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Date de pr??sence chez l???employeur actuel </label>
                <h3 id="tab-details"><span>
                  <?php 
                      $sdate = $empinfo[0]['how_he_is_been_with_current_employer'];
                      $edate = date('Y-m-d');
                      $date_diff = abs(strtotime($edate) - strtotime($sdate));
                      $years = floor($date_diff / (365*60*60*24));
                      $months = floor(($date_diff - $years * 365*60*60*24) / (30*60*60*24));
                      $days = floor(($date_diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                      //$years.'Years '. $months.'Months';
                      //echo $years*12;


                      if($empinfo[0]['how_he_is_been_with_current_employer']){ ?>   
                        <input type="text"  name="how_he_is_been_with_current_employer" value="<?php echo $empinfo[0]['how_he_is_been_with_current_employer'] ?>">
                                    <?php }elseif($years!=0) { ?>
                        <input type="text"  name="how_he_is_been_with_current_employer" value="<?php echo $years ?>">  
                                    <?php }else { ?>
                      <input type="text"  name="how_he_is_been_with_current_employer" value="<?php echo $months ?>">  
                                        <?php }?>
                   
                    
                  </span></h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Salaire net </label>
                <h3 id="tab-details"><span>  <input type="text" name="emp_net_salary" value="<?php echo number_format($empinfo[0]['emp_net_salary'], 0, ',', ' ') ?>">
</span></h3>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>Age de retraite pr??vu </label>
                <h3 id="tab-details"><span> <input type="text" name="retirement_age_expected" value="<?php echo $empinfo[0]['retirement_age_expected'] ?>"></span></h3>
              </div>
            </div>
          </div>
          <h3 id="tab-title"><span>Adresse</span></h3>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Lieu de residence </label>
                <h3 id="tab-details"><span> <input type="text" name="resides_address" value="<?php echo $adrs[0]['resides_address'] ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Nom de la rue </label>
                <h3 id="tab-details"><span> <input type="text" name="street" value="<?php echo $adrs[0]['street'] ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Ville de r??sidence</label>
                <h3 id="tab-details"><span> <input type="text" name="city_id" value="<?php echo $adrs[0]['city_id'] ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Pays de r??sidence </label>
                <h3 id="tab-details"><span> <input type="text" name="state_id" value="<?php echo $adrs[0]['state_id'] ?>">
</span></h3>
              </div>
            </div>
          </div>
          <h3 id="tab-title"><span>Information Sur le Compte Bancaire</span></h3>
          <div class="row">
            <div class="col-md-3">
               <div class="form-group">
                <label>Type de compte </label>
            <?php
            $Typeid = array(
                "Compte d?????pargne",
                "Compte d?????pargne r??gulier",
                "Compte courant",
                "Compte de d??p??t r??current",
                "Fixed Deposit Account",
                "Demat Account",
                "NRI Accounts",
            ); ?>
        <?php
        if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
            <select class="form-control" name="account_type" id="account_type" required>
            <?php foreach($Typeid as $adnfo){
        if(trim($adinfo[0]['account_type']) == $adnfo){ 
            $select="selected";}else{$select="";}
            echo '<option value="'.$adnfo.'" '.$select.'>'.$adnfo.'</option>';
                }?>
            </select>
        <?php } else{
                echo '<h3 id="tab-details"><span>'.$adinfo[0]['account_type'].'</span></h3>';
            }?>                                   
            </div>   
         </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Bank Name </label>
                <h3 id="tab-details"><span> <input type="text" name="account_name" value="<?php echo $bankinfo[0]['bank_name'] ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>T??l??phone agence bancaire</label>
                <h3 id="tab-details"><span> <input type="text" name="bank_phone" value="<?php echo $bankinfo[0]['bank_phone'] ?>">
</span></h3>
              </div>
            </div>
             <div class="col-md-3">
              <div class="form-group">
                <label>Objet du cr??dit </label>
                  <?php
                    $objcredit = array(
                      "Consomation",
                      "Equipement",
                      "Immobilier",
                      "Scolaire",
                      "Autres",
                    ); ?>
                    <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                    <select class="form-control" name="obj_credit" id="obj_credit2" style="width:98%">
                      <?php foreach($objcredit as $credit){
                      if(trim($otherinfo[0]['objet_credit']) == $credit){ $select="selected";}else{$select="";}
                        echo  '<option value="'.$credit.'" '.$select.' name="'.$credit.'">'.$credit.'</option>';
                      }?>
                    </select>
                    <?php } 
                      else{ ?>
                        <h3 id="tab-details"><span><?php echo $otherinfo[0]['objet_credit'] ?: 'Consomation';?></span></h3>
                      <?php }
                      ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label>Date ouverture de compte </label>
                <h3 id="tab-details"><span> <input type="text" name="opening_date" value="<?php echo date("d-m-Y", strtotime($bankinfo[0]['opening_date'])) ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>num??ro de compte </label>
                <h3 id="tab-details"><span> <input type="text" name="account_number" value="<?php echo $bankinfo[0]['account_no'] ?>"></span></h3>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>Code de la banque </label>
                <h3 id="tab-details"><span>  <input type="text" name="field_1" value="<?php echo $otherinfo[0]['field_1'] ?>"></span></h3>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label>Code de l???agence </label>
                <h3 id="tab-details"><span>  <input type="text" name="field_2" value="<?php echo $otherinfo[0]['field_2'] ?>"></span></h3>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Cl?? RIB </label>
                <h3 id="tab-details"><span> <input type="text" name="field_3" value="<?php echo $otherinfo[0]['field_3'] ?>">
</span></h3>
              </div>
            </div>
          </div>
         
            <!--   <h3 id="tab-title"><span>Student Information</span><i class="fa fa-plus pull-right" aria-hidden="true"></i></h3>
              <h3 id="tab-title"><span>Blocked Account Information</span><i class="fa fa-plus pull-right" aria-hidden="true"></i></h3> -->
    

               <div class="text-center">
                   <button type="submit" class="btn btn-primary waves-effect waves-light submitBtn" sytle ="margin-top: 5px;margin-bottom: 20px;"><img src="<?php echo base_url('assets/img/select2-spinner.gif'); ?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Update</button>
             </div>      
                
                  <input type="hidden" name="id" value="<?php echo $urlid ?>">
                  <input type="hidden" name="oid" value="<?php echo $otherinfo[0]['oid'] ?>">
                  <input type="hidden" name="cid" value="<?php echo $customersd[0]['cid'] ?>">
                  <input type="hidden" name="cbk_id" value="<?php echo $bankinfo[0]['cbk_id'] ?>">

                   <input type="hidden" name="add_id" value="<?php echo $adrs[0]['add_id'] ?>">
                   <input type="hidden" name="emp_infoid" value="<?php echo $empinfo[0]['emp_infoid'] ?>">
                   <input type="hidden" name="ai_id" value="<?php echo $adinfo[0]['ai_id'] ?>">
                   <input type="hidden" name="pid" value="<?php echo $pinfo[0]['pid'] ?>">
                   <input type="hidden" name="bmid" value="<?php echo $decision_rec[0]['bmid'] ?>">
                   <input type="hidden" name="applicableid" value="<?php echo $applicableloanratio[0]['applicableid'] ?>">
                   <input type="hidden" name="tc_id" value="<?php echo $contract_type[0]['tc_id'] ?>">
                   <input type="hidden" name="cat_id" value="<?php echo $cat_emp[0]['cat_id'] ?>">
                   <input type="hidden" name="tlc_id" value="<?php echo $secteurs[0]['tlc_id'] ?>">

                   <input type="hidden" name="cl_aid" value="<?php echo $loandetails[0]['cl_aid'] ?>">
                   <input type="hidden" name="tid" value="<?php echo $loantax[0]['tid'] ?>">
                   <input type="hidden" name="loantype" value="<?php echo $appformD[0]['loantype'] ?>">
              </form>
        
          </div>                               
      </div>
             

        <!--Tab-12 Details-->

      <div class="tab-pane fade" id="tab-12">
        <h3 id="tab-title"><span>DOCUMENTS SYSTEMES</span></h3>
        <small class="outputmsg"></small>
        <div class="row">
          <div class="col-lg-12">
          <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image_details" style="display:none">
            <input id="systemdocsfiles1" type="file" multiple="" name="systemdocsfiles1[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">
          </label>
          <input type="hidden" id="getcid"  name="getcid" value="<?php echo $appformD[0]['cl_aid'];?>">
          <?php 
          if(!empty($sys_docs)){ ?>
            <button type="button" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>
            <a href="<?php echo base_url('PP_Consumer_Loans/downloadall/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
          <?php }
          else { ?>
            <button type="button" class="btn btn-sm btn-default preview" id="notification_preview2"> <i class="fa fa-eye"></i> Preview</button>
            <a haterref="javascript:void(0);" class="btn btn-sm btn-primary download" id="notification_download2"> <i class="fa fa-cloud-download"></i> Download </a>
          <?php }?>
          </div>
        </div>
        <table class="table table-bordered table-hover" id="table_auto">
          <tr id="row_0">
            <td>                                      
              <div class="row">
                <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/promissory_note/').$appformD[0]['cl_aid'];?>','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return"> 1- CONVENTION DE CREDIT</a></span>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/credit_agreement/').$appformD[0]['cl_aid'];?>','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">2- CAUTION SOLIDAIRE ET PERSONNEL</a></span>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12"> <a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/formulaire_adhesion_aufoud_de_grantie/').$appformD[0]['cl_aid'];?>','Windows','width=680,height=940,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">3- FORMULAIRE ADHESION AU FOND DE GARANTIE</a>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/formulaire_de_demande_credit/').$appformD[0]['cl_aid'];?>','Windows','width=680,height=940,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">4- FORMULAIRE DE DEMANDE CREDIT</a></span>
                  <!-- <input id="avatar" class="file-loading" type="file" name="image" > --> 
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/billetaorder/').$appformD[0]['cl_aid'];?>','Windows','width=802,height=430,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">5- BILLET A ORDRE</a></span> 
                  <!-- <input id="avatar" class="file-loading" type="file" name="image" > --> 
                </div>
              </div>
              <div class="row">                                       
                <div class="col-lg-12"> 
                  <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url('PP_Consumer_Loans/memo_of_setting_up/').$appformD[0]['cl_aid'];?>','Windows','width=680,height=940,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return">6- MEMO DE MISE EN PLACE</a></span> 
                  <!-- <input id="avatar" class="file-loading" type="file" name="image" > --> 
                </div>
              </div>                                      
            </td>
          </tr>
        </table>
        <h3 id="tab-title"><span>CHECK LISTDOCUMENTS A FOURNIR</span></h3>
        <small class="outputmsg2"></small>
        <div class="row">
          <div class="col-lg-12">
          <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_imagechecklist_details" style="display:none">
            <input type="file" multiple="" name="check_list_customer_documents1[]" id="check_list_customer_documents1" accept="application/msword,application/pdf, application/msword,  application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">
          </label>
          <?php if(!empty($clist_docs)){ ?>
            <button type="button" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal2"><i class="fa fa-eye"></i> Preview</button>
            <a href="<?php echo base_url('PP_Consumer_Loans/downloadallCheckList/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
          <?php } else { ?>
            <button type="button" class="btn btn-sm btn-default preview" id="notification_CheckList_preview2"> <i class="fa fa-eye"></i> Preview</button>
            <a href="javascript:void(0);" class="btn btn-sm btn-primary download" id="notification_CheckList_download2"> <i class="fa fa-cloud-download"></i> Download </a>
          <?php } ?>
          </div>
        </div>
         <table class="table table-bordered table-hover" id="table_auto">
          <tr id="row_0">
            <td>
                <div class="row">
                  <div class="col-lg-6">
                    <span><a href="JavaScript:void(0);">1- DEMANDE DU CLIENT </a></span> 
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc01" id="optionsRadios01" value="YES"  <?php if($clist_docs_check[0]['doc_1']=="YES"){ echo "checked";} else { echo "";} ?>  onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_1');" />
                        <label for="optionsRadios01"> YES </label>
                      </div>
                      <div class="radio  doc_1" style="display:inline-block">
                        <input type="radio" name="optiondoc01" id="optionsRadios02" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_1');" <?php if($clist_docs_check[0]['doc_1']=="NO"){ echo "checked";} else { echo "";} ?>  />
                        <label for="optionsRadios02"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <span><a href="JavaScript:void(0);">2- COPIE CNI EN COURS DE VALIDITE</a><span>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc02" id="optionsRadios03" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_2');"  <?php if($clist_docs_check[0]['doc_2']=="YES"){ echo "checked";} else { echo "";} ?> />
                        <label for="optionsRadios03"> YES </label>
                      </div>
                      <div class="radio doc_2" style="display:inline-block">
                        <input type="radio" name="optiondoc02" id="optionsRadios04" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_2');" <?php if($clist_docs_check[0]['doc_2']=="NO"){ echo "checked";} else { echo "";} ?> />
                        <label for="optionsRadios04"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <span><a href="JavaScript:void(0);">3- 3 DERNIERS BULLETINS DE PAIE</a></span>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc03" id="optionsRadios05" value="YES"  onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_3');" <?php if($clist_docs_check[0]['doc_3']=="YES"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios05"> YES </label>
                      </div>
                      <div class="radio doc_3" style="display:inline-block">
                        <input type="radio" name="optiondoc03" id="optionsRadios06" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_3');" <?php if($clist_docs_check[0]['doc_3']=="NO"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios06"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <span><a href="JavaScript:void(0);">4- ATTESTATION DE NON ENDETTEMENT</a></span>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc04" id="optionsRadios07" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_4');" <?php if($clist_docs_check[0]['doc_4']=="YES"){ echo "checked";} else { echo "";} ?> >
                        <label for="optionsRadios07"> YES </label>
                      </div>
                      <div class="radio doc_4" style="display:inline-block">
                        <input type="radio" name="optiondoc04" id="optionsRadios08" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_4');" <?php if($clist_docs_check[0]['doc_4']=="NO"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios08"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <span><a href="JavaScript:void(0);">5- ATTESTATION DE VIREMENT IRREVOCABLE</a></span>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc05" id="optionsRadios09" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_5');" <?php if($clist_docs_check[0]['doc_5']=="YES"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios09"> YES </label>
                      </div>
                      <div class="radio doc_5" style="display:inline-block">
                        <input type="radio" name="optiondoc05" id="optionsRadios010" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_5');" <?php if($clist_docs_check[0]['doc_5']=="NO"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios010"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <a href="JavaScript:void(0);">6- ATTESTATION DE TRAVAIL</a>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc06" id="optionsRadios011" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_6');"  <?php if($clist_docs_check[0]['doc_6']=="YES"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios011">YES</label>
                      </div>
                      <div class="radio doc_6" style="display:inline-block">
                        <input type="radio" name="optiondoc06" id="optionsRadios012" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_6');" <?php if($clist_docs_check[0]['doc_6']=="NO"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios012">NO</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6"><a href="JavaScript:void(0);">7- CERTIFICAT DE DOMICILE OU COPIE FACTURE ENO OU CAMWATER</a> </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc07" id="optionsRadios013" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_7');" <?php if($clist_docs_check[0]['doc_7']=="YES"){ echo "checked";} else { echo "";} ?> />
                        <label for="optionsRadios013"> YES </label>
                      </div>
                      <div class="radio doc_7" style="display:inline-block">
                        <input type="radio" name="optiondoc07" id="optionsRadios014" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_7');" <?php if($clist_docs_check[0]['doc_7']=="YES"){ echo "checked";} else { echo "";} ?> />
                        <label for="optionsRadios014"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6"> <a href="JavaScript:void(0);">8- PLAN DE LOCALISATION</a> </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc08" id="optionsRadios015" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_8');" <?php if($clist_docs_check[0]['doc_8']=="YES"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios015"> YES </label>
                      </div>
                      <div class="radio doc_8" style="display:inline-block">
                        <input type="radio" name="optiondoc08" id="optionsRadios016" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_8');" <?php if($clist_docs_check[0]['doc_8']=="NO"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios016"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6"> <a href="JavaScript:void(0);">9- VERIFICATION CIP</a> </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc09" id="optionsRadios017" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_9');" <?php if($clist_docs_check[0]['doc_9']=="YES"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios017"> YES </label>
                      </div>
                      <div class="radio doc_9" style="display:inline-block">
                        <input type="radio" name="optiondoc09" id="optionsRadios018" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_9');" <?php if($clist_docs_check[0]['doc_9']=="NO"){ echo "checked";} else { echo "";} ?> />
                        <label for="optionsRadios018"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <span><a href="JavaScript:void(0);">10- VERIFICATION CENTRALE DES RISQUES</a></span>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc010" id="optionsRadios019" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_10');" <?php if($clist_docs_check[0]['doc_10']=="YES"){ echo "checked";} else { echo "";} ?> />
                        <label for="optionsRadios019"> YES </label> 
                      </div>
                      <div class="radio doc_10" style="display:inline-block">
                        <input type="radio" name="optiondoc010" id="optionsRadios020" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_10');" <?php if($clist_docs_check[0]['doc_10']=="NO"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios020"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <span><a href="JavaScript:void(0);">11- ASSURANCE INVALIDITE ET DECES</a></span>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optiondoc011" id="optionsRadios021" value="YES" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_11');" <?php if($clist_docs_check[0]['doc_11']=="YES"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios021"> YES </label>
                      </div>
                      <div class="radio doc_11" style="display:inline-block">
                        <input type="radio" name="optiondoc011" id="optionsRadios022" value="NO" onclick="MyAlert(<?php echo $clist_docs_check[0]['id'] ;?>,<?php echo $appformD[0]['cl_aid'] ;?>,<?php echo $appformD[0]['loan_type'] ;?>,<?php echo $appformD[0]['admin_id'];?>,'doc_11');" <?php if($clist_docs_check[0]['doc_11']=="NO"){ echo "checked";} else { echo "";} ?>>
                        <label for="optionsRadios022"> NO </label>
                      </div>
                    </div>
                  </div>
                </div>                                                                        
            </td>
          </tr>
        </table>
        
      </div> <!-- End Tab-12 section -->
      <!-- Start Tab-13 section -->
      <div class="tab-pane fade" id="tab-13">
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
                              <h2>STEP <?php echo $i;?></h2>
                              <span style="font-weight:bold">User: </span>
                              <span><?php echo $timeline['field_data'];?> (<?php echo $timeline['first_name'] ?: '';?> <?php echo $timeline['last_name'] ?: '';?>) </span>
                              <p><span style="font-weight:bold">Comment :</span><?php echo $timeline['comment'];?></p>
                              <span class="cd-date"><?php echo $timeline['created'];?></span>
                          </div>
                      </div>
                    <?php $i++;} ?>
                  </section>
              </div>
          </div>

      </div><!-- End Tab-13 section -->

      <!-- End Tab-14 section -->

      <div class="tab-pane fade" id="tab-14">
        <h3 id="tab-title"><span>Risk Analysis</span></h3>

        <small class="analysismsg2"></small>
        <div class="row">
          <div class="col-lg-12">
            <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="analysisfilesloder2" style="display:none">

              <input id="risk_analysisfiles2" type="file" multiple="" name="risk_analysisfiles2[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">

            </label>           

            <?php if(!empty($risk_analysis)){ ?>

                <button type="button" class="btn btn-sm btn-default preview" data-toggle="modal" data-target="#AnalysisfilePreviewModal"><i class="fa fa-eye"></i> Preview</button>

                <a href="<?php echo base_url('PP_Consumer_Loans/download_analysisfiles/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>

            <?php } else { ?>

              <button type="button" class="btn btn-sm btn-default preview" id="notification_Analysispreview2"> <i class="fa fa-eye"></i> Preview</button>

              <button type="button" class="btn btn-sm btn-primary download" id="notification_analysis_download2"><i class="fa fa-cloud-download"></i> Download</button>

            <?php }?>

          </div>

        </div>

        <table class="table table-bordered table-hover" id="table_auto">
          <tr id="row_0">
            <td>
              <form action="#">
                <div class="row">
                  <div class="col-lg-6">
                    <span><a href="#">1- CIP verification</a></span>
                      <!-- <input id="avatar" class="file-loading" type="file" name="image" > -->
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optionsRadios013" id="optionsRadios025" value="optionsRadios025" checked>
                        <label for="optionsRadios025">YES</label>
                      </div>
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optionsRadios013" id="optionsRadios026" value="optionsRadios026">
                        <label for="optionsRadios026">NO</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <a href="#">2- Central Risk Verification</a>
                    <!--<input id="avatar" class="file-loading" type="file" name="image" >  -->
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optionsRadios014" id="optionsRadios027" value="optionsRadios014" checked>
                        <label for="optionsRadios027">YES</label>
                      </div>
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optionsRadios014" id="optionsRadios028" value="optionsRadios014">
                        <label for="optionsRadios028">NO</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <a href="#">3- Analysis sheet </a>
                    <!--<input id="avatar" class="file-loading" type="file" name="image" >  -->
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optionsRadios015" id="optionsRadios029" value="optionsRadios015" checked>
                        <label for="optionsRadios029">YES</label>
                      </div>
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optionsRadios015" id="optionsRadios030" value="optionsRadios015">
                        <label for="optionsRadios030">NO</label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <a href="#">4- Employer in the TARGET COMPANIES list  </a>
                    <!--<input id="avatar" class="file-loading" type="file" name="image" >  -->
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optionsRadios016" id="optionsRadios031" value="optionsRadios016" checked>
                        <label for="optionsRadios031">YES</label>
                      </div>
                      <div class="radio" style="display:inline-block">
                        <input type="radio" name="optionsRadios016" id="optionsRadios032" value="optionsRadios016">
                        <label for="optionsRadios032">NO</label>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </td>
          </tr>
        </table>
    <div class="row">
            <div class="col-md-12">
              <h3 id="tab-title"><span>For Consumer Loan-Credit & CRESCO-Scholar Loan</span></h3>
              <div class="col-md-6">
                <div class="table-responsive">
                  <table class="table table-condensed table-hover">
                    <thead>
                      <tr class="info">
                        <th><span>(Current monthly Credit and Loan Payment)</span></th>
                        <th><span>Amount</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <form id="FormCurrentmonthly2" method="post">
                      <tr>
                        <td> CRESCO </td>
                        <td>
                        <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                         <input type="number" id="cresco" value="<?php echo $riskcurrentmonthlyvrefit[0]['cresco'] ?: '0';?>" name="cresco_current" class="form-control qty12" min="0" required />
                        <?php } else { ?>
                          <input type="number" id="cresco" value="<?php echo $riskcurrentmonthlyvrefit[0]['cresco'] ?: '0';?>" name="cresco_current" class="form-control qty12" min="0" disabled readonly />
                        <?php } ?>
                      </td>
                      </tr>
                      <tr>
                        <td> DECOUVERT </td>
                        <td>
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                            <input type="number" id="DECOUVERT" value="<?php echo $riskcurrentmonthlyvrefit[0]['decouvert'] ?: '0';?>" name="decouvert_current" class="form-control" min="0" required />
                          <?php } else { ?>
                            <input type="number" id="DECOUVERT" value="<?php echo $riskcurrentmonthlyvrefit[0]['decouvert'] ?: '0';?>" name="decouvert_current" class="form-control" min="0"  disabled readonly />
                          <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <td> CMT </td>
                        <td>                          
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                            <input type="number" id="CMT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cmt'] ?: '0';?>" name="cmt_current" class="form-control qty12" min="0" required />
                          <?php } else { ?>
                            <input type="number" id="CMT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cmt'] ?: '0';?>" name="cmt_current" class="form-control qty12" min="0" disabled readonly />
                          <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <td> CCT </td>
                        <td>
                          
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                            <input type="number" id="CCT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cct'] ?: '0';?>" name="cct_current" class="form-control qty12" min="0" required />
                          <?php } else { ?>
                            <input type="number" id="CCT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cct'] ?: '0';?>" name="cct_current" class="form-control qty12" min="0"  disabled readonly />
                          <?php } ?>
                        </td>
                      </tr>
                      <tr>
                        <td> TOTAL </td>
                        <td>
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                            <input type="text" id="Ttotal2" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '0';?>" name="total_clc" class="form-control" min="0" required readonly/>
                            <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right riskcurrentmonthloder2" style="position:relative;top: -25px;left:-3px; display: none;">
                          <?php } else { ?>
                            <input type="text" id="Ttotal2" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '0';?>" name="total_clc" class="form-control" min="0" disabled readonly />
                          <?php } ?>
                        </td>
                      </tr>
                      
                      <tr>                                              
                        <td colspan=2>
                        <input type="hidden" id="Rcl_aid" value="<?php echo $appformD[0]['cl_aid'] ;?>" name="cl_aid" class="form-control"/>
                        <input type="hidden" id="Rcustomar_id" value="<?php echo $appformD[0]['customar_id'] ;?>" name="customar_id" class="form-control"/>
                        <input type="hidden" id="Rloan_type" value="<?php echo $appformD[0]['loan_type'] ;?>" name="loan_type" class="form-control"/>
                        <textarea class="showajaxrequest2 form-control" rows="10" style="display:none;" ></textarea>
                        </td>
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
                        <th><span>Monthly Payment on New Credit</span></th>
                        <th><span>Amount</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <form id="FormMonthlyNew2" method="post">
                        <tr>
                          <td> CRESCO </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <input type="number" id="cresco_monthly2" value="<?php echo $riskpaymentnewloan[0]['cresco'] ?: '0';?>" name="cresco_monthly" class="form-control qty21" min="0" required />
                            <?php } else { ?>
                              <input type="number" id="cresco_monthly2" value="<?php echo $riskpaymentnewloan[0]['cresco'] ?: '0';?>" name="cresco_monthly" class="form-control qty21" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td> DECOUVERT </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <input type="number" id="decouvert_monthly2" value="<?php echo $riskpaymentnewloan[0]['decouvert'] ?: '0';?>" name="decouvert_monthly" class="form-control " min="0" required />
                            <?php } else { ?>
                              <input type="number" id="decouvert_monthly2" value="<?php echo $riskpaymentnewloan[0]['decouvert'] ?: '0';?>" name="decouvert_monthly" class="form-control " min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td> CMT </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <input type="number" id="cmt_monthly2" value="<?php echo $riskpaymentnewloan[0]['cmt'] ?: $appformD[0]['pmnt'];?>" name="cmt_monthly" class="form-control qty21" min="0" required />
                            <?php } else { ?>
                              <input type="number" id="cmt_monthly2" value="<?php echo $riskpaymentnewloan[0]['cmt'] ?: $appformD[0]['pmnt'];?>" name="cmt_monthly" class="form-control qty21" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td> CCT </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <input type="number" id="cct_monthly" value="<?php echo $riskpaymentnewloan[0]['cct'] ?: '0';?>" name="cct_monthly" class="form-control qty21" min="0" required />
                            <?php } else { ?>
                              <input type="number" id="cct_monthly" value="<?php echo $riskpaymentnewloan[0]['cct'] ?: '0';?>" name="cct_monthly" class="form-control qty21" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td> TOTAL </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <input type="text" id="total_mlc2" value="<?php echo $riskpaymentnewloan[0]['total_mlc'] ?: $appformD[0]['pmnt'];?>" name="total_mlc" class="form-control" min="0" required readonly/>
                              <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right risknewmonthloder2" style="position:relative;top: -25px;left:-3px; display: none;">
                            <?php } else { ?>
                              <input type="text" id="total_mlc2" value="<?php echo $riskpaymentnewloan[0]['total_mlc'] ?: $appformD[0]['pmnt'];?>" name="total_mlc" class="form-control" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>                     
                        <tr>                                              
                          <td colspan=2>
                          <input type="hidden"  value="<?php echo $appformD[0]['cl_aid'] ;?>" name="rcapid" class="form-control"/>
                          <input type="hidden"  value="<?php echo $appformD[0]['customar_id'] ;?>" name="rcustomarid" class="form-control"/>
                          <input type="hidden" value="<?php echo $appformD[0]['loan_type'] ;?>" name="loan_type" class="form-control"/>
                          <textarea class="showajaxrequestnew2 form-control" rows="10" style="display:none;" ></textarea>
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
                <h3 id="tab-title"><span>FINANCIAL SITUATION</span></h3>
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
                        <form id="Formfinancial_situation2" method="post"> 
                        <tr>
                          <td> NET Salary </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <input type="number" id="net_salary2" value="<?php echo $riskfsituation[0]['net_salary'] ?: '0';?>" name="net_salary" class="form-control qty32" min="0" required>
                            <?php } else { ?>
                              <input type="number" id="net_salary2" value="<?php echo $riskfsituation[0]['net_salary'] ?: '0';?>" name="net_salary" class="form-control qty32" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td> Applicable Loan/Income Ratio </td>
                          <td>
                          <div class="input-group">
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <input type="number" id="income_ratio2" value="<?php echo $riskfsituation[0]['income_ratio'] ?: '0';?>" name="income_ratio" class="form-control qty32" min="0">
                            <?php } else { ?>
                              <input type="number" id="income_ratio2" value="<?php echo $riskfsituation[0]['income_ratio'] ?: '0';?>" name="income_ratio" class="form-control qty32" min="0" disabled readonly />
                            <?php } ?>
                            
                            <span class="input-group-addon">%</span>
                          </div>                      
                          </td>
                        </tr>
                        <tr>
                          <td> Quotit??cessible </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                             <input type="number" id="quotitecessible2" value="<?php echo $riskfsituation[0]['quotitecessible'] ?: '0';?>" name="quotitecessible" class="form-control qty32" min="0" required />
                            <?php } else { ?>
                              <input type="number" id="quotitecessible2" value="<?php echo $riskfsituation[0]['quotitecessible'] ?: '0';?>" name="quotitecessible" class="form-control qty32" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td> Current Monthly Payments </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                             <input type="text" id="current_monthly_payments2" value="<?php echo $riskfsituation[0]['current_monthly_payments'] ?: '0';?>" name="current_monthly_payments" class="form-control qty32" min="0" readonly />
                            <?php } else { ?>
                              <input type="text" id="current_monthly_payments2" value="<?php echo $riskfsituation[0]['current_monthly_payments'] ?: '0';?>" name="current_monthly_payments" class="form-control qty32" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td> New Monthly Payment </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                             <input type="number" id="new_monthly_payment2" value="<?php echo $riskfsituation[0]['new_monthly_payment'] ?: '0';?>" name="new_monthly_payment" class="form-control qty32" min="0" required />
                            <?php } else { ?>
                              <input type="number" id="new_monthly_payment2" value="<?php echo $riskfsituation[0]['new_monthly_payment'] ?: '0';?>" name="new_monthly_payment" class="form-control qty32" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr style="background:yellow">
                          <td> Total </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                             <input type="number" id="situation_total2" value="<?php echo $riskfsituation[0]['situation_total'] ?: '0';?>" name="situation_total" class="form-control qty32" min="0" required>
                            <?php } else { ?>
                              <input type="number" id="situation_total2" value="<?php echo $riskfsituation[0]['situation_total'] ?: '0';?>" name="situation_total" class="form-control qty32" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td> New Loan/Income Ratio After Project </td>
                          <td>
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                             <input type="number" id="income_ratio_after2" value="<?php echo $riskfsituation[0]['income_ratio_after'] ?: '0';?>" name="income_ratio_after" class="form-control qty32" min="0" required />
                            <?php } else { ?>
                              <input type="number" id="income_ratio_after2" value="<?php echo $riskfsituation[0]['income_ratio_after'] ?: '0';?>" name="income_ratio_after" class="form-control qty32" min="0" disabled readonly />
                            <?php } ?>
                            
                          </td>
                        </tr>
                        <tr>
                          <td style="color:green"> 
                         <!--  Coeficientendettement (Debt Ratio) -->
                         Ratio Debt
                           </td>
                          <td>
                          <div class="input-group">
                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                             <input type="text" id="coeficientendettement2" value="<?php echo $riskfsituation[0]['coeficientendettement'] ?: '0';?>" name="coeficientendettement" class="form-control qty32" min="0" required readonly />
                            <?php } else { ?>
                              <input type="text" id="coeficientendettement2" value="<?php echo $riskfsituation[0]['coeficientendettement'] ?: '0';?>" name="coeficientendettement" class="form-control qty32" min="0" disabled readonly />
                            <?php } ?>
                            
                            <span class="input-group-addon">%</span>
                          </div>  
                          <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right risksituationloder2" style="position:relative;top: -25px;left:-3px; display: none;">
                          
                          </td>
                        </tr>
                        <tr>
                        <td>
                        <input type="hidden"  value="<?php echo $appformD[0]['cl_aid'] ;?>" name="cl_aid" class="form-control"/>
                          <input type="hidden"  value="<?php echo $appformD[0]['customar_id'] ;?>" name="customer_id" class="form-control"/>
                          <input type="hidden" value="<?php echo $appformD[0]['loan_type'] ;?>" name="loan_type" class="form-control"/>
                          <textarea class="showajaxrequestnewfs2 form-control" rows="10" style="display:none;" ></textarea>
                          </td>
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
                          <th><span>Applicable Loan/Income</span></th>
                          <th><span>Ratio</span></th>
                        </tr>
                      </thead>
                      <tbody>
                <tr>
                  <td><?php echo $applicableloanratio[0]['terms'] ?: 'QUOTITE SALAIRE < 500000 F CFA';?></td>
                  <td>
                  <div class="input-group">
                    <input type="text" id="get_quotitesalaire2" value="<?php echo $applicableloanratio[0]['ratio'] ?: '33';?>" name="get_quotitesalaire" class="form-control" min="0" required readonly >
                    <span class="input-group-addon">%</span>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td> <?php echo $applicableloanratio[1]['terms'] ?: 'QUOTITE SALAIRE >500 000 F CFA';?> </td>
                  <td>
                  <div class="input-group">
                    <input type="text" id="get_quotitesalaireup2" value="<?php echo $applicableloanratio[1]['ratio'] ?: '40';?>" name="get_quotitesalaireup" class="form-control" min="0" required readonly >
                    <span class="input-group-addon">%</span>
                  </div>
                  </td>
                </tr>
                <tr>
                  <td> <?php echo $applicableloanratio[2]['terms'] ?: 'QUOTITE CLIENT AVEC CRESCO EN COURS';?></td>
                  <td>
                  <div class="input-group">
                    <input type="text" id="get_quotitesalairemore2" value="<?php echo $applicableloanratio[2]['ratio'] ?: '50';?>" name="get_quotitesalairemore" class="form-control" min="0" required readonly >
                    <span class="input-group-addon">%</span>
                  </div>
                  </td>
                </tr>
                </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>    

    </div><!-- End Tab-14 section -->
    <div class="tab-pane fade" id="tab-15">
        <div class="row">
          <div class="col-md-12">
            <div class="table-responsive">
              <table class="table table-condensed table-hover">
                <thead>
                  <tr class="info">
                    <th></th>
                    <th><span>DOCUMENTATION & TYPES GARANTIES DE CREDIT EXIGEES POUR LE PR??T</span></th>
                    <th><span>Oui</span></th>
                    <th><span>Non</span></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>DEMANDE DU CLIENT AVEC ?? SIGNATURE VERIFIEE ?? + BULLETIN DE PAIE + CNI VALIDE </td>
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
                    <td>CONVENTION DE PRET ENTRE M. DABOLE DANIELET LA BANQUE SUR LE MONTANT DE L???ENGAGEMENT.</td>
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
                  <td>Montant de la ligne de d??couvert</td>
                  <td><input type="text" id="" value="60" name="" readonly style="background: yellow;"></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Date de Valeur/Date de D??blocage</td>
                  <td>
                    <input type="text" id="" value="70" name="" readonly style="background: yellow;">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>Date 1??re??ch??ance</td>
                  <td><input type="text" id="" value="" name=""></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Date derni??re ??ch??ance</td>
                  <td>
                    <input type="text" id="" value="" name="">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>Dur??e du pr??t</td>
                  <td>
                    <input type="text" id="" value="" name="">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>Nombre ??ch??ances</td>
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
                  <td>Type de Diff??r?? (P/T/-)</td>
                  <td>
                    <input type="text" id="" value="" name="">
                  </td>
                  <td></td>
                </tr>
                <tr>
                  <td>P??riodicit?? de remboursement</td>
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
            <h3 id="tab-title"><span>2-Pr??l??vement  les frais d???assurance</span></h3>  
            <div class="table-responsive">
              <table class="table table-condensed table-hover">
                <thead>
                  <tr class="info">
                    <th>Compte</th>
                    <th><span>Libell??</span></th>
                    <th><span>Mtt FCFA</span></th>
                    <th><span>Sens</span></th>
                    <th><span>R??f??rence</span></th>
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
            <h3 id="tab-title"><span>3-Pr??l??vement les frais d???adh??sion au fonds de garantie</span></h3>  
            <div class="table-responsive">
              <table class="table table-condensed table-hover">
                <thead>
                  <tr class="info">
                    <th>Compte</th>
                    <th><span>Libell??</span></th>
                    <th><span>Mtt FCFA</span></th>
                    <th><span>Sens</span></th>
                    <th><span>R??f??rence</span></th>
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
        </div>
      </div>
      <!-- End Tab-15-->



      

      <div class="tab-pane fade" id="tab-16">

        <div class="row">

          <div class="col-md-12">

          <div class="col-md-4">

            <div class="form-group">

            <label>Please Select From Below</label>

            <select class="form-control" onChange="select_interaction_details()" id="interaction_details">

              <option value="Email" id="Email">Email</option>

              <option value="SMS" id="SMS">SMS</option>

              <option value="EntretienT??l??phonique" id="EntretienT??l??phonique">Entretien T??l??phonique</option>

            </select>

            </div>

          </div>

          </div>

        </div>



        <div class="Email" style="display:block">

          <div class="row">

          <form id="customSendmail12" method="post" enctype="multipart/form-data">

            <div class="col-md-12">

            <div class="col-md-6">

              <div class="form-group">

              <div class="input-group" style="width:100%">

                <label>Nom et Pr??noms</label>

                <input type="text" class="form-control" id="field_name2" name="field_name" placeholder="Enter Nom et Pr??noms" value="" required >

              </div>

              </div>

            </div>

            <div class="col-md-6">

              <div class="form-group">

              <div class="input-group" style="width:100%">

                <label>Email</label>

                <input class="form-control" id="fieldemail2" name="fieldemail" value="" placeholder="Enter Email" required>

              </div>

              </div>

            </div>

            <div class="col-md-6">

              <div class="form-group">

              <div class="input-group" style="width:100%">

                <label>Subject</label>

                <input type="text" class="form-control" id="fieldsubject2" name="fieldsubject" value="" placeholder="Enter Subject" required>

              </div>

              </div>

            </div>

            <div class="col-md-6">

              <div class="form-group">

              <label>Message</label>

              <div class="input-group" style="width:100%">

                <textarea type="text" class="form-control" id="fieldmsg2" name="fieldmsg" placeholder="Enter Message" required></textarea>

              </div>

              </div>

            </div>

            </div>

            <div class="col-md-12 ">

            <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

              <input type="hidden" name="cl_aid" value="<?php echo $appformD[0]['cl_aid'];?>" >

              <button type="button" id="button_3_2" class="btn btn-primary pull-right sendEmail">ENVOYER</button>

              <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right callloder_details" style="position:relative;top: 9px;left:-13px; display: none;"> </div>

            </div>

          </form>

          </div>

          <div class="getdataajax_details"></div>

          <div class="col-lg-12">

          <div class="scrollable" style="">

            <div class="table-responsive">

            <table id="table-example" class="table table-striped table-hover">

              <thead>

              <tr class="success">

                <th><span>Mode</span></th>

                <th><span>Nom et Pr??noms</span></th>

                <th><span>Email</span></th>

                <th><span>Subject</span></th>

                <th><span>Message</span></th>

                <th><span>Status</span></th>

                <th><span>Created</span></th>

              </tr>

              </thead>

              <tbody>

              <?php

        if(!empty($int_email)){

        foreach ($int_email as $keys ) {

        if($keys['mode']=='Email'){

          $key=json_decode($keys['mailcontent']);

          echo "<tr>";

            echo "<td>Email</td>";

            echo "<td>".$key[0]->field_name."</td>";

            echo "<td>".$key[0]->fieldemail."</td>";

            echo "<td>".$key[0]->fieldsubject."</td>";

            echo "<td>".$key[0]->fieldmsg."</td>";

            echo "<td>";

            if($keys['status']==1){

               echo "<span class=\"label label-success\">Success</span>"; 

             }else{

             echo "<span class=\"label label-danger\">failed</span>";

             }                           

            echo "</td>";

            echo "<td>".date("Y-m-d h:i", strtotime($keys['created']))."</td>";

           echo "</tr>";

          }

          }

        }

        ?>

              </tbody>

            </table>

            </div>

          </div>

          </div>

        </div>

        <div class="SMS" style="display:none">

          <div class="row">

          <div class="col-md-12">

            <div class="col-md-6">

            <div class="form-group">

              <div class="input-group" style="width:100%">

              <label>T??l??phone</label>

              <input type="text" class="form-control" id="account_no" placeholder="Enter T??l??phone">

              </div>

            </div>

            </div>

            <div class="col-md-6">

            <div class="form-group">

              <div class="input-group" style="width:100%">

              <label>Commentaire</label>

              <input class="form-control" id="account_no" placeholder="Enter Commentaire">

              </div>

            </div>

            </div>

          </div>

          <div class="col-md-12">

            <div class="clearfix" style="margin-top:10px;margin-bottom:10px;"> <a class="btn btn-primary pull-right">ENVOYER</a> </div>

          </div>

          </div>

        </div>

        <div class="EntretienT??l??phonique" style="display:none">

          <div class="row">

          <div class="col-md-12">

            <div class="col-md-12">

            <div class="form-group">

              <div class="input-group" style="width:100%">

              <label>Commentaire</label>

              <input type="text" class="form-control" id="account_no" placeholder="Enter Commentaire">

              </div>

            </div>

            </div>

          </div>

          <div class="col-md-12">

            <div class="clearfix" style="margin-top:10px;margin-bottom:10px;"> <a class="btn btn-primary pull-right">ENVOYER</a> </div>

          </div>

          </div>

        </div>

        </div>

        <div class="tab-pane fade" id="tab-17">

          <div style="text-align:center">----</div>

        </div>

        

        <div class="tab-pane fade" id="tab-18">

          <h3 id="tab-title"><span>INFORMATIONS SUR LE PRET</span></h3>

            <form id="loanEditForm" action="#"  method="post">

              <div class="row">

              <div class="col-md-3">

                <div class="form-group">

                <label>NATURE DU PRET</label>

                <input type="text" class="form-control" value="<?php echo $appformD[0]['ltype'];?>" readonly disabled>

                <input type="hidden" id="loan_type" name="loan_type" value="<?php echo $appformD[0]['loan_type'];?>" readonly >

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <label>MONTANT DU PRET</label>

                <div class="input-group"> <span class="input-group-addon">CFA</span>

                  <input type="number" class="form-control" id="loan_amt_d" name="loan_amt" autocomplete="off" value="<?php echo $appformD[0]['loan_amt'];?>" min="0" required>

                </div>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <label>TAUX INTERET</label>

                <div class="input-group">

                  <input type="number" class="form-control" id="loan_interest" name="loan_interest" autocomplete="off" value="<?php echo $appformD[0]['loan_interest'];?>" required min="2">

                  <span class="input-group-addon">%</span> </div>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <label>DUREE</label>

                <input type="number" class="form-control" id="loan_term" name="loan_term" autocomplete="off" value="<?php echo $appformD[0]['loan_term'];?>" required min="0" >

                </div>

              </div>

              </div>

              <div class="row">

              <div class="col-md-3">

                <div class="form-group">

                <label>PERIODICITE DE REMBOURSEMENT</label>

                <?php

              $products = array("Monthly", "Quarterly", "Half Yearly", "Yearly");

              ?>

             <select class="form-control" name="loan_schedule" id="loan_schedule" required>

                  <?php foreach($products as $item){

                if(trim($appformD[0]['loan_schedule']) == $item){ $select="selected";}else{$select="";}

                echo  '<option value="'.$item.'" '.$select.'>'.$item.'</option>';

              }?>

               </select>
                </div>
              </div>
               <div class="col-md-3">
                <div class="form-group">
                  <label>TAUX FOND DE GARANTIE</label>
                  <input type="number" class="form-control" id="loan_guarantee" name="loan_guarantee" autocomplete="off" value="<?php echo $appformD[0]['loan_guarantee'];?>" required min="0" >
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

                <input type="hidden"  id="editid" name="editid"  value="<?php echo $appformD[0]['cl_aid'];?>" readonly>

                <input type="hidden"  id="ecustomar_id" name="ecustomar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>

                <button type="button" id="button_2" class="btn btn-primary pull-right">SAVE DETAILS</button>

                <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right calculatorloder" style="position:relative;top: 9px;left:-13px; display: none;">

                </div>

              </div>

              </div>

            </form>

            <div class="editloanmsgdetails"></div>

          </div>

          <!-- Start Tab-19  -->
        <div class="tab-pane fade" id="tab-19">
          <div class="row">
            <small class="Outputmsgtab19"></small>
            <?php
            //echo "<pre>",print_r($collateral),"</pre>";
            ?>
            <div class="col-md-4">
              <div class="form-group">
                <label>Please Select From Below</label>
                <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                <select class="form-control" onChange="select_collateral_details()" id="collateral_details" name="selected_field">                    
                <option value="V??hicule" id="V??hicule">V??hicule</option>
                <option value="D??posit" id="D??posit">D??posit</option>
                <option value="Maison" id="Maison">Maison</option>
                <option value="Excemption" id="Excemption">Excemption</option>
                </select>
              <?php } else {?>
                <select class="form-control" id="" name="selected_field" readonly disabled>
                  <option value="V??hicule" id="V??hicule">V??hicule</option>
              </select>
              <?php } ?>
              </div>
            </div>
          </div>
          
          <div style="display:block" class="V??hicule">
            <div class="col-xs-12">
              <div class="col-md-12" >                    
                <form id="collateralformvehicule1" name="uploadImages" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                  <div id="field" style="margin-left: -22px;">
                    <div id="field1">
                      <!-- Text input-->
                      <div class="row" style="margin:10px 0 0 0;">
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
                           <label> Mod??le </label>
                           <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_modele', '', array('class' => 'form-control', 'placeholder' => 'Enter Mod??le', 'id' => 'vehicule_modele', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Mod??le', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>


                           
                          </div>
                        </div>
                        <!-- File Button --> 
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
                      </div>                  
                      <div class="row" style="margin:10px 0 0 0;">
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
                          <label>Ann??e </label>
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_annee', '', array('class' => 'form-control', 'placeholder' => 'Enter Ann??e', 'id' => 'vehicule_annee', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Ann??e', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>
                          
                          </div>
                        </div>                  
                        <!-- File Button --> 
                        <div class="col-md-3">
                          <div class="form-group">
                          <label> Kilom??trage </label>
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <?php echo form_input('vehicule_kilometrage', '', array('class' => 'form-control', 'placeholder' => 'Enter Kilom??trage', 'id' => 'vehicule_kilometrage', 'autocomplete'=>'off'));?>
                          <?php } else {?>                          
                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Kilom??trage', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>
                          <?php } ?>
                          
                          </div>
                        </div>
                        <!-- File Button --> 
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
                      </div>
                      <div class="row" style="margin:10px 0 0 0;">
                        <div class="col-md-3 col-md-12">
                          <div class="form-group">
                           <span style="display:block">
                            <?php if($appformD[0]['check_vehicule']!=1){
                              $disabledStatus1="disabled='disabled'";
                              $checkedY1="";
                              $checkedN1="checked='checked'";
                            }else{
                              $disabledStatus1="";
                              $checkedN1="";
                              $checkedY1="checked='checked'";
                            }
                            ?>
                            <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="vehiculeloder2" style="display:none">
                               <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>
                              <input id="vehicule_uploadfile2" class="file-upload" type="file" multiple="" name="vehicule_uploadfile[]" accept="application/msword,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*" <?= $disabledStatus1; ?>>
                            <?php }else{ ?>
                              <input  class="file-upload" type="file" disabled readonly>
                            <?php } ?>                          
                            </label>
                          </span>
                          </div>
                        </div>

                        <div class="col-md-3 col-md-12">
                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){
                              ?>
                          <div class="form-group">
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
              <textarea row="20" cols="10" class="form-control postprevievehicule2" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
                <br />
            </div>
          </div>          
                    
          <div style="display:none" class="D??posit">
            <div class="col-xs-12">                                  
              <div class="col-md-12" >
                <form id="collateralformdeposit2" method="post" enctype="multipart/form-data" style="margin-bottom:10px;margin-top:5px;">
                  <div id="fielddeposit" style="margin-left: -22px;">
                    <div id="fielddeposit2">
                      <!-- Text input-->
                      <div class="row" style="margin:10px 0 0 0;">
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Num??ro de compte </label>
                          <?php echo form_input('d_numero_de_compte', '', array('class' => 'form-control', 'placeholder' => 'Enter Num??ro de compte', 'id' => 'd_numero_de_compte', 'autocomplete'=>'off'));?>
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
                        $disabledStatusd2="disabled='disabled'";
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
                          <label>Type de propri??taire </label>
                          <?php echo form_input('m_type_de_proprietaire', '', array('class' => 'form-control', 'placeholder' => 'Enter Type de propri??taire', 'id' => 'm_type_de_proprietaire', 'autocomplete'=>'off'));?>
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
                           <label> Ann??e de construction </label>
                           <?php echo form_input('m_annee_construction', '', array('class' => 'form-control', 'placeholder' => 'Enter Ann??e de construction', 'id' => 'm_annee_construction', 'autocomplete'=>'off'));?>
                          </div>
                        </div>
                        <!-- File Button --> 
                        <div class="col-md-3">
                          <div class="form-group">
                          <label>Nombre de pi??ce</label>
                          <?php echo form_input('m_nombre_de_piece', '', array('class' => 'form-control', 'placeholder' => 'Enter Nombre de pi??ce', 'id' => 'm_nombre_de_piece', 'autocomplete'=>'off'));?>
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
                          $disabledStatusm2="disabled='disabled'";
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
                          $disabledStatuse1="disabled='disabled'";
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

            if(!empty($key1['selected_field']=="V??hicule")){ ?>
            <!-- Table V??hicule -->
            <h3 id="tab-title"><span>V??hicule</span></h3>
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="success">
                  <th><span>Type</span></th>
                  <th><span>Marque</span></th>
                  <th><span>Mod??le</span></th>
                  <th><span>Carte Grise</span></th>
                  <th><span>Style</span></th>
                  <th><span>Ann??e</span></th>
                  <th><span>Kilom??trage</span></th>
                  <th><span>Commentaire</span></th>                                        
                  <th class="text-right"><span>Action </span></th>
                  </tr>
                </thead>
                <tbody id="category-row">
                  <?php 
                    $v=1;
                    foreach($collateral as $coll){
                    //  print_r($coll);
                    if($coll['selected_field']=="V??hicule"){
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
                      <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_preview_vehicule-<?php echo $coll['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $coll['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                               
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
            if(!empty($key2['selected_field']=="D??posit")){ ?>
              <h3 id="tab-title"><span>D??posit</span></h3>
              <table class="table table-striped table-hover">
                <thead>
                  <tr class="success">                                        
                  <th><span>Num??ro de compte</span></th>
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
                  if($dept['selected_field']=="D??posit"){
                ?>
                  <tr>                                        
                  <td><?php echo $dept['d_numero_de_compte'];?></td>
                  <td><?php echo $dept['d_montant'];?></td>
                  <td><?php echo date("d/m/Y", strtotime($dept['created']));?></td>
                  <td class="text-right">
                    <div class="row">
                      <div class="form-group">
                      <span style="display:inline-block">
                        <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_preview_deposit-<?php echo $dept['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $dept['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                               
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
                  <th><span>Type de propri??taire</span></th>
                  <th><span>Etat de la maison</span></th>
                  <th><span>Ann??e de construction</span></th>
                  <th><span>Nombre de pi??ce</span></th>
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
                        <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_previewv-<?php echo $maison['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $maison['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                               
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
                      <button type="button" data-toggle="tooltip" title="Preview" class="btn btn-sm btn-default preview" id="collateral_preview_excemption-<?php echo $coll['col_id'];?>" onClick="collateral_preview_vehicule(<?php echo $coll['col_id'];?>)"> <i class="fa fa-eye"></i></button>                                               
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
      <!-- End Tab-19  -->
      <div class="tab-pane fade" id="tab-20">
          <form id="DecisionStatusdetails" method="post">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>SELECTIONNER VOTRE AVIS</label>    
                  <?php $decision2 = array("Avis Favorable","Avis d??favorable","Demande de retraitement"); ?>
                      <?php if($appformD[0]['a_review']=="0"){ ?>
                        <select class="form-control" id="decision2" name="decision">
                          <?php foreach($decision as $dec){
                            if(trim($appformD[0]['loan_status']) == $dec){ $select="selected";}
                            else{ $select=""; }
                            echo '<option value="'.$dec.'" '.$select.'>'.$dec.'</option>';
                          } ?>
                        </select>
                      <?php } 
                       else{ echo "<select class=\"form-control\" readonly disabled ><option>".$appformD[0]['loan_status']."</option></select></select>"; }
                      ?>
                </div>
              </div>
            </div>
            <div style="display:block" class="Approbation">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <div class="input-group" style="width:100%">
                      <label>Commentaire</label>
                      <?php if($appformD[0]['a_review']=="0"){ ?>
                        <input type="text" class="form-control" id="commentstatus" name="commentstatus" placeholder="Enter Commentaire" autocomplete="off" requerd />
                        <?php }
                        else { echo "<input type=\"text\" class=\"form-control\" placeholder=\"Enter Commentaire\" autocomplete=\"off\" readonly disabled />";
                      }

                         ?>                      
                    </div>
                  </div>
                </div>
                <?php if($appformD[0]['a_review']=="0"){ ?> 

                <div class="col-md-12">
                  <input type="hidden" name="cl_aid"  value="<?php echo $appformD[0]['cl_aid'];?>" readonly>
                    <input type="hidden"  id="customar_id_excemption" name="customar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>                                           
                    <input type="hidden"  id="branch_id" name="branch_id"  value="<?php echo $record[0]->branch_id;?>" readonly>

                    <input type="hidden" id="account_manager_id" name="account_manager_id"  value="<?php echo $appformD[0]['admin_id'];?>" readonly>
                    <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right commentlofer2" style="position:relative;top: -25px;left:-3px; display:inline;">
                    <button type="button" class="btn btn-primary pull-right clearfix" id="commentsubmit2" style="margin-top:10px;margin-bottom:10px;">SOUMETTRE</button>
                </div>
                <div class="col-md-12">
                  <div class="decisionmsg2"></div>
                    <textarea row="20" cols="10" class="form-control commentres2" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
                </div>
              <?php } ?>

              </div>
            </div>
          </form>
          <div class="col-lg-12">&nbsp;</div>  
          <div class="col-lg-12">
            <div class="row">
              <div class="scrollable" style="">
                <div class="table-responsive">
                  <table id="table-decision-details" class="table table-striped table-hover">
                    <thead>
                      <tr class="success">                        
                        <th><span>TYPE UTILISATEUR</span></th>
                        <th><span>UTILISATEURS</span></th>
                        <th><span>DECISION UTILISATEUR</span></th>
                        <th><span>COMMENTAIRE</span></th>
                        <th><span>DATE ACTON</span></th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      if(!empty($decision_rec)){
                      foreach ($decision_rec as $keys ) {
                          //echo "<pre>", print_r($keys),"</pre>";
                         $timetoago=$keys['modified'];
                          echo "<tr>";
                          echo "<td>".$keys['field_data']."</td>";
                          echo "<td>".$keys['first_name']."</td>";
                              echo "<td>".$keys['decision']."</td>";
                              echo "<td>".$keys['commentstatus']."</td>";
                              echo "<td>". date('d-m-Y', strtotime($keys['modified'])).':'.timeAgo($timetoago)."</td>";
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
          <div class="col-lg-12">&nbsp;</div>                                
        </div>
        <!-- End Tab-20  -->       

           <div class="tab-pane fade" id="tab-21">

          <h3 id="tab-title"><span><?php echo ucwords("Frais De Dossier"); ?></span></h3>

            <form id="fraisDeDossierForm" action="#"  method="post">

              <div class="row">

                <div class="col-md-12">
                   <div class="frais_msgdetails"></div>
                </div>

              

              <div class="col-md-3">

                <div class="form-group">

                <label>Frais De Dossier</label>
                  <div class="input-group">
                  <span class="input-group-addon">CFA</span>
                <input type="number" class="form-control" id="frais_de_dossier" name="frais_de_dossier" autocomplete="off" value="<?php echo $otherinfo[0]['frais_de_dossier'];?>" required min="0" >
                  </div>
                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <label>Frais D'Assurance</label>
                  <div class="input-group">
                  <span class="input-group-addon">CFA</span>
                <input type="number" class="form-control" id="frais_de_assurance" name="frais_de_assurance" autocomplete="off" value="<?php echo $otherinfo[0]['frais_de_assurance'];?>" required min="0" >
                  </div>
                </div>

              </div>

              </div>

              


              <div class="col-md-12">

                <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

                <input type="hidden"  id="editid" name="editid"  value="<?php echo $appformD[0]['cl_aid'];?>" readonly>

                <input type="hidden"  id="ecustomar_id" name="ecustomar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>

                <button type="button" id="frais_btn" class="btn btn-primary pull-right">SAVE DETAILS</button>

                <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right feeloder" style="position:relative;top: 9px;left:-13px; display: none;">

                </div>

              </div>

              </div>

            </form>

           

          </div>

          <!-- Start Tab-19  -->

        

      </div>

    </div>

  </div>

</div>

</div>

</div>

</div>



  <footer id="footer-bar" class="row" style="opacity: 1;">

    <p id="footer-copyright" class="col-xs-12" style="opacity: 1;">Powered by DCP.</p>

  </footer>

    </div>

<div id="filePreviewModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title heading lead">System Docs Files</h4>
      </div>
      <div class="modal-body">
        <?php if(!empty($sys_docs)){?>
        <ul class="list-group">
          <?php $i=1; foreach($sys_docs as $file1){
          //echo "<pre>", print_r($file1), "</pre>";          
          ?>
          <li class="list-group-item alert alert-success">
            <?php 
             //'pdf','doc','docx','png','jpg','jpeg'
            if($file1['file_extension']=='.pdf'){
              echo '<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
              echo "<a href='javascript:void(0)' onClick=\"javascript:window.open('".base_url('assets/consumer_loan/system-docs/').$file1['filesname']."','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return\" class='openpdf' >".$i.") ". ucwords($file1['raw_name']) ."</a>";

            }else if($file1['file_extension']=='.docx' || $file1['file_extension']=='.doc'){
              echo '<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
              echo "<a href='".base_url()."assets/consumer_loan/system-docs/".$file1['filesname']."' class='openpdf' target=\"pdf-frame\">".$i.") ". ucwords($file1['raw_name']) ."</a>";
            }
            else if($file1['file_extension']=='.jpeg' || $file1['file_extension']=='.jpg' || $file1['file_extension']=='.png'){
              echo '<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
              echo "<a href='javascript:void(0)' onClick=\"javascript:window.open('".base_url('assets/consumer_loan/system-docs/').$file1['filesname']."','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return\" class='openpdf' >".$i.") ". ucwords($file1['raw_name']) ."</a>";
            }else{
             echo $i.")". ucwords($file1['raw_name']) ;
            }
            ?>
       
          </li>
          <?php $i++; } ?>
        </ul>
        <?php }
        else{
          echo "No Record found";
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button>
        <div class="spinner-border text-success" role="status"> <span class="sr-only">Loading...</span> </div>
      </div>
      </form>
    </div>
  </div>
</div>

<div id="filePreviewModal2" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title heading lead">Check List Customer Documents</h4>
      </div>
      <div class="modal-body">
        <?php if(!empty($clist_docs)){?>
        <ul class="list-group">
          <?php $i=1; foreach($clist_docs as $file2){
          //print_r($file2);          
          ?>
          <li class="list-group-item alert alert-success">
            <?php 
          //'pdf','doc','docx','png','jpg','jpeg'
            if($file2['file_extension']=='.pdf'){
              echo '<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
              echo "<a href='javascript:void(0)' onClick=\"javascript:window.open('".base_url('assets/consumer_loan/check-list-customer/').$file2['filesname']."','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return\" class='openpdf' >".$i.") ". ucwords($file2['raw_name']) ."</a>";
            }else if($file2['file_extension']=='.docx' || $file2['file_extension']=='.doc'){
              echo '<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
              echo "<a href='".base_url()."assets/consumer_loan/check-list-customer/".$file2['filesname']."' class='openpdf' target=\"pdf-frame\">".$i.") ". ucwords($file2['raw_name']) ."</a>";
            }
            else if($file2['file_extension']=='.jpeg' || $file2['file_extension']=='.jpg' || $file2['file_extension']=='.png'){
              echo '<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
               echo "<a href='javascript:void(0)' onClick=\"javascript:window.open('".base_url('assets/consumer_loan/check-list-customer/').$file2['filesname']."','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return\" class='openpdf' >".$i.") ". ucwords($file2['raw_name']) ."</a>";
            }else{
               echo $i.") ". ucwords($file2['raw_name']);
            }
           ?>
          </li>
          <?php $i++; } ?>
        </ul>
        <?php }
        else{
          echo "No Record found";
        }
        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button>
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

<div id="AnalysisfilePreviewModal" class="modal fade" data-keyboard="false" data-backdrop="static" role="dialog">
  <div class="modal-dialog modal-full-height modal-left modal-notify modal-info"> 
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title heading lead">Risk Analysis</h4>
      </div>
      <div class="modal-body">
        <?php if(!empty($risk_analysis)){?>
        <ul class="list-group">
          <?php $i=1; foreach($risk_analysis as $filea){ 
            //echo "<pre>", print_r($filea), "</pre>";
            ?>
          <li class="list-group-item alert alert-success">
            <?php 
             //'pdf','doc','docx','png','jpg','jpeg'
              if($filea['file_extension']=='.pdf'){
                echo '<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
                 echo "<a href='javascript:void(0)' onClick=\"javascript:window.open('".base_url('assets/riskanalysis/').$filea['filesname']."','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return\" >".$i.") ". ucwords($filea['raw_name']) ."</a>";


              }else if($filea['file_extension']=='.docx' || $filea['file_extension']=='.doc'){
                echo '<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
                echo "<a href='".base_url()."assets/riskanalysis/".$filea['filesname']."' class='openpdf' target=\"pdf-frame\">".$i.") ". ucwords($filea['raw_name']) ."</a>";
              }
              else if($filea['file_extension']=='.jpeg' || $filea['file_extension']=='.jpg' || $filea['file_extension']=='.png'){
                echo '<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
                echo "<a href='javascript:void(0)' onClick=\"javascript:window.open('".base_url('assets/riskanalysis/').$filea['filesname']."','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return\" >".$i.") ". ucwords($filea['raw_name']) ."</a>";
              }else{
                     echo $i.") ". ucwords($filea['raw_name']);
                    }
            ?>
          </li>
          <?php $i++; } ?>
        </ul>
        <?php }
      else{
        echo "No Record found";
    }
    ?>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button>
        <div class="spinner-border text-success" role="status"> <span class="sr-only">Loading...</span> </div>
      </div>
      </form>
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
        <button type="button" class="btn btn-danger waves-effect waves-light"  data-dismiss="modal">Close</button>        
      </div>      
    </div>
  </div>
</div>



<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/demo.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.maskedinput.min.js"></script>
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
 
<!-- <script src="<?php //echo  base_url(); ?>assets/js/upload.js"></script> --> 

<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/collateral.custom.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/timeline.js"></script>


<script type="text/javascript">

 $(function($) {
    
    $(".phone_main_c").mask("999-99-99-99");
    $(".phone_alternate_c").mask("999-99-99-99");
  });

  // start phone number validation //

//   $(".phone_main_c").on("blur keyup",function(){
// var phoneno = /^[0-9]+$/;
// var inputval = $(this).val(); 
    
//   if(inputval.match(phoneno))
//     {
//       if(inputval.length <=10 && inputval.length >= 6)
//       {
//         $(".phone_main_error").hide();
//         $(".phone_main_valerror").hide();
//         $(".submitBtn").attr('disabled',false);
//       }
//       else
//       {
//         $(".phone_main_error").hide();
//         $(".phone_main_valerror").show();
//         $(".submitBtn").attr('disabled',true);
//       }

//     }
//   else
//     {
//       $(".phone_main_error").show();
//       $(".phone_main_valerror").hide();
//       $(".submitBtn").attr('disabled',true);
//     }
//   });

//   $(".phone_alternate_c").on("blur keyup",function(){
//   var phoneno = /^[0-9]+$/;
//   var inputval = $(this).val(); 
    
//   if(inputval.match(phoneno))
//     {
//       if(inputval.length <=10 && inputval.length >= 6)
//       {
//         $(".phone_alt_error").hide();
//         $(".phone_alt_valerror").hide();
//         $(".submitBtn").attr('disabled',false);
//       }
//       else
//       {
//         $(".phone_alt_error").hide();
//         $(".phone_alt_valerror").show();
//         $(".submitBtn").attr('disabled',true);
//       }

//     }
//   else
//     {
//       $(".phone_alt_error").show();
//       $(".phone_alt_valerror").hide();
//       $(".submitBtn").attr('disabled',true);
//     }
//   });

 // end phone number validation //

  $('button[data-toggle="tab"]').on('shown.bs.tab', function (e) {
 
  var target = $(e.target).attr("href");
    //alert(target);
    financial_situation();
    financial_situation2();
  });


  $(document).ready(function(){ 
    var befortotalCurrently   = 0;
    var befortotalMonthly  = 0;
    var befortotalcurrentlydetails = 0;
    var befortotalmonthlydetails  = 0;    
    financial_situation(); 
    financial_situation2();
    $(".rdval").html($("#coeficientendettement").val());
    $(".rdval2").html($("#coeficientendettement2").val());
    $(".qty1").each(function(){
      if($(this).val() !== ""){       
        befortotalCurrently += parseFloat($(this).val());
      }
    });
    $("#Ttotal").val(befortotalCurrently);
      $(".qty2").each(function(){      
        befortotalMonthly += parseFloat($(this).val());      
      });
    //alert(befortotalMonthly);
    $("#total_mlc").val(befortotalMonthly);
    /*===========Details Section===============*/
    $(".qty12").each(function(){
      //alert($(this).val());
      befortotalcurrentlydetails += parseFloat($(this).val());
    });    
    $("#Ttotal2").val(befortotalcurrentlydetails);

    $(".qty21").each(function(){
      //alert($(this).val());
      befortotalmonthlydetails += parseFloat($(this).val());      
    });
    $("#total_mlc2").val(befortotalmonthlydetails);
  });
</script>


<!-- Details Collateral Section -->

<script>



  $(document).on("keyup click", ".qty1", function() {  
    var sumofcurrent  = 0;
    $(".qty1").each(function(){
      if($(this).val() !== ""){
        sumofcurrent += parseFloat($(this).val());
      }else{
        $(this).val(0);
      }
    });
    $("#Ttotal").val(sumofcurrent);
    financial_situation();
    if($("#Ttotal").val() !== ""){
      $("#current_monthly_payments").val($("#Ttotal").val());
    } 
    var form = $("#FormCurrentmonthly");
    var serializedFormR =form.serialize();
    $(".riskcurrentmonthloder").css("display","inline");
    setTimeout(function() {
      
      $.ajax({
      type: "POST",
      url:'<?php echo base_url("PP_Consumer_Loans/riskanalysis_current_monthly_credit");?>',
        data:$.trim(serializedFormR),
        //contentType: false,
        cache: false,
        //processData: false,
        beforeSend: function(){
          $(".showajaxrequest").html('');
        },
        success: function(resp)
        {
          console.log(resp);
          $(".riskcurrentmonthloder").css("display","none");
          $(".showajaxrequest").html($.trim(resp));
        }

      });

    }, 500);

  });

  $(document).on("keyup click", ".qty2", function() { 
    var sumofmonthly = 0;
    $(".qty2").each(function(){
      if($(this).val() !== ""){
        sumofmonthly += parseFloat($(this).val());

      }else{
        $(this).val(0);
      }
    });
    $("#total_mlc").val(sumofmonthly);  
    financial_situation();

    if($("#total_mlc").val() !== ""){
      $("#new_monthly_payment").val($("#total_mlc").val());
    }
    var form = $("#FormMonthlyNew");
    var serializedFormR =form.serialize();
      $(".risknewmonthloder").css("display","inline");
    setTimeout(function() {
      $.ajax({
      type: "POST", 
        url:'<?php echo base_url("PP_Consumer_Loans/riskanalysis_monthly_payment_new_loan");?>',
        data:$.trim(serializedFormR),
        //contentType: false,
        cache: false,
        //processData: false,
        beforeSend: function(){
          $(".showajaxrequestnew").html('');
        },
        success: function(resp)
        {
          console.log(resp);
          $(".risknewmonthloder").css("display","none");
          $(".showajaxrequestnew").html($.trim(resp));
        }
      });
    }, 500);

  });

  $(document).on("keyup click", ".qty3", function() {
    $(".qty3").each(function(){
      if($(this).val() !== ""){
        financial_situation();
      }else{
        $(this).val(0);
      }
    });   

    var form = $("#Formfinancial_situation");
    var serializedFormRf =form.serialize(); 
    $(".risksituationloder").css("display","inline");
    setTimeout(function() {  
      $.ajax({
        type: "POST", 
        url:'<?php echo base_url("PP_Consumer_Loans/riskanalysis_financial_situation");?>',
        data:$.trim(serializedFormRf),
        cache: false,
        beforeSend: function(){
          $(".showajaxrequestnew").html('');
        },
        success: function(resp)
        {
          console.log(resp);
          $(".risksituationloder").css("display","none");
          $(".showajaxrequestnewfs").html($.trim(resp));
        }
      });
    }, 500); 

});



function financial_situation()
{

  var persentage =$("#get_quotitesalaire").val(),
  persentage1 =$("#get_quotitesalaireup").val(),
  persentage2 =$("#get_quotitesalairemore").val();  
  var net_salary=$("#net_salary").val(),
  income_ratio=$("#income_ratio").val(),
  quotitecessible=$("#quotitecessible").val();
  var cresco_monthly="<?php echo number_format($appformD[0]['pmnt'],0,',','');?>";  
  //alert(cresco_monthly);
  if($("#net_salary").val() < 500000)
  {
    $("#income_ratio").val(persentage);
  }else{
    $("#income_ratio").val(persentage1);
  } 
  var Quotit??cessible=((net_salary * income_ratio)/100);
  $("#quotitecessible").val(Quotit??cessible);
  //$("#CRESCO").val(Quotit??cessible);
  $("#cmt_monthly").val(cresco_monthly);
  
  if($("#Ttotal").val() !== ""){
    $("#current_monthly_payments").val($("#Ttotal").val());
  }  
  //alert($("#total_mlc").val());
  if($.trim($("#total_mlc").val())!== ""){
    $("#new_monthly_payment").val($("#total_mlc").val());
  }
  if($("#current_monthly_payments").val()!== "" && $("#new_monthly_payment").val()!== ""){
    $("#situation_total").val(parseFloat($("#current_monthly_payments").val())+parseFloat($("#new_monthly_payment").val()));
  } 
  $("#income_ratio_after").val(parseFloat($("#quotitecessible").val())-parseFloat($("#situation_total").val() )); 
  var t =parseFloat($("#current_monthly_payments").val())+parseFloat($("#new_monthly_payment").val());
  var t1=t/$("#net_salary").val();
  $("#coeficientendettement").val(Math.round(t1*100));
  $(".rdval").html($("#coeficientendettement").val());

}

</script>











<script type="text/javascript">
  $(document).on("keyup click", ".qty12", function() {
    var sumofcurrent  = 0;
    $(".qty12").each(function(){
      if($(this).val() !== ""){
        sumofcurrent += parseFloat($(this).val());
      }else{
        $(this).val(0);
      }
    });
    $("#Ttotal2").val(sumofcurrent);
    financial_situation2();
    if($("#Ttotal2").val() !== ""){
      $("#current_monthly_payments2").val($("#Ttotal2").val());
    } 
    var form = $("#FormCurrentmonthly2");
    var serializedFormR =form.serialize(); 
    $(".riskcurrentmonthloder2").css("display","inline");
    setTimeout(function() { 
      $.ajax({
      type: "POST", 
        url:'<?php echo base_url("PP_Consumer_Loans/riskanalysis_current_monthly_credit");?>',
        data:$.trim(serializedFormR),
        //contentType: false,
        cache: false,
        //processData: false,
        beforeSend: function(){
          $(".showajaxrequest2").html('');
        },
        success: function(resp){
          console.log(resp);
          $(".riskcurrentmonthloder2").css("display","none");
          $(".showajaxrequest2").html($.trim(resp));
        }
      });

    }, 500);

  });
  $(document).on("keyup click", ".qty21", function() {     

    var sumofmonthly = 0;

    $(".qty21").each(function(){

      if($(this).val() !== ""){

        sumofmonthly += parseFloat($(this).val());

      }else{

        $(this).val(0);

      }

    });

    $("#total_mlc2").val(sumofmonthly); 

    financial_situation2();

    if($("#total_mlc2").val() !== ""){

      $("#new_monthly_payment2").val($("#total_mlc2").val());

    }

    var form = $("#FormMonthlyNew2");
    var serializedFormR =form.serialize();  
    $(".risknewmonthloder2").css("display","inline");
    setTimeout(function() {
      $.ajax({
      type: "POST", 
        url:'<?php echo base_url("PP_Consumer_Loans/riskanalysis_monthly_payment_new_loan");?>',
        data:$.trim(serializedFormR),
        //contentType: false,
        cache: false,
        //processData: false,
        beforeSend: function(){        

          $(".showajaxrequestnew2").html('');

        },
        success: function(resp)
        {
          console.log(resp);
          $(".risknewmonthloder2").css("display","none");
          $(".showajaxrequestnew2").html($.trim(resp));
        }

      });

    }, 500);

  });
  $(document).on("keyup click", ".qty32", function() {
    $(".qty32").each(function(){
      if($(this).val() !== ""){
        financial_situation2();
      }else{
        $(this).val(0);
      }
    });   

    var form = $("#Formfinancial_situation2");
    var serializedFormRf =form.serialize(); 
    $(".risksituationloder2").css("display","inline");
      setTimeout(function() { 
        $.ajax({
          type: "POST", 
            url:'<?php echo base_url("PP_Consumer_Loans/riskanalysis_financial_situation");?>',       data:$.trim(serializedFormRf), 
            cache: false,
            beforeSend: function(){
              $(".showajaxrequestnew2").html('');
            },
            success: function(resp)
            {
              console.log(resp);
              $(".risksituationloder2").css("display","none");
              $(".showajaxrequestnewfs2").html($.trim(resp));
            }
          });
      }, 500);
  });



function financial_situation2()
{
  var persentage =$("#get_quotitesalaire2").val(),
  persentage1 =$("#get_quotitesalaireup2").val(),
  persentage2 =$("#get_quotitesalairemore2").val(); 
  var net_salary2=$("#net_salary2").val(),
  income_ratio2=$("#income_ratio2").val(),
  quotitecessible=$("#quotitecessible2").val();
   var cresco_monthly="<?php echo number_format($appformD[0]['pmnt'],0,',','');?>";  
  if($("#net_salary2").val() < 500000)
  {
    $("#income_ratio2").val(persentage);
  }else{
    $("#income_ratio2").val(persentage1);
  }

  var Quotit??cessible=((net_salary2 * income_ratio2)/100);
  $("#quotitecessible2").val(Quotit??cessible);

  $("#cmt_monthly2").val(cresco_monthly);

  if($("#Ttotal2").val() !== ""){
    $("#current_monthly_payments2").val($("#Ttotal2").val());
  }
  if($("#total_mlc2").val() !== ""){
    $("#new_monthly_payment2").val($("#total_mlc2").val());
  }
  if($("#current_monthly_payments2").val()!== "" && $("#new_monthly_payment2").val()!== ""){

    $("#situation_total2").val(parseFloat($("#current_monthly_payments").val())+parseFloat($("#new_monthly_payment2").val()));

  } 
  $("#income_ratio_after2").val(parseFloat($("#quotitecessible2").val())-parseFloat($("#situation_total2").val() ));  
  var t =parseFloat($("#current_monthly_payments2").val())+parseFloat($("#new_monthly_payment2").val());
  var t1=t/$("#net_salary2").val();
  $("#coeficientendettement2").val(parseFloat(t1*100));
  $(".rdval2").html($("#coeficientendettement2").val());
}

</script>



<script type="text/javascript">



function collateral_preview_vehicule(id)

{

  //alert(id);

  $("#filePreviewModalcollateral").modal('show');  

   $.ajax({

    type: "POST", 

      url:'<?php echo base_url("PP_Consumer_Loans/collateral_preview");?>',

      data:{id:id},     

      beforeSend: function(){         

        $('#collateral_previewv-'+id).css("opacity","0.5");

      },

      success: function(resp)

      {

        $('#collateral_previewv-'+id).css("opacity","1");

        $(".showcollateralcontent").html(resp);

      }

   });

}



function preview_collateral1(id)

{

  $("#filePreviewModalcollateral").modal('show');  

   $.ajax({

    type: "POST", 

      url:'<?php echo base_url("PP_Consumer_Loans/collateral_preview");?>',

      data:{id:id},     

      beforeSend: function(){         

        $('#collateral_previewv-'+id).css("opacity","0.5");

      },

      success: function(resp)

      {       

        $(".analysisfilemodal").html(resp);

      }

   });

}





    var number = document.querySelectorAll('input[type=number]')

    number.onkeydown = function(e) { 

    alert(e);       

        if(!((e.keyCode > 95 && e.keyCode < 106)

          || (e.keyCode > 47 && e.keyCode < 58) 

          || e.keyCode == 8)) { 

            return false;

        }

    }





$("#button_1").on("click", function(e) {
    var form = $("#loanEditForm");
     var serializedFormStr =form.serialize();
     $.ajax({
        type:'POST',
        url:'<?php echo base_url("PP_Consumer_Loans/edit_loan");?>',
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
                $('.editloanmsg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> Record update successfully!</div>');
                  setTimeout(function() {
                        location.reload();
                }, 1500);
            }else{
                $('.editloanmsg').html('<div class="alert alert-danger fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Error!</strong> '+resp+'</div>');       

            }           

        }                

    });

});



$("#button_2").on("click", function(e) {
//$('#loanEditFormdetais').submit(function(){
    var form = $("#loanEditFormdetais");

     var serializedFormStr =form.serialize();
    $.ajax({
        type:'POST',
        url:'<?php echo base_url("PP_Consumer_Loans/edit_loan");?>',
        data: $.trim(serializedFormStr),
        beforeSend: function(){
            $('#loanEditFormdetais').css("opacity","0.5");
            $('.calculatorloder').css("display","block");
        },
        success:function(resp){
           //console.log(resp);
           $(".editjson").val($.trim(resp));
           $('.calculatorloder').css("display","none");
           $('#loanEditFormdetais').css("opacity","1");
           if($.trim(resp)=='1'){
                $('.editloanmsgdetails').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> Record update successfully!</div>');
              setTimeout(function() {
                location.reload();
              }, 1500);
            }else{
                $('.editloanmsgdetails').html('<div class="alert alert-danger fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Error!</strong> '+resp+'</div>');
                setTimeout(function() { 
                    //location.reload();
                }, 3000);
            }
        }

      });

});


$("#frais_btn").on("click", function(e) {
//$('#loanEditFormdetais').submit(function(){
    var form = $("#fraisDeDossierForm");

     var serializedFormStr =form.serialize();
    /// alert(serializedFormStr);
    $.ajax({
        type:'POST',
        url:'<?php echo base_url("Loan_Frais/manage_loan_fees");?>',
        data: $.trim(serializedFormStr),
        beforeSend: function(){
            $('#fraisDeDossierForm').css("opacity","0.5");
            $('.feeloder').css("display","block");
        },
        success:function(resp){
           // console.log(resp);
           // return false;
           $(".editjson").val($.trim(resp));
           $('.feeloder').css("display","none");
           $('#fraisDeDossierForm').css("opacity","1");
           if($.trim(resp)=='1'){
                $('.frais_msgdetails').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> Record update successfully!</div>');
              setTimeout(function() {
                location.reload();
              }, 1500);
            }else{
                $('.frais_msgdetails').html('<div class="alert alert-danger fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Error!</strong> '+resp+'</div>');
                setTimeout(function() { 
                    //location.reload();
                }, 3000);
            }
        }

      });

});



  function active_tab(tabname)

  {

    $('.nav-tabs li').removeClass('active');

    $('.nav-tabs a[href="#'+tabname+'"]').tab('show');

  }





  $('#loan_tax').change(function() {  

        var tval = $(this).find(":checked").val() ;

        var fee = $("#loan_fee").val();

        var loanamt = $("#loan_amt").val();     

        var url = "<?php echo base_url('PP_Consumer_Loans/rangeofTax');?>";     

        $.post( url, { tval } ).done(function(response){           

            var ttax=(parseFloat(loanamt*($.trim(response)/100)));                    

            var Commission =(parseFloat(fee)+(ttax));            

            $("#loan_commission").val(Commission);

        

        });

    });

  

  $('#loan_tax2').change(function() {  

        var tval = $(this).find(":checked").val() ;

        var fee = $("#loan_fee2").val();

        var loanamt = $("#loan_amt_d").val();     

        var url = "<?php echo base_url('PP_Consumer_Loans/rangeofTax');?>";     

        $.post( url, { tval } ).done(function(response){           

            var ttax=(parseFloat(loanamt*($.trim(response)/100)));                    

            var Commission =(parseFloat(fee)+(ttax));            

            $("#loan_commission2").val(Commission);

        

        });

    });



</script> 



<script>

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

  

  

  function select_collateral()

  {   

    var c = $('#collateral_split').val(); 

    if(c=='V??hicule')

    {

      $('.V??hicule').show();

      $('.D??posit').hide();

      $('.Maison').hide();

      $('.Excemption').hide();  

    } 

    if(c=='D??posit')

    {

      $('.V??hicule').hide();

      $('.D??posit').show();

      $('.Maison').hide();

      $('.Excemption').hide();  

    } 

    if(c=='Maison')

    {

      $('.V??hicule').hide();

      $('.D??posit').hide();

      $('.Maison').show();

      $('.Excemption').hide();  

    } 

    if(c=='Excemption')

    {

      $('.V??hicule').hide();

      $('.D??posit').hide();

      $('.Maison').hide();

      $('.Excemption').show();  

    }

  

  }

  

  function select_collateral()

  {   

    var c = $('#collateral_split').val(); 

    if(c=='V??hicule')

    {

      $('.V??hicule').show();

      $('.D??posit').hide();

      $('.Maison').hide();

      $('.Excemption').hide();  

    } 

    if(c=='D??posit')

    {

      $('.V??hicule').hide();

      $('.D??posit').show();

      $('.Maison').hide();

      $('.Excemption').hide();  

    } 

    if(c=='Maison')

    {

      $('.V??hicule').hide();

      $('.D??posit').hide();

      $('.Maison').show();

      $('.Excemption').hide();  

    } 

    if(c=='Excemption')

    {

      $('.V??hicule').hide();

      $('.D??posit').hide();

      $('.Maison').hide();

      $('.Excemption').show();  

    }

  

  }

  

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

  

  function select_cad_decision_details()

  {   

    var c = $('#cad_decision_details').val(); 
    if(c=='avis_favorable')
    {
      $('.avis_favorable_content').show();     

    } 
    if(c=='demande_de_retraitement')

    {
      $('.avis_favorable_content').hide();    

    }

  }

  
  function select_collateral_details()
  {   
    var c = $('#collateral_details').val(); 
    if(c=='V??hicule')
    {
      $('.V??hicule').show();
      $('.D??posit').hide();
      $('.Maison').hide();
      $('.Excemption').hide();  
    } 
    if(c=='D??posit')
    {
      $('.V??hicule').hide();
      $('.D??posit').show();
      $('.Maison').hide();
      $('.Excemption').hide();  
    } 
    if(c=='Maison')
    {
      $('.V??hicule').hide();
      $('.D??posit').hide();
      $('.Maison').show();
      $('.Excemption').hide();  
    } 
    if(c=='Excemption')
    {
      $('.V??hicule').hide();
      $('.D??posit').hide();
      $('.Maison').hide();
      $('.Excemption').show();  
    } 
  }
  function select_interaction_split()

  {   

    var i = $('#interaction_split').val();  

    if(i=='Email')

    {

      $('.Email').show();

      $('.SMS').hide();

      $('.EntretienT??l??phonique').hide(); 

    } 

    if(i=='SMS')

    {

      $('.Email').hide();

      $('.SMS').show();

      $('.EntretienT??l??phonique').hide(); 

    } 

    if(i=='EntretienT??l??phonique')

    {

      $('.Email').hide();

      $('.SMS').hide();

      $('.EntretienT??l??phonique').show();

    }

  

  }

  function select_interaction_details()

  {   

    var i = $('#interaction_details').val();  

    if(i=='Email')

    {

      $('.Email').show();

      $('.SMS').hide();

      $('.EntretienT??l??phonique').hide(); 

    } 

    if(i=='SMS')

    {

      $('.Email').hide();

      $('.SMS').show();

      $('.EntretienT??l??phonique').hide(); 

    } 

    if(i=='EntretienT??l??phonique')

    {

      $('.Email').hide();

      $('.SMS').hide();

      $('.EntretienT??l??phonique').show();

    }

  

  }

  

  

  function select_decision()

  {

    

  var i = $('#decision').val();

  

  if(i=='Approbation')

  {

    $('.Approbation').show();

    $('.Rejet').hide();

    $('.Demanderetraitement').hide();

  

  }

  

  if(i=='Rejet')

  {

    $('.Approbation').hide();

    $('.Rejet').show();

    $('.Demanderetraitement').hide();

  

  }

  

  if(i=='Demanderetraitement')

  {

    $('.Approbation').hide();

    $('.Rejet').hide();

    $('.Demanderetraitement').show();

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

  return $('.list').position().left;

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

  </script> 

<script>

$('#button_3').on("click", function() {
$('.getdataajax').html('');
    var eformData = $.trim($('#customSendmail1').serialize());            

    $.ajax({
        type:'POST',
        url:'<?php echo base_url("PP_Consumer_Loans/interaction_email");?>',

        data:eformData,

        beforeSend: function(){         

            $('#customSendmail1').css("opacity","0.5");

            $('.callloder').css("display","block");

    },

    success:function(resp){                      

            console.log(resp);

            //alert(resp);

            $('#customSendmail1').css("opacity","1");

            $('.callloder').css("display","none");

             if($.trim(resp)=='success'){

                    $('.getdataajax').html('<div class="alert alert-block alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Success. </h4> Mail was sent successfully!</div>');

               setTimeout(function() {

                  location.reload();

                }, 1500);

            }else{

                $('.getdataajax').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+resp+'</div>');

                // location.reload();

            }

            

        }

        

    });

});

</script> 



<script>

$('#button_3_2').on("click", function() { 

$('.getdataajax').html('');

    var eformData = $.trim($('#customSendmail12').serialize());                    

    $.ajax({

        type:'POST',

        url:'<?php echo base_url("PP_Consumer_Loans/interaction_email");?>',

        data:eformData,

        beforeSend: function(){         

            $('#customSendmail12').css("opacity","0.5");

            $('.callloder_details').css("display","block");            

        },

        success:function(resp){                      

            //console.log(resp);

            $('#customSendmail12').css("opacity","1");

            $('.callloder_details').css("display","none");

             if($.trim(resp)=='success'){                

                $('.getdataajax_details').html('<div class="alert alert-block alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Success. </h4> Mail was sent successfully!</div>');

               setTimeout(function() {

                  location.reload();

                }, 1500);

            }else{

                $('.getdataajax_details').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+resp+'</div>');

                // location.reload();

            }            

        }

    });

});

</script> 











<script type="text/javascript">
$(document).ready(function(){

    $(document).on('change', '#systemdocsfiles', function(){   
      var cl_aid ='<?php echo $appformD[0]['cl_aid'];?>';
      var admin_id ='<?php echo $appformD[0]['admin_id'];?>';
      var customar_id ='<?php echo $appformD[0]['customar_id'];?>';   
      var name = document.getElementById("systemdocsfiles").files[0].name;

      var form_data = new FormData();
      var ext = name.split('.').pop().toLowerCase();
      if(jQuery.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg']) == -1)
      {
        alert("Invalid File type");
        return false;
      }
      var oFReader = new FileReader();
      oFReader.readAsDataURL(document.getElementById("systemdocsfiles").files[0]);
      var f = document.getElementById("systemdocsfiles").files[0];
      var fsize = f.size||f.fileSize;
        form_data.append('id', cl_aid);
        form_data.append('admin_id', admin_id);
        form_data.append('customar_id',customar_id);
        for(var i = 0; i < name.length; i++) {
          form_data.append("files[]", document.getElementById('systemdocsfiles').files[i]);
        }
        $.ajax({
          url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_split');?>",
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend:function(){
            $('.Systemfileuploaded_image').css("display","inline");
            $('.output').html('');
          },
          success:function(response)
          {
            console.log(response);
            $('.outputmsgtext').val(response);          
            var obje = JSON.parse(response);
            if(obje.success){
                  $('.Systemfileuploaded_image').css("display","none");
                  $('.outputmsg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje.success+'.</div>');
                setTimeout(function() {
                  location.reload();
                }, 1500);
            }else if(obje.Warning){
              setTimeout(function() {
                  $('.uploaded_image').css("display","none");
                  $('.outputmsg').html('<div class="alert alert-warning"><i class="fa fa-warning fa-fw fa-lg"></i><strong>Warning!</strong>'+obje.Warning+'.</div>');
                }, 1500);
            }
            else{
              setTimeout(function() {
                  $('.uploaded_image').css("display","none");
                  $('.outputmsg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+obje.error+'.</div>');
                }, 1500);
            }
          },        
          error: function (jqXHR, textStatus, errorThrown) {
            $('.outputmsgtext').val(textStatus+ errorThrown);
            $('.outputmsg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+textStatus, errorThrown+'.</div>');
          }        
        });
    });
    /*End System Docs Split Section*/ 

    $(document).on('change', '#check_list_customer_documents', function(){
      var cl_aid2 ='<?php echo $appformD[0]['cl_aid'];?>';
      var admin_id2 ='<?php echo $appformD[0]['admin_id'];?>';
      var customar_id2 ='<?php echo $appformD[0]['customar_id'];?>';    
      var fname = document.getElementById("check_list_customer_documents").files[0].name;
      var form_data = new FormData();
      var ext = fname.split('.').pop().toLowerCase();
      if(jQuery.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg','pdf']) == -1)
        {
          alert("Invalid File type");
          return false;
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("check_list_customer_documents").files[0]);
        var f = document.getElementById("check_list_customer_documents").files[0];
        var fsize = f.size||f.fileSize;          
        form_data.append('id', cl_aid2);
        form_data.append('admin_id', admin_id2);
        form_data.append('customar_id',customar_id2);
        for(var i = 0; i < fname.length; i++) {
          form_data.append("files[]", document.getElementById('check_list_customer_documents').files[i]);
        }
        $.ajax({
          url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_check_list');?>",
          method:"POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          beforeSend:function(){
            $('.uploaded_checklist_loder').css("display","inline");
            $('.outputmsg2').html('');
          },
          success:function(response)
          {
            console.log(response);
            $('.outputmsgtext').val(response);
            var obje1 = JSON.parse(response);
            if(obje1.success){
              $('.uploaded_checklist_loder').css("display","none");
              $('.outputmsg2').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje1.success+'</div>');
              setTimeout(function() {
                location.reload();
              }, 1500);
            }
            else{
              setTimeout(function() {
                $('.uploaded_checklist_loder').css("display","none");
                $('.outputmsg2').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+obje1.error+'.</div>');
              }, 1500);
            }
          }
        });
    });
      /*End Check List Customer Documents Split Section*/ 
  

  

});

</script>











<script type="text/javascript">

$(document).ready(function(){ 

  $(document).on('change', '#systemdocsfiles1', function(){

    var seg_1 ='<?php echo $appformD[0]['cl_aid'];?>';    

    var name_1 = document.getElementById("systemdocsfiles1").files[0].name;

    

    var form_data = new FormData();

    var ext = name_1.split('.').pop().toLowerCase();

    if(jQuery.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg']) == -1) 

    {

      alert("Invalid File type");

      return false;

    }

    var oFReader = new FileReader();

    oFReader.readAsDataURL(document.getElementById("systemdocsfiles1").files[0]);

    var f = document.getElementById("systemdocsfiles1").files[0];

    var fsize = f.size||f.fileSize;   

    if(fsize > 2000000){

      alert("  File Size is very big");

    }   

    else

    {   

      form_data.append('id', seg_1);

      for(var i = 0; i < name_1.length; i++) {        

        form_data.append("files[]", document.getElementById('systemdocsfiles1').files[i]);        

      }     

      $.ajax({

        url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_split');?>",

        method:"POST",

        data: form_data,

        contentType: false,

        cache: false,

        processData: false,

        beforeSend:function(){

          $('.uploaded_image_details').css("display","inline");

          $('.output').html('');

        },   

        success:function(response)

        {

          console.log(response);

          var obje = JSON.parse(response);

          if(obje.success){             

                $('.uploaded_image_details').css("display","none");

                $('.outputmsg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje.success+'.</div>');

              setTimeout(function() {

                location.reload();

              }, 1500);

          }else if(obje.Warning){

            setTimeout(function() {

                $('.uploaded_image_details').css("display","none");

                $('.outputmsg').html('<div class="alert alert-warning"><i class="fa fa-warning fa-fw fa-lg"></i><strong>Warning!</strong>'+obje.Warning+'.</div>');

              }, 1500);

          }         

          else{

            setTimeout(function() {

                $('.uploaded_image_details').css("display","none");

                $('.outputmsg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+obje.error+'.</div>');

              }, 1500);

          }       

        }

      });

      

    }

  });

  

  

  $(document).on('change', '#check_list_customer_documents1', function(){
    var segd1 ='<?php echo $appformD[0]['cl_aid'];?>';
    var Fname_1 = document.getElementById("check_list_customer_documents1").files[0].name;    
    var form_data = new FormData();
    var ext = Fname_1.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg','pdf']) == -1) 

    {
      alert("Invalid File type");
      return false;
    }

    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("check_list_customer_documents1").files[0]);
    var f = document.getElementById("check_list_customer_documents1").files[0];
    var fsize = f.size||f.fileSize;
    if(fsize > 2000000){
      alert("  File Size is very big");
    }
    else
    {
      form_data.append('id', segd1);
      for(var i = 0; i < Fname_1.length; i++) {
        form_data.append("files[]", document.getElementById('check_list_customer_documents1').files[i]);
      }
      $.ajax({
        url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_check_list');?>",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function(){
          $('.uploaded_imagechecklist_details').css("display","inline");
          $('.outputmsg2').html('');
        },
        success:function(response)
        {
          console.log(response);
          var obje1 = JSON.parse(response);
          if(obje1.success){
            $('.uploaded_imagechecklist_details').css("display","none");
            $('.outputmsg2').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje1.success+'.</div>');
          setTimeout(function() {
            location.reload();
          }, 1500);
        }
        else{
            setTimeout(function() {
                $('.uploaded_imagechecklist').css("display","none");
                $('.outputmsg2').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+obje+'.</div>');
              }, 1500);

          }
        }
      });
    }
  }); 

});

</script>


<script>
/*$('.addbutton').click(function(){
    var book_id = $("#addctype").val(); 
  if(book_id !=""){ 
    $.ajax({ 
      url:"<?php// echo base_url('PP_Consumer_Loans/addContractType');?>",
      data: {"postId": book_id},
      type: 'post',
      beforeSend:function(){
          $("#typeofcontract").css("opacity","0.5"); 
          $('.uploaded_image').css("display","inline");
      }, 
      success: function(response)
      {
        $('.uploaded_image').css("display","none");
        $("#addctype").val(''); 
        $("#typeofcontract").empty();
        console.log(response);
        var obje = JSON.parse(response);
        var len = obje.length;
        for( var i = 0; i<len; i++){
            var id = obje[i]['id'];
            var name = obje[i]['name'];
            $("#typeofcontract").append("<option value='"+id+"'>"+name+"</option>").css("opacity","1");
          }
        }
      });
  }else{
    $("#addctype").addClass("has-error")
  }
  return true;
});*/

</script>


<script type="text/javascript">
$(document).on('change', '#vehicule_uploadfile', function(){
  //alert("work properly"); 
  var aid_vehicule ='<?php echo $appformD[0]['admin_id'];?>'; 
  var file_vehicule = document.getElementById("vehicule_uploadfile").files[0].name; 
    
  var collateral =$("#collateral_split").val(); 
  var form = $("#collateralformvehicule");    
    var formdata = new FormData(form[0]);
  formdata.append('collateraltype', collateral);
  formdata.append('adminid', aid_vehicule);
  
  for(var i = 0; i < file_vehicule.length; i++) {       
    formdata.append("files[]", document.getElementById('vehicule_uploadfile').files[i]);        
  }
  $.ajax({
    url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_collateral_vehicule');?>",
    method:"POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
      $('.vehiculeloder').css("display","inline");
      $('.postprevievehicule').val('');
      $('.getdataajaxvehicule').html('');
      $('.Outputmsgtab9').html('');
    },   
    success:function(response)
    {
      console.log(response);
      $(".postprevievehicule").val($.trim(response));
      $('.vehiculeloder').css("display","none");
       var obje = JSON.parse(response);
       document.getElementById('collateralformvehicule').focus();
      if(obje.success){
        $('.Outputmsgtab9').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje.success)+'.</div>');       
        setTimeout(function() {
          location.reload();          
        }, 1500);
      }
      else{
        $('.getdataajaxvehicule').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');
        
      }  
      
    } 
  });    
}); 


$(document).on('change', '#deposit_files', function(){
  var aid_deposit ='<?php echo $appformD[0]['admin_id'];?>';  
  var file_deposit = document.getElementById("deposit_files").files[0].name; 
    
  var collateral_d =$("#collateral_split").val(); 
  var form = $("#collateralformdeposit");    
    var formdata = new FormData(form[0]);
  formdata.append('collateraltype', collateral_d);
  formdata.append('adminid', aid_deposit);
  
  for(var i = 0; i < file_deposit.length; i++) {        
    formdata.append("files[]", document.getElementById('deposit_files').files[i]);        
  }
  $.ajax({
    url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_collateral_deposit');?>",
    method:"POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,   
    beforeSend:function(){
      $('.depositloder').css("display","inline");
      $('.postpreviedeposit').val('');
      $('.getdataajaxdeposit').html('');
      $('.Outputmsgtab9').html('');
    },
    success:function(response)    
    {
      console.log(response);
      document.getElementById('collateral_split').focus();
      $(".postpreviedeposit").val($.trim(response));
      $('.depositloder').css("display","none");
       var obje = JSON.parse(response);      
      if(obje.success){
        $('.Outputmsgtab9').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje.success)+'.</div>');       
        setTimeout(function() {
          location.reload();          
        }, 1500);
      }
      else{
        $('.getdataajaxdeposit').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');
        
      } 
    }
  });    
});

$(document).on('change', '#upload_maison', function(){
  
  var cid_m ='<?php echo $appformD[0]['cl_aid'];?>';    
  var file_maison = document.getElementById("upload_maison").files[0].name; 
    
  var collateral_m =$("#collateral_split").val(); 
  var form = $("#collateralformmaison");    
    var formdata = new FormData(form[0]);
  formdata.append('collateraltype', collateral_m);  
  formdata.append('customerid', cid_m);
  for(var i = 0; i < file_maison.length; i++) {       
    formdata.append("files[]", document.getElementById('upload_maison').files[i]);        
  }
  $.ajax({
    url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_collateral_maison');?>",
    method:"POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
      $('.maisonloder').css("display","inline");
      $('.postviewmmaison').val('');
      $('.getdataajaxmaison').html('');
      $('.Outputmsgtab9').html('');
    },        
    success:function(response)    
    {
      console.log(response);
      $(".postviewmmaison").val($.trim(response));
      $('.maisonloder').css("display","none");      
      document.getElementById('collateral_split').focus();      
      var obje2 = JSON.parse(response);     
      if(obje2.success){
        $('.Outputmsgtab9').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje2.success)+'.</div>');        
        setTimeout(function() {
          location.reload();          
        }, 1500);
      }
      else{
        $('.getdataajaxmaison').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+$.trim(obje2.error)+'</div>');
        
      }
      
      
    }
  });    
});
$(document).on('change', '#excemption_files', function(){ 
  var cid_e ='<?php echo $appformD[0]['cl_aid'];?>';    
  var fileN = document.getElementById("excemption_files").files[0].name;    
  var collateral_e =$("#collateral_split").val(); 
  var form = $("#collateralformexcemption");    
    var formdata = new FormData(form[0]); 
  formdata.append('collateraltype', collateral_e);
  for(var i = 0; i < fileN.length; i++) {       
    formdata.append("files[]", document.getElementById('excemption_files').files[i]);       
  }
  $.ajax({
    url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_collateral_excemption');?>",
    method:"POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
      $('.excemptionloder').css("display","inline");
      $('.postviewexcemption').html('');    
      $('.getdataajaxexcemption').html('');
      $('.Outputmsgtab9').html('');
    },    
    success:function(response)    
    {
      console.log(response);
      $(".postviewexcemption").val($.trim(response));
      $('.excemptionloder').css("display","none");
      var obje3= JSON.parse($.trim(response));
            
      if(obje3.success){
        $('.Outputmsgtab9').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje3.success+'.</div>');
        setTimeout(function() {
          location.reload();
        }, 1500);
      }
      else{
        $('.getdataajaxexcemption').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+$.trim(obje3.error)+'</div>');
        
      }
    }
  });    
});

//================DETAILS Collateral=====================
$(document).on('change', '#vehicule_uploadfile2', function(){ 
  var aid_vehicule2 ='<?php echo $appformD[0]['admin_id'];?>';  
  var file_vehicule2 = document.getElementById("vehicule_uploadfile2").files[0].name; 
    
  var collateral2 =$("#collateral_details").val();  
  var form = $("#collateralformvehicule1");    
    var formdata = new FormData(form[0]);
  formdata.append('collateraltype', collateral2);
  formdata.append('adminid', aid_vehicule2);
  
  for(var i = 0; i < file_vehicule2.length; i++) {        
    formdata.append("files[]", document.getElementById('vehicule_uploadfile2').files[i]);       
  }
  $.ajax({
    url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_collateral_vehicule');?>",
    method:"POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
      $('.vehiculeloder2').css("display","inline");
      $('.postprevievehicule2').val('');
      $('.getdataajaxvehicule2').html('');
      $('.Outputmsgtab19').html('');
    },   
    success:function(response)
    {
      console.log(response);
      $(".postprevievehicule2").val($.trim(response));
      $('.vehiculeloder2').css("display","none");
       var obje = JSON.parse(response);
       document.getElementById('collateralformvehicule').focus();
      if(obje.success){
        $('.Outputmsgtab19').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje.success)+'.</div>');        
        setTimeout(function() {
          location.reload();          
        }, 1500);
      }
      else{
        $('.getdataajaxvehicule2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');
        
      }  
      
    } 
  });    
}); 


$(document).on('change', '#deposit_files2', function(){
  //  alert("deposit");
  var aid_deposit2 ='<?php echo $appformD[0]['admin_id'];?>'; 
  var file_deposit2 = document.getElementById("deposit_files2").files[0].name; 
    
  var collateral_d2 =$("#collateral_details").val();  
  var form = $("#collateralformdeposit2");    
    var formdata = new FormData(form[0]);
  formdata.append('collateraltype', collateral_d2);
  formdata.append('adminid', aid_deposit2);
  
  for(var i = 0; i < file_deposit2.length; i++) {       
    formdata.append("files[]", document.getElementById('deposit_files2').files[i]);       
  }
  $.ajax({
    url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_collateral_deposit');?>",
    method:"POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,   
    beforeSend:function(){
      $('.depositloder2').css("display","inline");
      $('.postpreviedeposit2').val('');
      $('.getdataajaxdeposit2').html('');
      $('.Outputmsgtab19').html('');
    },
    success:function(response)    
    {
      console.log(response);
      document.getElementById('collateral_details').focus();
      $(".postpreviedeposit2").val($.trim(response));
      $('.depositloder2').css("display","none");
       var obje = JSON.parse(response);      
      if(obje.success){
        $('.Outputmsgtab19').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje.success)+'.</div>');        
        setTimeout(function() {
          location.reload();          
        }, 1500);
      }
      else{
        $('.getdataajaxdeposit2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');
        
      } 
    }
  });    
});

$(document).on('change', '#upload_maison2', function(){ 
  var cid_m2 ='<?php echo $appformD[0]['cl_aid'];?>';   
  var file_maison2 = document.getElementById("upload_maison2").files[0].name; 
    
  var collateral_m2 =$("#collateral_details").val();  
  var form = $("#collateralformmaison2");    
    var formdata = new FormData(form[0]);
  formdata.append('collateraltype', collateral_m2); 
  formdata.append('customerid', cid_m2);
  for(var i = 0; i < file_maison2.length; i++) {        
    formdata.append("files[]", document.getElementById('upload_maison2').files[i]);       
  }
  $.ajax({
    url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_collateral_maison');?>",
    method:"POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
      $('.maisonloder2').css("display","inline");
      $('.postviewmmaison2').val('');
      $('.getdataajaxmaison2').html('');
      $('.Outputmsgtab19').html('');
    },        
    success:function(response)    
    {
      console.log(response);
      $(".postviewmmaison2").val($.trim(response));
      $('.maisonloder2').css("display","none");     
      document.getElementById('collateral_details').focus();      
      var obje2 = JSON.parse(response);     
      if(obje2.success){
        $('.Outputmsgtab19').html('<div class="alert alert-success fade in"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obje2.success)+'.</div>');       
        setTimeout(function() {
          location.reload();          
        }, 1500);
      }
      else{
        $('.getdataajaxmaison2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+$.trim(obje2.error)+'</div>');
        
      }
      
      
    }
  });    
});

$(document).on('change', '#excemption_files2', function(){  
  var cid_e2 ='<?php echo $appformD[0]['cl_aid'];?>';   
  var fileN2 = document.getElementById("excemption_files2").files[0].name;    
  var collateral_e2 =$("#collateral_details").val();  
  var form = $("#collateralformexcemption2");    
    var formdata = new FormData(form[0]); 
  formdata.append('collateraltype', collateral_e2);
  for(var i = 0; i < fileN2.length; i++) {        
    formdata.append("files[]", document.getElementById('excemption_files2').files[i]);        
  }
  $.ajax({
    url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_collateral_excemption');?>",
    method:"POST",
    data: formdata,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
      $('.excemptionloder2').css("display","inline");
      $('.postviewexcemption2').html('');   
      $('.getdataajaxexcemption2').html('');
      $('.Outputmsgtab19').html('');
    },    
    success:function(response)    
    {
      console.log(response);
      $(".postviewexcemption2").val($.trim(response));
      $('.excemptionloder2').css("display","none");
      var obje3= JSON.parse($.trim(response));
            
      if(obje3.success){
        $('.Outputmsgtab19').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje3.success+'.</div>');
        setTimeout(function() {
          location.reload();
        }, 1500);
      }
      else{
        $('.getdataajaxexcemption2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">??</button><h4>Error! You got an error!</h4>'+$.trim(obje3.error)+'</div>');
        
      }
    }
  });    
});
</script>

<script type="text/javascript">

$(document).ready(function(){  
  $(document).on('change', '#risk_analysisfiles', function(){
    var cidr ='<?php echo $appformD[0]['cl_aid'];?>';
    var namer = document.getElementById("risk_analysisfiles").files[0].name;
    var form_data = new FormData();
    var ext = namer.split('.').pop().toLowerCase();
    if(jQuery.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg']) == -1)
    {
      alert("Invalid File type");
      return false;
    }
    var oFReader = new FileReader();

    oFReader.readAsDataURL(document.getElementById("risk_analysisfiles").files[0]);

    var f = document.getElementById("risk_analysisfiles").files[0];

    var fsize = f.size||f.fileSize;   

   /* if(fsize > 2000000){
      alert("  File Size is very big");
    } */  

    //else    {

      form_data.append('customerid', cidr);
      for(var i = 0; i < namer.length; i++) {
      form_data.append("files[]", document.getElementById('risk_analysisfiles').files[i]);
      }     

      $.ajax({
        url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_risk_analysis');?>",
        method:"POST",
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend:function(){
          $('.analysisfilesloder').css("display","inline");
          $('.outputmsgR').html('');
        },
        success:function(response)
        {
          console.log(response);
          $('.outputmsgR').val($.trim(response));
          $('.analysisfilesloder').css("display","none");
          var obje1 = JSON.parse(response);
          if(obje1.success){
            $('.analysismsg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje1.success+'.</div>');
            setTimeout(function() {
              location.reload();
            }, 1500);
          }
          else{

            setTimeout(function() {           

              $('.analysismsg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+obje1.error+'.</div>');

            }, 1500);

          }

          

                  

        }

      });

      

    //}

  });  

});







$(document).ready(function(){     

  $(document).on('change', '#risk_analysisfiles2', function(){    

    var cidr ='<?php echo $appformD[0]['cl_aid'];?>';     

    var namer = document.getElementById("risk_analysisfiles2").files[0].name;

    

    var form_data = new FormData();

    var ext = namer.split('.').pop().toLowerCase();

    if(jQuery.inArray(ext, ['pdf','doc','docx','png','jpg','jpeg']) == -1) 

    {

      alert("Invalid File type");

      return false;

    }

    var oFReader = new FileReader();

    oFReader.readAsDataURL(document.getElementById("risk_analysisfiles2").files[0]);

    var f = document.getElementById("risk_analysisfiles2").files[0];

    var fsize = f.size||f.fileSize;   

    if(fsize > 2000000){

      alert("  File Size is very big");

    }   

    else

    {

      form_data.append('customerid', cidr);     

      for(var i = 0; i < namer.length; i++) {       

      form_data.append("files[]", document.getElementById('risk_analysisfiles2').files[i]);       

      }     

      $.ajax({

        url:"<?php echo base_url('PP_Consumer_Loans/uploadfile_risk_analysis');?>",

        method:"POST",

        data: form_data,

        contentType: false,

        cache: false,

        processData: false,

        beforeSend:function(){

          $('.analysisfilesloder2').css("display","inline");

          $('.outputmsgR2').html('');

        },   

        success:function(response)

        {

          console.log(response);

          $('.outputmsgR2').val($.trim(response));

          $('.analysisfilesloder2').css("display","none");

          var obje1 = JSON.parse(response);

          if(obje1.success){

            $('.analysismsg2').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+obje1.success+'.</div>');

            setTimeout(function() {

              location.reload();

            }, 1500);
          }
          else{
            setTimeout(function() {
              $('.analysismsg2').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+obje1.error+'.</div>');

            }, 1500);
          }
        }
      });
    }
  });
});



/*Additional Information Type d???identification split Section */
  $('#type_id').on('change',function(){    
    var ai_id ='<?php echo $adinfo[0]['ai_id'];?>';
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';    
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var select_val=$(this).val();
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/changetypeid') ?>",
            data:{'ai_id':ai_id,'customar_id':customar_id,'select_val': select_val,'cl_aid':cl_aid },
             beforeSend: function(){
              $('#type_id').addClass("lodertypeof");                     
            },
            success: function(result){
              console.log(result);
              $('#type_id').removeClass("lodertypeof");
              if(result==1){ //notice, warning, success or error
              notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Additional Information Type d???identification update successfully.</p>','success');
                $("#type_id2").prepend('<option value=' + select_val + ' selected >' + select_val + '</option>');  
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>some error occurred Additional Information Type d???identification.</p>','error');
              }            
            }        
        });
      }
  });

  /* Type d???identification Details Section */
  $('#type_id2').on('change',function(){    
    var ai_id ='<?php echo $adinfo[0]['ai_id'];?>'; 
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var select_val=$(this).val();
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/changetypeid') ?>",
            data:{'ai_id':ai_id,'customar_id':customar_id,'select_val': select_val,'cl_aid':cl_aid  },
             beforeSend: function(){
              $('#type_id2').addClass("lodertypeof");                     
            },
            success: function(result){
              console.log(result);
              $('#type_id2').removeClass("lodertypeof");
              if(result==1){ //notice, warning, success or error
              notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Additional Information Type d???identification update successfully.</p>','success'); 
              $("#type_id").prepend('<option value=' + select_val + ' selected>' + select_val + '</option>'); 
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred Additional Information Type d???identification.</p>','error');
              }            
            }        
        });
      }
  });
  /*End Additional Information Type d???identification all Section */



  /*Employment Information Secteurs split Section */
  $('#secteurs').on('change',function(){    
    var ai_id ='<?php echo $empinfo[0]['emp_infoid'];?>';
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var select_val=$(this).val();
    var valname=$(this).find('option:selected').attr("name");
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/changesecteurs') ?>",
            data:{'ai_id':ai_id,'customar_id':customar_id,'select_val': select_val, 'cl_aid':cl_aid},
             beforeSend: function(){
              $('#secteurs').addClass("lodertypeof");                     
            },
            success: function(result){
              console.log(result);
              $('#secteurs').removeClass("lodertypeof");
              if(result==1){ //notice, warning, success or error
              notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Employment Information `Secteurs` update successfully.</p>','success'); 
              $("#secteurs2").prepend('<option value=' + select_val + ' selected>' + valname + '</option>'); 
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred Employment Information `secteurs`.</p>','error');
              }            
            }        
        });
      }
  });

  /*Employment Information Secteurs Details Section */
  $('#secteurs2').on('change',function(){    
    var ai_id ='<?php echo $empinfo[0]['emp_infoid'];?>';    
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';
    var select_val=$(this).val();
    var valname=$(this).find('option:selected').attr("name");
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/changesecteurs') ?>",
            data:{'ai_id':ai_id,'customar_id':customar_id,'select_val': select_val , 'cl_aid':cl_aid },
             beforeSend: function(){
              $('#secteurs2').addClass("lodertypeof");                     
            },
            success: function(result){
              console.log(result);
              $('#secteurs2').removeClass("lodertypeof");
              if(result==1){ //notice, warning, success or error
              notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Employment Information `Secteurs` update successfully.</p>','success'); 
              $("#secteurs").prepend('<option value=' + select_val + ' selected>' + valname + '</option>'); 
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred Employment Information `secteurs`.</p>','error');
              }            
            }        
        });
      }
  });
  /*End Employment Information Secteurs All Section */

  /*Employment Information Cat??gorie Employeurs Split Section */
  $('#cat_employeurs').on('change',function(){    
    var emp_infoid ='<?php echo $empinfo[0]['emp_infoid'];?>'; 
     var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';   
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var select_val=$(this).val();
    var valname=$(this).find('option:selected').attr("name");
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/changecat_employeurs') ?>",
            data:{'emp_infoid':emp_infoid,'customar_id':customar_id,'select_val': select_val , 'cl_aid':cl_aid},
             beforeSend: function(){
              $('#cat_employeurs').addClass("lodertypeof");                     
            },
            success: function(result){
              console.log(result);
              $('#cat_employeurs').removeClass("lodertypeof");
              if(result==1){ //notice, warning, success or error
              notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Employment Information `Cat??gorie Employeurs` Update Successfully.</p>','success'); 
              $("#cat_employeurs2").prepend('<option value=' + select_val + ' selected>' + valname + '</option>'); 
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred Employment Information `Cat??gorie Employeurs`.</p>','error');
              }            
            }        
        });
      }
  });

  /*Employment Information Cat??gorie Employeurs Details Section */
  $('#cat_employeurs2').on('change',function(){    
    var emp_infoid ='<?php echo $empinfo[0]['emp_infoid'];?>'; 
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';   
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var select_val=$(this).val();
    var valname=$(this).find('option:selected').attr("name");
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/changecat_employeurs') ?>",
            data:{'emp_infoid':emp_infoid,'customar_id':customar_id,'select_val': select_val,'cl_aid':cl_aid},
             beforeSend: function(){
              $('#cat_employeurs2').addClass("lodertypeof");                     
            },
            success: function(result){
              console.log(result);
              $('#cat_employeurs2').removeClass("lodertypeof");
              if(result==1){ //notice, warning, success or error
              notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Employment Information `Cat??gorie Employeurs` Update Successfully.</p>','success'); 
              $("#cat_employeurs").prepend('<option value=' + select_val + ' selected>' + valname + '</option>'); 
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred Employment Information `Cat??gorie Employeurs`.</p>','error');
              }            
            }        
        });
      }
  });
  /*Employment Information Cat??gorie Employeurs All Section */

  /*Employment Information Type de Contrat split Section */
  $('#typeofcontract').on('change',function(){    
    var emp_infoid ='<?php echo $empinfo[0]['emp_infoid'];?>';    
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';   
    var select_val=$(this).val();
    var valname=$(this).find('option:selected').attr("name");
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/change_type_of_contract') ?>",
            data:{'emp_infoid':emp_infoid,'customar_id':customar_id,'select_val': select_val,'cl_aid':cl_aid },
             beforeSend: function(){
              $('#typeofcontract').addClass("lodertypeof");                     
            },
            success: function(result){
              console.log(result);
              $('#typeofcontract').removeClass("lodertypeof");
              if(result==1){ //notice, warning, success or error
              notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Employment Information `Type de Contrat` Update Successfully.</p>','success'); 
              $("#typeofcontract2").append('<option value=' + select_val + ' selected>' + valname + '</option>'); 
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred Employment Information `Type de Contrat`.</p>','error');
              }            
            }        
        });
      }
  });

  /*Employment Information Type de Contrat split Section */
  $('#typeofcontract2').on('change',function(){    
    var emp_infoid ='<?php echo $empinfo[0]['emp_infoid'];?>';    
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';
    var select_val=$(this).val();
    var valname=$(this).find('option:selected').attr("name");
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/change_type_of_contract') ?>",
            data:{'emp_infoid':emp_infoid,'customar_id':customar_id,'select_val': select_val,'cl_aid':cl_aid },
             beforeSend: function(){
              $('#typeofcontract2').addClass("lodertypeof");                     
            },
            success: function(result){
              console.log(result);
              $('#typeofcontract2').removeClass("lodertypeof");
              if(result==1){ //notice, warning, success or error
              notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Employment Information `Type de Contrat` Update Successfully.</p>','success'); 
              $("#typeofcontract").append('<option value=' + select_val + ' selected>' + valname + '</option>'); 
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred Employment Information `Type de Contrat`.</p>','error');
              }            
            }        
        });
      }
  });
  /*Employment Information Type de Contrat All Section */

  /*Other Information Objet du cr??dit split Section */
  $('#obj_credit').on('change',function(){    
    var oid ='<?php echo $otherinfo[0]['oid'];?>';
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';    
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var select_val=$(this).val();
    
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/change_objet_of_the_credit') ?>",
            data:{'oid':oid,'customar_id':customar_id,'select_val': select_val,'cl_aid':cl_aid },
             beforeSend: function(){
              $('#obj_credit').addClass("lodertypeof"); 
              $(".objerror").val("");                    
            },
            success: function(result){
              console.log(result);
              $('#obj_credit').removeClass("lodertypeof");              
              var objc = JSON.parse(result);
              var len = objc.length;              
              $(".objerror").val($.trim(result));              
              $("#obj_credit").empty();
              $("#obj_credit2").empty();             
              if(objc.error!='error'){
                for( var i = 0; i<len; i++){                           
                    var name = objc[i]['name']; 
                    if(select_val==name){ var select="selected"; }else{ select="";}                   
                    $("#obj_credit").append("<option value='"+name+"' "+select+">"+name+"</option>");
                    $("#obj_credit2").append("<option value='"+name+"' "+select+">"+name+"</option>");
                }
                 notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Other Information `Objet du cr??dit` Update Successfully.</p>','success');
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred  Other Information `Objet du cr??dit`.</p>','error');
              }                       
            }        
        });
      }
  });

  /*Other Information Objet du cr??dit split Section */
  $('#obj_credit2').on('change',function(){    
    var oid ='<?php echo $otherinfo[0]['oid'];?>';  
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    var select_val=$(this).val();    
    if(select_val!=""){
         $.ajax({
            type: "POST",
            url: "<?php echo base_url('PP_Consumer_Loans/change_objet_of_the_credit') ?>",
            data:{'oid':oid,'customar_id':customar_id,'select_val': select_val,'cl_aid':cl_aid },
             beforeSend: function(){
              $('#obj_credit2').addClass("lodertypeof"); 
              $(".objerror").val("");                    
            },
            success: function(result){
              console.log(result);
              $('#obj_credit2').removeClass("lodertypeof");              
              var objc = JSON.parse(result);
              var len = objc.length;              
              $(".objerror").val($.trim(result));              
              $("#obj_credit").empty();
              $("#obj_credit2").empty();             
              if(objc.error!='error'){
                for( var i = 0; i<len; i++){                           
                    var name = objc[i]['name']; 
                    if(select_val==name){ var select="selected"; }else{ select="";}                
                    $("#obj_credit").append("<option value='"+name+"' "+select+">"+name+"</option>");
                    $("#obj_credit2").append("<option value='"+name+"' "+select+">"+name+"</option>");
                }
                 notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>Other Information `Objet du cr??dit` Update Successfully.</p>','success');
              }else{
                notificationcall('<span class="icon fa fa-times-circle fa-2x"></span><p>Some error occurred  other information `Objet du cr??dit`.</p>','error');
              }                       
            }        
        });
      }
  });
  /*End Other Information Objet du cr??dit All Section */

  /*Other Information FRAIS d?? DOSSIER Split Section */
  $('#frais_de_dossier').on('keyup click', function(){    
    $("#frais_de_dossier").css("background-color", "#e9ffe9");
      var editid ='<?php echo $otherinfo[0]['oid'];?>';
      var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';
      var customar_id ='<?php echo $appformD[0]['customar_id'];?>';    
      var getval = $("#frais_de_dossier").val(); 
        $.ajax({
          type: "POST", 
            url:'<?php echo base_url("PP_Consumer_Loans/postupdate_fees");?>',
            data:{'id':editid, 'data': getval,'cl_aid':cl_aid, 'customar_id':customar_id},     
            beforeSend: function(){   
              $('.showhide').css("display","inline-block");      
              $('.updateloder').css("display","inline");          
            },
            success: function(resp)
            {
               // alert(resp);
              $("#frais_de_dossier").css("background-color", "");
              $('.updateloder').css("display","none");
              $('.showhide').css("display","none"); 
              $("#frais_de_dossier1").val(getval);
               //setTimeout(function() {                
                   // location.reload();
              notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>frais de dossier update successfully.</p>','success');
                //}, 100);
            }
         });
  });
  $('#frais_de_dossier1').on('keyup click', function(){
   //$("#frais_de_dossier1").keyup(function(){
    $("#frais_de_dossier1").css("background-color", "#e9ffe9");
    var editid ='<?php echo $otherinfo[0]['oid'];?>'; 
    var getval = $("#frais_de_dossier1").val();
    var cl_aid='<?php echo $appformD[0]['cl_aid'];?>';
    var customar_id ='<?php echo $appformD[0]['customar_id'];?>';
    $.ajax({
      type: "POST", 
        url:'<?php echo base_url("PP_Consumer_Loans/postupdate_fees");?>',
         data:{'id':editid, 'data': getval,'cl_aid':cl_aid, 'customar_id':customar_id},     
        beforeSend: function(){   
          $('.showhide1').css("display","inline-block");      
          $('.updateloder1').css("display","inline");
          
        },
        success: function(resp)
        {
          $("#frais_de_dossier1").css("background-color", "");
          $('.updateloder1').css("display","none");
          $('.showhide1').css("display","none"); 
          $("#frais_de_dossier").val(getval);
          // setTimeout(function() {                
                //location.reload();
            notificationcall('<span class="icon fa fa-check-circle fa-2x"></span><p>frais de dossier update successfully.</p>','success');
               // }, 100);
        }
     });
  });

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

  $(document).ready(function()
  {
    var capid="<?php echo $appformD[0]['cl_aid'];?>";
    $(".check_options").click(function(){    
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios0001").prop("checked", true);
         $("#optionsRadios0002").prop("checked", false);
         $("#vehicule_uploadfile").attr("disabled", false);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'V??hicule', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options2").click(function(){
        var valn=$(this).val();        
        if (confirm("Are You Sure You Want to Do This!")) {
          $("#optionsRadios0002").prop("checked", true);
          $("#optionsRadios0001").prop("checked", false);
          $("#vehicule_uploadfile").attr("disabled", 'disabled').css('opacity', '0.5', 'cursor', 'not-allowed');
          $.ajax({
            type:'POST',       
            data:{'capid':capid,'post':'V??hicule', 'val': valn},
            url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
            cache: false,
            success: function(data){
              console.log(data);
              //$("#results").append(html);
            }
          });
      }
    });
    $(".check_options3").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios0003").prop("checked", true);
         $("#optionsRadios0004").prop("checked", false);
         $("#deposit_files").attr("disabled", false);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'D??posit', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options4").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios0004").prop("checked", true);
         $("#optionsRadios0003").prop("checked", false);
         $("#deposit_files").attr("disabled", true);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'D??posit', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options5").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios0005").prop("checked", true);
         $("#optionsRadios0006").prop("checked", false);
         $("#upload_maison").attr("disabled", false);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'Maison', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options6").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios0006").prop("checked", true);
         $("#optionsRadios0005").prop("checked", false);
         $("#upload_maison").attr("disabled", true);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'Maison', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options7").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios0007").prop("checked", true);
         $("#optionsRadios0008").prop("checked", false);
         $("#excemption_files").attr("disabled", false);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'Excemption', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options8").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios0008").prop("checked", true);
         $("#optionsRadios0007").prop("checked", false);
         $("#excemption_files").attr("disabled", true);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'Excemption', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    /*In Details Page */

    $(".check_options01").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios000101").prop("checked", true);
         $("#optionsRadios000202").prop("checked", false);
         $("#vehicule_uploadfile2").attr("disabled", false);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'V??hicule', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options02").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios000202").prop("checked", true);
         $("#optionsRadios000101").prop("checked", false);
         $("#vehicule_uploadfile2").attr("disabled", true);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'V??hicule', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options03").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios000303").prop("checked", true);
         $("#optionsRadios000404").prop("checked", false);
         $("#deposit_files2").attr("disabled", false);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'D??posit', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options04").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios000404").prop("checked", true);
         $("#optionsRadios000303").prop("checked", false);
         $("#deposit_files2").attr("disabled", true);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'D??posit', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options05").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios000505").prop("checked", true);
         $("#optionsRadios000606").prop("checked", false);
         $("#upload_maison2").attr("disabled", false);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'Maison', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options06").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios000606").prop("checked", true);
         $("#optionsRadios000505").prop("checked", false);
         $("#upload_maison2").attr("disabled", true);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'Maison', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options07").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios000707").prop("checked", true);
         $("#optionsRadios000808").prop("checked", false);
         $("#excemption_files2").attr("disabled", false);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'Excemption', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
    $(".check_options08").click(function(){      
      var valn=$(this).val();  
      if (confirm("Are You Sure You Want to Do This!")) {   
        $("#optionsRadios000808").prop("checked", true);
         $("#optionsRadios000707").prop("checked", false);
         $("#excemption_files2").attr("disabled", true);
          $.ajax({
          type:'POST',       
          data:{'capid':capid,'post':'Excemption', 'val': valn},
          url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled");?>',
          cache: false,
          success: function(data){
            console.log(data);
            //$("#results").append(html);
          }
        });
        }
    });
});



  $("#commentsubmit").on("click", function(e) {    
    var form = $("#DecisionStatus");           
     var serializedFormStr =form.serialize();
     $.ajax({
        type:'POST',
        url:'<?php echo base_url("PP_Consumer_Loans/comment_manager");?>',
        data: $.trim(serializedFormStr),
        beforeSend: function(){         
            $('#DecisionStatus').css("opacity","0.5"); 
            $('.commentlofer').css("display","inline");
            $('.commentres').val("");
            $('.decisionmsg').html("");
        },
        success:function(resp){                      
            console.log(resp);
            $('#DecisionStatus').css("opacity","");
            $('.commentlofer').css("display","none"); 
            $('.commentres').val($.trim(resp)); 
            $("#DecisionStatus")[0].reset(); 
            var obj=JSON.parse(resp);
            if($.trim(obj.success)){
              $('.decisionmsg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obj.success)+'.</div>');
              setTimeout(function() {
                location.reload();
              }, 1500);
            }
          else{                       
              $('.decisionmsg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error! </strong>'+$.trim(obj.error)+'.</div>');
            }               
        }                
    });
});



   $("#commentsubmit2").on("click", function(e) {    
    var form = $("#DecisionStatusdetails");           
     var serializedFormStr =form.serialize();
     $.ajax({
        type:'POST',
        url:'<?php echo base_url("PP_Consumer_Loans/comment_manager");?>',
        data: $.trim(serializedFormStr),
        beforeSend: function(){         
            $('#DecisionStatusdetails').css("opacity","0.5"); 
            $('.commentlofer2').css("display","inline");
            $('.commentres2').val("");
            $('.decisionmsg2').html("");
        },
        success:function(resp){                      
            console.log(resp);
            $('#DecisionStatusdetails').css("opacity",""); 
            $('.commentres2').val($.trim(resp)); 
             $("#DecisionStatusdetails")[0].reset();
            var obj=JSON.parse(resp);
            if($.trim(obj.success)){
              $('.decisionmsg2').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obj.success)+'.</div>');
              setTimeout(function() {
                location.reload();
              }, 1500);
            }
          else{                       
              $('.decisionmsg2').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong>'+$.trim(obj.error)+'.</div>');
            }               
        }                
    });
});
</script>

<script type="text/javascript">
  function notificationcallsplit(data, status)
  {
      var notification = new NotificationFx({
          message : data,
          layout : 'attached',
          effect : 'flip',
          type : status          
        });
          notification.show();
          this.disabled = true;
  }
</script>

<script type="text/javascript">



  var editIDCheckoption='<?php echo $clist_docs_check[0]["id"] ;?>';
  if(editIDCheckoption==""){
    notificationcallsplit('<span class="icon fa fa-exclamation-triangle fa-2x"></span><p>CHECK LIST DOCUMENTS A FOURNIR its not update all check radio field. Please go to "Loan Information PP" form -> Calculator Tab and update your loan.</p>','warning');
  }
  function MyAlert(editid,loanid,loantype,adminid,option) {
      var pass_data=$('input[type="radio"]:checked').val();    
      $.ajax({
        type:'POST',       
        data:{'editid':editid,'loanid':loanid,'loantype':loantype,'adminid':adminid,'option':option,'pass_data':pass_data},
        url:'<?php echo base_url("PP_Consumer_Loans/enableddisabled_documentbutton");?>',
        cache: false,
        beforeSend: function(){
          $('.'+option+'').addClass("lodertypeof");                     
        },
        success: function(data){
          console.log(data);
          $('.'+option+'').removeClass("lodertypeof");
          //$("#results").append(html);
        }
      });
    }
   
</script>


</body>
</html>