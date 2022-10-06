<style>
    .tableFixHead thead th { position: sticky; top: 0; }
    .tableFixHead{height: calc(100% - -290px);
                overflow: auto;}
    
    /* Just common table stuff. Really. */
    table  { border-collapse: collapse; width: 100%;}
    tbody {max-height: 300px; overflow: scroll;}
    th, td { padding: 8px 16px; }
    th     { background:#eee; }
    
    .auxhidden{
        display: none;
    }
    
    .drop-content-pdv{
        background-color: white;
        color: black;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        margin-top: -3px;
        padding: 0% 6%;
    }
    
    .drop-content-pdv a :hover{
        color: black;
        cursor: pointer;
        background-color: ##30a5ff!important;
    }
    
    hr{
        margin-top: -2px;
        border-top: 1px solid #c7c7cf;
    }
    
    .bb{
        border-bottom: 1px solid lightgrey;
    }
    
    html, body{
        overflow-x: hidden;
    }
    
    @media (min-width: 300px) and (max-width: 350px){
        .drop-content-pdv{
            width: 127%!important;
            left: -32%!important;
        }
    }
    
    @media (min-width: 350px) and (max-width: 400px){
        .drop-content-pdv{
            width: 117%!important;
            left: -46%!important;
        }
    }
    
    @media (min-width: 401px) and (max-width: 450px){
        .btndesconto{
            margin-left: 72.5%!important;
        }
        .btnvendloja{
            margin-left: 76%!important;
        }
    }
    
    @media (min-width: 451px) and (max-width: 500px){
        .btndesconto{
            margin-left: 73%!important;
        }
        .btnvendloja{
            margin-left: 77%!important;
        }
    }
    
    @media (min-width: 501px) and (max-width: 651px){
        .btndesconto{
            margin-left: 73%!important;
        }
        .btnvendloja{
            margin-left: 77%!important;
        }
    }
    
    @media (min-width: 700px) and (max-width: 850px){
        .container{
            width: 100%;
        }
        .btndesconto{
            margin-left: 81%!important;
            margin-top: -3%!important;
        }
        .btnvendloja{
            margin-left: 81.5%!important;
            margin-bottom: 3%;
            margin-top: 2%;
        }
        .btnconfig{
            margin-top: 2%;
        }
        
        .btn-incluir-produto{
            margin-left: 9.5%!important;
            width: 5%!important;
        }
        
        <?php $ipad_size = 1; ?>
    }
</style>
<?php //print_r($_SESSION); ?>
<div class="container" style="padding: 2% 4% 2% 4%; margin-bottom: -10%;">
    <div class="container" style="padding: 0 2%;">
        <!-- Dados do Produto -->
        <div class="" style="margin-bottom: 5px;">
            <div class="">
                <div class="form-group alert alert-danger" role="alert" style="display: none;" id="erro">
                    Produto não encontrado!
                </div>
                <div class="form-group alert alert-danger" role="alert" style="display: none;" id="erro2">
                    Preencha todos os campos!
                </div>
                <div class="form-group alert alert-danger" role="alert" style="display: none;" id="erroEstoque">
                    Estoque insuficiente!
                </div>
                <div class="form-group alert alert-danger" role="alert" style="display: none;" id="erroEstoque2">
                    Quantidade mínima por venda não atingida!
                </div>
                <div class="form-group alert alert-danger" role="alert" style="display: none;" id="erroData">
                    Produto ainda não disponível!
                </div>
                <div class="form-group alert alert-danger" role="alert" style="display: none;" id="erroLoja">
                    Loja não selecionada!
                </div>
                <div class="form-group alert alert-danger" role="alert" style="display: none;" id="erroVendedor">
                    Vendedor não informado!
                </div>
                <div class="form-group" style="margin-bottom: -10px; display: none;" >
                    
                        <!--<div class="row">-->
                        <!--    <div class="col-sm-6">-->
                        <!--        <label><b>Loja</b></label>-->
                        <!--    </div>-->
                        <!--    <div class="col-sm-6">-->
                        <!--        <label><b>Vendedor</b></label>-->
                                
                                
                        <!--    </div>-->
                        <!--    <hr style="position: relative; top: 25px; width: 94%;">-->
                        <!--</div>-->
                        <!--<div class="row">-->
                        <!--    <div class="col-sm-6">-->
                        <!--    <?php if($_SESSION['loja_id'] != 0){?>-->
                        <!--        <input type="hidden" id="loja_id" style="margin-bottom: 3%;" value="<?php echo $_SESSION['loja_id'];?>">-->
                        <!--    <?php foreach($lojas as $loja){ 
                            if($loja['id'] == $_SESSION['loja_id']){?>-->
                        <!--        <input type="text" class="form-control" style="margin-bottom: 3%;" readonly value="<?php echo $loja['nome'];?>">-->
                        <!--    <?php } } }else{?>-->
                        <!--        <select class="form-control" id="loja_id" style="margin-bottom: 3%;" <?php if($place != 0){ echo "disabled";}?>>-->
                        <!--            <option value="-1" selected disabled>Loja</option>-->
                        <!--        <?php foreach($lojas as $loja){ ?>-->
                        <!--            <option value="<?php echo $loja['id'] ?>"><?php echo $loja['nome']?></option>-->
                        <!--        <?php } ?>-->
                        <!--        </select> -->
                        <!--        <?php }?>-->
                        <!--    </div>-->
                        <!--    <div class="col-sm-6">-->
                        <!--    <?php if($_SESSION['func_id'] != 0){?>-->
                        <!--        <input type="hidden" id="vendedor_id" style="margin-bottom: 3%;" value="<?php echo $_SESSION['func_id'];?>">-->
                        <!--    <?php foreach($vendedor as $vend){ 
                            if($vend['id_funcionario'] == $_SESSION['func_id']){?>-->
                        <!--        <input type="text" class="form-control" style="margin-bottom: 3%;" readonly value="<?php echo $vend['nome_funcionario'];?>">-->
                        <!--    <?php } } }else{?>-->
                        <!--        <select class="form-control" id="vendedor_id" style="margin-bottom: 3%;">-->
                        <!--            <option value="-1" selected disabled>Vendedor</option>-->
                        <!--            <?php foreach($vendedor as $vend){ ?>-->
                        <!--                <option value="<?php echo $vend['id_funcionario'] ?>"><?php echo $vend['nome_funcionario']?></option>-->
                        <!--            <?php } ?>-->
                        <!--        </select>-->
                        <!--        <?php }?>-->
                        <!--    </div>-->
                        <!--</div>-->
                    
                    
                    <!--<label>Modelo / Cor</label>-->
                    <!--<div style="width: 100%" id="divhidden">-->
                    <!--    <select class="js-example-basic-multiple form-control" style="width: 100%" id="codigo" name="codigo" onchange="buscarProduto(false)">-->

                    <!--    </select><br>-->
                    <!--</div>-->
                </div>
                <br>
                <!--<div class="justify-content-end">-->
                <!--    <div class="" style="margin-top: -4%; margin-bottom: -5%; display: flex; justify-content: right;">-->
                        
                        
                <!--    </div>-->
                    
                <!--</div>-->
                
                        <div class="row" >
            <div class="col-md-12" >
                <div class="panel panel-defalut" style="padding: 10px; background-color: #f7f7f7;">
                    <div class="form-group">
                        <label for="cliente"><b>Cliente</b></label><hr>
                        <div class="row">
                            <div class="col-xs-10">
                                 <select style="width: 100%" class="js-example-basic-multiple" id="cliente" name="cliente" onchange="liberaTroca()">
                                    <?php foreach($clientes as $row) {
                                            if($row["cliente_id"] == 1){
                                                echo "<option selected value='" . $row['cliente_id'] . "' > " . $row['cliente_nome'] . " | " . $row['cliente_cpf'] ."</option>";
                                            }else{
                                                echo "<option value='" . $row['cliente_id'] . "' > " . $row['cliente_nome'] . " | " . $row['cliente_cpf'] ."</option>";
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="col-xs-2 <?php if($ipad_size == 1){ ?>text-center<?php } ?>">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCliente"
                                style="background-color: #30a5ff!important; box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%)">
                                    <em class="fa fa-plus"></em></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
                
                <div class="form-group" style="margin-top: 0%; margin-bottom: -5px;" >
                    <div style="">
                        <div style="display: flex; width: 100%;">
                            
                            <div class="col-xs-6">
                                <label style="position: relative; top: 15px;"><b>Produtos</b></label>
                            </div>
                            
                            <div class="col-xs-6">
                                <div style="width: 100%; text-align: right; margin-bottom: 3%; <?php  ?>display: flex; justify-content: end;">
                                    <div class="bt-vend-loja" style="margin-left: 3%;">
                                        <a data-toggle="modal" data-target="#modalFrete" style="background-color: #30a5ff!important; height: 30px; font-size: 13px; font-weight: bold; 
                                        box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%); position: relative;" 
                                        class="btn btn-primary"><em class="fa fa-truck"></em></a>
                                    </div>
                                    <?php if($_SESSION['perfil'] == 3){ ?>
                                        <div class="btnvendloja" style="margin-left: 3%;">
                                            <a onclick="" data-toggle="modal" data-target="#modalVendLoja" style="background-color: #30a5ff!important; height: 30px; font-size: 13px; font-weight: bold; 
                                            box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%); position: relative;" 
                                            class="btn btn-primary"><em class="fa fa-user"></em></a>
                                            
                                        </div>
                                    <?php } ?>
                                    <div class="btnconfig" style="margin-left: 3%;"><!--margin-left: 87%;-->
                                        <a onclick="abrirconfig()" style="background-color: #30a5ff!important; height: 30px; font-size: 13px; font-weight: bold; 
                                        box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%); position: relative;" 
                                        class="btn btn-primary"><em class="fa fa-cog"></em></a>
                                        <div id="configlista" style="position: absolute; z-index: 999; display: none; width: fit-content; margin-left: -26%;">
                                            <div class="drop-content-pdv" style="width: fit-content; position: relative; left: -11%; padding: 7% 7% 1% 7%;">
                                                <a onclick="ultimaVenda()"><p class="bb" style="text-align: right">Reimprimir Última Venda</p></a>
                                                <?php if($_SESSION['perfil'] != 9){ ?><a data-toggle="modal" data-target="#modalCancelaUltimaVenda"><p class="bb" style="text-align: right">Cancelar Última Venda</p></a><?php } ?>
                                                <?php if($_SESSION['perfil'] != 9){ ?><a data-toggle="modal" data-target="#modalFechaCaixa"><p class="bb" style="text-align: right">Fechar Caixa</p></a><?php } ?>
                                                <a href="<?php if($_SESSION['perfil'] == 9){
                                                                echo base_url('admin/relatoriosloja');
                                                            }elseif($_SESSION['perfil'] == 10){
                                                                echo base_url('954d03a8bbb7febfcd39f9e071407b4b');
                                                            }else{
                                                                echo base_url('106a6c241b8797f52e1e77317b96a201');} ?>"><p style="text-align: right">Voltar</p></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr style="width: 93%; ">
                        <div style="display: flex;">
                            <select class="js-example-basic-multiple" onchange="buscarProduto(false)"  id="codigoprod" name="codigoprod" style="width: 80%;">
                                <option value="0" selected disabled hidden>Selecione o Produto</option>
                                <?php 
                                    foreach($produtos as $row) {
                                        echo "<option value='" . $row['produto_id'] . "'>" . $row['produto_nome'] . "</option>";
                                    }
                                ?>
                            </select>
                            <button type="button" class="btn btn-primary btn-incluir-produto" onclick="buscarProduto(true)" style="margin-left: 8%; width: 10%; background-color: #30a5ff!important; font-weight: bold; box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%);"><em class="fa fa-plus" style=""></em></button>
                        </div>
                        
                    </div>
                    <div class="" style="display: flex; margin-top: 4%;">
                        <div class="" style="width: 30%;">
                            <label><b>Quantidade</b></label>
                            <input oninput="valorTotal()" type="number" value="1" name="qtd" id="qtd" placeholder="Qtd" class="form-control">
                            <input type="hidden" name="estoqueQtd" id="estoqueQtd">
                        </div>
                        <div class="mx-auto" style="width: 30%; margin-left: 3%; margin-right: 3%;">
                            <label><b>Valor Unitário</b></label>
                            <input type="number" disabled name="unitario" id="unitario" placeholder="R$" class="form-control">
                        </div>
                        <div class="" style="width: 30%;">
                            <label><b>Valor Total</b></label>
                            <input type="number" disabled name="total" id="total" placeholder="R$" class="form-control">
                        </div>
                        <input type="hidden" name="idProduto" id="idProduto">
                        <input type="hidden" name="idEstoque" id="idEstoque">
                        <input type="hidden" name="estoqueModelo" id="estoqueModelo">
                    </div>
                </div>
                <br>
                <!--<div class="form-group text-center" style="margin-bottom: -5px; " >-->
                <!--</div>-->
            </div>
        </div>
        
        <!-- Imagem do Produto -->
        <!--<div class="row" >-->
        <!--    <div class="col-md-12" >-->
        <!--        <div class="panel panel-defalut" style="padding: 10px;">-->
        <!--            <div class="form-group">-->
        <!--                <label>Imagem do Produto</label><br>-->
        <!--            </div>-->
        <!--            <div class="form-group text-center">-->
        <!--                <img id="img" style="width: 100px;">-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        
        <!-- Dados da Compra -->
        <div class="row" >
            <div class="col-md-12" >
                <div class="panel panel-defalut" style="padding: 10px; background-color: #f7f7f7;">
                    <div id="divAcres" >
                        <div class="form-group">
                            <div style="display: flex;">
                                <label for="desconto"><b>Desconto:</b></label>
                                
                                <div class="btndesconto" style="margin-left: 71%; margin-top: -5%;">
                                    <a id="btDesconto" data-toggle="modal" data-target="#modalDesconto" style="background-color: #30a5ff!important; height: 30px; font-size: 13px; font-weight: bold; 
                                    box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%); position: relative;" 
                                    class="btn btn-primary"><em class="fa fa-tag"></em></a><!--onclick="abrirdesconto()"-->
                                    <!--<div id="descontolista" style="position: absolute; z-index: 999; display: none; width: 40%; margin-left: 53%;">-->
                                    <!--    <div class="drop-content-pdv" style="width: 195%; position: relative; left: -105%;">-->
                                    <!--        <input style="display:none; width: 100%; position: initial ; top: -39px; left: 55%; margin-bottom: -45px;" type="number" value="0.0" id="desconto" name="desconto" class="form-control" oninput="mudarDesconto()">-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                            </div>
                            <!--<button style="background-color: #30a5ff!important; box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%); width: 100%; height: 45px; font-size: 20px; font-weight: bold; width: 45%;" id="btDesconto" class="btn btn-primary" data-toggle="modal" data-target="#modalDesconto">HABILITAR</button>-->
                            <input style="display:none; width: 100%; position: initial ; top: -39px; left: 55%; margin-bottom: -36px;" type="number" inputmode="numeric" value="0.00" id="desconto" name="desconto" class="form-control" oninput="mudarDesconto()">
                            <hr>
                        </div>
                    </div>
       
                </div>
            </div>
        </div>

    </div>
    
    <!-- Subtotal -->
    <div class="" style="position: relative; z-index: 1;">
        	<div>
        		<input type="hidden" id="listaCompra" value="0">
                <input type="hidden" id="IdsCompra" value="0">
                <input type="hidden" id="qtdCompra" value="0">
                <input type="hidden" id="valCompra" value="0">
                <input type="hidden" id="subCaixa" value="0">
                <input type="hidden" id="envio" value="0">
                <input type="hidden" id="formaEnvioTxt" value="0">
                        
                </div>
        <!-- Tabela de Produtos -->
        <div class="panel panel-default" style="height: 323px; overflow:auto;">
            <div class="panel-body" style="position: relative; z-index: 0; overflow: auto">
                <div class="tableFixHead" id="tablefix">
                    <table id="pdvTable" style="position: relative; z-index: 2;"> <!--id="myTable2" class="table table-hover table-bordered"-->
    				    <thead> 
    				        <tr>
    				            <th>Cod</th>
                                <th>Produto</th>
                                <th>Qtd</th>
                                <th>Un</th>
                                <th>Total</th>
                                <Th></Th>
    				        </tr>
    				    </thead>
    				    <tbody>
    				        
    				    </tbody>    
    				</table>
				</div>
            </div>
        </div>
        <div style="background-color: #30a5ff; position: relative; z-index: 50;">
        <div class="panel panel-default" style="background-color: #30a5ff; position: relative; z-index: 99;">
            <div class="panel-body">
                <div class="container">
                    <div class="" style="display: flex;">
                        <div class="" style="margin-right: 15%;">
                            <h4 style="color: white;">SUBTOTAL</h4>
                        </div>
                        
                        <div class="" style="margin-left: 15%;">
                            <h4 style="color: white;">DESCONTO</h4>
                        </div>
                    </div>
                    
                    <div class="" style="display: flex;">
                        <div class="" style="display: flex; margin-right: 4%;">
                            <div class="">
                                <h4 style="color: white; float: right;">R$</h4>
                            </div>
                            <div class="">
                                <input id="subtotal" style="color: white; float: left; background:transparent; border:none; position: relative; top: 6px; left: 3%; font-size: 18px; width: 100%;" disabled>
                            </div>  
                        </div>
                        
                        <div class="" style="display: flex; margin-left: 13%;">
                            <div class="">
                                <h4 style="color: white; float: right;">R$</h4>
                            </div>
                            <div class="">
                                <input id="desconto2" style="color: white; float: left; background:transparent; border:none; position: relative; top: 6px; left: 3%; font-size: 18px; width: 100%;" disabled>
                            </div>  
                        </div>
                    </div>
                    
                    <div class="" style="display: flex;">
                        <div class="mx-auto" style="margin-left: 30%;">
                            <h4 style="color: white; font-weight: bold;">TOTAL VENDA</h4>
                        </div>
                    </div>
                    
                    <div class="" style="display: flex;">
                        <div class="mx-auto" style="display: flex; margin-left: 35%;">
                            <div class="">
                                <h4 style="color: white; float: right; font-weight: bold;">R$</h4>
                            </div>
                            <div class="">
                                <input id="total2" style="color: white; float: left; background:transparent; border:none; position: relative; top: 6px; left: 3%; font-size: 18px; width: 100%;" disabled>
                            </div>  
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        </div>
        
        <div style="margin-bottom: 30px; position: relative; z-index: 99; display: flex;">
            <a class="btn btn-primary" onclick="window.location.reload();" style="width: 49%; padding: 20px; font-size: 20px; font-weight: bold; background-color: red!important; border: 0px; box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%);" >CANCELAR</a>
            <a class="btn btn-primary" onclick="setaDadosModal3()" style="width: 49%; padding: 20px; font-size: 20px; font-weight: bold; background-color: green; border: 0px; margin-left: 1.5%;  box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%);" >FINALIZAR</a>
        </div>
    
        <div class="form-group alert alert-danger" role="alert" style="display: none; margin-top: 30px;" id="erroCliente">
            Selecione um Cliente!
        </div>
    </div>
    
</div>


<!--Modal Frete -->
<div class="modal" id="modalFrete">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #30a5ff;">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h4 class="modal-title">Forma de Envio / Entrega da Compra</h4>
                    </div>
                </div>  
            </div>
            <!-- Modal body -->
            <div class="modal-body" id="desc">
                <div class="container" style="width: 100%;">
                    <div class="row">
                        <div class="col-12 d-none">
                            <div class="col-md-6 col-6">
                                <label><b>Forma de Envio: </b></label>
                                <select class="js-example-basic-multiple form-control" onchange="calcEnvio()" id="formaEnvio" style="margin-bottom: 8%; width: 100%!important;">
                                    <option value="1" selected >Retirada em Loja</option>
                                    <option value="2" >Motoboy</option>
                                    <option value="3" >Envio pelo Correio</option>
                                </select> 
                            </div>
                            <div class="col-md-6 col-6">
                                <label><b>Valor:</b></label>
                                <input type="text" class="form-control money" id="envioModal" value="0.0" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="row d-none" id="divFrete" style="visibility:hidden;">
                            <div class="col-md-6">
                                <label><b>Informe o CEP</b></label>
                                <input type="text" id="calFrete" minlength="8" maxlength="9">
                            </div>
                            <div class="col-md-6" >
                                <label><b>Forma de envio</b></label>
                                <select class="js-example-basic-multiple form-control" id="freteCorreio" style="margin-bottom: 8%; width: 100%!important;">
                                <option value="1" selected >PAC</option>
                                <option value="2" >Sedex</option>
                            </select>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="updateEnvio()">Confirmar</button>
            </div>
        </div>
    </div>
</div>

<!--Modal Vendedor e Loja -->
<div class="modal" id="modalVendLoja">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #30a5ff;">
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <h4 class="modal-title">Selecione a Loja e o Vendedor</h4>
                    </div>
                </div>  
            </div>
            
            <!-- Modal body -->
            <div class="modal-body" id="desc">
             
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <label><b>Loja</b></label>
                        </div>
                        <div class="col-sm-12">
                            <?php if($_SESSION['loja_id'] != 0){?>
                                <input type="hidden" id="loja_id" style="margin-bottom: 3%;" value="<?php echo $_SESSION['loja_id'];?>">
                            <?php foreach($lojas as $loja){ 
                            if($loja['id'] == $_SESSION['loja_id']){?>
                                <input type="text" class="form-control" style="margin-bottom: 3%;" readonly value="<?php echo $loja['nome'];?>">
                            <?php } } }else{?>
                                <select class="form-control" id="loja_id" style="margin-bottom: 3%;" <?php if($place != 0){ echo "disabled";}?>>
                                    <option value="-1" selected disabled>Loja</option>
                                <?php foreach($lojas as $loja){ ?>
                                    <option value="<?php echo $loja['id'] ?>"><?php echo $loja['nome']?></option>
                                <?php } ?>
                                </select> 
                                <?php }?>
                        </div>
                            
                        <!--<div class="col-12">
                        <?php if($_SESSION['loja_id'] != 0){?>
                            <input type="hidden" id="loja_id" style="margin-bottom: 3%;" value="<?php echo $_SESSION['loja_id'];?>">
                        <?php foreach($lojas as $loja){ 
                        if($loja['id'] == $_SESSION['loja_id']){?>
                            <input type="text" class="form-control" style="margin-bottom: 3%;" readonly value="<?php echo $loja['nome'];?>">
                        <?php } } }else{?>
                            <select class="js-example-basic-multiple" id="loja_id" style="margin-bottom: 3%;" <?php if($place != 0){ echo "disabled";}?>>
                                <option value="-1" selected disabled>Loja</option>
                            <?php foreach($lojas as $loja){ ?>
                                <option value="<?php echo $loja['id'] ?>"><?php echo $loja['nome']?></option>
                            <?php } ?>
                            </select> 
                            <?php }?>
                        </div>-->
                        
                        <div class="col-12">
                            <label><b>Vendedor</b></label>
                        </div>
                        <div class="col-sm-12">
                            <?php if($_SESSION['func_id'] != 0){?>
                                <input type="hidden" id="vendedor_id" style="margin-bottom: 3%;" value="<?php echo $_SESSION['func_id'];?>">
                            <?php foreach($vendedor as $vend){ 
                            if($vend['id_funcionario'] == $_SESSION['func_id']){?>
                                <input type="text" class="form-control" style="margin-bottom: 3%;" readonly value="<?php echo $vend['nome_funcionario'];?>">
                            <?php } } }else{?>
                                <select class="form-control" id="vendedor_id" style="margin-bottom: 3%;">
                                    <option value="-1" selected disabled>Vendedor</option>
                                    <?php foreach($vendedor as $vend){ ?>
                                        <option value="<?php echo $vend['id_funcionario'] ?>"><?php echo $vend['nome_funcionario']?></option>
                                    <?php } ?>
                                </select>
                                <?php }?>
                        </div>
                        <!--<div class="col-12">
                        <?php if($_SESSION['func_id'] != 0){?>
                            <input type="hidden" id="vendedor_id" style="margin-bottom: 3%;" value="<?php echo $_SESSION['func_id'];?>">
                        <?php foreach($vendedor as $vend){ 
                        if($vend['id_funcionario'] == $_SESSION['func_id']){?>
                            <input type="text" class="form-control" style="margin-bottom: 3%;" readonly value="<?php echo $vend['nome_funcionario'];?>">
                        <?php } } }else{?>
                            <select class="js-example-basic-multiple" id="vendedor_id" style="margin-bottom: 3%;">
                                <option value="-1" selected disabled>Vendedor</option>
                                <?php foreach($vendedor as $vend){ ?>
                                    <option value="<?php echo $vend['id_funcionario'] ?>"><?php echo $vend['nome_funcionario']?></option>
                                <?php } ?>
                            </select>
                            <?php }?>
                        </div>-->
                        
                    </div>
                </div>
                
            </div>
          
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cancela Última Venda -->
<div class="modal" id="modalCancelaUltimaVenda">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #30a5ff;">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h4 class="modal-title">Validação de Cancelamento da Última Venda</h4>
            </div>
        </div>  
      </div>
        
      <!-- Modal body -->
      <div class="modal-body" id="desc">
         
         <div class="form-group">
             <label>Usuário</label>
             <input type="text" name="usuarioDesconto1" id="usuarioDesconto1" placeholder="Usuário"
             class="form-control">
         </div>
          
         <div class="form-group">
             <label>Senha</label>
             <input type="password" name="senhaDesconto1" id="senhaDesconto1" placeholder="Senha"
             class="form-control">
         </div>
         
         <div class="form-group alert alert-danger text-center" role="alert" style="display: none;" id="erroUsuario">
            Usuário não encontrado!
        </div>
        
        <div class="form-group alert alert-danger text-center" role="alert" style="display: none;" id="erroUsuario2">
            Este usuário não é gerente ou administrador!
        </div>
         
         <div class="form-group text-center">
            <button class="btn btn-success" onclick="cancelaCompra()">
                Confirmar</button>
         </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        
      </div>

    </div>
  </div>
  </div>

<!-- Modal Fechar Caixa -->
<div class="modal" id="modalFechaCaixa">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #30a5ff;">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h4 class="modal-title">Validação de Fechamento de Caixa</h4>
            </div>
        </div>  
      </div>
        
      <!-- Modal body -->
      <div class="modal-body" id="desc2">
         
         <div class="form-group">
             <label>Usuário</label>
             <input type="text" name="usuarioDesconto2" id="usuarioDesconto2" placeholder="Usuário"
             class="form-control">
         </div>
         
         <div class="form-group">
             <label>Senha</label>
             <input type="password" name="senhaDesconto2" id="senhaDesconto2" placeholder="Senha"
             class="form-control">
         </div>
         
         <div class="form-group alert alert-danger text-center" role="alert" style="display: none;" id="erroUsuario">
            Usuário não encontrado!
        </div>
        
        <div class="form-group alert alert-danger text-center" role="alert" style="display: none;" id="erroUsuario2">
            Este usuário não é gerente ou administrador!
        </div>
         
         <div class="form-group text-center">
            <button class="btn btn-success" onclick="fechaCaixa()">
                Confirmar Usuário</button>
         </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        
      </div>

    </div>
  </div>
</div>

<!-- Modal de Finalizar Compra -->
<div class="modal" id="modalFinalizar">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #30a5ff;">
        <div class="row">
            <div class="col-md-6 col-xs-6">
                <h4 class="modal-title">Finalizar Venda</h4>
            </div>
            <div class="col-md-6 col-xs-6">
                <h4 class="modal-title" style="float: right;"><?php echo $idCompra?></h4>
            </div>
        </div>  
      </div>
        
      <!-- Modal body -->
      <div class="modal-body">
          <input type="hidden" name="idCompra" id="idCompra" value="<?php echo $idCompra;?>">
          <input type="hidden" name="idLista" id="idLista" value="<?php echo $idLista;?>">
          <div class="form-group">
             <div class="col-xs-6">
                 <b>Cliente:</b>
             </div>
             <div class="col-xs-6">
                 <p id="cl" style="float: right"></p>
             </div>
             <input type="hidden" name="clienteHidden" id="clienteHidden">
         </div>
         <div class="form-group">
             <div class="col-xs-6">
                 <b>Vendedor:</b>
             </div>
             <div class="col-xs-6">
                 <p id="vend" style="float: right"><?php echo $this->session->userdata('nome');?></p>
             </div>
             <input type="hidden" name="vendedorHidden" id="vendedorHidden" value="<?php echo $this->session->userdata('id_pessoa');?>">
         </div>
         
         <hr class="form-group" style="width: 100%;">
         
         <div class="form-group">
             <div class="form-group">
             <div class="col-xs-6">
                 <b>Envio</b>
             </div>
             <div class="col-xs-6">
                 <p id="formaEnvioTxtFim" style="float: right">Retirada em Loja</p>
             </div>
         </div>
         <div class="form-group">
             <div class="col-xs-6">
                 <b>Valor de Envio</b>
             </div>
             <div class="col-xs-6">
                 <p id="formaEnvioValFim" style="float: right">0.00</p>
             </div>
         </div>
             <div class="col-xs-6">
                 <b>Subtotal:</b>
             </div>
             <div class="col-xs-6">
                 <p id="subtot" style="float: right"></p>
             </div>
         </div>
         <div class="form-group">
             <div class="col-xs-6">
                 <b>Acrescimo:</b>
             </div>
             <div class="col-xs-6">
                 <p id="ac" style="float: right" >0 %</p>
             </div>
             <input type="hidden" id="valorAcrescimo" name="valorAcrescimo" value="0">
         </div>
         <div class="form-group">
             <div class="col-xs-6">
                 <b>Desconto:</b>
             </div>
             <div class="col-xs-6">
                 <p id="des" style="float: right" >0 %</p>
             </div>
         </div>
         <div class="form-group">
             <div class="col-xs-6">
                 <b>Total:</b>
             </div>
             <div class="col-xs-6">
                 <p id="tot" style="float: right"></p>
             </div>
             <input type="hidden" name="valorHidden" id="valorHidden">
         </div>
         
         <hr class="form-group" style="width: 100%;">
         
         <div class="form-group">
             <div class="col-md-12" style="margin-bottom: 30px;">
                 <label for="pagamento">Forma de pagamento</label>
                 <select id="pagamento"  name="pagamento" class="form-control" style="width: 100%" onchange="valueacrescimo()">
                        <option value='' selected disabled hidden>Selecione a forma de pagamento</option>
                        <?php foreach($formas as $row) {
                                echo "<option alt='". $row['acrescimo_forma'] ."' value='" . $row['id_forma'] . "' > " . $row['nome_forma'] . "</option>";
                            }
                        ?>
                 </select>
             </div>
         </div>
         
         <div class="form-group" style="display:none; padding-left: 15px; padding-right: 15px;" id="divForma">
             
         </div>
         
        <div class="form-group alert alert-danger text-center" role="alert" style="display: none;" id="erroPagamento">
            Selecione a forma de pagamento!
        </div>
                 
         <div class="form-group text-center" id="fimCompra">
            <button class="btn btn-success"  onclick="finalizaCompra()">
                Finalizar Venda</button>
         </div>
         <div class="form-group text-center" id="dualFimCompra">
            
            <input type="hidden" name="hiddenForma" id="hiddenForma" >
            <input type="hidden" name="hiddenForma2" id="hiddenForma2" >
         </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="fechar()">Fechar</button>
        
      </div>

    </div>
  </div>
</div>

<!-- Modal de Opcao de Impressão -->
<div class="modal" id="modalImpressao">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #30a5ff;">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h4 class="modal-title">Tipo de Impressora</h4>
            </div>
        </div>  
      </div>
        
      <!-- Modal body -->
      <div class="modal-body">
         
         <div class="form-group">
             <div class="col-md-12" style="margin-bottom: 30px;">
                 <label for="impressora">Tipo de Impressora</label>
                 <select id="impressora" name="impressora" class="form-control" style="width: 100%">
                     <option value='3' selected>Fiscal 5.6</option>
                     <option value='1'>Padrão</option>
                     <option value='2'>Fiscal 8</option>
                 </select>
             </div>
         </div>
         
         <div class="form-group text-center">
            <button class="btn btn-success" onclick="finalizaCompra()">
                Finalizar e Imprimir Comprovante</button>
         </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        
      </div>

    </div>
  </div>
</div>

<!-- Modal de Opcao de Cadastro de Cliente -->
<div class="modal" id="modalCliente">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #30a5ff;">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h4 class="modal-title">Cadastro de Cliente</h4>
            </div>
        </div>  
      </div>
        
      <!-- Modal body -->
      <div class="modal-body">
        <em id="loja_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em> 
        <div class="form-group">
			<label>Nome</label>
			<input class="form-control" 
			type="text" placeholder="Nome" id="nome" name="nome">
			<em id="nome_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
		</div>

		<div class="form-group">
		    <div class="row">
		        <div class="col-md-6">  
					<label>CPF / CNPJ do Cliente</label>
					<input type="text" class="form-control" onkeypress="return somenteNumeros(event)" onblur="javascript: formatarCampo(this);" maxlength="14" 
					placeholder="Digite sem pontos e traços" id="cpf" name="cpf" required>
					<em id="cpf_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                    <h4 class="text-danger" id="erroCliente1" style="display: none">CPF / CNPJ JÁ CADASTRADO!</h4>
                    <h4 class="text-danger" id="erroCliente2" style="display: none">CPF / CNPJ INVÁLIDO!</h4>
				</div>
				<div class="col-md-6">  
					<label>Email</label>
					<input type="email" class="form-control" placeholder="Email" id="email" name="email" >
					<em id="email_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
				</div>
			</div>
		</div>
		
		<div class="form-group">
    	    <div class="row">
    	        <div class="col-md-6">
    				<label>Telefone</label>
    				<input class="form-control" type="tel" placeholder="Telefone" id="telefone" name="telefone" data-mask="00000000000" >
                    <em id="telefone_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
    			</div>
    			<div class="col-md-6" style="margin-top: 2%;">
    				<label>CEP</label>
    				<input class="form-control" onfocusout="buscaCEP()" type="number" placeholder="CEP" id="cep" name="cep" data-mask="00000000" >
    				<em id="cep_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
    			</div>    
    		</div>
    	</div>
		
		<div class="form-group">
		    <div class="row">
		        <div class="col-md-6" style="margin-bottom: 15px;">
				    <label>Estado</label><br>
				    <input class="form-control" type="text" placeholder="Estado" id="estado" name="estado">
                    <!--<select style="width: 100%" class="js-example-basic-multiple form-control" id="estado" name="estado" onchange='test($(this).val())'>-->
                    <!--<?php echo"<option value='' selected disabled hidden>Selecione o Estado</option>";
                            foreach($estado as $row) {
                            echo "<option value='" . $row['id_estado'] . "' > " . $row['nome_estado'] . " - " . $row['uf_estado'] . "</option>";
                        }
                    ?>-->
                    <!--</select>-->
                    <em id="estado_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                </div>
                
                <div class="col-md-6" ><!--style="display:none;" id="divCid"-->
                    <label>Cidade</label><br>
                    <input class="form-control" type="text" placeholder="Cidade" id="cidade" name="cidade">
                    <!--<select style="width: 100%" class="js-example-basic-multiple form-control" id="cidade" name="cidade" >-->
                    <!--    <?php echo"<option value='' selected disabled>Selecione a Cidade</option>";
                            foreach($cidade as $row) {
                            echo "<option value='" . $row['id_cidade'] . "' > " . $row['nome_cidade'] . "</option>";
                        }
                    ?>-->
                    <!--</select>-->
                    <em id="cidade_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                </div>
		        
		    </div>
	    </div>
	    
	    <div class="form-group">
		    <div class="row">
		        <div class="col-md-6" style="margin-bottom: 15px;">
				    <label>Logradouro</label><br>
				    <input class="form-control" type="text" placeholder="Logradouro" id="logra" name="logra">
				    <em id="logra_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                </div>
                
                <div class="col-md-6">
                    <label>Número</label><br>
                    <input class="form-control" type="number" placeholder="Número" id="endnum" name="endnum">
                    <em id="endnum_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                </div>
		        
		    </div>
	    </div>
         
         <div class="form-group text-center">
            <button class="btn btn-success" onclick="cadastrarCliente()">
                Cadastrar</button>
         </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        
      </div>

    </div>
  </div>
</div>

<!-- Modal de Opcao de Desconto -->
<div class="modal" id="modalDesconto">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background-color: #30a5ff;">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <h4 class="modal-title">Entre como gerente ou administrador</h4>
            </div>
        </div>  
      </div>
        
      <!-- Modal body -->
      <div class="modal-body" id="desc3">
         
         <div class="form-group">
             <label>Usuário</label>
             <input type="text" name="usuarioDesconto" id="usuarioDesconto" placeholder="Usuário"
             class="form-control">
         </div>
         
         <div class="form-group">
             <label>Senha</label>
             <input type="password" name="senhaDesconto" id="senhaDesconto" placeholder="Senha"
             class="form-control">
         </div>
         
         <div class="form-group alert alert-danger text-center" role="alert" style="display: none;" id="erroUsuario">
            Usuário não encontrado!
        </div>
        
        <div class="form-group alert alert-danger text-center" role="alert" style="display: none;" id="erroUsuario2">
            Este usuário não é gerente ou administrador!
        </div>
         
         <div class="form-group text-center">
            <button class="btn btn-success" onclick="confirmarUsuario()">
                Confirmar Usuário</button>
         </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        
      </div>

    </div>
  </div>
</div>

<!-- Modal de Troca-->
<div class="modal fade" id="modalTroca" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalTrocaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Troca de Produto em Garantia</h5>
      </div>
      <form action="<?php echo base_url('pdv/trocaFinaliza');?>" method="POST" id="formTroca">
      <div class="modal-body" style="height:65vh; overflow-y:auto;">
            <input type="hidden" id="clienteId" name="clienteId">
            <input type="hidden" id="vendedorId" name="vendedorId">
            <input type="hidden" id="lojaId" name="lojaId">
            <input type="hidden" id="listTroca" name="listTroca">
            <div class="row" id="listaTroca1">
                <div class="col-md-1 form-group"><label> </label><a id="lt1" href="#" onclick="newListaTroca(1)"><i class="fa fa-plus fa-3x" aria-hidden="true"></i></a></div>
                <div class="col-md-7 form-group">
                    <label for="trocaProduto">Produto</label>
                    <select class="js-example-basic-multiple form-control" id="trocaProduto" name="trocaProduto[]" style="width: 100%;">
                        <option value="-1" selected disabled hidden>Selecione o Produto</option>
                    <?php foreach($produtos as $row) { ?>
                        <option value="<?php echo $row['produto_id'];?>"> <?php echo $row['produto_nome'];?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="col-md-4 form-group">
                    <label for="trocaValor">Valor (R$)</label>
                    <input onblur="diferenca(this.value)" class="form-control" type="number" min="0,01" step="any" id="trocaValor" name="trocaValor[]" placeholder="Valor do Produto">
                </div>
            </div>    
            
            <div class="col-md-12 form-group" style="text-align:center;"><i class="fa fa-arrow-down fa-3x" aria-hidden="true"></i><i class="fa fa-arrow-up fa-3x" aria-hidden="true"></i></div>
            
            <div class="row" id="trocaNovo">
            </div>
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="trocaProduto">Observações</label>
                    <input class="form-control" type="text" id="trocaObs" name="trocaObs" placeholder="Valor do Produto">
                </div>
            </div>
        
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <input type="button" onclick="submitTroca()" class="btn btn-primary" value="Finalizar" >
      </div>
      </form>
    </div>
  </div>
</div>

<input type="hidden" id="auxTotal">

<script>
    function fechar(){
        $("#pagamento").removeAttr('disabled');
        $("#modalFinalizar").modal('toggle');
        $("#fimCompra").show();
        $("#divForma").hide();
        $("#divForma").empty();
    }
</script>

<script>
    function calcEnvio(){
        var id = $('#formaEnvio').val();
        if(id == 1){
            $("#envioModal").val('0');
            $("#envioModal").prop("disabled", true);
        }else if(id == 2){
            $("#envioModal").val('<?php echo $motoboy;?>');
            $("#envioModal").prop("disabled", true);
        }else if(id == 3){
            $("#envioModal").val('0');
            $("#envioModal").prop("disabled", false);
        } 
    }
    
    function updateEnvio(){
        var valor = $('#envioModal').val();
        var tipo = $( "#formaEnvio option:selected" ).text();
        $('#envio').val(valor);
        $('#formaEnvioTxtFim').html('');
        $('#formaEnvioTxtFim').html(tipo);
        $('#formaEnvioValFim').html('');
        $('#formaEnvioValFim').html(valor);
    }
</script>
<script>
    <?php if($mobile == 1){ ?>
        screen.lockOrientation('landscape');
    <?php } ?>
</script>
<script type="application/javascript">
    $(document).ready(function(){
        $('.number').mask('0#');
        $('.money').mask("###0.00", {reverse: true});
        
        $('.cep').mask('00000-000');
        
        $('.cpf').mask('000.000.000-00', {reverse: true});
         
        var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('.telefone').mask(SPMaskBehavior, spOptions);
    });
</script>
<script>
    function abrirconfig(){
        var div = document.getElementById("configlista").classList.toggle("show");
    }
</script>
<script>
    function buscaCEP(){
        var valor = document.getElementById('cep').value;
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                document.getElementById('logra').value="...";
                // document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                var script = document.createElement('script');
                
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                
                document.body.appendChild(script);
            }
            else {
                limpa_formulário_cep();
                Swal.fire('Cep não encontrado, preencha os dados manualmente.');
            }
        }
        else {
            limpa_formulário_cep();
        }
    }
    
    function limpa_formulário_cep() {
            document.getElementById('logra').value=("");
            // document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");
    }
    
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('logra').value=(conteudo.logradouro);
            // document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);
        }
        else {
            limpa_formulário_cep();
            Swal.fire('Cep não encontrado, preencha os dados manualmente.');
             $("#logra").removeAttr('disabled');
            //  $("#bairro").removeAttr('disabled');
             $("#cidade").removeAttr('disabled');
             $("#estado").removeAttr('disabled');
        }
    }
</script>
<script>
    var table = document.getElementById("myTable2");
    var aux2 = 0;
    var posicaotabela = 0;
    var valor = 0.0;
    var produto;
    var caminho = "<?php echo base_url('assets/uploads/imagens_produtos/');?>";
    var desconto;
    var desconto2;
    var sub;
    var jaexise = 0
    var qtd;
    var total;
    
    //Pega os valores dos inputs e os transfere para a tabela
    function adicionarProduto(){
        
        
        if(document.getElementById('qtd').value == "" || document.getElementById('codigoprod').value == ""){
            document.getElementById( 'erro2' ).style.display = 'block';
        }else{
            document.getElementById( 'erro2' ).style.display = 'none';
            if(parseInt(produto.estoque_qtd) < parseInt(document.getElementById('qtd').value)){
                document.getElementById( 'erroEstoque' ).innerHTML = "Estoque insuficiente, restam apenas " + produto.estoque_qtd  + " unidades";
                document.getElementById( 'erroEstoque' ).style.display = 'block';
            }else{
                document.getElementById( 'erroEstoque' ).style.display = 'none';
                
                if(produto.minimo_venda > parseInt(document.getElementById('qtd').value)){
                    document.getElementById( 'erroEstoque2' ).style.display = 'block';
                }else{
                    document.getElementById( 'erroEstoque2' ).style.display = 'none';
                    jaexiste = 0;
                    
                    for (i=0; i < table.rows.length; i++){
                        colunas = table.rows[i].childNodes;
                        
                        if(colunas[9].innerHTML == document.getElementById('idEstoque').value){
                            jaexiste = 1;
                            qtd = parseInt(colunas[1].innerHTML) + parseInt(document.getElementById('qtd').value);
                            colunas[1].innerHTML = qtd;
                            total = parseFloat(colunas[6].innerHTML) + (parseFloat(colunas[5].innerHTML) * parseFloat(document.getElementById('qtd').value));
                            colunas[6].innerHTML = total.toFixed(2);
                        }
                        
                    }
                    
                    valorTotal();
                    
                    if(jaexiste == 0){
                        aux2++;
                        posicaotabela++;
                        
                        var row = table.insertRow(posicaotabela);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        var cell6 = row.insertCell(5);
                        var cell7 = row.insertCell(6);
                        var cell8 = row.insertCell(7);
                        var cell9 = row.insertCell(8);
                        var cell10 = row.insertCell(9);
                        cell1.style.display = 'none';
                        cell1.innerHTML = aux2;
                        cell2.innerHTML = document.getElementById('qtd').value;
                        cell3.innerHTML = document.getElementById('codigo').value;
                        cell5.innerHTML = document.getElementById('estoqueModelo').value;
                        cell6.innerHTML = document.getElementById('unitario').value;
                        cell7.innerHTML = document.getElementById('total').value;
                        cell8.style.display = 'none';
                        cell8.innerHTML = document.getElementById('idProduto').value;
                        cell9.innerHTML = "<button class='btn btn-primary' onclick='deletarProduto(" + aux2 + ")'><em class='fa fa-trash'></em></button>";
                        cell10.style.display = 'none';
                        cell10.innerHTML = document.getElementById('idEstoque').value;
                        
                        var nome = produto.nome_produto;
                        cell4.innerHTML = nome;
                        
                        var objDiv = document.getElementById("tablefix");
                        objDiv.scrollTop = objDiv.scrollHeight;
                    }
                    
                    var aux = parseFloat(document.getElementById('total').value);
                    valor += aux;
                    
                    subtotal.innerHTML = valor.toFixed(2);
                    
                    sub = parseFloat(document.getElementById('subtotal').innerText);
                    
                    desconto = document.getElementById('desconto').value;
                    desconto2 = 0;
                    
                    if(desconto != "" && desconto != "0"){
                        desconto2 = desconto;
                    }
                    
                    sub -= desconto2;
                    $( "#total2" ).val(sub.toFixed(2));
                }
            }
        }
        
    }
    
    //Busca o produto no banco de dados baseado no código digitado
    function buscarProduto(adicionar){
        
        var loja = document.getElementById('loja_id').value;
        var vendedor = document.getElementById('vendedor_id').value;
        
        if( loja > 0 && vendedor > 0){

            var dados = new FormData();
            dados.append('codigo', document.getElementById('codigoprod').value);
            dados.append('loja', document.getElementById('loja_id').value);
            
            $.ajax({
                url: '<?php echo base_url('pdv/listaProdutoUnicoVisivel/'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                  console.log(error);
                },
                success: function(data) {
                    if(data == "null"){
                        document.getElementById( 'erro' ).style.display = 'block';
                        document.getElementById( 'erro2' ).style.display = 'none';
                        document.getElementById( 'erroEstoque' ).style.display = 'none';
                        document.getElementById( 'erroEstoque2' ).style.display = 'none';
                        document.getElementById( 'erroLoja' ).style.display = 'none';
                        document.getElementById( 'erroVendedor' ).style.display = 'none';
                        document.getElementById('img').src = "";
                    }else{
                        document.getElementById( 'erro' ).style.display = 'none';
                        document.getElementById( 'erro2' ).style.display = 'none';
                        document.getElementById( 'erroEstoque' ).style.display = 'none';
                        document.getElementById( 'erroEstoque2' ).style.display = 'none';
                        document.getElementById( 'erroLoja' ).style.display = 'none';
                        document.getElementById( 'erroVendedor' ).style.display = 'none';
                        produto = jQuery.parseJSON(data);
                        
                        if(produto == 1){
                            document.getElementById( 'erroData' ).style.display = 'block';
                        }else{
                            if(produto.produto_estoque <= 0){
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Temos um problema',
                                    text: 'Todo o estoque já foi vendido!',
                                })
                            }else{
                                document.getElementById( 'erroData' ).style.display = 'none';
                                document.getElementById('unitario').value = produto.produto_valor;
                                document.getElementById('idProduto').value = produto.produto_id;
                                document.getElementById('idEstoque').value = produto.produto_id;
                                document.getElementById('estoqueQtd').value = produto.produto_estoque;
                                
                                valorTotal();
                                
                                if(adicionar == true){
        			                var posicao = document.getElementById('listaCompra').value;
                                    posicao ++;
                                    document.getElementById("listaCompra").value = posicao;
                                    var quant = document.getElementById('qtd').value;
                                    var html = "<tr id='"+posicao+"'><th>" + posicao + "</th><th>" + produto.produto_nome + "</th><th>" + quant + "</th><th>" + produto.produto_valor + "</th><th>" + parseFloat(quant*produto.produto_valor).toFixed( 2 ) + "</th><th><a class='btn btn-sm btn-danger' onclick='deleteItem("+(posicao)+")'><i class='fa fa-times' aria-hidden='true'></i></a></th></tr>";
                                    var sum = parseFloat(quant*produto.produto_valor).toFixed( 2 );
                                    $('#pdvTable > tbody:last-child').append(html);
                                    document.getElementById('codigoprod').value = "0";
                                    $("codigoprod select").val("0");
                                    
                                    var ids = document.getElementById('IdsCompra').value;
                                    var qtd = document.getElementById('qtdCompra').value;
                                    var val = document.getElementById('valCompra').value;
                                    
                                    if(ids == 0){
                                        ids = produto.produto_id;
                                    }else{
                                        ids = ids+"¬"+produto.produto_id;
                                    }
                                    document.getElementById('IdsCompra').value = ids;
                                    
                                    if(qtd == 0){
                                        qtd = quant;
                                    }else{
                                        qtd = qtd+"¬"+quant;
                                    }
                                    document.getElementById('qtdCompra').value = qtd;
                                    
                                    if(val == 0){
                                        val = produto.produto_valor;
                                    }else{
                                        val = val+"¬"+produto.produto_valor;
                                    }
                                    document.getElementById('valCompra').value = val;
                                    
                                    var sub = document.getElementById('subtotal').value;
                                    var desc = document.getElementById('desconto').value;
                                    var aux = document.getElementById('subCaixa').value;
                                    
                                    aux = parseFloat(aux) + parseFloat(sum);
                                    document.getElementById('subCaixa').value = aux;
                                    
                                    var press = parseFloat(aux) - parseFloat(desc);
                                    
                                    document.getElementById('subtotal').value = parseFloat(aux).toFixed(2);
                                    var desconto = $( "#desconto" ).val();
                                    var subtotal = $( "#subtotal" ).val();
                                    
                                    $( "#desconto2" ).text(desconto);
                                    $( "#desconto2" ).val(parseFloat(desconto).toFixed(2));
                                    
                                    var desconto = $( "#desconto" ).val();
                                    var subtotal = $( "#subtotal" ).val();
                                    total = parseFloat(subtotal - desconto);
                                    $( "#total2" ).val(total.toFixed(2));
                                    
                                }else{
                                    document.getElementById('qtd').value = 1;
                                }
                            }
                        }
                    }
            
                },
            });
        }else{
            if(loja == -1){
            document.getElementById( 'erroLoja' ).style.display = 'block';
            }
            if(vendedor == -1){
            document.getElementById( 'erroVendedor' ).style.display = 'block';
            }
        }
    }
    
    //Popula o input de valor total de acordo com a quantidade e o valor unitário
    function valorTotal(){
        var estq = document.getElementById('estoqueQtd').value;
        var qtd = document.getElementById('qtd').value;
        var unitario = document.getElementById('unitario').value;
        if(parseInt(estq) < parseInt(qtd)){
            $("#btnIncluir").prop("disabled",true);
            Swal.fire({
                icon: 'error',
                title: 'Temos um problema',
                text: 'Quantidade maior que estoque atual!',
            })
        }else{
            $("#btnIncluir").prop("disabled",false);
            var val = qtd * unitario;
            document.getElementById('total').value = val.toFixed(2);
        }
    }
    
    //Pega a posicao do produto e o exclui da tabela
    function deletarProduto(id){
        desconto = document.getElementById('desconto').value;
        total = 0;
        var subtotal;
        sub = document.getElementById('subtotal');
        
        for (i=0; i < table.rows.length; i++){
            colunas = table.rows[i].childNodes;
            
            if(colunas[0].innerHTML == id){
                total = parseFloat(colunas[6].innerHTML);
                subtotal =  parseFloat(sub.innerHTML) - total;
                sub.innerHTML =  subtotal.toFixed(2);
                total = sub.innerHTML;
                valor -= parseFloat(colunas[6].innerHTML);
                
                if(desconto != "" && desconto != "0"){
                    desconto2 = parseFloat(desconto);
                }else{
                    desconto2 = 0;
                }
                
                total = parseFloat(total) - desconto2;
                $( "#total2" ).val(total.toFixed(2));
                
                posicaotabela--;
                table.deleteRow(i);
                
            }
        }

    
    }
    
    //Busca os dados da venda e os manda para o modal de venda
    function setaDadosModal3(){
        
        if(document.getElementById('IdsCompra').value == 0){
            Swal.fire({
                        icon: 'error',
                        title: 'Não foi realizada nenhuma compra!',
                    });
        }else{
        
            if(document.getElementById('cliente').value == ""){
                document.getElementById( 'erroCliente' ).style.display = 'block';
            }else{
                document.getElementById( 'erroCliente' ).style.display = 'none';
                
                document.getElementById("subtot").innerText = "R$ " + document.getElementById("total2").value;
                var subtotal = document.getElementById("subtotal").value;
                
                desconto = document.getElementById('desconto').value;
                
                if(desconto != ""){
                    document.getElementById('des').innerText = "R$ " + desconto;
                    var totDesconto = desconto;
                }else{
                    var totDesconto = 0;
                }
                
                acrescimo = document.getElementById("pagamento").value;
                
                if(desconto != ""){
                    document.getElementById('ac').innerText = acrescimo + " %";
                    var totAcrescimo = acrescimo;
                }else{
                    var totAcrescimo = 0;
                }
                
                var envio = $('#envioModal').val();
                
                total = parseFloat(subtotal) - parseFloat(totDesconto);
                total = total + parseFloat(envio);
                document.getElementById('tot').innerText = "R$ " + total.toFixed(2);
                document.getElementById('valorHidden').value = total;
                document.getElementById('auxTotal').value = total;
                
                var clientes = <?php echo json_encode($clientes)?>;
                var cliente = document.getElementById('cliente').value;
                var flag = 0;
                for(var i=0; i<clientes.length; i++) {
                    if(clientes[i].cliente_id == cliente){
                        document.getElementById('cl').innerText = clientes[i].cliente_nome;
                        document.getElementById('clienteHidden').value = clientes[i].cliente_id;
                        flag = 1;
                    }    
                }
    
                if(flag == 0){
                    document.getElementById('cl').innerText = "CONSUMIDOR";
                    document.getElementById('clienteHidden').value = "0";
                }
                
                
                $('#modalFinalizar').modal('show');
                
            }
            
        }
    }
    
    function valueacrescimo() {
        var total =  document.getElementById('auxTotal').value;
        var dados = new FormData();
        dados.append('pagamento', document.getElementById('pagamento').value);
        $.ajax({
            url: '<?php echo base_url('pdv/acrescimo'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
              console.log(erro);
            },
            success: function(data) {
                console.log(data.acrescimo_forma);
                document.getElementById('ac').innerText = data.acrescimo_forma+"%";
                var acre = (parseFloat(total) * (1+(parseFloat(data.acrescimo_forma)/100)));
                var valueA = (parseFloat(total) * (parseFloat(data.acrescimo_forma/100)));
                document.getElementById('valorAcrescimo').value = parseFloat(valueA).toFixed(2);
                document.getElementById('valorHidden').value = parseFloat(acre).toFixed(2);
                document.getElementById('tot').innerText = "R$ "+parseFloat(acre).toFixed(2);
            }
        });
    }
    
    function testeExclui(){
        alert("teste excluir");
    }
    
    function deleteItem(row){
        $('#'+row).remove();
        
        var ids = document.getElementById('IdsCompra').value;
        var splitIds = ids.split("¬");
        splitIds.splice(row-1, 1, 0);
        ids = splitIds.join('¬')
        document.getElementById('IdsCompra').value = ids;
        
        var qtd = document.getElementById('qtdCompra').value;
        var splitQtd = qtd.split("¬");
        splitQtd.splice(row-1, 1, 0);
        qtd = splitQtd.join('¬')
        document.getElementById('qtdCompra').value = qtd;
        
        var val = document.getElementById('valCompra').value;
        var splitVal = val.split("¬");
        splitVal.splice(row-1, 1, 0.0);
        val = splitVal.join('¬')
        document.getElementById('valCompra').value = val;
        
        var sum = parseFloat(0);
        
        for(var i =0; i<splitVal.length; i++){
            sum = parseFloat(sum) + parseFloat(splitVal[i]); 
        }
        
        document.getElementById('subtotal').value = parseFloat(sum).toFixed(2);
        document.getElementById('subCaixa').value = parseFloat(sum).toFixed(2);
        var desconto = $( "#desconto" ).val();
        total = parseFloat(sum - desconto);
        $( "#total2" ).val(total.toFixed(2));
    }
    
    //Percorre a tabela de produtos, os insere na tabela de lista e manda os dados 
    //da compra para serem inseridos no bd
    function finalizaCompra(){
        var tipo = document.getElementById('pagamento').value;
        
        if(tipo == '0'){
            checaForma();
            $("#fimCompra").hide();
            $("#pagamento").prop('disabled', 'disabled');
        }else if(tipo == "troca"){
            trocaCompra();
        }else{
            encerraCompra();
        }
    }
    
    function encerraCompra(){
        var dados = new FormData();
        dados.append('cliente_id', document.getElementById('clienteHidden').value);
        dados.append('id_lista', document.getElementById('IdsCompra').value);
        dados.append('qtd_lista', document.getElementById('qtdCompra').value);
        dados.append('val_lista', document.getElementById('valCompra').value);
        dados.append('pagForm', $("#pagamento").val());
        dados.append('desc', document.getElementById('desconto2').value);
        dados.append('loja', document.getElementById('loja_id').value);
        dados.append('vendedor', document.getElementById('vendedor_id').value);
        dados.append('frete', document.getElementById('envioModal').value);
        dados.append('valorAcrescimo', document.getElementById('valorAcrescimo').value);
        dados.append('formaFrete', $("#formaEnvio option:selected").text());
        
        $.ajax({
            url: '<?php echo base_url('pdv/finalizaCompra'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                console.log(data);
                if(data.id != "" || data.id != null){
                    console.log(data);
                    let timerInterval
                    Swal.fire({
                      title: 'Compra finalizada!',
                      timer: 4000,
                      timerProgressBar: true,
                      didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft();
                        }, 100)
                      },
                      willClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                
                      if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                      }
                    })
                        window.location.reload();
                        window.open('<?php echo base_url('impressoes/geraCupom/');?>'+data.id, '_blank');
                        console.log(data.id);
                     
                }else{
                    let timerInterval
                    Swal.fire({
                      title: 'Erro ao finalizar venda, repita a operação!',
                      timer: 4000,
                      timerProgressBar: true,
                      didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft();
                        }, 100)
                      },
                      willClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                      /* Read more about handling dismissals below */
                      if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                      }
                    })
                        window.location.reload();
                }
            },
        });
    }
    
    function encerraTroca(){
        var dados = new FormData();
        dados.append('clienteId',       document.getElementById('clienteId').value);
        dados.append('vendedorId',      document.getElementById('vendedorId').value);
        dados.append('lojaId',          document.getElementById('lojaId').value);
        dados.append('listTroca',       document.getElementById('listTroca').value);
        dados.append('trocaProduto',    document.getElementById('trocaProduto').value);
        dados.append('valorTroca',      document.getElementById('trocaValor').value);
        dados.append('trocaNovoProduto',document.getElementsByName('trocaNovoProduto').value);
        dados.append('trocaNovoProdID', document.getElementsByName('trocaNovoProdID').value);
        dados.append('trocaValorNovo',  document.getElementsByName('trocaValorNovo').value);
        dados.append('trocaDiferenca',  document.getElementById('trocaDiferenca').value);
        dados.append('pagamentoTroca',  document.getElementById('pagamentoTroca').value);
        dados.append('trocaObs',        document.getElementById('trocaObs').value);
        
        $.ajax({
            url: '<?php echo base_url('pdv/trocaFinaliza'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                console.log(data);
                if(data.id != "" || data.id != null){
                    let timerInterval
                    Swal.fire({
                      title: 'Compra finalizada!',
                      timer: 4000,
                      timerProgressBar: true,
                      didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft();
                        }, 100)
                      },
                      willClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                      /* Read more about handling dismissals below */
                      if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                      }
                    })
                        window.location.reload();
                        window.open('<?php echo base_url('impressoes/geraCupom/');?>'+data.id, '_blank');
                        console.log(data.id);
                        
                }else{
                    let timerInterval
                    Swal.fire({
                      title: 'Erro ao finalizar troca, repita a operação!',
                      timer: 4000,
                      timerProgressBar: true,
                      didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft();
                        }, 100)
                      },
                      willClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                      /* Read more about handling dismissals below */
                      if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                      }
                    })
                        window.location.reload();
                }
            },
        });
    }
    
    function trocaCompra(){
        $('#modalFinalizar').modal('toggle');
        $('#modalTroca').modal('show');
        $('#trocaNovo').empty();
        
        var dados = new FormData();
        dados.append('lista', document.getElementById('IdsCompra').value);
        dados.append('loja', document.getElementById('loja_id').value);

        $.ajax({
            url: '<?php echo base_url('pdv/trocaLista'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                $('#trocaNovo').append(JSON.parse(data));
                document.getElementById('listTroca').value = document.getElementById('IdsCompra').value;
                document.getElementById('clienteId').value = document.getElementById('cliente').value;
                document.getElementById('lojaId').value = document.getElementById('loja_id').value;
                document.getElementById('vendedorId').value = document.getElementById('vendedor_id').value;
            }
        });
    }

    //Atualiza o acréscimo e o total final da barra azul quando eu mudar o acréscimo do input
    function mudarAcrescimo(){
        desconto = document.getElementById('desconto').value;
        var subtotal = document.getElementById('subtotal').value;
        if(desconto != "" && desconto != "0"){
            desconto2 = desconto;
            total -= desconto2;
        }
        $( "#total2" ).val(total.toFixed(2));
    }
    
    //Atualiza o desconto e o total final da barra azul quando eu mudar o desconto do input
    function mudarDesconto(){
        var desconto = $( "#desconto" ).val();
        var subtotal = $( "#subtotal" ).val();
        
        document.getElementById('desconto2').innerText = desconto;
        document.getElementById('desconto2').value = desconto;
        
        var desconto = $( "#desconto" ).val();
        var subtotal = $( "#subtotal" ).val();
        total = parseFloat(subtotal - desconto);
        $( "#total2" ).val(total.toFixed(2));
    }
    
    function opcaoComprovante(){
        
        if(document.getElementById('numFormas') != null){
            var numFormas = document.getElementById('numFormas').value;
            var totalInputs = 0;
            for(var i = 1; i <= numFormas; i++){
                totalInputs += parseFloat(document.getElementById('pagamento' + i).value);
            }
            
            if(totalInputs != document.getElementById('valorHidden').value){
                document.getElementById( 'erroParcelamento' ).style.display = 'block';
            }else{
                document.getElementById( 'erroParcelamento' ).style.display = 'none';
                
                $('#modalFinalizar').modal('hide');
                $('#modalImpressao').modal('show');
            } 
        } else{
            $('#modalFinalizar').modal('hide');
            $('#modalImpressao').modal('show');
        }
    }
    
    //Verifica a forma de pagamento e, se ela for de várias vezes, retorna as
    //opções das várias vezes
    function checaForma(){
        var idPagamento = document.getElementById("pagamento").value;
        var forma;
        
        dados = new FormData();
        dados.append('idPagamento', idPagamento);
        
        $.ajax({
            url: '<?php echo base_url('formas_pagamento/getFormasPdv'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                if(data != 1){
                    $('#divForma').html(data);
                    document.getElementById("divForma").style.display = "block";
                }else{
                    document.getElementById("divForma").style.display = "none";
                }
            },
        });
    }
    
    //Função que confirma o usuário ao tentar habilitar o desconto
    function confirmarUsuario(){
        dados = new FormData();
        dados.append('usuario', document.getElementById('usuarioDesconto').value);
        dados.append('senha', document.getElementById('senhaDesconto').value);
        
        $.ajax({
            url: '<?php echo base_url('validarLogin'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                if(data === 1){
                    document.getElementById("erroUsuario").style.display = "block";
                }else{
                    document.getElementById("erroUsuario").style.display = "none";
                    funcionario = jQuery.parseJSON(data);
                    if(funcionario.tipo_id == 2){
                        document.getElementById("erroUsuario2").style.display = "block";
                    }else{
                        document.getElementById("erroUsuario").style.display = "none";
                        $('#modalDesconto').modal('hide');
                        document.getElementById('btDesconto').style.display="none";
                        document.getElementById('desconto').style.display="block";
                    }
                }
            },
        });
    }
    
    //Funções de cliente -------------------------------------------------------------
    
    var base_url = '<? echo base_url() ?>';

    function test(id_estado){
        document.getElementById('divCid').style.display = 'block';
        $.post(base_url+"lojas/cidadePorEstado", {
            id_estado : id_estado
        }, function(data){
            $('#cidade').html(data);
        });
    }
    
    function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
            // charCode 8 = backspace   
            // charCode 9 = tab
            if (charCode != 8 && charCode != 9) {
                // charCode 48 equivale a 0   
                // charCode 57 equivale a 9
                if (charCode < 48 || charCode > 57) {
                    return false;
                }
            }
        }
        
    function formatarCampo(campoTexto) {
        if (campoTexto.value.length <= 11) {
            campoTexto.value = mascaraCpf(campoTexto.value);
        } else {
            campoTexto.value = mascaraCnpj(campoTexto.value);
        }
    }
    
    function retirarFormatacao(campoTexto) {
        campoTexto.value = campoTexto.value.replace(/(\.|\/|\-)/g,"");
    }
    
    function mascaraCpf(valor) {
        return valor.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/g,"\$1.\$2.\$3\-\$4");
    }
    
    function mascaraCnpj(valor) {
        return valor.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/g,"\$1.\$2.\$3\/\$4\-\$5");
    }
    
    function cadastrarCliente(){
        var flag = 0;
        dados = new FormData();
        
        if(document.getElementById('nome').value != ""){
            $('#nome_erro').hide();
            dados.append('nome', document.getElementById('nome').value);
        }else{
            flag = 1;
            $('#nome_erro').html("Campo Obrigatório");
            $('#nome_erro').show();
        }
        
        if(document.getElementById('cpf').value != ""){
            $('#cpf_erro').hide();
            dados.append('cpf', document.getElementById('cpf').value);
        }else{
            flag = 1;
            $('#cpf_erro').html("Campo Obrigatório");
            $('#cpf_erro').show();
        }
        
        if(document.getElementById('estado').value != ""){
            $('#estado_erro').hide();
            dados.append('estado', document.getElementById('estado').value);
        }else{
            flag = 1;
            $('#estado_erro').html("Campo Obrigatório");
            $('#estado_erro').show();
        }
        
        if(document.getElementById('cidade').value != ""){
            $('#cidade_erro').hide();
            dados.append('cidade', document.getElementById('cidade').value);
        }else{
            flag = 1;
            $('#cidade_erro').html("Campo Obrigatório");
            $('#cidade_erro').show();
        }
        
        /*if(document.getElementById('endereco').value != ""){
            dados.append('endereco', document.getElementById('endereco').value);
        }else{
            flag = 1;
            $('#endereco_erro').html("Campo Obrigatório");
            $('#endereco_erro').show();
        }*/
        
        if(document.getElementById('email').value != ""){
            $('#email_erro').hide();
            dados.append('email', document.getElementById('email').value);
        }else{
            flag = 1;
            $('#email_erro').html("Campo Obrigatório");
            $('#email_erro').show();
        }
        
        if(document.getElementById('telefone').value != ""){
            $('#telefone_erro').hide();
            dados.append('telefone', document.getElementById('telefone').value);
        }else{
            flag = 1;
            $('#telefone_erro').html("Campo Obrigatório");
            $('#telefone_erro').show();
        }
        
        if(document.getElementById('cep').value != ""){
            $('#cep_erro').hide();
            dados.append('cep', document.getElementById('cep').value);
        }else{
            flag = 1;
            $('#cep_erro').html("Campo Obrigatório");
            $('#cep_erro').show();
        }
        
        if(document.getElementById('logra').value != ""){
            $('#logra_erro').hide();
            dados.append('logra', document.getElementById('logra').value);
        }else{
            flag = 1;
            $('#logra_erro').html("Campo Obrigatório");
            $('#logra_erro').show();
        }
        
        if(document.getElementById('endnum').value != ""){
            $('#endnum_erro').hide();
            dados.append('endnum', document.getElementById('endnum').value);
        }else{
            flag = 1;
            $('#endnum_erro').html("Campo Obrigatório");
            $('#endnum_erro').show();
        }
        
        if(document.getElementById('loja_id').value != ""){
            $('#loja_erro').hide();
            dados.append('loja', document.getElementById('loja_id').value);
        }else{
            flag = 1;
            $('#loja_erro').html("Obrigatório informar uma Loja");
            $('#loja_erro').show();
        }
        
        if(flag == 0){
        
            $.ajax({
                url: base_url+"completarcadastro/cadastrarCliente",
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                  
                },
                success: function(data) {
                    if(data == 1){
                        document.getElementById( 'erroCliente1' ).style.display = 'block';
                    }else{
                        document.getElementById( 'erroCliente1' ).style.display = 'none';
                        if(data == 2){
                            document.getElementById( 'erroCliente2' ).style.display = 'block';
                        } else{
                            document.getElementById( 'erroCliente2' ).style.display = 'none';
                            //$('#modalCliente').modal('hide');
                            //$('#cliente').html(data);
                            location.reload();
                        }
                    }
                    
                },
            });
        
        }
    }
    
    function buscaModelos(valor){
        document.getElementById('divhidden').style.display = 'block';
        $.post(base_url+"pdv/modelosProd", {
            valor : valor
        }, function(data){
            $('#codigo').html(data);
        });
    }
</script>
<script>
    function newListaTroca(id){
        dados = new FormData();
        dados.append('row', id);
        $.ajax({
            url: '<?php echo base_url('pdv/newSelectTrocaLista'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                $('#listaTroca'+id).after(JSON.parse(data));
                $('.js-example-basic-multiple').select2();
            }
        });
    }
    
    function diferenca(valor){
        var sum0 = 0.0;
        var sum1 = 0.0;
        var final = 0.0; 
        
        $('input[name^="valorTroca"]').each( function( i , e ) {
            var v = parseFloat( $( e ).val() );
            if ( !isNaN( v ) )
                sum0 += v;
        } );

        $('input[name^="trocaValorNovo"]').each( function( i , e ) {
            var v = parseFloat( $( e ).val() );
            if ( !isNaN( v ) )
                sum1 += v;
        } );
        
        final = sum1 - sum0;
        $("#trocaDiferenca").val(parseFloat(final).toFixed(2));
        if(final <=0){
            $("#pagamentoTroca").prop("disabled",true);
        }else{
            $("#pagamentoTroca").prop("disabled",false);
        }
    }
    
    function submitTroca(){
        
        var diferenca = document.getElementById('trocaDiferenca').value;
        
        if(parseFloat(diferenca) <= parseFloat(0)){
            document.getElementById("formTroca").submit();
        }else{
            Swal.fire({
                title: 'Confirma o recebimento de R$'+diferenca+'?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: 'Sim',
                denyButtonText: `Não`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire('Troca realizada!', '', 'success');
                    document.getElementById("formTroca").submit();
                    //encerraTroca()
                } else if (result.isDenied) {
                    Swal.fire('Existe valor a ser pago.', '', 'info');
                }
            })
        }
    }
</script>
<script>
    
    function cancelaCompra(){
        dados = new FormData();
        dados.append('usuario', document.getElementById("usuarioDesconto1").value);
        dados.append('senha', document.getElementById("senhaDesconto1").value);
        $.ajax({
            url: '<?php echo base_url('pdv/cancelaCompra'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',            
            success: function(data) {
                if(data.success == "Confere"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Compra Cancelada',
                    });
                    $('#modalCancelaUltimaVenda').modal('hide');
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuário/Senha errado',
                    });
                    $('#modalCancelaUltimaVenda').modal('hide');
                }
            }
        });
    }
    
    function fechaCaixa(){
        dados = new FormData();
        dados.append('usuario', document.getElementById("usuarioDesconto2").value);
        dados.append('senha', document.getElementById("senhaDesconto2").value);
        $.ajax({
            url: '<?php echo base_url('pdv/fechaCaixa'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                console.log(data.success);
                if(data.success == "Confere"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Caixa Fechado',
                    });
                    $('#modalFechaCaixa').modal('hide');
                    setTimeout(function() {
                        location.replace('<?php echo base_url('106a6c241b8797f52e1e77317b96a201');?>');
                        window.open('<?php echo base_url('impressoes/fechaCaixa');?>', '_blank');
                    }, 1500)
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuário/Senha errado',
                    });
                    $('#modalFechaCaixa').modal('hide');
                }
            }
        });
    }
    
    function ultimaVenda(){
        dados = new FormData();
        dados.append('funcionario', <?php echo $_SESSION['func_id'];?>);
        dados.append('loja', <?php echo $_SESSION['loja_id'];?>);
        $.ajax({
            url: '<?php echo base_url('pdv/fechaCaixa'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(data) {
                console.log(data.success);
                if(data.success == "Confere"){
                    Swal.fire({
                        icon: 'success',
                        title: 'Caixa Fechado',
                    });
                    $('#modalFechaCaixa').modal('hide');
                    setTimeout(function() {
                        location.replace('<?php echo base_url('106a6c241b8797f52e1e77317b96a201');?>');
                        window.open('<?php echo base_url('impressoes/fechaCaixa');?>', '_blank');
                    }, 1500)
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Usuário/Senha errado',
                    });
                    $('#modalFechaCaixa').modal('hide');
                }
            }
        });
    }
</script>
<script>
    function valueacrescimo2(forma, id) {
        
        var total =  document.getElementById('auxTotal').value;
        var dados = new FormData();
        dados.append('pagamento', forma);
        $.ajax({
            url: '<?php echo base_url('pdv/acrescimo'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
              console.log(erro);
            },
            success: function(data) {
                if(id == 1){
                    $("#dualAcrescimo1").val(data.acrescimo_forma);
                    $("#pagamento"+id).attr("readonly", false);
                    $("#forma"+id).prop('disabled', 'disabled');
                }else if(id == 2){
                    $("#dualAcrescimo2").val(data.acrescimo_forma);
                    $("#pagamento"+id).attr("readonly", false);
                    $("#forma"+id).prop('disabled', 'disabled');
                }
                
                var a = parseFloat($("#dualAcrescimo1").val()).toFixed(2);
                var b = parseFloat($("#dualAcrescimo2").val()).toFixed(2);
                var sum = parseFloat(a) + parseFloat(b);
                $("#dualAcresTotal").val(sum);
                
                document.getElementById('ac').innerText = $("#dualAcresTotal").val()+"%";
                var acre = (parseFloat(total) * (1+(parseFloat($("#dualAcresTotal").val())/100)));
                document.getElementById('valorHidden').value = parseFloat(acre).toFixed(2);
                document.getElementById('tot').innerText = "R$ "+parseFloat(acre).toFixed(2);
            }
        });
    }
    
    function validavalor(valor){
        if($("#auxValRest").val() == ""){
            var tot = $("#valorHidden").val();
            var rest = parseFloat(tot) - parseFloat(valor);
        }else{
            var hidd = $("#valorHidden").val();
            var aux1 = $("#pagamento1").val();
            var aux2 = $("#pagamento2").val();
            var form1 = $("#forma1").val();
            var form2 = $("#forma2").val();
            var rest = parseFloat(hidd) - ( parseFloat(aux1) + parseFloat(aux2) );
            var help = aux1+"¬"+aux2;
            var help2 = form1+"¬"+form2;
            
        }
        
        $("#auxValRest").val(parseFloat(rest).toFixed(2));
        
        $('#pagamento_erro').html("Falta " + parseFloat($("#auxValRest").val()).toFixed(2) + " do valor total.");
        
        if(parseFloat(rest).toFixed(2) != parseFloat(0).toFixed(2)){
            $('#erroForma').hide();
            $('#pagamento_erro').show();
            $(".btnfinalizavenda").remove();
        } else {
            var button = "<button type='button' class='btn btn-success btnfinalizavenda' onclick='encerraCompra2()'>Finalizar Venda</button>";
            $('#hiddenForma').val(help);
            $('#hiddenForma2').val(help2);
            $('#pagamento_erro').hide();
            $('#dualFimCompra').append(button);
            $('#dualFimCompra').show();
        }
    }
    
function encerraCompra2(){
        
        var dados = new FormData();
        dados.append('cliente_id', document.getElementById('clienteHidden').value);
        dados.append('id_lista', document.getElementById('IdsCompra').value);
        dados.append('qtd_lista', document.getElementById('qtdCompra').value);
        dados.append('val_lista', document.getElementById('valCompra').value);
        dados.append('pagForm', $("#hiddenForma2").val());
        dados.append('desc', document.getElementById('desconto2').value);
        dados.append('loja', document.getElementById('loja_id').value);
        dados.append('vendedor', document.getElementById('vendedor_id').value);
        dados.append('frete', document.getElementById('envioModal').value);
        dados.append('formaFrete', $("#formaEnvio option:selected").text());
        dados.append('valForm', $("#hiddenForma").val());
                        
        $.ajax({
            url: '<?php echo base_url('pdv/finalizaCompra'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                console.log(data);
                if(data.id != "" || data.id != null){
                    let timerInterval
                    Swal.fire({
                      title: 'Compra finalizada!',
                      timer: 4000,
                      timerProgressBar: true,
                      didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft();
                        }, 100)
                      },
                      willClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                      if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                      }
                    })
                        window.location.reload();
                        window.open('<?php echo base_url('impressoes/geraCupom/');?>'+data.id, '_blank');
                        console.log(data.id);
                        
                }else{
                    let timerInterval
                    Swal.fire({
                      title: 'Erro ao finalizar venda, repita a operação!',
                      timer: 4000,
                      timerProgressBar: true,
                      didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                          b.textContent = Swal.getTimerLeft();
                        }, 100)
                      },
                      willClose: () => {
                        clearInterval(timerInterval)
                      }
                    }).then((result) => {
                      if (result.dismiss === Swal.DismissReason.timer) {
                        console.log('I was closed by the timer')
                      }
                    })
                        window.location.reload();
                }
            },
        });
    }
</script>
<script>
    function verificaSenha(local){
        var verify = $("#loja_id").val();
        if(verify != 0){
            if(local == "cancela"){
                $("#modalCancelaUltimaVenda").modal('toggle');
            }else if(local == "reimprime"){
                $("#modalReimprimeUltimaVenda").modal('toggle');
            }else if(local == "fecha"){
                $("#modalFechaCaixa").modal('toggle');
            }
        }else{
            if(local == "cancela"){
                Swal.fire('Administrador do Sistema não pode cancelar compras.');
            }else if(local == "reimprime"){
                Swal.fire('Administrador do Sistema não pode reimprimir compras.');
            }else if(local == "fecha"){
                Swal.fire('Administrador do Sistema não pode fechar o caixa.');
            }
        }
    }
</script>
<script>
        function liberaTroca(){
        var id = $("#cliente").val();
        if(id != 1){
            var opt = "<option value='troca'>Troca</option>";
            $('#pagamento').append(opt);
        }else{
            $("#pagamento option:contains(Troca)").remove();
        }
    }
</script>