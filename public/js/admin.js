function Persian_Number(text){
    var en_numbers = ["0","1","2","3","4","5","6","7","8","9"];
    var fa_numbrs =["۰","۱","۲","۳","۴","۵","۶","۷","۸","۹"];
    var last_text="";
    var find=-1;
    for(var i =0 ;i<text.length;i++)
    {
        find=en_numbers.indexOf(text.charAt(i));
        if(find==-1)
            last_text+=text.charAt(i);
        else
            last_text+=fa_numbrs[find];
        find=-1;
    }
    return last_text;
}
function Left_Sidebar(ElementID){
    if($(ElementID).hasClass('show')){
        $(ElementID).removeClass('show');
    }
    else
        $(ElementID).addClass('show');
}
function Check_Sidebar_Open($sidebar){
    if($($sidebar).hasClass('sidebar-open')){
        $($sidebar).removeClass('sidebar-open');
    }

}
function Check_Sidebar_Close($sidebar){
    if($($sidebar).hasClass('sidebar-close')){
        $($sidebar).removeClass('sidebar-close');
    }
}
$(document).ready(function () {

    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover({trigger:'focus'});
    $('.sidebar-link.active > ul.collapse').collapse('show');



    $(".sidebar-link > a").click(function () {
        var  list = $(this).parent().find('.collapse');
        $(".sidebar > ul > li > ul.collapse").collapse('hide');

        if(!$(list).hasClass('show') && !$(list).hasClass("collapsing")){
            $(list).collapse('show');
        }
    });
    $('#close-menu').click(function () {
        var $main_container = $(".main-container");
        var $sidebar = $('.sidebar');

        if($(window).width() >=992){
            Check_Sidebar_Open($sidebar);
            if($($sidebar).hasClass('sidebar-close')){
                $($sidebar).removeClass('sidebar-close');

                if($($main_container).hasClass('normal-padding'))
                    $($main_container).removeClass('normal-padding');
            }
            else {
                $($sidebar).addClass('sidebar-close');
                $($main_container).addClass('normal-padding');

            }
        }
        else{
            Check_Sidebar_Close($sidebar);

            if($($sidebar).hasClass('sidebar-open')){
                $($sidebar).removeClass('sidebar-open');
            }
            else
                $($sidebar).addClass('sidebar-open');


        }

    });

    $(".left-sidebar-trigger").click(function (event) {
        var data = $(this).attr("data-mainelement");
        if(data!=null && data!=undefined){
            var left_sidebar = $(data);
            Left_Sidebar(left_sidebar);
        }
    });
    $("#colorlist > ul > li").click(function (event) {
        $("#colorlist > ul > li").removeClass('active');
        var pointer = $(this);
        var color_class= $(pointer).attr("data-color");
        if(color_class!=null && color_class!=undefined){
            $("body").attr("class",color_class);
        }
        $(pointer).addClass("active");
    });

});
$(window).resize(function () {

    var $main_container = $(".main-container");
    if($(this).width() >=992){
        if($($main_container).hasClass('normal-padding'))
        {
            $($main_container).removeClass('normal-padding');
        }
    }
});

