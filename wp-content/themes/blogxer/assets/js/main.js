jQuery(document).ready(function ($) {
    "use strict";
    var $grid;
    /*tab ajax*/
    $('.blogxer-tab-cat ul li').on('click', 'span', function () {

        var _this = $(this),
            container = _this.parents('.rtin-tab-container'),
            dataWrapper = _this.parents('.blogxer-tab-cat'),
            catID = _this.attr("data-tab-cat"),
            wtgetData = dataWrapper.data("settings"),
            template = dataWrapper.data("template"),
            contentWrap = container.find('.rt-tab-news-holder'),
            contentWrapHeight = contentWrap.outerHeight(),
            ul = _this.parents('ul');
        ul.find('li').removeClass('active');
        _this.parent().addClass('active');

        $.ajax({
            url: ThemeObj.ajaxURL,
            data: {catID: catID, action: 'blogxer_selected_cat', data: wtgetData, template: template},
            type: 'POST',
            beforeSend: function () {

                contentWrap.find('.loading').fadeIn('slow');
            },
            success: function (resp) {
                contentWrap.animate({
                    opacity: 0
                }, 1000, function () {
                    if (resp.remaining) {
                        ul.find('.more-link').show();
                        ul.find('.more-link a').attr('href', resp.cat_link);
                    } else {
                        ul.find('.more-link').hide();
                        ul.find('.more-link a').attr('href', "");
                    }

                    contentWrap.find('.loading').fadeOut('slow');
                    contentWrap.html(resp.html);
                    contentWrap.css({opacity: 1});
                });
            },
            error: function (e) {
                console.log(e);
            }
        });

    });


    /* Isotope */
    if (typeof $.fn.isotope == 'function') {
        var $parent = $('.rt-isotope-wrapper'),
            $isotope;
        var blogGallerIso = $(".rt-isotope-content", $parent).imagesLoaded(function () {
            $isotope = $(".rt-isotope-content", $parent).isotope({
                filter: "*",
                transitionDuration: "1s",
                hiddenStyle: {
                    opacity: 0,
                    transform: "scale(0.001)"
                },
                visibleStyle: {
                    transform: "scale(1)",
                    opacity: 1
                }
            });
        });
        $('.rt-isotope-tab a').on('click', function () {
            var $parent = $(this).closest('.rt-isotope-wrapper'),
                selector = $(this).attr('data-filter');

            $parent.find('.rt-isotope-tab .current').removeClass('current');
            $(this).addClass('current');
            $isotope.isotope({
                filter: selector
            });
            return false;
        });

        $(".hide-all .rt-portfolio-tab a[data-filter='*']").remove();

        $(".hide-all .rt-portfolio-tab a").first().trigger('click');
    }

    //Video Popup

    if ($(".rt-popup-youtube").length) {
        $('.rt-popup-youtube').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }

    /*-------------------------------------
    Theia Side Bar
    -------------------------------------*/
    if (typeof ($.fn.theiaStickySidebar) !== "undefined") {
        $('.fixed-side-bar .fixed-bar-coloum').theiaStickySidebar();
		$('.shop-page .fixed-bar-coloum').theiaStickySidebar();
	}

    //Header Search
    $('a[href="#header-search"]').on("click", function (event) {
        event.preventDefault();
        $("#header-search").addClass("open");
        $('#header-search > form > input[type="search"]').focus();
    });

    $("#header-search, #header-search button.close").on("click keyup", function (
        event
    ) {
        if (
            event.target === this ||
            event.target.className === "close" ||
            event.keyCode === 27
        ) {
            $(this).removeClass("open");
        }
    });

    if ($('#primary').find('div.rt-masonry-grid').length !== 0) {
        var grid = $('.rt-masonry-grid').imagesLoaded(function () {
            $grid = grid.masonry({
                // set itemSelector so .grid-sizer is not used in layout
                itemSelector: '.rt-grid-item',
                percentPosition: true,
                isAnimated: true,
                isRTL: true,
                animationOptions: {
                    duration: 700,
                    easing: 'linear',
                    queue: false
                }
            });
            $grid.masonry('layout');
        });
    }

    /* Scroll to top */
    $('.scrollToTop').on('click', function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

    /* Fixing for hover effect at IOS */
    $('*').on('touchstart', function () {
        $(this).trigger('hover');
    }).on('touchend', function () {
        $(this).trigger('hover');
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
            $("body").addClass("not-top");
            $("body").removeClass("top");
        } else {
            $('.scrollToTop').fadeOut();
            $("body").addClass("top");
            $("body").removeClass("not-top");
        }
    });

    /* Nav smooth scroll */
    $('#site-navigation .menu').onePageNav({
        extraOffset: ThemeObj.extraOffset,
    });

    /* Search Box */
    $(".search-box-area").on('click', '.search-button, .search-close', function (event) {
        event.preventDefault();
        if ($('.search-text').hasClass('active')) {
            $('.search-text, .search-close').removeClass('active');
        } else {
            $('.search-text, .search-close').addClass('active');
        }
        return false;
    });
	
	/* Header Right Menu */
	var menuArea = $('.additional-menu-area');
    menuArea.on('click', '.side-menu-trigger', function (e) {
    	e.preventDefault();
		$('.sidenav').css('transform', 'translateX(0%)');
		if(!menuArea.find('> .rt-cover').length){
			menuArea.append("<div class='rt-cover'></div>");
		}
    });
    menuArea.on('click', '.closebtn', function (e) {
        e.preventDefault();
		if(menuArea.find('> .rt-cover').length){
			menuArea.find('> .rt-cover').remove();
		}
        if( ThemeObj.rtl == "yes" ){
            $('.sidenav').css('transform', 'translateX(-105%)');
        }else{
            $('.sidenav').css('transform', 'translateX(105%)');
        }
    });
	
	$(document).on('click', '.rt-cover', function(){
		$(this).remove();
		$('.sidenav').css('transform', 'translateX(105%)');
	});

    $('#site-navigation nav , .fixed-bar-coloum-menu > div > div').meanmenu({
        meanMenuContainer: '#meanmenu',
        meanScreenWidth: ThemeObj.meanWidth,
        removeElements: "#masthead",
        siteLogo: ThemeObj.siteLogo
    });

    /* Sticky Menu */
    if (ThemeObj.stickyMenu == 1 || ThemeObj.stickyMenu == 'on') {

        $(window).on('scroll', function () {

            var s = $('#sticker'),
                w = $('body'),
                h = s.outerHeight(),
                windowpos = $(window).scrollTop(),
                windowWidth = $(window).width(),
                h1 = s.parent('#header-1'),
                h2 = s.parent('#header-2'),
                h3 = s.parent('#header-3'),
                h4 = s.parent('#header-4'),
                h5 = s.parent('#header-5'),
                h6 = s.parent('#header-6'),
				h7 = s.parent('#header-7'),
				h8 = s.parent('#header-8'),
                h1he = parseInt(s.parent('#header-1').outerHeight()) + 300,
                h2he = parseInt(s.parent('#header-2').outerHeight()) + 200,
                h3he = parseInt(s.parent('#header-3').outerHeight()) + 200,
                h4he = parseInt(s.parent('#header-4').outerHeight()) + 200,
                h5he = parseInt(s.parent('#header-5').outerHeight()) + 200,
                h6he = parseInt(s.parent('#header-6').outerHeight()) + 200,
				h7he = parseInt(s.parent('#header-7').outerHeight()) + 200,
				h8he = parseInt(s.parent('#header-8').outerHeight()) + 200,
                h1H = h1.find('.header-top-bar').outerHeight(),
                topBar = s.prev('.header-top-bar'),
                topBarP = w.hasClass('has-topbar'),
                topAdP = $('body .ad-header-top'),
                tempMenu;
            if (windowWidth > 991) {

                w.css('padding-top', '');
                var topBarH, topAdH, totalheight, mBottom, headerFixed = 0;
                topAdH = topAdP.outerHeight();
                /*header 1 */
                if (h1.length || h2.length || h3.length || h4.length || h5.length || h6.length || h7.length || h8.length) {

                    // only top bar
                    if ((topBarP == true) && (topAdH == null)) {
                        topBarH = topBar.outerHeight() + 210;
                        headerFixed = $('.masthead-container').outerHeight() + 210;
                        if (windowpos >= headerFixed) {
                            if (h1.length || h2.length || h3.length || h4.length || h5.length || h6.length || h7.length || h8.length) {
                                s.addClass('stickp');
                                w.removeClass("stickh");
                                w.addClass("non-stickh");
                            }
                        } else {
                            s.removeClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        }

                    } else {
                        // no topbar now
                        if (windowpos < parseInt(h1he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h2he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h3he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h4he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h5he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h6he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h7he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else if (windowpos < parseInt(h8he)) {
                            s.addClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        } else {
                            s.removeClass('stickp');
                            w.removeClass("stickh");
                            w.addClass("non-stickh");
                        }

                        var masthead = $('#masthead');
                        if (masthead.hasClass('header-fixed')) {
                            h1.css('top', '-' + topBarH + 'px');
                            h2.css('top', '-' + topBarH + 'px');
                            h3.css('top', '-' + topBarH + 'px');
                            h4.css('top', '-' + topBarH + 'px');
                            h5.css('top', '-' + topBarH + 'px');
                            h6.css('top', '-' + topBarH + 'px');
							h7.css('top', '-' + topBarH + 'px');
							h8.css('top', '-' + topBarH + 'px');
                        }
                    }

                    // ad and top bar
                    if ((topBarP == true) && (topAdH != null)) {
                        headerFixed = topBar.outerHeight();

                        totalheight = headerFixed + topAdH;

                        if (windowpos <= topAdH || windowpos <= headerFixed) {
                            if (h1.hasClass('header-fixed') || h2.hasClass('header-fixed') || h3.hasClass('header-fixed') || h4.hasClass('header-fixed') || h5.hasClass('header-fixed') || h6.hasClass('header-fixed') || h7.hasClass('header-fixed') || h8.hasClass('header-fixed')) {
                                h1.css('top', '-' + windowpos + 'px');
                                h2.css('top', '-' + windowpos + 'px');
                                h3.css('top', '-' + windowpos + 'px');
                                h4.css('top', '-' + windowpos + 'px');
                                h5.css('top', '-' + windowpos + 'px');
                                h6.css('top', '-' + windowpos + 'px');
								h7.css('top', '-' + windowpos + 'px');
								h8.css('top', '-' + windowpos + 'px');
                            }
                        }

                        if (windowpos >= topAdH || windowpos >= headerFixed) {
                            if (h1.length || h2.length || h3.length || h4.length || h5.length || h6.length || h7.length || h8.length) {
                                s.addClass('stickp');
                                w.removeClass("stickh");
                                w.addClass("non-stickh");
                            }
                            if (h1.length || h2.length || h3.length || h4.length || h5.length || h6.length || h7.length || h8.length) {
                                if (h1.hasClass('header-fixed') || h2.hasClass('header-fixed') || h3.hasClass('header-fixed') || h4.hasClass('header-fixed') || h5.hasClass('header-fixed') || h6.hasClass('header-fixed') || h7.hasClass('header-fixed') || h8.hasClass('header-fixed')) {
                                    h1.css('top', '-' + parseInt(totalheight) + 'px');
                                    h2.css('top', '-' + parseInt(totalheight) + 'px');
                                    h3.css('top', '-' + parseInt(totalheight) + 'px');
                                    h4.css('top', '-' + parseInt(totalheight) + 'px');
                                    h5.css('top', '-' + parseInt(totalheight) + 'px');
                                    h6.css('top', '-' + parseInt(totalheight) + 'px');
									h7.css('top', '-' + parseInt(totalheight) + 'px');
									h8.css('top', '-' + parseInt(totalheight) + 'px');
                                }
                            }
                        } else {
                            s.removeClass('stickp');
                            w.removeClass("non-stickh");
                            w.addClass("stickh");
                        }
                    }
                }
            }

        });
    }


    /*VC JS*/

    /* Infobox 1 */
    $(".rt-info-text-1").on({
        mouseenter: function () {
            var hovercolor = $(this).data('hover');
            $(this).find(".pull-left i").css('color', hovercolor);

            var bghovercolor = $(this).data('bghovercolor');
            $(this).find(".pull-left i").css('background-color', bghovercolor);

            var title_hover = $(this).data('title-hover');
            $(this).find(".media-body h3, .media-body h3 a").css('color', title_hover);
        },
        mouseleave: function () {
            var color = $(this).data('color');
            $(this).find(".pull-left i").css('color', color);

            $(this).find(".pull-left i").css('background-color', '');

            var title_color = $(this).data('title-color');
            $(this).find(".media-body h3, .media-body h3 a").css('color', title_color);
        }
    }, this);

    /* Pricing Box 1 */
    $(".rt-price-table-box1").on({
        mouseenter: function () {
            var bghover = $(this).data('bghover');
            $(this).css('background-color', bghover);
            $(this).find(".rt-btn a , .price-holder , a.pricetable-btn").css('color', bghover);

        },
        mouseleave: function () {
            var bgcolor = $(this).data('bgcolor');
            $(this).css('background-color', bgcolor);
            $(this).find(".rt-btn a").css('color', '');
            $(this).find(".price-holder").css('color', bgcolor);
            $(this).find("a.pricetable-btn").css('color', '#f8f8f8');
        }
    }, this);

    /* Infobox 5 */
    $('.rt-infobox-5').each(function () {
        var $column = $(this).closest('.vc_column-inner');
        var bgcolor = $column.css('background-color');
        var bghover = $(this).data('hover');
        $column.on({
            mouseenter: function () {
                $column.attr('style', 'background-color: ' + bghover + ' !important');
            },
            mouseleave: function () {
                $column.attr('style', 'background-color: ' + bgcolor + ' !important');
            }
        });
    });

    /* Woocommerce Shop change view */
    $('#shop-view-mode li a').on('click', function () {
        $('body').removeClass('product-grid-view').removeClass('product-list-view');

        if ($(this).closest('li').hasClass('list-view-nav')) {
            $('body').addClass('product-list-view');
            Cookies.set('shopview', 'list');
        } else {
            $('body').addClass('product-grid-view');
            Cookies.remove('shopview');
        }
        return false;
    });

    // Popup - Used in video
    if (typeof $.fn.magnificPopup == 'function') {
        $('.rt-video-popup').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    }
	if (typeof $.fn.magnificPopup == 'function') {
        if ($('.zoom-gallery').length) {
            $('.zoom-gallery').each(function () { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a.blogxer-popup-zoom', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled: true
                    }
                });
            });
        }
    }

    // start the ticker
    if (typeof $.fn.ticker == 'function') {
        $('#rt-js-news').ticker({
            speed: ThemeObj.tickerSpeed,
            debugMode: true,
            controls: ThemeObj.tickerControl,
            titleText: ThemeObj.tickerTitleText,
            displayType: ThemeObj.tickerStyle,
            direction: ThemeObj.tickerDirection,
            pauseOnItems: ThemeObj.tickerDelay,

        });
    }
		
    /* when product quantity changes, update quantity attribute on add-to-cart button */
    $("form.cart").on("change", "input.qty", function() {
        if (this.value === "0")
            this.value = "1";

        $(this.form).find("button[data-quantity]").data("quantity", this.value);
    });

    /* remove old "view cart" text, only need latest one thanks! */
    $(document.body).on("adding_to_cart", function() {
        $("a.added_to_cart").remove();
	});
	
	/*variable ajax cart end*/
	$('.quantity').on('click', '.plus', function(e) {
		var self = $(this),
			$input = self.prev('input.qty'),
			target = self.parents('form').find('.product_type_simple'),
			val = parseInt($input.val(), 10) + 1;
		target.attr("data-quantity", val);
		$input.val( val );
		
		return false;
	});

	$('.quantity').on('click', '.minus', function(e) {
		var self = $(this),
			$input = self.next('input.qty'),
			target = self.parents('form').find('.product_type_simple'),
			val = parseInt($input.val(), 10);
			val = (val > 1) ? val - 1 : val;
			target.attr("data-quantity", val);
			$input.val( val );
		return false;
	});
	
	
});


function blogxer_load_content_area_scripts($) {

    /* progress circle */
    $('.rt-progress-circle').each(function () {
        var startcolor = $(this).data('rtstartcolor'),
            endcolor = $(this).data('rtendcolor'),
            num = $(this).data('rtnum'),
            speed = $(this).data('rtspeed'),
            suffix = $(this).data('rtsuffix');
        $(this).circleProgress({
            value: 1,
            fill: endcolor,
            emptyFill: startcolor,
            thickness: 5,
            size: 140,
            animation: {duration: speed, easing: "circleProgressEasing"},
        }).on('circle-animation-progress', function (event, progress) {
            $(this).find('.rtin-num').html(Math.round(num * progress) + suffix);
        });
    });

}

//function Load
function blogxer_content_load_scripts() {
    var $ = jQuery;
    // Preloader
    $('#preloader').fadeOut('slow', function () {
        $(this).remove();
    });

    var windowWidth = $(window).width();

    /* Owl Custom Nav */
    if (typeof $.fn.owlCarousel == 'function') {
        $(".owl-custom-nav .owl-next").on('click', function () {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('next.owl.carousel');
        });
        $(".owl-custom-nav .owl-prev").on('click', function () {
            $(this).closest('.owl-wrap').find('.owl-carousel').trigger('prev.owl.carousel');
        });

        $(".rt-owl-carousel").each(function () {
            var options = $(this).data('carousel-options');
            if (ThemeObj.rtl == 'yes') {
                options['rtl'] = true; //@rtl
            }
            $(this).owlCarousel(options);
        });
    }
	
    /* Slick Slider */
	if ($.fn.slick) {
		$('.slick-carousel').each(function () {
			let $carousel = $(this);
			$carousel.imagesLoaded(function () {
				var data = $carousel.data('slick'),
					slidesToShowTab = data.slidesToShowTab,
					slidesToShowMobile = data.slidesToShowMobile;
				$carousel.slick({
					centerPadding: '0px',
					responsive: [{
							breakpoint: 992,
							settings: {
								slidesToShow: slidesToShowTab,
								slidesToScroll: slidesToShowTab
							}
						},
						{
							breakpoint: 767,
							settings: {
								slidesToShow: slidesToShowMobile,
								slidesToScroll: slidesToShowMobile
							}
						}
					]
				});
			});
		});
	}
	
	/* Counter */
	var counterContainer = $('.counter');
    if (counterContainer.length) {
        counterContainer.counterUp({
            delay: $(this).data('rtSteps'),
            time: $(this).data('rtSpeed')
        });
    }
	var counterContainer = $('.counter-detail');
    if (counterContainer.length) {
        counterContainer.counterUp({
            delay: 50,
            time: 2000
        });
    }

    /* Circle Bars - Knob */
    if (typeof ($.fn.knob) !== undefined) {
        $('.knob.knob-percent.dial').each(function () {
            var $this = $(this),
                knobVal = $this.attr('data-rel');
            $this.knob({
                'draw': function () {
                },
                'format': function (value) {
                    return value + '%';
                }
            });
            $this.appear(function () {
                $({
                    value: 0
                }).animate({
                    value: knobVal
                }, {
                    duration: 2000,
                    easing: 'swing',
                    step: function () {
                        $this.val(Math.ceil(this.value)).trigger('change');
                    }
                });
            }, {
                accX: 0,
                accY: -150
            });
        });
    }
		
    // Onepage Nav on meanmenu
    $('#meanmenu .menu').onePageNav({
        extraOffset: ThemeObj.extraOffsetMobile,
        end: function () {
            $('.meanclose').trigger('click');
        }
    });
    /* Slider */
    if (typeof $.fn.nivoSlider == 'function') {
        $('.rt-nivoslider , #ensign-nivoslider-3').nivoSlider({
            effect: 'boxRainReverse',
            slices: 15,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 500,
            pauseTime: 6000,
            startSlide: 0,
            autoplay: true,
            directionNav: false,
            controlNav: true,
            controlNavThumbs: false,
            pauseOnHover: false,
            manualAdvance: true,
            prevText: '',
            nextText: '',
            randomStart: false,
            beforeChange: function () {
            },
            afterChange: function () {
            },
            slideshowEnd: function () {
            },
            lastSlide: function () {
            },
            afterLoad: function () {
            }
        });
        rdtheme_slider_fullscreen();
    }

}

//function ready

function rdtheme_slider_fullscreen() {
    $ = jQuery;
    $('.rt-el-slider').each(function () {
        var width = $(window).width(),
            left = $(this).offset().left,
            $container = $(this).find('.rt-nivoslider');
        if (width < 1921) {
            $container.css('margin-left', -left).width(width);
        } else {
            leftAlt = left - (width - 1920) / 2;
            $container.css('margin-left', -leftAlt).width(1920);
        }
        $container.css('opacity', 1);
    });
}

(function ($) {
    "use strict";

    // Window Load+Resize
    $(window).on('load resize', function () {

        // Define the maximum height for mobile menu
        var wHeight = $(window).height();
        wHeight = wHeight - 50;
        $('.mean-nav > ul').css('max-height', wHeight + 'px');

        // Elementor Frontend Load
        $(window).on('elementor/frontend/init', function () {
            if (elementorFrontend.isEditMode()) {
                elementorFrontend.hooks.addAction('frontend/element_ready/widget', function () {
                    blogxer_content_load_scripts();
                });
            }
        });

        //initialize swiper when document ready
        $('.swiper-container2').each(function () {
            var swiper = $(this),
                autoplay = swiper.data('autoplay'),
                autoplayTimeout = swiper.data('autoplay-timeout') || '',
                speed = swiper.data('speed') || '',
                loop = swiper.data('loop') || true,
                slidesPerView = swiper.data('slides-per-view') || 3,
                spaceBetween = swiper.data('space-between'),
                centeredSlides = swiper.data('centered-slides'),
                rXsmall = swiper.data("r-x-small"),
                rSmall = swiper.data("r-small"),
                rMedium = swiper.data("r-medium"),
                rLarge = swiper.data("r-large"),
                rXlarge = swiper.data("r-x-large");

            var $swiper = new Swiper(swiper, {
                // Optional parameters
                autoplay: autoplay ? true : false,
                autoplayTimeout: autoplayTimeout ? autoplayTimeout : 10000,
                speed: speed ? speed : 2000,
                loop: loop ? true : false,
                slidesPerView: slidesPerView ? slidesPerView : 2,
                spaceBetween: spaceBetween ? spaceBetween : 10,
                centeredSlides: centeredSlides ? true : false,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    0: {
                        slidesPerView: rXsmall ? rXsmall : 1,
                    },
                    576: {
                        slidesPerView: rSmall ? rSmall : 2,
                    },
                    768: {
                        slidesPerView: rMedium ? rMedium : 3,
                    },
                    992: {
                        slidesPerView: rLarge ? rLarge : 4,
                    },
                    1200: {
                        slidesPerView: rXlarge ? rXlarge : 5,
                    }
                }
            });
        });


    });

    // Window Load
    $(window).on('load', function () {
        blogxer_content_load_scripts();
    });


})(jQuery);