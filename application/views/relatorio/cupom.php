<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<title>Gestão de Locações - Comprovante</title>
    	<link rel="stylesheet" href="<?php echo base_url('recursos/raquel/') ?>css/font-awesome.min.css">
    	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        
        <meta name="description" content="Comprovante de compra - Loja Cell Store">
    <style>
        .print-block{
            display: none;
        }
        @media print {
            .mostrarBtns, #footer{
            display: none;
            }
            .print-block{
                display: block;
            }
            body, table, p {
                font-size: 10px;
            }
            
        }
        
        .w-10{
            width: 10%;
        }
        .w-15{
            width: 15%;
        }
        .w-20{
            width: 20%;
        }
        .w-30{
            width: 30%;
        }
        .w-30{
            width: 40%;
        }
        .break  { 
            page-break-before: always; 
        }

        .text-right {
            text-align: right;
        }
    </style>
    </head>
    <body style="background-color: white;" syle="max-width: 100%; overflow-x: hidden">
        <div class="container">
            <div class="row align-items-center justify-content-center mb-3">
                <div class="w-50 my-2 text-center">
                    <img src="<?php echo base_url('imagens/site/logo2.png');?>" style="width: 80%">
                </div>
                <div class="w-100 text-center mt-2 mb-2">
                    <h3 class="text-catalize mb-3" style="display: inline; color: black;">Comprovante de Locação</h3>
                    <p><b><?= $aluguel['alg_efetivado'] ?></b></p>
                </div>
            </div>
            <div>
                <div class="col-md-12 d-flex flex-column text-center">
                    <strong class=""><?= $loja['nome'] ?></strong>
                    <div class="row">
                        <span class="w-50"><strong>CNPJ:</strong> <?= $loja['cnpj'] ?></span> 
                        <span class="w-50"><strong>Telefone:</strong> <?= $loja['telefone'] ?></span>
                    </div>
                    
                    <span><strong>Endereço:</strong> <?= $loja['rua'] .', '. $loja['numero'] .', '. $loja['bairro'] .', '. $loja['cidade'] .' - '. $loja['estado'] ?></span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between" style="color: black">
                    <strong class="mb-0 mx-2">Cliente: </strong>
                    <p class="text-end mb-0 mx-2"><?php echo $aluguel['clt_nome'];?></p>
                </div>
                <div class="col-md-12 d-flex justify-content-between" style="color: black">
                        <strong class="mb-0 mx-2">CPF: </strong>
                    <p class="text-end mb-0 mx-2"><?php echo $aluguel['clt_cpf'];?></p>
                </div>
                <div class="col-md-12 d-flex justify-content-between" style="color: black">
                    <strong class="mb-0 mx-2">Telefone: </strong>
                    <p class="text-end mb-0 mx-2"><?php echo $aluguel['clt_cel'];?></p>
                </div>
                <div class="col-md-12 d-flex justify-content-between" style="color: black">
                    <strong class="mb-0 mx-2">Endereço: </strong>
                    <p class="text-end mb-0 mx-2">
                        <?= $aluguel['clt_end'] ?>
                        <br>
                        <?= $aluguel['clt_prov'] .', '. $aluguel['clt_city'] ?>
                        <br>
                    </p>
                </div>
                <div class="col-md-12 d-flex justify-content-between" style="border-top: 1px solid black; border-bottom: 1px solid black;">
                    <strong class="m-0">Atendente: </strong>
                    <p class="text-end mb-0 mx-2"><?php echo $aluguel['atend_nome'] ?></p>
                </div>
            </div> 
            <br>
            <div class="row">
                <table id="myTable" class="table table-bordered center">
                    <thead>
                        <tr>
            	            <th class="w-10 text-center">#</th>
            	            <th class="text-left">TRAJE</th>
                            <th class="text-center">TAM.</th>
                            <th class="text-center">COR.</th>
            	            <th class="text-center">VALOR.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $vol = 0; 
                        foreach($aluguel['alg_trajes'] as $traje){ ?>
                            <tr>
                                <td class="text-center py-1"><?= $vol++ ?></th>
                                <td class="text-left py-1"><?= $traje['alg_trajes_nome'] ?></td>
                                <td class="text-center py-1"><?= $traje['alg_traje_tamanho'] ?></td>
                                <td class="text-center py-1"><?= $traje['alg_traje_cores'] ?></td>
                                <td class="text-center py-1"><?= $traje['alg_traje_valor'] ?></td>
                            </tr>
                            <tr>
                                <td class="text py-1" colspan="2">
                                    <b>Reserva:</b> <?= $traje['alg_locador'] ?>
                                </td>
                                <td class="text py-1" colspan="3">
                                <?= isset($traje['alg_observacao']) && $traje['alg_observacao'] ?>
                                </td>
                            </tr>
            	        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12 d-flex justify-content-between" style="color: black">
                    <strong class="m-0">Quantidade itens:</strong>
                    <p class="m-0"><?php echo $vol;?></p>
                </div>
                <div class="col-md-12 d-flex justify-content-between" style="color: black">
                    <strong class="m-0">Locação:</strong>
                    <p class="m-0"><?= $aluguel['alg_total'] ?></p>
                </div>
                <div class="col-md-12 d-flex justify-content-between" style="color: black">
                    <strong class="m-0">Desconto:</strong>
                    <p class="m-0"><?= $aluguel['alg_desconto'] ?></p>
                </div>
                <div class="col-md-12 d-flex justify-content-between border-1 border-top border-bottom">
                    <div class="w-50" style="color: black">
                        <strong class="m-0">Entrada:</strong>
                        <p class="m-0"><?= $aluguel['alg_entrada']?></p>
                    </div>
    
                    <!-- Validar este resto corretamente -->
                    <div class="w-50 text-right" style="color: black">
                        <strong class="m-0">Restante:</strong>                    
                        <p class="m-0"><?= $aluguel['alg_resto'] ?></p>                    
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-between" style="color: black">
                    <strong class="m-0">Juros / Multa:</strong>
                    <p class="m-0"><?= $aluguel['multa']?></p> 
                </div>
                <div class="col-md-12 d-flex justify-content-between" style="color: black">
                    <strong class="m-0 text-uppercase">Total Locação:</strong>
                    <p class="m-0"><?= $aluguel['alg_total'] ?></p>
                </div>
                
                <div class="col-md-12 d-none" style="color: black">
                    <small class="mb-2"><?= $aluguel['alg_obs'] ?></small>
                </div>
            </div>                   
            <?php if(isset($_GET['terms']) && $_GET['terms']){ ?>

                <div class="break container print-block">
                    <?= $contrato ?>
                </div>

                <div class="break container print-block">
                    <?= $termo ?>
                </div>

            <?php } ?>
            <div class="mostrarBtns text-right" style="border-top: 1px solid black; padding-top: 1rem; margin-top: 2rem;">
                <?php if($logado === true) { ?>
                    <a type="buttom" href="<?= base_url("admin/reservas/listagem") ?>" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Voltar</a>
                <?php } ?>
                <a type="buttom" href="javascript:void(0)" onclick="window.print()" class="btn btn-primary"><i class="fa fa-print"></i> Imprimir</a>
            </div>
        </div>
        <footer id="footer" style="position: fixed; bottom: 0px; text-align: center; width: 100%; margin-bottom: -13px; display: none; clear: both;">
            <table style="width: 100%">
                <tbody>
                    <tr>
                        <td style="margin-left: 10px; width: 50%; text-align: right"><p><b style="font-size: 12px; margin-right: 15px;">Gestão de Locações | N Soluções</b></p></td>
                    </tr>
                </tbody>
            </table>
        </footer>
    </body>
    <!-- FIM BODY -->
    
    <script type="text/javascript">
            // window.onafterprint = window.close;
            // window.print();
    </script>
    
    <script>
        var nomeCliente = "<?= $cliente['cliente_nome'] ?>";
        
        function share(){
        	if (navigator.share !== undefined) {
        		navigator.share({
        			title: 'Comprovante da compra',
        			text: 'Segue link do comprovate de compra do ' + nomeCliente,
        			url: window.location.pathname,
        		})
        		.then(() => console.log('Successful share'))
        		.catch((error) => console.log('Error sharing', error));
        	}
        }
    </script>
</html>

