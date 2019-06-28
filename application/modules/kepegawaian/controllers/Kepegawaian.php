<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Kepegawaian extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        ceklogin();
        $this->load->model("m_pegawai/m_general");
        $this->load->model("m_pegawai/m_seksi");
        $this->load->model("m_pegawai/m_pegawai");
        $this->load->model("m_pegawai/m_cpns");
        
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
        if ($this->input->post()) {
            $array=array(
                'nama'=> $this->input->post('nama'),
                'nip'=> $this->input->post('nip'),
                'gelardepan'=> $this->input->post('gelardepan'),
                'gelarbelakang'=> $this->input->post('gelarbelakang'),
                'tempat_lahir'=> $this->input->post('tempat_lahir'),
                'tanggal_lahir'=>tanggalawal($this->input->post('tanggal_lahir')),
                'jk'=> $this->input->post('jk'),
                'agama'=>$this->input->post('agama'),
                'status'=>$this->input->post('status'),
                'goldar'=>$this->input->post('goldar'),
                'alamat'=>$this->input->post('alamat',FALSE),
                'nohp'=>$this->input->post('nohp'),
                'kodepos'=>$this->input->post('kodepos'),
                'email'=>$this->input->post('email'),
                'statuspegawai'=>$this->input->post('statuspegawai'),
                'jenis'=>$this->input->post('jenis'),
                'jabatan'=>$this->input->post('jabatan'),
                'kedudukan'=>$this->input->post('kedudukan'),
                'ktp'=>$this->input->post('ktp'),
                'bpjs'=>$this->input->post('bpjs'),
                'karis'=>$this->input->post('karis'),
                'karpeg'=>$this->input->post('karpeg'),
                'taspen'=>$this->input->post('taspen'),
                'npwp'=>$this->input->post('npwp'),
                'id_seksi'=>$this->input->post('id_seksi')
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
                $variabel['seksi'] = $this->m_seksi->lihatdata();
                $this->layout->render('v_pegawai/pegawai/v_pegawai_edit',$variabel,'v_pegawai/pegawai/v_pegawai_edit_js');
            } else {
                redirect(base_url("kepegawaian/biodata"));
            }
      }

    }


    function cpns()
    {
   
        $variabel['csrf'] = csrf();
        $id_pegawai = $this->session->userdata("id_pegawai");
        $exec = $this->m_cpns->lihatdatasatu($id_pegawai);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $this->layout->render('v_pegawai/cpns/v_cpns_lihat',$variabel,'v_pegawai/cpns/v_cpns_js');
        } else {
            $array = array (
                "id_pegawai" =>$id_pegawai
            );
            $exec = $this->m_cpns->tambahdata($array);
            redirect(base_url("kepegawaian/cpns"));
        }
    }


    function cpnsedit()
    {
 
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'nomorsk'=> $this->input->post('nomorsk'),
                'tanggalsk'=> tanggalawal($this->input->post('tanggalsk')),
                'tmt'=> tanggalawal($this->input->post('tmt')),
                'golonganawal'=> $this->input->post('golonganawal'),
                'tingkatpendidikan'=> $this->input->post('tingkatpendidikan'),
                'pejabatpengesahan'=> $this->input->post('pejabatpengesahan'),
               
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/cpns';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("berkas"))
                {
                    $upload = $this->upload->data();
                    $berkas = $upload["raw_name"].$upload["file_ext"];
                    $array['berkas']=$berkas;

                    $query2 = $this->m_cpns->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->berkas;
                    $path1 ='./assets/images/berkas/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                }
                $exec = $this->m_cpns->editdata($id_pegawai,$array);
                if ($exec){
                 redirect(base_url("kepegawaian/cpnsedit?id=".$id_pegawai."&msg=1"));
                }
          
      } else {
            $id_pegawai = $this->session->userdata("id_pegawai");
            $exec = $this->m_cpns->lihatdatasatu($id_pegawai);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->render('v_pegawai/cpns/v_cpns_edit',$variabel,'v_pegawai/cpns/v_cpns_edit_js');
            } else {
                redirect(base_url("kepegawaian/cpns"));
            }
      }

    }

}