<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_pelatihan_pelatihandaftar extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function lihatdatasatu($id_pelatihandaftar)
    {
        $this->db->select("pl_pelatihandaftar.*,pl_akun.*,pl_pelatihan  .*") 
        ->join("pl_pelatihan","pl_pelatihan.id_pelatihan=pl_pelatihandaftar.id_pelatihan")
        ->join("pl_akun","pl_akun.id_akun=pl_pelatihandaftar.id_akun")
        ->order_by("pl_pelatihandaftar.id_pelatihandaftar","desc");
        $this->db->where("pl_pelatihandaftar.id_pelatihandaftar",$id_pelatihandaftar);
        return $this->db->get('pl_pelatihandaftar');
    }

    function lihatdatasatupelatihan($id_pelatihan)
    {
        $this->db->select("pl_pelatihandaftar.*");
        $this->db->where("pl_pelatihandaftar.id_pelatihan",$id_pelatihan);
        return $this->db->get('pl_pelatihandaftar');
    }

    function lihatdatasatuakun($id_akun)
    {
        $this->db->select("pl_pelatihandaftar.*,pl_akun.*,pl_pelatihan  .*") 
        ->join("pl_pelatihan","pl_pelatihan.id_pelatihan=pl_pelatihandaftar.id_pelatihan")
        ->join("pl_akun","pl_akun.id_akun=pl_pelatihandaftar.id_akun");
        $this->db->order_by("pl_pelatihandaftar.id_pelatihandaftar","desc");
        $this->db->where("pl_pelatihandaftar.id_akun",$id_akun);
        return $this->db->get('pl_pelatihandaftar',1,0);
    }
    


    function lihatdata()
    {
        $this->db->select("pl_pelatihandaftar.*");
        $this->db->order_by("pl_pelatihandaftar.mulaipendaftaran","desc");
        return $this->db->get('pl_pelatihandaftar');
    }

    function lihatdatapelatihan($id_akun)
    {
        $this->db->select("pl_pelatihandaftar.*,pl_pelatihan  .*")
        ->join("pl_pelatihan","pl_pelatihan.id_pelatihan=pl_pelatihandaftar.id_pelatihan");
        $this->db->order_by("pl_pelatihandaftar.id_pelatihandaftar","desc");
        $this->db->where("pl_pelatihandaftar.id_akun",$id_akun);  
        return $this->db->get('pl_pelatihandaftar');
    }

    function cekdata($id_pelatihandaftar)
    {
        $this->db->where("id_pelatihandaftar",$id_pelatihandaftar);
        return $this->db->get('pl_pelatihandaftar')->num_rows();
    }

    function tambahdata($array)
    {
        return $this->db->insert('pl_pelatihandaftar',$array);
    }

    function editdata($id_pelatihandaftar,$array)
    {
        $this->db->where("id_pelatihandaftar",$id_pelatihandaftar);
        return $this->db->update('pl_pelatihandaftar',$array);
    }
    function hapus($id_pelatihandaftar)
    {
        $this->db->where("id_pelatihandaftar",$id_pelatihandaftar);
        return $this->db->delete('pl_pelatihandaftar');
    }
  
}
