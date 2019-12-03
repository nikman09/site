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
						<form id="form" role="form" class="validate" action="<?php echo base_url() ?>pelatihan/akun" method="post" >
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
								<div class="form-group">
									<label for="field-1" class="control-label">E-mail</label>
									<input type="text" class="form-control" id="email" name="email" placeholder="Masukkan Email">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Nama</label>
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama">
								</div>	
								<div class="form-group">
									<label for="field-1" class="control-label">Password</label>
									<input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password">
								</div>
								<div class="form-group">
									<label for="field-1" class="control-label">Konfirmasi Password</label>
									<input type="password" class="form-control" id="konfirmasipassword" name="konfirmasipassword" placeholder="Masukkan Konfirmasi Password">
								</div>	
							<button type="submit" class="btn btn-info">Daftar Akun</button>
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

