<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dokumendetail extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_dokumendetail)
    {
        $this->db->select("tb_dokumendetail.*");
        $this->db->where("tb_dokumendetail.id_dokumendetail",$id_dokumendetail);
        return $this->db->get('tb_dokumendetail');
    }

    function lihatdatadokumen($id_dokumen)
    {
        $this->db->select("tb_dokumendetail.*");
        $this->db->where("tb_dokumendetail.id_dokumen",$id_dokumen);
        return $this->db->get('tb_dokumendetail');
    }

    function lihatdata()
    {
        $this->db->select("tb_dokumendetail.*");
        return $this->db->get('tb_dokumendetail');
    }
    function cekdata($id_dokumendetail)
    {
        $this->db->where("id_dokumendetail",$id_dokumendetail);
        return $this->db->get('tb_dokumendetail')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_dokumendetail',$array);
    }

    function editdata($id_dokumendetail,$array)
    {
        $this->db->where("id_dokumendetail",$id_dokumendetail);
        return $this->db->update('tb_dokumendetail',$array);
    }
    function hapus($id_dokumendetail)
    {
        $this->db->where("id_dokumendetail",$id_dokumendetail);
        return $this->db->delete('tb_dokumendetail');
    }
  
}
