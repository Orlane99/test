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
$section12_title = stripslashes( get_theme_mod( 'canuck_section12_title', '' ) );
$section12_text = stripslashes( get_theme_mod( 'canuck_section12_text', '' ) );
$section12_portfolio_category = get_theme_mod( 'canuck_section12_portfolio_category', '' );
$section12_portfolio_columns = get_theme_mod( 'canuck_section12_portfolio_columns', '3' );
$sec12_bg_image = get_theme_mod( 'canuck_section12_background_image', '' );
$sec12_use_parallax = get_theme_mod( 'canuck_section12_use_parallax', false );
$include_pinterest_pinit = get_theme_mod( 'canuck_include_pinit' ) ? true : false;
$category_id = get_cat_ID( $section12_portfolio_category );
$args = array(
	'category' => $category_id,
	'numberposts' => 20,
);
$custom_posts = get_posts( $args );

if ( '' !== $sec12_bg_image && false !== $sec12_use_parallax ) { ?>
	<div class="home-12-wide parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $sec12_bg_image ); ?>">
<?php } else { ?>
	<div class="home-12-wide">
<?php } ?>
	<div class="home-12-wide-overlay">
		<div class="home-12-wrap">
			<?php
			// Title.
			if ( '' !== $section12_title ) {
				?>
				<div class="home-12-title">
					<h2><?php echo wp_kses_post( $section12_title ); ?></h2>
				</div>
				<?php
			}
			// Description.
			if ( '' !== $section12_text ) {
				?>
				<div class="home-12-text">
					<p><?php echo wp_kses_post( $section12_text ); ?></p>
				</div>
				<?php
			}
			// Carousel.
			if ( '' !== $section12_portfolio_category && false !== $custom_posts ) {
				?>
				<div id="home-12-carousel" class="owl-carousel home-12">
					<?php
					$canuck_feature_pic_count = 0;
					foreach ( $custom_posts as $post ) {
						setup_postdata( $post );
						$link_to_post = ( '' === get_post_meta( $post->ID, 'canuck_metabox_link_to_post', true ) ? false : true );
						$custom_feature_link = ( '' === get_post_meta( $post->ID, 'canuck_custom_feature_link', true ) ? false : get_post_meta( $post->ID, 'canuck_custom_feature_link', true ) );
						$image_caption = get_post( get_post_thumbnail_id() ) -> post_excerpt;
						$image_desc = get_post( get_post_thumbnail_id() ) -> post_content;
						if ( has_post_thumbnail() ) {
							$canuck_feature_pic_count ++;
							$image_url = get_the_post_thumbnail_url( $post->ID, 'canuck_small15' );
							?>
							<div class="owl-item-wrap">
								<?php
								if ( true === $include_pinterest_pinit ) {
									echo '<img data-pin-no-hover="true" src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $image_caption ) . '"/>';
								} else {
									echo '<img data-pin-no-hover="true" src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $image_caption ) . '"/>';
								}
								?>
								<span class="image-overlay">
									<span class="overlay-wrap">
										<span class="links">
											<?php
											if ( true === $include_pinterest_pinit ) {
												echo '<a href="https://www.pinterest.com/pin/create/button/" data-pin-round="true" data-pin-hover="false"  data-pin-media="' . esc_url( $image_url ) . '"><img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" alt="' . esc_attr__( 'Pinterest share image', 'canuck' ) . '" /></a>';
											}
											if ( false !== $custom_feature_link ) {
												echo '<a href="' . esc_url( $custom_feature_link ) . '" title="' . the_title_attribute( 'echo=0' ) . '" ><i class="fa fa-link"></i></a>';
											} elseif ( true === $link_to_post ) {
												echo '<a href="' . esc_url( get_the_permalink() ) . '" title="' . the_title_attribute( 'echo=0' ) . '" ><i class="fa fa-link"></i></a>';
											}
											echo '<a href="' . esc_url( $image_url ) . '" title="' . the_title_attribute( 'echo=0' ) . '" ><i class="fa fa-image"></i></a>';
											?>
										</span>
										<h5 class="title">
											<?php
											echo wp_kses_post( $image_caption );
											?>
										</h5>
										<span class="content">
											<?php
											echo wp_kses_post( $image_desc );
											?>
										</span>
									</span>
								</span>
							</div>
							<?php
						}// End if().
					}// End foreach().
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
					<h3>
						<?php
						esc_html_e( 'Error: There were no feature images found?', 'canuck' );
						?>
					</h3>
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
<?php
wp_reset_postdata();

