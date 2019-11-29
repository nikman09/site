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
        $this->load->model("m_jadwaldetail");
        $this->load->model("m_jadwal");
        $this->load->model("m_pesan");
        $this->load->model("m_navigasi");
    }

    // Dashboard
    public function index()
    {   

        $variabel['page'] 		= $this->m_navigasi->get_nested();
        $variabel['beritaterkini'] = $this->m_berita->lihatdata2(3, 0);           
        $variabel['kegiatanterkini'] = $this->m_kegiatan->lihatdata(3, 0);  
        $variabel['kegiatanterkini2'] = $this->m_kegiatan->lihatdata(4, 0);  
        $variabel['berita'] = $this->m_berita->lihatdatalimit();
        $variabel['jadwalpelatihan'] = $this->m_jadwaldetail->lihatdatajadwal(4,4, 0); 
        $variabel['jadwalpameran'] = $this->m_jadwaldetail->lihatdatajadwal(3,4, 0); 
        $variabel['jadwaldinas'] = $this->m_jadwaldetail->lihatdatajadwal(5,4, 0); 
        $variabel['datapopuler'] = $this->m_berita->lihatdatapopuler();
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

    function beritapost()
    {
        $variabel['csrf'] = csrf();
        $variabel['kategori'] = $this->m_beritakategori->lihatdatajumlah();
        $variabel['datarecent'] = $this->m_berita->lihatdatarecent();
        $variabel['datapopuler'] = $this->m_berita->lihatdatapopuler();
        $id_berita = $this->input->get("ids");
        $exec = $this->m_berita->lihatdatasatu($id_berita);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('berita/v_beritapost',$variabel,'berita/v_berita_js');
        } else {
            redirect(base_url("web/berita"));
        }
      
      
      
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
    function kegiatanposts()
    {
        $variabel['csrf'] = csrf();
        $id_kegiatan= $this->input->get("ids");
        $exec = $this->m_kegiatan->lihatdatasatu($id_kegiatan);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('kegiatan/v_kegiatanpost',$variabel);
        } else {
            redirect(base_url("web/kegiatan"));
        }
      
      
      
    }

    public function kontak()
    {   
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $username = $this->session->userdata("web_username");
            $array=array(
                'nama'=> $this->input->post('nama'),
                'email'=> $this->input->post('email'),
                'judul'=>$this->input->post('judul'),
                'pesan'=>$this->input->post('pesan'),
                );
              
                $exec = $this->m_pesan->tambahdata($array);
                if ($exec) redirect(base_url("web/kontak?msg=1"));
                else redirect(base_url("web/kontak?msg=0"));
        }
        else {
            $this->layout->render('kontak/v_kontak',$variabel,'kontak/v_kontak_js');
        }
       
    }

    function jadwal()
    {
        $variabel['csrf'] = csrf();
        $idx = $this->input->get("idx");
        $exec2 = $this->m_jadwal->lihatdatasatu($idx);
        if ($exec2->num_rows()>0){
            $variabel['data'] =  $this->m_jadwaldetail->lihatdatajadwal2($idx);
            $variabel['datas'] = $exec2 ->row_array();
            $this->layout->render('jadwal/v_jadwal',$variabel,'jadwal/v_jadwal_js');
        } else {
            redirect(base_url("web"));
        }
  
        
    }

 
    
}