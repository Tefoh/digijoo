//Change the button class
$.fn.dataTable.ext.classes.sPageButton = 'btn btn-primary btn-sm';


$(document).ready(function(){
    $('#example1').DataTable({
        "language": {
            "lengthMenu": "نمایش _MENU_ در هر صفحه ",
            "zeroRecords": "سطری یافت نشد !",
            "info": "نمایش صفحه _PAGE_ از _PAGES_ صفحه",
            "infoEmpty": "هیچ رکوردی موجود نیست.",
            "infoFiltered": "(فیلتر شده از تعداد  کل  _MAX_  رکورد)",
            "decimal": ".",
            "thousands": ",",
            "emptyTable":     "داده ای در جدول برای دسترسی وجود ندارد.",
            "infoPostFix":    "",
            "loadingRecords": "در حال بار گزاری...",
            "processing":     "در حال پردازش...",
            "search":         "جستوجو:",
            "paginate": {
                "first":      "اولین",
                "last":       "آخرین",
                "next":       "بعدی",
                "previous":   "قبلی"
            },
            "aria": {
                "sortAscending":  ": برای نمایش صعودی ستون ها فعال کنید",
                "sortDescending": ": برای نمایش نزولی ستون ها فعال کنید"
            }
        }
    });
});