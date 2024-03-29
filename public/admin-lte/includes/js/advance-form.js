$(function() {
    $('#simple-color-selector').colorpicker();
    $('#advance-color-picker').colorpicker();
    $('#my-select').multiSelect();

    $("#spinner")
        .spinner('delay', 200) //delay in ms
        .spinner('changed', function(e, newVal, oldVal) {
            // trigger lazed, depend on delay option.
        })
        .spinner('changing', function(e, newVal, oldVal) {
            // trigger immediately
        }
    );

    var $demoMaskedInput = $('.demo-masked-input');

    //Date
    $demoMaskedInput.find('.date').inputmask('yyyy/mm/dd', { placeholder: '____/__/__' });

    //Time
    $demoMaskedInput.find('.time12').inputmask('hh:mm t', { placeholder: '__:__ _m', alias: 'time12', hourFormat: '12' });
    $demoMaskedInput.find('.time24').inputmask('hh:mm', { placeholder: '__:__ _m', alias: 'time24', hourFormat: '24' });

    //Date Time
    $demoMaskedInput.find('.datetime').inputmask('y/m/d h:s', { placeholder: '____/__/__  __:__', alias: "datetime", hourFormat: '24' });

    //Mobile Phone Number
    $demoMaskedInput.find('.mobile-phone-number').inputmask('+99 (999) 999-99-99', { placeholder: '+__ (___) ___-__-__' });
    //Phone Number
    $demoMaskedInput.find('.phone-number').inputmask('(999) 9999 99-99', { placeholder: '(___) ____ __-__' });

    //Dollar Money
    //Euro Money
    $demoMaskedInput.find('.money-ryal').inputmask('999,999 ریال', { placeholder: '___,___ ریال' });

    //IP Address
    $demoMaskedInput.find('.ip').inputmask('999.999.999.999', { placeholder: '___.___.___.___' });

    //Credit Card
    $demoMaskedInput.find('.credit-card').inputmask('9999 9999 9999 9999', { placeholder: '____ ____ ____ ____' });

    //Email
    $demoMaskedInput.find('.email').inputmask({ alias: "email" });

    //Serial Key
    $demoMaskedInput.find('.key').inputmask('****-****-****-****', { placeholder: '____-____-____-____' });
});