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
        return $this->db->get('tb_riwayatpendidikan');
    }
   
    
  
}
