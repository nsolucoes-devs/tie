<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Model {
    
    public function cadastraPdv($dados){
        if(!empty($dados)){
        $dados = array(        
            'cliente_nome'          => $dados['nome'],
            'cliente_cpf'           => $dados['cpf'],
            'cliente_senha'         => null,
            'cliente_nascimento'    => null,
            'cliente_cep'           => $dados['cep'],
            'cliente_endereco'      => $dados['logra'],
            'cliente_numero'        => $dados['endnum'],
            'cliente_cidade'        => $dados['cidade'],
            'cliente_bairro'        => null,
            'cliente_estado'        => $dados['estado'],
            'cliente_email'         => $dados['email'],
            'cliente_telefone'      => $dados['telefone'],
            'cliente_genero'        => null,
            'cliente_ativo'         => 1,
            'cliente_complemento'   => null,
            'cliente_datacadastro'  => date("Y-m-d"),
            'cliente_loja'          => $dados['loja'],
        );
        $this->db->insert("cliente", $dados);
        
        $this->db->where('cliente_id', $this->db->insert_id);
        return $this->db->get('cliente');
        }else{
            return null;
        }
        return $dados;
        
    }
    
    public function insert($new){
        $this->db->insert('clienteTie', $new);
        return $this->db->insert_id();
    }
    
    public function update($id, $new){
        $this->db->where('clt_id', $id);
        $this->db->update('clienteTie', $new);
    }
    
    public function getCEP($cep){
        $this->db->where('cep', $cep);
        return $this->db->get('cep')->row_array();
    }
    
    public function excluirCliente($id){
        $this->db->where('cliente_id', $id);
        $this->db->delete('cliente');
    }
    
    public function get($id){
        $this->db->where('clt_fingerprint', $id);
        $data = $this->db->get('clienteTie');
        return $data->row_array();
    }
    
    public function getNumero($id){
        $this->db->select('cliente_numero');
        $this->db->where('cliente_id', $id);
        $data = $this->db->get('cliente');
        return $data->row_array();
    }
    
    // public function getClienteById($id){
    //     $this->db->select('cliente_id, cliente_nome, cliente_cpf, cliente_telefone, cliente_email');
    //     $this->db->where('cliente_id', $id);
    //     $data = $this->db->get('cliente');
    //     return $data->row_array();
    // }
    
    public function getClienteById($id){
        $this->db->select('clt_id, clt_nome, clt_cpf, clt_tel, clt_mail, clt_fingerprint');
        $this->db->where('clt_id', $id);
        $data = $this->db->get('clienteTie');
        return $data->row_array();
    }
    
    public function getAll(){
        $data = $this->db->get('clienteTie');
        return $data->result_array();
    }
    
    public function getCPF($login){
        $this->db->where('clt_cpf', $login);
        $data = $this->db->get('clienteTie');
        return $data->row_array();
    }
    
    public function getSenha($senha){
        $this->db->where('cliente_senha', $senha);
        $data = $this->db->get('cliente');
        return $data->row_array();
    }
    
    public function getSenhaLogin($login, $senha){
        $this->db->where('cliente_cpf', $login);
        $this->db->where('cliente_senha', $senha);
        $data = $this->db->get('cliente');
        return $data->row_array();
    }
    
    public function getAllClientes($limit, $start){
        $this->db->select('cliente_id, cliente_nome, cliente_cpf, cliente_cidade, cliente_email, cliente_telefone, cliente_ativo, cliente_loja');
        $this->db->order_by('cliente_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('cliente');
        return $data->result_array();
    }
    
    public function get_count() {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('cliente')->row_array();
        return $a['pages'];
    }
    
    public function getAllClientesFiltro($filter, $limit, $start){
        $this->db->select('cliente_id, cliente_nome, cliente_cpf, cliente_cidade, cliente_email, cliente_telefone, cliente_ativo');
        $this->db->join('status_cliente', 'cliente.cliente_ativo = status_cliente.status_id');
        $this->db->like('cliente_nome', $filter, 'both');
        $this->db->or_like('cliente_cpf', $filter, 'both');
        $this->db->or_like('cliente_cidade', $filter, 'both');
        $this->db->or_like('cliente_email', $filter, 'both');
        $this->db->or_like('cliente_telefone', $filter, 'both');
        $this->db->or_like('cliente_ativo', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        $this->db->order_by('cliente_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('cliente');
        return $data->result_array();
    }
    
    public function get_countFiltro($filter) {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('cliente_nome', $filter, 'both');
        $this->db->or_like('cliente_cpf', $filter, 'both');
        $this->db->or_like('cliente_cidade', $filter, 'both');
        $this->db->or_like('cliente_email', $filter, 'both');
        $this->db->or_like('cliente_telefone', $filter, 'both');
        $this->db->or_like('cliente_ativo', $filter, 'both');
        $a = $this->db->get('cliente')->row_array();
        return $a['pages'];
    }
    
    public function relatorioClientes(){
        
        $this->db->where('clt_nome IS NOT NULL');
        $todosclientes =  $this->db->get('clienteTie')->result_array();

        $clientes = [];
        foreach($todosclientes as $c){
            $clientes[] = array(
                'cliente_nome'          => $c['clt_nome'],
                'cliente_cpf'           => $c['clt_cpf'],
                'cliente_endereco'      => $c['clt_logra'],
                'cliente_numero'        => $c['clt_num'],
                'cliente_complemento'   => "", //$c['cliente_complemento'],
                'cliente_cep'           => $c['clt_cep'],
                'cliente_bairro'        => $c['clt_prov'],
                'cliente_cidade'        => $c['clt_city'],
                'cliente_estado'        => $c['clt_uf'],
                'cliente_email'         => $c['clt_mail'],
                'cliente_telefone'      => $c['clt_cel'],
                'cliente_datacadastro'  => dataDiaDb(),
            );
        }

        return $clientes;
    }
    
    public function relatorioClientesFiltros($filtros){
        // if($filtros['datainicio']){
        //     // $this->db->where('cliente_datacadastro >=', $filtros['datainicio']);
        // }
        // if($filtros['datafim']){
        //     // $this->db->where('cliente_datacadastro <=', $filtros['datafim']);
        // }
        // // if($filtros['estado']){
        // //     $this->db->where('clt_uf', $filtros['estado']);
        // // }
        $this->db->where('clt_nome IS NOT NULL');
        $todosclientes =  $this->db->get('clienteTie')->result_array();

        $clientes = [];
        foreach($todosclientes as $c){
            if($c['clt_nome']){
                $clientes[] = array(
                    'cliente_nome'          => $c['clt_nome'],
                    'cliente_cpf'           => $c['clt_cpf'],
                    'cliente_endereco'      => $c['clt_logra'],
                    'cliente_numero'        => $c['clt_num'],
                    'cliente_complemento'   => "", //$c['cliente_complemento'],
                    'cliente_cep'           => $c['clt_cep'],
                    'cliente_bairro'        => $c['clt_prov'],
                    'cliente_cidade'        => $c['clt_city'],
                    'cliente_estado'        => $c['clt_uf'],
                    'cliente_email'         => $c['clt_mail'],
                    'cliente_telefone'      => $c['clt_cel'],
                    'cliente_datacadastro'  => dataDiaDb(),
                );
            }
        }

        return $clientes;
    }
    
    public function relatorioClientesDetalhado(){
        $todosclientes = $this->db->get('clienteTie')->result_array();
        
        $clientes = [];
        $totalgeral = 0;
        
        foreach($todosclientes as $c){
            $this->db->distinct();
            $this->db->select('alg_chaveLocacao');
            if($filtros['forma_pagamento']){
                $this->db->where('alg_formaEntrada', $filtros['forma_pagamento']);
            }
            if($filtros['status']){
                $this->db->where('alg_finalizado', $filtros['status']);    
            }
            $this->db->where('alg_chaveCliente', $c['clt_fingerprint']);
            $keys = $this->db->get('aluguelTie')->result_array();
            
            $pedidos_clientes = [];
            $cont_pedido = 0;
            foreach ($keys as $key) {

                $this->db->select('*');
                $this->db->from('aluguelTie alg');
                $this->db->join('clienteTie clt', 'alg_chaveCliente = clt_fingerprint', 'left');
                $this->db->where("alg_chaveLocacao", $key['alg_chaveLocacao']);
                $this->db->where_not_in('alg_finalizado', ['1','6']);
                $this->db->order_by('alg_id', 'desc');
                $data = $this->db->get()->result_array();


                foreach ($data as $row) {
                    if($row['alg_trajes'] != 0){
                        $this->db->select('produto_nome, produto_modelo, produto_codigo, produto_valor, produto_tamanhos, produto_cores');
                        $this->db->where("produto_id", $row['alg_trajes']);
                        $aux = $this->db->get('produtos')->row_array();  
                        if($aux){
                            $produtos[] = array(
                                'produto_codigo'    => $aux['produto_codigo'],
                                'produto_nome'      => $aux['produto_nome'],
                                'produto_modelo'    => $aux['produto_modelo'],
                                'produto_valor'     => $aux['produto_valor'],
                                'produto_quantidade'=> 1,
                            );
                        }
                    }
                }

                if($data){
                    if($data[0]["alg_total"] != null){
                        $totalgeral += $data[0]["alg_total"];
                    }
                    
                    if(isset($produtos)){
                        $pedidos_clientes[] = array(
                            "idpedido"      => $data[0]['alg_id'],
                            "dataCompra"    => formataDataDbView($data[0]["alg_efetivado"]),
                            "status"        => getnamestatus($data[0]["alg_finalizado"]),
                            'forma'         => $data[0]['alg_formaEntrada'],                    
                            "produtos"      => $produtos,
                            "total"         => $data[0]["alg_total"],
                            "frete"         => "0.00",
                            "desconto"      => "0.00",
                        );
                    }
                    $produtos = null;
                }
            }
            
            $clientes[] = array(
                'cliente_nome'          => $c['clt_nome'],
                'cliente_cpf'           => $c['clt_cpf'],
                'cliente_endereco'      => $c['clt_logra'],
                'cliente_numero'        => $c['clt_num'],
                'cliente_complemento'   => "", //$c['cliente_complemento'],
                'cliente_cep'           => $c['clt_cep'],
                'cliente_bairro'        => $c['clt_prov'],
                'cliente_cidade'        => $c['clt_city'],
                'cliente_estado'        => $c['clt_uf'],
                'cliente_email'         => $c['clt_mail'],
                'cliente_telefone'      => $c['clt_cel'],
                'cliente_datacadastro'  => dataDiaDb(),
                'pedidos'               => $pedidos_clientes,
            );
            $pedidos_clientes = null;
        }
        
        $data['clientes']   = $clientes;
        $data['totalgeral'] = $totalgeral; 
        
        return $data;
    }
    
    public function relatorioClientesDetalhadoFiltros($filtros){
       
       
        if($filtros['estado']){
            $this->db->where('clt_uf', $filtros['estado']);
        }
        if($filtros['cliente']){
            $this->db->where('clt_id', $filtros['cliente']);
        }
        
        $todosclientes = $this->db->get('clienteTie')->result_array();
        
        $clientes = [];
        $totalgeral = 0;
        
        foreach($todosclientes as $c){
            $this->db->distinct();
            $this->db->select('alg_chaveLocacao');

            $this->db->where('alg_efetivado  BETWEEN "' . $filtros['datainicio'] . '" and "' . $filtros['datafim'] . '"  ');

            if($filtros['forma_pagamento']){
                $this->db->where('alg_formaEntrada', $filtros['forma_pagamento']);
            }

            if($filtros['status']){
                $this->db->where('alg_finalizado', $filtros['status']);    
            }
            $this->db->where('alg_chaveCliente', $c['clt_fingerprint']);
            $keys = $this->db->get('aluguelTie')->result_array();
            
            $pedidos_clientes = [];
            $cont_pedido = 0;
            foreach ($keys as $key) {

                $this->db->select('*');
                $this->db->from('aluguelTie alg');
                $this->db->join('clienteTie clt', 'alg_chaveCliente = clt_fingerprint', 'left');
                $this->db->where("alg_chaveLocacao", $key['alg_chaveLocacao']);
                $this->db->where_not_in('alg_finalizado', ['1','6']);
                $this->db->order_by('alg_id', 'desc');
                $data = $this->db->get()->result_array();


                foreach ($data as $row) {
                    if($row['alg_trajes'] != 0){
                        $this->db->select('produto_nome, produto_modelo, produto_codigo, produto_valor, produto_tamanhos, produto_cores');
                        $this->db->where("produto_id", $row['alg_trajes']);
                        $aux = $this->db->get('produtos')->row_array();  
                        if($aux){
                            $produtos[] = array(
                                'produto_codigo'    => $aux['produto_codigo'],
                                'produto_nome'      => $aux['produto_nome'],
                                'produto_modelo'    => $aux['produto_modelo'],
                                'produto_valor'     => $aux['produto_valor'],
                                'produto_quantidade'=> 1,
                            );
                        }
                    }
                }

                if($data){
                    if($data[0]["alg_total"] != null){
                        $totalgeral += $data[0]["alg_total"];
                    }
                    
                    if(isset($produtos)){
                        $this->db->where('id_forma', $data[0]['alg_formaEntrada']);
                        $this->db->select('nome_forma');
                        $hur = $this->db->get('formas_pagamento')->row_array()["nome_forma"];
                      //  print_r_pre($hur);



                        $pedidos_clientes[] = array(
                            "idpedido"      => $data[0]['alg_id'],
                            "dataCompra"    => $data[0]["alg_efetivado"],
                            "status"        => getnamestatus($data[0]["alg_finalizado"]),
                            'forma'         => $hur,                    
                            "produtos"      => $produtos,
                            "total"         => $data[0]["alg_total"],
                            "frete"         => "0.00",
                            "desconto"      => "0.00",
                        );
                    }
                    $produtos = null;
                }
            }
            
            $clientes[] = array(
                'cliente_nome'          => $c['clt_nome'],
                'cliente_cpf'           => $c['clt_cpf'],
                'cliente_endereco'      => $c['clt_logra'],
                'cliente_numero'        => $c['clt_num'],
                'cliente_complemento'   => "", //$c['cliente_complemento'],
                'cliente_cep'           => $c['clt_cep'],
                'cliente_bairro'        => $c['clt_prov'],
                'cliente_cidade'        => $c['clt_city'],
                'cliente_estado'        => $c['clt_uf'],
                'cliente_email'         => $c['clt_mail'],
                'cliente_telefone'      => $c['clt_cel'],
                'cliente_datacadastro'  => $c['clt_datacadastro'],
                'pedidos'               => $pedidos_clientes,
            );
            $pedidos_clientes = null;
        }
        
        $data['clientes']   = $clientes;
        $data['totalgeral'] = $totalgeral; 
        
        return $data;
    }


    // TIE 

    public function getCPFTie($cpf){
        $this->db->where('clt_cpf', $cpf);
        $data = $this->db->get('clienteTie');
        return $data->row_array();
    }
    
    public function listaClienteTie(){
        return $this->db->get('clienteTie')->result_array();
    }

    public function getClienteTieHash($hash){
        $this->db->where('clt_fingerprint', $hash);        
        $data = $this->db->get('clienteTie');
        return $data->row_array();
    }

    public function getClienteTieId($id){
        $this->db->where('clt_id', $id);        
        $data = $this->db->get('clienteTie');
        return $data->row_array();
    }

    public function insertTie($new){
        $this->db->insert('clienteTie', $new);
        return $this->db->insert_id();
    }
    
    public function updateTie($id, $new){
        if(array_key_exists('oldClient', $new)){
            $this->db->where('CPF', $new['clt_cpf']);
            $this->db->or_like('NomeCompleto', $new['clt_nome'], 'both');
            $a = $this->db->get('clientes')->row_array();
            $a['updated'] = 1;
            $this->db->replace('clientes', $a);
            $id = $this->db->insert('clienteTie', $new);
        }else{
            $this->db->where('clt_id', $id);
            $id = $this->db->update('clienteTie', $new);
        }
        return $id;
    }

    public function excluirClienteTie($id){

        $this->db->where('clt_id', $id);        
        $data = $this->db->get('clienteTie')->row_array();

        if($data){
            $this->db->select('alg_id');
            $this->db->where("alg_chaveCliente", $data['clt_fingerprint']);
            $this->db->order_by('alg_id', 'desc');
            $dataverify = $this->db->get()->result_array();
            

            if(!$dataverify) {
                $this->db->where('clt_id', $id);
                return $this->db->delete('clienteTie');
            } else 
                return array("type" => "error", "msg" => "Cliente com existe alocação no sistema!");
        } else 
            return array("type" => "error", "msg" => "Erro ao deletar cliente, tente novamente mais tarde!");
    }
    
    public function listaClienteTieOld($total, $start, $filtro){
        $this->db->select('NomeCompleto, Cidade, Email, Celular, CodCliente, CPF');
        if($filtro != null){
            $this->db->like('NomeCompleto', $filtro, 'both');
            $this->db->or_like('Celular', $filtro, 'both');
            $this->db->or_like('CPF', $filtro, 'both');
        }
        $this->db->limit($total, $start);
        $this->db->order_by('NomeCompleto', 'ASC');
        $a =  $this->db->get('clientes')->result_array();
        
        for($i=0; $i<count($a); $i++){
            $data[$i] = array(
                "clt_nome"  => $a[$i]['NomeCompleto'],
                "clt_cpf"   => $a[$i]['CPF'],
                "clt_city"  => $a[$i]['Cidade'],
                "clt_mail"  => $a[$i]['Email'],
                "clt_cel"   => $a[$i]['Celular'],
                "clt_id"    => $a[$i]['CodCliente'],
                "clt_ativo" => 0,
                );
        }
        return $data;
    }
    
    public function countClienteTieOld(){
        return  $this->db->count_all('clientes');
    }
    
    public function clientesNew(){
        $a = $this->db->get('clienteTie')->result_array();
        for($i =0; $i<count($a); $i++){
            $cliente[$i] = array(
                'data'      => $a[$i]['clt_datacadastro'],
                'nome'      => $a[$i]['clt_nome'],
                'cpf'       => $a[$i]['clt_cpf'],
                'cidade'    => $a[$i]['clt_city']."/".$a[$i]['clt_uf'],
                'email'     => $a[$i]['clt_mail'],
                'telefone'  => $a[$i]['clt_cel'],
                'situacao'  => $a[$i]['clt_ativo'],
                'id'        => $a[$i]['clt_fingerprint'],
            );
        }
        
        return $cliente;
    }
    
    public function clientesOld(){
        $this->db->select('CodCliente, CPF, NomeCompleto, Email, Cidade, Estado,Celular');
        $a = $this->db->get('clientes')->result_array();
        for($i =0; $i<count($a); $i++){
            $cliente[$i] = array(
                'nome'      => $a[$i]['NomeCompleto'],
                'cpf'       => $a[$i]['CPF'],
                'cidade'    => $a[$i]['Cidade']."/".$a[$i]['Estado'],
                'email'     => $a[$i]['Email'],
                'telefone'  => $a[$i]['Celular'],
                'situacao'  => 'Cadastro Antigo',
                'id'        => $a[$i]['CodCliente'],
            );
        }
        return $cliente;
    }
}