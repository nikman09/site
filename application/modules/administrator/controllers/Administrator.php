<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Administrator extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cekloginweb();
        $this->load->model("m_beritakategori");
        $this->load->model("m_berita");
        $this->load->model("m_bidang");
        $this->load->model("m_kegiatan");
        $this->load->model("m_kegiatankategori");
        $this->load->model("m_halaman");
        $this->load->model("m_admin");
        $this->load->model("m_dokumen");
        $this->load->model("m_dokumendetail");
        $this->load->model("m_jadwal");
        $this->load->model("m_jadwaldetail");
        $this->load->model("m_pesan");
        $this->load->model("m_navigasi");
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
            $username = $this->session->userdata("web_username");
            $array=array(
                'id_beritakategori'=> $this->input->post('beritakategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'status'=>$this->input->post('status'),
                'userinput'=>$username
                );
                $config['upload_path'] = './assets/images/berita';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
                $this->load->library('upload', $config);
                $this->upload->do_upload("foto");
                $upload = $this->upload->data();

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/berita/'.$upload["raw_name"].$upload["file_ext"];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 300;
                $config['height']       = 200;
                $config['new_image'] = './assets/images/berita/thumb/'.$upload["raw_name"].$upload["file_ext"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

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
        redirect(base_url()."administrator/berita?msg=2");
    }

    public function beritaedit()
    {   

        $variabel['csrf'] = csrf();
        $variabel['beritakategori'] = $this->m_beritakategori->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("web_username");
            $id_berita = $this->input->post('id_berita');
            $array=array(
                'id_beritakategori'=> $this->input->post('beritakategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'status'=>$this->input->post('status'),
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

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/berita/'.$upload["raw_name"].$upload["file_ext"];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 300;
                $config['height']       = 200;
                $config['new_image'] = './assets/images/berita/thumb/'.$upload["raw_name"].$upload["file_ext"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $query2 = $this->m_berita->lihatdatasatu($id_berita);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/berita/'.$berkas1temp.'';
                $path2 ='./assets/images/berita//thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                    unlink($path2); //menghapus gambar di folder berita
                }
               
            } 
                else if ($this->input->post('foto')=="") 
            {
                $query2 = $this->m_berita->lihatdatasatu($id_berita);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/berita/'.$berkas1temp.'';
                $path2 ='./assets/images/berita//thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                    unlink($path2); //menghapus gambar di folder berita
                }
                $array['foto']="";
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


    public function beritakategori()
    {   
        
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_beritakategori->lihatdata();
        $this->layout->render('berita/beritakategori/v_beritakategori',$variabel,'berita/beritakategori/v_beritakategori_js');
    }

    public function beritakategoritambah()
    {      
        $variabel['csrf'] = csrf();
        $username = $this->session->userdata("web_username");
        if ($this->input->post()) {
            $array=array(
                'kategori'=> $this->input->post('kategori'),
                'userinput'=>  $username,
            );
            $exec = $this->m_beritakategori->tambahdata($array);
                if ($exec){
                 redirect(base_url("administrator/beritakategori?msg=1"));
                }
      } else {
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

    public function beritakategorihapus()
    {
        $id_beritakategori = $this->input->get("id");
       
        $exec = $this->m_beritakategori->hapus($id_beritakategori);
        redirect(base_url()."administrator/beritakategori?msg=2");
    }

    public function bidang()
    {   
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_bidang->lihatdata();
        $this->layout->render('bidangkegiatan/bidang/v_bidang',$variabel,'bidangkegiatan/bidang/v_bidang_js');
   
    }

    public function bidangtambah()
    {   
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $array=array(
                'bidang'=> $this->input->post('bidang'),
                'tugas'=> $this->input->post('tugas')
                );
            $exec = $this->m_bidang->tambahdata($array);
            if ($exec) redirect(base_url("administrator/bidang?msg=1"));
            else redirect(base_url("administrator/bidangtambah?msg=0"));
        }
        else {
            $this->layout->render('bidangkegiatan/bidang/v_bidang_tambah',$variabel,'bidangkegiatan/bidang/v_bidang_tambah_js');
        }
       
    }

    function bidanghapus()
    {
        $id_bidang = $this->input->get("id");
        $exec = $this->m_bidang->hapus($id_bidang);
        redirect(base_url()."administrator/bidang?msg=2");
    }


    public function bidangedit()
    {   

        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id_bidang = $this->input->post('id_bidang');
            $array=array(
                'bidang'=> $this->input->post('bidang'), 
                'tugas'=>$this->input->post('tugas'),
            );
            
           
            $exec = $this->m_bidang->editdata($id_bidang,$array);
            if ($exec) redirect(base_url("administrator/bidangedit?id=".$id_bidang."&msg=1"));
            else redirect(base_url("administrator/bidangedit?id=".$id_bidang."&msg=0"));

        } else {
            $id_bidang = $this->input->get("id");
            $exec = $this->m_bidang->lihatdatasatu($id_bidang);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->render('bidangkegiatan/bidang/v_bidang_edit',$variabel,'bidangkegiatan/bidang/v_bidang_edit_js');
            } else {
                redirect(base_url("administrator/bidang"));
            }
        }
      
    }

    public function kegiatankategori()
    {   
        
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_kegiatankategori->lihatdata();
        $this->layout->render('bidangkegiatan/kegiatankategori/v_kegiatankategori',$variabel,'bidangkegiatan/kegiatankategori/v_kegiatankategori_js');
    }

    public function kegiatankategoritambah()
    {      
        $variabel['csrf'] = csrf();
        $username = $this->session->userdata("web_username");
        if ($this->input->post()) {
            $array=array(
                'kategori'=> $this->input->post('kategori'),
                'userinput'=>   $username 
            );
            $exec = $this->m_kegiatankategori->tambahdata($array);
                if ($exec){
                 redirect(base_url("administrator/kegiatankategori?msg=1"));
                }
      } else {
      }
    }


    
    public function kegiatankategoriedit()
    {      
        $variabel['csrf'] = csrf();
        $id_kegiatankategori = $this->input->post("id_kegiatankategori");
        $variabel['data'] = $this->m_kegiatankategori->lihatdatasatu($id_kegiatankategori)->row_array();
        $this->load->view("bidangkegiatan/kegiatankategori/v_kegiatankategori_edit",$variabel);
    }

    public function kegiatankategorieditproses()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
                 $array=array(
                'kategori'=> $this->input->post('kategori'),
                );
                $id_kegiatankategori = $this->input->post("id_kegiatankategori");
                $exec = $this->m_kegiatankategori->editdata($id_kegiatankategori,$array);
                if ($exec){
                 redirect(base_url("administrator/kegiatankategori?msg=0"));
                }
      } else {
      }
    }

    public function kegiatankategorihapus()
    {
        $id_kegiatankategori = $this->input->get("id");
       
        $exec = $this->m_kegiatankategori->hapus($id_kegiatankategori);
        redirect(base_url()."administrator/kegiatankategori?msg=2");
    }


    public function kegiatan()
    {   
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_kegiatan->lihatdata();
        $this->layout->render('bidangkegiatan/kegiatan/v_kegiatan',$variabel,'bidangkegiatan/kegiatan/v_kegiatan_js');
    }
   
    public function kegiatantambah()
       
    {   
        $variabel['csrf'] = csrf();
        $variabel['kegiatankategori'] = $this->m_kegiatankategori->lihatdata();
        $variabel['bidang'] = $this->m_bidang->lihatdata();
        if ($this->input->post()){
            $username = $this->session->userdata("web_username");
            $array=array(
                'id_kegiatankategori'=> $this->input->post('kegiatankategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'id_bidang'=>$this->input->post('bidang'),
                'status'=>$this->input->post('status'),
                'userinput'=>$username
                );
                $config['upload_path'] = './assets/images/kegiatan';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
                $this->load->library('upload', $config);
                $this->upload->do_upload("foto");
                $upload = $this->upload->data();

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/kegiatan/'.$upload["raw_name"].$upload["file_ext"];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 300;
                $config['height']       = 200;
                $config['new_image'] = './assets/images/kegiatan/thumb/'.$upload["raw_name"].$upload["file_ext"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $file = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$file;
                $exec = $this->m_kegiatan->tambahdata($array);
                if ($exec) redirect(base_url("administrator/kegiatan?msg=1"));
                else redirect(base_url("administrator/kegiatantambah?msg=0"));
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
        redirect(base_url()."administrator/kegiatan?msg=2");
    }

    public function kegiatanedit()
    {   

        $variabel['csrf'] = csrf();
        $variabel['kegiatankategori'] = $this->m_kegiatankategori->lihatdata();
        $variabel['bidang'] = $this->m_bidang->lihatdata();
        if ($this->input->post()) {
            $username = $this->session->userdata("web_username");
            $id_kegiatan = $this->input->post('id_kegiatan');
            $array=array(
                'id_kegiatankategori'=> $this->input->post('kegiatankategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'id_bidang'=>$this->input->post('bidang'),
                'status'=>$this->input->post('status'),
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

                
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/kegiatan/'.$upload["raw_name"].$upload["file_ext"];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 300;
                $config['height']       = 200;
                $config['new_image'] = './assets/images/kegiatan/thumb/'.$upload["raw_name"].$upload["file_ext"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $query2 = $this->m_kegiatan->lihatdatasatu($id_kegiatan);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/kegiatan/'.$berkas1temp.'';
                $path2 ='./assets/images/kegiatan/thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1);
                    unlink($path2); 
                }
            
               
            } 
            else if ($this->input->post('foto')=="") 
            {
                $query2 = $this->m_kegiatan->lihatdatasatu($id_kegiatan);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/kegiatan/'.$berkas1temp.'';
                $path2 ='./assets/images/kegiatan//thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); 
                    unlink($path2);
                }
                $array['foto']="";
            }
           
            $exec = $this->m_kegiatan->editdata($id_kegiatan,$array);
            if ($exec) redirect(base_url("administrator/kegiatanedit?id=".$id_kegiatan."&msg=1"));
            else redirect(base_url("administrator/kegiatanedit?id=".$id_kegiatan."&msg=0"));

        } else {
            $id_kegiatan = $this->input->get("id");
            $exec = $this->m_kegiatan->lihatdatasatu($id_kegiatan);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->render('bidangkegiatan/kegiatan/v_kegiatan_edit',$variabel,'bidangkegiatan/kegiatan/v_kegiatan_edit_js');
            } else {
                redirect(base_url("administrator/kegiatan"));
            }
        }
      
    }

    public function halaman()
    {   
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_halaman->lihatdata();
        $this->layout->render('halaman/v_halaman',$variabel,'halaman/v_halaman_js');
   
    }
   
    public function halamantambah()
    {   
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $username = $this->session->userdata("web_username");
            $array=array(
                'judul'=> $this->input->post('judul'),
                'isi'=>$this->input->post('isi'),
                'userinput'=>$username
                );
                $config['upload_path'] = './assets/images/halaman';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
                $this->load->library('upload', $config);
                $this->upload->do_upload("foto");
                $upload = $this->upload->data();
                $file = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$file;
                $exec = $this->m_halaman->tambahdata($array);
                if ($exec) redirect(base_url("administrator/halaman?msg=1"));
                else redirect(base_url("administrator/halamantambah?msg=0"));
        }
        else {
            $this->layout->render('halaman/v_halamantambah',$variabel,'halaman/v_halamantambah_js');
        }
       
    }

    public function halamanhapus()
    {
        $id_halaman = $this->input->get("id");
        $query2 = $this->m_halaman->lihatdatasatu($id_halaman);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 ='./assets/images/halaman/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_halaman->hapus($id_halaman);
        redirect(base_url()."administrator/halaman?msg=2");
    }

    public function halamanedit()
    {   

        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $username = $this->session->userdata("web_username");
            $id_halaman = $this->input->post('id_halaman');
            $array=array(
                'judul'=> $this->input->post('judul'),
                'isi'=>$this->input->post('isi'),
                'userinput'=>$username
            );
            $config['upload_path'] = './assets/images/halaman';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto"))
            {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$foto;

                $query2 = $this->m_halaman->lihatdatasatu($id_halaman);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/halaman/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
               
            } 
            else if ($this->input->post('foto')=="") 
            {
                $query2 = $this->m_halaman->lihatdatasatu($id_halaman);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/halaman/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                $array['foto']="";
            }
           
            $exec = $this->m_halaman->editdata($id_halaman,$array);
            if ($exec) redirect(base_url("administrator/halamanedit?id=".$id_halaman."&msg=1"));
            else redirect(base_url("administrator/halamanedit?id=".$id_halaman."&msg=0"));

        } else {
            $id_halaman = $this->input->get("id");
            $exec = $this->m_halaman->lihatdatasatu($id_halaman);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->render('halaman/v_halaman_edit',$variabel,'halaman/v_halaman_edit_js');
            } else {
                redirect(base_url("administrator/halaman"));
            }
        }
      
    }


    
 public function admin()
 {   
     $variabel['csrf'] = csrf();
     $variabel['data'] = $this->m_admin->lihatdata();
     $this->layout->render('admin/v_admin',$variabel,'admin/v_admin_js');

 }

 public function admintambah()
    
 {   
     $variabel['csrf'] = csrf();
     $variabel['bidang'] = $this->m_bidang->lihatdata();
     if ($this->input->post()){
         $username = $this->session->userdata("web_username");

         $this->form_validation->set_rules('username','Username','required|trim|is_unique[tb_administrator.username]');
         if($this->form_validation->run() != false){
             $array=array(
                 'nama'=> $this->input->post('nama'),
                 'username'=> $this->input->post('username'),
                 'jk'=>$this->input->post('jk'),
                 'email'=>$this->input->post('email'),
                 'nohp'=>$this->input->post('nohp'),
                 'alamat'=>$this->input->post('alamat'),
                 'password'=>md5($this->input->post('password')),
                 'rule'=>"user",
                 'id_bidang'=>$this->input->post('bidang'),
                 );
                
             $config['upload_path'] = './assets/images/admin';
             $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
             $this->load->library('upload', $config);
             $this->upload->do_upload("foto");
             $upload = $this->upload->data();
             $file = $upload["raw_name"].$upload["file_ext"];
             $array['foto']=$file;
             $exec = $this->m_admin->tambahdata($array);
                if ($exec) redirect(base_url("administrator/admin?msg=1"));
                else redirect(base_url("administrator/admintambah?msg=0"));
         }else{
            $this->layout->render('admin/v_admintambah',$variabel,'admin/v_admintambah_js');
          }

     }
     else {
         $this->layout->render('admin/v_admintambah',$variabel,'admin/v_admintambah_js');
     }
    
 }

 public function adminhapus()
 {
     $username = $this->input->get("id");
     $query2 = $this->m_admin->lihatdatasatu($username);
     $row2 = $query2->row();
     $berkas1temp = $row2->foto;
     $path1 ='./assets/images/admin/'.$berkas1temp.'';
     if(is_file($path1)) {
         unlink($path1);
     }
     $exec = $this->m_admin->hapus($username);
     redirect(base_url()."administrator/admin?msg=2");
 }

 public function adminedit()
 {   

     $variabel['csrf'] = csrf();
     $variabel['bidang'] = $this->m_bidang->lihatdata();
     if ($this->input->post()) {
        $username = $this->input->post('username');
        $username2 = $this->input->post('username2');
        if ( $username!= $username2) {
            $is_unique =  '|is_unique[tb_administrator.username]';
         } else {
            $is_unique =  '';
         }
         $this->form_validation->set_rules('username','Username','required|trim'. $is_unique.'');
         if($this->form_validation->run() != false){
          
            $array=array(
                'nama'=> $this->input->post('nama'),
                'username'=> $this->input->post('username'),
                'jk'=>$this->input->post('jk'),
                'email'=>$this->input->post('email'),
                'nohp'=>$this->input->post('nohp'),
                'alamat'=>$this->input->post('alamat'),
                'id_bidang'=>$this->input->post('bidang'),
            );
            $config['upload_path'] = './assets/images/admin';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto"))
            {
                $upload = $this->upload->data();
                $foto = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$foto;

                $query2 = $this->m_admin->lihatdatasatu($username);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/admin/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder admin
                }
                
            }  else if ($this->input->post('foto')=="") 
            {
                $query2 = $this->m_admin->lihatdatasatu($username);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/admin/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder halaman
                }
                echo   $path1;
               $array['foto']="";
            }
            
            $exec = $this->m_admin->editdata($username,$array);
            if ($exec) redirect(base_url("administrator/adminedit?id=".$username."&msg=1"));
            else redirect(base_url("administrator/adminedit?id=".$username."&msg=0"));
        } else  {
            $username = $this->input->get("web_username");
            $exec = $this->m_admin->lihatdatasatu($username);
            $variabel['error'] = 0;
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                
                $this->layout->renderadmin('admin/v_admin_edit',$variabel,'admin/v_padmin_edit_js');
            } else {
                redirect(base_url("administrator/admin"));
            }
        
    }   

     } else {
         $username = $this->input->get("id");
         $exec = $this->m_admin->lihatdatasatu($username);
         if ($exec->num_rows()>0){
             $variabel['data'] = $exec ->row_array();
             $this->layout->render('admin/v_admin_edit',$variabel,'admin/v_admin_edit_js');
         } else {
             redirect(base_url("administrator/admin"));
         }
     }
   
 }

 function gantipassword()
    {
        $username = $this->input->post("web_username");
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_admin->lihatdatasatu($username)->row_array();
        $this->load->view("admin/v_password",$variabel);
    }

    
    public function dokumen()
    {   
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_dokumen->lihatdata();
        $this->layout->render('dokumen/v_dokumen',$variabel,'dokumen/v_dokumen_js');
   
    }
    
    public function dokumentambah()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'judul'=> $this->input->post('judul'),
                'keterangan'=> $this->input->post('keterangan') 
            );
            $exec = $this->m_dokumen->tambahdata($array);
                if ($exec){
                 redirect(base_url("administrator/dokumen?msg=1"));
                }
      } else {
      }
    }


    
    public function dokumenedit()
    {      
        $variabel['csrf'] = csrf();
        $id_dokumen = $this->input->post("id_dokumen");
        $variabel['data'] = $this->m_dokumen->lihatdatasatu($id_dokumen)->row_array();
        $this->load->view("dokumen/v_dokumen_edit",$variabel);
    }

    public function dokumeneditproses()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
            'judul'=> $this->input->post('judul'),
            'keterangan'=> $this->input->post('keterangan') 
            );
            $id_dokumen = $this->input->post("id_dokumen");
            $exec = $this->m_dokumen->editdata($id_dokumen,$array);
            if ($exec){
                redirect(base_url("administrator/dokumen?msg=0"));
            }
      } else {
      }
    }

    public function dokumenhapus()
    {
        $id_dokumen = $this->input->get("id");
       
        $exec = $this->m_dokumen->hapus($id_dokumen);
        redirect(base_url()."administrator/dokumen?msg=2");
    }

    public function dokumendetail()
    {   
        $variabel['csrf'] = csrf();
        $id_dokumen = $this->input->get("id");
        $exec = $this->m_dokumen->lihatdatasatu($id_dokumen);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $exec2 = $this->m_dokumendetail->lihatdatadokumen($id_dokumen);
            $variabel['data2'] = $exec2;
            $this->layout->render('dokumen/dokumendetail/v_dokumendetail',$variabel,'dokumen/dokumendetail/v_dokumendetail_js');
        } else {
            redirect(base_url("administrator/dokumen"));
        }
        
    }


    public function dokumendetailtambah()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id_dokumen = $this->input->post('id_dokumen');
            $array=array(
                'judul'=> $this->input->post('judul'),
                'id_dokumen'=> $id_dokumen,
                'keterangan'=> $this->input->post('keterangan'),
            );

            //asdad
            $config['upload_path'] = './assets/images/dokumen';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("dokumen");
            $upload = $this->upload->data();
            $file = $upload["raw_name"].$upload["file_ext"];
            $array['dokumen']=$file;
       
            
            //adasd

            $exec = $this->m_dokumendetail->tambahdata($array);
                if ($exec){
                 redirect(base_url("administrator/dokumendetail?id=".$id_dokumen."&msg=1"));
                }   else redirect(base_url("administrator/dokumendetailtamabah?msg=0"));
      } else {
      }
    }

    public function dokumendetailhapus()
    {
        $id_dokumendetail = $this->input->get("id");
        $query2 = $this->m_dokumendetail->lihatdatasatu($id_dokumendetail);
        $row2 = $query2->row();
        $berkas1temp = $row2->dokumen;
        $path1 ='./assets/images/dokumen/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $id_dokumen = $row2->id_dokumen;
        $exec = $this->m_dokumendetail->hapus($id_dokumendetail);
        redirect(base_url()."administrator/dokumendetail?msg=2&id=".$id_dokumen."");
    }

    public function dokumendetailedit()
    {      
        $variabel['csrf'] = csrf();
        $id_dokumendetail = $this->input->post("id_dokumendetail");
        $variabel['data'] = $this->m_dokumendetail->lihatdatasatu($id_dokumendetail)->row_array();
        $this->load->view("dokumen/dokumendetail/v_dokumendetail_edit",$variabel);
    }

    public function dokumendetaileditproses()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id_dokumen = $this->input->post('id_dokumen');
            $array=array(
                'judul'=> $this->input->post('judul'),
                'id_dokumen'=> $id_dokumen,
                'keterangan'=> $this->input->post('keterangan')
            );
            
            $id_dokumendetail = $this->input->post("id_dokumendetail");
            $config['upload_path'] = './assets/images/dokumen';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DO|docx|DOCX';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("dokumen"))    
            {
                $upload = $this->upload->data();
                $dokumen = $upload["raw_name"].$upload["file_ext"];
                $array['dokumen']=$dokumen;
                $query2 = $this->m_dokumendetail->lihatdatasatu($id_dokumendetail);
                $row2 = $query2->row();
                $berkas1temp = $row2->dokumen;
                $path1 ='./assets/images/dokumen/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                }
            }

            $exec = $this->m_dokumendetail->editdata($id_dokumendetail,$array);
            if ($exec){
                redirect(base_url("administrator/dokumendetail?msg=0&id=".$id_dokumen.""));
            }
      } else {
      }
    }


    public function jadwal()
    {   
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_jadwal->lihatdata();
        $this->layout->render('jadwal/v_jadwal',$variabel,'jadwal/v_jadwal_js');
    }
    
    public function jadwaltambah()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'nama'=> $this->input->post('nama'),
                'keterangan'=> $this->input->post('keterangan') 
            );
            $exec = $this->m_jadwal->tambahdata($array);
                if ($exec){
                 redirect(base_url("administrator/jadwal?msg=1"));
                }
      } else {
      }
    }


    
    public function jadwaledit()
    {      
        $variabel['csrf'] = csrf();
        $id_jadwal = $this->input->post("id_jadwal");
        $variabel['data'] = $this->m_jadwal->lihatdatasatu($id_jadwal)->row_array();
        $this->load->view("jadwal/v_jadwal_edit",$variabel);
    }

    public function jadwaleditproses()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
            'nama'=> $this->input->post('nama'),
            'keterangan'=> $this->input->post('keterangan') 
            );
            $id_jadwal = $this->input->post("id_jadwal");
            $exec = $this->m_jadwal->editdata($id_jadwal,$array);
            if ($exec){
                redirect(base_url("administrator/jadwal?msg=0"));
            }
      } else {
      }
    }

    public function jadwalhapus()
    {
        $id_jadwal = $this->input->get("id");
       
        $exec = $this->m_jadwal->hapus($id_jadwal);
        redirect(base_url()."administrator/jadwal?msg=2");
    }


    public function jadwaldetail()
    {   
        $variabel['csrf'] = csrf();
        $id_jadwal = $this->input->get("id");
        $exec = $this->m_jadwal->lihatdatasatu($id_jadwal);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $exec2 = $this->m_jadwaldetail->lihatdatajadwal($id_jadwal);
            $variabel['data2'] = $exec2;
            $this->layout->render('jadwal/jadwaldetail/v_jadwaldetail',$variabel,'jadwal/jadwaldetail/v_jadwaldetail_js');
        } else {
            redirect(base_url("administrator/jadwal"));
        }
        
    }


    public function jadwaldetailtambah()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id_jadwal = $this->input->post('id_jadwal');
            $array=array(
                'nama'=> $this->input->post('nama'),
                'id_jadwal'=> $id_jadwal,
                'tanggal'=> $this->input->post('tanggal'),
                'keterangan'=> $this->input->post('keterangan'),
            );

            //asdad
            $config['upload_path'] = './assets/images/jadwal';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("dokumen");
            $upload = $this->upload->data();
            $file = $upload["raw_name"].$upload["file_ext"];
            $array['dokumen']=$file;
            $exec = $this->m_jadwaldetail->tambahdata($array);
                if ($exec){
                 redirect(base_url("administrator/jadwaldetail?id=".$id_jadwal."&msg=1"));
                }   else redirect(base_url("administrator/jadwaldetailtamabah?msg=0"));
      } else {
      }
    }

    public function jadwaldetailhapus()
    {
        $id_jadwaldetail = $this->input->get("id");
        $query2 = $this->m_jadwaldetail->lihatdatasatu($id_jadwaldetail);
        $row2 = $query2->row();
        $berkas1temp = $row2->dokumen;
        $path1 ='./assets/images/jadwal/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $id_jadwal = $row2->id_jadwal;
        $exec = $this->m_jadwaldetail->hapus($id_jadwaldetail);
        redirect(base_url()."administrator/jadwaldetail?msg=2&id=".$id_jadwal."");
    }

    public function jadwaldetailedit()
    {      
        $variabel['csrf'] = csrf();
        $id_jadwaldetail = $this->input->post("id_jadwaldetail");
        $variabel['data'] = $this->m_jadwaldetail->lihatdatasatu($id_jadwaldetail)->row_array();
        $this->load->view("jadwal/jadwaldetail/v_jadwaldetail_edit",$variabel);
    }

    public function jadwaldetaileditproses()
    {      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $id_jadwal = $this->input->post('id_jadwal');
            $array=array(
                'nama'=> $this->input->post('nama'),
                'id_jadwal'=> $id_jadwal,
                'tanggal'=> $this->input->post('tanggal'),
                'keterangan'=> $this->input->post('keterangan')
            );
            
            $id_jadwaldetail = $this->input->post("id_jadwaldetail");
            $config['upload_path'] = './assets/images/jadwal';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DO|docx|DOCX';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("dokumen"))    
            {
                $upload = $this->upload->data();
                $dokumen = $upload["raw_name"].$upload["file_ext"];
                $array['dokumen']=$dokumen;
                $query2 = $this->m_jadwaldetail->lihatdatasatu($id_jadwaldetail);
                $row2 = $query2->row();
                $berkas1temp = $row2->dokumen;
                $path1 ='./assets/images/jadwal/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                }
            }

            $exec = $this->m_jadwaldetail->editdata($id_jadwaldetail,$array);
            if ($exec){
                redirect(base_url("administrator/jadwaldetail?msg=0&id=".$id_jadwal.""));
            }
      } else {
      }
    }


    public function pesan()
    {   
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_pesan->lihatdata();
        $this->layout->render('kontak/pesan/v_pesan',$variabel,'kontak/pesan/v_pesan_js');
   
    }

    public function pesanlihat()
    {   
        $id_pesan = $this->input->get("id");
        $exec = $this->m_pesan->lihatdatasatu($id_pesan);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('kontak/pesan/v_pesanlihat',$variabel,'kontak/pesan/v_pesan_js');
        } else {
           // redirect(base_url("administrator"));
        }

    }

    public function pesanhapus()
    {
        $id_pesan = $this->input->get("id");
        $exec = $this->m_pesan->hapus($id_pesan);
        redirect(base_url()."administrator/pesan?msg=2");
    }


    public function filemanager()
    {
        $data['title']      = 'Pustaka Media';
        $data['subtitle']   = '';
        $data['body']       = 'file/index';
        $this->layout->render('filemanager/v_filemanager', $data);
    }
	
    
    
    public function navigasimenu()
    {   
        $data['csrf'] = csrf();
        $data['page'] = $this->m_navigasi->get_nested();
        $data['data'] = $this->m_navigasi->lihatdatapar();
        $this->layout->render('menunavigasi/v_menunavigasi',$data,'menunavigasi/v_menunavigasi_js');
   
    }

    public function navigasimenu2()
    {   
       $array=  $this->m_navigasi->get_nested();  
       echo '<pre>'; print_r($array); echo '</pre>';
    }

    public function order_save()
	{
        $variabel['csrf'] = csrf();
		if(isset($_POST['sortable'])){
			$this->m_navigasi->save_order($_POST['sortable']);
		}
		
    }

    
    
    public function modulnavigasiajax()
	{
     
        $modul = $this->input->post("id_modul");
        if ($modul=="Laman")
        {
            $data = $this->m_halaman->lihatdata();
            echo '<label for="field-1" class="control-label">Laman</label>';
            echo '<select id="detail"  name="detail" class="form-control">';
            foreach($data->result_array() as $row){
                echo "<option value=".$row['id_halaman'].">".$row['judul']."</option>";
            }
            echo '</select>';
        } else if($modul=="Dokumen") {
            $data = $this->m_dokumen->lihatdata();
            echo '<label for="field-1" class="control-label">Dokumen</label>';
            echo '<select id="detail"  name="detail" class="form-control">';
            foreach($data->result_array() as $row){
                echo "<option value=".$row['id_dokumen'].">".$row['judul']."</option>";
            }
            echo '</select>';
        } else if($modul=="Kegiatan") {
            $data = $this->m_bidang->lihatdata();
            echo '<label for="field-1" class="control-label">Bidang</label>';
            echo '<select id="detail"  name="detail" class="form-control">';
            echo "<option value='all'>Semua Kegiatan</option>";
            foreach($data->result_array() as $row){
                echo "<option value=".$row['id_bidang'].">".$row['bidang']."</option>";
            }
            echo '</select>';
        } else if($modul=="Bidang") {
            $data = $this->m_bidang->lihatdata();
            echo '<label for="field-1" class="control-label">Bidang</label>';
            echo '<select id="detail"  name="detail" class="form-control">';
            foreach($data->result_array() as $row){
                echo "<option value=".$row['id_bidang'].">".$row['bidang']."</option>";
            }
            echo '</select>';
        } else if($modul=="Jadwal") {
            $data = $this->m_jadwal->lihatdata();
            echo '<label for="field-1" class="control-label">Jadwal</label>';
            echo '<select id="detail"  name="detail" class="form-control">';
            foreach($data->result_array() as $row){
                echo "<option value=".$row['id_jadwal'].">".$row['nama']."</option>";
            }
            echo '</select>';
        }   else if($modul=="URL") {
            echo '<label for="field-1" class="control-label">URL</label>';
            echo '<input type="text" id="url"  name="url" class="form-control" placeholder="Masukkan URL" />';
            echo "<br/>";
            echo '<label for="field-1" class="control-label">Target</label>';
            echo "<br/>";
            echo '<select id="target"  name="target" class="form-control">';
            echo '<option value="0">Default</option>';
            echo '<option value="1">Blank</option>';
            echo '</select>';
        }
      
        // $variabel['csrf'] = csrf();
		// if(isset($_POST['sortable'])){
		// 	$this->m_navigasi->save_order($_POST['sortable']);
		// }
		
    }
    

    public function modulparentajax()
	{

        $id_parent = $this->input->post("id_parent");
        if($id_parent=="0") {
            echo '<input type="hidden" id="parent2"  name="parent2" value="0" />';
           
        } else {
            $data = $this->m_navigasi->lihatdataparent($id_parent);
            if ($data->num_rows()>0) {
                echo '<label for="field-1" class="control-label">Parent II</label>';
                echo '<select id="parent2"  name="parent2" class="form-control">';
                echo "<option value='0'>Tidak Ada Parent</option>";
                foreach($data->result_array() as $row){
                    echo "<option value=".$row['id_navigasi'].">".$row['judul']."</option>";
                }
                echo '</select>';
            }
        }
      
    }
    

    public function navigasitambah()
	{

        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'judul'=> $this->input->post('judul'),
                'parent_id'=> $this->input->post('parent') ,
                'tipe'=> $this->input->post('modul')
            );
        $parent =  $this->input->post('parent');
        $modul = $this->input->post('modul');


        $last = $this->m_navigasi->id_terakhir();
        $array['order_id']= $last->order_id+1;

        if ($this->input->post('parent2')) {
            $array['parent_id'] =$this->input->post('parent2') ;
        }

        if ($modul=="Laman") {
            $array['url'] = "";
            $array['detail'] = $this->input->post('detail');
        } else if($modul=="Dokumen") {
            $array['url'] = "";
            $array['detail'] = $this->input->post('detail');
        } else if($modul=="Kegiatan") {
            $array['url'] = "";
            $array['detail'] = $this->input->post('detail');
        } else if($modul=="Bidang") {
            $array['url'] = "";
            $array['detail'] = $this->input->post('detail');
        } else if($modul=="Jadwal") {
            $array['url'] = "";
            $array['detail'] = $this->input->post('detail');
        } else if($modul=="Berita") {
            $array['url'] = "";
            $array['detail'] = "";
        } else if($modul=="Kontak") {
            $array['url'] = "";
            $array['detail'] = "";
        } else if($modul=="URL") {
            $array['url'] = $this->input->post('url');
            $array['target']= $this->input->post('target') ;
            $array['detail'] = "";
        }

           
        $exec = $this->m_navigasi->tambahdata($array);
            if ($exec){
                redirect(base_url("administrator/navigasimenu?msg=1"));
            }
      } else {
      }
      
    }
    
    public function navigasihapus()
    {
        $id_navigasi = $this->input->get("id");
        $exec = $this->m_navigasi->delete($id_navigasi);
        $datas = $this->m_navigasi->lihatdatasatuparent($id_navigasi);
        foreach($datas->result_array() as $row) {
            $exec = $this->m_navigasi->deleteparent($row['id_navigasi']);
        }
        $exec = $this->m_navigasi->deleteparent($id_navigasi);

        redirect(base_url()."administrator/navigasimenu?msg=2");
    }


    public function navigasiedit()
    {      

       
        $variabel['csrf'] = csrf();
        $id_navigasi = $this->input->post("id_navigasi");
        $variabel['item'] = $this->m_navigasi->lihatdatasatu($id_navigasi)->row_array();
        $variabel['data'] = $this->m_navigasi->lihatdatapar();
        
        $this->load->view("menunavigasi/v_menunavigasi_edit",$variabel);
    }

    public function navigasieditproses()
    {      
        $variabel['csrf'] = csrf();
        $id_navigasi = $this->input->post('id_navigasi');
        if ($this->input->post()) {
            if ($this->input->post()) {
                $array=array(
                    'judul'=> $this->input->post('judul'),
                    'tipe'=> $this->input->post('modul')
                );
            $parent =  $this->input->post('parent');
            $modul = $this->input->post('modul');
    

    
            if ($modul=="Laman") {
                $array['url'] = "";
                $array['detail'] = $this->input->post('detail');
            } else if($modul=="Dokumen") {
                $array['url'] = "";
                $array['detail'] = $this->input->post('detail');
            } else if($modul=="Kegiatan") {
                $array['url'] = "";
                $array['detail'] = $this->input->post('detail');
            } else if($modul=="Bidang") {
                $array['url'] = "";
                $array['detail'] = $this->input->post('detail');
            } else if($modul=="Jadwal") {
                $array['url'] = "";
                $array['detail'] = $this->input->post('detail');
            } else if($modul=="Berita") {
                $array['url'] = "";
                $array['target']= "" ;
                $array['detail'] = "";
            } else if($modul=="Kontak") {
                $array['url'] = "";
                $array['detail'] = "";
            } else if($modul=="URL") {
                $array['url'] = $this->input->post('url');
                $array['target']= $this->input->post('target') ;
                $array['detail'] = "";
            }
    
               
            $exec = $this->m_navigasi->editdata($id_navigasi,$array);
                if ($exec){
                    redirect(base_url("administrator/navigasimenu?msg=0"));
                }
          } else {
          }
      } else {
      }
    }


}