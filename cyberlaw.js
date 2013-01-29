jQuery(document).ready(function() {
	jQuery('#footer-menu').prepend(jQuery('#menu-primary > li > a').clone().each(function() { return jQuery(this).prop('outerHTML'); }));
	jQuery('#rss-3 ul').cycle({
		fx: 'scrollUp',
        timeout: 6000,
        fit: 1,
        width: 205,
        pause: 1
	});
    jQuery('#featured-wrap').bjqs({
        'height' : 420,
        'width' : 640,
        'automatic' : false,
        'responsive' : true,
        'prevtext' : '&#8249;',
        'nexttext' : '&#8250;',
        'showmarkers' : true,
        'centercontrols' : false
    });
    jQuery('.bjqs-markers a').html('&#183');
    jQuery('.bjqs-controls').before(jQuery('.bjqs-markers'));
});
