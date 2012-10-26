$(document).ready(function () {
	$("li.submenu").hover(function() {
		$(this).children("ul").slideDown(200);
	}, function() {
		$(this).children("ul").slideUp(200);
	});
});