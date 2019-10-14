<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_bidang extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_bidang)
    {
        $this->db->select("tb_bidang.*");
        $this->db->where("tb_bidang.id_bidang",$id_bidang);
        return $this->db->get('tb_bidang');
    }

    function lihatdata()
    {
        $this->db->select("tb_bidang.*");
        return $this->db->get('tb_bidang');
    }
    function cekdata($id_bidang)
    {
        $this->db->where("id_bidang",$id_bidang);
        return $this->db->get('tb_bidang')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_bidang',$array);
    }

    function editdata($id_bidang,$array)
    {
        $this->db->where("id_bidang",$id_bidang);
        return $this->db->update('tb_bidang',$array);
    }
    function hapus($id_bidang)
    {
        $this->db->where("id_bidang",$id_bidang);
        return $this->db->delete('tb_bidang');
    }
  
}
