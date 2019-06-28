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
<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>kepegawaian/biodataedit?id_pegawai=<?php if (isset($id_pegawai2)) echo $id_pegawai2; else echo $data['id_pegawai']; ?>"	method="post"  enctype="multipart/form-data" id="form"> 	

<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="panel-body">
					<?php pesan_get('msg',"Berhasil Mengedit Data Pegawai","Gagal Mengedit Data Pegawai") ?>
						<div class="row">
							<div class="col-md-6">
							<input type="hidden" class="form-control" name="id_pegawai" data-required="true" value="<?php echo $data['id_pegawai']; ?>" />
			
				<div class="form-group">
					<label class="col-lg-4 control-label">NIP</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nip" value="<?php echo $data['nip']; ?>" readonly
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Nama</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Gelar Depan</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="gelardepan" value="<?php echo $data['gelardepan']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Gelar Belakang</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="gelarbelakang" value="<?php echo $data['gelarbelakang']; ?>" 
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
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo tanggal($data['tanggal_lahir']); ?>"
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
					<label class="col-lg-4 control-label">Kodepos</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="kodepos" value="<?php echo $data['kodepos']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Email</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" 
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
						<option value="Calon PNS" <?php echo ($data['status']=='Calon PNS'?'selected':'') ?> >Calon PNS</option>
					    <option value="PNS" <?php echo ($data['status']=='PNS'?'selected':'') ?> >PNS</option>
						<option value="Pensiunan" <?php echo ($data['status']=='Pensiunan'?'selected':'') ?> >Pensiunan</option>
						<option value="ABRI" <?php echo ($data['status']=='ABRI'?'selected':'') ?> >ABRI</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Kepegawaian</label>
					<div class="col-lg-8">
					<select class="form-control" name="jenis">
						<option value='' disabled>.:Pilih Jenis Pegawai:.</option>
						<option value="PNS Pusat DEPDAGRI" <?php echo ($data['jenis']=='PNS Pusat DEPDAGRI'?'selected':'') ?> >PNS Pusat DEPDAGRI</option>
					    <option value="PNS Pusat DEPDAGRI DPK" <?php echo ($data['jenis']=='PNS Pusat DEPDAGRI DPK'?'selected':'') ?> >PNS Pusat DEPDAGRI DPK</option>
					    <option value="PNS Pusat DEPDAGRI DPB" <?php echo ($data['jenis']=='PNS Pusat DEPDAGRI DPB'?'selected':'') ?> >PNS Pusat DEPDAGRI DPB</option>
					    <option value="PNS Daerah Otonom" <?php echo ($data['jenis']=='PNS Daerah Otonom'?'selected':'') ?> >PNS Daerah Otonom</option>
					    <option value="PNS Pusat DEP.LAN DPK" <?php echo ($data['jenis']=='PNS Pusat DEP.LAN DPK'?'selected':'') ?> >PNS Pusat DEP.LAN DPK</option>
					    <option value="PNS Pusat DEP.LAN DPB" <?php echo ($data['jenis']=='PNS Pusat DEP.LAN DPB'?'selected':'') ?> >PNS Pusat DEP.LAN DPB</option>
					    <option value="ABRI yang ditugaskan Karyakan" <?php echo ($data['jenis']=='ABRI yang ditugaskan Karyakan'?'selected':'') ?> >ABRI yang ditugaskan Karyakan</option>
					    
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Jabatan</label>
					<div class="col-lg-8">
					<select class="form-control" name="jabatan">
						<option value='' disabled>.:Pilih Jenis Jabatan:.</option>
						<option value="Struktural" <?php echo ($data['jabatan']=='Struktural'?'selected':'') ?> >Struktural</option>
					    <option value="PNS Pusat DEPDAGRI DPK" <?php echo ($data['jabatan']=='Fungsional'?'selected':'') ?> >Fungsional</option>
					    <option value="Pejabat Negara" <?php echo ($data['jabatan']=='Pejabat Negara'?'selected':'') ?> >Pejabat Negara</option>
					    <option value="Nonstruktural" <?php echo ($data['jabatan']=='Nonstruktural'?'selected':'') ?> >Nonstruktural</option>
					    <option value="KORPRI" <?php echo ($data['jabatan']=='KORPRI'?'selected':'') ?> >KORPRI</option>
					  
					    
					</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">Kedudukan Pegawai</label>
					<div class="col-lg-8">
					<select class="form-control" name="kedudukan">
						<option value='' disabled>.:Pilih Kedudukan Pegawai:.</option>
						<option value="Aktif" <?php echo ($data['kedudukan']=='Aktif'?'selected':'') ?> >Aktif</option>
						<option value="CLTN" <?php echo ($data['kedudukan']=='CLTN'?'selected':'') ?> >Aktif</option>
						<option value="Perpanjangan CLTN" <?php echo ($data['kedudukan']=='Perpanjangan CLTN'?'selected':'') ?> >Perpanjangan CLTN</option>
						<option value="Tugas Belajar" <?php echo ($data['kedudukan']=='Tugas Belajar'?'selected':'') ?> >Tugas Belajar</option>
						<option value="Pemberhentian Sementara" <?php echo ($data['kedudukan']=='Pemberhentian Sementara'?'selected':'') ?> >Pemberhentian Sementara</option>
						<option value="Penerima Uang Tunggu" <?php echo ($data['kedudukan']=='Penerima Uang Tunggu'?'selected':'') ?> >Penerima Uang Tunggu</option>
						<option value="Wajib Militer" <?php echo ($data['kedudukan']=='Wajib Militer'?'selected':'') ?> >Wajib Militer</option>
						<option value="PNS yang dinyatakan hilang" <?php echo ($data['kedudukan']=='PNS yang dinyatakan hilang'?'selected':'') ?> >PNS yang dinyatakan hilang</option>
						<option value="Pejabat Negara" <?php echo ($data['kedudukan']=='Pejabat Negara'?'selected':'') ?> >Pejabat Negara</option>
						<option value="Kepala Negara" <?php echo ($data['kedudukan']=='Kepala Negara'?'selected':'') ?> >Kepala Negara</option>
						<option value="Keberatan atas penjatuhan disiplin sesuai PP 30/1980" <?php echo ($data['kedudukan']=='Keberatan atas penjatuhan disiplin sesuai PP 30/1980'?'selected':'') ?> >Aktif</option>

					   
					</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-4 control-label">Kartu Penduduk</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="ktp" value="<?php echo $data['ktp']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">BPJS</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="bpjs" value="<?php echo $data['bpjs']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Karis/Karsu</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="karis" value="<?php echo $data['karis']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Kartu Pegawai</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="karpeg" value="<?php echo $data['karpeg']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Taspen</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="taspen" value="<?php echo $data['taspen']; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">NPWP</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="npwp" value="<?php echo $data['npwp']; ?>" 
						/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-4 control-label">Unit Kerja</label>
					<div class="col-lg-8">
					<select class="form-control" name="id_seksi">
					<option value='' disabled>.:Pilih Unit Kerja:.</option>
						<?php
							foreach($seksi->result_array() as $row){
								echo "<option value='".$row['id_seksi']."' ".($data['id_seksi']==$row['id_seksi']?'selected':'').">".$row['seksi']."</option>";
							}
						?>
					</select>
					</div>
				</div>
				<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data['foto']; ?></span>
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
					if(isset($id_pegawai)) {
						echo '<label style="color:red;font-size:10px">Upload ulang foto !</label>';
						} 
					?>
					</div>
				</div>
			</div>
		</div>
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-info btn-s-xs">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('kepegawaian/biodata') ?>" class="btn btn-danger btn-s-xs">
		<i class="fa fa-close"></i> Keluar</a>

		
</footer>
</form>
				</div>
			