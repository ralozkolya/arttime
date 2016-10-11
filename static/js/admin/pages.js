$(function(){

	$('#choose_page').change(function(){
		if($(this).val()) {
			location.assign(url.baseUrl + 'admin/page/' + $(this).val());
		}
	});
});