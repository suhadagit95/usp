<script>


    var _validFileExtensions = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];
    function ValidateSingleInput(oInput) {
        if (oInput.type == "file") {
            var sFileName = oInput.value;
            if (sFileName.length > 0) {
                var blnValid = false;
                for (var j = 0; j < _validFileExtensions.length; j++) {
                    var sCurExtension = _validFileExtensions[j];
                    if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                        blnValid = true;
                        break;
                    }
                }

                if (!blnValid) {
                    alert("Maaf, " + sFileName + " bukan gambar, tipe gambar yang diperbolehkan adalah: " + _validFileExtensions.join(", "));
                    oInput.value = '';
                }
            }
        }
    }
</script>
<div class="right_col" role="main">
    <!-- top tiles -->
    <?php
    foreach($ambil_pemanfaat->result() as $r);
    $idPemanfaat = $r->id_pemanfaat;
    $namaPemanfaat = $r->nama_pemanfaat;
    $tempatLahirPemanfaat = $r->tempat_lahir_pemanfaat;
    $tglLahirPemanfaat = $r->tgl_lahir_pemanfaat;
    $alamatPemanfaat = $r->alamat_pemanfaat;
    $statusPemanfaat = $r->status_pemanfaat;
    $agamaPemanfaat = $r->id_agama;
    $pekerjaanPemanfaat = $r->pekerjaan_pemanfaat;
	$NoHp = $r->no_hp;
    $fotoPemanfaat = $r->foto_pemanfaat;
	$JK = $r->jenis_kelamin;

    $tglLahir = getTgl($tglLahirPemanfaat);
    $blnLahir = getBln($tglLahirPemanfaat);
    $thnLahir = getThn($tglLahirPemanfaat);

    ?>
    <!-- /top tiles -->
    <?php

    ?>
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Pemanfaat</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
							
								<li class=""><a href="<?php echo base_url();?>tu/pemanfaat"><span>Data Pemanfaat</span></a></li>
								<li class="active"><span>Edit Pemanfaat</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-body card-view">
                <div class="panel-body">
                    <h2>Edit Data Pemanfaat</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Pemanfaat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtID" name="txtID" required="required" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $idPemanfaat;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Pemanfaat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtNama" name="txtNama" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $namaPemanfaat;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tempat Lahir <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtTempatLahir" name="txtTempatLahir" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $tempatLahirPemanfaat;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Tanggal Lahir <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cmbTgl" name="cmbTgl" required="required" class="form-control" style="width: 20%; display: inline-block;">
                                    <option value="">Tanggal</option>
                                    <?php
                                    for($i=1;$i<=31;$i++) {
                                        ?>
                                        <option value="<?php echo $i;?>"  <?php if($i==$tglLahir) echo "Selected = 'Selected'";?>><?php echo $i;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <select id="cmbBln" name="cmbBln" required="required" class="form-control" style="width: 20%; display: inline-block;">
                                    <option value="">Bulan <?php echo $blnLahir;?></option>
                                    <?php
                                    for($a=1;$a<=12;$a++) {
                                        ?>
                                        <option value="<?php echo $a;?>" <?php if($a==$blnLahir) echo "Selected = 'Selected'";?>><?php echo getBulan($a);?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                <select id="cmbThn" name="cmbThn" required="required" class="form-control" style="width: 20%; display: inline-block;">
                                    <option value="">Tahun</option>
                                    <?php
                                    for($b=date('Y');$b>=1960;$b--) {
                                        ?>
                                        <option value="<?php echo $b;?>" <?php if($b==$thnLahir) echo "Selected";?>><?php echo $b;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Kelamin <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="tctJK" name="txtJK" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="">-Pilih Jenis Kelamin-</option>
                                    <option value="Laki-laki" <?php if($JK=="Laki-laki") echo "Selected = 'Selected'";?>>Laki-laki</option>
                                    <option value="Perempuan" <?php if($JK=="Perempuan") echo "Selected = 'Selected'";?>>Perempuan</option>
                                    <option value="Lain nya" <?php if($JK=="Lain nya") echo "Selected = 'Selected'";?>>Lain nya</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea id="txtAlamat" name="txtAlamat" required="required" class="form-control col-md-7 col-xs-12"><?php echo $alamatPemanfaat;?></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cmbStatus" name="cmbStatus" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="">-Pilih Status-</option>
                                    <option value="Lajang" <?php if($statusPemanfaat=="Lajang") echo "Selected = 'Selected'";?>>Lajang</option>
                                    <option value="Menikah" <?php if($statusPemanfaat=="Menikah") echo "Selected = 'Selected'";?>>Menikah</option>
                                    <option value="Duda / Janda" <?php if($statusPemanfaat=="Duda / Janda") echo "Selected = 'Selected'";?>>Duda / Janda</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Agama <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cmbAgama" name="cmbAgama" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="">-Pilih Agama-</option>
                                    <?php
                                    foreach($ambil_agama->result() as $agama) {
                                        ?>
                                        <option value="<?php echo $agama->id_agama;?>" <?php if($agamaPemanfaat==$agama->id_agama) echo "Selected = 'Selected'";?>><?php echo $agama->agama;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pekerjaan <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtPekerjaan" name="txtPekerjaan" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $pekerjaanPemanfaat;?>">
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No HP<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtPekerjaan" name="txtNoHp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $NoHp;?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Pemanfaat</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>images/pemanfaat/<?php echo $fotoPemanfaat;?>" alt="" /></div>
                                    <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-file btn-primary">
                                            <span class="fileupload-new">Select image</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" name="fileFotoPemanfaat" id="fileFotoPemanfaat" onchange="ValidateSingleInput(this);"  />
                                        </span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url();?>tu/pemanfaat'">Batal</button>
                                <button type="submit" name="btnSimpan" class="btn btn-success">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>
    <br />


</div>

