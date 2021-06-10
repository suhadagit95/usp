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


foreach($ambilPengurus->result() as $a);
foreach($ambil_kades->result() as $kades);
foreach($ambil_bpd->result() as $bpd);
foreach($ambil_pendamping->result() as $pen);

$pdf = new FPDF();
$pdf->SetTitle("Pemeriksaan Kelengkapan Dokumen Usulan Pemanfaat");
$pdf->AddPage("P","legal");


$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,7,"PEMERIKSAAN",0,1,"C");
$pdf->Cell(0,7,"KELENGKAPAN DOKUMEN USULAN PEMANFAAT",0,1,"C");

$pdf->ln();
$pdf->SetFont("Arial","",12);
$pdf->Cell(50,7,"Pemanfaat",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,$p->nama_pemanfaat,0,1);

$pdf->Cell(50,7,"No Permohonan Kredit",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,$d->id_pinjaman,0,1);
$pdf->ln();

$pdf->SetFont("Arial","B",12);
$pdf->Cell(10,20,"NO",1,0,"C");
$pdf->Cell(105,20,"URAIAN",1,0,"C");
$pdf->Cell(40,10,"Pemeriksaan",1,0,"C");
$pdf->Cell(40,20,"Keterangan",1,0,"C");
$pdf->Cell(0,10,"",0,1,"C");

$pdf->Cell(115,10,"",0,0,"C");
$pdf->Cell(15,10,"Ada",1,0,"C");
$pdf->Cell(25,10,"Tidak Ada",1,0,"C");

$pdf->ln();

$pdf->SetFont("Arial","",12);
$pdf->Cell(10,8,"1",1,0,"C");
$pdf->Cell(105,8,"Surat Permohonan Kredit",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($surat_permohonan!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");


$pdf->SetFont("Arial","",12);
$pdf->Cell(10,8,"2",1,0,"C");
$pdf->Cell(105,8,"Profil Pemanfaat",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($profil_pemanfaat!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");


$pdf->SetFont("Arial","",12);
$pdf->Cell(10,8,"3",1,0,"C");
$pdf->Cell(105,8,"Peta Lokasi Agunan",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($peta_lokasi_agunan!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
$pdf->Cell(10,8,"4",1,0,"C");
$pdf->Cell(105,8,"Foto Jenis Agunan",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($foto_agunan!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
$pdf->Cell(10,8,"5",1,0,"C");
$pdf->Cell(105,8,"Agunan asli dan fotocopy agunan",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($foto_surat_agunan!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
$pdf->Cell(10,8,"6",1,0,"C");
$pdf->Cell(105,8,"Pas Foto 3x4 (Menyusaikan)",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($foto_pemanfaat!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
$pdf->Cell(10,8,"7",1,0,"C");
$pdf->Cell(105,8,"Scan Kartu Tanda Penduduk",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($ktp!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
$pdf->Cell(10,8,"8",1,0,"C");
$pdf->Cell(105,8,"Scan Kartu Keluarga",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($kk!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
$pdf->Cell(10,8,"9",1,0,"C");
$pdf->Cell(105,8,"Rencana Usaha Pemanfaat (Setelah diverifikasi)",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($rencana_usaha!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");
if($SKD=="ya") {
    $pdf->SetFont("Arial", "", 12);
    $pdf->Cell(10, 8, "10", 1, 0, "C");
    $pdf->Cell(105, 8, "Surat Keterangan Desa/Lurah (Pinjaman diatas  15jt)", 1, 0, "L");
    $pdf->SetFont("ZapfDingbats", "", 12);
    if ($surat_keterangan_desa != "") {
        $pdf->Cell(15, 8, 4, 1, 0, "C");
        $pdf->Cell(25, 8, "", 1, 0, "C");
    } else {
        $pdf->Cell(15, 8, "", 1, 0, "C");
        $pdf->Cell(25, 8, 4, 1, 0, "C");
    }

    $pdf->Cell(40, 8, "", 1, 1, "L");
}
$pdf->SetFont("Arial","",12);
if($SKD=="ya") {
    $pdf->Cell(10, 8, "11", 1, 0, "C");
}else {
    $pdf->Cell(10, 8, "10", 1, 0, "C");
}
$pdf->Cell(105,8,"Surat Penyerahan Agunan",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($surat_penyerahan_agunan!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
if($SKD=="ya") {
    $pdf->Cell(10, 8, "12", 1, 0, "C");
}else {
    $pdf->Cell(10, 8, "11", 1, 0, "C");
}
$pdf->Cell(105,8,"Surat Kuasa Pemakaian Agunan",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($surat_kuasa_pemakaian_agunan!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
if($SKD=="ya") {
    $pdf->Cell(10, 8, "13", 1, 0, "C");
}else {
    $pdf->Cell(10, 8, "12", 1, 0, "C");
}
$pdf->Cell(105,8,"Surat Kuasa Penjualan Agunan",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($surat_kuasa_penjualan!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
if($SKD=="ya") {
    $pdf->Cell(10, 8, "14", 1, 0, "C");
}else {
    $pdf->Cell(10, 8, "13", 1, 0, "C");
}
$pdf->Cell(105,8,"Foto Usaha Pemanfaat",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($foto_usaha_pemanfaat!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
if($SKD=="ya") {
    $pdf->Cell(10, 8, "15", 1, 0, "C");
}else {
    $pdf->Cell(10, 8, "14", 1, 0, "C");
}
$pdf->Cell(105,8,"Surat Kuasa Peminjaman Agunan",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($surat_kuasa_peminjaman_agunan!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->SetFont("Arial","",12);
if($SKD=="ya") {
    $pdf->Cell(10, 8, "16", 1, 0, "C");
}else {
    $pdf->Cell(10, 8, "15", 1, 0, "C");
}
$pdf->Cell(105,8,"Surat Perjanjian Pemberian Kredit (SP2K)",1,0,"L");
$pdf->SetFont("ZapfDingbats","",12);
if($surat_perjanjian_pemberian_kredit!="") {
    $pdf->Cell(15, 8, 4, 1, 0, "C");
    $pdf->Cell(25, 8, "", 1, 0, "C");
}else{
    $pdf->Cell(15, 8, "", 1, 0, "C");
    $pdf->Cell(25, 8, 4, 1, 0, "C");
}

$pdf->Cell(40,8,"",1,1,"L");

$pdf->ln();
$pdf->SetFont("Arial","",12);
$pdf->Cell(0,8,"Kesimpulan Pemeriksaan : Bahwa dokumen usulan/proposal desa tersebut diatas dinyatakan",0,1,"C");


$pdf->ln();
if($status_pinjaman=="rekomendasi") {
    $txt1 = "LAYAK atau TELAH MEMENUHI SYARAT, maka bisa dilanjutkan dengan proses selanjutnya";
}else{
    $txt1 = "KURANG LAYAK atau BELUM MEMENUHI SYARAT maka perlu diperbaiki dulu oleh Pengelola";
}
$pdf->SetFont("Arial","B",12);
$pdf->MultiCell(0,7,$txt1,0,"C");
$pdf->ln();
$pdf->ln();

$pdf->SetFont("Arial","",12);
$pdf->Cell(0,7,"Dibuat di : Senderak, ".tgl_indo(date("Y-m-d")),0,1,"L");
$pdf->ln();
$pdf->Cell(0,3,"Diperiksa Oleh :",0,1,"C");

$pdf->Cell(10,15,"No",0,0);
$pdf->Cell(50,15,"",0,0,"C");
$pdf->Cell(80,15,"Nama",0,0,"C");
$pdf->Cell(120,15,"Tanda tangan",0,1);

$pdf->SetFont("Arial","B",12);
$pdf->Cell(10,15,"1",0,0);
$pdf->Cell(50,15,"Tata Usaha",0,0);
$pdf->Cell(80,15,$a->tata_usaha,0,0,"C");
$pdf->Cell(105,15,".....................",0,1);

$pdf->Cell(10,15,"2",0,0);
$pdf->Cell(50,15,"SAK",0,0);
$pdf->Cell(80,15,$a->sak,0,0,"C");
$pdf->Cell(105,15,".....................",0,1);

$pdf->Cell(10,15,"3",0,0);
$pdf->Cell(50,15,"Pendamping Desa",0,0);
$pdf->Cell(80,15,$pen->nama_pendamping_desa,0,0,"C");
$pdf->Cell(120,15,".....................",0,1);
//batas

$pdf->Output("","Pemeriksaan Kelengkapan Dokumen Usulan Pemanfaat.pdf");
?>
