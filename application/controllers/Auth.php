<?php
class Auth extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->database();
		$this->load->model('Tu_model');
        $this->load->library('session');
    }
    public function index($error = NULL) {

        if ($this->session->userdata('level')=="Tata Usaha") {
            redirect(site_url('tu'));
        }elseif($this->session->userdata('level')=="Ketua") {
            redirect(site_url('ketua'));
        }
        elseif($this->session->userdata('level')=="Pemanfaat") {
            redirect(site_url('pemanfaat'));
        }
        $data = array(
            'title' => 'Login Page',
            'error' => $error
        );
		//untuk mnengambil logo dan nama usp
		$data['ambil_profil_usp']=$this->Tu_model->Select_satu('tbl_profil_usp', 'aktif', 'Ya');
        $this->load->view('auth/login', $data);
    }

    public function login()
    {
        $this->load->model('auth_model');
        $login = $this->auth_model->login($this->input->post('username'), md5($this->input->post('password')), $this->input->post('cmbLevel'));

        if ($login == 1) {
            //          ambil detail data
            $row = $this->auth_model->data_login($this->input->post('username'), md5($this->input->post('password')), $this->input->post('cmbLevel'));

            //          daftarkan session
            $data = array(
                'logged' => TRUE,
                'username' => $row->username,
                'password' => $row->password,
                'level' => $row->level
                
            );
            $this->session->set_userdata($data);
            //            redirect ke halaman sukses
            if($row->level=="Tata Usaha") {
                redirect(site_url('tu'));
            }elseif($row->level=="Ketua") {
                redirect(site_url('ketua'));
            }
        } else {
            //            tampilkan pesan error
            $error = 'username / password salah';
            $this->index($error);
        }
    }

    function logout() {
        //        destroy session
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('level');
        session_destroy();


        //        redirect ke halaman login
        redirect(base_url());
    }

}