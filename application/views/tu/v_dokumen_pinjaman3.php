
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
								<li class="active"><span>dokumen Pinjaman</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel [anel-default card-view">

                <div class="panel-body">
                    <div class="center col-lg-12" style="text-align: center;">
                        <ul class="nav navbar-left panel_toolbox">
                            </li>
                            <button type="button" class="btn btn-sm btn-success" onclick="window.location.href='<?php echo base_url();?>tu/pinjaman/<?php echo hilang_karakter(base64_encode($id_pemanfaat));?>'">
                                <span class="glyphicon glyphicon-arrow-left" style="color:#ececec"></span>
                            </button>
                        </ul>
                        <ul class="nav navbar-right panel_toolbox">
                            </li>
                            <a href="<?php echo base_url();?>tu/cetak_proposal/<?php echo hilang_karakter(base64_encode($id_pemanfaat))."/".hilang_karakter(base64_encode($id_pinjaman));?>/proposal.html" target="_blank">
                                <button type="button" class="btn btn-sm btn-success">
                                    <span class="fa fa-print" style="color:#ececec"> Cetak Dokumen Proposal</span>
                                </button>
                            </a>
                        </ul>
                        <h2><strong>PEMERIKSAAN</strong><br>
                        <strong>KELENGKAPAN DOKUMEN USULAN PEMANFAAT</strong></h2>
                    </div>
                    <br>
                    <br>
                    <br>
                    <table style="border: 0; width: 100%; margin-top: 50px;" >
                        <tr>
                            <td style="width: 15%; height: 30px;">Nama Pemanfaat</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 80%;"><?php echo $p->nama_pemanfaat;?></td>
                        </tr>
                        <tr>
                            <td style="width: 15%; height: 30px;">Nomor Pinjaman</td>
                            <td style="width: 5%;">:</td>
                            <td style="width: 80%;"><?php echo $d->id_pinjaman;?></td>
                        </tr>
                    </table>
                    <br>
					
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="width:7%; text-align: center;">NO</th>
                            <th style="width:63%; text-align: center;">Uraian</th>
                            <th style="width:15%; text-align: center;">Status</th>
                            <th style="width:15%; text-align: center;">Tool</th>
                        </tr>
                        </thead>
                        <tbody>


                        <tr>
                            <td style="vertical-align: middle; text-align: center;">1</td>
                            <td style="vertical-align: middle;">Surat Permohonan Kredit</td>
                            <td style="vertical-align: middle; text-align: center;"">
                                <?php
                                if($surat_permohonan=="") {
                                    ?>
                                    <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("surat_permohonan"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Surat Permohonan Kredit" data-toggle="tooltip" data-placement="top">
                                        <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                    </a>
                                    <a target="_blank" href="<?php echo base_url();?>tu/cetak_surat_permohonan/<?php echo hilang_karakter(base64_encode($p->id_pemanfaat));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Cetak Surat Permohonan Kredit" data-toggle="tooltip" data-placement="top">
                                        <button class="btn btn-xs btn-info"><span class="fa fa-print"></span> </button>
                                    </a>
                                    <?php
                                }else{
                                    ?>
                                    <span class="fa fa-check" style="color: #00A000;"  ></span>
                                    <?php
                                }
                                ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($surat_permohonan!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/dokumen/<?php echo $surat_permohonan;?>" target="_blank" title="Lihat Dokumen" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
								<?php if ($pj->pinjaman_disetujui=="") {?>
                                <span title="Hapus Dokumen" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url();?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("surat_permohonan"))."/".hilang_karakter(base64_encode($r->id_pinjaman));?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                <?php
                                }}
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">2</td>
                            <td style="vertical-align: middle;">Profil Pemanfaat</td>

                            <td style="vertical-align: middle; text-align: center;"">
                            <span class="fa fa-check" style="color: #00A000;"  ></span>

                            </td>
                            <td style="vertical-align: middle; text-align: center;">

                                <a href="<?php echo base_url();?>tu/profil/<?php echo hilang_karakter(base64_encode($id_pemanfaat))."/".hilang_karakter(base64_encode($id_pinjaman));?>.html" target="_blank" title="Lihat Dokumen" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">4</td>
                            <td style="vertical-align: middle;">Photo Jenis Agunan</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($foto_agunan=="") {
                                ?>
                                <span style="color: #942a25;" class="fa fa-times"></span>
                                <?php
                            }else{
                                ?>
                                <span style="color: #00A000;" class="fa fa-check"></span>
                                <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($foto_agunan!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/agunan/<?php echo $foto_agunan;?>" target="_blank" title="Lihat Jenis Agunan" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">5</td>
                            <td style="vertical-align: middle;">Agunan Asli dan Fotocopy Agunan</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($foto_surat_agunan=="") {
                                ?>
                                <span style="color: #942a25;" class="fa fa-times"></span>
                                <?php
                            }else{
                                ?>
                                <span style="color: #00A000;" class="fa fa-check"></span>
                                <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($foto_surat_agunan!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/surat agunan/<?php echo $foto_surat_agunan;?>" target="_blank" title="Lihat Agunan Asli dan Fotocopy Agunan" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">6</td>
                            <td style="vertical-align: middle;">Pas Photo 3x4 (Menyesuaikan)</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($foto_pemanfaat=="") {
                                ?>
                                <span style="color: #942a25;" class="fa fa-times"></span>
                                <?php
                            }else{
                                ?>
                                <span style="color: #00A000;" class="fa fa-check"></span>
                                <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($foto_pemanfaat!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/pemanfaat/<?php echo $foto_pemanfaat;?>" target="_blank" title="Lihat Pas Photo" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">7</td>
                            <td style="vertical-align: middle;">Fotocopy Kartu Tanda Penduduk</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($ktp=="") {
                                ?>
                                <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("ktp"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Fotocopy Kartu Tanda Penduduk" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                </a>
                                <?php
                            }else{
                                ?>
                                <span class="fa fa-check" style="color: #00A000;" ></span>
                                <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($ktp!="") {

                                    ?>
                                    <a href="<?php echo base_url(); ?>images/dokumen/<?php echo $ktp; ?>"
                                       target="_blank" title="Lihat Fotocopy Kartu Tanda Penduduk" data-toggle="tooltip" data-placement="top"
                                       class="btn btn-xs btn-warning">
                                        <span class="fa fa-search"></span>
                                    </a>
									<?php if ($pj->pinjaman_disetujui=="") {?>
                                    <span title="Hapus Fotocopy Kartu Tanda Penduduk" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal'
                                            data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url(); ?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("ktp")) . "/" . hilang_karakter(base64_encode($r->id_pinjaman)); ?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                <?php
                                }}
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">8</td>
                            <td style="vertical-align: middle;">Fotocopy Kartu Keluarga</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($kk=="") {
                                ?>
                                <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("kk"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Fotocopy Kartu Keluarga" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                </a>
                                <?php
                            }else{
                                ?>
                                <span class="fa fa-check" style="color: #00A000;" ></span>
                                <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($kk!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/dokumen/<?php echo $kk;?>" target="_blank" title="Lihat Fotocopy Kartu Keluarga" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
								<?php if ($pj->pinjaman_disetujui=="") {?>
                                <span title="Hapus Fotocopy Kartu Keluarga" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url();?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("kk"))."/".hilang_karakter(base64_encode($r->id_pinjaman));?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                <?php
                                }}
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">9</td>
                            <td style="vertical-align: middle;">Rencana Usaha Pemanfaatan (Setelah diverifikasi)</td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($rencana_usaha=="") {
                                    ?>
                                    <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("rencana_usaha"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Rencana Usaha Pemanfaatan" data-toggle="tooltip" data-placement="top">
                                        <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                    </a>
                                <?php
                                }else{
                                    ?>
                                    <span class="fa fa-check" style="color: #00A000;" ></span>
                                <?php
                                }
                                ?>

                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($rencana_usaha!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/dokumen/<?php echo $rencana_usaha;?>" target="_blank" title="Lihat Rencana Usaha Pemanfaatan" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
								<?php if ($pj->pinjaman_disetujui=="") {?>
                                <span title="Hapus Rencana Usaha Pemanfaatan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url();?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("rencana_usaha"))."/".hilang_karakter(base64_encode($r->id_pinjaman));?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                <?php
                                }}
                                ?>
                            </td>
                        </tr>
                        <?php
                        if($SKD=="ya") {
                            ?>
                            <tr>
                                <td style="vertical-align: middle; text-align: center;">10</td>
                                <td style="vertical-align: middle;">Surat Keterangan Desa / Lurah (Pinjaman Diatas
                                    15jt)
                                </td>
                                <td style="vertical-align: middle; text-align: center;"
                                ">
                                <?php
                                if ($surat_keterangan_desa == "") {
                                    ?>
                                    <a href="<?php echo base_url(); ?>tu/upload/<?php echo hilang_karakter(base64_encode("surat_keterangan_desa")); ?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman)); ?>"
                                       title="Upload Surat Keterangan Desa / Lurah" data-toggle="tooltip"
                                       data-placement="top">
                                        <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span></button>
                                    </a>
                                <?php
                                } else {
                                    ?>
                                    <span class="fa fa-check" style="color: #00A000;"></span>
                                <?php
                                }
                                ?>
                                </td>
                                <td style="vertical-align: middle; text-align: center;">
                                    <?php
                                    if ($surat_keterangan_desa != "") {

                                        ?>
                                        <a href="<?php echo base_url(); ?>images/dokumen/<?php echo $surat_keterangan_desa; ?>"
                                           target="_blank" title="Lihat Surat Keterangan Desa / Lurah"
                                           data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning">
                                            <span class="fa fa-search"></span>
                                        </a>
										<?php if ($pj->pinjaman_disetujui=="") {?>
                                        <span title="Hapus Surat Keterangan Desa / Lurah" data-toggle="tooltip"
                                              data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal'
                                            data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url(); ?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("surat_keterangan_desa")) . "/" . hilang_karakter(base64_encode($r->id_pinjaman)); ?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                    <?php
                                    }}
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php if($SKD=="ya") echo "11"; else echo "10";?>
                            </td>
                            <td style="vertical-align: middle;">Surat Penyerahan Agunan</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($surat_penyerahan_agunan=="") {
                                ?>
                                <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("surat_penyerahan_agunan"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Surat Penyerahan Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                </a>
                                <a target="_blank" href="<?php echo base_url();?>tu/cetak_surat_penyerahan_agunan/<?php echo hilang_karakter(base64_encode($p->id_pemanfaat));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Cetak Surat Penyerahan Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-print"></span> </button>
                                </a>
                                <?php
                            }else{
                                ?>
                                <span class="fa fa-check" style="color: #00A000;" ></span>
                                <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($surat_penyerahan_agunan!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/dokumen/<?php echo $surat_penyerahan_agunan;?>" target="_blank" title="Lihat Surat Penyerahan Agunan" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
								<?php if ($pj->pinjaman_disetujui=="") {?>
                                <span title="Hapus Surat Penyerahan Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url();?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("surat_penyerahan_agunan"))."/".hilang_karakter(base64_encode($r->id_pinjaman));?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                <?php
                                }}
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php if($SKD=="ya") echo "12"; else echo "11";?>
                            </td>
                            <td style="vertical-align: middle;">Surat Kuasa Pemakaian Agunan</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($surat_kuasa_pemakaian_agunan=="") {
                                ?>
                                <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("surat_kuasa_pemakaian_agunan"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Surat Kuasa Pemakaian Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                </a>
                                <a target="_blank" href="<?php echo base_url();?>tu/cetak_surat_kuasa_pemakaian_agunan/<?php echo hilang_karakter(base64_encode($p->id_pemanfaat));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Cetak Surat Kuasa Pemakaian Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-print"></span> </button>
                                </a>
                                <?php
                            }else{
                                ?>
                                <span class="fa fa-check" style="color: #00A000;" ></span>
                                <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($surat_kuasa_pemakaian_agunan!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/dokumen/<?php echo $surat_kuasa_pemakaian_agunan;?>" target="_blank" title="Lihat Surat Kuasa Pemakaian Agunan" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
								<?php if ($pj->pinjaman_disetujui=="") {?>
                                <span title="Hapus Surat Kuasa Pemakaian Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url();?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("surat_kuasa_pemakaian_agunan"))."/".hilang_karakter(base64_encode($r->id_pinjaman));?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                <?php
                                }}
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php if($SKD=="ya") echo "13"; else echo "12";?>
                            </td>
                            <td style="vertical-align: middle;">Surat Kuasa Penjualan Agunan</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($surat_kuasa_penjualan=="") {
                                ?>
                                <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("surat_kuasa_penjualan"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Surat Kuasa Penjualan Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                </a>
                                <a target="_blank" href="<?php echo base_url();?>tu/cetak_surat_kuasa_penjualan_agunan/<?php echo hilang_karakter(base64_encode($p->id_pemanfaat));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Cetak Surat Kuasa Penjualan Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-print"></span> </button>
                                </a>
                                <?php
                            }else{
                                ?>
                                <span class="fa fa-check" style="color: #00A000;" ></span>
                                <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($surat_kuasa_penjualan!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/dokumen/<?php echo $surat_kuasa_penjualan;?>" target="_blank" title="Lihat Surat Kuasa Penjualan Agunan" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
								<?php if ($pj->pinjaman_disetujui=="") {?>
                                <span title="Hapus Surat Kuasa Penjualan Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url();?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("surat_kuasa_penjualan"))."/".hilang_karakter(base64_encode($r->id_pinjaman));?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                <?php
                                }}
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php if($SKD=="ya") echo "14"; else echo "13";?>
                            </td>
                            <td style="vertical-align: middle;">Foto Usaha Pemanfaat</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($foto_usaha_pemanfaat=="") {
                                ?>
                                <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("foto_usaha_pemanfaat"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Foto Usaha Pemanfaat" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                </a>
                                <?php
                            }else{
                                ?>
                                <span class="fa fa-check" style="color: #00A000;" ></span>
                                <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($foto_usaha_pemanfaat!="") {

                                ?>
                                <a href="<?php echo base_url();?>images/dokumen/<?php echo $foto_usaha_pemanfaat;?>" target="_blank" title="Lihat Foto Usaha Pemanfaat" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                    <span class="fa fa-search"></span>
                                </a>
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php if($SKD=="ya") echo "15"; else echo "14";?>
                            </td>
                            <td style="vertical-align: middle;">Surat Kuasa Peminjaman Agunan</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($surat_kuasa_peminjaman_agunan=="") {
                                ?>
                                <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("surat_kuasa_peminjaman_agunan"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Surat Kuasa Peminjaman Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                </a>
                                <a target="_blank" href="<?php echo base_url();?>tu/cetak_surat_kuasa_peminjaman_agunan/<?php echo hilang_karakter(base64_encode($p->id_pemanfaat));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Cetak Surat Kuasa Peminjaman Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-print"></span> </button>
                                </a>
                            <?php
                            }else{
                                ?>
                                <span class="fa fa-check" style="color: #00A000;" ></span>
                            <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($surat_kuasa_peminjaman_agunan!="") {

                                    ?>
                                    <a href="<?php echo base_url();?>images/dokumen/<?php echo $surat_kuasa_peminjaman_agunan;?>" target="_blank" title="Lihat Surat Kuasa Penjualan Agunan" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                        <span class="fa fa-search"></span>
                                    </a>
									<?php if ($pj->pinjaman_disetujui=="") {?>
                                    <span title="Hapus Surat Kuasa Peminjaman Agunan" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url();?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("surat_kuasa_peminjaman_agunan"))."/".hilang_karakter(base64_encode($r->id_pinjaman));?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                <?php
                                }}
                                ?>
                            </td>
                        </tr>
                        <tr >
                            <td style="vertical-align: middle; text-align: center;">
                                <?php if($SKD=="ya") echo "16"; else echo "15";?>
                            </td>
                            <td style="vertical-align: middle;">Surat Perjanjian Pemberian Kredit (SP2K)</td>
                            <td style="vertical-align: middle; text-align: center;"">
                            <?php
                            if($surat_perjanjian_pemberian_kredit=="") {
                                ?>
                                <a href="<?php echo base_url();?>tu/upload/<?php echo hilang_karakter(base64_encode("surat_perjanjian_pemberian_kredit"));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Upload Surat Perjanjian Pemberian Kredit" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-upload"></span> </button>
                                </a>
                                <a target="_blank" href="<?php echo base_url();?>tu/cetak_surat_perjanjian_pemberian_kredit/<?php echo hilang_karakter(base64_encode($p->id_pemanfaat));?>/<?php echo hilang_karakter(base64_encode($r->id_pinjaman));?>" title="Cetak Surat Perjanjian Pemberian Kredit" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-info"><span class="fa fa-print"></span> </button>
                                </a>
                            <?php
                            }else{
                                ?>
                                <span class="fa fa-check" style="color: #00A000;" ></span>
                            <?php
                            }
                            ?>
                            </td>
                            <td style="vertical-align: middle; text-align: center;">
                                <?php
                                if($surat_perjanjian_pemberian_kredit!="") {

                                    ?>
                                    <a href="<?php echo base_url();?>images/dokumen/<?php echo $surat_perjanjian_pemberian_kredit;?>" target="_blank" title="Lihat Surat Kuasa Penjualan Agunan" data-toggle="tooltip" data-placement="top" class="btn btn-xs btn-warning" >
                                        <span class="fa fa-search"></span>
                                    </a>
									<?php if ($pj->pinjaman_disetujui=="") {?>
                                    <span title="Hapus Surat Perjanjian Pemberian Kredit" data-toggle="tooltip" data-placement="top">
                                    <button class="btn btn-xs btn-danger" data-toggle='modal' data-target='#konfirmasi_hapus'
                                            data-href='<?php echo base_url();?>tu/hapus_dokumen/<?php echo hilang_karakter(base64_encode("surat_perjanjian_pemberian_kredit"))."/".hilang_karakter(base64_encode($r->id_pinjaman));?>'>
                                        <span class="fa fa-trash"></span>
                                    </button>
                                </span>
                                <?php
                                }}
                                ?>
                            </td>
                        </tr>
                        <?php
                        //}
                        ?>
                        </tbody>
                    </table>
                <br>
                    <div class="center col-lg-12" style="text-align: center;">
                        <h2>Kesimpulan Pemerikasaan : Bahwa dokumen usulan/proposal desa tersebut diatas dinyatakan:</h2>
                        <?php
                        if($status_pinjaman=="rekomendasi") {
                            ?>
                            <h2 style="color: chartreuse;"><strong>LAYAK atau TELAH MEMENUHI SYARAT maka bisa
                                    dilanjutkan dengan proses selanjutnya</strong></h2>
									</br>
									<a href="<?php echo base_url();?>tu/cetak_dokumen/<?php echo hilang_karakter(base64_encode($id_pemanfaat))."/".hilang_karakter(base64_encode($id_pinjaman));?>" target="_blank">
                            <button type="button" class="btn btn-md btn-success btn-round"><span class="fa fa-print"></span> Cetak Form Kelengkapan Dokumen</button>
                        </a>

                        <a href="<?php echo base_url();?>tu/cetak_formulir_verifikasi_usulan/<?php echo hilang_karakter(base64_encode($id_pemanfaat))."/".hilang_karakter(base64_encode($id_pinjaman));?>/formulir_verifikasi.html" target="_blank">
                            <button type="button" class="btn btn-md btn-success btn-round"><span class="fa fa-print"></span> Cetak Formulir Verifikasi</button>
                        </a>
						</br>
						</br>
									
									 <div class="row">
		<div class="panel panel-default">
			<div class="panel-body" style="text-align: center">
			<h2>Form Persetujuan Proposal</h2>
			<h5>Berdasarkan Hasil Musyawarah dan Pemeriksaan Berkas Usulan Peminjaman Atas Nama Saudara/i  <strong> <?php echo $p->nama_pemanfaat;?></p> </strong> 
			ID Pinjaman <strong> <?php echo $d->id_pinjaman;?></strong> dinyatakan:</h5>
			<br>
			<p></p>
			<?php if ($pj->pinjaman_disetujui==""){?>
			
					<button alt="default" data-toggle="modal" data-target="#responsive-modal-terima" class="btn btn-default btn-success">Diterima</button>
			<button alt="default" data-toggle="modal" data-target="#responsive-modal-tidak-terima" class="btn btn-default btn-danger">Tidak Diterima</button>
			<?php } else if ($pj->pinjaman_disetujui=="Y"){?>	
			<button alt="default"  class="btn btn-default btn-success">Peminjaman Diterima</button>
			<?php }  else if ($pj->pinjaman_disetujui=="N"){?>	
			<button alt="default"  class="btn btn-default btn-danger">Peminjaman Tidak Diterima</button>
			<?php } ?>	
				</div>
			
		 </div>
		 </div>
									
										
                        <?php
                        }else{
                            ?>
                            <h2 style="color: red;"><strong>KURANG LAYAK atau BELUM MEMENUHI SYARAT  maka perlu diperbaiki dulu oleh pengelola</strong></h2>
                        <?php
                        }
                        ?>

                        

                        <?php
                        $update['id_pinjaman'] = $id_pinjaman;
                        $update['status_pinjaman'] = $status_pinjaman;
                        $this->Tu_model->Update_Content('tbl_pinjaman', $update, 'id_pinjaman');
                        ?>
                       
                    </div>

                
                
			</div>
                

                </div>

            </div>
     </div>
	
	 <!-- Modal persetujuan proposal jika dokumen lengkap makan form ini akan muncul-->
	
	 <div class="row">
		<div class="panel panel-default">
			
			
			<div id="responsive-modal-terima" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
						
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
														<h5 class="modal-title">Peminjaman Disetujui</h5>
													</div>
													<form class="" method="post" action="" type="submit">
													<div class="modal-body">
													
														
                                                
                                                    <div class="checkbox checkbox-success">
														<input id="checkbox3" type="checkbox" value="Y" name="setuju" required>
														<label for="checkbox3">
															Peminjaman ini dinyatakan disetujui
														</label>
													</div>	
                                              
                                                
															
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-success">Setujui</button>
													</div>
													</form>
												</div>
											</div>							
			</div>
			<div id="responsive-modal-tidak-terima" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
				<div class="modal-dialog">
					<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">??</button>
														<h5 class="modal-title">Peminjaman Tidak Disetujui</h5>
													</div>
													<div class="modal-body">
														<form class="" method="post" action="" type="submit">
													<div class="modal-body">
													
														
                                                
                                                    <div class="checkbox checkbox-danger">
														<input id="checkbox3" type="checkbox" value="N" name="setuju" required>
														<label for="checkbox3">
															Peminjaman ini dinyatakan <strong>Tidak Disetujui</strong>
														</label>
													</div>	
                                              
                                                
															
														
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="submit" class="btn btn-danger">Tidak Disetujui</button>
													</div>
													</form>
												</div>
											</div>							
			</div>
		</div>
	 </div>
	 </div>
	 
	 
	 
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