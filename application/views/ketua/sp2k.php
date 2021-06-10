<?php
require('fpdf/fpdf.php');
						
$pdf = new FPDF();
$pdf->AddPage("P","legal");

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,7,"SURAT PERJANJIAN PEMBERIAN KREDIT",0,1,"C");
$pdf->Cell(10,3,"");
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,7,"No.        /PPKMP/UED-SP Barokah/ Desa Senderak/ Kec. Bengkalis/2018 ",0,1,"C");

$pdf->Cell(0,7,"Pada hari ini ............. Tanggal .............. Bulan ............. tahun 2018 Kami yang bertanda tangan dibawah ini :",0,1,"L");
$pdf->Cell(10,7,"");
$pdf->Cell(6,7,"Nama",0,1,"L");
$pdf->Cell(10,7,"");
$pdf->Cell(6,7,"Alamat",0,1,"L");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(6,7,"(Selaku Pemanfaat Dana Usaha Desa, Selanjutnya disebut Pihak Pertama)",0,1,"L");
$pdf->Cell(10,7,"");
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,7,"Nama       : Pengelola UED-SP Barokah Desa Senderak",0,1,"L");
$pdf->Cell(10,7,"");
$pdf->Cell(0,7,"Alamat	      : Jl. Utama Dusun Pembangunan Desa Senderak",0,1,"L");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(6,7,"(Selaku Penanggung Jawab Pelaksaan Kegiatan Peminjaman Dana Usaha Desa Senderak,",0,1,"L");
$pdf->Cell(6,7,"Kecamatan Bengkalis, Kabupaten Bengkalis, Selanjutnya disebut Pihak Kedua)",0,1,"L");
$pdf->SetFont('Arial','',12);
$pdf->Ln();
$pdf->Cell(0,4,"Pihak Pertama dan Pihak Kedua sepakat membuat perjanjian pada ............................................",0,1,"J");
$pdf->Cell(0,6,"dengan ketentuan sebagai berikut :",0,1,"J");

$pdf->Cell(4,6,"1. Pihak Pertama mendapat pinjaman pokok dari Pihak Kedua sebesar Rp. ..........................",0,1,"L");
$pdf->Cell(5,6,"");
$pdf->Cell(5,6,"dengan jasa pinjaman 12% pertahun atau 1% perbulan dipergunakan untuk ......................... ",0,1,"J");
$pdf->Cell(4,6,"2. pihak Pertama wajib mengembalikan pinjaman pokok melalui angsuran sebesar Rp. .........",0,1,"L");
$pdf->Cell(5,6,"");
$pdf->Cell(5,6,"perbulan ditambah jasa pinjaman sebesar Rp. ................ perbulan atau (berdasarkan siklus usaha) ",0,1,"J");
$pdf->Cell(4,6,"3. Pihak Pertama wajib membayar angsuran pokok, jasa wajib sebanyak Rp. .................",0,1,"L");
$pdf->Cell(5,6,"");
$pdf->Cell(5,6,"perbulan dan dibayar setelah sebulan dana diterima. ",0,1,"J");
$pdf->Cell(4,6,"4. Jika terjadi keterlambatan pembayaran angsuran oleh Pihak Pertama, maka dikenakan denda sebesar",0,1,"L");
$pdf->Cell(5,6,"");
$pdf->Cell(5,6,"Rp.............. perhari (dihitung mulai tanggal 16 setiap bulannya) sesuai dengan ketentuan AD/ART",0,1,"J");
$pdf->Cell(5,6,"");
$pdf->Cell(5,6,"yang telah disepakati ",0,1,"J");
$pdf->Cell(4,6,"5. Jika Pihak Pertama tidak melunasi angsuran pinjaman maka dikenakan sanksi dari Pihak Kedua",0,1,"L");

$pdf->Cell(4,6,"6. Jika Pihak Pertama telah diberikan sanksi dan tidak melakukan pembayaran sesuai dengan kesepakatan, ",0,1,"J");
$pdf->Cell(5,6,"");
$pdf->Cell(5,6,"maka jaminan agunan Pihak Pertama dilakukan penyitaan dan penjualan oleh Pihak Kedua ",0,1,"J");
$pdf->Cell(4,6,"7. Mekanisme penyitaan dan penjualan terjadi masalah, agar Pihak Kedua dan Pemerintahan Desa ",0,1,"J");
$pdf->Cell(5,6,"8. Jika dalam melakukan penyitaan dan penjualan terjadi masalah, agar Pihak Kedua melibatkan ",0,1,"J");
$pdf->Cell(5,6,"");
$pdf->Cell(5,6,"Aparat Penegak Hukum",0,1,"J");
$pdf->Cell(5,6,"9. Surat Perjanjian Pemberian Kredit atau SP2K dubuat sebanyak dua rangkap bermatrai, masing-masing ",0,1,"J");
$pdf->Cell(5,6,"");
$pdf->Cell(5,6,"memegang satu rangkap bermatrai ",0,1,"J");
$pdf->Cell(5,6,"10. lain-lain yang belum ditetapkan pada kesepakatan ini merujuk pada Petunjukan Teknis program ",0,1,"J");
$pdf->Cell(5,6,"");
$pdf->Cell(5,6,"Peningkatan Keberdayaan Masyarakat. ",0,1,"J");


$pdf->Ln();
$pdf->Cell(0,5,"Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan",0,1,"J");
$pdf->Cell(0,5,"dari pihak manapun.",0,1,"L");
$pdf->Ln();
$pdf->Cell(0,5,"                                                                                                 Senderak,............................ 2018",0,1,"L");

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,5,"Pihak Kedua                                   
                                                 Pihak Pertama",0,1,"L");
$pdf->Cell(0,6,"Pengelola UED-SP                                                                             Pemanfaat	",0,1,"L");
$pdf->Cell(0,5,"1. Ketua          : LILI SURYANI           ........................",0,1,"L");
																					
$pdf->Ln();
$pdf->Cell(0,6,"2. Tata Usaha : HELIDA, A.Md	          ........................",0,1,"L");

$pdf->Ln();
$pdf->Cell(0,6,"3. Kasir	           : Rizki Azuardi            ........................                  (                           )",0,1,"L");

$pdf->Ln();
$pdf->Cell(0,6,"4. SAK	             : Rosita                       ........................",0,1,"L");

$pdf->Cell(0,7,"                                                                                                      Mengetahui",0,1,"L");
$pdf->Cell(0,7,"Saksi-saksi                                                                        Kepala Desa Senderak ",0,1,"l");
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,7,"1. Istri/ Suami/ Ahli waris  ........................",0,1,"L");
$pdf->Cell(0,7,"2. Ketua BPD                    ........................",0,1,"L");
$pdf->Cell(0,7,"3. Pendamping Desa        ........................                           NOFITA MULYANI, S.Pd.I",0,1,"L");


$pdf->Output();
?>
