(function($) {
	$(document).ready( function() {
	    $('.feature-slider a').click(function(e) {
	        $('.featured-posts .featured-post').css({
              position: 'absolute',
	            opacity: 0,
	            visibility: 'hidden'
	        });
	        $(this.hash).css({
	            position: 'relative',
	            opacity: 1,
	            visibility: 'visible'
	        });
	        $('.feature-slider a').removeClass('active');
	        $(this).addClass('active');
	        e.preventDefault();
	    });
	});
})(jQuery);