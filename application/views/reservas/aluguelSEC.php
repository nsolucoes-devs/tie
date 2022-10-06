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
        
        .input-finalizar {
            height:35px!important;
            border-radius:10px!important;
        }
        
        .card-body {
            border-radius:10px!important;
        }
        
        #desc3 {
            border-radius:15px!important;
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
                <div class="w-100 text-center">
                    <h1>Rota secundaria</h1>
                </div>
                <div class="col-md-6">
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
                                <div id="cliente-part"  class="content" role="tabpanel" aria-labelledby="cliente-part-trigger">
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
                                        <button class="btn btn-primary" id="btDesconto" data-toggle="modal" data-target="#modalDesconto">Modal</button>
                                        <div class="inputCadstro">
                                            <div class="card-body">
                                                <div class="row">
                                                    <!--  
                                                        USA ESSES BOTÕES PARA CASO O ADMISTRADOS TENHA CERTEZA QUE O 
                                                        CLIENTE NÃO TENHA CADASTRO NO SITE E TEM QUE CADASTRA UM NOVO. 
                                                        POIS USANDO ESSES, DESATIVA AUTOMATICAMENTE OS DISABLED DOS CAMPOS!
                                                    <div class="col-md-12 d-flex justify-content-end">
                                                        <button class="btn btn-danger canceledNewClient d-none">Cancelar Cadastro</button>
                                                        <button class="btn btn-success newClient d-block">Novo Cliente</button>
                                                    </div>
                                                    -->
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
                                                        <th scope="col"></th>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                        <button class="btn-lg btn btn-primary" onclick="gravaCliente()" style="float:right;">Próximo</button>
                                    </div>
                                </div>

                                <div id="data-part"     class="content card" role="tabpanel" aria-labelledby="data-part-trigger">
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
                                                    <div class="form-group col-md-4">
                                                        <label>Data de Retirada:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                            </div>
                                                            <input type="text" id="dataAluguel" name="dataAluguel" class="form-control" data-inputmask='"mask": "99/99/9999"' data-mask >
                                                        </div>
                                                        <em id="retirada_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-group  col-md-4">
                                                        <label>Data de Devolução:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                            </div>
                                                            <input type="text" id="dataDevolucao" name="dataDevolucao" class="form-control"  data-inputmask='"mask": "99/99/9999"' data-mask >
                                                        </div>
                                                        <em id="devolucao_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                    </div>
                                                    <div class="form-check form-switch col-md-4">
                                                      <input class="form-check-input prova" type="checkbox" role="switch" id="flexSwitch" onchange="dependente(this.value)">
                                                      <label class="form-check-label" for="flexSwitch">Tem prova</label>
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                            <div class="d-none" id="confirmacao">
                                                <div class="form-group  col-md-4">
                                                    <label>Data da prova:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                                                        </div>
                                                        <input type="text" id="dataDevolucao" name="dataDevolucao" class="form-control"  data-inputmask='"mask": "99/99/9999"' data-mask >
                                                    </div>
                                                    <em id="devolucao_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                </div>
                                                
                                                <div class="form-group  col-md-3">
                                                    <label>Horário:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text"><i class="fa-solid fa-clock"></i></i></span>
                                                        </div>
                                                        <input type="text" id="dataDevolucao" name="dataDevolucao" class="form-control"  data-inputmask='"mask": "99:99:99"' data-mask >
                                                    </div>
                                                    <em id="devolucao_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
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
                                        <div style="float:right;" class="mt-5">
                                            <button class="btn-lg btn btn-primary" onclick="selecionaTraje();">Próximo</button>
                                            <button class="btn-lg btn btn-warning" onclick="retornaCliente();">Anterior</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="traje-part"    class="content" role="tabpanel" aria-labelledby="traje-part-trigger">
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
                                        <div style="float:right;">
                                            <button class="btn-lg btn btn-success" onclick="novoTraje();">Adicionar Peça</button>
                                            <button class="btn-lg btn btn-primary" onclick="finalizaAluguel();">Próximo</button>
                                            <button class="btn-lg btn btn-warning" onclick="retornaData();">Anterior</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div id="final-part"    class="content" role="tabpanel" aria-labelledby="final-part-trigger">
                                    <input type="hidden" id="clienteChaveUnica" name="clienteChaveUnica">
                                    <input type="hidden" id="clienteLocador" name="clienteLocador">
                                    <input type="hidden" id="nivelCliente" name="nivelCliente">
                                    <input type="hidden" id="dataIni" name="dataIni">
                                    <input type="hidden" id="dataFim" name="dataFim">
                                    <input type="hidden" id="trajesAluguel" name="trajesAluguel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 card">
                                                 
                                                    
                                                
                                                <div class="card-body">
                                                    <div class="row">
                                                        <h3>Dados da Locação:</h3>
                                                        <div class="form-group col-md-4">
                                                            <label>Nome do atendente:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewnomeatendente" class="form-control input-finalizar" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Data retirada:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="date" id="viewdataretirada" class="form-control input-finalizar" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Data Devolucao:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="date" id="viewdatadevolucao" class="form-control input-finalizar" data-inputmask='"mask": "999.999.999-99"' data-mask disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <h3>Dados do Cliente</h3>
                                                        <div class="form-group col-md-4">
                                                            <label>CPF:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewclienteCpf" class="form-control input-finalizar" data-inputmask='"mask": "999.999.999-99"' data-mask disabled>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label>Nome:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewclienteNome" class="form-control input-finalizar" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                         <div class="form-group col-md-2">
                                                            <label>Nascimento:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="date" id="viewdatadevolucao" class="form-control input-finalizar" data-inputmask='"mask": "999.999.999-99"' data-mask disabled>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-3">
                                                            <label>Telefone fixo:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="clienteFone" name="clienteFone" class="form-control input-finalizar" data-inputmask='"mask": "(99) 9999-9999"' data-mask disabled>
                                                            </div>
                                                            <em id="fone_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-3">
                                                            <label>Telefone celular:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="clienteFone" name="clienteFone" class="form-control input-finalizar" data-inputmask='"mask": "(99) 9999-9999"' data-mask disabled>
                                                            </div>
                                                            <em id="fone_erro" style="display:none; margin-top:6px; padding:0 1px; font-style:normal; font-size:11px; line-height:15px; color:#D56161;"></em>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label>Email:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewclienteNome" class="form-control input-finalizar" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-4">
                                                            <label>CEP:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewcep" class="form-control input-finalizar" data-inputmask='"mask": "99999-999"' data-mask onblur="pesquisacep(this.value);" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-6">
                                                            <label>Nome da rua:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewcep" class="form-control input-finalizar" data-inputmask='"mask": "99999-999"' data-mask onblur="pesquisacep(this.value);" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-2">
                                                            <label>Número:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewnumeroLogradouro" class="form-control input-finalizar" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Bairro:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewuf" class="form-control input-finalizar" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-3">
                                                            <label>Cidade:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewlogradouro" class="form-control input-finalizar" disabled>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-2">
                                                            <label>Estado:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewprovince" class="form-control input-finalizar" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Complemento:</label>
                                                            <div class="input-group">
                                                                
                                                                <input type="text" id="viewcidade" class="form-control input-finalizar" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="card-body col-md-12" id="listaDependente">
                                                        <h3>Lista de Dependentes</h3>
                                                        <div class="table-body" style="overflow-y: auto">
                                                            <table class="table table-striped" id="listaDependentes">
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Nome</th>
                                                                    <th scope="col">Fone</th>
                                                                    <th scope="col">CPF</th>
                                                                    <th scope="col"></th>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    </div>
                                                     <div class="d-flex justify-content-start">
                                                        <button class="btn-lg btn btn-warning" onclick="retornaTrajes();">Voltar</button>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="locacao" name="locacao" />
                                            </div>
                                            
                                            
                                            
                                            
                                            <button class="btn btn-primary" id="btDesconto" data-toggle="modal" data-target="#modalDesconto">Modal</button>
                                            <div class="form-group col-md-12" id="input-desconto" style="display: none">
                                                <label>Desconto:</label>
                                                <div class="input-group">
                                                    <input type="text" id="desconto" id="desconto" class="form-control">
                                                    <div class="input-group-prepend">
                                                        <button onclick="descVal()" class="input-group-text"><i class="fa fa-calculator" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal de Opcao de Desconto -->
                <div class="modal" id="modalDesconto">
                  <div class="modal-dialog" id="modal-cliente" style="max-width:750px;">
                    <div class="modal-content">


                      <!-- Modal body -->  
                      
                      <div class="modal-body mt-5" id="desc3">
                            <h4>Quem vai usar esse traje:</h4>
                            <div class="card">
                                <div class="card-body">
                                   <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col"></th>        
                                          <th scope="col">Tipo</th>
                                          <th scope="col">Nome</th>
                                          <th scope="col">Cpf</th>
                                          <th scope="col">Celular</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                         
                                        <tr>
                                          <th scope="row"><input type="checkbox"></th>
                                          <th scope="row">c</th>
                                          <td>Davi</td>
                                          <td>08751826585</td>
                                          <td>(73)982182390</td>
                                        </tr>
                                        <tr>
                                          <th scope="row"><input type="checkbox"></th>
                                          <th scope="row">d</th>
                                          <td>teste</td>
                                          <td>889484488</td>
                                          <td>(78)999999999</td>
                                        </tr>
                                        <tr>
                                          <th scope="row"><input type="checkbox"></th>
                                          <th scope="row">i</th>
                                          <td>teste</td>
                                          <td>8748484844</td>
                                          <td>(71)999999999</td>
                                        </tr>
                                      </tbody>
                                    </table> 
                                </div>
                            </div>
                            <h4 class="mt-4">Informações adicionais:</h4>
                            <div class="form-group">
                               <textarea class="form-control" rows="6" style="border-color:#ccc;"></textarea> 
                            </div>
                               
                            
                      
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                        <button style="width:80px;height:40px;font-size:15px;" type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                        <button style="width:80px;height:40px;font-size:15px;" type="button" class="btn btn-success" data-dismiss="modal">Concluir</button>

                      </div>

                    </div>
                  </div>
                </div>

                <div class="col-md-6">
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
        //Funções de CEP e endereço  -- VIACEP
        function limpa_formulário_cep() {
            document.getElementById('logradouro').value=("");
            document.getElementById('province').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
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
                    cep

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
            }else if(x == "cpf"){
                $('#busca').css('display','none');
                $('#buscaNome').css('display','none');
                $('#buscaFone').css('display','none');
                $('#buscaCpf').css('display','block');
            }else if(x == "telefone"){
                $('#busca').css('display','none');
                $('#buscaNome').css('display','none');
                $('#buscaFone').css('display','block');
                $('#buscaCpf').css('display','none');
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
            }
            
            if(flag === 0){
                dados = new FormData();
                dados.append('busca', x);
                dados.append('valor', busca);
                $.ajax({
                    url: '<?php echo base_url('consultaCliente'); ?>',
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
                        $('#clienteCpf').prop("disabled", false);
                        $('#clienteNome').prop("disabled", false);
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
                        
                        if(data.success == true){
                            $('#clienteCpf').val(data.cliente.cpf);
                            $('#clienteNome').val(data.cliente.nome);
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
                                    row.insertCell(4).innerHTML= "<input type='radio' id='depend"+i+"' name='depend' value='"+data.dependentes[i].dpd_nome+"'>";
                                }
                            }
                            
                        }else{
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
            }
            
            if($('#clienteCpf').val() == ""){
                $('#cpf_erro').html("Campo Obrigatório");
                $('#cpf_erro').show();
                flag = 1;
            }else{
                dados.append('cpf', $('#clienteCpf').val());
            }
            
            if($('#clienteNascimento').val() == ""){
                $('#nasc_erro').html("Campo Obrigatório");
                $('#nasc_erro').show();
                flag = 1;
            }else{
                dados.append('nasc', $('#clienteNascimento').val());
            }
            
            if($('#clienteCelular').val() == ""){
                $('#cell_erro').html("Campo Obrigatório");
                $('#cell_erro').show();
                flag = 1;
            }else{
                dados.append('cel', $('#clienteCelular').val());
            }
            
            if($('#clienteFone').val() == ""){
                $('#fone_erro').html("Campo Obrigatório");
                $('#fone_erro').show();
                flag = 1;
            }else{
                dados.append('tel', $('#clienteFone').val());
            }
            
            if($('#clienteEmail').val() == ""){
                $('#mail_erro').html("Campo Obrigatório");
                $('#mail_erro').show();
                flag = 1;
            }else{
                dados.append('mail', $('#clienteEmail').val());
            }
            
            if($('#cep').val() == ""){
                $('#cep_erro').html("Campo Obrigatório");
                $('#cep_erro').show();
                flag = 1;
            }else{
                dados.append('cep', $('#cep').val());
            }
            
            if($('#numeroLogradouro').val() == ""){
                $('#num_erro').html("Campo Obrigatório");
                $('#num_erro').show();
                flag = 1;
            }else{
                dados.append('num', $('#numeroLogradouro').val());
            }
            
            if($('#uf').val() == ""){
                $('#uf_erro').html("Campo Obrigatório");
                $('#uf_erro').show();
                flag = 1;
            }else{
                dados.append('uf', $('#uf').val());
            }
            
            if($('#cep').val() == ""){
                $('#logr_erro').html("Campo Obrigatório");
                $('#logr_erro').show();
                flag = 1;
            }else{
                dados.append('logra', $('#logradouro').val());
            }
            
            if($('#cep').val() == ""){
                $('#bairr_erro').html("Campo Obrigatório");
                $('#bairr_erro').show();
                flag = 1;
            }else{
                dados.append('prov', $('#province').val());
            }
            
            if($('#cep').val() == ""){
                $('#cidad_erro').html("Campo Obrigatório");
                $('#cidad_erro').show();
                flag = 1;
            }else{
                dados.append('city', $('#cidade').val());
            }
            
            if(flag === 0){
                dados.append('keyId', $('#clienteChaveUnica').val());
    
                $.ajax({
                    url: '<?php echo base_url('gravaCliente'); ?>',
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
                        if (!$("input[name='depend']").is(':checked')) {
                            var locador = $('#clienteNome').val();
                            var tipo = 'clienteTie';
                        }else{
                            var locador = $("input[name='depend']:checked").val();
                            var tipo = 'dependentesTie';
                        }
                        $("#clienteLocadorData").parent().text(locador);
                        $("#clienteResponsavelData").text($('#clienteNome').val());
                        
                        $("#clienteLocadorTraje").parent().text(locador);
                        $("#clienteResponsavelTraje").text($('#clienteNome').val());
                        
                        $("#clienteLocador").val(locador);
                        $("#nivelCliente").val(tipo);
                        
                        var cliente = "Cliente: "+$('#clienteNome').val()+", CPF:"+$('#clienteCpf').val()+". Logradouro: "+$('#logradouro').val()+", nº "+$('#numeroLogradouro').val()+", bairro: "+$('#province').val()+" - "+$('#cidade').val()+"/"+$('#uf').val()+".";
                        $("#cliente").val(cliente);
                        
                        var atendente = "Nome do atendente.";
                        $("#atendente").val(atendente);
                        
                        stepper.next();
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
            
            $.ajax({
                url: '<?php echo base_url('dependentesNovo'); ?>',
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

            if($('#dataDevolucao').val() == ""){
                $('#devolucao_erro').html("Campo Obrigatório");
                $('#devolucao_erro').show();
                flag = 1;
            }else{
                $("#dataFim").val($('#dataDevolucao').val());
            }
            
            if(flag === 0 ){
                var locacao = "Retirada: "+$('#dataAluguel').val()+", Devolução: "+$('#dataDevolucao').val();
                $("#locacao").val(locacao);
                
                $("#tituloHead").text("");
                $("#tituloHead").text("Definição do(s) Traje(s):");
                stepper.next();
            }
        }
        
        function retornaCliente(){
            $("#tituloHead").text("");
            $("#tituloHead").text("Dados do Cliente:");
            stepper.previous();
        }
    </script>
    <script>
        //funções stepper 3 - Dados dos Trajes NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
        var lista = [];
        
        function buscaTraje(){
            dados = new FormData();
            dados.append('categoria', $('#selectTrajes').val());
            dados.append('detalhes', $('#trajeLike').val());
            dados.append('dataInicio', $('#dataAluguel').val());
            dados.append('dataFim', $('#dataDevolucao').val());
            
            $.ajax({
                url: '<?php echo base_url('buscaTraje'); ?>',
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
                    $("#listagemTrajes").html("");
                    $("#listagemTrajes").html(data);
                }
            });
        }
        
        function finalizaAluguel(){
            dados = new FormData();
            dados.append('chaveCliente', $('#clienteChaveUnica').val());
            dados.append('locador', $('#clienteLocador').val());
            dados.append('retirada', $('#dataIni').val());
            dados.append('devolucao', $('#dataFim').val());
            dados.append('trajes', $('#trajesAluguel').val());
            
            $.ajax({
                url: '<?php echo base_url('finalizaAluguel'); ?>',
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
            
                    $("#listagemTrajes").empty();
                    $("#listagemTrajes").html(data);
                    
                    stepper.next();
                }
            });
            
        }
        
        function novoTraje(){

            $(':checkbox:checked').each(function(i){
                lista.push($(this).val());
            });
            $("#trajesAluguel").val(lista);
        }
        
        function retornaData(){
            $("#tituloHead").text("");
            $("#tituloHead").text("Definição de Data:");
            stepper.previous();
        }
    </script>
    <script>
        //funções stepper 4 - Dados do Aluguel NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
        function retornaTrajes(){
            $("#tituloHead").text("");
            $("#tituloHead").text("Definição do(s) Traje(s):");
            stepper.previous();
        }
        function finalizaAluguel(){
            dados = new FormData();
            dados.append('chaveCliente', $('#clienteChaveUnica').val());
            dados.append('locador', $('#clienteLocador').val());
            dados.append('retirada', $('#dataIni').val());
            dados.append('devolucao', $('#dataFim').val());
            dados.append('trajes', $('#trajesAluguel').val());
            
            $.ajax({
                url: '<?php echo base_url('finalizaAluguel'); ?>',
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
            
                    $("#listagemTrajes").empty();
                    $("#listagemTrajes").html(data);
                    
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
                    y    = date.getFullYear()
            
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
                });
            
                calendar.render();
            });
    </script>
    <script>
        /** disabledoff */
        $( document ).ready(function() {
            $( ".newClient" ).on( "click", function() {
                $( ".inputCadstro input, select" ).prop( "disabled", false ).val('');
                $( ".inputBusca input, select" ).prop( "disabled", true );
                $( ".canceledNewClient" ).removeClass( "d-none").addClass( "d-block");
                $( ".newClient" ).addClass( "d-none").removeClass( "d-block");
                
            });

            $( ".canceledNewClient" ).on( "click", function() {
                $( ".inputCadstro input, select" ).prop( "disabled", true ).val('');
                $( ".inputBusca input, select" ).prop( "disabled", false );
                $( ".canceledNewClient" ).removeClass( "d-block").addClass( "d-none");
                $( ".newClient" ).addClass( "d-block").removeClass( "d-none");
            });
        });
        
        var switchStatus = false;
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
        
        $('.prova').click(function() {
            if($(".prova").is(':checked')){
                $("#confirmacao").removeClass('d-none');
            } else {
                $("#confirmacao").addClass('d-none');
            }
        });    

    </script>
</body>
</html>