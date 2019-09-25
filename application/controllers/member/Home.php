<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->check_login();
        if ($this->session->userdata('status') != "mahasiswa_alumni") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'     => 'Dashboard | ' . $site['nama_aplikasi'],
            'favicon'   => $site['icon_apps'],
            'site'      => $site
        );
        // [view dibawah untuk mahasiswa alumni]
        $this->template->load('layout/template', 'member/dashboard', $data);
    }
}
