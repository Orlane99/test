<?php
/**
 * Header Template Part File.
 *
 * Template part file that contains the HTML document head and
 * opening HTML body elements, as well as the site header.
 * This file is called by certain primary template pages
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

$home_feature = get_theme_mod( 'canuck_home_feature', 'background_image' );
$home_feature_category = get_theme_mod( 'canuck_home_feature_category', '' );
$home_title = get_theme_mod( 'canuck_home_title', '' );
$home_desc = get_theme_mod( 'canuck_home_description', '' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset=<?php bloginfo( 'charset' ); ?> >
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php
	if ( 'background_image' === $home_feature ) {
		?>
		<header id="main-header" class="header-wide-image home">
		<?php
	} elseif ( 'button_nav' === $home_feature ) {
		?>
		<header id="main-header" class="header-wide-slider home">
		<?php
	} else {
		?>
		<header id="main-header" class="header-wide-no-feature home">
		<?php
	}
			get_template_part( '/template-parts/header-parts/header', 'top-strip' );
			?>
			<div class="header-logo-menu-wide">
				<div class="header-logo-menu-strip">
					<div class="header-image-left" >
						<?php
						if ( 'background_image' === $home_feature ) {
							?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>
							<?php
						} else {
							canuck_show_logo();
						}
						?>
					</div>
					<span class="canuck-show-search-trigger"><a href="#"><i class="fa fa-search"></i></a></span>
					<?php
					if ( has_nav_menu( 'canuck_primary' ) ) {
						?>
						<button class="menu-1-toggle" aria-expanded="false" aria-label="<?php esc_attr_e( 'Top Menu Toggle', 'canuck' ); ?>"></button>
						<?php
					}
					?>
					<nav class="nav-container">
						<h2 class="screen-reader-text"><?php esc_html_e( 'Main Navigation', 'canuck' ); ?></h2>
						<?php canuck_header_menu(); ?>
					</nav>
					<div class="canuck-search">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</header>
		<a href="#main-header" class="scrolltotop"><i class="fa fa-chevron-up"></i></a>
		<?php
		if ( 'background_image' === $home_feature ) {
			$image_url = get_header_image();
			if ( false == $image_url ) {// Leave as not strict.
				$image_url = get_parent_theme_file_uri( '/images/headerdefault.jpg' );
			}
			?>
			<div class="header-image-wrap">
				<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'header-image', 'canuck' ); ?>">
				<div class="header-image-overlay">
					<?php
					if ( '' !== $home_title ) {
						echo '<h1>' . wp_kses_post( $home_title ) . '</h1>';
					} else {
						echo '<h1>' . get_bloginfo( 'name' ) . '</h1>';// XSS OK.
					}
					if ( '' !== $home_desc ) {
						echo '<span>' . wp_kses_post( $home_desc ) . '</span>';
					} else {
						echo '<span>' . get_bloginfo( 'description' ) . '</span>';// XSS OK.
					}
					?>
				</div>
			</div>
			<?php
		} else {
			echo '<div class="sticky-spacer">&nbsp;</div>';
		}

