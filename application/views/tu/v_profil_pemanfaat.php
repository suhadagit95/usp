
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
</style>
<?php

foreach($hasil->result() as $r);
?>
<div class="modal-header">
    <h4 class="modal-title" id="myModalLabel2">PROFIL PEMANFAAT</h4>
</div>
<div class="modal-body">
    <div>
        <table class="blueTable">
            <tbody>
                <tr class="row100 body">
                    <td style="width:30%;">ID</td>
                    <td style="width:5%;">:</td>
                    <td style="width:50%;"><?php echo $r->id_pemanfaat;?></td>
                    <td rowspan="6" style="width:20%; vertical-align: top;">
                        <img src="../images/pemanfaat/<?php echo $r->foto_pemanfaat;?>" class="foto_user">

                    </td>
                </tr>
                <tr >
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo $r->nama_pemanfaat;?></td>
                </tr>
                <tr>
                    <td>Tempat / Tanggal Lahir</td>
                    <td>:</td>
                    <td><?php echo $r->tempat_lahir_pemanfaat." / ".tgl_indo($r->tgl_lahir_pemanfaat);?></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>:</td>
                    <td><?php echo $r->status_pemanfaat;?></td>
                </tr>
                <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td><?php echo $r->agama;?></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td>
                    <td>:</td>
                    <td><?php echo $r->pekerjaan_pemanfaat;?></td>
                </tr>
				<tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td><?php echo $r->jenis_kelamin;?></td>
                </tr>
				<tr>
                    <td>No HP</td>
                    <td>:</td>
                    <td><?php echo $r->no_hp;?></td>
                </tr>
				<tr>
                    <td>Tanggal Daftar</td>
                    <td>:</td>
                    <td><?php echo tgl_indo($r->tgl_daftar);?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-info" data-dismiss="modal">
        Tutup
    </button>
    <a class="btn btn-warning btn-ok" href="<?php echo base_url();?>tu/edit_pemanfaat/<?php echo hilang_karakter(base64_encode($r->id_pemanfaat));?>">Edit</a>
</div>