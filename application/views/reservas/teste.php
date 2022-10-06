

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('siteResource/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('siteResource/') ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa+One&family=DM+Sans:wght@400;500;700&family=Palanquin+Dark:wght@400;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <style>
        td, th, tr {
            border: hidden;
        }
    </style>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card border-dark">
                        <div class="card-body text-dark">
                            <div class="container">
                                <table class="table table-sm table-hover">
                                    <tbody>
                                        <?php for($aux = 0; $aux < 3; $aux++){ ?>
                                            <tr>
                                                <td class="col-md-2" style="height: 10rem;">
                                                    <a class="pop">
                                                        <img style="height: 10rem; width: 10rem" class="img-thumbnail rounded" src="https://cdn.shopify.com/s/files/1/2792/0884/products/product-image-819035331.jpg?v=1571755266" alt="">
                                                    </a>
                                                </td>
                                                <td class="col-md-1" style="height: 10rem;">
                                                    <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                                        <strong>Cod.</strong>
                                                    </div>
                                                    <div class="col-md-12 h-50 text-center">
                                                        <p><?= str_pad($aux+1 , 4 , '0' , STR_PAD_LEFT) ?></p>
                                                    </div>
                                                </td>
                                                <td class="col-md-3" style="height: 10rem;">
                                                    <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                                        <strong>Nome do Traje</strong>
                                                    </div>
                                                    <div class="col-md-12 h-50 text-center">
                                                        <p>Terno Viscose ABC</p>
                                                    </div>
                                                </td>
                                                <td class="col-md-2" style="height: 10rem;">
                                                    <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                                        <strong>Cor</strong>
                                                    </div>
                                                    <div class="col-md-12 h-50 text-center">
                                                        <p>PRETO</p>
                                                    </div>
                                                </td>
                                                <td class="col-md-2" style="height: 10rem;">
                                                    <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                                        <strong>Tamanho</strong>
                                                    </div>
                                                    <div class="col-md-12 h-50 text-center">
                                                        <p>41</p>
                                                    </div>
                                                </td>
                                                <td class="col-md-2" style="height: 10rem;">
                                                    <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                                        <strong></strong>
                                                    </div>
                                                    <div class="col-md-12 h-50 text-center">
                                                        <p>R$ 100,00</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row"  style="height: 7rem">
                        <div class="col-md-8 d-flex justify-content-end align-items-center">
                            <h2 class="text-danger">
                                TOTAL R$ 280,00
                            </h2>
                        </div>
                        <div class="col-md-4 d-flex justify-content-between align-items-center">
                            <h3>Desconto: R$ 30,00</h3> 
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card border-dark">
                            <div class="card-body text-dark">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="input-group">
                                            <label for="#entrada" class="input-group-text">Entrada: </label>
                                            <input type="text" name="entrada" id="entrada" class="form-control money">
                                        </div>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <div class="input-group">
                                            <label for="#restante" class="input-group-text">Restante: </label>
                                            <input type="text" name="restante" id="restante" class="form-control money">
                                        </div>
                                    </div>
                                    <div class="col-md-4  mb-3">
                                        <div class="input-group">
                                            <label for="#restante" class="input-group-text">Pagamento: </label>
                                            <select name="formapagamento" id="formapagamento" class="form-select">
                                                <option selected>Selecione uma forma de pagamento</option>
                                                <option value="1">Dinheiro</option>
                                                <option value="2">Débito</option>
                                                <option value="3">Crédito</option>
                                                <option value="4">Pix</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-end mt-4 mb-2">
                                        <button class="btn btn-danger btn-lg">Cancelar</button>
                                        <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalProsseguir">Prosseguir</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-md-12 text-end d-flex justify-content-end">
                    <label class="form-check-label mr-3" for="#imprimir">Imprimir contratos e termo</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" name="imprimir" id="imprimir" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" data-dismiss="modal">
            <div class="modal-content">              
                <div class="modal-body">
                    <img src="" class="imagepreview img-rounded" style="width: 100%;" >
                </div> 
            </div>
        </div>
    </div>

    <!-- Modal -->  
    <div class="modal" id="modalProsseguir" tabindex="-1" role="dialog" aria-labelledby="modalProsseguirLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title fs-16" id="modalProsseguirLabel">FINALIZAR LOCAÇÃO:</p>
            </div>
            <div class="modal-body">
                <p class="text-center text-danger"><b>TOTAL DA LOCAÇÃO R$ 280,00</b></p>

                <form action="">

                    <b>Pagamento Entrada:</b>
                    <div class="card p-2 mt-1 mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <p for="valorEntrada" style="margin:0;">Valor da Entrada:</p>
                                <div class="input-group">
                                    <label for="valorEntrada" class="input-group-text">R$</label>
                                    <input type="text" name="valorEntrada" id="valorEntrada" class="form-control">  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formaPagamento">Forma de pagamento:</label>
                                    <select class="form-control" name="formaPagamento" id="formaPagamento">
                                        <option class=""value="" selected disabled>Selecione</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>                


                    <b>Pagamento Restante:</b>
                    <div class="card p-2 mt-1">
                        <div class="row">
                            <div class="col-md-6">
                                <p for="valorEntrada" style="margin:0;">Valor da Entrada:</p>
                                <div class="input-group">
                                    <label for="valorEntradaRestante" class="input-group-text">R$</label>
                                    <input type="text" name="valorEntradaRestante" id="valorEntradaRestante" class="form-control">  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formaPagamentoRestante">Forma de pagamento:</label>
                                    <select class="form-control" name="formaPagamentoRestante" id="formaPagamentoRestante">
                                        <option value="" selected>Selecione</option>
                                        <option value="1">DUAS FORMAS DE PAGAMENTOS</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <p class="text-danger p-0 m-0">Restante a Pagar: R$ 120</p>
                            <div>
                                <button class="btn btn-success" id="parcialPaymentButton">Pagamento Parcial</button>
                            </div>
                        </div>
                    </div>          
                    
                    <!-- Duas Formas de pagamento -->
                    <div class="card p-2 mt-3 d-none" id="twoFormsPayment">
                        <p class="p-0 m-0 mb-1">Duas Formas de Pagamento:</p>
                        <div class="row">
                            <div class="col-md-6">
                                <p class="m-0 p-0">1ª Forma: </p>
                                <div class="input-group">
                                    <label for="primeiraForma" class="input-group-text">R$</label>
                                    <input type="text" name="primeiraForma" id="primeiraForma" class="form-control">  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pagamentoPrimeiraForma">Forma de pagamento:</label>
                                    <select class="form-control" name="pagamentoPrimeiraForma" id="pagamentoPrimeiraForma">
                                        <option class=""value="" selected disabled>Selecione</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6">
                                <p class="m-0 p-0">2ª Forma: </p>
                                <div class="input-group">
                                    <label for="segundaForma" class="input-group-text">R$</label>
                                    <input type="text" name="segundaForma" id="segundaForma" class="form-control">  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pagamentoSegundaForma">Forma de pagamento:</label>
                                    <select class="form-control" name="pagamentoSegundaForma" id="pagamentoSegundaForma">
                                        <option class=""value="" selected disabled>Selecione</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  Pagamento parcial -->
                    <div class="card p-2 mt-3" id="parcialPayment" style="display: none;">
                        <p class="p-0 m-0 mb-2">Pagamento Parcial: </p>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="pagamentoFormaParcial">Valor: </label>
                                <div class="input-group">
                                    <label for="pagamentoParcial" class="input-group-text">R$</label>
                                    <input type="text" name="pagamentoParcial" id="pagamentoParcial" class="form-control">  
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pagamentoFormaParcial">Forma de pagamento:</label>
                                    <select class="form-control" name="pagamentoFormaParcial" id="pagamentoFormaParcial">
                                        <option class=""value="" selected disabled>Selecione</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nomePagador">Nome Pagador: </label>
                                    <input type="text" class="form-control" name="nomePagador" id="nomePagador">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <p class="p-0 m-0 text-center text-danger">Restante a Pagar: R$ 120,00</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="col-md-12 ">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitch" onchange="dependente(this.value)">
                            <label class="form-check-label" for="flexSwitch">Finalizar c/ pagamento parcial </label>
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchTerms" onchange="dependente(this.value)">
                            <label class="form-check-label" for="flexSwitchTerms">Imprimir Termos e contratos</label>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-12 pr-4 pt-0 pb-4 d-flex justify-content-end" style="padding-right:15px;">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right:5px;">Cancelar</button>
                    <button type="button" class="btn btn-success">Prosseguir</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('siteResource/');?>plugins/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/jquery.inputmask.min.js" integrity="sha512-zdfH1XdRONkxXKLQxCI2Ak3c9wNymTiPh5cU4OsUavFDATDbUzLR+SYWWz0RkhDmBDT0gNSUe4xrQXx8D89JIQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-switch/1.3/bootstrapSwitch.min.js" integrity="sha512-DAc/LqVY2liDbikmJwUS1MSE3pIH0DFprKHZKPcJC7e3TtAOzT55gEMTleegwyuIWgCfOPOM8eLbbvFaG9F/cA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

        $('#formaPagamentoRestante').on('change', () => {
            const valueSelected = $('#formaPagamentoRestante').val();

            switch (valueSelected) {
                case '1':
                    $('#twoFormsPayment').removeClass('d-none');
                break;
                default:
                    $('#twoFormsPayment').addClass('d-none');
                break;
            }   
        });

        $('#parcialPaymentButton').on('click', (e) => {
            e.preventDefault();
            $('#parcialPayment').toggle();
        });
    </script>