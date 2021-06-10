<?php
class Tu_model extends CI_Model {
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
	
	function Select_staff($nik)
    {
        $q=$this->db->query("select * from tbl_staff where nik=$nik");
        return $q;
    }
	function Select_join_peminjaman($id_pemanfaat)
	{
		$q=$this->db-query("select * from tbl_pemanfaat join tbl_pinjaman on id_pemanfaat.tbl_pemanfaat=id_pemanfaat.tbl_pinjaman where tbl_pinjaman.id_pemanfaat=$id_pemanfaat");
	}

    function Select_left_join($table1, $table2, $field)
    {
        $q=$this->db->query("select DISTINCT(tbl_galeri.id_album), tbl_album.judul_album, tbl_album.ket_album, tbl_galeri.gambar from ".$table1." inner join ".$table2." on ".$table1.".".$field." = ".$table2.".".$field);
        return $q;
    }

    function autonumber($tabel, $kolom, $lebar=0, $awalan='')
    {
        $query="select $kolom from $tabel order by $kolom desc limit 1";
        $q=$this->db->query($query);
        $jumlahrecord = $q->num_rows();
        if($jumlahrecord == 0)
            $nomor=1;
        else
        {
            foreach($q->result() as $row);
            $nomor=intval(substr($row->id_pemanfaat,strlen($awalan)))+1;
        }
        if($lebar>0)
            $angka = $awalan.str_pad($nomor,$lebar,"0",STR_PAD_LEFT);
        else
            $angka = $awalan.$nomor;
        return $angka;
    }

    function Select_kontak()
    {
        $q=$this->db->query("SELECT tbl_kontak. * , provinces.name AS 'nama_provinsi', provinces.id AS 'id_provinsi',
                            regencies.name AS 'nama_kabupaten', districts.name AS 'nama_kecamatan',regencies.id AS 'id_kabupaten', districts.id AS 'id_kecamatan'
                            FROM tbl_kontak
                            INNER JOIN districts ON tbl_kontak.kecamatan = districts.id
                            INNER JOIN regencies ON districts.regency_id = regencies.id
                            INNER JOIN provinces ON regencies.province_id = provinces.id");
        return $q;
    }
    function Select_dua($table,$field1,$field2,$param1,$param2)
    {
        $q=$this->db->query("select * from $table where $field1 = '$param1' and $field2='$param2'");
        return $q;
    }

    function Select_all($table)
    {
        $q=$this->db->query("select * from $table");
        return $q;
    }


    //combo dinamis
    function getProvinsi() {
        $this->db->order_by("name", "ASC");
        return $this->db->get("provinces");
    }


    function get_kabupaten_by_provinsi($id) {
        $this->db->order_by("name", "ASC");
        $this->db->where("province_id", $id);
        $query = $this->db->get("regencies");
        if ($query->num_rows() > 0) return $query->result();
    }
    function get_kecamatan_by_kabupaten($id) {
        $this->db->order_by("name", "ASC");
        $this->db->where("regency_id", $id);
        $query = $this->db->get("districts");
        if ($query->num_rows() > 0) return $query->result();
    }


    //end combo dinamis

    function Simpan_Gambar($datainsert)
    {
        $this->db->insert('tbl_image',$datainsert);
    }

    function Hapus_Data($namaTabel, $field, $param)
    {
        $q=$this->db->query("delete from $namaTabel where $field = '$param'");
        return $q;
    }

    function Hapus_Dua_Param($namaTabel,$field1,$field2,$param1,$param2)
    {
        $q=$this->db->query("delete from $namaTabel where $field1 = '$param1' and $field2 = '$param2'");
        return $q;
    }

    function getDataGambar()
    {
        $query=$this->db->query("select * from tbl_image");
        return $query;
    }

    function Simpan_Content($tabel,$data)
    {
        $s=$this->db->insert($tabel,$data);
        return $s;
    }

    function Edit_Profil($isi, $field, $param){
        $query=$this->db->query("update tbl_profil set ket = '$isi' where $field = '$param'");
        return $query;
    }

    function Update_Content($tabel,$isi,$seleksi)
    {
        $query=$this->db->where($seleksi,$isi[$seleksi]);
        $query=$this->db->update($tabel,$isi);
        return $query;
    }

    //Batas dengan Script Lama
    function Simpan_Data_Statis($data)
    {
        $s=$this->db->insert('tbl_data',$data);
        return $s;
    }

    function Update_Tabel($tabel,$isi,$field,$isiField)
    {
        $this->db->where($field,$isiField);
        $this->db->update($tabel,$isi);
    }


    function Edit_Content($tabel,$seleksi)
    {
        $query=$this->db->query("select * from $tabel where $seleksi");
        return $query;
    }

    function Delete_Content($id,$seleksi,$tabel)
    {
        $this->db->where($seleksi,$id);
        $this->db->delete($tabel);
    }

    function Edit_Password($usernameBaru, $PassBaru, $passLama, $usernameLama){
        $query=$this->db->query("update tbl_user set username = '$usernameBaru',
                                 password = '$PassBaru' where username = '$usernameLama' and password = '$passLama'");
        return $query;
    }



    function Berita($offset,$limit)
    {
        $q=$this->db->query("select * from tbl_berita order by id_berita DESC LIMIT $offset,$limit");
        return $q;
    }
    function Total_Artikel($tabel)
    {
        $q=$this->db->query("select * from $tabel");
        return $q;
    }
    function Simpan_Artikel($tabel,$data)
    {
        $s=$this->db->insert($tabel,$data);
        return $s;
    }
    function Pengumuman($offset,$limit)
    {
        $q=$this->db->query("select * from tbl_pengumuman order by id_pengumuman DESC LIMIT $offset,$limit");
        return $q;
    }
    function Agenda($offset,$limit)
    {
        $q=$this->db->query("select * from tbl_agenda order by id_agenda DESC LIMIT $offset,$limit");
        return $q;
    }
    function Siswa_Kelas()
    {
        $q=$this->db->query("select * from tbl_kelas group by tbl_kelas.id_kelas order by tbl_kelas.id_kelas ASC");
        return $q;
    }
    function Siswa_Per_Kelas($id)
    {
        $q=$this->db->query("select * from tbl_siswa left join tbl_kelas on tbl_siswa.id_kelas=tbl_kelas.id_kelas where tbl_siswa.id_kelas=$id order by tbl_siswa.id_siswa ASC"
        );
        return $q;
    }
    function Daftar_Pegawai($offset,$limit)
    {
        $q=$this->db->query("select * from tbl_kepegawaian order by tbl_kepegawaian.id_kepegawaian ASC LIMIT $offset,$limit");
        return $q;
    }
    function Simpan_Pegawai($in)
    {
        $this->db->trans_start();
        $this->db->query("INSERT INTO tbl_kepegawaian (nip, nama_pegawai, kelahiran, matpel, jk, status, username, password) VALUES ('".$in['nip']."',
        '".$in['nama_pegawai']."', '".$in['kelahiran']."', '".$in['matpel']."', '".$in['jk']."', '".$in['status']."', '".$in['username']."',
        md5( '".$in['password']."'))");
        $this->db->trans_complete();
        $sukses = TRUE;
        if ($this->db->trans_status() === FALSE)
        {
            $sukses = FALSE;
        }
        return $sukses;
    }
    function Update_Password($in,$id)
    {
        $q=$this->db->query("update tbl_kepegawaian set password=md5('".$in."') where id_kepegawaian='".$id."'");
        return $q;
    }
    function Daftar_Polling($offset,$limit)
    {
        $q=$this->db->query("select * from tbl_soalpolling order by id_soal_poll DESC LIMIT $offset,$limit");
        return $q;
    }
    function Tampil_Data($tabel,$id)
    {
        $q=$this->db->query("select * from ".$tabel." order by ".$id." DESC");
        return $q;
    }
    function Tampil_Data_Terbatas($tabel,$id,$join,$offset,$limit)
    {
        $q=$this->db->query("select * from ".$tabel." ".$join." order by ".$id." DESC LIMIT ".$offset.",".$limit."");
        return $q;
    }
    function Tampil_Data_Terseleksi($tabel,$id,$id_seleksi)
    {
        $q=$this->db->query("select * from ".$tabel." where ".$id." = ".$id_seleksi."");
        return $q;
    }
    function Ambil_join_terbatas($tabel1,$tabel2,$param,$kondisi,$value){
        $this->db->select('*');
        $this->db->from($tabel1);
        $this->db->join($tabel2,$tabel1.".".$param."=".$tabel2.".".$param,'inner');
        $this->db->where($tabel1.".".$kondisi, "$value");
        $query=$this->db->get();
        return $query;
    }
    function Tampil_Cek_Absen($id_kelas,$tgl,$bln,$thn)
    {
        $q=$this->db->query("select * from tbl_absensi left join tbl_siswa on tbl_absensi.id_siswa=tbl_siswa.id_siswa where tbl_absensi.id_kelas=".$id_kelas." and tanggal=".$tgl." and bulan=".$bln." and tahun=".$thn
        ."");
        return $q;
    }
    function Simpan_Data($query)
    {
        $this->db->query($query);
    }
    function Edit_Absen($id_absen)
    {
        $q=$this->db->query("select * from tbl_absensi left join (tbl_kelas,tbl_siswa) on tbl_absensi.id_kelas=tbl_kelas.id_kelas and tbl_absensi.id_siswa=tbl_siswa.id_siswa
        where tbl_absensi.id_absensi = ".$id_absen."");
        return $q;
    }



}
?>
