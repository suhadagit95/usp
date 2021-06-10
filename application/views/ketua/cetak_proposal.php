<?php
foreach($ambil_pemanfaat->result() as $p);
foreach($ambil_pinjaman->result() as $t);
foreach($ambil_agunan->result() as $a);
foreach($ambil_pengurus->result() as $y);
foreach($ambil_kades->result() as $kd);
foreach($ambil_pendamping->result() as $pd);
foreach($ambil_bpd->result() as $bp);

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
$pdf->Cell(50, 7, "Nama", 0, 0, "L");
$pdf->Cell(10,7,":",0,0,"L");
$pdf->Cell(100,7,$p->nama_pemanfaat,0,1,"L");
$pdf->Cell(50,7,"Pekerjaan",0,0,"L");
$pdf->Cell(10,7,":",0,0,"L");
$pdf->Cell(100,7,$p->pekerjaan_pemanfaat,0,1,"L");
$pdf->Cell(50,7,"Alamat",0,0,"L");
$pdf->Cell(10,7,":",0,0,"L");
$pdf->Cell(100,7,$p->alamat_pemanfaat,0,1,"L");

$pdf->Ln();
$pdf->MultiCell(0,6,"       Dengan ini mengajukan permohonan kredit sebesar ".rupiah($t->jumlah_pinjaman)." Terbilang : ".
    ucwords(terbilang($t->jumlah_pinjaman))."untuk memenuhi tambahan modal usaha ".
    $t->nama_usaha.".",0,"J");
$pdf->Ln();
$pdf->Cell(0,6,"        Sebagai bahan pertimbangan, bersama ini saya sampaikan proposal dengan lampiran : ",0,1,"L");
$pdf->Cell(0,6,"I.     Profil Pemanfaat dan Peta Lokasi Agunan Pas Foto 3 x 4 (Menyusaikan) ",0,1,"L");
$pdf->Cell(0,6,"II.    Kartu Keluarga dan KTP ",0,1,"L");
$pdf->Cell(0,6,"III.   Rencana Usaha Pemanfaat (RUP) ",0,1,"L");
$pdf->Cell(0,6,"IV.   Surat Penyerahan Agunan ",0,1,"L");
$pdf->Cell(0,6,"V.    Surat Kuasa Pemakaian Agunan (Agunan Pihak Lain) ",0,1,"L");
$pdf->Cell(0,6,"VI.   Surat Kuasa Penjualan Agunan",0,1,"L");
$pdf->Cell(0,6,"VII.  Surat Kesepakatan Sanki-Sanki yang telah ditetapkan  ",0,1,"L");
$pdf->Cell(0,6,"VIII. Lembar Photo Usaha ",0,1,"L");
$pdf->Cell(0,6,"X.    Surat Agunan Asli, Fotocopy Agunan dan Photo yang diagunkan ",0,1,"L");
$pdf->Cell(0,6,"Demikian permohonan ini diampaikan, atas perhatiannya saya ucapkan terima kaih.",0,1,"L");

$pdf->Ln();
$pdf->Cell(300,20,"Senderak, ".tgl_indo($t->tanggal_pinjaman),0,1,"C");
$pdf->Cell(300,50,$p->nama_pemanfaat,0,1,"C");

//Rencana Angsuran

$pdf->AddPage("P","legal");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,7,"RENCANA ANGSURAN",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,7,"Nama",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,$p->nama_pemanfaat,0,1);
$pdf->Cell(60,7,"Alamat",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,$p->alamat_pemanfaat,0,1);
$pdf->Cell(60,7,"Jumlah Pinjaman",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,rupiah($t->jumlah_pinjaman),0,1);
$pdf->Cell(60,7,"Jangka Waktu",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,$t->jangka_waktu." Bulan",0,1);
$pdf->Cell(60,7,"Sistem Angsuran",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,$t->sistem_angsuran,0,1);
$pdf->Cell(60,7,"Persentase Jasa Pinjaman",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,$t->jangka_waktu."%",0,1);
$pdf->Cell(60,7,"Jumlah Jasa Pinjaman",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,rupiah($total_jasa_pinjaman),0,1);
$pdf->Cell(60,7,"Jaminan (Agunan)",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(100,7,$jenis_agunan,0,1);

$pdf->Ln();
$pdf->SetFont("Arial","B",12);
$pdf->Cell(0,7,"Rencana Angsuran",0,1);
$pdf->Cell(30,7,"Angsuran Ke",1,0,"C");
$pdf->Cell(30,7,"Tanggal",1,0,"C");
$pdf->Cell(40,7,"Angsuran Pokok",1,0,"C");
$pdf->Cell(40,7,"Jasa",1,0,"C");
$pdf->Cell(40,7,"Jumlah",1,1,"C");
if($jangka_waktu<=12){
    $tinggi = 8;
}elseif($jangka_waktu>=12 && $jangka_waktu<=24){
    $tinggi = 6;
}elseif($jangka_waktu>24){
    $tinggi = 5;
}

$pdf->SetFont("Arial","",12);
for($i=1;$i<=$jangka_waktu;$i++){
    $pdf->Cell(30,$tinggi,$i,1,0,"C");
    $pdf->Cell(30,$tinggi,"",1,0,"C");
    $pdf->Cell(40,$tinggi,"",1,0,"C");
    $pdf->Cell(40,$tinggi,"",1,0,"C");
    $pdf->Cell(40,$tinggi,"",1,1,"C");
}
$pdf->Ln();
$pdf->Cell(($pdf->GetPageWidth()-40)/2+20,6,"",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Bengkalis, ".tgl_indo($t->tanggal_pinjaman),0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2+20,6,"Disetujui Oleh:",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Dibuat Oleh:",0,1,"C");

$pdf->SetFont("Arial","",12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2+20,6,"Ketua UED-SP",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pemanfaat Dana",0,1,"C");
$pdf->Ln(20);
$pdf->SetFont("times","BU",12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2+20,6,$ketua_ued,0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,$p->nama_pemanfaat,0,1,"C");


//DAFTAR RENCANA PEMBELIAN BARANG YANG AKAN DATANG
$pdf->AddPage("P","legal");
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,7,"DAFTAR RENCANA PEMBELIAN BARANG",0,1,"C");
$pdf->Cell(0,7,"YANG AKAN DATANG",0,1,"C");
$pdf->Ln();

$pdf->SetFont("Times","B",12);
$pdf->Cell(10,10,"No",1,0,"C");
$pdf->Cell(100,10,"Nama Barang",1,0,"C");
$pdf->Cell(30,10,"Jumlah Brg",1,0,"C");
$pdf->Cell(45,10,"Jumlah Harga",1,1,"C");
$pdf->SetFont("Times","",12);
for($i=1;$i<=25;$i++){
    $pdf->Cell(10,7,"",1,0,"C");
    $pdf->Cell(100,7," ",1,0,"C");
    $pdf->Cell(30,7," ",1,0,"C");
    $pdf->Cell(45,7,"Rp. ",1,1,"L");
}
$pdf->SetFont("Times","B",12);
$pdf->Cell(140,10,"JUMLAH TOTAL",1,0,"C");
$pdf->Cell(45,10,"Rp. ",1,1,"L");

$pdf->Ln(20);
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,7,"PEMBELIAN INVENTARIS YANG AKAN DATANG",0,1,"C");
$pdf->Ln();

$pdf->SetFont("Times","B",12);
$pdf->Cell(10,10,"No",1,0,"C");
$pdf->Cell(100,10,"Nama Barang",1,0,"C");
$pdf->Cell(30,10,"Jumlah Brg",1,0,"C");
$pdf->Cell(45,10,"Jumlah Harga",1,1,"C");
$pdf->SetFont("Times","",12);
for($i=1;$i<=7;$i++){
    $pdf->Cell(10,7,"",1,0,"C");
    $pdf->Cell(100,7," ",1,0,"C");
    $pdf->Cell(30,7," ",1,0,"C");
    $pdf->Cell(45,7,"Rp. ",1,1,"L");
}
$pdf->SetFont("Times","B",12);
$pdf->Cell(140,10,"JUMLAH TOTAL",1,0,"C");
$pdf->Cell(45,10,"Rp. ",1,1,"L");

//DAFTAR PERSEDIAN BARANG SAAT SEKARANG
$pdf->AddPage("P","legal");
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,7,"DAFTAR PERSEDIAAN BARANG",0,1,"C");
$pdf->Cell(0,7,"SAAT SEKARANG",0,1,"C");
$pdf->Ln();

$pdf->SetFont("Times","B",12);
$pdf->Cell(10,10,"No",1,0,"C");
$pdf->Cell(100,10,"Nama Barang",1,0,"C");
$pdf->Cell(30,10,"Jumlah Brg",1,0,"C");
$pdf->Cell(45,10,"Jumlah Harga",1,1,"C");
$pdf->SetFont("Times","",12);
for($i=1;$i<=25;$i++){
    $pdf->Cell(10,7,"",1,0,"C");
    $pdf->Cell(100,7," ",1,0,"C");
    $pdf->Cell(30,7," ",1,0,"C");
    $pdf->Cell(45,7,"Rp. ",1,1,"L");
}
$pdf->SetFont("Times","B",12);
$pdf->Cell(140,10,"JUMLAH TOTAL",1,0,"C");
$pdf->Cell(45,10,"Rp. ",1,1,"L");

$pdf->Ln(20);
$pdf->SetFont('Times','B',14);
$pdf->Cell(0,7,"DAFTAR INVENTARIS YANG ADA SEKARANG",0,1,"C");
$pdf->Ln();

$pdf->SetFont("Times","B",12);
$pdf->Cell(10,10,"No",1,0,"C");
$pdf->Cell(100,10,"Nama Barang",1,0,"C");
$pdf->Cell(30,10,"Jumlah Brg",1,0,"C");
$pdf->Cell(45,10,"Jumlah Harga",1,1,"C");
$pdf->SetFont("Times","",12);
for($i=1;$i<=7;$i++){
    $pdf->Cell(10,7,"",1,0,"C");
    $pdf->Cell(100,7," ",1,0,"C");
    $pdf->Cell(30,7," ",1,0,"C");
    $pdf->Cell(45,7,"Rp. ",1,1,"L");
}
$pdf->SetFont("Times","B",12);
$pdf->Cell(140,10,"JUMLAH TOTAL",1,0,"C");
$pdf->Cell(45,10,"Rp. ",1,1,"L");


//Surat Kuasa Pemakaian Agunan
$pdf->AddPage("P","legal");
$tglPinjam = $t->tanggal_pinjaman;
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
$pdf->Cell(0,5,$ketua_ued,0,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,15,"Tata Usaha",0,1,"C");
$pdf->Ln(13);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,5,$tatausaha,0,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,15,"Staf Analisis Kredit",0,1,"C");
$pdf->Ln(13);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,25,$sak,0,1,"C");


//SURAT PENYERAHAN AGUNAN
$pdf->AddPage("P","legal");
$pdf->Ln(10);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,7,"SURAT PENYERAHAN AGUNAN",0,1,"C");
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$txt1 = "Pada hari ini ".hari($tglPinjam)." Tanggal ".get_tanggal($tglPinjam)." Bulan ".getBulan(getBln($tglPinjam)).
    " Tahun ".getThn($tglPinjam)." Kami yang bertanda tangan di bawah ini :";
$pdf->MultiCell(0,7,$txt1,0,"J");
$pdf->Ln();
$pdf->Cell(50,7,"Nama",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->nama_pemanfaat,0,1,"L");
$pdf->Cell(50,7,"Tempat, Tgl Lahir",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->tempat_lahir_pemanfaat." / ".tgl_indo($p->tgl_lahir_pemanfaat),0,1,"L");
$pdf->Cell(50,7,"Pekerjaan",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->pekerjaan_pemanfaat,0,1,"L");
$pdf->Cell(50,7,"Alamat",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->alamat_pemanfaat,0,1,"L");
$pdf->Ln();
$pdf->Cell(0,7,"Selanjutnya disebut sebagai Pihak Pertama",0,1,"L");
$pdf->Ln();
$pdf->Cell(50,7,"Nama",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,"Pengelola UED/K-SP Barokah",0,1,"L");
$pdf->Cell(50,7,"Alamat",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,"Jl. Utama Desa Senderak RT 01 / RW 01",0,1,"L");

$pdf->Ln();
$pdf->Cell(0,7,"Selanjutnya disebut sebagai Pihak Kedua",0,1,"L");
$pdf->Ln();
$pdf->Cell(0,7,"Pihak Pertama dan Pihak Kedua bersepakat membuat perjanjian sebagai berikut :",0,1,"J");
$pdf->Cell(10,4,"",0,1);
$pdf->Cell(10,10,"");


$column_width = ($pdf->GetPageWidth()-50);
$text[1]="Pihak Pertama menyerahkan agunan kepada Pihak Kedua berupa ".
    $a->jenis_agunan." atas nama ".$a->nama_pemilik." No Surat ".
    $a->no_surat_agunan." Alamat ".$a->alamat_agunan;
$text[2]="Agunan ini merupakan jaminan kredit Pihak Pertama kepada Pihak Kedua, Agunan dapat diambil setelah seluruh angsuran lunas";
$pdf->MultiCellBlt($column_width,6,"1.",$text[1]);
$pdf->MultiCellBlt($column_width,6,"2.",$text[2]);

$txt = "Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan dari pihak manapun.";
$pdf->Cell(10,4,"",0,1);
$pdf->MultiCell($pdf->GetPageWidth()-40,6,$txt,"J");

$pdf->Ln(30);
$pdf->Cell(0,20,"                     Senderak, ".tgl_indo($t->tanggal_pinjaman),0,1,"C");
$pdf->SetFont("Arial","B",12);
$pdf->Cell(($pdf->GetPageWidth()-10)/2,7,"Pihak Kedua",0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-30)/2,7,"Pihak Pertama",0,1,"C");
$pdf->Cell((($pdf->GetPageWidth()-10)/2)/2,7,"Ketua",0,0,"C");
$pdf->Cell((($pdf->GetPageWidth()-10)/2)/2,7,"Tata Usaha",0,0,"C");
$pdf->Ln(30);
$ambilPengurus=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
foreach($ambilPengurus->result() as $w);
$pdf->Cell((($pdf->GetPageWidth()-10)/2)/2,7,$w->ketua,0,0,"C");
$pdf->Cell((($pdf->GetPageWidth()-10)/2)/2,7,$w->tata_usaha,0,0,"C");
$pdf->Cell(($pdf->GetPageWidth()-30)/2,7,$p->nama_pemanfaat,0,1,"C");


//SURAT  KUASA PENJUALAN AGUNAN
$pdf->AddPage("P","legal");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,7,"SURAT KUASA PENJUALAN AGUNAN",0,1,"C");
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$txt1 = "Pada hari ini ".hari($tglPinjam)." Tanggal ".get_tanggal($tglPinjam)." Bulan ".getBulan(getBln($tglPinjam)).
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
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$ketua_ued,0,1,"L");
$pdf->Ln();

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"2. Tata Usaha",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,0,"R");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"(".$p->nama_pemanfaat.")",0,1,"C");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$tatausaha,0,1,"L");
$pdf->Ln();

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"3. Kasir",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,1,"R");
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$kasir,0,1,"L");
$pdf->Ln();

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"4. SAK",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,1,"R");
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$sak,0,1,"L");
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
$pdf->Cell(((($pdf->GetPageWidth()-40)/2)/2)-5,10,$bp->nama_bpd,0,1,"L");
$pdf->SetFont('Arial','',12);
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2+15,10,"3. Pendamping Desa / Kel",0,0,"L");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(((($pdf->GetPageWidth()-40)/2)/2)-5,10,$pd->nama_pendamping_desa,0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)-20,6,$kd->nama_kades,0,1,"C");


//Surat Kuasa Peminjaman Agunan
$pdf->AddPage("P","legal");
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


//SP2K
$pdf->AddPage("P","legal");
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,5,"SURAT PERJANJIAN PEMBERIAN KREDIT",0,1,"C");
$pdf->SetFont('Arial','',10);
$pdf->Cell(0,5,"No.        /PPKMP/UED-SP Barokah/ Desa Senderak/ Kec. Bengkalis/2018 ",0,1,"C");

$pdf->Ln();
$pdf->SetFont('Arial','',10);
$txt1 = "Pada hari ini ".hari($tglPinjam)." Tanggal ".get_tanggal($tglPinjam)." Bulan ".getBulan(getBln($tglPinjam)).
    " Tahun ".getThn($tglPinjam)." Kami yang bertanda tangan di bawah ini :";
$pdf->MultiCell(0,6,$txt1,0,"J");

$pdf->Cell(50,5,"Nama",0,0,"L");
$pdf->Cell(5,5,":",0,0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,5,$p->nama_pemanfaat,0,1,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,"Alamat",0,0,"L");
$pdf->Cell(5,5,":",0,0,"L");
$pdf->Cell(100,5,$p->alamat_pemanfaat,0,1,"L");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(6,5,"(Selaku Pemanfaat Dana Usaha Desa, Selanjutnya disebut sebagai Pihak Pertama",0,1,"L");

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,"Nama",0,0,"L");
$pdf->Cell(5,5,":",0,0,"L");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(100,5,"Pengelola UED/K-SP Barokah",0,1,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell(50,5,"Alamat",0,0,"L");
$pdf->Cell(5,5,":",0,0,"L");
$pdf->Cell(100,5,"Jl. Utama Desa Senderak RT 01 / RW 01",0,1,"L");

$pdf->SetFont('Arial','B',10);
$text1 = "(Selaku Penanggung Jawab Pelaksanaan Kegiatan Pinjaman Dana Usaha Desa Senderak, Kecamata Bengkalis, Kabupaten Bengkalis, Selanjutnya disebut sebagai Pihak Kedua)";
$column_width = ($pdf->GetPageWidth()-40);
$pdf->MultiCell(0,5,$text1,0,"J");

$pdf->SetFont('Arial','',10);
$pdf->Ln();
$text2 = "Pihak Pertama dan Pihak Kedua sepakat membuat perjanjian pada Hari ".hari($tglPinjam)." Tanggal ".get_tanggal($tglPinjam)." Bulan ".getBulan(getBln($tglPinjam)).
    " Tahun ".getThn($tglPinjam)." dengan ketentuan sebagai berikut :";
$pdf->MultiCell(0,5,$text2,0,"J");

$txts[1] = "Pihak Pertama mendapat pinjaman pokok dari Pihak Kedua sebesar ".rupiah($jumlah_pinjaman)." dengan jasa pinjaman 12% pertahun atau 1% perbulan dipergunakan untuk ".$nama_usaha;
$txts[2] = "Pihak Pertama wajib mengembalikan pinjaman pokok melalui angsuran sebesar ".rupiah($angsuran)." perbulan ditambah jasa pinjaman sebesar ".rupiah($jasa)." perbulan atau (berdasarkan siklus usaha)";
$txts[3] = "Pihak Pertama wajib membayar angsuran pokok, jasa wajib sebanyak ".rupiah($angsuran+$jasa)." perbulan dan dibayar setelah sebulan dana diterima. ";
$txts[4] = "Jika   terjadi   keterlambatan   pembayaran   angsuran   oleh   Pihak   Pertama,    maka   dikenakan    denda   sebesar ".rupiah(2000)." perhari (dihitung mulai tanggal 16 setiap bulannya) sesuai dengan ketentuan AD/ART yang telah disepakati";
$txts[5] = "Jika Pihak Pertama tidak melunasi angsuran pinjaman maka dikenakan sanksi dari Pihak Kedua";
$txts[6] = "Jika Pihak Pertama telah diberikan sanksi dan tidak melakukan pembayaran sesuai dengan kesepakatan, maka jaminan agunan Pihak Pertama dilakukan penyitaan dan penjualan oleh Pihak Kedua ";
$txts[7] = "Mekanisme penyitaan dan penjualan terjadi masalah, agar Pihak Kedua dan Pemerintahan Desa";
$txts[8] = "Jika dalam melakukan penyitaan dan penjualan terjadi masalah, agar Pihak Kedua melibatkan Aparat Penegak Hukum";
$txts[9] = "Surat Perjanjian Pemberian Kredit atau SP2K dubuat sebanyak dua rangkap bermatrai, masing-masing memegang satu rangkap bermatrai ";
$txts[10] = "Lain-lain yang belum ditetapkan pada kesepakatan ini merujuk pada Petunjukan Teknis program Peningkatan Keberdayaan Masyarakat. ";
for($q=1;$q<=10;$q++) {
    $pdf->MultiCellBlt($column_width, 5, "$q. ", $txts[$q]);
}
$text3 = "Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan dari pihak manapun.";
$pdf->MultiCell(0,5,$text3,0,"J");

$pdf->Ln();
$pdf->Cell(0,6,"Senderak, ".tgl_indo($t->tanggal_pinjaman),0,1,"C");

$pdf->SetFont('Arial','B',10);
$pdf->Cell(0,6,"Yang Membuat Perjanjian",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2+10,6,"Pihak Kedua",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pihak Pertama",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2+10,6,"Pengelola UED-SP",0,0,"L");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Pemanfaat",0,1,"C");

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"1. Ketua",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,1,"R");
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$ketua_ued,0,1,"L");
$pdf->Ln();

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"2. Tata Usaha",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,0,"R");
$pdf->Cell(10,6,"",0,0,"R");
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"(".$p->nama_pemanfaat.")",0,1,"C");
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$tatausaha,0,1,"L");
$pdf->Ln();

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"3. Kasir",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,1,"R");
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$kasir,0,1,"L");
$pdf->Ln();

$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"4. SAK",0,0,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,"(.......................)",0,1,"R");
$pdf->Cell(5,5,"");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2,6,$sak,0,1,"L");
$pdf->Ln();

$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"Saksi-Saksi",0,0,"L");
$pdf->Cell(10,6,"",0,0,"R");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"MENGETAHUI",0,1,"C");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"",0,0,"L");
$pdf->Cell(10,6,"",0,0,"R");
$pdf->Cell(($pdf->GetPageWidth()-40)/2,6,"KEPALA DESA SENDERAK",0,1,"C");

$pdf->SetFont('Arial','',10);
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2+15,10,"1. Istri / Suami / Ahli Waris",0,0,"L");
$pdf->Cell(((($pdf->GetPageWidth()-40)/2)/2)-5,10,".......................",0,1,"L");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2+15,10,"2. BPD",0,0,"L");
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(((($pdf->GetPageWidth()-40)/2)/2)-5,10,$bp->nama_bpd,0,1,"L");
$pdf->SetFont('Arial','',10);
$pdf->Cell((($pdf->GetPageWidth()-40)/2)/2+15,10,"3. Pendamping Desa / Kel",0,0,"L");
$pdf->SetFont('Arial','BU',10);
$pdf->Cell(((($pdf->GetPageWidth()-40)/2)/2)-5,10,$pd->nama_pendamping_desa,0,0,"L");
$pdf->Cell(10,6,"",0,0,"R");
$pdf->Cell((($pdf->GetPageWidth()-40)/2)-20,6,$kd->nama_kades,0,1,"C");



$pdf->Output("","Proposal Peminjaman ".$p->nama_pemanfaat);
?>
