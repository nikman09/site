<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">
					<div class="container">
						<div class="row mt-5">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-9 font-weight-bold"> Kontak Kami</h1>
								<span class="sub-title">Dinas Perindustrian Kalimantan Selatan</span>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-light d-block text-center">
									<li><a href="<?php echo base_url() ?>">Beranda</a></li>
									<li class="active">Kontak Kami</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			
       

			
				<div class="container">
					<div class="row py-4">
						<div class="col-lg-12">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.4293027174585!2d114.82390741394637!3d-3.487558242969849!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de686bc23e3a1bd%3A0x8c8a39bcb8ef553a!2sDinas%20Perindustrian%20Prov%20Kalsel!5e0!3m2!1sid!2sid!4v1570373343576!5m2!1sid!2sid" width="100%" height="500px" frameborder="0" ></iframe>
						</div>
					</div>
					<div class="row py-4">
						<div class="col-lg-6">

							<div class="overflow-hidden mb-1">
								<h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">kirim </strong> Pesan</h2>
							</div>
							<div class="overflow-hidden mb-4 pb-3">
								<p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400"></p>
							</div>

							<form id="form" class="validate" action="<?php echo base_url() ?>web/kontak" method="POST">
							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">
			
								
								<?php pesan_get('msg',"Berhasil Mengirim Pesan","Berhasil Mengirim Pesan","Berhasil Menghapus Berita") ?>
								
								
								<div class="form-row">
									<div class="form-group col-lg-6">
										<label class="required font-weight-bold text-dark text-2">Nama Lengkap</label>
										<input type="text" value=""  maxlength="100" class="form-control" name="nama" id="nama" >
									</div>
									<div class="form-group col-lg-6">
										<label class="required font-weight-bold text-dark text-2">Alamat Email</label>
										<input type="email" value="" data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" >
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="font-weight-bold text-dark text-2">Judul</label>
										<input type="text" value="" maxlength="100" class="form-control" name="judul" id="judul" >
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<label class="required font-weight-bold text-dark text-2">Pesan</label>
										<textarea maxlength="5000" rows="8" class="form-control" name="pesan" id="pesan" ></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col">
										<input type="submit" value="Kirim" class="btn btn-primary btn-modern" data-loading-text="Loading...">
									</div>
								</div>
							</form>

						</div>
						<div class="col-lg-6">

							<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">
								<h4 class="mt-2 mb-1">Kontak <strong>Kami</strong></h4>
								<ul class="list list-icons list-icons-style-2 mt-2">
									<li><i class="fas fa-map-marker-alt top-6"></i> <strong class="text-dark">Alamat :</strong> Jl. Dharma Praja Komplek Perkantoran Provinsi Kalimantan Selatan Banjarbaru.</li>
									<li><i class="fas fa-phone top-6"></i> <strong class="text-dark">Telepon:</strong> (0511) 5915906</li>
									<li><i class="fas fa-envelope top-6"></i> <strong class="text-dark">Email:</strong> <a href="mailto:disperin.kalselprov@gmail.com">disperin.kalselprov@gmail.com</a></li>
								</ul>
							</div>

							

							<h4 class="pt-5">Profil <strong>Dinas Perindustrian</strong></h4>
							<p class="lead mb-0 text-4">Tugas pokok Dinas Perindustrian Provinsi Kalimantan Selatan sesuai Pergub no 072 Tahun 2016 adalah melaksanakan urusan pemerintahan yang menjadi kewenangan daerah dan tugas pembantuan bidang perindustrian..</p>

						</div>

					</div>

				</div>

				