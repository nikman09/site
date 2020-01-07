<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>administrator/berita">
            <i class="fa fa-newspaper-o"></i>Berita</a>
    </li>
    <li class="active">
        <strong>Tambah Berita</strong>
    </li>
</ol>

<h3>Tambah Berita </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Tambah Berita
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Menambah Pelatihan","Gagal Menambahkan Pelatihan") ?>
	<form role="form" class="form-horizontal"  action="<?php echo base_url() ?>pelatihan/admin/pelatihantambah"	method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-12">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="form-group">
					<label class="col-lg-2 control-label">Nama Pelatihan</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="nama" id="nama" value="<?php echo set_value('nama'); ?>" 
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('nama'); ?></span>
					</div>
				</div>
				
				<div class="form-group">
				<label class="col-lg-2 control-label">Kategori</label>
					<div class="col-lg-10">
                        <select class="form-control" name="kategori" id="kategori" >
                            <option value="" disabled selected>.:Pilih Kategori:.</option>
							<option value="Umum">Umum</option>
							<option value="Pelaku Industri">Pelaku Industri</option>
						</select>
					</div>
				</div>
                <div class="form-group">
						<label class="col-lg-2 control-label">Tanggal Pendaftaran</label>
						<div class="col-lg-10">
							<div class="input-group">
								<input type="text"  class="form-control daterange" data-format="DD/MM/YYYY"  value="<?php echo date("d/m/Y")." - ".date("d/m/Y"); ?>" name="tanggalpendaftaran" style="background-color:#fff"   id="tanggalpendaftaran" readonly/>
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label">Tanggal Pengumuman</label>
						<div class="col-lg-10">
							<div class="input-group">
								<input type="text" class="form-control datepicker" data-format="dd-mm-yyyy"  value="<?php echo date("d/m/Y", strtotime("+1 day")) ?>" name="tanggalpengumuman" style="background-color:#fff"  placeholder="dd/mm/yyyy" id="tanggalpengumuman"  data-mask="date">
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Tanggal Pelatihan</label>
						<div class="col-lg-10">
							<div class="input-group">
								<input type="text"  class="form-control daterange" data-format="DD/MM/YYYY"  value="<?php echo date("d/m/Y")." - ".date("d/m/Y"); ?>" name="tanggalpelatihan" style="background-color:#fff"   id="tanggalpelatihan" readonly/>
								<div class="input-group-addon" style="background-color:#fff">
									<a href="#">
										<i class="entypo-calendar"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Kuota</label>
						<div class="col-lg-10">
							<input type="text" class="form-control nilai" name="kuota" id="kuota" value="0" 
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Tempat Pelatihan</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="tempat" id="tempat" value="" 
							/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-lg-2 control-label">Contact Person Pelatihan</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name="cp" id="cp" value="" 
							/>
						</div>
					</div>
                <div class="form-group">
					<label class="col-lg-2 control-label">Persyaratan</label>
					<div class="col-lg-10">
                    <textarea class="form-control" name="persyaratan" id="persyaratan"></textarea>
					</div>
				</div>
				
				<div class="form-group">
								<label class="col-sm-2 control-label">Lampiran</label>
								
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
					<label class="col-lg-2 control-label">Status</label>
					<div class="col-lg-2">
                        <select class="form-control" name="publish" id="publish" >
                            <option value="" disabled selected>.:Pilih Status:.</option>
							<option value="Publish" >Publish</option>
							<option value="Draft" >Draft</option>
                            </select>
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
	<a href="<?php echo base_url('pelatihan/admin/pelatihan') ?>" class="btn btn-default btn-s-xs  btn-icon icon-left">
		<i class="fa fa-arrow-left"></i> Kembali</a>

		</form>	
</footer>

</div>
