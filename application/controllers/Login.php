<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Login extends CI_Controller {
       public function __construct() {
           parent::__construct();
           $this->load->model('Users_model');
           $this->load->library('session');
           $this->load->helper('url');
       }

       public function index() {
           if ($this->input->post()) {
               $username = $this->input->post('username');
               $password = $this->input->post('password');
               $users = $this->Users_model->login($username, $password);
               if ($users) {
                   $this->session->set_userdata([
                       'id' => $users->id,
                       'username' => $users->username,
                       'role' => $users->role,
                       'id_dokter' => $users->id_dokter
                   ]);
                   redirect('dashboard');
               } else {
                   $this->session->set_flashdata('error', 'Username atau kata sandi salah');
                   redirect('login');
               }
           }
           $this->load->view('login/index');
       }

       public function logout() {
           $this->session->sess_destroy();
           redirect('login');
       }
   }