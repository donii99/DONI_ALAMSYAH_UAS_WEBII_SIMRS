<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller {
    public function __construct() {
    parent::__construct();
    $this->load->model('Pasien_model');
    $this->load->library('session');
    $this->load->helper('url');
    $this->load->helper('auth');
    cek_login();
    if (!in_array($this->session->userdata('role'), ['admin', 'receptionis'])) {
        show_403(); 
    }
}

    public function index() {
        $data['pasien'] = $this->Pasien_model->get_all();
        $this->load->view('pasien/index', $data);
    }

    public function tambah() {
        if ($this->input->post()) {
            $data = [
                'nomor_rekam_medis' => $this->input->post('nomor_rekam_medis'),
                'nama' => $this->input->post('nama'),
                'umur' => $this->input->post('umur'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->Pasien_model->tambah($data);
            redirect('pasien');
        }
        $this->load->view('pasien/tambah');
    }

    public function edit($id) {
        $data['pasien'] = $this->Pasien_model->get_by_id($id);
        if ($this->input->post()) {
            $data_update = [
                'nomor_rekam_medis' => $this->input->post('nomor_rekam_medis'),
                'nama' => $this->input->post('nama'),
                'umur' => $this->input->post('umur'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat')
            ];
            $this->Pasien_model->update($id, $data_update);
            redirect('pasien');
        }
        $this->load->view('pasien/edit', $data);
    }

    public function delete($id) {
        $this->Pasien_model->delete($id);
        redirect('pasien');
    }
}