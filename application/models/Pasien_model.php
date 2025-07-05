<?php
class Pasien_model extends CI_Model {
    public function get_all() {
        return $this->db->get('pasien')->result();
    }

    public function get_by_id($id) {
        return $this->db->get_where('pasien', ['id' => $id])->row();
    }

    public function tambah($data) {
        return $this->db->insert('pasien', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('pasien', $data);
    }

    public function delete($id) {
        return $this->db->delete('pasien', ['id' => $id]);
    }
}