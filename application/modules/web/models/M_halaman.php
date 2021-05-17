<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_halaman extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_halaman)
    {
        $this->db->select("tb_halaman.*");
        $this->db->where("tb_halaman.id_halaman",$id_halaman);
        return $this->db->get('tb_halaman');
    }

    function lihatdata()
    {
        $this->db->select("tb_halaman.*");
        return $this->db->get('tb_halaman');
    }
    function cekdata($id_halaman)
    {
        $this->db->where("id_halaman",$id_halaman);
        return $this->db->get('tb_halaman')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_halaman',$array);
    }

    function editdata($id_halaman,$array)
    {
        $this->db->where("id_halaman",$id_halaman);
        return $this->db->update('tb_halaman',$array);
    }
    function hapus($id_halaman)
    {
        $this->db->where("id_halaman",$id_halaman);
        return $this->db->delete('tb_halaman');
    }
  
}
