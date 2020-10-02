<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">
					<div class="container">
						<div class="row mt-5">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-9 font-weight-bold">Kegiatan  "<?php echo $bidang['bidang'] ?>"</h1>
								<span class="sub-title">Dinas Perindustrian Kalimantan Selatan</span>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-light d-block text-center">
									<li><a href="<?php echo base_url() ?>">Beranda</a></li>
									<li class="active">Kegiatan</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			

				<div class="container py-4">

					<div class="row">
						<div class="col">
							<div class="blog-posts">	
							<div class="row">
							<?php
								foreach($data->result_array() as $row){
									
							?>
							<div class="col-md-4">
							
								<article class="post post-medium border-0 pb-0 mb-5">
									<div class="post-image">
										<a href="<?php echo base_url("web/kegiatanposts?ids=".$row['id_kegiatan']."") ?>">
											<img src="<?php echo base_url() ?>assets/images/kegiatan/thumb/<?php echo $row['fotos'] ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" />
										</a>
									</div>

									<div class="post-content">

										<h2 class="font-weight-semibold text-5 line-height-6 mt-3 mb-2"><a href="<?php echo base_url("web/kegiatanposts?ids=".$row['id_kegiatan']."") ?>"><?php  echo $row['judul']; ?></a></h2>
										<p><?php echo  strip_tags(substr($row['isi'] , 0, 200))?>   [...]</p>

										<div class="post-meta">
											<span><i class="far calendar-alt"></i> <?php echo tgl_indo($row['tanggal']); ?></span>
											<span><i class="far fa-folder"></i> <a href="#"><?php echo $row['kategori']; ?></span>
											<span><i class="far fa-star"></i> <a href="#"><?php echo $row['bidang']; ?></a></span>
											<span class="d-block mt-2"><a href="<?php echo base_url("web/kegiatanposts?ids=".$row['id_kegiatan']."") ?>" class="btn btn-xs btn-light text-1 text-uppercase">Baca Lebih Lanjut</a></span>
										</div>

									</div>
								</article>
							</div>
										

							
								<?php
									}
									?>
							</div>
							
							<?php 
								echo $pagination;  
							  ?>

							
							</div>
						</div>

					
					</div>

				</div>
				