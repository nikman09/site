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
        return $this->db->get('pg_subjabatan');
    }

    function lihatdatasatu($id_subjabatan)
    {
        $this->db->where("id_subjabatan",$id_subjabatan);
        return $this->db->get('pg_subjabatan');
    }
    function tambahdata($array)
    {
        return $this->db->insert('pg_subjabatan',$array);
    }
   
    function hapus($id_subjabatan)
    {
        $this->db->where("id_subjabatan",$id_subjabatan);
        return $this->db->delete('pg_subjabatan');
    }

    function editdata($id_subjabatan,$array)
    {
        $this->db->where("id_subjabatan",$id_subjabatan);
        return $this->db->update('pg_subjabatan',$array);
    }
    
  
}
