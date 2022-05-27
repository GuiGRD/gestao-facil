/* ---------------------------------------------------------------------------------------------------- */
/* SCRIPTS */
/* ---------------------------------------------------------------------------------------------------- */
var horariosAgenda = [
    '06:00', '06:30', '07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00', '10:30',
    '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30',
    '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30',
    '21:00', '21:30']

var horariosAgendaFim = [
    '06:00', '06:30', '07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00', '10:30',
    '11:00', '11:30', '12:00', '12:30', '13:00', '13:30', '14:00', '14:30', '15:00', '15:30',
    '16:00', '16:30', '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00', '20:30',
    '21:00', '21:30', '22:00']

$(document).ready(function(){
    
    // ------------------------------------------------------------------------
    // Input Format Mask

    // Telefone / Celular
    $(".formatPhone").mask("(99) 9999-9999?9").focusout(function (event) {  
        var target, phone, element;  
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
        phone = target.value.replace(/\D/g, '');
        element = $(target);  
        element.unmask();  
        if (phone.length > 10) element.mask("(99) 99999-999?9"); 
        else element.mask("(99) 9999-9999?9");
    });

    // CNPJ
    $(".formatCNPJ").mask("99.999.999/9999-99");

    // CPF
    $(".formatCPF").mask("999.999.999-99");

    // CEP
    $(".formatCEP").mask("99.999-999");

    // Data
    $(".formatData").mask('99/99/9999');

    // Hora
    $('.formatHora').mask('99:99:99');
    $('.formatHora2').mask('99:99');

    // Data e hora
    $('.formatDataHora').mask('99/99/9999 99:99');

    // Moeda
    $(".formatMoeda").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'', decimal:',', affixesStay: false});
    
    // %
    $(".formatPercent").maskMoney({suffix:' %', allowNegative: true, thousands:'', decimal:',', affixesStay: false});

    // ------------------------------------------------------------------------
    // Input DateTimePicker

    // Data
    $('.dtpData').datetimepicker({
        format:'d/m/Y',
        timepicker:false,
        scrollMonth:false,
    });

    // Data e hora
    $('.dtpDataHora').datetimepicker({
        format:'d/m/Y H:i'
    });

    // Hora
    $('.dtpHora').datetimepicker({
        datepicker:false,
        format:'H:i'
    });

    // Hora Inicio
    $('.dtpHoraInicio').datetimepicker({
        datepicker:false,
        format:'H:i',
        allowTimes: horariosAgenda
    });

    // Hora Fim
    $('.dtpHoraFim').datetimepicker({
        datepicker:false,
        format:'H:i',
        allowTimes: horariosAgendaFim
    });

    $.datetimepicker.setLocale('pt-BR');

    //Excluir geral
    $('.actExcluirPadrao').on('click', function() {
        window.onbeforeunload = null;
        var urlRedirect = $(this).attr("data-url");
        bootbox.confirm({
            title: "Exclusão de registro",
            message: "Deseja realmente excluir esse registro?",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancelar'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Confirmar'
                }
            },
            callback: function (result) {
                if (result) window.location.href=urlRedirect;
            }
        });
    });

    //Atualizar - serve para geral
    $('.actAtualizarPadrao').on('click', function() {
        window.onbeforeunload = null;
        window.location.href=$(this).attr("data-url");
    });

    //----------------------- Calculo para Validar CNPJ
    $(".calcularCNPJ").on('change', function() {
        var cnpj = $(this).val();
        cnpj = cnpj.replace(/[^\d]+/g,'');
     
        if(cnpj == '') {
            $(this).val("");
            mensagemCNPJinvalido();
            throw("");
        }
         
        if (cnpj.length != 14) {
            $(this).val("");
            mensagemCNPJinvalido();
            throw("");
        }
     
        // Elimina CNPJs invalidos conhecidos
        cnpj_invalidos_conhecidos = [
            "00000000000000", "11111111111111", "22222222222222", "33333333333333", "44444444444444",
            "55555555555555", "66666666666666", "77777777777777", "88888888888888", "99999999999999"
        ];
        if(cnpj_invalidos_conhecidos.includes(cnpj)) {
            $(this).val("");
            mensagemCNPJinvalido();
            throw("");
        }
             
        // Valida DVs
        tamanho = cnpj.length - 2
        numeros = cnpj.substring(0,tamanho);
        digitos = cnpj.substring(tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
          soma += numeros.charAt(tamanho - i) * pos--;
          if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(0)) {
            $(this).val("");
            mensagemCNPJinvalido();
            throw("");
        }
             
        tamanho = tamanho + 1;
        numeros = cnpj.substring(0,tamanho);
        soma = 0;
        pos = tamanho - 7;
        for (i = tamanho; i >= 1; i--) {
          soma += numeros.charAt(tamanho - i) * pos--;
          if (pos < 2)
                pos = 9;
        }
        resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
        if (resultado != digitos.charAt(1)) {
            $(this).val("");
            mensagemCNPJinvalido();
            throw("");
        }
               
    });

    //Mostrar mensagem de CNPJ inavlido
    function mensagemCNPJinvalido()
    {
        bootbox.alert({
            message: "<b>CNPJ Inválido!</b>",
            size: 'small'
        });
    }

});