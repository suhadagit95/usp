
<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
    <?php
    foreach($ambil_pinjaman->result() as $r);
    $id_pemanfaat = $r->id_pemanfaat;
    $id_pinjaman = $r->id_pinjaman;
    $jumlah_pinjam = $r->jumlah_pinjaman;
    $jangka_waktu = $r->jangka_waktu;
    $sistem_angsuran = $r->sistem_angsuran;
    $jumlah_jasa = $r->jumlah_jasa;
    $status = $r->status_pembayaran;
    ?>
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Pemanfaat</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
							
								<li class=""><a href="<?php echo base_url();?>tu/pemanfaat"><span>Data Pemanfaat</span></a></li>
								<li class="active"><span>Status Angsuran</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="panel-body">
                    <ul class="nav navbar-left panel_toolbox">
                        </li>
                        <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='<?php echo base_url();?>tu/pinjaman/<?php echo hilang_karakter(base64_encode($id_pemanfaat));?>'">
                            <span class="glyphicon glyphicon-arrow-left" style="color:#ececec"></span>
                        </button>
                    </ul>
					<br>
					<br>
                    <h2>Data Pinjaman</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">ID Pinjaman <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <input type="text" readonly id="txtIDPinjaman" name="txtIDPinjaman" required="required" class="form-control col-md-3 col-xs-4" readonly value="<?php echo $id_pinjaman;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Pinjaman <span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">Rp.</span>
                                    <input type="text" readonly id="txtJumlahPinjaman" name="txtJumlahPinjaman" required="required" value="<?php echo rupiah($jumlah_pinjam);?>" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jangka Waktu Pinjaman<span class="required">*</span>
                            </label>
                            <div class="col-sm-2 col-sm-2 col-xs-2">
                                <div class="input-prepend input-group">
                                    <input type="text" readonly id="txtJangkaWaktuPinjaman" name="txtJangkaWaktuPinjaman" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $jangka_waktu;?>">
                                    <span class="add-on input-group-addon">Bulan</span>
                                </div>
                            </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Sistem Angsuran<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" readonly id="txtSistemAngsuran" name="txtSistemAngsuran" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $sistem_angsuran;?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Jumlah Jasa Pinjaman<span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon">Rp.</span>
                                    <input type="text" readonly id="txtJumlahJasa" name="txtJumlahJasa" value="<?php echo rupiah($jumlah_jasa);?>" required="required" class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                        </div>

                    <?php
                    for($i=1;$i<=$jangka_waktu;$i++) {
                        $query = $this->db->query("SELECT * FROM tbl_angsuran where id_pinjaman='$id_pinjaman' and angsuran_ke='$i'");
                        foreach($query->result() as $t);
                        if($query->num_rows()>0) {
                            $id_angsuran = $t->id_angsuran;
                            $keterangan = $t->keterangan;
                        }else{

                            $id_angsuran = "";
                            $keterangan = "";
                        }
                        ?>
                        <input type="hidden" value="<?php echo $id_angsuran;?>" name="txtIdAngsuran<?php echo $i;?>">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Angsuran Ke-<?php echo $i;?><span class="required">*</span>
                            </label>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <select name="cmbAngsuran<?php echo $i;?>" class="form-control col-md-7 col-xs-12">
                                    <option value="">-Pilih Status-</option>
                                    <option value="Lancar" <?php if($keterangan=="Lancar") echo "Selected";?> >
                                        Lancar
                                    </option>
                                    <option value="Menunggak" <?php if($keterangan=="Menunggak") echo "Selected";?>>
                                        Menunggak
                                    </option>
                                </select>
                            </div>
                        </div>
                        <?php
                    }
                    ?>




                </div>


                <div class="panel-body">


                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url();?>tu/pinjaman/<?php echo hilang_karakter(base64_encode($id_pemanfaat));?>'">Batal</button>
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



