<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pendidikan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_pendidikan)
    {
        $this->db->select("pg_pendidikan.*");
        $this->db->where("pg_pendidikan.id_pendidikan",$id_pendidikan);
        return $this->db->get('pg_pendidikan');
    }

    function lihatdata()
    {
        $this->db->select("pg_pendidikan.*");
        return $this->db->get('pg_pendidikan');
    }
    function cekdata($id_pendidikan)
    {
        $this->db->where("id_pendidikan",$id_pendidikan);
        return $this->db->get('pg_pendidikan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pg_pendidikan',$array);
    }

    function editdata($id_pendidikan,$array)
    {
        $this->db->where("id_pendidikan",$id_pendidikan);
        return $this->db->update('pg_pendidikan',$array);
    }
    function hapus($id_pendidikan)
    {
        $this->db->where("id_pendidikan",$id_pendidikan);
        return $this->db->delete('pg_pendidikan');
    }
  
}
