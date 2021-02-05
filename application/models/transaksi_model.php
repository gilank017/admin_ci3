<?php

class Transaksi_model extends CI_Model
{
    function get_pesanan()
    {
        $this->db->where("status_transaksi", 0);
        $this->db->order_by('kode_transaksi', 'DESC');
        return $this->db->get('tb_transaksi')->result_array();
    }

    public function getAllTransaksi()
    {
        return $this->db->get('tb_detail_transaksi')->result_array();
    }

    function GetIdKode($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->select("*")->from('tb_transaksi');
        $this->db->join('tb_user_tani', 'tb_user_tani' . ".id_tani=" . 'tb_transaksi' . ".id_tani");
        return $this->db->get_where()->result_array();
    }

    function get_detail($kode_transaksi)
    {

        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->select("*," . 'tb_detail_transaksi' . ".harga_pupuk")->from('tb_detail_transaksi');
        $this->db->join('tb_pupuk', 'tb_pupuk' . ".id_pupuk=" . 'tb_detail_transaksi' . ".id_pupuk");
        return $this->db->get_where()->result_array();
    }

    function confirm($data, $kode_transaksi)
    {
        $transaksi = $this->db->select("kode_transaksi,total_pupuk,id_pupuk")->from('tb_detail_transaksi')->where("kode_transaksi", $kode_transaksi)->get()->row();
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $this->db->query("Update tb_transaksi set status_bayar=1, status_transaksi=1, tgl_bayar='" . $date . "' where kode_transaksi='" . $transaksi->kode_transaksi . "'", FALSE);
        $this->db->where("kode_transaksi", $kode_transaksi);
        $this->db->update('tb_detail_transaksi', $data);
        return $transaksi->kode_transaksi;
    }

    function cancel($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('tb_detail_transaksi');
    }

    function hapus($kode_transaksi)
    {
        $this->db->where('kode_transaksi', $kode_transaksi);
        $this->db->delete('tb_transaksi');
    }
}
