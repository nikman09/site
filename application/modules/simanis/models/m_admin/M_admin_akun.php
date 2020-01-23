<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_akun extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_akun)
    {
        $this->db->select("pl_akun.*");
        $this->db->where("pl_akun.id_akun",$id_akun);
        return $this->db->get('pl_akun');
    }

    function lihatdata()
    {
        $this->db->select("pl_akun.*");
        
        return $this->db->get('pl_akun');
    }
    function cekdata($id_akun)
    {
        $this->db->where("id_akun",$id_akun);
        return $this->db->get('pl_akun')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pl_akun',$array);
    }

    function editdata($id_akun,$array)
    {
        $this->db->where("id_akun",$id_akun);
        return $this->db->update('pl_akun',$array);
    }
    function hapus($id_akun)
    {
        $this->db->where("id_akun",$id_akun);
        return $this->db->delete('pl_akun');
    }

    function ceklogin($email,$password)
    {
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        return $this->db->get('pl_akun');
    }
  
    function totalakun()
    {
        $this->db->select("pl_akun.*");
        return $this->db->get('pl_akun')->num_rows();
    }

    function totalakunperempuan()
    {
        $this->db->select("pl_akun.*");
        $this->db->where("jk","Perempuan");
        return $this->db->get('pl_akun')->num_rows();
    }

    function totalakunlakilaki()
    {
        $this->db->select("pl_akun.*");
        $this->db->where("jk","Laki-laki");
        return $this->db->get('pl_akun')->num_rows();
    }
}
