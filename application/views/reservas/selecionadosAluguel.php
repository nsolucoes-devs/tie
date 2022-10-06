<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-dark">
                <div class="card-body text-dark" style="overflow-y: auto; height: 75vh;">
                    <table class="table table-sm table-hover">
                        <tbody>
                            <?php $lista=""; $total = 0; $aux = 1; foreach($lisTraje as $ltj){ ?>
                                <tr>
                                    <td class="col-md-2" style="height: 10rem;">
                                        <div class="align-items-center d-flex h-100 justify-content-center">
                                            <a class="pop">
                                                <img class="img-thumbnail rounded" src="<?php echo $ltj['produto_imagens_opcional1'];?>" alt="">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="col-md-1" style="height: 10rem;">
                                        <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                            <strong>Cod.</strong>
                                        </div>
                                        <div class="col-md-12 h-50 text-center">
                                            <p><?php echo str_pad($aux , 4 , '0' , STR_PAD_LEFT) ?></p>
                                            <?php $aux++; ?>
                                        </div>
                                    </td>
                                    <td class="col-md-3" style="height: 10rem;">
                                        <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                            <strong>Nome do Traje</strong>
                                        </div>
                                        <div class="col-md-12 h-50 text-center">
                                            <p class="text-concat"><?php echo $ltj['produto_nome'] ?></p>
                                        </div>
                                    </td>
                                    <td class="col-md-2" style="height: 10rem;">
                                        <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                            <strong>Cor</strong>
                                        </div>
                                        <div class="col-md-12 h-50 text-center">
                                            <p><?php echo $ltj['produto_cores'];?></p>
                                        </div>
                                    </td>
                                    <td class="col-md-2" style="height: 10rem;">
                                        <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                            <strong>Tamanho</strong>
                                        </div>
                                        <div class="col-md-12 h-50 text-center">
                                            <p><?php echo $ltj['produto_tamanhos'];?></p>
                                        </div>
                                    </td>
                                    <td class="col-md-2" style="height: 10rem;">
                                        <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                            <strong>Valor</strong>
                                        </div>
                                        <div class="col-md-12 h-50 text-center">
                                            <p>R$ <?php echo $ltj['produto_valor'] ?></p>
                                            <?php $total = (float)$total + (float)$ltj['produto_valor'];?>
                                        </div>
                                    </td>
                                    <td class="col-md-2" style="height: 10rem;">
                                        <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                            <strong></strong>
                                        </div>
                                        <div class="col-md-12 h-50 text-center">
                                            <button type="button" class="btn btn-danger" onclick="remove(<?php echo $ltj['produto_id'];?>)"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td class="text-danger" colspan="6">
                                        RESERVA: <?php echo $ltj['locador'] ?>
                                    </td>
                                </tr>
                            <?php if(empty($lista) == true){ $lista .= $ltj['produto_id'];}else{ $lista .= ",".$ltj['produto_id'];} } ?>
                        </tbody>
                    </table>
                    <input type="hidden" id="arrayTrajes" name="arrayTrajes" value="<?php echo $lista ?>">
                    <input type="hidden" id="totalValue" name="totalValue" value="<?php echo $total ?>">
                </div>
            </div>
        </div>
        <div class="col-md-12 d-flex justify-content-end">
            <div>
                <button class="btn-lg btn btn-warning" onclick="retornaData();">Voltar</button>
                <button class="btn-lg btn btn-primary" onclick="finalizaAluguel();">Próximo</button>
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
            <p class="text-center text-danger"><b>TOTAL DA LOCAÇÃO R$ <?php echo number_format($total, 2, ',', ' '); ?></b></p>

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
                        <p class="text-danger p-0 m-0">Restante a Pagar: R$ 120,00</p>
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

<div class="modal" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" data-dismiss="modal">
        <div class="modal-content">              
            <div class="modal-body">
                <img src="" class="imagepreview img-rounded" style="width: 100%;" >
            </div> 
        </div>
    </div>
</div>

<script>
    $( document ).ready(function() {
        $('.pop').on('click', function() {
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $('#imagemodal').modal('show');   
        });     
    });

    function remove(id){
        dados = new FormData();
        dados.append('chaveLocacao', $('#chaveLocacao').val());
        dados.append('locador', $('#clienteLocador').val());
        dados.append('retirada', $('#dataIni').val());
        dados.append('devolucao', $('#dataFim').val());
        dados.append('trajes', $('#arrayTrajes').val());
        dados.append('remove', id);
        
        $.ajax({
            url: '<?php echo base_url('finalRemoveAluguel'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            //dataType: 'json',
            beforeSend: function(){
                
            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            success: function(data) {
                $("#tituloHead").text("");
                $("#tituloHead").text("Finalizar Aluguel:");
                
                $("#listagemTrajes").empty();
                $("#listagemTrajes").html(data);
                
            }
        });
        
    }
        
    function removeItemOnce(arr, value) {
        var index = arr.indexOf(value);
        if (index > -1) {
            arr.splice(index, 1);
        }
        return arr;
    }

</script>
    


