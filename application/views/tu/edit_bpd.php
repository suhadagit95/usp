
<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
    <?php
    foreach($ambil_bpd->result() as $r);
    $id_bpd = $r->id_bpd;
    $periode = $r->periode_bpd;
    $nama_bpd = $r->nama_bpd;
    $status = $r->status_bpd;
    ?>
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data BPD</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Data Master</a></li>
								
								<li class=""><a href="<?php echo base_url();?>tu/bpd"><span>BPD</span></a></li>
								<li class="active"><span>Edit BPD</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="x_title">
                    <h2>Edit Badan Permusyawaratan Desa</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Kepala Desa <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtID" name="txtID" required="required" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $id_bpd;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Periode <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtPeriodeBpd" name="txtPeriodeBpd" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $periode;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Kepala Desa <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtNamaBpd" name="txtNamaBpd" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama_bpd;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cmbStatus" name="cmbStatus" required="required" class="form-control" style="width: 20%; display: inline-block;">
                                    <option value="">Status</option>
                                    <option value="Aktif" <?php if($status == "Aktif") echo "Selected";?>>Aktif</option>
                                    <option value="Tidak Aktif" <?php if($status == "Tidak Aktif") echo "Selected";?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url();?>tu/bpd'">Cancel</button>
                                <button type="submit" name="btnSimpan" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <br />


</div>

