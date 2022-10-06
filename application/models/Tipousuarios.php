<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipousuarios extends CI_Model {
    
	public function getAllTipoUsuarios($limit, $start){
        $this->db->select('perfilusuario_id, perfilusuario_nome, perfilusuario_create');
        $this->db->where('perfilusuario_id > 0');
        $this->db->order_by('perfilusuario_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('perfilusuario');
        return $data->result_array();
    }
    
    public function get($id){
	    $this->db->where('perfilusuario_id', $id);
	    $data = $this->db->get('perfilusuario');
	    return $data->row_array();
	}
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('perfilusuario')->row_array();
        return $a['pages'];
    }
    
    public function getAllTipoUsuariosFiltro($filter, $limit, $start){
        $this->db->select('perfilusuario_id, perfilusuario_nome, perfilusuario_create');
        $this->db->where('perfilusuario_id > 0');
        $this->db->like('perfilusuario_nome', $filter, 'both');
        $this->db->or_like('perfilusuario_create', $filter, 'both');
        $this->db->order_by('perfilusuario_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('perfilusuario')->result_array();
        return $data;
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('perfilusuario_nome', $filter, 'both');
        $this->db->or_like('perfilusuario_create', $filter, 'both');
        $a = $this->db->get('perfilusuario')->row_array();
        return $a['pages'];
    }
	
	public function excluirTipoUsuario($id){
	    $this->db->where('perfilusuario_id', $id);
	    $this->db->delete('perfilusuario');
	}
	
	public function setUserType($dados){
	    if(array_key_exists('key', $dados)){
	          $dados['perfilusuario_id'] = $dados['key'];
	          unset($dados['key']);
	          $this->db->where('perfilusuario_id', $dados['perfilusuario_id']);
	          $this->db->update('perfilusuario', $dados);
	    }else{
	        $this->db->insert('perfilusuario', $dados);
	    }
	}
	
	public function getType($id){
	    $this->db->where('perfilusuario_id', $id);
	    $data = $this->db->get('perfilusuario')->row_array();
	    return $data; 
	}
	
	public function updateType($id, $type){
	    $this->db->where('perfilusuario_id', $id);
	    $this->db->update('perfilusuario', $type);
	}
	
	public function getAllTipo(){
	    $this->db->where('perfilusuario_id > 0');
	    return $this->db->get('perfilusuario')->result_array();
	}
}