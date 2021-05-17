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
	
		<?php pesan_get2('msg',"Berhasil Membuat Akun,  Silahkan Login !"," Silahkan Login Terlebih Dahulu Untuk Melakukan Pendaftaran Pelatihan !") ?>
                    <div class="row">
					
					<div class="col-md-6">
					<h3>Login</h3>
					<hr/>
					
						<form id="form" role="form" class="validate" action="<?php echo base_url() ?>simanis/login" method="post" >
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<?php 
					if (isset($gagal))
						pesanvar2($gagal,"Email atau Password yang dimasukkan salah","Email atau Password yang dimasukkan salah","Klik CAPTCHA untuk verifikasi login") ?>
								<div class="form-group">
									<label for="field-1" class="control-label">E-mail</label>
									<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?php echo set_value('email'); ?>">
									
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Password</label>
								<div class="input-group" id="show_hide_password">
										<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password"  value="<?php echo set_value('password'); ?>">
										<div class="input-group-addon">
											<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
										</div>
									</div>
								</div>
							
							<button type="submit" class="btn btn-info">Login</button>
							
							<a href="<?php echo base_url(); ?>simanis/akun" style="float:right"> Daftar Akun <span style="color:#21a9e1"></span></a>
							 <a href="<?php echo base_url(); ?>simanis/resetpassword" style="float:right"> Lupa Password  |  </a> 
						
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

