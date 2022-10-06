<html>
    <head>
  
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/');?>plugins/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/');?>plugins/fullcalendar/main.css">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/');?>dist/css/adminlte.min.css">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/');?>plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
        <link rel="stylesheet" href="<?php echo base_url('siteResource/');?>plugins/bs-stepper/css/bs-stepper.min.css">
  
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            
                <!-- Preloader da página-->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__shake" src="<?php echo base_url('imagens/site/');?>logo.png" alt="Sr.Tie" height="150" width="150">
            </div>
            <!-- FIM Preloader da página-->
            
            <div class="content-wrapper">
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Agenda</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Agenda</a></li>
                                    <li class="breadcrumb-item active">Geral</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </section>
        
            
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="sticky-top mb-3">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Inserir ação</h4>
                                        </div>
                                        <div class="card-body">
                                            <div id="external-events">
                                                <?php foreach($evento as $evo){?>
                                                <div class="external-event <?php echo $evo['prioridade']; ?>"><?php echo $evo['nome']; ?></div>
                                                <?php } ?>
                                                <div class="checkbox">
                                                    <label for="drop-remove"><input type="checkbox" id="drop-remove" >remover após uso</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">Adicionar Ação</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                                <ul class="fc-color-picker" id="color-chooser">
                                                    <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                                    <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                                    <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                                    <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                                    <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="input-group">
                                                <input id="new-event" type="text" class="form-control" placeholder="Tipo de Ação">
                                                <div class="input-group-append">
                                                    <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card card-primary">
                                    <div class="card-body p-0">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        
<!--Modal Cadastro-->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cadastro de Ação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#geral-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="geral-part" id="geral-part-trigger">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Dados Gerais</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#cliente-part">
                            <button type="button" class="step-trigger" role="tab" aria-controls="cliente-part" id="cliente-part-trigger">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Dados do Cliente</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                            <div id="geral-part" class="content" role="tabpanel" aria-labelledby="geral-part-trigger">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>Data da retirada:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" id="eventoData" name="eventoData" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Data da entrega:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" id="retornoData" name="retornoData" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Peças reservadas:</label>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <select class="duallistbox" multiple="multiple" id="pecasTrajes" name="pecasTrajes">
                                                            <option>Vestido</option>
                                                            <option>Sapato</option>
                                                            <option>Terno</option>
                                                            <option>Camisa</option>
                                                            <option>Gravata</option>
                                                            <option>Blaser</option>
                                                            <option>Fraque</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" onclick="stepper.next()">Próximo</button>
                                </div>
                            </div>
                            <div id="cliente-part" class="content" role="tabpanel" aria-labelledby="cliente-part-trigger">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nome:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                            </div>
                                            <input type="text" id="clienteNome" name="clienteNome" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>CPF:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-card"></i></span>
                                            </div>
                                            <input type="text" id="clienteCpf" name="clienteCpf" class="form-control" data-inputmask='"mask": "999.999.999-99"' data-mask>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Fone:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" id="clienteFone" name="clienteFone" class="form-control" data-inputmask='"mask": "(99) 99999-9999"' data-mask>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>CEP:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                </div>
                                                <input type="text" id="cep" name="cep" class="form-control" data-inputmask='"mask": "99999-999"' data-mask onblur="pesquisacep(this.value);">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Número:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                </div>
                                                <input type="text" id="numeroLogradouro" name="numeroLogradouro" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>Logradouro:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                </div>
                                                <input type="text" id="logradouro" name="logradouro" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Bairro:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                </div>
                                                <input type="text" id="province" name="province" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Cidade:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                </div>
                                                <input type="text" id="cidade" name="cidade" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label>UF:</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-address-card"></i></span>
                                                </div>
                                                <input type="text" id="uf" name="uf" class="form-control">
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <button class="btn btn-primary" onclick="stepper.previous()">Anterior</button>
                                <button type="submit" class="btn btn-primary" onclick="finish()">Finalizar</button>
                            </div>
                        </div>
                    </div>
                </div>
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
        <script src="<?php echo base_url('siteResource/');?>plugins/moment/moment.min.js"></script>
        <script src="<?php echo base_url('siteResource/');?>plugins/inputmask/jquery.inputmask.min.js"></script>
        <script src="<?php echo base_url('siteResource/');?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
        <script src="<?php echo base_url('siteResource/');?>plugins/bs-stepper/js/bs-stepper.min.js"></script>
        
        
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
            
                var containerEl = document.getElementById('external-events');
                var checkbox = document.getElementById('drop-remove');
                var calendarEl = document.getElementById('calendar');
            
                new Draggable(containerEl, {
                  itemSelector: '.external-event',
                  eventData: function(eventEl) {
                    return {
                      title: eventEl.innerText,
                      backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                      borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
                      textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
                    };
                  }
                });
            
                var calendar = new Calendar(calendarEl, {
                  initialView: 'dayGridMonth',    
                  buttonText:  {
                      today:    'Hoje',
                      month:    'Mês',
                      week:     'Semana',
                      day:      'Dia',
                      list:     'Lista'
                    },
                  locale: 'pt-br',
                  themeSystem: 'bootstrap',
                  events: [
                    {
                      title          : 'ASDQWE',
                      start          : new Date(y, m, 10, 10, 10),
                      end            : new Date(y, m, 15, 15, 15),
                      allDay         : false,
                      url            : 'https://www.google.com/',
                      backgroundColor: '#3c8dbc', //Primary (light-blue)
                      borderColor    : '#3c8dbc' //Primary (light-blue)
                    },
                    {
                      title          : 'FSDASSDAS',
                      start          : new Date(y, m, 5, 8, 30),
                      end            : new Date(y, m, 6, 12, 50),
                      allDay         : false,
                      url            : 'https://www.google.com/',
                      backgroundColor: '#3c8dbc', //Primary (light-blue)
                      borderColor    : '#3c8dbc' //Primary (light-blue)
                    },
                    {
                      title          : 'fdsredss',
                      start          : new Date(y, m, 1, 13, 10),
                      end            : new Date(y, m, 11, 15, 0),
                      allDay         : false,
                      url            : 'https://www.google.com/',
                      backgroundColor: '#3c8dbc', //Primary (light-blue)
                      borderColor    : '#3c8dbc' //Primary (light-blue)
                    }
                  ],
                  editable  : true,
                  droppable : true, 
                  drop      : function(info) {
                      
                      /*
                      *  Inicializa o modal para criação do evento
                      *
                      */
                      var data = info.dateStr;
                      data = data.split('-');
                      
                      $('#eventoData').val(data.reverse());
                      $('#eventModal').modal('toggle');
                      
                    if (checkbox.checked) {
                      info.draggedEl.parentNode.removeChild(info.draggedEl);
                    }
                  }
                });
            
                calendar.render();
                
                
                var currColor = '#3c8dbc' //Red by default
                
                $('#color-chooser > li > a').click(function (e) {
                  e.preventDefault()
                  currColor = $(this).css('color')
                  $('#add-new-event').css({
                    'background-color': currColor,
                    'border-color'    : currColor
                  })
                })
                $('#add-new-event').click(function (e) {
                  e.preventDefault()
                  var val = $('#new-event').val()
                  if (val.length == 0) {
                    return
                  }
                   
                  var event = $('<div />')
                  event.css({
                    'background-color': currColor,
                    'border-color'    : currColor,
                    'color'           : '#fff'
                  }).addClass('external-event')
                  event.text(val)
                  $('#external-events').prepend(event)
            
                  ini_events(event)
                  
                  $('#new-event').val('');
                })
            });
            
            function finish(){
                dados = new FormData();
                dados.append('eventoData', $("#eventoData").val());
                dados.append('retornoData', $("#retornoData").val());
                dados.append('pecasTrajes', $("#pecasTrajes").val());
                dados.append('clienteNome', $("#clienteNome").val());
                dados.append('clienteCpf', $("#clienteCpf").val());
                dados.append('clienteFone', $("#clienteFone").val());
                dados.append('cep', $("#cep").val());
                dados.append('numeroLogradouro', $("#numeroLogradouro").val());
                dados.append('logradouro', $("#logradouro").val());
                dados.append('province', $("#province").val());
                dados.append('cidade', $("#cidade").val());
                dados.append('uf', $("#uf").val());
            
                $.ajax({
                    url: '<?php echo base_url('#'); ?>',
                    method: 'post',
                    data: dados,
                    processData: false,
                    contentType: false,
                    //dataType: 'json',
                    beforeSend: function(){
                    
                    },
                    error: function(xhr, status, error) {
                    
                    },
                    success: function(data) {
                    
                    },
                });
            }
            
            //Funções de CEP e endereço
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
        
    </body>
</html>
