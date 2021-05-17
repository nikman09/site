<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>user">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>user/kegiatan">
            <i class="fa fa-newspaper-o"></i>Kegiatan</a>
    </li>
    <li class="active">
        <strong>Tambah Kegiatan</strong>
    </li>
</ol>

<h3>Tambah Kegiatan </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Tambah Kegiatan
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Menambahkan Kegiatan","Gagal Menambahkan Kegiatan") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>user/kegiatantambah"	method="post"  enctype="multipart/form-data" id="form"> 	
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
                        <select class="form-control" name="kegiatankategori" id="kegiatankategori" >
                            <option value="" disabled selected>.:Pilih Kategori:.</option>
                          
                            <?php
                                foreach($kegiatankategori->result_array() as $row) {
                                    
                                    echo "<option value='".$row['id_kegiatankategori']."'>";
                                    echo "".$row['kategori']."</option>";
                                }
                            ?>
                            </select>
					</div>
				</div>             
                <div class="form-group">
					<label class="col-lg-2 control-label">isi</label>
					<div class="col-lg-10">
                    <textarea class="form-control ckeditor" name="isi" id="isi"></textarea>
					</div>
				</div>
				<div class="form-group">
						<label class="col-sm-2 control-label">Foto Utama</label>
						<div class="col-sm-4">
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
				</div>

				
				
			
				
			</div>
        </div>
			
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('user/kegiatan') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-times"></i> Kembali</a>

		</form>	
</footer>

</div>
