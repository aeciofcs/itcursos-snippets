$(document).ready(function () {
	$('form div').css({'display': 'none'});
	$('.trigger a').click(function () {
		$('form div').slideToggle();
	});
});