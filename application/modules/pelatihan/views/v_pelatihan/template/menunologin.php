<?php
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
						<li class="<?= ($submenu == "informasi" || $submenu == "persyaratan") ? "active root-level" : ""; ?>">
							<a href="<?php echo base_url() ?>pelatihan/informasi">
								<span>Informasi Pelatihan</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "akun") ? "active root-level" : ""; ?>">
							<a href="<?php echo base_url() ?>pelatihan/akun">
								<span>Buat Akun</span>
							</a>
						</li>
						
						<li class="<?= ($submenu == "login") ? "active root-level" : ""; ?>">
							<a href="<?php echo base_url() ?>pelatihan/login">
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