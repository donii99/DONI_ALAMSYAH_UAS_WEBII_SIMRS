<?php
   class Kunjungan_model extends CI_Model {
       public function get_all() {
           $this->db->select('kunjungan.*, pasien.nama as nama_pasien, dokter.nama as nama_dokter, poli.nama as nama_poli');
           $this->db->from('kunjungan');
           $this->db->join('pasien', 'pasien.id = kunjungan.id_pasien');
           $this->db->join('dokter', 'dokter.id = kunjungan.id_dokter');
           $this->db->join('poli', 'poli.id = kunjungan.id_poli');
           return $this->db->get()->result();
       }

       public function get_by_id($id) {
           $this->db->select('kunjungan.*, pasien.nama as nama_pasien, dokter.nama as nama_dokter, poli.nama as nama_poli');
           $this->db->from('kunjungan');
           $this->db->join('pasien', 'pasien.id = kunjungan.id_pasien');
           $this->db->join('dokter', 'dokter.id = kunjungan.id_dokter');
           $this->db->join('poli', 'poli.id = kunjungan.id_poli');
           $this->db->where('kunjungan.id', $id);
           return $this->db->get()->row();
       }

       public function tambah($data) {
           return $this->db->insert('kunjungan', $data);
       }

       public function update($id, $data) {
           $this->db->where('id', $id);
           return $this->db->update('kunjungan', $data);
       }

       public function delete($id) {
           return $this->db->delete('kunjungan', ['id' => $id]);
       }

       public function get_pasien() {
           return $this->db->get('pasien')->result();
       }

       public function get_dokter() {
           return $this->db->get('dokter')->result();
       }

       public function get_poli() {
           return $this->db->get('poli')->result();
       }
   }