<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelatihan_pesan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_pesan)
    {
        $this->db->select("pl_pesan.*");
        $this->db->where("pl_pesan.id_pesan",$id_pesan);
        return $this->db->get('pl_pesan');
    }

    function lihatdata()
    {
        $this->db->select("pl_pesan.*");
        return $this->db->get('pl_pesan');
    }
    function cekdata($id_pesan)
    {
        $this->db->where("id_pesan",$id_pesan);
        return $this->db->get('pl_pesan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pl_pesan',$array);
    }

    function editdata($id_pesan,$array)
    {
        $this->db->where("id_pesan",$id_pesan);
        return $this->db->update('pl_pesan',$array);
    }
    function hapus($id_pesan)
    {
        $this->db->where("id_pesan",$id_pesan);
        return $this->db->delete('pl_pesan');
    }
  
}
