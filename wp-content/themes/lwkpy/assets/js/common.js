var $ = jQuery;
$.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();

    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();

    return elementBottom > viewportTop && elementTop < viewportBottom;
};

$(function() {
    $(window).scroll(function() {
        $('#fb-customer-chat iframe').height(0);
    });
    $('.top-menu-ul .product-list-btn').mouseenter(function() {
        $('.product-submenu-div').stop().fadeIn(300);
        $('.submenu-column').dequeue().stop();
        $('.submenu-column').css({ top: '10px', opacity: '0' });
        for (i = 0; i < $('.submenu-column').length; i++) {
            $('.submenu-column')
                .delay(200)
                .eq(i)
                .animate({ top: '', opacity: '1' }, 500);
        }
    });

    $('.top-nav ul li a.level-1')
        .not('.product-list-btn')
        .mouseenter(function() {
            disable_submenu();
        });

    $('.top-div').mouseenter(function() {
        disable_submenu();
    });

    $('.product-submenu-div .product-submenu').mouseleave(function() {
        // alert(5);
        disable_submenu();
    });

    function disable_submenu() {
        // alert(5);
        $('.product-submenu-div').stop().fadeOut(0);
        $('.submenu-column').dequeue().stop();

        $('.submenu-column').css({ top: '10px', opacity: '0' });
    }

    $('.mobile-menu-div .product-list-btn').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $(this).next('.submenu').slideDown(500);
        } else {
            $(this).next('.submenu').fadeOut(0);
        }
    });

    $('.mobile-menu-div  .submenu-a').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $(this).next('.submenu').slideDown(500);
        } else {
            $(this).next('.submenu').fadeOut(0);
        }

        // $(this).next('.submenu').slideDown(500);
    });

    $('.mobile-menu-div .close-btn-a').click(function() {
        // alert(6);
        $('.mobile-menu-div').animate({ left: '-100%' });
    });

    $('.mobile-btn').click(function() {
        $('.mobile-menu-div').animate({ left: '0%' });
    });

    $('.level-1').mouseenter(function() {
        if ($(window).width() > 991) {
            $('.black-top-submenu').clearQueue().fadeOut(0);

            // if ($(this).hasClass('parent')) {
            $(this).next('.black-top-submenu').slideDown(200);
            // }
        }
    });

    $('.black-top-submenu').mouseleave(function() {
        if ($(window).width() > 991) {
            $('.black-top-submenu').fadeOut(0);
        }
    });

    $('.black-top-submenu').mouseenter(function() {
        $(this).clearQueue().fadeIn(0);
    });

    $('.level-1').mouseleave(function() {
        if ($(window).width() > 991) {
            $('.black-top-submenu').delay(500).fadeOut(0);
        }
    });
});