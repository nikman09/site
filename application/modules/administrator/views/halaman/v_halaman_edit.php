<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>administrator/halaman">
            <i class="fa fa-newspaper-o"></i>Halaman</a>
    </li>
    <li class="active">
        <strong>Edit Halaman</strong>
    </li>
</ol>

<h3>Edit Halaman </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Edit Halaman
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Mengedit Halaman","Gagal Menambahkan Halaman") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>administrator/halamanedit"	method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-12">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="form-group">
					<label class="col-lg-2 control-label">Judul</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="judul" id="judul" value="<?php echo $data['judul']; ?>" 
						/>
                        <input type="hidden" class="form-control" name="id_halaman" id="id_halaman" value="<?php echo $data['id_halaman']; ?>" 
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('judul'); ?></span>
					</div>
				</div>
                <div class="form-group">
					<label class="col-lg-2 control-label">isi</label>
					<div class="col-lg-10">
                    <textarea class="form-control ckeditor" name="isi" id="isi"><?php echo $data['isi'] ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Foto Utama</label>
					<div class="col-lg-4">
					
					<div class="panel panel-primary" data-collapsed="0">
				
						<div class="panel-heading">
							<div class="panel-title">
								
							</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
							
							<div class="fileinput <?php  echo ($data['foto']=="") ? "fileinput-new":"fileinput-exists" ?> " data-provides="fileinput">
							<input type="hidden" value="<?php echo $data['foto'] ?>" name="foto">
								<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
								<img src="http://placehold.it/320x160" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
									<img src="<?php echo base_url()."assets/images/halaman/".$data['foto'] ?>" alt="...">
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
        </div>
			
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
    <a href="<?php echo base_url('administrator/halamanedit?id='.$data['id_halaman'].'') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-refresh"></i> Reset</a>
	<a href="<?php echo base_url('administrator/halaman') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-times"></i> Kembali</a>

		</form>	
</footer>

</div>
