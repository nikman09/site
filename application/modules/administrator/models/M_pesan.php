<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pesan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_pesan)
    {
        $this->db->select("tb_pesan.*");
        $this->db->where("tb_pesan.id_pesan",$id_pesan);
        return $this->db->get('tb_pesan');
    }

    function lihatdata()
    {
        $this->db->select("tb_pesan.*");
        return $this->db->get('tb_pesan');
    }
    function cekdata($id_pesan)
    {
        $this->db->where("id_pesan",$id_pesan);
        return $this->db->get('tb_pesan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_pesan',$array);
    }

    function editdata($id_pesan,$array)
    {
        $this->db->where("id_pesan",$id_pesan);
        return $this->db->update('tb_pesan',$array);
    }
    function hapus($id_pesan)
    {
        $this->db->where("id_pesan",$id_pesan);
        return $this->db->delete('tb_pesan');
    }
  
}
