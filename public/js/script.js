/**
 * Global variables
 */
"use strict";

var userAgent = navigator.userAgent.toLowerCase(),
    initialDate = new Date(),

    $document = $(document),
    $window = $(window),
    $html = $("html"),

    isDesktop = $html.hasClass("desktop"),
    isIE = userAgent.indexOf("msie") != -1 ? parseInt(userAgent.split("msie")[1]) : userAgent.indexOf("trident") != -1 ? 11 : userAgent.indexOf("edge") != -1 ? 12 : false,
    isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
    isTouch = "ontouchstart" in window,

    plugins = {
        pointerEvents: isIE < 11 ? "js/pointer-events.min.js" : false,
        smoothScroll: $html.hasClass("use--smoothscroll") ? "js/smoothscroll.min.js" : false,
        bootstrapTooltip: $("[data-toggle='tooltip']"),
        bootstrapTabs: $(".tabs"),
        rdParallax: $(".rd-parallax"),
        rdAudioPlayer: $(".rd-audio"),
        rdVideoPlayer: $(".rd-video-player"),
        responsiveTabs: $(".responsive-tabs"),
        rdGoogleMaps: $(".rd-google-map"),
        rdNavbar: $(".rd-navbar"),
        rdVideoBG: $(".rd-video"),
        rdRange: $('.rd-range'),
        textRotator: $(".text-rotator"),
        owl: $(".owl-carousel"),
        swiper: $(".swiper-slider"),
        counter: $(".counter"),
        flickrfeed: $(".flickr"),
        twitterfeed: $(".twitter"),
        progressBar: $(".progress-bar-js"),
        isotope: $(".isotope"),
        countDown: $(".countdown"),
        calendar: $(".rd-calendar"),
        facebookfeed: $(".facebook"),
        instafeed: $(".instafeed"),
        facebookWidget: $('#fb-root'),
        materialTabs: $('.rd-material-tabs'),
        filePicker: $('.rd-file-picker'),
        fileDrop: $('.rd-file-drop'),
        popover: $('[data-toggle="popover"]'),
        dateCountdown: $('.DateCountdown'),
        statefulButton: $('.btn-stateful'),
        slick: $('.slick-slider'),
        scroller: $(".scroll-wrap"),
        socialite: $(".socialite"),
        viewAnimate: $('.view-animate'),
        selectFilter: $("select"),
        rdInputLabel: $(".form-label"),
        stacktable: $("[data-responsive=true]"),
        bootstrapDateTimePicker: $("[date-time-picker]"),
        customWaypoints: $('[data-custom-scroll-to]'),
        photoSwipeGallery: $("[data-photo-swipe-item]"),
        circleProgress: $(".progress-bar-circle"),
        stepper: $("input[type='number']"),
        radio: $("input[type='radio']"),
        checkbox: $(".checkbox_custom"),
        customToggle: $("[data-custom-toggle]"),
        rdMailForm: $(".rd-mailform"),
        regula: $("[data-constraints]"),
        search: $(".rd-search"),
        searchResults: $('.rd-search-results'),
        imgZoom: $('[mag-thumb]')
    };

/**
 * Initialize All Scripts
 */
$document.ready(function () {

    /**
     * toggleSwiperInnerVideos
     * @description  toggle swiper videos on active slides
     */
    function toggleSwiperInnerVideos(swiper) {
        var prevSlide = $(swiper.slides[swiper.previousIndex]),
            nextSlide = $(swiper.slides[swiper.activeIndex]),
            videos;

        prevSlide.find("video").each(function () {
            this.pause();
        });

        videos = nextSlide.find("video");
        if (videos.length) {
            videos.get(0).play();
        }
    }

    /**
     * isScrolledIntoView
     * @description  check the element whas been scrolled into the view
     */
    function isScrolledIntoView(elem) {
        var $window = $(window);
        return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();
    }

    /**
     * jQuery Count To
     * @description Enables Count To plugin
     */
    if (plugins.counter.length) {
        var i;

        for (i = 0; i < plugins.counter.length; i++) {
            var $counterNotAnimated = $(plugins.counter[i]).not('.animated');
            $document
                .on("scroll", $.proxy(function () {
                    var $this = this;

                    if ((!$this.hasClass("animated")) && (isScrolledIntoView($this))) {
                        $this.countTo({
                            refreshInterval: 40,
                            speed: $this.attr("data-speed") || 1000
                        });
                        $this.addClass('animated');
                    }
                }, $counterNotAnimated))
                .trigger("scroll");
        }
    }

    $('.count').appear(function() {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 2000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
});
