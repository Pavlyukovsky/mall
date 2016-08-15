jQuery(document).ready(function($) {
	$('.btn-menu').click(function(event) {
		$(this).next().slideToggle();
	});
});