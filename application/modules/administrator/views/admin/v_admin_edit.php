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
        <strong>Edit Kegiatan</strong>
    </li>
</ol>

<h3>Edit Kegiatan </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Edit Kegiatan
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Mengedit Kegiatan","Gagal Menambahkan Kegiatan") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>administrator/kegiatanedit"	method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-12">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="form-group">
					<label class="col-lg-2 control-label">Judul</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="judul" id="judul" value="<?php echo $data['judul']; ?>" 
						/>
                        <input type="hidden" class="form-control" name="id_kegiatan" id="id_kegiatan" value="<?php echo $data['id_kegiatan']; ?>" 
						/>
						<span class="validate-has-error" style="color:#cc2424"><?php echo form_error('judul'); ?></span>
					</div>
				</div>

                <div class="form-group">
						<label class="col-lg-2 control-label">Tanggal</label>
						<div class="col-lg-10">
							<div class="input-group">
								<input type="text" value="<?php echo tanggalmiring($data['tanggal']) ?>" class="form-control datepicker" data-format="dd-mm-yyyy" value="<?php echo set_value('tanggal'); ?>" name="tanggal" style="background-color:#fff"  placeholder="dd/mm/yyyy" id="tanggal"  data-mask="date">
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
                            <option value="" disabled>.:Pilih Kategori:.</option>
                          
                            <?php
                                foreach($kegiatankategori->result_array() as $row) {
                                    
                                    echo "<option value='".$row['id_kegiatankategori']."' ".($data['id_kegiatankategori']==$row['id_kegiatankategori']?"Selected":"").">";
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
                                    
                                    echo "<option value='".$row['id_bidang']."' ".($data['id_bidang']==$row['id_bidang']?"Selected":"").">";
                                    echo "".$row['bidang']."</option>";
                                }
                            ?>
                            </select>
					</div>
				</div>
                            
               

                <div class="form-group">
					<label class="col-lg-2 control-label">isi</label>
					<div class="col-lg-10">
                    <textarea class="form-control ckeditor" name="isi" id="isi"><?php echo $data['isi'] ?></textarea>
					</div>
				</div>
				<div class="form-group">
						<label class="col-sm-2 control-label">Foto Utama</label>
						<div class="col-sm-4">
							<div class="fileinput fileinput-new" data-provides="fileinput" style="margin-bottom:0;display:inline">
								<div class="input-group">
									<div class="form-control uneditable-input" data-trigger="fileinput">
										<i class="glyphicon glyphicon-file fileinput-exists"></i>
										<span class="fileinput-filename"><?php echo $data["foto"] ?></span>
									</div>
									<span class="input-group-addon btn btn-default btn-file">
										<span class="fileinput-new">Select file</span>
										<span class="fileinput-exists">Change</span>
										<input type="file" name="foto"    id="image-source"  onchange="previewImage();" >
									</span>
									<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>
					</div>
				</div>
                <div class="form-group">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-4">
                           <img id="image-preview" src="<?php echo base_url()."assets/images/kegiatan/".$data['foto'] ?>" alt="image preview" width="100px" style="border:2px solid #dbdbdb"/>

					</div>
				</div>
				
				
			
				
			</div>
        </div>
			
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
    <a href="<?php echo base_url('administrator/kegiatanedit?id='.$data['id_kegiatan'].'') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-refresh"></i> Reset</a>
	<a href="<?php echo base_url('administrator/kegiatan') ?>" class="btn btn-default btn-s-xs">
		<i class="fa fa-times"></i> Kembali</a>

		</form>	
</footer>

</div>
