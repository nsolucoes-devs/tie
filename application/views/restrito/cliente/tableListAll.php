    <style>
        .pagination>.active>a,
        .pagination>.active>a:focus,
        .pagination>.active>a:hover,
        .pagination>.active>span,
        .pagination>.active>span:focus,
        .pagination>.active>span:hover {
            z-index: 3;
            color: #fff;
            cursor: default;
            background-color: #4ECDC4;
            border-color: #4ECDC4;
        }

        .modal-dialog-cad {
            width: 60%;
            max-width: 60%;
            margin-left: 20%;
            margin-right: 20%;
        }

        #myTable_wrapper .row {
            margin: 0;
        }

        .c-20 {
            width: 20%;
            flex: 0 0 20%;
            max-width: 20%;
            padding: 0 15px;
            float: left;
        }

        .c-check {
            display: inline;
            margin-right: 10px;
        }

        .c-title {
            font-weight: bold;
            font-size: 15px;
        }

        .c-sub {
            font-weight: bold;
            font-size: 13px;
        }

        .c-div-sub {
            margin-top: 5px;
            padding-left: 15px;
            width: 100%;
        }

        .check-all {
            text-decoration: underline;
            color: #797979;
            display: inline;
            font-size: 13px;
            cursor: pointer;
        }

        .c-icon {
            font-size: 33px;
            line-height: 40px;
            width: 40px;
            height: 40px;
            text-align: center;
        }


        .c-card {
            box-shadow: 0 1px 4px 0 rgb(0 0 0 / 14%);
            border: 0;
            margin-bottom: 30px;
            margin-top: 30px;
            border-radius: 6px;
            color: #333333;
            background: #fff;
            width: 100%;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
        }

        .c-card-header {
            text-align: right;
            margin: 0px 15px 0;
            padding: 0;
            position: relative;
            z-index: 3 !important;
            color: #fff;
            border-bottom: none;
            background: transparent;
            border-radius: calc(0.25rem - 1px) calc(0.25rem - 1px) 0 0;
            padding-bottom: 15px;
        }

        .c-card-icon {
            border-radius: 3px;
            background-color: #999999;
            padding: 15px;
            margin-top: -20px;
            margin-right: 15px;
            float: left;
        }

        .c-tabela {
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
            background: linear-gradient(90deg, rgba(101, 55, 14, 1) 0%, rgba(58, 11, 12, 1) 70%);
        }


        .c-table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }

        .c-card-body {
            border-top: 1px solid #d6d5d5;
            padding: 0.9375rem 20px;
            border-radius: 0;
            display: flex;
            background-color: transparent;
        }

        .button-area {
            margin-top: 20px;
        }

        .search {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
            margin: 0;
        }

        .form-control-custom {
            border-radius: 5px;
            border: 1px solid #80808061;
            padding: 5px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            margin-right: -4px;
            height: 32px;
            width: 165px;
            color: black;
        }

        .form-control-custom:focus {
            outline: unset;
            border: 2px solid #6c757d;
        }

        .search-field {
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 0 0 / 40%);
            display: inline-flex;
            border-radius: 5px;
        }

        .mr-15 {
            margin-right: 15px;
        }

        .check {
            min-width: 20px;
            min-height: 20px;
        }

        .swal2-container.swal2-top.swal2-backdrop-show {
            opacity: 0.6;
            overflow-y: auto;
            margin-top: 112px;
            width: 380px;
            height: 100px;
        }

        .swal2-popup.swal2-toast.swal2-icon-success.swal2-show {
            width: 100%;
            height: 100%;
            display: flex;
            background-color: lightgrey;
        }

        .swal2-success-circular-line-left,
        .swal2-success-fix,
        .swal2-success-circular-line-right {
            display: none;
        }

        span.swal2-success-line-tip,
        span.swal2-success-line-long {
            z-index: 3 !important;
        }

        .swal2-success-ring {
            background-color: #507525;
            z-index: 2;
        }

        h2#swal2-title {
            display: flex;
            color: black;
            font-size: 18px;
        }

        .see-pass {
            width: 10%;
            margin-left: -4px;
            margin-top: -2px;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }

        .passwd {
            width: 50%;
            display: inline;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }

        .pagination-links a {
            color: #6c757d;
            text-decoration: none;
            padding: 5px;
            font-size: 20px;
            margin: 2px;
        }

        .pagination-links strong {
            padding-bottom: 2px !important;
            padding: 6px;
            font-size: 20px;
            border-bottom: 2px solid grey;
        }

        tbody tr td {
            padding: 8px;
            vertical-align: middle;
            border: 0px solid #ddd !important;
            border-top: 1px solid #ddd !important;
        }

        .pop {
            cursor: -webkit-zoom-in;
        }

        .dataTables_length {
            float: left;
            margin-top: 20px;
        }

        .dataTables_filter {
            position: relative;
        }

        .dataTables_filter input {
            width: 250px;
            height: 32px;
            background: #fcfcfc;
            border: 1px solid #aaa;
            border-radius: 5px;
            box-shadow: 0 0 3px #ccc, 0 10px 15px #ebebeb inset;
            text-indent: 10px;
        }

        .dataTables_filter .fa-search {
            position: absolute;
            top: 10px;
            left: auto;
            right: 10px;
        }

        #clientesOld-list tbody a {
            color: #1b9045;
            font-size: 22px !important;
            margin-left: 1rem;
            margin-right: 1rem;
        }
    </style>

    <section id="main-content">
        <section class="wrapper">
            <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
                <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                    <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('d2fb359e7478da4e7ec01ef527bdeb53') ?>">Clientes</a></li>
                </ol>
            </nav>
            <div class="c-card">
                <div class="c-card-header">
                    <div class="row px-3">
                        <div class="col-md-6 text-left">
                            <h2 class="text-secondary"><b>Listagem de Clientes</b></h2>
                        </div>
                        <div class="col-md-6">
                            <div class="button-area">
                                <a href="<?php echo base_url('clienteNewTie') ?>"><button type="button" class="btn btn-secondary" style="margin-right: 15px" title="Adicionar Item"><em class="fa fa-plus"></em></button></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <input type="hidden" value="0" id="hiddenTab">
                    <ul class="nav nav-tabs">
                        <li class="tab-li active" id="li_clientes" data-target="clientes" data-fonte="li_clientes"><a onclick="changeTab(0)">Clientes</a></li>
                        <li class="tab-li" id="li_antigo" data-target="antigo" data-fonte="li_antigo"><a onclick="changeTab(1)">Clientes Antigo</a></li>
                    </ul>

                    <div id="clientes">
                        <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                            <div class="col-md-12">
                                <div class="c-card-body">
                                    <div style="width: 100%">
                                        <table class="table c-table w-100" id="clientes-list">
                                            <thead>
                                                <tr>
                                                    <th class="text-secondary">Cadastro</th>
                                                    <th class="text-secondary">Nome</th>
                                                    <th class="text-secondary">CPF</th>
                                                    <th class="text-secondary">Cidade</th>
                                                    <th class="text-secondary">E-mail</th>
                                                    <th class="text-secondary">Telefone</th>
                                                    <th class="text-secondary">Situação</th>
                                                    <th class="text-center text-secondary" style="width:10%">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($clientes as $c) { ?>
                                                    <tr class="tr-check">
                                                        <td><?php echo date("d/m/Y", strtotime($c['data'])); ?></td>
                                                        <td><?php echo ucfirst($c['nome']); ?></td>
                                                        <td class="cpf"><?php echo $c['cpf']; ?></td>
                                                        <td>
                                                            <?php if ($c['cidade'] != "/") { ?>
                                                                <?php echo ucfirst($c['cidade']); ?>
                                                            <?php } else { ?>
                                                                Não Cadastrado
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($c['email'] != null) { ?>
                                                                <?php echo mb_strtolower($c['email']) ?>
                                                            <?php } else { ?>
                                                                Não Cadastrado
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($c['telefone'] != null) { ?>
                                                                <span class="telefone"><?php echo $c['telefone'] ?></span>
                                                            <?php } else { ?>
                                                                Não Cadastrado
                                                            <?php } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($c['situacao'] == 1) { ?>
                                                                Ativo
                                                            <?php } else { ?>
                                                                Bloqueado
                                                            <?php } ?>
                                                        </td>
                                                        <td style="color: #1b9045; font-size: 22px!important" class="text-center">
                                                            <a style="color: #1b9045;" href="<?php echo base_url('seeClienteTie/' . $c['id']) ?>"><i class="fa fa-eye text-secondary" aria-hidden="true"></i></a>
                                                            <a style="color: #1b9045;" href="<?php echo base_url('editClienteTie/' . $c['id']) ?>"><i class="fa fa-pencil text-secondary" aria-hidden="true"></i></a>
                                                            <?php if ($c['situacao'] == 1) { ?>
                                                                <a style="color: #1b9045;" href="#" onclick="bloquear('<?php echo $c['id']; ?>')"><i class="fa fa-ban  text-secondary" data-toggle="modal" data-target="#bloquearModal" aria-hidden="true"></i></a>
                                                            <?php } else { ?>
                                                                <a style="color: #1b9045;" href="#" onclick="desbloquear('<?php echo $c['id']; ?>')"><i class="fa fa-check-circle-o  text-secondary" data-toggle="modal" data-target="#desbloquearModal" aria-hidden="true"></i></a>
                                                            <?php } ?>

                                                            <a style="color: #1b9045;" href="#" onclick="trashCliente('<?php echo $c['id']; ?>')"><i class="fa fa-trash text-secondary" data-toggle="modal" data-target="#excluirModal" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="antigo" style="display:none">
                        <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                            <div class="col-md-12">
                                <div class="c-card-body">
                                    <div style="width: 100%">
                                        <table class="table c-table w-100" id="clientesOld-list">
                                            <thead>
                                                <tr>
                                                    <th class="text-secondary">Nome</th>
                                                    <th class="text-secondary">CPF</th>
                                                    <th class="text-secondary">Cidade</th>
                                                    <th class="text-secondary">E-mail</th>
                                                    <th class="text-secondary">Telefone</th>
                                                    <th class="text-secondary">Situação</th>
                                                    <th class="text-center text-secondary" style="width:10%">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    <div class="modal" tabindex="-1" role="dialog" id="excluirModal">
        <div class="modal-dialog" role="document" style="margin: 30px auto 0 auto;">
            <div class="modal-content">
                <div class="bg-dark" style="padding: 15px;">
                    <h4 class="modal-title" style="color: white; display: inline;"><b>Aviso</b></h4>
                    <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 17px;">Deseja Excluir o cliente?
                    <p>
                </div>
                <div class="modal-footer">
                    <div id="hidden">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="senha()">Excluir</button>
                    </div>
                    <div class="row row-c" id="formsenha" style="display: none">
                        <div class="col-md-12 text-center">
                            <form action="<?php echo base_url('trashClienteTie'); ?>" method="post">

                                <input type="hidden" name="id_cliente3" id="id_cliente3">

                                <label style="font-size: 16px">Confirme a senha</label><br>
                                <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                <br><br>
                                <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="bloquearModal">
        <div class="modal-dialog" role="document" style="margin: 30px auto 0 auto;">
            <div class="modal-content">
                <div class="bg-dark" style="padding: 15px;">
                    <h4 class="modal-title" style="color: white; display: inline;"><b>Aviso</b></h4>
                    <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 17px;">Deseja Excluir o cliente?
                    <p>
                </div>
                <div class="modal-footer">
                    <div id="hidden">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" onclick="senha3()">Excluir</button>
                    </div>
                    <div class="row row-c" id="formsenha3" style="display: none">
                        <div class="col-md-12 text-center">
                            <form action="<?php echo base_url('0f4b06e032b8ccfed4a548b426e71aaf') ?>" method="post">

                                <input type="hidden" name="id_cliente" id="id_cliente">

                                <label style="font-size: 16px">Confirme a senha</label><br>
                                <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                <br><br>
                                <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="desbloquearModal">
        <div class="modal-dialog" role="document" style="margin: 30px auto 0 auto;">
            <div class="modal-content">
                <div class="bg-dark" style="padding: 15px;">
                    <h4 class="modal-title" style="color: white; display: inline;"><b>Aviso</b></h4>
                    <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-size: 17px;"><b>Deseja Desbloquear o cliente?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="senha2()">Desbloquear</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <div class="row row-c" id="formsenha2" style="display: none">
                        <div class="col-md-12 text-center">
                            <form action="<?php echo base_url('4318d7cd597c024f9c4cf0fa90add474') ?>" method="post">

                                <input type="hidden" name="id_cliente2" id="id_cliente2">

                                <label style="font-size: 16px">Confirme a senha</label><br>
                                <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                                <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                                <br><br>
                                <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--<div class="modal" tabindex="-1" role="dialog" id="ClienteModal">
  <div class="modal-dialog" role="document" style="margin: 30px auto 0 auto;">
    <div class="modal-content">
      <div class="bg-dark" style="padding: 15px;">
        <h4 class="modal-title" style="color: white; display: inline;"><b>Cliente - Cadastro Antigo</b></h4>
        <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="row" style="margin:auto">
                <label>Nome</label>
                <input class="col-md-12" type="text" name="NomeCompleto" id="NomeCompleto" readonly>
                <label>CPF</label>
                <input class="col-md-4" type="text" name="CPF" id="CPF" readonly>
                <label>RG</label>
                <input class="col-md-4" type="text" name="RG" id="RG" readonly>
                <label>E-mail</label>
                <input class="col-md-4" type="text" name="Email" id="Email" readonly>
                <label>Telefone</label>
                <input class="col-md-4" type="text" name="Telefone1" id="Telefone1" readonly>
                <label>Telefone</label>
                <input class="col-md-4" type="text" name="Telefone2" id="Telefone2" readonly>
                <label>Celular</label>
                <input class="col-md-4" type="text" name="Celular" id="Celular" readonly>
                <label>Endereço</label>
                <input class="col-md-12" type="text" name="Endereco" id="Endereco" readonly>
                <label>Bairro</label>
                <input class="col-md-3" type="text" name="Bairro" id="Bairro" readonly>
                <label>Cidade</label>
                <input class="col-md-3" type="text" name="Cidade" id="Cidade" readonly>
                <label>Estado</label>
                <input class="col-md-3" type="text" name="Estado" id="Estado" readonly>
                <label>CEP</label>
                <input class="col-md-3" type="text" name="CEP" id="CEP" readonly>
                <input type="hidden" name="CodCliente" id="CodCliente">
           </div>
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-info" id="clientOld" onclick="actionModal()"></button>
      </div>
    </div>
  </div>
</div>-->

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var dtLanguageJSON = {
                "emptyTable": "Nenhum registro encontrado",
                "info": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 até 0 de 0 registros",
                "infoFiltered": "(Filtrados de _MAX_ registros)",
                "infoThousands": ".",
                "loadingRecords": "Carregando...",
                "processing": "Processando...",
                "zeroRecords": "Nenhum registro encontrado",
                "search": "",
                "paginate": {
                    "next": "Próximo",
                    "previous": "Anterior",
                    "first": "Primeiro",
                    "last": "Último"
                },
                "aria": {
                    "sortAscending": ": Ordenar colunas de forma ascendente",
                    "sortDescending": ": Ordenar colunas de forma descendente"
                },
                "select": {
                    "rows": {
                        "_": "Selecionado %d linhas",
                        "1": "Selecionado 1 linha"
                    },
                    "cells": {
                        "1": "1 célula selecionada",
                        "_": "%d células selecionadas"
                    },
                    "columns": {
                        "1": "1 coluna selecionada",
                        "_": "%d colunas selecionadas"
                    }
                },
                "buttons": {
                    "copySuccess": {
                        "1": "Uma linha copiada com sucesso",
                        "_": "%d linhas copiadas com sucesso"
                    },
                    "collection": "Coleção  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
                    "colvis": "Visibilidade da Coluna",
                    "colvisRestore": "Restaurar Visibilidade",
                    "copy": "Copiar",
                    "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a área de transferência do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
                    "copyTitle": "Copiar para a Área de Transferência",
                    "csv": "CSV",
                    "excel": "Excel",
                    "pageLength": {
                        "-1": "Mostrar todos os registros",
                        "_": "Mostrar %d registros"
                    },
                    "pdf": "PDF",
                    "print": "Imprimir",
                    "createState": "Criar estado",
                    "removeAllStates": "Remover todos os estados",
                    "removeState": "Remover",
                    "renameState": "Renomear",
                    "savedStates": "Estados salvos",
                    "stateRestore": "Estado %d",
                    "updateState": "Atualizar"
                },
                "autoFill": {
                    "cancel": "Cancelar",
                    "fill": "Preencher todas as células com",
                    "fillHorizontal": "Preencher células horizontalmente",
                    "fillVertical": "Preencher células verticalmente"
                },
                "lengthMenu": "Exibir _MENU_ resultados por página",
                "searchBuilder": {
                    "add": "Adicionar Condição",
                    "button": {
                        "0": "Construtor de Pesquisa",
                        "_": "Construtor de Pesquisa (%d)"
                    },
                    "clearAll": "Limpar Tudo",
                    "condition": "Condição",
                    "conditions": {
                        "date": {
                            "after": "Depois",
                            "before": "Antes",
                            "between": "Entre",
                            "empty": "Vazio",
                            "equals": "Igual",
                            "not": "Não",
                            "notBetween": "Não Entre",
                            "notEmpty": "Não Vazio"
                        },
                        "number": {
                            "between": "Entre",
                            "empty": "Vazio",
                            "equals": "Igual",
                            "gt": "Maior Que",
                            "gte": "Maior ou Igual a",
                            "lt": "Menor Que",
                            "lte": "Menor ou Igual a",
                            "not": "Não",
                            "notBetween": "Não Entre",
                            "notEmpty": "Não Vazio"
                        },
                        "string": {
                            "contains": "Contém",
                            "empty": "Vazio",
                            "endsWith": "Termina Com",
                            "equals": "Igual",
                            "not": "Não",
                            "notEmpty": "Não Vazio",
                            "startsWith": "Começa Com",
                            "notContains": "Não contém",
                            "notStarts": "Não começa com",
                            "notEnds": "Não termina com"
                        },
                        "array": {
                            "contains": "Contém",
                            "empty": "Vazio",
                            "equals": "Igual à",
                            "not": "Não",
                            "notEmpty": "Não vazio",
                            "without": "Não possui"
                        }
                    },
                    "data": "Data",
                    "deleteTitle": "Excluir regra de filtragem",
                    "logicAnd": "E",
                    "logicOr": "Ou",
                    "title": {
                        "0": "Construtor de Pesquisa",
                        "_": "Construtor de Pesquisa (%d)"
                    },
                    "value": "Valor",
                    "leftTitle": "Critérios Externos",
                    "rightTitle": "Critérios Internos"
                },
                "searchPanes": {
                    "clearMessage": "Limpar Tudo",
                    "collapse": {
                        "0": "Painéis de Pesquisa",
                        "_": "Painéis de Pesquisa (%d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "Nenhum Painel de Pesquisa",
                    "loadMessage": "Carregando Painéis de Pesquisa...",
                    "title": "Filtros Ativos",
                    "showMessage": "Mostrar todos",
                    "collapseMessage": "Fechar todos"
                },
                "thousands": ".",
                "datetime": {
                    "previous": "Anterior",
                    "next": "Próximo",
                    "hours": "Hora",
                    "minutes": "Minuto",
                    "seconds": "Segundo",
                    "amPm": [
                        "am",
                        "pm"
                    ],
                    "unknown": "-",
                    "months": {
                        "0": "Janeiro",
                        "1": "Fevereiro",
                        "10": "Novembro",
                        "11": "Dezembro",
                        "2": "Março",
                        "3": "Abril",
                        "4": "Maio",
                        "5": "Junho",
                        "6": "Julho",
                        "7": "Agosto",
                        "8": "Setembro",
                        "9": "Outubro"
                    },
                    "weekdays": [
                        "Domingo",
                        "Segunda-feira",
                        "Terça-feira",
                        "Quarta-feira",
                        "Quinte-feira",
                        "Sexta-feira",
                        "Sábado"
                    ]
                },
                "editor": {
                    "close": "Fechar",
                    "create": {
                        "button": "Novo",
                        "submit": "Criar",
                        "title": "Criar novo registro"
                    },
                    "edit": {
                        "button": "Editar",
                        "submit": "Atualizar",
                        "title": "Editar registro"
                    },
                    "error": {
                        "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informações<\/a>)."
                    },
                    "multi": {
                        "noMulti": "Essa entrada pode ser editada individualmente, mas não como parte do grupo",
                        "restore": "Desfazer alterações",
                        "title": "Multiplos valores",
                        "info": "Os itens selecionados contêm valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contrário, eles manterão seus valores individuais."
                    },
                    "remove": {
                        "button": "Remover",
                        "confirm": {
                            "_": "Tem certeza que quer deletar %d linhas?",
                            "1": "Tem certeza que quer deletar 1 linha?"
                        },
                        "submit": "Remover",
                        "title": "Remover registro"
                    }
                },
                "decimal": ",",
                "stateRestore": {
                    "creationModal": {
                        "button": "Criar",
                        "columns": {
                            "search": "Busca de colunas",
                            "visible": "Visibilidade da coluna"
                        },
                        "name": "Nome:",
                        "order": "Ordernar",
                        "paging": "Paginação",
                        "scroller": "Posição da barra de rolagem",
                        "search": "Busca",
                        "searchBuilder": "Mecanismo de busca",
                        "select": "Selecionar",
                        "title": "Criar novo estado",
                        "toggleLabel": "Inclui:"
                    },
                    "duplicateError": "Já existe um estado com esse nome",
                    "emptyError": "Não pode ser vazio",
                    "emptyStates": "Nenhum estado salvo",
                    "removeConfirm": "Confirma remover %s?",
                    "removeError": "Falha ao remover estado",
                    "removeJoiner": "e",
                    "removeSubmit": "Remover",
                    "removeTitle": "Remover estado",
                    "renameButton": "Renomear",
                    "renameLabel": "Novo nome para %s:",
                    "renameTitle": "Renomear estado"
                }
            };

            $('#clientes-list').DataTable({
                paging: true,
                info: true,
                searching: true,
                dom: '<"top"f>rt<"bottom d-flex justify-content-between align-items-center"lip><"clear">',
                language: dtLanguageJSON,
            });

            $('#clientesOld-list').DataTable({
                paging: true,
                info: true,
                searching: true,
                processing: true,
                serverSide: true,
                order: [],
                dom: '<"top" f>rt<"bottom d-flex justify-content-between align-items-center"lip><"clear">',
                ajax: {
                    url: "<?php echo site_url('exibeClientesOld') ?>",
                    type: "POST"
                },
                columnDefs: [{
                    "targets": [0],
                    "orderable": true,
                }, ],
                language: dtLanguageJSON,
            });

            $('[type=search]').each(function() {
                $(this).attr("placeholder", "Pesquisar...");
                $(this).before('<span class="fa fa-search"></span>');
            });

            var SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('.telefone').mask(SPMaskBehavior, spOptions);
            $('.cpf').mask('000.000.000-00', {
                reverse: true
            });

            <?php if (isset($alert)) { ?>
                <?php if ($alert == 1) { ?>
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'success',
                        title: 'Cliente bloqueado com sucesso!'
                    })
                <?php } else if ($alert == 2) { ?>
                    const Toast2 = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast2.fire({
                        icon: 'error',
                        title: 'Não foi possível bloquear o cliente, pois a senha está incorreta. Resta Apenas ' + <?php if ($this->session->userdata('user_block') == 2) {
                                                                                                                        echo ' 1 ';
                                                                                                                    } else {
                                                                                                                        echo ' 2 ';
                                                                                                                    } ?> + ' tentativa(s)!'
                    })
                <?php } else if ($alert == 3) { ?>
                    const Toast3 = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast3.fire({
                        icon: 'success',
                        title: 'Cliente desbloqueado com sucesso!'
                    })
                <?php } else if ($alert == 4) { ?>
                    const Toast4 = Swal.mixin({
                        toast: true,
                        position: 'top',
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast4.fire({
                        icon: 'error',
                        title: 'Não foi possível desbloquear o cliente, pois a senha está incorreta. Resta Apenas ' + <?php if ($this->session->userdata('user_block') == 2) {
                                                                                                                            echo ' 1 ';
                                                                                                                        } else {
                                                                                                                            echo ' 2 ';
                                                                                                                        } ?> + ' tentativa(s)!'
                    })
                <?php }  ?>
            <?php } ?>
        });
    </script>
    <script>
        function senha2() {
            $('#formsenha2').show();
        }
        function senha3() {
            $('#formsenha3').show();
        }

        $('#senha_btn2').on('click', function() {
            const type = $('#senha2').prop('type') === 'password' ? 'text' : 'password';
            $('#senha2').prop('type', type);
            if (type == "text") {
                $('#senha_btn2').children().removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                $('#senha_btn2').children().removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });

        function bloquear(id) {
            $('#id_cliente').val(id);
        }

        function desbloquear(id) {
            $('#id_cliente2').val(id);
        }

        function trashCliente(id) {
            $('#id_cliente3').val(id);
        }

        function senha() {
            $('#formsenha').show();

        }

        

        $('#senha_btn').on('click', function() {
            const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
            $('#senha').prop('type', type);
            if (type == "text") {
                $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
            }
        });
    </script>
    <script>
        function buscaFiltro() {
            var form = document.createElement("form");
            form.method = "POST";
            form.action = "<?php echo base_url('d2fb359e7478da4e7ec01ef527bdxxxx'); ?>";

            var element1 = document.createElement("input");
            element1.value = $("#search").val();
            element1.name = "filtro";
            form.appendChild(element1);

            document.body.appendChild(form);

            form.submit();
        }
    </script>
    <script>
        function changeTab(id) {
            if (id == 0) {
                $("#clientes").show();
                $("#antigo").hide();
                $('#li_clientes').addClass('active');
                $("#li_antigo").removeClass("active");
                $("#hiddenTab").val(id);
            } else if (id == 1) {
                $("#clientes").hide();
                $("#antigo").show();
                $('#li_clientes').removeClass("active");
                $("#li_antigo").addClass('active');
                $("#hiddenTab").val(id);
            }
        }

        function showValCli(id) {
            dados = new FormData();
            dados.append('qtdade', id);
            dados.append('cliente', $("#hiddenTab").val());

            $.ajax({
                url: '<?php echo base_url('exibeCliente'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                //dataType: 'json',
                beforeSend: function() {
                    $("#clientes").empty();
                    $("#antigo").empty();
                    $("#clientes").html('<img style="width:200px; margin-left:40%;" src="https://i.pinimg.com/originals/b7/b7/ac/b7b7ac981329127222e632d1244ce62e.gif" alt="Loading">');
                    $("#antigo").html('<img style="width:200px; margin-left:40%;" src="https://i.pinimg.com/originals/b7/b7/ac/b7b7ac981329127222e632d1244ce62e.gif" alt="Loading">');
                },
                error: function(xhr, status, error) {

                },
                success: function(data) {
                    console.log(data);
                    if ($("#hiddenTab").val() == 0) {
                        $("#clientes").empty();
                        $("#clientes").html(data);
                    } else if ($("#hiddenTab").val() == 1) {
                        $("#antigo").empty();
                        $("#antigo").html(data);
                    }
                },
            });
        }
    </script>
    <script>
        function showClient(id) {
            var form = document.createElement("form");
            form.method = "POST";
            form.action = "<?php echo base_url('updateClientesOld'); ?>";

            var element1 = document.createElement("input");
            element1.value = id;
            element1.name = "CodCliente";
            form.appendChild(element1);

            var element2 = document.createElement("input");
            element2.value = 'see';
            element2.name = "action";
            form.appendChild(element2);

            document.body.appendChild(form);

            form.submit();
        }

        function editClient(id) {
            var form = document.createElement("form");
            form.method = "POST";
            form.action = "<?php echo base_url('updateClientesOld'); ?>";

            var element1 = document.createElement("input");
            element1.value = id;
            element1.name = "CodCliente";
            form.appendChild(element1);

            var element2 = document.createElement("input");
            element2.value = 'edit';
            element2.name = "action";
            form.appendChild(element2);

            document.body.appendChild(form);

            form.submit();
        }
    </script>
    <script>
        function bloquear2(id) {
            var form = document.createElement("form");
            form.method = "POST";
            form.action = "<?php echo base_url('blockClienteTie'); ?>";

            var element1 = document.createElement("input");
            element1.value = id;
            element1.name = "CodCliente";
            form.appendChild(element1);

            document.body.appendChild(form);

            form.submit();
        }
        // function trashCliente(id){
        //     // var form = document.createElement("form");
        //     // form.method = "POST";
        //     // form.action = "<?php echo base_url('trashClienteTie'); ?>";

        //     // var element1    = document.createElement("input");
        //     // element1.value  = id;
        //     // element1.name   = "CodCliente";
        //     // form.appendChild(element1);  

        //     // document.body.appendChild(form);

        //     // form.submit();
        // }
    </script>