<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Jadwal</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>administrator/jadwaleditproses" method="post" enctype="multipart/form-data" id="form2">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                            <input type="hidden" name="id_jadwal" id="id_jadwal" value="<?php echo $data['id_jadwal'] ?>">
                            <div class="form-group">
                                <label for="field-1" class="control-label">Nama Jadwal</label>
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Judul Jadwal" value="<?php echo $data['nama'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="field-1" class="control-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan Jadwal" value="<?php echo $data['keterangan'] ?>">
                            </div>
                        </div>

                      
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>