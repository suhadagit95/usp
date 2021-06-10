<?php
/**
 * Created by PhpStorm.
 * User: PHP Developper
 * Date: 26/08/2018
 * Time: 2:23
 */

function hilang_karakter($kalimat){
    $kata = preg_replace("/[^A-Za-z0-9]/", "", $kalimat);
    return $kata;
}

function rupiah($angka){

    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;

}
function tgl_indo($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = getBulan(substr($tgl,5,2));
    $tahun = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
}
function get_tanggal($tgl){
    $tanggal = substr($tgl,8,2);
    return $tanggal;
}

function bulanIndo($tgl){
    $bulan = getBulan(substr($tgl, 0,2));
    $tahun = substr($tgl, 3, 4);
    return $bulan.' '.$tahun;
}

function hari($tgl){
    $tanggal = $tgl;
    $day = date('D', strtotime($tanggal));
    $dayList = array(
        'Sun' => 'Minggu',
        'Mon' => 'Senin',
        'Tue' => 'Selasa',
        'Wed' => 'Rabu',
        'Thu' => 'Kamis',
        'Fri' => 'Jumat',
        'Sat' => 'Sabtu'
    );
    return $dayList[$day];
}

function getBulan($bln){
    switch ($bln){
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
function convert_date($tgl){
    $tanggal = substr($tgl,0,2);
    $bulan = substr($tgl,3,2);
    $tahun = substr($tgl,6,4);
    return $tahun.'-'.$bulan.'-'.$tanggal;
}



function convert_date_calendar($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = substr($tgl,5,2);
    $tahun = substr($tgl,0,4);
    return $tanggal.'-'.$bulan.'-'.$tahun;
}

function date_chart($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = substr($tgl,5,2)-1;
    $tahun = substr($tgl,0,4);
    return $tahun.','.$bulan.','.$tanggal;
}

function date_chart2($tgl){
    $tanggal = substr($tgl,8,2);
    $bulan = substr($tgl,5,2)-1;
    $tahun = substr($tgl,0,4);
    return $tahun.', '.$bulan;
}

function kelamin($jk){
    if($jk=="Lk"){
        $jKelamin = "Laki-Laki";
    }elseif($jk=="Pr"){
        $jKelamin = "Perempuan";
    }
    return $jKelamin;
}

function getTgl($tgl){
    $tanggal = substr($tgl,8,2);
    return $tanggal;
}

function getBln($tgl){
    $bulan = substr($tgl,5,2);
    return $bulan;
}

function getThn($tgl){
    $tahun = substr($tgl,0,4);
    return $tahun;
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil." Rupiah";
}
?>