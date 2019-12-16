<?php   
	$nama = $this->session->userdata("pelatihan_nama");
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
				<nav class="site-nav">
					
					<ul class="main-menu hidden-xs" id="main-menu">
						<li class="<?= ($submenu == "index") ? "active root-level" : ""; ?>">
							<a href="<?php echo base_url() ?>pelatihan">
								<span>Beranda</span>
							</a>
						</li>
						<li class="<?= ($submenu == "pengumuman" || $submenu == "pengumumandetail" || $submenu == "informasi") ? "active root-level" : ""; ?>" >
							<a>
								<span>Informasi</span>
							</a>
							
							<ul>
							<li class="<?= ($submenu == "informasi") ? "active root-level" : ""; ?>">
									<a href="<?php echo base_url() ?>pelatihan/informasi">
										<span>Informasi Pelatihan</span>
									</a>
								</li>
								<li class="<?= ($submenu == "pengumuman" || $submenu == "pengumumandetail") ? "active root-level" : ""; ?>">
								<a href="<?php echo base_url() ?>pelatihan/pengumuman">
									<span>Pengumuman</span>
								</a>
								</li>
								
							</ul>
						</li>
						
						<li class="<?= ($submenu == "status") ? "active root-level" : ""; ?>">
							<a href="<?php echo base_url() ?>pelatihan/status">
								<span>Status</span>
							</a>
						</li>
						<li>
							<a>
								<span><span class="fa fa-user"></span> <?php echo $nama ?></span>
							</a>
							
							<ul>
								<li>
									<a href="<?php echo base_url() ?>pelatihan/biodata">
										<span>Biodata</span>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() ?>pelatihan/riwayat">
										<span>Riwayat Pendaftaran</span>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() ?>pelatihan/password">
										<span>Ganti Password</span>
									</a>
								</li>
								<li>
									<a href="<?php echo base_url() ?>pelatihan/logout">
										<span>Logout</span>
									</a>
								</li>
							</ul>
						</li>
					</ul>
					
				
					<div class="visible-xs">
						
						<a href="#" class="menu-trigger">
							<i class="entypo-menu"></i>
						</a>
						
					</div>
				</nav>