<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula8 extends CI_Controller {

    public function index()
    {
        /*
        $dados = array (
            "nome" => 'Fulano',
            "cidade" => 'Passo Fundo'
        );

        $this->session->set_userdata($dados);

        $this->session->set_userdata('nome2', 'Fulano2');
        */
        
        /*
        $nome = $this->session->userdata('nome');
        $cidade = $this->session->userdata('cidade');
        $nome2 = $this->session->userdata('nome2');

        echo $nome2;
        */

        /*
        $remover = array('nome' => '', 'cidade' => '');
        $this->session->unset_userdata($remover);
        $dados = $this->session->all_userdata();
        echo  '<pre>';
        print_r($dados);
        */
    }

    public function setTemporario($mensagem)
    {
        $this->session->set_flashdata('aviso', $mensagem);
        echo 'Mensagem inserida';
    }

    public function getTemporario()
    {
        $mensagem = $this->session->flashdata('aviso');

        if($mensagem) {
            echo 'Mensagem: ' .$mensagem;
        } else {
            echo 'Mensagem apagada.';
        }
    }
}