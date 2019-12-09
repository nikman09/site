<?php  
	if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

	
	if ( ! function_exists('pesan_get'))
	{
		function pesan_get($variabel,$pesansukses, $pesangagal = NULL, $pesangagal2 = NULL, $pesangagal3 = NULL)
		{
			 
			 if (isset($_GET[$variabel])) {
				$ci = &get_instance();
				$var = $ci->input->get($variabel,TRUE);
				if ($var=='1' && $pesansukses!= NULL) { 
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesansukses."
					</div> ";
				 } else if ($var=='0' && $pesangagal!= NULL) {
					echo "
					<div class='alert alert-default	'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal."
					</div> ";
				 } else if ($var=='2' && $pesangagal2!= NULL) {
					echo "
					<div class='alert alert-warning'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal2."
					</div> ";
				 }  else if ($var=='3' && $pesangagal3!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal3."
					</div> ";
				 }
			} else if (isset($_POST[$variabel])) {
				$ci = &get_instance();
				$var = $ci->input->post($variabel,TRUE);
				if ($var=='1' && $pesansukses!= NULL) { 
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesansukses."
					</div> ";
				 } else if ($var=='0' && $pesangagal!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal."
					</div> ";
				 } else if ($var=='2' && $pesangagal2!= NULL) {
					echo "
					<div class='alert alert-warning'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal2."
					</div> ";
				 }  else if ($var=='3' && $pesangagal3!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal3."
					</div> ";
				 }
			}
		
		}
	}

	if ( ! function_exists('pesan_get2'))
	{
		function pesan_get2($variabel,$pesansukses, $pesangagal = NULL, $pesangagal2 = NULL, $pesangagal3 = NULL)
		{
			 
			 if (isset($_GET[$variabel])) {
				$ci = &get_instance();
				$var = $ci->input->get($variabel,TRUE);
				if ($var=='1' && $pesansukses!= NULL) { 
					echo "
					<div class='alert alert-success'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesansukses."
					</div> ";
				 } else if ($var=='0' && $pesangagal!= NULL) {
					echo "
					<div class='alert alert-info	'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal."
					</div> ";
				 } else if ($var=='2' && $pesangagal2!= NULL) {
					echo "
					<div class='alert alert-warning'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal2."
					</div> ";
				 }  else if ($var=='3' && $pesangagal3!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal3."
					</div> ";
				 }
			} else if (isset($_POST[$variabel])) {
				$ci = &get_instance();
				$var = $ci->input->post($variabel,TRUE);
				if ($var=='1' && $pesansukses!= NULL) { 
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesansukses."
					</div> ";
				 } else if ($var=='0' && $pesangagal!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal."
					</div> ";
				 } else if ($var=='2' && $pesangagal2!= NULL) {
					echo "
					<div class='alert alert-warning'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal2."
					</div> ";
				 }  else if ($var=='3' && $pesangagal3!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal3."
					</div> ";
				 }
			}
		
		}
	}

	if ( ! function_exists('pesanvar'))
	{
		function pesanvar($variabel,$pesansukses, $pesangagal = NULL, $pesangagal2 = NULL, $pesangagal3 = NULL)
		{
			 
				$ci = &get_instance();
				$var = $variabel;
				if ($var=='1' && $pesansukses!= NULL) { 
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesansukses."
					</div> ";
				 } else if ($var=='0' && $pesangagal!= NULL) {
					echo "
					<div class='alert alert-defaults'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal."
					</div> ";
				 } else if ($var=='2' && $pesangagal2!= NULL) {
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal2."
					</div> ";
				 } else if ($var=='3' && $pesangagal3!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal3."
					</div> ";
				 }
	
		
		}
	}


	if ( ! function_exists('pesanvar2'))
	{
		function pesanvar2($variabel,$pesansukses, $pesangagal = NULL, $pesangagal2 = NULL, $pesangagal3 = NULL)
		{
			 
				$ci = &get_instance();
				$var = $variabel;
				if ($var=='1' && $pesansukses!= NULL) { 
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesansukses."
					</div> ";
				 } else if ($var=='0' && $pesangagal!= NULL) {
					echo "
					<div class='alert alert-info'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal."
					</div> ";
				 } else if ($var=='2' && $pesangagal2!= NULL) {
					echo "
					<div class='alert alert-default'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal2."
					</div> ";
				 } else if ($var=='3' && $pesangagal3!= NULL) {
					echo "
					<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<i class='fa fa-info-circle'></i>
						".$pesangagal3."
					</div> ";
				 }
	
		
		}
	}


	if (!function_exists('ceklogin'))
	{
		function ceklogin()
		{	
			$ci = &get_instance();
			$menu = $ci->router->fetch_class();
			$submenu = $ci->router->fetch_method();
			if($ci->session->userdata('statuslogin') != "login") {
				redirect(base_url("kepegawaian/login?m=".$submenu.""));
				
			}
		}
	}

	if (!function_exists('cekloginweb'))
	{
		function cekloginweb()
		{	
			$ci = &get_instance();
			$menu = $ci->router->fetch_class();
			$submenu = $ci->router->fetch_method();
			if($ci->session->userdata('web_statuslogin') != "login") {
				redirect(base_url("login?m=".$submenu.""));
			}
		}
	}

	if (!function_exists('cekloginadmin'))
	{
		function cekloginadmin()
		{	
			$ci = &get_instance();
			$menu = $ci->router->fetch_class();
			$submenu = $ci->router->fetch_method();
			if($ci->session->userdata('admin_statuslogin') != "login") {
				redirect(base_url("kepegawaian/login/administrator?m=".$submenu.""));
			}
		}
	}
	if (!function_exists('cekloginuser'))
	{
		function cekloginuser()
		{	
			$ci = &get_instance();
			$menu = $ci->router->fetch_class();
			$submenu = $ci->router->fetch_method();
			if($ci->session->userdata('user_statuslogin') != "login") {
				redirect(base_url("login?m=".$submenu.""));
			}
		}
	}


	if (!function_exists('cekloginpelatihan'))
	{
		function cekloginpelatihan()
		{	
			$ci = &get_instance();
			$menu = $ci->router->fetch_class();
			$submenu = $ci->router->fetch_method();
			if($ci->session->userdata('pelatihan_status') != "login") {
				redirect(base_url("pelatihan/login"));
			}
		}
	}
	if (!function_exists('hakakses'))
	{
		function hakakses($rule = null,$rule1 = null,$rule2 = null)
		{	
			$ci = &get_instance();
			if($rule!=null && $rule1==null && $rule2==null) {
				if($rule==$ci->session->userdata('rule')) {
					
				} else {
					redirect(base_url("kepegawaian/akses"));
				}
			} else if($rule!=null && $rule1!=null && $rule2==null) {
				if($rule==$ci->session->userdata('rule') || $rule1==$ci->session->userdata('rule')) {
					
				} else {
					redirect(base_url("kepegawaian/akses"));
				}
			} else if($rule!=null && $rule1!=null && $rule2!=null) {
				if($rule==$ci->session->userdata('rule') || $rule1==$ci->session->userdata('rule') || $rule2==$ci->session->userdata('rule')) {
					
				} else {
					redirect(base_url("kepegawaian/akses"));
				}
			}
		}
	}

	if (!function_exists('akses'))
	{
		function akses($rule = null,$rule1 = null,$rule2 = null)
		{	
			$ci = &get_instance();
			if($rule!=null && $rule1==null && $rule2==null) {
				if($rule==$ci->session->userdata('pelatihan_admin_rule')) {
					
				} else {
					redirect(base_url("pelatihan/admin/akses"));
				}
			} else if($rule!=null && $rule1!=null && $rule2==null) {
				if($rule==$ci->session->userdata('pelatihan_admin_rule') || $rule1==$ci->session->userdata('pelatihan_admin_rule')) {
					
				} else {
					redirect(base_url("pelatihan/admin/akses"));
				}
			} else if($rule!=null && $rule1!=null && $rule2!=null) {
				if($rule==$ci->session->userdata('pelatihan_admin_rule') || $rule1==$ci->session->userdata('pelatihan_admin_rule') || $rule2==$ci->session->userdata('pelatihan_admin_rule')) {
					
				} else {
					redirect(base_url("pelatihan/admin/akses"));
				}
			}
		}
	}


	if (!function_exists('menus'))
	{
		function menus($modul,$detail,$urll,$target,$judul)
		{	

				$blank = ($target==1?"target='_blank'":" ");
				if ($modul=="Laman") {
					$link = "<a href='".base_url()."web/page?p=".$detail."' $blank >$judul</a>";
				} else if($modul=="Dokumen") {
					$link= "<a href='".base_url()."web/page?p=".$detail."' $blank >$judul</a>";
				} else if($modul=="Kegiatan") {
					$link = "<a href='".base_url()."web/kegiatan/".$detail."' $blank >$judul</a>";
				} else if($modul=="Bidang") {
					$link = "<a href='".base_url()."web/bidang?p=".$detail."' $blank >$judul</a>";
				} else if($modul=="Jadwal") {
					$link = "<a href='".base_url()."web/jadwal?idx=".$detail."' $blank >$judul</a>";
				} else if($modul=="Berita") {
					$link = "<a href='".base_url()."web/berita' $blank >$judul</a>";
				} else if($modul=="Kontak") {
					$link = "<a href='".base_url()."web/kontak' $blank >$judul</a>";
				}
				 else if($modul=="URL") {
					$link = "<a href='".$urll."'>$judul</a>";
				}
			return $link;
		}


		if (!function_exists('cekloginadminpelatihan'))
	{
		function cekloginadminpelatihan()
		{	
			$ci = &get_instance();
			$menu = $ci->router->fetch_class();
			$submenu = $ci->router->fetch_method();
			if($ci->session->userdata('pelatihan_admin_login') != "login") {
				redirect(base_url("pelatihan/admin/login?m=".$submenu.""));
			}
		}
	}

	}