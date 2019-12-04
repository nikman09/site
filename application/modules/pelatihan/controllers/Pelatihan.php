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
      $variabel['csrf'] = csrf();
      $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdata();
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
          $variabel['data'] = $this->m_pelatihan_pelatihan->lihatdata()->row_array();
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