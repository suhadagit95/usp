<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<title>FORM LOGIN USP</title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content=""/>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="icon" href="<?php echo base_url();?>images/logo.png" type="image/x-icon">
		 <!-- Bootstrap -->
    <link href="<?php echo base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url();?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url();?>assets/vendors/animate.css/animate.min.css" rel="stylesheet">

	
	
    <!-- Custom Theme Style -->
    <link href="<?php echo base_url();?>assets/build/css/custom.min.css" rel="stylesheet">
		<!-- vector map CSS -->
		<link href="<?php echo base_url();?>asset_v2/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css"/>
		
		
		
		<!-- Custom CSS -->
		<link href="<?php echo base_url();?>asset_v2/dist/css/style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<!--Preloader-->
		<div class="preloader-it">
			<div class="la-anim-1"></div>
		</div>
		<!--/Preloader-->

									
										
							
						
		<div class="wrapper pa-0">
			<header class="sp-header">
				<div class="sp-logo-wrap pull-left">
					
				</div>
				<div class="form-group mb-0 pull-right">
				</div>
				<div class="clearfix"></div>
			</header>
			
			<!-- Main Content -->
			<div class="page-wrapper pa-0 ma-0 auth-page">
				<div class="container-fluid">
					<!-- Row -->
					<div class="table-struct full-width full-height">
						<div class="table-cell vertical-align-middle auth-form-wrap">
							<div class="auth-form  ml-auto mr-auto no-float">
								<div class="row">
									<div class="col-sm-12 col-xs-12">
									
											<div class="portfolio-wrap project-gallery col-sm-4 col-xs-4">
												
														<img class="img-responsive" style="center" src="<?php echo base_url();?>/images/logo/logo.png"  alt="Image description" />
																								
											</div>
										
										<div class="mb-30">
											<h3 class="text-left txt-dark mb-10">Sign in to USP</h3>
											<h6 class="text-left nonecase-font txt-grey">Enter your details below</h6>
										</div>	
										<div class="form-wrap">
											<form class="form-horizontal form-label-left" action="<?php echo base_url()."id/log_in"; ?>" method="post" enctype="multipart/form-data">
											
				<input type="hidden" class="form-control" placeholder="" value="pemanfaat"required="" name="cmbLevel" />
												<div class="form-group">
													<label class="control-label mb-10" for="exampleInputEmail_2">Username</label>
													<input type="text" class="form-control" placeholder="Username" required="" name="username" />
												</div>
												<div class="form-group">
													<label class="pull-left control-label mb-10" for="exampleInputpwd_2">Password</label>
													
													<div class="clearfix"></div>
													<input type="password" class="form-control" placeholder="Password" required="" name="password" />
												</div>
												
												<div class="form-group">
													<div class="checkbox checkbox-primary pr-10 pull-left">
														<input id="checkbox_2" type="checkbox">
														<label for="checkbox_2"> Keep me logged in</label>
													</div>
													<div class="clearfix"></div>
												</div>
												<div class="form-group text-center">
													<button type="submit" class="btn btn-info btn-success btn-rounded">sign in</button>
												</div>
											</form>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->	
				</div>
				
			</div>
			<!-- /Main Content -->
		
		</div>
		
          <?php
          if($error!=NULL) {
              ?>
              <div id="myModal" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md">
                      <div class="modal-content">

                          <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel2">LOGIN</h4>
                          </div>
                          <div class="modal-body">
                              <p>Username dan Password yang Anda Masukkan Salah</p>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-default"
                                      onclick="window.location.href='<?php echo base_url()."id/"; ?>'">
                                  KEMBALI
                              </button>
                          </div>

                      </div>
                  </div>
              </div>
          <?php
          }
          ?>

		<!-- /#wrapper -->
		
		<!-- JavaScript -->
		
		<!-- jQuery -->
		<script src="<?php echo base_url();?>asset_v2/vendors/bower_components/jquery/dist/jquery.min.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url();?>asset_v2/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>asset_v2/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url();?>asset_v2/dist/js/jquery.slimscroll.js"></script>
		
		<!-- Init JavaScript -->
		<script src="<?php echo base_url();?>asset_v2/dist/js/init.js"></script>
		
          <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
          <!-- Bootstrap -->
          <script src="<?php echo base_url();?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
          <!-- FastClick -->
          <script src="<?php echo base_url();?>assets/vendors/fastclick/lib/fastclick.js"></script>
   <script type="text/javascript">

            <?php
            if($error!=NULL){
            ?>
            $(window).on('load',function(){
                $('#myModal').modal('show');
            });
            <?php
            }
            ?>

        </script>
	</body>
</html>
