<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model("m_pegawai/m_login");
        $this->load->model("m_admin/m_loginadmin");
        $this->load->model("m_pegawai/m_pegawai");
    }
    public function index()
    { 
		$this->login();
    }

    public function login()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
        $nip = $this->input->post('nip');
            $password = md5($this->input->post('password'));
            $exec = $this->m_login->ceklogin($nip,$password);
            if ($exec->num_rows()>0) {
                $data = $exec->row_array();
                $data2 = $this->m_pegawai->lihatdatasatu($data['id_pegawai'])->row_array();;
                $data_session = array(
                    'nip' => $data['nip'],
                    'statuslogin' => "login",
                    'nama'=> $data['nama'],
                    'foto'=> $data['foto'],
                    'id_pegawai'=> $data['id_pegawai'],
                    'statuspegawai'=> $data['statuspegawai'],
                    'pangkat' => $data2['pangkat']
                    );
                $this->session->set_userdata($data_session);
                if (isset($_GET['m'])) {
                    redirect(base_url("kepegawaian/".$_GET['m'].""));
                } else {
                    redirect(base_url("kepegawaian"));
                }
            } else {
                $variabel['gagal'] = '0';
                $this->load->view("v_pegawai/login/v_login",$variabel);
            }
        } else {
            $this->load->view("v_pegawai/login/v_login",$variabel);
        }
    }

    function logout() {
        $this->session->sess_destroy();
         redirect(base_url('kepegawaian/login'));
     }

     public function administrator()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
        $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $exec = $this->m_loginadmin->ceklogin($username,$password);
            if ($exec->num_rows()>0) {
                $data = $exec->row_array();
                $data_session = array(
                    'admin_username' => $data['username'],
                    'admin_statuslogin' => "login",
                    'admin_nama'=> $data['nama'],
                    'admin_foto'=> $data['foto'],
                    'admin_status'=> $data['status'],
                    'rule'=> $data['rule']
                    );
                $this->session->set_userdata($data_session);
                if (isset($_GET['m'])) {
                    redirect(base_url("kepegawaian/admin/".$_GET['m'].""));
                } else {
                    redirect(base_url("kepegawaian/admin"));
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

    function logoutadministrator() {
        $this->session->sess_destroy();
         redirect(base_url('kepegawaian/login/administrator'));
     }
}