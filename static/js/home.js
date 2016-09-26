$(function(){

	$('.slider').unslider({
		autoplay: true,
		arrows: {
			next: '<span class="arrow right glyphicon glyphicon-triangle-right"></span>',
			prev: '<span class="arrow left glyphicon glyphicon-triangle-left"></span>',
		},
		delay: 7000,
	});

	$('[data-scroll-to]').click(function(){
		showBrands();
		return false;
	});

	if(location.hash === '#brands') {
		showBrands();
	}

	function showBrands() {

		$('body').animate({
			scrollTop: $('#brands').offset().top - $('.header').height() - 20,
		}, 500);
	}

});