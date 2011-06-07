jQuery(document).ready(function() {
	jQuery('#colophon').prepend(jQuery('#access').html());
	jQuery('#rss-3 ul').cycle({
		fx: 'scrollUp', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		timeout: 0
	});
});
var cyberlaw = {
	maxPhotos: 100
};
jQuery.getScript(
	'http://www.flickr.com/services/rest/?method=flickr.people.getPublicPhotos&user_id=33198938@N00&format=json&api_key=5687af375108fc3d342075b21af266e7'
);
function jsonFlickrApi(response) {
	photos = response.photos.photo;
	for (var i = 0; i < Math.min(photos.length, cyberlaw.maxPhotos); i++) {
		var html = '<img ';
		if (i > 0)
			html = html + 'style="display: none" ';
		html = html + 'src="http://farm' + photos[i].farm + '.static.flickr.com/' + photos[i].server + '/' + photos[i].id + '_' + photos[i].secret + '_m.jpg" />';
		jQuery('#slideshow').append(html);
	}
	jQuery('#slideshow').cycle({
		fx: 'fade',
		timeout: 10000,
		before: function(){ jQuery('#rss-3 ul').cycle('next'); }
	});
}
