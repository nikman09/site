<ol class="breadcrumb bc-3">
	<li>
	<a href="<?php echo base_url() ?>kepegawaian/admin/pegawai">
	<i class="fa fa-users"></i>Pegawai</a>
	</li>
	<li class="active">
		<strong>Tambah Pegawai</strong>
	</li>
</ol>

<h3>Tambah Pegawai</h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Input
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Menambahkan Pegawai","Gagal Menambahkan Pegawai") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>kepegawaian/admin/pegawaitambah"	method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-6">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
			
				<div class="form-group">
					<label class="col-lg-4 control-label">NIP</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nip" value="<?php echo set_value('nip'); ?>" 
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('nip'); ?></span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Nama</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nama" value="<?php echo set_value('nama'); ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Password</label>
					<div class="col-lg-8">
						<input type="password" class="form-control" name="password" value="<?php echo set_value('password'); ?>" 
						/>
					</div>
				</div>
				
				
				
			
				
			</div>
			
			<div class="col-md-6">
			<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Kelamin</label>
					<div class="col-lg-8">
					<select class="form-control" name="jk">
					<option value='' disabled selected>.:Pilih Jenis Kelamin:.</option>
					   <option value="Laki-laki" <?php echo (set_value('jk')=='Laki-laki'?'selected':'') ?> >Laki-laki</option>
					   <option value="Perempuan" <?php echo (set_value('jk')=='Perempuan'?'selected':'') ?> >Perempuan</option>
					</select>
					</div>
				</div>
			<div class="form-group">
					<label class="col-lg-4 control-label">Tempat Lahir</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="tempat_lahir" value="<?php echo set_value('tempat_lahir'); ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
						<label class="col-lg-4 control-label">Tanggal Lahir</label>
						<div class="col-lg-8">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo set_value('tanggal_lahir'); ?>" name="tanggal_lahir" style="background-color:#fff"  placeholder="dd/mm/yyyy" id="tanggal_lahir"  data-mask="date">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>

						</div>
					</div>
				

			</div>
		</div>
	
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('kepegawaian/admin/pegawai') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-times"></i> Kembali</a>

		</form>	
</footer>

</div>
