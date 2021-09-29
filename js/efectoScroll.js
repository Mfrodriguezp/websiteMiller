var scroll = new SmoothScroll('a[href*="#"]', {
    speed: 1000,
    offset:80
});

$(function(){
    $(window).scroll(function(){
        var scrollTop=$(this).scrollTop();
        if (scrollTop>=50){
            $(".ir-arriba").fadeIn();
        } else{
            $(".ir-arriba").fadeOut();
        }
    });
});

//---------------------------
//Animación Encabezado
//---------------------------

$(window).scroll(function(){
    var nav= $('.navbar');
    var scroll =$(window).scrollTop();

    if (scroll>=100){
        nav.addClass("fondo-menu");
        }else{
            nav.removeClass("fondo-menu");
        }

});