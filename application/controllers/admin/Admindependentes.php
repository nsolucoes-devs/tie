<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admindependentes extends Admin_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('dependentes');
        $this->load->model('clientes');
        $this->load->model('lojasmodel');
    }
    
    public function verDependente(){
        $this->load->model('comprasmodel');
        
        $id = $this->uri->segment(2);
        $id_cliente = $_GET['idCliente'];
        $data['cliente'] = $this->clientes->getClienteById($id_cliente);
        
        $data['dependente'] = $this->dependentes->get($id);
        $data['pedidos'] = $this->comprasmodel->getAllPedidoByDependente($id);
        
        $this->load->library("pagination");
        
        $this->header(3);
        $this->load->view('restrito/verdependente', $data);
        $this->footer();
    }
    
    public function cadastroDependente($msg = "" , $id_Cliente = ""){
        $data['lojas'] = $this->lojasmodel->getlojas();
        $id_cliente = $_GET['idCliente'];
       
        if($msg != ""){
            $data['msg'] = $msg;
            $id_cliente = $id_Cliente ;
        }

        $data['cliente'] = $this->clientes->getClienteById($id_cliente);
        
        $this->header(3);
        $this->load->view('restrito/dependente', $data);
        $this->footer();
    }
    
    // public function insertDependente(){
    //     $this->load->database();
    //     $this->load->model('dependentes');
        
    //     $id_cliente = $this->input->post('id_cliente');
    //     $nome = $this->input->post('nome');
        
    //     if($nome != null || $nome != ""){
    //         if($id_cliente != null || $id_cliente != ""){
    //             $dependente = array(
    //                 'dependente_nome'           => mb_strtoupper($this->input->post('nome')),    
    //                 'dependente_cliente_id'     => $this->input->post('id_cliente'),   
    //                 'dependente_nascimento'     => $this->input->post('nascimento'),
    //                 'dependente_email'          => $this->input->post('email'),
    //                 'dependente_telefone'       => removerCaracteresEspeciaiss($this->input->post('telefone')),
    //                 'dependente_genero'         => $this->input->post('genero'),
    //                 'dependente_cep'            => removerCaracteresEspeciaiss($this->input->post('cep')),
    //                 'dependente_endereco'       => $this->input->post('rua'),
    //                 'dependente_numero'         => $this->input->post('numero'),
    //                 'dependente_loja'           => $this->input->post('lojas'),
    //                 'dependente_complemento'    => $this->input->post('complemento'),
    //                 'dependente_bairro'         => $this->input->post('bairro'),
    //                 'dependente_cidade'         => $this->input->post('cidade'),
    //                 'dependente_estado'         => $this->input->post('estado'),
    //                 'dependente_ativo'          => 1,
    //                 'dependente_datacadastro'   => date('Y-m-d'),
    //             );
    //             $id = $this->dependentes->insert($dependente); 
                
    //             $this->session->unset_userdata('msg');
    //             redirect(base_url('50d849c4ab008a40ab39cdaf352f35f5/'. $id_cliente ));
    //         } else {
    //             $this->session->set_userdata('msg', 3);
    //             redirect(base_url('admin/admindependentes/cadastroDependente?idCliente='. $id_cliente));
    //         }
    //     }else{
    //         $this->session->set_userdata('msg', 7);
    //         redirect(base_url('admin/admindependentes/cadastroDependente?idCliente='. $id_cliente));
    //     }
    // }
    
    
    public function insertDependente(){
        $this->load->database();
        $this->load->model('dependentes');
        
        $id_cliente = $this->input->post('id_cliente');
        
                $dependente = array(
                    'dpd_nome'      => mb_strtoupper($this->input->post('nome')),
                    'dpd_cpf'       => $this->input->post('cpf'),
                    'dpd_fone'      => $this->input->post('telefone'),
                    'dpd_cep'       => $this->input->post('cep'),
                    'dpd_num'       => $this->input->post('numero'),
                    'dpd_chave'     => $this->input->post('chave_cliente'),
                );
                $id = $this->dependentes->insert($dependente); 
                

              
              $this->cadastroDependente($id , $id_cliente);
            
      
    }
    
    
    public function bloquearDependente(){
        $id = $this->input->post('idblock');
        $id_cliente = $_GET['idCliente'];
        $dependente = array(
            'dependente_ativo' => 0,
        );
        $this->dependentes->update($id, $dependente);
        redirect(base_url('50d849c4ab008a40ab39cdaf352f35f5/'. $id_cliente));
    }
    
    public function desbloquearDependente(){
        $id = $this->input->post('iddesblock');
        $id_cliente = $_GET['idCliente'];
        $dependente = array(
            'dependente_ativo' => 1,
        );
        $this->dependentes->update($id, $dependente);
        redirect(base_url('50d849c4ab008a40ab39cdaf352f35f5/'. $id_cliente));
    }
    
    
    public function excluirDependente(){
    $id = $this->input->post('idtrash');
    $id_cliente = $_GET['idCliente'];
    $this->dependentes->excluirDependente($id);
    redirect(base_url('50d849c4ab008a40ab39cdaf352f35f5/'. $id_cliente));
    
    }
    
    public function editarDependente($id_dpt = "" ,$visualiza = ""){
        $disabled = "";
        $titulo = "<h2 style='color: #0000009e;'>Edição dependente</h2>"; 
        $breadcrumb = "Edição dependente";
        $id = $id_dpt;
        $id_cliente = $_GET['idCliente'];
        $data['cliente'] = $this->clientes->getClienteById($id_cliente);
        $data['lojas'] = $this->lojasmodel->getlojas();
        $data['dependente'] = $this->dependentes->get($id);

       // print_r_pre($data);
        if($visualiza == "1"){
            $disabled = "readonly";
            $titulo = "<h2 style='color: #0000009e;'><b>Visualizar dependente</b></h2>"; 
            $breadcrumb = "Visualizar dependente";
        }
        $data['disabled'] = $disabled;
        $data['titulo'] = $titulo;
        $data['breadcrumb'] = $breadcrumb;
        
        $this->header(3);
        $this->load->view('restrito/dependentes/edita_dependente', $data);
        $this->footer();
    }
    
    public function updateDependente(){
	    $id = $this->input->post('id');
	    $id_cliente = $this->input->post('id_cliente');
	    $new = array(
            'dpd_nome' => $this->input->post('nome'),
            'dpd_cpf' => $this->input->post('cpf'),
            'dpd_fone' => $this->input->post('telefone'),
            'dpd_cep' => $this->input->post('cep'),
            'dpd_num' => $this->input->post('numero'),
	    );
	    
	    $this->dependentes->update($id, $new);
	    
	    Redirect('50d849c4ab008a40ab39cdaf352f35f5/'. $id_cliente);
	    
	}
}