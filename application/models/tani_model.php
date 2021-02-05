<?php

class Tani_model extends CI_Model
{
    public function getAllTani()
    {
        return $this->db->get('tb_user_tani')->result_array();
    }

    public function TambahDataTani()
    {
        $data = [
            "username" => $this->input->post('username', true),
            "nama_petani" => $this->input->post('nama_petani', true),
            "kelompok_tani" => $this->input->post('kelompok_tani', true),
            "email" => $this->input->post('email', true),
            "no_hp" => $this->input->post('no_hp', true),
            "alamat" => $this->input->post('alamat', true),
            "password_tani" => md5($this->input->post('password_tani', true)),
            "is_active" => $this->input->post('is_active', true),
        ];
        $this->db->insert('tb_user_tani', $data);
    }
    public function HapusDataTani($id_tani)
    {
        $this->db->where('id_tani', $id_tani);
        $this->db->delete('tb_user_tani');
    }
    public function getTaniById($id_tani)
    {
        return $this->db->get_where('tb_user_tani', ['id_tani' => $id_tani])->row_array();
    }
    public function ubahDataTani()
    {
        $data = [
            "username" => $this->input->post('username', true),
            "nama_petani" => $this->input->post('nama_petani', true),
            "kelompok_tani" => $this->input->post('kelompok_tani', true),
            "no_hp" => $this->input->post('no_hp', true),
            "alamat" => $this->input->post('alamat', true),
            "password_tani" => md5($this->input->post('password_tani', true)),
            "is_active" => $this->input->post('is_active', true),
        ];
        $this->db->where('id_tani', $this->input->post('id_tani'));
        $this->db->update('tb_user_tani', $data);
    }
}
