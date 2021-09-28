$(document).ready(function(){
    $(".btnOcultar").click(function(){
        $("#miPropioID").slideUp(300);
    });
    $(".btnMostrar").click(function(){
        $("#miPropioID").slideDown(300);
    });
});