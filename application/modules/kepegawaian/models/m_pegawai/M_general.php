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
        $hasil = $this->db->get('tb_subjabatan');
        return $hasil->result();
      }

      function datarakajax($id_lemari)
      {
        $this->db->where('id_lemari', $id_lemari);
        $this->db->order_by("nama_rak","ASC");
        $hasil = $this->db->get('tb_rak');
        return $hasil->result();
      }

      function datatempatarsipajax($id_rak)
      {
        $this->db->where('id_rak', $id_rak);
        $this->db->order_by("tempatarsip","ASC");
        $hasil = $this->db->get('tb_tempatarsip');
        return $hasil->result();
      }

      function datakategoriajax($id_seksi)
      {
        $this->db->where('id_seksi', $id_seksi);
        $this->db->order_by("nama_kategori","ASC");
        $hasil = $this->db->get('tb_kategori');
        return $hasil->result();
      }

      function ambilsubjabatan($id_jabatan){
        $this->db->where('id_jabatan', $id_jabatan);
        $this->db->order_by("nama_subjabatan","ASC");
        return $this->db->get('tb_subjabatan');
      }

      function ambilrak($id_lemari){
        $this->db->where('id_lemari', $id_lemari);
        $this->db->order_by("nama_rak","ASC");
        return $this->db->get('tb_rak');
      }
      function ambiltempatarsip($id_rak){
        $this->db->where('id_rak', $id_rak);
        $this->db->order_by("tempatarsip","ASC");
        return $this->db->get('tb_tempatarsip');
      }

      function ambilkategori($id_seksi){
        $this->db->where('id_seksi', $id_seksi);
        $this->db->order_by("nama_kategori","ASC");
        return $this->db->get('tb_kategori');
      }
  
}
