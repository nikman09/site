<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_beritakategori extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_beritakategori)
    {
        $this->db->select("tb_beritakategori.*");
        $this->db->where("tb_beritakategori.id_beritakategori",$id_beritakategori);
        return $this->db->get('tb_beritakategori');
    }
   
    function lihatdatajumlah()
    {
        return $this->db->query("select  tb_beritakategori .*, COUNT(tb_beritakategori.id_beritakategori) as jumlah from tb_berita left join tb_beritakategori on tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori GROUP BY tb_beritakategori.id_beritakategori
        ");
    }
    function lihatdata()
    {
        $this->db->select("tb_beritakategori.*");
        return $this->db->get('tb_beritakategori');
    }
    function cekdata($id_beritakategori)
    {
        $this->db->where("id_beritakategori",$id_beritakategori);
        return $this->db->get('tb_beritakategori')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_beritakategori',$array);
    }

    function editdata($id_beritakategori,$array)
    {
        $this->db->where("id_beritakategori",$id_beritakategori);
        return $this->db->update('tb_beritakategori',$array);
    }
    function hapus($id_beritakategori)
    {
        $this->db->where("id_beritakategori",$id_beritakategori);
        return $this->db->delete('tb_beritakategori');
    }
  
}
