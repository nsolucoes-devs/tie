    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <?php
        $iphone = strpos($_SERVER['HTTP_USER_AGENT'],"iPhone");
        $ipad = strpos($_SERVER['HTTP_USER_AGENT'],"iPad");
        $android = strpos($_SERVER['HTTP_USER_AGENT'],"Android");
        $palmpre = strpos($_SERVER['HTTP_USER_AGENT'],"webOS");
        $berry = strpos($_SERVER['HTTP_USER_AGENT'],"BlackBerry");
        $ipod = strpos($_SERVER['HTTP_USER_AGENT'],"iPod");
        $symbian =  strpos($_SERVER['HTTP_USER_AGENT'],"Symbian");
        if ($iphone || $ipad || $android || $palmpre || $ipod || $berry || $symbian == true) {
            $mobile_view = 1;
        } else {
            $mobile_view = 0;
        }
    ?>
    
    <style>
        path[fill='#123456']{display:none !important;}
        .select2{
            width:100%!important;
        }
        
        .c-card{
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
            height: calc(100% - 50px);
            word-wrap: break-word;
        }
        
        .c-card-header{
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
        
        .c-card-icon{
            border-radius: 50px;
            background-color: #999999;
            padding: 20px;
            margin-top: -20px;
            margin-right: 15px;
            float: left;
        }
        
        .c-card-icon2{
            border-radius: 0px;
            background-color: #999999;
            padding: 20px;
            margin-top: -20px;
            margin-right: 15px;
            float: left;
        }
        
        
        
        .c-aprovados{
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(76 175 80 / 40%);
            background: linear-gradient(60deg, #66bb6a, #43a047);
        }
        
        .c-negadas{
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(244 67 54 / 40%);
            background: linear-gradient(60deg, #ef5350, #e53935);
        }
        
        .c-analise{
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(255 152 0 / 40%);
            background: linear-gradient(60deg, #ffa726, #fb8c00);
        }
        
        .c-analise{
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(255 152 0 / 40%);
            background: linear-gradient(60deg, #ffa726, #fb8c00);
        }
        .c-inscritos{
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(255 152 0 / 40%);
            background: linear-gradient(60deg, #4ac6e2, #4d8ed2);
        }
        
        .c-titulos{
            box-shadow: 0 4px 20px 0 rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 188 212 / 40%);
                background: linear-gradient(60deg, #26c6da, #00acc1);
        }
        
        .c-tabela{
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
           
        }
        
        .c-icon{
            font-size: 33px;
            line-height: 40px;
            width: 40px;
            height: 40px;
            text-align: center;
        }
        
        .c-card-category{
            color: black;
            font-size: 14px;
            margin: 0;
            padding-top: 10px;
            font-weight: bold;
        }
        
        .c-card-title{
            margin: 0;
            color: #3C4858;
            font-size: 1.5625rem;
            line-height: 1.4em;
        }
        
        .c-card-title small{
            font-size: 80%;
            font-weight: 400;
        }
        
        .c-card-footer{
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
        
        .c-card-body{
            border-top: 1px solid #d6d5d5;
            padding: 0.9375rem 20px;
            border-radius: 0;
            display: flex;
            background-color: transparent;
        }
        
        .bordeless{
            border-top: 0!important;
        }
        
        .c-stats{
            color: #999999;
            font-size: 12px;
            line-height: 22px;
            display: inline-flex;
        }
        
        .c-stats-icon{
            position: relative;
            top: 4px;
            font-size: 16px;
            margin-right: 3px;
            margin-left: 3px;
            color: grey;
        }
        
        .c-stats-text{
            color: grey;
        }
        
        .c-table{
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }
        
        .c-table thead{
            color:  #1b9045!important;
        }
        
        .c-table thead tr th{
            padding: 8px;
            vertical-align: middle;
        }
        
        .c-table tbody tr td {
            padding: 8px;
            vertical-align: middle;
            border-top: 1px solid #ddd;
        }
        
        .c-table tbody tr:hover{
            cursor: pointer;
            background-color: #eee!important;
        }
        
        .check-all{
            width: 32px;
            font-size: 12px;
            color: white;
            border: 0;
            padding: 6px 10px;
            text-align: center;
            border-radius: 5px;
        }
        
        .button-area{
            margin-top: 20px;
        }
        
        .button-custom{
            color: white;
            background-color:  #1b9045;
            border: 0;
            font-size: 14px;
            padding: 6px 10px;
            text-align: center;
            border-radius: 5px;
        }
        
        .search{
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
        
        .form-control-custom{
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
        
        .search-field{
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(0 0 0 / 40%);
            display: inline-flex;
            border-radius: 5px;
        }
        
        .def-item{
            display: block;
            padding: 7px 10px;
            color: black;
            font-size: 14px;
        }
        
        .def-item:hover{
            background-color: #eee;
            color: #9c27b0;
        }
        
           
        .check1{
            min-width: 20px;
            min-height: 20px;
        }
        
        .check2{
            min-width: 20px;
            min-height: 20px;
        }
        .active{
            background-color: black!important;
            border-color: black!important;
        }
        
    </style>
    
    
    <section id="main-content">
        <section class="wrapper">

            
            <!-- COMEÇO DO NOVO DASHBOARD -->
            
            <div class="row" style="margin: 0">
                <div class="col-lg-6" style="display: none">
                    <div class="form-group">
                        <label>Loja</label>
                        <select class="form-control" id="loja_id" onchange="diasDash(false)">
                            <option value="all">Todas</option>
                            <?php
                            foreach($lojas as $loja){ ?>
                             <option seleted value="<?php echo $loja['id'] ?>"><?php echo $loja['nome']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12" id="newdash" style="display: block; ">
                    <div class="row">
                        <div class="col-xs-12 col-md-12 col-xl-12 col-12">
                            <div class="button-area" align="right">
                                <button id="dia1" type="button" class="btn btn-primary <?php if($dias == 0){echo "active";}?>" onclick="diasDash(0)" style="  margin-right: 15px">Hoje</button>
                                <button id="dia7" type="button" class="btn btn-primary <?php if($dias == 7){echo "active";}?>" onclick="diasDash(7)" style="margin-right: 15px">7 dias</button>
                                <button id="dia15" type="button" class="btn btn-primary <?php if($dias == 15){echo "active";}?>" onclick="diasDash(15)" style="margin-right: 15px">15 dias</button>
                                <button id="dia30" type="button" class="btn btn-primary <?php if($dias == 30){echo "active";}?>" onclick="diasDash(30)" style="margin-right: 15px">30 dias</button>
                            </div>
                        </div>
                        <div class="c-card-body bordeless">
                            <div id="columnchart_values" style="width: 100%; height: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
                    
                    <div class="row">
                        <div class="col-xs-3 col-md-3 col-xl-3 col-12">
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon c-aprovados">
                                        <em class="fa fa-dollar c-icon"></em>
                                    </div>
                                    <p class="c-card-category">Locações Concluidas</p>
                                    <h3 class="c-card-title">
                                        <small>R$ <?php echo $concluidas; ?></small>
                                        <span id="transacao_aprovada"></span>
                                    </h3>
                                </div>
                                <div class="c-card-footer">
                                    <div class="c-stats">
                                        <em class="fa fa-clock-o c-stats-icon"></em>
                                        <span class="c-stats-text">Atualizado: <?php echo date('H:i') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-3 col-md-3 col-xl-3 col-12">
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon c-analise">
                                        <em class="fa fa-hourglass-o c-icon"></em>
                                    </div>
                                    <p class="c-card-category">Locações em Aberto</p>
                                    <h3 class="c-card-title">
                                        <small>R$ <?php echo $emAberto; ?></small>
                                        <span id="transacao_analise"></span>
                                    </h3>
                                </div>
                                <div class="c-card-footer">
                                    <div class="c-stats">
                                        <em class="fa fa-clock-o c-stats-icon"></em>
                                        <span class="c-stats-text">Atualizado: <?php echo date('H:i') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-3 col-md-3 col-xl-3 col-12">
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon c-negadas">
                                        <em class="fa fa-times-circle-o c-icon"></em>
                                    </div>
                                    <p class="c-card-category">Locações Canceladas</p>
                                    <h3 class="c-card-title">
                                        <small>R$ <?php echo $canceladas; ?></small>
                                        <span id="transacao_negada"></span>
                                    </h3>
                                </div>
                                <div class="c-card-footer">
                                    <div class="c-stats">
                                        <em class="fa fa-clock-o c-stats-icon"></em>
                                        <span class="c-stats-text">Atualizado: <?php echo date('H:i') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-3 col-md-3 col-xl-3 col-12">
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon c-inscritos">
                                        <em class="fa fa-shopping-bag c-icon"></em>
                                    </div>
                                    <p class="c-card-category">Novas Locações</p>
                                    <h3 class="c-card-title">
                                        <span id="inscritos"></span>
                                        <small>clientes <?php echo $newLocacao; ?></small>
                                    </h3>
                                </div>
                                <div class="c-card-footer">
                                    <div class="c-stats">
                                        <em class="fa fa-clock-o c-stats-icon"></em>
                                        <span class="c-stats-text">Atualizado: <?php echo date('H:i') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-3 col-md-3 col-xl-3 col-12">
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon c-inscritos">
                                        <em class="fa fa-user c-icon"></em>
                                    </div>
                                    <p class="c-card-category">Não Finalizadas</p>
                                    <h3 class="c-card-title">
                                        <span id="inscritos"><?php echo $pendencias;?></span>
                                        <small>Locações</small>
                                    </h3>
                                </div>
                                <div class="c-card-footer">
                                    <div class="c-stats">
                                        <em class="fa fa-clock-o c-stats-icon"></em>
                                        <span class="c-stats-text">Atualizado: <?php echo date('H:i') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-xs-3 col-md-3 col-xl-3 col-12"> 
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon c-negadas">
                                        <i class="fa fa-rotate-left c-icon"></i>
                                    </div>
                                    <p class="c-card-category">Devolução Atrasado</p>
                                    <h3 class="c-card-title">
                                        <span id="transacao_negada"><?php echo $naoEntregue;?></span>
                                    </h3>
                                </div>
                                <div class="c-card-footer">
                                    <div class="c-stats">
                                        <em class="fa fa-clock-o c-stats-icon"></em>
                                        <span class="c-stats-text">Atualizado: <?php echo date('H:i') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-xs-3 col-md-3 col-xl-3 col-12">
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon c-analise">
                                        <em><i class="fa fa-cut c-icon"></i></em>
                                    </div>
                                    <p class="c-card-category">Ajustes</p>
                                    <h3 class="c-card-title">
                                        <span id="transacao_analise"><?php echo $ajustes;?></span>
                                    </h3>
                                </div>
                                <div class="c-card-footer">
                                    <div class="c-stats">
                                        <em class="fa fa-clock-o c-stats-icon"></em>
                                        <span class="c-stats-text">Atualizado: <?php echo date('H:i') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
        
                        <div class="col-xs-3 col-md-3 col-xl-3 col-12">
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon c-aprovados">
                                        <i class="fa fa-thumbs-up c-icon"></i>
                                    </div>
                                    <p class="c-card-category">Aguardando retirada</p>
                                    <h3 class="c-card-title">
                                        <span id="transacao_aprovada"><?php echo $retirada;?></span>
                                    </h3>
                                </div>
                                <div class="c-card-footer">
                                    <div class="c-stats">
                                        <em class="fa fa-clock-o c-stats-icon"></em>
                                        <span class="c-stats-text">Atualizado: <?php echo date('H:i') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>   
                    
                        <div class="col-xs-9 col-md-9 col-xl-9 col-12">
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon2 c-tabela">
                                        <span class="c-icon" style="font-size: 20px;">Mais Locados</span>
                                    </div>
                                </div>
                                <div class="c-card-body" style="display: block;">
                                    <div class="table-responsive" style="width: 100%">
                                        <table class="c-table" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th class="col-md-2 text-center">Cód.</th>
                                                    <th class="col-md-6">Traje</th>
                                                    <th class="col-md-2 text-center">Quant.</th>
                                                    <th class="col text-center">Total Vendido</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabela_locados"></tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <a href="<?php echo base_url('954d03a8bbb7febfcd39f9e071407b4b') ?>" class="vermais btn btn-primary">Ver +</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xs-3 col-md-3 col-xl-3 col-12" id="graficohora">
                            <div class="c-card">
                                <div class="c-card-header" style="padding: 0">
                                    <div class="c-card-icon2 c-tabela">
                                        <span class="c-icon" style="font-size: 20px;">Formas Pagamento</span>
                                    </div>
                                </div>
                                <div class="c-card-body bordeless">
                                    <div id="piechart2" style="width: 100%;"></div>
                                </div>
                            </div>
                        </div>   
                        
                        <div class="col-md-12">
                            <div class="c-card">
                                <div class="c-card-header">
                                    <div class="c-card-icon2 c-tabela">
                                        <span class="c-icon" style="font-size: 20px;">Últimas Locações</span>
                                    </div>
                                </div>
                                <div class="c-card-body" style="display: block;">
                                    <div class="table-responsive" style="width: 100%">
                                        <table class="c-table" id="tabela">
                                            <thead>
                                                <tr>
                                                    <th style='width: 40%'>NOME</th>
                                                    <th style='width: 20%'>DATA/HORA</th>
                                                    <th class="text-center" style='width: 20%'>VALOR</th>
                                                    <th class="text-center" style='width: 10%'>STATUS</th>
                                                    <th class="text-center" style='width: 10%'>AÇÕES</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabela_aprovado">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-right">
                                            <a href="<?php echo base_url('954d03a8bbb7febfcd39f9e071407b4b') ?>" class="vermais btn btn-primary">Ver +</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

    
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
       var base_url = location.protocol + "//" + window.location.hostname;
    
        function mudagrafico(id){
            if(id == 1){
                $('#graficohora').show();
                $('#graficominuto').hide();
            } else {
                // google.charts.setOnLoadCallback(drawChart10);
                $('#graficohora').hide();
                $('#graficominuto').show();
            }
        }
    </script>
    <script>
        // $('document').ready(function(){
        //     $('#dia30').click(); 
        // });
    </script>
       <script>
        function diasDash(dias){
            
            if(dias == 1){
                $('#dia1').addClass('active');
                $('#dia7').removeClass('active');
                $('#dia15').removeClass('active');
                $('#dia30').removeClass('active');
            } else if(dias == 7){
                $('#dia1').removeClass('active');
                $('#dia7').addClass('active');
                $('#dia15').removeClass('active');
                $('#dia30').removeClass('active');
            } else if(dias == 15){
                $('#dia1').removeClass('active');
                $('#dia7').removeClass('active');
                $('#dia15').addClass('active');
                $('#dia30').removeClass('active');
            } else if (dias == 30){
                $('#dia1').removeClass('active');
                $('#dia7').removeClass('active');
                $('#dia15').removeClass('active');
                $('#dia30').addClass('active');
            }
            
            var form = document.createElement("form");
            var element1 = document.createElement("input");
        
            form.method = "POST";
            form.action = "<?php echo base_url('106a6c241b8797f52e1e77317b96a201'); ?>";   
        
            element1.value=dias;
            element1.name="dias";
            form.appendChild(element1);  
            
            document.body.appendChild(form);
            form.submit();
           /* 
           let dias_ = 1;
           let loja_id = $("#loja_id").val();
           if(dias){
               dias_ = dias;
           }else{
               dias_ = parseInt($(".button-area .active").html().replace('dias', ''));
           }
            
            //ultimosPedidos(loja_id);
            alert(dias_);
            dados = new FormData();
            dados.append('dias', dias_);
            //dados.append('loja_id', loja_id);
            
            
            $.ajax({
                url: '',
                method: 'post',
                data: dados,
                processData: false,
                contentType: false,
                dataType: 'json',
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                },
                success: function(dados) {
                    $("#main-content").html();
                    $("#main-content").append(dados);
                    /*$('#transacao_aprovada').unmask().html(dados.total_aprovado.toFixed(2)).mask("#.##0,00", {reverse: true});
                    $('#transacao_analise').unmask().html(dados.total_analise.toFixed(2)).mask("#.##0,00", {reverse: true});
                    $('#transacao_negada').unmask().html(dados.total_negado.toFixed(2)).mask("#.##0,00", {reverse: true});
                    $('#inscritos').html(dados.clientes);
                },
            });*/
            
        }
        
          function ultimosPedidos(loja_id){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {loja_id},
                url: u + '/reservas/listagemajax',
                beforeSend: function(){
                    $("#tabela_aprovado").empty();
                    console.log('Buscando ultimos pedidos para: '+loja_id);
                },
                success: function(retorno){
                    retorno.map(function(value, i){
                        $("#tabela_aprovado").append(`
                        
                         <tr>
                            <td class="text-center">
                                <a style="color: #1b9045;" href="<?php echo base_url() ?>aeb6ca97f00431672db51d34b87c4a50/${value.id}"><i style="font-size: 25px" class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                            <td>${value.nome}</td>
                            <td class="text-center">${value.status}</td>
                           <td>${value.data}</td>
                        </tr>
                        `);
                    })
                },
                error: function(xhr){
                    console.log(xhr);
                }
            })
            
        }
    </script>
    <script>
      
    </script>
    <script type="text/javascript">
    
        // load google charts library
        google.load("visualization", "1", {packages: ["corechart"]});
        // Set a callback to run when the Google Visualization API is loaded.
        google.charts.setOnLoadCallback(drawChart6);

        function drawChart6() {
            $.ajax({
                url: base_url + "/restrito/getVendaForma",
                type: "POST",
                dataType: "json",
                success: function(response){
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Formas de Pagamento');
                    data.addColumn('number', 'Quantidade');
                    data.addRows(response);               

                    var options = {
                        chartArea: {left:15,right:15,width:'90%',height:'80%'},
                        height: 350,
                        pieHole: 0.4,
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart2'));
                    chart.draw(data, options);
                },
            });
        }
    </script>
