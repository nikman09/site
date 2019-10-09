<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Web extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_berita");
        $this->load->model("m_halaman");
        $this->load->model("m_pegawai");
        $this->load->model("m_beritakategori");
        
    }

    // Dashboard
    public function index()
    {   

        

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
        $config['base_url'] = site_url('web/berita'); //site url
        $config['total_rows'] = $this->m_berita->jumlah_data(); //total row
        $config['per_page'] = 5;  //show record per halaman
        $config["uri_segment"] =3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 3;
 
        // Membuat Style pagination untuk BootStrap v4
         $config['first_link']       = '<i class="fas fa-angle-double-left"></i>';
        $config['last_link']        = '<i class="fas fa-angle-double-right"></i>';
        $config['next_link']        = '<i class="fas fa-angle-right"></i>';
        $config['prev_link']        = '<i class="fas fa-angle-left"></i>';
        $config['full_tag_open']    = '<ul class="pagination float-right">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $variabel['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
       
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $variabel['data'] = $this->m_berita->lihatdata2($config["per_page"], $variabel['page']);           
 
        $variabel['pagination'] = $this->pagination->create_links();
 
      
        $variabel['csrf'] = csrf();
        $variabel['kategori'] = $this->m_beritakategori->lihatdatajumlah();
        $variabel['datarecent'] = $this->m_berita->lihatdatarecent();
        $variabel['datapopuler'] = $this->m_berita->lihatdatapopuler();
        $this->layout->render('berita/v_berita',$variabel,'berita/v_berita_js');
      
    }

    
}