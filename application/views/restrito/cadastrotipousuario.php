
<style>
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
</style>
    
    <section id="main-content">
        <section class="wrapper">
            <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
                <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                    <li class="breadcrumb-item active" aria-current="page">Usuários</li>
                    <li class="breadcrumb-item active"><a href="<?php echo base_url('13858aeb4c9a5807927c7b952dace1fb') ?>">Tipo de usuário</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Adicionar</li>
                </ol>
            </nav>
            <div class="c-card">
                <div class="c-card-header">
                    <div class="row">
                        <div class="col-md-8 text-left">
                            <h2 style="color: #1b9045;"><b><?php if($see == false){echo "Adicionar";}?> Tipo de Usuário</b></h2>
                        </div>
                    </div>
                </div>
                <form id="FormUserType" action="<?php echo base_url('4b4ae94607ae4c22535f161790adb4ef');?>" method="post" enctype="multipart/form-data">
                    <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="col-md-4" style="display: inline-flex">
                                <label style="width: 40%; margin-top: 7px;"><b><?php if($see == false){echo "Novo";}?> Perfil:</b></label>
                                <input type="text" class="form-control" name="nome" id="nome" <?php if(isset($permName) == true){echo "value='".$permName."'";}?> <?php if($see == true){echo "readonly";}?> required>
                                <?php if(isset($permId)){?>
                                <input type="hidden" id="id_tipo" name="id_tipo" value="<?php echo $permId; ?>" >
                                <?php } ?>
                                <br>
                            </div>
                        </div>
                            
                        <div class="col-md-12 form-group">
                            <hr style="height: 1px">
                            <h3>Defina abaixo as Permissões:</h3>
                        </div>
                    
                        <div>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <span style="font-size: 18px;color: #1b9045"><b>DASHBOARD</b></span>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Dash" <?php if(strpos($perm, "¬Dash¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="dashboard"><b>Dashboard Full</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Das2" <?php if(strpos($perm, "¬Das2¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="dashboard2"><b>Dashboard Simples</b></label>
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                                <hr style="height: 1px">
                                <div class="col-md-4">
                                    <span style="font-size: 18px;color: #1b9045"><b>CATÁLOGO</b></span>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Traj" <?php if(strpos($perm, "¬Traj¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="produto"><b>Trajes</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Depa" <?php if(strpos($perm, "¬Depa¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="produto"><b>Departamentos</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Marc" <?php if(strpos($perm, "¬Marc¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="departamento"><b>Marcas</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Forn" <?php if(strpos($perm, "¬Forn¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="promocao"><b>Fornecedores</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Opco" <?php if(strpos($perm, "¬Opco¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="marcas"><b>Opções</b></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="height: 1px">
                                <div class="col-md-4">
                                    <span style="font-size: 18px;color: #1b9045"><b>USUÁRIOS</b></span>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Clie" <?php if(strpos($perm, "¬Clie¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="cliente"><b>Clientes</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Usua" <?php if(strpos($perm, "¬Usua¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="usuario"><b>Usuários</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Tipo" <?php if(strpos($perm, "¬Tipo¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="tipo"><b>Tipo Usuários</b></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="height: 1px">
                                <div class="col-md-4">
                                    <span style="font-size: 18px;color: #1b9045"><b>FINANCEIRO</b></span>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Pedi" <?php if(strpos($perm, "¬Pedi¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="pedido"><b>Pedidos</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Rela" <?php if(strpos($perm, "¬Rela¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="solicitacao"><b>Relatórios</b></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="height: 1px">
                                <div class="col-md-4">
                                    <span style="font-size: 18px;color: #1b9045"><b>AGENDA</b></span>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Agen" <?php if(strpos($perm, "¬Agen¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="pedido"><b>Agenda</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Rese" <?php if(strpos($perm, "¬Rese¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="solicitacao"><b>Locação</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="LisL" <?php if(strpos($perm, "¬LisL¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="solicitacao"><b>Reservas</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Rela" <?php if(strpos($perm, "¬Rela¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="solicitacao"><b>Relatórios</b></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr style="height: 1px">
                                <div class="col-md-4">
                                    <span style="font-size: 18px;color: #1b9045"><b>DEFINIÇÕES</b></span>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Ajus" <?php if(strpos($perm, "¬Ajus¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="ajuste"><b>Ajustes</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Stat" <?php if(strpos($perm, "¬Stat¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="ajuste"><b>Status</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="SMSs" <?php if(strpos($perm, "¬SMSs¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="ajuste"><b>SMS</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Site" <?php if(strpos($perm, "¬Site¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="site"><b>Site</b></label>
                                </div>
                                <div class="col-md-2">
                                    <input <?php if($see == true){echo "disabled";}?> class="form-check-input checkboxgeral" type="checkbox" value="Loja" <?php if(strpos($perm, "¬Loja¬") !== false){echo "checked";}?> id="permissao[]" name="permissao[]">
                                    <label class="form-check-label" for="site"><b>Loja</b></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if($see != true){?>
                    <div class="col-md-12 text-right" style="margin-bottom:20px; margin-top:20px";>
                        <button type="button" onclick="selecionetudo()" class="btn btn-primary" style="position: absolute; left: 35px;">Selecionar Tudo</button>    
                        <a href="<?php echo base_url('13858aeb4c9a5807927c7b952dace1fb') ?>"><button type="button" class="btn btn-danger">Cancelar</button></a>
                        &nbsp;&nbsp;
                        <button class="btn btn-primary" type="submit">Gravar</button>
                    </div>
                    <?php }?>
                </div>
            </form>
            
        </section>

    </section>
    
    
    <script>
        function selecionetudo(){
            $('.checkboxgeral').each(function(){
                if($(this).is(':checked')){
                    $(this).prop('checked', false);
                } else {
                    $(this).prop('checked', true);
                }
            })
        }
    </script>
