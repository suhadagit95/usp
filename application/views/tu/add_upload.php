
<div class="right_col" role="main">
    <!-- top tiles -->

    <!-- /top tiles -->
    <?php

    ?>
    <div class="row">
	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<div class="panel panel-inverse card-view">
				
							<div class="panel-heading">
									<div class="pull-left">
										<center><h4 class="panel-title txt-dark">Panduan Upload File</h4></center>
									
									</div>
									
									<div class="clearfix"></div>
								</div>
                             <div class="table-responsive ">
								<div class="panel-wrapper collapse in">
									<div  class="panel-body row pa-0">
										<div class="table-wrap mt-40">
											<div class="table-responsive">
							 
								
								

									
											
										<table  class="table  mb-2"style="font-size:12px">
										
						<tr>
                            <td style="width: 2%%; height: 30px;">1.</td>
                            <td style="width: 98%;">Scan file yang dibutuhkan kedalam bentuk format gambar atau dokumen</td>                          
                        </tr>
						<tr>
                            <td style="width: 2%%; height: 30px;">2.</td>
                            <td style="width: 98%;">File yang discan harus terang dan jelas</td>                          
                        </tr>
						<tr>
                            <td style="width: 2%%; height: 30px;">3.</td>
                            <td style="width: 98%;">File yang di bolehkan adalah file bertipe gambar jpg/jpeg/png atau dokumen pdf</td>                          
                        </tr>
						<tr>
                            <td style="width: 2%%; height: 30px;">4.</td>
                            <td style="width: 98%;">Maksimal size yang dibolehkan adalah 1MB</td>                          
                        </tr>
						<tr>
						<td></td>
						<td></td>
						</tr>
						
                      
						
						
										</table>
										</div>
										</div>
										</div>
										</div>
										
									
									</div>
				
			</div>
		</div>
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="panel panel-inverse card-view">
			
			<div class="panel-heading">
									<div class="pull-left">
										<center><h4 class="panel-title txt-dark"><?php echo strtoupper($aksi);?> </h4></center>
									
									</div>
									
									<div class="clearfix"></div>
								</div>
                
                <div class="x_content panel-body">
                    <form id="demo-form2" method="post" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                        <?php
                        if($kolom=="rencana_usaha"){
                            ?>
						
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="input-group input-file" name="fileFoto">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-choose" type="button">Pilih</button>
                                    </span>
                                    <input type="text" class="form-control" placeholder='Pilih File...' />
                                    <span class="input-group-btn">
                                         <button class="btn btn-warning btn-reset" type="button">Bersihkan</button>
                                    </span>
                                </div>
                                    </div>
                            </div>
                            <?php
                        }else {
                            ?>
							
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">File</label>

                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img
                                                src="<?php echo base_url(); ?>assets/images/demoUpload.jpg" alt=""/>
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail"
                                             style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                        <span class="btn btn-file btn-primary">
                                            <span class="fileupload-new">Select image</span>
                                            <span class="fileupload-exists">Change</span>
                                            <input type="file" name="fileFoto" id="fileFoto"
                                                   onchange="ValidateSingleInput(this);" required/>
                                        </span>
                                            <a href="#" class="btn btn-danger fileupload-exists"
                                               data-dismiss="fileupload">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url();?>tu/<?php echo $kembali;?>'">Batal</button>
                                <button type="submit" name="btnSimpan" class="btn btn-success">Simpan</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
			
        </div>

    </div>
    <br />
    <?php
    if($kolom=="rencana_usaha") {
        ?>
        <script>
            function bs_input_file() {
                $(".input-file").before(
                    function () {
                        if (!$(this).prev().hasClass('input-ghost')) {
                            var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
                            element.attr("name", $(this).attr("name"));
                            element.change(function () {
                                element.next(element).find('input').val((element.val()).split('\\').pop());
                            });
                            $(this).find("button.btn-choose").click(function () {
                                element.click();
                            });
                            $(this).find("button.btn-reset").click(function () {
                                element.val(null);
                                $(this).parents(".input-file").find('input').val('');
                            });
                            $(this).find('input').css("cursor", "pointer");
                            $(this).find('input').mousedown(function () {
                                $(this).parents('.input-file').prev().click();
                                return false;
                            });
                            return element;
                        }
                    }
                );
            }
            $(function () {
                bs_input_file();
            });

        </script>
    <?php
    }
    ?>

</div>

