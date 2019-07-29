<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        $this->db->select("tb_pegawai.*, tb_jabatan.*, tb_subjabatan.*, tb_pangkat.*, tb_pendidikan.*, tb_pegawai.id_jabatan as 'id_jabatan', tb_pegawai.id_subjabatan as 'id_subjabatan' ")
        ->join("tb_jabatan","tb_pegawai.id_jabatan=tb_jabatan.id_jabatan","left")
        ->join("tb_subjabatan","tb_pegawai.id_subjabatan=tb_subjabatan.id_subjabatan","left")
        ->join("tb_pangkat","tb_pegawai.id_pangkat=tb_pangkat.id_pangkat","left")
        ->join("tb_pendidikan","tb_pegawai.id_pendidikan=tb_pendidikan.id_pendidikan","left")
        ->order_by("tb_pangkat.id_pangkat","desc");
        return $this->db->get('tb_pegawai');
    }
   
      function lihatdatasatu($id_pegawai)
    {
        $this->db->select("tb_pegawai.*, tb_jabatan.*, tb_subjabatan.*, tb_pangkat.*, tb_pendidikan.*, tb_pegawai.id_jabatan as 'id_jabatan', tb_pegawai.id_subjabatan as 'id_subjabatan' ")
        ->join("tb_jabatan","tb_pegawai.id_jabatan=tb_jabatan.id_jabatan","left")
        ->join("tb_subjabatan","tb_pegawai.id_subjabatan=tb_subjabatan.id_subjabatan","left")
        ->join("tb_pangkat","tb_pegawai.id_pangkat=tb_pangkat.id_pangkat","left")
        ->join("tb_pendidikan","tb_pegawai.id_pendidikan=tb_pendidikan.id_pendidikan","left");
        $this->db->where("tb_pegawai.id_pegawai",$id_pegawai);
        return $this->db->get('tb_pegawai');
    }
    function cekdata($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->get('tb_pegawai')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_pegawai',$array);
    }

    function editdata($id_pegawai,$array)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->update('tb_pegawai',$array);
    }
    function hapus($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->delete('tb_pegawai');
    }
  
}
