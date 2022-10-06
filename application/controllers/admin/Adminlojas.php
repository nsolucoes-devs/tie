<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminlojas extends Admin_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('lojasmodel');
    }
    
    public function verLoja(){
        
        $data['lojas'] = $this->lojasmodel->getlojas();
        
        $this->header(6);
        $this->load->view('restrito/lojas', $data);
        $this->footer();
    }
    
    public function getlojaid(){
        $a = $this->lojasmodel->getloja($this->input->post('loja'));
        echo json_encode($a);
    }
    
    public function editloja(){
        
        $id = $this->input->post('id-loja-modal2');
        
        $new = array(
            'nome'             => addslashes($_POST['nome-loja-modal2']),
            'CNPJ'             => addslashes($_POST['cnpj-loja-modal2']),
            'cep'              => addslashes($_POST['cep-loja-modal2']),
            'cidade'           => addslashes($_POST['cidade-loja-modal2']),
            'estado'           => addslashes($_POST['estado-loja-modal2']),
            'rua'              => addslashes($_POST['rua-loja-modal2']),
            'numero'           => addslashes($_POST['numero-loja-modal2']),
            'bairro'           => addslashes($_POST['bairro-loja-modal2']),
            'telefone'         => addslashes($_POST['tel-loja-modal2']),
            'estoque_separado' => addslashes($_POST['estoque-loja-modal2']),
        );
        
        $this->lojasmodel->updateloja($id, $new);
        
        redirect(base_url('admin/adminlojas/verLoja'));
    }
    
    public function cadloja(){
        
        $new = array(
            'nome'             => addslashes($_POST['cad-nome-loja']),
            'CNPJ'             => addslashes($_POST['cad-cnpj-loja']),
            'cep'              => addslashes($_POST['cad-cep-loja']),
            'cidade'           => addslashes($_POST['cad-cidade-loja']),
            'estado'           => addslashes($_POST['cad-estado-loja']),
            'rua'              => addslashes($_POST['cad-rua-loja']),
            'numero'           => addslashes($_POST['cad-num-loja']),
            'bairro'           => addslashes($_POST['cad-bairro-loja']),
            'telefone'         => addslashes($_POST['cad-tel-loja']),
            'estoque_separado' => addslashes($_POST['cad-estoque-loja']),
        );
        
        $this->lojasmodel->insertloja($new);
        
        redirect(base_url('admin/adminlojas/verLoja'));
    }
    
    public function excluirloja(){
        
        $id = $this->input->post('id-loja-ex');
        
        $this->lojasmodel->excluirloja($id);
        
        redirect(base_url('admin/adminlojas/verLoja'));
    }
}

?>