<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kunjungan extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Kunjungan_model');
        $this->load->library('session');
        $this->load->helper('url');
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    public function index() {
        $role = $this->session->userdata('role');
        $id_dokter = $this->session->userdata('id_dokter');
        if ($role == 'dokter') {
            $this->db->where('id_dokter', $id_dokter);
        }
        $data['kunjungan'] = $this->Kunjungan_model->get_all();
        $this->load->view('kunjungan/index', $data);
    }

    public function tambah() {
        $peran = $this->session->userdata('peran');
        $data['pasien'] = $this->Kunjungan_model->get_pasien();
        $data['dokter'] = $this->Kunjungan_model->get_dokter();
        $data['poli'] = $this->Kunjungan_model->get_poli();
        if ($this->input->post()) {
            var_dump($this->input->post()); // Debug input
            $data_kunjungan = [
                'id_pasien' => $this->input->post('id_pasien'),
                'id_dokter' => $peran == 'dokter' ? $this->session->userdata('id_dokter') : $this->input->post('id_dokter'),
                'id_poli' => $this->input->post('id_poli'),
                'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
                'keluhan' => $this->input->post('keluhan')
            ];
            if ($this->Kunjungan_model->tambah($data_kunjungan)) {
                $this->session->set_flashdata('success', 'Kunjungan berhasil ditambahkan');
                redirect('kunjungan');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambah kunjungan');
            }
        }
        $this->load->view('kunjungan/tambah', $data);
    }

    public function edit($id) {
        $role = $this->session->userdata('role');
        $id_dokter = $this->session->userdata('id_dokter');
        $data['kunjungan'] = $this->Kunjungan_model->get_by_id($id);
        if ($role == 'dokter' && $data['kunjungan']->id_dokter != $id_dokter) {
            show_error('Akses ditolak', 403);
        }
        $data['pasien'] = $this->Kunjungan_model->get_pasien();
        $data['dokter'] = $this->Kunjungan_model->get_dokter();
        $data['poli'] = $this->Kunjungan_model->get_poli();
        if ($this->input->post()) {
            $data_update = [
                'id_pasien' => $this->input->post('id_pasien'),
                'id_dokter' => $role == 'dokter' ? $id_dokter : $this->input->post('id_dokter'),
                'id_poli' => $this->input->post('id_poli'),
                'tanggal_kunjungan' => $this->input->post('tanggal_kunjungan'),
                'keluhan' => $this->input->post('keluhan')
            ];
            $this->Kunjungan_model->update($id, $data_update);
            redirect('kunjungan');
        }
        $this->load->view('kunjungan/edit', $data);
    }

    public function delete($id) {
        if ($this->session->userdata('role') == 'admin') {
            $this->Kunjungan_model->delete($id);
            redirect('kunjungan');
        } else {
            show_403(); 
        }
    }
}