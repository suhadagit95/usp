
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
    foreach($ambil_usp->result() as $r);
    $id_profil = $r->id_profil;
   
    $nama_desa = $r->nama_desa;
    $bum_desa = $r->bum_desa;
	$nama_usp = $r->nama_usp_surat;
	$alamat_usp = $r->alamat_usp;
	$aktif = $r->aktif;
    $foto = $r->logo;
    if($foto=="-"){
        $fotoLogo = base_url()."assets/images/demoUpload.jpg";
    }else{
        $fotoLogo =  base_url()."images/logo/".$foto;
    }
    ?>
	
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Profil USP</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Data Master</a></li>
								
								<li class=""><a href="<?php echo base_url();?>tu/profil_usp"><span>Profil USP</span></a></li>
								<li class="active"><span>Edit Profil USP</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="x_title">
                    <h2>Edit Profil USP</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtID" name="txtID" required="required" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $id_profil;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Desa <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtNamaDesa" name="txtNamaDesa" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama_desa;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama BUM-Desa<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtNamaBumdes" name="txtNamaBumdes" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $bum_desa;?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama USP<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtNamaUsp" name="txtNamaUsp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $nama_usp;?>">
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Alamat USP<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtAlamatUsp" name="txtAlamatUsp" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $alamat_usp;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>

                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img
                                            src="<?php echo $fotoLogo;?>" alt=""/>
                                    </div>
                                    <div class="fileupload-preview fileupload-exists thumbnail"
                                         style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                    <div>
                                        <span class="btn btn-file btn-primary">
                                            <span class="fileupload-new">Select image</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" name="fileFoto" id="fileFotoPemanfaat" onchange="ValidateSingleInput(this);" />
                                        </span>
                                        <a href="#" class="btn btn-danger fileupload-exists"
                                           data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="cmbStatus" name="cmbStatus" required="required" class="form-control" style="width: 20%; display: inline-block;">
                                    <option value="">Status</option>
                                    <option value="Ya" <?php if($aktif == "Ya") echo "Selected";?>>Aktif</option>
                                    <option value="Tidak" <?php if($aktif == "Tidak") echo "Selected";?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <input type="hidden" value="<?php echo $foto;?>" name="fotoLama">
                                <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url();?>tu/profil_usp'">Batal</button>
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

