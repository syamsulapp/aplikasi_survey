<?php

class Register extends CI_Controller {

    public function __construct(){
        parent:: __construct() {
            $this->load->model('M_register');
        }
    }


    function Daftar () {
        $this->load->view('v_register');
    }
}


?>