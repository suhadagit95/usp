<?php
						
$pdf = new FPDF();
$pdf->SetTitle("Formulir Verifikasi");
$pdf->AddPage("P","legal");
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

if($jumlah_pinjaman>=15000000){
    $SKD = "ya";
}else{
    $SKD = "tidak";
}



$qryPinjamanTeakhir = $this->db->query("select max(tanggal_pinjaman) as tanggal, id_pinjaman, status_pembayaran from tbl_pinjaman where id_pemanfaat='$id_pemanfaat' AND id_pinjaman<>'$id_pinjaman' and tanggal_pinjaman < '$tanggal_pinjaman'");
foreach($qryPinjamanTeakhir->result() as $w);
$id_pinjaman_terakhir = $w->id_pinjaman;

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





if($jumlah_pinjaman>=15000000){
    if($surat_permohonan!="" && $profil_pemanfaat!="" && $peta_lokasi_agunan!="" && $foto_agunan!="" &&
        $foto_surat_agunan!="" && $foto_pemanfaat!="" && $ktp!="" && $kk!="" && $rencana_usaha!="" && $surat_keterangan_desa!="" &&
        $surat_penyerahan_agunan!="" && $surat_kuasa_pemakaian_agunan!="" && $surat_kuasa_penjualan!="" && $surat_kuasa_peminjaman_agunan!="" &&
        $surat_perjanjian_pemberian_kredit!="" && $foto_usaha_pemanfaat!=""){
        $status_pinjaman = "rekomendasi";
    }else{
        $status_pinjaman = "tidak direkomendasi";
    }
}else{
    if($surat_permohonan!="" && $profil_pemanfaat!="" && $peta_lokasi_agunan!="" && $foto_agunan!="" &&
        $foto_surat_agunan!="" && $foto_pemanfaat!="" && $ktp!="" && $kk!="" && $rencana_usaha!="" &&
        $surat_penyerahan_agunan!="" && $surat_kuasa_pemakaian_agunan!="" && $surat_kuasa_penjualan!="" && $surat_kuasa_peminjaman_agunan!="" &&
        $surat_perjanjian_pemberian_kredit!="" && $foto_usaha_pemanfaat!=""){
        $status_pinjaman = "rekomendasi";
    }else{
        $status_pinjaman = "tidak direkomendasi";
    }
}


$pdf->SetFont('Arial','B',14);
$pdf->Ln(10);
$pdf->Cell(0,7,"FORMULIR VERIFIKASI USULAN",0,1,"C");
$pdf->Ln(10);
                      
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,16,"NO",1,0,"C");
$pdf->Cell(115,16,"URAIAN",1,0,"C");
$pdf->Cell(40,8,"PENILAIAN VERIFIKASI",1,0,"C");
$pdf->Cell(30,16,"PENJELASAN",1,0,"C");
$pdf->Cell(30,8,"",0,1,"C");

$pdf->Cell(125,8,"",0,0,"C");
$pdf->Cell(15,8,"YA",1,0,"C");
$pdf->Cell(25,8,"TIDAK",1,0,"C");
$pdf->Cell(20,8,"",0,1,"C");

$pdf->Cell(10,8,"1",1,0,"C");
$pdf->Cell(115,8,"Kelengkapan Dokumen Administrasi/Proposal",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"a. Dokumen adm Lengkap",1,0,"L");
$pdf->SetFont('ZapfDingbats','', 10);
if($status_pinjaman=="rekomendasi") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
}
if($status_pinjaman=="rekomendasi") {
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}
$pdf->Cell(30,8,"",1,1,"L");
$pdf->SetFont('Arial','',10);

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"b. Dokumen adm Tidak Lengkap",1,0,"L");
$pdf->SetFont('ZapfDingbats','', 10);
if($status_pinjaman=="tidak direkomendasi") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
}
if($status_pinjaman=="tidak direkomendasi") {
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}
$pdf->Cell(30,8,"",1,1,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,8,"2",1,0,"C");
$pdf->Cell(115,8,"Usaha yang dijalankan",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"a. Lokasi usaha di Desa",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"b. Lokasi usaha di luar Desa",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"c. Kesesuaian usaha dengan proposal yang diajukan",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"d. Kondisi jumlah pinjaman dengan usaha yang dijalankan",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"3",1,0,"C");
$pdf->Cell(115,8,"Agunan",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"a. Lokasi Agunan di Desa",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"b. Lokasi Agunan di luar desa)",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"c. Nilai agunan sesuai dengan juknis ",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"d. Agunan atas nama sendiri",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"e. Agunan atas nama orang lain",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"4",1,0,"C");
$pdf->Cell(115,8,"Rekomendasi",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"a. Adanya rekomendasi dari pimpinan",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"b. Adanya rekomendasi dari PD/Korda/Leader",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"5",1,0,"C");
$pdf->Cell(115,8,"Karakter",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"a. Adanya pinjaman diprograman/Lembaga keuangan lainnya",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");

$pdf->Cell(10,8,"",1,0,"C");
$pdf->Cell(115,8,"b. Masuk dalam daftar blacklist pada program/lembaga keuangan lainnya",1,0,"L");
$pdf->Cell(15,8,"",1,0,"C");
$pdf->Cell(25,8,"",1,0,"C");
$pdf->Cell(30,8,"",1,1,"L");
$pdf->Ln();
$pdf->SetFont('Arial','',10);

$pdf->Cell(130,10,"",0,0,"L");
$pdf->Cell(100,10,"Tanggal : ........................................",0,1,"L");
$pdf->Cell(0,10,"Rekomendasi / Catatan",0,1,"L");
$pdf->Cell(130,10,"_____________________________________",0,0,"L");
$pdf->Cell(70,10,"Dibuat Oleh",0,1,"C");
$pdf->Cell(130,10,"_____________________________________",0,1,"L");
$pdf->Cell(130,10,"_____________________________________",0,0,"L");
$pdf->SetFont("Arial","BU");
$pdf->Cell(70,5,"ROSITA",0,1,"C");
$pdf->Cell(130,5,"",0,0,"C");
$pdf->SetFont('Arial','',10);
$pdf->Cell(70,5,"Staf Analisis Kredit",0,1,"C");
$pdf->Cell(130,10,"_____________________________________",0,1,"L");
$pdf->Cell(110,10,"Disetujui Oleh :",0,1,"C");
$pdf->SetFont("Arial","BU");
$pdf->Cell(110,30,"NOFITA MULYANI, S.Pd.I",0,0,"C");
//batas






$pdf->Output("","Formulir Verifikasi.pdf");
?>
