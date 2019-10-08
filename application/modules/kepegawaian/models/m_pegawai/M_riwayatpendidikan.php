<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_riwayatpendidikan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata($id_pegawai)
    {
        $this->db->select("tb_riwayatpendidikan.*, tb_pendidikan.*, tb_riwayatpendidikan.id_pendidikan")
        ->join("tb_pendidikan","tb_pendidikan.id_pendidikan=tb_riwayatpendidikan.id_pendidikan");
        $this->db->where("id_pegawai",$id_pegawai);
        $this->db->order_by("tb_pendidikan.tingkat","asc");
        return $this->db->get('tb_riwayatpendidikan');
    }

    function lihatdatasatu($id_riwayatpendidikan)
    {
        $this->db->where("id_riwayatpendidikan",$id_riwayatpendidikan);
        return $this->db->get('tb_riwayatpendidikan');
    }
    function tambahdata($array)
    {
        return $this->db->insert('tb_riwayatpendidikan',$array);
    }
   
    function hapus($id_riwayatpendidikan)
    {
        $this->db->where("id_riwayatpendidikan",$id_riwayatpendidikan);
        return $this->db->delete('tb_riwayatpendidikan');
    }

    function editdata($id_riwayatpendidikan,$array)
    {
        $this->db->where("id_riwayatpendidikan",$id_riwayatpendidikan);
        return $this->db->update('tb_riwayatpendidikan',$array);
    }
    
  
}
