$(function(){

	$('[data-scroll-to=about_us]').addClass('active');

	var location = new google.maps.LatLng(
		lat, lng
	);

	var map = new google.maps.Map(document.getElementById('map'), {
		center: location,
		zoom: 17,
	});

	var marker = new google.maps.Marker({
		position: location,
		map: map,
	});
});