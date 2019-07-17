<ol class="breadcrumb bc-3">
<li>
	<a href="<?php echo base_url() ?>kepegawaian">
		<i class="fa fa-list"></i>Kepegawaian</a>
</li>
<li class="active">
	<strong>Edit Pegawai</strong>
</li>
</ol>

<h3>Edit Biodata</h3>
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
	<div class="panel-title">
		Update
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>
<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>kepegawaian/admin/pegawaiedit?id=<?php if (isset($id_pegawai2)) echo $id_pegawai2; else echo $data['id_pegawai']; ?>"	method="post"  enctype="multipart/form-data" id="form"> 	

<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="panel-body">
					<?php pesan_get('msg',"Berhasil Mengedit Data Pegawai","Gagal Mengedit Data Pegawai") ?>
						<div class="row">
							<div class="col-md-6">
							<input type="hidden" class="form-control" name="id_pegawai" data-required="true" value="<?php echo $data['id_pegawai']; ?>" />
			
				<div class="form-group">
					<label class="col-lg-4 control-label">NIP</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nip" id="nip" value="<?php echo (set_value('nip')) ? set_value('nip') : $data['nip'] ; ?>" 	/>
						<input type="hidden" class="form-control" name="nip2" id="nip2" value="<?php echo $data['nip']?>"
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('nip'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Nama</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nama" value="<?php echo (set_value('nama')) ? set_value('nama') : $data['nama'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Tempat Lahir</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" 
						/>
					</div>
				</div>
				
				<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal Lahir</label>
						<div class="col-lg-8">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php  if ($data['tanggal_lahir']=="0000-00-00") echo date('d-m-Y'); else echo tanggal($data['tanggal_lahir']); ?>"
								readonly data-validate="required" data-message-required="Tanggal tanggal_lahir " name="tanggal_lahir" style="background-color:#fff"  placeholder="dd/mm/yyyy">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>

						</div>
					</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Kelamin</label>
					<div class="col-lg-8">
					<select class="form-control" name="jk">
					<option value='' disabled>.:Pilih Jenis Kelamin:.</option>
					   <option value="Laki-laki" <?php echo ($data['jk']=='Laki-laki'?'selected':'') ?> >Laki-laki</option>
					   <option value="Perempuan" <?php echo ($data['jk']=='Perempuan'?'selected':'') ?> >Perempuan</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Agama</label>
					<div class="col-lg-8">
					<select class="form-control" name="agama">
					<option value='' disabled>.:Pilih Agama:.</option>
					   <option value="Islam" <?php echo ($data['agama']=='Islam'?'selected':'') ?> >Islam</option>
					   <option value="Protestan" <?php echo ($data['agama']=='Protestan'?'selected':'') ?> >Protestan</option>
					   <option value="Khatolik" <?php echo ($data['agama']=='Khatolik'?'selected':'') ?> >Khatolik</option>
					   <option value="Hindu" <?php echo ($data['agama']=='Hindu'?'selected':'') ?> >Hindu</option>
					   <option value="Budha" <?php echo ($data['agama']=='Budha'?'selected':'') ?> >Budha</option>
					   <option value="Konghucu" <?php echo ($data['agama']=='Konghucu'?'selected':'') ?> >Konghucu</option>
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">Status Perkawinan</label>
					<div class="col-lg-8">
					<select class="form-control" name="status">
						<option value='' disabled>.:Pilih Status:.</option>
						<option value="Belum Kawin" <?php echo ($data['status']=='Belum Kawin'?'selected':'') ?> >Belum Kawin</option>
					    <option value="Kawin" <?php echo ($data['status']=='Kawin'?'selected':'') ?> >Kawin</option>
						<option value="Janda" <?php echo ($data['status']=='Janda'?'selected':'') ?> >Janda</option>
						<option value="Duda" <?php echo ($data['status']=='Duda'?'selected':'') ?> >Duda</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Golongan Darah</label>
					<div class="col-lg-8">
					<select class="form-control" name="goldar">
						<option value='' disabled>.:Pilih Golongan Darah:.</option>
						<option value="A" <?php echo ($data['status']=='A'?'selected':'') ?> >A</option>
					    <option value="B" <?php echo ($data['status']=='B'?'selected':'') ?> >B</option>
						<option value="AB" <?php echo ($data['status']=='AB'?'selected':'') ?> >AB</option>
						<option value="O" <?php echo ($data['status']=='O'?'selected':'') ?> >O</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Alamat</label>
					<div class="col-lg-8">
						<textarea class="form-control" name="alamat"><?php echo $data['alamat']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Telepon</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nohp" value="<?php echo $data['nohp']; ?>" 
						/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-4 control-label">Alamat Email</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" 
						/>
					</div>
				</div>
				
			</div>
			
			<div class="col-md-6">
				
			<div class="form-group">
					<label class="col-lg-4 control-label">Kepegawaian</label>
					<div class="col-lg-8">
					<select class="form-control" name="statuspegawai">
						<option value='' disabled>.:Pilih Status Pegawai:.</option>
						<option value="Calon PNS" <?php echo ($data['statuspegawai']=='Calon PNS'?'selected':'') ?> >Calon PNS</option>
					    <option value="PNS" <?php echo ($data['statuspegawai']=='PNS'?'selected':'') ?> >PNS</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">jabatan</label>
					<div class="col-lg-8">
						<select class="form-control" name="id_jabatan" id="id_jabatan" >
						<option value="">.:Pilih Jabatan:.</option>
						<?php  (set_value('id_jabatan')) ? $id_jabatan = set_value('id_jabatan') : $id_jabatan = $data['id_jabatan'] ; ?>
						<?php
							foreach($jabatan->result_array() as $row) {
								
								 echo "<option value='".$row['id_jabatan']."' ";
								 if ($id_jabatan==$row['id_jabatan']) echo  "selected";
								 
								 echo ">".$row['nama_jabatan']."</option>";
							}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label"></label>
					<div class="col-lg-8">
						<select class="form-control" name="id_subjabatan" id="id_subjabatan" <?php if ($datasubjabatan->num_rows()==0) echo "hidden" ?> >
							<option value="" disabled <?php if (set_value('id_subjabatan')=="") echo "selected" ?>>.:Pilih Keterangan Jabatan:.</option>
						<?php  (set_value('id_subjabatan')) ? $id_subjabatan = set_value('id_subjabatan') : $id_subjabatan = $data['id_subjabatan'] ; ?>
						<?php
								foreach($datasubjabatan->result_array() as $row) {
								echo "<option value='".$row['id_subjabatan']."' ".($id_subjabatan==$row['id_subjabatan']?"selected":"").">".$row['nama_subjabatan']."</option>";
								}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Pangkat</label>
					<div class="col-lg-8">
						<select class="form-control" name="id_pangkat" id="id_pangkat">
						<option value="">.:Pilih Pangkat:.</option>
						<?php  (set_value('id_pangkat')) ? $id_pangkat = set_value('id_pangkat') : $id_pangkat = $data['id_pangkat'] ; ?>
						<?php
							foreach($pangkat->result_array() as $row) {
								
								 echo "<option value='".$row['id_pangkat']."' ";
								 if ($id_pangkat==$row['id_pangkat']) echo  "selected";
								 
								 echo ">".$row['pangkat']."</option>";
							}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Pendidikan Terakhir</label>
					<div class="col-lg-8">
						<select class="form-control" name="id_pendidikan" id="id_pendidikan">
						<option value="">.:Pilih Pendidikan Terakhir:.</option>
						<?php  (set_value('id_pendidikan')) ? $id_pendidikan = set_value('id_pendidikan') : $id_pendidikan = $data['id_pendidikan'] ; ?>
						<?php
							foreach($pendidikan->result_array() as $row) {
								
								 echo "<option value='".$row['id_pendidikan']."' ";
								 if ($id_pendidikan==$row['id_pendidikan']) echo  "selected";
								 
								 echo ">".$row['pendidikan']."</option>";
							}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal Mulai Kerja</label>
						<div class="col-lg-8">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php  if ($data['tmkerja']=="0000-00-00") echo date('d-m-Y'); else echo tanggal($data['tmkerja']); ?>"
								readonly data-validate="required" data-message-required="Tanggal tmkerja " name="tmkerja" style="background-color:#fff"  placeholder="dd/mm/yyyy">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>

						</div>
					</div>

				<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo (set_value('foto')) ? set_value('foto') : $data['foto'] ; ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="foto">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							<?php 
					if(form_error('nip')) {
						echo '<label style="color:red;font-size:10px">Upload ulang foto, Jika gagal saat menyimpan</label>';
						} 
					?>
					</div>
				</div>
			</div>
		</div>
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<button type="reset"  class="btn btn-danger btn-s-xs">
		<i class="fa fa-refresh"></i> Reset</a>
		</button>
		&nbsp
	<a href="<?php echo base_url('kepegawaian/admin/pegawailihat?id='.$data['id_pegawai'].'') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-close"></i> Keluar</a>

		
</footer>
</form>
				</div>
			