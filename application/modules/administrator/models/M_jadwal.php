<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jadwal extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_jadwal)
    {
        $this->db->select("tb_jadwal.*");
        $this->db->where("tb_jadwal.id_jadwal",$id_jadwal);
        return $this->db->get('tb_jadwal');
    }

    function lihatdata()
    {
        $this->db->select("tb_jadwal.*");
        return $this->db->get('tb_jadwal');
    }
    function cekdata($id_jadwal)
    {
        $this->db->where("id_jadwal",$id_jadwal);
        return $this->db->get('tb_jadwal')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_jadwal',$array);
    }

    function editdata($id_jadwal,$array)
    {
        $this->db->where("id_jadwal",$id_jadwal);
        return $this->db->update('tb_jadwal',$array);
    }
    function hapus($id_jadwal)
    {
        $this->db->where("id_jadwal",$id_jadwal);
        return $this->db->delete('tb_jadwal');
    }
  
}
