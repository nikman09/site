<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_riwayatpendidikan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata($id_pegawai)
    {
        $this->db->select("pg_riwayatpendidikan.*, pg_pendidikan.*, pg_riwayatpendidikan.id_pendidikan")
        ->join("pg_pendidikan","pg_pendidikan.id_pendidikan=pg_riwayatpendidikan.id_pendidikan");
        $this->db->where("id_pegawai",$id_pegawai);
        $this->db->order_by("pg_pendidikan.tingkat","asc");
        return $this->db->get('pg_riwayatpendidikan');
    }

    function lihatdatasatu($id_riwayatpendidikan)
    {
        $this->db->where("id_riwayatpendidikan",$id_riwayatpendidikan);
        return $this->db->get('pg_riwayatpendidikan');
    }
    function tambahdata($array)
    {
        return $this->db->insert('pg_riwayatpendidikan',$array);
    }
   
    function hapus($id_riwayatpendidikan)
    {
        $this->db->where("id_riwayatpendidikan",$id_riwayatpendidikan);
        return $this->db->delete('pg_riwayatpendidikan');
    }

    function editdata($id_riwayatpendidikan,$array)
    {
        $this->db->where("id_riwayatpendidikan",$id_riwayatpendidikan);
        return $this->db->update('pg_riwayatpendidikan',$array);
    }
    
  
}
