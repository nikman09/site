<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dokumen extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_dokumen)
    {
        $this->db->select("tb_dokumen.*");
        $this->db->where("tb_dokumen.id_dokumen",$id_dokumen);
        return $this->db->get('tb_dokumen');
    }

    function lihatdata()
    {
        $this->db->select("tb_dokumen.*");
        return $this->db->get('tb_dokumen');
    }
    function cekdata($id_dokumen)
    {
        $this->db->where("id_dokumen",$id_dokumen);
        return $this->db->get('tb_dokumen')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_dokumen',$array);
    }

    function editdata($id_dokumen,$array)
    {
        $this->db->where("id_dokumen",$id_dokumen);
        return $this->db->update('tb_dokumen',$array);
    }
    function hapus($id_dokumen)
    {
        $this->db->where("id_dokumen",$id_dokumen);
        return $this->db->delete('tb_dokumen');
    }
  
}
