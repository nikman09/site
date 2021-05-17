<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Dokumen</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/dokumeneditproses" method="post" enctype="multipart/form-data" id="form2">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <input type="hidden" name="id_dokumen" id="id_dokumen" value="<?php echo $data['id_dokumen'] ?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Judul Dokumen</label>
                                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Dokumen" value="<?php echo $data['judul'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Dokumen" value="<?php echo $data['keterangan'] ?>">
                            </div>
                        </div>

                      
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>