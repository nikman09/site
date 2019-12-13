<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Pelatihan extends CI_Controller {
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
      $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdata();

      if ($this->session->userdata('pelatihan_status') == "login") {
       
        // Mencari Biodata Lengkap
        $id_akun = $this->session->userdata("pelatihan_idakun");
        $biodata= $this->m_pelatihan_akun->lihatdatasatu($id_akun)->row_array();
        $lengkap = 0;
        $lengkap += $biodata["email"]!="" || $biodata["email"]!=null ? 1 : 0 ;
        $lengkap += $biodata["password"]!="" || $biodata["password"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nik"]!="" || $biodata["nik"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nama"]!="" || $biodata["nama"]!=null ? 1 : 0 ;
        $lengkap += $biodata["jk"]!="" || $biodata["jk"]!=null ? 1 : 0 ;
        $lengkap += $biodata["tempatlahir"]!="" || $biodata["tempatlahir"]!=null ? 1 : 0 ;
        $lengkap += $biodata["tanggallahir"]!="0000-00-00" || $biodata["tanggallahir"]!=null ? 1 : 0 ;
        $lengkap += $biodata["alamat"]!="" || $biodata["alamat"]!=null ? 1 : 0 ;
        $lengkap += $biodata["kota"]!="" || $biodata["kota"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nohp"]!="" || $biodata["nohp"]!=null ? 1 : 0 ;
        $lengkap += $biodata["foto"]!="" || $biodata["foto"]!=null ? 1 : 0 ;
        $variabel['persen'] = $lengkap/11*100;
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
      
      $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdata();

      if ($this->session->userdata('pelatihan_status') == "login") {
       
        // Mencari Biodata Lengkap
        $id_akun = $this->session->userdata("pelatihan_idakun");
        $biodata= $this->m_pelatihan_akun->lihatdatasatu($id_akun)->row_array();
        $lengkap = 0;
        $lengkap += $biodata["email"]!="" || $biodata["email"]!=null ? 1 : 0 ;
        $lengkap += $biodata["password"]!="" || $biodata["password"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nik"]!="" || $biodata["nik"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nama"]!="" || $biodata["nama"]!=null ? 1 : 0 ;
        $lengkap += $biodata["jk"]!="" || $biodata["jk"]!=null ? 1 : 0 ;
        $lengkap += $biodata["tempatlahir"]!="" || $biodata["tempatlahir"]!=null ? 1 : 0 ;
        $lengkap += $biodata["tanggallahir"]!="0000-00-00" || $biodata["tanggallahir"]!=null ? 1 : 0 ;
        $lengkap += $biodata["alamat"]!="" || $biodata["alamat"]!=null ? 1 : 0 ;
        $lengkap += $biodata["kota"]!="" || $biodata["kota"]!=null ? 1 : 0 ;
        $lengkap += $biodata["nohp"]!="" || $biodata["nohp"]!=null ? 1 : 0 ;
        $lengkap += $biodata["foto"]!="" || $biodata["foto"]!=null ? 1 : 0 ;
        $variabel['persen'] = $lengkap/11*100;
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
          redirect(base_url("pelatihan"));
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
                  
              $exec = $this->m_pelatihan_akun->tambahdata($array);
              if ($exec) redirect(base_url("pelatihan/login?msg=1"));
                else redirect(base_url("pelatihan/akun?msg=0"));
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
                redirect(base_url("pelatihan"));
              } else {
                if ($this->input->get("i")){
            
                  $array=array(
                      'id_pelatihan'=> $this->input->get("i"),
                      'id_akun'=> $this->session->userdata("pelatihan_idakun"),
                      'status'=> "Menunggu Hasil Seleksi",
                      'konfirmasi'=> "",
                  );
                  
                  $exec = $this->m_pelatihan_pelatihandaftar->tambahdata($array);
                  if ($exec) redirect(base_url("pelatihan/status?msg=1"));
                    else redirect(base_url("pelatihan/status?msg=0"));
                }
                else {
                  redirect(base_url("pelatihan"));
                }
              }
            } else {
              if ($this->input->get("i")){
            
                  $array=array(
                      'id_pelatihan'=> $this->input->get("i"),
                      'id_akun'=> $this->session->userdata("pelatihan_idakun"),
                      'status'=> "Menunggu Hasil Seleksi",
                      'konfirmasi'=> "",
                  );
                      
                  $exec = $this->m_pelatihan_pelatihandaftar->tambahdata($array);
                  if ($exec) redirect(base_url("pelatihan/status?msg=1"));
                    else redirect(base_url("pelatihan/status?msg=0"));
                }
                else {
                  redirect(base_url("pelatihan"));
                }
            }
       } else {
        redirect(base_url("pelatihan"));
       }
      } else {
        redirect(base_url("pelatihan"));
      }
       
    


     

      
    
    }
    
    

    public function status()
    {   
      cekloginpelatihan();
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $this->load->model("m_pelatihan/m_pelatihan_akun");
      $variabel['csrf'] = csrf();
      $id_akun = $this->session->userdata("pelatihan_idakun");
      $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatuakun($id_akun);
      if ($exec->num_rows()>0){
         $variabel["data"] = $exec->row_array();
          // Mencari Biodata Lengkap
          $id_akun = $this->session->userdata("pelatihan_idakun");
          $biodata= $this->m_pelatihan_akun->lihatdatasatu($id_akun)->row_array();
          $lengkap = 0;
          $lengkap += $biodata["email"]!="" || $biodata["email"]!=null ? 1 : 0 ;
          $lengkap += $biodata["password"]!="" || $biodata["password"]!=null ? 1 : 0 ;
          $lengkap += $biodata["nik"]!="" || $biodata["nik"]!=null ? 1 : 0 ;
          $lengkap += $biodata["nama"]!="" || $biodata["nama"]!=null ? 1 : 0 ;
          $lengkap += $biodata["jk"]!="" || $biodata["jk"]!=null ? 1 : 0 ;
          $lengkap += $biodata["tempatlahir"]!="" || $biodata["tempatlahir"]!=null ? 1 : 0 ;
          $lengkap += $biodata["tanggallahir"]!="0000-00-00" || $biodata["tanggallahir"]!=null ? 1 : 0 ;
          $lengkap += $biodata["alamat"]!="" || $biodata["alamat"]!=null ? 1 : 0 ;
          $lengkap += $biodata["kota"]!="" || $biodata["kota"]!=null ? 1 : 0 ;
          $lengkap += $biodata["nohp"]!="" || $biodata["nohp"]!=null ? 1 : 0 ;
          $lengkap += $biodata["foto"]!="" || $biodata["foto"]!=null ? 1 : 0 ;
          $variabel['persen'] = $lengkap/11*100;
          // Akhir Biodata Lengkap
        $this->layout->renderpel("v_pelatihan/status/v_status",$variabel,"v_pelatihan/status/v_status_js");
      
      } else {
        $variabel["data"] = $exec->row_array();
        $this->layout->renderpel("v_pelatihan/status/v_statusno",$variabel,"v_pelatihan/status/v_status_js");
      }
     
    } 

    public function syarat()
    {      
        $this->load->model("m_pelatihan/m_pelatihan_pelatihan");
        $variabel['csrf'] = csrf();
        $id_pelatihan = $this->input->post("id_pelatihan");
        $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdatasatu($id_pelatihan)->row_array();
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
                    redirect(base_url("pelatihan/".$_GET['m'].""));
                } else {
                    redirect(base_url("pelatihan"));
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
      redirect(base_url('pelatihan/login'));
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
            );
            $config['upload_path'] = './assets/images/pelatihan/biodata';
            $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|PNG|png';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload("foto"))
            {
             
                
                $upload = $this->upload->data();
                $foto = $upload["raw_name"].$upload["file_ext"];
                $array['foto']=$foto;

                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/images/pelatihan/biodata/'.$upload["raw_name"].$upload["file_ext"];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['width']         = 300;
                $config['height']       = 200;
                $config['new_image'] = './assets/images/pelatihan/biodata/thumb/'.$upload["raw_name"].$upload["file_ext"];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/pelatihan/biodata/'.$berkas1temp.'';
                $path2 ='./assets/images/pelatihan/biodata/thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                    unlink($path2); //menghapus gambar di folder berita
                }
               
            } 
                else if ($this->input->post('foto')=="") 
            {
              
                $query2 = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
                $row2 = $query2->row();
                $berkas1temp = $row2->foto;
                $path1 ='./assets/images/pelatihan/biodata/'.$berkas1temp.'';
                $path2 ='./assets/images/pelatihan/biodata/thumb/'.$berkas1temp.'';
                if(is_file($path1)) {
                    unlink($path1); //menghapus gambar di folder berita
                    unlink($path2); //menghapus gambar di folder berita
                }
                $array['foto']="";
            }
            
           
            $exec = $this->m_pelatihan_akun->editdata($id_akun,$array);
            if ($exec) redirect(base_url("pelatihan/biodata?msg=1"));
            else redirect(base_url("pelatihan/biodata?msg=0"));

        } else {
            $id_akun = $this->session->userdata("pelatihan_idakun");
            $exec = $this->m_pelatihan_akun->lihatdatasatu($id_akun);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->renderpel('v_pelatihan/biodata/v_biodata',$variabel,'v_pelatihan/biodata/v_biodata_js');
            } else {
                redirect(base_url("pelatihan/biodata"));
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
            redirect(base_url("web/berita"));
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

}