    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('siteResource/');?>evo/evo-calendar/css/evo-calendar.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('siteResource/');?>evo/evo-calendar/css/evo-calendar.orange-coral.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('siteResource/');?>evo/evo-calendar/css/evo-calendar.midnight-blue.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('siteResource/');?>evo/evo-calendar/css/evo-calendar.royal-navy.min.css">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Mono&display=swap" rel="stylesheet">
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    
    <!-- CSS only -->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

    <style>
        :root{
            --color: 198;
            --defalt-color: hsl(var(--color), 0%, 15%);
            --second-color: hsl(var(--color), 25%, 25%);

            --third-color: hsl(142, 68%, 34%);
            --light-color: hsl(44, 100%, 94%);

            --white-color: hsl(100, 100%, 100%);
        }

        .royal-navy .calendar-sidebar {
            background-color: var(--defalt-color);
            -webkit-box-shadow: 5px 0 18px -3px var(--defalt-color);
            box-shadow: 5px 0 18px -3px var(--defalt-color)
        }

        .royal-navy .calendar-sidebar>.month-list::-webkit-scrollbar-thumb:hover {
            background: var(--light-color)
        }

        .royal-navy .calendar-sidebar>.month-list>.calendar-months>li:hover {
            background-color: rgba(0, 0, 0, .2)
        }

        .royal-navy .calendar-sidebar>.month-list>.calendar-months>li.active-month {
            background-color: rgba(0, 0, 0, .35)
        }

        .royal-navy .calendar-sidebar>span#sidebarToggler {
            background-color: var(--third-color);
            -webkit-box-shadow: 0 5px 10px -3px var(--third-color);
            box-shadow: 0 5px 10px -3px var(--third-color);
        }
        .royal-navy .calendar-inner {
            color: var(--second-color)
        }

        .royal-navy th[colspan="7"] {
            color: var(--defalt-color)
        }

        .royal-navy th[colspan="7"]::after {
            background-color: rgba(33, 101, 131, .15)
        }

        .royal-navy tr.calendar-body .calendar-day .day:hover {
            background-color: rgba(48, 152, 197, .25);
            color: var(--second-color)
        }

        .royal-navy tr.calendar-body .calendar-day .day.calendar-active,
        .royal-navy tr.calendar-body .calendar-day .day.calendar-active:hover {
            border-color: var(--second-color)
        }

        .royal-navy tr.calendar-body .calendar-day .day.calendar-today {
            background-color: var(--defalt-color);
            color: var(--white-color);
            -webkit-box-shadow: 0 5px 10px -3px var(--defalt-color);
            box-shadow: 0 5px 10px -3px var(--defalt-color)
        }

        .royal-navy #eventListToggler {
            background-color: var(--third-color);
            -webkit-box-shadow: 0 5px 10px -3px var(--third-color);
            box-shadow: 0 5px 10px -3px var(--third-color);
        }

        .royal-navy .calendar-events {
            background-color: var(--defalt-color);
            color: var(--white-color)
        }

        .royal-navy .calendar-events::-webkit-scrollbar-thumb {
            background: var(--white-color);
        }

        .royal-navy .calendar-events::-webkit-scrollbar-thumb:hover {
            background: var(--light-color)
        }

        .royal-navy .calendar-events>.event-header>p {
            border-bottom: 1px solid var(--white-color);
            color: var(--white-color)
        }

        .royal-navy .event-container:hover {
            background-color: var(--white-color)
        }

        .royal-navy .event-container>.event-info>p {
            color: var(--white-color)
        }

        .royal-navy .event-container:hover>.event-info>p {
            color: var(--second-color)
        }

        .royal-navy .event-container>.event-info>p.event-title>span {
            color: var(--white-color);
            border: 1px solid var(--second-color);
            background-color: rgb(22 66 85)
        }

        .royal-navy .event-list>.event-empty {
            background-color: rgba(255, 255, 255, .15);
            border: 1px solid var(--white-color)
        }

        .royal-navy .event-list>.event-empty>p {
            color: var(--white-color)
        }

        @media screen and (max-width:768px) {

            .royal-navy .calendar-inner::after {
                background-color: rgba(44, 81, 97, .5)
            }

            .royal-navy .calendar-events {
                -webkit-box-shadow: -5px 0 18px -3px var(--defalt-color);
                box-shadow: -5px 0 18px -3px var(--defalt-color)
            }
        }

        @media screen and (max-width:425px) {
            .royal-navy .calendar-sidebar>.calendar-year {
                background-color: var(--defalt-color);
                -webkit-box-shadow: 0 5px 8px -3px rgba(12, 37, 47, .65);
                box-shadow: 0 5px 8px -3px rgba(12, 37, 47, .65)
            }            
        }

        .event-container>.event-info>p.event-title {
            font-size: 20px;
            font-weight: 400;
        }

        #demoEvoCalendar, .calendar-inner {
            min-height: calc(100vh - 170px);
        }

        .site-footer {
            height: 70px;
        }

        .nav-item .nav-link, .nav-link:hover {
            font-weight: 600;
            font-size: large;
            color: hsl(0 0% 50%);
        }

        .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link, .nav-tabs {
            border-radius: 10px 10px 0 0;
            border: 0;
        }

        .nav-item .nav-link.active {
            color: hsl(0 0% 25%);
        }
        
        tfoot tr, tfoot td {
            border-bottom: 0;
        }
        
        thead th {
            font-weight: 700;
            font-family: 'Open Sans',sans-serif;
            text-transform: uppercase;
        }
        
        .form-group label {
            font-weight: bold;
        }
        
        .form-label {
            margin-bottom: 1.5rem;
        }
        
        .modal-header {
            font-size: 2rem;
        }
        .modal-body {
            font-size: 1.5rem;
        }
    </style>

   

    <section id="demos" class="h-100" style="padding-top: 100px;">
        <div class="section-content">
            <div class="console-log">
                <div class="log-content">
                    <div class="shadow" id="demoEvoCalendar"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    
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
                            <a class="nav-link active" onclick="alterbutton(1)" href="nav-locacao" id="nav-locacao-tab" data-bs-toggle="tab" data-bs-target="#nav-locacao" role="tab" aria-controls="nav-locacao" aria-selected="false">Locação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="alterbutton(0)" href="nav-cliente" id="nav-cliente-tab" data-bs-toggle="tab" data-bs-target="#nav-cliente" role="tab" aria-controls="nav-cliente" aria-selected="true">Cliente</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onclick="alterbutton(2)" href="nav-pagamentos" id="nav-pagamentos-tab" data-bs-toggle="tab" data-bs-target="#nav-pagamentos" role="tab" aria-controls="nav-pagamentos" aria-selected="false">Pagamentos</a>
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
    
    <div class="modal" id="multaModal" aria-labelledby="multaModalLabel" aria-hidden="true" data-bs-focus="false">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header text-bg-secondary">
                    <p class="modal-title">Pagamento de Multa da Locação em atraso <b id="idLocacao"> </b></p>
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
    
    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>evo/evo-calendar/js/evo-calendar.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script>
        var defaultTheme = 'Midnight Blue';
        var today = new Date();
        var week_date = [];
        function getWeeksInMonth(a, b) {
            var c = [], d = new Date(b, a, 1), e = new Date(b, a + 1, 0), f = e.getDate();
            var g = 1;
            var h = 7 - d.getDay();
            while (g <= f) {
                c.push({
                    start: g,
                    end: h
                });
                g = h + 1;
                h += 7;
                if (h > f) h = f;
            }
            return c;
        }
        week_date = getWeeksInMonth(today.getMonth(), today.getFullYear())[2];
        $(document).ready(function() {
            $("#demoEvoCalendar").evoCalendar({
                language: "pt",
                theme: 'Royal Navy',
                format: "dd MM, yyyy",
                eventHeaderFormat: "dd MM yyyy",
                titleFormat: "MM",
                todayHighlight: 'true',
                calendarEvents: [
                  <?php foreach($evento as $evo){?>
                  {
                    id: '<?php echo $evo['id'];?>',
                    name: '<?php echo $evo['name'];?>',
                    date: '<?php echo $evo['date'];?>',
                    type: '<?php echo $evo['type'];?>',
                    everyYear: '<?php echo $evo['everyYear'];?>',
                    badge: '<?php echo $evo['badge'];?>',
                    color: '<?php echo $evo['color'];?>',
                    
                  },
                  <?php }?>
                ]
            });
        });
    </script>
    <script>

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
        
        function comprovante(){
            
            var height = 500;
            var width  = 600;
            var top = parseInt((screen.availHeight) - height - 100);
            var left = parseInt((screen.availWidth) - (width / 2));
            var features = "location=1, status=1, scrollbars=1, width=" + width + ", height=" + height + ", top=" + top + ", left=" + left;
            window.open("<?php echo base_url('/impressoes/geraCupom?chave=');?>"+$("#identificador").val(), 'Comprovante', features);
        }
    </script>    
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
        function mudaStatus(id){
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
                                                    'Situação do traje atualizado.',
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
                                        'Situação do traje atualizado.',
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
            /*if($("#inputMultaAtraso").val() == 1){
                Swal.fire({
                    title: 'Locação em atraso!',
                    text: "Necessário preencher juros/multa",
                    icon: 'warning',
                });*/
            //}else{
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
            //}
        }
    </script>
    <script>
        function novoPagamento(){
            $('#pagamentoModal').modal('toggle');
            $('#detalhesModal').modal('toggle');
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
        
    </script>
    <script>
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

        var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function(val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('.telefone').mask(SPMaskBehavior, spOptions);
        $('.cpf').mask('000.000.000-00');

        function ValidaCPF(cpf){	
            var RegraValida = cpf; 
            var cpfValido = /^(([0-9]{3}.[0-9]{3}.[0-9]{3}-[0-9]{2})|([0-9]{11}))$/;	 
            if (cpfValido.test(RegraValida) == true)	{ 
                return true;	
            } else	{	 
               return false;	
            }
        }

        function isValidPhone(phone) {
            const sanitizedPhone = phone.replace(/\D/g,'');
            return sanitizedPhone.length >= 10 && sanitizedPhone.length <= 11;
        };


    </script>
    <script>
        function verifyVal(){
            
        }
    </script>
<script>
    
    function limpa_formulário_cep() {
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
            limpa_formulário_cep();
            alert("CEP não encontrado.");
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
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        }
        else {
            limpa_formulário_cep();
        }
    };

    </script>