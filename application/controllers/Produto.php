<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto extends CI_Controller {

    private $horario = null;

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');

        $this->horario = date('d/m/Y H:i:s');
    }


    public function index() 
    {
        // echo "Olá, esse é o index";
        echo "Horario de inicialização é {$this->horario}";
    }

    public function publico()
    {
        echo "Este é um método público.";
    }

    private function privado()
    {
        echo "Este é um método privado";
    }

    public function chamaprivado()
    {
        $this->privado();
    }

    public function chamaprivadocalculo()
    {
        $resultado = $this->calculadados(50, 10);
        echo $resultado;
    }

    private function calculadados($valor1, $valor2)
    {
        return $valor1 + $valor2;
    }

    public function parametros($param1, $param2 = null, $param3 = 'Teste 3')
    {
        echo "<pre>P1: {$param1}</pre>";
        echo "<pre>P2: {$param2}</pre>";
        echo "<pre>P3: {$param3}</pre>";
    }

    public function calculadora($valor1 = 1, $valor2 = 2)
    {
        if(empty($valor1)) {
            echo "Informe o Valor 1";
            die();
        }

        if(empty($valor2)) {
            echo "Informe o Valor 2";
            die();
        }

        echo $valor1 + $valor2;
    }
}