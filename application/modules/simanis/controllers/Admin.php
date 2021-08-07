<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
      
    }

    public function index()
    {   
      cekloginadminpelatihan();
      akses("admin","superadmin");
      $this->load->view("v_admin/dashboard/v_home");
    }
   
    public function login()
    {
        $this->load->model("m_admin/m_admin_login");
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
        $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $exec = $this->m_admin_login->ceklogin($username,$password);
            if ($exec->num_rows()>0) {
                $data = $exec->row_array();
                $data_session = array(
                    'pelatihan_admin_username' => $data['username'],
                    'pelatihan_admin_login' => "login",
                    'pelatihan_admin_nama'=> $data['nama'],
                    'pelatihan_admin_foto'=> $data['foto'],
                    'pelatihan_admin_bidang'=> $data['bidang'],
                    'pelatihan_admin_pelatihanaktif'=> $data['pelatihanaktif'],
                    'pelatihan_admin_rule'=> $data['rule']
                    );
                $this->session->set_userdata($data_session);
                if (isset($_GET['m'])) {
                    redirect(base_url("simanis/admin/".$_GET['m'].""));
                } else {
                    redirect(base_url("simanis/admin"));
                }
            } else {
                $variabel['gagal'] = '0';
                $variabel['bug'] =  $username;
                $this->load->view("v_admin/login/v_login",$variabel);
            }
        } else {
            $this->load->view("v_admin/login/v_login",$variabel);
        }
    }

    function logout() {
        $this->session->sess_destroy();
         redirect(base_url('simanis/admin/login'));
     }

    

    

     public function pelatihan()
    { 
        cekloginadminpelatihan();  
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_pelatihan");
        $username = $this->session->userdata("pelatihan_admin_username");
        $variabel['data'] = $this->m_admin_pelatihan->lihatdatauser($username);
        $this->layout->renderadmin('v_admin/pelatihan/v_pelatihan',$variabel,'v_admin/pelatihan/v_pelatihan_js');
   
    }

    public function pelatihantambah()
    {   
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_pelatihan");
        if ($this->input->post()){
            $username = $this->session->userdata("pelatihan_admin_username");
            $mulaipendaftaran = substr($this->input->post('tanggalpendaftaran'),0  ,10);
            $akhirpendaftaran = substr($this->input->post('tanggalpendaftaran'),13  ,10);
            $mulaipelatihan = substr($this->input->post('tanggalpelatihan'),0  ,10);
            $akhirpelatihan = substr($this->input->post('tanggalpelatihan'),13  ,10);
            $array=array(
                    'nama'=> $this->input->post('nama'),
                    'kategori'=> $this->input->post('kategori'),
                    'mulaipendaftaran'=>tanggalawal($mulaipendaftaran),
                    'akhirpendaftaran'=>tanggalawal($akhirpendaftaran),
                    'pengumuman'=>tanggalawal($this->input->post('tanggalpengumuman')),
                    'mulaipelatihan'=>tanggalawal($mulaipelatihan),
                    'akhirpelatihan'=>tanggalawal($akhirpelatihan),
                    'kuota'=>$this->input->post('kuota'),
                    'persyaratan'=>$this->input->post('persyaratan'),
                    'tempat'=>$this->input->post('tempat'),
                    'cp'=>$this->input->post('cp'),
                    'publish'=>$this->input->post('publish'),
                    'username'=>$username
                 );
            $config['upload_path'] = './assets/images/pelatihan/lampiran';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|docx';
            $this->load->library('upload', $config);
            $this->upload->do_upload("file");
            $upload = $this->upload->data();
            $file = $upload["raw_name"].$upload["file_ext"];
            $array['file']=$file;
            $exec = $this->m_admin_pelatihan->tambahdata($array);
            if ($exec) redirect(base_url("simanis/admin/pelatihantambah?msg=1"));
            else redirect(base_url("simanis/admin/pelatihantambah?msg=0"));
        }
        else {
            $this->layout->renderadmin('v_admin/pelatihan/v_pelatihantambah',$variabel,'v_admin/pelatihan/v_pelatihantambah_js');
        }
    }

    public function pendaftaranhapus()
    {
        cekloginadminpelatihan();
        $this->load->model("m_admin/m_admin_pelatihandaftar");
        $id_daftar = $this->input->get("id");
        $exec = $this->m_admin_pelatihandaftar->hapus($id_daftar);
        redirect(base_url()."simanis/admin/seleksipendaftaran?msg=2");
    }

    public function pelatihanhapus()
    {
        cekloginadminpelatihan();
        $this->load->model("m_admin/m_admin_pelatihan");
        $id_pelatihan = $this->input->get("id");
        $query2 = $this->m_admin_pelatihan->lihatdatasatu($id_pelatihan);
        $row2 = $query2->row();
        $berkas1temp = $row2->file;
        $path1 ='./assets/images/pelatihan/lampiran/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_admin_pelatihan->hapus($id_pelatihan);
        redirect(base_url()."simanis/admin/pelatihan?msg=2");
    }

    public function pelatihanedit()
    {   
        cekloginadminpelatihan();
        $this->load->model("m_admin/m_admin_pelatihan");
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $username = $this->session->userdata("pelatihan_admin_username");
            $mulaipendaftaran = substr($this->input->post('tanggalpendaftaran'),0  ,10);
            $akhirpendaftaran = substr($this->input->post('tanggalpendaftaran'),13  ,10);
            $mulaipelatihan = substr($this->input->post('tanggalpelatihan'),0  ,10);
            $akhirpelatihan = substr($this->input->post('tanggalpelatihan'),13  ,10);
            $id_pelatihan = $this->input->post('id_pelatihan');
            $array=array(
                'nama'=> $this->input->post('nama'),
                'kategori'=> $this->input->post('kategori'),
                'mulaipendaftaran'=>tanggalawal($mulaipendaftaran),
                'akhirpendaftaran'=>tanggalawal($akhirpendaftaran),
                'pengumuman'=>tanggalawal($this->input->post('tanggalpengumuman')),
                'mulaipelatihan'=>tanggalawal($mulaipelatihan),
                'akhirpelatihan'=>tanggalawal($akhirpelatihan),
                'kuota'=>$this->input->post('kuota'),
                'persyaratan'=>$this->input->post('persyaratan'),
                'tempat'=>$this->input->post('tempat'),
                'publish'=>$this->input->post('publish'),
                'cp'=>$this->input->post('cp'),
            );
            $config['upload_path'] = './assets/images/pelatihan/lampiran';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|docx';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("file"))
            {
                
                $upload = $this->upload->data();
                $file = $upload["raw_name"].$upload["file_ext"];
                $array['file']=$file;
                $query2 = $this->m_admin_pelatihan->lihatdatasatu($id_pelatihan);
                $row2 = $query2->row();
                $berkas1temp = $row2->file;
                $path1 ='./assets/images/pelatihan/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder pelatihan
                }
            } 
                else if ($this->input->post('file')=="") 
            {
                $query2 = $this->m_admin_pelatihan->lihatdatasatu($id_pelatihan);
                $row2 = $query2->row();
                $berkas1temp = $row2->file;
                $path1 ='./assets/images/pelatihan/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder pelatihan
                }
                $array['file']="";
            }
            
           
            $exec = $this->m_admin_pelatihan->editdata($id_pelatihan,$array);
            if ($exec) redirect(base_url("simanis/admin/pelatihanedit?id=".$id_pelatihan."&msg=1"));
            else redirect(base_url("simanis/admin/pelatihanedit?id=".$id_pelatihan."&msg=0"));

        } else {
            $id_pelatihan = $this->input->get("id");
            $exec = $this->m_admin_pelatihan->lihatdatasatu($id_pelatihan);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->renderadmin('v_admin/pelatihan/v_pelatihan_edit',$variabel,'v_admin/pelatihan/v_pelatihan_edit_js');
            } else {
                redirect(base_url("simanis/admin/pelatihan"));
            }
        }
      
    }

    public function perusahaan()
    {   
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_pelatihan_perusahaan");
        $this->load->model("m_admin/m_pelatihan_tahunan");
        $this->load->model("m_admin/m_pelatihan_produk");
        $this->load->model("m_admin/m_admin_akun");
        $id_akun = $this->input->get("id");
        $exec = $this->m_pelatihan_perusahaan->lihatdataakun($id_akun);
        $variabel['data'] = $exec;
        $variabel['biodata'] = $this->m_admin_akun->lihatdatasatu($id_akun)->row_array();
        $this->layout->renderadmin('v_admin/perusahaan/v_perusahaan',$variabel,'v_admin/perusahaan/v_perusahaan_js');
        
        
    }

    public function lihatperusahaan()
    {   
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_pelatihan_perusahaan");
        $this->load->model("m_admin/m_pelatihan_tahunan");
        $this->load->model("m_admin/m_pelatihan_produk");
        $id_akun = $this->input->get("idk");
        $id_perusahaan=$this->input->get("id");
        $exec = $this->m_pelatihan_perusahaan->lihatdataakunsatu($id_akun,$id_perusahaan);
        $variabel['data'] = $exec->row_array();
        $variabel['produk'] = $this->m_pelatihan_perusahaan->lihatproduk($id_perusahaan);
        $variabel['id_akun'] =$id_akun;
        $this->layout->renderadmin('v_admin/perusahaan/v_perusahaanlihat',$variabel,'v_admin/perusahaan/v_perusahaan_js');
      
    }

    public function produk()
    {   
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_pelatihan_produk");
        $this->load->model("m_admin/m_pelatihan_perusahaan");
        $id_akun = $this->input->get("idk");
        $id_perusahaan=$this->input->get("id");
        $perusahaan = $this->m_pelatihan_perusahaan->lihatdataakunsatu($id_akun,$id_perusahaan);
        if ($perusahaan->num_rows()>0){
          $exec = $this->m_pelatihan_produk->lihatdataakun($id_perusahaan);
          $variabel['data'] = $exec;
          $variabel['perusahaan'] = $perusahaan->row_array();
          $this->layout->renderadmin('v_admin/perusahaan/v_produk',$variabel,'v_admin/perusahaan/v_produk_js');

        } else redirect(base_url("simanis/admin/seleksipendaftaran"));
         
    } 

    public function lihatproduk()
    {   
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_pelatihan_perusahaan");
        $this->load->model("m_admin/m_pelatihan_produk");
        $id_produk=$this->input->get("id");
        $exec = $this->m_pelatihan_produk->lihatdatasatu($id_produk);
        $variabel['data'] = $exec->row_array();
        $variabel['pemasaran'] = $this->m_pelatihan_produk->lihatpemasaran($id_produk);
        $id_akun = $this->input->get("idk");
        $variabel['id_akun'] =$id_akun;
        $this->layout->renderadmin('v_admin/perusahaan/v_produklihat',$variabel,'v_admin/perusahaan/v_produk_js');
      
    }


    public function tahunan()
    {   
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_pelatihan_tahunan");
        $this->load->model("m_admin/m_pelatihan_perusahaan");
        $id_akun = $this->input->get("idk");
        $id_perusahaan=$this->input->get("id");
        $perusahaan = $this->m_pelatihan_perusahaan->lihatdataakunsatu($id_akun,$id_perusahaan);
        if ($perusahaan->num_rows()>0){
          $exec = $this->m_pelatihan_tahunan->lihatdataakun($id_perusahaan);
          $variabel['data'] = $exec;
          $variabel['perusahaan'] = $perusahaan->row_array();
          $this->layout->renderadmin('v_admin/perusahaan/v_tahunan',$variabel,'v_admin/perusahaan/V_tahunan_js');

        }
         
    }



    public function lihattahunan()
    {   
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_pelatihan_perusahaan");
        $this->load->model("m_admin/m_pelatihan_tahunan");
        $id_akun = $this->session->userdata("pelatihan_idakun");
        $id_tahunan=$this->input->get("id");
        $exec = $this->m_pelatihan_tahunan->lihatdatasatu($id_tahunan);
        $variabel['data'] = $exec->row_array();
        $id_akun = $this->input->get("idk");
        $variabel['id_akun'] =$id_akun;
        $this->layout->renderadmin('v_admin/perusahaan/v_tahunanlihat',$variabel,'v_admin/perusahaan/v_tahunan_js');
      
    }
    public function seleksipendaftaran()
    {   
        cekloginadminpelatihan();
        
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_pelatihan");
        $this->load->model("m_admin/m_admin_pelatihandaftar");
        $this->load->model("m_admin/m_admin_akun");
        $this->load->model("m_admin/m_admin_admin");
        $this->load->model("m_admin/m_admin_berkas");
        $this->load->model("m_admin/m_pelatihan_perusahaan");
        $this->load->model("m_admin/m_pelatihan_tahunan");
        $this->load->model("m_admin/m_pelatihan_produk");
        $username = $this->session->userdata("pelatihan_admin_username");
        $pelatihanaktif = $this->session->userdata("pelatihan_admin_pelatihanaktif");
        if ($this->input->post()) {
            $array=array(
                'pelatihanaktif'=> $this->input->post('pelatihanaktif')
            );
            $exec = $this->m_admin_admin->editdata($username,$array);
            $data_session = array(
                'pelatihan_admin_pelatihanaktif'=> $this->input->post('pelatihanaktif')
                );
            $this->session->set_userdata($data_session);
            if ($exec) redirect(base_url("simanis/admin/seleksipendaftaran?msg=1"));
            else redirect(base_url("simanis/admin/seleksipendaftaran?msg=0"));
        } else {
            $variabel['pelatihan'] = $this->m_admin_pelatihan->lihatdatauser($username);
            $exec = $this->m_admin_pelatihan->lihatdatasatu($pelatihanaktif);
            if ($exec->num_rows()>0){
                $variabel['detail'] = $exec ->row_array();
                $variabel['pelatihanaktif'] = $pelatihanaktif;
                $variabel['data'] = $this->m_admin_pelatihandaftar->lihatdatapelatihandaftaraktif($pelatihanaktif);
                $variabel['totalpendaftar'] = $this->m_admin_pelatihandaftar->totalpendaftar($pelatihanaktif);
                $variabel['menungguhasil'] = $this->m_admin_pelatihandaftar->menungguhasil($pelatihanaktif);
                $variabel['lulusseleksi'] = $this->m_admin_pelatihandaftar->lulusseleksi($pelatihanaktif);
                $variabel['tidaklulus'] = $this->m_admin_pelatihandaftar->tidaklulus($pelatihanaktif);
               
                $this->layout->renderadmin('v_admin/seleksipendaftaran/v_seleksipendaftaran',$variabel,'v_admin/seleksipendaftaran/v_seleksipendaftaran_js');
            } else {
                $this->layout->renderadmin('v_admin/seleksipendaftaran/v_seleksipendaftaranno',$variabel,'v_admin/seleksipendaftaran/v_seleksipendaftaran_js');
            }
        }
        
    }
    
	public function pendaftaranexcel()
    {   
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_pelatihandaftar");
        $pelatihanaktif = $this->session->userdata("pelatihan_admin_pelatihanaktif");
        $variabel['data'] = $this->m_admin_pelatihandaftar->lihatdatapelatihandaftaraktif($pelatihanaktif);
        $this->load->view('v_admin/seleksipendaftaran/v_seleksipendaftaranxl',$variabel);
               
    }
    
      public function cetakbiodata()
    {   
 
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $this->load->model("m_pelatihan/m_pelatihan_akun");
      $variabel['csrf'] = csrf();
      $id_akun = $this->input->get("id");
      $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatuakun($id_akun);
      if ($exec->num_rows()>0){
         $variabel["data"] = $exec->row_array();
         $this->load->view('v_pelatihan/cetak/v_cetak_pdf', $variabel);
      } else {
        redirect(base_url("simanis"));
      }
     
    } 

    public function biodatatampil()
    {      
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_akun");
        $id_akun = $this->input->post("id_akun");
        $variabel['data'] = $this->m_admin_akun->lihatdatasatu($id_akun)->row_array();
        $this->load->view("v_admin/seleksipendaftaran/v_biodata",$variabel);
    }

    public function usahatampil()
    {      
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_akun");
        $id_akun = $this->input->post("id_akun");
        $variabel['data'] = $this->m_admin_akun->lihatdatasatu($id_akun)->row_array();
        $this->load->view("v_admin/seleksipendaftaran/v_usaha",$variabel);
    }
    public function dukungtampil()
    {      
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_akun");
        $this->load->model("m_admin/m_admin_berkas");
        $id_akun = $this->input->post("id_akun");
        $variabel['data'] =  $this->m_admin_berkas->lihatdataakun($id_akun);
        $this->load->view("v_admin/seleksipendaftaran/v_dukung",$variabel);
    }

    public function seleksitampil()
    {      
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_akun");
        $this->load->model("m_admin/m_admin_pelatihandaftar");
        $id_pelatihandaftar = $this->input->post("id_pelatihandaftar");
        $variabel['data'] = $this->m_admin_pelatihandaftar->lihatdatasatu($id_pelatihandaftar)->row_array();
        $this->load->view("v_admin/seleksipendaftaran/v_seleksi",$variabel);
        
    }

   

    public function seleksiedit()
    {      
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_pelatihandaftar");
     
        if ($this->input->post()) {
            $array=array(
                 'status'=> $this->input->post('status'),
                 'keterangan'=> $this->input->post('keterangan'),
                );
                $id_pelatihandaftar = $this->input->post("id_pelatihandaftar");
                $exec = $this->m_admin_pelatihandaftar->editdata($id_pelatihandaftar,$array);
                if ($exec){
                 redirect(base_url("simanis/admin/seleksipendaftaran?msg=0"));
                }
      } else {
      }

     
    }

    
    public function pengumuman()
    {   
        $this->load->model("m_admin/m_admin_pengumuman");
        $variabel['csrf'] = csrf();
        $username = $this->session->userdata("pelatihan_admin_username");
        $variabel['data'] = $this->m_admin_pengumuman->lihatdatausername($username);
      
        $this->layout->renderadmin('v_admin/pengumuman/v_pengumuman',$variabel,'v_admin/pengumuman/v_pengumuman_js');
    }
   
    public function pengumumantambah()
    {   
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_pengumuman");
        if ($this->input->post()){
            $username = $this->session->userdata("pelatihan_admin_username");
            $array=array(
                'kategori'=> $this->input->post('kategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'status'=>$this->input->post('status'),
                'username'=>$username
                );
              

                $config['upload_path'] = './assets/images/pelatihan/pengumuman';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|docx';
                $this->load->library('upload', $config);
                $this->upload->do_upload("file");
                $upload = $this->upload->data();
                $file = $upload["raw_name"].$upload["file_ext"];
                $array['file']=$file;

                $config['upload_path'] = './assets/images/pelatihan/pengumuman';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
                $this->load->library('upload', $config);
                $this->upload->do_upload("foto");
                $upload = $this->upload->data();
                $file = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$file;

                

                $exec = $this->m_admin_pengumuman->tambahdata($array);
                if ($exec) redirect(base_url("simanis/admin/pengumuman?msg=1"));
                else redirect(base_url("simanis/admin/pengumumantambah?msg=0"));
        }
        else {
            $this->layout->renderadmin('v_admin/pengumuman/v_pengumumantambah',$variabel,'v_admin/pengumuman/v_pengumumantambah_js');
        }
       
    }

    public function pengumumanhapus()
    {
        $id_pengumuman = $this->input->get("id");
        $this->load->model("m_admin/m_admin_pengumuman");
        $query2 = $this->m_admin_pengumuman->lihatdatasatu($id_pengumuman);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $berkas2temp = $row2->file;
        $path1 ='./assets/images/pelatihan/pengumuman/'.$berkas1temp.'';
        $path2 ='./assets/images/pelatihan/pengumuman/'.$berkas2temp.'';
        if(is_file($path1) || is_file($path2)) {
            unlink($path1);
            unlink($path2);
        }
        $exec = $this->m_admin_pengumuman->hapus($id_pengumuman);
        redirect(base_url()."pelatihan/admin/pengumuman?msg=2");
    }

    public function pengumumanedit()
    {   

        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_pengumuman");   
        $username = $this->session->userdata("pelatihan_admin_username");
        if ($this->input->post()) {
            $username = $this->session->userdata("pelatihan_admin_username");
            $id_pengumuman = $this->input->post('id_pengumuman');
            $array=array(
                'kategori'=> $this->input->post('kategori'),
                'judul'=> $this->input->post('judul'),
                'tanggal'=>tanggalawal($this->input->post('tanggal')),
                'isi'=>$this->input->post('isi'),
                'status'=>$this->input->post('status'),
                'username'=>$username
            );
            $config['upload_path'] = './assets/images/pelatihan/pengumuman';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|docx';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("file"))
            {
                
                $upload = $this->upload->data();
                $file = $upload["raw_name"].$upload["file_ext"];
                $array['file']=$file;

                $query2 = $this->m_admin_pengumuman->lihatdatasatu($id_pengumuman);
                $row2 = $query2->row();
                $berkas1temp = $row2->file;
                $path1 ='./assets/images/pelatihan/pengumuman/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder pengumuman
                }
            } 
                else if ($this->input->post('file')=="") 
            {
                $query2 = $this->m_admin_pengumuman->lihatdatasatu($id_pengumuman);
                $row2 = $query2->row();
                $berkas1temp = $row2->file;
                $path1 ='./assets/images/pelatihan/pengumuman/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder pengumuman
                }
                $array['file']="";
            }

            $config['upload_path'] = './assets/images/pelatihan/pengumuman';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto"))
            {
                
                $upload = $this->upload->data();
                $foto = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$foto;

                $query2 = $this->m_admin_pengumuman->lihatdatasatu($id_pengumuman);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/pelatihan/pengumuman/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder pengumuman
                }
            } 
                else if ($this->input->post('foto')=="") 
            {
                $query2 = $this->m_admin_pengumuman->lihatdatasatu($id_pengumuman);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/pelatihan/pengumuman/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder pengumuman
                }
                $array['foto']="";
            }
            
           
            $exec = $this->m_admin_pengumuman->editdata($id_pengumuman,$array);
            if ($exec) redirect(base_url("simanis/admin/pengumumanedit?id=".$id_pengumuman."&msg=1"));
            else redirect(base_url("simanis/admin/pengumumanedit?id=".$id_pengumuman."&msg=0"));

        } else {
            $id_pengumuman = $this->input->get("id");
            $exec = $this->m_admin_pengumuman->lihatdatasatu($id_pengumuman);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->renderadmin('v_admin/pengumuman/v_pengumuman_edit',$variabel,'v_admin/pengumuman/v_pengumuman_edit_js');
            } else {
                redirect(base_url("simanis/admin/pengumuman"));
            }
        }
      
    }
 
    public function akun()
    { 
        cekloginadminpelatihan();  
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_akun");
        $username = $this->session->userdata("pelatihan_admin_username");
        $variabel['data'] = $this->m_admin_akun->lihatdata();
        $variabel['totalakun'] = $this->m_admin_akun->totalakun();
        $variabel['totalakunlakilaki'] = $this->m_admin_akun->totalakunlakilaki();
        $variabel['totalakunperempuan'] = $this->m_admin_akun->totalakunperempuan();
        $this->layout->renderadmin('v_admin/akun/v_akun',$variabel,'v_admin/akun/v_akun_js');
   
    }

  

    function gantipassword()
    {
        $this->load->model("m_admin/m_admin_akun");
        $id_akun = $this->input->post("id_akun");
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_admin_akun->lihatdatasatu($id_akun)->row_array();
        $this->load->view("v_admin/akun/v_password",$variabel);
    }
    function gantipasswordproses()
    {
        $this->load->model("m_admin/m_admin_akun");
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'password'=> md5($this->input->post('password')),
                );
                $id_akun = $this->input->post("id_akun");
                $exec = $this->m_admin_akun->editdata($id_akun,$array);
                if ($exec){
                 redirect(base_url("simanis/admin/akun?msg=2"));
                }
      } else {
      }

    }
 

    public function statistik()
    { 
        cekloginadminpelatihan();  
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_akun");
        $this->load->model("m_admin/m_admin_pelatihandaftar");
        $username = $this->session->userdata("pelatihan_admin_username");
        $variabel['data'] = $this->m_admin_pelatihandaftar->jumlahpendaftar();
        $variabel['totalakun'] = $this->m_admin_akun->totalakun();
        $this->layout->renderadmin('v_admin/statistik/v_statistik',$variabel,'v_admin/statistik/v_statistik_js');
   
    }

    public function resizee()
    { 
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_akun");
        $username = $this->session->userdata("pelatihan_admin_username");
        $data = $this->m_admin_akun->lihatdata();
        $i=0;
        $this->load->library('image_lib');
        foreach($data->result_array() as $row){

            if ($row["foto"]!="") {
                echo  $path1 ='./assets/images/pelatihan/biodata/'.$row["foto"];
    
                $config['image_library'] = 'gd2';
                $config['source_image'] =  $path1;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 600;
                $config['height']       = 400;
            
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                echo "<br/>";
            }
        }
        
      
    }


    public function resizee2()
    { 
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_akun");
        $username = $this->session->userdata("pelatihan_admin_username");
        $data = $this->m_admin_akun->lihatdata();
        $i=0;
        $this->load->library('image_lib');
        foreach($data->result_array() as $row){

            if ($row["foto"]!="") {
                echo  $path1 ='./assets/images/pelatihan/biodata/'.$row["ktp"];
    
                $config['image_library'] = 'gd2';
                $config['source_image'] =  $path1;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 600;
                $config['height']       = 400;
            
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                echo "<br/>";
            }
        }
        
      
    }

}