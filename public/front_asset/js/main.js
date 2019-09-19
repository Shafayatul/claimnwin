"use strict"; // Start of use strict

function owlCarouselActivation() {
    if ($(".rating-carousel").length) {
        $(".rating-carousel").owlCarousel({
            autoplay: true,
            autoplayTimeout: 10000,
            loop: true,
            pagination: true,
            animateIn: 'fadeInDown',
            animateOut: 'zoomOutDown',
            margin: 0,
            stagePadding: 0,
            dotsEach: true,
            smartSpeed: 1000,
            items: 1,
            nav: true,
            navText: [
                '<i class="fa fa-long-arrow-left"></i>',
                '<i class="fa fa-long-arrow-right"></i>'
            ]
        })
    };
}



function wowActivation() {
// Activation of WOW
    if ($('.wow').length) {
        var wow = new WOW({
            mobile: false
        });
        wow.init();
    };
}


function mainMenu() {
    // main menu activation
    if($("a[rel='m_PageScroll2id']").length) {    
            $("a[rel='m_PageScroll2id']").mPageScroll2id({
                highlightClass:"active"
        });
    };
}

// hamburger
function hamburger() {
    if($(".hamburger").length) { 
        var hamburger = $(".hamburger");
            hamburger.on("click", function() {
            $(this).toggleClass("is-active");

            $('.navbar-nav li a[rel="m_PageScroll2id"] ').on('click', function(e) {
                e.preventDefault();
                $('.navbar-collapse').removeClass('show');
                $('.hamburger').removeClass('is-active');
            });
        });
    }
}


// instance of fuction while Document ready event   
jQuery(document).on('ready', function() {
    (function($) {
        wowActivation();
        owlCarouselActivation();
        hamburger();
    })(jQuery);


    var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
    if(!is_chrome){  
        $(".main-logo-top").toggle();
    }


});

// instance of fuction while Window Load event
jQuery(window).on('load', function() {
    (function($) {
        mainMenu();
    })(jQuery);
});

/*========================================================================== 
======================== Custom script for BlackPort end ===================
============================================================================*/
