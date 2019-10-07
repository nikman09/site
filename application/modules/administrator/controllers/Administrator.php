<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Administrator extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        ceklogin();
        $this->load->model("m_beritakategori");
        $this->load->model("m_berita");
        $this->load->model("m_bidang");
        $this->load->model("m_kegiatan");
        $this->load->model("m_kegiatankategori");
        $this->load->model("m_halaman");
        $this->load->model("m_admin");
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


    public function beritakategori()
    {   
        
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_beritakategori->lihatdata();
        $this->layout->render('berita/beritakategori/v_beritakategori',$variabel,'berita/beritakategori/v_beritakategori_js');
    }

    public function beritakategoritambah()
    {      
        $variabel['csrf'] = csrf();
        $username = $this->session->userdata("username");
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
        $username = $this->session->userdata("username");
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
        $this->load->view("'bidangkegiatan/kegiatankategori/v_kegiatankategori_edit",$variabel);
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
            $username = $this->session->userdata("username");
            $array=array(
                'id_kegiatankategori'=> $this->input->post('kegiatankategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'id_bidang'=>$this->input->post('bidang'),
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
            $username = $this->session->userdata("username");
            $id_kegiatan = $this->input->post('id_kegiatan');
            $array=array(
                'id_kegiatankategori'=> $this->input->post('kegiatankategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'id_bidang'=>$this->input->post('bidang'),
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
            $username = $this->session->userdata("username");
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
            $username = $this->session->userdata("username");
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
            if ($this->input->post('hapusfoto')!=""){
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
         $username = $this->session->userdata("username");

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
                 'status'=>"Aktif",
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
     $id_admin = $this->input->get("id");
     $query2 = $this->m_admin->lihatdatasatu($id_admin);
     $row2 = $query2->row();
     $berkas1temp = $row2->foto;
     $path1 ='./assets/images/admin/'.$berkas1temp.'';
     if(is_file($path1)) {
         unlink($path1);
     }
     $exec = $this->m_admin->hapus($id_admin);
     redirect(base_url()."administrator/admin?msg=2");
 }

 public function adminedit()
 {   

     $variabel['csrf'] = csrf();
     $variabel['adminkategori'] = $this->m_adminkategori->lihatdata();
     $variabel['bidang'] = $this->m_bidang->lihatdata();
     if ($this->input->post()) {
         $username = $this->session->userdata("username");
         $id_admin = $this->input->post('id_admin');
         $array=array(
             'id_adminkategori'=> $this->input->post('adminkategori'),
             'judul'=> $this->input->post('judul'),
             'tanggal'=>tanggalawal($this->input->post('tanggal')),
             'isi'=>$this->input->post('isi'),
             'id_bidang'=>$this->input->post('bidang'),
             'userinput'=>$username
         );
         $config['upload_path'] = './assets/images/admin';
         $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
         $this->load->library('upload', $config);
         if ($this->upload->do_upload("foto"))
         {
             $upload = $this->upload->data();
             $foto = $upload["raw_name"].$upload["file_ext"];
             $array['foto']=$foto;

             $query2 = $this->m_admin->lihatdatasatu($id_admin);
             $row2 = $query2->row();
             $berkas1temp = $row2->foto;
             $path1 ='./assets/images/admin/'.$berkas1temp.'';
             if(is_file($path1)) {
                 unlink($path1); //menghapus gambar di folder admin
             }
            
         }
        
         $exec = $this->m_admin->editdata($id_admin,$array);
         if ($exec) redirect(base_url("administrator/adminedit?id=".$id_admin."&msg=1"));
         else redirect(base_url("administrator/adminedit?id=".$id_admin."&msg=0"));

     } else {
         $id_admin = $this->input->get("id");
         $exec = $this->m_admin->lihatdatasatu($id_admin);
         if ($exec->num_rows()>0){
             $variabel['data'] = $exec ->row_array();
             $this->layout->render('bidangadmin/admin/v_admin_edit',$variabel,'bidangadmin/admin/v_admin_edit_js');
         } else {
             redirect(base_url("administrator/admin"));
         }
     }
   
 }

 function gantipassword()
    {
        $username = $this->input->post("username");
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_admin->lihatdatasatu($username)->row_array();
        $this->load->view("admin/v_password",$variabel);
    }

	
}