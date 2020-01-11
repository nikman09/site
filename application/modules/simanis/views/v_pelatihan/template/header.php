<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="SIMANIS, Sistem Informasi Pelatihan Industri" />
	<meta name="author" content="Muhammad Ni'man Nasir" />

	<link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url() ?>assets/images/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url() ?>assets/images/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url() ?>assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url() ?>assets/images/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/images/favicon/favicon-16x16.png">
	<link rel="manifest" href="<?php echo base_url() ?>assets/images/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="<?php echo base_url() ?>assets/images/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<title>SIMANIS KALSEL</title>

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/web/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/web/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/web/css/neon.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/web/css/neon.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/font-icons/font-awesome/css/font-awesome.css">
	
	<script src="<?php echo base_url() ?>assets/front-end/web/js/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/select2/select2-bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/select2/select2.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/selectboxit/jquery.selectBoxIt.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/front-end/web/css/custom.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/confirm/jquery-confirm.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-theme.css">
	

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-forms.css">

	<style>
		.error {
			font-size: 10px
		}
		#image-preview{
			display:none;
			width : 150px;
		}	
		.modal-open .ui-datepicker{z-index: 2000!important}

	
	</style>
	<script src="<?php echo base_url() ?>assets/back-end/js/jquery-1.11.3.min.js"></script>

	
	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
	
		span p {
			color : #cc2424
		}
		p  {
			color : #474747
		},
	</style>
</head>
<body class=" skin-red">

<div class="wrap">
	
	<!-- Logo and Navigation -->
<div class="site-header-container container">
	<div class="row">
		<div class="col-md-12">
			<header class="site-header">
				<section class="site-logo">
					<a href="<?php echo base_url() ?>simanis">
						<img src="<?php echo base_url() ?>assets/images/go.png" width="220" />
					</a>
				</section>
				<?php 
				 if ($this->session->userdata('pelatihan_status') != "login") {
					include("menunologin.php");
				 } else {
					include("menu.php");
				 }
				?>
			</header>
		</div>
	</div>
</div>	


	