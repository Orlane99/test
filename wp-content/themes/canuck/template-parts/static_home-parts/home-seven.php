<?php
/**
 * Canuck Home Page template part - layout option 7
 *
 * This template part is called by template-home.php
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

// Get the options.
$section7_usage = get_theme_mod( 'canuck_section7_usage', 'normal' );
$section7_text = stripslashes( get_theme_mod( 'canuck_section7_text', '' ) );
$section7_shortcode = stripslashes( get_theme_mod( 'canuck_section7_shortcode', '' ) );
$section7_include_link = get_theme_mod( 'canuck_include_section7_button', false );
$section7_link = get_theme_mod( 'canuck_section7_button_link', '#' );
$section7_button_label = get_theme_mod( 'canuck_section7_button_name', "<i class='fa fa-link'></i> " . __( 'more', 'canuck' ) );
$sec7_bg_image = get_theme_mod( 'canuck_section7_background_image', '' );
$sec7_use_parallax = get_theme_mod( 'canuck_section7_use_parallax', false );

if ( '' !== $sec7_bg_image && false !== $sec7_use_parallax ) { ?>
	<div class="home-7-wide parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $sec7_bg_image ); ?>">
<?php } else { ?>
	<div class="home-7-wide">
<?php } ?>
	<div class="home-7-wide-overlay">
		<div class="home-7-wrap">
			<?php
			if ( '' !== $section7_text ) {
				echo '<div class="home-7-text">';
					echo wp_kses_post( $section7_text );
				echo '</div>';
			}
			if ( true === $section7_include_link ) {
				if ( '' === $section7_button_label ) {
					$section7_button_label = "<i class='fa fa-link'></i> " . __( 'more', 'canuck' );
				}
				echo '<div class="home-7-button">';
					echo '<a class="button1" href="' . esc_url( $section7_link ) . '" title="' . esc_attr( 'more', 'canuck' ) . '">';
						echo wp_kses_post( $section7_button_label );
					echo '</a>';
				echo '</div>';
			}
			echo '<div class="clearfix"></div>';
			if ( 'shortcode' === $section7_usage ) {
				echo '<div class="home-7-shortcode">';
					echo do_shortcode( wp_kses_post( $section7_shortcode ) );
				echo '</div>';
			} elseif ( 'widgetized' === $section7_usage ) {
				echo '<div class="home-7-widget">';
					if ( ! dynamic_sidebar( 'canuck_home_section7_sidebar' ) ) {
						echo esc_html__( 'Section 7 is set up as a widget area.', 'canuck' ) .
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
