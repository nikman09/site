<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cekloginadmin();
        $this->load->model("m_admin/m_pegawai");
    }

    // Dashboard
    public function index()
    {   
        $variabel['csrf'] = csrf();
        $rule = $this->session->userdata("rule");
        $seksi = $this->session->userdata("seksi");
        $nip = $this->session->userdata("nip");
        $variabel['tahun']  = date('Y');
        $this->load->view('v_admin/dashboard/v_home',$variabel);
    }
    // End Dashboard

    //pegawai
    function pegawai()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_pegawai->lihatdata();
        $this->layout->renderadmin('v_admin/pegawai/v_pegawai',$variabel,'v_admin/pegawai/v_pegawai_js');
    }
    //end pegawai

}