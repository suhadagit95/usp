<?php
foreach($ambil_pemanfaat->result() as $p);
foreach($ambil_pinjaman->result() as $t);
foreach($ambil_agunan->result() as $a);
foreach($ambilPengurus->result() as $d);
foreach($ambil_kades->result() as $kades);
foreach($ambil_bpd->result() as $bpd);
foreach($ambil_pendamping->result() as $pen);
foreach($ambil_profil_usp->result() as $pusp);
$tglPinjam = $t->tanggal_pinjaman;

$pdf = new FPDF();
$pdf->AddPage("P","legal");
$pdf->SetMargins(15,0,15);
$pdf->SetTitle("Surat Perjanjian Sanksi");
$pdf->SetFont('Arial','BU',12);
$pdf->Ln(20);
$pdf->Cell(0,7,"SURAT Perjanjian Sanksi",0,1,"C");
$pdf->SetFont('Arial','BU',12);

$pdf->Ln();
$pdf->SetFont('Arial','',12);
$txt1 = " Saya yang bertanda tangan di bawah ini :";

$pdf->MultiCell(0,7,$txt1,0,"J");
$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"Nama",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,7,$p->nama_pemanfaat,0,1,"L");
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"NO SPPK",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,'',0,1,"L");

$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"Alamat",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->alamat_pemanfaat,0,1,"L");

$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"Pinjaman",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,rupiah($t->jumlah_pinjaman),0,1,"L");

$pdf->Ln();


$pdf->Cell(10,0,"",0,1);
$txt = "Dengan ini saya menyatakan bahwa saya berjanji akan melaksanakan kewajiban saya untuk membayar angsuran pinjaman saya di tambah dengan bunga 0.8%  perbulan kepada pengelola USP Mekarsari Desa Wonosari  sesuai dengan waktu yang telah ditetapkan";
$pdf->Cell(10,1,"",0,1);
$pdf->MultiCell(0,7,$txt,"J");



$pdf->Cell(0,7,"Jika saya tidak menepati janji maka saya bersedia dikenakan sanksi sebagai berikut :",0,1,"J");
$pdf->Cell(10,7,"");
$text[1]="Jika saya terlambat membayar angsuran selama 1 sampai dengan  2 bulan maka saya bersedia untuk diberitahu melalui Via telpon atau SMS.";
$text[2]="Jika saya terlambat membayar angsuran selama 3 (tiga) bulan maka saya bersedia dilkunjungi dan menerima surat pemberitahuan tunggakan oleh pengurus unit USP.";
$text[3]="Jika saya mengabaikan sebagaimana poin 1 dan 2 atau terlambat membayar angsuran selama 4 (empat) bulan maka saya bersedia diberi surat peringatan 1 (satu).";
$text[4]="Jika saya mengabaikan sebagaimana poin 1, 2 dan 3 atau terlambat membayar angsuran selama 5 (lima) bulan maka saya bersedia diberi surat peringatan 2 (dua).";
$text[5]="Jika saya mengabaikan sebagaimana poin 1, 2, 3 dan 4 atau terlambat membayar angsuran selama 6 (enam) bulan maka saya bersedia diberi surat peringatan 3 (tiga).";
$text[6]="Jika saya mengabaikan sebagaimana poin 1, 2, 3, 4 dan 5 atau terlambat membayar angsuran diatas 6 (enam) bulan maka saya bersedia dilakukan pemanggilan oleh pengurus Unit USP Mekar Sari.";
$text[7]="Jika saya tidak membayar angsuran pinjaman minimal 12 kali angsuran maka saya bersedia untuk dilakukan penjualan agunan";

$column_width = ($pdf->GetPageWidth()-40);
for($i=1;$i<=7;$i++) {
    $pdf->MultiCellBlt($column_width, 7, "$i.", $text[$i]);
}
$pdf->Cell(10,0,"",0,1);
$txt = "Demikian surat perjanjian ini saya buat dan tandatangani dengan akal sehat tanpa adanya paksaan dari pihak manapun, dan apabila dikemudian hari saya terbukti mengingkari perjanjian ini, maka saya bersedia dituntut menurut ketentuan dan peraturan yang berlaku. ";
$pdf->Cell(10,1,"",0,1);
$pdf->MultiCell(0,7,$txt,"J");

$pdf->Ln();


$pdf->Cell(0,6,$pusp->nama_desa.", ".tgl_indo($t->tanggal_pinjaman),0,1,"R");
$pdf->Ln();

$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Mengetahui",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Hormat saya,",0,1,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Ketua USP ".$pusp->nama_usp_surat." Desa ".$pusp->nama_desa,0,0,"C");

$pdf->Cell(($pdf->GetPageWidth()-40)/2,3,"",0,1,"C");

$pdf->Ln(25);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,$d->ketua,0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,$p->nama_pemanfaat,0,1,"C");
$pdf->Ln();




$pdf->Output("","Surat_perjanjian_sanksi.pdf");
?>
