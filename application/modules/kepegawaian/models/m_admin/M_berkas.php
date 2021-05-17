<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_berkas extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
      function lihatdatasatu($id_pegawai)
    {
        $this->db->select("pg_pegawai.*,pg_berkaspegawai.*,pg_pegawai.id_pegawai as id_pegawai");
        $this->db->join("pg_berkaspegawai","pg_pegawai.id_pegawai=pg_berkaspegawai.id_pegawai","left");
        $this->db->where("pg_pegawai.id_pegawai",$id_pegawai);
        return $this->db->get('pg_pegawai');
    }

    function lihatdataberkas($id_pegawai)
    {
        $this->db->select("pg_berkaspegawai.*");
        $this->db->where("pg_berkaspegawai.id_pegawai",$id_pegawai);
        return $this->db->get('pg_berkaspegawai');
    }
    function cekdata($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->get('pg_pegawai')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pg_berkaspegawai',$array);
    }

    function editdata($id_pegawai,$array)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->update('pg_berkaspegawai',$array);
    }
    function hapus($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->delete('pg_pegawai');
    }
  
}
