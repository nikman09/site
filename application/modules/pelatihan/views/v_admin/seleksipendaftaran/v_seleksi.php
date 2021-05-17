<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title">Edit Seleksi</h4>
</div>
<form role="form" class="validate" action="<?php echo base_url() ?>pelatihan/admin/seleksiedit" method="post" enctype="multipart/form-data" id="form2">
    <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
                <input type="hidden" name="id_pelatihandaftar" id="id_pelatihandaftar" value="<?php echo $data['id_pelatihandaftar'] ?>">
                <div class="form-group">
                    <label for="field-1" class="control-label">Pilih Hasl Seleksi</label>
                    <select  class="form-control" id="status" name="status" >
                        <option value="Menunggu Hasil Seleksi" <?= ($data['status']=="Menunggu Hasil Seleksi"?"selected":"") ?>>Menunggu Hasil Seleksi</option>
                        <option value="Lulus Seleksi" <?= ($data['status']=="Lulus Seleksi"?"selected":"") ?>>Lulus Seleksi</option>
                        <option value="Tidak Lulus Seleksi" <?= ($data['status']=="Tidak Lulus Seleksi"?"selected":"") ?>>Tidak Lulus Seleksi</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="field-1" class="control-label">Keterangan (Jika Tidak Lulus Seleksi)</label>
                    <textarea  class="form-control" id="keterangan" name="keterangan" ></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>