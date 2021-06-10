<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ketua extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'text_helper', 'date','modif'));
        $this->load->database();
        $this->load->library(array('Pagination', 'user_agent','pdf','session'));
        //$this->load->plugin();
        $this->load->model('Tu_model');
        $this->load->library('upload');
        if ($this->session->userdata('logged')<>1 || $this->session->userdata('level')!="Ketua") {
            redirect(site_url('auth'));
        }
    }
	public function index()
	{
        $data['title'] = "Home";
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/home');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
	}



	public function pemanfaat(){
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
	    $data['title'] = "Pemanfaat";
		$data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_pemanfaat');
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_pemanfaat');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
    }
    public function profil_pemanfaat(){
		$data['aktif'] = "active";
        $id =  base64_decode($this->input->post("id"));
	    $data['title'] = "Pemanfaat";
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
	    $qry = "SElect * from tbl_pemanfaat 
                inner join tbl_agama on tbl_pemanfaat.id_agama = tbl_agama.id_agama
                WHERE tbl_pemanfaat.id_pemanfaat = '$id'";
        $data['hasil']=$this->Tu_model->Select_query($qry);
        $this->load->view('ketua/v_profil_pemanfaat', $data);

    }
	 public function profil_usp(){
        $data['title'] = "Profil USP";
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_profil_usp');
		 $data['aksi'] = 'Profil USP';
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_profil_usp');
		
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
		
    }

    public function ubah_password(){
		$data['aktif'] = "active";
        $data['title'] = "Ubah Password";
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['aksi'] = 'Ubah Password';
        $data['target_edit'] = 'ubah_password';
        $data['target_kembali'] = 'ubah_password';
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/edit_password');
        if($this->input->method() === 'post') {
            $passwordLama = $this->session->userdata('password');
            $usernameLama = $this->session->userdata('username');
            $ambilUser = $this->db->query("select * from tbl_user where username = '$usernameLama' and password = '$passwordLama'");
            foreach ($ambilUser->result() as $w) ;
            $simpan['id_user'] = $w->id_user;

            $usernameBaru = $this->input->post('txtUsername');
            $simpan['username']    = $usernameBaru;
            $password              = $this->input->post('txtPassword');
            if($password==""){
                $pass =  $passwordLama;
            }else{
                $pass = md5($password);
            }
            $simpan['password']    = $pass;


            if ($this->Tu_model->Update_Content('tbl_user', $simpan, 'id_user'))
            {
                $data["status"] = "sukses";

                $this->session->set_userdata("username",$usernameBaru);
                $this->session->set_userdata("password",$pass);
                $this->load->view('ketua/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('ketua/modal_edit',$data);
            }
        }
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/js_mask');
        $this->load->view('ketua/end_page');
    }


    public function pinjaman(){

        $data['title'] = "Pemanfaat";
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['aksi'] = 'Data Pinjaman';
        $data['target_kembali'] = 'pemanfaat';
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pemanfaat',$id_pemanfaat);
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_pinjaman');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
    }


    public function data_pinjaman(){
		$data['aktif'] = "active";
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $id =  base64_decode($this->input->post("id"));
        $data['title'] = "Pemanfaat";
        $qry = "Select * from tbl_pinjaman
                INNER JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                INNER JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
                INNER JOIN tbl_agama on tbl_pemanfaat.id_agama = tbl_agama.id_agama
                AND tbl_pinjaman.id_pinjaman='$id'";
        $data['ambil_pinjaman']=$this->Tu_model->Select_query($qry);
        $this->load->view('ketua/v_data_pinjaman', $data);

    }


    public function dokumen_pinjaman(){
//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['title'] = "Pemanfaat";
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambil_status_pembayaran']=$this->Tu_model->Select_query("select max(tanggal_pinjaman) as tanggal, id_pinjaman, status_pembayaran from tbl_pinjaman where id_pemanfaat='$id_pemanfaat' AND id_pinjaman<>'$id_pinjaman'");
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_dokumen_pinjaman2');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
    }

    public function cetak_dokumen(){
//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambil_status_pembayaran']=$this->Tu_model->Select_query("select max(tanggal_pinjaman) as tanggal, status_pembayaran
                                                                        from tbl_pinjaman where id_pemanfaat='$id_pemanfaat'");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
        $data['ambilPengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $this->load->view('ketua/pemeriksaan_kelengkapan', $data);

    }

    public function agama(){
		$data['aktif'] = "active";
        $data['title'] = "Agama";
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_agama');
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_agama');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
    }


    public function pengurus(){
        $data['title'] = "Pengurus";
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_pengurus');
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_pengurus');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
    }

    public function kades(){
        $data['title'] = "Kepala Desa";
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_kades');
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_kades');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
    }

    public function bpd(){
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['title'] = "Badan Permusyawaratan Desa";
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_bpd');
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_bpd');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
    }

    public function pamdes(){
		//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['title'] = "Pendamping Desa";
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_pendamping_desa');
        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_pamdes');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
    }

    public function rekap(){
//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['title'] = "Pinjaman";
        $data['ambil_tahun'] = $this->Tu_model->Select_query("SELECT DISTINCT (
                                                                year( tanggal_pinjaman )
                                                                )as tahun
                                                                FROM tbl_pinjaman");

        $data['aksi'] = 'Dokumen Pinjaman';

        if($this->input->method() === 'post') {
            $tahun = $this->input->post("cmbTahun");
            $bulan = $this->input->post("cmbBulan");
            $sql="Select * from tbl_pinjaman
                INNER JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                INNER JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
                INNER JOIN tbl_agama on tbl_pemanfaat.id_agama = tbl_agama.id_agama
                WHERE YEAR(tbl_pinjaman.tanggal_pinjaman)='$tahun'
                AND MONTH(tbl_pinjaman.tanggal_pinjaman) = '$bulan'
                ORDER BY tbl_pinjaman.jumlah_pinjaman ASC";
            $data["ambil_pinjaman"] = $this->Tu_model->Select_query($sql);
        }else{
            $tahun = "";
            $bulan = "";
        }
        $data["tahun"] = $tahun;
        $data['bulan'] = $bulan;

        $this->load->view('ketua/head', $data);
        $this->load->view('ketua/profile');
        $this->load->view('ketua/side_menu');
        $this->load->view('ketua/top_nav');
        $this->load->view('ketua/v_rekap');
        $this->load->view('ketua/footer');
        $this->load->view('ketua/js_file');
        $this->load->view('ketua/end_page');
    }

    public function cetak_proposal(){
//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['title'] = "Pinjaman";
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);


        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambil_pengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
        $this->load->view('tu/cetak_proposal', $data);

    }
    public function profil(){
//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['title'] = "Pinjaman";
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);


        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambil_pengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
        $this->load->view('ketua/profil', $data);

    }
    public function cetak_rekap(){
//ambil nama dan logo
	$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $data['title'] = "Pinjaman";
        $tahun = base64_decode($this->uri->segment(3));
        $bulan = base64_decode($this->uri->segment(4));
        $sql="Select * from tbl_pinjaman
            INNER JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
            INNER JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
            INNER JOIN tbl_agama on tbl_pemanfaat.id_agama = tbl_agama.id_agama
            WHERE YEAR(tbl_pinjaman.tanggal_pinjaman)='$tahun'
            AND MONTH(tbl_pinjaman.tanggal_pinjaman) = '$bulan'
            ORDER BY tbl_pinjaman.jumlah_pinjaman ASC";
        $ambil_pinjaman= $this->Tu_model->Select_query($sql);

        $pdf = new FPDF();
        $pdf->AddPage("P","legal");

        $pdf->SetFont("times","B",14);
        $pdf->Cell(10,7,"",0,0,"C");
        $pdf->Cell(0,7,"LAPORAN DATA PEMINJAMAN",0,1,"C");
        $pdf->Cell(10,7,"",0,0,"C");
        $pdf->Cell(0,7,"UED SP BAROKAH DESA SENDERAK",0,1,"C");
        $pdf->Cell(10,7,"",0,0,"C");
        $pdf->Cell(0,7,"KECAMATAN BENGKALIS KABUPATEN BENGKALIS",0,1,"C");
        $pdf->Cell(10,7,"",0,0,"C");
        $pdf->Cell(0,7,"TAHUN ".$tahun,0,1,"C");
        $pdf->Image('images/logo-300.png',15,8,-270);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10,40,205,40);
        $pdf->SetLineWidth(0.5);
        $pdf->Line(10,41,205,41);

        $pdf->Ln(10);
        $pdf->SetFont("times","B",10);
        $pdf->Cell(20,15,"Bulan",0,0);
        $pdf->Cell(5,15,":",0,0);
        $pdf->Cell(30,15,bulanIndo($bulan),0,1);

        $pdf->Cell(10,10,"NO",1,0,"C");
        $pdf->Cell(30,10,"Tanggal",1,0,"C");
        $pdf->Cell(30,10,"Kode Pinjaman",1,0,"C");
        $pdf->Cell(40,10,"Nama Pemanfaat",1,0,"C");
        $pdf->Cell(35,10,"Jumlah Pinjaman",1,0,"C");
        $pdf->Cell(25,10,"Jangka Waktu",1,0,"C");
        $pdf->Cell(30,10,"Status",1,1,"C");

        $pdf->SetFont("times","",8);
        $no=1;
        foreach ($ambil_pinjaman->result() as $r) {
            $pdf->Cell(10, 7, $no++, 1, 0, "C");
            $pdf->Cell(30, 7, tgl_indo($r->tanggal_pinjaman), 1, 0, "C");
            $pdf->Cell(30, 7, $r->id_pinjaman, 1, 0, "C");
            $pdf->Cell(40, 7, $r->nama_pemanfaat, 1, 0, "L");
            $pdf->Cell(35, 7, rupiah($r->jumlah_pinjaman), 1, 0, "R");
            $pdf->Cell(25, 7, $r->jangka_waktu." Bulan", 1, 0, "C");
            $pdf->Cell(30, 7, ucwords($r->status_pinjaman), 1, 1, "C");
        }
        $pdf->Output("","Surat Kuasa Pemakaian Agunan.pdf");


        //$this->load->view('tu/rekap', $data);

    }


}
