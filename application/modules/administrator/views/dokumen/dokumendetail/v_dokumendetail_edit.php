<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Dokumen</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/dokumendetaileditproses" method="post" enctype="multipart/form-data" id="form2">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <input type="hidden" name="id_dokumen" id="id_dokumen" value="<?php echo $data['id_dokumen'] ?>">
                            <input type="hidden" name="id_dokumendetail" id="id_dokumendetail" value="<?php echo $data['id_dokumendetail'] ?>"> 
                            <div class="form-group">
                                <label for="field-1" class="control-label">Judul Dokumen</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Dokumen" value="<?php echo $data['judul'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Dokumen" value="<?php echo $data['keterangan'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">File</label>
                                <div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo set_value('foto') ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="dokumen"   id="image-source"  onchange="previewImage();">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
                            </div>
                        </div>

                      
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>