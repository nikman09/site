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

    

    public function akun()
    
 {   
     $this->load->model("m_pelatihan/m_pelatihan_akun");
     $variabel['csrf'] = csrf();
     if ($this->input->post()){

         $this->form_validation->set_rules('email','email','required|trim|is_unique[pd_akun.email]');
         if($this->form_validation->run() != false){
             $array=array(
                 'email'=> $this->input->post('nama'),
                 'nama'=> $this->input->post('nama'),
                 'password'=>$this->input->post('password'),
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
   
   

}