<?php
/**
 * Template Part, masonry.sets up the masonry content for the masonrt custom template.
 *
 * @package		Canuck WordPress Theme
 * @copyright	Copyright (C) 2017  Kevin Archibald
 * @license		http://www.gnu.org/licenses/gpl-2.0.html
 * @author		Kevin Archibald <www.kevinsspace.ca/contact/>
 */

$include_pinterest_pinit = get_theme_mod( 'canuck_include_pinit' ) ? true : false;
$images = array();

if ( ! post_password_required() ) {
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		$images = canuck_get_gallery_images();
		if ( '' !== trim( the_content() ) ) {
			?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="portfolio-post entry-content">
					<?php the_content( 'Read more' ); ?>
				</div>
			</div>
			<?php
		}
	endwhile;
	endif;
	?>
	<div class="masonry-gallery">
		<div class="masonry-grid-sizer"></div>
		<?php
		$count = 1;
		foreach ( $images as $image ) {
			$thumb = wp_get_attachment_image_src( $image, 'large' );
			$image_url = $thumb[0];
			?>
			<div class="masonry-grid-item">
				<?php
				if ( true === $include_pinterest_pinit ) {
					echo '<img data-pin-no-hover="true" src="' . esc_url( $image_url ) . '" alt="' . esc_attr__( 'gallery image ', 'canuck' ) . $count . '" title="' . esc_attr__( 'Image #', 'canuck' ) . $count . '" />';
				} else {
					echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr__( 'gallery image ', 'canuck' ) . $count . '" title="' . esc_attr__( 'Image #', 'canuck' ) . $count . '" />';
				}
				?>
				<span class="masonry-image-overlay">
					<span class="masonry-overlay-wrap">
						<span class="masonry-text">
							<?php
							if ( true === $include_pinterest_pinit ) {
								echo '<a href="https://www.pinterest.com/pin/create/button/" data-pin-round="true" data-pin-hover="false"  data-pin-media="' . esc_url( $image_url ) . '"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" alt="' . esc_attr__( 'Pinterest share image', 'canuck' ) . '" /></a>';
							}
							echo '&nbsp;&nbsp;#' . $count;
							?>
						</span>
					</span>
				</span>
			</div>
			<?php
			$count++;
		}
		?>
	</div>
	<?php
}// End if().

