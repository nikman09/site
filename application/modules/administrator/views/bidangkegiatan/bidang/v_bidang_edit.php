<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Kategori</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/beritakategorieditproses" method="post" enctype="multipart/form-data" id="form2">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <input type="hidden" name="id_beritakategori" id="id_beritakategori" value="<?php echo $data['id_beritakategori'] ?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Kategori</label>
                                <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Kategori Berita" value="<?php echo $data['kategori'] ?>">
                            </div>

                        </div>

                      
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>