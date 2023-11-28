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

    public function getWhere2($uf)
    {
        $this->db->select('c.codcidade, c.nome, c.uf');
        $this->db->from('cidade c');
        $this->db->where('uf', 'RS');
        $this->db->or_where('uf', 'SP');
        return $this->db->get()->result();
        // $this->db->where('c.codcidade >', $codcidade);
    }

    public function getWhereIN($condicao)
    {
        $this->db->select('c.codcidade, c.nome, c.uf');
        $this->db->from('cidade c');
        // $this->db->where_in('uf', $condicao);
        $this->db->where_not_in('uf', $condicao);// not para n trazer as cidades dessa condicao
        return $this->db->get()->result();
    }
    
    public function getLike($condicao)
    {
        $this->db->select('c.codcidade, c.nome, c.uf');
        $this->db->from('cidade c');
        $this->db->like('nome', $condicao, 'after');
        return $this->db->get()->result();
    }

    public function insert($dados)
    {
        $this->db->insert('cidade', $dados);
        return $this->db->insert_id();
    }

    public function insertBatch($dados)
    {
        $this->db->insert_batch('cidade', $dados);
    }

    public function insertSet($nome, $uf)
    {
        $this->db->set('nome', $nome);
        $this->db->set('uf', $uf);
        $this->db->insert('cidade');
        return $this->db->insert_id();
    }

    public function insertObjeto($obj)
    {
        $this->db->set($obj);
        $this->db->insert('cidade');
    }

    public function update($id, $array)
    {
        $this->db->where('codcidade', $id, FALSE);
        $this->db->update('cidade', $array);
    }
    
    public function updateSet($id, $nome)
    {
        $this->db->set('nome', $nome);
        $this->db->where('codcidade', $id, FALSE);
        $this->db->update('cidade');
    }

    public function delete($id)
    {
        $this->db->where('codcidade', $id, FALSE);
        $this->db->delete('cidade');
    }
    
}