<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_login");
    }
    public function index()
    { 
		$variabel['csrf'] = csrf();
        if ($this->input->post()){
        $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $exec = $this->m_login->ceklogin($username,$password);
            if ($exec->num_rows()>0) {
                $data = $exec->row_array();
                if ($data['rule']=="administrator") {
                    $data_session = array(
                        'web_username' => $data['username'],
                        'web_statuslogin' => "login",
                        'web_nama'=> $data['nama'],
                        'web_foto'=> $data['foto'],
                        'web_status'=> $data['status'],
                        'web_rule'=> $data['rule']
                        );
                    $this->session->set_userdata($data_session);
                    if (isset($_GET['m'])) {
                        redirect(base_url("administrator/".$_GET['m'].""));
                    } else {
                        redirect(base_url("administrator"));
                    }
                 } else {
                     //DISINI Untuk User
                     $data_session = array(
                        'user_username' => $data['username'],
                        'user_statuslogin' => "login",
                        'user_nama'=> $data['nama'],
                        'user_foto'=> $data['foto'],
                        'user_status'=> $data['status'],
                        'user_rule'=> $data['rule'],
                        'user_bidang'=> $data['bidang']
                        );
                    $this->session->set_userdata($data_session);
                    if (isset($_GET['m'])) {
                        redirect(base_url("user/".$_GET['m'].""));
                    } else {
                        redirect(base_url("user"));
                    } 
                 }
            } else {
                $variabel['gagal'] = '0';
                $variabel['bug'] =  $username;
                $this->load->view("login/login/v_login",$variabel);
            }
        } else {
            $this->load->view("login/login/v_login",$variabel);
        }
    }

    function logout() {
        $this->session->sess_destroy();
         redirect(base_url('login'));
     }



}