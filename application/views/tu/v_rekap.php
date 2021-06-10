<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Pinjaman</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
							
							
								<li class="active"><span>Data Pinjaman</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="panel-body">
                    <h2>Data Pinjaman</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-3 col-xs-12" for="first-name">Tahun <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <select id="cmbTahun" name="cmbTahun" required="required" class="form-control col-md-7 col-xs-12">
                                    <option value="">-Pilih Tahun-</option>
                                    <?php
                                    foreach ($ambil_tahun->result() as $t) {
                                        ?>
                                        <option value="<?php echo $t->tahun;?>"><?php echo $t->tahun;?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-5 col-sm-3 col-xs-12" for="first-name">Bulan <span class="required">*</span>
                            </label>
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <select id="cmbBulan" name="cmbBulan" class="form-control col-md-7 col-xs-12">
                                    <option value="">-Pilih Bulan-</option>

                                    <?php
                                    for($i=1; $i<=12; $i++) {
                                        ?>
                                        <option value="<?php echo $i;?>"><?php echo bulanIndo($i);?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3" style="text-align: center;">
                                <button type="submit" name="btnLihat" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>
                <?php
                if(isset($_POST['btnLihat'])) {
                    ?>
                    <div class="panel-body">
                        <ul class="nav navbar-right panel_toolbox">
                            <?php
                                $encTahun = hilang_karakter(base64_encode($tahun));
                                $encBulan = hilang_karakter(base64_encode($bulan));
                            ?>
                            <a href="<?php echo base_url();?>tu/cetak_rekap/<?php echo $encTahun."/".$encBulan;?>/rekap.html" target="_blank">
                                <button type="button" class="btn btn-md btn-success">
                                    <span class="glyphicon glyphicon-print" style="color:#ececec"></span>
                                </button>
                            </a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="panel-body">
                        <table id="example" class="table table-hover display  pb-30" >
						    <thead>
                            <tr>
                                <th style="width:7%; text-align: center;">NO</th>
                                <th style="width:15%; text-align: center;">Tanggal</th>
                                <th style="width:15%; text-align: center;">Kode Pinjaman</th>
                                <th style="width:20%; text-align: center;">Nama Pemanfaat</th>
                                <th style="width:15%; text-align: center;">Jumlah Pinjaman</th>
                                <th style="width:13%; text-align: center;">Jangka Waktu</th>
                                <th style="width:20%; text-align: center;">Status</th>
                            </tr>
                            </thead>
                            <tbody>
							
                            <?php
                            $no = 1;
                            foreach ($ambil_pinjaman->result() as $r) {
                                ?>
                                <tr>
                                    <td style="vertical-align: middle; text-align: center;"><?php echo $no++; ?></td>
                                    <td style="vertical-align: middle; text-align: center;"><?php echo tgl_indo($r->tanggal_pinjaman); ?></td>
                                    <td style="vertical-align: middle; text-align: center;"><?php echo $r->id_pinjaman; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $r->nama_pemanfaat; ?></td>
                                    <td style="vertical-align: middle; text-align: right;"><?php echo rupiah($r->jumlah_pinjaman); ?></td>
                                    <td style="vertical-align: middle; text-align: center;"><?php echo $r->jangka_waktu; ?> Bulan</td>
                                    <td style="vertical-align: middle; text-align: center;"><?php echo ucwords($r->status_pinjaman); ?></td>

                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>

    </div>
    <br />
    <div id="konfirmasi_hapus" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">HAPUS DATA BADAN PERMUSYARAWATAN DESA</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data ketua BPD yang anda pilih?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Tidak
                    </button>
                    <a class="btn btn-danger btn-ok"> Hapus</a>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>