<?php
class Users_model extends CI_Model {
    public function login($username, $password) {
        $users = $this->db->get_where('users', ['username' => $username])->row();
        if ($users && password_verify($password, $users->password)) {
            return $users;
        }
        return false;
    }

    public function get_all() {
        $this->db->select('users.*, dokter.nama as nama_dokter');
        $this->db->from('users');
        $this->db->join('dokter', 'dokter.id = users.id_dokter', 'left');
        return $this->db->get()->result();
    }

    public function ambil_by_id($id) {
        $this->db->select('users.*, dokter.nama as nama_dokter');
        $this->db->from('users');
        $this->db->join('dokter', 'dokter.id = users.id_dokter', 'left');
        $this->db->where('users.id', $id);
        return $this->db->get()->row();
    }

    public function tambah($data) {
        return $this->db->insert('users', $data);
    }

    public function update($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete($id) {
        return $this->db->delete('users', ['id' => $id]);
    }

    public function ambil_dokter() {
        return $this->db->get('dokter')->result();
    }
}