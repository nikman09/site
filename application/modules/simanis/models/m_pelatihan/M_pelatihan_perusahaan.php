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

    function lihatmasterkota()

    {
        $this->db->select("master_kota.*");
        $this->db->where("provinsi_id","63");
        return $this->db->get('master_kota');
       
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

    function cekdata($id_pesan)

    {

        $this->db->where("id_pesan",$id_pesan);

        return $this->db->get('pl_pesan')->num_rows();

    }



    function tambahdata($array)

    {

        return $this->db->insert('pl_pesan',$array);

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

