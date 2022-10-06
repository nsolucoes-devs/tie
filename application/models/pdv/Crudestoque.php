<?php

class Crudestoque extends MY_Model  { 
    
    //Pega todos os estoques baseados no id do produto
    public function getEstoqueProduto($idProduto){
        if($this->session->userdata('tipo_pessoa') == 2 || $this->session->userdata('tipo_pessoa') == 3){
            $this->db->where('loja_id', $this->session->userdata('loja_id'));
        }
        
        $this->db->where('produto_id', $idProduto);
        $query = $this->db->get('estoque_produtos');
        
        return $query->result_array();
    }
    
    //Cadastra um estoque
    public function cadastrarEstoque($estoque){
        $this->db->insert('estoque_produtos', $estoque);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //Retorna todos os estoques
    public function getAllEstoques(){
        if($this->session->userdata('tipo_pessoa') == 2 || $this->session->userdata('tipo_pessoa') == 3){
            $this->db->where('loja_id', $this->session->userdata('loja_id'));
        }
        
        $estoques = $this->db->get('estoque_produtos');
        $estoques = $estoques->result_array();
        return $estoques;
    }
    
    //Pega o primeiro estoque baseado no id do produto sem limitação de loja 
    public function getEstoqueProdutoSemLoja($idProduto){
        $this->db->where('produto_id', $idProduto);
        $query = $this->db->get('estoque_produtos');
        
        return $query->result_array();
    }
    
    //Retorna todos os estoques de produtos
    public function getEstoque(){
        if($this->session->userdata('tipo_pessoa') == 2 || $this->session->userdata('tipo_pessoa') == 3){
            $this->db->where('loja_id', $this->session->userdata('loja_id'));
        }
        
        $this->db->where('situacao_produto', 1);
        $produtos = $this->db->get('estoque_produtos');
        $produtos = $produtos->result_array();
        
        $aux = 0;
        foreach($produtos as $row){
            $this->db->where('produto_id', $row['produto_id']);
            $this->db->where('produto_habilitado', 1);
            $produto = $this->db->get('produtos')->row_array();
            
            if($produto == null){
                unset($produtos[$aux]);
            } else{
                $produtos[$aux]['nome_produto'] = $produto['produto_nome'];
            }
            $aux++;
        }
        
        return $produtos;
    }
    
    //Retorna um estoque baseado no id
    public function getEstoqueId($idEstoque){
        if($this->session->userdata('tipo_pessoa') == 2 || $this->session->userdata('tipo_pessoa') == 3){
            $this->db->where('loja_id', $this->session->userdata('loja_id'));
        }
        
        $this->db->where('id_estoque', $idEstoque);
        $estoque = $this->db->get('estoque_produtos');
        
        return $estoque->row_array();
    }
    
    //Retorna os estoques de uma loja
    public function getEstoqueLoja($idloja){
        $this->db->where('loja_id', $idloja);
        $estoque = $this->db->get('estoque_produtos');
        
        return $estoque->result_array();
    }
    
    //Atualiza um estoque baseado no id
	public function atualizarEstoque($estoque, $id){
	    $this->db->where('id_estoque', $id);
	    $update = $this->db->update('estoque_produtos', $estoque);
        
	    return $update;
	}
	
	//Exclui um estoque baseado no id
    public function excluirEstoque($id){
	    $this->db->where('id_estoque', $id);
	    $this->db->delete('estoque_produtos');
	}
	
	public function getEstProd(){
        $id = $this->input->post('valor');
        $this->db->where('produto_id', $id);
        $est = $this->db->get('estoque_produtos');
        
        return $est->result_array();
    }
    
    // função que vai pegar os estoques de uma loja e agrupor por produto_id
    public function getGroupBy($id){
        $this->db->where('loja_id', $id);
        $this->db->group_by('produto_id');
        $prods = $this->db->get('estoque_produtos');
        
        return $prods->result_array();
    }
}

?>