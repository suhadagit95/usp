<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Pendes</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Data Master</a></li>
								
								<li class="active"><span>Data Pendes</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                  <div class="panel-heading">
								<div class="pull-left">
									<h6 class="panel-title txt-dark">Data Pendamping Desa</h6>
								</div>
								<div class="clearfix"></div>
							</div>
                <div class="x_content">
				<div class="table-responsive">
                    <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                        <tr>
                            <th style="width:7%; text-align: center;">NO</th>
                            <th style="width:21%; text-align: center;">Periode</th>
                            <th style="width:52%; text-align: center;">Nama Pendamping Desa</th>
                            <th style="width:10%; text-align: center;">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $no=1;
                        foreach($hasil->result() as $r){
                        ?>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;"><?php echo $no++;?></td>
                            <td style="vertical-align: middle; text-align: center;"><?php echo $r->periode_pendamping_desa;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->nama_pendamping_desa;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->status_pendamping_desa;?></td>

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
