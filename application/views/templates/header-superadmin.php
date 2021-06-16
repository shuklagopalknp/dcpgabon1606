<!DOCTYPE html>
	<html>
	<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<title><?php echo $title; ?></title> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap/bootstrap.min.css');?>"/> 
	<script src="<?php echo base_url('assets/js/demo-rtl.js');?>"></script> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/font-awesome.css');?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/nanoscroller.css');?>"/> 

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/compiled/theme_styles.css');?>"/> 
	<link rel="stylesheet" href="<?php echo base_url('assets/css/libs/daterangepicker.css" type="text/css');?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/libs/jquery-jvectormap-1.2.2.css');?>" type="text/css"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/libs/weather-icons.css" type="text/css');?>"/>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/libs/morris.css" type="text/css');?>"/>
	 <link rel="stylesheet" href="<?php echo base_url('assets/css/libs/datepicker.css');?>" type="text/css"/> 

	<link rel="stylesheet" href="<?php echo base_url('assets/css/libs/jquery-ui.css');?>" type="text/css"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/bootstrap-wizard.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/libs/select2.css" type="text/css');?>"/>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/dataTables.fixedHeader.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/dataTables.tableTools.css');?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/ns-default.css');?>"/>
    
     <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/libs/ns-style-bar.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/libs/ns-style-attached.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/libs/ns-style-other.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/libs/ns-style-theme.css"/>


    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/libs/timeline.css');?>">

	<link type="image/x-icon" href="<?php echo base_url('assets/favicon.png');?>" rel="shortcut icon"/> 
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300' rel='stylesheet' type='text/css'>

	
<!-- <link rel="stylesheet" href="<?php echo base_url()."assets/intl-tel-input-master/build/css/demo.css"?>"> -->

<link rel="stylesheet" href="<?php echo base_url()."assets/intl-tel-input-master/css/prism.css" ?>">
<link rel="stylesheet" href="<?php echo base_url()."assets/intl-tel-input-master/build/css/intlTelInput.css"?>" >
<link rel="stylesheet" href="<?php echo base_url()."assets/intl-tel-input-master/examples/css/isValidNumber.css"?>">

	<!--[if lt IE 9]>
		<script src="<?php echo base_url('assets/js/html5shiv.js');?>"></script>
		<script src="<?php echo base_url('assets/js/respond.min.js');?>"></script>
	<![endif]-->
<?php if($page =="PP Loan" || $page =="cd Loan" || $page !="dc Loan"):?>

	<style>
 .scrollable {
        height: 500px;
        overflow-y: scroll;
 }
 
 .breadcrumb
{
	    padding: 0px 8px !important;
		margin-top: 8px;
}

.customer-info .form-group label
{
	color:#fff;
	font-weight:600;
}


.panel-body.loan-details-header{padding:0 0px 0}.loan-details-header .dl-horizontal{}.loan-details-header dl{margin-bottom:0;margin-top:0}.action-panel button{margin-top:0}.loan-details-header hr{display:none}.action-panel .loan-buttons{float:left;background-color:#787c85;margin-left:0px;padding:7px;position:relative}.action-panel .pull-right{margin-right:0px;padding:10px}.action-panel .pull-right .dropdown-menu{right:0;left:auto}.action-panel .loan-buttons:after{position:absolute;content:"";width:0;height:0;line-height:0;border:20px solid rgba(12,11,11,0);border-left:15px solid #787c85;border-top:30px solid #787c85;right:-35px;bottom:0}@media all and (max-width:1024px){.action-panel .loan-buttons{display:block;float:none;margin-right:0px}.action-panel .loan-buttons:after{display:none}}.action-panel .loan-buttons button,.action-panel button{font-size:1.5rem;height:2em!important;border:0;line-height:1;padding:5px 10px}.action-panel .loan-buttons button.btn-default{font-size:1.5rem;border:0;background-color:#fff;color:#000}.action-panel .loan-buttons button.btn-default:hover{background-color:#eceef1}.action-panel .nextstep-buttons{float:left;margin:10px;margin-left:45px}@media(max-width:1024px){.action-panel .nextstep-buttons{float:left;margin:10px -5px;padding:0}.action-panel .btn,.action-panel .btn-group{margin-bottom:0}.action-panel .btn-group{padding:0}}.action-panel .nextstep-buttons .btn{color:#fff;font-size:1.5rem;height:32px;border:0;background-image:none}.action-panel .nextstep-buttons .btn.btn-default{background-color:#787c85}.action-panel .nextstep-buttons .btn i{margin:0 3px}.action-panel .btn.toapprove{background-color:#357ebd}.action-panel .btn.toapprove:hover,.action-panel .btn.toapprove:active,.action-panel .btn.toapprove:focus{background-color:#3276b1}.action-panel .btn.approval{background-color:#5cb85c}.action-panel .btn.approval:hover,.action-panel .btn.approval:active,.action-panel .btn.approval:focus{background-color:#469f46}.action-panel .btn.confirm{background-color:#469f46}.action-panel .btn.reject{background-color:#d2322d}.action-panel .btn.reject:hover,.action-panel .btn.reject:focus,.action-panel .action-panel .btn.reject:active{background-color:#bd1e1e}.action-panel .btn.payment{background-color:#5cb85c}.action-panel .btn.payment:hover,.action-panel .btn.payment:active,.action-panel .btn.payment:focus{background-color:#469f46}.action-panel .btn.writeoff{background:#d2322d}.action-panel .btn.writeoff:hover,.action-panel .btn.writeoff:focus,.action-panel .action-panel .btn.writeoff:active{background-color:#bd1e1e}

.dl-horizontal dt
{
	width:auto;
	text-align:left;
}
.el-field
{
	padding: 10px 10px 5px 10px;
}

.bg-header {
    background-color: #787c85 !important;
    color: #fff;
}



.switch {
  position: relative;
  display: inline-block;
  width: 50px;
  height: 20px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 15px;
  width: 15px;
  left: 4px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

.help-block{
  color: #dd191d;
}
</style>
<?php endif;?>
<script src="<?php echo  base_url(); ?>assets/js/jquery.js"></script>
  <script>


    
  var inactivityTime = function () {
	//	alert();
    var time;
   // console.log(time);
   // window.onload = resetTimer;
    // DOM Events
    document.onmousemove = resetTimer;
    document.onkeypress = resetTimer;
    document.onload = resetTimer;
	document.onmousemove = resetTimer;
	document.onmousedown = resetTimer; // touchscreen presses
	document.ontouchstart = resetTimer;
	document.onclick = resetTimer;     // touchpad clicks
	document.onkeypress = resetTimer;
	document.addEventListener('scroll', resetTimer, true); // improved; see comments
	window.onmousemove = resetTimer; // catches mouse movements
    window.onmousedown = resetTimer; // catches mouse movements
    window.onclick = resetTimer;     // catches mouse clicks
    window.onscroll = resetTimer;    // catches scrolling
    window.onkeypress = resetTimer;  //catches keyboard actions

    function logout() {
        //alert("Vous êtes maintenant déconnecté.")
        location.href = "<?php echo base_url('Auth/logout');?>";
    }

    function resetTimer() {
    	//console.log("d");
        clearTimeout(time);
        time = setTimeout(logout, 900000);
        // 1000 milliseconds = 1 second
    }
};

window.onload = function() {
  inactivityTime(); 
}
</script>