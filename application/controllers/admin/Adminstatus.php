<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminstatus extends Admin_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('statustrajemodel');
    }
    
    public function listagem(){
        $data['dados'] = null;
        
        $this->header(6);
        $this->load->view('restrito/status/listagem', $data);
        $this->footer();
    }
    
    function listagemajax() {
    
        $draw = $_POST['draw'];
        $config['row'] = $_POST['start']; 
        $config['rowperpage'] = $_POST['length']; 
        
        $columnIndex = $_POST['order'][0]['column']; 
        $config['columnName'] = $_POST['columns'][$columnIndex]['data']  != 'options' ? $_POST['columns'][$columnIndex]['data'] : 'id_status' ; 
        $config['columnSortOrder'] = $_POST['order'][0]['dir']; // asc or desc
        
        $result = $this->statustrajemodel->getDataTable($config);
        $viewdata = $result['data'];

        $num_filtered_row = count($result['data']);
        $number_row = $result['number_total_row']; 

        $cont = 0;
        $aadata = [];
        foreach ($viewdata as $data){
            $option = "
            <a style='color: #1b9045;' href='". base_url('adminstatus/editarstatus?id='.  $viewdata['id_status'] ) ."'>
                <i class='fa fa-pencil' aria-hidden='true'></i>
            </a>";

            $aadata[$cont] = array(
                "name_status"       => $data['name_status'],
                "position_status"   => $data['position_status'],
                "active_status"     => $data['active_status']  == 1 ? 'Ativo' : 'Desativado',
                "options"           => $option,
            );
            $cont++;
        }

        $json_data = array(
            "draw"              => intval($draw),
            "recordsTotal"      => intval($num_filtered_row),
            "recordsFiltered"   => intval($number_row),
            "aaData"            => $aadata,
            "response"          => $result,
        );
        echo json_encode($json_data);
    }

    function addstatus() {
        if(isset($_POST['newstatus_name']) && isset($_POST['newstatus_position']) && isset($_POST['newstatus_active'])){
            if(!(empty($_POST['newstatus_name'])) && !(empty($_POST['newstatus_position'])) && !(empty($_POST['newstatus_active'])) ){
                
                $new = array (
                    "name_status"        => $_POST['newstatus_name'],
                    "position_status"    => $_POST['newstatus_position'],
                    "active_status"      => $_POST['newstatus_active'],
                    "color_status"       => $_POST['newstatus_color'],
                );
                
                $feedback = $this->statustrajemodel->insert($new);
                echo json_encode($feedback);
                exit;

            } else {
                $feedback = array('title' => "Erro", 'type' => 'warning', 'msg' => '', 'title' => "Informações inválidas");
                echo json_encode($feedback);
                exit;
            }
        } else {
            $feedback = array('title' => "Erro", 'type' => 'warning', 'msg' => '', 'title' => "Informe todos os campos");
            echo json_encode($feedback);
            exit;
        }
    }
}

?>