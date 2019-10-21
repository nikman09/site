<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        cekloginadmin();
        $this->load->model("m_admin/m_dashboard");
        $this->load->model("m_admin/m_pegawai");
        $this->load->model("m_admin/m_jabatan");
        $this->load->model("m_admin/m_pangkat");
        $this->load->model("m_admin/m_pendidikan");
        $this->load->model("m_admin/m_general");
        $this->load->model("m_admin/m_berkas");
        $this->load->model("m_admin/m_riwayatpendidikan");
        $this->load->model("m_admin/m_subjabatan");
        $this->load->model("m_admin/m_profil");
    }

    // Dashboard
    public function index()
    {   
        $variabel['csrf'] = csrf();
        $rule = $this->session->userdata("rule");
        $seksi = $this->session->userdata("seksi");
        $nip = $this->session->userdata("nip");
        $variabel['tahun']  = date('Y');
        $variabel['jumlahpegawaipr']  = $this->m_dashboard->jumlahpegawaipr();
        $variabel['jumlahpegawailk']  = $this->m_dashboard->jumlahpegawailk();
        $variabel['jumlahpegawai']  = $this->m_dashboard->jumlahpegawai();
        $variabel['gol1']  = $this->m_dashboard->jumlahgolongan("1");
        $variabel['gol2']  = $this->m_dashboard->jumlahgolongan("2");
        $variabel['gol3']  = $this->m_dashboard->jumlahgolongan("3");
        $variabel['gol4']  = $this->m_dashboard->jumlahgolongan("4");
        $variabel['belummengisi']  = $this->m_dashboard->jumlahgolongan(null);
        $variabel['struktural']  = $this->m_dashboard->jumlahjabatan("1");
        $variabel['fungsionalumum']  = $this->m_dashboard->jumlahjabatan("2");
        $variabel['fungsionaltertentu']  = $this->m_dashboard->jumlahjabatan("3");
        $variabel['belummengisi2']  = $this->m_dashboard->jumlahjabatan("0");
        $variabel['pangkat']  = $this->m_dashboard->pangkat();
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
            $this->form_validation->set_rules('nip','NIP','required|trim|is_unique[pg_pegawai.nip]');
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
                    $id = $this->db->insert_id();

                    $array2=array(
                        'id_pegawai'=> $id 
                        );
                    $exec2 = $this->m_berkas->tambahdata($array2);
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
                $is_unique =  '|is_unique[pg_pegawai.nip]';
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
                $config['max_size']     =  2048;
                $config['file_name'] =  $id_pegawai; 
                $this->load->library('upload', $config);
                if (isset($_FILES['foto']) && !empty($_FILES['foto']['name']))
                {
                    if ($this->upload->do_upload("foto"))
                    {
                        $upload = $this->upload->data();
                        $foto = $upload["raw_name"].$upload["file_ext"];
                        $array['foto']=$foto;

                        $query2 = $this->m_pegawai->lihatdatasatu($id_pegawai);
                        $row2 = $query2->row();
                        $berkas1temp = $row2->foto;
                        $path1 ='./assets/images/foto/'.$berkas1temp.'';
                        if(is_file($path1)) {
                            unlink($path1); //menghapus gambar di folder produk
                        }
                        $exec = $this->m_pegawai->editdata($id_pegawai,$array);
                        if ($exec){
                            redirect(base_url("kepegawaian/admin/pegawaiedit?id=".$id_pegawai."&msg=1"));
                        }
                      
                    } else {
                        $id_pegawai = $this->input->get("id");
                        $exec = $this->m_pegawai->lihatdatasatu($id_pegawai);
                        if ($exec->num_rows()>0){
                            $variabel['data'] = $exec ->row_array();
                            $variabel['datasubjabatan']=$this->m_general->ambilsubjabatan($variabel['data']['id_jabatan']);
                            $variabel['fotoerror'] = 1;
                            $variabel['error'] = 0;
                            $this->layout->renderadmin('v_admin/pegawai/v_pegawai_edit',$variabel,'v_admin/pegawai/v_pegawai_edit_js');
                        } else {
                            redirect(base_url("kepegawaian/admin/pegawai"));
                        }

                    }
                } else {
                    $exec = $this->m_pegawai->editdata($id_pegawai,$array);
                    if ($exec){
                        redirect(base_url("kepegawaian/admin/pegawaiedit?id=".$id_pegawai."&msg=1"));
                    }
                }
               }else{
                    $id_pegawai = $this->input->get("id");
                    $exec = $this->m_pegawai->lihatdatasatu($id_pegawai);
                    $variabel['error'] = 0;
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

    function berkas()
    {
        $variabel['csrf'] = csrf();
        $id_pegawai = $this->input->get("id");
        $exec = $this->m_berkas->lihatdatasatu($id_pegawai);
        if ($exec->num_rows()>0){
            $variabel['data'] = $exec ->row_array();
            $variabel['pegawai'] = $this->m_pegawai->lihatdatasatu($id_pegawai)->row_array();
            $this->layout->renderadmin('v_admin/berkas/v_berkas',$variabel,'v_admin/berkas/v_berkas_js');
        } else {
          //  redirect(base_url("kepegawaian/admin/pegawai"));//
        }
    }

    function uploadktp()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->input->post('id_pegawai');
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
                $config['file_name'] = $id_pegawai ;
                $config['max_size']     =  5120;
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
                    $exec = $this->m_berkas->editdata($id_pegawai,$array);
                    if ($exec){
                     redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=KTP"));
                    }
                } else {
                    redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=3&l=KTP"));
                }
               
          
      } else {
        redirect(base_url("kepegawaian/admin/berkas"));
      }
    }

    function uploadkartunikah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->input->post('id_pegawai');
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
                $config['file_name'] = $id_pegawai ;                 
                $config['max_size']     =  5120;
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
                    $exec = $this->m_berkas->editdata($id_pegawai,$array);
                    if ($exec){
                     redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=Kartu Nikah"));
                    }
                } else {
                    redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=3&l=Kartu Nikah"));
                }
              
          
      } else {
        redirect(base_url("kepegawaian/admin/berkas"));
      }
    }

  
    function uploadkariskarsu()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->input->post('id_pegawai');
             $exec = $this->m_berkas->lihatdataberkas($id_pegawai);
             if ($exec->num_rows()==0){
                $array2 = array (
                    "id_pegawai" =>$id_pegawai
                );
                $exec = $this->m_berkas->tambahdata($array2);
              }
            $array=array(
                'kariskarsu'=> $this->input->post('kariskarsu')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/kariskarsu';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $config['file_name'] = $id_pegawai ;                 
                $config['max_size']     =  5120;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("kariskarsu"))
                {
                    $upload = $this->upload->data();
                    $kariskarsu = $upload["raw_name"].$upload["file_ext"];
                    $array['kariskarsu']=$kariskarsu;

                    $query2 = $this->m_berkas->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->kariskarsu;
                    $path1 ='./assets/images/kariskarsu/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                    $exec = $this->m_berkas->editdata($id_pegawai,$array);
                    if ($exec){
                     redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=Kartu Nikah"));
                    }
                } else {
                    redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=3&l=Kartu Nikah"));
                }
               
          
      } else {
        redirect(base_url("kepegawaian/admin/berkas"));
      }
    }

    function uploadkartukeluarga()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->input->post('id_pegawai');
             $exec = $this->m_berkas->lihatdataberkas($id_pegawai);
             if ($exec->num_rows()==0){
                $array2 = array (
                    "id_pegawai" =>$id_pegawai
                );
                $exec = $this->m_berkas->tambahdata($array2);
              }
            $array=array(
                'kartukeluarga'=> $this->input->post('kartukeluarga')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/kartukeluarga';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $config['file_name'] = $id_pegawai ;                 
                $config['max_size']     =  5120;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("kartukeluarga"))
                {
                    $upload = $this->upload->data();
                    $kartukeluarga = $upload["raw_name"].$upload["file_ext"];
                    $array['kartukeluarga']=$kartukeluarga;

                    $query2 = $this->m_berkas->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->kartukeluarga;
                    $path1 ='./assets/images/kartukeluarga/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                    $exec = $this->m_berkas->editdata($id_pegawai,$array);
                    if ($exec){
                    redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=Kartu Keluarga"));
                    }
                } else {
                    redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=3&l=Kartu Keluarga"));
                }
                
          
      } else {
        redirect(base_url("kepegawaian/admin/berkas"));
      }
    }

    function uploadbpjs()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->input->post('id_pegawai');
             $exec = $this->m_berkas->lihatdataberkas($id_pegawai);
             if ($exec->num_rows()==0){
                $array2 = array (
                    "id_pegawai" =>$id_pegawai
                );
                $exec = $this->m_berkas->tambahdata($array2);
              }
            $array=array(
                'bpjs'=> $this->input->post('bpjs')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/bpjs';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $config['file_name'] = $id_pegawai ;                 
                $config['max_size']     =  5120;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("bpjs"))
                {
                    $upload = $this->upload->data();
                    $bpjs = $upload["raw_name"].$upload["file_ext"];
                    $array['bpjs']=$bpjs;

                    $query2 = $this->m_berkas->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->bpjs;
                    $path1 ='./assets/images/bpjs/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                    $exec = $this->m_berkas->editdata($id_pegawai,$array);
                    if ($exec){
                     redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=BPJS"));
                    }
                } else {
                    redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=3&l=BPJS"));
                }
               
          
      } else {
        redirect(base_url("kepegawaian/admin/berkas"));
      }
    }

    function uploadtaspen()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->input->post('id_pegawai');
             $exec = $this->m_berkas->lihatdataberkas($id_pegawai);
             if ($exec->num_rows()==0){
                $array2 = array (
                    "id_pegawai" =>$id_pegawai
                );
                $exec = $this->m_berkas->tambahdata($array2);
              }
            $array=array(
                'taspen'=> $this->input->post('taspen')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/taspen';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $config['file_name'] = $id_pegawai ;                 
                $config['max_size']     =  5120;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("taspen"))
                {
                    $upload = $this->upload->data();
                    $taspen = $upload["raw_name"].$upload["file_ext"];
                    $array['taspen']=$taspen;

                    $query2 = $this->m_berkas->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->taspen;
                    $path1 ='./assets/images/taspen/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                    $exec = $this->m_berkas->editdata($id_pegawai,$array);
                    if ($exec){
                     redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=TASPEN"));
                    }
                } else {
                    redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=3&l=TASPEN"));
                }
               
          
      } else {
        redirect(base_url("kepegawaian/admin/berkas"));
      }
    }

    function uploadskcpns()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->input->post('id_pegawai');
             $exec = $this->m_berkas->lihatdataberkas($id_pegawai);
             if ($exec->num_rows()==0){
                $array2 = array (
                    "id_pegawai" =>$id_pegawai
                );
                $exec = $this->m_berkas->tambahdata($array2);
              }
            $array=array(
                'skcpns'=> $this->input->post('skcpns')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/skcpns';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $config['file_name'] = $id_pegawai ;                
                $config['max_size']     =  5120;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("skcpns"))
                {
                    $upload = $this->upload->data();
                    $skcpns = $upload["raw_name"].$upload["file_ext"];
                    $array['skcpns']=$skcpns;

                    $query2 = $this->m_berkas->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->skcpns;
                    $path1 ='./assets/images/skcpns/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                    $exec = $this->m_berkas->editdata($id_pegawai,$array);
                    if ($exec){
                     redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=SK CPNS"));
                    }
                } else {
                    if ($exec){
                        redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=3&l=SK CPNS"));
                       }
                }
               
          
      } else {
        redirect(base_url("kepegawaian/admin/berkas"));
      }
    }

    function uploadskpns()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->input->post('id_pegawai');
             $exec = $this->m_berkas->lihatdataberkas($id_pegawai);
             if ($exec->num_rows()==0){
                $array2 = array (
                    "id_pegawai" =>$id_pegawai
                );
                $exec = $this->m_berkas->tambahdata($array2);
              }
            $array=array(
                'skpns'=> $this->input->post('skpns')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/skpns';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $config['file_name'] = $id_pegawai ;
                $config['max_size']     =  5120;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("skpns"))
                {
                    $upload = $this->upload->data();
                    $skpns = $upload["raw_name"].$upload["file_ext"];
                    $array['skpns']=$skpns;

                    $query2 = $this->m_berkas->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->skpns;
                    $path1 ='./assets/images/skpns/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                    $exec = $this->m_berkas->editdata($id_pegawai,$array);
                    if ($exec){
                     redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=SK PNS"));
                    }
                } else {
                    redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=SK PNS"));
                }
               
          
      } else {
        redirect(base_url("kepegawaian/admin/berkas"));
      }
    }


    function uploadkarpeg()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
             $id_pegawai = $this->input->post('id_pegawai');
             $exec = $this->m_berkas->lihatdataberkas($id_pegawai);
             if ($exec->num_rows()==0){
                $array2 = array (
                    "id_pegawai" =>$id_pegawai
                );
                $exec = $this->m_berkas->tambahdata($array2);
              }
            $array=array(
                'karpeg'=> $this->input->post('karpeg')
                );
                $id_pegawai = $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/karpeg';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $config['file_name'] = $id_pegawai ;               
                $config['max_size']     =  5120;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("karpeg"))
                {
                    $upload = $this->upload->data();
                    $karpeg = $upload["raw_name"].$upload["file_ext"];
                    $array['karpeg']=$karpeg;

                    $query2 = $this->m_berkas->lihatdatasatu($id_pegawai);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->karpeg;
                    $path1 ='./assets/images/karpeg/'.$berkas1temp.'';
                    echo "$path1";
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                    $exec = $this->m_berkas->editdata($id_pegawai,$array);
                    if ($exec){
                     redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=1&l=Kartu Nikah"));
                    }
                } else {
                    redirect(base_url("kepegawaian/admin/berkas?id=$id_pegawai&msg=3&l=Kartu Nikah"));
                }
               
          
      } else {
        redirect(base_url("kepegawaian/admin/berkas"));
      }
    }

    function riwayatpendidikan()
    {
        $variabel['csrf'] = csrf();
        $variabel['pendidikan'] = $this->m_pendidikan->lihatdata();
        $id_pegawai = $this->input->get("id");
        $variabel['data'] = $this->m_riwayatpendidikan->lihatdata($id_pegawai);
        $variabel['pegawai'] = $this->m_pegawai->lihatdatasatu($id_pegawai)->row_array();
        $variabel['id_pegawai'] = $id_pegawai;        
        $this->layout->renderadmin('v_admin/riwayatpendidikan/v_riwayatpendidikan',$variabel,'v_admin/riwayatpendidikan/v_riwayatpendidikan_js');
    }
    
    function riwayatpendidikantambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $id_pegawai = $this->input->post("id_pegawai");
                $array=array(
                    'id_pegawai'=> $id_pegawai,
                    'id_pendidikan'=> $this->input->post('id_pendidikan'),
                    'nama'=>$this->input->post('nama'),
                    'tahunlulus'=>$this->input->post('tahunlulus')
                    );
                    $config['upload_path'] = './assets/berkas/riwayatpendidikan';
                    $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                    $config['file_name'] = $id_pegawai;
                    $config['max_size']     =  5120;
                    $this->load->library('upload', $config);
                    if ($this->upload->do_upload("berkas"))
                    {
                        $upload = $this->upload->data();
                        $berkas = $upload["raw_name"].$upload["file_ext"];
                        $array['berkas']=$berkas;
                    }
                    $exec = $this->m_riwayatpendidikan->tambahdata($array);
                    if ($exec) redirect(base_url("kepegawaian/admin/riwayatpendidikan?id=$id_pegawai&msg=1"));
                    else redirect(base_url("kepegawaian/admin/riwayatpendidikan?id=$id_pegawai&msg=0"));
        } else {
            $this->layout->renderadmin('v_admin/riwayatpendidikan/v_riwayatpendidikan',$variabel,'v_admin/riwayatpendidikan/v_riwayatpendidikan_js');
    
        }
    }

    function riwayatpendidikanhapus()
    {
        $id_riwayatpendidikan = $this->input->get("id");
        $id_pegawai = $this->input->get("id_pegawai");
        $query2 = $this->m_riwayatpendidikan->lihatdatasatu($id_riwayatpendidikan);
        $row2 = $query2->row();
        $berkas1temp = $row2->berkas;
        $path1 ='./assets/berkas/riwayatpendidikan/'.$berkas1temp.'';
        if(is_file($path1)) {
            unlink($path1);
        }
        $exec = $this->m_riwayatpendidikan->hapus($id_riwayatpendidikan);
       redirect(base_url()."kepegawaian/admin/riwayatpendidikan?id=$id_pegawai&msg=2");
    }

    function riwayatpendidikanedit()
    {
        $id_riwayatpendidikan = $this->input->post("id_riwayatpendidikan");
        $variabel['pendidikan'] = $this->m_pendidikan->lihatdata();
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_riwayatpendidikan->lihatdatasatu($id_riwayatpendidikan)->row_array();
        $this->load->view("v_admin/riwayatpendidikan/v_riwayatpendidikan_edit",$variabel);
    }
    function riwayatpendidikaneditproses()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'id_pendidikan'=> $this->input->post('id_pendidikan'),
                'nama'=>$this->input->post('nama'),
                'tahunlulus'=>$this->input->post('tahunlulus')
                );
                $id_riwayatpendidikan = $this->input->post("id_riwayatpendidikan");
                $id_pegawai= $this->input->post("id_pegawai");
                $config['upload_path'] = './assets/berkas/riwayatpendidikan';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $config['file_name'] = $id_pegawai;                
                $config['max_size']     =  5120;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload("berkas"))
                {
                    $upload = $this->upload->data();
                    $berkas = $upload["raw_name"].$upload["file_ext"];
                    $array['berkas']=$berkas;

                    $query2 = $this->m_riwayatpendidikan->lihatdatasatu($id_riwayatpendidikan);
                    $row2 = $query2->row();
                    $berkas1temp = $row2->berkas;
                    $path1 ='./assets/berkas/riwayatpendidikan/'.$berkas1temp.'';
                    if(is_file($path1)) {
                        unlink($path1); //menghapus gambar di folder produk
                    }
                }
                $exec = $this->m_riwayatpendidikan->editdata($id_riwayatpendidikan,$array);
                if ($exec){
              redirect(base_url("kepegawaian/admin/riwayatpendidikan?id=$id_pegawai&msg=0"));
                }
      } else {
      }

    }
 
    function jabatan()
    {
        $variabel['csrf'] = csrf();
        $variabel['data'] = $this->m_jabatan->lihatdata();
        $this->layout->renderadmin('v_admin/jabatan/v_jabatan',$variabel,'v_admin/jabatan/v_jabatan_js');
    }
    
    function jabatantambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
                $array=array(
                    'nama_jabatan'=> $this->input->post('nama_jabatan'),
                    );
                    $exec = $this->m_jabatan->tambahdata($array);
                    if ($exec) redirect(base_url("kepegawaian/admin/jabatan?msg=1"));
                    else redirect(base_url("kepegawaian/admin/jabatan?msg=0"));
        } else {
            $this->layout->renderadmin('v_admin/jabatan/v_jabatan',$variabel,'v_admin/jabatan/v_jabatan_js');
    
        }
    }

    function jabatanhapus()
    {
        $id_jabatan = $this->input->get("id");
        $exec = $this->m_jabatan->hapus($id_jabatan);
       redirect(base_url()."kepegawaian/admin/jabatan?msg=2");
    }

    function jabatanedit()
    {
		$variabel['csrf'] = csrf();
        $id_jabatan = $this->input->post("id_jabatan");
        $variabel['data'] = $this->m_jabatan->lihatdatasatu($id_jabatan)->row_array();
        $this->load->view("v_admin/jabatan/v_jabatan_edit",$variabel);
    }
    function jabataneditproses()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'nama_jabatan'=> $this->input->post('nama_jabatan')
                );
                $id_jabatan = $this->input->post("id_jabatan");
                $exec = $this->m_jabatan->editdata($id_jabatan,$array);
                if ($exec){
              redirect(base_url("kepegawaian/admin/jabatan?msg=0"));
                }
      } else {
      }

    }
 
    function rincian()
    {
        $variabel['csrf'] = csrf();
        $id_jabatan = $this->input->get("id");
        $variabel['jabatan'] = $this->m_jabatan->lihatdatasatu($id_jabatan)->row_array();
        $variabel['data'] = $this->m_subjabatan->lihatdata($id_jabatan);    
        $this->layout->renderadmin('v_admin/subjabatan/v_subjabatan',$variabel,'v_admin/subjabatan/v_subjabatan_js');
    }
    
    function rinciantambah()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()){
            $id_jabatan = $this->input->post("id_jabatan");
                $array=array(
                    'id_jabatan'=> $id_jabatan,
                    'nama_subjabatan'=> $this->input->post('nama_subjabatan')
                    );
                    $exec = $this->m_subjabatan->tambahdata($array);
                    if ($exec) redirect(base_url("kepegawaian/admin/rincian?id=$id_jabatan&msg=1"));
                    else redirect(base_url("kepegawaian/admin/rincian?id=$id_jabatan&msg=0"));
        } else {
            $this->layout->renderadmin('v_admin/subjabatan/v_subjabatan',$variabel,'v_admin/subjabatan/v_subjabatan_js');
    
        }
    }

    function rincianhapus()
    {
        $id_subjabatan = $this->input->get("id");
        $variabel = $this->m_subjabatan->lihatdatasatu($id_subjabatan)->row_array();
        $id_jabatan = $variabel["id_jabatan"];
        $exec = $this->m_subjabatan->hapus($id_subjabatan);
       redirect(base_url()."kepegawaian/admin/rincian?id=$id_jabatan&msg=2");
    }

    function rincianedit()
    {
        $variabel['csrf'] = csrf();
        $id_subjabatan = $this->input->post("id_subjabatan");
        $variabel['data'] = $this->m_subjabatan->lihatdatasatu($id_subjabatan)->row_array();
        $this->load->view("v_admin/subjabatan/v_subjabatan_edit",$variabel);
    }
    function rincianeditproses()
    {
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
            'nama_subjabatan'=> $this->input->post('nama_subjabatan')
            );
            $id_subjabatan = $this->input->post("id_subjabatan");
            $variabel = $this->m_subjabatan->lihatdatasatu($id_subjabatan)->row_array();
                $id_jabatan = $variabel["id_jabatan"];
            $exec = $this->m_subjabatan->editdata($id_subjabatan,$array);
            if ($exec){
             redirect(base_url("kepegawaian/admin/rincian?id=$id_jabatan&msg=0"));
            }
      } else {
      }

    }

    function tentang()
    {
        $variabel['csrf'] = csrf();
        $this->layout->renderadmin("v_admin/tentang/v_tentang",$variabel);
    }

    function profil()
    {
      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $username2 = $this->input->post('username2');
            if ( $username!= $username2) {
                $is_unique =  '|is_unique[pg_administrator.username]';
             } else {
                $is_unique =  '';
             }
             
            $this->form_validation->set_rules('username','Username','required|trim'. $is_unique.'');
            
            if($this->form_validation->run() != false){
            $array=array(
                'username'=> $this->input->post('username'),
                'nama'=> $this->input->post('nama'),
                'alamat'=>$this->input->post('alamat',FALSE),
                'nohp'=>$this->input->post('nohp'),
                'email'=>$this->input->post('email')
                );
                $username = $this->input->post("username");
                $config['upload_path'] = './assets/images/foto';
                $config['allowed_types'] = 'jpg|jpeg|JPG|JPEG|pdf|PNG|png';
                $config['max_size']     =  2048;
                $config['file_name'] = $username;
                $this->load->library('upload', $config);
                if (isset($_FILES['foto']) && !empty($_FILES['foto']['name']))
                {
                    if ($this->upload->do_upload("foto"))
                    {
                        $upload = $this->upload->data();
                        $foto = $upload["raw_name"].$upload["file_ext"];
                        $array['foto']=$foto;

                        $query2 = $this->m_profil->lihatdatasatu($username);
                        $row2 = $query2->row();
                        $berkas1temp = $row2->foto;
                        $path1 ='./assets/images/foto/'.$berkas1temp.'';
                        if(is_file($path1)) {
                            unlink($path1); //menghapus gambar di folder produk
                        }
                             $data_session = array(
                            'admin_username'=> $username,
                            'admin_foto'=> $foto
                            );

                            $this->session->set_userdata($data_session);
                        $exec = $this->m_profil->editdata($username,$array);
                        if ($exec){
                            redirect(base_url("kepegawaian/admin/profil?&msg=1"));
                        }
                      
                    } else {
                        $username = $this->session->userdata("admin_username");
                        $exec = $this->m_profile->lihatdatasatu($username);
                        if ($exec->num_rows()>0){
                            $variabel['data'] = $exec ->row_array();
                            $variabel['fotoerror'] = 1;
                            $variabel['error'] = 0;
                            $this->layout->renderadmin('v_admin/profil/v_profil',$variabel,'v_admin/profil/v_profil_js');
                        } else {
                            redirect(base_url("kepegawaian/admin/profil"));
                        }

                    }
                } else {
                    $data_session = array(
                        'admin_username'=> $username
                        );
                        $this->session->set_userdata($data_session);
                    $exec = $this->m_profil->editdata($username2,$array);
                    if ($exec){
                        redirect(base_url("kepegawaian/admin/profil?msg=1"));
                    }
                }
               }else{
                   $username = $this->session->userdata("admin_username");
                    $exec = $this->m_profil->lihatdatasatu($username);
                    $variabel['error'] = 0;
                    if ($exec->num_rows()>0){
                        $variabel['data'] = $exec ->row_array();
                      $this->layout->renderadmin('v_admin/profil/v_profil',$variabel,'v_admin/profil/v_profil_js');
                    } else {
                        redirect(base_url("kepegawaian/admin/profil"));
                    }
               }
          
      } else {
            $username = $this->session->userdata("admin_username");
            $exec = $this->m_profil->lihatdatasatu($username);
            if ($exec->num_rows()>0){
                $variabel['data'] = $exec ->row_array();
                $this->layout->renderadmin('v_admin/profil/v_profil',$variabel,'v_admin/profil/v_profil_js');
            } else {
                redirect(base_url("kepegawaian/admin/profil"));
            }
      }

    }


    function password()
    {
      
        $variabel['csrf'] = csrf();
        if ($this->input->post()) {
            $array=array(
                'password'=> md5($this->input->post('password'))
                );
                $username = $this->session->userdata("admin_username");
                $exec = $this->m_profil->editdata($username,$array);
                if ($exec){
                    redirect(base_url("kepegawaian/admin/password?msg=1"));
                }
         } else {
                $this->layout->renderadmin('v_admin/password/v_password',$variabel,'v_admin/password/v_password_js');
           
      }

    }
    


}