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

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

    .modal-dialog {
        max-width: 90%;
        margin: 30px auto;
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
                <li class="breadcrumb-item active"><a href="<?php echo base_url('sms') ?>">SMS</a></li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row px-3">
                    <div class="col-sm-6 text-left">
                        <h2 class="text-secondary"><b>SMS</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <form id="filter-form">
                            <div class="button-area">
                                <button type="button" class="btn btn-secondary" style="margin-right: 15px" title="Adicionar Item" onclick="callCreateStatus()"><i class="fa fa-plus"></i> <b>Novo SMS</b></button>
                                <!-- <a href="https://tie.nsolucoes.digital/status" class="btn btn-primary" style="margin-right: 15px" title="Adicionar Item">
                                    Novo Status <i class="fa fa-plus"></i>
                                </a> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="c-card-body" style="display: block">
                <div class="col-md-12">
                    <table id="status-list" class="table table-borderless" data-page-length='10' data-order='[[1, "asc"]]'>
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Título</th>
                                <th>Execução</th>
                                <th>Tipo</th>
                                <!-- <th>Texto</th> -->
                                <!-- <th>Cor</th> -->
                                <th>Ativo</th>
                                <th class="text-right">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $aux=1; foreach($textos as $sts){?>
                                <tr>
                                    <td class="text-center"><?php echo $sts['stc_id'] ?></th>
                                    <td><?php echo $sts['stc_titulo'];?></td>
                                    <td><?php echo $sts['stc_gatilho'];?></td>
                                    <td><?php echo $sts['stc_tipo'];?></td>
                                    <!-- <td><?php //echo mb_strimwidth($sts['stc_texto'], 0, 150, "...");?></td> -->
                                    <!-- <td><button type="button" class="btn" disabled style="background-color:<?php //echo $sts['stc_cor']; ?>;"></button></td> -->
                                    <td><?php echo $sts['stc_ativo'];?></td>
                                    <td class="text-right">
                                        <button type="button" class="btn btn-dark" onclick="sendSMS('<?php echo $sts['stc_id'];?>')"><i class="fa fa-send" aria-hidden="true"></i></button>
                                        <button type="button" class="btn btn-secondary" onclick="editSMS('<?php echo $sts['stc_id'];?>')"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        <?php if($sts['stc_ativo'] == 'Ativo'){?>
                                            <button type="button" class="btn btn-danger" onclick="updateAtivo('<?php echo $sts['stc_id'];?>', '0')"><i class="fa fa-ban" aria-hidden="true"></i></button>
                                        <?php }else{?>
                                            <button type="button" class="btn btn-success" onclick="updateAtivo('<?php echo $sts['stc_id'];?>', '1')"><i class="fa fa-check-square-o" aria-hidden="true"></i></button>
                                        <?php }?>
                                    </td>
                                </tr>   
                             
                            <?php }?>
                            <!-- 
                                NÃO TEM COLUNA DE COR, PODE REMOVER, SUBSTITUI POR TITULO

                                na função gravaSMSNew acrescenta
                                dados.append('stc_titulo', $("#tituloSms").val());
                                antes do primeiro if
                                e na função editSMS acrescenta 
                                $("#tituloSms").val(data.stc_titulo);
                                no final das chamadas, dentro do success do ajax


                             -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</section>
<input type="hidden" id="stc_id" name="stc_id">

<!-- Modal SMS Texto-->
<div class="modal fade" id="modalCreateStatus" tabindex="-1" role="dialog" aria-labelledby="modalCreateStatusLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="m-header bg-dark d-flex justify-content-between" style="padding: 15px 30px">
                <h4 class="modal-title" id="exampleModalLabel"><b>Adicionar SMS:</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times text-white"></i>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="row" style="margin:0 auto; text-align:left;">
                    <div class="col-12 form-group d-flex align-items-center flex-wrap">
                        <label for="buttons" class="align-self-end mx-3">Variável:</label>
                        <button type="button" class="btn btn-secondary d-flex align-items-center mx-1 mb-2" onclick="inject('cliente')"><i class="fa fa-user px-2" aria-hidden="true"></i>Cliente</button>
                        <button type="button" class="btn btn-secondary d-flex align-items-center mx-1 mb-2" onclick="inject('dataAjuste')"><i class="fa fa-calendar px-2" aria-hidden="true"></i>Data Ajustes</button>
                        <button type="button" class="btn btn-secondary d-flex align-items-center mx-1 mb-2" onclick="inject('dataRetirada')"><i class="fa fa-calendar px-2" aria-hidden="true"></i>Data Retirada</button>
                        <button type="button" class="btn btn-secondary d-flex align-items-center mx-1 mb-2" onclick="inject('dataDevolucao')"><i class="fa fa-calendar px-2" aria-hidden="true"></i>Data Devolução</button>
                        <button type="button" class="btn btn-secondary d-flex align-items-center mx-1 mb-2" onclick="inject('atraso')"><i class="fa fa-calendar px-2" aria-hidden="true"></i>Devolução em Atraso</button>
                        <button type="button" class="btn btn-secondary d-flex align-items-center mx-1 mb-2" onclick="inject('trajes')"><i class="fa fa-male px-2" aria-hidden="true"></i>Trajes</button>
                        <button type="button" class="btn btn-secondary d-flex align-items-center mx-1 mb-2" onclick="inject('idLocacao')"><i class="fa fa-hashtag px-2" aria-hidden="true"></i>Id Locação</button>
                        <button type="button" class="btn btn-secondary d-flex align-items-center mx-1 mb-2" onclick="inject('totLocacao')"><i class="fa fa-money px-2" aria-hidden="true"></i>Total R$</button>
                    </div>
                    <div class="col-12 form-group" style="padding: 0 15px">
                        <label for="tituloSms">Título:</label>
                        <input type="text" id="tituloSms" name="tituloSms" class="form-control w-100" />
                    </div>
                    <div class="col-12 form-group" style="padding: 0 15px">
                        <label for="textoSms">Texto a enviar:</label>
                        <textarea class="form-control w-100" id="textoSms" name="textoSms" rows="4"></textarea>
                    </div>
                    <div class="col-md-12 col-lg-4 form-group">
                        <label for="colorSms">Execução após:</label>
                        <select class="form-control" id="statusExecucao"  name="statusExecucao">
                            <option selected disabled value="null">Selecione</option>
                            <?php foreach($status as $sts){?>
                            <option value="<?php echo $sts['sta_id']?>"><?php echo $sts['sta_nome']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-sm-6 col-lg-4 form-group">
                        <label for="smsTipo">Tipo de Mensagem:</label>
                        <select class="form-control form-select" id="smsTipo"  name="smsTipo">
                            <option value="-1" disabled selected>Selecione</option>
                            <option value="Locação">Locação</option>
                            <option value="Lembrete">Lembrete</option>
                            <option value="Pós Locação">Pós Locação</option>
                            <option value="Aniversário">Aniversário</option>
                        </select>
                    </div>
                    <div class="col-sm-6 col-lg-4 form-group">
                        <label for="buttons">Ativo:</label>
                        <select class="form-control" id="smsAtivo"  name="smsAtivo">
                            <option value="1" selected>Sim</option>
                            <option value="0">Não</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="gravaSMSNew()">Gravar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Status Locação-->
<div class="modal fade" id="modalNewStatus" tabindex="-1" role="dialog" aria-labelledby="modalNewStatusLabel" aria-hidden="true" style="padding: 0">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Estado de Locação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin:0; text-align-last:center;">
                    <div class="col-12">
                        <label for="colorSms">Selecione a cor:</label>
                        <input type="color" id="statusColor" name="statusColor" value="#ffffff">    
                    </div>
                    <div class="col-12">
                        <label for="buttons">Executado após:</label>
                        <select id="statusPrioridade"  name="statusPrioridade">
                            <option selected disabled value="null">Selecione a execução do estado</option>
                            <?php foreach($status as $sts){?>
                            <option value="<?php echo $sts['sta_id']?>"><?php echo $sts['sta_nome']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-12">
                        <label for="colorSms">Nome do Estado:</label>
                        <input type="text" id="statusNome" name="statusNome" placeholder="Ex: Locação">    
                    </div>
                    <div class="col-12">
                        <label for="buttons">Ativo:</label>
                        <select id="statusAtivo"  name="statusAtivo">
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

<!-- Modal SMS Envia Teste-->
<div class="modal fade" id="modalSendSMS" tabindex="-1" role="dialog" aria-labelledby="modalSendSMSLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="m-header bg-dark d-flex justify-content-between" style="padding: 15px 30px">
                <h4 class="modal-title" id="exampleModalLabel"><b>Testar SMS:</b></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times text-white"></i>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="row" style="margin:0 auto; text-align:left;">
                    <div class="col-12 form-group" style="padding: 0 15px">
                        <label for="tituloSms">Fone:</label>
                        <input type="text" id="foneSendSms" name="foneSendSms" class="form-control w-100" data-mask="(00) 00000-0000" data-mask-selectonfocus="true"/>
                    </div>
                    <div class="col-12 form-group" style="padding: 0 15px">
                        <label for="textoSms">Texto a enviar:</label>
                        <textarea class="form-control w-100" id="textoSmsSend" name="textoSmsSend" rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="enviaSmsTeste()">Enviar</button>
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
                console.log(data);
                $('#statusPrioridade').append(new Option($("#statusNome").val(), data));
                $('#statusExecucao').append(new Option($("#statusNome").val(), data));
            }
        });
        
    }
</script>
<script>
    function gravaSMSNew(){
        dados = new FormData();
        dados.append('stc_tipo', $("#smsTipo").val());
        dados.append('stc_ativo', $("#smsAtivo").val());
        dados.append('stc_gatilho', $("#statusExecucao").val());
        dados.append('stc_texto', $("#textoSms").val());
        dados.append('stc_titulo', $("#tituloSms").val())
        if($("#stc_id").val() != ""){
            dados.append('stc_id', $("#stc_id").val());
        }
        $.ajax({
            url: '<?php echo base_url('novoSmsTexto'); ?>',
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
    
    function updateAtivo(id, ativo){
        dados = new FormData();
        dados.append('stc_id', id);
        dados.append('stc_ativo', ativo);
        
        $.ajax({
            url: '<?php echo base_url('novoSmsTexto'); ?>',
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
        dados.append('stc_id', id);
        $.ajax({
            url: '<?php echo base_url('getSMS'); ?>',
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
                $("#smsTipo").val(data.stc_tipo);
                $("#smsAtivo").val(data.stc_ativo);
                $("#statusExecucao").val(data.stc_gatilho);
                $("#textoSms").val(data.stc_texto);
                $("#stc_id").val(data.stc_id);
                $("#tituloSms").val(data.stc_titulo);
                $("#modalCreateStatus").modal('toggle');
            }
        });
    }
</script>
<script>
    function callCreateStatus(){
        $("#smsTipo").val(-1);
        $("#smsAtivo").val(1);
        $("#statusExecucao").val(null);
        $("#textoSms").val('');
        $("#tituloSms").val('');
        $("#modalCreateStatus").modal('toggle');
    }
</script>
<script>
    function sendSMS(id){
        dados = new FormData();
        dados.append('stc_id', id);
        $.ajax({
            url: '<?php echo base_url('getSMS'); ?>',
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
                $("#textoSmsSend").val(data.stc_texto);
                $("#modalSendSMS").modal('toggle');
            }
        });
    }
    
    function enviaSmsTeste(){
        dados = new FormData();
        dados.append('fone', $("#foneSendSms").val());
        dados.append('text', $("#textoSmsSend").val());
        $.ajax({
            url: '<?php echo base_url('sendSMS'); ?>',
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
                $("#modalSendSMS").modal('toggle');
                Swal.fire(data);
            }
        });
    }
</script>