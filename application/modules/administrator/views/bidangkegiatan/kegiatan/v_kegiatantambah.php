<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>administrator/kegiatan">
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
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>administrator/kegiatantambah"	method="post"  enctype="multipart/form-data" id="form"> 	
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
					<label class="col-lg-2 control-label">Bidang</label>
					<div class="col-lg-10">
                        <select class="form-control" name="bidang" id="bidang" >
                            <option value="" disabled selected>.:Pilih Bidang:.</option>
                          
                            <?php
                                foreach($bidang->result_array() as $row) {
                                    
                                    echo "<option value='".$row['id_bidang']."'>";
                                    echo "".$row['bidang']."</option>";
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

				
				
			
				
			</div>
        </div>
			
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('administrator/kegiatan') ?>" class="btn btn-default btn-s-xs  btn-icon icon-left">
		<i class="fa fa-times"></i> Kembali</a>

		</form>	
</footer>

</div>
