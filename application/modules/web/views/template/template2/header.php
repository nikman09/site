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
	 <?php $this->load->view("template/menu") ?>
    </div>
  </nav>
</header>