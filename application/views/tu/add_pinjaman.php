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
                    alert("Maaf, " + sFileName + " bukan gambar, file harus gambar. tipe gambar yang diperbolehkan adalah: " + _validFileExtensions.join(", "));
                    oInput.value = '';
                }
            }
        }
    }
</script>
<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
    <?php
    $id = base_convert(microtime(false), 10, 32);
    ?>
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Pemanfaat</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
							
								<li class=""><a href="<?php echo base_url();?>tu/pemanfaat"><span>Data Pemanfaat</span></a></li>
								<li class="active"><span>Tambah Pinjaman</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="panel-body">
                    <h2>Data Pinjaman</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Pinjaman <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" id="txtIDPinjaman" name="txtIDPinjaman" required="required" class="form-control col-md-3 col-xs-4" readonly value="PJ<?php echo strtoupper($id);?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Pinjaman <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">Rp.</span>
                                    <input type="text" id="txtJumlahPinjaman" name="txtJumlahPinjaman" required="required" class="form-control col-md-7 col-xs-12" onkeyup="return jasa()" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jangka Waktu Pinjaman<span class="required">*</span>
                            </label>
                            <div class="col-sm-2 col-sm-2 col-xs-2">
                                <div class="input-prepend input-group">
                                    <input type="text" id="txtJangkaWaktuPinjaman" name="txtJangkaWaktuPinjaman" required="required" class="form-control col-md-7 col-xs-12" onkeyup="return jasa()">
                                    <span class="add-on input-group-addon">Bulan</span>
                                </div>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistem Angsuran<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtSistemAngsuran" name="txtSistemAngsuran" required="required" class="form-control col-md-7 col-xs-12" style="width: 20%;" readonly value="Kredit">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah jasa<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">Rp.</span>
                                    <input type="text" id="txtJumlahJasa" readonly name="txtJumlahJasa" required="required" class="form-control col-md-7 col-xs-12">
									<span class="add-on input-group-addon">Per Bulan</span>
									
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Total Jumlah jasa<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">Rp.</span>
                                    <input type="text" id="txtJumlahJasa2" readonly name="txtJumlahJasa2" required="required" class="form-control col-md-10 col-xs-12">
									<span class="add-on input-group-addon">Total</span>
									
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">No Rek Bank<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtNamaUsaha" name="txtNorekbank" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Usaha <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtNamaUsaha" name="txtNamaUsaha" required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>





                </div>
                <div class="panle-body">
                    <h2>Data Agunan</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Agunan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtJenisAgunan" name="txtJenisAgunan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Surat Agunan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtNoAgunan" name="txtNoAgunan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Agunan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="txtAlamatAgunan" name="txtAlamatAgunan" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Peta Lokasi Agunan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>assets/images/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                            <span class="btn btn-file btn-primary">
                                                <span class="fileupload-new">Select image</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" name="fileFotoPetaAgunan" id="fileFotoPetaAgunan" onchange="ValidateSingleInput(this);"  required />
                                            </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto  Agunan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>assets/images/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                            <span class="btn btn-file btn-primary">
                                                <span class="fileupload-new">Select image</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" name="fileFotoAgunan" id="fileFotoAgunan" onchange="ValidateSingleInput(this);"  required />
                                            </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Surat  Agunan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="<?php echo base_url();?>assets/images/demoUpload.jpg" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                            <span class="btn btn-file btn-primary">
                                                <span class="fileupload-new">Select image</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" name="fileFotoSuratAgunan" id="fileFotoSuratAgunan" onchange="ValidateSingleInput(this);"  required />
                                            </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <h2>Data Pemilik Agunan</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Pemilik Agunan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtNamaPemilik" name="txtNamaPemilik" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tempat Lahir Pemilik Agunan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtTempatLahirPemilik" name="txtTempatLahirPemilik" required="required" class="form-control col-md-7 col-xs-12">
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
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select id="cmbBln" name="cmbBln" required="required" class="form-control" style="width: 20%; display: inline-block;">
                                <option value="">Bulan</option>
                                <?php
                                for($a=1;$a<=12;$a++) {
                                    ?>
                                    <option value="<?php echo $a;?>"><?php echo getBulan($a);?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <select id="cmbThn" name="cmbThn" required="required" class="form-control" style="width: 20%; display: inline-block;">
                                <option value="">Tahun</option>
                                <?php
                                for($b=date('Y');$b>=1960;$b--) {
                                    ?>
                                    <option value="<?php echo $b;?>"><?php echo $b;?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pekerjaan Pemilik Agunan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtPekerjaanPemilikAgunan" name="txtPekerjaanPemilikAgunan" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="txtAlamat" name="txtAlamat" required="required" class="form-control col-md-7 col-xs-12"></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url()."tu/".$target_kembali;?>'">Batal</button>
                            <button type="submit" name="btnSimpan" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </form>

    </div>
    <br />


</div>
<script>

        //$("#txtJumlahPinjaman").maskMoney({prefix:'', allowNegative: false, thousands:'.',precision:0, decimal:',', affixesStay: true});
        //$("#txtJumlahJasa").maskMoney({prefix:'', allowNegative: false, thousands:'.',precision:0, decimal:',', affixesStay: true});
        function jasa(){
            var jumlahPinjaman = $("#txtJumlahPinjaman").val();
            jumlahPinjaman2 = jumlahPinjaman.replace('.','');
            var jangkaWaktu = $("#txtJangkaWaktuPinjaman").val();
			var perbulan =(jumlahPinjaman * 0.8)/100;
			var jasa =(jumlahPinjaman*0.8)/100;
			var jasa2 = (jasa*jangkaWaktu);
			//var jasa = (jumlahPinjaman/jangkaWaktu)*0.8;
            //var jasa = (jangkaWaktu/100)*jumlahPinjaman;
			//var jasa = (jumlahPinjaman/jangkaWaktu);
			
            $("#txtJumlahJasa").val(jasa);
			$("#txtJumlahJasa2").val(jasa2);
        }


</script>



