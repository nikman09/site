<?php   
	$nama = $this->session->userdata("nama");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="SIMANIS,(Sistem Informasi Pendaftaran Pelatihan Industri) KALSEL " />
	<meta name="author" content="" />



	<title>ADMIN SIMANIS</title>

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/font-icons/entypo/css/entypo.css" media="screen">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/font-icons/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/uikit/css/uikit.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-core.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-theme.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/neon-forms.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/js/confirm/jquery-confirm.min.css">

	

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/back-end/css/custom.css">
	

	<script src="<?php echo base_url() ?>assets/back-end/js/jquery-1.11.3.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
	<?php
		$nama = $this->session->userdata("pelatihan_admin_nama");
		$foto = $this->session->userdata("pelatihan_admin_foto");
		$username = $this->session->userdata("pelatihan_admin_username");

		
	?>
<body class="page-body" style="font-size:12px;color:#666666">
<div class="page-container"><!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
	<div class="sidebar-menu menu2">
		<div class="sidebar-menu-inner">
			<header class="logo-env">
				<!-- logo -->
				<div class="logo">
				<a href="<?php echo base_url()."pelatihan/admin"; ?>">
						<!-- <img src="<?php echo base_url() ?>assets/images/provinsi.png" width="25" style="margin-right:5px" alt="" /> -->
						<span style="font-weight:bold;color:#fff;font-size:18px;">SIMANIS</span><span style="font-size:14px;"> KALSEL</span>
					</a>
				</div>
				<!-- logo collapse icon -->
				<div class="sidebar-collapse">
					<a href="#" class="sidebar-collapse-icon"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
						<i class="entypo-menu"></i>
					</a>
				</div>			
				<!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
				<div class="sidebar-mobile-menu visible-xs">
					<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
						<i class="entypo-menu"></i>
					</a>
				</div>
			</header>
			<?php 
				// switch ($rule) {
				// 	case "administrator" : $this->load->view("v_template/menuadministrator");
				// 	break;
				// 	case "user" : $this->load->view("v_template/menuuser");
				// 	break;
				// }
				$this->load->view("v_admin/template/menu");
			?>
	</div>
</div>
<div class="main-content">		
		<div class="row">
			<!-- Profile Info and Notifications -->
			<div class="col-md-6 col-sm-8 clearfix">
				<ul class="user-info pull-left pull-none-xsm">
					<!-- Profile Info -->
					<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					
							<img src="<?php if ($foto =="") echo base_url()."assets/images/foto/default.png"; else echo base_url()."assets/images/foto/".$foto; ?>" alt="" class="img-circle" width="44" />
							<span style="float:right;margin-top:10px">
							<?php echo $nama ?> <br/>
							<small style="color:#7c7c7c"><?php echo $username ?>  <i class="fa fa-caret-down"></i></small>
							</span>
						</a>
						<ul class="dropdown-menu">
							<!-- Reverse Caret -->
							<li class="caret"></li>
							<!-- Profile sub-links -->
							<li>
								<a href="#">
									<i class="entypo-user"></i>
									 Profile
								</a>
							</li>
							<li>
								<a href="#">
									<i class="entypo-key"></i>
									 Ganti Password
								</a>
							</li>
							<li>
								<a href="#">
									<i class="entypo-logout"></i>
									Log Out
								</a>
							</li>
						</ul>
					</li>
				</ul>
				<ul class="user-info pull-left pull-right-xs pull-none-xsm">	
					<!-- Message Notifications -->
					<!-- Task Notifications -->
				</ul>
			</div>
			<!-- Raw Links -->
			<div class="col-md-6 col-sm-4 clearfix hidden-xs">
				<ul class="list-inline links-list pull-right">
					<!-- Language Selector -->
					<li class="sep"></li>
					<li>
						<a href="<?php echo base_url() ?>simanis/admin/logout">
							Log Out <i class="entypo-logout right"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
		<hr style="margin-top:0px"/>

		