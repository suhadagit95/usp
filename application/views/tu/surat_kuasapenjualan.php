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
$pdf->SetTitle("Surat Kuasa Penjualan Agunan");
$pdf->SetFont('Arial','B',12);
$pdf->Ln(20);
$pdf->Cell(0,7,"SURAT KUASA PENJUALAN AGUNAN",0,1,"C");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,7,"No:          /UNIT USP/Desa ".$pusp->nama_desa."/Kec.Bengkalis          ",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$txt1 = "Pada hari ini ".hari($tglPinjam)." Tanggal ".get_tanggal($tglPinjam)." Bulan ".getBulan(getBln($tglPinjam)).
    " Tahun ".getThn($tglPinjam)." Kami yang bertanda tangan di bawah ini :";
$pdf->MultiCell(0,7,$txt1,0,"J");

$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"Nama",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,7,$p->nama_pemanfaat,0,1,"L");
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"Tempat, Tgl Lahir",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->tempat_lahir_pemanfaat." / ".tgl_indo($p->tgl_lahir_pemanfaat),0,1,"L");
$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"Pekerjaan",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->pekerjaan_pemanfaat,0,1,"L");
$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"Alamat",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->alamat_pemanfaat,0,1,"L");

$pdf->Cell(6,8,"Selanjutnya disebut sebagai Pihak Pertama",0,1,"L");

$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"Nama",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,7,"Pengelola ".$pusp->nama_usp_surat,0,1,"L");
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,7,"",0,0,"L");
$pdf->Cell(50,7,"Alamat",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$pusp->alamat_usp,0,1,"L");

$pdf->Cell(0,8,"Selanjutnya disebut sebagai Pihak Kedua",0,1,"L");

$pdf->Cell(0,7,"Pihak Pertama dan Pihak Kedua bersepakat membuat perjanjian sebagai berikut :",0,1,"J");
$pdf->Cell(10,7,"");
$text[1]="Pihak Pertama memberikan kuasa jual agunan milik Pihak Pertama yang menjadi jaminan pinjaman kepada Pihak Kedua berupa ".
    $a->jenis_agunan." atas nama ".$a->nama_pemilik." No Surat ".
    $a->no_surat_agunan." Alamat ".$a->alamat_agunan.".";
$text[2]="Kuasa Jual Agunan Pihak Pertama yang dikuasakan pada Pihak Kedua ini berlaku apabila Pihak Pertama tidak membayar pinjaman kepada Pihak Kedua sesuai dengan Surat Pemberian Pinjaman Kredit";
$text[3]="Harga Agunan dihitung berdasarkan masa Periode pinjaman berakhir, adapun harga jual agunan pada saat penjualan sebesar: Rp.                  
(..........................................................................................................................................).";
$text[4]="Dalam masa penjualan, jika harga agunan mengalami penyusutan dan tidak menutupi sisa pinjaman, maka Pihak Pertama wajib melunasi sisa pinjaman piutang yang ada.";
$text[5]="Dana dari hasil penjualan agunan terlebih dahulu dikurangi sisa pinjaman dan jasa pihak pertama kepada pihak kedua, sisa setelah dilakukan pengurangan akan diserahkan pada pihak pertama";
$text[6]="Mekanisme penjualan agunan diserahkan sepenuhnya pada pihak kedua.";


$column_width = ($pdf->GetPageWidth()-40);
for($i=1;$i<=6;$i++) {
    $pdf->MultiCellBlt($column_width, 7, "$i.", $text[$i]);
}
$pdf->Cell(10,0,"",0,1);
$txt = "Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan dari pihak manapun.";
$pdf->Cell(10,1,"",0,1);
$pdf->MultiCell(0,7,$txt,"J");

$pdf->Ln();

//halaman 2
$pdf->AddPage("P","legal");
$pdf->Ln(30);
$pdf->Cell(0,6,$pusp->nama_desa.", ".tgl_indo($t->tanggal_pinjaman),0,1,"R");
$pdf->Ln();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,6,"Yang Membuat Perjanjian",0,1,"C");
$pdf->Cell(0,6,"Kuasa Jual Agunan",0,1,"C");
$pdf->Ln();
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Pihak Kedua",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Pihak Pertama",0,1,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Unit USP ".$pusp->nama_usp_surat." Desa ".$pusp->nama_desa,0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Pemanfaat",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,3,"Ketua Unit ",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,3,"",0,1,"C");

$pdf->Ln(25);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,$d->ketua,0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,$p->nama_pemanfaat,0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Kasir",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Saksi Pihak Pertama",0,1,"C");
$pdf->Ln(25);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,$d->kasir,0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"                                     ",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Tata Usaha",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,"Saksi Pihak Kedua/SAK",0,1,"C");
$pdf->Ln(25);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,$d->tata_usaha,0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,10,$d->sak,0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,6,"Mengetahui:",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell((($pdf->GetPageWidth()-7)/2)/2+15,10,"Komisaris BUM Desa",0,0,"C");
$pdf->Cell(((($pdf->GetPageWidth()-7)/2)/2)-5,10,"Direktur BUM Desa",0,0,"C");
$pdf->Cell((($pdf->GetPageWidth()-7)/2)-20,6,"Pendamping Desa ",0,1,"C");

$pdf->Cell((($pdf->GetPageWidth()-7)/2)/2+15,10,$pusp->bum_desa,0,0,"C");
$pdf->Cell(((($pdf->GetPageWidth()-7)/2)/2)-5,10,$pusp->bum_desa,0,0,"C");
$pdf->Cell((($pdf->GetPageWidth()-7)/2)-20,6,"Ekonomi",0,1,"C");

$pdf->Cell((($pdf->GetPageWidth()-7)/2)/2+15,10,"Desa ".$pusp->nama_desa,0,0,"C");
$pdf->Cell(((($pdf->GetPageWidth()-7)/2)/2)-5,10,"Desa ".$pusp->nama_desa,0,0,"C");
$pdf->Cell((($pdf->GetPageWidth()-7)/2)-20,6,"Desa ".$pusp->nama_desa,0,1,"C");
$pdf->Ln(25);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell((($pdf->GetPageWidth()-7)/2)/2+15,10,$d->komisaris_bumdes,0,0,"C");
$pdf->Cell(((($pdf->GetPageWidth()-7)/2)/2)-5,10,$d->direktur_bumdes,0,0,"C");
$pdf->Cell((($pdf->GetPageWidth()-7)/2)-20,6,$pen->nama_pendamping_desa,0,1,"C");



$pdf->Output("","Surat_kuasa_jual_agunan_pemanfaat.pdf");
?>
