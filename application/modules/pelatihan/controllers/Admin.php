<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
      
    }

    public function index()
    {   
      cekloginadminpelatihan();
      akses("admin");
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
                    redirect(base_url("pelatihan/admin/".$_GET['m'].""));
                } else {
                    redirect(base_url("pelatihan/admin"));
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
         redirect(base_url('pelatihan/admin/login'));
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
            if ($exec) redirect(base_url("pelatihan/admin/pelatihantambah?msg=1"));
            else redirect(base_url("pelatihan/admin/pelatihantambah?msg=0"));
        }
        else {
            $this->layout->renderadmin('v_admin/pelatihan/v_pelatihantambah',$variabel,'v_admin/pelatihan/v_pelatihantambah_js');
        }
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
        redirect(base_url()."pelatihan/admin/pelatihan?msg=2");
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
            if ($exec) redirect(base_url("pelatihan/admin/pelatihanedit?id=".$id_pelatihan."&msg=1"));
            else redirect(base_url("pelatihan/admin/pelatihanedit?id=".$id_pelatihan."&msg=0"));

        } else {
            $id_pelatihan = $this->input->get("id");
            $exec = $this->m_admin_pelatihan->lihatdatasatu($id_pelatihan);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->renderadmin('v_admin/pelatihan/v_pelatihan_edit',$variabel,'v_admin/pelatihan/v_pelatihan_edit_js');
            } else {
                redirect(base_url("pelatihan/admin/pelatihan"));
            }
        }
      
    }

    public function seleksipendaftaran()
    {   
        cekloginadminpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_pelatihan");
        $this->load->model("m_admin/m_admin_pelatihandaftar");
        $username = $this->session->userdata("pelatihan_admin_username");
        $pelatihanaktif = $this->session->userdata("pelatihan_admin_pelatihanaktif");
        
        $variabel['data'] = $this->m_admin_pelatihandaftar->lihatdatapelatihandaftaraktif($pelatihanaktif);

          $this->layout->renderadmin('v_admin/seleksipendaftaran/v_seleksipendaftaran',$variabel,'v_admin/seleksipendaftaran/v_seleksipendaftaran_js');
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
                );
                $id_pelatihandaftar = $this->input->post("id_pelatihandaftar");
                $exec = $this->m_admin_pelatihandaftar->editdata($id_pelatihandaftar,$array);
                if ($exec){
                 redirect(base_url("pelatihan/admin/seleksipendaftaran?msg=0"));
                }
      } else {
      }

     
    }
 

}