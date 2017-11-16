<?php
/**
 * Template Part, quote feature for quote post format
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2016  kevinhaig
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      kevinhaig <www.kevinsspace.ca/contact/>
 */

$include_pinterest_pinit = get_theme_mod( 'canuck_include_pinit' ) ? true : false;
$add_nopin = ( true === $include_pinterest_pinit ) ? 'data-pin-no-hover="true" ' : '';
$content = get_the_content();
$embed = canuck_extract_embed( $content );
if ( false !== $embed ) {
	$quote_data = explode( '|' , $embed );
}
$post_style = esc_html( get_theme_mod( 'canuck_blog_style', 'top_feature' ) );
if ( has_post_thumbnail() && false !== $embed ) {
	$background_image_url = the_post_thumbnail_url( 'canuck_med15' );
} elseif ( false !== $embed ) {
	$background_image_url = get_template_directory_uri() . '/images/quote800.jpg';
} else {
	$background_image_url = get_template_directory_uri() . '/images/noquote.jpg';
	echo '<div class="quote-post-feature">';
		echo '<img ' . $add_nopin . 'src="' . esc_url( $background_image_url ) . '" alt="' . esc_attr__( 'quote background', 'canuck' ) . '">';
	echo '</div>';
}
if ( false !== $embed ) { ?>
	<div class="quote-post-feature">
		<img <?php echo $add_nopin; ?> src="<?php echo esc_url( $background_image_url ); ?>" alt="<?php esc_attr_e( 'quote background', 'canuck' ); ?>">
		<div class="quote-post-feature-overlay">
			<?php
			echo '<span class="quote-post-feature-quote"><i class="fa fa-quote-left"></i>' . wp_kses_post( $quote_data[0] );
			if ( isset( $quote_data[2] ) ) {
				if ( isset( $quote_data[1] ) ) {
					$quote_author = '<a href="' . esc_url( $quote_data[2] ) . '">' . esc_html( $quote_data[1] ) . '</a>';
				}
			} elseif ( isset( $quote_data[1] ) ) {
				$quote_author = esc_html( $quote_data[1] );
			} else {
				$quote_author = '';
			}
			if ( '' !== $quote_author ) {
				echo '<span class="quote-post-feature-author">' . wp_kses_post( $quote_author ) . '</span>';
			}
			?>
		</div>
	</div>
	<?php
}
