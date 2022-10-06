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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                <li class="breadcrumb-item" aria-current="page">Edição</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left">
                        <h2 class="text-secondary" id="cabecalho"><b>Edição Cliente</b></h2>
                    </div>
                </div>
            </div>
            <form action="<?php echo base_url('admin/adminclientes/updateCliente');?>" method="post" enctype='multipart/form-data' id="form">
                <input type="hidden" id="id" name="id" value="<?php echo $cliente['clt_id'] ?>"> 
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                            <div class="col-md-12">
                                <input type="hidden" value="<?php echo $cliente['cliente_id'] ?>">
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-md-4 form-group">
                                        <label><b>Nome:</b></label>
                                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome" value="<?php echo $cliente['clt_nome'] ?>" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Apelido:</b></label>
                                        <input type="text" id="apelido" name="apelido" class="form-control" placeholder="Apelido" value="<?php echo $cliente['clt_apelido'] ?>">
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>CPF:</b></label>
                                        <input type="text" id="cpf" name="cpf" class="cpf form-control" placeholder="CPF" value="<?php echo $cliente['clt_cpf'] ?>" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Nascimento:</b></label>
                                        <input type="date" id="nascimento" name="nascimento" class="form-control" value="<?php echo $cliente['clt_nasc'] ?>" placeholder="Nascimento" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label><b>E-mail:</b></label>
                                        <input type="email" autocomplete="off" id="email" name="email" class="form-control" value="<?php echo $cliente['clt_mail'] ?>" placeholder="E-mail">
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Celular:</b></label>
                                        <input type="text" id="celular" name="celular" class="telefone form-control" value="<?php echo $cliente['clt_cel'] ?>" placeholder="Telefone" required>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Telefone:</b></label>
                                        <input type="text" id="telefone" name="telefone" class="telefone form-control" value="<?php echo $cliente['clt_tel'] ?>" placeholder="Telefone">
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Gênero:</b></label>
                                        <select class="form-control" id="genero" name="genero">
                                            <option value="<?php echo $cliente['cliente_genero'] ?>" selected ><?php echo $cliente['cliente_genero'] ?></option>
                                            <option value="FEMININO">Feminino</option>
                                            <option value="MASCULINO">Masculino</option>
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
                                        <input onblur="pesquisacep(this.value)" type="text" id="cep" name="cep" class="cep form-control" placeholder="CEP" value="<?php echo $cliente['clt_cep'] ?>" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label><b>Rua:</b></label>
                                        <input type="text" id="rua" name="rua" class="form-control" placeholder="Rua" value="<?php echo $cliente['clt_logra'] ?>" required>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Número:</b></label>
                                        <input type="text" id="numero" name="numero" class="form-control" placeholder="Número" value="<?php echo $cliente['clt_num'] ?>" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Complemento:</b></label>
                                        <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Complemento">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label><b>Bairro:</b></label>
                                        <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Bairro" value="<?php echo $cliente['clt_prov'] ?>" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label><b>Cidade:</b></label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" placeholder="Cidade" value="<?php echo $cliente['clt_city'] ?>" required>
                                    </div>
                                    <div class="col-md-3 form-group">
                                        <label><b>Estado:</b></label>
                                        <select class="form-control" id="estado" name="estado">
                                            <option value="" selected hidden disabled> Selecione um estado</option>
                                            <option value="AC" <?= $cliente['clt_uf'] == 'AC' ? 'selected' :'' ?> >Acre</option>
                                            <option value="AL" <?= $cliente['clt_uf'] == 'AL' ? 'selected' :'' ?> >Alagoas</option>
                                        	<option value="AP" <?= $cliente['clt_uf'] == 'AP' ? 'selected' :'' ?> >Amapá</option>
                                        	<option value="AM" <?= $cliente['clt_uf'] == 'AM' ? 'selected' :'' ?> >Amazonas</option>
                                        	<option value="BA" <?= $cliente['clt_uf'] == 'BA' ? 'selected' :'' ?> >Bahia</option>
                                        	<option value="CE" <?= $cliente['clt_uf'] == 'CE' ? 'selected' :'' ?> >Ceará</option>
                                        	<option value="DF" <?= $cliente['clt_uf'] == 'DF' ? 'selected' :'' ?> >Distrito Federal</option>
                                        	<option value="ES" <?= $cliente['clt_uf'] == 'ES' ? 'selected' :'' ?> >Espírito Santo</option>
                                        	<option value="GO" <?= $cliente['clt_uf'] == 'GO' ? 'selected' :'' ?> >Goiás</option>
                                        	<option value="MA" <?= $cliente['clt_uf'] == 'MA' ? 'selected' :'' ?> >Maranhão</option>
                                        	<option value="MT" <?= $cliente['clt_uf'] == 'MT' ? 'selected' :'' ?> >Mato Grosso</option>
                                        	<option value="MS" <?= $cliente['clt_uf'] == 'MS' ? 'selected' :'' ?> >Mato Grosso do Sul</option>
                                        	<option value="MG" <?= $cliente['clt_uf'] == 'MG' ? 'selected' :'' ?> >Minas Gerais</option>
                                        	<option value="PA" <?= $cliente['clt_uf'] == 'PA' ? 'selected' :'' ?> >Pará</option>
                                        	<option value="PB" <?= $cliente['clt_uf'] == 'PB' ? 'selected' :'' ?> >Paraíba</option>
                                        	<option value="PR" <?= $cliente['clt_uf'] == 'PR' ? 'selected' :'' ?> >Paraná</option>
                                        	<option value="PE" <?= $cliente['clt_uf'] == 'PE' ? 'selected' :'' ?> >Pernambuco</option>
                                        	<option value="PI" <?= $cliente['clt_uf'] == 'PI' ? 'selected' :'' ?> >Piauí</option>
                                        	<option value="RJ" <?= $cliente['clt_uf'] == 'RJ' ? 'selected' :'' ?> >Rio de Janeiro</option>
                                        	<option value="RN" <?= $cliente['clt_uf'] == 'RN' ? 'selected' :'' ?> >Rio Grande do Norte</option>
                                        	<option value="RS" <?= $cliente['clt_uf'] == 'RS' ? 'selected' :'' ?> >Rio Grande do Sul</option>
                                        	<option value="RO" <?= $cliente['clt_uf'] == 'RO' ? 'selected' :'' ?> >Rondônia</option>
                                        	<option value="RR" <?= $cliente['clt_uf'] == 'RR' ? 'selected' :'' ?> >Roraima</option>
                                        	<option value="SC" <?= $cliente['clt_uf'] == 'SC' ? 'selected' :'' ?> >Santa Catarina</option>
                                        	<option value="SP" <?= $cliente['clt_uf'] == 'SP' ? 'selected' :'' ?> >São Paulo</option>
                                        	<option value="SE" <?= $cliente['clt_uf'] == 'SE' ? 'selected' :'' ?> >Sergipe</option>
                                        	<option value="TO" <?= $cliente['clt_uf'] == 'TO' ? 'selected' :'' ?> >Tocantins</option>
                                        </select>
                                    </div>
                                </div>
                                <input type="hidden" id="oldClient" name="oldClient" value="0">    
                                <div class="row p-0">
                                    <div class="col-md-12 text-center p-0">
                                        <div class="col-md-12 text-right p-0">
                                            <a href="<?php echo base_url('d2fb359e7478da4e7ec01ef527bdeb53') ?>" class="btn btn-danger">Cancelar</a>
                                            &nbsp;&nbsp;
                                            <button type="submit" id="botaoSubmit" class="btn btn-primary" style="margin-right: 15px;">Atualizar</button>
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
    <?php if(isset($clienteOld)){ ?>
        $("#nome").val('<?php echo $clienteOld['NomeCompleto'];?>');
        $("#cpf").val('<?php echo $clienteOld['CPF'];?>');
        $("#email").val('<?php echo $clienteOld['Email'];?>');
        $("#celular").val('<?php echo $clienteOld['Celular'];?>');
        $("#telefone").val('<?php echo $clienteOld['Telefone1'];?>');
        $("#bairro").val('<?php echo $clienteOld['Bairro'];?>');
        $("#Cidade").val('<?php echo $clienteOld['Cidade'];?>');
        $("#cep").val('<?php echo $clienteOld['CEP'];?>');
        $("#rua").val('<?php echo $clienteOld['Endereco'];?>');
        $("#oldClient").val('1');
        <?php if(!empty($clienteOld['CEP'])){ ?>
            pesquisacep('<?php echo $clienteOld['CEP'];?>');
        <?php } ?>
    <?php } ?>
    <?php if(isset($readable) && $readable == 1){ ?>
        Swal.fire('Cadastro Antigo, atualizar os dados.');
        $("#nome").prop('readonly', true);
        $("#cpf").prop('readonly', true);
        $("#email").prop('readonly', true);
        $("#celular").prop('readonly', true);
        $("#telefone").prop('readonly', true);
        $("#bairro").prop('readonly', true);
        $("#Cidade").prop('readonly', true);
        $("#cep").prop('readonly', true);
        $("#rua").prop('readonly', true);
        $("#apelido").prop('readonly', true);
        $("#nascimento").prop('readonly', true);
        $("#genero").attr("disabled", true); 
        $("#numero").prop('readonly', true);
        $("#complemento").prop('readonly', true);
        $("#cidade").prop('readonly', true);
        $("#estado").attr("disabled", true); 
        
        $("#cabecalho").text('');
        $("#cabecalho").text('Visualização Cliente');
        $("#botaoSubmit").remove();
    <?php }else{ ?>
        Swal.fire('Cadastro pode estar com dados desatualizados.');
        $("#cabecalho").text('');
        $("#cabecalho").text('Edição Cliente');
    <?php } ?>
</script>

<script>
    $(document).ready(function(){
        $('#genero').val('<?php echo $cliente['cliente_genero'] ?>').change();
        $('#estado').val('<?php echo $cliente['cliente_estado'] ?>').change();
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
    function limpa_formulário_cep() {
            $("#bairro").val("");
            $("#Cidade").val("");
            $("#rua").val("");
    }
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            $("#bairro").val(conteudo.bairro);
            $("#Cidade").val(conteudo.localidade);
            $("#rua").val(conteudo.logradouro);
        } else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
    function pesquisacep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                $("#bairro").val("...");
                $("#Cidade").val("...");
                $("#rua").val("...");
                
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