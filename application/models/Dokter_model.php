<?php
class Dokter_model extends CI_Model {
    public function get_all() {
        return $this->db->get('dokter')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('dokter', ['id' => $id])->row();
    }

    public function tambah($data) {
        return $this->db->insert('dokter', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('dokter', $data);
    }

    public function delete($id) {
        return $this->db->delete('dokter', ['id' => $id]);
    }
}