<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Administrator extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        ceklogin();
    }

    // Dashboard
    public function index()
    {   
        $this->load->view('dashboard/v_home');
    }

    public function berita()
    {   
        $variabel = "";
        $this->layout->render('berita/v_berita',$variabel,'berita/v_berita_js');
    }
	
	

}