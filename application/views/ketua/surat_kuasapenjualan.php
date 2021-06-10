<?php
foreach($ambil_pemanfaat->result() as $p);
foreach($ambil_pinjaman->result() as $t);
foreach($ambil_agunan->result() as $a);
foreach($ambilPengurus->result() as $d);
foreach($ambil_kades->result() as $kades);
foreach($ambil_bpd->result() as $bpd);
foreach($ambil_pendamping->result() as $pen);
$tglPinjam = $t->tanggal_pinjaman;

$pdf = new FPDF();
$pdf->AddPage("P","legal");
$pdf->SetMargins(15,0,15);
$pdf->SetTitle("Surat Kuasa Penjualan Agunan");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,7,"SURAT KUASA PENJUALAN AGUNAN",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);$txt1 = "Pada hari ini ".hari($tglPinjam)." Tanggal ".get_tanggal($tglPinjam)." Bulan ".getBulan(getBln($tglPinjam)).
    " Tahun ".getThn($tglPinjam)." Kami yang bertanda tangan di bawah ini :";
$pdf->MultiCell(0,6,$txt1,0,"J");

$pdf->Cell(10,6,"",0,0,"L");
$pdf->Cell(50,6,"Nama",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,6,$p->nama_pemanfaat,0,1,"L");
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,6,"",0,0,"L");
$pdf->Cell(50,6,"Tempat, Tgl Lahir",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$p->tempat_lahir_pemanfaat." / ".tgl_indo($p->tgl_lahir_pemanfaat),0,1,"L");
$pdf->Cell(10,6,"",0,0,"L");
$pdf->Cell(50,6,"Pekerjaan",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$p->pekerjaan_pemanfaat,0,1,"L");
$pdf->Cell(10,6,"",0,0,"L");
$pdf->Cell(50,6,"Alamat",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,$p->alamat_pemanfaat,0,1,"L");

$pdf->Cell(6,8,"Selanjutnya disebut sebagai Pihak Pertama",0,1,"L");

$pdf->Cell(10,6,"",0,0,"L");
$pdf->Cell(50,6,"Nama",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,6,"Pengelola UED/K-SP Barokah",0,1,"L");
$pdf->SetFont('Arial','',12);
$pdf->Cell(10,6,"",0,0,"L");
$pdf->Cell(50,6,"Alamat",0,0,"L");
$pdf->Cell(5,6,":",0,0,"L");
$pdf->Cell(100,6,"Jl. Utama Desa Senderak RT 01 / RW 01",0,1,"L");

$pdf->Cell(0,8,"Selanjutnya disebut sebagai Pihak Kedua",0,1,"L");

$pdf->Cell(0,6,"Pihak Pertama dan Pihak Kedua bersepakat membuat perjanjian sebagai berikut :",0,1,"J");
$pdf->Cell(10,6,"");
$text[1]="Pihak Pertama memberikan kuasa penjualan agunan kepada Pihak Kedua berupa ".
    $a->jenis_agunan." atas nama ".$a->nama_pemilik." No Surat ".
    $a->no_surat_agunan." Alamat ".$a->alamat_agunan.".";
$text[2]="Penjualan agunan dilakukan apabila Pihak Pertama tidak membayar pinjaman dana pada Pihak Kedua sesuai dengan Surat Pemberian Pinjaman Kredit.";
$text[3]="Teknis Penjualan dan Harga penjualan agunan diatur oleh Pihak Kedua dan Pemerintah Desa.";
$text[4]="Penjualan dilakukan untuk membayar sisa pinjaman dana UED/K-SP.";
$text[5]="Bila ada sisa dari penjualan agunan akan dikembalikan pada Pihak Pertama.";
$text[6]="Bila terjadi perselisihan antara Pihak Pertama dengan Pihak Kedua akan diselesaikan secara musyawarah dan apabila tidak mendapat kesepakatan maka diselesaikan secara hukum.";


$column_width = ($pdf->GetPageWidth()-40);
for($i=1;$i<=6;$i++) {
    $pdf->MultiCellBlt($column_width, 6, "$i.", $text[$i]);
}
$pdf->Cell(10,0,"",0,1);
$txt = "Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan dari pihak manapun.";
$pdf->Cell(10,1,"",0,1);
$pdf->MultiCell(0,6,$txt,"J");

$pdf->Ln();
$pdf->Cell(0,6,"Senderak, ".tgl_indo($t->tanggal_pinjaman),0,1,"C");

$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,6,"Yang Membuat Perjanjian",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pihak Kedua",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pihak Pertama",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pengelola UED-SP",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pemanfaat",0,1,"C");


$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"1. Ketua",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,1,"R");
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$d->ketua,0,1,"L");
$pdf->Ln();

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"2. Tata Usaha",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,0,"R");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"(".$p->nama_pemanfaat.")",0,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$d->tata_usaha,0,1,"L");
$pdf->Ln();

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"3. Kasir",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,1,"R");
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$d->kasir,0,1,"L");
$pdf->Ln();

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"4. SAK",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,1,"R");
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$d->sak,0,1,"L");
$pdf->Ln();

$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Saksi-Saksi",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"MENGETAHUI",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"KEPALA DESA SENDERAK",0,1,"C");

$pdf->SetFont('Arial','',12);
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2+15,10,"1. Istri / Suami / Ahli Waris",0,0,"L");
$pdf->Cell(((($pdf->GetPageWidth()-40)/2)/2)-5,10,".......................",0,1,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2+15,10,"2. BPD",0,0,"L");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(((($pdf->GetPageWidth()-40)/2)/2)-5,10,$bpd->nama_bpd,0,1,"L");
$pdf->SetFont('Arial','',12);
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2+15,10,"3. Pendamping Desa / Kel",0,0,"L");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(((($pdf->GetPageWidth()-40)/2)/2)-5,10,$pen->nama_pendamping_desa,0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)-20,6,$kades->nama_kades,0,1,"C");


$pdf->Output("","Surat Kuasa Penjualan.pdf");
?>
