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
    
    .button-area{
        margin-top: 20px;
        display: flex;
        justify-content: flex-end;
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
        border: 2px solid #6c757d;
    }
    
    .search-field{
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 0 0 / 40%);
        display: inline-flex;
        border-radius: 6px;
    }
    
</style>

<section id="main-content">
    <section class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                <li class="breadcrumb-item"><a href="<?php echo base_url('d2fb359e7478da4e7ec01ef527bdeb53') ?>">Clientes</a></li>
                <li class="breadcrumb-item" aria-current="page">Visualizar</li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-6 text-left">
                        <h2 class="text-secondary"><b>Visualizar Cliente</b></h2>
                    </div>
                    <div class="col-md-6">
                        <a href="<?php echo base_url('d2fb359e7478da4e7ec01ef527bdeb53') ?>"><i style="margin-top: 10px; padding: 7px; border-radius: 5px; font-size: 17px; color: white" class="fa fa-reply bg-secondary" aria-hidden="true">VOLTAR</i></a>
                    </div>
                </div>
            </div>
            
            <input type="hidden" id="id" name="id" value="<?php echo $cliente['clt_id'] ?>">
            
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                        <div class="col-md-12">
                            
                            <ul class="nav nav-tabs">
                              <li onclick="dado()" class="tab-li active" id="li_dados" data-target="dados" data-fonte="li_dados"><a>Dados</a></li>
                              <li onclick="pedido()" class="tab-li" id="li_detalhes" data-target="detalhes" data-fonte="li_detalhes"><a>Locações</a></li>
                              <li onclick="dependentes()" class="tab-li" id="li_dependentes" data-target="dependentes" data-fonte="li_dependentes"><a>Dependentes</a></li>
                            </ul>
                            
                            
                            <div id="dados">
                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                <div class="row" style="margin-top: 2%">
                                    <div class="col-md-6 form-group">
                                        <label><b>Nome:</b></label>
                                        <input type="text" id="nome" name="nome" class="form-control"  value="<?php echo $cliente['clt_nome'] ?>"  readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label><b>CPF:</b></label>
                                        <input type="text" id="cpf" name="cpf" class="cpf form-control"  value="<?php echo $cliente['clt_cpf'] ?>"  readonly>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Nascimento:</b></label>
                                        <input type="text" id="nascimento" name="nascimento" class="form-control"  value="<?php if($cliente['clt_nasc'] != null) { echo date('d/m/Y' , strtotime($cliente['clt_nasc'])); } ?>"  readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-2 form-group">
                                        <label><b>CEP:</b></label>
                                        <input type="text" id="cep" name="cep" class="cep form-control"  value="<?php echo $cliente['clt_cep'] ?>"  readonly>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label><b>Endereço:</b></label>
                                        <input type="text" id="endereco" name="endereco" class="form-control" value="<?php echo $cliente['clt_logra'] ?>"  readonly>
                                    </div>
                                    <!--<div class="col-md-2 form-group">
                                        <label><b>Complemento:</b></label>
                                        <input type="text" id="complemento" name="complemento" class="form-control" value="<?php echo $cliente['clt_complemento'] ?>"  readonly>
                                    </div>       -->
                                    <div class="col-md-2 form-group">
                                        <label><b>Número:</b></label>
                                        <input type="text" id="numero" name="numero" class="form-control"  value="<?php echo $cliente['clt_num'] ?>"  readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-5 form-group">
                                        <label><b>Bairro:</b></label>
                                        <input type="text" id="bairro" name="bairro" class="form-control" value="<?php echo $cliente['clt_prov'] ?>"  readonly>
                                    </div>
                                    <div class="col-md-5 form-group">
                                        <label><b>Cidade:</b></label>
                                        <input type="text" id="cidade" name="cidade" class="form-control" value="<?php echo $cliente['clt_city'] ?>"  readonly>
                                    </div>
                                    <div class="col-md-2 form-group">
                                        <label><b>Estado:</b></label>
                                        <input type="text" id="estado" name="estado" class="form-control" value="<?php echo $cliente['clt_uf'] ?>" readonly>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label><b>E-mail:</b></label>
                                        <input type="text" id="comprimento" name="comprimento" class="form-control" value="<?php echo $cliente['clt_mail'] ?>"  readonly>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label><b>Telefone:</b></label>
                                        <input type="text" id="largura" name="largura" class="telefone form-control" value="<?php echo $cliente['clt_cel'] ?>"  readonly>
                                    </div>
                                    <!--<div class="col-md-2 form-group">
                                        <label><b>Gênero:</b></label>
                                        <input type="text" id="altura" name="altura" class="form-control" value="<?php echo $cliente['clt_genero'] ?>"  readonly>
                                    </div>-->
                                </div>
                                
                            </div>
                            
                            <div id="detalhes" style="display: none">
                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                <div class="table-responsive" style="width: 100%; margin-top: 2%">
                                    <table class="table c-table" id="tabela">
                				        <thead>
                				            <tr>
                				                <th>N° Locação</th>
                				                <th>Total</th>
                				                <th>Data Locação</th>
                				                <th>Data Retirada</th>
                				                <th>Data Devolução</th>
                				                <th>Status</th>
                				                <th>Ação</th>
                				            </tr>
                				        </thead>
                				        <tbody>
                				            <?php foreach($pedidos as $p){ ?>
                    				            <tr class="tr-check">
                    				                <td><?php echo mb_strtoupper($p['alg_locnumero']); ?></td>
                    				                <td>R$ <?php echo number_format($p['alg_total'],2,',','.'); ?></td>
                    				                <td><?php echo date('d/m/Y', strtotime($p['alg_efetivado'])); ?></td>
                    				                <td><?php echo date('d/m/Y', strtotime($p['alg_efetivado'])); ?></td>
                    				                <td><?php echo date('d/m/Y', strtotime($p['alg_retirada'])); ?></td>
                    				                <td><?php echo $p['alg_finalizado']; ?></td>
                    				                <td>
                    				                    <a style="color: #249045;" href="<?php echo base_url('impressoes/geraCupom?chave='.$p['alg_chaveLocacao']) ?>"><i style="font-size: 25px" class="fa fa-eye text-secondary" aria-hidden="true"></i></a>
                    				                </td>
                    				            </tr>
                				            <?php } ?>
                				        </tbody>
            				        </table>
            				    </div>
            				    <?php if($pedidos == null) { ?>
                			        <div class="col-md-12 text-center">
                			            <p>Nenhum pedido encontrado!</p>
                			        </div>
                			    <?php } ?>
                            </div>
                            
                            <div id="dependentes" style="display: none">
                                <hr style="margin: 0!important; padding: 0!important; border-color: lightgrey!important; z-index: 0;">
                                <div class="row" style="margin-top: 3.5rem; margin-bottom: 1.5rem;">
                                    <div class="col-md-6 text-left">
                                        <h4><b>Dependentes de <?= $cliente['clt_nome'] ?></b></h4>
                                    </div>
                                    <div class="col-md-6">
                                        <!--<form action="<?php echo base_url('50d849c4ab008a40ab39cdaf352f35f5/'.$cliente['clt_id'] ) ?>" method="post">-->
                                            <div class="button-area">
                                                <a href="<?php echo base_url('admin/admindependentes/cadastroDependente?idCliente='. $cliente['clt_id']) ?>"><button type="button" class="btn btn-secondary" style="margin-right: 15px" title="Adicionar Item"><em class="fa fa-plus"></em></button></a>
                                                <!--<div class="search-field">-->
                                                <!--    <input type="text" id="search" name="filtro" class="form-control-custom" style="height: 39px" value="<?php if(isset($filtro)) { echo $filtro; } ?>">-->
                                                <!--    <button style="cursor: pointer" class="btn btn-secondary search mb-0"><em class="fa fa-search"></em></button>-->
                                                <!--</div>-->
                                            </div>
                                        <!--</form>-->
                                    </div>
                                </div>
                                <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                                    <div class="col-md-12">
                                        <div class="c-card-body">
                                            <div class="table-responsive" style="width: 100%">
                                                <table class="table c-table" id="tabela">
                        				        <thead>
                        				            <tr>
                        				                <th>Nome</th>
                        				                <th>Endereço</th>
                        				                <th>Telefone</th>
                                                        <th <th class="text-center text-secondary" style="width:10%">Ações</th>                 				            </tr>
                        				        </thead>
                        				        <tbody>
                        				            <?php foreach($dependentes as $row){ ?>
                            				            <tr class="tr-check">
                            				                <td><?php echo ucwords(mb_strtolower($row['dpd_nome'])) ?></td>
                            				                <td>
                            				                    <?php print_r($row['dpd_cep']); ?>
                            				                </td>
                            				                <td>
                            				                    <?php if($row['dpd_fone'] != null){ ?>
                            				                        <span class="telefone"><?php echo $row['dpd_fone'] ?></span>
                            				                    <?php } else { ?>
                            				                        Não Cadastrado
                            				                    <?php } ?>
                            				                </td>
                            				                <td style="color: #6c757d; font-size: 22px!important" class="text-center">
                            				                    <a style="color: #6c757d;" href="<?php echo base_url('admin/admindependentes/editardependente/' . $row['dpd_id'] .'/1/?idCliente='. $cliente['clt_id']) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
                            				                    <a style="color: #6c757d;" href="<?php echo base_url('admin/admindependentes/editardependente/' . $row['dpd_id'] .'/0/?idCliente='. $cliente['clt_id']) ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                            				                    <i onclick="excluir(<?php echo $row['dpd_id'] ?>)" data-toggle="modal" data-target="#excluirDependente" class="fa fa-trash" aria-hidden="true" style="color: #6c757d;" ></i>
                            				                </td>
                            				            </tr>
                        				            <?php } ?>
                        				        </tbody>
                        				    </table>
                        				    </div>
                        			    </div>
                        			    <?php if($dependentes == null) { ?>
                        			        <div class="col-md-12 text-center">
                        			            <p>Nenhum dependente encontrado!</p>
                        			        </div>
                        			    <?php } ?>
                        			    <!--<div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="pagination-links"><?php echo $links; ?></p>
                                            </div>
                                        </div>-->
                    			    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>    
            </div>
        </div>
    </section>
</section>

<div class="modal" tabindex="-1" role="dialog" id="bloquearModal">
  <div class="modal-dialog" role="document" style="margin: 30px auto 0 auto;">
    <div class="modal-content">
      <div class="bg-dark" style="padding: 15px;">
        <h4 class="modal-title" style="color: white; display: inline;"><b>Aviso</b></h4>
        <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('admin/admindependentes/bloquearDependente?idCliente='.$cliente['clt_id']) ?>" method="post">
        <div class="modal-body">
            <p style="font-size: 17px;"><b>Deseja bloquear este dependente?</b></p>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="idblock" id="idblock">
            <button type="submit" class="btn btn-primary">Bloquear</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="desbloquearModal">
  <div class="modal-dialog" role="document" style="margin: 30px auto 0 auto;">
    <div class="modal-content">
      <div class="bg-dark" style="padding: 15px;">
        <h4 class="modal-title" style="color: white; display: inline;"><b>Aviso</b></h4>
        <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p style="font-size: 17px;"><b>Deseja desbloquear o dependente?</b></p>
      </div>
      <form action="<?php echo base_url('admin/admindependentes/desbloquearDependente?idCliente='.$cliente['clt_id']) ?>" method="post">
        <div class="modal-body">
            <p style="font-size: 17px;"><b>Deseja Desbloquear este dependente?</b></p>
        </div>
        <div class="modal-footer">
            <input type="hidden" name="iddesblock" id="iddesblock">
            <button type="submit" class="btn btn-primary">Desbloquear</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="excluirDependente">
    <div class="modal-dialog" role="document" style="margin: 30px auto 0 auto;">
        <div class="modal-content">
            <div class="bg-dark" style="padding: 15px;">
                <h4 class="modal-title" style="color: white; display: inline;"><b>Aviso</b></h4>
                <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo base_url('admin/admindependentes/excluirDependente?idCliente='.$cliente['clt_id']) ?>" method="post">
                <div class="modal-body">
                    <p style="font-size: 17px;"><b>Deseja excluir este dependente?</b></p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="idtrash" id="idtrash">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Excluir</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function bloquear(id){
        $('#idblock').val(id);
    }
    function desbloquear(id){
        $('#iddesblock').val(id);
    }
    
    function excluir(id){
        $('#idtrash').val(id);
    }
</script>
    
<script>
    $(document).ready(function(){
        <?php if(isset($alert)){ ?>
            <?php if($alert == 1) { ?>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast.fire({
                    icon: 'success',
                    title: 'Dependente bloqueado com sucesso!'
                })
            <?php } else if($alert == 2) { ?>
                const Toast2 = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast2.fire({
                    icon: 'error',
                    title: 'Não foi possível bloquear o dependente, pois a senha está incorreta. Resta Apenas ' + <?php if($this->session->userdata('user_block') == 2) { echo ' 1 ';} else { echo ' 2 '; } ?> + ' tentativa(s)!'
                })
            <?php } else if($alert == 3) { ?>
                const Toast3 = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast3.fire({
                    icon: 'success',
                    title: 'Dependente desbloqueado com sucesso!'
                })
            <?php } else if($alert == 4) { ?>
                const Toast4 = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast4.fire({
                    icon: 'error',
                    title: 'Não foi possível desbloquear o dependente, pois a senha está incorreta. Resta Apenas ' + <?php if($this->session->userdata('user_block') == 2) { echo ' 1 ';} else { echo ' 2 '; } ?> + ' tentativa(s)!'
                })
            <?php }  ?>
        <?php } ?>
    });
</script>

<script>
    function dado(){
        $('#li_dados').addClass('active');
        $('#li_dependentes').removeClass('active');
        $('#li_detalhes').removeClass('active');
        $('#dados').show();
        $('#dependentes').hide();
        $('#detalhes').hide();
    }
    
    function pedido(){
        $('#li_dados').removeClass('active');
        $('#li_dependentes').removeClass('active');
        $('#li_detalhes').addClass('active');
        $('#dados').hide();
        $('#dependentes').hide();
        $('#detalhes').show();
    }
    
    function dependentes(){
        $('#li_dados').removeClass('active');
        $('#li_detalhes').removeClass('active');
        $('#li_dependentes').addClass('active');
        $('#dados').hide();
        $('#detalhes').hide();
        $('#dependentes').show();
    }
    
    
    
</script>

<script type="application/javascript">
    $(document).ready(function(){
        $('.money').mask("#.##0,00", {reverse: true});
        
        var SPMaskBehavior = function (val) {
          return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
          onKeyPress: function(val, e, field, options) {
              field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };
        
        $('.telefone').mask(SPMaskBehavior, spOptions);
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.cep').mask('00000-000');
        
        <?php if(isset($alert)){ ?>
            <?php if($alert == 1) { ?>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast.fire({
                    icon: 'success',
                    title: 'Cliente bloqueado com sucesso!'
                })
            <?php } else if($alert == 2) { ?>
                const Toast2 = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast2.fire({
                    icon: 'error',
                    title: 'Não foi possível bloquear o cliente, pois a senha está incorreta. Resta Apenas ' + <?php if($this->session->userdata('user_block') == 2) { echo ' 1 ';} else { echo ' 2 '; } ?> + ' tentativa(s)!'
                })
            <?php } else if($alert == 3) { ?>
                const Toast3 = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast3.fire({
                    icon: 'success',
                    title: 'Cliente desbloqueado com sucesso!'
                })
            <?php } else if($alert == 4) { ?>
                const Toast4 = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })
                
                Toast4.fire({
                    icon: 'error',
                    title: 'Não foi possível desbloquear o cliente, pois a senha está incorreta. Resta Apenas ' + <?php if($this->session->userdata('user_block') == 2) { echo ' 1 ';} else { echo ' 2 '; } ?> + ' tentativa(s)!'
                })
            <?php }  ?>
        <?php } ?>
    });
</script>


<script>
    function senha2(){
        $('#formsenha2').show();
    }
</script>

<script>
    $('#senha_btn2').on('click', function(){
        const type = $('#senha2').prop('type') === 'password' ? 'text' : 'password';
        $('#senha2').prop('type', type);
        if(type == "text"){
            $('#senha_btn2').children().removeClass("fa-eye").addClass("fa-eye-slash");
        }else{
            $('#senha_btn2').children().removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
</script>

<script>
        function senha(){
            $('#formsenha').show();
        }
</script>

<script>
    $('#senha_btn').on('click', function(){
        const type = $('#senha').prop('type') === 'password' ? 'text' : 'password';
        $('#senha').prop('type', type);
        if(type == "text"){
            $('#senha_btn').children().removeClass("fa-eye").addClass("fa-eye-slash");
        }else{
            $('#senha_btn').children().removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });
</script>

