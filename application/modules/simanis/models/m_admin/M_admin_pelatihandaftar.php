<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_admin_pelatihandaftar extends CI_Model
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
        $this->db->select("pl_pelatihandaftar.*,pl_akun.*,pl_akun.nama as namalengkap, pl_pelatihan  .*") 
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

    function lihatdatapelatihandaftar($username)
    {
        $this->db->select("pl_pelatihandaftar.*,pl_pelatihan  .*,pl_akun.*")
        ->join("pl_pelatihan","pl_pelatihan.id_pelatihan=pl_pelatihandaftar.id_pelatihan")
        ->join("pl_akun","pl_akun.id_akun=pl_pelatihandaftar.id_akun");
        $this->db->order_by("pl_pelatihandaftar.id_pelatihandaftar","desc");
        $this->db->where("pl_pelatihan.username",$username);  
        return $this->db->get('pl_pelatihandaftar');
    }

    function lihatdatapelatihandaftaraktif($id_pelatihan)
    {
        $this->db->select("pl_pelatihandaftar.*,pl_pelatihan  .*,pl_akun.*")
        ->join("pl_pelatihan","pl_pelatihan.id_pelatihan=pl_pelatihandaftar.id_pelatihan")
        ->join("pl_akun","pl_akun.id_akun=pl_pelatihandaftar.id_akun");
        $this->db->order_by("pl_pelatihandaftar.id_pelatihandaftar","desc");
        $this->db->where("pl_pelatihandaftar.id_pelatihan",$id_pelatihan);  
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

    function totalpendaftar($id_pelatihan)
    {
        $this->db->select("count(id_pelatihandaftar) as totalpendaftar");
        $this->db->where("pl_pelatihandaftar.id_pelatihan",$id_pelatihan);  
        $data = $this->db->get('pl_pelatihandaftar')->row_array();
        return $data["totalpendaftar"];
    }

    function menungguhasil($id_pelatihan)
    {
        $this->db->select("count(id_pelatihandaftar) as totalpendaftar");
        $this->db->where("pl_pelatihandaftar.id_pelatihan",$id_pelatihan);  
        $this->db->where("pl_pelatihandaftar.status","Menunggu Hasil Seleksi");  
        $data = $this->db->get('pl_pelatihandaftar')->row_array();
        return $data["totalpendaftar"];
    }

    function lulusseleksi($id_pelatihan)
    {
        $this->db->select("count(id_pelatihandaftar) as totalpendaftar");
        $this->db->where("pl_pelatihandaftar.id_pelatihan",$id_pelatihan);  
        $this->db->where("pl_pelatihandaftar.status","Lulus Seleksi");  
        $data = $this->db->get('pl_pelatihandaftar')->row_array();
        return $data["totalpendaftar"];
    }

    function tidaklulus($id_pelatihan)
    {
        $this->db->select("count(id_pelatihandaftar) as totalpendaftar");
        $this->db->where("pl_pelatihandaftar.id_pelatihan",$id_pelatihan);  
        $this->db->where("pl_pelatihandaftar.status","Tidak Lulus Seleksi");  
        $data = $this->db->get('pl_pelatihandaftar')->row_array();
        return $data["totalpendaftar"];
    }

    function jumlahpendaftar()
    {
        return $this->db->query("select pl_pelatihan.nama as nama_pelatihan ,pl_pelatihan.kategori as kategori_pelatihan, pl_pelatihan.kuota as kuota_pelatihan, pl_pelatihan.mulaipelatihan as mulai_pelatihan, pl_pelatihan.pengumuman as pengumuman_pelatihan, count(id_pelatihandaftar) as totalpendaftar, pl_admin.nama as seksi from pl_pelatihandaftar right join pl_pelatihan on pl_pelatihandaftar.id_pelatihan = pl_pelatihan.id_pelatihan inner join pl_admin on pl_admin.username = pl_pelatihan.username GROUP by pl_pelatihan.id_pelatihan order by totalpendaftar desc");
    }
  
}
