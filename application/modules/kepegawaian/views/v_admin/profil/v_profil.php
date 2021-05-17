<ol class="breadcrumb bc-3">
<li>
<a href="<?php echo base_url() ?>kepegawaian/admin/profil">
	<i class="fa fa-users"></i>Profil</a>
	</li>
	<li class="active">
		<strong>Edit Profil</strong>
	</li>
</ol>

<h3>Edit Profil</h3>
<div class="panel panel-primary" data-collapsed="0">
<div class="panel-heading">
	<div class="panel-title">
		Update
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>
			<div class="panel-body">
				<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>kepegawaian/admin/profil"	method="post"  enctype="multipart/form-data" id="form"> 	

			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">

					<?php pesan_get('msg',"Berhasil Mengedit Profil","Gagal Mengedit Profil") ?>
					
					<?php if (isset($error)) { pesanvar(0,"","Gagal Mengedit Profil"); } ?>
					
						<div class="row">
							<div class="col-md-6">
							
				<div class="form-group">
					<label class="col-lg-4 control-label">Username</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="username" id="username" value="<?php echo (set_value('username')) ? set_value('username') : $data['username'] ; ?>" 	/>
						<input type="hidden" class="form-control" name="username2" id="username2" value="<?php echo $data['username']?>"
						/>
						<span class="validate-has-error" style="color:#cc2424;font-size:10px"><?php echo form_error('username'); ?></span>
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
					<label class="col-lg-4 control-label">Alamat Email</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="email" value="<?php echo (set_value('email')) ? set_value('email') : $data['email'] ; ?>" 
						/>
					</div>
				</div>

			
				
			
			</div>
			
			<div class="col-md-6">
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
										<input type="file" name="foto" value="<?php echo (set_value('foto')) ? set_value('foto') : $data['foto'] ; ?>">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							<?php 
					if(form_error('nip')) {
						echo '<label style="color:red;font-size:10px">Upload ulang foto, Jika gagal saat menyimpan</label>';
						} ;
					?>
					<?php 
					if (isset($fotoerror))  {
						echo '<label style="color:red;font-size:10px">Maksimal ukuran gambar 2 MB </label>';
						} ;
					?>
					<label style="font-size:10px">&nbsp Max 2MB</label>
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
			
</footer>
</form>
				</div>
			