<div id="content-wrapper">
	<?php //echo "<pre>", print_r($this->session), "</pre>";?>
	<div class="row">
		<div class="col-lg-12">
			<div id="content-header" class="clearfix">
				<div class="pull-left">
					<ol class="breadcrumb">						
						<li class="active"><span>Administrator Dashboard</span></li>
					</ol>
					<h1>Dashboard</h1>
				</div>
				<div class="pull-right hidden-xs">
					<div class="xs-graph pull-left">
						<div class="graph-label">
							<b>838</b> Loans
						</div>
						<div class="graph-content spark-orders"></div>
					</div>
					<div class="xs-graph pull-left mrg-l-lg mrg-r-sm">
						<div class="graph-label">
							<b>CFA 12,338</b> In Value
						</div>
						<div class="graph-content spark-revenues"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="main-box small-graph-box emerald-bg">
				<div class="box-button">
					<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
				</div>
				<span class="value">69,600</span>
				<span class="headline">Loans Applied</span>
				<div class="progress">
					<div style="width: 84%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="84" role="progressbar" class="progress-bar">
						<span class="sr-only">84% Complete</span>
					</div>
				</div>
				<span class="subinfo">
					<i class="fa fa-caret-down"></i> 22% less than last week
				</span>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="main-box small-graph-box blue-bg">
				<div class="box-button">
					<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
				</div><span class="value">923</span>
				<span class="headline">In Pending</span>
				<div class="progress">
					<div style="width: 42%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="42" role="progressbar" class="progress-bar">
						<span class="sr-only">42% Complete</span>
					</div>
				</div>
				<span class="subinfo">
					<i class="fa fa-caret-up"></i> 15% higher than last week
				</span>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="main-box small-graph-box red-bg">
				<div class="box-button">
					<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
				</div>
				<span class="value">2,562</span>
				<span class="headline">Approved</span>
				<div class="progress">
					<div style="width: 60%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="60" role="progressbar" class="progress-bar">
						<span class="sr-only">60% Complete</span>
					</div>
				</div>
				<span class="subinfo"><i class="fa fa-caret-up"></i> 10% higher than last week</span>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="main-box small-graph-box purple-bg">
				<div class="box-button">
					<a href="#" class="box-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
				</div>
				<span class="value">1,000</span>
				<span class="headline">Rejected</span>
				<div class="progress">
					<div style="width: 77%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="77" role="progressbar" class="progress-bar">
						<span class="sr-only">77% Complete</span>
					</div>
				</div>
				<span class="subinfo"><i class="fa fa-caret-down"></i> 22% More than last week</span>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-8">
			<div class="main-box">
				<header class="main-box-header clearfix">
					<h2>Statistics in CFA</h2>
					<div class="toolbar">
						<div class="pull-left">
							<div class="btn-group">
								<a href="#" class="btn btn-default btn-xs">Daily</a>
								<a href="#" class="btn btn-default btn-xs active">Monthly</a>
								<a href="#" class="btn btn-default btn-xs">Yearly</a>
							</div>
						</div>
						<div class="pull-right">
							<div class="btn-group">
							  <a aria-expanded="false" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
								Export <i class="fa fa-angle-down"></i>
							  </a>
							  <ul class="dropdown-menu pull-right" role="menu">
								<li><a href="#">Export as PDF</a></li>
								<li><a href="#">Export as CSV</a></li>
								<li><a href="#">Export as PNG</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							  </ul>
							</div>
							<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-cog"></i></a>
						</div>
					</div>
				</header>
				<div class="main-box-body clearfix">
					<div id="hero-area"></div>
				</div>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="main-box feed">
				<header class="main-box-header clearfix">
					<h2 class="pull-left">Total Applications</h2>
				</header>
				<div class="main-box-body clearfix">
					<div id="graph-flot-realtime" style="height: 400px; padding: 0px; position: relative;"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
<div class="col-lg-4">
<div class="main-box feed">
<header class="main-box-header clearfix">
<h2 class="pull-left">Process feed</h2>
</header>
<div class="main-box-body clearfix">
<ul>
<li class="clearfix">
<div class="img">
<img src="img/samples/robert-300.jpg" alt=""/>
</div>
<div class="title">
<a href="#">Robert Downey Jr.</a> asking for more documents.
</div>
<div class="post-time">
Today 5:22 pm
</div>

</li>
<li class="clearfix">
<div class="img">
<img src="img/samples/lima-300.jpg" alt=""/>
</div>
<div class="title">
<a href="#">Adriana Lima</a> sent mail to customer.
</div>
<div class="post-time">
Yesterday 11:38 am
</div>


</li>
<li class="clearfix">
<div class="img">
<img src="img/samples/emma-300.jpg" alt=""/>
</div>
<div class="title">
<a href="#">Emma Watson</a> Risk Analyst suggested possible risk.
</div>
<div class="post-time">
Today 11:59 pm
</div>

</li>
<li class="clearfix">
<div class="img">
<img src="img/samples/ryan-300.jpg" alt=""/>
</div>
<div class="title">
<a href="#">Ryan Gosling</a> Application sent back to branch manager.
</div>
<div class="post-time">
Yesterday 9:43 pm
</div>


</li>
<li class="clearfix">
<div class="img">
<img src="img/samples/kunis-300.jpg" alt=""/>
</div>
<div class="title">
<a href="#">Mila Kunis</a> Risk Analyst suggested possible risk.
</div>
<div class="post-time">
Yesterday 7:50 am
</div>

</li>
<li class="clearfix">
<div class="img">
<img src="img/samples/emma-300.jpg" alt=""/>
</div>
<div class="title">
<a href="#">Emma Watson</a> asking for more documents.
</div>
<div class="post-time">
Today 11:59 pm
</div>

</li>
<li class="clearfix">
<div class="img">
<img src="img/samples/lima-300.jpg" alt=""/>
</div>
<div class="title">
<a href="#">Adriana Lima</a> Application sent back to branch manager.
</div>
<div class="post-time">
Yesterday 11:38 am
</div>


</li>

<li class="clearfix">
<div class="img">
<img src="img/samples/kunis-300.jpg" alt=""/>
</div>
<div class="title">
<a href="#">Mila Kunis</a> Risk Analyst suggested possible risk.
</div>
<div class="post-time">
Yesterday 7:50 am
</div>

</li>

</ul>
</div>
</div>
</div>
<div class="col-lg-8">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2 class="pull-left">Latest Applications</h2>
<div class="filter-block pull-right">
<div class="form-group pull-left">
<input type="text" class="form-control" placeholder="Search...">
<i class="fa fa-search search-icon"></i>
</div>
<a href="#" class="btn btn-primary pull-right">
<i class="fa fa-eye fa-lg"></i> View All Applications
</a>
</div>
</header>
<div class="main-box-body clearfix">
<div class="table-responsive clearfix">
<table class="table table-hover">
<thead>
<tr>
<th><a href="#"><span>Application ID</span></a></th>
<th><a href="#" class="desc"><span>Date</span></a></th>
<th><a href="#" class="asc"><span>Customer</span></a></th>
<th><a href="#" class="asc"><span>Account Number</span></a></th>
<th class="text-center"><span>Status</span></th>
<th class="text-right"><span>Loan Amount</span></th>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<tr>
<td>
<a href="#">#8002</a>
</td>
<td>
2016/01/07
</td>
<td>
<a href="#">Robert De Niro</a>
</td>
<td>
23455467859612365
</td>
<td class="text-center">
<span class="label label-success">Completed</span>
</td>
<td class="text-right">
&dollar; 825.50
</td>
<td class="text-center" style="width: 15%;">
<a href="#" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
<tr>
<td>
<a href="#">#5832</a>
</td>
<td>
2016/01/07
</td>
<td>
<a href="#">John Wayne</a>
</td>
<td>
5478569854123545
</td>
<td class="text-center">
<span class="label label-warning">On hold</span>
</td>
<td class="text-right">
&dollar; 923.93
</td>
<td class="text-center" style="width: 15%;">
<a href="#" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
<tr>
<td>
<a href="#">#2547</a>
</td>
<td>
2016/01/07
</td>
<td>
<a href="#">Anthony Hopkins</a>
</td>
<td>
5465897521354645
</td>
<td class="text-center">
<span class="label label-info">Pending</span>
</td>
<td class="text-right">
&dollar; 1.625.50
</td>
<td class="text-center" style="width: 15%;">
<a href="#" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
<tr>
<td>
<a href="#">#9274</a>
</td>
<td>
2016/01/07
</td>
<td>
<a href="#">Charles Chaplin</a>
</td>
<td>
23454578559612365
</td>
<td class="text-center">
<span class="label label-danger">Cancelled</span>
</td>
<td class="text-right">
&dollar; 35.34
</td>
<td class="text-center" style="width: 15%;">
<a href="#" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
<tr>
<td>
<a href="#">#8463</a>
</td>
<td>
2016/01/07
</td>
<td>
<a href="#">Gary Cooper</a>
</td>
<td>
54785467859615896
</td>
<td class="text-center">
<span class="label label-success">Completed</span>
</td>
<td class="text-right">
&dollar; 34.199.99
</td>
<td class="text-center" style="width: 15%;">
<a href="#" class="table-link">
<span class="fa-stack">
<i class="fa fa-square fa-stack-2x"></i>
<i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
</span>
</a>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
<div class="main-box weather-box">

<div class="main-box-body clearfix" style="margin-top:0px">
<div class="main-box weather-box-large" style="margin-bottom:0">
<div class="main-box-body main-box-no-header clearfix" style="margin-top:0px">
<div class="current" style="min-height:305px">
<h4>Current weather</h4>
<div class="place">
<i class="fa fa-map-marker"></i> New York City
</div>
<div class="temp-out-wrapper clearfix">
<canvas class="icon" id="current-weather" width="100" height="100"></canvas>
<div class="temp-wrapper">
<div class="temperature">
35<span class="sign">°</span>
</div>
<div class="desc">
Sunny day
</div>
</div>
</div>
</div>
</div>
</div>
<div class="next">
<ul class="clearfix">
<li>
<div class="day">
MON
</div>
<div class="icon" title="Hot" data-toggle="tooltip">
<i class="wi wi-hot"></i>
</div>
<div class="temperature">
45<span class="sign">°</span>
</div>
</li>
<li>
<div class="day">
TUE
</div>
<div class="icon" title="Showers" data-toggle="tooltip">
<i class="wi wi-day-showers"></i>
</div>
<div class="temperature">
28<span class="sign">°</span>
</div>
</li>
<li>
<div class="day">
WED
</div>
<div class="icon" title="Cloudy" data-toggle="tooltip">
<i class="wi wi-cloudy-windy"></i>
</div>
<div class="temperature">
16<span class="sign">°</span>
</div>
</li>
<li>
<div class="day">
THU
</div>
<div class="icon" title="Thunderstom" data-toggle="tooltip">
<i class="wi wi-thunderstorm"></i>
</div>
<div class="temperature">
18<span class="sign">°</span>
</div>
</li>
<li>
<div class="day">
FRI
</div>
<div class="icon" title="Lightning" data-toggle="tooltip">
<i class="wi wi-night-alt-lightning"></i>
</div>
<div class="temperature">
22<span class="sign">°</span>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
<div class="main-box clearfix">
<header class="main-box-header clearfix">
<h2>Todo</h2>
</header>
<div class="main-box-body clearfix">
<ul class="widget-todo">
<li class="clearfix">
<div class="name">
<div class="checkbox-nice">
<input type="checkbox" id="todo-1"/>
<label for="todo-1">
New products introduction <span class="label label-danger">High Priority</span>
</label>
</div>
</div>
</li>
<li class="clearfix">
<div class="name">
<div class="checkbox-nice">
<input type="checkbox" id="todo-2"/>
<label for="todo-2">
Checking the stock <span class="label label-success">Low Priority</span>
</label>
</div>
</div>
<div class="actions">
<a href="#" class="table-link">
<i class="fa fa-pencil"></i>
</a>
<a href="#" class="table-link danger">
<i class="fa fa-trash-o"></i>
</a>
</div>
</li>
<li class="clearfix">
<div class="name">
<div class="checkbox-nice">
<input type="checkbox" id="todo-3" checked="checked"/>
<label for="todo-3">
Buying coffee <span class="label label-warning">Medium Priority</span>
</label>
</div>
</div>
<div class="actions">
<a href="#" class="table-link">
<i class="fa fa-pencil"></i>
</a>
<a href="#" class="table-link danger">
<i class="fa fa-trash-o"></i>
</a>
</div>
</li>
<li class="clearfix">
<div class="name">
<div class="checkbox-nice">
<input type="checkbox" id="todo-4"/>
<label for="todo-4">
New marketing campaign <span class="label label-success">Low Priority</span>
</label>
</div>
</div>
</li>
<li class="clearfix">
<div class="name">
<div class="checkbox-nice">
<input type="checkbox" id="todo-5"/>
<label for="todo-5">
Calling Mom <span class="label label-warning">Medium Priority</span>
</label>
</div>
</div>
<div class="actions">
<a href="#" class="table-link badge">
<i class="fa fa-cog"></i>
</a>
</div>
</li>
<li class="clearfix">
<div class="name">
<div class="checkbox-nice">
<input type="checkbox" id="todo-6"/>
<label for="todo-6">
Ryan's birthday <span class="label label-danger">High Priority</span>
</label>
</div>
</div>
</li>
<li class="clearfix">
<div class="name">
<div class="checkbox-nice">
<input type="checkbox" id="todo-4"/>
<label for="todo-4">
New marketing campaign <span class="label label-success">Low Priority</span>
</label>
</div>
</div>
</li>

</ul>
</div>
</div>
</div>
</div>
<footer id="footer-bar" class="row">
<p id="footer-copyright" class="col-xs-12">
Powered by DCP.
</p>
</footer>
</div>
</div>
</div>
</div>

 
<script src="<?php echo base_url('assets/js/demo-skin-changer.js');?>"></script>  
<script src="<?php echo base_url('assets/js/jquery.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nanoscroller.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/demo.js');?>"></script>  

<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.slimscroll.min.js');?>"></script> 
<script src="<?php echo base_url('assets/js/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-jvectormap-1.2.2.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery-jvectormap-world-merc-en.js');?>"></script>
<script src="<?php echo base_url('assets/js/gdp-data.js');?>"></script>
<script src="<?php echo base_url('assets/js/flot/jquery.flot.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/flot/jquery.flot.resize.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/flot/jquery.flot.time.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/flot/jquery.flot.threshold.js');?>"></script>
<script src="<?php echo base_url('assets/js/flot/jquery.flot.axislabels.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.sparkline.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/skycons.js');?>"></script>

<script src="<?php echo base_url('assets/js/raphael-min.js');?>"></script>
<script src="<?php echo base_url('assets/js/morris.js');?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js');?>"></script>
<script src="<?php echo base_url('assets/js/pace.min.js');?>"></script>

<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2017 Q1', iphone: 2666, ipad: null, itouch: 2647},
				{period: '2017 Q2', iphone: 15778, ipad: 13794, itouch: 12041},
				{period: '2017 Q3', iphone: 12912, ipad: 10969, itouch: 9901},
				{period: '2017 Q4', iphone: 8767, ipad: 6597, itouch: 6689},
				{period: '2018 Q1', iphone: 10810, ipad: 10914, itouch: 12293},
				{period: '2018 Q2', iphone: 9670, ipad: 9000, itouch: 7881},
				{period: '2018 Q3', iphone: 4820, ipad: 3795, itouch: 1588},
				{period: '2018 Q4', iphone: 15073, ipad: 8967, itouch: 5175},
				{period: '2019 Q1', iphone: 10687, ipad: 4460, itouch: 2028},
				{period: '2019 Q2', iphone: 8432, ipad: 5713, itouch: 1791}
			],
			lineColors:['#869d9d','#EFC94C','#45B29D'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['Applied CFA', 'Approved CFA', 'Rejected CFA'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
			// graph real time
		if ($('#graph-flot-realtime').length) {
		
			var data = [],
				totalPoints = 300;

			function getRandomData() {

				if (data.length > 0)
					data = data.slice(1);

				// Do a random walk

				while (data.length < totalPoints) {

					var prev = data.length > 0 ? data[data.length - 1] : 50,
						y = prev + Math.random() * 10 - 5;

					if (y < 0) {
						y = 0;
					} else if (y > 100) {
						y = 100;
					}

					data.push(y);
				}

				// Zip the generated y values with the x values

				var res = [];
				for (var i = 0; i < data.length; ++i) {
					res.push([i, data[i]])
				}

				return res;
			}

			// Set up the control widget

			var updateInterval = 30;
			$().val(updateInterval).change(function () {
				var v = $(this).val();
				if (v && !isNaN(+v)) {
					updateInterval = +v;
					if (updateInterval < 1) {
						updateInterval = 1;
					} else if (updateInterval > 2000) {
						updateInterval = 2000;
					}
					$(this).val("" + updateInterval);
				}
			});

			var plot = $.plot("#graph-flot-realtime", [ getRandomData() ], {
				series: {
					lines: { 
						show: true,
						lineWidth: 1,
						fill: true, 
						fillColor: { colors: [ { opacity: 0.5 }, { opacity: 0.5 } ] }
					},
					shadowSize: 0	// Drawing is faster without shadows
				},
				colors: ["#1ABC9C"],
				
				yaxis: {
					min: 0,
					max: 110
				},
				xaxis: {
					show: false
				},
				grid:{borderWidth:1,backgroundColor:"#FFF"}
			});

			function update() {

				plot.setData([getRandomData()]);

				// Since the axes don't change, we don't need to call plot.setupGrid()

				plot.draw();
				setTimeout(update, updateInterval);
			}

			update();
		}
	    
		//WORLD MAP
		$('#world-map').vectorMap({
			map: 'world_merc_en',
			backgroundColor: '#ffffff',
			zoomOnScroll: false,
			regionStyle: {
				initial: {
					fill: '#e1e1e1',
					stroke: 'none',
					"stroke-width": 0,
					"stroke-opacity": 1
				},
				hover: {
					"fill-opacity": 0.8
				},
				selected: {
					fill: '#8dc859'
				},
				selectedHover: {
				}
			},
			markerStyle: {
				initial: {
					fill: '#FF6C60',
					stroke: '#FF6C60'
				}
			},
			markers: [
				{latLng: [38.35, -121.92], name: 'Los Angeles - 23'},
				{latLng: [39.36, -73.12], name: 'New York - 84'},
				{latLng: [50.49, -0.23], name: 'London - 43'},
				{latLng: [36.29, 138.54], name: 'Tokyo - 33'},
				{latLng: [37.02, 114.13], name: 'Beijing - 91'},
				{latLng: [-32.59, 150.21], name: 'Sydney - 22'},
			],
			series: {
				regions: [{
					values: gdpData,
					scale: ['#6fc4fe', '#58DDD0'],
					normalizeFunction: 'polynomial'
				}]
			},
			onRegionLabelShow: function(e, el, code){
				el.html(el.html()+' ('+gdpData[code]+')');
			}
		});

		/* SPARKLINE - graph in header */
		var orderValues = [10,8,5,7,4,4,3,8,0,7,10,6,5,4,3,6,8,9];

		$('.spark-orders').sparkline(orderValues, {
			type: 'bar', 
			barColor: '#7FC8BA',
			height: 25,
			barWidth: 6
		});

		var revenuesValues = [8,3,2,6,4,9,1,10,8,2,5,8,6,9,3,4,2,3,7];

		$('.spark-revenues').sparkline(revenuesValues, {
			type: 'bar', 
			barColor: '#7FC8BA',
			height: 25,
			barWidth: 6
		});

		/* ANIMATED WEATHER */
		var skycons = new Skycons({"color": "#58DDD0"});
		// on Android, a nasty hack is needed: {"resizeClear": true}

		// you can add a canvas by it's ID...
		skycons.add("current-weather", Skycons.SNOW);

		// start animation!
		skycons.play();

		$('.conversation-inner').slimScroll({
	        height: '405px',
	        wheelStep: 35,
	    });
		
		$('.chat-input').keypress(function (ev) {
			var p = ev.which;
			var chatTime = moment().format("MMMM Do YYYY, h:mm a");
			var chatText = $('.chat-input').val();
			if (p == 13) {
				if (chatText == "") {
					alert('Empty Field');
				} else {
					$('<div class="conversation-item item-left clearfix"><div class="conversation-user"><img src="img/samples/ryan.png" alt="male"/></div><div class="conversation-body"><div class="name">Ryan Gossling</div><div class="time hidden-xs">' + chatTime + '</div><div class="text">' + chatText + '</div></div></div>').appendTo('.conversation-inner');
					$(this).val('');
					$('.conversation-inner').scrollTo('100%', '100%', {
					easing: 'swing'
					});
				}
				return false;
				ev.epreventDefault();
				ev.stopPropagation();
			}
		});
		$('.chat-send .btn').click(function () {
			var chatTime = moment().format("MMMM Do YYYY, h:mm a");
			var chatText = $('.chat-input').val();
			if (chatText == "") {
				alert('Empty Field');
				$(".chat-input").focus();
			} else {
				$('<div class="conversation-item item-left clearfix"><div class="conversation-user"><img src="img/samples/ryan.png" alt="male"/></div><div class="conversation-body"><div class="name">Ryan Gossling</div><div class="time hidden-xs">' + chatTime + '</div><div class="text">' + chatText + '</div></div></div>').appendTo('.conversation-inner');
				$('.chat-input').val('');
				$(".chat-input").focus();
				$('.conversation-inner').scrollTo('100%', '100%', {
					easing: 'swing'
				});
			}
			return false;
		});
	});
	</script>
</body>
</html>