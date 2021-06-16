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
              <li><a href="<?php echo base_url('Escompte');?>">ESCOMPTE</a></li>            
              <li class="active"><span>DÉTAILS DU CLIENT</span></li>
              <li><?php echo "Application Number: (".$loan_details['application_no'].")";?></li>
            </ol>
          </div>

          <div class="col-md-3">
            <div class="tab-content" style="text-align:right">
              <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
               <!--  <div class="btn-group" role="group">
                  <button type="button" id="stars" class="btn btn-default" href="#tab1" data-toggle="tab">
                  <div>LIST</div>
                  </button>
                </div> -->
               <!--  <div class="btn-group" role="group">
                  <button type="button" id="favorites" class="btn btn-primary" href="#tab2" data-toggle="tab">
                  <div>SPLIT</div>
                  </button>
                </div> -->
                <div class="btn-group" role="group" style="visibility: hidden;">
                  <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab">
                    <div>DETAILS</div>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
       

        <div class="main-box-body clearfix" >
          <div class="tab-content">
                   
             <div class="tab-pane fade in" id="tab3">
               <div class="col-md-12">
              <div class="main-box-body clearfix" style="padding:0px !important">
                <div class="panel panel-default panel-body loan-details-header">
                  <div class="bg-header">
                    <div class="well well-sm well-primary" style="background-color:transparent !important">
                      <div class="row well_row">
                        <div class="col-xs-2 bold no-padding">Nom du client:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['nom_du_client']; } else { echo ""; } ?></div>
                       
                        <div class="col-xs-2 bold no-padding">Montant du prêt:</div>
                        <div class="col-xs-2"><?php echo "CFA ".$risk_analysis['details']['limit_maximum_amount'] ?? '';?></div>
                         <div class="col-xs-2 bold no-padding">Groupe de RC:</div>
                        <div class="col-xs-2 no-padding">PRETAMOR</div>
                      </div>
                      <div class="row well_row">
                       
                        <div class="col-xs-2 bold no-padding">RC:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['rc']; } else { echo ""; } ?></div>
                        <div class="col-xs-2 bold no-padding">Nature / Code:</div>
                        <div class="col-xs-2 no-padding">Escompte</div>
                        <div class="col-xs-2 bold no-padding">Racine Client:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['racine_Client']; } else { echo ""; } ?></div>
                      </div>
                      <div class="row well_row">
                      
                        <div class="col-xs-2 bold no-padding">Date de Valeur/Date de Déblocage:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_de_valeur']; } else { echo ""; } ?></div>
                        <div class="col-xs-2 bold no-padding">Date échéance:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_dernière_échéance']; } else { echo ""; } ?></div>
                         <div class="col-xs-2 bold no-padding">Date accord CIC:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['date_accord_CIC']; } else { echo ""; } ?></div>
                      </div>
                      <div class="row well_row">
                        <div class="col-xs-2 bold no-padding">Durée du prêt:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['durée_du_prêt']; } else { echo ""; } ?></div>
                        <div class="col-xs-2 bold no-padding">Nombre d'échéances:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['nombre_déchéances']; } else { echo ""; } ?></div>
                        <div class="col-xs-2 bold no-padding">Type de Différé (P/T/-):</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['type_de_différé']; } else { echo ""; } ?></div>
                      </div>
                       <div class="row well_row">
                        <div class="col-xs-2 bold no-padding">Périodicité de remboursement:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['périodocoté_de_remboursement']; } else { echo ""; } ?></div>
                        <div class="col-xs-2 bold no-padding">Frais de dossier:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['frais_de_dossier']; } else { echo ""; } ?></div>
                        <div class="col-xs-2 bold no-padding">Compte courant:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['compte_courant']; } else { echo ""; } ?></div>
                      </div>

                       <div class="row well_row">
                        <div class="col-xs-2 bold no-padding">Taux:</div>
                        <div class="col-xs-2 no-padding"><?php if(!empty($agcdecisionform)) { echo $agcdecisionform['taux']; } else { echo ""; } ?></div>
                        
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
                        // $dateOfBirth = date('Y-m-d', strtotime($pinfo[0]['dob']));
                        // $today = date("Y-m-d");
                        // $diff = date_diff(date_create($dateOfBirth), date_create($today));
                         ?>
                        <div class="infographic-box" data-toggle="tooltip" title="Age of Customer"> <img src="<?php echo base_url('assets/img/age.png');?>" /> <span class="value">
                          <?php //echo $diff->format('%y') ?: '21';?></span> 
                          <!--<span class="headline">Users</span>--> 
                        </div>
                      </div>
                      <!-- End Age of Customer section -->
                      
                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Previous Loans"> <img src="<?php echo base_url('assets/img/loans.png');?>" /> <span class="value"></span>
                        </div>
                      </div>

                      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="text-align:center">
                        <div class="infographic-box" data-toggle="tooltip" title="Application Date"> <img src="<?php echo base_url('assets/img/timer.png');?>" /> <span class="value">
                          <?php //echo timeAgo($appformD[0]['created']) ?: '10 Days';?></span> 
                          <!--<span class="headline">Users</span>--> 
                        </div>
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
  			   <?php 
          $tab_count  =  1;
          foreach($product_tabs as $key=>$tab_value) {
                if($tab_value['tab_orginial_id'] != "10"){

            ?>
             <li <?php if($key == 0){?> class="active" <?php } ?>onclick="active_tab('tab-<?php echo $tab_value['tab_orginial_id'] ; ?>')">
              <a href="#tab-<?php echo $tab_value['tab_orginial_id'] ; ?>"><?php echo $tab_value['tab_customize_name']?></a>
             </li>
          <?php }
                else {
                  if($this->session->userdata('role') == "9" || $this->session->userdata('role') == "11" || $this->session->userdata('role') == "12"){
                    ?>
                     <li <?php if($key == 0){?> class="active" <?php } ?>onclick="active_tab('tab-<?php echo $tab_value['tab_orginial_id'] ; ?>')">
              <a href="#tab-<?php echo $tab_value['tab_orginial_id'] ; ?>"><?php echo $tab_value['tab_customize_name']?></a>
             </li>
                    <?php
                } }
           } ?>


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
                  <input type="number" class="form-control" id="frais_de_doss" name="frais_de_doss" autocomplete="off" value="<?php echo $loan_details['frais_de_dossier'];?>" required min="0"  <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
                      echo "readonly" ; }?> >
                    </div>
                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">

                  <label>Frais D'Assurance</label>
                    <div class="input-group">
                    <span class="input-group-addon">CFA</span>
                  <input type="number" class="form-control" id="frais_de_assurance" name="frais_de_assurance" autocomplete="off" value="<?php echo $loan_details['frais_de_assurance'];?>" required min="0" <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
                      echo "readonly" ; }?>>
                    </div>
                  </div>

                </div>

                </div>

                


                <div class="col-md-12">

                  <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">
                  <input type="hidden" name="application_id" id="application_id" value="<?php echo $loan_details['loan_id']?>">
                   <input type="hidden" name="product" id="product_type" value="escompte">


                  <button type="button" id="frais_btn" class="btn btn-primary pull-right"
                  <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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

                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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

                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                          
                     if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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

                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    if(in_array('11_2', $this->session->userdata('portal_permission')) && $loan_details['status']!="Disbursement"){ ?>
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
                       echo $customer->state_of_issue;
                        } else { ?> 
                   <input type="text" name="state_of_issue" value="<?php echo $customer->state_of_issue ?>" required> 
                    <?php }?>
                 </span></h3>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Fonction <span style="color:red">*</span></label>
                  <h3 id="tab-details"><span>
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
                       echo $customer->occupation;
                        } else { ?> 
                   <input type="text" name="occupation" value="<?php echo $customer->occupation ?>">
                 <?php }?>
                 </span></h3>
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label>Numéro de téléphone principal <span style="color:red">*</span></label>
                  <h3 id="tab-details"><span> 
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                      <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label>Date Expiration du type d’identification </label>
                  <h3 id="tab-details"><span> 
                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
                       echo date('d-m-Y', strtotime($customer->expiration_date_id));
                        } else { ?> 
                    <input type="text" class="expiration_date" name="expiration_date" value="<?php echo date('d-m-Y', strtotime($customer->expiration_date_id)) ?>"  required >

                      <?php } ?>
                  </span></h3>
                </div>
              </div>                  
              <div class="col-md-3">
              <div class="form-group">
                <label>Date Etablissement Type de Pièce <span style="color:red">*</span></label>
                <h3 id="tab-details"><span>

                  <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                   <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                   <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
                       echo $customer->mother_fullname;
                        } else { ?> 
                  <input type="text"  name="mother_fullname" required value="<?php echo $customer->mother_fullname ?>">
                <?php } ?>
                </span></h3>
              </div>
            </div>

            </div>
            <div class="row">
              <div class="col-md-3">
                 <div class="form-group">
                <label>Nationalité<span style="color:red">*</span></label>

                 <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
              <div class="col-md-3">
                <div class="form-group">
                <label>Lieu Etablissement Pièce<span style="color:red">*</span></label>
                <h3 id="tab-details"><span>
                <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                  <?php if(in_array('11_2', $this->session->userdata('portal_permission'))){
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
                  <?php if(in_array('11_2', $this->session->userdata('portal_permission'))){ if($loan_details['status']!="Disbursement"){ ?>
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
                    <?php if(in_array('11_2', $this->session->userdata('portal_permission'))  && $loan_details['status']!="Disbursement"){ ?>
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                   <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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

                  <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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

                  <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
          if(in_array('11_2', $this->session->userdata('portal_permission')) && $loan_details['status']!="Disbursement"){ ?>
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

                     <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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

                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
                    <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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


                <?php if (in_array('11_2', $this->session->userdata('portal_permission'))){
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

              <a href="<?php echo base_url('Business_Product/download_documents/escompte/system_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
          

                 <table class="table table-bordered table-hover" id="table_auto">
                                    <tr id="row_0">
                                      <td>  
                                      <?php if(!empty($documents['system_docs'])){
                                            $count = 1 ;
                                          foreach($documents['system_docs'] as $key=>$doc) {
                                        ?>                                    
                                        <div class="row">
                                          <div class="col-lg-12"> <span><a href="JavaScript:void(0);" onClick="javascript:window.open('<?php echo base_url($doc['document_url']);?>','Windows','width=650,height=650,toolbar=no,menubar=no,scrollbars=yes,resizable=yes,location=no,directories=no,status=no');return"> <?php echo $count++ ; ?> - <?php echo strtoupper($doc['document_name']);?></a></span>
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

              <a href="<?php echo base_url('Business_Product/download_documents/escompte/checklist_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>

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
                                              <span><a href="JavaScript:void(0);"><?php echo $count1 ;?>- <?php echo strtoupper($doc2['document_name'])?> </a></span> 
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="form-group">

                                                <label class="switch">
                                                  <input type="checkbox" class="checklist_radio" id="check_radio_<?php echo $count1;?>" value="1" 
                                                  <?php if($documents['checklist_status'][$key] == "1") echo "checked";?>  
                                                   <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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
          <h3 id="tab-title"><span>Risk Analysis</span></h3>

          <small class="analysismsg2"></small>
          <div class="row">
            <div class="col-lg-12">
              <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="analysisfilesloder2" style="display:none">

                <input id="risk_analysisfiles" type="file" multiple="" name="risk_analysisfiles[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">

              </label>           

                <button type="button" file_type = "risk_analysis_docs" class="btn btn-sm btn-default preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>

                <a href="<?php echo base_url('Business_Product/download_documents/escompte/risk_analysis_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>


               <table class="table table-bordered table-hover" id="table_auto">
                                    <tr id="row_0">
                                      <td><form action="#">
                                        <?php if(!empty($documents['analysis_docs'])) {
                                          $count2 = 1;
                                           foreach($documents['analysis_docs'] as $key=> $doc3){
                                        ?>
                                          <div class="row">
                                            <div class="col-lg-6"> <span><a href="JavaScript:void(0);"><?php echo $count2?>- <?php echo strtoupper($doc3['document_name'])?></a></span>
                                              
                                            </div>
                                            <div class="col-lg-6">
                                              <div class="form-group">

                                                 <label class="switch">
                                                  <input type="checkbox" class="risk_status" id="risk_status_<?php echo $count2;?>" value="1" 
                                                  <?php if($documents['risk_status'][$key] == "1") echo "checked";?>  <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){
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


          

          
    
           <h3 id="tab-title" style="margin-top: 2%;"><span>FORMULAIRE ESCOMPTE</span></h3>
             <form id="riskAnalyseForm" method="post">

                <div class="row">

                  <div class="col-md-12">
                     <div class="analyseflash-msg"></div>
                  </div>

                <div class="col-md-10">

                  <table class="table table-bordered">
                    <tr>
                      <td>Limite Maximale D'Utilisation Pour Le Client</td>
                      <td> <div class="form-group"> <input type="number" name="limit_maximum_amount" class="form-control" id="limit_maximum_amount" min="0" readonly=""  value="<?=$risk_analysis['details']['limit_maximum_amount']?>" onblur="check_limit_amount()" <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?>></div></td>
                    </tr>
                  </table>

               </div>


                <div class="col-md-10" style="margin-top: 3%">
                  <table class="table table-bordered">
                    <tr>
                      <th>No.</th>
                      <th>FACTURES (invoices)</th>
                      <th>MONTANT HT (before Tax)</th>
                      <th>BON DE COMMANDE (Purchase Order)</th>
                      <th></th>
                    </tr>

                    <?php
                   // print_r($risk_analysis['invoice_data']);
                     if(!empty($risk_analysis['invoice_data'])){
                       $counter = 1;
                      foreach($risk_analysis['invoice_data'] as $key=>$invoice_data){

                        if($counter > 3){
                          $addclass= "rowclass";
                        }
                        else {
                           $addclass= "";
                         }?>
                        
                        
                      <tr class="tr_<?php echo $counter;?> <?=$addclass?>">
                      <td><span><?=$counter;?></span></td>
                      <td><div class="form-group">
                        <input type="hidden" name="invoice_id[]" value="<?=$invoice_data['id']?>">
                        <input type="number" name="invoices[]" class="form-control invoice" min="0" value="<?=$invoice_data['invoices']?>" <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){  echo "disabled" ; }?>></div>
                      </td>
                      <td><div class="form-group"><input type="number" name="amount_before_tax[]" class="form-control" min="0" value="<?=$invoice_data['amount_before_tax']?>" <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?>></div>
                      </td>
                      <td><div class="form-group"><input type="text" name="purchase_order[]" class="form-control" value="<?=$invoice_data['purchase_order']?>" <?php if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?>></td>
                     <td>
                       
                       <?php if($counter == 3){
                        if (in_array('11_2', $this->session->userdata('portal_permission'))){
                                                     
                        ?>
                        <button type="button" class="addrow btn btn-primary"> + </button>
                      <?php }} else if($counter > 3){
                         if (in_array('11_2', $this->session->userdata('portal_permission'))){
                         ?>
                        <button type="button" class="btn btn-primary" onclick="deleterow('<?=$counter?>','<?=$invoice_data['id']?>');"> - </button>
                      <?php } } ?>
                     </td>
                    </tr>
                    <tr>
                     <?php $counter++;} 
                     } else {?> 
                    <tr>
                      <td><span>1</span></td>
                      <td>  <div class="form-group">
                        <input type="hidden" name="invoice_id[]" value="">
                        <input type="number" name="invoices[]" class="form-control invoice" min="0" 
                        <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></div></td>
                      <td><div class="form-group"><input type="number" name="amount_before_tax[]" class="form-control" min="0"  <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></div></td>
                      <td><div class="form-group"><input type="text" name="purchase_order[]" class="form-control"  <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></td>
                     <td></td>
                    </tr>
                    <tr>

                      <td><span>2</span></td>
                      <td><div class="form-group">
                        <input type="hidden" name="invoice_id[]" value="">
                        <input type="number" name="invoices[]" class="form-control invoice" min="0"  <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></div></td>
                      <td><div class="form-group"><input type="number" name="amount_before_tax[]" class="form-control" min="0"  <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></div></td>
                      <td><div class="form-group"><input type="text" name="purchase_order[]" class="form-control"  <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></div></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td><span>3</span></td>
                      <td><div class="form-group">
                        <input type="hidden" name="invoice_id[]" value="">
                        <input type="number" name="invoices[]" class="form-control invoice" min="0"  <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></div></td>
                      <td><div class="form-group"><input type="number" name="amount_before_tax[]" class="form-control" min="0"  <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></div></td>
                      <td><div class="form-group"><input type="text" name="purchase_order[]" class="form-control"  <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></div></td>
                      <td>
                         <?php  if (in_array('11_2', $this->session->userdata('portal_permission'))){ ?> 
                        <button type="button" class="addrow btn btn-primary"> + </button>
                         <?php }?>
                      </td>
                    </tr>

                     <?php }?>
                     <tr class="last_row">
                      <td>Total</td>
                      <td><input type="number" name="calculated_amount" class="form-control calculated_amount" min="0" readonly></td>
                      <td colspan="2"></td>
                      
                    </tr>
                  </table>
                </div>


                

                <div class="col-md-10" style="margin-top: 3%">
                  <table class="table table-bordered">
                    <tr>
                      <td>Montant de la traite / Facture / Décompte</td>
                      <td><div class="form-group"><input type="number" name="total_amount" class="form-control total_amount" min="0"  <?php if(!empty($risk_analysis['invoice_data'])){ ?> value="" <?php } else{ ?> value="<?=$risk_analysis['details']['total_amount']?>"  <?php }?>  <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?>></div></td>
                      <td><input type="number" name="limit_amount" class="form-control limit_amount" min="0" readonly value="<?=$risk_analysis['details']['limit_maximum_amount']?>"  ></td>
                    </tr>
                    <tr>
                      <td>Duree</td>
                      <td></td>
                      <td><div class="form-group"><input type="number" name="duration" class="form-control" min="0" max="120" value="<?=$risk_analysis['details']['duration']?>" <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?>></div></td>
                    </tr>
                    <tr>
                      <td>Taux</td>
                      <td></td>
                      <td><div class="form-group"><input type="number" name="rate" class="form-control" min="0" value="<?=$risk_analysis['details']['tax_rate']?>" <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?>></div></td>
                    </tr>
                    <tr>
                      <td>Frais (0,5%, mim 50 000)</td>
                      <td>(minimum fee is 50 000 or 0.5% which one is greater)</td>
                      <td><div class="form-group"><input type="text" name="fee_amount" class="form-control fee_amount" readonly value="<?=$risk_analysis['details']['fee_amount']?>" <?php  if (!in_array('11_2', $this->session->userdata('portal_permission'))){ echo "disabled"; }?> ></div></td>
                    </tr>
                     <tr>
                      <td>TVA / Frais (Frais *19,25%)</td>
                      <td>Tax on Fees</td>
                      <td><div class="form-group"><input type="text" name="tax_on_fees" class="form-control tax_on_fees" readonly value="<?=$risk_analysis['details']['tax_on_fees']?>"></div></td>
                    </tr>
                     <tr>
                      <td>Frais TTC à payer</td>
                      <td>Fee + TVA</td>
                      <td><div class="form-group"><input type="text" name="fee_vat" class="form-control fee_vat" readonly value="<?=$risk_analysis['details']['fee_vat']?>"></div></td>
                    </tr>

                  </table>
                </div>


                <div class="col-md-12">

                  <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

                  <?php if (in_array('11_2', $this->session->userdata('portal_permission'))){ ?>
                  <button type="submit"  class="btn btn-primary pull-right">SAVE DETAILS</button>
                <?php }?>

                  <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right feeloder" style="position:relative;top: 9px;left:-13px; display: none;">

                  </div>

                </div>

                </div>

              </form>

          
            </div>

          </div>
      </div>
      <!-- End Tab-5 section -->


     <!-- start Tab-10 section -->

      <!-- start Tab-10 section if role is Agent CAD -->

      <?php 
      if($this->session->userdata('role') == "11" ) {
      ?>
      <div class="tab-pane fade" id="tab-10">
        <?php if(in_array('11_6', $this->session->userdata('portal_permission'))) {
        ?>
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

      <?php } ?>
      </div>



      <!-- end Tab-10 section if role is Head CAD -->
    <?php } else if($this->session->userdata('role') ==  "9") {
     
      ?>

      <!-- start Tab-10 section if role is Head CAD -->
      
      <div class="tab-pane fade" id="tab-10">
        <?php  if(in_array('11_6', $this->session->userdata('portal_permission'))) {?>
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
      <?php } ?>
      </div>



      <!-- end Tab-10 section if role is Head CAD -->
    <?php  } else if($this->session->userdata('role') == "12"){?>

    <!-- start Tab-10 section if role is Operation department -->
      <div class="tab-pane fade" id="tab-10">
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

            <div style="text-align:center">----</div>

          </div>

          

          <div class="tab-pane fade" id="tab-7">

            <h3 id="tab-title"><span>INFORMATIONS SUR LE PRET</span></h3>

              <form id="loanEditForm" action="#"  method="post">

                <div class="row">

                <div class="col-md-3">

                  <div class="form-group">

                  <label>NATURE DU PRET</label>

                  <input type="text" class="form-control" value="<?php //echo $appformD[0]['ltype'];?>" readonly disabled>

                  <input type="hidden" id="loan_type" name="loan_type" value="<?php //echo $appformD[0]['loan_type'];?>" readonly >

                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">

                  <label>MONTANT DU PRET</label>

                  <div class="input-group"> <span class="input-group-addon">CFA</span>

                    <input type="number" class="form-control" id="loan_amt_d" name="loan_amt" autocomplete="off" value="<?php //echo $appformD[0]['loan_amt'];?>" min="0" required>

                  </div>

                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">

                  <label>TAUX INTERET</label>

                  <div class="input-group">

                    <input type="number" class="form-control" id="loan_interest" name="loan_interest" autocomplete="off" value="<?php //echo $appformD[0]['loan_interest'];?>" required min="2">

                    <span class="input-group-addon">%</span> </div>

                  </div>

                </div>

                <div class="col-md-3">

                  <div class="form-group">

                  <label>DUREE</label>

                  <input type="number" class="form-control" id="loan_term" name="loan_term" autocomplete="off" value="<?php //echo $appformD[0]['loan_term'];?>" required min="0" >

                  </div>

                </div>

                </div>

                <div class="row">

                <div class="col-md-3">

                  <div class="form-group">

                  <label>PERIODICITE DE REMBOURSEMENT</label>

             
                  </div>
                </div>
                 <div class="col-md-3">
                  <div class="form-group">
                    <label>TAUX FOND DE GARANTIE</label>
                    <input type="number" class="form-control" id="loan_guarantee" name="loan_guarantee" autocomplete="off" value="<?php //echo $appformD[0]['loan_guarantee'];?>" required min="0" >
                  </div>
                </div>

                <div class="col-md-3" style="display: none;">

                  <div class="form-group">

                  <label>Fees</label>

                  <input type="text" class="form-control" id="loan_fee2" name="loan_fee" autocomplete="off" value="<?php //echo $appformD[0]['loan_fee'];?>" required readonly>

                  </div>

                </div>

                <div class="col-md-3" style="display: none;">

                  <div class="form-group">

                  <label>Taxes</label>

                  <select class="form-control" name="loan_tax" id="loan_tax2" required>

                   

                  </select>

                  </div>

                </div>

                <div class="col-md-3" style="display: none;">

                  <div class="form-group">

                  <label>Commission</label>

                  <input type="text" class="form-control" id="loan_commission2" name="loan_commission" autocomplete="off" value="<?php //echo $appformD[0]['loan_commission'];?>" readonly>

                  </div>

                </div>

                <div class="col-md-12">

                  <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

                  <input type="hidden"  id="editid" name="editid"  value="<?php //echo $appformD[0]['cl_aid'];?>" readonly>

                  <input type="hidden"  id="ecustomar_id" name="ecustomar_id"  value="<?php //echo $appformD[0]['customar_id'];?>" readonly>

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

          <?php if($this->session->userdata('role') != "11" && $this->session->userdata('role') != "9" && in_array('11_6', $this->session->userdata('portal_permission')) ) {?>
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
                        <?php if($loan_details['review']=='0'){ ?>
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
    var fee_url  =  "<?php echo base_url('Business_Product/manage_loan_fees');?>";
    var document_status__url = "<?php echo base_url('Business_Product/change_document_status/escompte/').$loan_details['loan_id']?>";
    var system_upload_url  =  "<?php echo base_url('Business_Product/upload_systemfiles/escompte/').$loan_details['loan_id'];?>";
    var checklist_upload_url = "<?php echo base_url('Business_Product/upload_checklistfiles/escompte/').$loan_details['loan_id'];?>";
    var risk_upload_url =  "<?php echo base_url('Business_Product/uploadfile_risk_analysis/escompte/').$loan_details['loan_id'];?>";
    var preview_url ="<?php echo base_url('Business_Product/view_uploaded_documents/escompte/').$loan_details['loan_id']?>";
    var decision_url = '<?php echo base_url("Business_Product/comment_manager/escompte/").$loan_details['loan_id'];?>';

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



  $(document).ready(function() {
    //this calculates values automatically 
    calculateSum();

    $(".invoice").on("keydown keyup", function() {
        calculateSum();
    });
  });



  function calculateSum(){
    var sum = 0;
    //iterate through each textboxes and add the values
    $(".invoice").each(function() {
        //add only if the value is number
        if (!isNaN(this.value) && this.value.length != 0) {
            sum += parseFloat(this.value);
           // $(this).css("background-color", "#dddddd5c");
        }
        else if (this.value.length != 0){
            $(this).css("background-color", "red");
        }
    });
 
  $(".calculated_amount").val(sum.toFixed(2));

  if(sum){
    $(".total_amount").val('');
    $(".total_amount").attr('readonly','readonly');
    $("#limit_maximum_amount").removeAttr('readonly');

    var min_fee1 = (sum * 0.5)/100;
    var min_fee2 = 50000;

    if(min_fee1 > min_fee2){
      $(".fee_amount").val(min_fee1.toFixed(2));
      $(".tax_on_fees").val((min_fee1 * 0.1925).toFixed(2));
      $(".fee_vat").val((Number(min_fee1) + Number(min_fee1 * 0.1925)).toFixed(2));
    }
    else{
      $(".fee_amount").val(min_fee2);
      $(".tax_on_fees").val((min_fee2 * 0.1925).toFixed(2));
      $(".fee_vat").val((Number(min_fee2) + Number(min_fee2 * 0.1925)).toFixed(2));
    }
  }
  else if($(".total_amount").val()){
     $("#limit_maximum_amount").removeAttr('readonly');

     $(".invoice").each(function() {

          $(this).val('');
          $(this).attr('readonly','readonly');
     });
  }
  else {
    $(".total_amount").attr('readonly',false); 
    $("#limit_maximum_amount").attr('readonly','readonly');
    $(".invoice").each(function() {

          $(this).val('');
          $(this).removeAttr('readonly');
       });
  }
}
 

 $(".total_amount").on("keydown keyup",function(){

    var amt =  $(this).val();

    if(amt){
      var min_fee1 = (amt * 0.005)/100;
      var min_fee2 = 50000;

      if(min_fee1 > min_fee2){
        $(".fee_amount").val(min_fee1.toFixed(2));
        $(".tax_on_fees").val((min_fee1 * 0.1925).toFixed(2));
        $(".fee_vat").val((Number(min_fee1) + Number(min_fee1 * 0.1925)).toFixed(2));
      }
      else{
        $(".fee_amount").val(min_fee2.toFixed(2));
        $(".tax_on_fees").val((min_fee2 * 0.1925).toFixed(2));
        $(".fee_vat").val((Number(min_fee2) + Number(min_fee2 * 0.1925)).toFixed(2));
      }

       $("#limit_maximum_amount").removeAttr('readonly');
       $(".invoice").each(function() {

          $(this).val('');
          $(this).attr('readonly','readonly');
       });
    }
    else{
      $("#limit_maximum_amount").attr('readonly','readonly');
       $(".invoice").each(function() {

          $(this).val('');
          $(this).removeAttr('readonly');
       });
    }
   
 });

<?php if(empty($risk_analysis['invoice_data'])){?>
 var row_count = 3; 
 <?php } else {?>
 var row_count = <?php echo count($risk_analysis['invoice_data']);?>;
 <?php }?>  
  $(".addrow").click(function(){
    row_count++;
    $('<tr class="tr_'+row_count+' rowclass"><td><span>'+row_count+'</span></td><td><div class="form-group"><input type="hidden" name="invoice_id[]" value=""><input type="number" name="invoices[]" class="form-control invoice" min="0" onkeyup="sum_invoice();" onkeydown="sum_invoice();"></div></td><td><div class="form-group"><input type="number" name="amount_before_tax[]" class="form-control" min="0"></div></td><td><div class="form-group"><input type="text" name="purchase_order[]" class="form-control"></div></td><td><button type="button" class="btn btn-primary" onclick="removerow('+row_count+');"> - </button></td></tr>').insertBefore('.last_row');

    var i =  4;
    $(".rowclass").each(function(){
        $(this).first('td').find('span').text(i);

        //console.log(i);
        i++;
    });
  });

 

function removerow(element_row){
   $(".tr_"+element_row).remove();

   var i = 4;
   $(".rowclass").each(function(){
      $(this).first('td').find('span').text(i);

    //  console.log(i);
      i++;
   });

   calculateSum();
}


function deleterow(row_id,element_id){
  if (confirm("Are you sure you want to delete this row ?")) {
    
    $.ajax({
      type:"POST",
      url:"<?php echo base_url('Escompte/delete_invoice_data')?>",
      data:{id : element_id },
      success:function(response){

        if($.trim(response) == "success"){
          alert("Deleted Successfully");
          $(".tr_"+row_id).remove();
          calculateSum();
        }
        else{
          alert("Error in deleting row");
        }
      }

    })
  } else {
    alert("Cancelled !!");
    
  }

}

  function sum_invoice(){
    calculateSum();
  }


  function check_limit_amount(){
      var calculated_amount =  $(".calculated_amount").val();

      if(calculated_amount > 0.00){

        var min_amount  =  calculated_amount * 0.8;

      }
      else if($(".total_amount").val() > 0 || $(".total_amount").val() > 0.00)
      {
         var min_amount  =  $(".total_amount").val() * 0.8;
      }

      if($("#limit_maximum_amount").val()){
          if($("#limit_maximum_amount").val() > min_amount)
          {
            alert("Amount should be less than or equal to 80% of total amount");
            $("#limit_maximum_amount").val('');
          }
          else
          {
            $(".limit_amount").val($("#limit_maximum_amount").val());
          }
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

  // Risk Analyse form in escompte

    $("#riskAnalyseForm").validate({
      errorClass: 'has-error',
      rules: {
        limit_maximum_amount:{
          required : true,
          number: true
        },
        duration:{
          required : true,
          number : true,
          rangelength : [1,120]
        },
        rate:{
          required : true,
          number : true
        }
        

      },
      messages: {
         limit_maximum_amount:{
          required : "Please enter amount"},
        duration:{
          required : "Please enter duration"
        },
        rate:{
          required : "Please enter tax"
        }
              
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

        
        check_limit_amount();

        $.ajax({
          url: '<?php echo base_url("Escompte/manage_risk_analysis/").$loan_details['loan_id'];?>',
          type: 'POST',
          data: $(form).serialize(),
          beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#riskAnalyseForm').css("opacity","0.5");
            $(".sr-only").show();
          },
          success: function(response) {
            
            console.log(response);

            $('.analyseflash-msg').html('').removeClass('alert alert-success fade in');
            $('#riskAnalyseForm').css("opacity","1");  
            if(response=="success"){                                    
              $('.analyseflash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Record Saved Successfully And Workflow Initiated').addClass('alert alert-success fade in').fadeOut(5000);  
                setTimeout(function(){                      
                  location.reload();
                 }, 1500); 
            $('.submitBtn').attr("disabled","");

            }
            else if(response == "no_workflow_matched"){
              $('.analyseflash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Record Saved Successfully But No Workflow Matched ').addClass('alert alert-warning fade in').fadeOut(5000);  
                setTimeout(function(){                      
                  location.reload();
                 }, 1500); 
            $('.submitBtn').attr("disabled","");
            }
            else if(response == "success_new"){
              $('.analyseflash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Record Saved Successfully And Workflow Reinitiated ').addClass('alert alert-success fade in').fadeOut(5000);  
                setTimeout(function(){                      
                  location.reload();
                 }, 1500); 
            $('.submitBtn').attr("disabled","");
            }
            else if(response == "no_workflow_change"){
              $('.analyseflash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Record Saved Successfully').addClass('alert alert-success fade in').fadeOut(5000);  
                setTimeout(function(){                      
                  location.reload();
                 }, 1500); 
            $('.submitBtn').attr("disabled","");
            }
            else{
            $('.analyseflash-msg').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error in saving record').addClass('alert alert-danger fade in');
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
          url: '<?php echo base_url("Business_Product/manage_cad_memorandum/escompte/").$loan_details['loan_id'];?>',
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
          url:'<?php echo base_url("Business_Product/manage_history_interaction/escompte/email/").$loan_details['loan_id'];?>',
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
          url:'<?php echo base_url("Business_Product/manage_history_interaction/escompte/sms/").$loan_details['loan_id'];?>',
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
          url:'<?php echo base_url("Business_Product/manage_history_interaction/escompte/interview_telephone/").$loan_details['loan_id'];?>',
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
          url:'<?php echo base_url("Business_Product/manage_business_loan_data/escompte/").$loan_details['loan_id'];?>',
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

    </script> 
