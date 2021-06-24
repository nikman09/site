<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelatihan_produk extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function lihatdataakun($id_perusahaan)

    {
        $this->db->select("master_produk_perusahaan.*");
        $this->db->where("master_produk_perusahaan.perusahaan_id",$id_perusahaan);
        return $this->db->get('master_produk_perusahaan');
    }

    function tambahdata($array)
    {
        return $this->db->insert('master_produk_perusahaan',$array);

    }

    
    function editdata($id_produk,$array)
    {
        $this->db->where("id",$id_produk);
        return $this->db->update('master_produk_perusahaan',$array);
    }

    
    function lihatdatasatu($id)
    {
        $this->db->select("master_produk_perusahaan.*");
        $this->db->where("master_produk_perusahaan.id",$id);
        return $this->db->get('master_produk_perusahaan');
    }

    function lihatpemasaran($id_produk)
    {
        $this->db->select("master_produk_pemasaran.*,master_pemasaran.*")
        ->join("master_pemasaran","master_pemasaran.id=master_produk_pemasaran.pemasaran_id","inner");
        $this->db->where("master_produk_pemasaran.produk_id",$id_produk);
        return $this->db->get('master_produk_pemasaran');
    }

    function hapus($id)
    {
        $this->db->where("id",$id);
        return $this->db->delete('master_produk_perusahaan');
    }

    function hapuspemasaran($id)
    {
        $this->db->where("produk_id",$id);
        return $this->db->delete('master_produk_pemasaran');
    }


}

