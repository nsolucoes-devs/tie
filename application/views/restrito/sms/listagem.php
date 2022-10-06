<?php
$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$palmpre = strpos($_SERVER['HTTP_USER_AGENT'], "webOS");
$berry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
$symbian =  strpos($_SERVER['HTTP_USER_AGENT'], "Symbian");
$auxfooter = 0;
if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
    $sm = 1;
} else {
    $sm = 0;
}
?>

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

    .c-table thead {
        color: #1b9045 !important;
    }

    .c-table thead tr th {
        padding: 8px;
        vertical-align: middle;
    }

    .c-table tbody tr td {
        padding: 8px;
        vertical-align: middle;
        border-top: 1px solid #ddd;
    }

    .c-table tbody tr:hover {
        cursor: pointer;
        background-color: #eee !important;
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
        border: 2px solid #43006d;
        color: #43006d;
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
        color: #1b9045;
        text-decoration: none;
        padding: 5px;
        font-size: 20px;
        margin: 2px;
    }

    .pagination-links strong {
        padding-bottom: 2px !important;
        padding: 6px;
        font-size: 20px;
        border-bottom: 2px solid #1b9045;
    }

    .action .fa {
        font-size: 2rem;
        margin-left: 1rem;
    }
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Definições</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('reservas/listagem') ?>">SMS</a></li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h2 class="text-secondary"><b>SMS</b></h2>
                    </div>
                    <form id="filter-form">
                        <div class="col-md-6">
                            <div class="button-area">
                                <button type="button" class="btn btn-secondary" style="margin-right: 15px" title="Adicionar Item" data-toggle="modal" data-target="#modalCreateStatus">Novo SMS <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="c-card-body" style="display: block">
                <div class="table-responsive" style="width: 100%">
                    <table id="status-list" class="table card-table display dataTablesCard" data-page-length='10' data-order='[[1, "asc"]]'>
                        <thead>
                            <tr>
                                <th class="col-md-4">ID</th>
                                <th class="col-md-4">Titulo</th>
                                <th class="col-md-2">Mensagem</th>
                                <th class="col-md-2">Ações</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>

<div class="modal fade" id="modalCreateStatus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCreateStatusLabel">Adicionar Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <form id="CreateStatus">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="message-text" class="col-form-label">Quando Enviar</label>
                            <select class="form-control" name="newstatus_active">
                                <option value="1">Ativo</option>
                                <option value="0">Desativado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-9">
                            <label for="message-text" class="col-form-label">Título</label>
                            <input type="text" min="1" class="form-control" name="newstatus_position">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="message-text" class="col-form-label">Variaveis</label>
                            <input type="text" min="1" class="form-control" name="newstatus_position">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="message-text" class="col-form-label">Mensagem</label>
                            <textarea type="text" min="1" class="form-control" name="newstatus_position"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEditStatus" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditStatusLabel">Editar Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times"></i></span>
                </button>
            </div>
            <form id="EditStatus">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Nome:</label>
                            <input type="text" class="form-control" name="editstatus_name" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="message-text" class="col-form-label">Posição</label>
                            <input type="number" min="1" class="form-control" name="editstatus_position" value="">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="message-text" class="col-form-label">Cor</label>
                            <input type="color" class="form-control" name="editstatus_color" value="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="message-text" class="col-form-label">Ativo</label>
                            <select class="form-control" name="editstatus_active">
                                <option value="1">Ativo</option>
                                <option value="0">Desativado</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function($) {

        var u = location.protocol + "//" + window.location.hostname;

        $('.telefone').mask('(00) 0000-0000');
        $('.cpf').mask('000.000.000-00');

        dataTable = $('#status-list').DataTable({
            searching: false,
            processing: true,
            select: false,
            lengthChange: false,
            dom: 'Bfrtip',
            'serverSide': true,
            "processing": true,
            'serverMethod': 'post',
            "ajax": {
                url: u + '/adminstatus/listagemajax',
                type: "POST",
                dataType: "JSON",
                complete: function(data) {
                    total = data['responseJSON'];
                    // AQUI VOCÊ PODE RETORNAR A QUANTIDADE DE RESULTADOS ENCONTRADOS
                    //  if (total.filter) {
                    //     $("#result").html('Exibindo ' + total.recordsFiltered + ' pedidos de acordo com seus filtros.');
                    //  } else {
                    //     $("#result").html(total.recordsFiltered + ' Pedidos no total.');
                    //  }
                },
            },
            paging: true,
            "columns": [
                {data: "position_status"},
                {data: "name_status"},
                {
                    data: "active_status",
                    class: "text-center"
                },
                {
                    data: "options",
                    class: "action text-center"
                },
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
        });

        // ENVIO DE DADOS PARA CRIAÇÃO DE STATUS 
        $("#CreateStatus").submit(function(e) {
            e.preventDefault();
            var form = $(this);

            $.ajax({
                type: "POST",
                url: u + '/adminstatus/addstatus',
                data: form.serialize(),
                dataType: 'json',
                success: function(feedback) {
                    console.log(feedback);
                    Swal.fire({
                        title: feedback.title,
                        text: feedback.msg,
                        icon: feedback.type,
                    }).then((value) => {
                        if (feedback.type == 'success') {
                            dataTable.ajax.reload();
                            $('#modalCreateStatus').modal('toggle');
                        }
                    });
                },
                error: function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'Erro ao adicionar status, tente novamente.',
                        icon: 'error',
                    })
                }
            });
        });

        // RECEBER DADOS DO STATUS PARA EDIÇÃO
        $(".getDataStatus").on("click", function() {
            let idstatus = $(this).alt();

            $.ajax({
                type: "POST",
                url: u + '/adminstatus/getdados',
                data: idstatus,
                dataType: 'json',
                success: function(dados) {
                    if (dados.success) {
                        $("input[name='editstatus_name']").val(dados.name);
                        $("input[name='editstatus_position']").val(dados.position);
                        $("input[name='editstatus_color']").val(dados.color);
                        $("input[name='editstatus_active']").val(dados.active).change();

                        dataTable.ajax.reload();
                        $('#modalCreateStatus').modal('toggle');
                    } else {
                        Swal.fire({
                            title: feedback.title,
                            text: feedback.msg,
                            icon: feedback.type,
                        })
                    }
                },
                error: function() {
                    Swal.fire({
                        title: 'Error',
                        text: 'Erro ao editar status, tente novamente.',
                        icon: 'error',
                    })
                }
            });
        });
    });
</script>