<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelatihan_berkas extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_berkas)
    {
        $this->db->select("pl_berkas.*");
         $this->db->where("pl_berkas.id_berkas",$id_berkas);
        return $this->db->get('pl_berkas');
    }

    function lihatdata()
    {
       
        $this->db->select("pl_berkas.*");
 
        return $this->db->get('pl_berkas');
    }

    function lihatdataakun($id_akun)
    {
       
        $this->db->select("pl_berkas.*");
        $this->db->where("pl_berkas.id_akun",$id_akun);
        return $this->db->get('pl_berkas');
    }

    function jumlah_data(){
		return $this->db->get('pl_berkas')->num_rows();
	}

    

 

    function cekdata($id_berkas)
    {
        $this->db->where("id_berkas",$id_berkas);
        return $this->db->get('pl_berkas')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pl_berkas',$array);
    }

    function editdata($id_berkas,$array)
    {
        $this->db->where("id_berkas",$id_berkas);
        return $this->db->update('pl_berkas',$array);
    }
    function hapus($id_berkas)
    {
        $this->db->where("id_berkas",$id_berkas);
        return $this->db->delete('pl_berkas');
    }
  
}
