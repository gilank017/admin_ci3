<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_dashboard extends CI_Model
{

    public function count_transaksi()
    {
        $this->db->select_sum('total_bayar');
        $query = $this->db->get('tb_transaksi');
        if ($query->num_rows() > 0) {
            return $query->row()->total_bayar;
        } else {
            return 0;
        }
    }

    public function count_petani()
    {
        $query = $this->db->get('tb_user_tani');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function count_endtransaksi()
    {
        $query = $this->db->get('tb_detail_transaksi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function count_pesanan()
    {
        $this->db->select("status_transaksi", 0);
        $query = $this->db->get('tb_transaksi');
        if ($query->num_rows() > 0) {
            return $query->row()->status_transaksi;
        } else {
            return 0;
        }
    }

    function get_status_pupuk()
    {
        $this->db->group_by('id_pupuk');
        $this->db->select('id_pupuk');
        $this->db->select("count(*) as jumlah_pupuk");
        return $this->db->from('tb_detail_transaksi')->get()->result();
    }

    function get_penjualan()
    {
        $this->db->group_by('tgl_bayar');
        $this->db->select('tgl_bayar');
        $this->db->select("count(*) as status_transaksi");
        return $this->db->from('tb_transaksi')->get()->result();
    }
}
