<section class="slider-container" style="background-image: url(<?php echo base_url() ?>assets/front-end/web/images/slide-img-1-bg.png);">
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-12">
				
				<div class="slides">
					
					<!-- Slide 1 -->
					<div class="slide">
					
						<div class="slide-content">
							<h2>
								<small>SIMANIS</small>
								<span style="color:#fff">Informasi Pelatihan Industri</span>
							</h2>
							
							<small>
								Dapat kan kemudahan dalam mendapatkan informasi pelatihan Industri secara online.
								</small>
						</div>
						
						<div class="slide-image">
							
							<a href="#">
								<img src="<?php echo base_url() ?>assets/images/1020.png" class="img-responsive" width="300px" />
							</a>
						</div>
						
					</div>
					
					<!-- Slide 2 -->
					<div class="slide" data-bg="<?php echo base_url() ?>assets/front-end/web/images/slide-img-1-bg.png">
						
						<div class="slide-image">
							
							<a href="#">
								<img src="<?php echo base_url() ?>assets/images/123.png" class="img-responsive"  width="300px" />
							</a>
						</div>
					
						<div class="slide-content text-right">
							<h2>
								<small>SIMANIS</small>
								<span style="color:#fff">Pendaftaran Pelatihan Industri</span>
							</h2>
							
							<small>
								Dapatkan kemudahan mendaftar pelatihan industri secara online.
								</small>
							
						</div>
						
					</div>
					
					<!-- Slide 3 -->
					
					<!-- Slider navigation -->
					<div class="slides-nextprev-nav">
						<a href="#" class="prev">
							<i class="entypo-left-open-mini"></i>
						</a>
						<a href="#" class="next">
							<i class="entypo-right-open-mini"></i>
						</a>
					</div>
				</div>
				
			</div>
			
		</div>
		
	</div>
	
</section>


<?php 
	if ($this->session->userdata('pelatihan_status') == "login") {
		if ($persen<100) {
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
		<?php pesanvar2("0","","Biodata Belum Lengkap Diisi ! <a href='".base_url()."/pelatihan/biodata'>Lengkapi Biodata disini</a>") ?>
		</div>
	</div>	
</div>

<?php
		}
	}
?>

<section class="features-blocks">
	
	<div class="container">
		
		<div class="row vspace"><!-- "vspace" class is added to distinct this row -->
			
			<div class="col-sm-4">
				
				<div class="feature-block">
					<h3>
						<i class="entypo-book"></i>
						Pahami Cara Pendaftaran
					</h3>
					
					<p>
					Calon Peserta pelatihan harus membaca dan memahami tata cara Pendaftaran pelatihan yang dapat dilihat di <a href="<?=base_url() ?>assets/images/pelatihan/panduan/panduan.pdf" target="_blank">sini</a>.
					</p>
				</div>
				
			</div>
			
			<div class="col-sm-4">
				
				<div class="feature-block">
					<h3>
						<i class="entypo-key"></i>
						Pendaftaran Pelatihan
					</h3>
					
					<p>
						Pilih Pelatihan yang tersedia untuk dikuti dan Pastikan Biodata Diri diisi dengan lengkap dan dapat dipertanggung jawabkan.
					</p>
				</div>
				
			</div>
			
			<div class="col-sm-4">
				
				<div class="feature-block">
					<h3>
						<i class="entypo-list"></i>
						Lengkapi Persyaratan
					</h3>
					
					<p>
					Calon Peserta harus memahami persyaratan  pelatihan dan mengupload  dokumen  yang telah ditentukan.
					</p>
				</div>
				
			</div>
			
		</div>
		
		<!-- Separator -->
		<div class="row">
			<div class="col-md-12">
				<hr />
			</div>
		</div>
	</div>
	
</section>
<!-- Portfolio -->

<!-- Call for Action Button -->


<div class="container">
	<div class="row vspace">
		<div class="col-md-12">
		<h3 align="center">Informasi Pelatihan</h3>
		<table class="table  table-strip datable" id="table-1" style="font-size:12px;width:100%" >
		<thead>
			<tr>

				<th>Pelatihan</th>
				<th>Kategori</th>
				<th>Periode Pendaftaran</th>
				<th>Tanggal Pelatihan</th>
				<th>Tempat Pelatihan</th>
				<th>Persyaratan</th>
				<th>Daftar</th>
			</tr>
		</thead>
		<tbody>
		
			<?php
					foreach($data->result_array() as $row){
						echo "
							<tr>
								<td>".$row['nama']."</td>
								<td>".$row['kategori']."</td>
								<td>".tgl_indo($row['mulaipendaftaran'])." - ".tgl_indo($row['akhirpendaftaran'])."</td>
								<td>".tgl_indo($row['mulaipelatihan'])." - ".tgl_indo($row['akhirpelatihan'])."</td>
								<td>".$row['tempat']."</td>
								<td>
								<a href='#' id='".$row['id_pelatihan']."'  class='btn btn-default syarat' data-toggle='modal'   data-target='#myModal2'>Persyaratan </a></td>
								"; 
									if (date("Y-m-d")>=$row['mulaipendaftaran'] && date("Y-m-d")<=$row['akhirpendaftaran']) {
										if ($stat=="login") {
											if ($ada==1) {
												if ($item["status"]=="Menunggu Hasil Seleksi") {
													echo "
													<td><a href='".base_url()."simanis/status?msg=0' class='btn btn-primary  btn-icon icon-left  daftar' disabled><i class='fa fa-list'></i> Daftar</a></td>";
												} else if ($item["status"]=="Tidak Lulus Seleksi"){
													echo "
													<td><a href='".base_url()."simanis/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
													
												} else if ($item["status"]=="Lulus Seleksi" && $item["id_pelatihan"]!=$row['id_pelatihan']){
													echo "
													<td><a href='".base_url()."simanis/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
													
												}else {
													echo "
													<td><a href='".base_url()."simanis/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
												}
											} else {
												echo "
												<td><a href='".base_url()."simanis/persyaratan?i=".$row['id_pelatihan']."' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
											}
										} else {
											echo "
												<td><a href='".base_url()."simanis/login?msg=0' class='btn btn-primary  btn-icon icon-left  daftar'><i class='fa fa-list'></i> Daftar</a></td>";
										}
									
									} else if (date("Y-m-d")<$row['mulaipendaftaran']) {
										echo "
										<td><a  class='btn btn-default  btn-icon icon-left' disabled><i class='fa fa-list'></i> Belum Dibuka</a></td>";
									} else {
										echo "
										<td><a class='btn btn-default  btn-icon icon-left' disabled><i class='fa fa-list'></i> Sudah Tutup</a></td>";
									};
							
						echo "
							</tr>
						";
					}
				?>
		</tbody>
	</table>
	</div>
</div>
</div>

<?php 
	if ($this->session->userdata('pelatihan_status') != "login") {
	
?>
<div class="container">
	<div class="row vspace">
		<div class="col-md-12">
			
			<div class="callout-action">
				<h2>Belum Punya Akun Pendaftaran ?</h2>
				
				<div class="callout-button">
					<a href="index.html" class="btn btn-secondary">Buat Akun</a>
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<?php 
	} else {
?>
<div class="container">
	<div class="row vspace">
		<div class="col-md-12">
			
			<div class="callout-action">
				<h2>Lihat Status Pendaftaran Pelatihan Terakhir </h2>
				
				<div class="callout-button">
					<a href="<?php echo base_url() ?>simanis/status" class="btn btn-secondary">Lihat Status</a>
				</div>
				
			</div>
			
		</div>
	</div>
</div>
<?php 
	}
?>



<div class="modal fade" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content" id="modal-edit">
          
         
        </div>
    </div>
</div>