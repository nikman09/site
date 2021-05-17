<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
		<ul id="main-menu" class="main-menu">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<li  class="<?= ($submenu == "index") ? "active root-level" : ""; ?> ">
				<a href="<?php echo base_url() ?>pelatihan/admin">
					<i class="fa fa-home"></i>
					<span class="title">Beranda </span>
				</a>
			</li>
			<li  class="<?= ($submenu == "seleksipendaftaran" || $submenu == ""  || $submenu == "" ) ? "active root-level" : ""; ?> ">
				<a href="<?php echo base_url() ?>pelatihan/admin/seleksipendaftaran">
					<i class="fa fa-trophy"></i>
					<span class="title">Seleksi Pendaftaran</span>
				</a>
			</li>
			<li  class="<?= ($submenu == "pelatihan" || $submenu == "pelatihantambah"  || $submenu == "pelatihanedit" ) ? "active root-level" : ""; ?> ">
				<a href="<?php echo base_url() ?>pelatihan/admin/pelatihan">
					<i class="fa fa-train"></i>
					<span class="title">Pelatihan</span>
				</a>
			</li>
			<li  class="<?= ($submenu == "pengumuman" || $submenu == "pengumumantambah"  || $submenu == "pengumumanedit" ) ? "active root-level" : ""; ?> ">
				<a href="<?php echo base_url() ?>pelatihan/admin/pengumuman">
					<i class="fa fa-info-circle"></i>
					<span class="title">Pengumuman</span>
				</a>
			</li>
			

		</ul>
	