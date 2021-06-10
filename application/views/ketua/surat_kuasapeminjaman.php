<?php
require('fpdf/fpdf.php');
						
$pdf = new FPDF();
$pdf->AddPage("P","legal");

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,"SURAT KUASA PEMINJAMAN AGUNAN",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,7,"Kami yang bertanda tangan dibawah ini:",0,1,"L");
$pdf->Cell(0,7,"Nama",0,1,"L");
$pdf->Cell(0,7,"Tempat, Tgl Lahir",0,1,"L");
$pdf->Cell(0,7,"Pekerjaan",0,1,"L");
$pdf->Cell(0,7,"Alamat",0,1,"L");
$pdf->Cell(0,7,"Selaku pemilik agunan yang selanjutnya disebut sebagai PIHAK PERTAMA",0,1,"L");

$pdf->Cell(0,7,"Nama",0,1,"L");
$pdf->Cell(0,7,"Tempat, Tgl Lahir",0,1,"L");
$pdf->Cell(0,7,"Pekerjaan",0,1,"L");
$pdf->Cell(0,7,"Alamat",0,1,"L");

$pdf->Cell(0,7,"Pihak Pertama dan Pihak Kedua bersepakat membuat perjanjian sebagai berikut :",0,1,"J");
$pdf->Cell(10,7,"");
$pdf->Cell(4,9,"1. PIHAK PERTAMA memberikan pemakaian agunan kepada PIHAK KEDUA berupa sertifikat tanah",0,1,"L");
$pdf->Cell(15,7,"");
$pdf->Cell(8,5,"SKGR/SKT/BPKB Kendaraan atas nama ............ No Surat ............. Alamat ...........",0,1,"J");
$pdf->Cell(10,7,"");
$pdf->Cell(0,9,"2. PIHAK KEDUA telah mempunyai kuasa penuh atas agunan tersebut selama pinjaman di UED-SP  ",0,1,"J");
$pdf->Cell(15,7,"");
$pdf->Cell(0,5,"Barokah Desa Senderak Kecamatan Bengkalis.",0,1,"J");
$pdf->Cell(10,7,"");
$pdf->Cell(0,9,"3. PIHAK PERTAMA tidak akan mempermasalahkan/ mengambil/menggugat kepada lembaga  ",0,1,"J");
$pdf->Cell(15,7,"");
$pdf->Cell(0,7,"UED-SP Barokah apabila agunan yang diberikan kepada PIHAK KEDUA dijual oleh UED-SP  ",0,1,"J");
$pdf->Cell(15,7,"");
$pdf->Cell(0,7,"Barokah yang disebabkan oleh PIHAK KEDUA tidak mampu membayar angsuran kredit yang",0,1,"J");
$pdf->Cell(15,7,"");
$pdf->Cell(0,7,"telah disetujui bersama. ",0,1,"J");
$pdf->Cell(10,7,"");
$pdf->Cell(0,7,"4. Agunan ini merupakan jaminan dari pinjaman kredit Pihak Kedua pada pengelola UED-SP ",0,1,"J");
$pdf->Cell(15,7,"");
$pdf->Cell(0,7,"Barokah dan agunan dapat diambil setelah seluruh angsuran lunas. ",0,1,"J");
$pdf->Cell(10,7,"");
$pdf->Cell(0,7,"5. Kami bersedia mematuhi dan menjalankan semua peraturan yang berlaku di UED-SP Barokah ",0,1,"J");
$pdf->Cell(15,7,"");
$pdf->Cell(0,7,"Desa Senderak ",0,1,"J");

$pdf->Ln();
$pdf->Cell(0,5,"Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan",0,1,"J");
$pdf->Cell(0,7,"dari pihak manapun.",0,1,"L");

$pdf->Ln();
$pdf->Cell(0,20,"Senderak,............................ 2018",0,1,"C");
$pdf->Cell(15,7,"");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,"Yang Membuat Perjanjian",0,1,"C");
$pdf->Cell(0,5,"Pihak Kedua                                   
                                                Pihak Pertama",0,1,"L");
$pdf->Cell(0,7,"Pengelola UED-SP                 Pemanfaat	",0,1,"L");
$pdf->Cell(0,25,"                                                                                                    (___________________)",0,1,"L");
$pdf->Cell(0,6,"Saksi-Saksi",0,1,"L");
$pdf->Cell(0,6,"1. Ketua	                               (........................)",0,1,"L");
$pdf->Cell(0,6,"                                               LILI SURYANI",0,1,"L");
$pdf->Ln();
$pdf->Cell(0,6,"2. Tata Usaha	                      (........................)",0,1,"L");
$pdf->Cell(0,6,"                                                Helida, A.Md",0,1,"L");
$pdf->Ln();
$pdf->Cell(0,6,"3. Staf Analisis Kredit	         (........................)",0,1,"L");
$pdf->Cell(0,6,"                                                    Rosita",0,1,"L");
$pdf->Cell(0,7,"Mengetahui,",0,1,"C");
$pdf->Cell(0,7,"KEPALA DESA SENDERAK                                 PENDAMPING DESA",0,1,"C");
$pdf->Cell(0,40,"      HARIANTO, SH                                                 NOFITA MULYANI,S.Pd.I",0,1,"C");
$pdf->Output();
?>
