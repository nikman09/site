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

		

			<li  class="<?= ($submenu == "halaman" || $submenu == "halamanlihat"  || $submenu == "halamantambah" || $submenu == "halamanedit" || $submenu == "dokumen" || $submenu == "dokumendetail") ? "opened active root-level" : ""; ?> has-sub">

					<a href="">

						<i class="fa fa-file-o"></i>

						<span class="title">Halaman</span>

					</a>

					<ul>

						<li  class="<?= ($submenu == "halaman" || $submenu == "halamanlihat" || $submenu == "halamantambah" || $submenu == "halamanedit") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/halaman">

								<span class="title">Laman</span>

							</a>

						</li>

						<li  class="<?= ($submenu == "dokumen" || $submenu == "dokumendetail") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/dokumen">

								<span class="title">Dokumen</span>

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

							<a href="<?php echo base_url() ?>administrator/berita">

								<span class="title">Berita</span>

							</a>

						</li>

						<li  class="<?= ($submenu == "beritakategori" || $submenu == "beritakategoritambah") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/beritakategori">

								<span class="title">Kategori</span>

							</a>

						</li>

						

					</ul>

			</li>

			<li  class="<?= ($submenu == "bidang" || $submenu == "bidanglihat"  || $submenu == "bidangtambah" || $submenu == "bidangedit" || $submenu == "kegiatan" || $submenu == "kegiatantambah"  || $submenu == "kegiatanedit" || $submenu == "kegiatankategori") ? "opened active root-level" : ""; ?> has-sub">

					<a href="">

						<i class="fa fa-history"></i>

						<span class="title">Bidang & Kegiatan</span>

					</a>

					<ul>

						<li  class="<?= ($submenu == "bidang" || $submenu == "bidangtambah" || $submenu == "bidangedit") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/bidang">

								<span class="title">Bidang</span>

							</a>

						</li>

						<li  class="<?= ($submenu == "kegiatan" || $submenu == "kegiatantambah" || $submenu == "kegiatanedit") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/kegiatan">

								<span class="title">Kegiatan</span>

							</a>

						</li>

						<li  class="<?= ($submenu == "kegiatankategori" || $submenu == "kegiatankategoritambah" || $submenu == "kegiatankategoriedit") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/kegiatankategori">

								<span class="title">Kategori</span>

							</a>

						</li>

						

					</ul>

			</li>

			<li  class="<?= ($submenu == "pesan" || $submenu == "pesanlihat"  || $submenu == "pesantambah" || $submenu == "pesanedit" ) ? "opened active root-level" : ""; ?> has-sub">

					<a href="">

						<i class="fa fa-envelope"></i>

						<span class="title">Kontak</span>

					</a>

					<ul>

						<li  class="<?= ($submenu == "pesan" || $submenu == "pesanlihat" || $submenu == "pesanedit") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/pesan">

								<span class="title">Pesan</span>

							</a>

						</li>
						<li  class="<?= ($submenu == "saran" || $submenu == "saranlihat" || $submenu == "saranedit") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/saran">

								<span class="title">Kritik & Saran</span>

							</a>

						</li>

					

						

					</ul>

			</li>

			<li  class="<?= ($submenu == "jadwal" || $submenu == "jadwaldetail") ? "active root-level" : ""; ?> ">

				<a href="<?php echo base_url() ?>administrator/jadwal">

					<i class="fa fa-calendar"></i>

					<span class="title">Jadwal </span>

				</a>

			</li>

			<li  class="<?= ($submenu == "navigasimenu"  || $submenu == "filemanager") ? "opened active root-level" : ""; ?> has-sub">

					<a href="">

						<i class="fa fa-star"></i>

						<span class="title">Extra</span>

					</a>

					<ul>

						<li  class="<?= ($submenu == "navigasimenu") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/navigasimenu">

								<span class="title">Navigasi</span>

							</a>

						</li>

						<li  class="<?= ($submenu == "filemanager") ? " active" : ""; ?>">

							<a href="<?php echo base_url() ?>administrator/filemanager">

								<span class="title">File Manager</span>

							</a>

						</li>

						

					</ul>

			</li>

			<li  class="<?= ($submenu == "admin" || $submenu == "adminlihat"  || $submenu == "admintambah" || $submenu == "adminedit") ? "active root-level" : ""; ?> ">

				<a href="<?php echo base_url() ?>administrator/admin">

					<i class="fa fa-users"></i>

					<span class="title">Admin </span>

				</a>

			</li>

			

			

		</ul>

	