<?php
/**
 * Template part file that contains the sidebar_1 default content.
 *
 * This file is called by all page.php, index.php, single.php.
 *
 * @package     Canuck WordPress Theme
 * @copyright   Copyright (C) 2017  Kevin Archibald
 * @license     http://www.gnu.org/licenses/gpl-2.0.html
 * @author      Kevin Archibald <www.kevinsspace.ca/contact/>
 */

if ( ! dynamic_sidebar( 'canuck_sidebar_1' ) ) {
	?>
	<h2><?php esc_html_e( 'Sidebar 1', 'canuck' ); ?></h2>
	<p><?php esc_html_e( 'Go to Appearance => Widgets and drag a widget over to this sidebar.', 'canuck' ); ?></p>
	<?php
}

