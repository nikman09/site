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
																<!-- <li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=4">Program, Kegiatan dan Anggaran</a></li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=5">Realisasi Fisik dan Keuangan</a>
																	<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=6">Tahun Anggaran 2019</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=5">Dokumen</a>
																	<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=4">RENSTRA</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=4">RENJA</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=4">Perjanjian Kinerja</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=4">IKU</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=4">SOP</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=4">RPIP</a></li>
																		<li class="dropdown-submenu">
																			<a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=5">RPIK</a>
																			<ul class="dropdown-menu">
																			<li><a class="dropdown-item" href="<?php echo base_url() ?>web/page?p=6">Kab/Kota</a></li>
																			</ul>
																		</li>
																	</ul>
																</li>
																
																
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Galeri</a>
																	<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="#">Foto</a></li>
																	<li><a class="dropdown-item" href="#">Video</a></li>
																	</ul>
																</li> -->
															</ul>
														</li>
													
														
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle  <?= ($submenu == "kegiatan") ? " active" : ""; ?>" href="<?php echo base_url(); ?>web/kegiatan/all">
																Kegiatan Bidang
															</a>
															<ul class="dropdown-menu">
															
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Sekretariat</a>
																	<ul class="dropdown-menu">
																	<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/bidang?p=1">Profil Sekretariat</a></li>
																<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/kegiatan/1">Kegiatan Sekretariat</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Bidang AGRO</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/bidang?p=5">Profil Bidang AGRO</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/kegiatan/5">Kegiatan Bidang AGRO</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Bidang ILMEAT</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/bidang?p=2">Profil Bidang ILMEAT</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/kegiatan/2">Kegiatan Bidang ILMEAT</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Bidang IKTA</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/bidang?p=4">Profil Bidang IKTA</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/kegiatan/4">Kegiatan Bidang IKTA</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">UPTBD Industri Kayu & Logam</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/bidang?p=6">Profil UPTBD Diklat Industri Kayu & Logam</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/kegiatan/6">Kegiatan UPTBD Diklat Industri Kayu & Logam</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Jadwal</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/jadwal?idx=4">Pelatihan</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/jadwal?idx=3">Pameran</a></li>
																		<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/jadwal?idx=5"> Dinas</a></li>
																	</ul>
																</li>
															</ul>
														</li>
														
														<li class="dropdown">
																	<a class="dropdown-item dropdown-toggle"  target="_blank" href="http://siikalsel.disperin.kalselprov.go.id/">SIIKALSEL</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" target="_blank" href="http://siikalsel.disperin.kalselprov.go.id/report/perusahaan">Data Perusahaan</a></li>
																		<li><a class="dropdown-item" target="_blank" href="http://siikalsel.disperin.kalselprov.go.id/report/sentra">Data Sentra</a></li>
																		<li><a class="dropdown-item" target="_blank" href="http://siikalsel.disperin.kalselprov.go.id/report/potensi">Data Potensi</a></li>
																	</ul>
														</li>

														<li class="dropdown">
																	<a class="dropdown-item dropdown-toggle"  target="_blank" href="<?php echo base_url() ?>kepegawaian">SIDAWAIPRIN</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item"  href="<?php echo base_url() ?>web/datapegawai">Data Pegawai</a></li>
																	</ul>
																</li>
														<!-- <li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Aplikasi
															</a>
															<ul class="dropdown-menu">
															<li class="dropdown-submenu">
																	<a class="dropdown-item"  target="_blank" href="http://siikalsel.disperin.kalselprov.go.id/">SIIKALSEL</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" target="_blank" href="http://siikalsel.disperin.kalselprov.go.id/report/perusahaan">Data Perusahaan</a></li>
																		<li><a class="dropdown-item" target="_blank" href="http://siikalsel.disperin.kalselprov.go.id/report/sentra">Data Sentra</a></li>
																		<li><a class="dropdown-item" target="_blank" href="http://siikalsel.disperin.kalselprov.go.id/report/potensi">Data Potensi</a></li>
																	</ul>
																</li>
																<li class="dropdown-submenu">
																	<a class="dropdown-item"  target="_blank" href="<?php echo base_url() ?>kepegawaian">SIDAWAIPRIN</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item"  href="<?php echo base_url() ?>web/datapegawai">Data Pegawai</a></li>
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
														</li> -->
														
														
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
															Informasi
															</a>
															<ul class="dropdown-menu">
															
																<li><a class="dropdown-item" href="<?php echo base_url(); ?>web/berita">Berita</a></li>
																<!-- <li><a class="dropdown-item" href="page-custom-header.html">Artikel</a></li>
																<li><a class="dropdown-item" href="page-custom-header.html">Jurnal</a></li>
																<li><a class="dropdown-item" href="page-custom-header.html">E-learning</a></li>
																<li><a class="dropdown-item" href="http://jdih.kemenperin.go.id/">Pengumuman</a></li> -->
																
															</ul>
														</li>
														<!-- <li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
															Industri
															</a>
															<ul class="dropdown-menu">
															
															<li class="dropdown-submenu">
																	<a class="dropdown-item" href="#">Kawasan Industri</a>
																	<ul class="dropdown-menu">
																		<li><a class="dropdown-item" href="shop-3-columns-sidebar-left.html">Kawasan Industri Batulicin</a></li>
		
																		<li><a class="dropdown-item" href="shop-3-columns-full-width.html">Kawasan Industri Jorong</a></li>
																		
																	</ul>
																</li>
																
																<li><a class="dropdown-item" href="page-custom-header.html">Sentra Industri </a></li>
															
															</ul>
														</li> -->
														<!-- <li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="#">
																Unduh
															</a>
															<ul class="dropdown-menu">
															<li><a class="dropdown-item" href="http://jdih.kemenperin.go.id/">Peraturan</a></li>
																<li><a class="dropdown-item" href="page-custom-header.html">Kebijakan</a></li>
																<li><a class="dropdown-item" href="page-custom-header.html">Lainnya</a></li>
																
															</ul>
														</li> -->
														<li class="dropdown">
															<a class="dropdown-item dropdown-toggle" href="<?php echo base_url() ?>web/kontak">
															Kontak Kami
															</a>
															<!-- <ul class="dropdown-menu">
															
																<li><a class="dropdown-item" href="page-custom-header.html">Kritik & Saran</a></li>
																
																<li><a class="dropdown-item" href="page-custom-header.html">Pertanyaan Terbanyak (FAQ) </a></li>
																<li><a class="dropdown-item" href="page-custom-header.html">Pojok Konsultasi</a></li>
																<li><a class="dropdown-item" href="page-custom-header.html">Survei Pengunjung</a></li>
																
															</ul> -->
														</li>
														
													
															
															
															
													</ul>
											