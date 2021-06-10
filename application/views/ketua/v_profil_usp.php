<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div  class="panel-body">
												<h2>Profil USP</h2>
												<div class="navbar-right button-list mt-25">
													
													 <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='<?php echo base_url();?>tu/tambah_profil_usp/'">
                            <span class="glyphicon glyphicon-plus" style="color:#ececec"></span> Tambah Identitas USP</button>
												
												</div>
											</div>
                <div class="panel-body">
				<div class="table-responsive">
                    <table id="datable_1" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="width:7%; text-align: center;">NO</th>
                            <th style="width:20%; text-align: center;">Nama Desa</th>
                            <th style="width:20%; text-align: center;">Bumdesa</th>
                            <th style="width:20%; text-align: center;">Nama USP</th>
							<th style="width:20%; text-align: center;">Alamat USP</th>
							<th style="width:10%; text-align: center;">Logo</th>
                            <th style="width:5%; text-align: center;">Aktif</th>
							
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $no=1;
                        foreach($hasil->result() as $r){
                        ?>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;"><?php echo $no++;?></td>
                            <td style="vertical-align: middle; text-align: center;"><?php echo $r->nama_desa;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->bum_desa;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->nama_usp_surat;?></td>
							<td style="vertical-align: middle;"><?php echo $r->alamat_usp;?></td>
							<td style="vertical-align: middle;"><img src="<?php echo base_url();?>images/logo/<?php echo $r->logo;?>" height="100pt"></td>
							<td style="vertical-align: middle;"><?php echo $r->aktif;?></td>
                            
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
    <!-- Modal Tambah Profil USP-->
	<div id="konfirmasi_hapus" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">HAPUS DATA IDENTITAS USP</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data identitas usp yang anda pilih?</p>
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