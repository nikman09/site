<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Simanis extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
      
      
    }

    // Dashboard
    public function index()
    {   
      $this->load->model("m_pelatihan/m_pelatihan_pelatihan");
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $this->load->model("m_pelatihan/m_pelatihan_akun");
      $variabel['csrf'] = csrf();
      $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdatap();

      if ($this->session->userdata('pelatihan_status') == "login") {
       
        // Mencari Biodata Lengkap
        $id_akun = $this->session->userdata("pelatihan_idakun");
        $biodata= $this->m_pelatihan_akun->lihatdatasatu($id_akun)->row_array();
        $variabel['persen']= lengkap($biodata);
        // Akhir Biodata Lengkap
       
        $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatuakun($id_akun);
        if ($exec->num_rows()>0) {
          $variabel['ada'] = 1;
          $variabel['item'] = $exec->row_array();
        } else {
          $variabel['ada'] = 0;
        }
          $variabel['stat'] = "login";
        } else { 
          $variabel['stat'] = "";
        }
     
      $this->layout->renderpel("v_pelatihan/beranda/v_beranda",$variabel,"v_pelatihan/beranda/v_beranda_js");
    }



    public function Informasi()
    {   
      $this->load->model("m_pelatihan/m_pelatihan_pelatihan");
      $this->load->model("m_pelatihan/m_pelatihan_akun");
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $variabel['csrf'] = csrf();
      
      $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdatap();

      if ($this->session->userdata('pelatihan_status') == "login") {
       
        // Mencari Biodata Lengkap
        $id_akun = $this->session->userdata("pelatihan_idakun");
        $biodata= $this->m_pelatihan_akun->lihatdatasatu($id_akun)->row_array();
        $variabel['persen']= lengkap($biodata);
        // Akhir Biodata Lengkap

        $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatuakun($id_akun);
        if ($exec->num_rows()>0) {
          $variabel['ada'] = 1;
          $variabel['item'] = $exec->row_array();
        } else {
          $variabel['ada'] = 0;
        }
          $variabel['stat'] = "login";
        } else { 
          $variabel['stat'] = "";
        }

      $this->layout->renderpel("v_pelatihan/informasi/v_informasi",$variabel,"v_pelatihan/informasi/v_informasi_js");
    }

    public function Persyaratan()
    {   
      $this->load->model("m_pelatihan/m_pelatihan_pelatihan");
      $variabel['csrf'] = csrf();
      $id_pelatihan = $this->input->get("i");
    
      $exec = $this->m_pelatihan_pelatihan->lihatdatasatu($id_pelatihan);
      if ($exec->num_rows()>0) {
          $variabel['data'] = $exec->row_array();
          $this->layout->renderpel("v_pelatihan/persyaratan/v_persyaratan",$variabel,"v_pelatihan/persyaratan/v_persyaratan_js");
      } else {
          redirect(base_url("simanis"));
      }
     
    }

    

    public function akun()
    {   
      $this->load->model("m_pelatihan/m_pelatihan_akun");
      $variabel['csrf'] = csrf();
      if ($this->input->post()){
          $this->form_validation->set_rules('email','Email','required|trim|is_unique[pl_akun.email]');
          if($this->form_validation->run() != false){
              $array=array(
                  'email'=> $this->input->post('email'),
                  'nama'=> $this->input->post('nama'),
                  'password'=>md5($this->input->post('password')),
                  'tanggallahir'=>date("Y-m-d"),
              );

              $email =  $this->input->post('email');
              $nama = $this->input->post('nama');
                  
              $exec = $this->m_pelatihan_akun->tambahdata($array);
              if ($exec){
                
               
                $subject = 'Pendaftaran Akun SIMANIS Kalsel';
                $pesan = "Hi ".$nama." <br/> Selamat Telah Mendaftarkan Akun Di SIMANIS KALSEL(Sistem Informasi  Pendaftaran Mandiri Pelatihan Industri Kalimantan Selatan). Silahkan Lengkapi Formulir dan Pilih Pelatihan yang Tersedia. <br/>Terima Kasih  ";
                kirimemail($email,$subject,$pesan);
                  
                redirect(base_url("simanis/login?msg=1"));
              }
                else redirect(base_url("simanis/akun?msg=0"));
          }else{
            $this->layout->renderpel("v_pelatihan/akun/v_akun",$variabel,"v_pelatihan/akun/v_akun_js");
            }

      }
      else {
        $this->layout->renderpel("v_pelatihan/akun/v_akun",$variabel,"v_pelatihan/akun/v_akun_js");
      }
    
    }

    public function pelatihandaftar()
    {   
      cekloginpelatihan();
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $this->load->model("m_pelatihan/m_pelatihan_pelatihan");
      $variabel['csrf'] = csrf();

      
      $exec = $this->m_pelatihan_pelatihan->lihatdatasatu($this->input->get("i"));
      if ($exec->num_rows()>0) {
        $row = $exec->row_array();
        if (date("Y-m-d")>=$row['mulaipendaftaran'] && date("Y-m-d")<=$row['akhirpendaftaran']) {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatuakun($id_akun);
            if ($exec->num_rows()>0) {
              $item= $exec->row_array();
              if ($item["status"]=="Menunggu Hasil Seleksi") {
                redirect(base_url("simanis"));
              } else {
                // $exec2 = $this->m_pelatihan_pelatihandaftar->lihatdatasatupelatihan($this->input->get("i"));
                // if ($exec2->num_rows()>0) {
                  // redirect(base_url("simanis/ket"));

                // } else {
                  if ($this->input->get("i")){
                    $array=array(
                        'id_pelatihan'=> $this->input->get("i"),
                        'id_akun'=> $this->session->userdata("pelatihan_idakun"),
                        'status'=> "Menunggu Hasil Seleksi",
                        'konfirmasi'=> "Belum Konfirmasi",
                        
                    );
                    $id_pelatihan =$this->input->get("i");
                    $exec = $this->m_pelatihan_pelatihandaftar->tambahdata($array);
                    if ($exec) {
                      $iddaftar = $this->db->insert_id();
                      $nodaf1 = sprintf("%03d", $iddaftar);
                      $nodaf2 = sprintf("%03d", $id_pelatihan);
                      $array=array(
                        'nodaf'=> $nodaf1.$nodaf2,
                        
                    );
                    $exec = $this->m_pelatihan_pelatihandaftar->editdata($iddaftar,$array);
                      redirect(base_url("simanis/status?msg=1"));
                    } 
                      else {
                        redirect(base_url("simanis/status?msg=0"));
                      }
                  }
                  else {
                    redirect(base_url("simanis"));
                  }
                // }
              }
            } else {
              if ($this->input->get("i")){
            
                  $array=array(
                      'id_pelatihan'=> $this->input->get("i"),
                      'id_akun'=> $this->session->userdata("pelatihan_idakun"),
                      'status'=> "Menunggu Hasil Seleksi",
                      'konfirmasi'=> "Belum Konfirmasi",
                  );
                      
                  $id_pelatihan =$this->input->get("i");
                  $exec = $this->m_pelatihan_pelatihandaftar->tambahdata($array);
                  if ($exec) {
                    $iddaftar = $this->db->insert_id();
                    $nodaf1 = sprintf("%03d", $id_pelatihan);
                    $nodaf2 = sprintf("%03d", $iddaftar);
                    $array=array(
                      'nodaf'=> $nodaf1.$nodaf2,
                      
                  );
                  $exec = $this->m_pelatihan_pelatihandaftar->editdata($iddaftar,$array);
                    redirect(base_url("simanis/status?msg=1"));
                  } 
                    else {
                      redirect(base_url("simanis/status?msg=0"));
                    }
                }
                else {
                  redirect(base_url("simanis"));
                }
            }
       } else {
        redirect(base_url("simanis"));
       }
      } else {
        redirect(base_url("simanis"));
      }
       
    
    }
    
    

    public function status()
    {   
        cekloginpelatihan();
        $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
        $this->load->model("m_pelatihan/m_pelatihan_akun");
        $variabel['csrf'] = csrf();
        $id_akun = $this->session->userdata("pelatihan_idakun");
        $id_pelatihandaftar =  $this->input->post('id_pelatihandaftar');
        if ($this->input->post()) {
        $array=array(
            'konfirmasi'=> $this->input->post('konfirmasi'),
            'alasan'=> $this->input->post('alasan')
        );
        $exec = $this->m_pelatihan_pelatihandaftar->editdata($id_pelatihandaftar,$array);
        if ($exec) redirect(base_url("simanis/status?msg=2"));
        else redirect(base_url("simanis/status?msg=0"));

      } else {
        $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatuakun($id_akun);
        if ($exec->num_rows()>0){
          $variabel["data"] = $exec->row_array();
            // Mencari Biodata Lengkap
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $biodata= $this->m_pelatihan_akun->lihatdatasatu($id_akun)->row_array();
            $variabel['persen']= lengkap($biodata);
            $variabel['persenusaha']= usaha($biodata);
            // Akhir Biodata Lengkap
          $this->layout->renderpel("v_pelatihan/status/v_status",$variabel,"v_pelatihan/status/v_status_js");
        } else {
          $variabel["data"] = $exec->row_array();
          $this->layout->renderpel("v_pelatihan/status/v_statusno",$variabel,"v_pelatihan/status/v_status_js");
        }
      }

      

    } 

    public function syarat()
    {      
        $this->load->model("m_pelatihan/m_pelatihan_pelatihan");
        $this->load->model("m_pelatihan/m_pelatihan_akun");
        $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
        $variabel['csrf'] = csrf();
        $id_pelatihan = $this->input->post("id_pelatihan");
        $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdatasatu($id_pelatihan)->row_array();
        if ($this->session->userdata('pelatihan_status') == "login") {
       
          // Mencari Biodata Lengkap
          $id_akun = $this->session->userdata("pelatihan_idakun");
          $biodata= $this->m_pelatihan_akun->lihatdatasatu($id_akun)->row_array();
          $variabel['persen']= lengkap($biodata);
          // Akhir Biodata Lengkap
         
          $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatuakun($id_akun);
          if ($exec->num_rows()>0) {
            $variabel['ada'] = 1;
            $variabel['item'] = $exec->row_array();
          } else {
            $variabel['ada'] = 0;
          }
            $variabel['stat'] = "login";
          } else { 
            $variabel['stat'] = "";
          }
          
        $this->load->view("v_pelatihan/beranda/v_syarat",$variabel);
        
    }

    public function login()
    {
      $this->load->model("m_pelatihan/m_pelatihan_akun");
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
        $email = $this->input->post('email');
            $password = md5($this->input->post('password'));
        
            $exec = $this->m_pelatihan_akun->ceklogin($email,$password);
            if ($exec->num_rows()>0) {
                $data = $exec->row_array();
                $data_session = array(
                    'pelatihan_email' => $data['email'],
                    'pelatihan_status' => "login",
                    'pelatihan_idakun' => $data['id_akun'],
                    'pelatihan_nama'=> $data['nama']
                    );
                $this->session->set_userdata($data_session);
                if (isset($_GET['m'])) {
                    redirect(base_url("simanis/".$_GET['m'].""));
                } else {
                    redirect(base_url("simanis"));
                }
            } else {
                $variabel['gagal'] = '0';
                $variabel['bug'] =  $email;
                $this->layout->renderpel("v_pelatihan/login/v_login",$variabel,"v_pelatihan/login/v_login_js");
            }
        } else {
            $this->layout->renderpel("v_pelatihan/login/v_login",$variabel,"v_pelatihan/login/v_login_js");
        }
    }

    function logout() {
      $this->session->sess_destroy();
      redirect(base_url('simanis/login'));
    }



    public function biodata()
    {   
        cekloginpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_akun");
        if ($this->input->post()) {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $array=array(
                'nik'=> $this->input->post('nik'),
                'nama'=> $this->input->post('nama'),
                'jk'=>$this->input->post('jk'),
                'tempatlahir'=>$this->input->post('tempatlahir'),
                'tanggallahir'=>tanggalawal($this->input->post('tanggallahir')),
                'alamat'=>$this->input->post('alamat'),
                'kota'=>$this->input->post('kota'),
                'nohp'=>$this->input->post('nohp'),
                'pendidikan'=>$this->input->post('pendidikan'),
                'namapendidikan'=>$this->input->post('namapendidikan'),
                'jurusan'=>$this->input->post('jurusan'),
                'nilai'=>$this->input->post('nilai'),
                'pekerjaan'=>$this->input->post('pekerjaan'),
                'tempatkerja'=>$this->input->post('tempatkerja'),
                'posisi'=>$this->input->post('posisi'),
                'daftarpelatihan'=>$this->input->post('daftarpelatihan'),
                'daftarkeahlian'=>$this->input->post('daftarkeahlian'),
            );
            $config['upload_path'] = './assets/images/pelatihan/biodata';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto"))
            {
             
                
                $upload = $this->upload->data();
                $foto = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$foto;

                // $config['image_library'] = 'gd2';
                // $config['source_image'] = './assets/images/pelatihan/biodata/'.$upload["raw_name"].$upload["file_ext"];
                // $config['create_thumb'] = FALSE;
                // $config['maintain_ratio'] = TRUE;
                // $config['width']         = 600;
                // $config['height']       = 400;
                // $config['new_image'] = './assets/images/pelatihan/biodata/'.$upload["raw_name"].$upload["file_ext"];
                // $this->load->library('image_lib', $config);
                // $this->image_lib->resize();

                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/pelatihan/biodata/'.$berkas1temp.'';
              //  $path2 ='./assets/images/pelatihan/biodata/thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                //    unlink($path2); //menghapus gambar di folder berita
                }
               
             } 
                else if ($this->input->post('foto')=="") 
            {
              
                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/pelatihan/biodata/'.$berkas1temp.'';
               // $path2 ='./assets/images/pelatihan/biodata/thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                 //   unlink($path2); //menghapus gambar di folder berita
                }
                $array['foto']="";
            }

            if ($this->upload->do_upload("ktp"))
            {
             
                
                $upload = $this->upload->data();
                $ktp = $upload["raw_name"].$upload["file_ext"];
                $array['ktp']=$ktp;

                // $config['image_library'] = 'gd2';
                // $config['source_image'] = './assets/images/pelatihan/biodata/'.$upload["raw_name"].$upload["file_ext"];
                // $config['create_thumb'] = FALSE;
                // $config['maintain_ratio'] = TRUE;
                // $config['width']         = 900;
                // $config['height']       = 700;
                // $config['new_image'] = './assets/images/pelatihan/biodata/'.$upload["raw_name"].$upload["file_ext"];
                // $this->load->library('image_lib', $config);
                // $this->image_lib->resize();

                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->ktp;
                $path1 ='./assets/images/pelatihan/biodata/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                }
               
            } 
                else if ($this->input->post('ktp')=="") 
            {
              
                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->ktp;
                $path1 ='./assets/images/pelatihan/biodata/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                }
                $array['ktp']="";
            }
            
           
            $exec = $this->m_pelatihan_akun->editdata($id_akun,$array);
            if ($exec) redirect(base_url("simanis/biodata?msg=1"));
            else redirect(base_url("simanis/biodata?msg=0"));

        } else {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $exec = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->renderpel('v_pelatihan/biodata/v_biodata',$variabel,'v_pelatihan/biodata/v_biodata_js');
            } else {
                redirect(base_url("simanis/biodata"));
            }
        }
      
    }

    public function pengumuman()
    { 
      $this->load->model("m_pelatihan/m_pelatihan_pengumuman");
      $variabel['csrf'] = csrf();
      $base_url = 'pelatihan/pengumuman'; //site url
      $total_rows = $this->m_pelatihan_pengumuman->jumlah_data(); //total row
      $per_page = 5;  //show record per halaman
      $uri_segment=3;  // uri parameter
      $num_links = 3;
      
      $variabel['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
      $variabel['data'] = $this->m_pelatihan_pengumuman->lihatdata2($per_page, $variabel['page']); 
      $variabel['pagination'] = $this->buathalaman->paging($base_url,$total_rows,$per_page,$uri_segment,$num_links);

      
      $this->layout->renderpel('v_pelatihan/pengumuman/v_pengumuman',$variabel,'v_pelatihan/pengumuman/v_pengumuman_js');
    }


    function pengumumandetail()
    {
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_pengumuman");
        $id_akun = $this->input->get("ids");
        $exec = $this->m_pelatihan_pengumuman->lihatdatasatu($id_akun);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec->row_array();
            $this->layout->renderpel('v_pelatihan/pengumumandetail/v_pengumumandetail',$variabel,'v_pelatihan/pengumumandetail/v_pengumumandetail_js');
        } else {
            redirect(base_url("simanis"));
        }
    }

    public function riwayat()
    {   
      cekloginpelatihan();
      $this->load->model("m_pelatihan/m_pelatihan_pelatihan");
      $this->load->model("m_pelatihan/m_pelatihan_akun");
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $variabel['csrf'] = csrf();
      $id_akun = $this->session->userdata("pelatihan_idakun");
      $variabel['data'] = $this->m_pelatihan_pelatihandaftar->lihatdatapelatihan($id_akun);
      
      $this->layout->renderpel("v_pelatihan/riwayat/v_riwayat",$variabel,"v_pelatihan/riwayat/v_riwayat_js");
    }


    public function riwayatstatus()
    {   
      cekloginpelatihan();
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $this->load->model("m_pelatihan/m_pelatihan_akun");
      $variabel['csrf'] = csrf();
      $id_akun = $this->session->userdata("pelatihan_idakun");
      $id_pelatihandaftar =  $this->input->post('id_pelatihandaftar');
      if ($this->input->get("id")) {
        $id = $this->input->get("id");
        $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatu($id);
      
        if ($exec->num_rows()>0){
            $variabel["data"] = $exec->row_array();
            if ($id_akun==$variabel["data"]["id_akun"]) {
              // Mencari Biodata Lengkap
              $id_akun = $this->session->userdata("pelatihan_idakun");
            $biodata= $this->m_pelatihan_akun->lihatdatasatu($id_akun)->row_array();
            $variabel['persen']= lengkap($biodata);
            $variabel['persenusaha']= usaha($biodata);
              // Akhir Biodata Lengkap
              $this->layout->renderpel("v_pelatihan/riwayatstatus/v_riwayatstatus",$variabel,"v_pelatihan/riwayatstatus/v_riwayatstatus_js");
            } else {
              redirect(base_url("simanis"));
            }
          } else {
           redirect(base_url("simanis"));
        }


      } else {
       
     }

     
     
    }

    public function ket()
    {   
      cekloginpelatihan();
      $this->layout->renderpel("v_pelatihan/ket/v_ket");     
    } 

    public function password()
    {   
        cekloginpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_akun");
        if ($this->input->post()) {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $exec = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
            if ($exec->num_rows()>0){
               $data = $exec ->row_array();
                if ($data["password"]==md5($this->input->post('passwordlama'))) {
                  $array=array(
                    'password'=> md5($this->input->post('passwordbaru'))
                  );  
                  $exec = $this->m_pelatihan_akun->editdata($id_akun,$array);
                  if ($exec) redirect(base_url("simanis/password?msg=1"));
                  else redirect(base_url("simanis/password?msg=0"));

                } else {
                  $variabel['gagal'] = "1";
                  $this->layout->renderpel('v_pelatihan/password/v_password',$variabel,'v_pelatihan/password/v_password_js');

                }
            } else {
              redirect(base_url("simanis"));
            }
        } else {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $exec = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->renderpel('v_pelatihan/password/v_password',$variabel,'v_pelatihan/password/v_password_js');
            } else {
                redirect(base_url("simanis"));
            }
        }
      
    }

    public function kontak()
    {   
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_pesan");
        $this->load->model("m_pelatihan/m_pelatihan_pelatihan");
        $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdata();
        if ($this->input->post()){
            $array=array(
                'nama'=> $this->input->post('nama'),
                'email'=> $this->input->post('email'),
                'judul'=>$this->input->post('judul'),
                'pesan'=>$this->input->post('pesan'),
                );
              
                $exec = $this->m_pelatihan_pesan->tambahdata($array);
                if ($exec) redirect(base_url("simanis/kontak?msg=1"));
                else redirect(base_url("simanis/kontak?msg=0"));
        }
        else {
            $this->layout->renderpel('v_pelatihan/kontak/v_kontak',$variabel,'v_pelatihan/kontak/v_kontak_js');
        }
       
    }

    public function cetak()
    {   
      cekloginpelatihan();
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $this->load->model("m_pelatihan/m_pelatihan_akun");
      $variabel['csrf'] = csrf();
      $id_akun = $this->session->userdata("pelatihan_idakun");
      $id_pelatihandaftar =  $this->input->post('id_pelatihandaftar');
      $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatuakun($id_akun);
      if ($exec->num_rows()>0){
         $variabel["data"] = $exec->row_array();
         $this->load->view('v_pelatihan/cetak/v_cetak_pdf', $variabel);
      
      } else {
        redirect(base_url("simanis"));
      }
     
    } 

    public function cetakriwayat()
    {   
      cekloginpelatihan();
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $this->load->model("m_pelatihan/m_pelatihan_akun");
      $variabel['csrf'] = csrf();
      $id_akun = $this->session->userdata("pelatihan_idakun");
      $id_pelatihandaftar =  $this->input->get('id');
      $exec = $this->m_pelatihan_pelatihandaftar->lihatdatadaftar($id_akun, $id_pelatihandaftar);
      if ($exec->num_rows()>0){
         $variabel["data"] = $exec->row_array();
         $this->load->view('v_pelatihan/cetak/v_cetak_pdf', $variabel);
      
      } else {
        redirect(base_url("simanis"));
      }
     
    } 


    public function datausaha()
    {   
        cekloginpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_akun");
        if ($this->input->post()) {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $array=array(
                'unama'=> $this->input->post('unama'),
                'upemilik'=> $this->input->post('upemilik'),
                'ujalan'=>$this->input->post('ujalan'),
                'udesa'=>$this->input->post('udesa'),
                'ukecamatan'=>$this->input->post('ukecamatan'),
                'ukabkota'=>$this->input->post('ukabkota'),
                'utelp'=>$this->input->post('utelp'),
                'ukomoditi'=>$this->input->post('ukomoditi'),
                'ubentuk'=>$this->input->post('ubentuk'),
                'utenagakerja'=>$this->input->post('utenagakerja'),
                'uproduk'=>$this->input->post('uproduk'),
                'umerek'=>$this->input->post('umerek'),
                'uinvestasi'=>$this->input->post('uinvestasi'),
                'ujumlahproduksi'=>$this->input->post('ujumlahproduksi'),
                'usatuanproduksi'=>$this->input->post('usatuanproduksi'),
                'unilaiproduksi'=>$this->input->post('unilaiproduksi'),
                'unilaibahanbaku'=>$this->input->post('unilaibahanbaku'),
                'upemasaran'=>$this->input->post('upemasaran'),
                'ufotoproduk'=>$this->input->post('ufotoproduk')
            );
            $config['upload_path'] = './assets/images/pelatihan/produk';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("ufotoproduk"))
            {
                $upload = $this->upload->data();
                $ufotoproduk = $upload["raw_name"].$upload["file_ext"];
                $array['ufotoproduk']=$ufotoproduk;
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/pelatihan/produk/'.$upload["raw_name"].$upload["file_ext"];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 500;
                $config['height']       = 400;
                // $config['new_image'] = './assets/images/pelatihan/produk/'.$upload["raw_name"].$upload["file_ext"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->ufotoproduk;
                $path1 ='./assets/images/pelatihan/produk/'.$berkas1temp.'';
                // $path2 ='./assets/images/pelatihan/produk/thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1);
                    // unlink($path2); 
                }
               
            } 
                else if ($this->input->post('ufotoproduk')=="") 
            {
              
                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->ufotoproduk;
                $path1 ='./assets/images/pelatihan/produk/'.$berkas1temp.'';
                // $path2 ='./assets/images/pelatihan/produk/thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); 
                    // unlink($path2); 
                }
                $array['ufotoproduk']="";
            }
            
           
            $exec = $this->m_pelatihan_akun->editdata($id_akun,$array);
            if ($exec) redirect(base_url("simanis/datausaha?msg=1"));
            else redirect(base_url("simanis/datausaha?msg=0"));

        } else {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $exec = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->renderpel('v_pelatihan/datausaha/v_datausaha',$variabel,'v_pelatihan/datausaha/v_datausaha_js');
            } else {
                redirect(base_url("simanis/datausaha"));
            }
        }
      
    }

    public function contohupload()
    {  


      $ftp_server = "siikalsel.disperin.kalselprov.go.id";
      // name file in serverA that you want to store file in serverB
        $file = './assets/images/provinsi.png';
        $remote_file = 'web/uploads/contoh/provinsi.png';

      // set up basic connection
      $conn_id = ftp_connect($ftp_server);

      // login with username and password
      $login_result = ftp_login($conn_id, "siikalselftp", "560493ff1221b589f2230e9861fc003835a512ef");
      if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
        echo "successfully uploaded $file\n";
       } else {
        echo "There was a problem while uploading $file\n";
       }

    }

    public function contohupload2()
    {  


      $file = './assets/images/provinsi.png';
      $dest = fopen("ftp://siikalselftp:560493ff1221b589f2230e9861fc003835a512ef@siikalsel.disperin.kalselprov.go.id/" . $file, "wb");
      $src = file_get_contents($file);
      fwrite($dest, $src, strlen($src));
      fclose($dest); 
    }
    public function tambahperusahaan()
    {   
        cekloginpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_akun");
        $this->load->model("m_pelatihan/m_pelatihan_perusahaan");
        $id_akun = $this->session->userdata("pelatihan_idakun");
        if ($this->input->post()) {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $array=array(
                'kode' =>$this->m_pelatihan_perusahaan->get_kode(),
                'perusahaan'=> $this->input->post('perusahaan'),
                'npwp'=> $this->input->post('npwp'),
                'ndi'=>$this->input->post('ndi'),
                'badan_id'=>$this->input->post('badan_id'),
                'pemilik'=>$this->input->post('pemilik'),
                'alamat'=>$this->input->post('alamat'),
                'provinsi_id'=>63,
                'kota_id'=>$this->input->post('kota_id'),
                'kecamatan_id'=>$this->input->post('kecamatan_id'),
                'kelurahan_id'=>$this->input->post('kelurahan_id'),
                'kodepos'=>$this->input->post('kodepos'),
                'izin_id'=>$this->input->post('izin_id'),
                'kbli_id'=>$this->input->post('kbli_id'),
                'komoditi_id'=>$this->input->post('komoditi_id'),
                'telpon'=>$this->input->post('telpon'),
                'fax'=>$this->input->post('fax'),
                'email'=>$this->input->post('email'),
                'website'=>$this->input->post('website'),
                'latitude'=>$this->input->post('latitude'),
                'longitude'=>$this->input->post('longitude'),
                'wa'=>$this->input->post('wa'),
                'fb'=>$this->input->post('fb'),
                'ig'=>$this->input->post('ig'),
                'tokped'=>$this->input->post('tokped'),
                'bukalapak'=>$this->input->post('bukalapak'),
                'shopee'=>$this->input->post('shopee'),
                'created_id'=>25,
                'created_at'=>date('Y-m-d H:i:s'),
                'simanis_id'=>  $id_akun,

            );

             
              $nmfile = "dokumen_".time();
              $config['upload_path'] = './assets/images/pelatihan/perusahaan/gambar';
              $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
              $config['file_name']  =  $nmfile;
          
              $this->load->library('upload', $config);
              $this->upload->do_upload("gambar");
              $upload = $this->upload->data();
              $file = $nmfile.$upload["file_ext"];;
              $array['gambar']=$file;

              $nmfile = "dokumen_".time();
              $config['upload_path'] = './assets/images/pelatihan/perusahaan/legalitas';
              $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|docx';
              $config['file_name']  =  $nmfile;
              $this->upload->initialize($config); 
              $this->upload->do_upload("legalitas");
              $upload = $this->upload->data();
              $file = $nmfile.$upload["file_ext"];;
              $array['legalitas']=$file;

           
              $ftp_server = "siikalsel.disperin.kalselprov.go.id";
              // name file in serverA that you want to store file in serverB
                $file = './assets/images/pelatihan/perusahaan/gambar/'.$array['gambar'].'';
                $remote_file = 'web/uploads/'.$array['gambar'].'';
        
              // set up basic connection
              $conn_id = ftp_connect($ftp_server);
        
              // login with username and password
              $login_result = ftp_login($conn_id, "siikalselftp", "560493ff1221b589f2230e9861fc003835a512ef");
              if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
                echo "successfully uploaded $file\n";
               } else {
                echo "There was a problem while uploading $file\n";
                $array['gambar']="";
               }
        
               $file = './assets/images/pelatihan/perusahaan/legalitas/'.$array['legalitas'].'';
               $remote_file = 'web/uploads/'.$array['legalitas'].'';
               if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
                echo "successfully uploaded $file\n";
               } else {
                echo "There was a problem while uploading $file\n";
                $array['legalitas']="";

               }
              
               $exec = $this->m_pelatihan_perusahaan->tambahdata($array);
               $recordID= $this->db->insert_id();
               $produk = $this->input->post('produk_id');
               $result = array();
               foreach($produk AS $key => $val){
                if($_POST['produk_id'][$key] != ''){
                  $result[] = array(
                    "perusahaan_id"  => $recordID,
                    "produk_id"  => $_POST['produk_id'][$key]
                  );
                }
              }
              $this->db->insert_batch('master_perusahaan_produk', $result);
              if ($exec) redirect(base_url("simanis/tambahperusahaan?msg=1"));
              else redirect(base_url("simanis/tambahperusahaan?msg=0"));

        } else {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $exec = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $variabel['masterbadan'] = $this->m_pelatihan_perusahaan->lihatmasterbadan();
                $variabel['masterkota'] = $this->m_pelatihan_perusahaan->lihatmasterkota();
                $variabel['masterizin'] = $this->m_pelatihan_perusahaan->lihatmasterizin();
                $variabel['masterkbli'] = $this->m_pelatihan_perusahaan->lihatmasterkbli();
                $variabel['masterkomoditi'] = $this->m_pelatihan_perusahaan->lihatmasterkomoditi();
                $variabel['masterproduk'] = $this->m_pelatihan_perusahaan->lihatmasterproduk();
                $this->layout->renderpel('v_pelatihan/perusahaan/v_perusahaantambah',$variabel,'v_pelatihan/perusahaan/v_perusahaantambah_js');
            } else {
                redirect(base_url("simanis/datausaha"));
            }
        }
      
    }




    public function faq()
    {   
        $variabel['csrf'] = csrf();
      
            $this->layout->renderpel('v_pelatihan/faq/v_faq');
    
       
    }

    public function pendukung()
    {   
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_berkas");
        $id_akun = $this->session->userdata("pelatihan_idakun");
        if ($this->input->post()) {
          $id_akun = $this->session->userdata("pelatihan_idakun");
            $array=array(
                'nama'=> $this->input->post('nama'),
                'id_akun'=> $id_akun,
            );

            //asdad
            $config['upload_path'] = './assets/images/pelatihan/pendukung';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("dokumen");
            $upload = $this->upload->data();
            $file = $upload["raw_name"].$upload["file_ext"];
            $array['file']=$file;
    
            //adasd
            $exec = $this->m_pelatihan_berkas->tambahdata($array);
                if ($exec){
                 redirect(base_url("simanis/pendukung?id=".$id_dokumen."&msg=1"));
                }   else redirect(base_url("simanis/pendukung?msg=0"));
          } else {
            $exec = $this->m_pelatihan_berkas->lihatdataakun($id_akun);
            $variabel['data'] = $exec;
            $this->layout->renderpel('v_pelatihan/pendukung/v_pendukung',$variabel,'v_pelatihan/pendukung/v_pendukung_js');
        
          }
    }

    public function perusahaan()
    {   
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_perusahaan");
        $id_akun = $this->session->userdata("pelatihan_idakun");
        if ($this->input->post()) {
          $id_akun = $this->session->userdata("pelatihan_idakun");
            $array=array(
                'nama'=> $this->input->post('nama'),
                'id_akun'=> $id_akun,
            );

            //asdad
            $config['upload_path'] = './assets/images/pelatihan/pendukung';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DOC';
            $this->load->library('upload', $config);
            $this->upload->do_upload("dokumen");
            $upload = $this->upload->data();
            $file = $upload["raw_name"].$upload["file_ext"];
            $array['file']=$file;
    
            //adasd
            $exec = $this->m_pelatihan_berkas->tambahdata($array);
                if ($exec){
                 redirect(base_url("simanis/pendukung?id=".$id_dokumen."&msg=1"));
                }   else redirect(base_url("simanis/pendukung?msg=0"));
          } else {
            $exec = $this->m_pelatihan_perusahaan->lihatdataakun($id_akun);
            $variabel['data'] = $exec;
            $this->layout->renderpel('v_pelatihan/perusahaan/v_perusahaan',$variabel,'v_pelatihan/perusahaan/v_perusahaan_js');
        
          }
    }

    public function lihatperusahaan()
    {   
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_perusahaan");
        $id_akun = $this->session->userdata("pelatihan_idakun");
        $id_perusahaan=$this->input->get("id");
        $exec = $this->m_pelatihan_perusahaan->lihatdataakunsatu($id_akun,$id_perusahaan);
        $variabel['data'] = $exec->row_array();
        $variabel['produk'] = $this->m_pelatihan_perusahaan->lihatproduk($id_perusahaan);
        $this->layout->renderpel('v_pelatihan/perusahaan/v_perusahaanlihat',$variabel,'v_pelatihan/perusahaan/v_perusahaan_js');
      
    }


    
    public function editperusahaan()
    {   
        cekloginpelatihan();
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_perusahaan");
        $this->load->model("m_pelatihan/m_pelatihan_akun");
        $id_akun = $this->session->userdata("pelatihan_idakun");
        if ($this->input->post()) {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $array=array(
                'unama'=> $this->input->post('unama'),
                'upemilik'=> $this->input->post('upemilik'),
                'ujalan'=>$this->input->post('ujalan'),
                'udesa'=>$this->input->post('udesa'),
                'ukecamatan'=>$this->input->post('ukecamatan'),
                'ukabkota'=>$this->input->post('ukabkota'),
                'utelp'=>$this->input->post('utelp'),
                'ukomoditi'=>$this->input->post('ukomoditi'),
                'ubentuk'=>$this->input->post('ubentuk'),
                'utenagakerja'=>$this->input->post('utenagakerja'),
                'uproduk'=>$this->input->post('uproduk'),
                'umerek'=>$this->input->post('umerek'),
                'uinvestasi'=>$this->input->post('uinvestasi'),
                'ujumlahproduksi'=>$this->input->post('ujumlahproduksi'),
                'usatuanproduksi'=>$this->input->post('usatuanproduksi'),
                'unilaiproduksi'=>$this->input->post('unilaiproduksi'),
                'unilaibahanbaku'=>$this->input->post('unilaibahanbaku'),
                'upemasaran'=>$this->input->post('upemasaran'),
                'ufotoproduk'=>$this->input->post('ufotoproduk')
            );
            $config['upload_path'] = './assets/images/pelatihan/produk';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("ufotoproduk"))
            {
                $upload = $this->upload->data();
                $ufotoproduk = $upload["raw_name"].$upload["file_ext"];
                $array['ufotoproduk']=$ufotoproduk;
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/pelatihan/produk/'.$upload["raw_name"].$upload["file_ext"];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 500;
                $config['height']       = 400;
                // $config['new_image'] = './assets/images/pelatihan/produk/'.$upload["raw_name"].$upload["file_ext"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->ufotoproduk;
                $path1 ='./assets/images/pelatihan/produk/'.$berkas1temp.'';
                // $path2 ='./assets/images/pelatihan/produk/thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1);
                    // unlink($path2); 
                }
               
            } 
                else if ($this->input->post('ufotoproduk')=="") 
            {
              
                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->ufotoproduk;
                $path1 ='./assets/images/pelatihan/produk/'.$berkas1temp.'';
                // $path2 ='./assets/images/pelatihan/produk/thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); 
                    // unlink($path2); 
                }
                $array['ufotoproduk']="";
            }
            
           
            $exec = $this->m_pelatihan_akun->editdata($id_akun,$array);
            if ($exec) redirect(base_url("simanis/datausaha?msg=1"));
            else redirect(base_url("simanis/datausaha?msg=0"));

        } else {

          $id_perusahaan=$this->input->get("id");
          $exec = $this->m_pelatihan_perusahaan->lihatdataakunsatu($id_akun,$id_perusahaan);
          if ($exec->num_rows()>0){
              $variabel['data'] = $exec ->row_array();
              $variabel['masterbadan'] = $this->m_pelatihan_perusahaan->lihatmasterbadan();
              $variabel['masterkota'] = $this->m_pelatihan_perusahaan->lihatmasterkota();
              $variabel['masterkecamatan'] = $this->m_pelatihan_perusahaan->getmasterkecamatan($variabel['data']['kota_id']);
              $variabel['masterkelurahan'] = $this->m_pelatihan_perusahaan->getmasterkelurahan($variabel['data']['kecamatan_id']);
              $variabel['masterizin'] = $this->m_pelatihan_perusahaan->lihatmasterizin();
              $variabel['masterkbli'] = $this->m_pelatihan_perusahaan->lihatmasterkbli();
              $variabel['masterkomoditi'] = $this->m_pelatihan_perusahaan->lihatmasterkomoditi();
              $variabel['masterproduk'] = $this->m_pelatihan_perusahaan->lihatmasterproduk();
              $variabel['produk'] = $this->m_pelatihan_perusahaan->lihatproduk($id_perusahaan);
              $this->layout->renderpel('v_pelatihan/perusahaan/v_perusahaanedit',$variabel,'v_pelatihan/perusahaan/v_perusahaanedit_js');
          } else {
              redirect(base_url("simanis/datausaha"));
          }
           
        }
      
    }

    public function perusahaanhapus()
    {
      $this->load->model("m_pelatihan/m_pelatihan_perusahaan");
        $id_perusahaan = $this->input->get("id");
        $query2 = $this->m_pelatihan_perusahaan->lihatdatasatuperusahaan($id_perusahaan);
        $row2 = $query2->row();
        $legalitas = $row2->legalitas;
        $gambar = $row2->gambar;
        $path2 ='./assets/images/pelatihan/perusahaan/legalitas/'.$legalitas;
        $path1 ='./assets/images/pelatihan/perusahaan/gambar/'.$gambar;
        if(is_file($path1)) {
            unlink($path1);
        }
        if(is_file($path2)) {
          unlink($path2);
      }
        $exec = $this->m_pelatihan_perusahaan->hapus($id_perusahaan);
        redirect(base_url()."simanis/perusahaan?msg=2");
    }

    
    public function pendukunghapus()
    {
      $this->load->model("m_pelatihan/m_pelatihan_berkas");
        $id_berkas = $this->input->get("id");
        $query2 = $this->m_pelatihan_berkas->lihatdatasatu($id_berkas);
        $row2 = $query2->row();
        $berkas1temp = $row2->file;
        $path1 ='./assets/images/pelatihan/pendukung/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_pelatihan_berkas->hapus($id_berkas);
        redirect(base_url()."pelatihan/pendukung?msg=2");
    }

    public function pendukungedit()
    {      
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_berkas");
        $id_berkas = $this->input->post("id_berkas");
        $variabel['data'] = $this->m_pelatihan_berkas->lihatdatasatu($id_berkas)->row_array();
        $this->load->view("v_pelatihan/pendukung/v_pendukung_edit",$variabel);
    }

    public function pendukungeditproses()
    {      
        $variabel['csrf'] = csrf();
        $this->load->model("m_pelatihan/m_pelatihan_berkas");
        if ($this->input->post()) {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $array=array(
                'nama'=> $this->input->post('nama'),
                'id_akun'=> $id_akun,
            );
              
            $id_berkas = $this->input->post("id_berkas");
            $config['upload_path'] = './assets/images/pelatihan/pendukung/';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png|PDF|pdf|doc|DO|docx|DOCX';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("file"))    
            {
                $upload = $this->upload->data();
                $file = $upload["raw_name"].$upload["file_ext"];
                $array['file']=$file;
                $query2 = $this->m_pelatihan_berkas->lihatdatasatu($id_berkas);
                $row2 = $query2->row();
                $berkas1temp = $row2->file;
                $path1 ='./assets/images/pelatihan/pendukung/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                }
            }

            $exec = $this->m_pelatihan_berkas->editdata($id_berkas,$array);
            if ($exec){
                redirect(base_url("simanis/pendukung?msg=0"));
            }
      } else {
      }
    }

    public function resetpassword()
    {
      $this->load->model("m_pelatihan/m_pelatihan_akun");
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
             $email = $this->input->post('email');
             $exec = $this->m_pelatihan_akun->cekemail($email);
            if ($exec->num_rows()>0) {
                $data = $exec->row_array();
                $nama = $data['nama'];
                $token = $data['password'];
                $link = base_url()."simanis/formresetpassword?token=".$token."&id=".$data['id_akun']."";
              
                $judul ="Reset Password Akun SIMANIS KALSEL";
              $isi = "Hi ".$nama." <br/> Terimakasih sudah menggunakan layanan SIMANIS KALSEL. <br/> Untuk Melakukan Reset Password Klik <a href='".$link."'>ini </a> atau <br/>
                copy paste link dibawah ini dibrowser <br/>
                <a href='".$link."'>".$link."</a>
                ";

                kirimemail($email,$judul,$isi);
               redirect(base_url("simanis/prosesresetpassword?h=".$email.""));
                
            } else {
                $variabel['gagal'] = '1';
                $variabel['bug'] =  $email;
                $this->layout->renderpel("v_pelatihan/login/v_resetpassword",$variabel,"v_pelatihan/login/v_resetpassword_js");
            }
        } else {
            $this->layout->renderpel("v_pelatihan/login/v_resetpassword",$variabel,"v_pelatihan/login/v_resetpassword_js");
        }
    }

    public function prosesresetpassword()
    {
      $this->load->model("m_pelatihan/m_pelatihan_akun");
        $variabel['csrf'] = csrf();
        if ($this->input->get("h")) {
          $variabel["email"] = $this->input->get("h");
          $this->layout->renderpel("v_pelatihan/login/v_resetpasswordproses",$variabel);
        } else {
          redirect(base_url("simanis"));
        }
       
    }

    public function resetberhasil()
    {
      $this->load->model("m_pelatihan/m_pelatihan_akun");
        $variabel['csrf'] = csrf();
        if ($this->input->get("msg")) {
          $variabel["email"] = $this->input->get("msg");
          $this->layout->renderpel("v_pelatihan/login/v_resetberhasil",$variabel);
        } else {
          redirect(base_url("simanis"));
        }
       
    }

    public function formresetpassword()
    {
      $this->load->model("m_pelatihan/m_pelatihan_akun");
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
          $id_akun = $this->input->post("id_akun");
          $exec = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
          if ($exec->num_rows()>0){
               $data = $exec ->row_array();
                $array=array(
                  'password'=> md5($this->input->post('password'))
                );  
                $exec = $this->m_pelatihan_akun->editdata($id_akun,$array);
                if ($exec) redirect(base_url("simanis/resetberhasil?msg=1"));
                else redirect(base_url("simanis/resetberhasil?msg=0"));
          } 


        } else {
          if ($this->input->get("id")){
              $id_akun = $this->input->get("id");     
              $token = $this->input->get("token");     
              $exec = $this->m_pelatihan_akun->cekdatareset($id_akun,$token);
              if ($exec->num_rows()>0) {
                $variabel["data"] = $exec->row_array();
                $this->layout->renderpel("v_pelatihan/login/v_formresetpassword",$variabel,"v_pelatihan/login/v_formresetpassword_js");
              } else {
                redirect(base_url("simanis"));
              }
                
          } else {
              redirect(base_url("simanis"));
          }
      }
    }

    public function tesemail()
    {      
       // Konfigurasi email
          $config = [
                  'mailtype'  => 'html',
                  'charset'   => 'utf-8',
                  'protocol'  => 'smtp',
                  'smtp_host' => 'smtp.gmail.com',
                  'smtp_user' => 'simanis.kalsel@gmail.com',  // Email gmail
                  'smtp_pass'   => 'simanis123',  // Password gmail
                  'smtp_crypto' => 'ssl',
                  'smtp_port'   => 465,
                  'crlf'    => "\r\n",
                  'newline' => "\r\n"
                 ];

          // Load library email dan konfigurasinya
          $this->load->library('email', $config);

          // Email dan nama pengirim
          $this->email->from('no-replay@disperinkalselprov.go.id', 'disperin.kalselprov.go.id/simanis');

          // Email penerima
          $this->email->to('nikmannasir123@gmail.com'); // Ganti dengan email tujuan

          // Lampiran email, isi dengan url/path file
       
          // Subject email
          $this->email->subject('Pendaftaran Akun SIMANIS ');

          // Isi email
          $this->email->message("Selamat ");

          // Tampilkan pesan sukses atau error
          if ($this->email->send()) {
              echo 'Sukses! email berhasil dikirim.';
          } else {
              echo 'Error! email tidak dapat dikirim.';
          }
    }


    function getkecamatan()

    {
      $this->load->model("m_pelatihan/m_pelatihan_perusahaan");
      $id=$this->input->post('kota_id');

      $data=$this->m_pelatihan_perusahaan->getmasterkecamatan($id)->result();;

      echo json_encode($data);

    }

    function getkelurahan()

    {
      $this->load->model("m_pelatihan/m_pelatihan_perusahaan");
      $id=$this->input->post('kecamatan_id');

      $data=$this->m_pelatihan_perusahaan->getmasterkelurahan($id)->result();;

      echo json_encode($data);

    }

}