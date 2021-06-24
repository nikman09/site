<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelatihan_tahunan extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function lihatdataakun($id_perusahaan)

    {
        $this->db->select("master_perusahaan_tahun.*,master_satuan.* ")
        ->join("master_satuan","master_satuan.id=master_perusahaan_tahun.satuan_id","inner");
        $this->db->where("master_perusahaan_tahun.perusahaan_id",$id_perusahaan);
    

        return $this->db->get('master_perusahaan_tahun');
    }

    function tambahdata($array)
    {
        return $this->db->insert('master_perusahaan_tahun',$array);

    }

    
    function editdata($id_tahunan,$array)
    {
        $this->db->where("id",$id_tahunan);
        return $this->db->update('master_perusahaan_tahun',$array);
    }

    
    function lihatdatasatu($id)
    {
        $this->db->select("master_perusahaan_tahun.*");
        $this->db->where("master_perusahaan_tahun.id",$id);
        return $this->db->get('master_perusahaan_tahun');
    }

    function lihattahunan($id_perusahaan)
    {
        $this->db->select("master_perusahaan_tahun.*,master_satuan.*")
        ->join("master_satuan","master_satuan.id=master_perusahaan_tahun.satuan_id","inner");
        $this->db->where("master_perusahaan_tahun.perusahaan_id",$id_perusahaan);
        return $this->db->get('master_perusahaan_tahun');
    }

    function hapus($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete('master_perusahaan_tahun');
    }



}

