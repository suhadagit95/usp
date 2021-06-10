<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Id_model extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }

//    untuk mengcek jumlah username dan password yang sesuai
    function login($username,$password,$level) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('level', $level);
        $query =  $this->db->get('tbl_user');
        return $query->num_rows();
    }

//    untuk mengambil data hasil login
    function data_login($username,$password,$level) {
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $this->db->where('level', $level);
        return $this->db->get('tbl_user')->row();
    }
}