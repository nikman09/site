<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pangkat extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_pangkat)
    {
        $this->db->select("tb_pangkat.*");
        $this->db->where("tb_pangkat.id_pangkat",$id_pangkat);
        return $this->db->get('tb_pangkat');
    }

    function lihatdata()
    {
        $this->db->select("tb_pangkat.*");
        return $this->db->get('tb_pangkat');
    }
    function cekdata($id_pangkat)
    {
        $this->db->where("id_pangkat",$id_pangkat);
        return $this->db->get('tb_pangkat')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_pangkat',$array);
    }

    function editdata($id_pangkat,$array)
    {
        $this->db->where("id_pangkat",$id_pangkat);
        return $this->db->update('tb_pangkat',$array);
    }
    function hapus($id_pangkat)
    {
        $this->db->where("id_pangkat",$id_pangkat);
        return $this->db->delete('tb_pangkat');
    }
  
}
