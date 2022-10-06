<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class ClientesOldDatatables extends CI_Model {
    
    var $table = 'clientes';
    var $column_order = array(null, "Nome", "CPF", "Cidade", "E-mail", "Telefone", "Situação");
    var $column_search = array("Nome", "CPF", "Cidade", "E-mail", "Telefone", "Situação");
    var $order = array('CodCliente' => 'asc');
    
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }
    
    private function _get_datatables_query(){
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item){
            if($_POST['search']['value']){
                if($i===0){
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                }else{
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i){
                    $this->db->group_end();
                }
                $i++;
            }
        }
         
        if(isset($_POST['order'])){
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1){
            $this->db->limit($_POST['length'], $_POST['start']);
            $query = $this->db->get();
        }
        return $query->result();
    }
 
    function count_filtered(){
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
 
    public function clientes($limit, $start, $filter){
        $this->db->select('CodCliente, NomeCompleto, CPF, Cidade, Email, Celular');
        if($filter){
            $this->db->like('NomeCompleto', $filter, 'both');
            $this->db->or_like('CPF', $filter, 'both');
            $this->db->or_like('Cidade', $filter, 'both');
            $this->db->or_like('Email', $filter, 'both');
            $this->db->or_like('Celular', $filter, 'both');
        }
        $this->db->limit($limit, $start);
        $this->db->order_by('NomeCompleto', 'ASC');
        $aux = $this->db->get('clientes')->result_array();
        $data = array();
        $no = $_POST['start'];
        for($i = 0; $i < count($aux); $i++){
            $row = array();
            $row[] = Firstword($aux[$i]['NomeCompleto']);
            $row[] = $aux[$i]['CPF'];
            $row[] = $aux[$i]['Cidade'];
            $row[] = $aux[$i]['Email'];
            $row[] = $aux[$i]['Celular'];
            $row[] = 'antigo';
            $row[] = '<div class="text-center w-100">
                        <a style="color: #1b9045;" href="#" onclick="showClient('.$aux[$i]["CodCliente"].')">
                            <i class="fa fa-eye text-secondary" aria-hidden="true"></i>
                        </a>
                        <a style="color: #1b9045;" href="#" onclick="editClient('.$aux[$i]["CodCliente"].')">
                            <i class="fa fa-pencil text-secondary" aria-hidden="true"></i>
                        </a>
                    </div>';
            $data[] = $row;
        }
        return $data;
    }
    
    public function clientesCount(){
        return $this->db->get('clientes')->num_rows();
    }
    
    public function dataClientesOld($id){
        $this->db->where('CodCliente', $id['CodCliente']);
        return $this->db->get('clientes')->row_array();
    }
    
    public function CadastroClientOld($id){
        $this->db->where('CodCliente', $id['CodCliente']);
        $a = $this->db->get('clientes')->row_array();
        return $a;
    }
    
    public function trashCadastroClient($id){
        $this->db->where('clt_id', $id);
        $this->db->delete('clienteTie');
    }
    
    public function blockCadastroClient($id){
        $this->db->where('clt_id', $id['CodCliente']);
        $a = $this->db->get('clienteTie')->row_array();
        
        if($a['clt_ativo'] == 0){
            $a['clt_ativo'] = 1;
        }else if($a['clt_ativo'] == 1){
            $a['clt_ativo'] = 0;
        }
        $this->db->where('clt_id', $id['CodCliente']);
        $this->db->replace('clienteTie', $a);
        
    }
}