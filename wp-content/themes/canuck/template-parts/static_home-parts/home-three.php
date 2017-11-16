<?php
/**
 * Canuck Home Page template part - layout option 3
 *
 * This template part is called by template-home.php
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

// Get the options.
$section3_usage = esc_html( get_theme_mod( 'canuck_section3_usage', 'normal' ) );
$section3_text = stripslashes( get_theme_mod( 'canuck_section3_text', '' ) );
$section3_shortcode = stripslashes( get_theme_mod( 'canuck_section3_shortcode', '' ) );
$section3_include_link = get_theme_mod( 'canuck_include_section3_button', false );
$section3_link = get_theme_mod( 'canuck_section3_button_link', '#' );
$section3_button_label = get_theme_mod( 'canuck_section3_button_name', "<i class='fa fa-link'></i> " . __( 'more', 'canuck' ) );
$sec3_bg_image = get_theme_mod( 'canuck_section3_background_image', '' );
$sec3_use_parallax = get_theme_mod( 'canuck_section3_use_parallax', false );

if ( '' !== $sec3_bg_image && false !== $sec3_use_parallax ) { ?>
	<div class="home-3-wide parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $sec3_bg_image ); ?>">
<?php } else { ?>
	<div class="home-3-wide">
<?php } ?>
	<div class="home-3-wide-overlay">
		<div class="home-3-wrap">
			<?php
			if ( '' !== $section3_text ) {
				echo '<div class="home-3-text">';
					echo wp_kses_post( $section3_text );
				echo '</div>';
			}
			if ( true === $section3_include_link ) {
				if ( '' === $section3_button_label ) {
					$section3_button_label = "<i class='fa fa-link'></i> " . __( 'more', 'canuck' );
				}
				echo '<div class="home-3-button">';
					echo '<a class="button1" href="' . esc_url( $section3_link ) . '" title="' . esc_attr( 'more', 'canuck' ) . '">';
						echo wp_kses_post( $section3_button_label );
					echo '</a>';
				echo '</div>';
			}
			echo '<div class="clearfix"></div>';
			if ( 'shortcode' === $section3_usage ) {
				echo '<div class="home-3-shortcode">';
					echo do_shortcode( wp_kses_post( $section3_shortcode ) );
				echo '</div>';
			} elseif ( 'widgetized' === $section3_usage ) {
				echo '<div class="home-3-widget">';
					if ( ! dynamic_sidebar( 'canuck_home_section3_sidebar' ) ) {
						echo esc_html__( 'Section 3 is set up as a widget area.', 'canuck' ) .
							'<br/><span class="alert">' .
							esc_html__( 'Go to Appearance->Widgets or the Customizer Widgets panel and add a widget to Home Page Section 1.', 'canuck' ) .
							'</span>';
					}
				echo '</div>';
			}
			?>
		</div>
	</div>
</div>
