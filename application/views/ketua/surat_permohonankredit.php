<?php
require('fpdf/fpdf.php');
foreach ($ambil_pemanfaat->result() as $p) {
    $foto_pemanfaat = $p->foto_pemanfaat;
}
foreach ($ambil_pinjaman->result() as $d) {
    $peta_lokasi_agunan = $d->peta_lokasi_agunan;
    $foto_agunan = $d->foto_agunan;
    $foto_surat_agunan = $d->foto_surat_agunan;
}
$pdf = new FPDF();
$pdf->AddPage("P","legal");


$pdf->SetFont('Arial','',12);

$pdf->Cell(40,7,"No.  ");
$pdf->Cell(50,7,": __/__/__/ 2018 ",0,1);
$pdf->Cell(40,7,"Perihal",0,0,"J");
$pdf->Cell(40,7,": Permohonan Kredit",0,1);
$pdf->Ln();
$pdf->Cell(0,7,"Kepada Ketua UED-SP : BAROKAH Desa Senderak",0,1);
$pdf->Cell(0,7,"Di-",0,1);
$pdf->Cell(10,7,"");
$pdf->Cell(6,7,"Tempat");

$pdf->Ln();

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,"SURAT PERMOHONAN KREDIT",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,7,"Yang bertanda tangan di bawah ini :",0,1,"L");
$pdf->Cell(50,7,"Nama",0,0,"L");
$pdf->Cell(10,7,":",0,0,"L");
$pdf->Cell(100,7,$p->nama_pemanfaat,0,1,"L");
$pdf->Cell(50,7,"Pekerjaan",0,0,"L");
$pdf->Cell(10,7,":",0,1,"L");
$pdf->Cell(50,7,"Alamat",0,0,"L");
$pdf->Cell(10,7,":",0,1,"L");

$pdf->Ln();
$pdf->Cell(0,6,"Dengan ini mengajukan permohonan kredit sebesar Rp. ",0,1,"L");
$pdf->Cell(0,6,"Terbilang : ",0,1,"L");
$pdf->Cell(0,6,"untuk memenuhi tambahan modal usaha ",0,1,"L");
$pdf->Cell(0,6,"Sebagai bahan pertimbangan, bersama ini saya sampaikan proposal dengan lampiran : ",0,1,"L");
$pdf->Cell(0,6,"I.    Profil Pemanfaat dan Peta Lokasi Agunan Pas Foto 3 x 4 (Menyusaikan) ",0,1,"L");
$pdf->Cell(0,6,"II.   Kartu Keluarga dan KTP ",0,1,"L");
$pdf->Cell(0,6,"III.  Rencana Usaha Pemanfaat (RUP) ",0,1,"L");
$pdf->Cell(0,6,"III.  Surat Penyerahan Agunan ",0,1,"L");
$pdf->Cell(0,6,"IV.  Surat Kuasa Pemakaian Agunan (Agunan Pihak Lain) ",0,1,"L");
$pdf->Cell(0,6,"V.   Surat Kuasa Penjualan Agunan",0,1,"L");
$pdf->Cell(0,6,"VI.  Surat Kesepakatan Sanki-Sanki yang telah ditetapkan  ",0,1,"L");
$pdf->Cell(0,6,"VII. Lembar Photo Usaha ",0,1,"L");
$pdf->Cell(0,6,"VIII.Surat Agunan Asli, Fotocopy Agunan dan Photo yang diagunkan ",0,1,"L");
$pdf->Cell(0,6,"IX.  Demikian permohonan ini diampaikan, atas perhatiannya saya ucapkan terima kaih.",0,1,"L");
$pdf->Cell(0,20,"Senderak,               2018",0,1,"R");
$pdf->Cell(0,50,"(__________________)",0,1,"R");

$pdf->Output();
?>
