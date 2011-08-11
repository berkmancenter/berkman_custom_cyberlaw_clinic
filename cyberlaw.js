jQuery(document).ready(function() {
	jQuery('#colophon').prepend(jQuery('#menu-primary > li > a').clone().each(function() { return jQuery(this).prop('outerHTML'); }));
	jQuery('#rss-3 ul').cycle({
		fx: 'scrollUp', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
});
