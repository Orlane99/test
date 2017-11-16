<?php
/**
 * Canuck Home Page template part - area 1
 *
 * This template part is called by template-home.php
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/quick-guide-gplv2.html  GNU Public License
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

// Get options.
$section1_usage = esc_html( stripslashes( get_theme_mod( 'canuck_section1_usage', 'normal' ) ) );
$section1_text = stripslashes( get_theme_mod( 'canuck_section1_text', '' ) );
$section1_shortcode = stripslashes( get_theme_mod( 'canuck_section1_shortcode', '' ) );
$section1_include_link = get_theme_mod( 'canuck_include_section1_button', false );
$section1_link = get_theme_mod( 'canuck_section1_button_link', '#' );
$section1_button_label = stripslashes( get_theme_mod( 'canuck_section1_button_name', "<i class='fa fa-link'></i> " . __( 'more', 'canuck' ) ) );
$sec1_bg_image = get_theme_mod( 'canuck_section1_background_image', '' );
$sec1_use_parallax = get_theme_mod( 'canuck_section1_use_parallax', false );

if ( '' !== $sec1_bg_image && false !== $sec1_use_parallax ) { ?>
	<div class="home-1-wide parallax-window" data-parallax="scroll" data-image-src="<?php echo esc_url( $sec1_bg_image ); ?>">
<?php } else { ?>
	<div class="home-1-wide">
<?php } ?>
	<div class="home-1-wide-overlay">
		<div class="home-1-wrap">
			<?php
			if ( '' !== $section1_text ) {
				echo '<div class="home-1-text">';
					echo wp_kses_post( $section1_text );
				echo '</div>';
			}
			if ( true === $section1_include_link ) {
				if ( '' === $section1_button_label ) {
					$section1_button_label = "<i class='fa fa-link'></i> " . __( 'more', 'canuck' );
				}
				echo '<div class="home-1-button">';
					echo '<a class="button1" href="' . esc_url( $section1_link ) . '" title="' . esc_attr( 'more', 'canuck' ) . '">';
						echo wp_kses_post( $section1_button_label );
					echo '</a>';
				echo '</div>';
			}
			echo '<div class="clearfix"></div>';
			if ( 'shortcode' === $section1_usage ) {
				echo '<div class="home-1-shortcode">';
					echo do_shortcode( wp_kses_post( $section1_shortcode ) );
				echo '</div>';
			} elseif ( 'widgetized' === $section1_usage ) {
				echo '<div class="home-1-widget">';
					if ( ! dynamic_sidebar( 'canuck_home_section1_sidebar' ) ) {
						echo esc_html__( 'Section 1 is set up as a widget area.', 'canuck' ) .
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
