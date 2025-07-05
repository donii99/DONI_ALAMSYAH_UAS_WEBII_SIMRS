<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('cek_login')) {
    function cek_login() {
        $CI =& get_instance();
        if (!$CI->session->userdata('id')) {
            redirect('login');
        }
    }
}

if (!function_exists('cek_role')) {
    function cek_role($role_diizinkan) {
        $CI =& get_instance();
        if (!in_array($CI->session->userdata('role'), $role_diizinkan)) {
            show_403();
        }
    }
}

if (!function_exists('show_403')) {
    function show_403() {
        $CI =& get_instance();
        $CI->output->set_status_header(403);
        echo $CI->load->view('errors/html/error_403', [], true);
        exit;
    }
}

