<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    function ceklogin($nip,$password)
    {
        $this->db->where("nip",$nip);
        $this->db->where("password",$password);
        return $this->db->get('pg_pegawai');
    }
}
