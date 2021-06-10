<?php
if($nilai>0) {
    ?>
    <div id="myModal" class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel2">TAMBAH <?php echo strtoupper($aksi); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $nilai;?> angsuran berhasil disimpan/p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            onclick="window.location.href='<?php echo base_url(); ?>tu/<?php echo $target_kembali; ?>'">
                        Tidak
                    </button>
                </div>

            </div>
        </div>
    </div>
<?php
}
?>