<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cekloginuser();
        $this->load->model("m_beritakategori");
        $this->load->model("m_berita");
        $this->load->model("m_bidang");
        $this->load->model("m_kegiatan");
        $this->load->model("m_kegiatankategori");
    }

    // Dashboard
    public function index()
    {   
        $this->load->view('dashboard/v_home');
    }

    public function berita()
    {   
        $variabel['csrf'] = csrf();
        $username = $this->session->userdata("user_username");
        $variabel['data'] = $this->m_berita->lihatdata($username);
        $this->layout->render('berita/v_berita',$variabel,'berita/v_berita_js');
   
    }
   
    public function beritatambah()
    {   
        $variabel['csrf'] = csrf();
        $variabel['beritakategori'] = $this->m_beritakategori->lihatdata();
        if ($this->input->post()){
            $username = $this->session->userdata("user_username");
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
                if ($exec) redirect(base_url("user/berita?msg=1"));
                else redirect(base_url("user/beritatambah?msg=0"));
        }
        else {
            $this->layout->render('berita/v_beritatambah',$variabel,'berita/v_beritatambah_js');
        }
       
    }

    public function beritahapus()
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
        redirect(base_url()."user/berita?msg=2");
    }

    public function beritaedit()
    {   

        $variabel['csrf'] = csrf();
        $variabel['beritakategori'] = $this->m_beritakategori->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("user_username");
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
            if ($exec) redirect(base_url("user/beritaedit?id=".$id_berita."&msg=1"));
            else redirect(base_url("user/beritaedit?id=".$id_berita."&msg=0"));

        } else {
            $id_berita = $this->input->get("id");
            $exec = $this->m_berita->lihatdatasatu($id_berita);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->render('berita/v_berita_edit',$variabel,'berita/v_berita_edit_js');
            } else {
                redirect(base_url("user/berita"));
            }
        }
      
    }



    public function kegiatan()
    {   
        $variabel['csrf'] = csrf();
        $username = $this->session->userdata("user_username");
        $variabel['data'] = $this->m_kegiatan->lihatdata($username );
        $this->layout->render('bidangkegiatan/kegiatan/v_kegiatan',$variabel,'bidangkegiatan/kegiatan/v_kegiatan_js');
   
    }
   
    public function kegiatantambah()
    {   
        $variabel['csrf'] = csrf();
        $variabel['kegiatankategori'] = $this->m_kegiatankategori->lihatdata();
        $variabel['bidang'] = $this->m_bidang->lihatdata();
        if ($this->input->post()){
            $username = $this->session->userdata("user_username");
            $bidang = $this->session->userdata("user_bidang");
            $array=array(
                'id_kegiatankategori'=> $this->input->post('kegiatankategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'id_bidang'=>$bidang,
                'userinput'=>$username
                );
                $config['upload_path'] = './assets/images/kegiatan';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
                $this->load->library('upload', $config);
                $this->upload->do_upload("foto");
                $upload = $this->upload->data();
                $file = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$file;
                $exec = $this->m_kegiatan->tambahdata($array);
                if ($exec) redirect(base_url("user/kegiatan?msg=1"));
                else redirect(base_url("user/kegiatantambah?msg=0"));
        }
        else {
            $this->layout->render('bidangkegiatan/kegiatan/v_kegiatantambah',$variabel,'bidangkegiatan/kegiatan/v_kegiatantambah_js');
        }
       
    }

    public function kegiatanhapus()
    {
        $id_kegiatan = $this->input->get("id");
        $query2 = $this->m_kegiatan->lihatdatasatu($id_kegiatan);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 ='./assets/images/kegiatan/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_kegiatan->hapus($id_kegiatan);
        redirect(base_url()."user/kegiatan?msg=2");
    }

    public function kegiatanedit()
    {   
        $variabel['csrf'] = csrf();
        $variabel['kegiatankategori'] = $this->m_kegiatankategori->lihatdata();
        $variabel['bidang'] = $this->m_bidang->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("user_username");
            $id_kegiatan = $this->input->post('id_kegiatan');
            $array=array(
                'id_kegiatankategori'=> $this->input->post('kegiatankategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'userinput'=>$username
            );
            $config['upload_path'] = './assets/images/kegiatan';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto"))
            {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$foto;

                $query2 = $this->m_kegiatan->lihatdatasatu($id_kegiatan);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/kegiatan/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder kegiatan
                }
               
            }
           
            $exec = $this->m_kegiatan->editdata($id_kegiatan,$array);
            if ($exec) redirect(base_url("user/kegiatanedit?id=".$id_kegiatan."&msg=1"));
            else redirect(base_url("user/kegiatanedit?id=".$id_kegiatan."&msg=0"));

        } else {
            $id_kegiatan = $this->input->get("id");
            $exec = $this->m_kegiatan->lihatdatasatu($id_kegiatan);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->render('bidangkegiatan/kegiatan/v_kegiatan_edit',$variabel,'bidangkegiatan/kegiatan/v_kegiatan_edit_js');
            } else {
                redirect(base_url("user/kegiatan"));
            }
        }
      
    }

	
}