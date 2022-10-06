<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Impressoes extends Admin_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('reservasmodel');
    }
    
    public function index(){
    }
    
    public function fechaCaixa(){
        $this->load->database();
        $this->load->model('pdv/caixamodel');
        $loja = $this->caixamodel->lojaCupom2($this->session->userdata("loja_id"));
        $vendas = $this->caixamodel->vendasDia($this->session->userdata("loja_id"));
        //$loja = $this->caixamodel->lojaCupom(25);
        //$vendas = $this->caixamodel->vendasDia(25);
        $fechado = $this->caixamodel->formasCash($this->session->userdata("loja_id"));
        $data = array(
            'dia'       => date('d-m-Y'),
            'loja'      => $loja,
            'vendas'    => $vendas,
            'formas'    => $fechado,
            );
        $this->load->view('relatorio/fechamentoCaixa', $data);
    }
    
    public function contrato($id){
        $chave['chaveLocacao'] = addslashes($_GET['chave']);

        if($chave['chaveLocacao'] != null){
            $this->load->database();
            $this->load->model('reservasmodel');
            $a = $this->reservasmodel->getAluguelAllData($chave);
            if($a) {
                $data = array(
                    'aluguel'       => $a['venda'],
                    'loja'          => $a['loja'],
                    // 'vendedor'      => $a['vendedor'],
                    // 'cliente'       => $a['cliente'],
                    // 'desconto'      => $a['desconto'],
                    // 'frete'         => $a['frete'],
                    // 'lastValue'     => $a['lastValue'],
                    // 'pagamento'     => $a['pagamento'],
                );
                
                $data['logado'] = isset($_SESSION['logado']) ? true : false;
                $data['termo'] = $this->reservasmodel->termo();
                $data['contrato'] = $this->reservasmodel->contrato();

                    
                $this->load->view('relatorio/cupom', $data);
            } else {
                // redirect( base_url('admin/reservas/listagem') );
            }

        } else {
            // redirect( base_url('admin/reservas/listagem') );
        }
    }
    
    public function orcamento($id){
        

        if($chave['chaveLocacao'] != null){
            $this->load->database();
            $this->load->model('reservasmodel');
            $a = $this->reservasmodel->getAluguelAllData($id);
            if($a) {
                $data = array(
                    'aluguel'       => $a['venda'],
                    'loja'          => $a['loja'],
                    // 'vendedor'      => $a['vendedor'],
                    // 'cliente'       => $a['cliente'],
                    // 'desconto'      => $a['desconto'],
                    // 'frete'         => $a['frete'],
                    // 'lastValue'     => $a['lastValue'],
                    // 'pagamento'     => $a['pagamento'],
                );
                
                $data['logado'] = isset($_SESSION['logado']) ? true : false;
                $data['termo'] = $this->reservasmodel->termo();
                $data['contrato'] = $this->reservasmodel->contrato();

                    
                $this->load->view('relatorio/cupom', $data);
            } else {
                // redirect( base_url('admin/reservas/listagem') );
            }

        } else {
            // redirect( base_url('admin/reservas/listagem') );
        }
    }
    
    public function termo($id){
        if($chave['chaveLocacao'] != null){
            $this->load->database();
            $this->load->model('reservasmodel');
            $a = $this->reservasmodel->getAluguelAllData($id);
            if($a) {
                $data = array(
                    'aluguel'       => $a['venda'],
                    'loja'          => $a['loja'],
                    // 'vendedor'      => $a['vendedor'],
                    // 'cliente'       => $a['cliente'],
                    // 'desconto'      => $a['desconto'],
                    // 'frete'         => $a['frete'],
                    // 'lastValue'     => $a['lastValue'],
                    // 'pagamento'     => $a['pagamento'],
                );
                
                $data['logado'] = isset($_SESSION['logado']) ? true : false;
                $data['termo'] = $this->reservasmodel->termo();
                $data['contrato'] = $this->reservasmodel->contrato();

                    
                $this->load->view('relatorio/cupom', $data);
            } else {
                // redirect( base_url('admin/reservas/listagem') );
            }

        } else {
            // redirect( base_url('admin/reservas/listagem') );
        }
    }
    
    public function geraCupom($id){
        
        $a = $this->reservasmodel->getAluguelAllData($id);
        if($a) {
            $data = array(
                'aluguel'       => $a['venda'],
                'loja'          => $a['loja'],
                // 'vendedor'      => $a['vendedor'],
                // 'cliente'       => $a['cliente'],
                // 'desconto'      => $a['desconto'],
                // 'frete'         => $a['frete'],
                // 'lastValue'     => $a['lastValue'],
                // 'pagamento'     => $a['pagamento'],
            );
            
            $data['logado'] = isset($_SESSION['logado']) ? true : false;
            $data['termo'] = $this->reservasmodel->termo();
            $data['contrato'] = $this->reservasmodel->contrato();
        }

                
            $this->load->view('relatorio/cupom', $data);
        
    }
    
    public function cupom($id){
        
        $a = $this->reservasmodel->getAluguelAllData($id);
        if($a) {
            $data = array(
                'aluguel'       => $a['venda'],
                'loja'          => $a['loja'],
                'termo'         => $this->reservasmodel->termo(),
                'contrato'      => $this->reservasmodel->contrato(),
            );
        }
        
        $this->load->view('relatorio/cupom', $data);
        
            
            
    }
}