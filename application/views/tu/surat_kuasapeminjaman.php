<?php
foreach($ambil_pemanfaat->result() as $p);
foreach($ambil_pinjaman->result() as $t);
foreach($ambil_agunan->result() as $a);
foreach($ambil_pengurus->result() as $y);

foreach($ambil_kades->result() as $kd);
foreach($ambil_pendamping->result() as $pd);
$pdf = new FPDF();
$pdf->AddPage("P","legal");
$pdf->SetMargins(20,0,20);
$pdf->SetTitle("Surat Kuasa Peminjaman Agunan");
$pdf->SetFont('Arial','BU',12);

$pdf->Cell(0,7,"SURAT KUASA PEMINJAMAN AGUNAN",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,7,"Kami yang bertanda tangan dibawah ini:",0,1,"L");
$pdf->Cell(50,6,"Nama",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$a->nama_pemilik,0,1,"L");
$pdf->Cell(50,6,"Tempat, Tgl Lahir",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$a->tempat_lahir_pemilik." / ".tgl_indo($a->tanggal_lahir_pemilik),0,1,"L");
$pdf->Cell(50,6,"Pekerjaan",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$a->pekerjaan_pemilik,0,1,"L");
$pdf->Cell(50,6,"Alamat",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$a->alamat_pemilik,0,1,"L");

$pdf->Cell(10,2,"",0,1);

$pdf->Cell(0,6,"Selaku pemilik agunan yang selanjutnya disebut sebagai PIHAK PERTAMA",0,1,"L");

$pdf->Cell(10,2,"",0,1);
$pdf->Cell(50,6,"Nama",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$p->nama_pemanfaat,0,1,"L");
$pdf->Cell(50,6,"Tempat, Tgl Lahir",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$p->tempat_lahir_pemanfaat." / ".tgl_indo($p->tgl_lahir_pemanfaat),0,1,"L");
$pdf->Cell(50,6,"Pekerjaan",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$p->pekerjaan_pemanfaat,0,1,"L");
$pdf->Cell(50,6,"Alamat",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$p->alamat_pemanfaat,0,1,"L");

$pdf->Cell(10,2,"",0,1);
$pdf->Cell(0,6,"Selaku pemakai agunan yang selanjutnya disebut sebagai PIHAK KEDUA",0,1,"L");
$pdf->Cell(10,2,"",0,1);
$pdf->Cell(0,6,"Pihak Pertama dan Pihak Kedua bersepakat membuat perjanjian sebagai berikut :",0,1,"J");
$pdf->Cell(10,6,"");
$column_width = ($pdf->GetPageWidth()-50);
$text[1]="PIHAK PERTAMA memberikan pemakaian agunan kepada PIHAK KEDUA berupa ".
    $a->jenis_agunan." atas nama ".$a->nama_pemilik." No Surat ".
    $a->no_surat_agunan." Alamat ".$a->alamat_agunan;

$text[2]="PIHAK KEDUA telah mempunyai kuasa penuh atas agunan tersebut selama pinjaman di UED-SP  Barokah Desa Senderak Kecamatan Bengkalis.";
$text[3]="PIHAK PERTAMA tidak akan mempermasalahkan/ mengambil/menggugat kepada lembaga UED-SP Barokah apabila agunan yang diberikan kepada PIHAK KEDUA dijual oleh UED-SP Barokah yang disebabkan oleh PIHAK KEDUA tidak mampu membayar angsuran kredit yang telah disetujui bersama";
$text[4]="Agunan ini merupakan jaminan dari pinjaman kredit Pihak Kedua pada pengelola UED-SP Barokah dan agunan dapat diambil setelah seluruh angsuran lunas.";
$text[5]="Kami bersedia mematuhi dan menjalankan semua peraturan yang berlaku di UED-SP Barokah Desa Senderak";
$pdf->MultiCellBlt($column_width,6,"1.",$text[1]);
$pdf->MultiCellBlt($column_width,6,"2.",$text[2]);
$pdf->MultiCellBlt($column_width,6,"3.",$text[3]);
$pdf->MultiCellBlt($column_width,6,"4.",$text[4]);
$pdf->MultiCellBlt($column_width,6,"5.",$text[5]);
$txt = "Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan dari pihak manapun.";
$pdf->Cell(10,1,"",0,1);
$pdf->MultiCell($pdf->GetPageWidth()-40,6,$txt,"J");
$pdf->Ln();
$pdf->Cell(0,7,"Senderak, ".tgl_indo($t->tanggal_pinjaman),0,1,"C");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,7,"Yang Membuat Kesepakatan",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pihak Kedua",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pihak Pertama",0,1,"C");
$pdf->Ln(10);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"( ".$p->nama_pemanfaat." )",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"( ".$a->nama_pemilik." )",0,1,"C");
$pdf->Ln(5);

$pdf->SetFont("Arial","",10);
$pdf->Cell(0,6,"Saksi-Saksi",0,1,"L");
$pdf->Cell(50,6,"1. Ketua",0,0,"L");
$pdf->Cell(30,6,"(................................)",0,1,"C");
$pdf->Cell(50,6,"",0,0,"L");
$pdf->Cell(30,6,$y->ketua,0,1,"C");
$pdf->Ln();
$pdf->Cell(50,6,"2. Tata Usaha",0,0,"L");
$pdf->Cell(30,6,"(................................)",0,1,"C");
$pdf->Cell(50,6,"",0,0,"L");
$pdf->Cell(30,6,$y->tata_usaha,0,1,"C");
$pdf->Ln();
$pdf->Cell(50,6,"3. Staf Analis Kredit",0,0,"L");
$pdf->Cell(30,6,"(................................)",0,1,"C");
$pdf->Cell(50,6,"",0,0,"L");
$pdf->Cell(30,6,$y->sak,0,1,"C");
$pdf->Ln();



$pdf->Cell(0,7,"Mengetahui",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Kepala Desa Senderak",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pendamping Desa",0,1,"C");
$pdf->Ln(15);
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"( ".$kd->nama_kades." )",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"( ".$pd->nama_pendamping_desa." )",0,1,"C");
$pdf->Output("","Surat Kuasa Peminjaman Agunan");
?>
