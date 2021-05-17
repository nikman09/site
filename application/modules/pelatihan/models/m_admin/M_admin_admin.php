<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($username)
    {
        $this->db->select("pl_admin.*");
        $this->db->where("pl_admin.username",$username);
        return $this->db->get('pl_admin');
    }

    function lihatdata()
    {
        $this->db->select("pl_admin.*");
        $this->db->where("rule","user");
        
        return $this->db->get('pl_admin');
    }
    function cekdata($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('pl_admin')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pl_admin',$array);
    }

    function editdata($username,$array)
    {
        $this->db->where("username",$username);
        return $this->db->update('pl_admin',$array);
    }
    function hapus($username)
    {
        $this->db->where("username",$username);
        return $this->db->delete('pl_admin');
    }

    function ceklogin($email,$password)
    {
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        return $this->db->get('pl_admin');
    }
  
}
