<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dependentes extends CI_Model {
    
    public function cadastraPdv($idcliente, $dados){
        if(!empty($dados)){
        $dados = array(        
            'dpd_nome'          => $dados['nome'],
            'dpd_cliente_id'    => $idcliente,
            'dpd_senha'         => null,
            'dpd_nascimento'    => null,
            'dpd_cep'           => $dados['cep'],
            'dpd_endereco'      => $dados['logra'],
            'dpd_numero'        => $dados['endnum'],
            'dpd_cidade'        => $dados['cidade'],
            'dpd_bairro'        => null,
            'dpd_estado'        => $dados['estado'],
            'dpd_email'         => $dados['email'],
            'dpd_telefone'      => $dados['telefone'],
            'dpd_genero'        => null,
            'dpd_ativo'         => 1,
            'dpd_complemento'   => null,
            'dpd_datacadastro'  => date("Y-m-d"),
            'dpd_loja'          => $dados['loja'],
        );
        $this->db->insert("dependentesTie", $dados);
        
        $this->db->where('dpd_id', $this->db->insert_id);
        return $this->db->get('dependentesTie');
        }else{
            return null;
        }
        return $dados;
        
    }
    
    public function insert($new){
        $this->db->insert('dependentesTie', $new);
        return $this->db->insert_id();
    }
    
    public function update($id, $new){
        $this->db->where('dpd_id', $id);
        $this->db->update('dependentesTie', $new);
    }
    
    public function getCEP($cep){
        $this->db->where('cep', $cep);
        return $this->db->get('cep')->row_array();
    }
    
    public function excluirdependente($id){
        $this->db->where('dpd_id', $id);
        $this->db->delete('dependentesTie');
    }
    
    public function get($id){
        $this->db->where('dpd_id', $id);
        $data = $this->db->get('dependentesTie');
        return $data->row_array();
    }
    
    public function getNumero($id){
        $this->db->select('dpd_numero');
        $this->db->where('dpd_id', $id);
        $data = $this->db->get('dependentesTie');
        return $data->row_array();
    }
    
    public function getdependenteById($id){
        $this->db->select('dpd_id, dpd_nome, dpd_telefone, dpd_email');
        $this->db->where('dpd_id', $id);
        $data = $this->db->get('dependentesTie');
        return $data->row_array();
    }
    
    public function getAll($idcliente){
        $this->db->where('dpd_cliente_id', $idcliente);
        $data = $this->db->get('dependentesTie');
        return $data->result_array();
    }
    
    public function getSenha($senha){
        $this->db->where('dpd_senha', $senha);
        $data = $this->db->get('dependentesTie');
        return $data->row_array();
    }
    
    public function getAllDependentes($idcliente){
        //$this->db->select('dpd_id, dpd_nome, dpd_cidade, dpd_email, dpd_telefone, dpd_ativo, dpd_loja');
        $this->db->where('dpd_chave', $idcliente);
        $this->db->order_by('dpd_id', 'desc');
        //$this->db->limit($limit, $start);
        $data = $this->db->get('dependentesTie')->result_array();
        for($i=0; $i<count($data); $i++){
            
            $url = "https://viacep.com.br/ws/". $data[$i]['dpd_cep'] ."/json/";
        	$curl = curl_init($url);
        	curl_setopt($curl, CURLOPT_URL, $url);
        	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        	$viacep = curl_exec($curl);
        	$logra = json_decode($viacep, true);
            if($data[$i]['dpd_cep'] != ""){
                $data[$i]['dpd_cep'] =  $logra['logradouro'].", nº ".$data[$i]['dpd_num']." | ".$logra['bairro']." - ".$logra['localidade']."/".$logra['uf']." - CEP:".$logra['cep'];
            }else{
                $data[$i]['dpd_cep'] = "Não Cadastrado ";
            }
        	
        }
        
        return $data;
    }
    
    public function get_count($idcliente) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->where('dpd_cliente_id', $idcliente);
        $a = $this->db->get('dependentesTie')->row_array();
        return $a['pages'];
    }
    
    public function getAllDependentesFiltro($idcliente, $filter, $limit, $start){
        $this->db->select('dpd_id, dpd_nome, dpd_cidade, dpd_email, dpd_telefone, dpd_ativo');
        $this->db->join('status_dependente', 'dependentesTie.dpd_ativo = status_dependente.status_id');
        $this->db->where('dpd_cliente_id', $idcliente);
        $this->db->like('dpd_nome', $filter, 'both');
        $this->db->or_like('dpd_cidade', $filter, 'both');
        $this->db->or_like('dpd_email', $filter, 'both');
        $this->db->or_like('dpd_telefone', $filter, 'both');
        $this->db->or_like('dpd_ativo', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        $this->db->order_by('dpd_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('dependentesTie');
        return $data->result_array();
    }
    
    public function get_countFiltro($idcliente, $filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->where('dpd_cliente_id', $idcliente);
        $this->db->like('dpd_nome', $filter, 'both');
        $this->db->or_like('dpd_cidade', $filter, 'both');
        $this->db->or_like('dpd_email', $filter, 'both');
        $this->db->or_like('dpd_telefone', $filter, 'both');
        $this->db->or_like('dpd_ativo', $filter, 'both');
        $a = $this->db->get('dependentesTie')->row_array();
        return $a['pages'];
    }
    
    public function relatoriodependentes(){
        return $this->db->get('dependentesTie')->result_array();
    }
    
    public function relatoriodependentesFiltros($filtros){
        if($filtros['datainicio']){
            $this->db->where('dpd_datacadastro >=', $filtros['datainicio']);
        }
        if($filtros['datafim']){
            $this->db->where('dpd_datacadastro <=', $filtros['datafim']);
        }
        if($filtros['estado']){
            $this->db->where('dpd_estado', $filtros['estado']);
        }
        return $this->db->get('dependentesTie')->result_array();
    }
    
    public function relatoriodependentesDetalhado(){
        $todosdependentes = $this->db->get('dependentesTie')->result_array();
        
        $dependentes = [];
        $cont_dependentes = 0;
        $totalgeral = 0;
        
        foreach($todosdependentes as $c){
            $this->db->where('idClient', $c['dpd_id']);
            $historico = $this->db->get('historicocompras')->result_array();
            
            $pedidos_dependentes = [];
            $cont_pedido = 0;
            
            foreach($historico as $h){
                $produtos = [];
                $cont_produtos = 0;
                
                $aux_produtos = explode('¬', $h['listProdutosId']);
                $aux_quantidade = explode('¬', $h['qtdProdutos']);
                $aux_valor = explode('¬', $h['vlrProdutos']);
                
                foreach($aux_produtos as $p){
                    $this->db->select('produto_id, produto_nome, produto_codigo, produto_modelo');
                    $this->db->where('produto_id', $p);
                    $produto = $this->db->get('produtos')->row_array();
                    
                    $produtos[$cont_produtos] = array(
                        'produto_codigo'    => $produto['produto_codigo'],
                        'produto_nome'      => $produto['produto_nome'],
                        'produto_modelo'    => $produto['produto_modelo'],
                        'produto_valor'     => $aux_valor[$cont_produtos],
                        'produto_quantidade'=> $aux_quantidade[$cont_produtos],
                        
                    );
                    $cont_produtos++;
                }
                
                $totalgeral = $totalgeral + (($h['valorCompra'] + $h['valorFrete']) - $h['desconto']);
                
                $this->db->where('idStatusCompra', $h['statusPagamento']);
                $status = $this->db->get('statuscompras')->row_array();
                
                $pedidos_dependentes[$cont_pedido] = array(
                    'idpedido'  => $h['idcompra'],    
                    'dataCompra'=> $h['dataCompra'],   
                    'produtos'  => $produtos,
                    'status'    => $status['nomeStatusCompra'],
                    'forma'     => $h['formaPagamento'],
                    'total'     => $h['valorCompra'],
                    'frete'     => $h['valorFrete'],
                    'desconto'  => $h['desconto'],
                );
                $cont_pedido++;
            }
            
            $dependentes[$cont_dependentes] = array(
                'dpd_nome'          => $c['dpd_nome'],
                'dpd_endereco'      => $c['dpd_endereco'],
                'dpd_numero'        => $c['dpd_numero'],
                'dpd_complemento'   => $c['dpd_complemento'],
                'dpd_bairro'        => $c['dpd_bairro'],
                'dpd_cep'           => $c['dpd_cep'],
                'dpd_cidade'        => $c['dpd_cidade'],
                'dpd_estado'        => $c['dpd_estado'],
                'dpd_email'         => $c['dpd_email'],
                'dpd_telefone'      => $c['dpd_telefone'],
                'dpd_datacadastro'  => $c['dpd_datacadastro'],
                'pedidos'               => $pedidos_dependentes,
            );
            $cont_dependentes++;
        }
        
        $data['dependentes']   = $dependentes;
        $data['totalgeral'] = $totalgeral; 
        
        return $data;
    }
    
    public function relatoriodependentesDetalhadoFiltros($filtros){
        if($filtros['datainicio']){
            $this->db->where('dpd_datacadastro >=', $filtros['datainicio']);
        }
        if($filtros['datafim']){
            $this->db->where('dpd_datacadastro <=', $filtros['datafim']);
        }
        if($filtros['estado']){
            $this->db->where('dpd_estado', $filtros['estado']);
        }
        if($filtros['dependentesTie']){
            $this->db->where('dpd_id', $filtros['dependentesTie']);
        }
        
        $todosdependentes = $this->db->get('dependentesTie')->result_array();
        
        $dependentes = [];
        $cont_dependentes = 0;
        $totalgeral = 0;
        
        foreach($todosdependentes as $c){
            if($filtros['forma_pagamento']){
                $this->db->where('formaPagamento', $filtros['forma_pagamento']);
            }
            if($filtros['status']){
                $this->db->where('statusPagamento', $filtros['status']);    
            }
            $this->db->where('idClient', $c['dpd_id']);
            $historico = $this->db->get('historicocompras')->result_array();
            
            $pedidos_dependentes = [];
            $cont_pedido = 0;
            
            foreach($historico as $h){
                $produtos = [];
                $cont_produtos = 0;
                
                $aux_produtos = explode('¬', $h['listProdutosId']);
                $aux_quantidade = explode('¬', $h['qtdProdutos']);
                $aux_valor = explode('¬', $h['vlrProdutos']);
                
                foreach($aux_produtos as $p){
                    $this->db->select('produto_id, produto_nome, produto_codigo, produto_modelo');
                    $this->db->where('produto_id', $p);
                    $produto = $this->db->get('produtos')->row_array();
                    
                    if($produto){
                        $produtos[$cont_produtos] = array(
                            'produto_codigo'    => $produto['produto_codigo'],
                            'produto_nome'      => $produto['produto_nome'],
                            'produto_modelo'    => $produto['produto_modelo'],
                            'produto_valor'     => $aux_valor[$cont_produtos],
                            'produto_quantidade'=> $aux_quantidade[$cont_produtos],
                        );
                        $cont_produtos++;
                    }
                }
                
                $totalgeral = $totalgeral + (($h['valorCompra'] + $h['valorFrete']) - $h['desconto']);
                
                $this->db->where('idStatusCompra', $h['statusPagamento']);
                $status = $this->db->get('statuscompras')->row_array();
                
                $pedidos_dependentes[$cont_pedido] = array(
                    'idpedido'  => $h['idcompra'],    
                    'dataCompra'=> $h['dataCompra'],  
                    'status'    => $status['nomeStatusCompra'],
                    'forma'     => $h['formaPagamento'],
                    'produtos'  => $produtos,
                    'total'     => $h['valorCompra'],
                    'frete'     => $h['valorFrete'],
                    'desconto'  => $h['desconto'],
                );
                $cont_pedido++;
            }
            
            $dependentes[$cont_dependentes] = array(
                'dpd_nome'          => $c['dpd_nome'],
                'dpd_endereco'      => $c['dpd_endereco'],
                'dpd_numero'        => $c['dpd_numero'],
                'dpd_complemento'   => $c['dpd_complemento'],
                'dpd_cep'           => $c['dpd_cep'],
                'dpd_bairro'        => $c['dpd_bairro'],
                'dpd_cidade'        => $c['dpd_cidade'],
                'dpd_estado'        => $c['dpd_estado'],
                'dpd_email'         => $c['dpd_email'],
                'dpd_telefone'      => $c['dpd_telefone'],
                'dpd_datacadastro'  => $c['dpd_datacadastro'],
                'pedidos'               => $pedidos_dependentes,
            );
            $cont_dependentes++;
        }
        
        $data['dependentes']   = $dependentes;
        $data['totalgeral'] = $totalgeral; 
        
        return $data;
    }
    
}