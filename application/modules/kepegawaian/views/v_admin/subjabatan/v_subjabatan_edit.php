<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Rincian Jabatan</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/admin/rincianeditproses" method="post"id="form">
                <div class="modal-body">
                    <div class="row">
					<div class="col-md-12">
					    <input type="hidden" name="id_subjabatan" id="id_subjabatan" value="<?php echo $data['id_subjabatan'] ?>">
					
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<div class="form-group">
								<label for="field-1" class="control-label">Rincian Jabatan</label>
								<input type="text" class="form-control" id="nama_subjabatan" name="nama_subjabatan" placeholder="Jabatan" value="<?php echo $data['nama_subjabatan']; ?>"/>
							</div>	
							
							
						</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>