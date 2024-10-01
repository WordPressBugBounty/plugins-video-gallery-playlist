(function( $ ) {
	'use strict';

	jQuery(document).ready(function( $ ) {

		'use strict';

		// Admin menu preloader.
		$("#_wpgp_page_options.wpgp--metabox-options").addClass("wpgp--after-none");

		/**
		 * Start Dependency On Color Fields.
		 */
		// Hide other color fields on Button Display Mode.
		var wpgpDisplayMode = $('.wpgpyt-display-mode .wpgp--active input').val();
		if ( 'button' === wpgpDisplayMode ) {

			$('.wpgpyt-section-colors .wpgp-field:not(.wpgp--menu-detail-wrap):not(.wpgpyt-depend-on-button-layout)').hide();
		} else {

			$('.wpgpyt-section-colors .wpgpyt-depend-on-button-layout').hide();
		}

		// Hide other color fields on Button Display Mode. (On Click)
		$('.wpgpyt-display-mode .wpgp--image').click( function() {
			
			var wpgpDisplayMode = $(this).find('input').val();
			if ( 'button' === wpgpDisplayMode ) {

				$('.wpgpyt-section-colors .wpgpyt-depend-on-button-layout').show();
				$('.wpgpyt-section-colors .wpgp-field:not(.wpgp--menu-detail-wrap):not(.wpgpyt-depend-on-button-layout)').hide();
			} else {

				$('.wpgpyt-section-colors .wpgp-field:not(.wpgp--menu-detail-wrap):not(.wpgpyt-depend-on-button-layout)').show();
				$('.wpgpyt-section-colors .wpgpyt-depend-on-button-layout').hide();
			}
		});

	});
})( jQuery );
