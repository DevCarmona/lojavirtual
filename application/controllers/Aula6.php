<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula6 extends CI_Controller {

    public function index()
    {
        $this->load->model('Cliente', 'ClienteM');

        $res = $this->ClienteM->get();
        echo '<pre>';
        print_r($res);
    }
}