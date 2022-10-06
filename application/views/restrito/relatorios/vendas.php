<!DOCTYPE html>
<html lang="en">
<style>
    @page {
        margin: 35pt 10pt 50pt 10pt;
        counter-increment: page;

        @bottom-center {
            content: "Page "counter(page);
        }
    }
</style>

<head>
    <title>Gestão de Locações</title>
    <link href="<?php echo base_url('assets/admin/'); ?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/'); ?>lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url('assets/admin/'); ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/admin/'); ?>css/style-responsive.css" rel="stylesheet">
    <script src="<?php echo base_url('assets/admin/'); ?>lib/jquery/jquery.min.js"></script>
    <title>.</title>
</head>

<body>
    <section id="container" style="position: relative; margin-right: 1%; margin-left: 1%; width: 98%">
        <div class="row" style="margin-bottom: 10px; display: inline;">
            <div class="col-md-12 form-group text-center">
                <img id="imagem" src="<?php echo base_url('imagens/site/logo2.png') ?>" style="width: 300px; height: auto;">
            </div>
            <div class="col-md-12 form-group text-center">
                <h5><?php echo date('d/m/Y | H:i') ?></h5>
                <h3><b>RELATÓRIO DE VENDAS - <?php echo mb_strtoupper($configs['nome_empresa']); ?></b></h3>
                <p class="text-center" style="font-size: 14px">

                </p>
                <p class="text-center" style="font-size: 14px">
                    <b>Data Inicial:</b> <?= $pedidos["dataInicio"] ?>
                    <b style="margin-left: 2%">Data Final:</b> <?= $pedidos["dataInicio"] ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group" style="text-align: right">
                <button id="btn" type="button" class="btn btn-primary" style="border-color: #1b9045!important; color: white; background-color: #1b9045!important; right: 0; float: right; margin-right: 20px;" onclick="pdf()">Relatório PDF</button>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 form-group">
                <table style='width: 100%'>
                    <thead>
                        <tr style="font-size: 11px; border-bottom: 2px solid lightgrey;border-top: 2px solid lightgrey; padding: 3px">
                            <th class="text-center" style="width: 5%"><b>DATA/HORA</b></th>
                            <th style="padding: 10px; width: 7%"><b>Nº LOCAÇÃO</b></th>
                            <th style="width: 20%"><b>NOME</b></th>
                            <th style="width: 10%"><b>PAGAMENTO</b></th>
                            <th class="text-center" style="width: 8%"><b>DESCONTO</b></th>
                            <th class="text-center" style="width: 8%"><b>VALOR LOCAÇÃO</b></th>
                            <th class="text-center" style="width: 11%"><b>TOTAL</b></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pedidos["pedidos"] as $p) { ?>
                            <tr style="border-bottom: 1px solid lightgrey; font-size: 11px">
                                <td class="text-center"><?= date('d/m/Y', strtotime($p['locacao_data'])) ?></td>
                                <td style="padding: 7px;"><?php echo $p['locacao_id'] ?></td>
                                <td><?php echo ucwords(mb_strtolower($p['locacao_cliente'])) ?></td>
                                <td><?php echo ucwords(mb_strtolower($p['locacao_forma_pagamento'])) ?></td>
                                <td class="text-center"><?= $p['locacao_desconto']."%" ?></td>
                                <td class="text-center"><?= $p['locacao_valor'] ?></td>
                                <td class="text-center"><?= $p['locacao_total'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12 text-right mt">
                <h4><b>TOTAL GERAL:R$ <?= number_format(($pedidos['total_geral']), 2, ',', '.') ?></b></h4>
            </div>
        </div>
        <br>
    </section>

    <footer id="footer" style="position: fixed; bottom: 0px; text-align: center; width: 100%; margin-bottom: -13px; display: none; clear: both;">
        <table style="width: 100%">
            <tbody>
                <tr>
                    <td style="margin-left: 10px; width> 50%; text-align: right">
                        <p><b style="font-size: 12px; margin-right: 15px;">Gestão de Locações | N Soluções</b></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </footer>
</body>

<script src="<?php echo base_url('assets/admin/'); ?>lib/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('resources/') ?>js/jquery_mask/dist/jquery.mask.min.js"></script>
<script>
    $(document).ready(function() {
        $('.cpf').mask('000.000.000-00', {
            reverse: true
        });
    });
</script>


<script>
    function pdf() {
        $('#btn').css('display', 'none');
        $('#footer').css('display', 'block');
        window.print();
        $('#footer').css('display', 'none');
        $('#btn').css('display', 'block');
    }
</script>

</html>