$(function () {
    $('button').on('click', function () {
        var type = $(this).data('type');
        if (type === 'basic') {
            showBasicMessage();
        }
        else if (type === 'with-title') {
            showWithTitleMessage();
        }
        else if (type === 'success') {
            showSuccessMessage();
        }
        else if (type === 'confirm') {
            showConfirmMessage();
        }
        else if (type === 'cancel') {
            showCancelMessage();
        }
        else if (type === 'with-custom-icon') {
            showWithCustomIconMessage();
        }
        else if (type === 'html-message') {
            showHtmlMessage();
        }
        else if (type === 'autoclose-timer') {
            showAutoCloseTimerMessage();
        }
        else if (type === 'prompt') {
            showPromptMessage();
        }
        else if (type === 'ajax-loader') {
            showAjaxLoaderMessage();
        }
    });
});

//These codes takes from http://t4t5.github.io/sweetalert/
function showBasicMessage() {
    swal("این یک پیام است!");
}

function showWithTitleMessage() {
    swal("این یک پیام است!", "آیا زیبا نیست؟");
}

function showSuccessMessage() {
    swal("عالی بود!", "شما بر روی دکمه کلیک کرده اید!", "success");
}

function showConfirmMessage() {
    swal({
        title: "آیا شما مطئعن هستید؟",
        text: "شما نمی توانید دیگر این فایل را بازگردانید.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "بله آن را پاک کن!",
        cancelButtonText: "نه دست نگه دار",
        closeOnConfirm: false
    }, function () {
        swal("پاک شد!", "فایل مورد نظر پاک شد.", "success");
    });
}

function showCancelMessage() {
    swal({
        title: "آیا شما مطئعن هستید؟",
        text: "شما نمی توانید دیگر این فایل را بازگردانید.",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "بله آن را پاک کن",
        cancelButtonText: "نه دست نگه دار",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
            swal("پاک شد!", "فایل مورد نظر پاک شد.", "success");
        } else {
            swal("لغو شد.", "فایل مورد نظر پاک نشد.", "error");
        }
    });
}

function showWithCustomIconMessage() {
    swal({
        title: "عالیه!",
        text: "این یک عکس سفارشی هست.",
        imageUrl: "includes/img/profileavatar.jpg"
    });
}

function showHtmlMessage() {
    swal({
        title: "HTML <small>عنوان</small>!",
        text: "یک متن سفارسی <span style=\"color: #CC0000\"> تست اول<span>",
        html: true
    });
}

function showAutoCloseTimerMessage() {
    swal({
        title: "به صورت خودکار بسته خواهد شد.",
        text: "من بعد از دو ثانیه بسته خواهم شد.",
        timer: 2000,
        showConfirmButton: false
    });
}

function showPromptMessage() {
    swal({
        title: "یک ورودی",
        text: "یک چیز جالب بنویسید.",
        type: "input",
        showCancelButton: true,
        closeOnConfirm: false,
        animation: "slide-from-top",
        inputPlaceholder: "یک چیزی بنویسید."
    }, function (inputValue) {
        if (inputValue === false) return false;
        if (inputValue === "") {
            swal.showInputError("شما نیاز دارید چیزی بنویسید."); return false
        }
        swal("عالیه!", "شما نویشته اید: " + inputValue, "success");
    });
}

function showAjaxLoaderMessage() {
    swal({
        title: "نمونه در خواست ajax",
        text: "برای ثبت  کلیک کنید.",
        type: "info",
        showCancelButton: true,
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function () {
        setTimeout(function () {
            swal("درخواست ajax پایان یافت");
        }, 2000);
    });
}