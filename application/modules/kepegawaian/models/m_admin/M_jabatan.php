<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_jabatan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_jabatan)
    {
        $this->db->select("pg_jabatan.*");
        $this->db->where("pg_jabatan.id_jabatan",$id_jabatan);
        return $this->db->get('pg_jabatan');
    }

    function lihatdata()
    {
        $this->db->select("pg_jabatan.*");
        return $this->db->get('pg_jabatan');
    }
    function cekdata($id_jabatan)
    {
        $this->db->where("id_jabatan",$id_jabatan);
        return $this->db->get('pg_jabatan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pg_jabatan',$array);
    }

    function editdata($id_jabatan,$array)
    {
        $this->db->where("id_jabatan",$id_jabatan);
        return $this->db->update('pg_jabatan',$array);
    }
    function hapus($id_jabatan)
    {
        $this->db->where("id_jabatan",$id_jabatan);
        return $this->db->delete('pg_jabatan');
    }
  
}
