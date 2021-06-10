<?php
foreach($ambil_pemanfaat->result() as $p);
foreach($ambil_pinjaman->result() as $t);
foreach($ambil_agunan->result() as $a);
$tglPinjam = $t->tanggal_pinjaman;

$pdf = new FPDF();
$pdf->AddPage("P","legal");
$pdf->SetMargins(20,0,20);
$pdf->SetTitle("Surat Penyerahan Agunan");
$pdf->Ln(5);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,7,"SURAT KUASA PEMAKAIAN AGUNAN",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$txt1 = "Pada hari ini ".hari($tglPinjam)." Tanggal ".get_tanggal($tglPinjam)." Bulan ".getBulan(getBln($tglPinjam)).
    " Tahun ".getThn($tglPinjam)." Kami yang bertanda tangan di bawah ini :";
$pdf->MultiCell(0,6,$txt1,0,"J");
$pdf->Cell(10,2,"",0,1);
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

$pdf->Cell(0,6,"Selaku pemilik agunan yang selanjutnya disebut sebagai Pihak Pertama",0,1,"L");

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
$pdf->Cell(0,6,"Selaku pemakai agunan yang selanjutnya disebut sebagai Pihak Kedua",0,1,"L");
$pdf->Cell(10,2,"",0,1);
$pdf->Cell(0,6,"Pihak Pertama dan Pihak Kedua bersepakat membuat perjanjian sebagai berikut :",0,1,"J");
$pdf->Cell(10,6,"");
$column_width = ($pdf->GetPageWidth()-50);
$text[1]="Pihak Pertama menyerahkan dan menguasakan pemakaian agunan kepada Pihak Kedua berupa ".
    $a->jenis_agunan." atas nama ".$a->nama_pemilik." No Surat ".
    $a->no_surat_agunan." Alamat ".$a->alamat_agunan;
$text[2]="Agunan ini merupakan jaminan dari pinjaman kredit Pihak Kedua pada pengelola UED/K-SP Barokah dan agunan dapat diambil setelah seluruh angsuran lunas";
$pdf->MultiCellBlt($column_width,6,"1.",$text[1]);
$pdf->MultiCellBlt($column_width,6,"2.",$text[2]);
$txt = "Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan dari pihak manapun.";
$pdf->Cell(10,1,"",0,1);
$pdf->MultiCell($pdf->GetPageWidth()-40,6,$txt,"J");

$pdf->Ln();
$pdf->Cell(0,7,"Senderak, ".tgl_indo($t->tanggal_pinjaman),0,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,"Yang Membuat Kesepakatan",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,7,"Pihak Kedua",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,7,"Pihak Pertama",0,1,"C");
$pdf->Ln(15);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,7,"( ".$p->nama_pemanfaat." )",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,7,"( ".$a->nama_pemilik." )",0,1,"C");
$pdf->Ln(5);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,5,"Saksi-saksi",0,1,"C");
$pdf->Cell(0,5,"Ketua",0,1,"C");
$pdf->Ln(15);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,5,"LILI SURYANI",0,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,15,"Tata Usaha",0,1,"C");
$pdf->Ln(15);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,5,"HELIDA, A.Md",0,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,15,"Staf Analisis Kredit",0,1,"C");
$pdf->Ln(15);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,25,"ROSITA",0,1,"C");

$pdf->Output("","Surat Kuasa Pemakaian Agunan.pdf");
?>
