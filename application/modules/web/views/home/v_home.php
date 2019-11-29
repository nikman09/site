<!DOCTYPE html>
<html lang="zxx">
<head>
  <title>Dinas Perindustrian</title>
  <meta charset="UTF-8">
  
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-180x180.png">
		<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon/favicon-32x32.png" type="image/x-icon" />
 		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url() ?>assets/images/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/images/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/images/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon/favicon-16x16.png">
		<link rel="manifest" href="<?php echo base_url() ?>assets/images/favicon/manifest.json">
	

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/front-end/web3/css/bootstrap.min.css">

  <!-- Font-Awesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/front-end/web3/css/font-awesome.css">

  <!-- Icomoon -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/front-end/web3/css/icomoon.css">

  <!-- Slider -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/front-end/web3/css/swiper.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/front-end/web3/css/slider.css">

  <!-- Animate.css -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/web3/css/animate.css">

  <!-- Color Switcher -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/front-end/web3/css/switcher.css">

  <!-- Owl Carousel  -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/web3/css/owl.carousel.css">

  <!-- Main Styles -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/front-end/web3/css/default.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/front-end/web3/css/styles.css" id="colors">

  <!-- Fonts Google -->
  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

</head>
<body>


<!-- Preloader Start-->
<div id="preloader">
  <div class="row loader">
    <div class="loader-icon"></div>
  </div>
</div>
<!-- Preloader End -->


<!-- Top-Bar START -->
<div id="top-bar" class="hidden-sm-down">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-12">
        <div class="top-bar-welcome">
          <ul>
            <li>Informasi & Pertanyaan? </li>
          </ul>
        </div>
        <div class="top-bar-info">
          <ul>
            <li><i class="fa fa-phone"></i> (0511) 5915906
            <li>
            <li><i class="fa fa-envelope"></i>dinasperindustrian@kalselprov.go.id
            <li>
          </ul>
        </div>
      </div>
      <div class="col-md-3 col-12">
        <ul class="social-icons hidden-md-down">
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-instagram"></i></a></li>
          <li><a href="#"><i class="fa fa-youtube"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- Top-Bar END -->

<?php
  function get_ol($array, $child = FALSE)
  {
      $str = '';
      
      if(count($array)){
          $str .= $child == FALSE ? '<li><a href="#">Home</a></li>' :'';
          foreach($array as $item){
              $str .= '<li>';
              $str .= '<a  href="#">'. $item['judul'] .'</a> ';
              

              if(isset($item['children']) && count($item['children'])){
                  $str .= ' <ul class="nav-dropdown">';
                  $str .= get_ol($item['children'], TRUE);
                  $str .= ' </ul>';
              }
              
              $str .= '</li>' . PHP_EOL;
          }
          
      }else{
          $str .= $child == FALSE ? '<li><a href="#">Home</a></li>' :'';
    
      }
      
      return $str;
  }
  
  ?>


<!-- Navbar START -->
<header>
  <nav id="navigation4" class="container navigation">
    <div class="nav-header">
      <a class="nav-brand" href="index.html">
        <img src="<?php echo base_url() ?>assets/front-end/web3/img/logos/go.png" class="main-logo" alt="logo" id="main_logo" width="250px">
      </a>
      <div class="nav-toggle"></div>
    </div>
    <div class="nav-menus-wrapper">
      <ul class="nav-menu align-to-right">
       <?php echo get_ol($page); ?> 
       <li><a href="#">About</a>
          <ul class="nav-dropdown">
            <li><a href="about.html">About Us 01</a></li>
            <li><a href="about-2.html">About Us 02</a></li>
            <li><a href="team.html">Our Team 01</a></li>
            <li><a href="team-2.html">Our Team 02</a></li>
            <li><a href="team-3.html">Our Team 03</a></li>
            </ul>
          </li>
      </ul>
    </div>
  </nav>
</header>
<!-- Navbar END -->


<!-- Slider START -->
<div class="swiper-main-slider-fade swiper-container">
  <div class="swiper-wrapper">

    <!-- Slide 1 Start -->
    <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>assets/front-end/web3/img/11.jpg);">
      <!-- <div class="medium-overlay"></div> -->
      <div class="container">
        <div class="slider-content left-holder">
          <h2 class="animated fadeInDown">
           Industri Kain <br> Sasirangan.
          </h2>
          <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
              <p class="animated fadeInDown">
                Kain (Batik) Sasirangan yang merupakan kain tradisional khas suku Banjar
              </p>
            </div>
          </div>
          <!-- <div class="animated fadeInUp mt-30">
            <a href="#contact" class="dark-button button-md">Contact us</a>
          </div> -->
        </div>
      </div>
    </div>
    <!-- Slide 1 End -->

    <!-- Slide 2 Start -->
    <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>assets/front-end/web3/img/23.jpg);">
      <div class="container">
        <div class="slider-content left-holder">
          <h2 class="animated fadeInDown">
            Industri Kecil Menengah <br> (IKM)
          </h2>
          <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
              <p class="animated fadeInDown">
             Dinas Perindustrian sebagai fasilitator  Pengembangan Industri Kecil Menengah  di Kalimantan Selatan
              </p>
            </div>
          </div>
          <!-- <div class="animated fadeInUp mt-25">
            <a href="#contact" class="dark-button button-md">Contact us</a>
          </div> -->
        </div>
      </div>
    </div>
    <!-- Slide 2 End -->

    <!-- Slide 3 Start -->
    <div class="swiper-slide" style="background-image:url(<?php echo base_url() ?>assets/front-end/web3/img/121.jpg);">
      <div class="container">
        <div class="slider-content left-holder">
          <h2 class="animated fadeInDown">
            Kawasan Industri
          </h2>
          <div class="row">
            <div class="col-md-6 col-sm-12 col-12">
              <p class="animated fadeInDown">
                Kawasan Industri Batu Licin dan Jorong.
              </p>
            </div>
          </div>
          <!-- <div class="animated fadeInUp mt-30">
            <a href="#contact" class="dark-button button-md">Contact us</a>
          </div> -->
        </div>
      </div>
    </div>
    <!-- Slide 3 End -->

  </div>
  <!-- Add Arrows -->
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <!-- Add Pagination -->
  <div class="swiper-pagination"></div>
</div>
<!-- Slider END -->

<!-- Number Boxes START -->
<div class="section-block" style="padding-top:50px;padding-bottom:10px">
  <div class="container">
    <div class="section-heading center-holder">
      <h4 style="margin-bottom:0px">Berita Terbaru</h4>
      <div style="margin-top:0px" class="section-heading-line"></div>
      <p style="padding-top:0px">Tetap terhubung dengan berita dan informasi terbaru tentang Industri Kalimantan Selatan.</p>
    </div>
    <!-- <div class="row mt-50">
      <div class="col-md-3 col-sm-6 col-12">
        <div class="number-box">
          <h3>01</h3>
          <div class="number-box-line"></div>
          <h4>Professional Consulting</h4>
          <p>Lorem ipsum dolor sit amet, te ridens gloriatur temporibus per enim veritus.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="number-box">
          <h3>02</h3>
          <div class="number-box-line"></div>
          <h4>Online Reputation</h4>
          <p>Lorem ipsum dolor sit amet, te ridens gloriatur temporibus per enim veritus.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="number-box">
          <h3>03</h3>
          <div class="number-box-line"></div>
          <h4>Market Research</h4>
          <p>Lorem ipsum dolor sit amet, te ridens gloriatur temporibus per enim veritus.</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-12">
        <div class="number-box">
          <h3>04</h3>
          <div class="number-box-line"></div>
          <h4>Budget Friendly</h4>
          <p>Lorem ipsum dolor sit amet, te ridens gloriatur temporibus per enim veritus.</p>
        </div>
      </div>
    </div> -->
  </div>
</div>
<!-- Number Boxes END -->


<div class="section-block-grey" style="padding-top:0px;padding-bottom:0px">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 col-12">
        <div class="blog-grid">
          <div class="blog-grid-img">
            <img src="http://via.placeholder.com/250x220" alt="img">
            <div class="data-box-grid">
              <h4>07</h4>
              <p>Feb</p>
            </div>
          </div>
          <div class="blog-grid-text">
            <span>Business</span>
            <h4>Advices for young designers</h4>
            <ul>
              <li><i class="fa fa-calendar"></i>Feb 19, 2018</li>
              <li><i class="fa fa-list-ul"></i>Business</li>
            </ul>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>

            <div class="mt-20 left-holder">
              <a href="#" class="primary-button button-sm">Read More</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-4 col-12">
        <div class="blog-grid">
          <div class="blog-grid-img">
            <img src="http://via.placeholder.com/250x220" alt="img">
            <div class="data-box-grid">
              <h4>08</h4>
              <p>Feb</p>
            </div>
          </div>
          <div class="blog-grid-text">
            <span>Finance</span>
            <h4>What Planning Process Needs?</h4>
            <ul>
              <li><i class="fa fa-calendar"></i>Feb 19, 2018</li>
              <li><i class="fa fa-list-ul"></i>Finance</li>
            </ul>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>

            <div class="mt-20 left-holder">
              <a href="#" class="primary-button button-sm">Read More</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-4 col-12">
        <div class="blog-grid">
          <div class="blog-grid-img">
            <img src="http://via.placeholder.com/250x220" alt="img">
            <div class="data-box-grid">
              <h4>09</h4>
              <p>Feb</p>
            </div>
          </div>
          <div class="blog-grid-text">
            <span>Consulting</span>
            <h4>Leverage Customer Analytics</h4>
            <ul>
              <li><i class="fa fa-calendar"></i>Feb 19, 2018</li>
              <li><i class="fa fa-list-ul"></i>Consulting</li>
            </ul>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>

            <div class="mt-20 left-holder">
              <a href="#" class="primary-button button-sm">Read More</a>
            </div>
          </div>
        </div>
      </div>

      
	</div>
	</div>
</div>

<!-- Info Section START -->
<div class="section-block-grey">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-12">
        <div class="pr-30-md">
          <div class="section-heading">
            <h4>Profil Dinas Perindustrian</h4>
          </div>
          <div class="section-heading-line-left"></div>
          <div class="text-content-big mt-20">
			<p>
			Dinas Perindustrian Provinsi Kalimantan Selatan beralamat di Jl. Dharma Praja Komplek Perkantoran Provinsi Kalimantan Selatan, Banjarbaru. Dinas Perindustrian Provinsi Kalimantan Selatan memiliki 1 Unit Pelaksana Teknis (UPT), yaitu UPT Balai Diklat Industri Kayu & Logam yang beralamatkan di Amuntai & Nagara.
			</p>
          </div>
		  <div class="mt-20">
            <p>Tugas pokok Dinas Perindustrian Provinsi Kalimantan Selatan sesuai Pergub no 072 Tahun 2016 adalah melaksanakan urusan pemerintahan yang menjadi kewenangan daerah dan tugas pembantuan bidang perindustrian.</p>
			
          </div>
         
          <div class="mt-25">
            <a href="#" class="primary-button button-sm mb-15-xs">Tugas & Fungsi</a>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-12">
	  <iframe width="100%" height="305" src="https://www.youtube.com/embed/1p_UBv8igEE" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"class="rounded-border shadow-primary"  allowfullscreen></iframe>
							
     </div>
    </div>
  </div>
</div>
<!-- Info Section END -->


<!-- Services START -->
<div class="section-block">
  <div class="container">
    <div class="section-heading center-holder">
      <span>What We Offer</span>
      <h3>We Provide All Kind Of Business Services</h3>
      <div class="section-heading-line"></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="row mt-50">
      <div class="col-md-3 col-sm-3 col-12">
        <div class="service-simple">
          <img src="http://via.placeholder.com/350x245" alt="img">
          <div class="service-simple-inner">
            <h4>Professional Advisor</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            <div class="service-simple-button">
              <a href="#">Learn More</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-3 col-12">
        <div class="service-simple">
          <img src="http://via.placeholder.com/350x245" alt="img">
          <div class="service-simple-inner">
            <h4>Financial Services Consulting</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            <div class="service-simple-button">
              <a href="#">Learn More</a>
            </div>
          </div>
        </div>
      </div>
	  <div class="col-md-3 col-sm-3 col-12">
        <div class="service-simple">
          <img src="http://via.placeholder.com/350x245" alt="img">
          <div class="service-simple-inner">
            <h4>Financial Services Consulting</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            <div class="service-simple-button">
              <a href="#">Learn More</a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-3 col-sm-3 col-12">
        <div class="service-simple">
          <img src="http://via.placeholder.com/350x245" alt="img">
          <div class="service-simple-inner">
            <h4>Consumer Product Consulting</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
            <div class="service-simple-button">
              <a href="#">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Services END -->


<!-- Background Section START -->
<div class="section-block-bg" style="background-image: url(http://via.placeholder.com/1730x400);">
  <div class="container">
    <div class="section-heading center-holder white-color">
      <span>Gain a Success With Us!</span>
      <h2><strong>Doing the right thing</strong></h2>
      <h4>At the Right Time.</h4>
      <a href="#" class="primary-button button-md mt-10">Become a Client</a>
    </div>
  </div>
</div>
<!-- Background Section END -->


<!-- Clients Carousel START -->
<div class="section-clients-grey">
  <div class="container">
    <div class="owl-carousel owl-theme clients" id="clients">
      <div class="item">
        <img src="http://via.placeholder.com/155x75" alt="partner-image">
      </div>

      <div class="item">
        <img src="http://via.placeholder.com/155x75" alt="partner-image">
      </div>

      <div class="item">
        <img src="http://via.placeholder.com/155x75" alt="partner-image">
      </div>

      <div class="item">
        <img src="http://via.placeholder.com/155x75" alt="partner-image">
      </div>

      <div class="item">
        <img src="http://via.placeholder.com/155x75" alt="partner-image">
      </div>

      <div class="item">
        <img src="http://via.placeholder.com/155x75" alt="partner-image">
      </div>
    </div>
  </div>
</div>
<!-- Clients Carousel END -->


<!-- Map Info Section START -->
<div class="section-block">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-12">
        <img src="http://via.placeholder.com/540x270" class="mb-15-xs" alt="map">
      </div>
      <div class="col-md-5 col-sm-6 col-12 offset-md-1">
        <div class="section-heading">
          <h5>We are Available Worldwide</h5>
          <div class="section-heading-line-left"></div>
        </div>
        <div class="text-content mt-25">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="mt-25">
          <a href="#" class="primary-button button-sm">Contact Us</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Map Info Section END -->


<!-- Testmonials START -->
<div class="section-block-bg" style="background-image: url(http://via.placeholder.com/1730x630);">
  <div class="container">
    <div class="section-heading center-holder">
      <span>Testmonials</span>
      <h3>What People Say</h3>
      <div class="section-heading-line"></div>
    </div>
    <div class="owl-carousel owl-theme" id="testmonials-carousel">
      <div class="testmonial-single">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <h4>John Doe</h4>
        <h6>Consultant</h6>
      </div>

      <div class="testmonial-single">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <h4>Mary Kay</h4>
        <h6>Design Lead</h6>
      </div>

      <div class="testmonial-single">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <h4>Jakob Nielsen</h4>
        <h6>Networking Lead</h6>
      </div>
    </div>
  </div>
</div>
<!-- Testmonials END -->


<!-- Pricing Section START -->
<div class="section-block">
  <div class="container">
    <div class="section-heading center-holder">
      <span>Our Packages</span>
      <h3>Pick The Best Plan For You</h3>
      <div class="section-heading-line"></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor <br>incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="row mt-50">
      <div class="col-md-4 col-sm-4 col-12">
        <div class="pricing-list">
          <h4>Classic</h4>
          <div class="pricing-list-price">
            <h2><sup>$</sup>37</h2>
            <span>/week</span>
          </div>
          <ul>
            <li>Express, Support</li>
            <li>Business Analyzing</li>
            <li>Swift Management</li>
          </ul>
          <div class="pricing-list-button">
            <a href="#">Buy Now</a>
          </div>
        </div>
      </div>


      <div class="col-md-4 col-sm-4 col-12">
        <div class="pricing-list">
          <strong>New</strong>
          <h4>Popular</h4>
          <div class="pricing-list-price">
            <h2><sup>$</sup>79</h2>
            <span>/month</span>
          </div>
          <ul>
            <li>Express, Support</li>
            <li>Business Analyzing</li>
            <li>Swift Management</li>
          </ul>
          <div class="pricing-list-button">
            <a href="#">Buy Now</a>
          </div>
        </div>
      </div>


      <div class="col-md-4 col-sm-4 col-12">
        <div class="pricing-list">
          <h4>Premium</h4>
          <div class="pricing-list-price">
            <h2><sup>$</sup>99</h2>
            <span>/month</span>
          </div>
          <ul>
            <li>Express, Support</li>
            <li>Business Analyzing</li>
            <li>Swift Management</li>
          </ul>
          <div class="pricing-list-button">
            <a href="#">Buy Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Pricing Section END -->


<!-- Newsletter START -->
<div class="section-block-parallax" style="background-image: url(http://via.placeholder.com/1730x6400);">
  <div class="container">
    <div class="section-heading center-holder white-color">
      <h2>Stay <strong>informed</strong></h2>
      <div class="section-heading-line"></div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor<br> incididunt ut labore et dolore magna aliqua.</p>
    </div>
    <div class="mt-30 center-holder">
      <!-- Newsletter Form START -->
      <form class="newsletter-form" method="post" action="#">
        <input type="email" name="email" placeholder="Enter Your Email adress">
        <button type="submit">Subscribe</button>
      </form>
      <!-- Newsletter Form END -->
    </div>
  </div>
</div>
<!-- Newsletter END -->


<!-- Progress Bars Section START -->
<div class="section-block">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 col-12">
        <div class="section-heading">
          <span>Our mission</span>
          <h4>Our Mission is to Turn Your Ideas Into Businesses.</h4>
        </div>
        <div class="text-content">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
      </div>

      <div class="col-md-5 col-sm-6 col-12 offset-md-1">
        <!-- PROGRESS BARS Start -->
        <div class="mt-35">
          <!-- Progress Bar Start -->
          <div class="progress-text">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-6">
                Market Research
              </div>
              <div class="col-md-6 col-sm-6 col-6 text-right">
                10%
              </div>
            </div>
          </div>
          <div class="progress custom-progress">
            <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"
                 style="width:10%">
            </div>
          </div>
          <!-- Progress Bar End -->

          <!-- Progress Bar Start -->
          <div class="progress-text">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-6">
                Sales Services
              </div>
              <div class="col-md-6 col-sm-6 col-6 text-right">
                25%
              </div>
            </div>
          </div>
          <div class="progress custom-progress">
            <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                 style="width:25%">
            </div>
          </div>
          <!-- Progress Bar End -->

          <!-- Progress Bar Start -->
          <div class="progress-text">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-6">
                Online Reputation
              </div>
              <div class="col-md-6 col-sm-6 col-6 text-right">
                50%
              </div>
            </div>
          </div>
          <div class="progress custom-progress">
            <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                 style="width:50%">
            </div>
          </div>
          <!-- Progress Bar End -->

          <!-- Progress Bar Start -->
          <div class="progress-text">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-6">
                Strategic Consulting
              </div>
              <div class="col-md-6 col-sm-6 col-6 text-right">
                75%
              </div>
            </div>
          </div>
          <div class="progress custom-progress">
            <div class="progress-bar custom-bar wow slideInLeft animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                 style="width:75%">
            </div>
          </div>
          <!-- Progress Bar End -->
        </div>
        <!-- PROGRESS BARS End -->
      </div>
    </div>
  </div>
</div>
<!-- Progress Bars Section END -->


<!-- Cases START -->
<div class="section-block-grey border-top">
  <div class="container">
    <div class="section-heading">
      <h5>Featured Cases</h5>
      <div class="section-heading-line-left"></div>
    </div>
    <div class="row mt-40">
      <!-- Project Block Start -->
      <div class="col-md-6 col-sm-12 col-12">
        <div class="case-block">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-12 pr-0">
              <img src="http://via.placeholder.com/270x215" alt="case">
            </div>
            <div class="col-md-6 col-sm-6 col-12">
              <div class="case-block-inner">
                <h4>Social Media Marketting</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <a href="#">Learn More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Project Block End -->

      <!-- Project Block Start -->
      <div class="col-md-6 col-sm-12 col-12">
        <div class="case-block">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-12 pr-0">
              <img src="http://via.placeholder.com/270x215" alt="case">
            </div>
            <div class="col-md-6 col-sm-6 col-12">
              <div class="case-block-inner">
                <h4>Sensitivity Analysis</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <a href="#">Learn More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Project Block End -->

      <!-- Project Block Start -->
      <div class="col-md-6 col-sm-12 col-12">
        <div class="case-block">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-12 pr-0">
              <img src="http://via.placeholder.com/270x215" alt="case">
            </div>
            <div class="col-md-6 col-sm-6 col-12">
              <div class="case-block-inner">
                <h4>Project Governances</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <a href="#">Learn More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Project Block End -->

      <!-- Project Block Start -->
      <div class="col-md-6 col-sm-12 col-12">
        <div class="case-block">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-12 pr-0">
              <img src="http://via.placeholder.com/270x215" alt="case">
            </div>
            <div class="col-md-6 col-sm-6 col-12">
              <div class="case-block-inner">
                <h4>Market Assessment</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <a href="#">Learn More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Project Block End -->
    </div>
  </div>
</div>
<!-- Cases END -->


<!-- Notice Section START -->
<div class="notice-section notice-section-sm border-top">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-12">
        <div class="mt-5">
          <h6>Looking for Professional Approach and Quality Services ?</h6>
          <div class="section-heading-line-left"></div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-12">
        <div class="mt-10 right-holder-md">
          <a href="#" class="primary-button button-sm mt-15-xs">Contact Us Today</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Notice Section END -->


<!-- Footer START -->
<footer>
  <div class="container">
    <div class="row">
      <!-- Column 1 Start -->
      <div class="col-md-4 col-sm-6 col-12">
        <h3>About Us</h3>
        <div class="mt-25">
          <img src="<?php echo base_url() ?>assets/front-end/web3/img/logos/logo-footer.png" alt="footer-logo">
          <p class="mt-25">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
            ad minim veniam.</p>
          <div class="footer-social-icons mt-25">
            <ul>
              <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              <li><a href="#"><i class="fa fa-skype"></i></a></li>
              <li><a href="#"><i class="fa fa-youtube"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Column 1 End -->

      <!-- Column 2 Start -->
      <div class="col-md-3 col-sm-6 col-12">
        <h3>Quick Links</h3>
        <ul class="footer-list">
          <li><a href="#">Strategic Consulting</a></li>
          <li><a href="#">Sales Services</a></li>
          <li><a href="#">Market Research</a></li>
          <li><a href="#">Online Reputation</a></li>
          <li><a href="#">Strategic Consulting</a></li>
          <li><a href="#">Sales Services</a></li>
          <li><a href="#">Market Research</a></li>
        </ul>
      </div>
      <!-- Column 2 End -->

      <!-- Column 3 Start -->
      <div class="col-md-3 col-sm-6 col-12">
        <h3>Recent Posts</h3>
        <div class="mt-25">
          <!-- Post Start -->
          <div class="footer-recent-post clearfix">
            <div class="footer-recent-post-thumb">
              <img src="http://via.placeholder.com/65x65" alt="img">
            </div>
            <div class="footer-recent-post-content">
              <span>February 7, 2018</span>
              <a href="#">Advices for young designers</a>
            </div>
          </div>
          <!-- Post End -->
          <!-- Post Start -->
          <div class="footer-recent-post clearfix">
            <div class="footer-recent-post-thumb">
              <img src="http://via.placeholder.com/65x65" alt="img">
            </div>
            <div class="footer-recent-post-content">
              <span>February 7, 2018</span>
              <a href="#">What Planning Process Needs?</a>
            </div>
          </div>
          <!-- Post End -->
          <!-- Post Start -->
          <div class="footer-recent-post clearfix">
            <div class="footer-recent-post-thumb">
              <img src="http://via.placeholder.com/65x65" alt="img">
            </div>
            <div class="footer-recent-post-content">
              <span>February 7, 2018</span>
              <a href="#">Lorem ipsum dolor sit amet.</a>
            </div>
          </div>
          <!-- Post End -->
        </div>
      </div>
      <!-- Column 3 End -->

      <!-- Column 4 Start -->
      <div class="col-md-2 col-sm-6 col-12">
        <h3>Tags</h3>
        <div class="footer-tags mt-25">
          <a href="#">Business</a>
          <a href="#">Conusltant</a>
          <a href="#">Coach</a>
          <a href="#">UX</a>
          <a href="#">API</a>
          <a href="#">Reputation</a>
          <a href="#">Research</a>
          <a href="#">Sale</a>
          <a href="#">Service</a>
          <a href="#">UI</a>
          <a href="#">Web</a>
          <a href="#">WebDesign</a>
        </div>
      </div>
      <!-- Column 4 End -->
    </div>

    <!-- Footer Bar Start -->
    <div class="footer-bar">
      <p><span class="primary-color">SpecThemes</span> © 2018. All Rights Reserved.</p>
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

</body>
</html>