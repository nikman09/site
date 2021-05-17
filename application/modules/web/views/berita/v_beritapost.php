<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">
					<div class="container">
						<div class="row mt-5">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-9 font-weight-bold"><?=$data['judul'];?></h1>
								<span class="sub-title">Dinas Perindustrian Prov. Kalsel</span>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-light d-block text-center">
									<li><a href="<?php echo base_url() ?>">Beranda</a></li>
									<li><a href="<?php echo base_url("web/berita") ?>">Berita</a></li>
									<li class="active">Detail</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			

				<div class="container py-4">

					<div class="row">
						<div class="col-lg-9">
							<div class="blog-posts  single-post">
							<article class="post post-large blog-single-post border-0 m-0 p-0">
<div class="post-image ml-0">
										<a href="<?php echo base_url("web/beritapost?ids=".$data['id_berita']."") ?>">
											<img src="<?php echo base_url(); ?>assets/images/berita/<?php echo $data['foto'] ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" width="100%"/>
										</a>
									</div>
							
									<div class="post-date ml-0">
										<span class="day"><?php echo date('d',strtotime($data['tanggal'])); ?></span>
										<span class="month"><?php echo date('M',strtotime($data['tanggal'])); ?></span>
									</div>
							
									<div class="post-content ml-0">
							
										<h2 class="font-weight-bold"><a href="#"><?=$data['judul'];?></a></h2>
							
										<div class="post-meta">
											<span><i class="far fa-user"></i> By <a href="#"><?=$data['userinput'];?></a> </span>
											<span><i class="far fa-folder"></i> <a href="#"><?=$data['kategori'];?></a> </span>
											<span><i class="far fa-calendar"></i> <a href="#"><?=tanggal($data['tanggal']);?></a> </span>
										</div>

									<?php
										echo $data['isi'];
									?>
							
									</div>
								</article>
							
							</div>
						</div>

						<div class="col-lg-3">
							<aside class="sidebar">
								<form action="page-search-results.html" method="get">
									<div class="input-group mb-3 pb-1">
										<input class="form-control text-1" placeholder="Search..." name="s" id="s" type="text">
										<span class="input-group-append">
											<button type="submit" class="btn btn-dark text-1 p-2"><i class="fas fa-search m-2"></i></button>
										</span>
									</div>
								</form>
								<h5 class="font-weight-bold pt-4">Kategori</h5>
								<ul class="nav nav-list flex-column mb-5">
								<?php
									foreach($kategori->result_array() as $row){
										echo "<li class='nav-item'><a class='nav-link' href='#'>".$row['kategori']." (".$row['jumlah'].") </a></li>";
									}
								?>
								</ul>
								<div class="tabs tabs-dark mb-4 pb-2">
									<ul class="nav nav-tabs">
										<li class="nav-item active"><a class="nav-link show active text-1 font-weight-bold text-uppercase" href="#popularPosts" data-toggle="tab">Populer</a></li>
										<li class="nav-item"><a class="nav-link text-1 font-weight-bold text-uppercase" href="#recentPosts" data-toggle="tab">Terbaru</a></li>
									</ul>
									<div class="tab-content">
										<div class="tab-pane active" id="popularPosts">
											<ul class="simple-post-list">
											<?php
												foreach($datapopuler->result_array() as $row){
													
											?>
										
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="<?php echo base_url("web/beritapost?ids=".$row['id_berita']."") ?>">
																<img src="<?php echo base_url() ?>assets/images/berita/thumb/<?php echo $row['foto'] ?>" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="<?php echo base_url("web/beritapost?ids=".$row['id_berita']."") ?>"> <?php echo $row['judul']; ?></a>
														<div class="post-meta" style="padding-left: 10px;">
															 <?php echo tanggal($row['tanggal']); ?>
														</div>
													</div>
												</li>

												<?php
												}
												?>
												
											</ul>
										</div>
										<div class="tab-pane" id="recentPosts">
											<ul class="simple-post-list">
											<?php
												foreach($datarecent->result_array() as $row){
											?>
												<li>
													<div class="post-image">
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<a href="<?php echo base_url("web/beritapost?ids=".$row['id_berita']."") ?>">
																<img src="<?php echo base_url() ?>assets/images/berita/thumb/<?php echo $row['foto'] ?>" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="<?php echo base_url("web/beritapost?ids=".$row['id_berita']."") ?>"> <?php echo $row['judul']; ?> </a>
														
														<div class="post-meta" style="padding-left: 10px;">
															 <?php echo tanggal($row['tanggal']); ?>
														</div>
													</div>
												</li>

												<?php
												}
												?>


											</ul>
										</div>
									</div>
								</div>
								<h5 class="font-weight-bold pt-4">Profil</h5>
								<p>Tugas pokok Dinas Perindustrian Provinsi Kalimantan Selatan sesuai Pergub no 072 Tahun 2016 adalah melaksanakan urusan pemerintahan yang menjadi kewenangan daerah dan tugas pembantuan bidang perindustrian. </p>
							</aside>
						</div>
					</div>

				</div>
				