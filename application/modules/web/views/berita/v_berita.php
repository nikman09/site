<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">
					<div class="container">
						<div class="row mt-5">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-9 font-weight-bold">Berita</h1>
								<span class="sub-title">Dinas Perindustrian</span>
							</div>
							<div class="col-md-12 align-self-center order-1">
								<ul class="breadcrumb breadcrumb-light d-block text-center">
									<li><a href="<?php echo base_url() ?>">Beranda</a></li>
									<li class="active">Berita</li>
								</ul>
							</div>
						</div>
					</div>
				</section>
			

				<div class="container py-4">

					<div class="row">
						<div class="col-lg-9">
							<div class="blog-posts">
							<?php
								foreach($data->result_array() as $row){
									
							?>
								<article class="post post-medium">
									<div class="row">

										<div class="col-lg-5">
											<div class="post-image">
												<div class="" >
													<div>
														<div class="img-thumbnail img-thumbnail-no-borders d-block">
															<img style="height:200px; width:350px;" class="img-fluid" src="<?php echo base_url() ?>assets/images/berita/thumb/<?php echo $row['foto'] ?>" alt="">
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-7">

											<div class="post-content">

												<h2><a href="blog-post.html"><?php  echo $row['judul']; ?></a></h2>
												<p> <?php echo substr($row['isi'] , 0, 200)?>  [...]</p>

											</div>
										</div>

									</div>
									<div class="row">
										<div class="col">
											<div class="post-meta">
												<span><i class="far fa-calendar-alt"></i><?php echo tgl_indo($row['tanggal']); ?> </span>
												<span><i class="far fa-user"></i> Oleh <a href="#"><?php echo $row['userinput']; ?></a> </span>
												<span><i class="far fa-folder"></i> <a href="#"><?php echo $row['kategori']; ?></a>,</span>
												<span class="d-block d-md-inline-block float-md-right mt-3 mt-md-0"><a href="blog-post.html" class="btn btn-xs btn-light text-1 text-uppercase">Baca Lebih Lanjut</a></span>
											</div>
										</div>
									</div>

								</article>
								<?php
									}
									?>
						
							
							<?php 
								echo $pagination;  
							  ?>

							
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
															<a href="blog-post.html">
																<img src="img/blog/square/blog-11.jpg" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html"> <?php echo $row['judul']; ?></a>
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
															<a href="blog-post.html">
																<img src="img/blog/square/blog-11.jpg" width="50" height="50" alt="">
															</a>
														</div>
													</div>
													<div class="post-info">
														<a href="blog-post.html"> <?php echo $row['judul']; ?></a>
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
				