<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pupuk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pupuk_model');
    }
    public function index()
    {
        $data['title'] = 'Data Pupuk';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tb_pupuk'] = $this->Pupuk_model->getAllPupuk();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pupuk/index', $data);
        $this->load->view('templates/footer');
    }
    public function Tambah()
    {
        $data['title'] = 'Form Tambah Data Pupuk';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_pupuk', 'NamaPupuk', 'required');
        $this->form_validation->set_rules('harga_pupuk', 'HargaPupuk', 'required');
        $this->form_validation->set_rules('stok_pupuk', 'StokPupuk', 'required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pupuk/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pupuk_model->TambahDataPupuk();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pupuk Baru Ditambahkan! </div>');
            redirect('pupuk');
        }
    }
    public function hapus($id_pupuk)
    {
        $this->Pupuk_model->HapusDataPupuk($id_pupuk);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pupuk Telah Dihapus!</div>');
        redirect('pupuk');
    }

    public function edit($id_pupuk)
    {
        $data['title'] = 'Form Edit Data Pupuk';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tb_pupuk'] = $this->Pupuk_model->getPupukById($id_pupuk);

        $this->form_validation->set_rules('nama_pupuk', 'NamaPupuk', 'required');
        $this->form_validation->set_rules('harga_pupuk', 'HargaPupuk', 'required');
        $this->form_validation->set_rules('stok_pupuk', 'StokPupuk', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pupuk/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Pupuk_model->ubahDataPupuk();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pupuk Telah Diupdate! </div>');
            redirect('pupuk');
        }
    }
}
