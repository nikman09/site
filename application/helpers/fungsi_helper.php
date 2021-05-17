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
					echo "default
					<div class='alert alert-primary	'>
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
					<div class='alert alert-primary'>
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
				redirect(base_url("simanis/login"));
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
		function menus($modul,$detail,$urll,$target,$judul,$toogle = FALSE)
		{	

			
				$too = ($toogle==FALSE?"":"dropdown-toggle");
				$blank = ($target==1?"target='_blank'":" ");
			
				if ($modul=="Laman") {
					$link = "<a href='".base_url()."web/page?p=".$detail."' $blank class='dropdown-item $too '>$judul</a>";
				} else if($modul=="Dokumen") {
					$link= "<a href='".base_url()."web/dokumen?p=".$detail."' $blank  class='dropdown-item $too '>$judul</a>";
				} else if($modul=="Kegiatan") {
					$link = "<a href='".base_url()."web/kegiatan/".$detail."' $blank  class='dropdown-item $too '>$judul</a>";
				} else if($modul=="Bidang") {
					$link = "<a href='".base_url()."web/bidang?p=".$detail."' $blank  class='dropdown-item $too '>$judul</a>";
				} else if($modul=="Jadwal") {
					$link = "<a href='".base_url()."web/jadwal?idx=".$detail."' $blank  class='dropdown-item $too '>$judul</a>";
				} else if($modul=="Berita") {
					$link = "<a href='".base_url()."web/berita' $blank  class='dropdown-item $too '>$judul</a>";
				} else if($modul=="Kontak") {
					$link = "<a href='".base_url()."web/kontak' $blank  class='dropdown-item $too '>$judul</a>";
				}
				 else if($modul=="URL") {
					$link = "<a href='".$urll."'  $blank  class='dropdown-item $too '>$judul</a>";
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
				redirect(base_url("simanis/admin/login?m=".$submenu.""));
			}
		}
	}


	function hitung_umur($tanggal_lahir) {
		list($year,$month,$day) = explode("-",$tanggal_lahir);
		$year_diff  = date("Y") - $year;
		$month_diff = date("m") - $month;
		$day_diff   = date("d") - $day;
		if ($month_diff < 0) $year_diff--;
			elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
		return $year_diff;
	}

	 function lengkap($biodata)
    {   
     
        $lengkap = 0;
        $lengkap += $biodata["email"]!="" || $biodata["email"]!=null ? 1 : 0 ;
        $lengkap += $biodata["password"]!="" || $biodata["password"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nik"]!="" || $biodata["nik"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nama"]!="" || $biodata["nama"]!=null ? 1 : 0 ;
        $lengkap += $biodata["jk"]!="" || $biodata["jk"]!=null ? 1 : 0 ;
        $lengkap += $biodata["tempatlahir"]!="" || $biodata["tempatlahir"]!=null ? 1 : 0 ;
        $lengkap += $biodata["tanggallahir"]!="0000-00-00" || $biodata["tanggallahir"]!=null ? 1 : 0 ;
        $lengkap += $biodata["alamat"]!="" || $biodata["alamat"]!=null ? 1 : 0 ;
        $lengkap += $biodata["kota"]!="" || $biodata["kota"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nohp"]!="" || $biodata["nohp"]!=null ? 1 : 0 ;
        $lengkap += $biodata["foto"]!="" || $biodata["foto"]!=null ? 1 : 0 ;
        $lengkap += $biodata["pendidikan"]!="" || $biodata["pendidikan"]!=null ? 1 : 0 ;
        $lengkap += $biodata["namapendidikan"]!="" || $biodata["namapendidikan"]!=null ? 1 : 0 ;
        $lengkap += $biodata["jurusan"]!="" || $biodata["jurusan"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nilai"]!="" || $biodata["nilai"]!=null ? 1 : 0 ;
		$persen = $lengkap/15*100;
		return number_format((float)$persen, 2, '.', ''); 
       
	}
	
	function ubahwa($wa)
    {      
       $wa = str_replace("+","",$wa);
       $wa = str_replace("-","",$wa);
       $wa = str_replace(" ","",$wa);
       if (substr($wa,0,1)=="0") {
        $asd = substr_replace($wa,"62",0,1);
       } else {
		   $asd = $wa;
	   }
	   return $asd;
    }


     function usaha($biodata)
    {   
     
        $lengkap = 0;
        $lengkap += $biodata["unama"]!="" || $biodata["unama"]!=null ? 1 : 0 ;
        $lengkap += $biodata["upemilik"]!="" || $biodata["upemilik"]!=null ? 1 : 0 ;
        $lengkap += $biodata["ujalan"]!="" || $biodata["ujalan"]!=null ? 1 : 0 ;
        $lengkap += $biodata["udesa"]!="" || $biodata["udesa"]!=null ? 1 : 0 ;
        $lengkap += $biodata["ukecamatan"]!="" || $biodata["ukecamatan"]!=null ? 1 : 0 ;
        $lengkap += $biodata["ukabkota"]!="" || $biodata["ukabkota"]!=null ? 1 : 0 ;
        $lengkap += $biodata["utelp"]!="" || $biodata["utelp"]!=null ? 1 : 0 ;
        $lengkap += $biodata["ubentuk"]!="" || $biodata["ubentuk"]!=null ? 1 : 0 ;
        $lengkap += $biodata["utenagakerja"]!="" || $biodata["utenagakerja"]!=null ? 1 : 0 ;
        $lengkap += $biodata["uproduk"]!="" || $biodata["uproduk"]!=null ? 1 : 0 ;
        $lengkap += $biodata["umerek"]!="" || $biodata["umerek"]!=null ? 1 : 0 ;
        $lengkap += $biodata["uinvestasi"]!="" || $biodata["uinvestasi"]!=null ? 1 : 0 ;
        $lengkap += $biodata["ujumlahproduksi"]!="" || $biodata["ujumlahproduksi"]!=null ? 1 : 0 ;
        $lengkap += $biodata["usatuanproduksi"]!="" || $biodata["usatuanproduksi"]!=null ? 1 : 0 ;
        $lengkap += $biodata["unilaiproduksi"]!="" || $biodata["unilaiproduksi"]!=null ? 1 : 0 ;
        $lengkap += $biodata["unilaibahanbaku"]!="" || $biodata["unilaibahanbaku"]!=null ? 1 : 0 ;
        $lengkap += $biodata["upemasaran"]!="" || $biodata["upemasaran"]!=null ? 1 : 0 ;
		$lengkap += $biodata["ufotoproduk"]!="" || $biodata["ufotoproduk"]!=null ? 1 : 0 ;
		$persen = $lengkap/18*100;
        return number_format((float)$persen, 2, '.', ''); 
       
	}
	
	function kirimemail($email,$subject,$isi)
    {   
		$ci = &get_instance();
		$config = [
			'mailtype'  => 'html',
			'charset'   => 'utf-8',
			'protocol'  => 'smtp',
			'smtp_host' => 'smtp.gmail.com',
			'smtp_user' => 'simanis.kalsel@gmail.com',  // Email gmail
			'smtp_pass'   => 'Simanis123321',  // Password gmail
			'smtp_crypto' => 'ssl',
			'smtp_port'   => 465,
			'crlf'    => "\r\n",
			'newline' => "\r\n"
		   ];
		  $ci->load->library('email', $config);
		  $ci->email->from('no-replay@simaniskalsel.go.id', 'SIMANIS KALSEL');
		  $ci->email->to($email );
		  $ci->email->subject($subject);
		  $ci->email->message($isi);
		  return  $ci->email->send();
       
    }


	}