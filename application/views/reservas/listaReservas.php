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
<script src="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" crossorigin="anonymous"></script>
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
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
                <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                    <li class="breadcrumb-item active" aria-current="page">Cat??logo</li>
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
                            <a href="#"><button type="button" class="btn btn-rounded btn-secondary filter-btn"><i class="fa fa-search" aria-hidden="true"></i></button></a>
                        </div>
                    </div>
                </div>
                <div class="c-card-body" style="display: block">
                    
                    <div style="display:none">
                        <label for="cliente" class="form-label">Cliente:</label>
                        <input type="text" class="form-control" placeholder="Todos os Clientes" id="cliente" name="cliente">
                        <label for="periodo1" class="form-label">Per??odo:</label>
                        <input type="date" class="form-control" placeholder="Per??odo" id="periodo1" name="periodo1" value="<?php echo date('Y-m-d');?>">
                        <input type="date" class="form-control" placeholder="Per??odo" id="periodo2" name="periodo2" value="<?php echo date('Y-m-d');?>">
                        <label for="status" class="form-label">Status:</label>
                        <select class="form-control" id="status" name="status">
                            <option value="-1" selected>Todos</option>
                            <option value="1">N??o Finalizado</option>
                            <option value="2">Ajustes</option>
                            <option value="3">Aguardando Retirada</option>
                            <option value="4">Retirado</option>
                            <option value="5">Aguardando Devolucao</option>
                            <option value="6">Devolvido</option>
                            <option value="7">Loca????o Finalizada</option>
                            <option value="8">Loca????o Cancelada</option>
                        </select>
                    </div>
                    <div style="width: 100%">
                        <table id="reserva-list">
                            <thead>
                                <tr>
                                    <!--<th class="col"> N?? Loca????o</th>-->
                                    <th class="col"> Data</th>
                                    <th class="col"> Cliente</th>
                                    <!--<th class="col"> CPF</th>-->
                                    <!--<th class="col"> Telefone</th>-->
                                    <th class="col"> Periodo Loca????o</th>
                                    <th class="col"> Status</th>
                                    <th class="col"> Pago</th>
                                    <th class="col"> Total</th>
                                    <th class="col-2"> A????es</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>  
                        </table>
                    </div> 
                </div>
            </div>
    </section>
</section>


<div class="modal" id="detalhesModal" aria-hidden="true" aria-labelledby="detalhesModalLabel" data-bs-focus="false">
        <!-- #Adicionar essa class para deixar o modal no meio da tela: modal-dialog-centered  -->
        <div class="modal-dialog modal-dialog-centered modal-lg"> 
            <div class="modal-content">
                <div class="modal-header text-bg-secondary">
                    <p class="modal-title" id="exampleModalLabel">
                        Detalhes da Loca????o - 
                        <strong id="locacaoId"></strong>
                    </p>
                    <button type="button" class="btn-close" style="font-size: 25px;" data-bs-dismiss="modal" aria-label="Close"></button> <!-- &times -->
                </div>
                <input type="hidden" id="identificador" name="identificador">
                <div class="modal-body">
                    
                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" onclick="alterbutton(1)" href="nav-locacao" id="nav-locacao-tab" data-bs-toggle="tab" data-bs-target="#nav-locacao" role="tab" aria-controls="nav-locacao" aria-selected="false">Loca????o</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="alterbutton(0)" href="nav-cliente" id="nav-cliente-tab" data-bs-toggle="tab" data-bs-target="#nav-cliente" role="tab" aria-controls="nav-cliente" aria-selected="true">Cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="alterbutton(2)" href="nav-pagamentos" id="nav-pagamentos-tab" data-bs-toggle="tab" data-bs-target="#nav-pagamentos" role="tab" aria-controls="nav-pagamentos" aria-selected="false">Pagamentos</a>
                        </li>
                        <div class="col d-flex justify-content-end p-2">
                            <button type="button" id="btnfunction" class="btn btn-light"  onclick="alterLocacao()">
                                Editar Loca????o
                            </button>
                        </div>                        
                    </ul>
                    
                    <div class="tab-content m-4" id="nav-tabContent">
                        <div class="tab-pane active" id="nav-locacao" role="tabpanel" aria-labelledby="nav-locacao-tab">
                            <div class="d-flex justify-content-center py-2">
                                <div class="col-md-4 form-group">
                                    <label for="inputStatus" class="form-label ">Status:</label>
                                    <input type="text" class="form-control text-center" id="inputStatus" readonly>
                                </div>
                                <div class="form-group col-md-5 mt-auto">
                                    <label class="form-label " for="statusPedidoGeral">Alterar Status:</label>
                                    <div class="d-flex input-group">
                                        <select class="form-select form-select-lg" id="statusPedidoGeral" id="statusPedidoGeral">
                                            <option value='-1' selected disabled hidden>Selecione</option>
                                            <option value='1'>Pendente</option>
                                            <option value='2'>Ajustes</option>
                                            <option value='3'>Retirada</option>
                                            <option value='4'>Devolu????o</option>
                                            <option value='5'>Finalizado</option>
                                            <option value='7'>Cancelado</option>
                                        </select>
                                        <button type="button" class="btn btn-dark" onclick="alterStatus()">Confirmar</button>
                                    </div>
                                </div>   
                            </div>
                            <div class="d-flex justify-content-evenly p-0 border-2 border-bottom border-top py-4">
                                <input type="hidden" class="form-control" id="locacaoTokenAlter">
                                <div class="form-group col-md-2">
                                    <label for="inputAddress" class="form-label ">Retirada:</label>
                                    <input type="text" class="form-control text-center" id="inputLocacao" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputAddress" class="form-label ">Devolu????o:</label>
                                    <input type="text" class="form-control text-center" id="inputDevolucao" readonly>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="inputAddress" class="form-label ">Prova:</label>
                                    <input type="text" class="form-control text-center" id="inputProva" readonly>
                                </div>
                            </div> 
                            <br>
                            <div class="overflow-auto" style="max-height: 300px;">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Traje</th>
                                            <th scope="col">Tamanho</th>
                                            <th scope="col">Cor</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        <div class="tab-pane" id="nav-cliente" role="tabpanel" aria-labelledby="nav-cliente-tab">
                            <div class="row">
                                <input type="hidden" class="form-control" id="inputToken">
                                <div class="col-7 form-group">
                                    <label for="inputAddress" class="form-label ">Nome:</label>
                                    <input type="text" class="form-control" id="inputName" readonly>
                                </div>
                                <div class="col-5 form-group">
                                    <label for="inputNick" class="form-label ">Apelido:</label>
                                    <input type="text" class="form-control" id="inputNick" readonly>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="inputAddress" class="form-label ">CPF:</label>
                                    <input type="text" class="form-control" id="inputCpf" readonly>
                                </div>
                                <div class="col-6 form-group">
                                    <label for="inputAddress" class="form-label ">Fone:</label>
                                    <input type="text" class="form-control" id="inputCel" readonly>
                                </div>
                                <div class="col-2 form-group">
                                    <label for="inputZip" class="form-label ">CEP:</label>
                                    <input type="text" class="form-control" id="inputCep" readonly>
                                </div>
                                <div class="col-8 form-group">
                                    <label for="inputAddress" class="form-label ">Endere??o:</label>
                                    <input type="text" class="form-control" id="inputAddress" readonly>
                                </div>
                                <div class="col-2 form-group">
                                    <label for="inputNum" class="form-label ">N??mero:</label>
                                    <input type="text" class="form-control" id="inputNum" readonly>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="inputDistrict" class="form-label ">Bairro:</label>
                                    <input type="text" class="form-control" id="inputDistrict" readonly>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="inputComp" class="form-label ">Complemento:</label>
                                    <input type="text" class="form-control" id="inputComp" readonly>
                                </div>
                                
                                <div class="col-3 form-group">
                                    <label for="inputCity" class="form-label ">Cidade:</label>
                                    <input type="text" class="form-control" id="inputCity" readonly>
                                </div>
                                <div class="col-3 form-group">
                                    <label for="inputState" class="form-label ">UF:</label>
                                    <input type="text" class="form-control" id="inputUf" readonly>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="nav-pagamentos" role="tabpanel" aria-labelledby="nav-pagamentos-tab">
                            <div class="row">
                                <div class="col-md-12 text-right my-3">
                                    <button id="addPagamento" type="button" class="btn btn-dark" onclick="novoPagamento()">Novo Pagamento</button>
                                    <button id="addMulta" type="button" class="btn btn-danger ms-3" onclick="multaAdd()">Multa</button>
                                </div>
                                <div class="form-group col-3">
                                    <label for="inputAddress" class="form-label "> Loca????o: </label>
                                    <input type="text" class="form-control" id="inputTotal" readonly>
                                </div>
                                <div class="form-group col-3">
                                    <label for="inputAddress" class="form-label "> Pago: </label>
                                    <input type="text" class="form-control" id="inputPago" readonly>
                                </div>
                                <div class="form-group col-3">
                                    <label for="inputAddress" class="form-label "> Restante: </label>
                                    <input type="text" class="form-control" id="inputResto" readonly>
                                </div>
                                <div class="form-group col-3">
                                    <label for="inputMulta" id="labelMulta" class="form-label "> Multa: </label>
                                    <input type="text" class="form-control" id="inputMulta" readonly style="display: none">
                                </div>
                            </div>
                            
                            
                            <br>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Valor</th>
                                        <th scope="col">Data</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Forma</th>
                                    </tr>
                                </thead>
                                <tbody id="pbody">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <button type="button" id="btnfunction" class="btn-link fs-4"  onclick="comprovante()">
                                                Comprovante
                                            </button>
                                        </td>
                                        <td  colspan="3" >
                                            <div class="d-flex justify-content-end align-items-center  col">
                                                <label for="totalPago" class="form-label fw-bold text-uppercase">Total Pago:</label>
                                                <input type="text" class="form-control ms-2" id="totalPago" style="width: 100px" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div class="modal" id="pagamentoModal" aria-labelledby="pagamentoModalLabel" aria-hidden="true" data-bs-focus="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-bg-secondary">
                <p class="modal-title">Pagamento Parcial da Loca????o <b id="idLocacao"> </b></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <b>Pagamento</b>
                <div class="p-2 mt-1 mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <p for="valorEntrada" style="margin:0;">Valor:</p>
                            <div class="input-group">
                                <input type="text" name="valorEntrada" id="valorEntrada" class="form-control maskMoney" readonly>  
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>
                <b>Remanescente:</b>
                <div class="p-2 mt-1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label for="valorRestante" class="form-control" style="width:20%;" readonly>R$</label>
                                <input type="text" name="valorRestante" id="valorRestante" class="form-control" style="width:80%;" data-mask="9999,99">  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control form-select" name="formaPagamentoRestante" id="formaPagamentoRestante">
                                    <option selected disabled>Forma de pagamento</option>
                                    <?php foreach($pagamentos as $pgm){ ?>
                                    <option value="<?php echo $pgm['id_forma'];?>"><?php echo $pgm['nome_forma'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <p class="text-danger p-0 m-0">Restante a Pagar: <label id="restanteValor"></label></p>
                        <input type="hidden" name="auxRestante" id="auxRestante">  
                    </div>
                </div>          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="novoPagamento()">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="updatePagamento()">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="dependenteModal" aria-labelledby="dependenteModalLabel" aria-hidden="true" data-bs-focus="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-bg-secondary">
                <p class="modal-title">Dependentes de <b id="nomeCliente"> </b></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <input type="hidden" class="form-control" id="inputTokenCliente">
                <input type="hidden" class="form-control" id="inputTokenLocacao"> 
            </div>
            
            <div class="modal-body">
                <table class="table table-hover">    
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dependente</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Fone</th>
                        </tr>
                    </thead>
                    <tbody id="dbody">
                </table>        
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="fechaDependentes()">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="updateDependente()">Adicionar</button>
            </div>
        </div>
    </div>
</div>    

<div class="modal" id="newDependenteModal" aria-labelledby="newDependenteModalLabel" aria-hidden="true" data-bs-focus="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-bg-secondary">
                <p class="modal-title">Dados do Dependente</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row" style="margin-left:2%; margin-right:2%; line-height:5px;">
                    <div class="col-12 form-group">
                        <input type="hidden" class="form-control" id="inputToken">
                    </div>
                    <div class="col-12 form-group">
                        <label for="nomeDependente" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nomeDependente" name="nomeDependente">
                    </div>
                    <div class="col-4 form-group">
                        <label for="cpfDependente" class="form-label">CPF:</label>
                        <input type="text" class="form-control" id="cpfDependente" name="cpfDependente" data-mask="999.999.999-99">
                    </div>
                    <div class="col-4 form-group">
                        <label for="foneDependente" class="form-label">Fone:</label>
                        <input type="text" class="form-control" id="foneDependente" name="foneDependente" data-mask="(99) 99999-9999">
                    </div>
                    <div class="col-4 form-group">
                        <label for="cepDependente" class="form-label">CEP:</label>
                        <input type="text" class="form-control" id="cepDependente" name="cepDependente" data-mask="99999-999" onblur="pesquisacep(this.value);">
                    </div>
                    <div class="col-10 form-group">
                        <label for="depEnd" class="form-label">Endere??o:</label>
                        <input type="text" class="form-control" id="depEnd" name="depEnd" readonly>
                    </div>
                    <div class="col-2 form-group">
                        <label for="numDependente" class="form-label">N??mero:</label>
                        <input type="text" class="form-control" id="numDependente" id="numDependente">
                    </div>
                    <div class="col-3 form-group">
                        <label for="complementoDependente" class="form-label">Complemento:</label>
                        <input type="text" class="form-control" id="complementoDependente" id="complementoDependente">
                    </div>
                    <div class="col-4 form-group">
                        <label for="depProv" class="form-label">Bairro:</label>
                        <input type="text" class="form-control" id="depProv" name="depProv" readonly>
                    </div>
                    <div class="col-3 form-group">
                        <label for="depCit" class="form-label">Cidade:</label>
                        <input type="text" class="form-control" id="depCit" name="depCit" readonly>
                    </div>
                    <div class="col-2 form-group">
                        <label for="depUf" class="form-label">UF:</label>
                        <input type="text" class="form-control" id="depUf" name="depUf" readonly>
                    </div>
                    
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="fechaNewDependentes()">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="newDependente()">Adicionar</button>
            </div>
        </div>
    </div>
</div>    

<div class="modal" id="multaModal" aria-labelledby="multaModalLabel" aria-hidden="true" data-bs-focus="false">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header text-bg-secondary">
                <p class="modal-title">Pagamento de Multa da Loca????o em atraso <b id="idLocacao"> </b></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <input type="hidden" value="0" id="inputMultaAtraso">
            </div>
            <div class="modal-body">
                <b>Pagamento</b>
                <div class="p-2 mt-1">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group">
                                <label for="valorMulta" class="form-control" style="width:20%;" readonly>R$</label>
                                <input type="text" name="valorMulta" id="valorMulta" class="form-control" style="width:80%;" data-mask="9999,99">  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <select class="form-control form-select" name="formaPagamentoMulta" id="formaPagamentoMulta">
                                    <option selected disabled>Forma de pagamento</option>
                                    <?php foreach($pagamentos as $pgm){ ?>
                                    <option value="<?php echo $pgm['id_forma'];?>"><?php echo $pgm['nome_forma'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group">
                                <label for="motivoMulta" class="form-control" style="width:20%;" readonly>Motivo</label>
                                <input type="text" name="motivoMulta" id="motivoMulta" class="form-control" style="width:80%;">  
                            </div>
                        </div>
                    </div>
                </div>          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="closeModalMulta()">Cancelar</button>
                <button type="button" class="btn btn-success" onclick="updateMulta()">Confirmar</button>
            </div>
        </div>
    </div>
</div>


<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

<!-- FUN????ES DE DATATABLE AJAX -->
<script>

    function showValue () {
        $(this).find('div.hide-value').removeClass('d-none');
        $(this).addClass('d-none');
    }
    function hideValue () {
        $(this).next('div.show-value').addClass('d-none');
        $(this).removeClass('d-none');
    }

    var dtLanguageJSON = {
        "emptyTable": "Nenhum registro encontrado",
        "info": "Mostrando de _START_ at?? _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 at?? 0 de 0 registros",
        "infoFiltered": "(Filtrados de _MAX_ registros)",
        "infoThousands": ".",
        "loadingRecords": "Carregando...",
        "processing": "Processando...",
        "zeroRecords": "Nenhum registro encontrado",
        "search": "",
        "paginate": {
            "next": "Pr??ximo",
            "previous": "Anterior",
            "first": "Primeiro",
            "last": "??ltimo"
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
                "1": "1 c??lula selecionada",
                "_": "%d c??lulas selecionadas"
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
            "collection": "Cole????o  <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
            "colvis": "Visibilidade da Coluna",
            "colvisRestore": "Restaurar Visibilidade",
            "copy": "Copiar",
            "copyKeys": "Pressione ctrl ou u2318 + C para copiar os dados da tabela para a ??rea de transfer??ncia do sistema. Para cancelar, clique nesta mensagem ou pressione Esc..",
            "copyTitle": "Copiar para a ??rea de Transfer??ncia",
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
            "fill": "Preencher todas as c??lulas com",
            "fillHorizontal": "Preencher c??lulas horizontalmente",
            "fillVertical": "Preencher c??lulas verticalmente"
        },
        "lengthMenu": "Exibir _MENU_ resultados por p??gina",
        "searchBuilder": {
            "add": "Adicionar Condi????o",
            "button": {
                "0": "Construtor de Pesquisa",
                "_": "Construtor de Pesquisa (%d)"
            },
            "clearAll": "Limpar Tudo",
            "condition": "Condi????o",
            "conditions": {
                "date": {
                    "after": "Depois",
                    "before": "Antes",
                    "between": "Entre",
                    "empty": "Vazio",
                    "equals": "Igual",
                    "not": "N??o",
                    "notBetween": "N??o Entre",
                    "notEmpty": "N??o Vazio"
                },
                "number": {
                    "between": "Entre",
                    "empty": "Vazio",
                    "equals": "Igual",
                    "gt": "Maior Que",
                    "gte": "Maior ou Igual a",
                    "lt": "Menor Que",
                    "lte": "Menor ou Igual a",
                    "not": "N??o",
                    "notBetween": "N??o Entre",
                    "notEmpty": "N??o Vazio"
                },
                "string": {
                    "contains": "Cont??m",
                    "empty": "Vazio",
                    "endsWith": "Termina Com",
                    "equals": "Igual",
                    "not": "N??o",
                    "notEmpty": "N??o Vazio",
                    "startsWith": "Come??a Com",
                    "notContains": "N??o cont??m",
                    "notStarts": "N??o come??a com",
                    "notEnds": "N??o termina com"
                },
                "array": {
                    "contains": "Cont??m",
                    "empty": "Vazio",
                    "equals": "Igual ??",
                    "not": "N??o",
                    "notEmpty": "N??o vazio",
                    "without": "N??o possui"
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
            "leftTitle": "Crit??rios Externos",
            "rightTitle": "Crit??rios Internos"
        },
        "searchPanes": {
            "clearMessage": "Limpar Tudo",
            "collapse": {
                "0": "Pain??is de Pesquisa",
                "_": "Pain??is de Pesquisa (%d)"
            },
            "count": "{total}",
            "countFiltered": "{shown} ({total})",
            "emptyPanes": "Nenhum Painel de Pesquisa",
            "loadMessage": "Carregando Pain??is de Pesquisa...",
            "title": "Filtros Ativos",
            "showMessage": "Mostrar todos",
            "collapseMessage": "Fechar todos"
        },
        "thousands": ".",
        "datetime": {
            "previous": "Anterior",
            "next": "Pr??ximo",
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
                "2": "Mar??o",
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
                "Ter??a-feira",
                "Quarta-feira",
                "Quinte-feira",
                "Sexta-feira",
                "S??bado"
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
                "system": "Ocorreu um erro no sistema (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">Mais informa????es<\/a>)."
            },
            "multi": {
                "noMulti": "Essa entrada pode ser editada individualmente, mas n??o como parte do grupo",
                "restore": "Desfazer altera????es",
                "title": "Multiplos valores",
                "info": "Os itens selecionados cont??m valores diferentes para esta entrada. Para editar e definir todos os itens para esta entrada com o mesmo valor, clique ou toque aqui, caso contr??rio, eles manter??o seus valores individuais."
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
                "paging": "Pagina????o",
                "scroller": "Posi????o da barra de rolagem",
                "search": "Busca",
                "searchBuilder": "Mecanismo de busca",
                "select": "Selecionar",
                "title": "Criar novo estado",
                "toggleLabel": "Inclui:"
            },
            "duplicateError": "J?? existe um estado com esse nome",
            "emptyError": "N??o pode ser vazio",
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
    $(document).ready(function() {
        
        
        $('#reserva-list').DataTable({
            paging: true,
            info: true,
            processing: true,
            serverSide: true,
            searching: true,
            dom: '<"top"f>rt<"bottom d-flex justify-content-between align-items-center"lip><"clear">',
            order: [],
            ajax: {
                url: "<?php echo site_url('exibeReservas') ?>",
                type: "POST"
            },
            columns: [
                { data: '0' },
                { data: '1' },
                { data: '2' },
                { data: '3' },
                { data: '4', class:'number-hide' },
                { data: '5', class:'number-hide' },
                { data: '6' },
            ],
            columnDefs: [{
                "targets": [0],
                "orderable": true,
            },],
            language: dtLanguageJSON,
        });
        
        setTimeout(function(){  
            $( "select[name='reserva-list_length']" ).removeClass('input-sm'); 
        }, 1000);
        
        $('[type=search]').each(function () {
            $(this).attr("placeholder", "Pesquisar...");
            $(this).before('<span class="fa fa-search"></span>');
        });
    
    });
</script>
<!-- FIM FUN????ES DE DATATABLE AJAX -->
<!-- FUN????ES DE CHAMADAS CEP -->
<script>
    function limpa_formul??rio_cep() {
        document.getElementById('depEnd').value=("");
        document.getElementById('depProv').value=("");
        document.getElementById('depCit').value=("");
        document.getElementById('depUf').value=("");
    }
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('depEnd').value=(conteudo.logradouro);
            document.getElementById('depProv').value=(conteudo.bairro);
            document.getElementById('depCit').value=(conteudo.localidade);
            document.getElementById('depUf').value=(conteudo.uf);
        }
        else {
            limpa_formul??rio_cep();
            alert("CEP n??o encontrado.");
        }
    }
    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                document.getElementById('depEnd').value="...";
                document.getElementById('depProv').value="...";
                document.getElementById('depCit').value="...";
                document.getElementById('depUf').value="...";
                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            }
            else {
                limpa_formul??rio_cep();
                alert("Formato de CEP inv??lido.");
            }
        }
        else {
            limpa_formul??rio_cep();
        }
    }
</script>
<!-- FIM FUN????ES DE CHAMADAS CEP -->
<!-- FUN????ES DE DETALHES DE LOCA????O -->
<script>
    function detalhes(id){
        dados = new FormData();
        dados.append('busca', id);
        $.ajax({
            url: '<?php echo base_url('buscaLocacao');?>',
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
                //dados gerais
                $("#locacaoId").html(data.id);
                $("#nomeCliente").html(data.cliente.nome);
                $("#inputTokenLocacao").val(id);
                $("#locacaoTokenAlter").val(id);
                $("#identificador").val(id);
                //Fim dados gerais
                
                //dados Cliente
                $("#inputName").val(data.cliente.nome);
                $("#inputNick").val(data.cliente.nick);
                $("#inputCpf").val(data.cliente.cpf);
                $("#inputCel").val(data.cliente.cel);
                $("#inputAddress").val(data.cliente.address);
                $("#inputNum").val(data.cliente.num);
                $("#inputComp").val(data.cliente.comp);
                $("#inputCep").val(data.cliente.address);
                $("#inputDistrict").val(data.cliente.dist);
                $("#inputCity").val(data.cliente.city);
                $("#inputUf").val(data.cliente.uf);
                $("#inputCep").val(data.cliente.cep);
                $("#inputToken").val(data.cliente.token);
                //Fim dados Cliente
                
                //dados Loca????o/trajes
                $("#inputStatus").val(data.statusTxt);
                $("#inputLocacao").val(data.datas.locacao);
                $("#inputDevolucao").val(data.datas.devolucao);
                $("#inputProva").val(data.datas.prova);
                $("#tbody").html(data.locacao);
                if(data.datas.atraso == true){
                    //$("#addMulta").show();
                    $("#inputMultaAtraso").val('1');
                }else{
                    //$("#addMulta").hide();
                    $("#inputMultaAtraso").val('0');
                }
                //Fim dados Loca????o/trajes
                
                //dados Pagamento
                $("#inputTotal").val(data.valores.total);
                $("#inputPago").val(data.valores.pago);
                $("#inputResto").val(data.valores.falta);
                $("#inputMulta").val(data.valores.multa);
                $("#totalPago").val(data.valores.totalGeral);
                if($("#inputMulta").val() != "R$ 0,00"){
                    $("#inputMulta").show();
                    $("#labelMulta").show();
                }else{
                    $("#inputMulta").hide();
                    $("#labelMulta").hide();
                }
                // console.log(data.valores.falta);
                if(data.valores.falta === 'R$ 0,00'){
                    $("#addPagamento").prop("disabled", true);
                }else{
                    $("#addPagamento").prop("disabled", false);
                }
                $("#pbody").html(data.pagamento);
                
                $("#valorEntrada").val(data.valores.pago);
                $("#valorRestante").val(data.valores.remanescente);
                $("#restanteValor").html(data.valores.falta);
                $("#auxRestante").val(data.valores.falta);
                $("#idLocacao").html(id);
                //Fim dados Pagamento
                
                //dados Status
                $("#statusPedidoGeral option").each(function(){
                    $(this).attr('disabled', false);
                });
                    
                $("#statusPedidoGeral option").each(function(){
                    if($(this).val() < data.status){
                        $(this).attr('disabled', true);
                    }
                });
                //Fim dados Status
                
                $('#detalhesModal').modal('toggle');
                
            },
        });
    }
    function alterbutton(id){
        if(id == 0){
            $("#btnfunction").attr('onclick', 'dependente()');
            $("#btnfunction").html('Dependentes');
            $("#btnfunction").show();
        }else if(id == 1){
            $("#btnfunction").attr('onclick', 'alterLocacao()');
            $("#btnfunction").html('Editar Loca????o');
            $("#btnfunction").show();
        }else if (id == 2){
            $("#btnfunction").hide();
        }
    }
    function alterLocacao(){
        var form = document.createElement("form");
        var element1 = document.createElement("input"); 
        
        form.method = "POST";
        form.action = "<?php echo base_url('alteraReserva');?>";   
    
        element1.value = $("#locacaoTokenAlter").val();
        element1.name  = "reserva";
        form.appendChild(element1);  
    
        document.body.appendChild(form);
        form.submit();
    }
    function comprovante(){
        var height = 500;
        var width  = 600;
        var top = parseInt((screen.availHeight) - height - 100);
        var left = parseInt((screen.availWidth) - (width / 2));
        var features = "location=1, status=1, scrollbars=1, width=" + width + ", height=" + height + ", top=" + top + ", left=" + left;
        window.open("<?php echo base_url('/impressoes/geraCupom?chave=');?>"+$("#identificador").val(), 'Comprovante', features);
    }
    function multa(id){
        dados = new FormData();
        dados.append('busca', id);
        $.ajax({
            url: '<?php echo base_url('buscaLocacao');?>',
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
                //dados gerais
                $("#locacaoId").html(data.id);
                $("#nomeCliente").html(data.cliente.nome);
                $("#inputTokenLocacao").val(id);
                $("#locacaoTokenAlter").val(id);
                $("#identificador").val(id);
                //Fim dados gerais
                
                //dados Cliente
                $("#inputName").val(data.cliente.nome);
                $("#inputNick").val(data.cliente.nick);
                $("#inputCpf").val(data.cliente.cpf);
                $("#inputCel").val(data.cliente.cel);
                $("#inputAddress").val(data.cliente.address);
                $("#inputNum").val(data.cliente.num);
                $("#inputComp").val(data.cliente.comp);
                $("#inputCep").val(data.cliente.address);
                $("#inputDistrict").val(data.cliente.dist);
                $("#inputCity").val(data.cliente.city);
                $("#inputUf").val(data.cliente.uf);
                $("#inputCep").val(data.cliente.cep);
                $("#inputToken").val(data.cliente.token);
                //Fim dados Cliente
                
                //dados Loca????o/trajes
                $("#inputStatus").val(data.statusTxt);
                $("#inputLocacao").val(data.datas.locacao);
                $("#inputDevolucao").val(data.datas.devolucao);
                $("#inputProva").val(data.datas.prova);
                $("#tbody").html(data.locacao);
                if(data.datas.atraso == true){
                    //$("#addMulta").show();
                    $("#inputMultaAtraso").val('1');
                }else{
                    //$("#addMulta").hide();
                    $("#inputMultaAtraso").val('0');
                }
                //Fim dados Loca????o/trajes
                
                //dados Pagamento
                $("#inputTotal").val(data.valores.total);
                $("#inputPago").val(data.valores.pago);
                $("#inputResto").val(data.valores.falta);
                $("#inputMulta").val(data.valores.multa);
                $("#totalPago").val(data.valores.totalGeral);
                if($("#inputMulta").val() != "R$ 0,00"){
                    $("#inputMulta").show();
                    $("#labelMulta").show();
                }else{
                    $("#inputMulta").hide();
                    $("#labelMulta").hide();
                }
                // console.log(data.valores.falta);
                if(data.valores.falta === 'R$ 0,00'){
                    $("#addPagamento").prop("disabled", true);
                }else{
                    $("#addPagamento").prop("disabled", false);
                }
                $("#pbody").html(data.pagamento);
                
                $("#valorEntrada").val(data.valores.pago);
                $("#valorRestante").val(data.valores.remanescente);
                $("#restanteValor").html(data.valores.falta);
                $("#auxRestante").val(data.valores.falta);
                $("#idLocacao").html(id);
                //Fim dados Pagamento
                
                //dados Status
                $("#statusPedidoGeral option").each(function(){
                    $(this).attr('disabled', false);
                });
                    
                $("#statusPedidoGeral option").each(function(){
                    if($(this).val() < data.status){
                        $(this).attr('disabled', true);
                    }
                });
                //Fim dados Status
                
                alterbutton(2);
                $('#nav-locacao-tab').removeClass('active');
                $('#nav-locacao').removeClass('active');
                $('#nav-pagamentos-tab').addClass('active');
                $('#nav-pagamentos').addClass('active');
                $('#detalhesModal').modal('toggle');
            },
        });
    }
</script> 
<script>
    function mudaStatus(id){
        Swal.fire({
            title: 'Confirma Altera????o?',
            text: "N??o ser?? poss??vel reverter esta a????o",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim!',
            cancelButtonText: 'N??o.',
        }).then((result) => {
            if (result.isConfirmed) {
                dados = new FormData();
                dados.append('id', id);
                dados.append('collunm', 'alg_id');
                dados.append('situacao', $("#situacao option:selected" ).val());
                
                if($("#situacao option:selected" ).val() == 3){
                    (async () => {
                        const { value: formValues } = await Swal.fire({
                            title: 'Retirado por',
                            html:
                                '<input id="swal-input4" class="swal2-input" placeholder="Nome" required>',
                            focusConfirm: false,
                            preConfirm: () => {
                                dados.append('retirada', document.getElementById('swal-input4').value);
                                $.ajax({
                                    url: '<?php echo base_url('updateLocacao');?>',
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
                                        if(data == true){
                                            Swal.fire(
                                                'Atualizada!',
                                                'Situa????o do traje atualizado.',
                                                'success'
                                            );
                                            $('#detalhesModal').modal('toggle');
                                            detalhes($("#identificador").val());
                                        }
                                    }
                                });
                            }
                        });
                    })();
                }else{
                    
                    $.ajax({
                        url: '<?php echo base_url('updateLocacao');?>',
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
                            if(data == true){
                                Swal.fire(
                                    'Atualizada!',
                                    'Situa????o do traje atualizado.',
                                    'success'
                                );
                                $('#detalhesModal').modal('toggle');
                                detalhes($("#identificador").val());
                            }
                        }
                    });
                }
            }
        });
    }
    function alterStatus(){
        Swal.fire({
            title: 'Confirma Altera????o?',
            text: "N??o ser?? poss??vel reverter esta a????o",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim!',
            cancelButtonText: 'N??o.',
        }).then((result) => {
            if (result.isConfirmed) {
                dados = new FormData();
                dados.append('id', $("#identificador").val());
                dados.append('collunm', 'alg_chaveLocacao');
                dados.append('situacao', $("#statusPedidoGeral option:selected" ).val());
                
                if($("#statusPedidoGeral option:selected" ).val() == 3){
                    (async () => {
                        const { value: formValues } = await Swal.fire({
                            title: 'Retirada feita por:',
                            html:
                                '<input id="swal-input4" class="swal2-input" placeholder="Nome" required>',
                            focusConfirm: false,
                            preConfirm: () => {
                                dados.append('retirada', document.getElementById('swal-input4').value);
                                
                                $.ajax({
                                    url: '<?php echo base_url('updateAllLocacao');?>',
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
                                        if(data == true){
                                            Swal.fire(
                                                'Atualizada!',
                                                'Situa????o da loca????o atualizado.',
                                                'success'
                                            );
                                            $('#detalhesModal').modal('toggle');
                                            detalhes($("#identificador").val());
                                        }
                                    }
                                });
                            }
                        });
                    })();
                }else{
                    $.ajax({
                        url: '<?php echo base_url('updateAllLocacao');?>',
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
                            if(data == true){
                                Swal.fire(
                                    'Atualizada!',
                                    'Situa????o da loca????o atualizado.',
                                    'success'
                                );
                                $('#detalhesModal').modal('toggle');
                                detalhes($("#identificador").val());
                            }
                        }
                    });
                }
            }
        });
    }
</script>
<script>
    function novoPagamento(){
        $('#pagamentoModal').modal('toggle');
        $('#detalhesModal').modal('toggle');
    }
    function multaAdd(){
        $('#multaModal').modal('toggle');
        $('#detalhesModal').modal('toggle');
    }
    function closeModalMulta(){
        $('#multaModal').modal('toggle');
        $('#detalhesModal').modal('toggle');
    }
</script>
<script>
    function updatePagamento(){
        var aux = parseFloat($("#auxRestante").val().substring(3)).toFixed(2);
        if( parseFloat(aux) < parseFloat($("#valorRestante").val()).toFixed(2)  ){
            Swal.fire(
                'Ops!',
                'Pagamento acima do valor nescess??rio para liquida????o.',
                'error'
            );
        }else{
            dados = new FormData();
            dados.append('pagamento', parseFloat($("#valorRestante").val()).toFixed(2));
            dados.append('forma', $("#formaPagamentoRestante option:selected").val());
            dados.append('identidade', $("#identificador").val());
            $.ajax({
                url: '<?php echo base_url('updatePagamento');?>',
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
                    if(data == true){
                        Swal.fire(
                            'Recebido!',
                            'Pagamento atualizado.',
                            'success'
                        );
                        $('#pagamentoModal').modal('toggle');
                        detalhes($("#identificador").val());
                    }
                }
            });
        }
    }
    function updateMulta(){
        dados = new FormData();
        dados.append('pagamento', parseFloat($("#valorMulta").val()).toFixed(2));
        dados.append('forma', $("#formaPagamentoMulta option:selected").val());
        dados.append('motivo', $("#motivoMulta").val());
        dados.append('identidade', $("#identificador").val());
        dados.append('multa', 'true');
        $.ajax({
            url: '<?php echo base_url('updatePagamento');?>',
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
                if(data == true){
                    Swal.fire(
                        'Recebido!',
                        'Pagamento atualizado.',
                        'success'
                    );
                    $('#multaModal').modal('toggle');
                    detalhes($("#identificador").val());
                    $("#inputMultaAtraso").val('0');
                }
            }
        });
    }
</script>
<script>
    function dependente(){
        dados = new FormData();
        dados.append('cliente', $("#inputToken").val());
        $.ajax({
            url: '<?php echo base_url('buscaDependente');?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            //dataType: 'json',
            beforeSend: function(){
                $('#detalhesModal').modal('toggle');
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            success: function(data) {
                $('#inputTokenCliente').val($("#inputTokenLocacao").val());
                $("#dbody").html(data);
                $('#dependenteModal').modal('toggle');
            }
        });
    }
    function fechaDependentes(){
        $('#dependenteModal').modal('toggle');
        detalhes($("#inputTokenCliente").val());
    }
    function fechaNewDependentes(){
        $('#newDependenteModal').modal('toggle');
        detalhes($("#inputTokenCliente").val());
    }
    function updateDependente(){
        $('#dependenteModal').modal('toggle');
        $('#newDependenteModal').modal('toggle');
    }
    function newDependente(){
        dados = new FormData();
        dados.append('dpd_nome', $("#nomeDependente").val());
        dados.append('dpd_cpf', $("#cpfDependente").val());
        dados.append('dpd_fone', $("#foneDependente").val());
        dados.append('dpd_cep', $("#cepDependente").val());
        dados.append('dpd_num', $("#numDependente").val());
        dados.append('dpd_chave', $("#inputToken").val());
        $.ajax({
            url: '<?php echo base_url('dependentesNovo');?>',
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
                $('#newDependenteModal').modal('toggle');
                $('#dependenteModal').modal('toggle');
                dependente();                                    
            }
        });
    }
</script>
<script>
    function excluirpedido(id){
        Swal.fire({
            title: 'Confirma Altera????o?',
            text: "N??o ser?? poss??vel reverter esta a????o",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Cancelar!',
            cancelButtonText: 'Ignorar.',
        }).then((result) => {
            if (result.isConfirmed) {
                dados = new FormData();
                dados.append('id', id);
                $.ajax({
                    url: '<?php echo base_url('cancelLocacao');?>',
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
                        if(data == true){
                            Swal.fire(
                                'Atualizada!',
                                'Situa????o do traje atualizado.',
                                'success'
                            );
                            $('#detalhesModal').modal('toggle');
                            detalhes($("#identificador").val());
                        }
                    }
                });
            }
        });
    }
</script>