<?php
/**
 * Canuck Home Page template part - carousel slider
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

global $post;
$section13_title = stripslashes( get_theme_mod( 'canuck_section13_title', '' ) );
$section13_text = stripslashes( get_theme_mod( 'canuck_section13_text', '' ) );
$section13_portfolio_category = get_theme_mod( 'canuck_section13_portfolio_category', '' );
$section13_portfolio_columns = get_theme_mod( 'canuck_section13_portfolio_columns', '3' );
$sec13_bg_image = get_theme_mod( 'canuck_section13_background_image', '' );
$sec13_use_parallax = get_theme_mod( 'canuck_section13_use_parallax', false );

$category_id = get_cat_ID( $section13_portfolio_category );
$args = array(
	'category' => $category_id,
	'numberposts' => 20,
);
$custom_posts = get_posts( $args );

if ( '' !== $sec13_bg_image && false !== $sec13_use_parallax ) { ?>
	<div class="home-13-wide parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $sec13_bg_image ); ?>">
<?php } else { ?>
	<div class="home-13-wide">
<?php } ?>
	<div class="home-13-wide-overlay">
		<div class="home-13-wrap">
			<?php
			// Title.
			if ( '' !== $section13_title ) {
				?>
				<div class="home-13-title">
					<h2><?php echo wp_kses_post( $section13_title ); ?></h2>
				</div>
				<?php
			}
			// Description.
			if ( '' !== $section13_text ) {
				?>
				<div class="home-13-text">
					<p><?php echo wp_kses_post( $section13_text ); ?></p>
				</div>
				<?php
			}
			// Carousel.
			if ( '' !== $section13_portfolio_category && false !== $custom_posts ) {
				?>
				<div id="home-13-carousel" class="owl-carousel home-13">
					<?php
					$canuck_feature_pic_count = 0;
					foreach ( $custom_posts as $post ) {
						setup_postdata( $post );
						$link_to_post = ( '' === get_post_meta( $post->ID, 'canuck_metabox_link_to_post', true ) ? false : true );
						$custom_feature_link = ( '' === get_post_meta( $post->ID, 'canuck_custom_feature_link', true ) ? false : get_post_meta( $post->ID, 'canuck_custom_feature_link', true ) );
						if ( has_post_thumbnail() ) {
							$canuck_feature_pic_count ++;
							$image_url = get_the_post_thumbnail_url( $post->ID, 'canuck_small15' );
							?>
							<div class="owl-item-wrap">
								<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'small carousel image', 'canuck' ); ?>" />
								<?php
								if ( $link_to_post || false !== $custom_feature_link ) {
									?>
									<span class="image-overlay">
										<span class="overlay-wrap">
											<span class="links">
												<?php
												if ( false !== $custom_feature_link ) {
													echo '<a href="' . esc_url( $custom_feature_link ) . '" title="' . the_title_attribute( 'echo=0' ) . '" ><i class="fa fa-link"></i></a>';
												} elseif ( true === $link_to_post ) {
													echo '<a href="' . esc_url( get_the_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '" ><i class="fa fa-link"></i></a>';
												}
												?>
											</span>
										</span>
									</span>
									<?php
								}
								?>
							</div>
							<?php
						}
					}
					?>
				</div>
				<?php
			} else {
				?>
				<div class="error">
					<?php
					esc_html_e( 'You have not set up your Feature posts so I can not find any images - see user documentation.', 'canuck' );
					?>
				</div>
				<?php
			}// End if().
			if ( ! isset( $canuck_feature_pic_count ) || 0 === $canuck_feature_pic_count ) {
				?>
				<div class="error">
					<h3><?php esc_html_e( 'Error: There were no feature images found?', 'canuck' ); ?></h3>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
<?php
wp_reset_postdata();

