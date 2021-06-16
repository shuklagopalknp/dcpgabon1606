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
</style>
<title></title>
<div id="content-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <div id="content-header" class="clearfix">
        <div class="col-md-9">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url('DashboardGlobal');?>">TABLEAU DE BORD</a></li>
			<li><a href="<?php echo base_url('PP_Consumer_Global_User/consumerloan');?>">Consumer Loan</a></li>
            <li class="active"><span>Détails du client</span></li>
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
                $sumofInterestPaidbeforTax =0;
                $sumofVATonInterest=0;  
                if(!empty($appformD[0]['databinding'])){
                    $databinding=json_decode($appformD[0]['databinding']);
                foreach ($databinding as $keydata)
                {
                    $sumofInterestPaidbeforTax +=$keydata->interest_paid_befor_tax;
                    $sumofVATonInterest +=$keydata->vat_on_interest;
                   
                }
                }
            //echo $sumofInterestBeforeTaxes;
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
                      <tr>
                        <td>Mr TEST CA TEST</td>
                        <td>7 mois</td>
                        <td>1000.00</td>
                        <td>Approve&aacute;</td>
                        <td>Intitial</td>
                        <td>30</td>
                        <td>16-06-2019</td>
                      </tr>
                      <tr>
                        <td>CA TEST</td>
                        <td>7 mois</td>
                        <td>1000.00</td>
                        <td>Approve&aacute;</td>
                        <td>Intitial</td>
                        <td>30</td>
                        <td>16-06-2019</td>
                      </tr>
                      <tr>
                        <td>TEST USER</td>
                        <td>2 mois</td>
                        <td>500.00</td>
                        <td>Approve&aacute;</td>
                        <td>Intitial</td>
                        <td>05</td>
                        <td>20-05-2019</td>
                      </tr>
                      <tr>
                        <td>Mr CA</td>
                        <td>5 mois</td>
                        <td>4000.00</td>
                        <td>Approve&aacute;</td>
                        <td>Intitial</td>
                        <td>10</td>
                        <td>25-05-2019</td>
                      </tr>
                      <tr>
                        <td>Mr TEST</td>
                        <td>9 mois</td>
                        <td>3000.00</td>
                        <td>Approve&aacute;</td>
                        <td>Intitial</td>
                        <td>40</td>
                        <td>06-07-2019</td>
                      </tr>
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
                                <tr>
                                  <td>Mr TEST CA TEST</td>
                                  <td>7 mois</td>
                                  <td>1000.00</td>
                                  <td>Approve&aacute;</td>
                                  <td>Intitial</td>
                                  <td>30</td>
                                  <td>16-06-2019</td>
                                </tr>
                                <tr>
                                  <td>CA TEST</td>
                                  <td>7 mois</td>
                                  <td>1000.00</td>
                                  <td>Approve&aacute;</td>
                                  <td>Intitial</td>
                                  <td>30</td>
                                  <td>16-06-2019</td>
                                </tr>
                                <tr>
                                  <td>TEST USER</td>
                                  <td>2 mois</td>
                                  <td>500.00</td>
                                  <td>Approve&aacute;</td>
                                  <td>Intitial</td>
                                  <td>05</td>
                                  <td>20-05-2019</td>
                                </tr>
                                <tr>
                                  <td>Mr CA</td>
                                  <td>5 mois</td>
                                  <td>4000.00</td>
                                  <td>Approve&aacute;</td>
                                  <td>Intitial</td>
                                  <td>10</td>
                                  <td>25-05-2019</td>
                                </tr>
                                <tr>
                                  <td>Mr TEST</td>
                                  <td>9 mois</td>
                                  <td>3000.00</td>
                                  <td>Approve&aacute;</td>
                                  <td>Intitial</td>
                                  <td>40</td>
                                  <td>06-07-2019</td>
                                </tr>
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
                                    <div class="col-xs-2 bold no-padding">Name:</div>
                                    <div class="col-xs-2 no-padding"><?php echo ucfirst($pinfo[0]['first_name']) ?: '-';?><?php echo $pinfo[0]['middle_name'] ?: ' ';?><?php echo $pinfo[0]['last_name'] ?: '-';?></div>
                                    <div class="col-xs-2 bold no-padding">Loan Term:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $appformD[0]['loan_term'];?> <?php echo $appformD[0]['loan_schedule'];?></div>
                                    <div class="col-xs-2 bold no-padding">Amount:</div>
                                    <div class="col-xs-2 no-padding">CFA <?php echo $appformD[0]['loan_amt'];?></div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">Loan Status:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $appformD[0]['loan_status'];?></div>
                                    <div class="col-xs-2 bold no-padding">Credit Product:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $appformD[0]['ltype'];?></div>
                                    <div class="col-xs-2 bold no-padding">Interest Rate:</div>
                                    <div class="col-xs-2 no-padding"><?php echo sprintf("%01.2f", $appformD[0]['loan_interest']);?>%</div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">Total Principal:</div>
                                    <div class="col-xs-2 no-padding">CFA <?php echo $appformD[0]['loan_amt'];?></div>
                                    <div class="col-xs-2 bold no-padding">Interest + Tax:</div>
                                    <div class="col-xs-2 no-padding"><?php echo sprintf("%01.2f", $appformD[0]['smrate']);?>%</div>
                                    <div class="col-xs-2 bold no-padding">Interest Before Tax:</div>
                                    <div class="col-xs-2 no-padding">CFA <?php echo $sumofInterestPaidbeforTax;?></div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold no-padding">TVA(VAT On Interest):</div>
                                    <div class="col-xs-2 no-padding"><?php echo 'CFA '.sprintf("%01.0f",$sumofVATonInterest); ?></div>
                                    <div class="col-xs-2 bold no-padding">Monthly Payment:</div>
                                    <div class="col-xs-2 no-padding">CFA <?php echo sprintf("%01.0f", $appformD[0]['pmnt']) ;?></div>
                                    <div class="col-xs-2 bold no-padding">AC Number:</div>
                                    <div class="col-xs-2 no-padding"><?php echo $customersd[0]['account_number'];?></div>
                                  </div>
                                  <div class="row well_row">
                                    <div class="col-xs-2 bold"></div>
                                    <div class="col-xs-2"></div>
                                    <div class="col-xs-2 bold"></div>
                                    <div class="col-xs-2"></div>
                                    <div class="col-xs-2 bold no-padding">Branch Name:</div>
                                    <div class="col-xs-2"><?php echo $customersd[0]['account_name'];?></div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="action-panel">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;margin-bottom:10px;"> 
                              <!--<div class="col-lg-5 col-md-3 col-sm-12 col-xs-12" style="padding:0px">
                                                                <div class="loan-buttons" style="background-color:#3276b1 !important;width: 100%;text-align: center;">
                                                                <button class="btn btn-default" ng-click="edit()">Edit</button>
                                                                <button class="btn btn-default" ng-click="newContact()">Contact</button>
                                                                <button class="btn btn-default" ng-click="changeOffer()" ng-show="loan.Status==1 || loan.Status==2 ">Change Terms</button>
                                                                </div>
                                                            </div>-->
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nextstep-buttons">
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title="Age of Customer"> <img src="<?php echo base_url('assets/img/age.png');?>" /> <span class="value">30</span> 
                                      <!--<span class="headline">Users</span>--> 
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title="Tenure with Bank"> <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value">20000</span> 
                                      <!--<span class="headline">Users</span>--> 
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title="Previous Loans"> <img src="<?php echo base_url('assets/img/loans.png');?>" /> <span class="value">01</span> 
                                      <!--<span class="headline">Users</span>--> 
                                    </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title="Application Date"> <img src="<?php echo base_url('assets/img/timer.png');?>" /> <span class="value">10 Days</span> 
                                      <!--<span class="headline">Users</span>--> 
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nextstep-buttons">
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title="Ratio Debt"> <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value">5000</span> </div>
                                  </div>
                                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                                    <div class="infographic-box" data-toggle="tooltip" title=""> <img src="<?php echo base_url('assets/img/revenue.png');?>" />  <span class="headline">Target List</span> </div>
                                  </div>
                                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align:center">
                                    <loan-back> <a href="<?php echo base_url('SubAdmin_dashboard/amortizationview/').$appformD[0]['cl_aid'];?>" class="btn btn-default loan-back"  style="width:100%;margin-top:25px;">Amortization</a> </loan-back>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!--<div class="row">
                                                        <div class="col-md-12" style="margin-bottom:5px;">
                                                            <a class="btn btn-primary pull-left">CHANGE TERM</a>
                                                        </div>
                                                    </div>-->
                          <div class="scroller scroller-left"><i class="fa fa-chevron-left"></i></div>
                          <div class="scroller scroller-right"><i class="fa fa-chevron-right"></i></div>
                          <div class="wrapper">
                            <ul class="nav nav-tabs list">
                                                <li class="active" onclick="active_tab('tab-1')"><a href="#tab-1">Détails du client</a></a></li>
                              <li onclick="active_tab('tab-2')"><a href="#tab-2">Documents</a></li>
                              <li onclick="active_tab('tab-3')"><a href="#tab-3">Traçabilité Sur Le Dossier</a></li>
                              <li onclick="active_tab('tab-4')"><a href="#tab-4">Analyse Risque</a></li>
                           
                              <li onclick="active_tab('tab-6')"><a href="#tab-6">Historique Interaction</a></li>
                              <!--<li onclick="active_tab('tab-7')"><a href="#tab-7">Credit Beareu</a></li>-->
                              <li onclick="active_tab('tab-8')"><a href="#tab-8">Calcul Amortissement</a></li>
                              <li onclick="active_tab('tab-9')"><a href="#tab-9">Garanties</a></li>
                              <li onclick="active_tab('tab-10')"><a href="#tab-10">Decisions</a></li>
                              <li onclick="active_tab('tab-5')"><a href="#tab-5">CAD</a></li>
                             </ul>
                            <div class="tab-content" style="margin-top: 40px;">
                              <div class="tab-pane fade in active" id="tab-1">
                                <h3 id="tab-title"><span> Renseignements Personnels</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label> Prénoms </label>
                                      <h3 id="tab-details"><span><?php echo ucfirst($pinfo[0]['first_name']) ?: '-';?></span></h3>
                                    </div>
                                  </div>								  
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>2ième Prénoms </label>
                                      <h3 id="tab-details"><span><?php echo $pinfo[0]['middle_name'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label> Nom </label>
                                      <h3 id="tab-details"><span><?php echo $pinfo[0]['last_name'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Genre</label>
                                      <h3 id="tab-details"><span><?php echo $pinfo[0]['gender'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
								
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date de naissance </label>
                                      <h3 id="tab-details"><span><?php echo date('d/m/Y', strtotime($pinfo[0]['dob'])) ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Dipôme ou Niveau étude </label>
                                      <h3 id="tab-details"><span><?php echo ucwords($pinfo[0]['education']) ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Situation Matrimoniale </label>
                                      <h3 id="tab-details"><span><?php echo ucwords($pinfo[0]['marital_status']) ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Email </label>
                                      <h3 id="tab-details"><span><?php echo $pinfo[0]['email'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
								
                                <h3 id="tab-title"><span>Informations Additionnelles</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Type d’identification </label>
                                      <h3 id="tab-details"><span><?php echo $adinfo[0]['type_id'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Revenu mensuel </label>
                                      <h3 id="tab-details"><span><?php echo 'CAF '.$adinfo[0]['monthly_income'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Dépenses mensuelles </label>
                                      <h3 id="tab-details"><span><?php echo 'CAF '.$adinfo[0]['monthly_expenses'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Numéro du type d’identification </label>
                                      <h3 id="tab-details"><span><?php echo $adinfo[0]['id_number'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Pays de résidence </label>
                                      <h3 id="tab-details"><span><?php echo $adinfo[0]['state_of_issue'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Fonction </label>
                                      <h3 id="tab-details"><span><?php echo $adinfo[0]['occupation'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Numéro de téléphone principal </label>
                                      <h3 id="tab-details"><span><?php echo $adinfo[0]['main_phone'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Second Numéro de téléphone </label>
                                      <h3 id="tab-details"><span><?php echo $adinfo[0]['alternative_phone'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date Expiration du type d’identification </label>
                                      <h3 id="tab-details"><span><?php echo date('d/m/Y', strtotime($adinfo[0]['expiration_date_id'])) ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <h3 id="tab-title"><span>Informations Additionnelles</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Nom de l’employeur</label>
                                      <h3 id="tab-details"><span><?php echo $empinfo[0]['employer_name'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group" style="margin-bottom:5px;">
                                      <label>Secteur d’activité</label>
                                       <h3 id="tab-details"><span>AGRICOLE</span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group" style="margin-bottom:5px;">
                                      <label>Catégorie Employeurs </label>
									  <h3 id="tab-details"><span>État et ses démembrements</span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">                                 
                                    <div class="row" style="margin-bottom:5px;">                                  
                                      <div class="form-group" style="margin-bottom:5px;">
                                       <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image" style="display:none; position: absolute; z-index: 1000; top: 34px;">
                                        <label>Type de Contrat </label>
										<h3 id="tab-details"><span>CDD</span></h3>
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
                                      <label>Date d’embauche </label>
                                      <h3 id="tab-details"><span><?php echo date('d/m/Y', strtotime($empinfo[0]['employment_date'])) ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date de fin de contrat pour CDD </label>
                                      <h3 id="tab-details"><span><?php echo $empinfo[0]['sate_end_contract_cdd'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Nombre Année Expérience</label>
                                      <h3 id="tab-details"><span><?php echo $empinfo[0]['years_professionel_experience'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date de présence chez l’employeur actuel </label>
                                      <h3 id="tab-details"><span><?php echo $empinfo[0]['how_he_is_been_with_current_employer'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Salaire net </label>
                                      <h3 id="tab-details"><span><?php echo $empinfo[0]['emp_net_salary'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Age de retraite prévu </label>
                                      <h3 id="tab-details"><span><?php echo $empinfo[0]['retirement_age_expected'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <h3 id="tab-title"><span>Adresse</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Lieu de residence </label>
                                      <h3 id="tab-details"><span><?php echo $adrs[0]['resides_address'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Nom de la rue </label>
                                      <h3 id="tab-details"><span><?php echo $adrs[0]['Nom de la rue'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Ville de résidence</label>
                                      <h3 id="tab-details"><span><?php echo $adrs[0]['city_id'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Pays de résidence </label>
                                      <h3 id="tab-details"><span><?php echo $adrs[0]['state_id'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <h3 id="tab-title"><span>Information Sur le Compte Bancaire</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Type de compte </label>
                                      <h3 id="tab-details"><span><?php echo $bankinfo[0]['account_type'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>numéro de compte </label>
                                      <h3 id="tab-details"><span><?php echo $customersd[0]['account_number'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Agence bancaire </label>
                                      <h3 id="tab-details"><span><?php echo $customersd[0]['account_name'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Téléphone agence bancaire</label>
                                      <h3 id="tab-details"><span><?php echo $bankinfo[0]['bank_phone'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Date ouverture de compte </label>
                                      <h3 id="tab-details"><span><?php echo $bankinfo[0]['opening_date'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>numéro de compte </label>
                                      <h3 id="tab-details"><span><?php echo $customersd[0]['account_number'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <h3 id="tab-title"><span>Autres Informations</span></h3>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Code banque </label>
                                      <h3 id="tab-details"><span><?php echo $otherinfo[0]['field_1'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Code de l’agence </label>
                                      <h3 id="tab-details"><span><?php echo $otherinfo[0]['field_1'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Clé RIB </label>
                                      <h3 id="tab-details"><span><?php echo $otherinfo[0]['field_1'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Montant Assurance </label>
                                      <h3 id="tab-details"><span><?php echo $otherinfo[0]['field_1'] ?: '-';?></span></h3>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Objet du crédit </label>
									  <h3 id="tab-details"><span>Consomation</span></h3>
                                    </div>
                                  </div>
                                </div>                                
                              </div>
                              
                              
                              <div class="tab-pane fade" id="tab-2">
                                <h3 id="tab-title"><span>System Docs</span></h3>
                                <small class="outputmsg"></small>
                                <div class="row">
                                  <div class="col-lg-12">                                    
                                    <?php if(!empty($sys_docs)){ ?>
										<button type="button" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>
                                    <?php } else { ?>
										<button type="button" class="btn btn-sm btn-default preview" disabled> <i class="fa fa-eye"></i> Preview</button>
                                    <?php } if(!empty($sys_docs)){ ?>
										<a href="<?php echo base_url('PP_Consumer_Loans/downloadall/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
                                    <?php } else{ ?>
										<a haterref="javascript:void(0);" class="btn btn-sm btn-primary download" disabled> <i class="fa fa-cloud-download"></i> Download </a>
                                    <?php } ?>
                                  </div><br>
                                </div>
                                <table class="table table-bordered table-hover" id="table_auto">
                                  <tr id="row_0">
                                    <td>
									<form action="#">
                                        <div class="row">
                                          <div class="col-lg-12"> <span><a href="#"> 1- Credit Agreement (attached template)</a></span> </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-12"> <a href="#">2- Joint and Personal Guarantee</a> 
                                            <!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-12"> <span><a href="#">3- Promissory Note (Attached Template)</a></span> </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-12"> <span><a href="#">4- Membership form for the Guarantee Fund</a></span> 
                                            <!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-12"> <span><a href="#">5- Credit Application Form</a></span> 
                                            <!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-12"> <span><a href="#">6- Memo of Setting Up</a></span> 
                                            <!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
                                          </div>
                                        </div>
                                     </form>
									</td>
                                  </tr>                                 
                                </table>
                                <h3 id="tab-title"><span>Check List Customer Documents</span></h3>
                                <small class="outputmsg2"></small>
                                <div class="row">
                                  <div class="col-lg-12">                                  
                                    <?php if(!empty($clist_docs)){ ?>
										<button type="button" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal2"><i class="fa fa-eye"></i> Preview</button>
										<a href="<?php echo base_url('PP_Consumer_Loans/downloadallCheckList/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
                                    <?php } else { ?>
										<button type="button" class="btn btn-sm btn-default preview" disabled> <i class="fa fa-eye"></i> Preview</button>
										<a href="javascript:void(0);" class="btn btn-sm btn-primary download" disabled> <i class="fa fa-cloud-download"></i> Download </a>
                                    <?php } ?>
                                  </div>
                                </div>
                                <table class="table table-bordered table-hover" id="table_auto">
                                  <tr id="row_0">
                                    <td><form action="#">
                                        <div class="row">
                                          <div class="col-lg-6"> <span><a href="#">1) A Client Request</a></span> 
                                            <!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios1" id="optionsRadios1" value="option1" checked>
                                                <label for="optionsRadios1"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios1" id="optionsRadios2" value="option2">
                                                <label for="optionsRadios2"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">2- CNI Copy Valid</a> 
                                            
                                            <!--<input id="avatar" class="file-loading" type="file" name="image" >	--> 
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios2" id="optionsRadios3" value="option3" checked>
                                                <label for="optionsRadios3"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios2" id="optionsRadios4" value="option4">
                                                <label for="optionsRadios4"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">3- Last 3 Payslip</a> 
                                            
                                            <!--			<input id="avatar" class="file-loading" type="file" name="image" >	--> 
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios3" id="optionsRadios5" value="option5" checked>
                                                <label for="optionsRadios5"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios3" id="optionsRadios6" value="option6">
                                                <label for="optionsRadios6"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">4- Certificate of Non-Indebtedness</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios4" id="optionsRadios7" value="option7" checked>
                                                <label for="optionsRadios7"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios4" id="optionsRadios8" value="option8">
                                                <label for="optionsRadios8"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">5- Certificate of Irrevocable Transfer</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios5" id="optionsRadios9" value="option9" checked>
                                                <label for="optionsRadios9"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios5" id="optionsRadios10" value="option10">
                                                <label for="optionsRadios10"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
											<div class="col-lg-6">
												<a href="#">6- Number of Salary Transfers Received</a>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<div class="radio" style="display:inline-block">
														<input type="radio" name="optionsRadios6" id="optionsRadios11" value="option11" checked>
															<label for="optionsRadios11">YES</label>
													</div>
													<div class="radio" style="display:inline-block">
														<input type="radio" name="optionsRadios6" id="optionsRadios12" value="option12">
														<label for="optionsRadios12">NO</label>
													</div>
												</div>
											</div>
										</div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">7- Work Certificate</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios7" id="optionsRadios13" value="option13" checked>
                                                <label for="optionsRadios13"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios7" id="optionsRadios14" value="option14">
                                                <label for="optionsRadios14"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">8- Certificate of domicile</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios8" id="optionsRadios15" value="option15" checked>
                                                <label for="optionsRadios15"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios8" id="optionsRadios16" value="option16">
                                                <label for="optionsRadios16"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">9- Location Plan</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios9" id="optionsRadios17" value="option17" checked>
                                                <label for="optionsRadios17"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios9" id="optionsRadios18" value="option18">
                                                <label for="optionsRadios18"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">10- CIP Verification (unknown client or not) </a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios10" id="optionsRadios19" value="option19" checked>
                                                <label for="optionsRadios19"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios10" id="optionsRadios20" value="option20">
                                                <label for="optionsRadios20"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">11- Central Risk Verification (unknown client or not)</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios11" id="optionsRadios21" value="option21" checked>
                                                <label for="optionsRadios21"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios11" id="optionsRadios22" value="option22">
                                                <label for="optionsRadios22"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-lg-6"> <a href="#">12- Disability and Death Insurance</a> </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios12" id="optionsRadios23" value="option23" checked>
                                                <label for="optionsRadios23"> YES </label>
                                              </div>
                                              <div class="radio" style="display:inline-block">
                                                <input type="radio" name="optionsRadios12" id="optionsRadios24" value="option24">
                                                <label for="optionsRadios24"> NO </label>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </form></td>
                                  </tr>
                                </table>
                              </div>
                              
                              <!-- Application Tracking Timeline Section -->
                              <div class="tab-pane fade" id="tab-3">
                                <div class="row">
                                  <div class="col-lg-12">
                                    <section id="cd-timeline" class="cd-container">
                                      <?php $i=1; foreach ($tracking_timeline as $timeline) {
                                   ?>
                                      <div class="cd-timeline-block">
                                        <div class="cd-timeline-img cd-picture"> <i class="fa fa-file"></i> </div>
                                        <div class="cd-timeline-content">
                                          <h2>STEP <?php echo $i;?></h2>
                                          <span style="font-weight:bold">User: </span><span><?php echo $timeline['field_data'];?></span>
                                          <p><span style="font-weight:bold">Comment : </span><?php echo $timeline['comment'];?></p>
                                          <span class="cd-date"> <?php echo date('d/m/Y h:i:s', strtotime($timeline['created']));?></span> </div>
                                      </div>
                                      <?php $i++;} ?>
                                      
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
								<?php if(!empty($risk_analysis)){ ?>
										<button type="button" class="btn btn-sm btn-default preview" data-toggle="modal" data-target="#AnalysisfilePreviewModal"><i class="fa fa-eye"></i> Preview</button>
										<a href="<?php echo base_url('PP_Consumer_Loans/download_analysisfiles/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
								<?php } else { ?>
									<button type="button" class="btn btn-sm btn-default preview" disabled> <i class="fa fa-eye"></i> Preview</button>
									<button type="button" class="btn btn-sm btn-primary download" disabled><i class="fa fa-cloud-download"></i> Download</button>
								<?php }?>									
                                  </div>
                                </div>
                                <table class="table table-bordered table-hover" id="table_auto">
                                  <tr id="row_0">
                                    <td><form action="#">
                                        <div class="row">
                                          <div class="col-lg-6"> <span><a href="#">1- CIP verification</a></span> 
                                            <!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
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
                                            
                                            <!--<input id="avatar" class="file-loading" type="file" name="image" >	--> 
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
                                      </form></td>
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
                                              <th class="text-center"><span>Amount</span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
										  <form id="FormCurrentmonthly" method="post">
                                            <tr>
                                              <td> CRESCO </td>
                                              <td class="text-center">
												<input type="number" id="cresco" value="<?php echo $riskcurrentmonthlyvrefit[0]['cresco'] ?: '0';?>" name="cresco_current" class="form-control qty1" min="0" readonly disabled /></td>
                                            </tr>
                                            <tr>
                                              <td> DECOUVERT </td>
                                              <td class="text-center">
												<input type="number" id="decouvert" value="<?php echo $riskcurrentmonthlyvrefit[0]['decouvert'] ?: '0';?>" name="decouvert_current" class="form-control qty1"min="0" readonly disabled /></td>
                                            </tr>
                                            <tr>
                                              <td> CMT </td>
                                              <td class="text-center"><input type="number" id="CMT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cmt'] ?: '20000';?>" name="cmt_current" class="form-control qty1" min="0" readonly disabled /></td>
                                            </tr>
                                            <tr>
                                              <td> CCT </td>
                                              <td class="text-center"><input type="number" id="CCT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cct'] ?: '0';?>" name="cct_current" class="form-control qty1" min="0" readonly disabled /></td>
                                            </tr>
                                            <tr>
                                              <td> TOTAL </td>
                                              <td class="text-center"><input type="text" id="Ttotal" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '20000';?>" name="total_clc" class="form-control" min="0" readonly disabled />
											  <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right riskcurrentmonthloder" style="position:relative;top: -25px;left:-3px; display: none;">
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
                                              <th class="text-center"><span>Amount</span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
											<form id="FormMonthlyNew" method="post">
												<tr>
												  <td> CRESCO </td>
												  <td class="text-center"><input type="number" id="cresco_monthly" value="<?php echo $riskpaymentnewloan[0]['cresco'] ?: '0';?>" name="cresco_monthly" class="form-control qty2" min="0" readonly disabled /></td>
												</tr>
												<tr>
												  <td> DECOUVERT </td>
												  <td class="text-center"><input type="number" id="decouvert_monthly" value="<?php echo $riskpaymentnewloan[0]['decouvert'] ?: '0';?>" name="decouvert_monthly" class="form-control qty2" min="0" readonly disabled /></td>
												</tr>
												<tr>
												  <td> CMT </td>
												  <td class="text-center"><input type="number" id="cmt_monthly" value="<?php echo $riskpaymentnewloan[0]['cmt'] ?: '50';?>" name="cmt_monthly" class="form-control qty2" min="0" readonly disabled /></td>
												</tr>
												<tr>
												  <td> CCT </td>
												  <td class="text-center"><input type="number" id="cct_monthly" value="<?php echo $riskpaymentnewloan[0]['cct'] ?: '0';?>" name="cct_monthly" class="form-control qty2" min="0" readonly disabled /></td>
												</tr>
												<tr>
												  <td> TOTAL </td>
												  <td class="text-center"><input type="text" id="total_mlc" value="<?php echo $riskpaymentnewloan[0]['total_mlc'] ?: '50';?>" name="total_mlc" class="form-control" min="0" readonly disabled />
												  <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right risknewmonthloder" style="position:relative;top: -25px;left:-3px; display: none;">
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
                                              <th class="text-center"><span>Montant</span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td> NET Salary </td>
                                              <td class="text-center"><input type="number" id="net_salary" value="<?php echo $riskfsituation[0]['net_salary'] ?: '100000';?>" name="net_salary" class="form-control qty3" min="0" readonly disabled></td>
                                            </tr>
                                            <tr>
                                              <td> Applicable Loan/Income Ratio </td>
                                              <td class="text-center">
												<div class="input-group">
													<input type="number" id="income_ratio" value="<?php echo $riskfsituation[0]['income_ratio'] ?: '33';?>" name="income_ratio" class="form-control qty3" min="0" readonly disabled />
													<span class="input-group-addon">%</span>
												</div>										  
											  </td>
                                            </tr>
                                            <tr>
                                              <td> Quotitécessible </td>
                                              <td class="text-center"><input type="number" id="quotitecessible" value="<?php echo $riskfsituation[0]['quotitecessible'] ?: '33000';?>" name="quotitecessible" class="form-control qty3" min="0" readonly disabled /></td>
                                            </tr>
                                            <tr>
                                              <td> Current Monthly Payments </td>
                                              <td class="text-center"><input type="text" id="current_monthly_payments" value="<?php echo $riskfsituation[0]['current_monthly_payments'] ?: '20000';?>" name="current_monthly_payments" class="form-control qty3" min="0" readonly disabled /></td>
                                            </tr>
                                            <tr>
                                              <td> New Monthly Payment </td>
                                              <td class="text-center"><input type="number" id="new_monthly_payment" value="<?php echo $riskfsituation[0]['new_monthly_payment'] ?: '50';?>" name="new_monthly_payment" class="form-control qty3" min="0" readonly disabled /></td>
                                            </tr>
                                            <tr style="background:yellow">
                                              <td> Total </td>
                                              <td class="text-center"><input type="number" id="situation_total" value="<?php echo $riskfsituation[0]['situation_total'] ?: '20050';?>" name="situation_total" class="form-control qty3" min="0" readonly disabled /></td>
                                            </tr>
                                            <tr>
                                              <td> New Loan/Income Ratio After Project </td>
                                              <td class="text-center"><input type="number" id="income_ratio_after" value="<?php echo $riskfsituation[0]['income_ratio_after'] ?: '12950';?>" name="income_ratio_after" class="form-control qty3" min="0" readonly disabled /></td>
                                            </tr>
                                            <tr>
                                              <td style="color:green"> Coeficientendettement (Debt Ratio) </td>
                                              <td class="text-center">
												<div class="input-group">
													<input type="text" id="coeficientendettement" value="<?php echo $riskfsituation[0]['coeficientendettement'] ?: '20';?>" name="coeficientendettement" class="form-control qty3" min="0" readonly disabled />
													<span class="input-group-addon">%</span>
												</div>	
												<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right risksituationloder" style="position:relative;top: -25px;left:-3px; display: none;">
												
											  </td>
                                            </tr>
											<tr>
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
                                              <th class="text-center"><span>Ratio</span></th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <tr>
                                              <td><?php echo $applicableloanratio[0]['terms'] ?: 'QUOTITE SALAIRE < 500000 F CFA';?></td>
                                              <td class="text-center">
												<div class="input-group">
													<input type="text" id="get_quotitesalaire" value="<?php echo $applicableloanratio[0]['ratio'] ?: '33';?>" name="get_quotitesalaire" class="form-control" min="0" readonly disabled />
													<span class="input-group-addon">%</span>
												</div>
											  </td>
                                            </tr>
                                            <tr>
                                              <td> <?php echo $applicableloanratio[1]['terms'] ?: 'QUOTITE SALAIRE >500 000 F CFA';?> </td>
                                              <td class="text-center">
												<div class="input-group">
													<input type="text" id="get_quotitesalaireup" value="<?php echo $applicableloanratio[1]['ratio'] ?: '40';?>" name="get_quotitesalaireup" class="form-control" min="0" readonly disabled />
													<span class="input-group-addon">%</span>
												</div>
											  </td>
                                            </tr>
                                            <tr>
                                              <td> <?php echo $applicableloanratio[2]['terms'] ?: 'QUOTITE CLIENT AVEC CRESCO EN COURS';?></td>
                                              <td class="text-center">
												<div class="input-group">
													<input type="text" id="get_quotitesalairemore" value="<?php echo $applicableloanratio[2]['ratio'] ?: '50';?>" name="get_quotitesalairemore" class="form-control" min="0" readonly disabled />
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
										<div class="form-group">
											<div class="input-group" style="width:100%">
												<label>Final Memo Credit</label>
												 <textarea row="20" cols="10" class="form-control postpreviedeposit" readonly disabled></textarea>
											</div>
										</div>
									</div>               					
                                    <br>
								</div>
                              </div>
							  
                              <div class="tab-pane fade" id="tab-6">
                                <div class="row">
                                  <div class="col-md-12">
                                    <h3 id="tab-title"><span>Email</span></h3>
                                  </div>
                                </div>

                                <div class="Email" style="display:block">
                                  
                                  <div class="getdataajax"></div>
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
                              </div>
                              <div class="tab-pane fade" id="tab-7">
                                <div style="text-align:center">----</div>
                              </div>
                              <!-- Start Loan Information edit section -->
                              <div class="tab-pane fade" id="tab-8">
                                <h3 id="tab-title"><span>Loan Information PP</span></h3>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Product Program</label>
                                        <input type="text" class="form-control" value="<?php echo $appformD[0]['ltype'];?>" readonly disabled>                                       
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Loan Amount to be Entered</label>
                                        <div class="input-group"> <span class="input-group-addon">CFA</span>
                                          <input type="number" class="form-control" id="loan_amt" name="loan_amt" autocomplete="off" value="<?php echo $appformD[0]['loan_amt'];?>" min="0" readonly disabled>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Interest</label>
                                        <div class="input-group">
                                          <input type="number" class="form-control" id="loan_interest" name="loan_interest" autocomplete="off" value="<?php echo $appformD[0]['loan_interest'];?>" readonly disabled min="2">
                                          <span class="input-group-addon">%</span> </div>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Term</label>
                                        <input type="number" class="form-control" id="loan_term" name="loan_term" autocomplete="off" value="<?php echo $appformD[0]['loan_term'];?>" readonly disabled min="0" >
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Payment Schedule</label>
                                        <?php
                                          $products = array("Monthly", "Quarterly", "Half Yearly", "Yearly");
                                          ?>
                                              <select class="form-control" name="loan_schedule" id="loan_schedule" readonly disabled>
                                                <?php foreach($products as $item){
                                              if(trim($appformD[0]['loan_schedule']) == $item){ $select="selected";}else{$select="";}
                                              echo  '<option value="'.$item.'" '.$select.'>'.$item.'</option>';
                                          }?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Fees</label>
                                        <input type="text" class="form-control" id="loan_fee" name="loan_fee" autocomplete="off" value="<?php echo $appformD[0]['loan_fee'];?>" readonly disabled />
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Taxes</label>
                                        <select class="form-control" name="loan_tax" id="loan_tax" readonly disabled />
                                          <?php   foreach($loantax as $tax){
                                              if($appformD[0]['loan_tax']==$tax['tid']){ $select="selected";}else{$select="";}
                                              echo '<option value="'.$tax['tid'].'" '.$select.'>'.$tax['tax_type'].'</option>';
                                          }?>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label>Commission</label>
                                        <input type="text" class="form-control" id="loan_commission" name="loan_commission" autocomplete="off" value="<?php echo $appformD[0]['loan_commission'];?>" readonly disabled />
                                      </div>
                                    </div>
									<br>									
                                  </div>
								</div>                             
								<div class="tab-pane fade" id="tab-9">
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
									  if(!empty($key2['selected_field']=="Déposit")){ ?>
										<h3 id="tab-title"><span>Déposit</span></h3>
										<table class="table table-striped table-hover">
										  <thead>
											<tr class="success">                                        
											<th><span>Numéro de compte</span></th>
											<th><span>Montant</span></th>
											<th class="text-center"><span>Date</span></th>
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
											<td class="text-center"><?php echo date("d/m/Y", strtotime($dept['created']));?></td>
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
										  <th class="text-center"><span>Date</span></th>
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
										  <td class="text-center"><?php echo date("d/m/Y", strtotime($dept['created']));?></td>
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
						<!-- End Tab-9  -->							
							
                              <div class="tab-pane fade" id="tab-10">
							  <form id="actionstatus" method="post">
                                <div class="row">
								<div class="editloanmsg"></div>
                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label>SELECTIONNER VOTRE AVIS</label>
									  <?php if($appformD[0]['loan_status']=="Process" || $appformD[0]['loan_status']=="Demanderetraitement"){  ;?>
                                      <select class="form-control" id="decision" name="decision">
                                        <option value="Approbation" id="Approbation">Approbation</option>
                                        <option value="Rejet" id="Rejet">Rejet</option>
                                        <option value="Demanderetraitement" id="Demanderetraitement">Demanderetraitement</option>
                                      </select>
									  <?php }else{ ?>
										<select class="form-control" readonly disabled>
                                        <option value="Approbation" id="Approbation">Approbation</option>
                                        <option value="Rejet" id="Rejet">Rejet</option>
                                        <option value="Demanderetraitement" id="Demanderetraitement">Demanderetraitement</option>
                                      </select>
									  <?php } ?>
                                    </div>
                                  </div>
                                </div>                               
                                <div  class="Demanderetraitement">
                                  <div class="row">
                                    <div class="col-md-12">
									<?php if($appformD[0]['loan_status']=="Process" || $appformD[0]['loan_status']=="Demanderetraitement"){  ;?>
                                      <div class="form-group">
                                        <div class="input-group" style="width:100%">
                                          <label>Commentaire</label>
                                          <input type="text" class="form-control" id="commentstatus" name="commentstatus" placeholder="Enter Commentaire" autocomplete="off" requerd >
                                        </div>
                                      </div>
									  <?php }else{ ?>
									  <div class="form-group">
                                        <div class="input-group" style="width:100%">
                                          <label>Commentaire</label>
                                          <input type="text" class="form-control" placeholder="Enter Commentaire" autocomplete="off" readonly disabled >
                                        </div>
                                      </div>
									<?php } ?>
                                    </div>
									<?php if($appformD[0]['loan_status']=="Process" || $appformD[0]['loan_status']=="Demanderetraitement"){  ;?>
                                    <div class="col-md-12">
										<input type="hidden" name="cl_aid"  value="<?php echo $this->uri->segment(3);?>" readonly>
										<input type="hidden"  id="customar_id_excemption" name="customar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>
										
										<input type="hidden"  id="manager_id" name="manager_id"  value="<?php echo $record[0]->is_admin;?>" readonly>
										
										<input type="hidden"  id="branch_id" name="branch_id"  value="<?php echo $record[0]->branch_id;?>" readonly>
										
										<input type="hidden"  id="account_manager_id" name="account_manager_id"  value="<?php echo $appformD[0]['admin_id'];?>" readonly>
									
										<button type="button" class="btn btn-primary pull-right clearfix" id="commentsubmit">SOUMETTRE</button>                                     
										
										<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right commentlofer" style="position:relative;top: -25px;left:-3px; display: none;">
                                    </div>
									<?php } ?>
                                  </div>
                                </div>								
								<textarea row="20" cols="10" class="form-control commentres" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
							</form>								
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
		  <div class="panel panel-default panel-body loan-details-header" style="margin-bottom:5px;">
			<div class="bg-header">
				<div class="well well-sm well-primary" style="background-color:transparent !important">
				  <div class="row well_row">
					<div class="col-xs-2 bold no-padding">Name:</div>
					<div class="col-xs-2 no-padding"><?php echo ucfirst($pinfo[0]['first_name']) ?: '-';?><?php echo $pinfo[0]['middle_name'] ?: ' ';?><?php echo $pinfo[0]['last_name'] ?: '-';?></div>
					<div class="col-xs-2 bold no-padding">Loan Term:</div>
					<div class="col-xs-2 no-padding"><?php echo $appformD[0]['loan_term'];?> <?php echo $appformD[0]['loan_schedule'];?></div>
					<div class="col-xs-2 bold no-padding">Amount:</div>
					<div class="col-xs-2 no-padding">CFA <?php echo $appformD[0]['loan_amt'];?></div>
				  </div>
				  <div class="row well_row">
					<div class="col-xs-2 bold no-padding">Loan Status:</div>
					<div class="col-xs-2 no-padding"><?php echo $appformD[0]['loan_status'];?></div>
					<div class="col-xs-2 bold no-padding">Credit Product:</div>
					<div class="col-xs-2 no-padding"><?php echo $appformD[0]['ltype'];?></div>
					<div class="col-xs-2 bold no-padding">Interest Rate:</div>
					<div class="col-xs-2 no-padding"><?php echo sprintf("%01.2f", $appformD[0]['loan_interest']);?>%</div>
				  </div>
				  <div class="row well_row">
					<div class="col-xs-2 bold no-padding">Total Principal:</div>
					<div class="col-xs-2 no-padding">CFA <?php echo $appformD[0]['loan_amt'];?></div>
					<div class="col-xs-2 bold no-padding">Interest + Tax:</div>
					<div class="col-xs-2 no-padding"><?php echo sprintf("%01.2f", $appformD[0]['smrate']);?>%</div>
					<div class="col-xs-2 bold no-padding">Interest Before Tax:</div>
					<div class="col-xs-2 no-padding">CFA <?php echo $sumofInterestPaidbeforTax;?></div>
				  </div>
				  <div class="row well_row">
					<div class="col-xs-2 bold no-padding">TVA(VAT On Interest):</div>
					<div class="col-xs-2 no-padding"><?php echo 'CFA '.sprintf("%01.0f",$sumofVATonInterest); ?></div>
					<div class="col-xs-2 bold no-padding">Monthly Payment:</div>
					<div class="col-xs-2 no-padding">CFA <?php echo sprintf("%01.0f", $appformD[0]['pmnt']) ;?></div>
					<div class="col-xs-2 bold no-padding">AC Number:</div>
					<div class="col-xs-2 no-padding"><?php echo $customersd[0]['account_number'];?></div>
				  </div>
				  <div class="row well_row">
					<div class="col-xs-2 bold"></div>
					<div class="col-xs-2"></div>
					<div class="col-xs-2 bold"></div>
					<div class="col-xs-2"></div>
					<div class="col-xs-2 bold no-padding">Branch Name:</div>
					<div class="col-xs-2"><?php echo $customersd[0]['account_name'];?></div>
				  </div>
				</div>
			</div>
		</div>    
    <div class="action-panel">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;margin-bottom:10px;">
            <!--<div class="col-lg-5 col-md-3 col-sm-12 col-xs-12" style="padding:0px">
                <div class="loan-buttons" style="background-color:#3276b1 !important;width: 100%;text-align: center;">
                <button class="btn btn-default" ng-click="edit()">Edit</button>
                <button class="btn btn-default" ng-click="newContact()">Contact</button>
                <button class="btn btn-default" ng-click="changeOffer()" ng-show="loan.Status==1 || loan.Status==2 ">Change Terms</button>
                </div>
            </div>-->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="nextstep-buttons">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Age of Customer">
                            <img src="<?php echo base_url('assets/img/age.png');?>" />
                            <span class="value">30</span>
                            <!--<span class="headline">Users</span>-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Tenure with Bank">
                            <img src="<?php echo base_url('assets/img/tenure.png');?>" />
                            <span class="value">20000</span>
                            <!--<span class="headline">Users</span>-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Previous Loans">
                            <img src="<?php echo base_url('assets/img/loans.png');?>" />
                            <span class="value">01</span>
                            <!--<span class="headline">Users</span>-->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Application Date">
                            <img src="<?php echo base_url('assets/img/timer.png');?>" />
                            <span class="value">10 Days</span>
                            <!--<span class="headline">Users</span>-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="nextstep-buttons">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Ratio Debt">
                            <img src="<?php echo base_url('assets/img/tenure.png');?>" />
                            <span class="value">5000</span> 
                          
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="">
                            <img src="<?php echo base_url('assets/img/revenue.png');?>" />
                            
                            <span class="headline">Target List</span>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align:center">
                        <loan-back>
                            <a href="<?php echo base_url('SubAdmin_dashboard/amortizationview/').$appformD[0]['cl_aid'];?>" class="btn btn-default loan-back"  style="width:100%;margin-top:25px;">Amortization</a>
                        </loan-back>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!--<div class="clearfix" style="margin-top:0px;margin-bottom:5px;">
<a class="btn btn-primary pull-left">CHANGE TERM</a>
</div>-->
</div> 


<div class="wrapper">
  <ul class="nav nav-tabs list1">
     <li class="active" onclick="active_tab('tab-11')"><a href="#tab-11">Détails du client</a></li>
    <li onclick="active_tab('tab-12')"> <a href="#tab-12">Documents</a></li>
    <li onclick="active_tab('tab-13')"><a href="#tab-13">Traçabilité Sur Le Dossier</a></li>
    <li onclick="active_tab('tab-14')"><a href="#tab-14">Analyse Risque</a></li>
    <li onclick="active_tab('tab-16')"><a href="#tab-16">Historique Interaction</a></li>
    <!--<li onclick="active_tab('tab-17')"><a href="#tab-17">Credit Beareu</a></li>-->
    <li onclick="active_tab('tab-18')"><a href="#tab-18">Calcul Amortissement</a></li>
    <li onclick="active_tab('tab-19')"><a href="#tab-19">Garanties</a></li>
    <li onclick="active_tab('tab-20')"><a href="#tab-20">Decisions</a></li>
    <li onclick="active_tab('tab-15')"><a href="#tab-15">CAD</a></li>
  </ul>
		<div class="tab-content" style="margin-top: 40px;">
			<div class="tab-pane fade in active" id="tab-11">
				<h3 id="tab-title"><span>Renseignements Personnels</span></h3>
				<div class="row">
				  <div class="col-md-3">
  					<div class="form-group">
  					  <label> Prénoms </label>
  					  <h3 id="tab-details"><span><?php echo ucfirst($pinfo[0]['first_name']) ?: '-';?></span></h3>
  					</div>
				  </div>
				 <div class="col-md-3">
  					<div class="form-group">
  					  <label>2ième Prénoms </label>
  					  <h3 id="tab-details"><span><?php echo $pinfo[0]['middle_name'] ?: '-';?></span></h3>
  					</div>
				  </div>
				  <div class="col-md-3">
  					<div class="form-group">
  					  <label> Nom </label>
  					  <h3 id="tab-details"><span><?php echo $pinfo[0]['last_name'] ?: '-';?></span></h3>
  					</div>
				  </div>
				  <div class="col-md-3">
  					<div class="form-group">
  					  <label>Genre</label>
  					  <h3 id="tab-details"><span><?php echo $pinfo[0]['gender'] ?: '-';?></span></h3>
  					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-3">
  					<div class="form-group">
  					  <label>Date de naissance </label>
  					  <h3 id="tab-details"><span><?php echo date('d/m/Y', strtotime($pinfo[0]['dob'])) ?: '-';?></span></h3>
  					</div>
				  </div>
				  <div class="col-md-3">
  					<div class="form-group">
  					  <label>Dipôme ou Niveau étude </label>
  					  <h3 id="tab-details"><span><?php echo ucwords($pinfo[0]['education']) ?: '-';?></span></h3>
  					</div>
				  </div>
				  <div class="col-md-3">
  					<div class="form-group">
  					  <label>Situation Matrimoniale </label>
  					  <h3 id="tab-details"><span><?php echo ucwords($pinfo[0]['marital_status']) ?: '-';?></span></h3>
  					</div>
				  </div>
				  <div class="col-md-3">
  					<div class="form-group">
  					  <label>Email </label>
  					  <h3 id="tab-details"><span><?php echo $pinfo[0]['email'] ?: '-';?></span></h3>
  					</div>
				  </div>
				</div>				
				<h3 id="tab-title"><span>Informations Additionnelles</span></h3>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Type d’identification </label>
					  <h3 id="tab-details"><span><?php echo $adinfo[0]['type_id'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Revenu mensuel </label>
					  <h3 id="tab-details"><span><?php echo 'CAF '.$adinfo[0]['monthly_income'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Dépenses mensuelles </label>
					  <h3 id="tab-details"><span><?php echo 'CAF '.$adinfo[0]['monthly_expenses'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Numéro du type d’identification </label>
					  <h3 id="tab-details"><span><?php echo $adinfo[0]['id_number'] ?: '-';?></span></h3>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Pays de résidence </label>
					  <h3 id="tab-details"><span><?php echo $adinfo[0]['state_of_issue'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Fonction </label>
					  <h3 id="tab-details"><span><?php echo $adinfo[0]['occupation'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Numéro de téléphone principal </label>
					  <h3 id="tab-details"><span><?php echo $adinfo[0]['main_phone'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Second Numéro de téléphone </label>
					  <h3 id="tab-details"><span><?php echo $adinfo[0]['alternative_phone'] ?: '-';?></span></h3>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Date Expiration du type d’identification </label>
					  <h3 id="tab-details"><span><?php echo date('d/m/Y', strtotime($adinfo[0]['expiration_date_id'])) ?: '-';?></span></h3>
					</div>
				  </div>
				</div>
				<h3 id="tab-title"><span>Information Sur l'EmploiI</span></h3>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Nom de l’employeur</label>
					  <h3 id="tab-details"><span><?php echo $empinfo[0]['employer_name'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group" style="margin-bottom:5px;">
					  <label>Secteur d’activité</label>					   
					  <h3 id="tab-details"><span>AGRICOLE</span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
  					<div class="form-group" style="margin-bottom:5px;">
  					  <label>Catégorie Employeurs </label>
  					  <h3 id="tab-details"><span>État et ses démembrements</span></h3>
  					</div>
				  </div>
				  <div class="col-md-3">                                 
  					<div class="row" style="margin-bottom:5px;">                                   
  					  <div class="form-group" style="margin-bottom:5px;">
  					   <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image" style="display:none; position: absolute; z-index: 1000; top: 34px;">
  						  <label>Type de Contrat </label>
						  <h3 id="tab-details"><span>CDD</span></h3>    						
  					  </div>  					
  					 </div>
					</div>
				</div>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Date d’embauche </label>
					  <h3 id="tab-details"><span><?php echo date('d/m/Y', strtotime($empinfo[0]['employment_date'])) ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Date de fin de contrat pour CDD </label>
					  <h3 id="tab-details"><span><?php echo $empinfo[0]['sate_end_contract_cdd'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Nombre Année Expérience</label>
					  <h3 id="tab-details"><span><?php echo $empinfo[0]['years_professionel_experience'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Date de présence chez l’employeur actuel </label>
					  <h3 id="tab-details"><span><?php echo $empinfo[0]['how_he_is_been_with_current_employer'] ?: '-';?></span></h3>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Salaire net </label>
					  <h3 id="tab-details"><span><?php echo $empinfo[0]['emp_net_salary'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Age de retraite prévu </label>
					  <h3 id="tab-details"><span><?php echo $empinfo[0]['retirement_age_expected'] ?: '-';?></span></h3>
					</div>
				  </div>
				</div>
				<h3 id="tab-title"><span>Adresse</span></h3>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Lieu de residence </label>
					  <h3 id="tab-details"><span><?php echo $adrs[0]['resides_address'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Nom de la rue </label>
					  <h3 id="tab-details"><span><?php echo $adrs[0]['Nom de la rue'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Ville de résidence</label>
					  <h3 id="tab-details"><span><?php echo $adrs[0]['city_id'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Pays de résidence </label>
					  <h3 id="tab-details"><span><?php echo $adrs[0]['state_id'] ?: '-';?></span></h3>
					</div>
				  </div>
				</div>
				<h3 id="tab-title"><span>Information Sur le Compte Bancaire</span></h3>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Type de compte </label>
					  <h3 id="tab-details"><span><?php echo $bankinfo[0]['account_type'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>numéro de compte </label>
					  <h3 id="tab-details"><span><?php echo $bankinfo[0]['account_no'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Agence bancaire </label>
					  <h3 id="tab-details"><span><?php echo $bankinfo[0]['bank_name'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Téléphone agence bancaire</label>
					  <h3 id="tab-details"><span><?php echo $bankinfo[0]['bank_phone'] ?: '-';?></span></h3>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Date ouverture de compte </label>
					  <h3 id="tab-details"><span><?php echo $bankinfo[0]['opening_date'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>numéro de compte </label>
					  <h3 id="tab-details"><span><?php echo $bankinfo[0]['account_no'] ?: '-';?></span></h3>
					</div>
				  </div>
				</div>
				<h3 id="tab-title"><span>Autres Informations</span></h3>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Code banque </label>
					  <h3 id="tab-details"><span><?php echo $otherinfo[0]['field_1'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Code de l’agence </label>
					  <h3 id="tab-details"><span><?php echo $otherinfo[0]['field_1'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Clé RIB </label>
					  <h3 id="tab-details"><span><?php echo $otherinfo[0]['field_1'] ?: '-';?></span></h3>
					</div>
				  </div>
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Montant Assurance </label>
					  <h3 id="tab-details"><span><?php echo $otherinfo[0]['field_1'] ?: '-';?></span></h3>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-md-3">
					<div class="form-group">
					  <label>Objet du crédit </label>
						<h3 id="tab-details"><span>Consomation</span></h3>						
					</div>
				  </div>
				</div>                                
			  </div>			  
			  <!--Tab-12 Details-->
			<div class="tab-pane fade" id="tab-12">
				<h3 id="tab-title"><span>System Docs</span></h3>
				<small class="outputmsg"></small>
				<div class="row">
				  <div class="col-lg-12">				
					<?php 
					if(!empty($sys_docs)){ ?>
						<button type="button" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>
						<a href="<?php echo base_url('PP_Consumer_Loans/downloadall/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
					<?php }
					else { ?>
						<button type="button" class="btn btn-sm btn-default preview" readonly disabled> <i class="fa fa-eye"></i> Preview</button>
						<a haterref="javascript:void(0);" class="btn btn-sm btn-primary download" readonly disabled> <i class="fa fa-cloud-download"></i> Download </a>
					<?php }?>
				  </div>
				  <br />
				</div>
				<table class="table table-bordered table-hover" id="table_auto">
				  <tr id="row_0">
					<td><form action="#">
						<div class="row">
						  <div class="col-lg-12"> <span><a href="#"> 1- Credit Agreement (attached template)</a></span> </div>
						</div>
						<div class="row">
						  <div class="col-lg-12"> <a href="#">2- Joint and Personal Guarantee</a> 
							<!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-12"> <span><a href="#">3- Promissory Note (Attached Template)</a></span> </div>
						</div>
						<div class="row">
						  <div class="col-lg-12"> <span><a href="#">4- Membership form for the Guarantee Fund</a></span> 
							<!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-12"> <span><a href="#">5- Credit Application Form</a></span> 
							<!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-12"> <span><a href="#">6- Memo of Setting Up</a></span> 
							<!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
						  </div>
						</div>
					  </form></td>
				  </tr>				 
				</table>
				<h3 id="tab-title"><span>Check List Customer Documents</span></h3>
				<small class="outputmsg2"></small>
				<div class="row">
				  <div class="col-lg-12">					
				<?php if(!empty($clist_docs)){ ?>
					<button type="button" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal2"><i class="fa fa-eye"></i> Preview</button>
					<a href="<?php echo base_url('PP_Consumer_Loans/downloadallCheckList/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
				<?php } else { ?>
					<button type="button" class="btn btn-sm btn-default preview" readonly disabled /> <i class="fa fa-eye"></i> Preview</button>
					<a href="javascript:void(0);" class="btn btn-sm btn-primary download" readonly disabled /> <i class="fa fa-cloud-download"></i> Download </a>
				<?php } ?>
				  </div>
				</div>
				<table class="table table-bordered table-hover" id="table_auto">
				  <tr id="row_0">
					<td><form action="#">
						<div class="row">
						  <div class="col-lg-6"> <span><a href="#">1) A Client Request</a></span> 
							<!-- <input id="avatar" class="file-loading" type="file" name="image" >	--> 
						  </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios1" id="optionsRadios1" value="option1" checked>
								<label for="optionsRadios1"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios1" id="optionsRadios2" value="option2">
								<label for="optionsRadios2"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">2- CNI Copy Valid</a> 
							
							<!--<input id="avatar" class="file-loading" type="file" name="image" >	--> 
						  </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios2" id="optionsRadios3" value="option3" checked>
								<label for="optionsRadios3"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios2" id="optionsRadios4" value="option4">
								<label for="optionsRadios4"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">3- Last 3 Payslip</a> 
							
							<!--			<input id="avatar" class="file-loading" type="file" name="image" >	--> 
						  </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios3" id="optionsRadios5" value="option5" checked>
								<label for="optionsRadios5"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios3" id="optionsRadios6" value="option6">
								<label for="optionsRadios6"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">4- Certificate of Non-Indebtedness</a> </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios4" id="optionsRadios7" value="option7" checked>
								<label for="optionsRadios7"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios4" id="optionsRadios8" value="option8">
								<label for="optionsRadios8"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">5- Certificate of Irrevocable Transfer</a> </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios5" id="optionsRadios9" value="option9" checked>
								<label for="optionsRadios9"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios5" id="optionsRadios10" value="option10">
								<label for="optionsRadios10"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<a href="#">6- Number of Salary Transfers Received</a>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<div class="radio" style="display:inline-block">
										<input type="radio" name="optionsRadios6" id="optionsRadios11" value="option11" checked>
										<label for="optionsRadios11">YES</label>
									</div>
									<div class="radio" style="display:inline-block">
									<input type="radio" name="optionsRadios6" id="optionsRadios12" value="option12">
									<label for="optionsRadios12">NO</label>
								</div>
							</div>
						</div>
					</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">7- Work Certificate</a> </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios7" id="optionsRadios13" value="option13" checked>
								<label for="optionsRadios13"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios7" id="optionsRadios14" value="option14">
								<label for="optionsRadios14"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">8- Certificate of domicile</a> </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios8" id="optionsRadios15" value="option15" checked>
								<label for="optionsRadios15"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios8" id="optionsRadios16" value="option16">
								<label for="optionsRadios16"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">9- Location Plan</a> </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios9" id="optionsRadios17" value="option17" checked>
								<label for="optionsRadios17"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios9" id="optionsRadios18" value="option18">
								<label for="optionsRadios18"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">10- CIP Verification (unknown client or not) </a> </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios10" id="optionsRadios19" value="option19" checked>
								<label for="optionsRadios19"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios10" id="optionsRadios20" value="option20">
								<label for="optionsRadios20"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">11- Central Risk Verification (unknown client or not)</a> </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios11" id="optionsRadios21" value="option21" checked>
								<label for="optionsRadios21"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios11" id="optionsRadios22" value="option22">
								<label for="optionsRadios22"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
						<div class="row">
						  <div class="col-lg-6"> <a href="#">12- Disability and Death Insurance</a> </div>
						  <div class="col-lg-6">
							<div class="form-group">
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios12" id="optionsRadios23" value="option23" checked>
								<label for="optionsRadios23"> YES </label>
							  </div>
							  <div class="radio" style="display:inline-block">
								<input type="radio" name="optionsRadios12" id="optionsRadios24" value="option24">
								<label for="optionsRadios24"> NO </label>
							  </div>
							</div>
						  </div>
						</div>
					  </form></td>
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
                              <i class="fa fa-file"></i>
                          </div>
                          <div class="cd-timeline-content">
                              <h2>STEP <?php echo $i;?></h2>
                              <span style="font-weight:bold">User: </span><span><?php echo $timeline['field_data'];?></span>
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
						<div class="row">
						  <div class="col-lg-12">    				   				
							<?php if(!empty($risk_analysis)){ ?>
								<button type="button" class="btn btn-sm btn-default preview" data-toggle="modal" data-target="#AnalysisfilePreviewModal"><i class="fa fa-eye"></i> Preview</button>
								<a href="<?php echo base_url('PP_Consumer_Loans/download_analysisfiles/').$appformD[0]['cl_aid']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
							<?php } else { ?>
								<button type="button" class="btn btn-sm btn-default preview" readonly disabled /> <i class="fa fa-eye"></i> Preview</button>
								<button type="button" class="btn btn-sm btn-primary download" readonly disabled /><i class="fa fa-cloud-download"></i> Download</button>
							<?php }?>
						  </div>
						</div>
						<table class="table table-bordered table-hover" id="table_auto">
							<tr id="row_0">
								<td>					
									<div class="row">
										<div class="col-lg-6">
											<span><a href="#">1- CIP verification</a></span>
												<!-- <input id="avatar" class="file-loading" type="file" name="image" >	-->
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
											<!--<input id="avatar" class="file-loading" type="file" name="image" >	-->
										</div>
										<div class="col-lg-6">
											<div class="form-group">
												<div class="radio" style="display:inline-block">
													<input type="radio" name="optionsRadios014" id="optionsRadios027" value="optionsRadios027" checked>
													<label for="optionsRadios027">YES</label>
												</div>
												<div class="radio" style="display:inline-block">
													<input type="radio" name="optionsRadios014" id="optionsRadios028" value="optionsRadios028">
													<label for="optionsRadios028">NO</label>
												</div>
											</div>
										</div>
									</div>
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
								  <th class="text-center"><span>Amount</span></th>
								</tr>
							  </thead>
							  <tbody>
								<form id="FormCurrentmonthly2" method="post">
									<tr>
									  <td> CRESCO </td>
									  <td class="text-center">
									  <input type="number" id="cresco" value="<?php echo $riskcurrentmonthlyvrefit[0]['cresco'] ?: '0';?>" name="cresco_current" class="form-control qty12" min="0" readonly disabled /></td>
									</tr>
									<tr>
									  <td> DECOUVERT </td>
									  <td class="text-center"><input type="number" id="DECOUVERT" value="<?php echo $riskcurrentmonthlyvrefit[0]['decouvert'] ?: '0';?>" name="decouvert_current" class="form-control qty12"min="0" readonly disabled /></td>
									</tr>
									<tr>
									  <td> CMT </td>
									  <td class="text-center"><input type="number" id="CMT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cmt'] ?: '20000';?>" name="cmt_current" class="form-control qty12" min="0" readonly disabled /></td>
									</tr>
									<tr>
									  <td> CCT </td>
									  <td class="text-center"><input type="number" id="CCT" value="<?php echo $riskcurrentmonthlyvrefit[0]['cct'] ?: '0';?>" name="cct_current" class="form-control qty12" min="0" readonly disabled /></td>
									</tr>
									<tr>
									  <td> TOTAL </td>
									  <td class="text-center"><input type="text" id="Ttotal2" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '20000';?>" name="total_clc" class="form-control" min="0"  readonly disabled />
									  
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
								  <th class="text-center"><span>Amount</span></th>
								</tr>
							  </thead>
							  <tbody>					
								<tr>
								  <td> CRESCO </td>
								  <td class="text-center"><input type="number" id="cresco_monthly" value="<?php echo $riskpaymentnewloan[0]['cresco'] ?: '0';?>" name="cresco_monthly" class="form-control qty21" min="0" readonly disabled /></td>
								</tr>
								<tr>
								  <td> DECOUVERT </td>
								  <td class="text-center"><input type="number" id="decouvert_monthly" value="<?php echo $riskpaymentnewloan[0]['decouvert'] ?: '0';?>" name="decouvert_monthly" class="form-control qty21" min="0" readonly disabled /></td>
								</tr>
								<tr>
								  <td> CMT </td>
								  <td class="text-center"><input type="number" id="cmt_monthly" value="<?php echo $riskpaymentnewloan[0]['cmt'] ?: '50';?>" name="cmt_monthly" class="form-control qty21" min="0" readonly disabled /></td>
								</tr>
								<tr>
								  <td> CCT </td>
								  <td class="text-center"><input type="number" id="cct_monthly" value="<?php echo $riskpaymentnewloan[0]['cct'] ?: '0';?>" name="cct_monthly" class="form-control qty21" min="0" readonly disabled /></td>
								</tr>
								<tr>
								  <td> TOTAL </td>
								  <td class="text-center">
									<input type="text" id="total_mlc2" value="<?php echo $riskpaymentnewloan[0]['total_mlc'] ?: '50';?>" name="total_mlc" class="form-control" min="0" readonly disabled readonly/>
								 </td>
								</tr>					
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
								<th class="text-center"><span>Montant</span></th>
							  </tr>
							</thead>
							<tbody>                                                         
							  <tbody>				  
								<tr>
								  <td> NET Salary </td>
								  <td class="text-center"><input type="number" id="net_salary2" value="<?php echo $riskfsituation[0]['net_salary'] ?: '100000';?>" name="net_salary" class="form-control qty32" min="0" readonly disabled /></td>
								</tr>
								<tr>
								  <td> Applicable Loan/Income Ratio </td>
								  <td class="text-center">
									<div class="input-group">
										<input type="number" id="income_ratio2" value="<?php echo $riskfsituation[0]['income_ratio'] ?: '33';?>" name="income_ratio" class="form-control qty32" min="0" readonly disabled />
										<span class="input-group-addon">%</span>
									</div>										  
								  </td>
								</tr>
								<tr>
								  <td> Quotitécessible </td>
								  <td class="text-center"><input type="number" id="quotitecessible2" value="<?php echo $riskfsituation[0]['quotitecessible'] ?: '33000';?>" name="quotitecessible" class="form-control qty32" min="0" readonly disabled /></td>
								</tr>
								<tr>
								  <td> Current Monthly Payments </td>
								  <td class="text-center"><input type="text" id="current_monthly_payments2" value="<?php echo $riskfsituation[0]['current_monthly_payments'] ?: '20000';?>" name="current_monthly_payments" class="form-control qty32" min="0" readonly disabled /></td>
								</tr>
								<tr>
								  <td> New Monthly Payment </td>
								  <td class="text-center"><input type="number" id="new_monthly_payment2" value="<?php echo $riskfsituation[0]['new_monthly_payment'] ?: '50';?>" name="new_monthly_payment" class="form-control qty32" min="0" readonly disabled /></td>
								</tr>
								<tr style="background:yellow">
								  <td> Total </td>
								  <td class="text-center"><input type="number" id="situation_total2" value="<?php echo $riskfsituation[0]['situation_total'] ?: '20050';?>" name="situation_total" class="form-control qty32" min="0" readonly disabled /></td>
								</tr>
								<tr>
								  <td> New Loan/Income Ratio After Project </td>
								  <td class="text-center"><input type="number" id="income_ratio_after2" value="<?php echo $riskfsituation[0]['income_ratio_after'] ?: '12950';?>" name="income_ratio_after" class="form-control qty32" min="0" readonly disabled /></td>
								</tr>
								<tr>
								  <td style="color:green"> Coeficientendettement (Debt Ratio) </td>
								  <td class="text-center">
									<div class="input-group">
										<input type="text" id="coeficientendettement2" value="<?php echo $riskfsituation[0]['coeficientendettement'] ?: '20';?>" name="coeficientendettement" class="form-control qty32" min="0" readonly disabled />
										<span class="input-group-addon">%</span>
									</div>
								  </td>
								</tr>				
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
								<th class="text-center"><span>Ratio</span></th>
							  </tr>
							</thead>
							<tbody>
								<tr>
								  <td><?php echo $applicableloanratio[0]['terms'] ?: 'QUOTITE SALAIRE < 500000 F CFA';?></td>
								  <td class="text-center">
									<div class="input-group">
										<input type="text" id="get_quotitesalaire2" value="<?php echo $applicableloanratio[0]['ratio'] ?: '33';?>" name="get_quotitesalaire" class="form-control" min="0"  readonly disabled >
										<span class="input-group-addon">%</span>
									</div>
								  </td>
								</tr>
								<tr>
								  <td> <?php echo $applicableloanratio[1]['terms'] ?: 'QUOTITE SALAIRE >500 000 F CFA';?> </td>
								  <td class="text-center">
									<div class="input-group">
										<input type="text" id="get_quotitesalaireup2" value="<?php echo $applicableloanratio[1]['ratio'] ?: '40';?>" name="get_quotitesalaireup" class="form-control" min="0"  readonly disabled >
										<span class="input-group-addon">%</span>
									</div>
								  </td>
								</tr>
								<tr>
								  <td> <?php echo $applicableloanratio[2]['terms'] ?: 'QUOTITE CLIENT AVEC CRESCO EN COURS';?></td>
								  <td class="text-center">
									<div class="input-group">
										<input type="text" id="get_quotitesalairemore2" value="<?php echo $applicableloanratio[2]['ratio'] ?: '50';?>" name="get_quotitesalairemore" class="form-control" min="0" readonly disabled >
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
			<!-- End Tab-14 section -->
			<div class="tab-pane fade" id="tab-15">
				<div class="row">
					<div class="col-md-12">					
						<div class="form-group">
							<div class="input-group" style="width:100%">
								<label>Final Memo Credit</label>
								 <textarea row="20" cols="10" class="form-control postpreviedeposit" readonly></textarea>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="tab-16">
				<div class="row">
				  <div class="col-md-12">
					<h3 id="tab-title"><span>Email</span></h3>
				  </div>
				</div>
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
			</div>
			<div class="tab-pane fade" id="tab-17">
				<div style="text-align:center">----</div>
			</div>				
			<div class="tab-pane fade" id="tab-18">
				<h3 id="tab-title"><span>Loan Information</span></h3>						
				<div class="row">
					<div class="col-md-3">
					  <div class="form-group">
						<label>Product Program</label>
						<input type="text" class="form-control" value="<?php echo $appformD[0]['ltype'];?>" readonly disabled>
						<input type="hidden" id="loan_type" name="loan_type" value="<?php echo $appformD[0]['loan_type'];?>" readonly disabled />
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="form-group">
						<label>Loan Amount to be Entered ff</label>
						<div class="input-group"> <span class="input-group-addon">CFA</span>
						  <input type="number" class="form-control" id="loan_amt_d" name="loan_amt" autocomplete="off" value="<?php echo $appformD[0]['loan_amt'];?>" min="0" readonly disabled />
						</div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="form-group">
						<label>Interest</label>
						<div class="input-group">
						  <input type="number" class="form-control" id="loan_interest" name="loan_interest" autocomplete="off" value="<?php echo $appformD[0]['loan_interest'];?>" readonly disabled min="2">
						  <span class="input-group-addon">%</span> </div>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="form-group">
						<label>Term</label>
						<input type="number" class="form-control" id="loan_term" name="loan_term" autocomplete="off" value="<?php echo $appformD[0]['loan_term'];?>" min="0" readonly disabled />
					  </div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
					  <div class="form-group">
						<label>Payment Schedule</label>
						<?php
							$products = array("Monthly", "Quarterly", "Half Yearly", "Yearly");
						?>
						<select class="form-control" name="loan_schedule" id="loan_schedule" readonly disabled >
						  <?php foreach($products as $item){
						if(trim($appformD[0]['loan_schedule']) == $item){ $select="selected";}else{$select="";}
						echo  '<option value="'.$item.'" '.$select.'>'.$item.'</option>';
					}?>
						</select>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="form-group">
						<label>Fees</label>
						<input type="text" class="form-control" id="loan_fee2" name="loan_fee" autocomplete="off" value="<?php echo $appformD[0]['loan_fee'];?>" readonly disabled />
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="form-group">
						<label>Taxes</label>
						<select class="form-control" name="loan_tax" id="loan_tax2" readonly disabled />
						  <?php   foreach($loantax as $tax){
							if($appformD[0]['loan_tax']==$tax['tid']){ $select="selected";}else{$select="";}
								echo '<option value="'.$tax['tid'].'" '.$select.'>'.$tax['tax_type'].'</option>';
							}?>
						</select>
					  </div>
					</div>
					<div class="col-md-3">
					  <div class="form-group">
						<label>Commission</label>
						<input type="text" class="form-control" id="loan_commission2" name="loan_commission" autocomplete="off" value="<?php echo $appformD[0]['loan_commission'];?>" readonly disabled />
					  </div>
					</div>						
				</div>
				<br>						
			</div>

				<div class="tab-pane fade" id="tab-19">
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
					if(!empty($key2['selected_field']=="Déposit")){ ?>
					<h3 id="tab-title"><span>Déposit</span></h3>
					<table class="table table-striped table-hover">
					  <thead>
						<tr class="success">                                        
						<th><span>Numéro de compte</span></th>
						<th><span>Montant</span></th>
						<th class="text-center"><span>Date</span></th>
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
						<td class="text-center"><?php echo date("d/m/Y", strtotime($dept['created']));?></td>
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
				  } 
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
					  <th class="text-center"><span>Date</span></th>
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
					  <td class="text-center"><?php echo date("d/m/Y", strtotime($dept['created']));?></td>
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
				<!-- End Tab-19  -->

				<div class="tab-pane fade" id="tab-20">
					<form id="actionstatus2" method="post">
							<div class="row">
							<div class="editloanmsg2"></div>
							  <div class="col-md-4">
								<div class="form-group">
								  <label>SELECTIONNER VOTRE AVIS</label>
								  <?php if($appformD[0]['loan_status']=="Process" || $appformD[0]['loan_status']=="Demanderetraitement"){  ;?>
								  <select class="form-control" id="decision" name="decision">
									<option value="Approbation" id="Approbation">Approbation</option>
									<option value="Rejet" id="Rejet">Rejet</option>
									<option value="Demanderetraitement" id="Demanderetraitement">Demanderetraitement</option>
								  </select>
								   <?php }else{ ?>
									<select class="form-control" readonly disabled>
                                        <option value="Approbation" id="Approbation">Approbation</option>
                                        <option value="Rejet" id="Rejet">Rejet</option>
                                        <option value="Demanderetraitement" id="Demanderetraitement">Demanderetraitement</option>
                                      </select>
									<?php } ?>
								</div>
							  </div>
							</div>                               
							<div  class="Demanderetraitement">
							  <div class="row">
								<div class="col-md-12">
								<?php if($appformD[0]['loan_status']=="Process" || $appformD[0]['loan_status']=="Demanderetraitement"){  ;?>
								  <div class="form-group">
									<div class="input-group" style="width:100%">
									  <label>Commentaire</label>
									  <input type="text" class="form-control" id="commentstatus" name="commentstatus" placeholder="Enter Commentaire" autocomplete="off" requerd >
									</div>
								  </div>
								  <?php }else{ ?>
								  <div class="form-group">
									<div class="input-group" style="width:100%">
									  <label>Commentaire</label>
									  <input type="text" class="form-control" placeholder="Enter Commentaire" autocomplete="off" readonly disabled >
									</div>
								  </div>
								<?php } ?>
								</div>
								<br>
								<?php if($appformD[0]['loan_status']=="Process" || $appformD[0]['loan_status']=="Demanderetraitement"){  ;?>
								<div class="col-md-12">
									<input type="hidden" name="cl_aid"  value="<?php echo $this->uri->segment(3);?>" readonly>
									<input type="hidden"  id="customar_id_excemption" name="customar_id"  value="<?php echo $appformD[0]['customar_id'];?>" readonly>
									
									<input type="hidden"  id="manager_id" name="manager_id"  value="<?php echo $record[0]->is_admin;?>" readonly>
									
									<input type="hidden"  id="branch_id" name="branch_id"  value="<?php echo $record[0]->branch_id;?>" readonly>
									
									<input type="hidden"  id="account_manager_id" name="account_manager_id"  value="<?php echo $appformD[0]['admin_id'];?>" readonly>
								
									<button type="button" class="btn btn-primary pull-right clearfix" id="commentsubmit2" style="margin-top: 10px;">SOUMETTRE</button>                                    
									
									<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right commentlofer2" style="position:relative;top: -25px;left:-3px; display: none;">					
								</div>
								<?php } ?>
							  </div>
							</div>
							<br>
								<textarea row="20" cols="10" class="form-control commentres" style="margin: 0px -8.34375px 0px 0px; height: 151px; display:none;"></textarea>
					</form>
				</div>
				<!-- End Tab-20  -->
			</div>
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
        <h4 class="modal-title heading lead">System Docs Files</h4>
      </div>
      <div class="modal-body">
        <?php if(!empty($sys_docs)){?>
        <ul class="list-group">
          <?php $i=1; foreach($sys_docs as $file1){
					//print_r($file1);					
					?>
          <li class="list-group-item alert alert-success">
            <?php 
					//'pdf','doc','docx','png','jpg','jpeg'
						if($file1['file_extension']=='.pdf'){
							echo '<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
						}else if($file1['file_extension']=='.docx' || $file1['file_extension']=='.doc'){
							echo '<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
						}
						else if($file1['file_extension']=='.jpeg' || $file1['file_extension']=='.jpg' || $file1['file_extension']=='.png'){
							echo '<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
						}
					 echo $i.") ". ucwords($file1['raw_name']);?>
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
					//print_r($file1);					
					?>
          <li class="list-group-item alert alert-success">
            <?php 
					//'pdf','doc','docx','png','jpg','jpeg'
						if($file2['file_extension']=='.pdf'){
							echo '<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
						}else if($file2['file_extension']=='.docx' || $file2['file_extension']=='.doc'){
							echo '<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
						}
						else if($file2['file_extension']=='.jpeg' || $file2['file_extension']=='.jpg' || $file2['file_extension']=='.png'){
							echo '<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
						}
					 echo $i.") ". ucwords($file2['raw_name']);?>
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
          <?php $i=1; foreach($risk_analysis as $filea){ ?>
          <li class="list-group-item alert alert-success">
            <?php 
			//'pdf','doc','docx','png','jpg','jpeg'
				if($filea['file_extension']=='.pdf'){
					echo '<span class="badge"><i class="fa fa fa-file-pdf-o fa-fw fa-lg"></i></span>';
				}else if($filea['file_extension']=='.docx' || $filea['file_extension']=='.doc'){
					echo '<span class="badge"><i class="fa fa-file-word-o fa-fw fa-lg"></i></span>';
				}
				else if($filea['file_extension']=='.jpeg' || $filea['file_extension']=='.jpg' || $filea['file_extension']=='.png'){
					echo '<span class="badge"><i class="fa fa-file-image-o fa-fw fa-lg"></i></span>';
				}
			 echo $i.") ". ucwords($filea['raw_name']);?>
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



<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/bootstrap.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.nanoscroller.min.js"></script> 
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
<script src="<?php echo  base_url(); ?>assets/js/scripts.js"></script> 
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

<script type="text/javascript">

$("#commentsubmit").on("click", function(e) {    
    var form = $("#actionstatus");           
     var serializedFormStr =form.serialize();
     $.ajax({
        type:'POST',
        url:'<?php echo base_url("SubAdmin_dashboard/comment_manager");?>',
        data: $.trim(serializedFormStr),
        beforeSend: function(){         
            $('#actionstatus').css("opacity","0.5"); 
            $('.commentlofer').css("display","block");
        },
        success:function(resp){                      
            console.log(resp);  
					 
             $('.commentlofer').css("display","none");
             $('#actionstatus').css("opacity","1");				
				if($.trim(resp)==1){
					$('.editloanmsg').html('<div class="alert alert-block alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Success. </h4> Record update successfully!</div>');
					setTimeout(function() {                
						location.reload();
					}, 2500);
				}else{
					$('.editloanmsg').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>Commentaire field not empty!</div>');			       
					
				}            
        }                
    });
});

$("#commentsubmit2").on("click", function(e) {    
    var form = $("#actionstatus2");           
     var serializedFormStr =form.serialize();
     $.ajax({
        type:'POST',
        url:'<?php echo base_url("SubAdmin_dashboard/comment_manager");?>',
        data: $.trim(serializedFormStr),
        beforeSend: function(){         
            $('#actionstatus2').css("opacity","0.5"); 
            $('.commentlofer2').css("display","block");
        },
        success:function(resp){                      
            console.log(resp);  
					 
             $('.commentlofer2').css("display","none");
             $('#actionstatus2').css("opacity","1");				
				if($.trim(resp)==1){
					$('.editloanmsg2').html('<div class="alert alert-block alert-success fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Success. </h4> Record update successfully!</div>');
					setTimeout(function() {                
						location.reload();
					}, 2500);
				}else{
					$('.editloanmsg2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>Commentaire field not empty!</div>');			       
					
				}            
        }                
    });
});


</script>

<script>
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
	});

function select_collateral()
	{		
		var c = $('#collateral_split').val();	
		if(c=='Véhicule')
		{
			$('.Véhicule').show();
			$('.Déposit').hide();
			$('.Maison').hide();
			$('.Excemption').hide();	
		}	
		if(c=='Déposit')
		{
			$('.Véhicule').hide();
			$('.Déposit').show();
			$('.Maison').hide();
			$('.Excemption').hide();	
		}	
		if(c=='Maison')
		{
			$('.Véhicule').hide();
			$('.Déposit').hide();
			$('.Maison').show();
			$('.Excemption').hide();	
		}	
		if(c=='Excemption')
		{
			$('.Véhicule').hide();
			$('.Déposit').hide();
			$('.Maison').hide();
			$('.Excemption').show();	
		}
	
	}
	
	function select_collateral_details()
	{		
		var c = $('#collateral_details').val();	
		if(c=='Véhicule')
		{
			$('.Véhicule').show();
			$('.Déposit').hide();
			$('.Maison').hide();
			$('.Excemption').hide();	
		}	
		if(c=='Déposit')
		{
			$('.Véhicule').hide();
			$('.Déposit').show();
			$('.Maison').hide();
			$('.Excemption').hide();	
		}	
		if(c=='Maison')
		{
			$('.Véhicule').hide();
			$('.Déposit').hide();
			$('.Maison').show();
			$('.Excemption').hide();	
		}	
		if(c=='Excemption')
		{
			$('.Véhicule').hide();
			$('.Déposit').hide();
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
</body></html>