    <!-- slicknav & slick(carousel) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <style>
       .nome-form{
            color: black;
            font-size: 16px;
        }
        .nav-tabs {
            background: transparent;
        }
        .nav-tabs {
            border-bottom: 1px transparent;
        }
        .nav-item{
            color: #555;
            cursor: default;
            border-radius: 4px 4px 0 0;
            background-color: #dedede;
        }
        .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
            color: #555;
            cursor: default;
            background-color: #fff;
            border: 1px solid #ddd;
            border-bottom-color: transparent;
        }
        .c-card {
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
            border-radius: 3px;
            background-color: #999999;
            padding: 15px;
            margin-top: -20px;
            margin-right: 15px;
            float: left;
        }
            
        .c-tabela{
            box-shadow: 0 4px 20px 0px rgb(0 0 0 / 14%), 0 7px 10px -5px rgb(156 39 176 / 40%);
            background: linear-gradient(60deg, #ab47bc, #8e24aa);
        }
        
        .tab-li a{
            cursor: pointer;
        }
        
        .label-imagem{
            margin-top: 10px;
        }
        
        .outside-grey{
            width: 200px;
            height: 10px;
            background-color: lightgrey;
            display: inline-block;
        }
        
        .inside-green{
            width: 0%;
            height: 10px;
            background-color: lime;
            display: block;
        }

        .bg-home{
            background-size: 100% 100%;
        }

        #fixa{
            width: 100%;
            height: 100%;
            background: hsla(0, 0%, 0%, 0.5);
            z-index: 10;
            position: absolute;
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
            z-index: 11;
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

        .carousel-item {
            transition: transform 0.8s, opacity .5s
        }


        .carousel-indicators .active {
            width: 40px;
            height: 22px;
            margin: 0;
            background-color: #fff;
        }

        .img-reserva {
            object-fit: cover;
            max-height: 70vh;
        }
    </style>

    <section id="main-content">
        <section class="wrapper">
            <nav aria-label="breadcrumb" style="margin-bottom: -25px; margin-top: 20px;">
                <ol class="breadcrumb" style="margin: 0; padding: 0; background-color: transparent">
                    <li class="breadcrumb-item active" aria-current="page">Catálogo</li>
                    <li class="breadcrumb-item">Reservas</li>
                </ol>
            </nav>
            <div class="c-card">
                <div class="c-card-header">
                    <div class="row">
                        <div class="col-md-12 text-left py-3">
                            <h2 class="text-secondary" style="font-size: 29px;"><b>Reservas</b></h2>
                        </div>
                    </div>
                </div>
                <div class="c-card-body">
                    <div class="m-4">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
                            </div>
                            <div id="fixa" class="d-flex justify-content-around align-items-center img-rounded">
                                <div class="col-md-3">
                                    <div onclick="reserva(1)" class="card text-center card-selecao py-4">
                                        <h3>Trajes</h3>
                                        <h1>FEMININO</h1>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div onclick="reserva(2)" class="card text-center card-selecao py-4">
                                        <h3>Trajes</h3>
                                        <h1>MASCULINO</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="img-reserva img-rounded d-block w-100" src="https://www.noivaansiosa.com.br/wp-content/uploads/2018/08/Casamento-no-Domingo-Blog-Noiva-Ansiosa-1100x581.jpg" alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-reserva img-rounded d-block w-100" src="https://revista.caseme.com.br/wp-content/uploads/2018/08/DESTAQUE-CR-Destination-Wedding-Vale-do-Cuiab%C3%A1-Maria-Clara-e-Pedro.png" alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-reserva img-rounded d-block w-100" src="https://www.futuraconvites.com.br/blog/wp-content/uploads/2020/02/Cor-das-Faixas-de-Formatura.jpg" alt="Third slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="img-reserva img-rounded d-block w-100" src="https://glamourizar.com.br/wp-content/uploads/2020/12/TERNINHO-SEM-TOP-1.png" alt="For slide">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
    <script>
        function reserva(opc) { 
            //var u = window.location.host;
            //window.location.href = '/reservas-aluguel?opcao=' + opc;
            if(opc == 1){
                window.location.href = "<?php echo base_url('feminino');?>";
            }else if(opc == 2){
                window.location.href = "<?php echo base_url('masculino');?>";
            }
        };
    </script>

