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

    .action .fa {
        font-size: 2rem;
        margin-left: 1rem;
    }

    .m-header{
        display: flex;
        justify-content: space-between;
        padding: 1.5rem 3rem;
        border-radius: 4px 4px 0 0;
    }
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Definições</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('status') ?>">Status</a></li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-sm-6 text-left">
                        <h2 class="text-secondary"><b>Status</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <form id="filter-form">
                            <div class="button-area">
                                <button type="button" class="btn btn-secondary" style="margin-right: 15px" title="Adicionar Item" data-toggle="modal" data-target="#modalNewStatus"><i class="fa fa-plus"></i> <b>Novo status</b></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="c-card-body" style="display: block">
                <div class="table-responsive overflow-hidden mb-5" style="width: 100%">
                    <table id="status-list" class="table table-borderless" data-page-length='10' data-order='[[1, "asc"]]'>
                        <thead>
                            <tr>
                                <th class="text-center col-md-1">#</th>
                                <th>Nome</th>
                                <th class="text-center">Cor</th>
                                <th>Execução após</th>
                                <th class="text-center">Ativo</th>
                                <th class="text-right">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $aux=1; foreach($textos as $sts){?>
                            <tr>
                                <td class="text-center"><?php echo $aux; $aux++;?></td>
                                <td><?php echo $sts['sta_nome'];?></td>
                                <td class="text-center"><button type="button" class="btn w-50 border" disabled style="background-color:<?php echo $sts['sta_cor'];?>;"></button></td>
                                <td><?php echo $sts['sta_executa'];?></td>
                                <td class="text-center"><?php echo $sts['sta_ativo'];?></td>
                                <td class="text-right">
                                    <button type="button" class="btn btn-secondary" onclick="editSMS('<?php echo $sts['sta_id'];?>')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                    <?php if($sts['sta_executa'] != 'Sistema'){?>
                                    <?php if($sts['sta_ativo'] == 'Ativo'){?>
                                    <button type="button" class="btn btn-danger" onclick="updateAtivo('<?php echo $sts['sta_id'];?>', '0')"><i class="fa fa-ban" aria-hidden="true"></i></button>
                                    <?php }else{?>
                                    <button type="button" class="btn btn-success" onclick="updateAtivo('<?php echo $sts['sta_id'];?>', '1')"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
                                    <?php }?>
                                    <button type="button" class="btn btn-warning" onclick="delStat('<?php echo $sts['sta_id'];?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                    <?php }?>
                                </td>
                            </tr>    
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
<input type="hidden" id="sta_id" name="sta_id">

<!-- Modal Status Locação-->
<div class="modal fade mx-2" id="modalNewStatus" tabindex="-1" role="dialog" aria-labelledby="modalNewStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin: 30px auto 0 auto">
        <div class="modal-content">
            <div class="bg-dark d-flex justify-content-between" style="padding: 15px">                  
                <h4 class="modal-title" id="exampleModalLabel"><b>Novo status de Locação</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row mx-2">
                    <div class="col-8 form-group">
                        <label for="colorSms">Nome do Estado:</label>
                        <input type="text" class="form-control" id="statusNome" name="statusNome" placeholder="Ex: Locação">    
                    </div>
                    <div class="col-4 form-group">
                        <label for="colorSms">Selecione a cor:</label>
                        <input type="color" class="form-control-color form-control-custom w-100" id="statusColor" name="statusColor" value="#ffffff">    
                    </div>
                    <div class="col-6 form-group">
                        <label for="buttons">Executado após:</label>
                        <select class="form-control form-select" id="statusPrioridade"  name="statusPrioridade">
                            <option selected disabled value="null">Selecione a execução do estado</option>
                            <?php foreach($status as $sts){?>
                            <option value="<?php echo $sts['sta_id']?>"><?php echo $sts['sta_nome']?></option>
                            <?php }?>
                        </select>
                    </div>                    
                    <div class="col-6 form-group">
                        <label for="buttons">Ativo:</label>
                        <select class="form-control form-select" id="statusAtivo"  name="statusAtivo">
                            <option value="1" selected>Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-primary" onclick="gravaEstadoNew()">Gravar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#status-list').DataTable({
            lengthChange: false,
            ordering: false,
            searching: false,
            info: false,
            language: {
               url: "https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json"
            }
        });
    });
</script>
<script>
    function inject(data){
        console.log(data);
        var txt = $("#textoSms").val();
        txt = txt + "{{"+data+"}}";
        $("#textoSms").val();
        $("#textoSms").val(txt);
        $("#textoSms").focus();
    }
</script>
<script>
    function gravaEstadoNew(){
        
        dados = new FormData();
        if($("#sta_id").val() != ""){
            dados.append('sta_id', $("#sta_id").val());
        }
        dados.append('sta_cor', $("#statusColor").val());
        dados.append('sta_executa', $("#statusPrioridade").val());
        dados.append('sta_nome', $("#statusNome").val());
        dados.append('sta_ativo', $("#statusAtivo").val());
        
        $.ajax({
            url: '<?php echo base_url('novoStatus'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function(){
                
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            success: function(data) {
                window.location.reload();
            }
        });
        
    }
</script>
<script>
    function updateAtivo(id, ativo){
        dados = new FormData();
        dados.append('sta_id', id);
        dados.append('sta_ativo', ativo);
        
        $.ajax({
            url: '<?php echo base_url('novoStatus'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function(){
                
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            success: function(data) {
                window.location.reload();
            }
        });
    }
    
    function delStat(id){
        dados = new FormData();
        dados.append('sta_id', id);
        dados.append('acao', 'del');
        
        $.ajax({
            url: '<?php echo base_url('novoStatus'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function(){
                
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            success: function(data) {
                window.location.reload();
            }
        });
    }
</script>
<script>
    function editSMS(id){
        dados = new FormData();
        dados.append('sta_id', id);
        $.ajax({
            url: '<?php echo base_url('getSTS'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function(){
                
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            success: function(data) {
                if(data.sta_executa == 0){
                    $("#statusPrioridade").attr("disabled", true);
                    $("#statusNome").prop('readOnly', true);
                    $("#statusAtivo").attr("disabled", true);  
                }else{
                    $("#statusPrioridade").attr("disabled", false);
                    $("#statusNome").prop('readOnly', false);
                    $("#statusAtivo").attr("disabled", false);  
                    $("#statusPrioridade option[value=0]").attr("disabled", true);
                }
                $("#statusColor").val(data.sta_cor);
                $("#statusPrioridade").val(data.sta_executa);
                $("#statusNome").val(data.sta_nome);
                $("#statusAtivo").val(data.sta_ativo);
                $("#sta_id").val(data.sta_id);
                $("#modalNewStatus").modal('toggle');
            }
        });
    }
</script>