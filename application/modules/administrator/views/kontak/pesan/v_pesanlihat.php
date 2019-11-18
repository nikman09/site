<ol class="breadcrumb bc-3">
    <li>
        <a href="<?php echo base_url() ?>administrator">
            <i class="fa fa-newspaper-o"></i>Administrator</a>
    </li>
    <li>
        <a href="<?php echo base_url() ?>administrator/pesan">
            <i class="fa fa-newspaper-o"></i>Pesan</a>
    </li>
    <li class="active">
        <strong>Lihat Pesan</strong>
    </li>
</ol>

<h3>Lihat Pesan </h3>
<div class="panel panel-primary" data-collapsed="0">
			
<div class="panel-heading">
	<div class="panel-title">
		Lihat Pesan
	</div>
	
	<div class="panel-options">
		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
	</div>
</div>

<div class="panel-body">
	<?php pesan_get('msg',"Berhasil Mengedit Pesan","Gagal Menambahkan Pesan") ?>
	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>administrator/pesanedit"	method="post"  enctype="multipart/form-data" id="form"> 	
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<label class="col-lg-2 control-label">Judul</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="judul" id="judul" value="<?php echo $data['judul']; ?>" 
						disabled />
                      
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-2 control-label">Nama</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="Nama" id="Nama" value="<?php echo $data['nama']; ?>" 
						disabled />
                      
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="Email" id="Email" value="<?php echo $data['email']; ?>" 
						disabled/>
                      
					</div>
				</div>
               

                <div class="form-group">
					<label class="col-lg-2 control-label">Pesan</label>
					<div class="col-lg-10">
                    <textarea class="form-control" name="pesan" id="pesan" disabled><?php echo $data['pesan'] ?></textarea>
					</div>
				</div>
				
			</div>
        </div>
			
		
	
</div>
<footer class="panel-footer text-right bg-light lter">
	<a href="<?php echo base_url('administrator/pesan') ?>" class="btn btn-default btn-s-xs  btn-icon icon-left">
		<i class="fa fa-arrow-left"></i> Kembali</a>

		</form>	
</footer>

</div>
