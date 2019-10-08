<?php
	$menu = $this->router->fetch_class();
	$submenu = $this->router->fetch_method();
?>
	<ul class="nav nav-pills" id="mainNav">
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle <?= ($submenu == "index") ? " active" : ""; ?>" href="<?php echo base_url() ?>">
																<i class="fa fa-home"></i>
															</a>
														</li>
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle  <?= ($submenu == "page") ? " active" : ""; ?>" href="<?php echo base_url() ?>web/page?p=1">
																Profil
															</a>
															<ul class="dropdown-menu">
																
																<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=7">Visi dan Misi</a></li>
																<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=2">Tugas dan Fungsi</a></li>
																<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=3">Struktur Organisasi</a></li>
																<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=4">Program Kegiatan & Anggaran</a></li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=5">Realisasi Fisik dan Anggaran</a>
																	<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=6">DPA Tahun 2019</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Galeri</a>
																	<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="#">Foto</a></li>
																	<li><a class="dropdown-item" href="#">Video</a></li>
																	</ul>
																</li>
															</ul>
														</li>
													
														
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Bidang & Kegiatan
															</a>
															<ul class="dropdown-menu">
															<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Sekretariat</a>
																	<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="#">Tugas Sekretariat</a></li>
																<li><a class="dropdown-item" href="#">Kegiatan Sekretariat</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Bidang AGRO</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="#">Tugas Bidang AGRO</a></li>
																		<li><a class="dropdown-item" href="#">Kegiatan Bidang AGRO</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Bidang ILMEAT</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="#">Tugas Bidang ILMEAT</a></li>
																		<li><a class="dropdown-item" href="#">Kegiatan Bidang ILMEAT</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Bidang IKTA</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="#">Tugas Bidang IKTA</a></li>
																		<li><a class="dropdown-item" href="#">Kegiatan Bidang IKTA</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">UPTBD Industri Kayu & Logam</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="#">Tugas UPTBD Diklat Industri Kayu & Logam</a></li>
																		<li><a class="dropdown-item" href="#">Kegiatan UPTBD Diklat Industri Kayu & Logam</a></li>
																	</ul>
																</li>
																
															</ul>
														</li>
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Jadwal
															</a>
															<ul class="dropdown-menu">
																
																<li><a class="dropdown-item" href="#">Pelatihan</a></li>
																<li><a class="dropdown-item" href="#">Pameran</a></li>
																<li><a class="dropdown-item" href="#">Agenda Dinas</a></li>
																
															</ul>
														</li>
														
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																SI
															</a>
															<ul class="dropdown-menu">
															<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">SIIKALSEL</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="shop-3-columns-full-width.html">Data Perusahaan</a></li>
																		<li><a class="dropdown-item" href="shop-3-columns-sidebar-left.html">Data Sentra</a></li>
																		<li><a class="dropdown-item" href="shop-3-columns-sidebar-left.html">Data Potensi</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">SIDAWAIPRIN</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="shop-3-columns-full-width.html">Data Pegawai</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Web</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="shop-3-columns-full-width.html">Klinik IKM</a></li>
																		<li><a class="dropdown-item" href="shop-3-columns-sidebar-left.html">Dekranasda</a></li>
																		<li><a class="dropdown-item" href="shop-3-columns-sidebar-left.html">Promosi Produk IKM</a></li>
																	</ul>
																</li>
																
															</ul>
														</li>
														
														
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Berita
															</a>
														</li>
														
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Unduh
															</a>
															<ul class="dropdown-menu">
																
																<li><a class="dropdown-item" href="page-custom-header.html">Kebijakan</a></li>
																<li><a class="dropdown-item" href="page-custom-header.html">Lainnya</a></li>
																
															</ul>
														</li>
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Kontak
															</a>
														</li>
													
															
															
															
													</ul>
											