<?php

class Tipo_produto extends MY_Model  {
    
    //Pega todos os tipos de produtos
    public function getTipos(){
        $tipos = $this->db->get('tipo_produto');
        
        return $tipos->result_array();
    }
    
    //Insere um tipo de produto no banco de dados
    public function adicionarTipo($tipo){
        $this->db->insert('tipo_produto', $tipo);
    }
    
    //Exclui um tipo de produto baseado no id
    public function excluirTipo($id){
	    $this->db->where('id_tipo', $id);
	    $this->db->delete('tipo_produto');
	}
	
	//Atualiza um tipo baseado no id
	public function atualizarTipo($tipo, $id){
	    $this->db->where('id_tipo', $id);
	    $update = $this->db->update('tipo_produto', $tipo);
	}
	
	//Pega o tipo de produto baseado o option_value_id
    public function getTipoDesc($id){
        $this->db->where('option_value_id', $id);
        $tipo = $this->db->get('tipo_produto');
        
        return $tipo->row_array();
    }
}

?>