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

<style>
    .nome-form{
        color: black;
        font-size: 16px;
    }
    .nav-tabs {
        background: transparent;
    }
    .nav-tabs {
        border-bottom: 1px transparent;
    }
    .nav-item{
        color: #555;
        cursor: default;
        border-radius: 4px 4px 0 0;
        background-color: #dedede;
    }
    .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent;
    }
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
    
    .c-card-icon{
        border-radius: 3px;
        background-color: #999999;
        padding: 15px;
        margin-top: -20px;
        margin-right: 15px;
        float: left;
    }
        
    .c-tabela{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
        background: linear-gradient(60deg, #ab47bc, #8e24aa);
    }
    
    .tab-li a{
        cursor: pointer;
    }
    
    .label-imagem{
        margin-top: 10px;
    }
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('d2fb359e7478da4e7ec01ef527bdeb53') ?>">Clientes</a></li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('50d849c4ab008a40ab39cdaf352f35f5/'. $cliente['cliente_id']) ?>"><?= $cliente['cliente_nome'] ?></a></li>
                <li class="breadcrumb-item" aria-current="page">Edição Dependente</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <h2 style="color: #3a0b0c;"><b>Edição dependente</b></h2>
                    </div>
                </div>
            </div>
            <form action="<?php echo base_url('admin/admindependentes/updateDependente?idCliente='. $cliente['dependente_id']);?>" method="post" enctype='multipart/form-data' id="form">
                <input type="hidden" id="id" name="id" value="<?php echo $dependente['dependente_id'] ?>"> 
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                            <div class="col-md-12">
                                <input type="hidden" id="id_cliente" name="id_cliente" value="<?= $cliente['cliente_id'] ?>">
                                <input type="hidden" value="<?php echo $dependente['dependente_id'] ?>">
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-md-6 form-group">
                                        <label><b>Nome:</b></label>
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="<?php echo $dependente['dependente_nome'] ?>" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Nascimento:</b></label>
                                        <input type="date" id="nascimento" name="nascimento" class="form-control" value="<?php echo $dependente['dependente_nascimento'] ?>" placeholder="Nascimento" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label><b>E-mail:</b></label>
                                        <input type="email" autocomplete="off" id="email" name="email" class="form-control" value="<?php echo $dependente['dependente_email'] ?>" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Telefone:</b></label>
                                        <input type="text" id="telefone" name="telefone" class="telefone form-control" value="<?php echo $dependente['dependente_telefone'] ?>" placeholder="Telefone" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Gênero:</b></label>
                                        <select class="form-control" id="genero" name="genero">
                                            <option value="<?php echo $dependente['dependente_genero'] ?>" selected ><?php echo $dependente['dependente_genero'] ?></option>
                                            <option value="FEMININO">Feminino</option>
                                            <option value="MASCULINO">Masculino</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group" style="display:none">
                                        <label><b>Loja | Ecommerce:</b></label>
                                        <select class="form-control" id="lojas" name="lojas">
                                            <option value="<?php echo $dependente['dependente_loja'] ?>" selected > <?php echo $dependente['dependente_loja'] ?> </option>
                                            <?php foreach($lojas as $l){ ?>
                                                <option value="<?php echo $l['nome'] ?>"> <?php echo $l['nome'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <hr style="height: 1px; border-color: lightgrey">
                                    </div>
                                </div>
                                
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-md-3 form-group">
                                        <label><b>CEP:</b></label>
                                        <input onkeyup="autofillCEP()" type="text" id="cep" name="cep" class="cep form-control" placeholder="CEP" value="<?php echo $dependente['dependente_cep'] ?>" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label><b>Rua:</b></label>
                                        <input type="text" id="rua" name="rua" class="form-control" placeholder="Rua" value="<?php echo $dependente['dependente_endereco'] ?>" required>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Número:</b></label>
                                        <input type="text" id="numero" name="numero" class="form-control" placeholder="Número" value="<?php echo $dependente['dependente_numero'] ?>" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Complemento:</b></label>
                                        <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label><b>Bairro:</b></label>
                                        <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" value="<?php echo $dependente['dependente_bairro'] ?>" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label><b>Cidade:</b></label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" value="<?php echo $dependente['dependente_cidade'] ?>" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Estado:</b></label>
                                        <select class="form-control" id="estado" name="estado">
                                            <option value="<?php echo $dependente['dependente_estado'] ?>" selected disabled><?php echo $dependente['dependente_estado'] ?></option>
                                            <option value="AC">Acre</option>
                                        	<option value="AL">Alagoas</option>
                                        	<option value="AP">Amapá</option>
                                        	<option value="AM">Amazonas</option>
                                        	<option value="BA">Bahia</option>
                                        	<option value="CE">Ceará</option>
                                        	<option value="DF">Distrito Federal</option>
                                        	<option value="ES">Espírito Santo</option>
                                        	<option value="GO">Goiás</option>
                                        	<option value="MA">Maranhão</option>
                                        	<option value="MT">Mato Grosso</option>
                                        	<option value="MS">Mato Grosso do Sul</option>
                                        	<option value="MG">Minas Gerais</option>
                                        	<option value="PA">Pará</option>
                                        	<option value="PB">Paraíba</option>
                                        	<option value="PR">Paraná</option>
                                        	<option value="PE">Pernambuco</option>
                                        	<option value="PI">Piauí</option>
                                        	<option value="RJ">Rio de Janeiro</option>
                                        	<option value="RN">Rio Grande do Norte</option>
                                        	<option value="RS">Rio Grande do Sul</option>
                                        	<option value="RO">Rondônia</option>
                                        	<option value="RR">Roraima</option>
                                        	<option value="SC">Santa Catarina</option>
                                        	<option value="SP">São Paulo</option>
                                        	<option value="SE">Sergipe</option>
                                        	<option value="TO">Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <div class="col-md-12 text-right">
                                            <button type="submit" class="btn btn-primary">Atualizar</button>
                                            &nbsp;&nbsp;
                                            <a href="<?php echo base_url('d2fb359e7478da4e7ec01ef527bdeb53') ?>" style="margin-right: 15px;" class="btn btn-danger">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                                
                </div>
            </form>
        </div>
    </section>
</section>

<script>
    $(document).ready(function(){
        $('#genero').val('<?php echo $dependente['dependente_genero'] ?>').change();
        $('#estado').val('<?php echo $dependente['dependente_estado'] ?>').change();
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
    function autofillCEP(){
        var aux = $('#cep').val();
        var cep = aux.replace(/\D/g,'');
        if(cep.length == 8){
            dados = new FormData();
            dados.append('cep', cep);
            $.ajax({
                url: '<?php echo base_url('inicio/resgataCEP'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                },
                success: function(data) {
                    if(data != "null" && data != "" && data != " " && data != null){
                        cep = jQuery.parseJSON(data);
                        var ce = cep.cep_cidadeuf.split('/');
                        $('#cep').unmask().val(cep.cep).mask('00000-000', {reverse: true}, {'translation': {0: {pattern: /[0-9*]/}}});
                        $('#cidade').val(ce[0]);
                        $('#estado').val(ce[1]).change();
                        $('#bairro').val(cep.cep_bairro);
                        if(cep.cep_rua.indexOf(',') > 0){
                            var rua = cep.cep_rua.split(',');
                            $('#endereco').val(rua[0]);
                        }else if(cep.cep_rua.indexOf(' - ') > 0){
                            var rua = cep.cep_rua.split(' - ');
                            $('#endereco').val(rua[0]);
                        }else{
                            $('#endereco').val(cep.cep_rua);
                        }
                    }
                },
            });
        }
    }
</script>