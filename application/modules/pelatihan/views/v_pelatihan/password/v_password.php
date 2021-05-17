<div class="container">
	<div class="row">
		<div class="col-md-12">
			<hr class="no-top-margin" />
		</div>
	</div>	
</div>

<div class="container">
	<div class="row vspace">
		<div class="col-md-12">
		<?php pesan_get2('msg',"Berhasil Mengganti Password !"," Gagal Mengganti Password !") ?>
		<?php if (isset($gagal))
				pesanvar2($gagal,"Gaagal Mengganti Password, Password Lama yang dimasukkan salah!","Gagal Mengganti Password !") ?>
                    <div class="row">
					
					<div class="col-md-6">
					<h3>Ganti Password</h3>
					<hr/>
						<form id="form" role="form" class="validate" action="<?php echo base_url() ?>pelatihan/password" method="post" >
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
								
							<div class="form-group">
									<label for="field-1" class="control-label">Password Lama</label>
									<input type="password" class="form-control" id="passwordlama" name="passwordlama" placeholder="Masukkan Password Lama"  value="<?php echo set_value('passwordlama'); ?>">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Password Baru</label>
									<input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="Masukkan Password Baru"  value="<?php echo set_value('password'); ?>">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Konfirmasi Password Baru</label>
									<input type="password" class="form-control" id="konfirmasipasswordbaru" name="konfirmasipasswordbaru" placeholder="Masukkan Konfirmasi Password Baru"  value="<?php echo set_value('konfirmasipassword'); ?>">
								</div>	
							<button type="submit" class="btn btn-info">Simpan</button>
							</form>
						</div>
						<div class="col-md-6">
						<p align="center">
							<img src="<?php echo base_url() ?>assets/images/login.png" class="img-responsive"  width="400px" margin="0 auto" />
						</p>
						</div>
                    </div>
		</div>
	</div>
</div>

