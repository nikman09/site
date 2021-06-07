<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_pelatihan_perusahaan extends CI_Model

{

    function __construct()

    {

        parent::__construct();

    }

    function lihatmasterbadan()
    {

        $this->db->select("master_badan.*");
        $this->db->where("deleted_id",NULL);
        return $this->db->get('master_badan');
    }

    function lihatmasterizin()
    {

        $this->db->select("master_izin.*");
        $this->db->where("deleted_id",NULL);
        return $this->db->get('master_izin');
    }

    function lihatmasterkbli()
    {

        $this->db->select("master_kbli.*");
        $this->db->where("deleted_id",NULL);
        
        return $this->db->get('master_kbli');
    }

    function lihatmasterkomoditi()
    {
        $this->db->select("master_komoditi.*");
        $this->db->where("deleted_id",NULL);
        return $this->db->get('master_komoditi');
    }

    function lihatmasterproduk()
    {
        $this->db->select("master_produk.*");
        $this->db->where("deleted_id",NULL);
        return $this->db->get('master_produk');
    }

    function lihatmasterkota()

    {
        $this->db->select("master_kota.*");
        $this->db->where("provinsi_id","63");
        return $this->db->get('master_kota');
       
    }

    function getmasterkecamatan($kota_id)

    {
        $this->db->select("master_kecamatan.*");
        $this->db->where("kota_id",$kota_id);
        return $this->db->get('master_kecamatan');
       
    }

    function getmasterkelurahan($kecamatan_id)

    {
        $this->db->select("master_kelurahan.*");
        $this->db->where("kecamatan_id",$kecamatan_id);
        return $this->db->get('master_kelurahan');
       
    }
    

    function lihatdatasatuperusahaan($id)

    {

        $this->db->select("master_perusahaan.*");

        $this->db->where("master_perusahaan.id",$id);

        return $this->db->get('master_perusahaan');

    }



    function lihatdata()

    {

        $this->db->select("master_perusahaan.*");

        return $this->db->get('master_perusahaan');

    }

    function tambahdata($array)

    {

        return $this->db->insert('master_perusahaan',$array);

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



   


    function editdata($id_pesan,$array)

    {

        $this->db->where("id_pesan",$id_pesan);

        return $this->db->update('pl_pesan',$array);

    }

    function hapus($id_pesan)

    {

        $this->db->where("id_pesan",$id_pesan);

        return $this->db->delete('pl_pesan');

    }

  

}

