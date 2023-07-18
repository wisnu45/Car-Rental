jQuery(document).ready(function ($) {
    $('.city-sel .bxslider').bxSlider({
        minSlides: 3,
        maxSlides: 6,
        slideWidth: 170,
        slideMargin: 10
    });

	$('.car-slider-inner .bxslider').bxSlider({
        mode: 'vertical',
        slideMargin: 5,
        auto: true
    });
    $('.car-works .bxslider').bxSlider({
        minSlides: 3,
        maxSlides: 3,
        slideWidth: 360,
        slideMargin: 10,
        auto: true
    });
    $('.customers .bxslider').bxSlider({
        auto: true,
        autoControls: true
    });    
    if ($('#back-to-top').length) {
        var scrollTrigger = 100, // px
            backToTop = function () {
                var scrollTop = $(window).scrollTop();
                if (scrollTop > scrollTrigger) {
                    $('#back-to-top').addClass('show');
                } else {
                    $('#back-to-top').removeClass('show');
                }
            };
        backToTop();
        $(window).on('scroll', function () {
            backToTop();
        });
        $('#back-to-top').on('click', function (e) {
            e.preventDefault();
            $('html,body').animate({
                scrollTop: 0
            }, 700);
        });
    }
	/* === Load defined functions === */
    //popup();		
	date_agenda();
});

