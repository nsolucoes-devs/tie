<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Modelauxiliar extends CI_Model {

    function newLocacao($dias){
        
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $total =  $this->db->query('SELECT  clt_datacadastro  FROM clienteTie  WHERE  clt_datacadastro  between  "'.date('Y/m/d', strtotime("- ".$dias." days")).'" AND "'.date('Y/m/d').'"   ;')->result_array();
            
        }
       
        return count($total) ;
    }
    function canceladas($dias){
        
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $total =  $this->db->query('SELECT sum(alg_total) as total FROM aluguelTie  WHERE  alg_retirada  between  "'.date('Y/m/d', strtotime("- ".$dias." days")).'" AND "'.date('Y/m/d').'" AND alg_finalizado=7  ;')->result_array();
            
        }
        
        return number_format($total[0]["total"],2,",","") ;
    }
    function emAberto($dias){
        
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $total =  $this->db->query('SELECT sum(alg_total) as total FROM aluguelTie  WHERE  alg_retirada  between  "'.date('Y/m/d', strtotime("- ".$dias." days")).'" AND "'.date('Y/m/d').'" AND alg_finalizado=1  ;')->result_array();
            
        }
        
        return number_format($total[0]["total"],2,",","") ;
    }
    function concluidas($dias){
       
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $total =  $this->db->query('SELECT sum(alg_total) as total FROM aluguelTie  WHERE  alg_retirada  between  "'.date('Y/m/d', strtotime("- ".$dias." days")).'" AND "'.date('Y/m/d').'" AND alg_finalizado=5  ;')->result_array();
            
        }
        
        return number_format($total[0]["total"],2,",","") ;
    }
    function pendencias($dias){
        
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $total =  $this->db->query('SELECT alg_total FROM aluguelTie  WHERE  alg_retirada  between  "'.date('Y/m/d', strtotime("- ".$dias." days")).'" AND "'.date('Y/m/d').'" AND alg_finalizado=1  ;')->result_array();
        }
        //return count($total) ;
    }
    function atrasos($dias){
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $total =  $this->db->query('SELECT alg_id FROM aluguelTie  WHERE  alg_retirada  between  "'.date('Y/m/d', strtotime("- ".$dias." days")).'" AND "'.date('Y/m/d').'" AND alg_retirada < "'.date('Y/m/d').'" AND alg_finalizado=1  ;')->result_array();
        }
        
        //return count($total) ;
    }
    function ajustes($dias){
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $total =  $this->db->query('SELECT alg_id FROM aluguelTie  WHERE  alg_retirada  between  "'.date('Y/m/d', strtotime("- ".$dias." days")).'" AND "'.date('Y/m/d').'"  AND alg_finalizado=2  ;')->result_array();
            
        }
        
        //return count($total) ;
    }
    function retiradas($dias){
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $total =  $this->db->query('SELECT alg_id FROM aluguelTie  WHERE  alg_retirada  between  "'.date('Y/m/d', strtotime("- ".$dias." days")).'" AND "'.date('Y/m/d').'"  AND alg_finalizado=3  ;')->result_array();
            
        }
        
        //return count($total) ;
    }
    function locacoes($dias){
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada >= ', date('Y-m-d'));
            $this->db->where('alg_retirada <= ', $data);
        }
        $this->db->where('alg_trajes', 0);
        $this->db->order_by('alg_id', 'DESC');
        $this->db->limit(5);
        $a =  $this->db->get('aluguelTie')->result_array();

        $i=0;
        if($a){
            foreach($a as $locs){
                $cli = $this->dadosCliente($locs['alg_chaveCliente']);
                $dados[$i] = array(
                        'id'        => $locs['alg_id'],
                        'reserva'   => $locs['alg_locador'],
                        'status'    => $this->statusLoca($locs['alg_finalizado']),
                        'periodo'   => $this->formatPeriodo($locs['alg_retirada'], $locs['alg_devolucao']),
                        'cliente'   => $cli['nome'],
                        'telefone'  => $cli['fone'],
                        'chave'     => $locs['alg_chaveLocacao'],
                        'posicao'   => $i+1,
                    );
                $i++;
            }
        }else{
            $dados[0] = array(
                'id'        => "Sem locações",
                'reserva'   => "Sem locações",
                'status'    => "Sem locações",
                'periodo'   => "Sem locações",
                'cliente'   => "Sem locações",
                'telefone'  => "Sem locações",
                'chave'     => "",
                'posicao'   => $i+1,
                );
        }
        return $dados;
    }
    function formatPeriodo($retira, $devolve){
        $txt = "Retirada em ".$this->formatData($retira).", com devolução prevista em ".$this->formatData($devolve).".";
        return $txt;
    }
    function formatData($data){
        $data = date("d/m/Y", strtotime($data));
        return $data;
    }
    function dadosCliente($id){
        
        $this->db->select("clt_nome as nome, clt_tel as fone");
        $this->db->where('clt_fingerprint', $id);
        $a = $this->db->get('clienteTie')->row_array();
        if($a){
            if($a['nome'] == "" || empty($a['nome'])){
                $a['nome'] = "Nome não cadastrado!";
            }
            if($a['fone'] == "" || empty($a['fone'])){
                $a['fone'] = "Telefone não cadastrado!";
            }
            return $a;
        }else{
            $b = array(
                'nome'  =>  "Cadastro não encontrado!",
                'fone'  =>  "Sem telefone.",
                );
            return $b;
        }
    }
    function statusLoca($id){
        if($id == 1){
            $aux = "Aluguel Não Finalizado";
        }else if($id == 2){
            $aux = "Ajustes";
        }else if($id == 3){
            $aux = "Retirada";
        }else if($id == 4){
            $aux = "Devolução";
        }else if($id == 5){
            $aux = "Aluguel Finalizado";
        }else if($id == 6){
            $aux = "Orçamento";
        }
        return $aux;
    }
    function listaTudo($dias){
        if($dias == 0){
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada = ', $data);
        }else{
            $data = date('Y-m-d', strtotime("+".$dias."days",strtotime(date('Y-m-d'))));
            $this->db->where('alg_retirada >= ', date('Y-m-d'));
            $this->db->where('alg_retirada <= ', $data);
        }
        $this->db->where('alg_trajes', 0);
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
    
    
    function getBruto($dias){
        $this->db->where_not_in('atr_status', 1);
        $this->db->or_where_not_in('atr_status', 8);
        $a = $this->db->get('aluguelTieResumo')->result_array();
        $aux = 0;
        for($i=0; $i<count($a); $i++){
            $aux = (float)$aux + (float)$a[$i]['atr_valorBruto'];
        }
        return number_format($aux, 2, ',', ' ');
    }
    function getLiquido($dias){
        $this->db->where_not_in('atr_status', 1);
        $this->db->or_where_not_in('atr_status', 8);
        $a = $this->db->get('aluguelTieResumo')->result_array();
        $aux = 0;
        for($i=0; $i<count($a); $i++){
            $helper = explode("#", $a[$i]['atr_pagamentos']);
            for($j=0; $j<count($helper); $j++){
                $h = explode("|", $helper[$j]);
                if($h[0] != 'Desconto'){
                    $h = explode("¬", $h[1]);
                    $aux = (float)$aux + (float)$h[1];
                }
            }
        }
        return number_format($aux, 2, ',', ' ');
    }
    function getIncompleto($dias){
        $this->db->where('atr_status', 1);
        $a = $this->db->get('aluguelTieResumo')->result_array();
        
        return count($a);
    }
    function getLocacao($dias){
        $this->db->where_not_in('atr_status', 1);
        $this->db->or_where_not_in('atr_status', 8);
        $a = $this->db->get('aluguelTieResumo')->result_array();
        return count($a);
    }
    function getCancelado($dias){
        $this->db->where('atr_status', 8);
        $a = $this->db->get('aluguelTieResumo')->result_array();
        
        return count($a);
    }
    function getNaoRetirado($dias){
        $this->db->where('atr_status', 3);
        $this->db->where('atr_retirada <', date('Y-m-d 00:00:00'));
        $a = $this->db->get('aluguelTieResumo')->result_array();
        
        return count($a);
    }
    function getAjustes($dias){
        $this->db->where('atr_status', 2);
        $a = $this->db->get('aluguelTieResumo')->result_array();
        
        return count($a);
    }
    function getAguardaRetirada($dias){
        $this->db->where('atr_status', 3);
        $a = $this->db->get('aluguelTieResumo')->result_array();
        
        return count($a);
    }
    function getMaisLocado($dias){
        $a = 666;
        return $a;
    }
    function getUltLocado($dias){
        $a = 666;
        return $a;
    }
    function getPagamentos($dias){
        $a = array( 
            array('FORMA DE PAGAMENTO', 'RECORRENCIA',),
            array('PIX', 10,),
            array('BOLETO', 2,),
            array('CREDITO', 8,),
            array('DEBITO', 3,),
        );
        return $a;
    }
    
}