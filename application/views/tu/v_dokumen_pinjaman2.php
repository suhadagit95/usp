
<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
    <?php
    $no=1;
    foreach($ambil_dokumen_pinjaman->result() as $r);
    $surat_permohonan                   = $r->surat_permohonan;
    $profil_pemanfaat                   = $r->profil_pemanfaat;
    $ktp                                = $r->ktp;
    $kk                                 = $r->kk;
    $rencana_usaha                      = $r->rencana_usaha;
    $surat_keterangan_desa              = $r->surat_keterangan_desa;
    $surat_penyerahan_agunan            = $r->surat_penyerahan_agunan;
    $surat_kuasa_pemakaian_agunan       = $r->surat_kuasa_pemakaian_agunan;
    $surat_kuasa_penjualan              = $r->surat_kuasa_penjualan;
    $foto_usaha_pemanfaat               = $r->foto_usaha_pemanfaat;
    $surat_kuasa_peminjaman_agunan      = $r->surat_kuasa_peminjaman_agunan;
    $surat_perjanjian_pemberian_kredit  = $r->surat_perjanjian_pemberian_kredit;

    foreach ($ambil_pinjaman->result() as $pj);
    $jumlah_pinjaman = $pj->jumlah_pinjaman;
    $tanggal_pinjaman = $pj->tanggal_pinjaman;

    if($jumlah_pinjaman>15000000){
        $SKD = "ya";
    }else{
        $SKD = "tidak";
    }
    $w="";



    $qryPinjamanTeakhir = $this->db->query("select * from tbl_pinjaman where id_pemanfaat='$id_pemanfaat' AND id_pinjaman<>'$id_pinjaman' and tanggal_pinjaman < '$tanggal_pinjaman' ORDER BY tbl_pinjaman.tanggal_pinjaman ASC");
    if($qryPinjamanTeakhir->num_rows()!=0) {
        foreach ($qryPinjamanTeakhir->result() as $w) ;
        $id_pinjaman_terakhir = $w->id_pinjaman;
    }
    else{
        $id_pinjaman_terakhir="";
    }
    $qryAngsuran = $this->db->query("Select * from tbl_angsuran where id_pinjaman = '$id_pinjaman_terakhir' and keterangan='Menunggak'");
    if($qryAngsuran->num_rows()>0){
        $status_pembayaran_terakhir = "Tidak Lancar";
    }else{
        $status_pembayaran_terakhir = "Lancar";
    }


    foreach ($ambil_pemanfaat->result() as $p);
    $foto_pemanfaat = $p->foto_pemanfaat;

    foreach ($ambil_agunan->result() as $d);
    $peta_lokasi_agunan = $d->peta_lokasi_agunan;
    $foto_agunan = $d->foto_agunan;
    $foto_surat_agunan = $d->foto_surat_agunan;





    if($jumlah_pinjaman>15000000){
        if($surat_permohonan!="" && $profil_pemanfaat!="" && $peta_lokasi_agunan!="" && $foto_agunan!="" &&
            $foto_surat_agunan!="" && $foto_pemanfaat!="" && $ktp!="" && $kk!="" && $rencana_usaha!="" && $surat_keterangan_desa!="" &&
            $surat_penyerahan_agunan!="" && $surat_kuasa_pemakaian_agunan!="" && $surat_kuasa_penjualan!="" && $surat_kuasa_peminjaman_agunan!="" &&
            $surat_perjanjian_pemberian_kredit!="" && $foto_usaha_pemanfaat!="" && $status_pembayaran_terakhir=="Lancar"){
            $status_pinjaman = "rekomendasi";
        }else{
            $status_pinjaman = "tidak direkomendasi";
        }
    }else{
        if($surat_permohonan!="" && $profil_pemanfaat!="" && $peta_lokasi_agunan!="" && $foto_agunan!="" &&
            $foto_surat_agunan!="" && $foto_pemanfaat!="" && $ktp!="" && $kk!="" && $rencana_usaha!="" &&
            $surat_penyerahan_agunan!="" && $surat_kuasa_pemakaian_agunan!="" && $surat_kuasa_penjualan!="" && $surat_kuasa_peminjaman_agunan!="" &&
            $surat_perjanjian_pemberian_kredit!="" && $foto_usaha_pemanfaat!="" && $status_pembayaran_terakhir=="Lancar"){
            $status_pinjaman = "rekomendasi";
        }else{
            $status_pinjaman = "tidak direkomendasi";
        }
    }


    ?>
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Pemanfaat </h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
							
								<li class=""><a href="<?php echo base_url();?>tu/pemanfaat"><span>Data Pemanfaat</span></a></li>
								<li class="active"><span>dokumen Pinjaman 2</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>

	<!--Dokumen Psoposal-->
					<div class="contentpanel">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                
                               <center > <h2 class="panel-title  ">PEMERIKSAAN
KELENGKAPAN DOKUMEN USULAN PEMANFAAT</h2></center>
                                
                            </div><!-- panel-heading -->
						 
						 
							<div class="panel-body">
							
                                <div class="row">
								
									<div class="col-md-12">
									<div class="alert alert-primary">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <strong>Well done!</strong> You successfully read this <a href="" class="alert-link">important alert message</a>.
                                </div>
										<div class="panel panel-default">
											<div class="table-responsive">
												<table id="basicTable" class="table table-striped table-bordered responsive">
												<thead>
												<tr>
												<th>No</th>
												<th>Uraian</th>
												<th>Status</th>
												<th>Tool</th>
                                    
												</tr>
												</thead>
												<tbody>
												<tr>
							
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												
												</tr>
                                 
												</tbody>
												</table>
											</div><!-- table-responsive -->
                           <!-- col-md-6 -->
                           
                          <!-- /row -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>	
	
	
	 <!-- Modal persetujuan proposal jika dokumen lengkap makan form ini akan muncul-->
	
	
	 
	 
	 <!-- batas akhir model persetujuan-->
	 

   
    
	<div class="panel-body">
    <div id="konfirmasi_hapus" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">HAPUS DATA</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus dokumen yang anda pilih?</p>
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

</div>

<script>

    $(document).ready(function() {
        $('#data_pinjaman').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : '<?php echo base_url();?>tu/data_pinjaman',
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