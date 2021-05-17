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
	
  
                    <div class="row">
					
					<div class="col-md-6">
					<h3>Pembuatan Akun Pendaftaran</h3>
					<hr/>
						<form id="form" role="form" class="validate" action="<?php echo base_url() ?>simanis/akun" method="post" >
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
								<div class="form-group">
									<label for="field-1" class="control-label">E-mail</label>
									<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?php echo set_value('email'); ?>">
									<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('email'); ?></span>
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Nama</label>
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama"  value="<?php echo set_value('nama'); ?>">
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
								<div class="form-group">
									<label for="field-1" class="control-label">Konfirmasi Password</label>
									<div class="input-group" id="show_hide_password">
										<input type="password" class="form-control" id="konfirmasipassword" name="konfirmasipassword" placeholder="Masukkan Konfirmasi Password"  value="<?php echo set_value('konfirmasipassword'); ?>">
										<div class="input-group-addon">
											<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
										</div>
									</div>
									
								</div>	
							<button type="submit" class="btn btn-info">Daftar Akun</button> <a href="<?php echo base_url(); ?>simanis/login" style="float:right"> Sudah Punya Akun ? <span style="color:#21a9e1">Login !</span></a>
							</form>
						</div>
						<div class="col-md-6">
						<p align="center">
							<img src="<?php echo base_url() ?>assets/images/daftar.png" class="img-responsive"  width="400px" margin="0 auto" />
						</p>
						</div>
                    </div>
		</div>
	</div>
</div>

