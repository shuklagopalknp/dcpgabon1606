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

              <li><a href="<?php echo base_url('PP_FETES_A_LA_CARTE');?>">PP FETES A LA CARTE</a></li>            

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

                                    <div class="col-xs-2 no-padding"><?php echo ucfirst($customer->first_name) ?: '-';?><?php echo $customer->middle_name ?: ' ';?><?php echo $customer->last_name ?: '-';?></div>

                                    <div class="col-xs-2 bold no-padding">Duree Du Pret:</div>

                                    <div class="col-xs-2 no-padding"><?php echo $loan_details['loan_term'];?> 

                                    <?php if($appformD[0]['loan_schedule'] == "Monthly"){

                                      echo "MOIS";

                                    } ?></div>

                                    <div class="col-xs-2 bold no-padding">Agence:</div>

                                    <div class="col-xs-2"><?php echo $loan_details['branch_name'];?></div>

                                  </div>

                                  <div class="row well_row">

                                    <div class="col-xs-2 bold no-padding">Statut Du Pret:</div>

                                    <div class="col-xs-2 no-padding"><?php echo $loan_details['approval_status'];?></div>

                                    <div class="col-xs-2 bold no-padding">Nature Du Pret:</div>

                                    <div class="col-xs-2 no-padding">PP FETES A LA CARTE</div>

                                    <div class="col-xs-2 bold no-padding">Taux D'Interet:</div>

                                    <div class="col-xs-2 no-padding"><?php echo sprintf("%01.2f", $loan_details['loan_interest']);?>%</div>

                                  </div>

                                  <div class="row well_row">

                                    <div class="col-xs-2 bold no-padding">Montant Du Pret:</div>

                                    <div class="col-xs-2 no-padding">CFA <?php echo number_format($loan_details['loan_amt'],0,',',' ');?></div>

                                    <div class="col-xs-2 bold no-padding">Date Dernier Echeance:</div>

                                    <div class="col-xs-2 no-padding">

                                      <?php  echo $DateofLastPayment;

                                      //echo date('d-m-Y', strtotime('+1 month', strtotime($appformD[0]['created'])));;?>

                                        

                                      </div>

                                    <div class="col-xs-2 bold no-padding">Montant Total A Rembourser:</div>

                                    <div class="col-xs-2 no-padding">CFA <?php echo number_format($loan_details['tpmnt'],0,',',' ');?></div>

                                  </div>

                                  <div class="row well_row">

                                    <div class="col-xs-2 bold no-padding">TVA(VAT On Interest):</div>

                                    <div class="col-xs-2 no-padding"><?php echo 'CFA '.number_format($sumofVATonInterest,0,',',' '); ?></div>

                                    <div class="col-xs-2 bold no-padding">Mensualite:</div>

                                    <div class="col-xs-2 no-padding">CFA <?php echo number_format($loan_details['pmnt'],0,',',' ') ;?></div>

                                    <div class="col-xs-2 bold no-padding">Numero De Compte:</div>

                                    <div class="col-xs-2 no-padding"><?php echo $customer->account_no;?></div>

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



              <div class="action-panel">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;margin-bottom:10px;">

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="nextstep-buttons">

                      <!-- Age of Customer section -->

                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">

                         <?php                                    

                        $dateOfBirth = date('Y-m-d', strtotime($customer->dob));

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

                        // print_r($customer->opening_date);                           

                        $Tenurewithbank = date("d-m-Y" ,strtotime($customer->opening_date));

                        $today = date("Y-m-d");

                        $diff = date_diff(date_create($Tenurewithbank), date_create($today));

                         ?>

                        <div class="infographic-box" data-toggle="tooltip" title="Tenure with Bank"> <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value"><?php echo timeAgo($Tenurewithbank) ?: '21';?></span> 

                          <!--<span class="headline">Users</span>--> 

                        </div>

                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">

                        <div class="infographic-box" data-toggle="tooltip" title="Previous Loans"> <img src="<?php echo base_url('assets/img/loans.png');?>" /> <span class="value"><?php echo $loan_count;?></span>

                        </div>

                      </div>



                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">

                        <div class="infographic-box" data-toggle="tooltip" title="Application Date"> <img src="<?php echo base_url('assets/img/timer.png');?>" /> <span class="value">

                          <?php

                          // print_r($loan_details);

                           echo timeAgo($loan_details['created']) ?: '10 Days';?></span> 

                          <!--<span class="headline">Users</span>--> 

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="nextstep-buttons">

                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">

                        <div class="infographic-box" data-toggleft="tooltip" title="Ratio Debt">

                          <img src="<?php echo base_url('assets/img/tenure.png');?>" /> <span class="value rdval2">

                            <?php 

                            $score=$riskcurrentmonthlyvrefit[0]['score'];

                             if($score<='35'){

                              echo "<p style='color: green'>".$score."</p>";

                              }else{

                                echo "<p style='color: red'>".$score."</p>";

                              }?>                              

                            </span>

                        </div>

                      </div>

                      <!-- <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">

                        <div class="infographic-box" data-toggle="tooltip" title=""> <img src="<?php echo base_url('assets/img/revenue.png');?>" />  <span class="headline">Target List</span> </div>

                      </div> -->

                      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12" style="text-align:right;">

                                    <loan-back> <a href="<?php echo base_url('PP_Consumer_Loans/amortization_loan/').$loan_details['loan_id_temp'].'/1/view';?>" class="btn btn-default loan-back"  style="width:100%;margin-top:25px;">AMORTISSMENT</a> </loan-back>

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



          <div class="tab-content" style="margin-top: 40px;">



        <div class="tab-pane fade" id="tab-2">



            <h3 id="tab-title"><span><?php echo ucwords("Frais De Dossier"); ?></span></h3>



              <form id="fraisDeDossierForm" method="post">



                <div class="row">



                  <div class="col-md-12">

                     <div class="frais_msgdetails"></div>

                  </div>



                <div class="col-md-3">



                  <div class="form-group">



                  <label>Frais De Dossier</label>

                    <div class="input-group">

                    <span class="input-group-addon">CFA</span>

                  <input type="number" class="form-control" id="frais_de_doss" name="frais_de_doss" autocomplete="off" value="<?php echo $loan_details['frais_de_dossier'];?>" required min="0"  <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                      echo "readonly" ; }?> >

                    </div>

                  </div>



                </div>



                <div class="col-md-3">



                  <div class="form-group">



                  <label>Frais D'Assurance</label>

                    <div class="input-group">

                    <span class="input-group-addon">CFA</span>

                  <input type="number" class="form-control" id="frais_de_assurance" name="frais_de_assurance" autocomplete="off" value="<?php echo $loan_details['frais_de_assurance'];?>" required min="0" <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                      echo "readonly" ; }?>>

                    </div>

                  </div>



                </div>

                <div class="col-md-3">



                  <div class="form-group">



                  <label>Frais D'enregistrement</label>

                    <div class="input-group">

                    <span class="input-group-addon">CFA</span>

                  <input type="number" class="form-control" id="frais_denregistrement" name="frais_denregistrement" autocomplete="off" value="<?php echo $loan_details['frais_denregistrement'];?>" required min="0" <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                      echo "readonly" ; }?>>

                    </div>

                  </div>



                </div>

                </div>



                





                <div class="col-md-12">



                  <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

                  <input type="hidden" name="application_id" id="application_id" value="<?php echo $loan_details['loan_id']?>">

                   <input type="hidden" name="product" id="product_type" value="credit_conso">





                  <button type="button" id="frais_btn" class="btn btn-primary pull-right"

                  <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                      echo "style='display:none'" ; }?>>SAVE DETAILS</button>



                  <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right feeloder" style="position:relative;top: 9px;left:-13px; display: none;">



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





                

                <input type="hidden" name="branch_id" id="branch_id" value="<?php echo $customer->branch_id;?>">

              

              <div class="col-md-3">

                <div class="form-group">

                  <label> Prénoms <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 

                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->first_name ;?>



                     <?php } else {?>



                    <input type="text" name="first_name" value="<?php  echo $customer->first_name ?>" required>



                    <?php } ?>



                  </span></h3>

                </div>

              </div>                  

              <div class="col-md-3">

                <div class="form-group">

                  <label>2ième Prénoms </label>

                  <h3 id="tab-details"><span>



                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->middle_name ;?>



                     <?php } else {?>

                   <input type="text" name="middle_name" value="<?php  echo $customer->middle_name ?>">



                    <?php }?>





                   </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label> Nom <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->last_name ;?>



                     <?php } else {?>

                   <input type="text" name="last_name" value="<?php  echo $customer->last_name ?>" required>

                    <?php } ?>

                  </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Genre <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>



                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->gender ;?>



                     <?php } else {?>

                    <select  id="gender" name="gender">

                                <option value="Male" id="Male" <?php if($customer->gender == "Male") echo "selected"; ?>>Male</option>

                                <option value="Female" id="Female" <?php if($customer->gender == "Female") echo "selected"; ?>>Female</option>

                              </select>



                    <?php } ?>

                   <!-- <input type="text" name="gender" value="<?php echo $customer->gender?>"> -->

                 </span></h3>

                </div>

              </div>

            </div>



            <div class="row">

              <div class="col-md-3">

                <div class="form-group">

                  <label>Date de naissance </label>

                  <h3 id="tab-details"><span> 

                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo date('d-m-Y', strtotime($customer->dob)) ;?>



                     <?php } else {?>

                    <input type="text" class="dob" placeholder="dd-mm-yyyy" name="dob" value="<?php echo date('d-m-Y', strtotime($customer->dob)) ?>" >

                  <?php } ?>

                  </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Dipôme ou Niveau étude </label>

                  <h3 id="tab-details"><span>

                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo ucwords($customer->education) ;?>



                     <?php } else {?>

                    <input type="text" name="education" value="<?php echo ucwords($customer->education) ?>">

                  <?php } ?>

                  </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Situation Matrimoniale </label>

                  <h3 id="tab-details"><span>

                    <?php 

                          $marital = array(

                                    "Célibataire",

                                    "Marié(e)",

                                    "Divorcé(e)",

                                    "Veuf",

                                    "Veuve",

                                  ); 

                          

                     if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->marital_status ;

                        } else {?>      

                          <select  id="marital_status" name="marital_status">

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

                            </select> 

                          <?php } ?>

                   </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Email <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->email ;

                        } else { ?>  

                    <input type="text" name="email" required value="<?php echo $customer->email ?>">

                  <?php }?>

                  </span></h3>

                </div>

              </div>

            </div>



            <div class="row">

              <div class="col-md-3">

                <div class="form-group">

                  <label>Lieu de residence <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->resides_address ;

                        } else { ?>  

                    <input type="text" name="resides_address" required value="<?php echo $customer->resides_address ?>">

                  <?php } ?>

                  </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Nom de la rue <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->street ;

                        } else { ?>  

                    <input type="text" name="street" required value="<?php echo $customer->street ?>">

                      <?php } ?>

                  </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Ville de résidence <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->city_id ;

                        } else { ?>  

                   <input type="text" name="city" required value="<?php echo $customer->city_id ?>">

                    <?php } ?>

                 </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Pays de résidence <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->state_id ;

                        } else { ?>  

                    <input type="text" name="state" required value="<?php echo $customer->state_id ?>">

                  <?php } ?>

  </span></h3>

                </div>

              </div>

            </div>

            <div class="row">

                <div class="col-md-3">

                  <div class="form-group">

                    <label> Objet du crédit</label>                                   

          <!-- <?php

                            $objcredit = array(

                              "Consomation",

                              "Equipement",

                              "Immobilier",

                              "Scolaire",

                              "Autres",

                            ); ?> -->



                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo ' <h3 id="tab-details"><span> '.$customer->object_credit ?? '' .'</span></h3>';

                        } else { ?>  



                            <textarea name="obj_credit" id="obj_credit" class="form-control addvalidate"><?php echo $customer->object_credit ?? '';?></textarea>



                      <?php }?>

                                      

                  </div>

                </div>

            </div>





            <h3 id="tab-title" style="margin-top: 1%;"><span>Informations Additionnelles</span></h3>

            <div class="row">

              <div class="col-md-3">

                <div class="form-group">

                  <label>Type d’identification </label>                

                  <?php

                    $Typeid2 = array(

                      "Passport",

                      "CNI",

                      "Recepisse + Acte de Naissance",

                      "Carte de Sejour"

                    );

                    if(in_array('4_2', $this->session->userdata('portal_permission')) && $loan_details['status']!="Disbursement"){ ?>

                    <select class="form-control" name="typeofid" id="type_id2" required>

                      <?php foreach($Typeid2 as $adnfo2){

                      if(trim($customer->type_id) == $adnfo2){ $select2="selected";}else{$select2="";}

                        echo  '<option value="'.$adnfo2.'" '.$select2.'>'.$adnfo2.'</option>';

                      }?>

                    </select>

                    <?php } else{

                      echo '<h3 id="tab-details"><span>'.$customer->type_id.'</span></h3>';

                    }?>                  

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Revenu mensuel <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->monthly_income;

                        } else { ?>  

                   <input type="number" name="monthly_income" value="<?php echo  $customer->monthly_income; ?>" min="0" required >

                      <?php } ?>

                 </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Dépenses mensuelles <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 

                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->monthly_income;

                        } else { ?> 

                    <input type="number" name="monthly_expenses" value="<?php echo $customer->monthly_expenses; ?>" min="0" required >

                      <?php } ?>

                  </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Numéro du type d’identification <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 

                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->id_number;

                        } else { ?> 

                    <input type="text" name="id_number" value="<?php echo $customer->id_number ?>" required onkeypress="return isNumber(event)">

                      <?php } ?>

                  </span></h3>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-md-3">

                <div class="form-group">

                  <label>Pays de résidence <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>

                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->state_of_issue;

                        } else { ?> 

                   <input type="text" name="state_of_issue" value="<?php echo $customer->state_of_issue ?>" required> 

                    <?php }?>

                 </span></h3>

                </div>

              </div>

              <!-- <div class="col-md-3">

                <div class="form-group">

                  <label>Fonction <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->occupation;

                        } else { ?> 

                   <input type="text" name="occupation" value="<?php echo $customer->occupation ?>">

                 <?php }?>

                 </span></h3>

                </div>

              </div> -->

              <div class="col-md-3">

                <div class="form-group">

                  <label>Numéro de téléphone principal <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->main_phone;

                        } else { ?> 

                    <input type="tel" name="main_phone" id="phone2" class="phone_main_c" value="<?php echo $customer->main_phone ?>" placeholder="" required onkeypress="return istelNumber(event)">



                  <?php } ?>

                  </span>

                    <span id="phone2valid-msg" class="hide">✓ Valid</span>

                    <span id="phone2error-msg" class="hide"></span>

                  <!-- <span class="phone_main_error error_c" style="display:none">Please enter valid phone no. </span>

                  <span class="phone_main_valerror error_c" style="display:none">Please enter 10 digits phone no.</span> -->

                  </h3>

                    

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Second Numéro de téléphone </label>

                  <h3 id="tab-details"><span>

                      <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->alternative_phone;

                        } else { ?> 

                    <input type="text" id="phone_alt2" class="phone_alternate_c" name="alternative_phone" id="alternative_phone" value="<?php echo $customer->alternative_phone ?>" onkeypress="return istelNumber(event)">

                  <?php }?>

                  </span>

                    <span id="phone_alt2valid-msg" class="hide">✓ Valid</span>

                    <span id="phone_alt2error-msg" class="hide"></span>

                 <!--  <span class="phone_alt_error error_c" style="display:none">Please enter valid phone no. </span>

                  <span class="phone_alt_valerror error_c" style="display:none">Please enter 10 digits phone no.</span> -->

                  </h3>

                    

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Date Expiration du type d’identification </label>

                  <h3 id="tab-details"><span> 

                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo date('d-m-Y', strtotime($customer->expiration_date_id));

                        } else { ?> 

                    <input type="text" class="expiration_date" name="expiration_date" value="<?php echo date('d-m-Y', strtotime($customer->expiration_date_id)) ?>"  required >



                      <?php } ?>

                  </span></h3>

                </div>

              </div> 

            </div>

            <div class="row">

                               

              <div class="col-md-3">

              <div class="form-group">

                <label>Date Etablissement Type de Pièce <span style="color:red">*</span></label>

                <h3 id="tab-details"><span>



                  <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->room_type;

                        } else { ?> 

                  <input type="text" id="room_type" name="room_type" placeholder="DD-MM-YYYY"  required value="<?php echo $customer->room_type ?>" autocomplete="off" />



                <?php } ?>

                </span></h3>

              </div>

            </div>

            <div class="col-md-3">

              <div class="form-group">

                <label>Nom et Prénoms du PERE <span style="color:red">*</span></label>

                <h3 id="tab-details"><span>

                   <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->father_fullname;

                        } else { ?> 

                  <input type="text"  name="father_fullname" required  value="<?php echo $customer->father_fullname ?>">

                  <?php } ?>

                </span></h3>

              </div>

            </div>

            <div class="col-md-3">

              <div class="form-group">

                <label>Noms et Prénoms  de la MERE <span style="color:red">*</span></label>

                <h3 id="tab-details"><span>

                   <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->mother_fullname;

                        } else { ?> 

                  <input type="text"  name="mother_fullname" required value="<?php echo $customer->mother_fullname ?>">

                <?php } ?>

                </span></h3>

              </div>

            </div>

             <div class="col-md-3">

                 <div class="form-group">

                <label>Nationalité<span style="color:red">*</span></label>



                 <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                      foreach($nationality as $key=>$nation){ 

                          if($nation['id'] == $customer->nationality)

                          {

                            echo '<h3 id="tab-details"><span>'.$nation['nationality'].'</span></h3>';

                            break;

                          }

                      }

                 } else { ?> 

                 <input type="text"  class="form-control addvalidate" id="nationality_datalist" name="nationality_datalist" required="true" placeholder="Input text" list="nationality" autocomplete="off"  value="Cameroonian" />



                 <input type="hidden" name="nationality" id="nationality_value" value="<?php echo $customer->nationality ?? '30';?>">



                <datalist id="nationality">

                <?php foreach($nationality as $key=>$nation){ 

                ?>

                   <option  data-value="<?php echo $nation['id']?>" value="<?php echo $nation['nationality']?>" ></option>

                <?php } ?>

                 

                </datalist> 



                <?php } ?>

              </div>

              </div>

            </div>

            <div class="row">

             

              <div class="col-md-3">

                <div class="form-group">

                <label>Lieu Etablissement Pièce<span style="color:red">*</span></label>

                <h3 id="tab-details"><span>

                <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                 echo $customer->insurance_place_id;

                  } else { ?> 

                <input type="text" name="insurance_place_id" id="insurance_place_id" value="<?php echo $customer->insurance_place_id ?? '';?>" required="true">



              <?php } ?>



                </span></h3>

              </div>

              </div>

            </div> 





            <h3 id="tab-title" style="margin-top: 1%;"><span>Information Sur l'EmploiI</span></h3>

            <div class="row">

               <div class="col-md-3">

                <div class="form-group">

                  <label>Nom de l’employeur <span style="color:red">*</span></label>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       foreach($employers as $key=>$emp){ 

                          if($emp['emp_id'] == $customer->employer_name)

                          {

                            echo '<h3 id="tab-details"><span>'.$emp['employer_name'].'</span></h3>';

                            break;

                          }



                       }

                  } else { ?> 



                   <input type="text"  class="form-control addvalidate" id="emp_name_datalist" name="emp_name_datalist" value="" required placeholder="Input text" list="employers" autocomplete="off" onchange="show_emplist(this);" />  



                  <input type="hidden" name="employer_name" id="emp_name" value="<?php echo $customer->employer_name?>">

                  <datalist id="employers">

                  <?php foreach($employers as $key=>$emp){ ?>

                     <option  data-value="<?php echo $emp['emp_id']?>" value="<?php echo $emp['employer_name']?>">

                  <?php } ?>

                   

                  </datalist> 



                <?php } ?>

                </div>

              </div>



              <div class="col-md-3">

                <div class="form-group" style="margin-bottom:5px;">

                  <label>Secteur d’activité</label> 

                  <?php if(in_array('4_2', $this->session->userdata('portal_permission'))){

                    if($loan_details['status']!="Disbursement"){ ?>                                      

                  <select class="form-control"  id="secteurs"  disabled="disabled">

                  <?php 

                    if(!empty($secteurs)){

                      foreach($secteurs as $Key){

                      if(trim($customer->secteurs_id) == $Key['tlc_id']){ $select="selected";}else{$select="";}

                        echo "<option value=\"".$Key['tlc_id']."\" name=\"".$Key['secteurs']."\" ".$select." >".$Key['secteurs']."</option>"."\r\n";

                      }

                    }

                    ?>                                     

                  </select>



                  <input type="hidden" id="secteurs_value" name="secteurs_id" value="<?php echo $customer->secteurs_id ;?>">

                

                  <?php } }

                  else{ 

                      if(!empty($secteurs)){

                      foreach($secteurs as $Key){ 

                          if($Key['tlc_id'] == $customer->secteurs_id)

                          {

                            echo '<h3 id="tab-details"><span>'.$Key['secteurs'].'</span></h3>';

                            break;

                          }

                      }

                     }

                   }

                  ?>

                </div>

              </div>





              <div class="col-md-3">

                <div class="form-group" style="margin-bottom:5px;">

                  <label>Catégorie Employeurs </label>

                  <?php if(in_array('4_2', $this->session->userdata('portal_permission'))){ if($loan_details['status']!="Disbursement"){ ?>

                  <select class="form-control"  id="cat_employeurs" disabled="disabled">

                    <?php 

                      if(!empty($cat_emp)){

                        foreach($cat_emp as $Key){

                          if(trim($customer->cat_emp_id) == $Key['cat_id']){ $select="selected";}else{$select="";}

                          echo "<option value=\"".$Key['cat_id']."\" name=\"".$Key['catrgory']."\" ".$select.">".$Key['catrgory']."</option>"."\r\n";

                        }

                      }

                      ?>                                       

                  </select>

                    <input type="hidden" id="cat_emp_value" name="cat_emp_id" value="<?php echo $customer->cat_emp_id?>">

                <?php } }

                else { 

                    if(!empty($cat_emp)){

                        foreach($cat_emp as $Key){

                          if(trim($customer->cat_emp_id) == $Key['cat_id']){ 

                              echo '<h3 id="tab-details"><span>'.$Key['catrgory'].'</span></h3>';

                            break;

                          }

                         

                        }

                      }

                 } ?>

                </div>

              </div>



              <div class="col-md-3">



                 <div class="form-group" style="margin-bottom:5px;">

                   <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image" style="display:none; position: absolute; z-index: 1000; top: 34px;">

                    <label>Type de Contrat </label>

                    <?php if(in_array('4_2', $this->session->userdata('portal_permission'))  && $loan_details['status']!="Disbursement"){ ?>

                    <select class="form-control typeofcontract_c" id="typeofcontract2" name="typeofcontract" style="width:98%" onchange="set_date_end_for_CDD();">

                      <option value="">Select</option>

                      <?php 

                        if(!empty($contract_type)){

                          foreach($contract_type as $Key){

                           // print_r($Key);

                            if(trim($customer->contract_type_id) == $Key['tc_id']){ $select="selected";}else{$select="";}

                          echo "<option  ".$select."  value=\"".$Key['tc_id']."\" name=\"".$Key['contract_type']."\">".$Key['contract_type']."</option>";                       }

                        }

                        ?>                                          

                    </select>

                    <?php } 

                else { 



                    if(!empty($contract_type)){

                          foreach($contract_type as $Key){

                           // print_r($Key);

                            if(trim($customer->contract_type_id) == $Key['tc_id']){



                              echo '<h3 id="tab-details"><span>'.$Key['contract_type'].'</span></h3>';

                             }

                        }

                      }

                  ?>

                  



                <?php } ?>

                  </div>  

              </div>



            </div>



            <div class="row">

              <div class="col-md-3">

                <div class="form-group">

                  <label>Date d’embauche <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo date('d-m-Y', strtotime($customer->employment_date));

                        } else { ?> 

                    <input type="text" placeholder="dd-mm-yyyy" class="employment_date" name="employment_date" required  value="<?php echo date('d-m-Y', strtotime($customer->employment_date)) ?>" >



                  <?php } ?>



                  </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Date End of Contract for CDD </label>

                  <h3 id="tab-details"><span>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       if($customer->contract_type_id=="1" && $customer->sate_end_contract_cdd != "")

                        echo date('d-m-Y', strtotime($customer->sate_end_contract_cdd));

                        } else { ?> 

                   <input type="text" class="edn_date_contract_cdd" placeholder="dd-mm-yyyy" name="sate_end_contract_cdd" value="<?php if($customer->contract_type_id=="1" && $customer->sate_end_contract_cdd != "")echo date('d-m-Y', strtotime($customer->sate_end_contract_cdd)); ?>" onblur="set_date_end_for_CDD();" <?php if($customer->contract_type_id !="1") { ?> disabled="disabled"<?php } ?> autocomplete="off">

                 <?php }?>

                 </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Nombre of Years of Professionel Experience <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>

                   <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->years_professionel_experience;

                        } else { ?> 

                        <input type="number" name="years_professionel_experience" value="<?php echo $customer->years_professionel_experience ?>" min="0">

                      <?php } ?>                                

                    </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Date de présence chez l’employeur actuel <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo date('d-m-Y', strtotime($customer->how_he_is_been_with_current_employer));

                        } else { ?> 



  <input type="text" class="current_emp"  name="current_emp" value="<?php if($customer->how_he_is_been_with_current_employer) echo date('d-m-Y', strtotime($customer->how_he_is_been_with_current_employer)); ?>">

                      

                     <?php }?>

                      

                    </span></h3>

                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-md-3">

                <div class="form-group">

                  <label>Salaire net <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 



                  <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->emp_net_salary;

                        } else { ?> 

                         <input type="number" name="emp_net_salary" required value="<?php if($customer->emp_net_salary) echo $customer->emp_net_salary; ?>" min="0">

                       <?php }?>

                       </span></h3>

                </div>

              </div>



              <div class="col-md-3">

                <div class="form-group">

                  <label>Age de retraite prévu <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span>



                  <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->retirement_age_expected;

                        } else { ?> 



                         <input type="number" name="retirement_age_expected"  required value="<?php echo $customer->retirement_age_expected ?>" min="18">

                      <?php } ?>

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

                  "Compte d’épargne",

                  "Compte d’épargne régulier",

                  "Compte courant",

                  "Compte de dépôt récurrent",

                  "Fixed Deposit Account",

                  "Demat Account",

                  "NRI Accounts",

              ); ?>

          <?php

          if(in_array('4_2', $this->session->userdata('portal_permission')) && $loan_details['status']!="Disbursement"){ ?>

              <select class="form-control" name="account_type" id="account_type" required>

              <?php foreach($Typeid as $adnfo){

          if(trim($customer->account_type) == $adnfo){ 

              $select="selected";}else{$select="";}

              echo '<option value="'.$adnfo.'" '.$select.'>'.$adnfo.'</option>';

                  }?>

              </select>

          <?php } else{

                  echo '<h3 id="tab-details"><span>'.$customer->account_type.'</span></h3>';

              }?>                                   

              </div>   

           </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Bank Name </label>

                  <h3 id="tab-details"><span> 



                     <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       foreach($branch_record as $type){ 

                          if($type['bid'] ==  $customer->bank_name)

                          {

                            echo '<h3 id="tab-details"><span>'.$type['branch_name'].'</span></h3>';



                            break;

                          }

                          

                        }





                        } else { ?> 

                    <select  class="" name="bank_name" id="bank_name" style="width:98%" required >

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

                    </select> 



                  <?php } ?>



                   <!--  <input type="text" required name="bank_name" value="<?php echo $customer->bank_name ?>"></span></h3> -->

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Téléphone agence bancaire <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 



                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->bank_phone;

                        } else { ?> 

                    <input type="text"  class="form-control addvalidate" id="bank_phone" name="bank_phone" placeholder="" value="<?php echo $customer->bank_phone ?>" required onkeypress="return istelNumber(event)" /> </span>

                            <input type="hidden" id="item_4" name="bankphone_countrycode" value="">

                          <span id="bankphone_valid-msg" class="hide">✓ Valid</span>

                              <span id="bankphone_error-msg" class="hide"></span> 



                      <?php } ?>

                  </h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Date ouverture de compte </label>

                  <h3 id="tab-details"><span>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo date("d-m-Y", strtotime($customer->opening_date));

                        } else { ?> 

                     <input type="text" class="opening_date"  name="opening_date" value="<?php echo date("d-m-Y", strtotime($customer->opening_date)) ?>" required >

                   <?php } ?>

                   </span></h3>

                </div>

              </div>

               

            </div>

            <div class="row">

              

              <div class="col-md-3">

                <div class="form-group">

                  <label>Numéro de compte <span style="color:red">*</span></label>

                  <h3 id="tab-details"><span> 

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->account_no;

                        } else { ?> 

                    <input type="text" name="account_number" value="<?php echo $customer->account_no ?>" required onkeypress="return isNumber();" >

                      <?php } ?>

                  </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Code de la banque </label>

                  <h3 id="tab-details"><span> 

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->information;

                        } else { ?> 

                   <input type="text" name="another_test" value="<?php echo $customer->information ?>">

                    <?php } ?>

                 </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Code de l’agence </label>

                  <h3 id="tab-details"><span> 

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->field_1;

                        } else { ?> 

                   <input type="text" name="field_1" value="<?php echo $customer->field_1 ?>">

                 <?php } ?>

                 </span></h3>

                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                  <label>Clé RIB </label>

                  <h3 id="tab-details"><span>

                    <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

                       echo $customer->field_2;

                        } else { ?> 

                   <input type="text" name="field_2" value="<?php echo $customer->field_2 ?>">

                 <?php } ?>

  </span></h3>

                </div>

              </div>

            </div>



              

            <div class="row">



              <div class="col-md-12">





                <?php if (in_array('4_2', $this->session->userdata('portal_permission'))){

                      ?> 

                 <div class="text-center">

                     <button type="submit" class="btn btn-primary waves-effect waves-light submitBtn" sytle ="margin-top: 5px;margin-bottom: 20px;"><img src="<?php echo base_url('assets/img/select2-spinner.gif'); ?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Update</button>

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

            <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image_details" style="display:none">

              <input id="systemdocsfiles" type="file" multiple="" name="systemdocsfiles[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">

            </label>

            <input type="hidden" id="getcid"  name="getcid" value="">



              <button type="button" file_type="system_docs" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>



              <a href="<?php echo base_url('Customer_Product/download_documents/gage_espece/system_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>

          



                 <table class="table table-bordered table-hover" id="table_auto">

                                    <tr id="row_0">

                                      <td>  

                                      <?php if(!empty($documents['system_docs'])){

                                            $count = 1 ;

                                          foreach($documents['system_docs'] as $key=>$doc) {

                                        ?>                                    

                                        <div class="row">

                                          <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url($doc['document_url'].'/'.$loan_details['loan_id']);?>','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return"> <?php echo $count++ ; ?> - <?php echo ucwords($doc['document_name'])?></a></span>

                                          </div>

                                        </div>



                                      <?php }

                                        }

                                      ?>

                                       </td>

                                    </tr>

                                  </table>

            </div>

          </div>

         

          <h3 id="tab-title"><span>CHECK LISTDOCUMENTS A FOURNIR</span></h3>

          <small class="outputmsg2"></small>

          <div class="row">

            <div class="col-lg-12">

            <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_imagechecklist_details" style="display:none">

              <input type="file" multiple="" name="check_list_documents[]" id="check_list_documents" accept="application/msword,application/pdf, application/msword,  application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">

            </label>

  

              <button type="button" file_type="checklist_docs" class="btn btn-sm btn-default  preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>



              <a href="<?php echo base_url('Customer_Product/download_documents/gage_espece/checklist_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>



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

                                                   <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

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

                                <h2>STEP <?php echo $i;?></h2>

                                <span style="font-weight:bold">User: </span>

                                <span><?php //echo $timeline['field_data'];?> (<?php echo $timeline['first_name'] ?: '';?> <?php echo $timeline['last_name'] ?: '';?>) </span>

                                <p><span style="font-weight:bold">Comment :</span><?php echo $timeline['comment'];?></p>

                                <span class="cd-date"><?php echo $timeline['created_at'];?></span>

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

          <h3 id="tab-title"><span>List</span></h3>



          <small class="analysismsg2"></small>

          <div class="row">

            <div class="col-lg-12">

              <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="analysisfilesloder2" style="display:none">



                <input id="risk_analysisfiles" type="file" multiple="" name="risk_analysisfiles[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">



              </label>           



                <button type="button" file_type = "risk_analysis_docs" class="btn btn-sm btn-default preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>



                <a href="<?php echo base_url('Customer_Product/download_documents/gage_espece/risk_analysis_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>





               <table class="table table-bordered table-hover" id="table_auto">

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

                                                  <?php if($documents['risk_status'][$key] == "1") echo "checked";?>  <?php if (!in_array('4_2', $this->session->userdata('portal_permission'))){

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

              <h3 id="tab-title"><span> Calcul Salaire Residuel</span></h3>

              <?php 

             // print_r($loan_details);

              ?>

              <div class="col-md-6">

                <div class="table-responsive">

                  <table class="table table-condensed table-hover">

                    <thead>

                      <tr class="info">

                        <th><span>(Last Salary Average)</span></th>

                        <th><span>Amount</span></th>

                      </tr>

                    </thead>

                    <tbody>

                      <form id="FormCurrentmonthly2" method="post">

                      <tr>

                        <td> Salaire1 </td>

                        <td>

                        <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>

                         <input type="number" id="Salaire1" value="<?php echo $riskcurrentmonthlyvrefit[0]['Salaire1'] ?: '0';?>" name="Salaire1" class="form-control qty12" min="0" required />

                        <?php } else { ?>

                          <input type="number" id="Salaire1" value="<?php echo $riskcurrentmonthlyvrefit[0]['Salaire1'] ?: '0';?>" name="Salaire1" class="form-control qty12" min="0" disabled readonly />

                        <?php } ?>

                      </td>

                      </tr>

                      <tr>

                        <td> Salaire2 </td>

                        <td>

                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>

                            <input type="number" id="Salaire2" value="<?php echo $riskcurrentmonthlyvrefit[0]['Salaire2'] ?: '0';?>" name="Salaire2" class="form-control qty12" min="0" required />

                          <?php } else { ?>

                            <input type="number" id="Salaire2" value="<?php echo $riskcurrentmonthlyvrefit[0]['Salaire2'] ?: '0';?>" name="Salaire2" class="form-control qty12" min="0"  disabled readonly />

                          <?php } ?>

                        </td>

                      </tr>

                      <tr>

                        <td> Salaire3 </td>

                        <td>                          

                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>

                            <input type="number" id="Salaire3" value="<?php echo $riskcurrentmonthlyvrefit[0]['Salaire3'] ?: '0';?>" name="Salaire3" class="form-control qty12" min="0" required />

                          <?php } else { ?>

                            <input type="number" id="Salaire3" value="<?php echo $riskcurrentmonthlyvrefit[0]['Salaire3'] ?: '0';?>" name="Salaire3" class="form-control qty12" min="0" disabled readonly />

                          <?php } ?>

                        </td>

                      </tr>

                      <tr>

                        <td> Total </td>

                        <td>

                          

                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>

                            <input type="number" id="Ttotal2" value="<?php echo $riskcurrentmonthlyvrefit[0]['Ttotal2'] ?: '0';?>" name="Ttotal2" class="form-control" min="0" required readonly/>

                          <?php } else { ?>

                            <input type="number" id="Ttotal2" value="<?php echo $riskcurrentmonthlyvrefit[0]['Ttotal2'] ?: '0';?>" name="Ttotal2" class="form-control" min="0"  disabled readonly />

                          <?php } ?>

                        </td>

                      </tr>

                      <tr>

                        <td> Salaire Residuel </td>

                        <td>

                          <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>

                            <input type="text" id="total_clc" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '0';?>" name="total_clc" class="form-control" min="0" required readonly/>

                            <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right riskcurrentmonthloder2" style="position:relative;top: -25px;left:-3px; display: none;">

                          <?php } else { ?>

                            <input type="text" id="total_clc" value="<?php echo $riskcurrentmonthlyvrefit[0]['total_clc'] ?: '0';?>" name="total_clc" class="form-control" min="0" disabled readonly />

                          <?php } ?>

                        </td>

                      </tr>

                      

                      <tr>                                              

                        <td colspan=2>

                        <input type="hidden" id="Rcl_aid" value="<?php echo $loan_details['loan_id'] ;?>" name="cl_aid" class="form-control"/>

                        <input type="hidden" id="salaryAnnual" value="<?php echo $riskcurrentmonthlyvrefit[0]['salaryAnnual'] ?: '0'; ;?>" name="salaryAnnual" class="form-control"/>

                        <input type="hidden" id="score" value="<?php echo $riskcurrentmonthlyvrefit[0]['score'] ?: '0';;?>" name="score" class="form-control"/>

                        

                        <input type="hidden" id="Rloan_type" value="credit_conso" name="loan_type" class="form-control"/>

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

                        <th><span></span></th>

                        <th><span></span></th>

                      </tr>

                    </thead>

                    <tbody>

                      <form id="FormMonthlyNew2" method="post">

                        <tr>

                          <td> Montant Encours Externe </td>

                          <td>

                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>

                              <input type="number" id="montant_encours_externe" value="<?php echo $riskpaymentnewloan[0]['montant_encours_externe'] ?: '0';?>" name="montant_encours_externe" class="form-control m_ext" min="0" required />

                            <?php } else { ?>

                              <input type="number" id="montant_encours_externe" value="<?php echo $riskpaymentnewloan[0]['montant_encours_externe'] ?: '0';?>" name="montant_encours_externe" class="form-control m_ext" min="0" disabled readonly />

                            <?php } ?>

                            

                          </td>

                        </tr>

                        <tr>

                          <td> Montant Encours Interne </td>

                          <td>

                            <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>

                              <input type="number" id="montant_encours_interne" value="<?php echo $riskpaymentnewloan[0]['montant_encours_interne'] ?: '0';?>" name="montant_encours_interne" class="form-control m_int" min="0" required />

                            <?php } else { ?>

                              <input type="number" id="montant_encours_interne" value="<?php echo $riskpaymentnewloan[0]['montant_encours_interne'] ?: '0';?>" name="montant_encours_interne" class="form-control m_int" min="0" disabled readonly />

                            <?php } ?>

                            

                          </td>

                        </tr>

                                            

                        <tr>                                              

                          <td colspan=2>

                          <input type="hidden"  value="<?php echo $loan_details['loan_id'] ;?>" name="rcapid" class="form-control"/>

                          

                          <input type="hidden" value="credit_conso" name="loan_type" class="form-control"/>

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

                <h3 id="tab-title"><span>Age related Risk</span></h3>

                <div class="col-md-6">

                  <div class="table-responsive">

                    <table class="table table-condensed table-hover">

                      

                     

                        

                      <thead>

                        <tr class="info">

                          <th><span>Entrée en relation</span></th>

                          <th><span>Montant</span></th>

                        </tr>

                      </thead>

                      <tbody>                                                         

                        <tbody>

                        <form id="Formfinancial_situation2" method="post"> 

                        

                        <tr>

                          <td> Date of opening </td>

                          <td>

                          <div class="input-group">

                          

                              <input type="input" id="opening_date" value="<?php echo $customer->opening_date?>" name="" class="form-control" min="0" disabled readonly />

                          

                            

                            

                          </div>                      

                          </td>

                        </tr>

                        <tr>

                          <td> Date of loan Application </td>

                          <td>

                          

                              <input type="input" id="application_date" value="<?php echo $today = date("Y-m-d");?>" name="application_date" class="form-control" min="0" disabled readonly />

                           

                            

                          </td>

                        </tr>

                        <tr>

                          <td> Relation With bank </td>

                          <td>

                            

                              <input type="input" id="net_salary2" value="<?php echo timeAgo2($Tenurewithbank) ?: '0';?>" name="net_salary" class="form-control qty32" min="0" disabled readonly />

                            

                            

                          </td>

                        </tr>



                          

                        <tr>

                        <td>

                        <input type="hidden"  value="<?php echo $loan_details['loan_id'] ;?>" name="cl_aid" class="form-control"/>

                          

                          <input type="hidden" value="credit_conso" name="loan_type" class="form-control"/>

                          <textarea class="showajaxrequestnewfs2 form-control" rows="10" style="display:none;" ></textarea>

                          </td>

                          </tr>

                      </form>

                      </tbody>

                    </table>

                    <table class="table table-condensed table-hover">

                      

                     

                        

                      <thead>

                        <tr class="info">

                          <th><span>Embauche</span></th>

                          <th><span>Montant</span></th>

                        </tr>

                      </thead>

                      <tbody>                                                         

                        <tbody>

                        <form id="Formfinancial_situation2" method="post"> 

                        

                        <tr>

                          <td> Date of joining </td>

                          <td>

                          <div class="input-group">

                             <input type="input" id="opening_date" value="<?php echo $customer->employment_date?>" name="" class="form-control" min="0" disabled readonly />

                            

                            

                          </div>                      

                          </td>

                        </tr>

                         <tr>

                          <td> Date of loan Application </td>

                          <td>

                          

                              <input type="input" id="application_date" value="<?php echo $today = date("Y-m-d");?>" name="application_date" class="form-control" min="0" disabled readonly />

                           

                            

                          </td>

                        </tr>

                        <tr>

                          <td> Embauche </td>

                          <td>

                           

                              <input type="input" id="net_salary2" value="<?php echo timeAgo2($customer->employment_date) ?: '0';?>" name="net_salary" class="form-control qty32" min="0" disabled readonly />

                           

                            

                          </td>

                        </tr>



                          

                        <tr>

                        <td>

                        <input type="hidden"  value="<?php echo $loan_details['loan_id'] ;?>" name="cl_aid" class="form-control"/>

                          

                          <input type="hidden" value="credit_conso" name="loan_type" class="form-control"/>

                          <textarea class="showajaxrequestnewfs2 form-control" rows="10" style="display:none;" ></textarea>

                          </td>

                          </tr>

                      </form>

                      </tbody>

                    </table>

                    <table class="table table-condensed table-hover">

                      

                     

                        

                      <thead>

                        <tr class="info">

                          <th><span>Naissance</span></th>

                          <th><span>Montant</span></th>

                        </tr>

                      </thead>

                      <tbody>                                                         

                        <tbody>

                        <form id="Formfinancial_situation2" method="post"> 

                        

                        <tr>

                          <td> Date of Birth </td>

                          <td>

                          <div class="input-group">

                            

                              <input type="input" id="opening_date" value="<?php echo $customer->dob?>" name="" class="form-control" min="0" disabled readonly />

                            

                            

                          </div>                      

                          </td>

                        </tr>

                        <tr>

                          <td> Date of loan Application </td>

                          <td>

                          

                              <input type="input" id="application_date" value="<?php echo $today = date("Y-m-d");?>" name="application_date" class="form-control" min="0" disabled readonly />

                           

                            

                          </td>

                        </tr>

                        <tr>

                          <td> Naissance </td>

                          <td>

                            

                              <input type="input" id="net_salary2" value="<?php echo timeAgo($customer->dob) ?: '0';?>" name="net_salary" class="form-control qty32" min="0" disabled readonly />

                           

                            

                          </td>

                        </tr>



                          

                        <tr>

                        <td>

                        <input type="hidden"  value="<?php echo $loan_details['loan_id'] ;?>" name="cl_aid" class="form-control"/>

                          

                          <input type="hidden" value="credit_conso" name="loan_type" class="form-control"/>

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

                          <th><span>Criteria</span></th>

                          <th><span>Mois</span></th>

                        </tr>

                      </thead>

                      <tbody>                                                         

                        <tbody>

                        <form id="" method="post"> 

                        

                        <tr>

                          <td>Entrée en relation</td>

                          <td>

                          <div class="input-group">

                            

                              <input type="number" id="" value="33" name="" class="form-control" min="0" disabled readonly />



                          </div>                      

                          </td>

                        </tr>

                        <tr>

                          <td>Embauche</td>

                          <td>

                          <div class="input-group">

                            

                              <input type="number" id="" value="142" name="" class="form-control" min="0" disabled readonly />



                          </div>                      

                          </td>

                        </tr>

                        <tr>

                          <td>Naissance</td>

                          <td>

                          <div class="input-group">

                            

                              <input type="input" id="" value="56 years" name="" class="form-control" min="0" disabled readonly />



                          </div>                      

                          </td>

                        </tr>

                       

                        

                      </form>

                      </tbody>

                    </table>

                  </div>

                </div>

              </tbody>



                

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

                          <th><span>FINANCIAL SITUATION</span></th>

                          <th><span>Montant</span></th>

                        </tr>

                      </thead>

                      <tbody>                                                         

                        <tbody>

                        <form id="Formfinancial_situation2" method="post"> 

                        <tr>

                          <td> Mensualite </td>

                          <td>

                            

                              <input type="input" id="loanmonthly" value="<?php echo $loan_details['pmnt'] ?: '0';?>" name="loanmonthly" class="form-control" min="0" disabled readonly />

                           

                            

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

                           

                              <input type="input" id="loanannual" value="<?php echo  $loan_details['pmnt']*12?>" name="loanannual" class="form-control" min="0" disabled readonly />

                           

                            

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

                            

                              <input type="input" id="score2" name="score2" class="form-control" min="0" value="<?php echo $riskcurrentmonthlyvrefit[0]['score'] ?: '0';?>" disabled readonly />

                            

                            

                          </td>

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



       if(in_array('4_6', $this->session->userdata('portal_permission'))) {



        ?>

      <div class="tab-pane fade" id="tab-10">

        <div class="row">

          <form id="observation" method="post" >

               <div class="col-md-12">

                  <h3 id="tab-title"><span>Confirmation</span></h3>

                   <table class="table table-condensed table-hover">

                      <thead>

                        <tr>

                           <?php if($loan_details['review']=="0"){ ?>

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

                          <th>Montant<br> FCFA</th>

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

      if(in_array('4_6', $this->session->userdata('portal_permission'))) {

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



            <div class="col-md-12">

              <div class="history_msg"></div>



            <div class="col-md-4">



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



          </div>







          <div class="Email" style="display:block">



            <div class="row">



            <form id="emailHistoryForm" method="post" enctype="multipart/form-data">



              <div class="col-md-12">



              <div class="col-md-6">



                <div class="form-group">



                <div class="input-group" style="width:100%">



                  <label>Nom et Prénoms</label>



                  <input type="text" class="form-control" id="field_name2" name="field_name" placeholder="Enter Nom et Prénoms" value="" required >



                </div>



                </div>



              </div>



              <div class="col-md-6">



                <div class="form-group">



                <div class="input-group" style="width:100%">



                  <label>Email</label>



                  <input class="form-control" id="fieldemail2" name="fieldemail" value="<?php echo $customer->email ?>" placeholder="Enter Email" required>



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



               

                <button type="submit" id="button_3_2" class="btn btn-primary pull-right sendEmail">ENVOYER</button>



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



              <div class="col-md-12">



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

            <div class="col-md-4">

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

          </div>

          

          <div style="display:block" class="Véhicule">

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

                           <label> Modèle </label>

                           <?php if($appformD[0]['final_confirmation']!="Disbursement"){ ?>

                              <?php echo form_input('vehicule_modele', '', array('class' => 'form-control', 'placeholder' => 'Enter Modèle', 'id' => 'vehicule_modele', 'autocomplete'=>'off'));?>

                          <?php } else {?>                          

                              <?php echo form_input('vehicule_type', '', array('class' => 'form-control', 'placeholder' => 'Enter Modèle', 'id' => 'vehicule_type', 'autocomplete'=>'off', 'disabled'=>'disabled'));?>

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

                              // $disabledStatus1="disabled='disabled'";

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



                <input type="text" class="form-control" value="<?php if($loan_details['customer_type']==1){

                  echo "Customer Loan";

                }else{

                  echo "Business Loan";

                }?>" readonly disabled>



                <input type="hidden" id="loan_type" name="loan_type" value="<?php echo $loan_schedule;?>" readonly >



                </div>



              </div>



              <div class="col-md-3">



                <div class="form-group">



                <label>MONTANT DU PRET</label>



                <div class="input-group"> <span class="input-group-addon">CFA</span>



                  <input type="number" class="form-control" id="loan_amt_d" name="loan_amt" autocomplete="off" value="<?php echo $loan_details['loan_amt'];?>" min="0" required>



                </div>



                </div>



              </div>



              <div class="col-md-3">



                <div class="form-group">



                <label>TAUX INTERET</label>



                <div class="input-group">



                  <input type="number" class="form-control" id="loan_interest" name="loan_interest" autocomplete="off" value="<?php echo $loan_details['loan_interest'];?>" required min="2">



                  <span class="input-group-addon">%</span> </div>



                </div>



              </div>



              <div class="col-md-3">



                <div class="form-group">



                <label>DUREE</label>



                <input type="number" class="form-control" id="loan_term" name="loan_term" autocomplete="off" value="<?php echo $loan_details['loan_term'];?>" required min="0" >



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



                if(trim($loan_details['loan_schedule']) == $item){ $select="selected";}else{$select="";}



                echo  '<option value="'.$item.'" '.$select.'>'.$item.'</option>';



              }?>



               </select>

                </div>

              </div>

               <div class="col-md-3">

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



                <button type="button" id="button_2" class="btn btn-primary pull-right">SAVE DETAILS</button>



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



          <?php if($this->session->userdata('role') != "11" && $this->session->userdata('role') != "9" && in_array('4_6', $this->session->userdata('portal_permission')) ) {?>

            <form id="DecisionStatusdetails" method="post">

              <div class="row">

                <div class="col-md-4">

                  <div class="form-group">

                    <label>SELECTIONNER VOTRE AVIS</label>    

                    <?php $decision = array("Avis Favorable","Avis défavorable","Demande de retraitement"); ?>

                     <select class="form-control" id="decision" name="decision"

                     <?php if($loan_details['review'] == 1) echo "disabled";?>

                     >

                        <?php foreach($decision as $dec){

                          if(trim($loan_details['approval_status']) == $dec){ 

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

              </div>

             

           

            <div class="col-lg-12">&nbsp;</div>  

             <div style="display:block" class="Approbation">



                <div class="row">

                   <div class="col-md-12">

                    <div class="form-group">

                      <div class="input-group" style="width:100%">

                        <label>Commentaire</label>

                        <?php 

                        // print_r($loan_details);

                        if($loan_details['review']=='0'){ ?>

                          <input type="text" class="form-control" id="commentstatus" name="commentstatus" placeholder="Enter Commentaire" autocomplete="off" required />

                        <?php  } else if($loan_details['review']=="1" || $loan_details['review']=="") { ?>

                          <input type="text" class="form-control" placeholder="Enter Commentaire" autocomplete="off" disabled />

                         <?php  } ?>

                      </div>

                    </div>

                  </div> 



                  <div class="col-md-12">

                    



                    <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right commentlofer" style="position:relative;top: 17px;left:-124px; display:none;">

                    <button type="button" class="btn btn-primary pull-right clearfix" id="commentsubmit" style="margin-top:10px;margin-bottom:10px;">SOUMETTRE</button>

                  </div> 

                </div>

                 <div class="col-md-12">

                  <div class="decisionmsg"></div>

                

                </div>

             </div>

               </form>

              <?php } ?>

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

                      foreach ($decision_rec as $rec ) {

                          

                         $timetoago=$rec['comment_date'];

                          echo "<tr>";

                              echo "<td>".$rec['name']."</td>";

                              echo "<td>".ucwords($rec['first_name']." ".$rec['last_name'])."</td>";

                              echo "<td>".$rec['approval_status']."</td>";

                              echo "<td>".$rec['comment']."</td>";

                              echo "<td>". date('d-m-Y', strtotime($rec['comment_date'])).':'.timeAgo($timetoago)."</td>";

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

  var document_status__url = "<?php echo base_url('Customer_Product/change_document_status/credit_conso/').$loan_details['loan_id']?>";

  var system_upload_url  =  "<?php echo base_url('Customer_Product/upload_systemfiles/credit_conso/').$loan_details['loan_id'];?>";

  var checklist_upload_url = "<?php echo base_url('Customer_Product/upload_checklistfiles/credit_conso/').$loan_details['loan_id'];?>";

  var risk_upload_url =  "<?php echo base_url('Customer_Product/uploadfile_risk_analysis/credit_conso/').$loan_details['loan_id'];?>";

  var preview_url ="<?php echo base_url('Customer_Product/view_uploaded_documents/credit_conso/').$loan_details['loan_id']?>";

  var decision_url = '<?php echo base_url("Customer_Product/comment_manager/credit_conso/").$loan_details['loan_id'];?>';





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

    $(".m_ext").blur(function(){
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





  // Risk Analyse form in gage espece



    $("#riskAnalyseForm").validate({

      errorClass: 'has-error',

      rules: {

        cash_voucher:{

          required : true,

          maxlength: 20

        },

        subscription_date:{

          required : true,

          dateregex: /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/

        },

        due_date:{

          required : true,

          dateregex: /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/

        },

        amount:{

          required : true,

          number: true

        },

        subscriber:{

          required : true,

          maxlength: 40

        },

        depositor:{

          required : true,

          maxlength: 25

        },

        assignment_account:{

          required : true,

          maxlength: 30

        },

        beneficiary:{

          required : true,

          maxlength: 40

        },

        subscription_location:{

          required : true,

          maxlength: 25

        },

        place_of_payment:{

          required : true,

          maxlength: 25

        }



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

          url: '<?php echo base_url("Gage_Espece/manage_risk_analysis/").$loan_details['loan_id'];?>',

          type: 'POST',

          data: $(form).serialize(),

          beforeSend: function(){

            $('.submitBtn').attr("disabled","disabled");

            $('#riskAnalyseForm').css("opacity","0.5");

            $(".sr-only").show();

          },

          success: function(response) {

            

            $('.analyseflash-msg').html('').removeClass('alert alert-success fade in');

            $('#riskAnalyseForm').css("opacity","1");  

            if(response=="success"){                                    

              $('.analyseflash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Record Saved successfully').addClass('alert alert-success fade in').fadeOut(5000);  

                setTimeout(function(){                      

                  location.reload();

                 }, 1500); 

            $('.submitBtn').attr("disabled","");



            }else{

            $('.analyseflash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error in saving record').addClass('alert alert-danger fade in');

            }

          }            

        });



        }

    });





    $("#riskAnalyseForm2").validate({

      errorClass: 'has-error',

      rules: {

        object:"required",

        granted_amount:{

          required : true,

          number: true

        },

        deadline_date:{

          required : true,

          dateregex: /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/

        },

        tax_interest:{

          required : true,

          number:true

        },

        transaction_unfolded:{

          required : true,

          maxlength: 25

        },

        how_to_use:{

          required : true,

          maxlength: 25

        },

        implementation_cost:{

          required : true,

          number: true

        },

        death_insurance:{

          required : true,

          number: true

        },

        gaurantee_fund:{

          required : true,

          number: true

        }



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

          url: '<?php echo base_url("Gage_Espece/manage_risk_analysis_facility/").$loan_details['loan_id'];?>',

          type: 'POST',

          data: $(form).serialize(),

          beforeSend: function(){

            $('.submitBtn').attr("disabled","disabled");

            $('#riskAnalyseForm2').css("opacity","0.5");

            $(".sr-only").show();

          },

          success: function(response) {

          

            // console.log(response);

            // return false;

            $('.analyseflash-msg2').html('').removeClass('alert alert-success fade in');

            $('#riskAnalyseForm2').css("opacity","1");  

            if(response=="success"){                                    

              $('.analyseflash-msg2').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Record Saved successfully').addClass('alert alert-success fade in').fadeOut(5000);  

                setTimeout(function(){                      

                  location.reload();

                 }, 1500); 

            $('.submitBtn').attr("disabled","");



            }else{

            $('.analyseflash-msg2').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error in saving record').addClass('alert alert-danger fade in');

            }

          }            

        });



        }

    });





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

          url: '<?php echo base_url("Customer_Product/manage_cad_memorandum/gage_espece/").$loan_details['loan_id'];?>',

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

              $('.memo_message').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Record Saved successfully').addClass('alert alert-success fade in').fadeOut(5000);  

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

          url:'<?php echo base_url("Customer_Product/manage_history_interaction_customer/credit_conso/email/").$loan_details['loan_id'];?>',

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

          required: true,

          number:true

          }, 

          sms_content: "required"

          

      },      

      messages: {

         sms_phone_no: {

          required: "Please enter phone no.",

          number:"Please enter valid phone no."



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

          url:'<?php echo base_url("Customer_Product/manage_history_interaction/gage_espece/sms/").$loan_details['loan_id'];?>',

          data:$(formdata).serialize(),

          beforeSend: function(){

            $('.sms_btn').attr("disabled","disabled");

            $('#smsHistoryForm').css("opacity","0.5");

            $('.history_msg').val("");

            $('.smsloader').css("display","inline");         

          },

          success: function(response) {

            

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

          url:'<?php echo base_url("Customer_Product/manage_history_interaction/gage_espece/interview_telephone/").$loan_details['loan_id'];?>',

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

              $('.history_msg').html('<div class="alert alert-success">Record Saved Successfully.</div>'); 

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

       first_name: {

        required: true,

        rangelength:[3,20],

        nameregex:/^[a-zA-Z]*$/

       }, 

       middle_name:{

        rangelength:[3,20],

        nameregex:/^[a-zA-Z]*$/

      },

      last_name:{

        rangelength:[3,20],

        nameregex:/^[a-zA-Z]*$/

       },

        loan_interest: {

        required: true,

       },

       id_number:{

        digitregex:/^[0-9]*$/

       },

       main_phone:{

        mobileregex : /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/



       },

       alter_phone:{

        mobileregex : /^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$/

       },

       father_fullname:{

        required: true,

        rangelength:[4,20],

        nameregex:/^([a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]{1,}|[a-zA-Z]+\s{1}[a-zA-Z]{3,}\s{1}[a-zA-Z]{1,})$/

      },

      mother_fullname:{

        required: true,

        rangelength:[4,20],

        nameregex:/^([a-zA-Z]+|[a-zA-Z]+\s{1}[a-zA-Z]{1,}|[a-zA-Z]+\s{1}[a-zA-Z]{3,}\s{1}[a-zA-Z]{1,})$/

      },

      dob:{

        dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/

      },

      expiration_date :{

        dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/

      },

      employment_date :{

        dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/

      },

      edn_date_contract_cdd :{

        dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/

      },

      current_emp :{

        dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/

      },

      opening_date :{

        dateregex : /^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/

      },

      insurance_place_id : {

        required : true,

        nameregex : /^[a-zA-Z]*$/

      },

      nationality_datalist : "required",

      accoumt_number:{

        number:true

       }    

        

      },      

      messages: {

        first_name: {

          required: "Name field is required.",

        },      

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

          url:'<?php echo base_url("Customer_Product/manage_business_loan_data/credit_conso/").$loan_details['loan_id'];?>',

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

              $('.response-msg').html('<div class="alert alert-success"><strong>Success!</strong> Details saved Successfully.</div>'); 

              setTimeout(function() {                

                        location.reload();

                      }, 2000);                               

                       }else{                                             

                        $('.response-msg').html('<div class="alert alert-danger"><strong>Error!</strong> Unable to save record.</div>');

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

        url:'<?php echo base_url("PP_FETES_A_LA_CARTE/edit_loan");?>',

        data: $.trim(serializedFormStr),

        beforeSend: function(){

            $('#loanEditForm').css("opacity","0.5");

            $('.calculatorloder').css("display","block");

        },

        success:function(resp){

           //console.log(resp);

           $(".editjson").val($.trim(resp));

           $('.calculatorloder').css("display","none");

           $('#loanEditForm').css("opacity","1");

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

    </script> 



  <script>



      $(document).on("keyup click", ".qty12", function() {

    var sumofcurrent  = 0;

    $(".qty12").each(function(){

      if($(this).val() !== ""){

        sumofcurrent += parseFloat($(this).val());

      }else{

        $(this).val(0);

      }

    });

    avg=Math.round(sumofcurrent/3);

    $("#Ttotal2").val(sumofcurrent);

    $("#total_clc").val(avg);

    $("#avg3_2").val(avg);

    $("#salaryAnnual").val(avg*12);

    $("#salaryAnnual2").val(avg*12);

    loanannual=$( "#loanannual" ).val();

    $("#score").val(Math.round((loanannual/(avg*12))*100));

    $("#score2").val(Math.round((loanannual/(avg*12))*100));

        



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

        url:'<?php echo base_url("PP_FETES_A_LA_CARTE/riskanalysis_current_monthly_credit");?>',

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

        url:'<?php echo base_url("PP_FETES_A_LA_CARTE/riskanalysis_monthly_payment_new_loan");?>',

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

            url:'<?php echo base_url("PP_FETES_A_LA_CARTE/riskanalysis_financial_situation");?>',       data:$.trim(serializedFormRf), 

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

  var Quotitécessible=((net_salary * income_ratio)/100);

  $("#quotitecessible").val(Quotitécessible);

  //$("#CRESCO").val(Quotitécessible);

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



function financial_situation2()

{

  

  var persentage =$("#get_quotitesalaire2").val(),

  persentage1 =$("#get_quotitesalaireup2").val(),

  persentage2 =$("#get_quotitesalairemore2").val(); 

  var net_salary2=$("#net_salary2").val(),

  income_ratio2=$("#income_ratio2").val(),

  quotitecessible=$("#quotitecessible2").val();

   var cresco_monthly=$("#cmt_monthly2").val();  

   // alert(cresco_monthly);

  if($("#net_salary2").val() < 500000)

  {

    $("#income_ratio2").val(persentage);

  }else{

    $("#income_ratio2").val(persentage1);

  }



  var Quotitécessible=((net_salary2 * income_ratio2)/100);

  $("#quotitecessible2").val(Quotitécessible);

  // alert(current_monthly_payments2);



  $("#cmt_monthly2").val(cresco_monthly);



  if($("#Ttotal2").val() !== ""){

    $("#current_monthly_payments2").val($("#Ttotal2").val());

  }

  if($("#total_mlc2").val() !== ""){

    $("#new_monthly_payment2").val($("#total_mlc2").val());

  }

  if($("#current_monthly_payments2").val()!== "" && $("#new_monthly_payment2").val()!== ""){



    var1= parseFloat($("#current_monthly_payments2").val());

    var2= parseFloat($("#new_monthly_payment2").val());

      // alert(var1);

      // alert(var2);



    $("#situation_total2").val(var1+var2);



  } else{

    // alert('else part');

  }

  $("#income_ratio_after2").val(parseFloat($("#quotitecessible2").val())-parseFloat($("#situation_total2").val() ));  

  var t =parseFloat($("#current_monthly_payments2").val())+parseFloat($("#new_monthly_payment2").val());

  var t1=t/$("#net_salary2").val();

  $("#coeficientendettement2").val(parseFloat(t1*100));

  $(".rdval2").html($("#coeficientendettement2").val());

}

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

    url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_vehicule');?>",

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

        $('.getdataajaxvehicule').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');

        

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

    url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_deposit');?>",

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

        $('.getdataajaxdeposit').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');

        

      } 

    }

  });    

});



$(document).on('change', '#upload_maison', function(){

  

  var cid_m ='<?php echo $loan_details['loan_id'];?>';    

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

    url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_maison');?>",

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

        $('.getdataajaxmaison').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje2.error)+'</div>');

        

      }

      

      

    }

  });    

});

$(document).on('change', '#excemption_files', function(){ 

  var cid_e ='<?php echo $loan_details['loan_id'];?>';    

  var fileN = document.getElementById("excemption_files").files[0].name;    

  var collateral_e =$("#collateral_split").val(); 

  var form = $("#collateralformexcemption");    

    var formdata = new FormData(form[0]); 

  formdata.append('collateraltype', collateral_e);

  for(var i = 0; i < fileN.length; i++) {       

    formdata.append("files[]", document.getElementById('excemption_files').files[i]);       

  }

  $.ajax({

    url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_excemption');?>",

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

        $('.getdataajaxexcemption').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje3.error)+'</div>');

        

      }

    }

  });    

});



//================DETAILS Collateral=====================

$(document).on('change', '#vehicule_uploadfile2', function(){ 

  var aid_vehicule2 ='<?php echo $appformD[0]['admin_id'];?>';  

  var file_vehicule2 = document.getElementById("vehicule_uploadfile2").files[0].name; 

  var loan_id = '<?php echo $loan_details['loan_id'];?>'; 



  var collateral2 =$("#collateral_details").val();  

  var form = $("#collateralformvehicule1");    

    var formdata = new FormData(form[0]);

  formdata.append('collateraltype', collateral2);

  formdata.append('adminid', aid_vehicule2);

  formdata.append('loan_id', loan_id);

  

  for(var i = 0; i < file_vehicule2.length; i++) {        

    formdata.append("files[]", document.getElementById('vehicule_uploadfile2').files[i]);       

  }

  $.ajax({

    url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_vehicule');?>",

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

        $('.getdataajaxvehicule2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');

        

      }  

      

    } 

  });    

}); 





$(document).on('change', '#deposit_files2', function(){

  //  alert("deposit");

  var aid_deposit2 ='<?php echo $appformD[0]['admin_id'];?>'; 

  var file_deposit2 = document.getElementById("deposit_files2").files[0].name; 

  var loan_id = '<?php echo $loan_details['loan_id'];?>'; 

    

  var collateral_d2 =$("#collateral_details").val();  

  var form = $("#collateralformdeposit2");    

    var formdata = new FormData(form[0]);

  formdata.append('collateraltype', collateral_d2);

  formdata.append('adminid', aid_deposit2);

  formdata.append('loan_id', loan_id);

  

  for(var i = 0; i < file_deposit2.length; i++) {       

    formdata.append("files[]", document.getElementById('deposit_files2').files[i]);       

  }

  $.ajax({

    url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_deposit');?>",

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

        $('.getdataajaxdeposit2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje.error)+'</div>');

        

      } 

    }

  });    

});



$(document).on('change', '#upload_maison2', function(){ 

  var cid_m2 ='<?php echo $loan_details['loan_id'];?>';   

  var loan_id = '<?php echo $loan_details['loan_id'];?>'; 

  var file_maison2 = document.getElementById("upload_maison2").files[0].name; 

    

  var collateral_m2 =$("#collateral_details").val();  

  var form = $("#collateralformmaison2");    

    var formdata = new FormData(form[0]);

  formdata.append('collateraltype', collateral_m2); 

  formdata.append('customerid', cid_m2);

  formdata.append('loan_id', loan_id);

  for(var i = 0; i < file_maison2.length; i++) {        

    formdata.append("files[]", document.getElementById('upload_maison2').files[i]);       

  }

  $.ajax({

    url:"<?php echo base_url('PP_FETES_A_LA_CARTE/uploadfile_collateral_maison');?>",

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

        $('.getdataajaxmaison2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje2.error)+'</div>');

        

      }

      

      

    }

  });    

});



$(document).on('change', '#excemption_files2', function(){  

  var cid_e2 ='<?php echo $loan_details['loan_id'];?>';   

  var fileN2 = document.getElementById("excemption_files2").files[0].name;    

  var collateral_e2 =$("#collateral_details").val();  

  var loan_id = '<?php echo $loan_details['loan_id'];?>'; 

  var form = $("#collateralformexcemption2");    

    var formdata = new FormData(form[0]); 

  formdata.append('collateraltype', collateral_e2);

  formdata.append('loan_id', loan_id);

  for(var i = 0; i < fileN2.length; i++) {        

    formdata.append("files[]", document.getElementById('excemption_files2').files[i]);        

  }

  $.ajax({

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

        $('.getdataajaxexcemption2').html('<div class="alert alert-block alert-danger fade in"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4>Error! You got an error!</h4>'+$.trim(obje3.error)+'</div>');

        

      }

    }

  });    

});

</script>