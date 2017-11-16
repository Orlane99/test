/**
 * Canuck WordPress Theme doc ready script
 *
 * Used for search trigger.
 *
 * @link http://kevinsspace.ca
 * @licenseCopyright (C) 2017  kevinhaig Licensed GPLv2 or later
 * @package Canuck WordPress Theme
 */
jQuery(document).ready(function($){ 
	$( 'span.canuck-show-search-trigger' ).click( function() {
		if ( $( '.canuck-search' ).hasClass( 'search-on' ) ) {
			$( '.canuck-search' ).removeClass( 'search-on' );
			return false;
		} else {
			$( '.canuck-search' ).addClass( 'search-on' );
			return false;
		}
	});
});

