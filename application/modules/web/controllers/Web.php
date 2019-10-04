<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Web extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_berita");
    }

    // Dashboard
    public function index()
    {   

        $variabel['berita'] = $this->m_berita->lihatdata();
        $this->load->view('home/v_home',$variabel);
    }   
   

}