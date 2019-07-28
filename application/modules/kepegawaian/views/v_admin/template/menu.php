<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
		<ul id="main-menu" class="main-menu">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<li  class="<?= ($submenu == "index") ? "active root-level" : ""; ?> ">
				<a href="<?php echo base_url() ?>kepegawaian/admin">
					<i class="fa fa-home"></i>
					<span class="title">Beranda </span>
				</a>
			</li>
			<li  class="<?= ($submenu == "pegawai" || $submenu == "pegawailihat"  || $submenu == "pegawaitambah" || $submenu == "pegawaiedit" || $submenu == "berkas" || $submenu == "riwayatpendidikan" ) ? "active root-level" : ""; ?> ">
				<a href="<?php echo base_url() ?>kepegawaian/admin/pegawai">
					<i class="fa fa-users"></i>
					<span class="title">Data Pegawai</span>
				</a>
			</li>
			<li class="<?= ($submenu == "jabatan" || $submenu == "rincian"  ) ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-list"></i>
						<span class="title">Master Data</span>
					</a>
					<ul>
						<li  class="<?= ($submenu == "jabatan" || $submenu == "rincian") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>kepegawaian/admin/jabatan">
								<span class="title">Jabatan</span>
							</a>
						</li>
						
					</ul>
				</li>

				<li  class="<?= ($submenu == "tentang") ? "active root-level" : ""; ?> ">
				<a href="<?php echo base_url() ?>kepegawaian/admin/tentang">
					<i class="fa fa-info-circle"></i>
					<span class="title">Tentang</span>
				</a>
			</li>

		</ul>
	