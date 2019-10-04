<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_berita extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_berita)
    {
        $this->db->select("tb_berita.*");
        $this->db->where("tb_berita.id_berita",$id_berita);
        return $this->db->get('tb_berita');
    }

    function lihatdata($username)
    {
        $this->db->select("tb_berita.*,tb_beritakategori.* ")
        ->join("tb_beritakategori","tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori","left")
        ->where("tb_berita.userinput",$username);

        return $this->db->get('tb_berita');
    }
    function cekdata($id_berita)
    {
        $this->db->where("id_berita",$id_berita);
        return $this->db->get('tb_berita')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_berita',$array);
    }

    function editdata($id_berita,$array)
    {
        $this->db->where("id_berita",$id_berita);
        return $this->db->update('tb_berita',$array);
    }
    function hapus($id_berita)
    {
        $this->db->where("id_berita",$id_berita);
        return $this->db->delete('tb_berita');
    }
  
}
