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
         redirect(base_url('pelatihan/admin/logout'));
     }

     public function pelatihandaftar()
     {   
       cekloginadminpelatihan();
       akses("admin");
       $this->load->view("v_admin/dashboard/v_home");
     }

     public function pelatihan()
    {   
        $variabel['csrf'] = csrf();
        $this->load->model("m_admin/m_admin_pelatihan");
        $username = $this->session->userdata("pelatihan_admin_username");
        $variabel['data'] = $this->m_admin_pelatihan->lihatdatauser($username);
        $this->layout->renderadmin('v_admin/pelatihan/v_pelatihan',$variabel,'v_admin/pelatihan/v_pelatihan_js');
   
    }
 
}