<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Web extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_berita");
        $this->load->model("m_bidang");
        $this->load->model("m_halaman");
        $this->load->model("m_pegawai");
        $this->load->model("m_beritakategori");
        $this->load->model("m_kegiatan");
        
    }

    // Dashboard
    public function index()
    {   

        
        $variabel['beritaterkini'] = $this->m_berita->lihatdata2(3, 0);           
 
        $variabel['berita'] = $this->m_berita->lihatdatalimit();
        
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

    function berita()
    {
        $base_url = 'web/berita'; //site url
        $total_rows = $this->m_berita->jumlah_data(); //total row
        $per_page = 5;  //show record per halaman
        $uri_segment=3;  // uri parameter
        $num_links = 3;
        
        $variabel['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $variabel['data'] = $this->m_berita->lihatdata2($per_page, $variabel['page']); 
        $variabel['pagination'] = $this->buathalaman->paging($base_url,$total_rows,$per_page,$uri_segment,$num_links);
 
        $variabel['csrf'] = csrf();
        $variabel['kategori'] = $this->m_beritakategori->lihatdatajumlah();
        $variabel['datarecent'] = $this->m_berita->lihatdatarecent();
        $variabel['datapopuler'] = $this->m_berita->lihatdatapopuler();
        $this->layout->render('berita/v_berita',$variabel,'berita/v_berita_js');
      
    }


    public function bidang()
    {   

        $variabel['csrf'] = csrf();
        $id_halaman = $this->input->get("p");
        $exec = $this->m_bidang->lihatdatasatu($id_halaman);
        if ($exec->num_rows()>0){
            $variabel['halaman'] = $exec ->row_array();
            $this->layout->render('bidang/v_bidang',$variabel);
        } else {
            redirect(base_url("web"));
        }
     
    }  

    function kegiatan()
    {
        $variabel['csrf'] = csrf();
        $id_halaman = $this->uri->segment(3);
        if ($id_halaman!="") {
           
            if ($id_halaman=='all') {
                $base_url = "web/kegiatan/$id_halaman/"; //site url
                $total_rows = $this->m_kegiatan->jumlah_data(); //total row
                $per_page = 6;  //show record per halaman
                $uri_segment=4;  // uri parameter
                $num_links = 3;
                $variabel['page'] = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
                $variabel['data'] = $this->m_kegiatan->lihatdata($per_page, $variabel['page']); 
                $variabel['pagination'] = $this->buathalaman->paging($base_url,$total_rows,$per_page,$uri_segment,$num_links);
                $variabel['csrf'] = csrf();
                $this->layout->render('kegiatan/v_kegiatanall',$variabel);
            } else {
                $base_url = "web/kegiatan/$id_halaman/"; //site url
                $total_rows = $this->m_kegiatan->jumlah_databidang($id_halaman); //total row
                $per_page = 6;  //show record per halaman
                $uri_segment=4;  // uri parameter
                $num_links = 3;
                $exec = $this->m_bidang->lihatdatasatu($id_halaman);
                if ($exec->num_rows()>0){
                    $variabel['bidang'] = $exec ->row_array();
                    $variabel['page'] = ($this->uri->segment($uri_segment)) ? $this->uri->segment($uri_segment) : 0;
                    $variabel['data'] = $this->m_kegiatan->lihatdatabidang($id_halaman,$per_page, $variabel['page']); 
                    $variabel['pagination'] = $this->buathalaman->paging($base_url,$total_rows,$per_page,$uri_segment,$num_links);
            
                    $variabel['csrf'] = csrf();
                    $this->layout->render('kegiatan/v_kegiatan',$variabel);
                 
                }  else {
    
                }
            }
            
           
          
        } else {
            redirect(base_url()."web/kegiatan/all");
           
        }
    }
    
}