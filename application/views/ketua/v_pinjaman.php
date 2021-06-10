
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
								<li><a href="<?php echo base_url();?>ketua">Home</a></li>
								
								<li class=""><span><a href="<?php echo base_url();?>ketua/pemanfaat">Data Pemanfaat</a></span></li>
								<li class="active"><span>Data Pinjaman</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="x_title">
                    <h2>Data Pinjaman</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datable_1" class="table table-hover display  pb-30" >
                        <thead>
                        <tr>
                            <th >NO</th>
                            <th >ID</th>
                            <th >Tanggal Pinjaman</th>
                            <th >Jumlah Pinjaman</th>
                            <th >Jangka Waktu</th>
                            <th >Tool</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        foreach($ambil_pinjaman->result() as $r){
                        ?>
                        <tr>
                            <td ><?php echo $no++;?></td>
                            <td ><?php echo $r->id_pinjaman;?></td>
                            <td ><?php echo tgl_indo($r->tanggal_pinjaman);?></td>
                            <td ><?php echo rupiah($r->jumlah_pinjaman);?></td>
                            <td ><?php echo $r->jangka_waktu;?> Bulan</td>
                            <td >
                                <span title="Lihat Detil Pinjaman" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info" data-toggle='modal' data-target='#data_pinjaman' data-id="<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>"><span class="fa fa-calendar"></span> </button>
                                </span>
								
                                <button class="btn btn-xs btn-warning"  title="Kelengkapan Dokumen" data-toggle="tooltip" data-placement="top" onclick="window.location.href='<?php echo base_url();?>ketua/dokumen_pinjaman/<?php echo hilang_karakter(base64_encode($id_pemanfaat));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>'">
                                    <span class="fa fa-files-o"></span>
                                </button>

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
    <br />

    <div id="data_pinjaman" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">


            </div>
        </div>
    </div>


</div>

<script>

    $(document).ready(function() {
        $('#data_pinjaman').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : '<?php echo base_url();?>ketua/data_pinjaman',
                data :  'id='+ rowid,
                success : function(data){
                    $('.modal-content').html(data);//menampilkan data ke dalam modal
                }
            });
        });
        $('[data-toggle="tooltip"]').tooltip();

    });
</script>