<?php

class Crudcompras extends MY_Model  {
    
    //Insere uma compra no banco de dados
    public function cadastrarCompra($idLista, $caixa){
        $compra = array(
            'data_compra' => date('d/m/Y'),
            'valor_compra' => 0,
            'aprovado_compra' => 0,
            'lista_id' => $idLista,
            'cliente_id' => 0,
            'loja_id' => 0,
            'funcionario_id' => 0,
            'caixa_id' => 0,
            'nota_venda' => "",
        );
        
        $this->db->insert('compras', $compra);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //Insere uma compra para troca no banco de dados
    public function cadastrarCompraTroca($compra){
        $this->db->insert('compras', $compra);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //Insere uma compra no banco de dados
    public function cadastrarCompraNormal($compra){
        $this->db->insert('compras', $compra);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //Atualiza uma compra baseada no id
	public function atualizarCompra($compra, $id){
	    $this->db->where('id_compra', $id);
	    $update = $this->db->update('compras', $compra);
	    
	    $this->db->where('id_compra', $id);
	    $compra = $this->db->get('compras');
	    $compra = $compra->row_array();
	    
	    return $compra['nota_venda'];
	}
	
	//Retorna todas as vendas
	public function getVendas(){
	    $vendas = $this->db->get('compras');
	    return $vendas->result_array();
	}
	
	//Retorna todas as vendas de um vendedor
	public function getCompras($idvendedor){
	    $this->db->where('funcionario_id', $idvendedor);
	    $compras = $this->db->get('compras');
	    
	    return $compras->result_array();
	}
	
	//Retorna todas as vendas de um vendedor
	public function getComprasLoja($idloja){
	    $this->db->where('loja_id', $idloja);
	    $compras = $this->db->get('compras');
	    
	    return $compras->result_array();
	}
    
    //Retorna todas as vendas que contém a $palavra
    public function getComprasPalavra($palavra){
       
    }
    
    //Retorna uma compra baseada no id
	public function getCompraId($id){
	    $this->db->where('id_compra', $id);
	    $compras = $this->db->get('compras');
	    
	    return $compras->row_array();
	}
	
	//Retorna uma compra baseada na  nota
	public function getCompraNota($nota){
	    $this->db->where('nota_venda', $nota);
	    $compras = $this->db->get('compras');
	    
	    return $compras->row_array();
	}
	
	//Retorna as compras baseadas na  nota
	public function getCompraNotas($nota){
	    $this->db->where('nota_venda', $nota);
	    $compras = $this->db->get('compras');
	    
	    return $compras->result_array();
	}
	
	//Retorna as compras ainda não aprovadas,
	//programadas para o dia atual e baseadas na loja
	public function getCompraParaDescontar($lojaid){
	    $this->db->where('loja_id', $lojaid);
	    $this->db->where('aprovado_compra', 0);
	    $this->db->where('data_compra', date('d/m/Y'));
	    
	    $compras = $this->db->get('compras');
	    
	    return $compras->result_array();
	}
	
	//Exclui uma compra baseada no id
    public function excluirCompraId($id){
        $this->db->where('id_compra', $id);
	    $this->db->delete('compras');
    }
    
    public function getComprasCliente($id){
	    $this->db->where('cliente_id', $id);
	    $compras = $this->db->get('compras');
	    return $compras->result_array();
	}
	
	public function getComprasCliente2($id){
	    $this->db->where('cliente_id', $id);
	    $compras = $this->db->get('compras');
	    $compras = $compras->result_array();
	    $aux = 0;
	    foreach($compras as $com){
	        $this->db->where('nota_venda', $com['nota_venda']);
	        $trocas = $this->db->get('trocas');
	        $trocas = $trocas->row_array();
	        if($trocas != null){
	            unset($compras[$aux]);
	        }
	        $aux++;
	    }
	    return $compras;
	}
	
	//Pega as 10 últimas compras do cliente
	public function getComprasClienteTroca($id){
	    $this->db->where('cliente_id', $id);
	    $this->db->order_by('id_compra', 'desc');
	    $compras = $this->db->get('compras');
	    return $compras->result_array();
	}
    
    //SELECT `data_compra`, `valor_compra` FROM `compras` WHERE `aprovado_compra` = "1" AND `data_compra` like '%/07/%' order by 'ASC'
    //Retorna uma compra baseada no Mes
	public function getCompraMes($mes){
	    $m = '/'.$mes.'/';
	    $this->db->select('data_compra, valor_compra, loja_id');
	    $this->db->where('aprovado_compra', "1");
	    $this->db->like('data_compra', $m);
	    $this->db->order_by('data_compra', 'ASC');
	    $compras = $this->db->get('compras');
	    
	    return $compras->result_array();
	}
	
	public function getCompraMes2($mes, $idloja){
	    $m = '/'.$mes.'/';
	    $this->db->select('data_compra, valor_compra, loja_id');
	    $this->db->where('aprovado_compra', "1");
	    $this->db->where('loja_id', $idloja);
	    $this->db->like('data_compra', $m);
	    $this->db->order_by('data_compra', 'ASC');
	    $compras = $this->db->get('compras');
	    
	    return $compras->result_array();
	}

}

?>