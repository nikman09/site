
<!-- Footer START -->
<footer>
  <div class="container">
    <div class="row">
      <!-- Column 1 Start -->
      <div class="col-md-4 col-sm-6 col-12">
        <h3>Kontak</h3>
        <div class="mt-25">
          <img src="<?php echo base_url() ?>assets/front-end/web3/img/logos/gol.png" alt="footer-logo">
          <p class="mt-25">Jl. Dharma Praja Komplek Perkantoran Provinsi Kalimantan Selatan

Banjarbaru.</p></li>
									<li class="mb-1"><i class="fa fa-whatsapp"></i><a href="tel:05115915906" style="color:#eaeaea !important; font-size:12px"> &nbsp (0511) 5915906</a></li>
									<li class="mb-1"><i class="fa fa-envelope"></i><a href="mailto:disperin.kalselprov@gmail.com" style="color:#eaeaea !important; font-size:12px"> &nbsp disperin.kalselprov@gmail.com</a></li>
        </div>
      </div>
      <!-- Column 1 End -->

      <!-- Column 2 Start -->
      <div class="col-md-3 col-sm-6 col-12">
        <h3>Tautan</h3>
        <ul class="footer-list">
          <li><a href="http://www.kalselprov.go.id/">Pemerintah Provinsi Kalsel</a></li>
          <li><a href="https://kemenperin.go.id/">Kementerian Perindustrian RI</a></li>
         
        </ul>
      </div>
      <!-- Column 2 End -->

      <!-- Column 3 Start -->
      <div class="col-md-3 col-sm-6 col-12">
        <h3>Berita Terkini</h3>
        <div class="mt-25">
          <!-- Post Start -->

          <?php

					$beritaterkini = $this->m_berita->lihatdata2(3, 0); 
					foreach($beritaterkini->result_array() as $row){
								?>

              <div class="footer-recent-post clearfix">
                          <div class="footer-recent-post-thumb">
                            <img src="<?php echo base_url() ?>assets/images/berita/thumb/<?php echo $row['foto'] ?>" alt="img">
                          </div>
                          <div class="footer-recent-post-content">
                            <span>	<?php echo  tgl_indo($row['tanggal']); ?></span>
                            <a href="<?php echo base_url("web/beritapost?ids=".$row['id_berita']."") ?>"><?php echo  $row['judul'] ?></a>
                          </div>
                        </div>
							<?php
										}
											?>	
								

         
        </div>
      </div>
      <!-- Column 3 End -->

      <!-- Column 4 Start -->
      <div class="col-md-2 col-sm-6 col-12">
        <h3>UPT</h3>
        <ul class="footer-list">
          <li><a href="#">UPT Balai Diklat Kayu & Logam</a></li>
         
        </ul>
      </div>
      <!-- Column 4 End -->
    </div>

    <!-- Footer Bar Start -->
    <div class="footer-bar">
      <p><span class="primary-color">DISPERIN</span> © <?= date("Y") ?>. All Rights Reserved.</p>
    </div>
    <!-- Footer Bar End -->
  </div>
</footer>
<!-- Footer END -->

<!-- Scroll to top button Start -->
<a href="#" class="scroll-to-top"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
<!-- Scroll to top button End -->


<!-- Jquery -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/jquery.min.js"></script>

<!--Popper JS-->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/popper.min.js"></script>

<!--Popper JS-->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/popper.min.js"></script>

<!-- Bootstrap JS-->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/bootstrap.min.js"></script>

<!-- Owl Carousel-->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/owl.carousel.js"></script>

<!-- Navbar JS -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/navigation.js"></script>
<script src="<?php echo base_url() ?>assets/front-end/web3/js/navigation.fixed.js"></script>

<!-- Wow JS -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/wow.min.js"></script>

<!-- Countup -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/jquery.counterup.min.js"></script>
<script src="<?php echo base_url() ?>assets/front-end/web3/js/waypoints.min.js"></script>

<!-- Tabs -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/tabs.min.js"></script>

<!-- Yotube Video Player -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/jquery.mb.YTPlayer.min.js"></script>

<!-- Swiper Slider -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/swiper.min.js"></script>

<!-- Isotop -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/isotope.pkgd.min.js"></script>

<!-- Switcher JS -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/switcher.js"></script>

<!-- Modernizr -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/modernizr.js"></script>

<!-- Google Map -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/map.js"></script>

<!-- Main JS -->
<script src="<?php echo base_url() ?>assets/front-end/web3/js/main.js"></script>
