			

    <!-- top tiles -->

    <!-- /top tiles -->
<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Agama</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Data Master</a></li>
								
								<li class="active"><span>Data Agama</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="panel panel-default card-view">
            <div class="x_panel">
               <div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Data agama</h6>
								</div>
								<div class="clearfix"></div>
							</div>
                <div class="x_content">
				<div class="table-responsive">
                    <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                        <tr>
                            <th >NO</th>
                            <th >Nama</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $no=1;
                        foreach($hasil->result() as $r){
                        ?>
                        <tr>
                            <td ><?php echo $no++;?></td>
                            <td ><?php echo $r->agama;?></td>

                        </tr>
						
                        <?php
                        }
                        ?>
						
                        </tbody>
                    </table>
					</div>
                </div>
            </div>
        </div>
		</div>

    </div>
  


