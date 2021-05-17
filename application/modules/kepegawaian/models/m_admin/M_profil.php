<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_profil extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    function lihatdata()
    {
        return $this->db->get('pg_administrator');
    }
    function lihatdatasatu($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('pg_administrator');
    }
    function cekdata($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('pg_administrator')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pg_administrator',$array);
    }

    function editdata($username,$array)
    {
        $this->db->where("username",$username);
        return $this->db->update('pg_administrator',$array);
    }
    function hapus($username)
    {
        $this->db->where("username",$username);
        return $this->db->delete('pg_administrator');
    }
  
}
