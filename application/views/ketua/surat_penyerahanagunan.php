<?php
require('fpdf/fpdf.php');
						
$pdf = new FPDF();
$pdf->AddPage("P","legal");

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,"SURAT PENYERAHAN AGUNAN",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,7,"Pada hari ini ........... Tanggal ............ Bulan ...... Tahun ........ Kami yang bertanda tangan di bawah ini :",0,1,"L");
$pdf->Cell(0,7,"Nama",0,1,"L");
$pdf->Cell(0,7,"Tempat, Tgl Lahir",0,1,"L");
$pdf->Cell(0,7,"Pekerjaan",0,1,"L");
$pdf->Cell(0,7,"Alamat",0,1,"L");
$pdf->Cell(0,7,"Selanjutnya disebut sebagai Pihak Pertama",0,1,"L");
$pdf->Ln();
$pdf->Cell(0,7,"Nama",0,1,"L");
$pdf->Cell(0,7,"Alamat",0,1,"L");
$pdf->Cell(0,7,"Selanjutnya disebut sebagai Pihak Kedua",0,1,"L");
$pdf->Ln();
$pdf->Cell(0,7,"Pihak Pertama dan Pihak Kedua bersepakat membuat perjanjian sebagai berikut :",0,1,"J");
$pdf->Cell(10,7,"");
$pdf->Cell(4,9,"1. Pihak Pertama menyerahkan agunan kepada Pihak Kedua berupa Sertifikat Tanah/SKGR/SKT/",0,1,"L");
$pdf->Cell(15,7,"");
$pdf->Cell(8,5,"BPKB Kendaraan atas nama ............ No Surat ............. Alamat ...........",0,1,"J");
$pdf->Cell(10,7,"");
$pdf->Cell(0,9,"2. Agunan ini merupakan jaminan kredit Pihak Pertama kepada Pihak Kedua, Agunan dapat diambil ",0,1,"J");
$pdf->Cell(15,7,"");
$pdf->Cell(0,5,"setelah seluruh angsuran lunas",0,1,"J");
$pdf->Ln();
$pdf->Cell(0,5,"Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan",0,1,"J");
$pdf->Cell(0,7,"dari pihak manapun.",0,1,"L");

$pdf->Ln();
$pdf->Cell(0,20,"Senderak,............................ 2018",0,1,"C");
$pdf->Cell(15,7,"");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,5,"Pihak Kedua                                                            Pihak Pertama",0,1,"C");
$pdf->Cell(0,10,"          Ketua                                         Tata Usaha",0,1,"L");
$pdf->Cell(0,40,"      LILI SURYANI                              HELIDA, A.Md            
                (___________________)",0,1,"L");

$pdf->Output();
?>
