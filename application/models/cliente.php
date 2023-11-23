<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Model {

    public function get()
    {
        $this->db->select('cliente.codcliente, cliente.nome');
        $this->db->select('cidade.nome as nomecidade', FALSE);
        $this->db->from('cliente');
        $this->db->join('cidade', 'cidade.codcidade = cliente.codcidade', 'LEFT');
        return $this->db->get()->result();
    }
    
    public function getGroup()
    {
        $this->db->select('COUNT(codcliente) AS TOTAL', FALSE);
        $this->db->select('codcidade');
        $this->db->from('cliente');
        $this->db->group_by('codcidade');
        return $this->db->get()->result();
    }

    public function getOrder()
    {
        $this->db->select('cliente.codcliente, cliente.nome');
        $this->db->select('cidade.nome as nomecidade', FALSE);
        $this->db->from('cliente');
        $this->db->join('cidade', 'cidade.codcidade = cliente.codcidade', 'LEFT');
        $this->db->limit(2, 0);
        // $this->db->limit(2, 0); //  Trazer 2 dados a partir do indice "codcliente" 0
        return $this->db->get()->result();
    }

    public function getTotalPesquisa()
    {
        $this->db->select('cliente.codcliente, cliente.nome');
        $this->db->select('cidade.nome as nomecidade', FALSE);
        $this->db->from('cliente');
        $this->db->join('cidade', 'cidade.codcidade = cliente.codcidade');
        $this->db->order_by('cliente.nome');
        return $this->db->count_all_results();
    }

    public function getTotal()
    {
        return $this->db->count_all('cliente');
    }
}