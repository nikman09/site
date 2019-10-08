<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_subjabatan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata($id_jabatan)
    {
        $this->db->where("id_jabatan",$id_jabatan);
        return $this->db->get('tb_subjabatan');
    }

    function lihatdatasatu($id_subjabatan)
    {
        $this->db->where("id_subjabatan",$id_subjabatan);
        return $this->db->get('tb_subjabatan');
    }
    function tambahdata($array)
    {
        return $this->db->insert('tb_subjabatan',$array);
    }
   
    function hapus($id_subjabatan)
    {
        $this->db->where("id_subjabatan",$id_subjabatan);
        return $this->db->delete('tb_subjabatan');
    }

    function editdata($id_subjabatan,$array)
    {
        $this->db->where("id_subjabatan",$id_subjabatan);
        return $this->db->update('tb_subjabatan',$array);
    }
    
  
}
