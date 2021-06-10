<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tu extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'text_helper', 'date','modif'));
        $this->load->database();
        $this->load->library(array('Pagination', 'user_agent','pdf','session'));
        //$this->load->plugin();
        $this->load->model('Tu_model');
        $this->load->library('upload');
        if ($this->session->userdata('logged')<>1 || $this->session->userdata('level')!="Tata Usaha") {
            redirect(site_url('id'));
        }
    }
	public function index()
	{
        $data['title'] = "Home";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/home');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
	}


//mulai menu pemenfaat
	public function pemanfaat(){
	    $data['title'] = "Pemanfaat";
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_pemanfaat');
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_pemanfaat');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }
    public function profil_pemanfaat(){
        $id =  base64_decode($this->input->post("id"));
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
	    $data['title'] = "Pemanfaat";
	    $qry = "SElect * from tbl_pemanfaat 
                inner join tbl_agama on tbl_pemanfaat.id_agama = tbl_agama.id_agama
                WHERE tbl_pemanfaat.id_pemanfaat = '$id'";
        $data['hasil']=$this->Tu_model->Select_query($qry);
        $this->load->view('tu/v_profil_pemanfaat', $data);

    }
    public function tambah_pemanfaat(){

        $data['title'] = "Pemanfaat";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_tambah'] = 'tambah_pemanfaat';
        $data['target_kembali'] = 'pemanfaat';
        $data['aksi'] = 'Data Pemanfaat';
        $data['ambil_agama']=$this->Tu_model->Select_all('tbl_agama');
        $data['id_pemanfaat'] = $this->Tu_model->autonumber("tbl_pemanfaat", "id_pemanfaat", 4, "SP2K");
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_pemanfaat');


        if($this->input->method() === 'post') {
            $tmpLahir                           = $this->input->post('txtTempatLahir');
            $tglLahir                           = $this->input->post('cmbTgl');
            $blnLahir                           = $this->input->post('cmbBln');
            $thnLahir                           = $this->input->post('cmbThn');
            $id_pemanfaat                       = $this->input->post('txtID');
			$size							 = $_FILES['fileFotoPemanfaat']['size'];
			$type 							 = $_FILES['fileFotoPemanfaat']['type'];
			
            $nama_file                          = $_FILES['fileFotoPemanfaat']['name'];
            $lokasi_foto                        = $_FILES['fileFotoPemanfaat']['tmp_name'];
            
            $simpan['id_pemanfaat']             = $id_pemanfaat;
            $nama_baru                          = $id_pemanfaat."".(strtolower(str_replace(" ","_",$nama_file)));
			$simpan['nama_pemanfaat']           = $this->input->post('txtNama');
            $simpan['tempat_lahir_pemanfaat']   = $tmpLahir;
            $simpan['tgl_lahir_pemanfaat']      = $thnLahir."/".$blnLahir."/".$tglLahir;
            $simpan['alamat_pemanfaat']         = $this->input->post('txtAlamat');
            $simpan['status_pemanfaat']         = $this->input->post('cmbStatus');
			$simpan['jenis_kelamin']         = $this->input->post('cmbJK');
			$simpan['no_hp']         = $this->input->post('txtNoHp');
            $simpan['id_agama']          = $this->input->post('cmbAgama');
            $simpan['pekerjaan_pemanfaat']      = $this->input->post('txtPekerjaan');
            $simpan['pekerjaan_pemanfaat']      = $this->input->post('txtPekerjaan');
			$simpan['tgl_daftar']         = date("Y-m-d");
            $simpan['foto_pemanfaat']           = $nama_baru;
			
			if ($size < 1048576 and ($type =='image/jpeg' or $type == 'image/png' or $type == 'image/gif' or $type == 'image/jpg' )){


					
			
			if($this->Tu_model->Simpan_Content('tbl_pemanfaat',$simpan)){
                move_uploaded_file($lokasi_foto,"images/pemanfaat/$nama_baru");
                $data["status"] = "sukses";
                $this->load->view('tu/modal_tambah',$data);
            }else{
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah',$data);
            }
			 }	
			else{
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah',$data);
            }			 
			
			

           
						
			

        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }
    public function edit_pemanfaat(){

        $data['title'] = "Pemanfaat";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $data['target_edit'] = 'edit_pemanfaat/'.$this->uri->segment(3);
        $data['target_kembali'] = 'pemanfaat';
		 $data['aksi'] = 'Data Pemanfaat';
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_agama']=$this->Tu_model->Select_all('tbl_agama');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_pemanfaat');


        if($this->input->method() === 'post') {

            $hasil = $this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
            foreach($hasil->result() as $r);
            $gambar = $r->foto_pemanfaat;
            $tmpLahir                           = $this->input->post('txtTempatLahir');
            $tglLahir                           = $this->input->post('cmbTgl');
            $blnLahir                           = $this->input->post('cmbBln');
            $thnLahir                           = $this->input->post('cmbThn');
            $id_pemanfaat                   = $this->input->post('txtID');
            $nama_file                      = $_FILES['fileFotoPemanfaat']['name'];
            $lokasi_foto                    = $_FILES['fileFotoPemanfaat']['tmp_name'];
			$size							 = $_FILES['fileFotoPemanfaat']['size'];
			$type 							 = $_FILES['fileFotoPemanfaat']['type'];
			
			$nama_baru                          = $id_pemanfaat."".(strtolower(str_replace(" ","_",$nama_file)));
            //$nama_baru                      = $id_pemanfaat."".$nama_file;
            $simpan['id_pemanfaat']         = $id_pemanfaat;
            $simpan['nama_pemanfaat']       = $this->input->post('txtNama');
            $simpan['tempat_lahir_pemanfaat']   = $tmpLahir;
            $simpan['tgl_lahir_pemanfaat']      = $thnLahir."/".$blnLahir."/".$tglLahir;
            $simpan['alamat_pemanfaat']     = $this->input->post('txtAlamat');
            $simpan['status_pemanfaat']     = $this->input->post('cmbStatus');
            $simpan['id_agama']      = $this->input->post('cmbAgama');
            $simpan['pekerjaan_pemanfaat']  = $this->input->post('txtPekerjaan');
            $simpan['no_hp']  = $this->input->post('txtNoHp');
			$simpan['jenis_kelamin']  = $this->input->post('txtJK');
            if($nama_file!=""){
                $simpan['foto_pemanfaat']   = $nama_baru;
            }else{
                $simpan['foto_pemanfaat']   = $gambar;
            }
			if ($size < 1048576 and ($type =='image/jpeg' or $type == 'image/png' or $type == 'image/gif' or $type == 'image/jpg' )){


            $this->Tu_model->Update_Content('tbl_pemanfaat', $simpan, 'id_pemanfaat');
            if ($this->db->affected_rows() > 0)
            {
                if($nama_file!="") {
                    unlink("images/pemanfaat/$gambar");
                    move_uploaded_file($lokasi_foto, "images/pemanfaat/$nama_baru");
                }
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }
			}
			else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }
			

        }




        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function hapus_pemanfaat(){

        $data['title'] = "Pemanfaat";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'pemanfaat';
        $data['aksi'] = 'Data Pemanfaat';
        $id_pemanfaat = base64_decode($this->uri->segment(3));

        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_pemanfaat');

        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_pemanfaat');

        if($id_pemanfaat=="") {
            $data['status'] = "error_kosong";
            $this->load->view('tu/modal_hapus', $data);
        }else{
            $hasil = $this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
            foreach($hasil->result() as $r);
            $gambar = $r->foto_pemanfaat;

            if($this->Tu_model->Hapus_Data('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat)) {
                unlink("images/pemanfaat/$gambar");
                $data['status']="success";
                $this->load->view('tu/modal_hapus',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }


    public function pinjaman(){

        $data['title'] = "Pemanfaat";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['aksi'] = 'Data Pinjaman';
        $data['target_kembali'] = 'pemanfaat';
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pemanfaat',$id_pemanfaat);
		$data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
		//$data['ambil_pinjaman']=$this->Tu_model->Select_join_peminjaman($id_pemanfaat);
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_pinjaman');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }

    public function tambah_pinjaman(){
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_tambah'] = 'tambah_pinjaman/'.$this->uri->segment(3);
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
        $data['aksi'] = 'Tambah Data Pinjaman';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_pinjaman');


        if($this->input->method() === 'post') {

            $id_pinjaman                        = $this->input->post('txtIDPinjaman');
            $simpan['id_pemanfaat']             = $id_pemanfaat;
            $simpan['id_pinjaman']              = $id_pinjaman;
            $simpan['jumlah_pinjaman']          = hilang_karakter($this->input->post('txtJumlahPinjaman'));
            $simpan['jangka_waktu']             = $this->input->post('txtJangkaWaktuPinjaman');
            $simpan['sistem_angsuran']          = $this->input->post('txtSistemAngsuran');
            $simpan['jumlah_jasa']              = hilang_karakter($this->input->post('txtJumlahJasa'));
            $simpan['nama_usaha']              = hilang_karakter($this->input->post('txtNamaUsaha'));
            $simpan['tanggal_pinjaman']         = date("Y-m-d");
			 $simpan['no_rek_bank']          = $this->input->post('txtNorekbank');

            $id = base_convert(microtime(false), 10, 32);
           // $id2 = base_convert(microtime(false), 10, 32);
            //$id3 = base_convert(microtime(false), 10, 32);

            $tglLahir                               = $this->input->post('cmbTgl');
            $blnLahir                               = $this->input->post('cmbBln');
            $thnLahir                               = $this->input->post('cmbThn');
            $nama_peta                              = $_FILES['fileFotoPetaAgunan']['name'];
            $lokasi_peta                            = $_FILES['fileFotoPetaAgunan']['tmp_name'];
            $size							 = $_FILES['fileFotoPetaAgunan']['size'];
			$type 							 = $_FILES['fileFotoPetaAgunan']['type'];
			$nama_peta_baru                         = $id."".(strtolower(str_replace(" ","_",$nama_peta)));
			//$nama_peta_baru                         = $id."".$nama_peta;
            $nama_foto_agunan                       = $_FILES['fileFotoAgunan']['name'];
            $lokasi_foto_agunan                     = $_FILES['fileFotoAgunan']['tmp_name'];
			$size2							 = $_FILES['fileFotoAgunan']['size'];
			$type2 							 = $_FILES['fileFotoAgunan']['type'];
            $nama_foto_agunan_baru                  = $id."".(strtolower(str_replace(" ","_",$nama_foto_agunan)));
			//$nama_foto_agunan_baru                  = $id."".$nama_foto_agunan;
            
			$nama_foto_surat_agunan                 = $_FILES['fileFotoSuratAgunan']['name'];
            $lokasi_foto_surat_agunan               = $_FILES['fileFotoSuratAgunan']['tmp_name'];
			$size3							 = $_FILES['fileFotoSuratAgunan']['size'];
			$type3							 = $_FILES['fileFotoSuratAgunan']['type'];
			$nama_foto_surat_agunan_baru            = $id."".(strtolower(str_replace(" ","_",$nama_foto_surat_agunan)));
            //$nama_foto_surat_agunan_baru            = $id."".$nama_foto_surat_agunan;
			
			
			


            $simpan_agunan['id_agunan']             = "AG".$id; 
            $simpan_agunan['id_pinjaman']           = $id_pinjaman;
            $simpan_agunan['jenis_agunan']          = $this->input->post('txtJenisAgunan');
            $simpan_agunan['no_surat_agunan']       = $this->input->post('txtNoAgunan');
            $simpan_agunan['alamat_agunan']         = $this->input->post('txtAlamatAgunan');
            $simpan_agunan['peta_lokasi_agunan']    = $nama_peta_baru;
            $simpan_agunan['foto_agunan']           = $nama_foto_agunan_baru;
            $simpan_agunan['foto_surat_agunan']     = $nama_foto_surat_agunan_baru;
            $simpan_agunan['nama_pemilik']          = $this->input->post('txtNamaPemilik');
            $simpan_agunan['tempat_lahir_pemilik']  = $this->input->post('txtTempatLahirPemilik');
            $simpan_agunan['tanggal_lahir_pemilik'] = $thnLahir."/".$blnLahir."/".$tglLahir;
            $simpan_agunan['pekerjaan_pemilik']     = $this->input->post('txtPekerjaanPemilikAgunan');
            $simpan_agunan['alamat_pemilik']        = $this->input->post('txtAlamat');

            $simpan_dokumen['id_dokumen']           = "DK".$id;
            $simpan_dokumen['id_pinjaman']          = $id_pinjaman;
			$simpan_dokumen['profil_pemanfaat']     = "Y";
			
		
			
			if (($size > 1048576) or ($size2 > 1048576) or ($size3 > 1048576)){
				 $data["status"] = "error";
                $this->load->view('tu/modal_tambah', $data);
			} else {
			
            if($this->Tu_model->Simpan_Content('tbl_pinjaman',$simpan)){

                if($this->Tu_model->Simpan_Content('tbl_agunan',$simpan_agunan)) {
                    $this->Tu_model->Simpan_Content('tbl_dokumen',$simpan_dokumen);
                    move_uploaded_file($lokasi_peta,"images/peta agunan/$nama_peta_baru");
                    move_uploaded_file($lokasi_foto_surat_agunan,"images/surat agunan/$nama_foto_surat_agunan_baru");
                    move_uploaded_file($lokasi_foto_agunan,"images/agunan/$nama_foto_agunan_baru");

                    $data["status"] = "sukses";
                    $this->load->view('tu/modal_tambah', $data);
                }else{
                    $this->Tu_model->Hapus_Data('tbl_pinjaman','id_pinjaman',$id_pinjaman);
                    $data["status"] = "error";
                    $this->load->view('tu/modal_tambah', $data);
                }
            }else{
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah', $data);
            }
			}
			

        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function edit_pinjaman(){
		error_reporting (0);
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_edit'] = 'edit_pinjaman/'.$this->uri->segment(3)."/".$this->uri->segment(4);
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
        $qry = "Select * from tbl_pinjaman
                INNER JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                INNER JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
                WHERE tbl_pinjaman.id_pemanfaat = '$id_pemanfaat'
                AND tbl_pinjaman.id_pinjaman='$id_pinjaman'";
        $data['ambil_pinjaman']=$this->Tu_model->Select_query($qry);
        $data['aksi'] = 'Data Pinjaman';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_pinjaman');


        if($this->input->method() === 'post') {

            $simpan['id_pemanfaat'] = $id_pemanfaat;
            $simpan['id_pinjaman'] = $id_pinjaman;
            $simpan['jumlah_pinjaman'] = hilang_karakter($this->input->post('txtJumlahPinjaman'));
            $simpan['jangka_waktu'] = $this->input->post('txtJangkaWaktuPinjaman');
            $simpan['sistem_angsuran'] = $this->input->post('txtSistemAngsuran');
            $simpan['jumlah_jasa'] = hilang_karakter($this->input->post('txtJumlahJasa'));
			$simpan['no_rek_bank'] = hilang_karakter($this->input->post('txtNorekbank'));
            $simpan['tanggal_pinjaman'] = date("Y-m-d");
            $update = $this->Tu_model->Update_Content('tbl_pinjaman', $simpan, 'id_pinjaman');
            if ($update) {
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit', $data);
            } else {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit', $data);
            }
        }

        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }
    public function edit_agunan(){
		error_reporting (0);
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_agunan = base64_decode($this->uri->segment(4));
        $data['title'] = "Agunan";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_edit'] = 'edit_agunan/'.$this->uri->segment(3)."/".$this->uri->segment(4);
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
        $qry = "Select * from tbl_pinjaman
                INNER JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                INNER JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
                WHERE tbl_pinjaman.id_pemanfaat = '$id_pemanfaat'
                AND tbl_agunan.id_agunan='$id_agunan'";
        $data['ambil_agunan']=$this->Tu_model->Select_query($qry);
        $data['aksi'] = 'Data Agunan';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_agunan');


        if($this->input->method() === 'post') {
            $ambil_agunan = $this->Tu_model->Select_query($qry);
            foreach($ambil_agunan->result() as $t);
            $id_pinjaman = $t->id_pinjaman;
            $peta_lokasi_agunan  = $t->peta_lokasi_agunan;
            $foto_agunan  = $t->foto_agunan;
            $foto_surat_agunan  = $t->foto_surat_agunan;

            $id = base_convert(microtime(false), 10, 32);

            $tglLahir                               = $this->input->post('cmbTgl');
            $blnLahir                               = $this->input->post('cmbBln');
            $thnLahir                               = $this->input->post('cmbThn');
            $nama_peta                              = $_FILES['fileFotoPetaAgunan']['name'];
            $lokasi_peta                            = $_FILES['fileFotoPetaAgunan']['tmp_name'];
			 $size							 = $_FILES['fileFotoPetaAgunan']['size'];
			$nama_peta_baru                         = $id."".(strtolower(str_replace(" ","_",$nama_peta)));
            //$nama_peta_baru                         = $id."".$nama_peta;
            $nama_foto_agunan                       = $_FILES['fileFotoAgunan']['name'];
            $lokasi_foto_agunan                     = $_FILES['fileFotoAgunan']['tmp_name'];
			 $size2							 = $_FILES['fileFotoAgunan']['size'];
			$nama_foto_agunan_baru                        = $id."".(strtolower(str_replace(" ","_",$nama_foto_agunan)));
           // $nama_foto_agunan_baru                  = $id."".$nama_foto_agunan;
            $nama_foto_surat_agunan                 = $_FILES['fileFotoSuratAgunan']['name'];
            $lokasi_foto_surat_agunan               = $_FILES['fileFotoSuratAgunan']['tmp_name'];
			 $size3							 = $_FILES['fileFotoSuratAgunan']['size'];
			$nama_foto_surat_agunan_baru                        = $id."".(strtolower(str_replace(" ","_",$nama_foto_surat_agunan)));
            //$nama_foto_surat_agunan_baru            = $id."".$nama_foto_surat_agunan;
			if (($size > 1048576) or ($size2 > 1048576) or ($size3 > 1048576)){
				 $data["status"] = "error";
                $this->load->view('tu/modal_edit', $data);
			} else {

            if($nama_foto_agunan!=""){
                $simpan_foto_agunan = $nama_foto_agunan_baru;
            }else{
                $simpan_foto_agunan = $foto_agunan;
            }
            if($nama_peta!=""){
                $simpan_peta_agunan = $nama_peta_baru;
            }else{
                $simpan_peta_agunan = $peta_lokasi_agunan;
            }
            if($nama_foto_surat_agunan!=""){
                $simpan_surat_agunan = $nama_foto_surat_agunan_baru;
            }else{
                $simpan_surat_agunan = $foto_surat_agunan;
            }

            $simpan_agunan['id_agunan']             = $id_agunan;
            $simpan_agunan['id_pinjaman']           = $id_pinjaman;
            $simpan_agunan['jenis_agunan']          = $this->input->post('txtJenisAgunan');
            $simpan_agunan['no_surat_agunan']       = $this->input->post('txtNoAgunan');
            $simpan_agunan['alamat_agunan']         = $this->input->post('txtAlamatAgunan');
            $simpan_agunan['peta_lokasi_agunan']    = $simpan_peta_agunan;
            $simpan_agunan['foto_agunan']           = $simpan_foto_agunan;
            $simpan_agunan['foto_surat_agunan']     = $simpan_surat_agunan;
            $simpan_agunan['nama_pemilik']          = $this->input->post('txtNamaPemilik');
            $simpan_agunan['tempat_lahir_pemilik']  = $this->input->post('txtTempatLahirPemilik');
            $simpan_agunan['tanggal_lahir_pemilik'] = $thnLahir."/".$blnLahir."/".$tglLahir;
            $simpan_agunan['pekerjaan_pemilik']     = $this->input->post('txtPekerjaanPemilikAgunan');
            $simpan_agunan['alamat_pemilik']        = $this->input->post('txtAlamat');
            $update = $this->Tu_model->Update_Content('tbl_agunan', $simpan_agunan, 'id_agunan');
            if ($update) {
                if($nama_foto_agunan!=""){
                    unlink("images/agunan/".$foto_agunan);
                    move_uploaded_file($lokasi_foto_agunan,"images/agunan/$nama_foto_agunan_baru");
                }
                if($nama_peta!=""){
                    unlink("images/peta agunan/".$peta_lokasi_agunan);
                    move_uploaded_file($lokasi_peta,"images/peta agunan/$nama_peta_baru");
                }
                if($nama_foto_surat_agunan!=""){
                    unlink("images/surat agunan/".$foto_surat_agunan);
                    move_uploaded_file($lokasi_foto_surat_agunan,"images/surat agunan/$nama_foto_surat_agunan_baru");
                }
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit', $data);
            } else {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit', $data);
            }
		}	
        }

        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function status_angsuran(){

       $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
        if($this->input->method() === 'post') {
            $nilai=0;
            $qry2 = "Select * from tbl_pinjaman
                INNER JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                INNER JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
                WHERE tbl_pinjaman.id_pemanfaat = '$id_pemanfaat'
                AND tbl_pinjaman.id_pinjaman='$id_pinjaman'";
            $ambilPinjaman=$this->Tu_model->Select_query($qry2);
            foreach($ambilPinjaman->result() as $g);
            $jangka_waktu = $g->jangka_waktu;

            for($i=1;$i<=$jangka_waktu;$i++){
                $simpan['id_pinjaman'] = $id_pinjaman;
                $simpan['keterangan'] = $this->input->post("cmbAngsuran".$i);
                $simpan['angsuran_ke'] = $i;
                $qry_cek_angsuran=$this->db->query("select * from tbl_angsuran where id_pinjaman='$id_pinjaman' and angsuran_ke='$i'");
                $jumData = $qry_cek_angsuran->num_rows();
                if($jumData==0 && $this->input->post("cmbAngsuran".$i)!=""){
                    $simpan['id_angsuran'] = "";
                    $this->Tu_model->Simpan_Content('tbl_angsuran',$simpan);
                    $nilai=$nilai+1;

                    ?>
                    <script>Alert("Data disimpan <?php echo $nilai;?>");</script>
                    <?php

                }elseif($jumData>0 && $this->input->post("cmbAngsuran".$i)!=""){
                    $simpan['id_angsuran'] = $this->input->post("txtIdAngsuran".$i);
                    $this->Tu_model->Update_Content('tbl_angsuran', $simpan, 'id_angsuran');
                    ?>
                    <script>Alert("Data disimpan <?php echo $nilai;?>");</script>
                    <?php
                }else{

                }
            }

        }
        $qry = "Select * from tbl_pinjaman
                INNER JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                INNER JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
                WHERE tbl_pinjaman.id_pemanfaat = '$id_pemanfaat'
                AND tbl_pinjaman.id_pinjaman='$id_pinjaman'";
        $data['ambil_pinjaman']=$this->Tu_model->Select_query($qry);
        $data['aksi'] = 'Data Pinjaman';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_status');




        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function data_pinjaman(){
        $id =  base64_decode($this->input->post("id"));
        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $qry = "Select * from tbl_pinjaman
                INNER JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                INNER JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
                INNER JOIN tbl_agama on tbl_pemanfaat.id_agama = tbl_agama.id_agama
                AND tbl_pinjaman.id_pinjaman='$id'";
        $data['ambil_pinjaman']=$this->Tu_model->Select_query($qry);
        $this->load->view('tu/v_data_pinjaman', $data);

    }


    public function hapus_pinjaman(){
			error_reporting(0);
        $id_pinjaman = base64_decode($this->uri->segment(3));
        $qry = "Select * from tbl_pinjaman
                INNER JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                INNER JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
                WHERE tbl_pinjaman.id_pinjaman = '$id_pinjaman'";
        $ambil_pemanfaat = $this->Tu_model->Select_query($qry);
        foreach($ambil_pemanfaat->result() as $t);
        $id_pemanfaat = $t->id_pemanfaat;
        $data['ambil_pinjaman']= $this->Tu_model->Select_satu('tbl_pinjaman','id_pemanfaat',$id_pemanfaat);
	//$data['ambil_pemanfaat2']= $this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
	
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'pinjaman/'.hilang_karakter(base64_encode($id_pemanfaat));
        $data['aksi'] = 'Data Pinjaman';


        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        //$this->load->view('tu/v_pinjaman');

        if($id_pinjaman=="") {
            $data['status'] = "error_kosong";
            $this->load->view('tu/modal_hapus', $data);
        }else{

            $ambil_agunan = $this->Tu_model->Select_satu("tbl_agunan","id_pinjaman",$id_pinjaman);
            foreach($ambil_agunan->result() as $w);
            $peta_lokasi_agunan  = $w->peta_lokasi_agunan;
            $foto_agunan  = $w->foto_agunan;
            $foto_surat_agunan  = $w->foto_surat_agunan;

            $ambil_dokumen = $this->Tu_model->Select_satu("tbl_dokumen","id_pinjaman",$id_pinjaman);
            foreach($ambil_dokumen->result() as $r);
            $cover  = $r->cover;
            $surat_permohonan  = $r->surat_permohonan;
            $profil_pemanfaat  = $r->profil_pemanfaat;
            $ktp  = $r->ktp;
            $kk  = $r->kk;
            $rencana_usaha  = $r->rencana_usaha;
            $surat_keterangan_desa  = $r->surat_keterangan_desa;
            $surat_penyerahan_agunan  = $r->surat_penyerahan_agunan;
			$surat_perjanjian_pemberian_kredit  = $r->surat_perjanjian_pemberian_kredit;
            $surat_kuasa_pemakaian_agunan  = $r->surat_kuasa_pemakaian_agunan;
            $surat_kuasa_penjualan  = $r->surat_kuasa_penjualan;
            $foto_usaha_pemanfaat  = $r->foto_usaha_pemanfaat;
			$surat_perjanjian_sanksi  = $r->surat_perjanjian_sanksi;
			$rekening_bank						= $r->rekening_bank;


            if($this->Tu_model->Hapus_Data('tbl_pinjaman','id_pinjaman',$id_pinjaman)) {
                unlink("images/peta agunan/$peta_lokasi_agunan");
                unlink("images/agunan/$foto_agunan");
                unlink("images/surat agunan/$foto_surat_agunan");
                if($cover!=""){
                    unlink("images/dokumen/".$cover);
                }
                if($surat_permohonan!=""){
                    unlink("images/dokumen/".$surat_permohonan);
                }
                if($profil_pemanfaat!=""){
                    unlink("images/dokumen/".$profil_pemanfaat);
                }
                if($ktp!=""){
                    unlink("images/dokumen/".$ktp);
                }
                if($kk!=""){
                    unlink("images/dokumen/".$kk);
                }
				 if($rekening_bank!=""){
                    unlink("images/dokumen/".$rekening_bank);
                }
                
              
                if($surat_penyerahan_agunan!=""){
                    unlink("images/dokumen/".$surat_penyerahan_agunan);
                }
                if($surat_kuasa_pemakaian_agunan!=""){
                    unlink("images/dokumen/".$surat_kuasa_pemakaian_agunan);
                }
                if($surat_kuasa_penjualan!=""){
                    unlink("images/dokumen/".$surat_kuasa_penjualan);
                }
                if($foto_usaha_pemanfaat!=""){
                    unlink("images/dokumen/".$foto_usaha_pemanfaat);
                }
				if($surat_perjanjian_sanksi!=""){
                    unlink("images/dokumen/".$surat_perjanjian_sanksi);
                }
				if($surat_perjanjian_pemberian_kredit!=""){
                    unlink("images/dokumen/".$surat_perjanjian_pemberian_kredit);
                }
                $data['status']="success";
                $this->load->view('tu/modal_hapus',$data);
            }else{
                $data['status'] = "error";
                $this->load->view('tu/modal_hapus', $data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }
    public function upload(){
		error_reporting(0);
        $kolom = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $ambilPemanfaat = $this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['kolom'] = $kolom;
        foreach($ambilPemanfaat->result() as $t);
        $id_pemanfaat = $t->id_pemanfaat;
        $data['kembali']= "dokumen_pinjaman/".hilang_karakter(base64_encode($id_pemanfaat))."/".$this->uri->segment(4);
        $data['title'] = "Upload dokumen";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
		 $data['target_gagal'] = "upload/".$this->uri->segment(3)."/".$this->uri->segment(4);
        $data['target_kembali'] = "dokumen_pinjaman/".hilang_karakter(base64_encode($id_pemanfaat))."/".$this->uri->segment(4);
        $data['aksi'] = 'Upload File '.strtoupper(hilang_karakter($kolom));
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_upload');


        if($this->input->method() === 'post') {
            $id = base_convert(microtime(false), 10, 32);

            $nama_foto                       = $_FILES['fileFoto']['name'];
            $lokasi_foto                     = $_FILES['fileFoto']['tmp_name'];
			$size							 = $_FILES['fileFoto']['size'];
			$type 							 = $_FILES['fileFoto']['type'];
			
            $nama_foto_baru                  = $id."".(strtolower(str_replace(" ","_",$nama_foto)));
            $simpan['id_pinjaman']           = $id_pinjaman;
            $simpan[$kolom]                  = $nama_foto_baru;
			//or $type == 'application/pdf'
			if ($size < 1048576 and ($type =='image/jpeg' or $type == 'image/png' or $type == 'image/gif' or $type == 'image/jpg' )){

            $this->Tu_model->Update_Content('tbl_dokumen', $simpan, 'id_pinjaman');
            if ($this->db->affected_rows() > 0)
            {
                move_uploaded_file($lokasi_foto, "images/dokumen/$nama_foto_baru");
                $data["status"] = "sukses";
                $this->load->view('tu/modal_upload_file',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_upload_file',$data);
            }
			}
			else{
				$data["status"] = "error";
                $this->load->view('tu/modal_upload_file',$data);
			}

        }
		
		
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');

    }
    public function hapus_dokumen(){
        $kolom = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $ambilPemanfaat = $this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        foreach($ambilPemanfaat->result() as $t);
        $id_pemanfaat = $t->id_pemanfaat;
        $data['kembali']= "dokumen_pinjaman/".hilang_karakter(base64_encode($id_pemanfaat))."/".$this->uri->segment(4);
        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = "dokumen_pinjaman/".hilang_karakter(base64_encode($id_pemanfaat))."/".$this->uri->segment(4);
        $ambil_dokumen=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        foreach($ambil_dokumen->result() as $y);
        $nama_file = $y->$kolom;

        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'dokumen_pinjaman/'.hilang_karakter(base64_encode($id_pemanfaat))."/".hilang_karakter(base64_encode($id_pinjaman));
        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambil_status_pembayaran']=$this->Tu_model->Select_query("select max(tanggal_pinjaman) as tanggal, id_pinjaman, status_pembayaran from tbl_pinjaman where id_pemanfaat='$id_pemanfaat' AND id_pinjaman<>'$id_pinjaman'");


        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_dokumen_pinjaman');

        $simpan['id_pinjaman']=$id_pinjaman;
        $simpan[$kolom]=NULL;

        $this->Tu_model->Update_Content('tbl_dokumen', $simpan, 'id_pinjaman');
        if ($this->db->affected_rows() > 0)
        {
            if($nama_file!="") {
                unlink("images/dokumen/$nama_file");
            }
            $data["status"] = "success";
            $this->load->view('tu/modal_hapus',$data);
        }
        else
        {
            $data["status"] = "error";
            $this->load->view('tu/modal_hapus',$data);
        }


        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');

    }

    public function dokumen_pinjaman(){
		

        $data['title'] = "Pemanfaat";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
		$data['target_edit'] = 'dokumen_pinjaman/'.$this->uri->segment(3);
       
        $data['target_kembali'] = 'dokumen_pinjaman/'.$this->uri->segment(3)."/".$this->uri->segment(4);
        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambil_status_pembayaran']=$this->Tu_model->Select_query("select max(tanggal_pinjaman) as tanggal, id_pinjaman, status_pembayaran from tbl_pinjaman where id_pemanfaat='$id_pemanfaat' AND id_pinjaman<>'$id_pinjaman'");
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_dokumen_pinjaman');
		if($this->input->method() === 'post') {


        $simpan['id_pinjaman']                   = base64_decode($this->uri->segment(4));    
        $simpan['pinjaman_disetujui']                   = $this->input->post('setuju');
		$simpan['pesan']                   = $this->input->post('pesan');
		$simpan['usulan_disetujui']                   = $this->input->post('pinjaman_yg_disetujui');
        

        $this->Tu_model->Update_Content('tbl_pinjaman', $simpan, 'id_pinjaman');
        if ($this->db->affected_rows() > 0)
        {
            $data["status"] = "sukses";
            $this->load->view('tu/modal_edit',$data);
        }
        else
        {
            $data["status"] = "error";
            $this->load->view('tu/modal_edit',$data);
        }
		}
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }

    public function rekap(){

        $data['title'] = "Cetak Laporan Peminjaman Perbulan";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
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
                and MONTH(tbl_pinjaman.tanggal_pinjaman) = '$bulan'
                ORDER BY tbl_pinjaman.jumlah_pinjaman ASC";
            $data["ambil_pinjaman"] = $this->Tu_model->Select_query($sql);
        }else{
            $tahun = "";
            $bulan = "";
        }
        $data["tahun"] = $tahun;
        $data['bulan'] = $bulan;

        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_rekap');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }


    public function cetak_rekap(){

        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
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

    public function cetak_surat_permohonan(){

        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
        $r=array();

        $pdf = new FPDF();
        $pdf->AddPage("P","legal");

        $pdf->SetTitle("Surat Permohonan Kredit");
        $ambil_dokumen_pinjaman=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        //=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $ambil_pinjaman=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
		$ambil_profil_usp=$this->Tu_model->Select_satu('tbl_profil_usp','Aktif',"Ya");
		
		foreach($ambil_profil_usp->result() as $pusp);
        $ambil_pemanfaat = $query = $this->db->query("select * from tbl_pemanfaat where id_pemanfaat='$id_pemanfaat'")->result();
        foreach($ambil_pinjaman->result() as $t);

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

        $pdf->Output("","Surat Permohonan Kredit.pdf");
    }

    public function cetak_surat_penyerahan_agunan(){

        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
        $r=array();

        $ambil_dokumen_pinjaman=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $ambil_pemanfaat=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $ambil_pinjaman=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $ambil_agunan=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
		$ambil_profil_usp=$this->Tu_model->Select_satu('tbl_profil_usp','Aktif',"Ya");
		
		foreach($ambil_profil_usp->result() as $pusp);

        foreach($ambil_pemanfaat->result() as $p);
        foreach($ambil_pinjaman->result() as $t);
        foreach($ambil_agunan->result() as $a);
        $tglPinjam = $t->tanggal_pinjaman;
        $pdf = new FPDF();
        $pdf->AddPage("P","legal");
        $pdf->SetMargins(20,100,20);
        $pdf->SetTitle("Surat Penyerahan Agunan");
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
        $pdf->Output("","Surat Penyerahan Agunan.pdf");
    }
    public function cetak_surat_kuasa_pemakaian_agunan(){

        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
		$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp','Aktif',"Ya");
		
		


        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambilPengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
        $this->load->view('tu/surat_kuasapemakaian', $data);

    }
    public function cetak_surat_kuasa_peminjaman_agunan(){

        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
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
        $this->load->view('tu/surat_kuasapeminjaman', $data);

    }
    public function cetak_proposal(){

        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);

		$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp','Aktif',"Ya");
        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambil_pengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
		 $data['ambilPengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $this->load->view('tu/cetak_proposal', $data);

    }
    public function cetak_dokumen(){
		
//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
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
        $data['ambil_status_pembayaran']=$this->Tu_model->Select_query("select max(tanggal_pinjaman) as tanggal, id_pinjaman , status_pembayaran
                                                                        from tbl_pinjaman where id_pemanfaat='$id_pemanfaat'");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
        $data['ambilPengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $this->load->view('tu/pemeriksaan_kelengkapan', $data);

    }

    public function profil(){

        $data['title'] = "Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
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
        $this->load->view('tu/profil', $data);

    }
    public function cetak_surat_kuasa_penjualan_agunan(){

        $data['title'] = "Pinjaman";
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);
		$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp','Aktif',"Ya");
		$data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambilPengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
        $this->load->view('tu/surat_kuasapenjualan', $data);

    }
    public function cetak_surat_perjanjian_pemberian_kredit(){

        $data['title'] = "Pinjaman";
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);

		$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp','Aktif',"Ya");
        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambilPengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
        $this->load->view('tu/sp2k', $data);
		

    }
	
	public function cetak_surat_perjanjian_sanksi(){

        $data['title'] = "Pinjaman";
        $id_pemanfaat = base64_decode($this->uri->segment(3));
        $id_pinjaman = base64_decode($this->uri->segment(4));
        $data['id_pemanfaat'] = $id_pemanfaat;
        $data['id_pinjaman'] = $id_pinjaman;
        $data['aksi'] = 'Dokumen Pinjaman';
        $data['target_kembali'] = 'pinjaman/'.$this->uri->segment(3);

		$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp','Aktif',"Ya");
        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambilPengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
        $this->load->view('tu/surat_perjanjiansanksi', $data);
		

    }
    public function cetak_formulir_verifikasi_usulan(){

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



        $data['ambil_dokumen_pinjaman']=$this->Tu_model->Select_satu('tbl_dokumen','id_pinjaman',$id_pinjaman);
        $data['ambil_pemanfaat']=$this->Tu_model->Select_satu('tbl_pemanfaat','id_pemanfaat',$id_pemanfaat);
        $data['ambil_pinjaman']=$this->Tu_model->Select_satu('tbl_pinjaman','id_pinjaman',$id_pinjaman);
        $data['ambil_agunan']=$this->Tu_model->Select_satu('tbl_agunan','id_pinjaman',$id_pinjaman);
        $data['ambilPengurus']=$this->Tu_model->Select_satu('tbl_pengurus','status_pengurus',"Aktif");
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','status_kades',"Aktif");
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','status_bpd',"Aktif");
        $data['ambil_pendamping']=$this->Tu_model->Select_satu('tbl_pendamping_desa','status_pendamping_desa ',"Aktif");
        $this->load->view('tu/formulir_verifikasiusulan', $data);

    }
    public function cetak_rencana_angsuran(){

        $data['title'] = "Pinjaman";
        $this->load->view('tu/form_rencana_angsuran', $data);

    }
    public function cetak_rencana_pembelian_barang(){

        $data['title'] = "Pinjaman";
        $this->load->view('tu/form_rencana_pembelian_barang', $data);

    }
    public function cetak_daftar_persediaan_barang(){

        $data['title'] = "Pinjaman";
        $this->load->view('tu/form_daftar_persediaan_barang', $data);

    }

    public function agama(){
        $data['title'] = "Agama";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_agama');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_agama');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }

    public function tambah_agama(){
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['title'] = "Agama";
        $data['target_tambah'] = 'tambah_agama';
        $data['target_kembali'] = 'agama';
        $data['aksi'] = 'Data Agama';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_agama');

        if($this->input->method() === 'post') {
            $id_agama        = $this->input->post('txtID');
            $simpan['id_agama']  =$id_agama;
            $simpan['agama']     = $this->input->post('txtAgama');
            if($this->Tu_model->Simpan_Content('tbl_agama',$simpan)){
                $data["status"] = "sukses";
                $this->load->view('tu/modal_tambah',$data);
            }else{
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah');
            }

        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function edit_agama(){

        $data['title'] = "Agama";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_agama = hilang_karakter(base64_decode($this->uri->segment(3)));
        $data['aksi'] = 'Data Agama';
        $data['target_edit'] = 'edit_agama/'.$this->uri->segment(3);
        $data['target_kembali'] = 'agama';
        $data['ambil_agama']=$this->Tu_model->Select_satu('tbl_agama','id_agama',$id_agama);
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_agama');


        if($this->input->method() === 'post') {


            $simpan['id_agama']                   = $this->input->post('txtID');
            $simpan['agama']                   = $this->input->post('txtAgama');

            $this->Tu_model->Update_Content('tbl_agama', $simpan, 'id_agama');
            if ($this->db->affected_rows() > 0)
            {
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }

        }




        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }
    public function hapus_agama(){

        $data['title'] = "Agama";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'agama';
        $data['aksi'] = 'Data Agama';
        $id_agama = base64_decode($this->uri->segment(3));

        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_agama');

        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_agama');

        if($id_agama=="") {
            $data['status'] = "error_kosong";
            $this->load->view('tu/modal_hapus', $data);
        }else{

            if($this->Tu_model->Hapus_Data('tbl_agama','id_agama',$id_agama)) {
                $data['status']="success";
                $this->load->view('tu/modal_hapus',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function pengurus(){
        $data['title'] = "Pengurus";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_pengurus');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_pengurus');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }

    public function tambah_pengurus(){

        $data['title'] = "Pengurus";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_tambah'] = 'tambah_pengurus';
        $data['target_kembali'] = 'pengurus';
        $data['aksi'] = 'Data Pengurus';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_pengurus');


        if($this->input->method() === 'post') {
            $id_pengurus        = $this->input->post('txtID');
            $simpan['id_pengurus']  =$id_pengurus;
            $simpan['periode_pengurus']     = $this->input->post('txtPeriode');
			$simpan['ketua']     = $this->input->post('txtKetua');
			$simpan['komisaris_bumdes']     = $this->input->post('txtKomisarisBumdes');
			$simpan['direktur_bumdes']     = $this->input->post('txtDirekturBumdes');
            
            $simpan['tata_usaha']     = $this->input->post('txtTataUsaha');
            $simpan['sak']     = $this->input->post('txtSak');
            $simpan['kasir']     = $this->input->post('txtKasir');
            $simpan['status_pengurus']     = $this->input->post('cmbStatus');


            if($this->Tu_model->Simpan_Content('tbl_pengurus',$simpan)){
                $data["status"] = "sukses";
                $this->load->view('tu/modal_tambah',$data);
            }else{
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah');
            }

        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function edit_pengurus(){

        $data['title'] = "Pengurus";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_pengurus = hilang_karakter(base64_decode($this->uri->segment(3)));
        $data['aksi'] = 'Data Pengurus';
        $data['target_edit'] = 'edit_pengurus/'.$this->uri->segment(3);
        $data['target_kembali'] = 'pengurus';
        $data['ambil_pengurus']=$this->Tu_model->Select_satu('tbl_pengurus','id_pengurus',$id_pengurus);
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_pengurus');


        if($this->input->method() === 'post') {


            $id_pengurus        = $this->input->post('txtID');
            $simpan['id_pengurus']  =$id_pengurus;
            $simpan['periode_pengurus']     = $this->input->post('txtPeriode');
            $simpan['ketua']     = $this->input->post('txtKetua');
			$simpan['komisaris_bumdes']     = $this->input->post('txtKomisarisBumdes');
			$simpan['direktur_bumdes']     = $this->input->post('txtDirekturBumdes');
            $simpan['tata_usaha']     = $this->input->post('txtTataUsaha');
            $simpan['sak']     = $this->input->post('txtSak');
            $simpan['kasir']     = $this->input->post('txtKasir');
            $simpan['status_pengurus']     = $this->input->post('cmbStatus');

            $this->Tu_model->Update_Content('tbl_pengurus', $simpan, 'id_pengurus');
            if ($this->db->affected_rows() > 0)
            {
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }

        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function hapus_pengurus(){
        $data['title'] = "Pengurus";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'pengurus';
        $data['aksi'] = 'Data Pengurus';
        $id_pengurus = base64_decode($this->uri->segment(3));
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_pengurus');

        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_pengurus');

        if($id_pengurus=="") {
            $data['status'] = "error_kosong";
            $this->load->view('tu/modal_hapus', $data);
        }else{

            if($this->Tu_model->Hapus_Data('tbl_pengurus','id_pengurus',$id_pengurus)) {
                $data['status']="success";
                $this->load->view('tu/modal_hapus',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function kades(){
        $data['title'] = "Kepala Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_kades');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_kades');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }

    public function tambah_kades(){
        $data['title'] = "Kepala Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_tambah'] = 'tambah_kades';
        $data['target_kembali'] = 'kades';
        $data['aksi'] = 'Data Kepala Desa';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_kades');
        if($this->input->method() === 'post') {
            $id = base_convert(microtime(false), 10, 32);
            $id_kades        = $this->input->post('txtID');
            $NamaFoto       = $_FILES['fileFoto']['name'];
            $lokasiFoto     = $_FILES['fileFoto']['tmp_name'];
            $namaFotoBaru   = $id."".$NamaFoto;
            $simpan['id_kades']         =$id_kades;
            $simpan['periode_kades']    = $this->input->post('txtPeriodeKades');
            $simpan['nama_kades']            = $this->input->post('txtNamaKades');
            $simpan['foto_kades']            = $namaFotoBaru;
            $simpan['status_kades']     = $this->input->post('cmbStatus');
            if($this->Tu_model->Simpan_Content('tbl_kades',$simpan)){
                if($NamaFoto!=""){
                    move_uploaded_file($lokasiFoto,"images/kades/$namaFotoBaru");
                }
                $data["status"] = "sukses";
                $this->load->view('tu/modal_tambah',$data);
            }else{
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah');
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function edit_kades(){
        $data['title'] = "Kepala Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_kades = hilang_karakter(base64_decode($this->uri->segment(3)));
        $data['aksi'] = 'Data Kepala Desa';
        $data['target_edit'] = 'edit_kades/'.$this->uri->segment(3);
        $data['target_kembali'] = 'kades';
        $data['ambil_kades']=$this->Tu_model->Select_satu('tbl_kades','id_kades',$id_kades);
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_kades');
        if($this->input->method() === 'post') {
            $id = base_convert(microtime(false), 10, 32);
            $id_kades        = $this->input->post('txtID');
            $NamaFoto       = $_FILES['fileFoto']['name'];
            $lokasiFoto     = $_FILES['fileFoto']['tmp_name'];
            $namaFotoBaru   = $id."".$NamaFoto;
            $fotoLama       = $this->input->post("fotoLama");
            $simpan['id_kades']         =$id_kades;
            $simpan['periode_kades']    = $this->input->post('txtPeriodeKades');
            $simpan['nama_kades']            = $this->input->post('txtNamaKades');
            $simpan['status_kades']     = $this->input->post('cmbStatus');
            if($NamaFoto!=""){
                $simpan['foto_kades'] = $namaFotoBaru;
            }else{
                $simpan['foto_kades'] = $fotoLama;
            }

            $update = $this->Tu_model->Update_Content('tbl_kades', $simpan, 'id_kades');
            if ($update)
            {
                if($NamaFoto!=""){
                    if($fotoLama!="-" && $fotoLama!=""){
                        unlink("images/kades/$fotoLama");
                    }
                    move_uploaded_file($lokasiFoto,"images/kades/$namaFotoBaru");
                }
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function hapus_kades(){
        $data['title'] = "Kepala Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'kades';
        $data['aksi'] = 'Data Kepala Desa';
        $id_kades = base64_decode($this->uri->segment(3));
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_kades');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_kades');
        if($id_kades=="") {
            $data['status'] = "error_kosong";
            $this->load->view('tu/modal_hapus', $data);
        }else{
            $ambilKades = $this->Tu_model->Select_satu('tbl_kades','id_kades',$id_kades);
            foreach($ambilKades->result() as $k);
            $foto = $k->foto_kades;
            if($this->Tu_model->Hapus_Data('tbl_kades','id_kades',$id_kades)) {
                if($foto!="-" || $foto!=""){
                    unlink("images/kades/$foto");
                }
                $data['status']="success";
                $this->load->view('tu/modal_hapus',$data);
            }else{
                $data['status']="error";
                $this->load->view('tu/modal_hapus',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');

        $this->load->view('tu/end_page');
    }

    public function bpd(){
        $data['title'] = "Badan Permusyawaratan Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_bpd');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_bpd');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }

    public function tambah_bpd(){
        $data['title'] = "Badan Permusyawaratan Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_tambah'] = 'tambah_bpd';
        $data['target_kembali'] = 'bpd';
        $data['aksi'] = 'Data Badan Permusyawaratan Desa';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_bpd');
        if($this->input->method() === 'post') {
            $id_bpd        = $this->input->post('txtID');
            $simpan['id_bpd']         =$id_bpd;
            $simpan['periode_bpd']    = $this->input->post('txtPeriodeBpd');
            $simpan['nama_bpd']       = $this->input->post('txtNamaBpd');
            $simpan['status_bpd']     = $this->input->post('cmbStatus');
            if($this->Tu_model->Simpan_Content('tbl_bpd',$simpan)){
                $data["status"] = "sukses";
                $this->load->view('tu/modal_tambah',$data);
            }else{
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah');
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function edit_bpd(){
        $data['title'] = "Badan Permusyawaratan Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_bpd = hilang_karakter(base64_decode($this->uri->segment(3)));
        $data['aksi'] = 'Data Badan Permusyawaratan Desa';
        $data['target_edit'] = 'edit_bpd/'.$this->uri->segment(3);
        $data['target_kembali'] = 'bpd';
        $data['ambil_bpd']=$this->Tu_model->Select_satu('tbl_bpd','id_bpd',$id_bpd);
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_bpd');
        if($this->input->method() === 'post') {
            $id_bpd        = $this->input->post('txtID');
            $simpan['id_bpd']         =$id_bpd;
            $simpan['periode_bpd']    = $this->input->post('txtPeriodeBpd');
            $simpan['nama_bpd']            = $this->input->post('txtNamaBpd');
            $simpan['status_bpd']     = $this->input->post('cmbStatus');

            $this->Tu_model->Update_Content('tbl_bpd', $simpan, 'id_bpd');
            if ($this->db->affected_rows() > 0)
            {
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function hapus_bpd(){
        $data['title'] = "Badan Permusyawaratan Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'bpd';
        $data['aksi'] = 'Data Badan Permusyawaratan Desa';
        $id_bpd = base64_decode($this->uri->segment(3));
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_bpd');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_bpd');
        if($id_bpd=="") {
            $data['status'] = "error_kosong";
            $this->load->view('tu/modal_hapus', $data);
        }else{
            if($this->Tu_model->Hapus_Data('tbl_bpd','id_bpd',$id_bpd)) {
                $data['status']="success";
                $this->load->view('tu/modal_hapus',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');

        $this->load->view('tu/end_page');
    }
    public function ubah_password(){
        $data['title'] = "Ubah Password";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['aksi'] = 'Ubah Password';
        $data['target_edit'] = 'ubah_password';
        $data['target_kembali'] = 'ubah_password';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_password');
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
                $this->load->view('tu/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }
	 public function profil_usp(){
        $data['title'] = "Profil USP";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_profil_usp');
		 $data['aksi'] = 'Profil USP';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_profil_usp');
		
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
		
    }
	
	public function tambah_profil_usp(){
        $data['title'] = "Profil USP";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_tambah'] = 'tambah_profil_usp';
        $data['target_kembali'] = 'profil_usp';
        $data['aksi'] = 'Data Profil USP';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_profil_usp');
		if($this->input->method() === 'post') {
            

            $nama_foto                       = $_FILES['txtLogoUsp']['name'];
            $lokasi_foto                     = $_FILES['txtLogoUsp']['tmp_name'];
            //$nama_foto_baru                  = $id."".$nama_foto;
            $id_profil        = $this->input->post('txtID');
            $simpan['id_profil']         =$id_profil;
            $simpan['nama_desa']    = $this->input->post('txtNamaDesa');
            $simpan['nama_usp_surat']            = $this->input->post('txtNamaUsp');
			$simpan['bum_desa']            = $this->input->post('txtNamaBumDesa');
            $simpan['aktif']     = $this->input->post('cmbStatus');
			$simpan['alamat_usp']     = $this->input->post('txtAlamatUsp');
			$simpan['logo']     = $nama_foto;
            //$simpan[$kolom]                  = $nama_foto_baru;

            $this->Tu_model->Simpan_Content('tbl_profil_usp',$simpan);
            if ($this->db->affected_rows() > 0)
            {
                    move_uploaded_file($lokasi_foto, "images/logo/$nama_foto");
                $data["status"] = "sukses";
                $this->load->view('tu/modal_tambah',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah',$data);
            }

        }
      
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }
	public function hapus_profil_usp(){
        $data['title'] = "Profil USP";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'profil_usp';
        $data['aksi'] = 'Data Profil USP';
        $id_profil = base64_decode($this->uri->segment(3));
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_profil_usp');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_profil_usp');
		 if($id_profil=="") {
            $data['status'] = "error_kosong";
            $this->load->view('tu/modal_hapus', $data);
        }else{
            $ambilProfil = $this->Tu_model->Select_satu('tbl_profil_usp','id_profil',$id_profil);
            foreach($ambilProfil->result() as $k);
            $foto = $k->logo;
            if($this->Tu_model->Hapus_Data('tbl_profil_usp','id_profil',$id_profil)) {
                if($foto!="-" || $foto!=""){
                    unlink("images/logo/$foto");
                }
                $data['status']="success";
                $this->load->view('tu/modal_hapus',$data);
            }else{
                $data['status']="error";
                $this->load->view('tu/modal_hapus',$data);
            }
        }
		
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');

        $this->load->view('tu/end_page');
    }
	public function edit_profil_usp(){
        $data['title'] = "Kepala Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_profil = hilang_karakter(base64_decode($this->uri->segment(3)));
        $data['aksi'] = 'Data Profil USP';
        $data['target_edit'] = 'edit_kprofil_usp/'.$this->uri->segment(3);
        $data['target_kembali'] = 'profil_usp';
        $data['ambil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp','id_profil',$id_profil);
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_profil_usp');
        if($this->input->method() === 'post') {
            $id = base_convert(microtime(false), 10, 32);
            $id_profil        = $this->input->post('txtID');
            $NamaFoto       = $_FILES['fileFoto']['name'];
            $lokasiFoto     = $_FILES['fileFoto']['tmp_name'];
            $namaFotoBaru   = $id."".$NamaFoto;
            $fotoLama       = $this->input->post("fotoLama");
            $simpan['id_profil']         =$id_profil;
            $simpan['nama_desa']    = $this->input->post('txtNamaDesa');
            $simpan['bum_desa']            = $this->input->post('txtNamaBumdes');
            $simpan['nama_usp_surat']     = $this->input->post('txtNamaUsp');
			$simpan['alamat_usp']     = $this->input->post('txtAlamatUsp');
			$simpan['aktif']     = $this->input->post('cmbStatus');
            if($NamaFoto!=""){
                $simpan['logo'] = $namaFotoBaru;
            }else{
                $simpan['logo'] = $fotoLama;
            }

            $update = $this->Tu_model->Update_Content('tbl_profil_usp', $simpan, 'id_profil');
            if ($update)
            {
                if($NamaFoto!=""){
                    if($fotoLama!="-" && $fotoLama!=""){
                        unlink("images/logo/$fotoLama");
                    }
                    move_uploaded_file($lokasiFoto,"images/logo/$namaFotoBaru");
                }
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function pamdes(){
        $data['title'] = "Pendamping Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_pendamping_desa');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_pamdes');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }

    public function tambah_pamdes(){
        $data['title'] = "Pendamping Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_tambah'] = 'tambah_pamdes';
        $data['target_kembali'] = 'pamdes';
        $data['aksi'] = 'Data Pendamping Desa';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_pamdes');
        if($this->input->method() === 'post') {
            $id_pendamping_desa        = $this->input->post('txtID');
            $simpan['id_pendamping_desa']         =$id_pendamping_desa;
            $simpan['periode_pendamping_desa']    = $this->input->post('txtPeriodePamdes');
            $simpan['nama_pendamping_desa']            = $this->input->post('txtNamaPamdes');
            $simpan['status_pendamping_desa']     = $this->input->post('cmbStatus');
            if($this->Tu_model->Simpan_Content('tbl_pendamping_desa',$simpan)){
                $data["status"] = "sukses";
                $this->load->view('tu/modal_tambah',$data);
            }else{
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah');
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function edit_pamdes(){
        $data['title'] = "Pendamping Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_pendamping_desa = hilang_karakter(base64_decode($this->uri->segment(3)));
        $data['aksi'] = 'Data Pendamping Desa';
        $data['target_edit'] = 'edit_pamdes/'.$this->uri->segment(3);
        $data['target_kembali'] = 'pamdes';
        $data['ambil_pamdes']=$this->Tu_model->Select_satu('tbl_pendamping_desa','id_pendamping_desa',$id_pendamping_desa);
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_pamdes');
        if($this->input->method() === 'post') {
            $id_pendamping_desa        = $this->input->post('txtID');
            $simpan['id_pendamping_desa']         =$id_pendamping_desa;
            $simpan['periode_pendamping_desa']    = $this->input->post('txtPeriodePamdes');
            $simpan['nama_pendamping_desa']            = $this->input->post('txtNamaPamdes');
            $simpan['status_pendamping_desa']     = $this->input->post('cmbStatus');

            $this->Tu_model->Update_Content('tbl_pendamping_desa', $simpan, 'id_pendamping_desa');
            if ($this->db->affected_rows() > 0)
            {
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
    }

    public function hapus_pamdes(){
        $data['title'] = "Pendamping Desa";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'pamdes';
        $data['aksi'] = 'Data Pendamping Desa';
        $id_pendamping_desa = base64_decode($this->uri->segment(3));
        $data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_pendamping_desa');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_pamdes');
        if($id_pendamping_desa=="") {
            $data['status'] = "error_kosong";
            $this->load->view('tu/modal_hapus', $data);
        }else{
            if($this->Tu_model->Hapus_Data('tbl_pendamping_desa','id_pendamping_desa',$id_pendamping_desa)) {
                $data['status']="success";
                $this->load->view('tu/modal_hapus',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');

        $this->load->view('tu/end_page');
    }
	public function user_pemanfaat(){
		
		$data['title'] = "User Pemanfaat";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
		$data['hasil']=$hasil = $this->Tu_model->Select_satu('tbl_user','level','pemanfaat');
		 $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_user_pemanfaat');
		$this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
		
	}
	public function tambah_data_user () {
		
        $data['title'] = "User Pemanfaat";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_tambah'] = 'tambah_data_user';
        $data['target_kembali'] = 'user_pemanfaat';
		 $data['aksi'] = 'Tambah Data User Pemanfaat';
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/add_data_user_pemanfaat');
	

        if($this->input->method() === 'post') {
           
              $id_user       = $this->input->post('txtID');
			$simpan['id_user'] = $id_user;
            $simpan['username']     = $this->input->post('txtUsername');
            $password              = $this->input->post('txtPassword');
			$pass = md5($password);
            $simpan['password']    = $pass;
			$simpan['level']     = ('pemanfaat');
			$simpan['id_pemanfaat'] = $this->input->post('txtIdPemanfaat');
            
            if($this->Tu_model->Simpan_Content('tbl_user',$simpan)){
                $data["status"] = "sukses";
                $this->load->view('tu/modal_tambah',$data);
            }else{
                $data["status"] = "error";
                $this->load->view('tu/modal_tambah');
            }

        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
		
	}
	public function edit_user_pemanfaat (){
		error_reporting(0);
         $data['title'] = "User Pemanfaat";
		 //untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $id_user = hilang_karakter(base64_decode($this->uri->segment(3)));
        $data['aksi'] = 'Data User Pemanfaat';
        $data['target_edit'] = 'edit_user_pemanfaat/'.$this->uri->segment(3);
        $data['target_kembali'] = 'user_pemanfaat';
        $data['ambil_user_pemanfaat']=$this->Tu_model->Select_satu('tbl_user','id_user',$id_user);
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/edit_user_pemanfaat');


        if($this->input->method() === 'post') {


			$id_user      		   = $this->input->post('txtID');
			$simpan['id_user']     = $id_user;
            $simpan['username']    = $this->input->post('txtUsername');
			$password              = $this->input->post('txtPassword');
			$pass = md5($password);
            $simpan['password']    = $pass;
			$simpan['id_pemanfaat']=$this->input->post('txtIdPemanfaat');

            $this->Tu_model->Update_Content('tbl_user', $simpan, 'id_user');
			
            if ($this->db->affected_rows() > 0)
            {
                $data["status"] = "sukses";
                $this->load->view('tu/modal_edit',$data);
            }
            else
            {
                $data["status"] = "error";
                $this->load->view('tu/modal_edit',$data);
            }

        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
        $this->load->view('tu/end_page');
	}
	public function hapus_user_pemanfaat(){
        $data['title'] = "User Pemanfaat";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['target_kembali'] = 'user_pemanfaat';
        $data['aksi'] = 'Data User Pemanfaat';
        $id_user = base64_decode($this->uri->segment(3));
	
        $data['hasil']=$hasil = $this->Tu_model->Select_satu('tbl_user','level','pemanfaat');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_user_pemanfaat');
        if($id_user=="") {
            $data['status'] = "error_kosong";
            $this->load->view('tu/modal_hapus', $data);
        }else{
            if($this->Tu_model->Hapus_Data('tbl_user','id_user',$id_user)) {
                $data['status']="success";
                $this->load->view('tu/modal_hapus',$data);
            }
        }
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');

        $this->load->view('tu/end_page');
    }
	public function proposal(){
		
		$data['title'] = "Proposal";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
		$data['hasil']=$hasil = $this->Tu_model->Select_satu('tbl_user','level','pemanfaat');
		 $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_proposal');
		$this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/js_mask');
		
	}
	public function cetak_laporan(){
        $data['title'] = "Cetak Laporan";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        //$data['hasil']=$hasil = $this->Tu_model->Select_all('tbl_kades');
        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_cetak_laporan');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }
	public function laporan_daftar_pemanfaat(){

        $data['title'] = "Cetak Laporan Daftar Pemanfaat";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['ambil_tahun'] = $this->Tu_model->Select_query("SELECT DISTINCT (
                                                                year( tgl_daftar )
                                                                )as tahun
                                                                FROM tbl_pemanfaat");

        $data['aksi'] = 'Daftar Pemanfaat';

        if($this->input->method() === 'post') {
            $tahun = $this->input->post("cmbTahun");
            $bulan = $this->input->post("cmbBulan");
            $sql="Select * from tbl_pemanfaat Join tbl_agama on tbl_pemanfaat.id_agama = tbl_agama.id_agama
			WHERE YEAR(tbl_pemanfaat.tgl_daftar)='$tahun'
            ORDER BY tbl_pemanfaat.tgl_daftar ASC";
            $data["ambil_data"] = $this->Tu_model->Select_query($sql);
        }else{
            $tahun = "";
            $bulan = "";
        }
        $data["tahun"] = $tahun;
        $data['bulan'] = $bulan;

        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_laporan_daftar_pemanfaat');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }
	
	public function laporan_daftar_pinjaman(){

        $data['title'] = "Cetak Laporan Daftar Pinjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
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
                WHERE YEAR(tbl_pinjaman.tanggal_pinjaman)='$tahun' and tbl_pinjaman.pinjaman_disetujui='Y' or 
                tbl_pinjaman.pinjaman_disetujui='N'
                ORDER BY tbl_pinjaman.tanggal_pinjaman ASC";
            $data["ambil_data"] = $this->Tu_model->Select_query($sql);
        }else{
            $tahun = "";
            $bulan = "";
        }
        $data["tahun"] = $tahun;
        $data['bulan'] = $bulan;

        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_laporan_daftar_pinjaman');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }
	public function laporan_daftar_usulan(){

        $data['title'] = "Cetak Laporan Daftar Usulan Peminjaman";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['ambil_tahun'] = $this->Tu_model->Select_query("SELECT DISTINCT (
                                                                year( tanggal_pinjaman )
                                                                )as tahun
                                                                FROM tbl_pinjaman");

        $data['aksi'] = 'Dokumen Usulan';

        if($this->input->method() === 'post') {
            $tahun = $this->input->post("cmbTahun");
            $bulan = $this->input->post("cmbBulan");
            $sql="Select * from tbl_pinjaman
                 JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
               
                WHERE YEAR(tbl_pinjaman.tanggal_pinjaman)='$tahun' and tbl_pinjaman.pinjaman_disetujui=''
                ORDER BY tbl_pinjaman.tanggal_pinjaman ASC";
            $data["ambil_data"] = $this->Tu_model->Select_query($sql);
        }else{
            $tahun = "";
            $bulan = "";
        }
        $data["tahun"] = $tahun;
        $data['bulan'] = $bulan;

        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_laporan_daftar_usulan');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }
	public function laporan_daftar_agunan(){

        $data['title'] = "Cetak Laporan Daftar Agunan";
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_all('tbl_profil_usp');
        $data['ambil_tahun'] = $this->Tu_model->Select_query("SELECT DISTINCT (
                                                                year( tanggal_pinjaman )
                                                                )as tahun
                                                                FROM tbl_pinjaman");

        $data['aksi'] = 'Dokumen Agunan';

        if($this->input->method() === 'post') {
            $tahun = $this->input->post("cmbTahun");
            $bulan = $this->input->post("cmbBulan");
            $sql="Select * from tbl_pinjaman
                 JOIN tbl_pemanfaat on tbl_pinjaman.id_pemanfaat = tbl_pemanfaat.id_pemanfaat
                JOIN tbl_agunan on tbl_pinjaman.id_pinjaman = tbl_agunan.id_pinjaman
               
                WHERE YEAR(tbl_pinjaman.tanggal_pinjaman)='$tahun' 
                ORDER BY tbl_pinjaman.tanggal_pinjaman ASC";
            $data["ambil_data"] = $this->Tu_model->Select_query($sql);
        }else{
            $tahun = "";
            $bulan = "";
        }
        $data["tahun"] = $tahun;
        $data['bulan'] = $bulan;

        $this->load->view('tu/head', $data);
        $this->load->view('tu/profile');
        $this->load->view('tu/side_menu');
        $this->load->view('tu/top_nav');
        $this->load->view('tu/v_laporan_daftar_agunan');
        $this->load->view('tu/footer');
        $this->load->view('tu/js_file');
        $this->load->view('tu/end_page');
    }


}
