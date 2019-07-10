<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
			<ul id="main-menu" class="main-menu">
				<!-- add class "multiple-expanded" to allow multiple submenus to open -->
				<!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
				
				<li  class="<?= ($submenu == "index") ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>kepegawaian">
						<i class="fa fa-home"></i>
						<span class="title">Beranda </span>
					</a>
				</li>
				<li  class="<?= ($submenu == "biodata" || $submenu == "biodataedit"  ) ? "active root-level" : ""; ?> ">
					<a href="<?php echo base_url() ?>kepegawaian/biodata">
						<i class="fa fa-user"></i>
						<span class="title">Biodata </span>
					</a>
				</li>
			
				<li class="<?= ($submenu == "berkas" || $submenu == "berkastambah"  ) ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-list"></i>
						<span class="title">Data Pegawai</span>
					</a>
					<ul>
						<li  class="<?= ($submenu == "berkas" || $submenu == "berkastambah" || $submenu == "berkasedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>kepegawaian/berkas">
								<span class="title">Berkas Pegawai</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "rpendidikan" || $submenu == "rpendidikantambah"  || $submenu == "rpendidikanedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>kepegawaian/riwayatpendidikan">
								<span class="title">Riwayat Pendidikan</span>
							</a>
						</li>
						
					</ul>
				</li>

				
				
			</ul>
	