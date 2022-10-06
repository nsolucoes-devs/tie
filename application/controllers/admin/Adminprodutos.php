<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminprodutos extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('produtos');
        $this->load->model('departamentos');
        $this->load->model('marcas');
        $this->load->model('opcoes');
        $this->load->model('estoque');
        $this->load->model('lojasmodel');
        $this->load->model('usuarios');
    }
    
    public function produtos(){
        
        if($this->session->userdata('alert')){
            $data['alert'] = $this->session->userdata('alert');
            $this->session->unset_userdata('alert');
        }
        
        if($_POST){
            $filtros = $_POST;
        }else{
            $filtros = null;
        }
        
        $data['produtos']  = $this->produtos->getAllProdutos($filtros);
        $this->header(2);
        $this->load->view('restrito/produto/listagemProdutos', $data);
        $this->footer();
    }
    
    public function cadastrarProduto(){
        $data['marcas']         = $this->marcas->getAllAtivos();
        $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        $data['tamanhos']       = $this->opcoes->getAllTamanhos();
        $data['cores']          = $this->opcoes->getAllCores();
        $data['estoques']       = $this->estoque->getAll();
        $data['lojas']          = $this->lojasmodel->getlojas();
        
        $data['see']            = false;
        
		$this->header(2);
		$this->load->view('restrito/produto/add_produto', $data);
		$this->footer();
	}
    
    private function limpaValor($valor){
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        return $valor;
    }
    
    /*public function editaProduto(){
	    
	    $id = $this->uri->segment(2);
	    
	    $data['produto']        = $this->produtos->get($id);
	    $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        $data['marcas']         = $this->marcas->getAllAtivos();
        $data['tamanhos']       = $this->opcoes->getAllTamanhos();
        $data['cores']          = $this->opcoes->getAllCores();
        $data['lojas']          = $this->lojasmodel->getlojas();
        
        $data['estoques'] = $this->estoque->getNomeProd($data['produto']['produto_nome']);
        
        
        $produto_id = $data['produto']['produto_id'];
        
    
        $estoque_lojas = $this->estoque->getEstoquePorLoja($data['produto']['produto_nome']);
      
        $data['estoque_lojas'] = $estoque_lojas;

		$this->header(2);
		$this->load->view('restrito/editaproduto', $data);
		$this->footer();
	}*/
	
	public function excluirProduto(){
	    
	    $dados = array(
	        'usuario'   => $_SESSION['user_id'],
	        'senha'     => $_POST['senha'],
	        );
	    $res = $this->usuarios->validar2($dados);
	    
	    if($res > 0){
	        $this->session->set_userdata('alert', 3);
	        // #5 - Chamada da função para gerar log de produto, quando der certo a senha e concluir a exclusão.
	        $produto = $this->produtos->get($_POST['id']);
	        $dados = array(
	            'produto_id'    => $_POST['id'],    
	            'produto_nome'  => $produto['produto_nome'],
	        );
	        $this->logProduto($dados);
	        // Fim #5
	        
	        $this->produtos->delete($_POST['id']);    
	    } else {
	        $this->logBlock();
	        $this->session->set_userdata('alert', 4);
	    }
	    redirect(base_url('391a027a8fef2eba4487a00156901156'), 'refresh');
	}
	
	public function excluirImagem(){
	    $id        = $this->input->post('excluirimagem');
	    $idproduto = $this->input->post('idproduto');

	    $dados = array (
	        'produto_imagens_opcional' . $id => null, 
	    );
	    
        $produto = $this->produtos->get($idproduto);

	    unlink($produto['produto_imagens_opcional'. $id]);
	    
	    $this->produtos->update($idproduto, $dados);   
	    
	    
	    
	    redirect(base_url('ba641dd761d2b77e2dd91ebff5201646/'.$idproduto), 'refresh');
	}
	
	public function updateProduto(){
	    $id = $this->input->post('id');
	 
        
        $estoqueid = $this->estoque->getNomeProd(mb_strtoupper($this->input->post('nome')));
        $quantidade = 0;
        
        foreach($estoqueid as $est){
        
            $quantidade = $quantidade + $est['estoque_quantidade'];
            
        }
        $desc = $this->input->post('desc');

       
	    $produto = array(
            'produto_grupo'                     =>  $this->input->post('grupo'),
            'produto_nome'                      => mb_strtoupper($this->input->post('nome')),
            'produto_modelo'                    => mb_strtoupper($this->input->post('modelo')),
            'produto_codigo'                    => $this->input->post('codigo'),
            'produto_fabricante'                => mb_strtoupper($this->input->post('fabricante')),
            'produto_habilitado'                => $this->input->post('habilitado'),
            'produto_quantidade'                => $quantidade,
            'produto_estoque_minimo'            => $this->input->post('minimo'),
            'produto_minimo_venda'              => $this->input->post('minimo_venda'),
            'produto_preco_promocao'            => $this->limpaValor($this->input->post('preco_promocao')),
            'produto_preco_promocao_ativo'      => $this->input->post('preco_promocao_ativo'),
            'produto_desconto'                  => $this->input->post('desconto'),
            'produto_desconto_ativo'            => $this->input->post('desconto_ativo'),
            'produto_datainicial_promocao'      => $this->input->post('datainicial_promocao'),
            'produto_datafinal_promocao'        => $this->input->post('datafinal_promocao'),
            'produto_datafinal_promocao_ativo'  => $this->input->post('datafinal_promocao_ativo'),
            'produto_cupom'                     => $this->input->post('cupom'),
            'produto_cupom_ativo'               => $this->input->post('cupom_ativo'),
            'produto_marca_id'                  => $this->input->post('marca'),
            'produto_departamentos'             => $this->montarArray($this->input->post('departamentos')),
            'produto_relacionados'              => $this->montarArray($this->input->post('relacionados')),
            'produto_tamanhos'                  => $this->input->post('tamanhos'),
            'produto_cores'                     => $this->input->post('cores'),
            'produto_variacoes'                 => $this->montarArray($this->input->post('variacoes')),
            'produto_reduzir'                   => $this->input->post('reduzir'),
            'produto_un_medida'                 => $this->input->post('medida'),
            'produto_comprimento'               => $this->input->post('comprimento'),
            'produto_largura'                   => $this->input->post('largura'),
            'produto_altura'                    => $this->input->post('altura'),
            'produto_un_peso'                   => $this->input->post('un_peso'),
            'produto_peso'                      => $this->input->post('peso'),
            'produto_sku'                       => $this->input->post('sku'),
            'produto_ncm'                       => $this->input->post('ncm'),
            'produto_cest'                      => $this->input->post('cest'),
            'produto_upc'                       => $this->input->post('upc'),
            'produto_ean'                       => $this->input->post('ean'),
            'produto_jan'                       => $this->input->post('jan'),
            'produto_isbn'                      => $this->input->post('isbn'),
            'produto_especifico'                => $this->input->post('produto_especifico'),
            'produto_idloja'                    => $this->input->post('produto_especificoid'),
            'produto_mpn'                       => $this->input->post('mpn'),
            'produto_detalhes'                  => $desc,
        );
        $produto_img = "";
       
      
        if (!empty($_FILES['imagem']['name'])) {
           
            $config2['upload_path']          = './imagens/trajes/';
            $config2['allowed_types']        = 'gif|jpg|png|jpeg';
            $config2['max_size']             = '10000';
            $config2['overwrite']            = true;
            $config2['file_name']            = $id.'_imagem_principal.jpg';
            $this->load->library('upload', $config2);
            $this->upload->initialize($config2);
    
            $this->upload->do_upload('imagem');
          //  print_r_pre($reponos);

            $produto_img = "/imagens/trajes/".$id.'_imagem_principal.jpg';
            $produto["produto_imagens_opcional1"] = $produto_img;
           
        }
        
      
     // print_r_pre($produto);
        if($this->produtos->update($produto)){
            $this->session->set_userdata('alert', 203);
        } else {
            $this->session->set_userdata('alert', 500);
        }
        
     redirect(base_url('391a027a8fef2eba4487a00156901156'));
	}
	
	/*public function verProduto(){
	    $id = $this->uri->segment(2);
	    
	    $data['produto']        = $this->produtos->get($id);
	    $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        $data['marcas']         = $this->marcas->getAllAtivos();
        $data['tamanhos']       = $this->opcoes->getAllTamanhos();
        $data['cores']          = $this->opcoes->getAllCores();

        $data['estoques'] = $this->estoque->getNomeProd($data['produto']['produto_nome']);
        $quantidade = 0;
        
        
        $estoque_lojas = $this->estoque->getEstoquePorLoja($data['produto']['produto_nome']);
      
        $data['estoque_lojas'] = $estoque_lojas;
        
        foreach($data['estoques'] as $est){    
            $quantidade = $quantidade + $est['estoque_quantidade'];
        }
        
		$this->header(2);
		$this->load->view('restrito/verproduto', $data);
		$this->footer();
	}*/
    
    public function novoProduto(){
      
        $this->produtos->createUpdate($_POST);
        $this->session->set_userdata('alert', 1);

        redirect(base_url('391a027a8fef2eba4487a00156901156'));
    }
    
    public function montarArray($itens){
        $array  = "";
        $cont   = 0;
        if($itens){
            foreach($itens as $i){
                if($cont == 0){
                    $array .= $i;    
                } else {
                    $array .= '¬' . $i;
                }
                $cont++;
            }
        }
        return $array;
    }
    
    public function uploadOpcionais($file, $name){
        $config2['upload_path']          = './imagens/produtos/opcionais/';
        $config2['allowed_types']        = 'gif|jpg|png|jpeg';
        $config2['max_size']             = '10000';
        $config2['overwrite']            = true;
        $config2['file_name']            = $name . '.jpg';
        
        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);
        
        $this->upload->do_upload($file);
    }
    
    public function logProduto($dados){
        $this->load->model('Logger');
        date_default_timezone_set('America/Sao_Paulo');
        
        $log = array(
            'logproduto_ip'             => $_SERVER['REMOTE_ADDR'],
            'logproduto_user_id'        => $this->session->userdata('user_id'),
            'logproduto_data'           => date('Y-m-d'),
            'logproduto_hora'           => date('H:i:s'),
            'logproduto_produto_nome'   => $dados['produto_nome'],  
            'logproduto_produto_id'     => $dados['produto_id'],  
        );
        
        $this->logger->logProduto($log);
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
            'log_funcao'         => '391a027a8fef2eba4487a00156901156',  
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
    
    
    public function editaProduto($id){
        
        $data['marcas']         = $this->marcas->getAllAtivos();
        $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        $data['tamanhos']       = $this->opcoes->getAllTamanhos();
        $data['cores']          = $this->opcoes->getAllCores();
        $data['estoques']       = $this->estoque->getAll();
        $data['lojas']          = $this->lojasmodel->getlojas();
        
        $data['traje']          = $this->produtos->getTrajeById($id);
        $data['id']             = $id;
        $data['see']            = false;

      //  print_r_pre( $data['traje']);
        
		$this->header(2);
		$this->load->view('restrito/produto/editaproduto', $data);
		$this->footer();
	}
	
	public function verProduto($id){
	    $data['marcas']         = $this->marcas->getAllAtivos();
        $data['produtos']       = $this->produtos->getAll();
        $data['departamentos']  = $this->departamentos->getAll();
        $data['tamanhos']       = $this->opcoes->getAllTamanhos();
        $data['cores']          = $this->opcoes->getAllCores();
        $data['estoques']       = $this->estoque->getAll();
        $data['lojas']          = $this->lojasmodel->getlojas();
        
        $data['traje']          = $this->produtos->getTrajeById($id);
        
        $data['see']            = true;
        
		$this->header(2);
		$this->load->view('restrito/produto', $data);
		$this->footer();
	}
    
    function removeVariante(){
        $data = $this->produtos->removeVariante($_POST['id']);
        echo $data;
    }
    
    function alteraVariante(){
        $data = $this->produtos->alteraVariante($_POST);
        echo $data;
    }
    
    function novaVariante(){
        $data = $this->produtos->novaVariante($_POST);
        echo json_encode($data, true);
    }
}