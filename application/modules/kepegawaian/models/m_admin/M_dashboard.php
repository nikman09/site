<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function jumlahpegawai()
    {
        $this->db->select("COUNT(*) as jumlah");
        $jumlah = $this->db->get('pg_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahpegawailk()
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("jk","Laki-laki");
        $jumlah = $this->db->get('pg_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahpegawaipr()
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("jk","Perempuan");
        $jumlah = $this->db->get('pg_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahgolongan($pangkat)
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->join("pg_pangkat","pg_pangkat.id_pangkat = pg_pegawai.id_pangkat","left");
        $this->db->where("pg_pangkat.id_golongan ",$pangkat);
        $jumlah = $this->db->get('pg_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahjabatan($jabatan)
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("id_jabatan",$jabatan);
        $jumlah = $this->db->get('pg_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function pangkat()
    {
         return $this->db->query("select pangkat , count(pg_pegawai.id_pegawai) as jumlah, golongan from pg_pangkat left join pg_pegawai on pg_pangkat.id_pangkat = pg_pegawai.id_pangkat left join pg_golongan on pg_golongan.id_golongan = pg_pangkat.id_golongan group by  pg_pangkat.id_pangkat order by pg_pangkat.id_pangkat asc ");
    }

}
