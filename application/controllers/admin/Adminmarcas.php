<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmarcas extends Admin_Controller {
    
    private function include(){
        $this->load->database();
        $this->load->model('marcas');
        $this->load->model('produtos');
    }
    
    public function marcas(){
        $this->include();
        $this->load->library("pagination");
        
        $filtro = $this->input->post('filtro');
        $filtro = mb_strtoupper($filtro);
        if($this->uri->segment(2) == 'f'){
            $filtro = strtoupper(urldecode($this->uri->segment(3))); 
        }
        
        if($filtro){
            $config = array();
            $config["base_url"] = base_url('edb728d5b2d758ff44b1b0e9f991ead9/f/' . $filtro . '/');
            $config["total_rows"] = $this->marcas->get_countFiltro($filtro);
            $config["per_page"] = 10;
            $config["uri_segment"] = 4;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
    
            $data['marcas']  = $this->marcas->getAllMarcasFiltro($filtro, 10, $page);
            $data['filtro']    = $filtro;
        } else {
            $config = array();
            $config["base_url"] = base_url('edb728d5b2d758ff44b1b0e9f991ead9/n/');
            $config["total_rows"] = $this->marcas->get_count();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            
            $this->pagination->initialize($config);
            
            $data['links'] = $this->pagination->create_links();
            
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    
            $data['marcas']  = $this->marcas->getAllMarcas(10, $page);
        
        }

        if($this->session->userdata('alert')){
            $data['alert'] = $this->session->userdata('alert');
            $this->session->unset_userdata('alert');
        }else {
            $data['alert'] = null;
        }
        
        if($this->session->userdata('produtosmarca')){
            $data['produtosmarca'] = $this->session->userdata('produtosmarca');
            $this->session->unset_userdata('produtosmarca');
        }else {
            $data['produtosmarca'] = null;
        }
        
        $this->header(2);
        $this->load->view('restrito/marcas', $data);
        $this->footer();
    }
    
    public function insertMarca(){
        $this->include();
        
        $marca = array(
            'marca_nome'     => $this->input->post('adicionarNome'),    
            'marca_ativo'    => $this->input->post('adicionarAtivo'),
            );
        
        $this->marcas->insert($marca);
        
        $this->session->set_userdata('alert', 1);
        
        redirect(base_url('edb728d5b2d758ff44b1b0e9f991ead9'));
    }
    
    public function updateMarca(){
        $this->include();
        
        $id    = $this->input->post('id_editar');
        $nome  = $this->input->post('id_nome');
        $ativo = $this->input->post('id_ativo');
        
        $marca = array(
            'marca_nome' => $this->input->post('editarNome'),
            'marca_ativo' => $this->input->post('editarAtivo'),
            );
        
        $this->marcas->update($id, $marca, $nome, $ativo);
    
        redirect(base_url('edb728d5b2d758ff44b1b0e9f991ead9'));
    }
    
    public function cadastro(){
        $this->include();
        $data['departamentos'] = $this->departamentos->getAll();
        $data['marcas'] = $this->marcas->getAll();
        $this->header(2);
        $this->load->view('restrito/marca', $data);
        $this->footer();
    }
    
    public function verMarca(){
	    $this->include();
	    
	    $id            = $this->input->post('id_editar');
        $nome          = $this->input->post('id_nome');
        $ativo         = $this->input->post('id_ativo');
	    
	    $marca = array(
            'marca_nome'  => $this->input->post('editarNome'),
            'marca_ativo' => $this->input->post('editarAtivo'),
            );
        
        $this->marcas->ver($id, $marca, $nome, $ativo);
	}
	
	public function excluirMarca(){
	   $this->include();
	    
	   $produtos = $this->produtos->getAll();
	   $id = $this->input->post('id_excluir');
	   
	   $itens = "";
	   $existe = false;
	   
	   
	   foreach($produtos as $p){
	       if ($p['produto_marca_id'] == $id){
	           $itens .="<br>". $p['produto_nome'] . " <br>";
               $existe = true;
	       }
	   }
          
       
            
       if ($existe == true){
           $this->session->set_userdata('produtosmarca', $itens);
       }else{
        
       $this->marcas->delete($id);
        
       $this->session->set_userdata('alert', 3);
       }
            
       redirect(base_url('edb728d5b2d758ff44b1b0e9f991ead9'));
	}
	
	public function dinamicoAdicionarMarca(){
        $this->include();
        
        $marca = array(
            'marca_nome'     => $this->input->post('nome'),    
            'marca_ativo'    => 1,
        );
        
        $id = $this->marcas->insert($marca);
        
        $array = array(
            'id'    => $id,
            'nome'  => $this->input->post('nome'),
        );
        
        echo json_encode($array);
    }
    
}