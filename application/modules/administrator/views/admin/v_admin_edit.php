<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-users"></i>Administrator</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>administrator/admin">
            <i class="fa fa-user"></i>Admin</a>
    </li>
    <li class="active">
        <strong>Tambah Admin</strong>
    </li>
</ol>

<h3>Edit Admin </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Edit Admin
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Mengedit Admin","Gagal Mengedit Admin") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>administrator/adminedit?id=<?php if (isset($username2)) echo $username2; else echo $data['username']; ?>"	method="post"  enctype="multipart/form-data" id="form"> 	
	<div class="row">
			<div class="col-md-6">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="form-group">
					<label class="col-lg-4 control-label">Username</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" id="username" name="username" value="<?php echo (set_value('username')) ? set_value('username') : $data['username'] ; ?>" 
						/>
						<input type="hidden" class="form-control" name="username2" id="username2" value="<?php echo $data['username']?>"
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('username'); ?></span>
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
					<label class="col-lg-4 control-label">Email</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="email" value="<?php echo (set_value('email')) ? set_value('email') : $data['email'] ; ?>" 
						/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Telepon</label>
					<div class="col-lg-8">
						<input type="text" class="form-control" name="nohp" value="<?php echo (set_value('nohp')) ? set_value('nohp') : $data['nohp'] ; ?>" 
						/>
					</div>
				</div>
			</div>
			
			<div class="col-md-6">
			<div class="form-group">
					<label class="col-lg-4 control-label">Alamat</label>
					<div class="col-lg-8">
						<textarea class="form-control" name="alamat" ><?php echo (set_value('alamat')) ? set_value('alamat') : $data['alamat'] ; ?></textarea>
						
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Jenis Kelamin</label>
					<div class="col-lg-8">
					<select class="form-control" name="jk">
					<?php  (set_value('jk')) ? $jk = set_value('jk') : $jk = $data['jk'] ; ?>
					<option value=''>.:Pilih Jenis Kelamin:.</option>
					   <option value="Laki-laki" <?php echo ($jk=='Laki-laki'?'selected':'') ?> >Laki-laki</option>
					   <option value="Perempuan" <?php echo ($jk=='Perempuan'?'selected':'') ?> >Perempuan</option>
					</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-4 control-label">Bidang</label>
					<div class="col-lg-8">
                        <select class="form-control" name="bidang" id="bidang" >
                            <option value="" disabled selected>.:Pilih Bidang:.</option>
							<?php  (set_value('bidang')) ? $id_bidang = set_value('bidang') : $id_bidang= $data['id_bidang'] ; ?>
                            <?php
                                foreach($bidang->result_array() as $row) {
                                    
									echo "<option value='".$row['id_bidang']."'";
									if ($id_bidang==$row['id_bidang']) echo  "selected>	";
                                    echo "".$row['bidang']."</option>";
                                }
                            ?>
                            </select>
					</div>
				</div>
				<div class="form-group">
						<label class="col-sm-4 control-label">Foto</label>
						<div class="col-sm-8">
						<div class="fileinput <?php  echo ($data['foto']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput">
							<input type="hidden" value="<?php echo $data['foto'] ?>" name="foto">
								<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
								<img src="http://placehold.it/320x160" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
									<img src="<?php echo base_url()."assets/images/admin/".$data['foto'] ?>" alt="...">
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
					</div>
				</div>
			
		
				

			</div>
		</div>
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs   btn-icon icon-left">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('administrator/admin') ?>" class="btn btn-default btn-s-xs   btn-icon icon-left">
		<i class="fa fa-times"></i> Kembali</a>

		</form>	
</footer>

</div>
