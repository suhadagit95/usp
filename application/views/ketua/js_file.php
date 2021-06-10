<!-- assets baru -->
  <!-- jQuery -->
    
	<!-- Data table JavaScript -->
	<script src="<?php echo base_url();?>asset_v2/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url();?>asset_v2/dist/js/dataTables-data.js"></script>
	
	<!-- Slimscroll JavaScript -->
	<script src="<?php echo base_url();?>asset_v2/dist/js/jquery.slimscroll.js"></script>
	
	<!-- Owl JavaScript -->
	<script src="<?php echo base_url();?>asset_v2/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
	
	<!-- Switchery JavaScript -->
	<script src="<?php echo base_url();?>asset_v2/vendors/bower_components/switchery/dist/switchery.min.js"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="<?php echo base_url();?>asset_v2/dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Init JavaScript -->
	<script src="<?php echo base_url();?>asset_v2/dist/js/init.js"></script>
	
	

<script type="text/javascript">

    <?php
    if($status!=""){
    ?>
    $(window).on('load',function(){
        $('#myModal').modal('show');
    });
    <?php
    }
    ?>

</script>