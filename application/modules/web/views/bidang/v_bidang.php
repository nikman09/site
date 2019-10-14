<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">
					<div class="container">
						<div class="row mt-5">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-9 font-weight-bold"><?php echo $halaman['bidang'] ?></h1>
								<span class="sub-title">Dinas Perindustrian Kalimantan Selatan</span>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-light d-block text-center">
									<li><a href="<?php echo base_url() ?>">Beranda</a></li>
									<li class="active"> Profil <?php echo $halaman['bidang'] ?></li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			

				<div class="container">

					<div class="row">
						<div class="col">
						<?php if ($halaman['foto']!="") { ?>
						<div class="row text-center pb-5">
								<div class="col-md-12 mx-md-auto">
								<img width="100%" src="<?php  echo base_url(); ?>assets/images/halaman/<?php echo $halaman['foto']; ?>" />
								</div>
							</div>
							<?php 
						}
							?>

							<div>
								<?php 
									echo $halaman['tugas'];
								?>
							</div>
							

						

						</div>
					</div>
					
					

				</div>

				