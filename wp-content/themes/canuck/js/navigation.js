/**
 * Canuck WordPress Theme Navigation script
 *
 * This script is used as a helper for the responsive menu system.
 * http://kevinsspace.ca
 * Canuck WordPress Theme
 * Copyright (C) 2017  Kevin Archibald Licensed GPLv2 or later 
 */
(function( $ ) {

	function canuckMainNavInit( container ) {
		var dropdownToggle = $( '<button />', { 'class': 'dropdown-toggle', 'aria-expanded': false });
		container.find( '.menu-item-has-children > a, .page_item_has_children > a' ).after( dropdownToggle );
		
		$('.dropdown-toggle').each( function(i){
			$(this).addClass('toggle-' + (i+1));
		});
		
		$('.dropdown-toggle').each( function(i){
			$(this).next().addClass('toggle-ul-' + (i+1));
		});
	}

	canuckMainNavInit( $( '.nav-container' ) );

	$('.menu-1-toggle').click(function() {
		if ( $('.main-nav').hasClass('toggle-on' ) ) {
			$('.main-nav').removeClass('toggle-on');
			$('.menu-1-toggle').attr('aria-expanded', 'false');
		} else {
			$('.main-nav').addClass('toggle-on');
			$('.menu-1-toggle').attr('aria-expanded', 'true');
		}
	});
	
	// add toggle-ul-on click functions
	$( '.dropdown-toggle' ).each( function(i){
		$( '.toggle-' + (i+1) ).click(function() {
			$('.toggle-' + (i+1) ).toggleClass('toggle-button-on');
			$('ul.toggle-ul-' + (i+1) ).toggleClass( 'toggle-ul-on');
		});
	});	
	
	// add toggle-on class to existing sidebar buttons so if they exist they will display
	if ( $('.toggle-sb-a').length ) {
		if ( $( '.sidebar-a-toggle').hasClass('toggle-on' ) ) {
			// do nothing
		} else {
			$('.sidebar-a-toggle').addClass('toggle-on');
		}
	}
	
	$( '.sidebar-a-toggle').click(function() {
		if ( $( '.toggle-sb-a').hasClass('toggle-on' ) ) {
			$('.toggle-sb-a').removeClass('toggle-on');
		} else {
			$('.toggle-sb-b').removeClass('toggle-on');
			$('.toggle-sb-a').addClass('toggle-on');
		}
	});
	
	if ( $('.toggle-sb-b').length ) {
		if ( $( '.sidebar-b-toggle').hasClass('toggle-on' ) ) {
			// do nothing
		} else {
			$('.sidebar-b-toggle').addClass('toggle-on');
		}
	}
	
	$( '.sidebar-b-toggle').click(function() {
		if ( $( '.toggle-sb-b').hasClass('toggle-on' ) ) {
			$('.toggle-sb-b').removeClass('toggle-on');
		} else {
			$('.toggle-sb-a').removeClass('toggle-on');
			$('.toggle-sb-b').addClass('toggle-on');
		}
	});

})( jQuery );
