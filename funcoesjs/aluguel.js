const BASE_URL = location.protocol + "//" + window.location.hostname;

//Funções de CEP e endereço  -- VIACEP
function limpa_formulário_cep() {
    document.getElementById('logradouro').value = ("");
    document.getElementById('province').value = ("");
    document.getElementById('cidade').value = ("");
    document.getElementById('uf').value = ("");
}

function meu_callback(conteudo) {
    if (!("erro" in conteudo)) {
        document.getElementById('logradouro').value = (conteudo.logradouro);
        document.getElementById('province').value = (conteudo.bairro);
        document.getElementById('cidade').value = (conteudo.localidade);
        document.getElementById('uf').value = (conteudo.uf);
    } else {
        limpa_formulário_cep();
        alert("CEP não encontrado.");
    }
}

function pesquisacep(valor) {
    var cep = valor.replace(/\D/g, '');
    if (cep != "") {
        var validacep = /^[0-9]{8}$/;
        if (validacep.test(cep)) {
            document.getElementById('logradouro').value = "...";
            document.getElementById('province').value = "...";
            document.getElementById('cidade').value = "...";
            document.getElementById('uf').value = "...";
            cep

            var script = document.createElement('script');
            script.src = 'https://viacep.com.br/ws/' + cep + '/json/?callback=meu_callback';
            document.body.appendChild(script);
        } else {
            limpa_formulário_cep();
            alert("Formato de CEP inválido.");
        }
    } else {
        limpa_formulário_cep();
    }
};

//Função que confirma o usuário ao tentar habilitar o desconto
function confirmarUsuario() {
    dados = new FormData();
    dados.append('usuario', document.getElementById('usuarioDesconto').value);
    // dados.append('senha', document.getElementById('senhaDesconto').value);

    // $.ajax({
    //     url: '<?php echo base_url('validarLogin'); ?>',
    //     method: 'post',
    //     data: dados,
    //     processData: false,
    //     contentType: false,
    //     error: function(xhr, status, error) {
    //       var err = eval("(" + xhr.responseText + ")");
    //       alert(err.Message);
    //     },
    //     success: function(data) {
    //         if(data === 1){
    //             document.getElementById("erroUsuario").style.display = "block";
    //         }else{
    //             document.getElementById("erroUsuario").style.display = "none";
    //             funcionario = jQuery.parseJSON(data);
    //             if(funcionario.tipo_id == 2){
    //                 document.getElementById("erroUsuario2").style.display = "block";
    //             }else{
    // document.getElementById("erroUsuario").style.display = "none";
    $('#modalDesconto').modal('hide');
    document.getElementById('btDesconto').style.display = "none";
    document.getElementById('input-desconto').style.display = "block";
    //             }
    //         }
    //     },
    // });
}

function dismissModal(id) {
    $("#" + id).modal('toggle');
}

//funções stepper 1 - Dados do Cliente NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
function dependente(id) {
    var switchStatus = false;
    if ($("#flexSwitch").is(':checked')) {
        switchStatus = $("#flexSwitch").is(':checked');
        $('#dependente').css('display', 'block');
    } else {
        switchStatus = $("#flexSwitch").is(':checked');
        $('#dependente').css('display', 'none');
    }
}

function buscaMask() {
    var x = document.getElementById("selectBusca").value;
    if (x == "nome") {
        $('#busca').css('display', 'none');
        $('#buscaNome').css('display', 'block');
        $('#buscaFone').css('display', 'none');
        $('#buscaCpf').css('display', 'none');
    } else if (x == "cpf") {
        $('#busca').css('display', 'none');
        $('#buscaNome').css('display', 'none');
        $('#buscaFone').css('display', 'none');
        $('#buscaCpf').css('display', 'block');
    } else if (x == "telefone") {
        $('#busca').css('display', 'none');
        $('#buscaNome').css('display', 'none');
        $('#buscaFone').css('display', 'block');
        $('#buscaCpf').css('display', 'none');
    }
}

function buscaCliente() {
    var flag = 0;
    $('#selectBusca').prop("disabled", true);

    var x = $('#selectBusca').val();

    if (x == "nome") {
        if ($('#buscaNome').val() == "") {
            $('#busc_erro').html("Campo Obrigatório");
            $('#busc_erro').show();
            flag = 1;
        } else {
            var busca = $('#buscaNome').val();
            x = 'clt_nome';
            $('#buscaNome').prop("disabled", true);
        }
    } else if (x == "cpf") {
        if ($('#buscaCpf').val() == "") {
            $('#busc_erro').html("Campo Obrigatório");
            $('#busc_erro').show();
            flag = 1;
        } else {
            var busca = $('#buscaCpf').val();
            x = 'clt_cpf';
            $('#buscaCpf').prop("disabled", true);
        }
    } else if (x == "telefone") {
        if ($('#buscaFone').val() == "") {
            $('#busc_erro').html("Campo Obrigatório");
            $('#busc_erro').show();
            flag = 1;
        } else {
            var busca = $('#buscaFone').val();
            x = 'clt_cel';
            $('#buscaFone').prop("disabled", true);
        }

    } else if (x == "lista") {
        var busca = $("input[name='listacpf']:checked").val();
        x = 'clt_cpf';
        $("#nomeClienteModal").modal('toggle');
    }


    if (flag === 0) {
        dados = new FormData();
        dados.append('busca', x);
        dados.append('valor', busca);
        $.ajax({
            url: BASE_URL + '/consultaCliente',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {

            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            success: function(data) {
                if (data.success == true) {
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


                    var locador = document.getElementById("listaClienteDependenteResponsavel");

                    var row0 = locador.insertRow(1);
                    row0.insertCell(0).innerHTML = 1;
                    row0.insertCell(1).innerHTML = data.cliente.nome;
                    row0.insertCell(2).innerHTML = data.cliente.cel;
                    row0.insertCell(3).innerHTML = data.cliente.cpf;
                    row0.insertCell(4).innerHTML = "<input type='radio' id='locador" + i + "' name='locador' value='" + data.cliente.cod + "'>";




                    if (data.isDependente == true) {
                        $("#listaDependentes").html("");
                        var table = document.getElementById("listaDependentes");

                        for (var i = 0; i < data.rowDependente; i++) {
                            var rowCount = table.rows.length;
                            var row = table.insertRow(rowCount);
                            row.insertCell(0).innerHTML = rowCount + 1;
                            row.insertCell(1).innerHTML = data.dependentes[i].dpd_nome;
                            row.insertCell(2).innerHTML = data.dependentes[i].dpd_fone;
                            row.insertCell(3).innerHTML = data.dependentes[i].dpd_cpf;
                            //row.insertCell(4).innerHTML= "<input type='radio' id='depend"+i+"' name='depend' value='"+data.dependentes[i].dpd_nome+"'>";

                            var row0Count = locador.rows.length;
                            var row0 = locador.insertRow(row0Count);
                            row0.insertCell(0).innerHTML = row0Count + 1;
                            row0.insertCell(1).innerHTML = data.dependentes[i].dpd_nome;
                            row0.insertCell(2).innerHTML = data.dependentes[i].dpd_fone;
                            row0.insertCell(3).innerHTML = data.dependentes[i].dpd_cpf;
                            row0.insertCell(4).innerHTML = "<input type='radio' id='locador" + i + "' name='locador' value='" + data.dependentes[i].dpd_id + "'>";
                        }
                    }





                } else if (data.success == "array") {
                    console.log(data.cliente);
                    var lista = document.getElementById("listaClienteNomes");

                    for (var i = 0; i < data.rowNomes; i++) {
                        var rowCount = lista.rows.length;
                        var row = lista.insertRow(rowCount);
                        row.insertCell(0).innerHTML = rowCount + 1;
                        row.insertCell(1).innerHTML = data.cliente[i].nome;
                        row.insertCell(2).innerHTML = data.cliente[i].cel;
                        row.insertCell(3).innerHTML = data.cliente[i].cpf;
                        row.insertCell(4).innerHTML = "<input type='radio' id='listaNome" + i + "' name='listacpf' value='" + data.cliente[i].cpf + "'>";
                    }
                    $("#nomeClienteModal").modal('toggle');
                    $('#selectBusca').val("lista");

                } else {
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
                    if ($('#selectBusca').val() == "nome") {
                        $('#clienteNome').val(busca);
                    } else if ($('#selectBusca').val() == "cpf") {
                        $('#clienteCpf').val(busca);
                    } else if ($('#selectBusca').val() == "telefone") {
                        $('#clienteCelular').val(busca);
                    }
                    $('#clienteChaveUnica').val(data.fingerprint);
                }
            },
        });
    }
}

function gravaCliente() {
    var flag = 0;
    dados = new FormData();

    if ($('#clienteNome').val() == "") {
        $('#nome_erro').html("Campo Obrigatório");
        $('#nome_erro').show();
        flag = 1;
    } else {
        dados.append('nome', $('#clienteNome').val());
    }

    if ($('#clienteCpf').val() == "") {
        $('#cpf_erro').html("Campo Obrigatório");
        $('#cpf_erro').show();
        flag = 1;
    } else {
        dados.append('cpf', $('#clienteCpf').val());
    }

    if ($('#clienteNascimento').val() == "") {
        $('#nasc_erro').html("Campo Obrigatório");
        $('#nasc_erro').show();
        flag = 1;
    } else {
        dados.append('nasc', $('#clienteNascimento').val());
    }

    if ($('#clienteCelular').val() == "") {
        $('#cell_erro').html("Campo Obrigatório");
        $('#cell_erro').show();
        flag = 1;
    } else {
        dados.append('cel', $('#clienteCelular').val());
    }

    if ($('#clienteFone').val() == "") {
        $('#fone_erro').html("Campo Obrigatório");
        $('#fone_erro').show();
        flag = 1;
    } else {
        dados.append('tel', $('#clienteFone').val());
    }

    if ($('#clienteEmail').val() == "") {
        $('#mail_erro').html("Campo Obrigatório");
        $('#mail_erro').show();
        flag = 1;
    } else {
        dados.append('mail', $('#clienteEmail').val());
    }

    if ($('#cep').val() == "") {
        $('#cep_erro').html("Campo Obrigatório");
        $('#cep_erro').show();
        flag = 1;
    } else {
        dados.append('cep', $('#cep').val());
    }

    if ($('#numeroLogradouro').val() == "") {
        $('#num_erro').html("Campo Obrigatório");
        $('#num_erro').show();
        flag = 1;
    } else {
        dados.append('num', $('#numeroLogradouro').val());
    }

    if ($('#uf').val() == "") {
        $('#uf_erro').html("Campo Obrigatório");
        $('#uf_erro').show();
        flag = 1;
    } else {
        dados.append('uf', $('#uf').val());
    }

    if ($('#cep').val() == "") {
        $('#logr_erro').html("Campo Obrigatório");
        $('#logr_erro').show();
        flag = 1;
    } else {
        dados.append('logra', $('#logradouro').val());
    }

    if ($('#cep').val() == "") {
        $('#bairr_erro').html("Campo Obrigatório");
        $('#bairr_erro').show();
        flag = 1;
    } else {
        dados.append('prov', $('#province').val());
    }

    if ($('#cep').val() == "") {
        $('#cidad_erro').html("Campo Obrigatório");
        $('#cidad_erro').show();
        flag = 1;
    } else {
        dados.append('city', $('#cidade').val());
    }

    if (flag === 0) {
        dados.append('keyId', $('#clienteChaveUnica').val());

        $.ajax({
            url: BASE_URL + '/gravaCliente',
            method: 'post',
            data: dados,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {

            },
            error: function(xhr, status, error) {
                console.log(xhr);
                console.log(status);
                console.log(error);
            },
            success: function(data) {
                $("#tituloHead").text("");
                $("#tituloHead").text("Definição de Data:");
                /*
                if (!$("input[name='depend']").is(':checked')) {
                    var locador = $('#clienteNome').val();
                    var tipo = 'clienteTie';
                }else{
                    var locador = $("input[name='depend']:checked").val();
                    var tipo = 'dependentesTie';
                }
                */

                //$("#clienteLocadorData").parent().text(locador);
                $("#clienteResponsavelData").text($('#clienteNome').val());

                //$("#clienteLocadorTraje").parent().text(locador);
                $("#clienteResponsavelTraje").text($('#clienteNome').val());

                //$("#clienteLocador").val(locador);
                //$("#nivelCliente").val(tipo);


                $('#viewclienteNome').val($('#clienteNome').val());
                $('#viewclienteCpf').val($('#clienteCpf').val());
                $('#viewclienteCelular').val($('#clienteCelular').val());
                $('#viewclienteFone').val($('#clienteFone').val());
                $('#viewcep').val($('#cep').val());
                $('#viewuf').val($('#uf').val());
                $('#viewnumeroLogradouro').val($('#numeroLogradouro').val());
                $('#viewlogradouro').val($('#logradouro').val());
                $('#viewprovince').val($('#province').val());
                $('#viewcidade').val($('#cidade').val());

                var atendente = "Nome do atendente.";
                $("#atendente").val(atendente);

                stepper.next();
            }
        });
    }
}

function dependenteNew() {

    dados = new FormData();
    dados.append('dpd_nome', $('#dependenteNome').val());
    dados.append('dpd_cpf', $('#dependenteCpf').val());
    dados.append('dpd_fone', $('#dependenteFone').val());
    dados.append('dpd_chave', $('#clienteChaveUnica').val());

    $.ajax({
        url: BASE_URL + '/dependentesNovo',
        method: 'post',
        data: dados,
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function() {

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
            row.insertCell(0).innerHTML = rowCount;
            row.insertCell(1).innerHTML = nome;
            row.insertCell(2).innerHTML = fone;
            row.insertCell(3).innerHTML = cpf;
            row.insertCell(4).innerHTML = "<input type='radio' id='depend" + i + "' name='depend' value=" + nome + ">";

            $('#dependenteNome').val("");
            $('#dependenteFone').val("");
            $('#dependenteCpf').val("");

        }
    });
}

//funções stepper 2 - Dados do Cliente NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
function dataEvento() {

}

function selecionaTraje() {
    var flag = 0;

    if ($('#dataAluguel').val() == "") {
        $('#retirada_erro').html("Campo Obrigatório");
        $('#retirada_erro').show();
        flag = 1;
    } else {
        $("#dataIni").val($('#dataAluguel').val());
    }

    if ($('#dataDevolucao').val() == "") {
        $('#devolucao_erro').html("Campo Obrigatório");
        $('#devolucao_erro').show();
        flag = 1;
    } else {
        $("#dataFim").val($('#dataDevolucao').val());
    }

    if (flag === 0) {
        $("#viewdataretirada").val($('#dataAluguel').val());
        $("#viewdatadevolucao").val($('#dataDevolucao').val());

        $("#tituloHead").text("");
        $("#tituloHead").text("Definição do(s) Traje(s):");
        stepper.next();
    }
}

function retornaCliente() {
    $("#tituloHead").text("");
    $("#tituloHead").text("Dados do Cliente:");
    stepper.previous();
}

//funções stepper 3 - Dados dos Trajes NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
function buscaTraje() {
    dados = new FormData();
    dados.append('categoria', $('#selectTrajes').val());
    dados.append('detalhes', $('#trajeLike').val());
    dados.append('dataInicio', $('#dataAluguel').val());
    dados.append('dataFim', $('#dataDevolucao').val());

    $.ajax({
        url: BASE_URL + '/buscaTraje',
        method: 'post',
        data: dados,
        processData: false,
        contentType: false,
        //dataType: 'json',
        beforeSend: function() {

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

function finalizaAluguel() {
    dados = new FormData();
    dados.append('chaveCliente', $('#clienteChaveUnica').val());
    dados.append('locador', $('#clienteLocador').val());
    dados.append('retirada', $('#dataIni').val());
    dados.append('devolucao', $('#dataFim').val());
    dados.append('trajes', $('#trajesAluguel').val());

    $.ajax({
        url: BASE_URL + '/finalizaAluguel',
        method: 'post',
        data: dados,
        processData: false,
        contentType: false,
        //dataType: 'json',
        beforeSend: function() {

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

            $("#card1").addClass('col-md-12');
            $("#card1").removeClass('col-md-6');
            $("#card2").addClass('d-none');
            
            stepper.next();
        }
    });

}

function novoTraje() {

    $("#listaClienteDependenteModal").modal('toggle');

    $(':checkbox:checked').each(function(i) {
        $("#trajeLocacao").val($(this).val());
    });
}

function gravaTrajeLocacao() {

    dados = new FormData();
    dados.append('traje', $("#trajeLocacao").val());
    dados.append('locador', $("input[name='locador']:checked").val());
    dados.append('retirada', $('#dataAluguel').val());
    dados.append('devolucao', $('#dataDevolucao').val());
    dados.append('keyClt', $('#clienteChaveUnica').val());
    if ($('#chaveLocacao').val() != "") {
        dados.append('keyLoc', $('#chaveLocacao').val());
    }
    $.ajax({
        url: BASE_URL + '/gravaLocacao',
        method: 'post',
        data: dados,
        processData: false,
        contentType: false,
        dataType: 'json',
        beforeSend: function() {

        },
        error: function(xhr, status, error) {
            console.log(xhr);
            console.log(status);
            console.log(error);
        },
        success: function(data) {
            $("#chaveLocacao").val(data);
            $("#listaClienteDependenteModal").modal('toggle');
        }
    });
}

function retornaData() {
    $("#tituloHead").text("");
    $("#tituloHead").text("Definição de Data:");
    stepper.previous();
}

//funções stepper 4 - Dados do Aluguel NÃO ALTERAR OU ACRESCENTAR, CASO NECESSÁRIO, DUPLIQUE E COMENTE ESTE GRUPO
function retornaTrajes() {
    $("#tituloHead").text("");
    $("#tituloHead").text("Definição do(s) Traje(s):");

    $("#card1").addClass('col-md-6');
    $("#card1").removeClass('col-md-12');
    $("#card2").removeClass('d-none');

    stepper.previous();
}

function finalizaAluguel() {

    dados = new FormData();
    dados.append('chaveLocacao', $('#chaveLocacao').val());

    $.ajax({
        url: BASE_URL + '/finalizaAluguel',
        method: 'post',
        data: dados,
        processData: false,
        contentType: false,
        //dataType: 'json',
        beforeSend: function() {

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

            $("#card1").addClass('col-md-12');
            $("#card1").removeClass('col-md-6');
            $("#card2").addClass('d-none');

            stepper.next();
        }
    });
}

//Inicialização de passos na pagina
document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
});

//Funções gerais do calendario de de mascaras
$(function() {


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
        ele.each(function() {

            var eventObject = {
                title: $.trim($(this).text())
            }
            $(this).data('eventObject', eventObject);

            $(this).draggable({
                zIndex: 1070,
                revert: true,
                revertDuration: 0,
            });
        })
    }

    ini_events($('#external-events div.external-event'));

    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        buttonText: {
            today: 'Hoje',
            month: 'Mês',
            week: 'Semana',
            day: 'Dia',
            list: 'Lista',
        },
        locale: 'pt-br',
        headerToolbar: {
            right: 'prev,next today',
            center: 'title',
            left: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        allDaySlot: false,
        themeSystem: 'bootstrap',
        events: [],
        editable: false,
        droppable: false,
    });

    calendar.render();
});


/** disabledoff */

var switchStatus = false;
$("#togBtn").on('change', function() {
    if ($(this).is(':checked')) {
        switchStatus = $(this).is(':checked');
        alert(switchStatus); // To verify
    } else {
        switchStatus = $(this).is(':checked');
        alert(switchStatus); // To verify
    }
});