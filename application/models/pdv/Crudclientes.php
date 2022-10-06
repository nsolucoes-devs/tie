<?php

class Crudclientes extends MY_Model  {
    
    //Recupera todos os clientes do banco
    public function getClientes(){
        $this->db->order_by('cliente_nome', "ASC");
        $clientes = $this->db->get('cliente');
        
        return $clientes->result_array();
    }
    
    //Busca um cliente de acordo com o CPF / CNPJ
	public function getClienteCpf($cpf){
	    $this->db->where('cpfcnpj_cliente', $cpf);
	    $query = $this->db->get('clientes');
	    
	    return $query->row_array();
	}
	
	//Insere um cliente no banco de dados
    public function cadastrarCliente($cliente){
        $this->db->insert('clientes', $cliente);
        $id = $this->db->insert_id();
        
        return $id;
    }
    
    //Pega um cliente baseado no id
    public function getClienteUnico($id){
        $this->db->where('id_cliente', $id);
        $cliente = $this->db->get('clientes');
        
        return $cliente->row_array();
    }
    
    //Atualiza um cliente baseado no id
	public function atualizarCliente($cliente, $id){
	    $this->db->where('id_cliente', $id);
	    $update = $this->db->update('clientes', $cliente);
	    
	    return $update;
	}
	
	//Exclui um cliente baseado no id
    public function excluirCliente($id){
	    $this->db->where('id_cliente', $id);
	    $this->db->delete('clientes');
	}
}

?>