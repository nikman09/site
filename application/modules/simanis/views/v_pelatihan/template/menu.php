<?php   

	$nama = $this->session->userdata("pelatihan_nama");

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

						<li class="<?= ($submenu == "pengumuman" || $submenu == "pengumumandetail" || $submenu == "informasi" || $submenu == "kontak" || $submenu == "faq") ? "active root-level" : ""; ?>" >

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

						<li class="<?= ($submenu == "biodata" || $submenu == "datausaha" || $submenu == "pendukung" ) ? "active root-level" : ""; ?>" >

							<a>

								<span>Formulir</span>

							</a>

							

							<ul>

							<li class="<?= ($submenu == "biodata") ? "active" : ""; ?>">

							<a href="<?php echo base_url() ?>simanis/biodata">

									<span>Biodata</span>

								</a>

							</li>

							<li class="<?= ($submenu == "datausaha") ? "active" : ""; ?>">

								<a href="<?php echo base_url() ?>simanis/perusahaan">

									<span>Data Usaha (SIIKALSEL)</span>

								</a>

							</li>

							<li  class="<?= ($submenu == "pendukung") ? "active" : ""; ?>">

								<a href="<?php echo base_url() ?>simanis/pendukung">

									<span>Data Pendukung</span>

								</a>

								</li>

								

							</ul>

						</li>

						

						<li class="<?= ($submenu == "status") ? "active root-level" : ""; ?>">

							<a href="<?php echo base_url() ?>simanis/status">

								<span>Status</span>

							</a>

						</li>

						<li>

							<a>

								<span><span class="fa fa-user"></span> <?php echo $nama ?></span>

							</a>

							

							<ul>

								

								<li>

									<a href="<?php echo base_url() ?>simanis/riwayat">

										<span>Riwayat Pendaftaran</span>

									</a>

								</li>

								<li>

									<a href="<?php echo base_url() ?>simanis/password">

										<span>Ganti Password</span>

									</a>

								</li>

								<li>

									<a href="<?php echo base_url() ?>simanis/logout">

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