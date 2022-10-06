<?php
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
    $auxfooter = 0;
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
        $sm = 1;
    } else {
        $sm = 0;
    }
?>

<style>
    path[fill='#123456']{display:none !important;}
    .c-card{
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
    .c-card-header{
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
    .c-card-icon{
        border-radius: 3px;
        background-color: #999999;
        padding: 15px;
        margin-top: -20px;
        margin-right: 15px;
        float: left;
    }
    .c-aprovados{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(76 175 80 / 40%);
        background: linear-gradient(60deg, #66bb6a, #43a047);
    }
    .c-negadas{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(244 67 54 / 40%);
        background: linear-gradient(60deg, #ef5350, #e53935);
    }
    .c-titulos{
        box-shadow: 0 4px 20px 0 rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 188 212 / 40%);
            background: linear-gradient(60deg, #26c6da, #00acc1);
    }
    .c-tabela{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
        background: linear-gradient(60deg, #ab47bc, #8e24aa);
    }
    .c-icon{
        font-size: 33px;
        line-height: 40px;
        width: 40px;
        height: 40px;
        text-align: center;
    }
    .c-card-category{
        color: black;
        font-size: 14px;
        margin: 0;
        padding-top: 10px;
        font-weight: bold;
    }
    .c-card-title{
        margin: 0;
        color: #3C4858;
        font-size: 1.5625rem;
        line-height: 1.4em;
    }
    .c-card-title small{
        font-size: 80%;
        font-weight: 400;
    }
    .c-card-footer{
        border-top: 1px solid #d6d5d5;
        margin-top: 20px;
        padding: 0;
        padding-top: 10px;
        margin: 0 15px 10px;
        border-radius: 0;
        justify-content: flex-end;
        align-items: center;
        display: flex;
        background-color: transparent;
    }
    .c-card-body{
        border-top: 1px solid #d6d5d5;
        padding: 0.9375rem 20px;
        border-radius: 0;
        display: flex;
        background-color: transparent;
    }
    .c-stats{
        color: #999999;
        font-size: 12px;
        line-height: 22px;
        display: inline-flex;
    }
    .c-stats-icon{
        position: relative;
        top: 4px;
        font-size: 16px;
        margin-right: 3px;
        margin-left: 3px;
        color: grey;
    }
    .c-stats-text{
        color: grey;
    }
    .c-table{
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        border-collapse: collapse;
    }
    .c-table thead{
        color:  #1b9045!important;
    }
    .c-table thead tr th{
        padding: 8px;
        vertical-align: middle;
    }
    .c-table tbody tr td {
        padding: 8px;
        vertical-align: middle;
        border-top: 1px solid #ddd;
    }
    .c-table tbody tr:hover{
        cursor: pointer;
        background-color: #eee!important;
    }
    .check-all{
        width: 32px;
        font-size: 12px;
        color: white;
        background-color: #1b9045;
        border: 0;
        padding: 6px 10px;
        text-align: center;
        border-radius: 5px;
    }
    .button-area{
        margin-top: 20px;
    }
    .button-custom{
        color: white;
        background-color: #9c27b0;
        border: 0;
        font-size: 14px;
        padding: 6px 10px;
        text-align: center;
        border-radius: 5px;
    }
    .search{
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-control-custom{
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
        border: 2px solid #43006d;
        color: #43006d;
    }
    .search-field{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 0 0 / 20%);
        display: inline-flex;
        border-radius: 5px;
        width: 100%;
    }
    .def-item{
        display: block;
        padding: 7px 10px;
        color: black;
        font-size: 14px;
    }
    .def-item:hover{
        background-color: #eee;
        color: #9c27b0;
    }
    
    .select2{
        width: 100%!important;
    }
    
    .pagination-links a{
        color: #1b9045;
        text-decoration: none;
        padding: 5px;
        font-size: 20px;
        margin: 2px;
    }
    
    .pagination-links strong{
        padding-bottom: 2px!important;
        padding: 6px;
        font-size: 20px;
        border-bottom: 2px solid #1b9045;
    } 
    .check{
        min-width: 20px;
        min-height: 20px;
    }
    
    .swal2-container.swal2-top.swal2-backdrop-show{
        opacity: 0.6;
        overflow-y: auto;
        margin-top: 112px;
        width: 380px;
        height: 100px;
    }
    
    .swal2-popup.swal2-toast.swal2-icon-success.swal2-show{
        width: 100%;
        height: 100%;
        display: flex;
        background-color: lightgrey;
    }
    
    .swal2-success-circular-line-left, .swal2-success-fix, .swal2-success-circular-line-right{
        display: none;
    }
    
    span.swal2-success-line-tip, span.swal2-success-line-long{
        z-index: 3!important;
    }
    
    .swal2-success-ring{
        background-color: #507525;
        z-index: 2;
    }
    h2#swal2-title{
        display: flex;
        color: black;
        font-size: 18px;
    }
    .c-card-header{
        color: black
    }

    .action .fa {
        font-size: 1.5rem;
        margin-left: 1rem;
    }

    .chatbox.active {
        right: 0;
    }
    .chatbox {
        width: 380px;
        height: 100vh;
        position: fixed;
        right: -500px;
        top: 0;
        z-index: 1002;
        background: #fff;
        box-shadow: 0px 0px 30px 0px rgb(82 63 105 / 15%);
        -webkit-transition: all 0.8s;
        -ms-transition: all 0.8s;
        transition: all 0.8s;
    }

    .chatbox.active .chatbox-close {
        width: 100vw;
    }

    .chatbox .chatbox-close {
        position: absolute;
        -webkit-transition: all 0.2s;
        -ms-transition: all 0.2s;
        transition: all 0.2s;
        width: 0;
        height: 100%;
        right: 380px;
        background: #000;
        z-index: 1;
        opacity: 0.1;
        cursor: pointer;
    }

    .chatbox .card {
        box-shadow: none;
    }
    #filtersList {
        overflow-y: scroll;
    }

    .chatbox .card-body {
        padding: 1rem;
    }
    tbody tr td {
        padding: 8px;
        vertical-align: middle;
        border-top: 1px solid #ddd;
    }
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
                <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                    <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('reservas/listagem') ?>">Reservas</a></li>
                </ol>
            </nav>
            <div class="c-card">
              
                <div class="c-card-header">
                    <div class="col-md-12 my-4 mx-0 row">
                        <div class="col-md-6 p-0">
                            <h2 class="text-secondary">
                                <strong>Listagem de Reservas</strong>
                            </h2>
                        </div>
                        <div class="col-md-6 text-end p-0">
                            <a type="button" href="<?php echo base_url('reservas') ?>" class="btn btn-secondary" style="margin-right: 15px" title="Adicionar Item"><i class="fa fa-plus"></i></a>
                            <button type="button" class="btn btn-rounded btn-secondary filter-btn"><i class="fa fa-search me-2" aria-hidden="true"></i>Filtros</button>
                        </div>
                    </div>
                </div>
                <div class="c-card-body" style="display: block">
                    <div style="width: 100%">
                        <table id="reserva-list" class="table table-hover table-borderless" data-page-length='10' data-order='[[0, "desc"]]'>
                            <thead>
                                <tr>
                                    <th style='width: 5%'>ID</th>
                                    <th style='width: 10%'>Reserva</th>
                                    <th style='width: 10%'>Status</th>
                                    <th style='width: 15%'>Periodo Locacao</th>
                                    <th style='width: 25%'>Cliente</th>
                                    <th style='width: 10%'>Telefone</th>
                                    <th style='width: 10%'>CPF</th>
                                    <th style='width: 10%'>Opções</th>
                                </tr>
                            </thead>
                            <tbody></tbody>  
                        </table>
                    </div> 
                </div>
            </div>
    </section>
</section>

<div class="chatbox">
    <div class="chatbox-close"></div>
    <div class="col-xl-12 ">
        <div class="card" style="height: 100vh;">
            <div class="mt-4 center text-center ">
                <h4 class="card-title">Filtros</h4>
            </div> 
            <div class="card-body filtersList2">
                <div id="smartwizard" class="form-wizard order-create" >
                    <div class="row" >
                        <div class="col-lg-12 mb-2">
                            <form id="filter-form">
                                <div class="row">
                                    <div class="col-md-12 form-group my-2">
                                        <label class="text-label" for="data-incial">Data Inicial:</label>
                                        <input type="date" class="form-control" name="data-incial" id="data-incial">
                                    </div>
                                    <div class="col-md-12 form-group my-2">
                                        <label class="text-label" for="data-final">Data Final:</label>
                                        <input type="date" class="form-control" name="data-final" id="data-final">
                                    </div>
                                    <div class="col-lg-12 mt-4 text-center">
                                        <a href="<?= base_url('admin/reservas/listagem') ?>" class="btn btn-secondary">Resetar</a>
                                        <button type="submit" id="SubmitButton" class="btn btn-primary w-50">Filtrar</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" role="dialog" id="modalExcluir">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:#6c757d ">
                <h5 class="modal-title" style="color: white; display: inline;">Excluir Reserva</h5>
                <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p style="font-size: 16px;"><b>Deseja excluir a Reserva?</b></p>
            </div>
            <div class="modal-footer">
                <div class="col-md-12" id="row_senha">
                    <button type="button" class="btn btn-danger" id="btn_cancela_senha" name="btn_cancela_senha" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_sim_senha" name="btn_sim_senha" onclick="senha()">Sim</button>
                </div>
                <div class="col-md-12" id="formsenha" style="display: none">
                    <form action="<?php echo base_url('admin/Reservas/excluirReserva') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" id="id_excluir" class="form-control" name="id_excluir">
                            </div>
                            <div class="col-md-6">
                                <label style="font-size: 16px">Confirme a senha</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control passwd" type="password" name="senha" id="senha" placeholder="Digite a Senha" required>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary see-pass" id="senha_btn"><em class="fa fa-eye"></em></button>
                            </div>
                        </div>
                        <input type="hidden" id="idreserva" name="idreserva">
                        <div class="col-md-12" id="row_senha">
                    <button type="button" class="btn btn-danger" id="btn_cancela_senha" name="btn_cancela_senha" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                </div>
                     
                        
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    function senha() {

        document.getElementById('btn_sim_senha').style.display = "none";
        document.getElementById('btn_cancela_senha').style.display = "none";

        $('#formsenha').show();

        $('#status_enviar').val($('#status_modal').val());
    }
</script>

<script>
    function excluirpedido(id) {

        $("#idreserva").val(id);
        $('#modalExcluir').modal('show');

    }
</script>
<script>

$(document).ready(function($) {

    var u = location.protocol + "//" + window.location.hostname;

    $('.filter-btn').on('click', function() {
        $('.chatbox').addClass('active');
    });

    $('.chatbox-close').on('click', function() {
        $('.chatbox').removeClass('active');
    });

    $('.telefone').mask('(00) 0000-0000');
    $('.cpf').mask('000.000.000-00');

    $('#tipobusca').on("click", function(e) {
        var type = $('#tipobusca').val();
        if(type != null){
            $('#buscacontent').prop("disabled", false);
            $('#buscacontent').attr('name', 'busca-' + type);
            $("#buscacontent").attr('placeholder', 'Informe o ' + type);
            if(type == 'cpf'){
                $('#buscacontent').addClass('cpf').removeClass('telefone');
            } else if (type == 'telefone'){
                $('#buscacontent').removeClass('cpf').addClass('telefone');
            } else if (type == 'nome'){
                $('#buscacontent').removeClass('cpf').removeClass('telefone').unmask();
            }
        }
    });
    
    dataTable = $('#reserva-list').DataTable({
        searching: false,
        processing: true,
        select: false,
        lengthChange: false,
        dom: 'Bfrtip',
        'serverSide': true,
        "processing": true,
        'serverMethod': 'post',
        "ajax": {
            url: u + '/reservas/listagemajax',
            type: "POST",
            dataType: "JSON",
            data: {
                filter_data: function() { return $('#filter-form').serialize(); },
                listagem: false,
            },
            complete: function(data) {
                total = data['responseJSON'];
                // AQUI VOCÊ PODE RETORNAR A QUANTIDADE DE RESULTADOS ENCONTRADOS
                /* if (total.filter) {
                *    $("#result").html('Exibindo ' + total.recordsFiltered + ' pedidos de acordo com seus filtros.');
                * } else {
                *    $("#result").html(total.recordsFiltered + ' Pedidos no total.');
                * }
                */
            },
        },
        paging: true,
        "columns": [
            { data: "id", class: 'text-center'},
            { data: "reserva", class: 'text-center'},
            { data: "status" },
            { data: "periodoLocacao", class: 'text-center'},
            { data: "cliente"},
            { data: "telefone" },
            { data: "cpf" },
            { data: "options", class: 'action text-center' },
        ],
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        "language": {
            "processing": "Atualizando listagem...",
            "lengthMenu": "_MENU_ reservas por página",
            "zeroRecords": "Sem dados para mostrar",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhuma reservas para exibir aqui.",
            "search": "Filtrar",
            "paginate": {
                "next": "Próximo",
                "previous": "Anterior"
            },
            "infoFiltered": "(filtrando de _MAX_ envios, no total.)"
        },
    });

    $('#filter-form').submit(function(e) {
        e.preventDefault();
        dataTable.ajax.reload();
        $(".chatbox").removeClass('active');
    });
});

</script>



