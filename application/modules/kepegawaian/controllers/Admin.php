<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cekloginadmin();
        $this->load->model("m_admin/m_pegawai");
        $this->load->model("m_admin/m_seksi");
        $this->load->model("m_admin/m_jabatan");
        $this->load->model("m_admin/m_pangkat");
        $this->load->model("m_admin/m_pendidikan");
        $this->load->model("m_admin/m_general");
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


    function pegawaitambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $this->form_validation->set_rules('nip','NIP','required|trim|is_unique[tb_pegawai.nip]');
            if($this->form_validation->run() != false){
                $array=array(
                    'nama'=> $this->input->post('nama'),
                    'nip'=> $this->input->post('nip'),
                    'jk'=>$this->input->post('jk'),
                    'tempat_lahir'=>$this->input->post('tempat_lahir'),
                    'tanggal_lahir'=>tanggalawal($this->input->post('tanggal_lahir')),
                    'password'=>md5($this->input->post('password'))
                    );
                    $exec = $this->m_pegawai->tambahdata($array);
                    if ($exec) redirect(base_url("kepegawaian/admin/pegawaitambah?msg=1"));
                    else redirect(base_url("kepegawaian/admin/pegawaitambah?msg=0"));
            }else{
                $this->layout->renderadmin('v_admin/pegawai/v_pegawai_tambah',$variabel,'v_admin/pegawai/v_pegawai_js');
            }
        } else {
            $this->layout->renderadmin('v_admin/pegawai/v_pegawai_tambah',$variabel,'v_admin/pegawai/v_pegawai_js');
        }
    }

    function pegawailihat()
    {
        $variabel['csrf'] = csrf();
        $id_pegawai = $this->input->get("id");
        $exec = $this->m_pegawai->lihatdatasatu($id_pegawai);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->renderadmin('v_admin/pegawai/v_pegawai_lihat',$variabel,'v_admin/pegawai/v_pegawai_js');
        } else {
            redirect(base_url("kepegawaian/admin/pegawai"));
        }
    }

    function pegawaiedit()
    {
      
        $variabel['csrf'] = csrf();
        $variabel['jabatan'] = $this->m_jabatan->lihatdata();
        $variabel['pangkat'] = $this->m_pangkat->lihatdata();
        $variabel['pendidikan'] = $this->m_pendidikan->lihatdata();
        if ($this->input->post()) {
            $nip = $this->input->post('nip');
            $nip2 = $this->input->post('nip2');
            if ( $nip!= $nip2) {
                $is_unique =  '|is_unique[tb_pegawai.nip]';
             } else {
                $is_unique =  '';
             }
             
            $this->form_validation->set_rules('nip','NIP','required|trim'. $is_unique.'');
            if($this->form_validation->run() != false){
            $array=array(
                'nama'=> $this->input->post('nama'),
                'nip'=> $this->input->post('nip'),
                'tempat_lahir'=> $this->input->post('tempat_lahir'),
                'tanggal_lahir'=>tanggalawal($this->input->post('tanggal_lahir')),
                'jk'=> $this->input->post('jk'),
                'agama'=>$this->input->post('agama'),
                'status'=>$this->input->post('status'),
                'goldar'=>$this->input->post('goldar'),
                'alamat'=>$this->input->post('alamat',FALSE),
                'nohp'=>$this->input->post('nohp'),
                'email'=>$this->input->post('email'),
                'statuspegawai'=>$this->input->post('statuspegawai'),
                'tmkerja'=>tanggalawal($this->input->post('tmkerja')),
                'id_jabatan'=>$this->input->post('id_jabatan'),
                'id_subjabatan'=>$this->input->post('id_subjabatan'),
                'id_pangkat'=>$this->input->post('id_pangkat'),
                'id_pendidikan'=>$this->input->post('id_pendidikan')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/images/foto';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("foto"))
                {
                    $upload = $this->upload->data();
                    $foto = $upload["raw_name"].$upload["file_ext"];
                    $array['foto']=$foto;

                    $query2 = $this->m_pegawai->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->foto;
                    $path1 ='./assets/images/foto/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                }
                $exec = $this->m_pegawai->editdata($id_pegawai,$array);
                if ($exec){
                 redirect(base_url("kepegawaian/admin/pegawaiedit?id=".$id_pegawai."&msg=1"));
                }
               }else{
                    $id_pegawai = $this->input->get("id");
                    $exec = $this->m_pegawai->lihatdatasatu($id_pegawai);
                    if ($exec->num_rows()>0){
                        $variabel['data'] = $exec ->row_array();
                        $variabel['datasubjabatan']=$this->m_general->ambilsubjabatan($variabel['data']['id_jabatan']);
               
                        $this->layout->renderadmin('v_admin/pegawai/v_pegawai_edit',$variabel,'v_admin/pegawai/v_pegawai_edit_js');
                    } else {
                        redirect(base_url("kepegawaian/admin/pegawai"));
                    }
               }
          
      } else {
            $id_pegawai = $this->input->get("id");
            $exec = $this->m_pegawai->lihatdatasatu($id_pegawai);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $variabel['datasubjabatan']=$this->m_general->ambilsubjabatan($variabel['data']['id_jabatan']);
               
                $this->layout->renderadmin('v_admin/pegawai/v_pegawai_edit',$variabel,'v_admin/pegawai/v_pegawai_edit_js');
            } else {
                redirect(base_url("kepegawaian/admin/pegawai"));
            }
      }

    }

    function subjabatan()
    {
      $id=$this->input->post('id_jabatan');
      $data=$this->m_general->datasubjabatanajax($id);
      echo json_encode($data);
    }
    function pegawaihapus()
    {
        $id_pegawai = $this->input->get("id");
        $query2 = $this->m_pegawai->lihatdatasatu($id_pegawai);
        $row2 = $query2->row();
        $berkas1temp = $row2->foto;
        $path1 ='./assets/images/foto/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_pegawai->hapus($id_pegawai);
        redirect(base_url()."kepegawaian/admin/pegawai?msg=1");
    }

    function gantipassword()
    {
        $id_pegawai = $this->input->post("id_pegawai");
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_pegawai->lihatdatasatu($id_pegawai)->row_array();
        $this->load->view("v_admin/pegawai/v_password",$variabel);
    }
    function gantipasswordproses()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'password'=> md5($this->input->post('password')),
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $exec = $this->m_pegawai->editdata($id_pegawai,$array);
                if ($exec){
                 redirect(base_url("kepegawaian/admin/pegawai?msg=2"));
                }
      } else {
      }

    }

 


    


}