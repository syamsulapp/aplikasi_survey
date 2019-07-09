<?php

class M_login extends CI_Model {

    public function index () {
        $this->db->get('tb_login');
    }
}