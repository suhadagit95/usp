<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div  class="panel-body">
												<h2>Data Pendamping Desa</h2>
												<div class="navbar-right button-list mt-25">
													
													 <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='<?php echo base_url();?>tu/tambah_pamdes/'">
                            <span class="glyphicon glyphicon-plus" style="color:#ececec"></span> Tambah Pamdes</button>
												
												</div>
											</div>
                <div class="panel-body">
				<div class="table-responsive">
                    <table id="datable_1" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="width:7%; text-align: center;">NO</th>
                            <th style="width:21%; text-align: center;">Periode</th>
                            <th style="width:52%; text-align: center;">Nama Pendamping Desa Ekonomi</th>
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
                            <td style="vertical-align: middle; text-align: center;"><?php echo $r->periode_pendamping_desa;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->nama_pendamping_desa;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->status_pendamping_desa;?></td>
                            <td style="vertical-align: middle; text-align: center;">
                                <button class="btn btn-xs btn-warning" onclick="window.location.href='<?php echo base_url();?>tu/edit_pamdes/<?php echo hilang_karakter(base64_encode($r->id_pendamping_desa));?>'">
                                    <span class="fa fa-pencil"></span>
                                </button>
                                <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus' data-href='<?php echo base_url();?>tu/hapus_pamdes/<?php echo hilang_karakter(base64_encode($r->id_pendamping_desa));?>'><span class="fa fa-trash"></span> </button>
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
                    <h4 class="modal-title" id="myModalLabel2">HAPUS DATA PENDAMPING DESA</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data pendamping desa yang anda pilih?</p>
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