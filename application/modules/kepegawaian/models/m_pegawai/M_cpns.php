<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_cpns extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
   
    function lihatdatasatu($id_pegawai)
    {
        $this->db->select("tb_cpns.*");
        $this->db->join("tb_pegawai","tb_pegawai.id_pegawai=tb_cpns.id_pegawai","left");
        $this->db->where("tb_cpns.id_pegawai",$id_pegawai);
        return $this->db->get('tb_cpns');
    }
    function cekdata($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->get('tb_pegawai')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('tb_cpns',$array);
    }

    function editdata($id_pegawai,$array)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->update('tb_cpns',$array);
    }
    function hapus($id_pegawai)
    {
        $this->db->where("id_pegawai",$id_pegawai);
        return $this->db->delete('tb_pegawai');
    }
  
}
