<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper('url');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
        if (!in_array($this->session->userdata('role'), ['admin'])) {
            show_403(); 
        }
    }

    public function index() {
        $data['users'] = $this->Users_model->get_all();
        $this->load->view('users/index', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|is_unique[users.username]',
            ['is_unique' => 'Username sudah digunakan']
        );
        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            ['min_length' => 'Password minimal 6 karakter']
        );

        $this->form_validation->set_rules('id_dokter', 'ID Dokter', 'integer');

        if ($this->form_validation->run()) {
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'role' => $this->input->post('role'),
                'id_dokter' => $this->input->post('id_dokter') ?: NULL
            ];
            if ($this->Users_model->tambah($data)) {
                $this->session->set_flashdata('success', 'User berhasil ditambahkan');
                redirect('users');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambah user');
            }
        }
        $data['dokter'] = $this->Users_model->ambil_dokter();
        $this->load->view('users/tambah', $data);
    }

    public function edit($id) {
        $data['users'] = $this->Users_model->ambil_by_id($id);
        if (!$data['users']) {
            $this->session->set_flashdata('error', 'User tidak ditemukan');
            redirect('users');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username[' . $id . ']');
        $this->form_validation->set_rules('password', 'Password', 'min_length[6]', [
            'min_length' => 'Password minimal 6 karakter'
        ]);
        $this->form_validation->set_rules('role', 'role', 'required|in_list[admin,dokter,receptionis]');
        $this->form_validation->set_rules('id_dokter', 'ID Dokter', 'integer');

        if ($this->form_validation->run()) {
            $data_update = [
                'username' => $this->input->post('username'),
                'role' => $this->input->post('role'),
                'id_dokter' => $this->input->post('id_dokter') ?: NULL
            ];
            if ($this->input->post('password')) {
                $data_update['password'] = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            }
            if ($this->Users_model->update($id, $data_update)) {
                $this->session->set_flashdata('success', 'User berhasil diubah');
                redirect('users');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengubah user');
            }
        }
        $data['dokter'] = $this->Users_model->ambil_dokter();
        $this->load->view('users/edit', $data);
    }

    public function delete($id) {
        if ($this->Users_model->delete($id)) {
            $this->session->set_flashdata('success', 'User berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus user');
        }
        redirect('users');
    }

    public function check_username($username, $id) {
        $existing = $this->db->get_where('users', ['username' => $username, 'id !=' => $id])->row();
        if ($existing) {
            $this->form_validation->set_message('check_username', 'Username sudah digunakan');
            return FALSE;
        }
        return TRUE;
    }
}