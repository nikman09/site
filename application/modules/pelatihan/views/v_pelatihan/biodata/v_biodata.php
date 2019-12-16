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
		<form id="form" role="form" class="validate"  action="<?php echo base_url() ?>pelatihan/biodata" method="post"  enctype="multipart/form-data" >
		
                    <div class="row">
		<div class="row">
					<div class="col-md-12">
					<?php pesan_get2('msg',"Berhasil Menyimpan Biodata !") ?>
						<h3>Biodata</h3>
						<hr/>
							<form id="form" role="form" class="validate" action="<?php echo base_url() ?>pelatihan/biodata" method="post"  enctype="multipart/form-data">
					</div>
					</div>
					<div class="row">
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
					
						
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
								
						
							
						</div>


						<div class="col-md-4">
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


					
					
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for="field-1" class="control-label">Alamat</label>
								<textarea class="form-control" id="alamat" name="alamat" placeholder="Masukkan Tempat Lahir"><?php echo $data['tempatlahir']; ?></textarea>
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Kota</label>
								<input type="text" class="form-control" id="kota" name="kota" placeholder="Masukkan Kota"  value="<?php echo $data['kota']; ?>">
							</div>
							<div class="form-group">
								<label for="field-1" class="control-label">Nomor HP</label>
								<input type="text" class="form-control" id="nohp" name="nohp" placeholder="Masukkan Nomor HP"  value="<?php echo $data['nohp']; ?>">
							</div>
						

					
					
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
