<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_berita extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_berita)
    {
        $this->db->select("tb_berita.*,tb_beritakategori.* ")
        ->join("tb_beritakategori","tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori","left");
        $this->db->where("tb_berita.id_berita",$id_berita);
        return $this->db->get('tb_berita');
    }

    function lihatdata()
    {
       
        $this->db->select("tb_berita.*,tb_beritakategori.* ")
        ->join("tb_beritakategori","tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori","left");
        $this->db->order_by('tb_berita.tanggal', 'DESC');
        return $this->db->get('tb_berita');
    }

    function jumlah_data(){
		return $this->db->get('tb_berita')->num_rows();
	}
    function lihatdata2($limit, $start){
        $this->db->select("tb_berita.*,tb_beritakategori.* ")
        ->join("tb_beritakategori","tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori","left");
        $this->db->order_by('tb_berita.tanggal', 'DESC');
        return $this->db->get('tb_berita', $limit, $start);
    
    }

    function lihatdatalimit()
    {
        $this->db->select("tb_berita.*,tb_beritakategori.* ")
        ->join("tb_beritakategori","tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori","left");
        $this->db->order_by('tb_berita.tanggal', 'DESC');
        return $this->db->get('tb_berita',4,0);
   
    }

    function lihatdatarecent()
    {
        $this->db->select("tb_berita.*,tb_beritakategori.* ")
        ->join("tb_beritakategori","tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori","left");
        $this->db->order_by('tb_berita.tanggal', 'DESC');
        return $this->db->get('tb_berita',3,0);
        
    }

    function lihatdatapost()
    {
        $this->db->select("tb_berita.*,tb_beritakategori.* ")
        ->join("tb_beritakategori","tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori","left");
        $this->db->order_by('tb_berita.tanggal', 'DESC');
        return $this->db->get('tb_berita',5,0);
    }

    function lihatdatapopuler()
    {
        $this->db->select("tb_berita.*,tb_beritakategori.* ")
        ->join("tb_beritakategori","tb_beritakategori.id_beritakategori=tb_berita.id_beritakategori","left");
        $this->db->order_by('tb_berita.pengunjung', 'DESC');
        return $this->db->get('tb_berita',3,0);
        
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
