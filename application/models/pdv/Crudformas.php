<?php

class Crudformas extends MY_Model  {
    
    //Pega todas as formas de pagamento do banco
    public function getFormas(){
        $formas = $this->db->get('formas_pagamento');
        return $formas->result_array();
    }
    
    public function getFormasAtivo(){
        $this->db->where('ativo_forma', 1);
        $formas = $this->db->get('formas_pagamento')->result_array();
        return $formas;
    }
    
    public function getFormasAtivoUnico(){
        $this->db->where('ativo_forma', 1);
        $this->db->where('id_forma > 0');
        $formas = $this->db->get('formas_pagamento')->result_array();
        return $formas;
    }
    //Pega todas as formas de pagamento do banco que não sejam parceladas
    public function getFormasSemParcela(){
        $this->db->where('vezes_pagamento', 1);
        $formas = $this->db->get('formas_pagamento');
        
        return $formas->result_array();
    }
    
    //Pega forma de pagamento pelo id
    public function getFormaId($id){
        $this->db->where('id_forma', $id);
        $forma = $this->db->get('formas_pagamento');
        
        return $forma->row_array();
    }
    
    //Insere uma forma de pagamento no banco de dados
    public function adicionarForma($forma){
        $this->db->insert('formas_pagamento', $forma);
    }
    
    //Exclui uma forma de pagamento baseada no id
    public function excluirForma($id){
	    $this->db->where('id_forma', $id);
	    $this->db->delete('formas_pagamento');
	}
	
	//Atualiza uma forma baseada no id
	public function atualizarForma($forma, $id){
	    $this->db->where('id_forma', $id);
	    $update = $this->db->update('formas_pagamento', $forma);
	}
}

?>