<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Sistem UED - <?php echo $title;?></title>
	<meta name="description" content="Philbert is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Philbert Admin, Philbertadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>
	
	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<?php
                               foreach($ambil_profil_usp->result() as $pusp); 
                        ?>
	<link rel="icon" href="<?php echo base_url();?>images/logo/<?php echo $pusp->logo;?><?php //echo $usp->logo;?>" type="image/ico" />
	
	
	<!-- Morris Charts CSS -->
    <link href="<?php echo base_url();?>asset_v2/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	
	<!-- Data table CSS -->
	<link href="<?php echo base_url();?>asset_v2/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
	
	<link href="<?php echo base_url();?>asset_v2/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>asset_v2/dist/css/style.css" rel="stylesheet" type="text/css">
	
   <!--batas assets baru -->
	<script src="<?php echo base_url();?>asset_v2/vendors/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>asset_v2/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
</head>


