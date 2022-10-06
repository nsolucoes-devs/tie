    <style>
        body{
            background: #f9fdff!important;
        }

        .card {
             box-shadow: rgb(0 0 0 / 20%) 0px 2px 6px;
        }

        .produto-desconto{
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #25e625;
            padding: 0 4px;
            color: white;
            border-radius: 3px;
        }
        .produto-titulo{
            text-align: center; 
            color: #444;
            display: -webkit-box;
            overflow: hidden;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            word-break: break-word;
            font-size: 14px;
            margin-bottom: 10px;
            margin-top: 2%;
            line-height: 17px;
        }   
        
        .zoom {
          transition: transform .3s; /* Animation */
          cursor: pointer;
        }
        
        .zoom:hover {
            border: 2px solid lightgrey;
        }

        
        .p-card-final{
            font-size: 25px;
            background: #fb25af;
            color: white;
            margin-left: 2px;
            margin-right: 3px;
        }
        
        .pagination-links a{
            color: white;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
            margin: 2px;
            background: #24aeef;
        }
        
        .pagination-links strong{
            color: #24aeef;
            border: 1px solid #24aeef;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 16px;
        }
        
        .card_prod{
            height: 320px!important;  
        }

        
        .imagem_prod{
            height: 180px;
            width: 250px;
            padding: 20px 40px;
        }
        
        .comprar{
            height: 5px;
            background-color: #24aeef;
            position: absolute;
            bottom: 0;
            left: 14px;
            width: 101%;
        }
        
        .div-preco{
            width: 100%;
            position: absolute;
            top: 270px;
            left: 0px;
        }
        
        .icone-drop{
            font-size: 19px;
            position: relative;
            left: 3px;
            top: -2px;
        }
        
        @media only screen and (max-width: 768px) {
          #menu{
            display: none;
          }
          .div-preco{
              top: 252px;
          }
          .comprar{
            width: 100%!important;
            left: 15px!important;
          }
          
          .imagem_prod{
                height: 160px;
                width: 250px;
                padding: 5px 20px;
          }
          
          .card_prod{
            height: 300px!important;  
          }
          
          #div_preco1{
            padding: 0px!important;  
          }
          
          #div_preco2{
            padding: 0px!important;  
          }
          
          #fonte_varejo{
            font-size: 15px!important;  
          }
          
          #campo_preco{
            left: 10%!important;
          }
        }
    </style>

    

    <section class="features-area section-padding-100-0" style="padding-top: 10px!important; padding-bottom: 30px!important; ">
        <div class="container-fluid">
            <div class="row" style="margin-top: 5%;">
                <div class="col-lg-2" id="menu">
                    <?php foreach($departamentos as $dep){?>
                       <a href="#<?php echo str_replace(' ', '-', $dep['departamento']) ?>" data-toggle="collapse" <?php if(!array_key_exists('subs', $dep)){?>onclick="Submit2('<?php echo $dep['departamento_id'];?>')"<?php }?> href="#"><p style="color: #444; font-weight: 600"> <?php echo $dep['departamento'] ?> <?php if(array_key_exists('subs', $dep)){?><i class="icone-drop fa fa-sort-desc" aria-hidden="true"></i><?php }?></p></a>
                       <?php if(array_key_exists('subs', $dep)){?>
                            <div style="padding-bottom: 15px;" id="<?php echo str_replace(' ', '-', $dep['departamento']) ?>" class="collapse">
                                <?php foreach($dep['subs'] as $sub){?>
                                    <a onclick="Submit2('<?php echo $sub['id'];?>')" href="#">
                                        <p style="padding-left: 15px!important;" class="m-0 p-0"><?php echo ucwords(mb_strtolower($sub['nome'])); ?></p>
                                    </a>
                                <?php }?>
                            </div>
                        <?php }?>
                    <?php } ?>
                </div>            
                <div class="col-lg-10 col-md-12">
                    <div class="row">
                        <?php if(is_array($produtos)){foreach($produtos as $p){?>
                            <div class="col-lg-3 col-md-4 col-6 form-group produtos-div">
                                <a href="<?php echo base_url('71b141ddd8292dea8bb362092fd5661f/'). $p['produto_id'] ?>">
                                <div class="card zoom card_prod">
                                    <div class="card-body" style="padding: 2px;">
                                        <img class="imagem_prod" src="<?php echo base_url('imagens/produtos/').$p['produto_id'] .'.jpg'; ?>" alt="">
                                        <?php if(isset($p['produto_porcentagem'])){ ?>
                                            <p class="produto-desconto"><i class="fa fa-arrow-down" aria-hidden="true"></i> <?php $p['produto_porcentagem'] ?></p>
                                        <?php } ?>
                                        <div class="col-md-12 text-center">
                                            <div class="estrelas" style="text-shadow: 0 0 1px #736102; color: gold!important; padding-top: 3%">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <p style="color: lightgrey; font-size: 13px; line-height: 12px; margin: 0; padding: 0"><b><?php echo ucfirst(mb_strtolower($p['produto_departamento'])) ?></b></p>
                                        </div>
                                        
                                        <p class="produto-titulo"><b><?php echo ucfirst(mb_strtolower($p['produto_nome'])) ?></b></p>
                                        
                                        <div class="row" id="campo_preco">
                                            <?php if($p['produto_promocao']){ ?>
                                                <div class="col-md-12 col-12 text-center">
                                                    <p class="prod-preco" style="color: #444; line-height: 15px; margin: 0!important; padding: 0!important;font-size: 12px; text-decoration: line-through;">R$ <?php echo number_format($p['produto_valor'],2,',','.') ?></p>
                                                    <p class="prod-preco" style="font-size: 20px; color: #444; line-height: 19px;"><b style="color: #444">R$ <?php echo number_format($p['produto_promocao'], 2,',','.') ?></b></p>
                                                </div>
                                            <?php } else { ?>
                                                <div class="col-12 col-md-12 text-center div-preco">
                                                    <p class="prod-preco"><b style="font-size: 20px; font-weight: bold;line-height: 30px;color: #444;">R$ <?php echo number_format($p['produto_valor'], 2,',','.') ?></b></p>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="row comprar">
                                        </div>
                                    </div>
                                </div>
                                </a>
                            </div>
                        <?php }} ?>
                        <?php if($produtos == null){?>
                            <div class="col-md-12 text-center">
                                <p><b>Nenhum produto encontrado :(</b></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-md-12 text-center" style="padding-top: 30px!important">
                            <p class="pagination-links"><?php echo $links; ?></p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    <script>
        function Submit2(departamento){
            var form = document.createElement("form");
            form.method = "GET";
            form.action = "<?php echo base_url('produto/buscaDepartamentos');?>";   
            
            var element1 = document.createElement("input"); 
            element1.value=departamento;
            element1.name="busca";
            form.appendChild(element1);  
        
            document.body.appendChild(form);
        
            form.submit();
        }
    </script>
    

    