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
			
				<li class="<?= ($submenu == "ruangan" || $submenu == "ruanganedit"  || $submenu == "ruangantambah" || $submenu == "lemari" || $submenu == "lemaritambah"  || $submenu == "lemariedit"  || $submenu == "rak" || $submenu == "raktambah"  || $submenu == "rakedit" || $submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? "opened active root-level" : ""; ?> has-sub ">
					<a href="">
						<i class="fa fa-list"></i>
						<span class="title">Dokumen</span>
					</a>
					<ul>
						<li  class="<?= ($submenu == "cpns" || $submenu == "cpnsedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>kepegawaian/cpns">
								<span class="title">CPNS</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "lemari" || $submenu == "lemaritambah"  || $submenu == "lemariedit" || $submenu == "rak" || $submenu == "raktambah"  || $submenu == "rakedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/lemari">
								<span class="title">PNS</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Pangkat</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Jabatan</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Pendidikan</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">DIKLAT</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Keluarga</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Tanda Jasa</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Organisasi</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">KGB</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Cuti</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Hukuman</span>
							</a>
						</li>
						<li  class="<?= ($submenu == "tempatarsip" || $submenu == "tempatarsiptambah"  || $submenu == "tempatarsipedit") ? " active" : ""; ?>">
							<a href="<?php echo base_url() ?>Arsip/tempatarsip">
								<span class="title">Cetak</span>
							</a>
						</li>
					</ul>
				</li>

				
				
			</ul>
	