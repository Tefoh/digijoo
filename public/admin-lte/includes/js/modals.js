$(function () {
   $(".btn-test").click(function () {
       var color = $(this).attr("data-color");
       $("#colormodal .modal-footer").removeAttr('class').addClass("modal-footer darken-2 "+color + " "+color+"-text");
       $("#colormodal .modal-header").removeAttr('class').addClass("modal-header white-text darken-2 "+color);
       $("#colormodal .modal-content").removeAttr('class').addClass("modal-content white-text "+color);
       $("#colormodal").modal('show');

   });
});