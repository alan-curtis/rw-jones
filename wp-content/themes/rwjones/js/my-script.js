/**
 * File my-script.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 */
// jQuery(document).ready(function () {

//     jQuery(".success_testimonials").slick({
//       slidesToShow: 1,
//       slidesToScroll: 1,
//       dots: true,
//     });

// });



jQuery(document).ready(function() {
    var slider = jQuery('.success_testimonials');
    var isPlaying = false;
    var playPauseButton = jQuery('.play-pause-button');
    
    slider.slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        autoplay: false,
        autoplaySpeed: 2000,
        arrows: false
    });
    
    function toggleSlider() {
        if (isPlaying) {
            slider.slick('slickPause');
            playPauseButton.html('<i class="fa-solid fa-circle-play"></i><span class="button-text">Play</span>');
        } else {
            slider.slick('slickPlay');
            playPauseButton.html('<i class="fa-solid fa-circle-pause"></i><span class="button-text">Pause</span>');
        }
        
        isPlaying = !isPlaying;
    }
    
    playPauseButton.on('click', toggleSlider);
});



jQuery(document).ready(function($) {
    var successList = $('.list-items');
    var animated = false;

    $(window).scroll(function() {
        var scrollPosition = $(window).scrollTop();
        var successListOffset = successList.offset().top;
        var windowHeight = $(window).height();

        if (!animated && scrollPosition > successListOffset - windowHeight && scrollPosition < successListOffset + successList.height()) {
            $('.numeric-sec').each(function() {
                var $this = $(this);
                var endValue = parseInt($this.attr('data-end-value'));
                var duration = 2000;

                $({ countNum: 0 }).animate(
                    {
                        countNum: endValue
                    },
                    {
                        duration: duration,
                        easing: 'linear',
                        step: function() {
                            $this.find('span').text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.find('span').text(this.countNum);
                        }
                    }
                );
            });
            animated = true;
        }
    });
    var $_sidebar_acc = $(".acf-nav-menu");

    $_sidebar_acc.find(".acf-nav-menu .menu-item-has-children").on("click", function () {
        $(this).toggleClass("active");
        $(this)
            .parent()
            .next()
            .slideToggle("slow")
            .children("ul.menu")
            .toggleClass("active");
    });
    $_sidebar_acc
        .find(".menu-item-has-children")
        .children("a")
        .on("click", function (e) {
            e.preventDefault();
            $(this).toggleClass("active").next().slideToggle("slow");
        });
});
