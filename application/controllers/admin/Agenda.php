<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('agendamodel');
    }

	public function index(){
	    $a = $this->agendamodel->getAluguel();
	    $data = array(
            //'agenda'         =>  $this->agendamodel->getAll(),  
            'horaAbertura'   =>  "7:00",
            'horaFechamento' =>  "19:00",
            'consulta'       =>  "1800",
            'evento'        => json_encode($a),
            'pagamentos'    => $this->agendamodel->getPagamentos(),  
	   );

     //  print_r_pre($a);
	    
	    
	    $this->header(8);
		$this->load->view('agenda/agenda', $data);
		$this->footer();
	}
	
	public function insert(){
	    $agenda = array(
	        'ac_data'       => $this->input->post('data'), 
	        'ac_hora'       => $this->input->post('hora'), 
	        'ac_cliente'    => $this->input->post('cliente'),
	        'ac_plano'      => $this->input->post('plano'),
	        'ac_obs'        => $this->input->post('obs'),
	        'ac_cor'        => $this->input->post('cor'),
	        'ac_esp'        => $this->input->post('especialidade'),
	        'ac_ser'        => $this->input->post('servico'),
	        'ac_valor'      => $this->input->post('valor'),
	        'ac_medico'     => $this->input->post('medico'),
	    );
	    
	    $this->agendamodel->insert($agenda);
	    
	    redirect('Agenda');
	}
	
	public function getDia(){
	    $agenda = $this->agendamodel->getByDia($this->input->post('dia'));
	    $agendaFormat = [];
	    $cont = 0;
	    
	    foreach($agenda as $a){
	        $agendaFormat[$cont] = array(
	            'hora'  => $a['ac_hora']
	            
	        );
	    }
	    
	    echo json_encode($agendaFormat);
	}
	
	public function dia(){
	    $data = array(
            //'agenda'         =>  $this->agendamodel->getAll(),  
            'horaAbertura'   =>  "7:00",
            'horaFechamento' =>  "19:00",
            'consulta'       =>  "1800",
            'evento'         => array(
	                '1'         =>  array(
	                            'prioridade'    => 'bg-success',
	                            'nome'          => 'Aluguel',
	                            ),
	               '2'         =>  array(
	                            'prioridade'    => 'bg-warning',
	                            'nome'          => 'Reserva',
	                            ),
	               '3'         =>  array(
	                            'prioridade'    => 'bg-info',
	                            'nome'          => 'Consulta',
	                            ),
	               '4'         =>  array(
	                            'prioridade'    => 'bg-primary',
	                            'nome'          => 'Prioridade',
	                            ),
	               '5'         =>  array(
	                            'prioridade'    => 'bg-danger',
	                            'nome'          => 'Alerta',
	                            ),
	                   ),
	        'registros'      => array(
	                '1'         => array(
                                'title'             => 'fdsredss',
                                'start'             => '(2022, 6, 1, 8, 10)',
                                'end'               => '(2022, 6, 2, 15, 0)',
                                'allDay'            => false,
                                'url'               => 'https://www.google.com/',
                                'backgroundColor'   => '#3c8dbc', //Primary (light-blue)
                                'borderColor'       => '#3c8dbc', //Primary (light-blue)
                                ), 
                    '2'         => array(
                                'title'             => 'fdsredss',
                                'start'             => '(2022, 6, 5, 13, 10)',
                                'end'               => '(2022, 6, 8, 15, 0)',
                                'allDay'            => false,
                                'url'               => 'https://www.google.com/',
                                'backgroundColor'   => '#3c8dbc', //Primary (light-blue)
                                'borderColor'       => '#3c8dbc', //Primary (light-blue)
                                ), 
                    '3'         => array(
                                'title'             => 'fdsredss',
                                'start'             => '(2022, 6, 15, 10, 10)',
                                'end'               => '(2022, 6, 19, 19, 0)',
                                'allDay'            => false,
                                'url'               => 'https://www.google.com/',
                                'backgroundColor'   => '#3c8dbc', //Primary (light-blue)
                                'borderColor'       => '#3c8dbc', //Primary (light-blue)
                                ), 
                    ),
	    );

	    //$this->header();
		$this->load->view('agenda/calendar2', $data);
		//$this->footer();
	}
	
	function getData(){
	    $data = $this->agendamodel->getAgendaData($_POST['data']);
	    echo $data;
	}
	
	function dadosLocacao(){
	    $data = $this->agendamodel->getDadosLocacao($_POST['busca']);
	    echo json_encode($data);
	}
	function updateStatus(){
	    $data = $this->agendamodel->updateLocacao($_POST);
	    echo json_encode($data);
	}
	
	function updateValores(){
	    $data = $this->agendamodel->updatePagamentos($_POST);
	    echo json_encode($data);
	}
	
	function dependentes(){
	    $data = $this->agendamodel->getDependentes($_POST['cliente']);
	    echo $data;
	}
}
