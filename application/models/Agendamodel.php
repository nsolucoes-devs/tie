<?php

class Agendamodel extends MY_Model{

    public function get($id){
        $this->db->where('ac_id', $id);
        $a = $this->db->get('agendaClinica')->row_array();
        return $a;
    }
    
    public function getbyDia($dia){
        $this->db->where('ac_data', $dia);
        $a = $this->db->get('agendaClinica')->result_array();
        return $a;
    }
    
    public function getAll(){
        $a = $this->db->get('agendaClinica')->result_array();
        return $a;
    }
    
    public function insert($new){
        $this->db->insert('agendaClinica', $new);
    }
    
    public function update($id, $new){
        $this->db->where('ac_id', $id);
        $this->db->update('agendaClinica', $new);
    }
    
    public function getAluguel(){
        //SELECT * FROM `aluguelTie` WHERE `alg_locador`IS null GROUP BY `alg_chaveLocacao` order by `alg_retirada`
        $this->db->where('alg_nivel_cliente', 'aluguel');
        $this->db->where('alg_finalizado >', 1);
        $this->db->where('alg_finalizado <', 5);
        $this->db->group_by('alg_chaveLocacao');
        $this->db->order_by('alg_retirada');
        $a = $this->db->get('aluguelTie')->result_array();

        $aux = 0;
        $evento = array();
        
        $this->db->where('sta_id', '2');
        $ajuste = $this->db->get('statusAgenda')->row_array();
        $ajuste = $ajuste['sta_dias'];
        
        
        foreach($a as $evt){
            $z = $this->getCliente($evt['alg_chaveCliente']);
            if($evt['alg_finalizado'] == 3){
                // Retirada
                $evento[$aux] = array(
                    'id'            => $evt['alg_chaveLocacao'],
                    'name'          => $z,
                    'badge'         => $this->badge(3),
                    'date'          => $this->dateCalendar($evt['alg_retirada']),
                    'type'          => 'event',
                    'color'         => $this->getColorAgenda('event'),
                    'everyYear'     => false,
                );
                $aux++;
            }else if($evt['alg_finalizado'] == 2){
                // Ajustes
                $prova = date('Y-m-d', (strtotime('-'.$ajuste.' day', strtotime($evt['alg_retirada']))));
                $evento[$aux] = array(
                    'id'            => $evt['alg_chaveLocacao'],
                    'name'          => $z,
                    'badge'         => $this->badge(2),
                    'date'          => $this->dateCalendar($prova),
                    'type'          => 'holiday',
                    'color'         => $this->getColorAgenda('holiday'),
                    'everyYear'     => false,
                );
                $aux++;
            
            }else if($evt['alg_finalizado'] == 4){
                //Atrasado ou devolução
                if(strtotime(date('Y-m-d', strtotime($evt['alg_devolucao']))) >= strtotime(date('Y-m-d'))){
                    $color = $this->getColorAgenda('birthday');
                    $badge = $this->badge(4);
                }else{
                    $color = $this->getColorAgenda('atrasado');
                    $badge = $this->badge(7);
                }
                $evento[$aux] = array(
                    'id'            => $evt['alg_chaveLocacao'],
                    'name'          => $z,
                    'badge'         => $badge,
                    'date'          => $this->dateCalendar($evt['alg_devolucao']),
                    'type'          => 'birthday',
                    'color'         => $color,
                    'everyYear'     => false,
                );
                $aux++;
            }
            
        }

        return $evento;
    }
    
    function getColorAgenda($tipo){
        
        if($tipo == "event"){
            //aluguel 
            $this->db->like('sta_nome', 'Retirada', 'both');
            $a = $this->db->get('statusAgenda')->row_array();
            
        }else if($tipo == "holiday"){
            //ajuste 
            $this->db->like('sta_nome', 'Ajustes', 'both');
            $a = $this->db->get('statusAgenda')->row_array();
        
        }else if($tipo == "birthday"){
            //devolução
            $this->db->like('sta_nome', 'Devolução', 'both');
            $a = $this->db->get('statusAgenda')->row_array();
        }else if($tipo == "atrasado"){
            //devolução
            $this->db->like('sta_nome', 'Atraso', 'both');
            $a = $this->db->get('statusAgenda')->row_array();
        }
        return $a['sta_cor'];
    }
    
    function getAgendaData($data){
        $this->db->where('alg_retirada', $data);
        $a = $this->db->get('aluguelTie')->result_array();
        
        $count = 0;
        $html = "";
        
        foreach($a as $alg){
            $count++;
            
            if($alg['alg_nivel_cliente'] == "clienteTie"){
                $this->db->where('clt_id', $alg['alg_locador_id']);
                $phone = $this->db->get('clienteTie')->row_array();    
                $phone = $phone['clt_cel'];
            }else{
                $this->db->where('dpd_id', $alg['alg_locador_id']);
                $phone = $this->db->get('dependentesTie')->row_array();    
                $phone = $phone['dpd_fone'];
            }
            
            $html .= "<tr>
                        <td style='text-align-last:center;'>".$count."</td>
                        <td style='text-align-last:center;'>".$alg['alg_locador']."</td>
                        <td style='text-align-last:center;'>".$phone."</td>
                        <td style='text-align-last:center;'><button type='button' class='btn btn-outline-info'><i class='fa fa-eye' aria-hidden='true' onclick='detalhesLocacao(".$alg['alg_id'].")'></i></button></td>
                    </tr>";
        }
        
        return $html;
        
    }
    
    function getDadosLocacao($id){
        $this->db->where('alg_chaveLocacao', $id);
        $this->db->order_by('alg_locador', 'DESC');
        $a = $this->db->get('aluguelTie')->result_array();
        $trajes = "";
        $count = 0;
        $status = 1;
        
        foreach($a as $evt){
            if(!empty($evt['alg_locador']) == true){
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
        }

        $this->db->where('clt_fingerprint', $a[0]['alg_chaveCliente']);
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
        
        $this->db->where('alg_nivel_cliente', 'aluguel');
        $this->db->where('alg_chaveLocacao', $id);
        $p = $this->db->get('aluguelTie')->row_array();
        
        $pagamento = "";
        $total = $multa = 0;
        
        $group = explode("#", $p['alg_obs']);
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
                            <td> R$ ".$this->formatViewValor($helper[1])."</td>
                            <td>".formataDataDbView($helper[2])."</td>
                            <td>".$aux[0]."</td>
                            <td>".$helper[0]."</td>
                        </tr>";
            if($aux[0] != "Multa"){
                $total = (float)$total + (float)$helper[1];
            }else{
                $multa = (float)$multa + (float)$helper[1];
            }
        }
        
        $this->db->where('sta_id', '2');
        $ajuste = $this->db->get('statusAgenda')->row_array();
        $ajuste = $ajuste['sta_dias'];
        
        if(strtotime(date('Y-m-d', strtotime($evt['alg_devolucao']))) < strtotime(date('Y-m-d'))){
            if($evt['alg_finalizado'] >= 4 ){ 
                $atraso = true;
            }else{
                $atraso = false;
            }
        }else{
            $atraso = false;
        }
        $datas = array(
            'locacao'   => date("d/m/Y", strtotime($a[0]['alg_retirada'])),
            'devolucao' => date("d/m/Y", strtotime($a[0]['alg_devolucao'])),
            'prova'     => date('d/m/Y', (strtotime('-'.$ajuste.' day', strtotime($a[0]['alg_retirada'])))),
            'total'     => "R$ ".$p['alg_total'],
            'atraso'    => $atraso,
            );
        
        $valores = array(
            'total'         => "R$ ".$this->formatViewValor((float)$p['alg_total']),
            'pago'          => "R$ ".$this->formatViewValor($total),
            'falta'         => "R$ ".$this->formatViewValor((float)$p['alg_total'] - (float)$total),
            'remanescente'  => $this->formatViewValor((float)$p['alg_total'] - (float)$total),
            'multa'         => "R$ ".$this->formatViewValor($multa),
            'totalGeral'    => "R$ ".$this->formatViewValor((float)$total + (float)$multa),
            );
            
        $locacao = array(
            'id'        => $a[0]['alg_locnumero'],
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
    function status($id){
        if($id == 1){
            $id = "Não Finalizado";
        }elseif($id == 2){
            $id = "Em Ajustes";
        }elseif($id == 3){
            $id = "Retirada Realizada";
        }elseif($id == 4){
            $id = "Devolução Realizada";
        }elseif($id == 5){
            $id = "Finalizado";
        }elseif($id == 6){
            $id = "Orçamento";
        }elseif($id == 7){
            $id = "Cancelado";
        }
        return $id;
    }
    
    
    function badge($valor){
        if($valor == '1'){
            $valor = 'Pendente';
        } elseif($valor == '2'){
            $valor = 'Ajustes';
        } elseif($valor == '3'){
            $valor = 'Retirada';
        } elseif($valor == '4'){
            $valor = 'Devolução';
        } elseif($valor == '5'){
            $valor = 'Finalizado';
        }elseif($valor == '6'){
            $valor = 'Orçamento';
        }elseif($valor == '7'){
            $valor = 'Atrasado';
        }
        return $valor;
    }
    
    function updateLocacao($dados){
        //$this->db->where("alg_trajes >", 0);
        $this->db->where($dados['collunm'], $dados['id']);
        $a = $this->db->get('aluguelTie')->result_array();
        for($i=0; $i<count($a); $i++){
            $a[$i]['alg_finalizado'] = $dados['situacao'];
            if(isset($dados['retirada'])){
                $a[$i]['alg_obs'] .= " | Retirado por: ".$dados['retirada'];
            }
            $this->db->where($dados['collunm'], $a[$i]['alg_id']);
            $b = $this->db->replace('aluguelTie', $a[$i]);
            $chave = $a[$i]['alg_chaveLocacao'];
        }
        return $chave;
    }
    
    function updatePagamentos($dados){
        
        $this->db->where('alg_chaveLocacao', $dados['identidade']);
        $this->db->where('alg_nivel_cliente', "aluguel");
        $a = $this->db->get('aluguelTie')->row_array();
        
        $resto = 0;
        $aux = explode("#", $a['alg_obs']);
        for($i=0; $i<count($aux); $i++){
            $hlp = explode("|", $aux[$i]);  
            $val = explode("¬", $hlp[1]);   
            $resto = (float)$resto + (float)$val[1];
        }
        
        $a['alg_resto'] = (float)$resto + (float)$dados['pagamento'];
        
        if(array_key_exists('multa', $dados)){
            $tipo = "Multa".$dados['motivo'];
        }elseif($a['alg_resto'] == $a['alg_total']){
            $tipo = "Final";
        }else{
            $tipo = "Parcial";
        }

        $a['alg_obs'] = $a['alg_obs']."#".$tipo."|".$dados['forma']."¬".$dados['pagamento']."¬".date("Y-m-d");
        
        $this->db->where('alg_id', $a['alg_id']);
        $this->db->delete('aluguelTie');
        
        $this->db->insert('aluguelTie', $a);
        
        return true;
    }
    
    function dateCalendar($date){
        $date = date("F/d/Y", strtotime($date));
        return $date;
    }
    
    function getPagamentos(){
        $this->db->where('ativo_forma', 1);
        return $this->db->get('formas_pagamento')->result_array();
    }
    
    function getCliente($id){
        $this->db->where('clt_fingerprint', $id);
        $a = $this->db->get('clienteTie')->row_array();
        if(!empty($a)){
            $a = $a['clt_nome'];
        }else{
            $a = "Não informado";
        }
        return $a;
    }
    
    function getDependentes($id){
        $this->db->where('dpd_chave', $id);
        $a = $this->db->get('dependentesTie')->result_array();
        $dependentes = "";
        if(!empty($a)){
            for($i=0; $i<count($a); $i++){
                $dependentes .= "<tr>
                    <td>".($i+1)."</td>
                    <td>".ucfirst($a[$i]['dpd_nome'])."</td>
                    <td>".$a[$i]['dpd_cpf']."</td>
                    <td>".$a[$i]['dpd_fone']."</td>
                </tr>";
            }
        }else{
            $dependentes .= "<tr><th rowspan='4'>Nenhum dependente cadastrado!</th></tr>";
        }

        return $dependentes;
    }
}