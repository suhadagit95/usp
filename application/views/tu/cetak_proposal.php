<?php
foreach($ambil_pemanfaat->result() as $p);
foreach($ambil_pinjaman->result() as $t);
foreach($ambil_agunan->result() as $a);
foreach($ambil_pengurus->result() as $y);
foreach($ambil_kades->result() as $kd);
foreach($ambil_pendamping->result() as $pd);
foreach($ambil_bpd->result() as $bp);
foreach($ambil_profil_usp->result() as $pusp);
foreach($ambil_pendamping->result() as $pen);
$id_agama = $p->id_agama;
$ambilAgama = $this->db->query("Select * from tbl_agama where id_agama = '$id_agama'");
foreach($ambilAgama->result() as $c);
$agama = $c->agama;

        $data['title'] = "cetak proposal";
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
        $r=array();

   

        
        $ambil_dokumen_pinjaman=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $ambil_pinjaman=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
	
		
	
        $ambil_pemanfaat = $query = $this->db->query("select * from tbl_pemanfaat where id_pemanfaat='$id_pemanfaat'")->result();
        
		foreach($ambilPengurus->result() as $d);
		$tglPinjam = $t->tanggal_pinjaman;


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


//profil 
$pdf = new FPDF();
$pdf->SetTitle("Proposal");
$pdf->SetMargins(20,10,20);
$pdf->AddPage("P","legal");
$pdf->SetFont('Arial','B',16);

$pdf->Cell(0,7,"PROFIL PEMANFAAT",0,1,"C");
$pdf->Ln(10);
$pdf->SetFont('Arial','',12);
$pdf->Cell(60,7,"NAMA",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->nama_pemanfaat,0,1);
$pdf->Cell(60,7,"TEMPAT / TGL LAHIR",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->tempat_lahir_pemanfaat." / ".tgl_indo($p->tgl_lahir_pemanfaat),0,1);
$pdf->Cell(60,7,"ALAMAT",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->alamat_pemanfaat,0,1);
$pdf->Cell(60,7,"STATUS",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->status_pemanfaat,0,1);
$pdf->Cell(60,7,"AGAMA",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$agama,0,1);
$pdf->Cell(60,7,"PEKERJAAN",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$p->pekerjaan_pemanfaat,0,1);
$pdf->Cell(60,7,"BESAR PINJAMAN",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,rupiah($t->jumlah_pinjaman),0,1);
$pdf->Cell(60,7,"JANGKA WAKTU PINJAMAN",0,0);
$pdf->Cell(5,7,":",0,0);
$pdf->Cell(5,7,$t->jangka_waktu.' Bulan',0,1);

$pdf->Image(base_url()."images/pemanfaat/".$p->foto_pemanfaat,165,28,30,40);
$pdf->Ln(10);
$pdf->SetFont('Arial','B',16);
$pdf->Image("images/peta agunan/".$a->peta_lokasi_agunan,20,105,175,100);

$pdf->Cell(0,7,"PETA LOKASI USAHA",0,1,"C");
$pdf->Ln(120);
$pdf->Cell(0,6,"FOTO AGUNAN",0,1,"C");

$pdf->Image("images/agunan/".$a->foto_agunan,20,230,175,100);

//surat permohonan keredit

     $pdf->AddPage("P","legal");
        $pdf->SetFont('Arial','',12);

        $pdf->Cell(40,7,"No.  ");
        $pdf->Cell(50,7,": __/__/__/ 20__ ",0,1);
        $pdf->Cell(40,7,"Perihal",0,0,"J");
        $pdf->Cell(40,7,": Permohonan Kredit",0,1);
        $pdf->Ln();
        $pdf->Cell(0,7,"Kepada Ketua USP : ",0,1);
        $pdf->Cell(0,7,"Di-",0,1);
        $pdf->Cell(10,7,"");
        $pdf->Cell(6,7,"Tempat");

        $pdf->Ln();

        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(0,7,"SURAT PERMOHONAN KREDIT",0,1,"C");
        $pdf->Ln();
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,7,"Yang bertanda tangan di bawah ini :",0,1,"L");
        foreach ($ambil_pemanfaat as $row);
        $pdf->Cell(50, 7, "Nama", 0, 0, "L");
        $pdf->Cell(10,7,":",0,0,"L");
        $pdf->Cell(100,7,$row->nama_pemanfaat,0,1,"L");
        $pdf->Cell(50,7,"Pekerjaan",0,0,"L");
        $pdf->Cell(10,7,":",0,0,"L");
        $pdf->Cell(100,7,$row->pekerjaan_pemanfaat,0,1,"L");
        $pdf->Cell(50,7,"Alamat",0,0,"L");
        $pdf->Cell(10,7,":",0,0,"L");
        $pdf->Cell(100,7,$row->alamat_pemanfaat,0,1,"L");

        $pdf->Ln();
        $pdf->MultiCell(0,6,"       Dengan ini mengajukan permohonan kredit sebesar ".rupiah($t->jumlah_pinjaman)." Terbilang : ".
                            ucwords(terbilang($t->jumlah_pinjaman))." untuk memenuhi tambahan modal usaha ".
                            $t->nama_usaha.".",0,"J");
        $pdf->Ln();
        $pdf->Cell(0,6,"        Sebagai bahan pertimbangan, bersama ini saya sampaikan proposal dengan lampiran : ",0,1,"L");
        $pdf->Cell(0,6,"1.    Profil Pemanfaat dan Peta Lokasi Agunan Pas Foto 3 x 4 (Menyusaikan) ",0,1,"L");
        $pdf->Cell(0,6,"2.    Kartu Keluarga dan KTP ",0,1,"L");
        $pdf->Cell(0,6,"3.    Rencana Usaha Pemanfaat (RUP) ",0,1,"L");
        $pdf->Cell(0,6,"4.    Surat Penyerahan Agunan ",0,1,"L");
        $pdf->Cell(0,6,"5.    Surat Kuasa Pemakaian Agunan (Agunan Pihak Lain) ",0,1,"L");
        $pdf->Cell(0,6,"6.    Surat Kuasa Penjualan Agunan",0,1,"L");
        $pdf->Cell(0,6,"7.    Surat Kesepakatan Sanki-Sanki yang telah ditetapkan  ",0,1,"L");
        $pdf->Cell(0,6,"8.    Lembar Photo Usaha ",0,1,"L");
        $pdf->Cell(0,6,"9.    Surat Agunan Asli, Fotocopy Agunan dan Photo yang diagunkan ",0,1,"L");
        $pdf->Cell(0,6,"10.  Demikian permohonan ini diampaikan, atas perhatiannya saya ucapkan terima kaih.",0,1,"L");

        $pdf->Ln();
        $pdf->Cell(300,20,$pusp->nama_desa.", ".tgl_indo($t->tanggal_pinjaman),0,0,"C");
        $pdf->Cell(60,20,$pusp->nama_desa.tgl_indo($t->tanggal_pinjaman),0,1,"C");
        $pdf->Cell(300,50,$row->nama_pemanfaat,0,0,"C");
        $pdf->Cell(60,50,$row->nama_pemanfaat,0,1,"C");

     
  //Surat Kuasa Pemakaian Agunan$pdf->AddPage("P","legal");
  $pdf->AddPage("P","legal");
$pdf->SetMargins(20,0,20);

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
$text[2]="Agunan ini merupakan jaminan dari pinjaman kredit Pihak Kedua pada pengelola USP ".$pusp->nama_usp_surat." dan agunan dapat diambil setelah seluruh angsuran lunas";
$pdf->MultiCellBlt($column_width,6,"1.",$text[1]);
$pdf->MultiCellBlt($column_width,6,"2.",$text[2]);
$txt = "Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan dari pihak manapun.";
$pdf->Cell(10,1,"",0,1);
$pdf->MultiCell($pdf->GetPageWidth()-40,6,$txt,"J");

$pdf->Ln();
$pdf->Cell(0,7,$pusp->nama_desa.", ".tgl_indo($t->tanggal_pinjaman),0,1,"C");
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
$pdf->Ln();
$pdf->Cell(0,5,"Saksi-saksi",0,1,"C");
$pdf->SetFont('Arial','',12);
$pdf->Cell((($pdf->GetPageWidth()-7)/2)/2+15,10,"Ketua USP",0,0,"C");
$pdf->Cell(((($pdf->GetPageWidth()-7)/2)/2)-5,10,"Tata Usaha",0,0,"C");
$pdf->Cell((($pdf->GetPageWidth()-7)/2)-20,6,"Staf Analis Kredit ",0,1,"C");


$pdf->Ln(25);

$pdf->SetFont('Arial','BU',12);
$pdf->Cell((($pdf->GetPageWidth()-7)/2)/2+15,10,"(".$d->ketua.")",0,0,"C");
$pdf->Cell(((($pdf->GetPageWidth()-7)/2)/2)-5,10,"(".$d->tata_usaha.")",0,0,"C");
$pdf->Cell((($pdf->GetPageWidth()-7)/2)-20,6,"(".$d->sak.")",0,1,"C");

//SURAT PENYERAHAN AGUNAN$pdf->AddPage("P","legal");
	 $pdf->AddPage("P","legal");
        $pdf->SetMargins(20,100,20);
     
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
        $pdf->Cell(100,7,"Pengelola USP ".$pusp->nama_usp_surat,0,1,"L");
        $pdf->Cell(50,7,"Alamat",0,0,"L");
        $pdf->Cell(5,7,":",0,0,"L");
        $pdf->Cell(100,7,$pusp->alamat_usp,0,1,"L");

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
        $text[2]="yang dijadikan jaminan kredit pinjaman Pihak Pertama kepada Pihak Kedua.";
		$text[3]="Barang berupa".$a->jenis_agunan." dari surat yang digunakan kepada Pihak Kedua dapat dikelola Pihak Pertama.";
		$text[4]="Pihak Pertama wajib menggantikan agunan jika barang dalam masa jaminan hilang dan rusak yang mengurangi nilai ekonomis dari besaran pinjaman.";
        $text[5]="Pihak Kedua bertanggungjawab terhadap Dokumen Agunan yang telah diserahkan oleh Pihak Pertama.";
		$text[6]="Agunan dapat diambil pihak pertama setelah seluruh angsuran lunas.";
		$pdf->MultiCellBlt($column_width,6,"1.",$text[1]);
        $pdf->MultiCellBlt($column_width,6,"2.",$text[2]);
		$pdf->MultiCellBlt($column_width,6,"3.",$text[3]);
		$pdf->MultiCellBlt($column_width,6,"4.",$text[4]);
		$pdf->MultiCellBlt($column_width,6,"5.",$text[5]);
		$pdf->MultiCellBlt($column_width,6,"6.",$text[6]);

        $txt = "Demikianlah surat perjanjian ini dibuat dengan sebenarnya dalam keadaan sadar tanpa ada tekanan dari pihak manapun.";
        $pdf->Cell(10,4,"",0,1);
        $pdf->MultiCell($pdf->GetPageWidth()-40,6,$txt,"J");

        $pdf->Ln(7);
        $pdf->Cell(0,20,$pusp->nama_desa.", ".tgl_indo($t->tanggal_pinjaman),0,2,"R");
        $pdf->SetFont("Arial","B",12);
        $pdf->Cell(($pdf->GetPageWidth()-7)/2,7,"Pihak Kedua",0,0,"C");
        $pdf->Cell(($pdf->GetPageWidth()-30)/2,7,"Pihak Pertama",0,1,"C");
        
        $pdf->Cell((($pdf->GetPageWidth()-10)/1)/2,7,"Tata Usaha",0,0,"C");
        $pdf->Ln(30);
        $ambilPengurus=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        foreach($ambilPengurus->result() as $w);
        
        $pdf->Cell((($pdf->GetPageWidth()-10)/1)/2,7,$w->tata_usaha,0,0,"C");
        $pdf->Cell(($pdf->GetPageWidth()-30)/2,7,$p->nama_pemanfaat,0,1,"C");
		
//surat kuasa penjualan agunan

  $pdf->AddPage("P","legal");
  $pdf->Ln();
$pdf->SetMargins(20,0,20);

$pdf->SetFont('Arial','B',12);

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
$textb[1]="Pihak Pertama memberikan kuasa jual agunan milik Pihak Pertama yang menjadi jaminan pinjaman kepada Pihak Kedua berupa ".
    $a->jenis_agunan." atas nama ".$a->nama_pemilik." No Surat ".
    $a->no_surat_agunan." Alamat ".$a->alamat_agunan.".";
$textb[2]="Kuasa Jual Agunan Pihak Pertama yang dikuasakan pada Pihak Kedua ini berlaku apabila Pihak Pertama tidak membayar pinjaman kepada Pihak Kedua sesuai dengan Surat Pemberian Pinjaman Kredit";
$textb[3]="Harga Agunan dihitung berdasarkan masa Periode pinjaman berakhir, adapun harga jual agunan pada saat penjualan sebesar: Rp.                  
(..........................................................................................................................................).";
$textb[4]="Dalam masa penjualan, jika harga agunan mengalami penyusutan dan tidak menutupi sisa pinjaman, maka Pihak Pertama wajib melunasi sisa pinjaman piutang yang ada.";
$textb[5]="Dana dari hasil penjualan agunan terlebih dahulu dikurangi sisa pinjaman dan jasa pihak pertama kepada pihak kedua, sisa setelah dilakukan pengurangan akan diserahkan pada pihak pertama";
$textb[6]="Mekanisme penjualan agunan diserahkan sepenuhnya pada pihak kedua.";


$column_width = ($pdf->GetPageWidth()-40);
for($i=1;$i<=6;$i++) {
    $pdf->MultiCellBlt($column_width, 7, "$i.", $textb[$i]);
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

//foto usaha pemanfaat
//surat perjanjian sanksi
$pdf->AddPage("P","legal");
$pdf->SetMargins(15,0,15);

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
$texta[1]="Jika saya terlambat membayar angsuran selama 1 sampai dengan  2 bulan maka saya bersedia untuk diberitahu melalui Via telpon atau SMS.";
$texta[2]="Jika saya terlambat membayar angsuran selama 3 (tiga) bulan maka saya bersedia dilkunjungi dan menerima surat pemberitahuan tunggakan oleh pengurus unit USP.";
$texta[3]="Jika saya mengabaikan sebagaimana poin 1 dan 2 atau terlambat membayar angsuran selama 4 (empat) bulan maka saya bersedia diberi surat peringatan 1 (satu).";
$texta[4]="Jika saya mengabaikan sebagaimana poin 1, 2 dan 3 atau terlambat membayar angsuran selama 5 (lima) bulan maka saya bersedia diberi surat peringatan 2 (dua).";
$texta[5]="Jika saya mengabaikan sebagaimana poin 1, 2, 3 dan 4 atau terlambat membayar angsuran selama 6 (enam) bulan maka saya bersedia diberi surat peringatan 3 (tiga).";
$texta[6]="Jika saya mengabaikan sebagaimana poin 1, 2, 3, 4 dan 5 atau terlambat membayar angsuran diatas 6 (enam) bulan maka saya bersedia dilakukan pemanggilan oleh pengurus Unit USP Mekar Sari.";
$texta[7]="Jika saya tidak membayar angsuran pinjaman minimal 12 kali angsuran maka saya bersedia untuk dilakukan penjualan agunan";

$column_width = ($pdf->GetPageWidth()-40);
for($i=1;$i<=7;$i++) {
    $pdf->MultiCellBlt($column_width, 7, "$i.", $texta[$i]);
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


//sp2k

$pdf->SetMargins(15,0,15);

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
$txt[11]	= "Surat Perjanjian Pemberian Kredit atau SP2K dibuat sebanyak 2 (dua) Rangkap bermaterai, masing-masing pihak memegang 1 (satu) rangkap bermaterai yang telah dilegalisir oleh NOTARIS.";
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



$pdf->Output("","Proposal Peminjaman ".$p->nama_pemanfaat);
?>
