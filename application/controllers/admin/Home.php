<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Survey_model');
        $this->check_login();
        if ($this->session->userdata('status') != "mahasiswa_aktif") {
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $site = $this->Konfigurasi_model->listing();
        $data = array(
            'title'                 => 'Dashboard | ' . $site['nama_aplikasi'],
            'favicon'               => $site['icon_apps'],
            'site'                  => $site,
            'data_user'             => $this->session->userdata,
        );
        // print_r($data);die();
        if($this->session->userdata['user_survey'] == 0){
            // jika user belum mengisi form survey
            $this->template->load('layout/template', 'admin/survey_default', $data);
            // $this->template->load('layout/template', 'admin/survey_default', $data);
        }else{
            // jika user telah mengisi form survey
            $this->template->load('layout/template', 'admin/dashboard', $data);
        }

    }
    public function default_survey()
    {
        $this->form_validation->set_rules('nama_lengkap', 'Nama_lengkap', 'trim|required|min_length[5]|max_length[50]', [
            'min_length' => 'nama lengkap anda pendek sekali minimal 5 karakter '
        ]);
        $this->form_validation->set_rules('nim', 'NIM', 'trim|required|min_length[9]|max_length[9]', [
            'min_length' => 'NIM yang anda masukan kurang tepat ',
            'max_length' => 'NIM lengkap anda maksimal 9 karakter '
        ]);
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required|min_length[5]|max_length[100]', [
            'min_length' => 'Jurusan yang anda masukan kurang tepat ',
            'max_length' => 'Jurusan lengkap anda maksimal 100 karakter '
        ]);
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'trim|required|min_length[4]|max_length[100]', [
            'min_length' => 'Fakultas yang anda masukan kurang tepat ',
            'max_length' => 'Fakultas lengkap anda maksimal 100 karakter '
        ]);
        $this->form_validation->set_rules('no_hp', 'No.HP', 'trim|required|min_length[12]|max_length[12]', [
            'min_length' => 'No.HP yang anda masukan kurang tepat ',
            'max_length' => 'No.HP lengkap anda maksimal 12 angka '
        ]);
        $this->form_validation->set_rules('alamat_rumah', 'Alamat Rumah', 'trim|required|min_length[5]|max_length[100]', [
            'min_length' => 'Alamat Rumah yang anda masukan kurang tepat ',
            'max_length' => 'Alamat Rumah lengkap anda maksimal 12 angka '
        ]);
        $this->form_validation->set_rules('nama_orang_tua', 'Nama Orang Tua', 'trim|required|min_length[5]|max_length[100]', [
            'min_length' => 'Nama Orang Tua yang anda masukan kurang tepat ',
            'max_length' => 'Nama Orang Tua lengkap anda maksimal 100 angka '
        ]);
        $this->form_validation->set_rules('pekerjaan_orang_tua', 'Pekerjaan Orang Tua', 'trim|required|min_length[5]|max_length[100]', [
            'min_length' => 'Pekerjaan Orang Tua yang anda masukan kurang tepat ',
            'max_length' => 'Pekerjaan Orang Tua lengkap anda maksimal 100 angka '
        ]);
        $this->form_validation->set_rules('penghasilan_orang_tua', 'Penghasilan Orang Tua', 'trim|required|min_length[5]|max_length[15]', [
            'min_length' => 'Penghasilan Orang Tua yang anda masukan kurang tepat ',
            'max_length' => 'Penghasilan Orang Tua lengkap anda maksimal 100 angka '
        ]);

        if ($this->form_validation->run() == false) {
             redirect('admin/home');
        } else {
            $this->Survey_model->insert_survey();
            $this->session->set_flashdata('info', 'Terima kasih telah mengisi survey');
            redirect('admin/home');
        }
    }
}
