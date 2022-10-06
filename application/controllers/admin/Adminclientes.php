<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminclientes extends Admin_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('clientes');
        $this->load->model('dependentes');
        $this->load->model('lojasmodel');
        $this->load->model('comprasmodel');
        $this->load->model('clientesOldDatatables');
    }
    /*
    FUNÇÃO ESPECÍFICA DO SISTEMA 
    public function clientes(){
        
        $this->load->library("pagination");
        
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('d2fb359e7478da4e7ec01ef527bdeb53/f/' . $filtro . '/');
            $config["total_rows"] = $this->clientes->get_countFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['clientes']  = $this->clientes->getAllClientesFiltro($filtro, 10, $page);
            $data['filtro']    = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('d2fb359e7478da4e7ec01ef527bdeb53/n/');
            $config["total_rows"] = $this->clientes->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['clientes']  = $this->clientes->getAllClientes(10, $page);
        }
        
        if($this->session->userdata('alert')){
            $data['alert'] = $this->session->userdata('alert');
            $this->session->unset_userdata('alert');
        }
        
        $this->header(3);
        $this->load->view('restrito/clientes', $data);
        $this->footer();
    }
    */
    public function clientes(){
        $data['clientes']   = $this->clientes->listaClienteTie();
        $this->header(3);
        $this->load->view('restrito/cliente/listaClientes', $data);
        $this->footer();
    }
    
    public function clientesListagem(){
        
        if(isset($_POST['qtdade']) && $_POST['cliente']){
            $qtd = $_POST['qtdade'];
            $cliente  = $_POST['cliente'];
        }else{
            $qtd = 10;
            $cliente = 0;
        }
        $this->load->library('pagination');
        $config = array(
            "base_url"      => base_url('d2fb359e7478da4e7ec01ef527bdxxxx/'),
            "total_rows"    => $this->clientes->countClienteTieOld(),
            "per_page"      => $qtd,
            "page"          => 2,
            );
        
        if(isset($_POST['filtro'])){
            $filtro = $_POST['filtro'];
            $data["filtro"] = $_POST['filtro'];
        }else{
            $filtro = null;
        }
        
        $this->pagination->initialize($config);
        $data["links"] = $this->pagination->create_links();
        if($cliente == 0){
            $data['clientes']   = $this->clientes->listaClienteTieOld($qtd, $place, $filtro);
        }elseif($cliente == 1){
            $data['clientes']   = $this->clientes->listaClienteTieOld($qtd, $place, $filtro);
        }
        
        echo $this->load->view('restrito/cliente/tableClientes', $data, TRUE);
    }
    
    public function oldClientes(){
        $data['clientes']    = $this->clientes->clientesNew();
        $this->header(3);
        $this->load->view('restrito/cliente/tableListAll', $data);
        $this->footer();
    }
    
    public function verCliente($id=null){
        if(is_null($id)){
            redirect(base_url('d2fb359e7478da4e7ec01ef527bdeb53'));
        }else{
            $data['cliente'] = $this->clientes->get($id);
            $data['pedidos'] = $this->comprasmodel->getAllLocacoes($data['cliente']['clt_fingerprint']);
            $data['dependentes']  = $this->dependentes->getAllDependentes($data['cliente']['clt_fingerprint']);

            $this->header(3);
            $this->load->view('restrito/vercliente', $data);
            $this->footer();
        }
    }
    
    public function cadastroCliente(){
       
        $data['lojas'] = $this->lojasmodel->getlojas();
        
        $this->header(3);
        $this->load->view('restrito/cliente/addCliente', $data);
        $this->footer();
    }
    
    public function insertCliente(){
        $this->load->database();
        $this->load->model('clientes');
        
        $senha = md5($this->input->post('senha'));
        $cliente = $this->clientes->getCPF($this->limpa($this->input->post('cpf')));
        $nome = $this->input->post('nome');
     
        if($nome != null || $nome != ""){
            if($cliente){
                $this->session->set_userdata('msg', 3);
            } else {
                if ($senha == ""){
                     $this->session->set_userdata('msg', 10);
                }else if (strlen ($senha) < 6){
                     $this->session->set_userdata('msg', 8);
                }else{
                $cliente = array(
                    'clt_nome'          => mb_strtoupper($this->input->post('nome')), 
                    'clt_apelido'          => mb_strtoupper($this->input->post('apelido')), 
                    'clt_cpf'           => removerCaracteresEspeciaiss($this->input->post('cpf')),
                    'clt_nasc'       => $this->input->post('nascimento'),
                    'clt_mail'            => $this->input->post('email'),
                    'clt_cel'         => removerCaracteresEspeciaiss($this->input->post('telefone')),
                    'clt_cep'              => removerCaracteresEspeciaiss($this->input->post('cep')),
                    'clt_logra'         => $this->input->post('rua'),
                    'clt_num'           => $this->input->post('numero'),
                    'clt_prov'           => $this->input->post('bairro'),
                    'clt_city'           => $this->input->post('cidade'),
                    'clt_uf'           => $this->input->post('estado'),
                    'clt_ativo'         => 1,
                    'clt_datacadastro'  => date('Y-m-d'),
                );
                
                $id = $this->clientes->insertTie($cliente);
                
                }   
            }
        }else{
            $this->session->set_userdata('msg', 7);
        }
        
      redirect(base_url('d2fb359e7478da4e7ec01ef527bdeb53'));
    }
    
    public function bloquearCliente(){
        
        $this->load->model("usuarios");
        $usuario =new Usuarios();
        
        $idVerifica = $this->session->userdata('user_id');
        $id = $this->input->post('id_cliente');
        $senha = $this->input->post('senha');
        $dadosUser = array(
            "usuario" => $idVerifica,
            "senha" => $senha
        );
        
        if($usuario->validar2( $dadosUser)){
           $cliente = array(
                'clt_ativo' => 0,
            );
            
            // #6 - Chamada da função para gerar log de cliente bloqueado.
            
	        $client_content = $this->clientes->get($id);
	        $dados = array(
	            'clt_id'    =>  $id,    
	            'clt_nome'  =>  $client_content['clt_nome'],
	            'status'        => 'Bloquear',
	        );
	        // $this->logCliente($dados);
	        
	        // Fim #6
            // print_r_pre($dados);
            // echo "foi";
            $this->clientes->update($id, $cliente);
            
            $this->session->set_userdata('alert', 1);
        } else {
            // echo "senha errada". print_r_pre($this->session->userdata());
            // print_r_pre($dadosUser);
          // $this->logBlock();
           $this->session->set_userdata('alert', 2);
        }
        
      redirect(base_url('d2fb359e7478da4e7ec01ef527bdeb53'));
        
    }
    
    public function desbloquearCliente(){
        
        $this->load->model("usuarios");
        $usuario =new Usuarios();
        
        $idVerifica = $this->session->userdata('user_id');
        $id = $this->input->post('id_cliente2');
        $senha = $this->input->post('senha');
        $dadosUser = array(
            "usuario" => $idVerifica,
            "senha" => $senha
        );
        
        if($usuario->validar2( $dadosUser)){
           $cliente = array(
                'clt_ativo' => 1,
            );
            
            // #6 - Chamada da função para gerar log de cliente bloqueado.
            
	        $client_content = $this->clientes->get($id);
	        $dados = array(
	            'clt_id'    =>  $id,    
	            'clt_nome'  =>  $client_content['clt_nome'],
	            'status'        => 'desbloquear',
	        );
	        // $this->logCliente($dados);
	        
	        // Fim #6
            //  print_r_pre($client_content);
            //  echo "foi";
            $this->clientes->update($id, $cliente);
            
            $this->session->set_userdata('alert', 1);
        } else {
            //  echo "senha errada". print_r_pre($this->session->userdata());
            //  print_r_pre($dadosUser);
          // $this->logBlock();
           $this->session->set_userdata('alert', 2);
        }
        
      redirect(base_url('d2fb359e7478da4e7ec01ef527bdeb53'));
        
    }
    
    public function dinamicoGetCliente(){
        
        
        echo json_encode($this->clientes->get($this->input->post('id')));
    }    
    
    public function logCliente($dados){
        $this->load->model('Logger');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'logclt_ip'             => $_SERVER['REMOTE_ADDR'],
            'logclt_user_id'        => $this->session->userdata('user_id'),
            'logclt_data'           => date('Y-m-d'),
            'logclt_hora'           => date('H:i:s'),
            'logclt_clt_nome'   => $dados['clt_nome'],  
            'logclt_clt_id'     => $dados['clt_id'],  
            'logclt_tipo'           => $dados['status'],  
        );
        
        $this->logger->logCliente($log);
    }
    
    public function logBlock(){
        $this->load->model('Logger');
        $this->load->model('usuarios');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'log_ip'             => $_SERVER['REMOTE_ADDR'],
            'log_user_id'        => $this->session->userdata('user_id'),
            'log_nome'           => $this->session->userdata('nome'),
            'log_data'           => date('Y-m-d'),
            'log_hora'           => date('H:i:s'),
            'log_funcao'         => 'd2fb359e7478da4e7ec01ef527bdeb53',  
            'log_tipo'           => 'SENHA',  
        );
        
        
        if($this->session->userdata('user_block')){
            $cont = $this->session->userdata('user_block');
            $this->session->set_userdata('user_block', $cont + 1);
        } else {
            $this->session->set_userdata('user_block', 1);
        }
        
        if($this->session->userdata('user_block') >= 3){
            $user_content = array(
                'ativo' => 0,
            );
            $this->usuarios->atualizarUsuario($user_content, $this->session->userdata('user_id'));
            
            $this->session->unset_userdata('user_block');
            
            redirect(base_url('dc28f82848daefd26e2f0f38094d5818'));
        }
        
        
        $this->logger->logBlock($log);
    }
    
    public function excluircliente(){    
        
      

        $this->load->model("usuarios");
        $usuario =new Usuarios();
        
        $idVerifica = $this->session->userdata('user_id');
        $id = $this->input->post('id_cliente3');
        $senha = $this->input->post('senha');
        $dadosUser = array(
            "usuario" => $idVerifica,
            "senha" => $senha
        );
        
        if($usuario->validar2( $dadosUser)){
            if($feadback = $this->clientes->excluirClienteTie($id)){
                if(in_array('error', $feadback)){
                    echo json_encode($feadback);
                } else {
                    echo json_encode(array("type" => "success", "msg" => "Cliente apagado com sucesso"));
                }
            } else {
                echo json_encode(array("type" => "error", "msg" => "Erro ao deletar cliente, tente novamente mais tarde!"));             
            }
    
            echo "senha correta". print_r_pre($this->session->userdata());
            print_r_pre($dadosUser);
        } else {
            echo "senha errada". print_r_pre($this->session->userdata());
            print_r_pre($dadosUser);
          // $this->logBlock();
           $this->session->set_userdata('alert', 2);
        }
        
    //  redirect(base_url('d2fb359e7478da4e7ec01ef527bdeb53'));
    }
    
    public function editarcliente($id){

        if(strlen($id) >= 32){
            $data['cliente'] = $this->clientes->getClienteTieHash($id);
        } else {
            $data['cliente'] = $this->clientes->getClienteTieId($id); 
        }
        
        $data['lojas'] = $this->lojasmodel->getlojas();
        
        $this->header(3);
        $this->load->view('restrito/cliente/editacliente', $data);
        $this->footer();
    }

    
    public function updateCliente(){      
        
        $id = $this->input->post('id');
        
        $edit = array(
            'clt_nome'              => addslashes($_POST['nome']),
            'clt_apelido'           => addslashes($_POST['apelido']),
            'clt_cpf'               => addslashes($_POST['cpf']),
            'clt_nasc'              => addslashes($_POST['nascimento']),
            'clt_mail'              => addslashes($_POST['email']),
            'clt_cel'               => addslashes($_POST['celular']),
            'clt_tel'               => addslashes($_POST['telefone']),
            'clt_cep'               => addslashes($_POST['cep']),
            'clt_logra'             => addslashes($_POST['rua']),
            'clt_num'               => addslashes($_POST['numero']),
            'clt_prov'              => addslashes($_POST['bairro']),
            'clt_city'              => addslashes($_POST['cidade']),
            'clt_uf'                => addslashes($_POST['estado']),
        );
        
        if($_POST['oldClient'] == 1){
            $edit['oldClient'] = 1;
        }

        if($this->clientes->updateTie($id, $edit)){
            Redirect('admin/adminclientes/clientes');
        } else {
            Redirect('admin/adminclientes/editarcliente/'. $id);
        }    
    }

    public function insertClienteTie(){
        $this->load->database();
        $this->load->model('clientes');
        
        $cliente = $this->clientes->getCPFTie(addslashes($_POST['cpf']));
        $nome = $this->input->post('nome');
        
        if($nome != null || $nome != ""){
            if($cliente){
                $this->session->set_userdata('msg', 3);
            } else {
                $new = array(
                    'clt_nome'      => addslashes($_POST['nome']),
                    'clt_apelido'   => addslashes($_POST['apelido']),
                    'clt_cpf'       => addslashes($_POST['cpf']),
                    'clt_nasc'      => addslashes($_POST['nascimento']),
                    'clt_mail'      => addslashes($_POST['email']),
                    'clt_cel'       => addslashes($_POST['celular']),
                    'clt_tel'       => addslashes($_POST['telefone']),
                    'clt_cep'       => addslashes($_POST['cep']),
                    'clt_logra'     => addslashes($_POST['rua']),
                    'clt_num'       => addslashes($_POST['numero']),
                    'clt_prov'      => addslashes($_POST['bairro']),
                    'clt_city'      => addslashes($_POST['cidade']),
                    'clt_uf'        => addslashes($_POST['estado']),
                );                
                $id = $this->clientes->insertTie($new);
            }
        }else{
            $this->session->set_userdata('msg', 7);
        }
        
      redirect(base_url('d2fb359e7478da4e7ec01ef527bdeb53'));
    }
    
    
    public function seeCliente($id=null){
        
    }
    
    public function editCliente($id=null){
        
    }
    
    public function seeClienteOld($id=null){
        
    }
    
    public function activeCliente($id=null){
        
    }
    
    public function exibeClientesOldTable(){
        $limit  = $_POST['length'];
        $filter = $_POST['search']['value'];
        $start  = $_POST['start'];
        $data = $this->clientesOldDatatables->clientes($limit, $start, $filter);
        $all = $this->clientesOldDatatables->clientesCount();
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $all,//numero de registros no banco
            "recordsFiltered" => $all,//numero de registros depois de filtrado
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    
    public function buscadadosClienteOld(){
        echo json_encode($this->clientesOldDatatables->dataClientesOld($_POST));
    }
    
    public function updatedadosClienteOld(){
        $data['clienteOld'] = $this->clientesOldDatatables->CadastroClientOld($_POST);
        if($_POST['action'] === 'see'){
            $data['readable'] = 1;
        }else{
            $data['readable'] = 0;
        }
        
        $this->header(3);
        $this->load->view('restrito/cliente/editacliente', $data);
        $this->footer();
        
    }
    
    public function delCliente(){


        $this->load->model("usuarios");
        $usuario =new Usuarios();
        
        $idVerifica = $this->session->userdata('user_id');
        $id = $this->input->post('id_cliente3');
        $senha = $this->input->post('senha');
        $dadosUser = array(
            "usuario" => $idVerifica,
            "senha" => $senha
        );
        
        if($usuario->validar2($dadosUser)){

            $this->clientesOldDatatables->trashCadastroClient($id);
    
            // echo "senha correta". print_r_pre($this->session->userdata());
            // print_r_pre($dadosUser);
        } else {
            // echo "senha errada". print_r_pre($this->session->userdata());
            // print_r_pre($dadosUser);
          // $this->logBlock();
           $this->session->set_userdata('alert', 2);
        }
        
      redirect(base_url('d2fb359e7478da4e7ec01ef527bdeb53'));

        // $this->clientesOldDatatables->trashCadastroClient($_POST);
        // redirect(base_url('d2fb359e7478da4e7ec01ef527bdeb53'));
    }
    
    public function bloqueioCliente(){
        $this->clientesOldDatatables->blockCadastroClient($_POST);
        redirect(base_url('d2fb359e7478da4e7ec01ef527bdeb53'));
    }
}