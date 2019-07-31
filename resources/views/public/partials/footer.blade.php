<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
    <div class="container text-center">
        <small>Copyright &copy; {{date('Y')}} www.sanjhakitab.com </small>
    </div>
</footer>
</body>

<!-- End Copyright Footer -->



<a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{

     "bottom": 15,

     "right": 15

   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
    <i class="hs-icon hs-icon-arrow-top"></i>
</a>
</main>

<div class="u-outer-spaces-helper"></div>





<!-- JS Global Compulsory -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery-migrate/jquery-migrate.min.js')}}"></script>
<script src="{{asset('assets/vendor/popper.js/popper.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/bootstrap.min.js')}}"></script>


<!-- JS Implementing Plugins -->
<script src="{{asset('assets/vendor/appear.js')}}"></script>
<script src="{{asset('assets/js/shop.app.js')}}"></script>
<script src="{{asset('assets/vendor/slick-carousel/slick/slick.js')}}"></script>
<script src="{{asset('assets/vendor/hs-megamenu/src/hs.megamenu.js')}}"></script>
<script src="{{asset('assets/vendor/dzsparallaxer/dzsparallaxer.js')}}"></script>
<script src="{{asset('assets/vendor/dzsparallaxer/dzsscroller/scroller.js')}}"></script>
<script src="{{asset('assets/vendor/dzsparallaxer/advancedscroller/plugin.js')}}"></script>
<script src="{{asset('assets/vendor/fancybox/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<script src="{{asset('assets/vendor/appear.js')}}"></script>
<script src="{{asset('assets/plugins/scrollbar/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>


<!-- JS Unify -->
<script src="{{asset('assets/js/hs.core.js')}}"></script>
<script src="{{asset('assets/js/fontAwesome.js')}}"></script>
<script src="{{asset('assets/js/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/js/components/hs.carousel.js')}}"></script>
<script src="{{asset('assets/js/components/hs.header.js')}}"></script>
<script src="{{asset('assets/js/helpers/hs.hamburgers.js')}}"></script>
<script src="{{asset('assets/js/components/hs.dropdown.js')}}"></script>
<script src="{{asset('assets/js/components/hs.scrollbar.js')}}"></script>
<script src="{{asset('assets/js/components/hs.countdown.js')}}"></script>
<script src="{{asset('assets/js/components/hs.tabs.js')}}"></script>
<script src="{{asset('assets/js/components/hs.popup.js')}}"></script>
<script src="{{asset('assets/js/components/hs.counter.js')}}"></script>
<script src="{{asset('assets/js/components/hs.go-to.js')}}"></script>
<script src="{{asset('assets/js/components/hs.count-qty.js')}}"></script>


<script>

</script>

<script>
    $(document).ready(function(){
        @if(!$errors->loginErrors->isEmpty())
        $('#signInButton').trigger('click');
        @endif


    });
</script>

<!-- JS Customization -->
<script src="{{asset('assets/js/custom.js')}}"></script>
<!-- JS Implementing Plugins -->
<script  src="{{asset('assets/vendor/custombox/custombox.min.js')}}"></script>

<!-- JS Unify -->
<script  src="{{asset('assets/js/components/hs.modal-window.js')}}"></script>

<!-- JS Plugins Init. -->
<script >
    $(document).on('ready', function () {
        // initialization of popups

        $.HSCore.components.HSModalWindow.init('[data-modal-target]');

    });
</script>


<!-- JS Plugins Init. -->








<script>
    $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('.js-carousel');

        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');

        // initialization of counters
        var counters = $.HSCore.components.HSCounter.init('[class*="js-counter"]');

        // initialization of popups with media
        $.HSCore.components.HSPopup.init('.js-fancybox-media', {
            helpers: {
                media: {},
                overlay: {
                    css: {
                        'background': 'rgba(255, 255, 255, .8)'
                    }
                }
            }
        });

        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
    });

    $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');

        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 991
        });
    });

    $(window).on('resize', function () {
        setTimeout(function () {
            $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
    });



    $(document).on('ready', function () {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

        $('#carouselCus1').slick('setOption', 'responsive', [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        }], true);
    });

    // initialization of header
    $.HSCore.components.HSHeader.init($('#js-header'));
    $.HSCore.helpers.HSHamburgers.init('.hamburger');

    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991
    });

    // initialization of HSDropdown component
    $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
        afterOpen: function () {
            $(this).find('input[type="search"]').focus();
        }
    });

    // initialization of go to
    $.HSCore.components.HSGoTo.init('.js-go-to');

    // initialization of countdowns
    var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
        yearsElSelector: '.js-cd-years',
        monthElSelector: '.js-cd-month',
        daysElSelector: '.js-cd-days',
        hoursElSelector: '.js-cd-hours',
        minutesElSelector: '.js-cd-minutes',
        secondsElSelector: '.js-cd-seconds'
    });

    // initialization of quantity counter
    $.HSCore.components.HSCountQty.init('.js-quantity');

    $(window).on('load', function () {
        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init($('.js-scrollbar'));
    });

    // initialization of revolution slider
    var tpj = jQuery;

    var revapi1014;
    tpj(document).ready(function () {
        if (tpj("#rev_slider_1014_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_1014_1");
        } else {
            revapi1014 = tpj("#rev_slider_1014_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "revolution/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    }
                    ,
                    arrows: {
                        style: "uranus",
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 768,
                        hide_onleave: false,
                        tmp: '',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        }
                    }
                },
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                    disable_onmobile: "on"
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [868, 768, 960, 600],
                lazyType: "none",
                shadow: 0,
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "#js-header",
                fullScreenOffset: "",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false
                }
            });
        }

        RsTypewriterAddOn(tpj, revapi1014);
    });



</script>

<script>

    $('#delete_data').click(function(){
        // console.log('here clicked');
        var id = $('#delete_data').data('id');
        console.log(id);
        swal({
            title: "Are you sure you want to delete ?",
            text: "Your cart item will be deleted",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#1FAB45",
            confirmButtonText: "Okay",
            cancelButtonText: "Cancel",
            buttonsStyling: true,
            //closeOnConfirm: false
        }).then(function(){
            $.ajax({
                url: '/books/delete/'+id,
                data: {"_token": "{{ csrf_token()}}","id":id},

                method: 'DELETE',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    swal(
                        "Item has been sucessfully delete"
                    );
                    $('#count').load(' #count');
                    $('.CartItems').load(' .CartItems');
                },
                failure: function (response) {
                    swal(
                        "Internal Error",
                        "Oops, your item was not deleted.", // had a missing comma
                        "error"
                    )
                },

                error: function(xhr){
                    alert(xhr.responseText);
                }

            });


        });
    });

</script>

@yield('scripts')






</body>

</html>