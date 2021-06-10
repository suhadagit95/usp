<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
	<div class="row heading-bg">
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							<h5 class="txt-dark">Data Pemanfaat</h5>
						</div>
						<!-- Breadcrumb -->
						<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							<ol class="breadcrumb">
								<li><a href="index.html">Home</a></li>
								
								<li class="active"><span>Data Pemanfaat</span></li>
							</ol>
						</div>
						<!-- /Breadcrumb -->
					</div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default card-view">
                <div class="x_title">
                    <h2>Data Pemanfaat</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
				<table id="datable_1" class="table table-hover display  pb-30" >
                   
                        <thead>
                        <tr>
                            <th >NO</th>
                            <th >Nama</th>
                            <th >Alamat</th>
                            <th >Pekerjaan</th>
                            <th >Status</th>
                            <th >Tool</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                                $no=1;
                        foreach($hasil->result() as $r){
                        ?>
                        <tr>
                            <td ><?php echo $no++;?></td>
                            <td ><?php echo $r->nama_pemanfaat;?></td>
                            <td ><?php echo $r->alamat_pemanfaat;?></td>
                            <td ><?php echo $r->pekerjaan_pemanfaat;?></td>
                            <td ><?php echo $r->status_pemanfaat;?></td>
                            <td >
							    <span title="Lihat Profil" data-toggle="tooltip" data-placement="top">
								
                                    <button class="btn btn-xs btn-info" data-toggle='modal' data-target='#data_pemanfaat' data-id="<?php echo hilang_karakter(base64_encode($r->id_pemanfaat));?>"><span class="fa fa-calendar"></span> </button>
                                
								</span>
                                <button class="btn btn-xs btn-success"  title="Pinjaman" data-toggle="tooltip" data-placement="top" onclick="window.location.href='<?php echo base_url();?>ketua/pinjaman/<?php echo hilang_karakter(base64_encode($r->id_pemanfaat));?>'">
                                    <span class="fa fa-bars"></span>
                                </button>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
						<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
											<div class="modal-dialog" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h5 class="modal-title" id="exampleModalLabel1">New message</h5>
													</div>
													<div class="modal-body">
														<form>
															<div class="form-group">
																<label for="recipient-name" class="control-label mb-10">Recipient:</label>
																<input type="text" class="form-control" id="recipient-name1">
															</div>
															<div class="form-group">
																<label for="message-text" class="control-label mb-10">Message:</label>
																<textarea class="form-control" id="message-text1"></textarea>
															</div>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
														<button type="button" class="btn btn-primary">Send message</button>
													</div>
												</div>
											</div>
										</div>
	
    <br />
    

    <div id="data_pemanfaat" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
        <div class="modal-dialog modal-md">
            <div class="modal-content">


            </div>
        </div>
    </div>


</div>

<script>

    $(document).ready(function() {
        $('#data_pemanfaat').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : '<?php echo base_url();?>ketua/profil_pemanfaat',
                data :  'id='+ rowid,
                success : function(data){
                    $('.modal-content').html(data);//menampilkan data ke dalam modal
                }
            });
        });
        $('[data-toggle="tooltip"]').tooltip();
        $('#konfirmasi_hapus').on('show.bs.modal', function(e) {
            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
        });
    });
</script>