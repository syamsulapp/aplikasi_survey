<?php

class Login extends CI_Controller {

    public function __construct(){
        parent:: __construct(){
            $this->load->model('M_login');
        }
    }

    function Login () {

        $this->load->view('v_login');
    }

}

?>