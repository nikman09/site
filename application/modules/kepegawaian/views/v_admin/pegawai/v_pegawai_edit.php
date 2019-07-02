<ol class="breadcrumb bc-3">
<li>
	<a href="<?php echo base_url() ?>kepegawaian">
		<i class="fa fa-list"></i>Kepegawaian</a>
</li>
<li class="active">
	<strong>Edit Pegawai</strong>
</li>
</ol>

<h3>Edit Pegawai</h3>
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
					<label class="col-lg-4 control-label">Gelar Depan</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="gelardepan" value="<?php echo (set_value('gelardepan')) ? set_value('gelardepan') : $data['gelardepan'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Gelar Belakang</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="gelarbelakang" value="<?php echo (set_value('gelarbelakang')) ? set_value('gelarbelakang') : $data['gelarbelakang'] ; ?>" 
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
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo tanggal((set_value('tanggal_lahir')) ? set_value('tanggal_lahir') : $data['tanggal_lahir'] ); ?>"
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
					<?php  (set_value('jk')) ? $jk = set_value('jk') : $jk = $data['jk'] ; ?>
					   <option value="Laki-laki" <?php echo ($jk=='Laki-laki'?'selected':'') ?> >Laki-laki</option>
					   <option value="Perempuan" <?php echo ($jk=='Perempuan'?'selected':'') ?> >Perempuan</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Agama</label>
					<div class="col-lg-8">
					<select class="form-control" name="agama">
					<option value='' disabled>.:Pilih Agama:.</option>
					<?php  (set_value('agama')) ? $agama = set_value('agama') : $agama = $data['agama'] ; ?>
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
					<select class="form-control" name="status">
						<option value='' disabled>.:Pilih Status:.</option>
						<?php  (set_value('status')) ? $status = set_value('status') : $status = $data['status'] ; ?>
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
					<select class="form-control" name="goldar">
						<option value='' disabled>.:Pilih Golongan Darah:.</option>
						<?php  (set_value('goldar')) ? $goldar = set_value('goldar') : $goldar = $data['goldar'] ; ?>
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
					<label class="col-lg-4 control-label">Kodepos</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="kodepos" value="<?php echo (set_value('kodepos')) ? set_value('kodepos') : $data['kodepos'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Email</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="email" value="<?php echo (set_value('email')) ? set_value('email') : $data['email'] ; ?>" 
						/>
					</div>
				</div>
			
				
			</div>
			
			<div class="col-md-6">
				
			<div class="form-group">
					<label class="col-lg-4 control-label">Status Kepegawaian</label>
					<div class="col-lg-8">
					<select class="form-control" name="statuspegawai">
						<option value='' disabled>.:Pilih Status Pegawai:.</option>
						<?php  (set_value('statuspegawai')) ? $statuspegawai = set_value('statuspegawai') : $statuspegawai = $data['statuspegawai'] ; ?>
						<option value="Calon PNS" <?php echo ( $statuspegawai =='Calon PNS'?'selected':'') ?> >Calon PNS</option>
					    <option value="PNS" <?php echo ($statuspegawai=='PNS'?'selected':'') ?> >PNS</option>
						<option value="Pensiunan" <?php echo ($statuspegawai=='Pensiunan'?'selected':'') ?> >Pensiunan</option>
						<option value="ABRI" <?php echo ($statuspegawai=='ABRI'?'selected':'') ?> >ABRI</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Kepegawaian</label>
					<div class="col-lg-8">
					<select class="form-control" name="jenis">
						<option value='' disabled>.:Pilih Jenis Pegawai:.</option>
						<?php  (set_value('jenis')) ? $jenis = set_value('jenis') : $jenis = $data['jenis'] ; ?>
						<option value="PNS Pusat DEPDAGRI" <?php echo ($jenis=='PNS Pusat DEPDAGRI'?'selected':'') ?> >PNS Pusat DEPDAGRI</option>
					    <option value="PNS Pusat DEPDAGRI DPK" <?php echo ($jenis=='PNS Pusat DEPDAGRI DPK'?'selected':'') ?> >PNS Pusat DEPDAGRI DPK</option>
					    <option value="PNS Pusat DEPDAGRI DPB" <?php echo ($jenis=='PNS Pusat DEPDAGRI DPB'?'selected':'') ?> >PNS Pusat DEPDAGRI DPB</option>
					    <option value="PNS Daerah Otonom" <?php echo ($jenis=='PNS Daerah Otonom'?'selected':'') ?> >PNS Daerah Otonom</option>
					    <option value="PNS Pusat DEP.LAN DPK" <?php echo ($jenis=='PNS Pusat DEP.LAN DPK'?'selected':'') ?> >PNS Pusat DEP.LAN DPK</option>
					    <option value="PNS Pusat DEP.LAN DPB" <?php echo ($jenis=='PNS Pusat DEP.LAN DPB'?'selected':'') ?> >PNS Pusat DEP.LAN DPB</option>
					    <option value="ABRI yang ditugaskan Karyakan" <?php echo ($jenis=='ABRI yang ditugaskan Karyakan'?'selected':'') ?> >ABRI yang ditugaskan Karyakan</option>
					    
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Jabatan</label>
					<div class="col-lg-8">
					<select class="form-control" name="jabatan">
						<option value='' disabled>.:Pilih Jenis Jabatan:.</option>
						<?php  (set_value('jabatan')) ? $jabatan = set_value('jabatan') : $jabatan = $data['jabatan'] ; ?>
						<option value="Struktural" <?php echo ($abatan='Struktural'?'selected':'') ?> >Struktural</option>
					    <option value="PNS Pusat DEPDAGRI DPK" <?php echo ($jabatan=='Fungsional'?'selected':'') ?> >Fungsional</option>
					    <option value="Pejabat Negara" <?php echo ($jabatan=='Pejabat Negara'?'selected':'') ?> >Pejabat Negara</option>
					    <option value="Nonstruktural" <?php echo ($jabatan=='Nonstruktural'?'selected':'') ?> >Nonstruktural</option>
					    <option value="KORPRI" <?php echo ($jabatan=='KORPRI'?'selected':'') ?> >KORPRI</option>
					  
					    
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">Kedudukan Pegawai</label>
					<div class="col-lg-8">
					<select class="form-control" name="kedudukan">
						<option value='' disabled>.:Pilih Kedudukan Pegawai:.</option>
						<?php  (set_value('kedudukan')) ? $kedudukan = set_value('kedudukan') : $kedudukan = $data['kedudukan'] ; ?>
						<option value="Aktif" <?php echo ($kedudukan=='Aktif'?'selected':'') ?> >Aktif</option>
						<option value="CLTN" <?php echo ($kedudukan=='CLTN'?'selected':'') ?> >Aktif</option>
						<option value="Perpanjangan CLTN" <?php echo ($kedudukan=='Perpanjangan CLTN'?'selected':'') ?> >Perpanjangan CLTN</option>
						<option value="Tugas Belajar" <?php echo ($kedudukan=='Tugas Belajar'?'selected':'') ?> >Tugas Belajar</option>
						<option value="Pemberhentian Sementara" <?php echo ($kedudukan=='Pemberhentian Sementara'?'selected':'') ?> >Pemberhentian Sementara</option>
						<option value="Penerima Uang Tunggu" <?php echo ($kedudukan=='Penerima Uang Tunggu'?'selected':'') ?> >Penerima Uang Tunggu</option>
						<option value="Wajib Militer" <?php echo ($kedudukan=='Wajib Militer'?'selected':'') ?> >Wajib Militer</option>
						<option value="PNS yang dinyatakan hilang" <?php echo ($kedudukan=='PNS yang dinyatakan hilang'?'selected':'') ?> >PNS yang dinyatakan hilang</option>
						<option value="Pejabat Negara" <?php echo ($kedudukan=='Pejabat Negara'?'selected':'') ?> >Pejabat Negara</option>
						<option value="Kepala Negara" <?php echo ($kedudukan=='Kepala Negara'?'selected':'') ?> >Kepala Negara</option>
						<option value="Keberatan atas penjatuhan disiplin sesuai PP 30/1980" <?php echo ($kedudukan=='Keberatan atas penjatuhan disiplin sesuai PP 30/1980'?'selected':'') ?> >Aktif</option>

					   
					</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-4 control-label">Kartu Penduduk</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="ktp" value="<?php echo (set_value('ktp')) ? set_value('ktp') : $data['ktp'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">BPJS</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="bpjs" value="<?php echo (set_value('bpjs')) ? set_value('bpjs') : $data['bpjs'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Karis/Karsu</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="karis" value="<?php echo (set_value('karis')) ? set_value('karis') : $data['karis'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Kartu Pegawai</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="karpeg" value="<?php echo (set_value('karpeg')) ? set_value('karpeg') : $data['karpeg'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Taspen</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="taspen" value="<?php echo (set_value('taspen')) ? set_value('taspen') : $data['taspen'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">NPWP</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="npwp" value="<?php echo (set_value('npwp')) ? set_value('npwp') : $data['npwp'] ; ?>" 
						/>
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
			