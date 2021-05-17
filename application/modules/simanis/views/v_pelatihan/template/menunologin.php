<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
				<nav class="site-nav">
					
					<ul class="main-menu hidden-xs" id="main-menu">
						<li class="<?= ($submenu == "index") ? "active root-level" : ""; ?>">
							<a href="<?php echo base_url() ?>simanis">
								<span>Beranda</span>
							</a>
						</li>
						<li class="<?= ($submenu == "pengumuman" || $submenu == "pengumumandetail" || $submenu == "informasi"  || $submenu == "faq") ? "active root-level" : ""; ?>" >
							<a>
								<span>Informasi</span>
							</a>
							
							<ul>
							<li class="<?= ($submenu == "informasi") ? "active root-level" : ""; ?>">
									<a href="<?php echo base_url() ?>simanis/informasi">
										<span>Informasi Pelatihan</span>
									</a>
								</li>
								<li class="<?= ($submenu == "pengumuman" || $submenu == "pengumumandetail") ? "active root-level" : ""; ?>">
								<a href="<?php echo base_url() ?>simanis/pengumuman">
									<span>Pengumuman</span>
								</a>
								</li>
								<li class="<?= ($submenu == "kontak") ? "active root-level" : ""; ?>">
								<a href="<?php echo base_url() ?>simanis/kontak">
									<span>Kontak</span>
								</a>
								</li>
								<li class="<?= ($submenu == "faq") ? "active root-level" : ""; ?>">
								<a href="<?php echo base_url() ?>simanis/faq">
									<span>FAQ</span>
								</a>
								</li>
								
							</ul>
						</li>
						<li  class="<?= ($submenu == "akun") ? "active root-level" : ""; ?>">
							<a href="<?php echo base_url() ?>simanis/akun">
								<span>Buat Akun</span>
							</a>
						</li>
						
						<li class="<?= ($submenu == "login") ? "active root-level" : ""; ?>">
							<a href="<?php echo base_url() ?>simanis/login">
								<span>Login</span>
							</a>
						</li>
					</ul>
					<div class="visible-xs">
						
						<a href="#" class="menu-trigger">
							<i class="entypo-menu"></i>
						</a>
						
					</div>
				</nav>