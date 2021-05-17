<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>admin">
            <i class="fa fa-newspaper-o"></i>Admin</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>pelatihan/admin/pengumuman">
            <i class="fa fa-newspaper-o"></i>Pengumuman</a>
    </li>
    <li class="active">
        <strong>Tambah Pengumuman</strong>
    </li>
</ol>

<h3>Tambah Pengumuman </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Tambah Pengumuman
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Menambahkan Pengumuman","Gagal Menambahkan Pengumuman") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>pelatihan/admin/pengumumantambah"	method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-12">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="form-group">
					<label class="col-lg-2 control-label">Judul</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="judul" id="judul" value="<?php echo set_value('judul'); ?>" 
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('judul'); ?></span>
					</div>
				</div>

                <div class="form-group">
						<label class="col-lg-2 control-label">Tanggal</label>
						<div class="col-lg-10">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo set_value('tanggal'); ?>" name="tanggal" style="background-color:#fff"  placeholder="dd/mm/yyyy" id="tanggal"  data-mask="date">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				
				<div class="form-group">
					<label class="col-lg-2 control-label">Kategori</label>
					<div class="col-lg-10">
					<input type="text" class="form-control" name="kategori" id="kategori" value="<?php echo set_value('kategori'); ?>" 
						/>
					</div>
				</div>
                            
                

                <div class="form-group">
					<label class="col-lg-2 control-label">isi</label>
					<div class="col-lg-10">
                    <textarea class="form-control ckeditor" name="isi" id="isi"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Status</label>
					<div class="col-lg-10">
                        <select class="form-control" name="status" id="status" >
                            <option value="" disabled selected>.:Pilih Status:.</option>
							<option value="Publish" >Publish</option>
							<option value="Draft" >Draft</option>
                            </select>
					</div>
				</div>
				<div class="form-group">
								<label class="col-sm-2 control-label">File Lampiran</label>
								
								<div class="col-sm-10">
								
									<div class="fileinput fileinput-new" data-provides="fileinput">
										<div class="input-group">
											<div class="form-control uneditable-input" data-trigger="fileinput">
												<i class="glyphicon glyphicon-file fileinput-exists"></i>
												<span class="fileinput-filename"></span>
											</div>
											<span class="input-group-addon btn btn-default btn-file">
												<span class="fileinput-new">Select file</span>
												<span class="fileinput-exists">Change</span>
												<input type="file" name="file" id="file">
											</span>
											<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
										</div>
									</div>
									
								</div>
							</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Foto Utama</label>
					<div class="col-lg-4">
					
					<div class="panel panel-primary" data-collapsed="0">
				
						<div class="panel-heading">
							<div class="panel-title">
							Foto Utama
							</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
							</div>
						</div>
						
						<div class="panel-body">
							
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="max-width: 310px; height: 160px;" data-trigger="fileinput">
									<img src="http://placehold.it/320x160" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 320px; max-height: 160px"></div>
								<div>
									<span class="btn btn-white btn-file">
										<span class="fileinput-new">Select image</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="foto" accept="image/*">
									</span>
									<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
							
						</div>
					
					</div>
					
					
		
					</div>


				
				</div>
				
				

				<!-- <div class="form-group">
						<label class="col-sm-2 control-label">Foto Utama</label>
						<div class="col-sm-10">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo set_value('foto') ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="foto"   id="image-source"  onchange="previewImage();">
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
					</div>
				</div>
				<div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-4">
                           <img id="image-preview" alt="image preview" width="100px" style="border:2px solid #dbdbdb"/>

					</div>
				</div> -->

				
				
			
				
			</div>
        </div>
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs btn-icon icon-left">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('pelatihan/admin/pengumuman') ?>" class="btn btn-default btn-s-xs  btn-icon icon-left">
		<i class="fa fa-arrow-left"></i> Kembali</a>

		</form>	
</footer>

</div>
