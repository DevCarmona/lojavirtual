<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula5 extends CI_Controller {

    public function index ()
    {
        //  Para n usar ele aqui, podemos iniciar no config->autoload(library('database'))
        $this->load->database(); // Estamos informando que vamos carregar um db.
        $this->load->model('Cidade', 'CidadeM');

       $res = $this->CidadeM->get();
       echo '<pre>';
       print_r($res);

       $res1 = $this->CidadeM->getWhere(array('uf' => 'SP'));
       echo '<pre>';
       print_r($res1);

       $res2 = $this->CidadeM->getSelect();
       echo'<pre>';
       print_r($res2);

       $res3 = $this->CidadeM->getMax();
       echo '<pre>';
       print_r($res3);

       $res4 = $this->CidadeM->getMin();
       echo '<pre>';
       print_r($res4);
       
       $res5 = $this->CidadeM->getAvg();
       echo '<pre>';
       print_r($res5);
       
       $res6 = $this->CidadeM->getSum();
       echo '<pre>';
       print_r($res6);

       $res7 = $this->CidadeM->getFrom();
       echo '<pre>';
       print_r($res7);
    }
}