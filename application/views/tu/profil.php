<?php
foreach($ambil_pemanfaat->result() as $p);
foreach($ambil_pinjaman->result() as $t);
foreach($ambil_agunan->result() as $a);
foreach($ambil_pengurus->result() as $y);
foreach($ambil_kades->result() as $kd);
foreach($ambil_pendamping->result() as $pd);
foreach($ambil_bpd->result() as $bp);

$id_agama = $p->id_agama;
$ambilAgama = $this->db->query("Select * from tbl_agama where id_agama = '$id_agama'");
foreach($ambilAgama->result() as $c);
$agama = $c->agama;

$jumlah_pinjaman = $t->jumlah_pinjaman;
$jangka_waktu = $t->jangka_waktu;
$total_jasa_pinjaman = ($jangka_waktu/100)*$jumlah_pinjaman;
$nama_usaha = $t->nama_usaha;

$angsuran = $jumlah_pinjaman/$jangka_waktu;
$jasa = 0.01*$angsuran;
$jenis_agunan = $a->jenis_agunan;

$ketua_ued = $y->ketua;
$tatausaha = $y->tata_usaha;
$sak = $y->sak;
$kasir = $y->kasir;

$pdf = new FPDF();
$pdf->SetTitle("Proposal");
$pdf->SetMargins(20,10,20);
$pdf->AddPage("P","legal");
$pdf->SetFont('Arial','B',16);

$pdf->Cell(0,7,"PROFIL PEMANFAAT",0,1,"C");
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,7,"NAMA",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->nama_pemanfaat,0,1);
$pdf->Cell(60,7,"TEMPAT / TGL LAHIR",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->tempat_lahir_pemanfaat." / ".tgl_indo($p->tgl_lahir_pemanfaat),0,1);
$pdf->Cell(60,7,"ALAMAT",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->alamat_pemanfaat,0,1);
$pdf->Cell(60,7,"STATUS",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->status_pemanfaat,0,1);
$pdf->Cell(60,7,"AGAMA",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$agama,0,1);
$pdf->Cell(60,7,"PEKERJAAN",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->pekerjaan_pemanfaat,0,1);
$pdf->Cell(60,7,"BESAR PINJAMAN",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,rupiah($t->jumlah_pinjaman),0,1);
$pdf->Cell(60,7,"JANGKA WAKTU PINJAMAN",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$t->jangka_waktu.' Bulan',0,1);

$pdf->Image(base_url()."images/pemanfaat/".$p->foto_pemanfaat,165,28,30,40);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',16);
$pdf->Image("images/peta agunan/".$a->peta_lokasi_agunan,20,105,175,100);

$pdf->Cell(0,7,"PETA LOKASI USAHA",0,1,"C");
$pdf->Ln(120);
$pdf->Cell(0,6,"FOTO AGUNAN",0,1,"C");

$pdf->Image("images/agunan/".$a->foto_agunan,20,230,175,100);



$pdf->Output("","Proposal Peminjaman ".$p->nama_pemanfaat);
?>
