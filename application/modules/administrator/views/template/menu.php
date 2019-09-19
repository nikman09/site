<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
		<ul id="main-menu" class="main-menu">
			<!-- add class "multiple-expanded" to allow multiple submenus to open -->
			<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
			<li  class="<?= ($submenu == "index") ? "active root-level" : ""; ?> ">
				<a href="<?php echo base_url() ?>administrator">
					<i class="fa fa-home"></i>
					<span class="title">Beranda </span>
				</a>
			</li>
			<li  class="<?= ($submenu == "berita" || $submenu == "beritalihat"  || $submenu == "beritatambah" || $submenu == "beritaedit") ? "active root-level" : ""; ?> ">
				<a href="<?php echo base_url() ?>administrator/berita">
					<i class="fa fa-newspaper-o"></i>
					<span class="title">Berita</span>
				</a>
			</li>
			
		</ul>
	