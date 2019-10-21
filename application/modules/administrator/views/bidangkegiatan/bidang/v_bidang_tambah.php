<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>administrator/berita">
            <i class="fa fa-newspaper-o"></i>Bidang</a>
    </li>
    <li class="active">
        <strong>Tambah Bidang</strong>
    </li>
</ol>

<h3>Tambah Bidang </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Tambah Bidang
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Menambahkan Bidang","Gagal Menambahkan Bidang") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>administrator/bidangtambah"	method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-12">
			<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
				<div class="form-group">
					<label class="col-lg-2 control-label">Nama Bidang</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="bidang" id="bidang" value="<?php echo set_value('bidang'); ?>" 
						/>
					</div>
				</div>
                <div class="form-group">
					<label class="col-lg-2 control-label">Tugas dan Deksripsi</label>
					<div class="col-lg-10">
                    <textarea class="form-control ckeditor" name="tugas" id="tugas"></textarea>
					</div>
				</div>
				<div class="form-group">
			</div>
        </div>
			
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	<button type="submit" class="btn btn-primary btn-s-xs  btn-icon icon-left">
		<i class="fa fa-save"></i> Simpan</button>
	&nbsp
	<a href="<?php echo base_url('administrator/bidang') ?>" class="btn btn-default btn-s-xs  btn-icon icon-left">
		<i class="fa fa-times"></i> Kembali</a>

		</form>	
</footer>

</div>
