<?php
if($status=="sukses") {
    ?>
    <div id="myModal" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">TAMBAH <?php echo strtoupper($aksi); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $aksi; ?> Berhasil Di tambah.</p>
                    <p>Apakah ingin menambah <?php echo $aksi; ?> lagi?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            onclick="window.location.href='<?php echo base_url(); ?>tu/<?php echo $target_kembali; ?>'">
                        Tidak
                    </button>
                    <button type="button" class="btn btn-primary"
                            onclick="window.location.href='<?php echo base_url(); ?>tu/<?php echo $target_tambah; ?>'">
                        Tambah Data
                    </button>
                </div>

            </div>
        </div>
    </div>
<?php
}elseif($status=="error") {
    ?>
    <div id="myModal" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">TAMBAH <?php echo strtoupper($aksi); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $aksi; ?> Gagal Ditambah.</p>
                    <p>Mohon ulangi proses input data.</p>
					 <p>Max 1MB dan file harus bertipe jpg/jpeg/png/gif.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                            onclick="window.location.href='<?php echo base_url(); ?>tu/<?php echo $target_tambah; ?>'">
                        Tambah Data
                    </button>
                </div>

            </div>
        </div>
    </div>
<?php
}
?>