$(document).ready(function () {
    $("#selectall").change(function () {
        if(this.checked){
            $("input[type=checkbox]").attr("checked","checked");
        }
        else{
            $("input[type=checkbox]").removeAttr("checked");
        }
    });
});