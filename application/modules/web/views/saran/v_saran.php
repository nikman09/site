<div role="main" class="main">

				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">

					<div class="container">

						<div class="row mt-5">

							<div class="col-md-12 align-self-center p-static order-2 text-center">

								<h1 class="text-9 font-weight-bold"> Kritik dan Saran</h1>

								<span class="sub-title">Dinas Perindustrian Kalimantan Selatan</span>

							</div>

							<div class="col-md-12 align-self-center order-1">

								<ul class="breadcrumb breadcrumb-light d-block text-center">

									<li><a href="<?php echo base_url() ?>">Beranda</a></li>

									<li class="active">Kritik dan Saran</li>

								</ul>

							</div>

						</div>

					</div>

				</section>

			

       



			

				<div class="container">


					<div class="row py-4">

						<div class="col-lg-12">



							<div class="overflow-hidden mb-1">

								<h2 class="font-weight-normal text-7 mt-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200"><strong class="font-weight-extra-bold">Form Penyampaian </strong> Kritik & Saran</h2>

							</div>

							<div class="overflow-hidden mb-4 pb-3">

							<div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="800">

							
							</div>


								<p class="mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">	Kami senang mendengar dari Anda, silahkan sampaikan komentar, opini, masukan/saran, pengaduan, pertanyaan atau apa saja kepada Kami dengan mengisi form di bawah ini
</p>

							</div>



							<form id="form" class="validate" action="<?php echo base_url() ?>web/saran" method="POST">

							<input type="hidden" name="<?=$csrf['name']?>" value="<?=$csrf['hash']?>">

			

								

								<?php pesan_get('msg',"Berhasil Mengirim Kritik dan Saran","Berhasil Mengirim Kritik dan Saran","Berhasil Menghapus Kritik dan Saran") ?>

								

								

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

										<label class="font-weight-bold text-dark text-2">Perihal</label>

										<input type="text" value="" maxlength="100" class="form-control" name="judul" id="judul" >

									</div>

								</div>

								<div class="form-row">

									<div class="form-group col">

										<label class="required font-weight-bold text-dark text-2">Kritik dan Saran</label>

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

					


					</div>



				</div>



				