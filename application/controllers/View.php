<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
    
    // public function index()
    // {
    //     $data['nome'] = 'Carmona';
    //     $data['title'] = 'Página de teste';
    //     $data['tecnologias'] = array("PHP", "CI", "MySQL", "VsCode");
        
    //     $html = $this->load->view('basico', $data, TRUE);
    //     echo $html;
    // }

    public function index()
    {
        $data = array();
        $data['VARIAVEL'] = 'Mensagem de teste.';

        $data['BLC_MENSAGEM'] = array(array("MENSAGEM" => 'Error'));

        $tec = array("PHP", "CI", "MySQL", "VsCode");

        foreach($tec as $t) {
            $data['BLC_TECNOLOGIAS'][] = array("ITEM" => $t);
        }

        $data['NOME'] = 'Andre';

        // $data['BLC_TECNOLOGIAS'][] = array("ITEM" => 'MySQL');
        // $data['BLC_TECNOLOGIAS'][] = array("ITEM" => 'CodeIgniter');
        
        $this->parser->parse('parser', $data);
    }
}