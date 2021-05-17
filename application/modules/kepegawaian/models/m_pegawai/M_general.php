<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_general extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
   
    function datasubjabatanajax($id_jabatan)
      {
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->order_by("nama_subjabatan","ASC");
        $hasil = $this->db->get('pg_subjabatan');
        return $hasil->result();
      }

      function ambilsubjabatan($id_jabatan){
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->order_by("nama_subjabatan","ASC");
        return $this->db->get('pg_subjabatan');
      }

    
}
