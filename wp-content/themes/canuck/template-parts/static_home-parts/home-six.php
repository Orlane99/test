<?php
/**
 * Canuck Home Page template part - layout option 6
 *
 * This template part is called by template-home.php
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

$sec6_bg_image = get_theme_mod( 'canuck_section6_background_image', '' );
$sec6_use_parallax = get_theme_mod( 'canuck_section6_use_parallax', false );

if ( '' !== $sec6_bg_image && false !== $sec6_use_parallax ) { ?>
	<div class="home-6-wide parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $sec6_bg_image ); ?>">
<?php } else { ?>
	<div class="home-6-wide">
<?php } ?>
	<div class="home-6-wide-overlay">
		<div class="home-6-wrap">
			<div class="servicebox one">
				<?php
				// Get the options.
				$section6_box1_use_image_font = get_theme_mod( 'canuck_section6_box1_use_font_icon', false );
				$section6_box1_image_font = get_theme_mod( 'canuck_section6_box1_image_font', '' );
				$section6_box1_image = get_theme_mod( 'canuck_section6_box1_image', '' );
				$section6_box1_title = stripslashes( get_theme_mod( 'canuck_section6_box1_title', '' ) );
				$section6_box1_text = stripslashes( get_theme_mod( 'canuck_section6_box1_text', '' ) );
				$section6_box1_include_link = get_theme_mod( 'canuck_section6_box1_include_link', false );
				$section6_box1_button_link = get_theme_mod( 'canuck_section6_box1_button_link', '#' );
				$section6_box1_button_title = get_theme_mod( 'canuck_section6_box1_button_title', "<i class='fa fa-link'></i> " . __( 'more', 'canuck' ) );
				if ( true === $section6_box1_include_link && '' === $section6_box1_button_title ) {
					// No link button so use image for link.
					if ( true === $section6_box1_use_image_font && '' !== $section6_box1_image_font ) {
						?>
						<div class= "section6-graphic">
							<a class="section6-linked-fi" href="<?php echo esc_url( $section6_box1_button_link ); ?>" 
								title="<?php echo esc_attr( $section6_box1_title ); ?>">
								<i class="fa <?php echo esc_attr( $section6_box1_image_font ); ?>"></i>
							</a>
						</div>
						<?php
					} elseif ( '' !== $section6_box1_image ) {
						?>
						<div class= "section6-graphic">
							<a class="section6-linked-image" href="<?php echo esc_url( $section6_box1_button_link ); ?>"	title="<?php echo esc_attr( $section6_box1_title ); ?>">
								<img src="<?php echo esc_url( $section6_box1_image ); ?>" alt="<?php echo esc_attr( $section6_box1_title ); ?>" />
								<div class="section6-image-overlay">
									<i class="fa fa-link"></i>
								</div>
							</a>
						</div>
						<?php
					}// End if().
				} else {
					// Put in the image with no link.
					if ( true === $section6_box1_use_image_font ) {
						?>
						<div class= "section6-graphic">
							<i class="no-link fa <?php echo esc_attr( $section6_box1_image_font ); ?>"></i>
						</div>
						<?php
					} else {
						if ( '' !== $section6_box1_image ) {
							?>
							<div class= "section6-graphic">
								<img class="no-link" src="<?php echo esc_url( $section6_box1_image ); ?>" alt="<?php echo esc_attr( $section6_box1_title ); ?>" /> 
							</div>
							<?php
						}
					}
				}// End if().
				if ( '' !== $section6_box1_title ) {
					echo '<h4>' . esc_html( $section6_box1_title ) . '</h4>';
				}
				if ( '' !== $section6_box1_text ) {
					echo '<div class="servicebox-content">' . wp_kses_post( $section6_box1_text ) . '</div>';
				}
				if ( true === $section6_box1_include_link && '' !== $section6_box1_button_title ) {
					?>
					<div class="home-6-button">
						<a class="button1" href="<?php echo esc_url( $section6_box1_button_link ); ?>"	title="<?php esc_attr_e( 'more', 'canuck' ); ?>">
							<?php echo wp_kses_post( $section6_box1_button_title ); ?>
						</a>
					</div>
					<?php
				}
				?>
			</div>
			
			<div class="servicebox two">
				<?php
				// Get the options.
				$section6_box2_use_image_font = get_theme_mod( 'canuck_section6_box2_use_font_icon', false );
				$section6_box2_image_font = get_theme_mod( 'canuck_section6_box2_image_font', '' );
				$section6_box2_image = get_theme_mod( 'canuck_section6_box2_image', '' );
				$section6_box2_title = stripslashes( get_theme_mod( 'canuck_section6_box2_title', '' ) );
				$section6_box2_text = stripslashes( get_theme_mod( 'canuck_section6_box2_text', '' ) );
				$section6_box2_include_link = get_theme_mod( 'canuck_section6_box2_include_link', false );
				$section6_box2_button_link = get_theme_mod( 'canuck_section6_box2_button_link', '#' );
				$section6_box2_button_title = get_theme_mod( 'canuck_section6_box2_button_title', "<i class='fa fa-link'></i> " . __( 'more', 'canuck' ) );
				if ( true === $section6_box2_include_link && '' === $section6_box2_button_title ) {
					// No link button so use image for link.
					if ( true === $section6_box2_use_image_font && '' !== $section6_box2_image_font ) {
						?>
						<div class= "section6-graphic">
							<a class="section6-linked-fi" href="<?php echo esc_url( $section6_box2_button_link ); ?>" 
								title="<?php echo esc_attr( $section6_box2_title ); ?>">
								<i class="fa <?php echo esc_attr( $section6_box2_image_font ); ?>"></i>
							</a>
						</div>
						<?php
					} elseif ( '' !== $section6_box2_image ) {
						?>
						<div class= "section6-graphic">
							<a class="section6-linked-image" href="<?php echo esc_url( $section6_box2_button_link ); ?>"
								title="<?php echo esc_attr( $section6_box2_title ); ?>">
								<img src="<?php echo esc_url( $section6_box2_image ); ?>" alt="<?php echo esc_attr( $section6_box2_title ); ?>" />
								<div class="section6-image-overlay">
									<i class="fa fa-link"></i>
								</div>
							</a>
						</div>
						<?php
					}// End if().
				} else {
					// Put in the image with no link.
					if ( true === $section6_box2_use_image_font ) {
						?>
						<div class= "section6-graphic">
							<i class="no-link fa <?php echo esc_attr( $section6_box2_image_font ); ?>"></i>
						</div>
						<?php
					} else {
						if ( '' !== $section6_box2_image ) {
							?>
							<div class= "section6-graphic">
								<img class="no-link" src="<?php echo esc_url( $section6_box2_image ); ?>" alt="<?php echo esc_attr( $section6_box2_title ); ?>" /> 
							</div>
							<?php
						}
					}
				}// End if().
				if ( '' !== $section6_box2_title ) {
					echo '<h4>' . esc_html( $section6_box2_title ) . '</h4>';
				}
				if ( '' !== $section6_box2_text ) {
					echo '<div class="servicebox-content">' . wp_kses_post( $section6_box2_text ) . '</div>';
				}
				if ( true === $section6_box2_include_link && '' !== $section6_box2_button_title ) {
					?>
					<div class="home-6-button">
						<a class="button1" href="<?php echo esc_url( $section6_box2_button_link ); ?>" title="<?php esc_attr_e( 'more', 'canuck' ); ?>">
							<?php echo wp_kses_post( $section6_box2_button_title ); ?></a>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>
