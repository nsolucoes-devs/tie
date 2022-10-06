<?php

class Crudlistas extends MY_Model  {
    
    //Insere uma lista vazia para as outras listas pegarem o id
    public function inserirListaVazia(){
        $listamax = $this->pegaUltimaLista();
        $id = $listamax['id_lista'] + 1;
        
        $lista = array(
            'id_lista' => $id,
            'produto_id' => 0,
            'produto_valor' => 0,
            'produto_qtd' => 0,
            'produto_valorfinal' => 0,
            'loja_id' => 0,
            'cliente_id' => 0
        );
        
        $this->db->insert('listas', $lista);
        
        return $id;
    }
    
    //Pega a última lista inserida no banco
    public function pegaUltimaLista(){
        $this->db->select_max('id_lista');
        $lista = $this->db->get('listas');
        
        return $lista->row_array();
    }
    
    //Recebe uma lista e a insere no banco de dados
    public function insereLista($lista){
        $this->db->insert('listas', $lista);
        
        return $this->db->insert_id();
    }
    
    //Exclui uma lista vazia do banco de dados
    public function excluirListaVazia($idLista){
        $this->db->where('id_lista', $idLista);
        $this->db->where('produto_id', "0");
	    $this->db->delete('listas');
    }
    
    //Pega as listas baseadas no id
    public function getListasId($id){
        $this->db->where('id_lista', $id);
        $lista = $this->db->get('listas');
        
        return $lista->result_array();
    }
    
    //Pega todas as listas
    public function getListas(){
        $lista = $this->db->get('listas');
        
        return $lista->result_array();
    }
    
    //Exclui as listas baseado no id
    public function excluirLista($id){
	    $this->db->where('id_lista', $id);
	    $this->db->delete('listas');
	}
}

?>