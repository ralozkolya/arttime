$(function(){
	$('.fotorama').on('fotorama:show fotorama:ready', function(e, fotorama, extra){
		showActive(fotorama.activeFrame);
	});

	$('.fotorama__nav__frame').eq(0).trigger('click');
});

function showActive(branch) {

	$('.address').html(branch.address);
	$('.location').html(branch.location);
	$('.description').html(branch.description);

	//$('.address-link').attr('href', urls.branch+'/'+branch.id);

	var location = new google.maps.LatLng(
		branch.latitude,
		branch.longitude
	);

	var map = new google.maps.Map(document.getElementById('map'), {
		center: location,
		zoom: 17,
	});

	var marker = new google.maps.Marker({
		position: location,
		map: map,
	});
}