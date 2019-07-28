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
        $jumlah = $this->db->get('tb_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahpegawailk()
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("jk","Laki-laki");
        $jumlah = $this->db->get('tb_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }
    function jumlahpegawaipr()
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("jk","Perempuan");
        $jumlah = $this->db->get('tb_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahgolongan($pangkat)
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->join("tb_pangkat","tb_pangkat.id_pangkat = tb_pegawai.id_pangkat","left");
        $this->db->where("tb_pangkat.id_golongan ",$pangkat);
        $jumlah = $this->db->get('tb_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function jumlahjabatan($jabatan)
    {
        $this->db->select("COUNT(*) as jumlah");
        $this->db->where("id_jabatan",$jabatan);
        $jumlah = $this->db->get('tb_pegawai')->row_array();
        return $jumlah = $jumlah['jumlah'];
    }

    function pangkat()
    {
         return $this->db->query("select pangkat , count(tb_pegawai.id_pegawai) as jumlah, golongan from tb_pangkat left join tb_pegawai on tb_pangkat.id_pangkat = tb_pegawai.id_pangkat left join tb_golongan on tb_golongan.id_golongan = tb_pangkat.id_golongan group by  tb_pangkat.id_pangkat order by tb_pangkat.id_pangkat asc ");
    }

}
