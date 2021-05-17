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
					<h3>Reset Password</h3>
					<hr/>
					
						<form id="form" role="form" class="validate" action="<?php echo base_url() ?>simanis/resetpassword" method="post" >
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<?php 
					if (isset($gagal))
						pesanvar2($gagal,"Email Tidak Terdaftar","Email Tidak Terdaftar","Klik CAPTCHA untuk verifikasi login") ?>
								<div class="form-group">
									<label for="field-1" class="control-label">E-mail</label>
									<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email" value="<?php echo set_value('email'); ?>">
									
								</div>	
							
							<button type="submit" class="btn btn-info">Kirim</button>
							<a href="<?php echo base_url(); ?>simanis/akun" style="float:right"> Daftar Akun <span style="color:#21a9e1"></span></a>
							 <a href="<?php echo base_url(); ?>simanis/login" style="float:right"> Login |  </a> 
						
							</form>
						</div>
						<div class="col-md-6">
						<p align="center">
							<img src="<?php echo base_url() ?>assets/images/lupa.png" class="img-responsive"  width="400px" margin="0 auto" />
						</p>
						</div>
                    </div>
		</div>
	</div>
</div>

