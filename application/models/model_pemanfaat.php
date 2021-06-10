<?php class Model_pemanfaat extends CI_Model {
    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
    }
    function Data_Login($user,$pass)
    {
        $user_bersih=mysql_real_escape_string($user);
        $pass_bersih=mysql_real_escape_string($pass);
        $query=$this->db->query("select * from tbl_user where username='$user_bersih' and password=md5('$pass_bersih')");
        return $query;
    }
	
    function Select_satu($table, $field, $param)
    {
        $q=$this->db->query("select * from $table where $field = '$param'");
        return $q;
    }
    function Select_query($qry)
    {
        $q=$this->db->query("$qry");
        return $q;
    }
    function Select_query_cek($qry)
    {
        $q=$this->db->query("$qry");
        $q=$this->db->num_rows();
        return $q;
    }
	 function Select_dua($table,$field1,$param1,$field2,$param2)
    {
        $q=$this->db->query("select * from $table where $field1 = '$param1' and $field2='$param2'");
        return $q;
    }
	 function Select_tiga($table,$field1,$param1,$field2,$param2,$field3,$param3)
    {
        $q=$this->db->query("select * from $table where $field1 = '$param1' and $field2='$param2' and $field3='$param3'");
        return $q;
    }

	function Select_all($table)
    {
        $q=$this->db->query("select * from $table");
        return $q;
    }
	
	function Select_join_dua($table1,$field1,$table2,$field2,$field3,$param)
    {
		$q=$this->db->query("select * from $table1 join $table2 on $table1.$field1=$table2.$field2 where $table1.$field3='$param' ");
        return $q;
    }
	function Hapus_Data($namaTabel, $field, $param)
    {
        $q=$this->db->query("delete from $namaTabel where $field = '$param'");
        return $q;
    }
	function Simpan_Content($tabel,$data)
    {
        $s=$this->db->insert($tabel,$data);
        return $s;
    }
	   function Update_Content($tabel,$isi,$seleksi)
    {
        $query=$this->db->where($seleksi,$isi[$seleksi]);
        $query=$this->db->update($tabel,$isi);
        return $query;
    }

}
?>