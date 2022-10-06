<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Smsmodel extends CI_Model {

    public function sendSms($id){
        
        $this->db->where('alg_id', $id);
        $a = $this->db->get('aluguelTie')->row_array();

        if($a['alg_nivel_cliente'] == "dependentesTie"){
            $this->db->where('dpd_id', $a['alg_locador_id']);
            $b = $this->db->get('dependentesTie')->row_array();
            $fone       = $b['dpd_fone'];
        }else{
            $this->db->where('clt_id', $a['alg_locador_id']);
            $b = $this->db->get('clienteTie')->row_array();
            $fone       = $b['clt_cel'];
        }
        
        $msg        = "Aluguel realizado com sucesso!";
        
        $sms_token  = "c44257e4cb35a45931e11a24e7a67eac";
        
        $post_data = array(
            'action'        => 'sendsms',
            'token'         => $sms_token,
            'tipo'          => '3',  
            'msg'           => $msg, 
            'numbers'       => $this->clearnumber($fone),
        );
        
        $url = "https://smsshortcode.com.br/app/modulo/api/index.php";
        
        $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
            curl_close ($ch);
        
    }
    
    function clearnumber($valor){
        $valor = str_replace("(", "", $valor);
        $valor = str_replace(")", "", $valor);
        $valor = str_replace("-", "", $valor);
        $valor = str_replace(" ", "", $valor);
        $valor = str_replace("/", "", $valor);
        return $valor;
    }
    
    function textSms(){
        $this->db->where('stc_id > 0');
        $a = $this->db->get('statusCampanha')->result_array();
        for($i=0; $i<count($a); $i++){
            $a[$i]['stc_ativo'] = $this->ativo($a[$i]['stc_ativo']);
            $a[$i]['stc_gatilho'] = $this->status($a[$i]['stc_gatilho']);
        }
        return $a;
    }
    
    function statusAgenda(){
        //$this->db->where('sta_id > 1');
        $this->db->where('sta_ativo', '1');
        return $this->db->get('statusAgenda')->result_array();
    }
    
    function crudStatus($dados){
        if(array_key_exists('acao', $dados)){
            $this->db->where('sta_id', $dados['sta_id']);
            $this->db->delete('statusAgenda');
            return true;
        }else if(array_key_exists('sta_id', $dados)){
            $this->db->where('sta_id', $dados['sta_id']);
            $this->db->update('statusAgenda', $dados);
            return true;
        }else{
            $this->db->insert('statusAgenda', $dados);
            return $this->db->insert_id();
        }
    }
    
    function crudSms($dados){
        if(array_key_exists('acao', $dados)){
            $this->db->where('stc_id', $dados['stc_id']);
            $this->db->delete('statusCampanha');
            return true;
        }else if(array_key_exists('stc_id', $dados)){
            $this->db->where('stc_id', $dados['stc_id']);
            $this->db->update('statusCampanha', $dados);
            return true;
        }else{
            $this->db->insert('statusCampanha', $dados);
            return $this->db->insert_id();
        }
    }    
    
    function ativo($id){
        if($id == 1){
            return "Ativo";
        }else{
            return "Inativo";
        }
    }
    
    function equivalente($id){
        $this->db->select('sta_nome');
        $this->db->where('sta_id', $id);
        $a = $this->db->get('statusAgenda')->row_array();
        return $a['sta_nome'];
    }
    
    function getSms($dado){
        $this->db->where('stc_id', $dado['stc_id']);
        return $this->db->get('statusCampanha')->row_array();
    }
    
    function status($id){
        $this->db->select('sta_nome');
        $this->db->where('sta_id', $id);
        $a = $this->db->get('statusAgenda')->row_array();
        return $a['sta_nome'];
    }
    
    function getSts($dado){
        $this->db->where('sta_id', $dado['sta_id']);
        return $this->db->get('statusAgenda')->row_array();
    }
    
    function campanhaAgenda(){
        $this->db->where('sta_id > 0');
        $a = $this->db->get('statusAgenda')->result_array();
        for($i=0; $i<count($a); $i++){
            $a[$i]['sta_ativo'] = $this->ativo($a[$i]['sta_ativo']);
            $a[$i]['sta_executa'] = $this->status($a[$i]['sta_executa']);
        }
        return $a;
    }
    
    function testSms($dados){
        
        $fone       = $dados['fone'];
        $msg        = $dados['text'];
        $sms_token  = "c44257e4cb35a45931e11a24e7a67eac";
        
        $post_data = array(
            'action'        => 'sendsms',
            'token'         => $sms_token,
            'tipo'          => '3',  
            'msg'           => $msg, 
            'numbers'       => $this->clearnumber($fone),
        );
        
        $url = "https://smsshortcode.com.br/app/modulo/api/index.php";
        
        $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
            curl_close ($ch);
        $aux = json_decode($server_output, true);
        return $aux["msg"];
    }
    
    public function sendSmsUpdate($id){
        
        $this->db->where('alg_chaveLocacao', $id);
        $this->db->where('alg_nivel_cliente', 'aluguel');
        $a = $this->db->get('aluguelTie')->row_array();
        
        $this->db->where('stc_gatilho', $a['alg_finalizado']);
        $b = $this->db->get('statusCampanha')->row_array();
        
        if(!empty($b)){
            
            $this->db->where('clt_fingerprint', $a['alg_alg_chaveCliente']);
            $c = $this->db->get('clienteTie')->row_array();
            
            $fone       = $c['clt_cel'];
            $msg        = $b['stc_texto'];
            $sms_token  = "c44257e4cb35a45931e11a24e7a67eac";
            
            $post_data = array(
                'action'        => 'sendsms',
                'token'         => $sms_token,
                'tipo'          => '3',  
                'msg'           => $msg, 
                'numbers'       => $this->clearnumber($fone),
            );
            
            $url = "https://smsshortcode.com.br/app/modulo/api/index.php";
            
            $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
                curl_close ($ch);
            $aux = json_decode($server_output, true);
            return $aux["msg"];
        }else{
            return false;
        }
    }
}