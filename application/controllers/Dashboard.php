<?php
   defined('BASEPATH') OR exit('No direct script access allowed');

   class Dashboard extends CI_Controller {
       public function __construct() {
           parent::__construct();
           $this->load->library('session');
           $this->load->helper('url');
           if (!$this->session->userdata('id')) {
               redirect('login');
           }
       }

       public function index() {
           $data['role'] = $this->session->userdata('role');
           $this->load->view('dashboard/index', $data);
       }
   }