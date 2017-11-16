<?php
/**
 * Custom functions file
 *
 * This file contains custom functions for the theme.
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

/**
 * Get Logo and show
 *
 * This function is called by canuck_header().
 * It checks to see if there is a header image from Appearance => Header if there it loads it.
 * If blank then a nothing is loaded.
 *
 * WordPress Functions used - see WordPress Codex
 *
 * @uses get_header_image() @uses home_url( '/' ) @uses header_image()
 * @uses get_custom_header() @uses get_template_directory_uri()
 */
function canuck_show_logo() {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	if ( has_custom_logo() ) {
		?>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php esc_attr_e( 'logo', 'canuck' ); ?>">
		</a>
		<?php
	}
}

/**
 * Header Menu Function.
 *
 * This function sets up the menu for the header.
 * WordPress Functions - See the Codex.
 *
 * @uses has_nav_menu() @uses wp_nav_menu()
 */
function canuck_header_menu() {
	wp_nav_menu(
		array(
			'theme_location' => 'canuck_primary',
			'container_class' => 'main-nav',
			'container_id' => 'main-menu-right',
			'menu_class' => 'main-menu',
			'menu_id' => 'main-menu-ul',
			'depth' => 4,
			'fallback_cb' => 'false',
		)
	);
}

/**
 * Side Menu 1 function
 *
 * This function sets up social menu 1.
 * WordPress Functions - See the Codex.
 *
 * @param string $position is the position of the menu.
 * @uses has_nav_menu() @uses wp_nav_menu()
 */
function canuck_social_menu( $position ) {
	$containerid = 'social-nav-id-' . $position;
	$menuid = 'social-menu-id-' . $position;
	wp_nav_menu(
		array(
			'theme_location'    => 'canuck_social',
			'container_class'   => 'social-nav-class',
			'container_id'      => $containerid,
			'menu_class'        => 'social-menu-class',
			'menu_id'           => $menuid,
			'depth'             => 1,
			'link_before'       => '<span class="social-screen-reader-text">',
			'link_after'        => '</span>',
			'item_spacing'      => 'discard',
			'fallback_cb'       => 'false',
		)
	);
}

/**
 * The wpautop filter fix.
 *
 * Description: Fix issues when shortcodes are embedded in a block of content that is filtered by wpautop.
 * Author URI: http://www.johannheyne.de.
 *
 * @param string $content is the content of the post.
 */
function canuck_shortcode_paragraph_insertion_fix( $content ) {
	$array = array(
		'<p>['    => '[',
		']</p>'   => ']',
		']<br />' => ']',
		']<br/>'  => ']',
		'<p></p>' => '',
	);
	$content = strtr( $content, $array );
	return $content;
}
add_filter( 'the_content', 'canuck_shortcode_paragraph_insertion_fix' );

/**
 * Home Page Area Selection Helper
 *
 * This function is called by template-home.php and is used to set up
 * the area variables on the the home page.
 *
 * @param string $area_select - section selected wor the home page area.
 * @return $area_select - simplified form of template part
 */
function canuck_home_area_selection( $area_select ) {
	if ( 'Section 1' === $area_select ) {
		$area_select = 'one';
	} elseif ( 'Section 2' === $area_select ) {
		$area_select = 'two';
	} elseif ( 'Section 3' === $area_select ) {
		$area_select = 'three';
	} elseif ( 'Section 4' === $area_select ) {
		$area_select = 'four';
	} elseif ( 'Section 5' === $area_select ) {
		$area_select = 'five';
	} elseif ( 'Section 6' === $area_select ) {
		$area_select = 'six';
	} elseif ( 'Section 7' === $area_select ) {
		$area_select = 'seven';
	} elseif ( 'Section 8' === $area_select ) {
		$area_select = 'eight';
	} elseif ( 'Section 9' === $area_select ) {
		$area_select = 'nine';
	} elseif ( 'Section 10' === $area_select ) {
		$area_select = 'ten';
	} elseif ( 'Section 11' === $area_select ) {
		$area_select = 'eleven';
	} elseif ( 'Section 12' === $area_select ) {
		$area_select = 'twelve';
	} elseif ( 'Section 13' === $area_select ) {
		$area_select = 'thirteen';
	} else {
		$area_select = 'none';
	}
	return $area_select;
}

/**
 * Home Page Section Options
 *
 * This function is called by template-home.php and is used to set up
 * the optional sections for the static home page
 *
 * @uses canuck_home_area_selection() in this file
 * @uses get_template_part() see WordPress Codex
 */
function canuck_home_page_sections() {
	$area_1 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_1', 'none' ) ) );
	$area_2 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_2', 'none' ) ) );
	$area_3 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_3', 'none' ) ) );
	$area_4 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_4', 'none' ) ) );
	$area_5 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_5', 'none' ) ) );
	$area_6 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_6', 'none' ) ) );
	$area_7 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_7', 'none' ) ) );
	$area_8 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_8', 'none' ) ) );
	$area_9 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_9', 'none' ) ) );
	$area_10 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_10', 'none' ) ) );
	$area_11 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_11', 'none' ) ) );
	$area_12 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_12', 'none' ) ) );
	$area_13 = esc_html( canuck_home_area_selection( get_theme_mod( 'canuck_home_area_13', 'none' ) ) );
	if ( 'none' !== $area_1 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_1 );
	}
	if ( 'none' !== $area_2 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_2 );
	}
	if ( 'none' !== $area_3 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_3 );
	}
	if ( 'none' !== $area_4 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_4 );
	}
	if ( 'none' !== $area_5 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_5 );
	}
	if ( 'none' !== $area_6 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_6 );
	}
	if ( 'none' !== $area_7 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_7 );
	}
	if ( 'none' !== $area_8 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_8 );
	}
	if ( 'none' !== $area_9 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_9 );
	}
	if ( 'none' !== $area_10 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_10 );
	}
	if ( 'none' !== $area_11 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_11 );
	}
	if ( 'none' !== $area_12 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_12 );
	}
	if ( 'none' !== $area_13 ) {
		get_template_part( '/template-parts/static_home-parts/home', $area_13 );
	}
}

/**
 * Function to use Justin Tadlocks Breadcrumb Trail
 */
function canuck_custom_breadcrumbs() {
	// Breadcrumb args.
	$breadcrumb_args = array(
		'container'       => 'nav',
		'before'          => '',
		'after'           => '',
		'show_on_front'   => false,
		'network'         => false,
		'show_title'      => true,
		'show_browse'     => false,
		'echo'            => true,
		'labels' => array(
			'browse'              => __( 'Browse:',                               'canuck' ),
			'aria_label'          => esc_attr_x( 'Breadcrumbs', 'breadcrumbs aria label', 'canuck' ),
			'home'                => '<i class="fa fa-home" style="font-size: 1em;margin:0;padding:0;" title="' . esc_attr__( 'Home','canuck' ) . '"></i>',
			'error_404'           => __( '404 Not Found',                         'canuck' ),
			'archives'            => __( 'Archives',                              'canuck' ),
			// Translators: %s is the search query. The HTML entities are opening and closing curly quotes.
			'search'              => __( 'Search results for &#8220;%s&#8221;',   'canuck' ),
			// Translators: %s is the page number.
			'paged'               => __( 'Page %s',                               'canuck' ),
			// Translators: Minute archive title. %s is the minute time format.
			'archive_minute'      => __( 'Minute %s',                             'canuck' ),
			// Translators: Weekly archive title. %s is the week date format.
			'archive_week'        => __( 'Week %s',                               'canuck' ),
			// "%s" is replaced with the translated date/time format.
			'archive_minute_hour' => '%s',
			'archive_hour'        => '%s',
			'archive_day'         => '%s',
			'archive_month'       => '%s',
			'archive_year'        => '%s',
		),
	);
	if ( function_exists( 'breadcrumb_trail' ) ) {
		breadcrumb_trail( $breadcrumb_args );
	}
}

/**
 * Extract embed from selected content
 *
 * Modified from wp_extract_urls() in /wp-includes/functions.php
 *
 * Add content between <q></q>. The function extracts
 * the content between these tags and then and returns it as a string.
 * format <q>quote|author|author link</q>.
 * example <q>Only one thing is impossible for God: To find any sense in any copyright law on the planet.|Mark Twain|http://www.brainyquote.com/quotes/quotes/m/marktwain163473.html</q>.
 *
 * @param string $content is the post content.
 */
function canuck_extract_embed( $content ) {
	$pattern = "/\<q\>(.*?)\<\/q\>/s";// Double quotes required.
	preg_match( $pattern, $content, $embed_string );
	if ( $embed_string ) {
		if ( $embed_string[0] ) {
			$embed_string[0] = str_replace( '<q>', '', $embed_string[0] );
		}
		if ( $embed_string[0] ) {
			$embed_string[0] = str_replace( '</q>', '', $embed_string[0] );
		}
		return $embed_string[0];
	} else {
		return false;
	}
}

/**
 * Remove content from first <q></q> tags and return it for display
 *
 * @param string $content is the post content.
 */
function canuck_strip_extracted_quote( $content ) {
	$pattern = "/\<q\>(.*?)\<\/q\>/s";// Double quotes required.
	preg_match( $pattern, $content, $text_to_search );
	if ( isset( $text_to_search[0] ) ) {
		$content = str_replace( $text_to_search[0], '', $content );
	}
	$content = str_replace( '<p></p>', '', $content );
	return $content;
}

/**
 * Add Image Title to link on images.
 *
 * @param    string $link link to post.
 * @param    int    $id post id.
 */
function canuck_add_title_attachment_link( $link, $id = null ) {
	$id = intval( $id );
	$_post = get_post( $id );
	$post_title = esc_attr( $_post->post_title );
	return str_replace( '<a href', '<a title="' . $post_title . '" href', $link );
}
add_filter( 'wp_get_attachment_link', 'canuck_add_title_attachment_link', 10, 2 );

/**
 * This function converts hex colors to rgba colors,
 * with a opacity included.
 *
 * @param string $hex is the hex color string.
 * @param int    $opacity is the opacity.
 *
 * @return $rgb string style of the format 'rgba($r,$g,$b,$opacity')
 */
function canuck_hex_to_rgba( $hex, $opacity = 1 ) {
	$hex = sanitize_hex_color_no_hash( str_replace( '#', '', $hex ) );
	if ( 3 === strlen( $hex ) ) {
		$r = hexdec( substr( $hex, 0, 1 ) . substr( $hex, 0, 1 ) );
		$g = hexdec( substr( $hex, 1, 1 ) . substr( $hex, 1, 1 ) );
		$b = hexdec( substr( $hex, 2, 1 ) . substr( $hex, 2, 1 ) );
	} else {
		$r = hexdec( substr( $hex, 0, 2 ) );
		$g = hexdec( substr( $hex, 2, 2 ) );
		$b = hexdec( substr( $hex, 4, 2 ) );
	}
	$rgb = 'rgba(' . $r . ',' . $g . ',' . $b . ',' . $opacity . ')';
	return $rgb;
}

/**
 * This function sets up the fonts that will be used by the theme.
 */
function canuck_fonts() {
	$header_font = get_theme_mod( 'canuck_header_font', 'Open Sans' );
	$body_font = get_theme_mod( 'canuck_body_font', 'Open Sans' );
	$page_title_font = get_theme_mod( 'canuck_page_title_font', 'Open Sans' );
	$fonts = array(
		'Open Sans' => array(
			'type' => 'google',
			'enqueue' => 'Open+Sans:300,400',
			'family' => "'Open Sans', sans-serif",
		),
		'default' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => 'none',
		),
		'Arial' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => 'Arial, sans-serif',
		),
		'Artifika' => array(
			'type' => 'google',
			'enqueue' => 'Artifika:400,400i',
			'family' => 'Artifika, serif',
		),
		'Arvo' => array(
			'type' => 'google',
			'enqueue' => 'Arvo:400,400i',
			'family' => 'Arvo, serif',
		),
		'Book Antiqua' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => "'Book Antiqua', serif",
		),
		'Bubbler One' => array(
			'type' => 'google',
			'enqueue' => 'Bubbler+One',
			'family' => "'Bubbler One', sans-serif",
		),
		'Cabin' => array(
			'type' => 'google',
			'enqueue' => 'Cabin:400,400i',
			'family' => 'Cabin, sans-serif',
		),
		'Cambria' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => 'Cambria, serif',
		),
		'Comic Sans MS' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => "'Comic Sans MS', sans-serif",
		),
		'Corben' => array(
			'type' => 'google',
			'enqueue' => 'Corben',
			'family' => 'Corben, cursive',
		),
		'Droid Sans' => array(
			'type' => 'google',
			'enqueue' => 'Droid+Sans:400,400i',
			'family' => "'Droid Sans', sans-serif",
		),
		'Droid Serif' => array(
			'type' => 'google',
			'enqueue' => 'Droid+Serif:400,400i',
			'family' => "'Droid Serif', serif",
		),
		'Great Vibes' => array(
			'type' => 'google',
			'enqueue' => 'Great+Vibes',
			'family' => "'Great Vibes', cursive",
		),
		'Georgia' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => 'Georgia, serif',
		),
		'Josefin Sans' => array(
			'type' => 'google',
			'enqueue' => 'Josefin+Sans:400,400i',
			'family' => "'Josefin Sans', serif",
		),
		'Josefin Slab' => array(
			'type' => 'google',
			'enqueue' => 'Josefin+Slab:400,400i',
			'family' => "'Josefin Slab', serif",
		),
		'Karla' => array(
			'type' => 'google',
			'enqueue' => 'Karla:400,400i',
			'family' => 'Karla, sans-serif',
		),
		'Lato' => array(
			'type' => 'google',
			'enqueue' => 'Lato:400,400i',
			'family' => 'Lato, sans-serif',
		),
		'Lobster' => array(
			'type' => 'google',
			'enqueue' => 'Lobster',
			'family' => 'Lobster, cursive',
		),
		'Old Standard TT' => array(
			'type' => 'google',
			'enqueue' => 'Old+Standard+TT:400,400i',
			'family' => "'Old Standard TT', serif",
		),
		'Playfair Display SC' => array(
			'type' => 'google',
			'enqueue' => 'Playfair+Display+SC',
			'family' => "'Playfair Display SC', serif",
		),
		'PT Sans' => array(
			'type' => 'google',
			'enqueue' => 'PT+Sans:400,400i',
			'family' => "'PT Sans', sans-serif",
		),
		'PT Serif' => array(
			'type' => 'google',
			'enqueue' => 'PT+Serif:400,400i',
			'family' => "'PT Serif', serif",
		),
		'Puritan' => array(
			'type' => 'google',
			'enqueue' => 'Puritan:400,400i',
			'family' => 'Puritan, sans-serif',
		),
		'Raleway' => array(
			'type' => 'google',
			'enqueue' => 'Raleway:300,300i',
			'family' => 'Raleway, sans-serif',
		),
		'Rock Salt' => array(
			'type' => 'google',
			'enqueue' => 'Rock+Salt',
			'family' => "'Rock Salt', cursive",
		),
		'Tahoma' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => 'Tahoma, sans-serif',
		),
		'Times New Roman' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => "'Times New Roman', serif",
		),
		'Titillium Web' => array(
			'type' => 'google',
			'enqueue' => 'Titillium+Web:400,400i',
			'family' => "'Titillium Web', sans-serif",
		),
		'Trebuchet MS' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => "'Trebuchet MS', sans-serif",
		),
		'Ubuntu' => array(
			'type' => 'google',
			'enqueue' => 'Ubuntu:400,400i',
			'family' => 'Ubuntu, sans-serif',
		),
		'Verdana' => array(
			'type' => 'standard',
			'enqueue' => 'none',
			'family' => 'Verdana, sans-serif',
		),
		'Vollkorn' => array(
			'type' => 'google',
			'enqueue' => 'Vollkorn:400,400i',
			'family' => 'Vollkorn, serif',
		),
	);
	$theme_fonts = array(
		'header' => array(
			'type' => $fonts[ $header_font ]['type'],
			'enqueue' => $fonts[ $header_font ]['enqueue'],
			'family' => $fonts[ $header_font ]['family'],
		),
		'body' => array(
			'type' => $fonts[ $body_font ]['type'],
			'enqueue' => $fonts[ $body_font ]['enqueue'],
			'family' => $fonts[ $body_font ]['family'],
		),
		'page' => array(
			'type' => $fonts[ $page_title_font ]['type'],
			'enqueue' => $fonts[ $page_title_font ]['enqueue'],
			'family' => $fonts[ $page_title_font ]['family'],
		),
	);
	return $theme_fonts;
}

