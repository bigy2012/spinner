(function () {
    "use strict";
    $(window).scroll(function () {
        let scrollTop = $(window).scrollTop();
        let scrollHeight = $(window).height()+$(window).scrollTop();
        let navbar_top = $('#navbar_top');
        if (scrollTop > navbar_top.scrollTop()) {
            navbar_top.addClass('shadow-sm').addClass('bg-white');
        } else {
            navbar_top.removeClass('shadow-sm').removeClass('bg-white');
        }

    });
    $(window).on('load', function () {
        $('#preloader').remove();
        $('#superwheel').addClass('animate__bounceIn');
        AOS.init({
            duration: 500,
            easing: 'ease-in-out',
            anchorPlacement: 'bottom-bottom',
            once: true,
            mirror: false
        })
    })
})();