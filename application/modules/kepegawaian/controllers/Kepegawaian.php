<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Kepegawaian extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        ceklogin();
        $this->load->model("m_pegawai/m_general");
        $this->load->model("m_pegawai/m_seksi");
        $this->load->model("m_pegawai/m_pegawai");
        $this->load->model("m_pegawai/m_jabatan");
        $this->load->model("m_pegawai/m_pangkat");
        $this->load->model("m_pegawai/m_pendidikan");
        $this->load->model("m_pegawai/m_berkas");
    }

    // Dashboard
    public function index()
    {   
       
        $variabel['csrf'] = csrf();
        $rule = $this->session->userdata("rule");
        $seksi = $this->session->userdata("seksi");
        $nip = $this->session->userdata("nip");
        $variabel['tahun']  = date('Y');
        
        $this->load->view('v_pegawai/dashboard/v_home',$variabel);
      
      
    }
    // End Dashboard

    function biodata()
    {
       
        $variabel['csrf'] = csrf();
        $id_pegawai = $this->session->userdata("id_pegawai");
        $exec = $this->m_pegawai->lihatdatasatu($id_pegawai);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('v_pegawai/pegawai/v_pegawai_lihat',$variabel,'v_pegawai/pegawai/v_pegawai_js');
        } else {
            redirect(base_url("kepegawaian/pegawai"));
        }
    }

    function biodataedit()
    {
        $variabel['csrf'] = csrf();
        $variabel['jabatan'] = $this->m_jabatan->lihatdata();
        $variabel['pangkat'] = $this->m_pangkat->lihatdata();
        $variabel['pendidikan'] = $this->m_pendidikan->lihatdata();
        if ($this->input->post()) {
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
                 redirect(base_url("kepegawaian/biodataedit?id=".$id_pegawai."&msg=1"));
                }
          
      } else {
            $id_pegawai = $this->session->userdata("id_pegawai");
            $exec = $this->m_pegawai->lihatdatasatu($id_pegawai);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $variabel['datasubjabatan']=$this->m_general->ambilsubjabatan($variabel['data']['id_jabatan']);
                $this->layout->render('v_pegawai/pegawai/v_pegawai_edit',$variabel,'v_pegawai/pegawai/v_pegawai_edit_js');
            } else {
                redirect(base_url("kepegawaian/biodata"));
            }
      }
    }

    function subjabatan()
    {
      $id=$this->input->post('id_jabatan');
      $data=$this->m_general->datasubjabatanajax($id);
      echo json_encode($data);
    }

    function berkas()
    {
        $variabel['csrf'] = csrf();
        $id_pegawai = $this->session->userdata("id_pegawai");
        $exec = $this->m_berkas->lihatdatasatu($id_pegawai);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('v_pegawai/berkas/v_berkas',$variabel,'v_pegawai/berkas/v_berkas_js');
        } else {
            redirect(base_url("kepegawaian/pegawai"));
        }
    }

    function uploadktp()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->session->userdata("id_pegawai");
             $exec = $this->m_berkas->lihatdataberkas($id_pegawai);
             if ($exec->num_rows()==0){
                $array2 = array (
                    "id_pegawai" =>$id_pegawai
                );
                $exec = $this->m_berkas->tambahdata($array2);
              }
            $array=array(
                'ktp'=> $this->input->post('ktp')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/ktp';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("ktp"))
                {
                    $upload = $this->upload->data();
                    $ktp = $upload["raw_name"].$upload["file_ext"];
                    $array['ktp']=$ktp;

                    $query2 = $this->m_berkas->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->ktp;
                    $path1 ='./assets/images/ktp/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                }
                $exec = $this->m_berkas->editdata($id_pegawai,$array);
                if ($exec){
                 redirect(base_url("kepegawaian/berkas?msg=1&l=KTP"));
                }
          
      } else {
        redirect(base_url("kepegawaian/berkas"));
      }
    }

    function uploadkartunikah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->session->userdata("id_pegawai");
             $exec = $this->m_berkas->lihatdataberkas($id_pegawai);
             if ($exec->num_rows()==0){
                $array2 = array (
                    "id_pegawai" =>$id_pegawai
                );
                $exec = $this->m_berkas->tambahdata($array2);
              }
            $array=array(
                'kartunikah'=> $this->input->post('kartunikah')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/kartunikah';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("kartunikah"))
                {
                    $upload = $this->upload->data();
                    $kartunikah = $upload["raw_name"].$upload["file_ext"];
                    $array['kartunikah']=$kartunikah;

                    $query2 = $this->m_berkas->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->kartunikah;
                    $path1 ='./assets/images/kartunikah/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                }
                $exec = $this->m_berkas->editdata($id_pegawai,$array);
                if ($exec){
                 redirect(base_url("kepegawaian/berkas?msg=1&l=Kartu Nikah"));
                }
          
      } else {
        redirect(base_url("kepegawaian/berkas"));
      }
    }

    

}