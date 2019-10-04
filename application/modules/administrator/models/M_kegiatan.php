<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kegiatan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_kegiatan)
    {
        $this->db->select("tb_kegiatan.*");
        $this->db->where("tb_kegiatan.id_kegiatan",$id_kegiatan);
        return $this->db->get('tb_kegiatan');
    }

    function lihatdata()
    {
        $this->db->select("tb_kegiatan.*,tb_kegiatankategori.* ")
        ->join("tb_kegiatankategori","tb_kegiatankategori.id_kegiatankategori=tb_kegiatan.id_kegiatankategori","left");

        return $this->db->get('tb_kegiatan');
    }
    function cekdata($id_kegiatan)
    {
        $this->db->where("id_kegiatan",$id_kegiatan);
        return $this->db->get('tb_kegiatan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_kegiatan',$array);
    }

    function editdata($id_kegiatan,$array)
    {
        $this->db->where("id_kegiatan",$id_kegiatan);
        return $this->db->update('tb_kegiatan',$array);
    }
    function hapus($id_kegiatan)
    {
        $this->db->where("id_kegiatan",$id_kegiatan);
        return $this->db->delete('tb_kegiatan');
    }
  
}
