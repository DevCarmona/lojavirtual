<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade extends CI_Model {

    public function get()
    {
        return $this->db->get('cidade', 2, 0)->result();
        
    }
    public function getWhere($condicao)
    {
        //  Selecionando condição do DB.
        return $this->db->get_where('cidade', $condicao)->result();
    }

    public function getSelect()
    {
        //  Especificando colunas do DB.
        $this->db->select('codcidade as codigo', FALSE);
        $this->db->select('nome');
        return $this->db->get('cidade')->result();
    }

    public function getMax()
    {
        // Trazendo o valor máximo da coluna do DB.
        $this->db->select_MAX('codcidade', 'máximo');
        return $this->db->get('cidade')->first_row();
    }

    public function getMin()
    {
        // Trazendo o valor mínimo da coluna do DB.
        $this->db->select_MIN('codcidade', 'menor');
        return $this->db->get('cidade')->first_row();
    }

    public function getAvg()
    {
        // Trazendo o valor médio da coluna do DB.
        $this->db->select_avg('codcidade', 'médio');
        return $this->db->get('cidade')->first_row();
    }

    public function getSum()
    {
        //  Somando os dados recebidos pelo DB.
        $this->db->select_sum('codcidade', 'soma');
        return $this->db->get('cidade')->first_row();
    }

    public function getFrom()
    {
        $this->db->select('c.codcidade, c.nome, c.uf');
        $this->db->from('cidade c');
        return $this->db->get()->result_array();
    }
}