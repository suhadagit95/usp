
<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
    <?php
    foreach($ambil_pengurus->result() as $r);
    $id_pengurus = $r->id_pengurus;
    $periode = $r->periode_pengurus;
	$komisaris_bumdes = $r->komisaris_bumdes;
	$direktur_bumdes = $r->direktur_bumdes;
    $ketua = $r->ketua;
    $tata_usaha = $r->tata_usaha;
    $sak = $r->sak;
    $kasir = $r->kasir;
    $status = $r->status_pengurus;
    ?>
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Pengurus</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Data Master</a></li>
								
								<li class=""><a href="<?php echo base_url();?>tu/pengurus"><span>Data Pengurus</span></a></li>
								<li class="active"><span>Edit Pengurus</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
           <div class="panel panel-default card-view">
                <div class="x_title">
                    <h2>Edit Pengurus</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Pengurus <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtID" name="txtID" required="required" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $id_pengurus;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Periode <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtPeriode" name="txtPeriode" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $periode;?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Komisaris Bumdes<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtKomisarisbumdes" name="txtKomisarisBumdes" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $komisaris_bumdes;?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Direktur bumdes <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtDirekturBumdes" name="txtDirekturBumdes" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $direktur_bumdes;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ketua <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtKetua" name="txtKetua" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $ketua;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tata Usaha <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtTataUsaha" name="txtTataUsaha" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $tata_usaha;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Staff Analis Kredit <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtSak" name="txtSak" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $sak;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kasir <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtKasir" name="txtKasir" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $kasir;?>">
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
                                <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url();?>tu/pengurus'">Cancel</button>
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

