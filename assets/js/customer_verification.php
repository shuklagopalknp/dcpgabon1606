<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<title>DCP - Customer Verification Page</title>
 
<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css"/>
 
<script src="js/demo-rtl.js"></script>
 
 
<link rel="stylesheet" type="text/css" href="css/libs/font-awesome.css"/>
<link rel="stylesheet" type="text/css" href="css/libs/nanoscroller.css"/>
 
<link rel="stylesheet" type="text/css" href="css/compiled/theme_styles.css"/>
 
<link rel="stylesheet" href="css/libs/daterangepicker.css" type="text/css"/>
<link rel="stylesheet" href="css/libs/jquery-jvectormap-1.2.2.css" type="text/css"/>
<link rel="stylesheet" href="css/libs/weather-icons.css" type="text/css"/>
<link rel="stylesheet" href="css/libs/morris.css" type="text/css"/>

<link rel="stylesheet" type="text/css" href="css/libs/bootstrap-wizard.css">
<link rel="stylesheet" href="css/libs/select2.css" type="text/css"/>

<link rel="stylesheet" type="text/css" href="css/libs/dataTables.fixedHeader.css">
<link rel="stylesheet" type="text/css" href="css/libs/dataTables.tableTools.css">

<link type="image/x-icon" href="favicon.png" rel="shortcut icon"/>
 
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>
<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
	<![endif]-->

	
</head>
<body>
<div id="theme-wrapper">
<?php include('topbar.php')?>
<div id="page-wrapper" class="container">

<div class="row">

<div id="nav-col">
<section id="col-left" class="col-left-nano">
<div id="col-left-inner" class="col-left-nano-content">

<div class="collapse navbar-collapse navbar-ex1-collapse" id="sidebar-nav">
<ul class="nav nav-pills nav-stacked">
<li class="nav-header nav-header-first hidden-sm hidden-xs">
Navigation
</li>
<li>
<a href="dashboard.php">
<i class="fa fa-dashboard"></i>
<span>Dashboard</span>
</a>
</li>
<li class="active">
<a href="consumer_loan.php">
<i class="fa fa-th-large"></i>
<span>Customer Verification</span>
</a>
</li>

<li>
<a href="cash_espesece.php">
<i class="fa fa-th-large"></i>
<span>Customer Verification</span>

</a>
</li>

<li>
<a href="school_tuition_guarantee_letter.php">
<i class="fa fa-th-large"></i>
<span>School Tuition Guarantee Letter</span>

</a>
</li>

<li>
<a href="commune_loan.php">
<i class="fa fa-th-large"></i>
<span>Commune Loan</span>

</a>
</li>

<li>
<a href="finance_credit_scholar.php">
<i class="fa fa-th-large"></i>
<span>Finance Credit Scholar</span>

</a>
</li>

<li>
<a href="escompte.php">
<i class="fa fa-th-large"></i>
<span>Escompte</span>

</a>
</li>

<li>
<a href="HR.php">
<i class="fa fa-th-large"></i>
<span>HR</span>

</a>
</li>

<li>
<a href="depasma.php">
<i class="fa fa-th-large"></i>
<span>Depasma</span>

</a>
</li>

</ul>
</div>
</div>
</section>
<div id="nav-col-submenu"></div>
</div>


<div id="content-wrapper">
<div class="row">
<div class="col-lg-12">
<div class="row">
<div class="col-lg-12">
<div id="content-header" class="clearfix">
<div class="pull-left">
<ol class="breadcrumb">
<li><a href="dashboard.php">Home</a></li>
<li class="active"><span>Consumer Loan</span></li>
</ol>
<h1>Consumer Loan</h1>
</div>

</div>

<div class="main-box-body clearfix">
<button id="open-wizard" class="btn btn-primary">NEW APPLICATION</button>

<div class="row" style="margin-top:10px;">
<div class="col-lg-12">
<div class="main-box clearfix">

<div class="main-box-body clearfix">
<div class="table-responsive">
<table id="table-example" class="table table-hover">
<thead>
<tr>
<th>Name</th>
<th>Position</th>
<th>Office</th>
<th>Age</th>
<th>Start date</th>
<th>Salary</th>
</tr>
</thead>
<tbody>
<tr>
<td>Tiger Nixon</td>
<td>System Architect</td>
<td>Edinburgh</td>
<td>61</td>
<td>2011/04/25</td>
<td>$320,800</td>
</tr>
<tr>
<td>Garrett Winters</td>
<td>Accountant</td>
<td>Tokyo</td>
<td>63</td>
<td>2011/07/25</td>
<td>$170,750</td>
</tr>
<tr>
<td>Ashton Cox</td>
<td>Junior Technical Author</td>
<td>San Francisco</td>
<td>66</td>
<td>2009/01/12</td>
<td>$86,000</td>
</tr>
<tr>
<td>Cedric Kelly</td>
<td>Senior Javascript Developer</td>
<td>Edinburgh</td>
<td>22</td>
<td>2012/03/29</td>
<td>$433,060</td>
</tr>
<tr>
<td>Airi Satou</td>
<td>Accountant</td>
<td>Tokyo</td>
<td>33</td>
<td>2008/11/28</td>
<td>$162,700</td>
</tr>
<tr>
<td>Brielle Williamson</td>
<td>Integration Specialist</td>
<td>New York</td>
<td>61</td>
<td>2012/12/02</td>
<td>$372,000</td>
</tr>
<tr>
<td>Herrod Chandler</td>
<td>Sales Assistant</td>
<td>San Francisco</td>
<td>59</td>
<td>2012/08/06</td>
<td>$137,500</td>
</tr>
<tr>
<td>Rhona Davidson</td>
<td>Integration Specialist</td>
<td>Tokyo</td>
<td>55</td>
<td>2010/10/14</td>
<td>$327,900</td>
</tr>
<tr>
<td>Colleen Hurst</td>
<td>Javascript Developer</td>
<td>San Francisco</td>
<td>39</td>
<td>2009/09/15</td>
<td>$205,500</td>
</tr>
<tr>
<td>Sonya Frost</td>
<td>Software Engineer</td>
<td>Edinburgh</td>
<td>23</td>
<td>2008/12/13</td>
<td>$103,600</td>
</tr>
<tr>
<td>Shad Decker</td>
<td>Regional Director</td>
<td>Edinburgh</td>
<td>51</td>
<td>2008/11/13</td>
<td>$183,000</td>
</tr>
<tr>
<td>Michael Bruce</td>
<td>Javascript Developer</td>
<td>Singapore</td>
<td>29</td>
<td>2011/06/27</td>
<td>$183,000</td>
</tr>
<tr>
<td>Donna Snider</td>
<td>Customer Support</td>
<td>New York</td>
<td>27</td>
<td>2011/01/25</td>
<td>$112,000</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<div class="wizard" id="wizard-demo">
<h1>New Loan Application</h1>
<div class="wizard-card" data-onValidated="setServerName" data-cardname="name">
<h3><span>STEP 1</span></h3>
<div class="wizard-input-section">


<div class="form-group">
<label>Product Program</label>
<select class="form-control">
<option value="Consumer Loan">Consumer Loan</option>
<option value="Credit Scholar">Credit Scholar</option>
</select>
</div>

<div class="form-group">
<label>Loan Amount to be Entered</label>
<div class="input-group">
<span class="input-group-addon">CFA</span>
<input type="number" class="form-control" id="exampleAppPre">
</div>
</div>



<div class="form-group">
<label>Interest</label>
<div class="input-group">
<input type="number" class="form-control" id="exampleAppPre">
<span class="input-group-addon">%</span>
</div>
</div>

</div>

</div>
<div class="wizard-card" data-cardname="group">
<h3><span>STEP 2</span></h3>
<div class="wizard-input-section">

<div class="form-group">
<label>Term</label>
<div class="input-group">
<input type="number" class="form-control" id="exampleAppPre">
<span class="input-group-addon">months</span>
</div>
</div>

<div class="form-group">
<label>Payment schedule</label>
<select class="form-control">
<option value="Monthly">Monthly</option>
<option value="Quarterly">Quarterly</option>
<option value="Half yearly">Half yearly</option>
<option value="Yearly">Yearly</option>
</select>
</div>

<div class="form-group">
<label>Fees</label>
<div class="input-group">
<span class="input-group-addon">CFA</span>
<input type="number" class="form-control" id="exampleAppPre" value="10000">
</div>
</div>

<!--<div class="form-group">
<label>Term</label>
<div class="input-group">
<input type="number" class="form-control" id="exampleAppPre">
<span class="input-group-addon">months</span>
</div>
</div>-->

<!--<div class="form-group">
<label>Interest</label>
<div class="input-group">
<input type="number" class="form-control" id="exampleAppPre">
<span class="input-group-addon">%</span>
</div>
</div>-->

</div>
</div>
<div class="wizard-card" data-cardname="services">
<h3><span>STEP 3</span></h3>
<div class="wizard-input-section">


<div class="form-group">
<label>Taxes</label>
<select class="form-control">
<option value="Disc Rate">Disc Rate</option>
<option value="Normal Rate">Normal Rate</option>
<option value="Specific Rate">Specific Rate</option>
</select>
</div>

<div class="form-group">
<label>Commission</label>
<div class="input-group">
<span class="input-group-addon">CFA</span>
<input type="number" class="form-control" id="exampleAppPre" value="1000">
</div>
</div>

<!--<div class="form-group">
<label>Term</label>
<div class="input-group">
<input type="number" class="form-control" id="exampleAppPre">
<span class="input-group-addon">months</span>
</div>
</div>-->

<!--<div class="form-group">
<label>Interest</label>
<div class="input-group">
<input type="number" class="form-control" id="exampleAppPre">
<span class="input-group-addon">%</span>
</div>
</div>-->

</div>
</div>


<div class="wizard-error">
<div class="alert alert-error">
<strong>There was a problem</strong> with your submission.
Please correct the errors and re-submit.
</div>
</div>
<div class="wizard-failure">
<div class="alert alert-error">
<strong>There was a problem</strong> submitting the form.
Please try again in a minute.
</div>
</div>
<div class="wizard-success">
<div class="alert alert-success">
<span class="create-server-name"></span>
New Loan was applied <strong>successfully.</strong>
</div>
<a class="btn btn-default create-another-server">Create Another New Loan</a>
<span style="padding:0 10px">or</span>
<a class="btn btn-primary im-done" href="customer_verification.php">Done</a>
</div>
</div>
</div>
</div>
</div>






</div>
</div>
<?php include('footer.php')?>
</div>
</div>
</div>
</div>

 
<script src="js/demo-skin-changer.js"></script>  
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.nanoscroller.min.js"></script>
<script src="js/demo.js"></script>  

<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script> 
<script src="js/moment.min.js"></script>
<script src="js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="js/jquery-jvectormap-world-merc-en.js"></script>
<script src="js/gdp-data.js"></script>
<script src="js/flot/jquery.flot.min.js"></script>
<script src="js/flot/jquery.flot.resize.min.js"></script>
<script src="js/flot/jquery.flot.time.min.js"></script>
<script src="js/flot/jquery.flot.threshold.js"></script>
<script src="js/flot/jquery.flot.axislabels.js"></script>
<script src="js/jquery.sparkline.min.js"></script>
<script src="js/skycons.js"></script>

<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<script src="js/scripts.js"></script>
<script src="js/pace.min.js"></script>

<script src="js/bootstrap-wizard.js"></script>
<script src="js/select2.min.js"></script>

<script src="js/jquery.dataTables.js"></script>
<script src="js/dataTables.fixedHeader.js"></script>
<script src="js/dataTables.tableTools.js"></script>
<script src="js/jquery.dataTables.bootstrap.js"></script>

<script type="text/javascript">
	function setServerName(card) {
		var host = $("#new-server-fqdn").val();
		var name = $("#new-server-name").val();
		var displayName = host;
	
		if (name) {
			displayName = name + " ("+host+")";
		};
	
		card.wizard.setSubtitle(displayName);
		card.wizard.el.find(".create-server-name").text(displayName);
	}
	
	function validateIP(ipaddr) {
	    //Remember, this function will validate only Class C IP.
	    //change to other IP Classes as you need
	    ipaddr = ipaddr.replace(/\s/g, "") //remove spaces for checking
	    var re = /^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/; //regex. check for digits and in
	                                          //all 4 quadrants of the IP
	    if (re.test(ipaddr)) {
	        //split into units with dots "."
	        var parts = ipaddr.split(".");
	        //if the first unit/quadrant of the IP is zero
	        if (parseInt(parseFloat(parts[0])) == 0) {
	            return false;
	        }
	        //if the fourth unit/quadrant of the IP is zero
	        if (parseInt(parseFloat(parts[3])) == 0) {
	            return false;
	        }
	        //if any part is greater than 255
	        for (var i=0; i<parts.length; i++) {
	            if (parseInt(parseFloat(parts[i])) > 255){
	                return false;
	            }
	        }
	        return true;
	    }
	    else {
	        return false;
	    }
	}
	
	
	
	
	$(function() {
		
		$('#sel2').select2();
	
		$.fn.wizard.logging = false;
	
		var wizard = $("#wizard-demo").wizard({
			showCancel: true
		});
	
		//$(".chzn-select").chosen();
	
		wizard.el.find(".wizard-ns-select").change(function() {
			wizard.el.find(".wizard-ns-detail").show();
		});
	
		wizard.el.find(".create-server-service-list").change(function() {
			var noOption = $(this).find("option:selected").length == 0;
			wizard.getCard(this).toggleAlert(null, noOption);
		});
	
		wizard.cards["name"].on("validated", function(card) {
			var hostname = card.el.find("#new-server-fqdn").val();
		});
	
		wizard.on("submit", function(wizard) {
			var submit = {
				"hostname": $("#new-server-fqdn").val()
			};
	
			setTimeout(function() {
				wizard.trigger("success");
				wizard.hideButtons();
				wizard._submitting = false;
				wizard.showSubmitCard("success");
				wizard.updateProgressBar(0);
			}, 2000);
		});
	
		wizard.on("reset", function(wizard) {
			wizard.setSubtitle("");
			wizard.el.find("#new-server-fqdn").val("");
			wizard.el.find("#new-server-name").val("");
		});
	
		wizard.el.find(".wizard-success .im-done").click(function() {
			wizard.reset().close();
		});
	
		wizard.el.find(".wizard-success .create-another-server").click(function() {
			wizard.reset();
		});
	
		$(".wizard-group-list").click(function() {
			alert("Disabled for demo.");
		});
	
		$("#open-wizard").click(function() {
			wizard.show();
		});
	
		/*wizard.show();*/
	});

</script>
    
<script>
	$(document).ready(function() {
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
		
	    var tt = new $.fn.dataTable.TableTools( table );
		$( tt.fnContainer() ).insertBefore('div.dataTables_wrapper');
		
		var tableFixed = $('#table-example-fixed').dataTable({
			'info': false,
			'pageLength': 50
		});
		
		new $.fn.dataTable.FixedHeader( tableFixed );
	});
	</script>

</body>
</html>