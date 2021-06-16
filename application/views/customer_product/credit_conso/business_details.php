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
            <li><a href="<?php echo base_url('Credit_Conso');?>">CREDIT_CONSO</a></li>            
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
                                    <div class="col-xs-2 no-padding"><?php 
                                    // print_r($loan_details);
                                     echo ucfirst($customer->company_name) ?></div>
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
                                    <div class="col-xs-2 no-padding">CREDIT CONSO </div>
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
                      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" style="text-align:center">
                                    <loan-back> <a href="<?php echo base_url('PP_Consumer_Loans/amortization_loan/').$loan_details['loan_id_temp'].'/1/view';?>" class="btn btn-default loan-back"  style="width:100%;margin-top:25px;">AMORTISSMENT</a> </loan-back>
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
                <input type="number" class="form-control" id="frais_de_doss" name="frais_de_doss" autocomplete="off" value="<?php echo $loan_details['frais_de_dossier'];?>" required min="0" <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?> >
                  </div>
                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <label>Frais D'Assurance</label>
                  <div class="input-group">
                  <span class="input-group-addon">CFA</span>
                <input type="number" class="form-control" id="frais_de_assurance" name="frais_de_assurance" autocomplete="off" value="<?php echo $loan_details['frais_de_assurance'];?>" required min="0" <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?>>
                  </div>
                </div>

              </div>

              </div>

              


              <div class="col-md-12">

                <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">
                <input type="hidden" name="application_id" id="application_id" value="<?php echo $loan_details['loan_id']?>">
                 <input type="hidden" name="product" id="product_type" value="credit_conso">

                 <?php if (in_array('8_2', $this->session->userdata('portal_permission'))){ ?>
                <button type="button" id="frais_btn" class="btn btn-primary pull-right">SAVE DETAILS</button>

              <?php } ?>

                <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right feeloder" style="position:relative;top: 9px;left:-13px; display: none;">

                </div>

              </div>

              

            </form>

             </div>

          <!-- end Tab-2  -->
    


            <div class="tab-pane fade" id="tab-1">
 <form  method="post" id="addbusinesscustomer"> 
        <div class="row">
          
          <div class="col-md-12 response-msg"></div>
        </div>

          <h3 id="tab-title"><span>Renseignements Personnels</span></h3>
         	<div class="row">
				
		         <div class="col-md-4">
		            <div class="form-group">
		              <label>Numéro du compte <span style="color:red">*</span></label>

                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->account_no.'</span></h3>' ;?>

                     <?php } else {?>
						<input type="text" class="form-control addvalidate" id="account_no" name="account_no" autocomplete="off"  placeholder="Enter Account No." value="<?php echo $customer->account_no;?>" onkeypress="return isNumber();"/>

                  <?php } ?>
		            </div>
		          </div>								  
		          <div class="col-md-4">
		            <div class="form-group">
		              <label>Agence <span style="color:red">*</span></label>
                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer_branch['branch_name'] ?? '';
                       echo '</span></h3>';
                       ?>

                     <?php } else {?>
						<input type="text" class="form-control addvalidate" id="branch" name="branch_name" value="<?php  echo $customer_branch['branch_name'] ?? ''; ?>" autocomplete="off" placeholder="Enter Branch" readonly="" />
						<input type="hidden" name="branch" value="<?php echo $customer_branch['bid'] ?? ''; ?>">
                    <?php } ?>
					  </div>
		          </div>
		          <div class="col-md-4">
		            <div class="form-group">
		              <label>Raison Sociale <span style="color:red">*</span></label>

                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->company_name.'</span></h3>' ;?>

                     <?php } else {?>
						<input type="text" class="form-control addvalidate" id="company_name" name="company_name" autocomplete="off"  placeholder="Enter Company Name" value="<?php echo $customer->company_name ?? '';?>" />	

                    <?php } ?>						
		            </div>
		          </div>
		              	
			</div>


          	<div class="row">
	              <div class="col-md-4">
	                <div class="form-group">
	                  <label>Forme juridique <span style="color:red">*</span></label>

                    <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                          echo '<h3 id="tab-details"><span>';
                          if($customer->type_of_legal == '1')
                          {
                            echo "Sarl";
                          }
                          else if($customer->type_of_legal == '2')
                          {
                            echo "Unipersonelle";
                          }
                          else if($customer->type_of_legal == '3')
                          {
                            echo 'SA';
                          }
                          else if($customer->type_of_legal == '4')
                          {
                            echo 'SAS';
                          }
                          else if($customer->type_of_legal == '5')
                          {
                            echo 'SCI';
                          }
                          else if($customer->type_of_legal == '6')
                          {
                            echo 'Commune';
                          }
                          echo '</span></h3>';
                        } else {?>


	                  	<select  class="form-control addvalidate" id="type_of_legal" name="type_of_legal">
	                  	  <option value="" >Select</option>
	                      <option value="1" <?php if($customer->type_of_legal == '1') echo 'selected';?> >Sarl</option>
	                      <option value="2" <?php if($customer->type_of_legal == '2') echo 'selected';?> >Unipersonelle</option>
	                      <option value="3" <?php if($customer->type_of_legal == '3') echo 'selected';?> >SA</option>
	                      <option value="4" <?php if($customer->type_of_legal == '4') echo 'selected';?> >SAS</option>
	                      <option value="5" <?php if($customer->type_of_legal == '5') echo 'selected';?> >SCI</option>
	                      <option value="6" <?php if($customer->type_of_legal == '6') echo 'selected';?> >Commune</option>
	                    </select>

                    <?php } ?>
	                </div>
	              </div>
	           
					<div class="col-md-4">
	                    <div class="form-group">
	                      <label>Adresse <span style="color:red">*</span></label>	
                        <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->address.'</span></h3>' ;?>

                     <?php } else {?>
	                      <textarea class="form-control addvalidate" id="address" name="address" placeholder="Enter Address"><?php echo $customer->address;?></textarea>

                      <?php } ?>
	                    </div>
	                </div>
	             							  
	              <div class="col-md-4">
	                <div class="form-group">
	                  <label>Principal gérant <span style="color:red">*</span></label>
                    <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->principal.'</span></h3>' ;?>

                     <?php } else {?>
						<input type="number"  class="form-control addvalidate" id="principal" name="principal" placeholder="Enter Principal"  min="0" value="<?php echo $customer->principal;?>"/>

                      <?php } ?>
	                </div>
	              </div>

		    </div>

        
           <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Capital</label>
                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->capital.'</span></h3>' ;?>

                     <?php } else {?>
                  <input type="number"  class="form-control addvalidate" id="capital" name="capital" placeholder="Enter Capital" min="0" value="<?php echo $customer->capital;?>"/>	

                    <?php } ?>					
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Numéro d’immatriculation RCCM <span style="color:red">*</span></label>
                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->employer_tax_id.'</span></h3>' ;?>

                     <?php } else {?>
                  <input type="text"  class="form-control addvalidate" id="employer_tax_id" name="employer_tax_id" placeholder="Enter Employer Tax Id"  value="<?php echo $customer->employer_tax_id;?>" onkeypress="return isNumber();"/>

                    <?php } ?>
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label>Secteur d’Activité <span style="color:red">*</span></label>

                   <?php if (!in_array('8_2', $this->session->userdata('portal_permission')))
                      {
                        echo '<h3 id="tab-details"><span>';
                        foreach($secteurs as $op){
                          if($op['tlc_id'] ==  $customer->sector_id)
                          {
                            echo $op['secteurs'];
                            break;
                          }
                        }
                        echo '</span></h3>';
                      }
                      else {?>
                  <select name="sector_of_activity" id="sector_of_activity" class="form-control addvalidate">
                  	<option value="">Select</option>
                  	<?php foreach($secteurs as $op){?>
                  		<option value="<?php echo $op['tlc_id']?>"  <?php if($op['tlc_id'] ==  $customer->sector_id) echo 'selected';?>><?php echo $op['secteurs']?></option>
                  	<?php }?>
                  </select>
                <?php }?>
                </div>
              </div>
		    </div>
         <h3 id="tab-title"><span>Informations Sur Les Agents</span></h3>
          <div class="row">
							<div class="col-md-12">
		                    <div class="form-group">
		                      <label style="margin-top: 1%">Nom des mandataires</label>
		                      <table class="table table-hover no-footer" role="grid" >
		                      	<th>Officer Full Name</th>
		                      	<th>Position</th>
		                      	<th>Address</th>
		                      	<th>Age</th>
		                      	<th>Ancienneté</th>

		                      	<?php 
		                      	if(!empty($officer)){
		                      	foreach($officer as $key=>$of_row){?>
		                      	<tr>

		                      		<td>
                                <?php if (!in_array('8_2', $this->session->userdata('portal_permission')))
                                  {
                                    echo '<h3 id="tab-details"><span>'.$of_row->full_name.'</span></h3>';

                                  } else { ?>
                                <input type="hidden" name="edit_officer_id[]" value="<?php echo $of_row->officer_id?>" class="officer_c"><input type="text" name="full_name[<?php echo $key ; ?>]" id="Officer1_full_name" class="form-control addvalidate fullname_c" placeholder="Enter Full Name" value = "<?php echo $of_row->full_name; ?>" required="true">
                                <?php } ?>

                              </td>
		                      		<td>
                                 <?php if (!in_array('8_2', $this->session->userdata('portal_permission')))
                                  {
                                    echo '<h3 id="tab-details"><span>'.$of_row->position.'</span></h3>';

                                  } else { ?>
                                <input type="text" name="position[<?php echo $key ; ?>]" id="Officer1_position" class="form-control addvalidate position_c" placeholder="Enter Position" required="true" value = "<?php echo $of_row->position; ?>" >
                              <?php } ?>
                              </td>
		                      		<td>
                                 <?php if (!in_array('8_2', $this->session->userdata('portal_permission')))
                                  {
                                    echo '<h3 id="tab-details"><span>'.$of_row->address.'</span></h3>';

                                  } else { ?>
                                <textarea name="officer_address[]" id="officer1_address" class="form-control addvalidate address_c" placeholder="Enter Address"><?php echo $of_row->address; ?></textarea>
                              <?php } ?>
                              </td>
		                      		<td>
                                 <?php if (!in_array('8_2', $this->session->userdata('portal_permission')))
                                  {
                                    echo '<h3 id="tab-details"><span>'.$of_row->age.'</span></h3>';

                                  } else { ?>
                                <input type="number" name="age[<?php echo $key ; ?>]" id="Officer1_age" class="form-control addvalidate age_c" placeholder="Enter Age" value = "<?php echo $of_row->age; ?>" min="18" max="99">
                              <?php } ?>
                              </td>
		                      		<td>
                                 <?php if (!in_array('8_2', $this->session->userdata('portal_permission')))
                                  {
                                    echo '<h3 id="tab-details"><span>'.$of_row->anciennete.'</span></h3>';

                                  } else { ?>
                                <input type="number" name="anciennete[<?php echo $key ; ?>]" id="Officer1_anciennete" class="form-control addvalidate anciennete_c" placeholder="Enter Ancienneté" value = "<?php echo $of_row->anciennete; ?>" min="0" max="99">
                              <?php } ?>
                              </td>

		                      	</tr>

		                      	<?php }
		                      		}
		                      	 ?>

		                      </table>
		                    </div>
		                  </div>

		              </div>
             <h3 id="tab-title"><span>Informations Additionnelles</span></h3>
          <div class="row">

              <div class="col-md-4">
                <div class="form-group">
                  <label>Date ouverture compte <span style="color:red">*</span></label>
                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){

                        if($customer->account_open_date )echo '<h3 id="tab-details"><span>'.date("d-m-Y", strtotime($customer->account_open_date)).'</span></h3>'  ;
                      } else { ?>
                  <input type="text"  class="form-control addvalidate" id="account_open_date" name="account_open_date" autocomplete="off" value="<?php if($customer->account_open_date )echo date("d-m-Y", strtotime($customer->account_open_date))  ; ?>" placeholder="dd-mm-yyyy"/>
                  <?php } ?>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Montant des engagements </label>

                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission')))
                  {
                    if($customer->creditline_amount  == "1")
                      echo '<h3 id="tab-details"><span>Découvert</span></h3>';
                    else if($customer->creditline_amount  == "2")
                      echo '<h3 id="tab-details"><span>Caution</span></h3>';
                    else if($customer->creditline_amount  == "3")
                      echo '<h3 id="tab-details"><span>CCT</span></h3>';
                    else if($customer->creditline_amount  == "4")
                      echo '<h3 id="tab-details"><span>CMT</span></h3>';
                    else if($customer->creditline_amount  == "5")
                      echo '<h3 id="tab-details"><span>Escompte</span></h3>';
                  } else { ?>
                  <select name="creditline_amount" id="creditline_amount" class="form-control addvalidate" >
                  	<option value="">Select</option>
                  	<option value="1" <?php if($customer->creditline_amount  == "1") echo 'selected';?>  >Découvert</option>
                  	<option value="2" <?php if($customer->creditline_amount  == "2") echo 'selected';?> >Caution</option>
                  	<option value="3" <?php if($customer->creditline_amount  == "3") echo 'selected';?>  >CCT</option>
                  	<option value="4" <?php if($customer->creditline_amount  == "4") echo 'selected';?> >CMT</option>
                  	<option value="5" <?php if($customer->creditline_amount  == "5") echo 'selected';?> >Escompte</option>
					         </select>
                  <?php } ?>
                 
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group">
                  <label>Solde du Compte Courant <span style="color:red">*</span></label>
                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->balance_amount.'</span></h3>' ;?>

                     <?php } else {?>
                  <input type="number"  class="form-control addvalidate" id="balance_amount" name="balance_amount" placeholder="Enter Balance" value="<?php echo $customer->balance_amount ; ?>" min="0"/>
                <?php } ?>
                </div>
              </div>

		    </div> 

		    <div class="row">

              <div class="col-md-4">
                <div class="form-group">
                  <label>Solde <span style="color:red">*</span></label>

                   <?php if (!in_array('8_2', $this->session->userdata('portal_permission')))
                  {
                    if($customer->amount_type  == "1")
                      echo '<h3 id="tab-details"><span>DAT</span></h3>';
                    else if($customer->amount_type  == "2")
                      echo '<h3 id="tab-details"><span>BDC</span></h3>';
                    else if($customer->amount_type  == "3")
                      echo '<h3 id="tab-details"><span>Cash Call</span></h3>';
                    
                  } else { ?>
                   <select name="amount_type" id="amount_type" class="form-control addvalidate" >
                  	<option value="">Select</option>
                  	<option value="1" <?php if($customer->amount_type  == "1") echo 'selected';?> >DAT</option>
                  	<option value="2" <?php if($customer->amount_type  == "2") echo 'selected';?> >BDC</option>
                  	<option value="3" <?php if($customer->amount_type  == "3") echo 'selected';?> >Cash Call</option>
                  </select>

                <?php } ?>
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group">
                  <label>Montant des impayés <span style="color:red">*</span></label>
                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->unpaid_amount.'</span></h3>' ;?>

                     <?php } else {?>
                  <input type="number"  class="form-control addvalidate" id="unpaid_amount" name="unpaid_amount" placeholder="Enter Unpaid Amount" required value="<?php echo $customer->unpaid_amount; ?>" min="0"/>
                <?php } ?>
                </div>
              </div>

               <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre des impayés <span style="color:red">*</span></label>
                  <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->employer_tax_id.'</span></h3>' ;?>

                     <?php } else {?>
                  <input type="number"  class="form-control addvalidate" id="number_of_unpaid" name="number_of_unpaid" placeholder="Enter Number Of Unpaid" required value="<?php echo $customer->number_of_unpaid; ?>" min="0"/>
                <?php } ?>
                </div>
              </div>

		   	</div>
        
          	<div class="row">
              
          		<div class="col-md-12">
                <?php if(in_array('8_2', $this->session->userdata('portal_permission'))) {?>
				  	<button type="submit" class="btn btn-primary waves-effect waves-light submitBtn">
				  	<img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top:2px;left:-3px; display:none;"> Save Details</button>
              <?php }?>
				  </div>
         
			</div>       
           <!--  </form>     -->                   
      
  </form>
</div>

  

        <!--Tab-3 Details-->

      <div class="tab-pane fade" id="tab-3">
        <h3 id="tab-title"><span>DOCUMENTS SYSTEMES</span></h3>
        <small class="outputmsg"></small>
        <div class="row">
          <div class="col-lg-12">
          <label class="btn-bs-file btn-sm btn-primary" style="border-radius:25px;height:32px;"> <i class="fa fa-upload"></i> Upload <img src="<?php echo base_url("assets/img/loading.gif");?>" class="uploaded_image_details" style="display:none">
            <input id="systemdocsfiles" type="file" multiple="" name="systemdocsfiles[]" accept="application/msword,application/pdf, application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,image/*">
          </label>
          
       
           <button type="button" file_type = "system_docs" class="btn btn-sm btn-default preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>
            <a href="<?php echo base_url('Customer_Product/download_documents/gage_espece/system_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
      

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
            <a href="<?php echo base_url('Customer_Product/download_documents/credit_conso/checklist_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
         
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
                                            <span><a href="JavaScript:void(0);"><?php echo $count1;?>- <?php echo strtoupper($doc2['document_name'])?> </a></span> 
                                          </div>
                                          <div class="col-lg-6">
                                            <div class="form-group">
                                             <label class="switch">
                                                  <input type="checkbox" class="checklist_radio" id="check_radio_<?php echo $count1;?>" value="1" 
                                                  <?php if($documents['checklist_status'][$key] == "1") echo "checked";?> <?php if (!in_array('8_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?> >
                                                  <span class="slider round "></span>
                                                </label>
                                                 <img src="<?php echo base_url("assets/img/loading.gif");?>" class="checklist_loading_status" style="display:none">

                                            </div>
                                          </div>
                                        </div>

                                        <?php $count1++; }
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
                              <span><?php // echo $timeline['field_data'];?> (<?php echo $timeline['first_name'] ?: '';?> <?php echo $timeline['last_name'] ?: '';?>) </span>
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

                <a href="<?php echo base_url('Customer_Product/download_documents/gage_espece/risk_analysis_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>


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
              <h3 id="tab-title"><span>For Consumer Loan-Credit & CRESCO-Scholar Loan</span></h3>
              <?php 
             // print_r($loan_details);
              ?>
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
                        <input type="hidden" id="Rcl_aid" value="<?php echo $loan_details['loan_id'] ;?>" name="cl_aid" class="form-control"/>
                        
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
                          <td> Quotitécessible </td>
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



            </div>

          </div>
      </div>
    <!-- End Tab-5 section -->


   <!-- start Tab-7 section -->

   
     <!-- start Tab-10 section -->

      <!-- start Tab-10 section if role is Agent CAD -->

      <?php if($this->session->userdata('role') == "11") {
        if(in_array('8_6', $this->session->userdata('portal_permission'))){
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




      </div>
      <!-- end Tab-10 section if role is Agent CAD -->


    <?php } } else if($this->session->userdata('role') ==  "9") {
      if(in_array('8_6', $this->session->userdata('portal_permission'))) {
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
    <?php } }  else {?>

     <!-- start Tab-10 section if role is other than CAD -->
       <div class="tab-pane fade" id="tab-10">
          <!--<div class="row">
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
          </div>-->
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

                <input type="text" class="form-control" id="sms_phone_no" name="sms_phone_no" placeholder="Enter Téléphone" value="">

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
        <!-- End Tab-20  -->       


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



<script src="<?php echo  base_url(); ?>assets/js/demo-skin-changer.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script> 
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
<!-- <script src="<?php echo  base_url(); ?>assets/js/collateral.custom.js"></script -->
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

<script src="<?php echo  base_url(); ?>assets/js/project_view_js/general_js.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/project_view_js/common_business_js.js"></script>
<script>
  $(function($)
{
  //alert();
  $("#make-small-nav").click();
  $("#tab-"+<?php echo $product_tabs[0]['tab_orginial_id']?>).addClass("fade in active");
});



</script>
<script src="<?php echo  base_url(); ?>assets/js/project_view_js/countrycodephoneno_js.js"></script>







<script type="text/javascript">
   

 
function format1(inputDate) {
      var date = new Date(inputDate);
      if (!isNaN(date.getTime())) {
         // Months use 0 index.
         var d,m,y;
         if((date.getDate()) <= 9)
         {
          d="0"+date.getDate();
         }
         else
         {
          d=date.getDate();
         }
         if((date.getMonth()) <= 9)
         {
          m="0"+date.getMonth();
         }
         else
         {
          m=date.getMonth();
         }
      
          return d + '-' + m + '-' + date.getFullYear();
         
      }
    }

  function isNumber(evt) {
      evt = (evt) ? evt : window.event;
      var charCode = (evt.which) ? evt.which : evt.keyCode;
      if (charCode > 31 && (charCode < 48 || charCode > 57)) {
          return false;
      }
      return true;
  }

  
$.validator.addMethod(
        "dateregex",
        function(value, element, regexp) {
            var re = new RegExp(regexp);
          
            return this.optional(element) || re.test(value);
        },
        "Please enter valid date with format dd-mm-yyyy"
  );

  $("#addbusinesscustomer").validate({
    errorClass: 'has-error',
    rules: {        
      account_no: {
        required: true,
        number:true
       }, 
      branch: "required",
      company_name:"required",
      type_of_legal:"required",
      address:"required",
      principal:{
        required: true,
        number:true
       },
      capital:{
        number:true
       },  
      employer_tax_id :{
        required: true,
        number:true
       },
      account_open_date :{
        required:true,
        dateregex:/^(\d{2,2})(\-)(\d{2,2})\2(\d{4}|\d{4})$/
      },
      balance_amount :{
        required: true,
        number:true
       },
      amount_type :"required",
      unpaid_amount:{
        required: true,
        number:true
       },
      number_of_unpaid:{
        required: true,
        number:true
       },

        
    },      
    messages: {
      account_no: {
        required: "Please enter account no.",
        number:"Please enter valid number"
       }, 
      branch: "Please enter branch",
      company_name:"Please enter company name",
      type_of_legal:"Please enter type of legal",
      address:"Please enter address",
      principal:{
        required: "Please enter principal",
        number:"Please enter valid number"
       },
      capital:{
         number:"Please enter valid number"
       },  
      employer_tax_id :{
        required: "Please enter employer tax id",
        number:"Please enter valid number"
       },
      // sector_of_activity : "Please enter sector of activity",
      account_open_date :{
        required :"Please enter account open date"
      },
      balance_amount :{
        required: "Please enter balance amount",
        number:"Please enter valid number"
       },
      amount_type :"Please enter amount type",
      unpaid_amount:{
        required: "Please enter unpaid amount ",
        number:"Please enter valid number"
       },
      number_of_unpaid:{
        required: "Please enter number of unpaid",
        number:"Please enter valid number"
       }    
    },
    highlight: function(element) {
      $(element).parent('.form-group').addClass('has-error');
      $(element).parent('td').addClass('has-error');
    },
    unhighlight: function(element) {

      $(element).parent('.form-group').removeClass('has-error');
      $(element).parent('td').removeClass('has-error');

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
      
      var formdata = $("#addbusinesscustomer");
      $.ajax({
        type:'POST',
        url:'<?php echo base_url("Customer_Product/manage_business_loan_data/credit_conso/").$loan_details['loan_id'];?>',
        data:$(formdata).serialize(),
        beforeSend: function(){
          $('.submitBtn').attr("disabled","disabled");
          $('#addbusinesscustomer').css("opacity","0.5");
          $('.outputdata').val("");
          $('.lodergif').css("display","inline");         
        },
        success: function(response) {

          console.log(response)

          $('.outputdata').val($.trim(response));         
          $('#addbusinesscustomer').css("opacity","");
          $('.submitBtn').attr("disabled",false);
          $('.lodergif').css("display","none");         
          if($.trim(response)=="success"){
            $("#addbusinesscustomer")[0].reset();
            $('.response-msg').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> Customer saved Successfully.</div>'); 
            setTimeout(function() {                
                      location.reload();
                    }, 2000);                               
                     }else{                                             
                      $('.response-msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>Error!</strong> Unable to save record.</div>');
                     } 
        },
        error: function(XMLHttpRequest, textStatus, response) { 
          $('#addnewcustomer').css("opacity","");
          $('.submitBtn').attr("disabled",false);
          $('.lodergif').css("display","none");
          $('.response-msg').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i><strong>'+textStatus+'! </strong>'+response+'</div>').show();                
          } 
      });
      }
  });
  
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
        url: '<?php echo base_url("Credit_conso/manage_risk_analysis/").$loan_details['loan_id'];?>',
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
          url: '<?php echo base_url("Credit_Conso/manage_risk_analysis_facility/").$loan_details['loan_id'];?>',
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
          url:'<?php echo base_url("Customer_Product/manage_history_interaction_customer/credit_conso/sms/").$loan_details['loan_id'];?>',
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
          url:'<?php echo base_url("Customer_Product/manage_history_interaction_customer/credit_conso/interview_telephone/").$loan_details['loan_id'];?>',
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

<script>



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

    $("#button_2").on("click", function(e) {
//$('#loanEditFormdetais').submit(function(){
    var form = $("#loanEditForm");

     var serializedFormStr =form.serialize();
    $.ajax({
        type:'POST',
        url:'<?php echo base_url("Credit_Conso/edit_loan");?>',
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
        url:'<?php echo base_url("Credit_Conso/riskanalysis_current_monthly_credit");?>',
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
        url:'<?php echo base_url("Credit_Conso/riskanalysis_monthly_payment_new_loan");?>',
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
            url:'<?php echo base_url("Credit_Conso/riskanalysis_financial_situation");?>',       data:$.trim(serializedFormRf), 
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
    url:"<?php echo base_url('Credit_Conso/uploadfile_collateral_vehicule');?>",
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
    url:"<?php echo base_url('Credit_Conso/uploadfile_collateral_deposit');?>",
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
    url:"<?php echo base_url('Credit_Conso/uploadfile_collateral_maison');?>",
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
    url:"<?php echo base_url('Credit_Conso/uploadfile_collateral_excemption');?>",
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
    url:"<?php echo base_url('Credit_Conso/uploadfile_collateral_vehicule');?>",
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
    url:"<?php echo base_url('Credit_Conso/uploadfile_collateral_deposit');?>",
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
    url:"<?php echo base_url('Credit_Conso/uploadfile_collateral_maison');?>",
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