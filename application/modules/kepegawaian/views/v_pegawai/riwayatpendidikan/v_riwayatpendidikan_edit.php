<div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Riwayat Pendidikan</h4>
            </div>
            <form role="form" class="validate" action="<?php echo base_url() ?>kepegawaian/riwayatpendidikaneditproses" method="post" enctype="multipart/form-data" id="form">
                <div class="modal-body">
                    <div class="row">
					<div class="col-md-12">
					<input type="hidden" name="id_riwayatpendidikan" id="id_riwayatpendidikan" value="<?php echo $data['id_riwayatpendidikan'] ?>">
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<div class="form-group">
								<label for="field-1" class="control-label">Jenjang</label>
								
								<select class="form-control" name="id_pendidikan" id="id_pendidikan">
									<option value="">.:Pilih Jenjang Pendidikan:.</option>
								<?php
										foreach($pendidikan->result_array() as $row) {
											
											echo "<option value='".$row['id_pendidikan']."' ";
											if ($data['id_pendidikan']==$row['id_pendidikan']) echo  "selected";
											
											echo ">".$row['pendidikan']."</option>";
										}
									?>
									</select>
							</div>	

							<div class="form-group">
								<label for="field-1" class="control-label">Nama Sekolag/Perguruan Tinggi</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Sekolah/Perguruan Tinggi"  value="<?php echo $data['nama']; ?>">
							</div>	
							<div class="form-group">
								<label for="field-1" class="control-label">Tahun Lulus</label>
								<input type="text" class="form-control" id="tahunlulus" name="tahunlulus" placeholder="Tahun Lulus" value="<?php echo $data['tahunlulus']; ?>">
							</div>	
							<div class="form-group">
						<label class="col-sm-4 control-label">File</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="berkas">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							</div>
						</div>	 
						</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-info">Simpan</button>
                </div>
            </form>