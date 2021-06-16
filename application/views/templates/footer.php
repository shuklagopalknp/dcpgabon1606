<footer id="footer-bar" class="row">
			<p id="footer-copyright" class="col-xs-12">Powered by DCP.</p>
		</footer>
</div>
</div>
</div>
</div>

<script src="<?php echo base_url('assets/js/demo-skin-changer.js');?>"></script>  
<script src="<?php echo base_url('assets/js/jquery.nanoscroller.min.js');?>"></script>

<script src="<?php echo base_url('assets/js/demo.js');?>"></script> 
<script src="<?php echo base_url('assets/js/modalEffects.js');?>"></script>
<script src="<?php echo base_url('assets/js/classie.js');?>"></script>
<script src="<?php echo base_url('assets/js/modernizr.custom.js');?>"></script>
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

<script src="<?php echo base_url('assets/js/daterangepicker.js');?>"></script>
<script src="<?php echo base_url();?>assets/js/modernizr.custom.js"></script> 
<script src="<?php echo base_url();?>assets/js/notificationFx.js"></script> 
<script src="<?php echo  base_url(); ?>assets/js/classie.js"></script> 
<script src="<?php echo base_url('assets/js/select2.min.js');?>"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.fixedHeader.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/dataTables.tableTools.js"></script>
<script src="<?php echo  base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>

 <script type="text/javascript">

 	$( ".sorttable_c tbody" ).sortable( {
	update: function( event, ui ) {
    $(this).children().each(function(index) {

    	   $(this).find('.input_order').val(index + 1);
    });
  }
});

 	$( ".sorttable_c1 tbody" ).sortable( {
	update: function( event, ui ) {
    $(this).children().each(function(index) {
    	
			$(this).find('.show_c').html(index + 1);
			$(this).find('.input_order').val(index + 1);

    });
  }
});
	

 	
</script>
</body>
</html>