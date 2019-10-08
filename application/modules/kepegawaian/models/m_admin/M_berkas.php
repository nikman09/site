<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_berkas extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
      function lihatdatasatu($id_pegawai)
    {
        $this->db->select("tb_pegawai.*,tb_berkaspegawai.*,tb_pegawai.id_pegawai as id_pegawai");
        $this->db->join("tb_berkaspegawai","tb_pegawai.id_pegawai=tb_berkaspegawai.id_pegawai","left");
        $this->db->where("tb_pegawai.id_pegawai",$id_pegawai);
        return $this->db->get('tb_pegawai');
    }

    function lihatdataberkas($id_pegawai)
    {
        $this->db->select("tb_berkaspegawai.*");
        $this->db->where("tb_berkaspegawai.id_pegawai",$id_pegawai);
        return $this->db->get('tb_berkaspegawai');
    }
    function cekdata($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->get('tb_pegawai')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_berkaspegawai',$array);
    }

    function editdata($id_pegawai,$array)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->update('tb_berkaspegawai',$array);
    }
    function hapus($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->delete('tb_pegawai');
    }
  
}
