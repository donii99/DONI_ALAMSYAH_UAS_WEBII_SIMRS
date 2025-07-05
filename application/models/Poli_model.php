<?php
   class Poli_model extends CI_Model {
       public function get_all() {
           return $this->db->get('poli')->result();
       }

       public function get_by_id($id) {
           return $this->db->get_where('poli', ['id' => $id])->row();
       }

       public function tambah($data) {
           return $this->db->insert('poli', $data);
       }

       public function update($id, $data) {
           $this->db->where('id', $id);
           return $this->db->update('poli', $data);
       }

       public function delete($id) {
           return $this->db->delete('poli', ['id' => $id]);
       }
   }