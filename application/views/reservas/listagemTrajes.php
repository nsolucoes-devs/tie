    <style>
        .table-listagem td { 
            height: 7rem;
        }
    </style>
    
    <div class="card-body text-dark">
        <table class="table table-sm table-hover table-listagem">
            <thead>
                <tr>
                    <td>IMG</td>
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
            <tbody>
                <?php $aux = 1; foreach($lisTraje as $ltj){ ?>
                    <tr>
                        <td>
                            <div class="align-items-center d-flex h-100 justify-content-center">
                                <!-- <?php print_r_pre($ltj) ?> -->
                                <a class="pop">
                                    <img style="height: 7rem; width: 7rem" class="img-thumbnail rounded" src="<?php echo "https://tie.nsolucoes.digital//imagens/trajes/".$ltj['produto_id']."_imagem_principal.jpg";?>" alt="">
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class="h-100 d-flex align-items-center justify-content-center">
                                <p><?php echo str_pad($aux , 3 , '0' , STR_PAD_LEFT); $aux++; ?></p>
                            </div>
                        </td>
                        <td class="col-4">
                            <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                <p class="text-concat">
                                    <?php if (strlen($ltj['produto_nome']) > 30) {
                                        echo substr($ltj['produto_nome'], 0, 30) . "...";
                                    } else {
                                        echo ucwords($ltj['produto_nome']);
                                    } ?>
                                </p>
                            </div>
                        </td>
                        <td>
                            <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                <p><?php echo $ltj['produto_cores'];?></p>
                            </div>
                        </td>
                        <td>
                            <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                <p><?php echo $ltj['produto_tamanhos'];?></p>
                            </div>
                        </td>
                        <td>
                            <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                <p><?php echo 'R$ '. number_format($ltj['produto_valor'], 2, ',', ' ') ?></p>
                            </div>
                        </td>
                        <td>
                            <div class="align-items-center d-flex h-100 justify-content-center text-center">
                                <a class="btn btn-link novoTraje" onclick="novoTraje(<?php echo $ltj['produto_id'];?>);" style="font-size: 30px" id="traje<?php echo $ltj['produto_id'];?>" name="traje<?php echo $ltj['produto_id'];?>">
                                    <i class="fa fa-plus-circle"></i>
                                </a>
                                <!-- <input class="listaDeTrajes form-check-input" onchange="novoTraje();"  type="checkbox" id="traje<?php echo $ltj['produto_id'];?>" name="traje<?php echo $ltj['produto_id'];?>" value="<?php echo $ltj['produto_id'];?>"> -->
                            </div>
                        </td>                       
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div class="modal" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" data-dismiss="modal">
            <div class="modal-content">              
                <div class="modal-body">
                    <img src="" class="imagepreview img-rounded" style="width: 100%;" >
                </div> 
            </div>
        </div>
    </div>
    <script>
        $( document ).ready(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');   
            });     
        });
    </script>