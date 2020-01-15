<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelatihan_pengumuman extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_pengumuman)
    {
        $this->db->select("pl_pengumuman.*");
         $this->db->where("pl_pengumuman.id_pengumuman",$id_pengumuman);
        return $this->db->get('pl_pengumuman');
    }

    function lihatdata()
    {
       
        $this->db->select("pl_pengumuman.*");
        $this->db->order_by('pl_pengumuman.tanggal', 'DESC');
        return $this->db->get('pl_pengumuman');
    }

    function jumlah_data(){
		return $this->db->get('pl_pengumuman')->num_rows();
	}
    function lihatdata2($limit, $start){
        $this->db->select("pl_pengumuman.*");
        $this->db->order_by('pl_pengumuman.tanggal', 'DESC');
        return $this->db->get('pl_pengumuman', $limit, $start);
    
    }

    function lihatdatalimit()
    {
        $this->db->select("pl_pengumuman.*");
        $this->db->order_by('pl_pengumuman.tanggal', 'DESC');
        return $this->db->get('pl_pengumuman',4,0);
   
    }

    function lihatdatarecent()
    {
        $this->db->select("pl_pengumuman.*");
        $this->db->order_by('pl_pengumuman.tanggal', 'DESC');
        return $this->db->get('pl_pengumuman',3,0);
        
    }

    function lihatdatapost()
    {
        $this->db->select("pl_pengumuman.*");
         $this->db->order_by('pl_pengumuman.tanggal', 'DESC');
        return $this->db->get('pl_pengumuman',5,0);
    }

 

    function cekdata($id_pengumuman)
    {
        $this->db->where("id_pengumuman",$id_pengumuman);
        return $this->db->get('pl_pengumuman')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pl_pengumuman',$array);
    }

    function editdata($id_pengumuman,$array)
    {
        $this->db->where("id_pengumuman",$id_pengumuman);
        return $this->db->update('pl_pengumuman',$array);
    }
    function hapus($id_pengumuman)
    {
        $this->db->where("id_pengumuman",$id_pengumuman);
        return $this->db->delete('pl_pengumuman');
    }
  
}
