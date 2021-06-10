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
    foreach($ambil_user_pemanfaat->result() as $r);
    $id_user = $r->id_user;
    $username = $r->username;
	$id_pemanfaat = $r->id_pemanfaat;
	error_reporting(0);
	


    ?>
    <!-- /top tiles -->
    <?php

    ?>
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data User Pemanfaat</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Dasbord</a></li>
								
								<li class=""><a href="<?php echo base_url();?>tu/user_pemanfaat"><span>User Pemanfaat</span></a></li>
								<li class="active"><span>Edit User Pemanfaat</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="x_title">
                    <h2>Edit User Pemanfaat</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID User <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtID" name="txtID" required="required" class="form-control col-md-7 col-xs-12" readonly value="<?php echo $id_user;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtUsername" name="txtUsername" required="required" value = "<?php echo $username;?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="Password" id="txtPassword" name="txtPassword" required="required" value = "" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Id Pemanfaat<span class="required"></span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtIdPemanfaat" name="txtIdPemanfaat"  value = "<?php echo $id_pemanfaat; ?>" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Level<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="txtLevel" name="txtLevel" required="required" value = "pemanfaat" readonly class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url();?>tu/user_pemanfaat'">Cancel</button>
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

