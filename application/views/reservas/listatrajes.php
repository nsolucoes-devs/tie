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

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Changa+One&family=DM+Sans:wght@400;500;700&family=Palanquin+Dark:wght@400;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- slicknav & slick(carousel) -->
    <!-- <link href="<?php echo base_url('assets/admin/');?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <style>
        td, th, tr {
            border: hidden;
        }
        body {
            font: 400 1..2rem 'Palanquin Dark', sans-serif;
        }
    </style>
</head>
<body>


    <!-- COLOQUEI TAG HTML PARA VER A PAGINA  -->

    <section class="content-listagem my-5">
        <div class="container">
            <div class="card">
                <div class="card border-dark m-5">
                    <div class="card-body text-dark">
                        <table class="table table-sm table-hover">
                            <tbody>
                                <?php for($aux = 0; $aux < 4; $aux++) { ?>
                                    <tr>
                                        <td class="col-md-2" style="height: 10rem;">
                                            <a class="pop">
                                                <img style="height: 10rem; width: 10rem" class="img-thumbnail rounded" src="https://cidadejardimdigital.vteximg.com.br/arquivos/ids/1084381-1000-1000/terno-suit-blu-colorato-1.jpg?v=637416916844500000" alt="">
                                            </a>
                                        </td>
                                        <td class="col-md-1" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Cod.</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>000<?= $aux+1 ?></p>
                                            </div>
                                        </td>
                                        <td class="col-md-3" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Nome do Traje</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>Terno Viscose ABC</p>
                                            </div>
                                        </td>
                                        <td class="col-md-2" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Cor</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>Preto</p>
                                            </div>
                                        </td>
                                        <td class="col-md-2" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Tamanho</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>41</p>
                                            </div>
                                        </td>
                                        <td class="col-md-2" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Valor</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>R$ 100,00</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td class="text-center">
                                        <strong>Valor</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong>R$ 100,00</strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 d-grid d-md-flex gap-2 justify-content-md-end my-3">
                    <button type="button" class="btn btn-primary me-md-2">Continuar</button>
                    <button type="button" class="btn btn-danger me-md-2">Cancelar</button>
                    <button type="button" class="btn btn-success">Prosseguir</button>
                </div>
            </div>
        </div>
    </section>
    
    <div class="modal" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" data-dismiss="modal">
            <div class="modal-content">              
                <div class="modal-body">
                    <img src="" class="imagepreview img-rounded" style="width: 100%;" >
                </div> 
            </div>
        </div>
    </div>

    <section class="content-listagem  my-5">
        <div class="container">
            <div class="card">
                <div class="card border-dark m-5">
                    <div class="card-body text-dark">
                        <table class="table table-sm table-hover">
                            <tbody>
                                <?php for($aux = 0; $aux < 4; $aux++) { ?>
                                    <tr>
                                        <td class="col-md-2" style="height: 10rem;">
                                            <a class="pop">
                                                <img style="height: 10rem; width: 10rem" class="img-thumbnail rounded" src="https://cidadejardimdigital.vteximg.com.br/arquivos/ids/1084381-1000-1000/terno-suit-blu-colorato-1.jpg?v=637416916844500000" alt="">
                                            </a>
                                        </td>
                                        <td class="col-md-1" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Cod.</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>000<?= $aux+1 ?></p>
                                            </div>
                                        </td>
                                        <td class="col-md-3" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Nome do Traje</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>Terno Viscose ABC</p>
                                            </div>
                                        </td>
                                        <td class="col-md-2" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Cor</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>Preto</p>
                                            </div>
                                        </td>
                                        <td class="col-md-2" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Tamanho</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>41</p>
                                            </div>
                                        </td>
                                        <td class="col-md-2" style="height: 10rem;">
                                            <div class="mt-3 mb-2 col-md-12 h-25 text-center">
                                                <strong>Valor</strong>
                                            </div>
                                            <div class="col-md-12 h-75 text-center">
                                                <p>R$ 100,00</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td>
                                    </td>
                                    <td class="text-center">
                                        <strong>Valor</strong>
                                    </td>
                                    <td class="text-center">
                                        <strong>R$ 100,00</strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="col-md-12 d-grid d-md-flex gap-2 justify-content-md-end my-3">
                    <button type="button" class="btn btn-primary me-md-2">Continuar</button>
                    <button type="button" class="btn btn-danger me-md-2">Cancelar</button>
                    <button type="button" class="btn btn-success">Prosseguir</button>
                </div>
            </div>
        </div>
    </section>
    <!-- TIM DA PAGINA -->

    <script src="<?php echo base_url('siteResource/');?>plugins/jquery/jquery.min.js"></script>

    <script>
        $( document ).ready(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');   
            });     
        });
    </script>
</body>
</html>