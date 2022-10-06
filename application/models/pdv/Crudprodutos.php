<?php

class Crudprodutos extends MY_Model  {
    
    //Checa se há diferenças entre os preços e estoques da distribuidora e do sistema,
    //atualizando-os no sistema. Também verifica se há modelos que existem na distribuidora
    //mas não no sistema e, caso haja, os insere no sistema.
    public function checarDistribuidora(){
        $produtos = $this->getProdutosDist();
        $estPadrao = 0;
        
        foreach($produtos as $pr){
            
            $this->db2->where('product_id', $pr['produto_distribuidora_id']);
            $prdist = $this->db2->get('oc_product');
            $prdist = $prdist->row_array();
            
            if($prdist == null){
                $this->excluirProduto($pr['id_produto']);
            }else{
            
                $this->db->where('produto_id', $pr['id_produto']);
                $estoques = $this->db->get('estoque_produtos');
                $estoques = $estoques->result_array();
                
                $aux3 = 0;
                foreach($estoques as $est){
                    if($est['opcao_dist_id'] == 0){
                        $aux3 = 1;
                        $estPadrao = $est;
                    }
                    
                    if($est['opcao_dist_id'] != 0 && $est['tipo_produto_id'] == 0){
                        $this->db2->where('product_option_value_id', $est['opcao_dist_id']);
                        $productOptionValue = $this->db2->get('oc_product_option_value')->row_array();
                        
                        $this->db->where('option_value_id', $productOptionValue['option_value_id']);
                        $tipo2 = $this->db->get('tipo_produto')->row_array();
                        
                        if($tipo2 != null){
                            $est['tipo_produto_id'] = $tipo2['id_tipo'];
                            $this->db->where('id_estoque', $est['id_estoque']);
                            $this->db->update('estoque_produtos', $est);
                        }
                        
                    }
                    
                    if($est['opcao_dist_id'] == 0 && ($est['modelo_produto'] != "Modelo Padrão" && $est['modelo_produto'] != "Padrão")){
                        $this->db->where('id_estoque', $est['id_estoque']);
                        $this->db->delete('estoque_produtos');
                    }
                    
                    if($est['opcao_dist_id'] == 0 && ($est['estoque'] != $prdist['quantity'] 
                    || $prdist['price'] > $est['venda_produto'])){
                        $est['venda_produto'] = $prdist['price'];
                        $est['estoque'] =  $prdist['quantity'];
                        
                        $this->db->where('id_estoque', $est['id_estoque']);
    	                $update = $this->db->update('estoque_produtos', $est);
                    }
                    
                    if($est['opcao_dist_id'] != 0){
                        $this->db2->where('product_option_value_id', $est['opcao_dist_id']);
                        $op = $this->db2->get('oc_product_option_value');
                        $op = $op->row_array();
                        
                        if($op == null || ($op != null && $op['product_id'] != $pr['produto_distribuidora_id'])){
                            $this->db->where('id_estoque', $est['id_estoque']);
    	                    $this->db->delete('estoque_produtos');
                        }else{
                            if(($est['estoque'] != $op['quantity'] 
                                || $op['price'] > $est['venda_produto'])){
                                $est['venda_produto'] = $op['price'];
                                $est['estoque'] =  $op['quantity'];
                                
                                $this->db->where('id_estoque', $est['id_estoque']);
            	                $update = $this->db->update('estoque_produtos', $est);
                            }
                        }
                    }
                }
                
                if($aux3 != 1){
                    $data = explode('-', $prdist['date_available']);
                    $data2 = $data[2] . "/" . $data[1] . "/" . $data[0];
                    
                    if($prdist['weight_class_id'] == 1){
                        $peso = 1;
                    } else if($prdist['weight_class_id'] == 2){
                        $peso  = 2;
                    } else if($prdist['weight_class_id'] == 5){
                        $peso  = 3;
                    } else if($prdist['weight_class_id'] == 6){
                        $peso  = 4;
                    }
                
                    $estoque = array(
                        'loja_id' => 25,
                        'produto_id' => $pr['id_produto'],
                        'estoque' => $prdist['quantity'],
                        'qtd_minima' => $prdist['minimum'],
                        'altura_produto' => $prdist['height'],
                        'largura_produto' => $prdist['width'],
                        'peso_produto' => $prdist['weight'],
                        'comprimento_produto' => $prdist['length'],
                        'sku' => $pr['id_produto'] . $prdist['sku'],
                        'ncm' => $pr['id_produto'] . $prdist['ncm'],
                        'cest' => $pr['id_produto'] . $prdist['cest'],
                        'upc' => $pr['id_produto'] . $prdist['upc'],
                        'ean' => $pr['id_produto'] . $prdist['ean'],
                        'jan' => $pr['id_produto'] . $prdist['jan'],
                        'isbn' => $pr['id_produto'] . $prdist['isbn'],
                        'mpn' => $pr['id_produto'] . $prdist['mpn'],
                        'modelo_produto' => "Padrão",
                        'localizacao_produto' => $prdist['location'],
                        'reduzir_estoque_produto' => $prdist['subtract'],
                        'se_esgotado_produto' => 3,
                        'precisa_frete_produto' => 0,
                        'data_disponivel_produto' => $data2,
                        'unidade_peso_produto' => $peso,
                        'unidade_medida_produto' => $prdist['length_class_id'],
                        'situacao_produto' => $prdist['status'],
                        'min_estoque' => 1,
                        'venda_produto' => $prdist['price'],
                        'tipo_produto_id' => 0,
                        'opcao_dist_id' => 0,
                    );
                    
                    $this->db->insert('estoque_produtos', $estoque);
                }
                
                $this->db2->where('product_id', $pr['produto_distribuidora_id']);
                $opcoes = $this->db2->get('oc_product_option_value');
                $opcoes = $opcoes->result_array();
                
                foreach($opcoes as $row){
                    $this->db->where('opcao_dist_id', $row['product_option_value_id']);
                    $est = $this->db->get('estoque_produtos');
                    $est = $est->result_array();
                    
                    if($est == null){
                        $estoque = $estPadrao;
                        
                        $estoque['sku'] = $pr['id_produto'] . $row['sku'];
        	            $estoque['estoque'] = $row['quantity'];
        	            $estoque['reduzir_estoque_produto'] = $row['subtract'];
        	            $estoque['venda_produto'] = $row['price'];
        	            $estoque['peso_produto'] = $row['weight'];
    	                $estoque['opcao_dist_id'] = $row['product_option_value_id'];
    	                
    	                $this->db2->where('option_value_id', $row['option_value_id']);
                        $this->db2->where('language_id', 2);
                        $descricao = $this->db2->get('oc_option_value_description');
                        $descricao = $descricao->row_array();
                        $estoque['modelo_produto'] = $descricao['name'];
                        unset($estoque['id_estoque']);
                        
    	                $this->db->insert('estoque_produtos', $estoque);
                    }
                }
            }
            
        }
    }
    
    //Insere um produto no banco de dados
    public function cadastrarProduto($produto){
        $this->db->insert('produtos', $produto);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //Pega todos os produtos
    public function getProdutos(){
         $this->db->select('produto_id, produto_nome, produto_valor');
        $produtos = $this->db->get('produtos')->result_array();
        return $produtos;
    }
    
    //Pega um produto baseado no id
    public function getProdutoUnico($id){
        $this->db->where('id_produto', $id);
        $produto = $this->db->get('produtos');
        $pr = $produto->row_array();

        return $pr;
    }
    
    //busca os produtos que também existem na distribuidora
    public function getProdutosDist(){
        $this->db->where('produto_distribuidora_id !=', 0);
        $produtos = $this->db->get('produtos');
        $produtos = $produtos->result_array();
        
        return $produtos;
    }
    
    //Pega um produto baseado no id com o estoque e a cor
    public function getProdutoUnicoComp($id, $estoque){
        $this->db->where('id_produto', $id);
        $produto = $this->db->get('produtos');
        $produto = $produto->row_array();
        
        $this->db->where('id_estoque', $estoque);
        $estoque = $this->db->get('estoque_produtos');
        $estoque = $estoque->row_array();
        $produto['modelo'] = $estoque['modelo_produto'];
        
        $this->db->where('id_tipo', $estoque['tipo_produto_id']);
        $tipo = $this->db->get('tipo_produto');
        $tipo = $tipo->row_array();
        if($tipo == null){
            $tipo['nome_tipo'] = "Padrão";
        }
        $produto['opcao'] = $tipo['nome_tipo'];
        
        return $produto;
    }
    
    //Pega um produto baseado no codigo
    public function getProdutoUnicoCod($cod){
        $this->db->where('codigo_produto', $cod);
        $produto = $this->db->get('produtos');
        $pr = $produto->row_array();
        
        return $pr;
    }
    
    //Pega um estoque baseado no id que esteja habilitado, com estoque maior que
    //0 e data disponível menor que a data atual. Depois usa o código do produto 
    //registrado no estoque para procurar e retornar o produto verificando se  
    //ele está visível.
    public function getProdutoUnicoVisivel($dados){
        /*$this->db->where('produto_id', $dados['codigo']);
        $this->db->where('situacao_produto', 1);
        
        $estoque = $this->db->get('estoque_produtos');
        $estoque2 = $estoque->row_array();
        
        if($estoque2 == null){
            return null;
        }else{
            $dataAtual = (int) str_replace('-', '', date('Y-m-d'));
            $dataEstoque = (int) str_replace('-', '', $estoque2['data_disponivel_produto']);
            
            if($dataAtual < $dataEstoque){
                return 1;
            } else{
                $idproduto = $estoque2['produto_id'];
                $this->db->select('produto_id, produto_nome');
                $this->db->where('produto_id', $idproduto);
                $this->db->where('produto_habilitado', 1);
                $data = $this->db->get('produtos');
                $produto = $data->row_array();
                
                
                $this->db->where('estoque_loja', $dados['loja']);
                $this->db->where('estoque_produto =', $produto['produto_nome']);
                $this->db->order_by('estoque_id', 'DESC');
                $a = $this->db->get()->row_array();
                
                $this->db->select("sum(estoque_quantidade) as estoque_quantidade");
                $this->db->where('estoque_loja =', $dados['loja']);
                $this->db->where('estoque_produto =', $produto['produto_nome']);
                $this->db->group_by("estoque_produto");
                $estoque = $this->db->get('estoque')->row_array();
                
                $produto['produto_valor']   = $a['estoque_valor'];
                $produto['produto_estoque'] = $estoque['estoque_quantidade'];
                
                return $produto;
            }
        }*/
        
        $this->db->select('produto_id, produto_nome');
        $this->db->where("produto_id", $dados['codigo']);
        $a = $this->db->get('produtos')->row_array();
        
        $this->db->select("sum(estoque_quantidade) as estoque_quantidade");
        $this->db->where('estoque_loja =', $dados['loja']);
        $this->db->where('estoque_produto =', $a['produto_nome']);
        $this->db->group_by("estoque_produto");
        $b = $this->db->get('estoque')->row_array();
        if($b){
            $quantidade = $b['estoque_quantidade'];
        }else{
            $quantidade = 0;
        }
        
        $this->db->select("estoque_valor");
        $this->db->where('estoque_loja', $dados['loja']);
        $this->db->where('estoque_produto =', $a['produto_nome']);
        $this->db->order_by('estoque_id', 'DESC');
        $c = $this->db->get('estoque')->row_array();
        if($c){
            $valor = $c['estoque_valor'];
        }else{
            $valor = 0.0;
        }
        
        $produto = array(
            'produto_id'      => $a['produto_id'],
            'produto_nome'    => $a['produto_nome'],
            'produto_valor'   => $valor,
            'produto_estoque' => $quantidade,
            );
        
        return $produto;
    }
    
    //Recebe um id de estoque e procura o estoque e o produto relacionado a ele no
    //banco de dados
    public function getProdutoUnicoTroca($id){
        $this->db->where('id_estoque', $id);
        
        $estoque = $this->db->get('estoque_produtos');
        $estoque2 = $estoque->row_array();
        
        if($estoque2 == null){
            return null;
        } else{
            $idproduto = $estoque2['produto_id'];
            $this->db->where('id_produto', $idproduto);
            $data = $this->db->get('produtos');
            $produto = $data->row_array();
            
            if($produto == null){
                return null;
            }else{
                $this->db->where('id_tipo', $estoque2['tipo_produto_id']);
                $tipo = $this->db->get('tipo_produto');
                $tipo = $tipo ->row_array();
                
                $produto['opcao'] = $tipo['nome_tipo'];
                $produto['estoque_id'] = $estoque2['id_estoque'];
                $produto['estoque_modelo'] = $estoque2['modelo_produto'];
                $produto['estoque_qtd'] = $estoque2['estoque'];
                $produto['minimo_venda'] = $estoque2['qtd_minima'];
                $produto['venda_produto'] = $estoque2['venda_produto'];
                
                return $produto;
            }
        }    
        
    } 
    
    //Exclui um produto baseado no id
    public function excluirProduto($id){
	    $this->db->where('id_produto', $id);
	    $this->db->delete('produtos');
	}
	
	//Atualiza um produto baseado no id
	public function atualizarProduto($produto, $id){
	    $this->db->where('id_produto', $id);
	    $update = $this->db->update('produtos', $produto);
	}
	
	//Busca as opções cadastradas na distribuidora/Atualiza o banco
	public function opcoes(){
	    $dados = $this->db->get('tipo_produto');
	    return $dados->result_array();
	}
	
	public function attOpcoes(){
	    $this->db2->where('language_id', '2');
	    $dados = $this->db2->get('oc_option_value_description')->result_array();
	    
	    $dadobanco = $this->db->get('tipo_produto')->result_array();
	    
	    foreach ($dados as $dds){
	        $data = array(
    	        'nome_tipo' => $dds['name'],
    	        'option_id' => $dds['option_id'],
    		    'option_value_id' => $dds['option_value_id'],
    		);
    		    
	        $this->db->where('option_value_id', $dds['option_value_id']);
	        $jaExiste = $this->db->get('tipo_produto')->row_array();
	        
	        if($jaExiste == null){
	            $this->db->insert('tipo_produto', $data);
	        }else{
    	        foreach($dadobanco as $dbd){
    	            if($dds['option_value_id'] == $dbd['option_value_id']){
    	                $this->db->where('option_value_id', $dds['option_value_id']); 
    	                $this->db->update('tipo_produto', $data); 
    	            }
    	            
    	        }
	        }
    	    
    		
    		
	    }
	    

	}
	
	public function addOpcoes($data){
    	$this->db->insert('tipo_produto', $data);
	 }
	    
    public function excluirOpcao($id){
	    $this->db->where('id_tipo', $id);
	    $this->db->delete('tipo_produto');
	}
	
	
	
}

?>