<div role="main" class="main">
				<section class="page-header page-header-modern page-header-background page-header-background-md overlay overlay-color-dark overlay-show overlay-op-7" style="background-image: url(<?php echo base_url() ?>assets/front-end/web2/bahan/tes11.jpg);padding-top: 100px;padding-bottom: 100px;">
					<div class="container">
						<div class="row mt-5">
							<div class="col-md-12 align-self-center p-static order-2 text-center">
								<h1 class="text-9 font-weight-bold"><?php echo $data['judul'] ?></h1>
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
	<div class="col-lg-12">
		<div class="blog-posts  single-post">
		<article class="post post-large blog-single-post border-0 m-0 p-0">
<div class="post-image ml-0">
					<a href="<?php echo base_url("web/kegiatanpost?ids=".$data['id_kegiatan']."") ?>">
						<img src="<?php echo base_url(); ?>assets/images/kegiatan/<?php echo $data['fotos'] ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" alt="" width="100%"/>
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
						<span><i class="far fa-folder"></i> <a href="#"><?php echo $data['kategori'];?></a> </span>
						<span><i class="far fa-calendar"></i> <a href="#"><?=tanggal($data['tanggal']);?></a> </span>
					</div>

				<?php
					echo $data['isi'];
				?>
		
				</div>
			</article>
		
		</div>
	</div>
	</div>
	</div>

	</div>