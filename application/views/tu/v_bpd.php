<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
		<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data BPD</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Data Master</a></li>
								
								<li class="active"><span>BPD</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div  class="panel-body">
												<h2>Data Agama</h2>
												<div class="navbar-right button-list mt-25">
													
													 <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='<?php echo base_url();?>tu/tambah_bpd/'">
                            <span class="glyphicon glyphicon-plus" style="color:#ececec"></span> Tambah BPD</button>
												
												</div>
											</div>
                <div class="panel-body">
				<div class="table-responsive">
                    <table id="datable_1" class="table table-hover display table-bordered pb-30"">
                        <thead>
                        <tr>
                            <th style="width:7%; text-align: center;">NO</th>
                            <th style="width:21%; text-align: center;">Periode</th>
                            <th style="width:52%; text-align: center;">Nama Ketua BPD</th>
                            <th style="width:10%; text-align: center;">Status</th>
                            <th style="width:10%; text-align: center;">Tool</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $no=1;
                        foreach($hasil->result() as $r){
                        ?>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;"><?php echo $no++;?></td>
                            <td style="vertical-align: middle; text-align: center;"><?php echo $r->periode_bpd;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->nama_bpd;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->status_bpd;?></td>
                            <td style="vertical-align: middle; text-align: center;">
                                <button class="btn btn-xs btn-warning" onclick="window.location.href='<?php echo base_url();?>tu/edit_bpd/<?php echo hilang_karakter(base64_encode($r->id_bpd));?>'">
                                    <span class="fa fa-pencil"></span>
                                </button>
                                <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus' data-href='<?php echo base_url();?>tu/hapus_bpd/<?php echo hilang_karakter(base64_encode($r->id_bpd));?>'><span class="fa fa-trash"></span> </button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
					</div>
                </div>
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