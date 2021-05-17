<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jadwaldetail extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_jadwaldetail)
    {
        $this->db->select("tb_jadwaldetail.*");
        $this->db->where("tb_jadwaldetail.id_jadwaldetail",$id_jadwaldetail);
        return $this->db->get('tb_jadwaldetail');
    }

    function lihatdatajadwal($id_jadwal,$limit, $start)
    {
        $this->db->select("tb_jadwaldetail.*");
        $this->db->where("tb_jadwaldetail.id_jadwal",$id_jadwal);
        return $this->db->get('tb_jadwaldetail',$limit, $start);
    }

    function lihatdatajadwal2($id_jadwal)
    {
        $this->db->select("tb_jadwaldetail.*");
        $this->db->where("tb_jadwaldetail.id_jadwal",$id_jadwal);
        return $this->db->get('tb_jadwaldetail');
    }

    function lihatdata()
    {
        $this->db->select("tb_jadwaldetail.*");
        return $this->db->get('tb_jadwaldetail');
    }
    function cekdata($id_jadwaldetail)
    {
        $this->db->where("id_jadwaldetail",$id_jadwaldetail);
        return $this->db->get('tb_jadwaldetail')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_jadwaldetail',$array);
    }

    function editdata($id_jadwaldetail,$array)
    {
        $this->db->where("id_jadwaldetail",$id_jadwaldetail);
        return $this->db->update('tb_jadwaldetail',$array);
    }
    function hapus($id_jadwaldetail)
    {
        $this->db->where("id_jadwaldetail",$id_jadwaldetail);
        return $this->db->delete('tb_jadwaldetail');
    }
  
}
