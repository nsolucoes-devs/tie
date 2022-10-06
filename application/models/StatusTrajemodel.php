<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statustrajemodel extends CI_Model {
    
    public function insert($new){
        $this->db->insert('statusTrajes', $new);
        $feedback = array('title' => "Okay", 'type' => 'success', 'msg' => 'Novo status inserido com sucesso.');
        return $feedback;
    }
    
    public function update($id, $new){
        $this->db->where('id_traje', $id);
        $this->db->update('statusTrajes', $new);
    }
    
    public function get($id){
        $this->db->where('id_traje', $id);
        return $this->db->get('statusTrajes')->row_array();
    }
    
    public function getDataTable($config){
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('statusTrajes')->row_array();
        $result['number_total_row'] = $a['pages'];

        $this->db->select("name_status, position_status, active_status");
        $this->db->order_by($config['columnName'], $config['columnSortOrder']);
        $this->db->limit($config['rowperpage'], $config['row']);
        $result['data'] = $this->db->get('statusTrajes')->result_array();
        return $result;
    }
}

//try {
// $this->db->where('position_traje >=', $new['position_traje']);
// $this->db->order_by('position_traje', 'asc');
// $update = $this->db->get('statusTrajes')->result_array();

// $position = $new['position_traje'];
// $param = count($update) + $position;
// $aux2 = 0;
// for($aux = $position + 1; $aux <= $param; $aux++) {
//     if($update[$aux2]['position_traje'] < $aux){
//         $update[$aux2]['position_traje'] = $aux;
        
//         $this->db->select('id_status', $update[$aux2]['id_status']);
//         $this->db->update('statusTrajes', $update[$aux2]);
//         $aux2++;
//     } else {
//         break;
//     }
// }

// $this->db->insert('statusTrajes', $new);
// $feedback = array('title' => "Okay", 'type' => 'success', 'msg' => 'Novo status inserido com sucesso.');
// return $feedback;

//} catch(Exception $e) {
// $feedback = array('title' => "Erro", 'type' => 'error', 'msg' => '', 'title' => "Erro ao adicionar o status");
// return $feedback;
//} 