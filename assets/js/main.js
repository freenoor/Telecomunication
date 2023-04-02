// img width
	if ( ! Modernizr.objectfit ) {
	    $('.post__image-container').each(function () {
	        var $container = $(this),
	            imgUrl = $container.find('img').prop('src');
	        if (imgUrl) {
	            $container
	            .css('backgroundImage', 'url(' + imgUrl + ')')
	            .addClass('compat-object-fit');
	        }  
	    });
	}
// Slider
$('.thing').slick({
	dots: false,
	arrows: true,
	prevArrow: '<div class="slick-prev">Prev</div>',
    nextArrow: '<div class="slick-next">Next</div>',
	infinite: true,
	speed: 500,
	fade: true,
	cssEase: 'linear'
});
// Gallery
$(function(){
    var $gallery = $('.gallery a').simpleLightbox({
	  'closeText': 'Close',
	  'navText': ['Prev', 'Next']
	});
});