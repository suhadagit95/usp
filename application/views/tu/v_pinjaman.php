

    <!-- top tiles -->

    <!-- /top tiles -->
	<div class="row heading-bg">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-4">
							<h5 class="txt-dark">Data Pinjaman</h5>
		</div>
						<!-- Breadcrumb -->
			<div class="col-lg-9 col-sm-8 col-md-8 col-xs-8">
							<ol class="breadcrumb">
							
								<li class=""><a href="<?php echo base_url();?>tu/pemanfaat"><span>Data Pemanfaat</span></a></li>
								<li class="active"><span>Data Pinjaman</span></li>
							</ol>
			</div>
						<!-- /Breadcrumb -->
	</div>
					
					
				
                        
                            
						 <?php 
						
						 foreach($ambil_pemanfaat->result() as $pt); 
					
									 foreach($ambil_pinjaman->result() as $r);
									?>
									
    <div class="row">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-inverse card-view">
				
							<div class="panel-heading">
									<div class="pull-left">
										<center><h4 class="panel-title txt-dark">Ringkasan Data Pemanfaat</h4></center>
									
									</div>
									
									<div class="clearfix"></div>
								</div>
                             <div class="table-responsive ">
								<div class="panel-wrapper collapse in">
									<div  class="panel-body row pa-0">
										<div class="table-wrap mt-40">
											<div class="table-responsive">
							 
								
								

									
										<br>	
										<table  class="table  mb-2"style="font-size:12px">
										
									 <tr>
									 <center><img alt="image" height="120" width="90" src="<?php echo base_url();?>images/pemanfaat/<?php echo $pt->foto_pemanfaat;?>"></img></center>
									 </tr>
						<tr>
                            <td style="width: 25%; height: 30px;">ID Pemanfaat</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 73%;"><?php echo $pt->id_pemanfaat;?></td>
                        </tr>			 
                        <tr>
                            <td style="width: 25%; height: 30px;">Nama Pemanfaat</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 73%;"><?php echo $pt->nama_pemanfaat;?></td>
                        </tr>
						
                        <tr>
                            <td style="width: 20%; height: 30px;">Tempat, Tgl Lahir</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 75%;"><?php echo $pt->tempat_lahir_pemanfaat;?>, <?php echo tgl_indo($pt->tgl_lahir_pemanfaat);?></td>
                        </tr>
						<tr>
                            <td style="width: 20%; height: 30px;">Setatus Pemanfaat</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 75%;"><?php echo $pt->status_pemanfaat;?></td>
                        </tr>
						<tr>
                            <td style="width: 20%; height: 30px;">Pekerjaan Pemanfaat</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 75%;"><?php echo $pt->pekerjaan_pemanfaat;?></td>
                        </tr>
						
						<tr>
						<td></td>
						<td></td>
						<td></td>
						</tr>
						
						
										</table>
										</div>
										</div>
										</div>
										</div>
										
									
									</div>
				
			</div>
		</div>						

								<div class="col-md-8 col-sm-8 col-xs-12">
								<div class="panel panel-default card-view ">
								<div class="panel-heading">
									<div class="pull-left">
										<center><h4 class="panel-title txt-dark" style="center">Data Pinjaman</h4></center>
									
									</div>
									
									<div class="clearfix"></div>
									
								</div>
								<br>
                             <div class="table-responsive">
							 
							 		<ul class="nav navbar-left panel_toolbox">
							 <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='<?php echo base_url();?>tu/tambah_pinjaman/<?php echo hilang_karakter(base64_encode($id_pemanfaat));?>'">
                            <span class="glyphicon glyphicon-plus" style="color:#ececec"></span> Tambah Pinjaman</button>
							</ul>
                              <table style="font-size:11px" id="datable_1" class="table table-hover display mb-2 pb-30">
                                <thead>
                                 <tr>
                            <th >NO</th>
                            <th>ID Pinjaman</th>
							<th >Tanggal Pinjaman</th>
                            <th >Jumlah Usulan</th>
							<th >Relasi/pinjaman diterima</th>
                            <th >Jangka Waktu</th>
                            <th >Status</th>
							<th >Disetujui</th>
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
							<td ><?php echo rupiah($r->usulan_disetujui);?></td>
                            <td ><?php echo $r->jangka_waktu;?> Bulan</td>
                            <td><?php if ($r->status_pinjaman==""){?><strong style="color:#FFA500;">Proses Dokumen Belum Selesai</strong>
							<?php } else {echo ucwords($r->status_pinjaman);}?></td>
							<td><?php if ($r->pinjaman_disetujui=="Y"){?>
							<strong style="color: #00A000;" >Pinjaman Disetujui</strong>
							<?php } else if ($r->pinjaman_disetujui=="N") { ?>
							<strong style="color: #ff0000;" >Pinjaman Tidak Disetujui</strong>
							<?php } else {?>
							<strong style="color:#FFA500;">Proses Dokumen Belum Selesai</strong>
							<?php }?>
						
							</td>
                            <td >
                                <span title="Lihat Detil Pinjaman" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info" data-toggle='modal' data-target='#data_pinjaman' data-id="<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>"><span class="fa fa-calendar"></span> </button>
                                </span>
                                <button class="btn btn-xs btn-warning"  title="Kelengkapan Dokumen" data-toggle="tooltip" data-placement="top" onclick="window.location.href='<?php echo base_url();?>tu/dokumen_pinjaman/<?php echo hilang_karakter(base64_encode($id_pemanfaat));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>'">
                                    <span class="fa fa-files-o"></span>
                                </button>
								<!-- jika status pinjaman tidak direkomendasi maka status angsuran tidak akan muncul-->
								<?php if ($r->pinjaman_disetujui == "Y") {?>
                                <button class="btn btn-xs btn-success"  title="Status Angsuran" data-toggle="tooltip" data-placement="top" onclick="window.location.href='<?php echo base_url();?>tu/status_angsuran/<?php echo hilang_karakter(base64_encode($id_pemanfaat));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>'">
                                    <span class="fa fa-money"></span>
                                </button>
								<?php } ?>
								
                                <span title="Hapus Pinjaman" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus' data-href='<?php echo base_url();?>tu/hapus_pinjaman/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>'><span class="fa fa-trash"></span> </button>
                                </span>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                              </table>
                              </div><!-- table-responsive -->
                           <!-- col-md-6 -->
                           
                          <!-- /row -->
						  </div>
                         </div>
	</div>
						
					
    
    
    <div id="konfirmasi_hapus" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">HAPUS DATA PINJAMAN</h4>
                </div>
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus data pinjaman yang anda pilih?</p>
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

    <div id="data_pinjaman" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">


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