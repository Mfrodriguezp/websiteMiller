$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        autoWidth: false,
        autoplay: true,
        dots: false,
        navText: ['<i class="fas fa-arrow-circle-left" tittle="Anterior"></i>', '<i class="fas  fa-arrow-circle-right" title="Siguiente"></i>'],
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 2,
                margin: 20
            },
            800: {
                items: 3,
                margin: 20
            },
            1000: {
                items: 4,
                margin: 20
            }
        }
    })
});