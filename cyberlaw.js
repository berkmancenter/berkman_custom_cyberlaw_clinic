jQuery(document).ready(function() {
	jQuery('#footer-menu').prepend(jQuery('#menu-primary > li > a').clone().each(function() { return jQuery(this).prop('outerHTML'); }));
	jQuery('#rss-3 ul').cycle({
		fx: 'scrollUp',
        timeout: 6000,
        fit: 1,
        width: 205,
        pause: 1
	});
});
