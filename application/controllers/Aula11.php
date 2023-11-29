<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula11 extends CI_Controller {

    public function index()
    {
        /*
        $this->load->helper('language');

        $this->lang->load('interface', $this->config->item('language'));
        
        $data['label_nome']         = $this->lang->line('label_nome');
        $data['label_idade']        = $this->lang->line('label_idade');
        $data['button_salvar']      = $this->lang->line('botao_salvar');
        $data['button_adicionar']   = $this->lang->line('botao_adicionar');
        $data['titulo']             = $this->lang->line('form_title_cliente');
        */

        $this->load->helper('tradutor');

        $data = array();

        tradutor('traducao', 'interface', $data);
        
        $this->parser->parse('traducao', $data);
    }
}