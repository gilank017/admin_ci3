<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model');
    }

    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['transaksi'] = $this->Transaksi_model->get_pesanan();
        $data['tani'] = $this->db->get('tb_user_tani')->result_array();
        $data['pupuk'] = $this->db->get('tb_pupuk')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/pesanan', $data);
        $this->load->view('templates/footer');
    }

    public function pesanan_add()
    {

        $this->form_validation->set_rules('kode_transaksi', 'kode_transaksi', 'trim');
        $this->form_validation->set_rules('id_tani', 'id_tani', 'trim|required');
        $this->form_validation->set_rules('tgl_pesanan', 'tgl_pesanan', 'trim|required');
        $this->form_validation->set_rules('total_bayar', 'total_bayar', 'trim|required');
        $this->form_validation->set_rules('status_bayar', 'status_bayar', 'trim|required');
        $this->form_validation->set_rules('status_transaksi', 'status_transaksi', 'trim|required');

        $data = [
            'kode_transaksi' => 'TRN-' . date('YmdHis'),
            'id_tani' => $this->input->post('id_tani'),
            'tgl_pesanan' => $this->input->post('tgl_pesanan'),
            'total_bayar' => $this->input->post('total_bayar'),
            'status_bayar' => $this->input->post('status_bayar'),
            'status_transaksi' => 0,
        ];
        $this->db->insert('tb_transaksi', $data);
        $data_detail = [
            'kode_transaksi' => 'TRN-' . date('YmdHis'),
            'id_pupuk' => $this->input->post('id_pupuk'),
            'harga_pupuk' => $this->input->post('harga_pupuk'),
            'jumlah_pupuk' => $this->input->post('jumlah_pupuk'),
            'total_pupuk' => $this->input->post('total_bayar'),
            'status' => 0
        ];
        $this->db->insert('tb_detail_transaksi', $data_detail);
        redirect('transaksi/pesanan');
    }

    public function detail_pesanan($kode_transaksi)
    {
        $data['title'] = 'Detail Pesanan';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->Transaksi_model->getIdKode($kode_transaksi);
        $data['detail_transaksi'] = $this->Transaksi_model->get_detail($kode_transaksi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/detail_pesanan', $data);
        $this->load->view('templates/footer');
    }

    public function confirm($kode_transaksi)
    {
        $data["status"] = 1;
        $this->Transaksi_model->confirm($data, $kode_transaksi);
        redirect('transaksi/pesanan');
    }

    public function cancel($kode_transaksi)
    {
        $this->Transaksi_model->cancel($kode_transaksi);
        redirect('transaksi/pesanan');
    }

    public function hapus($kode_transaksi)
    {
        $this->Transaksi_model->hapus($kode_transaksi);
        redirect('transaksi/pesanan');
    }

    public function cetak()
    {
        $this->load->view('transaksi/cetak');
    }

    public function endtransaksi()
    {
        $data['title'] = 'Transaksi Selesai';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['tb_detail_transaksi'] = $this->Transaksi_model->getAllTransaksi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/endtransaksi', $data);
        $this->load->view('templates/footer');
    }

    public function detail_endtransaksi($kode_transaksi)
    {
        $data['title'] = 'Detail Transaksi';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['transaksi'] = $this->Transaksi_model->getIdKode($kode_transaksi);
        $data['detail_transaksi'] = $this->Transaksi_model->get_detail($kode_transaksi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('transaksi/detail_endtransaksi', $data);
        $this->load->view('templates/footer');
    }
}
