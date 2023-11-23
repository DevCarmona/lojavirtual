<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula6 extends CI_Controller {

    public function index()
    {
        $this->load->model('Cliente', 'ClienteM');
        $this->load->model('Cidade', 'CidadeM');

        $res = $this->ClienteM->get();
        echo '<pre>';
        print_r($res);

        $res2 = $this->CidadeM->getWhere2(1);
        echo '<pre>';
        print_r($res2);

        $estados = array('RJ', 'SP');
        $res3 = $this->CidadeM->getWhereIn($estados);
        echo '<pre>';
        print_r($res3);

        $res4 = $this->CidadeM->getLike('Porto');
        echo '<pre>';
        print_r($res4);
        // print_r($this->db);//   Para debugar o cód

        $res5 = $this->ClienteM->getGroup();
        echo '<pre>';
        print_r($res5);

        $res6 = $this->ClienteM->getOrder();
        echo '<pre>';
        print_r($res6);

        $res7 = $this->ClienteM->getTotalPesquisa();
        echo '<pre>';
        print_r($res7);

        $res8= $this->ClienteM->getTotal();
        echo '<pre>';
        print_r($res8);
    }
}