<?php
defined('BASEPATH') OR exit('No direct .script access allowed');

class Aula10 extends CI_Controller {

    public function index()
    {
        // echo 'Var: '.$_POST['codeigniter'];

        // print_r($this->input->post(NULL, TRUE));
        // echo 'CI Post: '.$this->input->post('codeigniter', TRUE);

        // echo 'Var: '.$_GET['nome'];
        // echo 'CI GET: '.$this->input->get('nome');
        // $retorno = $this->input->get('nome');

        // if(!$retorno) {
        //     echo 'Não veio!';
        // }

        // print_r($this->input->get(NULL, TRUE));

        // echo $this->input->get_post('nome');

        // $this->input->set_cookie('nome_cookie', 'Teste', '96540');
        // $cookie = $this->input->cookie('nome_cookie', TRUE);

        // echo $cookie;
        // echo '<pre>';
        // print_r($_SERVER);

        // echo $this->input->server('SERVER_SOFTWARE');
        // echo $this->input->ip_address();

        // if ($this->input->valid_ip('192.168.0.1')) {
        //     echo 'IP OK';
        // } else {
        //     echo 'IP com problema.';
        // }

        // echo $this->input->user_agent();

        // print_r ($this->input->request_headers());

        // echo $this->input->get_request_header('Connection', TRUE);

        // if($this->input->is_ajax_request()) {
        //     echo 'Exibir JSON';
        // } else {
        //     echo 'Exibir tabelas';
        // }

        // if ($this->input->is_cli_request()) {
        //     echo 'Cliente';
        // } else {
        //     echo 'N cliente';
        // }
    }
}