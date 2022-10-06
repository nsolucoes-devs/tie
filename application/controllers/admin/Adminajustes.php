<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminajustes extends Admin_Controller {

    public function construct()
    {
        parent::construct();
        $this->load->database();
        $this->load->model('correiosmodel');
        $this->load->model('configs');
        $this->load->model('gestor');
        $this->load->model('formaspagamento');
        $this->load->model('lojasmodel');
        $this->load->model('vendedores');
    }

    public function pagamentos()
    {
        if ($this->session->userdata('msg')) {
            $data['msg'] = $this->session->userdata('msg');
            $this->session->unset_userdata('msg');
        }
        $this->load->model('configs');
        $this->load->model('correiosmodel');
        $this->load->model('formaspagamento');
        $this->load->model('reservasmodel');
        //$data['site'] = $this->configs->getSite();

        $data = array(
            'site'              => $this->configs->getSite(),
            'correios'          => $this->correiosmodel->dados(),
            'pagamentos'        => $this->configs->getGestor(),
            'chave'             => $this->configs->getChave(1),
            'chave2'            => $this->configs->getChave(2),
            'email'             => $this->configs->getEmail(1),
            'formas_pagamento'  => $this->formaspagamento->getFormas(),
            // 'vendedores'        => $data['vendedores'],
            // 'links'             => $data['links'],
            // 'filtro'            => $data['filtro'],
            // 'alert'             => $data['alert'],
            'statusAgenda'      => $this->reservasmodel->getFormasPagamento(),
            'fotos'             => getFotos(),
            'contrato'          => $this->configs->getContrato(),
        );

      //  print_r($data['fotos']);

        $this->header(6);
        $this->load->view('restrito/ajustes/configuracoes', $data);
        $this->footer();

    }


    public function atualizarCorreios()
    {


        for ($i = 1; $i <= 9; $i++) {
            $ceporigem          = $this->input->post('cep' . $i);
            $status             = $this->input->post('status' . $i);
            $contrato           = $this->input->post('contrato' . $i);
            $valor              = $this->input->post('valor' . $i);
            $valor1             = str_replace(".", "", $valor);
            $valor2             = str_replace(",", ".", $valor1);
            $estados            = "";
            $entregaextra       = $this->input->post('entregamais' . $i);

            if ($i == 8 || $i == 9) {
                $cont = 0;

                if (isset($_REQUEST['estados' . $i])) {
                    foreach ($_REQUEST['estados' . $i] as $e) {
                        if ($cont == 0) {
                            $estados .= $e;
                        } else {
                            $estados .= '¬' . $e;
                        }
                        $cont++;
                    }
                }
            }

            $correio = array(
                'cepOrigem'         =>  $this->limpa($ceporigem),
                'dadosAtivo'        =>  $status,
                'contratoCorreio'   =>  $contrato,
                'valorMinimo'       =>  $valor2,
                'regiaoGratis'      =>  $estados,
                'dias_entrega_extra' =>  $entregaextra
            );

            $this->correiosmodel->update($i, $correio);
        }

        redirect(base_url('8fb192af45f75504361d0011c1677415'));
    }

    function gestorPG()
    {


        if ($this->input->post('gestor') !== null) {
            $gestor                 = $this->input->post('gestor');
        } else {
            $gestor                 = null;
        }
        if ($this->input->post('publickey') !== null) {
            $gestor_publickey       = $this->input->post('publickey');
        } else {
            $gestor_publickey       = null;
        }
        if ($this->input->post('privatekey') !== null) {
            $gestor_privatekey      = $this->input->post('privatekey');
        } else {
            $gestor_privatekey      = null;
        }
        if ($this->input->post('acesstoken') !== null) {
            $gestor_acesstoken      = $this->input->post('acesstoken');
        } else {
            $gestor_acesstoken      = null;
        }
        if ($this->input->post('clientid') !== null) {
            $gestor_clientid        = $this->input->post('clientid');
        } else {
            $gestor_clientid        = null;
        }
        if ($this->input->post('clientsecret') !== null) {
            $gestor_clientsecret    = $this->input->post('clientsecret');
        } else {
            $gestor_clientsecret    = null;
        }
        if ($this->input->post('emailPag') !== null) {
            $gestor_email           = $this->input->post('emailPag');
        } else {
            $gestor_email           = null;
        }
        if ($this->input->post('sandboxId') !== null) {
            $gestor_sandbox           = "1";
        } else {
            $gestor_sandbox           = "0";
        }

        $dados = array(
            'idgestor'              => 1,
            'gestor'                => $gestor,
            'gestor_publickey'      => $gestor_publickey,
            'gestor_privatekey'     => $gestor_privatekey,
            'gestor_acesstoken'     => $gestor_acesstoken,
            'gestor_clientid'       => $gestor_clientid,
            'gestor_clientsecret'   => $gestor_clientsecret,
            'gestor_email'          => $gestor_email,
            'gestor_sandbox'        => $gestor_sandbox,
        );

        $this->configs->gestor($dados);
        redirect('8fb192af45f75504361d0011c1677415');
    }

    public function chaves()
    {
        $id = $this->input->post('google-key');

        print_r_pre(["chave" => addslashes($_POST['google-key'])]);

        $this->configs->updateChave($id, ["chave" => addslashes($_POST['google-key'])] );
        $this->configs->updateChave(2, ["chave" => addslashes($_POST['google-key'])]);

        redirect(base_url('8fb192af45f75504361d0011c1677415'));
    }

    public function insertEmail()
    {


        $email = array(
            'email_protocol' => $this->input->post('email_protocol'),
            'email_user'     => $this->input->post('email_user'),
            'email_pass'     => $this->input->post('email_pass'),
            'email_host'     => $this->input->post('email_host'),
            'email_port'     => $this->input->post('email_port'),
            'email_timeout'  => $this->input->post('email_timeout'),
            'email_charset'  => $this->input->post('email_charset'),
        );

        $this->configs->updateEmail(1, $email);

        redirect(base_url('8fb192af45f75504361d0011c1677415'));
    }

    public function getDinamicoGestor()
    {


        $a = $this->gestor->get($this->input->post('gestor'));

        echo json_encode($a);
    }

    public function atualizarFormasPag()
    {


        $cont = $this->input->post('cont');



        for ($aux = 0; $aux < $_POST['cont']; $aux++) {
            $formas[$aux] = array(
                'nome_forma'            => $_POST['nome_forma' . $aux],
                'acrescimo_forma'       => $_POST['cartao_crescimo' . $aux],
                'ativo_forma'          => $_POST['cartao_ativo' . $aux],
            );

            $id[$aux] = $_POST['id_' . $aux];
        }

        $this->formaspagamento->updatenew($formas, $id);

        redirect(base_url('8fb192af45f75504361d0011c1677415'));
    }

    function newFormaLista()
    {

        $aux = $_POST['row'] + 1;
        $html = "";
        $html .=   "<br>
        <div class='row' id='formaPagamento" . $aux . "'>
            <div class='col-md-2' style='text-align:-webkit-center;'>
                <button id='buttonForma" . $aux . "' type='button' class='btn btn-success' onclick='novaForma(" . $aux . ")'>
                    <i class='fa fa-plus' aria-hidden='true'></i>
                </button>
            </div>
            <div class='col-md-10'>
                <div class='row' style='padding: 0 25px;'>
                    <div class='col-md-4 form-group'>
                        <label><b>Nome:</b></label>
                        <input id='nome_forma' name='nome_forma[]' type='text' class='form-control' value=''>
                    </div>
                    <div class='col-md-3 form-group'>
                        <label><b>% de acrescimo:</b></label>
                        <input id='cartao_acrescimo' name='cartao_crescimo[]' type='text' class='form-control float' value=''>
                    </div>       
                    <div class='col-md-2 '>
                        <label><b>Exibir:</b></label>
                        <select id='cartao_ativo' name='cartao_ativo[]' class='form-control-static form-select form-select-lg'>
                            <option value='1'>Ativo</option>
                            <option value='1'>Inativo</option>
                        </select>
                    </div> 
                </div>
            </div>
        </div>";
        echo json_encode($html);
    }

    function updateStatus()
    {
        $this->load->model('reservasmodel');
        $data = $this->reservasmodel->updateFormas($_POST);
        echo $data;
    }
    function uploadIMGS()
    {

        for ($i = 1; $i <= 8; $i++) {
            if (!empty($_FILES['capa_' . $i]['name'])) {

                $this->uploadOpcionais('capa_' . $i, 'capa_' . $i);
            }
            if( $this->input->post('remove_'.$i) == 1){
               unlink($_SERVER['DOCUMENT_ROOT'] ."/imagens/trajes/"."capa_" . $i.".jpg");
            }
         
        }
        redirect(base_url('8fb192af45f75504361d0011c1677415'));
    }
    public function uploadOpcionais($file, $name)
    {
        $config2['upload_path']          = './imagens/trajes/';
        $config2['allowed_types']        = 'gif|jpg|png|jpeg|webp';
        $config2['max_size']             = '10000';
        $config2['overwrite']            = true;
        $config2['file_name']            = $name . '.jpg';

        $this->load->library('upload', $config2);
        $this->upload->initialize($config2);

        $this->upload->do_upload($file);
    }
    
    function gravaContrato(){
        $data = $this->configs->crudContrato($_POST);
        echo json_encode($data);
    }
}
