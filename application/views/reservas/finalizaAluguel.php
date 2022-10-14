<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="row">
    <div class="col-md-12 mx-auto my-2" style="overflow-y: auto;">
        <p style="font-size: 17px; font-weight: bold; margin-top: 16px">Itens selecionados:</p>
        <div class="content-card" style="max-height: 30rem;">
            <table class="table table-sm table-hover" style="border-radius: 16px">
                <tbody>
                    <?php $lista=""; $total = 0; $aux = 1; foreach($lisTraje as $ltj){ ?>
                        <tr>
                            <td class="col-md-1" style="height: 10rem;">
                                <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                    <strong>#</strong>
                                </div>
                                <div class="col-md-12 h-50 text-center">
                                    <p><?php echo str_pad($aux , 2 , '0' , STR_PAD_LEFT) ?></p>
                                </div>
                            </td>
                            <td class="col-md-1" style="height: 10rem;">
                                <div class="align-items-center d-flex h-100 justify-content-center">
                                    <a class="pop">
                                        <img class="img-thumbnail rounded" src="<?php echo $ltj['produto_imagens_opcional1'];?>" alt="">
                                    </a>
                                </div>
                            </td>
                            <td class="col-md-2" style="height: 10rem;">
                                <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                    <strong>Cod.</strong>
                                </div>
                                <div class="col-md-12 h-50 text-center">
                                    <p><?php echo $ltj['produto_codigo'] ?></p>
                                    <?php $aux++; ?>
                                </div>
                            </td>
                            <td class="col-md-4" style="height: 10rem;">
                                <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                    <strong>Nome do Traje</strong>
                                </div>
                                <div class="col-md-12 h-50 text-center">
                                    <p class="text-concat"><?php echo limita_caracteres(Firstword($ltj['produto_nome']), 50, true)  ?></p>
                                </div>
                            </td>
                            <td class="col-md-1" style="height: 10rem;">
                                <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                    <strong>Cor</strong>
                                </div>
                                <div class="col-md-12 h-50 text-center">
                                    <p><?php echo $ltj['produto_cores'];?></p>
                                </div>
                            </td>
                            <td class="col-md-1" style="height: 10rem;">
                                <div class="align-items-center col-md-12 d-flex h-50 justify-content-center text-center">
                                    <strong>Tam.</strong>
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
                                    <p><?php echo $ltj['produto_valor'] ?></p>
                                    <?php $total = (float)$total + (float)$ltj['produto_valor'];?>
                                </div>
                            </td>
                        </tr>
                    <?php if(empty($lista) == true){ $lista .= $ltj['produto_id'];}else{ $lista .= ",".$ltj['produto_id'];} } ?>
                </tbody>
            </table>
        </div>
        <input type="hidden" id="arrayTrajes" name="arrayTrajes" value="<?php echo $lista ?>">
        <input type="hidden" id="totalValue" name="totalValue" value="<?php echo $total ?>">
    </div>
    <div class="row d-flex flex-column justify-items-end py-2 px-0">
        <div class="align-content-around d-flex flex-wrap h-100 justify-content-between align-items-end">
            <button class="btn bnt-link" onclick="retornaTrajes()"><i class="fa fa-arrow-left"></i> Voltar</button>

            <div>
                <h2 class="text-right text-danger mt-5 w-100">
                    <b>
                        TOTAL DA LOCAÇÃO R$ <?php echo number_format($total, 2, ',', ' '); ?>
                    </b>
                </h2>
                <div class="col-md-12 d-flex flex-column mt-4 px-0">
                    <div class="col-md-12 d-flex justify-content-end px-0">
                        <!--<button class="btn btn-warning mr-2 p-3" onclick="retornaTrajes()">Anterior</button>-->
                        <button class="btn btn-danger mr-3 px-4" style="font-size: 15px;" onclick="window.location.replace('<?php echo base_url('reservas');?>')">Cancelar</button>
                        <button class="btn btn-success px-4" style="font-size: 15px;" onclick="modalFinal()">Prosseguir</button>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end mt-3 px-0">
                        <a class="btn" href="#" onclick="naoFinal()"><small>Salvar sem finalizar</small></a>
                    </div>
                </div>
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
            <p class="text-center text-danger" style="font-size: 15px;"><b>TOTAL DA LOCAÇÃO R$ <?php echo number_format($total, 2, ',', ' '); ?></b></p>

                <b>Entrada:</b>
                <div class="card p-2 mt-1 mb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="formaPagamento">Forma de pagamento:</label>
                                <select class="form-control" name="formaPagamento" id="formaPagamento" onchange="observador()">
                                    <option value="null" selected disabled>Selecione</option>
                                    <?php foreach($listaPG as $pgm){ ?>
                                        <option value="<?php echo $pgm['id_forma'];?>"><?php echo $pgm['nome_forma'];?></option>    
                                    <?php }?>
                                        <option value="-1">Duas Formas</option>    
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="valorEntrada" style="margin:0;">Valor:</label>
                            <div class="input-group">
                                <label for="valorEntrada" class="input-group-text">R$</label>
                                <input type="text" name="valorEntrada1" id="valorEntrada1" class="form-control money" onfocusout="calculaResto()" value="0,00" >  
                            </div>
                        </div>
                        <div class="col-md-6" id="entrada1" style="display:none">
                            <div class="form-group">
                                <label for="formaPagamento1">1ª Forma de pagamento:</label>
                                <select class="form-control" name="formaPagamento1" id="formaPagamento1">
                                    <option value="null" selected disabled>Selecione</option>
                                    <?php foreach($listaPG as $pgm){ ?>
                                        <option value="<?php echo $pgm['id_forma'];?>"><?php echo $pgm['nome_forma'];?></option>    
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="duplaEntrada" style="display:none">
                            <label for="valorEntrada2" style="margin:0;">Valor:</label>
                            <div class="input-group">
                                <label for="valorEntrada2" class="input-group-text">R$</label>
                                <input type="text" name="valorEntrada2" id="valorEntrada2" class="form-control money" onfocusout="calculaResto()" value="0,00" >  
                            </div>
                        </div>
                        <div class="col-md-6" id="entrada2" style="display:none">
                            <div class="form-group">
                                <label for="formaPagamento2">2ª Forma de pagamento:</label>
                                <select class="form-control" name="formaPagamento2" id="formaPagamento2">
                                    <option value="null" selected disabled>Selecione</option>
                                    <?php foreach($listaPG as $pgm){ ?>
                                        <option value="<?php echo $pgm['id_forma'];?>"><?php echo $pgm['nome_forma'];?></option>    
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div style="text-align:-webkit-right;">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <div id="labelDesconto" class="form-group" style="display:none">
                                <label for="valorDesconto" style="margin:0;">Desconto:</label> 
                                <div class="input-group">
                                   <label for="valorDesconto" class="input-group-text">R$</label>
                                    <input type="text" name="valorDesconto" id="valorDesconto" class="form-control money" onfocusout="calculaResto()" value="0,00" >  
                                </div>
                            </div>
                            <button type="button" class="btn btn-light" id="buttonDesconto" onclick="desconto()">
                                Desconto <i class="fa fa-money"></i>
                            </button>
                        </div>
                    </div>
                </div>                
                

                <b></b>
                <div class="card p-2 mt-1">
                    <div class="row">
                        <div class="col-md-6" id="PagTot" style="display:none">
                            <p for="valorRestante" style="margin:0;">Pagamento Realizado:</p>
                            <div class="input-group">
                                <label for="valorRestante" class="input-group-text">R$</label>
                                <input type="text" name="valorPago" id="valorPago" class="form-control" readonly>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <p for="valorRestante" style="margin:0;">Valor Remanescente:</p>
                            <div class="input-group">
                                <label for="valorRestante" class="input-group-text">R$</label>
                                <input type="text" name="valorRestante" id="valorRestante" class="form-control" readonly>  
                            </div>
                        </div>

                    <div class="d-flex align-items-center justify-content-between mt-2">
                        <p class="text-danger p-0 m-0">Restante a Pagar: R$ <label id="restanteValor"><?php echo number_format($total, 2, ',', ' '); ?></label></p>
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
        </div>
        <div class="modal-footer">
            <div class="col-md-12 ">
                    <!-- <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitch">
                        <label class="form-check-label" for="flexSwitch">Finalizar c/ pagamento parcial </label>
                    </div>-->

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="contrato">
                        <label class="form-check-label" for="flexSwitchTerms">Imprimir Termos e contratos</label>
                    </div>
                </div>
            </div>
            
            <div class="col-md-12 pr-4 pt-0 pb-4 d-flex justify-content-end" style="padding-right:15px;">
                <button type="button" class="btn btn-danger" onclick="$('#modalProsseguir').modal('toggle');" style="margin-right:5px;">Cancelar</button>
                <button type="button" class="btn btn-secondary" onclick="fechaOrcamento()">Concluir Orçamento</button>&nbsp&nbsp
                <button type="button" class="btn btn-success" onclick="fechaAluguel()">Concluir Locação</button>                
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

<script type="text/javascript" src="<?php echo base_url('resources/') ?>js/jquery_mask/dist/jquery.mask.min.js"></script>
        
<script>
    $( document ).ready(function() {
        $('.pop').on('click', function() {
            $('.imagepreview').attr('src', $(this).find('img').attr('src'));
            $('#imagemodal').modal('show');   
        });     
        
        $('.money').mask("#.##0,00", {reverse: true});
        
        <?php if($locacao > 0){?>
            $("#valorPago").val('<?php echo $locacao;?>');
            $("#PagTot").show();
            calculaResto();
        <?php }?>
        
    });

    function remove(id){
        dados = new FormData();
        dados.append('chaveCliente', $('#clienteChaveUnica').val());
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
    
    function descVal(){
        var desconto = $("#desconto").val();
        var total = <?php echo $total;?>;
        var a = parseFloat(total) - parseFloat(desconto);
        $("#valorDesconto").val(a);
        $("#descVal").html("");
        $("#descVal").html(desconto);
        
    }
    
    function calculaAluguel(){
        var desconto = $("#desconto").val();
        var total = $("#totalValue").val();
        var a = total - desconto;
        var b = a - $("#entrada").val();
        $("#restante").val(parseFloat(b));
    }
</script>

<script>
    function calculaResto(){
        <?php if($locacao > 0){?>
            var total = <?php echo $total - $locacao;?>;
        <?php }else{?>
        var total = <?php echo $total;?>;
        <?php }?>
        var entra1 = $("#valorEntrada1").val();
        var entra2 = $("#valorEntrada2").val();
        
        var valor = parseFloat(total) - (parseFloat(entra1) + parseFloat(entra2));
        var desco = $("#valorDesconto").val();
        var valor = parseFloat(valor) - parseFloat(desco);
        $("#valorRestante").val(parseFloat(valor).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));
        $("#restanteValor").html("");
        $("#restanteValor").html(parseFloat(valor).toLocaleString("pt-BR", { style: "currency" , currency:"BRL"}));
    }
    
    function mascara(){
        $("#valorEntrada").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
    }
        
</script>

<script>
    function fechaAluguel() {
        calculaResto();
        if(parseFloat($('#valorEntrada1').val()).toFixed(2)  > $('#valorRestante').val() ){
            Swal.fire(
                'Ops!',
                'Pagamento acima do valor nescessário para liquidação.',
                'error'
            );
        }else{
            var flag = 0;
            var contrato = false;
            if ($("#contrato").is(':checked')) {
                switchStatus = $("#contrato").is(':checked');
                contrato = true;
            }
            let chave = $('#chaveLocacao').val();
            dados = new FormData();
            dados.append('chaveCliente', $('#clienteChaveUnica').val());
            dados.append('chaveLocacao', $('#chaveLocacao').val());
            dados.append('resto', $('#valorRestante').val());
            dados.append('desconto', $('#valorDesconto').val());
            dados.append('retirada', $('#dataIni').val());
            dados.append('devolucao', $('#dataFim').val());
            dados.append('atendente', $('#nomeAtendente option:selected').val());
            
            if($("#formaPagamento option:selected").val() === "null"){
              flag = 1;   
            }
            
            if($("#formaPagamento option:selected").val() != "-1"){
                dados.append('entrada', $('#valorEntrada1').val());
                dados.append('formaEntrada', $('#formaPagamento').val());
            }else{
                if($("#formaPagamento1 option:selected").val() === "null"){
                    flag = 1;   
                }
                if($("#formaPagamento2 option:selected").val() === "null"){
                    flag = 1;   
                }
                dados.append('entrada', $('#valorEntrada1').val());
                dados.append('formaEntrada', $('#formaPagamento1').val());
                dados.append('entrada2', $('#valorEntrada2').val());
                dados.append('formaEntrada2', $('#formaPagamento2').val());
            }
            dados.append('contrato', contrato);
            dados.append('total', <?php echo $total;?>);
            
            if(flag == 0 ){
                $.ajax({
                    url: '<?php echo base_url('finalizaReserva'); ?>',
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
                        if(data != false){
                            if(contrato === true){
                                Swal.fire('Locação realizada com sucesso!.');
                                exibeCupom(chave);
                                exibeContrato(chave);
                                setTimeout(function(){ 
                                    //window.location.replace('<?php echo base_url('impressoes/geraCupom?chave=');?>' + chave + '&terms=true');
                                    window.location.replace('<?php echo base_url('listaLocacao');?>');
                                }, 1500);
                            } else {
                                Swal.fire('Locação realizada com sucesso!.');
                                setTimeout(function(){ 
                                    //window.location.replace('<?php echo base_url('impressoes/geraCupom?chave=');?>' + chave);
                                    window.location.replace('<?php echo base_url('listaLocacao');?>');
                                }, 1500);
                            }
                        }else{
                            console.log(data);
                            Swal.fire('Houve um problema ao realizar a locação, por favor tente novamente.');
                        }
                    },
                });
            }else{
                Swal.fire(
                'Ops!',
                'Verifique as formas de pagamento informadas.',
                'error'
            );
            }
        }
    }
    
    function fechaOrcamento() {
        
        let chave = $('#chaveLocacao').val();
        dados = new FormData();
        dados.append('chaveCliente', $('#clienteChaveUnica').val());
        dados.append('chaveLocacao', chave);
        dados.append('retirada', $('#dataLocaçao').val());
        dados.append('devolucao', $('#dataDevolucao').val());
        dados.append('total', <?php echo $total;?>);
        
        
        $.ajax({
            url: '<?php echo base_url('OrcamentoReserva'); ?>',
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
                exibeOrcamento(chave);
                Swal.fire('Orçamento realizado.');
                setTimeout(function(){ 
                    window.location.replace('<?php echo base_url('reservas');?>')
                }, 1500);
            },
        });
    }
    
    function exibeOrcamento(id) {
        var height = 500;
        var width  = 600;
        var top = parseInt((screen.availHeight) - height - 100);
        var left = parseInt((screen.availWidth) - (width / 2));
        var features = "location=1, status=1, scrollbars=1, width=" + width + ", height=" + height + ", top=" + top + ", left=" + left;
        window.open("<?php echo base_url('orcamento/');?>"+id, 'Orcamento', features);
    }
    
    function exibeCupom(id) {
        var height = 500;
        var width  = 600;
        var top = parseInt((screen.availHeight) - height - 100);
        var left = parseInt((screen.availWidth) - (width / 2));
        var features = "location=1, status=1, scrollbars=1, width=" + width + ", height=" + height + ", top=" + top + ", left=" + left;
        window.open("<?php echo base_url('cupom/');?>"+id, 'Cupom', features);
    }
        
    function exibeContrato(id) {
        var height = 500;
        var width  = 600;
        var top = parseInt((screen.availHeight) - height - 100);
        var left = parseInt((screen.availWidth) - (width / 2));
        var features = "location=1, status=1, scrollbars=1, width=" + width + ", height=" + height + ", top=" + top + ", left=" + left;
        window.open("<?php echo base_url('contrato/');?>"+id, 'Contrato', features);
    }
    
    function exibeTermo(id) {
        var height = 500;
        var width  = 600;
        var top = parseInt((screen.availHeight) - height - 100);
        var left = parseInt((screen.availWidth) - (width / 2));
        var features = "location=1, status=1, scrollbars=1, width=" + width + ", height=" + height + ", top=" + top + ", left=" + left;
        window.open("<?php echo base_url('termo/');?>"+id, 'Termo', features);
    }
</script>

<script>
    function modalFinal(){
        if($("#nomeAtendente  option:selected").val()){
            $("#modalProsseguir").modal('toggle');
        }else{
            Swal.fire('Informe o atendente.');
        }
    }
</script>

<script>
    function desconto(){
        $("#labelDesconto").show();
        $("#buttonDesconto").hide();
    }
</script>
<script>
    function observador(){
        if($("#formaPagamento option:selected").val() == "-1"){
            $("#duplaEntrada").show();
            $("#entrada1").show();
            $("#entrada2").show();
        }else{
            $("#duplaEntrada").hide();
            $("#entrada1").hide();
            $("#entrada2").hide();
        }
    }
</script>
<script>
    function naoFinal(){
        window.location.replace('<?php echo base_url('pendente/');?>'+$('#chaveLocacao').val());
    }
</script>