/**
 * Sticky menu script.
 * Used to add body class when stick scroll achieved.
 *
 * @link http://kevinsspace.ca
 * @licenseCopyright (C) 2017  kevinhaig Licensed GPLv2 or later
 * @package Canuck WordPress Theme
 */
jQuery( document ).ready( function( $ ) {
	window.requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame || function( f ){ return setTimeout( f, 1000 / 60 ); };

	$( function( jQuery ) {
		var scrollPos = $( window ).scrollTop(), resizetimer,  stickyclass = "sticky";
		if ( scrollPos > 10 ) {
			jQuery( document.body).addClass( stickyclass );
		}
		function canuckMakesticky() {
			var scrollTop = jQuery( document ).scrollTop(), $body = jQuery( document.body );
			if ( scrollTop >= 75 ){
				if ( !$body.hasClass( stickyclass ) ) {
					$body.addClass( stickyclass );
				}
			} else {
				if ( $body.hasClass( stickyclass ) ) {
					$body.removeClass( stickyclass );
				}
			}
		}
		jQuery( window ).on( "load", function() {
			jQuery( window ).on( "scroll", function() {
				requestAnimationFrame( canuckMakesticky );
			});
			jQuery( window ).on( "resize", function() {
				clearTimeout( resizetimer );
				resizetimer = setTimeout( function() {
				canuckMakesticky();
				}, 50 );
			} );
		} );
	} );
} );

