<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class M_saran extends CI_Model

{

    function __construct()

    {

        parent::__construct();

    }

    

    function lihatdatasatu($id_saran)

    {

        $this->db->select("tb_saran.*");

        $this->db->where("tb_saran.id_saran",$id_saran);

        return $this->db->get('tb_saran');

    }



    function lihatdata()

    {

        $this->db->select("tb_saran.*");

        return $this->db->get('tb_saran');

    }

    function cekdata($id_saran)

    {

        $this->db->where("id_saran",$id_saran);

        return $this->db->get('tb_saran')->num_rows();

    }



    function tambahdata($array)

    {

        return $this->db->insert('tb_saran',$array);

    }



    function editdata($id_saran,$array)

    {

        $this->db->where("id_saran",$id_saran);

        return $this->db->update('tb_saran',$array);

    }

    function hapus($id_saran)

    {

        $this->db->where("id_saran",$id_saran);

        return $this->db->delete('tb_saran');

    }

  

}

