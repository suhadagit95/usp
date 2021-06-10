
<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
    <?php
    foreach($ambil_pinjaman->result() as $r);
    $id_pinjaman = $r->id_pinjaman;
    $jumlah_pinjam = $r->jumlah_pinjaman;
    $jangka_waktu = $r->jangka_waktu;
    $sistem_angsuran = $r->sistem_angsuran;
    $jumlah_jasa = $r->jumlah_jasa;
	$no_rek_bank = $r->no_rek_bank;
    ?>
    <div class="row">
        <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Pinjaman</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Pinjaman <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" id="txtIDPinjaman" name="txtIDPinjaman" required="required" class="form-control col-md-3 col-xs-4" readonly value="<?php echo $id_pinjaman;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Pinjaman <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">Rp.</span>
                                    <input type="text" id="txtJumlahPinjaman" name="txtJumlahPinjaman" required="required" class="form-control col-md-7 col-xs-12" onkeyup="return jasa()">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jangka Waktu Pinjaman<span class="required">*</span>
                            </label>
                            <div class="col-sm-2 col-sm-2 col-xs-2">
                                <div class="input-prepend input-group">
                                    <input type="text" id="txtJangkaWaktuPinjaman" name="txtJangkaWaktuPinjaman" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $jangka_waktu;?>" onkeyup="return jasa()">
                                    <span class="add-on input-group-addon">Bulan</span>
                                </div>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistem Angsuran<span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" id="txtSistemAngsuran" name="txtSistemAngsuran" readonly required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $sistem_angsuran;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Jasa Pinjaman<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">Rp.</span>
                                    <input type="text" readonly id="txtJumlahJasa" name="txtJumlahJasa" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">No Rek Bank<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-prepend input-group">
                                    
                                    <input type="text"  id="txtJumlahJasa" name="txtNorekbank" value="<?php echo $no_rek_bank;?>"required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="x_content">
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url();?>tu/<?php echo $target_kembali;?>'">Batal</button>
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
    $('#txtJumlahPinjaman').val(<?php echo $jumlah_pinjam;?>);
    $('#txtJumlahJasa').val(<?php echo $jumlah_jasa;?>);
    function jasa(){
        var jumlahPinjaman = $("#txtJumlahPinjaman").val();
        jumlahPinjaman2 = jumlahPinjaman.replace('.','');
        var jangkaWaktu = $("#txtJangkaWaktuPinjaman").val();
        var jasa = (jangkaWaktu/100)*jumlahPinjaman;
        $("#txtJumlahJasa").val(jasa);
    }
</script>



