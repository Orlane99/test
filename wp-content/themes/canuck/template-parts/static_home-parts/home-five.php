<?php
/**
 * Canuck Home Page template part - layout option 5
 *
 * This template part is called by template-home.php
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

// Get the options.
$section5_usage = get_theme_mod( 'canuck_section5_usage', 'normal' );
$section5_text = stripslashes( get_theme_mod( 'canuck_section5_text', '' ) );
$section5_shortcode = stripslashes( get_theme_mod( 'canuck_section5_shortcode', '' ) );
$section5_include_link = get_theme_mod( 'canuck_include_section5_button', false );
$section5_link = get_theme_mod( 'canuck_section5_button_link', '#' );
$section5_button_label = get_theme_mod( 'canuck_section5_button_name', "<i class='fa fa-link'></i> " . __( 'more', 'canuck' ) );
$sec5_bg_image = get_theme_mod( 'canuck_section5_background_image', '' );
$sec5_use_parallax = get_theme_mod( 'canuck_section5_use_parallax', false );

if ( '' !== $sec5_bg_image && false !== $sec5_use_parallax ) { ?>
	<div class="home-5-wide parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $sec5_bg_image ); ?>">
<?php } else { ?>
	<div class="home-5-wide">
<?php } ?>
	<div class="home-5-wide-overlay">
		<div class="home-5-wrap">
			<?php
			if ( '' !== $section5_text ) {
				echo '<div class="home-5-text">';
					echo wp_kses_post( $section5_text );
				echo '</div>';
			}
			if ( true === $section5_include_link ) {
				if ( '' === $section5_button_label ) {
					$section5_button_label = "<i class='fa fa-link'></i> " . __( 'more', 'canuck' );
				}
				echo '<div class="home-5-button">';
					echo '<a class="button1" href="' . esc_url( $section5_link ) . '" title="' . esc_attr( 'more', 'canuck' ) . '">';
						echo wp_kses_post( $section5_button_label );
					echo '</a>';
				echo '</div>';
			}
			echo '<div class="clearfix"></div>';
			if ( 'shortcode' === $section5_usage ) {
				echo '<div class="home-5-shortcode">';
					echo do_shortcode( wp_kses_post( $section5_shortcode ) );
				echo '</div>';
			} elseif ( 'widgetized' === $section5_usage ) {
				echo '<div class="home-5-widget">';
					if ( ! dynamic_sidebar( 'canuck_home_section5_sidebar' ) ) {
						echo esc_html__( 'Section 5 is set up as a widget area.', 'canuck' ) .
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
