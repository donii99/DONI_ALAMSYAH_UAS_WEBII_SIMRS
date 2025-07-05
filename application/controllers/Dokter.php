<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dokter extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dokter_model');
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url', 'auth']);

        cek_login();

        if (!in_array($this->session->userdata('role'), ['admin', 'dokter'])) {
            show_403(); 
        }

    }

    public function index() {
        $data['dokter'] = $this->Dokter_model->get_all();
        $this->load->view('dokter/index', $data);
    }

    public function tambah() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required');

        if ($this->form_validation->run()) {
            $data = [
                'nama' => $this->input->post('nama'),
                'spesialisasi' => $this->input->post('spesialisasi')
            ];
            $this->Dokter_model->tambah($data);
            $this->session->set_flashdata('success', 'Data dokter berhasil ditambahkan');
            redirect('dokter');
        }

        $this->load->view('dokter/tambah');
    }

    public function edit($id) {
        $data['dokter'] = $this->Dokter_model->get_by_id($id);
        if (!$data['dokter']) {
            show_404();
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('spesialisasi', 'Spesialisasi', 'required');

        if ($this->form_validation->run()) {
            $data_update = [
                'nama' => $this->input->post('nama'),
                'spesialisasi' => $this->input->post('spesialisasi')
            ];
            $this->Dokter_model->update($id, $data_update);
            $this->session->set_flashdata('success', 'Data dokter berhasil diperbarui');
            redirect('dokter');
        }

        $this->load->view('dokter/edit', $data);
    }

    public function delete($id) {
        $dokter = $this->Dokter_model->get_by_id($id);
        if (!$dokter) {
            show_404();
        }

        $this->Dokter_model->delete($id);
        $this->session->set_flashdata('success', 'Data dokter berhasil dihapus');
        redirect('dokter');
    }
}
