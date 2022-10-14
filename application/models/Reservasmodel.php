<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Reservasmodel extends CI_Model{

    public function ultimo(){
        $this->db->limit(1);
        $this->db->order_by('clt_id','DESC');
        $data = $this->db->get('clienteTie')->result_array();
        print_r_pre($data);
    }
    public function detelaReserva($grupo){
        $this->db->where("alg_chaveLocacao", $grupo);
        $this->db->delete('aluguelTie');

    }
    public function findClients($dados){
        $this->db->select('clt_id, clt_nome, clt_cpf, clt_cel');
        $this->db->where($dados['busca'], $dados['valor']);
        $data = $this->db->get('clienteTie')->result_array();

        for ($aux = 0; $aux < count($data); $aux++) {
            $option = '<a type="button" onclick="getdados(' . $data[$aux]['clt_id'] . ')" style="color: #1b9045;"><i class="fa fa-2x fa-check-circle"></i></a>';
            // $option = '<input type="radio" value="'. $data[$aux]['clt_id'] .'" name="idCliente" class="getdados form-check-input">';
            $data[$aux]['option'] = $option;
        }
        return $data;
    }
    public function getAllClientes(){
        $data = $this->db->get('clienteTie');
        return $data->result_array();
    }
    public function cliente($dados){
        
        if($dados['busca'] === "clt_nome") {
            $this->db->like('NomeCompleto', $dados['valor'], 'both');
            $this->db->where('updated', 0);
            $old = $this->db->get('clientes')->result_array();
        }elseif($dados['busca'] === "clt_cpf") {
            $cpf = $dados['valor'];
            $cpf = str_replace(".", "", $dados['valor']);
            $cpf = str_replace("-", "", $dados['valor']);
            $this->db->where('CPF', $cpf);
            $this->db->where('updated', 0);
            $old = $this->db->get('clientes')->result_array();
        }elseif($dados['busca'] === "clt_cel") {
            $fone = $dados['valor'];
            $fone = str_replace("-", "", $fone);
            $fone = str_replace("(", "", $fone);
            $fone = str_replace(")", "", $fone);
            $fone = str_replace(" ", "", $fone);
            $str1 = substr($fone, 0, 2);
            $str2 = substr($fone, 2);
            $fone = $str1."-".$str2;
            
            $this->db->where('Celular', $fone);
            $this->db->where('updated', 0);
            $old = $this->db->get('clientes')->result_array();
        }

        if(count($old) == 1){
            $str1 = substr($old[0]['CPF'], 0, 3);
            $str2 = substr($old[0]['CPF'], 3, 3);
            $str3 = substr($old[0]['CPF'], 6, 3);
            $str4 = substr($old[0]['CPF'], 9);
            $cpf = $str1.".".$str2.".".$str3."-".$str4;
            $this->db->where('clt_cpf', $cpf);
            $a = $this->db->get('clienteTie')->row_array();
            if(!empty($a)){
                $old = array();
            }
        }
        
        if(empty($old)){
            if ($dados['busca'] === "clt_nome") {
                $this->db->like($dados['busca'], $dados['valor'], 'both');
                $a = $this->db->get('clienteTie')->result_array();
                $flag = "on";
            } else {
                $this->db->where($dados['busca'], $dados['valor']);
                $a = $this->db->get('clienteTie')->row_array();
                $flag = "off";
            }
    
            if (!empty($a)) {
                if (count($a) >= 1 && $flag == "on") {
                    for ($i = 0; $i < count($a); $i++) {
                        $data['cliente'][$i]   = array(
                            'cpf'   => $a[$i]['clt_cpf'],
                            'nome'  => $a[$i]['clt_nome'],
                            'cel'   => $a[$i]['clt_cel'],
                            'old'   => false,
                        );
                    }
                    $data['cliente'][$i]   = array(
                        'cpf'   => "",
                        'nome'  => "Cliente não encontrado!",
                        'cel'   => "",
                        'old'   => false,
                    );
                    $data['rowNomes']       = count($a) + 1;
                    $data['success']        = 'array';
    
                    /*}else if(count($a) <= 1 && $flag == "on"){
    
                    $this->db->where('dpd_chave', $a[0]['clt_fingerprint']);
                    $b = $this->db->get('dependentesTie')->result_array();
                    if(!empty($b)){
                        $data = array(
                            'isDependente'  => true,
                            'dependentes'   => $b,
                            'rowDependente' => count($b),
                        );    
                    }else{
                        $data = array(
                            'isDependente'  => false,
                            'dependentes'   => "",
                            'rowDependente' => "",
                        );    
                    }
                    $data['cliente']        = array(
                                        'cpf'   => $a[0]['clt_cpf'],
                                        'nome'  => $a[0]['clt_nome'],
                                        'nasc'  => date("d-m-Y", strtotime($a[0]['clt_nasc'])),
                                        'cel'   => $a[0]['clt_cel'],
                                        'tel'   => $a[0]['clt_tel'],
                                        'mail'  => $a[0]['clt_mail'],
                                        'cep'   => $a[0]['clt_cep'],
                                        'num'   => $a[0]['clt_num'],
                                        'logra' => $a[0]['clt_logra'],
                                        'prov'  => $a[0]['clt_prov'],
                                        'city'  => $a[0]['clt_city'],
                                        'uf'    => $a[0]['clt_uf'],
                                        );
                    $data['success']        = true;
                    $data['fingerprint']    = $a['clt_fingerprint'];            
                */
                } else if ($flag == "off") {
                    $this->db->where('dpd_chave', $a['clt_fingerprint']);
                    $b = $this->db->get('dependentesTie')->result_array();
                    if (!empty($b)) {
                        $data = array(
                            'isDependente'  => true,
                            'dependentes'   => $b,
                            'rowDependente' => count($b),
                        );
                    } else {
                        $data = array(
                            'isDependente'  => false,
                            'dependentes'   => "",
                            'rowDependente' => "",
                        );
                    }
                    $data['cliente']        = array(
                        'cod'   => "C" . $a['clt_id'],
                        'cpf'   => $a['clt_cpf'],
                        'nome'  => $a['clt_nome'],
                        'apelido'=> $a['clt_apelido'],
                        'nasc'  => date("d-m-Y", strtotime($a['clt_nasc'])),
                        'cel'   => $a['clt_cel'],
                        'tel'   => $a['clt_tel'],
                        'mail'  => $a['clt_mail'],
                        'cep'   => $a['clt_cep'],
                        'num'   => $a['clt_num'],
                        'logra' => $a['clt_logra'],
                        'prov'  => $a['clt_prov'],
                        'city'  => $a['clt_city'],
                        'uf'    => $a['clt_uf'],
                    );
                    $data['success']        = true;
                    $data['fingerprint']    = $a['clt_fingerprint'];
                }
            } else {
                $a = array(
                    $dados['busca'] => $dados['valor']
                );
                $this->db->insert('clienteTie', $a);
    
                $a = array(
                    'clt_id'            => $this->db->insert_id(),
                    $dados['busca']     => $dados['valor'],
                    'clt_fingerprint'   => md5($this->db->insert_id()),
                );
    
                $this->db->where('clt_id', $this->db->insert_id());
                $this->db->replace('clienteTie', $a);
                $data = array(
                    'success' => false,
                    'fingerprint'   => $a['clt_fingerprint'],
                );
            }
        }else{
            if(count($old) > 1){
                $counter = 0;
                for ($i = 0; $i < count($old); $i++) {
                    $data['cliente'][$counter]   = array(
                        'cpf'   => $old[$i]['CPF'],
                        'nome'  => $old[$i]['NomeCompleto'],
                        'cel'   => $old[$i]['Celular'],
                        'old'   => true,
                    );
                    $counter++;
                }
                
                $this->db->like($dados['busca'], $dados['valor'], 'both');
                $a = $this->db->get('clienteTie')->result_array();
                
                for ($i = 0; $i < count($a); $i++) {
                    $data['cliente'][$counter]   = array(
                        'cpf'   => $a[$i]['clt_cpf'],
                        'nome'  => $a[$i]['clt_nome'],
                        'cel'   => $a[$i]['clt_cel'],
                        'old'   => false,
                    );
                    $counter++;
                }
                
                $data['cliente'][$counter]   = array(
                    'cpf'   => "",
                    'nome'  => "Cliente não encontrado!",
                    'cel'   => "",
                    'old'   => false,
                );
                $data['rowNomes']       = $counter + 1;
                $data['success']        = 'array';
                
            }else{
                /*
                [0] => Array ( 
                    [CodCliente] => 14273 
                    [DtCadastro] => 2019-03-23 11:38:08 
                    [CPF] => 13927083623 
                    [NomeCompleto] => Yasmin Espindola Cavalheiro Fausto 
                    [Email] => 
                    [Endereco] => R.; Carolina Pucci Molinar, 112 
                    [Bairro] => Alfredo Freire 
                    [CEP] => 
                    [Cidade] => Uberaba 
                    [Estado] => MG 
                    [Telefone1] => 34-33162617 
                    [Telefone2] => 
                    [Celular] => 34-992394177 
                    [iAtivo] => 1 
                    [UA_Data] => 2019-03-23 11:38:08 
                    [UA_CodUsuario] => 6 
                    [RG] => ) )
                */
                $a = array(
                    'clt_nome'          => $old[0]['NomeCompleto'],
                    'clt_cpf'           => $old[0]['CPF'],
                    'clt_cel'           => $old[0]['Celular'],
                    'clt_tel'           => $old[0]['Telefone1'],
                    'clt_mail'          => $old[0]['Email'],
                    'clt_cep'           => $old[0]['CEP'],
                    'clt_ativo'         => 1,
                    'clt_datacadastro'  => date('Y-m-d'),
                );
                $this->db->insert('clienteTie', $a);
                
                $old['updated'] = 1;
                $this->db->where('CodCliente', $old['CodCliente']);
                $this->db->replace('clientes', $old);
                
                
                $a['clt_id'] = $this->db->insert_id();
                $a['clt_fingerprint'] = md5($this->db->insert_id());
                
                $this->db->where('clt_id', $this->db->insert_id());
                $this->db->replace('clienteTie', $a);
                
                $this->db->where('clt_id', $this->db->insert_id());
                $a = $this->db->get('clienteTie')->row_array();
                
                $data['cliente']        = array(
                                            'cod'   => "C" . $a['clt_id'],
                                            'cpf'   => $a['clt_cpf'],
                                            'nome'  => $a['clt_nome'],
                                            'apelido'=> $a['clt_apelido'],
                                            //'nasc'  => date("d-m-Y", strtotime($a['clt_nasc'])),
                                            'cel'   => $a['clt_cel'],
                                            'tel'   => $a['clt_tel'],
                                            'mail'  => $a['clt_mail'],
                                            'cep'   => $a['clt_cep'],
                                            'num'   => $a['clt_num'],
                                            'logra' => $a['clt_logra'],
                                            'prov'  => $a['clt_prov'],
                                            'city'  => $a['clt_city'],
                                            'uf'    => $a['clt_uf'],
                        );
                $data['success']        = 'oldOne';
                $data['fingerprint']    = $a['clt_fingerprint'];
            }
        }

        return $data;
    }
    public function dependenteNew($dados){
        $this->db->insert('dependentesTie', $dados);
        return true;
    }
    public function clienteNew($dados){
        $this->db->where('clt_fingerprint', $dados['keyId']);
        $a = $this->db->get('clienteTie')->row_array();

        $a['clt_nome']          = $dados['nome'];
        $a['clt_cpf']           = $dados['cpf'];
        $a['clt_cel']           = $dados['cel'];
        $a['clt_nasc']          = date("Y-m-d", strtotime(str_replace("/", "-", $dados['nasc'])));
        // $a['clt_tel']           = $dados['tel'];
        $a['clt_mail']          = $dados['mail'];
        $a['clt_cep']           = $dados['cep'];
        $a['clt_num']           = $dados['num'];
        $a['clt_logra']         = $dados['logra'];
        $a['clt_prov']          = $dados['prov'];
        $a['clt_city']          = $dados['city'];
        $a['clt_uf']            = $dados['uf'];

        $this->db->where('clt_fingerprint', $a['clt_id']);
        $this->db->replace('clienteTie', $a);
        $data = array(
            'success' => true,
            'cliente'   => $a,
        );
        return $data;
    }
    public function evento(){
    }
    public function trajesDept(){
        $a = $this->db->get('departamentos')->result_array();
        return $a;
    }
    public function tamanhos(){
        $this->db->select('opcao_id, opcao_nome');
        $this->db->where('opcao_categoria', 'Tamanho');
        return $this->db->get('opcoes')->result_array();
    }
    public function cores(){
        $this->db->select('opcao_id, opcao_nome');
        $this->db->where('opcao_categoria', 'Cor');
        return $this->db->get('opcoes')->result_array();
    }
    public function getCliente($id){
        $this->db->where("clt_id", $id);
        $c = $this->db->get('clienteTie')->row_array();
        return $c;
    }
    public function gettraje($id){
        $this->db->where("produto_id", $id);
        $c = $this->db->get('produtos')->row_array();
        return $c;
    }
    public function buscaTrajesReserva($dados){ 

        if ($dados['categoria'] != null) {
            $this->db->where("produto_departamentos", $dados['categoria']);
        }
        if (!empty($dados['detalhes'])) {
            $this->db->like('produto_nome', strtoupper($dados['detalhes']), 'both');
            $this->db->or_like('produto_modelo', strtoupper($dados['detalhes']), 'both');
        }
        if ($dados['cor'] != null && $dados['cor'] != 0) {
            $this->db->like('produto_cores', $dados['cor'], 'both');
        }
        if ($dados['tamanho'] != null && $dados['tamanho'] != 0) {
            $this->db->like('produto_tamanhos', $dados['tamanho'], 'both');
        }
        $a = $this->db->get('produtos')->result_array();

        for ($i = 0; $i < count($a); $i++) {
            $this->db->where('alg_trajes', $a[$i]['produto_id']);
            $this->db->where('alg_retirada', $dados['dataInicio']);
            $this->db->where('alg_devolucao', $dados['dataFim']);
            $z = $this->db->get('aluguelTie')->result_array();
            //print_r($this->db->last_query());
            if(count($z) >= $a[$i]['produto_estoques']){
                unset($a[$i]);
            }
        }

        $a = array_values($a);
        for ($i = 0; $i < count($a); $i++) {
           // $a[$i]['img'] = $a[$i]['produto_imagens_opcional1'];
            $a[$i]['produto_tamanhos'] = $this->renomeiaOpcao($a[$i]['produto_tamanhos']);
            $a[$i]['produto_cores'] = $this->renomeiaOpcao($a[$i]['produto_cores']);
        }

        return $a;
    }
    public function buscaTrajesAluguel($dados){
        $z = explode(",", $dados['trajes']);
        for ($i = 0; $i < count($z); $i++) {
            $this->db->where("produto_id", $z[$i]);
            $a[$i] = $this->db->get('produtos')->row_array();
            $a[$i]['produto_valor'] = $this->formataValor($a[$i]['produto_valor']);
        }

        return $a;
    }
    public function removeTrajesAluguel($dados){
        $z = explode(",", $dados['trajes']);
        $lista = "";
        $aux = 0;
        for ($i = 0; $i < count($z); $i++) {
            if ($dados['remove'] != $z[$i]) {
                $this->db->where("produto_id", $z[$i]);
                $a[$aux] = $this->db->get('produtos')->row_array();
                $a[$aux]['produto_valor'] = $this->formataValor($a[$aux]['produto_valor']);
                $aux++;
            }
        }
        return $a;
    }
    public function buscaAluguel($dados){
        $this->db->select("alg_id, alg_chaveLocacao, alg_trajes, alg_locador, alg_retirada, alg_devolucao");
        $this->db->where("alg_chaveLocacao", $dados);
        $this->db->where("alg_trajes >", 0);
        $a = $this->db->get('aluguelTie')->result_array();
        
        $j = 0;
        for ($i = 0; $i < count($a); $i++) {
            $this->db->where("produto_id", $a[$i]['alg_trajes']);
            $aux = $this->db->get('produtos')->row_array();
            
            if($aux){
                $b[$j] = $aux;
                $b[$j]['produto_valor'] = $this->formataValor($b[$i]['produto_valor']);
                $b[$j]['locador'] = $a[$i]['alg_locador'];
                $b[$j]['alg_id'] = $a[$i]['alg_id'];
                $b[$j]['produto_tamanhos'] = $this->renomeiaOpcao($b[$i]['produto_tamanhos']);
                $b[$j]['produto_cores'] = $this->renomeiaOpcao($b[$i]['produto_cores']);
                $j++;
            }
        }
        return $b;
    }
    public function getAluguelAllData($dados){

       
        $this->db->select('alg.*, clt.*, user.nome_usuario as atend_nome, user.telefone as atend_phone, user.email as atend_email');
        $this->db->from('aluguelTie alg');
        $this->db->join('clienteTie clt', 'alg_chaveCliente = clt_fingerprint', 'left');
        $this->db->join('usuarios user', 'id_usuario = alg_atendente', 'left');
        $this->db->where("alg_chaveLocacao", $dados);
        $this->db->where_not_in('alg_finalizado', ['1','6']);
        $this->db->order_by('alg_id', 'desc');
        $a = $this->db->get()->result_array();



        $desconto = 0.00;
        $findDesconto = explode('#', $a[0]["alg_obs"]);
        if(isset($findDesconto[1])){
            if(stripos($findDesconto[1], 'Desconto') !== false) {        
                $stringDesconto = explode('¬', $findDesconto[1]);
                $desconto = $stringDesconto[1];
            }
    
        }
       

        foreach ($a as $row) {
            if($row['alg_trajes'] != 0){
                $this->db->select('produto_nome, produto_modelo, produto_codigo, produto_valor, produto_tamanhos, produto_cores');
                $this->db->where("produto_id", $row['alg_trajes']);
                $aux = $this->db->get('produtos')->row_array();    
                $trajes[] = array(
                    'alg_id'            => $row['alg_id'],
                    'alg_trajes_id'     => $row['alg_trajes'],
                    'alg_trajes_nome'   => $aux['produto_nome'],
                    'alg_traje_valor'   => formatarMoedaReal($aux['produto_valor'], true),
                    'alg_locador'       => $row['alg_locador'],
                    'alg_traje_tamanho' => $this->renomeiaOpcao($aux['produto_tamanhos']),
                    'alg_traje_cores'   => $this->renomeiaOpcao($aux['produto_cores']),
                );
            }
        }

        # CASO NÃO EXISTA TRAJE NO PEDIDO, NÃO IRÁ MOSTRAR DADOS DO PEDIDO. POIS O PEDIDO É INCOMPLETO!
        if(isset($trajes)){
            $pedido = array(
                'alg_chaveLocacao'  => $a[0]['alg_chaveLocacao'],
                'alg_chaveCliente'  => $a[0]['alg_chaveCliente'],
                'alg_efetivado'     => formataDataDbView($a[0]['alg_efetivado']),
                'alg_retirada'      => formataDataDbView($a[0]['alg_retirada']),
                'alg_devolucao'     => formataDataDbView($a[0]['alg_devolucao']),
                'alg_desconto'      => formatarMoedaReal($desconto, true),
                'alg_total'         => formatarMoedaReal($a[0]['alg_total'], true),
                'alg_entrada'       => formatarMoedaReal($a[0]['alg_entrada'], true),
                'alg_formaEntrada'  => $a[0]['alg_formaEntrada'],
                'alg_resto'         => formatarMoedaReal($a[0]['alg_resto'], true),
                'alg_finalizado'    => $a[0]['alg_finalizado'],
                'alg_contrato'      => $a[0]['alg_contrato'],
                'alg_trajes'        => $trajes,                
                'alg_obs'           => $a[0]['alg_obs'],
                'clt_nome'          => $a[0]['clt_nome'],
                'clt_cpf'           => $a[0]['clt_cpf'],
                'clt_cel'           => $a[0]['clt_cel'],
                'clt_mail'          => $a[0]['clt_mail'],
                'clt_end'           => $a[0]['clt_logra'] . ', ' . $a[0]['clt_num'],
                'clt_prov'          => $a[0]['clt_prov'],
                'clt_city'          => $a[0]['clt_city'] . ' - ' . $a[0]['clt_uf'],
                'atend_nome'        => $a[0]['atend_nome'],
                'atend_email'       => $a[0]['atend_email'],
                'atend_phone'       => mascararNumero($a[0]['atend_phone'], 'telefone'),
                'multa'             => 999,99,
            );

            $this->db->limit(1);
            $this->db->last_query();
            $loja = $this->db->get('loja')->row_array();
            $response = array(
                'loja'      => $loja,
                'venda'     => $pedido,
                'vendedor'  => [], // $vendedor,
            );
            return $response;
        } else
            return false;
    }
    public function removeTrajes($dados){
        $this->db->where("alg_id", $dados['alg_id']);
        $this->db->delete('aluguelTie');
        $a =  $this->buscaAluguel($dados['alg_chaveLocacao']);
        return $a;
    }
    public function pagamentos(){
        $this->db->where("ativo_forma", 1);
        $a = $this->db->get('formas_pagamento')->result_array();
        return $a;
    }
    function formataValor($valor){
        $valor = str_replace(".", ",", $valor);
        return $valor;
    }
    function gravaAluguel($dados){

        $pgt = "";
        if(!empty($dados['entrada'])){
            $pgt .= "Entrada|".$dados['formaEntrada']."¬".$dados['entrada']."¬".date('Y-m-d H:i:s');
        }
        if(!empty($dados['entrada2'])){
            $pgt .= "#Entrada|".$dados['formaEntrada2']."¬".$dados['entrada2']."¬".date('Y-m-d H:i:s');
        }
        if(!empty($dados['desconto'])){
            $pgt .= "#Desconto|Desconto¬".$dados['desconto']."¬".date('Y-m-d H:i:s');
        }
        
        if($dados['contrato'] == true ){
            $contrato = 1;
        }else{
            $contrato = 0;
        }
        
        $this->db->where('atr_chavelocacao_alg', $dados['chaveLocacao']);
        $loc = $this->db->get('aluguelTieResumo')->row_array();
        
        $loc['atr_pagamentos']  = $pgt;
        $loc['atr_observacoes'] = $dados['observações'];
        $loc['atr_status']      = 2;
        $loc['atr_atendente']   = $dados['atendente'];
        $loc['atr_contrato']    = $contrato;
        $loc['atr_contratonum'] = date("Ymd").str_pad(rand(0,99), 2, "0", STR_PAD_LEFT);
        
        $this->db->where('atr_id', $loc['atr_id']);
        $this->db->update('aluguelTieResumo', $loc);
        
    }
    function gravaLocacao($dados){
        if (strpos($dados['locador'], "C") !== false) {
            $nivel = "clienteTie";
            $this->db->where('clt_fingerprint', $dados['keyClt']);
            $c = $this->db->get('clienteTie')->row_array();
            $b['nome']  = $c['clt_nome'];
            $b['id']    = $c['clt_id'];
        } else {
            $nivel = "dependentesTie";
            $this->db->where('dpd_id', $dados['locador']);
            $c = $this->db->get('dependentesTie')->row_array();
            $b['nome']  = $c['dpd_nome'];
            $b['id']    = $c['dpd_id'];
        }

        if (isset($dados['keyLoc'])) {
            $chave = $dados['keyLoc'];
        } else {
            $chave = md5(date('YmdHms'));
        }
        
        $this->db->select('produto_valor');
        $this->db->where('produto_id', $dados['traje']);
        $valor = $this->db->get('produtos')->row_array();
        
        $a = array(
            'alg_chaveCliente'      => $dados['keyClt'],
            'alg_chaveLocacao'      => $chave,
            'alg_nivel_cliente'     => $nivel,
            'alg_locador'           => $b['nome'],
            'alg_locador_id'        => $b['id'],
            'alg_efetivado'         => date('Y-m-d'),
            'alg_retirada'          => $this->formatBdDate($dados['retirada']),
            'alg_devolucao'         => $this->formatBdDate($dados['devolucao']),
            'alg_trajes'            => $dados['traje'],
            'alg_total'             => $valor['produto_valor'],
            'alg_obs'               => $dados['obs'],
        );
        
        $this->db->insert('aluguelTie', $a);
        
        $this->db->where('atr_chavelocacao_alg', $a['alg_chaveLocacao']);
        $loc = $this->db->get('aluguelTieResumo')->row_array();
        if(empty($loc)){
            $locacao = array(
                'atr_chavelocacao_alg'      => $a['alg_chaveLocacao'],
                'atr_chaveCliente_clt'      => $dados['keyClt'],
                'atr_valorBruto'            => $valor['produto_valor'],
                'atr_retirada'              => $this->formatBdDate($dados['retirada']),
                'atr_devolucao'             => $this->formatBdDate($dados['devolucao']),
                );
            
            $this->db->insert('aluguelTieResumo', $locacao);
        }else{
            $loc['atr_valorBruto'] = (float)$loc['atr_valorBruto'] + (float)$valor['produto_valor'];
            
            $this->db->where('atr_id', $loc['atr_id']);
            $this->db->update('aluguelTieResumo', $loc);
        }
        
        return $a['alg_chaveLocacao'];
    }
    function formatBdDate($valor){
        //return date("Y-m-d", strtotime(str_replace("/", "-", $valor)));
        return date("Y-m-d", strtotime($valor));
    }
    function formatBdValor($valor){
        $valor = str_replace("R$ ", "", $valor);
        $valor = str_replace(",", ".", $valor);
        return $valor;
    }
    public function getAllAluguelFilter($filter){
        $this->db->distinct();
        $this->db->select('alg_chaveLocacao');
        $this->db->from('aluguelTie alg');
        $this->db->join('clienteTie clt', 'alg_chaveCliente = clt_fingerprint', 'left');
        if (!empty($filter['datainicio'])) {
            $this->db->where('alg_efetivado BETWEEN "' . $filter['datainicio'] . '" and "' . $filter['datafim'] . '"');
            $filtered = true;
        }
    
        if (!empty($filter['status'])) {
            if($filter['status'] == 8){
               // echo "<h1>foi</h1>";
                $this->db->where('alg_devolucao < ', date('Y-m-d'));
                $this->db->where('alg_finalizado != ',5);
            }else{
                $this->db->where('alg_finalizado', $filter['status']);
                $filtered = true;
            }
           
        } //else {
        //     $this->db->where_not_in('alg_finalizado', ['1','6']);
        // }
        // if (!empty($filter['forma_pagamento'])) {
        //     $this->db->where('alg_formaEntrada', $filter['forma_pagamento']);
        //     $filtered = true;
        // }
        $keys = $this->db->get()->result_array();
        
        $result = [];
        $sum = 0.00;
        foreach ($keys as $key) {

            $this->db->select('*');
            $this->db->from('aluguelTie alg');
            $this->db->join('clienteTie clt', 'alg_chaveCliente = clt_fingerprint', 'left');
            $this->db->where("alg_chaveLocacao", $key['alg_chaveLocacao']);
            $this->db->where_not_in('alg_finalizado', ['1','6']);
            $this->db->order_by('alg_id', 'desc');
            $data = $this->db->get()->result_array();
            $desconto = "2,20";
           // print_r($data);
            foreach ($data as $row) {
                if($row['alg_trajes'] != 0){
                    $this->db->select('produto_nome, produto_modelo, produto_codigo, produto_valor, produto_tamanhos, produto_cores');
                    $this->db->where("produto_id", $row['alg_trajes']);
                    $aux = $this->db->get('produtos')->row_array();  
                    if($aux){
                        $trajes[] = array(
                            'alg_id'            => $row['alg_id'],
                            'produto_codigo'    => $aux['produto_codigo'],
                            'produto_nome'      => $aux['produto_nome'],
                            'produto_modelo'    => $aux['produto_modelo'],
                            'produto_valor'     => formatarMoedaReal($aux['produto_valor'], true),
                            'produto_quantidade'=> 1,
                            'alg_locador'       => $row['alg_locador'],
                            'alg_traje_tamanho' => $this->renomeiaOpcao($aux['produto_tamanhos']),
                            'alg_traje_cores'   => $this->renomeiaOpcao($aux['produto_cores']),
                            'alg_desconto'      => $desconto,
                            'alg_total'      => formatarMoedaReal(floatval($aux['produto_valor']) - floatval($desconto),true) ,
                        );
                    }
                }
            }
           // print_r_pre($trajes);
            # CASO NÃO EXISTA TRAJE NO PEDIDO, NÃO IRÁ MOSTRAR DADOS DO PEDIDO. POIS O PEDIDO É INCOMPLETO!
          
            if(isset($trajes)){
            //incluir desconto aki
                $sum += floatval($data[0]["alg_total"]);
                $result[] = array(
                    "id"            => $data[0]['alg_id'],
                    "data"          => formataDataDbView($data[0]["alg_efetivado"]),
                    "nome_cliente"  => Firstlette($data[0]["clt_nome"]),
                    "cpf"           => $data[0]["clt_cpf"],
                    "status"        => getnamestatus($data[0]["alg_finalizado"]),
                    "total"         => formatarMoedaReal($data[0]["alg_total"], true),
                    "produtos"      => $trajes,
                    "acrescimo"     => formatarMoedaReal("0.00", true),
                    "frete_valor"   => formatarMoedaReal("0.00", true),
                    "desconto"      => formatarMoedaReal("0.00", true),
                    "total_geral"   => formatarMoedaReal($sum, true) ,
                );
            }
            $trajes = null;
        }

        return $result;
        
    }
    public function getAllAluguel($config, $filter){

        $this->db->distinct();
        $this->db->select('alg_chaveLocacao');
        $this->db->from('aluguelTie alg');
        $this->db->join('clienteTie clt', 'alg_chaveCliente = clt_fingerprint', 'left');
        if ($filter['start_date']) {
            $this->db->where('alg_efetivado BETWEEN "' . $filter['start_date'] . '" and "' . $filter['final_date'] . '"');
            $filtered = true;
        }
        if ($filter['filter_definition'] == 1) {
            $this->db->where('alg_efetivado', $filter['alg_efetivado']);
            $filtered = true;
        }
        if ($filter['filter_nome']) {
            $this->db->group_start();            
            $this->db->like('alg.alg_locador', $filter['filter_nome'], 'both');
            $this->db->or_like('clt.clt_nome', $filter['filter_nome'], 'both');
            $this->db->group_end(); 
            $filtered = true;
        }
        if ($filter['filter_telefone']) {
            $this->db->like('ct.clt_cel', $filter['filter_telefone'], 'both');
            $filtered = true;
        }
        if ($filter['filter_cpf']) {
            $this->db->like('ct.clt_cpf', $filter['filter_cpf'], 'both');
            $filtered = true;
        }
        //$this->db->where_not_in('alg_finalizado', ['1','6']);
        $this->db->order_by($config['columnName'], $config['columnSortOrder']);
        $this->db->limit($config['rowperpage'], $config['row']);
        $keys = $this->db->get()->result_array();
        foreach ($keys as $row) {
            $this->db->select('alg_id, alg_chaveLocacao, alg_tipo,alg_finalizado, alg_efetivado, alg_retirada, alg_devolucao, alg_locador, clt_nome, clt_cel, clt_cpf');
            $this->db->from('aluguelTie alg');
            $this->db->join('clienteTie clt', 'alg_chaveCliente = clt_fingerprint', 'left');
            $this->db->where("alg_chaveLocacao", $row['alg_chaveLocacao']);
            $this->db->order_by('alg_id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get();
            $num_filtered_row = $query->num_rows();
            $data = $query->row_array();
            if($data){
                $result[] = $data;
            }
        }

        $this->db->distinct();
        $this->db->select('alg_chaveLocacao');
        $this->db->from('aluguelTie al');
        $this->db->join('clienteTie ct', 'clt_fingerprint = alg_chaveCliente', 'left');
        if ($filter['start_date'])
            $this->db->where('alg_efetivado BETWEEN "' . $filter['start_date'] . '" and "' . $filter['final_date'] . '"');
        // if ($filter['filter_definition'] == 1)
            //$this->db->where('sell_date', $filter['filter_definition']);
        if ($filter['filter_nome'])
            $this->db->like('ct.clt_nome', $filter['filter_nome'], 'both');
        if ($filter['filter_telefone'])
            $this->db->like('ct.clt_cel', $filter['filter_telefone'], 'both');
        if ($filter['filter_cpf'])
            $this->db->like('ct.clt_cpf', $filter['filter_cpf'], 'both');
        $number_row = $this->db->count_all_results();

        $result = array(
            'reservas'          => isset($result)           ? $result           : [],
            'num_filtered_row'  => isset($num_filtered_row) ? $num_filtered_row : 0 ,
            'number_row'        => isset($number_row)       ? $number_row       : 0 ,
        );

        return $result;
    }
    public function viewdb() {
        $this->db->distinct();
        $this->db->select('alg_chaveLocacao');
        $this->db->where_not_in('alg_finalizado', ['1','6']);
        $keys = $this->db->get('aluguelTie')->result_array();

        foreach ($keys as $row) {
            $this->db->select('alg_id, alg_chaveLocacao, alg_finalizado, alg_efetivado, alg_retirada, alg_devolucao, alg_locador, clt_tel, clt_cpf');
            $this->db->from('aluguelTie alg');
            $this->db->join('clienteTie clt', 'alg_chaveCliente = clt_fingerprint', 'left');
            $this->db->where("alg_chaveLocacao", $row['alg_chaveLocacao']);
            $this->db->where_not_in('alg_finalizado', ['1','6']);
            $this->db->order_by('alg_id', 'desc');
            $this->db->limit(1);
            $data = $this->db->get()->result_array();
            if($data){
                $response[] = $data;
            }
        }
    }
    public function getAluguel($id){
        $this->db->select('al.*, ct.clt_cpf as alg_chaveCliente');
        $this->db->from('aluguelTie al');
        $this->db->join('clienteTie ct', 'clt_fingerprint = alg_chaveCliente', 'left');
        $this->db->where('alg_id', $id);
        $a = $this->db->get()->row_array();
        return $a;
    }
    public function getAluguelById($chave){
        $this->db->where('alg_id', $chave);
        $a = $this->db->get('aluguelTie')->row_array();

        $this->db->where('clt_fingerprint', $a["alg_chaveCliente"]);
        $c = $this->db->get('clienteTie')->row_array();
        
        return $a;
    }
    function renomeiaOpcao($id){
        $this->db->select('opcao_nome');
        $this->db->where("opcao_id", $id);
        $b = $this->db->get('opcoes')->row_array();
        return $b ? $b['opcao_nome'] : false;
    }
    function contrato(){
        /*
        $this->db->where('alg_chaveLocacao', $id);
        $ctt = $this->db->get('aluguelTie')->result_array();
        */
        $this->db->select('sobre_loja');
        $a = $this->db->get('site')->row_array();
        return $a['sobre_loja'];
    }
    function termo(){
        /*
        $this->db->where('alg_chaveLocacao', $id);
        $ctt = $this->db->get('aluguelTie')->result_array();
        */
        $this->db->select('politica_entrega');
        $a = $this->db->get('site')->row_array();
        return $a['politica_entrega'];
    }
    function getFormasPagamento(){
        $this->db->where("sta_id > 0");
        return $this->db->get('statusAgenda')->result_array();
    }
    function updateFormas($dados){
        $this->db->where("sta_id", $dados['sta_id']);
        return $this->db->update('statusAgenda', $dados);
    }
    function orcamento($dados){

        $data = array(
            'alg_chaveCliente'  => $dados['chaveCliente'],                      
            'alg_chaveLocacao'  => $dados['chaveLocacao'],                      
            'alg_nivel_cliente' => "aluguel",                                   
            'alg_retirada'      => $this->formatBdDate($dados['retirada']),     
            'alg_devolucao'     => $this->formatBdDate($dados['devolucao']),    
            'alg_trajes'        => "",                                          
            'alg_total'         => $dados['total'],                             
            'alg_efetivado'     => date('Y-m-d'),                               
            'alg_entrada'       => $this->formatBdValor(0),     
            'alg_formaEntrada'  => null,                      
            'alg_resto'         => $this->formatBdValor(0),       
            'alg_tipo'          => 'holiday',                                   
            'alg_contrato'      => '0',                                   
            'alg_finalizado'    => "6",                                         
            'alg_obs'           => "",
        );

        $a = $this->db->insert('aluguelTie', $data);

        if (!empty($a)) {
            $this->db->where('alg_chaveLocacao', $dados['chaveLocacao']);
            $z = $this->db->get('aluguelTie')->result_array();
            foreach ($z as $upd) {
                $this->db->where('alg_id', $upd['alg_id']);
                $aux = $this->db->get('aluguelTie')->row_array();
                $aux['alg_finalizado'] = 6;
                $this->db->replace('aluguelTie', $aux);
            }
            return $this->db->insert_id();
        } else {
            return false;
        }
    }
    function getStatusAgenda($id){
        $this->db->where('sta_ativo', 1);
        $this->db->where('sta_id >', 0);
        $this->db->like('sta_nome', $id);
        $a =  $this->db->get('statusAgenda')->result_array();
        
        return $a;
    }
    function listaTudo(){
        $this->db->where_not_in('atr_status', 1);
        $this->db->where_not_in('atr_status', 6);
        $this->db->order_by('atr_id', 'ASC');
        $a =  $this->db->get('aluguelTieResumo')->result_array();
        for($i=0; $i<count($a); $i++){
            $this->db->where('clt_fingerprint', $a[$i]['atr_chaveCliente_clt']);
            $c = $this->db->get('clienteTie')->row_array();
            if(!empty($c)){
                $a[$i]['cliente'] = $c['clt_nome'];
                $a[$i]['telefone'] = $c['clt_cel'];
                $a[$i]['cpf'] = $c['clt_cpf'];
            }else{
                $a[$i]['cliente'] = "Não informado";
                $a[$i]['telefone'] = "Não informado";
                $a[$i]['cpf'] = "Não informado";
            }
            $a[$i]['atr_contratonum'];
            $a[$i]['atr_chavelocacao_alg'];
            $a[$i]['atr_chaveCliente_clt'];
            $a[$i]['atr_valorBruto'] = "R$".$this->moneyMask($a[$i]['atr_valorBruto']);
            $a[$i]['atr_pagamentos'];
            $a[$i]['atr_observacoes'];
            $a[$i]['atr_locacao'] = $this->dataView($a[$i]['atr_locacao']);
            $a[$i]['atr_retirada'] = $this->dataView($a[$i]['atr_retirada']);
            $a[$i]['atr_devolucao'] = $this->dataView($a[$i]['atr_devolucao']);
            $a[$i]['atr_devolucaoreal'] = $this->dataView($a[$i]['atr_devolucaoreal']);
            $a[$i]['atr_status'];
            $a[$i]['atr_atendente'];
            $a[$i]['atr_contrato'];
            $a[$i]['periodo'] = $a[$i]['atr_retirada']. " até ".$a[$i]['atr_devolucao'];
        }
        return $a;
    }
    function listaPendente(){
        $this->db->where('alg_nivel_cliente', 'pendente');
        $this->db->where('alg_finalizado', 1);
        $this->db->order_by('alg_id', 'DESC');
        $a =  $this->db->get('aluguelTie')->result_array();
        for($i=0; $i<count($a); $i++){
            $this->db->where('clt_fingerprint', $a[$i]['alg_chaveCliente']);
            $c = $this->db->get('clienteTie')->row_array();
            if(!empty($c)){
                $a[$i]['cliente'] = $c['clt_nome'];
                $a[$i]['telefone'] = $c['clt_cel'];
                $a[$i]['cpf'] = $c['clt_cpf'];
            }else{
                $a[$i]['cliente'] = "Não informado";
                $a[$i]['telefone'] = "Não informado";
                $a[$i]['cpf'] = "Não informado";
            }
            $a[$i]['alg_id'] = $i+1;
            $a[$i]['alg_finalizado'] = $this->status($a[$i]['alg_finalizado']);
            $a[$i]['alg_efetivado'] = $this->dataView($a[$i]['alg_efetivado']);
            $a[$i]['alg_retirada'] = $this->dataView($a[$i]['alg_retirada']);
            $a[$i]['alg_devolucao'] = $this->dataView($a[$i]['alg_devolucao']);
            unset($a[$i]['alg_chaveCliente']);
            unset($a[$i]['alg_nivel_cliente']);
            unset($a[$i]['alg_locador']);
            unset($a[$i]['alg_locador_id']);
            unset($a[$i]['alg_trajes']);
            unset($a[$i]['alg_total']);
            unset($a[$i]['alg_entrada']);
            unset($a[$i]['alg_formaEntrada']);
            unset($a[$i]['alg_resto']);
            unset($a[$i]['alg_contrato']); 
            unset($a[$i]['alg_obs']);
            unset($a[$i]['alg_atendente']);
            if($a[$i]['alg_id'] <10){
                $a[$i]['alg_id'] = "0".$a[$i]['alg_id'];
            }
        }
        return $a;
    }
    function status($id){
        if($id == 1){
            $id = "Não Finalizado";
        }elseif($id == 2){
            $id = "Ajustes";
        }elseif($id == 3){
            $id = "Retirada";
        }elseif($id == 4){
            $id = "Devolução";
        }elseif($id == 5){
            $id = "Finalizado";
        }elseif($id == 6){
            $id = "Orçamento";
        }elseif($id == 7){
            $id = "Cancelado";
        }
        return $id;
    }
    function tipo($id){
        if($id == "event"){
            $id = "aluguel";
        }else if($id == "holiday"){
            $id = "ajuste";
        }else if($id == "birthday"){
            $id = "devolução";
        }else if(empty($id)){
            $id = "---";
        }
        return $id;
    }
    function dataView($data){
        $data = date('d/m/Y', strtotime($data));
        return $data;
    }
    function moneyMask($valor){
        $valor = str_replace(".", ",", $valor);
        return $valor;
    }
    public function dadosAluguel($id){
        $this->db->where('alg_chaveLocacao', $id);
        $a = $this->db->get('aluguelTie')->row_array();
        $this->db->where('clt_fingerprint', $a['alg_chaveCliente']);
        $b = $this->db->get('clienteTie')->row_array();
        
        $dados = array(
            'locacao'   => $a['alg_retirada'],
            'devolucao' => $a['alg_devolucao'],
            'cpfTitu'   => $b['clt_cpf'],
            'celTitu'   => $b['clt_cel'],
        );
        return $dados;
    }
    public function getDadosClienteDependente($dados){
            $this->db->where($dados['busca'], $dados['valor']);
            $a = $this->db->get('clienteTie')->row_array();

        if (!empty($a)) {
            $this->db->where('dpd_chave', $a['clt_fingerprint']);
            $b = $this->db->get('dependentesTie')->result_array();
            if (!empty($b)) {
                $data = array(
                    'isDependente'  => true,
                    'dependentes'   => $b,
                    'rowDependente' => count($b),
                );
            } else {
                $data = array(
                    'isDependente'  => false,
                    'dependentes'   => "",
                    'rowDependente' => "",
                );
            }
            $data['cliente']        = array(
                'cod'   => "C" . $a['clt_id'],
                'cpf'   => $a['clt_cpf'],
                'nome'  => $a['clt_nome'],
                'nasc'  => date("d-m-Y", strtotime($a['clt_nasc'])),
                'cel'   => $a['clt_cel'],
                'tel'   => $a['clt_tel'],
                'mail'  => $a['clt_mail'],
                'cep'   => $a['clt_cep'],
                'num'   => $a['clt_num'],
                'logra' => $a['clt_logra'],
                'prov'  => $a['clt_prov'],
                'city'  => $a['clt_city'],
                'uf'    => $a['clt_uf'],
            );
            $data['success']        = true;
            $data['fingerprint']    = $a['clt_fingerprint'];
        } else {
            $a = array(
                $dados['busca'] => $dados['valor']
            );
            $this->db->insert('clienteTie', $a);

            $a = array(
                'clt_id'            => $this->db->insert_id(),
                $dados['busca']     => $dados['valor'],
                'clt_fingerprint'   => md5($this->db->insert_id()),
            );

            $this->db->where('clt_id', $this->db->insert_id());
            $this->db->replace('clienteTie', $a);
            $data = array(
                'success' => false,
                'fingerprint'   => $a['clt_fingerprint'],
            );
        }

        return $data;
    }
    public function retrieveLocacaoKey($chave){
        //SELECT * FROM `aluguelTie` WHERE `alg_nivel_cliente` = 'aluguel' AND `alg_chaveLocacao` = 'b960a9dd5e86c8aade260f449eaf6fd7'
        $this->db->where('alg_nivel_cliente', 'aluguel');
        $this->db->or_where('alg_nivel_cliente', 'pendente');
        $this->db->where('alg_chaveLocacao', $chave);
        $a = $this->db->get('aluguelTie')->row_array();

        $this->db->where('clt_fingerprint', $a['alg_chaveCliente']);
        $b = $this->db->get('clienteTie')->row_array();
        
        $pags = array();
        $rest = explode("#", $a['alg_obs']);
        for($i=0; $i<count($rest); $i++){ 
            $helper =  explode("|", $rest[$i]);
            array_push($pags, explode("¬", $helper[1]));
        }
        
        $total = 0;
        for($i=0; $i<count($pags); $i++){
            $total = (float)$total + (float)$pags[$i][1];
        }
        
        $dados = array(
            'cpfCliente'    => $b['clt_cpf'],
            'chaveLocacao'  => $a['alg_chaveLocacao'],
            'dataDevolucao' => $a['alg_devolucao'],
            'dataRetirada'  => $a['alg_retirada'],
            'atendente'     => $a['alg_atendente'],
            'pagamentos'    => $pags, 
        );
        
        return $dados;
    }
    function valorPago($id){
        //SELECT * FROM `aluguelTie` WHERE `alg_nivel_cliente` = 'aluguel' AND `alg_chaveLocacao` = 'b960a9dd5e86c8aade260f449eaf6fd7'
        $this->db->where('alg_nivel_cliente', 'aluguel');
        $this->db->where('alg_chaveLocacao', $id);
        $a = $this->db->get('aluguelTie')->row_array();
        
        if(is_array($a) > 0){
            $pags = array();
            $rest = explode("#", $a['alg_obs']);
            for($i=0; $i<count($rest); $i++){ 
                $helper =  explode("|", $rest[$i]);
                array_push($pags, explode("¬", $helper[1]));
            }
            
            $total = 0;
            for($i=0; $i<count($pags); $i++){
                $total = (float)$total + (float)$pags[$i][1];
            }
        }else{
            $total = 0.00;
        }
        return $total;
    }
    function gravaPendente($id){
        $this->db->where('alg_chaveLocacao', $id);
        $a = $this->db->get('aluguelTie')->row_array();
        
        $data = array(
            'alg_chaveCliente'  => $a['alg_chaveCliente'],                      //[alg_chaveCliente] => identificaçao do cliente
            'alg_chaveLocacao'  => $a['alg_chaveLocacao'],                      //[alg_chaveLocacao] => identificação da locação
            'alg_nivel_cliente' => "pendente",                                  //[alg_nivel_cliente] => dependentesTie || clienteTie || aluguel
            'alg_retirada'      => $this->formatBdDate($a['alg_retirada']),     //[alg_retirada] => 2022-08-08 
            'alg_devolucao'     => $this->formatBdDate($a['alg_devolucao']),    //[alg_devolucao] => 2022-08-15 
            'alg_trajes'        => "",                                          //[alg_trajes] => identificação do traje locado
            'alg_total'         => $a['alg_total'],                             //[alg_total] => total do aluguel
            'alg_efetivado'     => date('Y-m-d'),                               //[alg_alg_efetivado] => data da efetivação da locação
            'alg_resto'         => $this->formatBdValor($a['alg_resto']),       //[alg_resto] =>  valor que falta
            'alg_tipo'          => 'holiday',                                   //[alg_tipo] => event || birthday || holiday
            'alg_contrato'      => 0,                                           //[alg_contrato] => 1 impresso || 2 não impreso 
            'alg_finalizado'    => "1",                                         //[alg_finalizado] => 1 - Aluguel Não Finalizado || 2 - Ajustes || 3 - Retirada || 4 - Devolução || 5 - Aluguel Finalizado
        );
        
        $this->db->insert('aluguelTie', $data);
        return $this->db->insert_id();

    }
    function listaFiltro($filtro){
        if($filtro == 'pendentes'){
            $this->db->where('alg_nivel_cliente', 'pendente');
            $this->db->where('alg_finalizado', 1);
        }else if($filtro == 'atraso'){
            $this->db->where('alg_nivel_cliente', 'aluguel');
            $this->db->where('alg_finalizado', 4);    
            $this->db->where('alg_devolucao >=', date('Y-m-d'));
        }else if($filtro == 'ajuste'){
            $this->db->where('alg_nivel_cliente', 'aluguel');
            $this->db->where('alg_finalizado', 2);    
        }else if($filtro == 'retirada'){
            $this->db->where('alg_nivel_cliente', 'aluguel');
            $this->db->where('alg_finalizado', 3);    
        }
        $this->db->order_by('alg_id', 'DESC');
        $a =  $this->db->get('aluguelTie')->result_array();
        
        for($i=0; $i<count($a); $i++){
            $this->db->where('clt_fingerprint', $a[$i]['alg_chaveCliente']);
            $c = $this->db->get('clienteTie')->row_array();
            if(!empty($c)){
                $a[$i]['cliente'] = $c['clt_nome'];
                $a[$i]['telefone'] = $c['clt_cel'];
                $a[$i]['cpf'] = $c['clt_cpf'];
            }else{
                $a[$i]['cliente'] = "Não informado";
                $a[$i]['telefone'] = "Não informado";
                $a[$i]['cpf'] = "Não informado";
            }
            $a[$i]['alg_id'] = $i+1;
            $a[$i]['alg_tipo'] = $this->tipo($a[$i]['alg_tipo']);
            $a[$i]['alg_finalizado'] = $this->status($a[$i]['alg_finalizado']);
            $a[$i]['alg_efetivado'] = $this->dataView($a[$i]['alg_efetivado']);
            $a[$i]['alg_retirada'] = $this->dataView($a[$i]['alg_retirada']);
            $a[$i]['alg_devolucao'] = $this->dataView($a[$i]['alg_devolucao']);
            $a[$i]['periodo'] = $a[$i]['alg_retirada']." à ".$a[$i]['alg_devolucao'];
            $a[$i]['alg_total'] = "R$ ".$this->moneyMask($a[$i]['alg_total']);
            unset($a[$i]['alg_chaveCliente']);
            unset($a[$i]['alg_nivel_cliente']);
            unset($a[$i]['alg_locador']);
            unset($a[$i]['alg_locador_id']);
            unset($a[$i]['alg_trajes']);
            unset($a[$i]['alg_entrada']);
            unset($a[$i]['alg_formaEntrada']);
            unset($a[$i]['alg_resto']);
            unset($a[$i]['alg_contrato']); 
            unset($a[$i]['alg_obs']);
            unset($a[$i]['alg_atendente']);
            if($a[$i]['alg_id'] <10){
                $a[$i]['alg_id'] = "0".$a[$i]['alg_id'];
            }
        }
        return $a;
    }
    
    
    /*
    funções 10/10/2022
    Anderson Moreira
    */
    function listareservas($limit, $start, $filter){
        
        /*if($filter){
            $this->db->like('', $filter, 'both');
            $this->db->or_like('', $filter, 'both');
            $this->db->or_like('', $filter, 'both');
            $this->db->or_like('', $filter, 'both');
            $this->db->or_like('', $filter, 'both');
        }*/
        $this->db->limit($limit, $start);
        $this->db->order_by('atr_id', 'ASC');
        $aux = $this->db->get('aluguelTieResumo')->result_array();
        $data = array();
        $no = $start;
        for($i = 0; $i < count($aux); $i++){
            $this->db->where('clt_fingerprint', $aux[$i]['atr_chaveCliente_clt']);
            $cliente = $this->db->get('clienteTie')->row_array();
            $aux[$i]['atr_retirada'] = $this->dataView($aux[$i]['atr_retirada']);
            $aux[$i]['atr_devolucao'] = $this->dataView($aux[$i]['atr_devolucao']);
            $row = array();
            // $row[] = $aux[$i]['atr_contratonum'];
            $row[] = $this->dataView($aux[$i]['atr_locacao']);
            $row[] = $cliente['clt_nome'];
            // $row[] = $cliente['clt_cpf'];
            // $row[] = $cliente['clt_cel'];
            $row[] = $aux[$i]['atr_retirada']. " até ".$aux[$i]['atr_devolucao'];;
            $row[] = "<select class='form-select-lg' id='status' name='status' onchange='updtStatus(this.value, `".$aux[$i]['atr_chavelocacao_alg']."`)' style='border:thin;'>
                        <option value='1'>Nova Reserva</option>
                        <option value='2'>Costura</option>
                        <option value='3'>Montagem</option>
                        <option value='4'>Ag. Retirada</option>
                        <option value='4'>Retirado</option>
                        <option value='4'>Ag. Devolução</option>
                        <option value='5'>Não Devolvido</option>
                        <option value='6'>Devolvido</option>
                        <option value='7'>Concluso</option>
                        <option value='8'>Cancelado</option>
                    </select>";
            $row[] = '<div><a class="text-center w100 show-value" onclick="showValue()"><i class="fa fa-eye text-dark" style="font-size: 1.8rem"></i></a><div class="hide-value d-none" onclick="hideValue()">R$'. $this->moneyMask($aux[$i]['atr_valorBruto']).'</div></div>';
            $row[] = '<div><a class="text-center w100 show-value" onclick="showValue()"><i class="fa fa-eye text-dark" style="font-size: 1.8rem"></i></a><div class="hide-value d-none" onclick="hideValue()">R$'. $this->moneyMask($aux[$i]['atr_valorBruto']).'</div></div>';
            $row[] = "  <a href='#' onclick='detalhes(`".$aux[$i]['atr_chavelocacao_alg']."`)'><i class='fa fa-eye fa-1x text-dark' aria-hidden='true' style='padding-left: 14px; font-size: 1.8rem;'></i></a>
                        <a href='#' onclick='multa(`".$aux[$i]['atr_chavelocacao_alg']."`)'><i class='fa fa-money fa-1x text-dark' aria-hidden='true' style='padding-left: 14px; font-size: 1.8rem;'></i></a>
                        <a href='#' onclick='imprimir(`".$aux[$i]['atr_chavelocacao_alg']."`)'><i class='fa fa-print fa-1x text-dark' aria-hidden='true' style='padding-left: 14px; font-size: 1.8rem;'></i></a>
                        <a href='#' onclick='excluirpedido(`".$aux[$i]['atr_chavelocacao_alg']."`)'><i class='fa fa-trash fa-1x text-dark' aria-hidden='true' style='padding-left: 14px; font-size: 1.8rem;'></i></a>";
            $data[] = $row;
        }
        return $data;
    }
    public function reservasCount(){
        return $this->db->get('aluguelTieResumo')->num_rows();
    }
    function getDadosLocacao($id){
        //DADOS DA LOCAÇÃO
        $this->db->where('atr_chavelocacao_alg', $id);
        $a = $this->db->get('aluguelTieResumo')->row_array();
        
        //DADOS DO CLIENTE
        $this->db->where('clt_fingerprint', $a['atr_chaveCliente_clt']);
        $b = $this->db->get('clienteTie')->row_array();
        $cliente = array(
                'nome'      => $b['clt_nome'],
                'nick'      => $b['clt_apelido'],
                'cpf'       => $b['clt_cpf'],
                'cel'       => $b['clt_cel'],
                'address'   => $b['clt_logra'],
                'city'      => $b['clt_city'],
                'city'      => $b['clt_city'],
                'num'       => $b['clt_num'],
                'dist'      => $b['clt_prov'],
                'city'      => $b['clt_city'],
                'uf'        => $b['clt_uf'],
                'cep'       => $b['clt_cep'],
                'comp'      => $b['clt_comp'],
                'token'     => $b['clt_fingerprint'],
            );
        
        //DADOS DE PAGAMENTOS
        $pagamento = "";
        $total = $multa = 0;
        $group = explode("#", $a['atr_pagamentos']);
        for($i=0; $i<count($group); $i++){
            $aux = explode("|", $group[$i]);
            $helper = explode("¬", $aux[1]);
            if($helper[0] == "-1"){
                $helper[0] = "Desconto";
            }else{
                $this->db->where('id_forma', $helper[0]);
                $Qw = $this->db->get('formas_pagamento')->row_array();
                $helper[0] = $Qw['nome_forma'];
            }
            $pagamento .= "<tr>
                            <th scope='row'>".($i+1)."</th>
                            <td> R$ ".$helper[1]."</td>
                            <td>".$helper[2]."</td>
                            <td>".$aux[0]."</td>
                            <td>".$helper[0]."</td>
                        </tr>";
            if($aux[0] != "Multa"){
                $total = (float)$total + (float)$helper[1];
            }else{
                $multa = (float)$multa + (float)$helper[1];
            }
        }
            
        // DADOS DOS TRAJES DA LOCAÇÃO
        $this->db->where('alg_chaveLocacao', $id);
        $this->db->order_by('alg_id', 'DESC');
        $c = $this->db->get('aluguelTie')->result_array();
        $trajes = "";
        $count = 0;
        $status = $a['atr_status'];
        foreach($c as $evt){
            $count++;
            $this->db->where('produto_id', $evt['alg_trajes']);
            $k = $this->db->get('produtos')->row_array();
                            
            $trajes .= " <tr>
                            <th scope='row'>".$count."</th>
                            <td>".ucfirst($k['produto_nome'])."</td>
                            <td>".$this->formatViewVariacao($k['produto_tamanhos'])."</td>
                            <td>".$this->formatViewVariacao($k['produto_cores'])."</td>
                            <td>R$ ".$this->formatViewValor($k['produto_valor'])."</td>
                        </tr>
                        <tr style='border-bottom: 2px'>
                            <td class='py-4' colspan='3'><strong>".$evt['alg_locador'] . $evt['alg_obs']."</strong></td>
                            <td colspan='2'>
                                <select class='form-select form-select-lg w-auto float-end' name='situacao' id='situacao' onchange='mudaStatus(".$evt['alg_id'].")'>";
                                if($evt['alg_finalizado'] == 1){
                                    $trajes .= "<option value='1' selected>Pendente</option>
                                    <option value='2'>Ajustes</option>
                                    <option value='3'>Retirada</option>
                                    <option value='4'>Devolução</option>
                                    <option value='5'>Finalizado</option>
                                    <option value='7'>Cancelado</option>";
                                }else if($evt['alg_finalizado'] == 2){
                                    $trajes .= "<option value='2' selected>Ajustes</option>
                                    <option value='3'>Retirada</option>
                                    <option value='4'>Devolução</option>
                                    <option value='5'>Finalizado</option>
                                    <option value='7'>Cancelado</option>";
                                }else if($evt['alg_finalizado'] == 3){
                                    $trajes .= "<option value='2' disabled>Ajustes</option>
                                    <option value='3' selected>Retirada</option>
                                    <option value='4'>Devolução</option>
                                    <option value='5'>Finalizado</option>
                                    <option value='7'>Cancelado</option>";
                                }else if($evt['alg_finalizado'] == 4){
                                    $trajes .= "<option value='2' disabled>Ajustes</option>
                                    <option value='3' disabled>Retirada</option>
                                    <option value='4' selected>Devolução</option>
                                    <option value='5'>Finalizado</option>
                                    <option value='7'>Cancelado</option>";
                                }else if($evt['alg_finalizado'] == 5){
                                    $trajes .= "<option value='2'>Ajustes</option>
                                    <option value='3' disabled>Retirada</option>
                                    <option value='4' disabled>Devolução</option>
                                    <option value='5' selected>Finalizado</option>
                                    <option value='7'>Cancelado</option>";
                                }
            $trajes .="         </select>
                            </td>
                        </tr>";
            if($status < $evt['alg_finalizado']){
                $status = $evt['alg_finalizado'];
            }
        }
        
        // DADOS DE VALORES DA LOCAÇÃO
        $valores = array(
            'total'         => "R$ ".$this->formatViewValor((float)$a['atr_valorBruto']),
            'pago'          => "R$ ".$this->formatViewValor($total),
            'falta'         => "R$ ".$this->formatViewValor((float)$a['atr_valorBruto'] - (float)$total),
            'remanescente'  => $this->formatViewValor((float)$a['atr_valorBruto'] - (float)$total),
            'multa'         => "R$ ".$this->formatViewValor($multa),
            'totalGeral'    => "R$ ".$this->formatViewValor((float)$total + (float)$multa),
        );
        
        // DADOS DAS DATAS DE LOCAÇÃO
        $this->db->where('sta_id', '2');
        $ajuste = $this->db->get('statusAgenda')->row_array();
        $ajuste = $ajuste['sta_dias'];
        if(strtotime(date('Y-m-d', strtotime($a['atr_devolucao']))) < strtotime(date('Y-m-d'))){
            if($a['atr_status'] == 5 ){ 
                $atraso = true;
            }else{
                $atraso = false;
            }
        }else{
            $atraso = false;
        }
        $datas = array(
            'locacao'   => date("d/m/Y", strtotime($a['atr_locacao'])),
            'devolucao' => date("d/m/Y", strtotime($a['atr_devolucao'])),
            'prova'     => date('d/m/Y', (strtotime('-'.$ajuste.' day', strtotime($a['atr_retirada'])))),
            'total'     => "R$ ".$a['atr_valorBruto'],
            'atraso'    => $atraso,
        );
        
        
        
        $locacao = array(
            'id'        => $a['atr_chavelocacao_alg'],
            'cliente'   => $cliente,
            'pagamento' => $pagamento,
            'locacao'   => $trajes,
            'valores'   => $valores,
            'datas'     => $datas,
            'status'    => $status,
            'statusTxt' => $this->status($status),
            );
        
        return $locacao;
    }
    
    function formatViewValor($valor){
        $valor = number_format($valor, 2, ',', '');
        return $valor;
    }
    function formatViewVariacao($id){
        $this->db->where("opcao_id", $id);
        $a = $this->db->get('opcoes')->row_array();
        return $a['opcao_nome'];
    }
    
}
