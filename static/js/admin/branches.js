$(function(){

	$('.ckeditor').ckeditor({
		language: 'ka',
		filebrowserBrowseUrl: '/static/kcfinder/browse.php?opener=ckeditor&type=branches'
	});

	$('#location-picker').locationpicker({
		location: loc,
		radius: 0,
		inputBinding: {
			latitudeInput: $('#latitude'),
			longitudeInput: $('#longitude')
		}
	});
});