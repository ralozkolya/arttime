$(function(){
	$('.to-top').click(function(){
		$('body').animate({scrollTop: 0});
	});

	$('.facebook').parent().hover(function(){
		$('.social-arrow').stop().fadeIn();
	}, function(){
		$('.social-arrow').stop().fadeOut();
	});

	$('.navbar-toggle').click(function(){
		$('.nav-container').stop().slideToggle();
	});

	$('.parent > a').click(function(e){
		return false;
	});

	$('.parent').hover(function(){
		$('.dropdown', this).stop().slideDown();
	}, function(){
		$('.dropdown', this).stop().slideUp();
	});

	$('.online-shop-button').hover(function(){
		$('.shops').innerWidth($('.online-shop-button').innerWidth());
	});

	//$('.shops').width($('.online-shop-button').outerWidth());
});