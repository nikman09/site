<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_kegiatankategori extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_kegiatankategori)
    {
        $this->db->select("tb_kegiatankategori.*");
        $this->db->where("tb_kegiatankategori.id_kegiatankategori",$id_kegiatankategori);
        return $this->db->get('tb_kegiatankategori');
    }

    function lihatdatajumlah()
    {
        return $this->db->query("select  tb_kegiatankategori .*, COUNT(tb_kegiatankategori.id_kegiatankategori) as jumlah from tb_berita left join tb_beritakategori on tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori GROUP BY tb_beritakategori.id_beritakategori
        ");
    }

    function lihatdata()
    {
        $this->db->select("tb_kegiatankategori.*");
        return $this->db->get('tb_kegiatankategori');
    }
    function cekdata($id_kegiatankategori)
    {
        $this->db->where("id_kegiatankategori",$id_kegiatankategori);
        return $this->db->get('tb_kegiatankategori')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_kegiatankategori',$array);
    }

    function editdata($id_kegiatankategori,$array)
    {
        $this->db->where("id_kegiatankategori",$id_kegiatankategori);
        return $this->db->update('tb_kegiatankategori',$array);
    }
    function hapus($id_kegiatankategori)
    {
        $this->db->where("id_kegiatankategori",$id_kegiatankategori);
        return $this->db->delete('tb_kegiatankategori');
    }
  
}
