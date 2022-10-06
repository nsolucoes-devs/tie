<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-multiselect.min.css') ?>" />
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/css/bootstrap-switch-button.min.css" rel="stylesheet">

<style>
    .card {
        height: auto;
    }

    .nav-tabs {
        background-color: white;
    }

    .nav-link {
        font-size: 25px;
    }

    .c-icon {
        font-size: 33px;
        line-height: 40px;
        width: 40px;
        height: 40px;
        text-align: center;
    }

    .tab-li a {
        cursor: pointer;
    }


    .c-card {
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

    .c-card-header {
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

    .c-card-icon {
        border-radius: 3px;
        background-color: #999999;
        padding: 15px;
        margin-top: -20px;
        margin-right: 15px;
        float: left;
    }

    .c-tabela {
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
        background: linear-gradient(60deg, #ab47bc, #8e24aa);
    }

    .modal-posicao {
        position: relative;
        left: 25%;
        top: 8px;
    }
</style>

<style>
    .c-card {
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

    .c-card-header {
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

    .c-card-icon {
        border-radius: 3px;
        background-color: #999999;
        padding: 15px;
        margin-top: -20px;
        margin-right: 15px;
        float: left;
    }

    .c-aprovados {
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(76 175 80 / 40%);
        background: linear-gradient(60deg, #66bb6a, #43a047);
    }

    .c-negadas {
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(244 67 54 / 40%);
        background: linear-gradient(60deg, #ef5350, #e53935);
    }

    .c-titulos {
        box-shadow: 0 4px 20px 0 rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 188 212 / 40%);
        background: linear-gradient(60deg, #26c6da, #00acc1);
    }

    .c-tabela {
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
        background: linear-gradient(90deg, rgba(101, 55, 14, 1) 0%, rgba(58, 11, 12, 1) 70%);
    }

    .c-icon {
        font-size: 33px;
        line-height: 40px;
        width: 40px;
        height: 40px;
        text-align: center;
    }

    .c-card-category {
        color: black;
        font-size: 14px;
        margin: 0;
        padding-top: 10px;
        font-weight: bold;
    }

    .c-card-title {
        margin: 0;
        color: #3C4858;
        font-size: 1.5625rem;
        line-height: 1.4em;
    }

    .c-card-title small {
        font-size: 80%;
        font-weight: 400;
    }

    .c-card-footer {
        border-top: 1px solid #d6d5d5;
        margin-top: 20px;
        padding: 0;
        padding-top: 10px;
        margin: 0 15px 10px;
        border-radius: 0;
        justify-content: flex-end;
        align-items: center;
        display: flex;
        background-color: transparent;
    }

    .c-card-body {
        border-top: 1px solid #d6d5d5;
        padding: 0.9375rem 20px;
        border-radius: 0;
        display: flex;
        background-color: transparent;
    }

    .c-stats {
        color: #999999;
        font-size: 12px;
        line-height: 22px;
        display: inline-flex;
    }

    .c-stats-icon {
        position: relative;
        top: 4px;
        font-size: 16px;
        margin-right: 3px;
        margin-left: 3px;
        color: grey;
    }

    .c-stats-text {
        color: grey;
    }

    .c-table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
        border-collapse: collapse;
    }

    .c-table thead {
        color: #1b9045 !important;
    }

    .c-table thead tr th {
        padding: 8px;
        vertical-align: middle;
    }

    .c-table tbody tr td {
        padding: 8px;
        vertical-align: middle;
        border-top: 1px solid #ddd;
    }

    .c-table tbody tr:hover {
        cursor: pointer;
        background-color: #eee !important;
    }

    .check-all {
        width: 32px;
        font-size: 12px;
        color: white;
        background-color: #9c27b0;
        border: 0;
        padding: 6px 10px;
        text-align: center;
        border-radius: 5px;
    }

    .button-area {
        margin-top: 20px;
    }

    .button-custom {
        color: white;
        background-color: #9c27b0;
        border: 0;
        font-size: 14px;
        padding: 6px 10px;
        text-align: center;
        border-radius: 5px;
    }

    .search {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .form-control-custom {
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
        border: 2px solid #43006d;
        color: #43006d;
    }

    .search-field {
        width: 200px;
        box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 0 0 / 40%);
        display: inline-flex;
    }

    .def-item {
        display: block;
        padding: 7px 10px;
        color: black;
        font-size: 14px;
    }

    .check {
        min-width: 20px;
        min-height: 20px;
    }

    .def-item:hover {
        background-color: #eee;
        color: #9c27b0;
        cursor: pointer;
    }

    .force-hide {
        display: none !important;
    }

    .swal2-container.swal2-top.swal2-backdrop-show {
        opacity: 0.6;
        overflow-y: auto;
        margin-top: 112px;
        width: 380px;
        height: 400px;
    }

    .swal2-popup.swal2-toast.swal2-icon-success.swal2-show {
        width: 100%;
        height: 100%;
        display: flex;
        background-color: lightgrey;
    }

    .swal2-success-circular-line-left,
    .swal2-success-fix,
    .swal2-success-circular-line-right {
        display: none;
    }

    span.swal2-success-line-tip,
    span.swal2-success-line-long {
        z-index: 3 !important;
    }

    .swal2-success-ring {
        background-color: #507525;
        z-index: 2;
    }

    h2#swal2-title {
        display: flex;
        color: black;
        font-size: 18px;
    }

    .see-pass {
        width: 10%;
        margin-left: -4px;
        margin-top: -2px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }

    .passwd {
        width: 50%;
        display: inline;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .pagination-links a {
        color: #1b9045;
        text-decoration: none;
        padding: 5px;
        font-size: 20px;
    }

    .pagination-links strong {
        padding-bottom: 2px !important;
        padding: 6px;
        font-size: 20px;
        border-bottom: 2px solid grey;
    }

    input[type='file'] {
        display: none
    }
</style>

<div id="main-content">
    <div class="wrapper">
        <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
            <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                <li class="breadcrumb-item active" aria-current="page">Definições</li>
                <li class="breadcrumb-item active"><a href="<?php echo base_url('8fb192af45f75504361d0011c1677415') ?>">Ajustes</a></li>
            </ol>
        </nav>
        <div class="c-card">
            <div class="c-card-header">
                <div class="row">
                    <div class="col-md-12 text-left px-4">
                        <h2 class="text-secondary"><b>Ajustes</b></h2>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <div class="row" style="background-color: white; margin-left: 5px; margin-right: 5px">
                        <div class="col-md-12">
                            <ul class="nav nav-tabs">
                                <li class="tab-li active" id="li_principal" data-target="principal" data-fonte="li_principal"><a>Principal</a></li>
                                <!-- <li class="tab-li" id="li_chaves" data-target="chaves" data-fonte="li_chaves"><a>Chaves</a></li> -->
                                <!--<li class="tab-li" id="li_estoque" data-target="estoque-lista" data-fonte="li_estoque"><a>Estoque</a></li>-->
                                <!-- <li class="tab-li" id="li_email" data-target="for_email" data-fonte="li_email"><a>Email</a></li> -->
                                <li class="tab-li" id="li_for_pagamento" data-target="for_pagamento" data-fonte="li_for_pagamento"><a>Formas de Pagamentos</a></li>
                                <li class="tab-li" id="li_texto" data-target="texto" data-fonte="li_texto"><a>Texto</a></li>
                                <li class="tab-li" id="li_data" data-target="data" data-fonte="li_data"><a>Data</a></li>
                                <li class="tab-li" id="li_fidelidade" data-target="fidelidade" data-fonte="li_fidelidade"><a>Fidelidade</a></li>
                                <li class="tab-li" id="li_teste" data-target="teste" data-fonte="li_teste"><a>Fotos</a></li>
                                <li class="tab-li" id="li_contrato" data-target="contrato" data-fonte="li_contrato"><a>Contrato</a></li>
                            </ul>
                            <div id="principal">
                                <form id="form" action="<?php echo base_url('589f4ef9553ca0b67ad8f1d6c02d8eef') ?>" method="post" enctype="multipart/form-data">
                                    <div class="row" style="margin-top: 3%">
                                        <div class="col-md-5">
                                            <div class="col-md-12 text-center form-group" style="margin-top: 10%">
                                                <img src="<?php echo base_url() . $site['logo'] ?>" style="height: 200px; width: 400px">
                                                <div class="col-md-12 text-center">
                                                    <br>
                                                    <button type="button" class="btn btn-primary" style="width: 200px" onclick="trigger_logo()">Enviar nova logo</button>
                                                    <input type="file" style="display: none" name="logo" id="logo" class="input-file">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7 d-none">
                                            <div class="col-md-6 form-group">
                                                <label><b>E-mail Contato:</b></label>
                                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $site['email'] ?>">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label><b>Whats App:</b></label>
                                                <input type="text" class="form-control" name="whats" id="whats" value="<?php echo $site['whats'] ?>">
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <label><b>Telefone:</b></label>
                                                <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $site['telefone'] ?>">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label><b>Endereço Completo:</b></label>
                                                <input type="text" class="form-control" name="endereco" id="endereco" value="<?php echo $site['endereco'] ?>">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label><b>Nome empresa:</b></label>
                                                <input type="text" class="form-control" name="nome_empresa" id="nome_empresa" value="<?php echo $site['nome_empresa'] ?>">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label><b>CNPJ:</b></label>
                                                <input type="text" class="cnpj form-control" name="cnpj" id="cnpj" value="<?php echo $site['cnpj'] ?>">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label><b>Link Facebook:</b></label>
                                                <input type="text" class="form-control" name="facebook" id="facebook" value="<?php echo $site['facebook'] ?>">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label><b>Link Instagram:</b></label>
                                                <input type="text" class="form-control" name="instagram" id="instagram" value="<?php echo $site['instagram'] ?>">
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <label><b>Link Twitter:</b></label>
                                                <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo $site['twitter'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="chaves" style="display:none">
                                <form action="<?php echo base_url('7da8089498f0ac8e05a26d6a0f535403') ?>" method="post">
                                    <input type="hidden" name="google-id" id="google-id" class="form-control" value="1">

                                    <div class="row" style="margin-top: 2%">
                                        <div class="col-md-12">
                                            <div class="col-md-2 form-group text-center">
                                                <label class="nome-form" style="font-size:15px;"><b>Google Captcha Key V3</b></label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" name="google-key" id="google-key" class="form-control" value="<?php echo $chave['chave_site'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-2 form-group text-center">
                                                <label class="nome-form" style="font-size:15px;"><b>Google Captcha Keys V2</b></label>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <input type="text" name="google-key2" id="google-key2" class="form-control" value="<?php echo $chave2['chave_site'] ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col-md-12 d-flex justify-content-end align-items-bottom">
                                            <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>
                                            &nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                            <br><br>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="for_email" style="display:none">
                                <div>
                                    <form action="<?php echo base_url('1b447af94eb10e8831c155c01be26599') ?>" method="post">
                                        <div class="row" style="margin-top: 2%">
                                            <div class="col-md-3 form-group text-center">
                                                <label class="nome-form" style="font-size: 15px;"><b>PROTOCOL</b></label>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="text" id="email_protocol" name="email_protocol" class="form-control" placeholder="Protocol" value="<?php echo $email['email_protocol']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group text-center">
                                                <label class="nome-form" style="font-size: 15px;"><b>SMTP_USER</b></label>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="text" id="email_user" name="email_user" class="form-control" placeholder="smtp_usuário" value="<?php echo $email['email_user']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group text-center">
                                                <label class="nome-form" style="font-size: 15px;"><b>SMTP_PASS</b></label>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="text" id="email_pass" name="email_pass" class="form-control" placeholder="smtp_pass" value="<?php echo $email['email_pass']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group text-center">
                                                <label class="nome-form" style="font-size: 15px;"><b>SMTP_HOST</b></label>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="text" id="email_host" name="email_host" class="form-control" placeholder="smtp_host" value="<?php echo $email['email_host']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group text-center">
                                                <label class="nome-form" style="font-size: 15px;"><b>SMTP_PORT</b></label>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="text" id="email_port" name="email_port" class="form-control" placeholder="smtp_port" value="<?php echo $email['email_port']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group text-center">
                                                <label class="nome-form" style="font-size: 15px;"><b>SMTP_TIMEOUT</b></label>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="text" id="email_timeout" name="email_timeout" class="form-control" placeholder="smtp_timeout" value="<?php echo $email['email_timeout']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 form-group text-center">
                                                <label class="nome-form" style="font-size: 15px;"><b>CHARSET</b></label>
                                            </div>
                                            <div class="col-md-3 form-group">
                                                <input type="text" id="email_charset" name="email_charset" class="form-control" placeholder="Charset" value="<?php echo $email['email_charset']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-12 d-flex justify-content-end align-items-bottom">
                                                <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>
                                                &nbsp;&nbsp;
                                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                                <br><br>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>

                            <div id="for_pagamento" style="display:none">
                                <form action="<?php echo base_url('admin/adminajustes/atualizarFormasPag') ?>" method="post">
                                    <?php if (count($formas_pagamento) > 0) {;
                                        $var = count($formas_pagamento);
                                        $aux = 0;
                                        foreach ($formas_pagamento as $formaP) { ?>
                                            <div class="row" id="formaPagamento<?php echo $aux; ?>">
                                                <div class="col-md-2" style="text-align:-webkit-center;">
                                                    <?php if ($var == $aux + 1) { ?>
                                                        <button id="buttonForma<?php echo $aux; ?>" type="button" class="btn btn-success novaforma" data-new="<?php echo $aux; ?>" onclick="novaForma(<?php echo $aux; ?>)">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="row" style="padding: 0 25px;">
                                                        <div class="col-md-4 form-group">
                                                            <label><b>Nome:</b></label>
                                                            <input id="nome_forma" name="nome_forma<?= $aux ?>" type="text" class="form-control" value="<?php echo $formaP['nome_forma']  ?>">
                                                            <input id="id" name="id_<?= $aux ?>" type="hidden" class="form-control" value="<?php echo $formaP['id_forma']  ?>">
                                                        </div>
                                                        <div class="col-md-3 form-group">
                                                            <label><b>% de acrescimo:</b></label>
                                                            <input id="cartao_acrescimo" name="cartao_crescimo<?= $aux ?>" type="text" class="form-control float" value="<?php echo $formaP['acrescimo_forma']  ?>">
                                                        </div>
                                                        <div class="col-md-2 ">
                                                            <label><b>Exibir:</b></label>
                                                            <select id="cartao_ativo" name="cartao_ativo<?= $aux ?>" class="form-control-static form-select form-select-lg">
                                                                <option value="1" <?php if ($formaP['ativo_forma'] == 1) {
                                                                                        echo 'selected';
                                                                                    } ?>>Ativo</option>
                                                                <option value="0" <?php if ($formaP['ativo_forma'] == 0) {
                                                                                        echo 'selected';
                                                                                    } ?>>Inativo</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php $aux++;
                                        }
                                    } else { ?>
                                        <div class="row" id="formaPagamento0">
                                            <div class="col-md-2" style="text-align:-webkit-center;">
                                                <button id="buttonForma0" type="button" class="btn btn-success novaforma" data-new="0" onclick="novaForma(0)">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                            <div class="col-md-11">
                                                <div class="row" style="padding: 0 25px;">
                                                    <div class="col-md-3 form-group">
                                                        <label><b>Nome:</b></label>
                                                        <input id="nome_forma" name="nome_forma<?= $aux ?>" type="text" class="form-control" value="">
                                                    </div>
                                                    <div class="col-md-2 form-group">
                                                        <label><b>% de acrescimo:</b></label>
                                                        <input id="cartao_acrescimo" name="cartao_crescimo<?= $aux ?>" type="text" class="form-control float" value="">
                                                    </div>
                                                    <div class="col-md-2 ">
                                                        <label><b>Exibir:</b></label>
                                                        <select id="cartao_ativo" name="cartao_ativo<?= $aux ?>" class="form-control-static form-select form-select-lg">
                                                            <option value="1">Ativo</option>
                                                            <option value="1">Inativo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <input id="cont" name="cont" type="hidden" class="form-control" value="<?= $aux ?>">
                                    <br><br>
                                    <div class="row form-group">
                                        <div class="col-md-12 d-flex justify-content-end align-items-bottom">
                                            <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>
                                            &nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                            <br><br>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="texto" style="display:none">
                                <div class="col-md-12" style="margin-top: 3%">
                                    <div class="col-md-12 form-group">
                                        <label><b>Contrato de Locação:</b></label>
                                        <div class="editor" id="editor3"><?php echo $site['politica_privacidade'] ?></div>
                                        <textarea name="desc3" id="desc3" style="display: none" rows="5"></textarea>
                                    </div>

                                    <div class="col-md-12 form-group">
                                        <label><b>Termos e condições:</b></label>
                                        <div class="editor" id="editor4"><?php echo $site['termos'] ?></div>
                                        <textarea name="desc4" id="desc4" style="display: none" rows="5"></textarea>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12 d-flex justify-content-end align-items-bottom mt-4">
                                        <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>
                                        &nbsp;&nbsp;
                                        <button type="submit" class="btn btn-primary" style="margin-right: 25px;">Confirmar</button>
                                        <br><br>
                                    </div>
                                </div>
                            </div>

                            <div id="data" style="display:none">
                                <form action="" id="upadatedata">
                                    <div class="col-md-9" style="margin-top: 3%">
                                        <div class="row mx-auto">
                                            <?php foreach ($statusAgenda as $sts) { ?>
                                                <div class="col-md-12 row d-flex align-items-center">
                                                    <div class="form-group col-md-5">
                                                        <label for="">Status</label>
                                                        <!--<select  class="form-select form-control form-select-lg" name="status_<?php echo $sts['sta_id']; ?>" id="status_<?php echo $sts['sta_id']; ?>"></select>-->
                                                        <input type="text" class="form-control" id="status_<?php echo $sts['sta_id']; ?>" name="status_<?php echo $sts['sta_id']; ?>" value="<?php echo $sts['sta_nome']; ?>" readonly>
                                                    </div>
                                                    <div class="form-group col-1 mx-2">
                                                        <label for="" style="white-space: nowrap">Dias <?php if($sts['sta_nome'] != "Ajustes"){echo "após";}else{ echo "antes";}?></label>
                                                        <input type="text" class="form-control" id="dias_<?php echo $sts['sta_id']; ?>" name="dias_<?php echo $sts['sta_id']; ?>" value="<?php echo $sts['sta_dias']; ?>">
                                                    </div>
                                                    <div class="form-group w-auto mx-2 mt-3 mb-0 p-0">
                                                        <label for=""></label>
                                                        <input type="checkbox" id="check_<?php echo $sts['sta_id']; ?>" name="check_<?php echo $sts['sta_id']; ?>" data-toggle="switchbutton" <?php if ($sts['sta_ativo'] == 1) {
                                                                                                                                                                                                echo "checked";
                                                                                                                                                                                            }; ?> data-onlabel="Ativo" data-offlabel="Inativo" data-onstyle="success" data-offstyle="danger" data-width="90" data-height="27" data-size="md" class="align-middle">
                                                    </div>
                                                    <div class="form-group w-auto mx-2 mt-3 mb-0 p-0">
                                                        <label for=""></label>
                                                        <button type="button" class="btn btn-success" onclick="mudaStatus('<?php echo $sts['sta_id']; ?>')"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="col-md-12 text-right mt-4 mb-5">
                                        <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </form>
                            </div>

                            <div id="fidelidade" style="display:none">
                                <form action="" id="upadatedata">
                                    <div class="col-md-12" style="margin-top: 3%">
                                        <div class="row mx-auto">
                                            <div class="col-md-10 row d-flex align-items-center">
                                                <div class="form-group col-sm-2 p-0">
                                                    <label></label>
                                                    <p class="m-0" style="white-space: nowrap">Aviso de fidelidade com:</p>
                                                </div>
                                                <div class="form-group col-sm-1">
                                                    <label for="" style="white-space: nowrap" class="fs-5">Locações</label>
                                                    <input type="text" class="form-control" id="dias_" name="dias_" value="">
                                                </div>
                                                <div class="form-group w-auto mx-2 mt-3 mb-0 p-0">
                                                    <label for=""></label>
                                                    <input type="checkbox" id="check_" name="check_" data-toggle="switchbutton" data-onlabel="Ativo" data-offlabel="Inativo" data-onstyle="success" data-offstyle="danger" data-width="90" data-height="27" data-size="md" class="align-middle">
                                                </div>
                                                <div class="form-group w-auto mx-2 mt-3 mb-0 p-0">
                                                    <label for=""></label>
                                                    <button type="button" class="btn btn-success" onclick="function(this)"><i class="fa fa-check" aria-hidden="true"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-md-12 d-flex justify-content-end align-items-bottom">
                                            <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>
                                            &nbsp;&nbsp;
                                            <button type="submit" class="btn btn-primary">Confirmar</button>
                                            <br><br>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div id="teste" style="display:none">
                                <form action="" id="update-img-reserva" method="post" enctype="multipart/form-data">
                                    <div class="row my-5">
                                        <titlesection class="col-md-12 mb-5 ps-5">
                                            <h3 class="fw-bold m-0">Coleção feminina</h3>
                                        </titlesection>

                                        <div class="col-md-3">
                                            <div class="col-md-8">
                                                <img src="https://i0.wp.com/imgonline.com.br/site/wp-content/uploads/2019/08/Logo-IMG.png?ssl=1" alt="imagem 1 carrousel feminino" class="img-thumbnail rounded">
                                            </div>
                                            <div class="align-items  -center buttons col-md-4 d-flex h-100 justify-content-center flex-column">
                                                <button type="button" class="btn btn-block btn-success my-2">Subir imagem</button>

                                                <input type="file" accept="image/*" name="capa_produto" class="btn-file btn btn-block btn-success my-2">

                                                <a class="ms-xl-4 p-0 text-center text-danger">
                                                    <i class="fa fa-3x fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="col-md-8">
                                                <img src="https://i0.wp.com/imgonline.com.br/site/wp-content/uploads/2019/08/Logo-IMG.png?ssl=1" alt="imagem 1 carrousel feminino" class="img-thumbnail rounded">
                                            </div>
                                            <div class="align-items-center buttons col-md-4 d-flex h-100 justify-content-center flex-column">
                                                <button type="button" class="btn btn-block btn-success my-2">Subir imagem</button>
                                                <a class="ms-xl-4 p-0 text-center text-danger">
                                                    <i class="fa fa-3x fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="col-md-8">
                                                <img src="https://i0.wp.com/imgonline.com.br/site/wp-content/uploads/2019/08/Logo-IMG.png?ssl=1" alt="imagem 1 carrousel feminino" class="img-thumbnail rounded">
                                            </div>
                                            <div class="align-items-center buttons col-md-4 d-flex h-100 justify-content-center flex-column">
                                                <button type="button" class="btn btn-block btn-success my-2">Subir imagem</button>
                                                <a class="ms-xl-4 p-0 text-center text-danger">
                                                    <i class="fa fa-3x fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="col-md-8">
                                                <img src="https://i0.wp.com/imgonline.com.br/site/wp-content/uploads/2019/08/Logo-IMG.png?ssl=1" alt="imagem 1 carrousel feminino" class="img-thumbnail rounded">
                                            </div>
                                            <div class="align-items-center buttons col-md-4 d-flex h-100 justify-content-center flex-column">
                                                <button type="button" class="btn btn-block btn-success my-2">Subir imagem</button>
                                                <a class="ms-xl-4 p-0 text-center text-danger">
                                                    <i class="fa fa-3x fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="row my-5">
                                        <titlesection class="col-md-12 mb-5 ps-5">
                                            <h3 class="fw-bold m-0">Coleção masculina</h3>
                                        </titlesection>

                                        <div class="col-md-3">
                                            <div class="col-md-8">
                                                <img src="https://i0.wp.com/imgonline.com.br/site/wp-content/uploads/2019/08/Logo-IMG.png?ssl=1" alt="imagem 1 carrousel feminino" class="img-thumbnail rounded">
                                            </div>
                                            <div class="align-items-center buttons col-md-4 d-flex h-100 justify-content-center flex-column">
                                                <button type="button" class="btn btn-block btn-success my-2">Subir imagem</button>
                                                <a class="ms-xl-4 p-0 text-center text-danger">
                                                    <i class="fa fa-3x fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="col-md-8">
                                                <img src="https://i0.wp.com/imgonline.com.br/site/wp-content/uploads/2019/08/Logo-IMG.png?ssl=1" alt="imagem 1 carrousel feminino" class="img-thumbnail rounded">
                                            </div>
                                            <div class="align-items-center buttons col-md-4 d-flex h-100 justify-content-center flex-column">
                                                <button type="button" class="btn btn-block btn-success my-2">Subir imagem</button>
                                                <a class="ms-xl-4 p-0 text-center text-danger">
                                                    <i class="fa fa-3x fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="col-md-8">
                                                <img src="https://i0.wp.com/imgonline.com.br/site/wp-content/uploads/2019/08/Logo-IMG.png?ssl=1" alt="imagem 1 carrousel feminino" class="img-thumbnail rounded">
                                            </div>
                                            <div class="align-items-center buttons col-md-4 d-flex h-100 justify-content-center flex-column">
                                                <button type="button" class="btn btn-block btn-success my-2">Subir imagem</button>
                                                <a class="ms-xl-4 p-0 text-center text-danger">
                                                    <i class="fa fa-3x fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="col-md-8">
                                                <img src="https://i0.wp.com/imgonline.com.br/site/wp-content/uploads/2019/08/Logo-IMG.png?ssl=1" alt="imagem 1 carrousel feminino" class="img-thumbnail rounded">
                                            </div>
                                            <div class="align-items-center buttons col-md-4 d-flex h-100 justify-content-center flex-column">
                                                <button type="button" class="btn btn-block btn-success my-2">Subir imagem</button>
                                                <a class="ms-xl-4 p-0 text-center text-danger">
                                                    <i class="fa fa-3x fa-times"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right my-4">
                                        <button class="btn btn-danger">Cancelar</button>
                                        <button class="btn btn-success">Confirmar</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div id="contrato"  style="display:none">
                                <div class="col-md-12" style="margin-top: 3%">
                                    <div class="col-md-12 form-group">
                                        <label><b>Variaveis do Contrato:</b></label><br>
                                        <button type="button" class="btn btn-primary" onclick="inject('cliente')"><i class="fa fa-user" aria-hidden="true"></i> Cliente</button>
                                        <button type="button" class="btn btn-primary" onclick="inject('contrato')"><i class="fa fa-slack" aria-hidden="true"></i> Nº de Contrato</button>
                                        <button type="button" class="btn btn-primary" onclick="inject('trajes')"><i class="fa fa-male" aria-hidden="true"></i> Trajes</button>
                                        <button type="button" class="btn btn-primary" onclick="inject('retirada')"><i class="fa fa-calendar" aria-hidden="true"></i> Data Retirada</button>
                                        <button type="button" class="btn btn-primary" onclick="inject('devolucao')"><i class="fa fa-calendar" aria-hidden="true"></i> Data Devolução</button>
                                        <button type="button" class="btn btn-primary" onclick="inject('locacao')"><i class="fa fa-calendar" aria-hidden="true"></i> Data Locação</button>
                                        <button type="button" class="btn btn-primary" onclick="inject('ajustes')"><i class="fa fa-calendar" aria-hidden="true"></i> Data Ajustes</button>
                                        <button type="button" class="btn btn-primary" onclick="inject('total')"><i class="fa fa-money" aria-hidden="true"></i> Total R$</button>
                                        <br><label><b>Texto do Contrato:</b></label><br>
                                        <textarea rows="10" style="overflow:hidden; resize:none; width:100%;" id="textoContrato" name="textoContrato"><?php if(isset($contrato)){echo $contrato;}?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="payment" role="tabpanel" aria-labelledby="payment-tab">
                    <form action="<?php echo base_url('4534e545773fbcd02083f3380519437e'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <label style="font-size: x-large; float: right;">Gestor de Pagamentos</label>
                            </div>
                            <div class="col-md-8">
                                <select name="gestor" id="gestor" class="form-control-static form-select form-select-lg" onchange="Estrutura()">
                                    <option value="" disabled selected>--- Selecione o Gestor de Pagamentos---</option>
                                    <option value="PagSeguro">--- PagSeguro ---</option>
                                    <option value="MercadoPago">--- Mercado Pago ---</option>
                                    <option value="Juno" disabled>--- Juno --- (Em breve)</option>
                                    <option value="GetNet" disabled>--- GetNet --- (Em breve)</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row form-group" id="chavePublica" style="display:none;">
                            <div class="col-md-3">
                                <label style="font-size: x-large; float: right;">Chave Pública</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="publickey" name="publickey" placeholder="Public Key">
                            </div>
                        </div>
                        <div class="row form-group" id="chavePrivada" style="display:none;">
                            <div class="col-md-3">
                                <label style="font-size: x-large; float: right;">Chave Privada</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="privatekey" name="privatekey" placeholder="Private Key">
                            </div>
                        </div>
                        <div class="row form-group" id="Token" style="display:none;">
                            <div class="col-md-3">
                                <label style="font-size: x-large; float: right;">Token de Acesso</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="acesstoken" name="acesstoken" placeholder="Acess Token">
                            </div>
                        </div>
                        <div class="row form-group" id="clienteId" style="display:none;">
                            <div class="col-md-3">
                                <label style="font-size: x-large; float: right;">Id de Cliente</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="clientid" name="clientid" placeholder="Client ID">
                            </div>
                        </div>
                        <div class="row form-group" id="secretClient" style="display:none;">
                            <div class="col-md-3">
                                <label style="font-size: x-large; float: right;">Segredo de Cliente</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="clientsecret" name="clientsecret" placeholder="Client Secret">
                            </div>
                        </div>
                        <div class="row form-group" id="emailClient" style="display:none;">
                            <div class="col-md-3">
                                <label style="font-size: x-large; float: right;">Email de cadastro</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" id="emailPag" name="emailPag" placeholder="Email">
                            </div>
                        </div>
                        <div class="row form-group" id="sandbox" style="display:none;">
                            <div class="col-md-3">
                                <label style="font-size: x-large; float: right;">SandBox</label>
                            </div>
                            <div class="col-md-8 text-left">
                                <input type="checkbox" style="height: 25px; width: 25px;" id="sandboxId" name="sandboxId" value="1" placeholder="Sandbox">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12 d-flex justify-content-end align-items-bottom">
                                <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>
                                &nbsp;&nbsp;
                                <button type="submit" class="btn btn-primary">Confirmar</button>
                                <br><br>
                            </div>
                        </div>
                    </form>
                </div>


                <div class="tab-pane fade" id="correio" role="tabpanel" aria-labelledby="correio-tab">
                    <div class="row" style="margin-top: 2%">
                        <form action="<?php echo base_url('ab8a2766f50ffb443958ea946a9ba731') ?>" method="post">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-3 form-group text-center">
                                            <label class="nome-form" style="font-size:15px;"><b>DIAS A MAIS PARA ENTREGA</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="entregamais6" name="entregamais6" class="cep form-control" value="<?php echo $correios[5]['dias_entrega_extra'] ?>" required>
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <select name="status6" id="status6" class="form-control-static form-select form-select-lg">
                                                <option value="1" <?php if ($correios[5]['dadosAtivo'] == 1) {
                                                                        echo 'selected';
                                                                    }  ?>>Ativo</option>
                                                <option value="0" <?php if ($correios[5]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 form-group text-center">
                                            <label class="nome-form" style="font-size:15px;"><b>SEDEX</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="cep1" name="cep1" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[0]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <select name="status1" id="status1" class="form-control-static form-select form-select-lg">
                                                <option value="1" <?php if ($correios[0]['dadosAtivo'] == 1) {
                                                                        echo 'selected';
                                                                    }  ?>>Ativo</option>
                                                <option value="0" <?php if ($correios[0]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 form-group text-center">
                                            <label class="nome-form" style="font-size:15px;"><b>PAC</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="cep2" name="cep2" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[1]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <select name="status2" id="status2" class="form-control-static form-select form-select-lg">
                                                <option value="1" <?php if ($correios[1]['dadosAtivo'] == 1) {
                                                                        echo 'selected';
                                                                    }  ?>>Ativo</option>
                                                <option value="0" <?php if ($correios[1]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 form-group text-center">
                                            <label class="nome-form" style="font-size: 15px;"><b>SEDEX 12</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="cep3" name="cep3" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[2]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input onchange="contrato_verificar1()" type="text" id="contrato3" name="contrato3" class="form-control" placeholder="Contrato" value="<?php echo $correios[2]['contratoCorreio'] ?>">
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <select name="status3" id="status3" class="form-control-static form-select form-select-lg" disabled>
                                                <option value="1" <?php if ($correios[2]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Ativo</option>
                                                <option value="0" <?php if ($correios[2]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3 form-group text-center">
                                            <label class="nome-form" style="font-size:15px;"><b>SEDEX 10</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="cep4" name="cep4" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[3]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input onchange="contrato_verificar2()" type="text" id="contrato4" name="contrato4" class="form-control" placeholder="Contrato" value="<?php echo $correios[3]['contratoCorreio'] ?>">
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <select name="status4" id="status4" class="form-control-static form-select form-select-lg" disabled>
                                                <option value="1" <?php if ($correios[3]['dadosAtivo'] == 1) {
                                                                        echo 'selected';
                                                                    }  ?>>Ativo</option>
                                                <option value="0" <?php if ($correios[3]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-md-3 form-group text-center">
                                            <label class="nome-form" style="font-size:15px;"><b>SEDEX HOJE</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="cep5" name="cep5" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[4]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <input onchange="contrato_verificar3()" type="text" id="contrato5" name="contrato5" class="form-control" placeholder="Contrato" value="<?php echo $correios[4]['contratoCorreio'] ?>">
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <select name="statu5" id="status5" class="form-control-static form-select form-select-lg" disabled>
                                                <option value="1" <?php if ($correios[4]['dadosAtivo'] == 1) {
                                                                        echo 'selected';
                                                                    }  ?>>Ativo</option>
                                                <option value="0" <?php if ($correios[4]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3 form-group text-center">
                                            <label class="nome-form" style="font-size:15px;"><b>GRÁTIS POR COMPRA</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="cep7" name="cep7" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[6]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <select onchange="verifica_gratis(1)" name="status7" id="status7" class="form-control-static form-select form-select-lg">
                                                <option value="1" <?php if ($correios[6]['dadosAtivo'] == 1) {
                                                                        echo 'selected';
                                                                    }  ?>>Ativo</option>
                                                <option value="0" <?php if ($correios[6]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2 form-group ">
                                            <input type="text" id="valor7" name="valor7" class="money form-control" placeholder="Valor" value="<?php echo $correios[6]['valorMinimo'] ?>">
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <input type="text" id="entregamais7" name="entregamais7" class="cep form-control" placeholder="Dias" value="<?php echo $correios[6]['dias_entrega_extra'] ?>">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3 form-group text-center">
                                            <label class="nome-form" style="font-size:15px;"><b>GRÁTIS POR ESTADO(S)</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="cep8" name="cep8" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[7]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <select onchange="verifica_gratis(2)" name="status8" id="status8" class="form-control-static form-select form-select-lg">
                                                <option value="1" <?php if ($correios[7]['dadosAtivo'] == 1) {
                                                                        echo 'selected';
                                                                    }  ?>>Ativo</option>
                                                <option value="0" <?php if ($correios[7]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <select id="estados8" name="estados8[]" multiple class="js-example-basic-multiple" style="width: 100%!important">
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
                                        <div class="col-md-1 form-group">
                                            <input type="text" id="entregamais8" name="entregamais8" class="cep form-control" placeholder="Dias" value="<?php echo $correios[7]['dias_entrega_extra'] ?>">
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-3 form-group text-center">
                                            <label class="nome-form" style="font-size:15px;"><b>GRÁTIS POR ESTADO(S) E VALOR</b></label>
                                        </div>
                                        <div class="col-md-2 form-group">
                                            <input type="text" id="cep9" name="cep9" class="cep form-control" placeholder="CEP ORIGEM" value="<?php echo $correios[8]['cepOrigem'] ?>" required>
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <select onchange="verifica_gratis(3)" name="status9" id="status9" class="form-control-static form-select form-select-lg">
                                                <option value="1" <?php if ($correios[8]['dadosAtivo'] == 1) {
                                                                        echo 'selected';
                                                                    }  ?>>Ativo</option>
                                                <option value="0" <?php if ($correios[8]['dadosAtivo'] == 0) {
                                                                        echo 'selected';
                                                                    }  ?>>Inativo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group ">
                                            <select id="estados9" name="estados9[]" multiple class="js-example-basic-multiple" style="width: 100%!important">
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
                                        <div class="col-md-1 form-group">
                                            <input type="text" id="valor9" name="valor9" class="money form-control" placeholder="Valor" value="<?php echo $correios[8]['valorMinimo'] ?>">
                                        </div>
                                        <div class="col-md-1 form-group">
                                            <input type="text" id="entregamais9" name="entregamais9" class="cep form-control" placeholder="Dias" value="<?php echo $correios[8]['dias_entrega_extra'] ?>">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 d-flex justify-content-end align-items-bottom">
                                    <button type="button" class="btn btn-danger" onclick="reset()">Cancelar</button>
                                    &nbsp;&nbsp;
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


                <div class="tab-pane fade" id="chaves" role="tabpanel" aria-labelledby="chaves-tab">

                </div>


                <div class="tab-pane fade" id="gestoremail" role="tabpanel" aria-labelledby="gestoremail-tab">

                </div>


                <div class="tab-pane fade" id="soon" role="tabpanel" aria-labelledby="soon-tab">
                    <div class="row" style="margin-top: 2%">
                        <div class="col-md-12 form-group">
                            <div class="col-md-12">
                                <h3><b>Formas de Pagamento:</b>
                                    <h3>
                            </div>
                            <hr style="width: 95%!important; border-top: 1px solid #79797959; margin-left: 2.5%!important; margin-top: 20px!important; margin-bottom: 20px!important;">
                        </div>
                    </div>


                </div>

                <div class="tab-pane fade" id="vendedores" role="tabpanel" aria-labelledby="vendedores-tab">
                    <div class="c-card">
                        <div class="c-card-header">
                            <div class="row">
                                <div class="col-md-6 text-left">
                                    <h2 style="color: #1b9045;"><b>Listagem de vendedores</b></h2>
                                </div>
                                <form action="<?php echo base_url('edb728d5b2d758ff44b1b0e9f991ead9') ?>" method="post">
                                    <div class="col-md-6">
                                        <div class="button-area">
                                            <button type="button" class="btn btn-primary" style="margin-right: 15px" title="Adicionar Item" data-toggle="modal" data-target="#vendedor_adicionarmodal"><em class="fa fa-plus"></em></button></a>
                                            <div class="search-field">
                                                <input type="text" id="search" name="filtro" class="form-control-custom" value="<?php if (isset($filtro)) {
                                                                                                                                    echo $filtro;
                                                                                                                                } ?>">
                                                <button style="cursor: pointer" class="btn btn-primary search"><em class="fa fa-search"></em></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="c-card-body">
                            <div class="table-responsive" style="width: 100%">
                                <table class="table c-table" id="tabela">
                                    <thead>
                                        <tr>
                                            <th style="width: 25%">Nome</th>
                                            <th style="width: 25%">Whats</th>
                                            <th style="width: 25%">Prioridade</th>
                                            <th class="text-center" style="width: 25%">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($vendedores as $v) { ?>
                                            <tr>
                                                <td><?php echo ucwords(mb_strtolower($v['vendedor_nome'])); ?></td>
                                                <td class="telefone"><?php echo $v['vendedor_whats'] ?></td>
                                                <td><?php echo $v['vendedor_prioridade'] ?></td>
                                                <td style="color: #1b9045; font-size: 22px!important" class="text-center">
                                                    <a onclick="getVendedor(<?php echo $v['vendedor_id'] ?>)" style="color: #1b9045;" data-toggle="modal" data-target="#vendedor_vermodal"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    <a onclick="getVendedor(<?php echo $v['vendedor_id'] ?>)" style="color: #1b9045;" data-toggle="modal" data-target="#vendedor_editarmodal"><i style="padding-left: 12px;" class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    <i onclick="getVendedor(<?php echo $v['vendedor_id'] ?>)" data-toggle="modal" data-target="#vendedor_excluirmodal" style="padding-left: 12px; color: #1b9045" class="fa fa-trash" aria-hidden="true"></i>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php if ($vendedores == null) { ?>
                            <div class="col-md-12 text-center">
                                <p>Nenhuma vendedor encontrada!</p>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <p class="pagination-links"><?php echo $links; ?></p>
                            </div>
                        </div>
                        <?php if (isset($produtos)) { ?>
                            <?php if ($produtos == null) { ?>
                                <div class="col-md-12 text-center">
                                    <p>Nenhuma vendedor encontrada!</p>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <!--<p class="pagination-links"><?php echo $links; ?></p>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAIS VENDEDORES -->

    <!-- excluir -->

    <div class="modal" tabindex="-1" role="dialog" id="vendedor_excluirmodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(90deg, rgba(27, 144, 69) 0%, rgba(36, 189, 91) 70%);">
                    <h4 class="modal-title" style="color: white; display: inline;">AVISO</h4>
                    <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('admin/adminvendedores/excluirVendedor') ?>" method="post">
                    <input type="hidden" id="id_excluir" name="id_excluir">
                    <input type="hidden" id="prod_vendedor_id" name="prod_vendedor_id">
                    <div class="modal-body">
                        <p style="font-size: 17px;"><b> Deseja excluir a vendedor? </b>
                        <p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Excluir</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- adicionar -->

    <div class="modal fade" id="vendedor_adicionarmodal" tabindex="-1" role="dialog" aria-labelledby="vendedor_adicionarmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(90deg, rgba(27, 144, 69) 0%, rgba(36, 189, 91) 70%);">
                    <h4 class="modal-title" style="color: white; display: inline;">ADICIONAR VENDEDOR</h4>
                    <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('admin/adminvendedores/insertVendedor') ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label><b>Nome da vendedor: </b></label>
                                <input type="text" id="cad_nome" name="cad_nome" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label><b>Whats da vendedor: </b></label>
                                <input type="text" id="cad_whats" name="cad_whats" class="telefone form-control" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label><b>Prioridade: </b></label>
                                <input type="number" id="cad_prioridade" name="cad_prioridade" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Adicionar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- editar -->

    <div class="modal fade" id="vendedor_editarmodal" tabindex="-1" role="dialog" aria-labelledby="vendedor_editarmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(90deg, rgba(27, 144, 69) 0%, rgba(36, 189, 91) 70%);">
                    <h4 class="modal-title" style="color: white; display: inline;">EDITAR VENDEDOR</h4>
                    <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('admin/adminvendedores/updateVendedor') ?>" method="post">
                    <input type="hidden" id="id_editar" name="id_editar">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label><b>Nome da vendedor: </b></label>
                                <input type="text" id="editar_nome" name="editar_nome" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label><b>Whats da vendedor: </b></label>
                                <input type="text" id="editar_whats" name="editar_whats" class="telefone form-control" value="" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label><b>Prioridade: </b></label>
                                <input type="number" id="editar_prioridade" name="editar_prioridade" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- ver -->

    <div class="modal fade" id="vendedor_vermodal" tabindex="-1" role="dialog" aria-labelledby="vendedor_vermodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background: linear-gradient(90deg, rgba(27, 144, 69) 0%, rgba(36, 189, 91) 70%);">
                    <h4 class="modal-title" style="color: white; display: inline;">VER VENDEDOR</h4>
                    <button type="button" style="color: white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label><b>Nome da vendedor: </b></label>
                            <input type="text" id="ver_nome" name="ver_nome" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label><b>Whats da vendedor: </b></label>
                            <input type="text" id="ver_whats" name="ver_whats" class="telefone form-control" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label><b>Prioridade: </b></label>
                            <input type="text" id="ver_prioridade" name="ver_prioridade" class="telefone form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-multiselect.min.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.1.0/dist/bootstrap-switch-button.min.js"></script>

    <script>
        var u = location.protocol + "//" + window.location.hostname;

        $(document).ready(function() {


            <?php $aux = explode('¬', $correios[7]['regiaoGratis']); ?>
            <?php foreach ($aux as $a) { ?>
                $("#estados8 option[value='" + '<?php echo $a ?>' + "']").prop("selected", true);
            <?php } ?>

            <?php $aux = explode('¬', $correios[8]['regiaoGratis']); ?>
            <?php foreach ($aux as $a) { ?>
                $("#estados9 option[value='" + '<?php echo $a ?>' + "']").prop("selected", true);
            <?php } ?>

            if ($('#contrato3').val() != "" && $('#contrato3').val() != " ") {
                $('#status3').prop('disabled', false);
            }
            if ($('#contrato4').val() != "" && $('#contrato4').val() != " ") {
                $('#status4').prop('disabled', false);
            }
            if ($('#contrato5').val() != "" && $('#contrato5').val() != " ") {
                $('#status5').prop('disabled', false);
            }

            // $('#cartao_ativo').val(<?php //echo $cartao['ativo_forma'] 
                                        ?>).change();
            // $('#boleto_ativo').val(<?php //echo $boleto['ativo_forma'] 
                                        ?>).change();
            // $('#transferencia_ativo').val(<?php //echo $transferencia['ativo_forma'] 
                                                ?>).change();

            // $('#cartao_desconto_ativo').val(<?php //echo $cartao['desconto_ativo_forma'] 
                                                ?>).change();
            // $('#boleto_desconto_ativo').val(<?php //echo $boleto['desconto_ativo_forma'] 
                                                ?>).change();
            // $('#transferencia_desconto_ativo').val(<?php //echo $transferencia['desconto_ativo_forma'] 
                                                        ?>).change();


            $('.cep').mask('00000-000');
            $('.money').mask("#.##0,00", {
                reverse: true
            });

            $('.float').mask("#0.00", {
                reverse: true
            });

            $('#payment-tab').click();

            $('#framework').multiselect({
                nonSelectedText: 'Estados',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonWidth: '400px'
            });

            $('#framework_form').on('submit', function(event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "insert.php",
                    method: "POST",
                    data: form_data,
                    success: function(data) {
                        $('#framework option:selected').each(function() {
                            $(this).prop('selected', false);
                        });
                        $('#framework').multiselect('refresh');
                        alert(data);
                    }
                });
            });

        });
    </script>

    <script>
        function novaForma(id) {
            dados = new FormData();
            dados.append('row', id);
            $.ajax({
                url: u + '/admin/adminajustes/newFormaLista',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                    var err = eval("(" + xhr.responseText + ")");
                    alert(err.Message);
                },
                success: function(data) {
                    document.getElementById('buttonForma' + id).remove();
                    $('#formaPagamento' + id).after(JSON.parse(data));
                    var qtd = $('#qtdPerg').val();
                    qtd = parseInt(qtd) + parseInt(1);
                    $('#qtdPerg').val(qtd);
                }
            });
        }
    </script>

    <script>
        function Estrutura() {
            var x = document.getElementById("gestor").value;
            if (x == "PagSeguro") {
                PagSeguro();
                $('#acesstoken').val('<?php echo $pagamentos[0]['gestor_acesstoken'] ?>');
                $('#emailPag').val('<?php echo $pagamentos[0]['gestor_email'] ?>');
                if (<?php echo $pagamentos[0]['gestor_sandbox'] ?> == 1) {
                    $('#sandboxId').prop('checked', true);
                } else {
                    $('#sandboxId').prop('checked', false);
                }
            } else if (x == "MercadoPago") {
                MercadoPago();
            } else if (x == "Juno") {
                Juno();
            } else if (x == "GetNet") {
                GetNet();
            }
        }
    </script>

    <script>
        function MercadoPago() {
            document.getElementById('Token').style.display = "flex";
            document.getElementById('chavePublica').style.display = "flex";
            document.getElementById('chavePrivada').style.display = "none";
            document.getElementById('clienteId').style.display = "flex";
            document.getElementById('secretClient').style.display = "flex";
            document.getElementById('emailClient').style.display = "flex";
            document.getElementById('sandbox').style.display = "flex";

            getGestor()
        }
    </script>

    <script>
        function getGestor() {
            var dados = new FormData();
            dados.append('gestor', $('#gestor').val());

            $.ajax({
                url: '<?php echo base_url('admin/adminajustes/getDinamicoGestor'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                },
                success: function(data) {
                    $('#acesstoken').val(data.gestor_acesstoken);
                    $('#publickey').val(data.gestor_publickey);
                    $('#privatekey').val(data.gestor_privatekey);
                    $('#clientid').val(data.gestor_clientid);
                    $('#clientsecret').val(data.gestor_clientsecret);
                    $('#emailPag').val(data.gestor_email);
                    if (data.gestor_sandbox == 1) {
                        $('#sandboxId').attr('checked', true);
                    } else {
                        $('#sandboxId').attr('checked', false);
                    }

                },
            });
        }
    </script>

    <script>
        function contrato_verificar1() {
            if ($('#contrato3').val() != "" && $('#contrato3').val() != " ") {
                $('#status3').prop('disabled', false);
            }
        }

        function contrato_verificar2() {
            if ($('#contrato4').val() != "" && $('#contrato4').val() != " ") {
                $('#status4').prop('disabled', false);
            }
        }

        function contrato_verificar3() {
            if ($('#contrato5').val() != "" && $('#contrato5').val() != " ") {
                $('#status5').prop('disabled', false);
            }
        }
    </script>

    <script>
        function verifica_gratis(id) {
            if (id == 1) {
                if ($('#status6').val() == 1) {
                    if ($('#status8').val() != 0) {
                        $('#status8').val(0).change();
                    }
                }
            } else if (id == 2) {
                if ($('#status7').val() == 1) {
                    if ($('#status8').val() != 0) {
                        $('#status8').val(0).change();
                    }
                }
            } else if (id == 3) {
                if ($('#status8').val() == 1) {
                    if ($('#status6').val() != 0) {
                        $('#status6').val(0).change();
                    }
                    if ($('#status7').val() != 0) {
                        $('#status7').val(0).change();
                    }
                }
            }
        }
    </script>

    <script>
        $(".tab-li").click(function() {
            $(".tab-li").each(function() {
                var tg = $(this).data('target');
                var ft = $(this).data('fonte');

                $('#' + tg).hide();
                $('#' + ft).removeClass('active');
            });

            var tg = $(this).data('target');
            var ft = $(this).data('fonte');

            $('#' + tg).show();
            $('#' + ft).addClass('active');
        });

        function getVendedor(id) {
            var dados = new FormData();
            dados.append('id', id);

            $.ajax({
                url: '<?php echo base_url('admin/adminvendedores/getVendedorId'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                },
                success: function(data) {
                    $('#ver_nome').val(data.vendedor_nome);
                    $('#ver_whats').val(data.vendedor_whats);
                    $('#ver_prioridade').val(data.vendedor_prioridade);

                    $('#id_editar').val(id);
                    $('#editar_nome').val(data.vendedor_nome);
                    $('#editar_whats').val(data.vendedor_whats);
                    $('#editar_prioridade').val(data.vendedor_prioridade);

                    $('#id_excluir').val(id);
                },
            });
        }
    </script>
    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <script>
        const sizes = ['10px', '12px', '14px', '16px', '18px', '20px', '22px', '24px'];

        var Size = Quill.import('attributors/style/size');
        Size.whitelist = sizes;
        Quill.register(Size, true);

        var toolbarOptions = [
            [{
                'size': sizes
            }],
            [{
                'font': []
            }],

            ['bold', 'italic', 'underline', 'strike'],
            [{
                'script': 'sub'
            }, {
                'script': 'super'
            }],

            ['blockquote', 'code-block'],
            [{
                'list': 'ordered'
            }, {
                'list': 'bullet'
            }],

            [{
                'indent': '-1'
            }, {
                'indent': '+1'
            }],

            [{
                'color': []
            }, {
                'background': []
            }],

            [{
                'align': []
            }],

            ['clean']
        ];

        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        var quill2 = new Quill('#editor2', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        var quill3 = new Quill('#editor3', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        var quill4 = new Quill('#editor4', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow'
        });

        $('.ql-picker-item').click(function() {
            $('.ql-picker-label').addClass('custom-content').attr('data-content', $(this).data('value'));
        });
    </script>

    <script>
        $('#form').submit(function(e) {


            let desc = $("#editor .ql-editor").html().replace('<span class="ql-cursor">﻿</span>', '');
            let desc2 = $("#editor2 .ql-editor").html().replace('<span class="ql-cursor">﻿</span>', '');
            let desc3 = $("#editor3 .ql-editor").html().replace('<span class="ql-cursor">﻿</span>', '');
            let desc4 = $("#editor4 .ql-editor").html().replace('<span class="ql-cursor">﻿</span>', '');

            console.log(desc);
            console.log('---');
            console.log(desc2);
            console.log('---');
            console.log(desc3);
            console.log('---');
            console.log(desc4);


            $('#desc').html(desc);
            $('#desc2').html(desc2);
            $('#desc3').html(desc3);
            $('#desc4').html(desc4);
        });
    </script>

    <script>
        function inject(data){
            console.log(data);
            var txt = $("#textoContrato").val();
            txt = txt + "{{"+data+"}}";
            $("#textoContrato").val();
            $("#textoContrato").val(txt);
            $("#textoContrato").focus();
        }
        
        function gravaSMSNew(){
            dados = new FormData();
            dados.append('contrato', $("#textoContrato").val());
            $.ajax({
                url: '<?php echo base_url('novoContratoTexto'); ?>',
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
                    window.location.reload();
                }
            });
        }
</script>


    <script>
        function trigger_logo() {
            $('#logo').click();
        }

        function trigger_principal1() {
            $('#banner_principal1').click();
        }

        function trigger_principal2() {
            $('#banner_principal2').click();
        }

        function trigger_principal3() {
            $('#banner_principal3').click();
        }

        function trigger_principal4() {
            $('#banner_principal4').click();
        }

        function trigger_retangular1() {
            $('#banner_retangular1').click();
        }

        function trigger_retangular2() {
            $('#banner_retangular2').click();
        }

        function trigger_contato() {
            $('#banner_contato').click();
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#site-tab').click();

            $('.ql-picker-item').each(function() {
                if ($(this).data('value') == "14px") {
                    $(this).click();
                }
            });


            var SPMaskBehavior = function(val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },

                spOptions = {
                    onKeyPress: function(val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('.cnpj').mask('00.000.000/0000-00', {
                reverse: true
            });
            $('#whats').mask(SPMaskBehavior, spOptions);
            $('#telefone').mask(SPMaskBehavior, spOptions);

            <?php if (isset($msg)) { ?>
                /* start - SweetAlert2 js */
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
                    title: 'Site Atualizado com Sucesso!'
                })
                /* end - SweetAlert2 js */
            <?php } ?>
        });
    </script>

    <script>
        function mudaStatus(id) {
            var dados = new FormData();
            dados.append('sta_id', id);
            dados.append('sta_nome', $("#status_" + id).val());
            dados.append('sta_dias', $("#dias_" + id).val());
            if ($("#check_" + id).is(":checked") == true) {
                dados.append('sta_ativo', 1);
            } else {
                dados.append('sta_ativo', 0);
            }

            $.ajax({
                url: '<?php echo base_url('updateStatus'); ?>',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                //dataType: 'json',
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                },
                success: function(data) {
                    console.log(data);
                },
            });
        }
    </script>