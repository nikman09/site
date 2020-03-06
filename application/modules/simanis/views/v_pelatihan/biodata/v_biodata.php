<div class="container">
	<div class="row">
		<div class="col-md-12">
			<hr class="no-top-margin" />
		</div>
	</div>	
</div>

<div class="container">
	<div class="row vspace" style="margin:5px;">
		<div class="col-md-12">
		<form id="form" role="form" class="validate"  action="<?php echo base_url() ?>simanis/biodata" method="post"  enctype="multipart/form-data" >
		
                    <div class="row">
		<div class="row">
					<div class="col-md-12">
					<?php pesan_get2('msg',"Berhasil Menyimpan Biodata !") ?>
						<h3>Biodata</h3>
						<hr/>
							<form id="form" role="form" class="validate" action="<?php echo base_url() ?>simanis/biodata" method="post"  enctype="multipart/form-data">
					</div>
					</div>
					<div class="row">
					


						<div class="col-md-4">
						<h4>Data Diri</h4>
							<hr/>
						<div class="form-group">
									<label for="field-1" class="control-label">E-mail</label>
									<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?php echo $data['email']; ?>" disabled>
									<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('email'); ?></span>
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">NIK</label>
									<input type="text" class="form-control" id="nik" name="nik" placeholder="Masukkan NIK KTP"  value="<?php echo $data['nik']; ?>">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Nama</label>
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap"  value="<?php echo $data['nama']; ?>">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Jenis Kelamin</label>
									<select  class="form-control" id="jk" name="jk">
										<option value="" <?= ($data['jk']==""?"selected":"") ?>>.:Pilih Jenis Kelamin:.</option>
										<option value="Laki-laki" <?= ($data['jk']=="Laki-laki"?"selected":"") ?>>Laki-laki</option>
										<option value="Perempuan" <?= ($data['jk']=="Perempuan"?"selected":"") ?>>Perempuan</option>
									</select> 
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Tempat Lahir</label>
									<input type="text" class="form-control" id="tempatlahir" name="tempatlahir" placeholder="Masukkan Tempat Lahir"  value="<?php echo $data['tempatlahir']; ?>">
								</div>

							<div class="form-group">
								<label for="field-1" class="control-label">Tanggal Lahir</label>
					
							<div class="input-group">
								<input type="text" value="<?php echo tanggalmiring($data['tanggallahir']) ?>" class="form-control datepicker" data-format="dd-mm-yyyy" name="tanggallahir" style="background-color:#fff"  placeholder="dd/mm/yyyy" id="tanggallahir"  data-mask="date">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
								</div>
					
							</div>

							<div class="form-group">
								<label for="field-1" class="control-label">Alamat Sekarang</label>
								<textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Tempat Lahir"><?php echo $data['alamat']; ?></textarea>
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Kabupaten/Kota</label>
								<select  class="form-control" id="kota" name="kota" >
									<option value="">.:Pilih Kabupaten/Kota:.</option>
									<option value="Kabupaten Banjar" <?= $data['kota']=="Kabupaten Banjar"?"selected":"" ?>>Kabupaten Banjar</option>
									<option value="Kabupaten Balangan" <?= $data['kota']=="Kabupaten Balangan"?"selected":"" ?>>Kabupaten Balangan</option>
									<option value="Kabupaten Banjar" <?= $data['kota']=="Kabupaten Banjar"?"selected":"" ?>>Kabupaten Banjar</option>
									<option value="Kabupaten Barito Kuala" <?= $data['kota']=="Kabupaten Barito Kuala"?"selected":"" ?>>Kabupaten Barito Kuala</option>
									<option value="Kabupaten Hulu Sungai Selatan" <?= $data['kota']=="Kabupaten Hulu Sungai Selatan"?"selected":"" ?>>Kabupaten Hulu Sungai Selatan</option>
									<option value="Kabupaten Hulu Sungai Tengah" <?= $data['kota']=="Kabupaten Hulu Sungai Tengah"?"selected":"" ?>>Kabupaten Hulu Sungai Tengah</option>
									<option value="Kabupaten Hulu Sungai Utara" <?= $data['kota']=="Kabupaten Hulu Sungai Utara"?"selected":"" ?>>Kabupaten Hulu Sungai Utara</option>
									<option value="Kabupaten Kotabaru" <?= $data['kota']=="Kabupaten Kotabaru"?"selected":"" ?>>Kabupaten Kotabaru</option>
									<option value="Kabupaten Tabalong" <?= $data['kota']=="Kabupaten Tabalong"?"selected":"" ?>>Kabupaten Tabalong</option>
									<option value="Kabupaten Tanah Bumbu" <?= $data['kota']=="Kabupaten Tanah Bumbu"?"selected":"" ?>>Kabupaten Tanah Bumbu</option>
									<option value="Kabupaten Tanah Laut" <?= $data['kota']=="Kabupaten Tanah Laut"?"selected":"" ?>>Kabupaten Tanah Laut</option>
									<option value="Kabupaten Tapin" <?= $data['kota']=="Kabupaten Tapin"?"selected":"" ?>>Kabupaten Tapin</option>
									<option value="Kota Banjarbaru" <?= $data['kota']=="Kota Banjarbaru"?"selected":"" ?>>Kota Banjarbaru</option>
									<option value="Kota Banjarmasin" <?= $data['kota']=="Kota Banjarmasin"?"selected":"" ?>>Kota Banjarmasin</option>
									

								</select>
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Nomor HP</label>
								<input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan Nomor HP"  value="<?php echo $data['nohp']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Pelatihan/Seminar/Sertifikasi Yang Pernah diikuti</label>
								<textarea class="form-control" id="daftarpelatihan " name="daftarpelatihan" placeholder="Sebutkan Daftar Pelatihan/Seminar/Sertifikasi"><?php echo $data['daftarpelatihan']; ?></textarea>
							</div>
					
					
						</div>

						<div class="col-md-4">
							<h4>Data Pendidikan</h4>
							<hr/>
							<div class="form-group">
								<label for="field-1" class="control-label">Pendidikan Terakhir</label>
								<select class="form-control" id="pendidikan" name="pendidikan" >
									<option value="">.:Pilih Pendidikan:.</option>
									<option value="SD/Sederajat" <?= $data['pendidikan']=="SD/Sederajat"?"selected":"" ?>>SD/Sederajat</option>
									<option value="SMP/Sederajat" <?= $data['pendidikan']=="SMP/Sederajat"?"selected":"" ?>>SMP/Sederajat</option>
									<option value="SMA/Sederajat" <?= $data['pendidikan']=="SMA/Sederajat"?"selected":"" ?>>SMA/Sederajat</option>
									<option value="Diploma-1" <?= $data['pendidikan']=="Diploma-1"?"selected":"" ?>>Diploma-1</option>
									<option value="Diploma-2" <?= $data['pendidikan']=="Diploma-2"?"selected":"" ?>>Diploma-2</option>
									<option value="Diploma-3" <?= $data['pendidikan']=="Diploma-3"?"selected":"" ?>>Diploma-3</option>
									<option value="Strata-1" <?= $data['pendidikan']=="Strata-1"?"selected":"" ?>>Strata-1</option>
									<option value="Strata-2" <?= $data['pendidikan']=="Strata-2"?"selected":"" ?>>Strata-2</option>
									<option value="Strata-3" <?= $data['pendidikan']=="Strata-3"?"selected":"" ?>>Strata-3</option>
								</select>
								</textarea>
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Nama Sekolah/PT</label>
								<input type="text" class="form-control" id="namapendidikan" name="namapendidikan" placeholder="Masukkan Nama Sekolah/PT"  value="<?php echo $data['namapendidikan']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Jurusan</label>
								<input type="text" class="form-control" id="jurusan" name="jurusan" placeholder="Masukkan Jurusan"  value="<?php echo $data['jurusan']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Nilai/IPK</label>
								<input type="text" class="form-control nilai" id="nilai" name="nilai" placeholder="Masukkan Nilai/IPK "  value="<?php echo $data['nilai']; ?>" data-mask="number">
								<span style="font-size:12px">*Koma dengan titik</span>
							</div>
							<h5><u>Data Pekerjaan</u></h5>
						
							<div class="form-group">
                            <label for="" class="control-label">Pekerjaan</label>
							<input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukkan Pekerjaan"  value="<?php echo $data['pekerjaan']; ?>">
							</div>
							<div class="form-group">
									<label for="" class="control-label">Tempat Kerja/Instansi/Perusahaan</label>
									<input type="text" class="form-control" id="tempatkerja" name="tempatkerja" placeholder="Masukkan Tempat Kerja"  value="<?php echo $data['tempatkerja']; ?>">
							</div>
							<div class="form-group">
									<label for="" class="control-label">Posisi/Jabatan dalam Pekerjaan</label>
									<input type="text" class="form-control" id="posisi" name="posisi" placeholder="Masukkan Posisi/Jabatan"  value="<?php echo $data['posisi']; ?>">
							</div>
							<hr/>
							
							<div class="form-group">
								<label for="field-1" class="control-label">Keahlian yang dimiliki</label>
								<textarea class="form-control" id="daftarkeahlian " name="daftarkeahlian" placeholder="Sebutkan Daftar Keahlian yang dimiliki"><?php echo $data['daftarkeahlian']; ?></textarea>
							</div>
						

					
					
						</div>
						<div class="col-md-3">
					<div class="form-group">
					<label for="field-1" class="control-label">	Pas Foto</label>
		
					
					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-body">
							<div class="fileinput <?php  echo ($data['foto']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput">
							<input type="hidden" value="<?php echo $data['foto'] ?>" name="foto">
								<div class="fileinput-new thumbnail" style="max-width: 310px; height: 250px;" data-trigger="fileinput">
								<img src="http://placehold.it/300x400" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
									<img src="<?php echo base_url()."assets/images/pelatihan/biodata/".$data['foto'] ?>" alt="...">
								</div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="foto" accept="image/*" >
									</span>
									<a href="#" class="btn btn-orange  	fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							<br/>
							<span>*Max 1 mb</span>
						</div>	
										
					</div>
					
				</div>

				<div class="form-group">
					<label for="field-1" class="control-label">	Foto KTP</label>
		
					
					<div class="panel panel-default" data-collapsed="0">
						<div class="panel-body">
							<div class="fileinput <?php  echo ($data['ktp']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput">
							<input type="hidden" value="<?php echo $data['ktp'] ?>" name="ktp">
								<div class="fileinput-new thumbnail" style="max-width: 310px; height: 150px;" data-trigger="fileinput">
								<img src="http://placehold.it/400x300" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 310px; height: 100px;" data-trigger="fileinput">
									<img src="<?php echo base_url()."assets/images/pelatihan/biodata/".$data['ktp'] ?>" alt="...">
								</div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="ktp" accept="image/*" >
									</span>
									<a href="#" class="btn btn-orange  	fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							<br/>
							<span>*Max 1 mb</span>
						</div>	
										
					</div>
					
				</div>
					
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
								
						
							
						</div>
                    </div>

					<div class="row">
					<div class="col-md-12">
						<button type="submit" class="btn btn-primary  btn-icon icon-left  daftar" style="float:right"><i class='fa fa-save'></i>Simpan</button>
							</form>
					</div>
		</div>
	</div>
</div>
</div>
</div>
