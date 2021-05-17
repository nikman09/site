<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_pelatihan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_pelatihan)
    {
        $this->db->select("pl_pelatihan.*");
        $this->db->where("pl_pelatihan.id_pelatihan",$id_pelatihan);
        return $this->db->get('pl_pelatihan');
    }

    function lihatdatauser($username)
    {
        $this->db->select("pl_pelatihan.*");
        $this->db->where("pl_pelatihan.username",$username);
        return $this->db->get('pl_pelatihan');
    }

    function lihatdata()
    {
        $this->db->select("pl_pelatihan.*");
        $this->db->order_by("pl_pelatihan.mulaipendaftaran","desc");
        return $this->db->get('pl_pelatihan');
    }
    function cekdata($id_pelatihan)
    {
        $this->db->where("id_pelatihan",$id_pelatihan);
        return $this->db->get('pl_pelatihan')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pl_pelatihan',$array);
    }

    function editdata($id_pelatihan,$array)
    {
        $this->db->where("id_pelatihan",$id_pelatihan);
        return $this->db->update('pl_pelatihan',$array);
    }
    function hapus($id_pelatihan)
    {
        $this->db->where("id_pelatihan",$id_pelatihan);
        return $this->db->delete('pl_pelatihan');
    }
  
}
