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
                            <a type="button" href="<?php echo base_url('pendentes') ?>" class="btn btn-secondary" style="margin-right: 15px" title="Listar Pendência"><i class="fa fa-eye"></i></a>
                            <!-- <button type="button" class="btn btn-rounded btn-secondary filter-btn"><i class="fa fa-search me-2" aria-hidden="true"></i>Filtros</button> -->
                        </div>
                    </div>
                </div>
                <div class="c-card-body" style="display: block">
                    <div style="width: 100%">
                        <table id="reserva-list">
                            <thead>
                                <tr>
                                <th class="col"> Nº Locação</th>
                                    <th class="col"> Data</th>
                                    <th class="col"> Cliente</th>
                                    <th class="col"> CPF</th>
                                    <th class="col"> Telefone</th>
                                    <th class="col"> Periodo Locação</th>
                                    <th class="col"> Status</th>
                                    <th class="col"> Total</th>
                                    <th class="col-2"> Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($lista as $lst){?>
                                <tr>
                                    <td><?php echo $lst['alg_locnumero'];?></td>
                                    <td><?php echo $lst['alg_efetivado'];?></td>
                                    <td><?php echo Firstword($lst['cliente']) ;?></td>
                                    <td><?php echo $lst['cpf'];?></td>
                                    <td><?php echo $lst['telefone'];?></td>
                                    <td><?php echo $lst['periodo'];?></td>
                                    <td><?php echo $lst['alg_finalizado'];?></td>
                                    <td><?php echo $lst['alg_total'];?></td>
                                    <td>
        			                    <a style="color: #1b9045;" onclick="detalhes('<?php echo $lst['alg_chaveLocacao']; ?>')"  href="#"><i class="fa fa-eye fa-1x text-secondary" aria-hidden="true"></i></a>
        			                    <a style="color: #1b9045;" href="#" onclick="editaLocacao('<?php echo $lst['alg_chaveLocacao']; ?>')"><i style="padding-left: 12px;" class="fa fa-pencil fa-1x text-secondary" aria-hidden="true"></i></a>
        			                    <a style="color: #1b9045;" href="#" onclick="multa('<?php echo $lst['alg_chaveLocacao']; ?>')"><i style="padding-left: 12px;" class="fa fa-money fa-1x text-secondary" aria-hidden="true"></i></a>
                                        <?php if ($_SESSION["perfil"] == 7){?>
                                        <a style="color: #1b9045;" href="#" onclick="excluirpedido('<?php echo $lst['alg_chaveLocacao'] ?>')"><i style="padding-left: 12px;" class="fa fa-trash fa-1x text-secondary" aria-hidden="true"></i></a>
                                        <?php } ?>
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
    <div class="modal" id="detalhesModal" aria-hidden="true" aria-labelledby="detalhesModalLabel" data-bs-focus="false">
        <!-- #Adicionar essa class para deixar o modal no meio da tela: modal-dialog-centered  -->
        <div class="modal-dialog modal-dialog-centered modal-lg"> 
            <div class="modal-content">
                <div class="modal-header text-bg-secondary">
                    <p class="modal-title" id="exampleModalLabel">
                        Detalhes da Locação - 
                        <strong id="locacaoId"></strong>
                    </p>
                    <button type="button" class="btn-close" style="font-size: 25px;" data-bs-dismiss="modal" aria-label="Close"></button> <!-- &times -->
                </div>
                <input type="hidden" id="identificador" name="identificador">
                <div class="modal-body">
                    
                    <ul class="nav nav-tabs" id="nav-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" onclick="alterbutton(1)" href="#" id="nav-locacao-tab" data-bs-toggle="tab" data-bs-target="#nav-locacao" role="tab" aria-controls="nav-locacao" aria-selected="false">Locação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="alterbutton(0)" href="#" id="nav-cliente-tab" data-bs-toggle="tab" data-bs-target="#nav-cliente" role="tab" aria-controls="nav-cliente" aria-selected="true">Cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="alterbutton(2)" href="#" id="nav-pagamentos-tab" data-bs-toggle="tab" data-bs-target="#nav-pagamentos" role="tab" aria-controls="nav-pagamentos" aria-selected="false">Pagamentos</a>
                        </li>
                        <div class="col d-flex justify-content-end p-2">
                            <button type="button" id="btnfunction" class="btn btn-light"  onclick="alterLocacao()">
                                Editar Locação
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
                                            <option value='4'>Devolução</option>
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
                                    <label for="inputAddress" class="form-label ">Devolução:</label>
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
                                    <label for="inputAddress" class="form-label ">Endereço:</label>
                                    <input type="text" class="form-control" id="inputAddress" readonly>
                                </div>
                                <div class="col-2 form-group">
                                    <label for="inputNum" class="form-label ">Número:</label>
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
                                    <label for="inputAddress" class="form-label "> Locação: </label>
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
                    <p class="modal-title">Pagamento Parcial da Locação <b id="idLocacao"> </b></p>
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
                            <label for="depEnd" class="form-label">Endereço:</label>
                            <input type="text" class="form-control" id="depEnd" name="depEnd" readonly>
                        </div>
                        <div class="col-2 form-group">
                            <label for="numDependente" class="form-label">Número:</label>
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

                            <br><br>
                            <button type="submit" class="btn btn-primary" style="color: white">&nbsp&nbspConfirmar&nbsp&nbsp</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="multaModal" aria-labelledby="multaModalLabel" aria-hidden="true" data-bs-focus="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <p class="text-center text-light fw-bold">Multa Locação em atraso <b id="idLocacao"> </b></p>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    <input type="hidden" id="inputMultaAtraso" value="1">
                </div>
                <div class="modal-body">
                    <div class="p-2 mt-1">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class=""><strong>Valor do pagamento:</strong></label>
                                <div class="input-group">
                                    <label for="valorMulta" class="form-control" style="width:20%;" readonly>R$</label>
                                    <input type="text" name="valorMulta" id="valorMulta" class="form-control" style="width:80%;" data-mask="9999,99">
                                    <input type="hidden" name="identificador" id="identificador">
                                </div>
                            </div>
                            <div class="col-md-6 form-group">
                                <label class=""><strong>Forma de pagamento:</strong></label>
                                <select class="form-control form-select" name="formaPagamentoMulta" id="formaPagamentoMulta">
                                    <option selected disabled hidden>Selecione</option>
                                    <?php foreach($pagamentos as $pgm){ ?>
                                    <option value="<?php echo $pgm['id_forma'];?>"><?php echo $pgm['nome_forma'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                    </div>          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" onclick="fechaMulta()" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-success" onclick="updateMulta()">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
    
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>evo/evo-calendar/js/evo-calendar.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>


<script>
    function senha() {

        document.getElementById('btn_sim_senha').style.display = "none";
        document.getElementById('btn_cancela_senha').style.display = "none";

        $('#formsenha').show();

        $('#status_enviar').val($('#status_modal').val());
    }
    function novoPagamento(){
            $('#pagamentoModal').modal('toggle');
             $('#detalhesModal').modal('toggle');
        }
        function fechaMulta(){
            $('#detalhesModal').modal('toggle');
            $('#multaModal').modal('toggle');
        }
        function multaAdd(){
            //if($("#inputMultaAtraso").val() == 1){
                $('#multaModal').modal('toggle');
                $('#detalhesModal').modal('toggle');
            /*}else{
                Swal.fire({
                    title: 'Multa já lançada',
                    text: "Finalize a locação!",
                    icon: 'warning',
                });
            }*/
        }

        function comprovante(){
            
            var height = 500;
            var width  = 600;
            var top = parseInt((screen.availHeight) - height - 100);
            var left = parseInt((screen.availWidth) - (width / 2));
            var features = "location=1, status=1, scrollbars=1, width=" + width + ", height=" + height + ", top=" + top + ", left=" + left;
            window.open("<?php echo base_url('/impressoes/geraCupom?chave=');?>"+$("#identificador").val(), 'Comprovante', features);
        }

    function alterStatus(){
            if($("#inputMultaAtraso").val() == 1){
                Swal.fire({
                    title: 'Locação em atraso!',
                    text: "Necessário preencher juros/multa",
                    icon: 'warning',
                });
            }else{
                Swal.fire({
                    title: 'Confirma Alteração?',
                    text: "Não será possível reverter esta ação",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Sim!',
                    cancelButtonText: 'Não.',
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
                                                        'Situação da locação atualizado.',
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
                                            'Situação da locação atualizado.',
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
        }
</script>
<script>
    function multa(id){
        $("#identificador").val(id);
        if($("#inputMultaAtraso").val() == 1){
                $('#multaModal').modal('toggle');
            }else{
                Swal.fire({
                    title: 'Multa já lançada',
                    text: "Finalize a locação!",
                    icon: 'warning',
                });
            }
    }
    function updateMulta(){
        dados = new FormData();
        dados.append('pagamento', parseFloat($("#valorMulta").val()).toFixed(2));
        dados.append('forma', $("#formaPagamentoMulta option:selected").val());
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
                   // detalhes($("#identificador").val());
                    $("#inputMultaAtraso").val('0');
                }
            }
        });
        }
</script>
<script>
    function excluirpedido(id) {

        $("#idreserva").val(id);
        $('#modalExcluir').modal('show');

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
    function alterbutton(id){
            if(id == 0){
                $("#btnfunction").attr('onclick', 'dependente()');
                $("#btnfunction").html('Dependentes');
                $("#btnfunction").show();
            }else if(id == 1){
                $("#btnfunction").attr('onclick', 'alterLocacao()');
                $("#btnfunction").html('Editar Locação');
                $("#btnfunction").show();
            }else if (id == 2){
                $("#btnfunction").hide();
            }
        }
        function updatePagamento(){
            var aux = parseFloat($("#auxRestante").val().substring(3)).toFixed(2);
            if( parseFloat(aux) < parseFloat($("#valorRestante").val()).toFixed(2)  ){
                Swal.fire(
                    'Ops!',
                    'Pagamento acima do valor nescessário para liquidação.',
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
        
        /*function updateDependente(){
            $('#dependenteModal').modal('toggle');
            (async () => {
            
                const { value: formValues } = await Swal.fire({
                    title: 'Novo dependente',
                    confirmButtonText: 'Adicionar',
                    html:
                        "<div class='form-group text-left'>"+
                            '<label for="swal-input1" class="form-label">Nome</label>'+
                            '<input id="swal-input1" class="form-control nome" placeholder="Nome" required>' +
                        "</div>"+
                        "<div class='form-group text-left'>"+
                            '<label for="swal-input2" class="form-label">CPF</label>'+
                            '<input id="swal-input2" class="form-control cpf" placeholder="CPF">' +
                        "</div>"+
                        "<div class='form-group text-left'>"+
                            '<label for="swal-input3" class="form-label">Telefone</label>'+
                            '<input id="swal-input3" class="form-control telefone" placeholder="Fone">'+
                        "</div>"+
                        "<div class='form-group text-left'>"+
                            '<label for="swal-input4" class="form-label">CEP</label>'+
                            '<input id="swal-input4" class="form-control cep" placeholder="Cep">'+
                        "</div>"+
                        "<div class='form-group text-left'>"+
                            '<label for="swal-input5" class="form-label">Número da Residência</label>'+
                            '<input id="swal-input5" class="form-control numero" placeholder="Número">'+
                        "</div>",
                    focusConfirm: false,
                    preConfirm: () => {
                        if ($('#swal-input1').val().trim().length < 5)    {
                            Swal.showValidationMessage("Nome inválido, entre com pelo menos o nome do dependente.");   
                            return; 
                        }

                        if ($('#swal-input2').val().trim().length > 0)    {
                            if(ValidaCPF($('#swal-input2').val()) == false){
                                Swal.showValidationMessage("CPF inválido, digite novamente.");   
                                return;
                            }                             
                        }

                        if ($('#swal-input3').val().trim().length > 0)    {
                            if(isValidPhone($('#swal-input3').val()) == false){
                                Swal.showValidationMessage("Telefone inválido, digite novamente.");   
                                return;
                            }                             
                        }
                        dados = new FormData();
                        dados.append('dpd_nome', document.getElementById('swal-input1').value);
                        dados.append('dpd_cpf', document.getElementById('swal-input2').value);
                        dados.append('dpd_fone', document.getElementById('swal-input3').value);
                        dados.append('dpd_cep', document.getElementById('swal-input4').value);
                        dados.append('dpd_num', document.getElementById('swal-input5').value);
                        dados.append('dpd_chave', $("#inputToken").val());
                        $.ajax({
                            url: '<?php echo base_url('dependentesNovo');?>',
                            method: 'post',
                            data: dados,
                            processData: false,
                            contentType: false,
                            //dataType: 'json',
                            // beforeSend: function(){
                            //     $('#detalhesModal').modal('toggle');
                            // },
                            error: function(xhr, status, error) {
                                console.log(xhr);
                                console.log(status);
                                console.log(error);
                            },
                            success: function(data) {
                                $('#dependenteModal').modal('toggle');
                                dependente();                                    
                            }
                        });
                    },
                    onOpen: function(el) {
                        var container = $(el);
                        container.find('.telefone').mask(SPMaskBehavior, spOptions);
                        container.find('.cpf').mask('000.000.000-00');
                        container.find('.nome').mask("#", {
                            maxlength: false,
                            translation: {
                                "#": { pattern: /[A-zÀ-ÿ\s]/, recursive: true },
                            },
                        });
                    }
                });
            })();
        }*/
        
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
                    
                    //dados Locação/trajes
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
                    //Fim dados Locação/trajes
                    
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
</script>
<script>
    function editaLocacao(id){
        var form = document.createElement("form");
        var element1 = document.createElement("input"); 
        
        form.method = "POST";
        form.action = "<?php echo base_url('alteraReserva');?>";   
    
        element1.value = id;
        element1.name  = "reserva";
        form.appendChild(element1);  
    
        document.body.appendChild(form);
        form.submit();
    }
</script>
<script>
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
    
    $(document).ready(function () {
        // $('#reserva-list').DataTable({
        //     language: {
        //         url: '//cdn.datatables.net/plug-ins/1.12.1/i18n/pt-BR.json'
        //     }
        // });  
        
        var reservaList = $('#reserva-list').DataTable({
            paging: true,
            info: true, 
            searching: true,
            dom: '<"top"f>rt<"bottom d-flex justify-content-between align-items-center"lip><"clear">',
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