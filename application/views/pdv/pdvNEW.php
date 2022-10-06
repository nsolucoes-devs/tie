<?php
    $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
    $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
    $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
    $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
    $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
    $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
    $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
    if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
        $mobile = 1;
    } else {
        $mobile = 0;
    }
?>
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
        margin-top: -21px;
        padding: 10% 10%;
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
</style>

<div class="row" style="<?php if($mobile == 1){ ?>width: 100%; padding: 5% 0% 0 8%; margin-bottom: -10%;<?php }else{ ?> padding: 2% 0% 0 2%; margin-right: 1%; margin-bottom: -10%;  <?php } ?>">
    <div class="col-md-4">
        <!-- Dados do Produto -->
        <div class="row" style="margin-bottom: 5px;">
            <div class="col-md-12">
                <!--<div class="form-group">-->
                <!--    <a href="<?php echo base_url('pdv/voltarPdv/');?>" class="btn btn-primary" style="width: 100%">VOLTAR</a>-->
                <!--</div>-->
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
                    Produto ainda não disponível
                </div>
                <div class="form-group" <?php if($mobile ==0){ ?> style="margin-bottom: -10px;" <?php } ?> >
                    
                        <div class="row">
                            <div class="col-sm-6">
                                <label><b>Loja</b></label>
                            </div>
                            <div class="col-sm-6">
                                <label><b>Vendedor</b></label>
                                
                                <a onclick="abrirconfig()" style="background-color: #30a5ff!important; height: 30px; font-size: 13px; font-weight: bold; 
                                box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%); margin-left: 69%; padding-top: 7px; position: relative; top: -45px; left: 14%; margin-bottom: -16%;" 
                                class="btn btn-primary"><em class="fa fa-cog"></em></a>
                                <div id="configlista" style="position: absolute; z-index: 999; display: none; width: 40%; margin-left: 53%;">
                                    <div class="drop-content-pdv" style="width: 195%; position: relative; left: -105%;">
                                        <a href=""><p style="text-align: right">Reimprimir Última Venda</p></a>
                                        <a data-toggle="modal" data-target="#modalCancelaUltimaVenda"><p style="text-align: right">Cancelar Última Venda</p></a>
                                        <a data-toggle="modal" data-target="#modalFechaCaixa"><p style="text-align: right">Fechar Caixa</p></a>
                                        <a href="<?php echo base_url('106a6c241b8797f52e1e77317b96a201') ?>"><p style="text-align: right">Voltar</p></a>
                                    </div>
                                </div>
                            </div>
                            <hr style="position: relative; top: 25px; width: 94%;">
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <select class="form-control" id="loja_id" onchange="diasDash(false)" style="margin-bottom: 3%;" <?php if($block != 0){ echo "disabled";}?>>
                                    <option selected disabled>Loja</option>
                                    <?php
                                    foreach($lojas as $loja){ ?>
                                     <option <?php if($place == $loja['id']){ echo "selected";}?> value="<?php echo $loja['id'] ?>"><?php echo $loja['nome']?></option>
                                        
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" id="vendedor_id" onchange="diasDash(false)" style="margin-bottom: 3%;">
                                    <option value="-1" selected disabled>Vendedor</option>
                                    <?php
                                    foreach($vendedor as $vend){ ?>
                                     <option value="<?php echo $vend['id_funcionario'] ?>"><?php echo $vend['nome_funcionario']?></option>
                                        
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    
                    <label><b>Produtos</b></label>
                    
                    <hr>
                    
                    <select class="js-example-basic-multiple form-control" onchange="buscarProduto(false)"  id="codigoprod" name="codigoprod" style="width: 100%;">
                        <option value="0" selected disabled hidden>Selecione o Produto</option>
                        <?php 
                            foreach($produtos as $row) {
                                echo "<option value='" . $row['produto_id'] . "'>" . $row['produto_nome'] . "</option>";
                            }
                        ?>
                    </select>
                    <!--<label>Modelo / Cor</label>-->
                    <!--<div style="width: 100%" id="divhidden">-->
                    <!--    <select class="js-example-basic-multiple form-control" style="width: 100%" id="codigo" name="codigo" onchange="buscarProduto(false)">-->

                    <!--    </select><br>-->
                    <!--</div>-->
                </div>
                <br>
                <div class="form-group" <?php if($mobile ==0){ ?> style="margin-bottom: -5px;" <?php } ?> >
                    <?php if($mobile == 0){ ?>
                        <div class="row">
                            <div class="col-md-4">
                                <label><b>Quantidade</b></label>
                                <input oninput="valorTotal()" type="number" value="1" name="qtd" id="qtd" placeholder="Qtd" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label><b>Valor Unitário</b></label>
                                <input type="number" disabled name="unitario" id="unitario" placeholder="R$" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label><b>Valor Total</b></label>
                                <input type="number" disabled name="total" id="total" placeholder="R$" class="form-control">
                            </div>
                            <input type="hidden" name="idProduto" id="idProduto">
                            <input type="hidden" name="idEstoque" id="idEstoque">
                            <input type="hidden" name="estoqueModelo" id="estoqueModelo">
                        </div>
                    <?php }else{ ?>
                         <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <label><b>Quantidade</b></label>
                                    <input oninput="valorTotal()" type="number" value="1" name="qtd" id="qtd" placeholder="Qtd" class="form-control">
                                </div>
                                <br>
                                <div class="col-md-4">
                                    <label><b>Valor Unitário</b></label>
                                    <input type="number" disabled name="unitario" id="unitario" placeholder="R$" class="form-control">
                                </div>
                                <br>
                                <div class="col-md-4">
                                    <label><b>Valor Total</b></label>
                                    <input type="number" disabled name="total" id="total" placeholder="R$" class="form-control">
                                </div>
                                <input type="hidden" name="idProduto" id="idProduto">
                                <input type="hidden" name="idEstoque" id="idEstoque">
                                <input type="hidden" name="estoqueModelo" id="estoqueModelo">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <br>
                <div class="form-group text-center" <?php if($mobile ==0){ ?> style="margin-bottom: -5px;" <?php } ?> >
                    <button type="button" class="btn btn-primary" onclick="buscarProduto(true)" 
                    style="width: 100%; background-color: #30a5ff!important; 
                    height: 45px; font-size: 20px; font-weight: bold; box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%);">
                        INCLUIR</button>
                </div>
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
                    <div class="form-group">
                        <label for="cliente"><b>Cliente</b></label><hr>
                        <div class="row">
                            <div class="col-xs-10">
                                 <select style="width: 100%" class="js-example-basic-multiple" id="cliente" name="cliente">
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
                            
                            <div class="col-xs-2">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modalCliente"
                                style="background-color: #30a5ff!important; box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%)">
                                    <em class="fa fa-plus"></em></button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div id="divAcres" >
                        <div class="form-group">
                            <!--<label for="acrescimo"><b>Acréscimo</b></label><hr>-->
                            <input type="hidden" placeholder="R$" id="acrescimo" name="acrescimo" class="form-control" oninput="mudarAcrescimo()">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="desconto"><b>Desconto:</b></label><hr>
                             
                            <button style="background-color: #30a5ff!important; box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%); width: 100%; height: 45px; font-size: 20px; font-weight: bold;<?php //if($this->session->userdata('tipo_pessoa') == 3) echo "display: none";
                    //else echo "display: block;"?> width: 45%;" id="btDesconto" class="btn btn-primary" data-toggle="modal" data-target="#modalDesconto">HABILITAR</button>
                            
                            <input style="<?php // if($this->session->userdata('tipo_pessoa') == 3) echo "display: block";
                    // else echo "display: none;"?> width: 45%; position: relative; top: -39px; left: 55%; margin-bottom: -45px;" type="number" placeholder="R$" id="desconto" name="desconto" class="form-control" oninput="mudarDesconto()">
                    
                        </div>
                    </div>
       
                </div>
            </div>
        </div>

    </div>
    
    <!-- Subtotal -->
    <div class="col-md-8" style="position: relative; z-index: 1;">
        	<div>
        		<input type="hidden" id="listaCompra" value="0">
                <input type="hidden" id="IdsCompra" value="0">
                <input type="hidden" id="qtdCompra" value="0">
                <input type="hidden" id="valCompra" value="0">
                <input type="hidden" id="subCaixa" value="0">
                        
                </div>
        <!-- Tabela de Produtos -->
        <div class="panel panel-default" style="height: 323px;<?php if($mobile == 1){ ?>border: 0px;<?php } ?>; overflow:auto">
            <div class="panel-body" style="position: relative; z-index: 0;<?php if($mobile == 1){ ?>border: 0px; background-color: #f7f7f7;<?php } ?>; overflow: auto">
                <div class="tableFixHead" id="tablefix">
                    <table id="pdvTable" style="position: relative; z-index: 2;<?php if($mobile == 1){ ?>width: 113%; left: -7%;<?php } ?>"> <!--id="myTable2" class="table table-hover table-bordered"-->
    				    <thead> 
    				        <tr>
    				            <th>Cod</th>
                                <th>Produto</th>
                                <th>Qtd</th>
                                <th>Valor Un</th>
                                <th>Valor Tot</th>
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
            <?php if($mobile == 0){ ?>
                <div class="row">
                    <!--<div class="col-md-4 text-right">-->
                    <!--    <div class="row text-center" style="margin: 0px;">-->
                    <!--        <h4 style="color: white;">SUBTOTAL</h4>-->
                    <!--    </div>-->
                    <!--    <div class="row">-->
                    <!--        <div class="col-xs-6">-->
                    <!--            <h4 style="color: white; float: right;">R$</h4>-->
                    <!--        </div>-->
                    <!--        <div class="col-xs-6">-->
                    <!--            <input id="subtotal" style="color: white; float: left; background:transparent; border:none; position: relative; top: 6px; left: -7%; font-size: 18px;" disabled>-->
                    <!--        </div>  -->
                    <!--    </div>-->
                    <!--</div>-->
                  
                    <!--<div class="col-md-3 text-center">-->
                        <!--<div class="row" style="margin: 0px;">-->
                        <!--    <h4 style="color: white;">ACRÉSCIMO</h4>-->
                        <!--</div>-->
                        <!--<div class="row">-->
                        <!--    <div class="col-xs-6">-->
                        <!--        <h4 style="color: white; float: right;">R$</h4>-->
                        <!--    </div>-->
                        <!--    <div class="col-xs-6">-->
                        <!--        <input id="acrescimo2" style=" color: white; float: left;  background:transparent; border:none;"disabled>-->
                        <!--    </div> -->
                        <!--</div>-->
                    <!--</div>-->
                    
                    <div class="col-md-6 text-center">
                        <div class="row" style="margin: 0px;">
                            <h4 style="color: white; font-weight: bold;">DESCONTO</h4>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <h4 style="color: white; float: right; font-weight: bold;">R$</h4>
                            </div> 
                            <div class="col-xs-6">
                                <input id="desconto2" style="color: white; float: left; font-weight: bold; background:transparent; border:none;" disabled>
                            </div> 
                        </div>
                    </div>
                    
                    <div class="col-md-6 text-center">
                        <div class="row" style="margin: 0px;">
                            <h4 style="color: white; font-weight: bold;">TOTAL VENDA</h4>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <h4 style="color: white; float: right; font-weight: bold;">R$</h4>
                            </div>
                            <div class="col-xs-6">
                                <input id="total2" style=" color: white; float: left; font-weight: bold; background:transparent; border:none; width: 100%;" disabled>
                            </div>  
                        </div>
                    </div>
                </div>
            <?php }else{ ?>
                <table style="text-align: center;">
                    <tr>
                        <td style="color: white; font-size: 16px;"><b>ACRÉSCIMO</b></td>
                        <td style="color: white; font-size: 16px;"><b>DESCONTO</b></td>
                    </tr>
                    <tr>
                        <td style="color: white;"><label>R$ </label><input id="acrescimo2">0,00</input></td>
                        <td style="color: white;"><label>R$ </label><input id="desconto2">0,00</input></td>
                    </tr>
                </table>
                <table style="text-align: center; position: relative; left: -3%;">
                    <tr>
                        <td style="color: white; font-size: 16px;"><b>SUBTOTAL</b></td>
                        <td style="color: gold; font-size: 16px;"><b>TOTAL</b></td>
                    </tr>
                    <tr>
                        <td style="color: white;"><label>R$ </label><input id="subtotal"></input></td>
                        <td style="color: gold; font-size: 14px;"><label>R$ </label><input id="total2"></input></td>
                    </tr>
                </table>
            <?php } ?>
            </div>
        </div>
        </div>
        
        <div style="margin-bottom: 30px; position: relative; z-index: 99;">
            <a class="btn btn-primary" onclick="window.location.reload();" style="<?php if($mobile == 0){ ?>width: 49%;<?php }else{ ?> width: 48%;<?php } ?>padding: 20px; font-size: 20px; font-weight: bold; background-color: red!important; border: 0px; box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%);" >CANCELAR</a>
            <a class="btn btn-primary" onclick="setaDadosModal3()" style="<?php if($mobile == 0){ ?>width: 49%;<?php }else{ ?> width: 48%;<?php } ?>padding: 20px; font-size: 20px; font-weight: bold; background-color: green; border: 0px; margin-left: 1.5%;  box-shadow: 0 0px 0px 0px rgb(0 0 0 / 14%), 0 0px 0px 0px rgb(156 39 176 / 40%);" >FINALIZAR</a>
        </div>
    
        <div class="form-group alert alert-danger" role="alert" style="display: none; margin-top: 30px;" id="erroCliente">
            Selecione um Cliente!
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
                <h4 class="modal-title">Entre como gerente ou administrador</h4>
            </div>
        </div>  
      </div>
        
      <!-- Modal body -->
      <div class="modal-body">
         
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

<!-- Modal Fechar Caixa -->
<div class="modal" id="modalFechaCaixa">
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
      <div class="modal-body">
         
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
             <div class="col-xs-6">
                 <b>Subtotal:</b>
             </div>
             <div class="col-xs-6">
                 <p id="subtot" style="float: right"></p>
             </div>
         </div>
         <div class="form-group">
             <div class="col-xs-6">
                 <b>Acréscimo:</b>
             </div>
             <div class="col-xs-6">
                 <p id="ac" style="float: right" >0 %</p>
             </div>
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
                 <select id="pagamento" name="pagamento" class="form-control" style="width: 100%">
                     <option value='' selected disabled hidden>Selecione a forma de pagamento</option>
                     <?php foreach($formas as $row) {
                            echo "<option value='" . $row['id_forma'] . "' > " . $row['nome_forma'] . "</option>";
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
         
         <div class="form-group text-center">
            <button class="btn btn-success" onclick="finalizaCompra()">
                Finalizar Venda</button>
         </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        
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
         
        <div class="form-group">
			<label>Nome</label>
			<input class="form-control" 
			type="text" placeholder="Nome" id="nome" name="nome">
		</div>

		<div class="form-group">
		    <div class="row">
		        <div class="col-md-6">  
					<label>CPF / CNPJ do Cliente</label>
					<input type="text" class="form-control" onkeypress="return somenteNumeros(event)" onblur="javascript: formatarCampo(this);" maxlength="14" 
					placeholder="Digite sem pontos e traços" id="cpf" name="cpf" required>
                    <h4 class="text-danger" id="erroCliente1" style="display: none">CPF / CNPJ JÁ CADASTRADO!</h4>
                    <h4 class="text-danger" id="erroCliente2" style="display: none">CPF / CNPJ INVÁLIDO!</h4>

				</div>
				<div class="col-md-6">  
					<label>Email</label>
					<input type="email" class="form-control" 
					placeholder="Email" id="email" name="email" >
				</div>
			</div>
		</div>
		
		<div class="row">
		    <div class="form-group">
		        <div class="col-md-6" style="margin-bottom: 15px;">
				    <label>Estado</label><br>
                    <select style="width: 100%" class="js-example-basic-multiple form-control" id="estado" name="estado" onchange='test($(this).val())'>
                    <?php echo"<option value='' selected disabled hidden>Selecione o Estado</option>";
                            foreach($estado as $row) {
                            echo "<option value='" . $row['id_estado'] . "' > " . $row['nome_estado'] . " - " . $row['uf_estado'] . "</option>";
                        }
                    ?>
                    </select>
                </div>
                
                <label style="margin-left:18px">Cidade</label><br>
                <div class="col-md-6" style="display:none;" id="divCid">
                    <select style="width: 100%" class="js-example-basic-multiple form-control" id="cidade" name="cidade" >
                        <?php echo"<option value='' selected disabled>Selecione a Cidade</option>";
                            foreach($cidade as $row) {
                            echo "<option value='" . $row['id_cidade'] . "' > " . $row['nome_cidade'] . "</option>";
                        }
                    ?>
                    </select>
                </div>
		        
		    </div>
	    </div>
		
	<div class="form-group">
	    <div class="row">
	        <div class="col-md-6">
				<label>Endereço:</label>
				<input class="form-control"  
				type="text" placeholder="Endereço" id="endereco" name="endereco" >

			</div>
			<div class="col-md-6">
				<label>Telefone:</label>
				<input class="form-control" 
				type="number" placeholder="Telefone" id="telefone" name="telefone" data-mask="00000000000" >

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
      <div class="modal-body">
         
         <div class="form-group">
             <label>Usuário</label>
             <input type="text" name="usuarioDesconto3" id="usuarioDesconto3" placeholder="Usuário"
             class="form-control">
         </div>
         
         <div class="form-group">
             <label>Senha</label>
             <input type="password" name="senhaDesconto3" id="senhaDesconto3" placeholder="Senha"
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

<script>
    function abrirconfig(){
        var div = document.getElementById("configlista").classList.toggle("show");
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
    var acrescimo;
    var acrescimo2;
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
                    
                    acrescimo2 = 0;
                    acrescimo = document.getElementById('acrescimo').value;
                    if(acrescimo != "" && acrescimo != "0"){
                        acrescimo2 = parseFloat(acrescimo);
                    }
                    sub += acrescimo2;
                    

                    desconto = document.getElementById('desconto').value;
                    desconto2 = 0;
                    
                    if(desconto != "" && desconto != "0"){
                        desconto2 = desconto;
                        
                    }
                    
                    sub -= desconto2;
                    
                    document.getElementById('total2').innerText = sub.toFixed(2);
                }
            }
        }
        
    }
    
    //Busca o produto no banco de dados baseado no código digitado
    function buscarProduto(adicionar){
        var dados = new FormData();
        dados.append('codigo', document.getElementById('codigoprod').value);
        
        $.ajax({
            url: '<?php echo base_url('pdv/listaProdutoUnicoVisivel/'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                if(data == "null"){
                    document.getElementById( 'erro' ).style.display = 'block';
                    document.getElementById( 'erro2' ).style.display = 'none';
                    document.getElementById( 'erroEstoque' ).style.display = 'none';
                    document.getElementById( 'erroEstoque2' ).style.display = 'none';
                }else{
                    document.getElementById( 'erro' ).style.display = 'none';
                    document.getElementById( 'erro2' ).style.display = 'none';
                    document.getElementById( 'erroEstoque' ).style.display = 'none';
                    document.getElementById( 'erroEstoque2' ).style.display = 'none';
                    produto = jQuery.parseJSON(data);
                    
                    if(produto == 1){
                        document.getElementById( 'erroData' ).style.display = 'block';
                    }else{
                        document.getElementById( 'erroData' ).style.display = 'none';
                        document.getElementById('unitario').value = produto.produto_valor;
                        document.getElementById('idProduto').value = produto.produto_id;
                        document.getElementById('idEstoque').value = produto.produto_id;
                        //document.getElementById('estoqueModelo').value = produto.estoque_modelo;
                        
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
                            var acre = document.getElementById('acrescimo').value;
                            var desc = document.getElementById('desconto').value;
                            var aux = document.getElementById('subCaixa').value;
                            
                            aux = parseFloat(aux) + parseFloat(sum);
                            document.getElementById('subCaixa').value = aux;
                            
                            var alem = parseFloat(acre) - parseFloat(desc);
                            
                            var press = parseFloat(aux) + parseFloat(alem);
                            
                            document.getElementById('subtotal').value = parseFloat(aux).toFixed(2);
                            document.getElementById('acrescimo2').value = parseFloat(acre).toFixed(2);
                            document.getElementById('desconto2').value = parseFloat(desc).toFixed(2);
                            document.getElementById('total2').value = parseFloat(press).toFixed(2);;
                            
                        }else{
                            document.getElementById('qtd').value = 1;
                        }
                    }
                }
        
            },
        });
    }
    
    //Popula o input de valor total de acordo com a quantidade e o valor unitário
    function valorTotal(){
        var qtd = document.getElementById('qtd').value;
        var unitario = document.getElementById('unitario').value;
        
        var val = qtd * unitario;
        document.getElementById('total').value = val.toFixed(2);
    }
    
    //Pega a posicao do produto e o exclui da tabela
    function deletarProduto(id){
        acrescimo = document.getElementById('acrescimo').value;
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
                
                if(acrescimo != "" && acrescimo != "0"){
                    acrescimo2 = parseFloat(acrescimo);
                }else{
                    acrescimo2 = 0;
                }
                
                total = parseFloat(total) - desconto2 + acrescimo2;
                
                document.getElementById('total2').innerText = total.toFixed(2);
                
                posicaotabela--;
                table.deleteRow(i);
                
            }
        }

    
    }
    
    //Busca os dados da venda e os manda para o modal de venda
    function setaDadosModal3(){
        
        if(document.getElementById('cliente').value == ""){
            document.getElementById( 'erroCliente' ).style.display = 'block';
        }else{
            document.getElementById( 'erroCliente' ).style.display = 'none';
            
            document.getElementById("subtot").innerText = "R$ " + document.getElementById("total2").value;
            var subtotal = document.getElementById("subtotal").value;
            
            acrescimo = document.getElementById('acrescimo').value;
            if(acrescimo != ""){
                document.getElementById('ac').innerText = "R$ " + acrescimo;
                var totAcrescimo = acrescimo;
            }else{
                var totAcrescimo = 0;
            }
            
            desconto = document.getElementById('desconto').value;
            
            if(desconto != ""){
                document.getElementById('des').innerText = "R$ " + desconto;
                var totDesconto = desconto;
            }else{
                var totDesconto = 0;
            }

            total = parseFloat(subtotal) + parseFloat(totAcrescimo) - parseFloat(totDesconto);
            document.getElementById('tot').innerText = "R$ " + total.toFixed(2);
            document.getElementById('valorHidden').value = total;
            
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

    }
    
    //Percorre a tabela de produtos, os insere na tabela de lista e manda os dados 
    //da compra para serem inseridos no bd
    function finalizaCompra(){

        var dados = new FormData();
        dados.append('cliente_id', document.getElementById('clienteHidden').value);
        dados.append('id_lista', document.getElementById('IdsCompra').value);
        dados.append('qtd_lista', document.getElementById('qtdCompra').value);
        dados.append('val_lista', document.getElementById('valCompra').value);
        dados.append('pagForm', document.getElementById('pagamento').value);
        dados.append('acres', document.getElementById('acrescimo2').value);
        dados.append('desc', document.getElementById('desconto2').value);
                
        $.ajax({
            url: '<?php echo base_url('pdv/finalizaCompra'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                if(data == "true"){
                    if(!alert('Compra finalizada!')){
                        window.location.reload();
                    }
                }else{
                    alert("Erro ao finalizar venda, repita a operação!");
                    document.location.reload(true);
                }
            },
        });
    }

    
    //Atualiza o acréscimo e o total final da barra azul quando eu mudar o acréscimo do input
    function mudarAcrescimo(){
        acrescimo = document.getElementById('acrescimo').value;
        desconto = document.getElementById('desconto').value;
        var subtotal = parseFloat(document.getElementById('subtotal').innerText);
        
        document.getElementById('acrescimo2').innerText = acrescimo;
        
        if(acrescimo != ""){
            total = parseFloat(subtotal) +  parseFloat(acrescimo);
        }else{
            total = parseFloat(subtotal)
        }
        
        if(desconto != "" && desconto != "0"){
            desconto2 = desconto;
            total -= desconto2;
        }
        
        document.getElementById('total2').innerText = total.toFixed(2);
    }
    
    //Atualiza o desconto e o total final da barra azul quando eu mudar o desconto do input
    function mudarDesconto(){
        acrescimo = document.getElementById('acrescimo').value;
        desconto = document.getElementById('desconto').value;
        var subtotal = parseFloat(document.getElementById('subtotal').innerText);
        
        document.getElementById('desconto2').innerText = desconto;
        total = subtotal - desconto;
        
        if(acrescimo != "" && acrescimo != "0"){
            acrescimo2 = parseFloat(acrescimo);
            total += acrescimo2;
        }
        
        document.getElementById('total2').innerText = total.toFixed(2);
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
        dados.append('usuario', document.getElementById('usuarioDesconto1').value);
        dados.append('senha', document.getElementById('senhaDesconto1').value);
        
        $.ajax({
            url: '<?php echo base_url('login/validarLoginDesconto'); ?>',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              var err = eval("(" + xhr.responseText + ")");
              alert(err.Message);
            },
            success: function(data) {
                if(data == "null"){
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
        dados = new FormData();
        dados.append('nome', document.getElementById('nome').value);
        dados.append('cpf', document.getElementById('cpf').value);
        dados.append('estado', document.getElementById('estado').value);
        dados.append('cidade', document.getElementById('cidade').value);
        dados.append('endereco', document.getElementById('endereco').value);
        dados.append('email', document.getElementById('email').value);
        dados.append('telefone', document.getElementById('telefone').value);
        
        $.ajax({
            url: base_url+"clientes/cadastroClientePdv",
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            error: function(xhr, status, error) {
              alert(error + " aaa");
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
                        $('#modalCliente').modal('hide');
                        $('#cliente').html(data);    
                    }
                }
                
            },
        });
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