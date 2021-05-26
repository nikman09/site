<ol class="breadcrumb bc-3">

    <li>

        <a href="<?php echo base_url() ?>administrator">

            <i class="fa fa-newspaper-o"></i>Administrator</a>

    </li>

    <li>

        <a href="<?php echo base_url() ?>administrator/saran">

            <i class="fa fa-newspaper-o"></i>saran</a>

    </li>

    <li class="active">

        <strong>Lihat Kritik dan Saran </strong>

    </li>

</ol>



<h3>Lihat Kritik dan Saran  </h3>

<div class="panel panel-primary" data-collapsed="0">

			

<div class="panel-heading">

	<div class="panel-title">

		Lihat Kritik dan Saran 

	</div>

	

	<div class="panel-options">

		<a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>

	</div>

</div>



<div class="panel-body">

	<?php pesan_get('msg',"Berhasil Mengedit Kritik dan Saran ","Gagal Menambahkan Kritik dan Saran ") ?>

	<form role="form" class="form-horizontal validate"  action="<?php echo base_url() ?>administrator/saranedit"	method="post"  enctype="multipart/form-data" id="form"> 	

		<div class="row">

			<div class="col-md-12">

				<div class="form-group">

					<label class="col-lg-2 control-label">Perihal</label>

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

					<label class="col-lg-2 control-label">Kritik dan Saran </label>

					<div class="col-lg-10">

                    <textarea class="form-control" name="pesan" id="pesan" disabled><?php echo $data['pesan'] ?></textarea>

					</div>

				</div>

				

			</div>

        </div>

			

		

	

</div>

<footer class="panel-footer text-right bg-light lter">

	<a href="<?php echo base_url('administrator/saran') ?>" class="btn btn-default btn-s-xs  btn-icon icon-left">

		<i class="fa fa-arrow-left"></i> Kembali</a>



		</form>	

</footer>



</div>

