<?php
if($status=="sukses") {
    ?>
    <div id="myModal" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">EDIT <?php echo strtoupper($aksi); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $aksi; ?> Berhasil disimpan.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            onclick="window.location.href='<?php echo base_url(); ?>tu/<?php echo $target_kembali; ?>'">
                        OK
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
                    <h4 class="modal-title" id="myModalLabel2">EDIT <?php echo strtoupper($aksi); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $aksi; ?> Gagal Diubah. max file size adalah 1MB. </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"
                            onclick="window.location.href='<?php echo base_url(); ?>tu/<?php echo $target_edit; ?>'">
                        OK
                    </button>
                </div>

            </div>
        </div>
    </div>
<?php
}
?>