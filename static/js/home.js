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
		showBrands($(this).attr('data-scroll-to'));
		return false;
	});

	if(location.hash === '#brands') {
		showBrands('brands');
	}

	else if(location.hash === '#about_us') {
		showBrands('about_us');
	}

	$(window).scroll(function(){

		var brands = $('#brands');
		var aboutUs = $('#about_us');
		var headerHeight = $('.header').height();

		var distance = Math.abs(getRealOffset('brands'));

		if(distance < 250) {
			$('.nav-link').removeClass('active');
			$('[data-scroll-to=brands]').addClass('active');
			return;
		}

		distance = Math.abs(getRealOffset('brands'));

		if(distance < 250) {
			$('.nav-link').removeClass('active');
			$('[data-scroll-to=about_us]').addClass('active');
			return;
		}
		
		$('.nav-link').removeClass('active');
		$('.nav-link').eq(0).addClass('active');

	});

});

function getOffset(from) {
	return $('#'+from).offset().top - $('.header').height() - 20;
}

function getRealOffset(from) {
	return getOffset(from) - $(window).scrollTop();
}

function showBrands(scrollTo) {

	$('body').animate({
		scrollTop: getOffset(scrollTo),
	}, 500);
}