
<style>
    table.blueTable {
        width: 100%;
        text-align: left;
    }
    table.blueTable td, table.blueTable th {
        padding: 10px 2px;
    }
    table.blueTable tbody td {
        font-size: 14px;
    }
    table.blueTable tfoot td {
        font-size: 14px;
    }
    table.blueTable tfoot .links {
        text-align: right;
    }
    table.blueTable tfoot .links a{
        display: inline-block;
        background: #1C6EA4;
        color: #FFFFFF;
        padding: 2px 8px;
        border-radius: 5px;
    }
    .foto_user {
        border: 1px solid #ddd; /* Gray border */
        padding: 5px; /* Some padding */
        width: 150px; /* Set a small width */
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        border-radius: 10%;
        width: 118px;
        height: 157px;
    }
    .foto_agunan {
        border: 1px solid #ddd; /* Gray border */
        padding: 5px; /* Some padding */
        width: 150px; /* Set a small width */
        box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
        width: 250px;
        height: 200px;
    }
</style>
<?php
//include "assets/fungsi_tanggal.php";
foreach($ambil_pinjaman->result() as $r);
?>
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel2">DATA PINJAMAN</h4>
</div>
<div class="modal-body">
    <div>
        <table class="blueTable">
            <tbody>
                <tr>
                    <td colspan="5" align="center"><strong><h3>PROFIL PEMANFAAT</h3></strong></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $r->nama_pemanfaat;?></td>
                    <td>&nbsp;</td>
                    <td rowspan="9" valign="top" align="center">
                        <img src="../../images/pemanfaat/<?php echo $r->foto_pemanfaat;?>" class="foto_user">
                    </td>
                </tr>
                <tr>
                    <td>Tempat / Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo $r->tempat_lahir_pemanfaat." / ".tgl_indo($r->tgl_lahir_pemanfaat);?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $r->alamat_pemanfaat;?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo $r->status_pemanfaat;?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?php echo $r->agama;?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $r->pekerjaan_pemanfaat;?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Besar Pinjaman</td>
                    <td>:</td>
                    <td><?php echo rupiah($r->jumlah_pinjaman);?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Jangka Waktu Pinjaman</td>
                    <td>:</td>
                    <td><?php echo $r->jangka_waktu;?> Bulan</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Jumlah Jasa</td>
                    <td>:</td>
                    <td><?php echo rupiah($r->jumlah_jasa);?></td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td colspan="5" align="center"><strong><h3>DATA AGUNAN</h3></strong></td>
                </tr>
                <tr>
                    <td>Jenis Agunan</td>
                    <td>:</td>
                    <td><?php echo $r->jenis_agunan;?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Nomor Surat Agunan</td>
                    <td>:</td>
                    <td><?php echo $r->no_surat_agunan;?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Nama Pemilik Agunan</td>
                    <td>:</td>
                    <td><?php echo $r->nama_pemilik;?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Tempat / Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo $r->tempat_lahir_pemilik." / ".tgl_indo($r->tanggal_lahir_pemilik);?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $r->pekerjaan_pemilik;?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo $r->alamat_pemilik;?></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>

            </tbody>
        </table>
        <br>
        <table class="blueTable">
            <tbody>
                <tr>
                    <td align="center" width="30%">Surat Agunan</td>
                    <td align="center" width="30%">Peta Agunan</td>
                    <td align="center" width="30%">Agunan</td>
                </tr>
                <tr>
                    <td align="center" width="30%">
                        <img src="../../images/surat agunan/<?php echo $r->foto_surat_agunan;?>" class="foto_agunan">
                    </td>
                    <td align="center" width="30%">
                        <img src="../../images/peta agunan/<?php echo $r->peta_lokasi_agunan;?>" class="foto_agunan">
                    </td>
                    <td align="center" width="30%">
                        <img src="../../images/agunan/<?php echo $r->foto_agunan;?>" class="foto_agunan">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-info" data-dismiss="modal">
        Tutup
    </button>

</div>