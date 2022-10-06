<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>plugins/fullcalendar/main.css">
    <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>plugins/bs-stepper/css/bs-stepper.min.css">

    <!-- slicknav & slick(carousel) -->
    <link href="<?php echo base_url('assets/admin/'); ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php echo "<style>body { background-color: " .  $background . "; }</style>" ?>

    <style>
        body {
            font: 400 1.2rem 'Palanquin Dark', sans-serif;
        }

        .carousel-indicators {
            z-index: 11;
        }

        .card-selecao {
            background: hsla(0, 0%, 100%, 0.8);
            cursor: pointer;
        }

        .carousel-indicators {
            justify-content: flex-end;
            margin-right: auto;
            margin-bottom: 4rem;
            margin-left: auto;
            width: 90%;
            list-style: none;
        }

        .carousel-indicators [data-bs-target] {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin: 1px;
            text-indent: -999px;
            cursor: pointer;
            background-color: #000\9;
            background-color: rgba(0, 0, 0, 0);
            border: 1px solid #fff;
            border-radius: 10px;
            margin-right: 3px;
            margin-left: 3px;

            /*note: not transitioning height and margin */
            transition-property: width, background-color;
            transition-duration: 0.6s, 0.2s;
            transition-timing-function: ease-in-out, ease-in;
            transition-delay: 0s, 0.5s;
        }

        .carousel-indicators .active {
            width: 40px;
            height: 22px;
            border: .5px solid #fff;
            margin: 0;
            background-color: #fff;
        }

        .img-reserva {
            object-fit: cover;
            /* max-height: 70vh; */
            height: 80vh;
            width: 100%;
        }

        .bs-stepper .step-trigger {
            padding: 20px 10px;
        }

        #calendar .fc-view-harness-active {
            height: 29rem !important
        }

        .text-concat {
            position: relative;
            display: inline-block;
            word-wrap: break-word;
            overflow: hidden;
            max-height: 3.6em;
            line-height: 1.2em;
        }

        .h-85vh {
            min-height: 90vh;
            max-height: 90vh;
        }

        .content-card {
            overflow-y: auto;
            max-height: 70vh;
        }

        .content-card::-webkit-scrollbar {
            width: 15px;
            height: 15px;
        }

        .content-card::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: rgb(155 155 155 / 10%);
        }

        .content-card::-webkit-scrollbar-thumb {
            background-image: linear-gradient(100deg, #b3b3b3, #696969);
            border-radius: 10px;
            -webkit-box-shadow: rgba(0, 0, 0, .12) 0 3px 13px 1px;
        }

        .content-listagem {}
    </style>
</head>

<body>
    <section id="content-site" class="container">
        <section class="wrapper">
            <div style="margin-bottom: 20px; margin-top: 20px;">
                <a href="<?php echo base_url('reservas'); ?>" class="text-decoration-none text-dark">
                    <h3>Sair do Módulo</h3>
                </a>
            </div>
            <div class="row h-100">

                <div id="card1" class="col-md-6 mb-2">
                    <div class="card d-flex flex-column h-100">
                        <div class="bs-stepper" style="position: relative">
                            <div class="d-flex justify-content-evenly align-items-center">
                                <div>
                                    <h3 class="tittle-sted" id="tituloHead">Dados do Cliente: </h3>
                                </div>
                                <div class="bs-stepper-header" role="tablist">
                                    <div class="step" data-target="#cliente-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="cliente-part" id="cliente-part-trigger">
                                            <span class="bs-stepper-circle">1</span>
                                        </button>
                                    </div>
                                    <div class="step" data-target="#data-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="data-part" id="data-part-trigger">
                                            <span class="bs-stepper-circle">2</span>
                                        </button>
                                    </div>
                                    <div class="step" data-target="#traje-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="traje-part" id="traje-part-trigger">
                                            <span class="bs-stepper-circle">3</span>
                                        </button>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="bs-stepper-content d-flex flex-column" style="padding: 0 20px">
                                <div id="cliente-part" class="content" role="tabpanel" aria-labelledby="cliente-part-trigger">
                                    <div class="card-body content-card">

                                        <div class="inputCadstro">
                                            <div class="card-body">
                                                <div class="row">
                                                    <input type="hidden" id="clienteChaveUnica" name="clienteChaveUnica" class="form-control bg-light">
                                                    <div class="form-group  col-md-12">
                                                        <label>Nome:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_nome'] ?>" id="clienteNome" name="clienteNome" class="form-control bg-light">
                                                        </div>
                                                        <em id="nome_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>CPF:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteCpf" readonly value="<?php echo $cliente['clt_cpf'] ?>" name="clienteCpf" class="form-control bg-light" data-inputmask='"mask": "999.999.999-99"' data-mask>
                                                        </div>
                                                        <em id="cpf_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label>Nascimento:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_nasc'] ?>" id="clienteNascimento" name="clienteNascimento" class="form-control bg-light" data-inputmask='"mask": "99/99/9999"' data-mask>
                                                        </div>
                                                        <em id="nasc_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Celular:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_cel'] ?>" id="clienteCelular" name="clienteCelular" class="form-control bg-light" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                                                        </div>
                                                        <em id="cell_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Telefone:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_tel'] ?>" id="clienteFone" name="clienteFone" class="form-control bg-light" data-inputmask='"mask": "(99) 9999-9999"' data-mask>
                                                        </div>
                                                        <em id="fone_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                            </div>
                                                            <input type="email" readonly value="<?php echo $cliente['clt_mail'] ?>" id="clienteEmail" name="clienteEmail" class="form-control bg-light">
                                                        </div>
                                                        <em id="mail_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>CEP:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_cep'] ?>" id="cep" name="cep" class="form-control bg-light" data-inputmask='"mask": "99999-999"' data-mask onblur="pesquisacep(this.value);">
                                                        </div>
                                                        <em id="cep_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Número:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_num'] ?>" id="numeroLogradouro" name="numeroLogradouro" class="form-control bg-light">
                                                        </div>
                                                        <em id="num_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>UF:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_uf'] ?>" id="uf" name="uf" class="form-control bg-light">
                                                        </div>
                                                        <em id="uf_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Logradouro:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_logra'] ?>" id="logradouro" name="logradouro" class="form-control bg-light">
                                                        </div>
                                                        <em id="logr_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Bairro:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_prov'] ?>" id="province" name="province" class="form-control bg-light">
                                                        </div>
                                                        <em id="bairr_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Cidade:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                            </div>
                                                            <input type="text" readonly value="<?php echo $cliente['clt_city'] ?>" id="cidade" name="cidade" class="form-control bg-light">
                                                        </div>
                                                        <em id="cidad_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body" id="dependente" style="display:none;">
                                                <div class="row">
                                                    <div class="form-group col-md-4">
                                                        <label>Nome:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input type="text" id="dependenteNome" name="dependenteNome" class="form-control bg-light">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>CPF:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                            </div>
                                                            <input type="text" id="dependenteCpf" name="dependenteCpf" class="form-control bg-light" data-inputmask='"mask": "999.999.999-99"' data-mask>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Fone:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" id="dependenteFone" name="dependenteFone" class="form-control bg-light" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12"><button class="btn btn-primary" onclick="dependenteNew()" style="float:right;">Adicionar</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" id="listaDependente">
                                            <h3>Lista de Dependentes</h3>
                                            <div class="table-body">
                                                <table class="table table-striped" id="listaDependentes">
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Nome</th>
                                                        <th scope="col">Fone</th>
                                                        <th scope="col">CPF</th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="data-part" class="content" role="tabpanel" aria-labelledby="data-part-trigger">
                                    <div class="card-body content-card py-0">
                                        <div>
                                            <div class="card-body py-0">
                                                <div class="inputBusca">
                                                    <div class="card-body mb-2 py-0">
                                                        <div class="row py-0">
                                                            <div class="form-group col-md-12">
                                                                <h2><label id="clienteLocadorData"></label></h2>
                                                            </div>
                                                            <div class="form-group col-md-12 py-0">
                                                                <h5><label id="clienteResponsavelData"></label></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Data de Retirada:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                            </div>
                                                            <input type="date" readonly id="dataAluguel" value="<?php echo date('Y-m-d', strtotime($locacao["alg_retirada"])) ?>" name="dataAluguel" class="form-control bg-light" data-inputmask='"mask": "99/99/9999"' data-mask>
                                                        </div>
                                                        <em id="retirada_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label>Data de Devolução:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                            </div>
                                                            <input type="date" id="dataEntrega" readonly name="dataEntrega" value="<?php echo date('Y-m-d', strtotime($locacao["alg_devolucao"])) ?>" class="form-control bg-light" data-inputmask='"mask": "99/99/9999"' data-mask>
                                                        </div>
                                                        <em id="devolucao_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="traje-part" class="content" role="tabpanel" aria-labelledby="traje-part-trigger">
                                    <div class="card-body content-card">

                                        <div class="card" id="listagemTrajes">
                                            <div class="card-body text-dark">
                                                <table class="table table-sm table-hover table-listagem">
                                                    <thead>
                                                        <tr>
                                                            <td>
                                                                <div class="mt-3 mb-2 text-center">
                                                                    <strong>Cod.</strong>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="mt-3 mb-2 text-center">
                                                                    <strong>Traje</strong>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="mt-3 mb-2  text-center">
                                                                    <strong>Cor</strong>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="mt-3 mb-2 text-center">
                                                                    <strong>Tam.</strong>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="mt-3 mb-2 text-center">
                                                                    <strong>Valor</strong>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="mt-3 mb-2 text-center">
                                                                <strong><?php echo $traje["produto_id"] ?></strong>
                                                            </td>
                                                            <td class="mt-3 mb-2 text-center">
                                                                <strong><?php echo $traje["produto_nome"] ?></strong>
                                                            </td>
                                                            <td class="mt-3 mb-2 text-center">
                                                            <strong><?php echo $traje["produto_cores"] ?></strong>
                                                            </td>
                                                            <td class="mt-3 mb-2 text-center">
                                                            <strong><?php echo $traje["produto_tamanhos"] ?></strong>
                                                            </td>
                                                            <td class="mt-3 mb-2 text-center">
                                                            <strong><?php echo $traje["produto_valor"] ?></strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-4 row">
                                    <div class="w-50 text-left">
                                        <button id="btn-anterior" class="btn btn-link d-none" onclick="retornaCliente();"><i class="fa fa-arrow-left"></i> Voltar</button>
                                    </div>
                                    <div class="w-50 text-right">
                                        <button id="btn-proximo" class="btn-lg btn btn-primary" onclick="gravaCliente();">Próximo</button>
                                    </div>

                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>

                <div id="card2" class="col-md-6 mb-2">
                    <div id="card-carousel" class="card h-100">
                        <div id="carouselExampleIndicators" class="carousel slide m-3" data-bs-ride="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="img-reserva img-rounded d-block" src="<?= $imagens['imagem1'] ?>" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-reserva img-rounded d-block" src="<?= $imagens['imagem2'] ?>" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-reserva img-rounded d-block" src="<?= $imagens['imagem3'] ?>" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-reserva img-rounded d-block" src="<?= $imagens['imagem4'] ?>" alt="For slide">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="card-listagem" class="card d-none h-100 content-listagem">
                        <div class="card-body text-dark">
                            <table class="table table-sm table-hover table-listagem">
                                <thead>
                                    <tr>
                                        <td>
                                            <div class="mt-3 mb-2 text-center">
                                                <strong>Cod.</strong>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-3 mb-2 text-center">
                                                <strong>Traje</strong>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-3 mb-2  text-center">
                                                <strong>Cor</strong>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-3 mb-2 text-center">
                                                <strong>Tam.</strong>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="mt-3 mb-2 text-center">
                                                <strong>Valor</strong>
                                            </div>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>2</strong>
                                        </td>
                                        <td>
                                            <strong>2</strong>
                                        </td>
                                        <td>
                                            <strong>2</strong>
                                        </td>
                                        <td>
                                            <strong>2</strong>
                                        </td>
                                        <td>
                                            <strong>2</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </section>

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
                        <input type="text" name="usuarioDesconto" id="usuarioDesconto" placeholder="Usuário" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="senhaDesconto" id="senhaDesconto" placeholder="Senha" class="form-control">
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

    <div class="modal" id="nomeClienteModal" tabindex="-1" aria-labelledby="nomeClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecione o Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="listaClienteNomes">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Fone</th>
                            <th scope="col">CPF</th>
                            <th scope="col"></th>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="buscaCliente()">Selecionar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="listaClienteDependenteModal" tabindex="-1" aria-labelledby="listaClienteDependenteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecione quem irá locar o traje</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="listaClienteDependenteResponsavel">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Fone</th>
                            <th scope="col">CPF</th>
                            <th scope="col"></th>
                        </tr>
                    </table>
                    <h4 class="mt-4">Informações adicionais:</h4>
                    <div class="form-group">
                        <textarea class="form-control" id="detalhealuguel" name="detalhealuguel" rows="5" style="border-color:#ccc;"></textarea>
                    </div>
                    <input type="hidden" name="trajeLocacao" id="trajeLocacao">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="dismissModal('listaClienteDependenteModal')">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="gravaTrajeLocacao()">Selecionar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('siteResource/'); ?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('siteResource/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('siteResource/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('siteResource/'); ?>dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url('siteResource/'); ?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url('siteResource/'); ?>plugins/fullcalendar/main.js"></script>
    <script src="<?php echo base_url('siteResource/'); ?>plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="<?php echo base_url('siteResource/'); ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="<?php echo base_url('siteResource/'); ?>plugins/bs-stepper/js/bs-stepper.min.js"></script>

    <script>
        const BASE_URL = location.protocol + "//" + window.location.hostname;

        var switchStatus = false;

        $(document).ready(function() {
            $("#togBtn").on('change', function() {
                if ($(this).is(':checked')) {
                    switchStatus = $(this).is(':checked');
                    alert(switchStatus); // To verify
                } else {
                    switchStatus = $(this).is(':checked');
                    alert(switchStatus); // To verify
                }
            });
        });



        function gravaCliente() {

            stepper.next();

        }



        function dismissModal(id) {
            $("#" + id).modal('toggle');
        }



        function buscaMask() {
            var x = document.getElementById("selectBusca").value;
            if (x == "nome") {
                $('#busca').css('display', 'none');
                $('#buscaNome').css('display', 'block');
                $('#buscaFone').css('display', 'none');
                $('#buscaCpf').css('display', 'none');
            } else if (x == "cpf") {
                $('#busca').css('display', 'none');
                $('#buscaNome').css('display', 'none');
                $('#buscaFone').css('display', 'none');
                $('#buscaCpf').css('display', 'block');
            } else if (x == "telefone") {
                $('#busca').css('display', 'none');
                $('#buscaNome').css('display', 'none');
                $('#buscaFone').css('display', 'block');
                $('#buscaCpf').css('display', 'none');
            }
        }






        //funções stepper 2 - Dados do Cliente NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
        function dataEvento() {}

        function selecionaTraje() {
            var flag = 0;

            if ($('#dataAluguel').val() == "") {
                $('#retirada_erro').html("Campo Obrigatório");
                $('#retirada_erro').show();
                flag = 1;
            } else {
                $("#dataIni").val($('#dataAluguel').val());
            }

            if ($('#dataEntrega').val() == "") {
                $('#devolucao_erro').html("Campo Obrigatório");
                $('#devolucao_erro').show();
                flag = 1;
            } else {
                $("#dataFim").val($('#dataEntrega').val());
            }

            if (flag === 0) {
                $("#viewdataretirada").val($('#dataAluguel').val());
                $("#viewdatadevolucao").val($('#dataEntrega').val());

                $("#tituloHead").text("");
                $("#tituloHead").text("Definição do(s) Traje(s):");

                $('#card-carousel').addClass('d-none');
                $('#card-listagem').removeClass('d-none');

                $("#btn-anterior").attr('onclick', 'retornaData();');
                $("#btn-anterior").removeClass('d-none');
                $("#btn-proximo").addClass('d-none');

                stepper.next();
            }
        }

        function retornaCliente() {
            $("#tituloHead").text("");
            $("#tituloHead").text("Dados do Cliente:");

            $("#btn-anterior").addClass('d-none');
            $("#btn-anterior").attr('onclick', '');
            $("#btn-proximo").attr('onclick', 'gravaCliente();');

            stepper.previous();
        }

        //funções stepper 3 - Dados dos Trajes NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
        function buscaTraje() {
            dados = new FormData();
            dados.append('categoria', $('#selectTrajes').val());
            dados.append('detalhes', $('#trajeLike').val());
            dados.append('dataInicio', $('#dataAluguel').val());
            dados.append('dataFim', $('#dataEntrega').val());
            dados.append('cor', $('#selectColor').val());
            dados.append('tamanho', $('#selectSize').val());
            //dados.append('definicao', $('#selectDefinition').val());

            $.ajax({
                url: BASE_URL + '/buscaTraje',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                },
                success: function(data) {
                    $("#listagemTrajes").html("");
                    $("#listagemTrajes").html(data);

                    $("#listagemTrajes").removeClass('d-block');
                }
            });
        }

        function novoTraje(id_traje) {
            $("#listaClienteDependenteModal").modal('toggle');
            $("#trajeLocacao").val(id_traje);
        }

        function atualizaListagemSelecionados() {
            dados = new FormData();
            dados.append('chaveLocacao', $('#chaveLocacao').val());
            $.ajax({
                url: BASE_URL + '/showSelecteds',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                },
                success: function(data) {
                    $("#card-listagem").empty();
                    $("#card-listagem").append(data);
                }
            });
        }

        function gravaTrajeLocacao() {
            dados = new FormData();
            dados.append('traje', $("#trajeLocacao").val());
            dados.append('locador', $("input[name='locador']:checked").val());
            dados.append('retirada', $('#dataAluguel').val());
            dados.append('devolucao', $('#dataEntrega').val());
            dados.append('keyClt', $('#clienteChaveUnica').val());
            dados.append('obs', $('#detalhealuguel').val());
            if ($('#chaveLocacao').val() != "") {
                dados.append('keyLoc', $('#chaveLocacao').val());
            }
            $.ajax({
                url: BASE_URL + '/gravaLocacao',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                },
                success: function(data) {
                    $("#chaveLocacao").val(data);
                    $('#detalhealuguel').val("");
                    $("input[name='locador']:checked")[0].checked = false;
                    $("#listaClienteDependenteModal").modal('toggle');
                    atualizaListagemSelecionados();

                    $("#dataLocaçao").val($('#dataAluguel').val());
                    $("#dataDevolucao").val($('#dataEntrega').val());
                }
            });
        }

        function retornaData() {
            $("#tituloHead").text("");
            $("#tituloHead").text("Definição de Data:");

            $('#card-carousel').removeClass('d-none');
            $('#card-listagem').addClass('d-none');

            $("#btn-anterior").removeClass('d-none');
            $("#btn-proximo").removeClass('d-none');
            $("#btn-anterior").attr('onclick', 'retornaCliente();');
            $("#btn-proximo").attr('onclick', 'selecionaTraje();');

            stepper.previous();
        }

        //funções stepper 4 - Dados do Aluguel NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
        function retornaTrajes() {
            $("#tituloHead").text("");
            $("#tituloHead").text("Definição do(s) Traje(s):");

            $("#btn-anterior").removeClass('d-none');
            $("#card1").addClass('col-md-6');
            $("#card1").removeClass('col-md-12');
            $("#card2").removeClass('d-none');
            stepper.previous();
        }

        function finalizaAluguel() {
            dados = new FormData();
            dados.append('chaveLocacao', $('#chaveLocacao').val());

            $.ajax({
                url: BASE_URL + '/finalizaAluguel',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                //dataType: 'json',
                beforeSend: function() {

                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                },
                success: function(data) {
                    $("#tituloHead").text("");
                    $("#tituloHead").text("Finalizar Aluguel:");

                    $("#listagem-final").empty();
                    $("#listagem-final").html(data);

                    $("#btn-anterior").addClass('d-none');
                    $("#btn-proximo").addClass('d-none');

                    $("#card1").addClass('col-md-12');
                    $("#card1").removeClass('col-md-6');
                    $("#card2").addClass('d-none');
                    stepper.next();
                }
            });
        }

        //Inicialização de passos na pagina
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        });

        //Funções gerais do calendario de de mascaras
        $(function() {


            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            });
            $('[data-mask]').inputmask();

            $('.duallistbox').bootstrapDualListbox({
                filterTextClear: 'mostrar tudo',
                filterPlaceHolder: 'Filtro',
                moveSelectedLabel: 'Mover selecionados',
                moveAllLabel: 'Mover todos',
                removeSelectedLabel: 'Remover selecionados',
                removeAllLabel: 'Remover todos',
                infoText: 'Mostrando todos {0}',
                infoTextFiltered: '<span class="label label-warning">Filtrando</span> {0} de {1}',
                infoTextEmpty: "Lista vazia"
            });

            /* inicializando eventos internos
            -----------------------------------------------------------------*/
            function ini_events(ele) {
                ele.each(function() {
                    var eventObject = {
                        title: $.trim($(this).text())
                    }
                    $(this).data('eventObject', eventObject);
                    $(this).draggable({
                        zIndex: 1070,
                        revert: true,
                        revertDuration: 0,
                    });
                })
            }

            ini_events($('#external-events div.external-event'));

            var date = new Date()
            var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear()

            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;

            var calendarEl = document.getElementById('calendar');

            var calendar = new Calendar(calendarEl, {
                buttonText: {
                    today: 'Hoje',
                    month: 'Mês',
                    week: 'Semana',
                    day: 'Dia',
                    list: 'Lista',
                },
                locale: 'pt-br',
                headerToolbar: {
                    right: 'prev,next today',
                    center: 'title',
                    left: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                allDaySlot: false,
                themeSystem: 'bootstrap',
                events: [],
                editable: false,
                droppable: false,
                dateClick: function(info) {
                    var data = info.dateStr;
                    //var result = new Date(data);
                    //result.setDate(result.getDate() + '4');

                    $("#dataAluguel").val(data);
                    //$("#dataDevolucao").val(result);
                }
            });

            calendar.render();
        });
    </script>


</body>

</html>