<?php defined('BASEPATH') or exit('No direct script access allowed');

class Reservas extends Admin_Controller
{

    public function __construct(){
        parent::__construct();
        $this->load->model('reservasmodel');
        $this->load->model('smsmodel');
        $this->load->model('usuarios');
    }

    public function index(){

        //$data['paginanovas'] = true;

        $this->header(8);
        $this->load->view('reservas/selecao');
        $this->footer();
    }

    public function listagem(){
        $this->header();
        $this->load->view('reservas/listaReservas');
        //$this->load->view('reservas/reservas');
        $this->footer();
    }

    public function excluirReserva(){

        $this->load->model('reservasmodel');
        $this->load->model('Usuarios');
        $dados = array(
            'usuario'   => $_POST['id_excluir'],
            'senha'     => $_POST['senha'],
        );
        $res = $this->usuarios->validar($dados);
        if ($res) {
            $idGrupo = addslashes($this->input->post('idreserva'));
            $this->reservasmodel->detelaReserva($idGrupo);
        } else {
            $this->session->set_userdata('alert', 4);
        }

        $alert = array("alert" => 4);

       
        $this->header();
        // $this->load->view('reservas/listaReservas', $data);
        $this->load->view('reservas/reservas',$alert);
        $this->footer();

    }
    
    public function listaPendente(){
        $data['lista'] = $this->reservasmodel->listaPendente();
        $this->header();
        $this->load->view('reservas/listaReservas', $data);
        $this->footer();
    }

    public function agenda(){

        $this->header();
        $this->load->view('reservas/agenda');
        $this->footer();
    }

    public function viewdb(){
        $viewdata = $this->reservasmodel->viewdb();
        echo json_encode($viewdata);
    }

    function listagemajax(){

        $filter_data = $_POST['filter_data'];
        parse_str($filter_data, $params);

        $draw = $_POST['draw'];
        $config['row'] = $_POST['start']; # **IMPORTART** STAR DO LIMIT PARA O SQL **IMPORTART**
        $config['rowperpage'] = $_POST['length']; # **IMPORTART** QUANTIDADE DE LINHAS QUE DESEJA MOSTRAR **IMPORTART**
        $config['columnIndex'] = $_POST['order'][0]['column']; # **IMPORTART** NUMERO DA COLUMA ESTA ORDENANDO **IMPORTART**
        $config['columnName'] = $_POST['columns'][$config['columnIndex']]['data']; # **IMPORTART** NOME DA COLUMA ESTA ORDENANDO **IMPORTART**
        $config['columnSortOrder'] = $_POST['order'][0]['dir']; // asc or desc
        $listagem = isset($_POST['listagem']) ? $_POST['listagem'] : false;

        $filtered = false;
        $filter = [];

        switch ($config['columnName']) {
            case 'id':
            case 'options':
                $config['columnName'] = 'alg_id';
                break;
            case 'reserva':
                $config['columnName'] = 'alg_efetivado';
                break;
            case 'status':
                $config['columnName'] = 'alg_finalizado';
                break;
            case 'periodoLocacao':
                $config['columnName'] = 'alg_retirada';
                break;
            case 'cliente':
                $config['columnName'] = 'alg_locador';
                break;
            case 'telefone':
                $config['columnName'] = 'clt_cel';
                break;
            case 'cpf':
                $config['columnName'] = 'clt_cpf';
                break;
        }

        # Filtro por DATA
        if (!(empty($params['data-incial']))) {
            $filter['start_date'] = date('Y-m-d 00:00:00', strtotime($params['data-incial']));
        } else {
            $filter['start_date'] = false;
        }

        if (!(empty($params['data-final']))) {
            $filter['final_date'] =  date('Y-m-d 23:59:59', strtotime($params['data-final']));
        } else {
            $filter['final_date']  = date('Y-m-d 23:59:59');
        }

        if (!(empty($params['definicao']))) {
            $filter['filter_definition'] = addslashes($params['definicao']);
        } else {
            $filter['filter_definition'] = false;
        }

        if (!(empty($params['busca-nome']))) {
            $filter['filter_nome'] = addslashes($params['busca-nome']);
        } else {
            $filter['filter_nome'] = false;
        }

        if (!(empty($params['busca-telefone']))) {
            $filter['filter_telefone'] =  addslashes($params['busca-telefone']);
        } else {
            $filter['filter_telefone'] = false;
        }

        if (!(empty($params['busca-cpf']))) {
            $filter['filter_cpf'] = addslashes($params['busca-cpf']);
        } else {
            $filter['filter_cpf'] = false;
        }

        $viewdata = $this->reservasmodel->getAllAluguel($config, $filter);

        $num_filtered_row = $viewdata['num_filtered_row'];
        $number_row = $viewdata['number_row'];

        foreach ($viewdata['reservas'] as $row) {

            $option = "<a href='" . base_url('impressoes/geraCupom?chave=' . $row['alg_chaveLocacao']) . "' target='_blank' rel='noopener noreferrer'><i class='fa fa-eye text-secondary' aria-hidden='true'></i></a>";
            if (isset($listagem) && $listagem) {
                $option .= "<a href='" . base_url('adminreservas/editaaluguel?reserva=' . $row['alg_chaveLocacao']) . "'><i class='fa fa-pencil text-secondary' aria-hidden='true'></i></a>";
            }
           if ($_SESSION["perfil"] == 7){ 
            $option .= "<a href='#'    onclick=excluirpedido('". $row['alg_chaveLocacao'] . "')><i class='fa fa-trash text-secondary' aria-hidden='true'></i></a>";
           //$option .='<a style="color: #1b9045;" href="#" onclick="excluirpedido( '. $row["alg_chaveLocacao"].' ) "><i style="padding-left: 12px;" class="fa fa-trash fa-2x text-secondary" aria-hidden="true"></i></a>';
                
             } 

            switch ($row['alg_finalizado']) {
                case '1':
                    $status = 'Aluguel N??o Finalizado';
                    break;
                case '2':
                    $status = 'Ajustes';
                    break;
                case '3':
                    $status = 'Retirada';
                    break;
                case '4':
                    $status = ' Devolu????o';
                    break;
                case '5':
                    $status = 'Aluguel Finalizado';
                    break;
                case '6':
                    $status = 'Or??amento';
                    break;
            }

            $aadata[] = array(
                "id"                => str_pad($row['alg_id'], 4, 0, STR_PAD_LEFT),
                "reserva"           => date('d/m/y', strtotime($row['alg_efetivado'])),
                "status"            => $status,
                "periodoLocacao"    => date('d/m/y', strtotime($row['alg_retirada'])) . " ?? " . date('d/m/y', strtotime($row['alg_devolucao'])),
                "cliente"           => !empty($row['clt_nome']) ? Firstword($row['clt_nome']) : 'N??o cadastrado',
                "telefone"          => !empty($row['clt_cel']) ? $row['clt_cel'] : '-',
                "cpf"               => !empty($row['clt_cpf']) ? $row['clt_cpf'] : '-',
                "options"           => $option,
            );
        }

        // RESPOSTA JSON PARA O PARA O DATABLE
        $json_data = array(
            "draw"              => intval($draw), //NUMERO DA REQUISI????O, NADA INPORTANTE O PROGRAMADO, MAS TEM QUE RETORNAR
            "recordsTotal"      => intval($num_filtered_row), //QUANTIDADE TOTAL DE IRA MOSTRAR AGORA 
            "recordsFiltered"   => intval($number_row), //QUANTIDADE LINHAS QUE EXISTE NA TABELA
            "aaData"            => isset($aadata) ? $aadata : [], //AS LINHAS QUE IRA MOSTRAR
            "filter"            => $filtered, // Se o filtro esta ativo
        );
        echo json_encode($json_data);
    }

    public function teste(){
        $this->load->view('reservas/teste');
    }

    public function aluguel($id){
       // samoel();
        $data['trajes'] = $this->reservasmodel->trajesDept();
        $data['tamanhos'] = $this->reservasmodel->tamanhos();
        $data['cores'] = $this->reservasmodel->cores();
        $data['usuarios'] = $this->usuarios->getUsuarios();
        $data['status'] = $this->reservasmodel->getStatusAgenda('devolucao');

        $fotos = getFotos();

        if ($id == 1) {
            $data['imagens'] = array_diff_key( $fotos , array_flip([5,6,7,8]));
            $data['background'] = 'mediumpurple';
            $data['colorbtn']   = 'feminino';
        } elseif ($id == 2) {
            $data['imagens'] = array_diff_key( $fotos , array_flip([1,2,3,4]));
            $data['background'] = 'hsl(0 0% 68%)';
            $data['colorbtn']   = 'masculino';
        }

        if ($id != '' && $id != null) {
            $this->load->view('reservas/aluguel', $data);
        } else {
            redirect(base_url('/reservas'), 'location');
        }
    }
    
    public function aluguelNEW(){
       // samoel();
        $data['trajes'] = $this->reservasmodel->trajesDept();
        $data['tamanhos'] = $this->reservasmodel->tamanhos();
        $data['cores'] = $this->reservasmodel->cores();
        $data['usuarios'] = $this->usuarios->getUsuarios();
        $data['status'] = $this->reservasmodel->getStatusAgenda('devolucao');

        $data['imagens'] = getFotos();
        $data['background'] = 'hsl(0 0% 68%)';
        $data['colorbtn']   = 'masculino';

        $this->load->view('reservas/aluguel', $data);
    }
    
    function findClients(){
        if (isset($_POST['busca']) && isset($_POST['valor'])) {
            $data = $this->reservasmodel->findClients($_POST);
            $response['multipleClients'] = count($data) > 1 ? true : false;
            $response['data'] = $data;
            echo json_encode($response);
        } else {
            $feedback = array('title' => "Erro", 'type' => 'warning', 'msg' => 'Sem dados para a requisi????o ao banco.', 'title' => "Acesso impr??prio");
            echo json_encode($feedback);
        }
    }

    function getDataClient(){
        if (isset($_POST['id_cliente'])) {
            $data = $this->reservasmodel->getDados($_POST);
            echo json_encode($data);
        } else {
            $feedback = array('title' => "Erro", 'type' => 'warning', 'msg' => 'Sem dados para a requisi????o ao banco', 'title' => "Acesso impr??prio");
            echo json_encode($feedback);
        }
    }

    function buscaCliente(){
        $data = $this->reservasmodel->cliente($_POST);
        echo json_encode($data);
    }

    function buscaDependente(){
        $data = $this->reservasmodel->dependente($_POST);
        echo $data;
    }

    function definiDataEvento(){
        $data = $this->reservasmodel->evento($_POST);
        echo $data;
    }

    function buscaTrajes(){
        $data['lisTraje'] = $this->reservasmodel->buscaTrajesReserva($_POST);
        echo $this->load->view('reservas/listagemTrajes', $data, true); 
    } 

    function gravaCliente(){
        $data = $this->reservasmodel->clienteNew($_POST);

        echo json_encode($data);
    }

    function gravaDependente(){
        $data = $this->reservasmodel->dependenteNew($_POST);
        echo json_encode($data);
    } 

    function showSelecteds(){
        $data['lisTraje'] = $this->reservasmodel->buscaAluguel($_POST['chaveLocacao']);
        echo $this->load->view('reservas/selecionadosAluguel', $data, true);
    }
  
    function finaliza(){
        $data['lisTraje'] = $this->reservasmodel->buscaAluguel($_POST['chaveLocacao']);
        $data['listaPG'] = $this->reservasmodel->pagamentos();
        $data['locacao'] = $this->reservasmodel->valorPago($_POST['chaveLocacao']);
        echo $this->load->view('reservas/finalizaAluguel', $data, true);
    }

    function removeFinal(){
        $data['lisTraje'] = $this->reservasmodel->removeTrajes($_POST);
        echo $this->load->view('reservas/selecionadosAluguel', $data, true);
    }

    function encerraAluguel(){
        $a =  $this->reservasmodel->gravaAluguel($_POST);
        /*//$this->smsmodel->sendSms($a);
        if ($a != false) {
            echo $a;
        } else {
            echo false;
        }*/
    }

    function gravaAluguel(){
        $data = $this->reservasmodel->gravaLocacao($_POST);
        echo json_encode($data);
    }

    public function visualizaAluguel(){

        if (isset($_GET['reserva'])) {
            $reserva = addslashes($_GET['reserva']);
            $data['locacao'] = $this->reservasmodel->getAluguelById($reserva);
            if ($data['locacao']) {
                $data['usuarios'] = $this->usuarios->getUsuarios();

                $fotos = getFotos();
                $data['imagens'] = array_rand($fotos, 4);
                print_r_pre($data['imagens']);

                $data['background'] = 'lightgray';
                $data['cliente'] = $this->reservasmodel->getCliente($data['locacao']['alg_locador_id']);
                $data['traje'] =   $this->reservasmodel->gettraje($data['locacao']['alg_trajes']);
              
            //    echo json_encode($data['traje']);

                $this->load->view('reservas/aluguelVisualiza', $data);
            } else {
                redirect(base_url('/reservas'), 'location');
            }
        } else {
            redirect(base_url('/admin/reservas/listagem'), 'location');
        }




    }
    
    public function editaAluguel(){
        
        $data['locacao'] = $this->reservasmodel->retrieveLocacaoKey($_POST['reserva']);
        $data['trajes'] = $this->reservasmodel->trajesDept();
        $data['tamanhos'] = $this->reservasmodel->tamanhos();
        $data['cores'] = $this->reservasmodel->cores();
        $data['usuarios'] = $this->usuarios->getUsuarios();
        $data['status'] = $this->reservasmodel->getStatusAgenda('devolucao');
        $fotos = getFotos();
        $data['imagens'] = array_diff_key( $fotos , array_rand($fotos, 4) );
        $data['background'] = 'lightgray';
        
        $this->load->view('reservas/aluguelAlterPedido', $data); 
    }

    function contrato($id){
        $data['contrato'] = $this->reservasmodel->contrato($id);
        $this->load->view('reservas/contrato', $data);
    }

    function termo($id){
        $data['termo'] = $this->reservasmodel->termo($id);
        $this->load->view('reservas/termo', $data);
    }
    
    function orcamento(){
        $a =  $this->reservasmodel->orcamento($_POST);
        
        if ($a != false) {
            echo $a;
        } else {
            echo false;
        }
    }
    
    function clienteDependente(){
        $data = $this->reservasmodel->getDadosClienteDependente($_POST);
        echo json_encode($data);
    }
    
    function pendente($id){
        $data = $this->reservasmodel->gravaPendente($id);
        redirect(base_url('reservas'), false);
    }
    
    public function listagem2(){
        $data['lista'] = $this->reservasmodel->listaTudo();
        $this->header();
        $this->load->view('reservas/listaReservas', $data);
        $this->footer();
    }
    
    
    /*
    NOVAS FUN????ES N??O EXLUIR NEM ALTERAR AS LINHAS EXISTENTES, COMENTEM E COLOQUEM NOVAS FUN????ES
    LEMBRANDO DE COMENTAR QUEM FEZ E QUANDO FOI FEITA A ALTERA????O
    
    ANDERSON MOREIRA
    10/10/2022
    */
    public function exibeListaReservas(){
        $limit  = $_POST['length'];
        $filter = $_POST['search']['value'];
        $start  = $_POST['start'];
        $data = $this->reservasmodel->listareservas($limit, $start, $filter);
        $all = $this->reservasmodel->reservasCount();
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $all,//numero de registros no banco
            "recordsFiltered" => $all,//numero de registros depois de filtrado
            "data" => $data,
        );
        
        echo json_encode($output);
    }
    
    function dadosLocacao(){
	    $data = $this->reservasmodel->getDadosLocacao($_POST['busca']);
	    echo json_encode($data);
	} 
    
    
    
}
