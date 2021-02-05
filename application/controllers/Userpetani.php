<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Userpetani extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tani_model');
    }
    public function index()
    {
        $data['title'] = 'User Data Petani';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tb_user_tani'] = $this->Tani_model->getAllTani();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('userpetani/index', $data);
        $this->load->view('templates/footer');
    }

    public function Tambahtani()
    {
        $data['title'] = 'Form Tambah Data Petani';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama_petani', 'Nama Petani', 'required');
        $this->form_validation->set_rules('kelompok_tani', 'Kelompok Tani', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user_tani.email]', ['is_unique' => 'Email sudah digunakan']);
        $this->form_validation->set_rules('no_hp', 'No. Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password_tani', 'Password', 'required|trim|min_length[4]');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('userpetani/tambahtani', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Tani_model->TambahDataTani();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Petani Baru Ditambahkan! </div>');
            redirect('userpetani');
        }
    }
    public function hapus($id_tani)
    {
        $this->Tani_model->HapusDataTani($id_tani);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Petani Telah Dihapus!</div>');
        redirect('userpetani');
    }
    public function edit($id_tani)
    {
        $data['title'] = 'Form Edit Data Petani';
        $data['user'] =  $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['tb_user_tani'] = $this->Tani_model->getTaniById($id_tani);

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama_petani', 'Nama Petani', 'required');
        $this->form_validation->set_rules('kelompok_tani', 'Kelompok Tani', 'required');
        $this->form_validation->set_rules('no_hp', 'No. Hp', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('password_tani', 'Password', 'required|trim|min_length[4]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('userpetani/editpetani', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Tani_model->ubahDataTani();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Petani Telah Diupdate! </div>');
            redirect('userpetani');
        }
    }
}
