<?php defined('BASEPATH') or exit('No direct script access allowed');

class Produtos extends CI_Model
{

    // *********************  Site  ********************* //
    /*Funções feitas por Anderson Moreira em 12-01-2022*/
    public function getProdutoSiteRand()
    {
        $this->db->select("produto_id, produto_nome, produto_valor, produto_modelo, produto_detalhes, produto_imagens_opcional1, produto_imagens_opcional2, produto_imagens_opcional3, produto_imagens_opcional4, produto_imagens_opcional5, produto_tamanhos, produto_cores, produto_variacoes, produto_especifico, produto_idloja, produto_habilitado, produto_departamentos");
        $this->db->order_by('produto_id', 'RANDOM');
        $a = $this->db->get('produtos')->row_array();

        $a['tamanhos'] = explode("¬", $a['produto_tamanhos']);
        $a['cores'] = explode("¬", $a['produto_cores']);
        unset($a['produto_tamanhos']);
        unset($a['produto_cores']);

        /*$this->db->select("sum(estoque_quantidade) as estoque_quantidade, estoque_produto, estoque_loja");
        $this->db->where('estoque_loja =', $a['estoque_loja']);
        $this->db->where('estoque_produto =', $a['estoque_produto']);
        $this->db->group_by("estoque_produto");
        $estoques = $this->db->get('estoque')->row_array();*/

        return $a;
    }

    public function getProdutoSite($id)
    {
        $this->db->select("produto_id, produto_nome, produto_modelo, produto_detalhes, produto_imagens_opcional1, produto_imagens_opcional2, produto_imagens_opcional3, produto_imagens_opcional4, produto_imagens_opcional5, produto_tamanhos, produto_cores, produto_variacoes, produto_especifico, produto_idloja, produto_habilitado, produto_departamentos");
        $this->db->where('produto_id', $id);
        $a = $this->db->get('produtos')->row_array();

        $a['tamanhos'] = explode("¬", $a['produto_tamanhos']);
        $a['cores'] = explode("¬", $a['produto_cores']);
        unset($a['produto_tamanhos']);
        unset($a['produto_cores']);

        $this->db->select("sum(estoque_quantidade) as estoque_quantidade, estoque_produto, estoque_loja");
        $this->db->where('estoque_loja =', $a['estoque_loja']);
        $this->db->where('estoque_produto =', $a['estoque_produto']);
        $this->db->group_by("estoque_produto");
        $estoques = $this->db->get('estoque')->row_array();

        return $a;
    }

    public function getEstoqueSite($id)
    {
        $this->db->select("produto_nome");
        $this->db->where('produto_id', $id);
        $a = $this->db->get('produtos')->row_array();

        $this->db->select("sum(estoque_quantidade) as estoque_quantidade, estoque_produto");
        $this->db->where('estoque_loja =', 25);
        $this->db->where('estoque_produto =', $a['produto_nome']);
        $this->db->group_by("estoque_produto");
        $estoques = $this->db->get('estoque')->row_array();

        //$estoques['estoque_quantidade'] = 80;

        return $estoques['estoque_quantidade'];
    }

    public function getValorSite($id)
    {
        $this->db->select("produto_nome, produto_valor");
        $this->db->where('produto_id', $id);
        $a = $this->db->get('produtos')->row_array();

        /*$this->db->select("estoque_valor");
        $this->db->where('estoque_loja =', 25);
        $this->db->where('estoque_produto =', $a['produto_nome']);
        $this->db->order_by("estoque_id", 'DESC');
        $this->db->limit(1);
        $estoques = $this->db->get('estoque')->row_array();

        //$estoques['estoque_valor'] = 80;
        
        return $estoques['estoque_valor'];
        */
        return $a['produto_valor'];
    }

    public function getTamanhosSite($id)
    {
        $this->db->select("produto_tamanhos");
        $this->db->where('produto_id', $id);
        $a = $this->db->get('produtos')->row_array();

        $a['tamanhos'] = explode("¬", $a['produto_tamanhos']);
        unset($a['produto_tamanhos']);

        $this->db->select("sum(estoque_quantidade) as estoque_quantidade, estoque_produto, estoque_loja");
        $this->db->where('estoque_loja =', $a['estoque_loja']);
        $this->db->where('estoque_produto =', $a['estoque_produto']);
        $this->db->group_by("estoque_produto");
        $estoques = $this->db->get('estoque')->row_array();

        /*$a = array(
            '0' => "Pequeno",
            '1' => "Medio",
            '2' => "Grande",
            );*/

        return $a;
    }

    public function getCoresSite($id)
    {
        $this->db->select("produto_tamanhos");
        $this->db->where('produto_id', $id);
        $a = $this->db->get('produtos')->row_array();

        $a['cores'] = explode("¬", $a['produto_cores']);
        unset($a['produto_cores']);

        $this->db->select("sum(estoque_quantidade) as estoque_quantidade, estoque_produto, estoque_loja");
        $this->db->where('estoque_loja =', $a['estoque_loja']);
        $this->db->where('estoque_produto =', $a['estoque_produto']);
        $this->db->group_by("estoque_produto");
        $estoques = $this->db->get('estoque')->row_array();

        /*$a = array(
            '0' => "Vermelho",
            '1' => "Azul",
            '2' => "Preto",
            );*/

        return $a;
    }

    public function getRelacionadoSite($id)
    {
        $this->db->select("produto_nome");
        $this->db->where('produto_id', $id);
        $a = $this->db->get('produtos')->row_array();

        $rells = explode(" ", $a['produto_nome']);
        $relacionados = array();
        for ($i = 0; $i < count($rells); $i++) {
            $this->db->select("produto_id, produto_nome");
            $this->db->like('produto_nome', $rells[$i]);
            $helper = $this->db->get('produtos')->result_array();
            $relacionados = array_merge($relacionados, $helper);
        }
        $relacionados = array_map("unserialize", array_unique(array_map("serialize", $relacionados)));
        return $relacionados;
    }

    public function getPromocaoSite($id, $valor)
    {
        $this->db->select("produto_preco_promocao, produto_preco_promocao_ativo, produto_desconto, produto_desconto_ativo, produto_datainicial_promocao, produto_datafinal_promocao, produto_datafinal_promocao_ativo");
        $this->db->where('produto_id', $id);
        $a = $this->db->get('produtos')->row_array();

        if ($a['produto_preco_promocao_ativo'] == 1) {
            $newPrice = $a['produto_preco_promocao'];
            $desconto = 100 - ($newPrice * 100) / $valor;
        } elseif ($a['produto_desconto_ativo'] == 1) {
            $newPrice = ($valor * (1 - ($a['produto_desconto'] / 100)));
            $desconto = $a['produto_desconto'];
        } elseif ($a['produto_datafinal_promocao_ativo'] == 1) {
            $hoje = date('Y-m-d');
            if ($a['produto_datainicial_promocao'] <=  $hoje) {
                if ($a['produto_datafinal_promocao'] >=  $hoje) {
                    $newPrice = ($valor * (1 - ($a['produto_desconto'] / 100)));
                    $desconto = $a['produto_desconto'];
                } else {
                    $newPrice = $valor;
                    $desconto = 0;
                }
            } else {
                $newPrice = $valor;
                $desconto = 0;
            }
        } else {
            $newPrice = $valor;
            $desconto = 0;
        }

        $promocao = array(
            'precoNovo'     => $newPrice,
            'porcentagem'   => $desconto,
            'valorOriginal' => $valor,
        );
        return $promocao;
    }

    public function getDepartamentoLista($lista){
        if (!empty($lista)) {
            if (strpos($lista, "¬")) {
                $depart = explode("¬", $lista);
            } else {
                $depart = array(
                    '0' => $lista,
                    );
            }
            for ($i = 0; $i < count($depart); $i++) {
                $this->db->select("departamento_nome");
                $this->db->where("departamento_id", $depart[$i]);
                $b = $this->db->get('departamentos')->row_array();
                $a[$i] = $b['departamento_nome'];
            }
            $a = implode(" - ", $a);
            return $a;
        } else {
            return null;
        }
    }

    // *********************  Produtos  ********************* 

    public function insert($new)
    {
        $this->db->insert('produtos', $new);
        return $this->db->insert_id();
    }

    public function update($new)
    {
        $this->db->where('produto_grupo', $new["produto_grupo"]);
        return $this->db->update('produtos', $new);
    }

    public function update2($nome, $new)
    {
        $this->db->where('produto_nome', $nome);
        $this->db->update('produtos', $new);
    }

    public function getAllProdutosByOpcaoTamanho($id)
    {
        $this->db->like('produto_tamanhos', $id, 'none');
        $this->db->or_like('produto_tamanhos', $id . '¬', 'after');
        $this->db->or_like('produto_tamanhos', '¬' . $id, 'before');
        $this->db->or_like('produto_tamanhos', '¬' . $id . '¬', 'both');
        return $this->db->get('produtos')->result_array();
    }

    public function getAllProdutosByOpcaoCor($id)
    {
        $this->db->like('produto_cores', $id, 'none');
        $this->db->or_like('produto_cores', $id . '¬', 'after');
        $this->db->or_like('produto_cores', '¬' . $id, 'before');
        $this->db->or_like('produto_cores', '¬' . $id . '¬', 'both');
        return $this->db->get('produtos')->result_array();
    }

    public function getProdNome($nome)
    {
        $this->db->where('produto_nome', $nome);
        return $this->db->get('produtos')->row_array();
    }

    public function delete($id)
    {
        $this->db->where('produto_id', $id);
        $this->db->delete('produtos');
    }

    public function getAll()
    {
        return $this->db->get('produtos')->result_array();
    }

    public function getAllAleatorio()
    {
        $this->db->order_by('produto_id', 'random');
        $this->db->limit(4);
        $a = $this->db->get('produtos')->result_array();

        for ($i = 0; $i < count($a); $i++) {
            $this->db->where('estoque_produto', $a[$i]['produto_nome']);
            $this->db->order_by('estoque_id', 'DESC');
            $aux = $this->db->get('estoque')->row_array();

            $a[$i]['produto_valor'] = $aux['estoque_valor'];
        }

        return $a;
    }

    public function getAllIndex()
    {
        $this->db->order_by('produto_id', 'RANDOM');
        $this->db->limit(8);
        $a = $this->db->get('produtos')->result_array();

        /*for ($i = 0; $i < count($a); $i++) {
            $this->db->where('estoque_produto', $a[$i]['produto_nome']);
            $this->db->order_by('estoque_id', 'DESC');
            $aux = $this->db->get('estoque')->row_array();
            $a[$i]['produto_valor'] = $aux['estoque_valor'];
        }*/

        return $a;
    }

    public function getAllAtivos()
    {
        $this->db->where('produto_habilitado', 1);
        return $this->db->get('produtos')->result_array();
    }

    public function get($id)
    {
        $this->db->where('produto_id', $id);
        $data = $this->db->get('produtos');
        return $data->row_array();
    }

    public function getAtivo($id)
    {
        $this->db->where('produto_habilitado', 1);
        $this->db->where('produto_id', $id);
        $data = $this->db->get('produtos')->row_array();

        $this->db->where('estoque_produto', $data['produto_nome']);
        $this->db->order_by('estoque_id', 'DESC');
        $a = $this->db->get('estoque')->row_array();

        $data['produto_valor'] = $a['estoque_valor'];

        return $data;
    }

    public function get_count()
    {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('produtos')->row_array();
        return $a['pages'];
    }
    
    public function getAllProdutos($filtro)
    {
        if($filtro != null){
            
        }
        $this->db->select('produto_id, produto_nome, produto_modelo, produto_quantidade, produto_valor, produto_habilitado,produto_codigo, produto_imagens_opcional1');
        // ***** adicionado para atualizações de 06/08/2022
        $this->db->group_by('produto_grupo');
        // ***** FIM adicionado para atualizações de 06/08/2022
        $this->db->order_by('produto_id', 'desc');
        // ----- de onde esta vindo este limit e start ?
        $this->db->limit($limit, $start);
        $data = $this->db->get('produtos');
        return $data->result_array();
    }
    
    /*public function getAllProdutos($limit, $start){
        $this->db->select('produto_id, produto_nome, produto_modelo, produto_quantidade, produto_valor, produto_habilitado');
        // ***** adicionado para atualizações de 06/08/2022
        $this->db->group_by('produto_grupo');
        // ***** FIM adicionado para atualizações de 06/08/2022
        $this->db->order_by('produto_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('produtos');
        return $data->result_array();
    }*/

    public function get_countFiltro($filter)
    {
        $this->db->select(" COUNT(*) as pages");
        $this->db->join('status', 'produtos.produto_habilitado = status.status_id');
        $this->db->like('produto_nome', $filter, 'both');
        $this->db->or_like('produto_modelo', $filter, 'both');
        $this->db->or_like('produto_quantidade', $filter, 'both');
        $this->db->or_like('produto_valor', $filter, 'both');
        $this->db->or_like('produto_habilitado', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        $a = $this->db->get('produtos')->row_array();
        return $a['pages'];
    }

    public function getAllProdutosFiltro($filter, $limit, $start)
    {
        $this->db->select('produto_id, produto_nome, produto_modelo, produto_quantidade, produto_valor, produto_habilitado');
        $this->db->join('status', 'produtos.produto_habilitado = status.status_id');
        $this->db->like('produto_nome', $filter, 'both');
        $this->db->or_like('produto_modelo', $filter, 'both');
        $this->db->or_like('produto_quantidade', $filter, 'both');
        $this->db->or_like('produto_valor', $filter, 'both');
        $this->db->or_like('produto_habilitado', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        // ***** adicionado para atualizações de 06/08/2022
        $this->db->group_by('produto_grupo');
        // ***** FIM adicionado para atualizações de 06/08/2022
        $this->db->order_by('produto_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('produtos');
        return $data->result_array();
    }

    // *********************  Solicitação  ********************* 

    public function insertSolicitacao($new)
    {
        $this->db->insert('solicitacoes', $new);
    }

    public function getAllSolicitacoes()
    {
        $this->db->select('solicitacoes.solitacao_id, solicitacoes.solicitacao_nome, solicitacoes.solicitacao_empresa, solicitacoes.solicitacao_empresa, solicitacoes.solicitacao_cnpj, solicitacoes.solicitacao_status, status_solicitacoes.status_nome, status_solicitacoes.status_id');
        $this->db->join('status_solicitacoes', 'solicitacoes.solicitacao_status = status_solicitacoes.status_id');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getSolicitacao($id)
    {
        $this->db->where('solicitacao_id', $id);
        $data = $this->db->get('solicitacoes');
        return $data->row_array();
    }

    public function updateSolicitacao($id, $new)
    {
        $this->db->where('solicitacao_id', $id);
        $this->db->update('solicitacoes', $new);
    }

    public function get_countSolicitacoes()
    {
        $this->db->select(" COUNT(*) as pages");
        $a = $this->db->get('solicitacoes')->row_array();
        return $a['pages'];
    }

    public function getAllSolicitacoesPagination($limit, $start)
    {
        $this->db->select('solicitacao_id, solicitacao_nome, solicitacao_empresa, solicitacao_cnpj, solicitacao_status');
        $this->db->limit($limit, $start);
        $data = $this->db->get('solicitacoes');
        return $data->result_array();
    }

    public function get_countSolicitacoesFiltro($filter)
    {
        $this->db->select(" COUNT(*) as pages");
        $this->db->like('solicitacao_nome', $filter, 'both');
        $this->db->or_like('solicitacao_empresa', $filter, 'both');
        $this->db->or_like('solicitacao_cnpj', $filter, 'both');
        $this->db->or_like('solicitacao_status', $filter, 'both');
        $a = $this->db->get('solicitacoes')->row_array();
        return $a['pages'];
    }

    public function getAllSolicitacoesPaginationFiltro($filter, $limit, $start)
    {
        $this->db->select('solicitacao_id, solicitacao_nome, solicitacao_empresa, solicitacao_cnpj, solicitacao_status');
        $this->db->join('status_solicitacoes', 'solicitacoes.solicitacao_status = status_solicitacoes.status_id');
        $this->db->like('solicitacao_nome', $filter, 'both');
        $this->db->or_like('solicitacao_empresa', $filter, 'both');
        $this->db->or_like('solicitacao_cnpj', $filter, 'both');
        $this->db->or_like('solicitacao_status', $filter, 'both');
        $this->db->or_like('status_nome', $filter, 'both');
        $this->db->order_by('solicitacao_id', 'desc');
        $this->db->limit($limit, $start);
        $data = $this->db->get('solicitacoes');
        return $data->result_array();
    }

    public function relatorioEstoqueFiltros($filtros)
    {

        $this->db->select('departamento_id, departamento_nome');
        if (isset($filtros['departamentos'])) {
            $this->db->where_in('departamento_id', $filtros['departamentos']);
        }
        $departamentos_name = $this->db->get('departamentos')->result_array();

        $vairiacoes = array();
        $produtos = array();


        for ($aux = 0; $aux < count($departamentos_name); $aux++) {
            $this->db->select('produto_tamanhos,produto_cores,produto_estoques,produto_nome');
            if ($filtros["ordem"] == "DESC") {
                $this->db->order_by("produto_nome", "DESC");
            }
            $this->db->where('produto_departamentos', $departamentos_name[$aux]['departamento_id']);
            $vairiacoes[] = $this->db->get('produtos')->result_array();
        }

        for ($aux = 0; $aux < count($vairiacoes); $aux++) {
            if (count($vairiacoes[$aux]) > 0) {
                $totalGeral = 0;
                $produtos[$aux]["nome"] =  $vairiacoes[$aux][0]["produto_nome"];
                foreach ($vairiacoes[$aux] as $value) {
                    $produtos[$aux]["variacao"][] = array(
                        "cor" => $this->retornaCor($value["produto_cores"]),
                        "tamanho" =>  $this->retornaTamanho($value["produto_tamanhos"]),
                        "quantidade" => $value["produto_estoques"],
                    );
                    $totalGeral += $value["produto_estoques"];
                }
                $produtos[$aux]["total"] =  $totalGeral;
            }
        }

        $retorno = array(
            "produtos" => $produtos,
            "departamentos" => "",
            "loja" => "",
        );


        return $retorno;
    }
    public function retornaCor($id)
    {
        $this->db->select('opcao_nome');
        $this->db->where('opcao_id', $id);
        $data = $this->db->get('opcoes')->result_array()[0]["opcao_nome"];
        return $data;
    }
    public function retornaTamanho($id)
    {
        $this->db->select('opcao_nome');
        $this->db->where('opcao_id', $id);
        $data = $this->db->get('opcoes')->result_array()[0]["opcao_nome"];
        return $data;
    }

    // *********************   ANDAMENTOS  ********************* 
    //  ------- GETS ------- 
    public function getAndamento($id)
    {
        $this->db->where('andamento_id', $id);
        $data = $this->db->get('andamentos');
        return $data->row_array();
    }

    public function getAllAndamento($id)
    {
        $this->db->where('andamento_solicitacao_id', $id);
        $data = $this->db->get('andamentos');
        return $data->result_array();
    }

    // ------- INSERTS ------- 
    public function insertAndamento($new)
    {
        $this->db->insert('andamentos', $new);
    }

    // ------- UPDATES ------- 
    public function updateAndamento($id, $new)
    {
        $this->db->where('andamento_id', $id);
        $this->db->update('andamentos', $new);
    }

    //  ------- DELETE ------- 
    public function deleteAndamento($id)
    {
        $this->db->where('andamento_id', $id);
        $this->db->delete('andamentos');
    }

    //*************  Consultas  *******************
    public function getProdutoAdd($id)
    {
        $this->db->select('produto_id, produto_nome, produto_modelo, produto_valor');
        $this->db->where('produto_id', $id);
        $data = $this->db->get('produtos')->row_array();

        $data['produto_valor'] = number_format($data['produto_valor'], 2, ',', '.');

        return $data;
    }

    ////////////////////////////////// BUSCA /////////////////////////////////

    public function get_countBuscaFiltro($categoria, $filter)
    {
        $cont = 0;
        if ($categoria == 'P') {
            $this->db->select('COUNT(*) as pages');
            $this->db->like('produto_nome', $filter);
            $produtos = $this->db->get('produtos')->row_array();
            return $produtos['pages'];
        } else if ($categoria == 'D') {
            $produtos = $this->db->get('produtos')->result_array();
            foreach ($produtos as $p) {
                $aux_p = explode('¬', $p['produto_departamentos']);
                foreach ($aux_p as $ap) {
                    $this->db->where('departamento_id', $ap);
                    $departamento = $this->db->get('departamentos')->row_array();
                    if ($departamento) {
                        if ($departamento['departamento_id'] == $filter) {
                            $cont++;
                        }
                    }
                }
            }
        } else if ($categoria == 'S') {
            $produtos = $this->db->get('produtos')->result_array();
            foreach ($produtos as $p) {
                $aux_p = explode('¬', $p['produto_departamentos']);
                foreach ($aux_p as $ap) {
                    $this->db->where('departamento_id', $ap);
                    $departamento = $this->db->get('departamentos')->row_array();
                    if ($departamento) {
                        $aux_d = explode('¬', $departamento['departamento_sub_id']);
                        foreach ($aux_d as $ad) {
                            $this->db->where('subdepartamento_id', $ad);
                            $sub = $this->db->get('subdepartamentos')->row_array();
                            if ($sub) {
                                if ($sub['subdepartamento_id'] == $filter) {
                                    $cont++;
                                }
                            }
                        }
                    }
                }
            }
        }


        return $cont;
    }

    public function getAllBuscaFiltro($categoria, $filter, $limit, $start)
    {
        $array = [];
        $cont = 0;

        if ($categoria == 'P') {
            $this->db->like('produto_nome', $filter);
            $this->db->limit($limit, $start);
            return $this->db->get('produtos')->result_array();
        } else if ($categoria == 'D') {
            $produtos = $this->db->get('produtos')->result_array();
            foreach ($produtos as $p) {
                $aux_p = explode('¬', $p['produto_departamentos']);
                foreach ($aux_p as $ap) {
                    $this->db->where('departamento_id', $ap);
                    $departamento = $this->db->get('departamentos')->row_array();
                    if ($departamento) {
                        if ($departamento['departamento_id'] == $filter) {
                            $array[$cont] = array(
                                'produto_id'                        => $p['produto_id'],
                                'produto_nome'                      => $p['produto_nome'],
                                'produto_departamentos'             => $p['produto_departamentos'],
                                'produto_ativo_atacado'             => $p['produto_ativo_atacado'],
                                'produto_datainicial_promocao'      => $p['produto_datainicial_promocao'],
                                'produto_datafinal_promocao_ativo'  => $p['produto_datafinal_promocao_ativo'],
                                'produto_cupom_ativo'               => $p['produto_cupom_ativo'],
                                'produto_preco_promocao_ativo'      => $p['produto_preco_promocao_ativo'],
                                'produto_desconto_ativo'            => $p['produto_desconto_ativo'],
                                'produto_valor'                     => $p['produto_valor'],
                            );
                            $cont++;
                        }
                    }
                }
            }
        } else if ($categoria == 'S') {
            $produtos = $this->db->get('produtos')->result_array();
            foreach ($produtos as $p) {
                $aux_p = explode('¬', $p['produto_departamentos']);
                foreach ($aux_p as $ap) {
                    $this->db->where('departamento_id', $ap);
                    $departamento = $this->db->get('departamentos')->row_array();
                    if ($departamento) {
                        $aux_d = explode('¬', $departamento['departamento_sub_id']);
                        foreach ($aux_d as $ad) {
                            $this->db->where('subdepartamento_id', $ad);
                            $sub = $this->db->get('subdepartamentos')->row_array();
                            if ($sub) {
                                if ($sub['subdepartamento_id'] == $filter) {
                                    $array[$cont] = array(
                                        'produto_id'                        => $p['produto_id'],
                                        'produto_nome'                      => $p['produto_nome'],
                                        'produto_departamentos'             => $p['produto_departamentos'],
                                        'produto_ativo_atacado'             => $p['produto_ativo_atacado'],
                                        'produto_datainicial_promocao'      => $p['produto_datainicial_promocao'],
                                        'produto_datafinal_promocao_ativo'  => $p['produto_datafinal_promocao_ativo'],
                                        'produto_cupom_ativo'               => $p['produto_cupom_ativo'],
                                        'produto_preco_promocao_ativo'      => $p['produto_preco_promocao_ativo'],
                                        'produto_desconto_ativo'            => $p['produto_desconto_ativo'],
                                        'produto_valor'                     => $p['produto_valor'],
                                    );
                                    $cont++;
                                }
                            }
                        }
                    }
                }
            }
        }

        $array2 = [];
        $cont2 = 0;

        for ($i = $start; $i < count($array); $i++) {

            $array2[$cont2] = $array[$i];
            $cont2++;

            if ($i == ($limit + $start) - 1) {
                break;
            }
        }
        return $array2;
    }

    /*************************************
     **************************************
     * FUNÇÕES DE BUSCA E PAGINAÇÃO NOVAS *
     **************************************
     **************************************/

    public function retrieveBusca($buscaKey, $start, $stop)
    {
        /*$this->db->where('produto_habilitado', 1);
        $busca = explode(" ", $buscaKey);
        $this->db->where('produto_nome LIKE', '%'.$busca[0].'%');    
        for($i=1; $i<count($busca); $i++){
            $this->db->or_where('produto_nome LIKE', '%'.$busca[$i].'%');    
        }
        $this->db->limit($stop, $start);
        $this->db->order_by('produto_id', 'DESC');
        $a = $this->db->get('produtos')->result_array();
        return $a;
        */
        $this->db->select('produto_id');
        $this->db->where('produto_habilitado', 1);
        $this->db->like('produto_nome', $buscaKey, 'none');
        $this->db->or_like('produto_nome', $buscaKey, 'after');
        $this->db->or_like('produto_nome', $buscaKey, 'before');
        $this->db->or_like('produto_nome', $buscaKey, 'both');
        $this->db->limit($stop, $start);
        $this->db->order_by('produto_id', 'DESC');
        $a = $this->db->get('produtos')->result_array();
        $contador = 0;
        $prod = array();
        foreach ($a as $a) {
            $b = $this->getProdutoSite($a['produto_id']);
            $c = $this->getValorSite($a['produto_id']);
            $d = $this->getPromocaoSite($a['produto_id'], $c);
            $e = $this->getDepartamentoLista($a['produto_departamentos']);

            print_r($a['produto_departamentos']);

            $prod[$contador] = array(
                'produto_id'            => $b['produto_id'],
                'produto_nome'          => $b['produto_nome'],
                'produto_departamento'  => $e,
                'produto_valor'         => $d['precoNovo'],
            );

            if ($d['valorOriginal'] != $d['precoNovo']) {
                $prod[$contador]['produto_promocao']     = $d['valorOriginal'];
                $prod[$contador]['produto_porcentagem']  = $d['porcentagem'];
            }

            $contador++;
        }

        return $prod;
    }

    public function retrieveDepartamento($termo, $start, $stop)
    {
        $this->db->where('produto_habilitado', 1);
        $this->db->like('produto_departamentos', $termo, 'none');
        $this->db->or_like('produto_departamentos', $termo . '¬', 'after');
        $this->db->or_like('produto_departamentos', '¬' . $termo, 'before');
        $this->db->or_like('produto_departamentos', '¬' . $termo . '¬', 'both');
        $this->db->limit($stop, $start);
        $a = $this->db->get('produtos')->result_array();

        for ($i = 0; $i < count($a); $i++) {
            $this->db->where('estoque_produto', $a[$i]['produto_nome']);
            $this->db->order_by('estoque_id', 'DESC');
            $aux = $this->db->get('estoque')->row_array();

            $a[$i]['produto_valor'] = $aux['estoque_valor'];
        }

        return $a;
    }

    public function countBusca($termo)
    {
        $busca = explode(" ", $termo);
        $this->db->select("COUNT('produto_id') as count");
        $this->db->where('produto_nome LIKE', '%' . $busca[0] . '%');
        for ($i = 1; $i < count($busca); $i++) {
            $this->db->or_where('produto_nome LIKE', '%' . $busca[$i] . '%');
        }
        $a = $this->db->get('produtos')->row_array();
        return $a;
    }

    public function countDepartamento($termo)
    {
        //SELECT COUNT(`produto_id`) FROM `produtos` WHERE `produto_departamentos` LIKE '%12%'
        $this->db->select("COUNT('produto_id') as count");
        $this->db->like('produto_departamentos', $termo, 'none');
        $this->db->or_like('produto_departamentos', $termo . '¬', 'after');
        $this->db->or_like('produto_departamentos', '¬' . $termo, 'before');
        $this->db->or_like('produto_departamentos', '¬' . $termo . '¬', 'both');
        return $this->db->get('produtos')->row_array();
    }


    // *********************  Update  ********************* //
    /*Funções REfeitas por Anderson Moreira em 25-09-2022
    
    PELAMORDEDEUS NÃO ALTERAR NADA, SE PRECISAR COPIE O CODIGO, COMENTE ESTE E FAÇA UM NOVO, NÃO MEXA NO QUE JÁ ESTÁ FUNCIONANDO
    */
    public function createUpdate($dados){
        
        if(count($dados['departamentos']) > 1){
            $departamentos = implode("¬", $dados['departamentos']);
        }else{
            $departamentos = $dados['departamentos'][0];
        }
        if(count($dados['relacionados']) > 1){
            $relacionados =  implode("¬", $dados['relacionados']);
        }else{
            $relacionados = $dados['relacionados'][0];
        }
        
        $info = array(
            'produto_nome'                      => mb_strtoupper($dados['nome']),
            'produto_modelo'                    => mb_strtoupper($dados['modelo']),
            'produto_codigo'                    => mb_strtoupper($dados['codigo']),
            'produto_fabricante'                => mb_strtoupper($dados['fabricante']),
            'produto_valor'                     => $this->limpaValor($dados['valor']),
            'produto_preco_promocao'            => $this->limpaValor($dados['preco_promocao']),
            'produto_preco_promocao_ativo'      => $dados['preco_promocao_ativo'],
            'produto_desconto'                  => $dados['desconto'],
            'produto_desconto_ativo'            => $dados['desconto_ativo'],
            'produto_datainicial_promocao'      => $dados['datainicial_promocao'],
            'produto_datafinal_promocao'        => $dados['datafinal_promocao'],
            'produto_datafinal_promocao_ativo'  => $dados['datafinal_promocao_ativo'],
            'produto_cupom'                     => $dados['cupom'],
            'produto_cupom_ativo'               => $dados['cupom_ativo'],
            'produto_marca_id'                  => $dados['marca'],
            'produto_departamentos'             => $departamentos,
            'produto_relacionados'              => $relacionados,
            'produto_habilitado'                => $dados['habilitado'],
            'produto_grupo'                     => md5(mb_strtoupper($dados['nome'])),
        );
        
        if(strpos($dados['tamanhos'], '¬') !== false ){
            $tamanho    = explode("¬", $dados['tamanhos']);
            $cor        = explode("¬", $dados['cores']);
            $estoque    = explode("¬", $dados['estoque']);
        }else{
            $tamanho[0] = $dados['tamanhos'];
            $cor[0]     = $dados['cores'];
            $estoque[0] = $dados['estoque'];
        }
        
        for($i=0; $i<count($tamanho); $i++){
            $this->db->where('produto_tamanhos', $tamanho[$i]);
            $this->db->where('produto_cores', $cor[$i]);
            $this->db->where('produto_nome', $info['produto_nome']);
            $z = $this->db->get('produtos')->row_array();
            
            if(!empty($z)){
                $z['produto_estoques'] = $z['produto_estoques'] + $estoque[$i];
                $this->db->replace('produtos', $z);
            }else{
                $info['produto_tamanhos']   = $tamanho[$i];
                $info['produto_cores']      = $cor[$i];
                $info['produto_estoques']   = $estoque[$i];
                $this->db->insert('produtos', $info);
            }
        }

        if ($_FILES['imagem']["name"]) {
            $config2['upload_path']          = './imagens/trajes/';
            $config2['allowed_types']        = 'gif|jpg|png|jpeg';
            $config2['max_size']             = '10000';
            $config2['overwrite']            = true;
            $config2['file_name']            = $info['produto_grupo'] . '_imagem_principal.jpg';
            $this->load->library('upload', $config2);
            $this->upload->initialize($config2);
            $this->upload->do_upload('imagem');

            $this->db->where('produto_id', $info['produto_grupo']);
            $this->db->update('produtos', array("produto_imagens_opcional1" => "/imagens/trajes/" . $info['produto_grupo'] . '_imagem_principal.jpg'));
        }
    } // LEIA O COMENTÁRIO NO INICIO DO BLOCO ANTES DE ALTERAR ALGO
    
    function getProduto($id){
        $this->db->where('produto_id', $id);
        //$this->db->order_by('produto_id', 'DESC');
        $produto =  $this->db->get('produtos')->result_array();
        return print_r_pre($produto);
    } // LEIA O COMENTÁRIO NO INICIO DO BLOCO ANTES DE ALTERAR ALGO

    function limpaValor($valor){
        $valor = str_replace('.', '', $valor);
        $valor = str_replace(',', '.', $valor);
        return $valor;
    } // LEIA O COMENTÁRIO NO INICIO DO BLOCO ANTES DE ALTERAR ALGO

    public function getTrajeById($id){

        $this->db->where('produto_id', $id);
        $z = $this->db->get('produtos')->row_array();

        $this->db->where('produto_grupo', $z['produto_grupo']);
        $a = $this->db->get('produtos')->result_array();

        $traje = array(
            'produto_nome'                      => $z['produto_nome'],
            'produto_modelo'                    => $z['produto_modelo'],
            'produto_grupo'                     => $z['produto_grupo'],
            'produto_codigo'                    => $z['produto_codigo'],
            'produto_fabricante'                => $z['produto_fabricante'],
            'produto_valor'                     => $z['produto_valor'],
            'produto_habilitado'                => $z['produto_habilitado'],
            'produto_quantidade'                => $z['produto_quantidade'],
            'produto_estoque_minimo'            => $z['produto_estoque_minimo'],
            'produto_minimo_venda'              => $z['produto_minimo_venda'],
            'produto_reduzir'                   => $z['produto_reduzir'],
            'produto_un_medida'                 => $z['produto_un_medida'],
            'produto_comprimento'               => $z['produto_comprimento'],
            'produto_largura'                   => $z['produto_largura'],
            'produto_altura'                    => $z['produto_altura'],
            'produto_un_peso'                   => $z['produto_un_peso'],
            'produto_peso'                      => $z['produto_peso'],
            'produto_sku'                       => $z['produto_sku'],
            'produto_ncm'                       => $z['produto_ncm'],
            'produto_cest'                      => $z['produto_cest'],
            'produto_upc'                       => $z['produto_upc'],
            'produto_ean'                       => $z['produto_ean'],
            'produto_jan'                       => $z['produto_jan'],
            'produto_isbn'                      => $z['produto_isbn'],
            'produto_mpn'                       => $z['produto_mpn'],
            'produto_detalhes'                  => $z['produto_detalhes'],
            'produto_preco_promocao'            => $z['produto_preco_promocao'],
            'produto_preco_promocao_ativo'      => $z['produto_preco_promocao_ativo'],
            'produto_desconto'                  => $z['produto_desconto'],
            'produto_desconto_ativo'            => $z['produto_desconto_ativo'],
            'produto_datainicial_promocao'      => $z['produto_datainicial_promocao'],
            'produto_datafinal_promocao'        => $z['produto_datafinal_promocao'],
            'produto_datafinal_promocao_ativo'  => $z['produto_datafinal_promocao_ativo'],
            'produto_cupom'                     => $z['produto_cupom'],
            'produto_marca_id'                  => $z['produto_marca_id'],
            'produto_departamentos'             => $z['produto_departamentos'],
            'produto_relacionados'              => $z['produto_relacionados'],
            'produto_cupom_ativo'               => $z['produto_cupom_ativo'],
            'produto_imagens_opcional1'         => $z['produto_imagens_opcional1'],
            'produto_imagens_opcional2'         => $z['produto_imagens_opcional2'],
            'produto_imagens_opcional3'         => $z['produto_imagens_opcional3'],
            'produto_imagens_opcional4'         => $z['produto_imagens_opcional4'],
            'produto_imagens_opcional5'         => $z['produto_imagens_opcional5'],
            'produto_especifico'                => $z['produto_especifico'],
            'produto_idloja'                    => $z['produto_idloja'],
            'produto_variacoes'                 => $z['produto_variacoes'],
        );

        $tamArray = $corArray = $estArray = $lblArray = "";
        for ($i = 0; $i < count($a); $i++) {
            $variacao[$i] = array(
                'produto_id'            => $a[$i]['produto_id'],
                'produto_tamanhos'      => $this->buscaCorTam($a[$i]['produto_tamanhos']),
                'produto_cores'         => $this->buscaCorTam($a[$i]['produto_cores']),
                'produto_estoques'      => $a[$i]['produto_estoques'],
                'produto_grupo'         => $a[$i]['produto_grupo'],
            );
            if ($i > 0) {
                $tamArray .= "¬";
                $corArray .= "¬";
                $estArray .= "¬";
                $lblArray .= "¬";
            }
            $tamArray .= $a[$i]['produto_tamanhos'];
            $corArray .= $a[$i]['produto_cores'];
            $estArray .= $a[$i]['produto_estoques'];
            $lblArray .= $a[$i]['produto_id'];
        }

        $traje['variacoes'] = $variacao;
        $traje['tamanhos']  = $tamArray;
        $traje['cores']     = $corArray;
        $traje['estoque']   = $estArray;
        $traje['labels']    = $lblArray;
        //print_r_pre($traje);
        return $traje;
    } // LEIA O COMENTÁRIO NO INICIO DO BLOCO ANTES DE ALTERAR ALGO

    function buscaCorTam($id){
        $this->db->where('opcao_id', $id);
        $a = $this->db->get('opcoes')->row_array();
        return $a['opcao_nome'];
    } // LEIA O COMENTÁRIO NO INICIO DO BLOCO ANTES DE ALTERAR ALGO

    function removeVariante($id){
        $this->db->where('produto_id', $id);
        return $this->db->delete('produtos');
    } // LEIA O COMENTÁRIO NO INICIO DO BLOCO ANTES DE ALTERAR ALGO

    function alteraVariante($dados){

        $this->db->where('produto_id', $dados['id']);
        $a = $this->db->get('produtos')->row_array();

        $a['produto_estoques'] = $dados['estoque'];

        $this->db->where('produto_id', $dados['id']);
        return $this->db->update('produtos', $a);
    } // LEIA O COMENTÁRIO NO INICIO DO BLOCO ANTES DE ALTERAR ALGO

    function novaVariante($dados){
        $id = explode("¬", $dados['id']);
        $this->db->where('produto_id', $id[0]);
        $a = $this->db->get('produtos')->row_array();

        for ($i = 0; $i < count($id); $i++) {
            $this->db->where('produto_tamanhos', $dados['tamanho']);
            $this->db->where('produto_cores', $dados['cor']);
            $this->db->where('produto_nome', $a['produto_nome']);
            $z = $this->db->get('produtos')->row_array();
        }

        if (empty($z)) {
            unset($a['produto_id']);
            $a['produto_tamanhos']  = $dados['tamanho'];
            $a['produto_cores']     = $dados['cor'];
            $a['produto_estoques']  = $dados['estoque'];
            $retorno = array(
                'tipo'  =>  "insert",
                'valor' =>  $this->db->insert('produtos', $a),
            );
        } else {
            $z['produto_estoques']  = $dados['estoque'] + $z['produto_estoques'];
            $retorno = array(
                'tipo'  =>  "update",
                'valor' =>  $this->db->replace('produtos', $z),
                'estNew' => $z['produto_estoques'],
            );
        }
        return $retorno;
    } // LEIA O COMENTÁRIO NO INICIO DO BLOCO ANTES DE ALTERAR ALGO
    // *********************  Update  ********************* //
}
