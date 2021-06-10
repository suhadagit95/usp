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
$jumlah_pinjaman = $t->jumlah_pinjaman;
$nama_usaha = $t->nama_usaha;
$jangka_waktu = $t->jangka_waktu;

$angsuran = $jumlah_pinjaman/$jangka_waktu;
$jasa = 0.01*$angsuran;

$pdf = new FPDF();
$pdf->SetMargins(15,0,15);
$pdf->SetTitle("Surat Perjanjian Pemberian Kredit");
$pdf->AddPage("P","legal");
$pdf->Ln(20);
$pdf->SetFont('Arial','BU',12);
$pdf->Cell(0,7,"SURAT PERJANJIAN PEMBERIAN KREDIT",0,1,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,7,"No:         /UNIT USP/Desa ".$pusp->nama_desa."/Kec.Bengkalis       ",0,1,"C");

$pdf->Ln();
$pdf->SetFont('Arial','',12);
$txt1 = "Pada hari ini ".hari($tglPinjam)." Tanggal ".get_tanggal($tglPinjam)." Bulan ".getBulan(getBln($tglPinjam)).
    " Tahun ".getThn($tglPinjam)." Kami yang bertanda tangan di bawah ini :";
$pdf->MultiCell(0,7,$txt1,0,"J");

$pdf->Cell(50,7,"Nama",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->nama_pemanfaat,0,1,"L");
$pdf->Cell(50,7,"Pekerjaan",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->pekerjaan_pemanfaat,0,1,"L");

$pdf->SetFont('Arial','',12);
$pdf->Cell(50,7,"Alamat",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$p->alamat_pemanfaat,0,1,"L");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(6,7,"Selanjutnya disebut sebagai Pihak Pertama",0,1,"L");
$pdf->Ln();

$pdf->SetFont('Arial','',12);
$pdf->Cell(50,7,"Nama",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->SetFont('Arial','B',12);
$pdf->Cell(100,7,"Unit Usaha Simpan Pinjam (USP) ".$pusp->nama_usp_surat." Desa ".$pusp->nama_desa,0,1,"L");
$pdf->SetFont('Arial','',12);
$pdf->Cell(50,7,"Alamat",0,0,"L");
$pdf->Cell(5,7,":",0,0,"L");
$pdf->Cell(100,7,$pusp->alamat_usp,0,1,"L");

$pdf->SetFont('Arial','B',12);
$text1 = "Selanjutnya disebut sebagai Pihak Kedua   ";
$column_width = ($pdf->GetPageWidth()-30);
$pdf->MultiCell(0,7,$text1,0,"J");
$pdf->Ln();


$pdf->SetFont('Arial','',12);
$text2 = "Pihak Pertama dan Pihak Kedua sepakat membuat perjanjian pada Hari ".hari($tglPinjam)." Tanggal ".get_tanggal($tglPinjam)." Bulan ".getBulan(getBln($tglPinjam)).
    " Tahun ".getThn($tglPinjam)." dengan ketentuan sebagai berikut :";
$pdf->MultiCell(0,7,$text2,0,"J");

$txt[1] 	= "Pihak Pertama mendapat pinjaman pokok dari Pihak Kedua sebesar ".rupiah($jumlah_pinjaman)." dengan jasa pinjaman 10% pertahun atau 0,8% perbulan dipergunakan untuk usaha ".$nama_usaha;
$txt[2] 	= "pihak Pertama wajib mengembalikan pinjaman pokok melalui angsuran sebesar ".rupiah($angsuran)." perbulan ditambah jasa pinjaman sebesar ".rupiah($jasa)." perbulan";
$txt[3] 	= "Masa pinjaman pihak pertama maksimal".$t->jangka_waktu." bulan";
$txt[4] 	= "Total pembayaran angsuran pokok dan jasa sampai masa akhir pinjaman sebanyak                                                                                                     ";
$txt[5] 	= "Jika Pihak Pertama tidak melakukan angsuran pinjaman minimal 3 Bulan, maka akan dilakukan Kunjungan lapangan dan pemberitahuan tunggakan oleh Pihak Kedua";

$txt[6] 	= "Sebagaimana poin 5 diatas tidak ditindak lanjuti, maka akan diberikan surat peringatan.";
$txt[7] 	= "Jika pihak pertama mengabaikan sebagaimana poin 6 diatas, maka dilakukan pemanggilan serta ditindaklanjuti dalam musyawarah pengurus Unit Usaha Simpan Pinjam (USP).";
$txt[8] 	= "Jika pihak pertama tidak melakukan angsuran pinjaman minimal 12 kali angsuran, maka agunan yang digunakan akan dilakukan penjualan berdasarkan Surat Kuasa Jual Agunan.";
$txt[9] 	= "Penjulan agunan dapat ditunda apabila usaha pemanfaat mengalami force majure (hal-hal diluar kemampuan manusia seperti bencana alam), maka Pihak pertama dan Pihak Kedua membuat Berita Acara Kesepakatan Pengembalian Pinjaman melalui mekanisme musyawarah.";
$txt[10]	= "Kondisi force majure sebagaimana di maksud pada angka 9 ditetapkan   oleh instansi yang terkait (pihak yang berwenang). ";
$txt[11]	= "Surat Perjanjian Pemberian Kredit atau SP2K dibuat sebanyak 2 (dua) Rangkap bermaterai, masing-masing pihak memegang 1 (satu) rangkap bermaterai yang telah dilegalisir oleh NOTARIS.
";
for($i=1;$i<=11;$i++) {
    $pdf->MultiCellBlt($column_width, 7, "$i. ", $txt[$i]);
}
$text3 = "Demikian surat perjanjian ini dibuat dengan sebenar-benarnya tanpa ada tekanan dari pihak manapun.";
$pdf->MultiCell(0,7,$text3,0,"J");

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


$pdf->Output("","Surat Perjanjian Pemberian Kredit (SP2K)");
?>
