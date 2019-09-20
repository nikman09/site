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

			<li  class="<?= ($submenu == "berita" || $submenu == "beritalihat"  || $submenu == "beritatambah" || $submenu == "beritaedit" || $submenu == "beritakategori" || $submenu == "beritakategori" ) ? "opened active root-level" : ""; ?> has-sub">
					<a href="">
						<i class="fa fa-newspaper-o"></i>
						<span class="title">Berita</span>
					</a>
					<ul>
						<li  class="<?= ($submenu == "berita" || $submenu == "beritalihat") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>admnistrator/berita">
								<span class="title">Daftar Berita</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "beritakategori" || $submenu == "beritakategoritambah") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>administrator/beritakategori">
								<span class="title">Kategori</span>
							</a>
						</li>
						
					</ul>
			</li>
			
		</ul>
	