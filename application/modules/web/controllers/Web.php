<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Web extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_berita");
        $this->load->model("m_halaman");
        $this->load->model("m_pegawai");
    }

    // Dashboard
    public function index()
    {   

        $variabel['berita'] = $this->m_berita->lihatdata();
        
        $this->load->view('home/v_home',$variabel);
    }   
   
    public function page()
    {   

        $variabel['csrf'] = csrf();
      
        $id_halaman = $this->input->get("p");
        $exec = $this->m_halaman->lihatdatasatu($id_halaman);
        if ($exec->num_rows()>0){
            $variabel['halaman'] = $exec ->row_array();
            $this->layout->render('page/v_page',$variabel);
        } else {
            redirect(base_url("web"));
        }
     
    }  

    function datapegawai()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_pegawai->lihatdata();
        $this->layout->render('datapegawai/v_datapegawai',$variabel,'datapegawai/v_datapegawai_js');
    }

}