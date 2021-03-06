<?php
/**
 * Implement theme options in the Customizer
 *
 * @package Mercia
 */

// Load Sanitize Functions.
require( get_template_directory() . '/inc/customizer/sanitize-functions.php' );

// Load Custom Controls.
require( get_template_directory() . '/inc/customizer/controls/headline-control.php' );
require( get_template_directory() . '/inc/customizer/controls/magazine-widget-area-control.php' );
require( get_template_directory() . '/inc/customizer/controls/upgrade-control.php' );

// Load Customizer Sections.
require( get_template_directory() . '/inc/customizer/sections/customizer-layout.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-blog.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-post.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-magazine.php' );
require( get_template_directory() . '/inc/customizer/sections/customizer-upgrade.php' );

/**
 * Registers Theme Options panel and sets up some WordPress core settings
 *
 * @param object $wp_customize / Customizer Object.
 */
function mercia_customize_register_options( $wp_customize ) {

	// Add Theme Options Panel.
	$wp_customize->add_panel( 'mercia_options_panel', array(
		'priority'       => 180,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => esc_html__( 'Theme Options', 'mercia' ),
		'description'    => mercia_customize_theme_links(),
	) );

	// Change default background section.
	$wp_customize->get_control( 'background_color' )->section   = 'background_image';
	$wp_customize->get_section( 'background_image' )->title     = esc_html__( 'Background', 'mercia' );

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	// Add selective refresh for site title and description.
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector'        => '.site-title a',
		'render_callback' => 'mercia_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector'        => '.site-description',
		'render_callback' => 'mercia_customize_partial_blogdescription',
	) );

	// Add Display Site Title Setting.
	$wp_customize->add_setting( 'mercia_theme_options[site_title]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mercia_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'mercia_theme_options[site_title]', array(
		'label'    => esc_html__( 'Display Site Title', 'mercia' ),
		'section'  => 'title_tagline',
		'settings' => 'mercia_theme_options[site_title]',
		'type'     => 'checkbox',
		'priority' => 10,
	) );

	// Add Display Tagline Setting.
	$wp_customize->add_setting( 'mercia_theme_options[site_description]', array(
		'default'           => true,
		'type'              => 'option',
		'transport'         => 'postMessage',
		'sanitize_callback' => 'mercia_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'mercia_theme_options[site_description]', array(
		'label'    => esc_html__( 'Display Tagline', 'mercia' ),
		'section'  => 'title_tagline',
		'settings' => 'mercia_theme_options[site_description]',
		'type'     => 'checkbox',
		'priority' => 11,
	) );
}
add_action( 'customize_register', 'mercia_customize_register_options' );


/**
 * Render the site title for the selective refresh partial.
 */
function mercia_customize_partial_blogname() {
	bloginfo( 'name' );
}


/**
 * Render the site tagline for the selective refresh partial.
 */
function mercia_customize_partial_blogdescription() {
	bloginfo( 'description' );
}


/**
 * Embed JS file to make Theme Customizer preview reload changes asynchronously.
 */
function mercia_customize_preview_js() {
	wp_enqueue_script( 'mercia-customize-preview', get_template_directory_uri() . '/assets/js/customize-preview.js', array( 'customize-preview' ), '20171005', true );
}
add_action( 'customize_preview_init', 'mercia_customize_preview_js' );


/**
 * Embed JS for Customizer Controls.
 */
function mercia_customizer_controls_js() {
	wp_enqueue_script( 'mercia-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls.js', array(), '20171005', true );
}
add_action( 'customize_controls_enqueue_scripts', 'mercia_customizer_controls_js' );


/**
 * Embed CSS styles Customizer Controls.
 */
function mercia_customizer_controls_css() {
	wp_enqueue_style( 'mercia-customizer-controls', get_template_directory_uri() . '/assets/css/customizer-controls.css', array(), '20171005' );
}
add_action( 'customize_controls_print_styles', 'mercia_customizer_controls_css' );

/**
 * Returns Theme Links
 */
function mercia_customize_theme_links() {

	ob_start();
	?>

		<div class="theme-links">

			<span class="customize-control-title"><?php esc_html_e( 'Theme Links', 'mercia' ); ?></span>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/themes/mercia/', 'mercia' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=mercia&utm_content=theme-page" target="_blank">
					<?php esc_html_e( 'Theme Page', 'mercia' ); ?>
				</a>
			</p>

			<p>
				<a href="http://preview.themezee.com/?demo=mercia&utm_source=customizer&utm_campaign=mercia" target="_blank">
					<?php esc_html_e( 'Theme Demo', 'mercia' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://themezee.com/docs/mercia-documentation/', 'mercia' ) ); ?>?utm_source=customizer&utm_medium=textlink&utm_campaign=mercia&utm_content=documentation" target="_blank">
					<?php esc_html_e( 'Theme Documentation', 'mercia' ); ?>
				</a>
			</p>

			<p>
				<a href="<?php echo esc_url( __( 'https://wordpress.org/support/theme/mercia/reviews/?filter=5', 'mercia' ) ); ?>" target="_blank">
					<?php esc_html_e( 'Rate this theme', 'mercia' ); ?>
				</a>
			</p>

		</div>

	<?php
	$theme_links = ob_get_contents();
	ob_end_clean();

	return $theme_links;
}
