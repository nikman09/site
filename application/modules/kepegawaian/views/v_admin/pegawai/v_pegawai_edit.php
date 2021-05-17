<ol class="breadcrumb bc-3">
<li>
<a href="<?php echo base_url() ?>kepegawaian/admin/pegawai">
	<i class="fa fa-users"></i>Pegawai</a>
	</li>
	<li class="active">
		<strong>Edit Data Pegawai</strong>
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
				<div class="panel-body">
				<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>kepegawaian/admin/pegawaiedit?id=<?php if (isset($id_pegawai2)) echo $id_pegawai2; else echo $data['id_pegawai']; ?>"	method="post"  enctype="multipart/form-data" id="form"> 	

<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">

					<?php pesan_get('msg',"Berhasil Mengedit Data Pegawai","Gagal Mengedit Data Pegawai") ?>
					
					<?php if (isset($error)) { pesanvar(0,"","Gagal Mengedit Data Pegawai"); } ?>
					
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
						<input type="text" class="form-control" name="tempat_lahir" value="<?php echo (set_value('tempat_lahir')) ? set_value('tempat_lahir') : $data['tempat_lahir'] ; ?>" 
						/>
					</div>
				</div>
				
				<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal Lahir</label>
						<div class="col-lg-8">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php $tgllhr = (set_value('tanggal_lahir')) ? set_value('tanggal_lahir') :  $data['tanggal_lahir'];  if ($tgllhr=="0000-00-00") echo date('d-m-Y'); else echo tanggal($tgllhr); ?>"
								data-mask="date" data-validate="required" data-message-required="Tanggal tanggal_lahir " name="tanggal_lahir" style="background-color:#fff"  placeholder="dd/mm/yyyy">
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
					<?php  (set_value('jk')) ? $jk = set_value('jk') : $jk = $data['jk'] ; ?>
					<option value=''>.:Pilih Jenis Kelamin:.</option>
					   <option value="Laki-laki" <?php echo ($jk=='Laki-laki'?'selected':'') ?> >Laki-laki</option>
					   <option value="Perempuan" <?php echo ($jk=='Perempuan'?'selected':'') ?> >Perempuan</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Agama</label>
					<div class="col-lg-8">
					<?php  (set_value('agama')) ? $agama = set_value('agama') : $agama = $data['agama'] ; ?>
					<select class="form-control" name="agama">
					<option value='' >.:Pilih Agama:.</option>
					   <option value="Islam" <?php echo ($agama=='Islam'?'selected':'') ?> >Islam</option>
					   <option value="Protestan" <?php echo ($agama=='Protestan'?'selected':'') ?> >Protestan</option>
					   <option value="Khatolik" <?php echo ($agama=='Khatolik'?'selected':'') ?> >Khatolik</option>
					   <option value="Hindu" <?php echo ($agama=='Hindu'?'selected':'') ?> >Hindu</option>
					   <option value="Budha" <?php echo ($agama=='Budha'?'selected':'') ?> >Budha</option>
					   <option value="Konghucu" <?php echo ($agama=='Konghucu'?'selected':'') ?> >Konghucu</option>
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">Status Perkawinan</label>
					<div class="col-lg-8">
					<?php  (set_value('status')) ? $status = set_value('status') : $status = $data['status'] ; ?>
					<select class="form-control" name="status">
						<option value='' >.:Pilih Status:.</option>
						<option value="Belum Kawin" <?php echo ($status=='Belum Kawin'?'selected':'') ?> >Belum Kawin</option>
					    <option value="Kawin" <?php echo ($status=='Kawin'?'selected':'') ?> >Kawin</option>
						<option value="Janda" <?php echo ($status=='Janda'?'selected':'') ?> >Janda</option>
						<option value="Duda" <?php echo ($status=='Duda'?'selected':'') ?> >Duda</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Golongan Darah</label>
					<div class="col-lg-8">
					<?php  (set_value('goldar')) ? $goldar = set_value('goldar') : $goldar = $data['goldar'] ; ?>
					<select class="form-control" name="goldar">
						<option value=''>.:Pilih Golongan Darah:.</option>
						<option value="A" <?php echo ($goldar=='A'?'selected':'') ?> >A</option>
					    <option value="B" <?php echo ($goldar=='B'?'selected':'') ?> >B</option>
						<option value="AB" <?php echo ($goldar=='AB'?'selected':'') ?> >AB</option>
						<option value="O" <?php echo ($goldar=='O'?'selected':'') ?> >O</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Alamat</label>
					<div class="col-lg-8">
						<textarea class="form-control" name="alamat"><?php echo (set_value('alamat')) ? set_value('alamat') : $data['alamat'] ; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Telepon</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nohp" value="<?php echo (set_value('nohp')) ? set_value('nohp') : $data['nohp'] ; ?>" 
						/>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-4 control-label">Alamat Email</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="email" value="<?php echo (set_value('email')) ? set_value('email') : $data['email'] ; ?>" 
						/>
					</div>
				</div>
				
			</div>
			
			<div class="col-md-6">
				
			<div class="form-group">
					<label class="col-lg-4 control-label">Kepegawaian</label>
					<div class="col-lg-8">
					<select class="form-control" name="statuspegawai">
					<?php  (set_value('statuspegawai')) ? $statuspegawai = set_value('statuspegawai') : $statuspegawai = $data['statuspegawai'] ; ?>
						<option value=''>.:Pilih Status Pegawai:.</option>
						<option value="Calon PNS" <?php echo ($statuspegawai=='Calon PNS'?'selected':'') ?> >Calon PNS</option>
					    <option value="PNS" <?php echo ($statuspegawai=='PNS'?'selected':'') ?> >PNS</option>
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
							<option value=""  <?php if (set_value('id_subjabatan')=="") echo "selected" ?>>.:Pilih Keterangan Jabatan:.</option>
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
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php $tmkerja = (set_value('tmkerja')) ? set_value('tmkerja') :  $data['tmkerja'];  if ($tmkerja=="0000-00-00") echo date('d-m-Y'); else echo tanggal($tmkerja); ?>"
								 data-validate="required" data-message-required="Tanggal tmkerja " name="tmkerja" style="background-color:#fff"  placeholder="dd/mm/yyyy" data-mask="date">
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
										<input type="file" name="foto" value="<?php echo (set_value('foto')) ? set_value('foto') : $data['foto'] ; ?>">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							<?php 
					if(form_error('nip')) {
						echo '<label style="color:red;font-size:10px">Upload ulang foto, Jika gagal saat menyimpan</label>';
						} ;
					?>
					<?php 
					if (isset($fotoerror))  {
						echo '<label style="color:red;font-size:10px">Maksimal ukuran gambar 2 MB </label>';
						} ;
					?>
					<label style="font-size:10px">&nbsp Max 2MB</label>
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
	<!-- <a href="<?php echo base_url('kepegawaian/admin/pegawailihat?id='.$data['id_pegawai'].'') ?>" class="btn btn-default btn-s-xs"> -->
	<a href="<?php echo base_url('kepegawaian/admin/pegawai') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-close"></i> Kembali</a>

		
</footer>
</form>
				</div>
			