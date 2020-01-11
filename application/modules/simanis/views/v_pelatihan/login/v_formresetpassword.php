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
					<h3>Form Reset Password</h3>
					<hr/>
						<form id="form" role="form" class="validate" action="<?php echo base_url() ?>simanis/formresetpassword" method="post" >
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
							<input type="hidden" name="id_akun" value="<?=$data['id_akun']?>">
								
								<div class="form-group">
									<label for="field-1" class="control-label">Password Baru</label>
									<div class="input-group" id="show_hide_password">
										<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password"  value="<?php echo set_value('password'); ?>">
										<div class="input-group-addon">
											<a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
										</div>
									</div>
									
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Konfirmasi Password Baru</label>
									<div class="input-group" id="show_hide_password">
									<input type="password" class="form-control" id="konfirmasipassword" name="konfirmasipassword" placeholder="Masukkan Konfirmasi Password"  value="<?php echo set_value('konfirmasipassword'); ?>">
                                    <div class="input-group-addon">
                                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                                    </div>
                                </div>
									
								</div>	
							<button type="submit" class="btn btn-info">Submit</button>
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

