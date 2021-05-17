<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($username)
    {
        $this->db->select("tb_administrator.*");
        $this->db->where("tb_administrator.username",$username);
        return $this->db->get('tb_administrator');
    }

    function lihatdata()
    {
        $this->db->select("tb_administrator.*,tb_bidang.*")
        ->join("tb_bidang","tb_bidang.id_bidang=tb_administrator.id_bidang","left");
        $this->db->where("rule","user");
        
        return $this->db->get('tb_administrator');
    }
    function cekdata($username)
    {
        $this->db->where("username",$username);
        return $this->db->get('tb_administrator')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_administrator',$array);
    }

    function editdata($username,$array)
    {
        $this->db->where("username",$username);
        return $this->db->update('tb_administrator',$array);
    }
    function hapus($username)
    {
        $this->db->where("username",$username);
        return $this->db->delete('tb_administrator');
    }
  
}
