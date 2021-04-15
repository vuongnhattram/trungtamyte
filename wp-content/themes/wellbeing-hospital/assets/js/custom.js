

/*=========== TABLE OF CONTENTS ===========	
Header scroll style 2
Banner Slider
Testimonial Slide
Scroll to Top
===========*/




(function ($) {
    'use strict';
	


// ===== Header scroll style 2 ==== 	

$(window).on('scroll', function() {
    var menu_area = $('.main-header');
    if ($(window).scrollTop() > 40) {
        menu_area.addClass('sticky-header');
    } else {
        menu_area.removeClass('sticky-header');
    }
});




// ===== Banner Slider ==== 	

 $('#banner-slider').bsTouchSlider();
    $(".carousel .carousel-inner").swipe({
        swipeLeft: function(event, direction, distance, duration, fingerCount) {
            this.parent().carousel('next');
        },
        swipeRight: function() {
            this.parent().carousel('prev');
        },
        threshold: 0
    });



	
// ===== Testimonial Slide ==== 

$(".testimonial-slide").owlCarousel({

    loop: true,
    autoPlay: false,
    navigation: true,
    pagination: false,
    navigationText: ["<i class='icon-left-open-big'></i>", "<i class='icon-right-open-big'></i>"],
    slideSpeed: 800,
    items: 1,
    itemsDesktop: [1199, 1],
    itemsDesktopSmall: [991.98, 1],
    itemsTablet: [768, 1],
    itemsTabletSmall: false,
    itemsMobile: [380, 1]

});




// ===== Scroll to Top ==== 

	var html_body = $("html,body"),
    btn_top = $(".return-to-top");
$(window).on("scroll", function() {
    if ($(window).scrollTop() > 200) {
        btn_top.fadeIn()
    } else {
        btn_top.fadeOut()
    }
});
btn_top.on("click", function() {
    html_body.animate({
        scrollTop: 0
    }, 1000)
});


})(jQuery);