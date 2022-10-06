<?php

class Caixamodel extends MY_Model  {
    
    //FUNÇÃO PARA PEGAR O CAIXA ABERTO DO BANCO DE DADOS
    public function pegarCaixaAberto(){
        $this->db->where('fechamento_caixa', null);
        $caixas = $this->db->get('caixa');
        return $caixas->row_array();
    }
    
    //FUNÇÃO PARA PEGAR OS CAIXAS ABERTOS DO BANCO DE DADOS
    //SELECT * FROM 'caixa' WHERE 'fechamento_caixa' is null OR 'reabertura_data' IS NOT null AND'refechamento_data' is NULL
    public function pegarCaixasAbertos(){
        $this->db->where('fechamento_caixa', null);
        $this->db->order_by('id_caixa', "DESC");
        $caixas = $this->db->get('caixa')->result_array();
        
        for($i=0; $i < count($caixas); $i++){
            if($caixas[$i]['loja_id'] != 0){
                $this->db->select("nome");
                $this->db->where('id', $caixas[$i]['loja_id']);
                $a = $this->db->get('loja')->row_array();
                $caixas[$i]['loja_id'] = $a['nome'];
            }else{
                $caixas[$i]['loja_id'] = "Geral";
            }
        }
        
        for($i=0; $i < count($caixas); $i++){
                $this->db->select("nome_funcionario");
                $this->db->where('id_funcionario', $caixas[$i]['funcionario_id']);
                $a = $this->db->get('funcionarios')->row_array();
                
            if($a){
                $caixas[$i]['funcionario_id'] = $a['nome_funcionario'];
            }else{
                $caixas[$i]['funcionario_id'] = "Administrador";
            }
        }
        
        return $caixas;
    }
    
    public function pegarCaixasAbertos2(){
        $this->db->where('fechamento_caixa !=', null);
        $this->db->where("reabertura_data !=", null);        
        $this->db->where("refechamento_data", null);
        $caixas = $this->db->get('caixa');
        return $caixas->result_array();
    }
    
    //FUNÇÃO PARA PEGAR O CAIXA ABERTO DE UMA LOJA ESPECÍFICA DO BANCO DE DADOS
    public function pegarCaixaAbertoLoja($idLoja){
        if($idLoja != 0){
            $this->db->where('loja_id', $idLoja);
            $this->db->where('fechamento_caixa', null);
        }
        $caixas = $this->db->get('caixa');
        return $caixas->row_array();
    }
    
    public function pegarCaixaAbertoLoja2($idLoja){
        $this->db->where('loja_id', $idLoja);
        $this->db->where('fechamento_caixa !=', null);
        $this->db->where("reabertura_data !=", null);
        $this->db->where("refechamento_data", null);
        $caixas = $this->db->get('caixa');
        return $caixas->row_array();
    }
    
    //função para pegar o caixa da loja e data
    public function pegarCaixaLojaData($idLoja, $data){
        $this->db->where('loja_id', $idLoja);
        $this->db->where('abertura_caixa', $data);
        $caixas = $this->db->get('caixa');
        return $caixas->row_array();
    }
    
    //FUNÇÃO PARA PEGAR O CAIXA ABERTO COM BASE NO ID DO BANCO DE DADOS
    public function pegarCaixaAbertoId($id){
        $this->db->where('id_caixa', $id);
        $this->db->where('fechamento_caixa', null);
        $caixas = $this->db->get('caixa');
        return $caixas->row_array();
    }
    
    public function pegarCaixaAbertoId2($id){
        $this->db->where('id_caixa', $id);
        $this->db->where('fechamento_caixa !=', null);
        $this->db->where("reabertura_data !=", null);
        $this->db->where("refechamento_data", null);
        $caixas = $this->db->get('caixa');
        return $caixas->row_array();
    }
    
    //FUNÇÃO PARA PEGAR CAIXA UNICO COM BASE NO ID E NA DATA
    public function pegarCaixaUnicoData($id, $data){
        $this->db->where('id_caixa', $id);
        $this->db->where('abertura_caixa', $data);
        $caixa = $this->db->get('caixa');
        return $caixa->row_array();
    }
    
    public function pegarCaixaUnicoData2($id, $data){
        $this->db->where('id_caixa', $id);
        $this->db->where('reabertura_data', $data);
        $caixa = $this->db->get('caixa');
        return $caixa->row_array();
    }
    
    //FUNÇÃO PARA PEGAR CAIXA UNICO
    public function pegarCaixaUnico($id){
        $this->db->where('id_caixa', $id);
        $caixa = $this->db->get('caixa');
        return $caixa->row_array();
    }
    
    //FUNÇÃO PARA PEGAR AS SANGRIAS
    public function pegarSangrias($id){
        $this->db->where('caixa_id', $id);
        $caixas = $this->db->get('sangria');
        return $caixas->result_array();
    }
    
    //FUNÇÃO PARA PEGAR AS SANGRIAS pela data
    public function pegarSangriasData($dt){
        $this->db->where('data_sangria', $dt);
        $sangrias = $this->db->get('sangria');
        return $sangrias->result_array();
    }
    
    //função que retorna todas as sangrias
    public function getSangrias(){
        $san = $this->db->get('sangria');
        
        return $san->result_array();
    }
    
    //FUNÇÃO PARA ABRIR UM NOVO CAIXA
    public function abrirCaixa($valor, $limite, $loja){
        $caixa = array(
            'abertura_caixa' => date('d/m/Y'),
            'funcionario_id' => $this->session->userdata('func_id'),
            'troco_inicial' => $valor,
            'troco_atual' => $valor,
            'loja_id' => $this->session->userdata('loja_id'),
            'limite_caixa' => $limite
        );
        
	    $this->db->insert('caixa', $caixa);
	    $caixaid = $this->db->insert_id();
	   
		return $caixaid;
	}
	
	//FUNÇÃO PARA ABRIR UM NOVO CAIXA
    public function abrirCaixa2($valor, $limite, $loja){
        $caixa = array(
            'abertura_caixa' => date('d/m/Y'),
            'funcionario_id' => $this->session->userdata('id_pessoa'),
            'troco_inicial' => $valor,
            'troco_atual' => $valor,
            'loja_id' => $loja,
            'limite_caixa' => $limite
        );
        
	    $this->db->insert('caixa', $caixa);
	    $caixaid = $this->db->insert_id();
	   
		return $caixaid;
	}
	
	//FUNÇÃO PARA FECHAR UM CAIXA
	public function fecharCaixa($id, $caixa){
	    $caixa['fechamento_caixa'] = date('Y-m-d');
	    
	    $this->db->where('id_caixa', $id);
	    $update = $this->db->update('caixa', $caixa);
	    
	    return $update;
	}
	
	public function fecharCaixa2($id, $caixa){
	    $caixa['refechamento_data'] = date('d/m/Y');
	    
	    $this->db->where('id_caixa', $id);
	    $update = $this->db->update('caixa', $caixa);
	    
	    return $update;
	}
	
	//FUNÇÃO PARA ADICIONAR SANGRIA
	public function adicionarSangria($sangria, $troco, $id){
	    $this->db->insert('sangria', $sangria);
	    $sangriaid = $this->db->insert_id();
	    $this->atualizarTroco($troco, $id);
	   
		return $sangriaid;
	}
	
	//FUNÇÃO QUE VAI ATUALIZAR O TROCO ATUAL COM BASE NO VALOR DA SANGRIA
	public function atualizarTroco($troco, $id){
	    $this->db->where('id_caixa', $id);
	    $update = $this->db->update('caixa', $troco);
	}
	
	//função que vai pegar as devoluções de um caixa
	public function getDevoCaixa($id){
	    $this->db->where('caixa_id', $id);
	    $devos = $this->db->get('devolucao_caixa');
        return $devos->result_array();
	}
	
	//função que vai inserir uma nova devolução no bd
    public function insertDevo($devo){
        $this->db->insert('devolucao_caixa', $devo);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //função que vai inserir o produto de uma devolução
    public function insertProd($prod){
        $this->db->insert('item_devolucao_caixa', $prod);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //função que vai retornar uma unica devolução
    public function getDevoUnica($id){
        $this->db->where('id_dc', $id);
        $devo = $this->db->get('devolucao_caixa');
        
        return $devo->row_array();
    }
    
    public function getDevoCliente($id){
        $this->db->where('cliente_id', $id);
        $devo = $this->db->get('devolucao_caixa');
        
        return $devo->result_array();
    }
    
    //função que vai retornar os itens de uma devolução
    public function getItensDevo($id){
        $this->db->where('dc_id', $id);
        $devo = $this->db->get('item_devolucao_caixa');
        
        return $devo->result_array();
    }
    
    //função que vai editar uma devolução
    public function updateDevo($id, $devo){
        $this->db->where('id_dc', $id);
	    $update = $this->db->update('devolucao_caixa', $devo);
	    
	    return $update;
    }
    
    //função que vai retornar um item expecifico
    public function getItem($id){
        $this->db->where('id_idc', $id);
        $devo = $this->db->get('item_devolucao_caixa');
        
        return $devo->row_array();
    }
    
    //função que exclui um item
    public function deleteItem($id){
        $this->db->where('id_idc', $id);
	    $this->db->delete('item_devolucao_caixa');
    }
    
    public function getCaixaFechados($id){
        $this->db->where('fechamento_caixa !=', null);
        $this->db->where('reabertura_data', null);
        $this->db->where('loja_id', $id);
        $this->db->order_by('abertura_caixa', 'ASC');
	    $aux = $this->db->get('caixa');
	    return $aux->result_array();
    }
    
    public function getTodosCaixasFechados(){
        $this->db->where('fechamento_caixa !=', null);
        $this->db->where('reabertura_data', null);
        $this->db->order_by('abertura_caixa', 'ASC');
	    $aux = $this->db->get('caixa');
	    return $aux->result_array();
    }
    
    public function updateCaixaFechados($id, $motivo, $funcionario){
        $this->db->where('id_caixa', $id);
        $aux = $this->db->get('caixa')->row_array();
        
        $retorno = array(
            'abertura_caixa' =>$aux['abertura_caixa'],
            'fechamento_caixa' =>$aux['fechamento_caixa'],
            'funcionario_id' =>$aux['funcionario_id'],
            'troco_inicial' =>$aux['troco_inicial'],
            'troco_atual' =>$aux['troco_atual'],
            'loja_id' =>$aux['loja_id'],
            'limite_caixa' =>$aux['limite_caixa'],
            'reabertura_data' =>date('d/m/Y'),
            'motivo' =>$motivo,
            'reabertura_funcionario_id' =>$funcionario,
            );
        
        $this->db->where('id_caixa', $id);
        $this->db->update('caixa', $retorno);
        
    }
    
    
    // public function finalizaVenda($dados){

    //     $loja = $this->loja($dados['loja']);
    //     $a = explode("¬", $dados['qtd_lista']);
    //     $b = explode("¬", $dados['val_lista']);
    //     $c = explode("¬", $dados['id_lista']);
    //     $d = 0;
        
    //     if(strpos($dados['pagForm'], "¬") == true){
    //         $pag = explode("¬", $dados['pagForm']);
    //         $val = explode("¬", $dados['valForm']);
            
    //         for($i=0; $i<count($a); $i++){
    //             $d = $d + ($a[$i] * $b[$i]);
    //             $d = $d * (1 + ($z['acre']/100));
    //         }
                
    //         $acrescimo = array_sum($val) - $dados['val_lista'] - $dados['frete'];
    //         $frete = $dados['frete'];
        
    //         $this->db->select("nome_forma as forma");
    //         $this->db->where("id_forma", $pag[$j]);
    //         $k = $this->db->get("formas_pagamento")->row_array();
    //         $z = "Duas Formas - ".$k['forma']."(Total ".array_sum($val).")";
            
    //         $venda = array(
    //             'idClient'              => $dados['cliente_id'],                                                                //[idClient] => 1
    //             'idCarrinho'            => "000".rand(0, 99999999),                                                             //[idCarrinho] => 00070701746
    //             'cepCompra'             => $loja['cep'],                                                                        //[cepCompra] => 1234567    
    //             'numeroEndereco'        => $loja['numero'],                                                                     //[numeroEndereco] => 5100
    //             'formaEnvio'            => $dados['formaFrete'],                                                                //[formaEnvio] => Retirada em Loja
    //             'formaPagamento'        => $z,                                                                                  //[formaPagamento] => Venda Loja - Cartão Crédito(110,00) & Cartão Débito(5,82)
    //             'dataCompra'            => date("Y-m-d H:i:s"),                                                                 //[dataCompra] => 2022-05-08 23:26:45 
    //             'listProdutosId'        => $dados['id_lista'],                                                                  //[listProdutosId] => 1 
    //             'qtdProdutos'           => $dados['qtd_lista'],                                                                 //[qtdProdutos] => 1 
    //             'vlrProdutos'           => $dados['val_lista'],                                                                 //[vlrProdutos] => 110.00 
    //             'opProdutos'            => "padrão",                                                                            //[opProdutos] => padrão 
    //             'valorCompra'           => $val[$j],                                                                                  //[valorCompra] => 110 
    //             'valorFrete'            => $frete,                                                                     //[valorFrete] => 00 
    //             'valorAcrescimo'        => $acrescimo,                                                            //[valorAcrescimo] => 
    //             'statusCompra'          => 11,                                                                                  //[statusCompra] => 11 
    //             'statusEnvio'           => 15,
    //             'statusPagamento'       => 17,
    //             'codTransacao'          => null,
    //             'dataAlteracao'         => date("Y-m-d H:i:s"),                                                                 //[dataAlteracao] => 2022-05-08 23:26:45 
    //             'desconto'              => $dados['desc'],                                                                      //[desconto] => 0.00 
    //             'enderecoCompra'        => $loja['rua'].", nº ".$loja['numero']." - ".$loja['bairro']." / ".$loja['cidade'],    //[enderecoCompra] => Avenida Leopoldino de Oliveira, nº 5100 - centro / Ribeirão Preto 
    //             'authorization_code'    => null,
    //             'boleto_url'            => null,
    //             'boleto_barcode'        => null,
    //             'boleto_expiration_date'=> null,
    //             'loja_id'               => $loja['id'],                                                                         //[loja_id] => 26 
    //             'vendedor_id'           => $dados['vendedor'],                                                                  //[vendedor_id] => 58 
    //         );
    //         $venda['id'] = $this->gravaVenda($venda);  
            
    //     }else{
    //         for($i=0; $i<count($a); $i++){
    //             $d = $d + ($a[$i] * $b[$i]);
    //             $d = $d * (1 + ($z['acre']/100));
    //         }
        
    //         $this->db->select("nome_forma as forma");
    //         $this->db->where("id_forma", $dados['pagForm']);
    //         $k = $this->db->get("formas_pagamento")->row_array();
    //         $z = "Venda Loja - ".$k['forma'];
    //         $venda = array(
    //             'idClient'              => $dados['cliente_id'],                                                                //[idClient] => 1
    //             'idCarrinho'            => "000".rand(0, 99999999),                                                             //[idCarrinho] => 00070701746
    //             'cepCompra'             => $loja['cep'],                                                                        //[cepCompra] => 1234567    
    //             'numeroEndereco'        => $loja['numero'],                                                                     //[numeroEndereco] => 5100
    //             'formaEnvio'            => $dados['formaFrete'],                                                                //[formaEnvio] => Retirada em Loja
    //             'formaPagamento'        => $z,                                                                                  //[formaPagamento] => Venda Loja - Cartão Crédito(110,00) & Cartão Débito(5,82)
    //             'dataCompra'            => date("Y-m-d H:i:s"),                                                                 //[dataCompra] => 2022-05-08 23:26:45 
    //             'listProdutosId'        => $dados['id_lista'],                                                                  //[listProdutosId] => 1 
    //             'qtdProdutos'           => $dados['qtd_lista'],                                                                 //[qtdProdutos] => 1 
    //             'vlrProdutos'           => $dados['val_lista'],                                                                 //[vlrProdutos] => 110.00 
    //             'opProdutos'            => "padrão",                                                                            //[opProdutos] => padrão 
    //             'valorCompra'           => $d,                                                                                  //[valorCompra] => 110 
    //             'valorFrete'            => $dados['frete'],                                                                     //[valorFrete] => 00 
    //             'valorAcrescimo'        => $dados['valorAcrescimo'],                                                            //[valorAcrescimo] => 
    //             'statusCompra'          => 11,                                                                                  //[statusCompra] => 11 
    //             'statusEnvio'           => 15,
    //             'statusPagamento'       => 17,
    //             'codTransacao'          => null,
    //             'dataAlteracao'         => date("Y-m-d H:i:s"),                                                                 //[dataAlteracao] => 2022-05-08 23:26:45 
    //             'desconto'              => $dados['desc'],                                                                      //[desconto] => 0.00 
    //             'enderecoCompra'        => $loja['rua'].", nº ".$loja['numero']." - ".$loja['bairro']." / ".$loja['cidade'],    //[enderecoCompra] => Avenida Leopoldino de Oliveira, nº 5100 - centro / Ribeirão Preto 
    //             'authorization_code'    => null,
    //             'boleto_url'            => null,
    //             'boleto_barcode'        => null,
    //             'boleto_expiration_date'=> null,
    //             'loja_id'               => $loja['id'],                                                                         //[loja_id] => 26 
    //             'vendedor_id'           => $dados['vendedor'],                                                                  //[vendedor_id] => 58 
    //         );
    //         $venda['id'] = $this->gravaVenda($venda);
    //     }
        
    //     $a = explode("¬", $dados['id_lista']);
    //     $b = explode("¬", $dados['qtd_lista']);
        
    //     for($i=0; $i<count($a); $i++){
            
    //         $this->db->select('produto_nome');
    //         $this->db->where('produto_id', $a[$i]);
    //         $z = $this->db->get('produtos')->row_array();
            
    //         $this->db->where('estoque_loja', $loja['id']);
    //         $this->db->where('estoque_produto', $z['produto_nome']);
    //         $this->db->order_by('estoque_id', 'DESC');
    //         $h = $this->db->get('estoque')->row_array();
            
    //         $estoque = array(
    //             'estoque_data'      => date('Y-m-d H:i:s'), 
    //             'estoque_loja'      => $loja['id'], 
    //             'estoque_produto'   => $h['estoque_produto'],
    //             'estoque_quantidade'=> ($b[$i])-1, 
    //             'estoque_tipo'      => "Venda", 
    //             'estoque_valor'     => $h['estoque_valor'], 
    //             'estoque_desc'      => 0, 
    //             'valor_antigo'      => $h['valor_antigo'],
    //         );
    //         $this->db->insert("estoque", $estoque);
    //     }
        
    //     return $venda;
    // }
    
    public function finalizaVenda($dados){

        $loja = $this->loja($dados['loja']);
        $a = explode("¬", $dados['qtd_lista']);
        $b = explode("¬", $dados['val_lista']); 
        $c = explode("¬", $dados['id_lista']); # STR = 0¬0¬56¬230¬324
        $d = 0;
        
        if(strpos($dados['pagForm'], "¬") == true){
            $pag = explode("¬", $dados['pagForm']);
            $val = explode("¬", $dados['valForm']);
            
            for($i=0; $i<count($a); $i++){
                $d = $d + ($a[$i] * $b[$i]);
                $d = $d * (1 + ($z['acre']/100));
            }
            $acrescimo = array_sum($val) - (array_sum($b) - $dados['desc'] - dados['frete']);
            $frete = $dados['frete'];
                
            $z = "Duas Formas - ";
            for($j=0; $j<count($pag); $j++){
                $this->db->select("nome_forma as forma");
                $this->db->where("id_forma", $pag[$j]);
                $k = $this->db->get("formas_pagamento")->row_array();
                if($j == 1)
                    $z .= " & ";
                 $z .= $k['forma']."(R$ ".number_format($val[$j], 2, '.',',').")";
            }
            
            $venda = array(
                'idClient'              => $dados['cliente_id'],                                                                //[idClient] => 1
                'idCarrinho'            => "000".rand(0, 99999999),                                                             //[idCarrinho] => 00070701746
                'cepCompra'             => $loja['cep'],                                                                        //[cepCompra] => 1234567    
                'numeroEndereco'        => $loja['numero'],                                                                     //[numeroEndereco] => 5100
                'formaEnvio'            => $dados['formaFrete'],                                                                //[formaEnvio] => Retirada em Loja
                'formaPagamento'        => $z,                                                                                  //[formaPagamento] => Venda Loja - Cartão Crédito(110,00) & Cartão Débito(5,82)
                'dataCompra'            => date("Y-m-d H:i:s"),                                                                 //[dataCompra] => 2022-05-08 23:26:45 
                'listProdutosId'        => $dados['id_lista'],                                                                  //[listProdutosId] => 1 
                'qtdProdutos'           => $dados['qtd_lista'],                                                                 //[qtdProdutos] => 1 
                'vlrProdutos'           => $dados['val_lista'],                                                                 //[vlrProdutos] => 110.00 
                'opProdutos'            => "padrão",                                                                            //[opProdutos] => padrão 
                'valorCompra'           => $d,                                                                                  //[valorCompra] => 110 
                'valorFrete'            => $frete,                                                                              //[valorFrete] => 00 
                'valorAcrescimo'        => $acrescimo,                                                                          //[valorAcrescimo] => 
                'statusCompra'          => 11,                                                                                  //[statusCompra] => 11 
                'statusEnvio'           => 15,
                'statusPagamento'       => 17,
                'codTransacao'          => null,
                'dataAlteracao'         => date("Y-m-d H:i:s"),                                                                 //[dataAlteracao] => 2022-05-08 23:26:45 
                'desconto'              => $dados['desc'],                                                                      //[desconto] => 0.00 
                'enderecoCompra'        => $loja['rua'].", nº ".$loja['numero']." - ".$loja['bairro']." / ".$loja['cidade'],    //[enderecoCompra] => Avenida Leopoldino de Oliveira, nº 5100 - centro / Ribeirão Preto 
                'authorization_code'    => null,
                'boleto_url'            => null,
                'boleto_barcode'        => null,
                'boleto_expiration_date'=> null,
                'loja_id'               => $loja['id'],                                                                         //[loja_id] => 26 
                'vendedor_id'           => $dados['vendedor'],                                                                  //[vendedor_id] => 58
                'duasFormasP'           => $dados['pagForm'], 
                'duasValP'              => $dados['valForm'], 
            );
            $venda['id'] = $this->gravaVenda($venda);
        }else{
            for($i=0; $i<count($a); $i++){
                $d = $d + ($a[$i] * $b[$i]);
                $d = $d * (1 + ($z['acre']/100));
            }
        
            $this->db->select("nome_forma as forma");
            $this->db->where("id_forma", $dados['pagForm']);
            $k = $this->db->get("formas_pagamento")->row_array();
            $z = "Venda Loja - ".$k['forma'];
            $venda = array(
                'idClient'              => $dados['cliente_id'],                                                                //[idClient] => 1
                'idCarrinho'            => "000".rand(0, 99999999),                                                             //[idCarrinho] => 00070701746
                'cepCompra'             => $loja['cep'],                                                                        //[cepCompra] => 1234567    
                'numeroEndereco'        => $loja['numero'],                                                                     //[numeroEndereco] => 5100
                'formaEnvio'            => $dados['formaFrete'],                                                                //[formaEnvio] => Retirada em Loja
                'formaPagamento'        => $z,                                                                                  //[formaPagamento] => Venda Loja - Cartão Crédito(110,00) & Cartão Débito(5,82)
                'dataCompra'            => date("Y-m-d H:i:s"),                                                                 //[dataCompra] => 2022-05-08 23:26:45 
                'listProdutosId'        => $dados['id_lista'],                                                                  //[listProdutosId] => 1 
                'qtdProdutos'           => $dados['qtd_lista'],                                                                 //[qtdProdutos] => 1 
                'vlrProdutos'           => $dados['val_lista'],                                                                 //[vlrProdutos] => 110.00 
                'opProdutos'            => "padrão",                                                                            //[opProdutos] => padrão 
                'valorCompra'           => $d,                                                                                  //[valorCompra] => 110 
                'valorFrete'            => $dados['frete'],                                                                     //[valorFrete] => 00 
                'valorAcrescimo'        => $dados['valorAcrescimo'],                                                            //[valorAcrescimo] => 
                'statusCompra'          => 11,                                                                                  //[statusCompra] => 11 
                'statusEnvio'           => 15,
                'statusPagamento'       => 17,
                'codTransacao'          => null,
                'dataAlteracao'         => date("Y-m-d H:i:s"),                                                                 //[dataAlteracao] => 2022-05-08 23:26:45 
                'desconto'              => $dados['desc'],                                                                      //[desconto] => 0.00 
                'enderecoCompra'        => $loja['rua'].", nº ".$loja['numero']." - ".$loja['bairro']." / ".$loja['cidade'],    //[enderecoCompra] => Avenida Leopoldino de Oliveira, nº 5100 - centro / Ribeirão Preto 
                'authorization_code'    => null,
                'boleto_url'            => null,
                'boleto_barcode'        => null,
                'boleto_expiration_date'=> null,
                'loja_id'               => $loja['id'],                                                                         //[loja_id] => 26 
                'vendedor_id'           => $dados['vendedor'],                                                                  //[vendedor_id] => 58 
            );
            $venda['id'] = $this->gravaVenda($venda);
        }
        
        $a = explode("¬", $dados['id_lista']);
        $b = explode("¬", $dados['qtd_lista']);
        
        for($i=0; $i<count($a); $i++){
            
            $this->db->select('produto_nome');
            $this->db->where('produto_id', $a[$i]);
            $z = $this->db->get('produtos')->row_array();
            
            $this->db->where('estoque_loja', $loja['id']);
            $this->db->where('estoque_produto', $z['produto_nome']);
            $this->db->order_by('estoque_id', 'DESC');
            $h = $this->db->get('estoque')->row_array();
            
            $estoque = array(
                'estoque_data'      => date('Y-m-d H:i:s'), 
                'estoque_loja'      => $loja['id'], 
                'estoque_produto'   => $h['estoque_produto'],
                # POR QUÊ ??
                //'estoque_quantidade'=> ($b[$i])-1, 
                'estoque_quantidade'=> -($b[$i]), 
                'estoque_tipo'      => "Venda", 
                'estoque_valor'     => $h['estoque_valor'], 
                'estoque_desc'      => 0, 
                'valor_antigo'      => $h['valor_antigo'],
            );
            $this->db->insert("estoque", $estoque);
        }
        
        return $venda;
    }
    
    public function gravaVenda($dados){
        $this->db->insert('historicocompras', $dados);
        return $this->db->insert_id();
    }
    
    public function loja($id){
        $this->db->where("id", $id);
        $a = $this->db->get("loja")->row_array();
        return $a;
    }
    
    public function pegaLoja($id=null){
        if($id!= null){
            $this->db->where("id", $id);
        }
        $a =  $this->db->get('loja');
        return $a->result_array();
    }
    
    public function pegaVendedor($loja = null){
        if($loja != null){
            $this->db->where("loja_id", $loja);
        }
        return $this->db->get("funcionarios")->result_array();
    }
    
    public function produtoTroca($id, $loja){
        
        $this->db->select('produto_id, produto_nome, produto_modelo');
        $this->db->where("produto_id", $id);
        $a = $this->db->get('produtos')->row_array();
        
        $this->db->select("sum(estoque_quantidade) as estoque_quantidade");
        $this->db->where('estoque_loja =', $loja);
        $this->db->where('estoque_produto =', $a['produto_nome']);
        $this->db->group_by("estoque_produto");
        $b = $this->db->get('estoque')->row_array();
        if($b){
            $quantidade = $b['estoque_quantidade'];
        }else{
            $quantidade = 0;
        }
        
        $this->db->select("estoque_valor");
        $this->db->where('estoque_loja', $loja);
        $this->db->where('estoque_produto =', $a['produto_nome']);
        $this->db->order_by('estoque_id', 'DESC');
        $c = $this->db->get('estoque')->row_array();
        if($c){
            $valor = $c['estoque_valor'];
        }else{
            $valor = 0.0;
        }
        
        $produto = array(
            'produto_id'=> $a['produto_id'],
            'nome'      => $a['produto_nome'],
            'modelo'    => $a['produto_modelo'],
            'valor'     => $valor,
            'estoque'   => $quantidade,
        );
        
        return $produto;
    }
    
    public function gravaTroca($dados){
        
        $somaNovoVal = $listaNovosQtd = $listaNovosVal = $listaNovosProd = $listaQtd = $listaProdutos = $listaValor = "";
        for($i = 0; $i<count($dados['trocaProduto']); $i++){
            if($i != 0 ){
                $listaProdutos  .= '¬';
                $listaValor     .= '¬';
                $listaQtd       .= '¬';
            }
            
            $listaProdutos  .= $dados['trocaProduto'][$i];
            $listaValor     .= $dados['valorTroca'][$i];
            $listaQtd       .= 1;
        }
        
        for($i = 0; $i<count($dados['trocaNovoProdID']); $i++){
            if($i != 0 ){
                $listaNovosVal      .= '¬';
                $listaNovosQtd      .= '¬';
            }
            $listaNovosVal  .= number_format($dados['trocaValorNovo'][$i], 2, '.',',');
            $listaNovosQtd  .= 1;
            
            $somaNovoVal += number_format($dados['trocaValorNovo'][$i], 2, '.',',');
        }
        $desc = number_format($somaNovoVal - $dados['trocaDiferenca'], 2, '.',',');
        
        $z = "Troca Loja - ";
        if(!isset($dados['pagamentoTroca'])){
            $this->db->select("nome_forma as forma, acrescimo_forma as acre, id_forma");
            $this->db->where("id_forma", 4);
            $k = $this->db->get("formas_pagamento")->row_array();
            $z .= $k['forma'];
        }else{
            $this->db->select("nome_forma as forma, acrescimo_forma as acre, id_forma");
            $this->db->where("id_forma", $dados['pagamentoTroca']);
            $k = $this->db->get("formas_pagamento")->row_array();
            $z .= $k['forma'];
        }
        
        $loja = $this->loja($dados['lojaId']);
        $troca = array(
            'troca_ClienteID' => intval($dados['clienteId']),
            'troca_produtosLista'   => $dados['listTroca'],
            'troca_produtoEntrada'  => $listaProdutos,
            'troca_valorLista'      => $listaNovosVal,
            'troca_diferenca'       => $dados['trocaDiferenca'],
            'troca_diferPagam'      => $k['id_forma'],
            'troca_obs'             => $dados['trocaObs'],
            'troca_loja_id'         => $dados['lojaId'],
            'troca_data'            => date('Y-m-d'),
        );
        $this->db->insert('trocas', $troca);
        
        $listaHelp = explode("¬", $dados['listTroca']);

        $vendaDiff = array(
            'idClient'          => $dados['clienteId'], 
            'idCarrinho'        => "trocaPDV", 
            'cepCompra'         => $loja['cep'], 
            'numeroEndereco'    => $loja['numero'], 
            'formaEnvio'        => "Retirada em Loja", 
            'formaPagamento'    => $z, 
            'dataCompra'        => date("Y-m-d H:i:s"), 
            'listProdutosId'    => $dados['listTroca'], 
            'qtdProdutos'       => $listaNovosQtd, 
            'vlrProdutos'       => $listaNovosVal, 
            'opProdutos'        => 0, 
            'valorCompra'       => number_format($somaNovoVal, 2, '.',','), 
            'valorFrete'        => 0.00, 
            'statusCompra'      => 28, 
            'statusEnvio'       => 15, 
            'statusPagamento'   => 28, 
            'codTransacao'      => "", 
            'dataAlteracao'     => date("Y-m-d H:i:s"),  
            'desconto'          => $desc, 
            'enderecoCompra'    => $loja['rua'].", nº ".$loja['numero']." - ".$loja['bairro']." / ".$loja['cidade'],
            'loja_id'           => $dados['lojaId'], 
            'vendedor_id'       => $dados['vendedorId'], 
        );
        $this->db->insert('historicocompras', $vendaDiff);
        $returno['id'] = $this->db->insert_id();
            
        for($i=0; $i<count($listaHelp); $i++){
            $this->db->select('produto_nome');
            $this->db->where('produto_id', $listaHelp[$i]);
            $p = $this->db->get('produtos')->row_array();
            
            $this->db->where('estoque_loja', $dados['lojaId']);
            $this->db->where('estoque_produto', $p['produto_nome']);
            $this->db->order_by('estoque_id', 'DESC');
            $this->db->limit(1);
            $a = $this->db->get('estoque')->row_array();
            
            $estoque = array(
                'estoque_data'      => date('Y-m-d H:i:s'),
                'estoque_loja'      => $dados['lojaId'],
                'estoque_produto'   => $p['produto_nome'],
                'estoque_quantidade'=> 1,
                'estoque_tipo'      => 'Troca',
                'estoque_valor'     => $a['estoque_valor'],
                'estoque_desc'      => 0,
                'valor_antigo'      => $a['valor_antigo']
            );
            
            $this->db->insert('estoque', $estoque);
        }
        return $returno;
	}
    
    public function caixas(){
        $this->db->select('abertura_caixa as abertura, loja_id as loja, funcionario_id as funcionario');
        $a = $this->db->get('caixa')->result_array();
        
        
        for($i = 0; $i<count($a); $i++){
            
            $this->db->where('id', $a[$i]['loja']);
            $b = $this->db->get('loja')->row_array();
            if($b){
                $a[$i]['loja'] = $b['nome'];
            }else{
                $a[$i]['loja'] = "Não Informado";
            }
            if($a[$i]['funcionario'] != 0){
                $this->db->where('id_funcionario', $a[$i]['funcionario']);
                $c = $this->db->get('funcionarios')->row_array();
                if($c){
                $a[$i]['funcionario'] = $c['nome_funcionario'];
                }else{
                    $a[$i]['funcionario'] = "Não Informado";
                }
            }else{
                $a[$i]['funcionario'] = "Administrador";
            }
            //SELECT SUM('valorCompra') FROM 'historicocompras' WHERE 'loja_id' = 25 AND 'dataCompra' BETWEEN "2021-11-20 00:00:00" AND "2021-11-20 23:59:59"
            $aberto  = date("Y-m-d 00:00:00", strtotime($a[$i]['abertura']));
            $fechado = date("Y-m-d 23:59:59", strtotime($a[$i]['abertura']));
            
            $this->db->select("SUM('valorCompra') as valor");
            $this->db->where("loja_id", $a[$i]['loja']);
            $this->db->where("'dataCompra >=", $aberto);
            $this->db->where("'dataCompra <=", $fechado);
            $d = $this->db->get('historicocompras')->row_array();
            $a[$i]['valor'] = $d['valor'];
        }
        
        return $a;
    }
    
    public function devolucoes(){
        
        $a = $this->db->get('trocas')->result_array();
        
        /*[0] => Array ( 
        [troca_id] => 1 
        [troca_diferenca] => 327.00 
        [troca_diferPagam] => 4 
        [troca_obs] => Teste ) )
        */
        
        for($i=0; $i<count($a); $i++){
            $a[$i]['produtos'] = $a[$i]['modelos'] = "";
            $b = explode("¬", $a[$i]['troca_produtosLista']);
            for($j=0; $j<count($b); $j++){
                $this->db->select('produto_nome as nome, produto_modelo as modelo');
                $this->db->where('produto_id', $b[$j]);
                $z = $this->db->get('produtos')->row_array();
                if($j != 0 ){
                    $a[$i]['produtos'] .= " & ";
                    $a[$i]['modelos'] .= " & ";
                }
                $a[$i]['produtos'] .= $z['nome'];
                $a[$i]['modelos'] .= $z['modelo'];
            }
            
            $this->db->where('id_forma', $a[$i]['troca_diferPagam']);
            $w = $this->db->get('formas_pagamento')->row_array();
            $a[$i]['troca_diferPagam'] = $w['nome_forma'];
        
            $c = explode("¬", $a[$i]['troca_valorLista']);
            $a[$i]['valoresUn'] = implode(" & ", $c);
        }
        return $a;
    }
    
    function verificaUsuario1($dados){
        $this->db->where("login_usuario", $dados['usuario']);
        $this->db->where("senha_usuario", md5($dados['senha']));
        $a = $this->db->get('usuarios')->result_array();
        
        if(count($a) == 1){
            $this->cancelaUltimo();
            return "Confere";
        }else{
            return "erro";
        }
    }
    
    function verificaUsuario2($dados){
        $this->db->where("login_usuario", $dados['usuario']);
        $this->db->where("senha_usuario", md5($dados['senha']));
        $a = $this->db->get('usuarios')->result_array();
        
        if(count($a) == 1){
            $this->fechacaixa();
            return "Confere";
        }else{
            return "erro";
        }
    }
    
    function fechacaixa(){
        
    }
    
    function cancelaUltimo(){
        $this->db->where("loja_id", $this->session->userdata("loja_id"));
        $this->db->order_by('idcompra', 'DESC');
        $a = $this->db->get('historicocompras')->row_array();
        
        $a['formaPagamento'] = "Venda Loja - Cancelada";
        $a['statusCompra'] = 7;
        $a['statusEnvio'] = 26;
        $a['statusPagamento'] = 18;
        
        $this->db->where('idcompra', $a['idcompra']);
        $this->db->replace('historicocompras', $a);
    }
    
    public function lojaCupom($id){
        $this->db->where("idcompra", $id);
        $a =  $this->db->get('historicocompras')->row_array();
        
        if($a != null) {
             $z = explode("¬", $a['listProdutosId']);
            $w = explode("¬", $a['qtdProdutos']);
            $x = explode("¬", $a['vlrProdutos']);
            
            for($i=0; $i<count($z); $i++){
                $auxVT = $w[$i] * $x[$i];
                
                $this->db->select("produto_nome as nome, produto_modelo as modelo");
                $this->db->where("produto_id", $z[$i]);
                $prod = $this->db->get('produtos')->row_array();
                
                $b[$i] = array(
                    'produto'   => $prod['nome'],
                    'modelo'    => $prod['modelo'],
                    'qtd'       => $w[$i],
                    'valUn'     => $x[$i],
                    'valTot'    => $auxVT,
                    );
            }
            
            $this->db->where("id", $a['loja_id']);
            $c = $this->db->get('loja')->row_array();
            
            $this->db->select("nome_funcionario");
            $this->db->where("id_funcionario", $a['vendedor_id']);
            $d = $this->db->get('funcionarios')->row_array();
            
            $this->db->select("cliente_nome, cliente_endereco, cliente_numero, cliente_cidade, cliente_bairro, cliente_estado");
            $this->db->where("cliente_id", $a['idClient']);
            $e = $this->db->get('cliente')->row_array();
            
            $dados = array(
                'venda'     => $b,
                'loja'      => $c,
                'vendedor'  => $d['nome_funcionario'],
                'cliente'   => $e,
                'pagamento' => substr($a['formaPagamento'], 12),
                'desconto'  => $a['desconto'],
                'acrescimo' => $a['valorAcrescimo'],
                'frete'     => $a['valorFrete'],
                'lastValue' => $a['valorCompra'] + $a['valorFrete'] + $a['valorAcrescimo'] - $a['desconto'] ,
            );
            
            return $dados;
        } else {
            return null;
        }
       
    }
    
    public function lojaCupom2($id){
        $dataInicio = date('Y-m-d 00:00:00');
        $dataFim = date('Y-m-d 23:59:59');
        $this->db->where("loja_id", $id);
        $this->db->where("dataCompra >= ", $dataInicio);
        $this->db->where("dataCompra <= ", $dataFim);
        $this->db->where("loja_id", $id);
        $a =  $this->db->get('historicocompras')->row_array();
        
        $z = explode("¬", $a['listProdutosId']);
        $w = explode("¬", $a['qtdProdutos']);
        $x = explode("¬", $a['vlrProdutos']);
        
        for($i=0; $i<count($z); $i++){
            $auxVT = $w[$i] * $x[$i];
            
            $this->db->select("produto_nome as nome, produto_modelo as modelo");
            $this->db->where("produto_id", $z[$i]);
            $prod = $this->db->get('produtos')->row_array();
            
            $b[$i] = array(
                'produto'   => $prod['nome'],
                'modelo'    => $prod['modelo'],
                'qtd'       => $w[$i],
                'valUn'     => $x[$i],
                'valTot'    => $auxVT,
                );
        }
        
        $this->db->where("id", $id);
        $c = $this->db->get('loja')->row_array();
        
        $this->db->select("nome_funcionario");
        $this->db->where("id_funcionario", $a['vendedor_id']);
        $d = $this->db->get('funcionarios')->row_array();
        
        $this->db->select("cliente_nome");
        $this->db->where("cliente_id", $a['idClient']);
        $e = $this->db->get('cliente')->row_array();

        $dados = array(
            'venda'     => $b,
            'loja'      => $c,
            'vendedor'  => $d['nome_funcionario'],
            'cliente'   => $e['cliente_nome'],
            'pagamento' => substr($a['formaPagamento'], 12),
            'lastValue'=> $a['valorCompra'],
        );
        
        return $dados;
    }
    
    function vendasDia($id){
        $this->db->select("idcompra as id, vendedor_id as vendedor, idClient as cliente, valorCompra as valor, formaPagamento as pagamento, loja_id as loja");
        if($id != 0){
            $this->db->where("loja_id", $id);
        }
        $this->db->where("dataCompra >=", date('Y-m-d 00:00:00'));
        $this->db->where("dataCompra <=", date('Y-m-d 23:59:59'));
        $this->db->order_by('idcompra', 'DESC');
        $a = $this->db->get('historicocompras')->result_array();
        
        for($i = 0; $i<count($a); $i++){
            $this->db->select("nome_funcionario");
            $this->db->where("id_funcionario", $a[$i]['vendedor']);
            $b = $this->db->get('funcionarios')->row_array();
            $a[$i]['vendedor'] = $b['nome_funcionario'];
        }
        
        for($i = 0; $i<count($a); $i++){
            $this->db->select("cliente_nome");
            $this->db->where("cliente_id", $a[$i]['cliente']);
            $c = $this->db->get('cliente')->row_array();
            $a[$i]['cliente'] = $c['cliente_nome'];
        }
        
        for($i = 0; $i<count($a); $i++){
            $this->db->select("nome");
            $this->db->where("id", $a[$i]['loja']);
            $d = $this->db->get('loja')->row_array();
            //$a[$i]['loja'] = $d['nome'];
            //$a[$i]['multi'] = true;
        }
        
        return $a;
    }
    
    public function formasCash($id){
        $dateI = date('Y-m-d 00:00:00');
        $dateF = date('Y-m-d 23:59:59');
        
        $this->db->select('sum(valorCompra) as valor, formaPagamento as forma');
        $this->db->where('dataCompra >', $dateI);
        $this->db->where('dataCompra <', $dateF);
        $this->db->where('loja_id', $id);    
        $this->db->group_by('formaPagamento');
        $a = $this->db->get('historicocompras')->result_array();
        
        for($i=0; $i<count($a); $i++){
            $a[$i]['forma'] = str_replace("Venda Loja -", "", $a[$i]['forma']);
        }
        
        return $a;
    }
    
    function rides_array($parameter, $value){
        $result = [];
        if($value != null && $value != ""){
            if(strpos($value, $parameter) == true){
                $result = explode($parameter, $value);
            } else {
                $result[0] = $value;
            }
        } else {
            $result[0] = null;
        }
        return $result;
    }
    
}