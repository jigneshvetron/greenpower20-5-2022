(function() {

	"use strict";

	var GREENPWR = {
		init: function() {
			this.Basic.init();  
		},

		Basic: {
			init: function() {
				this.Animation();
			},
			Animation: function (){
				if($('.wow').length){
					var wow = new WOW(
					{
						boxClass:     'wow',
						animateClass: 'animated',
						offset:       0,
						mobile:       true,
						live:         true
					}
					);
					wow.init();
				}
			},
		}
	}
    $('[data-background]').each(function() {
        $(this).css('background-image', 'url('+ $(this).attr('data-background') + ')');
    });
    $(window).on("scroll", function() {
        if ($(this).scrollTop() > 200) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').on("click", function()  {
        $("html, body").animate({
            scrollTop: 0
        }, 800);
        return false;
    });
	$(document).ready(function (){
		GREENPWR.init();
	});
    $(window).on('load', function(){
        $('#preloader').fadeOut('slow',function(){$(this).hide();});
    });
	//------- Fixed header js --------//
    setTimeout(function(){
        $(window).resize(function() {
            $('.fixed-header-fill').css("padding-top", $("#header").height());
        }).resize();
        //------- Header Scroll Class  js --------//
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#header').addClass('header-scrolled');
            } else {
                $('#header').removeClass('header-scrolled');
            }
        });
    },100);

	$('[data-fancybox="media1"]').fancybox({
        hash : false,
    });
	//------- mobile footer toggles --------//
	$(".nav-folderized .h4").click(function(){
        $(this).parent(".folderized-child").toggleClass("open"); 
        $('html, body').animate({ scrollTop: $(this).offset().top - 170 }, 500 );
    });
	//------- Mobile Nav  js --------//  
    
    if ($('#nav-menu-container').length > 0) {
        var $mobile_nav = $('#nav-menu-container').clone().prop({
            id: 'mobile-nav'
        });
        $mobile_nav.find('> ul').attr({
            'class': '',
            'id': ''
        });
        $('body').append($mobile_nav);
        $('.header-wrapper').prepend('<button type="button" id="mobile-nav-toggle"><i class="bx bx-menu"></i></button>');
        $('body').append('<div id="mobile-body-overly"></div>');
        $('#mobile-nav').find('.menu-has-children').prepend('<i class="bx bx-caret-down"></i>');
        $('#mobile-nav').find('.menu-has-children ul').hide();

        $(document).on('click', '.menu-has-children i', function(e) {
            $(this).next().toggleClass('menu-item-active');
            $(this).nextAll('ul').eq(0).slideToggle();
            $(this).toggleClass("bx-caret-up bx-caret-down");
        });

        $(document).on('click', '#mobile-nav-toggle', function(e) {
            $('body').toggleClass('mobile-nav-active');
            $('#mobile-nav-toggle i').toggleClass('bx-x bx-menu');
            $('#mobile-body-overly').toggle();
        });

            $(document).on('click', function(e) {
            var container = $("#mobile-nav, #mobile-nav-toggle");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('bx-x bx-menu');
                    $('#mobile-body-overly').fadeOut();
                }
            }
        });
    } else if ($("#mobile-nav, #mobile-nav-toggle").length) {
        $("#mobile-nav, #mobile-nav-toggle").hide();
    }

    //------- Smooth Scroll  js --------//
    $('.nav-menu a, #mobile-nav a, .scrollto').on('click', function() {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            if (target.length) {
                var top_space = 0;
                if ($('#header').length) {
                    top_space = $('#header').outerHeight();
                    if (!$('#header').hasClass('header-fixed')) {
                        top_space = top_space;
                    }
                }
                $('html, body').animate({
                    scrollTop: target.offset().top - top_space
                }, 1500, 'easeInOutExpo');
                if ($(this).parents('.nav-menu').length) {
                    $('.nav-menu .menu-active').removeClass('menu-active');
                    $(this).closest('li').addClass('menu-active');
                }
                if ($('body').hasClass('mobile-nav-active')) {
                    $('body').removeClass('mobile-nav-active');
                    $('#mobile-nav-toggle i').toggleClass('lnr-times lnr-bars');
                    $('#mobile-body-overly').fadeOut();
                }
                return false;
            }
        }
    });
    $(document).ready(function() {
        $('html, body').hide();
        if (window.location.hash) {
            setTimeout(function() {
                $('html, body').scrollTop(0).show();
                $('html, body').animate({
                    scrollTop: $(window.location.hash).offset().top - 108
                }, 1000)
            }, 0);
        } else {
            $('html, body').show();
        }
    });
	//------- swiper carousel --------//
    var swiper = new Swiper('.swiper-one', {
        spaceBetween: 0,
        loop: false,
		autoplay:true,
        navigation: {
            type: 'bullets',
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
	var swiper2 = new Swiper('.swiper-two', {
        spaceBetween:0,
        slidesPerView:1,
		loop: true,
		navigation: {
            type: 'bullets',
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            575: {
                slidesPerView:2,
            },
            768: {
                slidesPerView:3,
            },
            1024: {
                slidesPerView:3,
            },
            1200: {
                slidesPerView:3,
            },
			1400: {
                slidesPerView:4,
            },
			1700: {
                slidesPerView:5,
            },
        }
    });
    var swiper3 = new Swiper('.swiper-img', {
        spaceBetween: 0,
        loop: true,
		autoplay:true,
        navigation: {
            type: 'bullets',
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
	var swiper4 = new Swiper('.swiper-testimonial', {
        spaceBetween: 0,
        loop: true,
		autoplay:true,
        navigation: {
            type: 'bullets',
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
})();