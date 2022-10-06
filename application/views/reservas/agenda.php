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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.0/main.css" integrity="sha256-gcC8p9RfMq6rqz4TkMcZYBHTmnJ3VfWLxKJ0N4RgbLs=" crossorigin="anonymous">

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
                    <div class="row">
                        <div class="col-md-4 text-left">
                            <h2 style="color: #1b9045;"><b>Agenda</b></h2>
                        </div>
                        <div class="col-md-8">
                            <form id="filter-form">
                                <div style="display: flex; justify-content: flex-end; margin-bottom: 1.5rem; margin-top: 2.5rem">
                                    <div class="button-area">
                                        <a type="button" href="<?php echo base_url('reservas') ?>" class="btn btn-primary" style="margin-right: 15px" title="Adicionar Item"><i class="fa fa-plus"></i>  Adicionar Reserva</a>
                                    </div>
                                    <div class="text-center" style="width: 12%; padding-left: 1rem">
                                        <span class="text-label" for="#data-incial">Data Inicial</span>
                                        <div class="search-field form-group">
                                            <input type="date" class="form-control" name="data-incial" id="data-incial">
                                        </div>
                                    </div>
                                    <div class="text-center" style="width: 12%; padding-left: 1rem">
                                        <span class="text-label" for="#data-incial">Data Final</span>
                                        <div class="search-field">
                                            <input type="date" class="form-control" name="data-final" id="data-final">
                                        </div>
                                    </div>
                                    <div class="text-center" style="width: 12%; padding-left: 1rem">
                                        <span class="text-label" for="#data-incial">Definição</span>
                                        <div class="search-field form-group">
                                            <select class="custom-select form-control" id="definicao" name="definicao">
                                                <option selected disabled>Selecione</option>
                                                <option value="disponivel">Disponível</option>
                                                <option value="Reservado">Reservado</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center" style="width: 12%; padding-left: 1rem">
                                        <span class="text-label" for="#data-incial">Tipo da busca</span>
                                        <div class="search-field">
                                            <select class="custom-select form-control" id="tipobusca" name="tipobusca">
                                                <option selected disabled>Selecione</option>
                                                <option value="nome">Nome</option>
                                                <option value="telefone">Telefone</option>
                                                <option value="cpf">CPF</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center" style="width: 20%; padding-left: 1rem">
                                        <span class="text-label" for="#data-incial">Busca</span>
                                        <div class="search-field form-group">
                                            <input type="text" id="buscacontent" placeholder="Informe primeiro o tipo da busca" name="nofilter" class="form-control" style="width: 100%;" disabled value="<?= isset($filtro) ? $filtro : ''?>">
                                            <button style="cursor: pointer" class="btn btn-primary search"><em class="fa fa-search"></em></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="c-card-body" style="display: block">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card border-dark h-100">
                                <div class="card-body text-dark">
                                    <div class="table-responsive" style="width: 100%">
                                        <table id="reserva-list" class="table card-table display dataTablesCard" data-page-length='10' data-order='[[0, "asc"]]'>
                                            <thead>
                                                <tr>
                                                    <th class="text-center" style='width: 5%'>ID</th>
                                                    <th class="text-left"   style='width: 10%'>Reserva</th>
                                                    <th class="text-left"   style='width: 10%'>Status</th>
                                                    <th class="text-center" style='width: 15%'>Periodo Locacao</th>
                                                    <th class="text-center" style='width: 15%'>Cliente</th>
                                                    <th class="text-center" style='width: 10%'>Telefone</th>
                                                    <th class="text-center" style='width: 25%'>Trajes Locados</th>
                                                    <th class="text-center" style='width: 25%'>Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>  
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card-primary">
                                <div class="card-body p-0">
                                    <div id="calendar"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</section>

<script src="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.11.0,npm/fullcalendar-scheduler@5.11.0/main.js,npm/fullcalendar-scheduler@5.11.0/locales-all.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js" integrity="sha256-XCdgoNaBjzkUaEJiauEq+85q/xi/2D4NcB3ZHwAapoM=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.0/main.js" integrity="sha256-CL4IUZnPtJYcQkYMacraepiJOdtjKsn7PP8kGyFX4fE=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.0/locales-all.js" integrity="sha256-Mu1bnaszjpLPWI+/bY7jB6JMtHj5nn9zIAsXMuaNxdk=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function($) {

        var u = location.protocol + "//" + window.location.hostname;

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
                { data: "cliente", class: 'text-center'},
                { data: "telefone" },
                { data: "trajesLocados" },
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
    });
</script>