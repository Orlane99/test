/**
 * Canuck WordPress Theme mobile doc ready script.
 *
 * This script handles the grid system used in Canuck.
 * http://kevinsspace.ca
 * Canuck WordPress Theme
 * Copyright (C) 2017  Kevin Archibalds Licensed GPLv2 or later
 */
jQuery(document).ready(function($){
	var viewPort = canuck_viewport();
	var windowSize = viewPort.width;
	if( $( '.canuck-two-col-1' ).length > 0 ) {
		if ( windowSize < 800 ) {
			canuck_unwrap_grid_two();
		} else {
			canuck_wrap_grid_two();
		}
		
		$( window ).resize( function( event ) {
			
			var viewPort = canuck_viewport();
			var windowSize = viewPort.width;
			if ( windowSize < 800 ) {
				canuck_unwrap_grid_two();
			} else {
				canuck_wrap_grid_two();
			}
			
		});
	
	}
	
	if( $( '.canuck-three-col-1' ).length > 0 ) {
		if ( windowSize < 800 ) {
			canuck_unwrap_grid_three();
		} else {
			canuck_wrap_grid_three();
		}
		
		$( window ).resize( function( event ) {
			var viewPort = canuck_viewport();
			var windowSize = viewPort.width;
			if ( windowSize < 800 ) {
				canuck_unwrap_grid_three();
			} else {
				canuck_wrap_grid_three();
			}
			
		});
	
	}
	
	function canuck_unwrap_grid_two(){
		$( '.canuck-two-wrap-all' ).unwrap();
		$( '.canuck-two-wrap-all' ).wrapAll( '<div class="canuck-two-col-1"></div>' );
		var $wrapper =	$( '.canuck-two-col-1' );
		$wrapper.find( '.canuck-two-wrap-all' ).sort(function ( a, b ) {
			return +a.dataset.order - +b.dataset.order;
		})
		.appendTo( $wrapper );
	}
	
	function canuck_wrap_grid_two() {
		$( '.canuck-two-wrap-all' ).unwrap();
		$( '.canuck-two-wrap-1' ).wrapAll( '<div class="canuck-two-col-1"></div>' );
		$( '.canuck-two-wrap-2' ).wrapAll( '<div class="canuck-two-col-2"></div>' );
		
	}
	
	function canuck_unwrap_grid_three(){
		$( '.canuck-three-wrap-all' ).unwrap();
		$( '.canuck-three-wrap-all' ).wrapAll( '<div class="canuck-three-col-1"></div>' );
		var $wrapper =	$('.canuck-three-col-1');
		$wrapper.find( '.canuck-three-wrap-all' ).sort( function ( a, b ) {
			return +a.dataset.order - +b.dataset.order;
		})
		.appendTo( $wrapper );
	}
		
	function canuck_wrap_grid_three(){
		$( '.canuck-three-wrap-all' ).unwrap();
		$( '.canuck-three-wrap-1' ).wrapAll( '<div class="canuck-three-col-1"></div>' );
		$( '.canuck-three-wrap-2' ).wrapAll( '<div class="canuck-three-col-2"></div>' );
		$( '.canuck-three-wrap-3' ).wrapAll( '<div class="canuck-three-col-3"></div>' );
	}
	
	function canuck_viewport() {
	    var e = window, a = 'inner';
	    if ( !( 'innerWidth' in window ) ) {
	        a = 'client';
	        e = document.documentElement || document.body;
	    }
	    return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
	}
	
});

