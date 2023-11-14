<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View extends CI_Controller {
    
    public function index()
    {
        $data['nome'] = 'Andre';
        $data['title'] = 'Curso codeIgniter';

        $data['tecnologias'] = array("PHP", "CI", "MySql", "VSCode");

       $html = $this->load->view('basico', $data, TRUE);

       echo $html;
    }
}