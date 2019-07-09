<?php

class M_register extends CI_Model {

    public function index () {
        $this->db->get('tb_register');
    }
}