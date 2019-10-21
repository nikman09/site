<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pegawai extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        $this->db->select("pg_pegawai.*, pg_jabatan.*, pg_subjabatan.*, pg_pangkat.*, pg_pendidikan.*, pg_pegawai.id_jabatan as 'id_jabatan', pg_pegawai.id_subjabatan as 'id_subjabatan' ")
        ->join("pg_jabatan","pg_pegawai.id_jabatan=pg_jabatan.id_jabatan","left")
        ->join("pg_subjabatan","pg_pegawai.id_subjabatan=pg_subjabatan.id_subjabatan","left")
        ->join("pg_pangkat","pg_pegawai.id_pangkat=pg_pangkat.id_pangkat","left")
        ->join("pg_pendidikan","pg_pegawai.id_pendidikan=pg_pendidikan.id_pendidikan","left")
        ->order_by("pg_pangkat.id_pangkat","desc");
        return $this->db->get('pg_pegawai');
    }
   
      function lihatdatasatu($id_pegawai)
    {
        $this->db->select("pg_pegawai.*, pg_jabatan.*, pg_subjabatan.*, pg_pangkat.*, pg_pendidikan.*, pg_pegawai.id_jabatan as 'id_jabatan', pg_pegawai.id_subjabatan as 'id_subjabatan' ")
        ->join("pg_jabatan","pg_pegawai.id_jabatan=pg_jabatan.id_jabatan","left")
        ->join("pg_subjabatan","pg_pegawai.id_subjabatan=pg_subjabatan.id_subjabatan","left")
        ->join("pg_pangkat","pg_pegawai.id_pangkat=pg_pangkat.id_pangkat","left")
        ->join("pg_pendidikan","pg_pegawai.id_pendidikan=pg_pendidikan.id_pendidikan","left");
        $this->db->where("pg_pegawai.id_pegawai",$id_pegawai);
        return $this->db->get('pg_pegawai');
    }
    function cekdata($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->get('pg_pegawai')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pg_pegawai',$array);
    }

    function editdata($id_pegawai,$array)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->update('pg_pegawai',$array);
    }
    function hapus($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->delete('pg_pegawai');
    }
  
}
