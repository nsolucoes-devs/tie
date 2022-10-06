<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdv extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
	    $this->load->library("pagination");
	    $this->load->library("session");
	    $this->load->model('pdv/crudclientes');
	    $this->load->model('pdv/crudcompras');
	    $this->load->model('pdv/crudlistas');
	    $this->load->model('pdv/crudformas');
	    $this->load->model('pdv/caixamodel');
	    $this->load->model('pdv/crudestoque');
	    $this->load->model('pdv/tipo_produto');
	    $this->load->model('pdv/estados');
	    $this->load->model('pdv/cidades');
	    $this->load->model('pdv/crudprodutos');
    }
    
	public function index(){
        $caixa2 = null;
        $idListaVazia = $this->crudlistas->inserirListaVazia();
        
	    $data['estoques'] = $this->crudestoque->getEstoque();
	    $data['idLista'] = $idListaVazia;
	    $data['formas'] = $this->crudformas->getFormasAtivo();
	    $data['idCompra'] = $this->crudcompras->cadastrarCompra($idListaVazia, $caixa2);
	    $data['clientes'] = $this->crudclientes->getClientes();
	    $data['estado'] = $this->estados->getEstados();
	    $data['cidade'] = $this->cidades->getCidades();
	    $data['produtos'] = $this->crudprodutos->getProdutos();
	    
	    $data['lojas'] = $this->caixamodel->pegaLoja();
	    $data['block'] = $this->session->userdata("func_id");
	    $data['place'] = $this->session->userdata("loja_id");
	    if($this->session->userdata("loja_id") != 0){
	        $data['vendedor'] = $this->caixamodel->pegaVendedor($this->session->userdata("loja_id"));
	    }else{
	        $data['vendedor'] = $this->caixamodel->pegaVendedor();
	    }
	    $data['motoboy'] = '15,00';
	    
        $this->header2();
        $this->load->view('pdv/pdvAlter', $data);
        $this->footer();  
        
	}
	
	public function indexMob(){
        $caixa2 = null;
        $idListaVazia = $this->crudlistas->inserirListaVazia();
        
	    $data['estoques'] = $this->crudestoque->getEstoque();
	    $data['idLista'] = $idListaVazia;
	    $data['formas'] = $this->crudformas->getFormasAtivo();
	    $data['idCompra'] = $this->crudcompras->cadastrarCompra($idListaVazia, $caixa2);
	    $data['clientes'] = $this->crudclientes->getClientes();
	    $data['estado'] = $this->estados->getEstados();
	    $data['cidade'] = $this->cidades->getCidades();
	    $data['produtos'] = $this->crudprodutos->getProdutos();
	    
	    $data['lojas'] = $this->caixamodel->pegaLoja();
	    $data['block'] = $this->session->userdata("func_id");
	    $data['place'] = $this->session->userdata("loja_id");
	    if($this->session->userdata("loja_id") != 0){
	        $data['vendedor'] = $this->caixamodel->pegaVendedor($this->session->userdata("loja_id"));
	    }else{
	        $data['vendedor'] = $this->caixamodel->pegaVendedor();
	    }
        $this->header2();
        $this->load->view('pdv/pdvAlterMob', $data);
        $this->footer();  
        
	}
	
	public function cancelarPdv(){
	    $this->load->database();
	    $this->load->model('compras/crudcompras');
	    $this->load->model('listas/crudlistas');
	    
	    $idCompra = $this->uri->segment(3);
	    
	    $compra = $this->crudcompras->getCompraId($idCompra);
	    $this->crudlistas->excluirListaVazia($compra['lista_id']);
	    $this->crudcompras->excluirCompraId($idCompra);
	    
	    $this->index();
	}
	
	//Sai do pdv excluindo as listas e compras relacionadas a ele
	public function voltarPdv(){
	    $this->load->database();
	    $this->load->model('compras/crudcompras');
	    $this->load->model('listas/crudlistas');
	    $idCompra = $this->uri->segment(3);
	    $compra = $this->crudcompras->getCompraId($idCompra);
	    $this->crudlistas->excluirListaVazia($compra['lista_id']);
	    $this->crudcompras->excluirCompraId($idCompra);
	    redirect(base_url('pessoa/index'));
	}
	
	//Pega as informações da venda e joga para view do comprovante
	public function gerarComprovante(){
	    $this->load->database();
	    $this->load->model('compras/crudcompras');
	    $this->load->model('listas/crudlistas');
	    $this->load->model('clientes/crudclientes');
	    $this->load->model('produtos/crudprodutos');
	    $this->load->model('lojas/crudlojas');
	    $this->load->model('funcionarios/crudfuncionarios');
	    $this->load->model('cidades/cidades');
	    $this->load->model('estados/estados');
	    $this->load->model('contatos/crudcontatos');
	    $this->load->model('formas_pagamento/crudformas');
	    $this->load->model('estoque_produto/crudestoque');
	    
	    $notaVenda = $this->uri->segment(3);
	    
	    $compra = $this->crudcompras->getCompraNota($notaVenda);
	    $listas = $this->crudlistas->getListasId($compra['lista_id']);
	    
	    $aux = 0;
	    $produtos = array();
	    foreach($listas as $row){
	        $produtos[$aux] = $this->crudprodutos->getProdutoUnicoComp($row['produto_id'], $row['estoque_id']);
	        $aux++;
	    }
	    
	    $data['loja'] = $this->crudlojas->getLojaUnica($compra['loja_id']);
	    $data['funcionario'] = $this->crudfuncionarios->getFuncionarioUnico($compra['funcionario_id']);
	    $data['produtos'] = $produtos;
	    $data['cliente'] = $this->crudclientes->getClienteUnico($compra['cliente_id']);
	    $data['compra'] = $compra;
	    $data['listas'] = $listas;
	    $data['cidade'] = $this->cidades->getCidadeId($data['loja']['cidade_id']);
	    $data['estado'] = $this->estados->getEstadoId($data['loja']['estado_id']);
	    $data['telefone'] = $this->crudcontatos->getContato($compra['loja_id']);
        $data['total'] = $compra['valor_compra'];
        
        $formas = explode('|', $compra['forma_id']);
        $data['forma'] = "";
        $forma = $this->crudformas->getFormaId($formas[0]);
        $data['forma'] .= $forma['nome_forma'];
        unset($formas[0]);
        
        foreach($formas as $row){
            if($row != ""){
                $forma = $this->crudformas->getFormaId($row);
                $data['forma'] .= ", " . $forma['nome_forma'];
            }
        }
	    
	    
	    $this->load->helper('mpdf');
        
        $format = $this->uri->segment(4);
        //$html = $this->load->view('pdv/comprovante', $data, true);
        $html = $this->load->view('pdv/pdvcomprovantethermal', $data, true);
        pdf_create($html, 'PDF-' . $notaVenda, TRUE, $format);
	    //$this->print_item($html);
	    /*$this->header2();
	    $this->load->view('pdv/comprovante', $data);
	    $this->footer();*/
	}
	
	public function modelosProd(){
	    $this->load->database();
	    $this->load->model('estoque_produto/crudestoque');
	    
	    $data = $this->crudestoque->getEstProd();
	    $option = "<option value='' selected disabled hidden>Selecione o Modelo ou Cor</option>";
        foreach($data as $linha) {
            $option .= "<option value=" . $linha['id_estoque'] . ">" . $linha['modelo_produto'] . " - " . $linha['estoque'] . " un.</option>"; 
        }
        echo "$option";
	}
	
	//Recebe o código de um produto, verifica se é visível e o retorna para a requisição ajax do pdv
	public function listaProdutoUnicoVisivel(){
	    $this->load->database();
	    $this->load->model('pdv/crudprodutos');
	    $produto = $this->crudprodutos->getProdutoUnicoVisivel($_POST);
	    echo json_encode($produto);
	}
	
	public function finalizaCompra(){
	    $data = $this->caixamodel->finalizaVenda($_POST);
	    $this->session->set_userdata('last_page', true);
	    echo json_encode($data);
	}
	
	public function trocaLista(){
	    $formas = $this->crudformas->getFormasAtivo();
	    $a = explode("¬", $_POST['lista']);
	    $html = "";
	    $sum = 0;
	    for($i=0; $i<count($a); $i++){
	        $aux = $this->caixamodel->produtoTroca($a[$i], $_POST['loja']);
	        $html .= "
	        <div class='col-md-7 form-group'>
    	        <label for='trocaNovoProduto'>Produto Entregue (Saida)</label>
    	        <input readonly class='form-control' type='text' name='trocaNovoProduto[]' value='".$aux['modelo']."'>
    	        <input type='hidden' name='trocaNovoProdID[]' value='".$aux['produto_id']."' >
	        </div>
	        <div class='col-md-1 form-group'></div>
	        <div class='col-md-4 form-group'>
    	        <label for='trocaValorNovo'>Valor (R$)</label>
    	        <input class='form-control' id='trocaValorNovo' name='trocaValorNovo[]' readonly value='".number_format($aux['valor'], 2, ',', ' ')."'>
	        </div>";
	        $sum += $aux['valor'];
	    }
	    
	    $html .= "
	    <div class='col-md-4 form-group'>
	        <label for='trocaDiferenca'>Diferenca</label>
	        <input class='form-control money' type='text' id='trocaDiferenca' name='trocaDiferenca' placeholder='Diferença' value='".number_format($sum, 2, ',', ' ')."'>
	   </div>
	   <div  class='col-md-3 form-group'></div><div class='col-md-5 form-group'>
	        <label for='pagamentoTroca'>Forma de pagamento</label>
	        <select id='pagamentoTroca' name='pagamentoTroca' class='form-control' style='width: 100%'>
	        <option value='0' selected disabled hidden>Sem diferença</option>";
        foreach($formas as $row){
            $html .= "<option value='" . $row['id_forma'] . "' > " . $row['nome_forma'] . "</option>";
        }
        $html .= "</select></div>";
	    echo json_encode($html);
	}
	
	public function newSelectTrocaLista(){
	    $produtos = $this->crudprodutos->getProdutos();
	    $id = $_POST['row'] + 1;
	    $html = "";
	    $html .= "<div class='row' id='listaTroca".$id."'>
	    <div class='col-md-1 form-group'>
	    <label> </label>
	    <a id='lt".$id."' href='#' onclick='newListaTroca(".$id.")'>
	    <i class='fa fa-plus fa-3x' aria-hidden='true'></i></a></div>
	    <div class='col-md-7 form-group'>
	    <label for='trocaProduto'>Produto</label>
	    <select class='js-example-basic-multiple form-control' id='trocaProduto".$id."' name='trocaProduto[]' style='width: 100%;'><option value='-1' selected disabled hidden>Selecione o Produto</option>";
        foreach($produtos as $row){
            $html .= "<option value='".$row['produto_id']."'> ".$row['produto_nome']."</option>";
        }
        $html .= "</select></div><div class='col-md-4 form-group'><label for='trocaValor'>Valor (R$)</label><input onblur='diferenca()' class='form-control' type='number' min='0,01' step='any' id='trocaValor".$id."' name='valorTroca[]' placeholder='Valor do Produto' ></div></div>";
        echo json_encode($html);
	}
	
	public function trocaFinaliza(){
	    //$this->caixamodel->gravaTroca($_POST);
	    //redirect(base_url('pdv'));
	    
	    $data = $this->caixamodel->gravaTroca($_POST);
	    
	    if(isset($data['id'])){
	        echo "<script>";
	        echo "location.replace('".base_url('pdv')."');";
            echo "window.open('".base_url('impressoes/geraCupom/'.$data['id'])."', '_blank')";
    	    echo "</script>";
	    }
	}
	
	public function cancelaCompra(){
	    $data = array(
	        'success' => $this->caixamodel->verificaUsuario1($_POST),
	        );
	        
	    echo json_encode($data);
	}
	
	public function fechaCaixa(){
	    $data = array(
	        'success' => $this->caixamodel->verificaUsuario2($_POST),
	        );
	    echo json_encode($data);
	}
	
	public function acrescimo(){
	    $dados = $this->crudformas->getFormaId($_POST['pagamento']);
	    echo json_encode($dados);
	}
}

?>