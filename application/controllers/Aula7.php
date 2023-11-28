<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aula7 extends CI_Controller {

    public function __Construct()
    {
        parent::__construct();
        $this->load->model('Cidade', 'CidadeM');
    }

    public function index()
    {
        /*
        $cidade = array (
            "nome" => "Carazinho",
            "uf" => "RS"
        );
        
        $id = $this->CidadeM->insert($cidade);
        echo "Cidade Inserida: {$id}";
        */

        /*
        $cidades = array (
            array (
                "nome" => "Não-me-toque",
                "uf" => "RS"
            ),
            array (
                "nome" => "Soledade",
                "uf" => "RS"
            )
        );
        $id = $this->CidadeM->insertBatch($cidades);
        echo "Cidades inseridas!";
        */

        /*
        $id = $this->CidadeM->insertSet('Lajeado', 'RS');
        echo "Cidade Inserida: {$id}";
        */

        /*
        $cidade = new stdClass();
        $cidade->nome = 'Cidade Teste';
        $cidade->uf = 'RS';
        
        $this->CidadeM->insertObjeto($cidade);
        echo "Ok";
        */
    }

    public function atualiza($id)
    {
        /*
        $cidade = array(
            "nome" => 'Teste Alteração'
        );
        */

        /*
        $cidade = new stdClass();
        $cidade->nome = 'Cidade alterada 2';
        $cidade->uf = 'RS';

        $this->CidadeM->update($id, $cidade);
        echo "Alterado!";
        */

        $this->CidadeM->updateSet($id, 'DB SET');
        echo 'Alterado';
    }

    public function delete($id)
    {
        $this->CidadeM->delete($id);
        echo 'Removido!';
    }
}