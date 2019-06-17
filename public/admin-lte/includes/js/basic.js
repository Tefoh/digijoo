$(document).ready(function () {

    autosize($('.expendable-textarea'));
    $('select').select2({ language: "fa"});



    $(".persian-datapicker").pDatepicker();
    $(".persian-datapicker-mounth").pDatepicker({
        format: " MMMM YYYY",
        altField: '#monthpickerAlt',
        altFormat: "YYYY MM DD HH:mm:ss",
        yearPicker: {
            enabled: false
        },
        monthPicker: {
            enabled: true
        },
        dayPicker: {
            enabled: false
        }
    });
    $(".persian-datapicker-year").pDatepicker({
        format: "YYYY",
        altField: '#yearpickerAlt',
        altFormat: "YYYY MM DD HH:mm:ss",
        dayPicker: {
            enabled: false
        },
        monthPicker: {
            enabled: false
        },
        yearPicker: {
            enabled: true
        }
    });
});
$('.persian-datapicker-time').pDatepicker({
    altField: '#timepickerAltField',
    altFormat: "YYYY MM DD HH:mm:ss",
    format: "HH:mm:ss a",
    onlyTimePicker: true
});