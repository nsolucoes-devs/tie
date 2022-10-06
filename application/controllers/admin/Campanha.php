<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campanha extends Admin_Controller {
    
    public function __construct() {
            parent::__construct();
            date_default_timezone_set('America/Sao_Paulo');
            $this->load->model('smsmodel');
    }
    
    public function smsTexto(){
        $data['textos'] = $this->smsmodel->textSms();
        $data['status'] = $this->smsmodel->statusAgenda();
        $this->header(6);
        $this->load->view('campanha/listaSms', $data);
        $this->footer();
    }
    
    public function statusLocacao(){
        $data['status'] = $this->smsmodel->statusAgenda();
        $data['textos'] = $this->smsmodel->campanhaAgenda();
        $this->header(6);
        $this->load->view('campanha/listaStatus', $data);
        $this->footer();
    }
    
    function gravaStatus(){
        $data = $this->smsmodel->crudStatus($_POST);
        echo json_encode($data);
    }
    
    function gravaSms(){
        $data = $this->smsmodel->crudSms($_POST);
        echo json_encode($data);
    }
    
    function getSms(){
        $data = $this->smsmodel->getSms($_POST);
        echo json_encode($data);
    }
    
    function getSts(){
        $data = $this->smsmodel->getSts($_POST);
        echo json_encode($data);
    }
    
    function sendSms(){
        $a = $this->smsmodel->testSms($_POST);
        echo json_encode($a);
    }
    
    function updateStatusAgenda(){
        $data = $this->smsmodel->crudStatus($_POST);
        echo json_encode($data);
    }
}