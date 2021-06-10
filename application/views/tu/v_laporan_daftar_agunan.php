<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Laporan Daftar Agunan</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
							
							
								<li class="active"><span>Data Agunan</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="panel-body">
                    <h2>Data Agunan</h2>

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
					<div class="table-responsive">
                        <table id="example" class="table table-hover display  pb-30" >
						    <thead>
                            <tr>
                                <th style=" center;">NO</th>
								<th style=" center;">Id Pemanfaat</th>
                                <th style="center;">Nama</th>
								<th style="center;">Alamat</th>
								<th style=" center;">Pekerjaan</th>
								<th style="center;">Id Pinjaman</th>
								<th style="center;">Tgl Pinjaman</th>
								<th style="center;">Jenis Agunan</th>
								<th style=" center;">Nomor Agunan</th>
								<th style=" center;">Nama Pemilik Agunan</th>
                                <th style="center;">Pekerjaan Pemilik Agunan</th>
								<th style=" center;">Alamat Pemilik Agunan</th>
								<th style=" center;">Status pinjaman</th>
								<th style=" center;">Pinjaman disetujui</th>
								
                            </tr>
                            </thead>
                            <tbody>
							
                            <?php
                            $no = 1;
                            foreach ($ambil_data->result() as $r) {
                                ?>
                                <tr>
                                    <td ><?php echo $no++; ?></td>
									<td ><?php echo $r->id_pemanfaat; ?></td>
                                    <td ><?php echo $r->nama_pemanfaat; ?></td>
                                  <th style=" center;"><?php echo $r->alamat_pemanfaat; ?></th>
                                <th style="center;"><?php echo $r->pekerjaan_pemanfaat; ?></th>
								<th style=" center;"><?php echo $r->id_pinjaman; ?></th>
								<th style=" center;"><?php echo tgl_indo($r->tanggal_pinjaman); ?></th>
								<th style=" center;"><?php echo $r->jenis_agunan; ?></th>
                                <th style="center;"><?php echo $r->no_surat_agunan; ?></th>
                              <th style="center;"><?php echo $r->nama_pemilik; ?></th>
							  <th ><?php echo $r->pekerjaan_pemilik; ?></th>
                              <th style=" center;"><?php echo $r->alamat_pemilik; ?></th>
							  <th style=" center;"><?php echo $r->status_pinjaman; ?></th>
							  <th style=" center;"><?php if ($r->pinjaman_disetujui == "Y"){ ?> Pinjaman Disetujui <?php } else if ($r->pinjaman_disetujui == "N"){ ?>
							  
								Pinjaman Tidak Disetujui<?php } else if ($r->pinjaman_disetujui == ""){?>Usulan Peminjaman Belum Selesai<?php }?></th>
							  
							   </tr>
                                <?php
                            }
                            ?>
                            </tbody>
						
                        </table>
						</div<
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