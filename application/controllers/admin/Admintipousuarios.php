<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admintipousuarios extends Admin_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('tipousuarios');
    }
    
    public function tipoUsuarios(){
        
        $this->load->library("pagination");
        /*
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('13858aeb4c9a5807927c7b952dace1fb/f/' . $filtro . '/');
            $config["total_rows"] = $this->tipousuarios->get_countFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['usuarios']  = $this->tipousuarios->getAllTipoUsuariosFiltro($filtro, 10, $page);
            $data['filtro']    = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('13858aeb4c9a5807927c7b952dace1fb/n/');
            $config["total_rows"] = $this->tipousuarios->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    */
        $data['usuarios']  = $this->tipousuarios->getAllTipoUsuarios(10, 0);
        $data['links'] =  $this->pagination->create_links();
        $this->header(3);
        $this->load->view('restrito/tipousuarios', $data);
        $this->footer();
    }
    
    public function telaEditaTipoUsuario($id){
        
        $aux = $this->tipousuarios->getType($id);
        //$data['tipo'] = $this->tipousuarios->getType($id);
        $data = array( 
            'see'       => false,
            'perm'      => $aux['perfilusuario_permissoes'],
            'permName'  => $aux['perfilusuario_nome'],
            'permId'    => $aux['perfilusuario_id'],
        );
        
        $this->header(3);
        $this->load->view('restrito/cadastrotipousuario', $data);
        $this->footer();
    }
    
    public function verTipoUsuario($id){
        
        $aux = $this->tipousuarios->getType($id);
         
        $data = array( 
            'see'       => 'true',
            'perm'      => $aux['perfilusuario_permissoes'],
            'permName'  => $aux['perfilusuario_nome'],
        );
        
        $this->header(3);
        $this->load->view('restrito/cadastrotipousuario', $data);
        $this->footer();
    }
    
    public function excluirTipoUsuario(){
        
        
        $id = $this->input->post('id');
        
        // #7 - Chamada da função para gerar log de cliente desbloqueado.
            
        $tipo_content = $this->tipousuarios->get($id);
        
        $dados = array(
            'perfilusuario_id'    => $id,    
            'perfilusuario_nome'  => $tipo_content['perfilusuario_nome'],
        );
        
        $this->logTipoUsuario($dados);
        
        // Fim #7
        
        $this->tipousuarios->excluirTipoUsuario($id);
        
        redirect(base_url('13858aeb4c9a5807927c7b952dace1fb'));
    }
    
    public function atualizarTipoUsuario(){
        
        $aux = $this->tipousuarios->getType($id);
         
        $data = array( 
            'see'       => 'false',
            'perm'      => $aux['perfilusuario_permissoes'],
            'permName'  => $aux['perfilusuario_nome'],
        );
        
        $this->header(3);
        $this->load->view('restrito/cadastrotipousuario', $data);
        $this->footer();
    }
    
    public function cadastroTipoUsuario(){
        $data['see']       = false;
        $data['perm']       = "";
        
        $this->header(3);
        $this->load->view('restrito/cadastrotipousuario', $data);
        $this->footer();
    }
    
    public function salvaTipoUsuario(){
	
        $dados = array(
            'perfilusuario_nome'        => $_POST['nome'],
            'perfilusuario_permissoes'  => "¬".implode("¬", $_POST['permissao'])."¬",
            'perfilusuario_create'      => date('Y-m-d'),
            'perfilusuario_ativo'       => 1,
        );
        
        if(strpos($dados['perfilusuario_permissoes'], 'Dash') || strpos($dados['perfilusuario_permissoes'], 'Das2')){
            $dados['perfilusuario_permissoes'] .= "DASH¬";
        }
        
        
        if(strpos($dados['perfilusuario_permissoes'], 'Opco') || strpos($dados['perfilusuario_permissoes'], 'Forn') || strpos($dados['perfilusuario_permissoes'], 'Marc') ||  strpos($dados['perfilusuario_permissoes'], 'Depa') || strpos($dados['perfilusuario_permissoes'], 'Traj')){
            $dados['perfilusuario_permissoes'] .= "CATA¬";
        }

   
        if(strpos($dados['perfilusuario_permissoes'], 'Clie') || strpos($dados['perfilusuario_permissoes'], 'Usua') ||  strpos($dados['perfilusuario_permissoes'], 'Tipo') ){
            $dados['perfilusuario_permissoes'] .= "USUA¬";
        }
        
        
        if(strpos($dados['perfilusuario_permissoes'], 'Pedi') || strpos($dados['perfilusuario_permissoes'], 'Rela')){
            $dados['perfilusuario_permissoes'] .= "FINA¬";
        }
        
        if(strpos($dados['perfilusuario_permissoes'], 'Agen') || strpos($dados['perfilusuario_permissoes'], 'Resa')){
            $dados['perfilusuario_permissoes'] .= "AGEN¬";
        }
        
        if(strpos($dados['perfilusuario_permissoes'], 'Ajus') ||strpos($dados['perfilusuario_permissoes'], 'Stat') || strpos($dados['perfilusuario_permissoes'], 'SMSs') || strpos($dados['perfilusuario_permissoes'], 'Site') || strpos($dados['perfilusuario_permissoes'], 'Loja')){
            $dados['perfilusuario_permissoes'] .= "DEFI¬";
        }
        
        if(array_key_exists('id_tipo', $_POST)){
         $dados['key'] = $_POST['id_tipo'];
        }

        $this->tipousuarios->setUserType($dados);
            
        redirect(base_url('13858aeb4c9a5807927c7b952dace1fb'));
    }
    
    public function logTipoUsuario($dados){
        $this->load->model('Logger');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'logtipousuario_ip'             => $_SERVER['REMOTE_ADDR'],
            'logtipousuario_user_id'        => $this->session->userdata('user_id'),
            'logtipousuario_data'           => date('Y-m-d'),
            'logtipousuario_hora'           => date('H:i:s'),
            'logtipousuario_tipo_nome'      => $dados['perfilusuario_nome'],  
            'logtipousuario_tipo_id'        => $dados['perfilusuario_id'],  
        );
        
        $this->logger->logTipoUsuario($log);
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
            'log_funcao'         => 'admin/adminclientes/clientes',  
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

}    
    
    
    
    
    