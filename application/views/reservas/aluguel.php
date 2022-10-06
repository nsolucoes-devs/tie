<!DOCTYPE html>
<html lang="pt-br">
    
    <head>
        <!-- Algumas informações e configurações -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="N Soluções Agência Digital - www.nsoluti.com.br" />
        <title>Gestão de Locações</title>
        
        <!-- FavIcon -->
        <link href="<?php echo base_url('resources/'); ?>/logo.png" rel="shortcut icon" type="image/x-icon">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>plugins/fullcalendar/main.css">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/') ?>plugins/bs-stepper/css/bs-stepper.min.css">
        
        <!-- slicknav & slick(carousel) -->
        <link href="<?php echo base_url('assets/admin/');?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
        
        <!-- Sweet Alert2  -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <style>        
            body {
                font: 400 1.2rem 'Palanquin Dark', sans-serif;
                background-color: <?php echo $background; ?>
            }
            .carousel-indicators {
                z-index: 11;
            }

            /* BTN MASCULINO */

            .masculino .active .bs-stepper-circle {
                background-color: hsl(216 10% 20%);
            }

            .btn-primary.masculino, .novoTraje {
                color: #fff;
                background-color: hsl(216 10% 20%);
                border-color: hsl(216 6% 13%);
            }

            .btn-primary.masculino:not(:disabled):not(.disabled).active, 
            .btn-primary.masculino:not(:disabled):not(.disabled):active, 
            .show>.btn-primary.masculino.dropdown-toggle {
                color: #fff;
                background-color: hsl(216 6% 13%);
                border-color: hsl(216 6% 13%);
            }       

            .btn-primary.masculino:hover {
                color: #fff;
                background-color: hsl(216 15% 30%);
                border-color: hsl(216 10% 25%);
            }
            
            /* BTN FEMININO */

            .feminino .active .bs-stepper-circle {
                background-color: hsl(300 50% 55%);
            }

            .btn-primary.feminino {
                color: #fff;
                background-color: hsl(300 50% 55%);
                border-color: hsl(300 40% 39%);
            }

            .btn-primary.feminino:not(:disabled):not(.disabled).active, 
            .btn-primary.feminino:not(:disabled):not(.disabled):active, 
            .show>.btn-primary.feminino.dropdown-toggle {
                color: #fff;
                background-color: hsl(300 50% 55%);
                border-color: hsl(300 42% 45%);
            }       

            .btn-primary.feminino:hover {
                color: #fff;
                background-color: hsl(300 55% 62%);
                border-color: hsl(300 50% 55%);
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
                background-color: rgba(0,0,0,0);
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
            
            .content-card{
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
                -webkit-box-shadow: rgba(0,0,0,.12) 0 3px 13px 1px;
            }
            
            .content-listagem {
                
            }
            
            
        </style>
    </head>
<body>
    
    <section id="content-site" class="container">
        <section class="wrapper">
            <div style="margin-bottom: 20px; margin-top: 20px;">
                <a href="<?php echo base_url('reservas'); ?>" class="text-decoration-none text-dark"><h3>Sair do Módulo</h3></a>
            </div>
            <div class="row h-100">

                <div id="card1" class="col-md-6 mb-2">
                    <div class="card d-flex flex-column h-100">
                        <div class="bs-stepper" style="position: relative">
                            <div class="d-flex justify-content-evenly align-items-center">
                                <div>
                                    <h3 class="tittle-sted" id="tituloHead">Dados do Cliente: </h3>
                                </div>
                                <div class="bs-stepper-header <?= !isset($colorbtn) ?: $colorbtn ?>" role="tablist">
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
                                    <div class="step" data-target="#final-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="final-part" id="final-part-trigger">
                                            <span class="bs-stepper-circle">4</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-stepper-content d-flex flex-column" style="padding: 0 20px">
                                <div id="cliente-part" class="content" role="tabpanel" aria-labelledby="cliente-part-trigger">
                                    <div class="card-body content-card">
                                        <div class="inputBusca">
                                            <div class="card-body mb-2">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label>Tipo de Busca:</label>
                                                        <div class="input-group">
                                                            <select id="selectBusca" name="selectBusca" onchange="buscaMask()" class="form-control bg-light">
                                                                <option selected disabled> Selecione</option>
                                                                <option value="nome"> Nome</option>
                                                                <option value="telefone"> Celular</option>
                                                                <option value="cpf"> CPF</option>
                                                                <option value="nick"> Apelido</option>
                                                                <option value="lista" hidden> Lista</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <label>Informe a Busca:</label>
                                                        <div class="input-group">
                                                            <input type="text" id="busca" name="busca" class="form-control bg-light" disabled>
                                                            <input type="text" id="buscaNome" name="buscaNome" class="form-control bg-light" style="display:none;">
                                                            <input type="text" id="buscaFone" name="buscaFone" class="form-control bg-light" style="display:none;"  data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                                                            <input type="text" id="buscaCpf"  name="buscaCpf"  class="form-control bg-light" style="display:none;"  data-inputmask='"mask": "999.999.999-99"' data-mask>
                                                            <input type="text" id="buscaNick" name="buscaNick" class="form-control bg-light" style="display:none;">
                                                            <div class="input-group-prepend">
                                                                <button onclick="buscaCliente()" class="input-group-text"><i class="fas fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                        <em id="busc_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                            <input type="text" id="clienteNome" name="clienteNome" class="form-control bg-light" disabled>
                                                        </div>
                                                        <em id="nome_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group  col-md-12">
                                                        <label>Apelido:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteNick" name="clienteNick" class="form-control bg-light" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>CPF:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteCpf" name="clienteCpf" class="form-control bg-light" data-inputmask='"mask": "999.999.999-99"' data-mask disabled>
                                                        </div>
                                                        <em id="cpf_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label>Nascimento:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteNascimento" name="clienteNascimento" class="form-control bg-light"  data-inputmask='"mask": "99/99/9999"' data-mask disabled>
                                                        </div>
                                                        <em id="nasc_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Celular:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteCelular" name="clienteCelular" class="form-control bg-light" data-inputmask='"mask": "(99) 99999-9999"' data-mask disabled>
                                                        </div>
                                                        <em id="cell_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Telefone:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteFone" name="clienteFone" class="form-control bg-light" data-inputmask='"mask": "(99) 9999-9999"' data-mask disabled>
                                                        </div>
                                                        <em id="fone_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                            </div>
                                                            <input type="email" id="clienteEmail" name="clienteEmail" class="form-control bg-light" disabled>
                                                        </div>
                                                        <em id="mail_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>CEP:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                            </div>
                                                            <input type="text" id="cep" name="cep" class="form-control bg-light" data-inputmask='"mask": "99999-999"' data-mask onblur="pesquisacep(this.value);" disabled>
                                                        </div>
                                                        <em id="cep_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Número:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                            </div> 
                                                            <input type="text" id="numeroLogradouro" name="numeroLogradouro" class="form-control bg-light" disabled>
                                                        </div>
                                                        <em id="num_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>UF:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                            </div>
                                                            <input type="text" id="uf" name="uf" class="form-control bg-light" disabled>
                                                        </div>
                                                        <em id="uf_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Logradouro:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                                            </div>
                                                            <input type="text" id="logradouro" name="logradouro" class="form-control bg-light" disabled>
                                                        </div>
                                                        <em id="logr_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Bairro:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                                            </div>
                                                            <input type="text" id="province" name="province" class="form-control bg-light" disabled>
                                                        </div>
                                                        <em id="bairr_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Cidade:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                            </div>
                                                            <input type="text" id="cidade" name="cidade" class="form-control bg-light" disabled>
                                                        </div>
                                                        <em id="cidad_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitch" onchange="dependente(this.value)" disabled>
                                                <label class="form-check-label" for="flexSwitch">Vincular Dependentes</label>
                                            </div>
                                            <div class="card-body" id="dependente" style="display:none;">
                                                <div class="row">
                                                    <div class="form-group col-md-6">
                                                        <label>Nome:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input type="text" id="dependenteNome" name="dependenteNome" class="form-control bg-light">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
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
                                                    <div class="form-group col-md-4">
                                                        <label>CEP:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                            </div>
                                                            <input type="text" id="cepDependente" name="cepDependente" class="form-control bg-light" data-inputmask='"mask": "99999-999"' data-mask onblur="pesquisacepDep(this.value);">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Número:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                            </div> 
                                                            <input type="text" id="numeroLogradouroDependente" name="numeroLogradouroDependente" class="form-control bg-light">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Logradouro:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                                            </div>
                                                            <input type="text" id="logradouroDependente" name="logradouroDependente" class="form-control bg-light" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Bairro:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                                            </div>
                                                            <input type="text" id="provinceDependente" name="provinceDependente" class="form-control bg-light" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Cidade:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                            </div>
                                                            <input type="text" id="cidadeDependente" name="cidadeDependente" class="form-control bg-light" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>UF:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                            </div>
                                                            <input type="text" id="ufDependente" name="ufDependente" class="form-control bg-light" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12"><button class="btn btn-primary <?= !isset($colorbtn) ?: $colorbtn ?>" onclick="dependenteNew()" style="float:right;">Adicionar</button></div>
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
                                                            <input type="date" id="dataAluguel" name="dataAluguel" class="form-control bg-light" data-inputmask='"mask": "99/99/9999"' data-mask >
                                                        </div>
                                                        <em id="retirada_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label>Data de Devolução:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                            </div>
                                                            <input type="date" id="dataEntrega" name="dataEntrega" class="form-control bg-light"  data-inputmask='"mask": "99/99/9999"' data-mask readonly>
                                                        </div>
                                                        <em id="devolucao_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                </div>    
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card card-primary">
                                                    <div class="card-body p-0">
                                                        <div id="calendar"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="traje-part" class="content" role="tabpanel" aria-labelledby="traje-part-trigger">
                                    <div class="card-body content-card">
                                        <h4 class="ml-3 title">Busque o traje:</h4>
                                        <div class="card col-md-12">
                                            <div class="card-body" style="">
                                                <div class="row">
                                                    <div class="form-group col-md-5">
                                                        <label for="selectTrajes" class="form-label">Categoria:</label>
                                                        <select id="selectTrajes" name="selectTrajes" class="form-select form-select-lg">
                                                            <option value="" selected disabled> Selecione uma categoria</option>
                                                            <?php foreach($trajes as $trj){?>
                                                            <option value="<?php echo $trj['departamento_id'];?>"> <?php echo $trj['departamento_nome'];?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="selectColor" class="form-label">Cor</label>
                                                        <select id="selectColor" name="selectColor" class="form-select form-select-lg">
                                                            <option value="" selected disabled> Escolha uma cor</option>
                                                            <?php foreach($cores as $cor){?>
                                                            <option value="<?php echo $cor['opcao_id'];?>"> <?php echo $cor['opcao_nome'];?></option>
                                                            <?php }?>
                                                            <option value="0"> Todos</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-3">
                                                        <label for="selectSize" class="form-label">Tamanho</label>
                                                        <select id="selectSize" name="selectSize" class="form-select form-select-lg">
                                                            <option value="" selected disabled> Escolha um tamanho</option>
                                                            <?php foreach($tamanhos as $tam){?>
                                                            <option value="<?php echo $tam['opcao_id'];?>"> <?php echo $tam['opcao_nome'];?></option>
                                                            <?php }?>
                                                            <option value="0"> Todos</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-8">
                                                        <label>Informe a busca:</label>
                                                        <div class="input-group">
                                                            <input type="text" id="trajeLike" name="trajeLike" class="form-control" style="border-radius: 5px">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="selectDefinition" class="form-label">Definição</label>
                                                        <select id="selectDefinition" name="selectDefinition" class="form-select form-select-lg">
                                                            <option value=""> Disponível</option>
                                                            <!--<option value=""> Em preparação</option>-->
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 text-right p-0"> 
                                                    <!-- <button class="btn bnt-link" onclick="retornaData();"><i class="fa fa-arrow-left"></i> Voltar</button> -->
                                                    <div>
                                                        <button class="btn btn-danger">Redefinir</button>
                                                        <button class="btn btn-primary <?= !isset($colorbtn) ?: $colorbtn ?>" onclick="buscaTraje()" >Buscar <i class="fas fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card" id="listagemTrajes">
                                            <div class="card-body text-dark">
                                                <table class="table table-sm table-hover table-listagem">
                                                    <thead>
                                                        <tr>
                                                            <td></td>
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
                                                            <td></td>
                                                        </tr>
                                                    </thead>
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
                                        <button id="btn-proximo" class="btn-lg btn btn-primary <?= !isset($colorbtn) ?: $colorbtn ?>" onclick="gravaCliente();">Próximo</button>
                                    </div>
                                    
                                </div>
                                
                                <div id="final-part" class="content" role="tabpanel" aria-labelledby="final-part-trigger">
                                    <div class="card-body">
                                        <input type="hidden" id="clienteChaveUnica" name="clienteChaveUnica">
                                        <input type="hidden" id="clienteLocador" name="clienteLocador">
                                        <input type="hidden" id="nivelCliente" name="nivelCliente">
                                        <input type="hidden" id="nomeCliente" name="nomeCliente">
                                        <input type="hidden" id="cpfCliente" name="cpfCliente">
                                        <input type="hidden" id="phoneCliente" name="phoneCliente">
                                        <input type="hidden" id="dataIni" name="dataIni">
                                        <input type="hidden" id="dataFim" name="dataFim">
                                        <input type="hidden" id="trajesAluguel" name="trajesAluguel">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6 p-3">
                                                        <h3><b>Informações da Locação:</b></h3>
                                                        <div class="mt-5">
                                                            <div class="col-md-4">
                                                                <label for="dataLocacao">Data Locação:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                    </div>
                                                                    <input type="date" id="dataLocacao" name="dataLocacao" class="form-control" data-inputmask='"mask": "99/99/9999"' data-mask readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 p-0">
                                                                <label for="dataDevolucao">Data Devolução:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                    </div>
                                                                    <input type="date" id="dataDevolucao" name="dataDevolucao" class="form-control" data-inputmask='"mask": "99/99/9999"' data-mask readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 p-0">
                                                                <label for="nomeAtendente">Atendente:</label>
                                                                <select class="form-control" name="nomeAtendente" id="nomeAtendente">
                                                                    <option value="" selected disabled hidden>Selecione um atendente</option>
                                                                    <?php foreach($usuarios as $row){ ?>
                                                                        <option value="<?= $row['id_usuario'] ?>"><?= $row['nome_usuario'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 p-3">
                                                        <h3><b>Dados do Cliente:</b></h3>
                                                        <div class="mt-5">
                                                            <div class="col-md-4 ml-0 p-0">
                                                                <label>CPF:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                                    </div>
                                                                    <input type="text" id="viewclienteCpf" class="form-control" data-inputmask='"mask": "999.999.999-99"' data-mask readonly>
                                                                </div>
                                                            </div>
        
                                                            <div class="col-md-4">
                                                                <label>Nome:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                                    </div>
                                                                    <input type="text" id="viewclienteNome" class="form-control" readonly>
                                                                </div>
                                                            </div>
        
                                                            <div class="col-md-4 p-0">
                                                                <label>Celular:</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                                    </div>
                                                                    <input type="text" id="viewclienteCelular" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 card mt-5" id="listagem-final">                                                
                                                </div>
                                            </div> 
                                        </div>                                      
                                        <input type="hidden" id="clienteChaveUnica" name="clienteChaveUnica">
                                        <input type="hidden" id="chaveLocacao" name="chaveLocacao">
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
                                <?php  for($aux = 0; $aux < count($imagens); ) { ?>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $aux ?>" <?= $aux++ != 0 ?: 'class="active"'?> aria-current="true" aria-label="Slide <?= $aux ?>"></button>
                                <?php } ?>
                            </div>
                            <div class="carousel-inner">

                                <?php $aux=0; foreach($imagens as $item) { ?>
                                    <div class="carousel-item <?= $aux++ != 0 ?: 'active' ?>">
                                        <img class="img-reserva img-rounded d-block" src="<?= $item ?>" alt="First slide">
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div id="card-listagem" class="card d-none h-100 content-listagem">
                        <div class="card-body text-dark">
                            <table class="table table-sm table-hover table-listagem">
                                <thead>
                                    <tr>
                                        <td></td>
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
                                        <td></td>
                                    </tr>
                                </thead>
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
                    <button type="button" class="btn btn-primary <?= !isset($colorbtn) ?: $colorbtn ?>" onclick="buscaCliente()">Selecionar</button>
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
                    <button type="button" class="btn btn-primary <?= !isset($colorbtn) ?: $colorbtn ?>" onclick="gravaTrajeLocacao()">Selecionar</button>
                </div>
            </div>
        </div>
    </div>
    
    <script src="<?php echo base_url('siteResource/');?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/fullcalendar/main.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
     
<script>
        var switchStatus = false;

        $( document ).ready(function() {
            $("#togBtn").on('change', function() {
                if ($(this).is(':checked')) {
                    switchStatus = $(this).is(':checked');
                    alert(switchStatus);// To verify
                }
                else {
                switchStatus = $(this).is(':checked');
                alert(switchStatus);// To verify
                }
            });
        });

</script>
<script>
    function limpa_formulário_cep() {
        document.getElementById('logradouro').value=("");
        document.getElementById('province').value=("");
        document.getElementById('cidade').value=("");
        document.getElementById('uf').value=("");
        document.getElementById('logradouroDependente').value=("");
        document.getElementById('provinceDependente').value=("");
        document.getElementById('cidadeDependente').value=("");
        document.getElementById('ufDependente').value=("");
    }
    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('province').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
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
                document.getElementById('logradouro').value="...";
                document.getElementById('province').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";

                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';
                document.body.appendChild(script);
            } else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } else {
            limpa_formulário_cep();
        }
    };
    
    function pesquisacepDep(valor) {
        var cep = valor.replace(/\D/g, '');
        if (cep != "") {
            var validacep = /^[0-9]{8}$/;
            if(validacep.test(cep)) {
                document.getElementById('logradouroDependente').value="...";
                document.getElementById('provinceDependente').value="...";
                document.getElementById('cidadeDependente').value="...";
                document.getElementById('ufDependente').value="...";

                var script = document.createElement('script');
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callbackDep';
                document.body.appendChild(script);
            } else {
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } else {
            limpa_formulário_cep();
        }
    };
    function meu_callbackDep(conteudo) {
        if (!("erro" in conteudo)) {
            document.getElementById('logradouroDependente').value=(conteudo.logradouro);
            document.getElementById('provinceDependente').value=(conteudo.bairro);
            document.getElementById('cidadeDependente').value=(conteudo.localidade);
            document.getElementById('ufDependente').value=(conteudo.uf);
        } else {
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
</script>
 
<script>        
        //funções stepper 1 - Dados do Cliente NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
        function dependente(id){
            var switchStatus = false;
            if ($("#flexSwitch").is(':checked')) {
                switchStatus = $("#flexSwitch").is(':checked');
                $('#dependente').css('display','block');
            }
            else {
                switchStatus = $("#flexSwitch").is(':checked');
                $('#dependente').css('display','none');
            }
        }
        
        function buscaMask(){
            var x = document.getElementById("selectBusca").value;
            if(x == "nome"){
                $('#busca').css('display','none');
                $('#buscaNome').css('display','block');
                $('#buscaFone').css('display','none');
                $('#buscaCpf').css('display','none');
                $('#buscaNick').css('display','none');
            }else if(x == "cpf"){
                $('#busca').css('display','none');
                $('#buscaNome').css('display','none');
                $('#buscaFone').css('display','none');
                $('#buscaCpf').css('display','block');
                $('#buscaNick').css('display','none');
            }else if(x == "telefone"){
                $('#busca').css('display','none');
                $('#buscaNome').css('display','none');
                $('#buscaFone').css('display','block');
                $('#buscaCpf').css('display','none');
                $('#buscaNick').css('display','none');
            }else if(x == "nick"){
                $('#busca').css('display','none');
                $('#buscaNome').css('display','none');
                $('#buscaFone').css('display','none');
                $('#buscaCpf').css('display','none');
                $('#buscaNick').css('display','block');
            }
        }
        
        function buscaCliente(){
           
            var flag = 0;
            $('#selectBusca').prop("disabled", true);
            
            var x = $('#selectBusca').val();

            if(x == "nome"){
                if($('#buscaNome').val() == ""){
                    $('#busc_erro').html("Campo Obrigatório");
                    $('#busc_erro').show();
                    flag = 1;
                }else{
                    var busca = $('#buscaNome').val();
                    x = 'clt_nome';
                    $('#buscaNome').prop("disabled", true);
                }
            }else if(x == "cpf"){
                if($('#buscaCpf').val() == ""){
                    $('#busc_erro').html("Campo Obrigatório");
                    $('#busc_erro').show();
                    flag = 1;
                }else{
                    var busca = $('#buscaCpf').val();
                    x = 'clt_cpf';
                    $('#buscaCpf').prop("disabled", true);
                }
            }else if(x == "telefone"){
                if($('#buscaFone').val() == ""){
                    $('#busc_erro').html("Campo Obrigatório");
                    $('#busc_erro').show();
                    flag = 1;
                }else{
                    var busca = $('#buscaFone').val();
                    x = 'clt_cel';
                    $('#buscaFone').prop("disabled", true);
                }
            }else if(x == "nick"){
                if($('#buscaNick').val() == ""){
                    $('#busc_erro').html("Campo Obrigatório");
                    $('#busc_erro').show();
                    flag = 1;
                }else{
                    var busca = $('#buscaNick').val();
                    x = 'clt_apelido';
                    $('#buscaNick').prop("disabled", true);
                }
            }else if(x == "lista"){
                var busca = $("input[name='listacpf']:checked").val();
                x = 'clt_cpf';
                $("#nomeClienteModal").modal('toggle');
            }
            
            //retorna codigo
            if(flag === 0){
              
                dados = new FormData();
                dados.append('busca', x);
                dados.append('valor', busca);
                $.ajax({
                    url: '<?php echo base_url('consultaCliente');?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    beforeSend: function(){
                        
                    },
                    error: function(xhr, status, error) {
                       // alert("teste")
                        console.log(xhr);
                        console.log(status);
                        console.log(error);
                    },
                    success: function(data) {
                        if(data.success === 'oldOne'){
                            Swal.fire(
                                'Cadastro desatualizado!',
                                'Atualize os dados para realizar a Locação!',
                                'warning'
                            );
                            $('#clienteCpf').prop("disabled", false);
                            $('#clienteNome').prop("disabled", false);
                            $('#clienteNick').prop("disabled", false);
                            $('#clienteNascimento').prop("disabled", false);
                            $('#clienteCelular').prop("disabled", false);
                            $('#clienteFone').prop("disabled", false);
                            $('#clienteEmail').prop("disabled", false);
                            $('#cep').prop("disabled", false);
                            $('#numeroLogradouro').prop("disabled", false);
                            $('#flexSwitch').prop("disabled", false);
                        
                            $('#clienteCpf').val(data.cliente.cpf);
                            $('#clienteNome').val(data.cliente.nome);
                            $('#clienteNick').val(data.cliente.apelido);
                            $('#clienteNascimento').val(data.cliente.nasc);
                            $('#clienteCelular').val(data.cliente.cel);
                            $('#clienteFone').val(data.cliente.tel);
                            $('#clienteEmail').val(data.cliente.mail);
                            $('#cep').val(data.cliente.cep);
                            pesquisacep(data.cliente.cep);
                            $('#numeroLogradouro').val(data.cliente.num);
                            $('#logradouro').val(data.cliente.logra);
                            $('#province').val(data.cliente.prov);
                            $('#cidade').val(data.cliente.city);
                            $('#uf').val(data.cliente.uf);
                            $('#clienteChaveUnica').val(data.fingerprint);
                            
                        }else if(data.success == "oldArray"){
                            var lista = document.getElementById("listaClienteNomes");
                            
                            for(var i = 0; i< data.rowNomes; i++){
                                var rowCount = lista.rows.length;
                                var row = lista.insertRow(rowCount);
                                row.insertCell(0).innerHTML= rowCount+1;
                                row.insertCell(1).innerHTML= data.cliente[i].nome;
                                row.insertCell(2).innerHTML= data.cliente[i].cel;
                                row.insertCell(3).innerHTML= data.cliente[i].cpf;
                                row.insertCell(4).innerHTML= "<input type='radio' id='listaNome"+i+"' name='listacpf' value='"+data.cliente[i].cpf+"'>";
                            }
                            $("#nomeClienteModal").modal('toggle');
                            $('#selectBusca').val("lista");
                            
                        }else if(data.success == true){
                            $('#clienteCpf').prop("disabled", false);
                            $('#clienteNome').prop("disabled", false);
                            $('#clienteNick').prop("disabled", false);
                            $('#clienteNascimento').prop("disabled", false);
                            $('#clienteCelular').prop("disabled", false);
                            $('#clienteFone').prop("disabled", false);
                            $('#clienteEmail').prop("disabled", false);
                            $('#cep').prop("disabled", false);
                            $('#numeroLogradouro').prop("disabled", false);
                            //$('#logradouro').prop("disabled", false);
                            //$('#province').prop("disabled", false);
                            //$('#cidade').prop("disabled", false);
                            //$('#uf').prop("disabled", false);
                            $('#flexSwitch').prop("disabled", false);
                        
                            $('#clienteCpf').val(data.cliente.cpf);
                            $('#clienteNome').val(data.cliente.nome);
                            $('#clienteNick').val(data.cliente.apelido);
                            $('#clienteNascimento').val(data.cliente.nasc);
                            $('#clienteCelular').val(data.cliente.cel);
                            $('#clienteFone').val(data.cliente.tel);
                            $('#clienteEmail').val(data.cliente.mail);
                            $('#cep').val(data.cliente.cep);
                            $('#numeroLogradouro').val(data.cliente.num);
                            $('#logradouro').val(data.cliente.logra);
                            $('#province').val(data.cliente.prov);
                            $('#cidade').val(data.cliente.city);
                            $('#uf').val(data.cliente.uf);
                            $('#clienteChaveUnica').val(data.fingerprint);
                            //if(data.cliente.cep != ""){
                                //pesquisacep(data.cliente.cep);
                            //}
                            
                            if(data.isDependente == true){
                                $("#listaDependentes").html("");
                                var table = document.getElementById("listaDependentes");
                                
                                for(var i = 0; i< data.rowDependente; i++){
                                    var rowCount = table.rows.length;
                                    var row = table.insertRow(rowCount);
                                    row.insertCell(0).innerHTML= rowCount+1;
                                    row.insertCell(1).innerHTML= data.dependentes[i].dpd_nome;
                                    row.insertCell(2).innerHTML= data.dependentes[i].dpd_fone;
                                    row.insertCell(3).innerHTML= data.dependentes[i].dpd_cpf;
                                    //row.insertCell(4).innerHTML= "<input type='radio' id='depend"+i+"' name='depend' value='"+data.dependentes[i].dpd_nome+"'>";
                                }
                            }

                        }else if(data.success == "array"){
                            var lista = document.getElementById("listaClienteNomes");
                            
                            for(var i = 0; i< data.rowNomes; i++){
                                var rowCount = lista.rows.length;
                                var row = lista.insertRow(rowCount);
                                if(data.cliente[i].old == false){
                                    row.style.backgroundColor = "aquamarine";
                                }
                                row.insertCell(0).innerHTML= rowCount+1;
                                row.insertCell(1).innerHTML= data.cliente[i].nome;
                                row.insertCell(2).innerHTML= data.cliente[i].cel;
                                row.insertCell(3).innerHTML= data.cliente[i].cpf;
                                row.insertCell(4).innerHTML= "<input type='radio' id='listaNome"+i+"' name='listacpf' value='"+data.cliente[i].cpf+"'>";
                            }
                            $("#nomeClienteModal").modal('toggle');
                            $('#selectBusca').val("lista");
                            
                        }else{
                            $('#clienteCpf').prop("disabled", false);
                            $('#clienteNome').prop("disabled", false);
                            $('#clienteNick').prop("disabled", false);
                            $('#clienteNascimento').prop("disabled", false);
                            $('#clienteCelular').prop("disabled", false);
                            $('#clienteFone').prop("disabled", false);
                            $('#clienteEmail').prop("disabled", false);
                            $('#cep').prop("disabled", false);
                            $('#numeroLogradouro').prop("disabled", false);
                            //$('#logradouro').prop("disabled", false);
                            //$('#province').prop("disabled", false);
                            //$('#cidade').prop("disabled", false);
                            //$('#uf').prop("disabled", false);
                            $('#flexSwitch').prop("disabled", false);
                            if($('#selectBusca').val() == "nome"){
                                $('#clienteNome').val(busca);
                            }else if($('#selectBusca').val() == "cpf"){
                                $('#clienteCpf').val(busca);
                            }else if($('#selectBusca').val() == "telefone"){
                                $('#clienteCelular').val(busca);
                            }
                            $('#clienteChaveUnica').val(data.fingerprint);
                        }
                    },
                });
            }
        }
        
        function gravaCliente(){
            var flag = 0;
            dados = new FormData();
            
            if($('#clienteNome').val() == ""){
                $('#nome_erro').html("Campo Obrigatório");
                $('#nome_erro').show();
                flag = 1;
            }else{
                dados.append('nome', $('#clienteNome').val());
                $('#nome_erro').hide();
            }
            
            if($('#clienteCpf').val() == ""){
                $('#cpf_erro').html("Campo Obrigatório");
                $('#cpf_erro').show();
                flag = 1;
            }else{
                dados.append('cpf', $('#clienteCpf').val());
                $('#cpf_erro').hide();
            }
            
            if($('#clienteNascimento').val() == ""){
                $('#nasc_erro').html("Campo Obrigatório");
                $('#nasc_erro').show();
                flag = 1;
            }else{
                dados.append('nasc', $('#clienteNascimento').val());
                $('#nasc_erro').hide();
            }
            
            if($('#clienteCelular').val() == ""){
                $('#cell_erro').html("Campo Obrigatório");
                $('#cell_erro').show();
                flag = 1;
            }else{
                dados.append('cel', $('#clienteCelular').val());
                $('#cell_erro').hide();
            }
            
            /*if($('#clienteFone').val() == ""){
                $('#fone_erro').html("Campo Obrigatório");
                $('#fone_erro').show();
                flag = 1;
            }else{
                dados.append('tel', $('#clienteFone').val());
                $('#fone_erro').hide();
            }*/
            
            /*if($('#clienteEmail').val() == ""){
                $('#mail_erro').html("Campo Obrigatório");
                $('#mail_erro').show();
                flag = 1;
            }else{
                dados.append('mail', $('#clienteEmail').val());
                $('#mail_erro').hide();
            }*/
            
            dados.append('tel', $('#clienteFone').val());
            dados.append('mail', $('#clienteEmail').val());
            dados.append('tel', $('#clienteFone').val());
            
            if($('#cep').val() == ""){
                $('#cep_erro').html("Campo Obrigatório");
                $('#cep_erro').show();
                flag = 1;
            }else{
                dados.append('cep', $('#cep').val());
                $('#cep_erro').hide();
            }
            
            if($('#numeroLogradouro').val() == ""){
                $('#num_erro').html("Campo Obrigatório");
                $('#num_erro').show();
                flag = 1;
            }else{
                dados.append('num', $('#numeroLogradouro').val());
                $('#num_erro').hide();
            }
            
            if($('#uf').val() == ""){
                $('#uf_erro').html("Campo Obrigatório");
                $('#uf_erro').show();
                flag = 1;
            }else{
                dados.append('uf', $('#uf').val());
                $('#uf_erro').hide();
            }
            
            if($('#cep').val() == ""){
                $('#logr_erro').html("Campo Obrigatório");
                $('#logr_erro').show();
                flag = 1;
            }else{
                dados.append('logra', $('#logradouro').val());
                $('#logr_erro').hide();
            }
            
            if($('#cep').val() == ""){
                $('#bairr_erro').html("Campo Obrigatório");
                $('#bairr_erro').show();
                flag = 1;
            }else{
                dados.append('prov', $('#province').val());
                $('#bairr_erro').hide();
            }
            
            if($('#cep').val() == ""){
                $('#cidad_erro').html("Campo Obrigatório");
                $('#cidad_erro').show();
                flag = 1;
            }else{
                dados.append('city', $('#cidade').val());
                $('#cidad_erro').hide();
            }
            
            if(flag === 0){
                dados.append('keyId', $('#clienteChaveUnica').val());
    
                $.ajax({
                    url: '<?php echo base_url('gravaCliente');?>',
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
                        $("#tituloHead").text("");
                        $("#tituloHead").text("Definição de Data:");
                        /*
                        if (!$("input[name='depend']").is(':checked')) {
                            var locador = $('#clienteNome').val();
                            var tipo = 'clienteTie';
                        }else{
                            var locador = $("input[name='depend']:checked").val();
                            var tipo = 'dependentesTie';
                        }
                        */
                        
                        //$("#clienteLocadorData").parent().text(locador);
                        $("#clienteResponsavelData").text($('#clienteNome').val());
                        
                        //$("#clienteLocadorTraje").parent().text(locador);
                        $("#clienteResponsavelTraje").text($('#clienteNome').val());
                        
                        //$("#clienteLocador").val(locador);
                        //$("#nivelCliente").val(tipo);
                        
                        
                        $('#nomeCliente').val($('#clienteNome').val());
                        $('#cpfCliente').val($('#clienteCpf').val());
                        $('#phoneCliente').val($('#clienteCelular').val());
                        //$('#viewclienteFone').val($('#clienteFone').val());
                        $('#viewcep').val($('#cep').val());
                        $('#viewuf').val($('#uf').val());
                        $('#viewnumeroLogradouro').val($('#numeroLogradouro').val());
                        $('#viewlogradouro').val($('#logradouro').val());
                        $('#viewprovince').val($('#province').val());
                        $('#viewcidade').val($('#cidade').val());
                        
                        //var atendente = "Nome do atendente.";
                        //$("#atendente").val(atendente);
                        
                        $("#btn-anterior").removeClass('d-none');
                        $("#btn-anterior").attr('onclick', 'retornaCliente();');
                        $("#btn-proximo").attr('onclick', 'selecionaTraje();');
                        
                        stepper.next();
                        $( ".fc-dayGridMonth-button" ).click();
                        
                        preencheClienteDependente();
                        
                        if(data.isDependente == true){
                                $("#listaDependentes").html("");
                                var table = document.getElementById("listaDependentes");
                                
                                for(var i = 0; i< data.rowDependente; i++){
                                    var rowCount = table.rows.length;
                                    var row = table.insertRow(rowCount);
                                    row.insertCell(0).innerHTML= rowCount+1;
                                    row.insertCell(1).innerHTML= data.dependentes[i].dpd_nome;
                                    row.insertCell(2).innerHTML= data.dependentes[i].dpd_fone;
                                    row.insertCell(3).innerHTML= data.dependentes[i].dpd_cpf;
                                    //row.insertCell(4).innerHTML= "<input type='radio' id='depend"+i+"' name='depend' value='"+data.dependentes[i].dpd_nome+"'>";
                                    
                                    var row0Count = locador.rows.length;
                                    var row0 = locador.insertRow(row0Count);
                                    row0.insertCell(0).innerHTML= row0Count+1;
                                    row0.insertCell(1).innerHTML= data.dependentes[i].dpd_nome;
                                    row0.insertCell(2).innerHTML= data.dependentes[i].dpd_fone;
                                    row0.insertCell(3).innerHTML= data.dependentes[i].dpd_cpf;
                                    row0.insertCell(4).innerHTML= "<input type='radio' id='locador"+i+"' name='locador' value='"+data.dependentes[i].dpd_id+"'>";
                                }
                            }
                    }
                });
            }
        }
        
        function dependenteNew(){
            
            dados = new FormData();
            dados.append('dpd_nome', $('#dependenteNome').val());
            dados.append('dpd_cpf', $('#dependenteCpf').val());
            dados.append('dpd_fone', $('#dependenteFone').val());
            dados.append('dpd_chave', $('#clienteChaveUnica').val());
            dados.append('dpd_cep', $('#cepDependente').val());
            dados.append('dpd_num', $('#numeroLogradouroDependente').val());
            
            $.ajax({
                url: '<?php echo base_url('dependentesNovo');?>',
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
                    
                    var nome = $('#dependenteNome').val();
                    var fone = $('#dependenteFone').val();
                    var cpf = $('#dependenteCpf').val();
                    
                    var table = document.getElementById("listaDependentes");
                    var rowCount = table.rows.length;
                    var row = table.insertRow(rowCount);
                    row.insertCell(0).innerHTML= rowCount;
                    row.insertCell(1).innerHTML= nome;
                    row.insertCell(2).innerHTML= fone;
                    row.insertCell(3).innerHTML= cpf;
                    row.insertCell(4).innerHTML= "<input type='radio' id='depend"+i+"' name='depend' value="+nome+">";
                    
                    $('#dependenteNome').val("");
                    $('#dependenteFone').val("");
                    $('#dependenteCpf').val("");
                    
                }
            });
        }
</script>
<script>
        //funções stepper 2 - Dados do Cliente NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
        function dataEvento(){            
        }
        
        function selecionaTraje(){
            var flag = 0; 
            
            if($('#dataAluguel').val() == ""){
                $('#retirada_erro').html("Campo Obrigatório");
                $('#retirada_erro').show();
                flag = 1;
            }else{
                $("#dataIni").val($('#dataAluguel').val());
            } 

            if($('#dataEntrega').val() == ""){
                $('#devolucao_erro').html("Campo Obrigatório");
                $('#devolucao_erro').show();
                flag = 1;
            }else{
                $("#dataFim").val($('#dataEntrega').val());
            }
            
            if(flag === 0 ){
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
        
        function retornaCliente(){
            $("#tituloHead").text("");
            $("#tituloHead").text("Dados do Cliente:");
            
            $("#btn-anterior").addClass('d-none');
            $("#btn-anterior").attr('onclick', '');
            $("#btn-proximo").attr('onclick', 'gravaCliente();');
            
            stepper.previous();
        }
</script>
<script>        
        //funções stepper 3 - Dados dos Trajes NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
        function buscaTraje(){
            dados = new FormData();
            dados.append('categoria', $('#selectTrajes').val());
            dados.append('detalhes', $('#trajeLike').val());
            dados.append('dataInicio', $('#dataAluguel').val());
            dados.append('dataFim', $('#dataEntrega').val());
            dados.append('cor', $('#selectColor').val());
            dados.append('tamanho', $('#selectSize').val());
            //dados.append('definicao', $('#selectDefinition').val());
            
            $.ajax({
                url: '<?php echo base_url('buscaTraje');?>',
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
        
        function novoTraje(id_traje){
            $("#listaClienteDependenteModal").modal('toggle');
            $("#trajeLocacao").val(id_traje);
        }

        function atualizaListagemSelecionados(){
            dados = new FormData();
            dados.append('chaveLocacao', $('#chaveLocacao').val());            
            $.ajax({
                url: '<?php echo base_url('showSelecteds');?>',
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
        
        function gravaTrajeLocacao(){
            dados = new FormData();
            dados.append('traje', $("#trajeLocacao").val());
            dados.append('locador', $("input[name='locador']:checked").val());
            dados.append('retirada', $('#dataAluguel').val());
            dados.append('devolucao', $('#dataEntrega').val());
            dados.append('keyClt', $('#clienteChaveUnica').val());
            dados.append('obs', $('#detalhealuguel').val());
            if($('#chaveLocacao').val() != ""){
                dados.append('keyLoc', $('#chaveLocacao').val());
            }
            $.ajax({
                url: '<?php echo base_url('gravaLocacao');?>',
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
                    $("input[name='locador']:checked").attr("checked", false);
                    $("#listaClienteDependenteModal").modal('toggle');
                    atualizaListagemSelecionados();
                    buscaTraje();
                }
            });
        }
        
        function retornaData(){
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
</script>
<script>        
        //funções stepper 4 - Dados do Aluguel NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
        function retornaTrajes(){
            $("#tituloHead").text("");
            $("#tituloHead").text("Definição do(s) Traje(s):");

            $("#btn-anterior").removeClass('d-none');
            $("#card1").addClass('col-md-6');
            $("#card1").removeClass('col-md-12');
            $("#card2").removeClass('d-none');
            stepper.previous();
        }

        function finalizaAluguel(){
            dados = new FormData();
            dados.append('chaveLocacao', $('#chaveLocacao').val());
            
            $.ajax({
                url: '<?php echo base_url('finalizaAluguel');?>',
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
            
                    $("#listagem-final").empty();
                    $("#listagem-final").html(data);

                    $("#btn-anterior").addClass('d-none');
                    $("#btn-proximo").addClass('d-none');

                    $("#card1").addClass('col-md-12');
                    $("#card1").removeClass('col-md-6');
                    $("#card2").addClass('d-none');
                    
                    $("#dataLocacao").val($("#dataIni").val());
                    $("#dataDevolucao").val($("#dataFim").val());
                    $("#viewclienteCpf").val($("#cpfCliente").val());
                    $("#viewclienteNome").val($("#nomeCliente").val());
                    $("#viewclienteCelular").val($("#phoneCliente").val());
                    //$("#viewclienteCpf").val($("#clienteCpf").val());
                    //$("#viewclienteCelular").val($("#clienteCelular").val());
                    stepper.next();
                }
            });
        }
</script>
<script>
        //Inicialização de passos na pagina
        document.addEventListener('DOMContentLoaded', function () {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        });
</script>        
<script>
        //Funções gerais do calendario de de mascaras
        $(function () {
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
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
                ele.each(function () {
                    var eventObject = {
                        title: $.trim($(this).text())
                    }
                    $(this).data('eventObject', eventObject);
                    $(this).draggable({
                        zIndex        : 1070,
                        revert        : true,
                        revertDuration: 0,
                    });
                })
            }
            ini_events($('#external-events div.external-event'));
            var date = new Date()
            var d    = date.getDate(),
                m    = date.getMonth(),
                y    = date.getFullYear();
            var Calendar = FullCalendar.Calendar;
            var Draggable = FullCalendar.Draggable;
            var calendarEl = document.getElementById('calendar');
            var calendar = new Calendar(calendarEl, {
                buttonText:  {
                    today:    'Hoje',
                    month:    'Mês',
                    week:     'Semana',
                    day:      'Dia',
                    list:     'Lista',
                },
                locale: 'pt-br',
                headerToolbar: {
                    right  : 'prev,next today',
                    center: 'title',
                    left : 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                allDaySlot: false,
                themeSystem: 'bootstrap',
                events: [],
                editable  : false,
                droppable : false, 
                dateClick: function(info) {
                    var hoje = '<?php echo date('Y/m/d');?>';
                    var data = info.dateStr;
                    var aux = data.split('-');
                    
                    var hoje = new Date(hoje);
                    var dataClick = new Date(aux[0]+'/'+aux[1]+'/'+aux[2]);
                    
                    if( hoje > dataClick){
                        Swal.fire(
                                'Data inválida!',
                                'Selecione uma data atual ou futura!',
                                'warning'
                            );
                    }else{
                        aux[2] = parseInt(aux[2]) + parseInt(<?php echo $status[0]['sta_dias'];?>);
                        if(aux[2] <10){
                            
                            aux[2] = "0"+aux[2];
                        }
                        
                        if(aux[1] == 01 || aux[1] == 03 || aux[1] == 05 || aux[1] == 07 || aux[1] == 08 || aux[1] == 10){
                            
                            if(aux[2] > 31){
                                aux[1] = parseInt(aux[1]) + parseInt(1);
                                aux[2] = ((parseInt(31) - parseInt(aux[2]))*-1);
                                
                                if(aux[2] <10){
                                    aux[2] = "0"+aux[2];
                                }
                                if(aux[1] <10){
                                    aux[1] = "0"+aux[1];
                                }
                            }else if(aux[2] <10){
                                aux[2] = "0"+aux[2];
                            }
                        }else if(aux[1] == 04 || aux[1] == 06 || aux[1] == 09 || aux[1] == 11){
                            if(aux[2] > 30){
                                aux[1] = parseInt(aux[1]) + parseInt(1);
                                aux[2] = ((parseInt(31) - parseInt(aux[2]))*-1);
                                                            
                                if(aux[2] <10){
                                    aux[2] = "0"+aux[2];
                                }
                                
                                if(aux[1] <10){
                                    aux[1] = "0"+aux[1];
                                }
                            }
                            
                        }else if(aux[1] == 02){
                            if(aux[2] > 28){
                                aux[1] = "03";
                                aux[2] = ((parseInt(31) - parseInt(aux[2]))*-1);
                                                            
                                if(aux[2] <10){
                                    aux[2] = "0"+aux[2];
                                }
                                if(aux[1] <10){
                                    aux[1] = "0"+aux[1];
                                }
                            }
                        }else if(aux[1] == 12){
                            if(aux[2] > 31){
                                aux[1] = "01";
                                aux[2] = ((parseInt(31) - parseInt(aux[2]))*-1);
                            }
                        }
                        var devo = aux.join('-');
                        
                        const d1 = new Date(devo);
                        if(d1.getDay() == 6){
                            devo = devo.split('-');
                            devo[2] = devo[2] = parseInt(devo[2]) + parseInt(1);
                            if(devo[2] < 10){
                                devo[2] = "0"+devo[2];
                            }
                            devo = devo.join('-');
                        }
    
                        $("#dataAluguel").val(data);
                        $("#dataEntrega").val(devo);
                    }
                }
            });
            calendar.render();
        });
</script>
<script>
    function preencheClienteDependente(){
        
        dados = new FormData();
        dados.append('busca', "clt_cpf");
        dados.append('valor', $('#clienteCpf').val());
        $.ajax({
            url: '<?php echo base_url('selecaoClienteDependente');?>',
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
                //$('#listaClienteDependenteResponsavel tbody').empty();
                var locador = document.getElementById("listaClienteDependenteResponsavel");
                                
                var row0 = locador.insertRow(1);
                row0.insertCell(0).innerHTML= 1;
                row0.insertCell(1).innerHTML= data.cliente.nome;
                row0.insertCell(2).innerHTML= data.cliente.cel;
                row0.insertCell(3).innerHTML= data.cliente.cpf;
                row0.insertCell(4).innerHTML= "<input type='radio' id='locador"+i+"' name='locador' value='"+data.cliente.cod+"'>";
                
                if(data.isDependente == true){
                    var table = document.getElementById("listaClienteDependenteResponsavel");
                    for(var i = 0; i< data.rowDependente; i++){
                        var rowCount = table.rows.length;
                        var row = table.insertRow(rowCount);
                        row.insertCell(0).innerHTML= rowCount;
                        row.insertCell(1).innerHTML= data.dependentes[i].dpd_nome;
                        row.insertCell(2).innerHTML= data.dependentes[i].dpd_fone;
                        row.insertCell(3).innerHTML= data.dependentes[i].dpd_cpf;
                        row.insertCell(4).innerHTML= "<input type='radio' id='locador"+i+"' name='locador' value='"+data.dependentes[i].dpd_id+"'>";
                    }
                }
            }
        });
    }
</script>
</body>
</html>