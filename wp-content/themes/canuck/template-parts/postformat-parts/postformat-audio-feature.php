<?php
/**
 * Template Part, audio feature for audio post format
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2016  kevinhaig
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      kevinhaig <www.kevinsspace.ca/contact/>
 */

global $post;
$include_pinterest_pinit = get_theme_mod( 'canuck_include_pinit' ) ? true : false;
$args = array(
	'type' => 'audio',
	'split_media' => 'true',
);
$embed_audio = canuck_media_grabber_audio( $args );
if ( '' !== $embed_audio ) {
	$audio_urls = wp_extract_urls( $embed_audio );
	if ( isset( $audio_urls[0] ) ) {
		$audio_url = $audio_urls[0];
	} else {
		$audio_url = '';
	}
} else {
	$audio_url = '';
}
$post_style = esc_html( get_theme_mod( 'canuck_blog_style', 'top_feature' ) );
// Get the audio excerpt.
$attached_media = get_attached_media( 'audio', $post->ID );
if ( $attached_media ) {
	foreach ( $attached_media as $media_item ) {
		if ( $media_item->guid === $audio_url ) {
			$audio_excerpt = $media_item->post_excerpt;
		} else {
			$audio_excerpt = '';
		}
	}
} else {
	$audio_excerpt = '';
}
// Featured image for audio.
if ( has_post_thumbnail() ) {
	$background_image_url = get_the_post_thumbnail_url( $post->ID, 'canuck_med15' );
} else {
	$background_image_url = get_template_directory_uri() . '/images/audio800.jpg';
}
// Display the featured area.
if ( '' !== $audio_url ) {
	$include_pinterest_pinit = get_theme_mod( 'canuck_include_pinit' ) ? true : false;
	$add_nopin = ( true === $include_pinterest_pinit ) ? 'data-pin-no-hover="true" ' : '';
	echo '<div class="audio-post-feature">';
		echo '<img ' . $add_nopin . 'src="' . esc_url( $background_image_url ) . '" alt="' . esc_attr__( 'audio background', 'canuck' ) . '">';
			echo '<div class="audio-post-feature-overlay">';
				echo '<span class="audio-feature-meta">' . wp_kses_post( $audio_excerpt ) . '</span>';
				$attr = array(
					'src'      => $audio_url,
					'loop'     => '',
					'autoplay' => '',
					'preload'  => 'true',
				);
				echo '<div class="audio-feature-audio">';
					echo wp_audio_shortcode( $attr );// XSS OK.
				echo '</div>';
		echo '</div>';
	echo '</div>';
}

