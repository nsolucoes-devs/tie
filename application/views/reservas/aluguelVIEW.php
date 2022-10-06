<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?= base_url('siteResource/') ?>plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('siteResource/') ?>plugins/fullcalendar/main.css">
    <link rel="stylesheet" href="<?= base_url('siteResource/') ?>dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url('siteResource/') ?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="<?= base_url('siteResource/') ?>plugins/bs-stepper/css/bs-stepper.min.css">
    
    <!-- slicknav & slick(carousel) -->
    <link href="<?php echo base_url('assets/admin/');?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <?php echo "<style>body { background-color: ".  $background ."; }</style>" ?>

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

        td, th, tr {
            border: hidden;
        }
                
        .text-concat {
            position: relative;
            display: inline-block;
            word-wrap: break-word;
            overflow: hidden;
            max-height: 3.6em;
            line-height: 1.2em;
        }
    </style>
</head>
<body>
    <section id="content-site" class="container">
        <section class="wrapper">
            <div style="margin-bottom: 20px; margin-top: 20px;">
                <a href="<?php echo base_url('res'); ?>" class="text-decoration-none text-light"><h3>Sair do Módulo</h3></a>
            </div>
            <div class="row">
                <div class="col-md-6" id="card1">
                    <div class="card h-100">
                        <div class="bs-stepper">
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
                                    <div class="step" data-target="#final-part">
                                        <button type="button" class="step-trigger" role="tab" aria-controls="final-part" id="final-part-trigger">
                                            <span class="bs-stepper-circle">4</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="bs-stepper-content">
                                <div id="cliente-part"  class="content" role="tabpanel" aria-labelledby="cliente-part-trigger" id="">
                                    <div class="card-body">
                                        <div class="inputBusca">
                                            <div class="card-body mb-2">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label>Tipo de Busca:</label>
                                                        <div class="input-group">
                                                            <select id="selectBusca" name="selectBusca" onchange="buscaMask()" class="form-control">
                                                                <option selected disabled> Selecione</option>
                                                                <option value="nome"> Nome</option>
                                                                <option value="telefone"> Celular</option>
                                                                <option value="cpf"> CPF</option>
                                                                <option value="lista" hidden> Lista</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <label>Informe a Busca:</label>
                                                        <div class="input-group">
                                                            <input type="text" id="busca" name="busca" class="form-control" disabled>
                                                            <input type="text" id="buscaNome" name="buscaNome" class="form-control" style="display:none;">
                                                            <input type="text" id="buscaFone" name="buscaFone" class="form-control" style="display:none;"  data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                                                            <input type="text" id="buscaCpf"  name="buscaCpf"  class="form-control" style="display:none;"  data-inputmask='"mask": "999.999.999-99"' data-mask>
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
                                                    <input type="hidden" id="clienteChaveUnica" name="clienteChaveUnica" class="form-control">
                                                    <div class="form-group  col-md-12">
                                                        <label>Nome:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteNome" name="clienteNome" class="form-control" disabled>
                                                        </div>
                                                        <em id="nome_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>CPF:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteCpf" name="clienteCpf" class="form-control" data-inputmask='"mask": "999.999.999-99"' data-mask disabled>
                                                        </div>
                                                        <em id="cpf_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label>Nascimento:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteNascimento" name="clienteNascimento" class="form-control"  data-inputmask='"mask": "99/99/9999"' data-mask disabled>
                                                        </div>
                                                        <em id="nasc_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Celular:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteCelular" name="clienteCelular" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask disabled>
                                                        </div>
                                                        <em id="cell_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Telefone:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" id="clienteFone" name="clienteFone" class="form-control" data-inputmask='"mask": "(99) 9999-9999"' data-mask disabled>
                                                        </div>
                                                        <em id="fone_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Email:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                                            </div>
                                                            <input type="email" id="clienteEmail" name="clienteEmail" class="form-control" disabled>
                                                        </div>
                                                        <em id="mail_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>CEP:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                            </div>
                                                            <input type="text" id="cep" name="cep" class="form-control" data-inputmask='"mask": "99999-999"' data-mask onblur="pesquisacep(this.value);" disabled>
                                                        </div>
                                                        <em id="cep_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Número:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-map-marker"></i></span>
                                                            </div> 
                                                            <input type="text" id="numeroLogradouro" name="numeroLogradouro" class="form-control" disabled>
                                                        </div>
                                                        <em id="num_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>UF:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                            </div>
                                                            <input type="text" id="uf" name="uf" class="form-control" disabled>
                                                        </div>
                                                        <em id="uf_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Logradouro:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                                            </div>
                                                            <input type="text" id="logradouro" name="logradouro" class="form-control" disabled>
                                                        </div>
                                                        <em id="logr_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Bairro:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                                            </div>
                                                            <input type="text" id="province" name="province" class="form-control" disabled>
                                                        </div>
                                                        <em id="bairr_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label>Cidade:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fa fa-globe"></i></span>
                                                            </div>
                                                            <input type="text" id="cidade" name="cidade" class="form-control" disabled>
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
                                                    <div class="form-group col-md-4">
                                                        <label>Nome:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                            </div>
                                                            <input type="text" id="dependenteNome" name="dependenteNome" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>CPF:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                            </div>
                                                            <input type="text" id="dependenteCpf" name="dependenteCpf" class="form-control" data-inputmask='"mask": "999.999.999-99"' data-mask>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label>Fone:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                                            </div>
                                                            <input type="text" id="dependenteFone" name="dependenteFone" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-12"><button class="btn btn-primary" onclick="dependenteNew()" style="float:right;">Adicionar</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" id="listaDependente">
                                            <h3>Lista de Dependentes</h3>
                                            <div class="table-body" style="overflow-y: auto">
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
                                        <button class="btn-lg btn btn-primary" onclick="gravaCliente()" style="float:right;">Próximo</button>
                                        <!-- <button class="btn-lg btn btn-danger mr-2" style="float:right;">Modal</button> -->
                                    </div>
                                </div>

                                <div id="data-part" class="content" role="tabpanel" aria-labelledby="data-part-trigger">
                                    <div class="card-body">
                                        <div>
                                            <div class="card-body">
                                                <div class="inputBusca">
                                                    <div class="card-body mb-2">
                                                        <div class="row">
                                                            <div class="form-group col-md-12">
                                                                <h2><label id="clienteLocadorData"></label></h2>
                                                            </div>
                                                            <div class="form-group col-md-12">
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
                                                            <input type="date" id="dataAluguel" name="dataAluguel" class="form-control" data-inputmask='"mask": "99/99/9999"' data-mask >
                                                        </div>
                                                        <em id="retirada_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group  col-md-6">
                                                        <label>Data de Devolução:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                            </div>
                                                            <input type="date" id="dataDevolucao" name="dataDevolucao" class="form-control"  data-inputmask='"mask": "99/99/9999"' data-mask >
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
                                        <div class="text-right">
                                            <button class="btn-lg btn btn-warning" onclick="retornaCliente();">Anterior</button>
                                            <button class="btn-lg btn btn-primary" onclick="selecionaTraje();">Próximo</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="traje-part" class="content" role="tabpanel" aria-labelledby="traje-part-trigger">
                                    <div class="card-body">
                                        <div>
                                            <div class="card-body mb-2">
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <h2><label id="clienteLocadorTraje"></label></h2>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <h5><label id="clienteResponsavelTraje"></label></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body mb-2">
                                                <div class="row">
                                                    <div class="form-group col-md-3">
                                                        <label>Categoria:</label>
                                                        <div class="input-group">
                                                            <select id="selectTrajes" name="selectTrajes" class="form-control">
                                                                <option selected disabled> Selecione</option>
                                                                <?php foreach($trajes as $trj){?>
                                                                <option value="<?php echo $trj['departamento_id'];?>"> <?php echo $trj['departamento_nome'];?></option>
                                                                <?php }?>
                                                                
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-9">
                                                        <label>Detalhes do Traje:</label>
                                                        <div class="input-group">
                                                            <input type="text" id="trajeLike" name="trajeLike" class="form-control">
                                                            <div class="input-group-prepend">
                                                                <button onclick="buscaTraje()" class="input-group-text"><i class="fas fa-search"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex justify-content-end">
                                            <div>
                                                <button class="btn-lg btn btn-warning" onclick="retornaData();">Anterior</button>
                                                <button class="btn-lg btn btn-primary" onclick="finalizaAluguel();">Próximo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="final-part"class="content" role="tabpanel" aria-labelledby="final-part-trigger">
                                    <input type="hidden" id="clienteChaveUnica" name="clienteChaveUnica">
                                    <input type="hidden" id="clienteLocador" name="clienteLocador">
                                    <input type="hidden" id="nivelCliente" name="nivelCliente">
                                    <input type="hidden" id="dataIni" name="dataIni">
                                    <input type="hidden" id="dataFim" name="dataFim">
                                    <input type="hidden" id="trajesAluguel" name="trajesAluguel">
                                    <div class="card-body">
                                        <div class="row">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6 p-3">
                                                    <h3><b>Dados do Cliente:</b></h3>
                                                    <div class="mt-5">
                                                        <div class="col-md-4 ml-0 p-0">
                                                            <label>CPF:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                                                </div>
                                                                <input type="text" id="viewclienteCpf" class="form-control" data-inputmask='"mask": "999.999.999-99"' data-mask disabled>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-4">
                                                            <label>Nome:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                                                </div>
                                                                <input type="text" id="viewclienteNome" class="form-control" disabled>
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-4 p-0">
                                                            <label>Celular:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-phone""></i></span>
                                                                </div>
                                                                <input type="text" id="viewclienteCelular" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 p-3">
                                                    <h3><b>Informações da Locação:</b></h3>
                                                    <div class="mt-5">
                                                        <div class="col-md-4 p-0">
                                                            <label for="nomeAtendente">Atendente:</label>
                                                            <select class="form-control" name="nomeAtendente" id="nomeAtendente">
                                                                <option value="" selected disabled>Selecione um atendente</option>
                                                                <option value="">Maria das dores</option>
                                                                <option value="">João Pedro</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="dataLocaçao">Data Locação:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                </div>
                                                                <input type="date" id="dataLocaçao" name="dataLocaçao" class="form-control" data-inputmask='"mask": "99/99/9999"' data-mask >
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4 p-0">
                                                            <label for="dataDevolucao">Data Devolução:</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                                </div>
                                                                <input type="date" id="dataDevolucao" name="dataDevolucao" class="form-control" data-inputmask='"mask": "99/99/9999"' data-mask >
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 card mt-5">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <table class="table table-sm table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        <div class="mt-3 mb-2  h-25 text-center">
                                                                            <strong>Cod.</strong>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-3 mb-2 h-25 text-center">
                                                                            <strong>Nome do Traje</strong>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-3 mb-2  h-25 text-center">
                                                                            <strong>Cor</strong>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-3 mb-2 h-25 text-center">
                                                                            <strong>Tamanho</strong>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mt-3 mb-2 h-25 text-center">
                                                                            <strong>Valor</strong>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <a class="pop">
                                                                            <img style="height: 10rem; width: 10rem" class="img-thumbnail rounded" src="https://tie.nsolucoes.digital/imagens/produtos/opcionais/2-1.jpg" alt="">
                                                                        </a>
                                                                    </td>
                                                                    <td class="col-md-1" style="height: 10rem;">
                                                                        <div class="h-100 d-flex align-items-center justify-content-center">
                                                                            <p><?php echo str_pad(round(1,12) , 4 , '0' , STR_PAD_LEFT); $aux++; ?></p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p class="text-concat">Terno Viscose ABC</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p>Preto</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p>41</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p>R$ 100,00</p>
                                                                        </div>
                                                                    </td>                   
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <a class="pop">
                                                                            <img style="height: 10rem; width: 10rem" class="img-thumbnail rounded" src="https://tie.nsolucoes.digital/imagens/produtos/opcionais/2-1.jpg" alt="">
                                                                        </a>
                                                                    </td>
                                                                    <td class="col-md-1" style="height: 10rem;">
                                                                        <div class="h-100 d-flex align-items-center justify-content-center">
                                                                            <p><?php echo str_pad(round(1,12) , 4 , '0' , STR_PAD_LEFT); $aux++; ?></p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p class="text-concat">Terno Viscose ABC</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p>Preto</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p>41</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p>R$ 100,00</p>
                                                                        </div>
                                                                    </td>                   
                                                                </tr>
                                                                <tr>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <a class="pop">
                                                                            <img style="height: 10rem; width: 10rem" class="img-thumbnail rounded" src="https://tie.nsolucoes.digital/imagens/produtos/opcionais/2-1.jpg" alt="">
                                                                        </a>
                                                                    </td>
                                                                    <td class="col-md-1" style="height: 10rem;">
                                                                        <div class="h-100 d-flex align-items-center justify-content-center">
                                                                            <p><?php echo str_pad(round(1,12) , 4 , '0' , STR_PAD_LEFT); $aux++; ?></p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p class="text-concat">Terno Viscose ABC</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p>Preto</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p>41</p>
                                                                        </div>
                                                                    </td>
                                                                    <td class="col-md-2" style="height: 10rem;">
                                                                        <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                                                            <p>R$ 100,00</p>
                                                                        </div>
                                                                    </td>                   
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <h2 class="text-center text-danger mt-5">
                                                            <b>
                                                                TOTAL DOS TRAJES <br> R$ 300,00
                                                            </b>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        </div>    
                                        <div class="buttons d-flex justify-content-end">
                                            <button class="btn btn-danger p-2" style="font-size: 15px;">Cancelar</button>
                                            <button class="btn btn-success p-2 ml-2" style="font-size: 15px;">Finalizar</button>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button class="btn-lg btn btn-warning" onclick="retornaTrajes();">Anterior</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" id="card2">
                    <div class="card h-100" id="listagemTrajes">
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
                    <button type="button" class="close" onclick="dismissModal('nomeClienteModal')" aria-label="Close">
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
                    <button type="button" class="btn btn-secondary" onclick="dismissModal('nomeClienteModal')">Cancelar</button>
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
                    <button type="button" class="close" onclick="dismissModal('listaClienteDependenteModal')" aria-label="Close">
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
    
    <script src="<?php echo base_url('siteResource/');?>plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/fullcalendar/main.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/inputmask/jquery.inputmask.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
    <script src="<?php echo base_url('siteResource/');?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/date-1.1.2/fc-4.1.0/fh-3.2.4/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.7/sb-1.3.4/sp-2.0.2/sl-1.4.0/sr-1.1.1/datatables.js"></script>
    <?php echo '<script src="'. base_url('funcoesjs/aluguel.js') .'" type="text/javascript"></script>'; ?>
</body>
</html>