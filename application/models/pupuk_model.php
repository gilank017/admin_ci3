<?php

class Pupuk_model extends CI_Model
{
    public function getAllPupuk()
    {
        return $this->db->get('tb_pupuk')->result_array();
    }

    public function TambahDataPupuk()
    {
        $data = [
            "nama_pupuk" => $this->input->post('nama_pupuk', true),
            "harga_pupuk" => $this->input->post('harga_pupuk', true),
            "stok_pupuk" => $this->input->post('stok_pupuk', true),
            "status_pupuk" => $this->input->post('status_pupuk', true)
        ];
        $this->db->insert('tb_pupuk', $data);
    }

    public function HapusDataPupuk($id_pupuk)
    {
        $this->db->where('id_pupuk', $id_pupuk);
        $this->db->delete('tb_pupuk');
    }
    public function getPupukById($id_pupuk)
    {
        return $this->db->get_where('tb_pupuk', ['id_pupuk' => $id_pupuk])->row_array();
    }

    public function ubahDataPupuk()
    {
        $data = [
            "nama_pupuk" => $this->input->post('nama_pupuk', true),
            "harga_pupuk" => $this->input->post('harga_pupuk', true),
            "stok_pupuk" => $this->input->post('stok_pupuk', true),
            "status_pupuk" => $this->input->post('status_pupuk', true)
        ];
        $this->db->where('id_pupuk', $this->input->post('id_pupuk'));
        $this->db->update('tb_pupuk', $data);
    }
}
