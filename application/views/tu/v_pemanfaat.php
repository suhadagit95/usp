<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Pemanfaat</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
							
							
								<li class="active"><span>Data Pemanfaat</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
			<div class="panel-wrapper collapse in">
                <div  class="panel-body">
												<h2>Data Pemanfaat</h2>
												<div class="navbar-right button-list mt-25">
													
													 <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='<?php echo base_url();?>tu/tambah_pemanfaat/'">
                            <span class="glyphicon glyphicon-plus" style="color:#ececec"></span> Tambah Pemanfaat</button>
												
												</div>
											</div>
                <div class="panel-body">
                    <div class="table-wrap">
						<div class="table-responsive">
							<table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                        <tr>
                            <th style="">NO</th>
							<th style="">ID</th>
                            <th style="">Nama</th>
                            <th style="">Alamat</th>
                            <th style="">Pekerjaan</th>
							<th style="">NO Hp</th>
                            <th style="">Status</th>
							<th style="">Foto</th>
                            <th style="">Tool</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $no=1;
                        foreach($hasil->result() as $r){
                        ?>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;"><?php echo $no++;?></td>
							<td style="vertical-align: middle;"><?php echo $r->id_pemanfaat;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->nama_pemanfaat;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->alamat_pemanfaat;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->pekerjaan_pemanfaat;?></td>
							<td style="vertical-align: middle;"><?php echo $r->no_hp;?></td>
                            <td style="vertical-align: middle;"><?php echo $r->status_pemanfaat;?></td>
							<td >
                        <img src="../images/pemanfaat/<?php echo $r->foto_pemanfaat;?>" class="foto_user" height='90px'>
						</td>
                            <td style="vertical-align: middle; text-align: center;">
                                <span title="Lihat Profil" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info" data-toggle='modal' data-target='#data_pemanfaat' data-id="<?php echo hilang_karakter(base64_encode($r->id_pemanfaat));?>"><span class="fa fa-calendar"></span> </button>
                                </span>
                                <button class="btn btn-xs btn-success"  title="Pinjaman" data-toggle="tooltip" data-placement="top" onclick="window.location.href='<?php echo base_url();?>tu/pinjaman/<?php echo hilang_karakter(base64_encode($r->id_pemanfaat));?>'">
                                    <span class="fa fa-bars"></span>
                                </button>
                                <button class="btn btn-xs btn-warning"  title="Edit Pemanfaat" data-toggle="tooltip" data-placement="top" onclick="window.location.href='<?php echo base_url();?>tu/edit_pemanfaat/<?php echo hilang_karakter(base64_encode($r->id_pemanfaat));?>'">
                                    <span class="fa fa-pencil"></span>
                                </button>
                                <span title="Hapus Pemanfaat" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus' data-href='<?php echo base_url();?>tu/hapus_pemanfaat/<?php echo hilang_karakter(base64_encode($r->id_pemanfaat));?>'><span class="fa fa-trash"></span> </button>
                                </span>
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
		</div>

    </div>
    <br />
    <div id="konfirmasi_hapus" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">HAPUS DATA PEMANFAAT</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data pemanfaat yang anda pilih?</p>
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

    <div id="data_pemanfaat" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">


            </div>
        </div>
    </div>


</div>

<script>

    $(document).ready(function() {
        $('#data_pemanfaat').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : '<?php echo base_url();?>tu/profil_pemanfaat',
                data :  'id='+ rowid,
                success : function(data){
                    $('.modal-content').html(data);//menampilkan data ke dalam modal
                }
            });
        });
        $('[data-toggle="tooltip"]').tooltip();
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>