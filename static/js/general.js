$(function(){
	$('.to-top').click(function(){
		$('body').animate({scrollTop: 0});
	});

	$('.facebook').parent().hover(function(){
		$('.social-arrow').stop().fadeIn();
	}, function(){
		$('.social-arrow').stop().fadeOut();
	});
});