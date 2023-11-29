<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula13 extends CI_Controller {

    public function index()
    {
        $this->load->library('encrypt');
        $this->encrypt->initialize(array(
            'driver' => 'openssl',
            'cipher' => 'aes-256',
            // outras configurações, se necessário
        ));

        $senha = '54321';

        $senhaC = $this->encrypt->encode($senha);
        echo $senha;
    }
}