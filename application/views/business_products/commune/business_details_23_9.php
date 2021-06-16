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
            <li><a href="<?php echo base_url('Commune');?>">COMMUNE</a></li>            
            <li class="active"><span>DÉTAILS DU CLIENT</span></li>
            <li><?php echo "Application Number: (".$loan_details['application_no'].")";?></li>
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
                        <div class="col-xs-2 bold no-padding">Nom du client:</div>
                        <div class="col-xs-2 no-padding"></div>
                       
                        <div class="col-xs-2 bold no-padding">Compte Bancaire:</div>
                        <div class="col-xs-2"></div>
                         <div class="col-xs-2 bold no-padding">Montant Ligne de Credit:</div>
                        <div class="col-xs-2 no-padding"></div>
                      </div>
                      <div class="row well_row">
                       
                        <div class="col-xs-2 bold no-padding">Mensualite:</div>
                        <div class="col-xs-2 no-padding"></div>
                        <div class="col-xs-2 bold no-padding">Date de mise en place:</div>
                        <div class="col-xs-2 no-padding"></div>
                        <div class="col-xs-2 bold no-padding">Date d'échéance:</div>
                        <div class="col-xs-2 no-padding"></div>
                      </div>
                      <div class="row well_row">
                      
                        <div class="col-xs-2 bold no-padding">Total Tirage:</div>
                        <div class="col-xs-2 no-padding"></div>
                        <div class="col-xs-2 bold no-padding">Montant Disponible:</div>
                        <div class="col-xs-2 no-padding"></div>
                         <div class="col-xs-2 bold no-padding">Taux d'interet:</div>
                        <div class="col-xs-2 no-padding"></div>
                      </div>
                      <div class="row well_row">
                        <div class="col-xs-2 bold no-padding">Agence:</div>
                        <div class="col-xs-2 no-padding"></div>
                        <div class="col-xs-2 bold no-padding">Montant Total a Rembourser:</div>
                        <div class="col-xs-2 no-padding"></div>
                        <div class="col-xs-2 bold no-padding">Montant avant Taxes:</div>
                        <div class="col-xs-2 no-padding"></div>
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
                <input type="number" class="form-control" id="frais_de_doss" name="frais_de_doss" autocomplete="off" value="<?php echo $loan_details['frais_de_dossier'];?>" required min="0" <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?> >
                  </div>
                </div>

              </div>

              <div class="col-md-3">

                <div class="form-group">

                <label>Frais D'Assurance</label>
                  <div class="input-group">
                  <span class="input-group-addon">CFA</span>
                <input type="number" class="form-control" id="frais_de_assurance" name="frais_de_assurance" autocomplete="off" value="<?php echo $loan_details['frais_de_assurance'];?>" required min="0" <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?>>
                  </div>
                </div>

              </div>

              </div>

              


              <div class="col-md-12">

                <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">
                <input type="hidden" name="application_id" id="application_id" value="<?php echo $loan_details['loan_id']?>">
                 <input type="hidden" name="product" id="product_type" value="commune">

                 <?php if (in_array('10_2', $this->session->userdata('portal_permission'))){ ?>
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

                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->account_no.'</span></h3>' ;?>

                     <?php } else {?>
						<input type="text" class="form-control addvalidate" id="account_no" name="account_no" autocomplete="off"  placeholder="Enter Account No." value="<?php echo $customer->account_no;?>" onkeypress="return isNumber();"/>

                  <?php } ?>
		            </div>
		          </div>								  
		          <div class="col-md-4">
		            <div class="form-group">
		              <label>Agence <span style="color:red">*</span></label>
                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
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

                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
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

                    <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
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
                        <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->address.'</span></h3>' ;?>

                     <?php } else {?>
	                      <textarea class="form-control addvalidate" id="address" name="address" placeholder="Enter Address"><?php echo $customer->address;?></textarea>

                      <?php } ?>
	                    </div>
	                </div>
	             							  
	              <div class="col-md-4">
	                <div class="form-group">
	                  <label>Principal gérant <span style="color:red">*</span></label>
                    <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
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
                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->capital.'</span></h3>' ;?>

                     <?php } else {?>
                  <input type="number"  class="form-control addvalidate" id="capital" name="capital" placeholder="Enter Capital" min="0" value="<?php echo $customer->capital;?>"/>	

                    <?php } ?>					
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Numéro d’immatriculation RCCM <span style="color:red">*</span></label>
                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->employer_tax_id.'</span></h3>' ;?>

                     <?php } else {?>
                  <input type="text"  class="form-control addvalidate" id="employer_tax_id" name="employer_tax_id" placeholder="Enter Employer Tax Id"  value="<?php echo $customer->employer_tax_id;?>" onkeypress="return isNumber();"/>

                    <?php } ?>
                </div>
              </div>
               <div class="col-md-4">
                <div class="form-group">
                  <label>Secteur d’Activité <span style="color:red">*</span></label>

                   <?php if (!in_array('10_2', $this->session->userdata('portal_permission')))
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
                                <?php if (!in_array('10_2', $this->session->userdata('portal_permission')))
                                  {
                                    echo '<h3 id="tab-details"><span>'.$of_row->full_name.'</span></h3>';

                                  } else { ?>
                                <input type="hidden" name="edit_officer_id[]" value="<?php echo $of_row->officer_id?>" class="officer_c"><input type="text" name="full_name[<?php echo $key ; ?>]" id="Officer1_full_name" class="form-control addvalidate fullname_c" placeholder="Enter Full Name" value = "<?php echo $of_row->full_name; ?>" required="true">
                                <?php } ?>

                              </td>
		                      		<td>
                                 <?php if (!in_array('10_2', $this->session->userdata('portal_permission')))
                                  {
                                    echo '<h3 id="tab-details"><span>'.$of_row->position.'</span></h3>';

                                  } else { ?>
                                <input type="text" name="position[<?php echo $key ; ?>]" id="Officer1_position" class="form-control addvalidate position_c" placeholder="Enter Position" required="true" value = "<?php echo $of_row->position; ?>" >
                              <?php } ?>
                              </td>
		                      		<td>
                                 <?php if (!in_array('10_2', $this->session->userdata('portal_permission')))
                                  {
                                    echo '<h3 id="tab-details"><span>'.$of_row->address.'</span></h3>';

                                  } else { ?>
                                <textarea name="officer_address[]" id="officer1_address" class="form-control addvalidate address_c" placeholder="Enter Address"><?php echo $of_row->address; ?></textarea>
                              <?php } ?>
                              </td>
		                      		<td>
                                 <?php if (!in_array('10_2', $this->session->userdata('portal_permission')))
                                  {
                                    echo '<h3 id="tab-details"><span>'.$of_row->age.'</span></h3>';

                                  } else { ?>
                                <input type="number" name="age[<?php echo $key ; ?>]" id="Officer1_age" class="form-control addvalidate age_c" placeholder="Enter Age" value = "<?php echo $of_row->age; ?>" min="18" max="99">
                              <?php } ?>
                              </td>
		                      		<td>
                                 <?php if (!in_array('10_2', $this->session->userdata('portal_permission')))
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
                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){

                        if($customer->account_open_date )echo '<h3 id="tab-details"><span>'.date("d-m-Y", strtotime($customer->account_open_date)).'</span></h3>'  ;
                      } else { ?>
                  <input type="text"  class="form-control addvalidate" id="account_open_date" name="account_open_date" autocomplete="off" value="<?php if($customer->account_open_date )echo date("d-m-Y", strtotime($customer->account_open_date))  ; ?>" placeholder="dd-mm-yyyy"/>
                  <?php } ?>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                  <label>Montant des engagements </label>

                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission')))
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
                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
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

                   <?php if (!in_array('10_2', $this->session->userdata('portal_permission')))
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
                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->unpaid_amount.'</span></h3>' ;?>

                     <?php } else {?>
                  <input type="number"  class="form-control addvalidate" id="unpaid_amount" name="unpaid_amount" placeholder="Enter Unpaid Amount" required value="<?php echo $customer->unpaid_amount; ?>" min="0"/>
                <?php } ?>
                </div>
              </div>

               <div class="col-md-4">
                <div class="form-group">
                  <label>Nombre des impayés <span style="color:red">*</span></label>
                  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){
                       echo '<h3 id="tab-details"><span>'.$customer->employer_tax_id.'</span></h3>' ;?>

                     <?php } else {?>
                  <input type="number"  class="form-control addvalidate" id="number_of_unpaid" name="number_of_unpaid" placeholder="Enter Number Of Unpaid" required value="<?php echo $customer->number_of_unpaid; ?>" min="0"/>
                <?php } ?>
                </div>
              </div>

		   	</div>
        
          	<div class="row">
              
          		<div class="col-md-12">
                <?php if(in_array('10_2', $this->session->userdata('portal_permission'))) {?>
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
            <a href="<?php echo base_url('Business_Product/download_documents/commune/checklist_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
         
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
                                                  <?php if($documents['checklist_status'][$key] == "1") echo "checked";?> <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?> >
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

              <button type="button" file_type="risk_analysis_docs"  class="btn btn-sm btn-default preview" data-toggle="modal" data-target="#filePreviewModal"><i class="fa fa-eye"></i> Preview</button>

              <a href="<?php echo base_url('Business_Product/download_documents/commune/risk_analysis_docs/').$loan_details['loan_id']; ?>" class="btn btn-sm btn-primary download" ><i class="fa fa-cloud-download"></i> Download</a>
        

             <table class="table table-bordered table-hover" id="table_auto">
                                  <tr id="row_0">
                                    <td><form action="#">
                                      <?php if(!empty($documents['analysis_docs'])) {
                                        $count2 = 1;
                                         foreach($documents['analysis_docs'] as $key=> $doc3){
                                      ?>
                                        <div class="row">
                                          <div class="col-lg-6"> <span><a href="JavaScript:void(0);"><?php echo $count2;?>- <?php echo strtoupper($doc3['document_name']);?></a></span>
                                            
                                          </div>
                                          <div class="col-lg-6">
                                             <label class="switch">
                                                  <input type="checkbox" class="risk_status" id="risk_status_<?php echo $count2;?>" value="1" 
                                                  <?php if($documents['risk_status'][$key] == "1") echo "checked";?> <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?> >
                                                  <span class="slider round "></span>
                                              </label>
                                               <img src="<?php echo base_url("assets/img/loading.gif");?>" class="risk_loading_status" style="display:none">
                                          </div>
                                        </div>
                                      <?php $count2++;} 
                                          }
                                      ?>

                                       
                                      </form>
                                    </td>
                                  </tr>
                                 
                                </table>


        

        
  
         <h3 id="tab-title" style="margin-top: 2%;"><span>FORMULAIRE PP COMMUNE MISE EN PLACE LIGNE</span></h3>
            <form id="riskAnalyseForm" method="post">

                <div class="row">
                  <div class="col-md-12">
                     <div class="analyseflash-msg"></div>
                  </div>
                </div>

                <div class="row">
                   <div class="col-md-3">

                      <div class="form-group">

                      <label>Montant Crédit<span style="color:red">*</span></label>
                        
                      <input type="number" class="form-control" id="credit_amount" name="credit_amount" autocomplete="off" value="<?php echo $risk_analysis['credit_amount'] ?? '';?>" required  min="1" onblur="check_amount()" <?php if (!in_array('10_2', $this->session->userdata('portal_permission')) || !empty($withdraw_workflow)){ echo "disabled" ; }?> >
                      <span id="credit_amount-error1" class="help-block" style="display: none;"></span>

                      </div>

                  </div>
                  <div class="col-md-3">

                      <div class="form-group">

                      <label>Durée<span style="color:red">*</span></label>
                        
                      <input type="number" class="form-control" id="duration" name="duration" autocomplete="off" value="<?php echo $risk_analysis['duration'] ?? '';?>" required min="1"  <?php if (!in_array('10_2', $this->session->userdata('portal_permission')) || !empty($withdraw_workflow)){ echo "disabled" ; }?> >
                    

                      </div>

                  </div>

                  <div class="col-md-3">

                      <div class="form-group">

                      <label>Taux<span style="color:red">*</span></label>
                        
                      <input type="number" class="form-control" id="tax" name="tax" autocomplete="off" value="<?php echo $risk_analysis['tax'] ?? '';?>" required min="1" onblur="check_tax()" <?php if (!in_array('10_2', $this->session->userdata('portal_permission')) || !empty($withdraw_workflow)){ echo "disabled" ; }?> >
                       <span id="tax-error1" class="help-block" style="display: none;">Tax should not be greater than 100%</span>

                      </div>

                  </div>

                  <div class="col-md-3">

                      <div class="form-group">

                      <label>Date mise en place<span style="color:red">*</span></label>
                        
                      <input type="text" class="form-control" id="start_date" name="start_date" autocomplete="off" value="<?php
                       if($risk_analysis['start_date']) echo date("d-m-Y", strtotime($risk_analysis['start_date'])) ?? '';?>" required  <?php if (!in_array('10_2', $this->session->userdata('portal_permission')) || !empty($withdraw_workflow)){ echo "disabled" ; }?> >
                    

                      </div>

                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">

                    <div class="form-group">

                      <label>Date d'échéance<span style="color:red">*</span></label>
                        
                      <input type="text" class="form-control" id="end_date" name="end_date" autocomplete="off" value="<?php 
                      if($risk_analysis['end_date']) echo date("d-m-Y", strtotime($risk_analysis['end_date'])) ?? '';?>" required  <?php if (!in_array('10_2', $this->session->userdata('portal_permission')) || !empty($withdraw_workflow)){ echo "disabled" ; }?> >
                    

                    </div>

                  </div>
                </div>

                  <div class="row">
                <div class="col-md-12">

                  <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

                  <?php if (in_array('10_2', $this->session->userdata('portal_permission')) && empty($withdraw_workflow)){ ?>
                  <button type="submit"  class="btn btn-primary pull-right risk_btn">SAVE DETAILS</button>
                <?php }?>

                  <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right feeloder" style="position:relative;top: 9px;left:-13px; display: none;">

                  </div>

                </div>

                </div>




              </form>


        <?php if($loan_details['final_status'] == "Disbursement") {?>
         <h3 id="tab-title" style="margin-top: 2%;"><span>WITHDRAWAL PP COMMUNE </span></h3>


         <form id="withdrawForm" method="post">

            <?php if($this->session->userdata('role') == '2'){?>
                <div class="row">
                  <div class="col-md-12">
                     <div class="analyseflash-msg1"></div>
                  </div>
                </div>

                <div class="row">
                   <div class="col-md-3">

                      <div class="form-group">

                      <label>Main Line<span style="color:red">*</span></label>
                        
                      <input type="number" class="form-control"  name="montant" autocomplete="off" value="<?php echo $risk_analysis['credit_amount'] ?? '';?>" required  min="1" readonly >
                      </div>

                  </div>
                  <div class="col-md-3">

                      <div class="form-group">

                      <label>Balance<span style="color:red">*</span></label>
                        
                      <input type="number" class="form-control"  name="remaining_amount" autocomplete="off" value="<?php if($withdraw_balance['sum']) echo $risk_analysis['credit_amount'] - $withdraw_balance['sum']; ?>" required  min="1" readonly >
                      </div>

                  </div>

                  <?php if($withdraw_balance['sum'])

                   $remaining =  $risk_analysis['credit_amount'] - $withdraw_balance['sum']; 

                    if($remaining != 0){
                   ?>
                  <div class="col-md-3">

                      <div class="form-group">

                      <label>Draw (Tirage) <span style="color:red">*</span></label>
                        
                      <input type="number" class="form-control" id="draw" name="draw" autocomplete="off" value="" required min="1"  <?php if (!in_array('10_2', $this->session->userdata('portal_permission'))){ echo "disabled" ; }?> >
                    

                      </div>

                  </div>

                <?php }?>

                 
                </div>

 
                <?php if($remaining != 0){ ?>

                  <div class="row">
                <div class="col-md-12">

                  <div class="clearfix" style="margin-top:10px;margin-bottom:10px;">

                  <?php if (in_array('10_2', $this->session->userdata('portal_permission'))){ ?>
                  <button type="submit"  class="btn btn-primary pull-right">SAVE DETAILS</button>
                <?php }?>

                  <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-right feeloder" style="position:relative;top: 9px;left:-13px; display: none;">

                  </div>

                </div>

                </div>
              <?php } }?>
         </form>


         <div class="row">
          <div class="col-md-8">

            <div class="row">
              <div class="col-md-12">

                <?php if($this->session->userdata('role') == "2" || $this->session->userdata('role') == "10" ) {?>
                  <form  method="" id="WithdrawDecisionForm">
                    <div class="row">
                       <div class="col-md-4">
                        <?php// print_r($withdraw_decision);?>
                          <div class="form-group">
                            <label>SELECTIONNER VOTRE AVIS</label>    
                              <select class="form-control" id="w_decision" name="w_decision" <?php if($withdraw_decision['review'] == 1 || $withdraw_decision['review'] == "") echo "disabled" ;?>>
                                <option value="Avis Favorable" selected="">Avis Favorable</option>
                                <option value="Avis défavorable">Avis défavorable</option>                   
                              </select>
                          </div>
                        </div>
                    </div>
                     <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                            <div class="input-group" style="width:100%">
                              <label>Commentaire</label>
                                <input type="text" class="form-control" name="w_comment" placeholder="Enter Commentaire" autocomplete="off" <?php if($withdraw_decision['review'] == 1 || $withdraw_decision['review'] == "") echo "disabled" ;?> >
                             </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                    

                    <img src="http://localhost/dcp_online/assets/img/select2-spinner.gif" class="pull-right commentlofer_w" style="position:relative;top: 17px;left:-124px; display:none;">
                    <button type="button" class="btn btn-primary pull-right clearfix" id="commentsubmit_withdraw" style="margin-top:10px;margin-bottom:10px;">SOUMETTRE</button>
                  </div>

                  </form>

                <?php }
                    else if($this->session->userdata('role') == "11"){
                ?>

               <form id="observation_withdraw" method="post" >
                <table class="table table-condensed table-hover">
                      <thead>
                        <tr>
                           <?php if($withdraw_decision['review']=="0"){ ?>
                            <th style="vertical-align: top;max-width:50px">Agent CAD</th>
                            <th style="vertical-align: top;max-width:50px">Autorisation
                              <div class="checkbox-nice checkbox-inline">
                                <input type="checkbox" id="checkbox-inl-1" name="cadcodesplit_withdraw" value="1" style="border: 1px solid #000;">
                                <label for="checkbox-inl-1">&nbsp;</label>
                              </div>
                            </th> 
                            <th style="vertical-align: top;max-width:50px">
                              COMMENT
                              <textarea class="form-control" name="w_comment" id="agent_comment_withdraw"></textarea>
                            </th>                                            
                            <th>
                             
                              <input type="hidden" value="Confirm Disbursement" name="w_decision">
                              <button type="button" class="btn btn-sm btn-primary" id="confirmclick_withdraw">
                                <strong>Valider</strong>
                              </button>
                              <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left lodergif" style="position:relative;top: 9px; display: none;">
                            </th> 
                          
                        </tr>
                        <?php }
                            else if($withdraw_decision['review']=="0"){ 
                              echo "<th>Agent CAD</th>
                            <th>Autorisation<div class=\"checkbox-nice checkbox-inline\"><input type=\"checkbox\" id=\"checkbox-inl-1\" name =\"check\" value=\"1\" checked disabled >
                              <label for=\"checkbox-inl-1\">&nbsp;</label></div>
                              </th>
                            <th><button type=\"button\" class=\"btn btn-sm btn-primary\" disabled> <strong> Valider </strong> </button></th>"; 
                          }
                        ?>

                      </thead>
                   </table> 

               </form>
                    <?php } else if($this->session->userdata('role') ==  "9") { ?>
                    <form id="cadform_withdraw" method="post" >
                      <div class="col-md-12">
                        <div class="table-responsive">
                        <?php if($withdraw_decision['review']=="0"){ ?>
                          <h3 id="tab-title"><span>AUTORISATION</span></h3>
                        <?php }?>
                          <table class="table table-condensed">
                            <thead>
                            <tr class="info">
                             <?php if($withdraw_decision['review']=="0"){ ?>
                              <th>
                                COMMENT
                              <textarea class="form-control" id="headcomment" name="w_comment" style="max-width: 400px;margin: 10px"></textarea>

                              <input type="hidden" value="Confirm Disbursement" name="w_decision">
                              <button type="button" class="btn btn-sm btn-primary" id="button_3_withdraw"> <i class="fa fa-thumbs-up"></i> <strong> Confirm Disbursement</strong> </button>
                              <img src="<?php echo  base_url('assets/img/select2-spinner.gif');?>" class="pull-left commentlofer_w" style="position: relative;top: 8px;display:none; left: 193px;">
                              </th> 
                                                                      
                            </tr>
                            <?php }
                            else if($withdraw_decision['review']=="1"){ echo "<th><button type=\"button\" class=\"btn btn-sm btn-primary\" disabled> <i class=\"fa fa-thumbs-up\"></i> <strong> Confirm </strong> </button></th>"; }
                            ?>
                            </thead>
                          </table>
                        </div>
                      </div>
                  </form>

                    <?php } ?>
              </div>

              <div class="col-md-12">
                <div class="decisionmsg_w"></div>
              </div>

           </div>
              <table id="" class="table table-striped table-hover">
                    <thead>
                      <tr class="success">                        
                        <th><span>DRAW (TIRAGE)</span></th>
                        <th><span>DATE</span></th>
                        <th><span>View</span></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $count_data  = 1; 

                       foreach($withdraw_workflow as $row_draw){
                      ?>
                        <tr>
                          <td><?=$row_draw['withdraw']['withdraw_amount']?></td>
                          <td><?=$row_draw['withdraw']['created_at']?></td>
                          <td><a href="javascript:0;" onclick="show_data(this,'<?=$count_data?>')" class="addc_<?=$count_data?>">View</a></td>
                        </tr>
                        <tr id="row_count<?=$count_data?>" style="display: none;">
                         
                         <td colspan="3">

                            <table id="" class="table table-striped table-hover" >
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
                                if(!empty($row_draw['approval_details'])){
                                foreach ($row_draw['approval_details'] as $d ) {
                                    
                                   $timetoago=$d['comment_date'];
                                    echo "<tr>";
                                        echo "<td>".$d['name']."</td>";
                                        echo "<td>".ucwords($d['first_name']." ".$d['last_name'])."</td>";
                                        echo "<td>".$d['approval_status']."</td>";
                                        echo "<td>".$d['comment']."</td>";
                                        echo "<td>". date('d-m-Y', strtotime($d['comment_date'])).':'.timeAgo($timetoago)."</td>";
                                     echo "</tr>";
                                    }
                                  }                                              
                                ?>
                              </tbody>
                            </table>

                          </td>
                        
                        </tr>

                       <?php $count_data++; }?> 
                    </tbody>

                  </table>

                  
                
          </div>
         </div>
         


        <?php }?>

              </div>

        </div>
    </div>
    <!-- End Tab-5 section -->


   <!-- start Tab-7 section -->

   
     <!-- start Tab-10 section -->

      <!-- start Tab-10 section if role is Agent CAD -->

      <?php if($this->session->userdata('role') == "11") {
        
      ?>
      <div class="tab-pane fade" id="tab-10">
        <?php if(in_array('10_6', $this->session->userdata('portal_permission'))){?>
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
                          <td>Nom du client</td>
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


      <?php } ?>

      </div>
      <!-- end Tab-10 section if role is Agent CAD -->


    <?php  } else if($this->session->userdata('role') ==  "9") {
    
      ?>

      <!-- start Tab-10 section if role is Head CAD -->
      
      <div class="tab-pane fade" id="tab-10">
        <?php   if(in_array('10_6', $this->session->userdata('portal_permission'))) {?>
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
    <?php }   else {?>

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

          <?php if(in_array('10_6', $this->session->userdata('portal_permission')) && $this->session->userdata('role') != "11" && $this->session->userdata('role') != "9" && $this->session->userdata('role') != "12"  ) {?>
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
                        <?php if($loan_details['review']=="0"){ ?>
                          <input type="text" class="form-control" id="commentstatus" name="commentstatus" placeholder="Enter Commentaire" autocomplete="off" requerd />
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
  var fee_url  =  "<?php echo base_url('Business_Product/manage_loan_fees');?>";
  var document_status__url = "<?php echo base_url('Business_Product/change_document_status/commune/').$loan_details['loan_id']?>";
  var system_upload_url  =  "<?php echo base_url('Business_Product/upload_systemfiles/commune/').$loan_details['loan_id'];?>";
  var checklist_upload_url = "<?php echo base_url('Business_Product/upload_checklistfiles/commune/').$loan_details['loan_id'];?>";
  var risk_upload_url =  "<?php echo base_url('Business_Product/uploadfile_risk_analysis/commune/').$loan_details['loan_id'];?>";
  var preview_url ="<?php echo base_url('Business_Product/view_uploaded_documents/commune/').$loan_details['loan_id']?>";
  var decision_url = '<?php echo base_url("Business_Product/comment_manager/commune/").$loan_details['loan_id'];?>';
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


$( function() {
     
      $( "#start_date" ).datepicker({ dateFormat: 'dd-mm-yy', onSelect: function(selected) {
          $("#end_date").datepicker("option","minDate", selected) }});


      $( "#end_date" ).datepicker({ dateFormat: 'dd-mm-yy'});
      $("#end_date").datepicker("option","minDate", $("#start_date").val());
  } );


 function check_amount(){
   var amount  = parseFloat($("#credit_amount").val());

    if($("#credit_amount").val() != ""){
      if(amount >= 1.00 && amount <= 100000000.00)
     {
       $("#credit_amount").closest('.form-group').removeClass('has-error');
       $("#credit_amount-error1").text(""); 
       $("#credit_amount-error1").css("display","none");;
       $(".risk_btn").attr("type","submit");


     }
     else {
      $("#credit_amount").closest('.form-group').addClass('has-error');
      $("#credit_amount-error1").text("Amount should not be greater than 100M"); 
      $("#credit_amount-error1").css("display","block");
      $(".risk_btn").attr("type","button");
     }
    }
    else{

       $("#credit_amount-error1").text(""); 
       $("#credit_amount-error1").css("display","none");;
       $(".risk_btn").attr("type","submit");
    }
   
 }

   function check_tax(){
       var amount  = parseFloat($("#tax").val());
       if($("#tax").val() != ""){
         if(amount >= 1.00 && amount <= 100.00)
         {
           $("#tax").closest('.form-group').removeClass('has-error');
           $("#tax-error1").hide();
           $(".risk_btn").attr("type","submit");


         }
         else {
          $("#tax").closest('.form-group').addClass('has-error');
          $("#tax-error1").show();
          $(".risk_btn").attr("type","button");
         }
      }
      else {
         $("#tax-error1").hide();
         $(".risk_btn").attr("type","submit");
      }   
   }


  // Risk Analyse form in commune

     $("#riskAnalyseForm").validate({
      errorClass: 'has-error',
      rules: {
        credit_amount:{
          required : true,
          number: true
        },
        duration:{
          required : true,
          number : true
        },
        tax:{
          required : true,
          number : true
        },
        start_date: 'required',
        end_date: 'required'
        

      },
      messages: {
       credit_amount:{
          required : "Please enter credit amount"
        },
        duration:{
          required : "Please enter duration"
        },
        tax:{
          required : "Please enter tax"
        },
        start_date: "Please enter start date",
        end_date: "Please enter end date"
              
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

        check_amount();

        $.ajax({
          url: '<?php echo base_url("Commune/manage_risk_analysis/").$loan_details['loan_id'];?>',
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



    function show_data(element,row_id){
     
      if($(element).hasClass('addc_'+row_id)){

       
        $("#row_count"+row_id).show();
        var classname =  "removec_"+row_id;
        $(element).attr('class',classname);

        return false;
         
      }



       if($(element).hasClass('removec_'+row_id)){

       
         $("#row_count"+row_id).hide();

         var classname1 =  "addc_"+row_id;
         $(element).attr('class',classname1);

         return false;
      }
      
    }

    // Withdraw Decision Comment Section 
    $("#commentsubmit_withdraw").on("click", function(e) {    
    var form = $("#WithdrawDecisionForm");           
     var serializedFormStr =form.serialize();
     $.ajax({
        type:'POST',
        url:'<?php echo base_url('Business_Product/comment_manager_withdraw/').$loan_details['loan_id']?>',
        data: serializedFormStr,
        beforeSend: function(){         
            $('#WithdrawDecisionForm').css("opacity","0.5"); 
            $('.commentlofer_w').css("display","inline");
            $('.commentres').val("");
            $('.decisionmsg_w').html("");
        },
        success:function(resp){                      
             console.log(resp);
            // return false;
            $('#WithdrawDecisionForm').css("opacity","");
            $('.commentlofer_w').css("display","none"); 
            $('.commentres').val($.trim(resp)); 
            $("#WithdrawDecisionForm")[0].reset(); 
            var obj=JSON.parse(resp);
            if($.trim(obj.success)){
              $('.decisionmsg_w').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> '+$.trim(obj.success)+'.</div>');
              setTimeout(function() {
                location.reload();
              }, 1500);
            }
          else{                       
              $('.decisionmsg_w').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>'+$.trim(obj.error)+'.</div>');
            }               
        }                
    });
});




$('#confirmclick_withdraw').on("click", function() {
  var eformData = $.trim($('#observation_withdraw').serialize()); 

  if( $("input[type='checkbox'][name='cadcodesplit_withdraw']").prop("checked") == false)
  {
      alert("Please Check Autorisation");      
  }
  else if($("#agent_comment_withdraw").val() == "")
  {
      alert("Please Enter Comment");
  }
  else if( $("input[type='checkbox'][name='cadcodesplit_withdraw']").prop("checked") == true){     
    if(confirm('Do You Want To Confirm Disbursement?') ) { 
      $.ajax({
        type:'POST',
        url:'<?php echo base_url('Business_Product/comment_manager_withdraw/').$loan_details['loan_id']?>',
        data:eformData,
        beforeSend: function(){         
          $('#observation_withdraw').css("opacity","0.5");
          $('.lodergif').css("display","inline");                  
        },
        success:function(resp){                      
          console.log(resp);
          $('#observation_withdraw').css("opacity","");
          $('.lodergif').css("display","none");
          $('#confirmclick_withdraw').html('<i class="fa fa-thumbs-up"></i> <strong> Confirm</strong>');
          $('#confirmclick_withdraw').attr("disabled", "disabled");
           notificationcall('<span class="icon fa fa-check-circle fa-2x"></span> <p> Withdraw Disbursement Successfully.</p>','success');                
            setTimeout(function() {                
               location.reload();
            }, 1500);
        }                 
      });
    }
  }
});


// Head CAD

      $('#button_3_withdraw').on("click", function() {
        var eformData = $.trim($('#cadform_withdraw').serialize()); 
      
        if(confirm('Do you want to disburse the loan ?') ) { 
        $.ajax({
            type:'POST',
            url:'<?php echo base_url('Business_Product/comment_manager_withdraw/').$loan_details['loan_id']?>',
            data:eformData,
            beforeSend: function(){         
                $('#cadform_withdraw').css("opacity","0.5"); 
                $('.commentlofer_w').css("display","inline")
            },
            success:function(resp){                      
              console.log(resp);
              //$('.commentres').val($.trim(resp));      
               $('.commentlofer_w').css("display","none");
               $('#cadform_withdraw').css("opacity","1");  
               obj =  JSON.parse(resp);      
                if($.trim(obj.success)){
                  $('.decisionmsg_w').html('<div class="alert alert-success"><i class="fa fa-check-circle fa-fw fa-lg"></i><strong>Success!</strong> Withdraw disbursement successfully.</div>');          
                  setTimeout(function() {
                    location.reload();
                  }, 1000);
                }else{
                  $('.decisionmsg_w').html('<div class="alert alert-danger"><i class="fa fa-times-circle fa-fw fa-lg"></i>'+$.trim(obj.error)+'.</div>');
                }            
              }        
        });
      }
      
    }); 

    // Withdraw Form

      $("#withdrawForm").validate({
      errorClass: 'has-error',
      rules: {
        draw:{
          required : true,
          number: true
        }
        

      },
      messages: {
       draw:{
          required : "Please enter draw amount"
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

        check_amount();

        $.ajax({
          url: '<?php echo base_url("Commune/manage_withdraw/").$loan_details['loan_id'];?>',
          type: 'POST',
          data: $(form).serialize(),
          beforeSend: function(){
            $('.submitBtn').attr("disabled","disabled");
            $('#withdrawForm').css("opacity","0.5");
            $(".sr-only").show();
          },
          success: function(response) {
            
            console.log(response);

            $('.analyseflash-msg1').html('').removeClass('alert alert-success fade in');
            $('#withdrawForm').css("opacity","1");  
            if(response=="success"){                                    
              $('.analyseflash-msg1').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><i class="fa fa-check-circle fa-fw fa-lg"></i> Record Saved Successfully').addClass('alert alert-success fade in').fadeOut(5000);  
                setTimeout(function(){                      
                  location.reload();
                 }, 1500); 
            $('.submitBtn').attr("disabled","");

            }
            else if(response == "not_complete")
            {
               $('.analyseflash-msg1').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Current Workflow is in progress so cannot withdraw new amount').addClass('alert alert-danger fade in');
            }
            else{
            $('.analyseflash-msg1').html('<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Error in saving record').addClass('alert alert-danger fade in');
            }
          }            
        });

        }
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
        url:'<?php echo base_url("Business_Product/manage_business_loan_data/commune/").$loan_details['loan_id'];?>',
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
          url: '<?php echo base_url("Business_Product/manage_cad_memorandum/commune/").$loan_details['loan_id'];?>',
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
          url:'<?php echo base_url("Business_Product/manage_history_interaction/commune/email/").$loan_details['loan_id'];?>',
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
          url:'<?php echo base_url("Business_Product/manage_history_interaction/commune/sms/").$loan_details['loan_id'];?>',
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
          url:'<?php echo base_url("Business_Product/manage_history_interaction/commune/interview_telephone/").$loan_details['loan_id'];?>',
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

 
</script>