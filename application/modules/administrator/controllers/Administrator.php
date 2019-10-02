<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Administrator extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        ceklogin();
        $this->load->model("m_beritakategori");
        $this->load->model("m_berita");
    }

    // Dashboard
    public function index()
    {   
        $this->load->view('dashboard/v_home');
    }

    public function berita()
    {   
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_berita->lihatdata();
        $this->layout->render('berita/v_berita',$variabel,'berita/v_berita_js');
   
    }
   
    public function beritatambah()
    {   
        $variabel['csrf'] = csrf();
        $variabel['beritakategori'] = $this->m_beritakategori->lihatdata();
        if ($this->input->post()){
            $username = $this->session->userdata("username");
            $array=array(
                'id_beritakategori'=> $this->input->post('beritakategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'userinput'=>$username
                );
                $config['upload_path'] = './assets/images/berita';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
                $this->load->library('upload', $config);
                $this->upload->do_upload("foto");
                $upload = $this->upload->data();
                $file = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$file;
                $exec = $this->m_berita->tambahdata($array);
                if ($exec) redirect(base_url("administrator/berita?msg=1"));
                else redirect(base_url("administrator/beritatambah?msg=0"));
        }
        else {
            $this->layout->render('berita/v_beritatambah',$variabel,'berita/v_beritatambah_js');
        }
       
    }

    function beritahapus()
    {
        $id_berita = $this->input->get("id");
        $query2 = $this->m_berita->lihatdatasatu($id_berita);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 ='./assets/images/berita/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_berita->hapus($id_berita);
        redirect(base_url()."administrator/berita?msg=2");
    }

    public function beritakategori()
    {   
        
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_beritakategori->lihatdata();
        $this->layout->render('berita/beritakategori/v_beritakategori',$variabel,'berita/beritakategori/v_beritakategori_js');
    }

    public function beritakategoritambah()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'kategori'=> $this->input->post('kategori')
            );
            $exec = $this->m_beritakategori->tambahdata($array);
                if ($exec){
                 redirect(base_url("administrator/beritakategori?msg=1"));
                }
      } else {
      }
    }


    public function beritaedit()
    {   

        $variabel['csrf'] = csrf();
        $variabel['beritakategori'] = $this->m_beritakategori->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("username");
            $id_berita = $this->input->post('id_berita');
            $array=array(
                'id_beritakategori'=> $this->input->post('beritakategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'userinput'=>$username
            );
            $config['upload_path'] = './assets/images/berita';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto"))
            {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$foto;

                $query2 = $this->m_berita->lihatdatasatu($id_berita);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/berita/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                }
               
            }
           
            $exec = $this->m_berita->editdata($id_berita,$array);
            if ($exec) redirect(base_url("administrator/beritaedit?id=".$id_berita."&msg=1"));
            else redirect(base_url("administrator/beritaedit?id=".$id_berita."&msg=0"));

        } else {
            $id_berita = $this->input->get("id");
            $exec = $this->m_berita->lihatdatasatu($id_berita);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->render('berita/v_berita_edit',$variabel,'berita/v_berita_edit_js');
            } else {
                redirect(base_url("administrator/berita"));
            }
        }
      
    }

    public function beritakategoriedit()
    {      
        $variabel['csrf'] = csrf();
        $id_beritakategori = $this->input->post("id_beritakategori");
        $variabel['data'] = $this->m_beritakategori->lihatdatasatu($id_beritakategori)->row_array();
        $this->load->view("berita/beritakategori/v_beritakategori_edit",$variabel);
    }

    public function beritakategorieditproses()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'kategori'=> $this->input->post('kategori'),
                );
                $id_beritakategori = $this->input->post("id_beritakategori");
                $exec = $this->m_beritakategori->editdata($id_beritakategori,$array);
                if ($exec){
                 redirect(base_url("administrator/beritakategori?msg=0"));
                }
      } else {
      }
    }

    function beritakategorihapus()
    {
        $id_beritakategori = $this->input->get("id");
       
        $exec = $this->m_beritakategori->hapus($id_beritakategori);
        redirect(base_url()."administrator/beritakategori?msg=2");
    }
	
}