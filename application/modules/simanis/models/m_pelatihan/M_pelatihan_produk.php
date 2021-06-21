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


   

    function lihatdataakunsatu($id_akun,$id_perusahaan)

    {
        $this->db->select("master_perusahaan.*,master_perusahaan.id as  id_perusahaan ,master_kota.*,master_kbli.*,master_kecamatan.*,master_kelurahan.*,master_izin.*,master_komoditi.*")
        ->join("master_kota","master_kota.id=master_perusahaan.kota_id","inner")
        ->join("master_kbli","master_kbli.id=master_perusahaan.kbli_id","inner")
        ->join("master_kelurahan","master_kelurahan.id=master_perusahaan.kelurahan_id","inner")
        ->join("master_izin","master_izin.id=master_perusahaan.izin_id","inner")
        ->join("master_komoditi","master_komoditi.id=master_perusahaan.komoditi_id","inner")
        ->join("master_kecamatan","master_kecamatan.id=master_perusahaan.kecamatan_id","inner");
        $this->db->where("master_perusahaan.simanis_id",$id_akun);

        $this->db->where("master_perusahaan.id",$id_perusahaan);
        return $this->db->get('master_perusahaan');
    }

    function lihatproduk($id_perusahaan)
    {
        $this->db->select("master_perusahaan_produk.*,master_produk.*")
        ->join("master_produk","master_produk.id=master_perusahaan_produk.produk_id","inner");
        $this->db->where("master_perusahaan_produk.perusahaan_id",$id_perusahaan);
        return $this->db->get('master_perusahaan_produk');
    }


    function lihatdata()

    {

        $this->db->select("master_perusahaan.*");

        return $this->db->get('master_perusahaan');

    }

   

    public function get_kode() {
		$query = $this->db->query("SELECT MAX(RIGHT(kode,7)) AS kode FROM master_perusahaan");
		$kode = "";
	  
		if($query->num_rows() > 0){ 
			foreach($query->result() as $k){
				$tmp = ((int)$k->kode)+1;
				$kode = sprintf("%07s", $tmp);
			}
		}else{
		  $kode = "0000001";
		}
		$karakter = "P"; 
		return $karakter.$kode;
    }


    function cekdata($id_pesan)

    {

        $this->db->where("id_pesan",$id_pesan);

        return $this->db->get('pl_pesan')->num_rows();

    }



   


    function editdata($id_perusahaan,$array)

    {

        $this->db->where("id",$id_perusahaan);

        return $this->db->update('master_perusahaan',$array);

    }

    function hapus($id)

    {

        $this->db->where("id",$id);

        return $this->db->delete('master_perusahaan');

    }

    function hapusproduk($id)

    {
        $this->db->where("perusahaan_id",$id);
        return $this->db->delete('master_perusahaan_produk');

    }

  

}

