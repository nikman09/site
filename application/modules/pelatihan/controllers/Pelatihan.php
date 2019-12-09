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
      $variabel['csrf'] = csrf();
      $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdata();

      if ($this->session->userdata('pelatihan_status') == "login") {
        $id_akun = $this->session->userdata("pelatihan_idakun");
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
      $variabel['csrf'] = csrf();
      $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdata();
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
      $this->load->model("m_pelatihan/m_pelatihan_pelatihandaftar");
      $variabel['csrf'] = csrf();
      $id_akun = $this->session->userdata("pelatihan_idakun");
      $exec = $this->m_pelatihan_pelatihandaftar->lihatdatasatuakun($id_akun);
      if ($exec->num_rows()>0){
        $variabel["data"] = $exec->row_array();
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
   
   

}