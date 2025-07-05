<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Poli extends CI_Controller {
       public function __construct() {
            parent::__construct();
            $this->load->model('Poli_model');
            $this->load->library('session');
            $this->load->helper('url');
            $this->load->helper('auth');
            cek_login();
            if (!in_array($this->session->userdata('role'), ['admin'])) {
                show_403(); 
            }
        }

       public function index() {
           $data['poli'] = $this->Poli_model->get_all();
           $this->load->view('poli/index', $data);
       }

       public function tambah() {
           if ($this->input->post()) {
               $data = [
                   'nama' => $this->input->post('nama')
               ];
               $this->Poli_model->tambah($data);
               redirect('poli');
           }
           $this->load->view('poli/tambah');
       }

       public function edit($id) {
           $data['poli'] = $this->Poli_model->get_by_id($id);
           if ($this->input->post()) {
               $data_update = [
                   'nama' => $this->input->post('nama')
               ];
               $this->Poli_model->update($id, $data_update);
               redirect('poli');
           }
           $this->load->view('poli/edit', $data);
       }

       public function delete($id) {
           $this->Poli_model->delete($id);
           redirect('poli');
       }
   }