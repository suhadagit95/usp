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
    foreach($ambil_agunan->result() as $r);
    $id_pinjaman = $r->id_pinjaman;
    $jumlah_pinjam = $r->jumlah_pinjaman;
    $jangka_waktu = $r->jangka_waktu;
    $sistem_angsuran = $r->sistem_angsuran;
    $jumlah_jasa = $r->jumlah_jasa;
    $jenis_agunan = $r->jenis_agunan;
    $no_surat_agunan = $r->no_surat_agunan;
    $alamat_agunan = $r->alamat_agunan;
    $peta_lokasi_agunan  = $r->peta_lokasi_agunan;
    $foto_agunan  = $r->foto_agunan;
    $foto_surat_agunan  = $r->foto_surat_agunan;
    $nama_pemilik  = $r->nama_pemilik;
    $tempat_lahir_pemilik  = $r->tempat_lahir_pemilik;
    $tanggal_lahir_pemilik  = $r->tanggal_lahir_pemilik;
    $pekerjaan_pemilik  = $r->pekerjaan_pemilik;
    $alamat_pemilik  = $r->alamat_pemilik;

    $tglLahir = getTgl($tanggal_lahir_pemilik);
    $blnLahir = getBln($tanggal_lahir_pemilik);
    $thnLahir = getThn($tanggal_lahir_pemilik);

    ?>
    <div class="row">
        <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">


                <div class="x_title">
                    <h2>Data Agunan</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jenis Agunan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtJenisAgunan" name="txtJenisAgunan" required="required" class="form-control col-md-7 col-xs-12"
                                   value="<?php echo $jenis_agunan;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nomor Surat Agunan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtNoAgunan" name="txtNoAgunan" required="required" class="form-control col-md-7 col-xs-12"
                                value="<?php echo $no_surat_agunan;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat Agunan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="txtAlamatAgunan" name="txtAlamatAgunan" required="required" class="form-control col-md-7 col-xs-12"><?php echo $alamat_agunan;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Foto Peta Lokasi Agunan</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../../../images/peta agunan/<?php echo $peta_lokasi_agunan;?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                            <span class="btn btn-file btn-primary">
                                                <span class="fileupload-new">Select image</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" name="fileFotoPetaAgunan" id="fileFotoPetaAgunan" onchange="ValidateSingleInput(this);"  />
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
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../../../images/agunan/<?php echo $foto_agunan;?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                            <span class="btn btn-file btn-primary">
                                                <span class="fileupload-new">Select image</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" name="fileFotoAgunan" id="fileFotoAgunan" onchange="ValidateSingleInput(this);"  />
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
                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="../../../images/surat agunan/<?php echo $foto_surat_agunan;?>" alt="" /></div>
                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                <div>
                                            <span class="btn btn-file btn-primary">
                                                <span class="fileupload-new">Select image</span>
                                                <span class="fileupload-exists">Change</span>
                                                <input type="file" name="fileFotoSuratAgunan" id="fileFotoSuratAgunan" onchange="ValidateSingleInput(this);"  />
                                            </span>
                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="x_title">
                    <h2>Data Pemilik Agunan</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Pemilik Agunan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtNamaPemilik" name="txtNamaPemilik" required="required" class="form-control col-md-7 col-xs-12"
                                value="<?php echo $nama_pemilik;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tempat Lahir Pemilik Agunan <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtTempatLahirPemilik" name="txtTempatLahirPemilik" required="required" class="form-control col-md-7 col-xs-12"
                                value="<?php echo $tempat_lahir_pemilik;?>">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Pekerjaan Pemilik Agunan<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="txtPekerjaanPemilikAgunan" name="txtPekerjaanPemilikAgunan" required="required" class="form-control col-md-7 col-xs-12"
                                value="<?php echo $pekerjaan_pemilik;?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea id="txtAlamat" name="txtAlamat" required="required" class="form-control col-md-7 col-xs-12"><?php echo $alamat_pemilik;?></textarea>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url();?>tu/pinjaman/<?php echo hilang_karakter(base64_encode($r->id_pemanfaat));?>'">Batal</button>
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





        var originalVal = $.fn.val;

        $.fn.val = function(value) {
            if (typeof value == 'undefined') {
                return originalVal.call(this);
            } else {
                setTimeout(function() {
                    this.trigger('mask.maskMoney');
                }.bind(this), 100);
                return originalVal.call(this, value);
            }
        };


        $("#txtJumlahPinjaman").maskMoney({prefix:'', allowNegative: false, thousands:'.',precision:0, decimal:',', affixesStay: true});
        $('#txtJumlahPinjaman').on('click mousedown mouseup focus blur keydown change input', function(event) {
            console.log('This Happened:'+ event.type);
        });
        $('#txtJumlahPinjaman').val(<?php echo $jumlah_pinjam;?>);


        $("#txtJumlahJasa").maskMoney({prefix:'', allowNegative: false, thousands:'.',precision:0, decimal:',', affixesStay: true});
        $('#txtJumlahJasa').on('click mousedown mouseup focus blur keydown change input', function(event) {
            console.log('This Happened:'+ event.type);
        });
        $('#txtJumlahJasa').val(<?php echo $jumlah_jasa;?>);


</script>



